<style type="text/css">
.gototype a{ padding:2px; border-bottom:2px solid #ccc; border-right:2px solid #ccc;}
</style>
<div class="contentbox">
<form id="form1" name="form1" method="post" action="">
    <table cellspacing="2" cellpadding="5" width="100%">
        <tr>
            <th colspan="2" align="left" class="gototype">
            <span style="float:left">
            <?php echo $type == 'edit' ? '修改' : '添加'; ?>会员
            </span>
            <?php if ( isset( $_GET['goto'] ) && $_GET['goto'] != 'suppliers' ) { ?>
            <a href="user.php?type=userress&id=<?php echo $_GET['id'];?>" style="float:right;margin-left:10px;">查看会员收货地址</a>
            <?php } ?>
            <a href="user.php?type=<?php echo isset($_GET['goto'])?$_GET['goto']:'list';?>&rank=<?php echo isset($_GET['rank']) ? $_GET['rank'] : ""; ?>" style="float:right; margin-left:10px;">返回会员列表
            </a>
            </th>
        </tr>
        <tr>
            <td class="label" width="15%">用户头像：</td>
            <td>
            <?php 
            if ( isset( $rt['userinfo']['headimgurl'] ) && ! empty( $rt['userinfo']['headimgurl'] ) ) {
            echo '<img  alt="头像" src="'.$rt['userinfo']['headimgurl'].'" width="100" style="border:1px dotted #ccc; padding:2px"/>';
            } else {
            echo '<img  alt="头像" src="'.$this->img("tx_img.gif").'" width="100" style="border:1px dotted #ccc; padding:2px"/>';
            }
            ?>
            </td>
        </tr>
        <tr>
          <td class="label">一级上家:</td>
          <td>
          <?php echo $rt['p1_info'] ? "<a href=\"user.php?type=info&id={$rt['p1_info']['user_id']}&goto=list\">{$rt['p1_info']['nickname']}</a>" : '无'; ?>
          </td>
        </tr>
        <tr>
          <td class="label">二级上家:</td>
          <td><?php echo $rt['p2_info'] ? "<a href=\"user.php?type=info&id={$rt['p2_info']['user_id']}&goto=list\">{$rt['p2_info']['nickname']}</a>" : '无'; ?>
          </td>
        </tr>
        <tr>
          <td class="label">三级上家:</td>
          <td><?php echo $rt['p3_info'] ? "<a href=\"user.php?type=info&id={$rt['p3_info']['user_id']}&goto=list\">{$rt['p3_info']['nickname']}</a>" : '无'; ?>
          </td>
        </tr>
        <tr>
            <td class="label" width="15%">昵称：</td>
            <td>
            <input name="nickname" value="<?php echo isset( $rt['userinfo']['nickname'] ) ? $rt['userinfo']['nickname'] : ''; ?>" size="40" type="text" />
            </td>
        </tr>
        <tr>
            <td class="label" width="15%">真实姓名：</td>
            <td>
            <input name="consignee" value="<?php echo isset($rt['userress']['consignee']) && ! empty($rt['userress']['consignee']) ? $rt['userress']['consignee'] : "";?>" size="40" type="text" />     
            </td>
        </tr>
        <tr style="display:none">
        <td class="label" width="15%">会员级别：</td>
        <td>
            <select name="user_rank">
            <?php if ( ! empty($rt['userinfo']['user_jibie'] ) ) { ?>
            <?php foreach ( $rt['userinfo']['user_jibie'] as $row ) { ?>                
              <option value="<?php echo $row['lid'];?>" <?php echo isset( $rt['userinfo']['user_rank'] ) && $row['lid'] == $rt['userinfo']['user_rank'] ? 'selected="selected"' : ""; ?>>
              <?php echo $row['level_name']; ?>
              </option>
            <?php } } else { ?>
               <option value="1">普通会员</option>
            <?php } ?>
            </select>
        </td>
        </tr>
<!--         <tr>
            <td class="label" width="15%">可用资金：</td>
            <td>
                ￥<?php echo isset( $rt['userinfo']['mymoney'] ) ? $rt['userinfo']['mymoney'] : '0.00'; ?>
                &nbsp;&nbsp;<b>可用积分：</b>
                <?php echo isset( $rt['userinfo']['mypoints'] ) ? $rt['userinfo']['mypoints'] : '0'; ?>点
            </td>
        </tr> -->
        <?php if ( ! empty( $rt['userinfo']['user_id'] ) ) { ?>
        <tr>
            <td class="label">开通钱包：</td>
            <td>
            <?php foreach ($wallet_info as $key => $value): ?>
                <input type="checkbox" name="checkbox[ <?php echo ($key+1);?> ]"  value="<?php echo $wallet_info[ $key ]['wallet_name']?>" <?php if( $money_info[ 'wallet_'.($key+1) ] == '1' ) echo checked;?> ><?php echo $wallet_info[ $key ]['wallet_name']?>
            <?php endforeach ?>
            </td>
        </tr>
        <?php foreach ($wallet_info as $key => $value): ?>
        <tr>
            <td class="label" width="15%"><?php echo $wallet_info[ $key ]['wallet_name'];?>总佣金：</td>
            <td style="position:relative">
            <?php echo isset( $money_info[ 'wallet_money'.($key+1) ] ) ? '￥<span class="thismoney">'. $money_info[ 'wallet_money'.($key+1) ] .'</span>元' : '￥<span class="thismoney">0.00</span>元';?>&nbsp;&nbsp;
            <a onclick="$('.user_money<?php echo ($key+1);?>').toggle();" href="javascript:void(0)">[查看明细]</a>
            <div class="user_money<?php echo ($key+1);?>" style="display:none;width:550px; z-index:99999;border:1px solid #B4C9C6; position:absolute; left:-100px; top:55px; background-color:#ededed; padding:5px">
            <?php $this->element_wallet( '', array( 'rt'=>$rt ), array( 'wallet_id'=>($key+1) ) ); ?>
            </div>
            &nbsp;&nbsp;<br />
            <font color="red">管理员修改用户资金：</font>
            <input type="text" size="10"  onchange="change_user_points_money( '<?php echo $rt['userinfo']['user_id'];?>', this, 'money', '<?php echo ($key+1);?>' )" /> <em>输入整数增加，负数减少</em>
            </td>
        </tr>
        <?php endforeach ?>
        <tr>
            <td class="label" width="15%">总积分：</td>
            <td style="position:relative">
            <span class="thispoints">
            <?php echo isset( $rt['userinfo']['pay_points'] ) ? $rt['userinfo']['pay_points'] : '0'; ?>
            </span>&nbsp;&nbsp;
            <a onclick="$('.user_point').toggle();" href="javascript:void(0)">[查看明细]</a>
            <div class="user_point" style="display:none;width:550px; border:1px solid #B4C9C6; position:absolute; left:-100px; top:30px; background-color:#ededed; padding:5px">
            <?php $this->element( 'ajax_user_point', array('rt'=>$rt) ); ?>
            </div>
            &nbsp;&nbsp;<br /><font color="red">管理员修改用户积分：</font>
            <input type="text" size="10" onchange="change_user_points_money( '<?php echo $rt['userinfo']['user_id'];?>', this, 'points' )" /> <em>输入整数增加，负数减少</em>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <td class="label">性别：</td>
            <td>
              <label>
              <input type="radio" name="sex" value="0" <?php if ( ! isset( $rt['userinfo']['sex'] ) || $rt['userinfo']['sex'] == 0 ) { echo 'checked="checked"'; } ?>/>保密
              </label>  
              <label>
              <input type="radio" name="sex" value="1" <?php if ( isset( $rt['userinfo']['sex'] ) && $rt['userinfo']['sex'] == 1 ) { echo 'checked="checked"'; } ?>/>男
              </label>      
              <label>
              <input type="radio" name="sex" value="2" <?php if ( isset( $rt['userinfo']['sex'] ) && $rt['userinfo']['sex'] == 2 ) { echo 'checked="checked"'; } ?>/>女
              </label>
              </td>
        </tr>
        <!--<tr>
            <td class="label">生日：</td>
            <td>
            <input name="birthday" id="df" value="<?php echo isset($rt['userinfo']['birthday']) ? $rt['userinfo']['birthday'] : '';?>" size="40" type="text" onClick="WdatePicker()"/>
            </td>
        </tr>-->
        <tr>
            <td class="label">E-mail：</td>
            <td>
            <input name="email" value="<?php echo isset($rt['userinfo']['email']) ? $rt['userinfo']['email'] : '';?>" size="40" type="text" />
             </td>
        </tr>
        <tr>
            <td class="label">联系电话：</td>
            <td>
            <input name="mobile_phone" value="<?php echo isset($rt['userinfo']['mobile_phone']) ? $rt['userinfo']['mobile_phone'] : '';?>" size="40" type="text" />
             </td>
        </tr>
        <tr>
        <td class="label">地区：</td>
        <td>
        <select name="province" id="select_province" onchange="ger_ress_copy('2',this,'select_city')">
            <option value="0">选择省</option>
            <?php if ( ! empty($rt['province']) ) { ?>
            <?php foreach( $rt['province'] as $row ) { ?>           
            <option value="<?php echo $row['region_id'];?>" <?php echo $rt['userress']['province'] == $row['region_id'] ? 'selected="selected"' :""; ?>>
            <?php echo $row['region_name']; ?>
            </option>  
            <?php } } ?>                                                    
        </select>
            
        <select name="city" id="select_city" onchange="ger_ress_copy('3',this,'select_district')">
            <option value="0">选择城市</option>
            <?php if ( ! empty($rt['city']) ) { ?>
            <?php foreach ( $rt['city'] as $row ) { ?>       
            <option value="<?php echo $row['region_id'];?>" <?php echo $rt['userress']['city'] == $row['region_id']? 'selected="selected"' :"";?>>
            <?php echo $row['region_name'];?>
            </option>  
            <?php } } ?>    
        </select>
            
        <select <?php echo ! isset($rt['userress']['district'])? 'style="display: none;"':"";?> name="district" id="select_district" onchange="ger_ress_copy('4',this,'select_town')">            
            <option value="0">选择社区/县</option>
            <?php if ( ! empty( $rt['district'] ) ) { ?>
            <?php foreach ( $rt['district'] as $row ) { ?>
            <option value="<?php echo $row['region_id'];?>" <?php echo $rt['userress']['district'] == $row['region_id']? 'selected="selected"' :"";?>>
            <?php echo $row['region_name']; ?>
            </option>  
            <?php } } ?>                                                    
        </select>
        </td>
        </tr>

        <tr>
            <td class="label">详细地址：</td>
            <td>
            <input name="address" value="<?php echo isset($rt['userress']['address']) && ! empty($rt['userress']['address']) ? $rt['userress']['address'] : ""; ?>" size="40" type="text" />
             </td>
        </tr>
        <tr>
            <td class="label">邮编：</td>
            <td>
            <input name="zipcode" value="<?php echo isset($rt['userress']['zipcode']) && ! empty($rt['userress']['zipcode']) ? $rt['userress']['zipcode'] : ""; ?>" size="40" type="text" />
             </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><label>
              <input type="submit" value="<?php echo $type=='edit' ? '确认修改' : '确认添加';?>" class="submit"/>
            </label></td>
        </tr>
        </table>
</form>
</div>
<script language="javascript">
$('.submit').click(function(){
    user = $('input[name="user_name"]').val();
    if(typeof(user)=='undefined' || user==""){
        //alert("昵称不能为空！");
        //return false;
    }
    
/*  pass = $('input[name="password"]').val();
    if(typeof(pass)=='undefined' || pass==""){
        <?php if($type=='add'){?>
        alert("密码不能空！");
        return false;
        <?php } ?>
    }
    
    if(pass.length<6){
        <?php if($type=='add'){?>
        alert("密码过于短，至少6位！");
        return false;
        <?php } ?>
    }
    
    cf_pass = $('#confirm_pass').val();
    if(pass!=cf_pass){
        alert("两次密码不相同！");
        return false;
    }*/
    
    return true;
});



function ger_ress_copy(type,obj,seobj){
    parent_id = $(obj).val();
    if(parent_id=="" || typeof(parent_id)=='undefined'){ return false; }
    $.post('user.php',{action:'get_ress',type:type,parent_id:parent_id},function(data){
        if(data!=""){
            $(obj).parent().find('#'+seobj).html(data);
            
            if(type==5){ //村
                $(obj).parent().find('#'+seobj).show();
                $(obj).parent().find('#select_peisong').hide();
            }else if(type==4){ //城镇
                $(obj).parent().find('#select_village').hide();
                $(obj).parent().find('#select_village').html('<option value="0" >选择村</option>');
                $(obj).parent().find('#select_peisong').hide();
                
                $(obj).parent().find('#select_town').show();
                //$(obj).parent().find('#select_town').html("");
            }else if(type==3){ //区
                $(obj).parent().find('#select_peisong').hide();
                $(obj).parent().find('#select_peisong').html('<option value="0" >选择配送店</option>');
                
                $(obj).parent().find('#select_village').hide();
                $(obj).parent().find('#select_village').html('<option value="0" >选择村</option>');
                
                $(obj).parent().find('#select_town').hide();
                $(obj).parent().find('#select_town').html('<option value="0" >选择城镇</option>');
                
                $(obj).parent().find('#select_district').show();
                //$(obj).parent().find('#select_district').html("");
                
            }else if(type==2){ //市
                $(obj).parent().find('#select_peisong').hide();
                $(obj).parent().find('#select_peisong').html('<option value="0" >选择配送店</option>');
                
                $(obj).parent().find('#select_village').hide();
                $(obj).parent().find('#select_village').html('<option value="0" >选择村</option>');
                
                $(obj).parent().find('#select_town').hide();
                $(obj).parent().find('#select_town').html('<option value="0" >选择城镇</option>');
                
                $(obj).parent().find('#select_district').hide();
                $(obj).parent().find('#select_district').html('<option value="0" >选择区</option>');
                
                //$(obj).parent().find('#select_city').hide();
                //$(obj).parent().find('#select_city').html("");
            }

        }else{
            alert(data);
        }
    });
}
function change_user_points_money(uid,thisobj,type,wallet_id){
    val = $(thisobj).val();
    if(val>0 || val<0){
        if(confirm("你确定执行该操作吗？")){
            createwindow();
            $.post('user.php',{action:'change_user_points_money',uid:uid,type:type,val:val,wallet_id:wallet_id},function(data){
                if(typeof(data)!='undefined' && data!=""){
                    removewindow();
                    if(parseInt(data)>0){
                        if(type=='money'){
                            $(thisobj).parent().find('.thismoney').html(data);
                        }else if(type =='points'){
                            $(thisobj).parent().find('.thispoints').html(data);
                        }
                    }
                    alert("操作成功！");
                }else{
                    alert("操作失败！");
                }
            });
        }
    }
    return false;
}

  function get_userpoint_page_list(page,uid){
        createwindow();
        $.post('user.php',{action:'pointinfo',page:page,uid:uid},function(data){
            removewindow();
            if(data !="" && typeof(data)!='undefined'){
                $('.user_point').html(data);
            }
        });
  }
  
  function get_usermoney_page_list(page,uid,wallet_id){
        createwindow();
        $.post('user.php',{action:'mymoney',page:page,uid:uid,wallet_id:wallet_id},function(data){
            removewindow();
            if(data !="" && typeof(data)!='undefined'){
                if( wallet_id == 1 ){
                    $('.user_money1').html(data);
                }
                if( wallet_id == 2 ){
                    $('.user_money2').html(data);
                }
                if( wallet_id == 3 ){
                    $('.user_money3').html(data);
                }
                if( wallet_id == 4 ){
                    $('.user_money4').html(data);
                }
                if( wallet_id == 5 ){
                    $('.user_money5').html(data);
                }
                if( wallet_id == 6 ){
                    $('.user_money6').html(data);
                }
                if( wallet_id == 7 ){
                    $('.user_money7').html(data);
                }
                if( wallet_id == 8 ){
                    $('.user_money8').html(data);
                }
            }
        });
}
</script>
