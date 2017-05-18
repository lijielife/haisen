<style type="text/css">
.contentbox table{ border:1px solid #FCBF86}
.contentbox table td{text-align:center}
</style>
<div class="contentbox" style="overflow-x:hidden; overflow-y:auto; height:500px">
<h2 class="con_title">积分操作记录</h2>
	<table  width="100%" border="0" cellpadding="0" cellspacing="0" style="line-height:25px;">
    <tr>
    <td width="45" bgcolor="#DFE0DC" >序号</td>
	<td width="200" bgcolor="#DFE0DC">会员</td>
    <td width="160" bgcolor="#DFE0DC">时间</td>
    <td width="51" bgcolor="#DFE0DC">类型</td>
    <td width="51" bgcolor="#DFE0DC">收入</td>
    <td width="51" bgcolor="#DFE0DC">支出</td>
    <td bgcolor="#DFE0DC">帐变原因</td>
  </tr>
  <?php
   if(!empty($rt['pointlist'])){
   foreach($rt['pointlist'] as $k=>$row){
   ++$k;
  ?>
    <tr>
    <td><?php echo 10*($rt['page']-1)+$k;?></td>
	<td><?php echo $row['user_name'].'['.$row['nickname'].']';?></td>
    <td><?php echo !empty($row['time']) ? date('Y-m-d H:i:s',$row['time']) : '无知';?></td>
    <td class="cr2">赠送</td>
    <td class="cr2"><?php echo $row['points']>0 ? $row['points'].'分' : '--';;?></td>
    <td class="cr2"><?php echo $row['points']<=0 ? str_replace('-','',$row['points']).'分' : '--';;?></td>
    <td><?php echo $row['changedesc'];?></td>
  </tr>
  <?php } } ?>
  <tr>
  <td  colspan="7" style="text-align:left;" class="pagesmoney">
  <?php $this->element('page',array('pagelink'=>$rt['pages']));?>
  </td>
  </tr>
</table>

	 
</div>