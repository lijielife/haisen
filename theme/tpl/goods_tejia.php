<div class="content">
  <div class="week_goods"><?php if(!empty($rt['tejiabanner'])){?><a href="<?php echo $rt['tejiabanner']['ad_url'];?>" title="<?php echo $rt['tejiabanner']['ad_name'];?>"><img src="<?php echo $rt['tejiabanner']['ad_img'];?>" width="981" height="281" /></a><?php } ?>
    <div class="wglist">
	<span class="GOODSLIST">
	<?php $this->element('ajax_goods_tejia',array('rt'=>$rt));?>	 
	</span>
       <div class="gehang"></div>
      <p>活动说明：</p>
      <p>1. 所有参与特价促销活动的产品，不予退还。</p>
      <p > &nbsp; &nbsp;在收到产品后，请与快递公司当面检查验收产品，如发现包装明显破损及污渍，请拒收产品，并通知美之花客服部。</p>
      <p>2. 特价商品，不再参与其他任何促销活动。</p>
      <p>3. 特价商品，数量有限，卖完即止。</p>
      <p>4. 美之花对本活动具有最终解释权。</p>
	
    </div>
  </div>
</div>
<script language="javascript" type="text/javascript">
function get_tejia_goods(page){ //ajax分页
	createwindow();
	$.post('<?php echo SITE_URL."promotion/ajax_tejia_goods/";?>'+page+"/",{page:page},function(data){
			if(data!=""){
					$('.GOODSLIST').html(data);
			 }
			 removewindow();
	});
}
</script>
 <?php $this->element('help',array('help_article'=>$lang['help_article']));?>