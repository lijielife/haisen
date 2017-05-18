<style type="text/css">
.contentbox{ background-color:#FEE4B3; font-size:12px;}
.contentbox table th{ font-size:12px; text-align:center}
.contentbox table .label{ font-size:12px; text-align:right; font-weight:bold; background-color:#FFD99A}
.tx{ width:350px; border:1px solid #ccc; height:28px; line-height:28px}
.tx2{ width:120px; border:1px solid #ccc; height:28px; line-height:28px}
</style>
<?php 
$cid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;
$rt['cat_id'] = $cid > 0 ? $cid : $rt['cat_id'];
?>
<div class="contentbox" style="overflow-x:hidden; overflow-y:auto; height:400px">
<form id="form1" name="form1" method="post" action="">
    <table cellspacing="2" cellpadding="5" width="100%">
	  <tr>
		<td class="label" width="20%">名称:</td>
		<td><input class="tx" name="goods_name" id="goods_name"  type="text" size="43" value="<?php echo isset($rt['goods_name']) ? $rt['goods_name'] : '';?>"><span class="require-field">*</span></td>
	  </tr>
	  <tr>
		<td class="label">图片:</td>
		<td>
		  <?php if(isset($rt['goods_img'])){ ?><img src="<?php echo !empty($rt['goods_img']) ? SITE_URL.$rt['goods_img'] : $this->img('no_picture.gif');?>" width="100" style="padding:1px; border:1px solid #ccc"/><?php } ?>
		  <input name="original_img" id="goods" type="hidden" value="<?php echo isset($rt['original_img']) ? $rt['original_img'] : '';?>"/>
		  <iframe id="iframe_t" name="iframe_t" border="0" src="../_admin/upload.php?action=<?php echo isset($rt['original_img'])&&!empty($rt['original_img'])? 'show' : '';?>&ty=goods&files=<?php echo isset($rt['original_img']) ? $rt['original_img'] : '';?>" scrolling="no" width="350" frameborder="0" height="25"></iframe>
		</td>
	  </tr>
	            <tr>
		<td class="label" width="150"><a href="javascript:;" class="addsubcate">[+]</a>所在分类:</td>
		<td>
		 <select style="line-height:28px; height:28px;" name="cat_id" id="cat_id">
	    <option value="0">--选择分类--</option>
		<?php 
		if(!empty($catelist)){
		 foreach($catelist as $row){ 
		?>
        <option value="<?php echo $row['id'];?>" <?php if(isset($rt['cat_id'])&&$rt['cat_id']==$row['id']){ echo 'selected="selected""'; } ?>><?php echo $row['name'];?></option>
			<?php 
				if(!empty($row['cat_id'])){
				foreach($row['cat_id'] as $rows){ 
					?>
					<option value="<?php echo $rows['id'];?>"  <?php if(isset($rt['cat_id'])&&$rt['cat_id']==$rows['id']){ echo 'selected="selected""'; } ?>>&nbsp;&nbsp;<?php echo $rows['name'];?></option>
					<?php 
					if(!empty($rows['cat_id'])){
					foreach($rows['cat_id'] as $rowss){ 
					?>
							<option value="<?php echo $rowss['id'];?>"  <?php if(isset($rt['cat_id'])&&$rt['cat_id']==$rowss['id']){ echo 'selected="selected""'; } ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowss['name'];?></option>
							
							
						<?php 
						if(!empty($rows['cat_id'])){
						foreach($rowss['cat_id'] as $rowsss){ 
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
	 </select><!--<em style="color:#FF0000">点击[+]增加一个额外分类</em> -->
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
            <td class="label">推荐分类：</td>
            <td>
			<label><input name="is_best" value="1" type="checkbox" <?php echo isset($rt['is_best'])&&$rt['is_best']==1 ? 'checked="checked"' : '';?>>厨皇精荐</label>
			<label><input name="is_new" value="1" type="checkbox" <?php echo isset($rt['is_new'])&&$rt['is_new']==1 ? 'checked="checked"' : '';?>>优惠套餐</label>
			<label><input name="is_hot" value="1" type="checkbox" <?php echo isset($rt['is_hot'])&&$rt['is_hot']==1 ? 'checked="checked"' : '';?>>招牌菜</label>
			<label><input name="is_promote" value="1" type="checkbox" <?php echo isset($rt['is_promote'])&&$rt['is_promote']==1 ? 'checked="checked"' : '';?>>特色菜</label>
			</td>
          </tr>
		<tr>
		<td class="label">价格:</td>
		<td><input class="tx2" name="shop_price" id="shop_price"  type="text" size="13" value="<?php echo isset($rt['shop_price']) ? $rt['shop_price'] : '';?>">元</td>
	  </tr>
	  <tr>
		<td class="label">状态:</td>
		<td><input id="is_on_sale" name="is_on_sale" value="1" type="checkbox" <?php echo !isset($rt['is_on_sale']) || $rt['is_on_sale']==1 ? 'checked="checked"' : '';?>>审核</td>
	  </tr>
	  <tr>
			<td class="label">标签:</td>
			<td><textarea name="meta_keys" id="meta_keys" style="width:350px; height: 65px; overflow: auto;"><?php echo isset($rt['meta_keys']) ? $rt['meta_keys'] : '';?></textarea>&nbsp;多个用’,‘分隔开</td>
		  </tr>
	  <tr>
		<td class="label"></td>
		<td>
		<input  value=" 确定操作 " type="submit" style="padding:3px; cursor:pointer" >
		</td>
	  </tr>
	 </table>
	 </form>
</div>
<script type="text/javascript">
<!--
//jQuery(document).ready(function($){
	
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
		$(obj).parent().find('.addi').html('<input name="attr_addi_list[]" id="goodsaddi'+upvar+'" value="" type="hidden"><iframe id="iframe_t" name="iframe_t" border="0" src="../_admin/upload.php?action=&ty=goodsaddi'+upvar+'&tyy=goodsaddi&files=" scrolling="no" width="445" frameborder="0" height="25"></iframe>附加图像');
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
		   $.post('<?php echo SITE_URL.'shop/sp.php';?>',{action:'del_subcate_id',cid:cid,gid:gid},function(data){
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
		$('.showgift').css('display','block');
	}else{
		$('.showgift').css('display','none');
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

	function ajax_load_brand(){
		 $.post('<?php echo $thisurl;?>',{action:'ajax_load_brand',bid:<?php echo (isset($rt['brand_id'])&&!empty($rt['brand_id'])) ? $rt['brand_id'] : 0;?>},function(data){ 
			$('.menu_content .setbrand').html(data);
		});
	}
	
	window.onload = function (){
   		$.post('<?php echo $thisurl;?>',{action:'ajax_load_brand',bid:<?php echo (isset($rt['brand_id'])&&!empty($rt['brand_id'])) ? $rt['brand_id'] : 0;?>},function(data){ 
			$('.menu_content .setbrand').html(data);
		});
	}
	
//});
-->

</script>