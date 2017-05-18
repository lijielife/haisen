<script type="text/javascript">
$(function(){			
$(".jqzoom").jqueryzoom({
	xzoom:400,
	yzoom:470,
	offset:10,
	position:"right",
	preload:1,
	lens:1
});
$("#spec-list").jdMarquee({
	deriction:"left",
	width:470,
	height:56,
	step:2,
	speed:4,
	delay:10,
	control:true,
	_front:"#spec-right",
	_back:"#spec-left"
});
$("#spec-list img").bind("mouseover",function(){
	var src=$(this).attr("src");
	$("#spec-n1 img").eq(0).attr({
		src:src.replace("\/n5\/","\/n1\/"),
		jqimg:src.replace("\/n5\/","\/n0\/")
	});
	$(this).css({
		"border":"1px solid #ff6600",
		"padding":"1px"
	});
}).bind("mouseout",function(){
	$(this).css({
		"border":"1px solid #ccc",
		"padding":"2px"
	});
});				
})
</script>
<div class="maincon">
	<div class="mainconbox" style="padding-top:0px">
		<div class="weizhi">
		<div class="weizhibox">您现在的位置：<?php echo $rt['hear'];?></div>
		</div>
		<div class="goodsnav">
		<ul>
			<li><a class="active" href="javascript:;" onmouseover="show_hide('1'); return false;">商品图片</a></li>
			<li><a href="javascript:;" class="other" onmouseover="show_hide('2'); return false;">商品属性</a></li>
			<li><a href="javascript:;" class="other" onmouseover="show_hide('3'); return false;">商品评论</a></li>
		</ul>
		</div>
		<div class="goodsleft">
			<div id="tab1">
				<div id="preview">
					<div class="jqzoom" id="spec-n1">
					<img onload="loadimg2(this,470,470)"  src="<?php echo SITE_URL.$rt['goodsinfo']['goods_img'];?>" jqimg="<?php echo SITE_URL.$rt['goodsinfo']['original_img'];?>" width="400" alt="">
					</div>
					<div id="spec-n5">
						<div class="control" id="spec-left">
							<img src="<?php echo $this->img('left.gif');?>">
						</div>
						<div id="spec-list">
							<ul class="list-h">
							<?php if(!empty($rt['gallery'])) foreach($rt['gallery'] as $row ){?>
								<li><img src="<?php echo $row['original_img'];?>" alt="<?php echo $row['img_desc'];?>" id="<?php echo $row['original_img'];?>" width="60" height="76" style="border: 1px solid rgb(204, 204, 204); padding: 2px;"> </li>
							<?php } ?>
							</ul>
						</div>
						<div class="control" id="spec-right">
							<img src="<?php echo $this->img('right.gif');?>">
						</div>
						
					</div>
				</div>
			</div>
			<div id="tab2" style="display:none; text-align:left; min-height:400px">
						  <?
						  if(!empty($rt['spec'])){
							foreach($rt['spec'] as $row){
							if(empty($row)||!is_array($row)) continue;
						  ?>
	  					<?php if(!empty($row[0]['attr_name'])){?>
						  <p><span class="keyss"><?php  echo $row[0]['attr_name'].":";?></span>
								  <?php
								  foreach($row as $rows){
									echo '<span class="valuess">'.trim($rows['attr_value']).'</span>';
								  }
								?>
								
						  </p>
						  <div class="clear"></div>
						  <?php } ?>						  
						  <?php } // end foreach
										
						  } //end if?>
					  
			</div>
			<div id="tab3" style="display:none; text-align:left; min-height:400px;">
				<div class="tab3info">
					<div style="width:320px; height:170px; float:left;overflow:hidden">
					<table width="310" border="0" cellpadding="0" cellspacing="0">
					  <tr>
						<td colspan="3"><div style="line-height:18px; height:18px; padding-left:20px">商品评价</div></td>
					  </tr>
					  <tr>
						<td rowspan="4" width="111">
							<p style="font-size:36px"><u><?php echo isset($rt['rank_count'][3]) ? intval(($rt['rank_count'][3]/$rt['rank_count']['zcount'])*100) : 100;?>%</u></p>
							<p>■好评度</p>                                </td>
						<td colspan="2" style="margin:0px; padding:0px;"><p class="cc"><b style="font-size:10px">■</b> 好评 <img src="<?php echo $this->img('pl.png');?>" width="<?php echo isset($rt['rank_count'][3]) ? ($rt['rank_count'][3]/$rt['rank_count']['zcount'])*120 : 120;?>" height="12" />&nbsp;&nbsp;<span style="font-size:12px;"><?php echo isset($rt['rank_count'][3]) ? intval(($rt['rank_count'][3]/$rt['rank_count']['zcount'])*100) : 100;?>%</span></p></td>
					  </tr>
					  <tr>
						<td colspan="2" style="margin:0px; padding:0px;"><p class="cc"><b style="font-size:10px">■</b> 中评 <img src="<?php echo $this->img('pl.png');?>" width="<?php echo isset($rt['rank_count'][2]) ? ($rt['rank_count'][2]/$rt['rank_count']['zcount'])*120 : 0;?>" height="12" />&nbsp;&nbsp;<span style="font-size:12px;"><?php echo isset($rt['rank_count'][2]) ? intval(($rt['rank_count'][2]/$rt['rank_count']['zcount'])*100) : 0;?>%</span></p></td>
					  </tr>
					  <tr>
						<td colspan="2" style="margin:0px; padding:0px;"><p class="cc"><b style="font-size:10px">■</b> 差评 <img src="<?php echo $this->img('pl.png');?>" width="<?php echo isset($rt['rank_count'][1]) ? ($rt['rank_count'][1]/$rt['rank_count']['zcount'])*120 : 0;?>" height="12" />&nbsp;&nbsp;<span style="font-size:12px;"><?php echo isset($rt['rank_count'][1]) ? intval(($rt['rank_count'][1]/$rt['rank_count']['zcount'])*100) : 0;?>%</span></p></td>
					  </tr>
					  <tr>
						<td width="100" align="center"><img src="<?php echo $this->img('asked.gif');?>" width="99" height="32" onclick="return ajax_check_comment('<?php echo $rt['goodsinfo']['goods_id'];?>')" style="cursor:pointer"/></td>
						<td align="center"><!--<a href="<?php echo SITE_URL;?>comment/g<?php echo $rt['goodsinfo']['goods_id'];?>/">查看所有评论</a>--></td>
					  </tr>
					</table>
					</div>
					<div style="width:170px; height:180px; float:right; overflow:hidden">
						<table width="170" border="0"  cellpadding="0" cellspacing="0">
						  <tr>
							<td style="height:17px; line-height:17px;">用户综合满意度</td>
						  </tr>
						  <?php
						  $rank1 = empty($rt['avg_rank']['avg_goods_rand']) ? 5 : $rt['avg_rank']['avg_goods_rand'];
						  $rank2 = empty($rt['avg_rank']['avg_shopping_rand']) ? 5 : $rt['avg_rank']['avg_shopping_rand'];
						  $rank3 = empty($rt['avg_rank']['avg_saleafter_rand']) ? 5 : $rt['avg_rank']['avg_saleafter_rand'];
						  ?>
						  <tr>
							<td><b style="font-size:10px">■</b>  产品质量 <?php for($i=0;$i<$rank1;$i++){?><img src="<?php echo $this->img('onestar.gif');?>" align="absmiddle"/><?php } ?></td>
						  </tr>
						  <tr>
							<td><b style="font-size:10px">■</b>  物流配送 <?php for($i=0;$i<$rank2;$i++){?><img src="<?php echo $this->img('onestar.gif');?>" align="absmiddle"/><?php } ?></td>
						  </tr>
						  <tr>
							<td><b style="font-size:10px">■</b>  售后服务 <?php for($i=0;$i<$rank3;$i++){?><img src="<?php echo $this->img('onestar.gif');?>" align="absmiddle"/><?php } ?></td>
						  </tr>
						</table>
						</div>
						<div class="clear"></div>
				</div>
				
				<ul class="reviews">
					<li>
						<span>全部评论</span> <span class="num">(共 <font color="#CC0000"><?php echo !empty($rt['rank_count']['zcount']) ? $rt['rank_count']['zcount'] : 0;?></font> 评论)</span> 
					</li>
				</ul>
				
				<div class="GOODSCOMMENT">
				<?php $this->element('ajax_comment',array('rt'=>array('commentlist'=>$rt['commentlist'],'commentpage'=>$rt['commentpage'])));?>
				</div>
			</div>
		</div>
