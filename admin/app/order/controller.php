<?php

/**
 * 团购订单  后台Controller
 */
class OrderController extends Controller
{
    
    public function __construct()
    {
        $this->css( array(
             'content.css',
            'calendar.css' 
        ) ); //look  添加时间显示样式calendar.css
        $this->js( array(
             'calendar.js',
            'calendar-setup.js',
            'calendar-zh.js' 
        ) ); //look  添加时间显示特效js
    }
    
    //订单打印
    function order_print()
    {
        $this->layout( 'kong' );
        $ids    = $_GET['ids'];
        $ids_rt = explode( '-', $ids );
        if ( empty( $ids_rt ) )
            die( "非法错误，传送数据为空" );
        //修改以打印状态
        $sql = "UPDATE `{$this->App->prefix()}goods_order_info` SET is_prints = '1' WHERE order_id IN(" . implode( ',', $ids_rt ) . ")";
        $this->App->query( $sql );
        
        $sql = "SELECT tb1.*,tb2.region_name AS province,tb3.region_name AS city,tb4.region_name AS district,tb5.region_name AS towns, tb6.region_name AS villages FROM `{$this->App->prefix()}goods_order_info` AS tb1";
        $sql .= " LEFT JOIN `{$this->App->prefix()}region` AS tb2 ON tb2.region_id = tb1.province";
        $sql .= " LEFT JOIN `{$this->App->prefix()}region` AS tb3 ON tb3.region_id = tb1.city";
        $sql .= " LEFT JOIN `{$this->App->prefix()}region` AS tb4 ON tb4.region_id = tb1.district";
        $sql .= " LEFT JOIN `{$this->App->prefix()}region` AS tb5 ON tb5.region_id = tb1.town";
        $sql .= " LEFT JOIN `{$this->App->prefix()}region` AS tb6 ON tb6.region_id = tb1.village";
        //          $sql .= " LEFT JOIN `{$this->App->prefix()}user_address` AS tb7 ON tb7.user_id = tb1.user_id";
        $sql .= " WHERE tb1.order_id IN(" . implode( ',', $ids_rt ) . ") ORDER BY tb1.add_time DESC";
        $orderlist = $this->App->find( $sql );
        if ( !empty( $orderlist ) )
        {
            foreach ( $orderlist as $k => $row )
            {
                $sql                    = "SELECT * FROM `{$this->App->prefix()}goods_order` WHERE order_id='$row[order_id]' ORDER BY goods_id";
                $orderlist[$k]['goods'] = $this->App->find( $sql );
            }
        }
        
        $this->set( 'rt', $orderlist );
        $this->template( 'order_print' );
    }
    
    /**
     * 订单列表
     */
    public function order_list()
    {
        // 排序
        $orderby = '';
        if ( isset( $_GET['desc'] ) )
        {
            $orderby = ' ORDER BY ' . $_GET['desc'] . ' DESC';
        }
        else if ( isset( $_GET['asc'] ) )
        {
            $orderby = ' ORDER BY ' . $_GET['asc'] . ' ASC';
        }
        else
        {
            $orderby = ' ORDER BY `order_id` DESC';
        }
        // 分页
        $page = isset( $_GET['page'] ) ? $_GET['page'] : '';
        if ( empty( $page ) )
        {
            $page = 1;
        }
        
        // 条件
        $comd = array();
        if ( isset( $_GET['status'] ) && !empty( $_GET['status'] ) )
        {
            $st = $this->select_statue( $_GET['status'] );
            !empty( $st ) ? $comd[] = $st : '';
        }
        if ( isset( $_GET['order_sn'] ) && !empty( $_GET['order_sn'] ) )
        {
            $comd[] = "order_sn LIKE '%" . trim( $_GET['order_sn'] ) . "%'";
        }
        /* 联系电话搜索 */
        if ( isset( $_GET['mobile'] ) && !empty( $_GET['mobile'] ) )
        {
            $comd[] = "mobile = " . trim( $_GET['mobile'] );
        }
        /* 详细地址搜索 */
        if ( isset( $_GET['address'] ) && !empty( $_GET['address'] ) )
        {
            $comd[] = "address LIKE '%" . trim( $_GET['address'] ) . "%'";
        }
        /***********  look添加 日期查询 开始  ********************************/
        if ( isset( $_GET['add_time1'] ) && !empty( $_GET['add_time1'] ) && empty( $_GET['add_time2'] ) )
        {
            $t      = strtotime( $_GET['add_time1'] ) + 24 * 60 * 60;
            $comd[] = "add_time >= " . strtotime( $_GET['add_time1'] ) . "&&add_time < " . $t;
        }
        if ( isset( $_GET['add_time2'] ) && !empty( $_GET['add_time2'] ) && empty( $_GET['add_time1'] ) )
        {
            $comd[] = "add_time <= " . strtotime( $_GET['add_time2'] );
        }
        if ( isset( $_GET['add_time1'] ) && !empty( $_GET['add_time1'] ) && isset( $_GET['add_time2'] ) && !empty( $_GET['add_time2'] ) )
        {
            $t      = strtotime( $_GET['add_time2'] ) + 24 * 60 * 60;
            $comd[] = "add_time >= " . strtotime( $_GET['add_time1'] ) . "&&add_time < " . $t;
        }
        
        if ( isset( $_GET['consignee'] ) && !empty( $_GET['consignee'] ) )
        {
            $comd[] = "consignee LIKE '%" . trim( $_GET['consignee'] ) . "%'";
        }
        
        if ( isset( $_GET['store_id'] ) && $_GET['store_id'] != '-1' )
        {
            $comd[] = "store_id = " . $_GET['store_id'];
        }
        
        if ( $_GET['wallet_id'] )
        {
            $comd[] = "wallet_id = " . $_GET['wallet_id'];
        }
        $w = '';
        if ( !empty( $comd ) )
        {
            $w = ' WHERE ' . @implode( ' AND ', $comd );
        }
        $list       = 12;
        $start      = ( $page - 1 ) * $list;
        $sql        = "SELECT COUNT(order_id) FROM `{$this->App->prefix()}goods_order_info` $w";
        $tt         = $this->App->findvar( $sql );
        $import_obj = new Import();
        $pagelink   = $import_obj->basic()->getpage( $tt, $list, $page, '?page=', true );
        $this->set( "pagelink", $pagelink );
        
        $field     = 'order_id, order_sn, sn_id, shipping_id, shipping_id_true, user_id, store_id, order_status, shipping_status, pay_status, consignee, add_time, is_prints, mobile, address, province, city, district';
        $sql       = "SELECT {$field}, SUM( order_amount + shipping_fee ) AS tprice FROM `{$this->App->prefix()}goods_order_info` $w GROUP BY order_id $orderby LIMIT $start, $list";
        $rt        = $this->App->find( $sql );
        $orderlist = array();
        if ( !empty( $rt ) )
        {
            foreach ( $rt as $row )
            {
                $uid           = $row['user_id'];
                $shoppingname  = '';
                $shipping_code = '';
                $sid           = $row['shipping_id_true'];
                if ( $sid > 0 )
                {
                    $sql           = "SELECT shipping_name,shipping_code FROM `{$this->App->prefix()}shipping_name` WHERE shipping_id = '$sid' LIMIT 1";
                    $srt           = $this->App->findrow( $sql );
                    $shoppingname  = isset( $srt['shipping_name'] ) ? $srt['shipping_name'] : '';
                    $shipping_code = isset( $srt['shipping_code'] ) ? $srt['shipping_code'] : '';
                }
                if ( empty( $row['order_id'] ) || empty( $row['order_sn'] ) )
                    continue;
                $sql         = "SELECT * FROM `{$this->App->prefix()}store` WHERE store_id = '$row[store_id]' LIMIT 1";
                $store_info  = $this->App->findrow( $sql );
                $areaid      = array(
                     $row['province'],
                    $row['city'],
                    $row['district'] 
                );
                $area_name   = $this->get_area_name( $areaid );
                $orderlist[] = array(
                     'order_id' => $row['order_id'],
                    'order_sn' => $row['order_sn'],
                    'user_id' => $row['user_id'],
                    'consignee' => $row['consignee'],
                    'mobile' => $row['mobile'],
                    'address' => $area_name . $row['address'],
                    'sn_id' => $row['sn_id'],
                    'nickname' => $this->App->findvar( "SELECT nickname FROM `{$this->App->prefix()}user` WHERE user_id = '$uid' LIMIT 1" ),
                    'shoppingname' => $shoppingname,
                    'shipping_code' => $shipping_code,
                    'shipping_id' => $row['shipping_id'],
                    'shipping_id_true' => $row['shipping_id_true'],
                    'tprice' => $row['tprice'],
                    'order_status' => $row['order_status'],
                    'shipping_status' => $row['shipping_status'],
                    'pay_status' => $row['pay_status'],
                    'is_prints' => $row['is_prints'],
                    'add_time' => ( !empty( $row['add_time'] ) ? date( 'Y-m-d H:i:s', $row['add_time'] ) : '无知' ),
                    'status' => $this->get_status( $row['order_status'], $row['pay_status'], $row['shipping_status'] ),
                    'store_name' => $store_info['store_name'] 
                );
            }
        }
        $this->set( 'orderlist', $orderlist );
        $sql          = "SELECT * FROM `{$this->App->prefix()}shipping_name`";
        $shoppinglist = $this->App->find( $sql );
        $this->set( 'shoppinglist', $shoppinglist );
        
        $sql        = "SELECT * FROM `{$this->App->prefix()}store`";
        $store_list = $this->App->find( $sql );
        $this->set( 'store_list', $store_list );
        /* 钱包列表 */
        $this->set( 'wallet_list', $this->action( 'common', 'wallet_list' ) );
        // 选择模板
        $ty = isset( $_GET['tt'] ) && !empty( $_GET['tt'] ) ? trim( $_GET['tt'] ) : '';
        switch ( $ty )
        {
            case 'delivery': // 发货单列表
                $this->template( 'goods_order_delivery_list' );
                break;
            case 'back': // 退货单列表
                $this->template( 'goods_order_back_list' );
                break;
            default:
                $this->template( 'goods_order_list' );
                break;
        }
        
    }
    
    // 订单详情信息
    public function order_info( $id = 0 )
    {
        if ( empty( $id ) )
        {
            $this->jump( 'goods_order.php?type=order_list', 0, '订单ID为空！' );
        }
        $sql = "SELECT tb1.*, tb2.region_name AS province, tb3.region_name AS city,tb5.user_name, tb4.region_name AS district, tb6.region_name AS town, tb7.region_name AS village FROM `{$this->App->prefix()}goods_order_info` AS tb1"; // look添加tb5.user_name
        $sql .= " LEFT JOIN `{$this->App->prefix()}region` AS tb2 ON tb2.region_id = tb1.province";
        $sql .= " LEFT JOIN `{$this->App->prefix()}region` AS tb3 ON tb3.region_id = tb1.city";
        $sql .= " LEFT JOIN `{$this->App->prefix()}region` AS tb4 ON tb4.region_id = tb1.district";
        $sql .= " LEFT JOIN `{$this->App->prefix()}region` AS tb6 ON tb6.region_id = tb1.town";
        $sql .= " LEFT JOIN `{$this->App->prefix()}region` AS tb7 ON tb7.region_id = tb1.village";
        $sql .= " LEFT JOIN `{$this->App->prefix()}user` AS tb5 ON tb5.user_id = tb1.shop_id"; // look添加
        $sql .= " WHERE tb1.order_id = '$id'";
        $rt['orderinfo'] = $this->App->findrow( $sql );
        if ( empty( $rt['orderinfo'] ) )
        {
            $this->jump( 'goods_order.php?type=order_list', 0, '信息为空！' );
        }
        
        $rt['orderinfo']['status'] = $this->get_status( $rt['orderinfo']['order_status'], $rt['orderinfo']['pay_status'], $rt['orderinfo']['shipping_status'] );
        
        $sql = "SELECT tb1.*,tb4.store_name,tb2.goods_thumb,tb2.goods_unit,tb2.goods_brief,tb2.goods_number AS storage,tb2.goods_id, IFNULL(tb3.brand_name, '') AS brand_name FROM `{$this->App->prefix()}goods_order` AS tb1"; //look 添加
        $sql .= " LEFT JOIN `{$this->App->prefix()}goods` AS tb2 ON tb1.goods_id = tb2.goods_id";
        $sql .= " LEFT JOIN `{$this->App->prefix()}brand` AS tb3 ON tb2.brand_id = tb3.brand_id";
        $sql .= " LEFT JOIN `{$this->App->prefix()}store` AS tb4 ON tb1.store_id = tb4.store_id";
        $sql .= " WHERE tb1.order_id = '$id'";
        
        $rt['ordergoods']          = $this->App->find( $sql );
        $rt['order_action_button'] = $this->get_order_action_button( $rt['orderinfo']['order_status'], $rt['orderinfo']['pay_status'], $rt['orderinfo']['shipping_status'] ); //返回订单操作按钮
        
        //订单操作信息
        $sql               = "SELECT * FROM `{$this->App->prefix()}goods_order_action` WHERE order_id='$id' ORDER BY log_time DESC";
        $rs                = $this->App->find( $sql );
        $rt['action_info'] = array();
        if ( !empty( $rs ) )
        {
            foreach ( $rs as $k => $row )
            {
                $rt['action_info'][$k]                    = $row;
                $rt['action_info'][$k]['status']          = $this->get_status( $row['order_status'], $row['pay_status'], $row['shipping_status'] );
                $rt['action_info'][$k]['log_time']        = !empty( $row['log_time'] ) ? date( 'Y-m-d H:i:s', $row['log_time'] ) : '无知';
                $os                                       = $this->get_status( $row['order_status'], 'tt', 'tt' );
                $rt['action_info'][$k]['order_status']    = !empty( $os ) ? str_replace( ',', '', $os ) : "";
                $ss                                       = $this->get_status( 'tt', 'tt', $row['shipping_status'] );
                $rt['action_info'][$k]['shipping_status'] = !empty( $ss ) ? str_replace( ',', '', $ss ) : "";
                ;
                $ps                                  = $this->get_status( 'tt', $row['pay_status'], 'tt' );
                $rt['action_info'][$k]['pay_status'] = !empty( $ps ) ? str_replace( ',', '', $ps ) : "";
                ;
            }
        }
        $this->set( 'rt', $rt );
        unset( $rs );
        $this->template( 'goods_order_info' );
    }
    
    
    // 订单的状态
    public function get_status( $oid = 0, $pid = 0, $sid = 0 )
    //分别为：订单 支付 发货状态
    {
        $str = '';
        switch ( $oid )
        {
            case '0':
                $str .= '未确认,';
                break;
            case '1':
                $str .= '<font color="red">取消</font>,';
                break;
            case '2':
                $str .= '确认,';
                break;
            case '3':
                $str .= '<font color="red">退货</font>,';
                break;
            case '4':
                $str .= '<font color="red">无效</font>,';
                break;
        }
        
        switch ( $pid )
        {
            case '0':
                $str .= '未付款,';
                break;
            case '1':
                $str .= '已付款,';
                break;
            case '2':
                $str .= '已退款,';
                break;
        }
        
        switch ( $sid )
        {
            case '0':
                $str .= '未发货';
                break;
            case '1':
                $str .= '配货中';
                break;
            case '2':
                $str .= '已发货';
                break;
            case '3':
                $str .= '部分发货';
                break;
            case '4':
                $str .= '退货';
                break;
            case '5':
                $str .= '已收货';
                break;
        }
        return $str;
    }
    
