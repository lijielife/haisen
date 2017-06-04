<?php

/*
 * 会员登录类
 */
class UserController extends Controller
{

    public function __construct()
    {
        $this->css( array(
            'jquery_dialog.css',
            'user2015.css'
        ) );
        $this->js( array(
            'jquery.json-1.3.js',
            'jquery_dialog.js',
            'common.js',
            'user.js?v=v1'
        ) );
    }

    /**
     * **********
     */
    function get_user_wecha_id_new()
    {
        $rt = $this->action( 'common', '_get_appid_appsecret' );
        if ( is_weixin() == false || $rt['is_oauth'] == '0' )
        {
            unset( $rt );
            return "";
        }
        unset( $rt );
        $t     = Common::_return_px();
        $cache = Import::ajincache();
        $cache->SetFunction( __FUNCTION__ );
        $cache->SetMode( 'user' . $t );
        $uid = $this->Session->read('User.uid');
        $fn = $cache->fpath( array(
            '0' => $uid
        ) );
        if ( file_exists( $fn ) && ! $cache->GetClose() && ! isset($_GET['code']) )
        {
            include ( $fn );
        }
        else
        {
            if ( ! isset( $_GET['code'] ) )
            {
                $this->action( 'common', 'get_user_code' ); // 授权跳转
            }
            $code = isset($_GET['code']) ? $_GET['code'] : '';
            if ( ! empty( $code ) )
            {
                $rr = $this->action( 'common', '_get_appid_appsecret' );
                $appid     = $rr['appid'];
                $appsecret = $rr['appsecret'];
                $access_token = $this->action('common', '_get_access_token');
                $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=' . $appid . '&secret=' . $appsecret . '&code=' . $code . '&grant_type=authorization_code';
                $con = $this->action('common', 'curlGet', $url);
                $json = json_decode( $con );
                if ( empty( $access_token ) )
                {
                    $access_token = $json->access_token;
                }
                
                $wecha_id      = $json->openid;
                $refresh_token = $json->refresh_token; // 获取 refresh_token
                if ( ! empty( $refresh_token ) && ! empty( $access_token ) )
                {
                    if ( empty( $wecha_id ) )
                    {
                        $url = 'https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=' . $appid . '&grant_type=refresh_token&refresh_token=' . $refresh_token;
                        $con = $this->action('common', 'curlGet', $url);
                        $json = json_decode($con);
                        $wecha_id = $json->openid; // 获取 openid
                    }
                }
            }
            $cache->write($fn, $wecha_id, 'wecha_id');
        }
        
        return $wecha_id;
    }

    /**
     * ******************************
     */
    function ajax_checked_fenxiao($data = array())
    {
        $uid = $this->Session->read('User.uid');
        $rrL = $this->action('common', 'get_userconfig');
        if ( $rrL['viewfxset'] == '1' )
        {
            echo "1";
            exit();
        }
        else
        {
            $sql = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id = '$uid' LIMIT 1";
            $rank = $this->App->findvar($sql);
            if ($rank == '1') {
                $appid = $this->Session->read('User.appid');
                if (empty($appid))
                    $appid = isset($_COOKIE[CFGH . 'USER']['APPID']) ? $_COOKIE[CFGH . 'USER']['APPID'] : '';
                $appsecret = $this->Session->read('User.appsecret');
                if (empty($appsecret))
                    $appsecret = isset($_COOKIE[CFGH . 'USER']['APPSECRET']) ? $_COOKIE[CFGH . 'USER']['APPSECRET'] : '';
                    
                    // 发送用户通知
                $wd = $this->App->findrow("SELECT wecha_id,nickname FROM `{$this->App->prefix()}user` WHERE user_id='$uid' LIMIT 1");
                $wecha_id = isset($wd['wecha_id']) ? $wd['wecha_id'] : '';
                $nickname = isset($wd['nickname']) ? $wd['nickname'] : '';
                if (! empty($wecha_id)) {
                    $this->action('api', 'send', array(
                        'openid' => $wecha_id,
                        'appid' => $appid,
                        'appsecret' => $appsecret,
                        'nickname' => $nickname
                    ), 'buymess');
                }
                echo "成为合伙人，抢占地盘，你至少需要购买一件产品哦！";
            } else {
                echo "1";
            }
        }
        exit();
    }

    /**
     * 检查是否分销商
     */
    public function ajax_check_distributor( $data = array() )
    {
        $user_id = $data['user_id'];
        $sql  = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id = '$user_id' LIMIT 1";
        $rank = $this->App->findvar( $sql );
        if ( $rank == '1' )
        {
            die( '0' );
        }
        else
        {
            die( '1' );
        }
    }

    /*
     * @desc 根据两点间的经纬度计算距离
     * @param float $lat 纬度值
     * @param float $lng 经度值
     */
    function getDistance($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6367000; // approximate radius of earth in meters
        
        $lat1 = ($lat1 * pi()) / 180;
        $lng1 = ($lng1 * pi()) / 180;
        
        $lat2 = ($lat2 * pi()) / 180;
        $lng2 = ($lng2 * pi()) / 180; //
        $calcLongitude = $lng2 - $lng1;
        $calcLatitude = $lat2 - $lat1;
        $stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($calcLongitude / 2), 2);
        $stepTwo = 2 * asin(min(1, sqrt($stepOne)));
        $calculatedDistance = $earthRadius * $stepTwo;
        
