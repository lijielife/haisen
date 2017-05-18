<?php
require_once('load.php');
$cid = 0;
$page = isset($_GET['page'])&&!empty($_GET['page']) ? intval($_GET['page']) : 0;
$_GET['keyword'] = 'is_new';

$app->action('catalog','index',$cid,$page,$_GET);
?>