    // 选择订单的所在状态
    public function select_statue( $id = '' )
    {
        if ( empty( $id ) )
        {
            return '';
        }
        switch ( $id )
        {
            case '-1':
                return "";
                break;
            case '11':
                return "order_status='0'";
                break;
            case '200':
                return "order_status='2' AND shipping_status='0' AND pay_status='0'";
                break;
            case '210':
                return "order_status='2' AND shipping_status='0' AND pay_status='1'";
                break;
            case '2x0': //代发货
                return "order_status='2' AND shipping_status='0'";
                break;
            case '214':
                return "order_status='2' AND shipping_status='4' AND pay_status='1'";
                break;
            case '1':
                return "order_status='1'";
                break;
            case '4':
                return "order_status='4'";
                break;
            case '3':
                return "order_status='3'";
                break;
            case '2':
                return "pay_status='2'";
                break;
            case '5': //退货申请单
                return "order_status='6'";
                break;
            case '6': //换货申请单
                return "order_status='7'";
                break;
            case '7': //退款申请单
                return "order_status='5'";
                break;
            case '222': //已发货
                return "shipping_status='2'";
                break;
            default:
                return "";
                break;
        }
    }
    
    //获取当前可以操作的按钮
    /*
    if(没确认){
    =>确认、付款、取消、无效
    
    }else if(确认){
    if(没支付){
    =>支付、取消、无效
    
    }else if(已支付){
    if(没发货){
    =>发货、设为未付款、取消（设为没付款、没发货）
    }else if(已发货){
    =>未发货、已收货、退货
    }else if(配货中){
    =>设为没付款、取消
    }else if(已收货){
    =>退货
    }     
    
    }else if(退款){
    if(已发货){
    =>未发货、退货、
    }else if(配货中){
    =>未发货、退货、
    }else if(已收货){
    =>未发货、退货、
    }     
    }
    
    }else if(取消){
    =>确认、移除
    }else if(退货){
    =>确认
    }else if(无效){
    =>确认、移除
    }
    */
    function get_order_action_button( $order_status = 0, $pay_status = 0, $shipping_status = 0 )
    {
        $str = "";
        if ( $order_status == 0 ) //没确认(没付款、没发货)
        {
            $str .= '<input value="确认" class="order_action" type="button" id="200">' . "\n";
            $str .= '<input value="发货" class="order_action" type="button" id="202">' . "\n";
            $str .= '<input value="付款" class="order_action" type="button" id="210">' . "\n";
            $str .= '<input value="取消" class="order_action" type="button" id="100">' . "\n";
            $str .= '<input value="无效" class="order_action" type="button" id="400">' . "\n";
            
        }
        else if ( $order_status == 2 ) //已经确认
        {
            if ( $pay_status == 0 ) //没支付
            {
                $s2 = '0';
                if ( $pay_status == '1' )
                    $s = '1';
                else
                    $s = '0';
                if ( $shipping_status == '0' )
                {
                    $str .= '<input value="发货" class="order_action" type="button" id="2' . $s . '2">' . "\n";
                }
                elseif ( $shipping_status == '2' ) //已经发货
                {
                    $s2 = '2';
                    $str .= '<input value="收货" class="order_action" type="button" id="215">' . "\n";
                }
                if ( $pay_status != '1' )
                {
                    $str .= '<input value="付款" class="order_action" type="button" id="21' . $s2 . '">' . "\n";
                }
                $str .= '<input value="取消" class="order_action" type="button" id="100">' . "\n";
                $str .= '<input value="无效" class="order_action" type="button" id="400">' . "\n";
                
            }
            else if ( $pay_status == 1 ) //已支付
            {
                if ( $shipping_status == 0 ) //未发货
                {
                    if ( $pay_status == '1' )
                        $s = '1';
                    else
                        $s = '0';
                    $str .= '<input value="发货" class="order_action" type="button" id="2' . $s . '2">' . "\n";
                    if ( $pay_status != '1' )
                    {
                        $str .= '<input value="付款" class="order_action" type="button" id="210">' . "\n";
                    }
                    $str .= '<input value="设为未支付" class="order_action" type="button" id="200">' . "\n";
                    $str .= '<input value="取消" class="order_action" type="button" id="100">' . "\n";
                    
                }
                else if ( $shipping_status == 2 ) //已发货
                {
                    $str .= '<input value="设为未支付" class="order_action" type="button" id="200">' . "\n";
                    $str .= '<input value="设为未发货" class="order_action" type="button" id="210">' . "\n";
                    if ( $pay_status != '1' )
                    {
                        $str .= '<input value="付款" class="order_action" type="button" id="210">' . "\n";
                    }
                    $str .= '<input value="收货" class="order_action" type="button" id="215">' . "\n";
                    $str .= '<input value="退货" class="order_action" type="button" id="324">' . "\n";
                    
                }
                else if ( $shipping_status == 1 ) //配货中
                {
                    $str .= '<input value="设为未支付" class="order_action" type="button" id="200">' . "\n";
                    $str .= '<input value="取消" class="order_action" type="button" id="100">' . "\n";
                }
                else if ( $shipping_status == 5 ) //已收货
                {
                    $str .= '<input value="退货" class="order_action" type="button" id="324">' . "\n";
                    if ( $pay_status != '1' )
                    {
                        $str .= '<input value="付款" class="order_action" type="button" id="210">' . "\n";
                    }
                }
            }
            else if ( $pay_status == 2 ) //退款
            {
                if ( $shipping_status == 2 ) //已发货
                {
                    $str .= '<input value="设为未发货" class="order_action" type="button" id="120">' . "\n";
                    $str .= '<input value="退货" class="order_action" type="button" id="124">' . "\n";
                }
                else if ( $shipping_status == 1 ) //配货中
                {
                    $str .= '<input value="设为未发货" class="order_action" type="button" id="120">' . "\n";
                    $str .= '<input value="退货" class="order_action" type="button" id="124">' . "\n";
                }
                else if ( $shipping_status == 5 ) //已收货
                {
                    $str .= '<input value="设为未发货" class="order_action" type="button" id="120">' . "\n";
                    $str .= '<input value="退货" class="order_action" type="button" id="124">' . "\n";
                }
            }
        }
        else if ( $order_status == 1 ) //取消
        {
            $str .= '<input value="确认" class="order_action" type="button" id="200">' . "\n";
            $str .= '<input value="移除" class="order_action" type="button" id="remove">' . "\n";
        }
        else if ( $order_status == 4 ) //无效
        {
            $str .= '<input value="确认" class="order_action" type="button" id="200">' . "\n";
        }
        else if ( $order_status == 3 ) //退货
        {
            $str .= '<input value="确认" class="order_action" type="button" id="200">' . "\n";
            $str .= '<input value="移除" class="order_action" type="button" id="remove">' . "\n";
        }
        else if ( $order_status == 5 ) //同意退款
        {
            $str .= '<input value="确认退款" class="order_action" type="button" id="720">' . "\n";
        }
        else if ( $order_status == 6 ) //同意退货
        {
            $str .= '<input value="确认退货" class="order_action" type="button" id="340">' . "\n";
        }
        else if ( $order_status == 7 ) //同意退货
        {
            $str .= '<input value="确认" class="order_action" type="button" id="200">' . "\n";
            $str .= '<input value="移除" class="order_action" type="button" id="remove">' . "\n";
        }
        return $str;
    }
    
