<style type="text/css">
.contentbox{ background-color:#FEE4B3}
.contentbox table th{ font-size:12px; text-align:center}
.contentbox table .label{ font-size:12px; text-align:right; font-weight:bold; background-color:#FFD99A}
.tx{ width:350px; border:1px solid #ccc; height:28px; line-height:28px}
.tx2{ width:120px; border:1px solid #ccc; height:28px; line-height:28px}
</style>
<div class="contentbox" style="height:400px; overflow:hidden; overflow-y:auto">
<form id="form1" name="form1" method="post" action="">
    <table cellspacing="2" cellpadding="5" width="100%">
	  <tr>
		<td class="label" width="20%">名称:</td>
		<td><input class="tx" name="img_name" id="img_name"  type="text" size="43" value="<?php echo isset($rt['img_name']) ? $rt['img_name'] : '';?>"><span class="require-field">*</span></td>
	  </tr>
	  <?php if(isset($rt['img_url'])&&!empty($rt['img_url'])){?>
	  <tr class="showimg">
	  	<td class="label">预览：</td>
		<td>
		<img src="../<?php echo $rt['img_url'];?>" alt="LOGO" width="100"/>
		</td>
	  </tr>
	  <?php } ?>
	  <tr>
		<td class="label">图片:</td>
		<td>
		  <input name="img_url" id="uploadfiles" type="hidden" value="<?php echo isset($rt['img_url']) ? $rt['img_url'] : '';?>" size="43"/>
		  <br />
		  <iframe id="iframe_t" name="iframe_t" border="0" src="../_admin/upload.php?action=<?php echo isset($rt['img_url'])&&!empty($rt['img_url'])? 'show' : '';?>&ty=uploadfiles&tyy=shop&files=<?php echo isset($rt['img_url']) ? $rt['img_url'] : '';?>" scrolling="no" width="350" frameborder="0" height="25"></iframe><span class="uploadfiles_mes"></span>
		</td>
	  </tr>

	  <tr>
		<td class="label">状态:</td>
		<td><input id="is_show" name="is_show" value="1" type="checkbox" <?php echo !isset($rt['is_show']) || $rt['is_show']==1 ? 'checked="checked"' : '';?>>审核</td>
	  </tr>
	  <tr>

		<td class="label">备注:</td>
		<td><textarea name="remark" id="remark" style="width:350px; height: 65px; overflow: auto;"><?php echo isset($rt['remark']) ? $rt['remark'] : '';?></textarea></td>
	  </tr>
	  <tr>
		<td class="label"></td>
		<td>
		<input  value=" 确定操作 " type="submit" style="padding:3px; cursor:pointer" onclick="return checkfrom()">
		</td>
	  </tr>
	 </table>
	 </form>
</div>
<script type="text/javascript">
function checkfrom(){
	na = $('#img_name').val();
	if(typeof(na)=='undefined' || na==""){
		alert("名称不能为空！");
		return false;
	}
		
	fi = $('#uploadfiles').val();
	if(typeof(fi)=='undefined' || fi==""){
		alert("请先上传图片！");
		return false;
	}
	return true;
}

</script>