<?php
class DailiController extends Controller{

 	function  __construct() {
		$this->layout('daili');
	}
	function auto_login(){
	
	}
	
	function index(){
		$uid = $this->Session->read('Agent.uid');
		if(!($uid>0)){ $this->jump(SITE_URL.'daili.php?act=login'); exit;} 
		$this->title("代理中心".' - '.$GLOBALS['LANG']['site_name']);
		$sql = "SELECT * FROM `{$this->App->prefix()}user` WHERE user_id ='{$uid}' LIMIT 1";
		$rt = $this->App->findrow($sql);
		$this->set('rt',$rt);
		$this->template('index');
	}
	
	function dailiinfo(){
		$uid = $this->Session->read('Agent.uid');
		if(!($uid>0)){ $this->jump(SITE_URL.'daili.php?act=login'); exit;} 
		$this->title("代理中心".' - '.$GLOBALS['LANG']['site_name']);
		$sql = "SELECT * FROM `{$this->App->prefix()}user` WHERE user_id ='{$uid}' LIMIT 1";
		$rt['userinfo'] = $this->App->findrow($sql);
		
		$rt['province'] = $this->action('user','get_regions',1);  //获取省列表
		
		//当前用户的收货地址
		$sql = "SELECT * FROM `{$this->App->prefix()}user_address` WHERE user_id='$uid' AND is_own='1' LIMIT 1";
		$rt['userress'] = $this->App->findrow($sql);

		if($rt['userress']['province']>0) $rt['city'] = $this->action('user','get_regions',2,$rt['userress']['province']);  //城市
		if($rt['userress']['city']>0) $rt['district'] = $this->action('user','get_regions',3,$rt['userress']['city']);  //区	
		
		$this->set('rt',$rt);
		$this->template('dailiinfo');
	}
	
	function updatepass(){
		$uid = $this->Session->read('Agent.uid');
		if(!($uid>0)){ $this->jump(SITE_URL.'daili.php?act=login'); exit;} 
		$this->title("代理中心".' - '.$GLOBALS['LANG']['site_name']);
		
		$this->template('updatepass');
	}
	
	function dailisiteset(){
		$uid = $this->Session->read('Agent.uid');
		if(!($uid>0)){ $this->jump(SITE_URL.'daili.php?act=login'); exit;} 
		$this->title("代理中心".' - '.$GLOBALS['LANG']['site_name']);
		
		$sql = "SELECT * FROM `{$this->App->prefix()}udaili_siteset` WHERE uid='$uid' LIMIT 1";
		$rt['info'] = $this->App->findrow($sql);
		
		if(isset($rt['info']['kefucode'])&&!empty($rt['info']['kefucode'])){
			$rt['info']['kefucode'] = Import::basic()->str2html($rt['info']['kefucode']);
		}
		
		$this->set('siteinfo',$this->App->findrow("SELECT * FROM `{$this->App->prefix()}systemconfig` LIMIT 1"));
		$this->set('rt',$rt);
		$this->template('dailisiteset');
	}
	
	function ajax_update_daili_siteset($data=array()){
		$uid = $this->Session->read('Agent.uid');
		$json = Import::json();
		$result = array('error' => 2, 'message' => '传送的数据为空！');
		if(empty($data['fromAttr']))  die($json->encode($result));
		$fromAttr = $json->decode($data['fromAttr']); //反json ,返回值为对象
		unset($data);
		
		if(empty($uid)){
			$result = array('error' => 6, 'message' => '先你先登录！');
			die($json->encode($result));
		}
		
		$sql = "SELECT id FROM `{$this->App->prefix()}udaili_siteset` WHERE uid='$uid' LIMIT 1";
		$id = $this->App->findvar($sql);
		
		$data = array();
		$data['uid'] = $uid;
		$data['logo'] = $fromAttr->logo;
		$data['sitename'] = $fromAttr->sitename;
		$data['sitetitle'] = $fromAttr->sitetitle;
		$data['metakey'] = $fromAttr->metakey;
		$data['metadesc'] = $fromAttr->metadesc;
		$data['kefucode'] = $fromAttr->kefucode;
		if(!empty($data['kefucode'])){
			$data['kefucode'] = Import::basic()->html2str($data['kefucode']);
		}
		if($id > 0){
			$this->App->update('udaili_siteset',$data,'id',$id);
		}else{
			$this->App->insert('udaili_siteset',$data);
		}
		
		$result = array('error' => 0, 'message' => '');
		die($json->encode($result));
	}

