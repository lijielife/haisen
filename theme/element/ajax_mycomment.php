<tr>
		   <td>
	    	<!--开始循环-->
			<?php 
			if(!empty($rt['goodscommentlist'])){
			foreach($rt['goodscommentlist'] as $row){
			?>
       		<div class="huifu">
            	<div class="hf_l"><img src="<?php echo !empty($row['avatar']) ? SITE_URL.$row['avatar'] : SITE_URL.'theme/images/head.gif';?>" height="36" width="35"/></div>
                <div class="hf_r">
                	<div class="hf_r_t"><p><?php echo !empty($row['nickname']) ? $row['nickname'] : $row['dbuname'];?> <b>对</b>&nbsp;<a href="<?php echo get_url($row['goods_name'],$row['goods_id'],'product.php?id='.$row['goods_id'],'goods',array('product','index',$row['goods_id']));?>" target="_blank"><?php echo $row['goods_name'];?></a>&nbsp;<b>提问</b>   &nbsp;&nbsp;&nbsp;<u><?php echo !empty($row['add_time']) ? date('Y-m-d H:i:s',$row['add_time']):"";?></u> <a href="javascript:delcomment('<?php echo $row['comment_id'];?>',this)" style="float:right; margin-right:20px;">删除</a></p></div>
                    <div  class="hf_r_m">
                    	<label style="padding-left:20px;">评论等级：<img src="<?php echo SITE_URL.'images/pl_xin'.$row['comment_rank'].'.png';?>" align="absmiddle"/></label>
                        <h3 >
                        	<table width="630" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td style="padding-left:20px">
	<?php echo $row['content'];?>
	</td>
  </tr>
</table>

                        </h3>
                    </div>
                    <div  class="hf_r_b"></div>
                </div>
                <div class="clear"></div>
            </div>
			<?php } } ?>
           <!--结束循环-->
		   		 </td>
		   </tr>
		   <tr>
		   <td align="right" class="mespage">
		     <?php echo $rt['goodscommentpage']['first'].'&nbsp;'.$rt['goodscommentpage']['prev'].'&nbsp;'.$rt['goodscommentpage']['next'].'&nbsp;'.$rt['goodscommentpage']['last'];?>
		   </td>
		   </tr>