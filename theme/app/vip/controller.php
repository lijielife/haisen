<?php
class VipController extends Controller{

 	function  __construct() {
		$this->css(array('comman.css','vip.css','jquery_dialog.css'));
		$this->js(array('jquery.json-1.3.js','jquery_dialog.js','common.js','goods.js','user.js','vip.js'));
	}
	
	function index(){
		//$us = $this->Session->read('User');
		$this->layout('vip');
		$rt = $this->Cache->read(3600);
	 	if(is_null($rt)) {
			//会员级别
			$sql = "SELECT * FROM `{$this->App->prefix()}user_level`";
			$u_level = $this->App->find($sql);
			foreach($u_level as $row){
				$rt['u_level'][$row['lid']] = $row['discount'];
			}
			unset($u_level);
			$list = 5;
			$sql = "SELECT goods_id, goods_name,goods_bianhao,shop_price, market_price, goods_thumb, original_img, goods_img,promote_start_date,promote_end_date,promote_price,is_promote FROM `{$this->App->prefix()}goods` WHERE is_on_sale = '1' AND is_delete = '0' AND is_alone_sale='1'  ORDER BY RAND() LIMIT $list";
			$rts= $this->App->find($sql);
			$rt['vipgoods'] = array();
			if(!empty($rts)){
				foreach($rts as $k=>$row){
					$rt['vipgoods'][$k] = $row;
					$rt['vipgoods'][$k]['url'] = get_url($row['goods_name'],$row['goods_id'],'product.php?id='.$row['goods_id'],'goods',array('product','index',$row['goods_id']));
					$rt['vipgoods'][$k]['goods_thumb'] = SITE_URL.$row['goods_thumb'];
					$rt['vipgoods'][$k]['goods_img'] = SITE_URL.$row['goods_img'];
					$rt['vipgoods'][$k]['original_img'] = SITE_URL.$row['original_img'];
					if($row['is_promote']=='1'){
						//促销 价格
						if($row['promote_start_date']<mktime()&&$row['promote_end_date']>mktime()){
							$row['promote_price'] = format_price($row['promote_price']);
						}else{
							$row['promote_price'] = "0.00";
						}
					}else{
						$row['promote_price'] = "0.00";
					}
					
					$rt['vipgoods'][$k]['promote_price'] = $row['promote_price'];
					
					$rt['vipgoods'][$k]['vip_price'] = "0.00";
					
					//VIP价格
					$rt['vipgoods'][$k]['vip1_price'] = (empty($rt['u_level'][1])? 1 : $rt['u_level'][1]/100)*$row['shop_price'];
					$rt['vipgoods'][$k]['vip2_price'] = (empty($rt['u_level'][2])? 1 : $rt['u_level'][2]/100)*$row['shop_price'];
					$rt['vipgoods'][$k]['vip3_price'] = (empty($rt['u_level'][3])? 1 : $rt['u_level'][3]/100)*$row['shop_price'];
					
				}
				unset($rts);
			}
				
			$this->Cache->write($rt);
		}
		//print_r($rt);
		$this->set('rt',$rt);
		$this->template('vip_index');
	}
	
}
?>