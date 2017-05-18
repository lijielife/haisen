<?php
 /*
 * 便利店、零售店
 */
class StoreController extends Controller{
 	function  __construct() {
		$this->css(array('jquery_dialog.css','user.css','content.css'));
		$this->js(array('jquery.json-1.3.js','jquery_dialog.js','common.js','user.js','goods.js','time.js'));
	}
	
	
	//ajax处理我的订单
	function ajax_getorderlist($data=array()){
		$dt = isset($data['time'])&&intval($data['time'])>0 ?  intval($data['time']) : "";
		$status = isset($data['status']) ?  trim($data['status']) : "";
		$keyword = isset($data['keyword']) ?  trim($data['keyword']) : "";
		$page = isset($data['page'])&&intval($data['page']>0) ? intval($data['page']) : 1;
		$list = 5;
		//用户订单
		$uid = $this->Session->read('User.uid');

		$w_rt[] = "tb1.shop_id = '$uid'";

		if(!empty($dt)){
			$ts = mktime()-$dt;
			$w_rt[] = "tb1.add_time > '$ts'";	
		}
		
		if(!empty($status)){
			   $st = $this->action('suppliers','select_statue',$status);
               !empty($st)? $w_rt[] = $st : "";
		}
		if(!empty($keyword)){
			$w_rt[] = "(tb2.goods_name LIKE '%".$keyword."%' OR tb1.order_sn LIKE '%".$keyword."%')";
		}
	
		$tt = $this->__order_list_count($w_rt); //获取商品的数量
		$rt['order_count'] = $tt;
		
		$rt['orderpage'] = Import::basic()->ajax_page($tt,$list,$page,'get_store_page_list',array($status));

		$rt['orderlist'] = $this->__order_list($w_rt,$page,$list);
		$rt['status'] = $status;
		$rt['keyword'] = $keyword;
		$rt['time'] = $dt;
		
		$this->set('rt',$rt);
		$con = $this->fetch('ajax_other_orderlist',true);
		die($con);
	}
	###########################
	//用户订单列表
	function __order_list($w_rt=array(),$page=1,$list=5){
		if(is_array($w_rt)){
			if(!empty($w_rt)){
				$w = " WHERE ".implode(' AND ',$w_rt);
			}
		}else{
			$w = " WHERE ".$w_rt;
		}
		if(!$page) $page=1;
		$start = ($page-1)*$list;
		$sql = "SELECT tb1.order_id, tb1.order_sn, tb3.order_status, tb3.shipping_status,tb3.pay_status,tb3.is_print_shop,tb3.suppliers_id, tb1.shipping_name ,tb1.pay_name, tb1.add_time,tb1.consignee,u.user_name, (tb1.goods_amount + tb1.shipping_fee) AS total_fee FROM `{$this->App->prefix()}goods_order_info` AS tb1";
		$sql .=" LEFT JOIN `{$this->App->prefix()}goods_order_status` AS tb3 ON tb3.order_id=tb1.order_id";
		$sql .=" LEFT JOIN `{$this->App->prefix()}goods_order` AS tb2 ON tb2.order_id=tb1.order_id";
		$sql .=" LEFT JOIN `{$this->App->prefix()}user` AS u ON u.user_id=tb1.shop_id"; //便利店
		$sql .=" $w GROUP BY tb3.oid,tb3.suppliers_id ORDER BY tb1.add_time DESC LIMIT $start,$list";
		//echo $sql;
		 $orderlist = $this->App->find($sql);//print_r($orderlist);
		 if(!empty($orderlist)){
			 foreach($orderlist as $k=>$row){
			 	$rt[$row['order_sn']][$k] = $row;
				$rt[$row['order_sn']][$k]['status'] = $this->action('suppliers','get_status',$row['order_status'],$row['pay_status'],$row['shipping_status']);
				$rt[$row['order_sn']][$k]['op'] = $this->get_store_order_option($row['order_id'],$row['order_status'],$row['pay_status'],$row['shipping_status'],$row['suppliers_id']);
				$sql= "SELECT goods_id,goods_name,goods_bianhao,market_price,goods_price,goods_thumb,is_gift FROM `{$this->App->prefix()}goods_order` WHERE order_id='$row[order_id]' AND suppliers_id='$row[suppliers_id]' ORDER BY rec_id DESC";
				$rt[$row['order_sn']][$k]['goods'] = $this->App->find($sql);
			 }
		 }
		 unset($orderlist);
		 return $rt;
	}
	
