<div class="contentbox">
<style type="text/css">
.menu_content .tab{ display:none}
.nav .active{
	 /*background: url(<?php echo $this->img('manage_r2_c13.jpg');?>) no-repeat;*/
	 background-color:#F5F5F5;
} 
.nav .other{
	/* background: url(<?php echo $this->img('manage_r2_c14.jpg');?>) no-repeat;*/
	 background-color:#E9E9E9;
} 
h2.nav{ border-bottom:1px solid #B4C9C6;font-size:13px; height:25px; line-height:25px; margin-top:0px; margin-bottom:0px}
h2.nav a{ color:#999999; display:block; float:left; height:24px;width:113px; text-align:center; margin-right:1px; margin-left:1px; cursor:pointer}
.addi{ margin:0px; padding:0px;}
.vipprice td{ border-bottom:1px dotted #ccc}
.vipprice th{ background-color:#EEF2F5}
</style>
 <h2 class="nav">
 <a class="other" href="<?php echo ADMIN_URL;?>topgoods.php?type=clist">分类列表</a>  
 <a class="other" href="<?php echo ADMIN_URL;?>topgoods.php?type=cinfo">添加分类</a> 
 <a class="other" href="<?php echo ADMIN_URL;?>topgoods.php?type=lists">产品列表</a> 
 <a class="active" href="<?php echo ADMIN_URL;?>topgoods.php?type=info">添加产品</a> 
</h2>

 <div class="menu_content">
 	<form action="" method="post" enctype="multipart/form-data" name="theForm" id="theForm">
	   <table cellspacing="2" cellpadding="5" width="100%" id="tab2">
        <tr>
          <td class="label" colspan="3" style="text-align:left"><img src="<?php echo $this->img('icon_search.gif');?>" alt="SEARCH" width="26" border="0" height="22" align="absmiddle">
            <select name="cat_id2">
              <option value="0">所有分类</option>
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
            <select name="brand_id2">
              <option value="0">所有品牌</option>
 <?php 
		if(!empty($brandlist)){
		 foreach($brandlist as $row){ 
		?>
        <option value="<?php echo $row['id'];?>" <?php if(isset($rt['brand_id'])&&$rt['brand_id']==$row['id']){ echo 'selected="selected""'; } ?>><?php echo $row['name'];?></option>
			<?php 
				if(!empty($row['brand_id'])){
				foreach($row['brand_id'] as $rows){ 
					?>
					<option value="<?php echo $rows['id'];?>"  <?php if(isset($rt['brand_id'])&&$rt['brand_id']==$rows['id']){ echo 'selected="selected""'; } ?>>&nbsp;&nbsp;<?php echo $rows['name'];?></option>
					<?php 
					if(!empty($rows['brand_id'])){
					foreach($rows['brand_id'] as $rowss){ 
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
            <input type="text" name="keyword2" value=""/>
            <input name="button" type="button" class="button" onclick="searchGoods('cat_id2', 'brand_id2', 'keyword2')"  value=" 搜索 " />          
			</td>
        </tr>
        <!-- 商品列表 -->
        <tr height="37">
          <th>可选商品</th>
          <th>操作</th>
          <th>已选商品</th>
        </tr>
        <tr>
          <td width="42%"><select name="source_select" id="source_select" size="20" style="width:100%;height:300px;"  ondblclick="addItem(this)">
            </select>          </td>
          <td align="center">
		    <p>
              <input name="button" type="button" class="button" onclick="addAllItem(document.getElementById('source_select'))" value="&gt;&gt;" />
            </p>
            <p>
              <input name="button" type="button" class="button" onclick="addItem(document.getElementById('source_select'))" value="&gt;" />
            </p>
            <p>
              <input name="button" type="button" class="button" onclick="removeItem(document.getElementById('target_select'))" value="&lt;" />
            </p>
            <p>
              <input name="button" type="button" class="button" value="&lt;&lt;" onclick="removeItem(document.getElementById('target_select'), true)" />
            </p></td>
          <td width="42%"><select name="target_select" id="target_select" size="20" style="width:100%;height:300px" multiple="multiple">
            </select>          </td>
        </tr>
		
		 <tr>
    <td class="label">选择分类:</td>
    <td colspan="2">
      <select name="cat_id">
		<?php 
		if(!empty($catelist2)){
		 foreach($catelist2 as $row){ 
		 	if($type=='edit' && $rt['cat_name']==$row['name']) continue;
		?>
        <option value="<?php echo $row['id'];?>"  <?php echo isset($rt['parent_id'])&&$row['id']==$rt['parent_id'] ? 'selected="selected"' : '';?>><?php echo $row['name'];?></option>
			<?php 
				if(!empty($row['cat_id'])){
				foreach($row['cat_id'] as $rows){ 
					if($type=='cateedit' && $rt['cat_name']==$rows['name']) continue;
					?>
					<option value="<?php echo $rows['id'];?>"  <?php echo isset($rt['parent_id'])&&$rows['id']==$rt['parent_id'] ? 'selected="selected"' : '';?>>&nbsp;&nbsp;<?php echo $rows['name'];?></option>
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
	 </table>

	  <p style="text-align:center">
	   <input  name="topic_data" type="hidden" id="topic_data" value=''/>
		<input value=" 操作 " type="Submit" onclick="return checkForm()">
	  </p>
	 </form>
 </div> 
 
</div>

<?php  $thisurl = ADMIN_URL.'topgoods.php'; ?>
<script type="text/javascript">
//查找商品
var myTopic = Object();
function searchGoods(catId, brandId, keyword)
{
  var elements = document.forms['theForm'].elements;
  var filters = new Object; //以对象方式传递
  filters.cat_id = elements[catId].value;
  filters.brand_id = elements[brandId].value;
  filters.keyword = elements[keyword].value;
  
  createwindow();
  $.ajax({
	   type: "GET",
	   url: "<?php echo $thisurl;?>?type=searchGoods",
	   data: "data=" + $.toJSON(filters), //传送JSON数据到PHP页面接收
	   dataType: "json",
	   success: function(data){
		   	removewindow();
    		clearOptions("source_select");
   			var obj = document.getElementById("source_select");
			if(data.message!="" || data.message !=null){
				$.each(data.message,
				function(i, item) {
						  var opt   = document.createElement("OPTION");
						  opt.value = item.goods_id;
						  opt.text  = item.goods_name;
						  obj.options.add(opt);
				})
			}
	   }//end sucdess
  }); //end ajax

  return false;
}

function clearOptions(id)
{
  var obj = document.getElementById(id);
  while(obj.options.length>0)
  {
    obj.remove(0);
  }
}

function addAllItem(sender)
{
  if(sender.options.length == 0) return false;
  for (var i = 0; i < sender.options.length; i++)
  {
    var opt = sender.options[i];
    addItem(null, opt.value, opt.text);
  }
}
 
function addItem(sender, value, text)
{
  var target_select = document.getElementById("target_select");
  var newOpt   = document.createElement("OPTION");
  if (sender != null)
  {
    if(sender.options.length == 0) return false;
    var option = sender.options[sender.selectedIndex];
    newOpt.value = option.value;
    newOpt.text  = option.text;
  }
  else
  {
    newOpt.value = value;
    newOpt.text  = text;
  }
  if (targetItemExist(newOpt)) return false;
  if (target_select.length>=50)
  {
    alert("item_upper_limit");
  }
  target_select.options.add(newOpt);
  
  var key = 'default';
  
  if(!myTopic[key])
  {
    myTopic[key] = new Array();
  }
  myTopic[key].push(newOpt.text + "|" + newOpt.value);
}


// 商品是否存在
function targetItemExist(opt)
{
  var options = document.getElementById("target_select").options;
  for ( var i = 0; i < options.length; i++)
  {
    if(options[i].text == opt.text && options[i].value == opt.value) 
    {
      return true;
    }
  }
  return false;
}

function removeItem(sender,isAll)
{
  var key = 'default';
  var arr = myTopic[key];
  if (!isAll)
  {
  	if(sender.selectedIndex == -1) return false;
    var goodsName = sender.options[sender.selectedIndex].text;
    for (var j = 0; j < arr.length; j++)
    {
      if (arr[j].indexOf(goodsName) >= 0)
      {
          myTopic[key].splice(j,1);
      }
    }
 
    for (var i = 0; i < sender.options.length;)
    {
      if (sender.options[i].selected) {
        sender.remove(i);
        myTopic[key].splice(i, 0);
      }
      else
      {
        i++;
      }
    }
  }
  else
  {
    myTopic[key] = new Array();
    sender.innerHTML = "";
  }

}

function checkForm()
{
  document.getElementById("topic_data").value = $.toJSON(myTopic);  //解释为JSON格式
 
}

</script>
	  
