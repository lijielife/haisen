<style type="text/css">
body,td {font-size:13px;}
p{ height:22px; line-height:22px; margin:0px; padding:0px}
</style>
<?php if(!empty($orderlist))foreach($orderlist as $k=>$item){?>
<table width="100%" border="1" style="border-collapse:collapse;border-color:#333;">
	<tr>
		<td style="padding-left:2px;" valign="bottom" colspan="4"><img src="<?php echo $this->img('logo.gif');?>" /><b style="font-weight:bold; font-size:24px;">商品发货单</b></td>
	</tr>
	<tr>
		<td colspan="5" style="padding:5px; text-align:left">
		<p>如你有任何疑问，请根据以下信息与我们联系；</p>
		<p>网站：<?php echo $GLOBALS['LANG']['site_name'];?>（<?php echo SITE_URL;?>）</p>
		<p>公司地址：<?php echo $GLOBALS['LANG']['company_url'];?>&nbsp;&nbsp;电话：<?php echo implode(',',$GLOBALS['LANG']['custome_phone']);?>&nbsp;&nbsp;邮箱：<?php echo $GLOBALS['LANG']['custome_email'];?></p>
		</td>
	</tr>
</table>
<p style="border-left:1px solid #333;border-right:1px solid #333;height:16px;"></p>
<table width="100%" border="1" style="border-collapse:collapse;border-color:#333;">
    <tr>
        <td width="11%">客户:</td>
        <td><?php echo $shoplist[$k]['user_name'];?><!-- 购货人姓名 --></td>
        <td align="right">下单时间：</td><td><?php echo date('Y-m-d',mktime());?><!-- 下订单时间 --></td>
        <td align="right">支付方式：</td><td>货到付款<!-- 支付方式 --></td>
       <td align="right">配送方式：</td><td>门店自提<!-- 配送方式 --></td>
    </tr>
    <tr>
        <td>收货地址：</td>
        <td colspan="5">
        <?php echo $shoplist[$k]['province'].'&nbsp;'.$shoplist[$k]['city'].'&nbsp;'.$shoplist[$k]['district'].'&nbsp;'.$shoplist[$k]['towns'].'&nbsp;'.$shoplist[$k]['villages'].'&nbsp;'.$shoplist[$k]['address'].'&nbsp;'.$shoplist[$k]['user_name'];?><!-- 收货人地址 -->
        收货人：<?php echo $shoplist[$k]['consignee'];?>&nbsp;<!-- 收货人姓名 -->
        <!-- 邮政编码 -->
        电话：<?php echo $shoplist[$k]['home_phone'];?>&nbsp; <!-- 联系电话 -->
        手机：<?php echo $shoplist[$k]['mobile_phone'];?><!-- 手机号码 -->
        </td>
		<td align="right">要求配送时间：</td>
		<td align="left" width="12%">略</td>
    </tr>
</table>
<p style="border-left:1px solid #333;border-right:1px solid #333; height:16px;"></p>
<table width="100%" border="1" style="border-collapse:collapse;border-color:#333;">
		<tr>
			<td colspan="6"><b>备注：无</b></td>
		</tr>
    	<tr align="center">
			  <th bgcolor="#cccccc">序号</th>
			  <th bgcolor="#cccccc">商品名称</th>
			  <th bgcolor="#cccccc">规格</th>
			  <th bgcolor="#cccccc">优惠价</th>
			  <th bgcolor="#cccccc">购买数量</th>
			  <th bgcolor="#cccccc">小计</th>
		 </tr>
		 <?php
		  if(!empty($item)){
		  $total= 0;
		  $jifen_total = 0;
		  foreach($item as $k=>$row){
				$total +=$row['goods_price']*$row['numb'];

		  ?>
		 <tr>
		 	  <td><?php echo ++$k;?></td>
			  <td align="left" style="padding-left:5px;">
			  <?php echo $row['goods_name'];?>
			  </td>
			  <td align="center"><?php echo $row['goods_attr'];?></td>
			  <td align="center">￥<?php echo $row['goods_price'];?></td>
			  <td align="center"><?php echo $row['numb'].' '.$row['goods_unit'];?></td>
			  <td align="center">￥<?php echo $row['goods_price']*$row['numb'];?></td>
		   </tr>
		 <?php }?>
		<tr>
		  <td colspan="2">
		  购物金额小计(不计邮费) ￥<span class="totalprice" style="color:red"><?php echo $total;?> </span><!--&nbsp;&nbsp;&nbsp;配运费：<span class="free_shopping" style="color:red">￥<?php echo $rt['orderinfo']['shipping_fee'];?></span>-->
		  </td>
		  <td align="center" colspan="4">
		  </td>
		</tr>
	<?php 
	}
	?>
</table>
<table width="100%" border="0">
    <tr align="right"><!-- 订单操作员以及订单打印的日期 -->
        <td>打印时间：<?php echo date('Y-m-d H:i:s',mktime());?>&nbsp;&nbsp;&nbsp;操作者：<?php echo $this->Session->read('User.username');?></td>
    </tr>
</table>
<div style="height:40px;"></div>
<?php } ?>