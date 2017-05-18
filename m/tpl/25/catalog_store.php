<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/25/css.css" media="all" />
<?php $this->element( '25/top', array( 'lang' => $lang ) ); ?>
<link rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/25/201608style/css/new_style.css?v=1.27" />
<script src="<?php echo ADMIN_URL;?>tpl/25/201608style/js/TouchSlide.1.1.js"></script>
    <div class="ml_banner">
           <div class ="news_banner">
        <div id="slideBox" class="slideBox">
            <div class="bd">
                <ul>
                <?php foreach ( (array)$store_info['store_picarr'] as $k => $v ) { ?>
                    <li>
                        <a class="pic" href="#">
                        <img src="<?php echo SITE_URL . $v; ?>" style=""/></a>
                    </li>
                <?php }?>
                </ul>
            </div>
            <div class="hd">
                <ul></ul>
            </div>
        </div>
        <script type="text/javascript">
            TouchSlide({
                slideCell: "#slideBox",
                titCell: ".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
                mainCell: ".bd ul",
                effect: "leftLoop",
                autoPage: true,//自动分页
                autoPlay: true //自动播放
            });
        </script>
        <div class="ml_detailed">
            <h1><?php echo $store_info['store_name'];?></h1>
                <p>联系电话：<?php echo $store_info['phone'];?></p>
                <a href="tel://<?php echo $store_info['phone'];?>"><img src="<?php echo ADMIN_URL;?>tpl/25/201608style/img/phone_05.png"></a>    
        </div>
        <div class="ml_place">
            <img src="<?php echo ADMIN_URL;?>tpl/25/201608style/img/dizhi_03.png">
            <span><?php echo $store_info['address'];?></span>
        </div>
        </div>
        <div >
            
        </div>

    </div>

<!-- 商品列表 Start -->
<ul class="groupbuy_list">
<?php if ( ! empty( $goods_list ) ) { ?>
<?php foreach ( $goods_list as $k => $goods ) { ?>
    <li style="width:50%; float:left; position:relative">
        <div style="padding:4px;">
        <a style="background:#fff; padding:5px; display:block;" href="<?php echo ADMIN_URL.'product.php?id='.$goods['goods_id']; ?>">
            <div style=" height:150px; overflow:hidden; text-align:center;">
                <img src="<?php echo SITE_URL . $goods['goods_img']; ?>" style="max-width:99%; height:130px;display:inline;" />
            </div>
            <p style="line-height:20px; height:20px; overflow:hidden; text-align:center">
                <?php echo $goods['goods_name']; ?>
            </p>
            <p style="line-height:45px; height:45px; overflow:hidden;">
                <span style="float:left">本店价:</span>
                <b class="price" style="font-size:14px; float:left; padding-left:3px;">
                ￥<?php echo str_replace( '.00', '', $goods['pifa_price'] ); ?>
                </b>
            </p>
        </a>
        </div>
        <a href="<?php echo ADMIN_URL.'product.php?id='.$goods['goods_id']; ?>">
        <span class="buyfals">立即购买</span>
        </a>
    </li>
<?php } } ?>
<div class="clear"></div>
</ul>
<!-- 商品列表 End -->

<?php $this->element( '25/footer', array('lang'=>$lang) ); ?>