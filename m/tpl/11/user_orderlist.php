<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/11/css.css" media="all" />
<?php $this->element('11/top',array('lang'=>$lang)); ?>
<style type="text/css">
.pw,.pwt{
height:26px; line-height:26px;
border: 1px solid #ddd;
border-radius: 5px;
background-color: #fff; padding-left:5px; padding-right:5px;
-moz-border-radius:5px;/*仅Firefox支持，实现圆角效果*/
-webkit-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
-khtml-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
border-radius:5px;/*仅Opera，Safari,Chrome支持，实现圆角效果*/
}
.pw{ width:90%;}
.usertitle{
height:22px; line-height:22px;color:#666; font-weight:bold; font-size:14px; padding:5px;
border-radius: 5px;
background-color: #ededed; padding-left:5px; padding-right:5px;
-moz-border-radius:5px;/*仅Firefox支持，实现圆角效果*/
-webkit-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
-khtml-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
border-radius:5px;/*仅Opera，Safari,Chrome支持，实现圆角效果*/
}
.pages{ margin-top:20px;}
.pages a{ background:#ededed; padding:2px 4px 2px 4px; border-bottom:2px solid #ccc; border-right:2px solid #ccc; margin-right:5px;}
#main table td:hover{ background:#fafafa}
#main table td p a{ line-height:18px;display:block; padding:1px 5px 1px 5px; float:left; background:#fafafa; border-bottom:2px solid #d5d5d5;border-right:2px solid #d5d5d5;border-radius:10px; margin-right:5px;border-top:1px solid #ededed;border-left:1px solid #ededed; font-size:12px}

#main table td p a.butt-cart2 {
display: inline-block;
font-size: 15px;
width: 70%;
height: 34px;
line-height: 34px;
margin: 6px auto 5px auto;
padding: 0;
color: #FFF;
border-radius: 10px;
background: #32a000;
text-align:center;
 background:#015a9e;
}
</style>
<div id="main" style="min-height:300px">
	 <table  width="100%" border="0" cellpadding="0" cellspacing="0" style="line-height:25px; background:#EEE; overflow:hidden">
	  <?php
	   if(!empty($rt['orderlist'])){
	   foreach($rt['orderlist'] as $k=>$row){
	   ++$k;
	  ?>
		<tr>
		<td style="border-bottom:1px solid #E0E0E0; padding-left:10px; padding-right:10px">
		<!--<p style="color:#5286B7">商品名称:<font color="#60ACDC"><?php echo $row['goods'][0]['goods_name'];?></font></p>-->
		<p style="color:#5286B7">订单号码:<font color="#60ACDC"><?php echo $row['order_sn'];?></font></p>
		<p style="color:#5286B7">订单金额:<font color="#3370b3"><?php echo $row['total_fee'];?>元</font></p>
		<p style="color:#5286B7">下单时间:<font color="#60ACDC"><?php echo date('Y-m-d H:i:s',$row['add_time']);?></font></p>
		<p style="color:#5286B7">订单状态:<font color="#60ACDC"><?php echo $row['status'];?></font><?php if($row['type']!='3'){ if($row['shipping_status']=='2' || $row['shipping_status']=='5'){?><a href="http://m.kuaidi100.com/index_all.html?type=<?php echo $row['shipping_code'];?>&postid=<?php echo $row['sn_id'];?>" style="float:right; margin-right:10px; color:#0066CC">查看物流</a><?php } }else{?><a href="javascript:;" style="float:right; margin-right:10px; color:#0066CC" onclick="return js_show_sn('<?php echo $row['sn'];?>','<?php echo $row['pass'];?>',this)">查看卡密</a><?php }?></p>
		<p>
		<?php echo $row['op'];?>
		<?php if($row['pay_status']=='0' && $row['order_status']!='1'){?>
		&nbsp;&nbsp;<a href="<?php echo ADMIN_URL.'mycart.php?type=fastpay2&oid='.$row['order_id'];?>">立即支付</a>&nbsp;&nbsp;<a href="<?php echo ADMIN_URL.'mycart.php?type=pay2&oid='.$row['order_id'];?>">找人代付</a>
		<?php } ?>
		<div class="clear"></div>
		</p>
		<p style="padding-top:10px; text-align:center">
			<a href="<?php echo ADMIN_URL.'user.php?act=orderinfo2014&order_id='.$row['order_id'];?>" style=" float:none; border:none" class="butt-cart2">详情</a>
		</p>
		<p style="margin-top:5px; padding-bottom:10px;"></p>
		</td>
	  </tr>
	  <?php } 
	  } ?>
	  <tr>
	  <td style="text-align:left;" class="pagesmoney">
	  <?php if(!empty($rt['orderpage'])){?>
	  <div class="pages"><?php echo $rt['orderpage']['showmes'];?><?php echo $rt['orderpage']['first'].$rt['orderpage']['previ'].$rt['orderpage']['next'].$rt['orderpage']['Last'];?></div>
	  <?php } ?>
	  </td>
	  </tr>
	</table>

</div>
<script type="text/javascript">
function js_show_sn(sn,pass,obj){
	str = sn!="" ? '卡号:'+sn : '';
	str += pass!="" ? '卡密:'+pass : '';
	$(obj).html(str);
}

function ger_ress_copy(type,obj,seobj){
	parent_id = $(obj).val();
	if(parent_id=="" || typeof(parent_id)=='undefined'){ return false; }
	$.post(SITE_URL+'user.php',{action:'get_ress',type:type,parent_id:parent_id},function(data){
		if(data!=""){
			$(obj).parent().find('#'+seobj).html(data);
			if(type==3){
				$(obj).parent().find('#'+seobj).show();
			}
			if(type==2){
				$(obj).parent().find('#select_district').hide();
				$(obj).parent().find('#select_district').html("");
			}
		}else{
			alert(data);
		}
	});
}

$('.oporder').live('click',function(){
		if(confirm("确定吗？")){
			createwindow();
			id = $(this).attr('id');
			na = $(this).attr('name');
			$.post('<?php echo ADMIN_URL.'user.php';?>',{action:'ajax_order_op_user',id:id,type:na},function(data){
				removewindow();
				if(data == ""){
					window.location.href = '<?php echo Import::basic()->thisurl();?>';
				}else{
					alert(data);
				}
			});
		}
		return false;
});
</script>
<?php $this->element('11/footer',array('lang'=>$lang)); ?>