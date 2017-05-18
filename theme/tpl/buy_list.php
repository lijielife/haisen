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
.brandclass a{ display:block; float:left; width:62px; height:26px; margin:2px; background:url(<?php echo $this->img('box_b.png');?>) center center no-repeat; text-align:center; padding-top:6px}
.arrtclass a{display:block; float:left; width:62px; height:32px; margin:2px; background:url(<?php echo $this->img('box.png');?>) center center no-repeat; text-align:center; padding-top:10px}
.brandclass a.ac,.arrtclass a.ac{  background:url(<?php echo $this->img('box_a.png');?>) center center no-repeat;}
</style>
<div id="wrap">
	<div class="clear7"></div>
	<?php $this->element('user_menu');?>
    <div class="m_right contentbox" >
    	<h2 class="con_title" style="text-align:left">商品列表</h2>
		 <div class="right_top">
		  <table cellspacing="2" cellpadding="5" width="100%">
	<tr><td colspan="17" align="left" class="label" style="text-align:left">
    	<img src="<?php echo $this->img('icon_search.gif');?>" alt="SEARCH" width="26" border="0" height="22" align="absmiddle">
	
    	<select name="cat_id" id="1">
	    <option value="0">选择分类</option>
		<?php
		$ids = 0;
		$idss = 0;
		$idsss = 0;
		if(!empty($catelist)){
		 foreach($catelist as $row){ 
		?>
        <option value="<?php echo $row['id'];?>" <?php if(isset($_GET['c1'])&&$_GET['c1']==$row['id']){ $ids = $row['id']; echo 'selected="selected""'; } ?>><?php echo $row['name'];?></option>
		<?php
		 }//end foreach
		} ?>
	 </select>
	&nbsp;
	<select name="cat_id" id="2">
	    <option value="0">选择分类</option>
		<?php
		if(!empty($catelist)){
		foreach($catelist as $row){ 
		if($ids!=$row['id']) continue;
		?>
			<?php 
				if(!empty($row['cat_id'])){
				foreach($row['cat_id'] as $rows){ 
					?>
					<option value="<?php echo $rows['id'];?>"  <?php if(isset($_GET['c2'])&&$_GET['c2']==$rows['id']){ $idss = $rows['id']; echo 'selected="selected""'; } ?>>&nbsp;&nbsp;<?php echo $rows['name'];?></option>
			<?php
				}//end foreach
		 		} // end if
			?>
		<?php
		 }//end foreach
		} ?>
	 </select>
	 &nbsp;
	<select name="cat_id" id="3">
	    <option value="0">选择分类</option>
		<?php
		if(!empty($catelist)){
		foreach($catelist as $row){ 
		if($ids!=$row['id']) continue;
		?>
			<?php 
				if(!empty($row['cat_id'])){
				foreach($row['cat_id'] as $rows){ 
				if($idss!=$rows['id']) continue;
					?>
					<?php 
					if(!empty($rows['cat_id'])){
					foreach($rows['cat_id'] as $rowss){ 
					?>
							<option value="<?php echo $rowss['id'];?>"  <?php if(isset($_GET['c3'])&&$_GET['c3']==$rowss['id']){ $idsss = $rowss['id']; echo 'selected="selected""'; } ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowss['name'];?></option>

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
	  &nbsp;
	<select name="cat_id" id="4">
	    <option value="0">选择分类</option>
		<?php
		if(!empty($catelist)){
		foreach($catelist as $row){ 
		if($ids!=$row['id']) continue;
		?>
			<?php 
				if(!empty($row['cat_id'])){
				foreach($row['cat_id'] as $rows){ 
				if($idss!=$rows['id']) continue;
					?>
					<?php 
					if(!empty($rows['cat_id'])){
					foreach($rows['cat_id'] as $rowss){ 
					if($idsss!=$rowss['id']) continue;
					?>
						<?php 
						if(!empty($rows['cat_id'])){
						foreach($rowss['cat_id'] as $rowsss){ 
						?>
								<option value="<?php echo $rowsss['id'];?>" <?php if(isset($_GET['c4'])&&$_GET['c4']==$rowsss['id']){ echo 'selected="selected""'; } ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowsss['name'];?></option>
								
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
	</td></tr>
	<?php $c = '&c1='.(isset($_GET['c1']) ? $_GET['c1'] : '0').'&c2='.(isset($_GET['c2']) ? $_GET['c2'] : '0').'&c3='.(isset($_GET['c3']) ? $_GET['c3'] : '0').'&c4='.(isset($_GET['c4']) ? $_GET['c4'] : '0');?>
	<tr>
		<td colspan="6" class="arrtclass">
			<a href="<?php echo SITE_URL;?>user.php?act=mybuy&is_goods_attr=&cat_id=<?php echo isset($_GET['cat_id']) ? $_GET['cat_id'] : 0;?>&brand_id=<?php echo isset($_GET['brand_id']) ? $_GET['brand_id'] : 0;?>&is_delete=0&sale=yes<?php echo $c;?>"<?php if(!isset($_GET['is_goods_attr'])||empty($_GET['is_goods_attr'])){ echo ' class="ac"'; } ?>>全部</a>
			<a href="<?php echo SITE_URL;?>user.php?act=mybuy&is_goods_attr=is_hot&cat_id=<?php echo isset($_GET['cat_id']) ? $_GET['cat_id'] : 0;?>&brand_id=<?php echo isset($_GET['brand_id']) ? $_GET['brand_id'] : 0;?>&is_delete=0&sale=yes<?php echo $c;?>"<?php if(isset($_GET['is_goods_attr'])&&$_GET['is_goods_attr']=='is_hot'){ echo ' class="ac"'; } ?>>热销</a>
			<a href="<?php echo SITE_URL;?>user.php?act=mybuy&is_goods_attr=is_new&cat_id=<?php echo isset($_GET['cat_id']) ? $_GET['cat_id'] : 0;?>&brand_id=<?php echo isset($_GET['brand_id']) ? $_GET['brand_id'] : 0;?>&is_delete=0&sale=yes<?php echo $c;?>"<?php if(isset($_GET['is_goods_attr'])&&$_GET['is_goods_attr']=='is_new'){ echo ' class="ac"'; } ?>>新品</a>
			<a href="<?php echo SITE_URL;?>user.php?act=mybuy&is_goods_attr=is_best&cat_id=<?php echo isset($_GET['cat_id']) ? $_GET['cat_id'] : 0;?>&brand_id=<?php echo isset($_GET['brand_id']) ? $_GET['brand_id'] : 0;?>&is_delete=0&sale=yes<?php echo $c;?>"<?php if(isset($_GET['is_goods_attr'])&&$_GET['is_goods_attr']=='is_best'){ echo ' class="ac"'; } ?>>精品</a>
<!--			<a href="<?php echo SITE_URL;?>user.php?act=mybuy&is_goods_attr=is_alone_sale&cat_id=<?php echo isset($_GET['cat_id']) ? $_GET['cat_id'] : 0;?>&brand_id=<?php echo isset($_GET['brand_id']) ? $_GET['brand_id'] : 0;?>&is_delete=0&sale=yes<?php echo $c;?>"<?php if(isset($_GET['is_alone_sale'])&&$_GET['is_alone_sale']=='is_alone_sale'){ echo ' class="ac"'; } ?>>礼包</a>-->
			<a href="<?php echo SITE_URL;?>user.php?act=mybuy&is_goods_attr=is_promote&cat_id=<?php echo isset($_GET['cat_id']) ? $_GET['cat_id'] : 0;?>&brand_id=<?php echo isset($_GET['brand_id']) ? $_GET['brand_id'] : 0;?>&is_delete=0&sale=yes<?php echo $c;?>"<?php if(isset($_GET['is_goods_attr'])&&$_GET['is_goods_attr']=='is_promote'){ echo ' class="ac"'; } ?>>促销商品</a>
<!--			<a href="<?php echo SITE_URL;?>user.php?act=mybuy&is_goods_attr=is_qianggou&cat_id=<?php echo isset($_GET['cat_id']) ? $_GET['cat_id'] : 0;?>&brand_id=<?php echo isset($_GET['brand_id']) ? $_GET['brand_id'] : 0;?>&is_delete=0&sale=yes<?php echo $c;?>"<?php if(isset($_GET['is_goods_attr'])&&$_GET['is_goods_attr']=='is_qianggou'){ echo ' class="ac"'; } ?>>抢购商品</a>
			<a href="<?php echo SITE_URL;?>user.php?act=mybuy&is_goods_attr=is_jifen&cat_id=<?php echo isset($_GET['cat_id']) ? $_GET['cat_id'] : 0;?>&brand_id=<?php echo isset($_GET['brand_id']) ? $_GET['brand_id'] : 0;?>&is_delete=0&sale=yes<?php echo $c;?>"<?php if(isset($_GET['is_jifen'])&&$_GET['is_jifen']=='is_jifen'){ echo ' class="ac"'; } ?>>积分商品</a>-->
		</td>
	</tr>
	<tr>
		<td colspan="6" align="left" class="brandclass">
		<a href="<?php echo SITE_URL;?>user.php?act=mybuy&is_goods_attr=<?php echo isset($_GET['is_goods_attr']) ? $_GET['is_goods_attr'] : '';?>&cat_id=<?php echo isset($_GET['cat_id']) ? $_GET['cat_id'] : 0;?>&brand_id=0&is_delete=0&sale=yes<?php echo $c;?>"<?php if(!isset($_GET['brand_id'])||empty($_GET['brand_id'])){ echo ' class="ac"'; } ?>>全部</a>
		<?php 
		if(!empty($brandlist)) foreach($brandlist as $row){ if(empty($row['name'])) continue;
		?>
		<a href="<?php echo SITE_URL;?>user.php?act=mybuy&is_goods_attr=<?php echo isset($_GET['is_goods_attr']) ? $_GET['is_goods_attr'] : '';?>&cat_id=<?php echo isset($_GET['cat_id']) ? $_GET['cat_id'] : 0;?>&brand_id=<?php echo $row['id'];?>&is_delete=0&sale=yes<?php echo $c;?>" title="<?php echo $row['name'];?>"<?php if(isset($_GET['brand_id'])&&$_GET['brand_id']==$row['id']){ echo ' class="ac"'; } ?>><?php echo $row['name'];?></a>
			<?php if(!empty($row['brand_id'])) foreach($row['brand_id'] as $rows){ ?>
			<a href="<?php echo SITE_URL;?>user.php?act=mybuy&is_goods_attr=<?php echo isset($_GET['is_goods_attr']) ? $_GET['is_goods_attr'] : '';?>&cat_id=<?php echo isset($_GET['cat_id']) ? $_GET['cat_id'] : 0;?>&brand_id=<?php echo $rows['id'];?>&is_delete=0&sale=yes<?php echo $c;?>" title="<?php echo $rows['name'];?>"<?php if(isset($_GET['brand_id'])&&$_GET['brand_id']==$rows['id']){ echo ' class="ac"'; } ?>><?php echo $rows['name'];?></a>
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
	if(!empty($rt['list'])){
	foreach($rt['list'] as $row){
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


$('select[name="cat_id"]').change(function(){
	var c = $(this).attr('id');
	var cid = $(this).val();
	var c1 = '<?php echo isset($_GET['c1']) ? $_GET['c1'] : '0';?>';
	var c2 = '<?php echo isset($_GET['c2']) ? $_GET['c2'] : '0';?>';
	var c3 = '<?php echo isset($_GET['c3']) ? $_GET['c3'] : '0';?>';
	var c4 = '<?php echo isset($_GET['c4']) ? $_GET['c4'] : '0';?>';
	if(c=='1'){ c1 = cid; c2 = 0; c3 = 0; c4 = 0;}
	if(c=='2'){ c2 = cid; c3 = 0; c4 = 0;}
	if(c=='3'){ c3 = cid; c4 = 0;}
	if(c=='4') c4 = cid;
	var url = '<?php echo SITE_URL;?>user.php?act=mybuy&is_goods_attr=<?php echo isset($_GET['is_goods_attr']) ? $_GET['is_goods_attr'] : '';?>&brand_id=<?php echo isset($_GET['brand_id']) ? $_GET['brand_id'] : '0';?>&is_delete=0&sale=yes&c1='+c1+'&c2='+c2+'&c3='+c3+'&c4='+c4;
	window.location.href=url+'&cat_id='+cid;
	return false;
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
