<?php
namespace app\index\controller;

use think\Controller;
use think\Request;

/**
 * 商户登陆
 */
class Login extends Controller
{
    /**
     * 登陆页面
     * @author Yusure  http://yusure.cn
     * @date   2016-12-27
     * @param  [param]
     * @return [type]     [description]
     */
    public function index()
    {
        return view();
    }

    /**
     * 执行登陆
     * @author Yusure  http://yusure.cn
     * @date   2016-12-27
     * @param  [param]
     * @return [type]     [description]
     */
    public function do_login()
    {
        /* 获取用户名密码 */
        $username = input( 'post.username', '', 'trim' );
        $password = input( 'post.password', '', 'md5' );
        $store_model = model( 'Store' );
        $condition = [];
        $condition['username'] = $username;
        $condition['status']   = 1;
        $field = 'store_id, class_id, store_name, username, password, store_logo';
        $store_info = $store_model->get_info( $condition, $field );
        if ( $store_info['password'] === $password )
        {
            /* Login Success */
            unset( $store_info['password'] );
            session( 'store_info', $store_info );
            $this->success( '登陆成功', url( 'Index/index' ) );
        }
        else
        {
            /* Error */
            $this->error( '登陆失败' );
        }
    }

    /**
     * 退出
     * @author Yusure  http://yusure.cn
     * @date   2016-12-27
     * @param  [param]
     * @return [type]     [description]
     */
    public function logout()
    {
        session( 'store_info', null );
        $this->success( '退出成功', url( 'login/index' ) );
    }
}