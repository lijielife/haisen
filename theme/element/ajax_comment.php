<?php if(!empty($rt['commentlist'])){?>
 <div class="clear"></div>
<?php foreach($rt['commentlist'] as $row){?>
<!--循环-->
<div class="huifu">
	<div class="hf_l"><img src="<?php echo !empty($row['avatar']) ? SITE_URL.$row['avatar'] : SITE_URL.'theme/images/head.gif';?>" height="36" width="35"/></div>
	<div class="hf_r">
		<div class="hf_r_l"></div>
		<div class="hf_r_m">
				<table width="456" border="0" cellpadding="0" cellspacing="0">
				  <tr>
					<td width="330" class="cr4">	  
				   <?php echo $row['content'];?>
					</td>
					<td> 买家：<?php echo $row['user_name'];?></td>
				  </tr>
				  <tr>
					<td class="cr3"><?php echo !empty($row['add_time']) ? date('Y-m-d H:i:s',$row['add_time']):"";?></td>
					<td class="cr2"><?php 
					if($row['comment_rank']>0){
					echo $row['comment_rank']==3 ? '好评' : ($row['comment_rank']==2 ? '中评' : '差评');
					for($i=0;$i<$row['comment_rank'];$i++){
					?> <img src="<?php echo SITE_URL.'theme/images/onestar.gif';?>" width="15" height="14"/>
					<?php }} ?>
					</td>
				  </tr>
				</table>
		</div>
		<div class="hf_r_r"></div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
 </div>
 <!--循环end-->
<?php } ?>
 <div  class="num_list"  style="text-align:right;"><a>首页</a>
<?php echo $rt['commentpage']['first'].'&nbsp;'.$rt['commentpage']['prev'].'&nbsp;'.(!empty($rt['commentpage']['list'])?implode('&nbsp;',$rt['commentpage']['list']).'&nbsp;':"").$rt['commentpage']['next'].'&nbsp;'.$rt['commentpage']['last'];?>
 </div>
<?php } ?>