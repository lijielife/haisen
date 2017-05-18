<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/25/css.css" media="all" />
<?php $this->element('25/top',array('lang'=>$lang)); ?>
<style type="text/css">
.iconinfo {
position: relative;
margin: 20px auto;
width: 200px;
text-align: center;
}
.iconinfo .ico {
display: block;
margin: 20px auto;
width: 48px;
height: 48px;
-webkit-background-size: cover;
background-size: cover;
background-repeat: no-repeat;
}
.ico-success {
background-image: url(<?php echo $this->img('ico-success.png');?>); float:left;
}
.iconinfo strong {
font-size: 16px;
font-weight: normal;
display: block;
line-height: 22px; float:left; padding-top:20px;
}
.goodslist p{ line-height:23px;}
.btn-buy {
width: 200px;
}
.btn-buy,.ui-btn,.ui-btn {
width: 200px;
padding: 0;
height: 37px;
border: 0;
border-bottom: 2px solid #b91d11;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;
background-color: #ec4e4f;
-webkit-box-shadow: 0 1px 1px rgba(0,0,0,.15), inset 0 1px rgba(254,101,101,0);
-moz-box-shadow: 0 1px 1px rgba(0,0,0,.15), inset 0 1px rgba(254,101,101,0);
box-shadow: 0 1px 1px rgba(0,0,0,.15), inset 0 1px rgba(254,101,101,0);
background: #ea4748;
line-height: 37px;
text-align: center;
font-size: 15px;
color: #fff;
text-decoration: none;
}
.dddddd{background-color: #1bb627;border-bottom: 2px solid #1bb674;}
.ui-btn {
display: block;
margin: 5px auto 0;
}
.ui-btn-text{ color:#fff}
</style>
<div id="main" style="padding:5px; padding-top:0px; min-height:300px">
    <div class="iconinfo">
        <i class="ico ico-success"></i>
        <?php if ( $rt['orderinfo']['pay_status'] =='1' ) { ?>
        <strong>已支付订单，<br>及时在会员中心留意订单状态！</strong>
        <?php } else if ( $rt['orderinfo']['pay_status'] =='2' ) { ?>
        <strong>已退款，<br>请及时将货品退还！</strong>
        <?php } else { ?>
        <strong>请您及时付款，<br>以便订单尽快处理！</strong>
        <?php } $ordergoods = $rt['goodslist']; ?>
    </div>
    <div class="goodslist">
        <table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-radius:5px; border:1px solid #ededed; margin-top:8px; padding-bottom:8px;">
        <?php if ( ! empty( $ordergoods ) ) { ?>
        <?php foreach ( $ordergoods as $row ) { ?>
            <tr>
                <td style="width:25%; text-align:center; height:80px; padding-top:10px; overflow:hidden;">
                    <img src="<?php echo SITE_URL.$row['goods_thumb'];?>" title="<?php echo $row['goods_name'];?>" border="0" style="width:100%; border:1px solid #ededed; padding:1px; margin-left:5px;">
                </td>
                <td align="left" valign="top">
                <p style="padding-left:10px; padding-top:10px">
                <?php echo $row['goods_name']; ?>
                </p>
                <p style=" padding-left:10px;font-size:14px;">团购价:
                <font color="#FF0000">￥<?php echo $row['goods_price'];?></font>
                </p>
                <p style="padding-left:10px;">数量:<?php echo $row['goods_number'];?>小计:
                <font color="#FF0000">￥<?php echo format_price( $row['goods_price'] * $row['goods_number'] ); ?></font>
                </p>
                </td>
            </tr>
        <?php } } ?>
        <tr>
            <td align="left" colspan="2">
            <p style="padding-top:5px; padding-left:10px; font-size:14px;">总金额：
            <font color="#FF0000"><b>￥<?php echo $rt['orderinfo']['order_amount']; ?></b></font></p>
            <p style="padding-top:5px; padding-left:10px; font-size:14px;">
            支付方式：<b><?php echo $rt['orderinfo']['pay_name'];?></b>&nbsp;
            配送方式：<b><?php echo $rt['orderinfo']['shipping_name'];?></b></p>
            </td>
        </tr>
        </table>
        <?php if ( $rt['orderinfo']['pay_status'] != '1' ) { ?>
        <div>
            <a href="<?php echo ADMIN_URL.'mycart.php?type=group_fastpay&oid='.$rt['orderinfo']['order_id'];?>" class="btn-buy button ui-btn ui-btn-text-only">
            <span class="ui-btn-text">立即支付</span>
            </a>
        </div>
        <?php } ?>
    </div>
</div>

<?php $this->element( '25/footer', array( 'lang' => $lang ) ); ?>