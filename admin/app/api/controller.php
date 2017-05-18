<?php
class ApiController extends Controller
{
    
    function _return_px()
    {
        $t  = '';
        $x  = $_SERVER["HTTP_HOST"];
        $x1 = explode( '.', $x );
        if ( count( $x1 ) == 2 )
        {
            $t = $x1[0];
        }
        elseif ( count( $x1 ) > 2 )
        {
            $t = $x1[0] . $x1[1];
        }
        return $t;
    }
    
    // 获取appid、appsecret
    function _get_appid_appsecret()
    {
        $t          = $this->_return_px();
        $import_obj = new Import();
        $cache      = $import_obj->ajincache();
        $cache->SetFunction( __FUNCTION__ );
        $cache->SetMode( 'sitemes' . $t );
        $fn = $cache->fpath( func_get_args() );
        if ( file_exists( $fn ) && ( time() - filemtime( $fn ) < 7000 ) && !$cache->GetClose() )
        {
            include( $fn );
        }
        else
        {
            $sql             = "SELECT appid,appsecret FROM `{$this->App->prefix()}wxuserset` LIMIT 1";
            $rr              = $this->App->findrow( $sql );
            $rt['appid']     = $rr['appid'];
            $rt['appsecret'] = $rr['appsecret'];
            
            $cache->write( $fn, $rt, 'rt' );
        }
        return $rt;
    }
    
    //获取access_token
    function _get_access_token()
    {
        $t          = $this->_return_px();
        $import_obj = new Import();
        $cache      = $import_obj->ajincache();
        $cache->SetFunction( __FUNCTION__ );
        $cache->SetMode( 'sitemes' . $t );
        $fn = $cache->fpath( func_get_args() );
        if ( file_exists( $fn ) && ( time() - filemtime( $fn ) < 7000 ) && !$cache->GetClose() )
        {
            include( $fn );
        }
        else
        {
            $rr   = $this->_get_appid_appsecret();
            $url  = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . $rr['appid'] . '&secret=' . $rr['appsecret'];
            $con  = $this->curlGet( $url );
            $json = json_decode( $con );
            $rt   = $json->access_token; //获取 access_token
            
            $cache->write( $fn, $rt, 'rt' );
        }
        return $rt;
    }
    
    function send( $rts = array(), $type = "" )
    {
        if ( empty( $rts['openid'] ) )
            return;
        
        $access_token = $this->_get_access_token();
        $data         = $this->_get_send_con( $rts, $type );
        $rt           = $this->curlPost( 'https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=' . $access_token, $data, 0 );
    }
    
    function _get_send_con( $rt = array(), $ty = '' )
    {
        $data = array();
        switch ( $ty )
        {
            case 'fahuo':
                $openid = $rt['openid'];
                $str = '亲爱[' . $rt['nickname'] . '],你的订单[' . $rt['order_sn'] . ']已经发出,2-4个工作日内将会送达,请注意查收;\n\n服务类型：发货提醒\n提交时间：' . date( 'Y-m-d H:i:s' );
                $data = '{"touser": "' . $openid . '","msgtype": "news","news": {"articles": [{"title": "发货提醒", "description": "' . $str . '","url":"' . SITE_URL . 'm/user.php?act=orderlist"}]}}';
                break;
            
            /* 发货推送提醒 */
            case 'deliver_goods_push':
                $openid = $rt['openid'];
                $str = '亲爱[' . $rt['nickname'] . '], 您购买的[' . $rt['goods_name'] . ']已发货\n\n服务类型：商品多发\n提交时间：' . date( 'Y-m-d H:i:s' );
                $data = '{"touser": "' . $openid . '","msgtype": "news","news": {"articles": [{"title": "发货提醒", "description": "' . $str . '","url":"' . SITE_URL . 'm/user.php?act=orderinfo2014&order_id='. $rt['order_id'] .'"}]}}';
                break;
        }
        
        return $data;
    }
    
    function curlPost( $url, $data, $showError = 1 )
    {
        $ch       = curl_init();
        $header[] = "Accept-Charset: utf-8";
        curl_setopt( $ch, CURLOPT_URL, $url );
        curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, "POST" );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, FALSE );
        curl_setopt( $ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1 );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, $header );
        curl_setopt( $ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)' );
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
        curl_setopt( $ch, CURLOPT_AUTOREFERER, 1 );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $data );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $tmpInfo = curl_exec( $ch );
        $errorno = curl_errno( $ch );
        if ( $errorno )
        {
            return array(
                'rt' => false,
                'errorno' => $errorno 
            );
        }
        else
        {
            $js = json_decode( $tmpInfo, 1 );
            if ( intval( $js['errcode'] == 0 ) )
            {
                return array(
                    'rt' => true,
                    'errorno' => 0,
                    'media_id' => $js['media_id'],
                    'msg_id' => $js['msg_id'] 
                );
            }
            else
            {
                if ( $showError )
                {
                    return array(
                        'rt' => true,
                        'errorno' => 10,
                        'msg' => '发生了Post错误：错误代码' . $js['errcode'] . ',微信返回错误信息：' . $js['errmsg'] 
                    );
                }
            }
        }
    }
    
    function curlGet( $url )
    {
        $ch       = curl_init();
        $header[] = "Accept-Charset: utf-8";
        curl_setopt( $ch, CURLOPT_URL, $url );
        curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, "GET" );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, FALSE );
        curl_setopt( $ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1 );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, $header );
        curl_setopt( $ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)' );
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
        curl_setopt( $ch, CURLOPT_AUTOREFERER, 1 );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $data );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $temp = curl_exec( $ch );
        return $temp;
    }
    
}