    // ajax订单状态操作记录
    public function ajax_op_status( $data = array() )
    {
        @set_time_limit( 300 ); // 最大运行时间
        if ( strlen( $data['opstatus'] ) != 3 )
        {
            echo '非法操作';
            exit;
        }
        if ( empty( $data['opid'] ) )
        {
            echo '非法操作';
            exit;
        }
        
        $datas['order_status']    = substr( $data['opstatus'], 0, 1 );
        $datas['pay_status']      = substr( $data['opstatus'], 1, 1 );
        $datas['shipping_status'] = substr( $data['opstatus'], -1 );
        $order_id                 = $data['opid'];
        // 当前购买用户
        $pu                       = $this->App->findrow( "SELECT user_id,order_sn,store_id FROM `{$this->App->prefix()}goods_order_info` WHERE order_id = '$order_id' LIMIT 1" );
        $uid                      = isset( $pu['user_id'] ) ? $pu['user_id'] : 0;
        $order_sn                 = isset( $pu['order_sn'] ) ? $pu['order_sn'] : '';
        if ( $datas['shipping_status'] == '5' || $datas['shipping_status'] == '2' )
        {
            // 收货，开通分销商
            if ( $uid > 0 )
            {
                $rank = $this->App->findvar( "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id = '$uid' LIMIT 1" );
                //修改为不论购买什么商品，都开通分销中心 by niripsa
                // if ( $rank == '1' && $pu['store_id'] == 0 )
                if ( $rank == '1')
                {
                    $this->App->update( 'user', array(
                         'user_rank' => '12' 
                    ), 'user_id', $uid );
                    $this->action( 'user', 'update_user_tree', $uid, $uid );
                    $this->action( 'user', 'update_daili_tree', $uid ); //更新代理关系
                }
                
            }
        }
        
        /* 发货 */
        if ( $datas['shipping_status'] == '2' )
        {
            // 发货通知
            $rr        = $this->App->findrow( "SELECT wecha_id,nickname FROM `{$this->App->prefix()}user` WHERE user_id='$uid' LIMIT 1" );
            $pwecha_id = isset( $rr['wecha_id'] ) ? $rr['wecha_id'] : '';
            $nickname  = isset( $rr['nickname'] ) ? $rr['nickname'] : '';
            if ( !empty( $pwecha_id ) && !empty( $nickname ) )
            {
                $this->action( 'api', 'send', array(
                     'openid' => $pwecha_id,
                    'appid' => '',
                    'appsecret' => '',
                    'nickname' => $nickname,
                    'order_sn' => $order_sn 
                ), 'fahuo' );
            }
        }
        
        /* 退款操作 */
        if ( $data['opstatus'] == '720' )
        {
            // 已经返的佣金
            $sql = "SELECT * FROM  `{$this->App->prefix()}user_money_change` WHERE order_sn='$order_sn'";
            $rr  = $this->App->find( $sql );
            if ( !empty( $rr ) )
            {
                foreach ( $rr as $item )
                {
                    $money = $item['money'];
                    $uids  = $item['uid']; // 返佣用户
                    $cid   = $row['cid'];
                    $sql   = "UPDATE `{$this->App->prefix()}user` SET `money_ucount` = `money_ucount`-$money,`mymoney` = `mymoney`-$money WHERE user_id = '$uids'";
                    $this->App->query( $sql );
                    $this->App->delete( 'user_money_change', 'cid', $cid );
                }
            }
            
            // 返佣缓存
            $sql = "SELECT * FROM  `{$this->App->prefix()}user_money_change_cache` WHERE order_sn='$order_sn'";
            $rr  = $this->App->find( $sql );
            if ( !empty( $rr ) )
            {
                foreach ( $rr as $item )
                {
                    $money = $item['money'];
                    $uids  = $item['uid']; // 返佣用户
                    $cid   = $row['cid'];
                    $this->App->delete( 'user_money_change_cache', 'cid', $cid );
                }
            }
            
            //积分
            $sql = "SELECT * FROM  `{$this->App->prefix()}user_point_change` WHERE order_sn='$order_sn'";
            $rr  = $this->App->find( $sql );
            if ( !empty( $rr ) )
            {
                foreach ( $rr as $item )
                {
                    $points = $item['points'];
                    $uids   = $item['uid'];
                    $cid    = $row['cid'];
                    $sql    = "UPDATE `{$this->App->prefix()}user` SET `mypoints` = `mypoints`-$points,`points_ucount` = `points_ucount`-$points WHERE user_id = '$uids'";
                    $this->App->query( $sql );
                    $this->App->delete( 'user_point_change', 'cid', $cid );
                }
            }
        }
        
        /* 确认收货 */
        if ( $datas['shipping_status'] == '5' )
        {
            $datas['shipping_time'] = time();
            $sql                    = "SELECT * FROM `{$this->App->prefix()}userconfig` LIMIT 1";
            $rts                    = $this->App->findrow( $sql );
            /* 收货返佣金 */
            //要求改成收款时返佣金
            //if ( $rts['userbonus'] )
            //{
                /* 返佣开始 */
            //    $this->rebate( $order_id );
                /* 返分红开始 */
            //    $this->dividend( $order_id );
            //}
        }
        elseif ( $datas['pay_status'] == '1' )
        {
            $datas['pay_time'] = time();
        }
        
        $bIsSuccess = $this->App->update( 'goods_order_info', $datas, 'order_id', $data['opid'] ); // 更新状态
        if ( $bIsSuccess && !empty( $datas['shipping_time'] ) )
        {
            //更新个人积累
            $field         = 'user_id,order_amount';
            $id            = intval( $data['opid'] );
            $sql           = "SELECT {$field} FROM `{$this->App->prefix()}goods_order_info` WHERE order_id = '$id' LIMIT 1";
            $aOrderInfo    = $this->App->findrow( $sql );
            $sNow          = date( 'Y' );
            $iUserId       = intval( $aOrderInfo['user_id'] );
            $fPersonBuySum = floatval( $aOrderInfo['order_amount'] );
            
            if ( !empty( $iUserId ) )
            {
                $sql           = "update `gz_user` set `person_buy_sum` = `person_buy_sum` + {$fPersonBuySum} where `user_id` = {$iUserId} and `person_buy_year` = '{$sNow}'";
                $iAffectedRows = $this->App->query( $sql );
                if ( empty( $iAffectedRows ) )
                {
                    $sql = "update `gz_user` set `person_buy_sum` = {$fPersonBuySum}, `person_buy_year` = '{$sNow}'  where `user_id` = {$iUserId}";
                    $this->App->query( $sql );
                }
            }
        } //end of if
        
        
        $datas['order_id']    = $data['opid'];
        $datas['action_note'] = !empty( $data['opremark'] ) ? $data['opremark'] : "---";
        $datas['log_time']    = time();
        $datas['action_user'] = $this->Session->read( 'adminname' );
        $this->App->insert( 'goods_order_action', $datas ); //操作记录
        // 查询操作
        $sql = "SELECT * FROM `{$this->App->prefix()}goods_order_action` WHERE order_id='$data[opid]' ORDER BY log_time DESC";
        $rt  = $this->App->find( $sql );
        if ( !empty( $rt ) )
        {
            foreach ( $rt as $k => $row )
            {
                $rt[$k]                    = $row;
                $rt[$k]['status']          = $this->get_status( $row['order_status'], $row['pay_status'], $row['shipping_status'] );
                $rt[$k]['log_time']        = !empty( $row['log_time'] ) ? date( 'Y-m-d H:i:s', $row['log_time'] ) : '无知';
                $os                        = $this->get_status( $row['order_status'], 'tt', 'tt' );
                $rt[$k]['order_status']    = !empty( $os ) ? str_replace( ',', '', $os ) : "";
                $ss                        = $this->get_status( 'tt', 'tt', $row['shipping_status'] );
                $rt[$k]['shipping_status'] = !empty( $ss ) ? str_replace( ',', '', $ss ) : "";
                $ps                        = $this->get_status( 'tt', $row['pay_status'], 'tt' );
                $rt[$k]['pay_status']      = !empty( $ps ) ? str_replace( ',', '', $ps ) : "";
                ;
            }
        }
        
        // 返佣金
        if ( $datas['pay_status'] == '1' )
        {
            $order_id = $data['opid'];
            $order_sn = $this->App->findvar( "SELECT order_sn FROM `{$this->App->prefix()}goods_order_info` WHERE order_id = '$order_id' LIMIT 1" );
            $this->pay_successs_tatus2( $order_sn );
        }
        
        $this->set( 'action_info', $rt );
        $this->fetch( 'goods_order_action_ajax' );
    }
    
    // ajax更新订单附言
    public function ajax_up_postscript( $data = array() )
    {
        $order_id = intval( $_POST['order_id'] );
        $order_id or die( '缺少订单ID' );
        $data               = array();
        $data['postscript'] = $_POST['postscript'];
        $pushOption = $_POST['pushOption'];
        $res                = $this->App->update( 'goods_order_info', $data, 'order_id', $order_id );
        if ( $res !== false )
        {
            if ( $pushOption == 'rebate' ) {
                /* 开始分佣 */
                $this->rebate( $order_id );                
            } elseif ( $pushOption == 'dividend' ) {
                /* 开始分红 by niripsa */
                $this->dividend( $order_id );
            }
            /* TODO: 推送给购买者 微信提醒 */
            $this->_deliver_goods_push( $order_id );
            die( 'true' );
        }
        else
        {
            die( 'false' );
        }
    }

    /**
     * 多发商品（例如：送一个月牛奶） 发货的推送提醒
     */
    private function _deliver_goods_push( $order_id = 0 )
    {
        if ( ! $order_id ) { return; }
        /* 查找 open_id, nickname， 商品名称， */
        $sql = "SELECT goods_name FROM `{$this->App->prefix()}goods_order` WHERE order_id = '$order_id'";
        $goods_name = $this->App->findvar( $sql );

        $sql = "SELECT user_id FROM `{$this->App->prefix()}goods_order_info` WHERE order_id = '$order_id'";
        $user_id = $this->App->findvar( $sql );

        $sql = "SELECT wecha_id, nickname FROM `{$this->App->prefix()}user` WHERE user_id = '$user_id'";
        $user_info = $this->App->findrow( $sql );

        $send_data = array(
            'openid'     => $user_info['wecha_id'],
            'nickname'   => $user_info['nickname'],
            'goods_name' => $goods_name,
            'order_id'   => $order_id
        );

        $this->action( 'api', 'send', $send_data, 'deliver_goods_push' );
    }
    
    /**
     * 检查钱包状态
     * wallet_id 钱包ID
     * user_id   用户ID
     */
    private function _wallet_status( $wallet_id, $user_id )
    {
        $field = 'wallet_' . $wallet_id;
        $sql   = "SELECT {$field} FROM `{$this->App->prefix()}commission` WHERE user_id = '$user_id'";
        return $this->App->findvar( $sql );
    }

