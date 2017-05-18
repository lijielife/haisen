<?php
class CategoryController extends Controller{
	
	function ajax_article_list($cid=0,$page=1,$type='new',$list=10){
			//下级分类ID
			if(!($cid>0)){
				echo "获取数据失败！"; exit;
			}
			
			$sourceid = array($cid);
			$get_cid = $this->get_sub_cat_ids($cid,$type);
			if(!empty($get_cid)){
				$subcid=array_merge($get_cid,$sourceid);
			}else{
				$subcid = $sourceid;
			}
			unset($sourceid,$get_cid);

			//分页
			if(empty($page)){
				$page = 1;
			}
			if(!($list>0)) $list = 10;
			$start = ($page-1)*$list;
			$sql = "SELECT COUNT(article_id) FROM `{$this->App->prefix()}article` WHERE is_show='1' AND cat_id IN(".@implode(',',$subcid).")";
			$tt = $this->App->findvar($sql);
					
			$rt['categorypage'] = Import::basic()->ajax_page($tt,$list,$page,'get_cate'.$type.'_page_list',array($cid));
			
			//获取内容列表
			  $sql = "SELECT * FROM `{$this->App->prefix()}article` WHERE is_show='1' AND cat_id IN(".@implode(',',$subcid).") ORDER BY is_top DESC,vieworder ASC,article_id DESC LIMIT $start,$list";
			  $rt['catecon'] = $this->App->find($sql);
			  if(!empty($rt['catecon'])){
					foreach($rt['catecon'] as $k=>$row){
						if(!empty($row['article_img'])){
							$pa = dirname($row['article_img']);
							$thumb = basename($row['article_img']);
							$rt['catecon'][$k]['thumb'] =  $pa.'/thumb_b/'.$thumb;
						}else{
							$rt['catecon'][$k]['thumb'] = "";
						}
						$rt['catecon'][$k]['url'] = get_url($row['article_title'],$row['article_id'],'article.php?id='.$row['article_id'],'article',array($type,'index',$row['article_id']));
					}

			  }else{
					$rt['catecon'] = array();
			  }
			  $this->set('rt',$rt);
			  $con = $this->fetch('ajax_'.$type.'_connent',true);
			  echo $con; exit;
	}
	
    //获子自分类cat_id
    function get_sub_cat_ids($cid=0,$type=""){ 
            $rts = $this->get_cate_tree($cid,$type);
           // $cids[] = $cid;
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

    //获取分类
    function get_cate_tree($cid = 0,$type="")
    { 
			 $cache = Import::ajincache();
             $cache->SetFunction(__FUNCTION__);
             $cache->SetMode(str_replace('Controller','',__CLASS__));
             $fn = $cache->fpath(func_get_args());
			 $t = $type;
             if(file_exists($fn)&&!$cache->GetClose()){
                      include($fn);
             }
             else
             {

                if(!empty($type)){
                        $typ = " AND type='$type'";
                        $type = " AND tb1.type='$type'";
                }
                $three_arr = array();
                $sql = 'SELECT count(cat_id) FROM `'.$this->App->prefix()."article_cate` WHERE parent_id = '$cid' AND is_show = 1 $typ";
                if ($this->App->findvar($sql) || $cid == 0)
                {
                        $sql = 'SELECT tb1.cat_name,tb1.cat_id,tb1.parent_id,tb1.is_show,tb1.cat_title,tb1.meta_desc, tb1.meta_keys,tb1.show_in_nav,tb1.addtime,tb1.cat_img,tb1.vieworder, COUNT(tb2.cat_id) AS article_count FROM `'.$this->App->prefix()."article_cate` AS tb1";
                        $sql .=" LEFT JOIN `{$this->App->prefix()}article` AS tb2";
                        $sql .=" ON tb1.cat_id = tb2.cat_id";
                        $sql .= " WHERE tb1.parent_id = '$cid' $type GROUP BY tb1.cat_id ORDER BY tb1.parent_id ASC,tb1.vieworder ASC, tb1.cat_id ASC";
                        $res = $this->App->find($sql);
                        foreach ($res as $row)
                        {
                           $three_arr[$row['cat_id']]['id']   = $row['cat_id'];
                           $three_arr[$row['cat_id']]['name'] = $row['cat_name'];
						   $three_arr[$row['cat_id']]['addtime'] = $row['addtime'];
						   $three_arr[$row['cat_id']]['url'] = get_url($row['cat_name'],$row['cat_id'],"category.php?cid=".$row["cat_id"],'category',array($t,'index',$row['cat_id']));
						   $three_arr[$row['cat_id']]['article_count'] = $row['article_count'];
						   
                           /*$three_arr[$row['cat_id']]['is_show']   = $row['is_show'];
                           $three_arr[$row['cat_id']]['show_in_nav'] = $row['show_in_nav'];
                           $three_arr[$row['cat_id']]['cat_title']   = $row['cat_title'];
                           $three_arr[$row['cat_id']]['cat_img'] = $row['cat_img'];
                           $three_arr[$row['cat_id']]['vieworder'] = $row['vieworder'];
                           $three_arr[$row['cat_id']]['meta_keys'] = $row['meta_keys'];
                           $three_arr[$row['cat_id']]['meta_desc'] = $row['meta_desc'];*/

                            if (isset($row['cat_id']) != NULL)
                                {
                                         $three_arr[$row['cat_id']]['cat_id'] = $this->get_cate_tree($row['cat_id'],$t);
                                }
                        }
                } 
               $cache->write($fn, $three_arr,'three_arr');
             }
            return $three_arr;
    }

}

