<?php 
if(!empty($rt['categoodslist'])){
foreach($rt['categoodslist'] as $row){
?>
<dl>
        <dd><a href="<?php echo $row['url'];?>" ><img src="<?php echo $row['goods_thumb'];?>"  width="167" height="176"/></a></dd>
        <dt><?php echo $row['goods_name'];?></dt>
        <dt>清仓价:￥<?php echo $row['promote_price'];?></dt>
        <dt> <span class="left">原价：￥<?php echo $row['market_price'];?></span> <span class="right" > <img src="<?php echo SITE_URL.'theme/images/qg.gif'?>" width="46" height="15" onclick="return addToCart('<?php echo $row['goods_id'];?>')" style="cursor:pointer"/> </span>
          <div class="clear"></div>
        </dt>
      </dl>
<?php } } ?>	  
      
      <div class="clear"></div>
      <div class="gehangline"></div>
      <p  class="num_list right">
	  <?php echo $rt['categoodspage']['showmes'];?>
	  <?php echo $rt['categoodspage']['prev'];?><?php
	 if(isset($rt['categoodspage']['list'])&&!empty($rt['categoodspage']['list'])){
	 foreach($rt['categoodspage']['list'] as $aa){
	 echo $aa."\n";
	 }
	 }
	?><?php echo $rt['categoodspage']['next'];?>
	</p>