    //新增个人分红(变相折扣) by niripsa
    public function dividend( $id ){
        $sql = "SELECT * FROM `{$this->App->prefix()}userconfig` LIMIT 1";
        $rts = $this->App->findrow( $sql );
        // 开启收货返分红选项
        $field = 'user_id,goods_amount,order_amount,order_sn,pay_status,shipping_status,order_id,fenhong_num';
        $sql = "SELECT {$field} FROM `{$this->App->prefix()}goods_order_info` WHERE order_id = '$id' LIMIT 1";
        $order_info = $this->App->findrow( $sql );
        
        //pay_status:支付状态,0为未支付,1为已支付
        //shipping_status:配送状态,0,2,4,5   收款时分红不需要验证物流状态
        //if ( $order_info['pay_status'] == 1 && $order_info['shipping_status'] == 2 && ! empty( $id ) )
         if ( $order_info['pay_status'] == 1 && ! empty( $id ) ) 
        {
            // 计算资金，便于下面返利
            // 计算每个产品的分红
            $sql = "SELECT fenhong1,goods_number,wallet_id FROM `{$this->App->prefix()}goods_order` WHERE order_id = '$id'";
            $moneys = $this->App->find( $sql );
            /* 所属佣金钱包 */
            $wallet_id = $moneys[0]['wallet_id'];
            $user_id      = $uid = isset($order_info['user_id']) ? $order_info['user_id'] : 0;  // 自己
            $scores_money = isset($order_info['order_amount']) ? $order_info['order_amount'] : 0; // 实际消费
            $pay_status   = isset($order_info['pay_status']) ? $order_info['pay_status'] : 0;
            $order_id     = isset($order_info['order_id']) ? $order_info['order_id'] : 0;
            $order_sn     = isset($order_info['order_sn']) ? $order_info['order_sn'] : 0;
            
            $sql = "SELECT nickname FROM `{$this->App->prefix()}user` WHERE user_id='$uid' LIMIT 1";
            $nickname = $this->App->findvar( $sql );
            $record = array();
            $moeys = 0;
            //分红返利
            if ( $user_id > 0 )
            {                
                $sql = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id = '$user_id' LIMIT 1";
                $rank = $this->App->findvar( $sql );
                /* 不是普通会员 */
                if ( $rank != '1' )
                {
                    /*$sql = "SELECT types FROM `{$this->App->prefix()}user` WHERE user_id = '$user_id' LIMIT 1";这个好像用不到
                    $types = $this->App->findvar( $sql );*/
                    $off = 0;
                    /* 普通分销商 特权、高级先去掉，以后如果需要从log里面找 */
                    if ( $rank == '12' )
                    {
                        if ( $rts['fenhong180'] < 101 && $rts['fenhong180'] > 0 )
                        {
                            $off = $rts['fenhong180'] / 100;
                            if ( ! empty( $moneys ) )
                            {
                                foreach ( $moneys as $row )
                                {
                                    //fenhong1 个人分红
                                    if ( $row['fenhong1'] > 0 )
                                    {
                                        $moeys += $row['fenhong1'] * $row['goods_number'] * $off;
                                    }
                                }
                            }                                            
                        }
                    }
                    if ( $moeys > 0 )
                    {
                        /* 分红分次，计算每一次的佣金费用 */
                        $moeys = $moeys / $order_info['fenhong_num'];
                        $moeys = $this->format_price( $moeys );
                    }
                    $this->writeLog( __FILE__ . "|uid:{$uid}| 1 level | money:" . $moeys . "|fenhong:" . $off . '|rank:' . $rank . '|parent_id:' . $parent_uid );                    
                    /* 检查钱包状态 */
                    $wallet_status = $this->_wallet_status( $wallet_id, $user_id );
                    if ( ! empty( $moeys ) && $wallet_status == '1' )
                    {
                        /* 加钱 */
                        $this->_add_money( $wallet_id, $user_id, $moeys );
                        /* 加记录 */
                        $this->_add_fenhong_change( $uid, $user_id, $order_sn, $moeys, $wallet_id );
                        /* 发通知 */
                        $this->_send_notice( $user_id, $nickname );
                    }
                }
            }
        }
    }

    
    /**
     * 返佣金算法
     */
    public function rebate( $id )
    {
        $sql = "SELECT * FROM `{$this->App->prefix()}userconfig` LIMIT 1";
        $rts = $this->App->findrow( $sql );
        // 开启收货返佣选项
        $field = 'user_id,parent_uid,parent_uid2,parent_uid3,goods_amount,order_amount,order_sn,pay_status,shipping_status,order_id,commission_num,commission_surplus';
        $sql = "SELECT {$field} FROM `{$this->App->prefix()}goods_order_info` WHERE order_id = '$id' LIMIT 1";
        $order_info = $this->App->findrow( $sql );
        
        if ( 
            $order_info['pay_status'] == 1 
            && $order_info['shipping_status'] == 2 
            && !empty( $id ) 
            && $order_info['commission_surplus'] > 0 
        )
        {
            // 计算资金，便于下面返佣
            // 计算每个产品的佣金
            $sql = "SELECT takemoney1,takemoney2,takemoney3,goods_number,wallet_id FROM `{$this->App->prefix()}goods_order` WHERE order_id = '$id'";
            $moneys    = $this->App->find( $sql );
            /* 所属佣金钱包 */
            $wallet_id = $moneys[0]['wallet_id'];
            
            $parent_uid  = isset( $order_info['parent_uid'] ) ? $order_info['parent_uid'] : 0; // 一层上级
            $parent_uid2 = isset( $order_info['parent_uid2'] ) ? $order_info['parent_uid2'] : 0; // 二层上级
            $parent_uid3 = isset( $order_info['parent_uid3'] ) ? $order_info['parent_uid3'] : 0; // 三层上级
            $parent_uid4 = $this->return_daili_uid( $parent_uid3 ); //四层上级
            
            $aParentIds = array( $parent_uid, $parent_uid2, $parent_uid3, $parent_uid4 );
            $sTeamIds   = implode( ',', $aParentIds );
            //获取四人的团队积累和
            $fTeamSum = $this->App->findvar( "SELECT sum(person_buy_sum) as team_sum FROM `{$this->App->prefix()}user` WHERE user_id in ($sTeamIds) LIMIT 1" );
            //获得第三级的个人积累
            $fPersonSum = $this->App->findvar( "SELECT person_buy_sum FROM `{$this->App->prefix()}user` WHERE user_id = {$parent_uid3} LIMIT 1" );
            
            $user_id      = $uid = isset( $order_info['user_id'] ) ? $order_info['user_id'] : 0; // 自己
            $scores_money = isset( $order_info['order_amount'] ) ? $order_info['order_amount'] : 0; // 实际消费
            $pay_status   = isset( $order_info['pay_status'] ) ? $order_info['pay_status'] : 0;
            $order_id     = isset( $order_info['order_id'] ) ? $order_info['order_id'] : 0;
            $order_sn     = isset( $order_info['order_sn'] ) ? $order_info['order_sn'] : 0;
            
            $sql      = "SELECT nickname FROM `{$this->App->prefix()}user` WHERE user_id='$uid' LIMIT 1";
            $nickname = $this->App->findvar( $sql );
            $record   = array();
            $moeys    = 0;
            // 一级返佣金
            if ( $parent_uid > 0 )
            {
                /* 一层上级送积分 */
                $tjpointnum = isset( $rts['tjpointnum'] ) ? $rts['tjpointnum'] : 0;
                if ( $tjpointnum > 0 )
                {
                    $sql = "SELECT parent_uid FROM `{$this->App->prefix()}user_tuijian` WHERE uid = '$uid' LIMIT 1";
                    $pid = $this->App->findvar( $sql );
                    if ( $pid > 0 )
                    {
                        $points_num = 1;
                        $thismonth  = date( 'Y-m-d', time() );
                        /* 一层上级获得 1 积分 */
                        $sql = "UPDATE `{$this->App->prefix()}user` SET `points_ucount` = `points_ucount`+$points_num,`mypoints` = `mypoints`+$points_num WHERE user_id = '$pid'";
                        $this->App->query( $sql );
                        $this->App->insert( 'user_point_change', array(
                            'order_sn' => $order_sn,
                            'thismonth' => $thismonth,
                            'points' => $points_num,
                            'changedesc' => '推荐消费返积分',
                            'time' => time(),
                            'uid' => $pid 
                        ) );
                    }
                }
                
                $sql  = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id = '$parent_uid' LIMIT 1";
                $rank = $this->App->findvar( $sql );
                /* 不是普通会员 */
                if ( $rank != '1' )
                {
                    $sql   = "SELECT types FROM `{$this->App->prefix()}user` WHERE user_id = '$parent_uid' LIMIT 1";
                    $types = $this->App->findvar( $sql );
                    $off   = 0;
                    /* 普通分销商 特权、高级先去掉，以后如果需要从log里面找 */
                    if ( $rank == '12' )
                    {
                        $rts['ticheng180_1'] = intval( $rts['ticheng180_1_1'] * $rts['ticheng180_1_2'] / 100 );
                        if ( $rts['ticheng180_1'] < 101 && $rts['ticheng180_1'] > 0 )
                        {
                            $off = $rts['ticheng180_1'] / 100;
                            if ( !empty( $moneys ) )
                            {
                                foreach ( $moneys as $row )
                                {
                                    if ( $row['takemoney1'] > 0 )
                                    {
                                        $moeys += $row['takemoney1'] * $row['goods_number'] * $off;
                                    }
                                }
                            }
                        }
                    }

                    if ( $moeys > 0 )
                    {
                        /* 佣金分次，计算每一次的佣金费用 */
                        $moeys = $moeys / $order_info['commission_num'];
                        $moeys = $this->format_price( $moeys );
                    }
                    $this->writeLog( __FILE__ . "|uid:{$uid}| 1 level | money:" . $moeys . "|ticheng:" . $off . '|rank:' . $rank . '|parent_id:' . $parent_uid );
                    /* 检查钱包状态 */
                    $wallet_status = $this->_wallet_status( $wallet_id, $parent_uid );
                    if ( $moeys > 0 && $wallet_status == '1' )
                    {
                        /* 加钱 */
                        $this->_add_money( $wallet_id, $parent_uid, $moeys );
                        /* 减少 user_money_change_cache */
                        $this->_decr_money_change_cache( $moeys, $order_info['order_sn'], $parent_uid );
                        /* 加记录 */
                        $this->_add_money_change( $uid, $parent_uid, $order_sn, $moeys, $wallet_id );
                        /* 发通知 */
                        $this->_send_notice( $parent_uid, $nickname );
                    }
                }
            }
            
            $moeys = 0;
            // 二级返佣金
            if ( $parent_uid2 > 0 )
            {
                $sql  = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id = '$parent_uid2' LIMIT 1";
                $rank = $this->App->findvar( $sql );
                /* 不是普通会员 */
                if ( $rank != '1' )
                {
                    $off = 0;
                    /* 普通分销商 特权、高级先去掉，以后如果需要从log里面找 */
                    if ( $rank == '12' )
                    {
                        $rts['ticheng180_2'] = intval( $rts['ticheng180_2_1'] * $rts['ticheng180_2_2'] / 100 );
                        if ( $rts['ticheng180_2'] < 101 && $rts['ticheng180_2'] > 0 )
                        {
                            $off = $rts['ticheng180_2'] / 100;
                            if ( !empty( $moneys ) )
                            {
                                foreach ( $moneys as $row )
                                {
                                    if ( $row['takemoney1'] > 0 )
                                    {
                                        $moeys += $row['takemoney1'] * $row['goods_number'] * $off;
                                    }
                                }
                            }
                        }
                    }
                    
                    if ( $moeys > 0 )
                    {
                        /* 佣金分次，计算每一次的佣金费用 */
                        $moeys = $moeys / $order_info['commission_num'];
                        $moeys = $this->format_price( $moeys );
                    }
                    $this->writeLog( __FILE__ . "|uid:{$uid}| 2 level | money:" . $moeys . "|ticheng:" . $off . '|rank:' . $rank . '|parent_id:' . $parent_uid2 );
                    /* 检查钱包状态 */
                    $wallet_status = $this->_wallet_status( $wallet_id, $parent_uid2 );
                    if ( !empty( $moeys ) && $wallet_status == '1' )
                    {
                        /* 加钱 */
                        $this->_add_money( $wallet_id, $parent_uid2, $moeys );
                        /* 减少 user_money_change_cache */
                        $this->_decr_money_change_cache( $moeys, $order_info['order_sn'], $parent_uid2 );
                        /* 加记录 */
                        $this->_add_money_change( $uid, $parent_uid2, $order_sn, $moeys, $wallet_id );
                        /* 发通知 */
                        $this->_send_notice( $parent_uid2, $nickname );
                    }
                }
            }
            
            $moeys = 0;
            // 三级返佣金
            if ( $parent_uid3 > 0 )
            {
                $sql  = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id = '$parent_uid3' LIMIT 1";
                $rank = $this->App->findvar( $sql );
                /* 不是普通会员 */
                if ( $rank != '1' )
                {
                    $off = 0;
                    /* 普通分销商 特权、高级先去掉，以后如果需要从log里面找 */
                    if ( $rank == '12' )
                    {
                        if ( floatval( $rts['person_accumulative_money'] ) > 0 && floatval( $fPersonSum ) >= floatval( $rts['person_accumulative_money'] ) )
                        {
                            $rts['ticheng180_3'] = intval( $rts['ticheng180_3_1'] * $rts['ticheng180_3_2'] / 100 );
                            if ( $rts['ticheng180_3'] < 101 && $rts['ticheng180_3'] > 0 )
                            {
                                $off = $rts['ticheng180_3'] / 100;
                                if ( !empty( $moneys ) )
                                {
                                    foreach ( $moneys as $row )
                                    {
                                        if ( $row['takemoney1'] > 0 )
                                        {
                                            $moeys += $row['takemoney1'] * $row['goods_number'] * $off;
                                        }
                                    }
                                }
                            }
                        }
                    }
                    
                    if ( $moeys > 0 )
                    {
                        /* 佣金分次，计算每一次的佣金费用 */
                        $moeys = $moeys / $order_info['commission_num'];
                        $moeys = $this->format_price( $moeys );
                    }
                    $this->writeLog( __FILE__ . "|uid:{$uid}| 3 level | money:" . $moeys . "|ticheng:" . $off . '|rank:' . $rank . '|parent_id:' . $parent_uid3 );
                    /* 检查钱包状态 */
                    $wallet_status = $this->_wallet_status( $wallet_id, $parent_uid3 );
                    if ( !empty( $moeys ) && $wallet_status == '1' )
                    {
                        /* 加钱 */
                        $this->_add_money( $wallet_id, $parent_uid3, $moeys );
                        /* 减少 user_money_change_cache */
                        $this->_decr_money_change_cache( $moeys, $order_info['order_sn'], $parent_uid3 );
                        /* 加记录 */
                        $this->_add_money_change( $uid, $parent_uid3, $order_sn, $moeys, $wallet_id );
                        /* 发通知 */
                        $this->_send_notice( $parent_uid3, $nickname );
                    }
                }
            } //end of if uid3
            
            $moeys = 0;
            // 四级返佣金
            if ( $parent_uid4 > 0 )
            {
                $sql  = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id = '$parent_uid4' LIMIT 1";
                $rank = $this->App->findvar( $sql );
                /* 不是普通会员 */
                if ( $rank != '1' )
                {
                    $off = 0;
                    /* 普通分销商 特权、高级先去掉，以后如果需要从log里面找 */
                    if ( $rank == '12' )
                    {
                        if ( floatval( $rts['team_accumulative_money'] ) > 0 && floatval( $fTeamSum ) >= floatval( $rts['team_accumulative_money'] ) )
                        {
                            $rts['ticheng180_4'] = intval( $rts['ticheng180_4_1'] * $rts['ticheng180_4_2'] / 100 );
                            if ( $rts['ticheng180_4'] < 101 && $rts['ticheng180_4'] > 0 )
                            {
                                $off = $rts['ticheng180_4'] / 100;
                                if ( !empty( $moneys ) )
                                {
                                    foreach ( $moneys as $row )
                                    {
                                        if ( $row['takemoney1'] > 0 )
                                        {
                                            $moeys += $row['takemoney1'] * $row['goods_number'] * $off;
                                        }
                                    }
                                }                                    
                            }
                        }
                    }
                    if ( $moeys > 0 )
                    {
                        /* 佣金分次，计算每一次的佣金费用 */
                        $moeys = $moeys / $order_info['commission_num'];
                        $moeys = $this->format_price( $moeys );
                    }
                    $this->writeLog( __FILE__ . "|uid:{$uid}| 4 level | money:" . $moeys . "|ticheng:" . $off . '|rank:' . $rank . '|parent_id:' . $parent_uid4 );
                    /* 检查钱包状态 */
                    $wallet_status = $this->_wallet_status( $wallet_id, $parent_uid4 );
                    if ( !empty( $moeys ) && $wallet_status == '1' )
                    {
                        /* 加钱 */
                        $this->_add_money( $wallet_id, $parent_uid4, $moeys );
                        /* 减少 user_money_change_cache */
                        $this->_decr_money_change_cache( $moeys, $order_info['order_sn'], $parent_uid4 );
                        /* 加记录 */
                        $this->_add_money_change( $uid, $parent_uid4, $order_sn, $moeys, $wallet_id );
                        /* 发通知 */
                        $this->_send_notice( $parent_uid4, $nickname );
                    }
                }
            } //end of if uid4

            /* 剩余次数减1 commission_surplus - 1 */
            $sql = "UPDATE `{$this->App->prefix()}goods_order_info` SET commission_surplus = commission_surplus - 1 WHERE order_id = '$order_id'";
            $this->App->query( $sql );
        }
    }
    
    /**
     * 根据钱包ID 把佣金增加至对应的钱包
     */
    private function _add_money( $wallet_id, $user_id, $money )
    {
        $field         = 'wallet_' . $wallet_id;
        $sql           = "SELECT {$field} FROM `{$this->App->prefix()}commission` WHERE user_id = '$user_id'";
        $wallet_status = $this->App->findvar( $sql );
        if ( $wallet_status == '1' )
        {
            $field = 'wallet_money' . $wallet_id;
            $sql   = "UPDATE `{$this->App->prefix()}commission` SET $field = $field + $money WHERE user_id = '$user_id'";
            $this->App->query( $sql );
        }
    }
    
    /**
     * 佣金变动记录
     * buyer_id    购买者ID
     * parent_uid  受益者ID
     * order_sn    订单编号
     * money       变动金额
     */
    private function _add_money_change( $buyer_id, $parent_uid, $order_sn, $money, $wallet_id )
    {
        $thismonth = date( 'Y-m-d', time() );
        $thism     = date( 'Y-m', time() );
        $this->App->insert( 'user_money_change', array(
            'buyuid' => $buyer_id,
            'order_sn' => $order_sn,
            'thismonth' => $thismonth,
            'thism' => $thism,
            'money' => $money,
            'changedesc' => '购买商品返佣金,钱包' . $wallet_id,
            'time' => time(),
            'wallet_id' => $wallet_id,
            'uid' => $parent_uid 
        ) );
    }
    /**
     * 分红变动记录
     * buyer_id    购买者ID
     * uid  受益者ID(同时也是购买者)
     * order_sn    订单编号
     * money       变动金额
     */
    private function _add_fenhong_change( $buyer_id, $uid, $order_sn, $money, $wallet_id )
    {
        $thismonth             = date('Y-m-d', time());
        $thism                 = date('Y-m', time());
        $this->App->insert( 'user_money_change', array(
            'buyuid'     => $buyer_id,
            'order_sn'   => $order_sn,
            'thismonth'  => $thismonth,
            'thism'      => $thism,
            'money'      => $money,
            'changedesc' => '购买商品返分红,钱包' . $wallet_id,
            'time'       => time(),
            'wallet_id'  => $wallet_id,
            'uid'        => $uid
        ));
    }
    /**
     * 减少money_change_cache.money
     */
    private function _decr_money_change_cache( $money, $order_sn, $uid )
    {
        $sql = "UPDATE `{$this->App->prefix()}user_money_change_cache` 
        SET money = money - {$money} 
        WHERE order_sn = '{$order_sn}' AND uid = '{$uid}'";
        $this->App->query( $sql );
    }
    
