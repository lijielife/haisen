
<div id="wrap">
	<div class="brandindex-new">
		<!--[if !IE]> top left <![endif]-->
		<ul class="brand-newinfo">
			<h2>品牌资讯</h2>
			<?php if(!empty($rt['brandnew'])){ foreach($rt['brandnew'] as $row){?>
			<li><a href="<?php echo $row['url'];?>" title="<?php echo $row['article_title'];?>"><?php if(!empty($row['article_img'])){ echo "图文：";}?><?php echo $row['article_title'];?></a></li>
			<?php }}?>
		</ul>
		<!--[if !IE]> top left <![endif]-->
		<!--[if !IE]> top right <![endif]-->
		<div class="brandindex-banner">
		<?php $this->element("banner2");?>
		</div>
		<div class="clear"></div>
		<!--[if !IE]> top right <![endif]-->
	</div>
	<!--[if !IE]> right <![endif]-->
	<div style="clear:both; height:2px"></div>
	<div class="con-box-left">
		<div class="con-box-left-Recommend-brand">
		<h2><span>推荐品牌</span><!--<a href="<?php echo get_url('','',SITE_URL."brandrecommend.php",'brand',array('brand','recommend'));?>">更多</a>--></h2>
		<ul>
		<?php if(!empty($rt['promotebrand'])){ foreach($rt['promotebrand'] as $row){?>
		<li>
		<a href="<?php echo $row['url'];?>" class="a1" title="<?php echo $row['brand_name'];?>"><img src="<?php echo $row['brand_logo'];?>" width="150" height="70"/></a>
		<a href="<?php echo $row['url'];?>"><?php echo $row['brand_name'];?></a>
		</li>
		<?php }}?>
		<div class="clear"></div>
		</ul>
		</div>
		<div class="con-box-left-New-brand">
		<h2><span>最新品牌</span><a href="<?php echo get_url('','',SITE_URL."brandlists.php",'brand',array('brand','lists'));?>">更多</a></h2>
			<ul>
			<?php if(!empty($rt['newbrand'])){ foreach($rt['newbrand'] as $row){?>
			<li>
			<a href="<?php echo $row['url'];?>" class="a1" title="<?php echo $row['brand_name'];?>"><img src="<?php echo $row['brand_logo'];?>" width="150" height="70"/></a>
			<a href="<?php echo $row['url'];?>"><?php echo $row['brand_name'];?></a>
			</li>
			<?php }}?>
		<div class="clear"></div>
		</ul>
		</div>
	</div>
	<div class="con-box-right">
		<div class="con-box-right-Hot-brand">
		<h2>相关分类</h2>
		<ul>
		<?php if(!empty($rt['brandcate'])){ foreach($rt['brandcate'] as $row){?>
          <li>
          <a href="<?php echo $row['url'];?>"><?php echo $row['name'];?></a>
          </li>
		<?php }}?>
		<div class="clear"></div>
		</ul>
		</div>
		<div class="con-box-right-ads">
		<p><img src="<?php echo $this->img('catalog_ads.jpg');?>" width="228" onload="image_size_load(this,'228')"/></p>
		</div>
		<div class="con-box-right-Cate-brand">
		<h2>品牌相关</h2>
		<ul>
		<?php if(!empty($rt['hotbrand'])){ foreach($rt['hotbrand'] as $row){?>
		<li><a href="<?php echo $row['url'];?>" title="<?php echo $row['brand_name'];?>">【<?php echo $row['brand_name'];?>】</a>&nbsp;<a href="<?php echo $row['goodsurl'];?>" title="<?php echo $row['goods_name'];?>"><?php echo $row['goods_name'];?></a></li>
		<?php }} ?>
		</ul>
		</div>
		<div class="clear10"></div>
	</div>
	<div class="clear"></div>
</div>