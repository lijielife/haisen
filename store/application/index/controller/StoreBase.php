<?php
namespace app\index\controller;

use think\Controller;

/**
 * 商家基类
 */
class StoreBase extends Controller
{
    public function _initialize()
    {
        /* 检查登陆 */
        if ( ! session( '?store_info' ) )
        {
            $this->redirect( url( 'Login/index' ) );
        }
    }
}