    /**
     * 发送微信推送通知
     */
    private function _send_notice( $user_id, $type = 'payreturnmoney' )
    {
        // $sql = "SELECT nickname, wecha_id FROM `{$this->App->prefix()}user` WHERE user_id = '$user_id' LIMIT 1";
        // $user_info  = $this->App->findrow( $sql );
        // $send_data = array(
        //     'openid' => $user_info['wecha_id'],
        //     'nickname' => $user_info['nickname'] 
        // );
        // $this->action( 'api', 'send', $send_data, $type );
    }
    
    function format_price( $price = 0 )
    {
        if ( empty( $price ) )
            return '0.00';
        return number_format( $price, 2, '.', '' );
    }
    
    //收款后返佣
    function pay_successs_tatus2( $order_sn = '' )
    {
        set_time_limit( 300 ); //最大运行时间
        
        //上三级返佣金
        if ( empty( $order_sn ) )
            exit;
        $pay_status = $this->App->findvar( "SELECT pay_status FROM `{$this->App->prefix()}goods_order_info` WHERE order_sn='$order_sn' LIMIT 1" );
        $tt         = "false";
        //if($pay_status!='1'){
        //检查
        $sql        = "SELECT cid FROM `{$this->App->prefix()}user_money_change` WHERE order_sn='$order_sn'"; //资金
        $cid        = $this->App->findvar( $sql );
        if ( $cid > 0 )
        {
            return false;
            exit;
        }
        else
        {
            $sql = "SELECT cid FROM `{$this->App->prefix()}user_point_change` WHERE order_sn='$order_sn'"; //积分
            $cid = $this->App->findvar( $sql );
            if ( $cid > 0 )
            {
                return false;
                exit;
            }
            else
            {
                $tt = "true";
            }
        }
        //}
        
        if ( $tt == 'true' && !empty( $order_sn ) )
        {
            $pu = $this->App->findrow( "SELECT user_id,daili_uid,parent_uid,parent_uid2,parent_uid3,goods_amount,order_amount,order_sn,pay_status,order_id FROM `{$this->App->prefix()}goods_order_info` WHERE order_sn='$order_sn' LIMIT 1" );
            
            $parent_uid  = isset( $pu['parent_uid'] ) ? $pu['parent_uid'] : 0; //分享者
            $parent_uid2 = isset( $pu['parent_uid2'] ) ? $pu['parent_uid2'] : 0; //分享者
            $parent_uid3 = isset( $pu['parent_uid3'] ) ? $pu['parent_uid3'] : 0; //分享者
            
            $user_id = isset( $pu['user_id'] ) ? $pu['user_id'] : 0; //分享者
            if ( $parent_uid > 0 )
            {
                $sql = "SELECT p1_uid,p2_uid,p3_uid FROM `{$this->App->prefix()}user_tuijian_fx` WHERE uid = '$parent_uid'";
                $rr  = $this->App->findrow( $sql );
                if ( $parent_uid == $user_id )
                {
                    $parent_uid  = isset( $rr['p1_uid'] ) ? $rr['p1_uid'] : 0; //分享者
                    $parent_uid2 = isset( $rr['p2_uid'] ) ? $rr['p2_uid'] : 0; //分享者
                    $parent_uid3 = isset( $rr['p3_uid'] ) ? $rr['p3_uid'] : 0; //分享者
                }
                else
                {
                    $parent_uid2 = isset( $rr['p1_uid'] ) ? $rr['p1_uid'] : 0; //分享者
                    $parent_uid3 = isset( $rr['p2_uid'] ) ? $rr['p2_uid'] : 0; //分享者
                }
            }
            
            $parent_uid4 = $this->return_daili_uid( $parent_uid3 ); //四层上级
            $aParentIds  = array(
                 $parent_uid,
                $parent_uid2,
                $parent_uid3,
                $parent_uid4 
            );
            $sTeamIds    = implode( ',', $aParentIds );
            //获取四人的团队积累和
            $fTeamSum    = $this->App->findvar( "SELECT sum(person_buy_sum) as team_sum FROM `{$this->App->prefix()}user` WHERE user_id in ($sTeamIds) LIMIT 1" );
            //获得第三级的个人积累
            $fPersonSum  = $this->App->findvar( "SELECT person_buy_sum FROM `{$this->App->prefix()}user` WHERE user_id = {$parent_uid3} LIMIT 1" );
            
            $daili_uid  = isset( $pu['daili_uid'] ) ? $pu['daili_uid'] : 0; //代理
            $moeys      = isset( $pu['order_amount'] ) ? $pu['order_amount'] : 0; //实际消费
            $uid        = isset( $pu['user_id'] ) ? $pu['user_id'] : 0;
            $pay_status = isset( $pu['pay_status'] ) ? $pu['pay_status'] : 0;
            
            $order_id = isset( $pu['order_id'] ) ? $pu['order_id'] : 0;
            
            
            $nickname = $this->App->findvar( "SELECT nickname FROM `{$this->App->prefix()}user` WHERE user_id='$uid' LIMIT 1" );
            
            $sql             = "SELECT * FROM `{$this->App->prefix()}userconfig` WHERE type = 'basic' LIMIT 1";
            $rrL             = $this->App->findrow( $sql );
            $openfx_minmoney = empty( $rrL['openfx_minmoney'] ) ? 0 : intval( $rrL['openfx_minmoney'] );
            
            $sql = "SELECT * FROM `{$this->App->prefix()}userconfig` LIMIT 1"; //用户配置信息
            $rts = $this->App->findrow( $sql );
            
            
            //计算资金，便于下面返佣
            //计算每个产品的佣金
            $sql         = "SELECT takemoney1,takemoney2,takemoney3,goods_number FROM `{$this->App->prefix()}goods_order` WHERE order_id='$order_id'";
            $moneys      = $this->App->find( $sql );
            //购物者根据消费金额送积分
            $pointnum    = $rts['pointnum'];
            $pointnum_ag = $rts['pointnum_ag'];
            if ( $pointnum > 0 && !empty( $moeys ) )
            {
                $pointnum_ag = isset( $rts['pointnum_ag'] ) && !empty( $rts['pointnum_ag'] ) ? $rts['pointnum_ag'] : 1;
                $points      = intval( $moeys * $pointnum * $pointnum_ag );
                $thismonth   = date( 'Y-m-d', time() );
                //购买者送积分
                //$sql = "UPDATE `{$this->App->prefix()}user` SET `points_ucount` = `points_ucount`+$points,`mypoints` = `mypoints`+$points WHERE user_id = '$uid'";
                //$this->App->query($sql);
                // $this->App->insert('user_point_change',array('order_sn'=>$order_sn,'thismonth'=>$thismonth,'points'=>$points,'changedesc'=>'消费返积分','time'=>time(),'uid'=>$uid));
            }
            $sql       = "Select userbonus From `{$this->App->prefix()}userconfig` LIMIT 1";
            $userbonus = $this->App->findvar( $sql );
            $record    = array();
            $moeys     = 0;
            
            //一级返佣金
            if ( $parent_uid > 0 && $userbonus == 0 )
            {
                $sql  = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id='$parent_uid' LIMIT 1";
                $rank = $this->App->findvar( $sql );
                if ( $rank != '1' ) //不是普通会员
                {
                    $sql   = "SELECT types FROM `{$this->App->prefix()}user` WHERE user_id='$parent_uid' LIMIT 1";
                    $types = $this->App->findvar( $sql );
                    
                    $off = 0;
                    if ( $rank == '12' ) //普通分销商
                    {
                        $rts['ticheng180_1'] = intval( $rts['ticheng180_1_1'] * $rts['ticheng180_1_2'] / 100 );
                        if ( $rts['ticheng180_1'] < 101 && $rts['ticheng180_1'] > 0 )
                        {
                            $off = $rts['ticheng180_1'] / 100;
                            if ( !empty( $moneys ) )
                                foreach ( $moneys as $row )
                                {
                                    if ( $row['takemoney1'] > 0 )
                                    {
                                        $moeys += $row['takemoney1'] * $row['goods_number'] * $off;
                                    }
                                }
                        }
                    }
                    elseif ( $rank == '11' ) //高级分销商
                    {
                        if ( $rts['ticheng180_h1_1'] < 101 && $rts['ticheng180_h1_1'] > 0 )
                        {
                            $off = $rts['ticheng180_h1_1'] / 100;
                            if ( !empty( $moneys ) )
                                foreach ( $moneys as $row )
                                {
                                    if ( $row['takemoney2'] > 0 )
                                    {
                                        $moeys += $row['takemoney2'] * $row['goods_number'] * $off;
                                    }
                                }
                        }
                    }
                    elseif ( $rank == '10' ) //特权分销商
                    {
                        if ( $rts['ticheng180_h2_1'] < 101 && $rts['ticheng180_h2_1'] > 0 )
                        {
                            $off = $rts['ticheng180_h2_1'] / 100;
                            if ( !empty( $moneys ) )
                                foreach ( $moneys as $row )
                                {
                                    if ( $row['takemoney3'] > 0 )
                                    {
                                        $moeys += $row['takemoney3'] * $row['goods_number'] * $off;
                                    }
                                }
                        }
                    }
                    
                    //}
                    
                    
                    if ( $moeys > 0 )
                        $moeys = $this->format_price( $moeys );
                    if ( !empty( $moeys ) )
                    {
                        $record['puid1_money'] = $moeys;
                        $record['p_uid1']      = $parent_uid;
                        $thismonth             = date( 'Y-m-d', time() );
                        $thism                 = date( 'Y-m', time() );
                        $sql                   = "UPDATE `{$this->App->prefix()}user` SET `money_ucount` = `money_ucount`+$moeys,`mymoney` = `mymoney`+$moeys WHERE user_id = '$parent_uid'";
                        $this->App->query( $sql );
                        $this->App->insert( 'user_money_change', array(
                             'buyuid' => $uid,
                            'order_sn' => $order_sn,
                            'thismonth' => $thismonth,
                            'thism' => $thism,
                            'money' => $moeys,
                            'changedesc' => '购买商品返佣金',
                            'time' => time(),
                            'uid' => $parent_uid 
                        ) );
                    }
                }
                $this->writeLog( __FILE__ . "|1|uid:{$uid}| 1 level | money:" . $moeys . "|ticheng:" . $off . '|rank:' . $rank . '|parent_id:' . $parent_uid );
            }
            
            $moeys = 0;
            //二级返佣金
            if ( $parent_uid2 > 0 && $userbonus == 0 )
            {
                $sql  = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id='$parent_uid2' LIMIT 1";
                $rank = $this->App->findvar( $sql );
                if ( $rank != '1' ) //不是普通会员
                {
                    $sql   = "SELECT types FROM `{$this->App->prefix()}user` WHERE user_id='$parent_uid2' LIMIT 1";
                    $types = $this->App->findvar( $sql );
                    
                    $off = 0;
                    if ( $rank == '12' ) //普通分销商
                    {
                        $rts['ticheng180_2'] = intval( $rts['ticheng180_2_1'] * $rts['ticheng180_2_2'] / 100 );
                        if ( $rts['ticheng180_2'] < 101 && $rts['ticheng180_2'] > 0 )
                        {
                            $off = $rts['ticheng180_2'] / 100;
                            if ( !empty( $moneys ) )
                                foreach ( $moneys as $row )
                                {
                                    if ( $row['takemoney1'] > 0 )
                                    {
                                        $moeys += $row['takemoney1'] * $row['goods_number'] * $off;
                                    }
                                }
                        }
                    }
                    elseif ( $rank == '11' ) //高级分销商
                    {
                        if ( $rts['ticheng180_h1_2'] < 101 && $rts['ticheng180_h1_2'] > 0 )
                        {
                            $off = $rts['ticheng180_h1_2'] / 100;
                            if ( !empty( $moneys ) )
                                foreach ( $moneys as $row )
                                {
                                    if ( $row['takemoney2'] > 0 )
                                    {
                                        $moeys += $row['takemoney2'] * $row['goods_number'] * $off;
                                    }
                                }
                        }
                    }
                    elseif ( $rank == '10' ) //特权分销商
                    {
                        if ( $rts['ticheng180_h2_2'] < 101 && $rts['ticheng180_h2_2'] > 0 )
                        {
                            $off = $rts['ticheng180_h2_2'] / 100;
                            if ( !empty( $moneys ) )
                                foreach ( $moneys as $row )
                                {
                                    if ( $row['takemoney3'] > 0 )
                                    {
                                        $moeys += $row['takemoney3'] * $row['goods_number'] * $off;
                                    }
                                }
                        }
                    }
                    
                    //}
                    if ( $moeys > 0 )
                        $moeys = $this->format_price( $moeys );
                    if ( !empty( $moeys ) )
                    {
                        $record['puid2_money'] = $moeys;
                        $record['p_uid2']      = $parent_uid2;
                        $thismonth             = date( 'Y-m-d', time() );
                        $thism                 = date( 'Y-m', time() );
                        $sql                   = "UPDATE `{$this->App->prefix()}user` SET `money_ucount` = `money_ucount`+$moeys,`mymoney` = `mymoney`+$moeys WHERE user_id = '$parent_uid2'";
                        $this->App->query( $sql );
                        $this->App->insert( 'user_money_change', array(
                             'buyuid' => $uid,
                            'order_sn' => $order_sn,
                            'thismonth' => $thismonth,
                            'thism' => $thism,
                            'money' => $moeys,
                            'changedesc' => '购买商品返佣金',
                            'time' => time(),
                            'uid' => $parent_uid2 
                        ) );
                    }
                }
                $this->writeLog( __FILE__ . "|2|uid:{$uid}| 2 level | money:" . $moeys . "|ticheng:" . $off . '|rank:' . $rank . '|parent_id:' . $parent_uid2 );
            }
            
            $moeys = 0;
            //三级返佣金
            if ( $parent_uid3 > 0 && $userbonus == 0 )
            {
                $sql  = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id='$parent_uid3' LIMIT 1";
                $rank = $this->App->findvar( $sql );
                if ( $rank != '1' ) //不是普通会员
                {
                    $sql   = "SELECT types FROM `{$this->App->prefix()}user` WHERE user_id='$parent_uid3' LIMIT 1";
                    $types = $this->App->findvar( $sql );
                    
                    $off = 0;
                    if ( $rank == '12' ) //普通分销商
                    {
                        if ( floatval( $rts['person_accumulative_money'] ) > 0 && floatval( $fPersonSum ) >= floatval( $rts['person_accumulative_money'] ) )
                        {
                            $rts['ticheng180_3'] = intval( $rts['ticheng180_3_1'] * $rts['ticheng180_3_2'] / 100 );
                            if ( $rts['ticheng180_3'] < 101 && $rts['ticheng180_3'] > 0 )
                            {
                                $off = $rts['ticheng180_3'] / 100;
                                if ( !empty( $moneys ) )
                                    foreach ( $moneys as $row )
                                    {
                                        if ( $row['takemoney1'] > 0 )
                                        {
                                            $moeys += $row['takemoney1'] * $row['goods_number'] * $off;
                                        }
                                    }
                            }
                        }
                    }
                    elseif ( $rank == '11' ) //高级分销商
                    {
                        if ( $rts['ticheng180_h1_3'] < 101 && $rts['ticheng180_h1_3'] > 0 )
                        {
                            $off = $rts['ticheng180_h1_3'] / 100;
                            if ( !empty( $moneys ) )
                                foreach ( $moneys as $row )
                                {
                                    if ( $row['takemoney2'] > 0 )
                                    {
                                        $moeys += $row['takemoney2'] * $row['goods_number'] * $off;
                                    }
                                }
                        }
                    }
                    elseif ( $rank == '10' ) //特权分销商
                    {
                        if ( $rts['ticheng180_h2_3'] < 101 && $rts['ticheng180_h2_3'] > 0 )
                        {
                            $off = $rts['ticheng180_h2_3'] / 100;
                            if ( !empty( $moneys ) )
                                foreach ( $moneys as $row )
                                {
                                    if ( $row['takemoney3'] > 0 )
                                    {
                                        $moeys += $row['takemoney3'] * $row['goods_number'] * $off;
                                    }
                                }
                        }
                    }
                    
                    //}
                    if ( $moeys > 0 )
                        $moeys = $this->format_price( $moeys );
                    if ( !empty( $moeys ) )
                    {
                        $record['puid3_money'] = $moeys;
                        $record['p_uid3']      = $parent_uid3;
                        $thismonth             = date( 'Y-m-d', time() );
                        $thism                 = date( 'Y-m', time() );
                        $sql                   = "UPDATE `{$this->App->prefix()}user` SET `money_ucount` = `money_ucount`+$moeys,`mymoney` = `mymoney`+$moeys WHERE user_id = '$parent_uid3'";
                        $this->App->query( $sql );
                        $this->App->insert( 'user_money_change', array(
                             'buyuid' => $uid,
                            'order_sn' => $order_sn,
                            'thismonth' => $thismonth,
                            'thism' => $thism,
                            'money' => $moeys,
                            'changedesc' => '购买商品返佣金',
                            'time' => time(),
                            'uid' => $parent_uid3 
                        ) );
                    }
                }
                $this->writeLog( __FILE__ . "|2|uid:{$uid}| 3 level | money:" . $moeys . "|ticheng:" . $off . '|rank:' . $rank . '|parent_id:' . $parent_uid3 );
            } //end of if uid3
            
            $moeys = 0;
            //四级返佣金
            if ( $parent_uid4 > 0 && $userbonus == 0 )
            {
                $sql  = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id='$parent_uid4' LIMIT 1";
                $rank = $this->App->findvar( $sql );
                if ( $rank != '1' ) //不是普通会员
                {
                    $sql   = "SELECT types FROM `{$this->App->prefix()}user` WHERE user_id='$parent_uid4' LIMIT 1";
                    $types = $this->App->findvar( $sql );
                    
                    $off = 0;
                    if ( $rank == '12' ) //普通分销商
                    {
                        if ( floatval( $rts['team_accumulative_money'] ) > 0 && floatval( $fTeamSum ) >= floatval( $rts['team_accumulative_money'] ) )
                        {
                            $rts['ticheng180_4'] = intval( $rts['ticheng180_4_1'] * $rts['ticheng180_4_2'] / 100 );
                            if ( $rts['ticheng180_4'] < 101 && $rts['ticheng180_4'] > 0 )
                            {
                                $off = $rts['ticheng180_4'] / 100;
                                if ( !empty( $moneys ) )
                                    foreach ( $moneys as $row )
                                    {
                                        if ( $row['takemoney1'] > 0 )
                                        {
                                            $moeys += $row['takemoney1'] * $row['goods_number'] * $off;
                                        }
                                    }
                            }
                        }
                    }
                    
                    if ( $moeys > 0 )
                        $moeys = $this->format_price( $moeys );
                    if ( !empty( $moeys ) )
                    {
                        $record['puid4_money'] = $moeys;
                        $record['p_uid4']      = $parent_uid4;
                        $thismonth             = date( 'Y-m-d', time() );
                        $thism                 = date( 'Y-m', time() );
                        $sql                   = "UPDATE `{$this->App->prefix()}user` SET `money_ucount` = `money_ucount`+$moeys,`mymoney` = `mymoney`+$moeys WHERE user_id = '$parent_uid4'";
                        $this->App->query( $sql );
                        $this->App->insert( 'user_money_change', array(
                             'buyuid' => $uid,
                            'order_sn' => $order_sn,
                            'thismonth' => $thismonth,
                            'thism' => $thism,
                            'money' => $moeys,
                            'changedesc' => '购买商品返佣金',
                            'time' => time(),
                            'uid' => $parent_uid4 
                        ) );
                    }
                }
                $this->writeLog( __FILE__ . "|2|uid:{$uid}| 4 level | money:" . $moeys . "|ticheng:" . $off . '|rank:' . $rank . '|parent_id:' . $parent_uid4 );
            } //end of if uid4
            
            if ( !empty( $record ) )
            {
                $record['oid']    = $order_id;
                $record['uid']    = $uid;
                $record['date_y'] = date( 'Y', time() );
                $record['date_m'] = date( 'Y-m', time() );
                $record['date_d'] = date( 'Y-m-d', time() );
                $this->App->insert( 'user_money_record', $record );
            }
            
        } //end if
    } //end function
    
    
    // 获取操作状态按钮
    function ajax_get_status_button( $var = 0 )
    {
        if ( strlen( $var ) != 3 )
            return;
        
        $order_status    = substr( $var, 0, 1 );
        $pay_status      = substr( $var, 1, 1 );
        $shipping_status = substr( $var, -1 );
        
        $str = $this->get_order_action_button( $order_status, $pay_status, $shipping_status );
        die( $str );
    }
    
