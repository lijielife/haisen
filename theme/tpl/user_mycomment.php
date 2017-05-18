<div id="wrap">
	<div class="clear7"></div>
    <?php $this->element('user_menu');?>
    <div class="m_right" >
	 <style>
  .mespage{ height:25px; padding-left:65px;}
  .mespage a{margin-right:5px; color:#FFFFFF; background-color:#F9C0D9; text-decoration:none; float:left; display:inherit; width:60px; text-align:center; height:18px; padding-top:3px}
  .mespage a:hover{ text-decoration:underline}
  .shequ .huifu a{ color:#666; text-decoration:none}
  .shequ .huifu a:hover{ color:#222; text-decoration:underline}
  </style>
    	<div class="shequ">
			<div class="gehang"></div>  
			<h1 class="nav">您好,以下是您的所有商品的评论</h1>
           <table border="0" cellpadding="0" cellspacing="0" id="COMMENTLIST">
		  <?php $this->element('ajax_mycomment',array('rt'=>$rt));?>
		   </table>
        </div>
		
     </div>
    <div class="clear"></div>
  </div>
<div class="clear7"></div>