<?php
class PageController extends Controller{
    private $mykey = 'D27897844bc35e217de79b30b3567356'; //安全码
    private $token;
    private $wecha_id;
        private $fun;
        private $data = array();
        public $fans;
        private $my = '小邻宝';
        public $wxuser;
        public $apiServer;
    
    function  __construct() {
        $this->layout('content');
    }
    
    function test(){
        $url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=j3N6qv682-1QwJgg1_rb2-9YnGXe4y6OV8Fqt_BoOVqB1ttY8VGdXjyYQ38-CL9Zb2KFRg5KNzAp1RVEjVDLd2ZidJ99G_vkQk7-dmO-Qh8&openid=o3i6tuN76fOIqquTYD5ZAo5fjDNw";
        $con = $this->curlGet($url);
        $json=json_decode($con);
        print_r($json);
    }
    
    function send($rts=array(),$type=""){
        if(empty($rts['openid'])) return;
        
        $access_token = $this->_get_access_token();
        $data = $this->_get_send_con($rts,$type);
        $rt=$this->curlPost('https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token='.$access_token,$data,0);
    }
    function _get_send_con($rt=array(),$ty=''){
        $data = array();
        switch($ty){
            case 'guanzhu':
            $openid = $rt['openid'];
            $str = '你的好友['.$rt['nickname'].']已经关注你啦;\n\n服务类型：关注已返积分\n提交时间：'.date('Y-m-d H:i:s').'\n\n备注：再接再厉哦!返积分详情点击进入查看!';
            $data='{"touser": "'.$openid.'","msgtype": "news","news": {"articles": [{"title": "服务申请提交成功", "description": "'.$str.'","url":"'.str_replace('api','m',ADMIN_URL).'user.php?act=mypoints"}]}}';
            break;
            case 'guanzhudaili':
            $openid = $rt['openid'];
            $str = '你的用户下级好友['.$rt['nickname'].']已经关注你啦;\n\n服务类型：下级好友关注返积分\n提交时间：'.date('Y-m-d H:i:s').'\n\n备注：他还需要购买你才有收入哦!';
            $data='{"touser": "'.$openid.'","msgtype": "news","news": {"articles": [{"title": "服务申请提交成功", "description": "'.$str.'","url":"'.str_replace('api','m',ADMIN_URL).'user.php?act=mypoints"}]}}';
            break;
            case 'guanzhudaili2'://二级代理
            $openid = $rt['openid'];
            $str = '你的用户二级好友['.$rt['nickname'].']已经关注你啦;\n\n服务类型：二级好友关注提醒\n提交时间：'.date('Y-m-d H:i:s').'\n\n备注：他还需要购买你才有收入哦!';
            $data='{"touser": "'.$openid.'","msgtype": "news","news": {"articles": [{"title": "服务申请提交成功", "description": "'.$str.'","url":"'.str_replace('api','m',ADMIN_URL).'user.php?act=mypoints"}]}}';
            break;
            case 'guanzhudaili3'://三级代理
            $openid = $rt['openid'];
            $str = '你的用户三级好友['.$rt['nickname'].']已经关注你啦;\n\n服务类型：三级好友关注提醒\n提交时间：'.date('Y-m-d H:i:s').'\n\n备注：他还需要购买你才有收入哦!';
            $data='{"touser": "'.$openid.'","msgtype": "news","news": {"articles": [{"title": "服务申请提交成功", "description": "'.$str.'","url":"'.str_replace('api','m',ADMIN_URL).'user.php?act=mypoints"}]}}';
            break;
            case 'markimg':
            $openid = $rt['openid'];
            $data = '{"touser":"'.$openid.'","msgtype":"text","text":{"content":"正在生成你的推广二维码,请耐心等待(注:出现该公众号暂时无法提供服务等字样,无须理会,只需等待即可)..."}}';
            break;
            case 'markimg2':
            $openid = $rt['openid'];
            $data = '{"touser":"'.$openid.'","msgtype":"text","text":{"content":"对不起、您不是东家,获得推广图片,请<a href=\"http://www.fx.com/m/catalog.php?tid=42\">购买商品</a>成为东家"}}';
            break;
            case 'markimg3':
            $openid = $rt['openid'];
            $data = '{"touser":"'.$openid.'","msgtype":"text","text":{"content":"对不起、您不是东家,获得推广图片,请<a href=""http://www.fx.com/m/catalog.php?tid=42"">购买商品</a>成为东家"}}';
            break;
            case 'markimgsend':
            $openid = $rt['openid'];
            $MEDIA_ID = $rt['media_id'];
            $data = '{"touser":"'.$openid.'","msgtype":"image","image":{"media_id":"'.$MEDIA_ID.'"}}';
            break;
        }
        
        return $data;
    }
    
    
    public function index()
    {
        @set_time_limit( 300 ); //最大运行时间
        $thisurl = Import::basic()->thisurl();
        $rt = explode( 'index.php', $thisurl );
        $arg = isset( $rt[1] ) ? $rt[1] : '';
        if ( ! empty( $arg ) )
        {
            $rt = explode( '/', $arg );
            $arg = isset( $rt[1] ) ? $rt[1] : '';
            if ( ! empty( $arg ) )
            {
                $this->token = trim( $arg );
            }
            else
            {
                $t = isset( $_GET['t'] ) ? $_GET['t'] : '';
                if ( empty( $t ) )
                {
                    die( '参数为空' );
                }
                else
                {
                    $this->token = $t;
                }
            }
        }
        else
        {
            $t = isset( $_GET['t'] ) ? $_GET['t'] : '';
            if ( empty( $t ) )
            {
                die( '参数为空' );
            }
            else
            {
                $this->token = $t;
            }
        }

        $user_token = $this->token;
        $sql = "SELECT pigsecret FROM `{$this->App->prefix()}wxuserset` WHERE token = '$user_token' LIMIT 1";
        $pigsecret = $this->App->findvar( $sql );
        if ( empty( $pigsecret ) ) $pigsecret = "isempty";
        
        if ( ! class_exists( 'SimpleXMLElement' ) )
        {
            die('SimpleXMLElement class not exist');
        }
        if ( ! function_exists( 'dom_import_simplexml' ) )
        {
            die('dom_import_simplexml function not exist');
        }
        if ( ! preg_match( '/^[0-9a-zA-Z]{3,42}$/', $this->token ) )
        {
            die( 'Error token' );
        }
        // 包含
        if ( ! class_exists( 'Wechat' ) ) require_once( SYS_PATH_API . 'inc/Wechat.class.php' );
        $weixin = new Wechat( $pigsecret );
        $data = $weixin->request();
        $this->data = $data;
        
        if ( $this->data )
        {
            // 自定义机器人名字
            $wecha_id = $this->data['FromUserName'];
            $token    = $this->token;
            $this->Session->write('User.wecha_id',$wecha_id);
            $this->Session->write('User.token',$token);
            setcookie(CFGH.'USER[UKEY]', $wecha_id, mktime() + 2592000);
            
            $sql = "SELECT * FROM `{$this->App->prefix()}user` WHERE wecha_id = '$wecha_id'";
            $this->fans      = $this->App->findrow( $sql );
            $this->wxuser    = 'wxuser_' . $this->token;
            $this->apiServer = 'http://api.apiqq.com';
            $this->fun = ''; //这里是允许访问的权限
            $this->wecha_id = $wecha_id;
            
            list( $content, $type ) = $this->reply( $data );
            $weixin->response( $content, $type );
        }
    }
    
