<style type="text/css">
.gototype a{ padding:2px; border-bottom:2px solid #ccc; border-right:2px solid #ccc;}
.tx{ width:350px; border:1px solid #ccc; height:28px; line-height:28px}
.tx2{ width:120px; border:1px solid #ccc; height:28px; line-height:28px}
.contentbox .label{ text-align:right;}
</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.0&services=true"></script>
<div style=" display:none;width: 1px; height: 1px;" id="container"></div>
<?php
$urlToEncode=SITE_URL."sd.php?id=".$rt['userinfo']['user_id'];
function generateQRfromGoogle($chl,$widhtHeight ='150',$EC_level='L',$margin='0')
{
    $url = urlencode($url); 
    echo '<img src="http://chart.apis.google.com/chart?chs='.$widhtHeight.'x'.$widhtHeight.'&cht=qr&chld='.$EC_level.'|'.$margin.'&chl='.$chl.'" alt="QR code" widhtHeight="'.$size.'" widhtHeight="'.$size.'"/>';
}
?>
<div class="contentbox" style="overflow-x:hidden; overflow-y:scroll; height:500px">
<h2 class="con_title">店铺编辑</h2>
<form id="form1" name="form1" method="post" action="">
     <table cellspacing="2" cellpadding="5" width="100%">
		<tr>
			<td class="label" width="15%">餐企LOGO：</td>
			<td>
			<?php 
			if(isset($rt['userinfo']['avatar'])&&!empty($rt['userinfo']['avatar'])){
			echo '<img  alt="LOGO" src="'.SITE_URL.$rt['userinfo']['avatar'].'" width="100" style="border:1px dotted #ccc; padding:2px"/>'."<br/>";
			}else{
			echo '<img  alt="LOGO" src="'.$this->img("tx_img.gif").'" width="100" style="border:1px dotted #ccc; padding:2px"/>'."<br/>";
			}
			?>
			 <input name="avatar" id="avatar" type="hidden" value="<?php echo isset($rt['userinfo']['avatar']) ? $rt['userinfo']['avatar'] : '';?>" size="43"/>
		  <iframe id="iframe_t" name="iframe_t" border="0" src="../_admin/upload.php?action=<?php echo isset($rt['userinfo']['avatar'])&&!empty($rt['userinfo']['avatar'])? 'show' : '';?>&ty=avatar&files=<?php echo isset($rt['userinfo']['avatar']) ? $rt['userinfo']['avatar'] : '';?>" scrolling="no" width="350" frameborder="0" height="25"></iframe>
			</td>
		</tr>
		<td class="label">餐企二维码：</td>
		<td>
		<?php generateQRfromGoogle($urlToEncode,120);?>
		</td>
		<tr>
			<td class="label" width="15%">360全景图：</td>
			<td>
			<?php 
			if(isset($rt['userinfo']['answer'])&&!empty($rt['userinfo']['answer'])){
			echo '<img  alt="LOGO" src="'.SITE_URL.$rt['userinfo']['answer'].'" width="100" style="border:1px dotted #ccc; padding:2px"/>';
			}
			?>
			 <input name="answer" id="img360" type="hidden" value="<?php echo isset($rt['userinfo']['answer']) ? $rt['userinfo']['answer'] : '';?>" size="43"/>
		  <iframe id="iframe_t" name="iframe_t" border="0" src="../_admin/upload.php?action=<?php echo isset($rt['userinfo']['answer'])&&!empty($rt['userinfo']['answer'])? 'show' : '';?>&ty=img360&files=<?php echo isset($rt['userinfo']['answer']) ? $rt['userinfo']['answer'] : '';?>" scrolling="no" width="350" frameborder="0" height="25"></iframe>
			</td>
		</tr>
<!--		<tr>
			<td class="label" width="15%">名称：</td>
			<td>
			<input class="tx" name="user_name" value="<?php echo isset($rt['userinfo']['user_name']) ? $rt['userinfo']['user_name'] : '';?>" size="40" type="text" />
			</td>
		</tr>-->
		<tr>
			<td class="label" width="15%">店铺名称：</td>
			<td>
			<input class="tx" name="nickname" value="<?php echo isset($rt['userinfo']['nickname']) ? $rt['userinfo']['nickname'] : '';?>" size="40" type="text" />
			</td>
		</tr>
 		<tr>
            <td class="label" id="alone_sale_2">是否已签约：</td>
            <td>
			<label><input name="s_is_qianyue" value="1" <?php echo !isset($rt['userinfo']['s_is_qianyue'])||$rt['userinfo']['s_is_qianyue']==1 ? 'checked="checked"' : '';?> type="checkbox"> 打勾表示已经签约。</label>
			</td>
          </tr>
		<tr>
			<td class="label" width="15%">主打菜：</td>
			<td>
			<input class="tx" name="s_zhudacai" value="<?php echo isset($rt['userinfo']['s_zhudacai']) ? $rt['userinfo']['s_zhudacai'] : '';?>" size="40" type="text" />
			</td>
		</tr>
		<tr>
			<td class="label" width="15%">特色菜：</td>
			<td>
			<input class="tx" name="s_tesecai" value="<?php echo isset($rt['userinfo']['s_tesecai']) ? $rt['userinfo']['s_tesecai'] : '';?>" size="40" type="text" />
			</td>
		</tr>
		<tr>
			<td class="label" width="15%">乘车路线：</td>
			<td>
			<input class="tx" name="s_luxian" value="<?php echo isset($rt['userinfo']['s_luxian']) ? $rt['userinfo']['s_luxian'] : '';?>" size="40" type="text" />
			</td>
		</tr>
				<tr>
			<td class="label">预定电话：</td>
			<td>
			<input class="tx" name="home_phone" value="<?php echo isset($rt['userinfo']['home_phone']) ? $rt['userinfo']['home_phone'] : '';?>" size="40" type="text" />
			 </td>
		</tr>
				<tr>
			<td class="label">营业时间：</td>
			<td>
			<input class="tx" name="msn" value="<?php echo isset($rt['userinfo']['msn']) ? $rt['userinfo']['msn'] : '';?>" size="40" type="text" />
			 </td>
		</tr>
						<tr>
			<td class="label">最低消费：</td>
			<td>
			<input class="tx" name="mobile_phone" value="<?php echo isset($rt['userinfo']['mobile_phone']) ? $rt['userinfo']['mobile_phone'] : '';?>" size="40" type="text" />元
			 </td>
		</tr>
		<tr>
			<td class="label">人均消费：</td>
			<td>
			<input class="tx" name="office_phone" value="<?php echo isset($rt['userinfo']['office_phone']) ? $rt['userinfo']['office_phone'] : '';?>" size="40" type="text" />元
			 </td>
		</tr>
		<tr>
			<td class="label">店铺介绍：</td>
			<td>
			<textarea name="s_about" id="content" style="width:98%;height:300px;display:none;"><?php echo isset($rt['userinfo']['s_about']) ? $rt['userinfo']['s_about'] : '';?></textarea>
			<script>KE.show({id : 'content',cssPath : '<?php echo ADMIN_URL.'/css/edit.css';?>'});</script>
			 </td>
		</tr>
								<tr>
			<td class="label">店铺子域名：</td>
			<td>
			<input class="tx" name="question" value="<?php echo isset($rt['userinfo']['question']) ? $rt['userinfo']['question'] : '';?>" size="40" type="text" />
			 </td>
		</tr>
		<tr>
			<td class="label">E-mail：</td>
			<td>
			<input class="tx" name="email" value="<?php echo isset($rt['userinfo']['email']) ? $rt['userinfo']['email'] : '';?>" size="40" type="text" />
			 </td>
		</tr>
		<tr>
			<td class="label">QQ：</td>
			<td>
			<input class="tx" name="qq" value="<?php echo isset($rt['userinfo']['qq']) ? $rt['userinfo']['qq'] : '';?>" size="40" type="text" />
			 </td>
		</tr>
		<tr>
		<td class="label" width="150"><a href="javascript:;" class="addsubcate">[+]</a>分类:</td>
		<td>
		 <select name="sub_cat_id[]" id="cat_id">
	    <option value="0">--选择分类--</option>
		<?php 
		if(!empty($catelist)){
		 foreach($catelist as $row){ 
		?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
			<?php 
				if(!empty($row['cat_id'])){
				foreach($row['cat_id'] as $rows){ 
					?>
					<option value="<?php echo $rows['id'];?>">&nbsp;&nbsp;<?php echo $rows['name'];?></option>
					<?php 
					if(!empty($rows['cat_id'])){
					foreach($rows['cat_id'] as $rowss){ 
					?>
							<option value="<?php echo $rowss['id'];?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowss['name'];?></option>
							
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
	 </select><em style="color:#FF0000">点击[+]增加多个分类</em> 
		</td>
	  </tr>
	  <?php
	  if(isset($subcatelist)&&!empty($subcatelist)){
		  ?>
		 <tr>
			<td class="label" width="15%">相关分类:</td>
			<td width="85%">
			<?php 
					foreach($subcatelist as $rr){
					echo '<a href="javascript:;" onclick="return del_subcate(\''.$rr['cat_id'].'\',\''.$rr['shop_id'].'\',this);">'.$rr['cat_name'].'[<font color=red>删除</font>]</a>&nbsp;&nbsp;&nbsp;';
					}
			?>
			</td>
		 </tr>
		  <?php
	  }
	  ?>
		<tr>
			<td class="label">地区：</td>
			<td>
			<select name="province" id="select_province" onchange="ger_ress_copy('2',this,'select_city')">
			<option value="0">选择省</option>
			<?php 
			if(!empty($rt['province'])){
			foreach($rt['province'] as $row){
			?>
			<option value="<?php echo $row['region_id'];?>" <?php echo $rt['userress']['province']==$row['region_id']? 'selected="selected"' :"";?>><?php echo $row['region_name'];?></option>	
			<?php } } ?>													
			</select>
			
			<select name="city" id="select_city" onchange="ger_ress_copy('3',this,'select_district')">
			<option value="0">选择城市</option>
			<?php
			if(!empty($rt['city'])){
			foreach($rt['city'] as $row){
			?>
			<option value="<?php echo $row['region_id'];?>" <?php echo $rt['userress']['city']==$row['region_id']? 'selected="selected"' :"";?>><?php echo $row['region_name'];?></option>	
			<?php } } ?>	
			</select>
			
			<select <?php echo !isset($rt['userress']['district'])? 'style="display: none;"':"";?> name="district" id="select_district">
			<option value="0">选择区</option>	
			<?php 
			if(!empty($rt['district'])){
			foreach($rt['district'] as $row){
			?>
			<option value="<?php echo $row['region_id'];?>" <?php echo $rt['userress']['district']==$row['region_id']? 'selected="selected"' :"";?>><?php echo $row['region_name'];?></option>	
			<?php } } ?>													
			</select>
			 </td>
		</tr>
		<tr>
			<td class="label">详细地址：</td>
			<td>
			<input class="tx" name="address" value="<?php echo isset($rt['userress']['address'])&&!empty($rt['userress']['address']) ? $rt['userress']['address'] : "";?>" size="40" type="text" />
			 </td>
		</tr>
		<tr>
			<td class="label">地图设置：</td>
		  <td><?php $ld = isset($rt['userinfo']['s_ld'])&&!empty($rt['userinfo']['s_ld']) ? explode('|',$rt['userinfo']['s_ld']) : array('113.30765','23.120049');?>
			经度：<input class="tx2" name="jingdu" value="<?php echo $ld[0];?>" type="text" />&nbsp;&nbsp;
			维度：<input class="tx2" name="weidu" value="<?php echo $ld[1];?>" type="text" />
			<input type="button" value="先填写地址后获取经度维度" style="cursor:pointer; padding:3px;" onclick="searchByStationName();"/>
			</td>
		</tr>
		<tr>
			<td class="label">邮编：</td>
			<td>
			<input class="tx" name="zipcode" value="<?php echo isset($rt['userress']['zipcode'])&&!empty($rt['userress']['zipcode']) ? $rt['userress']['zipcode'] : "";?>" size="40" type="text" />
			 </td>
		</tr>
		 <tr style="display:none">
            <td class="label">店铺类型：</td>
            <td>
			<label>
			<input type="radio" name="s_type" value="0" <?php echo !isset($rt['userinfo']['s_type'])||$rt['userinfo']['s_type']==0 ? 'checked="checked"' : '';?>/>其他
			<input type="radio" name="s_type" value="1" <?php echo isset($rt['userinfo']['s_type'])&&$rt['userinfo']['s_type']==1 ? 'checked="checked"' : '';?>/>中森食博会
			<input type="radio" name="s_type" value="2" <?php echo isset($rt['userinfo']['s_type'])&&$rt['userinfo']['s_type']==2 ? 'checked="checked"' : '';?>/>五钻天下
			</label>			
			</td>
       </tr>
		<tr>
			<td>&nbsp;</td>
			<td><label>
			  <input type="submit" value="<?php echo $type=='edit' ? '确认修改' : '确认添加';?>" class="submit" style="padding:3px"/>
			</label></td>
		</tr>
		</table>
</form>
</div>
<script type="text/javascript">
	var point = 0;
	var map = new BMap.Map("container");
	map.centerAndZoom(new BMap.Point(121.480, 31.220), 6);
	var localSearch = new BMap.LocalSearch(map, {
		renderOptions : {
			pageCapacity : 8,
			autoViewport : true,
			selectFirstResult : false
		}
	});
	localSearch.enableAutoViewport();
	function searchByStationName() {
			var pr = $('select[name="province"]').find("option:selected").text();
			var cy = $('select[name="city"]').find("option:selected").text();
			var di = $('select[name="district"]').find("option:selected").text();
			var prid = $('select[name="province"]').val();
			var cyid = $('select[name="city"]').val();
			var diid = $('select[name="district"]').val();
			
			var ad = $('input[name="address"]').val();
			var str = '';
			if(prid>0){
				str +=pr+'省';
			}
			if(cyid>0){
				str +=cy+'市';
			}
			if(diid>0){
				str +=di;
			}
			if(ad!="" && typeof(ad)!="undefined"){
				str +=ad;
			}
			
		var keyword = str;
		localSearch.setSearchCompleteCallback(function(searchResult) {
		var poi = searchResult.getPoi(0);
		//alert(poi.point.lng + "   " + poi.point.lat);
			$('input[name="jingdu"]').val(poi.point.lng);
			$('input[name="weidu"]').val(poi.point.lat);
			
			map.centerAndZoom(poi.point, 8);
		});

		localSearch.search(keyword);
	}
	
/*function qq(){
	var pr = $('select[name="province"]').find("option:selected").text();
	var cy = $('select[name="city"]').find("option:selected").text();
	var di = $('select[name="district"]').find("option:selected").text();
	var ad = $('input[name="address"]').val();
	query(pr,cy,di,ad);
}*/
</script>

<script language="javascript">
$('.submit').click(function(){
	
	return true;
});

/*增删子分类控件*/
	$('.addsubcate').live('click',function(){
		var upvar = $(this).parent().parent().find('#cat_id').val();
		if(upvar=="0" || typeof(upvar)=='undefined'){ alert("请先选择"); return false; }
		str = $(this).parent().parent().html();
		str = str.replace('addsubcate','removesubcate');
		str = str.replace('点击[+]增加一个','点击[-]减少一个');
		//str = str.replace(/cat_id/g,'sub_cat_id[]');
		str= str.replace('[+]','[-]');
		$(this).parent().parent().after('<tr>'+str+'</tr>');
	});
	
	$('.removesubcate').live('click',function(){
		$(this).parent().parent().remove();
		return false;
	});

function ger_ress_copy(type,obj,seobj){
	parent_id = $(obj).val();
	if(parent_id=="" || typeof(parent_id)=='undefined'){ return false; }
	$.post(SITE_URL+'shop/sp.php',{action:'get_ress',type:type,parent_id:parent_id},function(data){
		if(data!=""){
			$(obj).parent().find('#'+seobj).html(data);
			if(type==3){
				$(obj).parent().find('#'+seobj).show();
			}
			if(type==2){
				$(obj).parent().find('#select_district').hide();
				$(obj).parent().find('#select_district').html("");
			}
		}else{
			alert(data);
		}
	});
}

function change_user_points_money(uid,thisobj,type){
	val = $(thisobj).val();
	if(val>0 || val<0){
		if(confirm("你确定执行该操作吗？")){
			createwindow();
			$.post('user.php',{action:'change_user_points_money',uid:uid,type:type,val:val},function(data){
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
  
  function get_usermoney_page_list(page,uid){
  		createwindow();
		$.post('user.php',{action:'mymoney',page:page,uid:uid},function(data){
			removewindow();
			if(data !="" && typeof(data)!='undefined'){
				$('.user_money').html(data);
			}
		});
  }
  
  function del_subcate(cid,shopid,obj){
		if(confirm("确定删除吗？")){
		   $.post('<?php echo SITE_URL.'shop/sp.php';?>',{action:'del_subcate_id',cid:cid,shopid:shopid},function(data){
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
	
</script>
