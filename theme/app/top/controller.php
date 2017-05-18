<?php
class TopController extends Controller{
 	function  __construct() {
          
	}
	
    function index($id=0){
		$this->css("top.css");
		$this->js('time.js');
		//if(!($id>0)) $id = 6;
		if(!($id>0)){
			$id = $this->App->findvar("SELECT topic_id FROM `{$this->App->prefix()}topic` WHERE end_time > '$time' ORDER BY topic_id DESC LIMIT 1");
			//$this->action('common','show404tpl');
		}
		$json = Import::json();
		$rt = $this->Cache->read(3600);
	 	if(is_null($rt)){
			$time = mktime();
			$sql = "SELECT * FROM `{$this->App->prefix()}topic` WHERE topic_id='$id' AND end_time > '$time' LIMIT 1";
			$rt['info'] = $this->App->findrow($sql);
			if(empty($rt['info'])){
				$this->jump(SITE_URL,'',"该专题已经超过有效期！");
			}
			$rt['info']['goods_ids'] = addcslashes($rt['info']['goods_ids'], "'");
			$tmp = @unserialize($rt['info']["goods_ids"]);
			$arr = (array)$tmp;
				
			$goods_id = array();

			foreach ($arr AS $key=>$value)
			{
				foreach($value AS $k => $val)
				{
					$opt = explode('|', $val);
					$arr[$key][$k] = $opt[1];
					$goods_id[] = $opt[1];
				}
			}
			
			$sql = "SELECT goods_id,goods_name,goods_thumb,goods_img,shop_price,pifa_price FROM `{$this->App->prefix()}goods` WHERE goods_id IN(".implode(',',$goods_id).")";
			$rts = $this->App->find($sql);
			foreach($rts as $rows){
			
				 foreach ($arr AS $key => $value)
				{
					foreach ($value AS $val)
					{
						if ($val == $rows['goods_id'])
						{
							$key = $key == 'default' ? 'default' : $key;
							$sort_goods_arr[$key][] = $rows;
						}
					}
				}
				
			}
			
			$rt['goodslist'] = $sort_goods_arr;
			unset($sort_goods_arr,$tts);
			
			//预告
			$t1 = date('Y-m-d',mktime()+24*3600);
			//$t2 = date('Y-m-d',mktime()-24*3600);
			$rt['yugao'] = array();
			$sql = "SELECT tb1.article_title,tb1.article_img,tb2.cat_name,tb2.cat_title AS date1 FROM `{$this->App->prefix()}article` AS tb1 LEFT JOIN `{$this->App->prefix()}article_cate` AS tb2 ON tb1.cat_id = tb2.cat_id WHERE tb2.type='case' AND tb2.cat_name ='$t1'  ORDER BY tb2.cat_title DESC";
			$rt['yugao'] = $this->App->find($sql);
		
			$this->Cache->write($rt);
		}
		
		$title = $rt['info']['topic_name'];
		$this->title($title.' - '.$GLOBALS['LANG']['site_name']);
		$this->meta("title",$title);
		$this->meta("keywords",htmlspecialchars($rt['info']['meta_keys']));
		$this->meta("description",htmlspecialchars($rt['info']['meta_desc']));
		$this->set('rt',$rt);

	    $this->template('topgoods');
	}
	
	function yugaohoutian(){
		$this->layout('kong');
		//预告
		$t1 = date('Y-m-d',mktime()+24*3600*2);
		$rt['yugao'] = array();
		$sql = "SELECT tb1.article_title,tb1.article_img,tb2.cat_name,tb2.cat_title AS date1 FROM `{$this->App->prefix()}article` AS tb1 LEFT JOIN `{$this->App->prefix()}article_cate` AS tb2 ON tb1.cat_id = tb2.cat_id WHERE tb2.type='case' AND tb2.cat_name ='$t1'  ORDER BY tb2.cat_title DESC";
		$rt['yugao'] = $this->App->find($sql);
		$this->set('rt',$rt);
	 	$this->template('yugaohoutian');
	}
	
}
?>