    function _return_px()
    {
        $t  = '';
        $x  = $_SERVER["HTTP_HOST"];
        $x1 = explode( '.', $x );
        if ( count( $x1 ) == 2 )
        {
          $t = $x1[0];
        }
        else if ( count( $x1 ) > 2 )
        {
            $t = $x1[0] . $x1[1];
        }
        return $t;
    }
        
    // 获取appid、appsecret
    function _get_appid_appsecret()
    {
        $t     = $this->_return_px();
        $cache = Import::ajincache();
        $cache->SetFunction(__FUNCTION__);
        $cache->SetMode( 'sitemes'. $t );
        $fn = $cache->fpath( func_get_args() );
        if ( file_exists( $fn ) && (time() - filemtime( $fn ) < 7000) && ! $cache->GetClose() )
        {
            include( $fn );
        }
        else
        {
            $sql = "SELECT appid,appsecret FROM `{$this->App->prefix()}wxuserset` LIMIT 1";
            $rr = $this->App->findrow( $sql );
            $rt['appid']     = $rr['appid'];
            $rt['appsecret'] = $rr['appsecret'];
            
            $cache->write( $fn, $rt, 'rt' );
       }
       return $rt;
    }
    
    // 获取access_token
    public function _get_access_token()
    {
        $t = $this->_return_px();
        $cache = Import::ajincache();
        $cache->SetFunction(__FUNCTION__);
        $cache->SetMode('sitemes'.$t);
        $fn = $cache->fpath(func_get_args());
        if ( file_exists( $fn ) && (time() - filemtime( $fn ) < 7000) && ! $cache->GetClose() )
        {
            include( $fn );
        }
        else
        {
            $rr = $this->_get_appid_appsecret();
            $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$rr['appid'].'&secret='.$rr['appsecret'];
            $con = $this->curlGet( $url );
            $json = json_decode( $con );
            $rt = $json->access_token; //获取 access_token
            
            $cache->write( $fn, $rt, 'rt' );
       }
       return $rt;
    }
    
