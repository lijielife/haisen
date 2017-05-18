<link type="text/css" rel="stylesheet" href="<?php echo SITE_URL;?>css/menber.css" media="all" />

<form action="<?php echo SITE_URL;?>mycart.php?type=confirm" method="post" name="CONSIGNEE_ADDRESS" id="CONSIGNEE_ADDRESS" >
<div id="warp" style="width:1000px; margin:0px auto">
<div class="cart2" style="width:990px; padding-left:8px;">
<div class="gehang"></div>
<img src="<?php echo SITE_URL;?>theme/images/check.gif" width="259" height="65" />
<?php if(!empty($rt['userress'])){?>
<p>你可以选择一个已有的收货地址</p>
<table width="1000" border="0" cellpadding="0" cellspacing="0">
<?php foreach($rt['userress'] as $row){?>
  <tr>
  <td width="20" align="right">&nbsp;
  </td>
  <td>
  <label><input type="radio" name="userress_id" value="<?php echo $row['address_id'];?>" <?php if($row['is_default']=='1'){?>checked="checked"<?php } ?>/>&nbsp;
  <?php
  foreach($rt['province'] as $pr){
  if($pr['region_id']==$row['province']){ echo $pr['region_name'].'&nbsp;'; break;}
  }
  foreach($rt['city'][$row['address_id']] as $pr){
  if($pr['region_id']==$row['city']){ echo $pr['region_name'].'&nbsp;'; break;}
  } 
  foreach($rt['district'][$row['address_id']] as $pr){
  if($pr['region_id']==$row['district']){ echo $pr['region_name'].'&nbsp;'; break;}
  }
  foreach($rt['town'][$row['address_id']] as $pr){
  if($pr['region_id']==$row['town']){ echo $pr['region_name'].'&nbsp;'; break;}
  }
  foreach($rt['village'][$row['address_id']] as $pr){
  if($pr['region_id']==$row['village']){ echo $pr['region_name'].'&nbsp;'; break;}
  }
  
  echo '详细地址：'.$row['address'];
  echo '&nbsp;&nbsp;';
  echo $row['shoppingname']=='6' ? '<b>[门店自提]</b>'.'&nbsp'.'配送店：'.$row['peisongname'].'&nbsp;'.'联系电话:'. $row['phone'].'&nbsp'.'地址:'.$row['addr'] : "<b>[送货上门]</b>";
 
 // echo ($row['peisongname']!=' ')?'<b>[门店自提]</b>':'<b>[送货上门]</b>';
  ?>
  <img src="<?php echo $this->img('btu_up.gif');?>"  height="16" width="46" border="0" onclick="ressinfoop('<?php echo $row['address_id'];?>','showupdate',this)" style="cursor:pointer"/>
  <img src="<?php echo $this->img('btu_dell.gif');?>" height="16" width="46" border="0" onclick="ressinfoop('<?php echo $row['address_id'];?>','delete',this)" style="cursor:pointer"/>
  </label> 
  
  </td>
  </tr>
 
  <?php } ?>
  <tr>
  <td>&nbsp;</td>
  <td><label><input type="radio" name="userress_id" value="0" />&nbsp;添加新收货地址</td>
  </tr>
  </table>
 <?php } ?>
 <p class="userreddinfo"<?php if(!empty($rt['userress'])) echo ' style="display:none"';?>>收货人基本信息</p>
<table width="970" border="0" cellpadding="0" cellspacing="0"<?php if(!empty($rt['userress'])) echo ' style="display:none"';?> class="userreddinfo">
  <tr>
    <td width="140"><u class="cr2">*</u> 性别：</td>
    <td width="300"> 
	  <label><input type="radio" name="sex" value="0" checked="checked"/> 保密&nbsp;</label>
	  <label><input type="radio" name="sex" value="1" /> 男 &nbsp;</label>
      <label><input type="radio" name="sex" value="2" /> 女&nbsp;</label>
	  </td>
  </tr>
  
  
  <!-------------------------- look添加修改  开始  ------------------------------------------------------------------->	
	
	
	<tr>
	  <td width="140"><u class="cr2">*</u>选择配送方式</td>
	  <td> 
	  <?php 
		if(!empty($rt['shippinglist'])){
		foreach($rt['shippinglist'] as $row){
		?>
		<label style="display:block; width:110px; float:left"><input name="shipping_id" id="shipping_id" value="<?php echo $row['shipping_id'];?>" type="radio" <?php if($row['shipping_id']==6){echo 'checked="checked"';}?>  onclick="return jisuan_shopping('<?php echo $row['shipping_id'];?>')" ><?php echo $row['shipping_name'];?></label>
		<?php } ?>
	  </td>
		<?php } else{ echo '<script> location.href="'.SITE_URL.'mycart.php";</script>'; exit; } ?>
	</tr>
	
	
