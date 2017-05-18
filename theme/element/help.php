<div id="help_box">	
	<div id="help_mes">
		<?php  if(!empty($help_article)){ ?>
		<ul>
		 <?php
		   $i=0;
		   foreach($help_article as $row){
		   if($i>4) continue;
		   $i++;
		  ?>
			<li>
				<h2><img src="<?php echo $this->img('sanjiao3.jpg');?>" width="5" height="8"/> <font color="#EB0000"><?php echo $row['cat_name'];?></font></h2>
				<?php foreach($row['article'] as $rows){?>
				<p><a href="<?php echo $rows['url'];?>" title="<?php echo $rows['article_title'];?>"><?php echo $rows['article_title'];?></a></p>
				<?php } ?>
			</li>
		 <?php } ?>
			<div class="clear"></div>
		</ul>
	<?php } ?>	
	</div>
</div>