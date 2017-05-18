<style type="text/css">
.gehang{ clear:both; height:10px;}
.cart1 p.top{
	background: url(<?php echo $this->img('CarNewBgSHJ.gif');?>) no-repeat 0 0;
	width: 1000px;
	height: 28px;
	line-height: 75px;
	text-indent: 170px;
	color: 
	#767676;
}
#tab .a{ background-color:#ccc}
#tab .a,#tab .n{ cursor:pointer}
</style>
<div id="warp">
	<div style="width:1020px; margin:0px auto; background-color:#FFF">
		<div class="cart1" style=" width:1000px; margin:0px auto;">
		<span class="MYCART">
		<?php $this->element('ajax_mycart',array('rt'=>$rt));?>	 
		</span>
		<div id="tabs" style="width:1000px; height:355px; overflow:hidden">
		
		  <ul id="tab" style="width:998px; height:32px; line-height:32px; background-color:#ededed">
			<li id="f" class="a" onclick="m(this,0);" style="float:left; line-height:32px;"><h4 style="text-align:center;">免费赠品</h4></li>
			<li class="n" onclick="m(this,1);" style="float:left; line-height:32px;"><h4 style="text-align:center; ">抢购商品</h4></li>
		  </ul>
		
		  <ul id="tab0" class="c"> 
			  <div class="free">
					<p style="padding:3px;text-indent:0px;">惊喜豪礼，多买多送！</p>
					<div class="gehang"></div>
				<form action="" method="">
				<table width="944" border="0" cellpadding="0" cellspacing="0">
				  <tr>
					<td width="180" style="background:#f7f4eb">促销规则</td>
					<td width="95" style="background:#f7f4eb">赠品编号</td>
					<td width="480" style="background:#f7f4eb">赠品名称</td>
					<td width="98" style="background:#f7f4eb">赠品数量</td>
					<td width="105" style="background:#f7f4eb">操作</td>
				  </tr> 
				  <?php if(!empty($rt['gift_goods'])){
				  foreach($rt['gift_goods'] as $row){
				  ?> 
				  <tr>
					<td style=" border:#ededed solid 1px;" class="cr2"><?php echo $rt['gift_typesd'][$row['type']-1]['gname'];?></td>
					<td style=" border-right:#ededed solid 1px;border-bottom:#ededed solid 1px;border-top:#ededed solid 1px;"><?php echo $row['goods_bianhao'];?></td>
					<td style=" border-right:#ededed solid 1px;border-bottom:#ededed solid 1px;border-top:#ededed solid 1px;"> <u class="cr2">[赠品]</u><a href="<?php echo $row['url'];?>"><?php echo $row['goods_name'];?></a>&nbsp;&nbsp;￥<?php echo $row['market_price'];?></td>
					<td style=" border-right:#ededed solid 1px;border-bottom:#ededed solid 1px;border-top:#ededed solid 1px;">
					<select id="selectNode1">
						<option value="1">1</option>
					</select></td>
					<td style=" border-right:#ededed solid 1px;border-bottom:#ededed solid 1px;border-top:#ededed solid 1px;" class="cr2"><a href="javascript:void(0)" onclick="return addToCart('<?php echo $row['goods_id'];?>','cartlist')">加入购物车</a></td>
					 </tr>
				  <?php } } ?> 
				</table>
				</form>
			  </div> 
		  </ul>
		  <ul id="tab1" class="dn c" style="display:none"> 
		  <div  class="change">
					<p style="padding:3px;text-indent:0px;">惊喜豪礼，多买多送！</p>
					<div class="gehang"></div>
						<table  width="944" border="0" cellpadding="0" cellspacing="0">
						<tr>
						<?php if(!empty($rt['jifengoods'])){
						foreach($rt['jifengoods'] as $row){
						?>
						<td style="float:left; width:182px;text-align:center">
						<a href="<?php echo $row['url'];?>"><img src="<?php echo SITE_URL.$row['goods_thumb'];?>" alt="<?php echo $row['goods_name'];?>" width="120"/></a><br />
						<?php echo $row['goods_name'];?><br />
						原价：￥<?php echo $row['market_price'];?><br />
						所需积分：<font color="#FF699E"><?php echo $row['need_jifen'];?>积分</font><br />
						<img src="<?php echo $this->img('changnow.gif');?>" width="71" height="15" onclick="return addToCart('<?php echo $row['goods_id'];?>','jifen_cartlist')" style="cursor:pointer"/>
						</td>
						<?php } } ?>
						</tr>
						</table>
			  </div> 
		 </ul>
		  <ul style="background:url(<?php $this->img('zp_bot.gif');?>) no-repeat 0 0; width:998px; height:3px;"> </ul>
		</div>
		</div>
	</div>
</div>
