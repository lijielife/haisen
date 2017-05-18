<style>

.info{ display:none;}
.tip{border:1px solid #CAD8E9;padding:15px;width:300px; height:245px; display:none;background:#FEFEFE;}
.tip .info{ display:block; position:absolute; top:10px; left:180px; line-height:25px;}

.tip{ margin:0px; padding:5px}
.tip li{ float:left; width:159px; height:235px; border-bottom:1px dotted #ccc; text-align:center; padding:5px; margin:13px; overflow:hidden; position:relative}

.tip span{ display:block; width:100%; overflow:hidden}
.tip .goods_name{ height:30px; line-height:15px; padding-top:3px; position:absolute; bottom:40px; left:0px; overflow:hidden; text-align:center; font-weight:bold;  font-size:14px;}
.tip .goods_price{ position:absolute; bottom:3px; left:0px}
.tip .goods_num{ display:block; height:14px; line-height:14px;position:absolute; bottom:26px; left:0px;}
.tip goods_price{ height:20px; line-height:20px; text-align:center; width:165px;}
.tip goods_price img{ margin:0 auto;}
.tip goods_price { font-size:14px; color:#FF0000; padding-left:10px; float:right;}
.tip .goods_num { text-align:center;font-size:14px; color:#FF0000; }
.tip .goods_price input{ margin:0 auto; border:1px solid #ccc; width:45px; height:16px; line-height:16px; text-align:center}
.tip .goods_price img { margin:0 60px 0 0 ;}
</style>  <!---  look 添加 鼠标经过样式  ---------->
<?php $rank = $this->Session->read('User.rank'); ?>

<?php if(!empty($rt['categoodslist'])){?>
<div id="idTip" class="tip"></div>
<ul id="idTest2" class="product-list">
<?php foreach($rt['categoodslist'] as $row){?>
<li>
	<a href="<?php echo $row['url'];?>"><img src="<?php echo $row['goods_thumb'];?>" alt="<?php echo $row['goods_name'];?>" onload="image_size_load(this,'145')"/></a>
	<a href="<?php echo $row['url'];?>" title="<?php echo $row['goods_name'];?>"><span class="goods_name"><?php echo $row['goods_name'];?></span></a>
	<span class="goods_num"><del>¥<?php echo $row['shop_price'];?></del>&nbsp; &nbsp;<strong>￥
	<?php 
		if($rank == '10' || $rank == '11' || $rank =='12')
		{
			if($row['zprice']<$row['pifa_price']&& $row['zprice']>0)
			{
				echo $row['zprice'];
			}else if($row['pifa_price']>0)
			{
				echo $row['pifa_price'];
			}else
			{
				echo $row['shop_price'];
			}
		}else
		{
			if($row['zprice']<$row['shop_price']&& $row['zprice']>0)
			{
				echo $row['zprice'];
			}else
			{
				echo $row['shop_price'];
			}
		}	
			
	?>
	</strong></span>
	<span class="goods_price"><input type="text" name="number" size="1" value="1"/>件<img src="<?php echo SITE_URL.'theme/images/bnt_buy.gif'?>" onclick="return addToCart('<?php echo $row['goods_id'];?>','',this)" style="cursor:pointer; float:right"/></span>
	
	<div class="info">
	  品牌： <?php echo $row['brand_name'];?> <br />
      单位： <?php echo $row['goods_unit'];?> <br />
      重量： <?php if($row['goods_weight'] != 0.000) {echo '约'.'&nbsp;'.$row['goods_weight'].'克'; }?> <br />
      规格： <?php echo $row['goods_brief'];?> <br />
      库存： <?php echo $row['goods_number'];?> <br />
		<?php if(!empty($rt['goodsinfo']['buy_more_best'])){?>	 
		 优惠： <?php echo $rt['goodsinfo']['buy_more_best'];?>
		<?php } ?>
    </div>
	
</li>
<?php }?>
<div class="clear"></div>
</ul>
<?php }?>
<div class="clear"></div>
<div class="con_box">
<p class="pages">
<?php echo $rt['categoodspage']['showmes'];?>
<?php echo $rt['categoodspage']['first'];?>
<?php echo $rt['categoodspage']['prev'];?>
<?php
 if(isset($rt['categoodspage']['list'])&&!empty($rt['categoodspage']['list'])){
 foreach($rt['categoodspage']['list'] as $aa){
 echo $aa."\n";
 }
 }
?>
<?php echo $rt['categoodspage']['next'];?>
<?php echo $rt['categoodspage']['last'];?>
</p>
</div>
<script language="javascript" type="text/javascript">
//限制价格只能输入数字
$('input[name="number"]').change(function(){
	vall = $(this).val();
	if(!(vall>0)){
		$(this).val('1');
	}
});

var ft = new FixedTips("idTip");

/********  look 添加 开始（鼠标经过效果）  ******************************/
$$A.forEach($$("idTest2").getElementsByTagName("li"), function(o){
	ft.add(o.getElementsByTagName("img")[0], {
		relative: { customLeft: -16, customTop: -16 },
		onShow: function(){ ft.tip.innerHTML = o.innerHTML; }
	});
})
</script>