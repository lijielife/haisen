<style type="text/css">
.gototype a{ padding:2px; border-bottom:2px solid #ccc; border-right:2px solid #ccc;}
</style>
<div class="contentbox">
<form id="form1" name="form1" method="post" action="">
     <table cellspacing="2" cellpadding="5" width="100%">
		<tr>
			<td class="label" width="15%">每个用户抽奖次数：</td>
			<td>
			<input name="num" value="<?php echo $rts['num']?>" size="2" type="text" />
			</td>
		</tr>
        <tr>
			<td class="label" width="15%">结束日期：</td>
			<td>
			<input name="end_time" value="<?php echo date('Y-m-d',$rts['end_time']);?>" size="10" type="text" />(例：2015-6-1)
			</td>
		</tr>
          <tr>
			<td class="label" width="15%">活动说明：</td>
			<td>
			<textarea name="content" style="width:290px;height:200px;"><?php echo $rts['content'];?></textarea>
			</td>
		</tr>
<?php 
if(!empty($rt))foreach($rt as $row){
?>		 
		<tr>
			<td class="label" width="15%">奖项<?php echo $row['id']?>设置&nbsp;&nbsp;</td>
			<td>
			奖项<input name="lt_prize<?php echo $row['id']?>" value="<?php echo $row['lt_prize']?>" size="10" type="text" />&nbsp;&nbsp;
            奖品名称<input name="lt_name<?php echo $row['id']?>" value="<?php echo $row['lt_name']?>" size="20" type="text" />&nbsp;&nbsp;
            中奖名额<input name="lt_allowed<?php echo $row['id']?>" value="<?php echo $row['lt_allowed']?>" size="2" type="text" />&nbsp;&nbsp;
            中奖概率<input name="lt_v<?php echo $row['id']?>" value="<?php echo $row['lt_v']?>" size="1" type="text" />%&nbsp;&nbsp;
			</td>
		</tr>
<?php } ?>	
		
		<tr>
			<td>&nbsp;</td>
			<td>
			  <input type="hidden" name="type" value="basic" />
			<label>
			  <input type="submit" value="确认保存" class="submit" style="cursor:pointer; padding:2px 4px 2px 4px"/>
		  </label></td>
		</tr>
		</table>
</form>
</div>