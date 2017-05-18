<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/1/css.css" media="all" />
<?php //$this->element('1/top',array('lang'=>$lang)); ?>
<style type="text/css">
.jbjb{
background:#f22f6b;
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
.gonglist{border-radius: 5px;  border-bottom:none; overflow:hidden; margin:5px; display:none;background:#ffe785;}
.gonglist li{ text-align:center;width:100%;line-height:44px; height:44px; float:left; overflow:hidden;padding-bottom:2px;}
.gonglist li a{ font-size:14px; display:block;background:url(<?php echo $this->img('pot.png');?>) 93% center no-repeat}
.gonglist li a:hover{ background:url(<?php echo $this->img('pot.png');?>) 93% center no-repeat #EAEAEA;font-weight:bold;}
.gonglist li.uli2 a{} 
.gonglist li p{ position:relative}
.gonglist li p a{ text-align:left}
.gonglist li p i{ background-size:80%;list-style:decimal; width:20px; height:44px; float:left; margin-left:7%;background:url() center center no-repeat; margin-right:3px}
.gonglist li p a span{height:24px; line-height:24px;display:block;text-align:center; font-size:12px; font-weight:bold; color:#B70000; cursor:pointer; position:absolute;right:25%; top:12px; z-index:99;}
.uitem{ }
.uitem p.pp{ position:relative; height:40px; line-height:40px;margin-bottom:7px;text-align:left}
.uitem p.pp a{ font-size:14px; color:#949494;display:block; padding-right:10%; /*background:url(<?php echo $this->img('404-2.png');?>) 92% center no-repeat*/}
.uitem p.pp a i{background-size:80%;list-style:decimal; width:20px; height:40px; float:left; margin-left:7%;background:url(<?php echo $this->img('add.png');?>) 10% center no-repeat; margin-right:5px}
.uitem p.pp a:hover{  font-weight:bold}
.uitem p.pp a span{border-radius:10px; height:24px; line-height:24px; padding-left:15px; padding-right:15px;display:block; text-align:center; font-size:12px; font-weight:bold; color:#949494; cursor:pointer; position:absolute;right:10%; top:8px; z-index:99;}
.is_agency {width:50px;position:absolute;top:-5px;}
.agency_tip{ background:#fff;position:absolute;bottom:8%;min-width:90%;min-height:40px;left:50%;margin-left:-45%;line-height:40px;border-radius: 5px;text-align:center;}
.agency_tip a{color:#ea006d;font-weight:bold;}

</style>
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL; ?>css/styles.css?v=12"/>
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL; ?>css/jquery.mobile-1.3.2.min.css?v=12"/>
<?php $ad = $this->action('banner','banner','会员中心',1);?>
<div style="min-height:300px; padding-bottom:10px; font-size:14px; background:#FFF" class="ucenter">
	<div class="meCenter">
		<ul class="meCenterBox">
		  <li class="meCenterBoxWriting">
		  	<p>会员ID:100<?php echo $rt['userinfo']['user_id'];?>&nbsp;&nbsp;&nbsp;积分:<?php echo empty($rt['userinfo']['mypoints']) ? '0' : $rt['userinfo']['mypoints'];?></p>
			<p>昵称:<?php echo empty($rt['userinfo']['nickname']) ? '未知' : $rt['userinfo']['nickname'];?></p>
			<p style="position:relative;line-height:22px;"><!--
			<?php if(empty($rt['userinfo']['subscribe_time'])){ ?>
			邀请时间:<font class="price1"><?php echo date('Y-m-d',$rt['userinfo']['reg_time']);?></font>
			<?php 
			}else{
			?>
			关注时间：<font class="price"><?php echo date('Y-m-d',$rt['userinfo']['subscribe_time']);?></font>
			<?php
			}
			?>
			<br>-->
			是否是代理商:&nbsp;&nbsp;<?php echo $rt['userinfo']['user_rank']=='1' ? "<img src = \" {$this->img('no.png')}\" class=\"is_agency\" />" : "<img src = \" {$this->img('yes.png')}\" class=\"is_agency\"/>"; if($rt['userinfo']['user_rank']=='1'){?><?php } ?>
			</p>
			
		  </li>
		  <li class="meCenterBoxAvatar" style="top:34%;width:85px;"><a href="<?php echo ADMIN_URL;?>user.php?act=myinfo" data-ajax="false"><img src="<?php echo !empty($rt['userinfo']['headimgurl']) ? $rt['userinfo']['headimgurl'] : (!empty($rt['userinfo']['avatar']) ? SITE_URL.$rt['userinfo']['avatar'] : $this->img('noavatar_big.jpg'));?>" style="border-radius:50%"></a></li>
		  <li class="agency_tip"><?php echo $rt['userinfo']['user_rank']=='1' ?  "<a href=\"".ADMIN_URL."in.php\">您还不是代理商哦,猛戳立即成为代理商!</a>" : "<a href=\"javascript::void(0)\">您已经是代理商了</a>" ;?></li>
		  <li><?php  if(!empty($ad['ad_img'])){?><img src="<?php echo SITE_URL.$ad['ad_img'];?>" width="100%" style="min-height:100px"><?php }else{?><p style="display:block; width:100%; min-height:210px;" class="jbjb"></p><?php } ?></li>
		</ul>
        </div>
	<script type="text/javascript">
	    
	    function changeHeight(){
			 var w = $(".meCenterBoxAvatar a img").width();
			
		    $(".meCenterBoxAvatar").css('margin-top','-'+w/2+'px') ;
		}
	   
		$(window).resize(function(){
			changeHeight();
		});
		changeHeight();
	</script>
	<style type="text/css">
	   .navbar{margin-top:3%;height:auto;}
	   .navbar ul{height:auto}
	   .navbar li a{color:#949494;text-align:left;border:none;}
	   .navbar li{background-repeat:no-repeat;background-size:55px 55px; background-position:20%;display:block;height:auto;}
	   .navbar .li1 {background-image:url("<?php echo $this->img('turnover.png')?>");border:none;}
	   .navbar li a.ap{position:absolute;display:block;position:relative;left:50%;width:50px;}
	   .navbar .li2 {background-image:url("<?php echo $this->img('score.png')?>");}
	   .sep {background:#e8e8e8;min-height:15px;width:100%;clear:both;margin-top:10%;}
	   .sep2 {background:#e8e8e8;min-height:15px;width:100%;clear:both;;}
	   .ui-content{padding:0px;}
	   .request_bonus_block{padding-left:10%;padding-right:10%;padding-top:10px;}
	   .request_bonus_block a.request_bonus{background:#F22F6B;border-radius:5px;min-width:100%;height:40px;color:#fff;line-height:40px;display:block;font-weight:bold;font-size:1.3em;text-align:center}
	</style>
	<div class="navbar">
	<ul>
		<li class="li1" style="position:relative"><a class="ap" href="<?php echo ADMIN_URL.'daili.php?act=monrydeial';?>">营业额<br/>￥<?php echo empty($rt['userinfo']['zordermoney']) ? '0.00' : $rt['userinfo']['zordermoney'];?></a></li>
		<!--<li><a href="<?php echo ADMIN_URL;?>user.php?act=mypoints">积分:<?php echo empty($rt['userinfo']['mypoints']) ? '0' : $rt['userinfo']['mypoints'];?></a></li>-->
		<li class="li2"><a class="ap" href="<?php echo ADMIN_URL.'daili.php?act=monrydeial';?>" class="">玫瑰币<br/>￥<?php echo empty($rt['userinfo']['mymoney']) ? '0.00' : $rt['userinfo']['mymoney'];?></a></li>
	</ul>
	
	</div>
	<div class="sep"></div>
	<!--<p style="line-height:24px; text-align:center; padding-top:8px;">
		你是由【<?php echo empty($rt['tjren']) ? '官网':$rt['tjren'];?>】推荐
	</p>-->
	<?php if(!empty($lang['site_notice'])){?>
	<!--<div style="height:30px; line-height:30px; overflow:hidden">
	<marquee style="WIDTH:100%;" scrollamount="4" direction="left"><?php echo $lang['site_notice'];?></marquee>
	</div>-->
	<?php } ?>
  	<div data-role="content" class="ui-content" role="main" style="padding-top:8px;">
	
		<div class="uitem">
			<p class="pp">
				<a href="javascript:;" onclick="ajax_show_sub(1,this);"><i></i>我的顾客<span><?php echo empty($rt['zcount']) ? '0' : $rt['zcount'];?>人</span></a>
			</p>
			<ul class="gonglist gg1">
				<li class="uli6"><p><a href="<?php echo ADMIN_URL.'daili.php?act=myuser&t=1';?>"><i></i>批发商<span><?php echo empty($rt['zcount1']) ? '0' : $rt['zcount1'];?>人</span></a></p></li>
				<li class="uli9"><p><a href="<?php echo ADMIN_URL.'daili.php?act=myuser&t=2';?>"><i></i>零售商<span><?php echo empty($rt['zcount2']) ? '0' : $rt['zcount2'];?>人</span></a></p></li>
				<li class="uli10"><p><a href="<?php echo ADMIN_URL.'daili.php?act=myuser&t=3';?>"><i></i>消费者<span><?php echo empty($rt['zcount3']) ? '0' : $rt['zcount3'];?>人</span></a></p></li>		
				<div class="clear"></div>
			</ul>
		</div>
        <div class="sep2"></div>
		<div class="uitem">
			<p class="pp">
				<a href="javascript:;" onclick="ajax_show_sub(2,this);"><i></i>我的推广<span><?php echo $rt['userinfo']['share_ucount']> 0 ? $rt['userinfo']['share_ucount'] : '0';?>人</span></a>
			</p>
			<ul class="gonglist gg2">
				<li class="uli6"><p><a href="<?php echo ADMIN_URL.'user.php?act=myshare';?>"><i></i>点击链接<span><?php echo empty($rt['userinfo']['share_ucount']) ? '0' : $rt['userinfo']['share_ucount'];?>人</span></a></p></li>
				<li class="uli9"><p><a href="<?php echo ADMIN_URL.'user.php?act=myuser';?>"><i></i>成功关注<span><?php echo empty($rt['userinfo']['guanzhu_ucount']) ? '0' : $rt['userinfo']['guanzhu_ucount'];?>人</span></a></p></li>
				<li class="uli10"><p><a href="javascript:void(0)"><i></i>下单购买<span><?php echo empty($rt['userinfo']['ordercount']) ? '0' : $rt['userinfo']['ordercount'];?>单</span></a></p></li>
				<li class="uli10"><p><a href="<?php echo ADMIN_URL.'daili.php?act=my_is_daili';?>"><i></i>成为分销<span><?php echo empty($rt['userinfo']['fxcount']) ? '0' : $rt['userinfo']['fxcount'];?>人</span></a></p></li>	
				<li class="uli10"><p><a href="<?php echo ADMIN_URL.'user.php?act=myerweima';?>"><i></i>我的二维码</a></p></li>	
				<div class="clear"></div>
			</ul>
		</div>
		<div class="sep2"></div>
		<div class="uitem">
			<p class="pp">
				<a href="javascript:;" onclick="ajax_show_sub(3,this);"><i></i>我的玫瑰币<span>￥<?php echo !empty($rt['pay5']) ? $rt['pay5'] : '0.00';?></span></a>
			</p>
			<ul class="gonglist gg3">
				<li class="uli6"><p><a href="<?php echo ADMIN_URL.'daili.php?act=mymoneydata&status=weifu';?>"><i></i>未付款订单玫瑰币<span><?php echo !empty($rt['pay1']) ? $rt['pay1'] : '0.00';?>元</span></a></p></li>
				<li class="uli9"><p><a href="<?php echo ADMIN_URL.'daili.php?act=mymoneydata&status=yifu';?>"><i></i>已付款订单玫瑰币<span><?php echo !empty($rt['pay2']) ? $rt['pay2'] : '0.00';?>元</span></a></p></li>
				<li class="uli10"><p><a href="<?php echo ADMIN_URL.'daili.php?act=mymoneydata&status=shouhuo';?>"><i></i>已收货订单玫瑰币<span><?php echo !empty($rt['pay3']) ? $rt['pay3'] : '0.00';?>元</span></a></p></li>		
				<li class="uli10"><p><a href="<?php echo ADMIN_URL.'daili.php?act=mymoneydata&status=quxiao';?>"><i></i>已取消作废玫瑰币<span><?php echo !empty($rt['pay4']) ? $rt['pay4'] : '0.00';?>元</span></a></p></li>		
				<li class="uli10"><p><a href="<?php echo ADMIN_URL.'daili.php?act=mymoneydata&status=tongguo';?>"><i></i>审核通过的玫瑰币<span><?php echo !empty($rt['pay5']) ? $rt['pay5'] : '0.00';?>元</span></a></p></li>		
				<!--<li class="uli10"><p><a href="<?php echo ADMIN_URL.'daili.php?act=postmoney';?>"><i></i>申请提款<span style="background:url(<?php echo $this->img('x.png');?>) left center no-repeat"></span></a></p></li>	
				<li class="uli10"><p><a href="<?php echo ADMIN_URL.'daili.php?act=postmoneydata';?>"><i></i>提款记录<span style="background:url(<?php echo $this->img('x.png');?>) left center no-repeat"></span></a></p></li>		-->
				<div class="clear"></div>
			</ul>
		</div>
		<div class="sep2"></div>
		<!--<div class="uitem">
			<p class="pp">
				<a href="javascript:;" onclick="ajax_show_sub(4,this);"><i></i>我的资料</a>
			</p>
			<ul class="gonglist gg4">
				<li class="uli6"><p><a href="<?php echo ADMIN_URL.'user.php?act=myinfos_u';?>"><i></i>我的账号资料</a></p></li>
				<li class="uli9"><p><a href="<?php echo ADMIN_URL.'user.php?act=myinfos_s';?>"><i></i>我的收货资料</a></p></li>
				<li class="uli10"><p><a href="<?php echo ADMIN_URL.'user.php?act=myinfos_b';?>"><i></i>银行卡号资料</a></p></li>		
				<div class="clear"></div>
			</ul>
		</div>-->
		
		<!--<div class="uitem">
			<p class="pp">
				<a href="<?php echo ADMIN_URL;?>user.php?act=orderlist" style="background:url(<?php echo $this->img('404-2.png');?>) 90% center no-repeat"><i style="background:url(<?php echo $this->img('x.png');?>) 10% center no-repeat"></i>我的订单</a>
			</p>
		</div>
		-->
		
		
		<div class="uitem">
			<p class="pp">
				<a href="<?php echo ADMIN_URL;?>daili.php?act=postmoneydata" style="background:url(<?php echo $this->img('404-2.png');?>) 90% center no-repeat"><i style="background:url(<?php echo $this->img('x.png');?>) 10% center no-repeat"></i>提款记录</a>
			</p>
		</div>
        <div class="sep2"></div>
       <div class="uitem">
			<p class="request_bonus_block">
				<a href="<?php echo ADMIN_URL;?>daili.php?act=postmoney" class="request_bonus" ><i></i>我要提现</a>
			</p>
		</div>
		<!--<div class="uitem">
			<p class="pp">
				<a href="<?php echo ADMIN_URL;?>user.php?act=mygift"><i style="float:right;background:url(<?php echo $this->img('bottomNavRecommend.png');?>) 10% center no-repeat"></i>我的礼包</a>
			</p>
		</div>
		
		<div class="uitem">
			<p class="pp">
				<a href="<?php echo ADMIN_URL.'user.php?act=zpoints';?>"><i style="float:right;background:url(<?php echo $this->img('bottomNavRecommend.png');?>) 10% center no-repeat "></i>积分榜</a>
			</p>
		</div>-->
		
		
  </div>
  
</div>
<script type="text/javascript">
function ajax_show_sub(k,obj){
	$(".gg"+k).toggle();
	ll = $(".gg"+k).css('display');
	if(ll=='none'){
		$(obj).find('i').css('background','url(<?php echo $this->img('add.png');?>) 10% center no-repeat');
	}else{
		$(obj).find('i').css('background','url(<?php echo $this->img('-h.png');?>) 10% center no-repeat');
	}
}
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
<?php $this->element('1/footer',array('lang'=>$lang)); ?>

