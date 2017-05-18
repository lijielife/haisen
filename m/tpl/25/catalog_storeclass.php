<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/25/css.css" media="all" />
<link rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/25/201608style/css/new_style.css?v=20170216" />
<?php $this->element( '25/top', array( 'lang' => $lang ) ); ?>

<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
    wx.config({
        debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
        appId: "<?php echo $signPackage['appId'] ?>",           // 必填，公众号的唯一标识
        timestamp: "<?php echo $signPackage['timestamp'] ?>",   // 必填，生成签名的时间戳
        nonceStr: "<?php echo $signPackage['nonceStr'] ?>",     // 必填，生成签名的随机串
        signature: "<?php echo $signPackage['signature'] ?>",   // 必填，签名，见附录1
        jsApiList: [
            'getLocation'
        ] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
    });

    <?php if ( ! $longitude && ! $latitude ) { ?>
    wx.ready( function() {
        wx.getLocation({
            type: 'wgs84', // 默认为wgs84的gps坐标，如果要返回直接给openLocation用的火星坐标，可传入'gcj02'
            success: function (res) {
                var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
                var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
                var speed = res.speed; // 速度，以米/每秒计
                var accuracy = res.accuracy; // 位置精度
                var url = "<?php echo ADMIN_URL; ?>" + 'catalog.php?act=store_list&flag=' + "<?php echo $flag; ?>";
                url += '&longitude=' + longitude + '&latitude=' + latitude;
                location.href = url;
            }
        });
    });
    <?php } ?>
</script>

<?php
    $param = '';
    if ( $longitude && $latitude )
    {
        $param = '&longitude='. $longitude .'&latitude=' . $latitude;
    }
?>
<div class="tab1" id="tab1">
    <div class="menua">
        <ul>
          <?php foreach ( (array)$store_class_list as $k => $v ) { ?>
            <a href="<?php echo ADMIN_URL; ?>catalog.php?act=store_list&flag=<?php echo $v['class_id'] . $param; ?>"><li <?php if ( $flag == $v['class_id'] ){echo 'class="off"';} ?>><?php echo $v['class_name']; ?></li></a>
          <?php } ?>
        </ul>
    </div>
    <div class="menudiv">
        <div id="con_one_1">
            <div class="ml_main">
                <ul>
                <?php foreach ( (array)$store_list as $k => $v ) { ?>
                <?php 
                    $distance = getDistance( $v['latitude'], $v['longitude'], $latitude, $longitude );
                    $range = $store_class_list[ $v['class_id'] ]['range'];
                ?>
                <?php /* 只显示在距离显示范围之内的商铺   0 不限制 */ ?>
                <?php if ( $distance <= $range || 0 == $range ) { ?>
                    <li>
                        <div class="ml_main_lt">
                            <a href="#">
                                <?php if( $v['store_logo'] == '' ){?>
                                <img src="<?php echo ADMIN_URL;?>tpl/25/201608style/img/40403.png">
                                <?php }else{?>
                                <img src="<?php echo SITE_URL .$v['store_logo']; ?>">
                                <?php }?>
                            </a>
                        </div>
                        <div class="ml_main_rt">
                            <h1><?php echo $v['store_name'];?></h1>
                            <h2>联系电话：<?php echo $v['phone'];?></h2>
                            <img src="<?php echo ADMIN_URL;?>tpl/25/201608style/img/dizhi_03.png">
                            <h3><?php echo $v['address'];?></h3>
                            <a href="<?php ADMIN_URL; ?>catalog.php?act=store_detail&store_id=<?php echo $v['store_id'];?>">进入店铺</a>
                            <?php if ( $v['latitude'] && $v['longitude'] && $latitude && $longitude ) { ?>
                            <span>
                            <?php echo $distance; ?>km
                            </span>
                            <?php } ?>
                        </div>
                    </li>
                <?php } ?>
                <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php $this->element( '25/footer', array('lang'=>$lang) ); ?>