    private function reply( $data )
    {
        //语音功能
        if ( isset($data['MsgType']) ) {
            if ('voice' == $data['MsgType']) {
                $data['Content'] = $data['Recognition'];
                $this->data['Content'] = $data['Recognition'];
            }
        }
        
        // 判断关注
        if ( isset( $data['Event'] ) ) {
            if ('CLICK' == $data['Event']) {
                $data['Content'] = $data['EventKey'];
                $this->data['Content'] = $data['EventKey'];
            }
            if ($data['Event'] == 'SCAN') { //语音
                $data['Content'] = $this->getRecognition($data['EventKey']);
                $this->data['Content'] = $data['Content'];
                
            } elseif ($data['Event'] == 'MASSSENDJOBFINISH') {
               
                
            } elseif ('subscribe' == $data['Event']) { //关注后
                /***********************************************/
                $wecha_id = $data['FromUserName']; //用户openid
                
                $sql = "SELECT user_id FROM `{$this->App->prefix()}user` WHERE wecha_id='$wecha_id' LIMIT 1";
                $thisuid = $this->App->findvar($sql);
                if(!($thisuid>0)){  //第一次进来         
                    $pwei = isset($data['EventKey']) ? $data['EventKey'] : '';
                    $spuid = 0;
                    if(!empty($pwei)){
                        $spuid = str_replace('qrscene_','',$pwei);
                        unset($pwei);
                    }
                    if($spuid > 0){//推荐者quid
                        $uuid = $this->App->findvar("SELECT user_id FROM `{$this->App->prefix()}user` WHERE quid='$spuid' LIMIT 1");
                        $this->Session->write('User.tid',$uuid);
                        setcookie(CFGH.'USER[TID]', $uuid, mktime() - 2592000);
                    }
                }
                
                
                //1、更改关注标识 表user_tuijian，user
                //2、更改用户资料
                //3、关注时间、关注排名等
                
                
                $rr = $this->_get_appid_appsecret();
                $appid = $rr['appid'];
                $appsecret = $rr['appsecret'];
                
                $access_token = $this->_get_access_token();
                if ( ! empty( $access_token ) )
                {
                // 获取用户信息
                $url            = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$access_token.'&openid='.$wecha_id;
                $con            = $this->curlGet($url);
                $nickname       = '';
                $sex            = '';
                $city           = '';
                $province       = '';
                $headimgurl     = '';
                $subscribe_time = '';
                if ( ! empty( $con ) )
                {
                    $json=json_decode($con);
                    $subscribe = $json->subscribe;
                    $nickname = isset($json->nickname)?$json->nickname : '';
                    $sex = isset($json->sex)?$json->sex : '';
                    $city = isset($json->city)?$json->city : '';
                    $province = isset($json->province)?$json->province : '';
                    $headimgurl = isset($json->headimgurl)?$json->headimgurl : '';
                    $subscribe_time = isset($json->subscribe_time)?$json->subscribe_time : '';
            
                    $this->Session->write('User.subscribe','1');
                    setcookie(CFGH.'USER[SUBSCRIBE]', '1', mktime() + 2592000);
                    $dd = array();
                    $dd['is_subscribe'] = '1';
                    $dd['subscribe_time'] = mktime();
                    if(!empty($nickname)) $dd['nickname'] = $nickname;
                    if(!empty($sex)) $dd['sex'] = $sex;
                    if(!empty($city)) $dd['cityname'] = $city;
                    if(!empty($province)) $dd['provincename'] = $province;
                    if(!empty($headimgurl)) $dd['headimgurl'] = $headimgurl;
                    if(!empty($subscribe_time)) $dd['subscribe_time'] = $subscribe_time;
                    
                    //检查是否存在该用户
                    $ukey = $this->Session->read('User.ukey');
                    if(empty($ukey)) $ukey = isset($_COOKIE[CFGH.'USER']['UKEY']) ? $_COOKIE[CFGH.'USER']['UKEY'] : '';
                    if(!empty($ukey) && $ukey!=$wecha_id){//不是当前用户
                        $sql = "SELECT user_id FROM `{$this->App->prefix()}user` WHERE wecha_id='$wecha_id' LIMIT 1";
                        $uid = $this->App->findvar($sql);
                    }else{
                        $uid = $this->Session->read('User.uid');
                        if(!($uid>0)){
                            $uid = isset($_COOKIE[CFGH.'USER']['UID']) ? $_COOKIE[CFGH.'USER']['UID'] : '0';
                            if(!($uid>0)){
                                    $sql = "SELECT user_id FROM `{$this->App->prefix()}user` WHERE wecha_id='$wecha_id' LIMIT 1";
                                    $uid = $this->App->findvar($sql);
                                    $this->Session->write('User.uid',$uid);
                                    setcookie(CFGH.'USER[UID]', $uid, mktime() + 2592000);
                            }
                        }
                    }
                    
		    $this->writeLog( __FUNCTION__ . "|user_id:" . $uid . '|' . json_encode($dd, JSON_UNESCAPED_UNICODE) );
                    if($uid > 0){
                        $this->App->update('user',$dd,'user_id',$uid);
                        $counts = $this->App->findvar("SELECT COUNT(user_id) FROM `{$this->App->prefix()}user` WHERE is_subscribe='1'");
                        $this->App->update('user',array('subscribe_rank'=>$counts),'user_id',$uid); //更改排名
                    }else{
                        //添加用户
                        $dd['user_name'] = $wecha_id;
                        $dd['wecha_id'] = $wecha_id;
                        $t = mktime();
                        $dd['password'] = md5('A123456');
                        // 默认开通分销商
                        $sql = "Select openfxauto From `{$this->App->prefix()}userconfig` limit 1";
                        $fxauto = $this->App->findvar($sql);
                        if($fxauto){
                            $dd['user_rank'] = 12;
                        }else{
                            $dd['user_rank'] = 1;
                        }
                        
                        $ip = Import::basic()->getip();
                        $dd['reg_ip'] = $ip ? $ip : '0.0.0.0';
                        $dd['reg_time'] = $t;
                        $dd['reg_from'] = Import::ip()->ipCity($ip);
                        $dd['last_login'] = mktime();
                        $dd['last_ip'] = $dd['reg_ip'];
                        $dd['active'] = 1;
                        if($this->App->insert('user',$dd)){
                                $uid = $this->App->iid();
                                $counts = $this->App->findvar("SELECT COUNT(user_id) FROM `{$this->App->prefix()}user` WHERE is_subscribe='1'");
                                $$counts = $counts+1;
                                $this->App->update('user',array('subscribe_rank'=>$counts),'user_id',$uid); //更改排名
                                
                                $this->Session->write('User.username',$dd['user_name']);
                                $this->Session->write('User.uid',$uid);
                                $this->Session->write('User.active','1');
                                $this->Session->write('User.rank','1');
                                $this->Session->write('User.ukey',$dd['wecha_id']);
                                //$this->Session->write('User.pass',$dd['password']);
                                $this->Session->write('User.addtime',mktime());
                                //写入cookie
                                setcookie(CFGH.'USER[UKEY]',$dd['wecha_id'],mktime()+2592000);
                                setcookie(CFGH.'USER[UID]',$uid,mktime()+2592000);
                                
                                $tid = $this->Session->read('User.tid');    
                                if(!($tid>0)) $tid = isset($_COOKIE[CFGH.'USER']['TID']) ? $_COOKIE[CFGH.'USER']['TID'] : "0"; //分享的来源ID
                                $to_wecha_id = $this->Session->read('User.to_wecha_id'); //来源ID
                                if(!($to_wecha_id>0)) $to_wecha_id = isset($_COOKIE[CFGH.'USER']['TOOPENID']) ? $_COOKIE[CFGH.'USER']['TOOPENID'] : "0";
    
                                if($tid!=$uid){//加入分享表
                                    $dd = array();
                                    //$url = $this->Session->read('User.url');
                                    $dd['share_uid'] = $tid; //分享者uid
                                    $dd['parent_uid'] = $to_wecha_id > 0 ? $to_wecha_id : $tid; //关注者分享ID
                                    $dd['uid'] = $uid;
                                    $puid = $dd['parent_uid'];
                                    $duid = 0;
                                    //正常来说一下代理不会执行到
                                    if($puid > 0){
                                        //检查是否是代理
                                        $rank = $this->App->findvar("SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id = '$puid' LIMIT 1");
                                        if($rank!='1'){
                                            $duid = $puid;
                                        }else{
                                            //检查推荐的代理ID
                                            $duid = $this->App->findvar("SELECT daili_uid FROM `{$this->App->prefix()}user_tuijian` WHERE uid = '$puid' LIMIT 1");
                                        }
                                    }
                                    //$dd['url'] = $url;
                                    $dd['addtime'] = mktime();
                                    if($this->App->insert('user_tuijian',$dd)){ //添加推荐用户
                                           if($dd['share_uid'] > 0){
                                                $id = $dd['share_uid'];
                                                $sql = "UPDATE `{$this->App->prefix()}user` SET `share_ucount` = `share_ucount`+1 WHERE user_id = '$id'";
                                                $this->App->query($sql);
                                           }
                                    }
                                    if($fxauto){
                                       $this->update_daili_tree($uid);
                                    }
                                    unset($dd);
                                } //end if
                                
                                //添加地址
                                if(!empty($city) && !empty($province)){
                                    $sql = "SELECT region_id FROM `{$this->App->prefix()}region` WHERE region_name LIKE '%$city%' LIMIT 1";
                                    $cityid = $this->App->findvar($sql);
                                    $sql = "SELECT region_id FROM `{$this->App->prefix()}region` WHERE region_name LIKE '%$province%' LIMIT 1";
                                    $provinceid = $this->App->findvar($sql);
                                    if($cityid > 0 && $provinceid>0){
                                        $dd = array();
                                        $dd['consignee'] = $nickname;
                                        $dd['user_id'] = $uid;
                                        $dd['sex'] = $sex;
                                        $dd['city'] = $cityid;
                                        $dd['province'] = $provinceid;
                                        $dd['country'] = 1;
                                        $dd['is_own'] = 1;
                                        $this->App->insert('user_address',$dd);
                                        unset($dd);
                                    }
                                }//end if
                        } //end insert
                    } //end if uid>0
            
                    //增加关注积分
                    $sql = "SELECT tuijiannum FROM `{$this->App->prefix()}userconfig` LIMIT 1";//配置信息
                    $tuijiannum = $this->App->findvar($sql);
                                        
                    if($tuijiannum > 0){
                        //查找推荐用户人
                        $uid = $this->Session->read('User.uid');
                        if(!($uid > 0)){
                            $uid = isset($_COOKIE[CFGH.'USER']['UID']) ? $_COOKIE[CFGH.'USER']['UID'] : "0";
                            if(!($uid > 0)){
                                $uid = $this->App->findvar("SELECT user_id FROM `{$this->App->prefix()}user` WHERE wecha_id='$wecha_id' LIMIT 1");
                            }
                        }
                        if($uid > 0){
                            $purt = $this->App->findrow("SELECT ut.parent_uid,u.wecha_id FROM `{$this->App->prefix()}user_tuijian` AS ut LEFT JOIN `{$this->App->prefix()}user` AS u ON u.user_id = ut.parent_uid WHERE ut.uid='$uid' LIMIT 1");
                            $puid = isset($purt['parent_uid']) ? $purt['parent_uid'] : '0';
                            $pwecha_id = isset($purt['wecha_id']) ? $purt['wecha_id'] : '';
                            //检查积分是否返了
                            $sql = "SELECT time FROM `{$this->App->prefix()}user_point_change` WHERE uid='$puid' AND subuid='$uid' LIMIT 1";
                            $t = $this->App->findvar($sql);
                            $run = 'true';
                            if(empty($t)){
                                //$run = 'true';
                            }else{
                                if((mktime()-$t) > 60){
                                    //$run = 'true';
                                }else{
                                    $run = 'false';
                                }
                            }
                            if($puid > 0 && $run=='true'){ //派送积分  推荐的用户
                                $dd = array();
                                $dd['time'] = mktime();
                                $dd['points'] = $tuijiannum;
                                $dd['uid'] = $puid;
                                $dd['subuid'] = $uid;
                                $dd['changedesc'] = '推荐关注送积分';
                                $dd['thismonth'] = date('Y-m-d',mktime());
                                $this->App->insert('user_point_change',$dd);
                                
                                //积分总计、关注数叠加 方便排序及查找
                                $tuijiannum = intval($tuijiannum);
                                if(!($tuijiannum>0)) $tuijiannum = 1;
                                $sql = "UPDATE `{$this->App->prefix()}user` SET `mypoints` = `mypoints`+$tuijiannum,`points_ucount` = `points_ucount`+$tuijiannum,`guanzhu_ucount` = `guanzhu_ucount`+1 WHERE user_id = '$puid' AND is_subscribe='1'";
                                $this->App->query($sql);
                                
                                //父类UID 
                                $this->send(array('openid'=>$pwecha_id,'appid'=>'','appsecret'=>'','nickname'=>$nickname),'guanzhu');
                                
                                //查找上一级代理
                                $dts = $this->App->findcol("SELECT p1_uid,p2_uid,p3_uid FROM `{$this->App->prefix()}user_tuijian_fx` WHERE uid = '$puid' LIMIT 1");
                                $duid = $dts[0];
                                $duid2 = $dts[1];
                                $duid3 = $dts[2];
                                if($duid > 0){
                                        $pwecha_id = $this->App->findvar("SELECT wecha_id FROM `{$this->App->prefix()}user` WHERE user_id='$duid' LIMIT 1");
                                        $this->send(array('openid'=>$pwecha_id,'appid'=>'','appsecret'=>'','nickname'=>$nickname),'guanzhudaili');
                                }
                                if($duid2 > 0){
                                        $pwecha_id = $this->App->findvar("SELECT wecha_id FROM `{$this->App->prefix()}user` WHERE user_id='$duid2' LIMIT 1");
                                        $this->send(array('openid'=>$pwecha_id,'appid'=>'','appsecret'=>'','nickname'=>$nickname),'guanzhudaili2');
                                }
                                if($duid3 > 0){
                                        $pwecha_id = $this->App->findvar("SELECT wecha_id FROM `{$this->App->prefix()}user` WHERE user_id='$duid3' LIMIT 1");
                                        $this->send(array('openid'=>$pwecha_id,'appid'=>'','appsecret'=>'','nickname'=>$nickname),'guanzhudaili3');
                                }
                                //信息推送
                            }//end if
                        } //end if
                    } //end if
                    /**********************************************/
                
                    $token = $this->token;
                    $keyword = $this->App->findvar("SELECT keyword FROM `{$this->App->prefix()}wxkeyword` WHERE type='guanzhu' LIMIT 1");
                    if(!empty($keyword)){
                    
                        return $this->keyword($keyword);
                        
                        //查找图文
                        /*$sql = "SELECT * FROM `{$this->App->prefix()}wx_article` WHERE keyword='$keyword' LIMIT 1";
                        $rts = $this->App->findrow($sql);
                        if(empty($rts)){
                            return array('商家暂未有设置关注回复，请联系商家设置', 'text');
                        }else{
                            $type = $rts['type'];
                            if($type=="txt"){ //文本信息
                                return array($rts['content'], 'text');
                            }else{
                                  
                                //回复图文信息
                                $url = $rts['art_url'];
                                $id = $rts['article_id'];
                                if(empty($url)) $url = SITE_URL.'m/art.php?id='.$id;
                                $img = SITE_URL.$rts['article_img'];
                                $about = $rts['about'];
                                $title = $rts['article_title'];
                                
                                $data['title'] = $title;
                                $data['keyword'] = $about;
                                $data['picurl'] = $img;
                                $data['url'] = $url;
                                return array(array(array($data['title'], $data['keyword'], $data['picurl'], $data['url'])), 'news');
                            }
                        }*/
                    }else{
                            //这是回复推荐人的信息
                            if($uid > 0){
                                $gzcount = $this->App->findvar("SELECT COUNT(user_id) FROM `{$this->App->prefix()}user` LIMIT 1");
                                $gzcount = $gzcount*5+750;
                                if($puid > 0){
                                    $nickname = $this->App->findvar("SELECT nickname FROM `{$this->App->prefix()}user` WHERE user_id = '$puid' LIMIT 1");
                                    if(empty($nickname)) $nickname = '官网';
                                    $str = '来自好友【'.$nickname.'】的推荐成为第【'.$gzcount.'】位会员，立即关注，抢夺东家地盘！';
                                }else{
                                    $str = '来自【官网】的推荐成为第【'.$gzcount.'】位会员，立即关注，抢夺东家地盘！';
                                }
                                return array($str, 'text');
                            }
                    }
                    
/*                  if ($follow_data['home'] == 1) {
                        return $this->keyword($follow_data['keyword']);
                    } else {
                        return array(html_entity_decode($follow_data['content']), 'text');
                    }*/
                   
                    
                }else{//end if
                    return array('获取微信用户信息失败，确保是否支持CURL远程获取！', 'text');
                }
                        }
            } elseif ('unsubscribe' == $data['Event']) { //取消关注
                //释放cookie 释放session 更改关注标记
                $wecha_id = $this->wecha_id; //用户openid
                $this->App->update('user',array('is_subscribe'=>'0'),'wecha_id',$wecha_id); //更改排名
                $this->Session->write('User.subscribe',null);
                unset($_SESSION['User']['subscribe']);
                if(isset($_COOKIE[CFGH.'USER']['SUBSCRIBE'])) setcookie(CFGH.'USER[SUBSCRIBE]',"",mktime()-2592000); 
                unset($_COOKIE[CFGH.'USER']['SUBSCRIBE']);
                
                //改变取消关注的数据
                $sql = "SELECT tuijiannum FROM `{$this->App->prefix()}userconfig` LIMIT 1";//配置信息
                $tuijiannum = $this->App->findvar($sql);
                if($tuijiannum > 0){
                    //查找推荐用户人
                    $uid = $this->Session->read('User.uid');
                    if(!($uid > 0)){
                        $uid = $this->App->findvar("SELECT user_id FROM `{$this->App->prefix()}user` WHERE wecha_id='$wecha_id' LIMIT 1");
                    }
                    if($uid > 0){
                        //父类UID
                        $purt = $this->App->findrow("SELECT ut.parent_uid,u.wecha_id FROM `{$this->App->prefix()}user_tuijian` AS ut LEFT JOIN `{$this->App->prefix()}user` AS u ON u.user_id = ut.parent_uid WHERE ut.uid='$uid' LIMIT 1");
                        $puid = isset($purt['parent_uid']) ? $purt['parent_uid'] : '0';
                        $pwecha_id = isset($purt['wecha_id']) ? $purt['wecha_id'] : '';
                        if($puid > 0){ //派送积分
                            $dd = array();
                            $dd['time'] = mktime();
                            $dd['points'] = -$tuijiannum;
                            $dd['uid'] = $puid;
                            $dd['subuid'] = $uid;
                            $dd['changedesc'] = '用户取消关注减积分';
                            $dd['thismonth'] = date('Y-m-d',mktime());
                            $this->App->insert('user_point_change',$dd);
                            
                            //积分总计、关注数叠加 方便排序及查找
                            $tuijiannum = intval(-$tuijiannum);
                            $sql = "UPDATE `{$this->App->prefix()}user` SET `mypoints` = `mypoints`+$tuijiannum,`points_ucount` = `points_ucount`+$tuijiannum,`guanzhu_ucount` = `guanzhu_ucount`-1 WHERE user_id = '$puid'";
                            $this->App->query($sql);
                        }
                    }
                }
            } elseif ($data['Event'] == 'LOCATION') { //自动获取位置回复
                 $wecha_id = $data['FromUserName']; //用户openid
                 $sql = "UPDATE `{$this->App->prefix()}user` SET `lng` = ".$data['Latitude'].",`lat` = ".$data['Longitude']." WHERE wecha_id='$wecha_id'";
                 $this->App->query($sql);
            }
        }
        
        return $this->keyword($data['Content']);
    } 
    
