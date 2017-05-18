<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/25/css.css" media="all" />

<style type="text/css">
.pw,.pwt{
height:26px; line-height:26px;
border: 1px solid #ddd;
border-radius: 5px;
background-color: #fff; padding-left:5px; padding-right:5px;
-moz-border-radius:5px;/*仅Firefox支持，实现圆角效果*/
-webkit-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
-khtml-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
border-radius:5px;/*仅Opera，Safari,Chrome支持，实现圆角效果*/
}
.pw{ width:90%;}
.usertitle{
height:22px; line-height:22px;color:#666; font-weight:bold; font-size:14px; padding:5px;
border-radius: 5px;
background-color: #ededed; padding-left:5px; padding-right:5px;
-moz-border-radius:5px;/*仅Firefox支持，实现圆角效果*/
-webkit-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
-khtml-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
border-radius:5px;/*仅Opera，Safari,Chrome支持，实现圆角效果*/
}
table p{ line-height:22px;}
#main table td a.payst{ border-top:1px solid #ededed;border-left:1px solid #ededed; padding:3px 7px 3px 7px; background:#fafafa; border-bottom:2px solid #d5d5d5;border-right:2px solid #d5d5d5;border-radius:10px;}
</style>
<div style="height:40px; line-height:40px; padding-left:10px; padding-right:10px; background:#eee; border-bottom:1px solid #ccc">
<span style="float:left">订单详情</span>
<a style="float:right; font-size:14px" href="<?php echo ADMIN_URL; ?>">继续购物>></a>
</div>
<div id="main" style="padding:5px; min-height:300px">
    <table border="0" cellspacing="5" cellpadding="0" style="line-height:24px;" width="100%">
        <tr>
            <td align="left">订单号&nbsp;&nbsp;</td>
            <td align="left">&nbsp;&nbsp;<?php echo $rt['orderinfo']['order_sn']; ?></td>
        </tr>
        <tr>
            <td align="left">订单状态:&nbsp;&nbsp;</td>
            <td align="left">&nbsp;&nbsp;<?php echo $rt['status'][0]; ?></td>
        </tr>
        <tr>
            <td align="left">付款状态:&nbsp;&nbsp;</td>
            <td align="left">&nbsp;&nbsp;<?php echo $rt['status'][1]; ?>
            <?php if ( $rt['orderinfo']['pay_status'] == '0' && $rt['orderinfo']['order_status'] != '1' ) { ?>
            &nbsp;&nbsp;<a class="payst" href="<?php echo ADMIN_URL.'mycart.php?type=fastpay&oid='.$rt['orderinfo']['order_id']; ?>">立即支付</a>&nbsp;&nbsp;<a href="<?php echo ADMIN_URL.'mycart.php?type=pay&oid='.$rt['orderinfo']['order_id']; ?>" class="payst">找人代付</a>
            <?php } ?>
            </td>
        </tr>
        <tr>
            <td align="left">配送状态:&nbsp;&nbsp;</td>
            <td align="left">&nbsp;&nbsp;<?php echo $rt['status'][2]; ?></td>
        </tr>
        <tr>
            <td align="left">订单附言:&nbsp;&nbsp;</td>
            <td align="left">
            <textarea style="margin: 0px; height: 181px; width: 198px;"><?php echo $rt['orderinfo']['postscript']; ?></textarea>
            </td>
            <!-- <td align="left">&nbsp;&nbsp;<?php echo $rt['status'][2]; ?></td> -->
        </tr>
    </table>
    <div class="usertitle">商品清单</div>
    <?php if ( ! empty( $rt['goodslist'] ) ) foreach ( $rt['goodslist'] as $row ) { ?>
    <table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-radius:5px; border:1px solid #e1e1e1; margin-top:10px;">
        <tr>
            <td style="width:80px; text-align:center; height:80px; padding-top:10px; overflow:hidden; border-bottom:1px solid #ededed;">
                <img src="<?php echo SITE_URL.$row['goods_thumb'];?>" title="<?php echo $row['goods_name'];?>" border="0" style="width:78px; height:78px; border:1px solid #e1e1e1; padding:1px; margin-left:5px;">
            </td>
            <td style="text-align:left; border-bottom:1px solid #ededed;" valign="top">
                <p style="padding-left:10px;">
                <?php echo $row['goods_name'];?>
                </p>
                <?php if ( ! empty( $row['goods_attr'] ) ) {
                 echo '<p style="padding-left:10px;">'.$row['goods_attr'].'</p>';
                } ?>
                <p style=" padding-left:10px;font-size:14px;">
                    <font color="#FF0000">￥<?php echo $row['goods_price']; ?></font>
                </p>
                <!-- <p style="padding-left:10px;"> 重量:0克 </p> -->
                <p style="padding-left:10px;">数量:<?php echo $row['goods_number']; ?><b style="margin-left:3px;"><?php  echo $row['goods_unit'];?></b>&nbsp;&nbsp;小计:<font color="#FF0000">￥<?php echo $row['goods_price'] * $row['goods_number']; ?></font>
                </p>
            </td>
        </tr>
        <?php foreach ( $row['ress'] as $k => $rows ) { ?>
            <tr>
                <td>&nbsp;</td>
                <td style="text-align:left">
                    <div style="padding:5px; padding-left:25px;border-radius:5px; border:1px solid #ededed; margin-bottom:5px; margin-top:5px; position:relative">
                        <p>收货人:<?php echo $rows['consignee'];?>&nbsp;&nbsp;&nbsp;电话:<?php echo $rows['moblie'];?></p>
                        <p>收货地址:<?php echo $rows['province'].$rows['city'].$rows['district'].$rows['address'];?></p>
                        <p>数量:<?php echo $rows['goods_number'];?></p>
                        <span style="border-radius:50%; padding:3px; display:block;background:#B70000; text-align:center; font-size:12px; font-weight:bold; color:#FFF; cursor:pointer; position:absolute;left:5px; top:40%; z-index:99"><i style="font-style:normal"><?php echo ++$k; ?></i></span>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </table>
    <?php } ?>
    <table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-radius:5px; margin-top:10px;">
        <tr>
            <td align="right">
            <p style="padding:10px; font-size:14px; background:#FEE4CD">总金额:<span class="totalprice" style="color:red">￥<?php echo $rt['orderinfo']['order_amount'];?></span></p>
            </td>
        </tr>
    </table>
</div>
<?php $this->element( '25/footer', array( 'lang' => $lang ) ); ?>