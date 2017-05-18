<?php
class ShoppingController extends Controller{
    /*
     //* @Photo Index
     //* @param <type> $page
     //* @param <type> $type
     */
 	function  __construct() {
		/*
		*构造函数
		*/
		$this->js(array('jquery_dialog.js','jquery.json-1.3.js','common.js','goods.js','user.js','tab.js'));
		$this->css(array('comman.css','menber.css','tabs.css','jquery_dialog.css'));
	}
	
	/*析构函数*/
	function  __destruct() {
        unset($rt);
    }
	
	function _get_payinfo($id=0){
		return $this->App->findvar("SELECT `pay_config` FROM `".$this->App->prefix()."payment` WHERE `pay_id`='$id'");
	}
	
	function _alipayment($rt=array()){
		$pay_id = $rt['pay_id'];
		$sql = "SELECT `pay_config` FROM `".$this->App->prefix()."payment` WHERE `pay_id`='$pay_id'";
		$pay_config = $this->App->findvar($sql);
		$configr = unserialize($pay_config);
		$paypalmail = isset($configr['pay_no']) ? $configr['pay_no'] : '';
        if(!$paypalmail){
            return false;
        }
		$order_sn = $rt['order_sn']; //网站唯一订单编号
		$order_amount = $rt['order_amount'];
		$username = $rt['username'];
		$address = $rt['address'];
		$zip = $rt['zip'];
		$phone = $rt['phone'];
		$mobile = $rt['mobile'];
		$logistics_fee = $rt['logistics_fee'];
		if(!$paypalmail){
            return false;
        }

		$paypal_form = "<form name='aqua' method='post' action='".SITE_URL."pay/alipayapi.php'>
				<input type='hidden' name='WIDout_trade_no' value='".$order_sn."'>
				<input type='hidden' name='WIDseller_email' value='".$paypalmail."'>
				<input type='hidden' name='WIDsubject' value='宝泰商城商品支付系统'>
				<input type='hidden' name='WIDprice' value='".$order_amount."'>
				<input type='hidden' name='WIDreceive_name' value='".$username."'>
				<input type='hidden' name='logistics_fee' value='".$logistics_fee."'>
				<input type='hidden' name='logistics_type' value='EXPRESS'>
				<input type='hidden' name='logistics_payment' value='BUYER_PAY'>
				<input type='hidden' name='WIDreceive_address' value='".$address."'>
				<input type='hidden' name='WIDreceive_zip' value='".$zip."'>
				<input type='hidden' name='WIDreceive_phone' value='".$phone."'>
				<input type='hidden' name='WIDreceive_mobile' value='".$mobile."'>
			</form>";
		$paypal_form.="<script language='javascript'>
					aqua.submit();
					</script>
					";
		echo $paypal_form;
		die();
	}
	
