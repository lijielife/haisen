 <?php 
$uname = $this->Session->read('User.username');
 if(empty($uname)){ echo '<script>location.href="user.php?act=login";</script>'; exit;}
 ?>
		   <div style="min-height:280px; border:1px solid #ccc; text-align:center">
  				<h2 style="text-align:center; margin-top:50px;">注册成功！欢迎你成为E姐商城的会员！<br /><br />你的用户名：<font color="#FF0000"><b><?php echo $uname;?></b></font>,请牢记！<br /><br /><font color="#FF0000" class="times">5</font>秒后自动进入用户后台！</h2>
		   </div>
	  	
		<script>
		function changetime(i){
			dd = $('.times').html();
			dd = parseInt(dd)-1;
			if(dd==0){
			location.href=SITE_URL+"user.php";
			}
			$('.times').html(dd);
		}
		setInterval("changetime(5)",1000) 
		</script>