<?php
namespace app\index\controller;

use think\Controller;

class store extends StoreBase
{
    /**
     * 商户信息
     * @author Yusure  http://yusure.cn
     * @date   2016-12-28
     * @param  [param]
     * @return [type]     [description]
     */
    public function info()
    {
        $store_model  = model( 'Store' );        /* 商户 Model */
        $class_model  = model( 'StoreClass' );   /* 商户分类 Model */
        $wallet_model = model( 'Wallet' );       /* 钱包 Model */

        $store_con['store_id'] = session( 'store_info.store_id' );
        $store_info = $store_model->get_info( $store_con, '*' );

        $class_con['class_id'] = $store_info['class_id'];
        $store_info['class_name'] = $class_model->get_one( $class_con, 'class_name' );

        $wallet_con['wallet_id'] = $store_info['wallet_id'];
        $store_info['wallet_name'] = $wallet_model->get_one( $wallet_con, 'wallet_name' );

        $data['store_info'] = $store_info;
        return view( 'info', $data );
    }    

    /**
     * 修改商户信息
     * @author Yusure  http://yusure.cn
     * @date   2016-12-29
     * @param  [param]
     * @return [type]     [description]
     */
    public function up_info()
    {
        $store_model  = model( 'Store' );        /* 商户 Model */
        $store_con['store_id'] = session( 'store_info.store_id' );
        $data['store_name'] = input( 'post.store_name', '', 'trim' );
        $data['phone']      = input( 'post.phone', '', 'trim' );
        $data['store_logo'] = input( 'post.store_logo', '', 'trim' );
        $data['store_pic']  = input( 'post.store_pic', '', 'trim' );
        $data['longitude']  = input( 'post.longitude', '', 'trim' );
        $data['latitude']   = input( 'post.latitude', '', 'trim' );
        $data['address']    = input( 'post.address', '', 'trim' );
        $data['edit_time']  = time();
        $res = $store_model->up_store( $store_con, $data );
        if ( $res !== false )
        {
            session( 'store_info.store_name', $data['store_name'] );
            session( 'store_info.store_logo', $data['store_logo'] );            
            $this->success( '操作成功' );
        }
        else
        {
            $this->error( '操作失败' );
        }
    }
}