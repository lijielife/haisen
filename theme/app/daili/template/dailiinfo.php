<div class="main">
	<div class="mainbox">
		<div class="lefts">
			<?php $this->element('dailimenu');?>
		</div>
		<div class="rights">
			<div style="background:url(<?php echo $this->img('houtai_31.png');?>) 22px center no-repeat;height:35px; border-bottom:1px solid #ddd;"><p style="font-size:14px;font-family:微软雅黑;  line-height:20px; padding:7px;padding-left:30px;  text-align:left">帐号信息</p></div>
	<form name="USERINFO" id="USERINFO" action="" method="post" novalidate="novalidate">
	<ul class="s_shuru">
        <li>
        	<p>注册时间：
            </p>
            <span class="s_shuru_1">
            <?php echo isset($rt['userinfo']['reg_time'])&&!empty($rt['userinfo']['reg_time']) ? date('Y-m-d H:i:s',$rt['userinfo']['reg_time']) : "";?>
			</span>
        </li>
        
         <li>
        	<p><span style="color:#ea3100;">*</span>公司名称：
            </p>
            <span class="s_shuru_1">
            <input maxlength="50" width="72%" type="text" id="company" name="company" value="<?php echo isset($rt['userress']['company'])&&!empty($rt['userress']['company']) ? $rt['userress']['company'] : "";?>" size="25" class="inputBg inp_jgxg" style="width:183px; height:24px; font-family:'微软雅黑'; ">
           	</span>
        </li>
         <li>
        	<p><span style="color:#ea3100;">*</span>联系人：
            </p>
            <span class="s_shuru_1">
            <input maxlength="20" width="72%" type="text" name="consignee" id="consignee" value="<?php echo isset($rt['userress']['consignee'])&&!empty($rt['userress']['consignee']) ? $rt['userress']['consignee'] : "";?>" size="25" class="inputBg inp_jgxg" style="width:183px; height:24px;font-family:'微软雅黑'; ">
           	</span>
        </li>
         <li>
        	<p><span style="color:#ea3100;">*</span>手机号码：
            </p>
            <span class="s_shuru_1">
            <input maxlength="20" width="72%" type="text" name="mobile_phone" id="mobile_phone" value="<?php echo isset($rt['userinfo']['mobile_phone'])&&!empty($rt['userinfo']['mobile_phone']) ? $rt['userinfo']['mobile_phone'] : "";?>" size="25" class="inputBg inp_jgxg" style="width:183px; height:24px;font-family:'微软雅黑'; ">
           	</span>
        </li>
         <li>
        	<p>QQ：
            </p>
            <span class="s_shuru_1">
         <input width="72%" type="text" id="qq" name="qq" value="<?php echo isset($rt['userinfo']['qq'])&&!empty($rt['userinfo']['qq']) ? $rt['userinfo']['qq'] : "";?>" maxlength="20" size="25" class="inputBg inp_jgxg" style="width:183px; height:24px;">
           	</span>
        </li>
           <li>
        	<p><span style="color:#ea3100;">*</span>邮箱：
            </p>
            <span class="s_shuru_1">
        <input id="email" name="email" maxlength="50" type="text" value="<?php echo isset($rt['userinfo']['email'])&&!empty($rt['userinfo']['email']) ? $rt['userinfo']['email'] : "";?>" size="25" class="inputBg inp_jgxg" style="width:183px; height:24px;">
           	</span>
        </li>
             <li>
        	<p>公司地址：
            </p>
            <span class="s_shuru_1">
        <input id="address" name="address" maxlength="50" type="text" value="<?php echo isset($rt['userress']['address'])&&!empty($rt['userress']['address']) ? $rt['userress']['address'] : "";?>" size="25" class="inputBg inp_jgxg" style="width:183px; height:24px;">
           	</span>
        </li>
             <li>
        	<p>区域：
            </p>
 <span class="s_shuru_1">
       <select name="province" id="select_province" class="pwt" onchange="ger_ress_copy('2',this,'select_city')">
	<option value="0">选择省</option>
	<?php 
	if(!empty($rt['province'])){
	foreach($rt['province'] as $row){
	?>
	<option value="<?php echo $row['region_id'];?>" <?php echo $rt['userress']['province']==$row['region_id']? 'selected="selected"' :"";?>><?php echo $row['region_name'];?></option>	
	<?php } } ?>													
	</select>
	
	<select name="city" id="select_city" class="pwt" onchange="ger_ress_copy('3',this,'select_district')">
	<option value="0">选择城市</option>
	<?php
	if(!empty($rt['city'])){
	foreach($rt['city'] as $row){
	?>
	<option value="<?php echo $row['region_id'];?>" <?php echo $rt['userress']['city']==$row['region_id']? 'selected="selected"' :"";?>><?php echo $row['region_name'];?></option>	
	<?php } } ?>	
	</select>
	
	<select <?php echo !isset($rt['userress']['district'])? 'style="display: none;"':"";?> name="district" class="pwt" id="select_district">
	<option value="0">选择区</option>	
	<?php 
	if(!empty($rt['district'])){
	foreach($rt['district'] as $row){
	?>
	<option value="<?php echo $row['region_id'];?>" <?php echo $rt['userress']['district']==$row['region_id']? 'selected="selected"' :"";?>><?php echo $row['region_name'];?></option>	
	<?php } } ?>													
	</select>
           	</span>
        </li>
		<li>
        	<p>备注：
            </p>
            <span style="float:left; padding-top:3px;">
<textarea maxlength="500" style="width:366px;height:75px;" class="inputBg inp_jgxg" name="about"><?php echo isset($rt['userress']['about'])&&!empty($rt['userress']['about']) ? $rt['userress']['about'] : "";?></textarea>
           	</span>
        </li>
    </ul>
    <div style="clear:both;"></div>
    <div style="padding-left:97px; padding-top:18px; padding-bottom:38px; text-align:left">
          <input name="submit" type="button" value="保存" onclick="getmsg();" class="gree" style="cursor:pointer; padding:2px">
          </div>
</form>
<script type="text/javascript">
function getmsg(){
		var email = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{|}~])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{|}~])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d)|(([a-z]|\d)([a-z]|\d|-|\.|_|~)*([a-z]|\d)))\.)+(([a-z])|(([a-z])([a-z]|\d|-|\.|_|~)*([a-z])))\.?$/;
		if (!email.exec($('#email').val())){
			alert('邮箱格式不正确！');
			return false;
		}
		
		if($('#company').val() == ''){
		alert('请填写公司名称！');
		return false;
		}
		if($('#email').val() == ''){
		alert('请填写邮箱！');
		return false;
		}
		if($('#consignee').val() == ''){
		alert('请填写联系人名称！');
		return false;
		}
		if($('#mobile_phone').val() == ''){
		alert('请填写手机号码！');
		return false;
		}
		update_user_info(10);
}

function ger_ress_copy(type,obj,seobj){
	parent_id = $(obj).val();
	if(parent_id=="" || typeof(parent_id)=='undefined'){ return false; }
	$.post('<?php echo SITE_URL;?>user.php',{action:'get_ress',type:type,parent_id:parent_id},function(data){
		if(data!=""){
			$(obj).parent().find('#'+seobj).html(data);
			if(type==3){
				$(obj).parent().find('#'+seobj).show();
			}
			if(type==2){
				$(obj).parent().find('#select_district').hide();
				$(obj).parent().find('#select_district').html("");
			}
		}else{
			alert(data);
		}
	});
}

</script>				
		</div>
		<div class="clear"></div>
	</div>
</div>