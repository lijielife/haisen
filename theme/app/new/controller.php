<?php
class NewController extends Controller{
    /**
     * @Photo Index
     * @param <type> $page
     * @param <type> $type
     */

     //构造函数，自动新建对象
    function  __construct() {
            /*
            *构造函数
            */
		$this->js(array('common.js','menu.js'));
		$this->css(array('jquery_dialog.css','comman.css','new.css'));
    }
	
    function index($cat_id=0,$page=0){ 
        $rt = $this->Cache->read(3600);
		$type = 'new';
        if(is_null($rt)) {
				if(empty($cat_id)){
					$cat_id = $this->App->findvar("SELECT cat_id FROM `{$this->App->prefix()}article_cate` WHERE type='$type' AND parent_id='0' ORDER BY cat_id ASC");
				 }
				//获取当前分类信息
				$sql = "SELECT * FROM `{$this->App->prefix()}article_cate` WHERE type='$type' AND cat_id='$cat_id' LIMIT 1";
				$rt['catemes'] = $this->App->findrow($sql);
				if(empty($rt['catemes'])){ $this->jump(SITE_URL); exit;}
				
				//当前位置
				$thishear = array();
				$rts_ = $this->action('article','get_parent_cats',$cat_id);
				$rts = Import::basic()->array_sort($rts_,'cat_id');
				$thishear[] = '<a href="'.SITE_URL.'">首页</a>';
				if(!empty($rts)){
					foreach($rts as $rows){
						   $url = get_url($rows['cat_name'],$rows['cat_id'],$type.'.php?cid='.$rows['cat_id'],'category',array($type,'index',$row['cat_id']));
						   $thishear[] = '&nbsp;&gt;&nbsp;<a href="'.$url.'">'.$rows['cat_name'].'</a>';
					}
					unset($rts,$rts_);
				}
				$rt['here'] = implode('',$thishear);
				unset($thishear);
			
				 //下级分类ID
				$sourceid = array($cat_id);
				$get_cid = $this->action('article','get_sub_cat_ids',$cat_id,$type);
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
				$list = 30;
				$start = ($page-1)*$list;
				$sql = "SELECT COUNT(article_id) FROM `{$this->App->prefix()}article` WHERE is_show='1' AND cat_id IN(".@implode(',',$subcid).")";
				$tt = $this->App->findvar($sql);
				$rt['categorypage'] = Import::basic()->ajax_page($tt,$list,$page,'get_catenew_page_list',array($cat_id));


				 //获取内容列表
				  $sql = "SELECT * FROM `{$this->App->prefix()}article` WHERE is_show='1' AND cat_id IN(".@implode(',',$subcid).") ORDER BY is_top DESC,vieworder ASC, article_id DESC LIMIT $start,$list";
				  $rt['catecon'] = $this->App->find($sql);
				  if(!empty($rt['catecon'])){
						foreach($rt['catecon'] as $k=>$row){
							$dd[] = $this->__module;
							$dd[] = 'article';
							$dd[] = $row['article_id'];
							$rt['catecon'][$k]['url'] = get_url($row['article_title'],$row['article_id'],$type.'.php?id='.$row['article_id'],'article',$dd);
							unset($dd);
							//$rt['catecon'][$k]['sortdesc'] =!empty($row['about']) ? $row['about'] : (!empty($row['content']) ? Import::basic()->wordcut($row['content'],250) : $row['article_title']);
						}

				  }else{
						$rt['catecon'] = array();
				  }
				
				//二级分类
				  $sql = "SELECT cat_id,cat_name FROM `{$this->App->prefix()}article_cate` WHERE type='$type' AND parent_id='0' AND is_show='1' ORDER BY vieworder ASC";
				  $sub_cate_ = $this->App->find($sql);
				  $rt['sub_cate'] = array();
				  if(!empty($sub_cate_)){
					  foreach($sub_cate_ as $k=>$row){
						  $rt['sub_cate'][$k] = $row;
					  	  $rt['sub_cate'][$k]['url'] = get_url($row['cat_name'],$row['cat_id'],$type.'.php?cid='.$row['cat_id'],'category',array($type,'index',$row['cat_id']));
					  }
					  unset($sub_cate_);
				  }
					
				 //推荐商品
				$rt['tuijian'] = $this->action('comment','tuijian_goods',3);
				
				//商品分类列表		
				$rt['menu'] = $this->action('catalog','get_goods_cate_tree');
            $this->Cache->write($rt);
         }

			 //页面头信息
			$title = (!empty($rt['catemes']['cat_title']) ? $rt['catemes']['cat_title'] : $rt['catemes']['cat_name']);
			$this->title($title.' - '.$GLOBALS['LANG']['site_name']);
			$this->meta("title",$title);
			$this->meta("keywords",$rt['catemes']['meta_keys']);
			$this->meta("description",$rt['catemes']['meta_desc']);
			$this->set('rt',$rt);
			$this->template('con_'.$type);	
    }
	