	function __order_list_count($w_rt=array()){
		if(is_array($w_rt)){
			if(!empty($w_rt)){
				$w = " WHERE ".implode(' AND ',$w_rt);
			}
		}else{
			$w = " WHERE ".$w_rt;
		}
		$sql = "SELECT COUNT(distinct tb1.order_id) FROM `{$this->App->prefix()}goods_order_info` AS tb1";
		$sql .=" LEFT JOIN `{$this->App->prefix()}goods_order` AS tb2 ON tb1.order_id=tb2.order_id ".$w;
		return $this->App->findvar($sql);
	}
	

	/***************  look 添加  开始 ******************************************/
	//配送店 产品总销量
	function product_goods_order(){
			$this->title("欢迎进入用户后台管理中心".' - 产品总销量 - '.$GLOBALS['LANG']['site_name']);
			$this->css('calendar.css');
			$this->js(array('time/calendar.js','time/calendar-setup.js','time/calendar-zh.js'));
			$uid = $this->check_is_login();
             //排序
            $orderby = "";
            if(isset($_GET['desc'])){
                      $orderby = ' ORDER BY '.$_GET['desc'].' DESC';
            }else if(isset($_GET['asc'])){
                      $orderby = ' ORDER BY '.$_GET['asc'].' ASC';
            }else {
                      $orderby = ' ORDER BY `order_id` DESC';
            }
            //分页
            $page= isset($_GET['page']) ? $_GET['page'] : '';
            if(empty($page)){
                   $page = 1;
            }

			// 查询供应商
			$sql = "SELECT distinct tb1.user_name,tb1.user_id,tb1.nickname FROM `{$this->App->prefix()}user` AS tb1  WHERE tb1.user_rank='10' ORDER BY tb1.user_id";
		    $this->set('uidlist',$this->App->find($sql));
		
			
			
			//查询配送店(产品总销量点击查询 配送店 时下方显示)
			/*$sql = "SELECT distinct tb1.user_name,tb1.user_id,tb1.home_phone,tb1.mobile_phone,tb2.consignee,tb2.address,tb3.region_name AS province,tb4.region_name AS city,tb5.region_name AS district,tb6.region_name AS town,tb7.region_name AS village  FROM `{$this->App->prefix()}user` As tb1  ";
			$sql .= " LEFT JOIN `{$this->App->prefix()}user_address` AS tb2 ON tb2.user_id = tb1.user_id ";
			$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb3 ON tb3.region_id = tb2.province";
			$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb4 ON tb4.region_id = tb2.city";
			$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb5 ON tb5.region_id = tb2.district";
			$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb6 ON tb6.region_id = tb2.town";
			$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb7 ON tb7.region_id = tb2.village";
			$sql .= " WHERE tb1.user_id = $_GET[psid] ORDER BY tb1.user_id ";
			
			$this->set('shoplist',$this->App->findrow($sql));
			*/
           
			$comd = array();
            if(isset($_GET['status'])&&!empty($_GET['status'])){
                    $st = $this->pro_select_statue($_GET['status']);
                    !empty($st)? $comd[] = $st : "";
            }
			
			if(isset($_GET['date1'])&&!empty($_GET['date1']) && isset($_GET['date2'])&&!empty($_GET['date2'])){
					$t1 = strtotime($_GET['date1'].' '.$_GET['t1'].':00:00');
					$t2 = strtotime($_GET['date2'].' '.$_GET['t2'].':59:59');
					$comd[] = "goi.add_time BETWEEN '$t1' AND '$t2'";
			}else{
					$t1 = strtotime(date('Y-m-d').' 00:00:01');
					$t2 = strtotime(date('Y-m-d').' 23:59:59');
					$comd[] = "goi.add_time BETWEEN '$t1' AND '$t2'";
			}
				
			if(isset($_GET['consignee'])&&!empty($_GET['consignee'])) $comd[] = "goi.consignee LIKE '%".trim($_GET['consignee'])."%'";
                   
			//订单号
            if(isset($_GET['order_sn'])&&!empty($_GET['order_sn'])) $comd[] = "goi.order_sn LIKE '%".trim($_GET['order_sn'])."%'";
                   
            //供应商	
			$comd[] = " goi.shipping_id = '6' ";	//统一查询自提的订单
			if(isset($_GET['psid'])&&!empty($_GET['psid'])&&$_GET['psid']!='-1'){
					$comd[] = "gos.suppliers_id='$_GET[psid]'";
					$comd[] = "sg.suppliers_id='$_GET[psid]'";
			}
			
			//配送店ID
			$comd[] = "goi.shop_id='$uid'";
			
            $w = ""; 
            if(!empty($comd)){
                $w = ' WHERE '.@implode(' AND ',$comd);
            }

			$list = 15;
            $start = ($page-1)*$list;
			
			//开始查询 订购各个商品的总数	
			$sql = "SELECT goi.order_sn,go.goods_bianhao,go.goods_name,go.goods_unit, go.goods_id,go.market_price,go.goods_price,SUM(go.goods_number) as numb,goi.add_time,gos.is_print  FROM `{$this->App->prefix()}goods_order` AS go";
			$sql .= " LEFT JOIN `{$this->App->prefix()}suppliers_goods` AS sg ON sg.goods_id = go.goods_id";
			$sql .= " LEFT JOIN `{$this->App->prefix()}goods_order_info` AS goi ON goi.order_id = go.order_id";
			$sql .= " LEFT JOIN `{$this->App->prefix()}goods_order_status` AS gos ON gos.order_id = go.order_id AND gos.suppliers_id = sg.suppliers_id";
			
			//$sql .= " LEFT JOIN `{$this->App->prefix()}user` AS u ON u.user_id = goi.shop_id"; //便利店
			//$sql .= " LEFT JOIN `{$this->App->prefix()}user` AS uu ON uu.user_id = gos.suppliers_id"; //供应商
			$sql .= " $w GROUP BY go.goods_sn order by gos.order_id DESC LIMIT $start,$list";
			$orderlist = $this->App->find($sql);
			
			$sql = "SELECT go.goods_id FROM `{$this->App->prefix()}goods_order` AS go";
			$sql .= " LEFT JOIN `{$this->App->prefix()}suppliers_goods` AS sg ON sg.goods_id = go.goods_id";
			$sql .= " LEFT JOIN `{$this->App->prefix()}goods_order_info` AS goi ON goi.order_id = go.order_id";
			$sql .= " LEFT JOIN `{$this->App->prefix()}goods_order_status` AS gos ON gos.order_id = go.order_id AND gos.suppliers_id = sg.suppliers_id";
			//$sql .= " LEFT JOIN `{$this->App->prefix()}user` AS u ON u.user_id = goi.shop_id";
			//$sql .= " LEFT JOIN `{$this->App->prefix()}user` AS uu ON uu.user_id = gos.suppliers_id";
			$sql .= " $w GROUP BY go.goods_sn";
			$ts = $this->App->findcol($sql);
			$tt = count($ts);
            $pagelink = Import::basic()->getpage($tt, $list, $page,'?page=',true);
            $this->set("pagelink",$pagelink);
			
            $this->set('orderlist',$orderlist);
	
		//	$this->template('product_goods_order');
			//选择模板
		
		$rank = $this->Session->read('User.rank');
	
		if($rank == 10 ){ //供应商
            $ty = isset($_GET['tt'])&&!empty($_GET['tt']) ? trim($_GET['tt']) : "";
			switch($ty){
				case 'delivery': //发货单列表
					$this->template('goods_order_delivery_list');
					break;
				case 'back': //退货单列表
					$this->template('goods_order_back_list');
					break;
				default:
					$this->template('product_goods_order');
					break;
			}
		
		}else{
			$ty = isset($_GET['tt'])&&!empty($_GET['tt']) ? trim($_GET['tt']) : "";
			switch($ty){
				case 'delivery': //发货单列表
					$this->template('goods_order_delivery_list');
					break;
				case 'back': //退货单列表
					$this->template('goods_order_back_list');
					break;
				default:
					$this->template('ps_goods_order');
					break;
			}
			
		}
		
	}
	
	
	 function pro_select_statue($id=""){
            if(empty($id)) return "";
            switch ($id){
                case '-1':
                    return "";
                    break;
                case '11':
                    return "order_status='0'";
                    break;
                case '200':
                    return "order_status='2' AND shipping_status='0' AND pay_status='0'";
                    break;
                case '210':
                    return "order_status='2' AND shipping_status='0' AND pay_status='1'";
                    break;
                case '214':
                    return "order_status='2' AND shipping_status='4' AND pay_status='1'";
                    break;
                case '1':
                    return "order_status='1'";
                    break;
                case '4':
                    return "order_status='4'";
                    break;
                case '3':
                    return "order_status='3'";
                    break;
                case '2':
                    return "pay_status='2'";
                    break;
				case '222': //已发货
					return "shipping_status='2'";
					break;
                default :
                    return "";
                    break;
            }
        }
	
	
	 //选择订单的所在状态
     function select_statue($id=""){
            if(empty($id)) return "";
            switch ($id){
                case '-1':
                    return "";
                    break;
                case '11':
                    return "tb1.order_status='0'";
                    break;
                case '200':
                    return "tb1.order_status='2' AND tb1.shipping_status='0' AND tb1.pay_status='0'";
                    break;
                case '210':
                    return "tb1.order_status='2' AND tb1.shipping_status='0' AND tb1.pay_status='1'";
                    break;
                case '214':
                    return "tb1.order_status='2' AND tb1.shipping_status='4' AND tb1.pay_status='1'";
                    break;
                case '1':
                    return "tb1.order_status='1'";
                    break;
                case '4':
                    return "tb1.order_status='4'";
                    break;
                case '3':
                    return "tb1.order_status='3'";
                    break;
                case '2':
                    return "tb1.pay_status='2'";
                    break;
				case '222': //已发货
					return "tb1.shipping_status='2'";
					break;
                default :
                    return "";
                    break;
            }
      }
	##############################