   	function index(){
		$this->title('我的购物车 - '.$GLOBALS['LANG']['site_name']);
		$uid = $this->Session->read('User.uid');
		//if(empty($uid)){ $this->jump(SITE_URL.'user.php?act=login',0,'请先登录！'); exit;}
		
		$hear[] = '<a href="'.SITE_URL.'">首页</a>';
		$hear[] = '<a href="'.SITE_URL.'mycart.php">我的购物车</a>';
		$rt['hear'] = implode('&nbsp;&gt;&nbsp;',$hear);
		
		//用户等级折扣
		$rt['discount'] = 100;
		$rank = $this->Session->read('User.rank');
		if($rank>0){
			$sql = "SELECT discount FROM `{$this->App->prefix()}user_level` WHERE lid='$rank' LIMIT 1";
			$rt['discount'] = $this->App->findvar($sql);
		}
		
		$active = $this->Session->read('User.active');
		//购物车商品
		$goodslist = $this->Session->read('cart'); 
		$rt['goodslist'] = array();
			if(!empty($goodslist)){
			foreach($goodslist as $k=>$row){
				$rt['goodslist'][$k] = $row;
				$rt['goodslist'][$k]['url'] = get_url($row['goods_name'],$row['goods_id'],'product.php?id='.$row['goods_id'],'goods',array('product','index',$row['goods_id']));
				$rt['goodslist'][$k]['goods_thumb'] = is_file(SYS_PATH.$row['goods_thumb']) ? SITE_URL.$row['goods_thumb'] : SITE_URL.'theme/images/no_picture.gif';
				$rt['goodslist'][$k]['goods_img'] = is_file(SYS_PATH.$row['goods_img']) ? SITE_URL.$row['goods_img'] : SITE_URL.'theme/images/no_picture.gif';
				$rt['goodslist'][$k]['original_img'] = is_file(SYS_PATH.$row['original_img']) ? SITE_URL.$row['original_img'] : SITE_URL.'theme/images/no_picture.gif';
				
				//求出实际价格
				 $comd = array();
				 if(!empty($uid)&&$active=='1'){
					  //同一折扣价格
					  if($rt['discount']>0){
					      	$comd[] = ($rt['discount']/100)*$row['shop_price'];
					  }
					  
						if($row['shop_price']>0 && $rank == 1 ){ //个人会员价格
								
							$comd[] =  $row['shop_price']; //个人会员价格
						}
						if($row['pifa_price']>0 && $rank !='1'){ //高级会员价格
						
							$comd[] =  $row['pifa_price']; //高级会员价格
						}
	
				 }else{
						$comd[] = $row['shop_price'];
				 }
				 
			     if($row['is_promote']=='1' && $row['promote_start_date'] < mktime() && $row['promote_end_date'] > mktime() && $row['promote_price']>0){ //促销价格
					    $comd[] =  $row['promote_price'];
			     }
			     if($row['is_qianggou']=='1' && $row['qianggou_start_date'] < mktime() && $row['qianggou_end_date'] > mktime() && $row['qianggou_price']>0){ //抢购价格
					    $comd[] =  $row['qianggou_price'];
			     }
					   
				 $onetotal = min($comd);
				 if(intval($onetotal)<=0) $onetotal = $row['shop_price'];
				 $total +=($row['number']*$onetotal); //总价格
				 
			}
			unset($goodslist);
		}
		
		//赠品类型
		$fn = SYS_PATH.'data/goods_spend_gift.php';
		$spendgift = array();
		if(file_exists($fn) && is_file($fn)){
				include_once($fn);
		}
		$rt['gift_typesd'] = $spendgift;
		unset($spendgift);
		
		//商品赠品模块
		$minspend = array();
		if(!empty($rt['gift_typesd'])){
			foreach($rt['gift_typesd'] as $k=>$row){
				++$k;
				$minspend[$k] = $row['minspend'];
			}
			arsort($minspend);
		}
		$rt['gift_goods'] = array();
		$type = 0;
		if(count($minspend)>0){
			$count = count($minspend);
			foreach($minspend as $t=>$val){  //已最高消费赠品为准
				if($total>=$val){
					$type = $t; //赠品等级
					break;
				}
			}
			unset($minspend);
			//赠品
			$rt['gift_goods_ids'] = array();
			if($type>0){
				$sql = "SELECT tb2.goods_id,tb1.type,tb2.goods_name,tb2.market_price,tb2.goods_sn ,tb2.goods_bianhao,tb2.goods_thumb  FROM `{$this->App->prefix()}goods_gift` AS tb1";
				$sql .=" LEFT JOIN `{$this->App->prefix()}goods` AS tb2 ON tb1.goods_id=tb2.goods_id";
				$sql .=" WHERE tb2.is_alone_sale='0' AND tb2.is_on_sale='1' AND tb2.is_delete='0' AND tb1.type='$type'";
				$gift_goods = $this->App->find($sql);
				if(!empty($gift_goods)){
					foreach($gift_goods as $k=>$row){
						$rt['gift_goods'][$k] = $row;
						$rt['gift_goods'][$k]['url'] = get_url($row['goods_name'],$row['goods_id'],'product.php?id='.$row['goods_id'],'goods',array('product','index',$row['goods_id']));
						$rt['gift_goods_ids'][] = $row['goods_id']; //记录赠品的id
					}
					unset($gift_goods);
				}
			}

		}	
		
		//换购商品
		$sql = "SELECT goods_id,goods_name,market_price,shop_price,promote_price,goods_thumb,goods_img,is_jifen,need_jifen FROM `{$this->App->prefix()}goods` WHERE is_on_sale='1' AND is_alone_sale='1' AND is_jifen='1' ORDER BY sort_order ASC, goods_id DESC LIMIT 5";
		$jifengoods = $this->App->find($sql);
		if(!empty($jifengoods)){
			foreach($jifengoods as $k=>$row){
				$rt['jifengoods'][$k] = $row;
				$rt['jifengoods'][$k]['url'] = get_url($row['goods_name'],$row['goods_id'],'product.php?id='.$row['goods_id'],'goods',array('product','index',$row['goods_id']));
			}
			unset($jifengoods);
		}
				
		
		//全站banner
		$rt['quanzhan'] = $this->action('banner','quanzhan');
				 
		$this->set('rt',$rt);
		$this->template('mycart_list');
	}
	//订单确认
	function checkout(){
		$this->css('calendar.css');
		$this->js(array('time/calendar.js','time/calendar-setup.js','time/calendar-zh.js'));
		$this->title('我的购物车 - 确认订单 - '.$GLOBALS['LANG']['site_name']);
		$uid = $this->Session->read('User.uid');
		
		if(empty($uid)){ $this->jump(SITE_URL.'user.php?act=login',0,'请先登录！'); exit;}
		$hear[] = '<a href="'.SITE_URL.'">首页</a>';
		$hear[] = '<a href="'.SITE_URL.'shopping/">我的购物车</a>';
		$hear[] = '<a href="'.SITE_URL.'shopping/checkout/">确认订单</a>';
		$rt['hear'] = implode('&nbsp;&gt;&nbsp;',$hear);
		$rt['goodslist'] = $this->Session->read('cart');
		
		
		/*$rt['user_ress'] = array();
		if(!empty($uid)){
			$sql = "SELECT tb1.*,tb2.region_name AS province,tb3.region_name AS city,tb4.region_name AS district FROM `{$this->App->prefix()}user_address` AS tb1";
			$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb2 ON tb2.region_id = tb1.province";
			$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb3 ON tb3.region_id = tb1.city";
			$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb4 ON tb4.region_id = tb1.district";
			$sql .=" WHERE tb1.user_id='$uid' ORDER BY tb1.type DESC, tb1.address_id ASC LIMIT 1";
			$rt['user_ress'] = $this->App->findrow($sql);
		}*/
		
		$rt['province'] = $this->action('user','get_regions',1);  //获取省列表
		
		//当前用户的收货地址
/*		$sql = "SELECT tb1.*,tb3.user_name ,tb3.user_name AS peisongname,tb2.address AS addr, tb3.home_phone AS phone, tb3.mobile_phone AS mob FROM `{$this->App->prefix()}user_address` AS tb1";
		$sql .= " LEFT JOIN `{$this->App->prefix()}user` AS tb3 ON tb3.user_id = tb1.shop_id"; //look 添加
		$sql .= " LEFT JOIN `{$this->App->prefix()}user_address` AS tb2 ON tb2.user_id = tb1.shop_id  AND tb2.is_own='1' WHERE tb1.user_id='$uid' AND tb1.is_own='0' GROUP BY tb1.address_id";*/
		
		$sql = "SELECT ua.*,rg.region_name AS provincename,rg1.region_name AS cityname,rg2.region_name AS districtname FROM `{$this->App->prefix()}user_address` AS ua";
		$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS rg ON rg.region_id = ua.province";
		$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS rg1 ON rg1.region_id = ua.city";
		$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS rg2 ON rg2.region_id = ua.district WHERE ua.user_id='$uid' AND ua.is_own='0' GROUP BY ua.address_id";
		$rt['userress'] = $this->App->find($sql);
		//print_r($rt['userress']);
/*		if(!empty($rt['userress'])){
			foreach($rt['userress'] as $row){
				$rt['city'][$row['address_id']] = $this->action('user','get_regions',2,$row['province']);  //城市
				$rt['district'][$row['address_id']] = $this->action('user','get_regions',3,$row['city']);  //区
				$rt['town'][$row['address_id']] = $this->action('user','get_regions',4,$row['district']);  //城镇
				$rt['village'][$row['address_id']] = $this->action('user','get_regions',5,$row['town']);  //村
				
			}
		}
		*/
		//print_r($rt);
		//支付方式
		$sql = "SELECT * FROM `{$this->App->prefix()}payment`";
		$rt['paymentlist'] = $this->App->find($sql);
	

		//配送方式
		$sql = "SELECT * FROM `{$this->App->prefix()}shipping`";
		$rt['shippinglist'] = $this->App->find($sql);
	
	
		
			
		//我的积分
		$sql = "SELECT SUM(points) FROM `{$this->App->prefix()}user_point_change` WHERE uid='$uid'";
		$rt['mypoints'] = $this->App->findvar($sql);
		
		//用户等级折扣
		$rt['discount'] = 100;
		$rank = $this->Session->read('User.rank');
		if($rank>0){
			$sql = "SELECT discount FROM `{$this->App->prefix()}user_level` WHERE lid='$rank' LIMIT 1";
			$rt['discount'] = $this->App->findvar($sql);
		}

		$active = $this->Session->read('User.active');
		//购物车商品
		if(!empty($rt['goodslist'])){
			foreach($rt['goodslist'] as $k=>$row){
				//求出实际价格
				 $comd = array();
				 
				if(!empty($uid)&&$active=='1'){

					  if($rt['discount']>0){
							$comd[] = ($rt['discount']/100)*$row['shop_price'];
					  }
					  
					  if($row['shop_price']>0 && $rank == 1 ){ //个人会员价格
							
						    $comd[] =  $row['shop_price']; //个人会员价格
					  }
					  if($row['pifa_price']>0 && $rank !='1'){ //高级会员价格
					
						    $comd[] =  $row['pifa_price']; //高级会员价格
					 }
	
				 }
	 
				 
				 else{
						$comd[] = $row['shop_price'];
				 }
				 
			     if($row['is_promote']=='1' && $row['promote_start_date'] < mktime() && $row['promote_end_date'] > mktime() && $row['promote_price']>0){ //促销价格
					    $comd[] =  $row['promote_price'];
			     }
			     if($row['is_qianggou']=='1' && $row['qianggou_start_date'] < mktime() && $row['qianggou_end_date'] > mktime() && $row['qianggou_price']>0){ //抢购价格
					    $comd[] =  $row['qianggou_price'];
			     }
					   
				 $onetotal = min($comd);
				 if(intval($onetotal)<=0) $onetotal = $row['shop_price'];
				 $total +=($row['number']*$onetotal); //总价格
				 
			}
		}
		
		//赠品类型
		$fn = SYS_PATH.'data/goods_spend_gift.php';
		$spendgift = array();
		if(file_exists($fn) && is_file($fn)){
			include_once($fn);
		}
		$rt['gift_typesd'] = $spendgift;
		unset($spendgift);
		
		//商品赠品模块
		$minspend = array();
		if(!empty($rt['gift_typesd'])){
			foreach($rt['gift_typesd'] as $k=>$row){
				++$k;
				$minspend[$k] = $row['minspend'];
			}
			arsort($minspend);
		}
		$rt['gift_goods'] = array();
		$type = 0; 
		if(count($minspend)>0){
			$count = count($minspend);
			foreach($minspend as $t=>$val){  //已最高消费赠品为准
				if($total>=$val){
					$type = $t; //赠品等级
					break;
				}
			}
			unset($minspend);
			//赠品
			$rt['gift_goods_ids'] = array();
			if($type>0){
				$sql = "SELECT tb2.goods_id,tb1.type,tb2.goods_name,tb2.market_price,tb2.goods_sn ,tb2.goods_bianhao,tb2.goods_thumb  FROM `{$this->App->prefix()}goods_gift` AS tb1";
				$sql .=" LEFT JOIN `{$this->App->prefix()}goods` AS tb2 ON tb1.goods_id=tb2.goods_id";
				$sql .=" WHERE tb2.is_alone_sale='0' AND tb2.is_on_sale='1' AND tb2.is_delete='0' AND tb1.type='$type'";
				$gift_goods = $this->App->find($sql);
				if(!empty($gift_goods)){
					foreach($gift_goods as $k=>$row){
						$rt['gift_goods_ids'][] = $row['goods_id']; //记录赠品的id
					}
					unset($gift_goods);
				}
			}

		}	
		
		$this->set('rt',$rt);
	  	
		$this->template('mycart_checkout');
	}
	
