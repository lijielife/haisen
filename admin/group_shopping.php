<?php
require_once( 'load.php' );
if ( $_REQUEST['action'] ) {
    $app->action( 'group_shopping', $_REQUEST['action'], $_POST );
    exit;
}

$type = isset( $_GET['type'] ) ? $_GET['type'] : 'shoppinglist';
$app->action( 'group_shopping', $type, $_GET );