<!--	<tr>
	  <td width="140"><u class="cr2">*</u>选择配送方式</td>
	  
	  <td align="left"> 
	  <label><input type="radio" name="shoppingname" value="1" <?php echo isset($rt['userress']['shoppingname'])&&$rt['userress']['shoppingname']=='1' ? ' checked="checked"' : "";?>/> 门店自提 &nbsp;</label>
      <label><input type="radio" name="shoppingname" value="2" <?php echo isset($rt['userress']['shoppingname'])&&$rt['userress']['shoppingname']=='2' ? ' checked="checked"' : "";?>/> 送货上门 &nbsp;</label>
	</td>
	 
	</tr>-->
 <!-------------------------- look添加修改  结束  ------------------------------------------------------------------->		
	

  <tr>
    <td><u class="cr2 " >*</u> 收货人姓名：</td>
	
    <td><input type="text" value="" name="consignee"  class="pw"/> <span class="cart3">请填写中文姓名，以便收货</span></td>
  </tr>

 <!-- <tr>
	  <td width="140"><u class="cr2">*</u>选择配送方式[配送名称]</td>
	  <?php 
	if(!empty($rt['shippinglist'])){
	foreach($rt['shippinglist'] as $row){
	?>
	 <td><label><input name="shipping_id" id="shipping_id" value="<?php echo $row['shipping_id'];?>" type="radio" onclick="return jisuan_shopping('<?php echo $row['shipping_id'];?>')"><?php echo $row['shipping_name'];?></label></td>
	 <?php } } else{ echo '<script> location.href="'.SITE_URL.'mycart.php";</script>'; exit; } ?>
	</tr>
	-->
	
  
   <tr>
    <td width="90"><u class="cr2">*</u> 收货人地址：</td>
	<td colspan="2">
<?php $this->element('address',array('resslist'=>$rt['province']));?>
	</td>
	
  </tr>
  <tr class="address_sh">
    <td><u class="cr2">*</u> 详细地址：</td>
    <td colspan="2"><input type="text" value="" name="address"  class="pw" style="width:400px;"/></td>
  </tr>
  <tr>
    <td><u class="cr2">*</u> 邮政编码：</td>
    <td style=" width:100px;"><input type="text" value="" name="zipcode"  class="pw"/></td>
	
  </tr>
  <tr>
    <td><u class="cr2">*</u> 手机号码：</td>
    <td style=" width:100px;"><input type="text" value="" name="mobile"  class="pw"/></td>
    <td>   &nbsp;&nbsp;&nbsp;固定电话：<input type="text" class="pw" name="tel"/>  输入示例: 010-64076407</td>
  </tr>
  <!--<tr>
  <td>&nbsp;</td>
  <td><img src="<?php echo $this->img('add_btu.gif');?>" alt="" style="cursor:pointer" onclick="ressinfoop('0','add','CONSIGNEE_ADDRESS')"/></td>
  
  </tr>-->
</table>

