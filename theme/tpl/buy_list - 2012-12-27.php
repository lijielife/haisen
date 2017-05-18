<?php
if(isset($_GET['asc'])){
$cate = $thisurl.'?act=mybuy&desc=tb2.cat_name';
$goods_name = $thisurl.'?act=mybuy&desc=tb1.goods_name';
$price = $thisurl.'?act=mybuy&desc=tb1.market_price';
$vipprice = $thisurl.'?act=mybuy&desc=tb1.shop_price';
$is_on_sale = $thisurl.'?act=mybuy&desc=tb1.is_on_sale';

}else{
$cate = $thisurl.'?act=mybuy&asc=tb2.cat_name';
$goods_name = $thisurl.'?act=mybuy&asc=tb1.goods_name';
$price = $thisurl.'?act=mybuy&asc=tb1.market_price';
$vipprice = $thisurl.'?act=mybuy&asc=tb1.shop_price';
$is_on_sale = $thisurl.'?act=mybuy&asc=tb1.is_on_sale';
$addtime = $thisurl.'?act=mybuy&asc=tb1.add_time';
}
?>
<style type="text/css">
.giftscss {
background-color: #FFF0D9;
color: #540000;
text-align: left;
line-height: 16px;
filter: alpha(opacity=60);
-moz-opacity: 0.6;
-khtml-opacity: 0.6;
opacity: 0.6;
display:block;
width:160px;
padding:2px;
}
.brandclass a{ display:block; float:left; width:62px; height:32px; margin:2px; background:url(<?php echo $this->img('box_b.png');?>) center center no-repeat; text-align:center; padding-top:10px}
</style>
<div id="wrap">
	<div class="clear7"></div>
	<?php $this->element('user_menu');?>
    <div class="m_right contentbox" >
    	<h2 class="con_title" style="text-align:left">商品列表</h2>
		 <div class="right_top">
		  <table cellspacing="2" cellpadding="5" width="100%">
	<tr><td colspan="17" align="left" class="label">
    	<img src="<?php echo $this->img('icon_search.gif');?>" alt="SEARCH" width="26" border="0" height="22" align="absmiddle">
	
    	<select name="cat_id">
	    <option value="">所有分类</option>
		<?php
		if(!empty($catelist)){
		 foreach($catelist as $row){ 
		?>
        <option value="<?php echo $row['id'];?>" <?php if(isset($_GET['cat_id'])&&$_GET['cat_id']==$row['id']){ echo 'selected="selected""'; } ?>><?php echo $row['name'];?></option>
			<?php 
				if(!empty($row['cat_id'])){
				foreach($row['cat_id'] as $rows){ 
					?>
					<option value="<?php echo $rows['id'];?>"  <?php if(isset($_GET['cat_id'])&&$_GET['cat_id']==$rows['id']){ echo 'selected="selected""'; } ?>>&nbsp;&nbsp;<?php echo $rows['name'];?></option>
					<?php 
					if(!empty($rows['cat_id'])){
					foreach($rows['cat_id'] as $rowss){ 
					?>
							<option value="<?php echo $rowss['id'];?>"  <?php if(isset($_GET['cat_id'])&&$_GET['cat_id']==$rowss['id']){ echo 'selected="selected""'; } ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowss['name'];?></option>
					
						<?php 
						if(!empty($rows['cat_id'])){
						foreach($rowss['cat_id'] as $rowsss){ 
						?>
								<option value="<?php echo $rowsss['id'];?>" <?php if(isset($_GET['cat_id'])&&$_GET['cat_id']==$rowsss['id']){ echo 'selected="selected""'; } ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowsss['name'];?></option>
								
						<?php
						}//end foreach
						}//end if
						?>

					<?php
					}//end foreach
					}//end if
					?>
			<?php
				}//end foreach
		 		} // end if
			?>
		<?php
		 }//end foreach
		} ?>
	 </select>
	 
    	 <select name="is_goods_attr">
			 <option value="">全部</option>
			<option value="is_hot" <?php if(isset($_GET['is_goods_attr'])&&$_GET['is_goods_attr']=='is_hot'){ echo 'selected="selected""'; } ?>>热销</option>
			<option value="is_new" <?php if(isset($_GET['is_goods_attr'])&&$_GET['is_goods_attr']=='is_new'){ echo 'selected="selected""'; } ?>>新品</option>
			<option value="is_best" <?php if(isset($_GET['is_goods_attr'])&&$_GET['is_goods_attr']=='is_best'){ echo 'selected="selected""'; } ?>>精品</option>
			<option value="is_alone_sale" <?php if(isset($_GET['is_alone_sale'])&&$_GET['is_alone_sale']=='is_alone_sale'){ echo 'selected="selected""'; } ?>>礼包</option>
			<option value="is_promote" <?php if(isset($_GET['is_goods_attr'])&&$_GET['is_goods_attr']=='is_promote'){ echo 'selected="selected""'; } ?>>特价商品</option>
			<option value="is_qianggou" <?php if(isset($_GET['is_goods_attr'])&&$_GET['is_goods_attr']=='is_qianggou'){ echo 'selected="selected""'; } ?>>抢购商品</option>
			<option value="is_jifen" <?php if(isset($_GET['is_jifen'])&&$_GET['is_jifen']=='is_jifen'){ echo 'selected="selected""'; } ?>>积分商品</option>
		 </select>
		 
		 <!--品牌-->
		  <select name="brand_id">
		  <option value="">所有品牌</option>
		 <?php 
		if(!empty($brandlist)){
		 foreach($brandlist as $row){ 
		?>
        <option value="<?php echo $row['id'];?>" <?php if(isset($_GET['brand_id'])&&$_GET['brand_id']==$row['id']){ echo 'selected="selected""'; } ?>><?php echo $row['name'];?></option>
			<?php 
				if(!empty($row['brand_id'])){
				foreach($row['brand_id'] as $rows){ 
					?>
					<option value="<?php echo $rows['id'];?>"  <?php if(isset($_GET['brand_id'])&&$_GET['brand_id']==$rows['id']){ echo 'selected="selected""'; } ?>>&nbsp;&nbsp;<?php echo $rows['name'];?></option>
					<?php 
					if(!empty($rows['brand_id'])){
					foreach($rows['brand_id'] as $rowss){ 
					?>
							<option value="<?php echo $rowss['id'];?>"  <?php if(isset($_GET['brand_id'])&&$_GET['brand_id']==$rowss['id']){ echo 'selected="selected""'; } ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowss['name'];?></option>
							
					<?php
					}//end foreach
					}//end if
					?>
			<?php
				}//end foreach
		 		} // end if
			?>
		<?php
		 }//end foreach
		} ?>
		 </select>
    	关键字 <input name="keyword1" size="15" type="text" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : "";?>">
    	<input value=" 搜索 " class="cate_search" type="button">
	</td></tr>
	<tr>
		<td colspan="6" align="left" class="brandclass">
		<?php 
		if(!empty($brandlist)) foreach($brandlist as $row){ if(empty($row['name'])) continue;
		?>
		<a href="" title="<?php echo $row['name'];?>"><?php echo $row['name'];?></a>
			<?php if(!empty($row['brand_id'])) foreach($row['brand_id'] as $rows){ ?>
			<a href="" title="<?php echo $rows['name'];?>"><?php echo $rows['name'];?></a>
			<?php } ?>
		<?php
		} ?>
		</td>
	</tr>
    <tr>
	   <th>商品图</th>
	   <th style="width:150px;"><a href="<?php echo $goods_name;?>">商品名称</a></th>
	   <th>商品规格</th>
	   <th><a href="<?php echo $vipprice;?>">零售价</a></th>
	    <th><a href="<?php echo $vipprice;?>">批发价</a></th>
	   <th width="100">订购数量</th>
	   
	</tr>
	<?php
	if(!empty($rt)){ 
	foreach($rt as $row){
	?>
	<tr>
	
	<td><a target="_blank" href="<?php echo SITE_URL.'product.php?id='.$row['goods_id'];?>"><img src="<?php echo !empty($row['goods_thumb']) ? 	dirname(ADMIN_URL).'/'.$row['goods_thumb'] : $this->img('no_picture.gif');?>" width="60"/></a></td>
	<td><a target="_blank" href="<?php echo SITE_URL.'product.php?id='.$row['goods_id'];?>"><?php echo $row['goods_name'];?></a><?php if(!empty($row['buy_more_best'])){?><span class="giftscss"><?php echo '该商品实行<font style="color:#FE0000;font-weight:bold">['.$row['buy_more_best'].']</font>促销活动，欢迎订购！';?></span><?php } ?></td>
	<td><?php echo $row['goods_brief'];?></td>
	<td><?php echo $row['shop_price'];?></td>
	<td><?php echo $row['pifa_price'];?></td>
	<span class="goods_num">
	<td ><input type="text" name="number" size="1" value="1"/>
	<img src="<?php echo SITE_URL.'theme/images/bnt_buy.gif'?>" onclick="return addToCart('<?php echo $row['goods_id'];?>','',this)" style="cursor:pointer; float:right"/>
	</td>
	</span>
	</tr>
	<?php
	 } ?>
	
		<?php } ?>
	 </table>
	 <?php $this->element('page',array('pagelink'=>$pagelink));?>
		 </div>
		 <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<div class="clear7"></div>
<?php
			$thisurl = SITE_URL.'user.php';
?>
<script type="text/javascript">
//限制价格只能输入数字
$('input[name="number"]').change(function(){
	vall = $(this).val();
	if(!(vall>0)){
		$(this).val('1');
	}
});


	//sous
	$('.cate_search').click(function(){
		
		catid = $('select[name="cat_id"]').val();
		
		is_goods = $('select[name="is_goods_attr"]').val();
		
		bid = $('select[name="brand_id"]').val();
		
		keys = $('input[name="keyword1"]').val();
		

		location.href='<?php echo $thisurl;?>?act=mybuy&cat_id='+catid+'&is_goods_attr='+is_goods+'&brand_id='+bid+'&keyword='+keys+'&is_delete=0&sale=<?php echo $_GET['sale']?>';
	});
</script>
