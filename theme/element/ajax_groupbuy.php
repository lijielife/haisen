<ul>
<?php if(!empty($rt['grouplist']))foreach($rt['grouplist'] as $row){?>
<li>
<p class="g_tiel"><a href="<?php echo SITE_URL.'groupbuy.php?gid='.$row['group_id'];?>" target="_blank"><?php echo $row['group_name'];?></a></p>
<div class="imgbox">
<a href="<?php echo SITE_URL.'groupbuy.php?gid='.$row['group_id'];?>" target="_blank"><img title="<?php echo $row['goods_name'];?>" src="<?php echo $row['goods_thumb'];?>" width="245" onload="loadimg(this,245,170)"/></a>
</div>
<p class="g_pri">原价：<em><?php echo $row['shop_price'];?>元</em> <strong style="padding-right:30px;"><?php echo sprintf('%.1f',($row['price']/$row['shop_price'])*10);?>折</strong> <strong><?php echo $row['sale_count']*10;?>人</strong>已购买</p>
<p class="g_bom"><em style="float:left">￥<?php echo $row['price'];?></em><a href="<?php echo SITE_URL.'groupbuy.php?gid='.$row['group_id'];?>" style=" float:right; padding-top:10px; padding-right:8px;" target="_blank"><img src="<?php echo SITE_URL.'theme/images/b_but15.jpg';?>"></a></p>
</li>
<?php } ?>
<div class="clear"></div>	
</ul>
<div class="clear10"></div>
<?php if(!empty($rt['grouppage'])){?>
<p class="pages">
<?php echo str_replace('首页','<img src="'.SITE_URL.'theme/images/first.png" align="absmiddle" />',$rt['grouppage']['first']);?>
<?php echo str_replace('上一页','<img src="'.SITE_URL.'theme/images/previ.png" align="absmiddle" />',$rt['grouppage']['prev']);?>
<?php
if(isset($rt['grouppage']['list'])&&!empty($rt['grouppage']['list'])){
foreach($rt['grouppage']['list'] as $kk=>$aa){
echo $aa."\n";
}
}
?>

<?php echo str_replace('下一页','<img src="'.SITE_URL.'theme/images/next.png" align="absmiddle" />',$rt['grouppage']['next']);?>
<?php echo str_replace('尾页','<img src="'.SITE_URL.'theme/images/last.png" align="absmiddle" />',$rt['grouppage']['last']);?>
</p>
<?php } ?>