<div class="xl_t"><p>最近浏览</p></div>
<div class="xl_m" style="min-height:100px;">
	<ul>
	<?php 
	if(!empty($historyview)){
	foreach($historyview as $k=>$row){
	if($k>3) break;
	?>
		<li style="border-bottom:1px dashed #ccc; margin-top:3px; margin-bottom:4px; padding-right:5px;">
			<div class="img" ><a href="<?php echo $row['url'];?>"><img src="<?php echo $row['goods_thumb'];?>" width="80" height="80" /></a></div>
			<div class="cont" ><a href="<?php echo $row['url'];?>"><?php echo $row['goods_name'];?></a></div>
	   </li>
	<?php } } ?>
		<div class="clear"></div>
	</ul>
</div>
<div class="xl_b"></div>