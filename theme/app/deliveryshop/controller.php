<?php
class DeliveryshopController extends Controller{
	
 	function  __construct() {
		$this->css(array('jquery_dialog.css','user.css','content.css'));
		$this->js(array('jquery.json-1.3.js','jquery_dialog.js','common.js','user.js','menu.js'));
	}
	
	function select_goods(){
		$uid = $this->Session->read('User.uid');
		$rank = $this->Session->read('User.rank');
		if($rank!='11' && $rank!='12'){
			$this->action('common','show404tpl');
		}
		
		$sql = "SELECT distinct tb1.attr_value,tb1.attr_id,tb2.attr_name,tb2.attr_keys  FROM `{$this->App->prefix()}goods_attr` AS tb1";
		$sql .=" LEFT JOIN `{$this->App->prefix()}attribute` AS tb2 ON tb1.attr_id = tb2.attr_id";  
		$attr = $this->App->find($sql);
		$rt['attr'] = array();
		if(!empty($attr)){
			foreach($attr as $row){
				$rt['attr'][$row['attr_id']][] = $row;
			}
			unset($attr);
		}
		
		//所有品牌
		$rt['brandlist'] = $this->action('brand','get_brand_list');
		
		//所有分类
		$rt['catelist'] = $this->action('catalog','get_goods_cate_tree');
		
		$tt = $this->__get_user_goods_select_count();
		
		$list = 12;
		
		$rt['goodslist'] = $this->__get_user_goods_select('',1,$list);
				
		$rt['goodspage'] = Import::basic()->ajax_page($tt,$list,1,'get_select_goods_page');
		
		$rt['menu'] = $this->action('catalog','get_goods_cate_tree');
		
		//print_r($rt);
		isset($_COOKIE['GZ_cid']) ? setcookie('GZ_cid','') : "";
		isset($_COOKIE['GZ_bid']) ? setcookie('GZ_bid','') : "";
		for($i=0;$i<count($rt['attr']);$i++){
			isset($_COOKIE['GZ_'.$i]) ? setcookie('GZ_'.$i,'') : "";
		}
		$this->set('rt',$rt);
		
		$this->title("商品筛选".' - '.$GLOBALS['LANG']['site_name']);
		$this->template('select_goods');
	}
	
	function ajax_select_goods($maxattr=0,$page=1){
   		$cid = isset($_COOKIE['GZ_cid'])?$_COOKIE['GZ_cid'] : 0;
		$subcid = array();
		if($cid > 0) $subcid = $this->action('catalog','get_goods_sub_cat_ids',$cid); //分类
		///
		isset($_COOKIE['GZ_bid'])&&intval($_COOKIE['GZ_bid'])>0? $comd[] = "b.brand_id = '".intval($_COOKIE['GZ_bid'])."'" : 0;  //品牌
   		if($maxattr>0){
			for($i=0;$i<$maxattr;$i++){
				isset($_COOKIE['GZ_'.$i])&&!empty($_COOKIE['GZ_'.$i]) ? $comd[] = "ga.attr_value = '".$_COOKIE['GZ_'.$i]."'" : 0; //属性
			}
		}
		if(!empty($subcid)){
			$comd[] = "gc.cat_id ".db_create_in($subcid);
		}
		
		$w = !empty($comd) ? " WHERE ".implode(' AND ',$comd) : "";
		
		$tt = $this->__get_user_goods_select_count($w);

		$rt['count'] = $tt;
		
		$list = 12;

		$rt['goodslist'] = $this->__get_user_goods_select($w,$page,$list);
				
		$rt['goodspage'] = Import::basic()->ajax_page($tt,$list,$page,'get_select_goods_page');
		
		$this->set('rt',$rt);
		$con = $this->fetch('ajax_user_goods_select',true);
		die($con);
			
   }
   
   function __get_user_goods_select_count($w=""){
   		$sql = "SELECT COUNT(distinct g.goods_id) FROM `{$this->App->prefix()}goods` AS g";
		$sql .=" LEFT JOIN `{$this->App->prefix()}brand` AS b ON g.brand_id = b.brand_id";
		$sql .=" LEFT JOIN `{$this->App->prefix()}goods_cate` AS gc ON gc.cat_id = g.cat_id";
		$sql .=" LEFT JOIN `{$this->App->prefix()}goods_attr` AS ga ON ga.goods_id = g.goods_id";
		$sql .=" $w";
		return $this->App->findvar($sql);
		
   }
   
   function __get_user_goods_select($w="",$page=1,$list=20){
		if(!$page) $page = 1;
		$start = ($page-1)*$list;
		$orderby = " ORDER BY g.last_update DESC, g.add_time DESC";
		
   		$sql = "SELECT distinct(ga.goods_id),g.*,b.brand_name,b.brand_id,gc.cat_name FROM `{$this->App->prefix()}goods` AS g";
		$sql .=" LEFT JOIN `{$this->App->prefix()}brand` AS b ON g.brand_id = b.brand_id";
		$sql .=" LEFT JOIN `{$this->App->prefix()}goods_cate` AS gc ON gc.cat_id = g.cat_id";
		$sql .=" LEFT JOIN `{$this->App->prefix()}goods_attr` AS ga ON ga.goods_id = g.goods_id";
		$sql .=" $w $orderby LIMIT $start, $list";
		$rt = $this->App->find($sql);
		$goodslist = array();
		if(!empty($rt)){
			foreach($rt as $k=>$row){
				$goodslist[$k] = $row;
				$goodslist[$k]['url'] = get_url($row['goods_name'],$row['goods_id'],'goods.php?id='.$row['goods_id'],'goods');
				$goodslist[$k]['goods_thumb'] =  SITE_URL.'/'.$row['goods_thumb'];
				$goodslist[$k]['goods_img'] =  SITE_URL.'/'.$row['goods_img'];
				$goodslist[$k]['original_img'] =  SITE_URL.'/'.$row['original_img'];
			}
			unset($rt);
		}
		return $goodslist;
   }
	//end function 
}
?>