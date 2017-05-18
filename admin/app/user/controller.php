<?php
/**
 * 会员控制器
 */
class UserController extends Controller 
{
    // 构造函数，自动新建对象
    public function  __construct()
    {
        $this->css('content.css');
        $this->js(array('common.js','time/WdatePicker.js'));
    }
    
    
    public function runsql1(){
        die('run..........');
        $sql = "SELECT uid,id FROM `{$this->App->prefix()}user_tuijian_fx` ORDER BY id ASC LIMIT 0,1200";
        $rt = $this->App->find($sql);
        if(!empty($rt))foreach($rt as $k=>$row){
            
            //更改关系的
            $uid = $row['uid'];
            if($uid > 0){
                //标记当前用户所有下级为该代理会员
                
                $this->App->update('user_tuijian',array('daili_uid'=>$uid),'uid',$uid);
                
                //加入代理关系表
                $this->update_user_tree($uid,$uid);
                
                $this->update_daili_tree($uid);//更新代理关系
                
            }
        }
        echo $k;
        echo "run........";
    }
    
    public function runsql2(){
        //die('run..........');
        $sql = "SELECT order_sn,order_id ,user_id,add_time FROM `{$this->App->prefix()}goods_order_info` ORDER BY order_id ASC LIMIT 0,1200";
        $rt = $this->App->find($sql);
        if(!empty($rt))foreach($rt as $k=>$row){
        
            //检查返佣
            $this->pay_successs_tatus2($row['order_sn'],$row['add_time']);
            
        }
        echo $k;
        echo "run........";
    }
    
    public function runsql3(){
        //die('run..........');
        $sql = "SELECT order_sn,order_id ,user_id FROM `{$this->App->prefix()}goods_order_info` ORDER BY order_id ASC LIMIT 0,1200";
        $rt = $this->App->find($sql);
        if(!empty($rt))foreach($rt as $k=>$row){
            //订单关系更正
            $uid = $row['user_id'];
            if($uid > 0){
                $sql = "SELECT daili_uid FROM `{$this->App->prefix()}user_tuijian` WHERE uid = '$uid'";
                $duid = $this->App->findvar($sql);
                
                $dd = array();
                if($duid!=$uid){ //是上一级代理
                    $dd['parent_uid'] = $duid;
                    $dd['daili_uid'] = $duid;
                    $sql = "SELECT * FROM `{$this->App->prefix()}user_tuijian_fx` WHERE uid = '$duid'";
                    $rr = $this->App->findrow($sql);
                    if(!empty($rr)){
                        //$dd['parent_uid'] = $rr['p1_uid'];
                        $dd['parent_uid2'] = $rr['p1_uid'];
                        $dd['parent_uid3'] = $rr['p2_uid'];
                    }
                    
                    //$this->App->update('goods_order_info',$dd,'order_id',$row['order_id']);
                }else{
                    $sql = "SELECT * FROM `{$this->App->prefix()}user_tuijian_fx` WHERE uid = '$uid'";
                    $rr = $this->App->findrow($sql);
                    if(!empty($rr)){
                        $dd['daili_uid'] = $rr['p1_uid'];
                        $dd['parent_uid'] = $rr['p1_uid'];
                        $dd['parent_uid2'] = $rr['p2_uid'];
                        $dd['parent_uid3'] = $rr['p3_uid'];
                    }
                }
                if(!empty($dd)){
                    $this->App->update('goods_order_info',$dd,'order_id',$row['order_id']);
                }
            }
            
        }
        echo $k;
        echo "run........";
    }
    
    public function runsql4(){
        //die('run..........');
        $sql = "SELECT uid,id FROM `{$this->App->prefix()}user_tuijian_fx` ORDER BY id ASC LIMIT 0,1200";
        $rt = $this->App->find($sql);
        if(!empty($rt))foreach($rt as $k=>$row){
            $uid = $row['uid'];
            if($uid>0) $this->App->update('user',array('mymoney'=>'0.00','money_ucount'=>'0.00'),'user_id',$uid);
            
        }
        echo $k;
        echo "run........";
    }
    
    //商家列表
    public function shoplist($data=array()){
        $this->css('jquery_dialog.css');
        $this->js(array('jquery_dialog.js'));
         //排序
        $orderby = "";
        if(isset($_GET['desc'])){
                  $orderby = ' ORDER BY u.'.$_GET['desc'].' DESC';
        }else if(isset($_GET['asc'])){
                  $orderby = ' ORDER BY u.'.$_GET['asc'].' ASC';
        }else {
                  $orderby = ' ORDER BY u.`user_id` DESC';
        }
        //分页
        $page= isset($_GET['page']) ? $_GET['page'] : '';
        if(empty($page)){
                  $page = 1;
        }
        //条件
        $w = "WHERE l.lid='10'";
        if(isset($_GET['keyword'])&&$_GET['keyword']){
                  $w .= " AND u.user_name LIKE '%".trim($_GET['keyword'])."%' OR u.email LIKE '%".trim($_GET['keyword'])."%' OR u.birthday LIKE '%".trim($_GET['keyword'])."%' OR u.nickname LIKE '%".trim($_GET['keyword'])."%'";
        }
        $list = 10;
        $start = ($page-1)*$list;
        $sql = "SELECT COUNT(u.user_id) FROM `{$this->App->prefix()}user` AS u LEFT JOIN `{$this->App->prefix()}user_level` AS l ON u.user_rank = l.lid $w";
        $tt = $this->App->findvar($sql);
        $pagelink = Import::basic()->getpage($tt, $list, $page,'?page=',true);
        $this->set("pagelink",$pagelink);

        $sql = "SELECT u.*,l.level_name,l.discount FROM `{$this->App->prefix()}user` AS u LEFT JOIN `{$this->App->prefix()}user_level` AS l ON u.user_rank = l.lid $w $orderby LIMIT $start,$list";
        $this->set('userlist',$this->App->find($sql));
        $this->template('shoplist');
    }
    
    //商家信息
    public function shopinfo($rr=array()){
        $uid = isset($rr['id']) ? $rr['id'] : 0;
        $rt['userinfo'] = array();
        $rt['province'] = $this->get_regions(1);  //获取省列表

        if(isset($_POST)&&!empty($_POST)){

            $consignee_ = array('consignee'=>'0');
            $province_ = array('province'=>'0');
            $city_ = array('city'=>'0');
            $district_ = array('district'=>'0');
            $town_ = array('town'=>'0');
            $village_ = array('village'=>'0');

            $address_ = array('address'=>'0');
            $zipcode_ = array('zipcode'=>'0');
            $dd = array();
            if(isset($_POST['consignee'])){
                    $dd['consignee'] = $_POST['consignee'];
                    $_POST = array_diff_key($_POST,$consignee_);
            }
            if(isset($_POST['province'])){
                    $dd['province'] = $_POST['province'];
                    $_POST = array_diff_key($_POST,$province_);
            }
            if(isset($_POST['city'])){
                    $dd['city'] = $_POST['city'];
                    $_POST = array_diff_key($_POST,$city_);
            }
            if(isset($_POST['district'])){
                    $dd['district'] = $_POST['district'];
                    $_POST = array_diff_key($_POST,$district_);
            }
            if(isset($_POST['town'])){
                    $dd['town'] = $_POST['town'];
                    $_POST = array_diff_key($_POST,$town_);
            }
            if(isset($_POST['village'])){
                    $dd['village'] = $_POST['village'];
                    $_POST = array_diff_key($_POST,$village_);
            }
            if(isset($_POST['address'])){
                    $dd['address'] = $_POST['address'];
                    $_POST = array_diff_key($_POST,$address_);
            }
            if(isset($_POST['zipcode'])){
                    $dd['zipcode'] = $_POST['zipcode'];
                    $_POST = array_diff_key($_POST,$zipcode_);
            }
            if($_POST['user_rank']!='1'){ $_POST['is_salesmen']='2'; }else{ $_POST['is_salesmen']='0'; }
            $dd['user_id'] = $uid;
            $dd['country'] = 1;
            $dd['email'] = $_POST['email'];
            $dd['sex'] = $_POST['sex'];
            $dd['is_own'] = 1;
            $sql = "SELECT address_id FROM `{$this->App->prefix()}user_address` WHERE user_id='$uid' AND is_own='1' LIMIT 1";
            $rsid = $this->App->findvar($sql);

            //更新地址表
            if(empty($rsid)){ //添加
                $this->App->insert('user_address',$dd);
            }else{ //更新
                $this->App->update('user_address',$dd,'address_id',$rsid);
            }
            unset($dd);
        }

        if($uid>0){ //编辑操作
              if(isset($_POST)&&!empty($_POST)){
                     if(empty($_POST['mobile_phone'])){
                        echo'<script>alert("手机号码不能为空！");</script>';
                     }else{
                        $sql = "SELECT user_id FROM `{$this->App->prefix()}user` WHERE user_name='$_POST[mobile_phone]' AND user_id='$uid' LIMIT 1";
                        $rs = $this->App->findvar($sql);
                        
                        if(!empty($rs)){
                                echo'<script> alert("该商家名称已经存在了！"); </script>';
                        }else{
                                if(empty($_POST['password'])){
                                    $po = array_diff_assoc($_POST,array('password'=>$_POST['password']));
                                    unset($_POST);
                                    $_POST = $po;
                                    unset($po);
                                }else{ //如果密码不为空就更新
                                    $_POST['password'] = trim(md5($_POST['password']));
                                }


                                $this->App->update('user',$_POST,'user_id',$uid);

                                $this->action('system','add_admin_log','修改商家信息:'.$_POST['user_name']);
                                $this->action('common','showdiv',$this->getthisurl());
                        }
                     } // end if
                } // end post

                //用户信息
                $sql = "SELECT * FROM `{$this->App->prefix()}user` WHERE user_id='{$uid}' LIMIT 1";
                $rt['userinfo'] = $this->App->findrow($sql);
                //
                $sql = "SELECT * FROM `{$this->App->prefix()}user_address` WHERE user_id='$uid' AND is_own='1' LIMIT 1";
                $rt['userress'] = $this->App->findrow($sql);

                $rt['city'] = $this->get_regions(2,$rt['userress']['province']);  //城市
                $rt['district'] = $this->get_regions(3,$rt['userress']['city']);  //区
                $rt['town'] = $this->get_regions(4,$rt['userress']['district']);
                $rt['village'] = $this->get_regions(5,$rt['userress']['town']);
                
                $this->set('type','edit');
        }else{ //添加操作
                    if(isset($_POST)&&!empty($_POST)){
                         if(empty($_POST['mobile_phone'])){
                             echo'<script>alert("手机号码不能为空！");</script>';
                         }else{
                             $sql = "SELECT user_id FROM `{$this->App->prefix()}user` WHERE user_name='$_POST[mobile_phone]' LIMIT 1";
                             $rs = $this->App->findvar($sql);
                             if(!empty($rs)){
                                  echo'<script> alert("该商家名称已经存在了！"); </script>';
                             }else{
                                 $_POST['password'] = trim(md5($_POST['password']));
                                 $_POST['reg_time'] = time();
                                 $_POST['active'] = 1;
                                 $this->App->insert('user',$_POST);
                                 $this->action('system','add_admin_log','添加商家:'.$_POST['user_name']);
                                 $this->action('common','showdiv',$this->getthisurl());
                             }
                         }
                    }
                 $this->set('type','add');
        }
        //用户级别
        $sql = "SELECT `level_name`,`lid` FROM `{$this->App->prefix()}user_level` WHERE is_show = '1' AND lid='10' ORDER BY lid ASC";
        $rt['userinfo']['user_jibie'] = $this->App->find($sql);

        $this->set('rt',$rt);

        $this->template('shopinfo');

    }


    public function format_price($price=0){
        if(empty($price)) return '0.00';
        return number_format($price, 2, '.', '');
    }

