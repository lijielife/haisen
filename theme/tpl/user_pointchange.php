<div id="wrap">
	<div class="clear7"></div>
    	<?php $this->element('user_menu');?>
 <div class="m_right" >
 	 <h2 class="con_title">我的积分</h2>
     <div class="USERPOINTS jf">
      <?php $this->element('ajax_user_pointchange',array('rt'=>$rt));?>
      </div>
  </div>
<?php
	$thisurl = SITE_URL.'user.php';
?>
  <script type="text/javascript" language="javascript">
  function get_userpoint_page_list(page){
  		createwindow();
		$.get('<?php echo $thisurl;?>',{act:'pointinfo',page:page,type:'ajax'},function(data){
			removewindow();
			if(data !="" && typeof(data)!='undefined'){
				$('.USERPOINTS').html(data);
			}
		});
  }
  
  </script>
    <div class="clear"></div>
  </div>
  <div class="clear7"></div>