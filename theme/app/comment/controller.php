<?php
class CommentController extends Controller{

 	function  __construct() {
		$this->css(array('comman.css','style.css',));
		$this->js(array('common.js'));
	}
	
	function index($page=1){
		$rt = $this->Cache->read(3600);
	 	if(is_null($rt)) {
			if(!isset($_GET['type'])){
				//推荐商品
				$rt['tuijian'] = $this->tuijian_goods(10);
				
				//热卖前10个商品
				$rt['top10'] = $this->action('catalog','top10',0,5);
				
				//全站banner
				$rt['quanzhan'] = $this->action('banner','quanzhan');
			
				//热门评论商品
				$sql = "SELECT g.goods_id,g.goods_name,g.market_price,g.shop_price,g.promote_price,g.goods_thumb,g.promote_start_date, g.promote_end_date,g.is_promote,g.sale_count,COUNT(c.comment_id) AS comment_count FROM `{$this->App->prefix()}goods` AS g LEFT JOIN `{$this->App->prefix()}comment` AS c ON g.goods_id=c.id_value WHERE c.status = '1' AND (g.goods_id IS NOT NULL AND g.goods_id!='') GROUP BY c.id_value ORDER BY comment_count DESC LIMIT 4";
				$hotcommentgoods = $this->App->find($sql);
				$rt['hotcommentgoods'] = array();
				if(!empty($hotcommentgoods)){
					foreach($hotcommentgoods as $k=>$row){
						$rt['hotcommentgoods'][$k] = $row;
						$rt['hotcommentgoods'][$k]['goods_thumb'] = SITE_URL.$row['goods_thumb'];
						$rt['hotcommentgoods'][$k]['goods_img'] = SITE_URL.$row['goods_img'];
						$rt['hotcommentgoods'][$k]['url'] = get_url($row['goods_name'],$row['goods_id'],SITE_URL.'product.php?id='.$row['goods_id'],'goods',array('product','index',$row['goods_id']));
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
						$rt['hotcommentgoods'][$k]['promote_price'] = $row['promote_price'];
					}
					unset($hotcommentgoods);
				}
			}
			
			$list = 15;
			$page = !$page ? 1 : $page;
			$start = ($page-1)*$list;
			
			$tt = $this->action('product','get_comment_count');
            $rt['pagelink'] = Import::basic()->gethtmlpage($tt, $list, $page,SITE_URL.'comment/p%d/');
			$rt['commentlist'] = $this->action('product','get_comment_list',0,$start,$list);
			$this->Cache->write($rt);
		}
		
		$this->set('rt',$rt);	
		if(isset($_GET['type'])&&$_GET['type']=='ajax'){
			echo  $this->fetch('ajax_jifen_goods',true);
			exit;
		}
		//设置页面meta
		$title = '评论中心-用户评论';
		$this->title($title.' - '.$GLOBALS['LANG']['site_name']);
		$this->meta("title",$title);
		$this->meta("keywords",$title);
		$this->meta("description",$title);
		$this->template('comment_index');
	}
	
	//推荐商品列表
	function tuijian_goods($list=8){
		$w = "(g.is_best='1' OR g.is_new='1' OR g.is_hot='1' OR g.is_promote='1')";
		$sql = "SELECT g.goods_id,g.goods_sn,g.goods_bianhao,g.goods_name,g.market_price,g.shop_price,g.promote_price,g.goods_thumb,g.goods_img,g.promote_price, g.promote_start_date, g.promote_end_date,g.is_promote,g.sale_count,b.brand_name FROM `{$this->App->prefix()}goods` AS g LEFT JOIN `{$this->App->prefix()}brand` AS b ON g.brand_id=b.brand_id WHERE g.is_on_sale='1' AND g.is_alone_sale='1' AND $w ORDER BY RAND() DESC LIMIT $list";
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