<div class="cxbanner">

</div>
<div class="cxnav"></div>
<div class="cxmain">
	<div class="cxmainbox">
		<div class="mainconboxtop">
			<div class="mainconboxtopbox">
			<h1>
			<?php echo $rt['hear'];?>
			</h1>
			<div class="cat_list_all" style="min-height:200px">
				<dl>
					<dt>类别：</dt>
					<dd>
						<div class="dd_con">
						<p class="p2"><a href="<?php echo SITE_URL.'cuxiao.php';?>">所有分类</a><br/>
						<?php if(!empty($rt['menu_show']))foreach($rt['menu_show'] as $row){
								echo '<a href="'.SITE_URL.'cuxiao.php?cid='.$row[id].'" '.(isset($_GET['cid'])&&$_GET['cid']==$row['id']?' style="color:#88071B"':'').'>'.$row['name'].'</a>';
						 } ?>
						 </p>
						</div>
					</dd>
				   <div class="clear"></div>
				 </dl>
				 <dl>
					<dt>品牌：</dt>
					<dd>
						<div class="dd_con">
						<?php if(!empty($rt['brandlist'])){ foreach($rt['brandlist'] as $row){?>
						<a href="<?php echo SITE_URL.'cuxiao.php?bid='.$row['brand_id'];?>" <?php echo (isset($_GET['bid'])&&$_GET['bid']==$row['brand_id']?' style="color:#88071B"':'');?>><?php echo $row['brand_name'];?></a>
						<?php } } ?>
						</div>
					</dd>
					<div class="clear"></div>
				 
				 </dl>
			 </div>								  
			</div>				 
		</div>
		
		<div class="AJAX-PRODUCT-CONNENT">
				<?php $this->element('ajax_goods_connent_cx',array('rt'=>$rt));?>
		</div>
	</div>
</div>
<script type="text/javascript">
function ajax_page_jump(){
	p = $('.pageinput').val();
	var thisurl = '<?php $ps = Import::basic()->thisurl();  echo !strpos($ps,'page=') ? (strpos($ps,'?') ? $ps.'&page=1' : $ps.'?page=1') : $ps;?>';
	thisurl = thisurl.replace('page=<?php echo $rt['page'];?>','page='+p);
	window.location.href = thisurl;
	return false;
}

</script>