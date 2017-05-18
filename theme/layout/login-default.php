<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->title();?></title>
<?php echo $this->meta();?>
<?php echo $this->css(array('comman.css','style.css'));?>
<?php  echo '<script type="text/javascript">var SITE_URL="'.SITE_URL.'";</script>'."\n";?>
<?php echo $this->js(array('jquery.min.js','common.js'));?>
</head>
<body>
	<!--[if !IE]>   top bar    <![endif]-->
	<div class="top_bar">
		<div class="top_bar_box">
		<span id="user_name">您好</span>，欢迎来到E姐商城！<span id="login">
		<?php
		$uid = $this->Session->read('User.uid');
		if(empty($uid )){
		?>
		<a href="<?php echo get_url('马上登录',0,SITE_URL.'user.php?act=login','login',array('user','login'));?>">请登录</a> ，新用户？ <a href="<?php echo get_url('免费注册',0,SITE_URL.'user.php?act=register','register',array('user','register'));?>">免费注册</a>
		<?php }else{?>
		<a href="<?php echo SITE_URL.'user.php';?>">会员中心</a>&nbsp;|&nbsp;<a href="<?php echo SITE_URL.'user.php?act=logout';?>">退出登录</a>
		<?php } ?></span>
		<ul>
		<li><a href="<?php echo SITE_URL.'user.php?act=myorder';?>">我的订单</a></li>
		<li><a href="<?php echo SITE_URL.'user.php?act=myorder';?>">网站地图</a></li>
		<li><a href="<?php echo get_url('帮助中心',0,SITE_URL.'about.php','category',array('about','index'));?>">帮助中心</a></li>
		<li><a href="javascript:;" onclick="AddFavorite(location.href, document.title)">收藏本站</a></li>
		<li><a href="javascript:;" onclick="SetHome(this,'http://'+location.hostname+(location.port!=''?':':'')+location.port)">设为首页</a></li>
		</ul>
		</div>
	</div>
	<!--[if !IE]>   top bar    <![endif]-->
	<?php echo $this->content();?>
	<?php $this->element('footer',array('lang'=>$lang)); ?>
</body>
</html>
