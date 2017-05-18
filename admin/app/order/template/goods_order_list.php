<?php
$thisurl = ADMIN_URL . 'goods_order.php'; 
if ( isset( $_GET['asc'] ) )
{
    $oi     = $thisurl . '?type=list&desc=order_id';
    $os     = $thisurl . '?type=list&desc=order_sn';
    $tprice = $thisurl . '?type=list&desc=goods_amount';
    $own    = $thisurl . '?type=list&desc=consignee';
    $dt     = $thisurl . '?type=list&desc=add_time';
}
else
{
    $oi     = $thisurl . '?type=list&asc=order_id';
    $os     = $thisurl . '?type=list&asc=order_sn';
    $tprice = $thisurl . '?type=list&asc=goods_amount';
    $own    = $thisurl . '?type=list&asc=consignee';
    $dt     = $thisurl . '?type=list&asc=add_time';
}
?>
<div class="contentbox">
    <table cellspacing="2" cellpadding="5" width="100%">
    <tr>
        <th colspan="7" align="left">订单列表&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        选择时间：<input type="text" id="EntTime1" name="EntTime1" onclick="return showCalendar('EntTime1', 'y-mm-dd');" /> 至
        <input type="text" id="EntTime2" name="EntTime2" onclick="return showCalendar('EntTime2', 'y-mm-dd');"  />
        联系电话：<input name="mobile" size="15" type="text" value="<?php echo $_GET['mobile'] ? : ''; ?>">
        地址：<input name="address" size="15" type="text" value="<?php echo $_GET['address'] ? : ''; ?>">
        </th>
    </tr>
    <tr><th colspan="7" align="left">
        <img src="<?php echo $this->img('icon_search.gif');?>" alt="SEARCH" width="26" border="0" height="22" align="absmiddle">
        订单号<input name="order_sn"  size="15" type="text" value="<?php echo isset($_GET['order_sn']) ? $_GET['order_sn'] : "";?>">
        收货人<input name="consignee"  size="15" type="text" value="<?php echo isset($_GET['consignee']) ? $_GET['consignee'] : "";?>">
        商家名称
        <select name="store_id" id="store_id">
        <option value="-1" >请选择</option>
            <?php foreach ($store_list as $key => $value): ?>
                <option value="<?php echo $value['store_id'];?>" <?php if( $_GET['store_id'] == $value['store_id'] ) echo "selected";?> ><?php echo $value['store_name'];?>
                </option>
            <?php endforeach ?>
       </select>
        佣金钱包
        <select name="wallet_id" id="wallet_id">
        <option value="" >请选择</option>
            <?php foreach ($wallet_list as $key => $value): ?>
                <option value="<?php echo $value['wallet_id'];?>" <?php if( $_GET['wallet_id'] == $value['wallet_id'] ) echo "selected"; ?> ><?php echo $value['wallet_name'];?>
                </option>
            <?php endforeach ?>
       </select>
       
        订单状态 
        <?php 
        $status_option[-1] = '请选择';
        $status_option[11] = '待确认';
        $status_option[200] = '待付款';
        $status_option[210] = '待发货';
        $status_option[222] = '已发货';
        $status_option[214] = '已完成';
        $status_option[1] = '取消';
        $status_option[4] = '无效';
        $status_option[3] = '退货';
        $status_option[2] = '退款';
        ?>  
         <select name="status" >
         <!--2:确认订单 0:没支付 0:没发货-->
        <?php 
        $se = 'selected="selected"';
        foreach ( $status_option as $k => $var )
        {
            echo '<option value="'.$k.'" '.($k==$_GET['status']&&isset($_GET['status']) ? $se : "").'>'.$var.'</option>';
        }
        ?>
        </select>
        <input value=" 搜索 " class="order_search" type="button">
        <a href="goods_order.php?type=list&status=11">待确认</a>
        <a href="goods_order.php?type=list&status=200">待付款</a>
        <a href="goods_order.php?type=list&status=2x0">待发货</a>
    </th></tr>
    <tr>
       <th width="80"><label><input type="checkbox" class="quxuanall" value="checkbox" />选择</label></th>
       <th><a href="<?php echo $os;?>">订单号</a></th>
       <th><a href="<?php echo $dt;?>">下单时间</a></th>
       <th><a href="<?php echo $own;?>">[微信]收货人</a></th>
       <th><a href="<?php echo $tprice;?>">总金额</a></th>
       <th>订单状态</th>
       <th>联系电话</th>
       <th>收货地址</th>
       <th>商家名称</th>
       <th>操作</th>
    </tr>
    <?php 
        if ( ! empty( $orderlist ) ) { 
        foreach ( $orderlist as $row ) {
    ?>
    <tr>
    <td><input type="checkbox" name="quanxuan" value="<?php echo $row['order_id'];?>" class="gids"/></td>
    <td><?php echo $row['order_sn']; ?></td>
    <td><?php echo $row['add_time']; ?></td>
    <td><font color="#FF0000">[<?php echo $row['nickname'] ? : '未关注'; ?>]</font><?php echo $row['consignee'];?></td>
    <td><?php echo $row['tprice']; ?></td>
    <td><?php echo $row['status']; echo ! empty( $row['sn_id'] ) ? '&nbsp;<font color=blue>&nbsp;['.$row['shoppingname'].']物流单:<a style="color:#fe0000" href="http://m.kuaidi100.com/index_all.html?type='.$row['shipping_code'].'&postid='.$row['sn_id'].'" target="_blank">'.$row['sn_id'].'</a></font>' : '';?></td>
    <td><?php echo $row['mobile']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td><?php echo $row['store_name']; ?></td>
    <td>
    <a href="goods_order.php?type=order_info&id=<?php echo $row['order_id'];?>" title="编辑"><img src="<?php echo $this->img('icon_view.gif');?>" title="编辑"/></a>&nbsp;
    <?php if(in_array($row['order_status'],array('1','4'))){?><img src="<?php echo $this->img('icon_drop.gif');?>" title="删除" alt="删除" id="<?php echo $row['order_id'];?>" class="delorder"/><?php } ?>
    <input name="button" value="打印" type="button" onclick="if(confirm('确定打印吗？打印后将会更改打印状态')){ $(this).css('color','#330066');window.open('<?php echo ADMIN_URL;?>goods_order.php?type=orderprint&ids=<?php echo $row['order_id'];?>')}" style="cursor:pointer;<?php echo $row['is_prints']=='1' ? 'color:#330066':'color:#FE0000';?>" id="<?php echo $row['is_prints'];?>"/>
    </td>
    </tr>
    <?php
     } ?>
    <tr>
         <td colspan="7"> 
            <input type="checkbox" class="quxuanall" value="checkbox" />
                <input name="button" id="bathconfirm" value="确认" class="bathop" disabled="true"  type="button">
                <input name="button" id="bathinvalid" value="无效" class="bathop" disabled="true" type="button">
                <input name="button" id="bathcancel" value="取消" class="bathop" disabled="true" type="button">
                <input name="button" id="bathdel" value="移除"  class="bathop" disabled="true" type="button"/>
               <input name="button" id="printorder" value="打印"  class="printorder" disabled="true" type="button" onclick="return printorder()" style="cursor:pointer"/>
         </td>
    </tr>
        <?php } ?>
     </table>
     <?php $this->element('page',array('pagelink'=>$pagelink));?>
