
<style type="text/css">
.radio { position: relative; top: 4px; }
.number { margin-left: 4px; }
.year { margin-left: 6px; }
.hah { width: 25%; margin-left: 3px; margin-right: 3px; }
.cell { margin-left: 5px; }
</style>
<div class="contentbox">
  <table cellspacing="2" cellpadding="5" width="100%">
    <tr>
      <th colspan="3" align="left">分红设置</th>
    </tr>
    <tr>
      <th>名称</th>
      <th style="text-align:center">条件</th>
    </tr>
    <tr>
      <td width="20%">等级设置</td>
      <td ><table cellspacing="2" cellpadding="5" width="100%"  border="0">
          <tr>
            <th>选项</th>
            <th>等级名称</th>
            <th>金额限定</th>
          </tr>
          <?php foreach($level_info as $item): ?>
          <tr>
            <td width="20%">
                    <input type='checkbox' name="level" value="<?php echo $item['lid'];?>" 
        			<?php if( $config['level_info'][$item['lid']] != '')
							    echo "checked=\"checked\"";
						?>
        		 /></td>
            <td  width="40%"><?php echo $item['level_name'];?></td>
            <td  ><input type='number' name="bonus_limit_<?php echo $item['lid'];?>" id="bonus_limit_<?php echo $item['lid'];?>" value="<?php echo $config['level_info'][$item['lid']];?>"/>
              </span></span>设置-1为不限制 </td>
          </tr>
          <?php endforeach;?>
        </table></td>
    </tr>
    <tr>
      <td>分红比例</td>
      <td><span class="hah"><span class="number" >
        <input type='number'  name="bonus_percent" id="bonus_percent" value="<?php echo $config['bonus_percent'];?>"/>
        </span></span>10等于营业额的10%,20等于营业额的20%,以此类推</td>
    </tr>
    <tr>
      <td>时间周期</td>
      <td><span class="year">
        <select id="bonus_cycle" value="<?php echo $config['bonus_cycle'];?>">
          <?php if($config['bonus_cycle'] == 'coustom'):?>
          <option value="coustom" selected="true">自定义</option>
          <option value="yesterday" >昨日</option>
          <?php else:?>
          <option value="coustom" >自定义</option>
          <option value="yesterday" selected="true" >昨日</option>
          <?php endif;?>
        </select>
        </span>
        <?php if($config['bonus_cycle'] == 'yesterday' or $config['bonus_cycle'] == ''):?>
        <span class="hah"> <span>开始</span> <span class="date">
        <input type="date" id="bonus_date_start" value="<?php  echo date('Y-m-d',strtotime(date('Y-m-d'))-60*60*24);?>"/>
        </span> <span>结束</span> <span class="date" >
        <input  type="date" id="bonus_date_end" value="<?php  echo date('Y-m-d',strtotime(date('Y-m-d')));?>"/>
        </span> </span>
        <?php else:?>
        <span class="hah"> <span>开始</span> <span class="date">
        <input type="date" id="bonus_date_start" value="<?php  echo $config['bonus_date_start'];?>"/>
        </span> <span>结束</span> <span class="date" >
        <input  type="date" id="bonus_date_end" value="<?php echo $config['bonus_date_end'];?>"/>
        </span> </span>
        <?php endif;?>
        周期为每天则不用修改</td>
    </tr>
    <tr>
      <td colspan="2" align="right"><input type="button" value="修改" onclick="enable(this)"/></td>
    </tr>
    <tr>
      <td width="30%"><span >订单数:</span><span id="order"><?php echo $info['order']?><b  style="margin-right:10px;">单</b></span> <span >营业额:</span><span id="sum" ><?php echo $info['sum']?></span><b  style="margin-right:10px;">元</b> <span>分红金额:</span><span id="percent"><?php echo $info['percent']?></span><b  style="margin-right:10px;">元</b><br /> <span>分红人数:</span><span id="count"><?php echo $info['count']?></span><b  style="margin-right:10px;">人</b></td>
      <td  align="center"><input type="button" value="一键分红" onclick="bonus_action()"/></td>
    </tr>
  </table>
</div>
<script language="javascript" type="text/javascript">
function bonus_action(){
	$.ajax({
		     url : 'user.php',
		     type : 'post',
			 data : {action:'ajax_user_bonus_action'},
			 dataType : 'json',
			 success : function(data){
				 	if(data.success){
					   alert('操作完成');	
					}else{
					   alert('操作失败');
					}
				 }
		});
}
function disable(){
 
  $("input[type!=button]").attr("disabled","disabled");
  $("select").attr("disabled","disabled");
}
function enable(o){
	   var name = $(o).val();
  if(name == '修改'){
	   $("input").removeAttr("disabled");
	   $("select").removeAttr("disabled");
	  
	   $(o).val('保存');
  }else{
	   var level_limit = new Array();
	   var bonus_limit = new Array();
	   var tmp = '';
       $("input:checkbox:checked").each(function(){
		      tmp = $(this).val();
		      level_limit.push(tmp);
			  bonus_limit.push($("#bonus_limit_"+tmp).val());
		   });
	
	   var bonus_percent = $("#bonus_percent").val();
	   var bonus_cycle = $("#bonus_cycle").val();
	   var bonus_date_start = $("#bonus_date_start").val();
	   var bonus_date_end = $("#bonus_date_end").val();
	   if(level_limit == ''){
		     alert('至少选择一个等级');
		     return false;
		   }
        var b= 1;
	    bonus_limit.forEach(function(e){
				if(e == ''){
		          b = 0;
				}
		});
		if(b == 0){
			 alert('对应等级的限定金额不能为空');
			 return false;
		}
		if(bonus_percent == ''){
		     alert('设定分红百分比不能为空');
		     return false;
		   }
		   else if(bonus_percent > 100){
			   alert('设定分红百分比不能大于100');
		     return false;
		 }
		 if(bonus_cycle == ''){
		     alert('设定分红周期不能为空');
		     return false;
		   }

		  if(bonus_cycle != 'day'){
			  if(bonus_date_start == '' || bonus_date_end == ''){
			   alert('设定分红启始或介绍日期不能为空');
			   return false;
			  }
		   } 
	  $.ajax({
		  url : 'user.php',
		  type : 'post',
		  data : {level_limit : level_limit.join(','),bonus_limit:bonus_limit.join(','),bonus_percent:bonus_percent,bonus_cycle:bonus_cycle,
		  	bonus_date_start:bonus_date_start,bonus_date_end:bonus_date_end,action:'ajax_user_bonus'
		  },
		  dataType : 'json',
		  success: function(data){
			  	if(data.success){
						disable();
						alert('修改成功');
						$("#order").html(data.info.order);
						$("#sum").html(data.info.sum);
						$("#percent").html(data.info.percent);
						$("#count").html(data.info.count);
						$(o).val('修改');
						
					}else{
						alert('修改失败:'+data.info);
					}
			  }
		  })
	  
	 
	   
  }
   
}
$(function(){
 disable();
  
})
</script>