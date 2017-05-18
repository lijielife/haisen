<div class="contentbox">
     <table cellspacing="2" cellpadding="5" width="100%">
	 <tr>
		<th colspan="8" align="left">留言列表</th>
	</tr>
    <tr>
	   <th><label><input type="checkbox" class="quxuanall" value="checkbox" />选择</label></th>
	   <th>留言人</th>
	   <th>留言标题</th>
	   <th>留言内容</th>
	   <th>留言来源</th>
	   <th>留言时间</th>
	   <th>处理状态</th>
	   <th>操作</th>
	</tr>
	<?php 
	//print_r($meslist);
	if(!empty($meslist)){ 
	foreach($meslist as $row){
	?>
	<tr>
	<td width="50"><input type="checkbox" name="quanxuan" value="<?php echo $row['mes_id'];?>" class="gids"/><?php echo $row['mes_id'];?></td>
	<td width="100" align="center"><?php echo $row['dbuser_name'].'<br />[<font color=red>'.$row['nickname'].'</font>]';?></td>
	<td><?php echo '对商品<b>&nbsp;<a href="'.SITE_URL.'product/'.$row['goods_id'].'/" target="_blank">'.$row['goods_name'].'</a>&nbsp;</b>的提问';?></td>
	<td><?php echo $row['comment_title'];?></td>
	<td><?php echo $row['ip_from'];?></td>
	<td width="75"><?php echo !empty($row['addtime']) ? date('Y-m-d H:i:s',$row['addtime']) : "";?></td>
	<td width="55"><?php echo $row['status']==1 ? '未处理' : '已处理';?></td>
	<td width="45">
	<a href="manager.php?type=mes_info&id=<?php echo $row['mes_id'];?>" title="编辑"><img src="<?php echo $this->img('icon_view.gif');?>" title="编辑"/></a>&nbsp;
	<img src="<?php echo $this->img('icon_drop.gif');?>" title="删除" alt="删除" id="<?php echo $row['mes_id'];?>" class="deladstag"/>
	</td>
	</tr>
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
<?php  $thisurl = ADMIN_URL.'manager.php'; ?>
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
			var str=arr.join('+'); 
			$.post('<?php echo $thisurl;?>',{action:'delmes',tids:str},function(data){
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
   
   $('.deladstag').click(function(){
		id = $(this).attr('id');
		thisobj = $(this).parent().parent();
		if(confirm("确定删除吗？")){
			createwindow();
			$.post('<?php echo $thisurl;?>',{action:'delmes',tids:id},function(data){
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
		tid = $(this).attr('id'); 
		obj = $(this);
		$.post('<?php echo $thisurl;?>',{action:'activeop',active:star,tid:tid},function(data){
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