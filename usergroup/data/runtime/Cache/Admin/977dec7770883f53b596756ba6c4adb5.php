<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="textml; charset=utf-8" />
	<!-- Set render engine for 360 browser -->
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="/usergroup/public/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/usergroup/public/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/usergroup/public/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/usergroup/public/simpleboot/font-awesome/4.4.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/usergroup/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/usergroup/",
    JS_ROOT: "public/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/usergroup/public/js/jquery.js"></script>
    <script src="/usergroup/public/js/wind.js"></script>
    <script src="/usergroup/public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
<style>
.well{ margin:0px; padding:3px 0px;}
.search{
    width:100%; height:auto; overflow:hidden; margin:0px; padding:0px; list-style:none;}
.search li{ width:25%; float:left; height:40px; padding:3px 0px; margin:0px; line-height:40px;}
.search li label{ display:inline-block; float:left; width:100px; line-height:40px; text-align:right; padding-right:10px;}
.sch02{ width:150px; float:left;}
</style>
</head>
<body>
    <div class="wrap js-check-wrap">
        <ul class="nav nav-tabs">
            <li class="active"><a href="javascript:;">用户关系</a></li>
        </ul>
        <?php if($my_uid == ''): ?><form class="well form-search" method="post" action="<?php echo U('Usergroup/index');?>">
        <ul class="search">        
          <li><label>关键字：</label> 
            <input type="text" name="key" class="sch02" value="<?php echo ($key); ?>" placeholder="请输入关键字..."></li>
    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-primary" name="submit" value="搜索" /></li>          
        </ul></form><?php endif; ?>
        <form class="js-ajax-form" action="" method="post">
            <table class="table table-hover table-bordered table-list">
                <thead>
                    <tr>                        
                        <th width="150">昵称</th>
                        <th width="60">佣金</th>
                        <th width="50">代理数</th>
                        <th width="50">购买单数</th>
                        <th width="50">上月购买单数</th>
                        <th width="60">是否关注</th>
                        <th width="60">加入时间</th>
                        <th width="70">操作</th>
                    </tr>
                </thead>
                <?php if(is_array($lists)): foreach($lists as $key=>$vo): ?><tr>                    
                    <td>
                    <?php if($vo["zcount"] > 0): ?><a href='<?php echo U("Usergroup/index_own",array("uid"=>$vo["uid"]));?>'><?php if($vo["nickname"] != ''): echo ($vo["nickname"]); else: ?>未关注<?php endif; ?>(<font color="red"><?php echo ($vo["zcount"]); ?></font>)</a>
                    <?php else: ?>
                        <?php if($vo["nickname"] != ''): echo ($vo["nickname"]); else: ?>未关注<?php endif; ?>(<font color="red">0</font>)<?php endif; ?>
                    </td>
                    <td>￥
                    <?php if($vo["money_ucount"] == ''): ?>0.00
                    <?php else: ?>
                    <?php echo ($vo["money_ucount"]); endif; ?>
                    </td>
                    <td>0</td>
                    <td><?php echo ($vo["allnum"]); ?></td>
                    <td><?php echo ($vo["lastnum"]); ?></td>
                    <td>
                        <?php if($vo["is_subscribe"] == 1): ?>是
                        <?php else: ?>
                        否<?php endif; ?>
                    </td>
                    <td>
                    <?php echo ($vo["subscribe_time_data"]); ?>
                    </td>
                    <td>
                    <?php if($my_uid != $vo['uid'] && $isadd == 1): if($vo["isopen"] > 0): ?><a href="<?php echo U('User/edit',array('uid'=>$vo['uid']));?>">修改登录权限</a>
                    <?php else: ?>
                        <a href="<?php echo U('User/add',array('uid'=>$vo['uid']));?>">开通登录权限</a><?php endif; endif; ?>
                    </td>
                </tr><?php endforeach; endif; ?>
            </table>
            <div class="pagination"><?php echo ($page); ?></div>
        </form>
    </div>
    <script src="/usergroup/public/js/common.js"></script>
    <script>
        function refersh_window() {
            var refersh_time = getCookie('refersh_time');
            if (refersh_time == 1) {
                window.location = "<?php echo U('Applystatus/index',$formget);?>";
            }
        }
        setInterval(function() {
            refersh_window();
        }, 2000);
        $(function() {
            setCookie("refersh_time", 0);
            Wind.use('ajaxForm', 'artDialog', 'iframeTools', function() {
                //批量移动
                $('.js-articles-move').click(function(e) {
                    var str = 0;
                    var id = tag = '';
                    $("input[name='ids[]']").each(function() {
                        if ($(this).attr('checked')) {
                            str = 1;
                            id += tag + $(this).val();
                            tag = ',';
                        }
                    });
                    if (str == 0) {
                        art.dialog.through({
                            id : 'error',
                            icon : 'error',
                            content : '您没有勾选信息，无法进行操作！',
                            cancelVal : '关闭',
                            cancel : true
                        });
                        return false;
                    }
                    var $this = $(this);
                    art.dialog.open("/usergroup/index.php?g=portal&m=AdminPost&a=move&ids="+ id, {
                        title : "批量移动",
                        width : "80%"
                    });
                });
            });
        });
    </script>
</body>
</html>