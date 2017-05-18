<?php
class BannerController extends Controller{

	//全站banner
	function quanzhan(){
			$sql = "SELECT tb1.*,tb2.ad_name AS ad_tag FROM `{$this->App->prefix()}ad_content` AS tb1";
			$sql .=" LEFT JOIN `{$this->App->prefix()}ad_position` AS tb2 ON tb1.tid = tb2.tid";
			$sql .=" WHERE tb1.is_show='1' AND tb2.ad_name LIKE '%全站%' ORDER BY tb1.uptime DESC,tb1.addtime DESC LIMIT 1";
			$rt = $this->App->findrow($sql);
			$rt['ad_img'] = !empty($rt['ad_img']) ? SITE_URL.$rt['ad_img'] : "";
		
			return $rt;
	}
	
	//首页轮播
	function index_lunbo(){
			$sql = "SELECT tb1.*,tb2.ad_name AS ad_tag FROM `{$this->App->prefix()}ad_content` AS tb1";
			$sql .=" LEFT JOIN `{$this->App->prefix()}ad_position` AS tb2 ON tb1.tid = tb2.tid";
			$sql .=" WHERE tb1.is_show='1' AND tb2.ad_name LIKE '%首页轮播%' ORDER BY tb1.uptime DESC,tb1.addtime DESC LIMIT 4";
			$index_lunbo = $this->App->find($sql);
			if(!empty($index_lunbo)){
				foreach($index_lunbo as $k=>$row){
					$rt[$k] = $row;
					$rt[$k]['ad_img'] = !empty($row['ad_img'])? str_replace('data/flashdata/dynfocus/','',SITE_URL).$row['ad_img']:"";
				} 
				unset($index_lunbo);
			}
			return $rt;
	}
	
	//人气排行 //  新品上市
	function index_hot_banner($key=""){
			if(empty($key)) return array();
			$sql = "SELECT tb1.*,tb2.ad_name AS ad_tag FROM `{$this->App->prefix()}ad_content` AS tb1";
			$sql .=" LEFT JOIN `{$this->App->prefix()}ad_position` AS tb2 ON tb1.tid = tb2.tid";
			$sql .=" WHERE tb1.is_show='1' AND tb2.ad_name LIKE '%$key%' ORDER BY tb1.uptime DESC,tb1.addtime DESC LIMIT 1";
			$rt = $this->App->findrow($sql);
			$rt['ad_img'] = !empty($rt['ad_img']) ? SITE_URL.$rt['ad_img'] : "";
		
			return $rt;
	}
	
	/*
	banner管理
	@$key:广告tag名称
	@$id:分类id
	@$type:产品分类(gc)还是文字分类(ac)
	@@list:查询几条广告
	*/
	function banner($key="",$list=1,$id=0,$type='gc'){
		$sql = "SELECT tb1.*,tb2.ad_name FROM `{$this->App->prefix()}ad_content` AS tb1";
		$sql .=" LEFT JOIN `{$this->App->prefix()}ad_position` AS tb2 ON tb1.tid = tb2.tid";
		if($id>0 && !empty($key)){
			$sql .=" WHERE tb1.cat_id = '$id' AND tb1.is_show='1' AND tb1.type='$type' AND tb2.ad_name LIKE '%$key%' ORDER BY tb1.uptime DESC,tb1.addtime DESC LIMIT $list";
		}elseif($id>0){
			$sql .=" WHERE tb1.cat_id = '$id' AND tb1.is_show='1' AND tb1.type='$type' ORDER BY tb1.uptime DESC,tb1.addtime DESC LIMIT $list";
			
		}elseif(!empty($key)){
			$sql .=" WHERE tb1.is_show='1' AND tb2.ad_name LIKE '%$key%' ORDER BY tb1.uptime DESC,tb1.addtime DESC LIMIT $list";
		}else{
			return array();
		}
		if($list==1){
			return $this->App->findrow($sql);
		}elseif($list>1){
			return $this->App->find($sql);
		}else{
			return array();
		}
	}
}
?>