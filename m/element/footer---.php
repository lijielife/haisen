<!--QUYU-->
<div id="opquyu">
	
</div>
<div id="opquyubox">
	<p><img src="<?php echo $this->img('homeMenuTop.png');?>" width="100%" /></p>
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
<div style=" margin-top:30px;" class="footers">
<p style="text-align:center; padding-bottom:5px;">
	<a href="tel:<?php echo isset($lang['custome_phone'][0]) ? $lang['custome_phone'][0] : '';?>">免费热线：<font class="rexian"><?php echo implode('、',$lang['custome_phone']);?></font></a>
</p>
<p style="text-align:center;padding-bottom:10px;"><?php echo $lang['copyright'];?></p>
</div>
<?php } ?>
<style type="text/css">
body { margin-bottom:46px !important; }
a, button, input { -webkit-tap-highlight-color:rgba(255, 0, 0, 0); }
ul, li { list-style:none; margin:0; padding:0 }
.top_bar { position: fixed; z-index: 900; bottom: 0; left: 0; right: 0; margin: auto; font-family: Helvetica, Tahoma, Arial, Microsoft YaHei, sans-serif; }
.top_menu { display:-webkit-box; border-top: 1px solid #CDCBCD; display: block; width: 100%; background: rgba(255, 255, 255, 0.7); height: 45px; display: -webkit-box; display: box; margin:0; padding:0; -webkit-box-orient: horizontal; background: -webkit-gradient(linear, 0 0, 0 100%, from(#e7e4e7), to(#b9b9b9)); box-shadow: 0 1px 0 0 rgba(255, 255, 255, 0.9) inset; }
.top_bar .top_menu>li { -webkit-box-flex:1; background: -webkit-gradient(linear, 0 0, 0 100%, from(rgba(0, 0, 0, 0.1)), color-stop(50%, rgba(0, 0, 0, 0.2)), to(rgba(0, 0, 0, 0.2))), -webkit-gradient(linear, 0 0, 0 100%, from(rgba(255, 255, 255, 0.1)), color-stop(50%, rgba(255, 255, 255, 0.3)), to(rgba(255, 255, 255, 0.1))); -webkit-background-size: 1px 100%, 1px 100%; background-size: 1px 100%, 1px 100%; background-position: 1px center, 2px center; background-repeat: no-repeat; position:relative; text-align:center; width:33%; }
.top_bar .top_menu>li>a { line-height:45px; display:block; text-align:center; color:#4f4d4f; text-decoration:none; text-shadow: 0 1px rgba(255, 255, 255, 0.3); -webkit-box-flex:1; }
.top_menu>li:first-child { background:none; }
.top_bar .top_menu li a label { padding:0; font-size:14px; overflow:hidden; }
.top_bar .top_menu>li>a img { display: inline-block; height: 14px; width: 14px; margin-top:-2px; color: #fff; line-height: 40px; vertical-align:middle; }
.top_bar li:first-child a { display: block; }
.top_menu li:last-of-type a { background: none; }
.top_menu>li:last-of-type>a label { padding: 0 0 0 3px; }
.top_bar .top_menu>li>a:hover, .top_bar .top_menu>li>a:active { background-color:#CCCCCC; }
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
    <li><a href="<?php echo ADMIN_URL;?>"><label>首页</label></a></li>
	<li><a href="javascript:void(0)" onclick="ajaxopquyu()"><label>分类</label></a></li>
	<li><a href="<?php echo ADMIN_URL.'user.php';?>"><label>会员</label></a></li>
	<li><a href="<?php echo ADMIN_URL;?>mycart.php"><label>购物车&nbsp;<span style="border-radius:50%;background:#B70000; text-align:center; font-size:12px; font-weight:bold; color:#FFF; cursor:pointer;z-index:99; padding:2px" class="mycarts"><?php echo $nums;?></span></label></a></li>    
	</ul>
  </nav>
</div>
<style type="text/css">
#collectBox{width:100px;height:40px;z-index:-2;position:fixed;bottom:0px;right:0px;background:none;}
</style>
<div id="collectBox"></div>