    //ajax 处理订单状态
    function ajax_order_bathop( $ids = 0, $type = "" )
    {
        @set_time_limit( 600 ); //最大运行时间
        
        if ( empty( $ids ) )
        {
            echo "没有找到需要删除的产品！";
            exit;
        }
        if ( empty( $type ) )
        {
            echo "没有指定的操作类型！";
            exit;
        }
        $id_arr = @explode( '+', $ids );
        
        switch ( $type )
        {
            case 'bathdel':
                //批量删除订单
                $now_status = $this->App->findcol( "SELECT order_status FROM `{$this->App->prefix()}goods_order_info` WHERE order_id IN(" . implode( ',', $id_arr ) . ")" );
                if ( !empty( $now_status ) )
                {
                    $afterarr = array();
                    foreach ( $now_status as $k => $status )
                    {
                        if ( in_array( $status, array(
                             '0',
                            '2',
                            '3' 
                        ) ) )
                        {
                            //$str = "部分操作不能完成，例如：确认、退货、刚下的的订单不能操作了！";
                            $afterarr[] = $id_arr[$k];
                        }
                    }
                    if ( !empty( $afterarr ) )
                    {
                        $id_arr_ = array_diff( $id_arr, $afterarr );
                        unset( $id_arr );
                        $id_arr = $id_arr_;
                        unset( $id_arr_ );
                    }
                }
                
                //$sql = "DELETE FROM `{$this->App->prefix()}goods_order_info` WHERE order_id IN(".implode(',',$id_arr).")";
                //$this->App->query($sql);
                if ( !empty( $id_arr ) )
                {
                    $this->App->delete( 'goods_order_info', 'order_id', $id_arr ); //订单表
                    $this->App->delete( 'goods_order', 'order_id', $id_arr ); //订单商品表
                    $this->App->delete( 'goods_order_action', 'order_id', $id_arr ); //订单操作记录表
                    $this->action( 'system', 'add_admin_log', '批量删除商品订单：' . @implode( ',', $id_arr ) );
                }
                else
                {
                    echo "无法进行该操作！";
                    exit;
                }
                break;
            case 'bathconfirm':
                //批量确认订单
                //查询当前的订单状态，如果当前的状态为取消[1]、失效[4]、那么将不能再确认了
                $now_status = $this->App->findcol( "SELECT order_status FROM `{$this->App->prefix()}goods_order_info` WHERE order_id IN(" . implode( ',', $id_arr ) . ")" );
                if ( !empty( $now_status ) )
                {
                    $afterarr = array();
                    foreach ( $now_status as $k => $status )
                    {
                        if ( in_array( $status, array(
                             '1',
                            '4' 
                        ) ) )
                        {
                            //$str = "部分操作不能完成，例如：失效、取消的订单不能操作了！";
                            $afterarr[] = $id_arr[$k];
                        }
                    }
                    if ( !empty( $afterarr ) )
                    {
                        $id_arr_ = array_diff( $id_arr, $afterarr );
                        unset( $id_arr );
                        $id_arr = $id_arr_;
                        unset( $id_arr_ );
                    }
                }
                if ( !empty( $id_arr ) )
                {
                    if ( $this->App->update( 'goods_order_info', array(
                         'order_status' => '2' 
                    ), 'order_id', $id_arr ) )
                    {
                        $sql    = "SELECT tb1.user_id,tb1.order_sn,tb1.order_id,tb2.user_name,tb2.email FROM `{$this->App->prefix()}goods_order_info` AS tb1 LEFT JOIN `{$this->App->prefix()}user` AS tb2 ON tb1.user_id=tb2.user_id WHERE tb1.order_id IN(" . implode( ',', $id_arr ) . ")";
                        $emails = $this->App->find( $sql );
                        if ( !empty( $emails ) )
                            foreach ( $emails as $row )
                            {
                                //确认后，发送mail
                                $datas = array();
                                if ( !empty( $row['email'] ) && $GLOBALS['LANG']['email_open_config']['confirm_order'] == '1' )
                                {
                                    $datas['user_name']    = $row['user_name'];
                                    $datas['uid']          = $row['user_id'];
                                    $datas['order_sn']     = $row['order_sn'];
                                    $datas['email']        = $row['email'];
                                    $datas['orderinfourl'] = SITE_URL . 'user.php?act=orderinfo&order_id=' . $row['order_id'];
                                    $this->action( 'email', 'send_confirm_order', $datas );
                                    unset( $datas );
                                }
                            }
                        
                    }
                    $this->action( 'system', 'add_admin_log', '批量确认订单：' . @implode( ',', $id_arr ) );
                }
                else
                {
                    echo "无法进行该操作！";
                    exit;
                }
                break;
            case 'bathcancel':
                //批量取消订单
                //查询当前的订单状态，如果当前的状态为确认[2]、退货[3]、那么将不能再取消了了
                $now_status = $this->App->findcol( "SELECT order_status FROM `{$this->App->prefix()}goods_order_info` WHERE order_id IN(" . implode( ',', $id_arr ) . ")" );
                $str        = "";
                if ( !empty( $now_status ) )
                {
                    $afterarr = array();
                    foreach ( $now_status as $k => $status )
                    {
                        if ( in_array( $status, array(
                             '2',
                            '3' 
                        ) ) )
                        {
                            $afterarr[] = $id_arr[$k];
                        }
                    }
                    if ( !empty( $afterarr ) )
                    {
                        $id_arr_ = array_diff( $id_arr, $afterarr );
                        unset( $id_arr );
                        $id_arr = $id_arr_;
                        unset( $id_arr_ );
                    }
                }
                if ( !empty( $id_arr ) )
                {
                    $this->App->update( 'goods_order_info', array(
                         'order_status' => '1' 
                    ), 'order_id', $id_arr );
                    
                    $sql    = "SELECT tb1.user_id,tb1.order_sn,tb1.order_id,tb2.user_name,tb2.email FROM `{$this->App->prefix()}goods_order_info` AS tb1 LEFT JOIN `{$this->App->prefix()}user` AS tb2 ON tb1.user_id=tb2.user_id WHERE tb1.order_id IN(" . implode( ',', $id_arr ) . ")";
                    $emails = $this->App->find( $sql );
                    if ( !empty( $emails ) )
                        foreach ( $emails as $row )
                        {
                            //订单取消后，发送mail
                            $datas = array();
                            if ( !empty( $row['email'] ) && $GLOBALS['LANG']['email_open_config']['cancel_order'] == '1' )
                            {
                                $datas['user_name']    = $row['user_name'];
                                $datas['uid']          = $row['user_id'];
                                $datas['order_sn']     = $row['order_sn'];
                                $datas['email']        = $row['email'];
                                $datas['orderinfourl'] = SITE_URL . 'user.php?act=orderinfo&order_id=' . $row['order_id'];
                                $this->action( 'email', 'send_cancel_order', $datas );
                                unset( $datas );
                            }
                        }
                    
                    $this->action( 'system', 'add_admin_log', '批量取消订单：' . @implode( ',', $id_arr ) );
                }
                else
                {
                    echo "无法进行该操作！";
                    exit;
                }
                break;
            case 'bathinvalid':
                //批量失效订单
                //查询当前的订单状态，如果当前的状态为确认[2]、退货[3]、那么将不能再失效了
                $now_status = $this->App->findcol( "SELECT order_status FROM `{$this->App->prefix()}goods_order_info` WHERE order_id IN(" . implode( ',', $id_arr ) . ")" );
                $str        = "";
                if ( !empty( $now_status ) )
                {
                    $afterarr = array();
                    foreach ( $now_status as $k => $status )
                    {
                        if ( in_array( $status, array(
                             '2',
                            '3' 
                        ) ) )
                        {
                            //$str = "部分操作不能完成，例如：确认、退货的订单不能操作了！";
                            $afterarr[] = $id_arr[$k];
                        }
                    }
                    if ( !empty( $afterarr ) )
                    {
                        $id_arr_ = array_diff( $id_arr, $afterarr );
                        unset( $id_arr );
                        $id_arr = $id_arr_;
                        unset( $id_arr_ );
                    }
                }
                if ( !empty( $id_arr ) )
                {
                    $this->App->update( 'goods_order_info', array(
                         'order_status' => '4' 
                    ), 'order_id', $id_arr );
                    
                    $sql    = "SELECT tb1.user_id,tb1.order_sn,tb1.order_id,tb2.user_name,tb2.email FROM `{$this->App->prefix()}goods_order_info` AS tb1 LEFT JOIN `{$this->App->prefix()}user` AS tb2 ON tb1.user_id=tb2.user_id WHERE tb1.order_id IN(" . implode( ',', $id_arr ) . ")";
                    $emails = $this->App->find( $sql );
                    if ( !empty( $emails ) )
                        foreach ( $emails as $row )
                        {
                            //订单取消后，发送mail
                            $datas = array();
                            if ( !empty( $row['email'] ) && $GLOBALS['LANG']['email_open_config']['orders_invalid'] == '1' )
                            {
                                $datas['user_name']    = $row['user_name'];
                                $datas['uid']          = $row['user_id'];
                                $datas['order_sn']     = $row['order_sn'];
                                $datas['email']        = $row['email'];
                                $datas['orderinfourl'] = SITE_URL . 'user.php?act=orderinfo&order_id=' . $row['order_id'];
                                $this->action( 'email', 'send_invalid_order', $datas );
                                unset( $datas );
                            }
                        }
                    
                    $this->action( 'system', 'add_admin_log', '批量失效订单：' . @implode( ',', $id_arr ) );
                }
                else
                {
                    echo "无法进行该操作！";
                    exit;
                }
                break;
                
        }
        
    }
    
