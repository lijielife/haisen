<?php $rank = $this->Session->read('User.rank'); ?>
<?php if(!empty($rt['categoodslist'])){?>
<ul class="product-list">
<?php foreach($rt['categoodslist'] as $row){?>
<li>
	<span class="goods_font x2" style="display:block; height:20px; line-height:20px; background-color:#ededed; text-align:center; margin-bottom:2px"><b id="lefttime_<?php echo $row['goods_id'] ;?>">--:--:--</b></span>
	<a href="<?php echo $row['url'];?>"><img src="<?php echo $row['goods_thumb'];?>" alt="<?php echo $row['goods_name'];?>" onload="image_size_load(this,'145')"/></a>
	<a href="<?php echo $row['url'];?>" title="<?php echo $row['goods_name'];?>"><span class="goods_name"><?php echo $row['goods_name'];?></span></a>
	<span class="goods_num"><strong>￥
	<?php 
		if($rank == '10' || $rank == '11' || $rank =='12')
		{
			if($row['zprice']<$row['pifa_price']&& $row['zprice']>0)
			{
				echo $row['zprice'];
			}else if($row['pifa_price']>0)
			{
				echo $row['pifa_price'];
			}else
			{
				echo $row['shop_price'];
			}
		}else
		{
			if($row['zprice']<$row['shop_price']&& $row['zprice']>0)
			{
				echo $row['zprice'];
			}else
			{
				echo $row['shop_price'];
			}
		}	
			
	?>
	</strong></span>
	
	<span class="goods_price"><input type="text" name="number" size="1" value="1"/>件<img src="<?php echo SITE_URL.'theme/images/bnt_buy.gif'?>" onclick="return addToCart('<?php echo $row['goods_id'];?>','',this)" style="cursor:pointer; float:right"/></span>
	<script type="text/javascript" language="javascript">
			var dt = '<?php echo (isset($row) && !empty($row))? (intval($row['qianggou_end_date'])-mktime()) : 0;?>';
			var st = new showTime(<?php echo $row['goods_id'] ;?>, dt);  
			st.desc = "抢购结束";
			st.preg = "倒计时	{a}天	{b}:{c}:{d}";
			st.setid = "lefttime_";
			st.setTimeShow(); 
	</script>
</li>
<?php }?>
<div class="clear"></div>
</ul>
<?php }?>
<div class="clear"></div>
<p class="pages">
<?php echo $rt['categoodspage']['showmes'];?>
<?php echo $rt['categoodspage']['first'];?>
<?php echo $rt['categoodspage']['prev'];?>
<?php
 if(isset($rt['categoodspage']['list'])&&!empty($rt['categoodspage']['list'])){
 foreach($rt['categoodspage']['list'] as $aa){
 echo $aa."\n";
 }
 }
?>
<?php echo $rt['categoodspage']['next'];?>
<?php echo $rt['categoodspage']['last'];?>
</p>