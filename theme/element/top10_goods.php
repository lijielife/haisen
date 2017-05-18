 <div class="ranking">
	<div class="title"><img src="<?php echo $this->img('index_32.png');?>" width="250" height="40" /></div>
	<div class="content">
	<?php if(!empty($top10)){?>
		<div class="no1">
			<div class="no1img"><a href="<?php echo $top10[0]['url'];?>" title="<?php echo $top10[0]['goods_name'];?>"><img src="<?php echo SITE_URL.$top10[0]['goods_thumb'];?>" width="80" alt="<?php echo $top10[0]['goods_name'];?>"/></a></div>
			<div class="no1text">
				<ul>
					<li><span style="color:#C00; font-size:14px; font-weight:bold; font-family:Arial;">NO.
					<span style="font-size:18px;">1</span></span></li>
					<li class="goodsname"><?php echo $top10[0]['goods_name'];?></li>
					<li>规格：</li>
					<li><span class="color_price">市场价：<?php echo $top10[0]['market_price'];?> 元/片</span></li>
				</ul>
			</div>
		</div>
	<?php
	 } 
	 if(count($top10)>1){
	 ?>	
		<table width="250" border="0" cellspacing="0" cellpadding="0" style="float:left; line-height:26px;">
		<?php 
			foreach($top10 as $k=>$row){
	 		if($k==0) continue;
			if($k>5) break;
		?>
		  <tr>
			<td width="4%">&nbsp;</td>
			<td width="17%" align="left">
			  <span style="<?php if($k<3) echo 'color:#C00;';?>font-size:14px; font-weight:bold; font-family:Arial;">NO.<span style="font-size:18px;"><?php echo ++$k?></span></span>
			</td>
			<td width="50%" align="left" class="goodsname"><a href="<?php echo $row['url'];?>" title="<?php echo $row['goods_name'];?>"><?php echo $row['goods_name'];?></a></td>
			<td width="30%" align="right" class="color_price"><?php echo $row['market_price'];?>元/片</td>
			<td width="4%">&nbsp;</td>
		  </tr>
		  <?php } ?>
		</table>
		<?php } ?>
	</div>
</div>