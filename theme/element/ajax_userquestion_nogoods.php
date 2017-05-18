<tr>
		   <td>
	    	<!--开始循环-->
			
			<?php
			if(!empty($rt['notgoodsmeslist'])){
			foreach($rt['notgoodsmeslist'] as $row){
			?>
       		<div class="huifu">
            	<div class="hf_l"><img src="<?php echo !empty($row['avatar']) ? SITE_URL.$row['avatar'] : SITE_URL.'theme/images/head.gif';?>" height="36" width="35"/></div>
                <div class="hf_r">
                	<div class="hf_r_t"><p><?php echo !empty($row['nickname']) ? $row['nickname'] : $row['dbusername'];?> &nbsp;&nbsp;&nbsp;<u><?php echo !empty($row['addtime']) ? date('Y-m-d H:i:s',$row['addtime']):"";?></u> <a href="javascript:delmessage('<?php echo $row['mes_id'];?>',this)" style="float:right; margin-right:20px;">删除</a></p></div>
                    <div  class="hf_r_m">
                    	<p><?php echo $row['comment_title'];?></p>
                        <h3 >
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
		     <?php echo $rt['notgoodmespage']['first'].'&nbsp;'.$rt['notgoodmespage']['prev'].'&nbsp;'.$rt['notgoodmespage']['next'].'&nbsp;'.$rt['notgoodmespage']['last'];?>
		   </td>
		   </tr>
		   <tr>
		   <td style="padding-left:65px; height:50px;" valign="bottom">
		   <b>我要提问题</b>
		   </td>
		   </tr>
		   	<tr>
		   <td valign="top">
		    <form action="" method="post" name="MESSAGES" id="MESSAGES">
		   <div class="huifu">
                <div class="hf_r">
                    <div  class="hf_r_m">
                    	<p>&nbsp;</p>
                        <h3 >
                        	<table width="630" border="0" cellpadding="0" cellspacing="0">
							  <tr>
								<td style="padding-left:20px">
								<textarea name="comment_title" cols="45" rows="10" style="width:620px;height:70px; font-size:12px; border:none"></textarea>
								<input type="hidden" name="goods_id" value="0"/>
								</td>
							  </tr>
							  </tr>
							</table>

                        </h3>
                    </div>
                    <div  class="hf_r_b"></div>
                </div>
                <div class="clear"></div>
            </div>
			<p style="padding-left:65px;"> <input type="button" name="submitmes" id="button" value="提交" style="background:url(<?php echo SITE_URL;?>images/top_ho_bg.jpg);width:60px; height:25px; border:none; cursor:pointer" onclick="submit_message()"/></p>
			</form>
		   </td>
		   </tr>