    function requestdata( $field )
    {
        $data['year']  = date('Y');
        $data['month'] = date('m');
        $data['day']   = date('d');
        $data['token'] = $this->token;
       /* $mysql = M('Requestdata');
        $check = $mysql->field('id')->where($data)->find();
        if ($check == false) {
            $data['time'] = time();
            $data[$field] = 1;
            $mysql->add($data);
        } else {
            $mysql->where($data)->setInc($field);
        }*/
    }
    
    function get_user_parent_uid()
    {
        $uid = $this->Session->read('User.uid');
        if ( ! ($uid > 0)) return 0;
        
        $t = Common::_return_px();
        $cache = Import::ajincache();
        $cache->SetFunction(__FUNCTION__);
        $cache->SetMode( 'sitemes' . $t );
        $fn = $cache->fpath( array( '0' => $uid ) );
        if ( file_exists( $fn ) && (time() - filemtime( $fn ) < 7000) && ! $cache->GetClose() )
        {
            include($fn);
        }
        else
        {
            $sql = "SELECT parent_uid FROM `{$this->App->prefix()}user_tuijian` WHERE uid = '$uid' LIMIT 1";
            $rt = $this->App->findvar( $sql );
            $cache->write( $fn, $rt, 'rt' );
        }
        return $rt;
    }
    
