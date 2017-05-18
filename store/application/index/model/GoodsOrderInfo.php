<?php
namespace app\index\model;

use think\Model;
use think\DB;

class GoodsOrderInfo extends Model
{

    protected $table = 'goods_order_info';

    /**
     * 获取列表
     */
    public function get_list( $condition = [], $field = '*', $order='add_time DESC' )
    {
        return Db::name( $this->table )->where( $condition )->field( $field )->order( $order )->paginate( PAGE_NUM, false, ['query' => request()->param()] );
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
        return Db::name( $this->table )->where( $condition )->value( $field );
    }

    public function up_goods( $condition = [], $data = [] )
    {
        return Db::name( $this->table )->where( $condition )->update( $data );
    }
    public function del_goods( $condition = [] )
    {
        return Db::name( $this->table )->where( $condition )->delete();
    }
}