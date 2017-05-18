<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/3/css.css" media="all" />
<div id="home">
	<div id="header">
		<div class="logo" style="height:28px; padding-top:10px; background:url(<?php echo $this->img('xy.png');?>) 10px 8px no-repeat"><span onclick=" history.go(-1);">&nbsp;</span></div>
		<div class="shoptitle"><span><?php echo $fxrank!='1'? '我要开店' : '编辑店铺';?></span></div>
		<div class="logoright">
			<div style="background:none">
			<a style="padding:5px; cursor:pointer;border-radius:5px; background:#e36267; color:#fff; font-size:12px; height:18px; line-height:18px; margin-top:10px;filter:alpha(opacity=80); -moz-opacity:0.8; -khtml-opacity:0.8;opacity:0.8;" onclick="update_user_info(10)" href="javascript:;"><?php echo $fxrank!='1'? '立即开通' : '确认修改';?></a>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
.pw,.pwt{
height:28px; line-height:normal;
border: 1px solid #ddd;
border-radius: 5px;
background-color: #fff; padding-left:5px; padding-right:5px;
-moz-border-radius:5px;/*仅Firefox支持，实现圆角效果*/
-webkit-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
-khtml-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
border-radius:5px;/*仅Opera，Safari,Chrome支持，实现圆角效果*/
}
.pw{ width:200px;}
.usertitle{
height:22px; line-height:22px;color:#666; font-weight:bold; font-size:14px; padding:5px;
border-radius: 5px;
background-color: #ededed; padding-left:5px; padding-right:5px;
-moz-border-radius:5px;/*仅Firefox支持，实现圆角效果*/
-webkit-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
-khtml-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
border-radius:5px;/*仅Opera，Safari,Chrome支持，实现圆角效果*/
}
#main img{ max-width:100%;}
</style>
<div id="main" style="padding:5px; min-height:300px">
	<div style="padding-bottom:20px; font-size:0px">
		<?php echo isset($rt['info']['content']) ? $rt['info']['content'] : "";?>
	</div>
	 <form name="USERINFO" id="USERINFO" action="" method="post">
     <table width="100%" border="0" cellpadding="0" cellspacing="0" style="line-height:34px; padding:10px; font-size:14px;">
	 <tr>
	 <td width="18%" align="right">&nbsp;</td>
	 <td>店名例如：<?php echo $GLOBALS['LANG']['site_name'];?></td>
	 </tr>
	 <tr>
		<td width="15%" align="right" style="padding-bottom:2px;"><b class="cr2">*</b>店名：</td>
		<td width="85%" align="left" style="padding-bottom:2px;">
		<span style="line-height:28px; height:28px; display:block; width:60px; float:left; border-bottom:1px solid #ccc; overflow:hidden"><?php echo $GLOBALS['LANG']['site_name'];?></span><input placeholder="店名限制在6个字内" type="text" value="<?php echo isset($rt['userinfo']['question'])&&!empty($rt['userinfo']['question']) ? $rt['userinfo']['question'] : "";?>" name="question"  class="pw" style="width:120px; float:left"/>
		</td>
  	</tr>
	<tr>
	<td width="15%" align="right" style="padding-bottom:2px;"><b class="cr2">*</b>手机：</td>
    <td width="85%" align="left" style="padding-bottom:2px;">
    <input placeholder="手机号码"  type="text" value="<?php echo isset($rt['userinfo']['mobile_phone'])&&!empty($rt['userinfo']['mobile_phone']) ? $rt['userinfo']['mobile_phone'] : "";?>" name="mobile_phone"  class="pw"/></td>
  	</tr>
	<tr>
	<td width="15%" align="right" style="padding-bottom:2px;"><b class="cr2">*</b>姓名：</td>
    <td width="85%" align="left" style="padding-bottom:2px;">
    <input placeholder="姓名"  type="text" value="<?php echo isset($rt['userinfo']['answer'])&&!empty($rt['userinfo']['answer']) ? $rt['userinfo']['answer'] : "";?>" name="answer"  class="pw"/></td>
  </tr>
   <tr>
    <td align="center" colspan="2">
	<span class="returnmes" style="color:#FF0000"></span>
	</td>
  </tr>
</table>
</form>
</div>
<?php $this->element('3/footer',array('lang'=>$lang)); ?>