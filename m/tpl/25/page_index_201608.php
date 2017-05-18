<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content="width=device-width,user-scalable=no,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" name="viewport">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="keywords" content="华海众参">
<meta name="description" content="华海众参!">
<title>华海众参</title>
<?php $style_url = ADMIN_URL . 'tpl/25/201608style'; ?>
<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL; ?>tpl/25/css.css?v=4" media="all" />
<link rel="stylesheet" href="<?php echo $style_url; ?>/css/style_v1013.css?v=1.27" />
<link rel="stylesheet" href="<?php echo $style_url; ?>/css/index_v1013.css?v=1.27" />
<script src="<?php echo $style_url; ?>/js/jquery1.7.js?v=1.27" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo $style_url; ?>/js/TouchSlide.1.1.js?v=1.27" type="text/javascript" charset="utf-8"></script>

</head>
<body>
<!--header-->
<div class="header_dl">
  <div class="back"></div>
    <h1>
      <a href="" class="logo">
      <img src="<?php echo $style_url; ?>/img/8525.png?v=1.27" alt="华海众参!" title="华海众参!" />
      </a>
    </h1>
    <!-- <div class="search">
      <input type="text" class="sea" name="s_words" placeholder="请输入关键词" />
      <input type="button" class="btn" />
    </div> -->
</div>
<!--h3-->
<!--searchbox-->
<div class="searchBox">
  <div class="list">
    <ul>

    </ul>
  </div>
</div>
<!--end-->
<section class="index">
    <!-- banner -->
    <!-- banner -->
<div id="slideBox" class="slideBox">
    <div class="bd">
        <ul>
            <li><a href="#" title="华海众参"><img src="<?php echo $style_url; ?>/img/11.jpg"  alt="华海众参" /></a></li>
            <li><a href="#" title="E华海众参"><img src="<?php echo $style_url; ?>/img/12.jpg"  alt="E华海众参" /></a></li>
            <li><a href="#" title="华海众参"><img src="<?php echo $style_url; ?>/img/13.jpg"  alt="华海众参" /></a></li>
            <li><a href="#" title="华海众参"><img src="<?php echo $style_url; ?>/img/11.jpg"  alt="华海众参" /></a></li>
            <li><a href="#" title="华海众参"><img src="<?php echo $style_url; ?>/img/12.jpg"  alt="华海众参" /></a></li>
        </ul>
    </div>
    <div class="hd">
        <ul></ul>
    </div>
</div>
<script type="text/javascript">
  TouchSlide({ 
    slideCell:"#slideBox",
    titCell:".hd ul", 
    mainCell:".bd ul", 
    effect:"leftLoop", 
    autoPage:true,
    autoPlay:true 
  });
</script>
<!-- end -->

<!--menu-->
<div class="menu">
  <ul>
  <?php foreach ( (array)$goods_info['store_class'] as $k => $v ) { ?>
    <li>
      <a href="<?php echo ADMIN_URL; ?>catalog.php?act=store_list&flag=<?php echo $v['class_id'];?>">
        <i><img src="<?php echo $style_url; ?>/img/menu_icon<?php echo ($k+1);?>.png" alt="<?php echo $v['class_name'];?>" /></i>
        <p><?php echo $v['class_name'];?></p>
      </a>
    </li>
  <?php }?>
  </ul>
</div>
<!-- menu end -->
<!-- 专属产品 Start -->
<div class="index_list1">
  <div class="index_title">
    专属产品
    <span><a href="<?php ADMIN_URL; ?>catalog.php?act=exclusive">更多》</a></span>
  </div>
  <div class="index_list1_con">    
    <div class="index_list_r">
      <ul>
      <?php foreach ( (array)$goods_info['distribution'] as $k => $v ) { ?>
      <?php if ( $k < 4 ) { ?>
        <li> 
          <div class="pro-img"> 
            <a href="<?php echo ADMIN_URL . 'product.php?id=' . $v['goods_id']; ?>"> 
              <img src="<?php echo SITE_URL . $v['goods_thumb']; ?>" alt="<?php echo $v['goods_name']; ?>"> 
            </a>
          </div>
          <span> <?php echo $v['goods_name']; ?> </span><b>￥<?php echo $v['pifa_price']; ?></b>
        </li>
      <?php } } ?>
      </ul>    
    </div>
  </div>   
</div>

<!-- 我的团购 Start -->
 <div class="index_list2">
<div class="index_title">
  我的团购
  <span><a href="<?php ADMIN_URL; ?>catalog.php?act=groupbuy">更多》</a></span>
</div>
  <div class="index_list2_con">
    <ul>
    <?php foreach ( (array)$goods_info['groupbuy'] as $k => $v ) { ?>
      <li>
        <a href="<?php echo ADMIN_URL . '/group_product.php?id=' . $v['group_id']; ?>" title="华海众参">
          <img src="<?php echo SITE_URL . $v['goods_img']; ?>"  alt="华海众参" />
          <span> <?php echo $v['group_name']; ?> </span>
        </a>
        <i> ￥<?php echo $v['price']; ?> </i>
        <b> <?php echo $v['number']; ?>人团购 </b>
      </li>
    <?php } ?>
    </ul>
  </div>
</div>
<!-- 我的团购 End -->


<!-- 会员专区 Start -->
<div class="index_list1">
  <div class="index_title">
    会员专区
    <span><a href="<?php ADMIN_URL; ?>catalog.php?act=member_zone">更多》</a></span>
  </div>
  <div class="index_list1_con">    
    <div class="index_list_r">
      <ul>
      <?php foreach ( (array)$goods_info['member_dis'] as $k => $v ) { ?>
      <?php if ( $k < 4 ) { ?>
        <li> 
          <div class="pro-img"> 
            <a href="<?php echo ADMIN_URL . 'product.php?id=' . $v['goods_id']; ?>"> 
              <img src="<?php echo SITE_URL . $v['goods_thumb']; ?>" alt="<?php echo $v['goods_name']; ?>"> 
            </a>
          </div>
          <span> <?php echo $v['goods_name']; ?> </span><b>￥<?php echo $v['pifa_price']; ?></b>
        </li>
      <?php } } ?>
      </ul>    
    </div>
  </div>   
</div>
<!--end-->



<!-- 提前出海 Start -->
<div class="index_list1">
  <div class="index_title">
    提前出海
    <span><a href="<?php ADMIN_URL; ?>catalog.php?act=advance_sea">更多》</a></span>
  </div>
  <div class="index_list1_con">    
    <div class="index_list_r">
      <ul>
      <?php foreach ( (array)$goods_info['crowdbuy'] as $k => $v ) { ?>
      <?php if ( $k < 4 ) { ?>
        <li> 
          <div class="pro-img"> 
            <a href="<?php echo ADMIN_URL . 'product.php?id=' . $v['goods_id']; ?>"> 
               <img src="<?php echo SITE_URL . $v['goods_img']; ?>"  alt="华海众参">
            </a>
          </div>
          <span> <?php echo $v['group_name']; ?> </span><b>￥<?php echo $v['price']; ?></b>
        </li>
      <?php } } ?>
      </ul>    
    </div>
  </div>   
</div> 
<!--end-->

</section>

<!--底部footer-->
<?php $this->element( '25/footer', array( 'lang' => $lang ) ); ?>
<!--end-->

</body>
</html>