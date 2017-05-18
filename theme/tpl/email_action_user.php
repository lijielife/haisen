<div class="clear10"></div>
<div style="width:1000px; margin:0px auto; height:250px; padding-top:100px; text-align:center; color:#999999; border:1px solid #ccc; background:url(<?php echo SITE_URL;?>theme/images/email_alert.png) center center no-repeat">
<?php if($rt['error']==0){?>
<!--激活成功-->
<p style="font-size:24px; font-weight:bold">亲爱的<b><?php echo $rt[0];?></b>,你的账户已经激活成功！</p>
<?php }elseif($rt['error']=='1'){?>
<!--激活失败-->
<p style="font-size:24px; font-weight:bold">亲爱的<b><?php echo $rt[0];?></b>,激活失败！</p>
<?php }elseif($rt['error']=='2'){?>
<!--非法激活-->
<p style="font-size:24px; font-weight:bold">亲爱的<b><?php echo $rt[0];?></b>,非法激活操作！</p>
<?php }elseif($rt['error']=='3'){?>
<!--超过激活时间-->
<p style="font-size:24px; font-weight:bold">亲爱的<b><?php echo $rt[0];?></b>,你的账户已经超过激活时间！</p>
<?php }elseif($rt['error']=='4'){?>
<!--已经激活过了-->
<p style="font-size:24px; font-weight:bold">亲爱的<b><?php echo $rt[0];?></b>,你的账户已经激活过了！</p>
<?php }?>
</div>
<div class="clear10"></div>