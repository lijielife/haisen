<div id="wrap">
	<div class="clear7"></div>
    <?php $this->element('user_menu');?>
    <div class="m_right">
		<style type="text/css">
			.m_right table,.m_right table a{ font-size:12px}
			
			.m_right .userop{ width:45px; height:25px; line-height:25px;border-bottom:3px solid #bec6ce; border-right:3px solid #bec6ce; text-align:center; cursor:pointer; float:left; margin-right:5px; padding-left:10px;}
			.m_right .u1{ background:url(<?php echo $this->img('icon_edit.gif');?>) no-repeat left center #e2e8eb}
			.m_right .u2{ background:url(<?php echo $this->img('icon_drop.gif');?>) no-repeat left center #e2e8eb}
			.m_right table td{ border-bottom:1px dotted #B4C9C6; border-left:1px dotted #B4C9C6;} 
			.m_right table th{background-color:#EEF2F5; height:30px; line-height:30px}
			.m_right table{border-right:1px dotted #B4C9C6;}
			.activeop{ cursor:pointer}
			.brandclass a{ display:block; float:left; width:62px; height:26px; margin:2px; background:url(<?php echo $this->img('box_b.png');?>) center center no-repeat; text-align:center; padding-top:6px}
			.arrtclass a{display:block; float:left; width:62px; height:32px; margin:2px; background:url(<?php echo $this->img('box.png');?>) center center no-repeat; text-align:center; padding-top:10px}
			.brandclass a.ac,.arrtclass a.ac{  background:url(<?php echo $this->img('box_a.png');?>) center center no-repeat;}
		</style>
		<h2 class="con_title"><?php echo $rt['showtitle'];?></h2>
		   <table cellspacing="2" cellpadding="5" width="100%">
		   <tr><td colspan="10" align="left" class="label">
    	<img src="<?php echo $this->img('icon_search.gif');?>" alt="SEARCH" width="26" border="0" height="22" align="absmiddle">
    	<select name="cat_id" id="1">
	    <option value="0">选择分类</option>
		<?php
		$ids = 0;
		$idss = 0;
		$idsss = 0;
		if(!empty($catelist)){
		 foreach($catelist as $row){ 
		?>
        <option value="<?php echo $row['id'];?>" <?php if(isset($_GET['c1'])&&$_GET['c1']==$row['id']){ $ids = $row['id']; echo 'selected="selected""'; } ?>><?php echo $row['name'];?></option>
		<?php
		 }//end foreach
		} ?>
	 </select>
	&nbsp;
	<select name="cat_id" id="2">
	    <option value="0">选择分类</option>
		<?php
		if(!empty($catelist)){
		foreach($catelist as $row){ 
		if($ids!=$row['id']) continue;
		?>
			<?php 
				if(!empty($row['cat_id'])){
				foreach($row['cat_id'] as $rows){ 
					?>
					<option value="<?php echo $rows['id'];?>"  <?php if(isset($_GET['c2'])&&$_GET['c2']==$rows['id']){ $idss = $rows['id']; echo 'selected="selected""'; } ?>>&nbsp;&nbsp;<?php echo $rows['name'];?></option>
			<?php
				}//end foreach
		 		} // end if
			?>
		<?php
		 }//end foreach
		} ?>
	 </select>
	 &nbsp;
	<select name="cat_id" id="3">
	    <option value="0">选择分类</option>
		<?php
		if(!empty($catelist)){
		foreach($catelist as $row){ 
		if($ids!=$row['id']) continue;
		?>
			<?php 
				if(!empty($row['cat_id'])){
				foreach($row['cat_id'] as $rows){ 
				if($idss!=$rows['id']) continue;
					?>
					<?php 
					if(!empty($rows['cat_id'])){
					foreach($rows['cat_id'] as $rowss){ 
					?>
							<option value="<?php echo $rowss['id'];?>"  <?php if(isset($_GET['c3'])&&$_GET['c3']==$rowss['id']){ $idsss = $rowss['id']; echo 'selected="selected""'; } ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowss['name'];?></option>

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
	  &nbsp;
	<select name="cat_id" id="4">
	    <option value="0">选择分类</option>
		<?php
		if(!empty($catelist)){
		foreach($catelist as $row){ 
		if($ids!=$row['id']) continue;
		?>
			<?php 
				if(!empty($row['cat_id'])){
				foreach($row['cat_id'] as $rows){ 
				if($idss!=$rows['id']) continue;
					?>
					<?php 
					if(!empty($rows['cat_id'])){
					foreach($rows['cat_id'] as $rowss){ 
					if($idsss!=$rowss['id']) continue;
					?>
						<?php 
						if(!empty($rows['cat_id'])){
						foreach($rowss['cat_id'] as $rowsss){ 
						?>
								<option value="<?php echo $rowsss['id'];?>" <?php if(isset($_GET['c4'])&&$_GET['c4']==$rowsss['id']){ echo 'selected="selected""'; } ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowsss['name'];?></option>
								
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
	 </select>
	</td>
	</tr>
		   <?php $c = '&c1='.(isset($_GET['c1']) ? $_GET['c1'] : '0').'&c2='.(isset($_GET['c2']) ? $_GET['c2'] : '0').'&c3='.(isset($_GET['c3']) ? $_GET['c3'] : '0').'&c4='.(isset($_GET['c4']) ? $_GET['c4'] : '0');?>
	<tr>
		<td colspan="10" class="arrtclass">
			<a href="<?php echo SITE_URL;?>user.php?act=mybuy&is_goods_attr=&cat_id=<?php echo isset($_GET['cat_id']) ? $_GET['cat_id'] : 0;?>&brand_id=<?php echo isset($_GET['brand_id']) ? $_GET['brand_id'] : 0;?>&is_delete=0&sale=yes<?php echo $c;?>"<?php if(!isset($_GET['is_goods_attr'])||empty($_GET['is_goods_attr'])){ echo ' class="ac"'; } ?>>全部</a>
			<a href="<?php echo SITE_URL;?>user.php?act=mybuy&is_goods_attr=is_hot&cat_id=<?php echo isset($_GET['cat_id']) ? $_GET['cat_id'] : 0;?>&brand_id=<?php echo isset($_GET['brand_id']) ? $_GET['brand_id'] : 0;?>&is_delete=0&sale=yes<?php echo $c;?>"<?php if(isset($_GET['is_goods_attr'])&&$_GET['is_goods_attr']=='is_hot'){ echo ' class="ac"'; } ?>>热销</a>
			<a href="<?php echo SITE_URL;?>user.php?act=mybuy&is_goods_attr=is_new&cat_id=<?php echo isset($_GET['cat_id']) ? $_GET['cat_id'] : 0;?>&brand_id=<?php echo isset($_GET['brand_id']) ? $_GET['brand_id'] : 0;?>&is_delete=0&sale=yes<?php echo $c;?>"<?php if(isset($_GET['is_goods_attr'])&&$_GET['is_goods_attr']=='is_new'){ echo ' class="ac"'; } ?>>新品</a>
			<a href="<?php echo SITE_URL;?>user.php?act=mybuy&is_goods_attr=is_best&cat_id=<?php echo isset($_GET['cat_id']) ? $_GET['cat_id'] : 0;?>&brand_id=<?php echo isset($_GET['brand_id']) ? $_GET['brand_id'] : 0;?>&is_delete=0&sale=yes<?php echo $c;?>"<?php if(isset($_GET['is_goods_attr'])&&$_GET['is_goods_attr']=='is_best'){ echo ' class="ac"'; } ?>>精品</a>
			<a href="<?php echo SITE_URL;?>user.php?act=mybuy&is_goods_attr=is_alone_sale&cat_id=<?php echo isset($_GET['cat_id']) ? $_GET['cat_id'] : 0;?>&brand_id=<?php echo isset($_GET['brand_id']) ? $_GET['brand_id'] : 0;?>&is_delete=0&sale=yes<?php echo $c;?>"<?php if(isset($_GET['is_alone_sale'])&&$_GET['is_alone_sale']=='is_alone_sale'){ echo ' class="ac"'; } ?>>礼包</a>
			<a href="<?php echo SITE_URL;?>user.php?act=mybuy&is_goods_attr=is_promote&cat_id=<?php echo isset($_GET['cat_id']) ? $_GET['cat_id'] : 0;?>&brand_id=<?php echo isset($_GET['brand_id']) ? $_GET['brand_id'] : 0;?>&is_delete=0&sale=yes<?php echo $c;?>"<?php if(isset($_GET['is_goods_attr'])&&$_GET['is_goods_attr']=='is_promote'){ echo ' class="ac"'; } ?>>特价商品</a>
			<a href="<?php echo SITE_URL;?>user.php?act=mybuy&is_goods_attr=is_qianggou&cat_id=<?php echo isset($_GET['cat_id']) ? $_GET['cat_id'] : 0;?>&brand_id=<?php echo isset($_GET['brand_id']) ? $_GET['brand_id'] : 0;?>&is_delete=0&sale=yes<?php echo $c;?>"<?php if(isset($_GET['is_goods_attr'])&&$_GET['is_goods_attr']=='is_qianggou'){ echo ' class="ac"'; } ?>>抢购商品</a>
			<a href="<?php echo SITE_URL;?>user.php?act=mybuy&is_goods_attr=is_jifen&cat_id=<?php echo isset($_GET['cat_id']) ? $_GET['cat_id'] : 0;?>&brand_id=<?php echo isset($_GET['brand_id']) ? $_GET['brand_id'] : 0;?>&is_delete=0&sale=yes<?php echo $c;?>"<?php if(isset($_GET['is_jifen'])&&$_GET['is_jifen']=='is_jifen'){ echo ' class="ac"'; } ?>>积分商品</a>
		</td>
	</tr>
	<tr>
		<td colspan="10" align="left" class="brandclass">
		<a href="<?php echo SITE_URL;?>user.php?act=mybuy&is_goods_attr=<?php echo isset($_GET['is_goods_attr']) ? $_GET['is_goods_attr'] : '';?>&cat_id=<?php echo isset($_GET['cat_id']) ? $_GET['cat_id'] : 0;?>&brand_id=0&is_delete=0&sale=yes<?php echo $c;?>"<?php if(!isset($_GET['brand_id'])||empty($_GET['brand_id'])){ echo ' class="ac"'; } ?>>全部</a>
		<?php 
		if(!empty($brandlist)) foreach($brandlist as $row){ if(empty($row['name'])) continue;
		?>
		<a href="<?php echo SITE_URL;?>user.php?act=mybuy&is_goods_attr=<?php echo isset($_GET['is_goods_attr']) ? $_GET['is_goods_attr'] : '';?>&cat_id=<?php echo isset($_GET['cat_id']) ? $_GET['cat_id'] : 0;?>&brand_id=<?php echo $row['id'];?>&is_delete=0&sale=yes<?php echo $c;?>" title="<?php echo $row['name'];?>"<?php if(isset($_GET['brand_id'])&&$_GET['brand_id']==$row['id']){ echo ' class="ac"'; } ?>><?php echo $row['name'];?></a>
			<?php if(!empty($row['brand_id'])) foreach($row['brand_id'] as $rows){ ?>
			<a href="<?php echo SITE_URL;?>user.php?act=mybuy&is_goods_attr=<?php echo isset($_GET['is_goods_attr']) ? $_GET['is_goods_attr'] : '';?>&cat_id=<?php echo isset($_GET['cat_id']) ? $_GET['cat_id'] : 0;?>&brand_id=<?php echo $rows['id'];?>&is_delete=0&sale=yes<?php echo $c;?>" title="<?php echo $rows['name'];?>"<?php if(isset($_GET['brand_id'])&&$_GET['brand_id']==$rows['id']){ echo ' class="ac"'; } ?>><?php echo $rows['name'];?></a>
			<?php } ?>
		<?php
		} ?>
		</td>
	</tr>
		    <tr>
			   <th width="50"><label><input type="checkbox" class="quxuanall" value="checkbox" />选择</label></th>
			   <th>所在分类</th>
			   <th>商品图</th>
			   <th>标题</th>
			   <th>供应价</th>
			   <th>零售价</th>
			   <th>批发价</th>
			   <th>上架</th>
			   <th>录入时间</th>
			   <th width="130">操作</th>
			</tr>
			<?php if(!empty($rt['goodslist'])){foreach($rt['goodslist'] as $row){?>
			<tr>
			<td align="center"><input type="checkbox" name="quanxuan" value="<?php echo $row['goods_id'];?>" class="gids"/></td>
			<td><?php echo $row['cat_name'];?></td>
			<td><a target="_blank" href="<?php echo $row['url'];?>"><img src="<?php echo !empty($row['goods_thumb']) ? 	$row['goods_thumb'] : $this->img('no_picture.gif');?>" width="60"/></a></td>
			<td><a target="_blank" href="<?php echo $row['url'];?>"><?php echo $row['goods_name'];?></a><?php if(!empty($row['buy_more_best'])){echo '<br /><em>实行<font style="color:#FE0000;font-weight:bold">['.$row['buy_more_best'].']</font>促销活动！</em>';}?></td>
			<td>￥<?php echo $row['market_price'];?></td>
			<td>￥<?php echo $row['shop_price'];?></td>
			<td>￥<?php echo $row['pifa_price'];?></td>
			<td><img src="<?php echo $this->img($row['is_on_sale']==1 ? 'yes.gif' : 'no.gif');?>" alt="<?php echo $row['is_on_sale']==1 ? '0' : '1';?>" class="activeop" lang="is_on_sale" id="<?php echo $row['goods_id'];?>"/></td>
			<td><?php echo !empty($row['add_time']) ? date('Y-m-d',$row['add_time']) : "无知";?></td>
			<td><div class="userop u1"><a href="<?php echo SITE_URL;?>suppliers.php?act=suppliers_goods_info&id=<?php echo $row['goods_id'];?>&t=<?php echo $t;?>" title="编辑">编辑</a></div><div class="userop u2 delgoodsid" id="<?php echo $row['goods_id'];?>">删除</div></td>
			</tr>
			<?php }}?>
			<tr>
			<td align="center" colspan="2"><input type="checkbox" class="quxuanall" value="checkbox" />&nbsp;&nbsp;<input type="button" name="button" value="批量删除" disabled="disabled" class="bathdel" id="bathdel" style="cursor:pointer;"/></td>
			<td colspan="8" class="con_box">
			<?php $this->element('page',array('pagelink'=>$rt['pagelink']));?>
			</td>
			</tr>
		   </table>
     </div>
    <div class="clear"></div>
  </div>
  <div class="clear7"></div>
 <?php  $thisurl = SITE_URL.'ajaxfile/suppliers.php'; ?>
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
			var str=arr.join('+');
			$.post('<?php echo $thisurl;?>',{action:'delgoods',ids:str},function(data){
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
			$.post('<?php echo $thisurl;?>',{action:'delgoods',ids:ids},function(data){
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
   
   $('.activeop').live('click',function(){
		star = $(this).attr('alt');
		gid = $(this).attr('id'); 
		type = $(this).attr('lang');
		obj = $(this);
		$.post('<?php echo $thisurl;?>',{action:'activeop',active:star,gid:gid,type:type},function(data){
			if(data == ""){
				if(star == 1){
					id = 0;
					src = '<?php echo $this->img('yes.gif');?>';
				}else{
					id = 1;
					src = '<?php echo $this->img('no.gif');?>';
				}
				obj.attr('src',src);
				obj.attr('alt',id);
				//obj.parent().parent().hide(300);
			}else{
				alert(data);
			}
		});
	});
	
   $('select[name="cat_id"]').change(function(){
		var c = $(this).attr('id');
		var cid = $(this).val();
		var c1 = '<?php echo isset($_GET['c1']) ? $_GET['c1'] : '0';?>';
		var c2 = '<?php echo isset($_GET['c2']) ? $_GET['c2'] : '0';?>';
		var c3 = '<?php echo isset($_GET['c3']) ? $_GET['c3'] : '0';?>';
		var c4 = '<?php echo isset($_GET['c4']) ? $_GET['c4'] : '0';?>';
		if(c=='1'){ c1 = cid; c2 = 0; c3 = 0; c4 = 0;}
		if(c=='2'){ c2 = cid; c3 = 0; c4 = 0;}
		if(c=='3'){ c3 = cid; c4 = 0;}
		if(c=='4') c4 = cid;
		var url = '<?php echo SITE_URL;?>suppliers.php?act=<?php echo $_GET['act'];?>&is_goods_attr=<?php echo isset($_GET['is_goods_attr']) ? $_GET['is_goods_attr'] : '';?>&brand_id=<?php echo isset($_GET['brand_id']) ? $_GET['brand_id'] : '0';?>&is_delete=0&sale=yes&c1='+c1+'&c2='+c2+'&c3='+c3+'&c4='+c4;
		window.location.href=url+'&cat_id='+cid;
		return false;
	});
 
	//sous
	$('.cate_search').click(function(){
		
		catid = $('select[name="cat_id"]').val();
		
		is_goods = $('select[name="is_goods_attr"]').val();
		
		bid = $('select[name="brand_id"]').val();
		
		keys = $('input[name="keyword1"]').val();
		

		location.href='<?php echo SITE_URL.'suppliers.php';?>?act=<?php echo $_GET['act'];?>&cat_id='+catid+'&is_goods_attr='+is_goods+'&brand_id='+bid+'&keyword='+keys;
	});
	
	
 </script>