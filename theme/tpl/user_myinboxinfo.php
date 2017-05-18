<div id="wrap">
	<div class="clear7"></div>
    	<?php $this->element('user_menu');?>
	<div class="m_right">
		<h2 class="con_title">我的信箱详细</h2>
		<style type="text/css">
		.txt{ border:1px solid #ddd; height:22px; line-height:22px; width:280px; }
		.pages a.on{ font-weight:bold; color:#CC0000}
		</style>
		<div class="MYINBOXS">
				 <form id="form1" name="form1" method="post" action="">
				<table cellspacing="2" cellpadding="5" width="100%" style="line-height:30px">
				<tr>
					<td class="label" width="12%"><b>标题:</b></td>
					<td class="label2">
					<?php echo $rt['title'];?>
					</td>
				</tr>
				<tr>
					<td class="label" width="12%"><b>发送时间:</b></td>
					<td class="label2">
					<?php echo date('Y-m-d H:i:s',$rt['addtime']);?>
					</td>
				</tr>
				<tr>
					<td class="label" width="12%"><b>发送者:</b></td>
					<td class="label2">
					管理员
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><hr/></td>
				</tr>
				<tr>
					<td class="label" width="12%"><b>内容:</b></td>
					<td class="label2" align="left" valign="top" style="line-height:24px;">
					<?php echo $rt['content'];?>
					</td>
				</tr>
				<?php if(!empty($rt['rp']))foreach($rt['rp'] as $rows){?>
				<tr>
					<td width="12%">&nbsp;</td>
					<td align="left" valign="top" style="line-height:24px; color:#666;background-color:#FAFAFA">
					<table cellspacing="0" cellpadding="0" width="100%">
						<tr>
							<td width="10%" style="color:#a72d2c" valign="top"><b>回复:</b></td>
							<td align="left" valign="top" style="line-height:24px;">
								<?php echo $rows['content'];?>
								<?php if(!empty($rows['rp_content'])){?>
								<div style="padding:10px; background-color:#ededed; text-align:left; color:#cc0000">
								<b>管理员:</b>&nbsp;<?php echo $rows['rp_content'];?>
								</div>
								<?php } ?>
							</td>
						</tr>
					</table>
					</td>
				</tr>
				<?php } ?>
				<tr>
					<td class="label" width="12%"><b>回复:</b></td>
					<td class="label2" align="left" valign="top" style="line-height:24px; color:#999">
					<input type="hidden" name="mes_id" value="<?php echo $rt['mes_id'];?>" />
					<textarea name="rp_content" id="content" style="width:100%;height:300px;display:none;"></textarea>
					<script>KE.show({id : 'content',cssPath : '<?php echo SITE_URL.'css/edit.css';?>'});</script>		
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td align="left">
                          <input type="submit" name="Submit" value=" 提交 " style="cursor:pointer; padding:2px"/>
                     </td>
				</tr>
				</table>
				 </form>
		</div>	 
     </div>
    <div class="clear"></div>
</div>