        return round($calculatedDistance);
    }

    function shoplist($data = array())
    {
        $uid = $this->Session->read('User.uid');
        $sql = "SELECT lat,lng FROM `{$this->App->prefix()}user` WHERE user_id ='{$uid}' LIMIT 1";
        $rs = $this->App->findrow($sql);
        $lat1 = $rs['lat'];
        $lng1 = $rs['lng'];
        $sql = "SELECT * FROM `{$this->App->prefix()}tianjia` order by id desc";
        $rt = $this->App->find($sql);
        $rts = array();
        $k = 0;
        foreach ($rt as $row) {
            $rts[$k] = $row;
            $rts[$k]['tu'] = $row['tu'];
            $rts[$k]['uname'] = $row['uname'];
            $rts[$k]['ads'] = $row['ads'];
            $lat2 = $row['lat'];
            $lng2 = $row['lng'];
            $earthRadius = 6367000;
            $lat1 = ($lat1 * pi()) / 180;
            $lng1 = ($lng1 * pi()) / 180;
            
            $lat2 = ($lat2 * pi()) / 180;
            $lng2 = ($lng2 * pi()) / 180; //
            $calcLongitude = $lng2 - $lng1;
            $calcLatitude = $lat2 - $lat1;
            $stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($calcLongitude / 2), 2);
            $stepTwo = 2 * asin(min(1, sqrt($stepOne)));
            $calculatedDistance = $earthRadius * $stepTwo;
            
            $rts[$k]['distance'] = round($calculatedDistance);
            ++ $k;
        }
        // var_dump($rts);exit;
        if ($lat1 == '') {
            $this->set('rt', $rt);
        } else {
            $this->set('rt', $rts);
        }
        if (! defined(NAVNAME))
            define('NAVNAME', "附近的店");
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template($mb . '/shoplist');
    }

    function myvip()
    {
        if (! defined(NAVNAME))
            define('NAVNAME', "我的会员卡");
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template($mb . '/myvip');
    }

    function shopinfo($data = array())
    {
        $id = $data['id'];
        $sql = "SELECT * FROM `{$this->App->prefix()}article` WHERE article_id = '$id' LIMIT 1";
        
        $rt = $this->App->findrow($sql);
        $this->set('rt', $rt);
        
        if (! defined(NAVNAME))
            define('NAVNAME', $rt['article_title']);
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template($mb . '/shopinfo');
    }

    function shopyuyue($data = array())
    {
        $id = $data['id'];
        if (! defined(NAVNAME))
            define('NAVNAME', '在线预约');
        
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template($mb . '/shopyuyue');
    }

    function ajax_submit_yuyue($data = array())
    {
        $uname = $data['uname'];
        $mobile = $data['mobile'];
        $sex = $data['sex'];
        $yutime = $data['yutime'];
        $sid = $data['sid'];
        if (empty($uname) || empty($mobile) || empty($yutime)) {
            die("请输入完整信息！");
        }
        if ($this->App->insert('shop_yuyue', array(
            'uname' => $uname,
            'mobile_phone' => $mobile,
            'sex' => $sex,
            'yutime' => $yutime,
            'time' => time(),
            'sid' => $sid
        ))) {
            
            $sql = "SELECT colorid FROM `{$this->App->prefix()}article` WHERE article_id='{$sid}' LIMIT 1";
            $uid = $this->App->findvar($sql);
            if ($uid > 0) {
                $rr = $this->App->findrow("SELECT wecha_id,nickname FROM `{$this->App->prefix()}user` WHERE user_id='$uid' AND is_subscribe='1' LIMIT 1");
                $pwecha_id = isset($rr['wecha_id']) ? $rr['wecha_id'] : '';
                $nickname = isset($rr['nickname']) ? $rr['nickname'] : '';
                if (! empty($pwecha_id) && ! empty($nickname)) {
                    $this->action('api', 'send', array(
                        'openid' => $pwecha_id,
                        'appid' => '',
                        'appsecret' => '',
                        'nickname' => $nickname
                    ), 'yuyuesuccess');
                }
            }
            
            die("预约成功！");
        } else {
            die("预约失败，请联系在线客服！");
        }
    }
    
    // 赠送礼包
    function mygift($data = array())
    {
        $uid = $this->checked_login();
        $sql = "SELECT tb1.*,tb2.* FROM `{$this->App->prefix()}bonus_list` AS tb1 LEFT JOIN `{$this->App->prefix()}bonus_type` AS tb2 ON tb2.type_id = tb1.bonus_type_id WHERE tb1.user_id = '$uid'";
        $rt = $this->App->find($sql);
        
        $this->set('rt', $rt);
        if (! defined(NAVNAME))
            define('NAVNAME', "我的礼包");
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template($mb . '/mygift');
    }

    function get_user_info($uid = '')
    {
        if (empty($uid))
            return array();
        
        $t = Common::_return_px();
        $cache = Import::ajincache();
        $cache->SetFunction(__FUNCTION__);
        $cache->SetMode('sitemes' . $t);
        $fn = $cache->fpath(array(
            '0' => $uid
        ));
        if (file_exists($fn) && (time() - filemtime($fn) < 7000) && ! $cache->GetClose()) {
            include ($fn);
        } else {
            $sql = "SELECT * FROM `{$this->App->prefix()}user` WHERE user_id = '$uid' LIMIT 1";
            $rt = $this->App->findrow($sql);
            $cache->write($fn, $rt, 'rt');
        }
        return $rt;
    }
    
    // 我的二维码
    public function myerweima()
    {
        /* 获取微信 appid, appsecret */
        $sql = "SELECT appid, appsecret FROM `{$this->App->prefix()}wxuserset` LIMIT 1";
        $wxuserset = $this->App->findrow( $sql );
        $Import_obj = new Import;
        $jssdk_obj = $Import_obj->wx_jssdk( $wxuserset['appid'], $wxuserset['appsecret'] );
        $signPackage = $jssdk_obj->GetSignPackage();
        $this->set( 'signPackage', $signPackage );
        
        $uid = $this->checked_login();
        $url = ADMIN_URL . 'user.php?act=company_qrcode%26tid=' . $uid;

        $sql = "SELECT nickname FROM `{$this->App->prefix()}user` WHERE user_id = {$uid} LIMIT 1";
        $user_info = $this->App->findrow( $sql );
        $this->set( 'nickname', $user_info['nickname'] );

        if ( ! defined( NAVNAME ) )
        {
            define( 'NAVNAME', '我的二维码' );
        }
        $this->title( $GLOBALS['LANG']['site_name'] );
        $this->set( 'url', $url );

        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template( $mb . '/myerweima' );
    }

    /**
     * 公众号 二维码显示
     */
    public function company_qrcode()
    {
        /* 获取微信 appid, appsecret */
        $sql = "SELECT appid, appsecret FROM `{$this->App->prefix()}wxuserset` LIMIT 1";
        $wxuserset = $this->App->findrow( $sql );
        $Import_obj = new Import;
        $jssdk_obj = $Import_obj->wx_jssdk( $wxuserset['appid'], $wxuserset['appsecret'] );
        $signPackage = $jssdk_obj->GetSignPackage();
        $this->set( 'signPackage', $signPackage );

        $uid = $this->checked_login();
        /* 推荐人的id,获取推荐人昵称 */
        $recom_id = intval( $_GET['recom_id'] );
        if ( $recom_id )
        {
            $sql = "SELECT nickname FROM `{$this->App->prefix()}user` WHERE user_id = {$recom_id} LIMIT 1";
            $recom_user = $this->App->findrow( $sql );
            $this->set( 'recom_nickname', $recom_user['nickname'] );
        }

        $this->action('common', 'checkjump');        
        $filename = $uid . '.png';
        $t = Common::_return_px();
        $f = SYS_PATH_PHOTOS . 'qcody' . DS . (! empty($t) ? $t . DS : '') . $uid . DS . $filename;
        $issubscribe = '0';
        if ( $uid > 0 ) {
            $sql = "SELECT is_subscribe FROM `{$this->App->prefix()}user` WHERE user_id = '$uid' LIMIT 1";
            $issubscribe = $this->App->findvar($sql);
        }
        if ( $issubscribe == '0' ) {
            $to_wecha_id = $this->action('common', 'get_user_parent_uid');
            $thisurl = ADMIN_URL . "?toid=" . $to_wecha_id . "&tid=" . $uid;
        } else {
            $thisurl = ADMIN_URL . "?yu=sure&tid=" . $uid;
        }
        
        if ( ! (is_file($f)) || ! file_exists($f) || (time() - filemtime($fn) > 10000) ) {
            $this->action('common', 'mark_phpqrcode', $f, $thisurl);
        }
        
        $this->set('thisurl', $thisurl);
        if (! defined(NAVNAME))
            define('NAVNAME', "我的二维码");
        $this->set('qcodeimg', SITE_URL . 'photos/qcody/' . (! empty($t) ? $t . '/' : '') . $uid . '/' . $uid . '.png');
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->title( $GLOBALS['LANG']['site_name'] );
        $this->template( $mb . '/company_qrcode' );
    }

    function ajax_down_img()
    {
        $uid = $this->Session->read('User.uid');
        $filename = $uid . '.png';
        $qcodeimg = SYS_PATH_PHOTOS . 'qcody' . DS . $uid . DS . $filename;
        Import::fileop()->downloadfile($qcodeimg, 'image/jpg');
    }
    
    // AJAX获取分页信息示例
    function ajax_zpoints_page($rts = array())
    {
        $hh = $rts['hh'];
        $tops = $rts['tops'];
        $tops = intval($tops);
        if (($tops - $hh) >= 0) {
            $page = ceil($tops / $hh);
            $list = 30;
            $start = $page * $list;
            
            $sql = "SELECT nickname,headimgurl,is_subscribe,points_ucount,money_ucount,share_ucount,guanzhu_ucount,reg_time,subscribe_time,is_subscribe FROM `{$this->App->prefix()}user` WHERE active='1' ORDER BY points_ucount DESC,share_ucount DESC,reg_time ASC LIMIT $start,$list";
            $ulist = $this->App->find($sql);
            
            $this->set('ulist', $ulist);
            $this->set('pagec', $page * $list);
            echo $this->fetch('load_zpoints', true);
        }
        echo "";
        exit();
    }
    
    // AJAX获取我的邀请
    function ajax_myshate_page($rts = array())
    {
        $hh = $rts['hh'];
        $tops = $rts['tops'];
        $tops = intval($tops);
        if (($tops - $hh) >= 0) {
            $page = ceil($tops / $hh);
            $list = 30;
            $start = $page * $list;
            $uid = $this->Session->read('User.uid');
            //$uid = '1891';
            $sql = "SELECT tb1.*,tb2.subscribe_time,tb2.reg_time,tb2.nickname,tb2.headimgurl,tb2.points_ucount,tb2.share_ucount,tb2.guanzhu_ucount,tb2.is_subscribe FROM `{$this->App->prefix()}user_tuijian` AS tb1";
            $sql .= " LEFT JOIN `{$this->App->prefix()}user` AS tb2";
            $sql .= " ON tb1.uid = tb2.user_id";
            $sql .= " WHERE tb1.share_uid = '$uid' ORDER BY tb2.share_ucount DESC,tb2.points_ucount DESC,tb1.id DESC LIMIT $start,$list";
            $ulist = $this->App->find($sql);
            
            $this->set('ulist', $ulist);
            $this->set('pagec', $page * $list);
            echo $this->fetch('load_myshate', true);
        }
        echo "";
        exit();
    }
    
    // AJAX获取我的好友
    function ajax_myuser_page($rts = array())
    {
        $hh = $rts['hh'];
        $tops = $rts['tops'];
        $tops = intval($tops);
        if (($tops - $hh) >= 0) {
            $page = ceil($tops / $hh);
            $list = 30;
            $start = $page * $list;
            
            $uid = $this->Session->read('User.uid');
            $sql = "SELECT tb1.*,tb2.subscribe_time,tb2.reg_time,tb2.nickname,tb2.headimgurl,tb2.points_ucount,tb2.share_ucount,tb2.guanzhu_ucount,tb2.is_subscribe FROM `{$this->App->prefix()}user_tuijian` AS tb1";
            $sql .= " LEFT JOIN `{$this->App->prefix()}user` AS tb2";
            $sql .= " ON tb1.uid = tb2.user_id";
            $sql .= " WHERE tb1.parent_uid = '$uid' AND tb2.is_subscribe ='1' ORDER BY tb2.share_ucount DESC,tb2.points_ucount DESC,tb1.id DESC LIMIT $start,$list";
            $ulist = $this->App->find($sql);
            
            $this->set('ulist', $ulist);
            $this->set('pagec', $page * $list);
            echo $this->fetch('load_myuser', true);
        }
        echo "";
        exit();
    }
    
    // 用户登录
    function login()
    {
        $this->css('login.css');
        if (($this->is_login())) {
            $this->jump(ADMIN_URL . 'user.php');
            exit();
        } //
        $this->title("用户登录" . ' - ' . $GLOBALS['LANG']['site_name']);
        
        $rt['hear'][] = '<a href="' . ADMIN_URL . '">首页</a>&nbsp;&gt;&nbsp;';
        $rt['hear'][] = '用户登录';
        
        // 地区
        $sql = "SELECT * FROM `{$this->App->prefix()}region` WHERE parent_id='76' AND region_type='3' ORDER BY region_id ASC";
        $rt['diqucate'] = $this->App->find($sql);
        
        // 店铺分类
        $sql = "SELECT * FROM `{$this->App->prefix()}user_cate` WHERE parent_id='0' AND is_show='1' ORDER BY sort_order ASC,cat_id ASC";
        $rt['shopcate'] = $this->App->find($sql);
        
        if (! defined(NAVNAME))
            define('NAVNAME', "用户登陆");
        $this->set('rt', $rt);
        
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template($mb . '/user_login');
    }
    
    // 重设密码
    function ajax_rp_pass($data = array())
    {
        $uname = $data['uname'];
        $email = $data['email'];
        $pass = $data['pass'];
        if (empty($uname) || empty($email) || empty($pass)) {
            die("目前无法完成你的请求！");
        }
        $md5pass = md5(trim($pass));
        $sql = "UPDATE `{$this->App->prefix()}user` SET password ='$md5pass' WHERE user_name='$uname' AND email='$email'";
        if ($this->App->query($sql)) {
            die("");
        } else {
            die("目前无法完成你的请求！");
        }
    }
    
    // 用户注册
    function register()
    {
        $this->css('login.css');
        if (($this->is_login())) {
            $this->jump(ADMIN_URL . 'user.php');
            exit();
        } //
        $this->title("用户注册" . ' - ' . $GLOBALS['LANG']['site_name']);
        $rt['hear'][] = '<a href="' . ADMIN_URL . '">首页</a>&nbsp;&gt;&nbsp;';
        $rt['hear'][] = '用户注册';
        $rt['province'] = $this->get_regions(1); // 获取省列表
                                                 
        // 地区
        $sql = "SELECT * FROM `{$this->App->prefix()}region` WHERE parent_id='76' AND region_type='3' ORDER BY region_id ASC";
        $rt['diqucate'] = $this->App->find($sql);
        
        // 店铺分类
        $sql = "SELECT * FROM `{$this->App->prefix()}user_cate` WHERE parent_id='0' AND is_show='1' ORDER BY sort_order ASC,cat_id ASC";
        $rt['shopcate'] = $this->App->find($sql);
        
        if (! defined(NAVNAME))
            define('NAVNAME', "用户注册");
        $this->set('rt', $rt);
        
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template($mb . '/user_register');
    }
    
    // 当前文章的分类的所有文章
    function __get_all_article($type = 'default')
    {
        $article_list = $this->Cache->read(3600);
        if (is_null($rt)) {
            $order = "ORDER BY tb1.vieworder ASC, tb1.article_id DESC";
            $sql = "SELECT tb1.article_title,tb1.cat_id, tb1.article_id,tb2.cat_name FROM `{$this->App->prefix()}article` AS tb1";
            $sql .= " LEFT JOIN `{$this->App->prefix()}article_cate` AS tb2";
            $sql .= " ON tb1.cat_id = tb2.cat_id";
            $sql .= " WHERE tb2.type='$type'  $order";
            $rt = $this->App->find($sql);
            $article_list = array();
            if (! empty($rt)) {
                foreach ($rt as $k => $row) {
                    $article_list[$row['cat_id']][$k] = $row;
                    $article_list[$row['cat_id']][$k]['url'] = get_url($row['article_title'], $row['article_id'], $type . '.php?id=' . $row['article_id'], 'article', array(
                        $type,
                        'article',
                        $row['article_id']
                    ));
                }
                unset($rt);
            }
            $this->Cache->write($article_list);
        }
        return $article_list;
    }
    
    // 再次检测用户信息
    function _get_weixin_user_info($rts = array())
    {
        $t = Common::_return_px();
        $cache = Import::ajincache();
        $cache->SetFunction(__FUNCTION__);
        $cache->SetMode('sitemes' . $t);
        $fn = $cache->fpath( func_get_args() );
        $this->writeLog(__FILE__ . '|FILE_CACHE:' . $fn);
        if (file_exists($fn) && (time() - filemtime($fn) < 10000) && ! $cache->GetClose()) {} else {
            $wecha_id = $rts['wecha_id'];
            $is_subscribe = $rts['is_subscribe'];
            $nickname = $rts['nickname'];
            $headimgurl = $rts['headimgurl'];
            $cityname = $rts['cityname'];
            $provincename = $rts['provincename'];
            if (! empty($wecha_id) && $is_subscribe == '1' && (empty($nickname) || empty($headimgurl) || empty($cityname) || empty($provincename))) {
                // 1、更改关注标识 表user_tuijian，user
                // 2、更改用户资料
                // 3、关注时间、关注排名等
                $rr = $this->action('common', '_get_appid_appsecret');
                $appid = $rr['appid'];
                $appsecret = $rr['appsecret'];
                
                $access_token = $this->action('common', '_get_access_token');
                
                // 获取用户信息
                $url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token=' . $access_token . '&openid=' . $wecha_id;
                $con = Import::crawler()->curl_get_con($url);
                $json = json_decode($con);
                $subscribe = $json->subscribe;
                $nickname = isset($json->nickname) ? $json->nickname : '';
                $sex = isset($json->sex) ? $json->sex : '';
                $city = isset($json->city) ? $json->city : '';
                $province = isset($json->province) ? $json->province : '';
                $headimgurl = isset($json->headimgurl) ? $json->headimgurl : '';
                $subscribe_time = isset($json->subscribe_time) ? $json->subscribe_time : '';
                $this->Session->write('User.subscribe', $subscribe);
                setcookie(CFGH . 'USER[SUBSCRIBE]', $subscribe, time() + 2592000);
                
                $dd = array();
                if (! empty($nickname))
                    /* 过滤 Emoji 表情 */
                    $nickname = json_encode( $nickname );
                    $nickname = preg_replace( "#(\\\ue[0-9a-f]{3})#ie", "", $nickname );
                    $nickname = preg_replace( "#(\\\ud[0-9a-f]{3})#ie", "", $nickname );
                    $nickname = json_decode( $nickname );
                    $dd['nickname'] = $nickname;
                if (! empty($sex))
                    $dd['sex'] = $sex;
                if (! empty($city))
                    $dd['cityname'] = $city;
                if (! empty($province))
                    $dd['provincename'] = $province;
                if (! empty($headimgurl))
                    $dd['headimgurl'] = $headimgurl;
                if (! empty($subscribe_time))
                    $dd['subscribe_time'] = $subscribe_time;
                $this->writeLog(__FILE__ . '|' . json_encode($json, JSON_UNESCAPED_UNICODE));
                if (! empty($dd)) {
                    $dd['is_subscribe'] = $json->subscribe;
                    $uid = $this->Session->read('User.uid');
                    $this->App->update('user', $dd, 'user_id', $uid);

                    $parent_id = $this->App->findvar("SELECT parent_uid FROM `{$this->App->prefix()}user_tuijian` WHERE uid = '$uid' LIMIT 1");
                    $point_change_info = $this->App->findvar("SELECT * FROM `{$this->App->prefix()}user_point_change` WHERE subuid = '$uid' AND point_origin='1' LIMIT 1");
                    if ( !empty( $parent_id ) && empty( $point_change_info ) ) {
                        $sql = "UPDATE `{$this->App->prefix()}user` SET `points_ucount` = `points_ucount`+1,`mypoints` = `mypoints`+1 WHERE user_id = '$parent_id'";
                        $thismonth = date('Y-m-d', time());
                        $this->App->query($sql);
                        $this->App->insert('user_point_change', array(
                            'thismonth'    => $thismonth,
                            'points'       => '1',
                            'changedesc'   => '推荐注册返积分',
                            'time'         => time(),
                            'uid'          => $parent_id,
                            'subuid'       => $uid,
                            'point_origin' => '1'
                        ));
                    }

                }
            }

            $rt = "run";
            $cache->write($fn, $rt, 'rt');
        }
        
        return true;
    }
    
    // 检查是否已经成功存在推荐
    function check_share_uid($issubscribe = '0')
    {
        $tid = $this->Session->read('User.tid');
        if (! ($tid > 0))
            $tid = isset($_COOKIE[CFGH . 'USER']['TID']) ? $_COOKIE[CFGH . 'USER']['TID'] : '0';
        
        $toid = $this->Session->read('User.to_wecha_id');
        if (! ($toid > 0))
            $toid = isset($_COOKIE[CFGH . 'USER']['TOOPENID']) ? $_COOKIE[CFGH . 'USER']['TOOPENID'] : '0';
        if (! ($tid > 0))
            $tid = $toid;
        if (! ($toid > 0))
            $toid = $tid;
        
        $uid = $this->Session->read('User.uid');
        $sql = "SELECT id FROM `{$this->App->prefix()}user_tuijian` WHERE uid = '$uid' LIMIT 1";
        $id = $this->App->findvar($sql);
        if (! ($id > 0)) {
            $uid = $this->Session->read('User.uid');
            if ($uid == $tid)
                $tid = 0;
            if ($uid == $toid)
                $toid = 0;
            $dd = array();
            $dd['share_uid'] = $tid; // 分享者uid
            $dd['parent_uid'] = $toid; // 关注者分享ID
            $puid = $dd['parent_uid'];
            $duid = 0;
            if ($puid > 0) {
                // 检查是否是代理
                $rank = $this->App->findvar("SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id = '$puid' LIMIT 1");
                if ($rank == '10') {
                    $duid = $puid;
                } else {
                    // 检查推荐的代理ID
                    $duid = $this->App->findvar("SELECT daili_uid FROM `{$this->App->prefix()}user_tuijian` WHERE uid = '$puid' LIMIT 1");
                }
            }
            $dd['daili_uid'] = $duid;
            $dd['uid'] = $uid;
            $dd['addtime'] = time();
            if ($this->App->insert('user_tuijian', $dd)) { // 添加推荐用户
                                                        // 统计分享 跟 关注数
                if ($issubscribe == '1') {
                    if ($toid > 0) {
                        $sql = "UPDATE `{$this->App->prefix()}user` SET `guanzhu_ucount` = `guanzhu_ucount`+1 WHERE user_id = '$toid'";
                        $this->App->query($sql);
                    }
                    
                    if ($tid > 0) {
                        $sql = "UPDATE `{$this->App->prefix()}user` SET `share_ucount` = `share_ucount`+1 WHERE user_id = '$tid'";
                        $this->App->query($sql);
                    }
                } else {
                    // 统计分享用户数
                    if ($tid > 0) {
                        $sql = "UPDATE `{$this->App->prefix()}user` SET `share_ucount` = `share_ucount`+1 WHERE user_id = '$tid'";
                        $this->App->query($sql);
                    }
                }
            }
        }
    }
    
    // 用户后台
    function index()
    {
        $uid = $this->checked_login();
        
        $sql = "SELECT * FROM `{$this->App->prefix()}user` WHERE user_id ='{$uid}' AND active='1' LIMIT 1";
        $rt['userinfo'] = $this->App->findrow($sql);
        if (empty($rt['userinfo'])) {
            die("此账号已经被禁用或者没有激活！");
        }
        $qq = $rt['userinfo']['qq'];
        $password = $rt['userinfo']['password'];
        $mobile_phone = $rt['userinfo']['mobile_phone'];
        if (empty($qq) || empty($password) || empty($mobile_phone)) {
            // $this->jump(ADMIN_URL.'user.php?act=myinfos_u',0,'请先完善微信外登陆资料！');
            // exit;
        }
        $this->action('common', 'checkjump');
        $rank = $this->Session->read('User.rank');
        
        $this->title("用户后台管理中心" . ' - ' . $GLOBALS['LANG']['site_name']);
        
        /*
         * $sql = "SELECT * FROM `{$this->App->prefix()}user` WHERE user_id ='{$uid}' AND active='1' LIMIT 1";
         * $rt['userinfo'] = $this->App->findrow($sql);
         * if(empty($rt['userinfo'])){
         * $this->Session->write('User',null);
         * setcookie(CFGH.'USER[TOOPENID]', "", time()-7200);
         * setcookie(CFGH.'USER[UKEY]', "", time()-7200);
         * setcookie(CFGH.'USER[PASS]', "", time()-7200);
         * setcookie(CFGH.'USER[TID]', "", time()-7200);
         * setcookie(CFGH.'USER[UID]', "", time()-7200);
         * setcookie(CFGH.'USER[SUBSCRIBE]', "", time()-7200);
         * setcookie(CFGH.'USER[CODETIME]', "", time()-7200);
         * $this->jump(ADMIN_URL);exit;
         * }
         *
         * $wecha_id_new = $this->get_user_wecha_id_new();
         * $wecha_id2 = $this->Session->read('User.wecha_id');
         * if(($wecha_id_new != $wecha_id2|| $wecha_id_new !=$rt['userinfo']['wecha_id']) && !empty($wecha_id_new)){
         * //更新错误
         * $access_token = $this->action('common','_get_access_token');
         * $url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token='.$access_token.'&openid='.$wecha_id_new;
         * $con = $this->action('common','curlGet',$url);
         * $json=json_decode($con);
         * $subscribe = $json->subscribe;
         * $nickname = isset($json->nickname)?$json->nickname : '';
         * $sex = isset($json->sex)?$json->sex : '';
         * $city = isset($json->city)?$json->city : '';
         * $province = isset($json->province)?$json->province : '';
         * $headimgurl = isset($json->headimgurl)?$json->headimgurl : '';
         * $subscribe_time = isset($json->subscribe_time)?$json->subscribe_time : '';
         * $this->Session->write('User.subscribe',$subscribe);
         * setcookie(CFGH.'USER[SUBSCRIBE]', $subscribe, time() + 2592000);
         *
         * $dd = array();
         * if(!empty($nickname)) $dd['nickname'] = $nickname;
         * if(!empty($sex)) $dd['sex'] = $sex;
         * if(!empty($city)) $dd['cityname'] = $city;
         * if(!empty($province)) $dd['provincename'] = $province;
         * if(!empty($headimgurl)) $dd['headimgurl'] = $headimgurl;
         * if(!empty($subscribe_time)) $dd['subscribe_time'] = $subscribe_time;
         * if(!empty($dd)){
         * $dd['wecha_id'] = $wecha_id_new;
         * $dd['is_subscribe'] = $json->subscribe;;
         *
         * $sql = "SELECT user_id FROM `{$this->App->prefix()}user` WHERE wecha_id ='{$wecha_id_new}' ORDER BY user_id ASC LIMIT 1";
         * $uid = $this->App->findvar($sql);
         * $this->App->update('user',$dd,'user_id',$uid);
         * $this->Session->write('User.uid',$uid);
         *
         * $this->Session->write('User.subscribe',$dd['is_subscribe']);
         * setcookie(CFGH.'USER[SUBSCRIBE]', $dd['is_subscribe'], time() + 2592000);
         *
         * $this->Session->write('User.wecha_id',$dd['wecha_id']);
         * setcookie(CFGH.'USER[UKEY]', $dd['wecha_id'], time() + 2592000);
         * }
         *
         * }
         */
        
        $this->_get_weixin_user_info($rt['userinfo']);
        $this->check_share_uid($rt['userinfo']['is_subscribe']);
        
        // 是否开启代理申请
        // $sql = "SELECT tb1.is_dailiapply FROM `{$this->App->prefix()}user` AS tb1 LEFT JOIN `{$this->App->prefix()}user_tuijian` AS tb2 ON tb1.user_id=tb2.daili_uid WHERE tb2.uid='$uid' LIMIT 1";
        // $rt['userinfo']['is_dailiapply'] = $this->App->findvar($sql);
        
        $sql = "SELECT tb2.level_name FROM `{$this->App->prefix()}user` AS tb1 LEFT JOIN `{$this->App->prefix()}user_level` AS tb2 ON tb1.user_rank=tb2.lid WHERE tb1.user_id='$uid'";
        $rt['userinfo']['level_name'] = $this->App->findvar($sql); //
        
        $sql = "SELECT SUM(money) FROM `{$this->App->prefix()}user_money_change` WHERE uid ='{$uid}'";
        $rt['userinfo']['zmoney'] = $this->App->findvar($sql);
        
        $sql = "SELECT SUM(order_amount) FROM `{$this->App->prefix()}goods_order_info_daigou` WHERE user_id ='{$uid}' AND pay_status = '1'";
        $rt['userinfo']['spzmoney'] = $this->App->findvar($sql);
        
        $sql = "SELECT SUM(points) FROM `{$this->App->prefix()}user_point_change` WHERE uid ='{$uid}'";
        $rt['userinfo']['points'] = $this->App->findvar($sql);
        
        $sql = "SELECT COUNT(user_id) FROM `{$this->App->prefix()}user` WHERE is_subscribe ='1' LIMIT 1";
        $rt['gzcount'] = $this->App->findvar($sql);
        
        $sql = "SELECT tb1.nickname FROM `{$this->App->prefix()}user` AS tb1 LEFT JOIN `{$this->App->prefix()}user_tuijian` AS tb2 ON tb1.user_id = tb2.parent_uid LEFT JOIN `{$this->App->prefix()}user` AS tb3 ON tb3.user_id = tb2.uid WHERE tb3.user_id='$uid' LIMIT 1";
        $rt['tjren'] = $this->App->findvar($sql);
        
        // 一级
        $rt['zcount1'] = $this->App->findvar("SELECT COUNT(id) FROM `{$this->App->prefix()}user_tuijian` WHERE parent_uid = '$uid' LIMIT 1");
        // 二级
        $sql = "SELECT COUNT(tb1.id) FROM `{$this->App->prefix()}user_tuijian` AS tb1";
        $sql .= " LEFT JOIN `{$this->App->prefix()}user_tuijian` AS tb2 ON tb2.parent_uid = tb1.uid ";
        $sql .= " WHERE tb1.parent_uid='$uid' AND tb2.uid IS NOT NULL  LIMIT 1";
        $rt['zcount2'] = $this->App->findvar($sql);
        
        // 三级
        $sql = "SELECT COUNT(tb1.id) FROM `{$this->App->prefix()}user_tuijian` AS tb1";
        $sql .= " LEFT JOIN `{$this->App->prefix()}user_tuijian` AS tb2 ON tb2.parent_uid = tb1.uid ";
        $sql .= " LEFT JOIN `{$this->App->prefix()}user_tuijian` AS tb3 ON tb3.parent_uid = tb2.uid ";
        $sql .= " WHERE tb1.parent_uid='$uid' AND tb3.uid IS NOT NULL  LIMIT 1";
        $rt['zcount3'] = $this->App->findvar($sql);
        // 总用户
        $rt['zcount'] = intval($rt['zcount1']) + intval($rt['zcount2']) + intval($rt['zcount3']);
        
        $sql = "SELECT COUNT(order_id) FROM `{$this->App->prefix()}goods_order_info` WHERE parent_uid = '$uid' AND order_status='2' AND user_id!='$uid'";
        $rt['userinfo']['ordercount'] = $this->App->findvar($sql);
        
        $sql = "SELECT COUNT(ut.uid) FROM `{$this->App->prefix()}user_tuijian` AS ut LEFT JOIN `{$this->App->prefix()}user` AS u ON ut.uid = u.user_id WHERE ut.parent_uid = '$uid' AND u.user_rank!='1' AND ut.uid!='$uid'";
        $rt['userinfo']['fxcount'] = $this->App->findvar($sql);
        
        // 未有付款佣金
        $sql = "SELECT SUM(tb1.money) FROM `{$this->App->prefix()}user_money_change_cache` AS tb1 LEFT JOIN `{$this->App->prefix()}goods_order_info` AS tb2 ON tb2.order_sn = tb1.order_sn WHERE tb1.uid = '$uid' AND tb2.pay_status='0' AND tb2.order_status!='4' AND tb2.order_status!='1' AND tb1.money > 0 LIMIT 1";
        $rt['pay1'] = $this->App->findvar($sql);
        
        // 已经付款佣金
        $sql = "SELECT SUM(tb1.money) FROM `{$this->App->prefix()}user_money_change` AS tb1 LEFT JOIN `{$this->App->prefix()}goods_order_info` AS tb2 ON tb2.order_sn = tb1.order_sn WHERE tb1.uid = '$uid' AND tb2.pay_status='1' AND tb1.money > 0 LIMIT 1";
        $rt['pay2'] = $this->App->findvar($sql);
        
        // 已经收货订单佣金
        $sql = "SELECT SUM(tb1.money) FROM `{$this->App->prefix()}user_money_change` AS tb1 LEFT JOIN `{$this->App->prefix()}goods_order_info` AS tb2 ON tb2.order_sn = tb1.order_sn WHERE tb1.uid = '$uid' AND tb2.shipping_status='5' AND tb1.money > 0 LIMIT 1";
        $rt['pay3'] = $this->App->findvar($sql);
        
        // 已经取消作废佣金
        $sql = "SELECT SUM(tb1.money) FROM `{$this->App->prefix()}user_money_change_cache` AS tb1 LEFT JOIN `{$this->App->prefix()}goods_order_info` AS tb2 ON tb2.order_sn = tb1.order_sn WHERE tb1.uid = '$uid' AND (tb2.order_status='1' OR tb2.pay_status='2') AND tb1.money > 0 LIMIT 1";
        $rt['pay4'] = $this->App->findvar($sql);
        
        // 审核通过的佣金
        $sql = "SELECT SUM(tb1.money) FROM `{$this->App->prefix()}user_money_change` AS tb1 LEFT JOIN `{$this->App->prefix()}goods_order_info` AS tb2 ON tb2.order_sn = tb1.order_sn WHERE tb1.uid = '$uid' AND tb2.shipping_status='5' AND tb2.pay_status='1' AND tb1.money > 0 LIMIT 1";
        $rt['pay5'] = $this->App->findvar($sql);
        
        // 营业额
        $sql = "SELECT SUM(order_amount) FROM `{$this->App->prefix()}goods_order_info` WHERE parent_uid = '$uid' AND pay_status='1' AND user_id!='$uid'";
        $rt['userinfo']['zordermoney'] = $this->App->findvar($sql);
        
        /*
         * //当前用户的收货地址
         * $sql = "SELECT tb1.*,tb2.region_name AS provinces,tb3.region_name AS citys,tb4.region_name AS districts FROM `{$this->App->prefix()}user_address` AS tb1";
         * $sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb2 ON tb2.region_id = tb1.province";
         * $sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb3 ON tb3.region_id = tb1.city";
         * $sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb4 ON tb4.region_id = tb1.district";
         * $sql .=" WHERE tb1.user_id='$uid' AND tb1.is_own='0' ORDER BY tb1.is_own DESC, tb1.address_id ASC LIMIT 1";
         * $rt['userress'] = $this->App->findrow($sql);
         *
         *
         * //地区
         * $sql = "SELECT * FROM `{$this->App->prefix()}region` WHERE parent_id='76' AND region_type='3' ORDER BY region_id ASC";
         * $rt['diqucate'] = $this->App->find($sql);
         *
         * //店铺分类
         * $sql = "SELECT * FROM `{$this->App->prefix()}user_cate` WHERE parent_id='0' AND is_show='1' ORDER BY sort_order ASC,cat_id ASC";
         * $rt['shopcate'] = $this->App->find($sql);
         */
        
        if (! defined(NAVNAME))
            define('NAVNAME', "会员中心");
        $this->set('rt', $rt);
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->set('mubanid', $GLOBALS['LANG']['mubanid']);
        $this->template($mb . '/user_index');
    }
    
    // 代理申请
    function apply()
    {
        $uid = $this->checked_login();
        $this->action('common', 'checkjump');
        $this->title("欢迎进入用户后台管理中心" . ' - ' . $GLOBALS['LANG']['site_name']);
        
        /*
         * $sql = "SELECT * FROM `{$this->App->prefix()}user` WHERE user_id ='{$uid}' LIMIT 1";
         * $rt['userinfo'] = $this->App->findrow($sql);
         * if($rt['userinfo']['user_rank']!='1' && $rt['userinfo']['is_salesmen']=='2'){ //已经申请成功的代理要跳转
         * $this->jump(ADMIN_URL.'user.php');exit;
         * }
         *
         * $rt['province'] = $this->get_regions(1); //获取省列表
         *
         * //当前用户的收货地址
         * $sql = "SELECT * FROM `{$this->App->prefix()}user_address` WHERE user_id='$uid' AND is_own='1' LIMIT 1";
         * $rt['userress'] = $this->App->findrow($sql);
         *
         * if($rt['userress']['province']>0) $rt['city'] = $this->get_regions(2,$rt['userress']['province']); //城市
         * if($rt['userress']['city']>0) $rt['district'] = $this->get_regions(3,$rt['userress']['city']); //区
         *
         * //介绍
         * $sql = "SELECT * FROM `{$this->App->prefix()}wx_article` WHERE article_id='8' OR keyword LIKE '%创业申请%' LIMIT 1";
         * $this->set('info',$this->App->findrow($sql));
         */
        
        $sql = "SELECT * FROM `{$this->App->prefix()}user` WHERE user_id='$uid' LIMIT 1";
        $rt['userinfo'] = $this->App->findrow($sql);
        if ($rt['userinfo']['user_rank'] != '1') {
            $this->set('fxrank', '1');
            // $this->jump(ADMIN_URL.'user.php'); exit;
        } else {
            $this->set('fxrank', '2');
        }
        // 介绍
        $sql = "SELECT * FROM `{$this->App->prefix()}wx_article` WHERE keyword LIKE '%申请开店%' LIMIT 1";
        $rt['info'] = $this->App->findrow($sql);
        
        if (! defined(NAVNAME))
            define('NAVNAME', "代理申请");
        $this->set('rt', $rt);
        
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template($mb . '/apply');
    }
    
    // 代理中心
    function dailicenter()
    {
        $this->title( '代理中心' . ' - ' . $GLOBALS['LANG']['site_name'] );
        defined( NAVNAME ) or define( 'NAVNAME', '代理中心' );

        $uid  = $this->Session->read('User.uid');
        $rank = $this->Session->read('User.rank');
        $mb   = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template( $mb . '/dailicenter' );
    }
    
    // 平台介绍
    function aboutpt()
    {
        if (! defined(NAVNAME))
            define('NAVNAME', "平台介绍");
        $this->template('aboutpt');
    }
    
    // 积分排行
    function zpoints()
    {
        $uid = $this->checked_login();
        if (! defined(NAVNAME))
            define('NAVNAME', "积分排行");
        
        $list = 30;
        $page = (isset($_GET['page']) && intval($_GET['page']) > 0) ? intval($_GET['page']) : 1;
        $start = ($page - 1) * $list;
        
        $sql = "SELECT COUNT(user_id) FROM `{$this->App->prefix()}user` WHERE active='1' ORDER BY points_ucount DESC";
        $tt = $this->App->findvar($sql);
        $rt['pages'] = Import::basic()->getpage($tt, $list, $page, '?page=', true);
        
        $sql = "SELECT nickname,headimgurl,is_subscribe,points_ucount,mypoints,money_ucount,share_ucount,guanzhu_ucount,reg_time,subscribe_time,is_subscribe FROM `{$this->App->prefix()}user` WHERE active='1' ORDER BY points_ucount DESC,share_ucount DESC,reg_time ASC LIMIT $start,$list";
        $rt['ulist'] = $this->App->find($sql);
        
        $sql = "SELECT points_ucount,money_ucount,share_ucount,guanzhu_ucount,mypoints FROM `{$this->App->prefix()}user` WHERE user_id='$uid' LIMIT 1";
        $rt['userinfo'] = $this->App->findrow($sql);
        
        // 当前排名
        $sql = "SELECT user_id FROM `{$this->App->prefix()}user` WHERE active='1' ORDER BY points_ucount DESC,share_ucount DESC,reg_time ASC LIMIT 100";
        $ulist = $this->App->findcol($sql);
        $rt['userinfo']['thisrank'] = 0;
        if (! empty($ulist))
            foreach ($ulist as $ks => $vv) {
                if ($uid == $vv) {
                    ++ $ks;
                    $rt['userinfo']['thisrank'] = $ks;
                }
            }
        if ($rt['userinfo']['thisrank'] == '0') {
            if (! empty($ulist)) {
                $rt['userinfo']['thisrank'] = '>100';
            } else {
                $rt['userinfo']['thisrank'] = '0';
            }
        }
        
        $this->set('rt', $rt);
        
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template($mb . '/zpoints');
    }

    function myuser()
    {
        $uid = $this->checked_login();
        if (! defined(NAVNAME))
            define('NAVNAME', "我的好友");
            
            // 分页
        $page = isset($_GET['page']) ? $_GET['page'] : '1';
        if (empty($page)) {
            $page = 1;
        }
        $list = 30;
        $start = ($page - 1) * $list;
        $sql = "SELECT COUNT(tb1.id) FROM `{$this->App->prefix()}user_tuijian` AS tb1";
        $sql .= " LEFT JOIN `{$this->App->prefix()}user` AS tb2";
        $sql .= " ON tb1.uid = tb2.user_id WHERE tb1.parent_uid = '$uid'";
        // $tt = $this->App->findvar($sql);
        // $rt['pages'] = Import::basic()->getpage($tt, $list, $page,'?page=',true);
        
        $sql = "SELECT tb1.*,tb2.subscribe_time,tb2.reg_time,tb2.nickname,tb2.headimgurl,tb2.points_ucount,tb2.share_ucount,tb2.guanzhu_ucount,tb2.is_subscribe FROM `{$this->App->prefix()}user_tuijian` AS tb1";
        $sql .= " LEFT JOIN `{$this->App->prefix()}user` AS tb2";
        $sql .= " ON tb1.uid = tb2.user_id";
        $sql .= " WHERE tb1.parent_uid = '$uid' AND tb2.is_subscribe ='1' ORDER BY tb2.share_ucount DESC,tb2.points_ucount DESC,tb1.id DESC LIMIT $start,$list";
        $rt['lists'] = $this->App->find($sql);
        
        $this->set('rt', $rt);
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template($mb . '/myuser');
    }

    function youhuijuan()
    {
        $this->title("我的优惠卷" . ' - ' . $GLOBALS['LANG']['site_name']);
        $uid = $this->Session->read('User.uid');
        if (empty($uid)) {
            $this->jump(ADMIN_URL . 'user.php?act=login', 0, '请先登录！');
            exit();
        }
        if (isset($_POST) && ! empty($_POST)) {
            $key = isset($_POST['keyword']) ? trim($_POST['keyword']) : '';
            if (! empty($key)) {
                $sql = "SELECT bonus_id FROM `{$this->App->prefix()}user_coupon_list` WHERE bonus_sn = '$key' AND is_used = '0'";
                $bonus_id = $this->App->findvar($sql);
                if ($bonus_id > 0) {
                    $this->App->insert('user_regcode', array(
                        'code' => $key,
                        'uid' => $uid,
                        'addtime' => time()
                    ));
                    $this->App->update('user_coupon_list', array(
                        'is_used' => '1',
                        'user_id' => $uid,
                        'used_time' => time()
                    ), 'bonus_sn', $key);
                    $this->jump(ADMIN_URL . 'user.php?act=youhuijuan', 0, '你已成功得到优惠劵！');
                    exit();
                } else {
                    $this->jump(ADMIN_URL . 'user.php?act=youhuijuan', 0, '该优惠码无效或已失效！');
                    exit();
                }
            }
        }
        // 优惠劵
        $list = 10;
        $page = (isset($_GET['page']) && intval($_GET['page']) > 0) ? intval($_GET['page']) : 1;
        $start = ($page - 1) * $list;
        $sql = "SELECT tb1.*,tb2.user_id,tb2.used_time,tb2.is_used,tb3.* FROM `{$this->App->prefix()}user_regcode` AS tb1 LEFT JOIN `{$this->App->prefix()}user_coupon_list` AS tb2 ON tb2.bonus_sn = tb1.code";
        $sql .= " LEFT JOIN `{$this->App->prefix()}user_coupon_type` AS tb3 ON tb3.type_id = tb2.type_id WHERE tb1.uid = '$uid' AND tb3.send_type='1' ORDER BY tb1.addtime DESC LIMIT $start,$list";
        $this->set('juanlist', $this->App->find($sql));
        
        $sql = "SELECT COUNT(tb1.rid) FROM `{$this->App->prefix()}user_regcode` AS tb1 LEFT JOIN `{$this->App->prefix()}user_coupon_list` AS tb2 ON tb2.bonus_sn = tb1.code LEFT JOIN `{$this->App->prefix()}user_coupon_type` AS tb3 ON tb3.type_id = tb2.type_id WHERE tb1.uid = '$uid' AND tb3.send_type='1'";
        $tt = $this->App->findvar($sql);
        $pagelink = Import::basic()->getpage($tt, $list, $page, '?page=', true);
        $this->set('pagelink', $pagelink);
        
        if (! defined(NAVNAME))
            define('NAVNAME', "我的优惠劵");
        $this->set('rt', $rt);
        $this->template('youhuijuan');
    }

    function xianjinka()
    {
        $this->title("我的现金卡" . ' - ' . $GLOBALS['LANG']['site_name']);
        $uid = $this->Session->read('User.uid');
        if (empty($uid)) {
            $this->jump(ADMIN_URL . 'user.php?act=login', 0, '请先登录！');
            exit();
        }
        
        // 现金卡
        $list = 10;
        $page = (isset($_GET['page']) && intval($_GET['page']) > 0) ? intval($_GET['page']) : 1;
        $start = ($page - 1) * $list;
        $sql = "SELECT tb2.user_id,tb2.used_time,tb2.is_used,tb3.* FROM `{$this->App->prefix()}user_coupon_list` AS tb2 LEFT JOIN `{$this->App->prefix()}user_coupon_type` AS tb3 ON tb2.type_id = tb3.type_id";
        $sql .= " WHERE tb2.user_id = '$uid' AND tb3.send_type='3' ORDER BY tb2.used_time DESC LIMIT $start,$list";
        $this->set('juanlist', $this->App->find($sql));
        
        $sql = "SELECT COUNT(tb2.bonus_id) FROM `{$this->App->prefix()}user_coupon_list` AS tb2 LEFT JOIN `{$this->App->prefix()}user_coupon_type` AS tb3 ON tb2.type_id = tb3.type_id WHERE tb2.user_id = '$uid' AND tb3.send_type='3'";
        $tt = $this->App->findvar($sql);
        $pagelink = Import::basic()->getpage($tt, $list, $page, '?page=', true);
        $this->set('pagelink', $pagelink);
        
        if (! defined(NAVNAME))
            define('NAVNAME', "我的现金卡");
        $this->set('rt', $rt);
        $this->template('xianjinka');
    }

    function youhuika()
    {
        $this->title("我的优惠卡" . ' - ' . $GLOBALS['LANG']['site_name']);
        $uid = $this->Session->read('User.uid');
        if (empty($uid)) {
            $this->jump(ADMIN_URL . 'user.php?act=login', 0, '请先登录！');
            exit();
        }
        
        // 优惠卡
        $list = 10;
        $page = (isset($_GET['page']) && intval($_GET['page']) > 0) ? intval($_GET['page']) : 1;
        $start = ($page - 1) * $list;
        $sql = "SELECT tb2.user_id,tb2.used_time,tb2.is_used,tb3.* FROM `{$this->App->prefix()}user_coupon_list` AS tb2 LEFT JOIN `{$this->App->prefix()}user_coupon_type` AS tb3 ON tb2.type_id = tb3.type_id";
        $sql .= " WHERE tb2.user_id = '$uid' AND tb3.send_type='2' ORDER BY tb2.used_time DESC LIMIT $start,$list";
        $this->set('juanlist', $this->App->find($sql));
        
        $sql = "SELECT COUNT(tb2.bonus_id) FROM `{$this->App->prefix()}user_coupon_list` AS tb2 LEFT JOIN `{$this->App->prefix()}user_coupon_type` AS tb3 ON tb2.type_id = tb3.type_id WHERE tb2.user_id = '$uid' AND tb3.send_type='2'";
        $tt = $this->App->findvar($sql);
        $pagelink = Import::basic()->getpage($tt, $list, $page, '?page=', true);
        $this->set('pagelink', $pagelink);
        
        if (! defined(NAVNAME))
            define('NAVNAME', "我的优惠卡");
        $this->set('rt', $rt);
        $this->template('youhuika');
    }
    
    
    // 我的分享
    function myshare()
    {
        $this->title("我的分享" . ' - ' . $GLOBALS['LANG']['site_name']);
        $uid = $this->Session->read('User.uid');
        //$uid = '1891';
        $id = isset($_GET['id']) ? $_GET['id'] : '0';
        if ($id > 0) {
            // $this->App->delete('user_tuijian','id',$id);
            // $this->jump(ADMIN_URL.'user.php?act=myshare');exit;
        }
        // 分页
        $page = isset($_GET['page']) ? $_GET['page'] : '1';
        if (empty($page)) {
            $page = 1;
        }
        $list = 30;
        $start = ($page - 1) * $list;
        $sql = "SELECT COUNT(tb1.id) FROM `{$this->App->prefix()}user_tuijian` AS tb1";
        $sql .= " LEFT JOIN `{$this->App->prefix()}user` AS tb2";
        $sql .= " ON tb1.uid = tb2.user_id WHERE tb1.share_uid = '$uid'";
        $tt = $this->App->findvar($sql);
        $rt['pages'] = Import::basic()->getpage($tt, $list, $page, '?page=', true);
        
        $sql = "SELECT tb1.*,tb2.subscribe_time,tb2.reg_time,tb2.nickname,tb2.headimgurl,tb2.points_ucount,tb2.share_ucount,tb2.guanzhu_ucount,tb2.is_subscribe FROM `{$this->App->prefix()}user_tuijian` AS tb1";
        $sql .= " LEFT JOIN `{$this->App->prefix()}user` AS tb2";
        $sql .= " ON tb1.uid = tb2.user_id";
        $sql .= " WHERE tb1.share_uid = '$uid' ORDER BY tb2.share_ucount DESC,tb2.points_ucount DESC,tb1.id DESC LIMIT $start,$list";
        $rt['lists'] = $this->App->find($sql);
        
        if (! defined(NAVNAME))
            define('NAVNAME', "我的邀请");
        $this->set('rt', $rt);
        $this->template('myshare');
        
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template($mb . '/myshare');
    }
    // 调研投票
    function myvotes()
    {
        $this->title("调研投票" . ' - ' . $GLOBALS['LANG']['site_name']);
        
        $rt = array();
        if (! defined(NAVNAME))
            define('NAVNAME', "调研投票");
        $this->set('rt', $rt);
        $this->template('myvotes');
    }
    
    // 我要晒单
    function mysaidan()
    {
        $this->title("我的晒单列表" . ' - ' . $GLOBALS['LANG']['site_name']);
        $uid = $this->Session->read('User.uid');
        if (empty($uid)) {
            $this->jump(ADMIN_URL . 'user.php?act=login', 0, '请先登录！');
            exit();
        }
        
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        if ($id > 0) {
            $img = $this->App->findvar("SELECT article_img FROM `{$this->App->prefix()}article` WHERE article_id='$id'");
            if (! empty($img)) {
                Import::fileop()->delete_file(SYS_PATH . $img); // 删除图片
                $q = dirname($img);
                $h = basename($img);
                Import::fileop()->delete_file(SYS_PATH . $q . DS . 'thumb_s' . DS . $h);
                Import::fileop()->delete_file(SYS_PATH . $q . DS . 'thumb_b' . DS . $h);
            }
            $this->App->delete('article', 'article_id', $id);
            $this->jump(ADMIN_URL . 'user.php?act=mysaidan');
            exit();
        }
        
        // 排序
        $orderby = ' ORDER BY tb1.vieworder ASC,tb1.`article_id` DESC';
        // 分页
        $page = isset($_GET['page']) ? $_GET['page'] : '';
        if (empty($page)) {
            $page = 1;
        }
        $list = 5;
        $start = ($page - 1) * $list;
        $sql = "SELECT COUNT(tb1.article_id) FROM `{$this->App->prefix()}article` AS tb1";
        $sql .= " LEFT JOIN `{$this->App->prefix()}article_cate` AS tb2";
        $sql .= " ON tb1.cat_id = tb2.cat_id WHERE tb1.uid = '$uid'";
        $tt = $this->App->findvar($sql);
        $pagelink = Import::basic()->getpage($tt, $list, $page, '?page=', true);
        $this->set("pages", $pagelink);
        
        $sql = "SELECT tb1.*,tb2.cat_name FROM `{$this->App->prefix()}article` AS tb1";
        $sql .= " LEFT JOIN `{$this->App->prefix()}article_cate` AS tb2";
        $sql .= " ON tb1.cat_id = tb2.cat_id";
        $sql .= " WHERE tb1.uid = '$uid' {$orderby} LIMIT $start,$list";
        
        $this->set('lists', $this->App->find($sql));
        
        if (! defined(NAVNAME))
            define('NAVNAME', "我的晒单");
        $this->set('page', $page);
        $this->template('mysaidan');
    }

    function mysaidaninfo()
    {
        $this->title("我要晒单" . ' - ' . $GLOBALS['LANG']['site_name']);
        $uid = $this->Session->read('User.uid');
        if (empty($uid)) {
            $this->jump(ADMIN_URL . 'user.php?act=login', 0, '请先登录！');
            exit();
        }
        $rt = array();
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        if ($id > 0) {
            if (! empty($_POST)) {
                $_POST['meta_keys'] = ! empty($_POST['meta_keys']) ? str_replace(array(
                    '，',
                    '。',
                    '.'
                ), ',', $_POST['meta_keys']) : "";
                $_POST['uptime'] = time();
                // $_POST['content'] = @str_replace('/photos/',SYS_PHOTOS_URL,$_POST['content']); //替换为绝对路径的链接
                $_POST['uid'] = $uid;
                $this->App->update('article', $_POST, 'article_id', $id);
                $this->jump(ADMIN_URL . 'user.php?act=mysaidaninfo&id=' . $id, 0, '修改成功！');
                exit();
            }
            $sql = "SELECT * FROM `{$this->App->prefix()}article` WHERE article_id='{$id}'";
            $rt = $this->App->findrow($sql);
            
            if ($rt['province'] > 0)
                $rt['ress']['city'] = $this->get_regions(2, $rt['province']); // 城市
            if ($rt['city'] > 0)
                $rt['ress']['district'] = $this->get_regions(3, $rt['city']); // 区
        } else {
            if (! empty($_POST)) {
                $_POST['addtime'] = time();
                $_POST['uptime'] = time();
                $_POST['meta_keys'] = ! empty($_POST['meta_keys']) ? str_replace(array(
                    '，',
                    '。',
                    '.'
                ), ',', $_POST['meta_keys']) : "";
                $_POST['content'] = @str_replace('/photos/', SYS_PHOTOS_URL, $_POST['content']); // 替换为绝对路径的链接
                $_POST['uid'] = $uid;
                $this->App->insert('article', $_POST);
                $this->jump(ADMIN_URL . 'user.php?act=mysaidaninfo', 0, '添加成功！');
                exit();
            }
        }
        
        $rt['ress']['province'] = $this->get_regions(1); // 获取省列表
        
        if (! defined(NAVNAME))
            define('NAVNAME', "晒单详情");
        $this->set('id', $id);
        $this->set('rt', $rt);
        $this->set('catids', $this->action('article', 'get_cate_tree', 0, 'about'));
        $this->template('mysaidaninfo');
    }

    function myyuding()
    {
        $this->title("我的预定" . ' - ' . $GLOBALS['LANG']['site_name']);
        $uid = $this->Session->read('User.uid');
        if (empty($uid)) {
            $this->jump(ADMIN_URL . 'user.php?act=login', 0, '请先登录！');
            exit();
        }
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        if ($id > 0) {
            $this->App->delete('user_yuding', 'mes_id', $id);
            $this->jump(ADMIN_URL . 'user.php?act=myyuding');
            exit();
        }
        
        // 分页
        $page = isset($_GET['page']) ? $_GET['page'] : '';
        if (empty($page)) {
            $page = 1;
        }
        $list = 10;
        $start = ($page - 1) * $list;
        
        $sql = "SELECT COUNT(mes_id) FROM `{$this->App->prefix()}user_yuding` WHERE user_id='$uid'";
        $tt = $this->App->findvar($sql);
        $pagelink = Import::basic()->getpage($tt, $list, $page, '?page=', true);
        $this->set("pagelink", $pagelink);
        
        $sql = "SELECT tb1.*,tb2.nickname FROM `{$this->App->prefix()}user_yuding` AS tb1 LEFT JOIN `{$this->App->prefix()}user` AS tb2 ON tb2.user_id = tb1.shop_id  WHERE tb1.user_id='$uid' ORDER BY tb1.mes_id DESC LIMIT $start,$list";
        $this->set('rt', $this->App->find($sql));
        $this->set('page', $page);
        $this->template('myyuding');
    }

    function myyudingdetail()
    {
        $this->title("我的预定" . ' - ' . $GLOBALS['LANG']['site_name']);
        $uid = $this->Session->read('User.uid');
        if (empty($uid)) {
            $this->jump(ADMIN_URL . 'user.php?act=login', 0, '请先登录！');
            exit();
        }
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $sql = "SELECT tb1.*,tb2.nickname FROM `{$this->App->prefix()}user_yuding` AS tb1 LEFT JOIN `{$this->App->prefix()}user` AS tb2 ON tb2.user_id = tb1.shop_id  WHERE tb1.mes_id='$id' AND tb1.user_id='$uid'";
        
        if (! defined(NAVNAME))
            define('NAVNAME', "我的预订");
        $this->set('rt', $this->App->findrow($sql));
        $this->template('myyudingdetail');
    }

    function ajax_getorderlist($data = array())
    {
        $dt = isset($data['time']) && intval($data['time']) > 0 ? intval($data['time']) : "";
        $status = isset($data['status']) ? trim($data['status']) : "";
        $keyword = isset($data['keyword']) ? trim($data['keyword']) : "";
        $page = isset($data['page']) && intval($data['page'] > 0) ? intval($data['page']) : 1;
        $list = 5;
        // 用户订单
        $uid = $this->Session->read('User.uid');
        $w_rt[] = "tb1.user_id = '$uid'";
        if (! empty($dt)) {
            $ts = time() - $dt;
            $w_rt[] = "tb1.add_time > '$ts'";
        }
        
        if (! empty($status)) {
            $st = $this->select_statue($status);
            ! empty($st) ? $w_rt[] = $st : "";
        }
        if (! empty($keyword)) {
            $w_rt[] = "(tb2.goods_name LIKE '%" . $keyword . "%' OR tb1.order_sn LIKE '%" . $keyword . "%')";
        }
        
        $tt = $this->__order_list_count($w_rt); // 获取商品的数量
        $rt['order_count'] = $tt;
        
        $rt['orderpage'] = Import::basic()->ajax_page($tt, $list, $page, 'get_order_page_list', array(
            $status
        ));
        
        $rt['orderlist'] = $this->__order_list($w_rt, $page, $list);
        $rt['status'] = $status;
        $rt['keyword'] = $keyword;
        $rt['time'] = $dt;
        
        $this->set('rt', $rt);
        $con = $this->fetch('ajax_orderlist', true);
        die($con);
    }
    // ##########################
    // 用户订单列表
    function __order_list( $w_rt = array(), $page = 1, $list = 5 )
    {
        if ( is_array( $w_rt ) ) {
            if ( ! empty( $w_rt ) ) {
                $w = " WHERE " . implode(' AND ', $w_rt);
            }
        } else {
            $w = " WHERE " . $w_rt;
        }
        if ( ! $page )
            $page = 1;
        $start = ($page - 1) * $list;
        $sql = "SELECT distinct tb1.order_id, tb1.order_sn,tb1.sn_id,tb1.shipping_id,tb1.shipping_id_true, tb1.order_status, tb1.shipping_status,tb1.shipping_name ,tb1.pay_name, tb1.pay_status, tb1.add_time,tb1.consignee,tb1.type, (tb1.order_amount + tb1.shipping_fee) AS total_fee FROM `{$this->App->prefix()}goods_order_info` AS tb1";
        $sql .= " LEFT JOIN `{$this->App->prefix()}goods_order` AS tb2 ON tb1.order_id=tb2.order_id";
        $sql .= " $w ORDER BY tb1.add_time DESC LIMIT $start,$list";
        $orderlist = $this->App->find($sql);
        if ( ! empty($orderlist) ) {
            foreach ( $orderlist as $k => $row ) {
                $sid = $row['shipping_id_true'];
                $orderlist[$k]['shipping_code'] = $this->App->findvar("SELECT shipping_code FROM `{$this->App->prefix()}shipping_name` WHERE shipping_id = '$sid' LIMIT 1");
                $orderlist[$k]['status'] = $this->get_status($row['order_status'], $row['pay_status'], $row['shipping_status']);
                $orderlist[$k]['op'] = $this->get_option($row['order_id'], $row['order_status'], $row['pay_status'], $row['shipping_status']);
                $sql = "SELECT goods_id,goods_name,goods_bianhao,market_price,goods_price,goods_thumb FROM `{$this->App->prefix()}goods_order` WHERE order_id='$row[order_id]' ORDER BY goods_id";
                $orderlist[$k]['goods'] = $this->App->find($sql);
                
                $oid = $row['order_id'];
                $passsn = $this->App->findrow("SELECT goods_pass,goods_sn FROM `{$this->App->prefix()}goods_sn` WHERE order_id = '$oid' LIMIT 1");
                $orderlist[$k]['sn'] = isset($passsn['goods_sn']) ? $passsn['goods_sn'] : '';
                $orderlist[$k]['pass'] = isset($passsn['goods_pass']) ? $passsn['goods_pass'] : '';
            }
        }
        return $orderlist;
    }

    /**
     * 用户团购订单列表
     */
    function __group_order_list( $w_rt = array(), $page = 1, $list = 5 )
    {
        if ( is_array( $w_rt ) ) {
            if ( ! empty( $w_rt ) ) {
                $w = " WHERE " . implode(' AND ', $w_rt);
            }
        } else {
            $w = " WHERE " . $w_rt;
        }
        if ( ! $page )
            $page = 1;
        $start = ($page - 1) * $list;
        $sql = "SELECT distinct tb1.order_id, tb1.order_sn, tb1.sn_id, tb1.shipping_id, tb1.shipping_id_true, tb1.order_status, tb1.shipping_status, tb1.shipping_name ,tb1.pay_name, tb1.pay_status, tb1.add_time,tb1.consignee, (tb1.order_amount + tb1.shipping_fee) AS total_fee 
            FROM `{$this->App->prefix()}group_goods_order_info` AS tb1";
        $sql .= " LEFT JOIN `{$this->App->prefix()}group_goods_order` AS tb2 ON tb1.order_id = tb2.order_id";
        $sql .= " $w ORDER BY tb1.add_time DESC LIMIT $start, $list";
        $orderlist = $this->App->find( $sql );
        if ( ! empty($orderlist) ) {
            foreach ( $orderlist as $k => $row ) {
                $sid = $row['shipping_id_true'];
                $orderlist[$k]['shipping_code'] = $this->App->findvar("SELECT shipping_code FROM `{$this->App->prefix()}shipping_name` WHERE shipping_id = '$sid' LIMIT 1");
                $orderlist[$k]['status'] = $this->get_status($row['order_status'], $row['pay_status'], $row['shipping_status']);
                /* 获取团购订单 操作选项 */
                $orderlist[$k]['op'] = $this->get_group_option( 
                    $row['order_id'], 
                    $row['order_status'], 
                    $row['pay_status'], 
                    $row['shipping_status'] 
                );
                $sql = "SELECT goods_id,goods_name,goods_bianhao,market_price,goods_price,goods_thumb FROM `{$this->App->prefix()}group_goods_order` WHERE order_id='$row[order_id]' ORDER BY goods_id";
                $orderlist[$k]['goods'] = $this->App->find($sql);
                
                $oid = $row['order_id'];
                $passsn = $this->App->findrow("SELECT goods_pass,goods_sn FROM `{$this->App->prefix()}goods_sn` WHERE order_id = '$oid' LIMIT 1");
                $orderlist[$k]['sn'] = isset($passsn['goods_sn']) ? $passsn['goods_sn'] : '';
                $orderlist[$k]['pass'] = isset($passsn['goods_pass']) ? $passsn['goods_pass'] : '';
            }
        }
        return $orderlist;
    }

    /**
     * 订单数量
     */
    function __order_list_count($w_rt = array())
    {
        if (is_array($w_rt)) {
            if (! empty($w_rt)) {
                $w = " WHERE " . implode(' AND ', $w_rt);
            }
        } else {
            $w = " WHERE " . $w_rt;
        }
        $sql = "SELECT COUNT(distinct tb1.order_id) FROM `{$this->App->prefix()}goods_order_info` AS tb1";
        $sql .= " LEFT JOIN `{$this->App->prefix()}goods_order` AS tb2 ON tb1.order_id=tb2.order_id " . $w;
        return $this->App->findvar($sql);
    }

    /**
     * 团购订单列表
     */
    function __group_order_list_count( $w_rt = array() )
    {
        if ( is_array( $w_rt ) ) {
            if ( ! empty( $w_rt ) ) {
                $w = " WHERE " . implode( ' AND ', $w_rt );
            }
        } else {
            $w = " WHERE " . $w_rt;
        }
        $sql = "SELECT COUNT(distinct tb1.order_id) FROM `{$this->App->prefix()}group_goods_order_info` AS tb1";
        $sql .= " LEFT JOIN `{$this->App->prefix()}group_goods_order` AS tb2 ON tb1.order_id = tb2.order_id " . $w;
        return $this->App->findvar( $sql );
    }

    /**
     * 众筹订单
     */
    function __crowd_order_list($w_rt = array(), $page = 1, $list = 5)
    {
        if (is_array($w_rt)) {
            if (! empty($w_rt)) {
                $w = " WHERE " . implode(' AND ', $w_rt);
            }
        } else {
            $w = " WHERE " . $w_rt;
        }
        if (! $page)
            $page = 1;
        $start = ($page - 1) * $list;
        $sql = "SELECT * FROM `{$this->App->prefix()}crowd_goods_order_info` AS tb1";
        $sql .= " LEFT JOIN `{$this->App->prefix()}crowd_goods_order` AS tb2 ON tb1.order_id=tb2.order_id";
        $sql .= " $w ORDER BY tb1.add_time DESC LIMIT $start,$list";
        $orderlist = $this->App->find($sql);
        if (! empty($orderlist)) {
            foreach ($orderlist as $k => $row) {
                $sid = $row['shipping_id_true'];
                $orderlist[$k]['shipping_code'] = $this->App->findvar("SELECT shipping_code FROM `{$this->App->prefix()}shipping_name` WHERE shipping_id = '$sid' LIMIT 1");
                $orderlist[$k]['status'] = $this->get_status($row['order_status'], $row['pay_status'], $row['shipping_status']);
                $orderlist[$k]['op'] = $this->get_option($row['order_id'], $row['order_status'], $row['pay_status'], $row['shipping_status']);
                $sql = "SELECT goods_id,goods_name,goods_bianhao,market_price,goods_price,goods_thumb FROM `{$this->App->prefix()}goods_order` WHERE order_id='$row[order_id]' ORDER BY goods_id";
                $orderlist[$k]['goods'] = $this->App->find($sql);
                
                $oid = $row['order_id'];
                $passsn = $this->App->findrow("SELECT goods_pass,goods_sn FROM `{$this->App->prefix()}goods_sn` WHERE order_id = '$oid' LIMIT 1");
                $orderlist[$k]['sn'] = isset($passsn['goods_sn']) ? $passsn['goods_sn'] : '';
                $orderlist[$k]['pass'] = isset($passsn['goods_pass']) ? $passsn['goods_pass'] : '';
            }
        }
        return $orderlist;
    }
    
    // 订单详情
    function orderinfo($orderid = "")
    {
        $uid = $this->checked_login();
        $this->action('common', 'checkjump');
        $this->title("欢迎进入用户后台管理中心" . ' - 订单详情 - ' . $GLOBALS['LANG']['site_name']);
        
        $orderid = isset($_GET['order_id']) ? $_GET['order_id'] : 0;
        if (! ($orderid > 0)) {
            $this->jump('user.php?act=myorder');
            exit();
        }
        
        $sql = "SELECT * FROM `{$this->App->prefix()}goods_order_info_daigou` WHERE order_id='$orderid' AND user_id='$uid'";
        $rt['orderinfo'] = $this->App->findrow($sql);
        if (empty($rt['orderinfo'])) {
            $this->jump(ADMIN_URL . 'user.php?act=myorder');
            exit();
        }
        $sql = "SELECT tb1.*,SUM(tb2.goods_number) AS numbers FROM `{$this->App->prefix()}goods_order_daigou` AS tb1 LEFT JOIN `{$this->App->prefix()}goods_order_address` AS tb2 ON tb1.rec_id = tb2.rec_id WHERE tb1.order_id='$orderid' GROUP BY tb2.rec_id";
        $goodslist = $this->App->find($sql);
        if (! empty($goodslist))
            foreach ($goodslist as $k => $row) {
                $rt['goodslist'][$k] = $row;
                $rec_id = $row['rec_id'];
                $sql = "SELECT tb1.*,tb2.region_name AS province,tb3.region_name AS city,tb4.region_name AS district FROM `{$this->App->prefix()}goods_order_address` AS tb1";
                $sql .= " LEFT JOIN `{$this->App->prefix()}region` AS tb2 ON tb2.region_id = tb1.province";
                $sql .= " LEFT JOIN `{$this->App->prefix()}region` AS tb3 ON tb3.region_id = tb1.city";
                $sql .= " LEFT JOIN `{$this->App->prefix()}region` AS tb4 ON tb4.region_id = tb1.district";
                $sql .= " WHERE tb1.rec_id='$rec_id'";
                $rt['goodslist'][$k]['ress'] = $this->App->find($sql);
            }
        
        $status = $this->get_status($rt['orderinfo']['order_status'], $rt['orderinfo']['pay_status'], $rt['orderinfo']['shipping_status']);
        $rt['status'] = explode(',', $status);
        
        if (! defined(NAVNAME))
            define('NAVNAME', "订单详情");
        $this->set('rt', $rt);
        $this->template('user_orderinfo');
    }
    
    // 订单详情
    function orderinfo2014($data = array())
    {
        $this->title('订单详情 - ' . $GLOBALS['LANG']['site_name']);
        $uid = $this->checked_login();
        $orderid = $data['order_id'];
        if (empty($orderid)) {
            $this->jump(ADMIN_URL . 'user.php?act=orderlist');
            exit();
        }
        
        $sql = "SELECT * FROM `{$this->App->prefix()}goods_order` WHERE order_id='$orderid' ORDER BY goods_id";
        $rt['goodslist'] = $this->App->find($sql);
        
        $sql = "SELECT tb1.*,tb2.region_name AS province,tb3.region_name AS city,tb4.region_name AS district FROM `{$this->App->prefix()}goods_order_info` AS tb1";
        $sql .= " LEFT JOIN `{$this->App->prefix()}region` AS tb2 ON tb2.region_id = tb1.province";
        $sql .= " LEFT JOIN `{$this->App->prefix()}region` AS tb3 ON tb3.region_id = tb1.city";
        $sql .= " LEFT JOIN `{$this->App->prefix()}region` AS tb4 ON tb4.region_id = tb1.district";
        $sql .= " WHERE tb1.order_id='$orderid'";
        $rt['orderinfo'] = $this->App->findrow($sql);
        
        $status = $this->get_status($rt['orderinfo']['order_status'], $rt['orderinfo']['pay_status'], $rt['orderinfo']['shipping_status']);
        $rt['status'] = explode(',', $status);
        
        if (! defined(NAVNAME))
            define('NAVNAME', "订单详情");
        $this->set('rt', $rt);
        // $this->template('user_orderinfo2014');
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template($mb . '/user_orderinfo2014');
    }
    
    // 选择订单的所在状态
    function select_statue($id = "")
    {
        if (empty($id))
            return "";
        switch ($id) {
            case '-1':
                return "";
                break;
            case '11':
                return "tb1.order_status='0'";
                break;
            case '200':
                return "tb1.order_status='2' AND tb1.shipping_status='0' AND tb1.pay_status='0'";
                break;
            case '210':
                return "tb1.order_status='2' AND tb1.shipping_status='0' AND tb1.pay_status='1'";
                break;
            case '214':
                return "tb1.order_status='2' AND tb1.shipping_status='4' AND tb1.pay_status='1'";
                break;
            case '1':
                return "tb1.order_status='1'";
                break;
            case '4':
                return "tb1.order_status='4'";
                break;
            case '3':
                return "tb1.order_status='3'";
                break;
            case '2':
                return "tb1.pay_status='2'";
                break;
            case '222': // 已发货
                return "tb1.shipping_status='2'";
                break;
            default:
                return "";
                break;
        }
    }

    // #############################
    function error_jump()
    {
        $this->action('common', 'show404tpl');
    }
    
    // 用户订单操作
    public function ajax_order_op_user( $data = array() )
    {
        $id = isset($data['id']) ? $data['id'] : 0;
        $op = isset($data['type']) ? $data['type'] : '';
        if ( empty($id) || empty($op) )
        {
            die( '传送ID为空！' );
        }
        if ( $op == "cancel_order" )
        {
            $this->App->update('goods_order_info', array(
                'order_status' => '1'
            ), 'order_id', $id);
        }
        /* 确认收货 */
        else if ( $op == "confirm" )
        {
            $sql ="SELECT * FROM `{$this->App->prefix()}userconfig` LIMIT 1";
            $rts = $this->App->findrow( $sql );
            /* 收货返佣金 */
            if ( $rts['userbonus'] )
            {
                //收货之后返剩余的全部佣金和分红
                /* 返佣开始 */
                $this->rebate( $id );

                /* 分红开始  by niripsa*/
                $this->dividend( $id );
            }
            /* 更新订单 */
            $bIsSuccess = $this->App->update( 'goods_order_info', array(
                'shipping_status' => '5',
                'shipping_time'   => time()
            ), 'order_id', $id );

            /*if($bIsSuccess){
                $field = 'user_id,order_amount';
                $sql = "SELECT {$field} FROM `{$this->App->prefix()}goods_order_info` WHERE order_id = '$id' LIMIT 1";
                $aOrderInfo = $this->App->findrow( $sql );
                //将本订单信息积累到gz_user表
                $sNow = date('Y');
                $iUserId = intval($aOrderInfo['user_id']);
                $fPersonBuySum = floatval($aOrderInfo['order_amount']);

                if(!empty($iUserId)){
                    $sql = "update `gz_user` set `person_buy_sum` = `person_buy_sum` + {$fPersonBuySum} where `user_id` = {$iUserId} and `person_buy_year` = '{$sNow}'";
                    $iAffectedRows = $this->App->query($sql);
                    if(empty($iAffectedRows)){
                        $sql = "update `gz_user` set `person_buy_sum` = {$fPersonBuySum}, `person_buy_year` = '{$sNow}'  where `user_id` = {$iUserId}";
                        $this->App->query($sql);
                    }
                }
            }*/
        }
        else if ( $op == "tuikuan" )
        { // 申请退款
            $this->App->update( 'goods_order_info', array(
                'order_status' => '5'
            ), 'order_id', $id );
        }
        else if ( $op == "tuihuo" )
        { // 申请退货
            $this->App->update( 'goods_order_info', array(
                'order_status' => '6'
            ), 'order_id', $id );
        }
    }

    //新增个人分红(变相折扣) by niripsa
    public function dividend( $id ){
        $sql = "SELECT * FROM `{$this->App->prefix()}userconfig` LIMIT 1";
        $rts = $this->App->findrow( $sql );
        // 开启收货返分红选项
        $field = 'user_id,goods_amount,order_amount,order_sn,pay_status,shipping_status,order_id,fenhong_num';
        $sql = "SELECT {$field} FROM `{$this->App->prefix()}goods_order_info` WHERE order_id = '$id' LIMIT 1";
        $order_info = $this->App->findrow( $sql );
        
        //pay_status:支付状态,0为未支付,1为已支付
        //shipping_status:配送状态,0,2,4,5   收款时分红不需要验证物流状态
        //if ( $order_info['pay_status'] == 1 && $order_info['shipping_status'] == 2 && ! empty( $id ) )
         if ( $order_info['pay_status'] == 1 && $order_info['shipping_status'] == 2 && ! empty( $id ) )
        {
            // 计算资金，便于下面返利
            // 计算每个产品的分红
            $sql = "SELECT fenhong1,goods_number,wallet_id FROM `{$this->App->prefix()}goods_order` WHERE order_id = '$id'";
            $moneys = $this->App->find( $sql );
            /* 所属佣金钱包 */
            $wallet_id = $moneys[0]['wallet_id'];
            $user_id      = $uid = isset($order_info['user_id']) ? $order_info['user_id'] : 0;  // 自己
            $scores_money = isset($order_info['order_amount']) ? $order_info['order_amount'] : 0; // 实际消费
            $pay_status   = isset($order_info['pay_status']) ? $order_info['pay_status'] : 0;
            $order_id     = isset($order_info['order_id']) ? $order_info['order_id'] : 0;
            $order_sn     = isset($order_info['order_sn']) ? $order_info['order_sn'] : 0;
            
            $sql = "SELECT nickname FROM `{$this->App->prefix()}user` WHERE user_id='$uid' LIMIT 1";
            $nickname = $this->App->findvar( $sql );
            $record = array();
            $moeys = 0;
            //分红返利
            if ( $user_id > 0 )
            {                
                $sql = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id = '$user_id' LIMIT 1";
                $rank = $this->App->findvar( $sql );
                /* 不是普通会员 */
                if ( $rank != '1' )
                {
                    /*$sql = "SELECT types FROM `{$this->App->prefix()}user` WHERE user_id = '$user_id' LIMIT 1";这个好像用不到
                    $types = $this->App->findvar( $sql );*/
                    $off = 0;
                    /* 普通分销商 特权、高级先去掉，以后如果需要从log里面找 */
                    if ( $rank == '12' )
                    {
                        if ( $rts['fenhong180'] < 101 && $rts['fenhong180'] > 0 )
                        {
                            $off = $rts['fenhong180'] / 100;
                            if ( ! empty( $moneys ) )
                            {
                                foreach ( $moneys as $row )
                                {
                                    //fenhong1 个人分红
                                    if ( $row['fenhong1'] > 0 )
                                    {
                                        $moeys += $row['fenhong1'] * $row['goods_number'] * $off;
                                    }
                                }
                            }                                            
                        }
                    }
                    if ( $moeys > 0 )
                    {
                        /* 佣金分次，计算每一次的佣金费用 */
                        $moeys = $moeys / $order_info['fenhong_num'];
                        /* 每一次的佣金费用 x 剩余佣金次数 = 剩余佣金金额 */
                        $moeys = $moeys * $order_info['fenhong_surplus'];
                        $moeys = $this->format_price( $moeys );
                    }
                    /* 检查钱包状态 */
                    $wallet_status = $this->_wallet_status( $wallet_id, $user_id );
                    if ( ! empty( $moeys ) && $wallet_status == '1' )
                    {
                        /* 加钱 */
                        $this->_add_money( $wallet_id, $user_id, $moeys );
                        /* 分红剩余次数为0 */
                        $data = array();
                        $data['fenhong_surplus'] =0;
                        $this->App->update( 'goods_order_info', $data, 'order_id', $id );
                        /* 减少 user_money_change_cache */
                        $this->_decr_money_change_cache( $moeys, $order_info['order_sn'], $user_id );                                  
                        /* 加记录 */
                        $this->_add_fenhong_change( $uid, $user_id, $order_sn, $moeys, $wallet_id );
                        /* 发通知 */
                        $this->_send_notice( $user_id, $nickname );
                    }
                }
            }
        }
    }

    //新增团购个人分红(变相折扣) by niripsa
    public function group_dividend( $id ){
        $sql = "SELECT * FROM `{$this->App->prefix()}userconfig` LIMIT 1";
        $rts = $this->App->findrow( $sql );
        // 开启收货返分红选项
        $field = 'user_id,goods_amount,order_amount,order_sn,pay_status,shipping_status,order_id,fenhong_num,fenhong_surplus';
        $sql = "SELECT {$field} FROM `{$this->App->prefix()}group_goods_order_info` WHERE order_id = '$id' LIMIT 1";
        $order_info = $this->App->findrow( $sql );
        
        //pay_status:支付状态,0为未支付,1为已支付
        //shipping_status:配送状态,0,2,4,5   收款时分红不需要验证物流状态
        //if ( $order_info['pay_status'] == 1 && $order_info['shipping_status'] == 2 && ! empty( $id ) )
         if ( $order_info['pay_status'] == 1 && $order_info['shipping_status'] == 2 && ! empty( $id ) )
        {
            // 计算资金，便于下面返利
            // 计算每个产品的分红
            $sql = "SELECT fenhong1,goods_number,wallet_id FROM `{$this->App->prefix()}group_goods_order` WHERE order_id = '$id'";
            $moneys = $this->App->find( $sql );
            /* 所属佣金钱包 */
            $wallet_id = $moneys[0]['wallet_id'];
            $user_id      = $uid = isset($order_info['user_id']) ? $order_info['user_id'] : 0;  // 自己
            $scores_money = isset($order_info['order_amount']) ? $order_info['order_amount'] : 0; // 实际消费
            $pay_status   = isset($order_info['pay_status']) ? $order_info['pay_status'] : 0;
            $order_id     = isset($order_info['order_id']) ? $order_info['order_id'] : 0;
            $order_sn     = isset($order_info['order_sn']) ? $order_info['order_sn'] : 0;
            
            $sql = "SELECT nickname FROM `{$this->App->prefix()}user` WHERE user_id='$uid' LIMIT 1";
            $nickname = $this->App->findvar( $sql );
            $record = array();
            $moeys = 0;
            //分红返利
            if ( $user_id > 0 )
            {                
                $sql = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id = '$user_id' LIMIT 1";
                $rank = $this->App->findvar( $sql );
                /* 不是普通会员 */
                if ( $rank != '1' )
                {
                    /*$sql = "SELECT types FROM `{$this->App->prefix()}user` WHERE user_id = '$user_id' LIMIT 1";这个好像用不到
                    $types = $this->App->findvar( $sql );*/
                    $off = 0;
                    /* 普通分销商 特权、高级先去掉，以后如果需要从log里面找 */
                    if ( $rank == '12' )
                    {
                        if ( $rts['fenhong180'] < 101 && $rts['fenhong180'] > 0 )
                        {
                            $off = $rts['fenhong180'] / 100;
                            if ( ! empty( $moneys ) )
                            {
                                foreach ( $moneys as $row )
                                {
                                    //fenhong1 个人分红
                                    if ( $row['fenhong1'] > 0 )
                                    {
                                        $moeys += $row['fenhong1'] * $row['goods_number'] * $off;
                                    }
                                }
                            }                                            
                        }
                    }
                    if ( $moeys > 0 )
                    {
                        /* 佣金分次，计算每一次的佣金费用 */
                        $moeys = $moeys / $order_info['fenhong_num'];
                    /* 每一次的佣金费用 x 剩余佣金次数 = 剩余佣金金额 */
                        $moeys = $moeys * $order_info['fenhong_surplus'];
                        $moeys = $this->format_price( $moeys );
                    }
                    
                    /* 检查钱包状态 */
                    $wallet_status = $this->_wallet_status( $wallet_id, $user_id );
                    if ( ! empty( $moeys ) && $wallet_status == '1' )
                    {
                        /* 加钱 */
                        $this->_add_money( $wallet_id, $user_id, $moeys );
                        /* 分红剩余次数为0 */
                        $data = array();
                        $data['fenhong_surplus'] = 0;
                        $this->App->update( 'goods_order_info', $data, 'order_id', $id );
                        /* 减少 user_money_change_cache */
                        $this->_decr_money_change_cache( $moeys, $order_info['order_sn'], $user_id );                           
                        /* 加记录 */
                        $this->_add_fenhong_change( $uid, $user_id, $order_sn, $moeys, $wallet_id );
                        /* 发通知 */
                        $this->_send_notice( $user_id, $nickname );
                    }
                }
            }
        }
    }

    /**
     * 返佣金算法
     */
    public function rebate( $id )
    {
        $sql = "SELECT * FROM `{$this->App->prefix()}userconfig` LIMIT 1";
        $rts = $this->App->findrow( $sql );
        // 开启收货返佣选项
        $field = 'user_id,parent_uid,parent_uid2,parent_uid3,goods_amount,order_amount,order_sn,pay_status,shipping_status,order_id';
        $sql = "SELECT {$field} FROM `{$this->App->prefix()}goods_order_info` WHERE order_id = '$id' LIMIT 1";
        $order_info = $this->App->findrow( $sql );
        
        if ( $order_info['pay_status'] == 1 && $order_info['shipping_status'] == 2 && ! empty( $id ) )
        {
            // 计算资金，便于下面返佣
            // 计算每个产品的佣金
            $sql = "SELECT takemoney1,takemoney2,takemoney3,goods_number,wallet_id FROM `{$this->App->prefix()}goods_order` WHERE order_id = '$id'";
            $moneys = $this->App->find( $sql );
            /* 所属佣金钱包 */
            $wallet_id = $moneys[0]['wallet_id'];
            
            $parent_uid   = isset($order_info['parent_uid']) ? $order_info['parent_uid'] : 0;    // 一层上级
            $parent_uid2  = isset($order_info['parent_uid2']) ? $order_info['parent_uid2'] : 0; // 二层上级
            $parent_uid3  = isset($order_info['parent_uid3']) ? $order_info['parent_uid3'] : 0; // 三层上级

            if(empty($parent_uid4)){
                $parent_uid4 = $this->return_daili_uid($parent_uid3);
            }   

            $aParentIds = array($parent_uid, $parent_uid2, $parent_uid3, $parent_uid4);
            $sTeamIds = implode(',', $aParentIds);
            //获取四人的团队积累和
            $fTeamSum = $this->App->findvar("SELECT sum(person_buy_sum) as team_sum FROM `{$this->App->prefix()}user` WHERE user_id in ($sTeamIds) LIMIT 1");
            //获得第三级的个人积累
            $fPersonSum = $this->App->findvar("SELECT person_buy_sum FROM `{$this->App->prefix()}user` WHERE user_id = {$parent_uid3} LIMIT 1");

            $user_id      = $uid = isset($order_info['user_id']) ? $order_info['user_id'] : 0;  // 自己
            $scores_money = isset($order_info['order_amount']) ? $order_info['order_amount'] : 0; // 实际消费
            $pay_status   = isset($order_info['pay_status']) ? $order_info['pay_status'] : 0;
            $order_id     = isset($order_info['order_id']) ? $order_info['order_id'] : 0;
            $order_sn     = isset($order_info['order_sn']) ? $order_info['order_sn'] : 0;
            
            $sql = "SELECT nickname FROM `{$this->App->prefix()}user` WHERE user_id='$uid' LIMIT 1";
            $nickname = $this->App->findvar( $sql );
            $record = array();
            $moeys = 0;
            // 一级返佣金
            if ( $parent_uid > 0 )
            {
                /* 一层上级送积分 */
                $tjpointnum = isset( $rts['tjpointnum'] ) ? $rts['tjpointnum'] : 0;
                if ( $tjpointnum > 0 )
                {
                    $sql = "SELECT parent_uid FROM `{$this->App->prefix()}user_tuijian` WHERE uid = '$uid' LIMIT 1";
                    $pid = $this->App->findvar( $sql );
                    if ( $pid > 0 )
                    {
                        $points_num = 1;
                        $thismonth = date('Y-m-d', time());
                        /* 一层上级获得 1 积分 */
                        $sql = "UPDATE `{$this->App->prefix()}user` SET `points_ucount` = `points_ucount`+$points_num,`mypoints` = `mypoints`+$points_num WHERE user_id = '$pid'";
                        $this->App->query($sql);
                        $this->App->insert( 'user_point_change', array(
                            'order_sn'   => $order_sn,
                            'thismonth'  => $thismonth,
                            'points'     => $points_num,
                            'changedesc' => '推荐消费返积分',
                            'time'       => time(),
                            'uid'        => $pid
                        ));
                    }
                }
                
                $sql = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id = '$parent_uid' LIMIT 1";
                $rank = $this->App->findvar( $sql );
                /* 不是普通会员 */
                if ( $rank != '1' )
                {
                    $sql = "SELECT types FROM `{$this->App->prefix()}user` WHERE user_id = '$parent_uid' LIMIT 1";
                    $types = $this->App->findvar( $sql );
                    $off = 0;
                    /* 普通分销商 特权、高级先去掉，以后如果需要从log里面找 */
                    if ( $rank == '12' )
                    {
                        $rts['ticheng180_1'] = intval($rts['ticheng180_1_1']*$rts['ticheng180_1_2']/100);
                        if ( $rts['ticheng180_1'] < 101 && $rts['ticheng180_1'] > 0 )
                        {
                            $off = $rts['ticheng180_1'] / 100;
                            if ( ! empty( $moneys ) )
                            {
                                foreach ( $moneys as $row )
                                {
                                    if ( $row['takemoney1'] > 0 )
                                    {
                                        $moeys += $row['takemoney1'] * $row['goods_number'] * $off;
                                    }
                                }
                            }                                 
                        }
                    }

                    $this->writeLog(__FILE__ . "|uid:{$uid}| 1 level | money:" . $moeys . "|ticheng:" . $off . '|rank:' . $rank . '|parent_id:' . $parent_uid);
                    if ( $moeys > 0 )
                    {
                        $moeys = format_price($moeys);
                    }
                    /* 检查钱包状态 */
                    $wallet_status = $this->_wallet_status( $wallet_id, $parent_uid );
                    if ( ! empty( $moeys ) && $wallet_status == '1' )
                    {
                        /* 加钱 */
                        $this->_add_money( $wallet_id, $parent_uid, $moeys );
                        /* 加记录 */
                        $this->_add_money_change( $uid, $parent_uid, $order_sn, $moeys, $wallet_id );
                        /* 发通知 */
                        $this->_send_notice( $parent_uid, $nickname );
                    }
                }
            }
            
            $moeys = 0;
            // 二级返佣金
            if ( $parent_uid2 > 0 )
            {
                $sql = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id = '$parent_uid2' LIMIT 1";
                $rank = $this->App->findvar( $sql );
                /* 不是普通会员 */
                if ( $rank != '1' ) 
                {
                    $off = 0;
                    /* 普通分销商 特权、高级先去掉，以后如果需要从log里面找 */
                    if ( $rank == '12' )
                    {
                        $rts['ticheng180_2'] = intval($rts['ticheng180_2_1']*$rts['ticheng180_2_2']/100);
                        if ( $rts['ticheng180_2'] < 101 && $rts['ticheng180_2'] > 0 )
                        {
                            $off = $rts['ticheng180_2'] / 100;
                            if ( ! empty( $moneys ) )
                            {
                                foreach ( $moneys as $row )
                                {
                                    if ( $row['takemoney1'] > 0 )
                                    {
                                        $moeys += $row['takemoney1'] * $row['goods_number'] * $off;
                                    }
                                } 
                            }
                        }
                    }
                    $this->writeLog(__FILE__ . "|uid:{$uid}| 2 level | money:" . $moeys . "|ticheng:" . $off . '|rank:' . $rank . '|parent_id:' . $parent_uid2);
                    if ( $moeys > 0 )
                    {
                        $moeys = format_price($moeys);
                    }
                    /* 检查钱包状态 */
                    $wallet_status = $this->_wallet_status( $wallet_id, $parent_uid2 );
                    if ( ! empty( $moeys ) && $wallet_status == '1' )
                    {
                        /* 加钱 */
                        $this->_add_money( $wallet_id, $parent_uid2, $moeys );
                        /* 加记录 */
                        $this->_add_money_change( $uid, $parent_uid2, $order_sn, $moeys, $wallet_id );
                        /* 发通知 */
                        $this->_send_notice( $parent_uid2, $nickname );
                    }
                }
            }
            
            $moeys = 0;
            // 三级返佣金
            if ( $parent_uid3 > 0 )
            {
                $sql = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id = '$parent_uid3' LIMIT 1";
                $rank = $this->App->findvar( $sql );
                /* 不是普通会员 */
                if ( $rank != '1' ) 
                {
                    $off = 0;
                    /* 普通分销商 特权、高级先去掉，以后如果需要从log里面找 */
                    if ( $rank == '12' )
                    {
                        if( floatval($rts['person_accumulative_money']) > 0 && floatval($fPersonSum) >= floatval($rts['person_accumulative_money']) ){
                            $rts['ticheng180_3'] = intval($rts['ticheng180_3_1']*$rts['ticheng180_3_2']/100);
                            if ( $rts['ticheng180_3'] < 101 && $rts['ticheng180_3'] > 0 )
                            {
                                $off = $rts['ticheng180_3'] / 100;
                                if ( ! empty( $moneys ) )
                                {
                                    foreach ( $moneys as $row )
                                    {
                                        if ( $row['takemoney1'] > 0 )
                                        {
                                            $moeys += $row['takemoney1'] * $row['goods_number'] * $off;
                                        }
                                    }
                                }                                            
                            }
                        }
                    }

                    $this->writeLog(__FILE__ . "|uid:{$uid}| 3 level | money:" . $moeys . "|ticheng:" . $off . '|rank:' . $rank . '|parent_id:' . $parent_uid3); 
                    if ( $moeys > 0 )
                    {
                        $moeys = format_price($moeys);
                    }
                    /* 检查钱包状态 */
                    $wallet_status = $this->_wallet_status( $wallet_id, $parent_uid3 );
                    if ( ! empty( $moeys ) && $wallet_status == '1' )
                    {
                        /* 加钱 */
                        $this->_add_money( $wallet_id, $parent_uid3, $moeys );
                        /* 加记录 */
                        $this->_add_money_change( $uid, $parent_uid3, $order_sn, $moeys, $wallet_id );
                        /* 发通知 */
                        $this->_send_notice( $parent_uid3, $nickname );
                    }
                }
            }//end of if uid3

            $moeys = 0;
            // 四级返佣金
            if ( $parent_uid4 > 0 )
            {
                $sql = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id = '$parent_uid4' LIMIT 1";
                $rank = $this->App->findvar( $sql );
                /* 不是普通会员 */
                if ( $rank != '1' ) 
                {
                    $off = 0;
                    if($rank=='12'){
                        if( floatval($rts['team_accumulative_money']) > 0 && floatval($fTeamSum) >= floatval($rts['team_accumulative_money']) ){
                            $rts['ticheng180_4'] = intval($rts['ticheng180_4_1']*$rts['ticheng180_4_2']/100);
                            if ( $rts['ticheng180_4'] < 101 && $rts['ticheng180_4'] > 0 )
                            {
                                $off = $rts['ticheng180_4'] / 100;
                                if ( ! empty( $moneys ) )
                                {
                                    foreach ( $moneys as $row )
                                    {
                                        if ( $row['takemoney1'] > 0 )
                                        {
                                            $moeys += $row['takemoney1'] * $row['goods_number'] * $off;
                                        }
                                    }
                                }                                            
                            }
                        }
                    }
                    $this->writeLog(__FILE__ . "|uid:{$uid}| 4 level | money:" . $moeys . "|ticheng:" . $off . '|rank:' . $rank . '|parent_id:' . $parent_uid4); 
                    if ( $moeys > 0 )
                    {
                        $moeys = format_price($moeys);
                    }
                    /* 检查钱包状态 */
                    $wallet_status = $this->_wallet_status( $wallet_id, $parent_uid4 );
                    if ( ! empty( $moeys ) && $wallet_status == '1' )
                    {
                        /* 加钱 */
                        $this->_add_money( $wallet_id, $parent_uid4, $moeys );
                        /* 加记录 */
                        $this->_add_money_change( $uid, $parent_uid4, $order_sn, $moeys, $wallet_id );
                        /* 发通知 */
                        $this->_send_notice( $parent_uid4, $nickname );
                    }
                }
            }//end of if uid4
        }
    }

    /**
     * 团购 返佣金算法
     */
    public function group_rebate( $id )
    {
        $sql = "SELECT * FROM `{$this->App->prefix()}userconfig` LIMIT 1";
        $rts = $this->App->findrow( $sql );
        // 开启收货返佣选项
        $field = 'user_id,parent_uid,parent_uid2,parent_uid3,goods_amount,order_amount,order_sn,pay_status,shipping_status,order_id';
        $sql = "SELECT {$field} FROM `{$this->App->prefix()}group_goods_order_info` WHERE order_id = '$id' LIMIT 1";
        $order_info = $this->App->findrow( $sql );
        
        if ( $order_info['pay_status'] == 1 && $order_info['shipping_status'] == 2 && ! empty( $id ) )
        {
            // 计算资金，便于下面返佣
            // 计算每个产品的佣金
            $sql = "SELECT takemoney1,takemoney2,takemoney3,goods_number FROM `{$this->App->prefix()}group_goods_order` WHERE order_id = '$id'";
            $moneys = $this->App->find( $sql );
            /* 所属佣金钱包 */
            $wallet_id = 1;
            
            $parent_uid   = isset($order_info['parent_uid']) ? $order_info['parent_uid'] : 0;    // 一层上级
            $parent_uid2  = isset($order_info['parent_uid2']) ? $order_info['parent_uid2'] : 0;  // 二层上级
            $parent_uid3  = isset($order_info['parent_uid3']) ? $order_info['parent_uid3'] : 0;  // 三层上级

            $parent_uid4 = $this->return_daili_uid($parent_uid3);

            $aParentIds = array($parent_uid, $parent_uid2, $parent_uid3, $parent_uid4);
            $sTeamIds = implode(',', $aParentIds);
            //获取四人的团队积累和
            $fTeamSum = $this->App->findvar("SELECT sum(person_buy_sum) as team_sum FROM `{$this->App->prefix()}user` WHERE user_id in ($sTeamIds) LIMIT 1");
            //获得第三级的个人积累
            $fPersonSum = $this->App->findvar("SELECT person_buy_sum FROM `{$this->App->prefix()}user` WHERE user_id = {$parent_uid3} LIMIT 1");


            $user_id      = $uid = isset($order_info['user_id']) ? $order_info['user_id'] : 0;   // 自己
            $scores_money = isset($order_info['order_amount']) ? $order_info['order_amount'] : 0; // 实际消费
            $pay_status   = isset($order_info['pay_status']) ? $order_info['pay_status'] : 0;
            $order_id     = isset($order_info['order_id']) ? $order_info['order_id'] : 0;
            $order_sn     = isset($order_info['order_sn']) ? $order_info['order_sn'] : 0;
            
            $sql      = "SELECT nickname FROM `{$this->App->prefix()}user` WHERE user_id = '$uid' LIMIT 1";
            $nickname = $this->App->findvar( $sql );
            $record   = array();
            $moeys    = 0;
            // 一级返佣金
            if ( $parent_uid > 0 )
            {
                /* 一层上级送积分 */
                $tjpointnum = isset( $rts['tjpointnum'] ) ? $rts['tjpointnum'] : 0;
                if ( $tjpointnum > 0 )
                {
                    $sql = "SELECT parent_uid FROM `{$this->App->prefix()}user_tuijian` WHERE uid = '$uid' LIMIT 1";
                    $pid = $this->App->findvar( $sql );
                    if ( $pid > 0 )
                    {
                        $points_num = 1;
                        $thismonth = date('Y-m-d', time());
                        /* 一层上级获得 1 积分 */
                        $sql = "UPDATE `{$this->App->prefix()}user` SET `points_ucount` = `points_ucount`+$points_num,`mypoints` = `mypoints`+$points_num WHERE user_id = '$pid'";
                        $this->App->query($sql);
                        $this->App->insert( 'user_point_change', array(
                            'order_sn'   => $order_sn,
                            'thismonth'  => $thismonth,
                            'points'     => $points_num,
                            'changedesc' => '推荐消费返积分',
                            'time'       => time(),
                            'uid'        => $pid
                        ));
                    }
                }
                
                $sql = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id = '$parent_uid' LIMIT 1";
                $rank = $this->App->findvar( $sql );
                /* 不是普通会员 */
                if ( $rank != '1' )
                {
                    $sql = "SELECT types FROM `{$this->App->prefix()}user` WHERE user_id = '$parent_uid' LIMIT 1";
                    $types = $this->App->findvar( $sql );
                    $off = 0;
                    /* 普通分销商 特权、高级先去掉，以后如果需要从log里面找 */
                    if ( $rank == '12' )
                    {
                        $rts['ticheng180_1'] = intval($rts['ticheng180_1_1']*$rts['ticheng180_1_2']/100);
                        if ( $rts['ticheng180_1'] < 101 && $rts['ticheng180_1'] > 0 )
                        {
                            $off = $rts['ticheng180_1'] / 100;
                            if ( ! empty( $moneys ) )
                            {
                                foreach ( $moneys as $row )
                                {
                                    if ( $row['takemoney1'] > 0 )
                                    {
                                        $moeys += $row['takemoney1'] * $row['goods_number'] * $off;
                                    }
                                }
                            }                                            
                        }
                    }

                    $this->writeLog(__FILE__ . "|2|uid:{$uid}| 1 level | money:" . $moeys . "|ticheng:" . $off . '|rank:' . $rank . '|parent_id:' . $parent_uid); 
                    if ( $moeys > 0 )
                    {
                        $moeys = format_price($moeys);
                    }
                    /* 检查钱包状态 */
                    $wallet_status = $this->_wallet_status( $wallet_id, $parent_uid );
                    if ( ! empty( $moeys ) && $wallet_status == '1' )
                    {
                        /* 加钱 */
                        $this->_add_money( $wallet_id, $parent_uid, $moeys );
                        /* 加记录 */
                        $this->_add_money_change( $uid, $parent_uid, $order_sn, $moeys, $wallet_id );
                        /* 发通知 */
                        $this->_send_notice( $parent_uid, $nickname );
                    }
                }
            }
            
            $moeys = 0;
            // 二级返佣金
            if ( $parent_uid2 > 0 )
            {
                $sql = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id = '$parent_uid2' LIMIT 1";
                $rank = $this->App->findvar( $sql );
                /* 不是普通会员 */
                if ( $rank != '1' ) 
                {
                    $off = 0;
                    /* 普通分销商 特权、高级先去掉，以后如果需要从log里面找 */
                    if ( $rank == '12' )
                    {
                        $rts['ticheng180_2'] = intval($rts['ticheng180_2_1']*$rts['ticheng180_2_2']/100);
                        if ( $rts['ticheng180_2'] < 101 && $rts['ticheng180_2'] > 0 )
                        {
                            $off = $rts['ticheng180_2'] / 100;
                            if ( ! empty( $moneys ) )
                            {
                                foreach ( $moneys as $row )
                                {
                                    if ( $row['takemoney1'] > 0 )
                                    {
                                        $moeys += $row['takemoney1'] * $row['goods_number'] * $off;
                                    }
                                }
                            }
                        }
                    }

                    $this->writeLog(__FILE__ . "|2|uid:{$uid}| 2 level | money:" . $moeys . "|ticheng:" . $off . '|rank:' . $rank . '|parent_id:' . $parent_uid2); 
                    if ( $moeys > 0 )
                    {
                        $moeys = format_price($moeys);
                    }
                    /* 检查钱包状态 */
                    $wallet_status = $this->_wallet_status( $wallet_id, $parent_uid2 );
                    if ( ! empty( $moeys ) && $wallet_status == '1' )
                    {
                        /* 加钱 */
                        $this->_add_money( $wallet_id, $parent_uid2, $moeys );
                        /* 加记录 */
                        $this->_add_money_change( $uid, $parent_uid2, $order_sn, $moeys, $wallet_id );
                        /* 发通知 */
                        $this->_send_notice( $parent_uid2, $nickname );
                    }
                }
            }
            
            $moeys = 0;
            // 三级返佣金
            if ( $parent_uid3 > 0 )
            {
                $sql = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id = '$parent_uid3' LIMIT 1";
                $rank = $this->App->findvar( $sql );
                /* 不是普通会员 */
                if ( $rank != '1' ) 
                {
                    $off = 0;
                    /* 普通分销商 特权、高级先去掉，以后如果需要从log里面找 */
                    if ( $rank == '12' )
                    {
                        if( floatval($rts['person_accumulative_money']) > 0 && floatval($fPersonSum) >= floatval($rts['person_accumulative_money']) ){
                            $rts['ticheng180_3'] = intval($rts['ticheng180_3_1']*$rts['ticheng180_3_2']/100);
                            if($rts['ticheng180_3'] < 101 && $rts['ticheng180_3'] > 0){
                                $off = $rts['ticheng180_3']/100;
                                if(!empty($moneys))foreach($moneys as $row){
                                    if($row['takemoney1'] > 0){
                                        $moeys +=$row['takemoney1'] * $row['goods_number'] * $off;
                                    }
                                }
                            }
                        }
                    }

                    $this->writeLog(__FILE__ . "|2|uid:{$uid}| 3 level | money:" . $moeys . "|ticheng:" . $off . '|rank:' . $rank . '|parent_id:' . $parent_uid3); 
                    if ( $moeys > 0 )
                    {
                        $moeys = format_price($moeys);
                    }
                    /* 检查钱包状态 */
                    $wallet_status = $this->_wallet_status( $wallet_id, $parent_uid3 );
                    if ( ! empty( $moeys ) && $wallet_status == '1' )
                    {
                        /* 加钱 */
                        $this->_add_money( $wallet_id, $parent_uid3, $moeys );
                        /* 加记录 */
                        $this->_add_money_change( $uid, $parent_uid3, $order_sn, $moeys, $wallet_id );
                        /* 发通知 */
                        $this->_send_notice( $parent_uid3, $nickname );
                    }
                }
            }//end of if uid3

            $moeys = 0;
            // 四级返佣金
            if ( $parent_uid4 > 0 )
            {
                $sql = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id = '$parent_uid4' LIMIT 1";
                $rank = $this->App->findvar( $sql );
                /* 不是普通会员 */
                if ( $rank != '1' ) 
                {
                    $off = 0;
                    if($rank=='12'){
                        if( floatval($rts['team_accumulative_money']) > 0 && floatval($fTeamSum) >= floatval($rts['team_accumulative_money']) ){
                            $rts['ticheng180_4'] = intval($rts['ticheng180_4_1']*$rts['ticheng180_4_2']/100);
                            if ( $rts['ticheng180_4'] < 101 && $rts['ticheng180_4'] > 0 )
                            {
                                $off = $rts['ticheng180_4'] / 100;
                                if ( ! empty( $moneys ) )
                                {
                                    foreach ( $moneys as $row )
                                    {
                                        if ( $row['takemoney1'] > 0 )
                                        {
                                            $moeys += $row['takemoney1'] * $row['goods_number'] * $off;
                                        }
                                    }
                                }                                            
                            }
                        }
                    }
                    $this->writeLog(__FILE__ . "|2|uid:{$uid}| 4 level | money:" . $moeys . "|ticheng:" . $off . '|rank:' . $rank . '|parent_id:' . $parent_uid4); 
                    if ( $moeys > 0 )
                    {
                        $moeys = format_price($moeys);
                    }
                    /* 检查钱包状态 */
                    $wallet_status = $this->_wallet_status( $wallet_id, $parent_uid4 );
                    if ( ! empty( $moeys ) && $wallet_status == '1' )
                    {
                        /* 加钱 */
                        $this->_add_money( $wallet_id, $parent_uid4, $moeys );
                        /* 加记录 */
                        $this->_add_money_change( $uid, $parent_uid4, $order_sn, $moeys, $wallet_id );
                        /* 发通知 */
                        $this->_send_notice( $parent_uid4, $nickname );
                    }
                }
            }//end of if uid4
        }

        return $order_info;
    }
    /**
     * 减少money_change_cache.money
     */
    private function _decr_money_change_cache( $money, $order_sn, $uid )
    {
        $sql = "UPDATE `{$this->App->prefix()}user_money_change_cache` 
        SET money = money - {$money} 
        WHERE order_sn = '{$order_sn}' AND uid = '{$uid}'";
        $this->App->query( $sql );
    }
    /**
     * 检查钱包状态
     * wallet_id 钱包ID
     * user_id   用户ID
     */
    private function _wallet_status( $wallet_id, $user_id )
    {
        $field = 'wallet_' . $wallet_id;
        $sql = "SELECT {$field} FROM `{$this->App->prefix()}commission` WHERE user_id = '$user_id'";
        return $this->App->findvar( $sql );
    }

    /**
     * 根据钱包ID 把佣金增加至对应的钱包
     */
    private function _add_money( $wallet_id, $user_id, $money )
    {
        $field = 'wallet_' . $wallet_id;
        $sql = "SELECT {$field} FROM `{$this->App->prefix()}commission` WHERE user_id = '$user_id'";
        $wallet_status = $this->App->findvar( $sql );
        if ( $wallet_status == '1' )
        {
            $field = 'wallet_money' . $wallet_id;
            $sql = "UPDATE `{$this->App->prefix()}commission` SET $field = $field + $money WHERE user_id = '$user_id'";
            $this->App->query( $sql );
        }
    }

    /**
     * 佣金变动记录
     * buyer_id    购买者ID
     * parent_uid  受益者ID
     * order_sn    订单编号
     * money       变动金额
     */
    private function _add_money_change( $buyer_id, $parent_uid, $order_sn, $money, $wallet_id )
    {
        $thismonth             = date('Y-m-d', time());
        $thism                 = date('Y-m', time());
        $this->App->insert( 'user_money_change', array(
            'buyuid'     => $buyer_id,
            'order_sn'   => $order_sn,
            'thismonth'  => $thismonth,
            'thism'      => $thism,
            'money'      => $money,
            'changedesc' => '购买商品返佣金,钱包' . $wallet_id,
            'time'       => time(),
            'wallet_id'  => $wallet_id,
            'uid'        => $parent_uid
        ));
    }

    private function _add_fenhong_change( $buyer_id, $uid, $order_sn, $money, $wallet_id )
    {
        $thismonth             = date('Y-m-d', time());
        $thism                 = date('Y-m', time());
        $this->App->insert( 'user_money_change', array(
            'buyuid'     => $buyer_id,
            'order_sn'   => $order_sn,
            'thismonth'  => $thismonth,
            'thism'      => $thism,
            'money'      => $money,
            'changedesc' => '购买商品返分红,钱包' . $wallet_id,
            'time'       => time(),
            'wallet_id'  => $wallet_id,
            'uid'        => $uid
        ));
    }    

    /**
     * 发送微信推送通知
     */
    private function _send_notice( $user_id, $nickname )
    {
        $appid     = $this->Session->read('User.appid');
        $appsecret = $this->Session->read('User.appsecret');
        if ( empty( $appid ) )
        {
            $appid = isset($_COOKIE[CFGH . 'USER']['APPID']) ? $_COOKIE[CFGH . 'USER']['APPID'] : '';
        }
        if ( empty( $appsecret ) )
        {
            $appsecret = isset($_COOKIE[CFGH . 'USER']['APPSECRET']) ? $_COOKIE[CFGH . 'USER']['APPSECRET'] : '';
        }
        $sql = "SELECT wecha_id FROM `{$this->App->prefix()}user` WHERE user_id = '$user_id' LIMIT 1";
        $wecha_id = $this->App->findvar( $sql );
        $send_data = array(
            'openid'    => $wecha_id,
            'appid'     => $appid,
            'appsecret' => $appsecret,
            'nickname'  => $nickname
        );
        $this->action( 'api', 'send', $send_data, 'payreturnmoney' );
    }

    // 团购订单操作
    public function ajax_grouporder_op_user( $data = array() )
    {
        $id = isset($data['id']) ? $data['id'] : 0;
        $op = isset($data['type']) ? $data['type'] : '';
        if ( empty( $id ) || empty( $op ) )
        {
            die( '传送ID为空！' );
        }
        if ( $op == 'cancel_order' )
        {
            $this->App->update( 'group_goods_order_info',  array( 'order_status' => '1' ), 'order_id', $id );
        } 
        else 
        {
            if ( $op == 'confirm' ) {     /* 确认收货 */
                $sql = "SELECT * FROM `{$this->App->prefix()}userconfig` LIMIT 1";
                $rts = $this->App->findrow( $sql );
                /* 确认收货返佣 */
                $aOrderInfo = array();
                if ( $rts['userbonus'] )
                {
                    $this->group_dividend( $id );

                    $aOrderInfo = $this->group_rebate( $id );
                }

                if(empty($aOrderInfo)){
                    $field = 'user_id,parent_uid,parent_uid2,parent_uid3,parent_uid4,goods_amount,order_amount,order_sn,pay_status,shipping_status,order_id';
                    $sql = "SELECT {$field} FROM `{$this->App->prefix()}group_goods_order_info` WHERE order_id = '$order_id' LIMIT 1";
                    $aOrderInfo = $this->App->findrow( $sql );
                }
                // 更新订单
                $info_data = array();
                $info_data['shipping_status'] = '5';
                $info_data['shipping_time']   = time();
                $bIsSuccess = $this->App->update( 'group_goods_order_info', $info_data, 'order_id', $id );

                /*if($bIsSuccess){
                    //将本订单信息积累到gz_user表
                    $sNow = date('Y');
                    $iUserId = intval($aOrderInfo['user_id']);
                    $fPersonBuySum = floatval($aOrderInfo['order_amount']);

                    if(!empty($iUserId)){
                        $sql = "update `gz_user` set `person_buy_sum` = `person_buy_sum` + {$fPersonBuySum} where `user_id` = {$iUserId} and `person_buy_year` = '{$sNow}'";
                        $iAffectedRows = $this->App->query($sql);
                        if(empty($iAffectedRows)){
                            $sql = "update `gz_user` set `person_buy_sum` = {$fPersonBuySum}, `person_buy_year` = '{$sNow}'  where `user_id` = {$iUserId}";
                            $this->App->query($sql);
                        }
                    }
                }*/
            } else if ( $op == 'tuikuan' ) { // 申请退款
                $this->App->update( 'group_goods_order_info', array(
                    'order_status' => '5'
                ), 'order_id', $id );
            } else if ( $op == 'tuihuo' ) { // 申请退货
                $this->App->update( 'group_goods_order_info', array(
                    'order_status' => '6'
                ), 'order_id', $id );
            }
        }
    }

    function return_daili_uid($uid = 0, $k = 0)
    {
        if (! ($uid > 0)) {
            return 0;
        }
        $puid = 0;
        if ( $k < 20 ) {
            $sql = "SELECT parent_uid FROM `{$this->App->prefix()}user_tuijian` WHERE uid = '$uid' LIMIT 1";
            $puid = $this->App->findvar($sql);
            $sql = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id = '$puid' LIMIT 1";
            $rank = $this->App->findvar($sql);
            if ($rank == '1') {
                ++ $k;
                $this->return_daili_uid($puid, $k);
            } else {
                return $puid;
            }
        }
        return $puid;
    }

    function update_daili_tree($uid = 0)
    {
        if ($uid > 0) {
            $dd = array();
            $ss = array();
            $ss[] = $uid;
            $dd['uid'] = $uid;
            $dd['p1_uid'] = 0;
            $dd['p2_uid'] = 0;
            $dd['p3_uid'] = 0;
            
            $p1_uid = $this->return_daili_uid($uid);
            
            if ($p1_uid > 0 && ! in_array($p1_uid, $ss)) {
                $dd['p1_uid'] = $p1_uid;
                $p2_uid = $this->return_daili_uid($p1_uid);
                $ss[] = $p1_uid;
                $ss[] = $uid;
                if ($p2_uid > 0 && ! in_array($p2_uid, $ss)) {
                    $dd['p2_uid'] = $p2_uid;
                    $p3_uid = $this->return_daili_uid($p2_uid);
                    $ss[] = $p2_uid;
                    if ($p3_uid > 0 && ! in_array($p3_uid, $ss)) {
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
            
            if ($id > 0) {
                $this->App->update('user_tuijian_fx', $dd, 'id', $id);
            } else {
                $this->App->insert('user_tuijian_fx', $dd);
            }
        }
    }

    function update_user_tree($puid = 0, $ppuid = 0)
    {
        $three_arr = array();
        $sql = 'SELECT id,uid FROM `' . $this->App->prefix() . "user_tuijian` WHERE parent_uid = '$puid'";
        $rt = $this->App->find($sql);
        if (! empty($rt))
            foreach ($rt as $row) {
                $id = $row['id'];
                $uid = $row['uid']; //
                                    // 更新
                if ($id > 0) {
                    $this->App->update('user_tuijian', array(
                        'daili_uid' => $ppuid
                    ), 'id', $id);
                }
                // 判断当前是否是代理
                $sql = "SELECT user_rank FROM `{$this->App->prefix()}user` WHERE user_id='$uid' LIMIT 1";
                $rank = $this->App->findvar($sql);
                if ($rank == '1') { // 普通会员
                    $this->update_user_tree($uid, $ppuid);
                } else {}
            }
    }
    
    // 代购模式
    function myorder()
    {
        $uid = $this->checked_login();
        $this->action('common', 'checkjump');
        $this->title("欢迎进入用户后台管理中心" . ' - 我的订单 - ' . $GLOBALS['LANG']['site_name']);
        
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        if (! ($page > 0))
            $page = 1;
        $list = 5;
        $start = ($page - 1) * $list;
        
        $sql = "SELECT COUNT(order_id) FROM `{$this->App->prefix()}goods_order_info_daigou` WHERE user_id='$uid'";
        $tt = $this->App->findvar($sql);
        $rt['pages'] = Import::basic()->getpage($tt, $list, $page, '?page=', true);
        
        $sql = "SELECT * FROM `{$this->App->prefix()}goods_order_info_daigou` WHERE user_id='$uid' ORDER BY order_id DESC LIMIT $start,$list";
        $lists = $this->App->find($sql);
        $rt['lists'] = array();
        if (! empty($lists))
            foreach ($lists as $k => $row) {
                $rt['lists'][$k] = $row;
                $oid = $row['order_id'];
                $rt['lists'][$k]['gimg'] = $this->App->findcol("SELECT goods_thumb FROM `{$this->App->prefix()}goods_order_daigou` WHERE order_id='$oid'");
                $rt['lists'][$k]['status'] = $this->get_status($row['order_status'], $row['pay_status'], $row['shipping_status']);
                $rt['lists'][$k]['op'] = $this->get_option($row['order_id'], $row['order_status'], $row['pay_status'], $row['shipping_status']);
            }
        
        if (! defined(NAVNAME))
            define('NAVNAME', "我的订单");
        $this->set('rt', $rt);
        $this->set('page', $page);
        $this->template('user_myorder');
    }
    
    // 订单列表
    function orderlist()
    {
        $this->title( '我的订单 - ' . $GLOBALS['LANG']['site_name'] );
        $dt      = isset( $_GET['dt'] ) && intval( $_GET['dt'] ) > 0 ? intval( $_GET['dt'] ) : "";
        $status  = isset( $_GET['status'] ) ? trim( $_GET['status'] ) : "";
        $keyword = isset( $_GET['kk'] ) ? trim( $_GET['kk'] ) : "";
        $uid = $this->checked_login();
        // 用户订单
        $w_rt[] = "tb1.user_id = '$uid'";
        if ( ! empty( $dt ) )
        {
            $w_rt[] = "tb1.add_time < '$dt'";
        }
        
        if ( ! empty( $status ) )
        {
            $st = $this->select_statue( $status );
            ! empty($st) ? $w_rt[] = $st : "";
        }
        if ( ! empty( $keyword ) )
        {
            $w_rt[] = "(tb2.goods_name LIKE '%" . $keyword . "%' OR tb1.order_sn LIKE '%" . $keyword . "%')";
        }
        
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $page = $page ? : 1;
        $list = 5;
        $tt = $this->__order_list_count( $w_rt ); // 获取商品的数量
        $rt['order_count']         = $tt;        
        $rt['orderpage']           = Import::basic()->getpage($tt, $list, $page, '?page=', true);        
        $rt['orderlist']           = $this->__order_list( $w_rt, $page, $list );
        $rt['status']              = $status;        
        $rt['userinfo']['user_id'] = $this->Session->read('User.uid');

        /* 团购订单 */
        $group_list['order_count'] = $this->__group_order_list_count( $w_rt );   // 数量
        $group_list['orderlist'] = $this->__group_order_list( $w_rt );         // 订单列表
        
        if ( ! defined( NAVNAME ) )
        {
            define( 'NAVNAME', "我的订单" );
        }
        $this->set( 'rt', $rt );
        $this->set( 'group_list', $group_list );
        $this->set( 'page', $page );
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template( $mb . '/user_orderlist' );
    }

    // 众筹订单列表
    function crowd_orderlist()
    {
        $this->title('众筹订单 - ' . $GLOBALS['LANG']['site_name']);
        $dt = isset($_GET['dt']) && intval($_GET['dt']) > 0 ? intval($_GET['dt']) : "";
        $status = isset($_GET['status']) ? trim($_GET['status']) : "";
        $keyword = isset($_GET['kk']) ? trim($_GET['kk']) : "";
        $uid = $this->checked_login();
        // 用户订单
        $w_rt[] = "tb1.user_id = '$uid'";
        if (! empty($dt)) {
            $w_rt[] = "tb1.add_time < '$dt'";
        }
        
        if (! empty($status)) {
            $st = $this->select_statue($status);
            ! empty($st) ? $w_rt[] = $st : "";
        }
        if (! empty($keyword)) {
            $w_rt[] = "(tb2.goods_name LIKE '%" . $keyword . "%' OR tb1.order_sn LIKE '%" . $keyword . "%')";
        }
        
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        if (! ($page > 0))
            $page = 1;
        $list = 5;
        $tt = $this->__order_list_count($w_rt); // 获取商品的数量
        $rt['order_count'] = $tt;
        
        $rt['orderpage'] = Import::basic()->getpage($tt, $list, $page, '?page=', true);
        
        $rt['orderlist'] = $this->__crowd_order_list($w_rt, $page, $list);
        // var_dump( $rt['orderlist'] );die;
        $rt['status'] = $status;
        
        $rt['userinfo']['user_id'] = $this->Session->read('User.uid');
        
        /*
         * $sql = "SELECT COUNT(distinct order_id) FROM `{$this->App->prefix()}goods_order_info` WHERE user_id='$uid' AND order_status='2'";
         * $rt['userinfo']['success_ordercount'] = $this->App->findvar($sql); //成功订单
         *
         * $sql = "SELECT COUNT(distinct order_id) FROM `{$this->App->prefix()}goods_order_info` WHERE user_id='$uid' AND pay_status='0'";
         * $rt['userinfo']['pay_ordercount'] = $this->App->findvar($sql); //待支付订单
         *
         * $sql = "SELECT COUNT(distinct order_id) FROM `{$this->App->prefix()}goods_order_info` WHERE user_id='$uid' AND shipping_status='2'";
         * $rt['userinfo']['shopping_ordercount'] = $this->App->findvar($sql); //待发货订单
         *
         * $sql = "SELECT COUNT(distinct order_id) FROM `{$this->App->prefix()}goods_order_info` WHERE user_id='$uid'";
         * $rt['userinfo']['all_ordercount'] = $this->App->findvar($sql); //所有订单
         *
         * $sql = "SELECT COUNT(distinct order_id) FROM `{$this->App->prefix()}goods_order_info` WHERE user_id='$uid' AND (tb6.shipping_status='2' OR tb6.pay_status='0' OR tb6.order_status='0')";
         * $rt['userinfo']['daichuli_ordercount'] = $this->App->findvar($sql); //待处理订单
         *
         * $sql = "SELECT COUNT(distinct order_id) FROM `{$this->App->prefix()}goods_order_info` WHERE user_id='$uid' AND shipping_status='5'";
         * $rt['userinfo']['haicheng_ordercount'] = $this->App->findvar($sql); //已完成订单
         *
         * $sql = "SELECT COUNT(distinct order_id) FROM `{$this->App->prefix()}goods_order_info` WHERE user_id='$uid' AND order_status='1'";
         * $rt['userinfo']['quxiao_ordercount'] = $this->App->findvar($sql); //已取消订单
         *
         * $sql = "SELECT COUNT(distinct order_id) FROM `{$this->App->prefix()}goods_order_info` WHERE user_id='$uid' AND shipping_status='2'";
         * $rt['userinfo']['yifahuo_ordercount'] = $this->App->findvar($sql); //已发货
         *
         * $sql = "SELECT COUNT(og.goods_id) FROM `{$this->App->prefix()}order_goods` AS og";
         * $sql .=" LEFT JOIN `{$this->App->prefix()}order_goods` AS oi ON og.order_id = oi.order_id";
         * $sql .=" WHERE oi.shipping_status='5' AND oi.user_id='$uid' AND og.goods_id NOT IN(SELECT id_value FROM `{$this->App->prefix()}comment` WHERE user_id='$uid')";
         * $rt['userinfo']['need_comment_count'] = $this->App->findvar($sql);
         */
        // print_r($rt);
        
        // 商品分类列表
        // $rt['menu'] = $this->action('catalog','get_goods_cate_tree');
        
        if (! defined(NAVNAME))
            define('NAVNAME', "众筹订单");
        $this->set('rt', $rt);
        $this->set('page', $page);
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template($mb . '/user_crowd_orderlist');
    }

    function myinfos($data = array())
    {
        if (! defined(NAVNAME))
            define('NAVNAME', "我的资料");
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template($mb . '/myinfos');
    }

    function myinfos_u($data = array())
    {
        $uid = $this->checked_login();
        $sql = "SELECT * FROM `{$this->App->prefix()}user` WHERE user_id ='{$uid}' LIMIT 1";
        $rt['userinfo'] = $this->App->findrow($sql);
        
        $rt['province'] = $this->get_regions(1); // 获取省列表
                                                 
        // 当前用户的收货地址
        $sql = "SELECT * FROM `{$this->App->prefix()}user_address` WHERE user_id='$uid' AND is_own='1' LIMIT 1";
        $rt['userress'] = $this->App->findrow($sql);
        
        if ($rt['userress']['province'] > 0)
            $rt['city'] = $this->get_regions(2, $rt['userress']['province']); // 城市
        if ($rt['userress']['city'] > 0)
            $rt['district'] = $this->get_regions(3, $rt['userress']['city']); // 区
        
        $this->set('rt', $rt);
        if (! defined(NAVNAME))
            define('NAVNAME', "我的注册资料");
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template($mb . '/myinfos_u');
    }

    /**
     * 我的收货资料
     */
    function myinfos_s($data = array())
    {
        $uid = $this->checked_login();
        $rt['province'] = $this->get_regions(1); // 获取省列表
        $id = isset($data['id']) ? $data['id'] : 0;
        // 当前用户的收货地址
        $sql = "SELECT * FROM `{$this->App->prefix()}user_address` WHERE user_id='$uid' AND is_own='0'";
        $rt['userress'] = $this->App->find($sql);
        if (! empty($rt['userress'])) {
            foreach ($rt['userress'] as $row) {
                $rt['city'][$row['address_id']] = $this->get_regions(2, $row['province']); // 城市
                $rt['district'][$row['address_id']] = $this->get_regions(3, $row['city']); // 区
            }
        }
        
        $sql = "SELECT tb1.*,tb2.region_name AS provinces,tb3.region_name AS citys,tb4.region_name AS districts FROM `{$this->App->prefix()}user_address` AS tb1";
        $sql .= " LEFT JOIN `{$this->App->prefix()}region` AS tb2 ON tb2.region_id = tb1.province";
        $sql .= " LEFT JOIN `{$this->App->prefix()}region` AS tb3 ON tb3.region_id = tb1.city";
        $sql .= " LEFT JOIN `{$this->App->prefix()}region` AS tb4 ON tb4.region_id = tb1.district";
        $sql .= " WHERE tb1.user_id='$uid' AND tb1.is_own = '0' ORDER BY tb1.address_id ASC";
        $rt['userress'] = $this->App->find($sql);
        
        $this->set('rt', $rt);
        if (! defined(NAVNAME))
            define('NAVNAME', "我的收货资料");
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template($mb . '/myinfos_s');
    }

    /**
     * 银行卡号资料
     */
    function myinfos_b($data = array())
    {
        $uid = $this->checked_login();
        $sql = "SELECT * FROM `{$this->App->prefix()}user` WHERE user_id='$uid' AND active='1' LIMIT 1";
        $rt = $this->App->findrow($sql);
        
        $sql = "SELECT * FROM `{$this->App->prefix()}user_bank` WHERE uid='$uid' LIMIT 1";
        $rts = $this->App->findrow($sql);
        
        $this->set('rt', $rt);
        $this->set('rts', $rts);
        if (! defined(NAVNAME))
            define('NAVNAME', "银行卡号资料");
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template($mb . '/myinfos_b');
    }
    
    // 用户资料
    function userinfo()
    {
        $this->title("欢迎进入用户后台管理中心" . ' - 我的资料 - ' . $GLOBALS['LANG']['site_name']);
        $uid = $this->checked_login();
        
        $sql = "SELECT * FROM `{$this->App->prefix()}user` WHERE user_id ='{$uid}' LIMIT 1";
        $rt['userinfo'] = $this->App->findrow($sql);
        
        $rt['province'] = $this->get_regions(1); // 获取省列表
                                                 
        // 当前用户的收货地址
        $sql = "SELECT * FROM `{$this->App->prefix()}user_address` WHERE user_id='$uid' AND is_own='1' LIMIT 1";
        $rt['userress'] = $this->App->findrow($sql);
        
        if ($rt['userress']['province'] > 0)
            $rt['city'] = $this->get_regions(2, $rt['userress']['province']); // 城市
        if ($rt['userress']['city'] > 0)
            $rt['district'] = $this->get_regions(3, $rt['userress']['city']); // 区
                                                                                                               
        // $rt['recommend10'] = $this->action('catalog','recommend_goods');
                                                                                                               // print_r($rt);
                                                                                                               
        // 商品分类列表
                                                                                                               // $rt['menu'] = $this->action('catalog','get_goods_cate_tree');
        
        $this->set('rt', $rt);
        if (! defined(NAVNAME))
            define('NAVNAME', "用户资料");
        $this->template('user_info');
    }
    
    // 收货地址
    function address()
    {
        $this->title("欢迎进入用户后台管理中心" . ' - 收货地址 - ' . $GLOBALS['LANG']['site_name']);
        $uid = $this->checked_login();
        
        /*
         * if(isset($_POST)&&!empty($_POST)){
         *
         * if(empty($_POST['province'])){
         * $this->jump('user.php?act=address_list',0,'选择省份！'); exit;
         * }else if(empty($_POST['city'])){
         * $this->jump('user.php?act=address_list',0,'选择城市！');exit;
         * }else if(empty($_POST['consignee'])){
         * $this->jump('user.php?act=address_list',0,'收货人不能为空！');exit;
         * }else if(empty($_POST['email'])){
         * $this->jump('user.php?act=address_list',0,'电子邮箱不能为空！');exit;
         * }else if(empty($_POST['address'])){
         * $this->jump('user.php?act=address_list',0,'收货地址不能为空！');exit;
         * }else if(empty($_POST['tel'])){
         * $this->jump('user.php?act=address_list',0,'电话号码不能为空！');exit;
         * }
         *
         * if(!isset($_POST['address_id'])&&empty($_POST['address_id'])){ //添加
         * $_POST['user_id'] = $uid;
         * if($this->App->insert('user_address',$_POST)){
         * if(isset($_GET['ty'])&&$_GET['ty']=='cart'){
         * $this->jump('mycart.php?type=checkout'); exit;
         * }else{
         * $this->jump('',0,'添加成功！');exit;
         * }
         * }else{
         * $this->jump('',0,'添加失败！');exit;
         * }
         *
         * }else{ //修改
         * $address_id = $_POST['address_id'];
         * $_POST = array_diff_key($_POST,array('address_id'=>'0'));
         * if($this->App->update('user_address',$_POST,'address_id',$address_id )){
         * if(isset($_GET['ty'])&&$_GET['ty']=='cart'){
         * $this->jump('mycart.php?type=checkout'); exit;
         * }else{
         * $this->jump('',0,'更新成功！');exit;
         * }
         * }
         * else{
         * $this->jump('',0,'更新失败！');exit;
         * }
         * }
         * }
         */
        
        $rt['province'] = $this->get_regions(1); // 获取省列表
                                                 
        // 当前用户的收货地址
        $sql = "SELECT * FROM `{$this->App->prefix()}user_address` WHERE user_id='$uid' AND is_own='0'";
        $rt['userress'] = $this->App->find($sql);
        if (! empty($rt['userress'])) {
            foreach ($rt['userress'] as $row) {
                $rt['city'][$row['address_id']] = $this->get_regions(2, $row['province']); // 城市
                $rt['district'][$row['address_id']] = $this->get_regions(3, $row['city']); // 区
            }
        }
        
        $sql = "SELECT tb1.*,tb2.region_name AS provinces,tb3.region_name AS citys,tb4.region_name AS districts FROM `{$this->App->prefix()}user_address` AS tb1";
        $sql .= " LEFT JOIN `{$this->App->prefix()}region` AS tb2 ON tb2.region_id = tb1.province";
        $sql .= " LEFT JOIN `{$this->App->prefix()}region` AS tb3 ON tb3.region_id = tb1.city";
        $sql .= " LEFT JOIN `{$this->App->prefix()}region` AS tb4 ON tb4.region_id = tb1.district";
        $sql .= " WHERE tb1.user_id='$uid' AND tb1.is_own = '0' ORDER BY tb1.address_id ASC";
        $rt['userress'] = $this->App->find($sql);
        
        // 商品分类列表
        $rt['menu'] = $this->action('catalog', 'get_goods_cate_tree');
        if (! defined(NAVNAME))
            define('NAVNAME', "收货地址簿");
        $this->set('rt', $rt);
        $this->template('user_consignee_address');
    }
    
    // 用户密码修改
    function editpass()
    {
        $uid = $this->checked_login();
        $this->title("欢迎进入用户后台管理中心" . ' - 用户密码修改 - ' . $GLOBALS['LANG']['site_name']);
        
        // 商品分类列表
        $rt['menu'] = $this->action('catalog', 'get_goods_cate_tree');
        $this->set('rt', $rt);
        if (! defined(NAVNAME))
            define('NAVNAME', "修改密码");
        $this->template('user_editpass');
    }
    // 用户订单操作
    function ajax_order_op($id = 0, $op = "")
    {
        if (empty($id) || empty($op))
            die("传送ID为空！");
        if ($op == "cancel_order")
            $this->App->update('goods_order_info', array(
                'order_status' => '1'
            ), 'order_id', $id);
        else 
            if ($op == "confirm"){
                $bIsSuccess = $this->App->update('goods_order_info', array(
                    'shipping_status' => '5'
                ), 'order_id', $id);

                /*if($bIsSuccess){
                    $field = 'user_id,order_amount';
                    $sql = "SELECT {$field} FROM `{$this->App->prefix()}goods_order_info` WHERE order_id = '$id' LIMIT 1";
                    $aOrderInfo = $this->App->findrow( $sql );
                    //将本订单信息积累到gz_user表
                    $sNow = date('Y');
                    $iUserId = intval($aOrderInfo['user_id']);
                    $fPersonBuySum = floatval($aOrderInfo['order_amount']);

                    if(!empty($iUserId)){
                        $sql = "update `gz_user` set `person_buy_sum` = `person_buy_sum` + {$fPersonBuySum} where `user_id` = {$iUserId} and `person_buy_year` = '{$sNow}'";
                        $iAffectedRows = $this->App->query($sql);
                        if(empty($iAffectedRows)){
                            $sql = "update `gz_user` set `person_buy_sum` = {$fPersonBuySum}, `person_buy_year` = '{$sNow}'  where `user_id` = {$iUserId}";
                            $this->App->query($sql);
                        }
                    }
                }*/
            }         
    }
    
    // 我的余额
    function mymoney($page = 1)
    {
        $this->title("欢迎进入用户后台管理中心" . ' - 我的余额 - ' . $GLOBALS['LANG']['site_name']);
        $uid = $this->checked_login();
        $sql = "SELECT SUM(money) FROM `{$this->App->prefix()}user_money_change` WHERE uid='$uid'";
        $rt['zmoney'] = $this->App->findvar($sql);
        $rt['zmoney'] = format_price($rt['zmoney']);
        // 分页
        if (empty($page)) {
            $page = 1;
        }
        $list = 10; // 每页显示多少个
        $start = ($page - 1) * $list;
        $tt = $this->App->findvar("SELECT COUNT(cid) FROM `{$this->App->prefix()}user_money_change` WHERE uid='$uid'");
        $rt['pages'] = Import::basic()->getpage($tt, $list, $page, '?page=', true);
        $sql = "SELECT * FROM `{$this->App->prefix()}user_money_change` WHERE uid='$uid' ORDER BY time DESC LIMIT $start,$list";
        $rt['lists'] = $this->App->find($sql);
        $rt['page'] = $page;
        // 商品分类列表
        // $rt['menu'] = $this->action('catalog','get_goods_cate_tree');
        
        $this->set('rt', $rt);
        
        // ajax
        if (isset($_GET['type']) && $_GET['type'] == 'ajax') {
            echo $this->fetch('ajax_user_moneychange', true);
            exit();
        }
        if (! defined(NAVNAME))
            define('NAVNAME', "我的余额");
        $this->template('mymoney');
    }
    
    // 我的积分
    function mypoints()
    {
        $this->title("欢迎进入用户后台管理中心" . ' - 我的积分 - ' . $GLOBALS['LANG']['site_name']);
        $uid = $this->checked_login();
        // 删除
        $id = isset($_GET['id']) ? $_GET['id'] : '0';
        if ($id > 0) {
            $this->App->delete('user_point_change', 'cid', $id);
            $this->jump(ADMIN_URL . 'user.php?act=mypoints');
            exit();
        }
        
        $sql = "SELECT SUM(points) FROM `{$this->App->prefix()}user_point_change` WHERE uid='$uid'";
        $rt['zpoints'] = $this->App->findvar($sql);
        // 分页
        $page = isset($_GET['page']) && intval($_GET['page']) > 0 ? intval($_GET['page']) : 1;
        if (empty($page)) {
            $page = 1;
        }
        $list = 30; // 每页显示多少个
        $start = ($page - 1) * $list;
        $tt = $this->App->findvar("SELECT COUNT(cid) FROM `{$this->App->prefix()}user_point_change` WHERE uid='$uid'");
        $rt['pages'] = Import::basic()->getpage($tt, $list, $page, '?page=', true);
        // $sql = "SELECT * FROM `{$this->App->prefix()}user_point_change` WHERE uid='$uid' ORDER BY time DESC LIMIT $start,$list";
        $sql = "SELECT tb1.*,tb2.nickname FROM `{$this->App->prefix()}user_point_change` AS tb1 LEFT JOIN `{$this->App->prefix()}user` AS tb2 ON tb1.subuid = tb2.user_id WHERE tb1.uid='$uid' ORDER BY tb1.time DESC LIMIT $start,$list";
        
        $rt['lists'] = $this->App->find($sql); // 商品列表
        $rt['page'] = $page;
        
        // 商品分类列表
        // $rt['menu'] = $this->action('catalog','get_goods_cate_tree');
        
        $this->set('rt', $rt);
        
        // ajax
        if (isset($_GET['type']) && $_GET['type'] == 'ajax') {
            echo $this->fetch('ajax_user_pointchange', true);
            exit();
        }
        if (! defined(NAVNAME))
            define('NAVNAME', "我的积分");
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template($mb . '/mypoints');
    }
    
    // 用户收藏
    function mycolle()
    {
        $uid = $this->checked_login();
        $this->js('goods.js');
        $this->title("欢迎进入用户后台管理中心" . ' - 我的收藏 - ' . $GLOBALS['LANG']['site_name']);
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        if ($id > 0) {
            $this->App->delete('shop_collect', 'rec_id', $id);
            $this->jump(ADMIN_URL . 'user.php?act=mycoll');
            exit();
        }
        // 分页
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        if (empty($page)) {
            $page = 1;
        }
        $list = 4; // 每页显示多少个
        $start = ($page - 1) * $list;
        $tt = $this->App->findvar("SELECT COUNT(rec_id) FROM `{$this->App->prefix()}goods_collect` WHERE user_id='$uid'");
        $rt['pages'] = Import::basic()->getpage($tt, $list, $page, '?page=', true);
        $sql = "SELECT tb1.rec_id,tb1.user_id,tb1.add_time,tb2.goods_id, tb2.goods_name,tb2.goods_bianhao,tb2.shop_price, tb2.market_price,tb2.pifa_price,tb2.goods_thumb, tb2.original_img, tb2.goods_img,tb2.promote_start_date,tb2.promote_end_date,tb2.promote_price,tb2.is_promote,tb2.qianggou_start_date,tb2.qianggou_end_date,tb2.qianggou_price,tb2.is_qianggou FROM `{$this->App->prefix()}goods_collect` AS tb1";
        $sql .= " LEFT JOIN `{$this->App->prefix()}goods` AS tb2 ON tb1.goods_id=tb2.goods_id";
        $sql .= " WHERE tb1.user_id='$uid' ORDER BY tb1.add_time DESC LIMIT $start,$list";
        $rt['lists'] = $this->App->find($sql); // 商品列表
        
        $this->set('rt', $rt);
        if (isset($_GET['type']) && $_GET['type'] == 'ajax') {
            echo $this->fetch('ajax_mycoll', true);
            exit();
        }
        if (! defined(NAVNAME))
            define('NAVNAME', "我的收藏");
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template($mb . '/user_mycolle');
    }
    
    // ajax删除收藏
    function ajax_delmycoll($ids = 0)
    {
        if (empty($ids))
            die("非法删除，删除ID为空！");
        $id_arr = @explode('+', $ids);
        foreach ($id_arr as $id) {
            if (Import::basic()->int_preg($id))
                $this->App->delete('shop_collect', 'rec_id', $id);
        }
    }

    function user_tuijian()
    {
        $uid = $this->checked_login();
        $this->title("欢迎进入用户后台管理中心" . ' - 我的推荐 - ' . $GLOBALS['LANG']['site_name']);
        $rt['uid'] = $uid;
        
        // 商品分类列表
        /*
         * $rt['menu'] = $this->action('catalog','get_goods_cate_tree');
         */
        // 分页
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        if (empty($page)) {
            $page = 1;
        }
        
        $list = 8; // 每页显示多少个
        $start = ($page - 1) * $list;
        
        $tt = $this->App->findvar("SELECT COUNT(goods_id) FROM `{$this->App->prefix()}goods` WHERE is_new='1'");
        
        $rt['pages'] = Import::basic()->getpage($tt, $list, $page, '?page=', true);
        
        $sql = "SELECT goods_id,goods_img,goods_name,pifa_price,need_jifen FROM `{$this->App->prefix()}goods` WHERE is_new='1' ORDER BY goods_id DESC LIMIT $start,$list";
        $rt['categoodslist'] = $this->App->find($sql);
        
        if (! defined(NAVNAME))
            define('NAVNAME', "我的推荐");
        $this->set('rt', $rt);
        $this->set('page', $page);
        $this->template('user_tuijian');
    }

    function messages()
    {
        $uid = $this->checked_login();
        $this->title("欢迎进入用户后台管理中心" . ' - 我的提问 - ' . $GLOBALS['LANG']['site_name']);
        
        // 分页
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        if (empty($page)) {
            $page = 1;
        }
        
        $list = 4; // 每页显示多少个
        $start = ($page - 1) * $list;
        $tt = $this->App->findvar("SELECT COUNT(mes_id) FROM `{$this->App->prefix()}message` WHERE user_id='$uid' AND (goods_id IS NULL OR goods_id='')");
        
        $rt['pages'] = Import::basic()->getpage($tt, $list, $page, '?page=', true);
        
        $sql = "SELECT distinct tb1.*,tb2.avatar,tb2.nickname,tb2.user_name AS dbusername FROM `{$this->App->prefix()}message` AS tb1 LEFT JOIN  `{$this->App->prefix()}user` AS tb2 ON tb1.user_id=tb2.user_id WHERE tb1.user_id='$uid' AND (tb1.goods_id IS NULL OR tb1.goods_id='') ORDER BY tb1.addtime DESC LIMIT $start,$list";
        $rt['meslist'] = $this->App->find($sql);
        
        if (! defined(NAVNAME))
            define('NAVNAME', "我的提问");
        $this->set('rt', $rt);
        $this->template('user_question');
    }

    function xiaofei()
    {
        $this->template('user_xiaofei');
    }

    function comment()
    {
        $uid = $this->checked_login();
        $this->title("欢迎进入用户后台管理中心" . ' - 我的评论 - ' . $GLOBALS['LANG']['site_name']);
        
        // 分页
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        if (empty($page)) {
            $page = 1;
        }
        $list = 4; // 每页显示多少个
        $start = ($page - 1) * $list;
        $sql = "SELECT COUNT(comment_id) FROM `{$this->App->prefix()}comment`";
        $sql .= " WHERE parent_id = 0 AND status='1' AND user_id='$uid'";
        $tt = $this->App->findvar($sql);
        
        $rt['goodscommentpage'] = Import::basic()->ajax_page($tt2, $list, $page, 'get_mycomment_page_list');
        
        $sql = "SELECT c.*,u.avatar,u.user_name AS dbuname,u.nickname,g.goods_thumb,g.goods_name,g.goods_id FROM `{$this->App->prefix()}comment` AS c LEFT JOIN `{$this->App->prefix()}user` AS u ON c.user_id=u.user_id LEFT JOIN `{$this->App->prefix()}goods` AS g ON g.goods_id = c.id_value";
        $sql .= " WHERE c.parent_id = 0  AND c.status='1' AND c.user_id='$uid' ORDER BY c.add_time DESC LIMIT $start,$list";
        $this->App->fieldkey('comment_id');
        $commentlist = $this->App->find($sql);
        $rp_commentlist = array();
        if (! empty($commentlist)) { // 回复的评论
            $commend_id = array_keys($commentlist);
            $sql = "SELECT c.*,a.adminname FROM `{$this->App->prefix()}comment` AS c";
            $sql .= " LEFT JOIN `{$this->App->prefix()}admin` AS a ON a.adminid = c.user_id";
            $sql .= " WHERE c.parent_id IN (" . implode(',', $commend_id) . ")";
            $this->App->fieldkey('parent_id');
            $rp_commentlist = $this->App->find($sql);
            foreach ($commentlist as $cid => $row) {
                $rt['goodscommentlist'][$cid] = $row;
                $rt['goodscommentlist'][$cid]['rp_comment_list'] = isset($rp_commentlist[$cid]) ? $rp_commentlist[$cid] : array();
            }
            unset($commentlist);
        } else {
            $rt['goodscommentlist'] = array();
        }
        
        if (isset($_GET['type']) && $_GET['type'] == 'ajax') {
            $this->set('rt', $rt);
            echo $this->fetch('ajax_mycomment', true);
            exit();
        }
        
        // 商品分类列表
        $rt['menu'] = $this->action('catalog', 'get_goods_cate_tree');
        
        if (! defined(NAVNAME))
            define('NAVNAME', "我的评论");
        $this->set('rt', $rt);
        $this->template('user_mycomment');
    }

    function ajax_feedback($data = array())
    {
        $err = 0;
        $result = array(
            'error' => $err,
            'message' => ''
        );
        $json = Import::json();
        
        if (empty($data)) {
            $result['error'] = 2;
            $result['message'] = '传送的数据为空！';
            die($json->encode($result));
        }
        $mesobj = $json->decode($data); // 反json ,返回值为对象
                                        
        // 以下字段对应评论的表单页面 一定要一致
        $datas['comment_title'] = $mesobj->comment_title;
        $datas['goods_id'] = $mesobj->goods_id;
        $goods_id = $datas['goods_id'];
        $uid = $this->Session->read('User.uid');
        $datas['user_id'] = ! empty($uid) ? $uid : 0;
        $datas['status'] = 2;
        
        if (strlen($datas['comment_title']) < 12) {
            $result['error'] = 2;
            $result['message'] = '评论内容不能太少！';
            die($json->encode($result));
        }
        
        $datas['addtime'] = time();
        $ip = Import::basic()->getip();
        $datas['ip_address'] = $ip ? $ip : '0.0.0.0';
        $datas['ip_from'] = Import::ip()->ipCity($ip);
        
        if ($this->App->insert('message', $datas)) {
            $result['error'] = 0;
            $result['message'] = '提问成功！我们会很快回答你的问题！';
        } else {
            $result['error'] = 1;
            $result['message'] = '提问失败，请通过在线联系客服吧！';
        }
        unset($datas, $data);
        $page = 1;
        $list = 2; // 每页显示多少个
        $start = ($page - 1) * $list;
        $tt = $this->App->findvar("SELECT COUNT(mes_id) FROM `{$this->App->prefix()}message` WHERE user_id='$uid' AND (goods_id IS NULL OR goods_id='')");
        $rt['notgoodmespage'] = Import::basic()->ajax_page($tt, $list, $page, 'get_myquestion_notgoods_page_list');
        $sql = "SELECT distinct tb1.*,tb2.avatar,tb2.nickname,tb2.user_name AS dbusername FROM `{$this->App->prefix()}message` AS tb1 LEFT JOIN  `{$this->App->prefix()}user` AS tb2 ON tb1.user_id=tb2.user_id WHERE tb1.user_id='$uid' AND (tb1.goods_id IS NULL OR tb1.goods_id='') ORDER BY tb1.addtime DESC LIMIT $start,$list";
        $rt['notgoodsmeslist'] = $this->App->find($sql);
        $this->set('rt', $rt);
        $result['error'] = 0;
        $result['message'] = $this->fetch('ajax_userquestion_nogoods', true);
        die($json->encode($result));
    }
    
    // 删除提问
    function ajax_delmessages($id = 0)
    {
        if (! ($id > 0))
            die("传送的ID为空！");
        if ($this->App->delete('message', 'mes_id', $id)) {
            echo "";
        } else {
            echo "删除意外出错！";
        }
        exit();
    }
    
    // 删除评论
    function ajax_delcomment($id = 0)
    {
        if (! ($id > 0))
            die("传送的ID为空！");
        if ($this->App->delete('comment', 'comment_id', $id)) {
            echo "";
        } else {
            echo "删除意外出错！";
        }
        exit();
    }
    
    // 用户积分获取
    function add_user_jifen($type = "", $obj = array())
    {
        $art = array(
            'buy',
            'comment',
            'tuijian',
            'otherjifen'
        );
        $uid = $this->Session->read('User.uid');
        if (! ($uid > 0))
            return false;
        $rank = $this->Session->read('User.rank');
        $sql = "SELECT * FROM `{$this->App->prefix()}user_level` WHERE lid='$rank' LIMIT 1";
        $rtlevel = $this->App->findrow($sql);
        $jfdesc = $rtlevel['jifendesc'];
        $dbjfdesc = array(); // 当前会员级别能够得到积分的权限
        if (! empty($jfdesc)) {
            $dbjfdesc = explode('+', $jfdesc);
        }
        if (in_array($type, $dbjfdesc)) { // 拥有得到积分的权限
            switch ($type) {
                // case 'comment': // 参与每件已购商品评论获奖10分，依次类推，参与10件已购商品评论可获奖100个积分（一张订单每个产品只能获得一次积分）。
                //     $data['time'] = time();
                //     $data['changedesc'] = "评论所得积分！";
                //     $data['points'] = 10;
                //     $data['uid'] = $uid;
                //     if ($this->App->insert('user_point_change', $data)) {
                //         return $data;
                //     } else {
                //         return false;
                //     }
                //     break;
                case 'tuijian': // 推荐好友注册获奖50分，好友首次成功购物获奖同倍积分；
                    $data['time'] = time();
                    $data['changedesc'] = "推荐好友注册所得积分！";
                    //$data['points'] = 50;
                    $data['points'] = 1;
                    $data['uid'] = $uid;
                    if ($this->App->insert('user_point_change', $data)) {
                        return $data;
                    } else {
                        return false;
                    }
                    break;
                // case 'spendthan1500': // 单次购物达1500元，当次购物获取2倍积分
                //     $sql = "SELECT goods_amount FROM `{$this->App->prefix()}goods_order_info` WHERE user_id='$uid' AND order_status='2' ORDER BY pay_time DESC LIMIT 1";
                //     $amount = $this->App->findvar($sql);
                //     if (intval($amount) > 1500) {
                //         $data['time'] = time();
                //         $data['changedesc'] = "本次购物'$amount'元！【单次购物达1500以上所得积分】";
                //         $data['points'] = $amount * 2;
                //         $data['uid'] = $uid;
                //         if ($this->App->insert('user_point_change', $data)) {
                //             return $data;
                //         } else {
                //             return false;
                //         }
                //     } elseif (intval($amount) > 0) {
                //         $data['time'] = time();
                //         $data['changedesc'] = "本次购物'$amount'元所得积分！";
                //         $data['points'] = $amount * 2;
                //         $data['uid'] = $uid;
                //         if ($this->App->insert('user_point_change', $data)) {
                //             return $data;
                //         } else {
                //             return false;
                //         }
                //     } else {
                //         return false;
                //     }
                //     break;
                // case 'upuserinfo': // 特定时间内，更新正确个人资料，可获奖10个积分； 一个星期之内更新
                //     $data['time'] = time();
                //     $data['changedesc'] = "更新正确个人资料所得积分！";
                //     $data['points'] = 10;
                //     $data['uid'] = $uid;
                //     if ($this->App->insert('user_point_change', $data)) {
                //         return $data;
                //     } else {
                //         return false;
                //     }
                //     break;
                // case 'yearthancount6': // 全年购物超过6次，于每年年末奖励100个积分（2010-1-1起开始计算）
                //     $data['time'] = time();
                //     $data['changedesc'] = "全年购物超过6次所得积分！";
                //     $data['points'] = 100;
                //     $data['uid'] = $uid;
                //     if ($this->App->insert('user_point_change', $data)) {
                //         return $data;
                //     } else {
                //         return false;
                //     }
                //     break;
            }
        } else {
            return false;
        }
    }
    
    // 更新密码
    function ajax_updatepass($data = array())
    {
        $json = Import::json();
        $uid = $this->Session->read('User.uid');
        if (empty($uid)) {
            $result = array(
                'error' => 3,
                'message' => '先你先登录！'
            );
            die($json->encode($result));
        }
        
        $result = array(
            'error' => 2,
            'message' => '传送的数据为空！'
        );
        if (empty($data['fromAttr']))
            die($json->encode($result));
        
        $fromAttr = $json->decode($data['fromAttr']); // 反json ,返回值为对象
        unset($data);
        $newpass = $fromAttr->newpass;
        $rp_pass = $fromAttr->rp_password;
        $datas['password'] = $fromAttr->password;
        if (! empty($newpass)) {
            if (empty($datas['password'])) {
                $result = array(
                    'error' => 2,
                    'message' => '请输入新密码！'
                );
                die($json->encode($result));
            }
            
            if (! empty($rp_pass) && $datas['password'] == $rp_pass) {
                $datas['password'] = md5(trim($datas['password']));
                if (md5($newpass) == $datas['password']) {
                    $result = array(
                        'error' => 2,
                        'message' => '新密码跟旧密码不能相同！'
                    );
                    die($json->encode($result));
                }
                
                $newpass = md5(trim($newpass));
                $sql = "SELECT password FROM `{$this->App->prefix()}user` WHERE password='$newpass' AND user_id='$uid'";
                $newrt = $this->App->findvar($sql);
                if (empty($newrt)) {
                    $result = array(
                        'error' => 2,
                        'message' => '你的原始密码错误！'
                    );
                    die($json->encode($result));
                }
                
                if ($this->App->update('user', $datas, 'user_id', $uid)) {
                    $result = array(
                        'error' => 2,
                        'message' => '密码修改成功！'
                    );
                    die($json->encode($result));
                } else {
                    $result = array(
                        'error' => 2,
                        'message' => '密码修改失败！'
                    );
                    die($json->encode($result));
                }
            } else {
                $result = array(
                    'error' => 2,
                    'message' => '密码与确认密码不一致！'
                );
                die($json->encode($result));
            }
        } else {
            $result = array(
                'error' => 2,
                'message' => '请输入原始密码！'
            );
            die($json->encode($result));
        }
    }
    
    // 判断是否已经登陆
    function is_login()
    {
        $uid = $this->Session->read('User.uid');
        $username = $this->Session->read('User.username');
        if (empty($uid) || empty($username)) {
            return false;
        } else {
            return true;
        }
    }

    function checked_login()
    {
        $uid = $this->Session->read('User.uid');
        if (! ($uid > 0)) {
            $this->jump(ADMIN_URL . 'user.php?act=login');
            exit();
        }
        return $uid;
    }

    function get_regions($type, $parent_id = 0)
    {
        $p = "";
        if (! empty($parent_id))
            $p = "AND parent_id='$parent_id'";
        
        $sql = "SELECT region_id,region_name FROM `{$this->App->prefix()}region` WHERE region_type='$type' {$p} ORDER BY region_id ASC";
        return $this->App->find($sql);
    }
    
    // 退出登录
    function logout()
    {
        session_destroy();
        //
        // if(isset($_COOKIE['user'])){
        // if(is_array($_COOKIE['user'])){
        // foreach($_COOKIE['user'] as $key=>$val){
        // setcookie("user[".$key."]", "");
        if (isset($_COOKIE[CFGH . 'USER']['AUTOLOGIN']))
            setcookie(CFGH . 'USER[AUTOLOGIN]', "", 0); // 清空自动登录
                                                                                                      // }
                                                                                                      // }
                                                                                                      // }
        
        $url = $this->Session->read('REFERER');
        if (empty($url))
            $url = ADMIN_URL . 'catalog.php';
        $this->jump($url);
        exit();
    }

    function ajax_getuid()
    {
        echo $this->Session->read('User.uid');
        exit();
    }
    
    // 忘记密码
    function forgetpass()
    {
        $this->title("找回密码" . ' - ' . $GLOBALS['LANG']['site_name']);
        if (isset($_POST) && ! empty($_POST)) {
            $uname = $_POST['uname'];
            if (empty($uname)) {
                $this->jump('', 0, '请输入你的账号名称！');
                exit();
            }
            $email = $_POST['email'];
            if (empty($email)) {
                $this->jump('', 0, '请输入你的原始电子邮箱！');
                exit();
            }
            $vifcode = $_POST['vifcode'];
            if (empty($vifcode)) {
                $this->jump('', 0, '请输入你的验证码！');
                exit();
            }
            $dbvifcode = strtolower($this->Session->read('vifcode'));
            if ($vifcode != $dbvifcode) {
                $this->jump('', 0, '验证码错误！');
                exit();
            }
            
            $sql = "SELECT user_name FROM `{$this->App->prefix()}user` WHERE user_name='$uname' LIMIT 1";
            $dbuname = $this->App->findvar($sql);
            if (empty($dbuname)) {
                $this->jump('', 0, '该用户不存在！');
                exit();
            }
            $sql = "SELECT user_name FROM `{$this->App->prefix()}user` WHERE user_name= '$uname' AND email='$email' LIMIT 1";
            $dbemail = $this->App->findvar($sql);
            if (empty($dbemail)) {
                $this->jump('', 0, '无法完成你的请求，你的用户名跟电子邮箱不对应！');
                exit();
            } else {
                $this->set('uname', $uname);
                $this->set('email', $email);
                $this->set('is_true', true);
                $this->template('user_forgetpass_result');
                exit();
            }
        } // end if
          
        // 商品分类列表
        $rt['menu'] = $this->action('catalog', 'get_goods_cate_tree');
        
        if (! defined(NAVNAME))
            define('NAVNAME', "找回密码");
        $this->set('rt', $rt);
        $this->template('user_forgetpass');
    }
    
    // 注册成功提示的页面
    function user_regsuccess_mes()
    {
        $this->title("注册成功" . ' - ' . $GLOBALS['LANG']['site_name']);
        $this->template('user_regsuccess_mes');
    }
    
    // 自动登录
    function auto_login($data = array())
    {
        $user = trim(stripcslashes(strip_tags(nl2br($data['username'])))); // 过滤
        $pass = md5(trim($data['password']));
        $sql = "SELECT password,user_id,last_login,active,user_rank FROM `{$this->App->prefix()}user` WHERE user_name='$user' LIMIT 1";
        $rt = $this->App->findrow($sql);
        if (empty($rt)) {
            return false;
        } else {
            if ($rt['password'] == $pass) {
                // 登录成功,记录登录信息
                $ip = Import::basic()->getip();
                $datas['last_ip'] = empty($ip) ? '0.0.0.0' : $ip;
                $datas['last_login'] = time();
                $datas['visit_count'] = '`visit_count`+1';
                $this->Session->write('User.prevtime', $rt['last_login']); // 记录上一次的登录时间
                
                $this->App->update('user', $datas, 'user_id', $rt['user_id']); // 更新
                $this->Session->write('User.username', $user);
                $this->Session->write('User.uid', $rt['user_id']);
                $this->Session->write('User.active', $rt['active']);
                $this->Session->write('User.rank', $rt['user_rank']);
                $this->Session->write('User.lasttime', $datas['last_login']);
                $this->Session->write('User.lastip', $datas['last_ip']);
                
                if (isset($data['issave']) && intval($data['issave']) == 1) {
                    setcookie(CFGH . 'USER[USERNAME]', $user, time() + 3600 * 24 * 30);
                    setcookie(CFGH . 'USER[PASS]', trim($data['password']), time() + 3600 * 24 * 30);
                } else {
                    if (isset($_COOKIE[CFGH . 'USER']['USERNAME']))
                        setcookie(CFGH . 'USER[USERNAME]', "", 0);
                    
                    if (isset($_COOKIE[CFGH . 'USER']['PASS']))
                        setcookie(CFGH . 'USER[PASS]', "", 0);
                }
                
                if (isset($data['isauto']) && intval($data['isauto']) == 1) {
                    setcookie(CFGH . 'USER[AUTOLOGIN]', $data['isauto'], time() + 3600 * 24 * 30);
                } else {
                    if (isset($_COOKIE[CFGH . 'USER']['AUTOLOGIN']))
                        setcookie(CFGH . 'USER[AUTOLOGIN]', "", 0);
                }
                unset($data);
                return true;
            } else {
                // 密码是错误的
                return false;
            }
        } // end if
    }
 // end function
      
    // ajax登录
    function ajax_user_login($data = array())
    {
        if (empty($data))
            die("请填写完整信息");
        $user = trim(stripcslashes(strip_tags(nl2br($data['username'])))); // 过滤
        if (empty($user))
            die("请输入用户名");
        $pass = md5(trim($data['password']));
        if (empty($pass))
            die("请输入密码");
        $vcode = isset($data['vifcode']) ? $data['vifcode'] : "";
        if (! empty($vcode)) {
            if (strtolower($vcode) != strtolower($this->Session->read('vifcode'))) {
                die("验证码错误！");
            }
        }
        $sql = "SELECT password,user_id,last_login,active,user_rank,mobile_phone,wecha_id,user_name FROM `{$this->App->prefix()}user` WHERE mobile_phone='$user' AND active='1' LIMIT 1";
        $rt = $this->App->findrow($sql);
        if (empty($rt)) {
            die("用户名不存在或者还没审核！");
        } else {
            if ($rt['password'] == $pass) {
                // 登录成功,记录登录信息
                $ip = Import::basic()->getip();
                $datas['last_ip'] = empty($ip) ? '0.0.0.0' : $ip;
                $datas['last_login'] = time();
                $datas['visit_count'] = '`visit_count`+1';
                $this->Session->write('Agent.prevtime', $rt['last_login']); // 记录上一次的登录时间
                
                $this->App->update('user', $datas, 'user_id', $rt['user_id']); // 更新
                $this->Session->write('User.username', $rt['user_name']);
                
                $this->Session->write('User.uid', $rt['user_id']);
                $this->Session->write('User.active', '1');
                $this->Session->write('User.rank', $rt['user_rank']);
                $this->Session->write('User.ukey', $rt['wecha_id']);
                $this->Session->write('User.addtime', time());
                // 写入cookie
                setcookie(CFGH . 'USER[UKEY]', $rt['wecha_id'], time() + 2592000);
                setcookie(CFGH . 'USER[UID]', $rt['user_id'], time() + 2592000);
                
                unset($data);
            } else {
                // 密码是错误的
                die("密码错误");
            }
        }
    }
    
    // ajax注册
    function ajax_user_register( $data = array() )
    {
        $json = Import::json();
        $result = array(
            'error' => 2,
            'message' => '传送的数据为空!'
        );
        if ( empty( $data['fromAttr'] ) )
        {
            die( $json->encode( $result ) );
        }
        
        $fromAttr = $json->decode( $data['fromAttr'] ); // 反json ,返回值为对象
        unset( $data );
        
        $datas['user_rank'] = $fromAttr->user_rank; // 用户级别
        /*
         * $datas['user_name'] = $fromAttr->mobile_phone; //用户名
         * if(empty($datas['user_name'])){
         * $result = array('error' => 2, 'message' => '请填入登录账户！');
         * if(empty($data['fromAttr'])) die($json->encode($result));
         * }
         */
        $datas['password'] = $fromAttr->password;
        if ( empty( $datas['password'] ) )
        {
            $result = array(
                'error'   => 2,
                'message' => '用户密码不能为空！'
            );
            if ( empty( $data['fromAttr'] ) )
            {
                die( $json->encode( $result ) );
            }
        }
        $rp_pass = $fromAttr->rp_pass;
        if ( $rp_pass != $datas['password'] )
        {
            $result = array(
                'error'   => 2,
                'message' => '两次密码不相同！'
            );
            if ( empty( $data['fromAttr'] ) )
            {
                die( $json->encode( $result ) );
            }
        }
        $datas['password']     = md5($datas['password']);
        $datas['mobile_phone'] = $fromAttr->mobile_phone;
        if ( empty( $datas['mobile_phone'] ) )
        {
            $result = array(
                'error'   => 2,
                'message' => '请填上手机号码！'
            );
            if ( empty( $data['fromAttr'] ) )
            {
                die( $json->encode( $result ) );
            }
        }
        if ( preg_match("/1[\d]{10}$/", $datas['mobile_phone'] ) ) {} else {
            $result = array(
                'error'   => 2,
                'message' => '手机号码不合法，请重新输入！'
            );
            if ( empty( $data['fromAttr'] ) )
            {
                die( $json->encode( $result ) );
            }
        }
        // 检查该手机是否已经使用了
        $mobile_phone = $datas['mobile_phone'];
        $sql = "SELECT user_id FROM `{$this->App->prefix()}user` WHERE mobile_phone='$mobile_phone'";
        $uuid = $this->App->findvar($sql);
        if ($uuid > 0) {
            $result = array(
                'error' => 2,
                'message' => '抱歉，该手机号码已经被使用了！'
            );
            if (empty($data['fromAttr']))
            {
                die($json->encode($result));
            }
        }
        
        if (! ($datas['user_rank'] > 0))
        {
            $datas['user_rank'] = 1;
        }
        $datas['user_name'] = $fromAttr->mobile_phone; // 用户名
        /*
         * $yyy = $fromAttr->yyy;
         * $mmm = $fromAttr->mmm;
         * $ddd = $fromAttr->ddd;
         * $datas['birthday'] = $yyy.'-'.$mmm.'-'.$ddd;
         * $datas['sex'] = $fromAttr->sex;
         */
        $regcode = '';
        if (! empty($regcode)) {
            // 检查该注册码是否有效
            $sql = "SELECT tb1.bonus_id FROM `{$this->App->prefix()}user_coupon_list` AS tb1 LEFT JOIN `{$this->App->prefix()}user_coupon_type` AS tb2 ON tb1.type_id = tb2.type_id WHERE tb1.bonus_sn='$regcode' AND tb1.is_used='0' LIMIT 1";
            $uuid = $this->App->findvar($sql);
            if ($uuid > 0) {} else {
                $result = array(
                    'error' => 2,
                    'message' => '请检查该注册码是否有效!'
                );
                die($json->encode($result));
            }
        }
        
        $uname = $datas['user_name'];
        $sql = "SELECT user_name FROM `{$this->App->prefix()}user` WHERE user_name='$uname'";
        $dbname = $this->App->findvar($sql);
        if (! empty($dbname)) {
            $result = array(
                'error' => 2,
                'message' => '该用户名已经被注册了!'
            );
            die($json->encode($result));
        }
        $emails = '';
        if (! empty($emails)) {
            $sql = "SELECT email FROM `{$this->App->prefix()}user` WHERE email='$emails'";
            $dbemail = $this->App->findvar($sql);
            if (! empty($dbemail)) {
                $result = array(
                    'error' => 2,
                    'message' => '该电子邮箱已经被使用了!'
                );
                die($json->encode($result));
            }
        }
        $ip = Import::basic()->getip();
        $datas['reg_ip']     = $ip ? $ip : '0.0.0.0';
        $datas['reg_time']   = time();
        $datas['reg_from']   = Import::ip()->ipCity($ip);
        $datas['last_login'] = time();
        $datas['last_ip']    = $datas['reg_ip'];
        $datas['active']     = 1;
        if ($this->App->insert('user', $datas)) {
            $uid = $this->App->iid();
            /* 佣金钱包表插入数据 */
            $this->App->insert( 'commission', array( 'user_id' => $uid ) );
            $this->Session->write('User.username', $uname);
            $this->Session->write('User.uid', $uid);
            $this->Session->write('User.active', $datas['active']);
            $this->Session->write('User.rank', 1);
            $this->Session->write('User.lasttime', $datas['last_login']);
            $this->Session->write('User.lastip', $datas['last_ip']);            
            $result = array(
                'error' => 0,
                'message' => '注册成功!'
            );
            unset($datas);
        } else {
            $result = array(
                'error'   => 2,
                'message' => '注册失败!'
            );
        }
        die( $json->encode( $result ) );
    }

    // ajax删除用户收货地址
    function ajax_delress($id = 0)
    {
        $uid = $this->Session->read('User.uid');
        if (empty($uid))
            die("请你先登录！");
        if (empty($id))
            die("非法删除！");
        
        if ($this->App->delete('user_address', 'address_id', $id)) {} else {
            die("删除失败!");
        }
    }
    // 设置为默认收货地址
    /*
     * function ajax_setaddress($data=array()){
     * $uid = $this->Session->read('User.uid');
     * if(empty($uid)) die("请你先登录！");
     * $id = isset($data['id'])?intval($data['id']):0;
     * $val = isset($data['val'])?$data['val']:0;
     * if($id>0){
     * $sql = "UPDATE `{$this->App->prefix()}user_address` SET type='0' WHERE user_id='$uid'";
     * $this->App->query($sql);
     * $sql = "UPDATE `{$this->App->prefix()}user_address` SET type='$val' WHERE user_id='$uid' AND address_id='$id'";
     * if($this->App->query($sql)){
     * die("");
     * }else{
     * die("设置失败！");
     * }
     * }else{
     * die("传送ID为空！");
     * }
     * }
     */
    
    // ajax更新用户信息
    function ajax_updateinfo($data = array())
    {
        $json = Import::json();
        $uid = $this->Session->read('User.uid');
        if (empty($uid)) {
            $result = array(
                'error' => 3,
                'message' => '先你先登录!'
            );
            die($json->encode($result));
        }
        
        $result = array(
            'error' => 2,
            'message' => '传送的数据为空!'
        );
        if (empty($data['fromAttr']))
            die($json->encode($result));
        
        $fromAttr = $json->decode($data['fromAttr']); // 反json ,返回值为对象
        unset($data);
        
        // 以下字段对应评论的表单页面 一定要一致
        /*
         * $emails = $fromAttr->email;
         * if(!empty($emails)){
         * $sql = "SELECT email FROM `{$this->App->prefix()}user` WHERE email='$emails' AND user_rank='1'";
         * $dbemail = $this->App->findvar($sql);
         * if(!empty($dbname)&&dbemail !=$emails){
         * $result = array('error' => 4, 'message' => '不能更改这个电子邮箱,已经被使用!');
         * die($json->encode($result));
         * }
         * }
         */
        $datas['qq'] = $fromAttr->qq;
        $datas['password'] = $fromAttr->pass;
        $datas['mobile_phone'] = $fromAttr->mobile_phone;
        if (empty($datas['mobile_phone'])) {
            $result = array(
                'error' => 4,
                'message' => '填写电话或者手机号码！'
            );
            die($json->encode($result));
        }
        if (empty($datas['password'])) {
            $result = array(
                'error' => 4,
                'message' => '请输入6位密码！'
            );
            die($json->encode($result));
        }
        $datas['password'] = md5($datas['password']);
        if (empty($datas['qq'])) {
            $result = array(
                'error' => 4,
                'message' => '请输入QQ号码！'
            );
            die($json->encode($result));
        }
        // 检测该号码是否存在
        $mb = $datas['mobile_phone'];
        $sql = "SELECT user_id FROM `{$this->App->prefix()}user` WHERE mobile_phone = '$mb' AND user_id!='$uid' LIMIT 1";
        $id = $this->App->findvar($sql);
        if ($id > 0) {
            $result = array(
                'error' => 4,
                'message' => '该电话号码已经被使用！'
            );
            die($json->encode($result));
        }
        
        if ($this->App->update('user', $datas, 'user_id', $uid)) {
            unset($datas);
            $result = array(
                'error' => 5,
                'message' => '更新成功!'
            );
            die($json->encode($result));
        }
        // $datas['question'] = $fromAttr->question;
        // $datas['answer'] = $fromAttr->answer;
        
        // 更新表
        /*
         * $is_jifen = false;
         * $sql = "SELECT uptime,reg_time FROM `{$this->App->prefix()}user` WHERE user_id='$uid' AND user_rank='1'";
         * $dts = $this->App->findrow($sql);
         * if(!empty($dts)){
         * if(empty($dts['uptime'])&&($dts['reg_time']+3600*24*7)>time()) $is_jifen = true; //七天之内更新资料有送积分,而且是第一次更新资料
         * }
         * if($this->App->update('user',$datas,'user_id',$uid)){
         * if($is_jifen){
         * //$this->add_user_jifen('upuserinfo');
         * }
         * unset($datas,$dts);
         * }
         *
         * ############################
         * $dd = array();
         * $sql = "SELECT address_id FROM `{$this->App->prefix()}user_address` WHERE user_id='$uid' AND is_own='1' LIMIT 1";
         * $rsid = $this->App->findvar($sql);
         *
         * $dd['consignee'] = $fromAttr->consignee;
         * if(empty($dd['consignee'])){
         * $result = array('error' => 4, 'message' => '真实姓名不能为空！');
         * die($json->encode($result));
         * }
         * $dd['country'] = '1';
         * $dd['province'] = $fromAttr->province;
         * $dd['city'] = $fromAttr->city;
         * $dd['district'] = $fromAttr->district;
         * $dd['is_own'] = '1';
         * $dd['address'] = $fromAttr->address;
         * //$dd['zipcode'] = $fromAttr->zipcode;
         * $dd['user_id'] = $uid;
         * if(empty($rsid)){ //添加
         * if(!empty($dd['consignee'])){
         * $this->App->insert('user_address',$dd);
         * }
         * }else{ //更新
         * if($this->App->update('user_address',$dd,'address_id',$rsid)){
         * unset($dd);
         * if($is_jifen){
         * //$result = array('error' => 5, 'message' => '更新成功！你在特定时间更新个人信息，赠送10积分！');
         * //die($json->encode($result));
         * }
         * }
         * }
         */
        
        // ###########################
        
        // if($this->App->update('user',$datas,'user_id',$uid)){
        $result = array(
            'error' => 10,
            'message' => '更新成功!'
        );
        // }else{
        // $result = array('error' => 2, 'message' => '无法更新!');
        // }
        
        die($json->encode($result));
    }

    function ajax_get_ress($data = array())
    {
        $type = $data['type'];
        $parent_id = $data['parent_id'];
        if (empty($type) || empty($parent_id)) {
            exit();
        }
        $sql = "SELECT region_id,region_name FROM `{$this->App->prefix()}region` WHERE region_type='$type' AND parent_id='$parent_id' ORDER BY region_id ASC";
        $rt = $this->App->find($sql);
        if (! empty($rt)) {
            if ($type == 2) {
                $str = '<option value="0">选择城市</option>';
            } else 
                if ($type == 3) {
                    $str = '<option value="0">选择区</option>';
                }
            
            foreach ($rt as $row) {
                $str .= '<option value="' . $row['region_id'] . '">' . $row['region_name'] . '</option>' . "\n";
            }
            die($str);
        }
    }

    function ajax_get_ge_peisong($data = array())
    {
        $district_id = $data['district_id'];
        if (empty($district_id)) {
            exit();
        }
        
        $sql = "SELECT tb1.user_id,tb2.nickname,tb1.consignee FROM `{$this->App->prefix()}user_address` AS tb1 LEFT JOIN `{$this->App->prefix()}user` AS tb2 ON tb1.user_id=tb2.user_id WHERE tb1.district='$district_id' AND tb1.is_own='1' AND tb2.user_rank='12'";
        $rt = $this->App->find($sql);
        if (empty($rt)) {
            $sql = "SELECT tb1.user_id,tb3.nickname,tb1.consignee FROM `{$this->App->prefix()}user_address` AS tb1 LEFT JOIN `{$this->App->prefix()}region` AS tb2 ON tb1.district = tb2.region_id LEFT JOIN `{$this->App->prefix()}user` AS tb3 ON tb1.user_id = tb3.user_id WHERE tb2.parent_id='$district_id' AND tb1.is_own='1' AND tb3.user_rank='12'";
            $rt = $this->App->find($sql);
            if (empty($rt)) {
                $sql = "SELECT tb1.user_id,tb2.nickname,tb1.consignee FROM `{$this->App->prefix()}user_address` AS tb1 LEFT JOIN `{$this->App->prefix()}user` AS tb2 ON tb1.user_id=tb2.user_id WHERE tb1.is_own='1' AND tb2.user_rank='12'";
                $rt = $this->App->find($sql);
            }
        }
        
        if (! empty($rt)) {
            $str = '<option value="0">选择配送店</option>';
            foreach ($rt as $row) {
                $str .= '<option value="' . $row['user_id'] . '">' . (! empty($row['nickname']) ? $row['nickname'] : $row['consignee'] . '配送店') . '</option>' . "\n";
            }
            die($str);
        }
    }

    function ajax_ressinfoop($data = array())
    {
        $uid = $this->Session->read('User.uid');
        
        if (isset($data['attrbul']) && ! empty($data['attrbul'])) {
            $err = 0;
            $result = array(
                'error' => $err,
                'message' => ''
            );
            $json = Import::json();
            $attrbul = $json->decode($data['attrbul']); // 反json
            
            if (empty($attrbul)) {
                $result['error'] = 1;
                $result['message'] = "传送的数据为空！";
                die($json->encode($result));
            }
            
            $id = $attrbul->id;
            $dd = array();
            $type = $attrbul->type;
            $dd['user_id'] = $uid;
            $dd['consignee'] = $attrbul->consignee;
            if (empty($dd['consignee'])) {
                $result['error'] = 1;
                $result['message'] = "收货人姓名不能为空！";
                die($json->encode($result));
            }
            $dd['country'] = 1;
            $dd['province'] = $attrbul->province;
            $dd['city'] = $attrbul->city;
            $dd['district'] = $attrbul->district;
            $dd['address'] = $attrbul->address;
            /*
             * $dd['shoppingname'] = $attrbul->shoppingname;
             * $dd['shoppingtime'] = $attrbul->shoppingtime;
             */
            if (isset($attrbul->is_null) and $attrbul->is_null == 'true') {
                if (empty($dd['province']) || empty($dd['city']) || empty($dd['address'])) {
                    $result['error'] = 1;
                    $result['message'] = "收货地址不能为空！";
                    die($json->encode($result));
                }
            } else {
                if (empty($dd['province']) || empty($dd['city']) || empty($dd['district']) || empty($dd['address'])) {
                    $result['error'] = 1;
                    $result['message'] = "收货地址不能为空！";
                    die($json->encode($result));
                }
            }
            // $dd['sex'] = $attrbul->sex;
            // $dd['email'] = $attrbul->email;
            // $dd['zipcode'] = $attrbul->zipcode;
            $dd['mobile'] = $attrbul->mobile;
            // $dd['tel'] = $attrbul->tel;
            if (empty($dd['mobile']) && empty($dd['tel'])) {
                $result['error'] = 1;
                $result['message'] = "电话或者手机必须填写一个！";
                die($json->encode($result));
            }
            $dd['is_default'] = '1';
            
            if (! ($id > 0) && $type == 'add') { // 添加
                $this->App->update('user_address', array(
                    'is_default' => '0'
                ), 'user_id', $uid);
                $this->App->insert('user_address', $dd);
            } elseif ($type == 'update') { // 编辑
                $this->App->update('user_address', $dd, 'address_id', $id);
            }
            unset($dd);
            if (empty($dd['mobile']) && empty($dd['tel'])) {
                $result['error'] = 0;
                $result['message'] = "操作成功！";
                die($json->encode($result));
            }
            exit();
        }
        
        // 配送方式
        $sql = "SELECT * FROM `{$this->App->prefix()}shipping`";
        $rt['shippinglist'] = $this->App->find($sql);
        
        $id = $data['id'];
        $type = $data['type'];
        if (! empty($id) && ! empty($type)) {
            switch ($type) {
                case 'delete': // 删除收货地址
                    $this->App->delete('user_address', 'address_id', $id);
                    break;
                case 'setdefaut': // 设为默认收货地址
                    if (! empty($uid)) {
                        $this->App->update('user_address', array(
                            'is_default' => '0'
                        ), 'user_id', $uid);
                        $this->App->update('user_address', array(
                            'is_default' => '1'
                        ), 'address_id', $id);
                    }
                    
                    break;
                case 'quxiao': // 取消收货地址
                    $this->App->update('user_address', array(
                        'is_default' => '0'
                    ), 'address_id', $id);
                    break;
                case 'showupdate':
                    // 当前用户的收货地址
                    $sql = "SELECT * FROM `{$this->App->prefix()}user_address` WHERE user_id='$uid' AND address_id='$id'";
                    $rt['userress'] = $this->App->findrow($sql);
                    $rt['province'] = $this->get_regions(1); // 获取省列表
                    $rt['city'] = $this->get_regions(2, $rt['userress']['province']); // 城市
                    $rt['district'] = $this->get_regions(3, $rt['userress']['city']); // 区
                    
                    $this->set('rt', $rt);
                    $con = $this->fetch('ajax_show_updateressbox', true);
                    die($con);
                    break;
            }
        }
    }
    
    // 订单的状态
    function get_status($oid = 0, $pid = 0, $sid = 0)
    { // 分别为：订单 支付 发货状态
        $str = '';
        switch ($oid) {
            case '0':
                $str .= '未确认,';
                break;
            case '1':
                $str .= '<font color="red">取消</font>,';
                break;
            case '2':
                $str .= '确认,';
                break;
            case '3':
                $str .= '<font color="red">退货</font>,';
                break;
            case '4':
                $str .= '<font color="red">无效</font>,';
                break;
        }
        
        switch ($pid) {
            case '0':
                $str .= '未付款,';
                break;
            case '1':
                $str .= '已付款,';
                break;
            case '2':
                $str .= '已退款,';
                break;
        }
        
        switch ($sid) {
            case '0':
                $str .= '未发货';
                break;
            case '1':
                $str .= '配货中';
                break;
            case '2':
                $str .= '已发货';
                break;
            case '3':
                $str .= '部分发货';
                break;
            case '4':
                $str .= '退货';
                break;
            case '5':
                $str .= '已收货';
                break;
        }
        return $str;
    }

    /**
     * 订单操作选项
     */
    public function get_option($sn = 0, $oid = 0, $pid = 0, $sid = 0)
    {
        if ( empty( $sn ) )
            return "";
        $str = '';
        switch ( $sid ) {
            case '2':
                return $str = '<a href="javascript:;" name="confirm" id="' . $sn . '" class="oporder"><font color="red">确认收货</font></a>';
                break;
            case '5':
                return $str = '<a href="javascript:;"><font color="red">已完成</font></a>';
                break;
        }
        
        switch ( $oid ) {
            case '0':
                $str = '<a href="javascript:;" name="cancel_order" id="' . $sn . '" class="oporder"><font color="red">取消订单</font></a>';
                break;
            case '1':
                $str = '<a href="javascript:;"><font color="red">已取消</font></a>';
                break;
            case '2':
                $str = '<a href="javascript:;"><font color="red">已确认</font></a>';
                break;
            case '3':
                $str = '<a href="javascript:;"><font color="red">已退货</font></a>';
                break;
            case '4':
                $str = '<a href="javascript:;"><font color="red">无效订单</font></a>';
                break;
        }
        
        return $str;
    }

    /**
     * 团购订单选项
     */
    public function get_group_option( $sn = 0, $oid = 0, $pid = 0, $sid = 0 )
    {
        if ( empty( $sn ) )
            return "";
        $str = '';
        switch ( $sid ) {
            case '2':
                return $str = '<a href="javascript:;" name="confirm" id="' . $sn . '" class="group_order"><font color="red">确认收货</font></a>';
                break;
            case '5':
                return $str = '<a href="javascript:;"><font color="red">已完成</font></a>';
                break;
        }
        
        switch ( $oid ) {
            case '0':
                $str = '<a href="javascript:;" name="cancel_order" id="' . $sn . '" class="group_order"><font color="red">取消订单</font></a>';
                break;
            case '1':
                $str = '<a href="javascript:;"><font color="red">已取消</font></a>';
                break;
            case '2':
                $str = '<a href="javascript:;"><font color="red">已确认</font></a>';
                break;
            case '3':
                $str = '<a href="javascript:;"><font color="red">已退货</font></a>';
                break;
            case '4':
                $str = '<a href="javascript:;"><font color="red">无效订单</font></a>';
                break;
        }
        
        return $str;
    }
    
    // #######################################
    /*
     * 自定义大小验证码函数
     * @$num:字符数
     * @$size:大小
     * @$width,$height:不设置会自动
     */
    function vCode($num = 4, $size = 18, $width = 0, $height = 0)
    {
        ! $width && $width = $num * $size * 4 / 5 - 2;
        ! $height && $height = $size + 8;
        // 去掉了 0 1 O l 等
        $str = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVW";
        $code = '';
        for ($i = 0; $i < $num; $i ++) {
            $code .= $str[mt_rand(0, strlen($str) - 1)];
        }
        // 写入session
        $this->Session->write('vifcode', $code);
        // 画图像
        $im = imagecreatetruecolor($width, $height);
        // 定义要用到的颜色
        $back_color = imagecolorallocate($im, 235, 236, 237);
        $boer_color = imagecolorallocate($im, 118, 151, 199);
        $text_color = imagecolorallocate($im, mt_rand(0, 200), mt_rand(0, 120), mt_rand(0, 120));
        
        // 画背景
        imagefilledrectangle($im, 0, 0, $width, $height, $back_color);
        // 画边框
        imagerectangle($im, 0, 0, $width - 1, $height - 1, $boer_color);
        // 画干扰线
        for ($i = 0; $i < 5; $i ++) {
            $font_color = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
            imagearc($im, mt_rand(- $width, $width), mt_rand(- $height, $height), mt_rand(30, $width * 2), mt_rand(20, $height * 2), mt_rand(0, 360), mt_rand(0, 360), $font_color);
        }
        // 画干扰点
        for ($i = 0; $i < 50; $i ++) {
            $font_color = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
            imagesetpixel($im, mt_rand(0, $width), mt_rand(0, $height), $font_color);
        }
        // echo $this->Session->read('vifcode');
        // 画验证码
        @imagefttext($im, $size, 0, 5, $size + 3, $text_color, SYS_PATH . 'data/monofont.ttf', $code);
        header("Cache-Control: max-age=1, s-maxage=1, no-cache, must-revalidate");
        header("Content-type: image/png");
        imagepng($im);
        imagedestroy($im);
    }

    function ajax_user_card($data = array())
    {
        $bonus_id = trim($data['id']);
        if (! $bonus_id) {
            echo json_encode(array(
                'success' => 0,
                'msg' => 'error'
            ));
            exit();
        }
        $sql = "Select t1.*,t2.* from `{$this->App->prefix()}bonus_list` as t1 left join `{$this->App->prefix()}bonus_type` as t2 On t1.bonus_type_id = t2.type_id Where t1.bonus_id = '$bonus_id'";
        $rt = $this->App->findrow($sql);
        
        if (! $rt) {
            echo json_encode(array(
                'success' => 0,
                'msg' => 'error'
            ));
            exit();
        }
        if ($rt['used_time'] > 0) {
            echo json_encode(array(
                'success' => 0,
                'msg' => 'used'
            ));
            exit();
        }
        $moeys = $rt['type_money'];
        $thismonth = date('Y-m-d', time());
        $thism = date('Y-m', time());
        $sql = "UPDATE `{$this->App->prefix()}user` SET `money_ucount` = `money_ucount`+$moeys,`mymoney` = `mymoney`+$moeys WHERE user_id = '{$rt['user_id']}'";
        
        $this->App->query($sql);
        $this->App->insert('user_money_change', array(
            'buyuid' => $rt['user_id'],
            'order_sn' => $rt['bonus_sn'],
            'thismonth' => $thismonth,
            'thism' => $thism,
            'money' => $moeys,
            'changedesc' => '红包发放:' . $rt['type_name'],
            'time' => time(),
            'uid' => $rt['user_id']
        ));
        $time = time();
        $sql = "Update `{$this->App->prefix()}bonus_list` Set `used_time` ='{$time}' Where bonus_id = '{$bonus_id}'";
        $this->App->query($sql);
        echo json_encode(array(
            'success' => 1,
            'msg' => 'success'
        ));
    }
    
function choujiang()
    {
        $uid = $this->checked_login();
        
        $sql = "select * FROM `gz_lottery` where lt_prize<>'' order by id asc";
        $lt_list = $this->App->find($sql);
        $sql = "select * from `gz_lottery_set` where id=1";
        $rts = $this->App->findrow($sql);
        
        $this->set('rt',$lt_list);  
        $this->set('rts',$rts);
            
        if(!defined(NAVNAME)) define('NAVNAME', "抽奖环节");
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template($mb.'/choujiang');
    }
    
    function ajax_choujiang($data)
    {
        $uid = $this->Session->read('User.uid');
        
        $sql = "select * from `gz_lottery_set` where id=1";
        $rt = $this->App->findrow($sql);
        $num1 = $rt['num'];
        $end_time = $rt['end_time'];
        
        $sql = "select count(id) from `gz_lottery_user` where uid=".$uid;
        $num2 = $this->App->findvar($sql); 
        
        if(time() > $end_time){
            $result['info'] = "当前活动已经结束,敬请期待下期活动!";
            echo json_encode($result);
            exit();     
        }
        
        if($num2 >= $num1){
            $result['info'] = "每人只有".$num1."次抽奖机会哦,你的抽奖机会已经用完了!";
            echo json_encode($result);
            exit();     
        }
        
        //读取抽奖配置信息
        $sql = "select * FROM `gz_lottery` where lt_prize<>'' order by id asc";
        $lt_list = $this->App->find($sql);
        $prize_arr = array();
        $i = 0;
        foreach($lt_list as $rs){  
            $i++;
            $lt_min = explode(',',$rs['lt_min']); 
            $lt_max = explode(',',$rs['lt_max']);    
            $rs['lt_min'] = count($lt_min)>1?$lt_min:$rs['lt_min'];//如果多个角度，则返回数组 
            $rs['lt_max'] = count($lt_max)>1?$lt_min:$rs['lt_max']; //如果多个角度，则返回数组
            $sql = "select count(id) FROM `gz_lottery_user` where lt_id = ".$rs['id'];
            $rs_count = $this->App->findvar($sql);
            $count = empty($rs_count) ? 0 : $rs_count;
            $prize_arr[$i] = array(
                'id'=>$rs['id'],
                'min'=>$rs['lt_min'],//最小角度(大于0度 小于360度) 多个角度用,分隔
                'max'=>$rs['lt_max'],//最大角度 (大于0度 小于360度) 多个角度用,分隔
                'prize'=>$rs['lt_prize'],//奖项
                'name'=>$rs['lt_name'],//奖品名称
                'v'=>$rs['lt_v'],//中奖概率 （单位 %）
                'lt_allowed'=>$rs['lt_allowed'],//中奖名额
                'c'=>$count //中奖记录表中的已中奖数量    
            );   
        }
 
        /*如果中奖数量已达名额上限，则此奖项概率归零,并记录总概率*/
        foreach ($prize_arr as $key =>$val) {
            if($val['c'] >= $val['lt_allowed']){
                $val['v'] = 0;
            }else{
                $val['v'] = $val['v'];
            }  
            $count_v += $val['v'];//奖项总概率 
           $prize_arr[$key] = $val;
        } 
        
        /*判断总概率若为0 则表示名额已用完，不能再抽奖*/
        if($count_v == 0){
            $result['info'] = "当前所有奖项已被抽空，请下次再来!".$count_v;
            echo json_encode($result);
            exit();     
        }
        
        //取出中奖配置
        foreach ($prize_arr as $key =>$val) {
            $arr[$val['id']] = $val['v'];
        }
        
        $rid = $this->getRand($arr); //根据概率获取奖项id
                
        $res = $prize_arr[$rid]; //中奖项

        $min = $res['min'];//得到最小角度
        $max = $res['max'];//得到最大角度
        if($res['id']==7){ //七等奖
            $i = mt_rand(0,5);//随机一个配置好的角度
            $result['angle'] = mt_rand($min[$i],$max[$i]);
        }else{
            $result['angle'] = mt_rand($min,$max); //随机生成一个角度
        }
        
        $result['prize'] = $res['prize'];
        $result['name'] = $res['name'];
        
        /*插入中奖记录表*/
        $add_record_sql = "insert into `gz_lottery_user` (uid,lt_id,create_time)VALUES('$uid','$rid','".time()."')";
        if($res['prize']){
            $this->App->query($add_record_sql);  
        }
        
        unset($prize_arr);
        echo json_encode($result);
    }
    
    
    //获取中奖项ID
    function getRand($proArr) {
        $result = '';
        //概率数组的总概率精度
        $proSum = array_sum($proArr);
        //概率数组循环
        foreach ($proArr as $key =>$proCur) {
            $randNum = mt_rand(1, $proSum);
            if ($randNum <= $proCur) {
                $result = $key;
                break;
            } else {
                $proSum -= $proCur;
            }
        }
        unset ($proArr);
        return $result;
    }

    function prize()
    {
        $uid = $this->checked_login();
    
        $sql = "SELECT l.create_time,j.lt_prize,j.lt_name FROM `{$this->App->prefix()}lottery_user` AS l LEFT JOIN `{$this->App->prefix()}lottery` AS j ON l.lt_id = j.id where l.uid=$uid order by l.id ";
        $rt=$this->App->find($sql);
        $this->set('rt',$rt);
        if(!defined(NAVNAME)) define('NAVNAME', "我的奖品");
        $mb = $GLOBALS['LANG']['mubanid'] > 0 ? $GLOBALS['LANG']['mubanid'] : '';
        $this->template($mb.'/prize');
    }

    function writeLog($message){
        $message = 'time: ' . date('Y-m-d H:i:s') . '|' . $message;
        file_put_contents('/wwwroot/custom_fenxiao/huahai.log_' . date('Y-m-d'), $message . PHP_EOL, FILE_APPEND);
    }
}
?>
