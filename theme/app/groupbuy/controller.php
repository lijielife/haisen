<?php
/*
团购管理模块
*/
class GroupbuyController extends Controller{
 	function  __construct() {
		$this->js(array('jquery.json-1.3.js','jquery.cookie.js','common.js','goods.js','jquery_dialog.js'));//将js文件放到页面头
		$this->css(array('jquery_dialog.css','style_con.css'));
	}
	
	function index($page=1,$type=""){
		$rt = $this->Cache->read(3600);
	 	if(is_null($rt)) {
			$list = 12;
			if(!($page>0)) $page = 1;
			$start = ($page-1)*$list;
			
			$sql = "SELECT COUNT(tb1.group_id) FROM `{$this->App->prefix()}goods_groupbuy` AS tb1 LEFT JOIN `{$this->App->prefix()}goods` AS tb2 ON tb1.goods_id=tb2.goods_id WHERE tb1.active='1' AND tb2.is_on_sale='1' AND tb2.is_delete='0'";
			$tt = $this->App->findvar($sql);
			
			$sql = "SELECT tb1.group_id,tb1.start_time,tb1.end_time,tb1.points,tb1.price,tb1.group_name,tb1.goods_id,tb1.desc,tb2.goods_name,tb2.goods_desc,tb2.market_price,tb2.shop_price,tb2.meta_keys,tb2.meta_desc,tb2.sale_count,tb2.goods_thumb,tb2.goods_img FROM `{$this->App->prefix()}goods_groupbuy` AS tb1 LEFT JOIN `{$this->App->prefix()}goods` AS tb2 ON tb1.goods_id=tb2.goods_id WHERE tb1.active='1' AND tb2.is_on_sale='1' AND tb2.is_delete='0' ORDER BY tb1.group_id DESC LIMIT $start,$list";
			$rt['grouplist'] = $this->App->find($sql);
			
			$rt['grouppage'] = Import::basic()->ajax_page($tt,$list,$page,'get_groupbuy_page_list');
			
			$this->Cache->write($rt);
		}
		
		$this->set('rt',$rt);
		if($type=='ajax'){
			echo  $this->fetch('ajax_groupbuy',true);
			exit;
		}
		
		$title = "团购专区-促销团购专区-机会不要错过哦";
		$this->title($title.' - '.$GLOBALS['LANG']['site_name']);
		$this->meta("title",$title);
		$this->meta("keywords",$title);
		$this->meta("description",$title);
		$this->template('groupbuy_index');
	}
	
