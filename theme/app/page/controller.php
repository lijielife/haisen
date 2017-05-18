<?php
class PageController extends Controller{
    /*
     * @Photo Index
     * @param <type> $page
     * @param <type> $type
     */
	 //构造函数，自动新建对象
 	function  __construct() {
		/*
		*构造函数
		*/
		$this->js(array('lrtk.js'));
		$this->css(array('lrtk.css','aindex.css'));
	}
	
	function curlGet($url){
		$ch = curl_init();
		$header = "Accept-Charset: utf-8";
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$temp = curl_exec($ch);
		if(empty($temp)) $temp = Import::crawler()->curl_get_con($url);
		return $temp;
	}
	
	function test(){
		$sql = "SELECT appid,appsecret,is_oauth,winxintype FROM `{$this->App->prefix()}wxuserset` LIMIT 1";
		$rr = $this->App->findrow($sql);
		
		$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$rr['appid'].'&secret='.$rr['appsecret'];
		echo $con = $this->curlGet($url);
		
		//$json=json_decode($con);
	}
	
	function rollproducts(){
		$this->layout('kong');
		$this->js(array('jquery-1.2.4b.js','ui.core.js','ui.tabs.js'));
		$this->css(array('ui.tabs.css'));
		
		$sql = "SELECT * FROM `{$this->App->prefix()}top_cate` WHERE parent_id='1' LIMIT 5";
		$rt['cats'] = $this->App->find($sql); //print_r($rt['cats']);
		
		if(!empty($rt['cats']))foreach($rt['cats'] as $k=>$row){
			$c = $row['tcid'];
			$sql = "SELECT tb1.*,tb2.goods_name,tb2.goods_thumb,tb2.pifa_price,tb2.shop_price,tb2.cat_id FROM `{$this->App->prefix()}top_cate_goods` AS tb1 LEFT JOIN  `{$this->App->prefix()}goods` AS tb2 ON tb1.goods_id=tb2.goods_id WHERE tcid='$c' ORDER BY gid DESC LIMIT 8";
			$rt['cated'][$row['tcid']] = $this->App->find($sql);
			
			$rt['cats'][$k]['subcate'] = array();
			$cids = array();
			if(!empty($rt['cated'][$row['tcid']]))foreach($rt['cated'][$row['tcid']] as $rr){
				$cids[] = $rr['cat_id']; 
			}
			$cat_id = $row['cat_id'];
			if($cat_id > 0){
				$sql = "SELECT cat_id FROM `{$this->App->prefix()}goods_cate` WHERE parent_id='$cat_id' OR cat_id = '$cat_id'";
				$cc = $this->App->findcol($sql);
				if(!empty($cc))foreach($cc as $c){
					$cids[] = $c; 
				}
			}
			if(!empty($cids)){
				$cc = array_unique($cids);
				unset($cids);
				$sql = "SELECT DISTINCT cat_id,cat_name FROM `{$this->App->prefix()}goods_cate` WHERE cat_id IN(".implode(',',$cc).") OR parent_id IN(".implode(',',$cc).") GROUP BY cat_id ORDER BY cat_id DESC LIMIT 8";
				$rt['cats'][$k]['subcate'] = $this->App->find($sql);
			}
				
		}
		
		$this->set('rt',$rt);
		$this->template('rollproducts');
	}
	
	//获商品子自分类cat_id
	function get_goods_sub_cat_ids($cid=0){
		//if(!($cid>=0)) return false;
		$rts = $this->get_goods_cate_tree($cid);
		if($cid>0){
			$cids[] = $cid;
		}
		if(!empty($rts)){
			foreach($rts as $row){
				$cids[] = $row['id'];
				if(!empty($row['cat_id'])){
					foreach($row['cat_id'] as $rows){
						$cids[] = $rows['id'];
						if(!empty($rows['cat_id'])){
							foreach($rows['cat_id'] as $rowss){
								$cids[] = $rowss['id'];
							} // end foreach
						} // end if
					} // end foreach
				} // end if
			} // end foreach
		}// end if
		return $cids;
	}
	
