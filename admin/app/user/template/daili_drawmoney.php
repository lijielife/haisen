<?php $thisurl = ADMIN_URL.'user.php'; ?>
<style type="text/css"> .contentbox table th{ font-size:12px; text-align:center}</style>
<div class="contentbox">
     <table cellspacing="2" cellpadding="5" width="100%">
     <tr>
        <th colspan="10" align="left" style="text-align:left">提款申请</th>
    </tr>
    <tr>
    <td colspan="10" align="left">
    <form action="?" method="GET">
        <img src="<?php echo $this->img('icon_search.gif');?>" alt="SEARCH" width="26" border="0" height="22" align="absmiddle">
        <input type="hidden" name="type" value="drawmoney" />
        姓名 <input name="uname" size="15" type="text" value="<?php echo isset( $_GET['uname'] ) ? $_GET['uname'] : ''; ?>">
        <input type="submit" value=" 搜索 " class="cate_search" />
    </form>
    </td>
    </tr>

    <tr>
       <th><label><input type="checkbox" class="quxuanall" value="checkbox" />编号</label></th>
       <th>姓名</th>
       <th>联系电话</th>
       <th>开户行</th>
       <th>开户地址</th>
       <th>卡号</th>
       <th>提款金额</th>
       <th>钱包</th>
       <th>时间</th>
       <th>确认时间</th>
       <th>状态</th>
       <th>操作</th>
    </tr>
    <?php 
        if ( ! empty( $rt ) ) { 
        foreach ( $rt as $row ) {
    ?>
    <tr>
    <td><input type="checkbox" name="quanxuan" value="<?php echo $row['id'];?>" class="gids"/></td>
    <td><?php echo $row['uname']; ?></td>
    <td><?php echo $row['mobile']; ?></td>
    <td><?php echo $row['bankname']; ?></td>
    <td><?php echo $row['bankaddress']; ?></td>
    <td><?php echo $row['banksn']; ?></td>
    <td>￥<?php echo $row['money']; ?></td>
    <td><?php echo $wallet_list[$row['wallet_id']]; ?></td>
    <td><?php echo ! empty( $row['addtime'] ) ? date( 'Y-m-d H:i:s', $row['addtime'] ) : '未知'; ?></td>
    <td><?php echo ! empty( $row['paytime'] ) ? date( 'Y-m-d H:i:s', $row['paytime'] ) : '未确认'; ?></td>
    <td nowrap><?php echo $row['state'] == '0' ? '申请中' : ( $row['state']=='1' ? '申请成功' : '提款失败' ); ?></td>
    <td nowrap>
    <a href="<?php echo ADMIN_URL.'user.php?type=info&id='.$row['uid'];?>">查看代理</a><br />
    <a href="javascript:;" onclick="return ajax_confirm_drawmoney(<?php echo $row['id'];?>);" style="cursor:pointer; color:#FF0000; padding:3px 5px 3px 5px; background:#ededed; border-bottom:2px solid #ccc; border-right:2px solid #ccc;"><?php echo $row['state']=='0' ? '同意提款' : ($row['state']=='1' ? '申请成功' : '提款失败' );?></a>
    </td>
    </tr>
    <?php } } ?>
    </table>
    <?php $this->element( 'page', array( 'pagelink' => $pagelink ) ); ?>
</div>
<script type="text/javascript">
function ajax_confirm_drawmoney( id ) {
    if ( confirm("确认吗") ) {
        $.post( '<?php echo $thisurl;?>', {action:'ajax_confirm_drawmoney',id:id}, function( data ) {
            removewindow();
            window.location.href = '<?php echo ADMIN_URL.'user.php?type=drawmoney'; ?>';
        });
    }
    return false;
}

// 全选
$('.quxuanall').click(function () {
    if ( this.checked == true ) {
        $("input[name='quanxuan']").each(function(){this.checked=true;});
        document.getElementById("bathdel").disabled = false;
    } else {
        $("input[name='quanxuan']").each(function(){this.checked=false;});
        document.getElementById("bathdel").disabled = true;
    }
});
  
// 是删除按钮失效或者有效
$('.gids').click( function() { 
    var checked = false;
    $("input[name='quanxuan']").each(function() {
        if ( this.checked == true ) {
            checked = true;
        }
    }); 
    document.getElementById("bathdel").disabled = !checked;
});
</script>