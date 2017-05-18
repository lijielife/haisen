<div id="wrap">
	<div class="clear7"></div>
    	<?php $this->element('user_menu');?>
	<div class="m_right">
<style type="text/css">
.txt{ border:1px solid #ddd; height:22px; line-height:22px; width:280px; }
.pages a.on{ font-weight:bold; color:#CC0000}
.decolor,.decolor a{ color:#000000}
.accolor,.accolor a{ color:#999999}
</style>
		<h2 class="con_title">我的信箱</h2>
		<div class="MYINBOXS">
				<?php $this->element("ajax_myinbox_connent",array('rt'=>$rt));?>
		</div>	 
     </div>
    <div class="clear"></div>
</div>

<?php $thisurl = SITE_URL.'ajaxfile/ajax.php';?>
<script type="text/javascript">
function get_myinbox_page_list(page){
	createwindow();
	$.post('<?php echo $thisurl;?>',{type:'get_myinbox_page_list',func:'user',page:page},function(data){
		removewindow();
		if(data !="" && typeof(data) != 'undefined'){
			$('.MYINBOXS').html(data);
			removewindow();
		}
	});
}

 $('.quxuanall').click(function (){
      if(this.checked==true){
         $("input[name='quanxuan']").each(function(){this.checked=true;});
		 document.getElementById("bathdel").disabled = false;
	  }else{
	     $("input[name='quanxuan']").each(function(){this.checked=false;});
		 document.getElementById("bathdel").disabled = true;
	  }
	  
  });
   
  $('.gidss').click(function(){ 
  		var checked = false;
  		$("input[name='quanxuan']").each(function(){
			if(this.checked == true){
				checked = true;
			}
		}); 
		document.getElementById("bathdel").disabled = !checked;
		return true;
  });


function ajax_batdel_myinbox(){
	if(confirm("Sure to delete it?")){
			createwindow();
			var arr = [];
			$('input[name="quanxuan"]:checked').each(function(){
				arr.push($(this).val());
			});
			var str=arr.join('+'); ;
			$.post('<?php echo $thisurl;?>',{type:'ajax_batdel_myinbox',func:'user',ids:str},function(data){
				removewindow();
				if(data == ""){
					location.reload();
				}else{
					alert(data);
				}
			});
	 }
	return false;
}

function ajax_del_myinbox(id,obj){
	thisobj = $(obj).parent().parent();
	if(confirm("Sure to delete it?")){
		createwindow();
		$.post('<?php echo $thisurl;?>',{type:'ajax_batdel_myinbox',func:'user',ids:id},function(data){
			removewindow();
			if(data == ""){
				thisobj.hide(300);
			}else{
				alert(data);	
			}
		});
	}
	return false;	
}
</script>
