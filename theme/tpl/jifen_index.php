<script language="javascript" type="text/javascript">
            $(function() {
                $(".webwidget_scroller_tab").webwidget_scroller_tab({
                    scroller_time_interval: '60000',
                    scroller_window_padding: '10',
                    scroller_window_width: '739',
                    scroller_window_height: '1700',
                    scroller_head_text_color: '#545454',
                    scroller_head_current_text_color: '#ffffff',
                    directory: 'images'
                });
            });
        </script>
<div class="content">
  <div class="jf_content">
    <div class="jf_left"><?php if(!empty($rt['jifenbanner'])){?><a href="<?php echo $rt['jifenbanner']['ad_url'];?>" title="<?php echo $rt['jifenbanner']['ad_name'];?>"><img src="<?php echo $rt['jifenbanner']['ad_img'];?>"  width="738" height="242"/></a><?php } ?>
      <div class="webwidget_scroller_tab" id="webwidget_scroller_tab">
        <div class="tabContainer">
          <ul class="tabHead">
            <li class="currentBtn"><a href="javascript:;">获得积分</a></li>
            <li><a href="javascript:;">兑换方式</a></li>
            <li><a href="javascript:;">兑换礼品</a></li>
            <li><a href="javascript:;">我的积分</a></li>
          </ul>
        </div>
        <div class="tabBody">
          <ul>
            <li class="tabCot">
              <div class="gehang"></div>
              <div class="jflicon" >
			  <?php if(isset($rt['jifenart']['117'])){
				echo $rt['jifenart']['117']['content'];
			   } ?>
              </div>
            </li>
            <li class="tabCot">
            <div class="gehang"></div>
              <div class="jflicon" >
               <?php if(isset($rt['jifenart']['118'])){
				echo $rt['jifenart']['118']['content'];
			   } ?>
              </div>
            </li>
            <li class="tabCot">
              <div class="jflicon JIFENGOODS">
				<?php $this->element('ajax_jifen_goods',array('rt'=>$rt));?>
              </div>
            </li>
            <li class="tabCot">
             <div class="gehang"></div>
              <div class="jflicon" >
               	<?php if(isset($rt['jifenart']['117'])){
				echo $rt['jifenart']['117']['content'];
			   } ?>
              </div>
            </li>
          </ul>
          <div style="clear:both"></div>
        </div>
        <div class="modBottom"> <span class="modABL">&nbsp;</span><span class="modABR">&nbsp;</span> </div>
      </div>
    </div>
    <div class="jf_right">
  
    	<div class="jf_right_topbox">
        	<div class="box1"></div>
            <div class="box2">
            	<p class="weg">美之花积分</p>
				 <?php if(isset($rt['jifenart']['119'])){ ?>
				<p class="weg"><?php echo $rt['jifenart']['119']['article_title'];?></p>
                <p><?php echo $rt['jifenart']['119']['content'];?></p>
				 <?php } ?>
                <h2><a href="<?php echo SITE_URL;?>user.php?act=pointinfo">查看我的积分</a></h2>
            </div>
            <div class="box3"></div>
            <div class="clear"></div>
        </div>
        <div class="gehang"></div>
        <div class="weekprice">
          <div class="weekpricelist">
		  <?php
		   if(!empty($rt['tuijian'])){
		   foreach($rt['tuijian'] as $row){
		  ?>
        	<dl>
            	<dd><a href="<?php echo $row['url'];?>"><img src="<?php echo $row['goods_thumb'];?>" width="132"/></a></dd>
                <dt><a href="<?php echo $row['url'];?>"><?php echo $row['goods_name'];?></a></dt>
                <dt><span class="left cr6">¥<?php echo !empty($row['promote_price']) ? $row['promote_price'] : $row['shop_price'];?></span><span class="right cr6">售出<?php echo $row['sale_count'];?>件/月</span></dt>
            </dl>
           <?php } }  ?>
              <div class="clear"></div>
        </div>
        </div>
         <div class="gehang"></div>
		 <?php if(!empty($rt['jifenyoubanner'])){?><a href="<?php echo $rt['jifenyoubanner']['ad_url'];?>" title="<?php echo $rt['jifenyoubanner']['ad_name'];?>"><img src="<?php echo $rt['jifenyoubanner']['ad_img'];?>"  width="228" height="366"/></a><?php } ?>
    </div>
    
    <div class="clear"></div>
  </div>
</div>
<script type="text/javascript">
function get_jifen_page(page){ //积分商品分页
	createwindow();
	$.get('<?php echo SITE_URL."exchange/";?>'+page+"/",{type:'ajax'},function(data){
			removewindow();
			if(typeof(data)!='undefined' && data !=""){
				$('.jf_content .JIFENGOODS').html(data);	
			}
	})
}
</script>