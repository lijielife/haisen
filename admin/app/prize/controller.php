<?php
class PrizeController extends Controller{
 	function  __construct() {
           $this->css('content.css');
	}
	
	//抽奖设置
	function prize($data=array()){
		$sql = 'select * FROM `gz_lottery` order by id asc';
		$lt_list = $this->App->find($sql);
		$sql = "select * FROM `gz_lottery_set` where id=1";
		$rts = $this->App->findrow($sql);

		if(!empty($_POST)){
			$this->App->update('lottery_set',array('num'=>$_POST['num'],'content'=>$_POST['content'],'end_time'=>strtotime($_POST['end_time'])),'id','1');
			$this->App->update('lottery',array('lt_prize'=>$_POST['lt_prize1'],'lt_name'=>$_POST['lt_name1'],'lt_allowed'=>$_POST['lt_allowed1'],'lt_v'=>$_POST['lt_v1']),'id','1');
			$this->App->update('lottery',array('lt_prize'=>$_POST['lt_prize2'],'lt_name'=>$_POST['lt_name2'],'lt_allowed'=>$_POST['lt_allowed2'],'lt_v'=>$_POST['lt_v2']),'id','2');
			$this->App->update('lottery',array('lt_prize'=>$_POST['lt_prize3'],'lt_name'=>$_POST['lt_name3'],'lt_allowed'=>$_POST['lt_allowed3'],'lt_v'=>$_POST['lt_v3']),'id','3');
			$this->App->update('lottery',array('lt_prize'=>$_POST['lt_prize4'],'lt_name'=>$_POST['lt_name4'],'lt_allowed'=>$_POST['lt_allowed4'],'lt_v'=>$_POST['lt_v4']),'id','4');
			$this->App->update('lottery',array('lt_prize'=>$_POST['lt_prize5'],'lt_name'=>$_POST['lt_name5'],'lt_allowed'=>$_POST['lt_allowed5'],'lt_v'=>$_POST['lt_v5']),'id','5');
			$this->App->update('lottery',array('lt_prize'=>$_POST['lt_prize6'],'lt_name'=>$_POST['lt_name6'],'lt_allowed'=>$_POST['lt_allowed6'],'lt_v'=>$_POST['lt_v6']),'id','6');
			$this->App->update('lottery',array('lt_prize'=>$_POST['lt_prize7'],'lt_name'=>$_POST['lt_name7'],'lt_allowed'=>$_POST['lt_allowed7'],'lt_v'=>$_POST['lt_v7']),'id','7');
			$this->action('common','showdiv',$this->getthisurl());
			$rt = $_POST;
			}
		
		$this->set('rt',$lt_list);	
		$this->set('rts',$rts);
		$this->template('prize');
	}
	
	function prize_list()
		{
			//分页
			$page= isset($_GET['page']) ? $_GET['page'] : '';
			if(empty($page)){
				  $page = 1;
			}
			$list = 10;
			$start = ($page-1)*$list;
			$sql = "SELECT COUNT(id) FROM `{$this->App->prefix()}lottery_user";
			$tt = $this->App->findvar($sql);
			$pagelink = Import::basic()->getpage($tt, $list, $page,'?page=',true);
			$this->set("pagelink",$pagelink);
	
			$sql = "SELECT u.nickname,l.uid,l.id,l.create_time,j.lt_prize,j.lt_name FROM `{$this->App->prefix()}lottery_user` AS l LEFT JOIN `{$this->App->prefix()}user` AS u ON u.user_id = l.uid LEFT JOIN `{$this->App->prefix()}lottery` AS j ON l.lt_id = j.id order by l.id desc LIMIT $start,$list";
			//echo $sql;exit;
			$rt = $this->App->find($sql);
			$this->set('rt',$rt);
			$this->set('page',$page);
			
			$this->template('prize_list');
		}
		
	function ajax_deldpall($ids){
		if(empty($ids)){ echo "删除ID为空！"; exit;}
		$arr = explode('+',$ids);
		foreach($arr as $id){
		  $this->App->delete('lottery_user','id',$id);
		}
		$this->action('system','add_admin_log','删除中奖名单：ID为'.implode(',',$arr));
	}
		
	function ajax_deldp($id=0){		
		if(empty($id) || !(Import::basic()->int_preg($id))){ echo "非法删除！删除ID为空或者不合法！"; return false;}
		if(!($this->App->delete('lottery_user','id',$id))){

			echo "删除中发生意外错误！";	
		}
	}
	
}
?>