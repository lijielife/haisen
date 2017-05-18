<?php
require_once('load.php');
$bid = isset($_REQUEST['bid'])&&intval($_REQUEST['bid'])>0 ?  intval($_REQUEST['bid']) : 0 ; //品牌ID
$cid = isset($_REQUEST['cid'])&&intval($_REQUEST['cid'])>0 ?  intval($_REQUEST['cid']) : 0 ; //分类ID
$page= isset($_REQUEST['page']) ? $_REQUEST['page'] : '1';  //当前分页
$app->action('brand','index',$bid,$cid,$page);
?>