	//获取商品分类
	function get_goods_cate_tree($cid = 0)
	{
		$three_arr = array();
		$sql = 'SELECT count(cat_id) FROM `'.$this->App->prefix()."goods_cate` WHERE parent_id = '$cid' AND is_show = 1";
		if ($this->App->findvar($sql) || $cid == 0)
		{
			$sql = 'SELECT tb1.cat_id FROM `'.$this->App->prefix()."goods_cate` AS tb1";
			$sql .=" LEFT JOIN `{$this->App->prefix()}goods` AS tb2";
			$sql .=" ON tb1.cat_id = tb2.cat_id";
			$sql .= " WHERE tb1.parent_id = '$cid' GROUP BY tb1.cat_id ORDER BY tb1.parent_id ASC,tb1.sort_order ASC, tb1.cat_id ASC";
			$res = $this->App->findcol($sql); 
			foreach ($res as $cid)
			{
			   $three_arr[$cid]['id']   = $cid;
			   if (isset($cid) != NULL)
			   {
					 $three_arr[$cid]['cat_id'] = $this->get_goods_cate_tree($cid);
				}
			}
		}
		
		return $three_arr;
	}
	
    function index($list=4){
        $this->title($GLOBALS['LANG']['site_title']);
		$this->meta("title",$GLOBALS['LANG']['metatitle']);
		$this->meta("keywords",$GLOBALS['LANG']['metakeyword']);
		$this->meta("description",$GLOBALS['LANG']['metadesc']);
		$rt = $this->Cache->read(3600);
	 	if(is_null($rt)) {
			//商品分类列表		
			//$rt['menu'] = $this->action('catalog','get_goods_cate_tree');
			
			//$rt['brandlist'] = $this->action('brand','get_brand_list',0,16);	
			
			//首页轮播
			//$rt['index_lunbo'] = $this->action('banner','index_lunbo');
			
			//热销商品 [你可能喜欢]
			//$rt['hot_goods'] = $this->action('catalog','recommend_goods',6,'is_hot');

			//精品
			//$rt['best_goods'] = $this->action('catalog','recommend_goods',16,'is_best');
			
			//新品[推荐] 新品推荐
			//$rt['new_goods'] = $this->action('catalog','recommend_goods',4,'is_new');
			
			//热卖前10个商品[人气排行]
			//$rt['top10'] = $this->action('catalog','top10'); 
			
			//促销商品 促销精选
			$rt['gungoods'] = $this->action('catalog','recommend_goods',20,'is_best');
			
			//抢购商品
			$rt['qianggou_goods'] = $this->action('catalog','recommend_goods',5,'is_promote');
			
			//团购商品
			$sql = "SELECT tb1.group_id,tb1.start_time,tb1.end_time,tb1.points,tb1.price,tb1.group_name,tb1.goods_id,tb1.desc,tb2.goods_name,tb2.goods_desc,tb2.market_price,tb2.shop_price,tb2.meta_keys,tb2.meta_desc,tb2.sale_count,tb2.goods_thumb,tb2.goods_img FROM `{$this->App->prefix()}goods_groupbuy` AS tb1 LEFT JOIN `{$this->App->prefix()}goods` AS tb2 ON tb1.goods_id=tb2.goods_id WHERE tb1.active='1' AND tb2.is_on_sale='1' AND tb2.is_delete='0' ORDER BY tb1.group_id DESC LIMIT 5";
			$rt['grouplist'] = $this->App->find($sql);
			//print_r($rt['grouplist']);
			//首页新闻
			$sql = "SELECT tb1.article_id,tb1.article_title,tb1.addtime,tb2.cat_name,tb2.cat_id FROM `{$this->App->prefix()}article` AS tb1 LEFT JOIN `{$this->App->prefix()}article_cate` AS tb2 ON tb1.cat_id= tb2.cat_id WHERE tb2.type= 'new' ORDER BY tb1.article_id DESC LIMIT 12";
			$rt['newlist'] = $this->App->find($sql);

			//end 首页新闻
			
			//首页公告
			//$sql = "SELECT tb1.article_id,tb1.article_title,tb1.addtime,tb2.cat_name,tb2.cat_id FROM `{$this->App->prefix()}article` AS tb1 LEFT JOIN `{$this->App->prefix()}article_cate` AS tb2 ON tb1.cat_id= tb2.cat_id WHERE tb2.type= 'notice' ORDER BY tb1.article_id DESC LIMIT 10";
			//$noticelist = $this->App->find($sql);
			if(!empty($noticelist)){
				foreach($noticelist as $k=>$row){
					$rt['noticelist'][$k] = $row;
					$rt['noticelist'][$k]['url'] = get_url($row['article_title'],$row['article_id'],'notice.php?id='.$row['article_id'],'article',array('notice','article',$row['article_id']));
				}
				unset($noticelist);
			}
			//end 首页公告
			
			//热门品牌
			$sql = "SELECT brand_id,brand_name,brand_banner,brand_logo FROM `{$this->App->prefix()}brand` WHERE brand_name!='' AND is_hot='1' ORDER BY sort_order ASC LIMIT 15";
			$rt['brandlist'] = $this->App->find($sql);
			
			
			//商品评论
			// $rt['allcommentlist'] = $this->action('product','get_comment_list',0,0,6);
			
			//商品TAG
			//$rt['tag'] = $this->get_goods_tag();
			
			//最新商品排序
			/*$sql = "SELECT g.goods_id,g.cat_id,g.goods_name,g.market_price,g.shop_price,g.promote_price,g.qianggou_price,g.pifa_price,g.goods_thumb,g.goods_img,g.is_promote,g.is_qianggou,gc.cat_name FROM `{$this->App->prefix()}goods` AS g LEFT JOIN `{$this->App->prefix()}goods_cate` AS gc ON g.cat_id=gc.cat_id WHERE g.is_on_sale='1' AND g.is_alone_sale='1' ORDER BY g.sort_order ASC ,g.goods_id DESC LIMIT 10";
			//look 添加 g.pifa_price
			$bestnew_goods = $this->App->find($sql);
			$rt['sub_cate'] = array();
			if(!empty($bestnew_goods)){
				foreach($bestnew_goods as $k=>$row){
					if(!isset($rt['sub_cate'][$row['cat_id']])){
						$rt['sub_cate'][$row['cat_id']]['cat_name'] = $row['cat_name']; 
						$rt['sub_cate'][$row['cat_id']]['url'] = get_url($row['cat_name'],$row['cat_id'],"catalog.php?cid=".$row["cat_id"],'goodscate',array('catalog','index',$row['cat_id'])); 
					} 
					$dd = array();

					$rank = $this->Session->read('User.rank');
					if($rank == '10' || $rank == '11' || $rank =='12')
					{
						$rt['bestnew_goods'][$k] = $row;
						$a  =format_price($row['pifa_price']);
						$rt['bestnew_goods'][$k]['pifa_price'] = $a;
						$a >0 ? $dd[] = $a : "";
					}else
					{
						$rt['bestnew_goods'][$k] = $row;
						$a  =format_price($row['shop_price']);
						$rt['bestnew_goods'][$k]['shop_price'] = $a;
						$a >0 ? $dd[] = $a : "";
					}
					
					if($row['is_promote']=='1'){
						$c = format_price($row['promote_price']);
						$rt['bestnew_goods'][$k]['promote_price'] = $c;
						$c >0 ? $dd[] = $c : "";
					}
					if($row['is_qianggou']=='1'){
						$d = format_price($row['qianggou_price']);
						$rt['bestnew_goods'][$k]['qianggou_price'] = $d;
						$d >0 ? $dd[] = $d : "";
					}
					if(!empty($dd)){
						$rt['bestnew_goods'][$k]['zprice'] = min($dd);
					}else{
						$rt['bestnew_goods'][$k]['zprice'] = '0.00';
					}
					$rt['bestnew_goods'][$k]['url'] = get_url($row['goods_name'],$row['goods_id'],SITE_URL.'product.php?id='.$row['goods_id'],'goods',array('product','index',$row['goods_id']));
				}
				unset($bestnew_goods);
			}*/

/*			$sql = "SELECT tb1.*,tb2.goods_name,tb2.goods_thumb,tb2.pifa_price,tb2.shop_price FROM `{$this->App->prefix()}top_cate_goods` AS tb1 LEFT JOIN  `{$this->App->prefix()}goods` AS tb2 ON tb1.goods_id=tb2.goods_id WHERE tcid='8' LIMIT 20";
			$rt['gungoods'] = $this->App->find($sql);*/
			$this->Cache->write($rt);
		} 
		
		$this->set('rt',$rt);
		$this->template('index');
    }
	
