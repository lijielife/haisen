<?php
require_once('load.php');
$bid = isset($_REQUEST['bid'])&&intval($_REQUEST['bid'])>0 ?  intval($_REQUEST['bid']) : 0 ; //品牌ID
$page= isset($_REQUEST['page']) ? $_REQUEST['page'] : '1';  //当前分页
$app->action('brand','lists',$bid,$page);
?>