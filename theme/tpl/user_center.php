<div id="wrap">
	<?php $this->element('user_menu');?>
    <div class="m_right" >
		<h2 class="con_title">欢迎你的光临！</h2>
    	<div class="right_top" >
        <table width="100%" border="0">
		  <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td class="cro siz weg loc_r"><a href="<?php echo SITE_URL.'user.php?act=myinfo';?>" style="color:#A50098">编辑个人资料</a></td>
		  </tr>
		  <tr>
			<td class="siz weg">登陆账号：<?php echo $rt['userinfo']['mobile_phone'];?></td>
			<td class="siz weg">消费及积分记录</td>
			<td class="siz weg">待操作信息</td>
		  </tr>
		  <tr>
			<td>真实姓名：<?php echo $rt['userinfo']['consignee'];?></td>
			<td>累计消费金额：￥<?php echo !empty($rt['userinfo']['spendmoney']) ? str_replace('-','',$rt['userinfo']['spendmoney']) : "0";?> </td>
			<td>待付款的订单：<font color="#ff699e">(<?php echo $rt['userinfo']['pay_ordercount'];?>)</font> </td>
		  </tr>
		  <tr>
			<td>会员级别：<?php echo $rt['userinfo']['level_name'];?></td>
			<td>成交订单数：<?php echo $rt['userinfo']['success_ordercount'];?> </td>
			<td>待评论商品：<font color="#ff699e">(<?php echo !empty($rt['userinfo']['need_comment_count']) ? $rt['userinfo']['need_comment_count'] : 0;?>)</font> </td>
		  </tr>
		  <tr>
			<td><?php  if($rt['userinfo']['user_rank'] =="1") {echo "昵称";} else { echo "昵称";}?>：<?php echo $rt['userinfo']['nick_name'];?></td>
			<td>可用余额：￥<?php echo empty($rt['userinfo']['zmoney']) ? 0 : $rt['userinfo']['zmoney'];?> </td>
			<td>待确认收货订单：<font color="#ff699e">(<?php echo empty($rt['userinfo']['shopping_ordercount']) ? 0 : $rt['userinfo']['shopping_ordercount'];?>)</font> </td>
		  </tr>
		  <tr>
			<td>E-mail：<?php echo $rt['userinfo']['email'];?></td>
			<td>可用积分：<?php echo intval($rt['userinfo']['zpoint']);?>分 <font color="#ff699e"></font> </td>
			<td>购物车中商品：<font color="#ff699e">(<?php $cart = $this->Session->read('cart');echo !empty($cart) ? count($cart) : 0;?>)</font> </td>
		  </tr>
		  <tr>
			<td>手机：<?php echo $rt['userinfo']['mobile_phone'];?></td>
			<td>电话：<?php echo $rt['userinfo']['home_phone'];?></td>
			<td>全部订单：<font color="#ff699e">(<?php echo $rt['userinfo']['all_ordercount'];?>)</font> </td>
		  </tr>
		  <tr>
		  <td colspan="2">联系地址：
		  <?php if(!empty($rt['userress'])){ echo $rt['userress']['provinces'].'&nbsp;'.$rt['userress']['citys'].'&nbsp;'.$rt['userress']['districts'].'&nbsp;'.$rt['userress']['address']; } ?></td>
		  <td>状态：<span style="color:#FF0000"><?php echo $rt['userinfo']['active']=='1' ? '已激活':'未激活&nbsp;'.($rt['userinfo']['user_rank']=='1'?'<a href="javascript:;">[E-mail发送激活]</a>':'<a href="javascript:;">[联系管理员激活]</a>');?></span></td>
		  </tr>
		</table>
 	</div>
	 <div class="clear"></div>
 	<div class="right_notice" style="min-height:20px">
		<?php if(!empty($lang['site_notice'])){
		echo $lang['site_notice'];
		}else{
		echo '<b><font color="#E05E7C">咱无公告！</font></b>';
		}
		?>
 	</div>

 	<div class="buylc"> <img src="<?php echo $this->img('buy_lc.gif');?>" width="765" height="61" alt="" /></div>

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
