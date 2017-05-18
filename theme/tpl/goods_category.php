<div class="maincon">
	<div class="mainconbox">
		<div class="mainconboxtop">
			<div class="mainconboxtopbox">
			<h1>
			<?php echo $rt['hear'];?>
			</h1>
			<div class="cat_list_all">
				<dl>
					<dt>类别：</dt>
					<dd>
						<div class="dd_con">
						<p class="p2">
						<a href="javascript:;" class="selectgoods<?php echo $rt['thiscid']=='0' ? ' ac' : '';?>" id="0" name="goods">不限</a>
						<?php if(!empty($rt['menu_show']))foreach($rt['menu_show'] as $row){
								echo '<a href="javascript:;" class="selectgoods'.($rt['thiscid']==$row['id'] ? ' ac':'').'" name="goods"'.(isset($_GET['cid'])&&$_GET['cid']==$row['id']?' style="color:#88071B"':'').' id="'.$row['id'].'">'.$row['name'].'</a>';
						
/*								if(!empty($row['cat_id'])){
									echo '<p class="p2">';
									foreach($row['cat_id'] as $rows){
									echo '<a href="javascript:;" class="selectgoods" name="goods"'.(isset($_GET['cid'])&&$_GET['cid']==$rows['id']?' style="color:#88071B"':'').' id="'.$rows['id'].'">'.$rows['name'].'</a>';
									}
									echo '</p>';
								}*/
						 } ?>
						 </p>
						</div>
					</dd>
				   <div class="clear"></div>
				 </dl>
				 <dl>
					<dt>品牌：</dt>
					<dd>
						<div class="dd_con">
						<a href="javascript:;" class="selectgoods<?php echo $rt['thisbid']=='0' ? ' ac' : '';?>" name="brand" id="0">不限</a>
						<?php if(!empty($rt['brandlist'])){ foreach($rt['brandlist'] as $row){?>
						<a href="javascript:;" class="selectgoods<?php echo $rt['thisbid']==$row['brand_id'] ? ' ac':'';?>" name="brand" id="<?php echo $row['brand_id'];?>"><?php echo $row['brand_name'];?></a>
						<?php } } ?>
						</div>
					</dd>
					<div class="clear"></div>
				 
				 </dl>
		 <?php
		  if(!empty($rt['attr'])){
			  $k=0;
			  foreach($rt['attr'] as $row){
			  $k++;
		   ?>
				 <dl>
					<dt><?php echo $row[0]['attr_name'];?>：</dt>
					<dd>
						<div class="dd_con">
							<a href="javascript:;" class="selectgoods ac" id="0" name="attr" lang="<?php echo ($k-1);?>">不限</a>
						 <?php 
						  foreach($row as $rows){
							  echo '<a href="javascript:;" class="selectgoods" id="'.$rows['attr_value'].'" name="attr" lang="'.($k-1).'">'.$rows['attr_value'].'</a>';
						  }
						  ?>
						</div>
					</dd>
					 <div class="clear"></div>
				 </dl>	
			<?php } } ?>	 
			 </div>								  
			</div>				 
		</div>
		
		<div class="mainconboxtcenter">
			<div class="AJAX-PRODUCT-CONNENT">
				<?php $this->element('ajax_goods_connent',array('rt'=>$rt));?>
			</div>
		</div>
		
	</div>
</div>

<script language="javascript" type="text/javascript">
function clearstyle(ty){
	$.cookie('THISORDER',ty);
}

function setshowtype(type){
	if(type==""||typeof(type)=="undefined") var type="list";
	$.cookie('DISPLAY_TYPE',type);
	window.location.reload();
	return false;
}
function setshowlimit(obj){
	$.cookie('DISPLAY_LIMIT',$(obj).val());
	window.location.reload();
	return false;
}
</script>
<script language="javascript" type="text/javascript">
	var arrt = new Array();
	<?php
	  $k=0;
	  if(!empty($rt['attr']))foreach($rt['attr'] as $row){
		  $k++;
	 ?>
	arrt[<?php echo $k-1;?>] = 0;
	<?php }?>		   
	var price = '';
	var cid = <?php echo $rt['cateinfo']['cat_id']>0?$rt['cateinfo']['cat_id']:0;?>;
	var bid = 0;
   
   
   function ajax_price_search(){
   		minprices = $('input[name="minprice"]').val();
		maxprices = $('input[name="maxprice"]').val();
		//minprice = $('#minprice').val();
		//maxprice = $('#maxprice').val();
		minprices=minprices.replace('￥','');
		maxprices=maxprices.replace('￥','');
		if(!(minprices>0)){ 
			return false;
		}
		if(!(maxprices>0)){
			return false;
		}
		
		price = minprices+'-'+maxprices;
		arrt_s = arrt.join("|");
		createwindow();
   		$.post(SITE_URL+'ajaxfile/ajax.php',{func:'catalog',type:'ajax_select_goods',cid:cid,bid:bid,price:price,attr:arrt_s},function(data){ 
			removewindow();
			if(data !=""){ 
				$('.AJAX-PRODUCT-CONNENT').html(data);
			}
		});
		return false;
		
   }
   
   $('.selectgoods').click(function(){	
		key = $(this).attr('name');
		ids = $(this).attr('id');
		if(key=='price'){
			price = ids;
		}else if(key=='goods'){
			cid = ids;
		}else if(key=='brand'){
			bid = ids;
		}else if(key=='attr'){
			la = $(this).attr('lang');
			arrt[la] = ids;
		}

		arrt_s = arrt.join("|");
		
		$(this).parent().parent().find('a').removeClass("ac");
		$(this).addClass("ac");
			
		createwindow();
   		$.post(SITE_URL+'ajaxfile/ajax.php',{func:'catalog',type:'ajax_select_goods',cid:cid,bid:bid,price:price,attr:arrt_s},function(data){ 
			removewindow();
			if(data !=""){ 
				$('.AJAX-PRODUCT-CONNENT').html(data);
			}
		});
		return false;
   });
   
   function clearcid(){
   		cid = 0;
   }
   function clearbid(){
   		bid = 0;
   }

</script>
<style type="text/css">
<!--
.footer{ background-color:#EFE9DD}
-->
</style>