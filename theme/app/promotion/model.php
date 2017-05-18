<?php
class PromotionModel extends Model{
		//获取分类下的商品数量[商品分类页面]
		function __get_goods_count_category($data=array()){
			  $w = $this->__category_goods_where($data);
			  $sql = "SELECT COUNT(distinct g.goods_id) FROM `{$this->prefix()}goods` AS g";
			  $sql .=" LEFT JOIN `{$this->prefix()}brand` AS b ON g.brand_id = b.brand_id";
			  $sql .=" LEFT JOIN `{$this->prefix()}goods_cate` AS gc ON gc.cat_id = g.cat_id";
			  $sql .=" LEFT JOIN `{$this->prefix()}category_sub_goods` AS csg ON g.goods_id=csg.goods_id";
			  $sql .=" $w";
			  return $this->findvar($sql);
		}
		//获取分类下的商品[商品分类页面]
		function __get_categoods_list_category($data,$orderby,$start,$list){
			$w = $this->__category_goods_where($data);
			$sql = "SELECT distinct g.*,b.brand_name,b.brand_id,gc.cat_name FROM `{$this->prefix()}goods` AS g";
			$sql .=" LEFT JOIN `{$this->prefix()}brand` AS b ON g.brand_id = b.brand_id";
			$sql .=" LEFT JOIN `{$this->prefix()}goods_cate` AS gc ON gc.cat_id = g.cat_id";
			$sql .=" LEFT JOIN `{$this->prefix()}category_sub_goods` AS csg ON g.goods_id=csg.goods_id";
			$sql .=" $w $orderby LIMIT $start, $list"; 
			$rt = $this->find($sql);
			$goodslist = array();
			if(!empty($rt)){
				foreach($rt as $k=>$row){
					$goodslist[$k] = $row;
					$goodslist[$k]['url'] = get_url($row['goods_name'],$row['goods_id'],'product.php?id='.$row['goods_id'],'goods',array('product','index',$row['goods_id']));
					$goodslist[$k]['goods_thumb'] =  SITE_URL.$row['goods_thumb'];
					$goodslist[$k]['goods_img'] =  SITE_URL.$row['goods_img'];
					$goodslist[$k]['original_img'] =  SITE_URL.$row['original_img'];
				}
				unset($rt);
			}
			return $goodslist;
		}
		
		function __category_goods_where($data= array()){
			if(empty($data)) return "";
			$cid = isset($data['cid'])&&intval($data['cid'])>0 ? intval($data['cid']) : 0;
			$bid = isset($data['bid'])&&intval($data['bid'])>0 ? intval($data['bid']) : 0;
			$price = isset($data['price']) ? $data['price'] : "";
			$keyword = isset($data['keyword']) ? $data['keyword'] : "";
			
			$comd[] = "g.is_on_sale = '1' AND g.is_delete = '0' AND g.is_alone_sale='1'";
			
			if(!empty($keyword)){
				 $act = array('is_best','is_new','is_hot','is_promote');
				 if(in_array($keyword,$act)){
				 	switch($keyword){
						case 'is_best':
							$comd[] = "g.is_best='1'";
							break;
						case 'is_new':
							$comd[] = "g.is_new='1'";
							break;
						case 'is_hot':
							$comd[] = "g.is_hot='1'";
							break;
						case 'is_promote':
							$time =mktime();
							$comd[] = "g.is_promote = '1' AND g.promote_start_date <= '$time' AND g.promote_end_date >= '$time'";
							break;
							
					}
				 }else{
				 	$comd[] = "(gc.cat_name LIKE '%$keyword%' OR g.goods_name LIKE '%$keyword%' OR g.goods_bianhao LIKE '%$keyword%')";
				 }
			}
			$w = "";
			if(!empty($comd)){
				 $w = "WHERE ".implode(' AND ',$comd);
			}
			return  $w;
	}
}
?>