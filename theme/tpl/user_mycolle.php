<style type="text/css">
  .pagein a{padding-left:0px; margin-right:5px; color:#fff; background-color:#b70000; text-decoration:none; float:left; display:inherit; width:50px; text-align:center; float:right}
  .pagein a:hover{ text-decoration:underline}
  .pagein a.pagelist{ width:30px}
  .MYCOLLE .mycaoodel a{ color:#666666; text-decoration:none;}
  .MYCOLLE .mycaoodel a:hover{ text-decoration:underline}
  </style>
<div id="wrap">
	<div class="clear7"></div>
    <?php $this->element('user_menu');?>
    <div class="m_right" >
		<h2 class="con_title">我的收藏</h2>
    	<div class="sc">
        <p><img src="<?php echo $this->img('sc_bannner.gif');?>"  width="731" height="27" alt="" /></p>
       	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="MYCOLLE">
 	    <?php echo $this->element('ajax_mycoll',array('rt'=>$rt));?>
		</table>
<script type="text/javascript">
//全选
 $('.m_right .quxuanall').click(function (){
      if(this.checked==true){
         $(".m_right input[name='quanxuan']").each(function(){this.checked=true;});
	  }else{
	     $(".m_right input[name='quanxuan']").each(function(){this.checked=false;});
	  }
  });
   
   function bath_delmycoll(){
   		if(confirm("确定删除吗？")){
			createwindow();
			var arr = [];
			$('.m_right input[name="quanxuan"]:checked').each(function(){
				arr.push($(this).val());
			});
			var str=arr.join('+'); ;
			$.post(SITE_URL+'user.php',{action:'delmycoll',ids:str},function(data){
				removewindow();
				if(data == ""){
					location.reload();
				}else{
					alert(data);
				}
			});
		}else{
			return false;
		}
   }
   
   function delmycoll(ids,obj){
		thisobj = $(obj).parent().parent().parent();
		if(confirm("确定删除吗？")){
			createwindow();
			$.post(SITE_URL+'user.php',{action:'delmycoll',ids:ids},function(data){
				removewindow();
				if(data == ""){
					thisobj.hide(300);
				}else{
					alert(data);	
				}
			});
		}else{
			return false;	
		}
   }
   </script>
      </div>
     </div>
    <div class="clear"></div>
  </div>
  <div class="clear7"></div>