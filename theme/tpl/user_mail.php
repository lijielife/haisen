<div id="wrap">
	<div class="clear7"></div>
    	<?php $this->element('user_menu');?>
 <div class="m_right" >
 	 <h2 class="con_title">我的信箱</h2>
     <div class="USERMAIL jf">
      	 <table cellspacing="2" cellpadding="5" width="100%">
			<tr>
			   <th width="50" style="text-align:left"><label><input type="checkbox" class="quxuanall" value="checkbox" />编号</label></th>
			   <th>标题</th>
			   <th>发送者</th>
			   <th width="60">回复状态</th>
			   <th>发送时间</th>
			   <th width="50">操作</th>
			</tr>
			<?php 
			if(!empty($rt['meslist'])){ 
			foreach($rt['meslist'] as $row){
			?>
			<tr>
			<td><input type="checkbox" name="quanxuan" value="<?php echo $row['mes_id'];?>" class="gids"/></td>
			<td><?php echo $row['title'];?></td>
			<td><?php echo $row['adminname'];?></td>
			<td><img src="<?php echo $this->img(!empty($row['rp_content']) ? 'yes.gif' : 'no.gif');?>"/></td>
			<td><?php echo !empty($row['addtime']) ? date('Y-m-d H:i:s',$row['addtime']) : '无知';?></td>
			<td>
			<a href="<?php echo SITE_URL;?>user.php?act=mailinfo&id=<?php echo $row['mes_id'];?>" title="编辑"><img src="<?php echo $this->img('icon_view.gif');?>" title="编辑"/></a>&nbsp;
			<a  href="<?php echo SITE_URL;?>user.php?act=mymes&op=del&id=<?php echo $row['mes_id'];?>&page=<?php echo isset($_GET['page'])?$_GET['page']:1;?>" onclick="return confirm('确定删除吗?')"><img src="<?php echo $this->img('icon_drop.gif');?>" title="删除" alt="删除" id="<?php echo $row['mes_id'];?>" /></a>
			</td>
			</tr>
			<?php
			 } ?>
			<tr>
				 <td colspan="7"> <input type="checkbox" class="quxuanall" value="checkbox" />
					  <input type="button" name="button" value="批量删除" disabled="disabled" class="bathdel" id="bathdel"/>
				 </td>
			</tr>
				<?php } ?>
		</table>
		 <?php $this->element('page',array('pagelink'=>$rt['pagelink']));?>
      </div>
  </div>
<?php
	$thisurl = SITE_URL.'user.php';
?>
  <script type="text/javascript" language="javascript">
  function get_userpoint_page_list(page){
  		createwindow();
		$.get('<?php echo $thisurl;?>',{act:'pointinfo',page:page,type:'ajax'},function(data){
			removewindow();
			if(data !="" && typeof(data)!='undefined'){
				$('.USERPOINTS').html(data);
			}
		});
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
  </script>
    <div class="clear"></div>
  </div>
  <div class="clear7"></div>