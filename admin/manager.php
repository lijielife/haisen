<?php
require_once( 'load.php' );
if ( $_POST['action'] )
{
    switch ( $_POST['action'] )
    {
        case 'ajax_tianjia':
            $app->action( 'manager', 'ajax_tianjia', ( $_POST ? $_POST : 0 ) );
            break;
        case 'ajax_deldp':
            $app->action( 'manager', 'ajax_deldp', ( $_POST['id'] ? $_POST['id'] : 0 ) );
            break;
        case 'deladmin':
            $app->action( 'manager', 'ajax_deladmin', ( $_POST['id'] ? $_POST['id'] : 0 ) );
            break;
        case 'addmanmger':
            $data['adminname'] = $_POST['uname'];
            $data['password']  = md5( trim( $_POST['pass'] ) );
            $data['email']     = $_POST['email'];
            $data['addtime']   = time();
            $data['groupid']   = $_POST['groupid'];
            $app->action( 'manager', 'ajax_addmanmger', $data, $_POST['aid'] );
            break;
        case 'addgroup':
            $data['groupname']    = $_POST['gname'];
            $data['active']       = $_POST['active'];
            $data['remark']       = $_POST['remark'];
            $data['option_group'] = $_POST['groupvar'];
            $data['addtime']      = time();
            $app->action( 'manager', 'ajax_addgroup', $data, $_POST['gid'] );
            break;
        case 'adddp':
            $data['store_pic']  = $_POST['store_pic'];
            $data['store_name'] = $_POST['store_name'];
            $data['username']   = $_POST['username'];
            if ( $_POST['password'] )
            {
                $data['password'] = md5( trim( $_POST['password'] ) );
            }
            $data['phone']     = $_POST['phone'];
            $data['status']    = $_POST['status'];
            $data['class_id']  = $_POST['class_id'];
            $data['wallet_id'] = $_POST['wallet_id'];
            $data['address']   = $_POST['address'];
            $data['longitude'] = $_POST['longitude'];
            $data['latitude']  = $_POST['latitude'];
            $app->action( 'manager', 'ajax_tianjia', $data, $_POST['store_id'] );
            break;
        case 'addfen':
            $data['class_name'] = $_POST['class_name'];
            $data['range']      = intval( $_POST['range'] );
            $data['class_sort'] = $_POST['class_sort'];
            $app->action( 'manager', 'ajax_tianjiafen', $data, $_POST['id'] );
            break;
        case 'addwallet':
            $data['wallet_name'] = $_POST['wallet_name'];
            $data['state']       = $_POST['state'];
            $app->action( 'manager', 'ajax_addwallet', $data, $_POST['id'] );
            break;
        case 'delgroup':
            $app->action( 'manager', 'ajax_delgroup', ( $_POST['gid'] ? $_POST['gid'] : 0 ) );
            break;
        case 'activeop':
            $data['active']  = $_POST['active'];
            $data['addtime'] = time();
            $app->action( 'manager', 'ajax_addgroup', $data, $_POST['gid'] );
            break;
        case 'dellog':
            $app->action( 'manager', 'ajax_dellog', $_POST['logid'] );
            break;
        case 'deldp':
            $app->action( 'manager', 'ajax_deldpall', $_POST['id'] );
            break;
        case 'delmes':
            $app->action( 'manager', 'ajax_delmes', $_POST['tids'] );
            break;
        case 'savemes':
            $app->action( 'manager', 'ajax_savemes', $_POST );
            break;
        case 'ajax_guanli':
            $app->action( 'manager', 'ajax_guanli', $_POST );
    }
    exit;
}
if ( isset( $_GET['type'] ) )
{
    switch ( $_GET['type'] )
    {
        case 'list':
            $app->action( 'manager', 'managerlist' );
            break;
        case 'add':
        case 'edit':
            $app->action( 'manager', 'manageredit', $_GET['type'], ( $_GET['id'] ? $_GET['id'] : 0 ) );
            break;
        case 'loglist':
            $app->action( 'manager', 'managerlog', ( $_GET['tt'] ? $_GET['tt'] : "" ) );
            break;
        case 'group':
            $app->action( 'manager', 'managergroup', ( $_GET['tt'] ? $_GET['tt'] : "" ), ( $_GET['id'] ? $_GET['id'] : 0 ) );
            break;
        case 'meslist':
            $app->action( 'manager', 'message_list', ( isset( $_GET['tt'] ) ? $_GET['tt'] : 0 ) );
            break;
        case 'mes_info':
            $app->action( 'manager', 'message_info', ( $_GET['id'] ? $_GET['id'] : 0 ) );
            break;
        case 'tianjia':
            $app->action( 'manager', 'tianjia', ( $_GET['tt'] ? $_GET['tt'] : "" ), ( $_GET['id'] ? $_GET['id'] : 0 ) );
            break;
        case 'guanli':
            $app->action( 'manager', 'guanli', ( $_GET['id'] ? $_GET['id'] : 0 ) );
            break;
        case 'fenlei':
            $app->action( 'manager', 'fenlei', ( $_GET['tt'] ? $_GET['tt'] : "" ), ( $_GET['id'] ? $_GET['id'] : 0 ) );
            break;
        case 'wallet':
            $app->action( 'manager', 'wallet', ( $_GET['tt'] ? $_GET['tt'] : "" ), ( $_GET['id'] ? $_GET['id'] : 0 ) );
            break;
        case 'guanli_fen':
            $app->action( 'manager', 'guanli_fen', ( $_GET['id'] ? $_GET['id'] : 0 ) );
            break;
        case 'guanli_wallet':
            $app->action( 'manager', 'guanli_wallet', ( $_GET['id'] ? $_GET['id'] : 0 ) );
            break;
        default:
            $app->action( 'manager', 'managerlist' );
            break;
    }
}
else
{
    $app->jump( 'manager.php?type=list' );
}
?>