<div>
	<div class="find_account">
            <div class="find_account_top">
                查找添加公众号<span class="tpl-weixinhao red-font"><?php echo $weixin;?></span>
            </div>
            <div class="find_account_bot">
                <div class="find_account_bot_tip">
                    使用微信“通讯录”中的“添加”来“查找公众号”，查找“<span class="tpl-weixinhao"><?php echo $weixin;?></span>”并关注。
                </div>
                <div class="find_account_bot_img"><img src="<?php echo $this->img('gz/find.jpg');?>"></div>
            </div>
      </div>
		
		
	  <div class="find_account">
            <div class="find_account_top">
                保存并扫描该二维码图片进行关注
            </div>
            <div class="find_account_bot">
                <div class="find_account_bot_img">
                    <img class="tpl-mark" src="<?php echo !empty($codeimg) ? $codeimg : $this->img('gz/getqrcode.jpg');?>">
                </div>
                <div class="find_account_bot">
                    <div class="find_account_bot_tip">长按上面二维码并保存，使用微信“扫一扫”中“从相册选择二维码”扫描关注我们。</div>
                    <div class="find_account_bot_img"><img src="<?php echo $this->img('gz/markfind.jpg');?>"></div>
                </div>
            </div>
        </div>
		
			
</div>