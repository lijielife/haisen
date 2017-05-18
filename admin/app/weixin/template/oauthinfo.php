<div class="contentbox">
<form>
<table cellspacing="2" cellpadding="5" width="100%">
	 <tr>
		<th colspan="2" align="left"><span style="float:left"><?php echo $oid>0 ? '修改' : '添加';?>oauth</span><span style="float:right"><a href="weixin.php?type=oauth">返回oauth管理</a></span></th>
	</tr>
	<tr>
    <td class="label">名称:</td>
    <td><input name="name" id="name"  maxlength="60" size="30" value="<?php echo isset($rt['name']) ? $rt['name'] : '';?>" type="text"><span class="require-field">*</span><span class="cat_name_mes"></span></td>
  </tr>
  <tr>
    <td class="label">网址:</td>
    <td><textarea name="content" id ="content" cols="60" rows="2"><?php echo isset($rt['contents']) ? $rt['contents'] : '';?></textarea><span class="require-field">*</span><span class="cat_content_mes"></span></td>
  </tr>
  
  <tr>
    <td colspan="2" align="center"><br>
	  <input value="<?php echo isset($rt['oid']) ? $rt['oid'] : '';?>" type="hidden" class="cat_id"/>
	   <input value="<?php echo $oid>0 ? 'oauthedit' : 'oauthadd';?>" type="hidden" class="action"/>
      <input class="new_save" value=" 确定 " type="button">
      <input class="button" value=" 重置 " type="reset">
    </td>
  </tr>
  </table>
 </form>
</div>
<?php  $thisurl = ADMIN_URL.'con_new.php'; ?>
<script type="text/javascript">
<!--
jQuery(document).ready(function($){
	 $('.new_save').click(function(){
		cname = $('#name').val();
		content = $('#content').val();
		if(typeof(cname)=="undefined" || cname==""){
		    $('.cat_name_mes').html("名称不能为空！");
			$('.cat_name_mes').css('color','#FE0000');
			return false;
		}
		if(typeof(content)=="undefined" || content==""){
		    $('.cat_content_mes').html("网址不能为空！");
			$('.cat_content_mes').css('color','#FE0000');
			return false;
		}
		cid = $('.cat_id').val();
		action = $('.action').val(); 
		$.post('<?php echo $thisurl;?>',{oid:cid,name:cname,content:content,action:action},function(data){
			if(data !=""){ 
				$('.cat_name_mes').html(data);
				$('.cat_name_mes').css('color','#FE0000');
			}else{
				$('.cat_name_mes').html("");
				//$('#form1').submit();
			}
		});
		return false;
	}); 
});
-->
</script>