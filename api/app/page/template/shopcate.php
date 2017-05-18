<style type="text/css">
.contentbox{ background-color:#FEE4B3}
.contentbox table{ border:1px solid #FCBF86}
.contentbox table th{ font-size:12px; text-align:center}
.contentbox table .label{ font-size:12px; text-align:right; font-weight:bold; background-color:#FFD99A}
.tx{ width:350px; border:1px solid #ccc; height:28px; line-height:28px}
.tx2{ width:120px; border:1px solid #ccc; height:28px; line-height:28px}

.opbut{width:70px; height:30px; display:block; position:relative }
.opbut a.but{ font-size:14px; color:#333; padding:3px;padding-right:20px; background:url(<?php echo $this->img('dian.gif');?>) right center no-repeat}
.opbut a.but:hover{ color:#FFF; background-color:#666}
.opbut ul{ display:none; position:absolute; width:100px; top:24px; left:0px; z-index:99; border:3px solid #ccc; background-color:#FFF}
.opbut ul li{ height:28px; line-height:28px; text-align:center}
.opbut ul li a{ display:block; text-align:center }
.opbut ul li a:hover{background-color:#ededed}
</style>

<div class="contentbox" style="overflow-x:hidden; overflow-y:auto; height:500px">
<h2 class="con_title">菜谱分类</h2>
<p style=" padding-bottom:20px; padding-top:10px; font-size:14px; font-weight:bold; text-align:right"><a style="float:right; color:#CC0000" href="javascript:;" onclick="opwindow('<?php echo ADMIN_URL;?>sp.php?type=shopcateinfo&shopid=<?php echo $_GET['id'];?>','菜单分类管理')">添加菜单分类</a></p>

    <table cellspacing="2" cellpadding="5" width="100%" style="line-height:18px">
    <tr>
	   <td align="center" bgcolor="#DFE0DC" width="60"><label><input type="checkbox" class="quxuanall" value="checkbox" />选择</label></td>
	   <td align="center" bgcolor="#DFE0DC" width="40%">名称</td>
	   <td align="center" bgcolor="#DFE0DC">状态</td>
	   <td align="center" bgcolor="#DFE0DC" width="35">排序</td>
	   <td align="center" bgcolor="#DFE0DC">操作</td>
	</tr>
	<?php 
	$k=10;
	if(!empty($catelist)){ 
	foreach($catelist as $row){
	$sid = empty($row['parent_id']) ? $row['id'] : 0;
	?>
	<tr>
	<td><input type="checkbox" name="quanxuan" value="<?php echo $row['id'];?>" class="gids"/></td>
	<td><strong><?php echo $sid>0 ? "<a href=\"javascript:;\" onclick=\"return showhide(this,'".$row['id']."','0')\">[+]</a>&nbsp;" : "";?></strong><?php echo $row['name'];?></td>
<td><img src="<?php echo $this->img($row['is_show']==1 ? 'yes.gif' : 'no.gif');?>" alt="<?php echo $row['is_show']==1 ? '0' : '1';?>" class="activeop" lang="is_show" id="<?php echo $row['id'];?>"/></td>
<td><span class="vieworder" id="<?php echo $row['id'];?>"><?php echo $row['sort_order'];?></span></td>
	<td align="center">
	<span class="opbut" style="z-index:<?php echo $k--;?>">
	<a class="but">请选择</a>
	<ul>
	<li><a href="javascript:void(0)" onclick="opwindow('<?php echo ADMIN_URL;?>sp.php?type=shopcateinfo&shopid=<?php echo $_GET['id'];?>&id=<?php echo $row['id'];?>','分类编辑')">编辑分类</a></li>
	<li><a href="javascript:void(0)" class="delcateid" id="<?php echo $row['id'];?>">删除分类</a></li>
	<li><a href="javascript:void(0)" onclick="opwindow2('<?php echo ADMIN_URL;?>sp.php?type=goodsinfo&shopid=<?php echo $_GET['id'];?>&cid=<?php echo $row['id'];?>','添加菜谱')">添加菜谱</a></li>
	</ul>
	</span>
	</td>
	</tr>
		<?php 
			if(!empty($row['cat_id'])){
				foreach($row['cat_id'] as $rows){
				?>
					<tr class="tab<?php  echo $row['id'];?>">
					<td><input type="checkbox" name="quanxuan" value="<?php echo $rows['id'];?>" class="gids"/></td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $sid==$rows['parent_id'] ? "<a href=\"javascript:;\" onclick=\"return showhide(this,'".$row['id']."','".$rows['id']."')\">[+]</a>&nbsp;" : "";?></strong>├ &nbsp;<?php echo $rows['name'];?></td>
				<td><img src="<?php echo $this->img($rows['is_show']==1 ? 'yes.gif' : 'no.gif');?>" alt="<?php echo $rows['is_show']==1 ? '0' : '1';?>" class="activeop" lang="is_show" id="<?php echo $rows['id'];?>"/></td>
				<td><span class="vieworder" id="<?php echo $rows['id'];?>"><?php echo $rows['sort_order'];?></span></td>
					<td align="center">
					<span class="opbut" style="z-index:<?php echo $k--;?>">
					<a class="but">请选择</a>
					<ul>
					<li><a href="javascript:void(0)" onclick="opwindow('<?php echo ADMIN_URL;?>sp.php?type=shopcateinfo&shopid=<?php echo $_GET['id'];?>&id=<?php echo $rows['id'];?>','分类编辑')">编辑分类</a></li>
					<li><a href="javascript:void(0)" class="delcateid" id="<?php echo $rows['id'];?>">删除分类</a></li>
					<li><a href="javascript:void(0)" onclick="opwindow2('<?php echo ADMIN_URL;?>sp.php?type=goodsinfo&shopid=<?php echo $_GET['id'];?>&cid=<?php echo $rows['id'];?>','添加菜谱')">添加菜谱</a></li>
					</ul>
					</span>
					</td>
					</tr>
							<?php 
							if(!empty($rows['cat_id'])){ 
								foreach($rows['cat_id'] as $rowss){
								$ssid = !empty($rowss['cat_id']) ? $rows['id'] : 0;
							?>
									<tr class="tab<?php  echo $row['id'];?> tab<?php  echo $rows['id'];?>" style="display:none">
									<td><input type="checkbox" name="quanxuan" value="<?php echo $rowss['id'];?>" class="gids"/></td>
									<td style="padding-left:58px"><strong><?php echo $ssid>0 ? "<a href=\"javascript:;\" onclick=\"return showhide(this,'".$row['id']."','".$rows['id']."','".$rowss['id']."')\">[+]</a>&nbsp;" : "";?></strong>├ &nbsp;<?php echo $rowss['name'];?></td>
								<td><img src="<?php echo $this->img($rowss['is_show']==1 ? 'yes.gif' : 'no.gif');?>" alt="<?php echo $rowss['is_show']==1 ? '0' : '1';?>" class="activeop" lang="is_show" id="<?php echo $rowss['id'];?>"/></td>
								<td><span class="vieworder" id="<?php echo $rowss['id'];?>"><?php echo $rowss['sort_order'];?></span></td>
									<td>
									<a href="goods.php?type=cate_info&id=<?php echo $rowss['id'];?>" title="编辑"><img src="<?php echo $this->img('icon_edit.gif');?>" title="编辑"/></a>&nbsp;
									<img src="<?php echo $this->img('icon_drop.gif');?>" title="删除" alt="删除" id="<?php echo $rowss['id'];?>" class="delcateid"/>
									</td>
									</tr>
									<?php 
									if(!empty($rowss['cat_id'])){ 
										foreach($rowss['cat_id'] as $rowsss){
									?>
									<tr class="tab<?php  echo $row['id'];?> tab<?php  echo $rows['id'];?> tab<?php  echo $rowss['id'];?>" style="display:none">
									<td><input type="checkbox" name="quanxuan" value="<?php echo $rowsss['id'];?>" class="gids"/></td>
									<td style="padding-left:90px">├ &nbsp;<?php echo $rowsss['name'];?></td>
								<td><img src="<?php echo $this->img($rowsss['is_show']==1 ? 'yes.gif' : 'no.gif');?>" alt="<?php echo $rowsss['is_show']==1 ? '0' : '1';?>" class="activeop" lang="is_show" id="<?php echo $rowsss['id'];?>"/></td>
								<td><span class="vieworder" id="<?php echo $rowsss['id'];?>"><?php echo $rowsss['sort_order'];?></span></td>
									<td>
									<a href="goods.php?type=cate_info&id=<?php echo $rowsss['id'];?>" title="编辑"><img src="<?php echo $this->img('icon_edit.gif');?>" title="编辑"/></a>&nbsp;
									<img src="<?php echo $this->img('icon_drop.gif');?>" title="删除" alt="删除" id="<?php echo $rowsss['id'];?>" class="delcateid"/>
									</td>
									</tr>
									<?php
										}
									}
									?>
						<?php
								}
							}
						?>
				<?php
				}
			}
		?>
	<?php } ?>
	<tr>
		 <td colspan="8"> <input type="checkbox" class="quxuanall" value="checkbox" />
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
		JqueryDialog.Open(na,url,640,300,'frame');
}
function opwindow2(url,na){
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
			$.post('<?php echo SITE_URL.'shop/sp.php';?>',{action:'bathdel_cate',ids:str},function(data){
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
   
   $('.delcateid').click(function(){
   		ids = $(this).attr('id');
		thisobj = $(this).parent().parent().parent().parent().parent();
		if(confirm("确定删除吗？")){
			createwindow();
			$.post('<?php echo SITE_URL.'shop/sp.php';?>',{action:'bathdel_cate',ids:ids},function(data){
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