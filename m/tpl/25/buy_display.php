<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/25/css.css" media="all" />
<?php $this->element( '25/top', array( 'lang' => $lang ) ); ?>
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
.pages{ margin-top:20px;}
.pages a{ background:#ededed; padding:2px 4px 2px 4px; border-bottom:2px solid #ccc; border-right:2px solid #ccc; margin-right:5px;}
#main table td:hover{ background:#fafafa}
#main table td p a{ line-height:18px;display:block; padding:1px 5px 1px 5px; float:left; background:#fafafa; border-right:2px solid #d5d5d5;border-radius:10px; margin-right:5px;border-top:1px solid #ededed;border-left:1px solid #ededed; font-size:12px}

#main table td p a.butt-cart2 {
display: inline-block;
font-size: 15px;
width: 70%;
height: 34px;
line-height: 34px;
margin: 6px auto 5px auto;
padding: 0;
color: #FFF;
border-radius: 10px;
background: #32a000;
text-align:center;
 background-image:-webkit-gradient(linear,left top,left bottom,from(#92c63e),to(#6aa129));background-image: -webkit-linear-gradient(#92c63e,#6aa129);background-image: linear-gradient(#92c63e,#6aa129);
}
</style>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$( function() {
    /* GET到group参数就显示团购订单 */
    if ( "<?php echo $_GET['group'] ?>" )
    {
        $( '#h1_group_order' ).addClass("yth1click").siblings().removeClass("yth1click");
        $($(".yScrollListInList")[1]).show().siblings().hide();
    }
    $(".yScrollListTitle h1").click( function () {
        var index = $(this).index(".yScrollListTitle h1");
        $(this).addClass("yth1click").siblings().removeClass("yth1click");
        $($(".yScrollListInList")[index]).show().siblings().hide();
    })
    $(".yScrollListInList1 ul").css({width:$(".yScrollListInList1 ul li").length*(160+84)+"px"});
    $(".yScrollListInList2 ul").css({width:$(".yScrollListInList2 ul li").length*(160+84)+"px"});
    var numwidth = (160+84)*5;
    $(".yScrollListInList .yScrollListbtnl").click(function(){
        var obj=$(this).parent(".yScrollListInList").find("ul");
        if (!(obj.is(":animated"))) {
            var lefts=parseInt(obj.css("left").slice(0,-2));
            if(lefts<30){
                obj.animate({left:lefts+numwidth},1000);
            }
        }
    })
    $(".yScrollListInList .yScrollListbtnr").click(function(){
        var obj=$(this).parent(".yScrollListInList").find("ul");
        var objcds=-(30+(Math.ceil(obj.find("li").length/5)-2)*numwidth);
        if (!(obj.is(":animated"))) {
            var lefts=parseInt(obj.css("left").slice(0,-2));
            if(lefts>objcds){
                obj.animate({left:lefts-numwidth},1000);
            }
        }
    })
})
</script>


<div class="yScrollList">
    <div class="yScrollListTitle">
        <h1 class="yth1click"><?php echo NAVNAME;?></h1>
    </div>
    <div class="yScrollListIn">
    <div class="yScrollListInList yScrollListInList1" style="display:block;">
    <div id="main" style="min-height:300px">
     <table  width="100%" border="0" cellpadding="0" cellspacing="0" style="line-height:25px;  overflow:hidden">
        <tr>
        <td style="border-bottom:1px solid #E0E0E0;  padding-right:10px">
        <p style="color:#5286B7">个人消费总额:<font color="#60ACDC"><?php echo $person_buy_sum;?>元</font></p>
        <p style="color:#5286B7">奖励所需消费总额:<font color="#60ACDC"><?php echo $need_sum;?>元</font></p>
        <p style="color:#5286B7">还需要继续购买:<font color="#FF0000"><?php echo $diff;?>元</font></p>
        <p style="color:#5286B7">分成描述:<font color="#FF0000"><?php echo $desc;?></font></p>
        <p>
        <div class="clear"></div>
        </p>
        <p style="margin-top:5px; padding-bottom:10px;"></p>
        </td>
      </tr>
      <tr>
      <td style="text-align:left;" class="pagesmoney">
      </td>
      </tr>
     </table>
    </div>
    </div>
</div>


<script type="text/javascript">
function js_show_sn(sn,pass,obj){
    str = sn!="" ? '卡号:'+sn : '';
    str += pass!="" ? '卡密:'+pass : '';
    $(obj).html(str);
}

function ger_ress_copy(type,obj,seobj){
    parent_id = $(obj).val();
    if(parent_id=="" || typeof(parent_id)=='undefined'){ return false; }
    $.post(SITE_URL+'user.php',{action:'get_ress',type:type,parent_id:parent_id},function(data){
        if(data!=""){
            $(obj).parent().find('#'+seobj).html(data);
            if(type==3){
                $(obj).parent().find('#'+seobj).show();
            }
            if(type==2){
                $(obj).parent().find('#select_district').hide();
                $(obj).parent().find('#select_district').html("");
            }
        }else{
            alert(data);
        }
    });
}

$('.oporder').live( 'click', function() {
    if ( confirm( "确定吗？" ) ) {
        createwindow();
        id = $(this).attr('id');
        na = $(this).attr('name');
        $.post('<?php echo ADMIN_URL.'user.php';?>',{action:'ajax_order_op_user', id:id, type:na},function ( data ) {
            removewindow();
            if ( data == '' ) {
                window.location.href = '<?php echo Import::basic()->thisurl(); ?>';
            } else {
                alert( data );
            }
        });
    }
    return false;
});

/**
 * 团购订单操作
 */
$( '.group_order' ).live( 'click', function() {
    if ( confirm( "确定吗？" ) ) {
        createwindow();
        id = $(this).attr('id');
        na = $(this).attr('name');
        var url = '<?php echo ADMIN_URL.'user.php'; ?>';
        var data = { action:'ajax_grouporder_op_user', id:id, type:na };
        $.post( url, data,function ( data ) {
            removewindow();
            if ( data == '' ) {
                window.location.href = '<?php echo Import::basic()->thisurl() . '&group=1'; ?>';
            } else {
                alert( data );
            }
        });
    }
    return false;
});
</script>
<?php $this->element( '25/footer', array( 'lang' => $lang ) ); ?>