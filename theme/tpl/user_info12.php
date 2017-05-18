<div id="wrap">
	<div class="clear7"></div>
	
<?php $this->element('user_menu');?>
    <div class="m_right" >
		<h2 class="con_title">配送店联系人资料</h2>
    	<div class="memberzl" style="height:auto">
       <form name="USERINFO" id="USERINFO" action="" method="post">
         	<p>基本信息</p>
           	<table width="550" border="0" cellpadding="0" cellspacing="0" style="line-height:35px">
			<tr>
				<td  align="center"><img id="img_avatar" src="<?php echo isset($rt['userinfo']['avatar'])&&!empty($rt['userinfo']['avatar']) ? SITE_URL.$rt['userinfo']['avatar'] : $this->img('neiy-6_06.png');?>" width="65" alt="" /></td>
				<td width="72%" align="left" bgcolor="#FFFFFF" style="padding-left:10px;"><input name="avatar" id="avatar" type="hidden" value="<?php echo isset($rt['userinfo']['avatar'])? $rt['userinfo']['avatar'] : "";?>">
				<iframe id="iframe_t" name="iframe_t" border="0" src="<?php echo SITE_URL;?>admin/upload.php?action=<?php echo isset($rt['userinfo']['avatar'])&&!empty($rt['userinfo']['avatar'])? 'show' : '';?>&ty=avatar&files=<?php echo isset($rt['userinfo']['avatar']) ? $rt['userinfo']['avatar'] : '';?>" scrolling="no" width="445" frameborder="0" height="25"></iframe>
				</td>
			</tr>
				
				
				
				
				<tr>
    <td width="90" align="center"><b class="cr2">*</b> 公司名称：</td>
	<td><input type="text" value="<?php echo  $rt['userinfo']['user_name'];?>" name="user_name"  class="pw"/>
	</td>
  <!--  <td><input type="text" value="<?php echo isset($rt['userress']['company'])&&!empty($rt['userress']['company']) ? $rt['userress']['company'] : "";?>" name="company"  class="pw"/>-->
</td>
  </tr>
   <tr>
    <td width="90" align="center"><b class="cr2">*</b> 公司执照：</td>
    <td><input type="text" value="<?php echo isset($rt['userress']['license'])&&!empty($rt['userress']['license']) ? $rt['userress']['license'] : "";?>" name="license"  class="pw"/>
  </tr>
  <tr>
    <td width="90" align="center"><b class="cr2">*</b> 代理品牌：</td>
    <td><input type="text" value="<?php echo isset($rt['userress']['brand'])&&!empty($rt['userress']['brand']) ? $rt['userress']['brand'] : "";?>" name="brand"  class="pw"/>
</td>
  </tr>
  
  <tr>
    <td width="90" align="center"><b class="cr2">*</b> 真实姓名：</td>
    <td><input type="text" value="<?php echo $rt['userress']['consignee'];?>" name="consignee"  class="pw"/>
