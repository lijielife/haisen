<?php
require_once( 'load.php' );

$type = isset( $_GET['type'] ) && ! empty( $_GET['type'] ) ? $_GET['type'] : 'list';

switch ( $type ) {
    case 'getcrowdgoods':
        $app->action( 'crowdbuy', 'ajax_get_crowd_goods', $_GET );
        break;
    case 'delcrowdgoods':
        $app->action( 'crowdbuy', 'ajax_del_crowd_goods', $_GET['id'] );
        break;
    case 'delgoods': 
        $app->action( 'crowdbuy', 'ajax_delcrowd', $_GET['ids'] );
        break;
    case 'list':
        $app->action( 'crowdbuy', 'index' );
        break;
    case 'info':
        $app->action( 'crowdbuy', 'crowdinfo', isset($_GET['id']) && $_GET['id'] > 0 ? $_GET['id'] : 0 );
        break;  
    default:
        $app->action( 'crowdbuy', 'index' );
        break;
}