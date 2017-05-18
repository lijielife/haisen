<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/25/css.css?v=4" media="all" />
<div style=" background:#FFF">
<div class="top">
<?php $ad = $this->action('banner','banner','模板25首页顶部图片',1);?>
<?php if(!empty($ad)){?>                      
<img src="<?php echo SITE_URL.$ad['ad_img'];?>"/>
<?php 
} 
?>
<div class="avatar">
<?php if(!empty($lang['site_logo'])&&file_exists(SYS_PATH.$lang['site_logo'])){?>
<img src="<?php echo  SITE_URL.$lang['site_logo'];?>"/>
<?php } ?>

</div>
</div>
<div class="list">
<!--<?php
$rt = $this->action('page','get_site_nav','top',4);
?>
    <ul>
<?php if(!empty($rt))foreach($rt as $row){?>
    <li><a href="<?php echo $row['url'];?>"><img src="<?php echo SITE_URL.$row['img'];?>"/>
            <p><?php echo $row['name'];?></p></a></li>
  <?php } ?>
    </ul>-->
</div>
<div class="cl"></div>
<div class="si"><img src="<?php echo ADMIN_URL;?>tpl/25/images/si.png"/></div>
<div class="san">
    <div style="border-right: 1px solid #cccccc;">
<?php $ad2 = $this->action('banner','banner','模板25首页中间广告左边',1);?>
<?php if(!empty($ad2)){?>                     
<a href="<?php echo $ad2['ad_url'];?>"><img src="<?php echo SITE_URL.$ad2['ad_img'];?>" border="0"/></a>
<?php 
} 
?>
</div>
    <div>
    <?php $ad3 = $this->action('banner','banner','模板25首页中间广告右边',2);?>
 <?php if(!empty($ad3))foreach($ad3 as $row){ ?>                    
    <a href="<?php echo $row['ad_url'];?>" style="border-bottom:1px solid #ccc;"><img src="<?php echo SITE_URL.$row['ad_img'];?>" border="0"/></a>
<?php 
} 
?>
       </div>
</div>
<?php $ad3 = $this->action('banner','banner','模板25首页中间广告条',50);?>
<?php if(!empty($ad3))foreach($ad3 as $row){ ?> 
<div class="ad"><a href="<?php echo $row['ad_url'];?>"><img src="<?php echo SITE_URL.$row['ad_img'];?>" border="0"/></a></div>                  
<?php 
} 
?>
<ul class="lou">
<?php
$i=1;
if(!empty($rt2))foreach($rt2 as $row){
switch ($i)
{
case 1:
  $colour='#f2aa6f';
  break;
case 2:
  $colour='#75a0c0';
  break;
case 3:
  $colour='#25a781';
  break;
case 4:
  $colour='#f3be22';
  break;
case 5:
  $colour='#ec77ab';
  break;
case 6:
  $colour='#fa635c';
  break;
}
?>
 <li style="background: <?php echo $colour;?>;">
            <a href="<?php echo ADMIN_URL.'catalog.php?cid='.$row['cat_id'];?>">
<?php
if($i%2==1){
?>
            <div class="picl pic"><img src="<?php echo SITE_URL.$row['cat_img'];?>"/></div>
                <div class="lour">
                    <h1><?php echo $i;?>F</h1>
                    <h3><?php echo $row['cat_name'];?></h3>
                    <p><?php echo $row['cat_desc'];?></p>
                    <div style="border-right: 20px solid <?php echo $colour;?>;" class="left"></div>
                </div>
<?php
}else{ 
?>
                <div class="loul">
                <h1><?php echo $i;?>F</h1>
                <h3><?php echo $row['cat_name'];?></h3>
                <p><?php echo $row['cat_desc'];?></p>
                <div style="border-left: 20px solid <?php echo $colour;?>;" class="right"></div>
            </div>
                <div class="picr pic"><img src="<?php echo SITE_URL.$row['cat_img'];?>"/></div>
<?php
}
?>
          </a>
        </li>
<?php
$i++;
}
?> 
</ul>
</div>
<?php $this->element('25/footer',array('lang'=>$lang)); ?>