<tr height="30">
    <td width="60" align="center" bgcolor="#eaeaea"><label><input type="checkbox" class="quxuanall" value="checkbox" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 全选</label></td>
    <td width="50" class="cr2" align="left" bgcolor="#eaeaea"><input type="button" name="button" value="批量删除" onclick="bath_delmycoll()"/></td>
    <td width="230" align="center" bgcolor="#eaeaea">商品名称</td>
    <td width="121" align="center" bgcolor="#eaeaea">价格</td>
    <td width="107" align="center" bgcolor="#eaeaea">收藏时间</td>
    <td align="center" bgcolor="#eaeaea">操作</td>
  </tr>
  
  <!-- 循环star-->
  <?php if(!empty($rt['usercolllist'])){
  foreach($rt['usercolllist'] as $row){
  ?>
   <tr>
     <td width="30" align="center"><input type="checkbox" name="quanxuan" value="<?php echo $row['rec_id'];?>" class="gids"/></td>
    <td align="center"><a href="<?php echo $row['url'];?>" title="<?php echo $row['goods_name'];?>"><img src="<?php echo $row['goods_thumb'];?>" width="95" alt="<?php echo $row['goods_name'];?>"/></a></td>
    <td class="cr4"><?php echo $row['goods_name'];?></td>
    <td align="center" class="cr2">
    ￥<?php echo $row['zprice'];?>
	 </td>
    <td class="cr3" align="center"><?php echo !empty($row['add_time']) ? date('Y-m-d H:i:s',$row['add_time']) : '无知';?></td>
    <td  align="center" width="110">
     <div class="gehang"></div>
    <img src="<?php echo SITE_URL;?>theme/images/shopcart.gif" width="80" height="24" onclick="return addToCart('<?php echo $row['goods_id'];?>')" style="cursor:pointer"/>
    <div class="gehang5"></div>
    <div class="gehang"></div>
     <p class="mycaoodel"> <a href="javascript:;" onclick="delmycoll('<?php echo $row['rec_id'];?>',this)">╳ 删除</a></p>
     <div class="gehang5"></div>    </td>
  </tr>
  <tr>
    <td colspan="6" align="center">
    <div class="gehang5"></div>  
    <img src="images/bgline.gif" height="1" width="716"/></td>
  </tr>
  <?php } } ?>
   <!-- 循环end-->
  
 <tr>
    <td colspan="6" align="center">
    <div class="gehang"></div>  </td>
    </tr>    
 <tr>
    <td width="100" align="center" bgcolor="#eaeaea" height="30"><label><input type="checkbox" class="quxuanall" value="checkbox" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 全选</label></td>
    <td width="50" class="cr2" align="left" bgcolor="#eaeaea"><input type="button" name="button" value="批量删除" onclick="bath_delmycoll()"/></td>
    <td colspan="4" align="right" class="cr2 pagein" bgcolor="#eaeaea">   
	<?php echo $rt['usercollpage']['prev'];?>
	<?php
	 if(isset($rt['usercollpage']['list'])&&!empty($rt['usercollpage']['list'])){
	 foreach($rt['usercollpage']['list'] as $aa){
	 echo $aa."\n";
	 }
	 }
	?>
	<?php echo $rt['usercollpage']['next'];?></p>
    </td>
    </tr> 