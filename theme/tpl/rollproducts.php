 <style type="text/css" media="screen, projection">
	/* Not required for Tabs, just to make this demo look better... */
	body, h1, h2 {
		font-family: "Trebuchet MS", Trebuchet, Verdana, Helvetica, Arial, sans-serif; padding:0px; margin:0px;
	}
	h1 {
		margin: 1em 0 1.5em;
		font-size: 18px;
	}
	h2 {
		margin: 2em 0 1.5em;
		font-size: 16px;
	}
	p {
		margin: 0;
	}
	pre, pre+p, p+p {
		margin: 1em 0 0;
	}
	code {
		font-family: "Courier New", Courier, monospace;
	}
	.fragmentgoods li{ width:195px; height:330px; overflow:hidden; float:left}
	.ui-tabs-panel{ padding-left:0px; padding-right:0px;}
	.clear{ clear:both;}
</style>
 <script type="text/javascript">
	$(function() {
		$('#rotate > ul').tabs({ fx: { opacity: 'toggle' } }).tabs('rotate', 5000);
	});
</script>
<div id="rotate" style="background-color:#D2CFCA; width:780px;">
	<ul>
	<?php if(!empty($rt['cats']))foreach($rt['cats'] as $k=>$row){?>
		<li><a href="#fragment-<?php echo ++$k;?>" onclick="window.open('<?php echo $row['cat_url'];?>')"><span><?php echo $row['cat_name'];?></span></a></li>
		<?php } ?>
	</ul>
	
	<?php if(!empty($rt['cats']))foreach($rt['cats'] as $k=>$row){?>
	<div id="fragment-<?php echo ++$k;?>" class="fragmentgoods">
		<ul>
		<?php if(!empty($rt['cated'][$row['tcid']]))foreach($rt['cated'][$row['tcid']] as $kk=>$rows){
		$name = !empty($rows['gname']) ? $rows['gname'] : $rows['goods_name'];
		$url = !empty($rows['url']) ? $rows['url'] : SITE_URL.'product.php?id='.$rows['goods_id'];
		$img = !empty($rows['img']) ? SITE_URL.$rows['img'] : SITE_URL.$rows['goods_thumb'];
		?>
		 <li<?php //echo $kk==0 ? ' style="width:204px"' : '';?>>
		  <a target="_blank" href="<?php echo $url;?>"><img src="<?php echo $img;?>" alt="<?php echo $name;?>" style="max-height:100%; max-width:100%; width:195px; height:330px" /></a>
		 </li>
		 <?php } ?>
		 <div class="clear"></div>
		</ul>
	</div>
	<?php } ?>
	
</div>