<div class="main">
	<div class="mainbox">
		<div class="lefts">
			<?php $this->element('dailimenu');?>
		</div>
		<div class="rights">
			<div style="background:url(<?php echo $this->img('houtai_31.png');?>) 22px center no-repeat;height:35px; border-bottom:1px solid #ddd;"><p style="font-size:14px;font-family:微软雅黑;  line-height:20px; padding:7px;padding-left:30px;  text-align:left">广告管理</p></div>
			<p style="line-height:26px; text-align:right; padding-right:5px;"><a href="<?php echo SITE_URL.'daili.php?act=dailiadsinfo';?>">添加广告</a></p>	
			<table border="0" cellpadding="3" cellspacing="5" width="100%">
				<tr>
					<th>广告名称</th><th>广告图</th><th>时间</th><th>操作</th>
				</tr>
				<?php if(!empty($adslist))foreach($adslist as $row){?>
					<tr>
						<td style="border-bottom:1px solid #ededed;" align="left"><?php echo $row['ad_name'];?></td>
						<td style="border-bottom:1px solid #ededed;" align="left"><img src="<?php echo SITE_URL.$row['ad_img'];?>" alt="" width="70" style="padding:1px; border:1px solid #ededed" /></td>
						<td style="border-bottom:1px solid #ededed;" align="left"><?php echo date('Y-m-d H:i:s',$row['addtime']);?></td>
						<td style="border-bottom:1px solid #ededed;" align="center"><a href="<?php echo SITE_URL.'daili.php?act=dailiadsinfo&id='.$row['pid'];?>">编辑</a>&nbsp;&nbsp;<a href="<?php echo SITE_URL.'daili.php?act=dailiads&id='.$row['pid'];?>" onclick="return confirm('确定吗')">删除</a></td>
					</tr>
				<?php } ?>
				<tr>
					<td align="left" class="pages" colspan="4">
					<style>
					.pages a{ display:block; line-height:20px;margin-right:5px; color:#222; background-color:#ededed; border-bottom:2px solid #ccc; border-right:2px solid #ccc; text-decoration:none; float:left; padding-left:5px; padding-right:5px; text-align:center}
					.pages a:hover{ text-decoration:underline}
					</style>
					<?php
					if(!empty($rt['pages'])){
					echo $rt['pages']['previ'];?>
					<?php
					 if(isset($rt['pages']['list'])&&!empty($rt['pages']['list'])){
					 foreach($rt['pages']['list'] as $aa){
					 echo $aa."\n";
					 }
					 }
					?>
					<?php echo $rt['pages']['next'];
					}
					?>
					</td>
				</tr>
			</table>			
		</div>
		<div class="clear"></div>
	</div>
</div>