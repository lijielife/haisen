<?php
require_once( 'load.php' );
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";
if ( ! empty( $action ) ) {
    $app->action( 'group_product', $action, $_REQUEST );
    exit;
}

$id = isset($_GET['id']) && ! empty($_GET['id']) ? intval($_GET['id']) : 0;
$app->action( 'group_product', 'index', $id );