	/*
	确认订单提交页面
	*/
	function confirm(){
		$this->title('我的购物车 - 订单号 - '.$GLOBALS['LANG']['site_name']);
		$uid = $this->Session->read('User.uid');
		if(empty($uid)){ $this->jump(SITE_URL.'user.php?act=login',0,'请先登录！'); exit;}
		
		if(isset($_POST)&&!empty($_POST)){
			$shipping_id = isset($_POST['shipping_id']) ? $_POST['shipping_id'] : 0;
			
			$userress_id = isset($_POST['userress_id']) ? $_POST['userress_id'] : 0;
			if(empty($userress_id)){  //如果是提交添加地址的，需要添加到user_address表
				//添加收货地址
				$dd['user_id'] = $uid;
				$dd['consignee'] = $_POST['consignee'];
				if(empty($dd['consignee'])){
					$this->jump(SITE_URL.'mycart.php?type=checkout',0,'收货人不能为空！'); exit ;
				}
				$dd['country'] = 1;
				$dd['province'] = $_POST['province'];
				$dd['city'] = $_POST['city'];
				$dd['district'] = $_POST['district'];
				$dd['address'] = $_POST['address'];
				//$dd['town'] = $_POST['town'];
				//$dd['village'] = $_POST['village'];
				//$dd['shop_id'] = $_POST['shop_id'];
				if(empty($dd['province']) || empty($dd['city']) || empty($dd['district']) ||empty($dd['address'])){
					$this->jump(SITE_URL.'mycart.php?type=checkout',0,'收货地址不能为空！'); exit ;
				}
				$dd['sex'] = $_POST['sex']; 
				$dd['zipcode'] = $_POST['zipcode'];
				/*if(empty($dd['zipcode'])){
					$this->jump(SITE_URL.'mycart.php?type=checkout',0,'邮政编码不能为空！'); exit ;
				}
				if(!($dd['zipcode']>0)){
					$this->jump(SITE_URL.'mycart.php?type=checkout',0,'邮政编码必须是整数！'); exit ;
				}*/
				$dd['email'] = $_POST['email'];   //look添加
			
				$dd['mobile'] = $_POST['mobile'];
				$dd['tel'] = $_POST['tel']; 
				$dd['is_default'] = '1';
				$dd['shoppingname'] = $shipping_id;
				$this->App->update('user_address',array('is_default'=>'0'),'user_id',$uid);
				$this->App->insert('user_address',$dd); //添加到地址表
				$userress_id  = $this->App->iid();
				
				if(!($userress_id>0)){
					$this->jump(SITE_URL.'mycart.php?type=checkout',0,'非法的收货地址！'); exit ;
				}
			}
			
			$pay_id = isset($_POST['pay_id']) ? $_POST['pay_id'] : 0;
			$pay_name = $this->App->findvar("SELECT pay_name FROM `{$this->App->prefix()}payment` WHERE pay_id='$pay_id' LIMIT 1");

			$postscript = isset($_POST['postscript']) ? $_POST['postscript'] : "";
			//收货信息
			$sql = "SELECT * FROM `{$this->App->prefix()}user_address` WHERE address_id='$userress_id' LIMIT 1";
			//$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb2 ON tb2.region_id = tb1.province";
			//$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb3 ON tb3.region_id = tb1.city";
			//$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb4 ON tb4.region_id = tb1.district";
			//$sql .=" WHERE tb1.user_id='$uid'";
			$user_ress = $this->App->findrow($sql);
			if(empty($user_ress)){ $this->jump(SITE_URL.'mycart.php?type=checkout',0,'非法收货地址！'); exit ;}
			
			//$shipping_id = $user_ress['shoppingname'] ? $user_ress['shoppingname'] : $shipping_id;
			$shipping_name = $this->App->findvar("SELECT shipping_name FROM `{$this->App->prefix()}shipping` WHERE shipping_id='$shipping_id' LIMIT 1");
			
			//购物车商品
			$cartlist = $this->Session->read('cart');
			if(empty($cartlist)){
				$this->jump(SITE_URL.'mycart.php',0,'购物车商品为空!'); exit;
			}
			
			//添加信息到数据表
			$orderdata['order_sn']= date('Y',mktime()).mktime();
			$orderdata['user_id']= $uid ? $uid : 0;
			$orderdata['consignee'] = $user_ress['consignee'] ? $user_ress['consignee'] : "";
			$orderdata['province'] = $user_ress['province'] ? $user_ress['province'] : 0;
			$orderdata['city'] = $user_ress['city'] ? $user_ress['city'] : 0;
			$orderdata['district'] = $user_ress['district'] ? $user_ress['district'] : 0;
			//$orderdata['town'] = $user_ress['town'] ? $user_ress['town'] : 0;
			//$orderdata['village'] = $user_ress['village'] ? $user_ress['village'] : 0;
			$orderdata['address'] = $user_ress['address'] ? $user_ress['address'] : "";
			$orderdata['zipcode']  = $user_ress['zipcode'] ? $user_ress['zipcode'] : "";
			$orderdata['tel']  = $user_ress['tel'] ? $user_ress['tel'] : "";
			$orderdata['mobile']  = $user_ress['mobile'] ? $user_ress['mobile'] : "";
			$orderdata['email']  = $user_ress['email'] ? $user_ress['email'] : "";
			$orderdata['shipping_id']  = $shipping_id;
			$orderdata['shipping_name']  = $shipping_name;
			if(isset($_POST['best_time']) && !empty($_POST['best_time'])){
				$orderdata['best_time']  = trim($_POST['best_time']);
			}
			$orderdata['pay_id']  = $pay_id ? $pay_id : 0;
			$orderdata['pay_name']  = $pay_name ? $pay_name : "";
			$orderdata['postscript']  = $postscript;
			
			//$orderdata['shop_id'] = $user_ress['shop_id'] ? $user_ress['shop_id'] : 0; //配送店ID
			
						
			//用户等级折扣
			$discount = 100;
			$rank = $this->Session->read('User.rank');
			$active = $this->Session->read('User.active');
			if($rank>0){
				$sql = "SELECT discount FROM `{$this->App->prefix()}user_level` WHERE lid='$rank' LIMIT 1";
				$discount = $this->App->findvar($sql);
			}
		
			$k=0;
			$total = 0;
			$jifen_onetotal = 0;
			$shop_ids = array();
			foreach($cartlist as $row){
				 //if($row['uid']>0){ $suppliers_ids[$row['uid']] = $row['uid']; } //将供应商ID放入数组中
				// $said = $this->auto_goods_assign_suppliers($userress_id,$row['goods_id']);
				
				// $suppliers_ids[$said] = $said;
				 $data[$k]['goods_id'] = $row['goods_id'];
				 $data[$k]['brand_id'] = $row['brand_id'];
				 $data[$k]['suppliers_id'] = $said;
				 $data[$k]['goods_name'] = $row['goods_name'];
				 $data[$k]['goods_bianhao'] = $row['goods_bianhao'];
				 $data[$k]['goods_thumb'] = $row['goods_thumb'];
				 $data[$k]['goods_sn'] = $row['goods_sn'];
				 $data[$k]['goods_number'] = $row['number'];
				 $data[$k]['market_price'] = $row['shop_price'] > 0 ? $row['shop_price'] : $row['pifa_price']; //原始价格
				 if(!empty($row['buy_more_best'])){
				 	$data[$k]['buy_more_best'] = $row['buy_more_best']; //买多送多，如：10送1
				 }
				 
				 //求出实际价格
				 $comd = array();
				 if(!empty($uid)&&$active=='1' ){
						if($discount>0 && $rank =='1'){
							$comd[] = ($discount/100)*$row['shop_price'];
						}
						
						 if($row['shop_price']>0 && $rank == 1 ){ //个人会员价格
							$comd[] =  $row['shop_price']; //个人会员价格
						 }
						 
						 if($row['pifa_price']>0 && $rank !='1'){ //高级会员价格
							$comd[] =  $row['pifa_price']; //高级会员价格
						 }
				 }else{
			   			$comd[] = $row['shop_price'];
						$comd[] =  $row['pifa_price'];
			  	 }
				 
				 if($row['is_promote']=='1' && $row['promote_start_date'] < mktime() && $row['promote_end_date'] > mktime() && $row['promote_price']>0){ //促销价格
					    $comd[] =  $row['promote_price'];
			     }
			     if($row['is_qianggou']=='1' && $row['qianggou_start_date'] < mktime() && $row['qianggou_end_date'] > mktime() && $row['qianggou_price']>0){ //抢购价格
					    $comd[] =  $row['qianggou_price'];
			     }
				
				 $onetotal = @min($comd); //最低的作为实际价格
				 //记录积分
				 if(!intval($onetotal)>0) $onetotal = $row['shop_price'];
				 $s = $row['number']*$onetotal;
				 $total += $s;
				 
				 $data[$k]['goods_price'] = $onetotal; //实际价格
				 $data[$k]['goods_attr'] = !empty($row['spec']) ? $row['goods_brief'].implode("<br />",$row['spec']) : $row['goods_brief'];
				 $data[$k]['goods_unit'] = $row['goods_unit'];
				 
				 if(isset($_POST['confirm_jifen']) && intval($_POST['confirm_jifen'])>0){
				 	if($row['is_jifen_session']=='1'){
				 		$data[$k]['from_jifen'] = $row['need_jifen']*$row['number'];
						$jifen_onetotal += $s;
					}
				 }
				 $k++;
				 
				 if(!empty($row['gifts'])){
				 		 $data[$k]['goods_id'] = $row['gifts']['goods_id'];
						 $data[$k]['brand_id'] = $row['gifts']['brand_id'];
						 $data[$k]['suppliers_id'] = $said;
						 $data[$k]['goods_name'] = '<span style="color:#FE0000">[赠品]</span>'.$row['gifts']['goods_name'];
						 $data[$k]['goods_bianhao'] = $row['gifts']['goods_bianhao'];
						 $data[$k]['goods_thumb'] = $row['goods_thumb'];
						 $data[$k]['goods_sn'] = $row['gifts']['goods_sn'].'-gift';
						 $data[$k]['goods_number'] = $row['gifts']['number'];
						 $data[$k]['market_price'] = $row['gifts']['shop_price']; //原始价格
						 $data[$k]['goods_price'] = $row['gifts']['shop_price'];  //实际价格
				 		 $data[$k]['goods_attr'] = !empty($row['gifts']['spec']) ? implode("<br />",$row['gifts']['spec']) : "";
						 $data[$k]['goods_unit'] = $row['gifts']['goods_unit'];
						 $data[$k]['is_gift'] = 1;
						 
						 $k++;
				 }
			}
			
			
			//价格为0 不允许购物
			if(!($total>0)){
				$this->template('mycart_submit_order_error');
				exit;
			}
			
			$moneyinfo = $this->get_give_off_monery($total); //返回赠送的余额
			
			$d = array('userress_id'=>$userress_id,'shopping_id'=>$shipping_id);
			$fr = $this->ajax_jisuan_shopping($d,'cart'); //邮费
			
			$n = ($fr>0) ? format_price($fr) : '0.00';
			$orderdata['goods_amount']  = format_price($total);
			$orderdata['order_amount']  = $moneyinfo['shippingprice']; //优惠后的价格,也就是最终支付价格
			$orderdata['offprice']  = $moneyinfo['offmoney']; 
			$orderdata['add_time'] = mktime();
			$orderdata['shipping_fee'] = $n; //邮费
			
			//是否用积分兑换商品
			if(isset($_POST['confirm_jifen']) && $_POST['confirm_jifen']>0 && intval($jifen_onetotal) > 0){
				$orderdata['goods_amount'] = $orderdata['goods_amount'] - $jifen_onetotal;
				$orderdata['order_amount'] = $orderdata['order_amount'] - $jifen_onetotal;
				$this->App->insert('user_point_change',array('time'=>mktime(),'changedesc'=>"用积分兑换商品",'uid'=>$uid,'points'=>-intval($_POST['confirm_jifen'])));
			}
			
			if($this->App->insert('goods_order_info',$orderdata)){ //订单成功后
				$iid = $this->App->iid();
				
				foreach($data as $kk=>$rows){
					$rows['order_id'] = $iid;
					
					$this->App->insert('goods_order',$rows);  //添加订单商品表
					
					//更新销售数量
					$gid = $rows['goods_id'];
					$num = $rows['goods_number']; //look 添加 库存量在购买成功后减少
					if($gid>0 && $rows['is_gift']!='1'){
						$sql = "UPDATE `{$this->App->prefix()}goods` SET `sale_count` = `sale_count`+1 , `goods_number` = `goods_number`- '$num' WHERE goods_id = '$gid'";
						$this->App->query($sql);
					}
				}
				//插入账户改变表user_money_change
				$this->action('user','add_user_money','spend',array('money'=>($orderdata['offprice']>0 ? (-$orderdata['offprice']) : 0.00),'order_id'=>$iid));
				
				//插入供应商订单表goods_order_status
				/*if(!empty($suppliers_ids)){
					foreach($suppliers_ids as $id){
						if(!($id>0)) continue;
						$subdata = array('suppliers_id'=>$id,'order_id'=>$iid);
						$this->App->insert('goods_order_status',$subdata);
					}
				}*/
				
				$rt['order_sn'] = $orderdata['order_sn'];
				$rt['shipping_name'] = $shipping_name;
				$rt['pay_name'] = $pay_name;
				$rt['total'] = format_price($orderdata['order_amount']);
				$rt['shipping_fee'] = $n; //邮费
				
				####################################################
				//热销
				//$rt['top10'] = $this->action('catalog','top10',0,5);
				
				//随机
				/*$sql = "SELECT goods_id, goods_name,shop_price, market_price, goods_thumb, original_img, goods_img,promote_start_date,promote_end_date,promote_price,is_promote FROM `{$this->App->prefix()}goods` WHERE is_on_sale = '1' AND is_delete = '0' AND is_alone_sale='1' ORDER BY RAND() LIMIT 5";
				$randgoods = $this->App->find($sql);
				$rt['randgoods'] = array();
				if(!empty($randgoods)){
					foreach($randgoods as $k=>$row){
						$rt['randgoods'][$k] = $row;
						$rt['randgoods'][$k]['url'] = get_url($row['goods_name'],$row['goods_id'],'product.php?id='.$row['goods_id'],'goods',array('product','index',$row['goods_id']));
						$rt['randgoods'][$k]['goods_thumb'] = SITE_URL.$row['goods_thumb'];
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
						$rt['randgoods'][$k]['promote_price'] = $row['promote_price'];
					}
					unset($randgoods);
				}*/
				
				//最新
				/*$sql = "SELECT goods_id, goods_name,shop_price, market_price, goods_thumb, original_img, goods_img,promote_start_date,promote_end_date,promote_price,is_promote FROM `{$this->App->prefix()}goods` WHERE is_on_sale = '1' AND is_delete = '0' AND is_alone_sale='1' ORDER BY goods_id DESC LIMIT 5";
				$newgoods = $this->App->find($sql);
				$rt['newgoods'] = array();
				if(!empty($newgoods)){
					foreach($newgoods as $k=>$row){
						$rt['newgoods'][$k] = $row;
						$rt['newgoods'][$k]['url'] = get_url($row['goods_name'],$row['goods_id'],'product.php?id='.$row['goods_id'],'goods',array('product','index',$row['goods_id']));
						$rt['newgoods'][$k]['goods_thumb'] = SITE_URL.$row['goods_thumb'];
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
						$rt['newgoods'][$k]['promote_price'] = $row['promote_price'];
					}
					unset($newgoods);
				}*/
				##################################
				
				
				$rts['pay_id'] = $pay_id;
				$rts['order_sn'] = $rt['order_sn'];
				$rts['order_amount'] = $rt['total'];
				$rts['username'] = $orderdata['consignee'];
				$rts['logistics_fee'] = $rt['shipping_fee'];
				
				$sql = "SELECT ua.address,ua.zipcode,ua.tel,ua.mobile,rg.region_name AS provincename,rg1.region_name AS cityname,rg2.region_name AS districtname FROM `{$this->App->prefix()}user_address` AS ua";
				$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS rg ON rg.region_id = ua.province";
				$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS rg1 ON rg1.region_id = ua.city";
				$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS rg2 ON rg2.region_id = ua.district WHERE ua.address_id='$userress_id' LIMIT 1";
				$userress = $this->App->findrow($sql);
		
				$rts['address'] = $userress['provincename'].'&nbsp;'.$userress['cityname'].'&nbsp;'.$userress['districtname'].'&nbsp;'.$userress['address'];
				$rts['zip'] = !empty($userress['zipcode']) ? $userress['zipcode'] : $orderdata['zipcode'];
				$rts['phone'] = !empty($userress['tel']) ? $userress['tel'] : $orderdata['tel'];
				$rts['mobile'] = !empty($userress['mobile']) ? $userress['mobile'] : $orderdata['mobile'];
				$this->Session->write('cart',"");
				$this->_alipayment($rts);
				
				exit;

			
				$this->set('rt',$rt);
				$this->Session->write('cart',"");
				$this->template('mycart_submit_order');
				exit;
			}else{
				//$this->App->write('cart',"");
				$this->jump(SITE_URL.'mycart.php',0,'你的订单没有提交成功，我们会尽快处理出现问题！'); exit;
			}
			
		}else{
			$this->App->write('cart',"");
			$this->jump(SITE_URL.'mycart.php');
		}
		$this->App->write('cart',"");
		$this->jump(SITE_URL.'mycart.php',0,'意外错误，我们会尽快处理出现问题！'); exit;
	}
	
	
	function fastcheckout(){
		$oid = $_POST['order_id'];
		$uid = $this->Session->read('User.uid');
		$sql = "SELECT * FROM `{$this->App->prefix()}goods_order_info` WHERE user_id = '$uid' AND order_id='$oid'";	
		$rt = $this->App->findrow($sql);
		
		
		$rts['pay_id'] = $rt['pay_id'];
		$rts['order_sn'] = $rt['order_sn'];
		$rts['order_amount'] = $rt['order_amount']+$rt['shipping_fee'];
		$rts['username'] = $orderdata['consignee'];
		$rts['logistics_fee'] = $rt['shipping_fee'];
		
		
		$sql = "SELECT ua.address,ua.zipcode,ua.tel,ua.mobile,rg.region_name AS provincename,rg1.region_name AS cityname,rg2.region_name AS districtname FROM `{$this->App->prefix()}goods_order_info` AS ua";
		$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS rg ON rg.region_id = ua.province";
		$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS rg1 ON rg1.region_id = ua.city";
		$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS rg2 ON rg2.region_id = ua.district WHERE ua.order_id='$oid' LIMIT 1";
		$userress = $this->App->findrow($sql);

		$rts['address'] = $userress['provincename'].'&nbsp;'.$userress['cityname'].'&nbsp;'.$userress['districtname'].'&nbsp;'.$userress['address'];
		$rts['zip'] = !empty($userress['zipcode']) ? $userress['zipcode'] : $orderdata['zipcode'];
		$rts['phone'] = !empty($userress['tel']) ? $userress['tel'] : $orderdata['tel'];
		$rts['mobile'] = !empty($userress['mobile']) ? $userress['mobile'] : $orderdata['mobile'];
				
		$this->_alipayment($rts);
		unset($rt);
		exit;
	}
	
