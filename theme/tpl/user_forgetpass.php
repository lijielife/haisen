<div id="wrap" style="padding-top:10px">
	<div class="mt">
		<h2>找回密码</h2>
		<span>现在就&nbsp;<a href="<?php echo SITE_URL;?>user.php?act=login" style="color:#FE0000">登录</a>&nbsp;<a href="<?php echo SITE_URL;?>user.php?act=register" style="color:#FE0000">注册</a></span>
	</div>
	 <div id="content_1" class="content" style="text-align:center">
			<form id="FORGETPASS" name="FORGETPASS" method="post" action="">
			<table border="0" style="line-height:40px; padding-top:50px; margin:0px auto">
			<!--<tr>
			<td width="150" align="right">输入用户账号：</td>
			<td><label>
			  <input type="text" name="uname" style="height:20px; width:200px;"/>
			</label></td>
			</tr>-->
			<tr>
			<td width="150" style="text-align:right">输入电子邮箱：</td>
			<td align="left">
			  <input type="text" name="email" style="height:28px; line-height:28px; width:210px;"/>
			</td>
			</tr>
			<tr>
			<td style="text-align:right">输入验证码：</td>
			<td align="left"> <input type="text" name="vifcode" style="height:28px; line-height:28px;width:140px;"/>&nbsp;<img  src="<?php echo SITE_URL;?>captcha.php" onclick="this.src='<?php echo SITE_URL;?>captcha.php?'+Math.random()" align="absmiddle" style="height:28px"/></td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td align="left"><label>
			  <input type="submit" name="Submit" value="提交"  style="width:55px; height:28px; cursor:pointer"/>
			</label></td>
			</tr>
			</table>
			</form>
			 <div class="clear10"></div>
	 </div>

</div>
<div class="clear20"></div> 
 