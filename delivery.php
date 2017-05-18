<?php
require_once('load.php');

if(isset($_REQUEST['action'])){
	switch($_REQUEST['action']){
		case 'getgoods':
			$app->action('deliveryshop','ajax_select_goods',isset($_POST['maxcount'])?$_POST['maxcount']:0,isset($_POST['page'])?$_POST['page']:1);  //筛选商品
			break;
	}
	exit;
}

$action = isset($_GET['act'])&&!empty($_GET['act']) ? $_GET['act'] : "default";
switch($action){
	case 'select_goods':
		$app->action('deliveryshop','select_goods'); 
		break;
	default:
		$app->action('common','show404tpl');
		break;
}
?>