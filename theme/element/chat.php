<style type="text/css">
.floatTips
{
	position: absolute;
	border:none;
	padding: 0px;
	top: 250px;
	right: 5px;
	width: 32px;
	height: auto;
	color: white;
	display:none;
	z-index:999;
	background-color:#FAFAFA;
	/*border:1px solid #ccc;*/
}
.hidechat{ cursor:pointer}

.mycarthidebox{ cursor:pointer;height:164px; width:30px; background:url(<?php echo SITE_URL.'theme/images/mycarthide_top.png';?>) right center no-repeat; font-size:16px; color:#CCC;display:block;}
</style>
<div id="floatTips" class="floatTips">
	<div class="mycarthidebox" onclick="show_hide_cart('show')"></div>
	<table class="mycartshowbox" border="0" cellspacing="0" cellpadding="0" width="100%" align="center" style="display:none;">
                <tr>
                    <td><div style=" height:24px; padding:6px 6px 0px 10px; background:url(<?php echo SITE_URL.'theme/images/rightcary_top.png';?>) center center no-repeat;font-size:16px; font-weight:bold"><span style="float:left">我的购物车</span><span style="float:right; color:#FFF; font-size:12px; cursor:pointer" onclick="show_hide_cart('hide')">隐藏>></span></div></td>
                </tr>

                <tr>
                    <td height="30">
                       <div class="MYCARTTOP" style="background-color:#FAFAFA;border:3px solid #DDDAD5; font-size:12px; color:#333;position:relative">
							 <?php
							 $cartlist = $this->Session->read('cart'); 
							  $total= 0;
							  $uid = $this->Session->read('User.uid');
							  $active = $this->Session->read('User.active');
							  $rank = $this->Session->read('User.rank');
							 ?>
							<div style="height:280px; overflow:auto; overflow-x:hidden; width:294px;">
							<table width="100%" border="0" cellpadding="0" cellspacing="0" style="text-align:center; line-height:24px">
							  <tr style="background-color:#DDDAD5">
								<th>商品名称</th>
								<th>数量</th>
								<th>单价</th>
								<th>实计</th>
								<th>操作</th>
							  </tr>
							<?php
							 if(!empty($cartlist)){
							 $ba = Import::basic();
							 foreach($cartlist as $k=>$row){
							 if(!($row['goods_id'])>0) continue;
							  $comd = array();
							  if($row['is_alone_sale']=='0'&&(empty($rt['gift_goods_ids']) || !in_array($row['goods_id'],$rt['gift_goods_ids']))){ //条件不满足者  不允许购买赠品
									$gid = $row['goods_id'];
									$this->Session->write("cart.{$gid}","");
									continue;
							  }
							  if(!empty($uid)&&$active=='1'){
								   if($rt['discount']>0 && $rank =='1'){
										$comd[] = ($rt['discount']/100)*$row['shop_price'];
								   }
								   if($row['shop_price']>0 && $rank == 1 ){
										$comd[] =  $row['shop_price']; //个人会员价格
								   }
								   if($row['pifa_price']>0 && $rank !='1'){ //高级会员价格
										$comd[] =  $row['pifa_price']; //高级会员价格
								   }
							  }else{
									$comd[] = $row['shop_price'];
							  }
							  if($row['is_promote']=='1' && $row['promote_start_date'] < mktime() && $row['promote_end_date'] > mktime()){ //促销价格
									$comd[] =  $row['promote_price'];
							  }
							  if($row['is_qianggou']=='1' && $row['qianggou_start_date'] < mktime() && $row['qianggou_end_date'] > mktime()){ //抢购价格
									$comd[] =  $row['qianggou_price'];
							  }
							  $onetotal = min($comd);
							
							  if($onetotal<=0) 
							  {
								  if($rank == '10' || $rank == '11' || $rank =='12')
									  {
										  $onetotal =  $row['pifa_price'];
									  }else
									  {
										$onetotal = $row['shop_price'];
									  }
							  }
							  $total +=$onetotal*$row['number'];
							?>
								<tr>
									<td style="border-bottom:1px dotted #ccc; text-align:left">&nbsp;<?php echo $ba->wordcut($row['goods_name'],20);?></td>
									<td style="border-bottom:1px dotted #ccc;">
										<table border="0" cellpadding="0" cellspacing="0"><tr><td>
										<a href="javascript:void(0)" ><img src="<?php echo SITE_URL;?>theme/images/mine.gif" width="13" height="13" class="jian"/></a>
										<input name="goods_number" id="<?php echo $k;?>" lang="<?php echo $onetotal;?>" value="<?php echo $row['number'];?>" class="inputBg" style="text-align: center; width:16px; border:none" type="text" />
										<a href="javascript:void(0)"><img src="<?php echo SITE_URL;?>theme/images/pus.gif" height="13" width="13" class="jia"/></a></td></tr></table>
									</td>
									<td style="border-bottom:1px dotted #ccc;">￥<?php echo $onetotal;?></td>
									<td style="border-bottom:1px dotted #ccc; text-align:left" class="raturnprice">￥<?php echo $onetotal*$row['number'];?></td>
									<td style="border-bottom:1px dotted #ccc;"><a href="javascript:void(0)" class="delcartid" id="<?php echo $k;?>" rel="mycarttop"><img src="<?php echo SITE_URL;?>theme/images/del_icon.jpg" /></a></td>
								</tr> 
							<?php }  }else{ ?>
								<tr>
									<td colspan="5">
									<p style="padding-top:30px;">您的购物车还没有东东哦 ^_^ </p>
									</td>
								</tr>
							<?php } ?>
							</table>
							<p style="height:75px"></p>
							</div>
							<?php  if(!empty($cartlist)){ ?>
							<div style="height:50px; width:274px;background-color:#DDDAD5; color:#666; font-size:14px;padding:10px; position:absolute; bottom:0px; left:0px;">
							<p>商品总价格：<span class="totalprice"><?php echo $total;?></span>元</p>
							<p><img src="<?php echo SITE_URL.'theme/images/jiesuan.gif';?>" style="float:left; cursor:pointer" onclick="javascript:ajax_cart_checkout(<?php echo $uid;?>)"/></p>
							</div>
							<?php } else {?>
							<div style="height:22px;background-color:#DDDAD5;"></div>
							<?php } ?>
					   </div>
                    </td>
                </tr>
        </table>
</div>
   