	function error_jump(){
		$this->action('common','show404tpl');
	}
	
	//配送店的订单列表
	function other_orderlist(){
		$this->title("欢迎进入用户后台管理中心".' - 我的订单 - '.$GLOBALS['LANG']['site_name']);
		$dt = isset($_GET['dt'])&&intval($_GET['dt'])>0 ?  intval($_GET['dt']) : "";
		$status = isset($_GET['status']) ?  trim($_GET['status']) : "";
		$keyword = isset($_GET['kk']) ?  trim($_GET['kk']) : "";
		$uid = $this->check_is_login();;
		//$rank = $this->Session->read('User.rank');
		if(empty($uid)){ $this->jump(SITE_URL.'user.php?act=login',0,'请先登录！'); exit;}

		//客户订单
		$w_rt[] = "tb1.shop_id = '$uid'";	
		
		if(!empty($dt)){
			$w_rt[] = "tb1.add_time < '$dt'";	
		}
		
		if(!empty($status)){
			   $st = $this->action('suppliers','select_statue',$status);
               !empty($st)? $w_rt[] = $st : "";
		}
		if(!empty($keyword)){
			$w_rt[] = "(tb2.goods_name LIKE '%".$keyword."%' OR tb1.order_sn LIKE '%".$keyword."%')";
		}
		
		$page = 1;
		$list = 5;
		$tt = $this->__order_list_count($w_rt); //获取商品的数量
		$rt['order_count'] = $tt;
		
		$rt['orderpage'] = Import::basic()->ajax_page($tt,$list,$page,'get_store_page_list',array($status));

		$rt['orderlist'] = $this->__order_list($w_rt,$page,$list);
		$rt['status'] = $status;
		
		$sql = "SELECT COUNT(distinct order_id) FROM `{$this->App->prefix()}goods_order_info` WHERE user_id='$uid' AND order_status='2'";
		$rt['userinfo']['success_ordercount'] = $this->App->findvar($sql); //成功订单
	
		$sql = "SELECT COUNT(distinct order_id) FROM `{$this->App->prefix()}goods_order_info` WHERE user_id='$uid' AND pay_status='0'";
		$rt['userinfo']['pay_ordercount'] = $this->App->findvar($sql); //待支付订单
		
		$sql = "SELECT COUNT(distinct order_id) FROM `{$this->App->prefix()}goods_order_info` WHERE user_id='$uid' AND shipping_status='2'";
		$rt['userinfo']['shopping_ordercount'] = $this->App->findvar($sql); //待发货订单
		
		$sql = "SELECT COUNT(distinct order_id) FROM `{$this->App->prefix()}goods_order_info` WHERE user_id='$uid'";
		$rt['userinfo']['all_ordercount'] = $this->App->findvar($sql); //所有订单
		
		$sql = "SELECT COUNT(distinct order_id) FROM `{$this->App->prefix()}goods_order_info` WHERE user_id='$uid' AND (tb6.shipping_status='2' OR tb6.pay_status='0' OR tb6.order_status='0')";
		$rt['userinfo']['daichuli_ordercount'] = $this->App->findvar($sql); //待处理订单
		
		$sql = "SELECT COUNT(distinct order_id) FROM `{$this->App->prefix()}goods_order_info` WHERE user_id='$uid' AND shipping_status='5'";
		$rt['userinfo']['haicheng_ordercount'] = $this->App->findvar($sql); //已完成订单
		
		$sql = "SELECT COUNT(distinct order_id) FROM `{$this->App->prefix()}goods_order_info` WHERE user_id='$uid' AND order_status='1'";
		$rt['userinfo']['quxiao_ordercount'] = $this->App->findvar($sql); //已取消订单
		
		$sql = "SELECT COUNT(distinct order_id) FROM `{$this->App->prefix()}goods_order_info` WHERE user_id='$uid' AND shipping_status='2'";
		$rt['userinfo']['yifahuo_ordercount'] = $this->App->findvar($sql); //已发货
		
		
		
		$sql = "SELECT COUNT(og.goods_id) FROM `{$this->App->prefix()}order_goods` AS og";
		$sql .=" LEFT JOIN `{$this->App->prefix()}order_goods` AS oi ON og.order_id = oi.order_id";
		$sql .=" WHERE oi.shipping_status='5' AND oi.user_id='$uid' AND og.goods_id NOT IN(SELECT id_value FROM `{$this->App->prefix()}comment` WHERE user_id='$uid')";
		$rt['userinfo']['need_comment_count'] = $this->App->findvar($sql);
		//print_r($rt);
				
		$this->set('rt',$rt);
		
		$this->template('other_orderlist');
		
	}