<p>商品清单</p>
<div class="goodlist">
<table width="969" border="1" cellpadding="0" cellspacing="0"  bordercolor="#e6dbdb" align="center">
  <tr>
    <td width="300"><u class="cr6">商品名称</u></td>
	<td width="120"><u class="cr6">商品规格</u></td>
	<td width="120"><u class="cr6">商品重量</u></td>
    <td width="120"><u class="cr6">实付单价</u></td>
    <td width="110"><u class="cr6">数 量</u></td>
    <td width=""><u class="cr6">小计</u></td>
  </tr>
   <?php
		if(!empty($rt['goodslist'])){
		  $total= 0;
		  $uid = $this->Session->read('User.uid');
		  $active = $this->Session->read('User.active');
		  $rank = $this->Session->read('User.rank');
		  $zjifen = 0; //兑换总积分
		  foreach($rt['goodslist'] as $k=>$row){
		  	  $comd = array();
		  	  if($row['is_alone_sale']=='0'&&(empty($rt['gift_goods_ids']) || !in_array($row['goods_id'],$rt['gift_goods_ids']))){ //条件不满足者  不允许购买赠品
			  		$gid = $row['goods_id'];
			  		$this->Session->write("cart.{$gid}","");
					
					continue;
			  }
		//	  $comd[] = $row['shop_price'];
		  	  if(!empty($uid)&&$active=='1'){
					if($rt['discount']>0 && $rank =='1'){
						$comd[] = ($rt['discount']/100)*$row['shop_price'];
					}
					
				   if($row['shop_price']>0 && $rank == 1 ){ //个人会员价格
				   			
				   		$comd[] =  $row['shop_price']; //个人会员价格
				   }
				    if($row['pifa_price']>0 && $rank !='1'){ //高级会员价格
					
				   		$comd[] =  $row['pifa_price']; //高级会员价格
				   }
				   
			  }else{
			   		$comd[] = $row['market_price'];
			  }
			/*  if($rank=='11'){
			  		$comd[] = $row['pifa_price'];
			  }
			  */
			  if($row['is_promote']=='1' && $row['promote_start_date'] < mktime() && $row['promote_end_date'] > mktime()){ //促销价格
					$comd[] =  $row['promote_price'];
			   }
			  if($row['is_qianggou']=='1' && $row['qianggou_start_date'] < mktime() && $row['qianggou_end_date'] > mktime()){ //抢购价格
					$comd[] =  $row['qianggou_price'];
			  }
				 
			  $onetotal = min($comd);
			  if($onetotal<=0) $onetotal = $row['market_price'];
			  $total +=$onetotal*$row['number'];
   ?>
  <tr>
    <td><a href="<?php echo SITE_URL;?>product.php?id=<?php echo $row['goods_id']?>" target="_blank"><?php echo $row['goods_name'];?></a></td>
	<td><?php echo  $row['goods_brief']; ?> </td>
	<td><?php echo  $row['goods_weight']; ?> &nbsp;克<?php echo  $gurl; ?></td>
    <td>￥<?php echo $onetotal ;?></td>
    <td> <?php echo $row['number'];?> <?php  echo $row['goods_unit']?></td>
    <td>￥<?php echo $onetotal*$row['number'];?></td>
  </tr>
  <?php  } } else{ 
echo '<script> location.href="'.SITE_URL.'mycart.php";</script>'; exit;
 } ?> 
</table>
</div>
<p>支付方式</p>
<table width="969" border="1" cellpadding="0" cellspacing="0"  bordercolor="#e6dbdb">
		<tr>
		  <td width="140"><u class="cr6">选择支付方式[支付方式]</u></td>
		  <td align="left"><u class="cr6">支付描述</u></td>
	</tr>
		<?php 
		if(!empty($rt['paymentlist'])){
			foreach($rt['paymentlist'] as $row){
			?>
			<tr>
			  <td><label><input name="pay_id"  id="pay_id" value="<?php echo $row['pay_id'];?>" type="radio"><strong><?php echo $row['pay_name'];?></strong></label></td>
			  <td><?php echo $row['pay_desc'];?><br></td>
			</tr>
			<?php
			}

		}else{
echo '<script> location.href="'.SITE_URL.'mycart.php";</script>'; exit;
			}
		?>
</table>
  <p>其它信息</p>
<table width="969" border="1" cellpadding="0" cellspacing="0"  bordercolor="#e6dbdb">
		<tr>
		  <td valign="center" width="140"><strong>订单附言:</strong></td>
		  <td><textarea name="postscript" cols="80" rows="3" id="postscript" style="border: 1px solid rgb(204, 204, 204);"></textarea></td>
		</tr>
</table>

