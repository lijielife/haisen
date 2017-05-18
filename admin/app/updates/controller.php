<?php
class UpdatesController extends Controller
{
    function __construct()
    {
    }
    function ajax_check_update($dts = array())
    {
        set_time_limit(2 * 60 * 60);
        $data = isset($dts['message']) ? $dts['message'] : array();
        $err = 0;
        $result = array('error' => $err, 'message' => '', 'step' => 'step1', 'url' => '');
        $json = Import::json();
        if (empty($data)) {
            $result['error'] = 2;
            $result['message'] = '传送的数据为空！';
            die($json->encode($result));
        }
        $wobj = $json->decode($data);
        $site = $wobj->site;
        $step = $wobj->step;
        $url = $wobj->surl;
        if ($step == 'step1') {
            $path = SYS_PATH_ADMIN . 'inc' . DS . 'version.txt';
            $sn = file_get_contents($path);
            $site = explode('://', $site);
            $site = explode('/', $site[1]);
            $con = file_get_contents('http://update.02yc.com/update.php/index/check/sn/' . $sn . '/site/' . $site[0]);
            if (!empty($con)) {
                $ret = explode('+++++', $con);
                if (count($ret) == 2) {
                    $item1 = $ret[0];
                    $item2 = $ret[1];
                    if ($item2 == '2') {
                        $result['error'] = 2;
                        $result['message'] = '网络出错或者未授权暂时无法在线更新！请提交授权信息等待审核！' . '<br/><br/>';
                        die($json->encode($result));
                    } elseif ($item2 == '1') {
                        $result['error'] = 2;
                        $result['message'] = '验证成功，正在下载文件中' . '<br/><br/>';
                        $result['step'] = 'step2';
                        $result['url'] = $item1;
                        sleep(2);
                        die($json->encode($result));
                    } else {
                        $result['error'] = 2;
                        $result['message'] = '网络出错或者未授权暂时无法在线更新！请提交授权信息等待审核！' . '<br/><br/>';
                        die($json->encode($result));
                    }
                } else {
                    $result['error'] = 2;
                    $result['message'] = '网络出错或者意外错误！' . '<br/><br/>';
                    die($json->encode($result));
                }
            } else {
                $result['error'] = 2;
                $result['message'] = '暂时不支持更新！' . '<br/><br/>';
                die($json->encode($result));
            }
        }
        if ($step == 'step2') {
            if (!empty($url) && strpos($url, '.')) {
                $fi = Import::fileop();
                $path = SYS_PATH . 'cache' . DS . 'up' . DS;
                $fi->checkDir($path . 't.php');
                $newfname = $path . basename($url);
                $file = fopen($url, 'rb');
                if ($file) {
                    $newf = fopen($newfname, 'wb');
                    if ($newf) {
                        while (!feof($file)) {
                            fwrite($newf, fread($file, 1024 * 8), 1024 * 8);
                        }
                    }
                } else {
                    $result['error'] = 2;
                    $result['step'] = '';
                    $result['message'] = '下载的安装包打开失败，无法更新，请检查根目录下的(data、sess、cache、photos)目录是否有写入权限。' . '<br/><br/>';
                    $result['url'] = $url;
                    die($json->encode($result));
                }
                if ($file) {
                    fclose($file);
                }
                if ($newf) {
                    fclose($newf);
                    $result['error'] = 1;
                    $result['message'] = '安装包下载成功，正在等待解压...<br/><br/>';
                    $result['step'] = 'step3';
                    $result['url'] = basename($url);
                    sleep(2);
                    die($json->encode($result));
                } else {
                    $result['error'] = 2;
                    $result['message'] = '下载文件过程出错！' . '<br/><br/>';
                    die($json->encode($result));
                }
            } else {
                $result['error'] = 2;
                $result['message'] = '目前已经是最新版本了！' . '<br/><br/>';
                die($json->encode($result));
            }
        }
        if ($step == 'step3') {
            $path = SYS_PATH . 'cache' . DS . 'up' . DS . $url;
            $zippath = SYS_PATH . 'cache' . DS . 'up';
            if (is_file($path) && file_exists($path)) {
                $zip = Import::unzip($path);
                if ($zip->extract(PCLZIP_OPT_PATH, $zippath) == 0) {
                    $result['error'] = 2;
                    $result['message'] = '解压失败，请检查根目录下的(data、sess、cache、photos)目录是否有写入权限。Error : ' . $zip->errorInfo(true) . '<br/><br/>';
                    $result['step'] = '';
                    $result['url'] = $url;
                    sleep(2);
                    die($json->encode($result));
                }
                $result['error'] = 2;
                $result['message'] = '文件解压成功,正在等待安装！' . '<br/><br/>';
                $result['step'] = 'step4';
                $result['url'] = $url;
                sleep(2);
                die($json->encode($result));
            } else {
                $result['error'] = 2;
                $result['message'] = '解压文件不存在！可能网络原因下载安装包失败！' . '<br/><br/>';
                $result['step'] = '';
                sleep(2);
                die($json->encode($result));
            }
        }
        if ($step == 'step4') {
            $path = SYS_PATH . 'cache' . DS . 'up' . DS . 'path.txt';
            if (is_file($path) && file_exists($path)) {
                $filec = file_get_contents($path);
                if (!empty($filec)) {
                    $filec = rtrim(ltrim($filec, '('), ')');
                    if (!empty($filec)) {
                        $path_rt = explode(')(', $filec);
                        foreach ($path_rt as $file) {
                            $ndir = '';
                            if (strpos($file, '|')) {
                                $rr = explode('|', $file);
                                $file = trim($rr[0]);
                                $ndir = trim($rr[1]);
                                if (!empty($ndir)) {
                                    $ndir = $ndir . DS;
                                }
                            }
                            if (strpos($file, '.')) {
                                $file = SYS_PATH . str_replace('\\', DS, $file);
                                $name = basename($file);
                                $spath = SYS_PATH . 'cache' . DS . 'up' . DS . $ndir . $name;
                                if (is_file($spath) && file_exists($spath)) {
                                    $ty = explode('.', $name);
                                    $c = count($ty);
                                    if ($c > 0) {
                                        $type = $ty[$c - 1];
                                    }
                                    if ($type == 'sql') {
                                        $content = file_get_contents($spath);
                                        if (!empty($content)) {
                                            $temp = preg_replace('/\\n\\r/', '', $content);
                                            $tmpArr = @explode(';', $temp);
                                            array_pop($tmpArr);
                                            foreach ($tmpArr as $sql) {
                                                if (!empty($sql) and $sql != EOF) {
                                                    $this->App->query($sql);
                                                }
                                            }
                                        }
                                    } else {
                                        $fi = Import::fileop();
                                        $fi->checkDir($file);
                                        if (is_file($spath) && file_exists($spath)) {
                                            if (@copy($spath, $file)) {
                                            } else {
                                                $result['error'] = 2;
                                                $result['message'] = '文件复制失败，请检查根目录下的(data、sess、cache、photos)目录是否有写入权限！' . '<br/><br/>';
                                                $result['step'] = '';
                                                $result['url'] = $url;
                                                sleep(2);
                                                die($json->encode($result));
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                    $path = SYS_PATH_ADMIN . 'inc' . DS . 'version.txt';
                    $s = explode('.', $url);
                    $s = explode('_', $s[0]);
                    $sn = 'JRFXV';
                    for ($i = 0; $i < count($s) - 1; $i++) {
                        if ($i == 0) {
                            $sn .= $s[$i];
                        } else {
                            $sn .= '.' . $s[$i];
                        }
                    }
                    @file_put_contents($path, $sn);
                    if (!class_exists('FileOp')) {
                        $fi = Import::fileop();
                    }
                    $ar = $fi->list_files(SYS_PATH . 'cache' . DS . 'up');
                    if (!empty($ar)) {
                        foreach ($ar as $filename) {
                            if (is_file($filename)) {
                                if ($fi->delete_file($filename)) {
                                    $i++;
                                }
                            } else {
                                if (is_dir($filename)) {
                                    if ($fi->delete_dir($filename)) {
                                        $j++;
                                    }
                                }
                            }
                            $fi->dir2delete($filename);
                        }
                    }
                    unset($ar);
                    $ar = $fi->list_files(SYS_PATH . 'cache' . DS . 'up');
                    if (!empty($ar)) {
                        foreach ($ar as $filename) {
                            if (is_file($filename)) {
                                if ($fi->delete_file($filename)) {
                                    $i++;
                                }
                            } else {
                                if (is_dir($filename)) {
                                    if ($fi->delete_dir($filename)) {
                                        $j++;
                                    }
                                }
                            }
                            $fi->dir2delete($filename);
                        }
                    }
                    unset($ar);
                    $result['error'] = 2;
                    $result['message'] = '系统升级成功！请检查你的功能是否正常！' . '<br/><br/>';
                    $result['step'] = '';
                    $result['url'] = $url;
                    sleep(2);
                    die($json->encode($result));
                } else {
                    $result['error'] = 2;
                    $result['message'] = '获取路径文件内容失败！' . '<br/><br/>';
                    $result['step'] = '';
                    sleep(2);
                    die($json->encode($result));
                }
            } else {
                $result['error'] = 2;
                $result['message'] = '文件缺失，安装失败！' . '<br/><br/>';
                $result['step'] = '';
                sleep(2);
                die($json->encode($result));
            }
        }
    }
    function submit_question()
    {
        $this->template('submit_question');
    }
    function ajax_submit_question($rt = array())
    {
        $title = $rt['title'];
        $content = $rt['content'];
        $site = $rt['site'];
        $imgs = $rt['imgs'];
        if (empty($title) || empty($content)) {
            die('请输入完成信息');
            die;
        }
        $s = 'en';
        $ss = 'base' . 4 * 8 * 2 . "_{$s}\r\n\t\r\n\tcode";
        $c = $ss($content);
        $t = $ss($title);
        $s = $ss($site);
        if (!empty($imgs)) {
            $i = $ss($imgs);
        }
        $ip = Import::basic()->getip();
        $ip = $ip ? $ip : '0.0.0.0';
        $ip = $ss($ip);
        die;
        if ($t == '1') {
            die('提交成功，我们会尽快处理！');
            die;
        } else {
            die('提交失败！');
            die;
        }
    }
    function ajax_submit_shouquan($rt = array())
    {
        $uname = $rt['unames'];
        $content = $rt['content'];
        $wangwang = $rt['wangwangs'];
        $qq = $rt['qqs'];
        $yumming = $rt['yummings'];
        $site = $rt['site'];
        if (empty($uname) || empty($content) || empty($wangwang) || empty($qq) || empty($yumming) || empty($site)) {
            die('请输入完成信息');
            die;
        }
        $s = 'en';
        $ss = 'base' . 4 * 8 * 2 . "_{$s}\r\n\r\ncode";
        $c = $ss($content);
        $u = $ss($uname);
        $w = $ss($wangwang);
        $q = $ss($qq);
        $y = $ss($yumming);
        $sn = $ss($site);
        $ip = Import::basic()->getip();
        $ip = $ip ? $ip : '0.0.0.0';
        $ip = $ss($ip);
        die;
        if ($t == '1') {
            die('提交成功，我们会尽快处理！');
            die;
        } else {
            die('提交失败！');
            die;
        }
    }
    function online_update()
    {
        $this->js('jquery.json-1.3.js');
        $path = SYS_PATH_ADMIN . 'inc' . DS . 'version.txt';
        $sn = 'JRFXV3.0';
        if (is_file($path)) {
            $sn = file_get_contents($path);
        }
        $this->set('news', $news);
        $this->set('thissn', $sn);
        $this->template('online_update');
    }
    function ajax_get_new()
    {
        $path = SYS_PATH_ADMIN . 'inc' . DS . 'version.txt';
        $sn = 'JRFXV3.0';
        if (is_file($path)) {
            $sn = file_get_contents($path);
        }
        $news = file_get_contents('http://update.02yc.com/update.php/index/index/sn/' . $sn);
        if (empty($news)) {
            $crawler = Import::crawler();
            $news = $crawler->curl_get_con('http://update.02yc.com/update.php/index/index/sn/' . $sn);
        }
        echo $news;
        die;
    }
    function submit_shouquan()
    {
        $this->template('submit_shouquan');
    }
}