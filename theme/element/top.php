<div class="header">
	<div class="headerbox">
		<div class="logo">
		<a href="<?php echo SITE_URL;?>"><img src="<?php echo !empty($lang['site_logo']) ? SITE_URL.$lang['site_logo'] : $this->img('logo.png');?>" height="100"/></a>
		</div>
		<div class="searchbox">
		  <form id="form1" name="form1" method="get" action="<?php echo SITE_URL;?>catalog.php">
			    <input type="text" name="keyword" value="<?php echo !in_array($keyword,array('is_promote','is_qianggou','is_hot','is_best','is_new')) ? $keyword : "";?>" style="width:235px; height:34px; line-height:34px; border:none; background:none; float:left" />
			    <input type="submit" value="搜索" style="width:65px; font-size:20px; font-weight:bold; height:36px; cursor:pointer; border:none; background:#9a0000; color:#FFF; float:left" />
		  </form>
		</div>
		<div class="tpn">
		<span><img src="<?php echo $this->img('tpn.png');?>" align="absmiddle" /></span>
		</div><?php
		$uid = $this->Session->read('User.uid');
		?>
		<div class="clear"></div><?php $cart = $this->Session->read('cart');?>
		<div class="headerboxtop">
		<div class="ajaxshowcart"><?php $this->element("box/ajax_pop_cart",array('cart'=>$cart,'thisgid'=>0));?></div>
		<span style=" width:20px; height:17px; background:url(<?php echo $this->img('carts.png');?>) center center no-repeat; display:block; margin-left:10px; margin-top:2px; float:left"></span><a href="<?php echo SITE_URL;?>mycart.php" style=" color:#D90000; float:left; height:24px; line-height:24px; margin-left:2px">查看购物车</a>
		<table border="0" cellpadding="0" cellspacing="0" style="float:right; width:200px; margin-right:20px">
			<tr>
			<?php if($uid>0){?><td align="center" valign="middle"><a href="<?php echo SITE_URL.'user.php';?>" style="line-height:24px; height:24px;">会员中心</a></td>
		<td align="center" valign="middle"><a href="<?php echo SITE_URL.'user.php?act=logout';?>" style=" float:left; padding-left:15px; line-height:24px; height:24px;">退出登陆</a></td><?php } else {?><td align="center" valign="middle"><a href="<?php echo get_url('马上登录',0,SITE_URL.'user.php?act=login','login',array('user','login'));?>" style="line-height:24px; height:24px;">[登陆]</a></td>
		<td align="center" valign="middle"><a href="<?php echo get_url('免费注册',0,SITE_URL.'user.php?act=register','register',array('user','register'));?>" style=" line-height:24px; height:24px;">[注册]</a></td><?php } ?>
		<td align="center" valign="middle"><a href="<?php echo get_url('帮助中心',0,SITE_URL.'about.php','category',array('about','index'));?>" style="line-height:24px; height:24px;">帮助中心</a></td>
			</tr>
		</table>
		</div>
	</div>
</div>
<div class="navs">
	<div class="navsbox">
	<ul>
	<li class="aa">
		<div class="menuname">全部商品的分类</div>
		<?php $this->element('menu',array('menu'=>$lang['menu']));?>	
	</li>
	<li><a href="<?php echo SITE_URL;?>"<?php echo strpos($_SERVER['PHP_SELF'],'index.php') ? ' class="ac"' : '';?>>网站首页</a></li>
	<?php if(!empty($lang['navlist_middle']))foreach($lang['navlist_middle'] as $k=>$row){?>
	<li><a href="<?php echo $row['url'];?>"<?php echo $row['active']==1 ? ' class="ac"' : '';?>><?php echo $row['name'];?></a></li>
	<?php } ?>
	<div class="clear"></div>
	</ul>
	</div>
</div>