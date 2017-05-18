<style type="text/css">
.contentbox{ background-color:#FEE4B3; font-size:12px}
.contentbox table th{ font-size:12px; text-align:center}
.contentbox table .label{ font-size:12px; text-align:right; font-weight:bold; background-color:#FFD99A}
.tx{ width:350px; border:1px solid #ccc; height:28px; line-height:28px}
.tx2{ width:120px; border:1px solid #ccc; height:28px; line-height:28px}

</style>
<div class="contentbox" style="overflow-x:hidden; overflow-y:auto; height:500px">
<form id="form1" name="form1" method="post" action="">
<table cellspacing="2" cellpadding="5" width="100%">
	<tr>
    <td class="label" width="150">分类名称:</td>
    <td><input name="cat_name" id="cat_name"  maxlength="60" size="30" value="<?php echo isset($rt['cat_name']) ? $rt['cat_name'] : '';?>" type="text"><span class="require-field">*</span><span class="cat_name_mes"></span></td>
  </tr>
  <tr>
    <td class="label">上级分类:</td>
    <td>
      <select name="parent_id">
	    <option value="0">顶级分类</option>
		<?php 
		if(!empty($catelist)){
		 foreach($catelist as $row){ 
		 	if($type=='edit' && $rt['cat_name']==$row['name']) continue;
		?>
        <option value="<?php echo $row['id'];?>"  <?php echo isset($rt['parent_id'])&&$row['id']==$rt['parent_id'] ? 'selected="selected"' : '';?>><?php echo $row['name'];?></option>
			<?php 
				if(!empty($row['cat_id'])){
				foreach($row['cat_id'] as $rows){ 
					if($type=='edit' && $rt['cat_name']==$rows['name']) continue;
					?>
					<option value="<?php echo $rows['id'];?>"  <?php echo isset($rt['parent_id'])&&$rows['id']==$rt['parent_id'] ? 'selected="selected"' : '';?>>&nbsp;&nbsp;<?php echo $rows['name'];?></option>
					<?php 
					if(!empty($rows['cat_id'])){
					foreach($rows['cat_id'] as $rowss){ 
						if($type=='edit' && $rt['cat_name']==$rowss['name']) continue;
					?>
							<option value="<?php echo $rowss['id'];?>"  <?php echo isset($rt['parent_id'])&&$rowss['id']==$rt['parent_id'] ? 'selected="selected"' : '';?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowss['name'];?></option>
							
						<?php 
						if(!empty($rows['cat_id'])){
						foreach($rowss['cat_id'] as $rowsss){ 
							if($type=='edit' && $rt['cat_name']==$rowsss['name']) continue;
						?>
								<option value="<?php echo $rowsss['id'];?>"  <?php echo isset($rt['parent_id'])&&$rowsss['id']==$rt['parent_id'] ? 'selected="selected"' : '';?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowsss['name'];?></option>
								
						<?php
						}//end foreach
						}//end if
						?>
							
							
							
					<?php
					}//end foreach
					}//end if
					?>
			<?php
				}//end foreach
		 		} // end if
			?>
		<?php
		 }//end foreach
		} ?>
	 </select>
    </td>
  </tr>
   <tr>
  <td class="label">排序:</td>
  <td><input name="sort_order" maxlength="60" size="50" value="<?php echo isset($rt['sort_order']) ? $rt['sort_order'] : '50';?>" type="text"></td>
  </tr>

  <tr>
    <tr>
    <td class="label">状态设置:</td>
    <td>
      <label>
		<input name="is_show" value="1" <?php echo !isset($rt['is_show']) || $rt['is_show']==1 ? 'checked="checked"' : '';?> type="radio"> 是 </label>
		 <label><input name="is_show" value="0" <?php echo isset($rt['is_show'])&&$rt['is_show']==0 ? 'checked="checked"' : '';?>type="radio"> 否     </label>  
    </td>
  </tr>
  <tr>
    <td class="label">分类标签:</td>
    <td><input name="keywords" maxlength="60" size="50" value="<?php echo isset($rt['keywords']) ? $rt['keywords'] : '';?>" type="text">
    <br><span style="display: block;" id="notice_keywords">标签为选填项，多个标签用’,‘分隔开</span>
    </td>
  </tr>
  <tr>
  	<td class="label">&nbsp;</td>
    <td align="left"><br>
      <input class="new_save" value=" 确定 " type="submit" style="cursor:pointer">
      <input class="button" value=" 重置 " type="reset">
    </td>
  </tr>
  </table>
 </form>
</div>
<script type="text/javascript">
<!--
//jQuery(document).ready(function($){
	$('.new_save').click(function(){
		cname = $('#cat_name').val();
		if(typeof(cname)=="undefined" || cname==""){
		    $('.cat_name_mes').html("名称不能为空！");
			$('.cat_name_mes').css('color','#FE0000');
			return false;
		}
		return true;
	});
	

//});
-->
</script>