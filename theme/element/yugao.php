<style type="text/css">
<!--
.rollBox2 {clear:both;height:228px; overflow:hidden;margin:0 auto; margin-bottom:10px; padding-top:8px;width:488px;}
.rollBox2 .LeftBotton2 {height:36px;width:14px;background:url(<?php echo $this->img('scroll-left2.png');?>) no-repeat 0px 0;overflow:hidden;float:left;display:inline;margin:90px 0 0 0;cursor:pointer; padding-right:0px}
.rollBox2 .RightBotton2 {height:36px;width:14px;background:url(<?php echo $this->img('scroll-right2.png');?>) no-repeat right top;;overflow:hidden;float:left;display:inline;margin:90px 0 0 0;cursor:pointer;padding-left:0px}
.rollBox2 .Cont2 {width:455px;overflow:hidden;float:left; margin:0 auto;border-color:#ccc;box-shadow:0 0 7px #ccc;}
.rollBox2 .ScrCont2 {width:10000000px;}
.rollBox2 .Cont2 .pic2 {width:150px;float:left;text-align:center;}
.rollBox2 .Cont2 .pic2 img {padding:1px;background:#fff; border:1px solid #ccc; display:block;margin:0 auto;width:145px; height:150px;}
.rollBox2 #List3, .rollBox2 #List4 {float:left; margin:0px; padding:0px}
.rollBox2 #List3 li,.rollBox2 #List4 li{ }
-->
</style>
<div class="rollBox2">
<div class="LeftBotton2" onmousedown="ISL_GoUp2()" onmouseup="ISL_StopUp2()" onmouseout="ISL_StopUp2()"></div>
<div class="Cont2" id="ISL_Cont2">
    <div class="ScrCont2">
      <div id="List3">
        <!-- 图片列表 begin -->
       <ul style="padding:0px; margin:0px">
	   <?php if(!empty($rts)){
	   foreach($rts as $val){?>
				<li style="list-style:none;float: left; text-align: center; margin:0px; padding:0px"><img src="<?php echo $val['article_img'];?>" border="0" height="221" alt="品牌预告" style="padding-top:2px;"/></li>
		<?php } ?>
		<?php foreach($rts as $val){?>
				<li style="list-style:none;float: left; text-align: center;"><img src="<?php echo $val['article_img'];?>" border="0" height="221" alt="品牌预告" style="padding-top:2px;"/></li>
		<?php } ?>
		<?php foreach($rts as $val){?>
				<li style="list-style:none;float: left; text-align: center;"><img src="<?php echo $val['article_img'];?>" border="0" height="221" alt="品牌预告" style="padding-top:2px;"/></li>
		<?php } ?>
		<?php foreach($rts as $val){?>
				<li style="list-style:none;float: left; text-align: center;"><img src="<?php echo $val['article_img'];?>" border="0" height="221" alt="品牌预告" style="padding-top:2px;"/></li>
		<?php } }else{ ?>
		<div style=" width:450px; padding-top:80px; height:140px; text-align:center; font-size:36px; color:#CC0000; font-weight:bold">暂无预告</div>
		<?php } ?>
		<div class="clear"></div>
        </ul>
        
        <!-- 图片列表 end -->
      </div>
      <div id="List4"></div>
    </div>
</div>
<div class="RightBotton2" onmousedown="ISL_GoDown2()" onmouseup="ISL_StopDown2()" onmouseout="ISL_StopDown2()"></div>
</div>
<script language="javascript" type="text/javascript">
<!--//--><![CDATA[//><!--
//图片滚动列表 mengjia 070816
var Speed2 = 0.1; //速度(毫秒)
var Space2 = 9; //每次移动(px)
var PageWidth2 = 455; //翻页宽度
var fill2 = 0; //整体移位
var MoveLock2 = false;
var MoveTimeObj2;
var Comp2 = 0;
var AutoPlayObj2 = null;
GetObj("List4").innerHTML = GetObj("List3").innerHTML;
GetObj('ISL_Cont2').scrollLeft = fill2;
GetObj("ISL_Cont2").onmouseover = function(){clearInterval(AutoPlayObj2);}
GetObj("ISL_Cont2").onmouseout = function(){AutoPlay2();}
AutoPlay2();
function GetObj(objName2){if(document.getElementById){return eval('document.getElementById("'+objName2+'")')}else{return eval('document.all.'+objName2)}}
function AutoPlay2(){ //自动滚动
clearInterval(AutoPlayObj2);
AutoPlayObj2 = setInterval('ISL_GoDown2();ISL_StopDown2();',3000); //间隔时间
}
function ISL_GoUp2(){ //上翻开始
if(MoveLock2) return;
clearInterval(AutoPlayObj2);
MoveLock2 = true;
MoveTimeObj2 = setInterval('ISL_ScrUp2();',Speed2);
}
function ISL_StopUp2(){ //上翻停止
clearInterval(MoveTimeObj2);
if(GetObj('ISL_Cont2').scrollLeft % PageWidth2 - fill2 != 0){
Comp2 = fill2 - (GetObj('ISL_Cont2').scrollLeft % PageWidth2);
CompScr2();
}else{
MoveLock2 = false;
}
AutoPlay2();
}
function ISL_ScrUp2(){ //上翻动作
if(GetObj('ISL_Cont2').scrollLeft <= 0){GetObj('ISL_Cont2').scrollLeft = GetObj('ISL_Cont2').scrollLeft + GetObj('List3').offsetWidth}
GetObj('ISL_Cont2').scrollLeft -= Space2 ;
}
function ISL_GoDown2(){ //下翻
clearInterval(MoveTimeObj2);
if(MoveLock2) return;
clearInterval(AutoPlayObj2);
MoveLock2 = true;
ISL_ScrDown2();
MoveTimeObj2 = setInterval('ISL_ScrDown2()',Speed2);
}
function ISL_StopDown2(){ //下翻停止
clearInterval(MoveTimeObj2);
if(GetObj('ISL_Cont2').scrollLeft % PageWidth2 - fill2 != 0 ){
Comp2 = PageWidth2 - GetObj('ISL_Cont2').scrollLeft % PageWidth2 + fill2;
CompScr2();
}else{
MoveLock2 = false;
}
AutoPlay2();
}
function ISL_ScrDown2(){ //下翻动作
if(GetObj('ISL_Cont2').scrollLeft >= GetObj('List3').scrollWidth2){GetObj('ISL_Cont2').scrollLeft = GetObj('ISL_Cont2').scrollLeft - GetObj('List3').scrollWidth2;}
GetObj('ISL_Cont2').scrollLeft += Space2 ;
}
function CompScr2(){
var num2;
if(Comp2 == 0){MoveLock2 = false;return;}
if(Comp2 < 0){ //上翻
if(Comp2 < -Space2){
   Comp2 += Space2;
   num2 = Space2;
}else{
   num2 = -Comp2;
   Comp2 = 0;
}
GetObj('ISL_Cont2').scrollLeft -= num2;
setTimeout('CompScr2()',Speed2);
}else{ //下翻
if(Comp2 > Space2){
   Comp2 -= Space2;
   num2 = Space2;
}else{
   num2 = Comp2;
   Comp2 = 0;
}
GetObj('ISL_Cont2').scrollLeft += num2;
setTimeout('CompScr2()',Speed2);
}
}
//--><!]]>
</script>