	//ajax更新购物的价格
	function ajax_change_price($data=array()){
		$id = $data['id'];
		$number = $data['number'];
		$maxnumber = $this->Session->read("cart.{$id}.goods_number");
		if($number>$maxnumber){
			die("购买数量已经超过了库存，你最大只能购买:".$maxnumber);
		}
		
		//是否是赠品，如果是赠品，那么只能添加一件，不能重复添加
		$is_alone_sale = $this->Session->read("cart.{$id}.is_alone_sale");
		if(!empty($is_alone_sale)){
			$this->Session->write("cart.{$id}.number",$number);
		}
		//end 赠品
		
		$uid = $this->Session->read('User.uid');
		$active = $this->Session->read('User.active');
		
		//用户等级折扣
		$discount = 100;
		$rank = $this->Session->read('User.rank');
		if($rank>0){
			$sql = "SELECT discount FROM `{$this->App->prefix()}user_level` WHERE lid='$rank' LIMIT 1";
			$discount = $this->App->findvar($sql);
		}
		
		$json = Import::json();
		
		$cartlist = $this->Session->read('cart');
		$total = 0;
		if(!empty($cartlist)){
			foreach($cartlist as $row){
				 $comd = array();
				  if(!empty($uid)&&$active=='1'){
					   if($discount>0){
							$comd[] = ($discount/100)*$row['shop_price'];
					   }
						if($row['shop_price']>0 && $rank == 1 ){ //个人会员价格
								
							$comd[] =  $row['shop_price']; //个人会员价格
						}
						if($row['pifa_price']>0 && $rank !='1'){ //高级会员价格
						
							$comd[] =  $row['pifa_price']; //高级会员价格
						}
	
				  }else{
						$comd[] = $row['shop_price'];
				  }
	
				 if($row['is_promote']=='1' && $row['promote_start_date'] < mktime() && $row['promote_end_date'] > mktime() && $row['promote_price']>0 ){ //促销价格
					    $comd[] =  $row['promote_price'];
			     }
			   
			     if($row['is_qianggou']=='1' && $row['qianggou_start_date'] < mktime() && $row['qianggou_end_date'] > mktime() && $row['qianggou_price']>0){ //抢购价格
					    $comd[] =  $row['qianggou_price'];
			     }
				 
				 $onetotal = min($comd);
				
				 $total +=($row['number']*$onetotal);
				 
				 //是否赠品，如：买10送1
				 $gifts = array();
				 $gift2 = array();
				 if(!empty($row['buy_more_best']) && $row['goods_id']==$id){
					if ( preg_match_all('/1\d{1,2}|2[01][0-9]|22[0-7]|[1-9][0-9]|[1-9]/', $row['buy_more_best'], $buyrt) ){
						$num1 = isset($buyrt[0][0]) ? $buyrt[0][0] : 0;
						$num2 = isset($buyrt[0][1]) ? $buyrt[0][1] : 0;
						$gift2 = $this->Session->read("cart.{$id}.gifts");
						if($number>=$num1 && $num2>0){ //允许赠品
							$mb = mb_substr(trim($row['buy_more_best']),-1,1,'utf-8');
							if(!empty($mb)){
								if($mb > 0){
									$gifts['goods_unit'] = $row['goods_unit'];
								}else{
									$gifts['goods_unit'] = $mb;
								}
							}else{
								$gifts['goods_unit'] = $row['goods_unit'];
							}
							$gifts['number'] = $num2;
							$gifts['goods_id'] = $row['goods_id'];
							$gifts['goods_sn'] = $row['goods_sn'];
							$gifts['goods_bianhao'] = $row['goods_bianhao'];
							$gifts['goods_key'] = $row['goods_id'].'__'.mktime();
							$gifts['goods_name'] = $row['goods_name'];
							$gifts['shop_price'] = 0.00;
							$gifts['pifa_price'] = 0.00;
							$gifts['goods_brief'] = $row['goods_brief'];
						} //end if
					}//end if
					$gift = $this->Session->read("cart.{$id}.gifts");
					$this->Session->write("cart.{$id}.gifts",  $gifts);
					
					if((!empty($gift2) && $number<=$num1) || (empty($gift) && $number>=$num1)){
							$cartlist = $this->Session->read('cart');
							$rt['goodslist'] = array();
							if(!empty($cartlist)){
								foreach($cartlist as $k=>$row){
									$rt['goodslist'][$k] = $row;
									$rt['goodslist'][$k]['url'] = get_url($row['goods_name'],$row['goods_id'],'product.php?id='.$row['goods_id'],'goods',array('product','index',$row['goods_id']));
									$rt['goodslist'][$k]['goods_thumb'] = is_file(SYS_PATH.$row['goods_thumb']) ? SITE_URL.$row['goods_thumb'] : SITE_URL.'theme/images/no_picture.gif';
									$rt['goodslist'][$k]['goods_img'] = is_file(SYS_PATH.$row['goods_img']) ? SITE_URL.$row['goods_img'] : SITE_URL.'theme/images/no_picture.gif';
									$rt['goodslist'][$k]['original_img'] = is_file(SYS_PATH.$row['original_img']) ? SITE_URL.$row['original_img'] : SITE_URL.'theme/images/no_picture.gif';
								} //end foreach
								unset($goodslist);
							} //end if cart
							
							$this->set('rt',$rt);
							$con = $this->fetch('ajax_mycart',true);
							unset($cartlist,$gift,$gift2);
							$result = array('error' => 1, 'message' => $con);
							die($json->encode($result));
					}
				 }//end if
				
			} //end foreach
		} //end if
		unset($cartlist);
		$moneyinfo = $this->get_give_off_monery($total);
		$result = array('error' => 0, 'message' => $total,'offprice'=>$moneyinfo['offmoney'],'shippingprice'=>$moneyinfo['shippingprice']);
		die($json->encode($result));
	}
	
