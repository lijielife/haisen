<?php 
namespace app\index\controller;

use think\Controller;

class goods extends StoreBase
{
    /**
     * 商品列表
     * @author Haibin 
     * @date   2016-12-30
     * @param  [param]
     * @return [type]     [description]
     */
    public function goods_list(){
        $goods_model       = model( 'Goods' );
        $status = input('status');
        $condition = array();
        $condition['store_id'] = session( 'store_info.store_id' );
        if ( $status == '1' ) {//上架
            $condition['is_on_sale'] = '1';
        }elseif( $status == '2' ){//下架
            $condition['is_on_sale'] = '0';
        }
        // 搜索词
        $q = input('q');
        if (!empty($q)) {
            $condition['goods_name'] = ['like','%'. $q .'%'];
        }
        $goods_res          = $goods_model->get_list( $condition );
        $data['goodsList']  = $goods_res;
        $data['goods_name'] = $q;
        $data['status']     = $status;
        return view( 'goods_list', $data );
    }
    /**
     * 商品详情
     * @author Haibin 
     * @date   2017-01-03
     * @param  [param]
     * @return [type]     [description]
     */
    public function goods_info(){
        $ids                   = input( 'ids' );
        $goods_model           = model( 'Goods' );
        $data                  = array();
        $condition['goods_id'] = $ids;
        $goods_info            = $goods_model->get_info( $condition );
        $data                  = array();
        $data['goods_info']    = $goods_info;
        return view( 'goods_info', $data );
    }
    /**
     * 编辑或添加商品
     * @author Haibin 
     * @date   2017-01-02
     * @param  [param]
     * @return [type]     [description]
     */
    public function goods_operation(){
        $goods_model           = model( 'Goods' );
        $store_model           = model( 'Store' );
        $goods_keyword_model   = model( 'GoodsKeyword' );
        $data['goods_name']    = input( 'post.goods_name', '', 'trim' );
        $data['meta_keys']     = input( 'post.meta_keys', '', 'trim' );
        $data['add_time']      = time();
        $data['goods_sn']      = input( 'post.goods_sn', '', 'trim' );
        $goods_main            = input( 'post.goods_main', '', 'trim' );
        $data['goods_bianhao'] = input( 'post.goods_bianhao', '', 'trim' );
        $data['goods_number']  = input( 'post.goods_number', '', 'trim' );
        $data['sort_desc']     = input( 'post.sort_desc', '', 'trim' );
        $data['goods_unit']    = input( 'post.goods_unit', '', 'trim' );
        $data['goods_weight']  = input( 'post.goods_weight', '', 'trim' );
        $data['warn_number']   = input( 'post.warn_number', '', 'trim' );
        $data['market_price']  = input( 'post.market_price', '', 'trim' );
        $data['shop_price']    = input( 'post.shop_price', '', 'trim' );
        $data['pifa_price']    = input( 'post.pifa_price', '', 'trim' );
        $data['goods_desc']    = input( 'post.goods_desc', '', 'trim' );
        $data['meta_desc']     = input( 'post.meta_desc', '', 'trim' );
        $goods_id              = input( 'post.goods_id', '', 'trim' );
        if ( isset( $_POST ) && ! empty( $_POST ) ) {
            if ( empty ( $data['goods_name'] ) ) {
                $this->error( '商品名称不能为空' );
            }else{
                $data['meta_keys'] = ! empty( $data['meta_keys'] ) ? str_replace( array('，','。','.'),',', $data['meta_keys'] ) : "";
                if ( ! isset( $data['goods_sn'] ) || empty( $data['goods_sn'] ) ) {
                    $goods_list_all = $goods_model->get_list_all();
                    $gid = count( $goods_list_all ) + 1;
                    $gid = empty( $gid ) ? 1 : $gid;

                    $goods_sn = 'GZFH' . str_repeat('0', 6 - strlen($gid)) . $gid;
                    $data['goods_sn'] = $goods_sn;
                    // 检查当前的货号是否存在
                    $con['goods_sn'] = $goods_sn;
                    $checkvar = $goods_model->get_info( $con );
                    if ( ! empty( $checkvar ) ) {
                        $data['goods_sn'] = $goods_sn.'-1'; // 重新定义一个
                    }
                }
                //图片这不太好
                $data['goods_thumb']  = $goods_main;
                $data['goods_img']    = $goods_main;
                $data['original_img'] = $goods_main;
                
                $data['store_id']     = session( 'store_info.store_id' );
                $condi['store_id']    = session( 'store_info.store_id' );
                $store_info           = $store_model->get_info( $condi );
                $data['wallet_id']    = $store_info['wallet_id'];

                if( empty( $goods_id ) ){//添加
                    $goods_add = $goods_model->add_goods( $data );
                    $last_id = $goods_model->getLastInsID();
                    if ( $goods_add ) {
                        // 将关键字添加到goods_keyword表
                        if ( ! empty( $data['meta_keys'] ) ) {
                            $keys = explode( ',', $data['meta_keys'] );
                            foreach ( $keys as $key ) {
                                if ( empty( $key ) ) continue;
                                $key            = trim( $key );
                                $ds             = array();
                                $ds['goods_id'] = $last_id;
                                $ds['keyword']  = $key;
                                $ds['p_fix']    = "NAL";
                                $goods_keyword_model->add_goods( $ds );
                            }
                            unset( $keys );
                        }
                        $this->success( '添加成功' );
                    }else{
                        $this->error( '添加失败' );
                    }
                }else{
                    $condition['goods_id'] = $goods_id;
                    $goods_up              = $goods_model->up_goods( $condition, $data );
                    if ( $goods_up ) {
                        $this->success( '修改成功' );
                    }else{
                        $this->error( '修改失败' );
                    }
                }
            }
        }
        $data['goods_info'] = array();
        return view( 'goods_info', $data );
    }
    /**
     * 设置商品状态
     * @author Haibin 
     * @date   2016-12-30
     * @param  [param]
     */
    public function set_goods_state(){
        $status                = input('status');
        $goodsids              = input('ids/a');
        $flag                  = input('flag');
        $goods_model           = model( 'Goods' );
        $condition['goods_id'] = array( 'in', implode(',', $goodsids) );
        if ($status == 'delete') {
            // 清空Goods表
            $goodsResult = $goods_model->del_goods( $condition );
        } else {
            if( $status == 1 ){//上架
                $goodsResult = $goods_model->up_goods( $condition, ['is_on_sale' => '1'] );
            }elseif( $status == 2 ){//下架
                $goodsResult = $goods_model->up_goods( $condition, ['is_on_sale' => '0'] );
            }
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
}

