	//客户的退换货订单
	function store_returnordergoods(){
		$this->title("欢迎进入用户后台管理中心".' - 客户的退换货订单 - '.$GLOBALS['LANG']['site_name']);
		$this->css('calendar.css');
		$this->js(array('time/calendar.js','time/calendar-setup.js','time/calendar-zh.js'));
		$uid = $this->check_is_login();
		$status = isset($_GET['status']) ?  trim($_GET['status']) : "";
		$keyword = isset($_GET['kk']) ?  trim($_GET['kk']) : "";

		//客户订单
		$w_rt[] = "tb1.shop_id = '$uid'";	
		$w_rt[] = "tb2.status > 0";	
		$w_rt[] = "tb3.shipping_status > 0";
		
		if(isset($_GET['date1'])&&!empty($_GET['date1']) && isset($_GET['date2'])&&!empty($_GET['date2'])){
				$t1 = strtotime($_GET['date1'].' '.$_GET['t1'].':00:00');
				$t2 = strtotime($_GET['date2'].' '.$_GET['t2'].':59:59');
				$w_rt[] = "tb1.add_time BETWEEN '$t1' AND '$t2'";
		}else{
				$t1 = strtotime(date('Y-m-d').' 00:00:01');
				$t2 = strtotime(date('Y-m-d').' 23:59:59');
				$w_rt[] = "tb1.add_time BETWEEN '$t1' AND '$t2'";
		}
			
		if(!empty($status)){
			   $st = $this->action('suppliers','select_statue',$status);
               !empty($st)? $w_rt[] = $st : "";
		}
		if(!empty($keyword)){
			$w_rt[] = "(tb2.goods_name LIKE '%".$keyword."%' OR tb1.order_sn LIKE '%".$keyword."%')";
		}
		
		if(is_array($w_rt)){
			if(!empty($w_rt)){
				$w = " WHERE ".implode(' AND ',$w_rt);
			}
		}else{
			$w = " WHERE ".$w_rt;
		}
		$list = 10;
		if(!$page) $page=1;
		$start = ($page-1)*$list;
		$sql = "SELECT tb1.order_id, tb1.order_sn, tb3.order_status, tb3.shipping_status,tb3.pay_status,tb3.is_print_shop,tb3.suppliers_id, tb1.shipping_name ,tb1.pay_name, tb1.add_time,tb1.consignee,u.user_name, (tb1.goods_amount + tb1.shipping_fee) AS total_fee FROM `{$this->App->prefix()}goods_order_info` AS tb1";
		$sql .=" LEFT JOIN `{$this->App->prefix()}goods_order_status` AS tb3 ON tb3.order_id=tb1.order_id";
		$sql .=" LEFT JOIN `{$this->App->prefix()}goods_order` AS tb2 ON tb2.order_id=tb1.order_id";
		$sql .=" LEFT JOIN `{$this->App->prefix()}user` AS u ON u.user_id=tb1.shop_id"; //便利店
		$sql .=" $w GROUP BY tb3.oid,tb3.suppliers_id ORDER BY tb1.add_time DESC LIMIT $start,$list";
		//echo $sql;
		 $orderlist = $this->App->find($sql);//print_r($orderlist);
		 if(!empty($orderlist)){
			 foreach($orderlist as $k=>$row){
			 	$rt[$row['order_sn']][$k] = $row;
				$rt[$row['order_sn']][$k]['status'] = $this->action('suppliers','get_status',$row['order_status'],$row['pay_status'],$row['shipping_status']);
				$rt[$row['order_sn']][$k]['op'] = $this->get_store_order_option($row['order_id'],$row['order_status'],$row['pay_status'],$row['shipping_status'],$row['suppliers_id']);
				$sql= "SELECT goods_id,goods_name,goods_bianhao,market_price,goods_price,goods_thumb,is_gift,status FROM `{$this->App->prefix()}goods_order` WHERE order_id='$row[order_id]' AND suppliers_id='$row[suppliers_id]' AND status > 0 ORDER BY rec_id DESC";
				$rt[$row['order_sn']][$k]['goods'] = $this->App->find($sql);
			 }
		 }
		 unset($orderlist);
		 //print_r($rt);
		$tt = $this->__order_list_count($w_rt); //获取商品的数量
		
		$this->set('rt',$rt);
		$this->template('store_returnordergoods');
	}
	
