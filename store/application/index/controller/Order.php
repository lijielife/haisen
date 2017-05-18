<?php 
namespace app\index\controller;

use think\Controller;
use think\DB;
class order extends StoreBase
{
    /**
     * 订单列表
     * @author Haibin 
     * @date   2016-12-30
     * @param  [param]
     * @return [type]     [description]
     */
    public function order_list(){
        // var_dump( $_REQUEST );die;
        $start_time = input( 'get.start_time', '', 'trim' );
        $end_time = input( 'get.end_time', '', 'trim' );
        $order_statuss = input( 'get.order_statuss', '', 'trim' );
        $condition = array();
        // 搜索词
        $q = input('q');
        if ( ! empty( $q ) ) {
            $condition['order_sn'] = ['like','%'. $q .'%'];
        }
        $condition['store_id'] = session( 'store_info.store_id' );
        if ( $start_time ) {
            $start = strtotime( $start_time . '0:0:0' );
        }
        if ( $end_time ) {
            $end = strtotime( $end_time . '23:59:59' );
        }
        if ( isset( $start ) && isset( $end ) && $start > $end ) {
            $this->error( '开始时间不能大于结束时间' );
        }
        if ( $start_time && !$end_time ) {
            $condition['add_time'] = array( 'egt', $start );
        }
         if ( !$start_time && $end_time ) {
            $condition['add_time'] = array( 'elt', $end );
        }
        if ( $start_time && $end_time ) {
            $condition['add_time'] = array('between', array( $start, $end ));
        }
        if( $order_statuss == 1 ){//未付款
            $condition['pay_status']      = array( 'eq', '0' );
            $condition['shipping_status'] = array( 'eq', '0' );
        }
        if( $order_statuss == 2 ){//未发货
            $condition['pay_status']      = array( 'eq', '1' );
            $condition['shipping_status'] = array( 'eq', '0' );
        }
        if( $order_statuss == 3 ){//已发货
            $condition['pay_status']      = array( 'eq', '1' );
            $condition['shipping_status'] = array( 'eq', '2' );
        }
        $order_model           = model( 'GoodsOrderInfo' );
        $goods_order_model     = model( 'GoodsOrder' );
        $order_res             = $order_model->get_list( $condition );
        $page       = $order_res->render();
        $order_list = $order_res->all();

        foreach ( $order_list as $k => $order_info )
        {
            $goods_name = $goods_order_model->get_one( array( 'order_id' => $order_info['order_id'] ), 'goods_name' );
            $order_list[$k]['goods_name'] = $goods_name;
        }

        $data['order_list']    = $order_list;
        $data['page']          = $page;
        $data['start_time']    = $start_time;
        $data['end_time']      = $end_time;
        $data['order_statuss'] = $order_statuss?:0;
        $data['order_sn']      = $q;
        return view( 'order_list', $data );
    }
    /**
     * 批量删除订单
     * @author Haibin 
     * @date   2016-12-31
     * @param  [param]
     */
    public function del_order(){
        $status                = input('status');
        $flag                  = input('flag');
        $goodsids              = input('ids/a');
        $condition['order_id'] = array( 'in', implode(',', $goodsids) );
        $order_model           = model( 'GoodsOrderInfo' );
        if ($status == 'delete') {
            // 清空Goods表
            $goodsResult = $order_model->del_goods( $condition );
        }
        if ($goodsResult) {
            if ( $flag == 1 ) {
                $this->success( '操作成功' );
            }else{
                $data['code'] = 1;
                $data['msg']  = '操作成功';
                return $data;
            }
            
        } else {
            if ( $flag == 1 ) {
                $this->error( '操作失败' );
            }else{
                $data['code'] = 0;
                $data['msg']  = '操作失败';
                return $data;
            }
        }
    }
    /**
     * 编辑订单
     * @author Haibin 
     * @date   2016-12-31
     * @param  [param]
     * @return [type]     [description]
     */
    public function edit_order()
    {
        $goodsids                = input('ids/a');
        $order_model             = model( 'GoodsOrderInfo' );
        $goods_order_model       = model( 'GoodsOrder' );
        $region_model            = model( 'Region' );
        /* 物流Model */
        $shipping_name_model     = model( 'ShippingName' );

        $condition['order_id']   = $goodsids[0];
        $order_info              = $order_model->get_info( $condition );
        $order_info['province'] =  $region_model->get_one( array( 'region_id' => $order_info['province'] ), 'region_name' );
        $order_info['city'] =  $region_model->get_one( array( 'region_id' => $order_info['city'] ), 'region_name' );
        $order_info['district'] =  $region_model->get_one( array( 'region_id' => $order_info['district'] ), 'region_name' );
        
        $con['order_id']         = $goodsids[0];
        $order_list_info         = $goods_order_model->get_list( $con );
        $data['order_info']      = $order_info;
        $data['order_list_info'] = $order_list_info;
        $data['shipping'] = $shipping_name_model->get_list();

        return view( 'order_info', $data );
    }

    /**
     * 设置发货
     * @author Haibin 
     * @date   2016-12-31
     * @param  [param]
     * @return [type]     [description]
     */
    public function up_info()
    {
        /* 订单Model */
        $order_model             = model( 'GoodsOrderInfo' );
        /* 物流Model */
        $shipping_model          = model( 'ShippingSn' );

        /* 订单ID */
        $order_id    = input( 'post.order_id' );
        /* 物流公司ID */
        $shipping_id = input( 'post.shipping_id' );
        /* 运单号 */
        $shipping_sn = input( 'post.shipping_sn' );

        $order_con['order_id'] = $order_id;
        $old_sn = $order_model->get_one( $order_con, 'sn_id' );
        if ( $old_sn && $old_sn != $shipping_sn )
        {
            $data = array();
            $data['addtime'] = '0';
            $data['usetime'] = '0';
            $data['is_use']  = '0';
            $shipping_con = array();
            $shipping_con['shipping_sn'] = $old_sn;
            $shipping_model->up_info( $shipping_con, $data );
        }

        $shipping_con = array();
        $shipping_con['shipping_sn'] = $shipping_sn;
        $id = $shipping_model->get_one( $shipping_con, 'id' );
        if ( $id > 0 )
        {
            $data = array();
            $data['shipping_id'] = $shipping_id;
            $data['usetime']     = time();
            $data['is_use']      = '1';
            $shipping_model->up_info( $shipping_con, $data );
        }
        else
        {
            $data = array();
            $data['shipping_sn'] = $shipping_sn;
            $data['shipping_id'] = $shipping_id;
            $data['usetime']     = time();
            $data['addtime']     = time();
            $data['is_use']      = '1';
            $shipping_model->add( $data );
        }

        $condition = array();
        $condition['order_id']   = $order_id;
        $data = array();
        $data['shipping_status']  = '2'; // 已发货
        $data['sn_id']            = $shipping_sn;
        $data['shipping_id_true'] = $shipping_id;
        $order_upt = $order_model->up_goods( $condition, $data );
        if ( $order_upt !== false )
        {
            $this->success( '操作成功', url( 'Order/order_list' ) );
        }
        else
        {
            $this->error( '操作失败' );
        }
    }
}