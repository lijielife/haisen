<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL ?>css/style.css" media="all" />
<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL ?>css/content.css" media="all" /> 
<script type="text/javascript" src="<?php echo ADMIN_URL ?>js/jquery-1.7.min.js"></script>
<body>
<div class="main" style="height:auto;padding-top:1px;">
    <div class="contentbox">
<form id="form1" name="form1" method="post" action="">
<table cellspacing="2" cellpadding="5" width="100%">
     <tr>
        <th colspan="2" align="left"><?php echo $type=='edit' ? '修改' : '添加';?>钱包</th>
    </tr>
    <tr>
        <td class="label" width="15%">钱包名称:</td>
        <td width="85%">
        <input name="wallet_name" id="wallet_name"  type="text" style="width:280px;" value="<?php echo isset($rt['wallet_name']) ? $rt['wallet_name'] : '';?>">
        </td>
  </tr>
  <tr>
        <td class="label" width="15%">钱包状态:</td>
        <td width="85%">
        <input name="state" id="state"  type="text" style="width:80px;" value="<?php echo isset($rt['state']) ? $rt['state'] : '';?>"> 1为开，0为关
        </td>
  </tr>
  <tr><td class="label" ></td><td>
<input  type="hidden" id="id" value="<?php echo isset($rt['wallet_id']) ? $rt['wallet_id'] : "";?>"/>
<input  type="submit" id="submit" value=" <?php echo $type=='edit' ? '修改' : '添加';?> "></td></tr>

</table>
</form>
</div>
</div>
<?php  $thisurl = ADMIN_URL.'manager.php'; ?>
<script type="text/javascript">
    $('#submit').click(function(){
        wallet_name  = $('#wallet_name').val();
        id = $('#id').val();
        state = $('#state').val();
        if( wallet_name == "" || state == "" ){
            alert("请输入完整信息！");
           return false;
        }
        $.post('<?php echo $thisurl;?>',{action:'addwallet',wallet_name:wallet_name,state:state,id:id},function(data){ 
            if(!data){
              alert("<?php echo $type=='edit' ? '修改' : '添加';?>成功！");
              location.reload();
            }else{
              alert("<?php echo $type=='edit' ? '修改' : '添加';?>失败！");
              location.reload();
            }
        },'json');
        return false;
    });
    
//});
</script>


</body>

