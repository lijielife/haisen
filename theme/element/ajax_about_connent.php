<?php 
if(!empty($rt['catecon'])){
?>
<style>
.rongyulist li{ float:left; width:200px;text-align:center; margin:25px; height:310px; overflow:hidden;}
.rongyulist li p{ border-top:1px dashed #ccc; background-color:#ededed; text-align:center; width:100%;filter:alpha(opacity=80); -moz-opacity:0.8; -khtml-opacity:0.8;opacity:0.8; height:25px; line-height:25px;}
.rongyulist li img{ width:200px;}
</style>
<ul class="rongyulist">
<?php 
foreach($rt['catecon'] as $row){
  echo '<li><a href="'.SITE_URL.$row['article_img'].'" target="_blank"><img src="'.$row['thumb'].'" alt="'.$row['article_title'].'"/></a>
  <p>'.$row['article_title'].'</p>
  </li>';
}
?>
</ul>
<?php
}
?>
<div style="clear:both"></div>
<style>
.page{width:100%;}
.page a{ width:63px; padding-left:0px; padding-right:0px; text-indent:0px; text-align:center}
</style>
<p class="page">
<?php echo $rt['categorypage']['showmes'];?>
<?php echo $rt['categorypage']['first'];?>
<?php echo $rt['categorypage']['prev'];?>
<?php //echo (!empty($rt['categorypage']['list'])?implode('&nbsp;',$rt['categorypage']['list']):"")?>
<?php echo $rt['categorypage']['next'];?>
<?php echo $rt['categorypage']['last'];?>
</p>