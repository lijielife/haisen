<table cellspacing="1" cellpadding="5" width="100%" style="line-height:20px; height:250px">
  <tr>
  	<th style="height:20px; width:130px">帐户变动时间</th><th>帐户变动原因</th><th>帐变资金</th>
  </tr>
  <?php
   if(!empty($rt['usermoneylist'])){
   foreach($rt['usermoneylist'] as $row){
  ?>
  <tr>
  <td style="border-bottom:1px dotted #fff;">&nbsp;<?php echo !empty($row['time']) ? date('Y-m-d H:i:s',$row['time']) : '无知';?></td>
  <td style="border-bottom:1px dotted #fff;"><?php echo $row['changedesc'];?></td>
  <td style="border-bottom:1px dotted #fff;">￥<?php echo $row['money'];?>[<em>负数为支出，正数为充值</em>]</td>
  </tr>
  <?php } } ?>
  <tr>
  <td  colspan="3" style="border-bottom:1px dotted #fff; text-align:left; height:20px" class="pagesmoney">
  <style>
  .pagesmoney a{margin-right:5px; color:#fff; background-color:#b70000; text-decoration:none; float:left; display:inherit;  padding-left:5px; padding-right:5px;text-align:center; text-indent:0px}
  .pagesmoney a:hover{ text-decoration:underline}
  </style>
  <?php echo $rt['usermoneypage']['showmes'].'&nbsp;'.$rt['usermoneypage']['first'].'&nbsp;'.$rt['usermoneypage']['prev'].'&nbsp;'.$rt['usermoneypage']['next'].'&nbsp;'.$rt['usermoneypage']['last'];?>
  </td>
  <td  align="right"><span style="position:absolute; right:0px; bottom:0px;"><img src="<?php echo SITE_URL;?>theme/images/error_icon.png" alt="close" onclick="$('.user_money').toggle();" style="cursor:pointer"/></span></td>
  </tr>
</table>