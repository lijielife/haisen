<?php
/**
 * 生成图片地址
 * @author Yusure  http://yusure.cn
 * @date   2016-12-29
 * @param  [param]
 * @return [type]     [description]
 */
function pic_url( $path )
{
    if ( $path )
    {
        $url = config( 'master_domain' ) . $path;
    }
    else
    {
        $url = '/static/img/default.jpg';
    }

    return $url;
}