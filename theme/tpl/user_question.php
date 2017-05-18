<style type="text/css">
.shequ .tab{ display:none}

</style>
<script type="text/javascript">
function show_hide(id){
	len = $('.nav a').length;
	if(len>1){
		for(i=1;i<=len;i++){
			if(i==id) { 
				$($('.nav a')[i-1]).removeClass();
				$($('.nav a')[i-1]).addClass('active');
				$("#tab"+id).css('display','block');
			}else{
				$($('.nav a')[i-1]).removeClass();
				$($('.nav a')[i-1]).attr('class',"other");
				$("#tab"+i).css('display','none');
			}
		}
	}
}
function submit_message(){ 
	createwindow();
	var formObj      = document.forms['MESSAGES']; //表单
	var mesobj        = new Object();
	if(formObj){
		mesobj = getFromAttributes(formObj);
	}else{
		alert('不存在留言表单对象！');	
		return false;
	}
	
	$.ajax({
	   type: "POST",
	   url: SITE_URL+"user.php",
	   data: "action=feedback&message=" + $.toJSON(mesobj),
	   dataType: "json",
	   success: function(data){
	   		removewindow();
			if(data.error==0){
				if(typeof(data.message)!='undefined' && data.message !=""){
					$('.m_right #tab2').html(data.message);	
				}
			}else{
				JqueryDialog.Open('E姐商城提醒你','<br />'+data.message,260,50);
			}
	   } //end sucdess

	}); //end ajax
} // end function
		
</script>
  <style>
  .mespage{ height:25px; padding-left:65px;}
  .mespage a{margin-right:5px; color:#FFFFFF; background-color:#F9C0D9; text-decoration:none; float:left; display:inherit; width:55px; text-align:center; height:18px; padding-top:3px}
  .mespage a:hover{ text-decoration:underline}
  .shequ .huifu a{ color:#666; text-decoration:none}
  .shequ .huifu a:hover{ color:#222; text-decoration:underline}
  </style>
<div id="wrap">
	<div class="clear7"></div>
    <?php $this->element('user_menu');?>
    <div class="m_right">
    	<div class="shequ">
        	<h1 class="nav">您好,以下是您的发表话题. &nbsp;<b ><a class="active" onclick="show_hide('1'); return false;">查看我发表的问题</a></b> &nbsp;  <b><a class="other" onclick="show_hide('2'); return false;">我要提交问题</a></b> </h1>
			
			<div class="gehang"></div>  
           <table border="0" cellpadding="0" cellspacing="0" id="tab1" >
		  <?php $this->element('ajax_userquestion',array('rt'=>$rt));?>
		   </table>
		   <!--我要提问题-->
		   <table border="0" cellpadding="0" cellspacing="0" id="tab2" class="tab">
		<?php $this->element('ajax_userquestion_nogoods',array('rt'=>$rt));?>
		   </table>
        </div>
		 
     </div>
    <div class="clear"></div>
  </div>
  <div class="clear7"></div>
