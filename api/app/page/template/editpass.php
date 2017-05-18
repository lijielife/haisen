<style type="text/css">
.gototype a{ padding:2px; border-bottom:2px solid #ccc; border-right:2px solid #ccc;}
.tx{ width:350px; border:1px solid #ccc; height:28px; line-height:28px}
.tx2{ width:120px; border:1px solid #ccc; height:28px; line-height:28px}
</style>
<div class="contentbox">
<h2 class="con_title">修改密码！</h2>
<form id="form1" name="form1" method="post" action="">
     <table cellspacing="2" cellpadding="5" width="100%">
		
		<tr>
			<td class="label" width="15%">登录用户：</td>
			<td>
			<input readonly="" class="tx" name="user_name" value="<?php echo isset($rt['user_name']) ? $rt['user_name'] : '';?>" size="40" type="text" style="background-color:#FAFAFA" />
			</td>
		</tr>
		<tr>
			<td class="label" width="15%">登录密码：</td>
			<td>
			<input class="tx" name="password" value="" size="40" type="text" />
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><label>
			  <input type="submit" value="确认修改" class="submit" style="padding:3px; cursor:pointer"/>
			</label></td>
		</tr>
		</table>
</form>
</div>