    //返佣金
    public function pay_successs_tatus2($order_sn='',$time=''){
        @set_time_limit(300); //最大运行时间
        //购买用户返积分
        $sql = "SELECT cid FROM `{$this->App->prefix()}user_point_change` WHERE order_sn='$order_sn'"; //资金
        $cid = $this->App->findvar($sql);
        $tt = 'true';
        if($cid > 0){
                $tt = 'false';
                //return;
        }   
        //上三级返佣金
        
        //送佣金，找出推荐用户
        $pu = $this->App->findrow("SELECT user_id,daili_uid,parent_uid,parent_uid2,parent_uid3,goods_amount,order_amount,order_sn,pay_status,order_id FROM `{$this->App->prefix()}goods_order_info` WHERE order_sn='$order_sn' LIMIT 1");
        $parent_uid = isset($pu['parent_uid']) ? $pu['parent_uid'] : 0; //一级
        $parent_uid2 = isset($pu['parent_uid2']) ? $pu['parent_uid2'] : 0; //二级
        $parent_uid3 = isset($pu['parent_uid3']) ? $pu['parent_uid3'] : 0; //三级

        $parent_uid4 = $this->return_daili_uid($parent_uid3);

        $aParentIds = array($parent_uid, $parent_uid2, $parent_uid3, $parent_uid4);
        $sTeamIds = implode(',', $aParentIds);
        //获取四人的团队积累和
        $fTeamSum = $this->App->findvar("SELECT sum(person_buy_sum) as team_sum FROM `{$this->App->prefix()}user` WHERE user_id in ($sTeamIds) LIMIT 1");
        //获得第三级的个人积累
        $fPersonSum = $this->App->findvar("SELECT person_buy_sum FROM `{$this->App->prefix()}user` WHERE user_id = {$parent_uid3} LIMIT 1");
        $user_id = isset($pu['user_id']) ? $pu['user_id'] : 0; //分享者
        
/*      if($parent_uid>0){
            $sql = "SELECT p1_uid,p2_uid,p3_uid FROM `{$this->App->prefix()}user_tuijian_fx` WHERE uid = '$parent_uid'";
            $rr = $this->App->findrow($sql);
            if($parent_uid==$user_id){
                $parent_uid = isset($rr['p1_uid']) ? $rr['p1_uid'] : 0; //分享者
                $parent_uid2 = isset($rr['p2_uid']) ? $rr['p2_uid'] : 0; //分享者
                $parent_uid3 = isset($rr['p3_uid']) ? $rr['p3_uid'] : 0; //分享者
            }else{
                $parent_uid2 = isset($rr['p1_uid']) ? $rr['p1_uid'] : 0; //分享者
                $parent_uid3 = isset($rr['p2_uid']) ? $rr['p2_uid'] : 0; //分享者
            }
            //if($parent_uid>0) $this->App->update('user',array('mymoney'=>'0.00','money_ucount'=>'0.00'),'user_id',$parent_uid);
            //if($parent_uid2>0) $$this->App->update('user',array('mymoney'=>'0.00','money_ucount'=>'0.00'),'user_id',$parent_uid2);
            //if($parent_uid3>0) $$this->App->update('user',array('mymoney'=>'0.00','money_ucount'=>'0.00'),'user_id',$parent_uid3);
        }*/
        
        $daili_uid = isset($pu['daili_uid']) ? $pu['daili_uid'] : 0; //代理
        $moeyss = isset($pu['order_amount']) ? $pu['order_amount'] : 0; //实际消费
        $uid = isset($pu['user_id']) ? $pu['user_id'] : 0;
        $pay_status = isset($pu['pay_status']) ? $pu['pay_status'] : 0;
        
        $order_id = isset($pu['order_id']) ? $pu['order_id'] : 0;
        
        if(!empty($order_sn)){
            
            $sql = "SELECT * FROM `{$this->App->prefix()}userconfig` LIMIT 1";//用户配置信息
            $rts = $this->App->findrow($sql);
                        
            //购物者送积分
/*          if($pay_status=='1' && $tt=='true'){//支付了的
                $pointnum =  $rts['pointnum'];
                if($pointnum > 0 && !empty($moeyss)){
                        $points = intval($moeyss * $pointnum);
                        $thismonth = date('Y-m-d',$time);
                        //购买者送积分
                        $sql = "UPDATE `{$this->App->prefix()}user` SET `points_ucount` = `points_ucount`+$points,`mypoints` = `mypoints`+$points WHERE user_id = '$uid'";
                        $this->App->query($sql);
                        $this->App->insert('user_point_change',array('order_sn'=>$order_sn,'thismonth'=>$thismonth,'points'=>$points,'changedesc'=>'消费返积分','time'=>time(),'uid'=>$uid));
                }
            }*/
            
            $sql = "SELECT cid FROM `{$this->App->prefix()}user_money_change` WHERE order_sn='$order_sn' AND uid = '$parent_uid' AND uid!='0'"; //资金
            $cid = $this->App->findvar($sql);
            $tt = 'true';
            if($cid > 0){
                    $tt = 'false';
                    //return;
            }   
            $sql ="Select userbonus From `{$this->App->prefix()}userconfig` LIMIT 1";
            $userbonus = $this->App->findvar($sql);
            //一级返佣金
            if($parent_uid > 0 && $tt=='true' && $userbonus == 0){
                $sql = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id='$parent_uid' LIMIT 1";
                $rank = $this->App->findvar($sql);
                if($rank != '1'){ //不是普通会员
                    $sql = "SELECT types FROM `{$this->App->prefix()}user` WHERE user_id='$parent_uid' LIMIT 1";
                    $types = $this->App->findvar($sql);
                    
                    $off = 0;
                    if($types=='1'){ //全职
                        if($rts['ticheng360_1'] < 101 && $rts['ticheng360_1'] > 0){
                            $off = $rts['ticheng360_1']/100;
                        }
                    }else{
                        if($rank=='12'){ //普通分销商
                            $rts['ticheng180_1'] = intval($rts['ticheng180_1_1']*$rts['ticheng180_1_2']/100);
                            if($rts['ticheng180_1'] < 101 && $rts['ticheng180_1'] > 0){
                                $off = $rts['ticheng180_1']/100;
                            }
                        }elseif($rank=='11'){//高级分销商
                            if($rts['ticheng180_h1_1'] < 101 && $rts['ticheng180_h1_1'] > 0){
                                $off = $rts['ticheng180_h1_1']/100;
                            }
                        }elseif($rank=='10'){//特权分销商
                            if($rts['ticheng180_h2_1'] < 101 && $rts['ticheng180_h2_1'] > 0){
                                $off = $rts['ticheng180_h2_1']/100;
                            }
                        }
                        
                    }
                    $moeys = $this->format_price($moeyss*$off);
                    if(!empty($moeys)){
                        $record['puid1_money'] = $moeys;
                        $record['p_uid1'] = $parent_uid;
                        $thismonth = date('Y-m-d',$time);
                        $thism = date('Y-m',$time);
                        if($pay_status=='1'){//支付了的
                            $sql = "UPDATE `{$this->App->prefix()}user` SET `money_ucount` = `money_ucount`+$moeys,`mymoney` = `mymoney`+$moeys WHERE user_id = '$parent_uid'";
                            $this->App->query($sql);
                            $this->App->insert('user_money_change',array('buyuid'=>$uid,'order_sn'=>$order_sn,'thismonth'=>$thismonth,'thism'=>$thism,'money'=>$moeys,'changedesc'=>'购买商品返佣金','time'=>$time,'uid'=>$parent_uid));
                        }
                        $this->App->insert('user_money_change_cache',array('buyuid'=>$uid,'order_sn'=>$order_sn,'thismonth'=>$thismonth,'thism'=>$thism,'money'=>$moeys,'changedesc'=>'购买商品返佣金','time'=>$time,'uid'=>$parent_uid));
                    }
                }
                $this->writeLog(__FILE__ . "|uid:{$uid}| 1 level | money:" . $moeys . "|ticheng:" . $off . '|rank:' . $rank . '|parent_id:' . $parent_uid);
            }
            
            $sql = "SELECT cid FROM `{$this->App->prefix()}user_money_change` WHERE order_sn='$order_sn' AND uid = '$parent_uid2' AND uid!='0'"; //资金
            $cid = $this->App->findvar($sql);
            $tt = 'true';
            if($cid > 0){
                    $tt = 'false';
                    //return;
            }   
            //二级返佣金
            if($parent_uid2 > 0 && $tt=='true'  && $userbonus == 0){
                $sql = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id='$parent_uid2' LIMIT 1";
                $rank = $this->App->findvar($sql);
                if($rank != '1'){ //不是普通会员
                    $sql = "SELECT types FROM `{$this->App->prefix()}user` WHERE user_id='$parent_uid2' LIMIT 1";
                    $types = $this->App->findvar($sql);
                    
                    $off = 0;
                    if($types=='1'){ //全职
                        if($rts['ticheng360_2'] < 101 && $rts['ticheng360_2'] > 0){
                            $off = $rts['ticheng360_2']/100;
                        }
                    }else{
                        if($rank=='12'){ //普通分销商
                            $rts['ticheng180_2'] = intval($rts['ticheng180_2_1']*$rts['ticheng180_2_2']/100);
                            if($rts['ticheng180_2'] < 101 && $rts['ticheng180_2'] > 0){
                                $off = $rts['ticheng180_2']/100;
                            }
                        }elseif($rank=='11'){//高级分销商
                            if($rts['ticheng180_h1_2'] < 101 && $rts['ticheng180_h1_2'] > 0){
                                $off = $rts['ticheng180_h1_2']/100;
                            }
                        }elseif($rank=='10'){//特权分销商
                            if($rts['ticheng180_h2_2'] < 101 && $rts['ticheng180_h2_2'] > 0){
                                $off = $rts['ticheng180_h2_2']/100;
                            }
                        }
                        
                    }
                    $moeys = $this->format_price($moeyss*$off);
                    if(!empty($moeys)){
                        $record['puid2_money'] = $moeys;
                        $record['p_uid2'] = $parent_uid2;
                        $thismonth = date('Y-m-d',$time);
                        $thism = date('Y-m',$time);
                        if($pay_status=='1'){//支付了的
                            $sql = "UPDATE `{$this->App->prefix()}user` SET `money_ucount` = `money_ucount`+$moeys,`mymoney` = `mymoney`+$moeys WHERE user_id = '$parent_uid2'";
                            $this->App->query($sql);
                        
                            $this->App->insert('user_money_change',array('buyuid'=>$uid,'order_sn'=>$order_sn,'thismonth'=>$thismonth,'thism'=>$thism,'money'=>$moeys,'changedesc'=>'购买商品返佣金','time'=>$time,'uid'=>$parent_uid2));
                        }
                        $this->App->insert('user_money_change_cache',array('buyuid'=>$uid,'order_sn'=>$order_sn,'thismonth'=>$thismonth,'thism'=>$thism,'money'=>$moeys,'changedesc'=>'购买商品返佣金','time'=>$time,'uid'=>$parent_uid2));
                    }
                }
                $this->writeLog(__FILE__ . "|uid:{$uid}| 2 level | money:" . $moeys . "|ticheng:" . $off . '|rank:' . $rank . '|parent_id:' . $parent_uid2);
            }
            
            $sql = "SELECT cid FROM `{$this->App->prefix()}user_money_change` WHERE order_sn='$order_sn' AND uid = '$parent_uid3' AND uid!='0'"; //资金
            $cid = $this->App->findvar($sql);
            $tt = 'true';
            if($cid > 0){
                    $tt = 'false';
                    //return;
            }   
            //三级返佣金
            if($parent_uid3 > 0 && $tt=='true'  && $userbonus == 0){
                $sql = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id='$parent_uid3' LIMIT 1";
                $rank = $this->App->findvar($sql);
                if($rank != '1'){ //不是普通会员
                    $sql = "SELECT types FROM `{$this->App->prefix()}user` WHERE user_id='$parent_uid3' LIMIT 1";
                    $types = $this->App->findvar($sql);
                    
                    $off = 0;
                    if($types=='1'){ //全职
                        if($rts['ticheng360_3'] < 101 && $rts['ticheng360_3'] > 0){
                            $off = $rts['ticheng360_3']/100;
                        }
                    }else{
                        if($rank=='12'){ //普通分销商
                            if( floatval($rts['person_accumulative_money']) > 0 && floatval($fPersonSum) >= floatval($rts['person_accumulative_money']) ){
                                $rts['ticheng180_3'] = intval($rts['ticheng180_3_1']*$rts['ticheng180_3_2']/100);
                                if($rts['ticheng180_3'] < 101 && $rts['ticheng180_3'] > 0){
                                    $off = $rts['ticheng180_3']/100;
                                }
                            }
                        }elseif($rank=='11'){//高级分销商
                            if($rts['ticheng180_h1_3'] < 101 && $rts['ticheng180_h1_3'] > 0){
                                $off = $rts['ticheng180_h1_3']/100;
                            }
                        }elseif($rank=='10'){//特权分销商
                            if($rts['ticheng180_h2_3'] < 101 && $rts['ticheng180_h2_3'] > 0){
                                $off = $rts['ticheng180_h2_3']/100;
                            }
                        }
                        
                    }
                    $moeys = $this->format_price($moeyss*$off);
                    if(!empty($moeys)){
                        $record['puid3_money'] = $moeys;
                        $record['p_uid3'] = $parent_uid3;
                        $thismonth = date('Y-m-d',$time);
                        $thism = date('Y-m',$time);
                        if($pay_status=='1'){//支付了的
                            $sql = "UPDATE `{$this->App->prefix()}user` SET `money_ucount` = `money_ucount`+$moeys,`mymoney` = `mymoney`+$moeys WHERE user_id = '$parent_uid3'";
                            $this->App->query($sql);
                        
                            $this->App->insert('user_money_change',array('buyuid'=>$uid,'order_sn'=>$order_sn,'thismonth'=>$thismonth,'thism'=>$thism,'money'=>$moeys,'changedesc'=>'购买商品返佣金','time'=>$time,'uid'=>$parent_uid3));
                        }
                        $this->App->insert('user_money_change_cache',array('buyuid'=>$uid,'order_sn'=>$order_sn,'thismonth'=>$thismonth,'thism'=>$thism,'money'=>$moeys,'changedesc'=>'购买商品返佣金','time'=>$time,'uid'=>$parent_uid3));
                    }
                }
                $this->writeLog(__FILE__ . "|uid:{$uid}| 3 level | money:" . $moeys . "|ticheng:" . $off . '|rank:' . $rank . '|parent_id:' . $parent_uid3);
            }//end of if uid3

             //四级返佣金
            if($parent_uid4 > 0 && $tt=='true'  && $userbonus == 0){
                $sql = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id='$parent_uid4' LIMIT 1";
                $rank = $this->App->findvar($sql);
                if($rank != '1'){ //不是普通会员
                    $sql = "SELECT types FROM `{$this->App->prefix()}user` WHERE user_id='$parent_uid4' LIMIT 1";
                    $types = $this->App->findvar($sql);
                    
                    $off = 0;

                    if($rank=='12'){ //普通分销商
                         if( floatval($rts['team_accumulative_money']) > 0 && floatval($fTeamSum) >= floatval($rts['team_accumulative_money']) ){
                            $rts['ticheng180_4'] = intval($rts['ticheng180_4_1']*$rts['ticheng180_4_2']/100);
                            if($rts['ticheng180_4'] < 101 && $rts['ticheng180_4'] > 0){
                                $off = $rts['ticheng180_4']/100;
                            }
                        }
                    }

                    $moeys = $this->format_price($moeyss*$off);
                    if(!empty($moeys)){
                        $record['puid4_money'] = $moeys;
                        $record['p_uid4'] = $parent_uid4;
                        $thismonth = date('Y-m-d',$time);
                        $thism = date('Y-m',$time);
                        if($pay_status=='1'){//支付了的
                            $sql = "UPDATE `{$this->App->prefix()}user` SET `money_ucount` = `money_ucount`+$moeys,`mymoney` = `mymoney`+$moeys WHERE user_id = '$parent_uid4'";
                            $this->App->query($sql);
                        
                            $this->App->insert('user_money_change',array('buyuid'=>$uid,'order_sn'=>$order_sn,'thismonth'=>$thismonth,'thism'=>$thism,'money'=>$moeys,'changedesc'=>'购买商品返佣金','time'=>$time,'uid'=>$parent_uid4));
                        }
                        $this->App->insert('user_money_change_cache',array('buyuid'=>$uid,'order_sn'=>$order_sn,'thismonth'=>$thismonth,'thism'=>$thism,'money'=>$moeys,'changedesc'=>'购买商品返佣金','time'=>$time,'uid'=>$parent_uid4));
                    }
                }
                $this->writeLog(__FILE__ . "|uid:{$uid}| 4 level | money:" . $moeys . "|ticheng:" . $off . '|rank:' . $rank . '|parent_id:' . $parent_uid4);
            }//end of if uid4
        }
    }
    /**********************************************/
    
    //用户二维码
    public function usererweima(){
        $img = isset($_GET['img']) ? trim($_GET['img']) : '';
        if(!empty($img)){
            unlink($img);
//          $pattern = '/\\'.DS.'qcode\\'.DS.'(.*?)\\'.DS.'.+?\.jpg/i';
//          preg_match($pattern, $img,$match);
//          $uid = $match[1];
//          if( intval($uid) > 0){
//           $this->App->update('user',array('quid'=>0),'user_id',$uid);
//          }
            $this->jump(ADMIN_URL.'user.php?type=usererweima',0,'已成功删除，请从新生成');
            exit;
        }
        
        $yuming = str_replace(array('www','.',),'',$_SERVER["HTTP_HOST"]);
    
                    
        $key = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
        $w = !empty($key) ? "AND nickname LIKE '%$key%'" : '';
         //分页
        $page= isset($_GET['page']) ? $_GET['page'] : '';
        if(empty($page)){
               $page = 1;
        }
        $list = 30;
        $start = ($page-1)*$list;
        $sql = "SELECT COUNT(user_id) FROM `{$this->App->prefix()}user` WHERE quid>0 $w";
        $tt = $this->App->findvar($sql);
        $pagelink = Import::basic()->getpage($tt, $list, $page,'?page=',true);
        $this->set("pagelink",$pagelink);
        
        $sql = "SELECT quid,nickname,user_id FROM `{$this->App->prefix()}user` WHERE quid>0 $w ORDER BY user_id DESC LIMIT $start,$list";
        $rt = $this->App->find($sql);
        if(!empty($rt))foreach($rt as $k=>$row){
            $uid = $row['user_id'];
            $quid = $row['quid'];
            $rt[$k] = $row;
            $rt[$k]['img'] = SITE_URL.'photos/'.$yuming.'/qcode/'.$uid.'/ms'.$quid.'.jpg';
            $rt[$k]['path'] = SYS_PATH.'photos'.DS.$yuming.DS.'qcode'.DS.$uid.DS.'ms'.$quid.'.jpg';
        }
        
        $this->set('rt',$rt);
        $this->template('usererweima');
    }
    
    // 提款申请
    public function drawmoney()
    {
        $uname = trim( $_GET['uname'] );
        
        $field = 'tb1.uid,tb1.money,tb1.addtime,tb1.paytime,tb1.state,tb1.id,tb1.mobile,tb1.wallet_id,tb2.bankname,tb2.bankaddress,tb2.uname,tb2.banksn';
        $sql = "SELECT {$field} FROM `{$this->App->prefix()}user_drawmoney` AS tb1 
                LEFT JOIN `{$this->App->prefix()}user_bank` AS tb2 
                ON tb2.uid = tb1.uid";
        if ( $uname != '' )
        {
            $condition = " WHERE tb2.uname LIKE '%{$uname}%'";
            $sql .= $condition;
        }        
        $sql .= " ORDER BY tb1.addtime DESC";
        $rt = $this->App->find( $sql );

        /* 钱包列表 */
        $this->set( 'wallet_list', $this->_get_wallet() );
        $this->set( 'rt', $rt );
        $this->template( 'daili_drawmoney' );
    }
    
    public function ajax_confirm_drawmoney( $data = array() ) {
        $id = $data['id'];
        if ( $id > 0 ) {
            $dd= array();
            $dd['paytime'] = time();
            $dd['state'] = '1';
            if($this->App->update('user_drawmoney',$dd,'id',$id)){
               $row = $this->App->findrow("Select * from `{$this->App->prefix()}user_drawmoney` where id = '{$id}'");
               var_dump($this->action('sms','sms_yssend',array('tel'=>$row['mobile'],'name'=>$row['uname'],'price'=>$row['money'],'cardid'=>$row['banksn'],'type'=>'tmp_cash')));
            }
        }
    }
    //用户分享统计
    public function usershare(){
        $this->template('usershare');
    }

    //用户积分统计
    public function userjifen($data=array()){
        $id= isset($data['id']) ? $data['id'] : '0';
        
        if($id > 0){
            if($this->App->delete('user_point_change','cid',$id)){
                $this->jump(ADMIN_URL.'user.php?type=userjifen');exit;
            }
        }
        
         //分页
        $page= isset($_GET['page']) ? $_GET['page'] : '';
        if(empty($page)){
               $page = 1;
        }
        $list = 30;
        $start = ($page-1)*$list;
        $sql = "SELECT COUNT(cid) FROM `{$this->App->prefix()}user_point_change`";
        $tt = $this->App->findvar($sql);
        $pagelink = Import::basic()->getpage($tt, $list, $page,'?page=',true);
        $this->set("pagelink",$pagelink);
            
        $sql = "SELECT u.nickname,us.* FROM `{$this->App->prefix()}user_point_change` AS us LEFT JOIN `{$this->App->prefix()}user` AS u ON u.user_id = us.uid ORDER BY us.cid DESC LIMIT $start,$list";
        $rt = $this->App->find($sql);
        $this->set("rt",$rt);
        
        $this->template('userjifen');
    }


    //取消代理
    public function ajax_quxiao_daili($data=array()){
        $uid = $data['uid'];
        $this->App->update('user',array('user_rank'=>'1'),'user_id',$uid);
        exit;
    }

    //代理申请列表
    public function dailiapply(){
         //排序
        $orderby = "";
        if(isset($_GET['desc'])){
                  $orderby = ' ORDER BY u.'.$_GET['desc'].' DESC';
        }else if(isset($_GET['asc'])){
                  $orderby = ' ORDER BY u.'.$_GET['asc'].' ASC';
        }else {
                  $orderby = ' ORDER BY u.`user_id` DESC';
        }
        //分页
        $page= isset($_GET['page']) ? $_GET['page'] : '';
        if(empty($page)){
            $page = 1;
        }
        //条件
        $w = "WHERE u.user_rank='1' AND u.is_salesmen='1'";
        $list = 10;
        $start = ($page-1)*$list;
        $sql = "SELECT COUNT(u.user_id) FROM `{$this->App->prefix()}user` AS u LEFT JOIN `{$this->App->prefix()}user_level` AS l ON u.user_rank = l.lid $w";
        $tt = $this->App->findvar($sql);
        $pagelink = Import::basic()->getpage($tt, $list, $page,'?page=',true);
        $this->set("pagelink",$pagelink);

        $sql = "SELECT u.*,l.level_name,l.discount FROM `{$this->App->prefix()}user` AS u LEFT JOIN `{$this->App->prefix()}user_level` AS l ON u.user_rank = l.lid $w $orderby LIMIT $start,$list";
        $this->set('userlist',$this->App->find($sql));

        $this->template('dailiapply');
    }
    
