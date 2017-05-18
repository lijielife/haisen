<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/25/css.css" media="all" />
<?php $this->element( '25/top', array( 'lang' => $lang ) ); ?>

<style type="text/css">
.search_index {
margin: 5px 0px 3px 5px;
height: 46px;
border-radius: 2px;
background: url(<?php echo $this->img('input_bg.png');?>) repeat-x top left;
}
.search_index .right {
width: 44px;
float: right;
text-align: left;
}
.search_index .left {
text-align: center; height:46px;
}
.search_index .input1 {
height: 46px;
line-height: 46px;
text-indent: 5px;
color: #787575;
border: none;
background: url(<?php echo $this->img('611.png');?>) no-repeat center left;
display: block;
float: left;
width: 75%;
}
.goodslists{ min-height:300px;}
.groupbuy_list li img{
	height:90px;
	}
</style>

<!-- 商品列表 Start -->
<ul class="groupbuy_list">
<?php if ( ! empty( $crowd_list ) ) { ?>
<?php foreach ( $crowd_list as $k => $goods ) { ?>
    <li style="width:50%; float:left; position:relative">
        <div style="padding:4px;">
        <a style="background:#fff; padding:5px; display:block;" href="<?php echo ADMIN_URL . '/crowd_mycart.php?type=checkout&id=' . $goods['group_id']; ?>">
            <div style=" height:150px; overflow:hidden; text-align:center;">
                <img src="<?php echo SITE_URL . $goods['goods_img']; ?>" style="max-width:99%;display:inline;" />
            </div>
            <p style="line-height:20px; height:20px; overflow:hidden; text-align:center">
                <?php echo $goods['goods_name']; ?>
            </p>
            <p style="line-height:45px; height:45px; overflow:hidden;">
                <span style="float:left">本店价:</span>
                <b class="price" style="font-size:14px; float:left; padding-left:3px;">
                ￥<?php echo str_replace( '.00', '', $goods['price'] ); ?>
                </b>
            </p>
        </a>
        </div>
        <a href="<?php echo ADMIN_URL . '/crowd_mycart.php?type=checkout&id=' . $goods['group_id']; ?>">
        <span class="buyfals">立即购买</span>
        </a>
    </li>
<?php } } ?>
<div class="clear"></div>
</ul>
<!-- 商品列表 End -->

<?php $this->element( '25/footer', array('lang'=>$lang) ); ?>