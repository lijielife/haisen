<table width="100%" border="0" cellpadding="1"  cellspacing="1" style="line-height:40px;">
  <tr bgcolor="#FFFFFF">
    <td width="107px" class=" bg_grey">订单编号</td>
    <td class=" bg_grey">订单商品</td>
    <td class=" bg_grey">收货人</td>
    <td class=" bg_grey">支付方式</td>
    <td class=" bg_grey">下单时间</td>
    <td class=" bg_grey">订单状态</td>
    <td class=" bg_grey">操作</td>
  </tr>
   <?php
   if(!empty($rt['orderlist'])){
   foreach($rt['orderlist'] as $row){
  ?>
  <tr class="thth">
    <td class="cr2">&nbsp;<a href="user.php?act=orderinfo&order_id=<?php echo $row['order_id'];?>"><?php echo $row['order_sn'];?></a>&nbsp;</td>
    <td  width="216">
		<?php 
		foreach($row['goods'] as $rows){
		  ?>
		   <a href="<?php echo SITE_URL.'product.php?id='.$rows['goods_id'];?>" title="<?php echo $rows['goods_name'];?>" target="_blank"><img src="<?php echo SITE_URL.$rows['goods_thumb'];?>" width="46" height="46" alt="<?php echo $rows['goods_name'];?>" align="middle"></a>&nbsp;
		  <?php
		}
		?>
	</td>
    <td><?php echo $row['consignee'];?></td>
    <td><?php echo $row['pay_name'];?></td>
    <td width="87" class="cr3"><?php echo date('H-m-d H:i:s',$row['add_time']);?></td>
    <td class="cr2"><?php echo $row['status'];?> </td>
    <td class="cr2" style="line-height:24px;">
	<?php echo $row['op'];?>
	<?php if($row['pay_status']==0 && $row['order_status']==0){?>
	<br />
	<a href="javascript:;" onclick="return ajax_checkout(<?php echo $row['order_id']; ?>);">现在完成支付</a>
	<?php } ?>
	<br/>
	<a href="user.php?act=orderinfo&order_id=<?php echo $row['order_id'];?>">查看订单</a>
	</td>
  </tr>
<?php } } ?>
</table>
				  
				  <style>
				  .pagebtn{ margin-top:20px; float:right}
				  .pagebtn a{ padding:3px; color:#FFF; margin-left:2px; margin-right:2px; text-decoration:none; background-color:#555; border-bottom:1px solid #000;border-right:1px solid #000;}
				  .pagebtn a:hover{ text-decoration:underline}
				  </style>
			<div class="clear"></div>	  
			 <?php if(!empty($rt['orderpage'])){?>
	   <p class="pagebtn"  style="text-align:right;width:700px;"><?php echo $rt['orderpage']['showmes'];?><?php echo $rt['orderpage']['first'];?><?php echo $rt['orderpage']['prev'];?><?php echo $rt['orderpage']['next'];?><?php echo $rt['orderpage']['last'];?></p>
		<?php } ?>