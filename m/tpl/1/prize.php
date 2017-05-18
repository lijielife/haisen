<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/1/css.css" media="all" />
<?php $this->element('1/top',array('lang'=>$lang)); ?>

<style type="text/css">
.pw,.pwt{
height:26px; line-height:26px;
border: 1px solid #ddd;
border-radius: 5px;
background-color: #fff; padding-left:5px; padding-right:5px;
-moz-border-radius:5px;/*仅Firefox支持，实现圆角效果*/
-webkit-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
-khtml-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
border-radius:5px;/*仅Opera，Safari,Chrome支持，实现圆角效果*/
}
.pw{ width:90%;}
.usertitle{
height:22px; line-height:22px;color:#666; font-weight:bold; font-size:14px; padding:5px;
border-radius: 5px;
background-color: #ededed; padding-left:5px; padding-right:5px;
-moz-border-radius:5px;/*仅Firefox支持，实现圆角效果*/
-webkit-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
-khtml-border-radius:5px;/*仅Safari,Chrome支持，实现圆角效果*/
border-radius:5px;/*仅Opera，Safari,Chrome支持，实现圆角效果*/
}
.pages{ margin-top:20px;}
.pages a{ background:#ededed; padding:2px 4px 2px 4px; border-bottom:2px solid #ccc; border-right:2px solid #ccc; margin-right:5px;}
#main table td:hover{ background:#fafafa}
#main table td p a{ line-height:18px;display:block; padding:1px 5px 1px 5px; float:left; background:#fafafa; border-bottom:2px solid #d5d5d5;border-right:2px solid #d5d5d5;border-radius:10px; margin-right:5px;border-top:1px solid #ededed;border-left:1px solid #ededed;}
</style>
<div id="main" style="min-height:300px">
	 <table  width="100%" border="0" cellpadding="0" cellspacing="0" style="line-height:25px;background:#EEE; overflow:hidden">
	<?php 
	if(!empty($rt))foreach($rt as $row){
	?>
		<tr>
		<td style="border-bottom:1px solid #E0E0E0; padding-left:5px; width:40%">
		<p style="color:#5286B7">所中奖项:<font color="#60ACDC"><?php echo $row['lt_prize'];?></font></p>
		</td>
        <td style="border-bottom:1px solid #E0E0E0;padding-right:5px; width:60%">
		<p style="color:#5286B7">奖品:<font color="#60ACDC"><?php echo $row['lt_name'];?></font></p>
		</td>
	  </tr>
	<?php } ?>
	  </tr>
	</table>

</div>
<?php $this->element('1/footer',array('lang'=>$lang)); ?>