	//改变使用积分换取商品
	function ajax_change_jifen($is_confirm='true'){
		$uid = $this->Session->read('User.uid');
		$active = $this->Session->read('User.active');
		
		//用户等级折扣
		$discount = 100;
		$rank = $this->Session->read('User.rank');
		if($rank>0){
			$sql = "SELECT discount FROM `{$this->App->prefix()}user_level` WHERE lid='$rank' LIMIT 1";
			$discount = $this->App->findvar($sql);
		}
		
		$cartlist = $this->Session->read('cart');
		$total = 0;
		if(!empty($cartlist)){
			foreach($cartlist as $row){
				 $comd = array();
				  if(!empty($uid)&&$active=='1'){
						if($discount>0){
							$comd[] = ($discount/100)*$row['shop_price'];
						}
						if($row['shop_price']>0 && $rank == 1 ){ //个人会员价格
								
							$comd[] =  $row['shop_price']; //个人会员价格
						}
						if($row['pifa_price']>0 && $rank !='1'){ //高级会员价格
						
							$comd[] =  $row['pifa_price']; //高级会员价格
						}
	
				   }else{
						$comd[] = $row['shop_price'];
				   }
	
					if($row['is_promote']=='1' && $row['promote_start_date'] < mktime() && $row['promote_end_date'] > mktime() && $row['promote_price']>0){ //促销价格
							$comd[] =  $row['promote_price'];
					}
				   
					if($row['is_qianggou']=='1' && $row['qianggou_start_date'] < mktime() && $row['qianggou_end_date'] > mktime() && $row['qianggou_price']>0){ //抢购价格
							$comd[] =  $row['qianggou_price'];
					}
					 
					$onetotal = min($comd);
					
					$total +=($row['number']*$onetotal);
					
					if($row['is_jifen_session']=='1'){
						$jifen_onetotal += $row['number']*$onetotal;
					}
				
			} //end foreach
		} //end if cart
		unset($cartlist);
		if($is_confirm=='true'){
			echo $total-$jifen_onetotal;
		}else{
			echo $total;
		}
		exit;
	}
	
