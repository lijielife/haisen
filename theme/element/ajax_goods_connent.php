<div class="selectnav">
<?php
$sale_count = $rt['thisorder']=='sale_count' ? ' class="ac" ' : "";
$add_time = !(isset($rt['thisorder']))||$rt['thisorder']=='goods_id' ? ' class="ac" ' : "";
$pifa_price = $rt['thisorder']=='pifa_price' ? ' class="ac" ' : "";
$is_new = $rt['thisorder']=='is_new' ? ' class="ac" ' : "";
$p1 = '￥';
$p2 = '￥';
if(!empty($rt['price'])){
	$p = explode('-',$rt['price']);
	$p1 = isset($p[0]) ? '￥'.$p[0] : '￥';
	$p2 = isset($p[1]) ? '￥'.$p[1] : '￥';
}
?>
	<ul>
		<li<?php echo $add_time;?>><a href="javascript:void(0)" rel="nofollow" onclick="clearstyle('goods_id');get_categoods_page_list('1','<?php echo $rt['thiscid'];?>','<?php echo $rt['thisbid'];?>','<?php echo $rt['price'];?>','goods_id','<?php echo $rt['sort']=='DESC' ? 'ASC' : 'DESC';?>','<?php echo $rt['limit'];?>','<?php echo $rt['thisattr'];?>')">默认</a></li>
		<li<?php echo $is_new;?>><a href="javascript:void(0)" rel="nofollow" onclick="clearstyle('is_new');get_categoods_page_list('1','<?php echo $rt['thiscid'];?>','<?php echo $rt['thisbid'];?>','<?php echo $rt['price'];?>','is_new','<?php echo $rt['sort']=='DESC' ? 'ASC' : 'DESC';?>','<?php echo $rt['limit'];?>','<?php echo $rt['thisattr'];?>')">新款</a></li>
		<li<?php echo $sale_count;?>><a href="javascript:void(0)" rel="nofollow" onclick="clearstyle('sale_count');get_categoods_page_list('1','<?php echo $rt['thiscid'];?>','<?php echo $rt['thisbid'];?>','<?php echo $rt['price'];?>','sale_count','<?php echo $rt['sort']=='DESC' ? 'ASC' : 'DESC';?>','<?php echo $rt['limit'];?>','<?php echo $rt['thisattr'];?>')">销量</a></li>
		<li<?php echo $pifa_price;?>><a href="javascript:void(0)" rel="nofollow" onclick="clearstyle('pifa_price');get_categoods_page_list('1','<?php echo $rt['thiscid'];?>','<?php echo $rt['thisbid'];?>','<?php echo $rt['price'];?>','pifa_price','<?php echo $rt['sort']=='DESC' ? 'ASC' : 'DESC';?>','<?php echo $rt['limit'];?>','<?php echo $rt['thisattr'];?>')">价格</a></li>
		<li class="pricesearch">
		  <p><input type="text" name="minprice" class="txxt" value="<?php echo $p1;?>" onfocus="javascript:clearTip(this);" onblur="javascript:backTip(this, '￥');"/><span>-</span><input value="<?php echo $p2;?>" type="text" name="maxprice" class="txxt" onfocus="javascript:clearTip(this);" onblur="javascript:backTip(this, '￥');"/><input type="submit" name="Submit" class="subtxt" value="确认" onclick="return ajax_price_search()"/></p>
		</li>
	</ul>
</div>
<div class="goodslist">
<ul>
<?php if(!empty($rt['categoodslist'])) foreach($rt['categoodslist'] as $row){?>
	<li>
		<div class="imgbox">
		<a href="<?php echo SITE_URL.'product.php?id='.$row['goods_id'];?>"><img src="<?php echo $row['goods_thumb'];?>" alt="<?php echo $row['goods_name'];?>" width="245" onload="loadimg(this,245,260)" title="<?php echo $row['goods_name'];?>" /></a>
		</div>
		<p class="fname"><a href="<?php echo SITE_URL.'product.php?id='.$row['goods_id'];?>"><?php echo $row['goods_name'];?></a></p>
		<p class="price"><b>￥<?php echo $row['pifa_price'];?></b><del>￥<?php echo $row['shop_price'];?></del></p>
	</li>
<?php } ?>
<div class="clear"></div>
</ul>
</div>
<?php if(!empty($rt['categoodspage'])){?>
<p class="pages">
<?php echo str_replace('首页','<img src="'.SITE_URL.'theme/images/first.png" align="absmiddle" />',$rt['categoodspage']['first']);?>
<?php echo str_replace('上一页','<img src="'.SITE_URL.'theme/images/previ.png" align="absmiddle" />',$rt['categoodspage']['prev']);?>
<?php
 if(isset($rt['categoodspage']['list'])&&!empty($rt['categoodspage']['list'])){
 foreach($rt['categoodspage']['list'] as $aa){
 echo $aa."\n";
 }
 }
?>
<?php echo str_replace('下一页','<img src="'.SITE_URL.'theme/images/next.png" align="absmiddle" />',$rt['categoodspage']['next']);?>
<?php echo str_replace('尾页','<img src="'.SITE_URL.'theme/images/last.png" align="absmiddle" />',$rt['categoodspage']['last']);?>
<em>到第<input type="text" name="pageindex" class="pageinput" value="<?php echo $rt['page']+1;?>" maxlength="4">页</em><input type="submit" name="Submit" class="subtxt" value="确认" onclick="get_categoods_page_list($('.pageinput').val(),'<?php echo $rt['thiscid'];?>','<?php echo $rt['thisbid'];?>','<?php echo $rt['price'];?>','<?php echo $rt['order'];?>','<?php echo $rt['sort'];?>','<?php echo $rt['limit'];?>','<?php echo $rt['thisattr'];?>')"/>
</p>
<?php } ?>