<div class="recommended">
	<div class="title"><img src="<?php echo $this->img('neiy-6_14.png');?>" width="250" height="40" /></div>
	<div class="content">
	<?php if(!empty($recommend)){?>
		<ul>
		<?php foreach($recommend as $row){?>
		<li>
			<div class="tuijianimg"><a href="<?php echo $row['url'];?>" title="<?php echo $row['goods_name'];?>"><img src="<?php echo $row['goods_thumb'];?>" alt="<?php echo $row['goods_name'];?>" width="80" /></a></div>
			<table width="140" border="0" cellspacing="0" cellpadding="0" style="float:left;" height="82">
			  <tr>
				<td colspan="2"><p style="width:140px; height:25px; overflow:hidden"><?php echo $row['goods_name'];?></p></td>
			  </tr>
			  <tr>
				<td width="50">型号：</td>
				<td width="88"><a href="<?php echo $row['url'];?>"><?php echo $row['goods_bianhao'];?></a></td>
			  </tr>
			  <tr>
				<td>规格：</td>
				<td></td>
			  </tr>
			  <tr class="color_price">
				<td>市场价：</td>
				<td><?php echo $row['market_price'];?>元/片</td>
			  </tr>
			</table>
		</li>
		<?php } ?>
		</ul>
	<?php } ?>
	</div>
</div>  	   