    public function return_daili_uid( $uid = 0, $k = 0 )
    {
        if ( !( $uid > 0 ) )
        {
            return 0;
        }
        $puid = 0;
        //for($i=0;$i<20;$i++){
        if ( $k < 20 )
        {
            $sql  = "SELECT parent_uid FROM `{$this->App->prefix()}user_tuijian` WHERE uid = '$uid' LIMIT 1";
            $puid = $this->App->findvar( $sql );
            $sql  = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id = '$puid' LIMIT 1";
            $rank = $this->App->findvar( $sql );
            if ( $rank == '1' )
            {
                ++$k;
                $this->return_daili_uid( $puid, $k );
            }
            else
            {
                return $puid;
            }
        }
        //}
        return $puid;
    }
    
    //支付方式
    function paymentlist()
    {
        //删除
        $id = isset( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;
        if ( $id > 0 )
        {
            $this->App->delete( 'payment', 'pay_id', $id );
        }
        
        $rt = $this->App->find( "SELECT * FROM `{$this->App->prefix()}payment`" );
        $this->set( 'rt', $rt );
        $this->template( 'paymentlist' );
    }
    
    function paymentinfo( $id = 0 )
    {
        $data = array();
        if ( !empty( $_POST ) )
        {
            $data['pay_name']   = $_POST['pay_name'];
            $data['pay_desc']   = $_POST['pay_desc'];
            $data['pay_fee']    = $_POST['pay_fee'];
            $data['pay_config'] = serialize( array(
                 'pay_no' => ( isset( $_POST['pay_no'] ) ? $_POST['pay_no'] : "" ),
                'pay_code' => ( isset( $_POST['pay_code'] ) ? $_POST['pay_code'] : "" ),
                'pay_idt' => ( isset( $_POST['pay_idt'] ) ? $_POST['pay_idt'] : "" ) 
            ) );
            
        }
        if ( $id > 0 )
        {
            if ( isset( $data ) && !empty( $data ) )
            {
                
                if ( $this->App->update( 'payment', $data, 'pay_id', $id ) )
                {
                    $this->action( 'system', 'add_admin_log', '更新支付方式：' . $data['pay_name'] );
                    $this->action( 'common', 'showdiv', $this->getthisurl() );
                }
                else
                {
                    $this->jump( 'payment.php?type=info&id=' . $id, 0, '更新失败！' );
                    exit;
                }
            }
            $rt             = $this->App->findrow( "SELECT * FROM `{$this->App->prefix()}payment` WHERE pay_id='$id' LIMIT 1" );
            $pay_config     = unserialize( $rt['pay_config'] );
            $rt['pay_no']   = $pay_config['pay_no'];
            $rt['pay_code'] = $pay_config['pay_code'];
            $rt['pay_idt']  = $pay_config['pay_idt'];
            $type           = 'edit';
        }
        else
        {
            if ( !empty( $data ) )
            {
                
                if ( $this->App->insert( 'payment', $data ) )
                {
                    $this->action( 'system', 'add_admin_log', '添加支付方式：' . $data['pay_name'] );
                    $this->action( 'common', 'showdiv', $this->getthisurl() );
                }
                else
                {
                    $this->jump( 'payment.php?type=info', 0, '添加失败！' );
                    exit;
                }
            }
            $type = 'add';
        }
        $this->set( 'type', $type );
        $this->set( 'rt', $rt );
        if ( $id == '4' )
        {
            $this->template( 'paymentinfowx' );
        }
        else
        {
            $this->template( 'paymentinfo' );
        }
    }
    
    function ajax_pay_activeop( $data = array() )
    {
        if ( empty( $data['id'] ) )
            die( "非法操作，ID为空！" );
        $type             = $data['type'];
        $sdata            = array();
        $sdata['enabled'] = $data['active'];
        $this->App->update( 'payment', $sdata, 'pay_id', $data['id'] );
        unset( $data, $sdata );
    }
    
    //配送方式方式
    function deliverylist()
    {
        //删除
        $id = isset( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;
        if ( $id > 0 )
        {
            $this->App->delete( 'shipping', 'shipping_id', $id );
        }
        
        $rt = $this->App->find( "SELECT * FROM `{$this->App->prefix()}shipping`" );
        $this->set( 'rt', $rt );
        $this->template( 'deliverylist' );
    }
    
    //配送方式信息
    function deliveryinfo( $id = 0 )
    {
        if ( $id > 0 )
        {
            $rt = $this->App->findrow( "SELECT * FROM `{$this->App->prefix()}shipping` WHERE shipping_id='$id' LIMIT 1" );
            if ( isset( $_POST ) && !empty( $_POST ) )
            {
                if ( $this->App->update( 'shipping', $_POST, 'shipping_id', $id ) )
                {
                    $this->jump( 'delivery.php?type=info&id=' . $id, 0, '更新成功！' );
                    exit;
                }
                else
                {
                    $this->jump( 'delivery.php?type=info&id=' . $id, 0, '更新失败！' );
                    exit;
                }
            }
            $type = 'edit';
        }
        else
        {
            if ( isset( $_POST ) && !empty( $_POST ) )
            {
                if ( $this->App->insert( 'shipping', $_POST ) )
                {
                    $this->jump( 'delivery.php?type=info', 0, '添加成功！' );
                    exit;
                }
                else
                {
                    $this->jump( 'delivery.php?type=info', 0, '添加失败！' );
                    exit;
                }
            }
            $type = 'add';
        }
        $this->set( 'type', $type );
        $this->set( 'rt', $rt );
        $this->template( 'deliveryinfo' );
    }
    
    //配送区域列表
    function delivery_area_list( $id = 0 )
    {
        if ( !empty( $_GET['delid'] ) && intval( $_GET['delid'] ) > 0 )
        {
            $this->App->delete( 'shipping_area', 'shipping_area_id', intval( $_GET['delid'] ) );
        }
        $rt = array();
        if ( $id > 0 )
        {
            $sql = "SELECT * FROM `{$this->App->prefix()}shipping_area` WHERE shipping_id='$id'";
            $rs  = $this->App->find( $sql );
            if ( !empty( $rs ) )
            {
                foreach ( $rs as $row )
                {
                    $areaid = !empty( $row['configure'] ) ? json_decode( $row['configure'] ) : array();
                    if ( !empty( $areaid ) )
                    {
                        $row['configure'] = $this->App->findcol( "SELECT region_name FROM `{$this->App->prefix()}region` WHERE region_id IN (" . @implode( ',', $areaid ) . ") ORDER BY region_id ASC" );
                    }
                    $rt[] = $row;
                }
                unset( $rs );
            }
        }
        
        $this->set( 'rt', $rt );
        $this->template( 'delivery_area_list' );
    }
    
    /***************  look添加 开始    *************************************************************************/
    //产品总销量
    function product_order_list()
    {
        //排序
        $orderby = "";
        if ( isset( $_GET['desc'] ) )
        {
            $orderby = ' ORDER BY ' . $_GET['desc'] . ' DESC';
        }
        else if ( isset( $_GET['asc'] ) )
        {
            $orderby = ' ORDER BY ' . $_GET['asc'] . ' ASC';
        }
        else
        {
            $orderby = ' ORDER BY `order_id` DESC';
        }
        //分页
        $page = isset( $_GET['page'] ) ? $_GET['page'] : '';
        if ( empty( $page ) )
        {
            $page = 1;
        }
        
        //条件
        /*  $sql = "SELECT distinct tb1.user_name,tb1.user_id,tb1.nickname FROM `{$this->App->prefix()}user` AS tb1 LEFT JOIN `{$this->App->prefix()}goods` AS tb2 ON tb1.user_id=tb2.uid WHERE tb1.user_rank='10' ORDER BY tb1.user_id";*/
        // 查询供应商
        $sql = "SELECT distinct tb1.user_name,tb1.user_id,tb1.nickname FROM `{$this->App->prefix()}user` AS tb1  WHERE tb1.user_rank='10' ORDER BY tb1.user_id";
        $this->set( 'uidlist', $this->App->find( $sql ) );
        
        
        //查询配送店
        $sql = "SELECT distinct tb1.user_name,tb1.user_id,tb1.nickname FROM `{$this->App->prefix()}user` As tb1 WHERE tb1.user_rank = '12' ORDER BY tb1.user_id ";
        $this->set( 'pslist', $this->App->find( $sql ) );
        
        
        
        
        $comd = array();
        /*if(isset($_GET['status'])&&!empty($_GET['status'])){
        $st = $this->select_statue($_GET['status']);
        !empty($st)? $comd[] = $st : "";
        }*/
        
        if ( isset( $_GET['status'] ) && !empty( $_GET['status'] ) )
        {
            $st = $this->select_statue( $_GET['status'] );
            !empty( $st ) ? $comd[] = $st : "";
        }
        
        /***********  look添加 日期查询 开始  ********************************/
        if ( isset( $_GET['add_time1'] ) && !empty( $_GET['add_time1'] ) && empty( $_GET['add_time2'] ) )
        {
            $t      = strtotime( $_GET['add_time1'] ) + 24 * 60 * 60;
            $comd[] = "add_time >= " . strtotime( $_GET['add_time1'] ) . "&&add_time < " . $t;
        }
        if ( isset( $_GET['add_time2'] ) && !empty( $_GET['add_time2'] ) && empty( $_GET['add_time1'] ) )
        {
            $comd[] = "add_time <= " . strtotime( $_GET['add_time2'] );
        }
        if ( isset( $_GET['add_time1'] ) && !empty( $_GET['add_time1'] ) && isset( $_GET['add_time2'] ) && !empty( $_GET['add_time2'] ) )
        {
            $t      = strtotime( $_GET['add_time2'] ) + 24 * 60 * 60;
            $comd[] = "add_time >= " . strtotime( $_GET['add_time1'] ) . "&&add_time < " . $t;
        }
        
        /***********  look添加 日期查询 结束  ********************************/
        
        
        
        if ( isset( $_GET['order_sn'] ) && !empty( $_GET['order_sn'] ) )
            $comd[] = "order_sn LIKE '%" . trim( $_GET['order_sn'] ) . "%'";
        if ( isset( $_GET['consignee'] ) && !empty( $_GET['consignee'] ) )
            $comd[] = "consignee LIKE '%" . trim( $_GET['consignee'] ) . "%'";
        if ( isset( $_GET['psid'] ) && !empty( $_GET['psid'] ) && $_GET['psid'] == '-1' )
        {
            $comd[] = " shipping_id = '4' ";
        }
        if ( isset( $_GET['psid'] ) && !empty( $_GET['psid'] ) && $_GET['psid'] != '-1' )
        {
            $comd[] = " shop_id = $_GET[psid] ";
        }
        
        $w = "";
        if ( !empty( $comd ) )
        {
            $w = ' WHERE ' . @implode( ' AND ', $comd );
        }
        
        //  print_r ($w);
        //  exit;
        //  print_r ($comd);
        
        //  exit;
        
        $list     = 12;
        $start    = ( $page - 1 ) * $list;
        $sql      = "SELECT COUNT(order_id) FROM `{$this->App->prefix()}goods_order_info` $w";
        $tt       = $this->App->findvar( $sql );
        $pagelink = Import::basic()->getpage( $tt, $list, $page, '?page=', true );
        $this->set( "pagelink", $pagelink );
        /*  $sql = "SELECT order_id, order_sn, user_id, order_status, shipping_status, pay_status, consignee, add_time, SUM( goods_amount + shipping_fee ) AS tprice FROM `{$this->App->prefix()}goods_order_info` $w GROUP BY order_id $orderby LIMIT $start,$list";
        
        $sql = "SELECT tb1.*,tb2.goods_thumb,tb2.goods_number AS storage,tb2.goods_id, IFNULL(tb3.brand_name, '') AS brand_name FROM `{$this->App->prefix()}goods_order` AS tb1";
        $sql .= " LEFT JOIN `{$this->App->prefix()}goods` AS tb2 ON tb1.goods_id = tb2.goods_id";
        $sql .= " LEFT JOIN `{$this->App->prefix()}brand` AS tb3 ON tb2.brand_id = tb3.brand_id";
        $sql .= " WHERE tb1.order_id = '$id'";
        */
        $sql = "SELECT order_id  FROM `{$this->App->prefix()}goods_order_info` $w GROUP BY order_id $orderby "; //取得订单表id
        
        /*************************  能获取到供应商商品的订单  ****************************************
        
        $sql = "SELECT tb1.order_id , tb2.goods_id ,tb3.uid ,tb4.user_name  FROM `{$this->App->prefix()}goods_order_info` AS tb1"; 
        $sql .= " LEFT JOIN `{$this->App->prefix()}goods_order` AS tb2 ON tb1.order_id = tb2.order_id";
        $sql .= " LEFT JOIN `{$this->App->prefix()}goods` AS tb3 ON tb2.goods_id = tb3.goods_id";
        $sql .= " LEFT JOIN `{$this->App->prefix()}user` AS tb4 ON tb3.uid = tb4.user_id";
        $sql .= " $w GROUP BY tb1.order_id $orderby";
        
        ************************************************************************************************/
        
        $rt = $this->App->find( $sql );
        
        
        //开始截取订单表id的值  用    ‘，’分开；
        //  echo mysql_error();
        //  exit;
        
        //  print_r($rt);
        //  exit;
        
        //  $sql = "SELECT user_name FROM `{$this->App->prefix()}user` WHERE user_id = $_GET[psid] ";
        //  $rs = $this->App->find($sql);
        //  echo $_GET['order_sn'];
        
        //  echo $_GET['psid'];
        //  exit;
        //  print_r($rs);
        
        $str = '';
        foreach ( $rt as $value )
        {
            $str .= $value['order_id'] . ',';
        }
        $goods_id = rtrim( $str, ',' );
        
        /*  $user_id = ' ' ;
        foreach($comd as $value){
        $user_id .= $value['tb3.uid'].',';
        }
        print_r ($user_id);*/
        
        
        
        if ( isset( $_GET['uid'] ) && intval( $_GET['uid'] ) > 0 )
            $user_id = 'and tb3.user_id =' . intval( $_GET['uid'] ) . ' '; // 组装 多个where条件 
        //  print_r ($user_id);
        
        //开始查询 订购各个商品的总数    
        $sql = "SELECT tb1.goods_bianhao,tb1.goods_name, tb1.goods_id,sum(tb1.goods_number) as numb,tb2.uid,tb2.market_price , tb2.pifa_price , tb3.user_name,tb3.user_id  FROM `{$this->App->prefix()}goods_order` AS tb1";
        $sql .= " LEFT JOIN `{$this->App->prefix()}goods` AS tb2 ON tb2.goods_id = tb1.goods_id";
        $sql .= " LEFT JOIN `{$this->App->prefix()}user` AS tb3 ON tb3.user_id = tb2.uid";
        
        $sql .= " WHERE order_id in ($goods_id) $user_id GROUP BY goods_id order by tb2.uid LIMIT $start,$list";
        $rt        = $this->App->find( $sql );
        //  echo mysql_error ();
        $orderlist = array();
        if ( !empty( $rt ) )
        {
            foreach ( $rt as $row )
            {
                //  if(empty($row['order_id'])||empty($row['order_sn'])) continue;
                $orderlist[] = array(
                     'goods_bianhao' => $row['goods_bianhao'],
                    'goods_name' => $row['goods_name'],
                    'numb' => $row['numb'],
                    'uid' => $row['uid'],
                    'user_id' => $row['user_id'],
                    'user_name' => $row['user_name'],
                    'market_price' => $row['market_price'],
                    'pifa_price' => $row['pifa_price'],
                    'goods_id' => $row['goods_id'] 
                    /*
                    'order_id'=>$row['order_id'],
                    'order_sn'=>$row['order_sn'],
                    'user_id'=>$row['user_id'],
                    'consignee'=>$row['consignee'],
                    'tprice'=>$row['tprice'],
                    'order_status'=>$row['order_status'],
                    'shipping_status'=>$row['shipping_status'],
                    'pay_status'=>$row['pay_status'],
                    'add_time'=>(!empty($row['add_time'])? date('Y-m-d H：i:s',$row['add_time']) : '无知'),
                    'status'=>$this->get_status($row['order_status'],$row['pay_status'],$row['shipping_status'])*/
                );
            }
        }
        
        $this->set( 'orderlist', $orderlist );
        
        
        //选择模板
        $ty = isset( $_GET['tt'] ) && !empty( $_GET['tt'] ) ? trim( $_GET['tt'] ) : "";
        switch ( $ty )
        {
            case 'delivery': //发货单列表
                $this->template( 'goods_order_delivery_list' );
                break;
            case 'back': //退货单列表
                $this->template( 'goods_order_back_list' );
                break;
            default:
                $this->template( 'product_order_list' );
                break;
        }
        
    }
    
    /***************  look添加 结束    *************************************************************************/
    
    //配送区域信息
    function delivery_area_info( $cid = 0, $id = 0 )
    {
        if ( $id > 0 )
        {
            if ( !empty( $_POST['regions'] ) )
            {
                $data['shipping_id']        = $cid;
                $data['shipping_area_name'] = $_POST['shipping_area_name'];
                $data['shipping_desc']      = $_POST['shipping_desc'];
                $data['item_fee']           = $_POST['item_fee'];
                $data['step_item_fee']      = $_POST['step_item_fee'];
                $data['weight_fee']         = $_POST['weight_fee'];
                $data['step_weight_fee']    = $_POST['step_weight_fee'];
                $data['max_money']          = $_POST['max_money'];
                $data['configure']          = json_encode( $_POST['regions'] );
                $data['type']               = $_POST['fee_compute_mode'];
                if ( $this->App->update( 'shipping_area', $data, 'shipping_area_id', $id ) )
                {
                    $this->jump( '', 0, '修改成功！' );
                    exit;
                }
                else
                {
                    $this->jump( '', 0, '修改失败！' );
                    exit;
                }
            } //end if
            $type = 'edit';
            $rt   = $this->App->findrow( "SELECT * FROM `{$this->App->prefix()}shipping_area` WHERE shipping_area_id='$id'" );
            if ( empty( $rt ) )
            {
                $this->jump( 'delivery.php?type=arealist&id=' . $cid );
            }
            $areaid = !empty( $rt['configure'] ) ? json_decode( $rt['configure'] ) : array();
            if ( !empty( $areaid ) )
            {
                $rt['configure'] = $this->App->find( "SELECT * FROM `{$this->App->prefix()}region` WHERE region_id IN (" . implode( ',', $areaid ) . ") ORDER BY region_id ASC" );
                
            }
            
        }
        else
        {
            if ( !empty( $_POST ) )
            {
                if ( !empty( $_POST['shipping_area_name'] ) )
                {
                    if ( !empty( $_POST['regions'] ) )
                    {
                        $data['shipping_id']        = $cid;
                        $data['shipping_area_name'] = $_POST['shipping_area_name'];
                        $data['shipping_desc']      = $_POST['shipping_desc'];
                        $data['item_fee']           = $_POST['item_fee'];
                        $data['step_item_fee']      = $_POST['step_item_fee'];
                        $data['weight_fee']         = $_POST['weight_fee'];
                        $data['step_weight_fee']    = $_POST['step_weight_fee'];
                        $data['max_money']          = $_POST['max_money'];
                        $data['configure']          = json_encode( $_POST['regions'] );
                        $data['type']               = $_POST['fee_compute_mode'];
                        if ( $this->App->insert( 'shipping_area', $data ) )
                        {
                            $this->jump( '', 0, '添加成功！' );
                            exit;
                        }
                    } //end if
                    
                }
                else
                {
                    echo '<script> alert("配送方式不能为空！");</script>';
                }
            }
            $type = 'add';
        }
        $this->set( 'type', $type );
        $this->set( 'rt', $rt );
        $this->template( 'delivery_area_info' );
    }
    
    
    //导入订单数据
    
    function order_import()
    {
        header( "Content-Type:text/html;charset=utf-8" );
        header( "Content-type:application/vnd.ms-excel" );
        header( "Cache-Control: no-cache" );
        header( "Pragma: no-cache" );
        header( "Content-Disposition:filename=facebook_" . date( 'Y-m-d', time() ) . ".xls" );
        
        
        if ( !empty( $rt ) )
        {
            $data = array();
            $str1 = '<table border="1" cellspacing="0" cellpadding="0">';
            $str1 .= '<tr><td>&nbsp;</td><th colspan="3" style="background:#ccc; border:1px solod #000; height:40px;font-size:20px">Facebook Data</th></tr>';
            $data[] = '<tr><td>&nbsp;</td><th width="120">Date</th><th width="100">Total Pages</th><th width="100">Total Fans</th></tr>';
            foreach ( $rt as $k => $row )
            {
                $data[] = '<tr><td>&nbsp;</td><td width="120">' . $row["date"] . '</td><td width="100">' . $row["total_role"] . '</td><td width="100">' . $row["totalfans"] . '</td></tr>';
            } //end foreach
            $str1 .= implode( ' ', $data );
            $str1 .= '</table>';
        } // end if 
    }
    
    // 订单自动确认
    function order_takeover()
    {
        $count = 0;
        $sql   = "Select * from `{$this->App->prefix()}userconfig` limit 1";
        $rts   = $this->App->findrow( $sql );
        if ( $rts and $rts['takeover'] and $rts['takeover'] > 0 ) // 开启自动确认
        {
            $limittime = time() - $rts['takeover'] * 24 * 60 * 60;
            $sql       = "Select t1.order_id from `{$this->App->prefix()}goods_order_info` as t1 Left Join  `{$this->App->prefix()}shipping_sn` as t2 on t1.sn_id = t2.shipping_sn  where  t1.shipping_status = '2' and t1.pay_status= '1' and t1.order_status = '2' and t2.addtime >= '$limittime'";
            //return $sql;
            $rr        = $this->App->find( $sql );
            foreach ( $rr as $e )
            {
                
                $data = array(
                     'opid' => $e['order_id'],
                    'opstatus' => 215 
                );
                // 发送确认状态
                $count++;
                $this->ajax_op_status( $data );
                
            }
            
            
            
        }
        return array(
             'status' => $rts['takeover'],
            'count' => $count 
        );
    }
    
    /**
     * 省 市 区 
     * @param  [type]     $areaid [Array]
     * @return [type]             [String]
     */
    private function get_area_name( $areaid )
    {
        $sql = "SELECT region_name FROM `{$this->App->prefix()}region` WHERE region_id IN (" . implode( ',', $areaid ) . ")";
        $result    = $this->App->find( $sql );
        $area_name = '';
        foreach ( (array) $result as $k => $v )
        {
            $area_name .= $v['region_name'] . ' ';
        }
        return $area_name;
    }
    
    public function writeLog( $message )
    {
        $message = 'time: ' . date( 'Y-m-d H:i:s' ) . '|' . $message;
        file_put_contents( SYS_PATH . 'huahai.log_' . date( 'Y-m-d' ), $message . PHP_EOL, FILE_APPEND );
    }
    
}