<script type="text/javascript">
 function show_hide(id){
	len = $('.goodsnav a').length;
	if(len>1){
		for(i=1;i<=len;i++){
			if(i==id) {
				$($('.goodsnav a')[i-1]).removeClass();
				$($('.goodsnav a')[i-1]).addClass('active');
				$(".goodsleft #tab"+id).css('display','block');
			}else{
				$($('.goodsnav a')[i-1]).removeClass();
				$($('.goodsnav a')[i-1]).attr('class',"other");
				$(".goodsleft #tab"+i).css('display','none');
			}
		}
	}
}
			
$('.pro_rank img').live('mouseover',function(){
len = $(this).attr('id');
	if(len>0){
		$('.pro_rank img').each(function(i){
			if(i<len){
				$(this).attr('src',SITE_URL+'theme/images/01.jpg');
			}else{
				$(this).attr('src',SITE_URL+'theme/images/02.jpg');
			}
		});
		$('.comment_con input[name="goods_rand"]').val(len);
	}
});
$('.sp_rank img').live('mouseover',function(){
len = $(this).attr('id');
	if(len>0){
		$('.sp_rank img').each(function(i){
			if(i<len){
				$(this).attr('src',SITE_URL+'theme/images/01.jpg');
			}else{
				$(this).attr('src',SITE_URL+'theme/images/02.jpg');
			}
		});
		$('input[name="shopping_rand"]').val(len);
	}
});
$('.sale_rank img').live('mouseover',function(){
len = $(this).attr('id');
	if(len>0){
		$('.sale_rank img').each(function(i){
			if(i<len){
				$(this).attr('src',SITE_URL+'theme/images/01.jpg');
			}else{
				$(this).attr('src',SITE_URL+'theme/images/02.jpg');
			}
		});
		$('input[name="saleafter_rand"]').val(len);
	}
});


