<?php 
require_once('load.php');
//ajax登录
if(isset($_REQUEST['action'])){
	switch(trim($_REQUEST['action'])){ 
	case 'getorderlist':
		$app->action('store','ajax_getorderlist',$_POST);
		break;	
	case 'order_op_store':
			$app->action('store','ajax_order_op_store',(isset($_POST['id'])? $_POST['id'] : 0),$_POST['type']);  
			break;	
	case 'ajax_return_goods':
		$app->action('store','ajax_return_goods',$_POST);
		break;	
	default:
			echo "run defult...";
			break;
}
	exit;
}
	
$action = isset($_GET['act'])&&!empty($_GET['act']) ? $_GET['act'] : "default";
switch($action){
	case 'storeorder':
		$app->action('store','other_orderlist'); 
		break;
	case 'product_goods_order':
		$app->action('store','product_goods_order'); 
		break;
	case 'store_returnordergoods':
		$app->action('store','store_returnordergoods'); 
		break;
	default:
		$app->action('store','error_jump');
		break;
}

?>