<div class="contentbox">
     <table cellspacing="2" cellpadding="5" width="100%">
     <tr>
        <th colspan="8" align="left">团购商品列表
        <span style="float:right"><a href="groupbuy.php?type=info">添加团购商品</a></span>
        </th>
    </tr>
    <tr>
       <th width="70"><label><input type="checkbox" class="quxuanall" value="checkbox" />选择</label></th>
       <th>团购名称</th>
       <th>团购价</th>
       <th>团购人数</th>
       <th>状态</th>       
       <th>操作</th>
    </tr>
    <?php $active_arr = array( '0' => "<font color=red>团购结束</font>", '1' => '团购进行中' ); ?>
    <?php if ( ! empty( $rt ) ) { ?>
    <?php foreach ( $rt as $row ) { ?>    
    <tr>
    <td><input type="checkbox" name="quanxuan" value="<?php echo $row['group_id'];?>" class="gids" /></td>
    <td><?php echo $row['group_name']; ?></td>
    <td><?php echo $row['price']; ?></td>
    <td><?php echo $row['number']; ?></td>
    <td><?php echo $active_arr[ $row['active'] ]; ?></td>
    <td>
    <a href="groupbuy.php?type=info&id=<?php echo $row['group_id'];?>" title="编辑">
        <img src="<?php echo $this->img('icon_edit.gif');?>" title="编辑"/>
    </a>&nbsp;
    <img src="<?php echo $this->img('icon_drop.gif');?>" title="删除" alt="删除" id="<?php echo $row['group_id'];?>" class="delgoodsid" />
    </td>
    </tr>
    <?php
     } ?>
    <tr>
         <td colspan="8"> <input type="checkbox" class="quxuanall" value="checkbox" />
              <input type="button" name="button" value="批量删除" disabled="disabled" class="bathdel" id="bathdel"/>
         </td>
    </tr>
        <?php } ?>
     </table>
     <?php $this->element('page',array('pagelink'=>$pagelink));?>
</div>
<?php  $thisurl = ADMIN_URL.'groupbuy.php'; ?>
<script type="text/javascript" language="javascript">
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
            $.get('<?php echo $thisurl;?>',{type:'delgoods',ids:str},function(data){
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
   
   $('.delgoodsid').click(function(){
        ids = $(this).attr('id');
        thisobj = $(this).parent().parent();
        if(confirm("确定删除吗？")){
            createwindow();
            $.get('<?php echo $thisurl;?>',{type:'delgoods',ids:ids},function(data){
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
 </script>