<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/25/css.css" media="all" />
<?php //$this->element('25/top',array('lang'=>$lang)); ?>
<style type="text/css">
/*.jbjb{
background-image: -webkit-gradient(linear,left top,left bottom,from(#FBFBFB),to(#D6C6AC));
background-image: -webkit-linear-gradient(#FBFBFB,#D6C6AC);
background-image: -moz-linear-gradient(#FBFBFB,#D6C6AC);
background-image: -ms-linear-gradient(#FBFBFB,#D6C6AC);
background-image: -o-linear-gradient(#FBFBFB,#D6C6AC);
background-image: linear-gradient(#FBFBFB,#D6C6AC);
}*/
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
.gonglist li{ text-align:center;width:100%;line-height:44px; height:44px; float:left; overflow:hidden;padding-bottom:2px;background-image: -webkit-gradient(linear,left top,left bottom,from(#FEFEFE),to(#eeeeee));background-image: -webkit-linear-gradient(#FEFEFE,#eeeeee);background-image: linear-gradient(#FEFEFE,#eeeeee); border-bottom:1px solid #d1d1d1}
.gonglist li a{ font-size:14px; display:block;background:url(<?php echo $this->img('pot.png');?>) 93% center no-repeat}
.gonglist li a:hover{ background:url(<?php echo $this->img('pot.png');?>) 93% center no-repeat #EAEAEA;font-weight:bold;}
.gonglist li.uli2 a{} 
.gonglist li p{ position:relative}
.gonglist li p a{ text-align:left}
.gonglist li p i{list-style:decimal; width:20px; height:44px; float:left; margin-left:7%;background:url(<?php echo $this->img('m.png');?>) center center no-repeat; margin-right:3px}
.gonglist li p a span{height:24px; line-height:24px;display:block;text-align:center; font-size:12px; font-weight:bold; color:#B70000; cursor:pointer; position:absolute;right:25%; top:12px; z-index:99;}


.uitem{ margin-bottom:10px; }
.li11{background:url(<?php echo $this->img('25/images/34333.png');?>) 4% center no-repeat #f8f8f8;background-size:28px auto;}
.uitem p.pp{ position:relative; height:40px; line-height:40px;margin-bottom:7px; border:1px solid #ccc;border-radius:5px; text-align:left;/*background-image:-webkit-gradient(linear,left top,left bottom,from(#fff4de),to(#f5e7cc));*/}
.uitem p.pp a{ font-size:14px; display:block; padding-right:10%; /*background:url(<?php echo $this->img('404-2.png');?>) 92% center no-repeat*/}
.uitem p.pp a i{background-size:80%;list-style:decimal; width:20px; height:40px; float:left; margin-left:7%;background:url(<?php echo $this->img('+h.png');?>) 10% center no-repeat; margin-right:5px}
.uitem p.pp a:hover{ background:#fff4de; font-weight:bold}
.uitem p.pp a span{border-radius:10px; height:24px; line-height:24px; padding-left:15px; padding-right:15px;display:block;background:#ff0000; text-align:center; font-size:12px; font-weight:bold; color:#FFF; cursor:pointer; position:absolute;right:10%; top:8px; z-index:99;}
.wrap{padding: 5%;width: 90%;}
.top1{width: 100%;box-shadow: 0 1px 10px black;border-radius: 5px;overflow: hidden;}
.top1 div{width: 100px;height:100px;border-radius: 50px;overflow:hidden;margin: 20px auto;}
.top1 div img{width: 100px;height: 100px;}
.top1 ul{width: 100%;text-align:center;margin-bottom: 20px;}
.top1 ul li{display: inline;padding: 5px;margin-left:10px;margin-right: 10px;color: white;font-size: 0.8em;border-radius: 5px;box-shadow: 0 0 1px black;}
.top1 ul li:nth-of-type(1){background:#cc3611;}
.top1 ul li:nth-of-type(2){background:#3c61cc;}
.top1 ul:after{clear: both;content: " ";}

.red{width: 100%;}
.red a{display: block;width: 100%;height:30px;border: 5px;background:#cc3611;box-shadow: 0 0 1px black;color: white;font-size: 0.8em;text-align: center;line-height: 30px;margin-top: 10px;}


</style>
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL; ?>css/styles.css?v=12"/>
<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_URL; ?>css/jquery.mobile-1.3.2.min.css?v=12"/>
<?php $ad = $this->action('banner','banner','会员中心',1);?>
<div style="min-height:300px; padding-bottom:10px; font-size:14px; background:#FFF" class="ucenter">
    <div class="wrap">
    <div class="top1">
        <div><img src="<?php echo !empty($rt['userinfo']['headimgurl']) ? $rt['userinfo']['headimgurl'] : (!empty($rt['userinfo']['avatar']) ? SITE_URL.$rt['userinfo']['avatar'] : $this->img('noavatar_big.jpg'));?>"/></div>
    </div>
    <!-- <div class="red"><a href="<?php echo ADMIN_URL.'in.php';?>">我要成为运营中心或代理商，请点击立即申请</a></div> -->
</div>

    <div data-role="content" class="ui-content" role="main" style="padding-top:8px;">
        
        <div class="uitem" style="background:url(<?php echo $this->img('25/images/34333.png');?>) 4% center no-repeat #f8f8f8;background-size:28px auto;">
            <p class="pp">
                <a href="javascript:;" onclick="ajax_show_sub(4,this);" style="background:url(<?php echo $this->img('404-2.png');?>) 90% center no-repeat"><i></i>我的资料</a>
            </p>
            <ul class="gonglist gg4">
                <li class="uli6"><p><a href="<?php echo ADMIN_URL.'user.php?act=myinfos_u';?>"><i></i>我的账号资料</a></p></li>
                <li class="uli9"><p><a href="<?php echo ADMIN_URL.'user.php?act=myinfos_s';?>"><i></i>我的收货资料</a></p></li>
                <li class="uli10"><p><a href="<?php echo ADMIN_URL.'user.php?act=myinfos_b';?>"><i></i>银行卡号资料</a></p></li>      
                <div class="clear"></div>
            </ul>
        </div>
        
        <div class="uitem" style="background:url(<?php echo $this->img('25/images/23.png');?>) 4% center no-repeat #f8f8f8;background-size:28px auto;">
            <p class="pp">
                <a href="<?php echo ADMIN_URL;?>user.php?act=orderlist" style="background:url(<?php echo $this->img('404-2.png');?>) 90% center no-repeat"><i ></i>我的订单</a>
            </p>
        </div>

        <div class="uitem" style="background:url(<?php echo $this->img('25/images/212.png');?>) 4% center no-repeat #f8f8f8;background-size:28px auto;">
            <p class="pp">
                <a href="<?php echo ADMIN_URL;?>user.php?act=dailicenter" style="background:url(<?php echo $this->img('404-2.png');?>) 90% center no-repeat"><i ></i>代理中心</a>
            </p>
        </div>

         <div class="uitem" style="background:url(<?php echo $this->img('25/images/432.png');?>) 4% center no-repeat #f8f8f8;background-size:28px auto;">
            <p class="pp">
            <a href="<?php echo ADMIN_URL;?>user.php?act=zpoints" style="background:url(<?php echo $this->img('404-2.png');?>) 90% center no-repeat"><i ></i>积分榜</a>
            </p>
        </div>       
<!-- 
        <div class="uitem">
            <p class="pp">
                <a href="<?php echo ADMIN_URL;?>user.php?act=mygift"><i style="float:right;background:url(<?php echo $this->img('bottomNavRecommend.png');?>) 10% center no-repeat"></i>我的礼包</a>
            </p>
        </div> 
        
        <div class="uitem" style="background:url(<?php echo $this->img('25/images/212.png');?>) 4% center no-repeat #f8f8f8;background-size:28px auto;">
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
        $(obj).find('i').css('background','url(<?php echo $this->img('+h.png');?>) 10% center no-repeat');
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
<?php $this->element('25/footer',array('lang'=>$lang)); ?>