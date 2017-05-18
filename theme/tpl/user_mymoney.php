<div id="wrap">
	<div class="clear7"></div>
    	<?php $this->element('user_menu');?>
    <div class="m_right" >
		<h2 class="con_title">我的资金</h2>
    	<div class="mymoney">
         	<div class="bgmy">
            	<table width="470" border="0" cellpadding="0" cellspacing="0">
				  <tr>
					<td width="285">&nbsp;&nbsp;账户余额： <b class="cr5" style="font-size:24px"><?php echo empty($rt['zmoney']) ? 0 : $rt['zmoney'];?></b>&nbsp;  元</td>
					<td><img src="<?php echo $this->img('btu_cz.gif');?>" width="66" height="27" /> &nbsp; <img src="<?php echo $this->img('btu_fk.gif');?>" height="27" width="66" /></td>
				  </tr>
				  <tr>
					<td>&nbsp;&nbsp;安全等级：<img src="<?php echo $this->img('qd.gif');?>" width="86"  height="10" /> &nbsp;中级</td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td>&nbsp;&nbsp;充值记录：<font class="cr5"> <a href="javascript:;" onclick="$('.user_money').toggle();">查看充值的记录</a></font></td>
					<td style="position:relative">
							<div class="user_money" style="display:none;width:550px; border:1px solid #B4C9C6; position:absolute; left:-210px; top:30px; background-color:#ededed">
							<?php $this->element('ajax_user_moneychange',array('rt'=>$rt));?>
							</div>
					</td>
				  </tr>
				</table>
<?php
	$thisurl = SITE_URL.'user.php';
?>
<script language="javascript" type="text/javascript">
function get_usermoney_page_list(page){
  		createwindow();
		$.get('<?php echo $thisurl;?>',{act:'mymoney',page:page,type:'ajax'},function(data){
			removewindow();
			if(data !="" && typeof(data)!='undefined'){
				$('.user_money').html(data);
			}
		});
}
</script>
            </div>
        </div>
     </div>
    <div class="clear"></div>
  </div>
  <div class="clear7"></div>