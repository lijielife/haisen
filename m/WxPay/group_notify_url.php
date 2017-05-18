<?php
require_once( '../load.php' );

// 存储微信的回调
$xmls = $GLOBALS['HTTP_RAW_POST_DATA']; 
// 使用simplexml_load_string() 函数将接收到的XML消息数据载入对象$postObj中。
if ( ! empty( $xmls ) ) {
    $postObj = simplexml_load_string( $xmls, 'SimpleXMLElement', LIBXML_NOCDATA );
    $result_code  = $postObj->result_code; // SUCCESS
    $openid       = $postObj->openid;
    $out_trade_no = $postObj->out_trade_no;

    if ( $result_code == 'SUCCESS' ) {
        if ( ! empty( $out_trade_no ) ) {
            $pay_status = $app->action( 'shopping', 'grouporder_status', array( 'order_sn' => $out_trade_no ) );
            if ( $pay_status == 1 ) return;
            /* 修改支付状态 */
            $app->action( 'shopping', 'group_pay_successs', array( 'order_sn'=>$out_trade_no, 'status'=>'1' ) );
            /* 增加团购人数 */
            $app->action( 'group_product', 'add_number', array( 'order_sn' => $out_trade_no ) );
            echo 'SUCCESS';
        }
    } else {
        //file_put_contents('error.txt',"(支付失败)time:".date(''),FILE_APPEND);exit;
    }       
}