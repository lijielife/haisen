<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/3/css.css" media="all" />
<?php $this->element('3/top',array('lang'=>$lang)); ?>

<style type="text/css">
.checkout{ background:#FFF; padding-top:10px; padding-bottom:10px}
.checkout p.title {
background: #eaeaea;
height: 27px;
line-height: 27px;
text-indent: 10px;
width: 100%;
color: #9a0000;
font-weight: bold;
margin: 10px 0px 0px 0px;
border-bottom:2px solid #CCC
}
.checkout table {
text-align: left;
color: #5f5f5f;
margin:0px;
}
.checkout td {
line-height: 18px;
padding: 3px 0px 3px 0px;
}
.checkout .userreddinfo td {
line-height: 18px;
padding: 2px 0px 2px 0px;
}
.checkout td label{ line-height:22px;}
label{ cursor:pointer}
.pw{ line-height:23px; height:23px;}
.addgallery i{font-style:normal;}
.item-box-buy-btn {
font-size: 12px;
color: #456f9a;
border: 1px solid #456f9a;
border-radius: 5px;
cursor: pointer;
float: right;
width: 80px;
height: 25px;
line-height: 25px;
text-align: center;
overflow: hidden;
white-space: nowrap;
background:#C7ECF3;
}
.addgallery{ padding-left:14px;background:url(<?php echo $this->img('+.png');?>) 3px center no-repeat}
.removegallery{ padding-left:14px;background:url(<?php echo $this->img('-.png');?>) 3px center no-repeat}
</style>
<div id="main" style="padding-top:0px; min-height:300px">
	<div class="checkout">
	<form action="<?php echo ADMIN_URL;?>mycart.php?type=confirm" method="post" name="CONSIGNEE_ADDRESS" id="CONSIGNEE_ADDRESS">
		
		<table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
		<?php if(!empty($rt['userress'])){?>
		<?php $userress_id = 0; foreach($rt['userress'] as $row){?>
		  <tr>
		  <td>
		  <label style="padding-left:10px;"><input<?php echo $row['is_default']=='1' ? ' checked="checked"' : '';?> type="radio" class="showaddress" name="userress_id" value="<?php echo $row['address_id'];?>"/>
		  <?php
		  echo $row['provincename'].$row['cityname'].$row['districtname'].$row['address'].'<br/><span style="padding-left:26px;"></span>'.'电话:'. (!empty($row['mobile']) ? $row['mobile'] : $row['tel']) .'&nbsp;联系人:'. $row['consignee'];
		  ?></label>
		  <p style="padding-left:26px;">
		  <a href="javascript:;" onclick="ressinfoop('<?php echo $row['address_id'];?>','showupdate',this)" style="border-radius:5px;display:block;background:#3083CE;cursor:pointer;width:60px; height:22px; line-height:22px; font-size:12px; color:#FFF; text-align:center">修改</a>
		  </p>
		  </td>
		  </tr>
		  <?php } }?>
		  <?php 
			$userress_id = $userress_id > 0 ? $userress_id : (isset($rt['userress'][0]) ? $rt['userress'][0]['userress_id'] : 0);
		  ?>
		  <tr>
		  <td><label style="padding-left:10px;"><input class="showaddress" name="userress_id" type="radio" value="0" />&nbsp;添加新收货地址</label></td>
		  </tr>
		  <tr>
		  	<td align="left">
				<table width="100%" border="0" cellpadding="0" cellspacing="0"<?php if(!empty($rt['userress'])) echo ' style="display:none"';?> class="userreddinfo">
				  <tr>
					<td align="right">姓名：</td>
					<td align="left"><input type="text" value="" name="consignee"  class="pw" style="width:95%;;"/> 
					</td>
				  </tr>
				   <tr>
					<td align="right">区域：</td>
					<td align="left">
				<?php $this->element('address',array('resslist'=>$rt['province']));?>
					</td>
					
				  </tr>
				  <tr class="address_sh">
					<td align="right">地址：</td>
					<td align="left"><input type="text" value="" name="address"  class="pw" style="width:95%;;"/></td>
				  </tr>
				  <tr>
					<td align="right">电话：</td>
					<td align="left"><input type="text" value="" name="mobile"  class="pw" style="width:95%;"/></td>
				  </tr>
				  <tr>
				  <td>&nbsp;</td>
				  <td align="left" colspan="2"><img src="<?php echo $this->img('btu_add.gif');?>" alt="" style="cursor:pointer" onclick="ressinfoop('0','add','CONSIGNEE_ADDRESS')"/></td>
				  </tr>
			</table>
			</td>
		  </tr>
	    </table>
		<table border="0" cellpadding="0" cellspacing="0" style="width:100%;margin-top:10px;border-top:1px solid #ededed;">
		 <?php 
				 $goodslist = $this->Session->read('cart'); 
				  if(!empty($goodslist)){
				  $total= 0;
				  $uid = $this->Session->read('User.uid');
				  $active = $this->Session->read('User.active');
				  $rank = $this->Session->read('User.rank');
				  foreach($goodslist as $k=>$row){
					  if(!($row['goods_id'])>0) continue;
					  //赠品去掉
					  if($row['is_alone_sale']=='0'&&(empty($rt['gift_goods_ids']) || !in_array($row['goods_id'],$rt['gift_goods_ids']))){ //条件不满足者  不允许购买赠品
							$gid = $row['goods_id'];
							$this->Session->write("cart.{$gid}",null);
							continue;
					  }
					 
					  $total +=$row['price']*$row['number'];
		   ?>
		
			<tr>
				<td style="width:80px; text-align:center; height:80px; padding-top:10px; overflow:hidden; border-bottom:1px solid #ededed;" valign="top">
					<img src="<?php echo SITE_URL.$row['goods_thumb'];?>" title="<?php echo $row['goods_name'];?>" border="0" style="width:78px; height:78px; border:1px solid #ededed; padding:1px; margin-left:5px;">
				</td>
				<td style="text-align:left;border-bottom:1px solid #ededed;" valign="top">
				<p style="padding-left:10px; padding-right:36px; position:relative; line-height:18px;">
					<?php echo $row['goods_name'];?>
					<?php if(!empty($row['buy_more_best'])){echo '<br />该商品实行<font style="color:#FE0000;font-weight:bold">['.$row['buy_more_best'].']</font>促销活动，欢迎订购！';}?><span style="padding:2px 5px 2px 5px; color:#FF0000; cursor:pointer; position:absolute; right:5px; top:0px; z-index:22; background:#fafafa; border:1px solid #ededed;border-radius:5px;" class="delcartid" id="<?php echo $k;?>">删除</span></p>
				<?php if(!empty($row['spec'])){
				 echo '<p style="padding-left:10px;">'.implode("、",$row['spec']).'</p>';
				 } ?>
				 <p style=" padding-left:10px;font-size:12px;line-height:20px;" class="raturnprice raturnprice<?php echo $k;?>">专柜价:<font color="#5f5f5f">￥<?php echo $row['shop_price'];?></font>&nbsp;&nbsp;惊喜价:<font color="#FF0000" class="gprice<?php echo $k;?>">￥<?php echo $row['price']>0 ? $row['price']  : $row['pifa_price'];?></font></p>
				 <div class="item" style="height:20px; line-height:20px; position:relative; padding-left:10px; padding-top:7px">
						<a class="jian" style="cursor:pointer; display:block; float:left; width:35px; height:22px;line-height:22px;text-align:center; font-size:18px; font-weight:bold; border:1px solid #ccc; background:#ededed">-</a><input readonly="" id="<?php echo $k;?>" name="goods_number" value="<?php echo $row['number'];?>" class="inputBg" style="float:left;text-align: center; width:20px; height:22px; line-height:22px;border-bottom:1px solid #ccc; border-top:1px solid #ccc" type="text"> <a class="jia" style="cursor:pointer; display:block; float:left; width:35px; height:22px;line-height:22px;text-align:center; font-size:18px; font-weight:bold; border:1px solid #ccc; background:#ededed">+</a><b style="margin-left:3px;"><?php  echo $row['goods_unit'];?></b>
						&nbsp;&nbsp;小计:<font color="#FF0000" class="gzprice<?php echo $k;?>">￥<?php echo $row['price']*$row['number'];?></font>
				  </div>
				</td>
			</tr>
			
			 <?php } } ?>
		</table>
		<table border="0" cellpadding="0" cellspacing="0" style="width:100%;border-bottom:1px solid #ededed; margin-top:10px;">
			<tr>
				  <td align="right" width="22%"><span>支付方式：</span></td>
				  <td align="left" width="78%">
				  <?php 
				if(!empty($rt['paymentlist'])){
					echo '<table border="0" cellpadding="0" cellspacing="0" style="width:100%;"><tr>';
					foreach($rt['paymentlist'] as $k=>$row){
					?>
					  <td><label><span><input name="pay_id"  id="pay_id"<?php if($k=='0'){ echo ' checked="checked"';}?> value="<?php echo $row['pay_id'];?>" type="radio"></span><strong><?php echo $row['pay_name'];?></strong></label></td>
					<?php
					}
					echo '</tr></table>';
				}
				?>
				  </td>
			</tr>
			<tr>
				  <td align="right" width="22%"><span>配送方式：</span></td>
				  <td align="left" width="78%">
					<?php 
					$free = array();
					if(!empty($rt['shippinglist'])){
					echo '<table border="0" cellpadding="0" cellspacing="0" style="width:100%;"><tr>';
					foreach($rt['shippinglist'] as $k=>$row){
					?>
					  <td><label><span><input<?php echo $k=='0' ? ' checked="checked"':'';?> name="shipping_id" id="shipping_id" value="<?php echo $row['shipping_id'];?>" type="radio" /></span><strong><?php echo $row['shipping_name'];?></strong></label></td>
					<?php
					}
					echo '</tr></table>';
				}
				?>
				  </td>
			</tr>
			<tr>
				<td align="right" width="22%">订单附言：</td>
				<td>
				<textarea class="pw" name="postscript" id="postscript" style="width:96%; height:60px;"></textarea>
				</td>
			</tr>
		</table>
		<div style="padding-left:5px;">
			<?php $free[0] = empty($free[0]) ? '0.00' : $free[0]; ?>
<!--			<p style="height:20px; line-height:20px;">
				商品总价(不含运费)：<span style="color:red;" class="ajax_change_jfien">￥<span class="nototals"><?php echo $total;?></span>元</span>
				&nbsp;&nbsp;配运费：<span class="free_shopping" style="color:red;">￥<?php echo $free[0];?></span>
			</p>-->
			<p style="height:44px; line-height:22px; color:#222; font-size:16px; font-weight:bold; color:#9A0000; padding-top:5px;">结算总金额：<br/>￥<span class="ztotals"><?php echo $total;if($rt['discount']<100){?>&nbsp;X&nbsp;<?php echo str_replace('.00','',format_price($rt['discount']/10));?>折&nbsp;=&nbsp;<?php echo format_price($total*($rt['discount']/100));} ?></span>元</p>
			<p style="height:30px; line-height:30px; margin-top:10px;">
			<input value="确认提交" type="submit" align="absmiddle" onclick="return checkvar()" style="width:110px; height:30px; line-height:30px; background:#9F3200; font-size:20px; color:#FFFFFF; font-weight:bold; text-align:center; cursor:pointer; float:left"/>
			&nbsp;&nbsp;
			 <input value="清空购物车" type="button" align="absmiddle" onclick="return ajax_clear()" style="width:120px; height:30px; line-height:30px; background:#3083CE; font-size:20px; color:#FFFFFF; font-weight:bold; text-align:center; cursor:pointer; float:left;margin-left:10px"/>
			</p>
	  </div>
	</form>
	</div>
</div>

<?php  $thisurl = ADMIN_URL.'mycart.php'; ?> 
<script language="javascript" type="text/javascript">
//2位小数
function toDecimal(x) {  
	var f = parseFloat(x);  
	if (isNaN(f)) {  
		return;  
	}  
	f = Math.round(x*100)/100;  
	return f;  
} 

function ajax_clear(){
	if(confirm('确定吗')){
		window.location.href='<?php echo ADMIN_URL;?>mycart.php?type=clear';
		return true;
	}
	return false;
}
$('.showaddress').live('click',function(){
	var vv= $(this).val();
	if(vv==0){
	$('.userreddinfo').show();
	}else{
	$('.userreddinfo').hide();
	}
	//$('.userreddinfo').toggle();
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
		
			address = $('input[name="address"]').val(); 
			if(typeof(address)=='undefined' || address ==""){
				alert("详细地址不能为空！");
				return false;
			}
			
			mobile = $('input[name="mobile"]').val(); 
			tel = $('input[name="tel"]').val(); 
			if(mobile =="" && tel ==""){
				alert("请输入手机或者电话号码！");
				return false;
			}
	}	

	return true;
}

$('.delcartid').click(function(){
	if(confirm("确定移除吗")){
		gid = $(this).attr('id');
		$(this).parent().parent().parent().remove();
		obj = $(this);
		$.post('<?php echo $thisurl;?>',{action:'ajax_remove_cargoods',gid:gid},function(prices){
			$('.ztotals').html(prices);
			nn = $('.mycarts').html();
			number = $(obj).parent().parent().find('input[name="goods_number"]').val();
			$('.mycarts').html(parseInt(nn)-parseInt(number));
		});
	}
	return false;
});

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

//数量减1
$('.jian').live('click',function(){
	ob = $(this).parent();
	numobj = ob.find('input[name="goods_number"]');
	vall = $(numobj).val();
	if(!(vall>0)){
		ob.val('1');
		return false;
	}
	if(vall>1){
		$(numobj).val((parseInt(vall)-1));
	}
	nn = $('.mycarts').html();
	$('.mycarts').html(parseInt(nn)-1);
	change_number(numobj);
});
//数量加1
$('.jia').live('click',function(){
	ob = $(this).parent();
	numobj = ob.find('input[name="goods_number"]');
	vall = $(numobj).val();
	if(!(vall>0)){
		$(ob).val('1');
		return false;
	}
	$(numobj).val((parseInt(vall)+1));
	nn = $('.mycarts').html();
	$('.mycarts').html(parseInt(nn)+1);
	change_number(numobj);
});
//改变商品价格
function change_number(obj){
	id = $(obj).attr('id');
	numbers = $(obj).val();
	if(!(numbers>0)){
	 	numbers = 1;
	 	$(obj).val('1');
	}
	createwindow();
	$.post(SITE_URL+'mycart.php',{action:'ajax_change_price',id:id,number:numbers},function(data){ 
		removewindow();
		if(data.error=='0'){
			$('.ztotals').html(data.prices);
			$('.gprice'+id).html('￥'+data.thisprice);
			$('.gzprice'+id).html('￥'+toDecimal(data.thisprice * numbers));
		}else{
			alert(data.message);
		}
	}, "json");
	return true;
}

</script>
<?php $this->element('3/footer',array('lang'=>$lang)); ?>