    /*****************开通代理************************/
    public function ajax_kaitong_daili($data=array()){
        @set_time_limit(300); //最大运行时间
        $uid = $data['uid'];
        if($uid > 0){
            //标记当前用户所有下级为该代理会员
            
            //$this->App->update('user_tuijian',array('daili_uid'=>$uid),'uid',$uid);
            
            //加入代理关系表
            $this->update_user_tree($uid,$uid);
            
            $this->update_daili_tree($uid);//更新代理关系
            
            echo "1";
        }else{
            //错误
            echo "2";
        }
        exit;
    }

    function writeLog($message){
        $message = 'time: ' . date('Y-m-d H:i:s') . '|' . $message;
        file_put_contents('/wwwroot/custom_fenxiao/huahai.log_' . date('Y-m-d'), $message . PHP_EOL, FILE_APPEND);
    }
    
    public function return_daili_uid($uid=0,$k=0){
        if(!($uid > 0)){
            return 0;
        }
        $puid = 0;
        //for($i=0;$i<20;$i++){
        if($k<20){
                $sql = "SELECT parent_uid FROM `{$this->App->prefix()}user_tuijian` WHERE uid = '$uid' LIMIT 1";
                $puid = $this->App->findvar($sql);
                $sql = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id = '$puid' LIMIT 1";
                $rank = $this->App->findvar($sql);
                if($rank == '1'){
                    ++$k;
                    $this->return_daili_uid($puid,$k);
                }else{
                    return $puid;
                }
        }
        //}
        return $puid;
    }
    
    public function update_daili_tree($uid=0){
        if($uid>0){
            $dd = array();
            $ss = array();
            $ss[] = $uid;
            $dd['uid'] = $uid;
            $dd['p1_uid'] = 0;
            $dd['p2_uid'] = 0;
            $dd['p3_uid'] = 0;
            
            $p1_uid = $this->return_daili_uid($uid);
        
            if($p1_uid > 0 && !in_array($p1_uid,$ss)){
                $dd['p1_uid'] = $p1_uid;
                $p2_uid = $this->return_daili_uid($p1_uid);
                $ss[] = $p1_uid;
                $ss[] = $uid;
                if($p2_uid > 0 && !in_array($p2_uid,$ss)){
                    $dd['p2_uid'] = $p2_uid;
                    $p3_uid = $this->return_daili_uid($p2_uid);
                    $ss[] = $p2_uid;
                    if($p3_uid > 0 && !in_array($p3_uid,$ss)){
                        $dd['p3_uid'] = $p3_uid;
                        $ss[] = $p3_uid;
                        $p4_uid = $this->return_daili_uid($p3_uid);
                        if($p4_uid > 0 && !in_array($p4_uid,$ss)){
                            $dd['p4_uid'] = $p4_uid;
                            $ss[] = $p4_uid;
                        }
                    }
                }
            }
            
            $sql = "SELECT id FROM `{$this->App->prefix()}user_tuijian_fx` WHERE uid='$uid' LIMIT 1";
            $id = $this->App->findvar($sql);
            
            if($id > 0){
                $this->App->update('user_tuijian_fx',$dd,'id',$id);
            }else{
                $this->App->insert('user_tuijian_fx',$dd);
            }

            //$uid的下属都需要修改user_tuijian_fx的信息
            $sql = "SELECT id FROM `{$this->App->prefix()}user_tuijian_fx` WHERE p1_uid='$uid'";
            $aIdRows = $this->App->find($sql);
            $aIds = [];
            foreach ($aIdRows as $aOneRow) {
                $aIds[] = intval($aOneRow['id']);
            }
            $sId = implode(",", $aIds);
            $sUpdateSql = "update `{$this->App->prefix()}user_tuijian_fx` set p2_uid = {$p1_uid}, p3_uid={$p2_uid} where id in ({$sId})";
            $bIsSuccess = $this->App->query($sUpdateSql);
            $this->writeLog("update is sucess:" . $bIsSuccess . '| update sql:' . $sUpdateSql);

            $sql = "SELECT id FROM `{$this->App->prefix()}user_tuijian_fx` WHERE p2_uid='$uid'";
            $aIdRows = $this->App->find($sql);
            $aIds = [];
            foreach ($aIdRows as $aOneRow) {
                $aIds[] = intval($aOneRow['id']);
            }
            $sId = implode(",", $aIds);
            $sUpdateSql = "update `{$this->App->prefix()}user_tuijian_fx` set p3_uid={$p1_uid} where id in ({$sId})";
            $bIsSuccess = $this->App->query($sUpdateSql);
            $this->writeLog("update is sucess2:" . $bIsSuccess . '| update sql:' . $sUpdateSql);
        }
    }
    
    public function update_user_tree($puid = 0,$ppuid=0)
    {
        $three_arr = array();
        $sql = 'SELECT id,uid FROM `'.$this->App->prefix()."user_tuijian` WHERE parent_uid = '$puid'";
        $rt = $this->App->find($sql);
        if(!empty($rt))foreach($rt as $row){
            $id = $row['id'];
            $uid = $row['uid'];//
            //更新
            if($id > 0){
                $this->App->update('user_tuijian',array('daili_uid'=>$ppuid),'id',$id);
            }
            //判断当前是否是代理
            $sql = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id='$uid' LIMIT 1";
            $rank = $this->App->findvar($sql);
            if($rank=='1'){ //普通会员
                $this->update_user_tree($uid,$ppuid);
            }else{
/*              $kuds = $this->kud;
                ++$kuds;
                $this->kud = $kuds;
                
                $this->update_daili_tree($uid); //代理
                $this->uids[$kuds][$uid] = $uid;*/
            }
        }
    }

    
    /***************************************/
    
    public function dailiapplyinfo($data=array()){
        $uid = isset($data['id']) ? $data['id'] : 0;
        $rt['userinfo'] = array();
        $rt['province'] = $this->get_regions(1);  //获取省列表

        if(isset($_POST)&&!empty($_POST)){

            $consignee_ = array('consignee'=>'0');
            $province_ = array('province'=>'0');
            $city_ = array('city'=>'0');
            $district_ = array('district'=>'0');

            $address_ = array('address'=>'0');
            //$zipcode_ = array('zipcode'=>'0');
            $dd = array();
            if(isset($_POST['consignee'])){
                    $dd['consignee'] = $_POST['consignee'];
                    $_POST = array_diff_key($_POST,$consignee_);
            }
            if(isset($_POST['province'])){
                    $dd['province'] = $_POST['province'];
                    $_POST = array_diff_key($_POST,$province_);
            }
            if(isset($_POST['city'])){
                    $dd['city'] = $_POST['city'];
                    $_POST = array_diff_key($_POST,$city_);
            }
            if(isset($_POST['district'])){
                    $dd['district'] = $_POST['district'];
                    $_POST = array_diff_key($_POST,$district_);
            }

            if(isset($_POST['address'])){
                    $dd['address'] = $_POST['address'];
                    $_POST = array_diff_key($_POST,$address_);
            }
            if(isset($_POST['zipcode'])){
                    $dd['zipcode'] = $_POST['zipcode'];
                    $_POST = array_diff_key($_POST,$zipcode_);
            }
            $dd['user_id'] = $uid;
            $dd['country'] = 1;
            $dd['is_own'] = 1;
            $sql = "SELECT address_id FROM `{$this->App->prefix()}user_address` WHERE user_id='$uid' AND is_own='1' LIMIT 1";
            $rsid = $this->App->findvar($sql);

            //更新地址表
            if(empty($rsid)){ //添加
                $this->App->insert('user_address',$dd);
            }else{ //更新
                $this->App->update('user_address',$dd,'address_id',$rsid);
            }
            unset($dd);
        }

        if($uid>0){ //编辑操作
              if(isset($_POST)&&!empty($_POST)){
                     if(empty($_POST['mobile_phone'])){
                         echo'<script>alert("登录帐号不能为空！");</script>';
                     }else{
                        $sql = "SELECT user_id FROM `{$this->App->prefix()}user` WHERE mobile_phone='$_POST[mobile_phone]' LIMIT 1";
                        $rs = $this->App->findvar($sql);

                        if(!empty($rs)&&$rs!=$uid){
                                echo'<script> alert("该用户名称已经存在了！"); </script>';
                        }else{

                                if(empty($_POST['password'])){
                                    $po = array_diff_assoc($_POST,array('password'=>$_POST['password']));
                                    unset($_POST);
                                    $_POST = $po;
                                    unset($po);
                                }else{ //如果密码不为空就更新
                                    $_POST['password'] = trim(md5($_POST['password']));
                                }

                                //$_POST['user_rank'] = 10;
                                $_POST['is_salesmen'] = 2;
                                if($this->App->update('user',$_POST,'user_id',$uid)){
                                    $id = $this->App->findvar("SELECT id FROM `{$this->App->prefix()}user_tuijian` WHERE uid='$uid' LIMIT 1");
                                    if($id > 0){
                                        $this->App->update('user_tuijian',array('daili_uid'=>$uid),'id',$id);
                                    }else{
                                        //添加
                                        $this->App->insert('user_tuijian',array('daili_uid'=>$uid,'uid'=>$uid,'addtime'=>time()));
                                    }
                                    $this->jump('',0,'已经成功开通');exit;
                                }
                        }

                     } // end if
                } // end post

                //用户信息
                $sql = "SELECT * FROM `{$this->App->prefix()}user` WHERE user_id='{$uid}' LIMIT 1";
                $rt['userinfo'] = $this->App->findrow($sql);
                //
                $sql = "SELECT * FROM `{$this->App->prefix()}user_address` WHERE user_id='$uid' AND is_own='1' LIMIT 1";
                $rt['userress'] = $this->App->findrow($sql);

                $rt['city'] = $this->get_regions(2,$rt['userress']['province']);  //城市
                $rt['district'] = $this->get_regions(3,$rt['userress']['city']);  //区
                $this->set('type','edit');
        }else{ //添加操作

        }
        //用户级别
        $sql = "SELECT `level_name`,`lid` FROM `{$this->App->prefix()}user_level` WHERE is_show = '1' ORDER BY lid ASC";
        $rt['userinfo']['user_jibie'] = $this->App->find($sql);

        $this->set('rt',$rt);
        $this->template('dailiapplyinfo');
    }

    //会员基本设置
    public function userset(){
        $sql = "SELECT * FROM `{$this->App->prefix()}userconfig` LIMIT 1";
        $rt = $this->App->findrow($sql);
        if(!empty($_POST)){
            if(empty($rt)){
                    $this->App->insert('userconfig',$_POST);
                    $this->action('common','showdiv',$this->getthisurl());
                    $rt = $_POST;
            }else{
                    $this->App->update('userconfig',$_POST,'type','basic');
                    $this->action('common','showdiv',$this->getthisurl());
                    $rt = $_POST;
            }
        }
        $this->set('rt',$rt);
        $this->template('userset');
    }

    //代理基本设置
    public function dailiset(){
        $sql = "SELECT * FROM `{$this->App->prefix()}userconfig` LIMIT 1";
        $rt = $this->App->findrow($sql);
        if(!empty($_POST)){
            if(empty($rt)){
                    $this->App->insert('userconfig',$_POST);
                    $this->action('common','showdiv',$this->getthisurl());
                    $rt = $_POST;
            }else{
                    $this->App->update('userconfig',$_POST,'type','basic');
                    $this->action('common','showdiv',$this->getthisurl());
                    $rt = $_POST;
            }
        }
        $this->set('rt',$rt);
        $this->template('dailiset');
    }

    //高级分销商客户订单
    public function dailiorder($data=array()){
        $this->template('dailiorder');
    }
    
    //添加代理第一步
    public function infodaili_step1($data=array()){
         //排序
        $orderby = "";
        if(isset($_GET['desc'])){
                  $orderby = ' ORDER BY u.'.$_GET['desc'].' DESC';
        }else if(isset($_GET['asc'])){
                  $orderby = ' ORDER BY u.'.$_GET['asc'].' ASC';
        }else {
                  $orderby = ' ORDER BY u.`user_id` DESC';
        }
        //分页
        $page= isset($_GET['page']) ? $_GET['page'] : '';
        if(empty($page)){
                  $page = 1;
        }
        //条件
        $w = "WHERE l.lid='1'";
        if(isset($_GET['keyword'])&&$_GET['keyword'])
                    $w .= " AND u.user_name LIKE '%".trim($_GET['keyword'])."%' OR u.email LIKE '%".trim($_GET['keyword'])."%' OR u.birthday LIKE '%".trim($_GET['keyword'])."%' OR u.nickname LIKE '%".trim($_GET['keyword'])."%'";
        $list = 10;
        $start = ($page-1)*$list;
        $sql = "SELECT COUNT(u.user_id) FROM `{$this->App->prefix()}user` AS u LEFT JOIN `{$this->App->prefix()}user_level` AS l ON u.user_rank = l.lid $w";
        $tt = $this->App->findvar($sql);
        $pagelink = Import::basic()->getpage($tt, $list, $page,'?page=',true);
        $this->set("pagelink",$pagelink);

        $sql = "SELECT u.*,l.level_name,l.discount FROM `{$this->App->prefix()}user` AS u LEFT JOIN `{$this->App->prefix()}user_level` AS l ON u.user_rank = l.lid $w $orderby LIMIT $start,$list";
        $this->set('userlist',$this->App->find($sql));

        $this->template('infodaili_step1');
    }

    //
    public function infodaili($data=array()){
        $uid = isset($data['id']) ? $data['id'] : 0;
        $rt['userinfo'] = array();
        $rt['province'] = $this->get_regions(1);  //获取省列表

        if(isset($_POST)&&!empty($_POST)){

            $consignee_ = array('consignee'=>'0');
            $province_ = array('province'=>'0');
            $city_ = array('city'=>'0');
            $district_ = array('district'=>'0');

            $address_ = array('address'=>'0');
            $zipcode_ = array('zipcode'=>'0');
            $dd = array();
            if(isset($_POST['consignee'])){
                    $dd['consignee'] = $_POST['consignee'];
                    $_POST = array_diff_key($_POST,$consignee_);
            }
            if(isset($_POST['province'])){
                    $dd['province'] = $_POST['province'];
                    $_POST = array_diff_key($_POST,$province_);
            }
            if(isset($_POST['city'])){
                    $dd['city'] = $_POST['city'];
                    $_POST = array_diff_key($_POST,$city_);
            }
            if(isset($_POST['district'])){
                    $dd['district'] = $_POST['district'];
                    $_POST = array_diff_key($_POST,$district_);
            }

            if(isset($_POST['address'])){
                    $dd['address'] = $_POST['address'];
                    $_POST = array_diff_key($_POST,$address_);
            }
            if(isset($_POST['zipcode'])){
                    $dd['zipcode'] = $_POST['zipcode'];
                    $_POST = array_diff_key($_POST,$zipcode_);
            }
            $dd['user_id'] = $uid;
            $dd['country'] = 1;
            $dd['is_own'] = 1;
            $sql = "SELECT address_id FROM `{$this->App->prefix()}user_address` WHERE user_id='$uid' AND is_own='1' LIMIT 1";
            $rsid = $this->App->findvar($sql);

            //更新地址表
            if(empty($rsid)){ //添加
                $this->App->insert('user_address',$dd);
            }else{ //更新
                $this->App->update('user_address',$dd,'address_id',$rsid);
            }
            unset($dd);
        }

        if($uid>0){ //编辑操作
              if(isset($_POST)&&!empty($_POST)){
                     if(empty($_POST['nickname'])){
                         echo'<script>alert("昵称不能为空！");</script>';
                     }elseif(empty($_POST['mobile_phone'])){
                         echo'<script>alert("登录帐号不能为空！");</script>';
                     }else{
                        $sql = "SELECT user_id FROM `{$this->App->prefix()}user` WHERE mobile_phone='$_POST[mobile_phone]' LIMIT 1";
                        $rs = $this->App->findvar($sql);

                        if(!empty($rs)&&$rs!=$uid){
                                echo'<script> alert("该用户名称已经存在了！"); </script>';
                        }else{

                                if(empty($_POST['password'])){
                                    $po = array_diff_assoc($_POST,array('password'=>$_POST['password']));
                                    unset($_POST);
                                    $_POST = $po;
                                    unset($po);
                                }else{ //如果密码不为空就更新
                                    $_POST['password'] = trim(md5($_POST['password']));
                                }

                                $_POST['is_salesmen'] = 2;
                                $_POST['user_rank'] = 10;
                                if($this->App->update('user',$_POST,'user_id',$uid)){
                                    //
                                    $id = $this->App->findvar("SELECT id FROM `{$this->App->prefix()}user_tuijian` WHERE uid='$uid' LIMIT 1");
                                    //$id = isset($rts['id']) ? $rts['id'] : 0;
                                    //$parent_uid = isset($rts['parent_uid']) ? $rts['parent_uid'] : 0;
                                    //$share_uid = isset($rts['share_uid']) ? $rts['share_uid'] : 0;
                                    if($id > 0){
                                        $this->App->update('user_tuijian',array('daili_uid'=>$uid),'id',$id);
                                    }else{
                                        //添加
                                        $this->App->insert('user_tuijian',array('daili_uid'=>$uid,'uid'=>$uid,'addtime'=>time()));
                                    }
                                    $this->jump(ADMIN_URL.'user.php?type=suppliers',0,'已经成功开通');exit;
                                }

                                //$this->action('system','add_admin_log','修改会员信息:'.$_POST['user_name']);
                                //$this->action('common','showdiv',$this->getthisurl());
                        }

                     } // end if
                } // end post

                //用户信息
                $sql = "SELECT * FROM `{$this->App->prefix()}user` WHERE user_id='{$uid}' LIMIT 1";
                $rt['userinfo'] = $this->App->findrow($sql);
                //
                $sql = "SELECT * FROM `{$this->App->prefix()}user_address` WHERE user_id='$uid' AND is_own='1' LIMIT 1";
                $rt['userress'] = $this->App->findrow($sql);

                $rt['city'] = $this->get_regions(2,$rt['userress']['province']);  //城市
                $rt['district'] = $this->get_regions(3,$rt['userress']['city']);  //区
                $this->set('type','edit');
        }else{ //添加操作
                if(isset($_POST)&&!empty($_POST)){
                         if(empty($_POST['nickname'])){
                             echo'<script>alert("昵称不能为空！");</script>';
                         }elseif(empty($_POST['mobile_phone'])){
                             echo'<script>alert("登录帐号不能为空！");</script>';
                         }else{
                             $sql = "SELECT user_id FROM `{$this->App->prefix()}user` WHERE mobile_phone='$_POST[mobile_phone]' LIMIT 1";
                             $rs = $this->App->findvar($sql);
                             if(!empty($rs)){
                                  echo'<script> alert("该登录帐号已经存在了！"); </script>';
                             }else{
                                 $_POST['password'] = trim(md5($_POST['password']));
                                 $_POST['reg_time'] = time();
                                 $_POST['active'] = 1;
                                 $_POST['is_salesmen'] = 2;
                                 $this->App->insert('user',$_POST);
                                 $this->action('system','add_admin_log','添加会员:'.$_POST['user_name']);
                                 $this->action('common','showdiv',$this->getthisurl());
                             }
                         }
                 }
                 $this->set('type','add');
        }
        //用户级别
        $sql = "SELECT `level_name`,`lid` FROM `{$this->App->prefix()}user_level` WHERE is_show = '1' ORDER BY lid ASC";
        $rt['userinfo']['user_jibie'] = $this->App->find($sql);

        $this->set('rt',$rt);
        $rank = $this->Session->read('User.rank');

        $this->template('infodaili');

    }

