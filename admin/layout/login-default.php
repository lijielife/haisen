<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->title();?></title>
<?php echo $this->meta();?>
<?php echo $this->css(array('style.css'));?>
<?php echo $this->js(array('jquery1.6.js','common.js'));?>
</head>
<body style="background:url(<?php echo ADMIN_URL.'images/bigbg.jpg';?>); height:100%; width:100%;">
<div class="main" style="padding:0px; width:100%;">
<div class="maincontent">
	<?php echo $this->content();?>
</div>
</div>
</body>
</html>
