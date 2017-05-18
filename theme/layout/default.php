<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Page-Enter" content="blendTrans(Duration=0.5)" /> 
<meta http-equiv="Page-Exit" content="blendTrans(Duration=0.5)" />
<title><?php echo $this->title();?></title>
<?php echo $this->meta();?>
<?php echo $this->css(array('comman.css','style.css'));?>
<?php
if(isset($_REQUEST['encode'])&&!empty($_REQUEST['encode'])){
	$string = base64_decode(trim($_GET['encode']));
	if ($string !== false)
	{
		$string = unserialize($string);
		$keyword   = !empty($_REQUEST['keyword'])   ? htmlspecialchars(trim($_REQUEST['keyword']))  : '';
		unset($string);
	}else{
		$keyword="";	
	}
}else{
	$keyword = strpos($_SERVER['PHP_SELF'],'tuijian.php') ? 'is_new' : (strpos($_SERVER['PHP_SELF'],'offmall.php') ? 'is_promote' : '');
} 
 echo '<script>var keyword="'.$keyword.'"; var SITE_URL="'.SITE_URL.'";</script>'."\n";
 echo '<script>var THISURL="'.('http://'.$_SERVER['HTTP_HOST'].(str_replace(array('?id='.(isset($_GET['id'])?$_GET['id']:''),'&id='.(isset($_GET['id'])?$_GET['id']:'')),'',$_SERVER['REQUEST_URI']))).'";</script>'."\n";
?>
<?php echo $this->js(array('jquery.min.js','jquery.cookie.js','jquery.json-1.3.js','jquery_dialog.js','common.js','menu.js','goods.js','chat.js','mycart.js'));?>
<!--[if IE 6]><script language="javascript" src="<?php echo SITE_URL;?>js/iepngfix_tilebg.js"></script><![endif]-->
<!--[if IE 6]><link type="text/css" rel="stylesheet" href="<?php echo SITE_URL;?>css/ie6hover.css" media="all" /><![endif]-->
</head>
<body>
<?php
if(!strpos($_SERVER['PHP_SELF'],'mycart.php') && !strpos($_SERVER['PHP_SELF'],'new.php')){
 //$this->element('chat');
}
?>
	<?php $this->element('top',array('lang'=>$lang,'keyword'=>$keyword)); ?>
	<?php echo $this->content();?>
	
	<?php $this->element('footer',array('lang'=>$lang)); ?>
	
</body>
</html>
