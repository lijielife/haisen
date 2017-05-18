<?php

/**
 * 商品分类 控制器
 */
class CatalogController extends Controller
{

    /**
     * 构造方法
     */
    public function  __construct()
    {
        /* 将js文件放到页面头 */
        $this->js( array('jquery.json-1.3.js','jquery.cookie.js','common.js','goods.js','jquery_dialog.js') );
        $this->css( array( 'jquery_dialog.css' ) );
    }
        
    /* 商品分类页面
    *  $cid 分类id
    *  type int
    */
    public function index( $cid = 0, $page = 0, $rs = array() )
    {
        $this->action( 'common', 'checkjump' );        
        $this->js( 'slide.js' );
        $this->css( 'slide-3.css' );
        $rt = $this->Cache->read(3600);
        if ( is_null( $rt ) )
        {
            if ( empty($_GET['encode']) )
            {
                if ( isset($_GET['keyword']) && ! empty($_GET['keyword']) && ! in_array($_GET['keyword'],array('is_best','is_new','is_hot','is_promote')) )
                {
                    $string = array_merge($_GET, $_POST);
                    $string['search_encode_time'] = time();
                    $string = str_replace('+', '%2b', base64_encode(serialize($string)));
                    header("Location: ".ADMIN_URL."catalog.php?encode=$string\n");
                    exit;
                }
            }
            else
            { 
                $string = base64_decode(trim($_GET['encode']));
                if ( $string !== false )
                {
                    $string = unserialize( $string );
                }
                else
                {
                    $string = array();
                }
                $_GET = $_REQUEST = array_merge($_REQUEST, addslashes_deep($string));
            }
            $cid     = (isset($_GET['cid']) && intval($_GET['cid']) > 0) ? intval($_GET['cid']) : $cid;
            $bid     = (isset($_GET['bid']) && intval($_GET['bid'])>0) ? intval($_GET['bid']) : 0;
            $price   = isset($_GET['price']) ? $_GET['price'] : "";;
            $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";
            if ( $keyword == '输入商品关键字' ) $keyword = "";
            $rt['keyword'] = $keyword;
            $list = 20; //每页显示
            if ( ! (preg_match('/^.*$/u', $keyword) > 0) )
            {
                $keyword = Import::gz_iconv()->ec_iconv('GB2312', 'UTF8', $keyword);
            }
            $page = (isset($_GET['page']) && intval($_GET['page'])>0) ? intval($_GET['page']) : 1;
            
            // 当前分类的基本信息
            if ( $cid > 0 )
            {
                $sql = "SELECT * FROM `{$this->App->prefix()}goods_cate` WHERE cat_id='$cid' LIMIT 1";
                $rt['cateinfo'] = $this->App->findrow( $sql );
                if ( empty( $rt['cateinfo'] ) )
                {
                    $this->action( 'common', 'show404tpl' );
                }
            }
            else
            {
                $rt['cateinfo'] = array( 'keywords' => '商品中心' );
            }
            
            // start 当前位置
            $rt['hear'] = array();
            $perend_id = 0;
            $hear[] = '<a href="'.SITE_URL.'">首页</a>';
            if ( $cid > 0 ) {
                $hear[] = '<a href="'.ADMIN_URL.'catalog.php">商品中心</a>';
                $rts_ = $this->get_goods_parent_cats($cid); //父类ID
                $rts = Import::basic()->array_sort($rts_,'cat_id'); //根据cat_id排序
                if ( ! empty( $rts ) ) {
                    $perend_id = $rts[count($rts)-1]['cat_id']; 
                    foreach($rts as $rows) {
                        $hear[] = '<a href="'.ADMIN_URL.'catalog.php?cid='.$rows["cat_id"].'">'.$rows['cat_name'].'</a>';
                    }
                }
                unset( $rts, $rts_ );
            } else if ( ! empty( $keyword ) ) {
                    $perend_id = -1;
                    $hear[] = '<a href="'.SITE_URL.'catalog/">商品中心</a>';
                    switch ( $keyword ) {
                        case 'is_hot':
                            $hear[] = '<a href="'.SITE_URL.'hotproduct/">热销商品</a>';
                            break;
                        case 'is_new':
                            $hear[] = '<a href="'.SITE_URL.'newproduct/">新品推荐</a>';
                            break;
                        case 'is_best':
                            $hear[] = '<a href="'.SITE_URL.'bestproduct/">精品推荐</a>';
                            break;
                        case 'is_promote':
                            $hear[] = '<a href="'.SITE_URL.'promote/">促销商品</a>';
                            break;
                        default:
                            $hear[] = '<a href="javascript:;">商品搜索</a>';
                            $hear[] = '<a href="'.SITE_URL.'catalog.php?keyword='.$keyword.'">'.$keyword.'</a>';
                            break;
                    }
            } else if ( ! empty( $price ) ) {
                $perend_id = -1;
                $hear[] = '<a href="'.ADMIN_URL.'catalog.php'.'">商品中心</a>';
                $hear[] = '<a href="javascript:;">价格商品</a>';
            } else {
                $perend_id = -1;
                $hear[] = '<a href="'.ADMIN_URL."catalog.php".'">商品中心</a>';
            }
            if ( ! empty( $hear ) ) {
                $rt['hear'] = implode('&nbsp;&gt;&nbsp;',$hear);
            } else {
                $rt['hear'] = "";
            }
            unset( $hear );
            //end 当前位置
        
            //定义能够排序的字段
            $order = array('sort_order','cat_id','goods_id','click_count','brand_id','shop_price','market_price','promote_price','is_on_sale','is_best','is_new','is_hot','is_promote','sale_count','add_time','last_update');
            $orderby = "";
            if ( isset($_GET['desc']) ) {
                if ( in_array($_GET['desc'],$order) ) {
                    $orderby = ' ORDER BY g.'.$_GET['desc'].' DESC';
                }
                $order_type = trim($_GET['desc']);
                $sort_type = 'DESC';
            } else if ( isset( $_GET['asc'] ) ) {
                if ( in_array( $_GET['asc'], $order ) ) {
                   $orderby = ' ORDER BY g.'.$_GET['asc'].' ASC';
                }
                $order_type = trim($_GET['asc']);
                $sort_type  = 'ASC';
            } else {
                $orderby    = ' ORDER BY g.goods_id DESC';
                $order_type = 'goods_id';
                $sort_type  = 'DESC';
            }
            
            //分页
            if ( empty( $page ) ) {
                $page = 1;
            }
            $rt['thiscid'] = $cid;
            $rt['thisbid'] = $bid;
            $rt['price']   = $price;
            $rt['page']    = $page;
            $rt['sort']    = $sort_type;
            $rt['order']   = $order_type;
            $rt['limit']   = $list;
            
            //条件
            $comd = array( 'cid'=>$cid, 'bid'=>$bid, 'price'=>$price, 'keyword'=>$keyword, 'store_id' => '0' ); //需要的话继续增加
            $list = intval($list) > 0 ?  intval($list) : 12 ; //每页显示多少个
            $start = ($page-1) * $list;
            $tt = $this->App->__get_goods_count_category( $comd ); //获取商品的数量
            $rt['goods_count'] = $tt;
            $rt['categoodspage'] = Import::basic()->getpage( $tt, $list, $page, '?page=', true );
            /* 商品列表 */
            $rt['categoodslist'] = $this->App->__get_categoods_list_category( $comd, $orderby, $start, $list );

            /* 团购商品 */
            $sql = "SELECT * FROM `{$this->App->prefix()}goods_groupbuy` WHERE active = '1'";
            $rt['groupbuy_list'] = $this->App->find( $sql ); 

            if ( ! isset($_COOKIE['DISPLAY_TYPE']) || empty($_COOKIE['DISPLAY_TYPE']) || !in_array($_COOKIE['DISPLAY_TYPE'],array('list','text')) ) {
                $rt['display'] = 'text';
            } else {
                $rt['display'] = $_COOKIE['DISPLAY_TYPE'];
            }
            
            if ( ! empty( $rt['cateinfo']['cat_name'] ) ) {
                $rt['infoname'] = $rt['cateinfo']['cat_name'];
            } elseif ( ! empty($rt['brandinfo']['brand_name']) ) {
                $rt['infoname'] = $rt['brandinfo']['brand_name'];
            } elseif ( ! empty($keyword) ) {
                    switch ( $keyword ) {
                        case 'is_hot':
                            $rt['infoname'] =  "热销商品专区";
                            $rt['cateinfo']['cat_title'] = "流行热销商品-热销排行榜";
                            break;
                        case 'is_new':
                            $rt['infoname'] =  "新品推荐";
                            $rt['cateinfo']['cat_title'] = "新品促销专区";
                            break;
                        case 'is_best':
                            $rt['infoname'] =  "精品推荐";
                            $rt['cateinfo']['cat_title'] = "精选商品-%100满意";
                            break;
                        case 'is_promote':
                            $rt['infoname'] =  "促销商品专区";
                            $rt['cateinfo']['cat_title'] = "促销商品，机会不容错过，最低一折起";
                            break;
                        default:
                            $rt['infoname'] =  "商品搜索";
                            $rt['cateinfo']['cat_title'] = "商品查找-商品搜索";
                            break;
                    }
            } elseif ( ! empty($price) ) {
                $rt['infoname'] =  $price.'价格商品';
            } else {
                $rt['cateinfo']['cat_title'] = "商品分类列表";
                $rt['infoname'] =  '最新商品';
            }
            $this->Cache->write( $rt );
        }
        
        if ( ! defined( NAVNAME ) ) define( 'NAVNAME', $rt['infoname'] );
        
        // 设置页面meta cat_title
        $title = !empty($rt['cateinfo']['cat_title']) ? htmlspecialchars($rt['cateinfo']['cat_title']) : htmlspecialchars($rt['cateinfo']['cat_name']);
        $this->title($title.' - '.$GLOBALS['LANG']['site_name']);
        $this->meta("title",$title);
        $this->meta("keywords",htmlspecialchars($rt['cateinfo']['keywords']));
        $this->meta("description",htmlspecialchars($rt['cateinfo']['cat_desc']));
        $this->set('rt',$rt);
        $this->set('keyword',$rt['keyword']);
        $this->set('page',$page);
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template( $mb . '/catalog_index' );
    }

