<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/25/css.css" media="all" />
<?php $this->element( '25/top', array( 'lang' => $lang ) ); ?>
<style type="text/css">
#main table td{ background:#fff}
#main table td:hover{ background:#ededed;}
.radiustibox{ margin-left:5px;}
</style>
<div id="main" style="min-height:300px; background:#FFF">
<div class="clear10"></div>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<?php 
    if ( ! empty( $rt['lists'] ) )
    foreach ( $rt['lists'] as $k => $row ) {
    if ( $row['money'] > 0 ) {
?>
<tr>
    <td align="left" style="border-bottom:1px solid #d5d5d5;">
        <div style="padding:8px">
            <div style="position:relative; width:20%;float:left;"><img src="<?php echo !empty($row['headimgurl']) ? $row['headimgurl'] : $this->img('noavatar_big.jpg');?>" width="100%" style="margin-right:5px; padding:1px; border:1px solid #fafafa" />
            </div>
            <div style="float:right; width:78%; position:relative">
            <p style="line-height:21px">
            <?php $gname = $this->action( 'daili', '_return_goods_name', $row['order_sn'] ); ?>
            <?php echo empty( $gname ) ? $row['changedesc'] : $gname; ?>
            </p>
            <?php if ( ! empty( $row['nickname'] ) ) { ?>
            <p style="line-height:21px">
            <?php echo '购买用户:' . $row['nickname']; ?>
            </p>
            <?php } ?>
            <p style="line-height:21px">
            <?php echo ! empty( $row['time'] ) ? date( 'Y-m-d H:i:s', $row['time'] ) : '无知'; ?>
            </p>
            <font style=" position:absolute; right:10px; bottom:5px; z-index:99;font-size:18px; font-weight:bold"><?php 
                if ( $row['money'] > 0 )
                { 
                    echo '<font color="#3333FF">+￥'.$row['money'].'</font>'; 
                }
                else
                { 
                    echo '<font color="#fe0000">-￥'.abs($row['money']).'</font>';
                }
            ?>
            </font>
            </div>
            <div class="clear"></div>
        </div>
    </td>
</tr>
<?php } } ?>

<style>
.pagesmoney a
{
    display: block;
    line-height: 20px;
    margin-left: 80px;
    color: #222;
    background-color: #ededed;
    border-bottom: 2px solid #ccc;
    border-right: 2px solid #ccc;
    text-decoration: none;
    float: left;
    padding-left: 5px;
    padding-right: 5px;
    text-align: center
}

.pagesmoney a:hover
{
    text-decoration: underline
}
</style>

<tr>
<td class="pagesmoney">
<div class="clear10"></div>
<?php
    if ( ! empty( $rt['pages'] ) )
    {
        echo $rt['pages']['previ'];
        echo $rt['pages']['next'];
    }
?>
<div class="clear10"></div>
</td>
</tr>
</table>

</div>
<?php $this->element( '25/footer', array( 'lang' => $lang ) ); ?>