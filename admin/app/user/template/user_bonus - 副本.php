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
      <th>条件</th>
    </tr>
    <tr>
     
      <td>等级限定</td>
      <td>
      <?php foreach($level_info as $item): ?>
      	<span class="hah"><span><?php echo $item['level_name'];?></span>
        <span class="radio">
        <input type='radio' name="level" value="<?php echo $item['lid'];?>" 
		<?php if(!$config['level_limit'] and $item['lid'] == 1){
			    echo "checked=\"checked\"";
			}elseif($config['level_limit'] and $config['level_limit'] == $item['lid']){
			  echo "checked=\"checked\"";}?> />
        </span>
        </span> 
       <?php endforeach;?>
      </td>
    </tr>
    <tr>
      
      <td>金额上限</td>
      <td><span class="hah"><span class="number" >
        <input type='number' name="bonus_limit" id="bonus_limit" value="<?php echo $config['bonus_limit'];?>"/>
        </span></span>设置-1为不限制</td>
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
      <td colspan="3" align="right"><input type="button" value="修改" onclick="enable(this)"/></td>
    </tr>
    <tr>
      <td><span >订单数:</span><span id="order"><?php echo $info['order']?><b  style="margin-right:10px;">单</b></span>
      <span >营业额:</span><span id="sum" ><?php echo $info['sum']?></span><b  style="margin-right:10px;">元</b>
      <span>分红金额:</span><span id="percent"><?php echo $info['percent']?></span><b  style="margin-right:10px;">元</b><br />
      <span>分红人数:</span><span id="count"><?php echo $info['count']?></span><b  style="margin-right:10px;">人</b></td>
      <td colspan="2" align="center"><input type="button" value="一键分红" onclick=""/></td>
    </tr>
  </table>
</div>
<script language="javascript" type="text/javascript">

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
       var level_limit = $("input:radio:checked").val();
	   var bonus_limit = $("#bonus_limit").val();
	   var bonus_percent = $("#bonus_percent").val();
	   var bonus_cycle = $("#bonus_cycle").val();
	   var bonus_date_start = $("#bonus_date_start").val();
	   var bonus_date_end = $("#bonus_date_end").val();
	   if(level_limit == ''){
		     alert('设定等级不能为空');
		     return false;
		   }
	   if(bonus_limit == ''){
		     alert('设定限定金额不能为空');
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
		  data : {level_limit : level_limit,bonus_limit:bonus_limit,bonus_percent:bonus_percent,bonus_cycle:bonus_cycle,
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
						alert('修改失败');
					}
			  }
		  })
	  
	 
	   
  }
   
}
$(function(){
 disable();
  
})
</script>