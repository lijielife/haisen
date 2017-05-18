<div class="footer">
		<div class="footerbox">
        	
			<div class="tooterboxtop">
            	<div class="lianxius">
                <p class="t">在线客服</p>
                <table>
                <tr>
                <td align="left" valign="top">
                <?php if(!empty($lang['wangwang']))foreach($lang['wangwang'] as $ww){?>
                  <p>
                  <a target="_blank" href="http://www.taobao.com/webww/ww.php?ver=3&touid=<?php echo $ww;?>&siteid=cntaobao&status=1&charset=utf-8"><img border="0" src="http://amos.alicdn.com/realonline.aw?v=2&uid=<?php echo $ww;?>&site=cntaobao&s=1&charset=utf-8" alt="点击这里给我发消息" /></a>
                  </p>
                 <?php } ?>
                </td>
                <td align="left" valign="top" style="padding-left:20px">
                 <?php if(!empty($lang['custome_qq']))foreach($lang['custome_qq'] as $qq){?>
                  <p>
                    <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $qq;?>&amp;site=qq&amp;menu=yes" target="_blank"><img border="0" title="点击这里给我发消息" alt="点击这里给我发消息" src="http://wpa.qq.com/pa?p=2:<?php echo $qq;?>:42"></a>
                  </p>
                   <?php } ?>
                </td>
                </tr>
                </table>
              
                </div>
				<span class="tpn2"><?php echo $lang['custome_phone'][1];?></span>
				<span class="email"><?php echo $lang['custome_email'];?></span>
				<div class="yh"><img src="<?php echo $this->img('yh.jpg');?>" style="max-height:100%; max-width:100%" /></div>
			</div>
			<div class="footerboxc">
			<p class="footerin">
			<?php if(!empty($lang['navlist_footer']))foreach($lang['navlist_footer'] as $row){?>
			<a href="<?php echo $row['url'];?>"><?php echo $row['name'];?></a>
			<?php } ?>
			</p>
			<p>
			<?php echo $lang['copyright'];?>&nbsp;<?php echo $lang['tongjicode'];?>
			</p>
			<p>
			<?php echo $lang['beian_num'];?>
			</p>
			</div>
		</div>
</div>