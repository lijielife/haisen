<div>
<p>亲爱的<b><?php echo $rt['user_name'];?></b>，你已经注册成功！你目前的账号处于失活状态，为了你能够顺利购物，请你<a style="font-weight:bold" href="<?php echo SITE_URL;?>useractive.php?act=<?php echo base64_encode($rt['user_name'].'||'.$rt['uid'].'||'.$rt['user_rank'].'||'.mktime().'||'.$rt['email']);?>" target="_blank">点击这里</a>激活;</p>
<p>如果你点击无响应，那么复制下面链接在浏览器的输入栏按回车键!</p>
<p><a href="<?php echo SITE_URL;?>useractive.php?act=<?php echo base64_encode($rt['user_name'].'||'.$rt['uid'].'||'.$rt['user_rank'].'||'.mktime().'||'.$rt['email']);?>"><?php echo SITE_URL;?>useractive.php?act=<?php echo base64_encode($rt['user_name'].'||'.$rt['uid'].'||'.$rt['user_rank'].'||'.mktime().'||'.$rt['email']);?></a></p>
<p>激活链接有效期为24小时，请你在24小时内激活你的账户！</p>
</div>