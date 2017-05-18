<div id="wrap">
	<div class="clear7"></div>
    <?php $this->element('user_menu');?>
    <div class="m_right">
		  <style type="text/css">
			.menu_content .tab{ display:none}
			.nav .active{
				 /*background: url(<?php echo $this->img('manage_r2_c13.jpg');?>) no-repeat;*/
				 background-color:#F5F5F5;
				 margin-top:2px;
			} 
			.nav .other{
				/* background: url(<?php echo $this->img('manage_r2_c14.jpg');?>) no-repeat;*/
				 background-color:#E9E9E9;
			} 
			h2.nav{ border-bottom:1px solid #B4C9C6;font-size:13px; height:25px; line-height:25px; margin-top:0px; margin-bottom:0px}
			h2.nav a{ color:#999999; display:block; float:left; height:24px;width:113px; text-align:center; margin-right:1px; margin-left:1px; cursor:pointer; border:1px solid #ccc; border-bottom:none}
			.addi{ margin:0px; padding:0px;}
			.vipprice td{ border-bottom:1px dotted #ccc}
			.vipprice th{ background-color:#EEF2F5}
			.label{ font-weight:bold; text-align:right}
			</style>
			<form action="" method="post" enctype="multipart/form-data" name="theForm" id="theForm">
			 <h2 class="nav">
			 <a class="active" onclick="show_hide('1'); return false;">通用属性</a>  
			 <a class="other" onclick="show_hide('2'); return false;">详情描述</a>  
			 <a class="other" onclick="show_hide('3'); return false;">其他信息</a> 
			 <a class="other" onclick="show_hide('4'); return false;">商品属性</a> 
			 <a class="other" onclick="show_hide('5'); return false;">商品相册</a> 
			</h2>
			
			 <div class="menu_content" style="border:1px solid #ccc">
				<!--start basic info-->
				 <table cellspacing="2" cellpadding="5" width="100%" id="tab1">
				  <tr>
					<td class="label">商品名称:</td>
					<td><input name="goods_name" id="goods_name"  type="text" size="43" value="<?php echo isset($rt['godosinfo']['goods_name']) ? $rt['godosinfo']['goods_name'] : '';?>"><span style="color:#FF0000">*</span><span class="goods_name_mes"></span>
					<em>如果您不输入商品货号，系统将自动生成一个唯一的货号。</em>
					</td>
				  </tr>
				  <tr>
					<td class="label">商品条形码:</td>
					<td><input name="goods_sn" id="goods_sn"  type="text" size="43" value="<?php echo isset($rt['godosinfo']['goods_sn']) ? $rt['godosinfo']['goods_sn'] : '';?>"><em>如果留空，将自动生成一个</em>
					</td>
				  </tr>
				  <tr>
					<td class="label">商品编号:</td>
					<td><input name="goods_bianhao" id="goods_bianhao"  type="text" size="43" value="<?php echo isset($rt['godosinfo']['goods_bianhao']) ? $rt['godosinfo']['goods_bianhao'] : '';?>"><em>指定一个商品编号</em>
					</td>
				  </tr>
				  <tr>
					<td class="label" width="130"><a href="javascript:;" class="addsubcate">[+]</a>商品分类:</td>
					<td>
					 <select name="cat_id" id="cat_id">
					<option value="0">--选择分类--</option>
					<?php 
					if(!empty($rt['menu'])){
					 foreach($rt['menu'] as $row){ 
					?>
					<option value="<?php echo $row['id'];?>" <?php if(isset($rt['godosinfo']['cat_id'])&&$rt['godosinfo']['cat_id']==$row['id']){ echo 'selected="selected""'; } ?>><?php echo $row['name'];?></option>
						<?php 
							if(!empty($row['cat_id'])){
							foreach($row['cat_id'] as $rows){ 
								?>
								<option value="<?php echo $rows['id'];?>"  <?php if(isset($rt['godosinfo']['cat_id'])&&$rt['godosinfo']['cat_id']==$rows['id']){ echo 'selected="selected""'; } ?>>&nbsp;&nbsp;<?php echo $rows['name'];?></option>
								<?php 
								if(!empty($rows['cat_id'])){
								foreach($rows['cat_id'] as $rowss){ 
								?>
										<option value="<?php echo $rowss['id'];?>"  <?php if(isset($rt['godosinfo']['cat_id'])&&$rt['godosinfo']['cat_id']==$rowss['id']){ echo 'selected="selected""'; } ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowss['name'];?></option>
				
							<?php 
						if(!empty($rows['cat_id'])){
						foreach($rowss['cat_id'] as $rowsss){ 
						?>
								<option value="<?php echo $rowsss['id'];?>" <?php if(isset($rt['godosinfo']['cat_id'])&&$rt['godosinfo']['cat_id']==$rowsss['id']){ echo 'selected="selected""'; } ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowsss['name'];?></option>
								
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
				 </select><em style="color:#FF0000">点击[+]增加一个额外分类</em> 
					</td>
				  </tr>
				  <?php
				  if(isset($subcatelist)&&!empty($subcatelist)){
					  ?>
					 <tr>
						<td class="label" width="15%">其他子分类:</td>
						<td width="85%">
						<?php 
								foreach($subcatelist as $rr){
								echo '<a href="javascript:;" onclick="return del_subcate(\''.$rr['cat_id'].'\',\''.$rr['goods_id'].'\',this);">'.$rr['cat_name'].'[<font color=red>删除</font>]</a>&nbsp;&nbsp;&nbsp;';
								}
						?>
						</td>
					 </tr>
					  <?php
				  }
				  ?>
				  <tr>
				  <td class="label">商品品牌:</td>
				  <td>
				  <select name="brand_id">
					<option value="0">--选择品牌--</option>
					 <?php 
					if(!empty($brandlist)){
					 foreach($brandlist as $row){ 
					?>
					<option value="<?php echo $row['id'];?>" <?php if(isset($rt['godosinfo']['brand_id'])&&$rt['godosinfo']['brand_id']==$row['id']){ echo 'selected="selected""'; } ?>><?php echo $row['name'];?></option>
						<?php 
							if(!empty($row['brand_id'])){
							foreach($row['brand_id'] as $rows){ 
								?>
								<option value="<?php echo $rows['id'];?>"  <?php if(isset($rt['godosinfo']['brand_id'])&&$rt['godosinfo']['brand_id']==$rows['id']){ echo 'selected="selected""'; } ?>>&nbsp;&nbsp;<?php echo $rows['name'];?></option>
								<?php 
								if(!empty($rows['brand_id'])){
								foreach($rows['brand_id'] as $rowss){ 
								?>
										<option value="<?php echo $rowss['id'];?>"  <?php if(isset($rt['godosinfo']['brand_id'])&&$rt['godosinfo']['brand_id']==$rowss['id']){ echo 'selected="selected""'; } ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowss['name'];?></option>
										
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
					<td class="label">供应价:</td>
					<td><input name="market_price" id="market_price"  type="text" size="43" value="<?php echo isset($rt['godosinfo']['market_price']) ? $rt['godosinfo']['market_price'] : '';?>"></td>
				  </tr>
				   <tr>
					<td class="label">零售价:</td>
					<td><input name="shop_price" id="shop_price"  type="text" size="43" value="<?php echo isset($rt['godosinfo']['shop_price']) ? $rt['godosinfo']['shop_price'] : '';?>"></td>
				  </tr>
					   <tr>
					<td class="label">批发价:</td>
					<td><input name="pifa_price" id="pifa_price"  type="text" size="43" value="<?php echo isset($rt['godosinfo']['pifa_price']) ? $rt['godosinfo']['pifa_price'] : '';?>"></td>
				  </tr>
				  <tr>
					<td class="label">上传商品图片:</td>
					<td>
					  <?php if(!empty($rt['godosinfo']['goods_img'])){ ?><img src="<?php echo SITE_URL.$rt['godosinfo']['goods_img'];?>" width="100" style="padding:1px; border:1px solid #ccc"/><?php }else{ ?><img src="<?php echo $this->img('no_picture.gif');?>" width="100" style="padding:1px; border:1px solid #ccc"/><?php } ?>
					  <input name="original_img" id="goods" type="hidden" value="<?php echo isset($rt['godosinfo']['original_img']) ? $rt['godosinfo']['original_img'] : '';?>"/>
					  <iframe id="iframe_t" name="iframe_t" border="0" src="<?php echo SITE_URL;?>admin/upload.php?action=<?php echo isset($rt['godosinfo']['original_img'])&&!empty($rt['godosinfo']['original_img'])? 'show' : '';?>&ty=goods&files=<?php echo isset($rt['godosinfo']['original_img']) ? $rt['godosinfo']['original_img'] : '';?>" scrolling="no" width="445" frameborder="0" height="25"></iframe>
					</td>
				  </tr>
				  <tr>
					<td class="label">商品缩略图:</td>
					<td>
					  <?php if(!empty($rt['godosinfo']['goods_thumb'])){ ?><img src="<?php echo SITE_URL.$rt['godosinfo']['goods_thumb'];?>" width="70" style="padding:1px; border:1px solid #ccc"/><?php }else{ ?><img src="<?php echo $this->img('no_picture.gif');?>" width="70" style="padding:1px; border:1px solid #ccc"/><?php } ?>
					  <input name="goods_thumb" id="goods_thumb" type="hidden" value="<?php echo isset($rt['godosinfo']['goods_thumb']) ? $rt['godosinfo']['goods_thumb'] : '';?>"/>
					  <iframe id="iframe_t" name="iframe_t" border="0" src="<?php echo SITE_URL;?>admin/upload.php?action=<?php echo isset($rt['godosinfo']['goods_thumb'])&&!empty($rt['godosinfo']['goods_thumb'])? 'show' : '';?>&ty=goods_thumb&tyy=goods&files=<?php echo isset($rt['godosinfo']['goods_thumb']) ? $rt['godosinfo']['goods_thumb'] : '';?>" scrolling="no" width="445" frameborder="0" height="25"></iframe><br /><em>如果留空，那么将以原始图片生成缩略图</em>
					</td>
				  </tr>
				  <tr>
						<td class="label">商品短描述:</td>
						<td><textarea name="sort_desc" id="sort_desc" style="width: 60%; height: 65px; overflow: auto;"><?php echo isset($rt['godosinfo']['sort_desc']) ? $rt['godosinfo']['sort_desc'] : '';?></textarea><br /><em>此处写上商品的短描述，可以简单描述下商品等等</em></td>
				  </tr>
				  <tr>
						<td class="label">Meta关键字:</td>
						<td><textarea name="meta_keys" id="meta_keys" style="width: 60%; height: 65px; overflow: auto;"><?php echo isset($rt['godosinfo']['meta_keys']) ? $rt['godosinfo']['meta_keys'] : '';?></textarea></td>
					  </tr>
					  <tr>
						<td class="label">Meta描述:</td>
						<td><textarea name="meta_desc" id="meta_desc" style="width: 60%; height: 65px; overflow: auto;"><?php echo isset($rt['godosinfo']['meta_desc']) ? $rt['godosinfo']['meta_desc'] : '';?></textarea></td>
					  </tr>
				 </table>
				 <!--end basic info-->
				 
				 <!--start detail desc-->
				 <table cellspacing="2" cellpadding="5" width="100%" id="tab2" class="tab">
					<tr>
					<td class="label" width="130">产品详情:</td>
					<td><textarea name="goods_desc" id="content" style="width:95%;height:400px;display:none;"><?php echo isset($rt['godosinfo']['goods_desc']) ? $rt['godosinfo']['goods_desc'] : '';?></textarea>
					<script>KE.show({id : 'content',cssPath : '<?php echo SITE_URL.'/js/edit/css/edit.css';?>'});</script>
					</td>
				  </tr>
				   <tr>
					<td class="label" width="130">商品规格:</td>
					<td><textarea name="goods_brief" id="content2" style="width:95%;height:400px;display:none;"><?php echo isset($rt['godosinfo']['goods_brief']) ? $rt['godosinfo']['goods_brief'] : '';?></textarea>
					<script>KE.show({id : 'content2',cssPath : '<?php echo SITE_URL.'/js/edit/css/edit.css';?>'});</script>
					</td>
				  </tr>
				 </table>
				 <!--end detail desc-->
				 
				 <!--start other info-->
				 <table cellspacing="2" cellpadding="5" width="100%" id="tab3" class="tab">
					<tr>
						<td class="label">商品重量：</td>
						<td>
						<input name="goods_weight" value="<?php echo isset($rt['godosinfo']['goods_weight']) ? $rt['godosinfo']['goods_weight'] : '0.000';?>" size="20" type="text" /> <br />统一为"克"单位 1kg = 500g
						</td>
					  </tr>
							<tr>
						<td class="label">商品单位：</td>
						<td>
						<input name="goods_unit" value="<?php echo isset($rt['godosinfo']['goods_unit']) ? $rt['godosinfo']['goods_unit'] : '';?>" size="20" type="text" />
						</td>
					  </tr>
					  <tr>
						<td class="label">商品库存数量：</td>
						<td><input name="goods_numbers" value="<?php echo isset($rt['godosinfo']['goods_number']) ? $rt['godosinfo']['goods_number'] : '10';?>" size="20" type="text" /><br>
						<span class="notice-span" style="display: block;" id="noticeStorage">库存在商品为虚货或商品存在货品时为不可编辑状态，库存数值取决于其虚货数量或货品数量</span></td>
					  </tr>
					  <tr>
						<td class="label">库存警告数量：</td>
						<td><input name="warn_number" value="<?php echo isset($rt['godosinfo']['warn_number']) ? $rt['godosinfo']['warn_number'] : '1';?>" size="20" type="text"></td>
					  </tr>
					  <tr id="alone_sale_1">
						<td class="label" id="alone_sale_2">上架：</td>
						<td id="alone_sale_3">
						<label><input name="is_on_sale" value="1" <?php echo !isset($rt['godosinfo']['is_on_sale'])||$rt['godosinfo']['is_on_sale']==1 ? 'checked="checked"' : '';?> type="checkbox"> 打勾表示允许销售，否则不允许销售。</label>
						</td>
					  </tr>
					   <tr>
						<td class="label"><label><input type="checkbox" id="is_promote" name="is_promote" value="1"  onclick="handlePromote(this.checked);" <?php echo isset($rt['godosinfo']['is_promote'])&&$rt['godosinfo']['is_promote']==1 ? 'checked="checked"' : '';?>/> 促销价格：</label></td>
						<td>
						<input name="promote_price" value="<?php echo isset($rt['godosinfo']['promote_price']) ? $rt['godosinfo']['promote_price'] : '0.00';?>" size="20" type="text" <?php echo isset($rt['godosinfo']['is_promote'])&&$rt['godosinfo']['is_promote']==1 ? '' : 'disabled="disabled" style="background-color:#ededed"';?>  onchange="checkvar(this)"/>【每周特价区商品】
						</td>
					  </tr>
					  <tr>
					  <td class="label">促销日期:</td>
					  <td>
						<input type="text" name="promote_start_date" id="df" value="<?php echo !empty($rt['godosinfo']['promote_start_date']) ? date('Y-m-d',$rt['godosinfo']['promote_start_date']) : date('Y-m-d',mktime());?>" <?php echo isset($rt['godosinfo']['is_promote'])&&$rt['godosinfo']['is_promote']==1 ? '' : 'disabled="disabled" style="background-color:#ededed"';?> onclick="return showCalendar('df', 'y-mm-dd');"/>&nbsp;-&nbsp;
						<input type="text" name="promote_end_date" id="dt" value="<?php echo !empty($rt['godosinfo']['promote_end_date']) ? date('Y-m-d',$rt['godosinfo']['promote_end_date']) : date('Y-m-d',mktime()+7*24*3600);?>" <?php echo isset($rt['godosinfo']['is_promote'])&&$rt['godosinfo']['is_promote']==1 ? '' : 'disabled="disabled" style="background-color:#ededed"';?> onclick="return showCalendar('dt', 'y-mm-dd');"/>&nbsp;<em>点击文本选择日期。</em>
					  </td>
					  </tr>
					  <tr>
						<td class="label">是否为免运费商品</td>
						<td><label><input name="is_shipping" value="1" type="checkbox" <?php echo isset($rt['godosinfo']['is_shipping'])&&$rt['godosinfo']['is_shipping']==1 ? 'checked="checked"' : '';?>> 打勾表示此商品不会产生运费花销，否则按照正常运费计算。</label></td>
					  </tr>
					   <tr>
						<td class="label">商品赠送：</td>
						<td>
						<input name="buy_more_best" value="<?php echo isset($rt['godosinfo']['buy_more_best']) ? $rt['godosinfo']['buy_more_best'] : '';?>"> <em>如：买10送2</em>
						</td>
					  </tr>
					  <tr><td colspan="2" style="border-bottom:1px dotted #FFCCCC"></td></tr>
				 </table>
				  <!--end other info-->
				  
				  <!--start goods attr-->
				  <table cellspacing="2" cellpadding="5" width="100%" id="tab4" class="tab">
				  <?php
				   if(isset($rt['goods_attr'])&&!empty($rt['goods_attr'])){
				   foreach($rt['goods_attr'] as $row){
				   if(empty($row)) continue;
				  ?>
					<tr>
					<td width="130" class="label"><?php echo $row[0]['attr_name']?>:</td>
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
				  <tr>
					<td colspan="2"><hr /></td>
				  </tr>
					<?php
					 if(!empty($attr_list)){
					foreach($attr_list as $row){
					?>
					<tr>
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
					</tr>
				  <?php } } ?>
				  </table>
				  <!--end goods attr-->
				  
				  <!--start goods photos-->
				  <table cellspacing="2" cellpadding="5" width="100%" id="tab5" class="tab">
					<tr>
						<td colspan="3">
						<?php 
						if(!empty($gallerylist)){
						echo "<ul class='gallery'>\n";
						foreach($gallerylist as $row){
							echo '<li style="width:150px; text-align:center; border:1px dashed #ccc; float:left; margin:2px;position:relative;height:185px;overflow:hidden "><img src="'.SITE_URL.$row['img_url'].'" alt="'.$row['img_desc'].'" width="100"/><p align="center">'.$row['img_desc'].'</p><a class="delgallery" id="'.$row['img_id'].'" style="position:absolute; top:2px; right:2px; background-color:#FF3333; display:block; width:35px; height:16px;">删除</a></li>';
						}
						echo "</ul>\n";
						}
						?>
						</td>
					</tr>
					<tr>
					<td align="right" valign="middle"><a href="javascript:;" class="addgallery">[+]</a>商品描述:
					  <input type="text" name="photo_gallery_desc[]" value=""/>
					  </td>
					<td>上传图片：</td>
					<td align="left">
					<input type="hidden" name="photo_gallery_url[]" id="goodsgallery" value=""/>
					<iframe id="iframe_t" name="iframe_t" border="0" src="<?php echo SITE_URL;?>admin/upload.php?action=&ty=goodsgallery&tyy=goods&files=" scrolling="no" width="445" frameborder="0" height="25"></iframe>
					</td>
					</tr>
				  </table>
				  <!--end goods photos-->
				  <p style=" padding-left:200px; padding-bottom:20px">
					<input class="new_save" value="<?php echo $type=='newedit' ? '修改' : '添加';?>保存" type="Submit" style="height:25px; line-height:23px; cursor:pointer">&nbsp;&nbsp;&nbsp;<input type="button" value="返回" onclick="location.href='<?php echo SITE_URL;?>suppliers.php?act=suppliers_goods_<?php echo !empty($_GET['t'])?$_GET['t']:'no';?>'" style="height:25px; line-height:23px;cursor:pointer"/>
				  </p>
			 </div>
			  </form>
     </div>
    <div class="clear"></div>
  </div>
  <div class="clear7"></div>

<?php  $thisurl = SITE_URL.'suppliers.php'; ?>
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
		$(obj).parent().find('.addi').html('<input name="attr_addi_list[]" id="goodsaddi'+upvar+'" value="" type="hidden"><iframe id="iframe_t" name="iframe_t" border="0" src="<?php echo SITE_URL;?>admin/upload.php?action=&ty=goodsaddi'+upvar+'&tyy=goodsaddi&files=" scrolling="no" width="445" frameborder="0" height="25"></iframe>附加图像');
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
		$('#tab3 .showgift').css('display','block');
	}else{
		$('#tab3 .showgift').css('display','none');
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
-->

</script>
