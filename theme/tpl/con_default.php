    <!--ban-->
	 <?php 
	 $this->element('banner',array('index_quanzhan'=>$rt['quanzhan'])); 
	 ?>
	<!--ban--> 
  
  <!--content-->     
                 <div class="content">
                       <!--con_left-->
                       <div class="con_left">
                         <div class="left_one">
                            <h4 class="c_l_top">关于哈思<span>/About us</span></h4>
							<?php 
							if(!empty($rt['article_list'])){
							?>
                            <ul class="l_first">
							<?php 
							foreach($rt['article_list'] as $row){
							?>
                                 <li><a href="<?php echo $row['url'];?>"><?php echo $row['article_title'];?></a></li>
							<?php } ?>
                            </ul>
							<?php } ?>
                          </div>  
                          <div class="left_two">
							<?php
							$this->element('contact',array('custome_phone'=>$lang['custome_phone']));
							?>
                          </div>
                       </div>
                       <!--con_left end-->
                       <div class="con_right">
                              <p class="now_place">您当前所在的位置是：<?php echo isset($rt['here'])? $rt['here'] : $rts['here'];?></p>
                              <div class="ABOUTLIST about_c">
							<?php
							  $this->element('ajax_about_connent',array('rt'=>$rt));
							  ?>
                              </div>
                       
                       </div>
                       <div class="clear"></div>
                   </div> 
                  <!--content end-->
				  <?php  $thisurl = SITE_URL.'alticle.php'; ?> 
				  <script type="text/javascript">
				  function get_cateabout_page_list(page,cid){
				    createwindow();
				  	$.post('<?php echo $thisurl;?>',{action:'alticlelist',cid:cid,page:page,type:"about",list:'6'},function(data){
							if(data !=""){
							$('.ABOUTLIST').html(data);
							}
							removewindow();
					});
				  }
				  </script>
		 <?php $this->element('help',array('help_article'=>$lang['help_article']));?>