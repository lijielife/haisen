<style type="text/css">
.contentbox{ background-color:#FEE4B3; font-size:12px;}
.contentbox table th{ font-size:12px; text-align:center}
.contentbox table .label{ font-size:12px; text-align:right; font-weight:bold; background-color:#FFD99A}
.tx{ width:350px; border:1px solid #ccc; height:28px; line-height:28px}
.tx2{ width:120px; border:1px solid #ccc; height:28px; line-height:28px}
</style>
<div class="contentbox" style="overflow-x:hidden; overflow-y:auto; height:500px">
<h2 class="con_title">添加优惠劵</h2>
<form action="" method="post" name="theForm" enctype="multipart/form-data">
	 <table cellspacing="2" cellpadding="5" width="100%">
	 <tr>
	 		<th colspan="2" align="left" style="position:relative"><span style="position:absolute; right:5px; top:3px"><a href="sp.php?type=coupon&shopid=<?php echo $_GET['shopid'];?>">返回列表</a></span></th>
	 </tr>
	   <tr>
    <td class="label" width="150">类型名称：</td>
    <td>
      <input style="width:150px; height:24px; line-height:24px;" type='text' name='type_name' maxlength="30" value="<?php echo isset($rt['type_name']) ? $rt['type_name'] : "";?>" size='20' />    </td>
  </tr>
  <tr>
    <td class="label">红包金额：</td>
    <td>
    <input style="width:150px; height:24px; line-height:24px;" type="text" name="type_money" value="<?php echo isset($rt['type_money']) ? $rt['type_money'] : "";?>" size="20" />
    <br /><span class="notice-span" style="display:block"  id="Type_money_a">此类型的红包可以抵销的金额</span>    
	</td>
  </tr>
  <tr>
    <td class="label">发放起始日期：</td>
    <td>
      <input style="width:150px; height:24px; line-height:24px;" name="send_start_date" type="text" id="df" size="22" value='<?php echo isset($rt['send_start_date']) ? date('Y-m-d',$rt['send_start_date']) : date('Y-m-d',mktime());?>' onClick="WdatePicker()"/><em>点击文本框选择日期</em>
      <br /><span class="notice-span" style="display:block"  id="Send_start_a">只有当前时间介于起始日期和截止日期之间时，此类型的红包才可以<b>发放</b></span>    </td>
  </tr>
  <tr>
    <td class="label">发放结束日期：</td>
    <td>
      <input style="width:150px; height:24px; line-height:24px;" name="send_end_date" type="text" id="df" size="22" value='<?php echo isset($rt['send_end_date']) ? date('Y-m-d',$rt['send_end_date']) : date('Y-m-d',mktime()+30*3600*24);?>' onClick="WdatePicker()"/><em>点击文本框选择日期</em>
  </td>
  </tr>
  <tr>
  	<td class="label">上传图片</td>
	<td>
	 <?php if(isset($rt['img'])&&!empty($rt['img'])){?>
		<img src="../<?php echo $rt['img'];?>" alt="LOGO" width="100"/><br/>
	  <?php } ?>
	 <input name="img" id="uploadfiles" type="hidden" value="<?php echo isset($rt['img']) ? $rt['img'] : '';?>" />
	  <iframe id="iframe_t" name="iframe_t" border="0" src="../_admin/upload.php?action=<?php echo isset($rt['img'])&&!empty($rt['img'])? 'show' : '';?>&ty=uploadfiles&tyy=coupon&files=<?php echo isset($rt['img']) ? $rt['img'] : '';?>" scrolling="no" width="350" frameborder="0" height="25"></iframe>
	</td>
  </tr>
  <tr>
    <td class="label">&nbsp;</td>
    <td>
      <input type="submit" value=" 确定 " class="button" style="padding:3px; cursor:pointer" />
      <input type="reset" value=" 重置 " class="button" style="padding:3px; cursor:pointer" />
	  </td>
  </tr>
	 </table>
</form>
</div>