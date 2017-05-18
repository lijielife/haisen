<table cellspacing="2" cellpadding="5" width="100%">
			<tr>
			   <th width="50" style="text-align:left"><label><input type="checkbox" class="quxuanall" value="checkbox" />编号</label></th>
			   <th>标题</th>
			   <th>发送者</th>
			   <th>时间</th>
			   <th width="50">操作</th>
			</tr>
			<?php 
			if(!empty($rt['meslist'])){ 
			foreach($rt['meslist'] as $row){
			$color = $this->action('user','__return_rp_mes',$row['mes_id'],$row['status']);
			?>
			<tr>
			<td><input type="checkbox" name="quanxuan" value="<?php echo $row['mes_id'];?>" class="gidss"/></td>
			<td class="<?php echo $color==1 ? 'accolor' : 'decolor';?>"><a href="<?php echo SITE_URL;?>user.php?act=inboxinfo&id=<?php echo $row['mes_id'];?>" title="View"><?php echo $row['title'];?></a></td>
			<td class="<?php echo $color==1 ? 'accolor' : 'decolor';?>">管理员 </td>
			<td class="<?php echo $color==1 ? 'accolor' : 'decolor';?>"><?php echo !empty($row['addtime']) ? date('Y-m-d H:i:s',$row['addtime']) : '---';?></td>
			<td>
			<a href="<?php echo SITE_URL;?>user.php?act=inboxinfo&id=<?php echo $row['mes_id'];?>" title="Edit"><img src="<?php echo SITE_URL.'theme/images/icon_view.gif';?>" title="Edit"/></a>&nbsp;
			<a  href="javascript:;" onclick="return ajax_del_myinbox(<?php echo $row['mes_id'];?>,this)"><img src="<?php echo SITE_URL.'theme/images/icon_drop.gif';?>" title="Delete" alt="Delete"/></a>
			</td>
			</tr>
			<?php
			 } ?>
			<tr>
				 <td colspan="6"> <input type="checkbox" class="quxuanall" value="checkbox" />
					  <input type="button" name="button" value="删除选中" disabled="disabled" class="bathdel" id="bathdel" onclick="return ajax_batdel_myinbox()" style="cursor:pointer"/>
				 </td>
			</tr>
				<?php } ?>
		</table>
<?php if(!empty($rt['pagelink'])){?>
<div class="pages">
<?php echo $rt['pagelink']['first'];?>
<?php echo $rt['pagelink']['prev'];?>
<?php if(!empty($rt['pagelink']['list']))foreach($rt['pagelink']['list'] as $aa){ echo $aa."\n";}?>
<?php echo $rt['pagelink']['next'];?>
<?php echo $rt['pagelink']['last'];?>
</div>
<?php } ?>