	//用户订单操作
	function ajax_order_op_store($id=0,$op=""){
   		if(empty($id) || empty($op)) die("传送ID为空！");
		$ids = explode('-',$id);
		$order_id = isset($ids[0]) ? $ids[0] : 0;
		$suppliers_id = isset($ids[1]) ? $ids[1] : 0;
		if($order_id>0 && $suppliers_id>0){
			if($op=="cancel_order"){ //数量增加，返回原来值,
				$this->App->update('goods_order_status',array('order_status'=>'1'),array("suppliers_id='$suppliers_id'","order_id='$order_id'"));
			}else if($op=="confirm"){//确认收货
				$this->App->update('goods_order_status',array('shipping_status'=>'3','pay_status'=>'1'),array("suppliers_id='$suppliers_id'","order_id='$order_id'"));
			}
		}
    }
   
   //获取订单操作按钮
   function get_store_order_option($sn=0,$oid=0,$pid=0,$sid=0,$suppliers_id=0){
		if(empty($sn)) return "";
		$str = '';
		switch($sid){
			case '1':
				return $str = '<a href="javascript:;" name="confirm" id="'.$sn.'-'.$suppliers_id.'" class="oporder"><font color="red">确认收货</font></a>';
				break;
			case '3':
				return $str = '<font color="red">已完成</font>';
				break;
		}
		
		switch($oid){
			case '0':
				$str = '<a href="javascript:;" name="cancel_order" id="'.$sn.'-'.$suppliers_id.'" class="oporder"><font color="red">取消订单</font></a>';
				//$str = '<font color="red">新下单</font>';
				break;
			case '1':
				$str = '<font color="red">已取消</font>';
				break;
			case '2':
				$str = '<font color="red">已退货</font>';
				break;
			case '3':
				$str = '<font color="red">无效订单</font>';
				break;
		}
	 
		return $str;
  }
  
