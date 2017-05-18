<?php
require_once('load.php');
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
	$app->action('daili',$_REQUEST['action'],$_POST);
	exit;
}
$act = isset($_GET['act'])&&!empty($_GET['act']) ? $_GET['act'] : "index";
$app->action('daili',$act,$_GET);
?>