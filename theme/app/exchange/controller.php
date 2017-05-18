<?php
//积分展示模块
class ExchangeController extends Controller{

 	function  __construct() {
		$this->css(array('comman.css','jquery_dialog.css','menber.css','tabs.css','webwidget_scroller_tab.css'));
		$this->js(array('jquery.json-1.3.js','jquery_dialog.js','common.js','goods.js','tab.js','webwidget_scroller_tab.js'));
	}
	
	function index($page=1,$type=""){
		$rt = $this->Cache->read(3600);
	 	if(is_null($rt)) {
			$rt['tuijian'] = $this->tuijian_goods(5);
			$list = 20;
			//$page = (!isset($_GET['page']) || intval($_GET['page'])<1) ? 1 : intval($_GET['page']);
			$page = (empty($page)||!($page>0)) ? 1 : $page;
			$start = ($page-1)*$list;
			$tt = $this->App->findvar("SELECT COUNT(goods_id) FROM `{$this->App->prefix()}goods` WHERE is_on_sale='1' AND is_alone_sale='1' AND is_jifen='1'");
			$rt['jifengoodspage'] = Import::basic()->ajax_page($tt,$list,$page,'get_jifen_page'); //分页
			$sql = "SELECT goods_id,goods_name,market_price,shop_price,promote_price,goods_thumb,goods_img,is_jifen,need_jifen FROM `{$this->App->prefix()}goods` WHERE is_on_sale='1' AND is_alone_sale='1' AND is_jifen='1' ORDER BY sort_order ASC, goods_id DESC LIMIT $start,$list";
			$jifengoods = $this->App->find($sql);
			$rt['jifengoods'] = array();
			if(!empty($jifengoods)){
			 	foreach($jifengoods as $k=>$row){
				 	$rt['jifengoods'][$k] = $row;
					$rt['jifengoods'][$k]['goods_thumb'] = SITE_URL.$row['goods_thumb'];
					$rt['jifengoods'][$k]['goods_img']   = SITE_URL.$row['goods_img'];
					$rt['jifengoods'][$k]['url'] = get_url($row['goods_name'],$row['goods_id'],'product.php?id='.$row['goods_id'],'goods',array('product','index',$row['goods_id']));
				}
				unset($jifengoods);
			 }
			//不是AJAX请求
			if(empty($_GET['type'])){
				$sql = "SELECT a.article_id,a.article_title,a.article_img,a.content FROM `{$this->App->prefix()}article` AS a LEFT JOIN `{$this->App->prefix()}article_cate` AS ac ON a.cat_id=ac.cat_id WHERE ac.type='customer'";
				$this->App->fieldkey('article_id');
				$rt['jifenart'] = $this->App->find($sql);
				
				//积分换取banner
				$rt['jifenbanner'] = $this->action('banner','index_hot_banner','积分换取');
				
				//积分换取banner
				$rt['jifenyoubanner'] = $this->action('banner','index_hot_banner','积分右侧');
			}
			
			$this->Cache->write($rt);
		}
		
		$this->set('rt',$rt);	
		if(!empty($_GET['type'])&&$_GET['type']=='ajax'){
			echo  $this->fetch('ajax_jifen_goods',true);  //ajax请求
			exit;
		}
		
		//设置页面meta
		$title = '积分换取、积分获得、礼品相送';
		$this->title($title.' - '.$GLOBALS['LANG']['site_name']);
		$this->meta("title",$title);
		//$this->meta("keywords",htmlspecialchars($rt['goodsinfo']['meta_keys']));
		//$this->meta("description",htmlspecialchars($rt['goodsinfo']['meta_desc']));
		$this->template('jifen_index');
	}
	
	//推荐商品列表
	function tuijian_goods($list=8){
		$w = "(g.is_best='1' OR g.is_new='1' OR g.is_hot='1' OR g.is_promote='1')";
		$sql = "SELECT g.goods_id,g.goods_sn,g.goods_bianhao,g.goods_name,g.market_price,g.shop_price,g.promote_price,g.goods_thumb,g.goods_img,g.promote_price, g.promote_start_date, g.promote_end_date,g.is_promote,g.sale_count,b.brand_name FROM `{$this->App->prefix()}goods` AS g LEFT JOIN `{$this->App->prefix()}brand` AS b ON g.brand_id=b.brand_id WHERE g.is_on_sale='1' AND g.is_alone_sale='1' AND $w ORDER BY g.sort_order ASC, g.goods_id DESC LIMIT $list";
		$rt = $this->App->find($sql);
		$rts = array();
		if(!empty($rt)){
			foreach($rt as $k=>$row){
				$rts[$k] = $row;
				$rts[$k]['goods_thumb'] = SITE_URL.$row['goods_thumb'];
				$rts[$k]['goods_img'] = SITE_URL.$row['goods_img'];
				$rts[$k]['url'] = get_url($row['goods_name'],$row['goods_id'],SITE_URL.'product.php?id='.$row['goods_id'],'goods',array('product','index',$row['goods_id']));
				if($row['is_promote']=='1'){
					//促销 价格
					if($row['promote_start_date']< mktime()&&$row['promote_end_date'] > mktime()){
						$row['promote_price'] = format_price($row['promote_price']);
					}else{
						$row['promote_price'] = "0.00";
					}
				}else{
					$row['promote_price'] = "0.00";
				}
				$rts[$k]['promote_price'] = $row['promote_price'];
			}
			unset($rt);
		}
		return $rts;
	}
}
?>