	function dailiads(){
		$this->title("代理中心".' - 收货地址 - '.$GLOBALS['LANG']['site_name']);
		$uid = $this->Session->read('Agent.uid');
		if(!($uid>0)){ $this->jump(SITE_URL.'daili.php?act=login'); exit;} 
		$pid = isset($_GET['id']) ? $_GET['id'] : 0;
		if($pid>0){
			$sql = "SELECT ad_img FROM `{$this->App->prefix()}ad_content` WHERE pid='{$pid}' AND uid='$uid' LIMIT 1";
			$vv = $this->App->findvar($sql);
			if(!empty($vv)){
				Import::fileop()->delete_file(SYS_PATH.$vv); //删除文件
				$q = dirname($vv);
				$h = basename($vv);
				Import::fileop()->delete_file(SYS_PATH.$q.DS.'thumb_s'.DS.$h);
				Import::fileop()->delete_file(SYS_PATH.$q.DS.'thumb_b'.DS.$h);
			}
			$this->App->delete('ad_content','pid',$pid);
			$this->jump(SITE_URL.'daili.php?act=dailiads');exit;
		}
		
		//分页
	    $page= isset($_GET['page']) ? $_GET['page'] : '';
		if(empty($page)){
			  $page = 1;
		}
		$list = 8;
		$start = ($page-1)*$list;
		$sql = "SELECT COUNT(pid) FROM `{$this->App->prefix()}ad_content`";
		$tt = $this->App->findvar($sql);
		$pagelink = Import::basic()->getpage($tt, $list, $page,'?page=',true);
		$this->set("pages",$pagelink);
		
	   $sql ="SELECT tb1.*,tb2.ad_name AS ad_tag FROM `{$this->App->prefix()}ad_content` AS tb1";
	   $sql .=" LEFT JOIN `{$this->App->prefix()}ad_position` AS tb2";
	   $sql .=" ON tb1.tid = tb2.tid";
	   $sql .=" WHERE tb1.uid='$uid' ORDER BY tb1.uptime LIMIT $start,$list"; 
	   $this->set('adslist',$this->App->find($sql));
	   $this->template('dailiads');
	}
	
	function dailiadsinfo(){
		$this->title("代理中心".' - 收货地址 - '.$GLOBALS['LANG']['site_name']);
		$uid = $this->Session->read('Agent.uid');
		if(!($uid>0)){ $this->jump(SITE_URL.'daili.php?act=login'); exit;} 
		
		$sql = "SELECT ad_name,tid FROM `{$this->App->prefix()}ad_position` WHERE is_show='1'";
		$rts = $this->App->find($sql);
		$rt = array();
		$pid = isset($_GET['id']) ? $_GET['id'] : 0;
		if($pid > 0){
			$sql = "SELECT * FROM `{$this->App->prefix()}ad_content` WHERE pid='{$pid}' AND uid='$uid' LIMIT 1";
			$rt = $this->App->findrow($sql);
		}
		$this->set('catelist',$this->action('catalog','get_goods_cate_tree'));
		$this->set('rts',$rts);
		$this->set('rt',$rt);
		$this->template('dailiadsinfo');
	}
	