</div>
<script type="text/javascript">
//全选
 $('.quxuanall').click(function (){
      if(this.checked==true){
         $("input[name='quanxuan']").each(function(){this.checked=true;});
         document.getElementById("bathdel").disabled = false;
         document.getElementById("bathinvalid").disabled = false;
         document.getElementById("bathcancel").disabled = false;
         document.getElementById("bathconfirm").disabled = false;
         document.getElementById("printorder").disabled = false;
      }else{
         $("input[name='quanxuan']").each(function(){this.checked=false;});
         document.getElementById("bathdel").disabled = true;
         document.getElementById("bathinvalid").disabled = true;
         document.getElementById("bathcancel").disabled = true;
         document.getElementById("bathconfirm").disabled = true;
         document.getElementById("printorder").disabled = true;
      }
  });
  
  //是删除按钮失效或者有效
  $('.gids').click(function(){ 
        var checked = false;
        $("input[name='quanxuan']").each(function(){
            if(this.checked == true){
                checked = true;
            }
        }); 
        document.getElementById("bathdel").disabled = !checked;
        document.getElementById("bathconfirm").disabled = !checked;
        document.getElementById("bathcancel").disabled = !checked;
        document.getElementById("bathinvalid").disabled = !checked;
        document.getElementById("printorder").disabled = !checked;
  });
  
  //批量删除
   $('.bathop').click(function (){
        if(confirm("确定操作吗？")){
            optype = $(this).attr('id');
            if(typeof(optype)=='undefined' || optype==""){ return false;}
            createwindow();
            var arr = [];
            $('input[name="quanxuan"]:checked').each(function(){
                arr.push($(this).val());
            });
            var str=arr.join('+'); ;
            $.post('<?php echo $thisurl;?>',{action:'bathop',type:optype,ids:str},function(data){
                removewindow();
                if(data == ""){
                    location.reload();
                }else{
                    alert(data);
                    //location.reload();
                }
            });
        }else{
            return false;
        }
   });
 
   $('.delorder').click(function(){
        ids = $(this).attr('id');
        thisobj = $(this).parent().parent();
        if(confirm("确定删除吗？")){
            createwindow();
            $.post('<?php echo $thisurl;?>',{action:'bathop',type:'bathdel',ids:ids},function(data){
                removewindow();
                if(data == ""){
                    thisobj.hide(300);
                }else{
                    alert(data);    
                }
            });
        }else{
            return false;   
        }
   });
   
    $('.activeop').live('click',function(){
        star = $(this).attr('alt');
        gid = $(this).attr('id'); 
        type = $(this).attr('lang');
        obj = $(this);
        $.post('<?php echo $thisurl;?>',{action:'activeop',active:star,gid:gid,type:type},function(data){
            if(data == ""){
                if(star == 1){
                    id = 0;
                    src = '<?php echo $this->img('yes.gif');?>';
                }else{
                    id = 1;
                    src = '<?php echo $this->img('no.gif');?>';
                }
                obj.attr('src',src);
                obj.attr('alt',id);
            }else{
                alert(data);
            }
        });
    });
    
    //sous
    $('.order_search').click( function() {
        time1    = $('input[name="EntTime1"]').val();  //look 添加
        time2    = $('input[name="EntTime2"]').val();   //look 添加
        o_sn     = $('input[name="order_sn"]').val();
        own      = $('input[name="consignee"]').val();
        sts      = $('select[name="status"]').val();
        store_id = $('select[name="store_id"]').val();
        wallet_id = $('select[name="wallet_id"]').val();
        mobile = $('input[name="mobile"]').val();
        address = $('input[name="address"]').val();

        location.href = '<?php echo $thisurl; ?>?type=list&add_time1='+time1+'&add_time2='+time2+'&order_sn='+o_sn+'&consignee='+own+'&store_id='+ store_id+'&wallet_id='+ wallet_id +'&status='+sts+'&mobile='+mobile+'&address='+address;
    });
    
    //打印订单
    function printorder()
    {
        if(confirm("你确定打印吗？点击按钮之后将会更改为已打印状态！"))
        {
            var arr = [];
            $('input[name="quanxuan"]:checked').each(function(){
                arr.push($(this).val());
            });
            var str = arr.join('-');
            window.open('<?php echo ADMIN_URL; ?>goods_order.php?type=orderprint&ids='+str);
        }
        return false;
    }
</script>