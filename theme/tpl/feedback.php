<?php $this->element('chat',array('custome_qq'=>$lang['custome_qq'],'sitename'=>$lang['site_name']));?>

 <!--[if !IE]>   main    <![endif]-->
    <div class="main" style="background:url(<?php echo $this->img('bg_main.png');?>) repeat-y;">
    	<!--[if !IE]>   leftsidebar    <![endif]-->
    	<div class="leftsidebar">
        	        	<div class="wiebo"><a href="<?php echo (!empty($lang['company_url'])) ? $lang['company_url'] : 'javascript:;'; ?>" target="_blank"><img src="<?php echo $this->img('index_22.png');?>" width="250" height="78" /></a></div>
            <!--[if !IE]>    内页导航 end    <![endif]-->
            <div class="neiymenu">
            	<div class="title"><img src="<?php echo $this->img('neiy-3_06.png');?>" width="250" height="40" /></div>
                 <div class="content">
                	<ul>
					<?php 
					if(!empty($rt['all_cate'])){
					foreach($rt['all_cate'] as $row){
					?>
					<?php 
					if(isset($rt['article_list'][$row['id']])&&!empty($rt['article_list'][$row['id']])){
					foreach($rt['article_list'][$row['id']] as $rows){
					?>
					<li class="conbox">
					<a href="<?php echo $rows['url'];?>" title="<?php echo $rows['article_title'];?>" id="<?php echo $rows['article_id'];?>"><?php echo $rows['article_title'];?></a>
					</li>
					<?php 
					}
					}
					?>
				    <?php } } ?>
					<li><a href="feedback.php">客户留言</a></li>
                    </ul>
                </div>
            </div>
            <!--[if !IE]>    内页导航 end    <![endif]-->
       		 <!--[if !IE]>    Menu    <![endif]-->
			<?php $this->element('cate_menu',array('menu'=>$rt['menu']));?>
            <!--[if !IE]>    Menu end   <![endif]-->
        </div>
        <!--[if !IE]>   leftsidebar end    <![endif]-->
        <!--[if !IE]>   main right   <![endif]-->
        <div class="mainright ARTICLECONNENT">
		<div class="neiytitle" style="margin:0px 10px; border-bottom:1px solid #007b74;">
		您当前的位置：<?php echo !empty($rt['hear'])? @implode("",$rt['hear']) : "";?>
		</div>
		<div class="neiycontent">
			<form action="" method="post" name="MESSAGES" id="MESSAGES">
            	<table width="720" border="0" cellspacing="5" cellpadding="0" style="line-height:30px;">
                  <tr>
                    <td width="10%">&nbsp;</td>
                    <td width="10%" align="right">标题：</td>
                    <td width="70%"><label>
                      <input name="comment_title" type="text" size="45" />
                    </label>&nbsp;<font color='red' class="title_mes">*</font></td>
                    <td width="10%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td align="right" valign="top">留言内容：</td>
                    <td><label>
                      <textarea name="content" cols="45" rows="10" style="width:380px;height:130px; font-size:12px;"></textarea>
                    </label>&nbsp;<font color='red' class="content_mes">*</font></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td align="right">姓名：</td>
                    <td><label>
                      <input name="user_name" type="text" size="45" />
                    </label>&nbsp;<font color='red' class="uname_mes">*</font></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td align="right">性别：</td>
                    <td><p>
						 <label>
                        <input type="radio" name="sex" value="0" checked="checked"/>
                        保密</label>
                      <label>
                        <input type="radio" name="sex" value="1" />
                        男</label>
                      <label>
                        <input type="radio" name="sex" value="2" />
                        女</label>
                      <br />
                    </p></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td align="right">手机：</td>
                    <td><label>
                      <input name="mobile" type="text" size="45" />
                    </label>&nbsp;<font color='red' class="mobile_mes"></font></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td align="right">联系电话：</td>
                    <td><label>
                      <input name="telephone" type="text" size="45" />
                    </label>&nbsp;<font color='red' class="tel_mes">*</font><br /><em>区号(2到3位)-电话号码(7到8位)-分机号(3位)[无分机号留空]</em></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td align="right">邮箱：</td>
                    <td><label>
                      <input name="email" type="text" size="45" />
                    </label>&nbsp;<font color='red' class="email_mes">*</font></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td align="right">公司名称：</td>
                    <td><label>
                      <input name="companyname" type="text" size="45" />
                    </label></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td align="right">公司地址：</td>
                    <td><label>
                      <input name="address" type="text" size="45" />
                    </label></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td align="right">公司网址：</td>
                    <td><label>
                      <input name="companyurl" type="text" size="45" />
                    </label></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><label>
                      <input type="button" name="submitmes" id="button" value="" class="msgbtn" />
                      <input type="reset" name="button2" id="button2" value=""  class="msgbtn2"/>
                    </label></td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
              </form>
		</div>
      	</div>
        <!--[if !IE]>   main right end    <![endif]-->    
		<script type="text/javascript">
		$('.conbox a').click(function(){
			changestyle($(this));
			ids = $(this).attr('id');
			if(ids=="" || typeof(ids)=='undefined') return false;
			$.post(SITE_URL+'ajaxfile/article.php',{action:'getarticle',article_id:ids},function(data){
				$('.ARTICLECONNENT').hide();
				if(data !="" && typeof(data)!="undefined"){
					$('.ARTICLECONNENT').html(data);
					$('.ARTICLECONNENT').fadeIn("slow");
				}
			});
			
			return false;
		});
		
		function changestyle(thisobj){
			$('.conbox').each(function(){
				$(this).find('a').css('background','#FFF');
				$(this).find('a').css('font-weight','100');
			});
			$(thisobj).css('font-weight','bold');
			$(thisobj).css('background','url(<?php echo $this->img('index_30.png');?>) left center no-repeat');
		}
		/////
		function submit_message(){
			var formObj      = document.forms['MESSAGES']; //表单
			var mesobj        = new Object();
			if(formObj){
				mesobj = getFormAttrs(formObj);
			}else{
				alert('不存在留言表单对象！');	
				return false;
			}
			
			$.ajax({
			   type: "POST",
			   url: SITE_URL+"ajaxfile/feedback.php",
			   data: "action=feedback&message=" + $.toJSON(mesobj),
			   dataType: "json",
			   success: function(data){
					if(data.error==0){
						alert('留言成功，我们会很快处理你的留言！');
					}else{
						alert(data.message);
					}
			   } //end sucdess
			}); //end ajax
		} // end function

		function checkform(){
			titles = $('input[name="comment_title"]').val();
			if(titles==""){
				$('.title_mes').html('标题不能为空');
				return false;
			}
			clearmes();
			con = $('textarea[name="content"]').val();
			if(con==""){
				$('.content_mes').html('留言内容不能为空');
				return false;
			}
			clearmes();
			uname = $('input[name="user_name"]').val();
			if(uname==""){
				$('.uname_mes').html('留言名称不能为空');
				return false;
			}
			clearmes();
			mobiles = $('input[name="mobile"]').val();
			if(mobiles!=""){
				if(isMobile(mobiles)==false){
					$('.mobile_mes').html('请检查你的手机号码是否正确');
					return false;
				}
			}
			clearmes();
			tel = $('input[name="telephone"]').val();
			if(tel==""){
				$('.tel_mes').html('联系电话不能为空');
				return false;
			}
			clearmes();
			if(isTel(tel)==false){
				$('.tel_mes').html('非法电话号码');
				return false;
			}
			clearmes();
			emails = $('input[name="email"]').val();
			if(emails==""){
				$('.email_mes').html('电子邮箱不能为空');
				return false;
			}
			clearmes();
			if(isEmail(emails)==false){
				$('.email_mes').html('请检查你的电子邮箱');
				return false;
			}
			clearmes();
			return true;
		}
		
		function clearmes(){
			arr = ['title_mes','content_mes','uname_mes','mobile_mes','tel_mes','email_mes'];
			for(i=0;i<arr.length;i++){
				$('.'+arr[i]).html("*");
				if(arr[i]=='mobile_mes') $('.'+arr[i]).html("");
			}
		}
		function cleartext(){
			arr = ['comment_title','content','user_name','mobile','telephone','email','companyname','address','companyurl'];
			for(i=0;i<arr.length;i++){
				if(arr[i]=='content'){
					$('textarea[name="'+arr[i]+'"]').val("");
				}else{
					$('input[name="'+arr[i]+'"]').val("");
				}
			}
		}
		
		$('input[name="submitmes"]').click(function(){
			if(checkform()==false){
				return false;
			}
			submit_message();
			cleartext();
			return false;
		});
		
		</script>    
    </div>
    <!--[if !IE]>   main end    <![endif]-->
<!--[if !IE]>   帮助中心    <![endif]-->
<?php $this->element('help',array('help_article'=>$lang['help_article']));?>
<!--[if !IE]>   帮助中心 end    <![endif]-->