    /*店铺列表*/
    public function store_list()
    {
        /* 获取微信 appid, appsecret */
        $sql = "SELECT appid, appsecret FROM `{$this->App->prefix()}wxuserset` LIMIT 1";
        $wxuserset   = $this->App->findrow( $sql );
        $Import_obj  = new Import;
        $jssdk_obj   = $Import_obj->wx_jssdk( $wxuserset['appid'], $wxuserset['appsecret'] );
        $signPackage = $jssdk_obj->GetSignPackage();
        $this->set( 'signPackage', $signPackage );
        /* 经纬度 */
        $longitude = trim( $_GET['longitude'] );
        $latitude  = trim( $_GET['latitude'] );

        $flag = $_GET['flag'];
        $sql = "SELECT * FROM `{$this->App->prefix()}store_class` ORDER BY class_sort DESC";
        $class_list = $this->App->find( $sql );
        $store_class_list = array();
        foreach ( (array)$class_list as $k => $v )
        {
            $store_class_list[ $v['class_id'] ] = $v;
        }

        if ( $longitude && $latitude )
        {
            $sql = "SELECT *,SQRT(POWER($latitude - latitude, 2) + POWER($longitude  - longitude, 2)) AS d FROM `{$this->App->prefix()}store` WHERE class_id = '$flag' AND status = 1 ORDER BY d ASC";
        }
        else
        {
            $sql = "SELECT * FROM `{$this->App->prefix()}store` WHERE class_id = '$flag' AND status = 1";
        }
        $store_list = $this->App->find( $sql );

        $this->set( 'store_list', $store_list );
        $this->set( 'store_class_list', $store_class_list );
        $this->set( 'flag', $flag );
        $this->set( 'longitude', $longitude );
        $this->set( 'latitude', $latitude );

        $title = '商铺列表';
        $this->title( $title );
        defined( NAVNAME ) or define( 'NAVNAME', $title );
        $this->meta( 'title', $title );
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template( $mb . '/catalog_storeclass' );
    }