	function get_goods_tag($list = 45){
			$sql = "SELECT * FROM `{$this->App->prefix()}goods_keyword` WHERE is_show='1' GROUP BY keyword ORDER BY tcount DESC LIMIT $list";
			return $this->App->find($sql);
			/*if(!empty($comics2)){
				foreach($comics2 as $k=>$vars){ 
					if(empty($vars)) continue;
					if($k%4==0){
					 $comics[$vars] = array('tag'=>'tag2','name'=>$vars,'url'=>'anime-'.str_replace('+','-',urlencode($vars)).'-cosplay.html');
					 }
					else if($k%8==0){
					 $comics[$vars] = array('tag'=>'tag3','name'=>$vars,'url'=>'anime-'.str_replace('+','-',urlencode($vars)).'-cosplay.html');
					 }
					else if($k%13==0){
					 $comics[$vars] = array('tag'=>'tag4','name'=>$vars,'url'=>'anime-'.str_replace('+','-',urlencode($vars)).'-cosplay.html');
					 }
					else{
					 $comics[$vars] = array('tag'=>'tag1','name'=>$vars,'url'=>'anime-'.str_replace('+','-',urlencode($vars)).'-cosplay.html');
					 }
				} //end foreach
			} //end if*/
			

	}
	
	//抢购商品
	function qianggou_goods($list=1){
		$time = mktime();
		$sql = "SELECT goods_id,goods_sn,goods_bianhao,goods_name,market_price,shop_price,qianggou_price,goods_thumb,goods_img,qianggou_start_date, qianggou_end_date,is_qianggou FROM `{$this->App->prefix()}goods` WHERE is_on_sale = '1' AND is_delete = '0' AND is_alone_sale='1' AND is_qianggou = '1' AND qianggou_start_date <= '$time' AND qianggou_end_date >= '$time' ORDER BY goods_id DESC LIMIT $list";
		$qg = $this->App->find($sql);
		if(!empty($qg)){
			foreach($qg as $k=>$row){
				$rt[$k] = $row;
				$rt[$k]['qianggou_price'] = format_price($row['qianggou_price']);
				$rt[$k]['url'] = get_url($row['goods_name'],$row['goods_id'],SITE_URL.'product.php?id='.$row['goods_id'],'goods',array('product','index',$row['goods_id']));
			}
			unset($qg);
		}
		return $rt;
	}
	
