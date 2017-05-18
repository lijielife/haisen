<?php
class ApiController extends Controller
{
    
    function _return_px()
    {
        $t = '';
        $x = $_SERVER["HTTP_HOST"];
        $x1 = explode( '.', $x );
        if ( count( $x1 ) == 2 )
        {
            $t = $x1[0];
        }
        else if ( count( $x1 ) > 2 )
        {
            $t = $x1[0] . $x1[1];
        }
        return $t;
    }
        
    // 获取appid、appsecret
    function _get_appid_appsecret()
    {
        $t = $this->_return_px();
        $cache = Import::ajincache();
        $cache->SetFunction(__FUNCTION__);
        $cache->SetMode('sitemes'.$t);
        $fn = $cache->fpath(func_get_args());
        if ( file_exists( $fn ) && (time() - filemtime($fn) < 7000) && ! $cache->GetClose() )
        {
            include( $fn );
        }
        else
        {
            $sql = "SELECT appid,appsecret FROM `{$this->App->prefix()}wxuserset` LIMIT 1";
            $rr = $this->App->findrow( $sql );
            $rt['appid']     = $rr['appid'];
            $rt['appsecret'] = $rr['appsecret'];
            
            $cache->write( $fn, $rt, 'rt' );
        }
        return $rt;
    }
    
    //获取access_token
    function _get_access_token()
    {
        $t = $this->_return_px();
        $cache = Import::ajincache();
        $cache->SetFunction(__FUNCTION__);
        $cache->SetMode('sitemes'.$t);
        $fn = $cache->fpath(func_get_args());
        if ( file_exists( $fn ) && (time() - filemtime($fn) < 7000) && ! $cache->GetClose() )
        {
            include( $fn );
        }
        else
        {
            $rr = $this->_get_appid_appsecret();
            $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$rr['appid'].'&secret='.$rr['appsecret'];
            $con  = $this->curlGet( $url );
            $json = json_decode( $con );
            $rt   = $json->access_token; //获取 access_token
            
            $cache->write ($fn, $rt, 'rt' );
        }
        return $rt;
    }
    
    function send( $rts = array() , $type = "" )
    {
        if ( empty( $rts['openid'] ) ) return;
        $access_token = $this->_get_access_token();
        $data = $this->_get_send_con( $rts, $type );
        $rt = $this->curlPost( 'https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token='.$access_token, $data, 0 );
    }
    
