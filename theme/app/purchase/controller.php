<?php
class PurchaseController extends Controller{

 	function  __construct() {
		$this->css(array('comman.css'));
		$this->js(array('jquery.json-1.3.js','jquery_dialog.js'));
	}
	
	function index(){
		$rt = $this->Cache->read(3600);
	 	if(is_null($rt)) {
			$rt = array();
				
			$this->Cache->write($rt);
		}
		$this->set('rt',$rt);
		$this->template('purchase');
	}
	
}
?>