	function article($id=0){
		if(!($id>0)){ $this->jump(SITE_URL); exit;}
		$type = 'new';
        $rt = $this->Cache->read(3600);
        if(is_null($rt)) {
			  //查询文章的基本信息
                $sql = "SELECT tb1.*,tb2.cat_name,tb2.type FROM `{$this->App->prefix()}article` AS tb1";
                $sql .=" LEFT JOIN `{$this->App->prefix()}article_cate` AS tb2";
                $sql .=" ON tb1.cat_id = tb2.cat_id";
                $sql .=" WHERE tb1.article_id='$id'";
                $rt['article_con'] = $this->App->findrow($sql);
				
                if(empty($rt['article_con'])){ $this->jump(SITE_URL); exit;}
                if(is_file(SYS_PATH.$rt['article_con']['article_img'])){
                    $rt['article_con']['article_img'] = str_replace('\\','/',$rt['article_con']['article_img']);
                    $rt['article_con']['article_img'] = SITE_URL.$rt['article_con']['article_img'];
                    $q = dirname($rt['article_con']['article_img']);
                    $h = basename($rt['article_con']['article_img']);
                    $rt['article_con']['thumb_s'] = SITE_URL.$q.'/thumb_s/'.$h;
                    $rt['article_con']['thumb_b'] = SITE_URL.$q.'/thumb_b/'.$h;
                }else{
                    $rt['article_con']['thumb_s'] = "";
                    $rt['article_con']['thumb_b'] = "";
                }
                $rt['article_con']['addtime'] = date('Y-m-d',$rt['article_con']['addtime']);
				
				//获取当前位置
                $hear = array();
				$hear[] = '<a href="'.SITE_URL.'">首页</a>';
                $rts_ = $this->action('article','get_parent_cats',$rt['article_con']['cat_id']);
                $rts = Import::basic()->array_sort($rts_,'cat_id'); //排序
                if(!empty($rts)){
                    foreach($rts as $rows){
						$url = get_url($rows['cat_name'],$rows['cat_id'],$type.'.php?cid='.$rows['cat_id'],'category',array($type,'index',$row['cat_id']));
						$hear[] = '&nbsp;&gt;&nbsp;<a href="'.$url.'">'.$rows['cat_name'].'</a>';
                    }
                    unset($rts,$rts_);
                }
				$rt['here'] = implode('',$hear);
				unset($hear);
				
                $cid = $rt['article_con']['cat_id'] ? $rt['article_con']['cat_id'] : 0;

				##########start 分类下的广告#########
            if(!empty($cid)){  // start 如果当前分类的id不为空
                $sql = "SELECT * FROM `{$this->App->prefix()}ad_content` WHERE cat_id = '$cid' AND type='ac' AND is_show='1' ORDER BY RAND() LIMIT 1";
                $ad = $this->App->findrow($sql);
                //如果当前的分类的广告为空，那么查找相应的大分类下的随机广告
                if(empty($ad)){
					 $sql = "SELECT tb1.* FROM `{$this->App->prefix()}ad_content` AS tb1";
					 $sql .=" LEFT JOIN `{$this->App->prefix()}article_cate` AS tb2 ON tb1.cat_id=tb2.cat_id";
					 $sql .=" WHERE tb2.type='{$type}' AND tb1.is_show='1' ORDER BY RAND() LIMIT 1";
                     $ad = $this->App->findrow($sql);
                     if(empty($ad)){
                         $sql = "SELECT tb1.* FROM `{$this->App->prefix()}ad_content` AS tb1";
                         $sql .=" LEFT JOIN `{$this->App->prefix()}ad_position` tb2";
                         $sql .=" ON tb1.tid = tb2.tid";
                         $sql .=" WHERE tb1.type='ac' AND tb2.ad_name LIKE '%文章%' ORDER BY RAND() LIMIT 1";
                         $ad = $this->App->findrow($sql);
                     }

                }
                $rt['ad'] = $ad;
                if(!empty($rt['ad'])){
                        $pa = SYS_PATH.$rt['ad']['ad_img'];
                     if(is_file($pa)){
                        $rt['ad']['ad_img'] = SITE_URL.$rt['ad']['ad_img'];
                    }else{
                        $rt['ad'] = array();
                     }
                     unset($ad);
                }//end if
            }else{ // end 如果当前分类的id不为空
                $rt['ad'] = array();
            }
			
			 //全站banner
			$rt['quanzhan'] = $this->action('banner','quanzhan');
            ##########end 分类下的广告#########
			
			//文章列表
			/*$sql = "SELECT tb1.article_title,tb1.article_id FROM `{$this->App->prefix()}article` AS tb1";
			$sql .= " LEFT JOIN `{$this->App->prefix()}article_cate` AS tb2";
			$sql .= " ON tb1.cat_id = tb2.cat_id";
			$sql .=" WHERE tb2.type='$type' AND tb1.cat_id!='91' ORDER BY tb1.vieworder ASC,tb1.article_id DESC";
			$rt['article_list'] = $this->App->find($sql);
			if(!empty($rt['article_list'])){
				foreach($rt['article_list'] as $k=>$row){
					//$rt['article_list'][$k]['url'] = get_url($row['article_title'],$row['article_id'],'article.php?id='.$row['article_id'],'article',$dd);
					$rt['article_list'][$k]['url'] = SITE_URL.'article/'.$row['article_id'].'/';
				}
			}*/
			
			//二级分类
			  $sql = "SELECT cat_id,cat_name FROM `{$this->App->prefix()}article_cate` WHERE type='$type' AND parent_id='0' AND is_show='1' ORDER BY vieworder ASC";
			  $sub_cate_ = $this->App->find($sql);
			  $rt['sub_cate'] = array();
			  if(!empty($sub_cate_)){
				  foreach($sub_cate_ as $k=>$row){
					  $rt['sub_cate'][$k] = $row;
					  $rt['sub_cate'][$k]['url'] = get_url($row['cat_name'],$row['cat_id'],$type.'.php?cid='.$row['cat_id'],'category',array($type,'index',$row['cat_id']));
				  }
				  unset($sub_cate_);
			  }
			  
			  //随机文章
			  $sql = "SELECT tb1.article_title,tb1.article_id FROM `{$this->App->prefix()}article` AS tb1";
			  $sql .= " LEFT JOIN `{$this->App->prefix()}article_cate` AS tb2";
			  $sql .= " ON tb1.cat_id = tb2.cat_id";
			  $sql .=" WHERE tb2.type='$type' AND tb1.cat_id='$cid' ORDER BY RAND() LIMIT 5";
			  $rt['rand_list'] = $this->App->find($sql);
			  if(!empty($rt['rand_list'])){
					foreach($rt['rand_list'] as $k=>$row){
						$rt['rand_list'][$k]['url'] = get_url($row['article_title'],$row['article_id'],$type.'.php?id='.$row['article_id'],'article',array($type,'article',$row['article_id']));
					}
			   }
				  
			  //推荐商品
			   $rt['tuijian'] = $this->action('comment','tuijian_goods',3);
			   
		 $this->Cache->write($rt);
		}
		
		$title = $rt['article_con']['article_title'];
		$this->title($title.' - '.$GLOBALS['LANG']['site_name']);
		$this->meta("title",$title);
		$this->meta("keywords",$rt['article_con']['meta_keys']);
		$this->meta("description",$rt['article_con']['meta_desc']);
		$this->set('rt',$rt);
		$this->template('article_'.$type);
	}//end 
	
}

