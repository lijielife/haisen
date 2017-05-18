  <style type="text/css">
  .friendlinks{ height:300px; margin-top:10px}
  .friendlinks li{ float:left; margin-right:10px;}
  .friendlinks li p{ text-align:center; margin-top:5px;}
  </style>
     <!--ban-->
	 <?php 
	 $this->element('banner',array('index_quanzhan'=>$rt['quanzhan'])); 
	 ?>
	<!--ban--> 
  <div class="friendlinks">
		<?php 
		if(!empty($rt['link_list'])){
		echo "<ul class='friendlink'>";
			foreach($rt['link_list'] as $row){
				echo '<li><a href="'.$row['url'].'" title="'.$row['link_name'].'" rel="nofollow" target="_blank"><img src="'.SITE_URL.$row['link_logo'].'" alt="'.$row['link_name'].'"/><p>'.$row['link_name'].'</p></a></li>'."\n";
			}
		echo "</ul>";
		}
		?>
		<div style="clear:both"></div>
  </div>                                            
<div style="clear:both"></div>
 <?php $this->element('help',array('help_article'=>$lang['help_article']));?>