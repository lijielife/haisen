<link type="text/css" rel="stylesheet" href="<?php echo SITE_URL;?>css/menber.css" media="all" />

<div class="content">
<div class="cart3">

<style>
.succmess h2{ font-size:16px; color:#333}
</style>
<div class="succmess">
	   <form id="form1" name="form1" method="post" action="<?php echo SITE_URL.'/pay/';?>alipayto.php">
				<p style="height:180px;"></p>
				<h2 style="text-align:center; margin-top:50px;">请记住您的订单号:<font color="red"><?php echo $rt['order_sn'];?></font>，您的应付款总金额为: <font color="red">￥<?php echo $rt['total'];?></font>，&nbsp;额外邮费：<font color="red">￥<?php echo $rt['shipping_fee'];?></font></h2>
				<input type="hidden" name="out_trade_no" value="<?php echo $rt['order_sn'];?>" />
				<input type="hidden" name="subject" value="商城订单" />
				<input type="hidden" name="total_fee" value="<?php echo $rt['total'];?>"/> 
		</form>  
</div>

<div class="clear"></div>