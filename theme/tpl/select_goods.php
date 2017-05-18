<style type="text/css">
  .pagein a{padding-left:0px; margin-right:5px; color:#fff; background-color:#b70000; text-decoration:none; float:left; display:inherit; width:50px; text-align:center; float:right}
  .pagein a:hover{ text-decoration:underline}
  .pagein a.pagelist{ width:30px}
  .MYCOLLE .mycaoodel a{ color:#666666; text-decoration:none;}
  .MYCOLLE .mycaoodel a:hover{ text-decoration:underline}
  .ul_select_goods p a,.ul_select_goods a{ padding:2px; margin-left:2px; margin-right:2px; background-color:#FAFAFA; border-bottom:1px solid #ccc; border-right:1px solid #ccc;}
   .ul_select_goods a.quanbu{background-color:#88071B; color:#FFF;}
  </style>
<div id="wrap">
	<div class="clear7"></div>
    <?php $this->element('user_menu');?>
    <div class="m_right">
		<h2 class="con_title">商品筛选</h2>
			<table class="ul_select_goods" width="100%" style="line-height:30px;">
				<tr><td width="70" align="right"><b>分类:&nbsp;&nbsp;</b></td><td align="left">
<?php 
			  if(!empty($rt['catelist'])){
				foreach($rt['catelist'] as $row){  
?>
<?php
					echo '<p><img src="'.SITE_URL.'theme/images/icon/plus.gif" align="absmiddle"/><a href="javascript:;" class="selectgoods quanbu" id="0" name="goods">全部</a><a href="javascript:;" class="selectgoods" name="goods" id="'.$row['id'].'">'.$row['name'].'</a>'."\n";
					if(!empty($row['cat_id'])){
						foreach($row['cat_id'] as $rows){
							echo '<a href="javascript:;" class="selectgoods" name="goods" id="'.$rows['id'].'">'.$rows['name'].'</a>';
						}
					}
					echo "\n".'</p>';
				}  
			   }
			 ?>
			  </td></tr>
			  <tr><td width="70" align="right"><b>品牌:&nbsp;&nbsp;</b></td><td align="left">
			  <a href="javascript:;" class="selectgoods quanbu" id="0" name="brand">全部</a>
			  <?php 
			  if(!empty($rt['brandlist'])){
				foreach($rt['brandlist'] as $row){  
						echo '<a href="javascript:;" class="selectgoods" name="brand" id="'.$row['brand_id'].'">'.$row['brand_name'].'</a>';
				}
			  }

			 ?>
			  </td></tr>
			  <?php
			  if(!empty($rt['attr'])){
				  $k=0;
				  foreach($rt['attr'] as $row){
					  $k++;
			   ?>
			  <tr><td width="70" align="right"><b><?php echo $row[0]['attr_name'];?>:&nbsp;&nbsp;</b></td><td align="left"><a href="javascript:;" class="selectgoods quanbu" id="0" name="attr" lang="<?php echo ($k-1);?>">全部</a>
			  <?php 
			  foreach($row as $rows){
				  echo '<a href="javascript:;" class="selectgoods" id="'.$rows['attr_value'].'" name="attr" lang="'.($k-1).'">'.$rows['attr_value'].'</a>';
			  }
			  ?>
			  </td></tr>
			  <?php }  } ?>
			  </table>
			   <input type="hidden" name="maxlength" id="maxlength" value="<?php echo !empty($rt['attr']) ? count($rt['attr']) : 0;?>" />
			  <style type="text/css">
			  .GOODSLIST li{ width:180px; height:330px; float:left; margin-right:4px; border:1px dotted #999999; margin-top:5px}
			  .GOODSLIST li span{ display:block; width:170px; text-align:center; line-height:12px; height:12px}
			  .GOODSLIST .ajax_page a{padding:2px; margin:2px;color:#333; font-size:12px;}
			  </style>
			<div class="GOODSLIST">
			<?php $this->element('ajax_user_goods_select',array('rt'=>$rt));?>
			</div>
			<div style="clear:both">&nbsp;</div>
     </div>
    <div class="clear"></div>
  </div>
  <div class="clear7"></div>
<script type="text/javascript">
$('.selectgoods').click(function(){
		
		key = $(this).attr('name');
		ids = $(this).attr('id');
		maxcount = $('#maxlength').val();

		if(key=='goods'){
			$.cookie('GZ_cid',ids);
		}else if(key=='brand'){
			$.cookie('GZ_bid',ids);
		}else if(key=='attr'){
			la = $(this).attr('lang');
			$.cookie('GZ_'+la,ids);
		}
		
		$(this).parent().find('a').css('background-color','#FAFAFA');
		$(this).parent().find('a').css('color','#222');
		$(this).css('background-color','#88071B');
		$(this).css('color','#FFF');
			
		createwindow();
   		$.post(SITE_URL+'delivery.php',{action:'getgoods',maxcount:maxcount},function(data){
			 removewindow();
			if(data !=""){
				$('.GOODSLIST').html(data);
			}
		});
		
   });
   
   function get_select_goods_page(page){
		maxcount = $('#maxlength').val();
		createwindow();
   		$.post(SITE_URL+'delivery.php',{action:'getgoods',maxcount:maxcount,page:page},function(data){
			removewindow();
			if(data !=""){
				$('.GOODSLIST').html(data);
			}
		});
   }
</script>