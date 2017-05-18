<div id="wrap">
	<div class="clear7"></div>
	<?php $this->element('user_menu');?>
    <div class="m_right">
    	<h2 class="con_title">我的用户订单商品</h2>
		 <div class="right_top">
		 <style type="text/css">
		 .right_top table th{font-size:12px; font-weight:400}
		 .right_top table input,.right_top table select{ border:1px solid #ccc}
		 </style>
		 <form action="" method="get">
		 <input type="hidden" name="act" value="product_goods_order" />
		 <table cellpadding="1" cellspacing="2" border="0" width="100%" style="line-height:30px; background-color:#EEF2F5">
			<tr style="background-color:#fff">
				<th colspan="7" align="left">
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
				</th>
			</tr>
			<tr style="background-color:#fff"><th colspan="7" align="left">
    	<img src="<?php echo $this->img('icon_search.gif');?>" alt="SEARCH" width="26" border="0" height="22" align="absmiddle">
	   配送店<select name="psid">
		<option value="">--选择配送店--</option>
		 <?php 
		if(!empty($pslist)){
		 foreach($pslist as $row){ 
		?>
        <option value="<?php echo $row['user_id'];?>" <?php if( isset($_GET['psid'])&& $_GET['psid']==$row['user_id']){ echo 'selected="selected""'; } ?>><?php echo $row['user_name'];?></option>
		<?php
		 }//end foreach
		} ?>
      </select>
		
		订单号<input name="order_sn"  size="15" type="text" value="<?php echo isset($_GET['order_sn']) ? $_GET['order_sn'] : "";?>">
		<!--收货人<input name="consignee"  size="15" type="text" value="<?php echo isset($_GET['consignee']) ? $_GET['consignee'] : "";?>">-->
		订单状态 
		<?php 
		$status_option[-1] = '请选择';
		$status_option[101] = '无打印';
		$status_option[102] = '已打印';
		$status_option[103] = '取消';
		$status_option[104] = '退货';
		$status_option[105] = '换货';
		?>  
		 <select name="status" >
		 <!--2:确认订单 0:没支付 0:没发货-->
	        <?php 
			$se = 'selected="selected"';
			foreach($status_option as $k=>$var){
				echo '<option value="'.$k.'" '.($k==$_GET['status']&&isset($_GET['status']) ? $se : "").'>'.$var.'</option>';
			}
			?>
		  </select>
		<input value=" 搜索 " class="order_search" type="submit">
	</th></tr>
    <tr style="background-color:#fff">
	   <th width="80"><label><input type="checkbox" class="quxuanall" value="checkbox" />选择</label></th>
	   <th>商品编号</th>
	   <th>商品名称</th>
	   <th>商品数量</th>
	   <th>批发单价</th>
	   <th>批发总价</th>
	   <th>打印状态</th>
	</tr>
	
	<?php 
	if(!empty($orderlist)){ 
	foreach($orderlist as $row){
	?>
	<tr style="background-color:#fff">
	<td align="center"><input type="checkbox"  value="<?php echo $row['order_id'];?>" class="gids"/></td>
	<td><?php echo $row['goods_bianhao'];?></td>
	<td><?php echo $row['goods_name'];?></td>
	<td><?php echo $row['numb'].$row['goods_unit'];?></td>
	<td>￥<b style="color:#FF0000"><?php echo $row['goods_price'];?></b></td>
	<td>￥<b style="color:#FF0000"><?php echo $row['numb']*$row['goods_price'];?></b></td>
	<td>
	<?php echo $row['is_print']=='1'?'<span style="color:#fe0000">已存在打印</span>':'<span style="color:blue">未打印</span>';?>
	</td>
	</tr>
	<?php
	 } ?><?php } ?>
	<?php if($_GET['psid'] != '') {?> 
		 <tr style="background-color:#fff">
			<td colspan="7">
				<b>配送店：</b><?php echo $shoplist['user_name'];?>&nbsp;&nbsp;<span>电话：</span><?php echo  ($shoplist['home_phone'] == '') ? '暂无': $shoplist['home_phone'];?>&nbsp;&nbsp;<span>手机：</span><?php echo  ($shoplist['mobile_phone'] == '') ? '暂无': $shoplist['mobile_phone'];?>&nbsp;&nbsp;<span>地址：</span><?php echo $shoplist['province'];?>&nbsp;<?php echo $shoplist['city'];?>&nbsp;<?php echo $shoplist['district'];?>&nbsp;<?php echo $shoplist['town'];?>&nbsp;<?php echo $shoplist['village'];?>&nbsp;<?php echo $shoplist['address'];?>
			</td>
		</tr>
	<?php }?> 
	<tr style="background-color:#fff; text-align:left">
		<td align="center"><label><input type="checkbox" class="quxuanall" value="checkbox" />选择</label></td>
		<td colspan="6">
		<input value="批量打印" class="order_print" id="order_print" type="button" style="padding:3px; cursor:pointer" disabled="disabled"><em>备注：搜索最近一天打印，默认为最近一天订单商品</em>
		</td>
	</tr>
	<tr style="background-color:#fff" class="con_box">
		<td colspan="7">
		<?php $this->element('page',array('pagelink'=>$pagelink));?>
		</td>
	</tr>
	 </table>
	 </form>
		 </div>
    </div>
    <div class="clear"></div>
</div>
<div class="clear7"></div>
<?php
	$thisurl = SITE_URL.'suppliers.php';
?>

<script type="text/javascript">
//全选
 $('.quxuanall').click(function (){
      if(this.checked==true){
         $("input[class='gids']").each(function(){this.checked=true;});
		 document.getElementById("order_print").disabled = false;
	  }else{
	     $("input[class='gids']").each(function(){this.checked=false;});
		 document.getElementById("order_print").disabled = true;
	  }
  });
  
  //是删除按钮失效或者有效
  $('.gids').click(function(){ 
  		var checked = false;
  		$("input[class='class']").each(function(){
			if(this.checked == true){
				checked = true;
			}
		}); 
		document.getElementById("order_print").disabled = !checked;
  });
   
   //打印
   $('.order_print').click(function(){
   		window.open('<?php echo Import::basic()->thisurl();?>&print=1');
		return false;
   });
</script>