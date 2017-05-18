<div class="contentbox">
  <input type="button" class="clearcache" value="修复有风险请先备份数据库" />
</div>
<?php  $thisurl = ADMIN_URL.'user.php'; ?>
<script type="text/javascript">
	$('.clearcache').click(function (){
		createwindow();
		$.post('<?php echo $thisurl;?>',{action:'ajax_user_repair'},function(data){
				removewindow();
				alert(data);
		});
	});
	
/* 	$('.testfearch').click(function (){
		$.post('<?php echo $thisurl;?>',{action:'testfearch'},function(data){
				alert(data);
		});
	}); */
</script>
