<?php
$thisurl = ADMIN_URL.'user.php'; 
?>
<style type="text/css">
.contentbox table th{ font-size:12px; text-align:center}
.opbut{ float:left;width:70px; height:30px; display:block; position:relative }
.opbut a.but{ font-size:14px; color:#333; padding:3px;padding-right:20px; background:url(<?php echo $this->img('dian.gif');?>) right center no-repeat}
.opbut a.but:hover{ color:#FFF; background-color:#666}
.opbut ul{ display:none; position:absolute; width:100px; top:24px; left:0px; z-index:99; border:3px solid #ccc; background-color:#FFF}
.opbut ul li{ height:28px; line-height:28px;}
.opbut ul li a{ display:block; }
.opbut ul li a:hover{background-color:#ededed}
</style>
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
<?php
$urlToEncode="http://gz.altmi.com";
function generateQRfromGoogle($chl,$widhtHeight ='150',$EC_level='L',$margin='0')
{
    $url = urlencode($url); 
    echo '<img src="http://chart.apis.google.com/chart?chs='.$widhtHeight.'x'.$widhtHeight.'&cht=qr&chld='.$EC_level.'|'.$margin.'&chl='.$chl.'" alt="QR code" widhtHeight="'.$size.'" widhtHeight="'.$size.'"/>';
}
?>
<div class="contentbox">
     <table cellspacing="2" cellpadding="5" width="100%">
	 <tr>
		<th colspan="6" align="left" style="text-align:left"><span style="float:left">餐企列表</span><a style="float:right; color:#CC0000" href="javascript:;" onclick="opwindow('<?php echo ADMIN_URL;?>sp.php?type=info')">添加餐企</a></th>
	</tr>
	<tr><th colspan="6" align="left" style="text-align:left">
    	<img src="<?php echo $this->img('icon_search.gif');?>" alt="SEARCH" width="26" border="0" height="22" align="absmiddle">
    	关键字 <input name="keyword" size="15" type="text" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : "";?>">
    	<input value=" 搜索 " class="cate_search" type="button">
	</th></tr>
    <tr>
	   <th width="50"><label><input type="checkbox" class="quxuanall" value="checkbox" />编号</label></th>
	   <th>店名</th>
	   <th width="100"><a href="<?php echo $dt;?>">加入时间</a></th>
	   <th width="80">是否签约</th>
	   <th width="150">操作</th>
	</tr>
	<?php
	$k=10;
	if(!empty($userlist)){ 
	foreach($userlist as $row){
	?>
	<tr>
	<td><input type="checkbox" name="quanxuan" value="<?php echo $row['user_id'];?>" class="gids"/></td>
	<td><span style="float:left"><?php generateQRfromGoogle($urlToEncode,30);?></span><div style="width:300px; height:30px; line-height:30px; float:left"><?php echo $row['nickname'];?></div></td>
	<td align="center"><?php echo !empty($row['reg_time']) ? date('Y-m-d H:i:s',$row['reg_time']) : '无知';?></td>
	<td><?php echo $row['s_is_qianyue']==1 ? '<font color="#FF0000">已经签约</font>' : '<font color="#6600FF">暂无签约</font>';?></td>
	<td align="center">
	<img style="float:left" src="<?php echo $this->img($row['active']==1 ? 'yes.gif' : 'no.gif');?>" alt="<?php echo $row['active']==1 ? '0' : '1';?>" class="activeop" lang="active" id="<?php echo $row['user_id'];?>"/>&nbsp;
	<span class="opbut" style="z-index:<?php echo $k--;?>">
	<a class="but">请选择</a>
	<ul>
	<li><a href="javascript:void(0)" onclick="opwindow('<?php echo ADMIN_URL;?>sp.php?type=info&id=<?php echo $row['user_id'];?>','餐企编辑')">店铺编辑</a></li>
	<li><a href="javascript:void(0)" class="deluserid" id="<?php echo $row['user_id'];?>">店铺删除</a></li>
	<li><a href="javascript:void(0)" onclick="opwindow('<?php echo ADMIN_URL;?>sp.php?type=photos&id=<?php echo $row['user_id'];?>','店铺店貌照片')">店铺照片管理</a></li>
	<li><a href="javascript:void(0)" onclick="opwindow('<?php echo ADMIN_URL;?>sp.php?type=shopcate&id=<?php echo $row['user_id'];?>','菜单分类管理')">菜单分类管理</a></li>
	<li><a href="javascript:void(0)" onclick="opwindow('<?php echo ADMIN_URL;?>sp.php?type=goodslist&id=<?php echo $row['user_id'];?>','菜谱管理')">店铺菜谱管理</a></li>
	<li><a href="javascript:void(0)" onclick="opwindow('<?php echo ADMIN_URL;?>sp.php?type=coupon&shopid=<?php echo $row['user_id'];?>','优惠劵管理')">优惠劵管理</a></li>
	</ul>
	</span>
	</td>
	</tr>
	<?php
	 } ?>
	<tr>
		 <td colspan="4"> <input type="checkbox" class="quxuanall" value="checkbox" />
			  <input type="button" name="button" value="批量删除" disabled="disabled" class="bathdel" id="bathdel"/>
		 </td>
	</tr>
		<?php } ?>
	 </table>
	 <?php $this->element('page',array('pagelink'=>$pagelink));?>
</div>
<script type="text/javascript">
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
			$.post('<?php echo $thisurl;?>',{action:'bathdel',ids:str},function(data){
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
			$.post('<?php echo $thisurl;?>',{action:'bathdel',ids:ids},function(data){
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
		uid = $(this).attr('id'); 
		type = $(this).attr('lang');
		obj = $(this);
		$.post('<?php echo $thisurl;?>',{action:'activeop',active:star,uid:uid,type:type},function(data){
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
	
	function opwindow(url,na){
		JqueryDialog.Open(na,url,800,500,'frame');
	}
	
	//sous
	$('.cate_search').click(function(){
		
		keys = $('input[name="keyword"]').val();
		
		location.href='<?php echo Import::basic()->thisurl();?>&keyword='+keys;
	});
</script>