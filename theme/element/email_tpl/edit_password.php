<div>
<?php if($rt['error']=='1'){?>
<p>亲爱的,你的密码没有修改成功！请你多次尝试！</p>
<p>如果你忘了原始密码，你可以通过下面的链接找回你的密码！</p>
<p><a href="<?php echo SITE_URL;?>user.php?act=forgetpass" target="_blank"><?php echo SITE_URL;?>user.php?act=forgetpass</a></p>
<p><a href="<?php echo SITE_URL;?>" target="_blank"><img src="<?php echo SITE_URL;?>theme/images/logo.gif"/></a></p>
<?php } else{?>
<p>亲爱的,你的密码已经修改成功！当前帐号编号：<?php echo $rt['uid'];?></p>
<p>你修改的密码为：<?php echo $rt['password'];?>,请牢记！</p>
<p><a href="<?php echo SITE_URL;?>" target="_blank"><img src="<?php echo SITE_URL;?>theme/images/logo.gif"/></a></p>
<?php } ?>
</div>