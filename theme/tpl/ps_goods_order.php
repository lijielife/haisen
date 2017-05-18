<div id="wrap">
	<div class="clear7"></div>
	<?php $this->element('user_menu');?>
    <div class="m_right">
    	 <h2 class="con_title" style="text-align:left">我的用户订单配送商品</h2>
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
				<tr style="background-color:#fff">
				<th colspan="7" align="left">
				<img src="<?php echo $this->img('icon_search.gif');?>" alt="SEARCH" width="26" border="0" height="22" align="absmiddle">
			  供应商<select name="psid">
				<option value="">--选择供应商--</option>
				 <?php 
				if(!empty($uidlist)){
				 foreach($uidlist as $row){ 
				?>
				<option value="<?php echo $row['user_id'];?>" <?php if(isset($_GET['psid'])&&$_GET['psid']==$row['user_id']){ echo 'selected="selected""'; } ?>><?php echo $row['user_name'].(!empty($row['nickname']) ? '&nbsp;&nbsp;['.$row['nickname'].']' : "");?></option>
				<?php
				 }//end foreach
				} ?>
			 </select>
			
			订单号<input name="order_sn"  size="15" type="text" value="<?php echo isset($_GET['order_sn']) ? $_GET['order_sn'] : "";?>">
			收货人<input name="consignee"  size="15" type="text" value="<?php echo isset($_GET['consignee']) ? $_GET['consignee'] : "";?>">
			订单状态 
			<?php 
			$status_option[-1] = '请选择';
			//$status_option[101] = '无打印';
			//$status_option[102] = '已打印';
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
			</th>
		</tr>
	   <tr style="background-color:#fff">
		   <th width="80"><label><input type="checkbox" class="quxuanall" value="checkbox" />选择</label></th>
		   <th>商品编号</th>
		   <th>商品名称</th>
		   <th>商品数量</th>
		   <th>批发单价</th>
		   <th>批发总价</th>
		   <th>商品详情</th>
		</tr>
		<?php 
		if(!empty($orderlist)){ 
		foreach($orderlist as $row){
		?>
		<tr style="background-color:#fff">
		<td><input type="checkbox" name="quanxuan" value="<?php echo $row['order_id'];?>" class="gids"/></td>
		<td><?php echo $row['goods_bianhao'];?></td>
		<td><?php echo $row['goods_name'];?></td>
		<td><?php echo $row['numb'].$row['goods_unit'];?></td>
		<td >￥<b style="color:#FF0000"><?php echo $row['goods_price'];?></b></td>
		<td >￥<b style="color:#FF0000"><?php echo $row['numb']*$row['goods_price'];?></b></td>
		<td>
		<a href="<?php echo SITE_URL;?>suppliers.php?act=suppliers_goods_info&id=<?php echo $row['goods_id'];?>&t=<?php echo $t;?>" title="商品详情"><img src="<?php echo $this->img('icon_view.gif');?>" title="商品详情"/></a>&nbsp;
	
		</td>
		</tr>
		<?php
		 } ?>
		<?php } ?>
		<tr style="background-color:#fff">
			<td colspan="7" align="right"><?php $this->element('page',array('pagelink'=>$pagelink));?></td>
		</tr>
		 </table>
		</div>
    </div>	
    <div class="clear"></div>
</div>
<div class="clear7"></div>
<?php
	$thisurl = SITE_URL.'store.php';
?>

<script type="text/javascript">
//全选
 $('.quxuanall').click(function (){
      if(this.checked==true){
         $("input[name='quanxuan']").each(function(){this.checked=true;});
		 document.getElementById("bathdel").disabled = false;
		 document.getElementById("bathinvalid").disabled = false;
		 document.getElementById("bathcancel").disabled = false;
		 document.getElementById("bathconfirm").disabled = false;
	  }else{
	     $("input[name='quanxuan']").each(function(){this.checked=false;});
		 document.getElementById("bathdel").disabled = true;
		 document.getElementById("bathinvalid").disabled = true;
		 document.getElementById("bathcancel").disabled = true;
		 document.getElementById("bathconfirm").disabled = true;
	  }
  });
  
  //是删除按钮失效或者有效
  $('.gids').click(function(){ 
  		var checked = false;
  		$("input[name='quanxuan']").each(function(){
			if(this.checked == true){
				checked = true;
			}
		}); 
		document.getElementById("bathdel").disabled = !checked;
		document.getElementById("bathconfirm").disabled = !checked;
		document.getElementById("bathcancel").disabled = !checked;
		document.getElementById("bathinvalid").disabled = !checked;
  });
  
  //批量删除
   $('.bathop').click(function (){
   		if(confirm("确定操作吗？")){
			optype = $(this).attr('id');
			if(typeof(optype)=='undefined' || optype==""){ return false;}
			createwindow();
			var arr = [];
			$('input[name="quanxuan"]:checked').each(function(){
				arr.push($(this).val());
			});
			var str=arr.join('+'); ;
			$.post('<?php echo $thisurl;?>',{action:'bathop',type:optype,ids:str},function(data){
				removewindow();
				if(data == ""){
					location.reload();
				}else{
					alert(data);
					//location.reload();
				}
			});
		}else{
			return false;
		}
   });
 
   $('.delorder').click(function(){
   		ids = $(this).attr('id');
		thisobj = $(this).parent().parent();
		if(confirm("确定删除吗？")){
			createwindow();
			$.post('<?php echo $thisurl;?>',{action:'bathop',type:'bathdel',ids:ids},function(data){
				removewindow();
				if(data == ""){
					thisobj.hide(300);
				}else{
					alert(data);	
				}
			});
		}else{
			return false;	
		}
   });
   
   	$('.activeop').live('click',function(){
		star = $(this).attr('alt');
		gid = $(this).attr('id'); 
		type = $(this).attr('lang');
		obj = $(this);
		$.post('<?php echo $thisurl;?>',{action:'activeop',active:star,gid:gid,type:type},function(data){
			if(data == ""){
				if(star == 1){
					id = 0;
					src = '<?php echo $this->img('yes.gif');?>';
				}else{
					id = 1;
					src = '<?php echo $this->img('no.gif');?>';
				}
				obj.attr('src',src);
				obj.attr('alt',id);
			}else{
				alert(data);
			}
		});
	});
	
	//sous
	
</script>