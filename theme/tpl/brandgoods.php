<div id="wrap">
	<div class="clear7"></div>
	<div class="sale-product-left">
		<h2 class="herepage"><img src="<?php echo $this->img("dian.jpg");?>"/>&nbsp;<?php echo is_array($rt['hear']) ? implode('&nbsp;&gt;&nbsp;',$rt['hear']) : $rt['hear'];?></h2>
		<?php if($rt['brandinfo']['parent_id']!='0'){?>
		<div class="sale-product-menu"> 
			 <div class="brand-box">
			 	<p class="brand-name"><?php echo $rt['brandinfo']['brand_name'];?>品牌故事</p>
				<div class="brand-desc" id="brand-sidebar"><?php echo $rt['brandinfo']['brand_desc'];?></div>
				<div class="brand-desc-but" onclick="brand_desc_toggle(this)"></div>
			 </div>
		</div>
		<div class="clear7"></div>
		<?php } if(!empty($rt['sub_brand'])){?>
		<div class="sale-product-menu"> 
			 <div class="brand-cate">
				 <div class="brand-cate-box">
				 <?php foreach($rt['sub_brand'] as $row){?>
				 <a href="<?php echo $row['cateurl'];?>"><?php echo $row['name'];?></a>
				 <?php } ?>
				 </div>
			 </div>
		</div>
		<div class="clear7"></div>
		<?php } ?>
		<div class="sale-product-list">
			<h2 class="f12"><span>新品上架</span></h2>
			<div class="AJAX-PRODUCT-CONNENT">
			<?php $this->element('ajax_brand_goods_connent',array('rt'=>$rt));?>
			</div>
		</div>
	</div>
	<!--[if !IE]> right <![endif]-->
	<div class="sale-product-right">
		<div class="brandLeft">
			<h3 class="brName"><?php echo $rt['brandinfo']['brand_name'];?></h3>
			<div class="brandLeftimg"><?php if(!empty($rt['brandinfo']['brand_logo'])){?>
			<img src="<?php echo SITE_URL.$rt['brandinfo']['brand_logo'];?>" width="188"><?php }?>
			</div>
		</div>
		<style type="text/css">
		.sale-product-right-newbes li{text-align:left; padding-left:20px; background:url(<?php echo SITE_URL;?>theme/images/sanjiao3.jpg) no-repeat 10px center}
		</style>
		<div class="clear7"></div>
		<ul class="sale-product-right-newbes">
			<h2 class="f12">分类品牌</h2>
			<?php 
			if(!empty($rt['catebrand'])){
			foreach($rt['catebrand'] as $row){
			echo '<li><a href="'.$row['url'].'">'.$row['cat_name'].'</a></li>';
			}
			}
			?>
			<div class="clear"></div>
		</ul>
		<div class="clear7"></div>
		<div class="sale-product-right-ads">
		<img src="http://d13.yihaodianimg.com/t4/2012/0618/12/454/ca13e2d4770dce60YY.jpg" align="absmiddle" onload="image_size_load(this,'190')"/>
		</div>
		<div class="clear7"></div>
		<ul class="sale-product-right-hot">
		<h2 class="f12">热门供应</h2>
			<?php if(!empty($rt['hotgoods'])){ foreach($rt['hotgoods'] as $row){?>
			<li><?php echo $k<3 ? '<span class="a1">'.++$k.'</span>' : '<span class="a2">'.++$k.'</span>';?><a href="<?php echo $row['url'];?>" title="<?php echo $row['goods_name'];?>" class="img"><img src="<?php echo $row['goods_thumb'];?>" alt="<?php echo $row['goods_name'];?>" onload="image_size_load(this,'150')"/></a><p class="goodsfont"><a href="<?php echo $row['url'];?>" title="<?php echo $row['goods_name'];?>"><?php echo $row['goods_name'];?></a></p><span class="goods_price"><strong>￥<?php echo $row['qianggou_price']>0 ? $row['qianggou_price'] : ($row['promote_price']>0 ? $row['promote_price'] : $row['shop_price']);?></strong></span></li>
			<?php }} ?>
			<div class="clear"></div>
		</ul>
	</div>
	<!--[if !IE]> right <![endif]-->
	<div class="clear10"></div>
</div>
<script language="javascript" type="text/javascript">
function brand_desc_toggle(obj){ 
		if($(obj).parent().find('div.brand-desc').css("display")=="none"){
			$(obj).css('background-image','url(<?php echo SITE_URL;?>theme/images/hideintro.jpg)');
		}else{
			$(obj).css('background-image','url(<?php echo SITE_URL;?>theme/images/showintro.jpg)');
		}
		$(obj).parent().find('div.brand-desc').toggle();
}
</script>