<div id="wrap">
	<div class="clear7"></div>
    	<?php $this->element('user_menu');?>
    <div class="m_right" >
		<div style="height:30px; line-height:30px;width:752px;background-color:#EDEDED; font-size:18px; text-align:left; font-weight:bold; padding-left:5px; padding-top:5px;">订单详情</div>
    	<div style="height:auto; padding:5px; width:745px; border:1px solid #ccc">
			<div class="flowBox">
			<h2 style="margin-top:10px;border-bottom:1px dashed #ccc">订单状态</h2>
			<table border="0" cellspacing="5" cellpadding="0" style="line-height:30px;" width="100%">
					<tr>
					<td align="right" width="150" bgcolor="#ffffff">订单号&nbsp;&nbsp;</td>
					<td align="left" bgcolor="#ffffff">&nbsp;&nbsp;<?php echo $rt['orderinfo']['order_sn'];?></td>
					</tr>
					<tr>
					<td align="right" width="150" bgcolor="#ffffff">订单状态:&nbsp;&nbsp;</td>
					<td align="left" bgcolor="#ffffff">&nbsp;&nbsp;<?php echo $rt['status'][0];?></td>
					</tr>
					<tr>
					<td align="right" width="150" bgcolor="#ffffff">付款状态:&nbsp;&nbsp;</td>
					<td align="left" bgcolor="#ffffff">&nbsp;&nbsp;<?php echo $rt['status'][1];?>
					<?php if($rt['orderinfo']['pay_status']==0 && $rt['orderinfo']['order_status']==0){?>
					&nbsp;&nbsp;&nbsp;
					<a href="javascript:;"  style="color:#FF0000; text-decoration:underline" onclick="return ajax_checkout(<?php echo $rt['orderinfo']['order_id']; ?>);">[现在完成支付]</a>
					<?php } ?>
					</td>
					</tr>
					<tr>
					<td align="right" width="150" bgcolor="#ffffff">配送状态:&nbsp;&nbsp;</td>
					<td align="left" bgcolor="#ffffff">&nbsp;&nbsp;<?php echo $rt['status'][2];?></td>
					</tr>
			</table>
			</div>
			<div class="clear"></div>

			<div class="flowBox">
				<h2 style="margin-top:10px;border-bottom:1px dashed #ccc">商品列表</h2>
				<table  border="0" cellspacing="5" cellpadding="0" style="line-height:30px;" width="100%">
					<tr>
				  <th bgcolor="#ffffff" height="20">商品名称</th>
				  <th bgcolor="#ffffff">属性</th>
				  <th bgcolor="#ffffff">原始价</th>
				  <th bgcolor="#ffffff">优惠价</th>
				  <th bgcolor="#ffffff">购买数量</th>
				  <th bgcolor="#ffffff">小计</th>
			 </tr>
		 <?php
		  if(!empty($rt['goodslist'])){
		  $total= 0;
		  $jifen_total = 0;
		  foreach($rt['goodslist'] as $k=>$row){
		  if($row['from_jifen'] > 0){
		  	$jifen_total +=$row['from_jifen'];
		  }else{
		  	$total +=$row['goods_price']*$row['goods_number'];
		  }
		  ?>
		 <tr>
			  <td align="center" bgcolor="#ffffff">
				 <img src="<?php echo empty($row['goods_thumb']) ? $this->img('no_picture.gif') : SITE_URL.$row['goods_thumb'];?>" border="0" width="50"><br>
				 <?php echo ($row['is_gift']==1 ? '<font color="red">[赠品]</font>'.$row['goods_name'] : $row['goods_name']); if(!empty($row['buy_more_best'])){echo '<br />该商品实行<font style="color:#FE0000;font-weight:bold">['.$row['buy_more_best'].']</font>促销活动，欢迎订购！';}?>
			  </td>
			  <td align="center" bgcolor="#ffffff"><?php echo $row['goods_attr'];?></td>
			  <td align="center" bgcolor="#ffffff">￥<?php echo $row['market_price'];?></td>
			  <td align="center" bgcolor="#ffffff">￥<?php echo $row['goods_price'];?></td>
			  <td align="center" bgcolor="#ffffff"><?php echo $row['goods_number'];?></td>
			  <td align="center" bgcolor="#ffffff" class="raturnprice">￥<?php echo $row['goods_price']*$row['goods_number']; if($row['from_jifen']>0) echo '&nbsp;&nbsp;<font color="red">[积分换取商品]</font>';?></td>
		   </tr>
		 <?php }?>
		<tr>
		  <td bgcolor="#ffffff" colspan="6">
		  商品总价(不计邮费) ￥<span class="totalprice" style="color:red"><?php echo $total;?>&nbsp;&nbsp;</span><?php if($rt['orderinfo']['offprice']>0){?>其中账户支付价格 ￥<span class="totalprice" style="color:red"><?php echo $p1 = format_price(($rt['orderinfo']['offprice']*$total)/$rt['orderinfo']['goods_amount']);?>&nbsp;&nbsp;</span><?php } ?><?php if($rt['orderinfo']['order_amount']>0){?>实际支付价 ￥<span class="totalprice" style="color:red"><?php echo format_price($total-$p1);?></span><?php } ?><?php if($jifen_total>0){?>&nbsp;&nbsp;支付积分：<span style="color:red"><?php echo $jifen_total;?></span><?php } ?>&nbsp;&nbsp;&nbsp;配运费：<span class="free_shopping" style="color:red">￥<?php echo $rt['orderinfo']['shipping_fee'];?></span>
		  </td>
		</tr>
	<?php }
	?>
	</table>
			  </div>
			  <div class="clear"></div>
			  <div class="flowBox">
			  <h2 style="margin-top:10px;border-bottom:1px dashed #ccc">收货人信息</h2>
			  <table  border="0" cellspacing="5" cellpadding="0" style="line-height:30px;" width="100%">
					<tr>
					  <td bgcolor="#ffffff">收货人姓名:</td>
					  <td bgcolor="#ffffff"><?php echo $rt['orderinfo']['consignee'];?></td>
					  <td bgcolor="#ffffff">电子邮件地址:</td>
					  <td bgcolor="#ffffff"><?php echo $rt['orderinfo']['email'];?></td>
					</tr>
					<tr>
					  <td bgcolor="#ffffff">发货城市:</td>
					  <td bgcolor="#ffffff"><?php echo $rt['orderinfo']['province'].'&nbsp;'.$rt['orderinfo']['city'].'&nbsp;'.$rt['orderinfo']['district'].'&nbsp;'.$rt['orderinfo']['towns'].'&nbsp;'.$rt['orderinfo']['villages'].'&nbsp;';?></td>
					  <td bgcolor="#ffffff">电话:</td>
					  <td bgcolor="#ffffff"><?php echo $rt['orderinfo']['tel'];?>&nbsp;|&nbsp;<?php echo $rt['orderinfo']['mobile'];?> </td>
					</tr>
					<tr>
					  <td bgcolor="#ffffff"><?php echo $rt['orderinfo']['shipping_id']==6 ? '自提门店' : '收货地址';?>:</td>
					  <td bgcolor="#ffffff"><?php if($rt['orderinfo']['shipping_id']==6){ echo $rt['orderinfo']['province'].'&nbsp;'.$rt['orderinfo']['city'].'&nbsp;'.$rt['orderinfo']['district'].'&nbsp;'.$rt['orderinfo']['towns'].'&nbsp;'.$rt['orderinfo']['villages'].'&nbsp;'.$rt['orderinfo']['peisongname']; }else{ echo $rt['orderinfo']['province'].'&nbsp;'.$rt['orderinfo']['city'].'&nbsp;'.$rt['orderinfo']['district'].'&nbsp;'.$rt['orderinfo']['towns'].'&nbsp;'.$rt['orderinfo']['villages'].'&nbsp;'.$rt['orderinfo']['address'];}?> </td>
					  <td bgcolor="#ffffff">邮政编码:</td>
					  <td bgcolor="#ffffff"><?php echo $rt['orderinfo']['zipcode'];?></td>
					</tr>
				  </table>
			  </div>
			 <div class="clear"></div>
			<div class="flowBox">
			<h2 style="margin-top:10px; border-bottom:1px dashed #ccc">其他信息</h2>
			<table  border="0" cellspacing="5" cellpadding="0" style="line-height:30px;" width="100%">
					<tr>
					<td align="right" width="150" bgcolor="#ffffff">配送方式:&nbsp;&nbsp;</td>
					<td align="left" bgcolor="#ffffff">&nbsp;&nbsp;<?php echo $rt['orderinfo']['shipping_name'];?></td>
					</tr>
					<tr>
					<td align="right" width="150" bgcolor="#ffffff">支付方式:&nbsp;&nbsp;</td>
					<td align="left" bgcolor="#ffffff">&nbsp;&nbsp;<?php echo $rt['orderinfo']['pay_name'];?></td>
					</tr>
					<tr>
					  <td valign="top" align="right" bgcolor="#ffffff">送货时间:&nbsp;&nbsp;</td>
					  <td bgcolor="#ffffff">&nbsp;&nbsp;<?php echo !empty($rt['orderinfo']['best_time']) ? $rt['orderinfo']['best_time'] : '无说明';?></td>
					</tr>
					<tr>
					  <td valign="top" align="right" bgcolor="#ffffff">订单附言:&nbsp;&nbsp;</td>
					  <td bgcolor="#ffffff">&nbsp;&nbsp;<?php echo $rt['orderinfo']['postscript'];?></td>
					</tr>
					<tr>
					<td style="text-align:center; font-weight:bold" colspan="2"><label>
					  <input type="button" name="Submit" value="返回" onclick="history.back()"  style="cursor:pointer; padding:4px"/>
					</label></td>
					</tr>
				  </table>
			</div>
			<div class="clear"></div>
        </div>
     </div>
    <div class="clear"></div>
  </div>
  <div class="clear7"></div>
<script type="text/javascript">
function ajax_checkout(oid){
	var f = document.createElement("form");
	document.body.appendChild(f);
	var i = document.createElement("input");
	i.type = "hidden";
	f.appendChild(i);
	i.value = oid;
	i.name = "order_id";
	f.method = 'post';
	f.target = 'a';
	f.action = SITE_URL+"mycart.php?type=fastcheckout";
	f.submit();
	return false;
}


</script>