<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/25/css.css" media="all" />
<?php $this->element('25/top',array('lang'=>$lang)); ?>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
    wx.config({
        debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
        appId: "<?php echo $signPackage['appId'] ?>",           // 必填，公众号的唯一标识
        timestamp: "<?php echo $signPackage['timestamp'] ?>",   // 必填，生成签名的时间戳
        nonceStr: "<?php echo $signPackage['nonceStr'] ?>",     // 必填，生成签名的随机串
        signature: "<?php echo $signPackage['signature'] ?>",   // 必填，签名，见附录1
        jsApiList: [
            'hideAllNonBaseMenuItem'
        ] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
    });
    wx.ready( function() {
        wx.hideAllNonBaseMenuItem();     
    });    
</script>
<div id="main" style="min-height:300px">
    <div style="margin:10%; margin-bottom:0px; background:#FFF; padding:10%; text-align:center">
        <img src="<?php echo '../images/qrcode.jpg'; ?>" style=" width:100%;max-width:100%; cursor:pointer" />
    </div>
    <div style="margin:10%; margin-top:0px; background:#4c4343;text-align:center; height:45px; line-height:45px; font-size:14px; font-weight:bold; color:#FFF;-webkit-box-shadow: 0px 4px 4px #abaaaa; margin-bottom:5px;">
        长按关注公众帐号，更多海参大礼等你来！
    </div>
    <div style="margin:10%; margin-top:0px;height:45px; line-height:45px; font-size:14px; font-weight:bold; color:#FFF;-webkit-box-shadow: 0px 4px 4px #abaaaa; margin-bottom:5px; line-height:22px">
    <?php if ( $recom_nickname != '' ) { ?>
    <span style="display:block; color:#171616">　
        您的好友<?php echo '<font color=red>'.$recom_nickname.'</font>'; ?>邀请您关注公众帐号</span>    
    <?php } else { ?>
    <span style="display:block; color:#999999">　
    点击 我的推广 -> 我的二维码 让好友扫描您的二维码，或者截图发送给好友！ 
    </span>
    <?php } ?>
    <!-- <p class="copyurl" style="width:100%; color:#666; background:#FAFAFA; border:none; overflow:hidden" onclick="clickselect()"><?php echo $thisurl;?></p> -->
    </div>
    <!-- <a href="<?php echo ADMIN_URL;?>user.php?act=ajax_down_img" class="addcar" style=" width:90px; background:#4f82b4; position:fixed; left:5px; bottom:55px;height:24px; line-height:24px; color:#FFF" onclick="alert('暂不支持该类型下载，正在努力解决');">下载二维码</a> -->
</div>
<div style="height:40px; clear:both"></div>
<script type="text/javascript">
function clickselect(obj){
    $(obj).select();
}
</script>

<?php $this->element('25/footer',array('lang'=>$lang)); ?>