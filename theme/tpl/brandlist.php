<div id="wrap">
	<div class="clear7"></div>
	<h2 class="herepage"><img src="<?php echo $this->img("dian.jpg");?>"/>&nbsp;<?php echo is_array($rt['hear']) ? implode('&nbsp;&gt;&nbsp;',$rt['hear']) : $rt['hear'];?></h2>
	<div class="brand-con">
	<h2>全部品牌</h2>
	<ul class="brand-con-list">
	<?php if(!empty($rt['brandlist'])){ foreach($rt['brandlist'] as $row){?>
	 <li<?php if(isset($_GET['bid']) && $_GET['bid']==$row['id']){?> style="background:url(<?php echo $this->img('allsort_bg_select.png');?>) center center"<?php } ?>><a href="<?php echo $row['url'];?>"><?php echo $row['name'];?></a></li>
	 <?php }}?>
	 <div class="clear"></div>
	</ul>
	<div class="brand-recommend">
		<h1><?php echo $rt['brandinfo']['brand_name'];?></h1>
		<ul>
		<?php
		 if(!isset($_GET['bid']) || empty($_GET['bid'])){ $rt['brandlist_sub'] = $rt['brandlist']; unset($rt['brandlist']); }
		 if(!empty($rt['brandlist_sub'])){ foreach($rt['brandlist_sub'] as $row){
			 if($row['parent_id']!=0){
		?>
			<li><a href="<?php echo $row['cateurl'];?>"><?php if(!empty($row['brand_logo'])){?><img src="<?php echo $row['brand_logo'];?>" alt="<?php echo $row['name']?>" width="150" height="70"/><?php } else{ echo $row['name']; }?></a><span><?php echo $row['name'];?></span></li>
		<?php 
			}
		if(!empty($row['brand_id'])){
		foreach($row['brand_id'] as $rows){
		?>
		<li><a href="<?php echo $rows['cateurl'];?>"><?php if(!empty($rows['brand_logo'])){?><img src="<?php echo $rows['brand_logo'];?>" alt="<?php echo $rows['name']?>" width="150" height="70"/><?php } else{ echo $rows['name']; }?></a><span><?php echo $rows['name'];?></span></li>
		<?php
		}
		}
		?>
		<?php }} ?>
		<div class="clear"></div>
		</ul>
	</div>
	</div>
	
</div>