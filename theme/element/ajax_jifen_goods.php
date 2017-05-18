<?php if(!empty($rt['jifengoods'])){
foreach($rt['jifengoods'] as $row){
?>
<dl>
  <dd style="height:178px; width:169px; overflow:hidden"><a href="<?php echo $row['url'];?>" title="<?php echo $row['goods_name'];?>"><img src="<?php echo $row['goods_thumb'];?>" width="167" alt="<?php echo $row['goods_name'];?>"/></a></dd>
  <dt><?php echo $row['goods_name'];?></dt>
  <dt ><u class="cr2"><?php echo $row['need_jifen'];?>积分</u></dt>
  <dt>原价：￥<?php echo $row['market_price'];?></dt>
  <dt><img src="<?php echo SITE_URL;?>images/changnow.gif" width="71" height="15" onclick="return addToCart('<?php echo $row['goods_id'];?>','jifen')" style="cursor:pointer"/></dt>
</dl>
<?php } } ?>
<div class="clear" style="border-bottom: dotted 1px #d2d2d2;"></div>
<div class="gehang"></div>
<p class="num_list right">

<?php echo $rt['jifengoodspage']['showmes'];?>
<?php echo $rt['jifengoodspage']['prev'];?>
	<?php
	 if(isset($rt['jifengoodspage']['list'])&&!empty($rt['jifengoodspage']['list'])){
	 foreach($rt['jifengoodspage']['list'] as $aa){
	 echo $aa."\n";
	 }
	 }
	?>
	<?php echo $rt['jifengoodspage']['next'];?></p>
</p>