</script>
		<div class="goodsright">
			<h1><?php echo $rt['goodsinfo']['goods_name'];?></h1>
			<p class="p-sku">商品编号：<span><?php echo $rt['goodsinfo']['goods_bianhao'];?></span></p>
			<div class="p-price">
				<p class="yt-price">
					宝泰价：
					<span class="yt-num">￥<?php echo $p2 = format_price($rt['goodsinfo']['pifa_price']);?></span>
						<?php  $p1 = format_price($rt['goodsinfo']['shop_price']);?>
						<em class="yt-dis"><i><?php echo (@format_price($p2/$p1))*10;?></i>折</em>
				</p>
				
				<p class="mk-price">
						参考价：<span class="mk-num"><del>￥<?php echo $p1;?></del></span>
				</p>
				<?php if($rt['goodsinfo']['is_promote']=='1' && $rt['goodsinfo']['promote_end_date'] > mktime()){?>
			 	<p class="cuxiaop">促销价：
				<span>￥<?php echo $p4 = $rt['goodsinfo']['promote_price']?></span>&nbsp;&nbsp;<b id="lefttime_2" style="font-size:16px">--:--:--</b>
				</p>
				<?php } ?>
			</div>
			<p class="p-sku">库&nbsp;&nbsp;&nbsp;存：<u><?php echo $rt['goodsinfo']['goods_number'] ? '有货':'缺货';?> </u></p>
			 <div class="buyclass">
			  	<form id="ECS_FORMBUY" name="ECS_FORMBUY" method="post" action="">
					  <?php
					  if(!empty($rt['spec'])){
							echo '<p style="height:30px; line-height:30px;">请选择：<strong style="color:#999">';
							 foreach($rt['spec'] as $row){
									if(empty($row)||!is_array($row) || $row[0]['is_show_cart']==0) continue;
									$rl[$row[0]['attr_keys']] = $row[0]['attr_name'];
									$attr[$row[0]['attr_keys']] = $row[0]['attr_is_select'];
							}
							if(!empty($rl))  echo implode('、',$rl);
					   ?>
					  </strong>
					  </p>
					  <?php
					   } //end if
							if(!empty($rt['spec'])){
							foreach($rt['spec'] as $row){
							if(empty($row)||!is_array($row) || $row[0]['is_show_cart']==0) continue;

					  ?>
  <?php if(!empty($row[0]['attr_name'])){?>
					  <p class="spec_p"><span><?php  echo $row[0]['attr_name'].":";?></span>
							  <?php
							  if($row[0]['attr_is_select']==3){ //复选
									 foreach($row as $rows){
													$st .= '<label><input type="checkbox" name="'.$row[0]['attr_keys'].'" id="quanxuan" value="'.$rows['attr_value'].'" />&nbsp;'.$rows['attr_value']."</label>\n";
									  }
									  echo $st .='<label class="quxuanall" id="ALL" style="border:1px solid #ADADAD; background-color:#E1E5E6; padding-left:3px; height:18px; line-height:18px;padding:2px;">全选</label>';
							  }else{
									  echo '<input type="hidden" name="'.$row[0]['attr_keys'].'" value="" />'."\n";
									  foreach($row as $rows){
											if(!empty($rows['attr_addi']) && @is_file(SYS_PATH.$rows['attr_addi'])){//如果是图片
												echo '<a lang="'.trim($rows['attr_addi']).'" href="javascript:;" name="'.$row[0]['attr_keys'].'" id="'.trim($rows['attr_value']).'"><img src="'.(empty($rows['attr_addi']) ? 'theme/images/grey.png':$rows['attr_addi']).'" alt="'.$rows['attr_value'].'" title="'.$rows['attr_value'].'" width="40" height="50" /></a>';
											}else{
												echo '<a lang="'.trim($rows['attr_addi']).'" href="javascript:;" name="'.$row[0]['attr_keys'].'" id="'.trim($rows['attr_value']).'">'.$rows['attr_value'].'</a>';
											}
									  }
							  } //end if
							?>
							
					  </p><?php } ?><div class="clear"></div>
									<?php } // end foreach
									
					  } //end if?>
