<div class="bgmain">
	<div class="bgmainbox">
	<div class="bagbanner">
		<table width="1020" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
			  <td>
		<!-- 代码 开始 -->      
		<div style="HEIGHT: 300px; OVERFLOW: hidden;" id=idTransformView>
		<ul id=idSlider class=slider>
		<?php $ad = $this->action('banner','banner','户外运动主页顶部',5);?>
		<?php if(!empty($ad))foreach($ad as $row){?>
		  <div style="POSITION: relative">
			  <a href="<?php echo $row['ad_url'];?>" target="_blank"><img src="<?php echo SITE_URL.$row['ad_img'];?>" alt="<?php echo $row['ad_name'];?>" width="1020" height="300" /></a>
		  </div>
		 <?php } ?>
		</ul>
		</div>
		
		<div>
		<ul id=idNum class=hdnum>
		<?php if(!empty($ad))foreach($ad as $row){?>
		  <li><img src="<?php echo SITE_URL.$row['ad_img'];?>" width=70 height=45></li>
 		<?php } ?>
		</ul>
		<script language=javascript>
		  mytv("idNum","idTransformView","idSlider",300,5,true,2000,5,true,"onmouseover");
		  //按钮容器aa，滚动容器bb，滚动内容cc，滚动宽度dd，滚动数量ee，滚动方向ff，延时gg，滚动速度hh，自动滚动ii，
		  </script>
		</div>
		<!-- 代码 结束 --></td>
			</tr>
		  </table>
	</div>
	<?php $ad = $this->action('banner','banner','户外运动主页专场',3);?>
	<div class="zhuanchang">
	<ul>
		<?php if(!empty($ad))foreach($ad as $row){?>
		<li>
		 <a href="<?php echo $row['ad_url'];?>" target="_blank"><img src="<?php echo SITE_URL.$row['ad_img'];?>" alt="<?php echo $row['ad_name'];?>" width="320" height="240" /></a>
		</li>
		<?php } ?>
		<div class="clear"></div>
	</ul>
	</div>
	
	<div class="bagtopgoods">
			<u>
			<?php if(!empty($rt['topgoods'])) foreach($rt['topgoods'] as $rows){?>
			<?php
			$name = !empty($rows['gname']) ? $rows['gname'] : $rows['goods_name'];
			$url = !empty($rows['url']) ? $rows['url'] : SITE_URL.'product.php?id='.$rows['goods_id'];
			$img = !empty($rows['img']) ? SITE_URL.$rows['img'] : SITE_URL.$rows['goods_thumb'];
			?>
			<li>
				<div class="imgbox">
				<a href="<?php echo $url;?>"><img src="<?php echo $img;?>" alt="<?php echo $name;?>" width="235" onload="loadimg(this,235,235)" title="<?php echo $name;?>" /></a>
				</div>
				<p class="fname"><a href="<?php echo $url;?>"><?php echo $name;?></a></p>
				<p class="price"><b>￥<?php echo $rows['pifa_price'];?></b><del>￥<?php echo $rows['shop_price'];?></del></p>
			</li>
			<?php } ?>
			<div class="clear"></div>
			</u>
	</div>
	
	
	<div class="fuzhuangtop">
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
		
		
		<div class="tuigoods">
			<ul>
			<?php if(!empty($rt['gungoods']))foreach($rt['gungoods'] as $rows){?>
			<?php
			$name = !empty($rows['gname']) ? $rows['gname'] : $rows['goods_name'];
			$url = !empty($rows['url']) ? $rows['url'] : SITE_URL.'product.php?id='.$rows['goods_id'];
			$img = !empty($rows['img']) ? SITE_URL.$rows['img'] : SITE_URL.$rows['goods_thumb'];
			?>
			<li>
			<div class="imgbox">
			<a href="<?php echo $url;?>"><img src="<?php echo $img;?>" alt="<?php echo $name;?>" width="168" onload="loadimg(this,168,168)" title="<?php echo $name;?>" /></a>
			</div>
			<p class="fname"><a href="<?php echo $url;?>"><?php echo $name;?></a></p>
			<p class="price"><b>￥<?php echo $rows['pifa_price'];?></b><del>￥<?php echo $rows['shop_price'];?></del></p>
			</li>
			<?php } ?>
			</ul>
		</div>
		<?php $ad = $this->action('banner','banner','户外运动主页分类右边',4);?>
		<div class="ads">
		 <?php if(!empty($ad))foreach($ad as $row){?>
		<a href="<?php echo $row['ad_url'];?>"><img src="<?php echo !empty($row['ad_img']) ? SITE_URL.$row['ad_img'] : $this->img('-2-2.jpg');?>" width="308" alt="<?php echo $row['ad_name'];?>"/></a>
		 <?php } ?>
		</div>
		
		<div class="clear"></div>
	</div>