    public function return_daili_uid( $uid = 0, $k = 0 )
    {
        if ( ! ($uid > 0) )
        {
            return 0;
        }
        $puid = 0;
        if ( $k < 20 )
        {
            $sql  = "SELECT parent_uid FROM `{$this->App->prefix()}user_tuijian` WHERE uid = '$uid' LIMIT 1";
            $puid = $this->App->findvar($sql);
            $sql  = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id = '$puid' LIMIT 1";
            $rank = $this->App->findvar($sql);
            if ( $rank == '1' )
            {
                ++$k;
                $this->return_daili_uid( $puid, $k );
            }
            else
            {
                return $puid;
                exit;
            }
        }
        return $puid;
    }
    
    function keyword( $keyword = '' )
    {
        if ( ! (empty( $keyword ) ) ) 
        {
            $wecha_id = $this->wecha_id;
            switch($keyword){
                case '推广链接':
                    $RL = $this->App->findrow("SELECT user_id,is_subscribe FROM `{$this->App->prefix()}user` WHERE wecha_id='$wecha_id' LIMIT 1");
                    $issubscribe = isset($RL['is_subscribe']) ? $RL['is_subscribe'] : '0';
                    $uid = isset($RL['user_id']) ? $RL['user_id'] : '0';
                    unset($RL);
                    if($issubscribe=='0'){
                        return array('请先关注抢占分享地盘！', 'text');
                        exit;
                    }
                    $thisurl = SITE_URL."m/in.php?tid=".$uid;
                    return array('复制链接发送给朋友赚钱:'.$thisurl, 'text');
                    break;
                case 'ranklist':  // 排行榜
                     $RL = $this->App->findrow("SELECT user_id,user_rank FROM `{$this->App->prefix()}user` WHERE wecha_id='{$this->wecha_id}' LIMIT 1");
             $uid = isset($RL['user_id']) ? $RL['user_id'] : '0';
             $purt = $this->App->findrow("SELECT ut.parent_uid,u.wecha_id FROM `{$this->App->prefix()}user_tuijian` AS ut LEFT JOIN `{$this->App->prefix()}user` AS u ON u.user_id = ut.parent_uid WHERE ut.uid='$uid' LIMIT 1");

                    $puid = isset($purt['parent_uid']) ? $purt['parent_uid'] : '0';
                    if($uid > 0){

                                $gzcount = $this->App->findvar("SELECT COUNT(user_id) FROM `{$this->App->prefix()}user` LIMIT 1");

                                $gzcount = $gzcount*5+750;

                                if($puid > 0){

                                    $nickname = $this->App->findrow("SELECT nickname FROM `{$this->App->prefix()}user` WHERE user_id = '$puid' LIMIT 1");

                                    if(empty($nickname)) $nickname = '官网';
                                   
                                    $str = '来自好友【'.$nickname['nickname'].'】的推荐成为第【'.$gzcount.'】位会员，立即关注，抢夺店主地盘！';

                                }else{
                                   
                                    $str = '来自【官网】的推荐成为第【'.$gzcount.'】位会员，立即关注，抢夺店主地盘！';

                                }

                    }
                    
                    $data = '{"touser":"'.$wecha_id.'","msgtype":"text","text":{"content":"'.$str.'"}}';
                    $access_token = $this->_get_access_token();
                    $rt=$this->curlPost('https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token='.$access_token,$data,0);
                    $orderid = $this->App->findvar("SELECT order_id FROM  `{$this->App->prefix()}goods_order_info` where `user_id`='{$RL['user_id']}' and `pay_status`=1");
                    if($orderid or $RL['user_rank'] > 1){
                        
                        return array('你已经是店主 发送你的名片给你的好友 赚钱吧', 'text');
                    }else{
                        return array("您还不是店主，请<a href=\"".SITE_URL."/m/oauth.php?oid=41\">购买商品</a>成为店主", 'text');
                    }
                break;
                case 'qr'://生成二维码
                case '我的二维码'://生成二维码
                    $yuming = str_replace(array('www','.',),'',$_SERVER["HTTP_HOST"]);
                    if(!empty($yuming)) $yuming = $yuming.DS;

                    if(!empty($wecha_id)){
                        $tb = 'markimg';
                        
                        $sql = "SELECT is_subscribe,user_rank,user_id,quid,headimgurl,nickname FROM `{$this->App->prefix()}user` WHERE wecha_id='$wecha_id' LIMIT 1";
                        $RT = $this->App->findrow($sql);
                        if($RT['is_subscribe']=='0'){
                            return array('关注后购买成为合伙人生成推广二维码赚钱吧！', 'text');
                            exit;
                        }
                        
                        $access_token = $this->_get_access_token();
                        // 已经购买
                        $sql = "Select count(*) From `{$this->App->prefix()}goods_order_info` Where `user_id` = '{$RT['user_id']}' And `pay_status` = '1' And `order_status` = '2' ";
                        $buied = $this->App->findvar($sql);
                        if($RT['user_rank']=='1' And !$buied ){
                            //生成推荐人二维码
                            $tb = 'markimg2';
                            $this->send(array('openid'=>$wecha_id,'appid'=>'','appsecret'=>'','nickname'=>''),$tb);
                            exit;
                        }
                        
                        $uid = $RT['user_id'];
                        $quid = $RT['quid'];
                        $headimgurl = $RT['headimgurl'];
                        $nickname = $RT['nickname'];
                        if(empty($nickname)) $nickname = "官网";
                        if(empty($headimgurl)){
                            //return array('请先上传你的微信头像后生成吧！', 'text');
                            //exit;
                        }
                        
                        unset($RT);
                        if(!($quid > 0)){
                            $sql = "SELECT MAX(quid) FROM `{$this->App->prefix()}user` LIMIT 1";
                            $quid = $this->App->findvar($sql);
                            $quid = intval($quid)+1;
                            $this->App->update('user',array('quid'=>$quid),'user_id',$uid);
                        }
                        
                        $fop = Import::fileop();
                        $tis = SYS_PATH.'cache'.DS.$yuming.'qcode'.DS.$uid.DS.'cache'.$quid.'.txt';
                        if(file_exists($tis) && (mktime() - filemtime($tis) < 60)){
                            return;
                            exit;
                        }
                        if(!file_exists($tis) || (mktime() - filemtime($tis) > 60)){
                            $fop->checkDir($tis);
                            @file_put_contents($tis,"run");
                        }
                        
                        $access_token = $this->_get_access_token();

                        //提示生成
                        $this->send(array('openid'=>$wecha_id,'appid'=>'','appsecret'=>'','nickname'=>''),$tb);
                        $f3 = SYS_PATH.'photos'.DS.$yuming.'qcode'.DS.$uid.DS.'ms'.$quid.'.jpg';//原图
                        if(file_exists($f3)){
                                    $type = "image";
                                    $filedata = array("media"=>"@".$f3);
                                    $url = "http://file.api.weixin.qq.com/cgi-bin/media/upload?access_token=$access_token&type=$type";
                                    $result = $this->https_request($url,$filedata);
                                    $json = json_decode($result);
                                    $media_id = $json->media_id;
                                    if(!empty($media_id)) $this->send(array('openid'=>$wecha_id,'appid'=>'','appsecret'=>'','media_id'=>$media_id),'markimgsend');
                                    exit;
                        }
                                                                                                    
                        $f = SYS_PATH.'cache'.DS.$yuming.'qcode'.DS.$uid.DS.'s'.$quid.'.jpg';
                        if(!file_exists($f)){
                                                    
                                //生成二维码
                                $data = '{"action_name": "QR_LIMIT_SCENE", "action_info": {"scene": {"scene_id": '.$quid.'}}}';
                                //$data = '{"action_name": "QR_LIMIT_SCENE", "action_info": {"scene": {"scene_str": "'.$wecha_id.'"}}}';
                                $rt=$this->curlPost('https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token='.$access_token,$data,10);
                                $json=json_decode($rt);
                                $ticket = $json->ticket;
                                $url = $json->url;
                                if(!empty($ticket)){
                                    $str = "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=".$ticket;
                                    $img = file_get_contents($str);
                                    if(empty($img)){ $img = Import::crawler()->curl_get_con($str); }
                                    if(!empty($img)){
                                        $fop->checkDir($f);
                                        @file_put_contents($f,$img);
                                    }
            
                                }
                        }
                        if(!file_exists($f)){
                            return array('生成图片失败，请联系网站管理员解决此问题！', 'text');
                            exit;
                        }
                        $f2 = SYS_PATH.'cache'.DS.$yuming.'qcode'.DS.$uid.DS.'m'.$quid.'.jpg';//二维码
                        $fop->checkDir($f2);
                        $imgobj = Import::img();
                        $imgobj->thumb($f,$f2,225,225);
                        $sql = "SELECT site_url FROM `{$this->App->prefix()}systemconfig` WHERE type='basic' LIMIT 1";
                        $sf = $this->App->findvar($sql);
                        if(!empty($sf)) $sf = SYS_PATH.$sf;
                        //$sf = SYS_PATH.'photos'.DS.$yuming.'codebg.jpg';//原图背景
                        if(file_exists($sf)==false){
                            $sf = SYS_PATH.'photos'.DS.'codebg.jpg';//原图背景
                        }
                        $f3 = SYS_PATH.'photos'.DS.$yuming.'qcode'.DS.$uid.DS.'ms'.$quid.'.jpg';//原图
                        $fop->checkDir($f3);
                        $imgobj->thumb($sf,$f3,530,800);
                        
                        $t = 'false';
                        // 背景和二维码合成
                        $t = $this->mark_img($f3,$f2,152,410);
                        if($t=='true'){
                            //头像
                            $t = "false";
                            $img = file_get_contents($headimgurl);
                            if(empty($img)){ $img = Import::crawler()->curl_get_con($headimgurl); } 
                            $f4 = SYS_PATH.'cache'.DS.$yuming.'qcode'.DS.$uid.DS.'mh'.$quid.'.jpg';//头像
                            if(!empty($img)){
                                $fop->checkDir($f4);
                                @file_put_contents($f4,$img);
                                if(file_exists($f4)){
                                    $f5 = SYS_PATH.'cache'.DS.$yuming.'qcode'.DS.$uid.DS.'mht'.$quid.'.jpg';//小头像
                                    $fop->checkDir($f5);
                                    $imgobj->thumb($f4,$f5,70,70);
                                    if(file_exists($f5)){
                                        // 头像合成
                                        if($this->mark_img($f3,$f5,90,30)=="true"){
                                            // title合成
                                            if($this->mark_txt($f3,$nickname,265,58)=="true"){
                                                $type = "image";
                                                $filedata = array("media"=>"@".$f3);
                                                $url = "http://file.api.weixin.qq.com/cgi-bin/media/upload?access_token=$access_token&type=$type";
                                                $result = $this->https_request($url,$filedata);
                                                $json = json_decode($result);
                                                $media_id = $json->media_id;
                                                if(!empty($media_id)) $this->send(array('openid'=>$wecha_id,'appid'=>'','appsecret'=>'','media_id'=>$media_id),'markimgsend');
                                            }
                                        }
                                    }
                                }
                            }
    
                        }else{
                            return array('生成图片失败，请联系网站管理员解决此问题！', 'text');
                            exit;
                        }
                    }
                    break;
            }
            
            $sql = "SELECT * FROM `{$this->App->prefix()}wx_article` WHERE keyword LIKE '%$keyword%' ORDER BY vieworder ASC LIMIT 8";
            $rt = $this->App->find($sql);
            if ( ! empty( $rt ) ) {
                if ( count( $rt ) == 1 ) {
                    $rts = $rt[0];
                    if ( ! empty( $rts ) ) {
                        $ty = $rts['type'];
                        if ( $ty == 'txt' ) {
                            if ( ! empty( $rts['content'] ) )
                            {
                                return array($rts['content'], 'text');
                            }
                            else
                            {
                                return array("请在后台先编辑好内容", 'text');
                            }
                        } else {
                            $data['title']   = $rts['article_title'];
                            $data['keyword'] = $rts['about'];
                            $data['picurl']  = empty($rts['article_img']) ? SITE_URL.'m/images/ico-success.png' : SITE_URL.$rts['article_img'];
                            $data['url'] = empty($rts['art_url']) ? SITE_URL.'m/art.php?id='.$rts['article_id'] : $rts['art_url'];
                            return array(array(array($data['title'], $data['keyword'], $data['picurl'], $data['url'])), 'news');
                        }
                    }
                }else{
                    $result = array();
                    $k=0;
                    foreach ( $rt as $row )
                    {
                        if ( $row['type'] == 'txt' ) continue;
                        $result[$k][] = $row['article_title'];
                        $result[$k][] = $row['about'];
                        $result[$k][] = empty($row['article_img']) ? SITE_URL.'m/images/ico-success.png' : SITE_URL.$row['article_img'];
                        $result[$k][] = empty($row['art_url']) ? SITE_URL.'m/art.php?id='.$row['article_id'] : $row['art_url'];
                        ++$k;
                    }
                    return array( $result, 'news' );
                }//end if
            }
        }
    }
    
