<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/25/css.css" media="all" />
<?php $this->element( '25/top', array( 'lang' => $lang ) ); ?>

<style type="text/css">
.pw,.pwt{
height:26px; line-height:normal;
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
.pws{ background:#ededed}
</style>
<div id="main" style="min-height:300px">
    <div style="background:#f5f5f5; border-bottom:1px solid #d1d1d1;padding:10px;">
    <form name="USERINFO2" id="USERINFO2" action="" method="post">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="line-height:30px;">
        <?php 
            foreach ( (array)$wallet as $k => $v ) { 
            if ( $allmoney['wallet_'.$v['wallet_id']] == '1' ) {
        ?>
           <tr>
            <td width="25%" align="right" style="padding-bottom:2px;"><b class="cr2">*</b> 
            <font color="#999999"> <?php echo $v['wallet_name']; ?> </font>
            </td>
            <td width="75%" align="left" style="padding-bottom:2px;">
            <input type="text" readonly="" value="<?php echo $allmoney['wallet_money'.$v['wallet_id']];?>" class="pw pws" />
            </td>
          </tr>
        <?php } } ?>
        </table>
    </form>
    </div>
</div>
<?php $this->element( '25/footer', array( 'lang' => $lang) ); ?>