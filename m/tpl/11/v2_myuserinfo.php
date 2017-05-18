<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/11/css.css" media="all" />
<?php //$this->element('11/top',array('lang'=>$lang)); ?>
<style type="text/css">
.jbjb{
background-image: -webkit-gradient(linear,left top,left bottom,from(#FBFBFB),to(#D6C6AC));
background-image: -webkit-linear-gradient(#FBFBFB,#D6C6AC);
background-image: -moz-linear-gradient(#FBFBFB,#D6C6AC);
background-image: -ms-linear-gradient(#FBFBFB,#D6C6AC);
background-image: -o-linear-gradient(#FBFBFB,#D6C6AC);
background-image: linear-gradient(#FBFBFB,#D6C6AC);
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

.gonglist{border-radius: 5px; border:1px solid #d1d1d1; border-bottom:none; overflow:hidden; margin:5px; display:none}
.gonglist li{ text-align:center;width:100%;line-height:44px; height:44px; float:left; overflow:hidden;padding-bottom:2px;background-image: -webkit-gradient(linear,left top,left bottom,from(#FEFEFE),to(#F1F1F1));background-image: -webkit-linear-gradient(#FEFEFE,#F1F1F1);background-image: linear-gradient(#FEFEFE,#F1F1F1); border-bottom:1px solid #d1d1d1}
.gonglist li a{ display:block;background:url(<?php echo $this->img('star-off.png');?>) 93% center no-repeat}
.gonglist li a:hover{ background:url(<?php echo $this->img('star-off.png');?>) 93% center no-repeat #EAEAEA}
.gonglist li.uli2 a{} 
.gonglist li p{ position:relative}
.gonglist li p a{ text-align:left}
.gonglist li p i{ background-size:80%;list-style:decimal; width:20px; height:44px; float:left; margin-left:7%;background:url(<?php echo $this->img('m.png');?>) center center no-repeat; margin-right:3px}
.gonglist li p a span{height:24px; line-height:24px;display:block;text-align:center; font-size:12px; font-weight:bold; color:#B70000; cursor:pointer; position:absolute;right:25%; top:12px; z-index:99;}

.uitem{ margin-bottom:10px;}
.uitem p.pp{ position:relative; height:40px; line-height:40px;margin-bottom:7px; border:1px solid #ccc;border-radius:5px; text-align:left;background-image:-webkit-gradient(linear,left top,left bottom,from(#fff4de),to(#f5e7cc));}
.uitem p.pp a{ font-size:14px; display:block; padding-right:10%; /*background:url(<?php echo $this->img('404-2.png');?>) 92% center no-repeat*/}
.uitem p.pp a i{background-size:80%;list-style:decimal; width:20px; height:40px; float:left; margin-left:7%;background:url(<?php echo $this->img('+h.png');?>) 10% center no-repeat}
.uitem p.pp a:hover{ background:#cfccbd}
.uitem p.pp a span{border-radius:10px; height:24px; line-height:24px; padding-left:15px; padding-right:15px;display:block;background:#ff0000; text-align:center; font-size:12px; font-weight:bold; color:#fff; cursor:pointer; position:absolute;right:10%; top:8px; z-index:99;}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL; ?>css/styles.css?v=12"/>
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL; ?>css/jquery.mobile-1.3.2.min.css?v=12"/>
<?php $ad = $this->action('banner','banner','会员中心',1);?>
<div style="min-height:300px; padding-bottom:10px;" class="ucenter">
	<div class="meCenter">
		<ul class="meCenterBox">
		  <li class="meCenterBoxWriting">
			<p>昵称:<?php echo empty($rt['userinfo']['nickname']) ? '未知' : $rt['userinfo']['nickname'];?></p>
			<p style="line-height:22px;">
			<?php if(empty($rt['userinfo']['subscribe_time'])){ ?>
			邀请时间:<font class="price1"><?php echo date('Y-m-d',$rt['userinfo']['reg_time']);?></font>
			<?php 
			}else{
			?>
			关注时间：<font class="price"><?php echo date('Y-m-d',$rt['userinfo']['subscribe_time']);?></font>
			<?php
			}
			?>
			<br>
			东家:&nbsp;&nbsp;<?php echo $rt['userinfo']['user_rank']=='1' ? '否' : '是'; ?>
			</p>
		  </li>
		  <li class="meCenterBoxAvatar"><a href="<?php echo ADMIN_URL;?>user.php?act=myinfo" data-ajax="false"><img src="<?php echo !empty($rt['userinfo']['headimgurl']) ? $rt['userinfo']['headimgurl'] : (!empty($rt['userinfo']['avatar']) ? SITE_URL.$rt['userinfo']['avatar'] : $this->img('noavatar_big.jpg'));?>"></a></li>
		  <li><?php  if(!empty($ad['ad_img'])){?><img src="<?php echo SITE_URL.$ad['ad_img'];?>" width="100%" style="min-height:100px"><?php }else{?><p style="display:block; width:100%; min-height:120px;" class="jbjb"></p><?php } ?></li>
		</ul>
        </div>
	
	<div class="navbar">
	<ul>
		<li class="li1"><a href="javascript:;">币币:￥<?php echo empty($rt['userinfo']['mymoney']) ? '0.00' : $rt['userinfo']['mymoney'];?></a></li>
		<li><a href="javascript:;">积分:<?php echo empty($rt['userinfo']['mypoints']) ? '0' : $rt['userinfo']['mypoints'];?></a></li>
	</ul>
	</div>
	
  	<div data-role="content" class="ui-content" role="main">
		<div class="uitem">
			<p class="pp">
				<a href="javascript:;" onclick="ajax_show_sub(1,this);"><i></i>他的一级客户<span><?php echo empty($rt['zcount1']) ? '0' : $rt['zcount1'];?>人</span></a>
			</p>
			<ul class="gonglist gg1">
				<li class="uli6"><p><a href="javascript:;"><i></i>代理人数<span>0人</span></a></p></li>
				<li class="uli9"><p><a href="javascript:;"><i></i>消费金额<span>￥0.00</span></a></p></li>
				<li class="uli10"><p><a href="javascript:;"><i></i>贡献佣金<span>￥0.00</span></a></p></li>		
				<div class="clear"></div>
			</ul>
		</div>

		<div class="uitem">
			<p class="pp">
				<a href="javascript:;" onclick="ajax_show_sub(2,this);"><i></i>他的二级客户<span><?php echo empty($rt['zcount2']) ? '0' : $rt['zcount2'];?>人</span></a>
			</p>
			<ul class="gonglist gg2">
				<li class="uli6"><p><a href="javascript:;"><i></i>代理人数<span>0人</span></a></p></li>
				<li class="uli9"><p><a href="javascript:;"><i></i>消费金额<span>￥0.00</span></a></p></li>
				<li class="uli10"><p><a href="javascript:;"><i></i>贡献佣金<span>￥0.00</span></a></p></li>		
				<div class="clear"></div>
			</ul>
		</div>
		
		<div class="uitem">
			<p class="pp">
				<a href="javascript:;" onclick="ajax_show_sub(3,this);"><i></i>他的三级客户<span><?php echo empty($rt['zcount3']) ? '0' : $rt['zcount3'];?>人</span></a>
			</p>
			<ul class="gonglist gg3">
				<li class="uli6"><p><a href="javascript:;"><i></i>代理人数<span>0人</span></a></p></li>
				<li class="uli9"><p><a href="javascript:;"><i></i>消费金额<span>￥0.00</span></a></p></li>
				<li class="uli10"><p><a href="javascript:;"><i></i>贡献佣金<span>￥0.00</span></a></p></li>		
				<div class="clear"></div>
			</ul>
		</div>
  </div>
  
</div>
<script type="text/javascript">
function ajax_show_sub(k,obj){
	$(".gg"+k).toggle();
	ll = $(".gg"+k).css('display');
	if(ll=='none'){
		$(obj).find('i').css('background','url(<?php echo $this->img('+h.png');?>) 10% center no-repeat');
	}else{
		$(obj).find('i').css('background','url(<?php echo $this->img('-h.png');?>) 10% center no-repeat');
	}
}
</script>
<?php $this->element('11/footer',array('lang'=>$lang)); ?>

