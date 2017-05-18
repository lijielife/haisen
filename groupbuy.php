<?php
require_once('load.php');
if(isset($_POST['action'])&&$_POST['action']=='ajaxgroupbuy'){
	$app->action('groupbuy','index',$_POST['page'],$_POST['type']);
	exit;
}

define('NAV_ACTIVE_CLASS','2');

$gid = isset($_REQUEST['gid'])&&intval($_REQUEST['gid'])>0 ?  intval($_REQUEST['gid']) : 0 ; //品牌ID
$page= isset($_REQUEST['page']) ? $_REQUEST['page'] : '1';  //当前分页
if($gid>0){
	$app->action('groupbuy','detail',$gid);
}else{
	$app->action('groupbuy','index',$page);
}
?>