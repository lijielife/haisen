<?php
class ImageReport{
var $X;//图片大小X轴
var $Y;//图片大小Y轴
var $R;//背影色R值
var $G;//...G.
var $B;//…B.
var $TRANSPARENT;//是否透明1或0
var $IMAGE;//图片对像
//——————-
var $ARRAYSPLIT;//指定用于分隔数值的符号
var $ITEMARRAY;//数值
var $REPORTTYPE;//图表类型,1为竖柱形2为横柱形3为折线形
var $BORDER;//距离
//——————-
var $FONTSIZE;//字体大小
var $FONTCOLOR;//字体颜色

var $numX = 1;//X轴起始刻度值
var $stepX = 1;//X轴每一个刻度间隔值

//——–参数设置函数
function setImage($SizeX,$SizeY,$R,$G,$B,$Transparent){
$this->X=$SizeX;
$this->Y=$SizeY;
$this->R=$R;
$this->G=$G;
$this->B=$B;
$this->TRANSPARENT=$Transparent;
}
function setItem($ArraySplit,$ItemArray,$ReportType,$Border){
$this->ARRAYSPLIT=$ArraySplit;
$this->ITEMARRAY=$ItemArray;
$this->REPORTTYPE=$ReportType;
$this->BORDER=$Border;
}
function setFont($FontSize){
$this->FONTSIZE=$FontSize;
}
//X轴刻度值设置
function setX($numX = 1, $stepX = 1){
$this->numX = $numX;
$this->stepX = $stepX;
}
//—————-主体
function PrintReport(){
//建立画布大小
$this->IMAGE=ImageCreate($this->X,$this->Y);
//设定画布背景色
$background=ImageColorAllocate($this->IMAGE,$this->R,$this->G,$this->B);
if($this->TRANSPARENT=="1"){
//背影透明
Imagecolortransparent($this->IMAGE,$background);
}else{
//如不要透明时可填充背景色
ImageFilledRectangle($this->IMAGE,0,0,$this->X,$this->Y,$background);
}
//参数字体文小及颜色
$this->FONTCOLOR=ImageColorAllocate($this->IMAGE,255-$this->R,255-$this->G,255-$this->B);
Switch ($this->REPORTTYPE){
case "0":
break;
case "1":
$this->imageColumnS();
break;
case "2":
$this->imageColumnH();
break;
case "3":
$this->imageLine();
break;
case "4":
$this->imageCircle();
break;
}
$this->printXY();
$this->printAll();
}
//———–打印XY坐标轴
function printXY(){
$rulerY = $rulerX = "";
//画XY坐标轴*/
$color=ImageColorAllocate($this->IMAGE,255-$this->R,255-$this->G,255-$this->B);
$xx=$this->X/10;
$yy=$this->Y-$this->Y/10;
ImageLine($this->IMAGE,$this->BORDER,$this->BORDER,$this->BORDER,$this->Y-$this->BORDER,$color);//X轴
ImageLine($this->IMAGE,$this->BORDER,$this->Y-$this->BORDER,$this->X-$this->BORDER,$this->Y-$this->BORDER,$color);//y轴
imagestring($this->IMAGE, $this->FONTSIZE, $this->BORDER-2, $this->Y-$this->BORDER+5, "0", $color);
//Y轴上刻度
$rulerY=$this->Y-$this->BORDER;
$i = 0;
while($rulerY>$this->BORDER*2){
$rulerY=$rulerY-$this->BORDER;
ImageLine($this->IMAGE,$this->BORDER,$rulerY,$this->BORDER-2,$rulerY,$color);

if($this->REPORTTYPE == 2){//横柱图
imagestring($this->IMAGE, $this->FONTSIZE, $this->BORDER-10, $rulerY-2-$this->BORDER*($i+.5), $this->numX, $color);
$this->numX += $this->stepX;
}
$i++;
}
//X轴上刻度
$rulerX=$rulerX+$this->BORDER;
$i = 0;
while($rulerX<($this->X-$this->BORDER*2)){
$rulerX=$rulerX+$this->BORDER;
//ImageLine($this->IMAGE,$this->BORDER,10,$this->BORDER+10,10,$color);
ImageLine($this->IMAGE,$rulerX,$this->Y-$this->BORDER,$rulerX,$this->Y-$this->BORDER+2,$color);

//刻度值
if($this->REPORTTYPE == 1){//竖柱图
imagestring($this->IMAGE, $this->FONTSIZE, $rulerX-2+$this->BORDER*($i+.5), $this->Y-$this->BORDER+5, $this->numX, $color);
$this->numX += $this->stepX;
}else if($this->REPORTTYPE == 3){//折线图
imagestring($this->IMAGE, $this->FONTSIZE, $rulerX-2, $this->Y-$this->BORDER+5, $this->numX, $color);
$this->numX += $this->stepX;
}
$i++;
}
}

//————–竖柱形图
function imageColumnS(){
$item_array=Split($this->ARRAYSPLIT,$this->ITEMARRAY);
$num=Count($item_array);
$item_max=0;
for ($i=0;$i<$num;$i++){
$item_max=Max($item_max,$item_array[$i]);
}
$xx=$this->BORDER*2;
//画柱形图
for ($i=0;$i<$num;$i++){
srand((double)microtime()*1000000);
if($this->R!=255 && $this->G!=255 && $this->B!=255){
$R=Rand($this->R,200);
$G=Rand($this->G,200);
$B=Rand($this->B,200);
}else{
$R=Rand(50,200);
$G=Rand(50,200);
$B=Rand(50,200);
}
$color=ImageColorAllocate($this->IMAGE,$R,$G,$B);
//柱形高度
$height=($this->Y-$this->BORDER)-($this->Y-$this->BORDER*2)*($item_array[$i]/$item_max);
ImageFilledRectangle($this->IMAGE,$xx,$height,$xx+$this->BORDER,$this->Y-$this->BORDER,$color);
ImageString($this->IMAGE,$this->FONTSIZE,$xx,$height-$this->BORDER,$item_array[$i],$this->FONTCOLOR);
//用于间隔
$xx=$xx+$this->BORDER*2;
}
}
//———–横柱形图
function imageColumnH(){
$item_array=Split($this->ARRAYSPLIT,$this->ITEMARRAY);
$num=Count($item_array);
$item_max=0;
for ($i=0;$i<$num;$i++){
$item_max=Max($item_max,$item_array[$i]);
}
$yy=$this->Y-$this->BORDER*2;
//画柱形图
for ($i=0;$i<$num;$i++){
srand((double)microtime()*1000000);
if($this->R!=255 && $this->G!=255 && $this->B!=255){
$R=Rand($this->R,200);
$G=Rand($this->G,200);
$B=Rand($this->B,200);
}else{
$R=Rand(50,200);
$G=Rand(50,200);
$B=Rand(50,200);
}
$color=ImageColorAllocate($this->IMAGE,$R,$G,$B);
//柱形长度
$leight=($this->X-$this->BORDER*2)*($item_array[$i]/$item_max);
$leight = $leight < $this->BORDER ? $this->BORDER : $leight;
ImageFilledRectangle($this->IMAGE,$this->BORDER,$yy-$this->BORDER,$leight,$yy,$color);
ImageString($this->IMAGE,$this->FONTSIZE,$leight+2,$yy-$this->BORDER,$item_array[$i],$this->FONTCOLOR);
//用于间隔
$yy=$yy-$this->BORDER*2;
}
}
//————–折线图
function imageLine(){
$item_array=Split($this->ARRAYSPLIT,$this->ITEMARRAY);
$num=Count($item_array);
$item_max=0;
for ($i=0;$i<$num;$i++){
$item_max=Max($item_max,$item_array[$i]);
}
$xx=$this->BORDER;
//画柱形图
for ($i=0;$i<$num;$i++){
srand((double)microtime()*1000000);
if($this->R!=255 && $this->G!=255 && $this->B!=255){
$R=Rand($this->R,200);
$G=Rand($this->G,200);
$B=Rand($this->B,200);
}else{
$R=Rand(50,200);
$G=Rand(50,200);
$B=Rand(50,200);
}
$color=ImageColorAllocate($this->IMAGE,$R,$G,$B);
//柱形高度
$height_now=($this->Y-$this->BORDER)-($this->Y-$this->BORDER*2)*($item_array[$i]/$item_max);
if($i!="0")
ImageLine($this->IMAGE,$xx-$this->BORDER,$height_next,$xx,$height_now,$color);

ImageString($this->IMAGE,$this->FONTSIZE,$xx+2,$height_now-$this->BORDER/2,$item_array[$i],$this->FONTCOLOR);
$height_next=$height_now;
//用于间隔
$xx=$xx+$this->BORDER;
}
}
//————–饼状图
function imageCircle(){
$total = 0;
$item_array=Split($this->ARRAYSPLIT,$this->ITEMARRAY);
$num=Count($item_array);
$item_max=0;
for ($i=0;$i<$num;$i++){
$item_max=Max($item_max,$item_array[$i]);
$total += $item_array[$i];
}
$yy=$this->Y-$this->BORDER*2;

//画饼状图的阴影部分
$e=0;
for ($i=0;$i<$num;$i++){
srand((double)microtime()*1000000);
if($this->R!=255 && $this->G!=255 && $this->B!=255){
$R=Rand($this->R,200);
$G=Rand($this->G,200);
$B=Rand($this->B,200);
}else{
$R=Rand(50,200);
$G=Rand(50,200);
$B=Rand(50,200);
}
$s=$e;
$leight=$item_array[$i]/$total*360;
$e=$s+$leight;
$color=ImageColorAllocate($this->IMAGE,$R,$G,$B);
$colorarray[$i]=$color;
//画圆
for ($j = 90; $j > 70; $j–) imagefilledarc($this->IMAGE, 110, $j, 200, 100, $s, $e, $color, IMG_ARC_PIE);
//imagefilledarc($this->IMAGE, 110, 70, 200, 100, $s, $e, $color, IMG_ARC_PIE);
//ImageFilledRectangle($this->IMAGE,$this->BORDER,$yy-$this->BORDER,$leight,$yy,$color);
//ImageString($this->IMAGE,$this->FONTSIZE,$leight+2,$yy-$this->BORDER,$item_array[$i],$this->FONTCOLOR);
//用于间隔
$yy=$yy-$this->BORDER*2;
}

//画饼状图的表面部分
$e=0;
for ($i=0;$i<$num;$i++){
srand((double)microtime()*1000000);
if($this->R!=255 && $this->G!=255 && $this->B!=255){
$R=Rand($this->R,200);
$G=Rand($this->G,200);
$B=Rand($this->B,200);
}else{
$R=Rand(50,200);
$G=Rand(50,200);
$B=Rand(50,200);
}
$s=$e;
$leight=$item_array[$i]/$total*360;
$e=$s+$leight;
//$color=$colorarray[$i];
$color=ImageColorAllocate($this->IMAGE,$R,$G,$B);
//画圆
//for ($j = 90; $j > 70; $j–) imagefilledarc($this->IMAGE, 110, $j, 200, 100, $s, $e, $color, IMG_ARC_PIE);
imagefilledarc($this->IMAGE, 110, 70, 200, 100, $s, $e, $color, IMG_ARC_PIE);
}
}
//————–完成打印图形
function printAll(){
ImagePNG($this->IMAGE);
ImageDestroy($this->IMAGE);
}
//————–调试
function debug(){
echo "X:".$this->X."
Y:".$this->Y;
echo "
BORDER:".$this->BORDER;
$item_array=split($this->ARRAYSPLIT,$this->ITEMARRAY);
$num=Count($item_array);
echo "
数值个数:".$num."
数值:";
for ($i=0;$i<$num;$i++){
echo "
".$item_array[$i];
}
}
}

//$report->debug();//调式之用

Header( "Content-type:image/png");
$report=new ImageReport;
$report->setImage(330,140,255,255,255,1);//参数(长,高,背影色R,G,B,是否透明1或0)
$temparray="0,260,400,124,48,720,122,440,475";//数值,用指定符号隔开
$report->setItem(',',$temparray,1,23);//参数(分隔数值的指定符号,数值变量,样式1为竖柱图2为横柱图3为折线图4为饼图,距离)
$report->setFont(1);//字体大小1-10
//$report->setX(1,1);//设置X轴刻度值(起始刻度值=1，刻度间隔值=1)
$report->PrintReport(); 

?>