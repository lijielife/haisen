<style type="text/css">
.contentbox table{ border:1px solid #FCBF86}
.contentbox table td{text-align:center}
</style>
<div class="contentbox" style="overflow-x:hidden; overflow-y:auto; height:500px">
<h2 class="con_title">会员列表</h2>
	 <table cellspacing="2" cellpadding="5" width="100%" style="line-height:18px">
		<tr>
		   <td width="45" bgcolor="#DFE0DC"><label><input type="checkbox" class="quxuanall" value="checkbox" />序号</label></td>
		   <td bgcolor="#DFE0DC">会员账号<br />[会员级别]</td>
		   <td bgcolor="#DFE0DC">会员卡号<br />[会员昵称]</td>
		   <td bgcolor="#DFE0DC">余额</td>
		   <td bgcolor="#DFE0DC">积分</td>
		   <td bgcolor="#DFE0DC">消费</td>
		   <td bgcolor="#DFE0DC" width="60">会员状态</td>
		   <td bgcolor="#DFE0DC">加入时间</td>
		   <td bgcolor="#DFE0DC">最后登录</td>
		   <td bgcolor="#DFE0DC" width="70">操作</td>
		  </tr>
		  <tr>
		  <td  colspan="10" style="text-align:left;" class="pagesmoney">
		  <style>
		  .pagesmoney a{ margin-right:5px; color:#FFF; background-color:#b70000; text-decoration:none; float:left; display:inherit; padding-left:5px; padding-right:5px; text-align:center}
		  .pagesmoney a:hover{ text-decoration:underline}
		  </style>
		  <?php echo $rt['userpointpage']['showmes'].'&nbsp;'.$rt['userpointpage']['first'].'&nbsp;'.$rt['userpointpage']['prev'].'&nbsp;'.$rt['userpointpage']['next'].'&nbsp;'.$rt['userpointpage']['last'];?>
		  </td>
		  </tr>
	 </table>
	 
	 <?php $this->element('page',array('pagelink'=>$pagelink));?>
</div>