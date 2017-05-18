<?php 
require_once('load.php');
//$cosplayapi = 'http://www.cosplayprop.com/api/getinfo.php?url='.Import::basic()->thisurl();
//Import::crawler()->curl_get_con($cosplayapi);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/common.css" type="text/css" />
<title>企业级微信分销后台管理系统</title>
</head>
<frameset rows="65,*" cols="*" frameborder="no" border="0" framespacing="0">
  <frame src="topframe.php" name="topFrame" frameborder="no" scrolling="no" noresize="noresize" id="topFrame" title="topFrame" />
  <frameset name="myFrame" cols="199,7,*" frameborder="no" border="0" framespacing="0">
    <frame src="leftframe.php" name="leftFrame" frameborder="no" scrolling="no" noresize="noresize" id="leftFrame" title="leftFrame" />
	<frame src="switchframe.html" name="midFrame" frameborder="no" scrolling="no" noresize="noresize" id="midFrame" title="midFrame" />
    <frameset rows="0,*" cols="*" frameborder="no" border="0" framespacing="0">
         <frame src="mainframe.php" name="mainFrame" frameborder="no" scrolling="no"  noresize="noresize" id="mainFrame" title="mainFrame" />
         <frame src="manframe.php" name="manFrame" frameborder="no" id="manFrame" title="manFrame" />
     </frameset>
  </frameset>
</frameset>
<noframes>
<body>
</body>
</noframes>
</html>
