<script charset="utf-8" src="<?php echo ADMIN_URL?>kindeditor-4.1.10/kindeditor.js"></script>
<script charset="utf-8" src="<?php echo ADMIN_URL?>kindeditor-4.1.10/lang/zh_CN.js"></script>
<script>
    //编辑器用
    var editor;
    KindEditor.ready(function(K) {
        editor = K.create('textarea[name="goods_desc"]', {
            resizeType : 1,
            width : '95%',
            height : '500px',
            allowPreviewEmoticons : false,
            allowImageUpload : true,
            allowFileManager : true,
            afterBlur: function(){this.sync();}
        });
    });
</script>

<div class="contentbox">
<style type="text/css">
.menu_content .tab { display:none }
.nav .active
{
    background-color:#F5F5F5;
} 
.nav .other
{
    background-color:#E9E9E9;
} 
h2.nav{ border-bottom:1px solid #B4C9C6;font-size:13px; height:25px; line-height:25px; margin-top:0px; margin-bottom:0px}
h2.nav a{ color:#999999; display:block; float:left; height:24px;width:113px; text-align:center; margin-right:1px; margin-left:1px; cursor:pointer}
.addi{ margin:0px; padding:0px; }
.vipprice td{ border-bottom:1px dotted #ccc }
.vipprice th{ background-color: #EEF2F5 }
</style>
<form action="" method="post" enctype="multipart/form-data" name="theForm" id="theForm">
 <h2 class="nav">
 <a class="active" onclick="show_hide('1'); return false;">通用属性</a>  
<a class="other" onclick="show_hide('2'); return false;">其他信息</a>
<!--  <a class="other" onclick="show_hide('3'); return false;">商品属性</a>  -->
</h2>

<div class="menu_content">
    <!--start 通用信息-->
     <table cellspacing="2" cellpadding="5" width="100%" id="tab1">
      <tr>
        <td class="label">商品名称:</td>
        <td><input name="goods_name" id="goods_name"  type="text" size="43" value="<?php echo isset($rt['goods_name']) ? $rt['goods_name'] : '';?>"><span style="color:#FF0000">*</span><span class="goods_name_mes"></span>
        &nbsp;&nbsp;&nbsp;<b>商品条形码:</b><input name="goods_sn" id="goods_sn"  type="text" size="23" value="<?php echo isset($rt['goods_sn']) ? $rt['goods_sn'] : '';?>">
        <b>商品编号:</b><input name="goods_bianhao" id="goods_bianhao"  type="text" size="23" value="<?php echo isset($rt['goods_bianhao']) ? $rt['goods_bianhao'] : '';?>">
        </td>
      </tr>
      <tr>
        <td class="label" width="150">短描述:</td>
        <td><textarea name="sort_desc" style="width:95%;height:40px;"><?php echo isset($rt['sort_desc']) ? $rt['sort_desc'] : ''; ?></textarea>      
        </td>
      </tr>
      <tr>
        <td class="label">商品专区：</td>
        <td>
        <input type="radio" name="goods_zone" value="1" <?php echo $rt['goods_zone'] == 1 ? 'checked' : ''; ?> />分销专区
        <input type="radio" name="goods_zone" value="2" <?php echo $rt['goods_zone'] == 2 ? 'checked' : ''; ?> />会员专区
        </td>
      </tr>
      <tr>
        <td class="label">商品单位：</td>
        <td>
        <input name="goods_unit" value="<?php echo isset($rt['goods_unit']) ? $rt['goods_unit'] : '';?>" size="20" type="text" />
        <b>商品重量：</b><input name="goods_weight" value="<?php echo isset($rt['goods_weight']) ? $rt['goods_weight'] : '0.000';?>" size="20" type="text" /> (克)
        </td>
      </tr>
    <tr>
        <td class="label">商品库存数量：</td>
        <td><input name="goods_number" value="<?php echo isset($rt['goods_number']) ? $rt['goods_number'] : '10';?>" size="20" type="text" />
        <b>库存警告数量：</b><input name="warn_number" value="<?php echo isset($rt['warn_number']) ? $rt['warn_number'] : '1';?>" size="20" type="text"></td>
    </tr>
    <tr>
        <td class="label" width="150"><a href="javascript:;" class="addsubcate">[+]</a>所在分类:</td>
        <td>
         <select name="cat_id" id="cat_id">
        <option value="0">--选择分类--</option>
        <?php 
        if ( ! empty( $catelist ) ) {
        foreach ( $catelist as $row ) {
        ?>
        <option value="<?php echo $row['id'];?>" <?php if ( isset($rt['cat_id'] ) && $rt['cat_id'] == $row['id'] ) { echo 'selected="selected""'; } ?>> <?php echo $row['name'];?> </option>
            <?php 
                if ( ! empty( $row['cat_id'] ) ) {
                foreach ( $row['cat_id'] as $rows ) {
            ?>
                    <option value="<?php echo $rows['id'];?>"  <?php if(isset($rt['cat_id'])&&$rt['cat_id']==$rows['id']){ echo 'selected="selected""'; } ?>>&nbsp;&nbsp;<?php echo $rows['name'];?></option>
                    <?php 
                    if ( ! empty( $rows['cat_id'] ) ) {
                    foreach ( $rows['cat_id'] as $rowss ) {
                    ?>
                        <option value="<?php echo $rowss['id'];?>"  <?php if(isset($rt['cat_id'])&&$rt['cat_id']==$rowss['id']){ echo 'selected="selected""'; } ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowss['name'];?>
                        </option>
                                                    
                        <?php 
                        if ( ! empty( $rows['cat_id'] ) ) {
                        foreach ( $rowss['cat_id'] as $rowsss ) {
                        ?>
                            <option value="<?php echo $rowsss['id'];?>" <?php if(isset($rt['cat_id'])&&$rt['cat_id']==$rowsss['id']){ echo 'selected="selected""'; } ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowsss['name'];?></option>
                                
                        <?php
                            }//end foreach
                            }//end if
                        ?>

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
     </select>&nbsp;【关键字搜索<input type="text" class="searchval" style="width:100px; border:1px solid #330066" />
     <input type="button" value=" 搜索 "  style="cursor:pointer" onclick="ajax_cate_name(this)"/>】
     <em style="color:#FF0000">点击[+]增加一个额外分类</em>       </td>
      </tr>
      <?php
      if ( isset( $subcatelist ) && ! empty( $subcatelist ) ) {
          ?>
         <tr>
            <td class="label" width="15%">其他子分类:</td>
            <td width="85%">
            <?php 
                foreach ( $subcatelist as $rr ) {
                echo '<a href="javascript:;" onclick="return del_subcate(\''.$rr['cat_id'].'\',\''.$rr['goods_id'].'\',this);">'.$rr['cat_name'].'[<font color=red>删除</font>]</a>&nbsp;&nbsp;&nbsp;';
                }
            ?>
            </td>
         </tr>
          <?php
      }
      ?>
    <tr>
    <td class="label">商家名称:</td>
    <td>
    <select name="store_id">
        <option value="0">--选择商家--</option>
        <?php 
            if ( ! empty( $uidlist ) ) {
            foreach ( $uidlist as $row ) {
        ?>
        <option value="<?php echo $row['store_id'];?>" <?php if(isset($rt['store_id'])&&$rt['store_id']==$row['store_id']){ echo 'selected="selected""'; } ?>><?php echo $row['store_name'];?></option>
        <?php } } ?>
    </select>
    　　选择商家将按照商家的所属钱包为准
    </td>
    </tr>
    <tr>
    <td class="label">所属钱包:</td>
    <td>
    <select name="wallet_id">
        <?php foreach ( (array)$wallet_list as $k => $v ) { ?>
        <option value="<?php echo $v['wallet_id'];?>" <?php echo $rt['wallet_id'] == $v['wallet_id'] ? 'selected' : ''; ?>><?php echo $v['wallet_name'];?></option>
        <?php } ?>
    </select>
    </td>
    </tr>
      <tr>
        <td class="label">品牌：</td>
        <td>
      <select name="brand_id">
        <option value="0">--选择品牌--</option>
        <?php 
        if ( ! empty( $brandlist ) ) {
        foreach( $brandlist as $row ) { 
        ?>
        <option value="<?php echo $row['id'];?>" <?php if(isset($rt['brand_id'])&&$rt['brand_id']==$row['id']){ echo 'selected="selected""'; } ?>><?php echo $row['name'];?></option>
            <?php 
                if ( ! empty( $row['brand_id'] ) ) {
                foreach ( $row['brand_id'] as $rows ) { 
            ?>
                <option value="<?php echo $rows['id'];?>"  <?php if(isset($rt['brand_id'])&&$rt['brand_id']==$rows['id']){ echo 'selected="selected""'; } ?>>&nbsp;&nbsp;<?php echo $rows['name'];?></option>
                    <?php 
                    if ( ! empty( $rows['brand_id'] ) ) {
                    foreach ( $rows['brand_id'] as $rowss ) {
                    ?>
                        <option value="<?php echo $rowss['id'];?>"  <?php if(isset($rt['brand_id'])&&$rt['brand_id']==$rowss['id']){ echo 'selected="selected""'; } ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowss['name'];?></option>
                            
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
        <td class="label">采购价:</td>
        <td><input name="market_price" id="market_price"  type="text" size="13" value="<?php echo isset($rt['market_price']) ? $rt['market_price'] : '';?>">
        <b>原始价:</b><input name="shop_price" id="shop_price"  type="text" size="13" value="<?php echo isset($rt['shop_price']) ? $rt['shop_price'] : '';?>">
        <b>折扣价:</b><input name="pifa_price" id="pifa_price"  type="text" size="13" value="<?php echo isset($rt['pifa_price']) ? $rt['pifa_price'] : '';?>">
        </td>
      </tr>
      <tr>
      <td class="label" style="color:#FF0000">佣金:</td>
      <td align="left" style="color:#FF0000">
        <ul class="ajaxshowmoney">
            <li style="width:180px; float:left; position:relative; padding-bottom:5px; background:url(<?php echo $this->img('direc.gif');?>) 115px bottom no-repeat">
                <b>普通分销佣金:</b>
                <input name="takemoney1" id="takemoney1" type="text" size="8" value="<?php echo isset($rt['takemoney1']) ? $rt['takemoney1'] : '0.00';?>">元
                <div style="height:90px; width:400px; position:absolute; top:25px; left:42px; z-index:99; background:#ededed; border:1px solid #e4e4e4; display:none">
                  <p style="line-height:21px; padding:5px; margin:0px;">
                 一层分佣&nbsp;&nbsp;<b><?php echo isset($rd['ticheng180_1_1'])&&isset($rd['ticheng180_1_2']) ? $rd['ticheng180_1_1'] . '%*' . $rd['ticheng180_1_2'] . '%' : '0';?></b>&nbsp;&nbsp;<br/>
                 二层分佣&nbsp;&nbsp;<b><?php echo isset($rd['ticheng180_2_1'])&&isset($rd['ticheng180_2_2']) ? $rd['ticheng180_2_1'] . '%*' . $rd['ticheng180_2_2'] . '%' : '0';?></b>&nbsp;&nbsp;<br/>
                 三层分佣&nbsp;&nbsp;<b><?php echo isset($rd['ticheng180_3_1'])&&isset($rd['ticheng180_3_2']) ? $rd['ticheng180_3_1'] . '%*' . $rd['ticheng180_3_2']  . '%' : '0';?></b>(个人累积达到<?php echo $rd['person_accumulative_money'];?>元，达不到，则无佣金)<br/>
                 四层分佣&nbsp;&nbsp;<b><?php echo isset($rd['ticheng180_4_1'])&&isset($rd['ticheng180_4_2']) ? $rd['ticheng180_4_1'] . '%*' . $rd['ticheng180_4_2']  . '%' : '0';?></b>(团队累积达到<?php echo $rd['team_accumulative_money'];?>元，达不到，则无佣金)<br/>
                  </p>
                </div>
            </li>
            <li style="width:100px; float:left"><a style="text-decoration:underline; color:#66CC00" href="<?php echo ADMIN_URL.'weixin.php?type=userconfig';?>" target="_blank">【查看佣金比例】</a></li>
            <div style="clear:both"></div>
        </ul>
    </td>
    </tr>

    <tr>
        <td class="label" style="color:#FF0000">佣金次数:</td>
        <td>
            <input type="text" name="commission_num" id="commission_num" size="5" value="<?php echo $rt['commission_num'] ? : '1'; ?>">
    　　佣金次数默认1次，送牛奶可以设置30，无其他需求请设置1次
        </td>
    </tr>

    <tr>
        <td class="label">上传商品主图:</td>
        <td>
          <?php if(isset($rt['goods_img'])){ ?><img src="<?php echo !empty($rt['goods_img']) ? SITE_URL.$rt['goods_img'] : $this->img('no_picture.gif');?>" width="100" style="padding:1px; border:1px solid #ccc"/><?php } ?>
          <input name="original_img" id="goods" type="hidden" value="<?php echo isset($rt['original_img']) ? $rt['original_img'] : '';?>"/>
          <iframe id="iframe_t" name="iframe_t" border="0" src="upload.php?action=<?php echo isset($rt['original_img'])&&!empty($rt['original_img'])? 'show' : '';?>&ty=goods&files=<?php echo isset($rt['original_img']) ? $rt['original_img'] : '';?>" scrolling="no" width="445" frameborder="0" height="25"></iframe>
        </td>
      </tr>
      <tr>
        <td class="label">商品缩略图:</td>
        <td>
          <?php if(isset($rt['goods_thumb'])){ ?><img src="<?php echo !empty($rt['goods_thumb']) ? SITE_URL.$rt['goods_thumb'] : $this->img('no_picture.gif');?>" width="70" style="padding:1px; border:1px solid #ccc"/><?php } ?>
          <input name="goods_thumb" id="goods_thumb" type="hidden" value="<?php echo isset($rt['goods_thumb']) ? $rt['goods_thumb'] : '';?>"/>
          <iframe id="iframe_t" name="iframe_t" border="0" src="upload.php?action=<?php echo isset($rt['goods_thumb'])&&!empty($rt['goods_thumb'])? 'show' : '';?>&ty=goods_thumb&tyy=goods&files=<?php echo isset($rt['goods_thumb']) ? $rt['goods_thumb'] : '';?>" scrolling="no" width="445" frameborder="0" height="25"></iframe><br /><em>如果留空，那么将以原始图片生成缩略图</em>
        </td>
      </tr>
      <?php if(isset($gallerylist) && !empty($gallerylist)){?>
      <tr>
      <td class="label">&nbsp;</td>
      <td>
      <?php 
        if(!empty($gallerylist)){
        echo "<ul class='gallery'>\n";
        foreach($gallerylist as $row){
            echo '<li style="width:120px; text-align:center; border:1px dashed #ccc; float:left; margin:2px;position:relative;height:140px;overflow:hidden "><img src="'.SITE_URL.$row['img_url'].'" alt="'.$row['img_desc'].'" width="90"/><p align="center">'.$row['img_desc'].'</p><a class="delgallery" id="'.$row['img_id'].'" style="position:absolute; top:2px; right:2px; background-color:#FF3333; display:block; width:35px; height:16px;">删除</a></li>';
        }
        echo "</ul>\n";
        }
      ?>
      </td>
      </tr>
      <?php } ?>
      <tr>
        <td class="label" valign="middle"><a href="javascript:;" class="addgallery">[+]</a>相册名称：</td>
        <td> 
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td align="left">
                    <input type="text" name="photo_gallery_desc[]" value="" size="23"/>
                    <input type="hidden" name="photo_gallery_url[]" id="goodsgallery" value=""/>
                    <input name="goods_thumb" id="goods_thumb" type="hidden" value="<?php echo isset($rt['goods_thumb']) ? $rt['goods_thumb'] : '';?>"/></td>
                    <td align="right"><b>相册图片：</b></td>
                    <td align="left"><iframe id="iframe_t" name="iframe_t" border="0" src="upload.php?action=&ty=goodsgallery&tyy=goods&files=" scrolling="no" width="445" frameborder="0" height="25"></iframe></td>
                </tr>
            </table>
        </td>
        </tr>
        <tr>
        <td class="label" width="150">产品详情:</td>
        <td><textarea id="editor_id" name="goods_desc"><?php echo isset($rt['goods_desc']) ? $rt['goods_desc'] : '';?></textarea>
        </td>
      </tr>
            <tr>
            <td class="label">Meta关键字:</td>
            <td><textarea name="meta_keys" id="meta_keys" style="width: 60%; height: 65px; overflow: auto;"><?php echo isset($rt['meta_keys']) ? $rt['meta_keys'] : '';?></textarea></td>
          </tr>
          <tr>
            <td class="label">Meta描述:</td>
            <td><textarea name="meta_desc" id="meta_desc" style="width: 60%; height: 65px; overflow: auto;"><?php echo isset($rt['meta_desc']) ? $rt['meta_desc'] : '';?></textarea></td>
          </tr>
     </table>
     <!--end 通用信息-->
         
    
     <!--start 其他信息-->
     <table cellspacing="2" cellpadding="5" width="100%" id="tab2" class="tab">
        <!-- <tr>
            <td class="label">加入推荐：</td>
            <td>
            <label><input name="is_best" value="1" type="checkbox" <?php echo isset($rt['is_best'])&&$rt['is_best']==1 ? 'checked="checked"' : '';?>>推荐</label>
            <label><input name="is_new" value="1" type="checkbox" <?php echo isset($rt['is_new'])&&$rt['is_new']==1 ? 'checked="checked"' : '';?>>新品</label>
            <label><input name="is_hot" value="1" type="checkbox" <?php echo isset($rt['is_hot'])&&$rt['is_hot']==1 ? 'checked="checked"' : '';?>>热销</label>
            </td>
        </tr> -->
          <!--  <tr>
            <td class="label"><label><input type="checkbox" id="is_promote" name="is_promote" value="1"  onclick="handlePromote(this.checked);" <?php echo isset($rt['is_promote'])&&$rt['is_promote']==1 ? 'checked="checked"' : '';?>/> 促销价格：</label></td>
            <td>
            <input name="promote_price" value="<?php echo isset($rt['promote_price']) ? $rt['promote_price'] : '0.00';?>" size="20" type="text" <?php echo isset($rt['is_promote'])&&$rt['is_promote']==1 ? '' : 'disabled="disabled" style="background-color:#ededed"';?>  onchange="checkvar(this)"/>
            </td>
          </tr> -->
          <!-- <tr>
          <td class="label">促销日期:</td>
          <td>
            <input type="text" name="promote_start_date" id="df" value="<?php echo !empty($rt['promote_start_date']) ? date('Y-m-d',$rt['promote_start_date']) : date('Y-m-d',mktime());?>" <?php echo isset($rt['is_promote'])&&$rt['is_promote']==1 ? '' : 'disabled="disabled" style="background-color:#ededed"';?> onClick="WdatePicker()"/>
            <?php
             $hs = date('G',$rt['promote_start_date']);
             $is = date('i',$rt['promote_start_date']);
             $ss = date('s',$rt['promote_start_date']);
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
             $hs = date('G',$rt['promote_end_date']);
             $is = date('i',$rt['promote_end_date']);
             $ss = date('s',$rt['promote_end_date']);
             ?>
            <input type="text" name="promote_end_date" id="dt" value="<?php echo !empty($rt['promote_end_date']) ? date('Y-m-d',$rt['promote_end_date']) : date('Y-m-d',mktime()+7*24*3600);?>" <?php echo isset($rt['is_promote'])&&$rt['is_promote']==1 ? '' : 'disabled="disabled" style="background-color:#ededed"';?> onClick="WdatePicker()"/>
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
          </tr> -->
           <!-- <tr>
            <td class="label"><label><input type="checkbox" id="is_qianggou" name="is_qianggou" value="1"  onclick="handleqianggou(this.checked);" <?php echo isset($rt['is_qianggou'])&&$rt['is_qianggou']==1 ? 'checked="checked"' : '';?>/> 抢购价格：</label></td>
            <td>
            <input name="qianggou_price" value="<?php echo isset($rt['qianggou_price']) ? $rt['qianggou_price'] : '0.00';?>" size="20" type="text" <?php echo isset($rt['is_qianggou'])&&$rt['is_qianggou']==1 ? '' : 'disabled="disabled" style="background-color:#ededed"';?>  onchange="checkqianggouvar(this)"/>
            </td>
          </tr> -->
          <!-- <tr>
          <td class="label">抢购日期:</td>
          <td>
            <input type="text" name="qianggou_start_date" id="dff" value="<?php echo !empty($rt['qianggou_start_date']) ? date('Y-m-d',$rt['qianggou_start_date']) : date('Y-m-d',mktime());?>" <?php echo isset($rt['is_qianggou'])&&$rt['is_qianggou']==1 ? '' : 'disabled="disabled" style="background-color:#ededed"';?> onClick="WdatePicker()"/>&nbsp;-&nbsp;
            <input type="text" name="qianggou_end_date" id="dtt" value="<?php echo !empty($rt['qianggou_end_date']) ? date('Y-m-d',$rt['qianggou_end_date']) : date('Y-m-d',mktime()+7*24*3600);?>" <?php echo isset($rt['is_qianggou'])&&$rt['is_qianggou']==1 ? '' : 'disabled="disabled" style="background-color:#ededed"';?> onClick="WdatePicker()"/>&nbsp;<em>点击文本选择日期。</em>
          </td>
          </tr> -->
          <tr>
            <td class="label"><label><input type="checkbox" id="is_jifen" name="is_jifen" value="1"  onclick="handlejifen(this.checked);" <?php echo isset($rt['is_jifen'])&&$rt['is_jifen']==1 ? 'checked="checked"' : '';?>/> 积分商品：</label></td>
            <td>
            所需积分<input name="need_jifen" value="<?php echo isset($rt['need_jifen']) ? $rt['need_jifen'] : '0';?>" size="20" type="text" <?php echo isset($rt['is_jifen'])&&$rt['is_jifen']==1 ? '' : 'disabled="disabled" style="background-color:#ededed"';?> onkeyup="value=value.replace(/[^\d]/g,'');" />
            </td>
          </tr>
<!--          <tr>
            <td class="label">是否为赠品</td>
            <td><label><input name="is_alone_sale" value="1" type="checkbox" <?php echo isset($rt['is_alone_sale']) && empty($rt['is_alone_sale']) ? 'checked="checked"' : '';?> onclick="handlegift(this.checked)"> 打勾表示此商品可以作为赠品或者低价格销售，或者购物额度达到一定程度可以以此商品赠送。</label></td>
          </tr>
          <tr<?php echo (isset($rt['is_alone_sale']) && empty($rt['is_alone_sale'])) ? '' : ' style="display:none"';?> class="showgift">
          <td class="label"><a href="javascript:;" class="addgift_type">[+]点击增加</a></td>
          <td>
            <select name="gift_type[]">
            <option value="0">选择一个赠品的类型</option>
            <?php 
            if(!empty($rt['gift_typesd'])){
            foreach($rt['gift_typesd'] as $k=>$ro){
            ?>
            <option value="<?php echo ++$k;?>"><?php echo $ro['gname'];?></option>
            <?php } } ?>
            </select>
          </td>
          </tr>
          <tr><td>&nbsp;</td><td>
            <?php
            if($rt['gift_type_id']){
                foreach($rt['gift_type_id'] as $id){
                echo '<a href="javascript:;" onclick="delgoodsgift(\''.$rt['goods_id'].'\',\''.$id.'\',this)">'.$rt['gift_typesd'][$id-1]['gname'].'[<font color=red>删除</font>]</a>&nbsp;&nbsp;&nbsp;';
                }
            }
            ?>
          </td></tr>-->
         <!-- <tr>
            <td class="label">点击编辑会员价:</td>
            <td>
            <div style="text-align:left; position:relative">
            <a href="javascript:void(0)" onclick="$('.vipprice').toggle()" style="color:#FF0000; border-bottom:2px solid #ccc; border-right:2px solid #ccc; padding:3px; background-color:#FAFAFA"><img src="<?php echo $this->img('icon_edit.gif');?>" align="absmiddle"/>编辑价格</a>
            <table cellspacing="2" cellpadding="2" width="100%" class="vipprice" style="border:6px solid #CAD9E6; border-top:21px solid #CAD9E6;height:auto; width:400px; background-color:#fafafa; display:none; position:absolute; top:0px; left:0px;">
            <tr>
                <th>会员等级</th><th>会员价格</th>
            </tr>
            <?php
             if(!empty($userrank)){
             foreach($userrank as $row){
            ?>
            <tr>
            <td width="50%"><?php echo $row['level_name'];?></td>
            <td width="50%">
                <input type="hidden" name="numberrank[]" value="<?php echo $row['lid'];?>"/>
              ￥<input type="text" name="numberprice[]" value="<?php echo isset($userprice[$row['lid']]) ? $userprice[$row['lid']] : '0.00';?>"/>
            </td>
            </tr>
            <?php } } ?>
            <tr>
                <td align="center" colspan="2" bordercolor="#EEF2F5"><span style=" float:right"><img src="<?php echo $this->img('digclose.jpg');?>" onclick="$('.vipprice').hide(200)"/></span><a href="javascript:void(0)" onclick="$('.vipprice').hide(200)" style="color:#FF0000; border-bottom:2px solid #ccc; border-right:2px solid #ccc; padding:3px; background-color:#ededed">确定</a></td>
            </tr>
            </table>
            </div>
            </td>
          </tr>
         <tr>
            <td class="label"><label><input type="checkbox" id="is_jifen" name="is_jifen" value="1"  onclick="handlejifen(this.checked);" <?php echo isset($rt['is_jifen'])&&$rt['is_jifen']==1 ? 'checked="checked"' : '';?>/> 积分商品：</label></td>
            <td>
            所需积分<input name="need_jifen" value="<?php echo isset($rt['need_jifen']) ? $rt['need_jifen'] : '0';?>" size="20" type="text" <?php echo isset($rt['is_jifen'])&&$rt['is_jifen']==1 ? '' : 'disabled="disabled" style="background-color:#ededed"';?> />
            </td>
          </tr>-->
          <!--<tr id="alone_sale_1">
            <td class="label" id="alone_sale_2">上架：</td>
            <td id="alone_sale_3">
            <label><input name="is_on_sale" value="1" <?php echo !isset($rt['is_on_sale'])||$rt['is_on_sale']==1 ? 'checked="checked"' : '';?> type="checkbox"> 打勾表示允许销售，否则不允许销售。</label>
            </td>
          </tr>
          <tr>
            <td class="label">是否为免运费商品</td>
            <td><label><input name="is_shipping" value="1" type="checkbox" <?php echo isset($rt['is_shipping'])&&$rt['is_shipping']==1 ? 'checked="checked"' : '';?>> 打勾表示此商品不会产生运费花销，否则按照正常运费计算。</label></td>
          </tr>
          <tr>
            <td class="label">商品赠送：</td>
            <td>
            <input name="buy_more_best" value="<?php echo isset($rt['buy_more_best']) ? $rt['buy_more_best'] : '';?>"> <em>如：买10送2</em>
            </td>
          </tr>
          <tr><td colspan="2" style="border-bottom:1px dotted #FFCCCC"></td></tr>
          -->
         <tr>
            <td colspan="2"><hr /></td>
        </tr>
         <?php
       if(isset($rt['goods_attr'])&&!empty($rt['goods_attr'])){
       foreach($rt['goods_attr'] as $row){
       if(empty($row)) continue;
      ?>
        <tr>
        <td width="150" class="label"><?php echo $row[0]['attr_name']?>:</td>
        <td>
        <?php 
        foreach($row as $rows){
            echo "<span>";
            if(is_file(SYS_PATH.$rows['attr_addi'])){ //是图片
        ?>
        <img  src="<?php echo SITE_URL.$rows['attr_addi'];?>" alt="<?php echo $rows['attr_value'];?>" width="70"/>
            <?php
             if($rows['attr_is_select']==3){ //复选
                echo '<input type="checkbox" value="'.$rows['goods_attr_id'].'" class="delattr"/>'.$rows['attr_value'];
             }elseif($rows['attr_is_select']==2){ //单选
                 echo '<input type="radio" value="'.$rows['goods_attr_id'].'" class="delattr"/>'.$rows['attr_value'];
             }else{
                echo $rows['attr_value'].'<input type="checkbox" value="'.$rows['goods_attr_id'].'" class="delattr"/>点击删除';
             }
             ?>
        <?php   
            }else{ //文本的
                if($rows['attr_is_select']==3){ //复选
                    echo '<input type="checkbox" value="'.$rows['goods_attr_id'].'" class="delattr"/>'.$rows['attr_value']."=>".$rows['attr_addi'];
                 }elseif($rows['attr_is_select']==2){ //单选
                    echo '<input type="radio" value="'.$rows['goods_attr_id'].'" class="delattr"/>'.$rows['attr_value']."=>".$rows['attr_addi'];
                 }else{
                    echo $rows['attr_value'].'<input type="checkbox" value="'.$rows['goods_attr_id'].'" class="delattr"/>点击删除';
                 }
            }
            echo "</span>&nbsp;&nbsp;";
        }
        ?>
        </td>
        </tr>
      <?php } }?>

        <?php
         if(!empty($attr_list)){
        foreach($attr_list as $row){
        ?>
        <!-- <tr>
        <td class="label" style="border-right:1px dashed #ccc"  width="150">
        <?php if($row['attr_is_select']==2 || $row['attr_is_select']==3) echo '<a href="javascript:;" class="addaddi">[+]</a>';?>
        <?php echo $row['attr_name']; ?>
        </td>
        <td style="border-bottom:1px dashed #ccc">
        <input name="attr_id_list[]" value="<?php echo $row['attr_id'];?>" type="hidden">
        <?php
        if($row['input_type']==1){
        echo '<input name="attr_value_list[]" value="" size="40" type="text">'."\n"; //文本域
        }elseif($row['input_type']==2){
            $values = $row['input_values'];
            if(!empty($values)){
             $val_ar = @explode("\n",$values);
               echo '<select name="attr_value_list[]" class="select" onchange="setvar(this)">'."\n";
               echo '<option value="">--选择--</option>'."\n";
                foreach($val_ar as $val){
                    if(empty($val)) continue;
                    $val = str_replace(array("\n","\r\t"),"",trim($val));
                    echo '<option value="'.$val.'" id="'.Import::basic()->Pinyin($val).'">'.$val.'</option>'."\n";
                }
               echo '</select>'."\n";
            }
        }elseif($row['input_type']==3){
            echo '<textarea name="attr_value_list[]" cols="35" rows="5"></textarea>'."\n";
        }
        //是否显示附加功能
        if($row['is_show_addi']==1){
            if($row['attr_is_select']==2 || $row['attr_is_select']==3){
                    echo '<p class="addi"><input name="attr_addi_list[]" value="" type="hidden"></p>';
                    echo '
                          <select onchange="show_addi_type(this)">
                            <option value="">-选择类型-</option>
                            <option value="1">文本域</option>
                            <option value="2">文件域</option>
                          </select>';
            }else{
                    echo '<input name="attr_addi_list[]" value="" type="hidden">'."\n";
            }
        }else{
            echo '<input name="attr_addi_list[]" value="" type="hidden">'."\n";
        }
        ?>
        </td>
        </tr> -->
      <?php } } ?>
          <tr><td colspan="2" style="border-top:1px dotted #FFCCCC"></td></tr>
     </table>
      <!--end 其他信息-->
<!--      <table cellspacing="2" cellpadding="5" width="100%" id="tab3" class="tab">

     </table>-->
      <p style="text-align:center;">
        <input class="new_save" value="<?php echo $type=='newedit' ? '修改' : '添加';?>保存" type="Submit" style="cursor:pointer" />&nbsp;
      </p>
      <div style="clear:both"></div>
 </div> 
  </form>
</div>

<?php  $thisurl = ADMIN_URL.'goods.php'; ?>
<script type="text/javascript">
<!--
//jQuery(document).ready(function($){
    $('.new_save').click(function(){
        art_title = $('#goods_name').val();
        if(art_title=='undefined' || art_title==""){
            $('.goods_name_mes').html("标题不能为空！");
            $('.goods_name_mes').css('color','#FE0000');
            return false;
        }
        return true;
    });
    
function show_hide(id){
    len = $('.nav a').length;
    if(len>1){
        for(i=1;i<=len;i++){
            if(i==id) { 
                $($('.nav a')[i-1]).removeClass();
                $($('.nav a')[i-1]).addClass('active');
                $("#tab"+id).css('display','block');
            }else{
                $($('.nav a')[i-1]).removeClass();
                $($('.nav a')[i-1]).attr('class',"other");
                $("#tab"+i).css('display','none');
            }
        }
    }
}


function show_addi_type(obj){
    var upvar = $(obj).parent().parent().find('.select option:selected').attr('id'); //获取下拉选中的id值
    if(upvar=="" || typeof(upvar)=='undefined'){ alert("请先选择"); return false; }
    thisvar = $(obj).val();
     if(thisvar==1){
        $(obj).parent().find('.addi').html('<input name="attr_addi_list[]" value="" size="40" type="text">附加文本');
    }else if(thisvar==2){
        $(obj).parent().find('.addi').html('<input name="attr_addi_list[]" id="goodsaddi'+upvar+'" value="" type="hidden"><iframe id="iframe_t" name="iframe_t" border="0" src="upload.php?action=&ty=goodsaddi'+upvar+'&tyy=goodsaddi&files=" scrolling="no" width="445" frameborder="0" height="25"></iframe>附加图像');
    }else{
        $(obj).parent().find('.addi').html('<input name="attr_addi_list[]" value="" type="hidden">');
    }

    return true;
}

function setvar(obj){
    var thisvar = $(obj).parent().find('.select option:selected').attr('id');
    var setobj = $(obj).parent().find('input[name="attr_addi_list[]"]');
    if(typeof(setobj)!='undefined'){
        setobj.attr('id','goodsaddi'+thisvar);
    }
}
/*增删加控件*/
$('.addaddi').live('click',function(){
    var upvar = $(this).parent().parent().find('.select').val();
    if(upvar=="" || typeof(upvar)=='undefined'){ alert("请先选择"); return false; }
    str = $(this).parent().parent().html();
    str = str.replace('addaddi','removeaddi');
    str= str.replace('[+]','[-]');
    $(this).parent().parent().after('<tr>'+str+'</tr>');
});

$('.removeaddi').live('click',function(){
    $(this).parent().parent().remove();
    return false;
});

//删除该商品的属性
$('.delattr').click(function(){
        ids = $(this).val();
        thisobj = $(this).parent();
        if(confirm("确定删除吗")){
            $('.openwindow').show(200);
            $.post('<?php echo $thisurl;?>',{action:'goods_attr_item_del',id:ids},function(data){
                $('.openwindow').hide(200);
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

//删除相册图片
$('.delgallery').click(function(){
        ids = $(this).attr('id');
        thisobj = $(this).parent();
        if(confirm("确定删除吗")){
            $('.openwindow').show(200);
            $.post('<?php echo $thisurl;?>',{action:'delgallery',id:ids},function(data){
                $('.openwindow').hide(200);
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

/*增删相册控件*/
$('.addgallery').live('click',function(){
    rand = generateMixed(4);
    str = $(this).parent().parent().html();
    str = str.replace('addgallery','removegallery');
    str = str.replace('[+]','[-]');
    str = str.replace(/goodsgallery/g,'goodsgallery'+rand); //正则表达式替换多个
    $(this).parent().parent().after('<tr>'+str+'</tr>');
});

$('.removegallery').live('click',function(){
    $(this).parent().parent().remove();
    return false;
});

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

/*增删子分类控件*/
    $('.addsubcate').live('click',function(){
        var upvar = $(this).parent().parent().find('#cat_id').val();
        if(upvar=="0" || typeof(upvar)=='undefined'){ alert("请先选择"); return false; }
        str = $(this).parent().parent().html();
        str = str.replace('addsubcate','removesubcate');
        str = str.replace('点击[+]增加一个','点击[-]减少一个');
        str = str.replace(/cat_id/g,'sub_cat_id[]');
        str= str.replace('[+]','[-]');
        $(this).parent().parent().after('<tr>'+str+'</tr>');
    });
    
    $('.removesubcate').live('click',function(){
        $(this).parent().parent().remove();
        return false;
    });
    
    function del_subcate(cid,gid,obj){
        if(confirm("确定删除吗？")){
           $.post('<?php echo $thisurl;?>',{action:'del_subcate_id',cid:cid,gid:gid},function(data){
            if(data == ""){
                $(obj).hide(200);
            }else{
                alert(data);
            }
            });
        }else{
            return false;
        }
    }
    
    function handlePromote(checked){
        document.forms['theForm'].elements['promote_price'].disabled = !checked;
        document.forms['theForm'].elements['promote_start_date'].disabled = !checked;
        document.forms['theForm'].elements['promote_end_date'].disabled = !checked;
        if(checked==true){
            $('input[name="promote_price"]').css('background-color','#FFF');
            $('input[name="promote_start_date"]').css('background-color','#FFF');
            $('input[name="promote_end_date"]').css('background-color','#FFF');
        }else{
            $('input[name="promote_price"]').css('background-color','#EDEDED');
            $('input[name="promote_start_date"]').css('background-color','#EDEDED');
            $('input[name="promote_end_date"]').css('background-color','#EDEDED');
        }
        //document.forms['theForm'].elements['selbtn1'].disabled = !checked;
        //document.forms['theForm'].elements['selbtn2'].disabled = !checked;
    }
    
    function checkvar(obj){ 
        thisvar = $(obj).val();
        if(thisvar>0){
        }else{
        $(obj).val("0.00");
        }
    }
    
    function handlejifen(checked){
        document.forms['theForm'].elements['need_jifen'].disabled = !checked;
        if(checked==true){
            $('input[name="need_jifen"]').css('background-color','#FFF');
        }else{
            $('input[name="need_jifen"]').css('background-color','#EDEDED');
        }
    }
    

function handleqianggou(checked){
        document.forms['theForm'].elements['qianggou_price'].disabled = !checked;
        document.forms['theForm'].elements['qianggou_start_date'].disabled = !checked;
        document.forms['theForm'].elements['qianggou_end_date'].disabled = !checked;
        if(checked==true){
            $('input[name="qianggou_price"]').css('background-color','#FFF');
            $('input[name="qianggou_start_date"]').css('background-color','#FFF');
            $('input[name="qianggou_end_date"]').css('background-color','#FFF');
        }else{
            $('input[name="qianggou_price"]').css('background-color','#EDEDED');
            $('input[name="qianggou_start_date"]').css('background-color','#EDEDED');
            $('input[name="qianggou_end_date"]').css('background-color','#EDEDED');
        }
        //document.forms['theForm'].elements['selbtn1'].disabled = !checked;
        //document.forms['theForm'].elements['selbtn2'].disabled = !checked;
    }
    
    function checkqianggouvar(obj){ 
        thisvar = $(obj).val();
        if(thisvar>0){
        }else{
        $(obj).val("0.00");
        }
    }
    
/*增删加控件*/
$('.addgift_type').live('click',function(){
    str = $(this).parent().parent().html();
    str = str.replace('addgift_type','removeaddgift_type');
    str= str.replace('[+]','[-]');
    $(this).parent().parent().after('<tr class="showgift">'+str+'</tr>');
});

$('.removeaddgift_type').live('click',function(){
    $(this).parent().parent().remove();
    return false;
});
function handlegift(checked){
    if(checked==true){
        //$('.showgift').css('display','block');
        $('.showgift').show();
    }else{
        //$('.showgift').css('display','none');
        $('.showgift').hide();
    }
}

function delgoodsgift(gid,ids,obj){
        if(confirm("确定删除吗？")){
           $.post('<?php echo $thisurl;?>',{action:'delgoodsgift',goods_id:gid,giftid:ids},function(data){
            if(data == ""){
                $(obj).remove()
            }else{
                alert(data);
            }
            });
        }else{
            return false;
        }
}
//});

function ajax_cate_name(obj){
    va = $(obj).parent().find('.searchval').val();
    $.post('<?php echo $thisurl;?>',{action:'ajax_cate_name',searchval:va},function(data){
        if(data == ""){
            alert("未找到！");
        }else{
            $(obj).parent().find('select').html(data);
        }
    });
}

$('.ajaxshowmoney li input').focus(function(){
    $(this).parent().find('div').show();
});
$('.ajaxshowmoney li input').blur(function(){
    $(this).parent().find('div').hide();
});
-->
</script>