  //我的信箱
  function mymes(){
  		$this->title("欢迎进入用户后台管理中心".' - 我的信箱 - '.$GLOBALS['LANG']['site_name']);
		$uid = $this->check_is_login();
		//if(empty($uid)){ $this->jump(SITE_URL.'user.php?act=login',0,'请先登录！'); exit;}
		//删除
		if(isset($_GET['op'])&&$_GET['op']=='del'&&isset($_GET['id'])&&intval($_GET['id'])>0){
			$this->App->delete('user_message','mes_id',intval($_GET['id']));
			$url = $this->getthisurl();
			$this->jump(str_replace('&op=del&id='.$_GET['id'],'',$url),0);exit;
		}
  		$page = (isset($_GET['page'])&&$_GET['page']>0) ? intval($_GET['page']) : 1;
		$list = 10;
		$start = ($page-1)*$list;
		$tt = $this->App->findvar("SELECT COUNT(mes_id) FROM `{$this->App->prefix()}user_message` WHERE uid = '$uid'");
		$rt['pagelink'] = Import::basic()->getpage($tt, $list, $page,'?page=',true);

		
		$sql = "SELECT tb1.*,tb2.user_name,tb3.adminname FROM `{$this->App->prefix()}user_message` AS tb1 LEFT JOIN `{$this->App->prefix()}user` AS tb2 ON tb1.uid=tb2.user_id LEFT JOIN `{$this->App->prefix()}admin` AS tb3 ON tb1.adminid=tb3.adminid WHERE tb1.uid = '$uid' ORDER BY mes_id DESC LIMIT $start,$list";
		$rt['meslist'] = $this->App->find($sql);
		
		//商品分类列表		
		//$rt['menu'] = $this->action('catalog','get_goods_cate_tree');
		$this->set("rt",$rt);
  		$this->template('user_mail');
  }
  
