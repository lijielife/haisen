<div id="wrap">
	<div class="clear7"></div>
	<?php $this->element('user_menu');?>
    <div class="m_right" >
    	<h2 class="con_title">客户订单</h2>
		 <div class="right_top">
		  <table width="100%" border="0" class="orderlist">
		  <tr>
			<td class="order_title">客户订单 
				<select name="dt" style="margin-left:10px;">
					<option value="0">全部订单</option>
                      <option value="2592000" <?php echo $rt['time']=='2592000' ? 'selected="selected"' : "";?>>近一个月订单</option>
					  <option value="15552000" <?php echo $rt['time']=='15552000' ? 'selected="selected"' : "";?>>近六个月订单</option>
					  <option value="31104000" <?php echo $rt['time']=='31104000' ? 'selected="selected"' : "";?>>近一年订单</option>
                </select> 
				<?php 
				/*$status_option[11] = '待确认';
				$status_option[200] = '待付款订单';
				$status_option[210] = '待发货订单';
				$status_option[222] = '已发货订单';
				$status_option[214] = '已完成订单';
				$status_option[1] = '取消订单';
				$status_option[4] = '无效订单';
				$status_option[3] = '退货订单';
				$status_option[2] = '退款订单';*/
				$status_option[210] = '待发货订单';
				$status_option[222] = '已发货订单';
				$status_option[214] = '已完成订单';
				$status_option[1] = '取消订单';
				$status_option[4] = '无效订单';
				$status_option[3] = '退货订单';
				?>  
				<select id="selectNode1" name="status">
				 <option value="-1">订单状态</option>
				<?php 
				$se = 'selected="selected"';
				foreach($status_option as $k=>$var){
					echo '<option value="'.$k.'" '.($k==$rt['status']&&isset($rt['status']) ? $se : "").'>'.$var.'</option>';
				}
				?>
				</select>
				<input name="kk" type="text" value="<?php echo isset($rt['keyword']) ? $rt['keyword'] : "";?>" style="margin-left:10px; width:100px;" align="absmiddle"/>
				<input type="submit" name="search" value="提交" style="padding:2px; cursor:pointer"/>	
		</td>
		  </tr>
		  <tr>
			<td class="weg">所有订单<b>(<?php echo $rt['userinfo']['all_ordercount'];?>)</b> 　 需评论订单<b>(<?php echo !empty($rt['userinfo']['need_comment_count']) ? $rt['userinfo']['need_comment_count'] : 0;?>)</b>　 待处理订单<b>(<?php echo $rt['userinfo']['daichuli_ordercount'];?>)</b>　 待发货订单<b>(<?php echo $rt['userinfo']['shopping_ordercount'];?>)</b>　 已发货订单<b>(<?php echo $rt['userinfo']['yifahuo_ordercount'];?>)</b>　 已完成订单<b>(<?php echo $rt['userinfo']['haicheng_ordercount'];?>)</b>　 已取消订单<b>(<?php echo $rt['userinfo']['quxiao_ordercount'];?>)</b></td>
		  </tr>
		</table>
		 </div>
		 <div class="clear"></div>
		 <style type="text/css">
		 .AJAXORDERLIST .cr2 a{ color:#666; text-decoration:none}
		 .AJAXORDERLIST .cr2 a:hover{ color:#222; text-decoration:underline}
		 </style>
		 <div class="AJAXORDERLIST order">
			  <?php $this->element("ajax_other_orderlist",array('rt'=>$rt));?>
		 </div>
    </div>
    <div class="clear"></div>
</div>
<div class="clear7"></div>

<script type="text/javascript">
	<!---订单操作-->
	//$('.ordersearch').live('click',function(){
		//get_order_page_list('1');
	//});
	
	$('select[name="status"]').change(function(){
		get_store_page_list('1',$(this).val());
	});
	
	$('select[name="dt"]').change(function(){
		get_store_page_list('1',$('select[name="status"]').val());
	});
	
	$('input[name="kk"]').change(function(){
		get_store_page_list('1',$('select[name="status"]').val());
	});
	
	$('input[name="search"]').change(function(){
		get_store_page_list('1',$('select[name="status"]').val());
	});

   $('.AJAXORDERLIST  .oporder').live('click',function(){
		if(confirm("确定吗？")){
			createwindow();
			id = $(this).attr('id');
			na = $(this).attr('name');
			$.post(SITE_URL+'store.php',{action:'order_op_store',id:id,type:na},function(data){
				removewindow();
				if(data == ""){
					location.reload();
				}else{
					alert(data);
				}
			});
		}
		return false;
   });
   
   function load_suppliers_address(sid,obj){
   		$.post(SITE_URL+'user.php',{action:'get_suppliers_address',suppliers_id:sid},function(data){
			$(obj).parent().html(data);
		});
		return false;
   }
   
   //打印
    $('.order_print').live('click',function(){
   		var order_id = $(this).parent().attr('id');
		var suppliers_id = $(this).attr('id');
		window.open(SITE_URL+'user.php?act=orderinfo&order_id='+order_id+'&tt=print&sid='+suppliers_id);
		return false;
   });
   
</script>
