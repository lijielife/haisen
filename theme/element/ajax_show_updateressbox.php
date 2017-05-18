<form action="" method="" name="CONSIGNEE_ADDRESS<?php echo $rt['userress']['address_id'];?>" id="CONSIGNEE_ADDRESS<?php echo $rt['userress']['address_id'];?>" >
    <table border="0" style="background:#FFFFFF; text-align:right; line-height:19px;" cellpadding="1" cellspacing="4">
  <tr>
    <td><b class="cr2">*</b> 姓名：</td>
    <td align="left"><input name="consignee" class="pw"  value="<?php echo isset($rt['userress']['consignee']) ? $rt['userress']['consignee'] : "";?>" type="text"></td>
  </tr>
   <tr>
    <td width="65"><u class="cr2">*</u> 性别：</td>
    <td align="left"> 
	  <label><input type="radio" name="sex" value="1" <?php echo isset($rt['userress']['sex'])&&$rt['userress']['sex']=='1' ? ' checked="checked"' : "";?>/> 男 &nbsp;</label>
      <label><input type="radio" name="sex" value="2" <?php echo isset($rt['userress']['sex'])&&$rt['userress']['sex']=='2' ? ' checked="checked"' : "";?>/> 女&nbsp;</label>
      <label><input type="radio" name="sex" value="0" <?php echo !isset($rt['userress']['sex'])||$rt['userress']['sex']=='0' ? ' checked="checked"' : "";?>/> 保密</label></td>
  </tr>
    <tr>
    <td>配送方式：</td>
	<td align="left"> 
	  <?php
		if(!empty($rt['shippinglist'])){
		foreach($rt['shippinglist'] as $row){
		?>
		<label style="display:block; width:80px; float:left"><input name="shipping_id" id="shipping_id" value="<?php echo $row['shipping_id'];?>" type="radio"  onclick="return jisuan_shopping('<?php echo $row['shipping_id'];?>')"<?php echo $row['shipping_id']==$rt['userress']['shoppingname'] ? ' checked="checked"' : '';?> ><?php echo $row['shipping_name'];?></label>
		<?php } ?>
	  </td>
		<?php } else{ echo '<script> location.href="'.SITE_URL.'mycart.php";</script>'; exit; } ?>
  </tr>
  <tr>
    <td><b class="cr2">*</b> 地区：</td>
    <td align="left">  
<?php //$this->element('address',array('resslist'=>$rt['province'],'dbtype'=>array('province'=>$rt['userress']['province'],'city'=>$rt['userress']['city'],'district'=>$rt['userress']['district']),'dbress'=>array('city'=>$rt['city'],'district'=>$rt['district'])));
?>
<select name="province" id="select_province" onchange="ger_ress_copy('2',this,'select_city')">
	<option value="0">选择省</option>
	<?php 
	if(!empty($rt['province'])){
	foreach($rt['province'] as $row){
	?>
	<option value="<?php echo $row['region_id'];?>" <?php echo $rt['userress']['province']==$row['region_id']? 'selected="selected"' :"";?>><?php echo $row['region_name'];?></option>	
	<?php } } ?>													
</select>
	
<select name="city" id="select_city" onchange="ger_ress_copy('3',this,'select_district')">
	<option value="0">选择城市</option>
	<?php
	if(!empty($rt['city'])){
	foreach($rt['city'] as $row){
	?>
	<option value="<?php echo $row['region_id'];?>" <?php echo $rt['userress']['city']==$row['region_id']? 'selected="selected"' :"";?>><?php echo $row['region_name'];?></option>	
	<?php } } ?>	
</select>
	
<select <?php echo !isset($rt['userress']['district'])? 'style="display: none;"':"";?> name="district" id="select_district">
	<option value="0">选择区</option>	
	<?php 
	if(!empty($rt['district'])){
	foreach($rt['district'] as $row){
	?>
	<option value="<?php echo $row['region_id'];?>" <?php echo $rt['userress']['district']==$row['region_id']? 'selected="selected"' :"";?>><?php echo $row['region_name'];?></option>	
	<?php } } ?>													
</select>
	
<!--<select <?php echo !isset($rt['userress']['town'])? 'style="display: none;"':"";?> name="town" id="select_town" onchange="ger_ress_copy('5',this,'select_village')">
	<option value="0">选择城镇</option>	
	<?php 
	if(!empty($rt['town'])){
	foreach($rt['town'] as $row){
	?>
	<option value="<?php echo $row['region_id'];?>" <?php echo $rt['userress']['town']==$row['region_id']? 'selected="selected"' :"";?>><?php echo $row['region_name'];?></option>	
	<?php } } ?>													
</select>
	
<select <?php echo !isset($rt['userress']['village'])? 'style="display: none;"':"";?> name="village" id="select_village" onchange="get_peisong(this,'select_peisong')">
	<option value="0">选择村</option>	
	<?php 
	if(!empty($rt['village'])){
	foreach($rt['village'] as $row){
	?>
	<option value="<?php echo $row['region_id'];?>" <?php echo $rt['userress']['village']==$row['region_id']? 'selected="selected"' :"";?>><?php echo $row['region_name'];?></option>	
	<?php } } ?>													
</select>
	
