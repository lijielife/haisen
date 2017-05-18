 <div class="artical_list_content">
			<div class="artical_list_content_left">
			 <?php if(!empty($rt['article_list'])){
			 foreach($rt['article_list'] as $key=>$row){
			 ?>
				  <div class="li_list">
					  <h4><?php echo $key;?></h4>
					  <ul>
					  <?php if(!empty($row)&&is_array($row)){
					  foreach($row as $rows){
					  ?>
						  <li><a href="<?php echo $rows['url'];?>" id="<?php echo $rows['article_id'];?>"><?php echo $rows['article_title'];?></a></li>
					  <?php } } ?>
					  </ul>
				  </div>
				<?php } } ?>
			 </div>
   			
			 <div class="artical_list_content_right">
				  <div class="artical_list_content_right_title"><p class="thishere">您当前所在的位置是：<?php echo isset($rt['here'])? $rt['here'] : $rts['here'];?>&nbsp;&gt;&nbsp;<?php echo $rt['article_con']['article_title'];?></p></div>
				  <div class="ARTICLECONNENT artical_list_content_right_con">
						<?php $this->element('ajax_article_connent',array('rt'=>$rt));?>
				  </div>
								   
			 </div>
			 
			 <div class="clear"></div>
   </div>
     <?php  $thisurl = SITE_URL.'ajaxfile/article.php'; ?> 
  <script type="text/javascript" language="javascript">
	$('.artical_list_content .li_list li a').click(function(){
		ids = $(this).attr('id');
		if(ids=="" || typeof(ids)=='undefined') return false;
		$('.artical_list_content .li_list li').removeClass('hover');
		$(this).parent().addClass('hover');
		createwindow();
		$.post('<?php echo $thisurl;?>',{action:'getarticle',article_id:ids},function(data){
			$('.ARTICLECONNENT').hide();
			 removewindow();
			if(data !="" && typeof(data)!="undefined"){
				$('.ARTICLECONNENT').html(data);
				$('.ARTICLECONNENT').fadeIn("slow");
			}
		});
		
		return false;
	});
</script>    
