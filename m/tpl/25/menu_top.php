<?php
$rt = $this->action('page','get_site_nav','top',5);

//统计笔数
$sql = "SELECT count(*) FROM `{$this->App->prefix()}goods` WHERE is_on_sale='1' AND is_jifen = '0' AND is_delete = '0' AND (is_best ='1' OR is_new='1' OR is_hot='1') ";
$tt = $this->App->findvar($sql);

?>
<div class="logoqu">
	<?php if(!empty($lang['site_logo'])&&file_exists(SYS_PATH.$lang['site_logo'])){?>
		<img src="<?php echo  SITE_URL.$lang['site_logo'];?>" class="logos" style="max-height:74px; max-width:74px"/>
	<?php } ?>
	<div class="menunav" style="position:ralative">
	<?php if(!empty($rt))foreach($rt as $row){?>
	<a href="<?php echo $row['url'];?>"><i <?php if(!empty($row['img'])&&($row['id']!=110)){?> style="background:url(<?php echo SITE_URL.$row['img'];?>) no-repeat center;background-size:auto 30px;"<?php } ?>><div style="color: #c81623;font-size: 25px;margin-top:55px;position:absolute;top:-48px;left:10px;"><?php if($row['id']==110) echo $tt;?></div></i><?php echo $row['name'];?></a>
	<?php } ?>
	</div>
</div>