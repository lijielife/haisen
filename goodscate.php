<?php
require_once('load.php');

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";
switch($action){
	case 'getgoodslist':
		$app->action('catalog','ajax_getcategoodslist',$_POST['goodswhere']); 
		break;
	exit;
}
if(isset($_REQUEST['action'])) die;
//ajax end 


if (empty($_GET['encode']))
{
	if(isset($_GET['keyword'])&&!empty($_GET['keyword'])&&!in_array($_GET['keyword'],array('is_best','is_new','is_hot','is_promote'))){
		$string = array_merge($_GET, $_POST);
		$string['search_encode_time'] = time();
		$string = str_replace('+', '%2b', base64_encode(serialize($string)));
	
		header("Location: catalog.php?encode=$string\n");
	
		exit;
	}
}
else
{ 
	$string = base64_decode(trim($_GET['encode']));
	if ($string !== false)
	{
		$string = unserialize($string);
	}
	else
	{
		$string = array();
	}
	$_REQUEST = array_merge($_REQUEST, addslashes_deep($string));
}

$keyword   = isset($_REQUEST['keyword'])&&!empty($_REQUEST['keyword'])   ? htmlspecialchars(trim($_REQUEST['keyword']))     : '';
$key_val   = isset($_REQUEST['val'])&&!empty($_REQUEST['val'])   ? htmlspecialchars(trim($_REQUEST['val']))     : '';

$cid = isset($_REQUEST['cid'])&&intval($_REQUEST['cid'])>0 ?  intval($_REQUEST['cid']) : 0 ; //分类ID

$bid = isset($_REQUEST['bid'])&&intval($_REQUEST['bid'])>0 ?  intval($_REQUEST['bid']) : 0 ; //品牌ID

$price = isset($_REQUEST['price'])&&!empty($_REQUEST['price']) ?  $_REQUEST['price'] : "" ; //价格区域

$page= isset($_REQUEST['page']) ? $_REQUEST['page'] : '';  //当前分页

$list = isset($_REQUEST['limit'])&&intval($_REQUEST['limit'])>0 ?  intval($_REQUEST['limit']) : 20 ; //每页显示多少个

$arr = array('cid'=>$cid,'bid'=>$bid,'price'=>$price,'keyword'=>$keyword,'key_val'=>$key_val,'page'=>$page,'limit'=>$list); //以数组形式传递

$app->action('catalog','index',$arr,isset($_REQUEST['desc'])?$_REQUEST['desc'] : (isset($_REQUEST['asc'])?$_REQUEST['asc'] : 'goods_id'));

?>