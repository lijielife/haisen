<?php
class CommonController extends Controller{

 	function  __construct() {
		
	}
	function index(){
		$this->show404tpl();
	}
	function auto_daili_info(){
	
	}
	function user_auto_login(){
	
	}
	function get_share_user_info(){
	
	}
	function get_daili_info(){
	
	}
	function get_user_info(){
	
	}
	function _get_jsapi_ticket(){}
	
	function show404tpl(){
		header("HTTP/1.0 404 Not Found");
		$this->js(array('common.js'));
		//$this->layout('kong');
		$lang = $GLOBALS['LANG'];
		$lang['menu'] = $this->action('catalog','get_goods_cate_tree');
		$lang['navlist_middle'] = $this->get_site_nav('middle');
		//$lang['brandmenu'] = $this->action('brands','_get_brand_menu');
		$lang['help_article'] = $this->_help_article();
		
		$this->title('宝泰商城-页面丢失了');
		$this->set('lang',$lang);
		$this->template('404');
		exit;
	}
	
	function get_site_nav($t='middle'){
			   $cache = Import::ajincache();
			   $cache->SetFunction(__FUNCTION__);
			   $cache->SetMode('sitemes');
			   $fn = $cache->fpath(func_get_args());
			   if(file_exists($fn)&&!$cache->GetClose()){
							include($fn);
			   }
			   else
			   {
							$rts = array();
							$sql = "SELECT * FROM `{$this->App->prefix()}nav` WHERE is_show = '1' AND type = '$t' ORDER BY vieworder ASC, id ASC";
							$rt = $this->App->find($sql);
							$tr = explode('.',basename($_SERVER['PHP_SELF']));
							if(!empty($rt)){
									$site = Common::class_url();
									foreach($rt as $row){
											$dtr[0] = "";
											if( !empty($row['url']) && strpos($row['url'],'.') ) $dtr = explode('.',basename($row['url']));
											if(isset($tr[0]) && $tr[0]== $dtr[0]) $row['active'] = 1; else $row['active'] = 0;
											$row['url'] = get_url($row['name'],$row['cid'],$site.$row['url'],'nav');
											$rts[] = $row;
									}
									unset($rt);
							}
							$cache->write($fn, $rts,'rts');
			   }
			 
			return $rts;
	}


	function _help_article(){
			 $cache = Import::ajincache();
			 $cache->SetFunction(__FUNCTION__);
		     $cache->SetMode('sitemes');
		     $fn = $cache->fpath(func_get_args());
			 $type = "about";
		     if(file_exists($fn)&&!$cache->GetClose()){
						include($fn);
		     }
		     else
		     {
					$sql = "SELECT tb1.*,tb2.cat_name,tb2.type FROM `{$this->App->prefix()}article` AS tb1";
					$sql .=" LEFT JOIN `{$this->App->prefix()}article_cate` AS tb2 ON tb1.cat_id=tb2.cat_id";
					$sql .=" WHERE tb2.type='$type' AND tb1.is_show='1' ORDER BY  tb2.vieworder ASC,tb1.vieworder ASC,tb1.article_id DESC";
					$rt = $this->App->find($sql);
					if(!empty($rt)){
						foreach($rt as $k=>$row){
							$rts[$row['cat_id']]['cat_name'] = $row['cat_name'];
							$rts[$row['cat_id']]['url'] = "javascript:void()";
							$rts[$row['cat_id']]['article'][$k] = $row;
							$rts[$row['cat_id']]['article'][$k]['url'] = !empty($row['external_link']) ? trim($row['external_link']) : SITE_URL.$type.'/'.$row['article_url'];		
						}
						unset($rt);
					}
				   $cache->write($fn, $rts,'rts');
             }
			return $rts;
		}
		
	/*
	*返回弹出框HTML代码的方法
	*/
	
	function ajax_popbox($boxname="",$data=array()){
		if($data['type']=='cart'){
			$gid = $data['gid'];
/*			$sql = "SELECT goods_id,goods_name,goods_thumb,shop_price,pifa_price,qianggou_price,promote_start_date,promote_end_date,is_qianggou,is_promote,qianggou_start_date,qianggou_end_date FROM `{$this->App->prefix()}goods` WHERE goods_id='{$gid}'";
			
			$rt = $this->App->findrow($sql);*/
			/*if($rt['is_promote']=='1'){
				//促销 价格
				if($rt['promote_start_date']<mktime()&&$rt['promote_end_date']>mktime()){
					$rt['promote_price'] = format_price($rt['promote_price']);
				}else{
					$rt['promote_price'] = "0.00";
				}
			}else{
				$rt['promote_price'] = "0.00";
			}
			
			if($rt['is_qianggou']=='1'){
				//促销 价格
				if($rt['qianggou_start_date']<mktime()&&$rt['qianggou_end_date']>mktime()){
					$rt['qianggou_price'] = format_price($rt['qianggou_price']);
				}else{
					$rt['qianggou_price'] = "0.00";
				}
			}else{
				$rt['qianggou_price'] = "0.00";
			}*/
		}
		$cart = $this->Session->read('cart');
		//$rt['number'] = $data['num'];
		$this->set('thisgid',$gid);
		$this->set('cart',$cart);
		$con = "";
		if(!empty($boxname)) $con = $this->fetch($boxname,true);
		echo $con; exit;
	}
}
?>