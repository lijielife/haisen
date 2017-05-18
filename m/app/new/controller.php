<?php
class NewController extends Controller{
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
		$this->js(array('common.js'));
		$this->css(array('jquery_dialog.css','comman.css','new.css','newbanner.css'));
    }
	function guanzhu(){
		$this->css('zfyl.css');
		
		if(!defined(NAVNAME)) define('NAVNAME', "请关注我们的公众号");
		$this->title('关注我们 - '.$GLOBALS['LANG']['site_name']);
		$this->set('weixin','JaneEyre365');
		$this->template('guanzhu');
	}
	
	function search($gg=array()){
		$rt = $this->Cache->read(3600);
		$page = (isset($_GET['page'])&&intval($_GET['page'])>0) ? intval($_GET['page']) : 1;
		
		if(is_null($rt)) {
			if (empty($_GET['encode']))
			{
				if(isset($_GET['keyword'])&&!empty($_GET['keyword'])&&!in_array($_GET['keyword'],array('is_best','is_new','is_hot','is_promote'))){
					$string = array_merge($_GET, $_POST);
					$string['search_encode_time'] = time();
					$string = str_replace('+', '%2b', base64_encode(serialize($string)));
				
					header("Location: ".SITE_URL.'new.php'."?encode=$string\n");
				
					exit;
				}
			}
			else
			{ 
				$string = base64_decode(trim($_GET['encode']));
				if ($string !== false)
				{
					$string = unserialize($string);
				}
				else
				{
					$string = array();
				}
				$_GET = $_REQUEST = array_merge($_REQUEST, addslashes_deep($string));
			}
			$cat_id = (isset($_GET['cid'])&&intval($_GET['cid'])>0) ? intval($_GET['cid']) : 0; //分类ID
			$cityid = (isset($_GET['cityid'])&&intval($_GET['cityid'])>0) ? intval($_GET['cityid']) : 0; //区域ID
			$keyword = isset($_GET['keyword'])? $_GET['keyword'] : ""; //关键字
				
			$comd[] = "tb1.is_show='1'";
			$comd[] = "tb3.type='new'";
			if($cityid > 0){
				$comd[] = "tb1.district = '$cityid'";
			}
			
			//下级分类ID
			if($cat_id > 0){
				$sourceid = array($cat_id);
				$get_cid = $this->action('article','get_sub_cat_ids',$cat_id,'new');
				if(!empty($get_cid)){
					$subcid=array_merge($get_cid,$sourceid);
				}else{
					$subcid = $sourceid;
				}
				unset($sourceid,$get_cid);
				$comd[] = "(tb1.cat_id IN(".@implode(',',$subcid).") OR tb2.cat_id IN(".@implode(',',$subcid)."))";
			}
			
			if(!empty($keyword) & !(preg_match('/^.*$/u', $keyword) > 0)){
				 $keyword = Import::gz_iconv()->ec_iconv('GB2312', 'UTF8', $keyword);
			}
			if(!empty($keyword)){
				if($keyword == "输入搜索关键字"){ $this->jump(SITE_URL."new.php"); exit;}
				$comd[] = "(tb1.article_title LIKE '%$keyword%' OR tb1.meta_keys LIKE '%$keyword%' OR tb3.cat_name LIKE '%$keyword%')";
			}
			
			$w = "WHERE ".implode(' AND ',$comd);
				
			//当前位置
			$thishear = array();
			$thishear[] = '<a href="'.SITE_URL.'">首页</a>';
			$thishear[] = '<a href="'.SITE_URL.'new.php">世界名嘴</a>';
			$thishear[] = '<a href="javascript:;">资讯搜索：'.$keyword.'</a>';
			$rt['here'] = implode('&nbsp;&gt;&nbsp;',$thishear);
			unset($thishear);
			
			
			$list = 10; //每页显示
			$start = ($page-1)*$list;
			
			$sql = "SELECT COUNT(distinct tb1.article_id) FROM `{$this->App->prefix()}article` AS tb1 LEFT JOIN `{$this->App->prefix()}article_cate` AS tb3 ON tb3.cat_id = tb1.cat_id LEFT JOIN `{$this->App->prefix()}article_cate_sub` AS tb2 ON tb2.article_id = tb1.article_id $w";
			$tt = $this->App->findvar($sql);
			$rt['categorypage'] = Import::basic()->getpage($tt,$list,$page,'?page=',true);

			//获取内容列表
			$sql = "SELECT distinct tb1.article_id,tb1.article_title,tb1.article_img,tb1.addtime,tb3.cat_name FROM `{$this->App->prefix()}article` AS tb1 LEFT JOIN `{$this->App->prefix()}article_cate` AS tb3 ON tb3.cat_id = tb1.cat_id LEFT JOIN `{$this->App->prefix()}article_cate_sub` AS tb2 ON tb2.article_id = tb1.article_id $w ORDER BY tb1.is_top DESC,tb1.vieworder ASC, tb1.article_id DESC LIMIT $start,$list";
			$rt['catecon'] = $this->App->find($sql);
			
			
			//今日热点
			  $sql = "SELECT tb2.article_id,tb2.article_title,tb2.article_img,tb2.addtime,tb1.cat_id FROM `{$this->App->prefix()}article_cate_sub` AS tb1 LEFT JOIN `{$this->App->prefix()}article` AS tb2 ON tb1.article_id = tb2.article_id WHERE tb2.is_show='1' AND (tb2.cat_id ='89' OR tb1.cat_id='89') ORDER BY tb2.is_top DESC,tb2.vieworder ASC, tb2.article_id DESC LIMIT 10";
			  $rt['redian'] = $this->App->find($sql);
			  
			  //美食天下
			   $sql = "SELECT tb1.article_id,tb1.article_title,tb1.article_img,tb1.addtime,tb1.content,tb1.cat_id FROM `{$this->App->prefix()}article` AS tb1 LEFT JOIN `{$this->App->prefix()}article_cate` AS tb2 ON tb1.cat_id = tb2.cat_id  WHERE tb1.is_show='1' AND tb2.type='new' ORDER BY tb1.is_top DESC,tb1.vieworder ASC, tb1.article_id DESC LIMIT 9";
			  $rt['tianxia'] = $this->App->find($sql);
			  
			  //美食视角
			  $sql = "SELECT tb2.article_id,tb2.article_title,tb2.article_img,tb2.addtime,tb1.cat_id FROM `{$this->App->prefix()}article_cate_sub` AS tb1 LEFT JOIN `{$this->App->prefix()}article` AS tb2 ON tb1.article_id = tb2.article_id WHERE tb2.is_show='1' AND (tb2.cat_id ='90' OR tb1.cat_id='90') ORDER BY tb2.is_top DESC,tb2.vieworder ASC, tb2.article_id DESC LIMIT 12";
			  $rt['shijiao'] = $this->App->find($sql);
			  
			  //顾客晒单
			  $sql = "SELECT tb2.article_id,tb2.article_title,tb2.article_img,tb2.addtime,tb1.cat_id FROM `{$this->App->prefix()}article_cate_sub` AS tb1 LEFT JOIN `{$this->App->prefix()}article` AS tb2 ON tb1.article_id = tb2.article_id WHERE tb2.is_show='1' AND (tb2.cat_id ='91' OR tb1.cat_id='91') ORDER BY tb2.is_top DESC,tb2.vieworder ASC, tb2.article_id DESC LIMIT 10";
			  $rt['shaidan'] = $this->App->find($sql);
				  
			  //分类列表		
			  $rt['menu'] = $this->action('article','get_cate_tree',0,'new');
			
			$this->Cache->write($rt);
		}
		
		$this->set('keyword',$keyword);
		$this->set('rt',$rt);
		$this->title('世界名嘴 - 信息查找 - '.$GLOBALS['LANG']['site_name']);
		$this->template('con_cate');
	}
	
	function cate($cat_id=0,$page=1,$cityid=0){
		 $rt = $this->Cache->read(3600);
		 $type = 'new';
		 $page = isset($_GET['page']) ? $_GET['page'] : 1;
         if(is_null($rt)) {
				if(empty($cat_id) && empty($cityid)){
					$this->jump(SITE_URL.'new.php'); exit;
				}
				//获取当前分类信息
				if(empty($cat_id) && $cityid > 0){
						$c = $this->App->findvar("SELECT cat_id FROM `{$this->App->prefix()}article_cate` WHERE type='$type' AND parent_id='0' ORDER BY cat_id ASC");
						$sql = "SELECT * FROM `{$this->App->prefix()}article_cate` WHERE type='$type' AND cat_id='$c' LIMIT 1";

				}else{
						$sql = "SELECT * FROM `{$this->App->prefix()}article_cate` WHERE type='$type' AND cat_id='$cat_id' LIMIT 1";
				}
				$rt['catemes'] = $this->App->findrow($sql);
				if(empty($rt['catemes'])){ $this->jump(SITE_URL.'new.php'); exit;}
				
				//当前位置
				$thishear = array();
				$rts_ = $this->action('article','get_parent_cats',$cat_id);
				$rts = Import::basic()->array_sort($rts_,'cat_id');
				$thishear[] = '<a href="'.SITE_URL.'">首页</a>';
				$thishear[] = '<a href="'.SITE_URL.'new.php">世界名嘴</a>';
				if(!empty($rts)){
					foreach($rts as $rows){
						   $url = get_url($rows['cat_name'],$rows['cat_id'],$type.'.php?cid='.$rows['cat_id'],'category',array($type,'index',$row['cat_id']));
						   $thishear[] = '<a href="'.$url.'">'.$rows['cat_name'].'</a>';
					}
					unset($rts,$rts_);
				}
				$rt['here'] = implode('&nbsp;&gt;&nbsp;',$thishear);
				unset($thishear);
				
				$comd[] = "tb1.is_show='1'";
				$comd[] = "tb3.type='new'";
				if($cityid > 0){
					$comd[] = "tb1.district = '$cityid'";
				}
				
				//下级分类ID
				if($cat_id > 0){
					$sourceid = array($cat_id);
					$get_cid = $this->action('article','get_sub_cat_ids',$cat_id,'new');
					if(!empty($get_cid)){
						$subcid=array_merge($get_cid,$sourceid);
					}else{
						$subcid = $sourceid;
					}
					unset($sourceid,$get_cid);
					$comd[] = "(tb1.cat_id IN(".@implode(',',$subcid).") OR tb2.cat_id IN(".@implode(',',$subcid)."))";
				}
				
				
				$w = "WHERE ".implode(' AND ',$comd);
				
				//分页
				if(empty($page)){
					   $page = 1;
				}
				$list = 10;
				$start = ($page-1)*$list;
				$sql = "SELECT COUNT(distinct tb1.article_id) FROM `{$this->App->prefix()}article` AS tb1 LEFT JOIN `{$this->App->prefix()}article_cate` AS tb3 ON tb3.cat_id = tb1.cat_id LEFT JOIN `{$this->App->prefix()}article_cate_sub` AS tb2 ON tb2.article_id = tb1.article_id $w";
				$tt = $this->App->findvar($sql);
				$rt['categorypage'] = Import::basic()->getpage($tt,$list,$page,'?page=',true);

				//获取内容列表
				$sql = "SELECT distinct tb1.article_id,tb1.article_title,tb1.article_img,tb1.addtime,tb3.cat_name FROM `{$this->App->prefix()}article` AS tb1 LEFT JOIN `{$this->App->prefix()}article_cate` AS tb3 ON tb3.cat_id = tb1.cat_id LEFT JOIN `{$this->App->prefix()}article_cate_sub` AS tb2 ON tb2.article_id = tb1.article_id $w ORDER BY tb1.is_top DESC,tb1.vieworder ASC, tb1.article_id DESC LIMIT $start,$list";
				$rt['catecon'] = $this->App->find($sql);
				
				
				//今日热点
				  $sql = "SELECT tb2.article_id,tb2.article_title,tb2.article_img,tb2.addtime,tb1.cat_id FROM `{$this->App->prefix()}article_cate_sub` AS tb1 LEFT JOIN `{$this->App->prefix()}article` AS tb2 ON tb1.article_id = tb2.article_id WHERE tb2.is_show='1' AND (tb2.cat_id ='89' OR tb1.cat_id='89') ORDER BY tb2.is_top DESC,tb2.vieworder ASC, tb2.article_id DESC LIMIT 10";
				  $rt['redian'] = $this->App->find($sql);
				  
				  //美食天下
				   $sql = "SELECT tb1.article_id,tb1.article_title,tb1.article_img,tb1.addtime,tb1.content,tb1.cat_id FROM `{$this->App->prefix()}article` AS tb1 LEFT JOIN `{$this->App->prefix()}article_cate` AS tb2 ON tb1.cat_id = tb2.cat_id  WHERE tb1.is_show='1' AND tb2.type='new' ORDER BY tb1.is_top DESC,tb1.vieworder ASC, tb1.article_id DESC LIMIT 9";
				  $rt['tianxia'] = $this->App->find($sql);
				  
				  //美食视角
				  $sql = "SELECT tb2.article_id,tb2.article_title,tb2.article_img,tb2.addtime,tb1.cat_id FROM `{$this->App->prefix()}article_cate_sub` AS tb1 LEFT JOIN `{$this->App->prefix()}article` AS tb2 ON tb1.article_id = tb2.article_id WHERE tb2.is_show='1' AND (tb2.cat_id ='90' OR tb1.cat_id='90') ORDER BY tb2.is_top DESC,tb2.vieworder ASC, tb2.article_id DESC LIMIT 12";
				  $rt['shijiao'] = $this->App->find($sql);
				  
				  //顾客晒单
				  $sql = "SELECT tb2.article_id,tb2.article_title,tb2.article_img,tb2.addtime,tb1.cat_id FROM `{$this->App->prefix()}article_cate_sub` AS tb1 LEFT JOIN `{$this->App->prefix()}article` AS tb2 ON tb1.article_id = tb2.article_id WHERE tb2.is_show='1' AND (tb2.cat_id ='91' OR tb1.cat_id='91') ORDER BY tb2.is_top DESC,tb2.vieworder ASC, tb2.article_id DESC LIMIT 10";
				  $rt['shaidan'] = $this->App->find($sql);
				  
				  
				//分类列表		
				$rt['menu'] = $this->action('article','get_cate_tree',0,'new');
				
			 	$this->Cache->write($rt);
         	}

			 //页面头信息
			$title = (!empty($rt['catemes']['cat_title']) ? $rt['catemes']['cat_title'] : $rt['catemes']['cat_name']);
			$this->title($title.' - '.$GLOBALS['LANG']['site_name']);
			$this->meta("title",$title);
			$this->meta("keywords",$rt['catemes']['meta_keys']);
			$this->meta("description",$rt['catemes']['meta_desc']);
			$this->set('rt',$rt);
			$this->set('page',$page);
			$this->template('con_cate');	

	}
	
    function index($cat_id=0,$page=1){ 
        $rt = $this->Cache->read(3600);
		$type = 'new';
        if(is_null($rt)) {
				if(empty($cat_id)){
					$c = $this->App->findvar("SELECT cat_id FROM `{$this->App->prefix()}article_cate` WHERE type='$type' AND parent_id='0' ORDER BY cat_id ASC");
				 }else{
				 	$c = $cat_id;
				 }
				//获取当前分类信息
				$sql = "SELECT * FROM `{$this->App->prefix()}article_cate` WHERE type='$type' AND cat_id='$c' LIMIT 1";
				$rt['catemes'] = $this->App->findrow($sql);
				if(empty($rt['catemes'])){ $this->jump(SITE_URL); exit;}
				
				$cityid = 0;
				$comd[] = "tb1.is_show='1'";
				$comd[] = "tb3.type='new'";
				if($cityid > 0){
					$comd[] = "tb1.district = '$cityid'";
				}
				
				//下级分类ID
				if($cat_id > 0){
					$sourceid = array($cat_id);
					$get_cid = $this->action('article','get_sub_cat_ids',$cat_id,'new');
					if(!empty($get_cid)){
						$subcid=array_merge($get_cid,$sourceid);
					}else{
						$subcid = $sourceid;
					}
					unset($sourceid,$get_cid);
					$comd[] = "(tb1.cat_id IN(".@implode(',',$subcid).") OR tb2.cat_id IN(".@implode(',',$subcid)."))";
				}
				
				
				$w = "WHERE ".implode(' AND ',$comd);
				
				$page = (isset($_GET['page'])&&intval($_GET['page'])>0) ? intval($_GET['page']) : 1;
				//分页
				if(empty($page)){
					   $page = 1;
				}
				$list = 10;
				$start = ($page-1)*$list;
				$sql = "SELECT COUNT(distinct tb1.article_id) FROM `{$this->App->prefix()}article` AS tb1 LEFT JOIN `{$this->App->prefix()}article_cate` AS tb3 ON tb3.cat_id = tb1.cat_id LEFT JOIN `{$this->App->prefix()}article_cate_sub` AS tb2 ON tb2.article_id = tb1.article_id $w";
				$tt = $this->App->findvar($sql);
				$rt['categorypage'] = Import::basic()->getpage($tt,$list,$page,'?page=',true);
			
				$sql = "SELECT distinct tb1.article_id,tb1.article_title,tb1.article_img,tb1.addtime,tb3.cat_name FROM `{$this->App->prefix()}article` AS tb1 LEFT JOIN `{$this->App->prefix()}article_cate` AS tb3 ON tb3.cat_id = tb1.cat_id LEFT JOIN `{$this->App->prefix()}article_cate_sub` AS tb2 ON tb2.article_id = tb1.article_id $w ORDER BY tb1.is_top DESC,tb1.vieworder ASC, tb1.article_id DESC LIMIT $start,$list";
				$rt['catecon'] = $this->App->find($sql);
				
				
				//分类列表		
				$rt['menu'] = $this->action('article','get_cate_tree',0,'new');
				
				
            	$this->Cache->write($rt);
         }

			 //页面头信息
			$title = (!empty($rt['catemes']['cat_title']) ? $rt['catemes']['cat_title'] : $rt['catemes']['cat_name']);
			$this->title($title.' - '.$GLOBALS['LANG']['site_name']);
			$this->meta("title",$title);
			$this->meta("keywords",$rt['catemes']['meta_keys']);
			$this->meta("description",$rt['catemes']['meta_desc']);
			$this->set('rt',$rt);
			$this->set('page',$page);
			$this->template('con_'.$type);	
    }
	
	function article($id=0){
		if(!($id>0)){ $this->jump(ADMIN_URL.'new.php'); exit;}
		$type = 'new';
        $rt = $this->Cache->read(3600);
        if(is_null($rt)) {
			  //查询文章的基本信息
                $sql = "SELECT tb1.*,tb2.cat_name,tb2.type FROM `{$this->App->prefix()}article` AS tb1";
                $sql .=" LEFT JOIN `{$this->App->prefix()}article_cate` AS tb2";
                $sql .=" ON tb1.cat_id = tb2.cat_id";
                $sql .=" WHERE tb1.article_id='$id'";
                $rt['article_con'] = $this->App->findrow($sql);
				
                if(empty($rt['article_con'])){ $this->jump(ADMIN_URL.'new.php'); exit;}
				
                $cid = $rt['article_con']['cat_id'] ? $rt['article_con']['cat_id'] : 0;
			   
			    //上一遍 下一篇
/*				 $sql = "SELECT tb1.article_id, tb1.article_title FROM `{$this->App->prefix()}article` AS tb1 LEFT JOIN `{$this->App->prefix()}article_cate` AS tb2 ON tb1.cat_id=tb2.cat_id WHERE tb1.is_show='1' AND tb2.type='$type' AND tb1.article_id>'$id' ORDER BY tb1.article_id ASC LIMIT 1";
				$rs = $this->App->findrow($sql);
				if(!empty($rs)){
						$rt['prev'] = '<a href="'.get_url($rs['article_title'],$rs['article_id'],ROOT_URL.$type.'.php?id='.$rs['article_id'],'article',array($type,'article',$rs['article_id'])).'" title="'.$rs['article_title'].'">'.$rs['article_title'].'</a>';
				}else{
						$rt['prev'] = "无上篇了";
				}
				unset($rs);
				$sql = "SELECT tb1.article_id, tb1.article_title FROM `{$this->App->prefix()}article` AS tb1 LEFT JOIN `{$this->App->prefix()}article_cate` AS tb2 ON tb1.cat_id=tb2.cat_id WHERE tb1.is_show='1' AND tb2.type='$type' AND article_id<'$id' ORDER BY article_id DESC LIMIT 1";
				$rs = $this->App->findrow($sql);
				if(!empty($rs)){
						$rt['next'] = '<a href="'.get_url($rs['article_title'],$rs['article_id'],ROOT_URL.$type.'.php?id='.$rs['article_id'],'article',array($type,'article',$rs['article_id'])).'" title="'.$rs['article_title'].'">'.$rs['article_title'].'</a>';
				}else{
						$rt['next'] = "无下篇了";
				}
				unset($rs);*/
				//分类列表		
			    $rt['menu'] = $this->action('article','get_cate_tree',0,'new');
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

