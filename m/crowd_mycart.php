<?php
require_once('load.php');
if(isset($_REQUEST['action'])){
	switch($_REQUEST['action']){
		case 'delcartid':
			$app->action('crowd_shopping','ajax_delcart_goods',isset($_POST['id'])? $_POST['id'] : 0);
			break;
		case 'jisuan_shopping':
			$app->action('crowd_shopping','ajax_jisuan_shopping',$_POST);
			break;
		case 'change_jifen':
			$app->action('crowd_shopping','ajax_change_jifen',$_POST['checked']);
			break;
		default:
			$app->action('crowd_shopping',$_REQUEST['action'],$_POST);
			break;
	}
	exit;
}

$type = !isset($_REQUEST['type'])||empty($_REQUEST['type'])? 'cartlist' : $_REQUEST['type'];
switch($type){
	case 'cartlist':
		$app->action('crowd_shopping','checkout');
		break;
	case 'clear':
		$app->action('crowd_shopping','mycart_clear');
		break;
	case 'checkout':
		$app->action('crowd_shopping','checkout');
		break;
	/* 提交订单 */
	case 'confirm':
		$app->action('crowd_shopping','confirm');
		break;
	default:
		$app->action('crowd_shopping',$type);
		break;
}

?>