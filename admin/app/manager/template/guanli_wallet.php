
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微信分销后台管理系统</title>

<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL; ?>css/style.css" media="all" />
<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL; ?>css/content.css" media="all" /> 
<script type="text/javascript" src="<?php echo ADMIN_URL; ?>js/jquery1.6.js"></script> 
<script type="text/javascript" src="<?php echo ADMIN_URL; ?>js/common.js"></script>  
</head>
<body>
<div class="main" style="height:auto; padding-top:1px;">
    <div class="contentbox">
     
     <table cellspacing="2" cellpadding="5" width="100%">
        <tr>
          <th width="60"><label>编号</label>
          </th><th>钱包名称</th>
          <th>钱包状态</th>
          <th>操作</th>
        </tr>
        <?php 
        if(!empty($rt)){ 
            foreach($rt as $row){
        ?>
        <tr>
            <td><?php echo $row['wallet_id'];?></td>
            <td><?php echo $row['wallet_name'];?></td>
            <td>
            <?php if( $row['state'] == '1' ){?>
            开
            <?php }else{?>
            关
            <?php }?>
            </td>
            <td><a href="manager.php?type=wallet&tt=edit&id=<?php echo $row['wallet_id'];?>" title="编辑"><img src="<?php echo $this->img('icon_edit.gif');?>" title="编辑"/></a></td>
        </tr>
        <?php
        }
        ?>
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
            $.post('<?php echo $thisurl;?>',{action:'deldp',id:str},function(data){
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
                $.post('<?php  echo ADMIN_URL; ?>manager.php',{action:'ajax_deldp',id:id},function(data){
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
</body>
</html>
