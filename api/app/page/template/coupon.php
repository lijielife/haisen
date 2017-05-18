<style type="text/css">
.contentbox table{ border:1px solid #FCBF86}
.contentbox table td{text-align:center}
</style>
<div class="contentbox" style="overflow-x:hidden; overflow-y:auto; height:500px">
<h2 class="con_title">优惠劵列表</h2>
<p style=" padding-bottom:20px; padding-top:10px; font-size:14px; font-weight:bold; text-align:right"><a href="sp.php?type=couponinfo&shopid=<?php echo $_GET['shopid'];?>">添加优惠劵</a></p>
	 <table cellspacing="2" cellpadding="5" width="100%" style="line-height:18px">
	 <tr>
      <td bgcolor="#DFE0DC">类型名称</td>
	  <td bgcolor="#DFE0DC">图片</td>
      <td bgcolor="#DFE0DC">金额</td>
      <td bgcolor="#DFE0DC">有效期</td>
      <td bgcolor="#DFE0DC">操作</td>
    </tr>
	<?php if(!empty($rt))foreach($rt as $row){?>
      <tr>
      <td><?php echo $row['type_name'];?></td>
      <td align="right"><img src="../<?php echo $row['img'];?>" width="60" /></td>
      <td align="right"><?php echo $row['type_money'];?></td>
      <td align="center"><?php echo date('m月d日',$row['send_start_date']).' - '.date('m月d日',$row['send_end_date']);?></td>
      <td align="right">
        <?php  if($row['send_start_date']<mktime() && $row['send_end_date']>mktime()){ ?><a href="sp.php?type=couponsend&shopid=<?php echo $_GET['shopid'];?>&type_id=<?php echo $row['type_id'];?>">生成注册码</a><?php }else{?><font color="#CCCCCC">生成注册码[过期]</font><?php } ?> |
        <a href="sp.php?type=couponview&shopid=<?php echo $_GET['shopid'];?>&type_id=<?php echo $row['type_id'];?>">查看注册码</a> |
        <a href="sp.php?type=couponinfo&shopid=<?php echo $_GET['shopid'];?>&id=<?php echo $row['type_id'];?>">编辑</a> |
        <a href="sp.php?type=coupon&shopid=<?php echo $_GET['id'];?>&type_id=<?php echo $row['type_id'];?>" onclick="return confirm('确定删除吗')">移除</a>
	  </td>
    </tr>
   <?php } ?>
	 </table>
	 
	 <?php $this->element('page',array('pagelink'=>$pagelink));?>
</div>