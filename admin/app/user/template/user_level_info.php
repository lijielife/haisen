<div class="contentbox">
<form id="form1" name="form1" method="post" action="">
     <table cellspacing="2" cellpadding="5" width="100%">
	 	 <tr>
			<th colspan="2" align="left"><?php echo $type=='edit' ? '修改' : '添加';?>会员等级<span style="float:right"><a href="user.php?type=levellist">返回会员等级</a></span></th>
		</tr>
		<tr>
			<td class="label" width="15%">会员等级名称：</td>
			<td>
			<input name="level_name" value="<?php echo isset($rt['level_name']) ? $rt['level_name'] : '';?>" size="40" type="text" />
			</td>
		</tr>
		<tr>
			<td class="label">初始折扣率：</td>
			<td>
			<input name="discount" value="<?php echo isset($rt['discount']) ? $rt['discount'] : '100';?>" size="40" type="text" />
			<br />请填写为0-100的整数,如填入80，表示初始折扣率为8折
			</td>
		</tr>
		<!--<tr>
			<td class="label">积分来源：</td>
			<td>
			  <label>
			  <input type="checkbox" name="jifendesc[]" value="buy" <?php echo in_array('buy',$rt['jifendesc']) ? 'checked="checked"':"";?>/>购物得积分：<br />购买1元得1积分！
			  </label><br /><br />
			<label>
			  <input type="checkbox" name="jifendesc[]" value="comment" <?php echo in_array('comment',$rt['jifendesc']) ? 'checked="checked"':"";?>/>评论赚积分：<br />参与每件已购商品评论获奖10分，依次类推，参与10件已购商品评论可获奖100个积分（一张订单每个产品只能获得一次积分）。<br />参与买前网页问答咨询获奖5分（每个商品每天只能获得一次积分）；
			   </label><br /><br />
			 <label>
			  <input type="checkbox" name="jifendesc[]" value="tuijian" <?php echo in_array('tuijian',$rt['jifendesc']) ? 'checked="checked"':"";?>/>推荐赚积分：<br />推荐好友注册获奖50分，好友首次成功购物获奖同倍积分；
			   </label><br /><br />
				特别奖励积分：<br />
				 <label><input type="checkbox" name="jifendesc[]" value="spendthan1500" <?php echo in_array('spendthan1500',$rt['jifendesc']) ? 'checked="checked"':"";?>/>
			  	单次购物达1500元，当次购物获取2倍积分；</label><br /><br />
				<label><input type="checkbox" name="jifendesc[]" value="upuserinfo" <?php echo in_array('upuserinfo',$rt['jifendesc']) ? 'checked="checked"':"";?>/>
			  	特定时间内，更新正确个人资料，可获奖10个积分；</label><br /><br />
				<label><input type="checkbox" name="jifendesc[]" value="yearthancount6" <?php echo in_array('yearthancount6',$rt['jifendesc']) ? 'checked="checked"':"";?>/>
			  	全年购物超过6次，于每年年末奖励100个积分（2010-1-1起开始计算）。</label><br /><br />

		  </td>
		</tr>-->
		<tr>
			<td>&nbsp;</td>
			<td><label>
			  <input type="submit" value="<?php echo $type=='edit' ? '确认修改' : '确认添加';?>" class="submit"/>
			</label></td>
		</tr>
		</table>
</form>
</div>