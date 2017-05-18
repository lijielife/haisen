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
		<div style=" line-height:14px;">
			<?php foreach($row['cat_id'] as $rows){?>
			<a href="<?php echo ADMIN_URL.'catalog.php?cid='.$rows['id'];?>"><?php echo $rows['name'];?></a><a href="<?php echo ADMIN_URL.'catalog.php?cid='.$rows['id'];?>"><?php echo $rows['name'];?></a><a href="<?php echo ADMIN_URL.'catalog.php?cid='.$rows['id'];?>"><?php echo $rows['name'];?></a>
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
<p style="text-align:center;padding-bottom:10px;"><?php echo $lang['copyright'];?></p>
</div>-->
<?php } ?>
<style type="text/css">
body { padding-bottom:60px !important; }
</style>
<?php
$nums = 0;
$thiscart = $this->Session->read('cart');
if(!empty($thiscart))foreach($thiscart as $row){
	$nums +=$row['number'];
}
?>
<div class="top_bar" style="-webkit-transform:translate3d(0,0,0)">
   <nav>
    <ul id="top_menu" class="top_menu">
    <li class="li1"><a href="<?php echo ADMIN_URL;?>"><label>首页</label></a></li>
	<li class="li4"><a href="<?php echo ADMIN_URL.'user.php';?>"><label>会员中心</label></a></li>
	<li class="li2">
	<a href="<?php echo ADMIN_URL.'art.php?id=8';?>"><label>如何赚钱</label></a>
	<span></span>
	</li>
	<li class="li5"><a href="<?php echo ADMIN_URL.'art.php?id=13';?>"><label>如何转发</label></a></li>
	<!--<li class="li5"><a href="<?php echo ADMIN_URL;?>mycart.php"><label>购物车&nbsp;<span style="border-radius:50%;background:#B70000; text-align:center; font-size:12px; font-weight:bold; color:#FFF; cursor:pointer;z-index:99; padding:2px" class="mycarts"><?php echo $nums;?></span></label></a></li>-->    
	</ul>
  </nav>
</div>
<style type="text/css">
#collectBox{width:100px;height:40px;z-index:-2;position:fixed;bottom:0px;right:0px;background:none;}
</style>
<div id="collectBox"></div>