<div class="contentbox">
<form id="form1" name="form1" method="post" action="">
     <table cellspacing="2" cellpadding="5" width="100%">
     <tr>
        <th colspan="2" align="left"><?php echo $type == 'edit' ? '编辑' : '添加'; ?>众筹<span style="float:right"><a href="crowdbuy.php?type=list">返回众筹</a></span></th>
    </tr>
    <tr>
       <td width="150" class="label">众筹商品名称</td>
       <td>
           <input type="text" name="group_name" value="<?php echo isset($rt['group_name']) ? $rt['group_name'] : "";?>" size="50"/>
       </td>
    </tr>
     <tr>
       <td class="label">查找众筹商品</td>
       <td>
         <img src="<?php echo $this->img('icon_search.gif');?>" alt="SEARCH" width="26" border="0" height="22" align="absmiddle">
        <select name="cat_id">
        <option value="0">所有分类</option>
        <?php 
        if ( ! empty( $catelist ) ) {
        foreach ( $catelist as $row ) { 
        ?>
        <option value="<?php echo $row['id'];?>" <?php if(isset($_GET['cat_id'])&&$_GET['cat_id']==$row['id']){ echo 'selected="selected""'; } ?>><?php echo $row['name'];?></option>
            <?php 
                if(!empty($row['cat_id'])){
                foreach($row['cat_id'] as $rows){ 
                    ?>
                    <option value="<?php echo $rows['id'];?>"  <?php if(isset($_GET['cat_id'])&&$_GET['cat_id']==$rows['id']){ echo 'selected="selected""'; } ?>>&nbsp;&nbsp;<?php echo $rows['name'];?></option>
                    <?php 
                    if(!empty($rows['cat_id'])){
                    foreach($rows['cat_id'] as $rowss){ 
                    ?>
                            <option value="<?php echo $rowss['id'];?>"  <?php if(isset($_GET['cat_id'])&&$_GET['cat_id']==$rowss['id']){ echo 'selected="selected""'; } ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowss['name'];?></option>
                            
                    <?php
                    }//end foreach
                    }//end if
                    ?>
            <?php
                }//end foreach
                } // end if
            ?>
        <?php
         }//end foreach
        } ?>
     </select>
     <select name="brand_id">
             <option value="0">所有品牌</option>
             <?php 
        if(!empty($brandlist)){
         foreach($brandlist as $row){ 
        ?>
        <option value="<?php echo $row['id'];?>"<?php if(isset($_GET['brand_id'])&&$_GET['brand_id']==$row['id']){ echo '   selected="selected""'; } ?>><?php echo $row['name'];?></option>
            <?php 
                if(!empty($row['brand_id'])){
                foreach($row['brand_id'] as $rows){ 
                    ?>
                    <option value="<?php echo $rows['id'];?>"<?php if(isset($_GET['brand_id'])&&$_GET['brand_id']==$rows['id']){ echo ' selected="selected""'; } ?>>&nbsp;&nbsp;<?php echo $rows['name'];?></option>
                    <?php 
                    if(!empty($rows['brand_id'])){
                    foreach($rows['brand_id'] as $rowss){ 
                    ?>
                            <option value="<?php echo $rowss['id'];?>"<?php if(isset($_GET['brand_id'])&&$_GET['brand_id']==$rowss['brand_id']){ echo ' selected="selected""'; } ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowss['name'];?></option>
                            
                    <?php
                    }//end foreach
                    }//end if
                    ?>
            <?php
                }//end foreach
                } // end if
            ?>
        <?php
         }//end foreach
        } ?>
         </select>
         </td>
    </tr>
       <tr>
       <td class="label">众筹日期</td>
       <td align="left">
          <input type="text" name="start_time" id="df" value="<?php echo isset($rt['start_time'])&&!empty($rt['start_time']) ? date('Y-m-d',$rt['start_time']) : date('Y-m-d',mktime());?>" onClick="WdatePicker()" style="background-color:#FAFAFA"/>
            <?php
             $hs = date('G',$rt['start_time']);
             $is = date('i',$rt['start_time']);
             $ss = date('s',$rt['start_time']);
             ?>
            <select name="xiaoshi_start">
            <?php for($i=0;$i<24;$i++){?>
            <option value="<?php echo $i;?>"<?php echo $i==$hs ? ' selected="selected"' : ''; ?>><?php echo $i;?></option>
            <?php } ?>
            </select>：  
            <select name="fen_start">
            <?php for($i=0;$i<60;$i++){?>
            <option value="<?php echo $i;?>"<?php echo $i==ltrim($is,'0') ? ' selected="selected"' : ''; ?>><?php echo $i;?></option>
            <?php } ?>
            </select>：
            <select name="miao_start">
            <?php for($i=0;$i<60;$i++){?>
            <option value="<?php echo $i;?>"<?php echo $i==ltrim($ss,'0') ? ' selected="selected"' : ''; ?>><?php echo $i;?></option>
            <?php } ?>
            </select>
            &nbsp;-&nbsp;
            <?php
             $hs = date('G',$rt['end_time']);
             $is = date('i',$rt['end_time']);
             $ss = date('s',$rt['end_time']);
             ?>
          <input type="text" name="end_time" id="dt" value="<?php echo isset($rt['end_time'])&&!empty($rt['end_time']) ? date('Y-m-d',$rt['end_time']) : date('Y-m-d',mktime()+7*24*3600);?>" onClick="WdatePicker()" style="background-color:#FAFAFA"/>
          <select name="xiaoshi_end">
            <?php for($i=0;$i<24;$i++){?>
            <option value="<?php echo $i;?>"<?php echo $i==$hs ? ' selected="selected"' : ''; ?>><?php echo $i;?></option>
            <?php } ?>
            </select>：  
            <select name="fen_end">
            <?php for($i=0;$i<60;$i++){?>
            <option value="<?php echo $i;?>"<?php echo $i==ltrim($is,'0') ? ' selected="selected"' : ''; ?>><?php echo $i;?></option>
            <?php } ?>
            </select>：
            <select name="miao_end">
            <?php for($i=0;$i<60;$i++){?>
            <option value="<?php echo $i;?>"<?php echo $i==ltrim($ss,'0') ? ' selected="selected"' : ''; ?>><?php echo $i;?></option>
            <?php } ?>
            </select>
          &nbsp;<em>点击文本选择日期。</em>
       </td>
    </tr>
    <tr>
       <td class="label">众筹价</td>
       <td>
           <input type="text" name="prices" value="<?php echo isset($rt['price']) ? $rt['price'] : "";?>"/>
       </td>
    </tr>
    <tr>
       <td class="label">活动是否开始</td>
       <td>
          <label>
           <input type="radio" name="active" value="1"<?php echo !isset($rt['active'])||$rt['active']=='1' ? ' checked="checked"' : "";?>/>活动有效&nbsp;
          </label>&nbsp;&nbsp;
          <label>
           <input type="radio" name="active" value="0"<?php echo !isset($rt['active'])||$rt['active']=='1' ? '' : ' checked="checked"';?>/>活动失效
          </label>         
          </td>
    </tr>
    <tr>
    <td class="label">当前状态：</td>
    <td><b>
    <?php 
    $pr = ($rt['start_time']< mktime()&&$rt['end_time'] > mktime()) ? 1 : 0;
     $is_delete = $rt['is_delete'];
     $is_on_sale = $rt['is_on_sale'];
    echo $pr==0 ? "<font color=red>众筹结束</font>" : ($rt['active']==0 ? "<font style='color:#6633FF'>活动无开启</font>" : ($is_delete=='1' ? '商品已删除' : ($is_on_sale='0' ? '商品已下架' : '众筹进行中')));
    ?></b>
    </td>
    </tr>

    <!-- 商品图片 -->
    <tr>
        <td class="label">上传商品主图:</td>
        <td>
          <?php if ( isset($rt['goods_img'] ) ) { ?>
          <img src="<?php echo !empty($rt['goods_img']) ? SITE_URL.$rt['goods_img'] : $this->img('no_picture.gif');?>" width="100" style="padding:1px; border:1px solid #ccc"/>
          <?php } ?>
          <input name="goods_img" id="goods" type="hidden" value="<?php echo isset($rt['goods_img']) ? $rt['goods_img'] : '';?>"/>
          <iframe id="iframe_t" name="iframe_t" border="0" src="upload.php?action=<?php echo isset($rt['goods_img'])&&!empty($rt['goods_img'])? 'show' : '';?>&ty=goods&files=<?php echo isset($rt['goods_img']) ? $rt['goods_img'] : '';?>" scrolling="no" width="445" frameborder="0" height="25"></iframe>
        </td>
      </tr>

    <tr>
       <td class="label">众筹描述</td>
       <td>
           <textarea name="desc" id="content" style="width:95%;height:500px;overflow: auto;"><?php echo isset($rt['desc']) ? $rt['desc'] : "";?></textarea>
           <script>KE.show({id : 'content',cssPath : '<?php echo ADMIN_URL.'/css/edit.css';?>'});</script>
       </td>
    </tr>
    <tr>
       <td class="label">规格清单</td>
       <td>
           <textarea name="qingdan" id="content2" style="width:95%;height:300px;overflow: auto;"><?php echo isset($rt['qingdan']) ? $rt['qingdan'] : "";?></textarea>
           <script>KE.show({id : 'content2',cssPath : '<?php echo ADMIN_URL.'/css/edit.css';?>'});</script>
       </td>
    </tr>
    <tr>
    <td class="label">&nbsp;</td>
    <td>
      <input type="submit" value="保存" onclick="return checkval()"/>
    </td>
    </tr>
     </table>
 </form>