    /**
     * 店铺详情
     */
    public function store_detail()
    {
        $store_id                   = $_GET['store_id'];
        $sql                        = "SELECT * FROM `{$this->App->prefix()}store` WHERE store_id = '$store_id' LIMIT 1";
        $store_info                 = $this->App->findrow( $sql );
        $store_arr                  = explode( ',', $store_info['store_pic']);
        $store_info['store_picarr'] = $store_arr;
        $sql                        = "SELECT * FROM `{$this->App->prefix()}goods` WHERE store_id = '$store_id' AND is_on_sale = '1'";
        $goods_list                 = $this->App->find( $sql );
        $title                      = '商铺详情';
        $this->set( 'goods_list', $goods_list );
        $this->set('store_info',$store_info);
        $this->title( $title );
        defined( NAVNAME ) or define( 'NAVNAME', $title );
        $this->meta( 'title', $title );
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template( $mb . '/catalog_store' );
    }

    /**
     * 专属产品
     */
    public function exclusive()
    {
        /* 商品列表 */
        $sql = "SELECT * FROM `{$this->App->prefix()}goods` WHERE goods_zone = '1' AND is_on_sale = '1' AND store_id = '0'";
        $goods_list = $this->App->find( $sql );
        $this->set( 'goods_list', $goods_list );

        $title = '专属产品';
        $this->title( $title . ' - '.$GLOBALS['LANG']['site_name'] );
        defined( NAVNAME ) or define( 'NAVNAME', $title );
        $this->meta( 'title', $title );        
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template( $mb . '/catalog_exclusive' );
    }

    /**
     * 团购产品
     */
    public function groupbuy()
    {
        $sql = "SELECT * FROM `{$this->App->prefix()}goods_groupbuy` WHERE active = '1'";
        $groupbuy_list = $this->App->find( $sql );
        $this->set( 'groupbuy_list', $groupbuy_list );

        $title = '团购产品';
        $this->title( $title . ' - '.$GLOBALS['LANG']['site_name'] );
        defined( NAVNAME ) or define( 'NAVNAME', $title );
        $this->meta( 'title', $title );        
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template( $mb . '/catalog_groupbuy' );
    }

    /**
     * 会员专区
     */
    public function member_zone()
    {
        /* 商品列表 */
        $sql = "SELECT * FROM `{$this->App->prefix()}goods` WHERE goods_zone = '2' AND is_on_sale = '1' AND store_id = '0'";
        $goods_list = $this->App->find( $sql );
        $this->set( 'goods_list', $goods_list );

        $title = '会员专区';
        $this->title( $title . ' - '.$GLOBALS['LANG']['site_name'] );
        defined( NAVNAME ) or define( 'NAVNAME', $title );
        $this->meta( 'title', $title );        
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template( $mb . '/catalog_member_zone' );
    }

