<div id="wrap">
	<div class="clear7"></div>
	<?php $this->element('user_menu');?>
    <div class="m_right" >
		<h2 class="con_title">欢迎你的到来</h2>
    	<div class="right_top" >
        <table width="100%" border="0">
		  <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td class="cro siz weg loc_r"><a href="<?php echo SITE_URL.'user.php?act=myinfo';?>" style="color:#A50098">编辑个人资料</a></td>
		  </tr>
		  <tr>
		    <td>会员编号：<?php echo $rt['userinfo']['user_id'];?>&nbsp;&nbsp;&nbsp;<span style="color:#FF0000">(今后登陆账号)</span></td>
			<td>真实姓名：<?php echo $rt['userinfo']['consignee'];?></td>
			<td>会员级别：<?php echo $rt['userinfo']['level_name'];?></td>
		  </tr>
		  <tr>
		  	<td>公司名称：<?php echo $rt['userinfo']['user_name'];?></td>
		  	<td>E-mail：<?php echo $rt['userinfo']['email'];?></td>
			<td>可用余额：￥<?php echo empty($rt['userinfo']['zmoney']) ? 0 : $rt['userinfo']['zmoney'];?> </td>
		  </tr>
		  <tr>
			<td>手机：<?php echo $rt['userinfo']['mobile_phone'];?></td>
			<td>电话：<?php echo $rt['userinfo']['home_phone'];?></td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
		  <td colspan="2">联系地址：
		  <?php if(!empty($rt['userress'])){ echo $rt['userress']['provinces'].'&nbsp;'.$rt['userress']['citys'].'&nbsp;'.$rt['userress']['districts'].'&nbsp;'.$rt['userress']['town'].'&nbsp;'.$rt['userress']['village'].'&nbsp;'.$rt['userress']['address']; } ?></td>
		  <td>状态：<span style="color:#FF0000"><?php echo $rt['userinfo']['active']=='1' ? '已激活':'未激活&nbsp;<a href="javascript:;">[联系管理员激活]</a>';?></span></td>
		  </tr>
		</table>
 	</div>
	 <div class="clear"></div>
 	<div class="right_notice" style="min-height:20px">
		<table class="ke-zeroborder" border="0" width="755">
			<tr>
				<td class="cro weg siz weg">[温馨提示]</td>
			</tr>
			<tr>
				<td class="cr2">1、如果您还没完善个人资料，请先完善个人资料，以便我们能够及时把相关信息通知到您。</td>
			</tr>
			<tr>
				<td class="cr2">2、如果你还不是激活供应商，请先联系商城管理员激活后才能操作。</td>
			</tr>
			<tr>
				<td class="cr2">3、如果你有什么问题或者建议，你可以在“我的留言”提出发表。</td>
			</tr>
		</table>
 	</div>

 	<div class="buylc"> <img src="<?php echo $this->img('suppliers_op.png');?>" width="765" height="61" alt="" /></div>

	 <div class="newpro">
			<div class="newpro_t">推荐商品</div>
			<div class="newpros">
			<?php if(!empty($rt['recommend10'])){?>
				<dl>
		<?php foreach($rt['recommend10'] as $row){?>
		<dd style="width:167px; height:176px; overflow:hidden"><a href="<?php echo $row['url'];?>" title="<?php echo $row['goods_name'];?>"><img src="<?php echo $row['goods_thumb'];?>"  onload="image_size_load(this,'165')"/></a></dd>
		<?php } ?>
		<div class="clear"></div>
		</dl> 
		<?php } ?>
			</div>
	 </div>
   </div>
    <div class="clear"></div>
</div>
