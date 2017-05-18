<?php
namespace app\index\model;

use think\Model;
use think\DB;

class Store extends Model
{

    protected $table = 'store';

    /**
     * 获取店铺信息
     * @author Yusure  http://yusure.cn
     * @date   2016-12-27
     * @param  [param]
     * @return [type]     [description]
     */
    public function get_info( $condition = [], $field = '*' )
    {
        return Db::name( $this->table )->where( $condition )->field( $field )->find();
    }

    /**
     * 修改商户信息
     * @author Yusure  http://yusure.cn
     * @date   2016-12-29
     * @param  [param]
     * @return [type]     [description]
     */
    public function up_store( $condition = [], $data = [] )
    {
        return Db::name( $this->table )->where( $condition )->update( $data );
    }
}