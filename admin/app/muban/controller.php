<?php
class MubanController extends Controller{
 	function  __construct() {
           $this->css('content.css');
	}
	
	function index($data=array()){ 
		$thismubanid = $this->App->findvar("SELECT mubanid FROM `{$this->App->prefix()}systemconfig` WHERE type = 'basic' LIMIT 1");
		$this->set('thismubanid',$thismubanid);
		
		$arr = array();
		for($i=1;$i<25;$i++){
			$arr[$i]['img'] = ADMIN_URL.'images/muban/'.$i.'.png';
		}
		$arr = array();
/*		$arr['1']['img'] = ADMIN_URL.'images/muban/1.png';
		$arr['3']['img'] = ADMIN_URL.'images/muban/3.png';
		$arr['11']['img'] = ADMIN_URL.'images/muban/11.png';
		$arr['15']['img'] = ADMIN_URL.'images/muban/15.png';
		$arr['24']['img'] = ADMIN_URL.'images/muban/24.png';*/
		$arr['25']['img'] = ADMIN_URL.'images/muban/25.png';
		$this->set('arr',$arr);
		$this->template('index');
	}
	
	function ajax_save_muban($data=array()){ 
		$id = $data['id'];
		if($this->App->update('systemconfig',array('mubanid'=>$id),'type','basic')){
			echo "保存成功";
		}else{
			echo "保存失败";
		}
		exit;
	}
	
}
?>