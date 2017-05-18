<?php
class CatalogModel extends Model{
		//goods category count
		function __get_goods_count_category($data=array()){
			  $data['count_where'] = 1;
			  $bid = $data['bid'];
			  $w = $this->__category_goods_where($data);
			  $sql = "SELECT COUNT(distinct g.goods_id) FROM `{$this->prefix()}goods` AS g";
			  $sql .=" LEFT JOIN `{$this->prefix()}goods_cate` AS gc ON gc.cat_id = g.cat_id";
			  $sql .=" LEFT JOIN `{$this->prefix()}category_sub_goods` AS csg ON g.goods_id=csg.goods_id";
			  if($bid>0){
			  	$sql .=" LEFT JOIN `{$this->prefix()}brand` AS b ON b.brand_id = g.brand_id";
			  }
			  
			  $maxattr = count($data['attr']);
			  $ws = '';
			  if($maxattr>0){
					$comd = array();
					foreach($data['attr'] as $i=>$val){
						if(empty($val)) continue;
						$comd[] = "ga".$i.".attr_value = '".$val."'"; //属性
						$sql .=" LEFT JOIN `{$this->prefix()}goods_attr` AS ga".$i." ON ga".$i.".goods_id = g.goods_id";
					}
					if(!empty($comd)){
						$ws = "AND ".implode(' AND ',$comd);
					}
			  }
			  $sql .=" $w $ws";
			  return $this->findvar($sql);
		}
		
		//goods category list
		function __get_categoods_list_category($data,$orderby,$start,$list){
			$w = $this->__category_goods_where($data);
			$bid = $data['bid'];
			$sql = "SELECT distinct g.*,gc.cat_name FROM `{$this->prefix()}goods` AS g";
			$sql .=" LEFT JOIN `{$this->prefix()}goods_cate` AS gc ON gc.cat_id = g.cat_id";
			$sql .=" LEFT JOIN `{$this->prefix()}category_sub_goods` AS csg ON g.goods_id=csg.goods_id";
			if($bid>0){
			  $sql .=" LEFT JOIN `{$this->prefix()}brand` AS b ON b.brand_id = g.brand_id";
			}
			
			 $maxattr = count($data['attr']);
			 $ws = '';
			 if($maxattr>0){
					$comd = array();
					foreach($data['attr'] as $i=>$val){
						if(empty($val)) continue;
						$comd[] = "ga".$i.".attr_value = '".$val."'"; //属性
						$sql .=" LEFT JOIN `{$this->prefix()}goods_attr` AS ga".$i." ON ga".$i.".goods_id = g.goods_id";
					}
					if(!empty($comd)){
						$ws = "AND ".implode(' AND ',$comd);
					}
			  }
			$sql .=" $w $ws $orderby LIMIT $start, $list";
			$rt = $this->find($sql);
			$goodslist = array();
			if(!empty($rt)){
				foreach($rt as $k=>$row){
					$goodslist[$k] = $row;
					$goodslist[$k]['url'] = SITE_URL.$row['goods_url'].'.html';
					$goodslist[$k]['goods_thumb'] =  is_file(SYS_PATH.$row['goods_thumb']) ? SITE_URL.$row['goods_thumb'] : SITE_URL.'theme/images/no_picture.gif';
					$goodslist[$k]['goods_img'] =  is_file(SYS_PATH.$row['goods_img']) ? SITE_URL.$row['goods_img'] : SITE_URL.'theme/images/no_picture.gif';
					$goodslist[$k]['original_img'] =  is_file(SYS_PATH.$row['original_img']) ? SITE_URL.$row['original_img'] : SITE_URL.'theme/images/no_picture.gif';
				}
				unset($rt);
			}
			return $goodslist;
		}
		
