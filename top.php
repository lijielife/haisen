<?php
require_once('load.php');
$app->action('top','index',(isset($_GET['id']) ? $_GET['id'] : 0));
?>