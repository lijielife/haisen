<div class="main">
	<div class="mainbox">
		<div class="lefts">
			<?php $this->element('dailimenu');?>
		</div>
		<div class="rights">
			<div style="background:url(<?php echo $this->img('houtai_31.png');?>) 22px center no-repeat;height:35px; border-bottom:1px solid #ddd;"><p style="font-size:14px;font-family:微软雅黑;  line-height:20px; padding:7px;padding-left:30px;  text-align:left">修改密码</p></div>
	<form name="USERINFO" id="USERINFO" action="" method="post" novalidate="novalidate">
	<ul class="s_shuru">
         <li>
        	<p><span style="color:#ea3100;">*</span>原始密码：
            </p>
            <span class="s_shuru_1">
            <input width="72%" type="text" id="newpass" name="newpass" value="" size="25" class="inputBg inp_jgxg" style="width:183px; height:24px; font-family:'微软雅黑'; ">
           	</span>
        </li>
         <li>
        	<p><span style="color:#ea3100;">*</span>新密码：
            </p>
            <span class="s_shuru_1">
            <input maxlength="20" width="72%" type="text" name="password" id="password" value="" size="25" class="inputBg inp_jgxg" style="width:183px; height:24px;font-family:'微软雅黑'; ">
           	</span>
        </li>
         <li>
        	<p><span style="color:#ea3100;">*</span>确认密码：
            </p>
            <span class="s_shuru_1">
            <input width="72%" type="text" name="rp_password" id="rp_password" value="" size="25" class="inputBg inp_jgxg" style="width:183px; height:24px;font-family:'微软雅黑'; ">
           	</span>
        </li>
        
    </ul>
    <div style="clear:both;"></div>
    <div style="padding-left:97px; padding-top:18px; padding-bottom:38px; text-align:left">
          <input name="submit" type="button" value="保存" onclick="update_user_pass(10);" class="gree" style="cursor:pointer; padding:2px">
          </div>
</form>
		</div>
		<div class="clear"></div>
	</div>
</div>