<div class="clear"></div>
					  <p>购买数量 <input type="text" name="number" size="5" value="1"/> 件 <u>库存 <?php echo $rt['goodsinfo']['goods_number']; ?> 件</u></p>
					  <input type="hidden" name="price" id="btprice" value="0" />
					  <p>
					    <img src="<?php echo $this->img('addcart.jpg');?>" width="133" height="38" onclick="return addToCart('<?php echo $rt['goodsinfo']['goods_id'];?>')" style="cursor:pointer"/> &nbsp;&nbsp;  
						<img src="<?php echo $this->img('addcoll.png');?>"  onclick="return addToColl('<?php echo $rt['goodsinfo']['goods_id'];?>')" style="cursor:pointer"/>
					  </p>
				</form>
				<div style="padding-top:10px">
						 <!-- JiaThis Button BEGIN -->
					  <div style="width:230px;">
						<div id="ckepop">
							<span class="jiathis_txt">分享到：</span>
							<a class="jiathis_button_qzone"></a>
							<a class="jiathis_button_tsina"></a>
							<a class="jiathis_button_tqq"></a>
							<a class="jiathis_button_renren"></a>
							<a class="jiathis_button_kaixin001"></a>
							<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
							<a class="jiathis_counter_style"></a>
						</div>
						</div>
						<!-- JiaThis Button END -->

				</div>
			 </div>
		</div>
		<div class="clear"></div>
		<div class="mainbottombg"><span>推荐产品</span></div>
		<div class="relategoods">
		
			<ul>
			<?php if(!empty($rt['relategoods']))foreach($rt['relategoods'] as $k=>$row){ if($k>5) break;?>
			<li>
			<div class="imgbox">
			<a href="<?php echo SITE_URL;?>product.php?id=<?php echo $row['goods_id'];?>"><img src="<?php echo $row['goods_thumb'];?>" alt="<?php echo $row['goods_name'];?>" width="150" onload="loadimg(this,150,180)" title="<?php echo $row['goods_name'];?>"></a>
			</div>
			<p class="fname"><a href="<?php echo SITE_URL;?>product.php?id=<?php echo $row['goods_id'];?>"><?php echo $row['goods_name'];?></a></p>
			<p class="price"><b>￥<?php echo $row['pifa_price'];?></b><del>￥<?php echo $row['shop_price'];?></del></p>
			</li>
			<?php } ?>
			<div class="clear"></div>
			</ul>
		</div>
		
		<div class="mainbottombg"><span>产品详情</span></div>
		<div style="padding:10px; text-align:center">
		<?php echo $rt['goodsinfo']['goods_desc'];?>
		</div>
		
	</div>
