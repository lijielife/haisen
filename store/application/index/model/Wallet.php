<?php
namespace app\index\model;

use think\Model;
use think\DB;

class Wallet extends Model
{

    protected $table = 'wallet';

    /**
     * 获取列表
     */
    public function get_list( $condition = [], $field = '*' )
    {
        return Db::name( $this->table )->where( $condition )->field( $field )->select();
    }

    /**
     * 获取分类信息
     */
    public function get_info( $condition = [], $field = '*' )
    {
        return Db::name( $this->table )->where( $condition )->field( $field )->find();
    }

    /**
     * 获取某个字段的值
     */
    public function get_one( $condition = [], $field = '*' )
    {
        return Db::name( $this->table )->where( $condition )->value( $field );;
    }
}