    /**
     * 提前出海
     */
    public function advance_sea()
    {
        $sql = "SELECT * FROM `{$this->App->prefix()}goods_crowdbuy` WHERE active = '1'";
        $crowd_list = $this->App->find( $sql );
        $this->set( 'crowd_list', $crowd_list );

        $title = '提前出海';
        $this->title( $title . ' - '.$GLOBALS['LANG']['site_name'] );
        defined( NAVNAME ) or define( 'NAVNAME', $title );
        $this->meta( 'title', $title );        
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template( $mb . '/catalog_advance_sea' );
    }
    
    // 获商品子自分类cat_id
    public function get_goods_sub_cat_ids( $cid = 0 ) {
        //if(!($cid>=0)) return false;
        $rts = $this->get_goods_cate_tree($cid);
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
    function get_goods_cate_tree($cid = 0)
    {
        $three_arr = array();
        $sql = 'SELECT count(cat_id) FROM `'.$this->App->prefix()."goods_cate` WHERE parent_id = '$cid' AND is_show = 1";
        if ($this->App->findvar($sql) || $cid == 0)
        {
            $sql = 'SELECT tb1.cat_name,tb1.cat_id,tb1.parent_id,tb1.is_show,tb1.cat_title,tb1.cat_desc, tb1.keywords,tb1.show_in_nav,tb1.sort_order, COUNT(tb2.cat_id) AS goods_count FROM `'.$this->App->prefix()."goods_cate` AS tb1";
            $sql .=" LEFT JOIN `{$this->App->prefix()}goods` AS tb2";
            $sql .=" ON tb1.cat_id = tb2.cat_id";
            $sql .= " WHERE tb1.parent_id = '$cid' GROUP BY tb1.cat_id ORDER BY tb1.parent_id ASC,tb1.sort_order ASC, tb1.cat_id ASC";
            $res = $this->App->find($sql); 
            foreach ($res as $row)
            {
               $three_arr[$row['cat_id']]['id']   = $row['cat_id'];
               $three_arr[$row['cat_id']]['parent_id']   = $row['parent_id'];
               $three_arr[$row['cat_id']]['name'] = $row['cat_name'];
               $three_arr[$row['cat_id']]['is_show']   = $row['is_show'];
               $three_arr[$row['cat_id']]['show_in_nav'] = $row['show_in_nav'];
               $three_arr[$row['cat_id']]['cat_title']   = $row['cat_title'];
               $three_arr[$row['cat_id']]['sort_order'] = $row['sort_order'];
               $three_arr[$row['cat_id']]['goods_count'] = $row['goods_count'];
               $three_arr[$row['cat_id']]['keywords'] = $row['keywords'];
               $three_arr[$row['cat_id']]['cat_desc'] = $row['cat_desc'];
               $three_arr[$row['cat_id']]['url'] = ADMIN_URL."catalog.php?cid=".$row["cat_id"];
               
                if (isset($row['cat_id']) != NULL)
                {
                     $three_arr[$row['cat_id']]['cat_id'] = $this->get_goods_cate_tree($row['cat_id']);
                }
            }
        }
        return $three_arr;
    }
    
    /**
     * 获得指定分类的所有上级分类
     *
     * @access  public
     * @param   integer $cat    分类编号
     * @return  array
     */
    function get_goods_parent_cats($cat)
    {
        if ($cat == 0)
        {
            return array();
        }
        $arr = $this->App->find("SELECT cat_id, cat_name, parent_id,cat_title FROM `{$this->App->prefix()}goods_cate`");
        if (empty($arr))
        {
            return array();
        }
        $index = 0;
        $cats  = array();
        while (1)
        {
            foreach ($arr AS $row)
            {
                if ($cat == $row['cat_id']) //如果当前父类的di==当前ID，那么将它写入数据
                {
                    $cat = $row['parent_id'];  //将父类ID设为当前id
                    $cats[$index]['cat_id']   = $row['cat_id'];
                    $cats[$index]['cat_title']   = $row['cat_title'];
                    $cats[$index]['cat_name'] = $row['cat_name'];
                    $index++;
                    break;
                }
            }
            if ($index == 0 || $cat == 0)
            {
                break;
            }
        }
        return $cats;
    }

    //热卖的前10个商品
    function top10($cid=0,$list=10){
            $cids = array();
            if($cid>0){
                $cids = $this->get_goods_sub_cat_ids($cid);
            }
            $w = !empty($cids) ? "AND cat_id IN(".implode(',',$cids).")" : "";

            $sql = "SELECT goods_id, goods_name,need_jifen,shop_price,pifa_price, market_price, goods_thumb,goods_img,original_img,promote_start_date,promote_end_date,promote_price,is_promote,sale_count FROM `{$this->App->prefix()}goods` WHERE is_on_sale = '1' $w AND is_delete = '0' AND is_check='1' AND is_alone_sale='1' ORDER BY sale_count DESC,is_hot DESC,goods_id DESC LIMIT $list";
            $rt = $this->App->find($sql);
            
            $rt_ = array();
            if(empty($rt) || count($rt)<$list){
                 $c = $list-count($rt);
                 $sql = "SELECT goods_id, goods_name,need_jifen,goods_bianhao, sale_count, shop_price,market_price,pifa_price, goods_thumb, original_img, goods_img,promote_start_date,promote_end_date,promote_price,is_promote FROM `{$this->App->prefix()}goods` WHERE is_on_sale = '1' AND is_check='1' AND is_delete = '0' AND is_alone_sale='1' AND (is_hot='1' OR is_new='1' OR is_best='1') ORDER BY sale_count DESC,goods_id DESC LIMIT $c";
                 $rt_ = $this->App->find($sql);
            }
            $rts = array();
            $k= 0;
            if(!empty($rt)){
                foreach($rt as $row){
                    $rts[$k] = $row;
                   // $rts[$k]['url'] = get_url($row['goods_name'],$row['goods_id'],'product.php?id='.$row['goods_id'],'goods',array('product','index',$row['goods_id']));
                    $rts[$k]['goods_thumb'] =  is_file(SYS_PATH.$row['goods_thumb']) ? SITE_URL.$row['goods_thumb'] : SITE_URL.'theme/images/no_picture.gif';
                    $rts[$k]['goods_img'] =  is_file(SYS_PATH.$row['goods_img']) ? SITE_URL.$row['goods_img'] : SITE_URL.'theme/images/no_picture.gif';
                    if($row['is_promote']=='1'){
                        //促销 价格
                        if($row['promote_start_date']<mktime()&&$row['promote_end_date']>mktime()){
                            $row['promote_price'] = format_price($row['promote_price']);
                        }else{
                            $row['promote_price'] = "0.00";
                        }
                    }else{
                        $row['promote_price'] = "0.00";
                    }
                    $rts[$k]['promote_price'] = $row['promote_price'];
                    ++$k;
                }
                unset($rt);
            }
            
            if(!empty($rt_)){
                foreach($rt_ as $row){
                    $rts[$k] = $row;
                   // $rts[$k]['url'] = get_url($row['goods_name'],$row['goods_id'],SITE_URL.'product.php?id='.$row['goods_id'],'goods',array('product','index',$row['goods_id']));
                    $rts[$k]['goods_thumb'] =  is_file(SYS_PATH.$row['goods_thumb']) ? SITE_URL.$row['goods_thumb'] : SITE_URL.'theme/images/no_picture.gif';
                    $rts[$k]['goods_img'] =  is_file(SYS_PATH.$row['goods_img']) ? SITE_URL.$row['goods_img'] : SITE_URL.'theme/images/no_picture.gif';
                    if($row['is_promote']=='1'){
                        //促销 价格
                        if($row['promote_start_date']<mktime()&&$row['promote_end_date']>mktime()){
                            $row['promote_price'] = format_price($row['promote_price']);
                        }else{
                            $row['promote_price'] = "0.00";
                        }
                    }else{
                        $row['promote_price'] = "0.00";
                    }
                    $rts[$k]['promote_price'] = $row['promote_price'];
                    ++$k;
                }
                unset($rt_);
            }
            
            return $rts;
     }

    //推荐商品
    function recommend_goods($list=3,$type='',$data=0){
           $cache = Import::ajincache();
           $cache->SetFunction(__FUNCTION__);
           $cache->SetMode('product');
           $uid = $this->Session->read('User.uid');
           $uid = empty($uid)? 0 : $uid;
           $fn = $cache->fpath(func_get_args());
           if(file_exists($fn)&&!$cache->GetClose()){
                include($fn);
           }
           else
           {
                $cid = $data['cid'];
                $perend_id = $data['perend_id'];
                $keyword = $data['keyword'];
                
                if($cid>0){
                    $cids = $this->get_goods_sub_cat_ids($cid);
                }
                $ws = !empty($cids) ? " AND g.cat_id IN(".implode(',',$cids).")" : "";
                
                $w = "";
                $wd = "";
                if(!empty($keyword)) { $wd = " (g.goods_name LIKE '%{$keyword}%' OR g.meta_keys LIKE '%{$keyword}%' OR b.brand_name LIKE '%{$keyword}%')";}
                if($type=='is_promote'){
                    $t = mktime();
                    $w = "{$ws}AND g.is_promote='1' AND g.promote_start_date<'$t' AND g.promote_end_date>'$t'{$wd}";
                }elseif($type=='is_qianggou'){
                    $t = mktime();
                    $w = "{$ws}AND g.is_qianggou='1' AND g.qianggou_start_date<'$t' AND g.qianggou_end_date>'$t'{$wd}";
                }else{
                    if(in_array($type,array('is_best','is_new','is_hot'))){
                        $w = $ws.'AND g.'.$type."='1'{$wd}";
                    }
                }
                $sql = "SELECT g.goods_id,g.goods_name,g.market_price,g.shop_price,g.goods_thumb,g.goods_img,g.promote_price, g.promote_start_date, g.promote_end_date,g.qianggou_price, g.qianggou_start_date, g.qianggou_end_date,g.is_qianggou,g.is_promote,g.meta_keys,b.brand_name FROM `{$this->App->prefix()}goods` AS g LEFT JOIN `{$this->App->prefix()}brand` AS b ON g.brand_id=b.brand_id WHERE g.is_on_sale='1' AND g.is_check='1' AND g.is_alone_sale='1' AND g.is_delete = '0' $w ORDER BY g.sort_order DESC, g.goods_id DESC LIMIT $list";
                $rt = $this->App->find($sql);
                $rts = array();
                $k=0;
                if(!empty($rt)){
                    foreach($rt as $row){
                        $rts[$k] = $row;
                        //$rts[$k]['url'] = get_url($row['goods_name'],$row['goods_id'],SITE_URL.'product.php?id='.$row['goods_id'],'goods',array('product','index',$row['goods_id']));
                        $rts[$k]['goods_thumb'] =  is_file(SYS_PATH.$row['goods_thumb']) ? SITE_URL.$row['goods_thumb'] : SITE_URL.'theme/images/no_picture.gif';
                        $rts[$k]['goods_img'] =  is_file(SYS_PATH.$row['goods_img']) ? SITE_URL.$row['goods_img'] : SITE_URL.'theme/images/no_picture.gif';
                        //促销 价格
                        if($row['is_promote']=='1'){
                            $row['promote_price'] = format_price($row['promote_price']);
                        }else{
                            $row['promote_price'] = "0.00";
                        }
                        $rts[$k]['promote_price'] = $row['promote_price'];
                        //抢购价格
                        if($row['is_qianggou']=='1'){
                            $row['qianggou_price'] = format_price($row['qianggou_price']);
                        }else{
                            $row['qianggou_price'] = "0.00";
                        }
                        $rts[$k]['qianggou_price'] = $row['qianggou_price'];
                        $k++;
                    }
                    unset($rt);
                }
                
                //查询数量小于指定数量。进行第二次查询
                if($cid > 0 && count($rts)<$list && $perend_id > 0){
                    $l = $list-count($rts);
                    $w = "";
                    $cids = $this->get_goods_sub_cat_ids($perend_id);
                    $ws = !empty($cids) ? " AND g.cat_id IN(".implode(',',$cids).")" : "";
                    if($type=='is_promote'){
                        $t = mktime();
                        $w = "{$ws}AND g.is_promote='1' AND g.promote_start_date<'$t' AND g.promote_end_date>'$t'";
                    }elseif($type=='is_qianggou'){
                        $t = mktime();
                        $w = "{$ws}AND g.is_qianggou='1' AND g.qianggou_start_date<'$t' AND g.qianggou_end_date>'$t'";
                    }else{
                        if(in_array($type,array('is_best','is_new','is_hot'))){
                            $w = '{$ws}AND g.'.$type."='1'";
                        }
                    }
                    $sql = "SELECT g.goods_id,g.goods_name,g.market_price,g.shop_price,g.goods_thumb,g.goods_img,g.promote_price, g.promote_start_date, g.promote_end_date,g.qianggou_price, g.qianggou_start_date, g.qianggou_end_date,g.is_qianggou,g.is_promote,b.brand_name FROM `{$this->App->prefix()}goods` AS g LEFT JOIN `{$this->App->prefix()}brand` AS b ON g.brand_id=b.brand_id WHERE g.is_on_sale='1' AND g.is_check='1' AND g.is_alone_sale='1' AND g.is_delete = '0' $w ORDER BY g.sort_order DESC, g.goods_id DESC LIMIT $l";
                    $rt = $this->App->find($sql);
                    if(!empty($rt)){
                        foreach($rt as $row){
                            $rts[$k] = $row;
                            //$rts[$k]['url'] = get_url($row['goods_name'],$row['goods_id'],SITE_URL.'product.php?id='.$row['goods_id'],'goods',array('product','index',$row['goods_id']));
                            $rts[$k]['goods_thumb'] =  is_file(SYS_PATH.$row['goods_thumb']) ? SITE_URL.$row['goods_thumb'] : SITE_URL.'theme/images/no_picture.gif';
                            $rts[$k]['goods_img'] =  is_file(SYS_PATH.$row['goods_img']) ? SITE_URL.$row['goods_img'] : SITE_URL.'theme/images/no_picture.gif';
                            //促销 价格
                            if($row['is_promote']=='1'){
                                $row['promote_price'] = format_price($row['promote_price']);
                            }else{
                                $row['promote_price'] = "0.00";
                            }
                            $rts[$k]['promote_price'] = $row['promote_price'];
                            //抢购价格
                            if($row['is_qianggou']=='1'){
                                $row['qianggou_price'] = format_price($row['qianggou_price']);
                            }else{
                                $row['qianggou_price'] = "0.00";
                            }
                            $rts[$k]['qianggou_price'] = $row['qianggou_price'];
                            $k++;
                        }
                        unset($rt);
                    }
                } //end 第二次查询
                
                //进行第三次查询
                if(count($rts)<$list){
                    $l = $list-count($rts);
                    if($type=='is_promote'){
                        $t = mktime();
                        $w = "AND g.is_promote='1' AND g.promote_start_date<'$t' AND g.promote_end_date>'$t'";
                    }elseif($type=='is_qianggou'){
                        $t = mktime();
                        $w = "AND g.is_qianggou='1' AND g.qianggou_start_date<'$t' AND g.qianggou_end_date>'$t'";
                    }else{
                        if(in_array($type,array('is_best','is_new','is_hot'))){
                            $w = 'AND g.'.$type."='1'";
                        }
                    }
                    $sql = "SELECT g.goods_id,g.goods_name,g.market_price,g.shop_price,g.goods_thumb,g.goods_img,g.promote_price, g.promote_start_date, g.promote_end_date,g.qianggou_price, g.qianggou_start_date, g.qianggou_end_date,g.is_qianggou,g.is_promote,b.brand_name FROM `{$this->App->prefix()}goods` AS g LEFT JOIN `{$this->App->prefix()}brand` AS b ON g.brand_id=b.brand_id WHERE g.is_on_sale='1' AND g.is_check='1' AND g.is_alone_sale='1' AND g.is_delete = '0' $w ORDER BY g.sort_order DESC, g.goods_id DESC LIMIT $l";
                    $rt = $this->App->find($sql);
                    if(!empty($rt)){
                        foreach($rt as $row){
                            $rts[$k] = $row;
                            //$rts[$k]['url'] = get_url($row['goods_name'],$row['goods_id'],SITE_URL.'product.php?id='.$row['goods_id'],'goods',array('product','index',$row['goods_id']));
                            $rts[$k]['goods_thumb'] =  is_file(SYS_PATH.$row['goods_thumb']) ? SITE_URL.$row['goods_thumb'] : SITE_URL.'theme/images/no_picture.gif';
                            $rts[$k]['goods_img'] =  is_file(SYS_PATH.$row['goods_img']) ? SITE_URL.$row['goods_img'] : SITE_URL.'theme/images/no_picture.gif';
                            //促销 价格
                            if($row['is_promote']=='1'){
                                $row['promote_price'] = format_price($row['promote_price']);
                            }else{
                                $row['promote_price'] = "0.00";
                            }
                            $rts[$k]['promote_price'] = $row['promote_price'];
                            //抢购价格
                            if($row['is_qianggou']=='1'){
                                $row['qianggou_price'] = format_price($row['qianggou_price']);
                            }else{
                                $row['qianggou_price'] = "0.00";
                            }
                            $rts[$k]['qianggou_price'] = $row['qianggou_price'];
                            $k++;
                        }
                        unset($rt);
                    }
                }
                
                $cache->write($fn, $rts,'rts');
           }
           return $rts;
    }
        
    // ajax获取分类页面的分类商品
    public function ajax_getcategoodslist($w=array()){
        $err = 0;
        $json = Import::json();
        $result = array('error' => $err, 'message' => ''); 
        if(empty($w)){
            $result['error'] = 2;
            $result['message'] = '传送的数据为空！';
            die($json->encode($result));
        }
        $wobj = $json->decode($w); //反json ,返回值为对象

        $page = $wobj->page;
        if(!$page) $page = 1;
        $cid = $wobj->cid;
        if(!$cid) $cid = 0;
        $bid = $wobj->bid;
        if(!$bid) $bid = 0;
        $price = $wobj->price;
        if(!$price) $price = "";
        $order_type = $wobj->order;
        if(!$order_type) $order_type = "goods_id";
        $keyword = $wobj->keyword;
        if(!$keyword) $keyword = "";
        $sort_type = $wobj->sorts;
        if(empty($sort_type)){ $sort_type = "DESC";};
        $list = $wobj->limit;
        if(!$list) $list = 12;
        if(!empty($keyword)&&!(preg_match('/^.*$/u', $keyword) > 0)){
            $keyword = Import::gz_iconv()->ec_iconv('GB2312', 'UTF8', $keyword); //编码转换
        }
        
        $rt['thiscid'] = $cid;
        $rt['thisbid'] = $bid;
        $rt['price'] = $price;
        $rt['page'] = $page;
        $rt['sort'] = $sort_type;
        $rt['order'] = $order_type;
        $rt['limit'] = $list;
        
        //当前分类的基本信息
        if($cid>0){
            $sql = "SELECT * FROM `{$this->App->prefix()}goods_cate` WHERE cat_id='$cid' LIMIT 1";
            $rt['cateinfo'] = $this->App->findrow($sql); 
        }else{
            $rt['cateinfo'] = array();  //查找时没有cid
        }
        
        //品牌信息
        if($bid>0){
            $sql = "SELECT brand_name FROM `{$this->App->prefix()}brand` WHERE brand_id='$bid' LIMIT 1";
            $rt['brandinfo']['brand_name'] = $this->App->findvar($sql); 
        }else{
            $rt['brandinfo']['brand_name'] = "";
        }
        
        //显示方式
        if(!isset($_COOKIE['DISPLAY_TYPE'])||empty($_COOKIE['DISPLAY_TYPE']) || !in_array($_COOKIE['DISPLAY_TYPE'],array('list','text'))){
            $rt['display'] = 'text';
        }else{
            $rt['display'] = $_COOKIE['DISPLAY_TYPE'];
        } 
        
        //start 当前位置
        $rt['hear'] = array();
        $perend_id = 0;
        $hear[] = '<a href="'.SITE_URL.'">首页</a>';
        $hear[] = '<a href="'.ADMIN_URL."catalog.php".'">商品中心</a>';
        if($cid>0){
            $rts_ = $this->get_goods_parent_cats($cid); //父类ID
            $rts = Import::basic()->array_sort($rts_,'cat_id'); //根据cat_id排序
            if(!empty($rts)){
                $perend_id = $rts[count($rts)-1]['cat_id']; 
                foreach($rts as $rows){
                    $hear[] = '<a href="'.ADMIN_URL."catalog.php?cid=".$rows["cat_id"].'">'.$rows['cat_name'].'</a>';
                }
            }
            unset($rts,$rts_);
        }elseif($bid>0){ //品牌
            $hear[] = '<a href="'.SITEURL.'brand/">品牌中心</a>';
            //$hear[] = '<a href="'.get_url($rt['brandinfo']['brand_name'],$rt['brandinfo']['brand_id'],"catalog.php?bid=".$rt['brandinfo']['brand_id'],'brand').'">'.$rt['brandinfo']['brand_name'].'</a>';
        }elseif(!empty($keyword)){
                $perend_id = -1;
                switch($keyword){
                    case 'is_hot':
                        $hear[] = '<a href="'.SITE_URL.'hotproduct/">热销商品</a>';
                        break;
                    case 'is_new':
                        $hear[] = '<a href="'.SITE_URL.'newproduct/">新商推荐</a>';
                        break;
                    case 'is_best':
                        $hear[] = '<a href="'.SITE_URL.'bestproduct/">精品推荐</a>';
                        break;
                    case 'is_promote':
                        $hear[] = '<a href="'.SITE_URL.'promote/">促销商品</a>';
                        break;
                    default:
                        $hear[] = '<a href="javascript:;">商品查找</a>';
                        $hear[] = '<a href="'.SITE_URL.'catalog.php?keyword='.$keyword.'">'.$keyword.'</a>';
                        break;
                }
        }elseif(!empty($price)){
            $perend_id = -1;
            $hear[] = '<a href="javascript:;">价格商品</a>';
        }else{
            $perend_id = -1;
            //$hear[] = '<a href="'.get_url('商品中心',0,SITE_URL."catalog.php",'goodscate',array('catalog','index')).'">商品分类</a>';
        }
        if(!empty($hear)){
            $rt['hear'] = implode('&nbsp;&gt;&nbsp;',$hear);
        }else{
            $rt['hear'] = "";
        }
        unset($hear);
        //end 当前位置
    
        //分类信息
        if(!empty($rt['cateinfo']['cat_name'])){
            $rt['infoname'] = $pcat_name.$rt['cateinfo']['cat_name'];
        }elseif(!empty($rt['brandinfo']['brand_name'])){
            $rt['infoname'] = $rt['brandinfo']['brand_name'];
        }elseif(!empty($keyword)){
                switch($keyword){
                    case 'is_hot':
                        $rt['infoname'] =  "热销商品专区";
                        break;
                    case 'is_new':
                        $rt['infoname'] =  "新品推荐";
                        break;
                    case 'is_best':
                        $rt['infoname'] =  "精品推荐";
                        $rt['cateinfo']['cat_title'] = "精选商品-%100满意";
                        break;
                    case 'is_promote':
                        $rt['infoname'] =  "促销商品专区";
                        break;
                    default:
                        $rt['infoname'] =  "商品搜索中心:".$keyword;
                        break;
                }
        }elseif(!empty($price)){
            $rt['infoname'] =  $price.'价格商品';
        }else{
            $rt['infoname'] =  '商品中心';
        }
    
        //条件
        $comd = array('cid'=>$cid,'bid'=>$bid,'price'=>$price,'keyword'=>$keyword); 
        $orderby = " ORDER BY g.{$order_type} {$sort_type}";
        $start = ($page-1)*$list;
        $tt = $this->App->__get_goods_count_category($comd); //获取商品的数量
        $rt['categoodspage'] = Import::basic()->ajax_page($tt,$list,$page,'get_categoods_page_list',array($cid,$bid,$price,$order_type,$sort_type,$list));
        $rt['categoodslist'] = $this->App->__get_categoods_list_category($comd,$orderby,$start,$list); //商品列表
        
        $this->set('rt',$rt);
        $con = $this->fetch('ajax_goods_connent',true);
        $result = array('error' => $err, 'message' => $con); 
        die($json->encode($result));
    }
        
    /* 析构函数 */
    public function  __destruct() 
    {
        unset( $rt );
    }

}