<style type="text/css">
body{ background:#<?php echo $rt['info']['topic_bgcolor'];?>; }

<?php if(!empty($rt['info']['topic_bgimg'])){?>
.topmain{ background:url(<?php echo SITE_URL.$rt['info']['topic_bgimg'];?>) center top no-repeat}
<?php } ?>
</style>
<div class="topimg" style="background:url(<?php echo SITE_URL.$rt['info']['topic_img'];?>) center top no-repeat;">
<div class="title"><?php echo $rt['info']['topic_name'];?></div>
<div class="topimgbox">
		<div class="titles"><span id="lefttime_2"><?php echo $rt['info']['topic_name'];?></span></div>
</div>
<?php
$h = 300;
if(is_file(SYS_PATH.$rt['info']['topic_img'])){
 $img = @getimagesize(SYS_PATH.$rt['info']['topic_img']);
 $h = $img[1];
}
?>
</div>
<div class="topmain">
	<div class="topmainbox">
		<?php if(!empty($rt['goodslist']))foreach($rt['goodslist'] as $key=>$item){?>
		<div class="items">
			<div class="tis"><span><?php echo $key;?></span></div>
			<ul>
				<?php if(!empty($item))foreach($item as $rows){?>
				<li>
				<div class="imgbox">
				<a href="<?php echo SITE_URL.'product.php?id='.$rows['goods_id'];?>"><img src="<?php echo SITE_URL.$rows['goods_img'];?>" alt="<?php echo $rows['goods_name'];?>" width="320" onload="loadimg(this,320,320)" title="<?php echo $rows['goods_name'];?>" /></a>
				</div>
				<p class="fname"><a href="<?php echo SITE_URL.'product.php?id='.$rows['goods_id'];?>"><?php echo $rows['goods_name'];?></a></p>
				<p class="price"><b>￥<?php echo $rows['pifa_price'];?></b><del>￥<?php echo $rows['shop_price'];?></del></p>
				</li>
				<?php } ?>
				<div class="clear"></div>
			</ul>
		</div>
	  <?php } ?>
	  	
			<div style="width:1020px; margin:0px auto">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr>
					<td width="50%" align="center">
					<div style="width:500px;">
						<h2 style="text-align:left; padding-left:18px; color:#FE0182; font-size:20px">明天预告</h2>
						<?php $this->element('yugao',array('rts'=>$rt['yugao']));?>
					</div>
					</td>
					<td width="50%" align="center">
					<div style="width:500px;">
						<h2 style="text-align:left; padding-left:18px; color:#FE0182; font-size:20px">后天预告</h2>
						 <iframe src="<?php echo SITE_URL;?>yugao.php" scrolling="no" frameborder="0" width="488" height="236"></iframe >
					</div>
					</td>
					</tr>
			</table>
			</div>
	
	</div>
	
</div>


<script type="text/javascript">
$('.topimg').height(<?php echo $h;?>);

var dt = '<?php echo $rt['info']['start_time']<mktime() ? ($rt['info']['end_time']-mktime()) : ($rt['info']['end_time']-$rt['info']['start_time']);?>';
var st = new showTime('2', dt);  
st.desc = "抢购结束";
st.preg = "{a}天	{b}:{c}:{d}";
st.setid = "lefttime_";
st.setTimeShow(); 


</script>