    //邀请好友列表
    public function yaoqing( $data=array() ){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        if ( $id > 0 ) {
            $this->App->delete( 'user_tuijian', 'id', $id );
            $uid = $this->App->findvar("SELECT uid FROM `{$this->App->prefix()}user_tuijian` WHERE id='$id' LIMIT 1");
            if ( $uid > 0 ) {
                $this->App->delete('user_tuijian_fx','uid',$uid);
            }
            $this->jump(ADMIN_URL.'user.php?type=yaoqing');
            exit;
        }
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        if(!($page>0)) $page = 1;
        $list = 100;
        $start = ($page-1)*$list;

        $key = isset($data['keyword']) ? $data['keyword'] : '';
        $w = "";
        if(!empty($key)){
            $w = "WHERE tb2.nickname LIKE '%$key%' OR tb2.mobile_phone LIKE '%$key%'";
        }

        //$sql = "SELECT COUNT(id) FROM `{$this->App->prefix()}user_tuijian` $w";
        $sql = "SELECT COUNT(tb1.id) FROM `{$this->App->prefix()}user_tuijian` AS tb1 LEFT JOIN `{$this->App->prefix()}user` AS tb2 ON tb1.uid = tb2.user_id $w";
        $tt = $this->App->findvar($sql);
        $import_obj = new Import();
        $pagelink = $import_obj->basic()->getpage($tt, $list, $page,'?page=',true);
        $this->set("pagelink",$pagelink);

        $sql = "SELECT tb1.*,tb2.nickname,tb3.nickname AS pname,tb2.is_subscribe,tb2.subscribe_time,tb2.user_rank FROM `{$this->App->prefix()}user_tuijian` AS tb1 ";
        $sql .= "LEFT JOIN `{$this->App->prefix()}user` AS tb2 ON tb1.uid = tb2.user_id ";
        $sql .= "LEFT JOIN `{$this->App->prefix()}user` AS tb3 ON tb1.parent_uid = tb3.user_id ";
        $sql .= "$w ORDER BY tb1.id DESC LIMIT $start,$list";
        $lists = $this->App->find($sql);
        $this->set('lists',$lists);
        
        /*$listss = $this->App->find("SELECT points_ucount,user_id FROM `{$this->App->prefix()}user` ORDER BY points_ucount DESC LIMIT 500");
        foreach($listss as $row){
            $points_ucount = $row['points_ucount'];
            $uid = $row['user_id'];
            if($points_ucount > 0){
                $this->App->update('user',array('mypoints'=>$points_ucount),'user_id',$uid);
            }
        }
        foreach($lists as $row){
            $duid = $row['daili_uid'];
            //$puid = $row['parent_uid'];
            if(!($duid>0)){
                $uid = $row['uid'];
                $puid = $this->App->findvar("SELECT parent_uid FROM `{$this->App->prefix()}user_tuijian` WHERE uid='$uid'");
                if($puid > 0){
                    $duid = $this->App->findvar("SELECT daili_uid FROM `{$this->App->prefix()}user_tuijian` WHERE uid='$puid'");
                    if($duid > 0){
                        $this->App->update('user_tuijian',array('daili_uid'=>$duid),'id',$row['id']);
                    }else{
                        //$ppuid = $this->App->findvar("SELECT parent_uid FROM `{$this->App->prefix()}user_tuijian` WHERE uid='$puid'");
                        
                    }
                }
                //$rank = $this->App->findvar("SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id='$puid'");
                //if($rank=='10'){
                    //$this->App->update('user_tuijian',array('daili_uid'=>$puid),'id',$row['id']);
                //}
            }
            $id = $row['id'];
            if(!($duid > 0)){
                $puid = $row['daili_uid'];
                $id = $this->App->findvar("SELECT user_id FROM `{$this->App->prefix()}user` WHERE user_id='$puid'");
                if(!($id>0)){
                    $this->App->delete('user_tuijian','id',$id);
                }
                if($puid  > 0){
                    $rank = $this->App->findvar("SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id='$puid'");
                    if($rank=='10'){
                        $this->App->update('user_tuijian',array('daili_uid'=>$puid),'id',$row['id']);
                    }else{
                        
                    }
                }
                $ddrt = $this->App->findrow("SELECT daili_uid,parent_uid FROM `{$this->App->prefix()}user_tuijian` WHERE uid='$puid' LIMIT 1");
                $dduid = $ddrt['daili_uid'];
                $ppuid = $ddrt['parent_uid'];
                if($dduid > 0){
                    $this->App->update('user_tuijian',array('daili_uid'=>$dduid),'id',$row['id']);
                }else{
                    if($ppuid > 0){
                        $ddrt = $this->App->findrow("SELECT daili_uid,parent_uid FROM `{$this->App->prefix()}user_tuijian` WHERE uid='$ppuid' LIMIT 1");
                        $dduid = $ddrt['daili_uid'];
                        $ppuid = $ddrt['parent_uid'];
                        if($dduid > 0){
                            $this->App->update('user_tuijian',array('daili_uid'=>$dduid),'id',$row['id']);
                        }else{
                            if($ppuid > 0){
                                $ddrt = $this->App->findrow("SELECT daili_uid,parent_uid FROM `{$this->App->prefix()}user_tuijian` WHERE uid='$ppuid' LIMIT 1");
                                $dduid = $ddrt['daili_uid'];
                                $ppuid = $ddrt['parent_uid'];
                                if($dduid > 0){
                                    $this->App->update('user_tuijian',array('daili_uid'=>$dduid),'id',$row['id']);
                                }
                            }
                        }
                    }
                }

            }
        }*/
        
        $this->template('yaoqing');
    }
    public function yaoqingids($data=array()){
        $ids = $data['ids'];
        if(!empty($ids)){
            $uid = explode('-',$ids);
            $sql = "SELECT tb1.uid,tb1.id,tb2.nickname FROM `{$this->App->prefix()}user_tuijian` AS tb1 LEFT JOIN `{$this->App->prefix()}user` AS tb2 ON tb1.uid = tb2.user_id WHERE id IN(".implode(',',$uid).")";
            $this->set('lists',$this->App->find($sql));
            $this->template('yaoqingids');
        }
    }
    public function ajax_get_zhuanyiuser($data=array()){
        $keys = $data['keys'];
        if(empty($keys)) die("");
        $sql = "SELECT nickname,user_id FROM `{$this->App->prefix()}user` WHERE nickname LIKE '%$keys%' OR mobile_phone LIKE '%$keys%' LIMIT 10";
        $rt = $this->App->find($sql);
        $str = '';
        if(!empty($rt))foreach($rt as $row){
            $na = $row['nickname'];
            $uid = $row['user_id'];
            $str .= ' <option value="'.$uid.'">'.(empty($na) ? '未知'.$uid : $na).'</option>';
        }else{
            $str = '<option value="0">选择用户</option>';
        }
        echo $str; exit;
    }
    
    //关系转移
    public function ajax_confirm_zhuanyi($data=array()){
        $ids   = $data['ids'];
        $touid = $data['touid'];
        if ( !($touid > 0) ) {
            echo "请选择转移到的目标用户"; exit;
        }
        $uids = explode( '-', $ids );
        if ( ! empty( $uids ) )
        {
            foreach ( $uids as $id ) 
            {
              if ( $id > 0 ) {
                // 查找推荐表 的信息  获得 父级id，分享者id，代理id
                $sql = "SELECT * FROM `{$this->App->prefix()}user_tuijian` WHERE id='$id' LIMIT 1";
                $rts = $this->App->findrow($sql);
                $parent_uid = $rts['parent_uid'];
                $share_uid  = $rts['share_uid'];
                $daili_uid  = $rts['daili_uid'];
                $uid = $rts['uid'];
                $is_subscribe = $this->App->findvar("SELECT is_subscribe FROM `{$this->App->prefix()}user` WHERE user_id='$uid' LIMIT 1");

                if ( $daili_uid > 0 ) {
                    if ( $is_subscribe == '1' ) {
                        $sql = "UPDATE `{$this->App->prefix()}user` SET `share_ucount` = `share_ucount`-1,`guanzhu_ucount` = `guanzhu_ucount`-1 WHERE user_id = '$daili_uid'";
                        $this->App->query($sql);

                        $sql = "UPDATE `{$this->App->prefix()}user` SET `share_ucount` = `share_ucount`+1,`guanzhu_ucount` = `guanzhu_ucount`+1 WHERE user_id = '$touid'";
                        $this->App->query($sql);

                    } else {
                        $sql = "UPDATE `{$this->App->prefix()}user` SET `share_ucount` = `share_ucount`-1 WHERE user_id = '$daili_uid'";
                        $this->App->query($sql);
                        $sql = "UPDATE `{$this->App->prefix()}user` SET `share_ucount` = `share_ucount`+1 WHERE user_id = '$touid'";
                        $this->App->query($sql);
                    }

                }/*else{
                    if($is_subscribe=='1'){
                        $sql = "UPDATE `{$this->App->prefix()}user` SET `share_ucount` = `share_ucount`-1 WHERE user_id = '$share_uid'";
                        $this->App->query($sql);

                        $sql = "UPDATE `{$this->App->prefix()}user` SET `guanzhu_ucount` = `guanzhu_ucount`-1 WHERE user_id = '$parent_uid'";
                        $this->App->query($sql);

                        $sql = "UPDATE `{$this->App->prefix()}user` SET `share_ucount` = `share_ucount`+1,`guanzhu_ucount` = `guanzhu_ucount`+1 WHERE user_id = '$touid'";
                        $this->App->query($sql);

                    }else{
                        $sql = "UPDATE `{$this->App->prefix()}user` SET `share_ucount` = `share_ucount`-1 WHERE user_id = '$share_uid'";
                        $this->App->query($sql);

                        $sql = "UPDATE `{$this->App->prefix()}user` SET `share_ucount` = `share_ucount`-1 WHERE user_id = '$parent_uid'";
                        $this->App->query($sql);

                        $sql = "UPDATE `{$this->App->prefix()}user` SET `share_ucount` = `share_ucount`+1 WHERE user_id = '$touid'";
                        $this->App->query($sql);
                    }
                }*/
                $dd = array();
                $dd['daili_uid'] = $touid;
                /*if(!($share_uid>0)) */$dd['share_uid'] = $touid;
                /*if(!($parent_uid>0)) */$dd['parent_uid'] = $touid;
                //$dd['share_uid'] = $touid;
                $this->App->update( 'user_tuijian', $dd, 'id', $id );
                
                if ( $uid > 0 ) {
                    $rank = $this->App->findvar("SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id = '$uid' LIMIT 1");
                    if ( $rank != '1' ) {      
                        // 更新代理关系  应该查找 _fx  表  把 p1_uid  p2_uid p3_uid 更新                  
                        $this->update_daili_tree( $uid );//更新代理关系                            
                    }
                }
            }
          }  
        } 
        else
        {
            echo "转移用户没有选择"; exit;
        }
        echo "转移成功"; exit;
    }

    public function dailiuser($data=array()){
        $this->template('dailiuser');
    }
    //代理推荐
    public function dailituijian($data=array()){
        $this->template('dailituijian');
    }
    //分享统计
    public function sharetongji($data=array()){
        $id= isset($_GET['id']) ? $_GET['id'] : '';
        
        if($id > 0){
            if($this->App->delete('user_share','id',$id)){
                $this->jump(ADMIN_URL.'user.php?type=sharetongji');exit;
            }
        }
        
         //分页
        $page= isset($_GET['page']) ? $_GET['page'] : '';
        if(empty($page)){
               $page = 1;
        }
        $list = 30;
        $start = ($page-1)*$list;
        $sql = "SELECT COUNT(id) FROM `{$this->App->prefix()}user_share`";
        $tt = $this->App->findvar($sql);
        $pagelink = Import::basic()->getpage($tt, $list, $page,'?page=',true);
        $this->set("pagelink",$pagelink);
            
        $sql = "SELECT u.nickname,us.* FROM `{$this->App->prefix()}user_share` AS us LEFT JOIN `{$this->App->prefix()}user` AS u ON u.user_id = us.uid ORDER BY us.id DESC LIMIT $start,$list";
        $rt = $this->App->find($sql);
        $this->set("rt",$rt);
        
        $this->template('sharetongji');
    }
    //销量统计
    public function saletongji($data=array()){
        $this->template('saletongji');
    }
    //开通发货申请列表
    public function fahuoapply($data=array()){
        $this->template('fahuoapply');
    }
    //分红记录
    public function dailifenhong($data=array()){
        $this->template('dailifenhong');
    }
    
    // 资金记录
    public function usermoney( $data=array() ) 
    {
        $id = isset($data['id']) ? $data['id'] : '0';
        
        if ( $id > 0 ) 
        {
            if ( $this->App->delete( 'user_money_change', 'cid', $id ) ) 
            {
                $this->jump( ADMIN_URL.'user.php?type=usermoney' );
            }
        }

        /* 搜索条件 Start */
        $condition = '';
        if ( trim( $_GET['nickname'] ) != '' )
        {
            $nickname = trim( $_GET['nickname'] );
            $condition .= " WHERE u.nickname LIKE '%{$nickname}%'";
        }
        /* 搜索条件 End */

        // 分页
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $list = 30;
        $start = ( $page - 1 ) * $list;
        $sql = "SELECT COUNT(cid) FROM `{$this->App->prefix()}user_money_change`";
        $tt = $this->App->findvar( $sql );
        $import_obj = new Import();
        $pagelink = $import_obj->basic()->getpage( $tt, $list, $page, '?page=', true );
        $this->set( 'pagelink', $pagelink );
        
        if ( $condition )
        {
            $sql = "SELECT
                        u.nickname,
                        us.*, uto.nickname AS toname
                    FROM
                        `{$this->App->prefix()}user_money_change` AS us
                    LEFT JOIN `{$this->App->prefix()}user` AS u ON u.user_id = us.uid
                    LEFT JOIN `{$this->App->prefix()}user` AS uto ON uto.user_id = us.buyuid
                    {$condition}
                    ORDER BY
                        us.cid DESC
                    LIMIT $start, $list";
        }
        else
        {
            $sql = "SELECT
                        u.nickname,
                        us.*, uto.nickname AS toname
                    FROM
                        `{$this->App->prefix()}user_money_change` AS us
                    LEFT JOIN `{$this->App->prefix()}user` AS u ON u.user_id = us.uid
                    LEFT JOIN `{$this->App->prefix()}user` AS uto ON uto.user_id = us.buyuid
                    ORDER BY
                        us.cid DESC
                    LIMIT $start, $list";
        }
        
        $rt = $this->App->find( $sql );

        $this->set( 'rt', $rt );        
        $this->template( 'usermoney' );
    }
    
