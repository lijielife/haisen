<div class="gehang"></div>
<p class="top"></p>
<table width="1000" border="0" cellpadding="0" cellspacing="0" style="text-align:center">
  <tr>
  	<td colspan="7" style="border-bottom:2px solid #9a0000">
	<div style="text-align:left; height:30px; line-height:30px;"><img src="<?php echo SITE_URL.'theme/images/mycart.gif';?>" height="30"/></div>
	</td>
  </tr>
  <tr style="line-height:35px; text-align:center; color:#7a7a7a; font-weight:bold">
    <td style="border-left:#dfdfdf solid 1px;border-right:#dfdfdf solid 1px; background:#fafafa" width="150">商品名称</td>
	
	<td style="border-right:#dfdfdf solid 1px; background:#fafafa; width:180px;">商品属性</td>
    <td style="border-right:#dfdfdf solid 1px; background:#fafafa" width="140">数 量</td>
	<td style="border-right:#dfdfdf solid 1px; background:#fafafa; width:100px">原 价</td>
	<td style="border-right:#dfdfdf solid 1px; background:#fafafa" width="120">单 价</td>

	
    <td style="border-right:#dfdfdf solid 1px; background:#fafafa" width="120">实 计</td>
    <td style="border-right:#dfdfdf solid 1px; background:#fafafa" width="130">操 作</td>
  </tr>
  <!--循环开始-->
   <?php
		  if(!empty($rt['goodslist'])){
		  $total= 0;
		  $uid = $this->Session->read('User.uid');
		  $active = $this->Session->read('User.active');
		  $rank = $this->Session->read('User.rank');
		  foreach($rt['goodslist'] as $k=>$row){
		  	  if(!($row['goods_id'])>0) continue;
		  	  $comd = array();
			  if($row['is_alone_sale']=='0'&&(empty($rt['gift_goods_ids']) || !in_array($row['goods_id'],$rt['gift_goods_ids']))){ //条件不满足者  不允许购买赠品
			  		$gid = $row['goods_id'];
			  		$this->Session->write("cart.{$gid}","");
					continue;
			  }
		//	  $comd[] = $row['shop_price'];
		  	  if(!empty($uid)&&$active=='1'){
				   if($rt['discount']>0 && $rank =='1'){
						$comd[] = ($rt['discount']/100)*$row['shop_price'];
				   }
					
				   if($row['shop_price']>0 ){ //个人会员价格
				   			
				   		$comd[] =  $row['shop_price']; //个人会员价格
				   }
				    if($row['pifa_price']>0 ){ //高级会员价格
					
				   		$comd[] =  $row['pifa_price']; //高级会员价格
				   }
				   
			  }else{
			   		$comd[] = $row['shop_price'];
					$comd[] =  $row['pifa_price'];
			  }
			  
			  if($row['is_promote']=='1' && $row['promote_start_date'] < mktime() && $row['promote_end_date'] > mktime() && $row['promote_price']>0){ //促销价格
					$comd[] =  $row['promote_price'];
			   }
			  if($row['is_qianggou']=='1' && $row['qianggou_start_date'] < mktime() && $row['qianggou_end_date'] > mktime() && $row['qianggou_price']>0){ //抢购价格
					$comd[] =  $row['qianggou_price'];
			  }
				 
			  $onetotal = min($comd);
			 
			  if($onetotal<=0) $onetotal = $row['pifa_price'];
			  $total +=$onetotal*$row['number'];
   ?>
  <tr>
    <td style="border-left:#dfdfdf solid 1px;border-right:#dfdfdf solid 1px;border-bottom:#dfdfdf solid 1px;">
        <table width="435" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="85"><a href="<?php echo $row['url'];?>" target="_blank"><img src="<?php echo $row['goods_thumb'];?>" title="<?php echo $row['goods_name'];?>" border="0" onload="image_size_load(this,70)"></a></td>
            <td align="left">
			<font color="red"><?php if($row['is_alone_sale']=='0'||$row['is_qianggou']=='1' || $row['is_jifen_session']=='1'){
							if($row['is_jifen_session']=='1'){
								echo '[积分商品]';
							}else{
								echo $row['is_qianggou']=='1' ?  '[抢购商品]' : '[赠品]';
							}
					  }else{
						echo '[折扣]';
					  }
				?></font>
			<a href="<?php echo $row['url'];?>" target="_blank" class="f6"><?php echo $row['goods_name'];?></a>
			<?php if(!empty($row['buy_more_best'])){echo '<br />该商品实行<font style="color:#FE0000;font-weight:bold">['.$row['buy_more_best'].']</font>促销活动，欢迎订购！';}?></td>
          </tr>
        </table>
	</td>
	
	<td style="border-right:#dfdfdf solid 1px;border-bottom:#dfdfdf solid 1px;"><?php echo !empty($row['spec']) ? implode("<br />",$row['spec']) : "";?></td>
    <td  style="border-right:#dfdfdf solid 1px;border-bottom:#dfdfdf solid 1px;" align="center"  valign="middle">
	<?php if($row['is_alone_sale']=='0' /*||$row['is_qianggou']=='1'*/ || $row['is_jifen_session']=='1'){
		if($row['is_jifen_session']=='1'){
			echo '所需&nbsp;'.$row['need_jifen']*$row['number'].'&nbsp;积分<br />数量&nbsp;'.$row['number'];
		}else{
			echo ($row['is_qianggou']=='1' ?  '数量&nbsp;' .$row['number']:  '数量&nbsp;'.$row['number']);
		}
	}else{?>
		 <table width="15" border="0" cellpadding="0" cellspacing="0">
			  <tr>
				<td align="right"><a href="javascript:void(0)" ><img src="<?php echo SITE_URL;?>theme/images/mine.gif" width="13" height="13" class="jian"/></a></td>
				<td><input name="goods_number" id="<?php echo $k;?>" lang="<?php echo $onetotal;?>" value="<?php echo $row['number'];?>" class="inputBg" style="text-align: center; width:20px; border:1px solid #ccc" type="text"></td>
				<td align="left"><a href="javascript:void(0)"><img src="<?php echo SITE_URL;?>theme/images/pus2.gif" height="13" width="13" class="jia"/></a></td>
				<td class="jian"><b><?php  echo $row['goods_unit'];?></b></td>
			  </tr>
       	 </table>
	<?php } ?>
 	</td>
	<td style="border-right:#dfdfdf solid 1px;border-bottom:#dfdfdf solid 1px;"><?php echo $row['shop_price'];?></td>
	<td  style="border-right:#dfdfdf solid 1px;border-bottom:#dfdfdf solid 1px;" > ￥<?php echo $onetotal;?></td>
    <td  style="border-right:#dfdfdf solid 1px;border-bottom:#dfdfdf solid 1px;" class="raturnprice"> ￥<?php echo $onetotal*$row['number'];?></td>
    <td  style="border-right:#dfdfdf solid 1px;border-bottom:#dfdfdf solid 1px;" align="center">
				<table  border="0"  cellpadding="3" cellspacing="0">
				  <tr>
					<td><img src="<?php echo SITE_URL;?>theme/images/btuselect.gif" width="74" height="26" onclick="return addToColl('<?php echo $row['goods_id'];?>')" style="cursor:pointer"/></td>
				  </tr>
				  <tr>
					<td><a href="javascript:void(0)" class="delcartid" id="<?php echo $k;?>"><img src="<?php echo SITE_URL;?>theme/images/btudell.gif" width="74" height="26"/></a></td>
				  </tr>
				</table>
        </td>
  </tr>
  <?php 
  if(!empty($row['gifts'])){
  ?>
    <tr>
    <td style="border-left:#dfdfdf solid 1px;border-right:#dfdfdf solid 1px;border-bottom:#dfdfdf solid 1px;">
        <table width="435" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="85"><a href="<?php echo $row['url'];?>" target="_blank"><img src="<?php echo $row['goods_thumb'];?>" title="<?php echo $row['gifts']['goods_name'];?>" border="0" onload="image_size_load(this,70)"></a></td>
            <td align="left">
			<font color="red">[赠品]</font>
			<a href="<?php echo $row['url'];?>" target="_blank" class="f6"><?php echo $row['gifts']['goods_name'];?></a></td>
          </tr>
        </table>
	</td>
	
	<td style="border-right:#dfdfdf solid 1px;border-bottom:#dfdfdf solid 1px;"><?php echo !empty($row['gifts']['spec']) ? implode("<br />",$row['gifts']['spec']) : "";?></td>
    <td  style="border-right:#dfdfdf solid 1px;border-bottom:#dfdfdf solid 1px;" align="center" valign="middle"><input type="text" value="<?php echo $row['gifts']['number'];?>" disabled=""  style="text-align: center; width:20px; border:1px solid #ccc"></td>
	<td style="border-right:#dfdfdf solid 1px;border-bottom:#dfdfdf solid 1px;"><?php echo $row['gifts']['shop_price'];?></td>
	<td  style="border-right:#dfdfdf solid 1px;border-bottom:#dfdfdf solid 1px;" > ￥0.00</td>
    <td  style="border-right:#dfdfdf solid 1px;border-bottom:#dfdfdf solid 1px;" class="raturnprice"> ￥0.00</td>
    <td  style="border-right:#dfdfdf solid 1px;border-bottom:#dfdfdf solid 1px;" align="center"><a href="javascript:void(0)" class="delcartid" id="<?php echo $row['gifts']['goods_key'];?>"><img src="<?php echo SITE_URL;?>theme/images/btudell.gif" width="74" height="26"/></a></td>
  </tr>
    <?php } }?>
  <!--循环结束-->
   <?php }else{ ?>
   		 <tr>
		 <th colspan="7" align="center" style="font-size:24px; color:#9a0000">你的购物车为空！</th>
		 </tr>
<?php } ?>
</table><?php //$rtn = $this->action('shopping','get_give_off_monery',$total);?>
<div class="gehang"></div>
<div class="left"><img src="<?php echo SITE_URL;?>theme/images/clearcart.gif" width="107" height="29" onclick="location.href='<?php echo SITE_URL;?>mycart.php?type=clear'" style="cursor:pointer"/></div> 
<div style="text-align:right; height:25px; line-height:25px; color:#222; font-size:14px">商品总价(不含运费)：<b style="color:#CC0000">￥<span class="totalprice"><?php echo $total;?></span>元</b></div> 
<!--<div style="text-align:right; height:25px; line-height:25px; color:#222; font-size:16px">账户剩余资金：<b><?php echo $rtn['shengxiamoney'];?></b> 元</div> 
<div style="text-align:right; height:25px; line-height:25px; color:#222; font-size:16px">当月已抵消：<b><?php echo $rtn['month_spend_money'];?></b> 元</div> 
<div style="text-align:right; height:25px; line-height:25px; color:#222; font-size:16px">当月能最大抵消：<b><?php echo $rtn['month_max_spend_money'];?></b> 元</div>
<div style="text-align:right; height:25px; line-height:25px; color:#222; font-size:16px">当次购物抵消：<b class="offmoney"><?php echo $rtn['offmoney'];?></b> 元</div> 
<div style="text-align:right; height:25px; line-height:25px; color:#222; font-size:16px">本次购物实际支付价：<b class="shippingprice"><?php echo $rtn['shippingprice'];?></b> 元</div>-->
<div class="clear"></div>
<div class="right cr2"><a href="<?php echo SITE_URL;?>mycart.php?type=checkout" style="display:block; width:147px; height:45px; line-height:45px; background:url(<?php echo SITE_URL;?>theme/images/buybut.jpg) 0px 0px no-repeat; font-size:24px; color:#FFFFFF; font-weight:bold; text-align:center; text-decoration:none">确认结算</a></div> 
<div class="clear10"></div>