<div style="background:none; height:24px; line-height:24px;  width:965px; margin-left:10px; margin-top:10px;">
<span class="left"><a href="<?php echo SITE_URL;?>mycart.php"><img src="<?php echo SITE_URL;?>theme/images/btu_upgoods.gif"  width="110" height="32" /></a></span>
<span class="right cr6">配运费：<span class="free_shopping">￥0.00</span>   &nbsp;&nbsp;商品总价(不含运费)：<span style="color:red" class="ajax_change_jfien">￥<?php echo $total;?>元</span></span></div>
</div>
<?php if($zjifen > 0){?>
<p style="text-align:right; padding:25px; font-weight:bold">你当前积分：<font color="red"><?php echo $rt['mypoints']>0 ? $rt['mypoints'] : 0;?></font>&nbsp;&nbsp;&nbsp;需要支付积分：<font color="red"><?php echo $zjifen;?></font>&nbsp;&nbsp;&nbsp;
  <label>
  <input type="checkbox" name="confirm_jifen" value="<?php echo $zjifen;?>" onclick="ajax_change_jifen(this.checked)"/>&nbsp;<font color="red">确定兑换商品吗？</font>
  </label>
</p>
<?php } ?>
<div style="background:none; height:24px; line-height:24px;  width:965px; margin-left:10px; margin-top:10px;">
<span class="right cr6"><a href="<?php echo SITE_URL;?>"> <img src="<?php echo SITE_URL;?>theme/images/btu_continueshop.gif" width="128" height="40" /></a>&nbsp;<input type="image" src="<?php echo SITE_URL;?>theme/images/sureorder.gif" align="absmiddle" onclick="return checkvar()" style=" margin-bottom:33px;"/></span>
</div>
<div style="clear:both; height:20px"></div>
</div>
</div>

<?php  $thisurl = SITE_URL.'ajaxfile/mycart.php'; ?> 
<script language="javascript" type="text/javascript">
$('input[name="userress_id"]').live('click',function(){
	var vv= $(this).val();
	if(vv==0){
	$('.userreddinfo').show();
	}else{
	$('.userreddinfo').hide();
	}
});

function checkvar(){
		
	pp = $('input[name="pay_id"]:checked').val(); 
	if(typeof(pp)=='undefined' || pp ==""){
		alert("请选择支付方式！");
		return false;
	}
	/*consignee = $('input[name="consignee"]').val(); 
	if(typeof(consignee)=='undefined' || consignee ==""){
		alert("收货人不能为空0！");
		return false;
	}
	
//	address = document.getElementById("select_province").value
	address = $('select[name="province"]:select').val(); 
	if(typeof(address)=='undefined' || address ==""){
		alert("收货地址不能为空0！");
		return false;
	}
	
	zipcode = $('input[name="zipcode"]').val(); 
	if(typeof(zipcode)=='undefined' || zipcode =="" ){
		alert("邮政编码必须为整数且不能为空！");
		return false;
	}*/
	
	/*ss = $('input[name="shipping_id"]:checked').val(); 
	if(typeof(ss)=='undefined' || ss ==""){
		alert("请选择配送方式！");
		return false;
	}*/
	return true;
}

//计算邮费
function jisuan_shopping(id){
	/**   look注释  *********************
	*
	*	if(id=="" || typeof(id)=='undefined') return false;
		uu = $('input[name="userress_id"]:checked').val();
		if(typeof(uu)=='undefined' || uu ==""){
		//	alert("请选择一个收货地址！");
		//	return false;
		}
	
	//	createwindow();
	*/

		if(id==6){
			$('.shipping').show();
			//$('.address_sh').hide();
			//$('input[name="address"]').val("");
		}else{
			$('.shipping').hide();
			//$("select[name='shop_id']").html('<option value="0" >选择配送店</option>');
			$("select[name='shop_id']").val('0')
			//$('.address_sh').show();
		}
		
		$.post('<?php echo $thisurl;?>',{action:'jisuan_shopping',shopping_id:id,userress_id:uu},function(data){
				if(data !="" && typeof(data) !='undefined'){
					arr = data.split('+');
					if(arr.length==2){
					$('.free_shopping').html('￥'+arr[1]);
					}else{
						alert(data);
					}
				}else{
					$('.free_shopping').html('￥0.00');
				}
				removewindow();
		});
		
}

function ajax_change_jifen(checked){
	if(checked==true){
		tt = "true";
	}else{
		tt = "false";
	}
	createwindow();
	$.post('<?php echo $thisurl;?>',{action:'change_jifen',checked:tt},function(data){
		if(data>=0){
			$('.ajax_change_jfien').html('￥'+data+'元');
		}	
		removewindow();
	});
}
</script>
</form>