领奖时要验证与姓名相同的身份证</td>
  </tr>
				
				
				
  <tr>
    <td width="70" align="center"><b class="cr2">*</b> 性别：</td>
    <td> 
      <input name="sex" value="0" <?php echo !isset($rt['userinfo']['sex'])||$rt['userinfo']['sex']==0 ? 'checked="checked"' : "";?> type="radio">
			保密&nbsp;&nbsp;
			<input name="sex" value="1" type="radio" <?php echo isset($rt['userinfo']['sex'])&&$rt['userinfo']['sex']==1 ? 'checked="checked"' : "";?>/>
			男&nbsp;&nbsp;
			<input name="sex" value="2" type="radio" <?php echo isset($rt['userinfo']['sex'])&&$rt['userinfo']['sex']==2 ? 'checked="checked"' : "";?>/>
		女&nbsp;&nbsp; 
	  </td>
  </tr>
  <tr>
		<td align="center"><b class="cr2">*</b> 生日： </td>
		<td align="left"> 
		<?php 
		list($yes,$mouth,$day) = isset($rt['userinfo']['birthday'])&&!empty($rt['userinfo']['birthday']) ? explode('-',$rt['userinfo']['birthday']) : array('0000','00','00');
		?>
		<select name="yes">
		<?php 
		$maxyes= date('Y');
		for($i=$maxyes;$i>=1955;$i--){
			echo '<option value="'.$i.'"'.($i==$yes ? 'selected="selected"' : "").'>'.$i.'</option>';
		}
		?>
		</select>
		<select name="mouth">
		<?php 
		for($i=12;$i>=1;$i--){
			$i = sprintf('%02d',$i);
			echo '<option value="'.$i.'"'.($i==$mouth ? 'selected="selected"' : "").'>'.$i.'</option>';
		}
		?>
		</select>
		<select name="day">
		<?php 
		for($i=31;$i>=1;$i--){
			$i = sprintf('%02d',$i);
			echo '<option value="'.$i.'"'.($i==$day ? 'selected="selected"' : "").'>'.$i.'</option>';
		}
		?>
		</select>
		生日当天购物，有生日礼物赠送</td>
	</tr>
 <!-- <tr>
    <td align="center"><b class="cr2">*</b> 昵称：</td>
    <td><input type="text" value="<?php echo isset($rt['userinfo']['nickname'])&&!empty($rt['userinfo']['nickname']) ? $rt['userinfo']['nickname'] : "";?>" name="nickname"  class="pw"/></td>
  </tr>-->
  <tr>
    <td align="center"><b class="cr2">*</b> 邮箱：</td>
    <td><input type="text" value="<?php echo isset($rt['userinfo']['email'])&&!empty($rt['userinfo']['email']) ? $rt['userinfo']['email'] : "";?>" name="email"  class="pw"/>
领奖时要验证邮箱中奖邮件</td>
  </tr>
  <tr>
    <td align="center"><b class="cr2">*</b> 手机：</td>
    <td><input type="text" value="<?php echo isset($rt['userinfo']['mobile_phone'])&&!empty($rt['userinfo']['mobile_phone']) ? $rt['userinfo']['mobile_phone'] : "";?>" name="mobile_phone"  class="pw"/>
    领奖时要验证中奖手机短信</td>
  </tr>
    <tr>
    <td align="center"><b class="cr2">*</b> 电话：</td>
    <td><input type="text" value="<?php echo isset($rt['userinfo']['home_phone'])&&!empty($rt['userinfo']['home_phone']) ? $rt['userinfo']['home_phone'] : "";?>" name="home_phone"  class="pw"/></td>
  </tr>
</table>

			<p>提货点信息：</p>
<table width="700" border="0" cellpadding="0" cellspacing="0" style="line-height:35px">
 
  
  <tr>
    <td align="right"><b class="cr2">*</b>提货地址：</td>
    <td >
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
	<option value="0">选择社区/县</option>	
	<?php 
	if(!empty($rt['district'])){
	foreach($rt['district'] as $row){
	?>
	<option value="<?php echo $row['region_id'];?>" <?php echo $rt['userress']['district']==$row['region_id']? 'selected="selected"' :"";?>><?php echo $row['region_name'];?></option>	
	<?php } } ?>													
	</select>
	
	<select <?php echo !isset($rt['userress']['town'])? 'style="display: none;"':"";?> name="town" id="select_town" onchange="ger_ress_copy('5',this,'select_village')">
<option value="0">选择城镇</option>	
<?php 
if(!empty($rt['town'])){
foreach($rt['town'] as $row){
?>
<option value="<?php echo $row['region_id'];?>" <?php echo $rt['userress']['town']==$row['region_id']? 'selected="selected"' :"";?>><?php echo $row['region_name'];?></option>	
<?php } } ?>													
</select>

