<div class="shmain">
	<div class="shmainbox">
	
		<?php $ad = $this->action('banner','banner','鞋靴主页顶部',3);?>
		<div class="shbanner">
			<ul>
			<?php if(!empty($ad))foreach($ad as $row){?>
			<li><a href="<?php echo $row['ad_url'];?>" target="_blank"><img src="<?php echo SITE_URL.$row['ad_img'];?>" alt="<?php echo $row['ad_name'];?>" width="338" /></a></li>
			<?php } ?>
			<div class="clear"></div>
			</ul>
		</div>
		
		<div class="shcateitem">
			<div class="shcateitemL">
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
		<div class="clear"></div>
				<div class="shhotgoods">
					<p class="title">热销产品</p>
					<ul>
					<?php if(!empty($rt['hotgoods']))foreach($rt['hotgoods'] as $k=>$row){ if($k>4) break;?>
					<li><span><?php echo ++$k;?></span><a href="<?php echo SITE_URL.'product.php?id='.$row['goods_id'];?>"><?php echo $row['goods_name'];?></a></li>
					<?php } ?>
					</ul>
				</div>
			</div>
			<div class="shcateitemR">
				<p class="title"><span>今日推荐+</span></p>
				<ul>
				<?php if(!empty($rt['gungoods']))foreach($rt['gungoods'] as $rows){?>
				<?php
				$name = !empty($rows['gname']) ? $rows['gname'] : $rows['goods_name'];
				$url = !empty($rows['url']) ? $rows['url'] : SITE_URL.'product.php?id='.$rows['goods_id'];
				$img = !empty($rows['img']) ? SITE_URL.$rows['img'] : SITE_URL.$rows['goods_thumb'];
				?>
					<li>
					<div class="imgbox">
					<a href="<?php echo $url;?>"><img src="<?php echo $img;?>" alt="<?php echo $name;?>" width="182" onload="loadimg(this,182,182)" title="<?php echo $name;?>" /></a>
					</div>
					<p class="fname"><a href="<?php echo $url;?>"><?php echo $name;?></a></p>
					<p class="price"><b>￥<?php echo $rows['pifa_price'];?></b><del>￥<?php echo $rows['shop_price'];?></del></p>
					</li>
				<?php } ?>
				</ul>
				<?php $ad = $this->action('banner','banner','鞋靴主页专场',2);?>
				<div class="shads">
				<?php if(!empty($ad))foreach($ad as $row){?>
					<p><a href="<?php echo $row['ad_url'];?>" target="_blank"><img src="<?php echo SITE_URL.$row['ad_img'];?>" alt="<?php echo $row['ad_name'];?>" width="810" /></a></p>
			<?php } ?>
				</div>
			</div>
			
			<div class="clear"></div>
		</div>
		
		<div class="shbrand">
			<p class="title"></p>
			<?php if(!empty($rt['cats']))foreach($rt['cats'] as $cat){?>
			<div class="shbranditem">
				<div class="shbranditemL">
					<?php if(!empty($cat['cat_img'])){?>
					<a href="<?php echo $cat['cat_url'];?>"><img src="<?php echo SITE_URL.$cat['cat_img'];?>" alt="<?php echo $cat['cat_name'];?>" title="<?php echo $cat['cat_name'];?>" /></a>
					<?php } ?>
					<?php if(!empty($cat['cat_img2'])){?>
					<a href="<?php echo $cat['cat_url'];?>"><img src="<?php echo SITE_URL.$cat['cat_img2'];?>" alt="<?php echo $cat['cat_name'];?>" title="<?php echo $cat['cat_name'];?>" /></a>
					<?php } ?>
				</div>
				<div class="shbranditemR">
					<ul>
						<?php if(!empty($rt['cated'][$cat['tcid']]))foreach($rt['cated'][$cat['tcid']] as $rows){?>
						<?php
						$name = !empty($rows['gname']) ? $rows['gname'] : $rows['goods_name'];
						$url = !empty($rows['url']) ? $rows['url'] : SITE_URL.'product.php?id='.$rows['goods_id'];
						$img = !empty($rows['img']) ? SITE_URL.$rows['img'] : SITE_URL.$rows['goods_thumb'];
						?>
						<li>
							<div class="imgbox">
							<a href="<?php echo $url;?>"><img src="<?php echo $img;?>" alt="<?php echo $name;?>" width="227" onload="loadimg(this,227,227)" title="<?php echo $name;?>" /></a>
							</div>
							<p class="fname"><a href="<?php echo $url;?>"><?php echo $name;?></a></p>
							<p class="price"><b>￥<?php echo $rows['pifa_price'];?></b><del>￥<?php echo $rows['shop_price'];?></del></p>
						</li>
						<?php } ?>
						<div class="clear"></div>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			<?php } ?>
		</div>
		
		<div class="shyoulike">
			<p class="title"></p>
			<ul>
				<?php if(!empty($rt['youlikeimg']))foreach($rt['youlikeimg'] as $rows){?>
				<?php
				$name = !empty($rows['gname']) ? $rows['gname'] : $rows['goods_name'];
				$url = !empty($rows['url']) ? $rows['url'] : SITE_URL.'product.php?id='.$rows['goods_id'];
				$img = !empty($rows['img']) ? SITE_URL.$rows['img'] : SITE_URL.$rows['goods_thumb'];
				?>
				<li>
				<a href="<?php echo $url;?>"><img src="<?php echo $img;?>" alt="<?php echo $name;?>" width="235" onload="loadimg(this,235,235)" title="<?php echo $name;?>" /></a>
				</li>
				<?php } ?>
				<div class="clear"></div>
			</ul>
		</div>
		
	</div>
</div>