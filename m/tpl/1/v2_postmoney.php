<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/1/css.css" media="all" />
<?php $this->element('1/top',array('lang'=>$lang)); ?>

<style type="text/css">
.pw,.pwt{
height:26px; line-height:normal;
border: 1px solid #ddd;
border-radius: 5px;
background-color: #fff; padding-left:5px; padding-right:5px;
-moz-border-radius:5px;/*仅Firefox支持，实现圆角效果*/
-webkit-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
-khtml-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
border-radius:5px;/*仅Opera，Safari,Chrome支持，实现圆角效果*/
}
.pw{ width:90%;}
.usertitle{
height:22px; line-height:22px;color:#666; font-weight:bold; font-size:14px; padding:5px;
border-radius: 5px;
background-color: #ededed; padding-left:5px; padding-right:5px;
-moz-border-radius:5px;/*仅Firefox支持，实现圆角效果*/
-webkit-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
-khtml-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
border-radius:5px;/*仅Opera，Safari,Chrome支持，实现圆角效果*/
}
.pws{ background:#ededed}
</style>
<div id="main" style="min-height:300px">
	<div style="background:#f5f5f5; border-bottom:1px solid #d1d1d1;padding:10px;">
	<form name="USERINFO2" id="USERINFO2" action="" method="post">
		<table width="100%" border="0" cellpadding="0" cellspacing="0" style="line-height:30px;">
           <tr>
			<td width="25%" align="right" style="padding-bottom:2px;"><b class="cr2">*</b> <font color="#999999">帐号类型：</font></td>
			<td width="75%" align="left" style="padding-bottom:2px;">
			<input readonly="" type="text" value="<?php echo isset($rts['bankname']) ? $rts['bankname'] : '';?>" name="bankname"  class="pw pws"/>
			
	</td>
			</td>
		  </tr>
		   <tr>
			<td width="25%" align="right" style="padding-bottom:2px;"><b class="cr2">*</b> <font color="#999999">帐号：</font></td>
			<td width="75%" align="left" style="padding-bottom:2px;">
			<input readonly="" type="hidden" type="text" value="<?php echo isset($rts['bankname']) ? $rts['bankname'] : '';?>" name="bankname"  class="pw pws"/>
		
			<input readonly="" type="text" value="<?php echo isset($rts['banksn']) ? $rts['banksn'] : '';?>" name="banksn"  class="pw pws"/></td>
			</td>
		  </tr>
		  <tr>
			<td width="25%" align="right" style="padding-bottom:2px;"><b class="cr2">*</b> <font color="#999999">手机号：</font></td>
			<td width="75%" align="left" style="padding-bottom:2px;">
			<input readonly="" type="text" value="<?php echo isset($rts['bankaddress']) ? $rts['bankaddress'] : '';?>" name="bankaddress"  class="pw pws"/></td>
		  </tr>
		   <tr>
			<td width="25%" align="right" style="padding-bottom:2px;"><b class="cr2">*</b> <font color="#999999">户名：</font></td>
			<td width="75%" align="left" style="padding-bottom:2px;">
			<input readonly="" type="text" value="<?php echo isset($rts['uname']) ? $rts['uname'] : '';?>" name="uname"  class="pw pws"/></td>
		  </tr>
		  <!-- <tr>
			<td width="25%" align="right" style="padding-bottom:2px;"><b class="cr2">*</b> <font color="#999999">卡号：</font></td>
			<td width="75%" align="left" style="padding-bottom:2px;">
			<input readonly="" type="text" value="<?php echo isset($rts['banksn']) ? $rts['banksn'] : '';?>" name="banksn"  class="pw pws"/></td>
		  </tr>-->
		  <tr>
			<td width="25%" align="right" style="padding-bottom:2px;"><b class="cr2">*</b> <font color="#999999">你的余额：</font></td>
			<td width="75%" align="left" style="padding-bottom:2px;">
			<input readonly="" type="text" value="<?php echo isset($mymoney) ? $mymoney : '0.00';?>元" name="banksn"  class="pw pws"/></td>
		  </tr>
<!--		  <tr>
			<td width="25%" align="right" style="padding-bottom:2px;"><b class="cr2">*</b>提款密码：</td>
			<td width="75%" align="left" style="padding-bottom:2px;">
			<input type="password" value="" name="pass"  class="pw"/></td>
		  </tr>-->
		  <tr>
			<td width="25%" align="right" style="padding-bottom:2px;"><b class="cr2">*</b> 提款资金：</td>
			<td width="75%" align="left" style="padding-bottom:2px;">
			<input type="text" value="" name="postmoney"  class="pw" style="width:50%"/>元</td>
		  </tr>
		  <tr>
			<td align="center" style="padding-top:10px;" colspan="2">
			<a href="javascript:;" onclick="return ajax_postmoney();" style="border-radius:5px;display:block;background:#3083CE;cursor:pointer;width:140px; height:25px; line-height:25px; font-size:14px; color:#FFF">确认提交</a><a href="<?php echo ADMIN_URL.'user.php?act=myinfos_b';?>" style="border-radius:5px;display:block;background:#E13934;cursor:pointer;width:140px; height:25px; line-height:25px; font-size:14px; color:#FFF; margin-top:10px">修改提款信息</a><span class="returnmes2" style="padding-left:10px; color:#FF0000"></span>
			</td>
		  </tr>
		</table>
	</form>
	</div>

</div>
<script type="text/javascript">
function ajax_postmoney(){
	//passs = $('input[name="pass"]').val();
	money = $('input[name="postmoney"]').val();
	if(parseInt(<?php echo isset($mymoney) ? $mymoney : '0';?>) < 50){
		$('.returnmes2').html('暂时不能为你服务，先赚取50以上佣金再来吧！');
		return false;
	}
	if(money=="" ){
		$('.returnmes2').html('请输入提款金额');
		return false;
	}

	if(confirm('确认信息无误提款吗')){
		createwindow();
		
		$.post('<?php echo ADMIN_URL;?>daili.php',{action:'ajax_postmoney',money:money,id:'<?php echo $rts['id'];?>'},function(data){ 
			$('.returnmes2').html(data);
			removewindow();
		});
	}
	return false;
}

function update_user_pass2(){
	passs = $('input[name="pass"]').val();
	newpasss = $('input[name="newpass"]').val();
	rpnewpasss = $('input[name="rpnewpass"]').val();
	if(passs=="" || newpasss=="" || newpasss==""){
		$('.returnmes').html('请输入完整信息');
		return false;
	}
	if(newpasss!=rpnewpasss){
		$('.returnmes').html('密码与确认密码不一致');
		return false;
	}
	if(confirm('确认修改吗')){
		createwindow();
		
		$.post('<?php echo ADMIN_URL;?>daili.php',{action:'update_user_pass',pass:passs,newpass:newpasss,rpnewpass:rpnewpasss},function(data){ 
			$('.returnmes').html(data);
			removewindow();
		});
	}
	return false;
}
function ajax_open_dailiapply(tt){
	if(tt==true){
		ty = '1';
	}else{
		ty = '2';
	}
	$.post('<?php echo ADMIN_URL;?>daili.php',{action:'ajax_open_dailiapply',ty:ty},function(data){ 
		
	});
}
</script>
<?php $this->element('1/footer',array('lang'=>$lang)); ?>