	//ajax计算邮费
	function ajax_jisuan_shopping($data=array(),$tt='ajax'){
		$shopping_id = isset($data['shopping_id']) ? $data['shopping_id']: 0;
		$userress_id = isset($data['userress_id']) ? $data['userress_id']: 0;
		
		if(!($userress_id>0)){
			/*if($tt=='ajax'){
				die("请选择一个收货地址！");
			}else{
				return "请选择一个收货地址！";
			}*/
		}
		if(!($shopping_id>0)){
			if($tt=='ajax'){
				die("请选择一个配送方式！");
			}else{
				return "请选择一个配送方式！";
			}
		}
		
		//当前的收货地址
		$sql = "SELECT country,province,city,district FROM `{$this->App->prefix()}user_address` WHERE address_id='$userress_id'";
		$ids = $this->App->findrow($sql);
		/*if(empty($ids)){
			if($tt=='ajax'){
				die("请先设置一个收货地址！");
			}else{
				return "请先设置一个收货地址！";
			}
		}*/
		
		$cartlist = $this->Session->read('cart');
		$items = 0;
		$weights = 0;
		$total = 0;
		if(!empty($cartlist)){
			foreach($cartlist as $row){
				if($row['is_shipping']=='1' || $row['is_alone_sale']=='0') continue;
				$items +=$row['number'];
				$weights +=$row['goods_weight']; //总重量
				$total +=$row['pifa_price']*$row['number'];
			}
		}
		
		
		$sql = "SELECT * FROM `{$this->App->prefix()}shipping_area` WHERE shipping_id='$shopping_id'";
		$area_rt = $this->App->find($sql); //配送区域列表
		
		if(!empty($area_rt)){
			foreach($area_rt as $row){
				if($total>=199){
						if($tt=='ajax'){
							die($row['shipping_area_name'].'+0.00');
						}else{
							return '0.00';
						}
						break;
				}
		
		
				if(!empty($row['configure'])){
					$configure = json_decode($row['configure']);
					if(is_array($configure)){
						$type = $row['type'];
						$item_fee = $row['item_fee'];
						$weight_fee = $row['weight_fee'];
						$step_weight_fee = $row['step_weight_fee'];
						$step_item_fee = $row['step_item_fee'];
						$max_money = $row['max_money'];
						           
						if(in_array($ids['district'],$configure)){ //区
							if($type=='item'){  //件计算
								$zyoufei = $item_fee + (($items-1)*$step_item_fee);
								if($zyoufei>$max_money) $zyoufei = $max_money;
								if($tt=='ajax'){
									die($row['shipping_area_name'].'+'.$zyoufei);
								}else{
									return $zyoufei;
								}
							}elseif($type=='weight'){ //重量计算
								if($weights>500){
								 	$zyoufei = $weight_fee + ((ceil(($weights-500)/500)+1)*$step_weight_fee);
								 	if($zyoufei>$max_money) $zyoufei = $max_money;
									if($tt=='ajax'){
										die($row['shipping_area_name'].'+'.$zyoufei);
									}else{
										return $zyoufei;
									}
								 }else{
								 	if($tt=='ajax'){
										die($row['shipping_area_name'].'+'.$weight_fee);
									}else{
										return $weight_fee;
									}
								 }
							}
							break;
						}elseif(in_array($ids['city'],$configure)){ //城市
							if($type=='item'){  //件计算
								$zyoufei = $item_fee + (($items-1)*$step_item_fee);
								if($zyoufei>$max_money) $zyoufei = $max_money;
								if($tt=='ajax'){
									die($row['shipping_area_name'].'+'.$zyoufei);
								}else{
									return $zyoufei;
								}
							}elseif($type=='weight'){ //重量计算
								if($weights>500){
								 	$zyoufei = $weight_fee + ((ceil(($weights-500)/500)+1)*$step_weight_fee);
								 	if($zyoufei>$max_money) $zyoufei = $max_money;
									if($tt=='ajax'){
										die($row['shipping_area_name'].'+'.$zyoufei);
									}else{
										return $zyoufei;
									}
								 }else{
								 	if($tt=='ajax'){
										die($row['shipping_area_name'].'+'.$weight_fee);
									}else{
										return $weight_fee;
									}
								 }
							}
							break;
						}elseif(in_array($ids['province'],$configure)){ //省
							if($type=='item'){  //件计算
								$zyoufei = $item_fee + (($items-1)*$step_item_fee);
								if($zyoufei>$max_money) $zyoufei = $max_money;
								if($tt=='ajax'){
									die($row['shipping_area_name'].'+'.$zyoufei);
								}else{
									return $zyoufei;
								}
							}elseif($type=='weight'){ //重量计算
								if($weights>500){
								 	$zyoufei = $weight_fee + ((ceil(($weights-500)/500)+1)*$step_weight_fee);
								 	if($zyoufei>$max_money) $zyoufei = $max_money;
									if($tt=='ajax'){
										die($row['shipping_area_name'].'+'.$zyoufei);
									}else{
										return $zyoufei;
									}
								 }else{
								 	if($tt=='ajax'){
										die($row['shipping_area_name'].'+'.$weight_fee);
									}else{
										return $weight_fee;
									}
								 }
							}
							break;
						}elseif(in_array($ids['country'],$configure)){ //国家
							if($type=='item'){  //件计算
								$zyoufei = $item_fee + (($items-1)*$step_item_fee);
								if($zyoufei>$max_money) $zyoufei = $max_money;
								if($tt=='ajax'){
									die($row['shipping_area_name'].'+'.$zyoufei);
								}else{
									return $zyoufei;
								}
							}elseif($type=='weight'){ //重量计算
								if($weights>500){
								 	$zyoufei = $weight_fee + ((ceil(($weights-500)/500)+1)*$step_weight_fee);
								 	if($zyoufei>$max_money) $zyoufei = $max_money;
									if($tt=='ajax'){
										die($row['shipping_area_name'].'+'.$zyoufei);
									}else{
										return $zyoufei;
									}
								 }else{
								 	if($tt=='ajax'){
										die($row['shipping_area_name'].'+'.$weight_fee);
									}else{
										return $weight_fee;
									}
								 }
							}
							break;
						}
					} //end if
				} // end if
			} // end foreach
		}else{
			if($tt=='ajax'){
				die("");
			}else{
				return $zyoufei;
			}
		}
			if($tt=='ajax'){
				die("");
			}else{
				return $zyoufei;
			}
	}
	
	
	//删除购物车商品
	function ajax_delcart_goods($id=0){
		//if(empty($id)) return "";
		if(!empty($id)){
			$cartlist = $this->Session->read('cart');
			if(strpos($id,'__')){
				$l = explode('__',$id);
				$ids = $l[0];
				$this->Session->write("cart.{$ids}.gifts","");
			}else{
				if(isset($cartlist[$id])){ $this->Session->write("cart.{$id}","");}
			}
			unset($cartlist);
		}
		
		$uid = $this->Session->read('User.uid');
		//用户等级折扣
		$rt['discount'] = 100;
		$rank = $this->Session->read('User.rank');
		if($rank>0){
			$sql = "SELECT discount FROM `{$this->App->prefix()}user_level` WHERE lid='$rank' LIMIT 1";
			$rt['discount'] = $this->App->findvar($sql);
		}
		
		$active = $this->Session->read('User.active');
		$goodslist = $this->Session->read('cart');
		$rt['goodslist'] = array();
		if(!empty($goodslist)){
			foreach($goodslist as $k=>$row){
				$rt['goodslist'][$k] = $row;
				$rt['goodslist'][$k]['url'] = get_url($row['goods_name'],$row['goods_id'],'product.php?id='.$row['goods_id'],'goods',array('product','index',$row['goods_id']));
				$rt['goodslist'][$k]['goods_thumb'] = is_file(SYS_PATH.$row['goods_thumb']) ? SITE_URL.$row['goods_thumb'] : SITE_URL.'theme/images/no_picture.gif';
				$rt['goodslist'][$k]['goods_img'] = is_file(SYS_PATH.$row['goods_img']) ? SITE_URL.$row['goods_img'] : SITE_URL.'theme/images/no_picture.gif';
				$rt['goodslist'][$k]['original_img'] = is_file(SYS_PATH.$row['original_img']) ? SITE_URL.$row['original_img'] : SITE_URL.'theme/images/no_picture.gif';
				
				//求出实际价格
				 $comd = array();
				 if(!empty($uid)&&$active=='1'){
						if($rt['discount']>0){
							$comd[] = ($rt['discount']/100)*$row['shop_price'];
						}
						if($row['shop_price']>0 && $rank == 1 ){ //个人会员价格
								
							$comd[] =  $row['shop_price']; //个人会员价格
						}
						if($row['pifa_price']>0 && $rank !='1'){ //高级会员价格
						
							$comd[] =  $row['pifa_price']; //高级会员价格
						}
	
				 }else{
						$comd[] = $row['shop_price'];
				 }
				 
			     if($row['is_promote']=='1' && $row['promote_start_date'] < mktime() && $row['promote_end_date'] > mktime() && $row['promote_price']>0){ //促销价格
					    $comd[] =  $row['promote_price'];
			     }
			     if($row['is_qianggou']=='1' && $row['qianggou_start_date'] < mktime() && $row['qianggou_end_date'] > mktime() && $row['qianggou_price']>0){ //抢购价格
					    $comd[] =  $row['qianggou_price'];
			     }
					   
				 $onetotal = min($comd);
				 if(intval($onetotal)<=0) $onetotal = $row['shop_price'];
				 $total +=($row['number']*$onetotal); //总价格
				 
			} //end foreach
			unset($goodslist);
		} //end if cart
		
		//赠品类型
		$fn = SYS_PATH.'data/goods_spend_gift.php';
		$spendgift = array();
		if(file_exists($fn) && is_file($fn)){
			include_once($fn);
		}
		$rt['gift_typesd'] = $spendgift;
		unset($spendgift);
		
		//商品赠品模块
		$minspend = array();
		if(!empty($rt['gift_typesd'])){
			foreach($rt['gift_typesd'] as $k=>$row){
				++$k;
				$minspend[$k] = $row['minspend'];
			}
			arsort($minspend);
		}
		
		$rt['gift_goods'] = array();
		$type = 0; 
		if(count($minspend)>0){
			$count = count($minspend);
			foreach($minspend as $t=>$val){  //已最高消费赠品为准
				if($total>=$val){
					$type = $t; //赠品等级
					break;
				}
			}
			unset($minspend);
			//赠品
			$rt['gift_goods_ids'] = array();
			if($type>0){
				$sql = "SELECT tb2.goods_id,tb1.type,tb2.goods_name,tb2.market_price,tb2.goods_sn ,tb2.goods_bianhao,tb2.goods_thumb  FROM `{$this->App->prefix()}goods_gift` AS tb1";
				$sql .=" LEFT JOIN `{$this->App->prefix()}goods` AS tb2 ON tb1.goods_id=tb2.goods_id";
				$sql .=" WHERE (tb2.is_alone_sale='0' OR tb2.is_alone_sale IS NOT NULL) AND tb2.is_on_sale='1' AND AND tb2.is_delete='0' AND tb1.type='$type'";
				$gift_goods = $this->App->find($sql);
				if(!empty($gift_goods)){
					foreach($gift_goods as $k=>$row){
						$rt['gift_goods_ids'][] = $row['goods_id']; //记录赠品的id
					}
					unset($gift_goods);
				}
			}

		}	
		
		$this->set('rt',$rt);
		$con = $this->fetch('ajax_mycart',true);
		die($con);
	}

