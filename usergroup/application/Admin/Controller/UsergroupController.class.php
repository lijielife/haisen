<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class UsergroupController extends AdminbaseController{
    protected $gz_user,$gz_user_tuijian,$users,$gz_goods_order_info,$gz_goods_order;
    
    function _initialize() {
        parent::_initialize();
        $this->gz_user = M("user","gz_");
        $this->gz_user_tuijian = M("user_tuijian","gz_");
        $this->users = M("users");
        /* 普通分销订单 Model */
        $this->gz_goods_order = M("goods_order","gz_");
        /* 团购订单 Model */
        $this->gz_group_goods_order = M( 'group_goods_order', 'gz_' );
        /* 众筹订单 Model */
        $this->gz_crowd_goods_order = M( 'crowd_goods_order', 'gz_' );
    }

    public function index() {
        //上个月时间
        $lastmonthstart = strtotime(date("Y")."-".(date("m")-1));
        $thismonthstart = strtotime(date("Y-m"));
        $w = "";
        if ( $_REQUEST['key'] ) 
        {
            $w = " tb2.nickname LIKE '%".$_REQUEST['key']."%' OR tb2.mobile_phone LIKE '%".$_REQUEST['key']."%'";
            $_GET['key'] = $_REQUEST['key'];
            $this->assign( "key", $_REQUEST['key'] );
        }
        if ( $_SESSION['uid'] && $w ) 
        {
            $w .= " and tb1.uid = '".$_SESSION['uid']."'";
        } 
        else if ( $_SESSION['uid'] ) 
        {
            $w .= " tb1.uid = '".$_SESSION['uid']."'";
        }
        $count = $this->gz_user_tuijian->join('as tb1 left join gz_user as tb2 on tb1.uid = tb2.user_id')->where($w)->count();
        $page = $this->page($count, 100);
        $list_tmp = $this->gz_user_tuijian
        ->field('tb1.*,tb2.subscribe_time,tb2.reg_time,tb2.nickname,tb2.headimgurl,tb2.money_ucount,tb2.points_ucount,tb2.share_ucount,tb2.guanzhu_ucount,tb2.is_subscribe')
        ->join('as tb1 left join gz_user as tb2 on tb1.uid = tb2.user_id')
        ->where($w)
        ->order("tb1.parent_uid ASC,tb2.money_ucount DESC,tb2.share_ucount DESC,tb1.id ASC")
        ->limit($page->firstRow . ',' . $page->listRows)
        ->select();
        if ( ! empty( $list_tmp ) )
        {
            foreach ( $list_tmp as $k => $v ) 
            {
                $uid = $v['uid'];
                $lists[$k] = $v;
                $lists[$k]['zcount'] = $this->gz_user_tuijian->where('uid!='.$uid.' and parent_uid='.$uid)->count('id');
                $lists[$k]['subscribe_time_data'] = $v['subscribe_time']?date("Y-m-d H:i:s",$v['subscribe_time']):'';
                $lists[$k]['isopen'] = $this->users->where("uid=".$uid)->count();
                $allson =  $uid.$this->getallson($uid);

                // 总购买单数，包括下级
                $lists[$k]['allnum'] = 
                $this->_get_goods_order_num( $allson )
                +
                $this->_get_group_goods_order_num( $allson );
                +
                $this->_get_crowd_num( $allson );

                // 上月购买单数
                $lists[$k]['lastnum'] = 
                $this->_get_last_month_goods_order_num( $allson, $lastmonthstart, $thismonthstart )
                +                
                $this->_get_last_month_group_goods_order_num( $allson, $lastmonthstart, $thismonthstart );
                +
                $this->_get_last_month_crowd_num( $allson, $lastmonthstart, $thismonthstart );
            }
        }
        
        $this->assign("my_uid",$_SESSION['uid']);
        $this->assign("isadd",$_SESSION['isadd']);
        $this->assign("page", $page->show('Admin'));
        $this->assign("formget",$_GET);
        $this->assign("lists",$lists);
        $this->display();
    }

    /**
     * 自己的下级
     */
    public function index_own()
    {
        // 上个月时间
        $lastmonthstart = strtotime(date("Y")."-".(date("m")-1));
        $thismonthstart = strtotime(date("Y-m"));
        $uid = $_GET['uid'];
        $w = " tb1.parent_uid = '$uid'";
        $count = $this->gz_user_tuijian->join('as tb1 left join gz_user as tb2 on tb1.uid = tb2.user_id')->where($w)->count();
        $page = $this->page($count, 100);
        $list_tmp = $this->gz_user_tuijian
        ->field('tb1.*,tb2.subscribe_time,tb2.reg_time,tb2.nickname,tb2.headimgurl,tb2.money_ucount,tb2.points_ucount,tb2.share_ucount,tb2.guanzhu_ucount,tb2.is_subscribe')
        ->join('as tb1 left join gz_user as tb2 on tb1.uid = tb2.user_id')
        ->where($w)
        ->order("tb1.parent_uid ASC,tb2.money_ucount DESC,tb2.share_ucount DESC,tb1.id ASC")
        ->limit($page->firstRow . ',' . $page->listRows)
        ->select();
        if ( ! empty( $list_tmp ) )
        {
            foreach ( $list_tmp as $k => $v ) 
            {
                $uid = $v['uid'];
                $lists[$k] = $v;
                $lists[$k]['zcount'] = $this->gz_user_tuijian->where('uid!='.$uid.' and parent_uid='.$uid)->count('id');
                $lists[$k]['subscribe_time_data'] = $v['subscribe_time']?date("Y-m-d H:i:s",$v['subscribe_time']):'';
                $lists[$k]['isopen'] = $this->users->where("uid=".$uid)->count();
                $allson =  $uid.$this->getallson($uid);

                // 总购买单数，包括下级
                $lists[$k]['allnum'] = 
                $this->_get_goods_order_num( $allson )
                +
                $this->_get_group_goods_order_num( $allson );
                +
                $this->_get_crowd_num( $allson );

                // 上月购买单数
                $lists[$k]['lastnum'] = 
                $this->_get_last_month_goods_order_num( $allson, $lastmonthstart, $thismonthstart )
                +                   
                $this->_get_last_month_group_goods_order_num( $allson, $lastmonthstart, $thismonthstart );
                +
                $this->_get_last_month_crowd_num( $allson, $lastmonthstart, $thismonthstart );
            }
        }
        
        $this->assign("page", $page->show('Admin'));
        $this->assign("my_uid",$_SESSION['uid']);
        $this->assign("isadd",$_SESSION['isadd']);
        $this->assign("formget",$_GET);
        $this->assign("lists",$lists);
        $this->display();
    }

    /**
     * [普通分销单 + 会员分销单 数量]
     */
    private function _get_goods_order_num( $allson )
    {
        $order_num = $this->gz_goods_order
        ->join("as tb1 left join gz_goods_order_info as tb2 on tb1.order_id=tb2.order_id")
        ->where("tb2.shipping_status=5 and tb2.pay_status=1 and tb2.user_id in(".$allson.")")
        ->sum("tb1.goods_number");

        /* 特殊要求：goods_bianhao A 1单 B  0.5单  C  5单  D 10单 */
        $num_B = $this->gz_goods_order
        ->join("as tb1 left join gz_goods_order_info as tb2 on tb1.order_id=tb2.order_id")
        ->where("tb2.shipping_status=5 and tb2.pay_status=1 and tb1.goods_bianhao='B' and tb2.user_id in(".$allson.")")
        ->sum("tb1.goods_number");
        if ( $num_B )
        {
            /* 如果有 符合的订单 就从总数里面减去数量 + 处理单数之后的数量 */
            $order_num = ( $order_num - $num_B ) + ( $num_B * 0.5 );
        }

        $num_C = $this->gz_goods_order
        ->join("as tb1 left join gz_goods_order_info as tb2 on tb1.order_id=tb2.order_id")
        ->where("tb2.shipping_status=5 and tb2.pay_status=1 and tb1.goods_bianhao='C' and tb2.user_id in(".$allson.")")
        ->sum("tb1.goods_number");
        if ( $num_C )
        {
            $order_num = ( $order_num - $num_C ) + ( $num_C * 5 );
        }

        $num_D = $this->gz_goods_order
        ->join("as tb1 left join gz_goods_order_info as tb2 on tb1.order_id=tb2.order_id")
        ->where("tb2.shipping_status=5 and tb2.pay_status=1 and tb1.goods_bianhao='D' and tb2.user_id in(".$allson.")")
        ->sum("tb1.goods_number");
        if ( $num_D )
        {
            $order_num = ( $order_num - $num_D ) + ( $num_D * 10 );
        }
        /* 特殊要求： End */

        return $order_num;
    }

    /**
     * [上月购买 普通分销单 + 会员分销单 数量]
     */
    private function _get_last_month_goods_order_num( $allson, $lastmonthstart, $thismonthstart )
    {
        $order_num = $this->gz_goods_order
        ->join("as tb1 left join gz_goods_order_info as tb2 on tb1.order_id=tb2.order_id")
        ->where("tb2.shipping_status=5 and tb2.pay_status=1 and tb2.user_id in(".$allson.") and tb2.add_time>".$lastmonthstart." and tb2.add_time<".$thismonthstart)
        ->sum( "tb1.goods_number" );

        /* 特殊要求：goods_bianhao A 1单 B  0.5单  C  5单  D 10单 */
        $num_B = $this->gz_goods_order
        ->join("as tb1 left join gz_goods_order_info as tb2 on tb1.order_id=tb2.order_id")
        ->where("tb2.shipping_status=5 and tb2.pay_status=1 and tb1.goods_bianhao='B' and tb2.user_id in(".$allson.") and tb2.add_time>".$lastmonthstart." and tb2.add_time<".$thismonthstart)
        ->sum("tb1.goods_number");
        if ( $num_B )
        {
            /* 如果有 符合的订单 就从总数里面减去数量 + 处理单数之后的数量 */
            $order_num = ( $order_num - $num_B ) + ( $num_B * 0.5 );
        }

        $num_C = $this->gz_goods_order
        ->join("as tb1 left join gz_goods_order_info as tb2 on tb1.order_id=tb2.order_id")
        ->where("tb2.shipping_status=5 and tb2.pay_status=1 and tb1.goods_bianhao='C' and tb2.user_id in(".$allson.") and tb2.add_time>".$lastmonthstart." and tb2.add_time<".$thismonthstart)
        ->sum("tb1.goods_number");
        if ( $num_C )
        {
            $order_num = ( $order_num - $num_C ) + ( $num_C * 5 );
        }

        $num_D = $this->gz_goods_order
        ->join("as tb1 left join gz_goods_order_info as tb2 on tb1.order_id=tb2.order_id")
        ->where("tb2.shipping_status=5 and tb2.pay_status=1 and tb1.goods_bianhao='D' and tb2.user_id in(".$allson.") and tb2.add_time>".$lastmonthstart." and tb2.add_time<".$thismonthstart)
        ->sum("tb1.goods_number");
        if ( $num_D )
        {
            $order_num = ( $order_num - $num_D ) + ( $num_D * 10 );
        }
        /* 特殊要求： End */

        return $order_num;
    }

    /**
     * [团购订单 数量]
     */
    private function _get_group_goods_order_num( $allson )
    {
        return $this->gz_group_goods_order
        ->join( 'as tb1 left join gz_group_goods_order_info as tb2 on tb1.order_id = tb2.order_id' )
        ->where( "tb2.shipping_status=5 and tb2.pay_status=1 and tb2.user_id in(".$allson.")" )
        ->sum( 'tb1.goods_number' );
    }

    /**
     * [上月购买 团购订单 数量]
     */
    private function _get_last_month_group_goods_order_num( $allson, $lastmonthstart, $thismonthstart )
    {
        return $this->gz_group_goods_order
        ->join("as tb1 left join gz_group_goods_order_info as tb2 on tb1.order_id=tb2.order_id")
        ->where("tb2.shipping_status=5 and tb2.pay_status=1 and tb2.user_id in(".$allson.") and tb2.add_time>".$lastmonthstart." and tb2.add_time<".$thismonthstart)
        ->sum( "tb1.goods_number" );
    }

    /**
     * [众筹订单 数量]
     */
    private function _get_crowd_num( $allson )
    {
        return $this->gz_crowd_goods_order
        ->join( 'as tb1 left join gz_group_goods_order_info as tb2 on tb1.order_id = tb2.order_id' )
        ->where( "tb2.shipping_status=5 and tb2.pay_status=1 and tb2.user_id in(".$allson.")" )
        ->sum( 'tb1.goods_number' );
    }

    /**
     * [上月购买 众筹订单 数量]
     */
    private function _get_last_month_crowd_num( $allson, $lastmonthstart, $thismonthstart )
    {
        return $this->gz_crowd_goods_order
        ->join("as tb1 left join gz_group_goods_order_info as tb2 on tb1.order_id=tb2.order_id")
        ->where("tb2.shipping_status=5 and tb2.pay_status=1 and tb2.user_id in(".$allson.") and tb2.add_time>".$lastmonthstart." and tb2.add_time<".$thismonthstart)
        ->sum( "tb1.goods_number" );
    }

    private function getallson($uid) {
        $allson = "";
        $allsonArr = $this->gz_user_tuijian->where("parent_uid=".$uid)->select();
        foreach ($allsonArr as $k => $v) {
            $allson.=",".$v['uid'];
            if($this->gz_user_tuijian->where("parent_uid=".$v['uid'])->count()>0) {
                $allson.=$this->getallson($v['uid']);
            }
        }
        return $allson;
    }
    private function _lists() {
        $whereArr = array();
        if($_POST['start_time']) {
            $whereArr['addtime'] = array("gt",strtotime($_POST['start_time']));
            $_GET['start_time'] = $_POST['start_time'];
            $this->assign("start_time", $_POST['start_time']);
        }
        if($_POST['end_time']) {
            $whereArr['addtime'] = array("lt",strtotime($_POST['end_time']));
            $_GET['end_time'] = $_POST['end_time'];
            $this->assign("end_time", $_POST['end_time']);
        }
        if($_POST['keyword']) {
            $whereArr['name'] = $_POST['keyword'];
            $_GET['name'] = $_POST['name'];
            $this->assign("keyword", $_POST['keyword']);
        }
        if($_POST['teamleader']) {
            $whereArr['teamleader'] = $_POST['teamleader'];
            $_GET['teamleader'] = $_POST['teamleader'];
            $this->assign("teamleader", $_POST['teamleader']);
        }
        if($_POST['teacher']) {
            $whereArr['teacher'] = $_POST['teacher'];
            $_GET['teacher'] = $_POST['teacher'];
            $this->assign("teacher", $_POST['teacher']);
        }
        if($_POST['country']) {
            $whereArr['applycountry'] = array("like","%".$_POST['country']."%");
            $_GET['country'] = $_POST['country'];
            $this->assign("country", $_POST['country']);
        }
        if($_POST['school']) {
            $whereArr['school'] = array("like","%".$_POST['school']."%");
            $_GET['school'] = $_POST['school'];
            $this->assign("school", $_POST['school']);
        }
        if($_POST['course']) {
            $whereArr['course'] = array("like","%".$_POST['course']."%");
            $_GET['course'] = $_POST['course'];
            $this->assign("course", $_POST['course']);
        }
        if($_GET['start_time']) {
            $whereArr['addtime'] = array("gt",strtotime($_GET['start_time']));
            $_GET['start_time'] = $_GET['start_time'];
            $this->assign("start_time", $_GET['start_time']);
        }
        if($_GET['end_time']) {
            $whereArr['addtime'] = array("lt",strtotime($_GET['end_time']));
            $_GET['end_time'] = $_GET['end_time'];
            $this->assign("end_time", $_GET['end_time']);
        }
        if($_GET['keyword']) {
            $whereArr['name'] = $_GET['keyword'];
            $_GET['name'] = $_GET['name'];
            $this->assign("keyword", $_GET['keyword']);
        }
        if($_GET['teamleader']) {
            $whereArr['teamleader'] = $_GET['teamleader'];
            $_GET['teamleader'] = $_GET['teamleader'];
            $this->assign("teamleader", $_GET['teamleader']);
        }
        if($_GET['teacher']) {
            $whereArr['teacher'] = $_GET['teacher'];
            $_GET['teacher'] = $_GET['teacher'];
            $this->assign("teacher", $_GET['teacher']);
        }
        if($_GET['country']) {
            $whereArr['applycountry'] = array("like","%".$_GET['country']."%");
            $_GET['country'] = $_GET['country'];
            $this->assign("country", $_GET['country']);
        }
        if($_GET['school']) {
            $whereArr['school'] = array("like","%".$_GET['school']."%");
            $_GET['school'] = $_GET['school'];
            $this->assign("school", $_GET['school']);
        }
        if($_GET['course']) {
            $whereArr['course'] = array("like","%".$_GET['course']."%");
            $_GET['course'] = $_GET['course'];
            $this->assign("course", $_GET['course']);
        }
        if($_SESSION['role_id'] == 2) {
            //teamleader
            /*$userid_arr = M("Tl_xs")->field("xsid")->where(array("tlid"=>$_SESSION['ADMIN_ID']))->select();
            foreach($userid_arr as $v) {
                $useridArr[] = $v['xsid']; 
            }
            $useridArr[] = $_SESSION['ADMIN_ID'];*/
            //$whereArr['teamleader'] = $_SESSION['ADMIN_ID'];
            //$whereArr['userid'] = $_SESSION['ADMIN_ID'];
            $whereArr['_complex'] = array(
                'teamleader'=>$_SESSION['ADMIN_ID'],
                'userid'=>$_SESSION['ADMIN_ID'],
                '_logic'=>'or'
            );
        } elseif($_SESSION['role_id'] == 3) {
            //学生管理员
            $whereArr['userid'] = $_SESSION['ADMIN_ID'];
        }
        $count=$this->applystatus_model->where($whereArr)->count();
        $page = $this->page($count, 20);
        $applystatusArr_tmp = $this->applystatus_model
        ->where($whereArr)
        ->order("addtime DESC")
        ->limit($page->firstRow . ',' . $page->listRows)
        ->select();
        //echo $this->applystatus_model->getLastSql();exit;
        $teamleaderArr = $this->getTeamLeader();
        foreach($applystatusArr_tmp as $v) {
            $this->submit_no_arr = C("SUBMIT_NO");
            $this->submit_no2_arr = C("SUBMIT_NO2");
            $this->lanscore_arr = C("LANSCORE");
            $this->applystatus_arr = C("APPLYSTATUS");
            $this->visadata_arr = C("VISADATA");
            $v['teamleader'] = $teamleaderArr[$v['teamleader']];
            $v['applytype'] = $this->applytype_arr[$v['applytype']];
            $v['psstatus'] = $this->done_edit_arr[$v['psstatus']];
            $v['recommendstatus'] = $this->done_edit_arr[$v['recommendstatus']];
            $v['essaystatus'] = $this->done_edit_arr[$v['essaystatus']];
            $v['highschoolscore'] = $this->submit_no_arr[$v['highschoolscore']];
            $v['alevelscore'] = $this->submit_no2_arr[$v['alevelscore']];
            $v['alevelbook'] = $this->submit_no2_arr[$v['alevelbook']];
            $v['lanscore'] = $this->lanscore_arr[$v['lanscore']];
            $v['applystatus'] = $this->applystatus_arr[$v['applystatus']];
            $v['visadata'] = $this->visadata_arr[$v['visadata']];
            $userArr = M("Users")->where(array("id"=>$v['userid']))->find();
            $v['username'] = $userArr['user_login'];
            $applystatusArr[] = $v;
        }
        //print_r($userid_arr);exit;
        //print_r($applystatusArr);exit;
        $this->assign("page", $page->show('Admin'));
        $teamleaderArr = $this->getTeamLeader();
        $this->assign("teamleaderArr",$teamleaderArr);
        $this->assign("formget",$_GET);
        $this->assign("applystatusArr",$applystatusArr);
    }
    private function _lists_export() {
        $whereArr = array();
        if($_POST['start_time']) {
            $whereArr['addtime'] = array("gt",strtotime($_POST['start_time']));
        }
        if($_POST['end_time']) {
            $whereArr['addtime'] = array("lt",strtotime($_POST['end_time']));
        }
        if($_POST['keyword']) {
            $whereArr['name'] = $_POST['keyword'];
        }
        if($_POST['teamleader']) {
            $whereArr['teamleader'] = $_POST['teamleader'];
        }
        if($_POST['teacher']) {
            $whereArr['teacher'] = $_POST['teacher'];
        }
        if($_POST['country']) {
            $whereArr['applycountry'] = array("like","%".$_POST['country']."%");
        }
        if($_POST['school']) {
            $whereArr['school'] = array("like","%".$_POST['school']."%");
        }
        if($_POST['course']) {
            $whereArr['course'] = array("like","%".$_POST['course']."%");
        }
        if($_SESSION['role_id'] == 2) {
            //teamleader
            /*$userid_arr = M("Tl_xs")->field("xsid")->where(array("tlid"=>$_SESSION['ADMIN_ID']))->select();
            foreach($userid_arr as $v) {
                $useridArr[] = $v['xsid']; 
            }
            $useridArr[] = $_SESSION['ADMIN_ID'];*/
            //$whereArr['teamleader'] = $_SESSION['ADMIN_ID'];
            //$whereArr['userid'] = $_SESSION['ADMIN_ID'];
            $whereArr['_complex'] = array(
                'teamleader'=>$_SESSION['ADMIN_ID'],
                'userid'=>$_SESSION['ADMIN_ID'],
                '_logic'=>'or'
            );
        } elseif($_SESSION['role_id'] == 3) {
            //学生管理员
            $whereArr['userid'] = $_SESSION['ADMIN_ID'];
        }
        //$count=$this->applystatus_model->where($whereArr)->count();
        //$page = $this->page($count, 20);
        $applystatusArr_tmp = $this->applystatus_model
        ->where($whereArr)
        ->order("addtime DESC")
        ->select();
        //echo $this->applystatus_model->getLastSql();exit;
        $teamleaderArr = $this->getTeamLeader();
        foreach($applystatusArr_tmp as $v) {
            $this->submit_no_arr = C("SUBMIT_NO");
            $this->submit_no2_arr = C("SUBMIT_NO2");
            $this->lanscore_arr = C("LANSCORE");
            $this->applystatus_arr = C("APPLYSTATUS");
            $this->visadata_arr = C("VISADATA");
            $v['teamleader'] = $teamleaderArr[$v['teamleader']];
            $v['applytype'] = $this->applytype_arr[$v['applytype']];
            $v['psstatus'] = $this->done_edit_arr[$v['psstatus']];
            $v['recommendstatus'] = $this->done_edit_arr[$v['recommendstatus']];
            $v['essaystatus'] = $this->done_edit_arr[$v['essaystatus']];
            $v['highschoolscore'] = $this->submit_no_arr[$v['highschoolscore']];
            $v['alevelscore'] = $this->submit_no2_arr[$v['alevelscore']];
            $v['alevelbook'] = $this->submit_no2_arr[$v['alevelbook']];
            $v['lanscore'] = $this->lanscore_arr[$v['lanscore']];
            $v['applystatus'] = $this->applystatus_arr[$v['applystatus']];
            $v['visadata'] = $this->visadata_arr[$v['visadata']];
            $userArr = M("Users")->where(array("id"=>$v['userid']))->find();
            $v['username'] = $userArr['user_login'];
            $applystatusArr[] = $v;
        }
        //print_r($userid_arr);exit;
        //print_r($applystatusArr);exit;
        $this->assign("applystatusArr",$applystatusArr);
    }
    private function getTeamLeader() {
        //取出teamleader列表
        $role_user_join = C('DB_PREFIX').'role_user as b on u.id =b.user_id';
        $teamleaderArr=M("Users")->alias("u")->join($role_user_join)->where(array("role_id"=>2))->select();
        foreach($teamleaderArr as $v) {
            $teamleaderArr_id[$v['id']] = $v['user_login'];
        }
        return $teamleaderArr_id;
    }
    private function export() {
        //print_r($this->applystatusArr);exit;
        require_once './public/PHPExcel.php';
        $obpe_pro = $obpe->getProperties();
        $obpe_pro->setCreator('midoks')
                 ->setLastModifiedBy('2013/2/16 15:00')
                 ->setTitle('data')
                 ->setSubject('beizhu')
                 ->setDescription('miaoshu')
                 ->setKeywords('keyword')
                 ->setCategory('catagory');
        $obpe->setactivesheetindex(0);
        $obpe->getActiveSheet()->setTitle('申请数据');
        $obpe->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $obpe->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $title = array('username'=>'添加人','name'=>'学生','teacher'=>'负责老师','teamleader'=>'Teamleader','applycountry'=>'申请国家','applytype'=>'申请类型','school'=>'院校','course'=>'课程','psstatus'=>'PS状态','recommendstatus'=>'推荐信状态','essaystatus'=>'essay状态','highschoolscore'=>'高中平日成绩','alevelscore'=>'Alevel成绩单','alevelbook'=>'Alevel证书','lanscore'=>'语言成绩','applystatus'=>'申请状态','visadata'=>'签证材料');
        $arr = $this->applystatusArr;
        array_unshift($arr,$title);
        $obpe->getActiveSheet()->getColumnDimension('B')->setWidth(10);
        $obpe->getActiveSheet()->getColumnDimension('C')->setWidth(10);
        $obpe->getActiveSheet()->getColumnDimension('D')->setWidth(12);
        $obpe->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $obpe->getActiveSheet()->getColumnDimension('J')->setWidth(15);
        $obpe->getActiveSheet()->getColumnDimension('K')->setWidth(15);
        $obpe->getActiveSheet()->getColumnDimension('L')->setWidth(15);
        $obpe->getActiveSheet()->getColumnDimension('M')->setWidth(15);
        $obpe->getActiveSheet()->getColumnDimension('N')->setWidth(15);
        $obpe->getActiveSheet()->getColumnDimension('O')->setWidth(15);
        $obpe->getActiveSheet()->getColumnDimension('P')->setWidth(20);
        foreach($arr as $k=>$v){
            $k = $k+1;
            $obpe->getactivesheet()->setcellvalue('A'.$k, $v['username']);
            $obpe->getactivesheet()->setcellvalue('B'.$k, $v['name']);
            $obpe->getactivesheet()->setcellvalue('C'.$k, $v['teacher']);
            $obpe->getactivesheet()->setcellvalue('D'.$k, $v['teamleader']);
            $obpe->getactivesheet()->setcellvalue('E'.$k, $v['applycountry']);
            $obpe->getactivesheet()->setcellvalue('F'.$k, $v['applytype']);
            $obpe->getactivesheet()->setcellvalue('G'.$k, $v['school']);
            $obpe->getactivesheet()->setcellvalue('H'.$k, $v['course']);
            $obpe->getactivesheet()->setcellvalue('I'.$k, $v['psstatus']);
            $obpe->getactivesheet()->setcellvalue('J'.$k, $v['recommendstatus']);
            $obpe->getactivesheet()->setcellvalue('K'.$k, $v['essaystatus']);
            $obpe->getactivesheet()->setcellvalue('L'.$k, $v['highschoolscore']);
            $obpe->getactivesheet()->setcellvalue('M'.$k, $v['alevelscore']);
            $obpe->getactivesheet()->setcellvalue('N'.$k, $v['alevelbook']);
            $obpe->getactivesheet()->setcellvalue('O'.$k, $v['lanscore']);
            $obpe->getactivesheet()->setcellvalue('P'.$k, $v['applystatus']);
            $obpe->getactivesheet()->setcellvalue('Q'.$k, $v['visadata']);
        }
        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
        header('Content-Type:application/force-download');
        header('Content-Type:application/vnd.ms-execl');
        header('Content-Type:application/octet-stream');
        header('Content-Type:application/download');
        header("Content-Disposition:attachment;filename='".date("Y年m月d日")."申请数据.xls'");
        header('Content-Transfer-Encoding:binary');
        $obwrite->save('php://output');
    }
}