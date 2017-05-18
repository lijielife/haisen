<div id="wrap">
	<div class="clear7"></div>
    	<?php $this->element('user_menu');?>
<div class="m_right">
		<h2 class="con_title">推荐好友</h2>
    	<div class="share" style="line-height:33px">
         	<p>推广信息：通过您的推广号或推广链接注册的新用户，都算是您的推广下线。</p>
            <h1>您的推广链接 &nbsp;<input name="tuijianlink" value="<?php echo SITE_URL.'m/?tid='.$rt['uid'];?>" type="text" style="width:400px" onclick="this.select()" readonly="" />
</h1>
<input type="button" value="复制上面链接发给朋友"  class="btu" onclick="copyUrl()"/>
<p>推广信息：通过您的推广号或推广链接注册的新用户，都算是您的推广下线。</p>
<p></p>
 <!-- JiaThis Button BEGIN -->
  <div style="width:230px;">
	<div id="ckepop">
		<span class="jiathis_txt">快乐分享：</span>
		<a class="jiathis_button_qzone"></a>
		<a class="jiathis_button_tsina"></a>
		<a class="jiathis_button_tqq"></a>
		<a class="jiathis_button_renren"></a>
		<a class="jiathis_button_kaixin001"></a>
		<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
		<a class="jiathis_counter_style"></a>
	</div>
	</div>
<!-- JiaThis Button END -->
         </div>
     </div>
<script language="javascript"> 
   function copyUrl()
   { 
    var clipBoardContent=this.location.href; 
    window.clipboardData.setData("Text",clipBoardContent); 
    alert("复制成功，请粘贴到你的QQ/MSN上推荐给你的好友!"); 
   } 
</script> 

    <div class="clear"></div>
  </div>
  <div class="clear7"></div>
  <script type="text/javascript" src="http://v2.jiathis.com/code/jia.js" charset="utf-8"></script>