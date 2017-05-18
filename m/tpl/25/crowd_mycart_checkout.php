<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/25/css.css" media="all" />
<?php // $goodslist = $this->Session->read('cart'); ?>
<div style="height:30px; padding-top:10px; padding-left:10px; padding-right:10px; background:#ee3838; border-bottom:1px solid #ccc; color:#fff">
<span style="float:left">共<?php echo count($goodslist); ?>件商品</span>
<a style="float:right; font-size:14px; color:#fff" href="<?php echo ADMIN_URL;?>">继续购物>></a>
</div>
<style type="text/css">
.checkout{ background:#FFF; padding-top:10px; padding-bottom:10px}
.checkout p.title {
background: #eaeaea;
height: 27px;
line-height: 27px;
text-indent: 10px;
width: 100%;
color: #9a0000;
font-weight: bold;
margin: 10px 0px 0px 0px;
border-bottom:2px solid #CCC
}
.checkout table {
text-align: left;
color: #5f5f5f;
margin:0px;
}
.checkout td {
line-height: 18px;
padding: 3px 0px 3px 0px;
}
.checkout .userreddinfo td {
line-height: 18px;
padding: 2px 0px 2px 0px;
}
.checkout td label{ line-height:22px;}
label{ cursor:pointer}
.pw{ line-height:23px; height:23px;}
.addgallery i{font-style:normal;}
.item-box-buy-btn {
font-size: 12px;
color: #456f9a;
border: 1px solid #456f9a;
border-radius: 5px;
cursor: pointer;
float: right;
width: 80px;
height: 25px;
line-height: 25px;
text-align: center;
overflow: hidden;
white-space: nowrap;
background:#C7ECF3;
}
.addgallery{ padding-left:14px;background:url(<?php echo $this->img('+.png');?>) 3px center no-repeat}
.removegallery{ padding-left:14px;background:url(<?php echo $this->img('-.png');?>) 3px center no-repeat}
</style>
<div id="main" style="padding-top:0px; min-height:300px">
    <div class="checkout">
    <form action="<?php echo ADMIN_URL;?>crowd_mycart.php?type=confirm" method="post" name="CONSIGNEE_ADDRESS" id="CONSIGNEE_ADDRESS">
        <!-- 商品ID -->
        <input type="hidden" name="goods_id" value="<?php echo $goods_id; ?>" />
        <table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
        <?php if(!empty($rt['userress'])){?>
        <?php $userress_id = 0; foreach($rt['userress'] as $row){?>
          <tr>
          <td>
          <label style="padding-left:10px;"><input<?php echo $row['is_default']=='1' ? ' checked="checked"' : '';?> type="radio" class="showaddress" name="userress_id" value="<?php echo $row['address_id'];?>"/>
          <?php
          echo $row['provincename'].$row['cityname'].$row['districtname'].$row['address'].'<br/><span style="padding-left:26px;"></span>'.$row['consignee'].'&nbsp;&nbsp;'. (!empty($row['mobile']) ? $row['mobile'] : $row['tel']);
          ?></label>
          <p style="padding-left:26px;">
          <a href="javascript:;" onclick="ressinfoop('<?php echo $row['address_id'];?>','showupdate',this)" style="border-radius:5px;display:block;background:#ee3838;cursor:pointer;width:60px; height:22px; line-height:22px; font-size:12px; color:#FFF; text-align:center">修改</a>
          </p>
          </td>
          </tr>
          <?php } }?>
          <?php 
            $userress_id = $userress_id > 0 ? $userress_id : (isset($rt['userress'][0]) ? $rt['userress'][0]['address_id'] : 0);
          ?>
          <tr>
          <td><label style="padding-left:10px;"><input class="showaddress" name="userress_id" type="radio" value="0" />&nbsp;添加新收货地址</label></td>
          </tr>
          <tr>
            <td align="left">
                <table width="100%" border="0" cellpadding="0" cellspacing="0"<?php if(!empty($rt['userress'])) echo ' style="display:none"';?> class="userreddinfo">
                  <tr>
                    <td align="right">姓名：</td>
                    <td align="left"><input type="text" value="" name="consignee"  class="pw" style="width:95%;;"/> 
                    </td>
                  </tr>
                   <tr>
                    <td align="right">区域：</td>
                    <td align="left">
                <?php $this->element('address',array('resslist'=>$rt['province']));?>
                    </td>
                    
                  </tr>
                  <tr class="address_sh">
                    <td align="right">地址：</td>
                    <td align="left"><input type="text" value="" name="address"  class="pw" style="width:95%;;"/></td>
                  </tr>
                  <tr>
                    <td align="right">电话：</td>
                    <td align="left"><input type="text" value="" name="mobile"  class="pw" style="width:95%;"/></td>
                  </tr>
                  <tr>
                  <td>&nbsp;</td>
                  <td align="left" colspan="2"><img src="<?php echo $this->img('btu_add.gif');?>" alt="" style="cursor:pointer" onclick="ressinfoop('0','add','CONSIGNEE_ADDRESS')"/></td>
                  </tr>
            </table>
            </td>
          </tr>
        </table>
        <table border="0" cellpadding="0" cellspacing="0" style="width:100%;margin-top:5px;border-top:1px solid #ededed;">
<?php 
    if ( ! empty( $goodslist ) ) {
    $total = 0;
    $uid    = $this->Session->read('User.uid');
    $active = $this->Session->read('User.active');
    $rank   = $this->Session->read('User.rank');
    foreach ( $goodslist as $k => $row ) {
    $total += $row['price'];
?>
            <tr>
                <td style="width:80px; text-align:center; height:80px; padding-top:10px; overflow:hidden; border-bottom:1px solid #ededed;" valign="top">
                    <img src="<?php echo SITE_URL.$row['goods_img'];?>" title="<?php echo $row['group_name'];?>" border="0" style="width:78px; height:78px; border:1px solid #ededed; padding:1px; margin-left:5px;">
                </td>
                <td style="text-align:left;border-bottom:1px solid #ededed;" valign="top">
                <p style="padding-left:10px; padding-right:36px; position:relative; line-height:18px;">
                    <?php echo $row['group_name'];?>
                </p>

                <p style="padding-left:10px;font-size:12px;line-height:20px;" class="raturnprice raturnprice<?php echo $k;?>">
                    众筹价格:
                    <font color="#ee3838" class="gprice<?php echo $k;?>">
                    ￥<?php echo $row['price']>0 ? $row['price']  : $row['pifa_price'];?>
                    </font>
                </p>
                </td>
            </tr>            
            <?php } } ?>
        </table>
        <table border="0" cellpadding="0" cellspacing="0" style="width:100%; margin-top:10px; border-bottom:1px solid #ededed">
            <tr>
                <td align="right" width="22%"><span>支付方式：</span></td>
                <td align="left" width="78%">
                <?php 
                if(!empty($rt['paymentlist'])){
                    echo '<table border="0" cellpadding="0" cellspacing="0" style="width:100%;"><tr>';
                    foreach($rt['paymentlist'] as $k=>$row){
                    ?>
                      <td><label><span><input name="pay_id"  id="pay_id"<?php if($k=='0'){ echo ' checked="checked"';}?> value="<?php echo $row['pay_id'];?>" type="radio"></span><strong><?php echo $row['pay_name'];?></strong>&nbsp;
                      <?php if($row['pay_id']==7) {echo "(佣金";echo empty($rt[ 'userinfo']['user_money']) ? '0.00' : $rt[ 'userinfo']['user_money'];echo "元)";}?>
                      <?php if($row['pay_id']==8) {echo "(优惠卷";echo empty($rt['userinfo']['pay_points']) ? '0.00' : $rt['userinfo']['pay_points'];echo "分)";}?></label></td>
                    <?php
                    }
                    echo '</tr></table>';
                }
                ?>
                  </td>
            </tr>
            <tr style="display:none">
                <td align="right" width="22%">订单附言：</td>
                <td>
                <textarea class="pw" name="postscript" id="postscript" style="width:96%; height:60px;"></textarea>
                </td>
            </tr>
        </table>
        <div style="padding-left:10px; padding-right:10px;">
            <p style="line-height:40px; height:40px; background:#ef6c6c; text-align:center; font-size:14px; color:#fff; padding-top:5px;">
            实付金额: ￥<span class="ztotals"><?php echo $total; ?> 元</span>           
            </p>            
            <p style="height:30px; line-height:30px; margin-top:10px;">
            <input value="提交订单" type="submit" align="absmiddle" onclick="return checkvar()" style="width:100%; height:40px; line-height:40px; background:#ee3838; font-size:18px; color:#FFFFFF; font-weight:bold; text-align:center; cursor:pointer;"/>
            </p>
        </div> 
    </form>
    </div>
</div>
<div style="height:20px;"></div>
<?php  $thisurl = ADMIN_URL.'mycart.php'; ?> 
<script language="javascript" type="text/javascript">
//2位小数
function toDecimal(x) {  
    var f = parseFloat(x);  
    if (isNaN(f)) {  
        return;  
    }  
    f = Math.round(x*100)/100;  
    return f;  
} 

function ajax_clear(){
    if(confirm('确定吗')){
        window.location.href='<?php echo ADMIN_URL;?>mycart.php?type=clear';
        return true;
    }
    return false;
}
$('.showaddress').live('click',function(){
    var vv= $(this).val();
    if(vv==0){
    $('.userreddinfo').show();
    }else{
    $('.userreddinfo').hide();
    }
    //$('.userreddinfo').toggle();
});

function checkvar(){
    pp = $('input[name="pay_id"]:checked').val(); 
    if(typeof(pp)=='undefined' || pp ==""){
        alert("请选择支付方式！");
        return false;
    }
        
    userress_id = $('input[name="userress_id"]:checked').val();
    if(userress_id == '0' || userress_id == '' || typeof(userress_id)=='undefined'){
            consignee = $('input[name="consignee"]').val(); 
            if(typeof(consignee)=='undefined' || consignee ==""){
                alert("收货人不能为空！");
                return false;
            }
            
            provinces = $('select[name="province"]').val();
            if ( provinces == '0' )
            {
                alert("请选择收货地址！");
                return false;
            }
            
            city = $('select[name="city"]').val();
            if ( city == '0' )
            {
                alert("请完整选择收货地址！");
                return false;
            }
            
            district = $('select[name="district"]').val();
            if ( district == '0' )
            {
                alert("请完整选择收货地址！");
                return false;
            }
        
            address = $('input[name="address"]').val(); 
            if(typeof(address)=='undefined' || address ==""){
                alert("详细地址不能为空！");
                return false;
            }
            
            mobile = $('input[name="mobile"]').val(); 
            tel = $('input[name="tel"]').val(); 
            if(mobile =="" && tel ==""){
                alert("请输入手机或者电话号码！");
                return false;
            }
    }   

    return true;
}

$('.delcartid').click(function(){
    if(confirm("确定移除吗")){
        gid = $(this).attr('id');
        $(this).parent().parent().parent().remove();
        obj = $(this);
        $.post('<?php echo $thisurl;?>',{action:'ajax_remove_cargoods',gid:gid},function(prices){
            $('.ztotals').html(prices);
            nn = $('.mycarts').html();
            number = $(obj).parent().parent().find('input[name="goods_number"]').val();
            $('.mycarts').html(parseInt(nn)-parseInt(number));
        });
    }
    return false;
});

//计算邮费
function jisuan_shopping(id){
        if(id=="" || typeof(id)=='undefined') return false;
        uu = $('input[name="userress_id"]:checked').val();
        if(typeof(uu)=='undefined' || uu ==""){
            alert("请选择一个收货地址！");
            return false;
        }
        createwindow();
        $.post('<?php echo $thisurl;?>',{action:'jisuan_shopping',shopping_id:id,userress_id:uu},function(data){
                if(data !="" && typeof(data) !='undefined'){
                    arr = data.split('+');
                    if(arr.length==2){
                    $('.freeshopp').html(arr[1]);
                    b = $('.ppzprice').html();
                    if(b==null || typeof(b)=='undefined'){
                        b = $('.ztotals').html();
                    }
                    
                    $('.freeshoppandprice').html(toDecimal(parseFloat(b)+parseFloat(arr[1])));
                    }else{
                        alert(data);
                    }
                }else{
                    $('.freeshopp').html('0.00');
                    b = $('.ppzprice').html();
                    if(b==null || typeof(b)=='undefined'){
                        b = $('.ztotals').html();
                    }
                    $('.freeshoppandprice').html(parseFloat(b));
                }
                removewindow();
        });
        
}

//数量减1
$('.jian').live('click',function(){
    ob = $(this).parent();
    numobj = ob.find('input[name="goods_number"]');
    vall = $(numobj).val();
    if(!(vall>0)){
        ob.val('1');
        return false;
    }
    if(vall>1){
        $(numobj).val((parseInt(vall)-1));
    }
    nn = $('.mycarts').html();
    $('.mycarts').html(parseInt(nn)-1);
    change_number(numobj);
});
//数量加1
$('.jia').live('click',function(){
    ob = $(this).parent();
    numobj = ob.find('input[name="goods_number"]');
    vall = $(numobj).val();
    if(!(vall>0)){
        $(ob).val('1');
        return false;
    }
    $(numobj).val((parseInt(vall)+1));
    nn = $('.mycarts').html();
    $('.mycarts').html(parseInt(nn)+1);
    change_number(numobj);
});
//改变商品价格
function change_number(obj){
    //地址ID
    userressid = $('input[name="userress_id"]:checked').val();
    if(userressid>0){}else{
        userressid = 5;
    }
    //配送ID
    shippingid = $('input[name="shipping_id"]:checked').val();
    
    id = $(obj).attr('id');
    numbers = $(obj).val();
    if(!(numbers>0)){
        numbers = 1;
        $(obj).val('1');
    }
    createwindow();
    $.post(SITE_URL+'mycart.php',{action:'ajax_change_price',id:id,number:numbers,shipping_id:shippingid,userress_id:userressid},function(data){ 
        removewindow();
        if(data.error=='0'){
            dis = <?php echo $rt['discount']<100 ? ($rt['discount']/100) : 1;?>;
            data.prices = toDecimal(data.prices * dis);
            $('.ztotals').html(data.prices);
            $('.gprice'+id).html('￥'+data.thisprice);
            $('.gzprice'+id).html('￥'+toDecimal(data.thisprice * numbers));
            ff = data.freemoney;
            $('.freeshopp').html(ff);
            $('.freeshoppandprice').html(toDecimal(toDecimal(data.prices)+toDecimal(ff)));
        }else{
            alert(data.message);
        }
    }, "json");
    return true;
}

</script>
<?php $this->element('25/footer',array('lang'=>$lang)); ?>