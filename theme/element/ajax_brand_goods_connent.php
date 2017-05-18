<?php if(!empty($rt['categoodslist'])){?>
<ul class="product-list">
<?php foreach($rt['categoodslist'] as $row){?>
<li>
	<a href="<?php echo $row['url'];?>"><img src="<?php echo $row['goods_thumb'];?>" alt="<?php echo $row['goods_name'];?>" onload="image_size_load(this,'145')"/></a>
	<a href="<?php echo $row['url'];?>" title="<?php echo $row['goods_name'];?>"><span class="goods_name"><?php echo $row['goods_name'];?></span></a>
	<span class="goods_num"><strong>￥<?php echo $row['qianggou_price']>0 ? $row['qianggou_price'] : ($row['promote_price']>0 ? $row['promote_price'] : $row['shop_price']);?></strong></span>
	<!--<span class="goods_price"><input type="text" name="number" size="1" value="1"/>件<img src="<?php echo SITE_URL.'theme/images/bnt_buy.gif'?>" onclick="return addToCart('<?php echo $row['goods_id'];?>','',this)" style="cursor:pointer; float:right"/></span>-->
</li>
<?php }?>
<div class="clear"></div>
</ul>
<?php }?>
<div class="clear"></div>
<p class="pages">
<?php echo $rt['categoodspage']['showmes'];?>
<?php echo $rt['categoodspage']['first'];?>
<?php echo $rt['categoodspage']['previ'];?>
<?php
 if(isset($rt['categoodspage']['list'])&&!empty($rt['categoodspage']['list'])){
 foreach($rt['categoodspage']['list'] as $k=>$aa){
 echo '<a href="'.$aa.'">'.$k++.'</a>'."\n";
 }
 }
?>
<?php echo $rt['categoodspage']['next'];?>
<?php echo $rt['categoodspage']['Last'];?>
</p>