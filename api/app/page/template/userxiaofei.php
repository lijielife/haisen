<style type="text/css">
.contentbox table{ border:1px solid #FCBF86}
.contentbox table td{text-align:left}
.contentbox table td.label{ text-align:right}
.gototype a{ padding:2px; border-bottom:2px solid #ccc; border-right:2px solid #ccc;}
.tx{ height:26px; line-height:26px; border:1px solid #ccc; width:260px;}
.headd b{ color:#FE0000}
td{ text-align:left}
</style>

<div class="contentbox" style="overflow-x:hidden; overflow-y:auto; height:500px">
<h2 class="con_title">会员消费</h2>
	 <form id="form1" name="form1" method="post" action="">
<table cellspacing="2" cellpadding="5" width="100%" class="headd">
	 	<tr><th colspan="2" align="left" style="text-align:left">
    	<img src="<?php echo $this->img('icon_search.gif');?>" alt="SEARCH" width="26" border="0" height="22" align="absmiddle">
    	关键字 <input name="keyword" size="25" type="text" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : (!empty($rt['mobile_phone']) ? $rt['mobile_phone'] : $rt['nickname']);?>" style="width:200px; height:20px; line-height:20px">
    	<input value=" 搜索 " class="cate_search" type="submit" style="padding:3px; cursor:pointer"><em>输入卡号或者手机号码或者会员!</em>
		<p style="padding-left:35px; height:30px; line-height:30px;">姓名：<b><?php echo $rt['nickname'];?></b>   会员等级：<b>金卡会员</b>   余额：<b><?php echo $rt['zmoney'];?></b>   积分数量：<b><?php echo $rt['zpoints'];?></b>   是否过期：<b>不过期</b>   电话号码：<b><?php echo $rt['mobile_phone'];?></b></p>
	</th></tr>
</table>
</form>
<form id="form1" name="form1" method="post" action="">
     <table cellspacing="2" cellpadding="5" width="100%">
		<tr>
			<td class="label" width="20%">折后金额：</td>
			<td align="left">
			<input class="tx" name="money" value="0.00" size="40" type="text" onkeyup="jisuanval()" />
			</td>
		</tr>
		<tr>
			<td class="label" width="20%">可得积分：</td>
			<td align="left">
			<input class="tx" name="giftpoint" value="0.00" size="40" type="text" />
			</td>
		</tr>
		<tr>
			<td class="label" width="20%">消费备注：</td>
			<td align="left">
			  <textarea name="changedesc" style=" width:350px; height:100px; border:1px solid #ccc"></textarea>		
			  </td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td align="left"><label>
			  <input type="radio" name="sendmes" value="1" checked="checked" />发送短信 &nbsp;
			  <input type="submit" value="<?php echo $type=='edit' ? '确认修改' : '确认添加';?>" class="submit" style="cursor:pointer; padding:3px"/>
			</label></td>
		</tr>
		</table>
</form>

</div>
<script language="javascript">
function jisuanval(){
	mon = $('input[name="money"]').val();
	$('input[name="giftpoint"]').val(parseFloat(mon));
}
</script>