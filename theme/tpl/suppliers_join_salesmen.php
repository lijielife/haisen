<div id="wrap">
	<div class="clear7"></div>
<?php $this->element('user_menu');?>
    <div class="m_right" >
		<h2 class="con_title">申请成为业务员</h2>
    	<div class="memberzl" style="height:auto">
      		<form id="theForm" name="theForm" method="post" action="">
			<table cellspacing="2" cellpadding="5" width="100%">
			<tr>
			<td>&nbsp;</td>
			<td align="left">
				<fieldset style="border: 1px solid #B4C9C6;">
				  <legend style="background: none repeat scroll #FFF;">推广品牌:</legend>
				  <table style="width: 700px;" align="left">
				  <tr>
					<td align="center">所有品牌</td>
					<td align="center"><div style="height:25px; line-height:25px; width:90px; background-color:#ededed; border-bottom:2px solid #ccc; border-right:2px solid #ccc; padding-left:5px; padding-right:5px; color:#fe0000"><?php //if(empty($is_salesmen)){echo '当前未审核状态';}else{ echo '当前已审核状态';}?></div></td>
					<td align="center">你申请的品牌</td>
				  </tr>
				  <tr>
				  <td width="33%" align="center">        
				  <select name="source_select" id="source_select" size="20" style="width:80%;height:300px;"  ondblclick="addItem(this)">
				  <?php if(!empty($allbrand))foreach($allbrand as $row){?>
            		<option value="<?php echo $row['brand_id'];?>"><?php echo $row['brand_name'];?></option>
				  <?php } ?>
				  </select>
					</td>
				  <td align="center" width="30%">
					<p style="padding-bottom:5px">
					  <input name="button" type="button" onclick="addAllItem(document.getElementById('source_select'))" value="&gt;&gt;" style="padding-left:5px; padding-right:5px; cursor:pointer"/>
					</p>
					<p style="padding-bottom:5px">
					  <input name="button" type="button" class="button" onclick="addItem(document.getElementById('source_select'))" value="&gt;" style="padding-left:5px; padding-right:5px; cursor:pointer"/>
					</p>
					<p style="padding-bottom:5px">
					  <input name="button" type="button" class="button" onclick="removeItem(document.getElementById('target_select'))" value="&lt;" style="padding-left:5px; padding-right:5px; cursor:pointer"/>
					</p>
					<p style="padding-bottom:5px">
					  <input name="button" type="button" class="button" value="&lt;&lt;" onclick="removeItem(document.getElementById('target_select'), true)" style="padding-left:5px; padding-right:5px; cursor:pointer"/>
					</p></td>
				    <td width="" align="center">
					<select name="target_select" id="target_select" size="20" style="width:80%;height:300px" multiple="multiple">
					  <?php if(!empty($dbbrand))foreach($dbbrand as $row){?>
            		<option value="<?php echo $row['brand_id'];?>"><?php echo $row['brand_name'];?></option>
				  	<?php } ?>
					</select>          
					</td>
				</tr>
				  </table>
				</fieldset>
			</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td>
			  <input type="button" value="保存" style="padding:0px 5px 0px 5px; cursor:pointer" onclick="save_brand_ids()"/>
			</td>
			</tr>
			 </table>
		 </form>
         </div>
     </div>
    <div class="clear"></div>
</div>
<div class="clear7"></div>
 <?php  $thisurl = SITE_URL.'suppliers.php'; ?>

<script language="javascript" type="text/javascript">
var myTopic = [];
function save_brand_ids(){
	var arr = [];
	$('select[name="target_select"] option').each(function(){
			arr.push($(this).val());
	});
	if(arr!=null && arr!=""){
		var str=arr.join('+');
	}
	createwindow();
	$.get('<?php echo $thisurl;?>',{act:'ajax_save_brand_ids',brand_ids:str},function(data){
				removewindow();
				if(data=="" || data==null){
					alert("保存成功！你申请的品牌正在审核，请留意你的信箱或者电子邮箱！");
				}else{
					alert(data);
				}
	});
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
    //alert("item_upper_limit");
  }
 // myTopic.push(newOpt.value);
  target_select.options.add(newOpt);
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

function removeItem(sender,isAll)
{
  if (!isAll)
  {
  	if(sender.selectedIndex == -1) return false;
	 
    for (var i = 0; i < sender.options.length;)
    {
      if (sender.options[i].selected) {
        sender.remove(i);
      }
      else
      {
        i++;
      }
    }
  }
  else
  {
    sender.innerHTML = "";
  }
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
</script>
