<?php
$rt = $this->action('page','get_site_nav','top',4);
?>
<div class="logoqu">
	<?php if(!empty($lang['site_logo'])&&file_exists(SYS_PATH.$lang['site_logo'])){?>
		<img src="<?php echo  SITE_URL.$lang['site_logo'];?>" class="logos" style="max-height:80px; max-width:80px"/>
	<?php } ?>
	<div class="menunav">
	<?php if(!empty($rt))foreach($rt as $row){?>
	<a href="<?php echo $row['url'];?>"><i<?php if(!empty($row['img'])){?> style="background:url(<?php echo SITE_URL.$row['img'];?>) no-repeat center;background-size:auto 30px;"<?php } ?>></i><?php echo $row['name'];?></a>
	<?php } ?>
	</div>
</div>