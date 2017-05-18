<?php
require_once( '../load.php' );

//存储微信的回调
$xmls = $GLOBALS['HTTP_RAW_POST_DATA']; 
//使用simplexml_load_string() 函数将接收到的XML消息数据载入对象$postObj中。
if ( ! empty( $xmls ) )
{
    $postObj      = simplexml_load_string( $xmls, 'SimpleXMLElement', LIBXML_NOCDATA );
    $result_code  = $postObj->result_code;
    $openid       = $postObj->openid;
    $out_trade_no = $postObj->out_trade_no;
    if ( $result_code == "SUCCESS" )
    {
        if ( ! empty( $out_trade_no ) )
        {
            // 修改支付状态
            $app->action('crowd_shopping','pay_successs_tatus2',array('order_sn'=>$out_trade_no,'status'=>'1'));
            $rt = $app->action('sms','sms_getorderinfo',array('ordersn'=>$out_trade_no));
            // 发送给客户短信
            $app->action('sms','sms_yssend',array('tel'=>$rt['mobile'],'order_sn'=>$ordersn,'type'=>'tmp_order'));
            // 发送给商家短信
            $app->action('sms','sms_yssend',array('tel'=>$rt['mobile'],'order_sn'=>$ordersn,'pname'=>$rt['goods_name'],'name'=>$rt['consignee'],'price'=>$rt['order_amount'],'type'=>'tmp_b_order'));
            exit( 'SUCCESS' );
        }
    }
    else
    {

    }
}