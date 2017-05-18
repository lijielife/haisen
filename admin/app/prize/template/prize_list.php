<div class="main" style="height:auto; padding-top:1px;">
	<div class="contentbox">
	 
     <table cellspacing="2" cellpadding="5" width="100%">
     
     
     <tr>
        	<th width="60"><label><input type="checkbox" class="quxuanall" value="checkbox" />编号</label></th><th>中奖者昵称</th><th>奖项</th><th>奖品名称</th><th>中奖时间</th><th>操作</th>
        </tr>
        <?php 
		if(!empty($rt)){ 
			foreach($rt as $row){
		?>
        <tr>
            <td><input type="checkbox" name="quanxuan" value="<?php echo $row['id'];?>" class="ids"/><?php echo $row['id'];?></td>
            <td><a href="user.php?type=info&id=<?php echo $row['user_id'];?>&goto=list"><?php echo empty($row['nickname']) ? '未知' : $row['nickname'];?></a></td>
            <td><?php echo $row['lt_prize'];?></td>
            <td><?php echo $row['lt_name'];?></td>
            <td><?php echo date('Y-m-d H:i:s',$row['create_time']);?></td>
            <td><img src="<?php echo $this->img('icon_drop.gif');?>" title="删除" alt="删除" id="<?php echo $row['id'];?>" class="deladmin"/></td>
        </tr>
        <?php
		}
		?>
     	<tr>
		  <td colspan="6"> <input type="checkbox" class="quxuanall" value="checkbox" />
			  <input type="button" name="button" value="批量删除" disabled="disabled" class="bathdel" id="bathdel"/>
		   </td>
		</tr>
        <?php }  ?>
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
  $('.ids').click(function(){ 
  		var checked = false;
  		$("input[name='quanxuan']").each(function(){
			if(this.checked == true){
				checked = true;
			}
		}); 
		document.getElementById("bathdel").disabled = !checked;
  });
  
  //批量删除1
   $('.bathdel').click(function (){
   		if(confirm("确定删除吗？")){
			createwindow();
			var arr = [];
			$('input[name="quanxuan"]:checked').each(function(){
				arr.push($(this).val());
			});
			var str=arr.join('+'); 
			$.post('<?php  echo ADMIN_URL; ?>prize.php',{action:'deldp',id:str},function(data){
				removewindow();
				if(data == ""){
					$('.openwindow').hide(200);
					location.reload();
				}else{
					alert(data);
				}
			});
		}else{
			return false;
		}
   });
   
	$('.deladmin').click(function(){
			id = $(this).attr('id');
			
			thisobj = $(this).parent().parent();
			if(confirm("确定删除吗？")){
				createwindow();
				$.post('<?php  echo ADMIN_URL; ?>prize.php',{action:'ajax_deldp',id:id},function(data){
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

</script></div>
<div style="clear:both"></div>

