<p class="ask"><img src="<?php echo SITE_URL.'theme/images/question.jpg';?>"  width="121" height="38" onclick="return ajax_check_message('<?php echo $rt['goodsinfo']['goods_id'];?>')" style="cursor:pointer"/></p>
	<?php if(!empty($rt['messagelist'])){?>
	<?php foreach($rt['messagelist'] as $row){?> 
			   <div class="zixun">
				  <div class="zx_l"><img src="<?php echo !empty($row['avatar']) ? SITE_URL.$row['avatar'] : SITE_URL.'theme/images/head.gif';?>" height="36" width="35"/></div>
				  <div class="zx_r">
					<div class="zx_r_t"><p><?php echo $row['user_name'];?>   &nbsp;&nbsp;&nbsp;<u><?php echo !empty($row['addtime']) ? date('Y-m-d H:i:s',$row['addtime']):"";?></u> </p></div>
					<div  class="zx_r_m">
						<p><?php echo $row['comment_title'];?></p>
						<h3 >
							<table width="630" border="0" cellpadding="0" cellspacing="0">
							  <tr>
								<td width="90" class="loc_r" valign="top">管理员回答：</td>
								<td><?php echo !empty($row['rp_content']) ? $row['rp_content'] : "暂无回复！";?>
								</td>
							  </tr>
							</table>
						</h3>
					</div>
					<div  class="zx_r_b"></div>
				</div>
				  <div class="clear"></div>
				</div>
   <?php } ?>
	 <div  class="num_list"  style="text-align:right;">
<?php echo $rt['messagepage']['first'].'&nbsp;'.$rt['messagepage']['prev'].'&nbsp;'.(!empty($rt['messagepage']['list'])?implode('&nbsp;',$rt['messagepage']['list']).'&nbsp;':"").$rt['messagepage']['next'].'&nbsp;'.$rt['messagepage']['last'];?>
	 </div>
<?php } ?>