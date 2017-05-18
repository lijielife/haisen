<?php
class FeedbackController extends Controller{
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
		$this->js(array('jquery.json-1.3.js','common.js'));//将js文件放到页面头
	}
	
    function index(){ 
        $this->title("客户在线留言 - ".$GLOBALS['LANG']['site_name']);
		$this->meta("title","客户在线留言");
		$type = "default";
		$rt = $this->Cache->read(3600);
	 	if(is_null($rt)) {
		   	 //获取当前位置
			$rt['hear'] = array();
			$rt['hear'][] = '<a href="'.SITE_URL.'">首页</a>&nbsp;&gt;&nbsp;';
			$rt['hear'][] = '<a href="feedback.php">客户留言</a>';
			
			//所有分类
			$rt['all_cate'] = $this->action('category','get_cate_tree',0,'default');
				
			//当前文章的分类的所有文章
			$order = "ORDER BY tb1.vieworder ASC, tb1.article_id DESC";
			$sql = "SELECT tb1.article_title,tb1.cat_id, tb1.article_id,tb2.cat_name FROM `{$this->App->prefix()}article` AS tb1";
			$sql .= " LEFT JOIN `{$this->App->prefix()}article_cate` AS tb2";
			$sql .= " ON tb1.cat_id = tb2.cat_id";
			$sql .=" WHERE tb2.type='$type'  $order";
			$article_list = $this->App->find($sql);
			$rt['article_list'] = array();
			if(!empty($article_list)){
					foreach($article_list as $k=>$row){
							$rt['article_list'][$row['cat_id']][$k] = $row;
							$rt['article_list'][$row['cat_id']][$k]['url'] = get_url($row['article_title'],$row['article_id'],$type.'.php?id='.$row['article_id'],'article',array($type,'article',$row['article_id']));
					}
					unset($article_list);
			}
				
			//商品分类列表		
			$rt['menu'] = $this->action('catalog','get_goods_cate_tree');
			 
			$this->Cache->write($rt);
		} 
		
		$this->set('rt',$rt);
		$this->template('feedback');
    }
	
	function ajax_feedback($data=array()){
		$err = 0;
		$result = array('error' => $err, 'message' => '');
		$json = Import::json();

		if (empty($data))
		{
				$result['error'] = 2;
				$result['message'] = '传送的数据为空！';
				die($json->encode($result));
		}
		$mesobj = $json->decode($data); //反json ,返回值为对象
		
		//以下字段对应评论的表单页面 一定要一致
		$datas['comment_title'] = $mesobj->comment_title;
		$datas['goods_id'] = $mesobj->goods_id;
		$goods_id = $datas['goods_id'];
		$uid = $this->Session->read('User.uid');
		$datas['user_id'] = !empty($uid) ? $uid : 0;
		$datas['status'] = 2;
		
		if (strlen($datas['comment_title'])<12)
		{
				$result['error'] = 2;
				$result['message'] = '评论内容不能太少！';
				die($json->encode($result));
		}
		
		//检查需要超过24小时候才能再次提问
		//if(!empty($goods_id)){
			$t = mktime()+24*3600;
			$sql = "SELECT addtime FROM `{$this->App->prefix()}message` WHERE user_id='$uid' AND goods_id='$goods_id' ORDER BY addtime DESC LIMIT 1";
			$dt = $this->App->findvar($sql);
			if(!empty($dt)){
				if(($dt+3600*24)>mktime()){
					$result['error'] = 1;
					$result['message'] = '今天你已经发表过提问了，请你<font color=red>'.intval((($dt+3600*24)-mktime())/3600).'</font>小时之后再次提问吧！';
					die($json->encode($result));
				}
			}
		//}
		/*$datas['content'] = $mesobj->content;goods_id
		$datas['user_name'] = $mesobj->user_name;
		$datas['sex'] = $mesobj->sex;
		$datas['mobile'] = $mesobj->mobile;
		$datas['telephone'] = $mesobj->telephone;
		$datas['email'] = $mesobj->email;
		$datas['companyname'] = $mesobj->companyname;
		$datas['address'] = $mesobj->address;
		$datas['companyurl'] = $mesobj->companyurl;
		*/
		$datas['addtime'] = mktime();
		$ip = Import::basic()->getip();
		$datas['ip_address'] = $ip ? $ip : '0.0.0.0';
		$datas['ip_from'] = Import::ip()->ipCity($ip);

		if($this->App->insert('message',$datas)){
			$rl = $this->action('user','add_user_jifen','comment');
			$result['error'] = 0;
			$result['message'] ='提问成功，我们会很快回答你的问题！<br />恭喜你，本次提问所得积分：'.$rl['points'].'分！';
		}else{
			$result['error'] = 1;
			$result['message']='提问失败，请通过在线联系客服吧！';
		}
		unset($datas,$data);
		
		//查询评论
		if(!$page) $page = 1;
		$list = 2;
        $start = ($page-1)*$list;
		$tt = $this->__get_message_count($goods_id);
		$rt['message_count'] =$tt;
		$rt['messagelist'] = $this->__get_message($goods_id,$start,$list);
		$rt['messagepage'] = Import::basic()->ajax_page($tt,$list,$page,'get_message_page',array($goods_id));
		$rt['goodsinfo']['goods_id'] = $goods_id;
		$this->set('rt',$rt);
		$result['message'] = $this->fetch('ajax_message',true);
		
		die($json->encode($result));
	}
	
	function ajax_getmessagelist($data=array()){
		if(empty($data['goods_id'])||!(intval($data['goods_id'])>0)) die("获取数据失败，传送的商品id为空！");
		if(empty($data['page'])||!(intval($data['page'])>0)) $page=1;
		//查询评论
		$list = 2;
		$page =intval($data['page']);
		$goods_id =intval($data['goods_id']);
        $start = ($page-1)*$list;
		$tt = $this->__get_message_count($goods_id);
		$rt['message_count'] =$tt;
		$rt['messagelist'] = $this->__get_message($goods_id,$start,$list);
		$rt['messagepage'] = Import::basic()->ajax_page($tt,$list,$page,'get_message_page',array($goods_id));
		$rt['goodsinfo']['goods_id'] = $goods_id;
		$this->set('rt',$rt);
		echo  $this->fetch('ajax_message',true);
		exit;
	}
	
	function __get_message_count($gid=0){
		$g = "";
        if($gid>0) $g = "AND goods_id = '$gid'";
		$sql = "SELECT COUNT(mes_id) FROM `{$this->App->prefix()}message`";
        $sql .=" WHERE status='2' $g";
		return $this->App->findvar($sql);
	}

	
	function __get_message($gid=0,$start=0,$list=8){
		 $g = "";
		 if($gid>0) $g = "AND goods_id = '$gid'";
		 $sql = "SELECT m.*,u.avatar,u.user_name FROM `{$this->App->prefix()}message` AS m LEFT JOIN `{$this->App->prefix()}user` AS u ON m.user_id=u.user_id";
		 $sql .=" WHERE m.status='2' $g ORDER BY m.addtime DESC LIMIT $start,$list";
		 return $this->App->find($sql);
	}
	
}