	function detail($gid=0){
		$this->css('163css.css');
		$this->js(array('163css.base.js','163css.lib.js','163css.js','time.js'));
		$rt = $this->Cache->read(3600);
	 	if(is_null($rt)) {
			$rt = array();
			//商品详情信息
			
			$sql = "SELECT tb1.*,tb2.goods_name,tb2.goods_desc,tb2.market_price,tb2.shop_price,tb2.meta_keys,tb2.meta_desc,tb2.sale_count,tb2.goods_thumb,tb2.goods_img,tb2.original_img,tb2.goods_bianhao FROM `{$this->App->prefix()}goods_groupbuy` AS tb1";
			$sql .=" LEFT JOIN `{$this->App->prefix()}goods` AS tb2 ON tb1.goods_id = tb2.goods_id";
			$sql .=" WHERE tb1.group_id = '$gid' LIMIT 1";
			$rt['groupinfo'] = $this->App->findrow($sql);
			
			if(empty($rt['groupinfo'])){
				$this->action('common','show404tpl');
			}
			
			$goods_id = $rt['groupinfo']['goods_id'];
			//商品的相册
			$sql = "SELECT * FROM `{$this->App->prefix()}goods_gallery` WHERE goods_id='{$goods_id}'";
			$gallery = $this->App->find($sql);
			$rt['gallery'][0]['goods_thumb'] = SITE_URL.$rt['groupinfo']['goods_thumb'];
			$rt['gallery'][0]['goods_img'] = SITE_URL.$rt['groupinfo']['goods_img'];
			$rt['gallery'][0]['original_img'] = SITE_URL.$rt['groupinfo']['original_img'];
			$rt['gallery'][0]['img_desc'] = $rt['groupinfo']['goods_name'];
			
			if(!empty($gallery)){
				foreach($gallery as $k=>$row){
					$k++;
					if(empty($row['img_url'])) continue;
					$q = dirname($row['img_url']);
					$h = basename($row['img_url']);
					$rt['gallery'][$k]['goods_thumb'] = SITE_URL.$q.'/thumb_s/'.$h;
					$rt['gallery'][$k]['goods_img'] = SITE_URL.$q.'/thumb_b/'.$h;
					$rt['gallery'][$k]['original_img'] = SITE_URL.$row['img_url'];
					$rt['gallery'][$k]['img_desc'] = $row['img_desc'];
				}
				unset($row,$gallery);
			}
			
			
			//当前商品的属性
			$sql = "SELECT tb1.*,tb2.* FROM `{$this->App->prefix()}goods_attr` AS tb1";
			$sql .=" LEFT JOIN `{$this->App->prefix()}attribute` AS tb2 ON tb1.attr_id = tb2.attr_id";
			$sql .=" WHERE tb1.goods_id='{$goods_id}'";
			$spec = $this->App->find($sql);
			$rt['spec'] = array();
			if(!empty($spec)){
				foreach($spec as $k=>$row){
					$rt['spec'][$row['attr_id']][] = $row;
				}
                unset($row,$spec);
			}
			
			//评价等级
			$sql = "SELECT COUNT(comment_id) AS rankcount,comment_rank FROM `{$this->App->prefix()}comment` WHERE id_value='$goods_id' AND status ='1' GROUP BY comment_rank";
			$rank_count = $this->App->find($sql);
			if(!empty($rank_count)){
				foreach($rank_count as $row){
					$rt['rank_count'][$row['comment_rank']] = $row['rankcount'];
					$rt['rank_count']['zcount'] += $row['rankcount'];
				}
				unset($rank_count);
			}
			
			$sql = "SELECT ROUND(AVG(goods_rand)) AS avg_goods_rand, ROUND(AVG(shopping_rand)) AS avg_shopping_rand ,ROUND(AVG(saleafter_rand)) AS avg_saleafter_rand  FROM `{$this->App->prefix()}comment` WHERE id_value='$goods_id' AND status ='1'";
			$rt['avg_rank'] = $this->App->findrow($sql);
			
						 
			//当前位置
			$rt['hear'] = array();
			$hear[] = '<a href="'.SITE_URL.'index.php">首页</a>';
			$hear[] = '<a href="'.get_url('',0,SITE_URL.'groupbuy.php','groupbuy',array('groupbuy','index')).'">团购中心</a>';
			
			$hear[] = '<a href="'.get_url($rt['groupinfo']['group_name'],$rt['groupinfo']['group_id'],SITE_URL.'groupbuy.php?id='.$rt['groupinfo']['goods_id'],'goods',array('groupbuy','detail',$row['group_id'])).'">'.$rt['groupinfo']['group_name'].'</a>';
			$rt['hear'] = implode('&nbsp;&gt;&nbsp;',$hear);
			unset($hear);
			
			//商品评论
			 $list = 2;
			 $page = 1;
			 $start = ($page-1)*$list;
			 $tt = $this->action('product','get_comment_count',$rt['groupinfo']['goods_id']);
			 $rt['comment_count'] = $tt;
			 $rt['commentpage'] = Import::basic()->ajax_page($tt,$list,$page,'get_comment_page',array($rt['groupinfo']['goods_id']));
			 $rt['commentlist'] = $this->action('product','get_comment_list',$rt['groupinfo']['goods_id'],$start,$list);
			 
			$this->Cache->write($rt);
		}
		$title = htmlspecialchars($rt['groupinfo']['group_name']);
		$this->title($title.' - '.$GLOBALS['LANG']['site_name']);
		$this->meta("title",$title);
		$this->meta("keywords",htmlspecialchars($rt['groupinfo']['meta_keys']));
		$this->meta("description",htmlspecialchars($rt['groupinfo']['meta_desc']));
		
		$this->set('rt',$rt);
		$this->template('groupbuy_detail');
	}
	
	
	function shopping($id=0){
		$uid = $this->Session->read('User.uid');
		if(empty($uid)){ $this->jump(SITE_URL.'user.php?act=login',0,'请先登录！'); exit;}
		if(!($id>0)){
				$this->action('common','show404tpl');
		}
		$sql = "SELECT tb1.*,tb2.goods_name,tb2.goods_desc,tb2.market_price,tb2.shop_price,tb2.meta_keys,tb2.meta_desc,tb2.sale_count,tb2.goods_thumb,tb2.goods_img,tb2.original_img,tb2.goods_bianhao,tb2.goods_qingdan FROM `{$this->App->prefix()}goods_groupbuy` AS tb1";
		$sql .=" LEFT JOIN `{$this->App->prefix()}goods` AS tb2 ON tb1.goods_id = tb2.goods_id";
		$sql .=" WHERE tb1.group_id = '$id' LIMIT 1";
		$rt['groupinfo'] = $this->App->findrow($sql);
		
		if(empty($rt['groupinfo'])){
				$this->action('common','show404tpl');
		}	
		
		$rt['province'] = $this->action('user','get_regions',1);  //获取省列表
		
		//当前用户的收货地址
		$sql = "SELECT * FROM `{$this->App->prefix()}user_address` WHERE user_id='$uid' AND is_own='0'";
		$rt['userress'] = $this->App->find($sql);
		if(!empty($rt['userress'])){
			foreach($rt['userress'] as $row){
				$rt['city'][$row['address_id']] = $this->action('user','get_regions',2,$row['province']);  //城市
				$rt['district'][$row['address_id']] = $this->action('user','get_regions',3,$row['city']);  //区
			}
		}
		
		$sql = "SELECT * FROM `{$this->App->prefix()}payment`";
		$rt['paymentlist'] = $this->App->find($sql);
		
		//配送方式
		$sql = "SELECT * FROM `{$this->App->prefix()}shipping`";
		$rt['shippinglist'] = $this->App->find($sql);

        $this->title('团购订单确认 - '.$GLOBALS['LANG']['site_name']);
		$this->set('rt',$rt);
		$this->template('groupbuy_cart');
	}
	
