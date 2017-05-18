<?php
/**
 * 团购控制器
 */
class GroupbuyController extends Controller 
{
    /**
     * 构造方法
     */
    public function  __construct() 
    {
        $this->css( 'content.css' );
    }
    
    // 团购列表
    public function index() 
    {
        // 分页
        $page = isset($_GET['page']) ? $_GET['page'] : '';
        if ( empty( $page ) ) {
            $page = 1;
        }
        $list  = 10;
        $start = ($page-1) * $list;
        $sql   = "SELECT COUNT(group_id) FROM `{$this->App->prefix()}goods_groupbuy`";
        $tt    = $this->App->findvar($sql);
        $import_obj = new Import();
        $pagelink = $import_obj->basic()->getpage( $tt, $list, $page, '?page=', true );
        $this->set( "pagelink", $pagelink );
        
        $sql = "SELECT * FROM `{$this->App->prefix()}goods_groupbuy` ORDER BY group_id DESC LIMIT $start, $list";
        
        $this->set( 'rt', $this->App->find( $sql ) );
        $this->template( 'groupbuy_index' );
    }
    
    /**
     * 添加及编辑团购信息
     * @$id:大于0时，为编辑页面，否则为添加团购
     */
    public function groupinfo( $id = 0 ) 
    {
        $this->js( array( 'time/WdatePicker.js', "edit/kindeditor.js" ) );
        $rt = array();
        $_GET['cat_id']   = 0;
        $_GET['brand_id'] = 0;
        if ( $id > 0 ) { // 团购编辑
            $sql = "SELECT * FROM `{$this->App->prefix()}goods_groupbuy` WHERE group_id = '$id' LIMIT 1";
            $rt = $this->App->findrow( $sql );
            if ( empty( $rt ) ) {
                $this->jump( 'groupbuy.php?type=list' );exit;
            }

            if ( ! empty ( $_POST ) ) {
                $data = array();           
                $data['price']          = $_POST['prices'];
                $data['original_price'] = $_POST['original_price'];
                $data['group_name']     = trim( $_POST['group_name'] );
                $data['number']         = intval( $_POST['number'] );
                $data['takemoney']      = trim( $_POST['takemoney'] );
                $data['goods_img']      = $_POST['goods_img'];
                $data['desc']           = $_POST['desc'];
                $data['active']         = $_POST['active'] == 1 ? $_POST['active'] : 0;
                /* 判断提交过来的 是否开启团购 + 老状态是否关闭 成立则把完成人数清0 */
                if ( $data['active'] == 1 && $rt['active'] == 0 )
                {
                    $data['finish_number'] = 0;
                }

                $up_res = $this->App->update( 'goods_groupbuy', $data, 'group_id', $id );
                if ( $up_res !== false ) {
                    $this->jump( '', 0, '更新成功！' );
                } else {
                    $this->jump( '', 0, '更新失败！' );
                }             
            }
            
        } else { // 添加团购
            if ( ! empty( $_POST ) ) {
                $data = array();           
                $data['price']          = $_POST['prices'];
                $data['original_price'] = $_POST['original_price'];
                $data['group_name']     = trim( $_POST['group_name'] );
                $data['number']         = intval( $_POST['number'] );
                $data['takemoney']      = trim( $_POST['takemoney'] );
                $data['goods_img']      = $_POST['goods_img'];
                $data['desc']           = $_POST['desc'];
                $data['active']         = $_POST['active'] == 1 ? $_POST['active'] : 0;
                if ( $this->App->insert( 'goods_groupbuy', $data ) ) {
                    $this->jump( '', 0, '添加成功！' );exit;
                } else {
                    $this->jump( '', 0, '添加失败！' );exit;
                }
                $rt = $_POST; 
            }
        }
        
        /* 用户设置 */
        $sql = "SELECT * FROM `{$this->App->prefix()}userconfig` LIMIT 1";
        $this->set( 'userconfig', $this->App->findrow( $sql ) );

        $this->set( 'rt', $rt );
        $this->template( 'groupinfo' );
    }
    
    // ajax获取商品
    public function ajax_get_group_goods( $data = array() )
    {
        $cid = $data['cat_id'];
        $bid = $data['brand_id'];
        $key = $data['keyword'];
        
        $comd = array();
        $w = "";
        if($cid>0){
            $cids = $this->action('common','get_goods_sub_cat_ids',$_GET['cat_id']);
            $comd[] = 'tb1.cat_id IN('.implode(",",$cids).') OR tb3.cat_id = '.intval($cid);
        }

        if($bid>0)  $comd[] = 'tb1.brand_id='.intval($bid);
        
        if(!empty($key))    $comd[] = "(tb1.goods_name LIKE '%".trim($key)."%')";

        if(!empty($comd))   $w = ' WHERE '.implode(' AND ',$comd);

        
        $orderby = ' ORDER BY tb1.`goods_id` DESC';
        $sql = "SELECT tb1.goods_id, tb1.goods_name FROM  `{$this->App->prefix()}goods` AS tb1";
        $sql .=" LEFT JOIN `{$this->App->prefix()}category_sub_goods` AS tb3 ON tb1.goods_id=tb3.goods_id";
        $sql .=" $w $orderby LIMIT 10";
        $rt = $this->App->find($sql);
        if(!empty($rt)){
            $str = "";  
            foreach($rt as $row){       
                $str .= '<option value="'.$row['goods_id'].'">'.$row['goods_name'].'</option>'."\n";
            }
            echo $str;
        }else{
            echo '<option value="0">无找到可匹配的商品结果</option>';
        }
        unset($comd,$rt);
        exit;
    }
    
    /*
    AJAX删除团购商品价格
    */
    function ajax_del_group_goods($id=0){
        if(!($id>0)){ echo "传送ID非法！"; exit;}
        $this->App->delete('goods_groupbuy_price','gpid',$id);
    }
    
    /**
     * AJAX删除团购商品
     */
    function ajax_delgroup( $ids = 0 ) {
        if ( empty( $ids ) ) die( "非法删除，删除ID为空！" );
        if ( ! is_array( $ids ) )
        {
            $id_arr = @explode( '+', $ids );
        }
        else
        {
            $id_arr = $ids; 
        }
        if ( ! empty( $ids ) ) {
            $sql = "DELETE FROM `{$this->App->prefix()}goods_groupbuy` WHERE group_id IN(".implode(',',$id_arr).")"; 
            $this->App->query( $sql );
            $this->action( 'system', 'add_admin_log', '删除团购商品：'.@implode(',',$id_arr) );
        }
        exit;
    }
}
?>