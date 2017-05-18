<div class="contentbox">
<h2 class="con_title">注册码列表</h2>
 <table cellspacing="2" cellpadding="5" width="100%" style="line-height:25px">
 <tr>
	 <th colspan="7" align="left" style="position:relative; height:30px; line-height:30px">&nbsp;<span style=" position:absolute; right:5px; top:3px"><a href="sp.php?type=coupon&shopid=<?php echo $_GET['shopid'];?>">返回红包类型</a></span></th>
</tr>
<tr>
 	<th>编号</th><th>发放名称</th><th>注册码列号</th><th>红包类型</th><th>使用会员</th><th>使用时间</th><th>操作</th>
</tr>
<?php
$send_type = array('优惠劵','xxx','xxx','会员卡','注册码');
if(!empty($rt)){
foreach($rt as $row){
?>
<tr>
<td><?php echo $row['bonus_id'];?></td>
<td><?php echo $row['type_name'];?></td>
<td><?php echo $row['bonus_sn'];?></td>
<td><?php echo $send_type[$row['send_type']];?></td>
<td><?php echo $row['user_name '];?></td>
<td><?php echo !empty($row['used_time']) ? date('Y-m-d H:i:s',$row['used_time']) : "未使用";?></td>
<td><a href="sp.php?type=couponview&shopid=<?php echo $_GET['shopid'];?>&type_id=<?php echo $_GET['type_id']?>&op=del&delid=<?php echo $row['bonus_id'];?>" onclick="return confirm('确定删除吗？')">移除</a></td>
</tr>
<?php } } ?>
 </table>
 <?php $this->element('page',array('pagelink'=>$pagelink));?>
</div>