	function _return_goods_price($data=array()){
		$goods_id = intval($data['gid']);
		$number = intval($data['number']); //输入的
					
		$sql = "SELECT tb2.*,tb1.price AS gprice FROM `{$this->App->prefix()}goods_groupbuy` AS tb1";
		$sql .=" LEFT JOIN `{$this->App->prefix()}goods_groupbuy_price` AS tb2 ON tb1.group_id = tb2.group_id";
		$sql .= " WHERE tb1.group_id = '$goods_id' ORDER BY tb2.number ASC,tb2.price DESC";
		$rt = $this->App->find($sql);
		$thisprice = 0;
		$count = count($rt);
		if(!empty($rt))foreach($rt as $k=>$row){
			if($k==0 && $count==2){
				$k1=$row['number'];
				$k2 = $rt[$k+1]['number'];
				if($number>=$k1 && $number <= $k2){
					$thisprice = $row['price'];
					break;
				}
			}elseif($k==0 && $count>1){
				$k1=$row['number'];
				$k2 = $rt[$k+1]['number'];
				if($number>=$k1 && $number < $k2){
					$thisprice = $row['price'];
					break;
				}
			}elseif($k==0 && $count==1 ){
				$k1=0;
				$k2 = $row['number'];
				
				if($number>$k1 && $number >= $k2){
					$thisprice = $row['price'];
					break;
				}
			}elseif($count==($k+1)){
				$k1 = $row['number'];
				$k2 = 10000000;
				if($number>$k1 && $number < $k2){
					$thisprice = $row['price'];
					break;
				}
			}else{
				$k1=$row['number'];
				$k2 = $rt[$k+1]['number'];
				if($number>=$k1 && $number <= $k2){
					$thisprice = $row['price'];
					break;
				}
			}
		}
		return $thisprice;
	}
	
