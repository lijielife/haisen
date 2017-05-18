<style>
#wrap .content{ height:200px; min-height:200px;text-align:center; padding-top:100px; font-size:18px;}
</style>
<div id="wrap" style="padding-top:10px">
	<div class="mt">
		<h2>重设密码</h2>
		<span>现在就&nbsp;<a href="<?php echo SITE_URL;?>user.php?act=login" style="color:#FE0000">登录</a>&nbsp;<a href="<?php echo SITE_URL;?>user.php?act=register" style="color:#FE0000">注册</a></span>
	</div>
	 <div id="content_1" class="content">
	 	<?php if(mktime()-$rt[2]>24*3600){?>
			<p>你好，你的链接已经超过有效期，如果你要重新找回密码，那么请你<a href="<?php echo SITE_URL;?>user.php?act=forgetpass">点击这里</a></p>
		<?php }else{?>
		  <input type="hidden" name="uname" id="uname" value="<?php echo $rt[0];?>"/>
		  <input type="hidden" name="uid" id="uid" value="<?php echo $rt['uid'];?>"/>
		  <input type="hidden" name="emial" id="email" value="<?php echo $rt[1];?>"/>
		  重设新密码：
		  <label>
		  <input type="text" name="newpass" id="newpass" style="height:22px; width:250px"/>
		  </label>
		  &nbsp;<input type="button" value="提交" onclick="return rp_newpass()" align="absmiddle" style="padding:3px; cursor:pointer"/>
		  <?php } ?>
		  <div class="clear10"></div>
	 </div>

</div>
<div class="clear20"></div>
 
<?php  $thisurl = SITE_URL.'user.php'; ?>

<script>
function rp_newpass(){
	pass = $('#newpass').val();
	unames = $('#uname').val();
	emails = $('#email').val();
	uuid = $('#uid').val();
	if(pass == "" || typeof(pass)=="undefined") return false;
	$.post('<?php echo $thisurl;?>',{action:'rp_pass',pass:pass,uname:unames,uid:uuid,email:emails},function(data){
			if(data == ""){
				$('#newpass').val("");
				alert("修改密码成功,请牢记你的密码！一封邮件已发到你的E-mail！");
			}else{
			alert(data);
			}
	});
	return true;
}
</script>
