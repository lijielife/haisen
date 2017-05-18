<!--QUYU-->
<div id="opquyu">
	
</div>
<div id="opquyubox">
	<!--<p><img src="<?php echo $this->img('homeMenuTop.png');?>" width="100%" /></p>-->
	<div style="line-height:26px;">
		<h2 style="border-bottom:1px solid #ededed;"><a href="<?php echo ADMIN_URL.'exchange.php';?>">积分兑换</a></h2>
	<?php if(!empty($lang['menu']))foreach($lang['menu'] as $row){?>
		<h2 style="border-bottom:1px solid #ededed;"><a href="<?php echo ADMIN_URL.'catalog.php?cid='.$row['id'];?>"><?php echo $row['name'];?></a></h2>
		<?php if(!empty($row['cat_id'])){?>
		<div style=" line-height:14px; padding-left:15px">
			<?php foreach($row['cat_id'] as $rows){?>
			<a href="<?php echo ADMIN_URL.'catalog.php?cid='.$rows['id'];?>"><?php echo $rows['name'];?></a>
			<?php } ?>
		</div>
	<?php } } ?>
	</div>
	<div style=" height:45px;"></div>
</div>

<!--FOOTER-->
<?php if(!strpos($_SERVER['PHP_SELF'],'user.php') && !strpos($_SERVER['PHP_SELF'],'daili.php')){?>
<!--<div style=" margin-top:30px;" class="footers">
<p style="text-align:center; padding-bottom:5px;">
	<a href="tel:<?php echo isset($lang['custome_phone'][0]) ? $lang['custome_phone'][0] : '';?>">免费热线：<font class="rexian"><?php echo implode('、',$lang['custome_phone']);?></font></a>
</p>
</div>-->
<div style="text-align:center;padding-bottom:10px; border-top:1px solid #ececec; padding-top:5px"><?php echo $lang['copyright'];?></div>
<?php } ?>
<style type="text/css">
body { padding-bottom:56px !important; }
.top_menu li b {width: 38px;height: 20px;line-height: 17px;display: block;color: #fff;text-align: center;font-size: 12px;}
.top_menu li b em {padding:0px 3px 0px 3px;border-radius: 100%;text-align: center;background-color: red;display: block;position: absolute;z-index: 9999;margin-top: -10px;margin-left: 22px;}
user agent stylesheeti, cite, em, var, address, dfn {font-style: italic;}
</style>
<?php
$nums = 0;
$thiscart = $this->Session->read('cart');
if(!empty($thiscart))foreach($thiscart as $row){
	$nums +=$row['number'];
}
?>
<div class="top_bar" style=" background-image: -webkit-gradient(linear,left top,left bottom,from(#015a9e),to(#015a9e));
background-image: -webkit-linear-gradient(#015a9e,#015a9e);
background-image: -moz-linear-gradient(#015a9e,#015a9e);
background-image: -ms-linear-gradient(#015a9e,#015a9e);
background-image: -o-linear-gradient(#015a9e,#015a9e);
background-image: linear-gradient(#015a9e,#015a9e);">
   <nav>
    <ul id="top_menu" class="top_menu">
    <li class="li1"><a href="<?php echo ADMIN_URL.'product.php?id=71&tid=23';?>" style="border:none;"><label>立即购买</label></a></li>
	<li class="li2"><a href="<?php echo ADMIN_URL.'user.php?act=orderlist';?>"><label>全部订单</label></a></li>
	
	</ul>
  </nav>
</div>
<style type="text/css">
#collectBox{width:100px;height:40px;z-index:-2;position:fixed;bottom:0px;right:0px;background:none;}
</style>
<div id="collectBox"></div>