<div class="main">
	<div class="mainbox">
		<div class="lefts">
			<?php $this->element('dailimenu');?>
		</div>
		<div class="rights">
			<div style="background:url(<?php echo $this->img('houtai_31.png');?>) 22px center no-repeat;height:35px; border-bottom:1px solid #ddd;"><p style="font-size:14px;font-family:微软雅黑;  line-height:20px; padding:7px;padding-left:30px;  text-align:left">用户中心</p></div>
			<ul class="s_shuru">
				 <li>
					<p>注册时间：
					</p>
					<span class="s_shuru_1">
					<?php echo date('Y-m-d H:i:s',$rt['reg_time']);?>
					</span>
				</li>
				 <li>
					<p>最后登录：
					</p>
					<span class="s_shuru_1">
					<?php echo date('Y-m-d H:i:s',$rt['last_login']);?>
					</span>
				</li>
				<li>
					<p>登录区域：
					</p>
					<span class="s_shuru_1">
					<?php echo Import::ip()->ipCity($rt['last_ip']);?>
					</span>
				</li>
				<li>
					<p>登录次数：
					</p>
					<span class="s_shuru_1">
					<?php echo $rt['visit_count'];?>
					</span>
				</li>
			</ul>
	
		</div>
		<div class="clear"></div>
	</div>
</div>