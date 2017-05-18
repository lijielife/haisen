<?php
class PromotionController extends Controller{

 	function  __construct() {
		$this->css(array('menber.css','jquery_dialog.css'));
		$this->js(array('jquery.json-1.3.js','common.js','jquery_dialog.js','goods.js'));
	}
	
	function index(){ 
		$rt = $this->Cache->read(3600);
	 	if(is_null($rt)) {
			$keyword   = 'is_promote';
			$page = 1;
			$list = 25;
			
			//start 当前位置
			$rt['hear'] = array();
			$perend_id = 0;
			$hear[] = '<a href="'.SITE_URL.'">首页</a>';
			$hear[] = '<a href="'.SITE_URL.'catalog/">商品中心</a>';
			$hear[] = '<a href="'.SITE_URL.'promotion/">每周特价</a>';
			if(!empty($hear)){
				$rt['hear'] = implode('&nbsp;&gt;&nbsp;',$hear);
			}else{
				$rt['hear'] = "";
			}
			unset($hear);
			//end 当前位置
		
			//商品分类列表		
			//$rt['menu'] = $this->action('catalog','get_goods_cate_tree');
			
			//$rt['brandlist'] = $this->action('brand','get_brand_list',0,16);	
			
			//热卖前10个商品
			//$rt['top10'] = $this->action('catalog','top10',0,5); 
			 
			//排序
			//定义能够排序的字段
			$order = array('sort_order','cat_id','goods_id','click_count','brand_id','shop_price','market_price','promote_price','is_on_sale','is_best','is_new','is_hot','is_promote','sale_count','add_time','last_update','sale_count');
			$orderby = "";
			$asc = $this->App->G('asc');
			$desc = $this->App->G('desc');
			if(!empty($desc)){
					 if(in_array($desc,$order)){
						$orderby = ' ORDER BY g.'.$desc.' DESC';
						$order_type = trim($desc);
					 }else{
					 	$orderby = ' ORDER BY g.goods_id DESC';
					 	$order_type = 'goods_id';
					 }
					 $sort_type = 'DESC';

			}else if(!empty($asc)){
					 if(in_array($asc,$order)){
						$orderby = ' ORDER BY g.'.$asc.' ASC';
						$order_type = trim($asc);
					 }else{
					 	$orderby = ' ORDER BY g.goods_id DESC';
					 	$order_type = 'goods_id';
					 }
					 $sort_type = 'ASC';
			}else {
					 $orderby = ' ORDER BY g.goods_id DESC';
					 $order_type = 'goods_id';
					 $sort_type = 'ASC';
			}
			
			$rt['thiscid'] = 0;
			$rt['thisbid'] = 0;
			$rt['price'] = $price;
			$rt['page'] = $page;
			$rt['sort'] = $sort_type;
			$rt['order'] = $order_type;
			$rt['limit'] = $list;
			$cid = 0;
			$bid = 0;
			//条件
			$comd = array('cid'=>$cid,'bid'=>$bid,'price'=>"",'keyword'=>$keyword); //需要的话继续增加
			//分页
			if(empty($page)){
				   $page = 1;
			}
			$list = intval($list)>0 ?  intval($list) : 24 ; //每页显示多少个
			$start = ($page-1)*$list;
			$tt = $this->App->__get_goods_count_category($comd); //获取商品的数量
			$rt['goods_count'] = $tt;
			$rt['categoodspage'] = Import::basic()->ajax_page($tt,$list,$page,'get_tejia_goods');
			$rt['categoodslist'] = $this->App->__get_categoods_list_category($comd,$orderby,$start,$list); //商品列表
			
			if(!isset($_COOKIE['DISPLAY_TYPE'])||empty($_COOKIE['DISPLAY_TYPE']) || !in_array($_COOKIE['DISPLAY_TYPE'],array('list','text'))){
					$rt['display'] = 'text';
			}else{
					$rt['display'] = $_COOKIE['DISPLAY_TYPE'];
			}
			
			//每周特价banner
			$rt['tejiabanner'] = $this->action('banner','index_hot_banner','每周特价');

			
			$this->Cache->write($rt);
		}
		
		//设置页面meta cat_title
		$title = "每周特价";
		$this->title($title.' - '.$GLOBALS['LANG']['site_name']);
		$this->meta("title",$title);
		$this->meta("keywords",'');
		$this->meta("description",'');
		$this->set('rt',$rt);
		
		$this->template('goods_tejia');
	}
	
	function ajax_tejia_goods($page=1){  //当前页面
		$keyword='is_promote';
		$page = !($page>0) ? 1 : $page;
		$list = 25;
		$orderby = ' ORDER BY g.goods_id DESC';
		$order_type = 'goods_id';
		$sort_type = 'ASC';
		$cid = 0;
		$bid = 0;
		//条件
		$comd = array('cid'=>$cid,'bid'=>$bid,'price'=>"",'keyword'=>$keyword); //需要的话继续增加
		//分页
		if(empty($page)){
			   $page = 1;
		}
		$start = ($page-1)*$list;
		$tt = $this->App->__get_goods_count_category($comd); //获取商品的数量
		$rt['goods_count'] = $tt;
		$rt['categoodspage'] = Import::basic()->ajax_page($tt,$list,$page,'get_tejia_goods');
		$rt['categoodslist'] = $this->App->__get_categoods_list_category($comd,$orderby,$start,$list); //商品列表
		
		$this->set('rt',$rt);
		$con = $this->fetch('ajax_goods_tejia',true);
		echo $con;
		exit;
	}
}
?>