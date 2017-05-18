<div>
<?php if(isset($rt['type']) && $rt['type']==1){?>
<p>亲爱的<b><?php echo $rt['user_name'];?></b>，你的密码已经修改成功！</p>
<p>用户ID：<?php echo $rt['uid'];?></p>
<p>用户名：<?php echo $rt['user_name'];?></p>
<p>密码：<?php echo $rt['pass'];?></p>
<?php }else{?>
<p>亲爱的<b><?php echo $rt['user_name'];?></b>，这是一封找回密码的电子邮箱，请你点击下面链接重新设置！</p>
<p>如果你点击无响应，那么复制下面链接在浏览器的输入栏按回车键!</p>
<p>
<a href="<?php echo SITE_URL;?>user.php?act=setpass&ts=<?php echo base64_encode($rt['user_name'].'||'.$rt['email'].'||'.mktime());?>">
<?php echo SITE_URL;?>user.php?act=setpass&ts=<?php echo base64_encode($rt['user_name'].'||'.$rt['email'].'||'.mktime());?>
</a>
</p>
<p>激活链接有效期为24小时，请你在24小时内激活你的账户！</p>
<?php } ?>
<p><a href="<?php echo SITE_URL;?>" target="_blank"><img src="<?php echo SITE_URL;?>theme/images/logo.gif"/></a></p>
</div>