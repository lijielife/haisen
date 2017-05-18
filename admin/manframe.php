<?php 
require_once('load.php');
//
$rt = $app->action('system','getcount');
// 检测自动确认收货
$arr = $app->action('order','order_takeover');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/common.css" type="text/css" />
<title>管理区域</title>
</head>

<body>
<div id="man_zone">
<?php if($_SERVER["HTTP_HOST"]!="weixin.apiqq.com"){?>
 <!--<h2 style="border-bottom:1px solid #ccc; height:25px; line-height:25px">网站基本信息统计<font color="#FF0000" style="font-size:14px">亲爱的用户，注意啦，所有试用用户只能试用3天，3天后数据自动清除!另外，系统在不停增加功能中！</font></h2>--><?php } ?>
  <table cellspacing="1" cellpadding="5" width="100%">
<!--<tr>
<th width="15%">激活用户数：</th>
<td><font color="#FF0000"><?php echo $rt['usercount']['yescount'];?></font>位</td>
<th width="15%">未激活用户数：</th>
<td><font color="#FF0000"><?php echo $rt['usercount']['nocount'];?></font>位</td>
</tr>
<tr>
<th>已审核评论：</th>
<td><font color="#FF0000"><?php echo $rt['commentcount'][0];?></font>条</td>
<th>未审核评论：</th>
<td><font color="#FF0000"><?php echo $rt['commentcount'][1];?></font>条</td>
</tr>
<tr>
<th>已审核留言：</th>
<td><font color="#FF0000"><?php echo $rt['mescount'][0];?></font>条</td>
<th>未审核留言：</th>
<td><font color="#FF0000"><?php echo $rt['mescount'][1];?></font>条</td>
</tr>
<tr>
<th style="font-size:16px">代理商PC端管理：</th>
<td colspan="3">
<a style="color:#FF0000" href="<?php echo SITE_URL.'daili.php'; ?>" target="_blank"><?php echo SITE_URL.'daili.php'; ?></a>
</td>
</tr>-->
<tr>
<th>产品总数：</th>
<td><font color="#FF0000"><?php echo $rt['goods']['zcount'];?></font>个</td>
<th>推荐商品数：</th>
<td><font color="#FF0000"><?php echo $rt['goods']['promote'];?></font>个</td>
</tr>
<tr>
<th>上架产品数：</th>
<td><font color="#FF0000"><?php echo $rt['goods']['sale'];?></font>个</td>
<th>下架产品数：</th>
<td><font color="#FF0000"><?php echo $rt['goods']['no_sale'];?></font>个</td>
</tr>
<tr>
<th width="15%">订单数量：</th>
<td><font color="#FF0000"><?php echo $rt['order']['zcount'];?></font>个</td>
<th width="15%">成功订单数量：</th>
<td><font color="#FF0000"><?php echo $rt['order']['yescount'];?></font>个</td>
</tr>
<tr>
<th width="15%">使用的操作系统：</th>
<td><?php echo $rt['os'];?></td>
<th width="15%">当前的浏览器：</th>
<td><?php echo $rt['browser'];?></td>
</tr>
<tr>
<th width="15%">当前访问ip地址：</th>
<td><?php echo $rt['bsip'].'  [<font color=red>'.$rt['ip_from'].'</font>]';?></td>
<th width="15%">服务器IP地址：</th>
<td><?php echo $rt['csip'];?></td>
</tr>
<?php if($arr['status']){?>
<tr>
<th width="15%">确认自动收货个数：</th>
<td><?php echo '  <font color=red>'.$arr['count'].'</font>';?></td>
</tr>
<?php }?>
</table>

</div>
</body>
</html>
