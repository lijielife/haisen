<div class="main">
	<div class="mainbox">
		<div class="lefts">
			<?php $this->element('dailimenu');?>
		</div>
		<div class="rights">
			<div style="background:url(<?php echo $this->img('houtai_31.png');?>) 22px center no-repeat;height:35px; border-bottom:1px solid #ddd;"><p style="font-size:14px;font-family:微软雅黑;  line-height:20px; padding:7px;padding-left:30px;  text-align:left">站点配置</p></div>
	<form name="USERINFO" id="USERINFO" action="" method="post" novalidate="novalidate">
	<ul class="s_shuru">
        <li style="height:110px;">
        	<p>站点LOGO：
            </p>
            <span class="s_shuru_1">
		      <table width="100%" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td align="left">
						<img id="img_avatar" src="<?php echo !empty($rt['info']['logo']) ? SITE_URL.$rt['info']['logo'] : SITE_URL.$siteinfo['site_logo'];?>" alt="" style="border:2px solid #ccc; width:100px;" />
						</td>
						<td align="left" valign="bottom">
						<input name="logo" id="logo" type="hidden" value="<?php echo isset($rt['info']['logo'])? $rt['info']['logo'] : $siteinfo['site_logo'];?>"><iframe id="iframe_t" name="iframe_t" border="0" src="<?php echo SITE_URL;?>uploadajax/" scrolling="no" width="140" frameborder="0" height="36"></iframe>
				<p style="color:#FF0000; font-size:12px; width:90%; text-align:left; padding-left:10px;">(上传大小不能超过500kb)</p>
						</td>
					</tr>
				</table>
			</span>
        </li>
        
         <li>
        	<p>站点名称：
            </p>
            <span class="s_shuru_1">
            <input width="72%" type="text" id="sitename" name="sitename" value="<?php echo isset($rt['info']['sitename'])&&!empty($rt['info']['sitename']) ? $rt['info']['sitename'] : $siteinfo['site_name'];?>" size="25" class="inputBg inp_jgxg" style="width:183px; height:24px; font-family:'微软雅黑'; ">
           	</span>
        </li>
         <li>
        	<p>站点标题：
            </p>
            <span class="s_shuru_1">
            <input width="72%" type="text" name="sitetitle" id="sitetitle" value="<?php echo isset($rt['info']['sitetitle'])&&!empty($rt['info']['sitetitle']) ? $rt['info']['sitetitle'] : $siteinfo['site_title'];?>" size="25" class="inputBg inp_jgxg" style="width:183px; height:24px;font-family:'微软雅黑'; ">
           	</span>
        </li>
         <li>
        	<p>Meta关键字：
            </p>
            <span class="s_shuru_1">
            <input width="72%" type="text" name="metakey" id="metakey" value="<?php echo isset($rt['info']['metakey'])&&!empty($rt['info']['metakey']) ? $rt['info']['mobile_phone'] : $siteinfo['metakeyword'];?>" size="25" class="inputBg inp_jgxg" style="width:183px; height:24px;font-family:'微软雅黑'; ">
           	</span>
        </li>
         <li>
        	<p>Meta描述：
            </p>
            <span class="s_shuru_1">
         <input width="72%" type="text" id="metadesc" name="metadesc" value="<?php echo isset($rt['info']['metadesc'])&&!empty($rt['info']['metadesc']) ? $rt['info']['metadesc'] : $siteinfo['metadesc'];?>" size="25" class="inputBg inp_jgxg" style="width:183px; height:24px;">
           	</span>
        </li>
          
		<li>
        	<p>在线客服代码：
            </p>
            <span style="float:left; padding-top:3px;">
<textarea style="width:366px;height:75px;" class="inputBg inp_jgxg" name="kefucode"><?php echo isset($rt['info']['kefucode'])&&!empty($rt['info']['kefucode']) ? $rt['info']['kefucode'] : "";?></textarea>&nbsp;<a href="http://www.kuaishang.cn/" target="_blank">打开网站下载客户端获取代码</a>
           	</span>
        </li>
    </ul>
    <div style="clear:both;"></div>
    <div style="padding-left:97px; padding-top:18px; padding-bottom:38px; text-align:left">
          <input name="submit" type="button" value="保存" onclick="update_daili_siteset();" class="gree" style="cursor:pointer; padding:2px">
          </div>
</form>
<script type="text/javascript">
function run(imgs){
	$('#USERINFO #img_avatar').attr('src','<?php echo SITE_URL;?>'+imgs);
	$('input[name="logo"]').val(imgs);
}
function update_daili_siteset(){
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
		   url: "daili.php?action=ajax_update_daili_siteset",
		   data: "fromAttr=" + $.toJSON(fromAttr),
		   dataType: "json",
		   success: function(data){
			   removewindow();
		   		if(data.error==3){
					window.location.href=SITE_URL+'daili.php?act=login';
				}else if(data.error==0){
					JqueryDialog.Open('系统提醒你','<br />保存成功！',250,50);
				}else{
					JqueryDialog.Open('系统提醒你','<br />'+data.message,260,50);
				}
		   }
		});
}

</script>				
		</div>
		<div class="clear"></div>
	</div>
</div>