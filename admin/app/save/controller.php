<?php
class SaveController extends Controller{
 	function  __construct() {
           $this->css('content.css');
	}
	
   function qrcard(){
      $dd = array(
	    'site_url' => $GLOBALS['picurl']
	  );
	  $sql = "Update `{$this->App->prefix()}systemconfig` Set `site_url` = '{$dd['site_url']}'";
	  return  $this->App->query($sql);
   }
   
   function logo(){
      $dd = array(
	    'site_logo' => $GLOBALS['picurl']
	  );
	  $sql = "Update `{$this->App->prefix()}systemconfig` Set `site_logo` = '{$dd['site_logo']}'";
	  return  $this->App->query($sql);
   }
}
?>