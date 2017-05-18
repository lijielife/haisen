<div id="home">
	<div id="header">
		<div class="logo" style="height:28px; padding-top:10px; background:url(<?php echo $this->img('xy.png');?>) 10px 8px no-repeat"><span onclick=" history.go(-1);">&nbsp;</span></div>
		<div class="shoptitle"><span><?php echo NAVNAME;?></span></div>
		<div class="logoright">
			<div>
			<a href="javascript:;" onclick="ajax_show_menu()"></a>
			<div class="showmenu">
					<p><a href="<?php echo ADMIN_URL;?>">返回首页</a></p>
					<p><a href="<?php echo ADMIN_URL.'user.php';?>">会员中心</a></p>
					<p><a href="<?php echo ADMIN_URL.'user.php?act=orderlist';?>">我的订单</a></p>
					<p><a href="<?php echo ADMIN_URL.'mycart.php';?>">购&nbsp;物&nbsp;车</a></p>
					<p style="border:none"><a href="<?php echo Import::basic()->thisurl();;?>">刷新页面</a></p>
			</div>
			</div>
		</div>
	</div>
</div>	
<script type="text/javascript">
function ajax_show_menu(){
	$(".showmenu").toggle();
}
</script>
