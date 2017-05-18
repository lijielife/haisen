<p class="cr5">我的佣金：<?php echo empty($rt['zmoney']) ? 0 : $rt['zmoney'];?>元</p>
<table  width="100%" border="0" cellpadding="0" cellspacing="0" style="line-height:25px;">
    <tr>
    <td width="45" bgcolor="#f9f9f9" >序号</td>
    <td width="70" bgcolor="#f9f9f9">帐户变动时间</td>
    <td width="120" bgcolor="#f9f9f9">帐户变动原因</td>
    <td width="80" bgcolor="#f9f9f9">帐变资金</td>
  </tr>
  <?php
   if(!empty($rt['usermoneylist'])){
   foreach($rt['usermoneylist'] as $row){
  ++$k;
  ?>
    <tr>
    <td><?php echo 10*($rt['page']-1)+$k;?></td>
    <td style="border-bottom:1px dotted #fff;">&nbsp;<?php echo !empty($row['time']) ? date('Y-m-d H:i:s',$row['time']) : '无知';?></td>
  <td style="border-bottom:1px dotted #fff;"><?php echo $row['changedesc'];?></td>
  <td style="border-bottom:1px dotted #fff;">￥<?php echo $row['money'];?>[<em>负数为提取，正数为佣金</em>]</td>
  </tr>
  <?php } } ?>
  <tr>
  <td  colspan="6" style="text-align:left;" class="pagesmoney">
  <style>
  .pagesmoney a{ margin-right:5px; color:#FFF; background-color:#b70000; text-decoration:none; float:left; display:inherit; padding-left:5px; padding-right:5px; text-align:center}
  .pagesmoney a:hover{ text-decoration:underline}
  </style>
  <?php echo $rt['usermoneypage']['showmes'].'&nbsp;'.$rt['usermoneypage']['first'].'&nbsp;'.$rt['usermoneypage']['prev'].'&nbsp;'.$rt['usermoneypage']['next'].'&nbsp;'.$rt['usermoneypage']['last'];?>
  </td>
  </tr>
</table>
