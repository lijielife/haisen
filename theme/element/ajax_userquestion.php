<tr>
		   <td>
	    	<!--开始循环-->
		<?php 
			if(!empty($rt['goodsmeslist'])){
			foreach($rt['goodsmeslist'] as $row){
		?>
       		<div class="huifu">
            	<div class="hf_l"><img src="<?php echo !empty($row['avatar']) ? SITE_URL.$row['avatar'] : SITE_URL.'theme/images/head.gif';?>" height="36" width="35"/></div>
                <div class="hf_r">
                	<div class="hf_r_t"><p><?php echo !empty($row['nickname']) ? $row['nickname'] : $row['dbusername'];?> <b>对</b>&nbsp;<a href="<?php echo get_url($row['goods_name'],$row['goods_id'],'product.php?id='.$row['goods_id'],'goods',array('product','index',$row['goods_id']));?>" target="_blank"><?php echo $row['goods_name'];?></a>&nbsp;<b>提问</b>   &nbsp;&nbsp;&nbsp;<u><?php echo !empty($row['addtime']) ? date('Y-m-d H:i:s',$row['addtime']):"";?></u> <a href="javascript:delmessage('<?php echo $row['mes_id'];?>',this)" style="float:right; margin-right:20px;">删除</a></p></div>
                    <div  class="hf_r_m">
                    	<p><?php echo $row['comment_title'];?></p>
                        <h3>
                        	<table width="630" border="0" cellpadding="0" cellspacing="0">
                                  <tr>
                                        <td width="90" class="loc_r" valign="top">管理员回答：</td>
                                        <td>
                                        <?php echo !empty($row['rp_content ']) ? $row['rp_content '] : "暂无回复！";?>
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
		     <?php echo $rt['goodsmespage']['first'].'&nbsp;'.$rt['goodsmespage']['prev'].'&nbsp;'.$rt['goodsmespage']['next'].'&nbsp;'.$rt['goodsmespage']['last'];?>
		   </td>
		   </tr>