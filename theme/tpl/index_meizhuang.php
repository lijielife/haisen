<div class="mzmain">
	<div class="mzbanner">
		<div class="cate">
			<p class="title"></p>
			<ul>
			<?php if(!empty($rt['menu']))foreach($rt['menu'] as $nav){?>
			<li>
			<a href="<?php echo SITE_URL.$rt['cateinfo']['cat_url'].'.php?cid='.$nav['id'];?>"><?php echo $nav['name'];?></a>
				<?php if(!empty($nav['cat_id'])){ ?>
				<div class="subcatel">
					<dl>
					<dt>商品分类</dt>
					<?php foreach($nav['cat_id'] as $row){?>
					<dd><a href="<?php echo SITE_URL.$rt['cateinfo']['cat_url'].'.php?cid='.$row['id'];?>"><?php echo $row['name'];?></a></dd>
					<?php } ?>
					<div class="clear"></div>
					<dt>价格分类</dt>
					<dd><a href="<?php echo SITE_URL.$rt['cateinfo']['cat_url'].'.php?price=0-100';?>">100元以下</a></dd>
					<dd><a href="<?php echo SITE_URL.$rt['cateinfo']['cat_url'].'.php?price=100-200';?>">100-200元</a></dd>
					<dd><a href="<?php echo SITE_URL.$rt['cateinfo']['cat_url'].'.php?price=200-300';?>">200-300元</a></dd>
					<dd><a href="<?php echo SITE_URL.$rt['cateinfo']['cat_url'].'.php?price=300-400';?>">300-400元</a></dd>
					<dd><a href="<?php echo SITE_URL.$rt['cateinfo']['cat_url'].'.php?price=400-500';?>">400-500元</a></dd>
					<dd><a href="<?php echo SITE_URL.$rt['cateinfo']['cat_url'].'.php?price=500-';?>">500元以上</a></dd>
					<div class="clear"></div>
					</dl>
					
					<div class="subcater">
					<p>热门品牌</p>
					</div>
					<div class="clear"></div>
				</div>
				<?php } ?>
			</li>
			<?php } ?>
			</ul>
		</div>
		
		<div class="mzbannerR">
			<?php $ad = $this->action('banner','banner','美妆日化主页顶部',5);?>
			<div id="xxx">
			<script type="text/javascript">
			 var box =new PPTBox();
			 box.width = 800; //宽度
			 box.height = 365;//高度
			 box.autoplayer = 3;//自动播放间隔时间
		
			 //box.add({"url":"图片地址","title":"悬浮标题","href":"链接地址"})
			 <?php if(!empty($ad))foreach($ad as $row){?>
			 box.add({"url":"<?php echo SITE_URL.$row['ad_img'];?>","href":"<?php echo $row['ad_url'];?>","title":"<?php echo $row['ad_name'];?>"})
			 <?php } ?>
			 box.show();
			</script>
			</div>

		</div>
		
		<div class="clear"></div>
	</div>
	<?php $b = Import::basic();?>
	<?php if(!empty($rt['cats']))foreach($rt['cats'] as $cat){ ?>
	<div class="mzitem">
		<div class="title">
		<span><?php echo $cat['cat_name'];?>+</span>
		<div>
		<?php if(!empty($cat['subcate']))foreach($cat['subcate'] as $ra){?>
		<a href="<?php echo SITE_URL.$rt['cateinfo']['cat_url'].'.php?cid='.$ra['cat_id'];?>" target="_blank"><?php echo $ra['cat_name'];?></a>
		<?php } ?>
		</div>
		</div>
		<div class="mzitemL">
			<dl>
				<dt>大家都喜欢</dt>
				<?php if(!empty($cat['subcategoods']))foreach($cat['subcategoods'] as $row){?>
				<dd><a href="<?php echo SITE_URL.'product.php?id='.$row['goods_id'];?>" title="<?php echo $row['goods_name'];?>"><?php echo $b->wordcut($row['goods_name'],42);?></a><b>￥<?php echo $row['pifa_price'];?></b><del>￥<?php echo $row['shop_price'];?></del></dd>
				<?php } ?>
			</dl>
		</div>
		
		<div class="mzitemR">
			<div class="mzitemRL">
				<ul>
				<?php if(!empty($rt['cated'][$cat['tcid']])) foreach($rt['cated'][$cat['tcid']] as $k=>$rows){ if($k>1) break;?>
					<?php
					$name = !empty($rows['gname']) ? $rows['gname'] : $rows['goods_name'];
					$url = !empty($rows['url']) ? $rows['url'] : SITE_URL.'product.php?id='.$rows['goods_id'];
					$img = !empty($rows['img']) ? SITE_URL.$rows['img'] : SITE_URL.$rows['goods_thumb'];
					?>
					<li>
					<div class="imgbox">
					<a href="<?php echo $url;?>"><img src="<?php echo $img;?>" alt="<?php echo $name;?>" width="220" onload="loadimg(this,220,220)" title="<?php echo $name;?>" /></a>
					</div>
					<p class="fname"><a href="<?php echo $url;?>"><?php echo $name;?></a></p>
					<p class="price"><b>￥<?php echo $rows['pifa_price'];?></b><del>￥<?php echo $rows['shop_price'];?></del></p>
					</li>
				<?php } ?>
				</ul>
			</div>
			
			<div class="mzitemRC">
			<a href="<?php echo $cat['cat_url'];?>"><img src="<?php echo !empty($cat['cat_img']) ? $cat['cat_img'] : $this->img('-2-1.jpg');?>" alt="<?php echo $cat['cat_name'];?>"  width="300" height="600" title="<?php echo $cat['cat_name'];?>" /></a>
			</div>
			
			<div class="mzitemRR">
				<ul>
				<?php if(!empty($rt['cated'][$cat['tcid']]))foreach($rt['cated'][$cat['tcid']] as $k=>$rows){ if($k<2) continue;?>
					<?php
					$name = !empty($rows['gname']) ? $rows['gname'] : $rows['goods_name'];
					$url = !empty($rows['url']) ? $rows['url'] : SITE_URL.'product.php?id='.$rows['goods_id'];
					$img = !empty($rows['img']) ? SITE_URL.$rows['img'] : SITE_URL.$rows['goods_thumb'];
					?>
					<li>
					<div class="imgbox">
					<a href="<?php echo $url;?>"><img src="<?php echo $img;?>" alt="<?php echo $name;?>" width="220" onload="loadimg(this,220,220)" title="<?php echo $name;?>" /></a>
					</div>
					<p class="fname"><a href="<?php echo $url;?>"><?php echo $name;?></a></p>
					<p class="price"><b>￥<?php echo $rows['pifa_price'];?></b><del>￥<?php echo $rows['shop_price'];?></del></p>
					</li>
				<?php } ?>
				</ul>
			</div>
			<div class="clear"></div>

		</div>
		<div class="clear"></div>
	</div>
	<?php } ?>
	
</div>