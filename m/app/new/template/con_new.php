<div id="home">
	<div id="header">
		<div class="logo"><img src="<?php echo $this->img('logo.png');?>" height="50" /></div>
		<div class="shoptitle"><span>新闻资讯</span></div>
		<div class="logoright">
			<div>
			<?php
			$uid = $this->Session->read('User.uid');
			if(empty($uid )){
			?>
			<a href="<?php echo ADMIN_URL.'user.php?act=login';?>">登录</a><a href="<?php echo ADMIN_URL.'user.php?act=register';?>">注册</a>
			<?php } else {?>
			<a href="<?php echo ADMIN_URL.'user.php';?>">会员中心</a>
			<?php } ?>
			</div>
		</div>
	</div>
	<div class="nav">
		<ul class="mall-cate">
<li class="quyuicn"><a href="<?php echo ADMIN_URL;?>">首页</a></li><li class="msicn"><a href="javascript:;" onclick="ajaxopquyu()">分类<em></em></a></li><li class="zxicn"><a href="<?php echo ADMIN_URL.'new.php';?>">资讯</a></li><li class="myuser"><a href="<?php echo ADMIN_URL.'user.php';?>">我</a></li>
		</ul>
	</div>
</div>		
<div id="main" style="min-height:300px">
	<ul>
	<?php if(!empty($rt['catecon']))foreach($rt['catecon'] as $row){?>
	<li>
	<a href="<?php echo ADMIN_URL.'new.php?id='.$row['article_id'];?>" style="padding:5px">
	<h2 style=" line-height:30px;"><?php echo $row['article_title'];?></h2>
	<p style="line-height:26px;">发布时间：<font color="#FF0000"><?php echo date('Y-m-d',$row['addtime']);?></font></p>
	</a>
	</li>
	<?php } ?>
	</ul>
		<div class="clear10"></div>
		<?php if(!empty($rt['categorypage'])){?>
		<div class="pages">
				<?php echo str_replace('上一页','<img src="'.ADMIN_URL.'images/prev.jpg" align="absmiddle" />',$rt['categorypage']['previ']);?>
				<?php 
				if(!empty($rt['categorypage']['list']))foreach($rt['categorypage']['list'] as $kk=>$v){
					?>
					<a href="<?php echo $v;?>" class="<?php echo $kk==$page?'ll this' : 'll';?>"><?php echo $kk;?></a>
					<?php
				}
				?>	
				<?php echo str_replace('下一页','<img src="'.ADMIN_URL.'images/next.jpg" align="absmiddle" />',$rt['categorypage']['next']);?>
			</div>
			<div class="clear"></div>
			<?php } ?>
		</div>
</div>
<!--FOOTER-->
<div style="height:40px; clear:both">&nbsp;</div>
<div id="footer" >
		<ul>
			<li><a class="abc" href="javascript:;" onclick="shfotnav(this)">美食推荐<em></em></a>
			<div class="fotnavbox">
			<div class="fotnav">
				<p><a href="<?php echo ADMIN_URL.'food.php';?>">美食</a></p>
				<p><a href="<?php echo ADMIN_URL.'shop.php';?>">靓店</a></p>
				<p><a href="<?php echo ADMIN_URL.'food.php?keyword=is_new';?>">活动</a></p>
				<p style="border:none"><a href="<?php echo ADMIN_URL.'food.php?keyword=is_promote';?>">推荐</a></p>
			</div>
			<i></i>
			</div>
			</li>
			<li><a class="abc" href="javascript:;" onclick="shfotnav(this)">优品商城<em></em></a>
			<div class="fotnavbox">
			<div class="fotnav">
				<p><a href="<?php echo ADMIN_URL.'catalog.php?keyword=is_best';?>">特色优品</a></p>
				<p><a href="<?php echo ADMIN_URL.'catalog.php?keyword=is_promote';?>">特惠优品</a></p>
				<p><a href="<?php echo ADMIN_URL.'catalog.php?keyword=is_new';?>">推荐优品</a></p>
				<p><a href="<?php echo ADMIN_URL.'catalog.php';?>">优品中心</a></p>
				<p style="border:none"><a href="<?php echo ADMIN_URL.'catalog.php?keyword=is_hot';?>">活动</a></p>
			</div>
			<i></i>
			</div>
			</li>
			<li><a class="abc" href="javascript:;" onclick="shfotnav(this)">我们服务<em></em></a>
			<div class="fotnavbox" style="left:auto; right:8px">
			<div class="fotnav">
				<p><a href="<?php echo ADMIN_URL.'contact.php';?>">服务热线</a></p>
				<p><a href="<?php echo ADMIN_URL.'about.php?id=196';?>">招商加盟</a></p>
				<p style="border:none"><a href="<?php echo ADMIN_URL.'contact.php';?>">关于我们</a></p>
			</div>
			<i></i>
			</div>
			</li>

		</ul>
</div>
<!--FOOTER-->
<script type="text/javascript">
		function shfotnav(obj){
			$(obj).parent().find('.fotnavbox').toggle();
		}
</script>
<div id="opquyu">
	
</div>
<style type="text/css">
.shopcate{ padding-top:20px;}
.shopcate li{ height:30px; line-height:30px;}
#opquyubox .shopcate li a{ display:block; font-size:14px; padding-left:50px; background:url(<?php echo $this->img('san_left.jpg');?>) 40px center no-repeat}
</style>
<div id="opquyubox">
	<p><img src="<?php echo $this->img('homeMenuTop2.png');?>" width="100%" /></p>
	<div style="padding-left:10px; padding-right:5px; line-height:26px;">
		<ul class="shopcate">
		<?php if(!empty($rt['menu']))foreach($rt['menu'] as $row){?>
			<li><a href="<?php echo $row['url'];?>"><?php echo $row['name'];?></a></li>
		<?php } ?>
		</ul>	
	</div>
	<div style=" height:45px;"></div>
</div>
