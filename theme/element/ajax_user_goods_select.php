   <?php if(!empty($rt['goodspage'])){?>
   <p style="padding-right:5px;" class="ajax_page"><?php echo $rt['goodspage']['first'];?><?php echo $rt['goodspage']['prev'];?><?php echo $rt['goodspage']['next'];?><?php echo $rt['goodspage']['last'];?><?php echo $rt['goodspage']['tt'];?><?php echo $rt['goodspage']['showmes'];?></p>
	<?php } ?>
   <div class="clear">&nbsp;</div>
<?php if(!empty($rt['goodslist'])){?>
	   <ul>
		<?php foreach($rt['goodslist'] as $row){?>
		   <li>
			   <a href="<?php echo $row['url'];?>" title="<?php echo $row['goods_name'];?>" style="height:270px; overflow:hidden; display:block"><img src="<?php echo $row['goods_thumb'];?>" width="183"/></a>
			   <span style="margin-top:5px">【<?php echo $row['brand_name'];?> <?php echo $row['cat_name'];?>】</span>
			   <span><?php echo $row['goods_bianhao'];?></span>
			   <span>市场价：<?php echo $row['market_price'];?>元</span>
			   <?php 
			   $uid = $this->Session->read('User.uid');
			   $active = $this->Session->read('User.active');
			   ?>
			   <span><?php if(empty($uid)){?><a href="javascript:;" onclick="JqueryDialog.Open('天顺祥提醒你',return_login_string(),300,50);"><img src="theme/images/price_list.jpg" /></a><?php }else{
			   if($active=='1'){
			   ?>会员价：<?php echo $row['shop_price'].'元';
			   }else{
			   	echo "会员资料审核中";
			   }
			   } ?></span>
		   </li>
		  <?php } ?>
	   </ul>
	   <?php } ?>
	   <div class="clear">&nbsp;</div>
	   <?php if(!empty($rt['goodspage'])){?>
	   <p style="padding-right:5px;" class="ajax_page"><?php echo $rt['goodspage']['first'];?><?php echo $rt['goodspage']['prev'];?><?php echo $rt['goodspage']['next'];?><?php echo $rt['goodspage']['last'];?><?php echo $rt['goodspage']['tt'];?><?php echo $rt['goodspage']['showmes'];?></p>
		<?php } ?>