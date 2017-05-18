<div class="main">
	<div class="mainbox">
		<div class="lefts">
			<?php $this->element('dailimenu');?>
		</div>
		<div class="rights">
			<div style="background:url(<?php echo $this->img('houtai_31.png');?>) 22px center no-repeat;height:35px; border-bottom:1px solid #ddd;"><p style="font-size:14px;font-family:微软雅黑;  line-height:20px; padding:7px;padding-left:30px;  text-align:left">添加广告</p></div>
				<form name="USERINFO" id="USERINFO" action="" method="post" novalidate="novalidate">
					<ul class="s_shuru">
						<li style="height:auto;">
							<p>广告图：
							</p>
							<span class="s_shuru_1" style="height:auto">
							  <table width="100%" border="0" cellpadding="0" cellspacing="0">
									<tr>
										<td align="left">
										<img id="img_avatar" src="<?php echo !empty($rt['ad_img']) ? $rt['ad_img'] : '';?>" alt="" style="width:150px;" />
										</td>
										<td align="left" valign="bottom">
										<input name="ad_img" id="ad_img" type="hidden" value="<?php echo isset($rt['ad_img'])? $rt['ad_img'] : "";?>"><iframe id="iframe_t" name="iframe_t" border="0" src="<?php echo SITE_URL;?>uploadajax/" scrolling="no" width="140" frameborder="0" height="36"></iframe>
								<p style="color:#FF0000; font-size:12px; width:90%; text-align:left; padding-left:10px;">(上传大小不能超过500kb)</p>
										</td>
									</tr>
								</table>
							</span>
						</li>
						<li>
							<p>选择分类：</p>
							<span class="s_shuru_1" style="height:auto">
							<table cellspacing="2" cellpadding="5" width="100%">
							<tr>
							<td width="90%">
							<select name="tids" id="tids">
							<option value="">==请选择==</option>
							<?php 
							if(!empty($rts)){
							 foreach($rts as $row){ 
							?>
							<option value="<?php echo $row['tid'];?>" <?php echo isset($rt['tid'])&&$row['tid']==$rt['tid'] ? 'selected="selected"' : '';?>><?php echo $row['ad_name'];?></option>
							<?php }} ?>
							</select> 
							<span class="require-field">*</span><span class="tids_mes"></span></td>
						  </tr>
						  <tr class="catelist" <?php echo $rt['type']=='gc'? 'style="display:block"' : 'style="display:none"';?>>
							<td width="90%">
							<input type="hidden" name="type" value="<?php echo $rt['type'];?>"/>
							<select name="cat_id" id="cat_id">
							<option  value="0">--选择分类--</option>
								<?php 
								$cat_id = isset($rt['cat_id']) ? $rt['cat_id'] : 0;
								if(!empty($catelist)){
								 foreach($catelist as $row){ 
								?>
								<option value="<?php echo $row['id'];?>"  <?php echo $row['id']==$cat_id ? 'selected="selected"' : '';?>><?php echo $row['name'];?></option>
									<?php 
										if(!empty($row['cat_id'])){
										foreach($row['cat_id'] as $rows){ 
											?>
											<option value="<?php echo $rows['id'];?>"  <?php echo $rows['id']==$cat_id ? 'selected="selected"' : '';?>>&nbsp;&nbsp;&nbsp;<?php echo $rows['name'];?></option>
											<?php 
											if(!empty($rows['cat_id'])){
											foreach($rows['cat_id'] as $rowss){ 
											?>
													<option value="<?php echo $rowss['id'];?>"  <?php echo $rowss['id']==$cat_id ? 'selected="selected"' : '';?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowss['name'];?></option>
											<?php
											}//end foreach
											}//end if
										}//end foreach
									} // end if
							 }//end foreach
						} ?>
							</select> 
							</td>
						  </tr>
						  </table>
	  					</span>
						</li>
						 <li>
							<p>广告名称：
							</p>
							<span class="s_shuru_1">
							<input width="72%" type="text" id="ad_name" name="ad_name" value="<?php echo isset($rt['ad_name'])&&!empty($rt['ad_name']) ? $rt['ad_name'] : "";?>" size="25" class="inputBg inp_jgxg" style="width:183px; height:24px; font-family:'微软雅黑'; ">
							</span>
						</li>
						 <li>
							<p>链接地址：
							</p>
							<span class="s_shuru_1">
							<input width="72%" type="text" name="ad_url" id="ad_url" value="<?php echo isset($rt['ad_url'])&&!empty($rt['ad_url']) ? $rt['ad_url'] : "";?>" size="25" class="inputBg inp_jgxg" style="width:183px; height:24px;font-family:'微软雅黑'; ">
							</span>
						</li>
						 <li>
							<p>状态：
							</p>
							<span class="s_shuru_1">
							<input id="is_show" name="is_show" value="1" type="checkbox" <?php echo !isset($rt['is_show']) || $rt['is_show']==1 ? 'checked="checked"' : '';?>>审核
							</span>
						</li>
						 <li>
							<p>备注：
							</p>
							<span class="s_shuru_1" style="height:auto">
						 <input width="72%" type="text" id="remark" name="remark" value="<?php echo isset($rt['remark'])&&!empty($rt['remark']) ? $rt['remark'] : "";?>" size="25" class="inputBg inp_jgxg" style="width:320px; height:30px; line-height:30px;">
							</span>
						</li>
						
					</ul>
					<div style="clear:both;"></div>
					<div style="padding-left:97px; padding-top:18px; padding-bottom:38px; text-align:left">
						  <input name="submit" type="button" value="保存" onclick="ajax_daili_upload_ads();" class="gree" style="cursor:pointer; padding:2px">
					</div>
					<input name="pid" type="hidden" value="<?php echo isset($rt['pid'])&&!empty($rt['pid']) ? $rt['pid'] : "0";?>" />
				</form>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php  $thisurl = ADMIN_URL.'ads.php'; ?>
<script type="text/javascript">
<!--
	function run(imgs){
		$('#USERINFO #img_avatar').attr('src','<?php echo SITE_URL;?>'+imgs);
		$('input[name="ad_img"]').val(imgs);
	}

	function ajax_daili_upload_ads(){
		   var fromAttr        = new Object();  //
		   var form      = document.forms['USERINFO']; //
		   if(form){
				fromAttr = getFromAttributes(form);
		   }else{
				alert("检查是否存在表单REGISTER");
				return false;
		   }
		   createwindow();
		   $.ajax({
			   type: "POST",
			   url: "daili.php?action=ajax_daili_upload_ads",
			   data: "fromAttr=" + $.toJSON(fromAttr),
			   dataType: "json",
			   success: function(data){
				   removewindow();
					if(data.error==3){
						window.location.href=SITE_URL+'daili.php?act=login';
					}else if(data.error==0){
						//JqueryDialog.Open('系统提醒你','<br />保存成功！',250,50);
						window.location.reload();
					}else{
						JqueryDialog.Open('系统提醒你','<br />'+data.message,260,50);
					}
			   }
			});
	}

	$('#tids').change(function(){
		 text =  $("#tids").find("option:selected").text(); 
		 if(text=="商品分类广告"){
		 	$('input[name="type"]').val('gc');
			$('.catelist').css('display','block');
		 }else{
			$('.catelist').css('display','none');
		 }
	});

-->
</script>