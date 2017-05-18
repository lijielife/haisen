<div  id="wrap"  onload="ResumeError()">   <!---- look添加  onload="ResumeError() 于 common.js  ------->
<!--[if !IE]> top  <![endif]-->
	<div class="wrap_top">
	<!--[if !IE]> top left <![endif]-->
		<div class="wrap_top_left">
		<!--[if !IE]> top menu <![endif]-->
			<div style="width:184px;height:497px; background-color:none; padding:7px;border:2px solid #FFF; border-top:none; overflow:auto;"></div>
			<div class="clear7"></div>
		<!--[if !IE]> top menu <![endif]-->
			<style type="text/css">
			.slogens_tab .active{ border-bottom:none}
			.slogens_tab .other{ border-bottom:1px solid #ededed}
			</style>
			<script language="javascript" type="text/javascript">
			function show_hide_tag(id){
				len = $('#slogens .slogens_tab a').length;
				if(len>1){
					$("#slogens .router_box").css('display','none');
					for(i=1;i<=len;i++){
						if(i==id) {
							$($('#slogens .slogens_tab a')[i-1]).removeClass();
							$($('#slogens .slogens_tab a')[i-1]).addClass('active');
							$($('#slogens .slogens_tab span')[i-1]).css("display","none");
							$("#slogens #tabtab"+id).css('display','block');
						}else{
							$($('#slogens .slogens_tab a')[i-1]).removeClass();
							$($('#slogens .slogens_tab a')[i-1]).attr('class',"other");
							$($('#slogens .slogens_tab span')[i-1]).css("display","block");
							$("#slogens #tabtab"+i).css('display','none');
						}
					}
				}
			}
			function router_box_show(){
				len = $('#slogens .slogens_tab a').length;
				if(len>1){
					for(i=1;i<=len;i++){
						$("#slogens #tabtab"+i).css('display','none');
					}
				}
				$("#slogens .router_box").css('display','block');
			}
			</script>
			<!--[if !IE]> top left new goods <![endif]-->
			<div id="slogens">
				<div class="slogens_tab">
				<a href="javascript:;" onmouseover="show_hide_tag('1'); return false;" onmouseout="router_box_show()" style=" border-right:1px solid #ededed" id="tab1" class="active"><b></b><span>货到付款</span></a>
				<a href="javascript:;" onmouseover="show_hide_tag('2'); return false;" onmouseout="router_box_show()" style="border-right:1px solid #ededed;" id="tab2" class="other"><b></b><span>免运费</span></a>
				<a href="javascript:;" onmouseover="show_hide_tag('3'); return false;" onmouseout="router_box_show()" id="tab3" class="other"><b></b><span>售后服务</span></a>
				</div>
				<div class="tab_list" id="tabtab1" style="display:none">
				货到付款详情介绍
				</div>
				<div class="tab_list" id="tabtab2" style="display:none">
				免运费详情介绍
				</div>
				<div class="tab_list" id="tabtab3" style="display:none">
				售后服务详情介绍
				</div>
				<div class="router_box">
				<a href="#" class="a1">产品筛选</a>
				<a href="#" class="a2">精品商城</a>
				<a href="#" class="a3">发布商品</a>
				</div>
			</div>
			<!--[if !IE]> top left new goods <![endif]-->
			</div>
		<!--[if !IE]> top left <![endif]-->
		<!--[if !IE]> top center <![endif]-->
			<div class="wrap_top_center">
				<!--[if !IE]>  banner <![endif]-->
				<div class="wrap_top_ads">
				<?php $this->element("banner");?>
				</div>
			   <!--[if !IE]>  banner <![endif]-->
			   <!--[if !IE]> 促销精选 <![endif]-->
				<div class="wrap_top_promotion">
					<h2 class="f12"><span><a href="<?php echo SITE_URL.'catalog.php?keyword='.'is_promote' ?>" >促销精选</a></span><b><a href="<?php echo SITE_URL.'catalog.php?keyword='.'is_promote' ?>"><img src="<?php echo $this->img('more.jpg');?>" align="absmiddle"/></a></b></h2>
					<ul class="wrap_top_promotion_box">
					<?php
					if(!empty($rt['promote'])){
					foreach($rt['promote'] as $row){
					?>
					<li class="goods_item">
					<a href="<?php echo $row['url'];?>" title="<?php echo $row['goods_name'];?>"><img src="<?php echo $row['goods_thumb'];?>" alt="<?php echo $row['goods_name'];?>" onload="if(this.width>this.height){this.width=135;}else{this.height=135;}"/>
					<span class="goods_name"><?php echo $row['goods_name'];?></span></a>
					<span class="goods_price"><del>¥<?php echo $row['shop_price'];?></del><strong>￥<?php echo $row['zprice'];?></strong></span>
					
<!---------------------------   look添加   开始      --------------------------------------------------------------------->
					<span class="goods_num">
					<img src="<?php echo SITE_URL.'theme/images/bnt_buy.gif'?>" onclick="return addToCart('<?php echo $row['goods_id'];?>','',this)" style="cursor:pointer; float:right"/>&nbsp;<input type="text"  id="<?php echo $row['goods_id'];?>" name="number" size="1" value="1"/> 件
					
					</span>
<!---------------------------   look添加   结束      --------------------------------------------------------------------->
					</li>
					
					<?php
					}
					}
					?>
					<div class="clear"></div>
					</ul>
				</div>
			   <!--[if !IE]> 促销精选 <![endif]-->
			   <!--[if !IE]> 新品推荐 <![endif]-->
				<div class="wrap_top_recommend_new">
					<h2 class="f12"><span><a href="<?php echo SITE_URL.'catalog.php?keyword='.'is_new' ?>" >新品推荐</a></span><b><a href="<?php echo SITE_URL.'catalog.php?keyword='.'is_new' ?>"><img src="<?php echo $this->img('more.jpg');?>" align="absmiddle"/></a></b></h2>
					<ul class="wrap_top_recommend_box">
					<?php
					if(!empty($rt['new_goods'])){
					foreach($rt['new_goods'] as $row){
					?>
					<li class="goods_item">
					<a href="<?php echo $row['url'];?>" title="<?php echo $row['goods_name'];?>"><img src="<?php echo $row['goods_thumb'];?>" alt="<?php echo $row['goods_name'];?>" onload="if(this.width>this.height){this.width=135;}else{this.height=135;}"/>
					<span class="goods_name"><?php echo $row['goods_name'];?></span></a>
					<span class="goods_price"><strong>￥
		<!--------------  look 修改 开始    ------------------------------------------------------------->			
					<?php 
					$rank = $this->Session->read('User.rank');
					if($rank == '10' || $rank == '11' || $rank =='12' )
						{
							echo ($row['zprice']>0)?$row['zprice'] : ($row['pifa_price']>0)?$row['pifa_price']:$row['shop_price'];
						}
					else{	
							echo ($row['zprice']>0)?$row['zprice'] : $row['shop_price'];
						}
					?>
		<!--------------  look 修改 结束    ------------------------------------------------------------->				
					</strong></span>
					<!---------------------------   look添加   开始------------------------------------------------------------------>
					<span class="goods_num">
					<img src="<?php echo SITE_URL.'theme/images/bnt_buy.gif'?>" onclick="return addToCart('<?php echo $row['goods_id'];?>','',this)" style="cursor:pointer; float:right"/>&nbsp;<input type="text" name="number" size="1" value="1"/> 件</span>
<!---------------------------   look添加   结束      --------------------------------------------------------------------->
					</li>
					<?php
					}
					}
					?>
					<div class="clear"></div>
					</ul>
				</div>
			 <!--[if !IE]> 新品推荐 <![endif]-->
			</div>
		<!--[if !IE]> top center <![endif]-->
<!--[if !IE]> 抢购倒计时 <![endif]-->
<script type="text/javascript" language="javascript">
function show_hide(id){
	len = $('.wrap_top_right_new .f12 a').length;
	if(len>1){
		for(i=1;i<=len;i++){
			if(i==id) {
				$($('.wrap_top_right_new .f12 a')[i-1]).removeClass();
				$($('.wrap_top_right_new .f12 a')[i-1]).addClass('active');
				$(".wrap_top_right_new #tab"+id).css('display','block');
			}else{
				$($('.wrap_top_right_new .f12 a')[i-1]).removeClass();
				$($('.wrap_top_right_new .f12 a')[i-1]).attr('class',"other");
				$(".wrap_top_right_new #tab"+i).css('display','none');
			}
		}
	}
}
</script>
		<!--[if !IE]> top right <![endif]-->
			<div class="wrap_top_right">
			<!--[if !IE]> login <![endif]-->
			<ul class="wrap_top_right_login">
			<li><a href="<?php echo get_url('免费注册',0,SITE_URL.'user.php?act=register','register',array('user','register'));?>">免费注册</a></li>
			<li><a href="<?php echo get_url('马上登录',0,SITE_URL.'user.php?act=login','login',array('user','login'));?>">马上登录</a></li>
			</ul>
			<div class="clear7"></div>
			<!--[if !IE]> login <![endif]-->
			<!--[if !IE]> 公告 新闻 <![endif]-->
			<div class="wrap_top_right_new">
				<h2 class="f12"><a class="active" href="javascript:;" onmouseover="show_hide('1'); return false;">公告</a><a href="javascript:;" class="other" onmouseover="show_hide('2'); return false;">新闻</a></h2>
				<ul id="tab1">
				<?php
				 if(!empty($rt['noticelist'])){
				 foreach($rt['noticelist'] as $row){
				 ?>
				<li><a href="<?php echo $row['url'];?>" target="_blank"><?php echo $row['article_title'];?></a></li>
				<?php }} ?>
				<li><a href="<?php echo SITE_URL;?>notice/" style="float:right">更多</a><div class="clear"></div></li>
				</ul>
				
				<ul class="tab" id="tab2">
				<?php
				 if(!empty($rt['newlist'])){
				 foreach($rt['newlist'] as $row){
				 ?>
				<li><a href="<?php echo $row['url'];?>" target="_blank"><?php echo $row['article_title'];?></a></li>
				<?php }} ?>
				<li><a href="<?php echo SITE_URL;?>new/" style="float:right">更多</a><div class="clear"></div></li>
				</ul>
			</div>
			<!--[if !IE]> 公告 新闻 <![endif]-->
			<div class="clear7"></div>
			<!--[if !IE]> 抢购 <![endif]-->
			<div class="wrap_top_right_qg">
				<h2 class="f12"><a href="<?php echo SITE_URL.'catalog.php?keyword='.'is_qianggou' ?>">抢购</a></h2>
				<?php if(isset($rt['qianggou_goods'][0]) && !empty($rt['qianggou_goods'][0])){?>
				<a href="<?php echo $rt['qianggou_goods'][0]['url'];?>" target="_blank" title="<?php echo $rt['qianggou_goods'][0]['goods_name'];?>">
        		<img src="<?php echo $rt['qianggou_goods'][0]['goods_thumb'];?>" onload="if(this.width>this.height){this.width=150;}else{this.height=150;}"/>
       			</a>
				<p class="goods_font"><?php echo $rt['qianggou_goods'][0]['goods_name'];?></p>
				<p style="text-align:right; padding-right:5px"><a href="<?php echo $rt['qianggou_goods'][0]['url'];?>" target="_blank" title="<?php echo $rt['qianggou_goods'][0]['goods_name'];?>"><img src="<?php echo $this->img('panic.jpg');?>"/></a></p>
				<p class="goods_font x2"><b id="lefttime_1">--:--:--</b></p>
				<?php } ?>
			</div>
			<script type="text/javascript" language="javascript">
			var dt = '<?php echo (isset($rt['qianggou_goods'][0]) && !empty($rt['qianggou_goods'][0]))? (intval($rt['qianggou_goods'][0]['qianggou_end_date'])-mktime()) : 0;?>';
			var st = new showTime('1', dt);  
			st.desc = "抢购结束";
			st.preg = "倒计时	{a}天	{b}:{c}:{d}";
			st.setid = "lefttime_";
			st.setTimeShow(); 
			</script>
			<!--[if !IE]> 抢购 <![endif]-->
			<div class="clear7"></div>
			<!--[if !IE]> 专业专区 <![endif]-->
			<div class="wrap_top_right_pages">
			<?php  $ad3 = $this->action('banner','banner','首页右则'); if(!empty($ad3)){?>
			<a href="<?php echo $ad3['ad_url'];?>"><img src="<?php echo $ad3['ad_img'];?>" alt="<?php echo $ad3['ad_name'];?>" onload="if(this.width>this.height){this.width=180;}else{this.height=180;}"/></a><?php } ?>
			</div>
			<!--[if !IE]> 专业专区 <![endif]-->
			</div>
		<!--[if !IE]> top right <![endif]-->
		<div class="clear"></div>
	</div>
	<!--[if !IE]> top <![endif]-->
	<div class="clear"></div>

	<!--[if !IE]> index ad 1 <![endif]-->
	<div id="ads_index_1">
	<?php  $ad1 = $this->action('banner','banner','首页中部1'); if(!empty($ad1)){?>
	<a href="<?php echo $ad1['ad_url'];?>"><img src="<?php echo $ad1['ad_img'];?>" alt="<?php echo $ad1['ad_name'];?>" width="1000"/></a><?php } ?>
	</div>
	<!--[if !IE]> index ad 1 <![endif]-->
	
	<!--[if !IE]> tag <![endif]-->
	<div class="wrap-hot-product">
			<div class="new-product-box">
				<h2 class="f12"><span><a href="<?php echo SITE_URL.'catalog.php?keyword=' ?>" style="float:left; ">最新供求</a></span><?php if(!empty($rt['sub_cate'])){ foreach($rt['sub_cate'] as $row){ echo "<a href='".$row['url']."'>".$row['cat_name']."</a>";}}?></h2>
				<ul class="new-product-box-product">
				<?php if(!empty($rt['bestnew_goods'])){ foreach($rt['bestnew_goods'] as $row){?>
					<li class="goods_item">
					<a href="<?php echo $row['url'];?>" title="<?php echo $row['goods_name'];?>"><img src="<?php echo !empty($row['goods_thumb']) ? SITE_URL.$row['goods_thumb'] : $this->img('no_picture.gif');?>" alt="<?php echo $row['goods_name'];?>" onload="if(this.width>this.height){this.width=135;}else{this.height=135;}"/>
					<span class="goods_name"><?php echo $row['goods_name'];?></span></a>
					<span class="goods_price"><strong>￥<?php echo $row['zprice'];?></strong></span>
<!---------------------------   look添加   开始----------------------------------------------------------->
					<span class="goods_num">
					<img src="<?php echo SITE_URL.'theme/images/bnt_buy.gif'?>" onclick="return addToCart('<?php echo $row['goods_id'];?>','',this)" style="cursor:pointer; float:right"/>&nbsp;<input type="text" name="number" size="1" value="1"/> 件</span>
<!---------------------------   look添加   结束      ----------------------------------------------------->
					</li>
				<?php }} ?>
					<div class="clear"></div>
				</ul>
			</div>
			<ul class="new-product-right">
				<h2 class="f12">专业导购</h2>
			<?php if(!empty($rt['best_goods'])){ foreach($rt['best_goods'] as $row){?>	
				<li><a href="<?php echo $row['url'];?>" title="<?php echo $row['goods_name'];?>"><?php echo $row['goods_name'];?></a></li>
			<?php }} ?>
			</ul>
			<div class="clear"></div>
	</div>
	<!--[if !IE]> tag <![endif]-->

	<div class="clear"></div>
	<!--[if !IE]> index ad 2 <![endif]-->
	<div id="ads_index_1">
	<?php  $ad2 = $this->action('banner','banner','首页中部2'); if(!empty($ad2)){?>
	<a href="<?php echo $ad2['ad_url'];?>"><img src="<?php echo $ad2['ad_img'];?>" alt="<?php echo $ad2['ad_name'];?>" width="1000"/></a><?php } ?>
	</div>
	<!--[if !IE]> index ad 2 <![endif]-->

	<!--[if !IE]> index center <![endif]-->
	<div class="wrap_center">
		<ul class="wrap_center_left">
			<h2 class="f12">热销排行</h2>
			<?php if(!empty($rt['top10'])){ foreach($rt['top10'] as $k=>$row){?>
			<?php if($k<3){?>
			<li><span class="a1"><?php echo ++$k;?></span><a href="<?php echo $row['url'];?>" title="<?php echo $row['goods_name'];?>"><?php echo $row['goods_name'];?></a></li>
			<?php }else{?>
			<li><span class="a2"><?php echo ++$k;?></span><a href="<?php echo $row['url'];?>" title="<?php echo $row['goods_name'];?>"><?php echo $row['goods_name'];?></a></li>
			<?php }}}?>
		</ul>
		<ul class="wrap_center_brand">
			<h2 style=" font-size:14px"><a href="<?php echo SITE_URL.'brand.php'?>">热门品牌</a><b style="float:right;font-size:10px;"><a href="<?php echo SITE_URL.'brand.php'?>" style="color:#C50000; font-weight:400">查看更多</a></b></h2>
			<?php if(!empty($rt['brandlist'])){ foreach($rt['brandlist'] as $row){?>
			<li><a href="<?php echo $row['url'];?>" title="<?php echo $row['brand_name'];?>"><img src="<?php echo $row['brand_logo'];?>" width="120" height="62"/></a></li>
			<?php }}?>
			<div class="clear"></div>
		</ul>
		<ul class="wrap_center_right">
			<h2 class="f12">热门标签</h2>
			<?php if(!empty($rt['tag'])){ foreach($rt['tag'] as $row){?>
			<li><a href="<?php echo SITE_URL;?>catalog.php?keyword=<?php echo trim($row['keyword']);?>" title="<?php echo trim($row['keyword']);?>"><?php echo trim($row['keyword']);?></a></li>
			<?php }} ?>
			<div class="clear"></div>
		</ul>
		<div class="clear"></div>
	</div>
	<!--[if !IE]> index center <![endif]-->

	<!--[if !IE]> 也许你会喜欢 <![endif]-->
	<div class="migth_like_goods">
		<h2>你可能感兴趣</h2>
		<ul>
		<?php if(!empty($rt['hot_goods'])){ foreach($rt['hot_goods'] as $row){?>
		<li>
		<a href="<?php echo $row['url'];?>" title="<?php echo $row['goods_name'];?>">
		<img src="<?php echo $row['goods_thumb'];?>" alt="<?php echo $row['goods_name'];?>" onload="if(this.width>this.height){this.width=126;}else{this.height=126;}"/>
		<span class="like_font"><?php echo $row['goods_name'];?></span>
		</a>
		</li>
		<?php }} ?>
		<div class="clear"></div>
		</ul>
	</div>
	<!--[if !IE]> 也许你会喜欢 <![endif]-->
</div>
<script language="javascript" type="text/javascript">
//限制价格只能输入数字
$('input[name="number"]').change(function(){
	vall = $(this).val();
	if(!(vall>0)){
		$(this).val('1');
	}
});
</script>