<link type="text/css" rel="stylesheet" href="<?php echo SITE_URL;?>css/menber.css" media="all" />
<style type="text/css"> #CONSIGNEE_ADDRESS input.pw{ border:1px solid #CCC; line-height:20px;}</style>
<div id="warp">
<div style="width:1020px; margin:0px auto; background-color:#FFF;">
<form action="<?php echo SITE_URL;?>mycart.php?type=confirm" method="post" name="CONSIGNEE_ADDRESS" id="CONSIGNEE_ADDRESS" >
<div class="cart2" style="width:1000px; padding-left:8px;">
<img src="<?php echo SITE_URL;?>theme/images/check.gif" width="259" height="65" />
<?php if(!empty($rt['userress'])){?>
<p style="border-bottom:2px solid #CCC">你可以选择一个已有的收货地址</p>
<table width="1000" border="0" cellpadding="0" cellspacing="0">
<?php $userress_id = 0; foreach($rt['userress'] as $row){?>
  <tr>
  <td width="20" align="right">&nbsp;
  </td>
  <td>
  <label><input type="radio" name="userress_id" value="<?php echo $row['address_id'];?>" <?php if($row['is_default']=='1'){?>checked="checked"<?php $userress_id = $row['address_id'];} ?>/>&nbsp;
  <?php
/*  foreach($rt['province'] as $pr){
  if($pr['region_id']==$row['province']){ echo $pr['region_name'].''; break;}
  }
  foreach($rt['city'][$row['address_id']] as $pr){
  if($pr['region_id']==$row['city']){ echo $pr['region_name'].''; break;}
  } 
  foreach($rt['district'][$row['address_id']] as $pr){
  if($pr['region_id']==$row['district']){ echo $pr['region_name'].''; break;}
  }
  foreach($rt['town'][$row['address_id']] as $pr){
  if($pr['region_id']==$row['town']){ echo $pr['region_name'].''; break;}
  }
  foreach($rt['village'][$row['address_id']] as $pr){
  if($pr['region_id']==$row['village']){ echo $pr['region_name'].'&nbsp;'; break;}
  }*/

  echo $row['provincename'].$row['cityname'].$row['districtname'].'&nbsp;'.$row['address'].'&nbsp;'.'联系电话:'. $row['mobile'].'&nbsp;联系人:'. $row['consignee'];
 
 // echo ($row['peisongname']!=' ')?'<b>[门店自提]</b>':'<b>[送货上门]</b>';
  ?>
  <img src="<?php echo $this->img('btu_up.gif');?>"  height="18" width="50" border="0" align="absmiddle" onclick="ressinfoop('<?php echo $row['address_id'];?>','showupdate',this)" style="cursor:pointer"/>
  <img src="<?php echo $this->img('btu_dell.gif');?>" height="18" width="50" border="0" align="absmiddle" onclick="ressinfoop('<?php echo $row['address_id'];?>','delete',this)" style="cursor:pointer"/>
  </label> 
  
  </td>
  </tr>
 
  <?php } ?>
   <?php 
		$userress_id = $userress_id > 0 ? $userress_id : (isset($rt['userress'][0]) ? $rt['userress'][0]['userress_id'] : 0);
	?>
  <tr>
  <td>&nbsp;</td>
  <td><label><input type="radio" name="userress_id" value="0" />&nbsp;添加新收货地址</label></td>
  </tr>
  </table>
 <?php } ?>
 <p class="userreddinfo"<?php if(!empty($rt['userress'])) echo ' style="display:none"';?> style="border-bottom:2px solid #CCC">收货人基本信息</p>
<table width="970" border="0" cellpadding="0" cellspacing="0"<?php if(!empty($rt['userress'])) echo ' style="display:none"';?> class="userreddinfo">
  <tr>
    <td width="140"><u class="cr2">*</u> 性别：</td>
    <td width="300"> 
	  <label><input type="radio" name="sex" value="0" checked="checked"/> 保密&nbsp;</label>
	  <label><input type="radio" name="sex" value="1" /> 男 &nbsp;</label>
      <label><input type="radio" name="sex" value="2" /> 女&nbsp;</label>
	  </td>
  </tr>
	

  <tr>
    <td><u class="cr2 " >*</u> 收货人姓名：</td>
	
    <td colspan="2"><input type="text" value="" name="consignee"  class="pw"/> <span class="cart3">请填写中文姓名，以便收货</span></td>
  </tr>
	
  
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
    <td>   &nbsp;&nbsp;&nbsp;电子邮箱：<input type="text" value="" name="email"  class="pw"/>  <em>输入合法邮箱，便于订单提醒</em></td>
  </tr>
  <tr>
    <td><u class="cr2">*</u> 手机号码：</td>
    <td style=" width:100px;"><input type="text" value="" name="mobile"  class="pw"/></td>
    <td>   &nbsp;&nbsp;&nbsp;固定电话：<input type="text" class="pw" name="tel"/>  <em>输入示例: 010-64076407</em></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  <td><img src="<?php echo $this->img('add_btu.gif');?>" alt="" style="cursor:pointer" onclick="ressinfoop('0','add','CONSIGNEE_ADDRESS')"/></td>
  
  </tr>
