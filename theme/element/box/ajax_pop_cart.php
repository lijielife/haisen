<div class="ajaxshowcartbox">
	<div class="ajaxshowcartbox2">
	<?php if(!empty($cart)){?>
		<?php foreach($cart as $row){?>
		<div class="cartitem<?php echo $thisgid==$row['goods_id'] ? ' tac':'';?>" style="font-size:12px; font-style:normal; font-weight:400; text-align:left; padding-bottom:5px; padding-top:5px;">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
			<td align="center" valign="top"><div style="width:70px; text-align:center"><img src="<?php echo SITE_URL.$row['goods_thumb'];?>" width="60" /></td>
			<td align="left" valign="top"><div style="width:150px; text-align:left">
			<a href="<?php echo SITE_URL.'product.php?id='.$row['goods_id'];?>"><?php echo $row['goods_name'];?></a>
			<p style="color:#CCCCCC; ">数量 <?php echo $row['number'];?></p>
			</div></td>
			<td align="center" valign="top"><div style="width:60px; text-align:center">$<?php echo ($row['is_promote']=='1' && $row['promote_end_date'] > mktime()) ? ($row['promote_price']>$row['pifa_price'] ? $row['pifa_price'] : $row['promote_price']) : $row['pifa_price'];?></div></td>
			</tr>
			</table>
		</div>
		<?php } ?>
		<p style="text-align:center"><a href="<?php echo SITE_URL;?>mycart.php?type=cartlist" class="check_out">查看购物车</a></p>
	<?php }else{?>
	<p style="font-size:12px; font-style:normal; font-weight:400;text-align:center; line-height:40px;">购物车目前是空的!</p>
	<?php } ?>
	</div>
</div>