<table width="100%"  cellpadding="0"  cellspacing="0" border="1" bordercolor="#e4e1e1">
 <?php
   $kk=0;
   if(!empty($rt)) foreach($rt as $order_sn=>$item){
  ?>
  	<tr>
		<td style="position:relative"><?php if($kk==0){?><p style="line-height:42px; position:absolute; top:0px; left:0px; border-bottom:2px solid #E4E1E1; text-align:center; width:100%">订单编号</p><?php } ++$kk; echo $order_sn;?></td>
		<td colspan="6">
			<table width="100%"  cellpadding="0"  cellspacing="0" border="1" bordercolor="#e4e1e1">
				<?php if(!empty($item))foreach($item as $k=>$row){?>
				<?php if($k==0){?>
				 <tr>
					<td>订单商品</td>
					<td>自提人</td>
					<td>支付方式</td>
					<td>下单时间</td>
					<td>订单状态</td>
				  </tr>
				  <?php } ?>
				  <tr>
					<td colspan="4" style="padding-left:10px; text-align:left"><b>退换货地址：</b><span class="loads"><img src="<?php echo SITE_URL;?>theme/images/loadings.gif" onload="return load_suppliers_address('<?php echo $row['suppliers_id'];?>',this)" onclick="return load_suppliers_address('<?php echo $row['suppliers_id'];?>',this)" title="无法看到地址请点击这里" align="absmiddle" style="cursor:pointer"/>无法看到地址请点击这里</span>&nbsp;</td>
					<td><a href="<?php echo SITE_URL;?>user.php?act=orderinfo&order_id=<?php echo $row['order_id'];?>&sid=<?php echo $row['suppliers_id'];?>" style="color:#B70000">查看订单详情</a></td>
				  </tr>
				  <tr>
					<td  width="280" style="text-align:left; padding-left:5px">
						<?php 
						foreach($row['goods'] as $rows){
						  ?>
						  <?php if($rows['is_gift']!=1 && ($row['add_time']>=mktime()-15*24*3600) && $row['shipping_status']>0){?><input type="button" value="<?php echo $rows['status']=='0'?'退换货': ($rows['status']=='1' ? '退货申请中':($rows['status']=='2' ? '换货申请中':($rows['status']=='3'?'已退货':'已换货')));?>" style="padding:3px;cursor:pointer" id="<?php echo $rows['goods_id'].'-'.$row['order_id'];?>" class="tuihuanhuo <?php echo 'set_'.$rows['goods_id'].$row['order_id'];?>"/>&nbsp;<?php } ?>
						   <a href="<?php echo SITE_URL.'product.php?id='.$rows['goods_id'];?>" title="<?php if($rows['is_gift']!=1){ echo $rows['goods_name'];}?>" target="_blank"><img src="<?php echo empty($rows['goods_thumb']) ?  SITE_URL.'theme/images/no_picture.gif' : SITE_URL.$rows['goods_thumb'];?>" width="46" height="46" alt="<?php if($rows['is_gift']!=1){ echo $rows['goods_name'];}?>" align="middle"></a>&nbsp;<?php echo $rows['goods_bianhao']; ?>&nbsp;<?php echo $rows['goods_name'].'<br/>';?>
						  <?php
						}
						?>
					</td>
					<td><?php echo $row['consignee'];?></td>
					<td><?php echo $row['pay_name'];?></td>
					<td width="87" class="cr3"><?php echo date('Y-m-d H:i:s',$row['add_time']);?></td>
					<td class="cr2 status_<?php echo $row['order_id'];?>"><?php echo $row['status'];?> </td>
				  </tr>
				 <?php } ?>
			</table>
		</td>
	</tr>
<?php }  ?>
</table>
<style>
.pagebtn{ margin-top:20px}
.pagebtn a{ padding:3px; color:#666; text-decoration:none}
.pagebtn a:hover{ color:#FE0000}
</style>

<?php if(!empty($rt['orderpage'])){?>
<p class="pagebtn"  style="text-align:right;width:780px;"><?php echo $rt['orderpage']['showmes'];?><?php echo $rt['orderpage']['first'];?><?php echo $rt['orderpage']['prev'];?><?php echo $rt['orderpage']['next'];?><?php echo $rt['orderpage']['last'];?></p><?php } ?>