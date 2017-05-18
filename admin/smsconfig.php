<?php
require_once("load.php");

if($_POST['action']){
	switch($_POST['action']){
		case 'ajax_update':
			$app->action('sms','ajax_update',$_POST);
			break;
		
		default:
			$app->action('sms',$_POST['action'],$_POST);
	}
	exit;
}

$type = isset($_GET['type']) ? $_GET['type'] : "sms_yuansi";

switch($type){
	case 'sms_yuansi': 
		$app->action('sms','sms_yuansi');
		break;
	case 'sms_send':
	    $app->action('sms','sms_yssend',$_GET);
		break;
	default:
		$app->action('sms',$type,$_GET);
		
}
?>