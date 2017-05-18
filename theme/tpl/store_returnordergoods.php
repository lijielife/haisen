<div id="wrap">
	<div class="clear7"></div>
	<?php $this->element('user_menu');?>
    <div class="m_right" >
    	<h2 class="con_title">客户的退换货单</h2>
		<form method="get" action="">
		<input type="hidden" value="store_returnordergoods" name="act">
		<table border="0" cellpadding="2" cellspacing="3">
			<tr style="background-color:#fff">
				<td align="left">
					选择时间：<input type="text" id="EntTime1" name="date1" onclick="return showCalendar('EntTime1', 'y-mm-dd');" value="<?php echo isset($_GET['date1'])?$_GET['date1']:date('Y-m-d',mktime());?>"/>
					<select name="t1" style="border:1px solid #ccc; margin-top:3px">
					<?php for($i=1;$i<=24;$i++){?>
						<option value="<?php echo $i-1;?>"<?php if(!isset($_GET['t1'])&&$i==1){echo ' selected="selected"';}elseif($_GET['t1']==$i-1){ echo ' selected="selected"';}?>><?php echo $i;?>:00</option>
					<?php } ?>
				    </select>
					至&nbsp;
					<input type="text" id="EntTime2" name="date2" onclick="return showCalendar('EntTime2', 'y-mm-dd');" value="<?php echo isset($_GET['date2'])?$_GET['date2']:date('Y-m-d',mktime());?>"/>
					<select name="t2" style="border:1px solid #ccc; margin-top:3px">
					<?php for($i=1;$i<=24;$i++){?>
						<option value="<?php echo $i-1;?>"<?php if(!isset($_GET['t2'])&&$i==24){echo ' selected="selected"';}elseif($_GET['t2']==$i-1){ echo ' selected="selected"';}?>><?php echo $i;?>:00</option>
					<?php } ?>
				    </select>
					<input value=" 搜索 " class="order_search" type="submit" style="padding:3px; cursor:pointer" align="absmiddle"/>
				</td>
			</tr>
		</table>
		</form>
		 <style type="text/css">
		 .AJAXORDERLIST .cr2 a{ color:#666; text-decoration:none}
		 .AJAXORDERLIST .cr2 a:hover{ color:#222; text-decoration:underline}
		 </style>
		 <div class="AJAXORDERLIST order">
			  <?php $this->element("ajax_other_returnorderlist",array('rt'=>$rt));?>
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
   
  //退换货 
  $('.tuihuanhuo').live('click',function(){
			createwindow();
			id = $(this).attr('id');
			ar = id.split('-');
			oid = ar[1];
			gid = ar[0];
			JqueryDialog.Open('订单系统提醒你',SITE_URL+'pop/returngoodsop.php?gid='+gid+'&oid='+oid,400,245,'frame');
			removewindow();
			return false;
   });

	function setreturnbutton(vv,gid,oid){
		$('.set_'+gid+oid).val(vv);
	}
</script>
