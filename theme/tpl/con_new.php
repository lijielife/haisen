 <div class="artical_list_content">
			 <div class="artical_list_content_left">
				  <div class="li_list">
				  	<h4>新闻分类</h4>
					  <ul>
					  <?php if(!empty($rt['sub_cate'])&&is_array($rt['sub_cate'])){
					  foreach($rt['sub_cate'] as $rows){
					  ?>
						  <li><a href="<?php echo $rows['url'];?>"><?php echo $rows['cat_name'];?></a></li>
					  <?php } } ?>
					  </ul>
				  </div>
				<div class="gehang">&nbsp;</div>
					  <div class="li_list" style="min-height:200px;">
						  <h4>相关文章</h4>
						  <ul>
						  <?php if(!empty($rt['rand_list'])&&is_array($rt['rand_list'])){
						  foreach($rt['rand_list'] as $row){
						  ?>
							  <li><a href="<?php echo $row['url'];?>" title="<?php echo $row['article_title'];?>"><?php echo Import::basic()->wordcut($row['article_title'],40);?></a></li>
						  <?php } } ?>
						  </ul>
					  </div>
					  
					  <div class="gehang">&nbsp;</div>
					  <div class="li_list_goods li_list">
						  <h4>推荐商品</h4>
						  <?php
						   if(!empty($rt['tuijian'])){
						   foreach($rt['tuijian'] as $row){
						  ?>
							<dl style="text-align:center">
								<dd style="padding-top:10px; margin-bottom:10px;"><a href="<?php echo $row['url'];?>"><img src="<?php echo $row['goods_thumb'];?>" width="132"/></a></dd>
								<dt><a href="<?php echo $row['url'];?>"><?php echo $row['goods_name'];?></a></dt>
								<dt style="border-bottom:1px dotted #ccc; padding-bottom:10px;"><span style="clear:both; color:#E81478">¥<?php echo $row['promote_price']>0 ? $row['promote_price'] : $row['shop_price'];?></span></dt>
							</dl>
						   <?php } }  ?>
					  </div>
			 </div>
			 <div class="artical_list_content_right">
				  <div class="artical_list_content_right_title"><p class="thishere"><span>您当前所在的位置是：</span><?php echo isset($rt['here'])? $rt['here'] : $rts['here'];?>&nbsp;&gt;&nbsp;<?php echo $rt['article_con']['article_title'];?></p></div>
		     <div class="wrap_top_right_new">
						<ul class="tab" id="tab2">
							<?php
							 if(!empty($rt['catecon'])){
							 foreach($rt['catecon'] as $row){
							 ?>
							<li><a href="<?php echo $row['url'];?>" target="_blank"><?php echo $row['article_title'];?></a><span><?php echo  date('Y-m-d',$row['addtime']);?></span></li>
							<?php }} ?>
							
							<div class="clear"></div>
							<div class="con_box">
							<p class="pages">
							<?php echo $rt['categorypage']['showmes'];?>
							<?php echo $rt['categorypage']['first'];?>
							<?php echo $rt['categorypage']['prev'];?>
							<?php
							 if(isset($rt['categorypage']['list'])&&!empty($rt['categorypage']['list'])){
								 foreach($rt['categorypage']['list'] as $aa){
							 echo $aa."\n";
							 }
							 }
							?>
							<?php echo $rt['categorypage']['next'];?>
							<?php echo $rt['categorypage']['last'];?>
							</div>
						</ul>
			  </div>
								   
			 </div>
			 
			 <div class="clear"></div>
   </div>   
