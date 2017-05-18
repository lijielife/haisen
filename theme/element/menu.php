<div class="wrap_top_munu">
<?php if(!empty($menu))foreach($menu as $row){?>
<h1>
<a class="big" href="<?php echo SITE_URL.'catalog.php?cid='.$row['id'];?>"><?php echo $row['name'];?></a>
<div class="subcates">
	<div class="subcate_left">
	<?php if(!empty($row['cat_id']))foreach($row['cat_id'] as $rows){?>
	<dl class="fore1">                        
		<dt><a href="<?php echo SITE_URL.'catalog.php?cid='.$rows['id'];?>"><?php echo $rows['name'];?></a></dt>
		<dd>
		<?php if(!empty($rows['cat_id']))foreach($rows['cat_id'] as $rowss){?>
			<div class="smenu"><a href="<?php echo SITE_URL.'catalog.php?cid='.$rowss['id'];?>"><?php echo $rowss['name'];?></a>
				<?php if(!empty($rowss['cat_id'])){?>
				<p class="subsubmenu">
					<?php foreach($rowss['cat_id'] as $rowsss){?>
						<em><a href="<?php echo SITE_URL.'catalog.php?cid='.$rowsss['id'];?>"><?php echo $rowsss['name'];?></a></em>
					<?php } ?>
					<span class="clear"></span>
				</p>
				<?php } ?>
				<span class="clear"></span>
			</div>
		<?php } ?>&nbsp;
		</dd> 
		<div class="clear"></div>                   
	</dl>
	<?php } ?>
	</div>
	<div class="subcate_right">
		<dl>
			<dt>热门促销</dt>
			<dd style="height:50px;"></dd>
		</dl> 
		<dl>
			<dt>推荐品牌</dt>
			<dd style="height:50px;"></dd>
		</dl> 
	</div>
</div>
</h1>
<?php } ?>
</div>