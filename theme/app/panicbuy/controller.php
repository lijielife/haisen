<?php
class PanicbuyController extends Controller{

 	function  __construct() {
		$this->css(array('comman.css','vip.css','jquery_dialog.css'));
		$this->js(array('jquery.json-1.3.js','jquery_dialog.js','common.js','goods.js','user.js','vip.js'));
	}
	
	function index(){
		$this->layout('vip');
		$rt = $this->Cache->read(3600);
	 	if(is_null($rt)) {
			$rt = array();
				
			$this->Cache->write($rt);
		}
		$this->set('rt',$rt);
		$this->template('vip_index');
	}
	
}
?>