</table>

<p style="border-bottom:2px solid #CCC">商品清单</p>
<div class="goodlist">
<table width="969" border="1" cellpadding="0" cellspacing="0"  bordercolor="#ededed" align="center">
  <tr>
    <td width="300"><u class="cr6">商品名称</u></td>
	<td width="120"><u class="cr6">商品属性</u></td>
	<td width="120"><u class="cr6">原始价格</u></td>
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
					if($rt['discount']>0){
						$comd[] = ($rt['discount']/100)*$row['shop_price'];
					}
					
				   if($row['shop_price']>0 ){ //个人会员价格
				   			
				   		$comd[] =  $row['shop_price']; //个人会员价格
				   }
				    if($row['pifa_price']>0 ){ //高级会员价格
					
				   		$comd[] =  $row['pifa_price']; //高级会员价格
				   }
				   
			  }else{
			   		$comd[] = $row['shop_price'];
					$comd[] =  $row['pifa_price'];
			  }
			/*  if($rank=='11'){
			  		$comd[] = $row['pifa_price'];
			  }
			  */
			  if($row['is_promote']=='1' && $row['promote_start_date'] < mktime() && $row['promote_end_date'] > mktime() && $row['promote_price']>0){ //促销价格
					$comd[] =  $row['promote_price'];
			   }
			  if($row['is_qianggou']=='1' && $row['qianggou_start_date'] < mktime() && $row['qianggou_end_date'] > mktime() && $row['qianggou_price']>0){ //抢购价格
					$comd[] =  $row['qianggou_price'];
			  }
				 
			  $onetotal = !empty($comd) ? min($comd) : 0;
			  if($onetotal<=0) $onetotal = $row['pifa_price'];
			  $total +=$onetotal*$row['number'];
   ?>
  <tr>
    <td align="left">
	<font color="red"><?php if($row['is_alone_sale']=='0'||$row['is_qianggou']=='1' || $row['is_jifen_session']=='1'){
			if($row['is_jifen_session']=='1'){
				echo '[积分商品]';
			}else{
				echo $row['is_qianggou']=='1' ?  '[抢购商品]' : '[赠品]';
			}
	  }else{
		echo '[折扣]';
	  }
	?></font>
	<a href="<?php echo SITE_URL;?>product.php?id=<?php echo $row['goods_id']?>" target="_blank"><?php echo $row['goods_name'];?></a><?php if(!empty($row['buy_more_best'])){echo '<br />该商品实行<font style="color:#FE0000;font-weight:bold">['.$row['buy_more_best'].']</font>促销活动，欢迎订购！';}?></td>
	<td><?php echo !empty($row['spec']) ? implode("<br />",$row['spec']) : "";?></td>
	<td>￥<?php echo  $row['shop_price']; ?> &nbsp;</td>
    <td>￥<?php echo $onetotal ;?></td>
    <td> <?php echo $row['number'];?> <?php  echo $row['goods_unit']?></td>
    <td>￥<?php echo $onetotal*$row['number'];?></td>
  </tr>
  <?php 
  if(!empty($row['gifts'])){
  ?>
    <tr>
    <td align="left"><font color="red">[赠品]</font><?php echo $row['gifts']['goods_name'];?></td>
	<td><?php echo !empty($row['spec']) ? implode("<br />",$row['gifts']['spec']) : "";?></td>
	<td>￥<?php echo  $row['gifts']['shop_price']; ?> &nbsp;</td>
    <td>￥<?php echo $row['gifts']['pifa_price'];?></td>
    <td> <?php echo $row['gifts']['number'];?> <?php  echo $row['gifts']['goods_unit']?></td>
    <td>￥<?php echo $row['gifts']['pifa_price']*$row['gifts']['number'];?></td>
   </tr>
  <?php }
  		  } } else{ 
echo '<script> location.href="'.SITE_URL.'mycart.php";</script>'; exit;
 } ?> 
