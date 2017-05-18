<div id="wrap">
	<div class="clear7"></div>
	<?php $this->element('user_menu');?>
    <div class="m_right" >
    	<h2 class="con_title">订单管理</h2>
		 <div class="right_top">
		  <table width="100%" border="0" class="orderlist">
		  <tr>
			<td class="order_title">我的用户订单
				<select name="dt" style="margin-left:10px;">
					<option value="0">全部订单</option>
                      <option value="2592000" <?php echo $rt['time']=='2592000' ? 'selected="selected"' : "";?>>近一个月订单</option>
					  <option value="15552000" <?php echo $rt['time']=='15552000' ? 'selected="selected"' : "";?>>近六个月订单</option>
					  <option value="31104000" <?php echo $rt['time']=='31104000' ? 'selected="selected"' : "";?>>近一年订单</option>
                </select> 
				<?php 
				///$status_option[11] = '全部订单';
				//$status_option[200] = '待付款订单';
				$status_option[210] = '待发货订单';
				$status_option[222] = '已发货订单';
				$status_option[214] = '已完成订单';
				$status_option[1] = '取消订单';
				$status_option[4] = '无效订单';
				$status_option[3] = '退货订单';
				//$status_option[2] = '退款订单';
				?>  
			<select id="selectNode1" name="status">
				 <option value="-1">全部订单</option>
				<?php 
				$se = 'selected="selected"';
				foreach($status_option as $k=>$var){
					echo '<option value="'.$k.'" '.($k==$rt['status']&&isset($rt['status']) ? $se : "").'>'.$var.'</option>';				
				}
				?>
			</select>
			  <input name="kk" type="text" value="<?php echo isset($rt['keyword']) ? $rt['keyword'] : "";?>" style="margin-left:10px; width:100px;" align="absmiddle"/>
              <input  class="ordersearch" type="button" value="查询" style="margin-left:10px; width:50px; height:25px; cursor:pointer" align="absmiddle" onclick="gerorder()"/>
		</td>
		  </tr>
		</table>
		 </div>
		 <div class="clear"></div>
		 <style type="text/css">
		 .AJAXORDERLIST .cr2 a{ color:#666; text-decoration:none}
		 .AJAXORDERLIST .cr2 a:hover{ color:#222; text-decoration:underline}
		 .order input{ padding:3px; cursor:pointer}
		 </style>
		 <div class="AJAXORDERLIST order">
			  <?php $this->element("ajax_suppliers_orderlist",array('rt'=>$rt));?>
		 </div>
    </div>
    <div class="clear"></div>
</div>
<div class="clear7"></div>
<?php
	$thisurl = SITE_URL.'ajaxfile/suppliers.php';
?>
<script type="text/javascript">
$('select[name="status"]').change(function(){
	get_suppliers_order_page_list('1',$(this).val(),$('select[name="dt"]').val(),$('input[name="kk"]').val());
});
$('select[name="dt"]').change(function(){
	get_suppliers_order_page_list('1',$('select[name="status"]').val(),$(this).val(),$('input[name="kk"]').val());
});
function gerorder(){
	get_suppliers_order_page_list('1',$('select[name="status"]').val(),$('select[name="dt"]').val(),$('input[name="kk"]').val());
}

  $('.order_action').live('click',function(){
			
			createwindow();
			oid = $(this).parent().attr('id');
			id = $(this).attr('id');
			val = $(this).val();
			JqueryDialog.Open('订单系统提醒你',SITE_URL+'pop/orderop.php?oid='+oid+'&status='+id+'&val='+val,400,230,'frame');
			removewindow();
			return false;
			/*$.post('<?php echo $thisurl;?>',{action:'order_op',id:id,type:na},function(data){
				removewindow();
				if(data == ""){
					location.reload();
				}else{
					alert(data);
				}
			});*/
		
		return false;
   });
   
   function setbutton(data,orderid,status){
		$('.setbutton_'+orderid).html(data);
		$('.status_'+orderid).html(status);
   }
   
   $('.order_print').live('click',function(){
   		var order_id = $(this).parent().attr('id');
		$.post('<?php echo $thisurl;?>',{action:'return_order_text',order_id:order_id},function(data){
			removewindow(); 
			setbutton(data.message,data.orderid,data.status);
		}, "json");
		window.open(SITE_URL+'suppliers.php?act=suppliers_orderinfo&order_id='+order_id+'&tt=print');
		return false;
   });
</script>