<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL;?>tpl/3/css.css" media="all" />
<?php $this->element('3/top',array('lang'=>$lang)); ?>
	
<div class="main" style="height:auto; padding-top:1px;">
	<div class="contentbox">
			 <?php 
		if(!empty($rt)){ 
			foreach($rt as $row){
		?>
			   <div style="width:100%; height:120px; border:0px #D6D6D6 solid;margin-bottom:5px;">
                <div style=" width:28%; height:100px; border-bottom:1px #D6D6D6 solid; position: relative; float:left;padding:5px 0px 5px 0px"><img src="/<?php echo $row['tu']?>" width=100% height=100%/></div>
                <div style="width:66%; height:100px; border-bottom:1px #D6D6D6 solid; position:relative; float:left;padding:10px 0px 0px 15px"><span style="font-size:18px; "><strong><?php echo $row['uname']?></strong></span><br /><br />
				<span><?php echo $row['ads']?></span><br /><br />
                <?php if($row['distance']){?>
                <span>与你相距<span style="color:#F00"><?php echo $row['distance']?></span>米</span>
                <?php
		         }
		         ?>
				</div>
                </div>
       <?php
		}
		}
		?>
</div>

<script type="text/javascript">
function ajax_show_menu(){
	$(".showmenu").toggle();
}
</script>

<?php $this->element('3/footer',array('lang'=>$lang));?>