	//团购下单
	function checkout($id=0){
		$uid = $this->Session->read('User.uid');
		if(empty($uid)){ $this->jump(SITE_URL.'user.php?act=login',0,'请先登录！'); exit;}
		if(!($id>0)){
				 $this->jump(SITE_URL.'groupbuy.php',0,'意外出错！！'); exit;
		}
		
		$userress_id = isset($_POST['userress_id']) ? $_POST['userress_id'] : 0;
		if(empty($userress_id)){ 
			//添加收货地址
			$dd['user_id'] = $uid;
			$dd['consignee'] = $_POST['consignee'];
			if(empty($dd['consignee'])){
				$this->jump(SITE_URL.'groupcart.php?id='.$id.'&num='.$_POST['num'],0,'收货人不能为空！'); exit ;
			}
			$dd['country'] = 1;
			$dd['province'] = $_POST['province'];
			$dd['city'] = $_POST['city'];
			$dd['district'] = $_POST['district'];
			$dd['address'] = $_POST['address'];
			if(empty($dd['province']) || empty($dd['city']) || empty($dd['district']) ||empty($dd['address'])){
				$this->jump(SITE_URL.'groupcart.php?id='.$id.'&num='.$_POST['num'],0,'收货地址不能为空！'); exit ;
			}
			$dd['sex'] = $_POST['sex']; 
			$dd['zipcode'] = $_POST['zipcode'];
			if(empty($dd['zipcode'])){
				$this->jump(SITE_URL.'groupcart.php?id='.$id.'&num='.$_POST['num'],0,'邮政编码不能为空！'); exit ;
			}
			if(!($dd['zipcode']>0)){
				$this->jump(SITE_URL.'groupcart.php?id='.$id.'&num='.$_POST['num'],0,'邮政编码必须是整数！'); exit ;
			}
			$dd['mobile'] = $_POST['mobile'];
			$dd['tel'] = $_POST['tel']; 
			$dd['is_default'] = '1';
			$this->App->update('user_address',array('is_default'=>'0'),'user_id',$uid);
			$this->App->insert('user_address',$dd);
			$userress_id  = $this->App->iid();
			if(!($userress_id>0)){
				$this->jump(SITE_URL.'groupcart.php?id='.$id.'&num='.$_POST['num'],0,'非法的收货地址！'); exit ;
			}
		}
		$shipping_id = isset($_POST['shipping_id']) ? $_POST['shipping_id'] : 0;
		$shipping_name = $this->App->findvar("SELECT shipping_name FROM `{$this->App->prefix()}shipping` WHERE shipping_id='$shipping_id' LIMIT 1");
		
		$pay_id = isset($_POST['pay_id']) ? $_POST['pay_id'] : 0;
		$pay_name = $this->App->findvar("SELECT pay_name FROM `{$this->App->prefix()}payment` WHERE pay_id='$pay_id' LIMIT 1");
		$postscript = isset($_POST['postscript']) ? $_POST['postscript'] : "";
		//收货信息
		$sql = "SELECT * FROM `{$this->App->prefix()}user_address` WHERE address_id='$userress_id' LIMIT 1";
		$user_ress = $this->App->findrow($sql);
		if(empty($user_ress)){ $this->jump(SITE_URL.'groupcart.php?id='.$id.'&num='.$_POST['num'],0,'非法收货地址！'); exit ;}
	}
}
?>