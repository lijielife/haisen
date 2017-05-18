<style type="text/css">
	.col{margin-left:5%;margin-right:5%;}
	.red{color:red;}
	.radio{position:relative;top:3px;}
</style>
<div class="contentbox">
     <form id="form1" name="form1" method="post" action="">
	 <table cellspacing="2" cellpadding="5" width="100%">
	 <tr>
		<th colspan="2" align="left"><?php echo $rt['sms_name']?>帐户设置</th>
	</tr>

	 <tr>
		<td colspan="1" align="left"></td>
		<td>开启：<input type="radio" name ="start" class='radio' value="1"  <?php if($rt['status']){echo 'checked';}?> />
		    关闭：<input type="radio" name="start" class='radio' value="0"  <?php if(!$rt['status']){echo 'checked';}?> /></td>
	</tr>
	<tr>
		<td class="label" width="15%">机构代码:</td>
		<td width="85%">
        <input name="Id" id="Id"  type="text" style="width:315px;" value="<?php echo $config['Id']?>">
		</td>
	  </tr>
	  <tr>
		<td class="label">账号名:</td>
		<td>
		<input name="Name" id="Name"  type="text" style="width:315px;" value="<?php echo $config['Name']?>">
		</td>
	  </tr>
	  <tr>
		<td class="label">密码:</td>
		<td>
		<input name="Psw" id="Psw"  type="password" style="width:315px;" value="<?php echo $config['Psw']?>">
		</td>
	  </tr>
	  <tr>
		<td class="label">(客户)付款成功短信模板:</td>
		<td>
		<textarea name="tmp_order" id="tmp_order"  type="text" style="width:315px;" ><?php echo $config['tmp_order']?></textarea>
		</td>
	  </tr>
	    <tr>
		<td class="label">(客户)发货通知短信模板:</td>
		<td>
		<textarea name="tmp_goods" id="tmp_goods"  type="text" style="width:315px;" ><?php echo $config['tmp_goods']?></textarea>
		</td>
	  </tr>
	   <tr>
		<td class="label">(客户)提现短信模板:</td>
		<td>
		<textarea name="tmp_cash" id="tmp_cash"  type="text" style="width:315px;" ><?php echo $config['tmp_cash']?></textarea>
		</td>
	  </tr>
	   <tr>
		<td class="label">(商家)付款成功短信模板:</td>
		<td>
		<textarea name="tmp_b_order" id="tmp_b_order"  type="text" style="width:315px;" ><?php echo $config['tmp_b_order']?></textarea>
		</td>
	  </tr>
	  <tr>
	    <td>
		</td>
	    <td>
		<div  class="red">注：请使用@ordersn替换订单号;@date替换日期;@express替换快递名;@number替换快递号;@price替换价格;@pname替换产品名;@name替换客户名;@cardid替换银行账号
		不要超过'300'字 否则收取信息可能出错 </div>
		</td>
	  </tr>
	  <tr>
		<td class="label">帐户信息:</td>
		<td>
		<span><span>冲值数量：</span><span class="red" id="total"><?php echo $data['Totaled']?></span></span>
		<span class="col"><span>已使用数量：</span> <span class="red" id="used"><?php echo $data['Sended']?></span></span>
		<span class="col"><span>可使用数量：</span><span class="red" id="curnum"><?php echo $data['Balance']?></span></span>
		</td>
	   </tr>
	  <tr>
		<td>&nbsp;</td>
		<td>
		<input name="sms_id" value="<?php echo $rt['sms_id']?>"  id="sms_id" type="hidden"/>
		<input name="action" id ="action" value="ajax_update" type="hidden"/>
		<input name="sms_save" id="sms_save" value="保存" type="button">
		</td>
	  </tr>
	 </table>
	</form>
	<script type="text/javascript">
		$(function(){
		    $("#sms_save").click(function(){
			    var Id = $("#Id").val();
				var Name = $("#Name").val();
				var Psw = $("#Psw").val();
				var start = $("input:radio:checked").val();
				var tmp_b_order = $("#tmp_b_order").val();
				var tmp_order = $("#tmp_order").val();
				var tmp_goods = $("#tmp_goods").val();
				var tmp_cash = $("#tmp_cash").val();
				if(Id == ''){
					alert('机构代码不能为空');
				   return false;
				}
				if(Name == ''){
				   alert('账号名不能为空');
				   return false;
				}
				if(Psw == ''){
				   alert('密码不能为空');
				   return false;
				}
		
				$.ajax({
				    url:'/admin/smsconfig.php?action=ajax_update',
					type:'post',
					data:{Id : Id , Name : Name , Psw : Psw , tmp_b_order :tmp_b_order,tmp_order:tmp_order,tmp_goods:tmp_goods,tmp_cash:tmp_cash,action : $("#action").val(), sms_id:$("#sms_id").val(),start : start},
					dataType:'json',
					success:function(data){
						if(data.success){
						   $("#total").html(data.total);
						   $("#used").html(data.used);
						   $("#curnum").html(data.curnum);
						   alert('更新成功');
						}else{
						   alert(data.msg);
						}
					},
					error : function(data){
					
					}
				});
				return false;
			});
			
		})
	</script>
</div>