        //清空购物车
        function mycart_clear(){
            $this->Session->write("cart","");
           // $this->jump(SITE_URL.'shopping/');
		   $this->template('mycart_list');
            exit;
        }
		
		
		//处理用注册赠送1200元来消费的功能
		function get_give_off_monery($total=0){
			 $uid = $this->Session->read('User.uid');
			 $rank = $this->Session->read('User.rank');
			 if(!($uid>0) || !($total>0)) return 0.00;
			 $give_money = $this->App->findvar("SELECT SUM(money) FROM `{$this->App->prefix()}user_money_change` WHERE uid='$uid' AND type='register'");
			
			 $give_money_month = ($GLOBALS['LANG']['reg_give_money_data']['give_money_month']/100)*$give_money;//每个月只能消费多少
			 
			 $give_money_month_one = $GLOBALS['LANG']['reg_give_money_data']['give_money_month_one'.$rank]; //报销当月最大消费的百分之几
			 
			 $sba = $this->App->findvar("SELECT SUM(money) FROM `{$this->App->prefix()}user_money_change` WHERE uid='$uid'"); 
			 $rt['shengxiamoney'] = format_price($sba);//还剩下多少可以消费的资金
			/* $zspendprice = $this->App->findvar("SELECT SUM(money) FROM `{$this->App->prefix()}user_money_change` WHERE uid='$uid' AND type='spend'");
			 if(!empty($zspendprice)){
			 	$zspendprice = abs($zspendprice);
			 }*/
			 
			 //查找当月已经消费多少了
			 $m = date('m',mktime());
			 $thismouthspend = 0;
			 $thismouthspend = $this->App->findvar("SELECT SUM(money) FROM `{$this->App->prefix()}user_money_change` WHERE uid='$uid' AND type='spend' AND thismonth='$m'");
			 if(!empty($thismouthspend)){
			 	$thismouthspend = abs($thismouthspend);
			 }
			 $rt['month_spend_money'] = format_price($thismouthspend); //当月已经消费多少了
			 
			 $rt['shippingprice'] = $total;
			 $rt['month_max_spend_money'] = 0.00;
			 if($thismouthspend>=$give_money_month){ //消费满了，不能再用赠送消费了
			 	$rt['offmoney'] = 0.00;
				return $rt;
			 }else{
			 	$shengxiamoney = $give_money_month-$thismouthspend; //这个月最多只能消费那么多
			 }
			 $rt['month_max_spend_money'] = format_price($shengxiamoney);//这个月最多只能消费那么多
			 
			 $thisspendgoodsmoney = $total*($give_money_month_one/100); //这次购物所能抵消的费用
			 
			 if($thisspendgoodsmoney>=$shengxiamoney){
			 	$rt['offmoney'] = format_price($shengxiamoney);
			 }else{
			 	$rt['offmoney'] = format_price($thisspendgoodsmoney);
			 }
			 $rt['shippingprice'] = format_price($total-$rt['offmoney']); //实际支付
			 return $rt;
			 
			//查找
		}
		
