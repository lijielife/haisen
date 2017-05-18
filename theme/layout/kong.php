<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=7" />
<title><?php echo $this->title();?></title>
<?php echo $this->meta();?>
<?php echo $this->css();?>
<?php
 echo '<script>var keyword=""; var SITE_URL="'.SITE_URL.'";</script>'."\n";
 ?>
<?php echo $this->js(array('jquery.min.js','common.js'));?>
</head>
<body style="margin:0px; padding:0px">
	<?php echo $this->content();?>
</body>
</html>
