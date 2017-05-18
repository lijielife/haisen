<?php
namespace app\index\model;

use think\Model;
use think\DB;

class Goods extends Model
{

    protected $table = 'goods';

    /**
     * 获取列表
     */
    public function get_list( $condition = [], $field = '*', $order='add_time DESC' )
    {
        return Db::name( $this->table )->where( $condition )->field( $field )->order( $order )->paginate( PAGE_NUM, false, ['query' => request()->param()] );
    }
    public function get_list_all()
    {
        return Db::name( $this->table )->select();
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

    public function up_goods( $condition = [], $data = [] )
    {
        return Db::name( $this->table )->where( $condition )->update( $data );
    }
    public function del_goods( $condition = [] )
    {
        return Db::name( $this->table )->where( $condition )->delete();
    }
    public function add_goods( $data ){
        return Db::name( $this->table )->insert( $data );
    }
}