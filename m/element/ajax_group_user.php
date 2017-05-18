<?php if ( ! empty( $group_user_list ) ) { ?>
<div class="clear"></div>
<table width="100%" cellpadding="3" cellspacing="5" border="0">
<?php foreach( $group_user_list as $info ) { ?>
    <tr>
        <td align="left">
        <div style="border-bottom:1px solid #ededed; padding-bottom:3px; line-height:22px; margin-bottom:5px;">
            <div style="width:70%; float:left; color:#999999">
            <?php echo $info['goods_name']; ?>
            <br/>
            <?php echo $info['add_time']; ?>
            </div>
            <div style="width:28%; float:right">
                <?php echo $info['nickname']; ?>
            </div>
            <div class="clear"></div>
        </div>
        </td>
    </tr>
<?php } ?>
</table>
<?php } else { ?>
暂无团购记录
<?php } ?>