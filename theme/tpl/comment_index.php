    <!--ban-->
	 <?php 
	 $this->element('banner',array('index_quanzhan'=>$rt['quanzhan'])); 
	 ?>
	<!--ban--> 
    <!--content-->
          <div class="content_goodlist">
           <!--left_cat-->
          <div class="goodsleft">
		   <!--TOP-->
             <div class="mid_m">
				<div class="xl_t"><p>热点评论</p></div>
				<?php if(!empty($rt['hotcommentgoods'])){?>
				<ul style="padding:5px; border:1px solid #ccc; border-bottom:none">
				<?php foreach($rt['hotcommentgoods'] as $row){?>
				<li>
				<P style="text-align:center;"><a href="<?php echo $row['url'];?>" title="<?php echo $row['goods_name'];?>"><img src="<?php echo $row['goods_thumb'];?>" width="145"/></a></P>
				<p style="height:24px; line-height:24px; text-align:center; overflow:hidden"><a href="<?php echo $row['url'];?>"><?php echo $row['goods_name'];?> </a></p>
				<p  style="height:20px; line-height:20px;"><span style="float:left" class="cr6">￥<?php echo $row['promote_price']>0 ? $row['promote_price'] : ($row['shop_price']>0 ? $row['shop_price'] : $row['market_price']);?></span><span style="float:right" class="cr6">评论数<?php echo $row['comment_count'];?>条</span></p>
				</li>
				<?php } ?>
				</ul>
				<?php } ?>
				<div class="xl_b"></div>
			  </div>
			<!--TOP-->
			<div class="gehang"></div>
             <div class="mid_m">
				<div class="xl_t"><p>商品销售排行</p></div>
				<div class="xl_m">
				<?php if(!empty($rt['top10'])){?>
					<ul>
					<?php foreach($rt['top10'] as $row){?>
						<li>
							<P style="margin-top:5px"><a href="<?php echo $row['url'];?>" title="<?php echo $row['goods_name'];?>"><img  src="<?php echo SITE_URL.$row['goods_thumb'];?>" width="145"/></a></P>
							<p style="height:48px; line-height:24px;"><a href="<?php echo $row['url'];?>"><?php echo $row['goods_name'];?> </a></p>
							<p  style="height:24px; line-height:24px;"><span style="float:left" class="cr6">￥<?php echo $row['promote_price']>0 ? $row['promote_price'] : ($row['shop_price']>0 ? $row['shop_price'] : $row['market_price']);?></span><span style="float:right" class="cr6">售出<?php echo $row['sale_count'];?>件/月</span></p>
						</li>
					<?php } ?>
						 <div class="clear"></div>
					</ul>
					<?php } ?>
				</div>
				<div class="xl_b"></div>
			  </div>
			</div> 
       <!--left_cat-->
                    
               <!--content_cen-->
                   <style>
				   .prolist_nav_t_l a{ color:#fff}
				   .prolist_nav_m a{color:#e05e7c;}
				   .thiscid{ background-color:#FFCC00; padding:2px;}
				   .COMMENTLIST .comment_box{height:130px; width:100%; margin-top:10px;border-bottom:1px dotted #ccc; text-align:center; position:relative}
				   .COMMENTLIST .comment_box .pimg{ position:absolute; left:0px; width:120px; height:130px; bottom:0px; text-align:center}
				   .COMMENTLIST .comment_box .pimg a{ display:block; width:100px; height:105px; overflow:hidden;border:1px solid #F8DCEA}
				   .COMMENTLIST .comment_box .pimg a:hover{border:1px solid #FF67A0}
				   .COMMENTLIST .comment_box .pcon{ position:absolute; right:0px; bottom:0px; width:420px; height:130px; overflow:hidden; text-align:left}
				   </style>
                    
              <!--content_right-->
             	  <div class="COMMENTLIST" style="width:560px; float:left; margin-left:10px">
				  <div style="height:35px; background-color:#ff67a0;font-size:20px; font-weight:bold; color:#fff; position:relative; margin-bottom:10px;"><span style="position:absolute; bottom:3px; left:5px;">商品评论中心</span></div>
               	<?php 
				if(!empty($rt['commentlist'])){
				?>
				<ul>
				<?php
					foreach($rt['commentlist'] as $row){
				?>
				<li class="comment_box">
				<p class="pimg"><a href="<?php echo $row['goodsurl'];?>" title="<?php echo $row['goods_name'];?>"><img  src="<?php echo SITE_URL.$row['goods_thumb'];?>" width="80"/></a></p>
				<p class="pcon">
				<a href="<?php echo $row['goodsurl'];?>"><?php echo $row['goods_name'];?></a><br /><br />
				<span><?php echo isset($row['nickname'])&&!empty($row['nickname']) ? $row['nickname'] : !empty($row['dbuname']) ? $row['dbuname'] : $row['user_name'];?></span>&nbsp;&nbsp;<img align="absmiddle" src="<?php echo $this->img('pl_xin'.$row['comment_rank'].'.png');?>"/>&nbsp;&nbsp;发表于&nbsp;&nbsp;<?php echo !empty($row['add_time']) ? date('Y-m-d H:i:s',$row['add_time']) : '无知';?><br /><br />
				<span><?php echo $row['content'];?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $row['goodsurl'];?>" style="color:#FF66FF">查看原文</a></span>
				</p>
				<span style="clear:both">&nbsp;</span>
				</li>
				<?php
					}
				?>
				</ul>
				<?php if(isset($rt['pagelink'])){?>
				<div class="gehang"></div>
				<style type="text/css">
				.commentpage a{ padding:3px; margin-right:4px;}
				</style>
				<p class="commentpage"><?php echo $rt['pagelink']['showmes'].$rt['pagelink']['first'].$rt['pagelink']['prev'].$rt['pagelink']['next'].$rt['pagelink']['Last'];?></p>
				<?php
					}
				}
				?>
				 <div class="clear"></div>
                  </div>
              <!--content_right-->
			  
			  <div class="comment_right" style="float:right; width:205px;border:1px solid #ccc; border-top:none;">
			   <div class="mid_m">
				<div class="xl_t"><p>推荐商品</p></div>
				 <?php
			   if(!empty($rt['tuijian'])){
			   foreach($rt['tuijian'] as $row){
			  ?>
				<dl style="text-align:center">
					<dd style="margin-top:5px"><a href="<?php echo $row['url'];?>"><img src="<?php echo $row['goods_thumb'];?>" width="132"/></a></dd>
					<dt><a href="<?php echo $row['url'];?>"><?php echo $row['goods_name'];?></a></dt>
					<dt style="border-bottom:1px dotted #ccc"><span class="left cr6">￥<?php echo ($row['promote_price']>0) ? $row['promote_price'] : $row['shop_price'];?></span></dt>
				</dl>
			   <?php } }  ?>
				 <div class="clear"></div>   
			  </div>
			  </div>
                    
                <div class="clear"></div>   
         </div>
            <!--content-->
            <div class="clear"></div>
           <!--goodslist-->
           
           <!--goodslistend-->
           <!--pinglun-->
            <div class="gehang"></div>
	    <?php $this->element('help',array('help_article'=>$lang['help_article']));?>