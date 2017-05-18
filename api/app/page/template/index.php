<?php $ad = $this->action('banner','banner','首页轮播',5);?>
<!--顶栏焦点图--> 
<div class="flexslider" style="margin-bottom:0px;">
	 <ul class="slides">
	 <?php if(!empty($ad))foreach($ad as $row){
	 $a = basename($row['ad_img']);
	 ?>			 
		<li><img src="<?php echo SITE_URL.str_replace($a,'thumb_b/'.$a,$row['ad_img']);?>" width="100%" alt="<?php echo $row['ad_name'];?>"/></li>
	 <?php } ?>												
	  </ul>
</div>
<style type="text/css">
.menunav{
-webkit-box-shadow: 0 -.1rem #fff inset;
display: -webkit-box;
width:60%; float:right;
}
.menunav a{
display: block;
-webkit-box-flex: 1;
text-align: center;
width: 100%;
font-size: 12px;
color: #666;
position: relative;
}
.menunav a i{
display: block;
width: 100%;
height:43px;
clear: both;
}
.menunav a:nth-child(1) i {
background: url(<?php echo $this->img('m-act-cat.png');?>) no-repeat center;
background-size: auto 60%;
}
.menunav a:after {
content: '';
display: block;
height: 40%;
position: absolute;
right: 0;
top: 20%;
border-right: 1px solid #d7d7d7;
}
.menunav a:nth-child(2) i {
background: url(<?php echo $this->img('m-act-cart.png');?>) no-repeat center;
background-size: auto 60%;
}
.menunav a:nth-child(3) i {
background: url(<?php echo $this->img('m-act-wuliu.png');?>) no-repeat center;
background-size: auto 60%;
}
.menunav a:nth-child(4) i {
height: 28px; padding-top:15px;
background: url(<?php echo $this->img('uclicon.png');?>) no-repeat center 7px;
background-size: 28px auto;
}
</style>
<div id="main" style="padding:5px; padding-top:0px">
<div class="logoqu">
	<img src="<?php echo $this->img('logo4.png');?>" class="logos"/>
	<div class="menunav">
	<a href="<?php echo ADMIN_URL.'catalog.php';?>"><i></i>所有商品</a>
	<a href="<?php echo ADMIN_URL.'mycart.php';?>"><i></i>购物车</a>
	<a href="<?php echo ADMIN_URL.'user.php?act=myorder';?>"><i></i>查物流</a>
	<a href="<?php echo ADMIN_URL.'user.php';?>"><i></i>用户中心</a>
	</div>
</div>
<p><a href="<?php echo ADMIN_URL.'gz.php';?>"><img src="<?php echo $this->img('mmexport1415475496230.jpeg');?>" style="width:100%"/></a></p>
<?php if(!empty($rt['cat']))foreach($rt['cat'] as $row){?>
	<div class="indexitem">
		<p class="ptitle"><span><a href="<?php echo ADMIN_URL.'catalog.php?cid='.$row['cat_id'];?>">[<?php echo $row['cat_name'];?>]</a></span></p>
		<?php if(!empty($row['cat_url'])){?>
		<p><img src="<?php echo SITE_URL.$row['cat_url'];?>" style="width:100%"/></p>
		<?php } ?>
		<ul class="goodslists">
		<?php if(!empty($rt['goods'][$row['cat_id']]))foreach($rt['goods'][$row['cat_id']] as $k=>$rows){?>
			<li style="width:50%; float:left;">
				<div style="padding:4px;">
				<a style="background:#fff; padding:5px; display:block;border:1px solid #ededed;border-radius:5px;" href="<?php echo ADMIN_URL.'product.php?id='.$rows['goods_id'];?>">
					<div style=" height:120px; overflow:hidden; text-align:center;">
						<img src="<?php echo SITE_URL.$rows['goods_img'];?>" style="max-height:99%; max-width:99%;display:inline;" alt="<?php echo $rows['goods_name'];?>"/>
					</div>
					<p style="line-height:20px; height:20px; overflow:hidden; text-align:center"><?php echo $rows['goods_name'];?></p>
					<p style="line-height:32px; height:32px; overflow:hidden;"><b style=" margin-top:5px;line-height:22px;border-radius:5px; border:1px solid #ededed;color:#FE0000; font-size:14px; float:left; margin-right:5px; padding-left:3px; padding-right:5px;">￥<?php echo str_replace('.00','',$rows['pifa_price']);?></b><img src="<?php echo $this->img('buybut.png');?>" style="float:right" /></p>
				</a>
				</div>
			</li>
		<?php } ?>
		<div class="clear"></div>
		</ul>
	</div>
<?php } ?>
</div>