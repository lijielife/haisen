<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class UserController extends AdminbaseController{
	protected $users_model,$role_model;
	
	function _initialize() {
		parent::_initialize();
		$this->users_model = D("Common/Users");
		$this->role_model = D("Common/Role");
	}
	function index(){
		$count=$this->users_model->where(array("user_type"=>1))->count();
		$page = $this->page($count, 20);
		if($_SESSION['role_id'] == 2) {
			$userid_arr = M("Tl_xs")->field("xsid")->where(array("tlid"=>$_SESSION['ADMIN_ID']))->select();
			foreach($userid_arr as $v) {
				$useridArr[] = $v['xsid']; 
			}
			$users = $this->users_model
			->where(array("user_type"=>1,"id"=>array("in",$useridArr)))
			->order("create_time DESC")
			->limit($page->firstRow . ',' . $page->listRows)
			->select();
		} else {
			$users = $this->users_model
			->where(array("user_type"=>1))
			->order("create_time DESC")
			->limit($page->firstRow . ',' . $page->listRows)
			->select();
		}
		//print_r($userid_arr);exit;
		
		$roles_src=$this->role_model->select();
		$roles=array();
		foreach ($roles_src as $r){
			$roleid=$r['id'];
			$roles["$roleid"]=$r;
		}
		$this->assign("page", $page->show('Admin'));
		$this->assign("roles",$roles);
		foreach($users as $k=>$v) {
			if($v['id']!=1) {
				$roleArr = M('Role_user')->where('user_id='.$v['id'])->find();
				foreach($roles as $r) {
					if($roleArr['role_id']==$r['id']) {
						$v['rolename'] = $r['name'];
					}
				}
				if($roleArr['role_id']==3) {
					$tlArr = M("Tl_xs")->where('xsid='.$v['id'])->find();
					if($tlArr) {
						$tlnameArr = M("Users")->where('id='.$tlArr['tlid'])->find();
						$v['teamleader'] = $tlnameArr['user_login'];
					}
				}
			} else {
				$v['rolename'] = '超级管理员';
			}
			$users_tmp[] = $v;
		}
		$this->assign("users",$users_tmp);
		$this->display();
	}
	
	
	function add(){
		//$num = $this->users_model->where("uid=".$_GET['uid'])->count();
		//if($num>0)
		$this->assign('uid',$_GET['uid']);
		$this->display();
	}
	
	function add_post(){
		if(IS_POST){
			if ($this->users_model->create()) {
				if($_SESSION['ADMIN_ID']==1) {
					$_POST['isadd'] = 1;//有权限添加下级，B
				} else {
					$_POST['isadd'] = 2;//无权限添加下级,C
				}
				//print_r($_POST);exit;
				$result=$this->users_model->add($_POST);
				if ($result!==false) {
					$role_user_model=M("RoleUser");
					$role_user_model->add(array("role_id"=>2,"user_id"=>$result));
					$this->success("添加成功！", U("usergroup/index"));
				} else {
					$this->error("添加失败！");
				}
			} else {
				$this->error($this->users_model->getError());
			}
		}
	}
	
	
	function edit(){
		//$this->assign('uid',$_GET['uid']);
		$uid= intval(I("get.uid"));
		$user=$this->users_model->where(array("uid"=>$uid))->find();
		$this->assign($user);
		$this->assign('uid',$uid);
		$this->display();
	}
	
	function edit_post(){
		if (IS_POST) {
				if(empty($_POST['user_pass'])){
					unset($_POST['user_pass']);
				}
				if(!$_POST['user_login']){
					$this->error("用户名不能为空!");
				}
				if($this->users_model->where("uid!=".$_POST['uid']." and user_login='".$_POST['user_login']."'")->count()>0) {
					$this->error("用户名已存在!");
				}
				$result=$this->users_model->where("uid=".$_POST['uid'])->save($_POST);
				if ($result!==false) {
					$this->success("保存成功！");
				} else {
					$this->error("保存失败！");
				}
		}
	}
	
	/**
	 *  删除
	 */
	function delete(){
		$id = intval(I("get.id"));
		if($id==1){
			$this->error("最高管理员不能删除！");
		}
		
		if ($this->users_model->where("id=$id")->delete()!==false) {
			M("RoleUser")->where(array("user_id"=>$id))->delete();
			$this->success("删除成功！");
		} else {
			$this->error("删除失败！");
		}
	}
	
	
	function userinfo(){
		$id=get_current_admin_id();
		$user=$this->users_model->where(array("id"=>$id))->find();
		$this->assign($user);
		$this->display();
	}
	
	function userinfo_post(){
		if (IS_POST) {
			$_POST['id']=get_current_admin_id();
			$create_result=$this->users_model
			->field("user_login,user_email,last_login_ip,last_login_time,create_time,user_activation_key,user_status,role_id,score,user_type",true)//排除相关字段
			->create();
			if ($create_result) {
				if ($this->users_model->save()!==false) {
					$this->success("保存成功！");
				} else {
					$this->error("保存失败！");
				}
			} else {
				$this->error($this->users_model->getError());
			}
		}
	}
	
	    function ban(){
        $id=intval($_GET['id']);
    	if ($id) {
    		$rst = $this->users_model->where(array("id"=>$id,"user_type"=>1))->setField('user_status','0');
    		if ($rst) {
    			$this->success("管理员停用成功！", U("user/index"));
    		} else {
    			$this->error('管理员停用失败！');
    		}
    	} else {
    		$this->error('数据传入失败！');
    	}
    }
    
    function cancelban(){
    	$id=intval($_GET['id']);
    	if ($id) {
    		$rst = $this->users_model->where(array("id"=>$id,"user_type"=>1))->setField('user_status','1');
    		if ($rst) {
    			$this->success("管理员启用成功！", U("user/index"));
    		} else {
    			$this->error('管理员启用失败！');
    		}
    	} else {
    		$this->error('数据传入失败！');
    	}
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
	
	
	
}