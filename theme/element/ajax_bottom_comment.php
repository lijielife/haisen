<div class="pl_wb_l_t"><p><a href="<?php echo SITE_URL.'comment/'?>">所有评论>></a></p></div>
<div class="pl_wb_l_m">
	<?php if(!empty($rt['allcommentlist'])){?>
	<ul>
	<?php foreach($rt['allcommentlist'] as $row){?>
		<li> 
			<div class="pl_wb_l_m_pic"><a href="<?php echo $row['url'];?>"><img src="<?php echo SITE_URL.$row['goods_thumb'];?>" height="66" width="53" /></a></div>
			<div class="pl_wb_l_m_con">
				<div class="pl_wb_l_m_con_t">
					<div class="pl_wb_l_m_con_t_l"><img src="<?php echo SITE_URL.'theme/images/pl_xin'.$row['comment_rank'].'.png';?>" /></div>
					<div class="pl_wb_l_m_con_t_r"><?php echo !empty($row['addtime']) ? date('Y-m-d',$row['add_time']):"";?></div>
					 <div class="clear"></div>
				</div>
				<p><?php echo $row['content'];?></p>
			</div>
			<div class="clear"></div>
		</li>
	<?php } ?>
	</ul>
	<?php } ?>
	 </div>
 <div class="pl_wb_l_b"></div>