<p class="cr5">我的积分：<?php echo empty($rt['zpoints']) ? 0 : $rt['zpoints'];?>分</p>
<table  width="100%" border="0" cellpadding="0" cellspacing="0" style="line-height:25px;">
    <tr>
    <td width="45" bgcolor="#f9f9f9" >序号</td>
    <td width="160" bgcolor="#f9f9f9">时间</td>
    <td width="51" bgcolor="#f9f9f9">类型</td>
    <td width="51" bgcolor="#f9f9f9">收入</td>
    <td width="51" bgcolor="#f9f9f9">支出</td>
    <!--<td width="76" bgcolor="#f9f9f9">总积分</td>-->
    <td bgcolor="#f9f9f9">帐变原因</td>
  </tr>
  <?php
   if(!empty($rt['userpointlist'])){
   foreach($rt['userpointlist'] as $k=>$row){
   ++$k;
  ?>
    <tr>
    <td><?php echo 10*($rt['page']-1)+$k;?></td>
    <td><?php echo !empty($row['time']) ? date('Y-m-d H:i:s',$row['time']) : '无知';?></td>
    <td class="cr2">赠送</td>
    <td class="cr2"><?php echo $row['points']>0 ? $row['points'].'分' : '--';;?></td>
    <td class="cr2"><?php echo $row['points']<=0 ? str_replace('-','',$row['points']).'分' : '--';;?></td>
    <!--<td class="cr2">105</td>-->
    <td><?php echo $row['changedesc'];?></td>
  </tr>
  <?php } } ?>
  <tr>
  <td  colspan="6" style="text-align:left;" class="pagesmoney">
  <style>
  .pagesmoney a{ margin-right:5px; color:#FFF; background-color:#b70000; text-decoration:none; float:left; display:inherit; padding-left:5px; padding-right:5px; text-align:center}
  .pagesmoney a:hover{ text-decoration:underline}
  </style>
  <?php echo $rt['userpointpage']['showmes'].'&nbsp;'.$rt['userpointpage']['first'].'&nbsp;'.$rt['userpointpage']['prev'].'&nbsp;'.$rt['userpointpage']['next'].'&nbsp;'.$rt['userpointpage']['last'];?>
  </td>
  </tr>
</table>
