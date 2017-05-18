<?php
require_once('load.php');
if($_POST['action']){
	switch($_POST['action']){
		case 'ajax_upload': 
		    $app->action('suppliers','ajax_suppliers_upload_cache_photo',$_POST);
			break;
	}
}

$action = isset($_GET['act'])&&!empty($_GET['act']) ? $_GET['act'] : "default";
switch($action){
	case 'suppliers_goods_batch_add':
		$app->action('suppliers','suppliers_goods_batch_add',(isset($_GET['op']) ?  $_GET['op'] : ""));
		break;
	case 'suppliers_upload_goods':
		$app->action('suppliers','suppliers_upload_goods'); 
		break;
	case 'suppliers_goods_no':
		$app->action('suppliers','suppliers_goods_list',0); 
		break;
	case 'suppliers_goods_yes':
		$app->action('suppliers','suppliers_goods_list',1); 
		break;
	case 'suppliers_goods_order':
		$app->action('suppliers','suppliers_goods_order'); 
		break;
	case 'suppliers_orderinfo': //供应商的用户订单
		$app->action('suppliers','suppliers_orderinfo',isset($_GET['order_id']) ? $_GET['order_id'] : ""); 
		break;	
	case 'product_goods_order':
		if(isset($_GET['print'])&&$_GET['print']=='1'){
			$app->action('suppliers','suppliers_order_print_all');
		}else{
			$app->action('suppliers','product_goods_order'); 
		}
		break;
	case 'myinfo':   //用户资料
		$app->action('suppliers','suppliersinfo'); 
		break;	
	case 'download_tpl':
		$app->action('suppliers','download_tpl');
		break;
	case 'suppliers_goods_info':
		$app->action('suppliers','suppliers_goods_info',(isset($_GET['id'])?$_GET['id']:0));
		break;
	case 'areainfo': //供应商配送区域
		$app->action('suppliers','suppliers_area_info',(isset($_GET['cid'])?$_GET['cid'] : 0),(isset($_GET['id'])?$_GET['id'] : 0));
		break;
	case 'join_salesmen': //成为厂家业务员
		$app->action('suppliers','join_salesmen');
		break;
	case 'salesmen_manage': //厂家业务员管理
		$app->action('suppliers','salesmen_manage');
		break;
	case 'ajax_save_brand_ids': //
		$app->action('suppliers','ajax_save_brand_ids',$_GET);
		break;
	default:
		$app->action('common','show404tpl');
		break;
}
?>