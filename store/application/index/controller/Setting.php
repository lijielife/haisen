<?php 
namespace app\index\controller;

use think\Controller;

class setting extends StoreBase
{
    public function modify_pwd(){
        $store_model           = model( 'Store' );        /* 商户 Model */
        $store_con['store_id'] = session( 'store_info.store_id' );
        $store_info            = $store_model->get_info( $store_con, '*' );
        if( $_POST ){
            $password_old = input( 'post.password_old', '', 'md5' );
            $password_new = input( 'post.password_new', '', 'md5' );
            $password_confirm = input( 'post.password_confirm', '', 'md5' );
            if ( empty( $password_old ) ) {
                $this->error( '请填写旧密码！' );
            }
            if ( empty( $password_new ) ) {
                $this->error( '请填写新密码！' );
            }
            if ( empty( $password_confirm ) ) {
                $this->error( '请填写确认密码！' );
            }
            if( $password_old != $store_info['password'] ){
                $this->error( '旧密码不正确！' );
            }
            if( $password_new != $password_confirm ){
                $this->error( '确认密码与新密码不一致！' );
            }
            $data['password'] = $password_new;
            $res              = $store_model->up_store( $store_con, $data );
            if ( $res !== false )
            {
                $this->success( '操作成功' );
            }
            else
            {
                $this->error( '操作失败' );
            }
        }else{
            $data['store_info'] = $store_info;
            return view( 'modify_pwd', $data );
        }
    }
}

















