<?php
namespace app\index\model;

use think\Model;
use think\DB;

class Region extends Model
{

    protected $table = 'region';

    /**
     * 获取单条信息
     */
    public function get_info( $condition = [], $field = '*' )
    {
        return Db::name( $this->table )->where( $condition )->field( $field )->find();
    }

    /**
     * 修改信息
     */
    public function up_info( $condition = [], $data = [] )
    {
        return Db::name( $this->table )->where( $condition )->update( $data );
    }

    /**
     * 获取某个字段的值
     */
    public function get_one( $condition = [], $field = '*' )
    {
        return Db::name( $this->table )->where( $condition )->value( $field );;
    }
}