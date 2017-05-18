<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/3/css.css" media="all" />
<?php $this->element('3/top',array('lang'=>$lang)); ?>
<style type="text/css">
.jbjb{
background-image: -webkit-gradient(linear,left top,left bottom,from(#FBFBFB),to(#FAF09E));
background-image: -webkit-linear-gradient(#FBFBFB,#FAF09E);
background-image: -moz-linear-gradient(#FBFBFB,#FAF09E);
background-image: -ms-linear-gradient(#FBFBFB,#FAF09E);
background-image: -o-linear-gradient(#FBFBFB,#FAF09E);
background-image: linear-gradient(#FBFBFB,#FAF09E);
}
.pw{
border: 1px solid #ddd;
border-radius: 5px;
background-color: #fff; padding-left:5px; padding-right:5px;
-moz-border-radius:5px;/*仅Firefox支持，实现圆角效果*/
-webkit-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
-khtml-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
border-radius:5px;/*仅Opera，Safari,Chrome支持，实现圆角效果*/
}
.meCenterTitle {
background: #fff;
line-height: 24px;
height: 24px;
overflow: hidden;
padding: 2px;
color: #999;
padding-left: 10px;
}
.meCenterBox {
position: relative;
}
.meCenterBoxWriting {
position: absolute;
left: 36%;
top: 20%;
}
.meCenterBoxAvatar {
display: block;
position: absolute;
width: 18%;
left: 10%;
top: 20%;
}
.meCenterBoxEditor {
 position: absolute; 
right: 10px;
top: 10px;
}
.meCenterBoxWriting p {
margin-bottom: 8px;
line-height: 14px;
color: #fff;
}
.meCenterBoxWriting p {
margin-bottom: 8px;
line-height: 14px;
color: #fff;
}

.meCenterBoxAvatar a img {
display: block;
border: 6px solid #fff;
border-radius: 10px;
overflow: hidden;
width:100%;
}

.gonglist{  border:1px solid #d1d1d1; border-bottom:none; overflow:hidden;border-radius:5px;}
.gonglist li{ text-align:left;width:100%;line-height:46px; height:46px; float:left; overflow:hidden; background-image: -webkit-gradient(linear,left top,left bottom,from(#FFFFFF),to(#F1F1F1));background-image: -webkit-linear-gradient(#FFFFFF,#F1F1F1);background-image: linear-gradient(#FFFFFF,#F1F1F1); border-bottom:1px solid #d1d1d1}
.gonglist li a{ display:block;background:url(<?php echo $this->img('pot.png');?>) 93% center no-repeat}
.gonglist li a:hover{ background:url(<?php echo $this->img('pot.png');?>) 93% center no-repeat #EAEAEA}
.gonglist li.uli2 a{} 
.gonglist li p{}
.gonglist li p i{ background-size:80%;list-style:decimal; width:20px; height:44px; float:left; margin-left:7%;margin-right:10px;}
.gonglist li.uli1 p i{ background:url(<?php echo $this->img('icon/li2.png');?>) center center no-repeat}
.gonglist li.uli2 p i{ background:url(<?php echo $this->img('icon/li3.png');?>) center center no-repeat}
.gonglist li.uli3 p i{ background:url(<?php echo $this->img('icon/li7.png');?>) center center no-repeat}
.gonglist li.uli4 p i{ background:url(<?php echo $this->img('icon/li6.png');?>) center center no-repeat}
.gonglist li.uli5 p i{ background:url(<?php echo $this->img('icon/icon_edit.gif');?>) center center no-repeat}
.gonglist li.uli6 p i{ background:url(<?php echo $this->img('icon/li1.png');?>) center center no-repeat}
.gonglist li.uli7 p i{ background:url(<?php echo $this->img('icon/li8.png');?>) center center no-repeat}
.gonglist li.uli8 p i{ background:url(<?php echo $this->img('icon/li4.png');?>) center center no-repeat}
.gonglist li.uli9 p i{ background:url(<?php echo $this->img('icon/77.png');?>) center center no-repeat}
.gonglist li.uli10 p i{ background:url(<?php echo $this->img('icon/li9.png');?>) center center no-repeat}

.gonglist li.li3 p i{ background:url(<?php echo $this->img('icon/hb.png');?>) center center no-repeat}
.gonglist li.li5 p i{ background:url(<?php echo $this->img('icon/77.png');?>) center center no-repeat}
.gonglist li.li6 p i{ background:url(<?php echo $this->img('icon/dd.png');?>) center center no-repeat}
.gonglist li.li1 p i{ background:url(<?php echo $this->img('icon/li3.png');?>) center center no-repeat}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL; ?>css/styles.css?v=12"/>
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL; ?>css/jquery.mobile-1.3.2.min.css?v=12"/>
<?php $ad = $this->action('banner','banner','会员中心',1);?>
<div style="min-height:300px; padding-bottom:10px;" class="ucenter">
	<div class="meCenter">
		<ul class="meCenterBox">
		  <li class="meCenterBoxWriting">
			<p>[<?php echo empty($rt['userinfo']['nickname']) ? '匿名' : $rt['userinfo']['nickname'];?>]</p>
			<p style="line-height:22px;"> 会员级别：<font class="price"><?php echo $rt['userinfo']['level_name'];?></font><br>
			<?php if(empty($rt['userinfo']['subscribe_time'])){ ?>
			邀请时间：<font class="price"><?php echo date('Y-m-d',$rt['userinfo']['reg_time']);?></font><font color="#4fb464">(关注有奖)</font>
			<?php 
			}else{
			?>
			关注时间：<font class="price"><?php echo date('Y-m-d',$rt['userinfo']['subscribe_time']);?></font>
			<?php
			}
			?>
			</p>
		  </li>
		  <li class="meCenterBoxAvatar"><a href="<?php echo ADMIN_URL;?>user.php?act=myinfo" data-ajax="false"><img src="<?php echo !empty($rt['userinfo']['headimgurl']) ? $rt['userinfo']['headimgurl'] : (!empty($rt['userinfo']['avatar']) ? SITE_URL.$rt['userinfo']['avatar'] : $this->img('noavatar_big.jpg'));?>"></a></li>
		  <li><?php  if(!empty($ad['ad_img'])){?><img src="<?php echo SITE_URL.$ad['ad_img'];?>" width="100%" style="min-height:100px"><?php }else{?><p style="display:block; width:100%; min-height:120px;" class="jbjb"></p><?php } ?></li>
		</ul>
        </div>
	
	<div class="navbar">
	<ul>
		<li class="li1"><a href="<?php echo ADMIN_URL.'daili.php?act=monrydeial';?>">余额:￥<?php echo empty($rt['userinfo']['mymoney']) ? '0.00' : $rt['userinfo']['mymoney'];?>元</a></li>
		<li><a href="<?php echo ADMIN_URL;?>user.php?act=mypoints">积分:<?php echo empty($rt['userinfo']['mypoints']) ? '0' : $rt['userinfo']['mypoints'];?>积分</a></li>
	</ul>
	</div>
	
  	<div data-role="content" class="ui-content" role="main">
		<p class="ajax_checked_fenxiao" style="display:none; color:#FF0000; text-align:center; padding-bottom:5px; padding-top:3px;"></p>
		<ul class="gonglist">
			<li class="li3"><p><a href="<?php echo ADMIN_URL.'daili.php?act=v2_mymoney';?>"><i></i>我的佣金</a></p></li>
			<li class="li6"><p><a href="<?php echo ADMIN_URL.'daili.php?act=mydata';?>"><i></i>我的推广</a></p></li>
			<li class="li5"><p><a href="<?php echo ADMIN_URL.'daili.php?act=myusertype';?>"><i></i>我的分店</a></p></li>
			<li class="uli6"><p><a href="<?php echo ADMIN_URL.'user.php?act=orderlist';?>"><i></i>我的订单</a></p></li>
			<!--<li class="uli9"><p><a href="javascript:;" onclick="return ajax_checked_fenxiao(this);"><i></i>我的分销</a></p></li>-->
			<li class="uli10"><p><a href="<?php echo ADMIN_URL;?>user.php?act=mygift"><i></i>我的礼包</a></p></li>
			<li class="uli5"><p><a href="<?php echo ADMIN_URL.'user.php?act=myinfos';?>"><i></i>我的资料</a></p></li>
			<!--<li class="uli3"><p><a href="<?php echo ADMIN_URL.'user.php?act=myerweima';?>"><i></i>我的二维码</a></p></li>
			<li class="uli8"><p><a href="<?php echo ADMIN_URL.'user.php?act=mycoll';?>"><i></i>我的收藏</a></p></li>-->
			<li class="li1"><p><a href="<?php echo ADMIN_URL.'daili.php?act=moneyrank';?>"><i></i>佣&nbsp;金&nbsp;榜</a></p></li>
			<!--<li class="uli2"><p><a href="<?php echo ADMIN_URL.'user.php?act=zpoints';?>"><i>&nbsp;</i>积&nbsp;分&nbsp;榜</a></p></li>
			<li class="uli3"><p><a href="javascript:;"><i>&nbsp;</i>微&nbsp;社&nbsp;区</a></p></li>
			<li class="uli4"><p><a href="<?php echo ADMIN_URL.'user.php?act=shoplist';?>"><i></i>附近的店</a></p></li>
			<li class="uli5"><p><a href="<?php echo ADMIN_URL.'user.php?act=myinfo';?>"><i></i>我的资料</a></p></li>
			<li class="uli7"><p><a href="<?php echo ADMIN_URL;?>user.php?act=mysaidan"><i></i>我的评论</a></p></li>
			<li class="uli4"><p><a href="<?php echo ADMIN_URL.'user.php?act=address_list';?>"><i></i>收货地址</a></p></li>
			<li class="uli3"><p><a href="<?php echo ADMIN_URL.'user.php?act=myerweima';?>"><i></i>我的二维码</a></p></li>
			
			<li class="uli1"><p><a href="<?php echo ADMIN_URL.'art.php?id=4';?>"><i>&nbsp;</i>平台介绍</a></p></li>
			<li class="uli3"><p><a href="<?php echo ADMIN_URL.'art.php?id=6';?>"><i>&nbsp;</i>使用规则</a></p></li>
			<li class="uli10"><p><a href="<?php echo ADMIN_URL;?>user.php?act=myvotes"><i></i>调研投票</a></p></li>-->
			<div class="clear"></div>
		</ul>
		
		<p style="line-height:24px; text-align:center; padding-top:15px;">
		共有<font color="#fe0000"><?php echo $rt['gzcount']*5+750;?></font>人关注了我们，你是第<font color="#fe0000"><?php echo $rt['userinfo']['subscribe_rank']*5+750;?></font>个！<br/>你的邀请人是：<font color="#00761d"><?php echo empty($rt['tjren']) ? '官网':$rt['tjren'];?></font>
		</p>
  </div>
  
</div>
<script type="text/javascript">
function ajax_checked_fenxiao(obj){
	//createwindow();
	$.post('<?php echo ADMIN_URL;?>user.php',{action:'ajax_checked_fenxiao'},function(data){ 
			//removewindow();
			if(data=='1'){
				window.location.href='<?php echo ADMIN_URL.'user.php?act=dailicenter';?>';
			}else{
				$(obj).parent().parent().hide(200);
				$('.ajax_checked_fenxiao').show();
				$('.ajax_checked_fenxiao').html(data);
				return false;
			}
	})
	return false;
}
</script>
<?php $this->element('3/footer',array('lang'=>$lang)); ?>

