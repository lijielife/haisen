<?php

/**
 * 前台团购 控制器
 */
class Group_productController extends Controller {

    /**
     * 构造函数
     * @author Yusure  http://yusure.cn
     * @date   2016-08-12
     * @param  [param]
     */
    public function  __construct() 
    {
        $this->js( array('jquery.json-1.3.js','goods.js?v=v17','time.js') );//将js文件放到页面头
    }

    // 商品详情页面
    public function index( $gid = 0 ) 
    {
        $this->action( 'common', 'checkjump' );
        $this->css( 'flexslider.css' );
        $this->js( array( 'jquery.flexslider-min.js', 'main.js' ) );
        if ( ! ( $gid > 0 ) ) {
            $this->action( 'common', 'show404tpl' );
        } 
        $uid = $_REQUEST['tid'];

        // 商品详情信息
        $sql = "SELECT * FROM `{$this->App->prefix()}goods_groupbuy`";
        $sql .=" WHERE group_id = '$gid' LIMIT 1"; 
        $rt['goodsinfo'] = $this->App->findrow( $sql );

        if ( empty( $rt['goodsinfo'] ) ) {
            $this->action( 'common', 'show404tpl' );
        }
        
        /* 团购人员信息 Start */
        /* 通过团购商品ID 查询出已成功支付的团购订单  会员信息 */
        $field = 'o.goods_name, order_info.user_id, order_info.add_time';
        $sql = "SELECT {$field} FROM `{$this->App->prefix()}group_goods_order` AS o";
        $sql .= " LEFT JOIN `{$this->App->prefix()}group_goods_order_info` AS order_info ON order_info.order_id = o.order_id";
        $sql .= " WHERE o.goods_id = {$gid}";
        $sql .= " AND order_info.pay_status = 1";
        $sql .= " ORDER BY order_info.add_time DESC";
        $group_user_list = $this->App->find( $sql );
        foreach ( (array)$group_user_list as $k => $v )
        {
            $sql = "SELECT nickname FROM `{$this->App->prefix()}user` WHERE user_id = '{$v['user_id']}'";
            $user_info = $this->App->findrow( $sql );
            $group_user_list[ $k ]['nickname'] = $user_info['nickname'];
            $group_user_list[ $k ]['add_time'] = date( 'Y-m-d H:i:s', $v['add_time'] );
        }
        $this->set( 'group_user_list', $group_user_list );
        /* 团购人员信息 End */

        $sql = "SELECT * FROM `{$this->App->prefix()}userconfig` LIMIT 1";  // 配置信息
        $rt['config'] = $this->App->findrow( $sql );
        
        // 设置页面meta
        $title = '团购商品详情';
        if ( ! defined( NAVNAME ) ) define( 'NAVNAME', $title );
        $this->title( $title . ' - ' . $GLOBALS['LANG']['site_name'] );
        $this->meta( 'title', $title );
        $this->meta( 'keywords',    htmlspecialchars($rt['goodsinfo']['meta_keys']) );
        $this->meta( 'description', htmlspecialchars($rt['goodsinfo']['meta_desc']) );
        $this->set( 'rt', $rt );
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->set( 'mubanid', $GLOBALS['LANG']['mubanid'] );

        $this->template( $mb . '/group_goods_index' );
    }

    /**
     * 增加团购人数
     */
    public function add_number( $data )
    {
        $order_sn = substr( $data['order_sn'], -14, 14 );
        $sql = "SELECT order_id FROM `{$this->App->prefix()}group_goods_order_info` WHERE order_sn = {$order_sn}";
        $order_info = $this->App->findrow( $sql );

        $sql = "SELECT goods_id, goods_number FROM `{$this->App->prefix()}group_goods_order` WHERE order_id = {$order_info['order_id']}";
        $order = $this->App->findrow( $sql );
        $group_id = $order['goods_id'];
        $number   = $order['goods_number'];
        
        $field = 'number, finish_number';
        $sql = "SELECT {$field} FROM `{$this->App->prefix()}goods_groupbuy` WHERE group_id = {$group_id}";
        $groupbuy_info = $this->App->findrow( $sql );
        
        $up_data = array();
        /* 最终完成人数 */
        $finish_number = $groupbuy_info['finish_number'] + $number;
        if ( $finish_number >= $groupbuy_info['number'] )
        {
            $up_data['active'] = 0;
        }
        $up_data['finish_number'] = $finish_number;
        $this->App->update( 'goods_groupbuy', $up_data, 'group_id', $group_id );
    }

    /*析构函数*/
    public function  __destruct() 
    {
        unset( $rt );
    }

}