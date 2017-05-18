<style type="text/css">
.blk_18 {
overflow:hidden;
zoom:1;
font-size:9pt;
width:800px;
position:relative;
}
.blk_18 .pcont {
width:800px;
float:left;
overflow:hidden;
padding-left:5px;
}
.blk_18 .ScrCont {
width:32766px;
zoom:1;
margin-left:-5px;
}
.blk_18 #List1_1, .blk_18 #List2_1 {
float:left;
}
.blk_18 .LeftBotton, .blk_18 .RightBotton {
width:92px;
height:263px;
}
.blk_18 .LeftBotton {
background-position: 0 0;
position:absolute;
left:-93px; top:0px;
z-index:999;
background: url(<?php echo $this->img('jj-arrow.png');?>) left top no-repeat;
}
.blk_18 .RightBotton {
background-position: 0 -100px;
position:absolute;
right:-93px; top:0px;
z-index:999;
background: url(<?php echo $this->img('jj-arrow.png');?>) left -263px no-repeat;
}
.blk_18 .LeftBotton:hover {

}
.blk_18 .RightBotton:hover {

}
.blk_18 .pl img {
display:block;
cursor:pointer;
border:none;
margin:0px auto;
}
.blk_18 .pl {
width:267px;
float:left;
float:left;
text-align:center;
line-height:24px;
}
.blk_18 a.pl:hover {
color:#5dacec;
background:#fff;
}
</style>
<script type="text/javascript">
var Speed_1 = 10; //速度(毫秒)
var Space_1 = 20; //每次移动(px)
var PageWidth_1 = 263 * 3; //翻页宽度
var interval_1 = 4000; //翻页间隔时间
var fill_1 = 0; //整体移位
var MoveLock_1 = false;
var MoveTimeObj_1;
var MoveWay_1="right";
var Comp_1 = 0;
var AutoPlayObj_1=null;
function GetObj(objName){if(document.getElementById){return eval('document.getElementById("'+objName+'")')}else{return eval('document.all.'+objName)}}
function AutoPlay_1(){clearInterval(AutoPlayObj_1);AutoPlayObj_1=setInterval('ISL_GoDown_1();ISL_StopDown_1();',interval_1)}
function ISL_GoUp_1(){if(MoveLock_1)return;clearInterval(AutoPlayObj_1);MoveLock_1=true;MoveWay_1="left";MoveTimeObj_1=setInterval('ISL_ScrUp_1();',Speed_1);}
function ISL_StopUp_1(){if(MoveWay_1 == "right"){return};clearInterval(MoveTimeObj_1);if((GetObj('ISL_Cont_1').scrollLeft-fill_1)%PageWidth_1!=0){Comp_1=fill_1-(GetObj('ISL_Cont_1').scrollLeft%PageWidth_1);CompScr_1()}else{MoveLock_1=false}
AutoPlay_1()}
function ISL_ScrUp_1(){if(GetObj('ISL_Cont_1').scrollLeft<=0){GetObj('ISL_Cont_1').scrollLeft=GetObj('ISL_Cont_1').scrollLeft+GetObj('List1_1').offsetWidth}
GetObj('ISL_Cont_1').scrollLeft-=Space_1}
function ISL_GoDown_1(){clearInterval(MoveTimeObj_1);if(MoveLock_1)return;clearInterval(AutoPlayObj_1);MoveLock_1=true;MoveWay_1="right";ISL_ScrDown_1();MoveTimeObj_1=setInterval('ISL_ScrDown_1()',Speed_1)}
function ISL_StopDown_1(){if(MoveWay_1 == "left"){return};clearInterval(MoveTimeObj_1);if(GetObj('ISL_Cont_1').scrollLeft%PageWidth_1-(fill_1>=0?fill_1:fill_1+1)!=0){Comp_1=PageWidth_1-GetObj('ISL_Cont_1').scrollLeft%PageWidth_1+fill_1;CompScr_1()}else{MoveLock_1=false}
AutoPlay_1()}
function ISL_ScrDown_1(){if(GetObj('ISL_Cont_1').scrollLeft>=GetObj('List1_1').scrollWidth){GetObj('ISL_Cont_1').scrollLeft=GetObj('ISL_Cont_1').scrollLeft-GetObj('List1_1').scrollWidth}
GetObj('ISL_Cont_1').scrollLeft+=Space_1}
function CompScr_1(){if(Comp_1==0){MoveLock_1=false;return}
var num,TempSpeed=Speed_1,TempSpace=Space_1;if(Math.abs(Comp_1)<PageWidth_1/2){TempSpace=Math.round(Math.abs(Comp_1/Space_1));if(TempSpace<1){TempSpace=1}}
if(Comp_1<0){if(Comp_1<-TempSpace){Comp_1+=TempSpace;num=TempSpace}else{num=-Comp_1;Comp_1=0}
GetObj('ISL_Cont_1').scrollLeft-=num;setTimeout('CompScr_1()',TempSpeed)}else{if(Comp_1>TempSpace){Comp_1-=TempSpace;num=TempSpace}else{num=Comp_1;Comp_1=0}
GetObj('ISL_Cont_1').scrollLeft+=num;setTimeout('CompScr_1()',TempSpeed)}}
function picrun_ini(){
GetObj("List2_1").innerHTML=GetObj("List1_1").innerHTML;
GetObj('ISL_Cont_1').scrollLeft=fill_1>=0?fill_1:GetObj('List1_1').scrollWidth-Math.abs(fill_1);
GetObj("ISL_Cont_1").onmouseover=function(){clearInterval(AutoPlayObj_1)}
GetObj("ISL_Cont_1").onmouseout=function(){AutoPlay_1()}
AutoPlay_1();
}
</script>
<!-- picrotate_left start  -->
<div class="blk_18"> 
<a class="LeftBotton" onmousedown="ISL_GoUp_1()" onmouseup="ISL_StopUp_1()" onmouseout="ISL_StopUp_1()" href="javascript:void(0);" target="_self"></a>
<div class="pcont" id="ISL_Cont_1">
<div class="ScrCont">
<div id="List1_1">
<!-- piclist begin -->
<?php if(!empty($gungoods))foreach($gungoods as $k=>$rows){?>
<?php
$name = !empty($rows['gname']) ? $rows['gname'] : $rows['goods_name'];
$url = !empty($rows['url']) ? $rows['url'] : SITE_URL.'product.php?id='.$rows['goods_id'];
$img = !empty($rows['img']) ? SITE_URL.$rows['img'] : SITE_URL.$rows['goods_thumb'];
?>
<a class="pl" href="<?php echo $url;?>" ><img src="<?php echo $img;?>" alt="<?php echo $name;?>" width="263" onload="loadimg(this,263,263)"/></a>
<?php } ?>
<!-- piclist end -->
</div>
<div id="List2_1"></div>
</div>
</div>
<a class="RightBotton" onmousedown="ISL_GoDown_1()" onmouseup="ISL_StopDown_1()" onmouseout="ISL_StopDown_1()" href="javascript:void(0);" target="_self"></a>
</div>
<div class="c"></div>
<script type="text/javascript">
<!--
picrun_ini();


$('.blk_18').hover(
  function () {
    $(".LeftBotton").animate({left: '0px'}, "slow");
	$(".RightBotton").animate({right: '0px'}, "slow");
  },
  function () {

	$(".LeftBotton").animate({left: '-93px'}, "slow");
	$(".RightBotton").animate({right: '-93px'}, "slow");
  }
);
//-->
</script>
<!-- picrotate_left end -->