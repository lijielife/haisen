<?php
require_once( 'load.php' );
$cid  = isset( $_GET['cid'] ) && ! empty( $_GET['cid'] ) ? intval( $_GET['cid'] ) : 0;
$page = isset( $_GET['page'] ) && ! empty( $_GET['page'] ) ? intval( $_GET['page'] ) : 0;

$action = $_GET['act'] ? : 'index';
$action = trim( $action );
$app->action( 'catalog', $action, $cid, $page, $_GET );