  function mymes_info($data=array()){
  		$this->title("欢迎进入用户后台管理中心".' - 我的信箱详情 - '.$GLOBALS['LANG']['site_name']);
		$uid = $this->check_is_login();
		//if(empty($uid)){ $this->jump(SITE_URL.'user.php?act=login',0,'请先登录！'); exit;}
		
  		$id = isset($data['id']) ? intval($data['id']) : 0;
  		if(!($id>0)){ $this->jump(SITE_URL.'user.php?act=mymes',0); exit;}
		
		$sql = "SELECT tb1.*,tb2.user_name,tb3.adminname FROM `{$this->App->prefix()}user_message` AS tb1 LEFT JOIN `{$this->App->prefix()}user` AS tb2 ON tb1.uid=tb2.user_id LEFT JOIN `{$this->App->prefix()}admin` AS tb3 ON tb1.adminid=tb3.adminid WHERE tb1.mes_id='$id' AND tb1.uid = '$uid'";
		$rt = $this->App->findrow($sql);
		
		//商品分类列表		
		//$rt['menu'] = $this->action('catalog','get_goods_cate_tree');
		$this->set('rt',$rt);
		$this->template('user_mail_info');
  }
  
  	function check_is_login(){
		$uid = $this->Session->read('User.uid');
		$rank = $this->Session->read('User.rank');
		if(empty($uid)){ $this->jump(SITE_URL.'user.php?act=login',0,'请先登录！'); exit;}
		if($rank!='12'){
			$this->action('common','show404tpl');
		}
		return $uid;
	}
	
	//退换货
	function ajax_return_goods($data=array()){
		$status = $data['status'];
		$oid = $data['oid'];
		$gid = $data['gid'];
		$remark = $data['remark'];
		$this->App->update('goods_order',array('status'=>$status,'remark'=>$remark,'addtime'=>mktime()),array("order_id='{$oid}'","goods_id='{$gid}'"));

	}
	function return_status($oid=0,$gid=0){
		return $this->App->findrow("SELECT status,remark,addtime FROM `{$this->App->prefix()}goods_order` WHERE order_id='$oid' AND goods_id='$gid'");
	}
}
?>