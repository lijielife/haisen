<form action="" method="" name="CONSIGNEE_ADDRESS<?php echo $rt['userress']['address_id'];?>" id="CONSIGNEE_ADDRESS<?php echo $rt['userress']['address_id'];?>" >
    <table border="0" style="background:#FFFFFF; text-align:right; line-height:22px;" cellpadding="1" cellspacing="4">
  <tr>
    <td><b class="cr2">*</b> 姓名：</td>
    <td align="left"><input name="consignee" class="pw"  value="<?php echo isset($rt['userress']['consignee']) ? $rt['userress']['consignee'] : "";?>" type="text"></td>
  </tr>
   <tr>
    <td width="90"><u class="cr2">*</u> 性别：</td>
    <td align="left"> 
	  <label><input type="radio" name="sex" value="1" <?php echo isset($rt['userress']['sex'])&&$rt['userress']['sex']=='1' ? ' checked="checked"' : "";?>/> 男 &nbsp;</label>
      <label><input type="radio" name="sex" value="2" <?php echo isset($rt['userress']['sex'])&&$rt['userress']['sex']=='2' ? ' checked="checked"' : "";?>/> 女&nbsp;</label>
      <label><input type="radio" name="sex" value="0" <?php echo !isset($rt['userress']['sex'])||$rt['userress']['sex']=='0' ? ' checked="checked"' : "";?>/> 保密</label></td>
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
	
	<select <?php echo !isset($rt['userress']['district'])? 'style="display: none;"':"";?> name="district" id="select_district" onchange="ger_ress_copy('4',this,'select_town')">
	<option value="0">选择区</option>	
	<?php 
	if(!empty($rt['district'])){
	foreach($rt['district'] as $row){
	?>
	<option value="<?php echo $row['region_id'];?>" <?php echo $rt['userress']['district']==$row['region_id']? 'selected="selected"' :"";?>><?php echo $row['region_name'];?></option>	
	<?php } } ?>													
	</select>
	
	<select <?php echo !isset($dbtype['town'])? 'style="display: none;"':"";?> name="town" id="select_town" onchange="ger_ress_copy('5',this,'select_village')">
	<option value="0">选择城镇</option>	
	<?php 
	if(!empty($dbress['town'])){
	foreach($dbress['town'] as $row){
	?>
	<option value="<?php echo $row['region_id'];?>" <?php echo $dbtype['town']==$row['region_id']? 'selected="selected"' :"";?>><?php echo $row['region_name'];?></option>	
	<?php } } ?>													
	</select>
	
	<select <?php echo !isset($dbtype['village'])? 'style="display: none;"':"";?> name="village" id="select_village" onchange="ger_peisong(this,'select_peisong')">
	<option value="0">选择村</option>	
	<?php 
	if(!empty($dbress['village'])){
	foreach($dbress['village'] as $row){
	?>
	<option value="<?php echo $row['region_id'];?>" <?php echo $dbtype['village']==$row['region_id']? 'selected="selected"' :"";?>><?php echo $row['region_name'];?></option>	
	<?php } } ?>													
	</select>
	
	<span class="shipping">
	<select <?php echo !isset($dbtype['peisong'])? 'style="display: none;"':"";?> name="shop_id" id="select_peisong">
	<option value="0" >选择配送店</option>	
	<?php 
	if(!empty($dbress['peisong'])){
	foreach($dbress['peisong'] as $row){
	?>
	<option value="<?php echo $row['uid'];?>" <?php echo $dbtype['peisong']==$row['uid']? 'selected="selected"' :"";?>><?php echo $row['user_name'];?></option>	
	<?php } } ?>													
	</select>
	</span>
</td>
  </tr>
  <tr>
    <td valign="top"><b class="cr2">*</b> 地址：</td>
    <td align="left"><input name="address" class="pw" value="<?php echo isset($rt['userress']['address']) ? $rt['userress']['address'] : "";?>" type="text"/>
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
    <td align="left"><input type="text" class="pw" name="mobile" value="<?php echo isset($rt['userress']['mobile']) ? $rt['userress']['mobile'] : "";?>"/>
    <br /><em>(请认真填写您的手机或电话号码，以便我们发货时可以联系您。)</em></td>
  </tr>
    <tr>
    <td>配送方式：</td>
	<td align="left"> 
	  <label><input type="radio" name="shoppingname" value="1" <?php echo isset($rt['userress']['shoppingname'])&&$rt['userress']['shoppingname']=='1' ? ' checked="checked"' : "";?>/> 门店自提 &nbsp;</label>
      <label><input type="radio" name="shoppingname" value="2" <?php echo isset($rt['userress']['shoppingname'])&&$rt['userress']['shoppingname']=='2' ? ' checked="checked"' : "";?>/> 送货上门 &nbsp;</label>
	</td>
  </tr>
   <tr>
    <td>送货时段：</td>
    <td align="left">
	<select name="shoppingtime">
	<option value="0">--选择时段--</option>		
	<option value="7:00-9:00"<?php echo isset($rt['userress']['shoppingtime'])&&$rt['userress']['shoppingtime']=='7:00-9:00' ? ' selected="selected""' : "";?>>7:00-9:00</option>		
	<option value="11:00-14:00"<?php echo isset($rt['userress']['shoppingtime'])&&$rt['userress']['shoppingtime']=='11:00-14:00' ? ' selected="selected""' : "";?>>11:00-14:00</option>		
	<option value="17:00-21:00"<?php echo isset($rt['userress']['shoppingtime'])&&$rt['userress']['shoppingtime']=='17:00-21:00' ? ' selected="selected""' : "";?>>17:00-21:00</option>													
	</select>
	</td>
  </tr>
  <tr>
    <td valign="top"><b class="cr2">*</b> 固定电话：</td>
    <td align="left"><input type="text" class="pw" name="tel" value="<?php echo isset($rt['userress']['tel']) ? $rt['userress']['tel'] : "";?>"/> <br /><em> 输入示例: 010-64076407</em></td>
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
</script>
</form>
