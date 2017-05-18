<style>
#wrap .content{ height:180px; min-height:180px;text-align:center; padding-top:90px; font-size:18px;}
</style>
<div id="wrap" style="padding-top:10px">
	<div class="mt">
		<h2>找回密码</h2>
		<span>现在就&nbsp;<a href="<?php echo SITE_URL;?>user.php?act=login" style="color:#FE0000">登录</a>&nbsp;<a href="<?php echo SITE_URL;?>user.php?act=register" style="color:#FE0000">注册</a></span>
	</div>
	 <div id="content_1" class="content">
			<p style="line-height:40px;">你好，你的邮箱验证成功！一封电子邮箱已发送到<b><?php echo $email;?></b>,请登录你的电子邮箱重新设置新密码！</p>
			<p style="height:35px; line-height:35px;">如果你还没有收到邮件，请重复上一步操作！</p>
			<div class="clear10"></div>
	 </div>

</div>
<div class="clear20"></div> 
 