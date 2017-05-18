<table width="100%"  cellpadding="0"  cellspacing="0" border="0" bordercolor="#e4e1e1">
  <tr>
    <td width="107" class=" bg_grey">订单编号</td>
    <td class=" bg_grey">送货地址/自提便利店</td>
    <td class=" bg_grey" width="70">收货人</td>
    <td class=" bg_grey" width="70">支付方式</td>
    <td class=" bg_grey">下单时间</td>
    <td class=" bg_grey">订单状态</td>
    <td class=" bg_grey">操作</td>
  </tr>
   <?php
   if(!empty($rt['orderlist'])){
   foreach($rt['orderlist'] as $row){
  ?>
  <tr>
    <td class="cr2">&nbsp;<a href="suppliers.php?act=suppliers_orderinfo&order_id=<?php echo $row['order_id'];?>"><?php echo $row['order_sn'];?></a>&nbsp;</td>
    <td  width="216" style="text-align:left; padding-left:5px">
		<p style="line-height:21px;"><?php echo $row['address']['shipping_id']==6 ? '<b>自提门店</b>' : '<b>收货地址</b>';?>:
		<?php echo $row['address']['province'].'&nbsp;'.$row['address']['city'].'&nbsp;'.$row['address']['district'].'&nbsp;'.$row['address']['towns'].'&nbsp;'.$row['address']['villages'].'&nbsp;';if($row['address']['shipping_id']==6){ echo $row['address']['peisongname']; }else{ echo $row['address']['address'];}?> </p>
	</td>
    <td><?php echo $row['consignee'];?></td>
    <td><?php echo $row['pay_name'];?></td>
    <td width="82" class="cr3"><?php echo date('Y-m-d H:i:s',$row['add_time']);?></td>
    <td class="cr2 status_<?php echo $row['order_id'];?>"><?php echo $row['status'];?> </td>
    <td id="<?php echo $row['order_id'];?>" class="cr2 setbutton_<?php echo $row['order_id'];?>"><?php echo $row['op'];?></td>
  </tr>
<?php } } ?>
</table>
<style>
.pagebtn{ margin-top:20px}
.pagebtn a{ padding:3px; color:#666; text-decoration:none}
.pagebtn a:hover{ color:#fe0000}
</style>
<?php if(!empty($rt['orderpage'])){?>
<p class="pagebtn"  style="text-align:right;width:780px;"><?php echo $rt['orderpage']['showmes'];?><?php echo $rt['orderpage']['first'];?><?php echo $rt['orderpage']['prev'];?><?php echo $rt['orderpage']['next'];?><?php echo $rt['orderpage']['last'];?></p>
<?php } ?>
