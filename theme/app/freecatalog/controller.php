<?php
class FreecatalogController extends Controller{

 	function  __construct() {
		$this->js(array('jquery.json-1.3.js','common.js','jquery_dialog.js'));//将js文件放到页面头
		$this->css(array('comman.css','style.css','jquery_dialog.css'));
	}
	
	function index(){

		$rt['province'] = $this->action('user','get_regions',1);  //获取省列表
		$fn = SYS_PATH.'data/freecatalogdata.php';
		file_exists($fn) ? require_once($fn) : $freecatalog = array();
		$rt['freecatalog'] = $freecatalog;
		$fns = SYS_PATH.'data/freecatalogdata_photo.php';
		file_exists($fns) ? require_once($fns) : $freecatalog_ptoto = array();;
		$rt['freecatalog_ptoto'] = $freecatalog_ptoto;
		
		$this->set('rt',$rt);
		//设置页面meta
		$title = '免费索取目录-用户评论';
		$this->title($title.' - '.$GLOBALS['LANG']['site_name']);
		$this->meta("title",$title);
		$this->meta("keywords",$title);
		$this->meta("description",$title);
		$this->template('freecatalog');
	}
	
	function ajax_get_freecatalog($data=array()){
		$err = 0;
		$result = array('error' => $err, 'message' => '');
		$json = Import::json();

		if (empty($data))
		{
				$result['error'] = 2;
				echo $result['message'] = '传送的数据为空！'; exit;
				//die($json->encode($result));
		}
		$mesobj = $json->decode($data); //反json ,返回值为对象
		
			
	    $is_freecatalog_time = $this->Session->read("User.is_freecatalog_time");
		if(!empty($is_freecatalog_time) && (mktime()-$is_freecatalog_time) < 1000){
				$result['error'] = 2;
				echo $result['message'] = '你已经提交过了，请歇歇吧 ！'; exit;
				//die($json->encode($result));
		}
		//以下字段对应评论的表单页面 一定要一致
		$dir_ids = $mesobj->dir_ids;
		//$s = str_replace('++',"",$dir_ids);
		if(empty($dir_ids))
		{
				$result['error'] = 2;
				echo $result['message'] = '请选择您想索取的目录 ！'; exit;
				//die($json->encode($result));
		}
		
		$fn = SYS_PATH.'data/freecatalogdata.php';
		file_exists($fn) ? require_once($fn) : $freecatalog = array();
		if(empty($freecatalog)){
				$result['error'] = 2;
				echo $result['message'] = '管理需要现在后台设置好提取目录在执行！'; exit;
				//die($json->encode($result));
		}
		
		$dir_ids_rt = explode("--",$dir_ids);
		$dbids = array();
		foreach($dir_ids_rt as $k=>$hh){
			$hh = intval($hh)-1;
			$dbids[] = $freecatalog[$hh];
		}
		$datas['dir_ids'] = !empty($dbids) ? implode('、&nbsp;',$dbids) : "";

		unset($dir_ids_rt,$dbids);
		
		$datas['user_name'] = $mesobj->username;
		if(empty($datas['user_name']))
		{
				$result['error'] = 2;
				echo $result['message'] = '姓名不能为空 ！'; exit;
				//die($json->encode($result));
		}
		$datas['birthday'] = $mesobj->birthday;
		$datas['user_id'] = $mesobj->user_no; //顾客号
		$datas['sex'] = $mesobj->sex;
		$datas['province'] = $mesobj->province;
		$datas['city'] = $mesobj->city;
		$datas['district'] = $mesobj->district;
		$datas['address'] = $mesobj->address;
		if(empty($datas['province']) || empty($datas['city']) || empty($datas['district']) || empty($datas['address']))
		{
				$result['error'] = 2;
				echo $result['message'] = '请填写好完整的地址 ！'; exit;
				//die($json->encode($result));
		}
		$datas['postcode'] = $mesobj->postcode;
		$datas['dayphone'] = $mesobj->dayphone;
		$datas['nightphone'] = $mesobj->nightphone;
		$datas['mobile'] = $mesobj->mobile;
		if(empty($datas['mobile']))
		{
				$result['error'] = 2;
				echo $result['message'] = '手机不能为空 ！'; exit;
				//die($json->encode($result));
		}
		$datas['email'] = $mesobj->email;

		$datas['addtime'] = mktime();
		$ip = Import::basic()->getip();
		$datas['ip_address'] = $ip ? $ip : '0.0.0.0';
		$datas['ip_from'] = Import::ip()->ipCity($ip);

		if($this->App->insert('freecatalog',$datas)){
			$result['error'] = 0;
			$result['message'] ='你已经提交，我们很快会联系你！';
			$this->Session->write("User.is_freecatalog_time",mktime());
		}else{
			$result['error'] = 1;
			$result['message']='提交失败，请通过在线联系客服吧！';
		}
		unset($datas,$data);
		echo $result['message']; exit;
		die($json->encode($result));
	}
}
?>