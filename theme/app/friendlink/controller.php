<?php
class FriendlinkController extends Controller{
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
		$this->css(array('menber.css'));
	}
	
    function index(){ 
        $this->title("友情链接 - ".$GLOBALS['LANG']['site_name']);
		$this->meta("title","友情链接");
		$type = "default";
		$rt = $this->Cache->read(3600);
	 	if(is_null($rt)) {
		    $sql = "SELECT tb1.article_title,tb1.article_id FROM `{$this->App->prefix()}article` AS tb1";
			$sql .= " LEFT JOIN `{$this->App->prefix()}article_cate` AS tb2";
			$sql .= " ON tb1.cat_id = tb2.cat_id";
			$sql .=" WHERE tb2.type='$type' ORDER BY tb1.vieworder ASC,tb1.article_id DESC LIMIT 8";
			$rt['article_list'] = $this->App->find($sql);
			if(!empty($rt['article_list'])){
				foreach($rt['article_list'] as $k=>$row){
					$rt['article_list'][$k]['url'] = get_url($row['article_title'],$row['article_id'],$type.'.php?id='.$row['article_id'],'article',array($type,'article',$row['article_id']));
				}
				unset($article_list);
			}
			$sql = "SELECT * FROM `{$this->App->prefix()}friend_link`";
			$rt['link_list'] = $this->App->find($sql);
			$this->Cache->write($rt);
		} 
		
		//全站banner
		$rt['quanzhan'] = $this->action('banner','quanzhan');
			
		$this->set('rt',$rt);
		$this->template('friendlink');
    }
}

