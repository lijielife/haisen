<?php
class AboutController extends Controller{
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
		$this->js(array('common.js','menu.js'));
		$this->css(array('jquery_dialog.css','comman.css','menber.css','new.css'));
    }
	
	//分类
    function index($cat_id=0,$page=0){ 
        $rt = $this->Cache->read(3600);
		$type = 'about';
		
        if(is_null($rt)) {
				$parent_id = true;
				if(empty($cat_id)){
					$cat_id = $this->App->findvar("SELECT cat_id FROM `{$this->App->prefix()}article_cate` WHERE type='$type' AND parent_id='0' ORDER BY cat_id ASC");
					$parent_id = false;
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
						   $urlobj[] = $this->__module;
						   $urlobj[] = 'index';
						   if($rows['parent_id']!=0) $urlobj[] = $rows['cat_id'];
						   
						   $thishear[] = '&nbsp;&gt;&nbsp;<a href="javascript:;">'.$rows['cat_name'].'</a>';
						   unset($urlobj);
					}
					unset($rts,$rts_);
				}
				$rt['here'] = implode('',$thishear);
				unset($thishear);
				
	
				//文章列表
				$sql = "SELECT tb1.article_title,tb1.article_id,tb2.cat_name,tb2.cat_id FROM `{$this->App->prefix()}article` AS tb1";
				$sql .= " LEFT JOIN `{$this->App->prefix()}article_cate` AS tb2";
				$sql .= " ON tb1.cat_id = tb2.cat_id";
				$sql .=" WHERE tb2.type='$type' ORDER BY tb1.vieworder ASC,tb1.article_id DESC";
				$article_list = $this->App->find($sql);
				if(!empty($article_list)){
					foreach($article_list as $k=>$row){
						$dd[] = $this->__module;
						$dd[] = 'article';
						$dd[] = $row['article_id'];
						$rt['article_list'][$row['cat_name']][$k] = $row;
						$rt['article_list'][$row['cat_name']][$k]['url'] = get_url($row['article_title'],$row['article_id'],SITE_URL.$type.'.php?id='.$row['article_id'],'article',array($row['type'],'article',$row['article_id']));
						unset($dd);
					}
					unset($article_list);
				}
				
				//查找一篇文章
				$rt['article_con'] = array();
				$sql = "SELECT tb1.* FROM `{$this->App->prefix()}article` AS tb1";
				$sql .= " LEFT JOIN `{$this->App->prefix()}article_cate` AS tb2";
				$sql .= " ON tb1.cat_id = tb2.cat_id";
				$sql .=" WHERE tb2.type='$type' AND tb1.cat_id!='88' ORDER BY tb1.vieworder ASC LIMIT 1";
				$rt['article_con'] = $this->App->findrow($sql);
				$rt['article_con']['article_img'] = !empty($rt['article_con']['article_img']) ? SITE_URL.$rt['article_con']['article_img'] : "";

				$rt['showtmp'] = "article_".$type;
			
            $this->Cache->write($rt);
         }
			
			//页面头信息
			 $title = $rt['article_con']['article_title'];
			 $this->title($title.' - '.$GLOBALS['LANG']['site_name']);
			 $this->meta("title",$title);
			 $this->meta("keywords",$rt['article_con']['meta_keys']);
			 $this->meta("description",$rt['article_con']['meta_desc']);

			 $this->set('rt',$rt);
			 $this->template($rt['showtmp']);	
    }
	
	function article($id=0){
		if(!($id>0)){ 
			$this->action('common','show404tpl');
		}//$this->jump(SITE_URL); exit;}
        $rt = $this->Cache->read(3600);
	//	$type = 'default';
		$type = 'about';
        if(is_null($rt)) {
			  //查询文章的基本信息
                $sql = "SELECT tb1.*,tb2.cat_name,tb2.type FROM `{$this->App->prefix()}article` AS tb1";
                $sql .=" LEFT JOIN `{$this->App->prefix()}article_cate` AS tb2";
                $sql .=" ON tb1.cat_id = tb2.cat_id";
                $sql .=" WHERE tb1.article_id='$id'";
                $rt['article_con'] = $this->App->findrow($sql);
				//$rt['article_con']['article_img'] = !empty($rt['article_con']['article_img']) ? SITE_URL.$rt['article_con']['article_img'] : "";
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
						$hear[] = '&nbsp;&gt;&nbsp;<a href="javascript:;">'.$rows['cat_name'].'</a>';
						unset($urlobj);
                    }
                    unset($rts,$rts_);
                }
				$rt['here'] = implode('',$hear);
				unset($hear);
				
                $cid = $rt['article_con']['cat_id'] ? $rt['article_con']['cat_id'] : 0;
			
				//全站banner
				$rt['quanzhan'] = $this->action('banner','quanzhan');
				
				//文章列表
				$sql = "SELECT tb1.article_title,tb1.article_id,tb2.cat_name,tb2.cat_id FROM `{$this->App->prefix()}article` AS tb1";
				$sql .= " LEFT JOIN `{$this->App->prefix()}article_cate` AS tb2";
				$sql .= " ON tb1.cat_id = tb2.cat_id";
				$sql .=" WHERE tb2.type='$type' ORDER BY tb1.vieworder ASC,tb1.article_id DESC";
				$article_list = $this->App->find($sql);
				if(!empty($article_list)){
					foreach($article_list as $k=>$row){
						$dd[] = $this->__module;
						$dd[] = 'article';
						$dd[] = $row['article_id'];
						$rt['article_list'][$row['cat_name']][$k] = $row;
						//$rt['article_list'][$row['cat_name']][$k]['url'] = SITE_URL.'about/'.$row['article_id'].'/';
						$rt['article_list'][$row['cat_name']][$k]['url'] = get_url($row['article_title'],$row['article_id'],SITE_URL.$type.'.php?id='.$row['article_id'],'article',array($row['type'],'article',$row['article_id']));
						unset($dd);
					}
					unset($article_list);
				}
			
		 $this->Cache->write($rt);
		}
		//print_r($rt);
		$title = $rt['article_con']['article_title'];
		$this->title($title.' - '.$GLOBALS['LANG']['site_name']);
		$this->meta("title",$title);
		$this->meta("keywords",$rt['article_con']['meta_keys']);
		$this->meta("description",$rt['article_con']['meta_desc']);
		$this->set('rt',$rt);
		$this->template('article_'.$type);
	}//end 
	
}

