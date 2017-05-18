<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/25/css.css" media="all" />
<style type="text/css">
body{ background:#FFF !important; }
#main .goods_desc table,#main .goods_desc table td,#main .goods_desc img,#main .goods_desc div img,#main .goods_desc p img,#main .goods_desc table td img{ max-width:100%;}
.pages a{ padding:1px 5px 1px 5px; border-bottom:2px solid #ccc; border-right:2px solid #ccc; border-left:1px solid #ededed; border-top:1px solid #ededed; margin-left:3px; background:#fafafa}
</style>

<!--顶栏焦点图--> 
<div class="flexslider" style="margin-bottom:0px;">
     <ul class="slides">
        <li><img<?php echo $ks=='0' ? ' class="ggimg"' :'';?> src="<?php echo SITE_URL . $rt['goodsinfo']['goods_img'];?>" width="100%" alt="<?php echo $row['img_desc'];?>"/></li>
      </ul>
</div>

<div style="height:34px; line-height:34px; padding-left:10px; padding-right:10px; background:#F08125; font-size:16px; color:#FFF">基本信息</div>

<div id="main">
    <div class="mainhead" style="padding:5px; border-top:1px solid #ededed;border-bottom:1px solid #ededed;background:#FFF">
        <form id="group_buy" method="POST" action="<?php echo ADMIN_URL; ?>mycart.php?type=group_checkout" >
        <input type="hidden" name="group_id" value="<?php echo $rt['goodsinfo']['group_id']; ?>" />
        <div class="shopinfol" style="font-size:14px">
        <h1 style="font-size:16px"> <?php echo $rt['goodsinfo']['group_name']; ?> </h1>
        原价:
        <font class="spirce"><del>￥<?php echo $rt['goodsinfo']['original_price']; ?></del></font>&nbsp;&nbsp;
        <span class="vippfont">团购价:</span>
        <span class="price">￥<?php echo $rt['goodsinfo']['price']; ?></span>
        <!-- 数量选择 Start -->
        <p style="height:24px; line-height:24px; padding-top:8px;">
        <a class="gjian" style="cursor:pointer; display:block; float:left; width:35px; height:22px;line-height:22px;text-align:center; font-size:18px; font-weight:bold; border:1px solid #e8e8e8; background:#ededed;border-radius:5px 0px 0px 5px">-</a>
        <input readonly="" id="<?php echo $k;?>" name="number" value="1" class="inputBg" style="float:left;text-align: center; width:20px; height:22px; line-height:22px;border-bottom:1px solid #e8e8e8; border-top:1px solid #e8e8e8" type="text"> 
        <a class="gjia" style="cursor:pointer; display:block; float:left; width:35px; height:22px;line-height:22px;text-align:center; font-size:18px; font-weight:bold; border:1px solid #e8e8e8; background:#ededed;border-radius:0px 5px 5px 0px">+</a>
        </p>
        <!-- 数量选择 End -->        
        </div>
        </form>
    </div>
    <div class="mainbottombg">
    <span class="ac" id="tab1">产品详情</span>
    <span style="left:97px" id="tab2">团购记录</span>
    </div>
    <div style="padding:10px;" class="goods_desc">
    <div class="tabs tab1">
    <?php echo $rt['goodsinfo']['desc']; ?>
    </div>
    <div class="tabs tab2" style="display:none; text-align:center; min-height:200px;">
    <div style="min-height:50px; border-bottom:1px solid #ededed; padding-bottom:5px" class="GOODSCOMMENT">
    <?php $this->element( 'ajax_group_user', array( 'group_user_list' => $group_user_list ) ); ?>
    </div>
<style type="text/css">
.rate-control{ padding-top:5px;}
.rate-control li{ width:80px; float:left}
.rate-control label {
float: left;
padding: 4px 5px;
cursor: pointer;
}
.rate-control label input{vertical-align: bottom;}
.icon {
background: url(<?php echo $this->img('haoping.png');?>) no-repeat;
display: inline-block;
vertical-align: text-bottom;
}
.icon-good {
width: 16px;
height: 17px;
background-position: 0px -34px;
}
.icon-bad {
width: 17px;
height: 17px;
background-position: 0px 0px;
}
.icon-normal {
width: 16px;
height: 17px;
background-position: 0px -17px;
}
.icon-img-upload{ float:left; margin-left:2px; display:block; width:17px; height:20px;background:url(<?php echo $this->img('imgb.png');?>) 0px center no-repeat}
.thumbs{float:left; margin-left:5px; height:50px;}
.thumbs img{ margin-right:5px; border:1px solid #ededed; padding:1px;}
.guest_submit {
width: 75px;
height: 31px;
line-height: 31px;
background: url(<?php echo $this->img('more_bg.jpg');?>) repeat-x;
float: left;
border: none;
cursor: pointer;
border-radius: 3px;
font-size: 12px;
text-align: center;
color: #FFF;
margin-left:5px;
}
</style>

    </div>
    </div>
</div>
<div class="show_zhuan" style=" display:none;width:100%; height:100%; position:absolute; top:0px; right:0px; z-index:9999999;filter:alpha(opacity=90);-moz-opacity:0.9;opacity:0.9; background:url(<?php echo $this->img('gz/121.png');?>) right top no-repeat #000;background-size:100% auto;" onclick="$(this).hide();"></div>
<div class="show_gz" style=" display:none;width:100%; height:100%; position:absolute; top:44px; right:0px; z-index:9999999;filter:alpha(opacity=60);-moz-opacity:0.6;opacity:0.6; background:url(<?php echo $this->img('gz/gz.png');?>) right top no-repeat #000;" onclick="$(this).hide();"></div>
<?php
 $thisurl = Import::basic()->thisurl();
 $rr = explode('?',$thisurl);
 $t2 = isset($rr[1])&&!empty($rr[1]) ? $rr[1] : "";
 $dd = array();
 if(!empty($t2)){
    $rr2 = explode('&',$t2);
    if(!empty($rr2))foreach($rr2 as $v){
        $rr2 = explode('=',$v);
        if($rr2[0]=='from' || $rr2[0]=='isappinstalled'|| $rr2[0]=='code'|| $rr2[0]=='state') continue;
        $dd[] = $v;
    }
 }
 $thisurl = $rr[0].'?'.(!empty($dd) ? implode('&',$dd) : 'tid=0');
?>
<script type="text/javascript">
  var picrt = [];
  function run(pic){
    $('.thumbs').append('<img src="<?php echo SITE_URL;?>'+pic+'" width="60" height="60" />');
    picrt.push(pic);
  }
  
  function _report(a,c){
    $.post('<?php ADMIN_URL;?>product.php',{action:'ajax_share',type:a,msg:c,thisurl:'<?php echo Import::basic()->thisurl();?>',imgurl:'<?php echo SITE_URL.$rt['goodsinfo']['goods_img'];?>',title:'<?php echo $rt['goodsinfo']['goods_name'];?>'},function(data){
    });
  }

  function ajax_user_comment(){
      user_id = $("#user_id").val();
      if(user_id=="" || typeof(user_id)=="undefined"){
        //alert(user_id);
        $('.returnmes').html('你还没有登录！请先登录！');
      }
  }
  
  function ajax_submit_mes(){
      var goods        = new Object();
      //createwindow();
      goods.ranks = $('input[name="ranks"]:checked').val();
      content = $('textarea[name="content"]').val();
      if(content=="" || typeof(content)=="undefined"){
        $('.returnmes').html('内容不能为空！');
        return false;
      }

      user_id = $("#user_id").val();
      if(user_id=="" || typeof(user_id)=="undefined"){
        //alert(user_id);
        $('.returnmes').html('你还没有登录！请先登录！');
        return false;
      }
      
      order_count = $("#order_count").val();
      if(order_count<=0 || typeof(order_count)=="undefined"){
        //alert(order_count);
        $('.returnmes').html('抱歉，你还没有购买当前商品，不能评论哦！');
        return false;
      }

      comment_count = $("#comment_count").val();
      if(comment_count>=0 || typeof(comment_count)=="undefined"){
        //alert(comment_count);
        $('.returnmes').html('抱歉，你已经评论过该商品，不能再评论哦！bbbb');
        //return false;
      }

      goods.goods_id = '<?php echo $rt['goodsinfo']['goods_id'];?>';
      goods.content = content;
      goods.pics = picrt.join('|');
      
      $.ajax({
           type: "POST",
           url: "<?php echo ADMIN_URL;?>product.php?action=ajax_submit_mes",
           data: "goods=" + $.toJSON(goods),
           dataType: "json",
           success: function(data){
                removewindow();
                if(data.error=='0'){
                    $('.GOODSCOMMENT').html(data.message);
                }else{
                    $('.returnmes').html(data.message);
                }
                //location.reload();
           }//end sucdess
        });
  }
</script>
    
<script type="text/javascript">
$('.mainbottombg span').click(function(){
    $(this).parent().find('span').removeClass('ac');
    $(this).addClass('ac');
    $('.tabs').hide();
    art = $(this).attr('id');
    $('.'+art).show();
    
});
$('input[name="number"]').change(function(){
    vall = $(this).val();
    if(!(vall>0)){
        $(this).val('1');
    }
});

$('.spec_p a').click(function(){
    na = $(this).attr('name');
    vl = $(this).attr('id');
    $('input[name="'+na+'"]').val(vl);
    
    $(this).parent().find('a').each(function(i){
       this.style.border='1px solid #cbcbcb';
    });
    
    $(this).css('border','1px solid #FF0000');
    
    return false;
});

$('#main .gjia').click(function(){
    var tnum = $(this).parent().find('input').val();
    $(this).parent().find('input').val(parseInt(tnum)+1);
});
$('#main .gjian').click(function(){
    var tnum = $(this).parent().find('input').val();
    tnum = parseInt(tnum);
    if(tnum>1){
        $(this).parent().find('input').val(tnum-1);
    }
}); 
</script>
<style type="text/css">
body { padding-bottom:60px !important; }
.top_menu li b {width: 38px;height: 20px;line-height: 17px;display: block;color: #fff;text-align: center;font-size: 12px;}
.top_menu li b em {padding:0px 3px 0px 3px;border-radius: 100%;text-align: center;background-color: red;display: block;position: absolute;z-index: 9999;margin-top: -10px;margin-left: 22px;}
user agent stylesheeti, cite, em, var, address, dfn {font-style: italic;}

.top_menu li.li2 a.butt-cart{display: inline-block;font-size: 15px;width: 90%;height: 40px;line-height: 38px;margin: 6px auto 5px auto;padding: 0;color: #FFF;border-radius: 3px;background:#32a000;}
.top_menu li.li4 a.butt-buy {display: inline-block;font-size: 15px;width: 90%;height: 40px;line-height: 38px;margin: 6px auto 5px auto;padding: 0;color: #FFF;border-radius: 3px;background:#ff6400;}
</style>

<div class="top_bar" style="-webkit-transform:translate3d(0,0,0);background:rgba(230,230,230,0.9);">
   <nav>
    <ul id="top_menu" class="top_menu">
    <li style="width:20%"></li>
    <li class="li2" style="width:30%">
    </li>
    <li class="li4" style="width:30%">
    <a class="butt-buy" onclick="submit_groupbuy();" style="border:none">立即团购</a>
    </li>
    <li style="width:20%"></li>    
    </ul>
  </nav>
</div>
<style type="text/css">
#collectBox{width:100px;height:40px;z-index:-2;position:fixed;bottom:0px;right:0px;background:none;}
</style>
<div id="collectBox"></div>
<script type="text/javascript">
    /* 立即团购 */
    function submit_groupbuy()
    {
        $( '#group_buy' ).submit();
    }
</script>