	function ajax_daili_upload_ads($data=array()){
		$uid = $this->Session->read('Agent.uid');
		$json = Import::json();
		$result = array('error' => 2, 'message' => '传送的数据为空！');
		if(empty($data['fromAttr']))  die($json->encode($result));
		$fromAttr = $json->decode($data['fromAttr']); //反json ,返回值为对象
		unset($data);
				
		if(empty($uid)){
			$result = array('error' => 6, 'message' => '先你先登录！');
			die($json->encode($result));
		}

		$ad_img = $fromAttr->ad_img;
		if(empty($ad_img)){
			$result = array('error' => 6, 'message' => '请先上传广告图！');
			die($json->encode($result));
		}
		$tids = $fromAttr->tids;
		$cat_id = $fromAttr->cat_id;
		$ad_name = $fromAttr->ad_name;
		if(empty($ad_name)){
			$result = array('error' => 6, 'message' => '填写广告名称！');
			die($json->encode($result));
		}
		$ad_url = $fromAttr->ad_url;
		$remark = $fromAttr->remark;
		$is_show = $fromAttr->is_show;
		$pid = $fromAttr->pid;
		$type = $fromAttr->type;
		
		$dd = array();
		$dd['uid'] = $uid;
		$dd['remark'] = $remark;
		$dd['tid'] = $tids;
		$dd['cat_id'] = $cat_id;
		$dd['ad_url'] = $ad_url;
		$dd['ad_name'] = $ad_name;
		$dd['ad_img'] = $ad_img;
		$dd['is_show'] = $is_show;
		$dd['type'] = $type;
		
		if($pid > 0){
			$dd['uptime'] = mktime();
			if($this->App->update('ad_content',$dd,'pid',$pid)){
				$result = array('error' => 0, 'message' => '');
			}else{
				$result = array('error' => 6, 'message' => '更新失败');
			}
		}else{
			$dd['addtime'] = mktime();
			$dd['uptime'] = mktime();
			if($this->App->insert('ad_content',$dd)){
				$result = array('error' => 0, 'message' => '');
			}else{
				$result = array('error' => 6, 'message' => '添加失败');
			}
		}
		
		die($json->encode($result));
	}
	
	function login(){
		$this->title("代理中心".' - 代理登录 - '.$GLOBALS['LANG']['site_name']);
		$this->template('login');
	}
	
	function ajax_daili_login($data=array()){
		$uid = $this->Session->read('Agent.uid');
		$json = Import::json();
		$result = array('error' => 2, 'message' => '传送的数据为空！');
		if(empty($data['fromAttr']))  die($json->encode($result));
		$fromAttr = $json->decode($data['fromAttr']); //反json ,返回值为对象
		unset($data);
				
		$mobile_phone = $fromAttr->mobile_phone;
		$password = $fromAttr->password;
		if(empty($mobile_phone) || empty($password)){
			$result = array('error' => 2, 'message' => '请输入完整信息!');
			die($json->encode($result));
		}
			
		$sql = "SELECT mobile_phone,password,user_id,active,last_login,last_ip FROM `{$this->App->prefix()}user` WHERE mobile_phone='$mobile_phone' AND user_rank!='1' LIMIT 1";
		$rt = $this->App->findrow($sql);
		$pass = isset($rt['password'])?$rt['password'] : '';
		$uid = isset($rt['user_id'])?$rt['user_id'] : '';
		if(empty($pass)){
			$result = array('error' => 2, 'message' => '该账户不存在!');
			die($json->encode($result));
		}
		if($pass==md5(trim($password))){
			$this->Session->write('Agent.uid',$uid);
			$this->Session->write('Agent.username',$rt['mobile_phone']);
			$this->Session->write('Agent.active',$rt['active']);
			$this->Session->write('Agent.lasttime',$rt['last_login']);
			$this->Session->write('Agent.lastip',$rt['last_ip']);
			$datas = array();
			$ip = Import::basic()->getip();
			$datas['last_ip'] = empty($ip) ? '0.0.0.0' : $ip;
			$datas['last_login'] = mktime();
			$datas['visit_count'] = '`visit_count`+1';
			$this->App->update('user',$datas,'user_id',$uid); //更新
										
			$result = array('error' => 0, 'message' => '登录成功!');
			die($json->encode($result));
		}else{
			$result = array('error' => 2, 'message' => '密码错误!');
			die($json->encode($result));
		}
	}
	
	//退出登录
	function logout(){ 
		$this->Session->write('Agent',null);
		$this->jump(SITE_URL.'daili.php?act=login'); exit;
	}
	
	function get_diali_info(){
		$uid = $this->Session->read('Agent.uid');
		$sql = "SELECT * FROM `{$this->App->prefix()}user` WHERE user_id='$uid' LIMIT 1";
		$rt = $this->App->findrow($sql);
		//我的资金
		
		//我的邀请数
		
		//我的成功推荐
		
		return $rt;
	}
}
?>