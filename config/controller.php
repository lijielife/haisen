<?php
/*
*调用控制类之前配置的
*/
$import_obj = new Import();
defined('SESS_PATH')
? $_this->Session   = $import_obj->session(SESS_PATH, 0)
: $_this->Session   = $import_obj->session(SYS_PATH.DS.'sess'.DS,0);

$_this->Cache  = $import_obj->cache(SYS_PATH.'cache', $_this->args());

//包括前台公告信息
if ( defined( 'SYS_PATH_THEME' ) || defined( 'SYS_PATH_WAP' ) )
{
    if ( ! class_exists( 'Common' ) )
    {
        require_once( SYS_PATH . 'inc/common.php' );
    }
}