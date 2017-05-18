<?php if(!empty($rt['catecon'])){  ?>
<ul>
		<?php 
		foreach($rt['catecon'] as $row){
		?>
 <li>
 <a href="<?php echo $row['url'];?>" title="<?php echo $row['article_title'];?>"><?php echo $row['article_title'].($row['is_top']=='1'?'&nbsp;&nbsp;<font color=red>[置顶]</font>':"");?></a><span style="float:right"><?php echo date('Y-m-d',$row['addtime']);?></span>
 </li>
		 <?php } ?>
	</ul> 
	<?php } ?>
	<div style="clear:both"></div>
	<style>
	.page{width:100%; margin-top:20px; padding-left:5px;}
	.page a{ padding:4px; padding-bottom:0px;text-indent:0px; text-align:center; display:block; float:left; margin-right:4px; border:1px solid #F9C0D9; background-color:#FFF8F8}
	</style>
   <p class="page">
	  	<?php echo $rt['categorypage']['showmes'];?>
		<?php echo $rt['categorypage']['first'];?>
		<?php echo $rt['categorypage']['prev'];?>
		<?php //echo (!empty($rt['categorypage']['list'])?implode('&nbsp;',$rt['categorypage']['list']):"")?>
		<?php echo $rt['categorypage']['next'];?>
		<?php echo $rt['categorypage']['last'];?>
	</p>