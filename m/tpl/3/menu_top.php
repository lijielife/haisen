<?php
$rt = $this->action('page','get_site_nav','top',5);
?>
<div class="logoqu">
	<div class="menunav">
	<?php if(!empty($rt))foreach($rt as $row){?>
	<a href="<?php echo $row['url'];?>"><i<?php if(!empty($row['img'])){?> style="background:url(<?php echo SITE_URL.$row['img'];?>) no-repeat center;background-size:auto 30px;"<?php } ?>></i><?php echo $row['name'];?></a>
	<?php } ?>
	</div>
</div>