<?php $ad = $this->action('banner','banner','户外运动主页分类下方',5);?>
	<div id="xxx" style="width:1020px; margin:0px auto; padding:10px 0px 10px 0px;">
	<script type="text/javascript">
     var box =new PPTBox();
     box.width = 1020; //宽度
     box.height = 300;//高度
     box.autoplayer = 3;//自动播放间隔时间

     //box.add({"url":"图片地址","title":"悬浮标题","href":"链接地址"})
	 <?php if(!empty($ad))foreach($ad as $row){?>
     box.add({"url":"<?php echo SITE_URL.$row['ad_img'];?>","href":"<?php echo $row['ad_url'];?>","title":"<?php echo $row['ad_name'];?>"})
	 <?php } ?>
     box.show();
    </script>
	</div>
	
	<div class="bagitem">
		<div class="title"><span>促销产品+</span></div>
		<div class="bagitemleft">
		<a href="<?php echo $rt['cuxiaocat']['cat_url'];?>"><img src="<?php echo !empty($rt['cuxiaocat']['cat_img']) ? $rt['cuxiaocat']['cat_img'] : $this->img('-2-1.jpg');?>" alt="<?php echo $rt['cuxiaocat']['cat_name'];?>"  width="300" height="614" title="" /></a>
		</div>
		<div class="bagitemright">
			<ul>
			<?php foreach($rt['cuxiao'] as $rows){?>
			<?php
			$name = !empty($rows['gname']) ? $rows['gname'] : $rows['goods_name'];
			$url = !empty($rows['url']) ? $rows['url'] : SITE_URL.'product.php?id='.$rows['goods_id'];
			$img = !empty($rows['img']) ? SITE_URL.$rows['img'] : SITE_URL.$rows['goods_thumb'];
			?>
			<li>
			<div class="imgbox">
			<a href="<?php echo $url;?>"><img src="<?php echo $img;?>" alt="<?php echo $name;?>" width="217" onload="loadimg(this,217,217)" title="<?php echo $name;?>" /></a>
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
	
	<div class="bagitem">
		<div class="title"><span>新品推荐+</span></div>
		<div class="bagitemleft" style="float:right">
		<a href="<?php echo $rt['newpincat']['cat_url'];?>"><img src="<?php echo !empty($rt['newpincat']['cat_img']) ? $rt['newpincat']['cat_img'] : $this->img('-2-1.jpg');?>" alt="<?php echo $rt['newpincat']['cat_name'];?>"  width="300" height="614" title="" /></a>
		</div>
		<div class="bagitemright" style="float:left">
			<ul>
			<?php foreach($rt['newpin'] as $rows){?>
			<?php
			$name = !empty($rows['gname']) ? $rows['gname'] : $rows['goods_name'];
			$url = !empty($rows['url']) ? $rows['url'] : SITE_URL.'product.php?id='.$rows['goods_id'];
			$img = !empty($rows['img']) ? SITE_URL.$rows['img'] : SITE_URL.$rows['goods_thumb'];
			?>
			<li>
			<div class="imgbox">
			<a href="<?php echo $url;?>"><img src="<?php echo $img;?>" alt="<?php echo $name;?>" width="217" onload="loadimg(this,217,217)" title="<?php echo $name;?>" /></a>
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
	</div>
</div>