<?php
require_once('load.php');
$cid = isset($_GET['cid'])&&!empty($_GET['cid']) ? intval($_GET['cid']) : 0;
$id = isset($_GET['id'])&&!empty($_GET['id']) ? intval($_GET['id']) : 0;
$page = isset($_GET['page'])&&!empty($_GET['page']) ? intval($_GET['page']) : 0;
if($id>0){
$app->action('new','article',$id);
}else{
$app->action('new','index',$cid,$page);
}
?>