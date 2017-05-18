<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class FinanceController extends AdminbaseController{
	protected $finance_model;
	
	function _initialize() {
		parent::_initialize();
		$this->finance_model = D("Common/Finance");
	}
	function index(){
		
		if($_POST['submit']=='导出') {
			$this->_lists_export();
			$this->export();
		} else {
			$this->_lists();
		}
		//$this->_getTree();
		$this->display();
	}
	
	
	function add(){
		$this->display();
	}
	
	function add_post(){
		if($_POST['photos_url']) {
			$_POST['img'] = implode($_POST['photos_url'],'|');
		}
		unset($_POST['photos_url']);
		if($this->finance_model->create()) {
			$result=$this->finance_model->add();
			if ($result!==false) {
				writelog("添加财务数据，id:".$result);
				$this->success("添加成功！", U("Finance/index"));
			} else {
				$this->error("添加失败！");
			}
		} else {
			$this->error($this->finance_model->getError());
		}
	}
	
	
	function edit(){
		$id= intval(I("get.id"));
		$finance_data = $this->finance_model->where(array("id"=>$id))->find();
		$finance_data['firstadjusttime'] = $finance_data['firstadjusttime']?date("Y-m-d",$finance_data['firstadjusttime']):'';
		$finance_data['lastadjusttime'] = $finance_data['lastadjusttime']?date("Y-m-d",$finance_data['lastadjusttime']):'';
		$finance_data['lantime'] = $finance_data['lantime']?date("Y-m-d",$finance_data['lantime']):'';
		$finance_data['maintime'] = $finance_data['maintime']?date("Y-m-d",$finance_data['maintime']):'';
		$finance_data['img'] = $finance_data['img']?explode("|",$finance_data['img']):'';
		//print_r($finance_data['img']);exit;
		$this->assign("photos_url",$finance_data['img']);
		$this->assign("finance_data",$finance_data);
		$this->assign("roleid",$_SESSION['role_id']);
		if($_SESSION['role_id']=='4' || $_SESSION['role_id']=='') {
			$this->display('edit_4');
		} else {
			$this->display();
		}
	}
	
	function edit_post(){
		//var_dump($_POST);exit;
	if($_POST['photos_url']) {
		$_POST['img'] = implode($_POST['photos_url'],'|');
	} else {
		$_POST['img'] = '';
	}
	unset($_POST['photos_url']);
	if($this->finance_model->create()) {
			$result=$this->finance_model->save($_POST);
			if ($result!==false) {
				writelog("修改财务数据，id:".$_POST['id']);
				$this->success("修改成功！", U("Finance/index"));
			} else {
				$this->error("修改失败！");
			}
		} else {
			$this->error($this->finance_model->getError());
		}
	}
	function edit_4post(){
		//var_dump($_POST);exit;
	
	if($_POST['firstadjusttime']) {
			$_POST['firstadjusttime'] = strtotime($_POST['firstadjusttime']);
		}
		if($_POST['lastadjusttime']) {
			$_POST['lastadjusttime'] = strtotime($_POST['lastadjusttime']);
		}
		if($_POST['lantime']) {
			$_POST['lantime'] = strtotime($_POST['lantime']);
		}
		if($_POST['maintime']) {
			$_POST['maintime'] = strtotime($_POST['maintime']);
		}
	if($this->finance_model->create()) {
		$flag = $this->finance_model->where("name='".$_POST['name']."' and id<>".$_POST['id'])->find();
		if($flag) {
			$this->error("学生姓名已存在！");
		}
			$result=$this->finance_model->save($_POST);
			if ($result!==false) {
				writelog("修改财务数据，id:".$_POST['id']);
				$this->success("修改成功！", U("Finance/index"));
			} else {
				$this->error("修改失败！");
			}
		} else {
			$this->error($this->finance_model->getError());
		}
	}
	
	/**
	 *  删除
	 */
	function delete(){
		$id = intval(I("get.id"));
		if ($this->finance_model->where("id=$id")->delete()!==false) {
			writelog("删除财务数据，id:".$id);
			$this->success("删除成功！");
		} else {
			$this->error("删除失败！");
		}
	}
	function deletes(){
		$ids = $_POST['ids'];
		foreach($ids as $v) {
			if (!$this->finance_model->where("id=$v")->delete()!==false) {
				$this->error("删除失败！");
			}
			writelog("删除财务数据，id:".$v);
		}
		$this->success("删除成功！");
	}
    //
    private function _lists() {
    	$whereArr = array();
    	if($_POST['keyword']) {
    		$whereArr['name'] = $_POST['keyword'];
    		$_GET['keyword'] = $_POST['keyword'];
    		$this->assign("keyword", $_POST['keyword']);
    	}
    	if($_POST['country']) {
    		$whereArr['applycountry'] = array("like","%".$_POST['country']."%");
    		$_GET['country'] = $_POST['country'];
    		$this->assign("country", $_POST['country']);
    	}
    	if($_GET['keyword']) {
    		$whereArr['name'] = $_GET['keyword'];
    		$_GET['keyword'] = $_GET['keyword'];
    		$this->assign("keyword", $_GET['keyword']);
    	}
    	if($_GET['country']) {
    		$whereArr['applycountry'] = array("like","%".$_GET['country']."%");
    		$_GET['country'] = $_GET['country'];
    		$this->assign("country", $_GET['country']);
    	}
    	/*限制学生管理员和teamleader查看*/
    	if($_SESSION['role_id'] == 2) {
    		$whereArrs['_complex'] = array(
				'teamleader'=>$_SESSION['ADMIN_ID'],
    			'userid'=>$_SESSION['ADMIN_ID'],
	    		'_logic'=>'or'
			);
    		$appArr = M("Applystatus")->where($whereArrs)->select();
    		$str = '';
    		foreach($appArr as $v) {
    			$str.=$v['name'].",";
    		}
    		$whereArr['name'] = array("in",trim($str,','));
    	} elseif($_SESSION['role_id'] == 3) {
    		//学生管理员
    		$whereArr['userid'] = $_SESSION['ADMIN_ID'];
    	}
		$count=$this->finance_model->where($whereArr)->count();
		$page = $this->page($count, 20);
		$financeArr_tmp = $this->finance_model
		->where($whereArr)
		->order("addtime DESC")
		->limit($page->firstRow . ',' . $page->listRows)
		->select();
		//echo $this->applystatus_model->getLastSql();exit;
		foreach($financeArr_tmp as $v) {
			//$userArr = M("Users")->where(array("id"=>$v['userid']))->find();
			//$v['username'] = $userArr['user_login'];
			$v['firstadjusttime'] = $v['firstadjusttime']?date("Y-m-d",$v['firstadjusttime']):"";
			$v['lastadjusttime'] = $v['lastadjusttime']?date("Y-m-d",$v['lastadjusttime']):"";
			$v['lantime'] = $v['lantime']?date("Y-m-d",$v['lantime']):"";
			$v['maintime'] = $v['maintime']?date("Y-m-d",$v['maintime']):"";
			$v['marks'] = mb_strlen($v['mark'],"utf-8")>20?mb_substr($v['mark'],0,20,"utf-8"):$v['mark'];
			if($v['storage'] == '1') {
				$v['storage'] = "是";
			} elseif($v['storage'] == '2') {
				$v['storage'] = "否";
			} else {
				$v['storage'] = '';
			}
			$financeArr[] = $v;
		}
		//print_r($userid_arr);exit;
		//print_r($applystatusArr);exit;
		$this->assign("formget",$_GET);
		$this->assign("page", $page->show('Admin'));
		$this->assign("roleid", $_SESSION['role_id']);
		$this->assign("financeArr",$financeArr);
    }
    private function _lists_export() {
    	$whereArr = array();
    	if($_POST['keyword']) {
    		$whereArr['name'] = $_POST['keyword'];
    	}
    	if($_POST['country']) {
    		$whereArr['applycountry'] = array("like","%".$_POST['country']."%");
    	}
    	/*限制学生管理员和teamleader查看*/
    	if($_SESSION['role_id'] == 2) {
    		$whereArrs['_complex'] = array(
				'teamleader'=>$_SESSION['ADMIN_ID'],
    			'userid'=>$_SESSION['ADMIN_ID'],
	    		'_logic'=>'or'
			);
    		$appArr = M("Applystatus")->where($whereArrs)->select();
    		$str = '';
    		foreach($appArr as $v) {
    			$str.=$v['name'].",";
    		}
    		$whereArr['name'] = array("in",trim($str,','));
    	} elseif($_SESSION['role_id'] == 3) {
    		//学生管理员
    		$whereArr['userid'] = $_SESSION['ADMIN_ID'];
    	}
		//$count=$this->finance_model->where($whereArr)->count();
		//$page = $this->page($count, 20);
		$financeArr_tmp = $this->finance_model
		->where($whereArr)
		->order("addtime DESC")
		->select();
		//echo $this->applystatus_model->getLastSql();exit;
		foreach($financeArr_tmp as $v) {
			//$userArr = M("Users")->where(array("id"=>$v['userid']))->find();
			//$v['username'] = $userArr['user_login'];
			$v['firstadjusttime'] = $v['firstadjusttime']?date("Y-m-d",$v['firstadjusttime']):"";
			$v['lastadjusttime'] = $v['lastadjusttime']?date("Y-m-d",$v['lastadjusttime']):"";
			$v['lantime'] = $v['lantime']?date("Y-m-d",$v['lantime']):"";
			$v['maintime'] = $v['maintime']?date("Y-m-d",$v['maintime']):"";
			$v['marks'] = mb_strlen($v['mark'],"utf-8")>20?mb_substr($v['mark'],0,20,"utf-8"):$v['mark'];
			if($v['storage'] == '1') {
				$v['storage'] = "是";
			} elseif($v['storage'] == '2') {
				$v['storage'] = "否";
			} else {
				$v['storage'] = '';
			}
			$financeArr[] = $v;
		}
		$this->assign("financeArr",$financeArr);
    }
    private function getTeamLeader() {
    	//取出teamleader列表
		$role_user_join = C('DB_PREFIX').'role_user as b on u.id =b.user_id';
		$teamleaderArr=M("Users")->alias("u")->join($role_user_join)->where(array("role_id"=>2))->select();
		foreach($teamleaderArr as $v) {
			$teamleaderArr_id[$v['id']] = $v['user_login'];
		}
		return $teamleaderArr_id;
    }
    //导出数据
    private function export() {
    	//print_r($this->applystatusArr);exit;
    	require_once './public/PHPExcel.php';
        $obpe_pro = $obpe->getProperties();
        $obpe_pro->setCreator('midoks')
                 ->setLastModifiedBy('2013/2/16 15:00')
                 ->setTitle('data')
                 ->setSubject('beizhu')
                 ->setDescription('miaoshu')
                 ->setKeywords('keyword')
                 ->setCategory('catagory');
        $obpe->setactivesheetindex(0);
        $obpe->getActiveSheet()->setTitle('财务数据');
        $obpe->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $obpe->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $title = array('name'=>'学生','applycountry'=>'申请国家','payment'=>'缴费','storage'=>'协议是否入库','firstadjusttime'=>'初次绩效核算','lastadjusttime'=>'末次绩效核算','lanpayment'=>'语言课佣金','lantime'=>'到帐时间','mainpayment'=>'主课佣金','maintime'=>'到帐时间','mark'=>'绩效扣发');
        $arr = $this->financeArr;
        array_unshift($arr,$title);
        $obpe->getActiveSheet()->getColumnDimension('B')->setWidth(10);
        $obpe->getActiveSheet()->getColumnDimension('C')->setWidth(10);
        $obpe->getActiveSheet()->getColumnDimension('D')->setWidth(12);
        $obpe->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $obpe->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $obpe->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $obpe->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $obpe->getActiveSheet()->getColumnDimension('I')->setWidth(15);
        $obpe->getActiveSheet()->getColumnDimension('J')->setWidth(15);
        $obpe->getActiveSheet()->getColumnDimension('K')->setWidth(15);
        foreach($arr as $k=>$v){
            $k = $k+1;
            //$obpe->getactivesheet()->setcellvalue('A'.$k, $v['username']);
            $obpe->getactivesheet()->setcellvalue('A'.$k, $v['name']);
            $obpe->getactivesheet()->setcellvalue('B'.$k, $v['applycountry']);
            $obpe->getactivesheet()->setcellvalue('C'.$k, $v['payment']);
            $obpe->getactivesheet()->setcellvalue('D'.$k, $v['storage']);
            $obpe->getactivesheet()->setcellvalue('E'.$k, $v['firstadjusttime']);
            $obpe->getactivesheet()->setcellvalue('F'.$k, $v['lastadjusttime']);
            $obpe->getactivesheet()->setcellvalue('G'.$k, $v['lanpayment']);
            $obpe->getactivesheet()->setcellvalue('H'.$k, $v['lantime']);
            $obpe->getactivesheet()->setcellvalue('I'.$k, $v['mainpayment']);
            $obpe->getactivesheet()->setcellvalue('J'.$k, $v['maintime']);
            $obpe->getactivesheet()->setcellvalue('K'.$k, $v['mark']);
        }
        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
        header('Content-Type:application/force-download');
        header('Content-Type:application/vnd.ms-execl');
        header('Content-Type:application/octet-stream');
        header('Content-Type:application/download');
        header("Content-Disposition:attachment;filename='".date("Y年m月d日")."财务数据.xls'");
        header('Content-Transfer-Encoding:binary');
        $obwrite->save('php://output');
    }
}