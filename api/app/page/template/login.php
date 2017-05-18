<div id="wrap" style="padding-top:20px;width:920px; margin:0px auto">
	<div class="mt" style="background:url(<?php echo $this->img('hend.jpg');?>) center center no-repeat; height:43px; line-height:43px;">
		<h2>用户登陆</h2>
	</div>
	<style type="text/css">
	.content table td input{ width:250px; height:28px; line-height:28px; border:1px solid #ccc}
	</style>
	 <div id="content_1" class="content">
			<form id="LOGIN" name="LOGIN" method="post" action="">
			<table cellpadding="3" cellspacing="5" style="line-height:40px; width:500px; margin:0px auto; padding-left:40px" border="0">
			<tr>
				<th width="70" align="right">登陆用户：</th><td width="270">
				    <input type="text" name="username"  value="<?php echo isset($_COOKIE['USER']['USERNAME']) ? $_COOKIE['USER']['USERNAME'] : "";?>"/>
				</td>
			</tr>
			<tr>
				<th align="right">登陆密码：</th><td><input type="password" name="password" value="<?php echo isset($_COOKIE['USER']['PASS']) ? $_COOKIE['USER']['PASS'] : "";?>"/></td>
			</tr>
  
			<tr><td>&nbsp;</td><td>
			<div class="submit quitlogin" onclick="return submit_shop_login_data()">马上登录</div>
			</td><td align="left" class="login_mes"></td></tr>
			</table>   
			 </form>
			 <div class="clear10"></div>

	 </div>

</div>
 <div class="clear20"></div>
<script type="text/javascript">
function submit_shop_login_data(){
		
		name = $('.content input[name="username"]').val();

		pas = $('.content input[name="password"]').val();

		if(name == "" || pas == "" ){ alert("请输入完整信息！"); return false; }
		createwindow();
		$.post(SITE_URL+'shop/login.php',{action:'login',username:name,password:pas},function(data){
			removewindow();
			if(data != ""){
				alert(data);
			}else{
				window.location.reload();
			}
		});
}


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
				submit_shop_login_data();
		　　}
	}

		
</script>  