<span class="shipping">
<select <?php echo !isset($rt['userress']['shop_id'])? 'style="display: none;"':"";?> name="shop_id" id="select_peisong">
	<option value="0" >选择配送店</option>	
	<?php 
	if(!empty($rt['peisong'])){
	foreach($rt['peisong'] as $row){
	?>
	<option value="<?php echo $row['user_id'];?>" <?php echo $rt['userress']['shop_id']==$row['user_id']? 'selected="selected"' :"";?>><?php echo $row['user_name'].'&nbsp;&nbsp;&nbsp;'.'&nbsp;&nbsp;&nbsp;'.'地址:'.$row['address'] ;?></option>	
	<?php } } ?>													
</select>
</span>-->
</td>
  </tr>
  <tr>
    <td valign="top"><b class="cr2">*</b> 地址：</td>
    <td align="left" style="line-height:18px"><input name="address" class="pw" style="width:210px" value="<?php echo isset($rt['userress']['address']) ? $rt['userress']['address'] : "";?>" type="text"/>
    <br /><em>请详细填写所在的省、市、乡、镇、村的名称及街道门牌号码。</em></td>
  </tr>
  <tr>
    <td><b class="cr2">*</b> 邮箱：</td>
    <td align="left"><input type="text" class="pw" name="email" value="<?php echo isset($rt['userress']['email']) ? $rt['userress']['email'] : "";?>"/></td>
  </tr>
  <tr>
    <td><b class="cr2">*</b> 邮编：</td>
    <td align="left"><input type="text" class="pw" name="zipcode" value="<?php echo isset($rt['userress']['zipcode']) ? $rt['userress']['zipcode'] : "";?>"/></td>
  </tr>
  <tr>
    <td valign="top"> 手机：</td>
    <td align="left" style="line-height:18px"><input type="text" class="pw" name="mobile" value="<?php echo isset($rt['userress']['mobile']) ? $rt['userress']['mobile'] : "";?>"/>
    <br /><em>(请认真填写您的手机或电话号码，以便我们发货时可以联系您。)</em></td>
  </tr>
  
  <tr>
    <td valign="top"><b class="cr2">*</b> 固定电话：</td>
    <td align="left"><input type="text" class="pw" name="tel" value="<?php echo isset($rt['userress']['tel']) ? $rt['userress']['tel'] : "";?>"/> <br /><em> 输入示例: 020-64076407</em></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left"><input type="button" value=""  style=" overflow:hidden ; border:none; background:none;cursor:pointer; background:url(<?php echo SITE_URL;?>theme/images/add_btu.gif) no-repeat 0 0 ; width:140px; height:26px;" onclick="ressinfoop('<?php echo $rt['userress']['address_id'];?>','update','CONSIGNEE_ADDRESS<?php echo $rt['userress']['address_id'];?>')"/></td>
  </tr>
</table>
<script language="javascript" type="text/javascript">
$('input[name="shoppingname"]').live('click',function(){
	var ps= $(this).val();
	if(ps=='1'){
	$('.shipping').show();
	}else{
	$('.shipping').hide();
	}
});
function ger_ress_copy(type,obj,seobj){
	parent_id = $(obj).val();
	if(parent_id=="" || typeof(parent_id)=='undefined'){ return false; }
	$.post(SITE_URL+'user.php',{action:'get_ress',type:type,parent_id:parent_id},function(data){
		if(data!=""){
			$(obj).parent().find('#'+seobj).html(data);
			if(type==5){ //村
				$(obj).parent().find('#'+seobj).show();
				$(obj).parent().find('#select_peisong').hide();
			}else if(type==4){ //城镇
				$(obj).parent().find('#select_village').hide();
				$(obj).parent().find('#select_village').html('<option value="0" >选择村</option>');
				$(obj).parent().find('#select_peisong').hide();
				
				$(obj).parent().find('#select_town').show();
				//$(obj).parent().find('#select_town').html("");
			}else if(type==3){ //区
				$(obj).parent().find('#select_peisong').hide();
				$(obj).parent().find('#select_peisong').html('<option value="0" >选择配送店</option>');
				
				$(obj).parent().find('#select_village').hide();
				$(obj).parent().find('#select_village').html('<option value="0" >选择村</option>');
				
				$(obj).parent().find('#select_town').hide();
				$(obj).parent().find('#select_town').html('<option value="0" >选择城镇</option>');
				
				$(obj).parent().find('#select_district').show();
				//$(obj).parent().find('#select_district').html("");
				
			}else if(type==2){ //市
				$(obj).parent().find('#select_peisong').hide();
				$(obj).parent().find('#select_peisong').html('<option value="0" >选择配送店</option>');
				
				$(obj).parent().find('#select_village').hide();
				$(obj).parent().find('#select_village').html('<option value="0" >选择村</option>');
				
				$(obj).parent().find('#select_town').hide();
				$(obj).parent().find('#select_town').html('<option value="0" >选择城镇</option>');
				
				$(obj).parent().find('#select_district').hide();
				$(obj).parent().find('#select_district').html('<option value="0" >选择区</option>');
			}
			
		}else{
			alert(data);
		}
	});
}
//获取配送店
function get_peisong(obj,seobj){
	village_id = $(obj).val();
	town_id = $(obj).parent().find('select[name="town"]').val();
	district_id = $(obj).parent().find('select[name="district"]').val();

	if(village_id=="" || typeof(village_id)=='undefined'){ return false; }
	$.post(SITE_URL+'user.php',{action:'get_peisong',village_id:village_id,town_id:town_id,district_id:district_id,type:'ajax'},function(data){
		if(data!=""){ 
			$(obj).parent().find('#'+seobj).html(data);
			
			$(obj).parent().find('#'+seobj).show();
			
		}else{
			alert(data);
		}
	});
}
</script>
</form>