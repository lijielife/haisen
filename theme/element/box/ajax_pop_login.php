<div class="login_con">
<p class="login_mes"></p>
<p class="login_p"><span class="span1">用户名：</span><input type="text" class="user_name" style="width:150px;"/></p>
<br />
<p class="login_p"><span class="span2">&nbsp;&nbsp;密&nbsp;&nbsp;码：</span><input type="password" class="pass" style="width:150px;"/></p>
<p class="login_box"><input type="button" class="loginbut" value="登录"  onclick="ajax_user_login(this,'<?php echo $rt['type'];?>','<?php echo $rt['gid'];?>')"/>&nbsp;&nbsp;<input type="button" class="loginbut" value="取消" onclick="JqueryDialog.Close();"/></p>
<hr />
<p style="margin-top:10px; font-size:12px;"><a href="<?php echo SITE_URL;?>user-register.html" style="background:url(<?php echo SITE_URL;?>theme/images/dian.jpg) left center no-repeat">&nbsp;&nbsp;注册新会员</a>&nbsp;&nbsp;<a href="<?php echo SITE_URL;?>user-forgetpass.html" style="background:url(<?php echo SITE_URL;?>theme/images/dian.jpg) left center no-repeat">&nbsp;&nbsp;忘记密码？</a></p>
</div>