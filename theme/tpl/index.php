<div class="indexbox">
	<div class="indexbox2">
		<div class="banner">
			<?php $ad = $this->action('banner','banner','首页轮播',5);?>
			<div id="zSlider">
				<div id="picshow">
					<div id="picshow_img">
						<ul>
						<?php if(!empty($ad))foreach($ad as $row){?>
						  <li><a href="<?php echo $row['ad_url'];?>" target="_blank"><img src="<?php echo SITE_URL.$row['ad_img'];?>"></a></li>
						<?php } ?>
						</ul>
					</div>
					
				</div>
				<div id="select_btn">
					<ul>
					  <?php if(!empty($ad))foreach($ad as $row){?>
						  <li><a href="<?php echo $row['ad_url'];?>" target="_blank"><img src="<?php echo SITE_URL.$row['ad_img'];?>"></a></li>
					  <?php } ?>
					</ul>
				</div>	
			</div>
			<!-- 代码 结束 -->
		</div>
		
		
		<div class="gungoods">
			<div class="gungoodsbox">
			<?php $this->element("indexgundonggoods",array('gungoods'=>$rt['gungoods'])); ?>
			</div>
		</div>
	</div>
</div>	