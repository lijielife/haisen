<div id="wrap">
	<div class="clear7"></div>
	<?php $this->element('user_menu');?>
    <div class="m_right" style="height:250px">
		<h2 class="con_title">修改密码</h2>
    	<div class="updatepass">
				 <form name="USERINFO" id="USERINFO" action="" method="post">
					<table width="500" border="0" cellpadding="0" cellspacing="0">
					  <tr>
						<td align="right" width="100">旧密码：</td>
						<td><input name="newpass" type="password"  class="pw"/></td>
					  </tr>
					  <tr>
						<td align="right">新密码：</td>
						<td><input name="password" type="text"  class="pw"/></td>
					  </tr>
					  <tr>
						<td align="right">确认新密码：</td>
						<td><input name="rp_password" type="text"  class="pw"/></td>
					  </tr>
					  <tr>
						<td>&nbsp;</td>
						<td>
						<input type="button" value=""  style=" overflow:hidden ; border:none; background:none; cursor:pointer; background:url(<?php echo $this->img('submit.gif');?>) no-repeat 0 0 ; width:75px; height:24px; " onclick="update_user_pass(1)"/></td>
					  </tr>
					</table>

				</form>
		 </div>
     </div>
    <div class="clear"></div>
</div>
</div>
<div class="clear7"></div>