    // 会员的多级关系
    public function userrelate( $data = array() ) 
    {
        $page = isset( $_GET['page'] ) ? $_GET['page'] : 1;
        if ( ! ( $page > 0 ) ) $page = 1;
        $list  = 100;
        $start = ($page - 1) * $list;

        $key = isset( $data['keyword'] ) ? $data['keyword'] : '';
        $w = "";
        if ( ! empty( $key ) ) {
            $w = "WHERE tb2.nickname LIKE '%$key%' OR tb2.mobile_phone LIKE '%$key%'";
        }

        $sql = "SELECT COUNT(tb1.id) FROM `{$this->App->prefix()}user_tuijian` AS tb1 LEFT JOIN `{$this->App->prefix()}user` AS tb2 ON tb1.uid = tb2.user_id $w";
        $tt = $this->App->findvar( $sql );
        $import_obj = new Import();
        $pagelink = $import_obj->basic()->getpage( $tt, $list, $page, '?page=', true );
        $this->set( "pagelink", $pagelink );

        $sql = "SELECT tb1.*,tb2.subscribe_time,tb2.reg_time,tb2.nickname,tb2.headimgurl,tb2.money_ucount,tb2.points_ucount,tb2.share_ucount,tb2.guanzhu_ucount,tb2.is_subscribe FROM `{$this->App->prefix()}user_tuijian` AS tb1";
        $sql .=" LEFT JOIN `{$this->App->prefix()}user` AS tb2 ON tb1.uid = tb2.user_id";
        $sql .=" $w ORDER BY tb1.parent_uid ASC,tb2.money_ucount DESC,tb2.share_ucount DESC,tb1.id ASC LIMIT $start, $list";
        $lists = $this->App->find( $sql );
        if ( ! empty( $lists ) )
        {
            foreach ( $lists as $k => $row )
            {
                $uid = $row['uid'];
                $lists[$k] = $row;
                $sql = "SELECT COUNT(id) FROM `{$this->App->prefix()}user_tuijian` WHERE  uid !='$uid' AND parent_uid = '$uid' LIMIT 1";
                $lists[$k]['zcount'] = $this->App->findvar( $sql );
            }
        }
        $this->set( 'lists', $lists );
        $this->template( 'userrelate' );
    }
    
    public function userrelate_own($data=array()){
        $uid = $data['id'];
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        if(!($page>0)) $page = 1;
        $list = 50;
        $start = ($page-1)*$list;

        $sql = "SELECT COUNT(tb1.id) FROM `{$this->App->prefix()}user_tuijian` AS tb1";
        $sql .=" LEFT JOIN `{$this->App->prefix()}user` AS tb2 ON tb1.uid = tb2.user_id";
        $sql .=" WHERE tb1.parent_uid = '$uid'";
        $tt = $this->App->findvar($sql);
        $pagelink = Import::basic()->getpage($tt, $list, $page,'?page=',true);
        $this->set("pagelink",$pagelink);
        
        $sql = "SELECT tb1.*,tb2.subscribe_time,tb2.reg_time,tb2.nickname,tb2.headimgurl,tb2.money_ucount,tb2.points_ucount,tb2.share_ucount,tb2.guanzhu_ucount,tb2.is_subscribe FROM `{$this->App->prefix()}user_tuijian` AS tb1";
        $sql .=" LEFT JOIN `{$this->App->prefix()}user` AS tb2 ON tb1.uid = tb2.user_id";
        $sql .=" WHERE tb1.parent_uid = '$uid' ORDER BY tb2.money_ucount DESC,tb2.share_ucount DESC,tb1.id DESC LIMIT $start,$list";
        
        $lists = $this->App->find($sql);
        if(!empty($lists))foreach($lists as $k=>$row){
            $uid2 = $row['uid'];
            $lists[$k] = $row;
            $lists[$k]['zcount'] = $this->App->findvar("SELECT COUNT(id) FROM `{$this->App->prefix()}user_tuijian` WHERE  uid !='$uid2' AND parent_uid='$uid2' LIMIT 1");
        }
        $this->set('lists',$lists);
        $this->template('userrelate_own');
    }
    
    //
    public function user_list(){
         //排序
        $orderby = "";
        if ( isset($_GET['desc']) ) {
            $orderby = ' ORDER BY u.'.$_GET['desc'].' DESC';
        } else if ( isset($_GET['asc']) ) {
            $orderby = ' ORDER BY u.'.$_GET['asc'].' ASC';
        } else {
            $orderby = ' ORDER BY u.`user_id` DESC';
        }
        //分页
        $page = isset($_GET['page']) ? $_GET['page'] : '';
        if ( empty($page) ) {
            $page = 1;
        }
        //条件
        //$w = "WHERE l.lid='1'";
        $w = '';
        if ( isset($_GET['keyword']) && $_GET['keyword'] )
        {
            $w .= "WHERE u.nickname LIKE '%".trim($_GET['keyword'])."%'";
        }
        $list = 10;
        $start = ($page-1) * $list;
        $sql = "SELECT COUNT(u.user_id) FROM `{$this->App->prefix()}user` AS u LEFT JOIN `{$this->App->prefix()}user_level` AS l ON u.user_rank = l.lid $w";
        $tt = $this->App->findvar($sql);
        $import_obj = new Import();
        $pagelink = $import_obj->basic()->getpage($tt, $list, $page,'?page=',true);
        $this->set("pagelink",$pagelink);

        $sql = "SELECT u.*,l.level_name,l.discount FROM `{$this->App->prefix()}user` AS u LEFT JOIN `{$this->App->prefix()}user_level` AS l ON u.user_rank = l.lid $w $orderby LIMIT $start,$list";
        $this->set('userlist',$this->App->find($sql));
        $this->template('user_list');
    }

    // 分销用户列表
    public function suppliers( $data = array() ) 
    {
        $this->css( 'jquery_dialog.css' );
        $this->js( array('jquery_dialog.js') );
        // 排序
        $orderby = '';
        if ( isset( $_GET['desc'] ) )
        {
            $orderby = ' ORDER BY u.'.$_GET['desc'].' DESC';
        }
        else if ( isset( $_GET['asc'] ) )
        {
            $orderby = ' ORDER BY u.'.$_GET['asc'].' ASC';
        }
        else
        {
            $orderby = ' ORDER BY u.`user_id` DESC';
        }
        // 分页
        $page = isset( $_GET['page'] ) ? $_GET['page'] : 1;
        //条件
        $w = "WHERE l.lid!='1'";
        if ( isset( $_GET['keyword'] ) && $_GET['keyword'] ) 
        {
            $w .= " AND u.user_name LIKE '%".trim($_GET['keyword'])."%' OR u.email LIKE '%".trim($_GET['keyword'])."%' OR u.birthday LIKE '%".trim($_GET['keyword'])."%' OR u.nickname LIKE '%".trim($_GET['keyword'])."%'";
        }
        $list = 10;
        $start = ($page-1)*$list;
        $sql = "SELECT COUNT(u.user_id) FROM `{$this->App->prefix()}user` AS u LEFT JOIN `{$this->App->prefix()}user_level` AS l ON u.user_rank = l.lid $w";
        $tt = $this->App->findvar($sql);
        $import_obj = new Import();
        $pagelink = $import_obj->basic()->getpage($tt, $list, $page,'?page=',true);
        $this->set("pagelink",$pagelink);

        $sql = "SELECT u.*,l.level_name,l.discount FROM `{$this->App->prefix()}user` AS u LEFT JOIN `{$this->App->prefix()}user_level` AS l ON u.user_rank = l.lid $w $orderby LIMIT $start,$list";
        $this->set('userlist',$this->App->find($sql));
        $this->template('suppliers');
    }

    public function return_show_suppliers_info($uid=0){
        $rt = $this->App->findrow("SELECT * FROM `{$this->App->prefix()}suppliers_shoppong_area` WHERE suppliers_id='$uid'");

        $areaid = !empty($rt['area_data']) ? json_decode($rt['area_data']) : array();
        if(!empty($areaid)){
            $rt['area_data'] = $this->App->find("SELECT * FROM `{$this->App->prefix()}region` WHERE region_id IN (".implode(',',$areaid).") ORDER BY region_id ASC");
        }
        return $rt;
    }

    public function ajax_save_suppliers_info($datas=array()){
        if(empty($datas['ids'])){
            echo "11"; exit;
        }
        $uid = $datas['uid'];
        if(isset($datas['active']) && $datas['active']=='1'){
            $this->App->update('suppliers_shoppong_area',array('active'=>$datas['val']),'suppliers_id',$uid);
            exit;
        }
        $suid = $this->App->findvar("SELECT ssaid FROM `{$this->App->prefix()}suppliers_shoppong_area` WHERE suppliers_id='$uid'");

        $regions = explode('+',$datas['ids']);
        unset($datas);
        $data['area_data'] = json_encode($regions);
        $data['uptime'] = time();
        if($suid>0){
            $this->App->update('suppliers_shoppong_area',$data,'suppliers_id',$uid);
        }else{
            $data['suppliers_id'] = $uid;
            $this->App->insert('suppliers_shoppong_area',$data);
        }
        echo "保存成功";
    }

    //配送店 || 企业会员 列表
    public function wholesalers(){
         //排序
        $orderby = "";
        if(isset($_GET['desc'])){
                  $orderby = ' ORDER BY u.'.$_GET['desc'].' DESC';
        }else if(isset($_GET['asc'])){
                  $orderby = ' ORDER BY u.'.$_GET['asc'].' ASC';
        }else {
                  $orderby = ' ORDER BY u.`user_id` DESC';
        }
        //分页
        $page= isset($_GET['page']) ? $_GET['page'] : '';
        if(empty($page)){
                  $page = 1;
        }
        $rank = (isset($_GET['rank'])&&!empty($_GET['rank'])) ? intval($_GET['rank']) : 11;
        $this->set('rank',$rank);
        //条件
        $w = "WHERE l.lid='$rank'";
        if(isset($_GET['keyword'])&&$_GET['keyword']){
                    $w .= " AND u.user_name LIKE '%".trim($_GET['keyword'])."%' OR u.email LIKE '%".trim($_GET['keyword'])."%' OR u.birthday LIKE '%".trim($_GET['keyword'])."%' OR u.nickname LIKE '%".trim($_GET['keyword'])."%'";
        }
        $list = 10;
        $start = ($page-1)*$list;
        $sql = "SELECT COUNT(u.user_id) FROM `{$this->App->prefix()}user` AS u LEFT JOIN `{$this->App->prefix()}user_level` AS l ON u.user_rank = l.lid $w";
        $tt = $this->App->findvar($sql);
        $pagelink = Import::basic()->getpage($tt, $list, $page,'?page=',true);
        $this->set("pagelink",$pagelink);

        $sql = "SELECT u.*,l.level_name,l.discount ,tb2.consignee FROM `{$this->App->prefix()}user` AS u LEFT JOIN `{$this->App->prefix()}user_level` AS l ON u.user_rank = l.lid    LEFT JOIN `{$this->App->prefix()}user_address` AS tb2 ON u.user_id = tb2.user_id  $w GROUP BY u.user_id $orderby LIMIT $start,$list";
        $this->set('userlist',$this->App->find($sql));
    //  $rank = $this->Session->read('User.rank');
        $this->template('wholesalers');
    }

    // 用户详情信息
    public function user_info( $uid = 0 )
    {
        $rt['userinfo'] = array();
        $rt['province'] = $this->get_regions(1);  //获取省列表

        if ( isset( $_POST ) && ! empty( $_POST ) )
        {
            $consignee_ = array('consignee'=>'0');
            $province_  = array('province'=>'0');
            $city_      = array('city'=>'0');
            $district_  = array('district'=>'0');
            $town_      = array('town'=>'0');
            $village_   = array('village'=>'0');
            $address_   = array('address'=>'0');
            $zipcode_   = array('zipcode'=>'0');
            $dd         = array();
            if ( isset($_POST['consignee']) )
            {
                $dd['consignee'] = $_POST['consignee'];
                $_POST = array_diff_key($_POST,$consignee_);
            }
            if ( isset($_POST['province']) )
            {
                $dd['province'] = $_POST['province'];
                $_POST = array_diff_key( $_POST, $province_ );
            }
            if ( isset( $_POST['city'] ) )
            {
                $dd['city'] = $_POST['city'];
                $_POST = array_diff_key( $_POST, $city_ );
            }
            if ( isset( $_POST['district'] ) )
            {
                $dd['district'] = $_POST['district'];
                $_POST = array_diff_key( $_POST, $district_ );
            }
            if ( isset( $_POST['town'] ) )
            {
                $dd['town'] = $_POST['town'];
                $_POST = array_diff_key( $_POST, $town_ );
            }
            if ( isset( $_POST['village'] ) )
            {
                $dd['village'] = $_POST['village'];
                $_POST = array_diff_key( $_POST, $village_ );
            }
            if ( isset( $_POST['address'] ) )
            {
                $dd['address'] = $_POST['address'];
                $_POST = array_diff_key( $_POST, $address_ );
            }
            if ( isset( $_POST['zipcode'] ) )
            {
                $dd['zipcode'] = $_POST['zipcode'];
                $_POST = array_diff_key( $_POST, $zipcode_ );
            }
            if ( $_POST['user_rank'] != '1' ) 
            { 
                $_POST['is_salesmen'] = '2'; 
            } 
            else 
            { 
                $_POST['is_salesmen'] = '0'; 
            }
            $dd['user_id'] = $uid;
            $dd['country'] = 1;
            $dd['email']   = $_POST['email'];
            $dd['sex']     = $_POST['sex'];
            $dd['is_own']  = 1;
            $sql = "SELECT address_id FROM `{$this->App->prefix()}user_address` WHERE user_id='$uid' AND is_default='1' LIMIT 1";
            $rsid = $this->App->findvar( $sql );

            // 更新地址表
            if ( empty( $rsid ) ) { //添加
                $this->App->insert( 'user_address', $dd );
            } else { //更新
                $this->App->update( 'user_address', $dd, 'address_id', $rsid );
            }
            unset( $dd );
        }

        // 编辑操作
        if ( $uid > 0 )
        {
            if ( isset( $_POST ) && ! empty( $_POST ) )
            {

                if ( empty( $_POST['mobile_phone'] ) )
                {
                   echo'<script>alert("手机号码不能为空！");</script>';
                }
                else
                {
                    $sql = "SELECT user_id FROM `{$this->App->prefix()}user` WHERE user_name='$_POST[mobile_phone]' AND user_id = '$uid' LIMIT 1";
                    $rs = $this->App->findvar( $sql );
                    
                    if ( ! empty( $rs ) )
                    {
                        echo'<script> alert("该用户名称已经存在了！"); </script>';
                    }
                    else
                    {
                        if ( empty( $_POST['password'] ) )
                        {
                            $po = array_diff_assoc( $_POST, array('password'=>$_POST['password']) );
                            unset( $_POST );
                            $_POST = $po;
                            unset( $po );
                        }
                        else
                        { 
                            // 如果密码不为空就更新
                            $_POST['password'] = md5( trim( $_POST['password'] ) );
                        }

                        $wallet_list = $_POST['checkbox'];
                        unset( $_POST['checkbox'] );
                        $this->App->update( 'user', $_POST, 'user_id', $uid );
                        $wallet_arr = array();
                        $wallet_key = array_keys( $wallet_list );

                        for ( $i = 1; $i < 10 ; $i++ ) { 
                            if ( in_array( $i, $wallet_key ) ) {
                                $wallet_arr[ 'wallet_'.$i ] = '1';
                            } else {
                                $wallet_arr[ 'wallet_'.$i ] = '0';
                            }
                        }
                        $this->App->update( 'commission', $wallet_arr, 'user_id', $uid );
                        $this->action( 'system', 'add_admin_log', '修改会员信息:'.$_POST['user_name'] );
                        $this->action( 'common', 'showdiv', $this->getthisurl() );
                    }
                } // end if
            } // end post

            // 用户信息
            $sql = "SELECT * FROM `{$this->App->prefix()}user` WHERE user_id = '{$uid}' LIMIT 1";
            $rt['userinfo'] = $this->App->findrow( $sql );
            $sql = "SELECT * FROM `{$this->App->prefix()}user_address` WHERE user_id = '$uid' AND is_default='1' LIMIT 1";
            $rt['userress'] = $this->App->findrow( $sql );

            $rt['city']     = $this->get_regions(2,$rt['userress']['province']);  // 城市
            $rt['district'] = $this->get_regions(3,$rt['userress']['city']);      // 区
            $rt['town']     = $this->get_regions(4,$rt['userress']['district']);
            $rt['village']  = $this->get_regions(5,$rt['userress']['town']);
            $sql = "SELECT SUM(money) AS zdata FROM `{$this->App->prefix()}user_money_change` WHERE uid='$uid'";
            $sql .= " UNION SELECT SUM(points) AS zdata FROM `{$this->App->prefix()}user_point_change` WHERE uid='$uid'";
            $uu = $this->App->findcol( $sql );
            if ( count($uu) == '2' ) {
                if ( ! empty( $uu[0] ) ) 
                {
                    $uu[0] = number_format( $uu[0], 2, '.', '' );
                }
                $rt['userinfo']['user_money'] = $uu[0];
                $rt['userinfo']['pay_points'] = $uu[1];
                unset( $uu );
            }

            //分页
            if ( empty( $page ) ) {
                $page = 1;
            }
            $list  = 5 ; // 每页显示多少个
            $start = ($page-1) * $list;

            /*资金变动明细分页 S*/
            for ($i=1; $i < 10; $i++) { 
                $sql = "SELECT COUNT(cid) FROM `{$this->App->prefix()}user_money_change` WHERE uid='$uid' AND wallet_id='$i'";
                $tt = $this->App->findvar( $sql );
                $import_obj = new Import();
                $rt['usermoneypage'][ $i ] = $import_obj->basic()->ajax_page( $tt, $list, $page, 'get_usermoney_page_list', array( $uid,$i ) );  
            }
            /*资金变动明细分页 E*/
            /*资金变动明细 S*/
            for ($i=1; $i < 10; $i++) { 
                $sql = "SELECT * FROM `{$this->App->prefix()}user_money_change` WHERE uid='$uid' AND wallet_id='$i' ORDER BY time DESC LIMIT $start, $list";
                $rt['usermoneylist'][ $i ] = $this->App->find( $sql );
            }
            /*资金变动明细 E*/
            $sql = "SELECT COUNT(cid) FROM `{$this->App->prefix()}user_point_change` WHERE uid = '$uid'";
            $tt = $this->App->findvar( $sql );
            $import_obj = new Import();
            $rt['userpointpage'] = $import_obj->basic()->ajax_page( $tt, $list, $page, 'get_userpoint_page_list', array( $uid ) );
            $sql = "SELECT * FROM `{$this->App->prefix()}user_point_change` WHERE uid='$uid' ORDER BY time DESC LIMIT $start, $list";
            $rt['userpointlist'] = $this->App->find( $sql );
            $rt['page'] = $page;

            $this->set( 'type', 'edit' );

            // 一级上家上家信息
            $sql = "SELECT * FROM `{$this->App->prefix()}user_tuijian` WHERE uid='$uid' LIMIT 1";
            $rt['tuijian'] = $this->App->findrow( $sql );
            $rt['p1_uid'] = $rt['tuijian']['parent_uid'];             
            if ( $rt['p1_uid'] ) {
                $sql = "SELECT * FROM `{$this->App->prefix()}user` WHERE user_id = '{$rt['p1_uid']}'  LIMIT 1";
                $rt['p1_info'] = $this->App->findrow( $sql );    
            }
            // 二级上家上家信息
            $sql = "SELECT * FROM `{$this->App->prefix()}user_tuijian` WHERE uid='$rt[p1_uid]' LIMIT 1";
            $rt['tuijian'] = $this->App->findrow( $sql );     
            $rt['p2_uid'] = $rt['tuijian']['parent_uid'];
            if ( $rt['p2_uid'] ) {
                $sql = "SELECT * FROM `{$this->App->prefix()}user` WHERE user_id = '{$rt['p2_uid']}' LIMIT 1";
                $rt['p2_info'] = $this->App->findrow( $sql );
            }
            // 三级上家上家信息
            $sql = "SELECT * FROM `{$this->App->prefix()}user_tuijian` WHERE uid='$rt[p2_uid]' LIMIT 1";
            $rt['tuijian'] = $this->App->findrow( $sql ); 
            $rt['p3_uid'] = $rt['tuijian']['parent_uid'];
            if ( $rt['p3_uid'] ) {
                $sql = "SELECT * FROM `{$this->App->prefix()}user` WHERE user_id = '{$rt['p3_uid']}' LIMIT 1";
                $rt['p3_info'] = $this->App->findrow( $sql );
            }
        } else { 
            // 添加操作
            if ( isset( $_POST ) && !empty( $_POST ) ) {
                if ( empty( $_POST['mobile_phone'] ) ) {
                    echo '<script>alert("手机号码不能为空！");</script>';
                } else {
                    $sql = "SELECT user_id FROM `{$this->App->prefix()}user` WHERE user_name = '$_POST[mobile_phone]' LIMIT 1";
                    $rs = $this->App->findvar( $sql );
                    if ( ! empty( $rs ) ) {
                        echo '<script> alert("该用户名称已经存在了！"); </script>';
                    } else {
                        $_POST['password'] = trim( md5( $_POST['password'] ) );
                        $_POST['reg_time'] = time();
                        $_POST['active']   = 1;
                        $this->App->insert( 'user', $_POST );
                        $sql = "SELECT user_id FROM `{$this->App->prefix()}user` ORDER BY user_id DESC LIMIT 1";
                        $uid = $this->App->findvar( $sql );
                        $this->App->insert( 'commission', array('user_id'=>$uid) );
                        $this->action( 'system', 'add_admin_log', '添加会员:'.$_POST['user_name']);
                        $this->action( 'common', 'showdiv', $this->getthisurl() );
                    }
                }
            }
            $this->set( 'type', 'add' );
        }
        $sql = "SELECT * FROM `{$this->App->prefix()}commission` WHERE user_id=".$uid;
        $money_info = $this->App->findrow( $sql );
        if ( ! $money_info ) {
            $this->App->insert( 'commission', array( 'user_id' => $uid ) );
        }
        $sql = "SELECT * FROM `{$this->App->prefix()}wallet`";
        $wallet_info = $this->App->find( $sql );
        // 用户级别
        $sql = "SELECT `level_name`, `lid` FROM `{$this->App->prefix()}user_level` WHERE is_show = '1' ORDER BY lid ASC";
        $rt['userinfo']['user_jibie'] = $this->App->find( $sql );

        $this->set( 'rt', $rt );
        $this->set( 'money_info', $money_info );
        $this->set( 'wallet_info', $wallet_info );
        $rank = $this->Session->read( 'User.rank' );
        $this->template( 'user_info' );
    }

