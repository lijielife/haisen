<style type="text/css">
.contentbox table th{ font-size:12px; text-align:center}
.contentbox table{ border:1px solid #FCBF86}
.contentbox table td{text-align:center}
.opbut{width:70px; height:30px; display:block; position:relative }
.opbut a.but{ font-size:14px; color:#333; padding:3px;padding-right:20px; background:url(<?php echo $this->img('dian.gif');?>) right center no-repeat}
.opbut a.but:hover{ color:#FFF; background-color:#666}
.opbut ul{ display:none; position:absolute; width:100px; top:24px; left:0px; z-index:99; border:3px solid #ccc; background-color:#FFF}
.opbut ul li{ height:28px; line-height:28px; text-align:center}
.opbut ul li a{ display:block; text-align:center }
.opbut ul li a:hover{background-color:#ededed}
</style>

<div class="contentbox" style="overflow-x:hidden; overflow-y:auto; height:500px">
<h2 class="con_title">餐企店貌</h2>
<p style=" padding-bottom:20px; padding-top:10px; font-size:14px; font-weight:bold; text-align:right"><a style="float:right; color:#CC0000" href="javascript:;" onclick="opwindow('<?php echo ADMIN_URL;?>sp.php?type=photosinfo&shopid=<?php echo $_GET['id'];?>','添加店铺图片')">添加店铺图片</a></p>
     <table cellspacing="2" cellpadding="5" width="100%" style="line-height:18px">
    <tr>
	   <td bgcolor="#DFE0DC" width="60"><label><input type="checkbox" class="quxuanall" value="checkbox" />选择</label></td>
	   <td bgcolor="#DFE0DC">名称</td>
	   <td bgcolor="#DFE0DC">图片</td>
	   <td bgcolor="#DFE0DC">备注</td>
	   <td bgcolor="#DFE0DC">状态</td>
	   <td bgcolor="#DFE0DC" width="100">录入时间</td>
	   <td bgcolor="#DFE0DC" width="150">操作</td>
	</tr>
	<?php
	$k=10;
	if(!empty($rt)){ 
	foreach($rt as $row){
	?>
	<tr>
	<td><input type="checkbox" name="quanxuan" value="<?php echo $row['img_id'];?>" class="gids"/></td>
	<td><?php echo $row['img_name'];?></td>
	<td><img  src="../<?php echo $row['img_url'];?>" alt="<?php echo $row['img_name'];?>" width="80"/></td>
	<td><?php echo $row['remark'];?></td>
  <td><?php echo date('Y-m-d',$row['addtime']);?></td>
  <td><img src="<?php echo $this->img($row['is_show']==1 ? 'yes.gif' : 'no.gif');?>" alt="<?php echo $row['is_show']==1 ? '0' : '1';?>" class="activeop" id="<?php echo $row['img_id'];?>"/></td>
	<td align="center">
	<span class="opbut" style="z-index:<?php echo $k--;?>">
	<a class="but">请选择</a>
	<ul>
	<li><a href="javascript:void(0)" onclick="opwindow('<?php echo ADMIN_URL;?>sp.php?type=photosinfo&shopid=<?php echo $_GET['id'];?>&id=<?php echo $row['img_id'];?>','店铺图片编辑')">店铺图片编辑</a></li>
	<li><a href="javascript:void(0)" class="deluserid" id="<?php echo $row['img_id'];?>">店铺删除</a></li>
	</ul>
	</span>
	</td>
	</tr>
	<?php } ?>
	<tr>
		 <td colspan="6" style="text-align:left"> <input type="checkbox" class="quxuanall" value="checkbox" />
			  <input type="button" name="button" value="批量删除" disabled="disabled" class="bathdel" id="bathdel"/>
		 </td>
	</tr>
		<?php } ?>
	 </table>
	 <?php $this->element('page',array('pagelink'=>$pagelink));?>
</div>
<?php
$thisurl = ADMIN_URL.'sp.php'; 
?>
<script type="text/javascript">
jQuery(document).ready(function($){
	$('.opbut').hover(
	function(){
		$(this).children("ul").show();
	},
	function(){
		$(this).children("ul").hide();
	})
	
	
});
</script>
<script type="text/javascript">
function opwindow(url,na){
		JqueryDialog.Open(na,url,640,400,'frame');
}
//全选
 $('.quxuanall').click(function (){
      if(this.checked==true){
         $("input[name='quanxuan']").each(function(){this.checked=true;});
		 document.getElementById("bathdel").disabled = false;
	  }else{
	     $("input[name='quanxuan']").each(function(){this.checked=false;});
		 document.getElementById("bathdel").disabled = true;
	  }
  });
  
  //是删除按钮失效或者有效
  $('.gids').click(function(){ 
  		var checked = false;
  		$("input[name='quanxuan']").each(function(){
			if(this.checked == true){
				checked = true;
			}
		}); 
		document.getElementById("bathdel").disabled = !checked;
  });
  
  //批量删除
   $('.bathdel').click(function (){
   		if(confirm("确定删除吗？")){
			createwindow();
			var arr = [];
			$('input[name="quanxuan"]:checked').each(function(){
				arr.push($(this).val());
			});
			var str=arr.join('+'); ;
			$.post('<?php echo SITE_URL.'shop/sp.php';?>',{action:'bathdel',ids:str},function(data){
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
   });
   
   $('.deluserid').click(function(){
   		ids = $(this).attr('id');
		thisobj = $(this).parent().parent().parent().parent().parent();
		if(confirm("确定删除吗？")){
			createwindow();
			$.post('<?php echo SITE_URL.'shop/sp.php';?>',{action:'bathdel',ids:ids},function(data){
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
   });
   
   	$('.activeop').live('click',function(){
		star = $(this).attr('alt');
		imgid = $(this).attr('id'); 
		type = $(this).attr('lang');
		obj = $(this);
		$.post('<?php echo SITE_URL.'shop/sp.php';?>',{action:'activeop',active:star,img_id:imgid,type:type},function(data){
			if(data == ""){
				if(star == 1){
					id = 0;
					src = '<?php echo $this->img('yes.gif');?>';
				}else{
					id = 1;
					src = '<?php echo $this->img('no.gif');?>';
				}
				obj.attr('src',src);
				obj.attr('alt',id);
			}else{
				alert(data);
			}
		});
	});
</script>