		//where
		function __category_goods_where($data= array()){
			if(empty($data)) return "";
			$cid = isset($data['cid'])&&intval($data['cid'])>0 ? intval($data['cid']) : 0;
			$bid = isset($data['bid'])&&intval($data['bid'])>0 ? intval($data['bid']) : 0;
			$keyword = isset($data['keyword']) ? $data['keyword'] : "";
			$price = isset($data['price']) ? $data['price'] : "";
			
			$comd[] = "g.is_on_sale = '1' AND g.is_delete = '0' AND g.is_alone_sale='1'";						

			if($cid>0){ //子分类
				$sub_cid = $this->get_goods_sub_cat_ids_model($cid); //子分类id
			    $comd[] = "(g.cat_id".db_create_in($sub_cid)." OR csg.cat_id='$cid')"; 
			}
			if($bid > 0) $comd[] = "b.brand_id = '$bid'";  			//品牌
	
			if(!empty($price)){ //价格
					$p_ar = @explode('-',$price);
					if(count($p_ar)==2){
						if(empty($p_ar[1]))  $p_ar[1]=10000;
						sort($p_ar);
						$price1 = intval(trim($p_ar[0]));
						$price2 = intval(trim($p_ar[1]));
						if($price1>=0 &&$price2>0){
							$comd[] = "(g.pifa_price between $price1 and $price2)";
						}
					}
			}

			
			if(!empty($keyword)){
				 $act = array('is_best','is_new','is_hot','is_promote','is_qianggou');
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
							$comd[] = "AND g.is_promote = '1' AND g.promote_start_date <= '$time' AND g.promote_end_date >= '$time'";							
					}
				 }else{
				 	$comd[] = "(gc.cat_name LIKE '%$keyword%' OR g.goods_name LIKE '%$keyword%' OR g.meta_keys LIKE '%$keyword%')";
					if(!isset($data['count_where'])){
						//如果是通过搜索进来的，那么将关键字添加到数据库表中
						$keyid = $this->findvar("SELECT key_id FROM `{$this->prefix()}stats_keywords` WHERE keyword='$keyword' LIMIT 1");
						if(empty($keyid)){
							//插入
							$dd = array();
							$n = Import::basic()->Pinyin($keyword);
							$dd['tag_n'] = !empty($n) ? ucwords(substr($n,0,1)) : "NAL";
							$dd['keyword'] = $keyword;
							$dd['date'] = date('Y-m-d',mktime());
							$dd['count'] = 1;
							$this->insert('stats_keywords',$dd);
							unset($dd);
						}else{ 
							//数量增加1
							$sd = "UPDATE `{$this->prefix()}stats_keywords` SET `date` = '".date('Y-m-d',mktime())."',`count`=`count`+1 WHERE `key_id` = '$keyid' LIMIT 1";
							$this->query($sd);
						}
					}
				 }
			}
			$w = "";
			if(!empty($comd)){
				 $w = "WHERE ".implode(' AND ',$comd);
			}
			return  $w;
	}
		
	################由于调用不了controller.php的方法，所以在这里重写定义了##################	
	//获商品子自分类cat_id
	function get_goods_sub_cat_ids_model($cid=0){
		//if(!($cid>=0)) return false;
		$rts = $this->get_goods_cate_tree_model($cid);
		$cids[] = $cid;
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
	function get_goods_cate_tree_model($cid = 0)
	{
		$three_arr = array();
		$sql = 'SELECT count(cat_id) FROM `'.$this->prefix()."goods_cate` WHERE parent_id = '$cid' AND is_show = 1";
		if ($this->findvar($sql) || $cid == 0)
		{
			$sql = 'SELECT tb1.cat_name,tb1.cat_id,tb1.parent_id,tb1.is_show,tb1.cat_title,tb1.cat_desc, tb1.keywords,tb1.show_in_nav,tb1.sort_order, COUNT(tb2.cat_id) AS goods_count FROM `'.$this->prefix()."goods_cate` AS tb1";
			$sql .=" LEFT JOIN `{$this->prefix()}goods` AS tb2";
			$sql .=" ON tb1.cat_id = tb2.cat_id";
			$sql .= " WHERE tb1.parent_id = '$cid' GROUP BY tb1.cat_id ORDER BY tb1.parent_id ASC,tb1.sort_order ASC, tb1.cat_id ASC";
			$res = $this->find($sql); 
			foreach ($res as $row)
			{
			   $three_arr[$row['cat_id']]['id']   = $row['cat_id'];
			   $three_arr[$row['cat_id']]['name'] = $row['cat_name'];
			   $three_arr[$row['cat_id']]['is_show']   = $row['is_show'];
			   $three_arr[$row['cat_id']]['show_in_nav'] = $row['show_in_nav'];
			   $three_arr[$row['cat_id']]['cat_title']   = $row['cat_title'];
			   $three_arr[$row['cat_id']]['sort_order'] = $row['sort_order'];
			   $three_arr[$row['cat_id']]['goods_count'] = $row['goods_count'];
			   $three_arr[$row['cat_id']]['keywords'] = $row['keywords'];
			   $three_arr[$row['cat_id']]['cat_desc'] = $row['cat_desc'];
			   $three_arr[$row['cat_id']]['url'] = get_url($row['cat_name'],$row['cat_id'],"catalog.php?cid=".$row["cat_id"],'goodscate',array('catalog','index',$row['cat_id']));
			   
			    if (isset($row['cat_id']) != NULL)
				{
					 $three_arr[$row['cat_id']]['cat_id'] = $this->get_goods_cate_tree_model($row['cat_id']);
				}
			}
		}
		return $three_arr;
	}
	#############################
}
?>