    //会员的收货地址
    public function user_consignee_address( $uid = 0 ) {
        if ( empty( $uid ) ) { $this->jump('user.php?type=list'); }
        if ( isset( $_POST ) && ! empty( $_POST ) ) {
            if ( empty( $_POST['province'] ) ) 
            {
                $this->jump( '', 0, '选择省份！' );
            } 
            else if ( empty( $_POST['city'] ) ) 
            {
                $this->jump( '', 0, '选择城市！' );
            } 
            else if ( empty( $_POST['consignee'] ) ) 
            {
                $this->jump( '', 0, '收货人不能为空！' );
            } 
            else if ( empty( $_POST['email'] ) ) 
            {
                $this->jump( '', 0, '电子邮箱不能为空！' );
            } 
            else if ( empty( $_POST['address'] ) ) 
            { 
                $this->jump( '', 0, '收货地址不能为空！' );
            }
            else if ( empty( $_POST['tel'] ) ) 
            {
                $this->jump( '', 0, '电话号码不能为空！' );
            }

            // 添加地址
            if ( ! isset( $_POST['address_id'] ) && empty( $_POST['address_id'] ) ) { 
                $_POST['user_id'] = $uid;
                if ( $this->App->insert( 'user_address', $_POST ) ) {
                    $this->jump( '', 0, '添加成功！' );
                } else {
                    $this->jump( '', 0, '添加失败！' );
                }
            } else { 
                // 修改地址
                $address_id = $_POST['address_id'];
                $_POST = array_diff_key( $_POST, array( 'address_id' => '0' ) );
                if ( $this->App->update( 'user_address', $_POST, 'address_id', $address_id ) ) 
                {
                    $this->jump( '', 0, '更新成功！' );
                }
                else
                {
                    $this->jump( '', 0, '更新失败！' );
                }
            }
        }

        $rt['province'] = $this->get_regions(1);  //获取省列表
        // 当前用户的收货地址
        $sql = "SELECT * FROM `{$this->App->prefix()}user_address` WHERE user_id='$uid' AND is_own='0'";
        $rt['userress'] = $this->App->find( $sql );
        if ( ! empty( $rt['userress'] ) ) 
        {
            foreach ( $rt['userress'] as $row ) 
            {
                $rt['city'][$row['address_id']]     = $this->get_regions(2,$row['province']);  // 城市
                $rt['district'][$row['address_id']] = $this->get_regions(3,$row['city']);      // 区
                $rt['town'][$row['address_id']]     = $this->get_regions(4,$row['district']);  // 城镇
                $rt['village'][$row['address_id']]  = $this->get_regions(5,$row['town']);      // 村
            }
        }

        $this->set( 'rt', $rt );
        $this->template( 'user_consignee_address' );
    }

    // 获取地区
    public function get_regions( $type, $parent_id = 0 ) 
    {
        $p = "";
        if ( ! empty( $parent_id ) ) 
        {
            $p = "AND parent_id='$parent_id'";
        }
        $sql = "SELECT region_id,region_name FROM `{$this->App->prefix()}region` WHERE region_type='$type' {$p} ORDER BY region_id ASC";
        return $this->App->find( $sql );
    }

    // 会员积分设置
    public function user_setjifen()
    {
        $this->template( 'user_setjifen' );
    }

    // 会员等级 ######################
    public function user_level_list()
    {
        // 删除
        if ( isset( $_GET['op'] ) && $_GET['op'] == 'del' ) {
            if ( intval( $_GET['id'] ) > 0 ) {
                $this->App->delete( 'user_level', 'lid', intval( $_GET['id'] ) );
            }
        }

        $sql = "SELECT * FROM `{$this->App->prefix()}user_level` WHERE is_show = '1'";
        $rt = $this->App->find( $sql );
        $this->set( 'rt', $rt );
        $this->template( 'user_level_list' );
    }
    public function user_level_info( $id = 0 ) {
        $rt = array();
        if ( isset( $_POST ) && ! empty( $_POST ) ) {
            $data['level_name'] = trim( $_POST['level_name'] );
            $data['discount']   = intval( $_POST['discount'] ) > 0 ? intval( $_POST['discount'] ) : 100;
            $data['jifendesc']  = ! empty( $_POST['jifendesc'] ) ? implode( '+', $_POST['jifendesc'] ) : '';
            if ( $id > 0 ) { 
                // 修改
                if ( ! empty( $data['level_name'] ) ) {
                    if ( $this->App->update( 'user_level', $data, 'lid', $id ) ) {
                        $this->jump( 'user.php?type=levelinfo&id='.$id, 0, '修改成功！' );
                    } else {
                        $this->jump( 'user.php?type=levelinfo&id='.$id, 0, '修改失败！' );
                    }
                } else {
                    echo '<script> alert("会员级别名称不能为空！");</script>';
                }
            } else { 
                // 添加
                if ( ! empty( $data['level_name'] ) ) {
                    if ( $this->App->insert( 'user_level', $data ) ) {
                        $this->jump( 'user.php?type=levelinfo', 0, '添加成功！' );
                    } else {
                        $this->jump( 'user.php?type=levelinfo', 0, '添加失败！' );
                    }
                } else {
                    echo '<script> alert("会员级别名称不能为空！");</script>';
                }
                $rt = $_POST;
                $this->set( 'type', 'add' );
            }
        }
        if ( $id > 0 ) {
            $sql = "SELECT * FROM `{$this->App->prefix()}user_level` WHERE lid = '$id' LIMIT 1";
            $rt = $this->App->findrow( $sql );
            $this->set( 'type', 'edit' );
        }
        $rt['jifendesc'] = isset( $rt['jifendesc'] ) && ! empty( $rt['jifendesc'] ) ? explode( '+', $rt['jifendesc'] ) : array();
        $this->set( 'rt', $rt );
        $this->template( 'user_level_info' );
    }

  // 消息群发
  public function user_send_message()
  {
        $this->js( array('jquery.json-1.3.js') );
        //用户级别
        $sql = "SELECT `level_name`, `lid` FROM `{$this->App->prefix()}user_level` WHERE is_show = '1' ORDER BY lid ASC";
        $rt['user_jibie'] = $this->App->find( $sql );
        // 获取省列表
        $rt['province'] = $this->get_regions(1);
        $this->set( 'rt', $rt );
        $this->template( 'user_send_message' );
  }

    public function user_send_message_frame()
    {
        $this->js( array("edit/kindeditor.js") );
        $this->template( 'user_send_message_frame' );
    }

   // 会员消息列表
  public function user_message_list() {
        $page = ( isset( $_GET['page'] ) && $_GET['page'] > 0 ) ? intval( $_GET['page'] ) : 1;
        $list = 10;
        $start = ($page-1) * $list;
        $sql = "SELECT COUNT(mes_id) FROM `{$this->App->prefix()}user_message` WHERE parent_id = 0";
        $tt = $this->App->findvar( $sql );
        $rt['pagelink'] = Import::basic()->getpage( $tt, $list, $page,'?page=', true );
        $sql = "SELECT
                    tb1.*, tb2.user_name,
                    tb2.nickname,
                    tb2.email,
                    tb3.adminname
                FROM
                    `{$this->App->prefix()}user_message` AS tb1
                LEFT JOIN `{$this->App->prefix()}user` AS tb2 ON tb1.uid = tb2.user_id
                LEFT JOIN `{$this->App->prefix()}admin` AS tb3 ON tb1.adminid = tb3.adminid
                WHERE
                    tb1.parent_id = '0'
                ORDER BY
                    mes_id DESC
                LIMIT $start, $list";
        $rt['meslist'] = $this->App->find( $sql );
        $this->set( 'rt', $rt );
        $this->template( 'user_message_list' );
  }

    public function user_mesinfo( $id = 0 ) 
    {
        if ( ! ( $id > 0 ) ) 
        { 
            $this->jump( 'user.php?type=messagelist', 0 ); 
        }

        $sql = "SELECT tb1.*, tb2.user_name, tb3.adminname FROM `{$this->App->prefix()}user_message` AS tb1 LEFT JOIN `{$this->App->prefix()}user` AS tb2 ON tb1.uid=tb2.user_id LEFT JOIN `{$this->App->prefix()}admin` AS tb3 ON tb1.adminid = tb3.adminid WHERE tb1.mes_id = '$id'";
        $rt = $this->App->findrow( $sql );
        $sql = "SELECT addtime, mes_id, content, rp_content, re_time, status FROM `{$this->App->prefix()}user_message` WHERE parent_id='$rt[mes_id]' AND uid = '$rt[uid]'";
        $rt['rp'] = $this->App->find( $sql );
        $this->set( 'rt', $rt );
        $this->template( 'user_mesinfo' );
    }

   public function ajax_rp_mes( $rt = array() ) {
        $id  = $rt['id'];
        $con = $rt['val'];
        $adminid = $this->Session->read( 'adminid' );
        if ( $this->App->update( 'user_message', array( 'rp_content'=>$con, 'adminid'=>$adminid, 're_time'=>time(), 'status'=>0 ), 'mes_id', $id ) ) 
        {
            echo "回复时间：".date( 'Y-m-d H:i:s', time() );
        } else {
            echo "没有回复";
        }
        exit;
    }

     public function __return_inbox_conunt( $id = 0 ) {
        $sql = "SELECT COUNT(mes_id) FROM `{$this->App->prefix()}user_message` WHERE re_time = '' AND rp_content = '' AND parent_id = '$id'";
        return $this->App->findvar( $sql );
     }

    // ajax获取条件的用户
    public function ajax_getuser( $data = array() ) {
        $err = 0;
        $json = Import::json();
        $result = array( 'error' => $err, 'message' => '' );
        if ( empty( $data ) ) {
            $result['error']   = 2;
            $result['message'] = '传送的数据为空！';
            die( $json->encode( $result ) );
        }
        $wobj = $json->decode( $data ); // 反json ,返回值为对象
        $page = $wobj->page;
        $returnw = $wobj->returnw;
        if ( ! empty( $returnw ) ) {
            unset( $wobj, $data );
            $wobj = $json->decode( base64_decode( $returnw ) ); // 反json ,返回值为对象
            $data = base64_decode( $returnw );
        }
        $keyword        = $wobj->keys;
        $province       = $wobj->province;
        $city           = $wobj->city;
        $district       = $wobj->district;
        $user_rank      = $wobj->user_rank;
        $sex            = $wobj->sex;
        $start_birthday = $wobj->start_birthday;
        $end_birthday   = $wobj->end_birthday;
        $start_reg_date = $wobj->start_reg_date;
        $end_reg_date   = $wobj->end_reg_date;
        $reg_date       = $wobj->reg_date;
        $type           = $wobj->type;
        $types = array( 'salerank', 'poitsrank', 'logincount' );
        $type = in_array( $type, $types ) ? $type : '';

        $comd = array();
        if ( intval( $province ) > 0 ) {
            $comd[] = "ua.province='$province'";
        }
        if ( intval( $city ) > 0 ) {
            $comd[] = "ua.city='$city'";
        }
        if ( intval( $district ) > 0 ) {
            $comd[] = "ua.district='$district'";
        }
        if ( intval( $user_rank ) > 0 ) {
            $comd[] = "u.user_rank='$user_rank'";
        }
        if ( intval( $sex ) > 0 ) {
            $sex = $sex - 1;
            $comd[] = "(u.sex='$sex' OR ua.sex='$sex')";
        }
        if ( $end_birthday > $start_birthday ) {
            $comd[] = "u.birthday BETWEEN '$start_birthday' AND '$end_birthday'";
        }
        if ( $end_reg_date > $start_reg_date ) {
            $end_reg_date   = strtotime( $end_reg_date );
            $start_reg_date = strtotime( $start_reg_date );
            $comd[] = "u.reg_time BETWEEN '$start_reg_date' AND '$end_reg_date'";
        }
        $orderby = " ORDER BY u.user_id DESC";
        switch ( $type ) 
        {
            case 'salerank':
                $orderby = " ORDER BY salerank DESC, u.user_id ASC";
                break;
            case 'poitsrank':
                $orderby = " ORDER BY pointrank DESC, u.user_id ASC";
                break;
            case 'logincount':
                $orderby = " ORDER BY visit_count DESC, u.user_id ASC";
                break;
        }
        if ( ! empty( $keyword ) ) {
            $comd[] = "(u.user_name LIKE '%$keyword%' OR u.email LIKE '%$keyword%' OR u.nickname LIKE '%$keyword%' OR ua.consignee LIKE '%$keyword%' OR ua.email LIKE '%$keyword%')";
        }
        if ( ! ( $page > 0 ) ) 
        {
            $page = 1;
        }
        $list = 10;
        $start = ($page-1) * $list;
        $sql = "SELECT distinct u.user_id FROM `{$this->App->prefix()}user` AS u";
        $sql .=" LEFT JOIN `{$this->App->prefix()}user_address` AS ua ON u.user_id=ua.user_id AND ua.is_own='1'";
        $sql .=" LEFT JOIN `{$this->App->prefix()}goods_order_info` AS goi ON u.user_id=goi.user_id AND goi.pay_status='2'";
        $sql .=" LEFT JOIN `{$this->App->prefix()}user_point_change` AS upc ON u.user_id=upc.uid";
        $sql .= ! empty($comd) ? " WHERE " . implode(' AND ',$comd)." GROUP BY u.user_id" : " GROUP BY u.user_id";
        $tts = $this->App->findcol( $sql );
        $tt = count( $tts );
        $getuserpage = Import::basic()->ajax_page( $tt, $list, $page, 'ajax_getuser', array(base64_encode($data)));
        $this->set( 'getuserpage', $getuserpage );
        $sql = "SELECT distinct u.user_id,u.user_name,u.nickname,u.birthday,u.reg_time,u.visit_count,ua.sex,ua.email,SUM(goi.goods_amount+goi.shipping_fee) AS salerank,SUM(upc.points) AS pointrank FROM `{$this->App->prefix()}user` AS u";
        $sql .=" LEFT JOIN `{$this->App->prefix()}user_address` AS ua ON u.user_id=ua.user_id AND ua.is_own='1'";
        $sql .=" LEFT JOIN `{$this->App->prefix()}goods_order_info` AS goi ON u.user_id=goi.user_id AND goi.pay_status='2'";
        $sql .=" LEFT JOIN `{$this->App->prefix()}user_point_change` AS upc ON u.user_id=upc.uid";
        $sql .= ! empty($comd) ? " WHERE ".implode(' AND ',$comd)." GROUP BY u.user_id" : " GROUP BY u.user_id";
        $sql .="$orderby LIMIT $start,$list";
        $rt = $this->App->find( $sql );
        $this->set( 'rt_user', $rt );
        echo $result = $this->fetch( 'ajax_need_send_user', true );
        unset($rt); exit;
    }

