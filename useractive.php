<?php
require_once('load.php');

if(isset($_GET['act']) && !empty($_GET['act'])){
	$str = base64_decode($_GET['act']);
	$arr = explode('||',$str);
	$app->action('user','email_action_user',$arr);
}
?>