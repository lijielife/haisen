<?php $rt = $this->action('daili','get_diali_info');?>
<div class="clt1-left">
		<div style="border:1px solid #CCC;">
				<img src="<?php echo $this->img('houtai_03.jpg');?>">
		</div>
</div>
<div class="clt1-right">
	<p><a href="<?php echo SITE_URL.'daili.php?act=dailiinfo';?>"><?php echo $rt['mobile_phone'];?></a></p>
	<p><?php echo $rt['nickname'];?></p>
	<p>高级代理商</p>
</div>
<div class="clear"></div>
<div class="container-left-top2" style="padding-left:19px;">
	<div style="background:url(<?php echo $this->img('houtai_13.png');?>) no-repeat;height:20px; margin-bottom:8px;">
		<div style=""><span style="font-size:12px;color:#797979; padding-left:30px; line-height:20px;font-family: '微软雅黑';">账户余额：<a href="#" class="menu_top_a"><?php echo $rt['money_ucount'];?></a>&nbsp;元</span></div>
</div>
	<div style="background:url(<?php echo $this->img('houtai_16.png');?>) no-repeat; height:20px;margin-bottom:8px;">
		<div style=""><span style="font-size:12px;color:#797979; padding-left:30px; line-height:20px;font-family: '微软雅黑';">我的邀请数：<a href="#" class="menu_top_a"><?php echo $rt['share_ucount'];?></a>&nbsp;个</span></div>
</div>     
 <div style="background:url(<?php echo $this->img('houtai_25.png');?>) no-repeat;height:20px;">
		<div style=""><span style="font-size:12px;color:#797979; padding-left:30px; line-height:20px;font-family: '微软雅黑';">成功用户数：<a href="#" class="menu_top_a"><?php echo $rt['guanzhu_ucount'];?></a>&nbsp;个</span></div>
</div>    
</div>
<div class="nav_left">
	<dl>
		<dt>
			<a href="<?php echo SITE_URL.'daili.php?act=dailiinfo';?>" style="background:url(<?php echo $this->img('menubg1_03.png');?>);height:37px;  line-height:37px;padding-left:55px; font-family:'微软雅黑';font-size:14px" id="a-color">我的资料</a>
		</dt>
		<dt>
			<a href="<?php echo SITE_URL.'daili.php?act=updatepass';?>" style="background:url(<?php echo $this->img('menubg1_08.png');?>);height:37px;  line-height:37px;padding-left:55px; font-family:'微软雅黑';font-size:14px" id="a-color">修改密码</a>
		</dt>
		<dt>
			<a href="<?php echo SITE_URL.'daili.php?act=dailisiteset';?>" style="background:url(<?php echo $this->img('menubg1_06.png');?>);height:37px;  line-height:37px;padding-left:55px; font-family:'微软雅黑';font-size:14px" id="a-color">站点设置</a>
		</dt>
		<dt>
			<a href="<?php echo SITE_URL.'daili.php?act=dailiads';?>" style="background:url(<?php echo $this->img('menubg1_09.png');?>);height:37px;  line-height:37px;padding-left:55px; font-family:'微软雅黑';font-size:14px" id="a-color">广告管理</a>
		</dt>
		<dt>
			<a onclick="return confirm('确定退出吗')" href="<?php echo SITE_URL.'daili.php?act=logout';?>" style="background:url(<?php echo $this->img('menubg1_10.png');?>);height:37px;  line-height:37px;padding-left:55px; font-family:'微软雅黑';font-size:14px" id="a-color">安全退出</a>
		</dt>
	</dl>
</div>