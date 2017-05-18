<div id="wrap">
	<div class="clear7"></div>
    	<?php $this->element('user_menu');?>
 <div class="m_right">
 	 <h2 class="con_title">我的信息详情</h2>
     <div class="jf">
     <table cellspacing="2" cellpadding="5" width="100%" style="line-height:30px">
		<tr>
			<td class="label" width="10%"><b>消息标题：</b></td>
			<td class="label2">
			<?php echo $rt['title'];?>
			</td>
		</tr>
		<tr>
			<td class="label" width="10%"><b>发布时间：</b></td>
			<td class="label2">
			<?php echo date('Y-m-d H:i:s',$rt['addtime']);?>
			</td>
		</tr>
		<tr>
			<td class="label" width="10%"><b>发布者：</b></td>
			<td class="label2">
			系统管理员
			</td>
		</tr>
		
		<tr>
			<td class="label" width="10%"><b>发表内容：</b></td>
			<td class="label2">
			<?php echo $rt['content'];?>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
			 <input type="button" name="Submit" value="返回" onclick="history.back()"  style="cursor:pointer; padding:4px"/>
			</td>
		</tr>
		</table>

      </div>
  </div>

    <div class="clear"></div>
  </div>
  <div class="clear7"></div>