  //ajax发送消息
  public function ajax_user_sendmessage( $data = array() ) {
        $kk = $data['kk'];
        $datas['title'] = $data['title'];
        if ( empty($datas['title'] ) ) { echo "发送消息标题不能为空！"; exit;}

        $datas['content'] = $data['con'];
        if ( empty($datas['content']) ) { echo "发送消息内容不能为空！"; exit;}

        $datas['uid']     = $data['uid'];
        $datas['adminid'] = $this->Session->read('adminid');
        $datas['addtime'] = time();
        $datas['status']  = 0;
        $this->App->insert( 'user_message', $datas );

        $kk++;
        echo $kk;
        unset( $data, $datas );
        exit;
  }
  //获取地区
  public function ajax_get_ress($data=array()){
        $type = $data['type'];
        $parent_id = $data['parent_id'];
        /*if(empty($type)||empty($parent_id)){
            if($type==1){
                $str = '<option value="0">请选择...</option>';
            }else if($type==2){
                $str = '<option value="0">请选择...</option>';
            }else if($type==3){
                $str = '<option value="0">请选择...</option>';
            }
            die($str);
        }
        $sql= "SELECT region_id,region_name FROM `{$this->App->prefix()}region` WHERE region_type='$type' AND parent_id='$parent_id' ORDER BY region_id ASC";
        $rt = $this->App->find($sql);
        if(!empty($rt)){
            if($type==1){
                $str = '<option value="0">请选择...</option>';
            }else if($type==2){
                $str = '<option value="0">请选择...</option>';
            }else if($type==3){
                $str = '<option value="0">请选择...</option>';
            }

            foreach($rt as $row){
            $str .='<option value="'.$row['region_id'].'">'.$row['region_name'].'</option>'."\n";
            }
            die($str);
        }*/
        if(empty($type)||empty($parent_id)){
            exit;
        }
        $sql= "SELECT region_id,region_name FROM `{$this->App->prefix()}region` WHERE region_type='$type' AND parent_id='$parent_id' ORDER BY region_id ASC";
        $rt = $this->App->find($sql);
        if(!empty($rt)){
            if($type==2){
                $str = '<option value="0">选择城市</option>';
            }else if($type==3){
                $str = '<option value="0">选择区</option>';
            }else if($type==4){
                $str = '<option value="0">选择城镇</option>';
            }else if($type==5){
                $str = '<option value="0">选择村</option>';
            }

            foreach($rt as $row){
                $str .='<option value="'.$row['region_id'].'">'.$row['region_name'].'</option>'."\n";
            }
            die($str);
        }else{
            if($type==2){
                $str = '<option value="0">选择城市</option>';
            }else if($type==3){
                $str = '<option value="0">选择区</option>';
            }else if($type==4){
                $str = '<option value="0">选择城镇</option>';
            }else if($type==5){
                $str = '<option value="0">选择村</option>';
            }
        }
        die($str);
   }

   //ajax删除用户收货地址
   public function ajax_delress($id=0,$uid=0){
        if(empty($uid)) die("用户id不存在！！");
        if(empty($id)) die("非法删除！");

        if($this->App->delete('user_address','address_id',$id)){
        }else{
            die("删除失败!");
        }
    }

    //ajax删除用户
    public function ajax_bathdel($ids=0){
        if(empty($ids)) die("非法删除，删除ID为空！");
        $id_arr = @explode('+',$ids);

        $sql = "SELECT avatar  FROM `{$this->App->prefix()}user` WHERE user_id IN(".@implode(',',$id_arr).")";
        $imgs = $this->App->findcol($sql);
        if(!empty($imgs)){
            foreach($imgs as $img){
                if(empty($img)) continue;
                Import::fileop()->delete_file(SYS_PATH.$img); //
            }
            unset($imgs);
        }

        foreach($id_arr as $id){
          if(Import::basic()->int_preg($id))
          $this->App->delete('user','user_id',$id);
          //删除收货地址
          $this->App->delete('user_address','user_id',$id);
          //删除积分改变
           $this->App->delete('user_point_change','uid',$id);
           //删余额改变
           $this->App->delete('user_money_change','uid',$id);
           //删除评论表
           $this->App->delete('comment','user_id',$id);
          // $this->App->delete('comment','parent_id',$id);
        }
        $this->action('system','add_admin_log','删除会员：'.@implode(',',$id_arr));
    }
    //排量激活会员
    public function ajax_activeop($data=array()){
        if(empty($data['uid'])) die("非法操作，ID为空！");
        $sdata['active']= $data['active'];
        $this->action('system','add_admin_log','批量激活会员:ID为=>'.$data['uid']);
        $this->App->update('user',$sdata,'user_id',$data['uid']);
        unset($data,$sdata);
    }

    //检查表单
    public function ajax_checkform($val="",$type=""){
        switch($type){
            case 'email':
                //Import::basic()->email_preg();
                break;
        }
    }

    //给会员增加积分或者增加钱
    public function ajax_change_user_points_money($data=array()){
        if(empty($data)){ echo "";exit;}

        $type      = $data['type'];
        $val       = $data['val'];
        $uid       = $data['uid'];
        $wallet_id = $data['wallet_id'];
        if(empty($uid) || empty($type) || empty($val)){
         echo "不允许操作！";exit;
        }
        $uu = "";
        if($type=='money'){
            $this->App->insert('user_money_change',array('thism'=>date('Y-m',time()),'thismonth'=>date('Y-m-d',time()),'money'=>$val,'changedesc'=>'管理改变资金','time'=>time(),'uid'=>$uid, 'wallet_id'=>$wallet_id));
            $sql = "SELECT SUM(money) FROM `{$this->App->prefix()}user_money_change` WHERE uid='$uid' AND wallet_id='$wallet_id'";
            $uu = $this->App->findvar($sql);
            if(!empty($uu)){
                $uu = number_format($uu, 2, '.', '');
            }
            $val = number_format($val, 2, '.', '');
            $wallet_money = ''; 
            switch( $wallet_id ){
                case '1':
                    $wallet_money = 'wallet_money1';
                break;
                case '2':
                    $wallet_money = 'wallet_money2';
                break;
                case '3':
                    $wallet_money = 'wallet_money3';
                break;
                case '4':
                    $wallet_money = 'wallet_money4';
                break;
                case '5':
                    $wallet_money = 'wallet_money5';
                break;
                case '6':
                    $wallet_money = 'wallet_money6';
                break;
                case '7':
                    $wallet_money = 'wallet_money7';
                break;
                case '8':
                    $wallet_money = 'wallet_money8';
                break;
            }
            $sql_m = "UPDATE `{$this->App->prefix()}commission` SET $wallet_money = '$uu' WHERE user_id = '$uid'";
            $this->App->query($sql_m);
            //$sql = "UPDATE `{$this->App->prefix()}user` SET `money_ucount` = '$uu',`mymoney` = `mymoney`+'$val' WHERE user_id = '$uid'";
            $sql = "UPDATE `{$this->App->prefix()}user` SET `mymoney` = `mymoney`+'$val' WHERE user_id = '$uid'";//原来的海参总佣金变为8种的总佣金
            $this->App->query($sql);
        }else if($type=='points'){
            $this->App->insert('user_point_change',array('thismonth'=>date('Y-m-d',time()),'points'=>$val,'changedesc'=>'管理改变积分','time'=>time(),'uid'=>$uid));
            $sql = "SELECT SUM(points) FROM `{$this->App->prefix()}user_point_change` WHERE uid='$uid'";
            $uu = $this->App->findvar($sql);
            $uu = intval($uu);
            $val = intval($val);
            $sql = "UPDATE `{$this->App->prefix()}user` SET `points_ucount` = '$uu',`mypoints` = `mypoints`+'$val' WHERE user_id = '$uid'";
            $this->App->query($sql);
        }
        echo $uu;

    }

    public function ajax_user_pointchange(){
            $page = isset($_POST['page'])&&intval($_POST['page'])>0 ? intval($_POST['page']) : 1;
            if(empty($page)){
                   $page = 1;
            }
            $uid = $_POST['uid'];
            $list = 5 ; //每页显示多少个
            $start = ($page-1)*$list;
            $tt = $this->App->findvar("SELECT COUNT(cid) FROM `{$this->App->prefix()}user_point_change` WHERE uid='$uid'");
            $rt['userpointpage'] = Import::basic()->ajax_page($tt,$list,$page,'get_userpoint_page_list',array($uid));
            $sql = "SELECT * FROM `{$this->App->prefix()}user_point_change` WHERE uid='$uid' ORDER BY time DESC LIMIT $start,$list";
            $rt['userpointlist'] = $this->App->find($sql);
            $rt['page'] = $page;
            $this->set('rt',$rt);
            echo  $this->fetch('ajax_user_point',true);
            exit;
    }
/*弹出的框上一页下一页*/
    public function ajax_user_mymoney(){
            $page = isset($_POST['page'])&&intval($_POST['page'])>0 ? intval($_POST['page']) : 1;
            if(empty($page)){
                   $page = 1;
            }
            $uid = $_POST['uid'];
            $wallet_id = $_POST['wallet_id'];
            $list = 5 ; //每页显示多少个
            $start = ($page-1)*$list;
            $tt = $this->App->findvar("SELECT COUNT(cid) FROM `{$this->App->prefix()}user_money_change` WHERE uid='$uid' AND wallet_id='$wallet_id'");
            $rt['usermoneypage'][ $wallet_id ] = Import::basic()->ajax_page($tt,$list,$page,'get_usermoney_page_list',array($uid,$wallet_id));
            $sql = "SELECT * FROM `{$this->App->prefix()}user_money_change` WHERE uid='$uid' AND wallet_id='$wallet_id' ORDER BY time DESC LIMIT $start,$list";
            $rt['usermoneylist'][ $wallet_id ] = $this->App->find($sql);
            $this->set('rt',$rt);
            switch ( $wallet_id ) {
                case '1':
                    echo  $this->fetch('ajax_user_money',true);
                    break;
                case '2':
                    echo  $this->fetch('ajax_user_money_2',true);
                    break;
                case '3':
                    echo  $this->fetch('ajax_user_money_3',true);
                    break;
                case '4':
                    echo  $this->fetch('ajax_user_money_4',true);
                    break;
                case '5':
                    echo  $this->fetch('ajax_user_money_5',true);
                    break;
                case '6':
                    echo  $this->fetch('ajax_user_money_6',true);
                    break;
                case '7':
                    echo  $this->fetch('ajax_user_money_7',true);
                    break;
                case '8':
                    echo  $this->fetch('ajax_user_money_8',true);
                    break;
                default:
                    # code...
                    break;
            }
            exit;
    }


    //工厂业务员
    public function suppliers_salesmen(){
        $sql = "SELECT b.brand_name,u.user_name,u.is_salesmen,usb.uid,usb.addtime,usb.is_check,usb.uid ,usb.brand_id FROM `{$this->App->prefix()}user_salesmen_brand` AS usb LEFT JOIN `{$this->App->prefix()}brand` AS b ON b.brand_id=usb.brand_id LEFT JOIN `{$this->App->prefix()}user` AS u ON u.user_id=usb.uid";
        $rt_ = $this->App->find($sql);
        if(!empty($rt_))foreach($rt_ as $row){
            $rt[$row['uid']][] = $row;
        }
        unset($rt_);
        $this->set('rt',$rt);
        $this->template('suppliers_salesmen');
    }

    public function ajax_check_salesmen_brand($data=array()){
        $val = $data['val'];
        $bid = $data['bid'];
        $uid = $data['uid'];
        $type = $data['type'];
        if($type=='user_salesmen'){
            $this->App->update('user_salesmen_brand',array('is_check'=>$val),array("uid='$uid'","brand_id='$bid'"));
        }else if($type=='user'){
            $this->App->update('user',array('is_salesmen'=>$val),'user_id',$uid);
        }
    }

    public function salesmen_manage(){
        $this->js('time/WdatePicker.js');
        $uid = $_GET['id'];
        $sql = "SELECT brand_id,brand_name FROM `{$this->App->prefix()}brand` WHERE is_show='1' AND brand_name !='' ORDER BY brand_name ASC";
        $this->set('allbrand',$this->App->find($sql));

        $sql = "SELECT b.brand_name,usb.brand_id,usb.is_check FROM `{$this->App->prefix()}user_salesmen_brand` AS usb LEFT JOIN `{$this->App->prefix()}brand` AS b ON b.brand_id = usb.brand_id  WHERE usb.uid = '$uid' ORDER BY b.brand_name ASC";
        $this->set('dbbrand',$this->App->find($sql));

        $comd[] = "usb.uid='$uid' AND go.brand_id!='0' AND usb.is_check='1'";
        if(isset($_GET['sid'])&&!empty($_GET['sid'])&&$_GET['sid']!='-1'){
                $comd[] = "goi.shop_id = '$_GET[sid]'";
        }

        if(isset($_GET['bid'])&&!empty($_GET['bid'])&&$_GET['bid']!='-1'){
                $comd[] = "usb.brand_id = '$_GET[bid]'";
                $comd[] = "go.brand_id = '$_GET[bid]'";
                $comd[] = "b.brand_id = '$_GET[bid]'";
        }

        if(isset($_GET['date1'])&&!empty($_GET['date1']) && isset($_GET['date2'])&&!empty($_GET['date2'])){
                $t1 = strtotime($_GET['date1'].' '.$_GET['t1'].':00:00');
                $t2 = strtotime($_GET['date2'].' '.$_GET['t2'].':59:59');
                $comd[] = "goi.add_time BETWEEN '$t1' AND '$t2'";
        }else{
                $t1 = strtotime(date('Y-m-d',time()-3600*24*7).' 00:00:01');
                $t2 = strtotime(date('Y-m-d',time()).' 23:59:59');
                $comd[] = "goi.add_time BETWEEN '$t1' AND '$t2'";
        }

        $w = 'WHERE '.implode(' AND ',$comd);
        //统计品牌的销售量 便利店 便利店id 品牌 销售额  销售数量
        $sql = "SELECT SUM(go.market_price) AS zmarket_price,SUM(go.goods_price) AS zgoods_price,go.brand_id,b.brand_name,u.user_name,goi.shop_id FROM `{$this->App->prefix()}user_salesmen_brand` AS usb LEFT JOIN `{$this->App->prefix()}brand` AS b ON usb.brand_id = b.brand_id";
        $sql .=" LEFT JOIN `{$this->App->prefix()}goods_order` AS go ON go.brand_id=usb.brand_id AND go.brand_id = b.brand_id";
        $sql .=" LEFT JOIN `{$this->App->prefix()}goods_order_info` AS goi ON goi.order_id = go.order_id";
        $sql .=" LEFT JOIN `{$this->App->prefix()}user` AS u ON u.user_id = goi.shop_id";
        $sql .=" $w GROUP BY go.brand_id,goi.shop_id ORDER BY goi.shop_id";
        $rl_ = $this->App->find($sql);
        if(!empty($rl_))foreach($rl_ as $row){
            $rl[$row['brand_id']][] = $row;
        }
        unset($rl_);
        $this->set('rl',$rl);

        $sql = "SELECT SUM(go.market_price) AS zmarket_price,SUM(go.goods_price) AS zgoods_price,go.brand_id,b.brand_name,u.user_name,goi.shop_id FROM `{$this->App->prefix()}user_salesmen_brand` AS usb LEFT JOIN `{$this->App->prefix()}brand` AS b ON usb.brand_id = b.brand_id";
        $sql .=" LEFT JOIN `{$this->App->prefix()}goods_order` AS go ON go.brand_id=usb.brand_id AND go.brand_id = b.brand_id";
        $sql .=" LEFT JOIN `{$this->App->prefix()}goods_order_info` AS goi ON goi.order_id = go.order_id";
        $sql .=" LEFT JOIN `{$this->App->prefix()}user` AS u ON u.user_id = goi.shop_id";
        $sql .=" $w GROUP BY goi.shop_id,go.brand_id ORDER BY go.brand_id";
        $rls_ = $this->App->find($sql);
        if(!empty($rls_))foreach($rls_ as $row){
            $rls[$row['shop_id']][] = $row;
        }
        unset($rls_);
        $this->set('rls',$rls);
        $this->template('salesmen_manage');
    }
    
