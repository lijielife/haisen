<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Page-Enter" content="blendTrans(Duration=0.5)" /> 
<meta http-equiv="Page-Exit" content="blendTrans(Duration=0.5)" />
<title><?php echo $this->title();?></title>
<?php echo $this->meta();?>
<?php echo $this->css(array('comman.css','jquery_dialog.css','daili.css'));?>
<?php
 echo '<script>var SITE_URL="'.SITE_URL.'";</script>'."\n";
?>
<?php echo $this->js(array('jquery.min.js','jquery.json-1.3.js','jquery_dialog.js','common.js','user.js'));?>
<!--[if IE 6]><script language="javascript" src="<?php echo SITE_URL;?>js/iepngfix_tilebg.js"></script><![endif]-->
<!--[if IE 6]><link type="text/css" rel="stylesheet" href="<?php echo SITE_URL;?>css/ie6hover.css" media="all" /><![endif]-->
</head>
<body>
	<?php $this->element('top_daili',array('lang'=>$lang)); ?>
	<?php echo $this->content();?>
</body>
</html>