</div>
<script type="text/javascript">
$('input[name="number"]').change(function(){
	vall = $(this).val();
	if(!(vall>0)){
		$(this).val('1');
	}
});

$('.buyclass .spec_p a').click(function(){
	na = $(this).attr('name');
	vl = $(this).attr('id');
	$('.buyclass input[name="'+na+'"]').val(vl);
	
	$(this).parent().find('a').each(function(i){
	   this.style.border='1px solid #cbcbcb';
	});
	
	$(this).css('border','1px solid #FF0000');
	
	var src = $(this).find('img').attr('src');
	if(typeof(src)!='undefined' && src!=""){
		$('.jqzoom').attr('href',src);
		$('.jqzoom img').attr('src',src);
		$('.jqzoom img').attr('jqimg',src);
	}
	
	price = $(this).attr('lang');
	if(price>0){
		$('.yt-num').html('￥'+price);
		$('#btprice').val(price);
	}
	return false;
});

			
function checkcartattr(){
	<?php 
	if(!empty($rl)){
		foreach($rl as $k=>$v){?>
		a<?php echo $k;?> = $('.buyclass input[name="<?php echo $k;?>"]<?php echo $attr[$k]==3 ? ':checked' : "";?>').val();
		if(a<?php echo $k;?> ==""||typeof(a<?php echo $k;?>)=='undefined'){
		  alert("必须选择<?php echo $v;?>");
		  return false;
		}
	<?php } }?>
	return true;
}


var dt = '<?php echo $rt['goodsinfo']['is_promote']&&$rt['goodsinfo']['promote_start_date']<mktime() ? ($rt['goodsinfo']['promote_end_date']-mktime()) : ($rt['goodsinfo']['promote_end_date']-$rt['goodsinfo']['promote_start_date']);?>';
var st = new showTime('2', dt);  
st.desc = "促销结束";
st.preg = "倒计时	{a}天	{b}:{c}:{d}";
st.setid = "lefttime_";
st.setTimeShow(); 
</script>

<script type="text/javascript" src="http://v2.jiathis.com/code/jia.js" charset="utf-8"></script>

