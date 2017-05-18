<?php
$thisurl = ADMIN_URL.'user.php'; 
?>
<style type="text/css"> .contentbox table th{ font-size:12px; text-align:center}</style>
<div class="contentbox">
     <table cellspacing="2" cellpadding="5" width="100%" style="margin-bottom:10%;">
	 <tr>
		<th colspan="6" align="left" style="text-align:left">分红订单列表</th>
	</tr>
	<tr>
	  
	   <th>订单号</th>
	   <th>购买者</th>
	   <th>订单金额</th>
	   <th>确认收货时间</th>
	   
	</tr>
	<?php if(!empty($order_list))foreach($order_list as $row){?>
	<tr>
	
	<td width="30%"><a href="goods_order.php?type=order_info&id=<?php echo $row['order_id'];?>"><?php echo $row['order_sn'];?></a></td>
	<td width="25%"><?php echo $row['consignee'];?></td>
	<td width="25%"><?php echo $row['order_amount'];?></td>
	<td><?php echo date('Y-m-d H:i:s',$row['shipping_time']);?></td>
	
	</tr>
   
	<?php } ?>
     <tr>
     <td colspan="4" align="right">营业额：<?php echo $bonus_info['sum'];?></td>
    </tr>
	 </table>
	 <table cellspacing="2" cellpadding="5" width="100%">
	 <tr>
		<th colspan="6" align="left" style="text-align:left">分红人员列表</th>
	</tr>
	<tr>
	  
	   <th>用户名</th>
	   <th>用户等级</th>
	   <th>分红金额</th>
	   <th>分红时间</th>
	   
	</tr>
	<?php if(!empty($user_list))foreach($user_list as $row){?>
	<tr>
	
	<td width="30%"><a href="user.php?type=info&id=<?php echo $row['user_id'];?>&goto=list"><?php echo $row['user_name'];?></a></td>
	<td width="25%"><?php echo $row['user_rank'];?></td>
	<td width="25%"><?php echo $row['bonus'];?></td>
	<td><?php echo date('Y-m-d H:i:s',$row['linetime']);?></td>
	</tr>
	<?php } ?>
     <tr>
     <td colspan="4" align="right">分红：<?php echo $bonus_info['percent'];?></td>
    </tr>
	 </table>
</div>
<script type="text/javascript">
//全选
 $('.quxuanall').click(function (){
      if(this.checked==true){
         $("input[name='quanxuan']").each(function(){this.checked=true;});
		 document.getElementById("bathdel").disabled = false;
	  }else{
	     $("input[name='quanxuan']").each(function(){this.checked=false;});
		 document.getElementById("bathdel").disabled = true;
	  }
  });
 
</script>