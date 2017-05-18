<?php
$agent = $_SERVER["HTTP_USER_AGENT"];
if(strpos($agent,"MSIE 11.0"))
//echo "Internet Explorer 11.0";
$browser = "WebKit";
else if(strpos($agent,"MSIE 10.0"))
//echo "Internet Explorer 10.0";
$browser = "WebKit";
else if(strpos($agent,"MSIE 9.0"))
//echo "Internet Explorer 9.0";
$browser = "WebKit";
else if(strpos($agent,"MSIE 8.0"))
//echo "Internet Explorer 8.0";
$browser = "Trident";
else if(strpos($agent,"MSIE 7.0"))
//echo "Internet Explorer 7.0";
$browser = "Trident";
else if(strpos($agent,"MSIE 6.0"))
//echo "Internet Explorer 6.0";
$browser = "Trident";
else if(strpos($agent,"Firefox/3"))
//echo "Firefox 3";
$browser = "Gecko";
else if(strpos($agent,"Firefox/2"))
//echo "Firefox 2";
$browser = "Gecko";
else if(strpos($agent,"Chrome"))
//echo "Google Chrome";
$browser = "WebKit";
else if(strpos($agent,"Safari"))
//echo "Safari";
$browser = "WebKit";
else if(strpos($agent,"Opera"))
//echo "360";
$browser = "Trident";
//else echo $agent;
else {$browser = $agent;}
//echo $browser;
?> 

<h1 class="logo"><!-- <img src="././css/images/img/logo.jpg"/> --></h1>
<div class="index_box">
  <form id="form1" name="form1" method="post" action="">
	<input type="text" name="adminname" class="uname" value="用户" onfocus="if(value=='用户') {value=''}" onblur="if (value=='') {value='用户'}"/></br>
	<input type="text" name="password" class="pass" value="密码" onfocus="if(value=='密码') {value='';type='password'}" onblur="if (value=='') {value='密码';type='text'}"/></br>
	<input type="text" name="vifcode"  class="vifcode" value="验证码" onfocus="if(value=='验证码') {value=''}" onblur="if (value=='') {value='验证码'}"/>
	<img  src="<?php echo ADMIN_URL;?>captcha.php" onclick="this.src='<?php echo ADMIN_URL;?>captcha.php?'+Math.random()" align="absmiddle" style=" margin-left:5px; float:left"/></br>
	<input type="button" onclick="submit_data()" value="登陆" class="login_button" onmouseover="this.style.cursor='hand'"/>
  </form>
  <div class="index_box2"><span class="error_msg"></span></div>
</div>
<?php  $thisurl = ADMIN_URL.'login.php'; ?>
<script type="text/javascript">
$('.login_button').click(function(){
	submit_data();
});
	
//回车键提交
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
			submit_data();
	　　}
}

function submit_data(){
		name = $('.uname').val(); 
        pas = $('.pass').val();
		vifcodes = $('.vifcode').val();
		if(name == "" || pas == "" || vifcodes == "") return false;
		createwindow();
		$.post('<?php echo $thisurl;?>',{action:'login',adminname:name,password:pas,vifcode:vifcodes},function(data){ 
			removewindow();
			if(data != ""){
				$('.error_msg').html(data);
			}else{
			 	location.href='<?php echo ADMIN_URL;?>';
				return;
			}
		});
}	

</script>