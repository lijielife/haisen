<div id="wrap">
	<div class="clear7"></div>
	<?php $this->element('user_menu');?>
    <div class="m_right">
		<h2 class="con_title">我的收货地址</h2>
    	<div class="myaddress">
		<p>收货地址簿：(如果您有新地址，请添加新地址)</p>
        <?php if(!empty($rt['userress'])){
		foreach($rt['userress'] as $row){
		?>	
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
			  <tr>
				<td >收货人：<?php echo $row['consignee'];?>&nbsp;&nbsp;[性别：<?php echo $row['sex']=='1' ? '男' : ($row['sex']=='2' ? '女' : '保密')?>]</td>
			  </tr>
			  
			   <tr>
				<td>配送方式：<?php echo $row['shipping_name'];?>
				</td>
			  </tr>
			  
			  <tr>
				<td>收货地址：<?php echo $row['provinces'].'-'.$row['citys'].'-'.$row['districts'].$row['address'];?></td>
			  </tr>
			  <tr>
				<td>手机：<?php echo $row['mobile'];?></td>
			  </tr>
			  <tr>
				<td>电话：<?php echo $row['tel'];?></td>
			  </tr>
			
			  <tr>
				<td>邮编：<?php echo $row['zipcode'];?></td>
			  </tr>
			  <tr>
				<td>
			   <img src="<?php echo $this->img('btu_up.gif');?>" height="26" width="66" border="0" onclick="ressinfoop('<?php echo $row['address_id'];?>','showupdate',this)" style="cursor:pointer"/>&nbsp;
			   <img src="<?php echo $this->img('btu_dell.gif');?>" height="26" width="66" border="0" onclick="ressinfoop('<?php echo $row['address_id'];?>','delete',this)" style="cursor:pointer"/>&nbsp;
			   <?php if($row['is_default']=='1'){?>
			   <img class="set_quxiao_icon" src="<?php echo $this->img('quxiaodefaultress.png');?>" height="26" border="0" onclick="ressinfoop('<?php echo $row['address_id'];?>','quxiao',this)" style="cursor:pointer"/>&nbsp;
			   <?php }else{?>
			   <img class="set_quxiao_icon" src="<?php echo $this->img('setdefaultress.png');?>" height="26" border="0" onclick="ressinfoop('<?php echo $row['address_id'];?>','setdefaut',this)" style="cursor:pointer"/>&nbsp;
			   <?php } ?>
			  </td>
			  </tr>
  </table>
  <?php } }  ?>

    <div class="add">
    <form action="" method="" name="CONSIGNEE_ADDRESS" id="CONSIGNEE_ADDRESS" >
		<table width="100%" border="0" style="background:#FFFFFF; text-align:right" cellpadding="0" cellspacing="0">
	  <tr>
		<td width="100" class="cr5 weg">收货人信息：</td>
		<td align="left"></td>
	  </tr>
	  <tr>
		<td><b class="cr2">*</b> 姓名：</td>
		<td align="left"><input name="consignee" class="pw"  value="" type="text"></td>
	  </tr>
		<tr>
		<td width="90"><u class="cr2">*</u> 性别：</td>
		<td align="left"> 
		  <label><input type="radio" name="sex" value="0" checked="checked"/> 保密</label>
		  <label><input type="radio" name="sex" value="1" /> 男 &nbsp;</label>
		  <label><input type="radio" name="sex" value="2" /> 女&nbsp;</label>
		  </td>
	  </tr>
	  
	   <tr>
		<td>配送方式：</td>
		<td align="left">
		 <?php 
		if(!empty($rt['shippinglist'])){
		foreach($rt['shippinglist'] as $row){
		?>
		<label style="display:block; width:110px; float:left"><input name="shipping_id" id="shipping_id" value="<?php echo $row['shipping_id'];?>" type="radio" <?php if($row['shipping_id']==6){echo 'checked="checked"';}?>  onclick="return jisuan_shopping('<?php echo $row['shipping_id'];?>')" ><?php echo $row['shipping_name'];?></label>
		<?php } ?>
		</td>
		<?php } ?>
	 	<!----------------  look注释   ------------------------------------------
		 <label><input type="radio" name="shoppingname" value="1"/> 门店自提 &nbsp;</label>
      	 <label><input type="radio" name="shoppingname" value="2"/> 送货上门 &nbsp;</label>
		 </td>
		 -->
	  </tr>
	  
	  <tr>
		<td><b class="cr2">*</b> 地区：</td>
		<td align="left">  
	<?php $this->element('address',array('resslist'=>$rt['province']));?>
	</td>
	  </tr>
	  <tr>
		<td><b class="cr2">*</b> 地址：</td>
		<td align="left"><input name="address" class="pw" value="" type="text"/>
		请详细填写所在的省、市、乡、镇、村的名称及街道门牌号码。</td>
	  </tr>
	  <tr>
		<td><b class="cr2">*</b> 电子邮箱：</td>
		<td align="left"><input type="text" class="pw" name="email"/></td>
	  </tr>
	  <tr>
		<td><b class="cr2">*</b> 邮编地址：</td>
		<td align="left"><input type="text" class="pw" name="zipcode"/></td>
	  </tr>
	 
	  <tr>
		<td>手机：</td>
		<td align="left"><input type="text" class="pw" name="mobile"/>
		(请认真填写您的手机或电话号码，以便我们发货时可以联系您。)</td>
	  </tr>
	  <tr>
		<td><b class="cr2">*</b> 固定电话：</td>
		<td align="left"><input type="text" class="pw" name="tel"/>  输入示例: 010-64076407</td>
	  </tr>
	  <tr>
		<td>&nbsp;</td>
		<td align="left"><br /><input type="button" value=""  style=" overflow:hidden ; border:none; background:none; cursor:pointer; background:url(<?php echo $this->img('add_btu.gif');?>) no-repeat 0 0 ; width:140px; height:26px;" onclick="ressinfoop('0','add','CONSIGNEE_ADDRESS')"/>
		</td>
	  </tr>
	</table>
</form>
 </div>

    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
</div>

<script type="text/javascript">
function jisuan_shopping(id){
		if(id==6){
			$('.shipping').show();
		}else{
			$('.shipping').hide();
			$("select[name='shop_id']").val('0');
		}
}
</script>