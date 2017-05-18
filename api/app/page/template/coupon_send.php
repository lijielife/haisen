<div class="contentbox">
<h2 class="con_title">生成注册码</h2>
  <form id="form1" name="form1" method="post" action="">
<table cellspacing="2" cellpadding="5" width="100%" style="line-height:25px">
 <tr>
	 <th colspan="2" align="left" style="position:relative;height:30px; line-height:30px"><span style=" position:absolute; right:5px; top:3px"><a href="sp.php?type=couponview&shopid=<?php echo $_GET['shopid'];?>&type_id=<?php echo $_GET['type_id'];?>">返回列表</a></span></th>
</tr>
<tr>
    <td class="label">类型金额</td>
    <td>
    <select style="height:22px; line-height:22px;" name="bonus_type_id">
      <option value="<?php echo $send_type['type_id'];?>" selected="selected"><?php echo $send_type['type_name'];?> [￥<?php echo $send_type['type_money'];?>元]</option>    </select>
    </td>
  </tr>

   <tr>
      <td class="label">红包数量</td>
      <td>
      <input style="height:22px; line-height:22px; width:150px" name="bonus_sum" size="30" maxlength="6" type="text">
      </td>
    </tr>
    <tr><td class="label">&nbsp;</td>
    <td>提示:红包序列号由六位序列号种子加上四位随机数字组成</td>

   </tr>
   <tr>
   <td class="label">&nbsp;</td>
   <td>
    <input value=" 确定 " class="button" type="submit" style="padding:3px; cursor:pointer" />
    <input value=" 重置 " class="button" type="reset" style="padding:3px; cursor:pointer" />
  </td>
 </tr>
</table>
  </form>

</div>