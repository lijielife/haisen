<?php
namespace app\index\controller;

use think\Controller;

class Upload extends StoreBase
{

    /**
     * 上传图片
     * @author Yusure  http://yusure.cn
     * @date   2016-12-29
     * @param  [param]
     * @return [type]     [description]
     */
    public function store_logo()
    {
        // 获取表单上传文件 例如上传了001.jpg
       $file = request()->file('file');
       // 移动到目录下
       $path = dirname( ROOT_PATH ) . DS . 'photos' . DS . 'store_logo';
       $info = $file->move( $path );
       if ( $info )
       {
           $url = 'photos' . DS . 'store_logo' . DS . $info->getSaveName();
           $url = str_replace( '\\', '/', $url );
           echo $url;die;
       }
       else
       {
           // 上传失败获取错误信息
           echo $file->getError();
       }
    }

    /**
     * 商户轮播图
     * @author Yusure  http://yusure.cn
     * @date   2016-12-29
     * @param  [param]
     * @return [type]     [description]
     */
    public function store_banner()
    {
        // 获取表单上传文件 例如上传了001.jpg
       $file = request()->file('file');
       // 移动到目录下
       $path = dirname( ROOT_PATH ) . DS . 'photos' . DS . 'store_banner';
       $info = $file->move( $path );
       if ( $info )
       {
           $url = 'photos' . DS . 'store_banner' . DS . $info->getSaveName();
           $url = str_replace( '\\', '/', $url );
           echo $url;die;
       }
       else
       {
           // 上传失败获取错误信息
           echo $file->getError();
       }
    }
    /**
     * 商品主图
     * @author Haibin 
     * @date   2017-01-03
     * @param  [param]
     * @return [type]     [description]
     */
    public function goods_main(){
      // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
       // 移动到目录下
       $path = dirname( ROOT_PATH ) . DS . 'photos' . DS . 'store_goods';
       $info = $file->move( $path );
       if ( $info )
       {
          $url = 'photos' . DS . 'store_goods' . DS . $info->getSaveName();
           $url = str_replace( '\\', '/', $url );
           echo $url;die;
       }
       else
       {
           // 上传失败获取错误信息
           echo $file->getError();
       }
    }
}