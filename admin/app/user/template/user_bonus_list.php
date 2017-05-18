<?php
$thisurl = ADMIN_URL.'user.php'; 
?>
<style type="text/css"> .contentbox table th{ font-size:12px; text-align:center}</style>
<div class="contentbox">
     <table cellspacing="2" cellpadding="5" width="100%">
	 <tr>
		<th colspan="6" align="left" style="text-align:left">分红列表</th>
	</tr>
	<tr>
	   <th width="50"><label><input type="checkbox" class="quxuanall" value="checkbox" />编号</label></th>
	   <th>营业额</th>
	   <th>人数</th>
	   <th>金额</th>
	   <th>时间</th>
	   <th width="50">操作</th>
	</tr>
	<?php if(!empty($rt))foreach($rt as $row){?>
	<tr>
	<td><input type="checkbox" name="quanxuan" value="<?php echo $row['id'];?>" class="gids"/></td>
	<td><?php echo $row['sum'];?></td>
	<td><?php echo $row['count'];?></td>
	<td><?php echo $row['percent'];?></td>
	<td><?php echo date('Y-m-d H:i:s',$row['linetime']);?></td>
	<td><a href="<?php echo ADMIN_URL.'user.php?type=user_bonus_detail&id='.$row['id'];?>"><img src="<?php echo $this->img('icon_view.gif');?>" title="明细" alt="明细" id="<?php echo $row['id'];?>"/></a></td>
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
 
</script>