<select <?php echo !isset($rt['userress']['village'])? 'style="display: none;"':"";?> name="village" id="select_village" >
<option value="0">选择村</option>	
<?php 
if(!empty($rt['village'])){
foreach($rt['village'] as $row){
?>
<option value="<?php echo $row['region_id'];?>" <?php echo $rt['userress']['village']==$row['region_id']? 'selected="selected"' :"";?>><?php echo $row['region_name'];?></option>	
<?php } } ?>													
</select>
	
    </td>
	
	
  </tr>
  <tr>
    <td align="right"><b class="cr2">*</b> 详细地址：</td>
    <td><input type="text" value="<?php echo isset($rt['userress']['address'])&&!empty($rt['userress']['address']) ? $rt['userress']['address'] : "";?>" name="address"  class="pw" style="width:400px;"/></td>
  </tr>
  <tr>
    <td align="right"> <b class="cr2">*</b> 邮政编码：</td>
    <td><input type="text" value="<?php echo isset($rt['userress']['zipcode'])&&!empty($rt['userress']['zipcode']) ? $rt['userress']['zipcode'] : "";?>" name="zipcode"  class="pw"/></td>
  </tr>
  
  
  <tr>
  		<td>
  			<b>送货区域申请:</b>
  		</td>
  </tr>
  <tr>
    <td align="right"><b class="cr2">*</b>申请区域：</td>
    <td >
<select name="q_province" id="select_province" onchange="ger_ress_copy('2',this,'select_city')">
	<option value="0">选择省</option>
	<?php 
	if(!empty($rt['province'])){
	foreach($rt['province'] as $row){
	?>
	<option value="<?php echo $row['region_id'];?>" <?php echo $rt['userress']['province']==$row['region_id']? 'selected="selected"' :"";?>><?php echo $row['region_name'];?></option>	
	<?php } } ?>													
	</select>
	
	<select name="q_city" id="select_city" onchange="ger_ress_copy('3',this,'select_district')">
	<option value="0">选择城市</option>
	<?php
	if(!empty($rt['city'])){
	foreach($rt['city'] as $row){
	?>
	<option value="<?php echo $row['region_id'];?>" <?php echo $rt['userress']['city']==$row['region_id']? 'selected="selected"' :"";?>><?php echo $row['region_name'];?></option>	
	<?php } } ?>	
	</select>
	<select <?php echo !isset($rt['userress']['district'])? 'style="display: none;"':"";?> name="q_district" id="select_district">
	<option value="0">选择社区/县</option>	
	<?php 
	if(!empty($rt['district'])){
	foreach($rt['district'] as $row){
	?>
	<option value="<?php echo $row['region_id'];?>" <?php echo $rt['userress']['district']==$row['region_id']? 'selected="selected"' :"";?>><?php echo $row['region_name'];?></option>	
	<?php } } ?>													
	</select>
	
    </td>
	
	
  </tr>
  <tr>
    <td align="right"><b class="cr2">*</b> 详细地址：</td>
    <td><input type="text" value="<?php echo isset($rt['userress']['address'])&&!empty($rt['userress']['address']) ? $rt['userress']['address'] : "";?>" name="q_address"  class="pw" style="width:400px;"/></td>
  </tr>
  
  
  
  
  <tr>
    <td>&nbsp;</td>
    <td><input type="button" value=""  style="overflow:hidden; border:none; background:none;cursor:pointer; background:url(<?php echo SITE_URL;?>theme/images/btu2.gif) no-repeat 0 0 ; width:102px; height:25px;" onclick="update_user_info()" />
	</td>
  </tr>
</table>
</form>
         </div>
     </div>
<script type="text/javascript">
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
				
				//$(obj).parent().find('#select_city').hide();
				//$(obj).parent().find('#select_city').html("");
			}

		}else{
			alert(data);
		}
	});
}


</script>
    <div class="clear"></div>
</div>
<div class="clear7"></div>

