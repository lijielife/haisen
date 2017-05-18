<div class="cxgoodslist">
<ul>
<?php if(!empty($rt['categoodslist'])) foreach($rt['categoodslist'] as $k=>$row){?>
	<li>
		<div class="libox">
			<p class="timess"></p>
			<p class="timessf" id="lefttime_<?php echo $k;?>">--:--:--</p>
			<span class="offprice"><?php echo sprintf('%.1f',($row['zprice']/$row['shop_price'])*10);?>折</span>
			<div class="imgbox">
			<a target="_blank" href="<?php echo SITE_URL.'product.php?id='.$row['goods_id'];?>"><img src="<?php echo $row['goods_thumb'];?>" alt="<?php echo $row['goods_name'];?>" width="233" onload="loadimg(this,233,255)" title="<?php echo $row['goods_name'];?>" /></a>
			</div>
			<p class="fname"><a target="_blank" href="<?php echo SITE_URL.'product.php?id='.$row['goods_id'];?>"><?php echo $row['goods_name'];?></a></p>
			<p class="price"><b>￥<?php echo $row['zprice'];?></b><del>￥<?php echo $row['shop_price'];?></del></p>
		</div>
	</li>
<?php } ?>
<div class="clear"></div>
</ul>
</div>
<?php if(!empty($rt['categoodspage'])){?>
<p class="pages">
<?php echo str_replace('首页','<img src="'.SITE_URL.'theme/images/first.png" align="absmiddle" />',$rt['categoodspage']['first']);?>
<?php echo str_replace('上一页','<img src="'.SITE_URL.'theme/images/previ.png" align="absmiddle" />',$rt['categoodspage']['prev']);?>
<?php
 if(isset($rt['categoodspage']['list'])&&!empty($rt['categoodspage']['list'])){
 foreach($rt['categoodspage']['list'] as $kk=>$aa){
 echo '<a href="'.$aa.'"'.($kk==$rt[page]?' class="thispage la"':' class="la"').'>'.$kk.'</a>'."\n";
 }
 }
?>

<?php echo str_replace('下一页','<img src="'.SITE_URL.'theme/images/next.png" align="absmiddle" />',$rt['categoodspage']['next']);?>
<?php echo str_replace('尾页','<img src="'.SITE_URL.'theme/images/last.png" align="absmiddle" />',$rt['categoodspage']['last']);?>
<em>到第<input type="text" name="pageindex" class="pageinput" value="<?php echo $rt['page']+1;?>" maxlength="4">页</em><input type="submit" name="Submit" class="subtxt" value="确认" onclick="return ajax_page_jump()"/>
</p>
<?php } ?>
<script language=JavaScript>
window.load = givetime();
var endtimes=new Array();//结束时间
<?php if(!empty($rt['categoodslist']))foreach($rt['categoodslist'] as $k=>$row){?>
endtimes[<?php echo $k;?>]="<?php echo date('m/d/Y H:i:s',$row['promote_end_date']);?>";
<?php } ?>
var nowtimes;
function givetime(){
	nowtimes=new Date("<?php echo date('m/d/Y H:i:s',mktime());?>");//当前服务器时间
	window.setTimeout("DownCount()",1000)
}
function DownCount(){
	nowtimes=Number(nowtimes)+1000;
	for(var i=0;i<<?php echo count($rt['categoodslist']);?>;i++)
	{
		var theDay=new Date(endtimes[i]);
		theDay=theDay++;
		if(theDay<=nowtimes)
		{
			document.getElementById("lefttime_"+i).innerHTML = "促销结束";
		}
		else{
				timechange(theDay,i);
			
		}
	}
	window.setTimeout("DownCount()",1000)
}
function timechange(theDay,i){
	var theDays=new Date(theDay);
	var seconds = (theDays - nowtimes)/1000;
	var minutes = Math.floor(seconds/60);
	var hours = Math.floor(minutes/60);
	var days = Math.floor(hours/24);
	var CDay= days;
	var CHour= hours % 24;
	var CMinute= minutes % 60;
	var CSecond= seconds % 60;
	var CHour=CHour+CDay*24;
	if(CMinute<10)
	{
		CMinute="0"+CMinute;
	}
	if(CHour<10)
	{
		CHour="0"+CHour;
	}
	if(CSecond<10)
	{
		CSecond="0"+CSecond;
	}
	document.getElementById("lefttime_"+i).innerHTML = '倒计时 '+CHour + ":" + CMinute + ":" + CSecond;
}
</script>