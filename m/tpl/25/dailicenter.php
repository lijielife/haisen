<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/25/css.css" media="all" />
<?php $this->element('25/top',array('lang'=>$lang)); ?>

<style type="text/css">
.pw,.pwt{
height:26px; line-height:26px;
border: 1px solid #ddd;
border-radius: 5px;
background-color: #fff; padding-left:5px; padding-right:5px;
-moz-border-radius:5px;/*仅Firefox支持，实现圆角效果*/
-webkit-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
-khtml-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
border-radius:5px;/*仅Opera，Safari,Chrome支持，实现圆角效果*/
}
.pw{ width:90%;}
.usertitle{
height:22px; line-height:22px;color:#666; font-weight:bold; font-size:14px; padding:5px;
border-radius: 5px;
background-color: #ededed; padding-left:5px; padding-right:5px;
-moz-border-radius:5px;/*仅Firefox支持，实现圆角效果*/
-webkit-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
-khtml-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
border-radius:5px;/*仅Opera，Safari,Chrome支持，实现圆角效果*/
}
.dailicenter{ margin:5px;border-radius:5px; border:1px solid #dcd9d8; overflow:hidden}
.dailicenter li{ height:40px; line-height:40px; background:#f8f8f8; border-bottom:1px solid #dcd9d8; text-align:left}
.dailicenter li a{ padding-right:10%;font-size:14px; display:block; background:url(<?php echo $this->img('404-2.png');?>) 90% center no-repeat;}
.dailicenter li a:hover{ background:url(<?php echo $this->img('404-2.png');?>) 90% center no-repeat #6EAAD3}
.dailicenter li i{ list-style:decimal; width:28px; height:40px; float:left; margin-left:7%; margin-right:10px;}
.dailicenter li.li0 i{ background:url(<?php echo $this->img('icon/gg.png');?>) 10% center no-repeat #f8f8f8;background-size:28px auto;}
.dailicenter li.li1 i{ background:url(<?php echo $this->img('25/images/3433.png');?>) 10% center no-repeat #f8f8f8;background-size:28px auto;}
.dailicenter li.li2 i{ background:url(<?php echo $this->img('icon/key.png');?>) 10% center no-repeat #f8f8f8;background-size:28px auto;}
.dailicenter li.li3 i{ background:url(<?php echo $this->img('icon/li8.png');?>) 10% center no-repeat #f8f8f8;background-size:28px auto;}
.dailicenter li.li4 i{ background:url(<?php echo $this->img('25/images/23.png');?>) 10% center no-repeat #f8f8f8;background-size:28px auto;}
.dailicenter li.li5 i{ background:url(<?php echo $this->img('25/images/2323.png');?>) 10% center no-repeat #f8f8f8;background-size:28px auto;}
.dailicenter li.li6 i{ background:url(<?php echo $this->img('25/images/43434.png');?>) 10% center no-repeat #f8f8f8;background-size:28px auto;}
.dailicenter li.li7 i{ background:url(<?php echo $this->img('icon/dp.png');?>) 10% center no-repeat #f8f8f8;background-size:28px auto;}
.dailicenter li.li44 i{ background:url(<?php echo $this->img('25/images/23232.png');?>) 10% center no-repeat #f8f8f8;background-size:28px auto;}
.dailicenter li.li55 i{ background:url(<?php echo $this->img('25/images/212.png');?>) 10% center no-repeat #f8f8f8;background-size:28px auto;}
.dailicenter li.li66 i{ background:url(<?php echo $this->img('25/images/233.png');?>) 10% center no-repeat #f8f8f8;background-size:28px auto;}
.dailicenter li.li77 i{ background:url(<?php echo $this->img('25/images/34333.png');?>) 10% center no-repeat #f8f8f8;background-size:28px auto;}


.dailicenter li.li0 a:hover i{ background:url(<?php echo $this->img('icon/gg.png');?>) 10% center no-repeat #6EAAD3;background-size:28px auto;}
.dailicenter li.li1 a:hover i{ background:url(<?php echo $this->img('25/images/3433.png');?>) 10% center no-repeat #6EAAD3;background-size:28px auto;}
.dailicenter li.li2 a:hover i{ background:url(<?php echo $this->img('icon/key.png');?>) 10% center no-repeat #6EAAD3;background-size:28px auto;}
.dailicenter li.li3 a:hover i{ background:url(<?php echo $this->img('icon/li8.png');?>) 10% center no-repeat #6EAAD3;background-size:28px auto;}
.dailicenter li.li4 a:hover i{ background:url(<?php echo $this->img('25/images/23.png');?>) 10% center no-repeat #6EAAD3;background-size:28px auto;}
.dailicenter li.li5 a:hover i{ background:url(<?php echo $this->img('25/images/2323.png');?>) 10% center no-repeat #6EAAD3;background-size:28px auto;}
.dailicenter li.li6 a:hover i{ background:url(<?php echo $this->img('25/images/43434.png');?>) 10% center no-repeat #6EAAD3;background-size:28px auto;}
.dailicenter li.li7 a:hover i{ background:url(<?php echo $this->img('icon/dp.png');?>) 10% center no-repeat #6EAAD3;background-size:28px auto;}
.dailicenter li.li44 a:hover i{ background:url(<?php echo $this->img('25/images/23232.png');?>) 10% center no-repeat #6EAAD3;background-size:28px auto;}
.dailicenter li.li55 a:hover i{ background:url(<?php echo $this->img('25/images/212.png');?>) 10% center no-repeat #6EAAD3;background-size:28px auto;}
.dailicenter li.li66 a:hover i{ background:url(<?php echo $this->img('25/images/233.png');?>) 10% center no-repeat #6EAAD3;background-size:28px auto;}
.dailicenter li.li77 a:hover i{ background:url(<?php echo $this->img('25/images/34333.png');?>) 10% center no-repeat #6EAAD3;background-size:28px auto;}

</style>
<div id="main" style="padding:5px; min-height:300px; font-size:14px;">
    <ul class="dailicenter">
        <!--<li class="li0">
            <a href="<?php echo ADMIN_URL.'daili.php?act=gonggao';?>"><i></i>代理公告</a>
        </li>-->
        <!-- <li class="li1">
            <a href="<?php echo ADMIN_URL.'user.php?act=orderlist'; ?>"><i></i>我的订单</a>
        </li> -->
        <li class="li5">
            <a href="<?php echo ADMIN_URL.'daili.php?act=myusertype';?>"><i></i>我的团队</a>
            <!--<a href="<?php echo ADMIN_URL.'daili.php?act=myuser&t=1';?>"><i></i>我的客户</a>-->
        </li>
        <li class="li6">
            <a href="<?php echo ADMIN_URL.'daili.php?act=mydata';?>"><i></i>我的推广</a>
        </li>
        <li class="li4">
            <a href="<?php echo ADMIN_URL.'daili.php?act=v2_mymoney';?>"><i></i>我的佣金</a>
        </li>
        
<!--        <li class="li6">
            <a href="<?php echo ADMIN_URL.'daili.php?act=kehuorder';?>">客户订单</a>
        </li>
        <li class="li2">
            <a href="<?php echo ADMIN_URL.'daili.php?act=setpass';?>">修改资料</a>
        </li>-->
        
        <li class="li44">
            <a href="<?php echo ADMIN_URL.'daili.php?act=postmoney';?>"><i></i>申请提款</a>
        </li>
        <li class="li55">
            <a href="<?php echo ADMIN_URL.'daili.php?act=postmoneydata';?>"><i></i>提款记录</a>
        </li>
        <!-- <li class="li77" style="border-bottom:none">
            <a href="<?php echo ADMIN_URL.'user.php?act=myinfos_u';?>"><i></i>我的资料</a>
        </li> -->
         <li class="li66" style="border-bottom:none">
            <a href="<?php echo ADMIN_URL.'user.php?act=crowd_orderlist'; ?>"><i></i>我的众筹</a>
        </li>
<!--        <li class="li5">
            <a href="<?php echo ADMIN_URL.'daili.php?act=fahuo';?>">申请发货</a>
        </li>-->
        
    </ul>
</div>


<?php $this->element('25/footer',array('lang'=>$lang)); ?>