    /**
     * 构造客服消息
     */
    public function _get_send_con( $rt = array(), $ty = '' )
    {
        $data = array();
        switch ( $ty )
        {
            case 'OfflinePurchase':  // 下线购买提醒
            $openid = $rt['openid'];
            $str    = '您的好友['.$rt['nickname'].']已经成功支付啦;\n\n提交时间：'.date('Y-m-d H:i:s').'\n\n备注：加油哦,推荐消费越多你将会获得更高返佣比例哦!';
            $data   = '{"touser": "'.$openid.'","msgtype": "news","news": {"articles": [{"title": "您的好友购买产品成功", "description": "'.$str.'","url":"'.str_replace(array('paywx/','WxPay/'),'',ADMIN_URL).'daili.php?act=mymoneydata&status=yifu"}]}}';
            break;
            case 'GroupPurchase':  // 团购下线购买提醒
            $openid = $rt['openid'];
            $str    = '您的好友['.$rt['nickname'].']已经成功支付啦;\n\n提交时间：'.date('Y-m-d H:i:s').'\n\n备注：加油哦,推荐消费越多你将会获得更高返佣比例哦!';
            $data   = '{"touser": "'.$openid.'","msgtype": "news","news": {"articles": [{"title": "您的好友购买产品成功", "description": "'.$str.'","url":"'.str_replace(array('paywx/','WxPay/'),'',ADMIN_URL).'daili.php?act=group_money_data&status=not_received_group"}]}}';
            break;
            case 'payreturnmoney': //支付返佣金
            $openid = $rt['openid'];
            $str    = '你的好友['.$rt['nickname'].']已经成功支付啦;\n\n服务类型：消费返佣金\n提交时间：'.date('Y-m-d H:i:s').'\n\n备注：加油哦,推荐消费越多你将会获得更高返佣比例哦!';
            $data   = '{"touser": "'.$openid.'","msgtype": "news","news": {"articles": [{"title": "消费返佣服务申请成功", "description": "'.$str.'","url":"'.str_replace(array('paywx/','WxPay/'),'',ADMIN_URL).'daili.php?act=monrydeial"}]}}';
            break;
            case 'buymess': //需要购买，开通分销通知
            $openid = $rt['openid'];
            $str    = '亲爱的['.$rt['nickname'].'],购买产品成为合伙人赚分红,你还需要至少购买一件产品哦！\n\n提交时间：'.date('Y-m-d H:i:s');
            $data   = '{"touser": "'.$openid.'","msgtype": "news","news": {"articles": [{"title": "购买产品成分销商赚佣金", "description": "'.$str.'","url":"'.str_replace(array('paywx/','WxPay/'),'',ADMIN_URL).'user.php"}]}}';
            break;
            case 'sendgift':
            $openid = $rt['openid'];
            $str    = '亲爱的['.$rt['nickname'].'],你已免费获取一张价值980元的消费卡！\n\n提交时间：'.date('Y-m-d H:i:s');
            $data   = '{"touser": "'.$openid.'","msgtype": "news","news": {"articles": [{"title": "赠送980元消费卡", "description": "'.$str.'","url":"'.str_replace(array('paywx/','WxPay/'),'',ADMIN_URL).'user.php?act=mygift"}]}}';
            break;
            case 'orderconfirm':
            $openid = $rt['openid'];
            $str    = '订单已成功提交,请尽快付款!\n\n提交时间：'.date('Y-m-d H:i:s');
            $data   = '{"touser": "'.$openid.'","msgtype": "news","news": {"articles": [{"title": "订单确认通知服务", "description": "'.$str.'","url":"'.str_replace(array('paywx/','WxPay/'),'',ADMIN_URL).'user.php?act=orderlist"}]}}';
            break;
            case 'orderconfirm_toshop': //通知商家
            $openid = $rt['openid'];
            $str    = '店里有人下单了,等待对方付款!\n\n提交时间：'.date('Y-m-d H:i:s');
            $data   = '{"touser": "'.$openid.'","msgtype": "news","news": {"articles": [{"title": "下单通知服务", "description": "'.$str.'","url":"'.str_replace(array('paywx/','WxPay/'),'',ADMIN_URL).'user.php?act=orderlist"}]}}';
            break;
            case 'payconfirm':
            $openid = $rt['openid'];
            $str    = '订单已成功支付,我们将尽快发货,请保持手机畅通等待物流送达!\n\n提交时间：'.date('Y-m-d H:i:s');
            $data   = '{"touser": "'.$openid.'","msgtype": "news","news": {"articles": [{"title": "订单已支付通知服务", "description": "'.$str.'","url":"'.str_replace(array('paywx/','WxPay/'),'',ADMIN_URL).'user.php?act=orderlist"}]}}';
            break;
            case 'payconfirm_vg':
            $openid = $rt['openid'];
            $str    = '['.$rt['nickname'].'],订单已成功支付,'.(!empty($rt['goods_sn']) ? '卡号:'.$rt['goods_sn'].',' : '').'卡密:'.$rt['goods_pass'].',请注意查收!\n\n提交时间：'.date('Y-m-d H:i:s');
            $data   = '{"touser": "'.$openid.'","msgtype": "news","news": {"articles": [{"title": "订单已支付通知服务", "description": "'.$str.'","url":"'.str_replace(array('paywx/','WxPay/'),'',ADMIN_URL).'user.php?act=orderlist"}]}}';
            break;
        }
        
        return $data;
    }
    
    function curlPost($url, $data,$showError=1){
        $ch = curl_init();
        $header = "Accept-Charset: utf-8";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $tmpInfo = curl_exec($ch);
        $errorno = curl_errno($ch);
        if ( $errorno )
        {
            return array('rt'=>false,'errorno'=>$errorno);
        }
        else
        {
            $js = json_decode( $tmpInfo, 1 );
            if ( intval( $js['errcode'] == 0 ) )
            {
                return array('rt'=>true,'errorno'=>0,'media_id'=>$js['media_id'],'msg_id'=>$js['msg_id']);
            }
            else
            {
                if ( $showError )
                {
                    return array('rt'=>true,'errorno'=>10,'msg'=>'发生了Post错误：错误代码'.$js['errcode'].',微信返回错误信息：'.$js['errmsg']);
                }
            }
        }
    }
    function curlGet($url){
        $ch = curl_init();
        $header = "Accept-Charset: utf-8";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $temp = curl_exec($ch);
        return $temp;
   }

}
?>