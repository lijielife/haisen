<?php

class SmsController extends Controller{
 
	 //构造函数，自动新建对象
 	function  __construct() {
		/*
		*构造函数
		*/
		$this->css('content.css');
	}
	
	function sms_yuansi(){
	    //var_dump($this->sms_getorderinfo('20151429792234'));
	    /* 【荣昌号】您的订单：@ordersn已付款成功！我们将尽快为您发货！祝你生活愉快!详情4008-52-1878 */
	    //var_dump($this->action('sms','sms_yssend',array('tel'=>'18051825166','order_sn'=>'1222233','type'=>'tmp_order')));
		/* 【荣昌号】买家@name，@price元（@pname）等商品，订单号@order,买家已付款，请及时给买家发货 */
		//var_dump($this->action('sms','sms_yssend',array('tel'=>'18051825166','order_sn'=>'1222233','pname'=>'测试商品','name'=>'测试人名','price'=>'88.88','type'=>'tmp_b_order')));
		/* 【荣昌号】荣昌号于@date向@name尾号为@cardid的银行卡账户存入了人民币@price元 */
		//var_dump($this->action('sms','sms_yssend',array('tel'=>'18051825166','name'=>'测试人名','price'=>'88.88','cardid'=>'112233445566','type'=>'tmp_cash')));
	    /* 【荣昌号】您购买的宝贝已通过物流公司：（@express）发出，单号@number,如有问题请联系客服4008-52-1878 */
	   //var_dump($this->action('sms','sms_yssend',array('tel'=>'18051825166','express'=>'物流名','number'=>'112233445566','type'=>'tmp_goods')));
	    $sql = "Select * From `{$this->App->prefix()}sms` Where `sms_id` = '1'";
	    $rt = $this->App->findrow($sql);
		$config = unserialize($rt['sms_config']); 
		$back_data = $this->ys_getbalance($config);
		$this->set('data',$back_data);
		$this->set('config',$config);
		$this->set('rt',$rt);
		$this->template('sms_yuansi');
	}
	function ajax_update(){
	    $sms_id = trim($_POST['sms_id']);
	    $data = array(
		   'Id' => trim($_POST['Id']),
		   'Name' => trim($_POST['Name']),
		   'Psw' => trim($_POST['Psw']),
		   'status' => trim($_POST['start']),
		   'tmp_order' => trim($_POST['tmp_order']),
		   'tmp_goods' => trim($_POST['tmp_goods']),
		   'tmp_cash' => trim($_POST['tmp_cash']),
		   'tmp_b_order' => trim($_POST['tmp_b_order']),
		);
		
		if($sms_id and $data['Id'] and $data['Name'] and $data['Psw']){
			if($this->App->update('sms',array('sms_config'=>serialize($data),'linetime'=>time(),'status'=>$data['status']),'sms_id',$sms_id)){
			    $msg = $this->ys_userlogin($data);
		        
				if(intval($msg)){
				     $back_data = $this->ys_getbalance($data);
					 echo json_encode(array('success'=>'update','total'=>$back_data['Totaled'],'used'=>$back_data['Sended'],'curnum'=>$back_data['Balance'],'stata'=>$data['State']));
				}else{
				   echo json_encode(array('msg'=>$msg));
				}
				
			}else{
			    echo json_encode(array('msg'=>'更新错误'));
			}
			
		}else{
			echo json_encode(array('msg'=>'上传数据错误'));
		}
	    
	}
	function ys_userlogin($data){
	   if($data['Id'] and $data['Name'] and $data['Psw']){
			$url = "http://115.29.163.130:8180/Service.asmx/UserLogin";
			$data = "Id={$data['Id']}&Name={$data['Name']}&Psw={$data['Psw']}";
			$back = $this->curlPost($url,$data);
			$xml = simplexml_load_string($back);
			$array = (array) $xml;
			switch($array[0]){
				   case null:
				     $msg = '调用接口错误';
				   break;
				   case 0:
				     $msg = '帐户处于禁止使用状态';
					 break;
				   case -1:
				     $msg = '调用接口失败';
				   break;
				   case -2:
				     $msg = '帐户信息错误';
				   break;
				   case -3:
				     $msg = '用户或密码错误';
				   break;
				   case -4:
				     $msg = '不是普通帐户';
				   break;
				   case -30:
				     $msg = '非绑定IP';
				   break;
				   default:
				     $msg = null;
				   break;
				}
				if(!$msg){
					return $xml;
				}else{
				    return $msg;
				}
			
	   }else{
	        return 'error';
	   }
	}
	function ys_getbalance($data){
	   if($data['Id'] and $data['Name'] and $data['Psw']){
			$url = "http://115.29.163.130:8180/Service.asmx/GetBalance";
			$data = "Id={$data['Id']}&Name={$data['Name']}&Psw={$data['Psw']}";
			$back = $this->curlPost($url,$data);
			$xml = simplexml_load_string($back);
			return (array)$xml;
	   }else{
	        return 'error';
	   }
	}
	function sms_yssend($data){
	   $tel = trim($data['tel']);
	   $order = trim($data['order_sn']);
	   $price = trim($data['price']);
	   $express = trim($data['express']);
	   $number= trim($data['number']);
	   $name = trim($data['name']);
	   $pname = trim($data['pname']);
	   $cardid = trim($data['cardid']);
	
	  
	   if(!$tel){
			return 'send telephone null';
		}
	   $postdata = '';
	   $url = "http://115.29.163.130:8180/Service.asmx/SendMessage";
	   $timestamp = time();
	   $sql = "Select * From `{$this->App->prefix()}sms` Where `sms_id` = '1'";
	   $rt = $this->App->findrow($sql);
	   $row = unserialize($rt['sms_config']);
	   if(!$row['Id'] or !$row['Name'] or !$row['Psw']){
			return 'SMS config error';
	   }
	   if(!$rt['status']){
	       return null;
	   }
	   if($data['type'] == 'tmp_order'){
	        /* 【荣昌号】您的订单：@ordersn已付款成功！我们将尽快为您发货！祝你生活愉快!详情4008-52-1878 */
			
			 if(!$row['tmp_order'] or !$order){
			    return 'send sms tmp or order null';
			 }

			// 替换订单号
			$row['tmp_order'] = str_replace('@ordersn',$order,$row['tmp_order']);
			$postdata = "Id={$row['Id']}&Name={$row['Name']}&Psw={$row['Psw']}&Message={$row['tmp_order']}&Phone={$tel}&Timestamp={$timestamp}";
				

		}elseif($data['type'] == 'tmp_goods'){
		   /* 【荣昌号】您购买的宝贝已通过物流公司：（@express）发出，单号@number,如有问题请联系客服4008-52-1878 */
			 if(!$row['tmp_goods'] or !$express or !$number){
			    return 'send sms tmp or express or number null';
			 }
			
			 $row['tmp_goods'] = str_replace('@express',$express,$row['tmp_goods']);
			 $row['tmp_goods'] = str_replace('@number',$number,$row['tmp_goods']);
			$postdata = "Id={$row['Id']}&Name={$row['Name']}&Psw={$row['Psw']}&Message={$row['tmp_goods']}&Phone={$tel}&Timestamp={$timestamp}"; 
		}elseif($data['type'] == 'tmp_cash'){
			/* 【荣昌号】荣昌号于@date向@name尾号为@cardid的银行卡账户存入了人民币@price元 */
	
			if(!$row['tmp_cash'] or !$name or !$price or !$cardid){
			    return 'send sms tmp or name or price null';
			 }
			$cardid = substr($cardid,-4,4);
			$row['tmp_cash'] = str_replace('@name',$name,$row['tmp_cash']);
			$row['tmp_cash'] = str_replace('@date',date('Y年m月d日'),$row['tmp_cash']);
			$row['tmp_cash'] = str_replace('@cardid',$cardid,$row['tmp_cash']);
			$row['tmp_cash'] = str_replace('@price',$price,$row['tmp_cash']);
			$postdata = "Id={$row['Id']}&Name={$row['Name']}&Psw={$row['Psw']}&Message={$row['tmp_cash']}&Phone={$tel}&Timestamp={$timestamp}"; 
		}elseif($data['type'] == 'tmp_b_order'){
		   /* 【荣昌号】买家@name，@price元（@pname）等商品，订单号@order,买家已付款，请及时给买家发货 */
	
		   if(!$row['tmp_b_order'] or !$order or !$name or !$pname or !$price){
			    return 'send sms tmp:'.$row['tmp_b_order'].' or name:'.$name.' price:'.$price.'  pname: '.$pname.'null';
		   }
		   $row['tmp_b_order'] = str_replace('@name',$name,$row['tmp_b_order']);
		   $row['tmp_b_order'] = str_replace('@price',$price,$row['tmp_b_order']);
		   $row['tmp_b_order'] = str_replace('@pname',$pname,$row['tmp_b_order']);
		   $row['tmp_b_order'] = str_replace('@order',$order,$row['tmp_b_order']);
		   $tel = trim(substr($row['tmp_b_order'],strrpos($row['tmp_b_order'],'@')));
		   $row['tmp_b_order'] = str_replace($tel,'',$row['tmp_b_order']);
		   $tel = trim($tel,'@');
		   $postdata = "Id={$row['Id']}&Name={$row['Name']}&Psw={$row['Psw']}&Message={$row['tmp_b_order']}&Phone={$tel}&Timestamp={$timestamp}"; 
		   
		}else{
		    return 'sms template type error';
		}
		//return $postdata;
		// 去除空格
		$postdata = preg_replace('/\s/','',$postdata);
		$back = $this->curlPost($url,$postdata);
		$xml = simplexml_load_string($back);
		return (array)$xml;
	}
	function sms_getorderinfo($ordersn){
		if($ordersn ){
			$sql = "Select * From `{$this->App->prefix()}goods_order_info` Where `order_sn` = '{$ordersn}' limit 1";
			$rt = $this->App->findrow($sql);
			$sql = "Select goods_name From `{$this->App->prefix()}goods_order` Where `order_id` = '{$rt['order_id']}' limit 1";
			$rt2 = $this->App->findrow($sql);
			$rt['goods_name'] = $rt2['goods_name'];
			/* 【荣昌号】您的订单：@ordersn已付款成功！我们将尽快为您发货！祝你生活愉快!详情4008-52-1878 */
	        //var_dump($this->action('sms','sms_yssend',array('tel'=>$rt['mobile'],'order_sn'=>$ordersn,'type'=>'tmp_order')));
		   /* 【荣昌号】买家@name，@price元（@pname）等商品，订单号@order,买家已付款，请及时给买家发货 */
		   //var_dump($this->action('sms','sms_yssend',array('tel'=>$rt['mobile'],'order_sn'=>$ordersn,'pname'=>$rt['goods_name'],'name'=>$rt['consignee'],'price'=>$rt['order_amount'],'type'=>'tmp_b_order')));
		    /* 【荣昌号】您购买的宝贝已通过物流公司：（@express）发出，单号@number,如有问题请联系客服4008-52-1878 */
	      //var_dump($this->action('sms','sms_yssend',array('tel'=>'18051825166','express'=>$rt['shipping_name'],'number'=>$rt['sn_id'],'type'=>'tmp_goods')));
			return $rt;
		 }else{
			return null;
		 }
	}
	function curlPost($url, $data,$showError=1){
		$ch = curl_init();
		$header = "Accept-Charset: utf-8";
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$tmpInfo = curl_exec($ch);
		if($showError=='10'){ return $tmpInfo; exit;}
		
		$errorno=curl_errno($ch);
		if ($errorno) {
			return array('rt'=>false,'errorno'=>$errorno);
		}else{
		
			return $tmpInfo;
			
		}
	}
}

