<style type="text/css">
 .freecatalog{  padding:20px 120px 0px 120px}
 .freecatalog_ptoto li{ float:left; margin:25px 35px 25px 35px; padding:10px;}
 </style>
 <div class="freecatalog">
 <div class="gehang"></div>
<div style="height:70px; width:100%; text-align:center; background:url(<?php echo $this->img('freecatalog_hear.png');?>) center top no-repeat"></div>
<?php if(!empty($rt['freecatalog_ptoto'])){?>
<div class="freecatalog_ptoto">
<ul>
<?php foreach($rt['freecatalog_ptoto'] as $row){?>
<li><img alt="<?php echo $row['photoname'];?>" src="<?php echo SITE_URL.$row['photourl'];?>" width="260"/></li>
<?php } ?>
</ul>
</div>
<?php } ?>
<div class="gehang"></div>
 <form id="FREECATALOG" name="FREECATALOG" method="post" action="">
 <table cellpadding="1" cellspacing="3" border="0" style="line-height:30px">
		<tr>
			<td style="height: 90px; font-weight: bold; font-size: 13px; color:#EA217F;" colspan="3" align="center">
				上百种世界各地时尚产品，让您领衔接触国际潮流，几十页精美彩色印刷杂志，<br>
				教您如何享受品质生活，多项专为您设计的优惠，给您意想不到的超值惊喜！！</td>
		</tr>
		<tr>
       <td colspan="3" style="height: 122px;">
      <table style="font-size: 12px;" width="99%" align="center" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td colspan="4" align="center" height="30">
                <strong style="color: rgb(122, 122, 81);">请选择您想索取的目录 </strong><font size="2" color="#000000">&nbsp; </font>
                <span style="font-size: 10pt;"></span><font style="color: rgb(122, 122, 81);" size="2" color="#666666">注:(学生索取请写家庭住址，18岁以下必须由家长索取）</font></td>
        </tr>

        <tr>
            <td colspan="4" style="height: 40px;" align="center">
			  <table id="ctl00_cph_ckbCatalogType" class="font" style="width: 486px;" border="0">
				<tr>
					<?php 
					if(!empty($rt['freecatalog'])){
					foreach($rt['freecatalog'] as $k=>$vv){
					echo '<td><label><input  name="dir_ids" type="checkbox" value="'.++$k.'">&nbsp;'.$vv.'</label></td>';
					}
					}
					?>
				</tr>
			</table>
             <br>
            </td>
        </tr>
        <tr style="font-size: 12px;">
            <td style="height: 32px; width: 94px;" align="right">                
             <span style="color: Red;">*</span>姓 名：
		    </td>

            <td style="width: 345px; height: 32px;" align="left">
               &nbsp;<input name="username" id="username" type="text"> 
			</td>
              <td style="width: 189px; height: 32px;">
                <div align="right">
                    出生日期：
				</div>
            </td>

            <td style="width: 325px; height: 32px;" align="left">
              &nbsp;<input name="birthday" id="birthday" type="text">
            </td>
        </tr>
        <tr style="font-size: 12px;">
            <td style="height: 32px; width: 94px;" align="right">
                顾 客 号：
			</td>
            <td style="height: 32px; width: 345px;" align="left">
			&nbsp;<input name="user_no" id="user_no" type="text">（新顾客无需填写）
            </td>
            <td style="height: 32px; width: 189px;">
 					   <div align="right">性别：</div>
            </td>
            <td style="width: 325px; color: rgb(102, 102, 102); height: 32px;" align="left">
				<label><input name="sex" value="1" checked="checked" type="radio">男</label>
				<label><input  name="sex" value="2" type="radio">女</label>
            </td>
        </tr>
        <tr style="font-size: 12px;">
              <td style="width: 127px; height: 32px;" align="right">
                 <span style="color: Red;">*</span> 区域：
			</td>
              <td style="height: 32px;" colspan="3" align="left">
           <?php $this->element('address',array('resslist'=>$rt['province']));?>
              </td>
          </tr>
        <tr style="font-size: 12px;">
            <td style="height: 32px; width: 94px;" align="right">
                    <span style="color: Red;">*</span>详细地址：</td>
            <td style="height: 32px; width: 345px;" align="left">
                &nbsp;<input name="address" id="address" type="text">
			</td>
            <td style="height: 32px; width: 189px;">
                <div align="right">
                   邮政编码：
			  </div>
            </td>

            <td style="width: 325px; height: 32px;" align="left">
                &nbsp;<input name="postcode" maxlength="6" id="postcode" style="width: 96px;" type="text"></td>
        </tr>
        <tr style="font-size: 12px;">
            <td style="height: 32px; width: 94px;" align="right">
                白天电话：</td>
            <td style="height: 32px; width: 345px;" align="left">
                &nbsp;<input name="dayphone" id="dayphone" type="text"></td>

            <td style="height: 32px; width: 189px;">
                <div align="right">
                    晚上电话：</div>
            </td>
            <td style="width: 325px; height: 32px;" align="left">
                &nbsp;<input name="nightphone" id="nightphone" type="text"></td>
        </tr>
        <tr style="font-size: 12px;">
            <td style="height: 42px; width: 94px;" align="right">
                <span style="color: Red;">*</span>手 机：
			</td>
            <td style="height: 42px; width: 345px;" align="left">
                <font size="2">&nbsp;<input name="mobile" id="mobile" type="text"></font></td>
            <td style="height: 42px; width: 189px;">
                <div align="right">
                    电子邮箱：</div>
            </td>
            <td style="width: 325px; height: 42px;" align="left">
                &nbsp;<input name="email" id="email" type="text"><br>
            </td>
        </tr>

        <tr align="center">
            <td colspan="4" style="height: 50px;" align="center">
			<input value="确定提交" style="background:url(<?php echo $this->img('submit.png');?>) center top no-repeat; width:100px; height:33px; border:none; background-color:#fff; text-align:center; cursor:pointer" type="button" onclick="submit_message()"/>
            </td>
        </tr>
    </table>
          </td>
    </tr>
   </table>
    </form>
	<script language="javascript" type="text/javascript">
	function submit_message(){
			var formObj      = document.forms['FREECATALOG']; //表单
			var mesobj        = new Object();
			if(formObj){
				mesobj = getFreecatalogFormAttrs(formObj);
			}else{
				alert('不存在表单对象！');	
				return false;
			}

			$.ajax({
			   type: "POST",
			   url: SITE_URL+"ajaxfile/freecatalog.php",
			   data: "action=feedback&message=" + $.toJSON(mesobj),
			   //dataType: "json",
			   success: function(data){ 
					JqueryDialog.Open('E姐商城提醒你',data,300,50);
			   } //end sucdess
			}); //end ajax
		} // end function
		//获取表单属性
		function getFreecatalogFormAttrs(formObj)
		{
		  var sp_arr = new Object();
		
		  for (i = 0; i < formObj.elements.length; i ++ )
		  {
			if(((formObj.elements[i].type == 'radio' || formObj.elements[i].type == 'checkbox') && formObj.elements[i].checked) || formObj.elements[i].tagName == 'SELECT' ||  formObj.elements[i].type == 'hidden' || formObj.elements[i].type=='text' || formObj.elements[i].type=='textarea')
			{
			  if(formObj.elements[i].type == 'checkbox'){
			  		sp_arr[formObj.elements[i].name] = formObj.elements[i].value+(typeof(sp_arr[formObj.elements[i].name])=='undefined' ? "" : '--'+sp_arr[formObj.elements[i].name]);
			  }else{
			  		sp_arr[formObj.elements[i].name] = formObj.elements[i].value;
			  }
			}
			  
		  }
		  return sp_arr;
		}
	</script>
<div style="height:50px; width:100%; text-align:center; background:url(<?php echo $this->img('nav_bot.png');?>) center top no-repeat"></div>
				
 </div>
<div class="gehang"></div>
<?php $this->element('help',array('help_article'=>$lang['help_article']));?>