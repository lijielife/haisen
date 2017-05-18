<div class="head">
  <p><a href="<?php echo SITE_URL;?>">返回首页</a></p>
</div>
<div class="content">
  <div class="content_cont"> <img src="../theme/images/VIP_sm1.gif" width="996" height="169"/> </div>
  <div class="vip_nav">
    <div class="nav_pic">
      <div class="nav_vip">
        <table border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td ><a href="#q1" onclick="MM_nbGroup('down','group1','VIPnav01','',1)" onmouseover="MM_nbGroup('over','VIPnav01','../theme/images/VIP_nav_hover.jpg','',1)" onmouseout="MM_nbGroup('out')"><img src="../theme/images/VIP_nav.jpg" alt="" name="VIPnav01" width="235" height="76" border="0" id="VIPnav01" onload="" /></a></td>
            <td><a href="#q2"  onClick="MM_nbGroup('down','group1','VIPnav02','',1)" onMouseOver="MM_nbGroup('over','VIPnav02','../theme/images/VIP_nav_hover2.jpg','',1)" onMouseOut="MM_nbGroup('out')"><img name="VIPnav02" src="../theme/images/VIP_nav2.jpg" border="0" alt="" onLoad="" /></a></td>
            <td><a href="#q3" onClick="MM_nbGroup('down','group1','VIPnav03','',1)" onMouseOver="MM_nbGroup('over','VIPnav03','../theme/images/VIP_nav_hover3.jpg','',1)" onMouseOut="MM_nbGroup('out')"><img name="VIPnav03" src="../theme/images/VIP_nav3.jpg" border="0" alt="" onLoad="" /></a></td>
            <td><a href="#q4" onClick="MM_nbGroup('down','group1','VIPnav04','',1)" onMouseOver="MM_nbGroup('over','VIPnav04','../theme/images/VIP_nav_hover4.jpg','',1)" onMouseOut="MM_nbGroup('out')"><img name="VIPnav04" src="../theme/images/VIP_nav4.jpg" border="0" alt="" onLoad="" /></a></td>
          </tr>
        </table>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="vip_tq" >
   <a name="q1" style="display:none">vip特权</a>
    <table width="900" border="1" bordercolor="#e4e4e4" cellpadding="0" cellspacing="0" >
      <tr height="45">
        <td width="179" class="weg">vip特权</td>
        <td width="240" class="weg">银卡会员</td>
        <td width="240" class="weg">金卡会员</td>
        <td width="240" class="weg">备注</td>
      </tr>
      <tr height="45">
        <td class="weg">打折</td>
        <td align="left">&nbsp;&nbsp;会员再打9折</td>
        <td align="left">&nbsp;&nbsp;会员再打9折，然后再10%返点</td>
        <td align="left">&nbsp;&nbsp;会员登录即可查看价格</td>
      </tr>
      <tr height="45">
        <td class="weg">生日礼物</td>
        <td align="left">&nbsp;&nbsp;精致礼品</td>
        <td align="left">&nbsp;&nbsp;精致礼品</td>
        <td style="line-height:24px;" align="left"><p>提前一个月通知会员，生日过期未领取视为放弃</p></td>
      </tr>
      <tr height="45">
        <td class="weg">线下活动</td>
        <td align="left">&nbsp;&nbsp;Party派对会或看电影等</td>
        <td align="left">&nbsp;&nbsp;Party派对会或看电影等</td>
        <td style="line-height:24px;" align="left"><p>不同时期不同区域有不同安排，敬请期待，要与客服确认哦</p></td>
      </tr>
      <tr>
        <td class="weg">专享商品优惠</td>
        <td align="left">&nbsp;&nbsp;指定商品特享价</td>
        <td align="left">&nbsp;&nbsp;指定商品特享价</td>
        <td align="left">&nbsp;&nbsp;不定期变换，有喜欢赶紧下手哦</td>
      </tr>
    </table>
  </div>
  <div class="vip_gf">
  <a name="q2" style="display:none">vip礼物</a>
    <table width="700" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><img src="../theme/images/VIP_gif1.gif" width="337" height="227" /></td>
        <td><img src="../theme/images/VIP_gif2.gif" width="337" height="224"/></td>
      </tr>
    </table>
  </div>
  <div class="vip_yh" >
 <a name="q3" style="display:none">vip优惠</a>
    <div class="yh_list">
	<?php 
	if(!empty($rt['vipgoods'])){
	foreach($rt['vipgoods'] as $row){
	?>
      <dl>
        <dd style="text-align:center;"><a href="<?php echo $row['url'];?>" title="<?php echo $row['goods_name'];?>"><img src="<?php echo $row['goods_thumb'];?>" width="168" height="174"/></a></dd>
        <dt style=" color:#777777"><?php echo $row['goods_name'];?></dt>
        <dt style="text-decoration:line-through">会员价:￥<?php echo $row['shop_price'];?></dt>
        <dt> <span class="left">VIP半价：￥<?php echo $row['vip3_price'];?></span> <span class="right" > <img style=" cursor:pointer" src="<?php echo $this->img('buyico.gif');?>" width="46" height="15" onclick="return addToCart('<?php echo $row['goods_id'];?>')"/> </span>
          <div class="clear"></div>
        </dt>
      </dl>
    <?php } } ?>
    </div>
  </div>
  <a name="q4" style="display:none">vip活动</a>
<?php $this->element('help',array('help_article'=>$lang['help_article']));?>
<?php $this->element('footer',array('lang'=>$lang)); ?>
</div>