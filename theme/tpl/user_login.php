<div id="wrap">
	<div class="mt">
		<h2>用户登录</h2>
		<span>我还没有注册，现在就&nbsp;<a href="<?php echo SITE_URL;?>user.php?act=register" style="color:#FE0000">注册</a></span>
	</div>
	<input type="hidden" name="returnurl" value="<?php echo $this->Session->read('REFERER');?>"/>
	 <div id="content_1" class="content">
			<form id="LOGIN" name="LOGIN" method="post" action="">
			<table cellpadding="3" cellspacing="5" style="line-height:40px; width:500px; margin:0px auto; padding-left:40px" border="0">
			<tr>
				<th width="70" align="right">手机号码：</th>
				<td width="270">
				    <input type="text" name="username"  value="<?php echo isset($_COOKIE['USER']['USERID']) ? $_COOKIE['USER']['USERID'] : "";?>"/>
				</td>
			</tr>
			<tr>
				<th align="right">密码：</th><td><input type="password" name="password" value="<?php echo isset($_COOKIE['USER']['PASS']) ? $_COOKIE['USER']['PASS'] : "";?>"/></td>
			</tr>
			<tr>
				<th align="right">验证码：</th><td><input type="text" name="vifcode" class="vifcode"/>&nbsp;<img  src="<?php echo SITE_URL;?>captcha.php" onclick="this.src='<?php echo SITE_URL;?>captcha.php?'+Math.random()" align="absmiddle"/></td>
			</tr>
			  <tr>
				<td>&nbsp;</td>
				<td >&nbsp;&nbsp;<label><input type="checkbox" name="is_save_info" class="is_save_info" value="1"<?php echo isset($_COOKIE['USER']['USERID']) ? '  checked="checked"' : "";?>/> <font color="#616161">记住用户名</font></label>&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="checkbox" name="is_auto_login" class="is_save_info" value="1"<?php echo isset($_COOKIE['USER']['AUTOLOGIN']) ? '  checked="checked"' : "";?>/> <font color="#616161">下次自动登录</font></label></td>
			  </tr>
  
			<tr><td>&nbsp;</td><td>
			<div class="submit quitlogin" onclick="return submit_login_data()">马上登录</div>
			<a href="<?php echo SITE_URL.'user.php?act=forgetpass';?>" class="forgetpass">忘记密码？</a>
			</td><td align="left" class="login_mes" style="color:#FF0000; text-align:left"></td></tr>
			</table>   
			 </form>
			 <div class="clear10"></div>

	 </div>

</div>
 <div class="clear20"></div>
<script type="text/javascript">
	document.onkeypress=function(e)
	{
		　　var code;
		　　if  (!e)
		　　{
		　　		var e=window.event;
		　　}
		　　if(e.keyCode)
		　　{
		　　		code=e.keyCode;
		　　}
		　　else if(e.which)
		　　{
		　　		code   =   e.which;
		　　}
		　　if(code==13) //回车键
		　　{
				submit_login_data();
		　　}
	}

		
</script>  