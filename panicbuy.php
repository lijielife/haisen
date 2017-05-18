<?php
require_once('load.php');
$_GET['keyword'] = 'is_qianggou';
$app->action('catalog','index',0,1,$_GET);
?>