	//推荐商品数量
	function tuijian_goods_count($type='is_hot'){
		if(!in_array($type,array('is_best','is_new','is_hot','is_promote'))) return 0;
		$w = $type."='1'";
		$sql = "SELECT COUNT(goods_id) FROM `{$this->App->prefix()}goods` WHERE is_on_sale='1' AND is_alone_sale='1' AND is_delete = '0' AND $w";
		return $this->App->findvar($sql);
	}
	
	//推荐商品列表
	function tuijian_goods_list($type='is_hot',$page=0,$list=8){
		if(!in_array($type,array('is_best','is_new','is_hot','is_promote'))) return array();
		if(!$page) $page = 1;
		$start = ($page-1)*$list;
		if($type=='is_promote'){
			$t = mktime();
			$w = "g.is_promote='1' AND g.promote_start_date<'$t' AND g.promote_end_date>'$t'";
		}else{
			$w = 'g.'.$type."='1'";
		}
		$sql = "SELECT g.goods_id,g.goods_sn,g.goods_bianhao,g.goods_name,g.market_price,g.shop_price,g.promote_price,g.goods_thumb,g.goods_img,g.promote_price, g.promote_start_date, g.promote_end_date,g.is_promote,b.brand_name FROM `{$this->App->prefix()}goods` AS g LEFT JOIN `{$this->App->prefix()}brand` AS b ON g.brand_id=b.brand_id WHERE g.is_on_sale='1' AND g.is_alone_sale='1' AND g.is_delete = '0' AND $w ORDER BY g.sort_order ASC, g.goods_id DESC LIMIT $start,$list";
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

