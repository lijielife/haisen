<?php
class ShoppingController extends Controller
{

    public function  __construct()
    {
        $this->css( array( 'content.css', 'calendar.css' ) );
        $this->js( array( 'calendar.js', 'calendar-setup.js', 'calendar-zh.js' ) );
    }
        
    // 配送方式方式
    public function shoppinglist()
    {
        // 删除
        $id = isset( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;
        if ( $id > 0 )
        {
            $this->App->delete( 'shipping_name', 'shipping_id', $id );
        }
            
        $rt = $this->App->find("SELECT * FROM `{$this->App->prefix()}shipping_name`");
        $this->set( 'rt', $rt );
        $this->template( 'deliverylist' );
    }

    // 配送方式信息
    public function shoppinginfo( $data = array() )
    {
        $id = isset( $data['id'] ) ? $data['id'] : 0;
        if ( $id > 0 )
        {
            $rt = $this->App->findrow("SELECT * FROM `{$this->App->prefix()}shipping_name` WHERE shipping_id='$id' LIMIT 1");
            if ( isset( $_POST ) && ! empty( $_POST ) )
            {
                if ( $this->App->update( 'shipping_name', $_POST, 'shipping_id', $id ) )
                {
                    $this->jump('shopping.php?type=shoppinginfo&id='.$id,0,'更新成功！');
                }
                else
                {
                    $this->jump('shopping.php?type=shoppinginfo&id='.$id,0,'更新失败！');
                }
            }
            $type = 'edit';
        }
        else
        {
            if ( isset( $_POST ) && ! empty( $_POST ) )
            {
                if ( $this->App->insert( 'shipping_name', $_POST ) )
                {
                    $this->jump('shopping.php?type=shoppinginfo',0,'添加成功！');
                }
                else
                {
                    $this->jump('shopping.php?type=shoppinginfo',0,'添加失败！');
                }
            }
            $type = 'add';
        }
        $this->set( 'type', $type );
        $this->set( 'rt', $rt );
        $this->template( 'deliveryinfo' );
    }
        

    public function shoppingsn( $data = array() )
    {
        $rt = $this->App->find("SELECT * FROM `{$this->App->prefix()}shipping_name`");
        $this->set('rt',$rt);
        
        //分页
        $page= isset($_GET['page']) ? $_GET['page'] : 1;
        if ( empty( $page ) )
        {
            $page = 1;
        }
        $list  = 20;
        $start = ($page-1) * $list;
        $comd  = array();
        $w = "";
        if(isset($_GET['sid'])&&$_GET['sid'] > 0) $comd[] = "tb1.shipping_id = '".intval($_GET['sid'])."'";
        if(isset($_GET['keyword'])&&!empty($_GET['keyword'])) $comd[] = "tb1.shipping_sn LIKE '%".trim($_GET['keyword'])."%'";
        if ( ! empty( $comd ) )
        {
            $w = "WHERE ".implode(' AND ',$comd);
        }
        $sql = "SELECT COUNT(tb1.id) FROM `{$this->App->prefix()}shipping_sn` AS tb1 LEFT JOIN `{$this->App->prefix()}shipping_name` AS tb2 ON tb1.shipping_id = tb2.shipping_id $w";
        $tt = $this->App->findvar($sql);
        $rts['pages'] = Import::basic()->getpage($tt, $list, $page,'?page=',true);
        
        $sql = "SELECT tb1.*,tb2.shipping_name FROM `{$this->App->prefix()}shipping_sn` AS tb1 LEFT JOIN `{$this->App->prefix()}shipping_name` AS tb2 ON tb1.shipping_id = tb2.shipping_id $w ORDER BY tb1.id DESC LIMIT $start,$list";
        $rts['lists'] = $this->App->find($sql);
        $this->set('rts',$rts);
        $this->template('shoppingsn');
    }
    
    public function ajax_add_mark_sn($data=array()){
        $sid = intval($data['shopping_id']);
        $ptid = intval($data['shipping_sn']);
        
        if($sid > 0 && $ptid > 0 ){
            $sql = "SELECT id FROM `{$this->App->prefix()}shipping_sn` WHERE shipping_sn = '$ptid' LIMIT 1";
            $id = $this->App->findvar($sql);
            if($id > 0){
            
            }else{
                $this->App->insert('shipping_sn',array('shipping_id'=>$sid,'shipping_sn'=>$ptid,'addtime'=>time()));
            }
        }
        exit;
    }
    
    //生成物流号码
    public function ajax_submit_mark_sn($data=array()){
        $sid       = $data['sid'];
        $ptid      = $data['ptid'];
        $startptid = $data['startptid'];
        $endptid   = $data['endptid'];
        if($sid > 0 && $ptid > 0 && $startptid > 0 && $endptid > 0 && $endptid > $startptid){
            $k= 0;
            for($i=$startptid;$i<=$endptid;$i++){
                ++$k;
                if($k>300) break;
                $sn = $ptid.$i;
                $sql = "SELECT id FROM `{$this->App->prefix()}shipping_sn` WHERE shipping_sn = '$sn' LIMIT 1";
                $id = $this->App->findvar($sql);
                if($id > 0){
                
                }else{
                    $this->App->insert('shipping_sn',array('shipping_id'=>$sid,'shipping_sn'=>$sn,'addtime'=>time()));
                }
            }
        }
        exit;
    }
    
    // 物流单关联订单
    public function ajax_shopping_op( $data )
    {
        $oid = $data['oid'];
        $sn  = $data['val'];
        $sid = $data['sid'];
        if ( $oid > 0 && $sid > 0 && ! empty( $sn ) )
        {
            $sql = "SELECT * FROM `{$this->App->prefix()}goods_order_info` WHERE order_id = '$oid' LIMIT 1";
            $row = $this->App->findrow( $sql );
            $ssn = $row['sn_id'];
            /* 作废原来的订单号 */
            if ( ! empty( $ssn ) && $ssn !== $sn )
            {
                $data = array();
                $data['addtime'] = '0';
                $data['usetime'] = '0';
                $data['is_use']  = '0';
                $this->App->update( 'shipping_sn', $data, 'shipping_sn', $ssn );
            }
            
            $sql = "SELECT id FROM `{$this->App->prefix()}shipping_sn` WHERE shipping_sn = '$sn' LIMIT 1";
            $id = $this->App->findvar( $sql );
            if ( $id > 0 )
            {
                $data = array();
                $data['shipping_id'] = $sid;
                $data['usetime']     = time();
                $data['is_use']      = '1';
                $this->App->update( 'shipping_sn', $data, 'shipping_sn', $sn );
            }
            else
            {
                $data = array();
                $data['shipping_sn'] = $sn;
                $data['shipping_id'] = $sid;
                $data['usetime']     = time();
                $data['addtime']     = time();
                $data['is_use']      = '1';
                $this->App->insert( 'shipping_sn', $data );
            }

            $up_data = array();
            $up_data['sn_id']            = $sn;
            $up_data['shipping_id_true'] = $sid;
            if ( $this->App->update( 'goods_order_info', $up_data, 'order_id', $oid ) )
            {
                $sql = "SELECT shipping_id FROM `{$this->App->prefix()}shipping_sn` WHERE shipping_sn = '{$sn}' LIMIT 1";
                $shopping_id = $this->App->findvar( $sql );
                $sql = "SELECT shipping_name FROM `{$this->App->prefix()}shipping_name` WHERE shipping_id = '{$shopping_id}' LIMIT 1";
                $shopping_name = $this->App->findvar( $sql );

                $data = array();
                $data['tel']     = $row['mobile'];
                $data['express'] = $shopping_name;
                $data['number']  = $sn;
                $data['type']    = 'tmp_goods';
                $this->action( 'sms', 'sms_yssend', $data );
            }
        }
    }
}