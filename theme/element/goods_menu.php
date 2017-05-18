<h4><img src="<?php echo $this->img('cat_list_top.jpg');?>" alt="全部产品分类" title="全部产品分类" /></h4>
                      <ul class="car_list">
					  
                        <li class="car_list_li">
                          <div class="cat1" style="position:relative">
                            <p>品牌专区</p>
							<?php 
							if(!empty($brandlist)){
							foreach($brandlist as $k=>$row){
							if($k>9) break;
							?>
                            <a href="<?php echo $row['url'];?>"><?php echo $row['brand_name'];?></a>
							<?php } } ?>
                             <div class="clear"></div>
							 <span style="position:absolute; right:0px; bottom:0px;"><a href="<?php echo SITE_URL.'brand/';?>" target="_blank">查看更多</a></span>
							 <div style="height:20px; clear:both"></div>
                          </div>
                        </li>
						<?php 
						if(!empty($menu)){
						unset($row);
						foreach($menu as $row){
						?>
                        <li class="car_list_li">
                          <div class="cat1 car_list_li_new">
                            <p><?php echo $row['name'];?></p>
							<?php 
							if(!empty($row['cat_id'])){
							//$k=0;
							foreach($row['cat_id'] as $rows){
							//if($k>9) break;
							//++$k;
							?>
                            <a href="<?php echo $rows['url'];?>"><?php echo $rows['name'];?></a>
							<?php } } ?>
                            <div class="clear"></div>
                          </div>
                            <!--
                            <div class="cat_show">
							<?php 
							if(!empty($row['cat_id'])){
							$k=0;
							foreach($row['cat_id'] as $rows){
							++$k;
							if($k<=10) continue;
							?>
                            <a href="<?php echo $rows['url'];?>"><?php echo $rows['name'];?></a>
							<?php
							 } //end foreach
							 } //end if
							 ?>
							</div>
							-->
                        </li>
						<?php } } ?>
                      </ul>