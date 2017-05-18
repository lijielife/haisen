<?php
require_once("load.php");
$act = isset($_POST['action']) ? $_POST['action'] : "";
//ajax操作
if($_POST['action']){
	switch($_POST['action']){
		case 'ajax_deldp':
		 $app->action('prize','ajax_deldp',($_POST['id'] ? $_POST['id'] : 0));
			break;
		case 'deldp':
			$app->action('prize','ajax_deldpall',$_POST['id']);
			break;
	}
	exit;
}

if(!isset($_GET['type'])) $_GET['type'] = '';
$app->action('prize',$_GET['type'],$_GET);
?>