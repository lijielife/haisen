<div class="contentbox">
<form id="form1" name="form1" method="post" action="">
    <table cellspacing="2" cellpadding="5" width="100%">
    <tr>
        <th colspan="2" align="left">
        <?php echo $type == 'edit' ? '编辑' : '添加'; ?>团购
        <span style="float:right"><a href="groupbuy.php?type=list">返回团购</a></span>
        </th>
    </tr>
    <tr>
       <td width="150" class="label">团购商品名称</td>
       <td>
           <input type="text" name="group_name" value="<?php echo isset($rt['group_name']) ? $rt['group_name'] : "";?>" size="50" />
       </td>
    </tr>
    <tr>
       <td class="label">原价</td>
       <td>
           <input type="text" name="original_price" value="<?php echo isset($rt['original_price']) ? $rt['original_price'] : "";?>"/>
       </td>
    </tr>
    <tr>
       <td class="label">团购价</td>
       <td>
           <input type="text" name="prices" value="<?php echo isset($rt['price']) ? $rt['price'] : "";?>"/>
       </td>
    </tr>
    <tr>
       <td class="label">团购人数</td>
       <td>
           <p> <input type="text" name="number" value="<?php echo isset($rt['number']) ? $rt['number'] : "";?>" size="8" />
            </p>
       </td>
    </tr>
      <td class="label" style="color:#FF0000">佣金:</td>
      <td align="left" style="color:#FF0000">
        <ul class="ajaxshowmoney">
            <li style="width:180px; float:left; position:relative; padding-bottom:5px; background:url(<?php echo $this->img('direc.gif');?>) 115px bottom no-repeat">
                <b>普通分销佣金:</b>
                <input type="text" name="takemoney" id="takemoney" size="8" value="<?php echo isset($rt['takemoney']) ? $rt['takemoney'] : '0.00'; ?>">元
                <div style="height:70px; width:110px; position:absolute; top:25px; left:42px; z-index:99; background:#ededed; border:1px solid #e4e4e4; display:none">
                <p style="line-height:21px; padding:5px; margin:0px;">
                 一层分佣&nbsp;&nbsp;<b><?php echo isset($userconfig['ticheng180_1_1'])&&isset($userconfig['ticheng180_1_2']) ? $userconfig['ticheng180_1_1'] . '%*' . $userconfig['ticheng180_1_2'] . '%' : '0';?></b>&nbsp;&nbsp;<br/>
                 二层分佣&nbsp;&nbsp;<b><?php echo isset($userconfig['ticheng180_2_1'])&&isset($userconfig['ticheng180_2_2']) ? $userconfig['ticheng180_2_1'] . '%*' . $userconfig['ticheng180_2_2'] . '%' : '0';?></b>&nbsp;&nbsp;<br/>
                 三层分佣&nbsp;&nbsp;<b><?php echo isset($userconfig['ticheng180_3_1'])&&isset($userconfig['ticheng180_3_2']) ? $userconfig['ticheng180_3_1'] . '%*' . $userconfig['ticheng180_3_2']  . '%' : '0';?></b>(个人累积达到<?php echo $userconfig['person_accumulative_money'];?>元，达不到，则无佣金)<br/>
                 四层分佣&nbsp;&nbsp;<b><?php echo isset($userconfig['ticheng180_4_1'])&&isset($userconfig['ticheng180_4_2']) ? $userconfig['ticheng180_4_1'] . '%*' . $userconfig['ticheng180_4_2']  . '%' : '0';?></b>(团队累积达到<?php echo $userconfig['team_accumulative_money'];?>元，达不到，则无佣金)<br/>
                </p>
                </div>
            </li>
            <div style="clear:both"></div>
        </ul>
      </td>
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
    <!-- 团购状态 -->
    <tr>
       <td class="label">团购状态</td>
       <td>
          <label>
           <input type="radio" name="active" value="1"<?php echo !isset($rt['active']) || $rt['active']=='1' ? ' checked="checked"' : ""; ?> />有效&nbsp;
          </label>&nbsp;&nbsp;
          <label>
           <input type="radio" name="active" value="0"<?php echo !isset($rt['active']) || $rt['active']=='1' ? '' : ' checked="checked"'; ?> />失效
          </label>         
        </td>
    </tr>
    
    <tr>
       <td class="label">团购描述</td>
       <td>
           <textarea name="desc" id="content" style="width:95%;height:500px;overflow: auto;"><?php echo isset($rt['desc']) ? $rt['desc'] : "";?></textarea>
           <script>KE.show({id : 'content',cssPath : '<?php echo ADMIN_URL.'/css/edit.css';?>'});</script>
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
<?php  $thisurl = ADMIN_URL.'groupbuy.php'; ?> 
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
    if ( gname == '' ) {
        alert("请先输入团购名称！");
        return false;
    }    
    return true;
}

function delgroupgoods(obj,id) {
    if ( confirm( "确认删除吗？" ) ) {
        $.get('<?php echo $thisurl;?>',{type:'delgroupgoods',id:id},function(data){  });
        $(obj).parent().hide(200);
    }
    return false;
}

/* 佣金比例 显示 / 隐藏 */
$('.ajaxshowmoney li input').focus(function(){
    $(this).parent().find('div').show();
});
$('.ajaxshowmoney li input').blur(function(){
    $(this).parent().find('div').hide();
});
</script>