</table>
</div>
<p style="border-bottom:2px solid #CCC">支付方式</p>
<table width="969" border="1" cellpadding="0" cellspacing="0"  bordercolor="#ededed">
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

<!--<p>配送方式</p>-->
<p style="border-bottom:2px solid #CCC">配送方式</p>
<table width="969" border="1" cellpadding="0" cellspacing="0"  bordercolor="#ededed">
	<tr>
	  <td width="140"><u class="cr6">选择配送方式[配送名称]</u></td>
	  <td align="left"><u class="cr6">单价</u></td>
	  <td align="left"><u class="cr6">描述</u></td>
	</tr>
	<?php 
	$free = array();
	if(!empty($rt['shippinglist'])){
	foreach($rt['shippinglist'] as $k=>$row){
	?>
	<tr>
	<td><label><input name="shipping_id" id="shipping_id" value="<?php echo $row['shipping_id'];?>" type="radio" onclick="return jisuan_shopping('<?php echo $row['shipping_id'];?>')"<?php echo $k==0 ? ' checked="checked"' : '';?>><strong><?php echo $row['shipping_name'];?></strong></label></td>
	<td style="color:#FF0000">￥<?php 
	$f = $this->action('shopping','ajax_jisuan_shopping',array('shopping_id'=>$row['shipping_id'],'userress_id'=>$userress_id),'cart');
	echo $f = $f>0 ? $f : '0.00';
	$free[] = $f;
	?>
	</td>
	<td><?php echo $row['shipping_desc'];?><br></td>
	</tr>
	<?php } } else{ echo '<script> location.href="'.SITE_URL.'shopping/";</script>'; exit; } ?>
</table>

  
<p style="border-bottom:2px solid #CCC">其它信息</p>
<table width="969" border="1" cellpadding="0" cellspacing="0"  bordercolor="#ededed">
		<tr>
		  <td valign="center" width="140"><strong>送货时间:</strong></td>
		  <td><input type="text" id="best_time" name="best_time" onclick="return showCalendar('best_time', 'y-mm-dd');" style="width:200px; border:1px solid #ccc; height:25px; line-height:25px;"/></td>
		</tr>
		<tr>
		  <td valign="center" width="140"><strong>订单附言:</strong></td>
		  <td><textarea name="postscript" cols="80" rows="3" id="postscript" style="border: 1px solid rgb(204, 204, 204);"></textarea></td>
		</tr>
</table>
 <?php $free[0] = empty($free[0]) ? '0.00' : $free[0]; ?>
<div style="background:none; height:24px; line-height:24px;  width:965px; margin-left:10px; margin-top:10px;">
	<span class="left"><a href="<?php echo SITE_URL;?>mycart.php"><img src="<?php echo SITE_URL;?>theme/images/btu_upgoods.gif"  width="110" height="32" /></a></span>
	<span class="right cr6">配运费：<span class="free_shopping">￥<?php echo $free[0];?></span>   &nbsp;&nbsp;商品总价(不含运费)：<span style="color:red;" class="ajax_change_jfien">￥<span class="nototals"><?php echo $total;?></span>元</span></span>
