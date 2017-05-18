<div id="wrap">
	<div class="mt">
		<h2>注册新用户</h2>
		<span>我已经注册，现在就&nbsp;<a href="<?php echo SITE_URL;?>user.php?act=login" style=" color:#FE0000">登录</a></span>
	</div>

	<input type="hidden" name="returnurl" value="<?php echo $this->Session->read('REFERER');?>"/>
	 <div id="content_1" class="content">
			<form id="REGISTER1" name="REGISTER1" method="post" action="">
				<table cellpadding="3" cellspacing="5" style="line-height:40px; width:600px; margin:0px auto; padding-left:40px" border="0">
				<tr>
					<th align="right">手机号码：</th><td><input type="text" name="email" /></td>
					<td align="left" class="textred email_mes">*</td>
				</tr>
				<tr>
					<th align="right">密码：</th><td><input type="password" name="password" /></td>
					<td align="left" class="textred pass_mes">*</td>
				</tr>
				<tr>
					<th align="right">确认密码：</th><td><input type="password" name="rp_pass"/></td>
					<td align="left" class="textred rp_pass_mes">*</td>
				</tr>
				
				<tr>
					<th align="right">验证码：</th><td><input type="text" name="vifcode" class="vifcode"/>&nbsp;<img  src="<?php echo SITE_URL;?>captcha.php" onclick="this.src='<?php echo SITE_URL;?>captcha.php?'+Math.random()" align="absmiddle"/></td>
					<td align="left" class="textred vifcode_mes">*</td>
				</tr>
				<tr><td>&nbsp;</td><td>
				<div class="submit" onclick="return ajax_register(1)">同意以下协议，提交</div>
				</td><td align="left"><input  type="hidden" name="user_rank" value="1"/></td></tr>
				</table>   
			</form>
			 <div class="protocol-con">
			 <?php echo $reg_info?>
			 </div>
			 <div class="clear10"></div>
	 </div>

</div>
<div class="clear"></div>
<script language="javascript" type="text/javascript">
	 function checkregistervar_item1(){
			user = $('#REGISTER1 input[name="username"]').val();
	
			pass = $('#REGISTER1 input[name="password"]').val();
			
			rp_pass = $('#REGISTER1 input[name="rp_pass"]').val();
						
			mail = $('#REGISTER1 input[name="email"]').val();
			
			vcode = $('#REGISTER1 input[name="vifcode"]').val();
			
			if(mail=="" || typeof(mail)=='undefined'){
				$('#REGISTER1 .email_mes').html("手机号码不能为空！");
				return false;
			}
			clearmes_item1();
			if(mail!=""&&typeof(mail)!='undefined'){
				clearmes_item1();
				if(!isMobile(mail)){
					$('#REGISTER1 .email_mes').html("你输入的手机号码不合法！");
					return false;
				}
			}
			
		/*		if(user=="" || typeof(user)=='undefined'){
				$('#REGISTER1 .uname_mes').html("用户名不能为空！");
				return false;
			}
		clearmes_item1();
			if(user.length<2){
				$('#REGISTER1 .uname_mes').html("用户名不能过于简单！");
				return false;
			}*/
			clearmes_item1();
			if(pass=="" || typeof(pass)=='undefined'){			
				$('#REGISTER1 .pass_mes').html("密码不能为空！");
				return false;
			}
			clearmes_item1();
			if(pass.length<6||pass.length>16){
				$('.pass_mes').html("密码长度必须6-16！");
				return false;
			}
			clearmes_item1();
			if(pass != rp_pass){	
				$('#REGISTER1 .rp_pass_mes').html("密码与确认密码不一致！");
				return false;
			}
		
			clearmes_item1();
			if(vcode=="" || typeof(vcode)=='undefined'){
				$('#REGISTER1 .vifcode_mes').html("验证码不能为空！");
				return false;
			}
			return true;
	}
	
	function clearmes_item1(){
		arr = ['email_mes','uname_mes','pass_mes','rp_pass_mes','vcode_mes'];
		for(i=0;i<arr.length;i++){
			$('#REGISTER1 .'+arr[i]).html("*");
		}
	}

	$(document).ready(function(){
								 
		   $("a.tab").click(function () {
			
			$(".active").removeClass("active");
			
			$(".ac").removeClass("ac");
			$(this).parent().addClass("ac");
			
			$(this).addClass("active");
			
			$(".content").hide();
			
			var content_show = $(this).attr("title");
			
			$("#"+content_show).show();
			
			$('#REGISTER2 input[name="user_rank"]').val($(this).attr('id'));
		  
		});
	
	});

	function ajax_register(tt){
		if(tt==1){
			if(checkregistervar_item1()){
				submit_register_data("REGISTER1");
			}
		}
		return false;
	}
		
</script>  