</div>
<?php  $thisurl = ADMIN_URL.'crowdbuy.php'; ?> 
<script type="text/javascript" language="javascript">
/*增删相册控件*/
function addobj(obj){
    rand = generateMixed(4);
    str = $(obj).parent().html();
    str = str.replace('addobj','removeobj');
    str = str.replace('[+]','[-]');
    $(obj).parent().after('<p>'+str+'</p>');
}

function removeobj(obj){
    $(obj).parent().remove();
    return false;
}
//产生随机数
function generateMixed(n) {
    var chars = ['0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
    var res = "";
    for(var i = 0; i < n ; i ++) {
        var id = Math.ceil(Math.random()*35);
        res += chars[id];
    }
    return res;
}

function getgroupgoods(obj){
    cid = $(obj).parent().find('select[name="cat_id"]').val();
    bid = $(obj).parent().find('select[name="brand_id"]').val();
    key = $(obj).parent().find('input[name="keyword"]').val();
    if(cid>0 || bid>0 || key!=""){
        createwindow();
        $.get('<?php echo $thisurl;?>',{type:'getgroupgoods',cat_id:cid,brand_id:bid,keyword:key},function(data){
            if(data !=""){
                $(obj).parent().find('select[name="goods_id"]').html(data);
            }
            removewindow();
        });
    }else{
        return false;
    }
}

function checkval(){
    gname = $('input[name="group_name"]').val();
    if(gname==""){
        alert("请先输入众筹名称！");
        return false;
    }
    
    gid = $('select[name="goods_id"]').val();
    // if(!(gid>0)){
    //  alert("请先搜索产品！");
    //      return false
    // }
    return true;
}

function delgroupgoods(obj,id){
    if(confirm("确认删除吗？")){
        $.get('<?php echo $thisurl;?>',{type:'delgroupgoods',id:id},function(data){  });
        $(obj).parent().hide(200);
    }
    return false;
}
</script>