		//商品自动分配供应商，供应商的区域检查
		function auto_goods_assign_suppliers($shop_address_id=0,$goods_id=0){
			if(!($shop_address_id>0) || !($goods_id>0)){
				die("尊敬的顾客你好，由于我们的购物系统出现故障，目前将暂时停止订购！对此，引起你的不便，敬请原谅！");
			}
			$sql = "SELECT country,province,city,district,town,village FROM `{$this->App->prefix()}user_address` WHERE address_id='$shop_address_id'";
			$ids = $this->App->findrow($sql); //这里是当前收货地址
			//检查当前商品的供应商
			$sql = "SELECT ua.user_id FROM `{$this->App->prefix()}user_address` AS ua LEFT JOIN `{$this->App->prefix()}suppliers_goods` AS sg ON sg.suppliers_id = ua.user_id";
			$sql .=" WHERE sg.goods_id='$goods_id' AND sg.is_delete='0' AND sg.is_on_sale='1' AND sg.is_check='1' GROUP BY ua.user_id ORDER BY ua.user_id ASC"; //如果很多供应商的时候，这样还需要增加条件查询更精确的供应商
			$suppliers_ids = $this->App->findcol($sql); //所有供应商ID
			
			//从中找到送货地址最近的供应商
			if(!empty($suppliers_ids)){
				$this->App->fieldkey('suppliers_id');
				$area_data_item = $this->App->find("SELECT suppliers_id,area_data FROM `{$this->App->prefix()}suppliers_shoppong_area` WHERE suppliers_id IN(".implode(',',$suppliers_ids).") AND active='1'");
				
				foreach($suppliers_ids as $id){
					$area_data = isset($area_data_item[$id]['area_data'])?$area_data_item[$id]['area_data']:"";
					$areaid = !empty($area_data) ? json_decode($area_data) : array();//该供应商的配送范围的区域ID
					if(!empty($areaid)){
						if(in_array($ids['village'],$areaid)){ //村
							return $id; continue;
						}
					}else{
						continue;
					}
				}//end foreach
				
				foreach($suppliers_ids as $id){
					$area_data = $area_data_item[$id]['area_data'];
					$areaid = !empty($area_data) ? json_decode($area_data) : array();//该供应商的配送范围的区域ID
					if(!empty($areaid)){
						if(in_array($ids['town'],$areaid)){ //镇
							return $id;continue;
						}
					}else{
						continue;
					}
				}//end foreach
				
				
				foreach($suppliers_ids as $id){
					$area_data = $area_data_item[$id]['area_data'];
					$areaid = !empty($area_data) ? json_decode($area_data) : array();//该供应商的配送范围的区域ID
					if(!empty($areaid)){
						if(in_array($ids['district'],$areaid)){ //区
							return $id; continue;
						}
					}else{
						continue;
					}
				}//end foreach
				
				foreach($suppliers_ids as $id){
					$area_data = $area_data_item[$id]['area_data'];
					$areaid = !empty($area_data) ? json_decode($area_data) : array();//该供应商的配送范围的区域ID
					if(!empty($areaid)){
						if(in_array($ids['city'],$areaid)){ //城市
							return $id; continue;
						}
					}else{
						continue;
					}
				}//end foreach
				
				
				foreach($suppliers_ids as $id){
					$area_data = $area_data_item[$id]['area_data'];
					$areaid = !empty($area_data) ? json_decode($area_data) : array();//该供应商的配送范围的区域ID
					if(!empty($areaid)){
						if(in_array($ids['province'],$areaid)){ //省
							return $id; continue;
						}
					}else{
						continue;
					}
				}//end foreach
				
				foreach($suppliers_ids as $id){
					$area_data = $area_data_item[$id]['area_data'];
					$areaid = !empty($area_data) ? json_decode($area_data) : array();//该供应商的配送范围的区域ID
					if(!empty($areaid)){
						if(in_array($ids['country'],$areaid)){ //国家
							return $id; continue;
						}
					}else{
						continue;
					}
				}//end foreach
			} //end if
			
			//die("尊敬的顾客你好，由于我们的购物系统出现故障，目前将暂时停止订购！对此，引起你的不便，敬请原谅！");
			
			//die("尊敬的顾客你好，由于我们的配送系统出现故障，目前没有商品仓库配送到该配送店！对此，引起你的不便，敬请原谅！");
			$this->template('shopping_noprice_error');exit;
			//return $suid;
		} //end function
}