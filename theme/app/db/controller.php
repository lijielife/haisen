<?php
class DbController extends Controller{
	function _return_px(){
		   $t = '';
		   $x = $_SERVER["HTTP_HOST"];
		   $x1 = explode('.',$x);
		   if(count($x1)==2){
			 $t = $x1[0];
		   }elseif(count($x1)>2){
			 $t =$x1[0].$x1[1];
		   }
		   return $t;
	}
	function index(){
	   $local = $_SERVER["HTTP_HOST"];
	   $t = $this->_return_px();
	   $cache = Import::ajincache();
	   $cache->SetFunction('db'.__FUNCTION__);
	   $cache->SetMode('sitemes'.$t);
	   $fn = $cache->fpath(func_get_args());
	   if(file_exists($fn)&&!$cache->GetClose()){
				include($fn);
	   }
	   else
	   {
				$sql = "SELECT * FROM `{$this->App->prefix()}userdbinfo` WHERE yuming='$local' LIMIT 1";
				$rt = $this->App->findrow($sql);
				$cache->write($fn, $rt,'rt');
	   }
	   return $rt;
	}
}
?>