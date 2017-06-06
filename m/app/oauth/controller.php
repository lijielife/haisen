<?php
class OauthController extends Controller{

 	function  __construct() {
		//$this->js(array('jquery.json-1.3.js','goods.js?v=v17','time.js'));//将js文件放到页面头
	}
	
	/*析构函数*/
	function  __destruct() {
        unset($rt);
    }
	
	
	
	function index($id=0){ 
	    //error_reporting(E_ALL);
		$oid = $_GET['oid'];
		$_SESSION['wx_oid'] = $oid;
		$getoid = 'oid=' . $oid;
		
		$appid = $this->App -> findvar("SELECT appid FROM `{$this->App->prefix()}wxuserset`");
		$cfg_baseurl = Import::basic()->siteurl(); 
	
		$back_url = $cfg_baseurl . 'oauth.php?action=back_url&' . $getoid;
		$redirect_uri = urlencode($back_url);
		$state = 'wechat';
		$scope = 'snsapi_base';
		$oauth_url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $appid . '&redirect_uri=' . $redirect_uri . '&response_type=code&scope=' . $scope . '&state=' . $state . '#wechat_redirect';
	
		//file_put_contents("/wwwroot/custom_fenxiao/wxlogin.log","oauth ".$redirect_uri.PHP_EOL,FILE_APPEND);
	
		header('Expires: 0');
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
		header('Cache-Control: no-store, no-cahe, must-revalidate');
		header('Cache-Control: post-chedk=0, pre-check=0', false);
		header('Pragma: no-cache');
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $oauth_url");
	}
	
	function back_url(){
		 if(!empty($_SESSION['wx_oid'])) {
			$oid = $_SESSION['wx_oid'];
		} else {
			if(isset($_GET['oid'])) {
				$oid = $_GET['oid'];
			} else {
				$oid = '';
			}
		} 
		$wxch_config = $this->App->findrow("SELECT * FROM `{$this->App->prefix()}wxuserset`");
		$appid = $wxch_config['appid'];
		$appsecret = $wxch_config['appsecret'];
		$code = !empty($_GET['code']) ? $_GET['code'] : '';
		$url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$appsecret.'&code='.$code.'&grant_type=authorization_code'; 
		$url = preg_replace('/\s/','',$url);
		//echo "url:".$url;
       
		 $ret_json = $this->curl_get_contents($url);
		//print_r($ret_json);
		//exit;
		
		$ret = json_decode($ret_json);
		$openid = $ret->openid;
		$openid = !empty($ret->openid) ? $ret->openid : '';
		//$access_token = $ret->access_token;
		$access_token = !empty($ret->access_token) ? $ret->access_token : '';
		$back_url = $this->App->findvar("SELECT `contents` FROM `{$this->App->prefix()}oauth` WHERE `oid` = '$oid'");
		// 取得上家id
		$affiliate_id = $this->App->findvar("SELECT `quid` FROM `{$this->App->prefix()}user` WHERE `wecha_id` = '$openid'");
		if($affiliate_id>=1){
			$affiliate = '?u='.$affiliate_id;
			if(strpos($back_url,".php")==false){
				$back_url = $back_url."/index.php".$affiliate;
			}elseif(strpos($back_url,"?")>0){
				$affiliate = '&u='.$affiliate_id;
				$back_url = $back_url.$affiliate;
			}else{
				$back_url = $back_url.$affiliate;
			}
		}
		//跟新链接访问次数
		//$update_sql = "UPDATE `gz_oauth` SET `count` = `count` + 1 WHERE `oid` = $oid; ";
		$count = $this->App->findvar("select `count` from `{$this->App->prefix()}oauth` where `oid`='{$oid}'");
		$d['count'] = $count+1;
		$this->App->update('oauth',$d,'oid',$oid);
		if(!empty($openid) && strlen($openid) == 28){
			
			$rt = $this->App->findrow("SELECT * FROM `{$this->App->prefix()}user` WHERE `wecha_id` = '$openid'");
			//$_SESSION['wxid'] = $openid; 
			// 模拟登陆
		
				$ip = Import::basic()->getip();
				$datas['last_ip'] = empty($ip) ? '0.0.0.0' : $ip;
				$datas['last_login'] = mktime();
				$datas['visit_count'] = '`visit_count`+1';
				$this->Session->write('Agent.prevtime',$rt['last_login']); //记录上一次的登录时间
				
				$this->App->update('user',$datas,'user_id',$rt['user_id']); //更新
				$this->Session->write('User.username',$rt['user_name']);
				
				$this->Session->write('User.uid',$rt['user_id']);
				$this->Session->write('User.active','1');
				$this->Session->write('User.rank',$rt['user_rank']);
				$this->Session->write('User.ukey',$rt['wecha_id']);
				$this->Session->write('User.addtime',mktime());
				//写入cookie
				setcookie(CFGH.'USER[UKEY]', $rt['wecha_id'], mktime() + 2592000);
				setcookie(CFGH.'USER[UID]', $rt['user_id'], mktime() + 2592000);
		}
		/* echo 'back_url:'.$back_url;
		var_dump($openid);
		exit; */
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $back_url"); 
	}
	function curl_get_contents($url){
		if(isset($_SERVER['HTTP_USER_AGENT'])) {
			$agent = $_SERVER['HTTP_USER_AGENT'];
		} else {
			$agent = '';
		}
	
		if(isset($_SERVER['HTTP_REFERER'])) {
			$referer = $_SERVER['HTTP_REFERER'];
		} else {
			$referer = '';
		}

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, $agent);
		curl_setopt($ch, CURLOPT_REFERER,$referer);
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		return $r = curl_exec($ch);
		curl_close($ch);
		return $r;
   }
}
?>