    function https_request($url, $data = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
    
    function mark_img($image_dir='',$formname = '',$x=0,$y=0){
        $iinfo  = getimagesize($image_dir);
        $nimage = imagecreatetruecolor($iinfo[0],$iinfo[1]);
        $white  = imagecolorallocate($nimage,255,255,255);
        $black  = imagecolorallocate($nimage,0,0,0);
        $red    = imagecolorallocate($nimage,255,0,0);
        $simage = imagecreatefromjpeg($image_dir);

        imagecopy($nimage,$simage,0,0,0,0,$iinfo[0],$iinfo[1]);
        $inn = getimagesize( $formname );  
        $in  = @imagecreatefromJPEG( $formname );
        $wh = imagecolorallocate($in, 255, 255, 255); 
        imagecolortransparent($in,$wh);   
        imagecopy($nimage,$in,$x,$y,0,0,$inn[0],$inn[1]);
        imagedestroy($in);
        imagejpeg($nimage,$image_dir);
        
        return "true";
    }
    
    function mark_txt($image_dir='',$formname = '',$x=0,$y=0){
        $image_dir = Import::gz_iconv()->ec_iconv('UTF8', 'GB2312',$image_dir);
        $iinfo  = getimagesize($image_dir);
        $nimage = imagecreatetruecolor($iinfo[0],$iinfo[1]);
        $white  = imagecolorallocate($nimage,255,255,255);
        $black  = imagecolorallocate($nimage,131,24,30);
        $red    = imagecolorallocate($nimage,255,0,0);
        
        $font = SYS_PATH.'data'.DS.'simhei.ttf'; //定义字体  
            
        $simage = imagecreatefromjpeg($image_dir);
        
        imagecopy($nimage,$simage,0,0,0,0,$iinfo[0],$iinfo[1]);
        
        //imagestring($nimage,5,300,50,$formname,$black);
        imagettftext($nimage,18,0,$x,$y,$black, $font, $formname);
        imagejpeg($nimage,$image_dir);

        return "true";
    }
    
    private function getRecognition( $id )
    {
        return false;
    }
    
    function curlPost($url, $data,$showError=1)
    {
        $ch = curl_init();
        $header = "Accept-Charset: utf-8";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $tmpInfo = curl_exec($ch);
        if ( $showError == '10' ) { return $tmpInfo; exit; }
        
        $errorno = curl_errno( $ch );
        if ( $errorno )
        {
            return array('rt'=>false,'errorno'=>$errorno);
        }
        else
        {
            $js = json_decode( $tmpInfo, 1 );
            if ( intval( $js['errcode'] == 0 ) )
            {
                return array( 'rt'=>true, 'errorno'=>0, 'media_id'=>$js['media_id'], 'msg_id'=>$js['msg_id']);
            }
            else
            {
                if ( $showError )
                {
                    return array('rt'=>true,'errorno'=>10,'msg'=>'发生了Post错误：错误代码'.$js['errcode'].',微信返回错误信息：'.$js['errmsg']);
                }
            }
        }
    }

    public function curlGet( $url )
    {
        $ch = curl_init();
        $header = "Accept-Charset: utf-8";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $temp = curl_exec($ch);
        if(empty($temp)) $temp = Import::crawler()->curl_get_con($url);
        return $temp;
    }
    
    function writeLog($message){
        $message = 'time: ' . date('Y-m-d H:i:s') . '|' . $message;
        file_put_contents('/wwwroot/custom_fenxiao/huahai.log_' . date('Y-m-d'), $message . PHP_EOL, FILE_APPEND);
    }
        
    function update_daili_tree( $uid = 0 )
    {
        if ( $uid > 0 )
        {
            $dd = array();
            $ss = array();
            $ss[] = $uid;
            $dd['uid']    = $uid;
            $dd['p1_uid'] = 0;
            $dd['p2_uid'] = 0;
            $dd['p3_uid'] = 0;
            
            $p1_uid = $this->return_daili_uid($uid);
            
            if ( $p1_uid > 0 && !in_array($p1_uid,$ss) )
            {
                $dd['p1_uid'] = $p1_uid;

                $p2_uid = $this->return_daili_uid( $p1_uid );
                $ss[] = $p1_uid;
                $ss[] = $uid;
                if ( $p2_uid > 0 && ! in_array( $p2_uid, $ss ) )
                {
                    $dd['p2_uid'] = $p2_uid;
                    $p3_uid = $this->return_daili_uid( $p2_uid );
                    $ss[] = $p2_uid;
                    if ( $p3_uid > 0 && ! in_array( $p3_uid, $ss ) )
                    {
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
            $sql = "SELECT id FROM `{$this->App->prefix()}user_tuijian_fx` WHERE uid = '$uid' LIMIT 1";
            $id = $this->App->findvar( $sql );
            
            if ( $id > 0 )
            {
                $this->App->update('user_tuijian_fx',$dd,'id',$id);
            }
            else
            {
                $this->App->insert('user_tuijian_fx',$dd);
            }
        }
    }
}
?>
