<div class="main">
	<div class="mainbox">
		<div class="lefts">
			<?php $this->element('dailimenu');?>
		</div>
		<div class="rights">
	<form name="USERINFO" id="USERINFO" action="" method="post" novalidate="novalidate">
	<div style="background:url(<?php echo $this->img('houtai_31.png');?>) 22px center no-repeat;height:35px; border-bottom:1px solid #ddd;"><p style="font-size:14px;font-family:微软雅黑;  line-height:20px; padding:7px;padding-left:30px;  text-align:center">代理登录</p></div>
	<ul class="s_shuru">
         <li>
        	<p><span style="color:#ea3100;">*</span>手机号码：
            </p>
            <span class="s_shuru_1">
            <input width="72%" type="text" id="mobile_phone" name="mobile_phone" value="" size="25" class="inputBg inp_jgxg" style="width:183px; height:24px; font-family:'微软雅黑'; ">
           	</span>
        </li>
         <li>
        	<p><span style="color:#ea3100;">*</span>登录密码：
            </p>
            <span class="s_shuru_1">
            <input maxlength="20" width="72%" type="password" name="password" id="password" value="" size="25" class="inputBg inp_jgxg" style="width:183px; height:24px;font-family:'微软雅黑'; ">
           	</span>
        </li>
    </ul>
    <div style="clear:both;"></div>
    <div style="padding-left:97px; padding-top:18px; padding-bottom:38px; text-align:left">
          <input name="submit" type="button" value="登录" onclick="ajax_daili_login();" class="gree" style="cursor:pointer; padding:2px">
          </div>
	</form>
		</div>
		<div class="clear"></div>
	</div>
</div>
<script type="text/javascript">
function ajax_daili_login(){
	  var fromAttr        = new Object();  //
	   var form      = document.forms['USERINFO']; //
	   if(form){
			fromAttr = getFromAttributes(form);
	   }else{
			alert("检查是否存在表单REGISTER");
			return false;
	   }
	   createwindow();
	   $.ajax({
		   type: "POST",
		   url: "daili.php?action=ajax_daili_login",
		   data: "fromAttr=" + $.toJSON(fromAttr),
		   dataType: "json",
		   success: function(data){
			    removewindow();
		   		if(data.error==0){
					window.location.href=SITE_URL+'daili.php';
				}else{
					JqueryDialog.Open('系统提醒你','<br />'+data.message,260,50);
				}
		   }
		});
}
</script>	