    public function user_bonus(){
        $sql = "Select * from `{$this->App->prefix()}user_level` order by `lid`";
        $level_info = $this->App->find($sql);
        
        $sql = "Select * from `{$this->App->prefix()}user_bonus_config` limit 1";
        $row = $this->App->findrow($sql);
        if($row){
            $config = unserialize($row['config']);
            
        }
        //var_dump($config);
        if($config['level_info'] and $config['bonus_cycle'] and $config['bonus_date_start'] and $config['bonus_date_end']   and $config['bonus_percent']){
            $this->set('info',$this->get_user_bonus());
        }
        
        $this->set('level_info',$level_info);
        $this->set('config',$config);
        $this->template('user_bonus');
    }
    
    public function ajax_user_bonus(){
           $level_limit = trim($_POST['level_limit']);
           $bonus_limit = trim($_POST['bonus_limit']);
       $data = array(
           'bonus_cycle'=>trim($_POST['bonus_cycle']),
           'bonus_date_start'=>trim($_POST['bonus_date_start']),
           'bonus_date_end'=>trim($_POST['bonus_date_end']),
           'bonus_percent'=>trim($_POST['bonus_percent']),
           
         );
        if($level_limit and $bonus_limit and $data['bonus_cycle'] and $data['bonus_date_start'] and $data['bonus_date_end']   and $data['bonus_percent']){
               $level_limit = explode(',',$level_limit);
               $bonus_limit = explode(',',$bonus_limit);
               $arr = array_combine($level_limit,$bonus_limit);
               foreach($arr as $e){
                  if($e == ''){
                       echo json_encode(array('success'=>false,'info'=>'data error'));
                       exit;
                  }
               }
               $data['level_info'] = $arr;
             
               
               $temp = serialize($data);
               $time = time();
               $sql = "update `{$this->App->prefix()}user_bonus_config` set `config` = '{$temp}',`linetime`='{$time}'";
              // echo $sql;
               if($this->App->query($sql)){
                     $info = $this->get_user_bonus();
                     echo json_encode(array('success'=>true,'info'=>$info));
                
                   }else{
                     echo json_encode(array('success'=>false));
                }
            }else{
                echo json_encode(array('success'=>false,'info'=>'data error'));
            }
    }
    public function user_bonus_list(){
         //分页
        $page = isset($_GET['page']) ? $_GET['page'] : '';
        if(empty($page)){
               $page = 1;
        }
        $list = 30;
        $start = ($page-1)*$list;
        $sql = "SELECT COUNT(id) FROM `{$this->App->prefix()}user_bonus_record`";
        $tt = $this->App->findvar($sql);
        $pagelink = Import::basic()->getpage($tt, $list, $page,'?page=',true);
        $this->set("pagelink",$pagelink);
            
        $sql = "SELECT * FROM `{$this->App->prefix()}user_bonus_record` ORDER BY id DESC LIMIT $start,$list";
        $rt = $this->App->find($sql);
        $this->set("rt",$rt);
        $this->template('user_bonus_list');
    
    }
    public function user_bonus_detail($id=0){
        $sql = "select bonus_info from `{$this->App->prefix()}user_bonus_record` where id = '{$id}'";
        $order_ids = $this->App->findvar($sql);
        $order_ids = unserialize($order_ids);
        // 分红订单信息
        foreach($order_ids as $order){
           $sql = "select order_sn,consignee,order_amount,shipping_time,order_id from `{$this->App->prefix()}goods_order_info` where order_id = '{$order['order_id']}'";
           $order_list [] = $this->App->findrow($sql);
        }
        
        // 分红人员信息
        $sql = "select * from `{$this->App->prefix()}user_bonus_list` where bonus_id = '{$id}'";
        $res = $this->App->find($sql);
        
        $user_list = array();
        foreach($res as $e){
            $sql =  "select user_name,user_rank from `{$this->App->prefix()}user` where user_id = '{$e['user_id']}' limit 1";
            $r = $this->App->findrow($sql);
            $e['user_name'] = $r['user_name'];
            $sql = "select level_name from `{$this->App->prefix()}user_level` where lid = '{$r['user_rank']}' limit 1";
            $e['user_rank'] = $this->App->findvar($sql);
            $user_list[] = $e;
        }
        $sql = "select sum,percent from `{$this->App->prefix()}user_bonus_record` where id = '{$id}' limit 1 ";
        $bonus_info = $this->App->findrow($sql);
        $this->set('bonus_info',$bonus_info);
        $this->set('user_list',$user_list);
        $this->set('order_list',$order_list);
        $this->template('user_bonus_detail');
    }
    // 取得符合的营业额、分红的金额、符合的人数
    public function get_user_bonus(){
        $sql = "Select * from `{$this->App->prefix()}user_bonus_config` limit 1";
        $row = $this->App->findrow($sql);
        if($row){
            $config = unserialize($row['config']);  
        }
        // 条件
    
        $level_limit = $config['level_info'];
        $bonus_percent = $config['bonus_percent'];
        $bonus_cycle = $config['bonus_cycle'];
        $bonus_date_start = strtotime($config['bonus_date_start']);
        $bonus_date_end =  strtotime($config['bonus_date_end']);
        
        // 取得营业额 三个状态为正常‘已付款、已收货order_status = 2、pay_status = 1、shipping_status = 5
        if($bonus_cycle == 'yesterday'){
            $bonus_date_end = strtotime(date('Y-m-d'));
            $bonus_date_start = strtotime(date('Y-m-d'))-60*60*24;
        }
        // 和
        $sql = "select sum(order_amount) from `{$this->App->prefix()}goods_order_info` where order_status = '2' and pay_status = '1' and shipping_status = '5' and shipping_time >= {$bonus_date_start} and shipping_time <={$bonus_date_end} and bonus_count = '0'";
        $sum = $this->App->findvar($sql);
        
        
        // 计数
        $sql = "select count(*) from `{$this->App->prefix()}goods_order_info` where order_status = '2' and pay_status = '1' and shipping_status = '5' and shipping_time >= {$bonus_date_start} and shipping_time <={$bonus_date_end} and bonus_count = '0'";
        $order = $this->App->findvar($sql);
        $percent = $sum * (intval($bonus_percent)/100);
        
        // 订单id列表
        $sql = "select order_id from `{$this->App->prefix()}goods_order_info` where order_status = '2' and pay_status = '1' and shipping_status = '5' and shipping_time >= {$bonus_date_start} and shipping_time <={$bonus_date_end} and bonus_count = '0'";
        $order_ids = $this->App->find($sql);
        
        // 人数
        $where =  " where ";
        $index = 0;
        foreach($level_limit as $k => $v){
            if($index > 0){
               $where .=" or user_rank = '{$k}'";
            }else{
                $where .= "user_rank = '{$k}'"; 
                $index++;
            }
        }
    
        $sql = "select user_id,user_rank from `{$this->App->prefix()}user` ".$where;
        //echo $sql;
        //exit;
        $list = $this->App->find($sql);
        
        // 根据上限金额过滤
        foreach($list as $k=>$v){
            $sql = "select sum(bonus) from `{$this->App->prefix()}user_bonus_list` where user_id = {$v['user_id']}";
            $bonus = $this->App->findvar($sql);
    
            if(($bonus and $bonus > $level_limit[$v['user_rank']]) and  ($level_limit[$v['user_rank']] != -1) ){
                unset($list[$k]);
            }
        }
        return array('order'=>$order,'sum'=>$sum,'percent'=>$percent,'count'=>count($list),'order_ids'=>$order_ids,'user_ids'=>$list);
    }
    
    public function user_bonus_action(){
        $info = $this->get_user_bonus();
        // 存在分红金额 和 分红人数 开始分红
        if($info['percent'] and $info['count']){
            // 增加记录
            $data = serialize($info['order_ids']);
            $time = time();
            $sql = "insert into `{$this->App->prefix()}user_bonus_record` (`sum`,`percent`,`count`,`bonus_info`,`linetime`) values('{$info['sum']}','{$info['percent']}','{$info['count']}','{$data}','{$time}')";
            
            $this->App->query($sql);
            
            
            $id = $this->App->findvar("select id from `{$this->App->prefix()}user_bonus_record` where linetime='{$time}'");
            
            $each = round($info['percent']/$info['count'],2);
        
            // 更新订单
            foreach($info['order_ids'] as $v){
               $sql = "update `{$this->App->prefix()}goods_order_info` set `bonus_count` = `bonus_count` + '1',`bonus_time` =  '{$time}' where order_id = '{$v['order_id']}'";
             
               $this->App->query($sql);
            }
            // 增加金额到用户帐号
            foreach($info['user_ids'] as $v){
            $sql = "update `{$this->App->prefix()}user` set `money_ucount` = `money_ucount` + '{$each}',`mymoney` = `mymoney` + '{$each}' where user_id = '{$v['user_id']}'";
            $this->App->query($sql);
            // 添加用户分红记录
            $sql = "insert into `{$this->App->prefix()}user_bonus_list` (`bonus_id`,`user_id`,`bonus`,`linetime`) values('{$id}','{$v['user_id']}','{$each}','{$time}')";
            $this->App->query($sql);
            // 添加用户金额变动记录
            $sql = "insert into `{$this->App->prefix()}user_money_change` (`time`,`changedesc`,`money`,`uid`,`type`) values('{$time}','分红增加金额','{$each}','{$v['user_id']}','system')";
            $this->App->query($sql);
    
                 echo json_encode(array('success'=>true));
            }
            
        }else{
                 echo json_encode(array('success'=>false)); 
        }   
    }
    
    // 用户冗余数据清空及session清空
    public function user_repair()
    {
        $this->template('user_repair');
    }

    public function ajax_user_repair()
    {
        // 删除user中不存在会员的信息
        $sql = "DELETE FROM `{$this->App->prefix()}user_address` WHERE user_id NOT IN (SELECT user_id FROM `{$this->App->prefix()}user`)";
        $this->App->query($sql);
        $sql = "DELETE FROM `{$this->App->prefix()}user_bank` WHERE uid NOT IN (SELECT user_id FROM `{$this->App->prefix()}user`)";
        $this->App->query($sql);
        $sql = "DELETE FROM `{$this->App->prefix()}user_drawmoney` WHERE uid NOT IN (SELECT user_id FROM `{$this->App->prefix()}user`)";
        $this->App->query($sql);
        $sql = "DELETE FROM `{$this->App->prefix()}user_money_change` WHERE uid NOT IN (SELECT user_id FROM `{$this->App->prefix()}user`)";
        $this->App->query($sql);
        $sql = "DELETE FROM `{$this->App->prefix()}user_money_change_cache` WHERE uid NOT IN (SELECT user_id FROM `{$this->App->prefix()}user`)";
        $this->App->query($sql);
        $sql = "DELETE FROM `{$this->App->prefix()}user_money_record` WHERE uid NOT IN (SELECT user_id FROM `{$this->App->prefix()}user`)";
        $this->App->query($sql);
        $sql = "DELETE FROM `{$this->App->prefix()}user_share` WHERE uid NOT IN (SELECT user_id FROM `{$this->App->prefix()}user`)";
        $this->App->query($sql);
        $sql = "DELETE FROM `{$this->App->prefix()}user_tuijian` WHERE uid NOT IN (SELECT user_id FROM `{$this->App->prefix()}user`)";
        $this->App->query($sql);
        $sql = "DELETE FROM `{$this->App->prefix()}user_tuijian_fx` WHERE uid NOT IN (SELECT user_id FROM `{$this->App->prefix()}user`)";
        $this->App->query($sql);
        $sql = "DELETE FROM `{$this->App->prefix()}goods_order_info` WHERE user_id NOT IN (SELECT user_id FROM `{$this->App->prefix()}user`)";
        $this->App->query($sql);
        $sql = "DELETE FROM `{$this->App->prefix()}goods_order` WHERE order_id NOT IN (SELECT order_id FROM `{$this->App->prefix()}goods_order_info`)";
        $this->App->query($sql);
        $sql = "DELETE FROM `{$this->App->prefix()}goods_order_info_daigou` WHERE user_id NOT IN (SELECT user_id FROM `{$this->App->prefix()}user`)";
        $this->App->query($sql);
        $sql = "DELETE FROM `{$this->App->prefix()}goods_order_daigou` WHERE order_id NOT IN (SELECT order_id FROM `{$this->App->prefix()}goods_order_info_daigou`)";
        $this->App->query($sql);
        // 删除sess中session文件
        if (! class_exists ( 'FileOp' )) {
            $fi = Import::fileop ();
        }
        $ar = $fi->list_files ( SYS_PATH . 'sess' );
        if (! empty ( $ar )) {
            foreach ( $ar as $filename ) {
                if (is_file ( $filename )) {
                    if ($fi->delete_file ( $filename ))
                        $i ++;
                } else if (is_dir ( $filename )) {
                    if ($fi->delete_dir ( $filename ))
                        $j ++;
                }
                $fi->dir2delete ( $filename );
            }
        }
        unset ( $ar );

        //清除不存在的uid关联
        $sql = "SELECT id,parent_uid FROM `{$this->App->prefix()}user_tuijian` WHERE parent_uid NOT IN (SELECT user_id FROM `{$this->App->prefix()}user`)";
        $res = $this->App->find($sql);
        foreach($res as $e){
            $data = array(
                    'parent_uid'=> '',
                    'share_uid'=> '',
                    
            );
            $this->App->update('user_tuijian',$data,'id',$e['id']);
        }
        unset($res);
        unset($data);
        $sql = "SELECT id FROM `{$this->App->prefix()}user_tuijian` WHERE daili_uid NOT IN (SELECT user_id FROM `{$this->App->prefix()}user`)";
        $res = $this->App->find($sql);
        foreach($res as $e){
            $data = array(
                    'daili_uid'=> '',
            );
            $this->App->update('user_tuijian',$data,'id',$e['id']);
            
        }
        unset($res);
        unset($data);
        // tuijian_fx
        $sql = "SELECT id,p3_uid,p2_uid FROM `{$this->App->prefix()}user_tuijian_fx` WHERE p1_uid NOT IN (SELECT user_id FROM `{$this->App->prefix()}user`)";
        $res = $this->App->find($sql);
        foreach($res as $e){
            $data = array(
                'p1_uid'=> $e['p2_uid'],
                'p2_uid'=> $e['p3_uid'],
                'p3_uid'=> ''
            );
            $this->App->update('user_tuijian_fx',$data,'id',$e['id']);
        }
        unset($res);
        unset($data);
        $sql = "SELECT id,p3_uid FROM `{$this->App->prefix()}user_tuijian_fx` WHERE p2_uid NOT IN (SELECT user_id FROM `{$this->App->prefix()}user`)";
        $res = $this->App->find($sql);
        foreach($res as $e){
            $data = array(
                    'p2_uid'=> $e['p3_uid'],
                    'p3_uid'=> ''
            );
            $this->App->update('user_tuijian_fx',$data,'id',$e['id']);
        }
        unset($res);
        unset($data);
        $sql = "SELECT id FROM `{$this->App->prefix()}user_tuijian_fx` WHERE p3_uid NOT IN (SELECT user_id FROM `{$this->App->prefix()}user`)";
        $res = $this->App->find($sql);
        foreach($res as $e){
            $data = array(
                    'p3_uid'=> ''
            );
            $this->App->update('user_tuijian_fx',$data,'id',$e['id']);
        }
        unset($res);
        unset($data);
        
        // order_info
        $sql = "SELECT order_id,parent_uid2,parent_uid3 FROM `{$this->App->prefix()}goods_order_info` WHERE parent_uid NOT IN (SELECT user_id FROM `{$this->App->prefix()}user`)";
        $res = $this->App->find($sql);
        foreach($res as $e){
            $data = array(
                    'parent_uid'=> $e['parent_uid2'],
                    'parent_uid2'=> $e['parent_uid3'],
                    'parent_uid3'=> ''
            );
            $this->App->update('goods_order_info',$data,'order_id',$e['order_id']);
        }
        unset($res);
        unset($data);
        $sql = "SELECT order_id,parent_uid3 FROM `{$this->App->prefix()}goods_order_info` WHERE parent_uid NOT IN (SELECT user_id FROM `{$this->App->prefix()}user`)";
        $res = $this->App->find($sql);
        foreach($res as $e){
            $data = array(
                    'parent_uid2'=> $e['parent_uid3'],
                    'parent_uid3'=> ''
            );
            $this->App->update('goods_order_info',$data,'order_id',$e['order_id']);
        }
        unset($res);
        unset($data);
        $sql = "SELECT order_id FROM `{$this->App->prefix()}goods_order_info` WHERE parent_uid NOT IN (SELECT user_id FROM `{$this->App->prefix()}user`)";
        $res = $this->App->find($sql);
        foreach($res as $e){
            $data = array(
                    'parent_uid3'=> ''
            );
            $this->App->update('goods_order_info',$data,'order_id',$e['order_id']);
        }
        unset($res);
        unset($data);
        // 修复关系
        $sql = "SELECT user_id FROM `{$this->App->prefix()}user`  WHERE user_rank <> '1' AND user_id NOT IN (SELECT uid FROM `{$this->App->prefix()}user_tuijian_fx`)";
        $res = $this->App->find($sql);

        foreach($res as $e){
            $this->update_daili_tree($e['user_id']);
        }
        echo '修复完成';
    }

    /**
     * 获取可用钱包
     */
    private function _get_wallet()
    {
        /* 已开启的钱包 */
        $sql = "SELECT wallet_id, wallet_name FROM `{$this->App->prefix()}wallet` WHERE state = '1'";
        $wallet = $this->App->find( $sql );
        $wallet_list = array();
        foreach ( (array)$wallet as $k => $v )
        {
            $wallet_list[$v['wallet_id']] = $v['wallet_name'];
        }
        return $wallet_list;
    }
}