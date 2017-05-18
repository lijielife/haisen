<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/15/css.css" media="all" />
<?php $this->element('15/top',array('lang'=>$lang)); ?>
<style type="text/css"> 
.maind{width:100%; height:280px; position:relative; margin:20px auto}
#disk{width:100%; height:280px; background:url(<?php echo ADMIN_URL;?>images/disk.jpg) no-repeat;}
#start{width:163px; height:320px; position:absolute; top:22px; left:82px;}
#start img{cursor:pointer}
</style>
<script type="text/javascript" src="<?php echo ADMIN_URL;?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_URL;?>js/jQueryRotate.2.2.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_URL;?>js/jquery.easing.min.js"></script>
<script type="text/javascript"> 
$(function(){
	 $("#startbtn").click(function(){
		lottery();
	});
});
function lottery(){
	$.ajax({
		type: 'POST',
		url: '<?php echo ADMIN_URL;?>user.php',
        data: "action=ajax_choujiang",
		dataType: 'json',
		cache: false,
		error: function(){
			alert('出错了！');
			return false;
		},
		success:function(json){
            if(json.info){
                alert(json.info);return false;
            }
			var a = json.angle;
			var name = json.name;
			var prize = json.prize;
			var alt='恭喜你，中了'+prize+'！奖品是：'+name;
			$("#startbtn").rotate({
				duration:3000,
				angle: 0,
            	animateTo:1800+a,
				easing: $.easing.easeOutSine,
				callback: function(){
					alert(alt);
				}
			});
		}
	});
}
</script>

<body style="background:#FFF">

<div style="margin-left:10%;width=100%; background:#FFF">
   <div id="main" style="background:#FFF">
   <div class="maind">
        <div id="disk"></div>
        <div id="start"><img src="<?php echo ADMIN_URL;?>images/start.png" id="startbtn"></div>
   </div>
</div> 
</div>

<center>
<div style="background:#FFF8B2;width:310px;height:300px;">
<div style="border:1px dashed #E3E09D;width:300px;height:295px;">
<div style="float:left;"><img src="images/jiang.png"></div>
<div style="float:left;color:#4B4918">
<P><strong>每人最多允许抽奖次数：<?php echo $rts['num'];?></strong></P></br>
<div style="float:left;">
<?php if(!empty($rt))foreach($rt as $row){?>		 
<P><strong><?php echo $row['lt_prize'];?>：<?php echo $row['lt_name'];?></strong></p></br>
<?php } ?>	
</div>
</div>
</div>
</div>
<br/>
<div style="background:#FFF8B2;width:310px;height:200px;">

<center>
<div style="border:1px dashed #E3E09D;width:300px;height:195px;">
<div style="float:left;"><img src="images/shuoming.png"></div>
<div style="float:left;color:#4B4918">
<p><strong><?php echo $rts['content'];?></strong></p>
<br/>
<center><a href="<?php echo ADMIN_URL."user.php?act=prize" ?>">查看我的奖项</a></center>
</div>

</div>
</center>

</div>

</body>


<?php $this->element('15/footer',array('lang'=>$lang)); ?>