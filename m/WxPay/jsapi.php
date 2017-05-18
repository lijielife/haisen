<?php 
ini_set('date.timezone','Asia/Shanghai');
require_once('../load.php');
$pay = $app->action('shopping','_get_payinfo',4);
$rt = unserialize($pay['pay_config']);
define( 'JXB_APPID',     $pay['appid'] );
define( 'JXB_APPSECRET', $pay['appsecret'] );
define( 'JXB_KEY',       $rt['pay_code'] );
define( 'JXB_MCHID',     $rt['pay_no'] );

require_once "./lib/WxPay.Api.php";
require_once "WxPay.JsApiPay.php";
require_once 'log.php';

//初始化日志
$logHandler= new CLogFileHandler("./logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);

//打印输出数组信息
function printf_info($data)
{
    foreach($data as $key=>$value){
        echo "<font color='#00ff55;'>$key</font> : $value <br/>";
    }
}

//①、获取用户openid
$tools = new JsApiPay();
$openId = $tools->GetOpenid();

$rt = $app->action('shopping','get_openid_AND_pay_info');
/* 异步通知地址 */
$notify_url   = ADMIN_URL.'notify_url.php';
$out_trade_no = date("YmdHis").$rt['order_sn'];
$body         = $rt['body'];
$order_amount = $rt['order_amount'];


//②、统一下单
$input = new WxPayUnifiedOrder();
$input->SetBody( $body );
$input->SetOut_trade_no( $out_trade_no );
$input->SetTotal_fee( $order_amount*100 );
$input->SetNotify_url( $notify_url );
$input->SetTrade_type("JSAPI");
$input->SetOpenid($openId);
$order = WxPayApi::unifiedOrder($input);
$jsApiParameters = $tools->GetJsApiParameters($order);

//获取共享收货地址js函数参数
$editAddress = $tools->GetEditAddressParameters();

//③、在支持成功回调通知中处理成功之后的事宜，见 notify.php
/**
 * 注意：
 * 1、当你的回调地址不可访问的时候，回调通知会失败，可以通过查询订单来确认支付是否成功
 * 2、jsapi支付时需要填入用户openid，WxPay.JsApiPay.php中有获取openid流程 （文档可以参考微信公众平台“网页授权接口”，
 * 参考http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html）
 */
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <title>微信安全支付</title>

    <script type="text/javascript">

        //调用微信JS api 支付
        function jsApiCall()
        {
            WeixinJSBridge.invoke(
                'getBrandWCPayRequest',
                <?php echo $jsApiParameters; ?>,
                function(res){
                    WeixinJSBridge.log(res.err_msg);
                    //alert(res.err_code+res.err_desc+res.err_msg);
                    str = res.err_msg;
                    if(str!=""){
                        rr = str.split(":");
                        if(rr[1]=='ok'){
                        window.location.href="<?php echo str_replace('/WxPay','',ADMIN_URL).'user.php?act=orderlist';?>";
                        }
                    }
                }
            );
        }

        function callpay()
        {
            if (typeof WeixinJSBridge == "undefined"){
                if( document.addEventListener ){
                    document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                }else if (document.attachEvent){
                    document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
                    document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                }
            }else{
                jsApiCall();
            }
        }
    </script>
</head>
<body style="font-size:12px" onLoad="callpay()">
</body>
</html>