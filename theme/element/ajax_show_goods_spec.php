<style type="text/css">
.ajaxshowgoodsspec p{ height:50px; line-height:50px;}
.ajaxshowgoodsspec p u{ color:#e80000}
.ajaxshowgoodsspec p.spec_p span{ float:left; margin-left:15px;}
.ajaxshowgoodsspec p.spec_p{height:30px; line-height:30px;}
.ajaxshowgoodsspec p.spec_p a{ display: block; float:left; height:15px; width:50px;color:#373832; background:#ededed; border:1px solid #cbcbcb;line-height:15px; margin-left:5px; text-align:center; text-indent:0px; margin-top:8px}
.ajaxshowgoodsspec p.spec_p a:hover{ border:1px solid #FF0000; text-decoration:none}
</style>
<div class="ajaxshowgoodsspec">
	<form id="ECS_FORMBUY" name="ECS_FORMBUY" method="post" action="">
	  <?php
		if(!empty($rt['spec'])){
				echo '<p style="height:30px; line-height:30px;">请选择：<strong style="color:#FF6600">';
				 foreach($rt['spec'] as $row){
					if(empty($row)||!is_array($row) || $row[0]['is_show_cart']==0) continue;
					$rl[$row[0]['attr_keys']] = $row[0]['attr_name'];
					$attr[$row[0]['attr_keys']] = $row[0]['attr_is_select'];
				}
				if(!empty($rl))  echo implode('、',$rl);
		}	
	   ?>
	  </strong>
	  </p>
	  <?php 
				if(!empty($rt['spec'])){
				foreach($rt['spec'] as $row){
				if(empty($row)||!is_array($row) || $row[0]['is_show_cart']==0) continue;
					
	  ?>
				
	  <p class="spec_p"><span><?php  echo $row[0]['attr_name'].":";?></span>
		  <?php
		  if($row[0]['attr_is_select']==3){ //复选
			 foreach($row as $rows){
					$st .= '<label><input type="checkbox" name="'.$row[0]['attr_keys'].'" id="quanxuan" value="'.$rows['attr_value'].'" />&nbsp;'.$rows['attr_value']."</label>\n";
			  }
			  echo $st .='<label class="quxuanall" id="ALL" style="border:1px solid #ADADAD; background-color:#E1E5E6; padding-left:3px; height:18px; line-height:18px;padding:2px;">所有</label>';
		  }else{
			  echo '<input type="hidden" name="'.$row[0]['attr_keys'].'" value="" />'."\n";
			  foreach($row as $rows){
					echo '<a href="javascript:;" name="'.$row[0]['attr_keys'].'" id="'.trim($rows['attr_value']).'" onclick="spec_p_a(this)">'.$rows['attr_value'].'</a>';
			  }
		  } //end if
	  ?>
	  </p>
			<?php } // end foreach
	  } //end if?>
	<p >
	<img src="<?php echo SITE_URL.'images/addcart.jpg';?>" width="133" height="38" onclick="return addToCart('<?php echo $rt['goodsinfo']['goods_id'];?>')" style="cursor:pointer"/>                      
	</p>
	</form>
</div>
<script type="text/javascript">
/*$('.spec_p a').click(function(){
	na = $(this).attr('name');
	vl = $(this).attr('id');
	$('.ajaxshowgoodsspec input[name="'+na+'"]').val(vl);
	
	$(this).parent().find('a').each(function(i){
	   this.style.border='1px solid #CCC';
	});
	
	$(this).css('border','1px solid #FF0000');
	return false;
});*/

function spec_p_a(obj){
	na = $(obj).attr('name');
	vl = $(obj).attr('id');
	//$('.ajaxshowgoodsspec input[name="'+na+'"]').val(vl);
	$(obj).parent().find('input[name="'+na+'"]').val(vl);
	$(obj).parent().find('a').each(function(i){
	   this.style.border='1px solid #CCC';
	});
	
	$(obj).css('border','1px solid #FF0000');
	return false;
}
</script>