</div><?php //$rtn = $this->action('shopping','get_give_off_monery',$total);?>
<div style="text-align:right; height:25px; line-height:25px; color:#222;width:975px; font-size:16px; font-weight:bold; color:#9A0000">结算总金额：￥<span class="ztotals"><?php echo $free[0]+$total;?></span>元</div>
<!--<div style="text-align:right; height:25px; line-height:25px; color:#222;width:975px;">账户剩余资金：<b style="color:red"><?php echo $rtn['shengxiamoney'];?></b> 元</div> 
<div style="text-align:right; height:25px; line-height:25px; color:#222;width:975px;">当月已抵消：<b style="color:red"><?php echo $rtn['month_spend_money'];?></b> 元</div> 
<div style="text-align:right; height:25px; line-height:25px; color:#222;width:975px;">当月能最大抵消：<b style="color:red"><?php echo $rtn['month_max_spend_money'];?></b> 元</div>
<div style="text-align:right; height:25px; line-height:25px; color:#222;width:975px;">当次购物抵消：<b class="offmoney" style="color:red"><?php echo $rtn['offmoney'];?></b> 元</div> 
<div style="text-align:right; height:25px; line-height:25px; color:#222;width:975px;">本次购物实际价格：<b class="shippingprice" style="color:red"><?php echo $rtn['shippingprice'];?></b> 元</div>-->
</div>
<?php if($zjifen > 0){?>
<p style="text-align:right; padding:25px; font-weight:bold">你当前积分：<font color="red"><?php echo $rt['mypoints']>0 ? $rt['mypoints'] : 0;?></font>&nbsp;&nbsp;&nbsp;需要支付积分：<font color="red"><?php echo $zjifen;?></font>&nbsp;&nbsp;&nbsp;
  <label>
  <input type="checkbox" name="confirm_jifen" value="<?php echo $zjifen;?>" onclick="ajax_change_jifen(this.checked)"/>&nbsp;<font color="red">确定兑换商品吗？</font>
  </label>
</p>
<?php } ?>
<div style="background:none; height:24px; line-height:24px;  width:965px; margin-left:10px; margin-top:10px;">
<span class="right cr6"><input value="提交" type="submit" align="absmiddle" onclick="return checkvar()" style="margin-bottom:33px;width:147px; height:45px; line-height:45px; background:url(<?php echo SITE_URL;?>theme/images/buybut.jpg) 0px 0px no-repeat; font-size:24px; color:#FFFFFF; font-weight:bold; text-align:center; cursor:pointer"/></span>
</div>
<div style="clear:both; height:20px"></div>
</div>
</form>
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
	
	ss = $('input[name="shipping_id"]:checked').val(); 
	if(typeof(ss)=='undefined' || ss ==""){
		alert("请选择配送方式！");
		return false;
	}
	
	userress_id = $('input[name="userress_id"]:checked').val();
	if(userress_id == '0' || userress_id == '' || typeof(userress_id)=='undefined'){
			consignee = $('input[name="consignee"]').val(); 
			if(typeof(consignee)=='undefined' || consignee ==""){
				alert("收货人不能为空！");
				return false;
			}
			
			provinces = $('select[name="province"]').val();
			if ( provinces == '0' )
			{
				alert("请选择收货地址！");
				return false;
			}
			
			city = $('select[name="city"]').val();
			if ( city == '0' )
			{
				alert("请完整选择收货地址！");
				return false;
			}
			
			district = $('select[name="district"]').val();
			if ( district == '0' )
			{
				alert("请完整选择收货地址！");
				return false;
			}
			
			shipping_id = $(':radio[name="shipping_id"]:checked').val();
			if ( shipping_id == '6')
			{
				shop_id = $('select[name="shop_id"]').val();
				if ( shop_id == '0' || shop_id == '' )
				{
					alert("此处暂无配送店,请选择送货上门。");
					return false;
				}
			}
			
		
			address = $('input[name="address"]').val(); 
			if(typeof(address)=='undefined' || address ==""){
				alert("详细地址不能为空！");
				return false;
			}
			
			zipcode = $('input[name="zipcode"]').val(); 
			if(typeof(zipcode)=='undefined' || zipcode ==""){
				alert("邮政编码有误！");
				return false;
			}
			
			mobile = $('input[name="mobile"]').val(); 
			tel = $('input[name="tel"]').val(); 
			if(mobile =="" && tel ==""){
				alert("请输入手机或者电话号码！");
				return false;
			}
			
			
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
	

	return true;
}

//计算邮费
function jisuan_shopping(id){
		if(id=="" || typeof(id)=='undefined') return false;
		uu = $('input[name="userress_id"]:checked').val();
		if(typeof(uu)=='undefined' || uu ==""){
			alert("请选择一个收货地址！");
			return false;
		}
		createwindow();
/*	

		if(id==6){
			$('.shipping').show();
			//$('.address_sh').hide();
			//$('input[name="address"]').val("");
		}else{
			$('.shipping').hide();
			//$("select[name='shop_id']").html('<option value="0" >选择配送店</option>');
			$("select[name='shop_id']").val('0')
			//$('.address_sh').show();
		}*/
		
		$.post('<?php echo $thisurl;?>',{action:'jisuan_shopping',shopping_id:id,userress_id:uu},function(data){
				if(data !="" && typeof(data) !='undefined'){
					arr = data.split('+');
					if(arr.length==2){
					$('.free_shopping').html('￥'+arr[1]);
					b = $('.nototals').html();
					$('.ztotals').html(parseFloat(b)+parseFloat(arr[1]));
					}else{
						alert(data);
					}
				}else{
					$('.free_shopping').html('￥0.00');
					b = $('.nototals').html();
					$('.ztotals').html(parseFloat(b));
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
