<div class="m_left user_menu">
        <div class="left_content">
		<?php
		//$rank = $this->Session->read('User.rank'); 
		$rank =1;
		if(intval($rank)==10){ //供应商
		?>
			 <h1><span>供应商管理</span><b></b></h1>
             <h2><a href="<?php echo SITE_URL.'suppliers.php?act=suppliers_upload_goods';?>">发布商品</a></h2>
			 <h2><a href="<?php echo SITE_URL.'suppliers.php?act=suppliers_goods_order';?>">订单管理</a></h2>
			 <h2><a href="<?php echo SITE_URL.'suppliers.php?act=suppliers_goods_yes';?>">已审核商品管理</a></h2>
			 <h2><a href="<?php echo SITE_URL.'suppliers.php?act=suppliers_goods_no';?>">未审核商品管理</a></h2>
			 
			<h1><span>我是买家</span><b></b></h1>
            <h2><a href="<?php echo SITE_URL.'user.php?act=myorder'?>">我的订单</a></h2>
            <h2><a href="<?php echo SITE_URL.'user.php?act=address_list'?>">收货地址簿</a></h2>
            <h2><a href="<?php echo SITE_URL.'user.php?act=mymoney'?>">账户余额</a></h2>
            <h2><a href="<?php echo SITE_URL.'user.php?act=pointinfo'?>">积分详情</a></h2>
			<h2><a href="<?php echo SITE_URL.'user.php?act=mycoll'?>">我的收藏</a></h2>
			<h2><a href="<?php echo SITE_URL.'user.php?act=question'?>">我的留言</a></h2>
            <h2><a href="<?php echo SITE_URL.'user.php?act=mycomment'?>">我的评论</a></h2>
			
			<h1><span>信息管理</span><b></b></h1>
            <h2><a href="<?php echo SITE_URL.'user.php?act=myinfo'?>">修改个人资料</a></h2>
            <h2><a href="<?php echo SITE_URL.'user.php?act=editpass'?>">修改密码</a></h2>
			
		    <h1><span>建议及意见</span><b></b></h1>
			<h2><a href="<?php echo SITE_URL.'user.php?act=question'?>">我的留言</a></h2>
						
	   <?php }elseif(intval($rank)==11){ //批发商（企业）会员 ?>
	   
	   		 <h1><span>批发商（企业）管理</span><b></b></h1>
             <h2><a href="<?php echo SITE_URL.'suppliers.php?act=suppliers_upload_goods';?>">发布商品</a></h2>
			 <h2><a href="<?php echo SITE_URL.'suppliers.php?act=suppliers_goods_order';?>">订单管理</a></h2>
			 <h2><a href="<?php echo SITE_URL.'suppliers.php?act=suppliers_goods_yes';?>">已审核商品管理</a></h2>
			 <h2><a href="<?php echo SITE_URL.'suppliers.php?act=suppliers_goods_no';?>">未审核商品管理</a></h2>
	   
	   		<h1><span>订单管理</span><b></b></h1>
            <h2><a href="<?php echo SITE_URL.'user.php?act=myorder'?>">我的订单</a></h2>
			<h1><span>账户管理</span><b></b></h1>
            <h2><a href="<?php echo SITE_URL.'user.php?act=address_list'?>">收货地址簿</a></h2>
            <h2><a href="<?php echo SITE_URL.'user.php?act=mymoney'?>">账户余额</a></h2>
            <h2><a href="<?php echo SITE_URL.'user.php?act=pointinfo'?>">积分详情</a></h2>
			
			<h1><span>信息管理</span><b></b></h1>
            <h2><a href="<?php echo SITE_URL.'user.php?act=myinfo'?>">修改个人资料</a></h2>
			<h2><a href="<?php echo SITE_URL.'user.php?act=editpass'?>">修改密码</a></h2>
            <h2><a href="<?php echo SITE_URL.'user.php?act=mycoll'?>">我的收藏</a></h2>
			
			<h1><span>建议及意见</span><b></b></h1>
			<h2><a href="<?php echo SITE_URL.'user.php?act=question'?>">我的留言</a></h2>
			
			
			<!---------------------- look添加修改 开始   ------------------------------------------------------------------------>
			 <?php }elseif(intval($rank)==12){ //配送店会员 || 企业会员 ?>
	   
	   		 <h1><span>配送店管理</span><b></b></h1>
             <h2><a href="<?php echo SITE_URL.'suppliers.php?act=suppliers_upload_goods';?>">发布商品</a></h2>
			 <h2><a href="<?php echo SITE_URL.'suppliers.php?act=suppliers_goods_order';?>">订单管理</a></h2>
			 <h2><a href="<?php echo SITE_URL.'suppliers.php?act=suppliers_goods_yes';?>">已审核商品管理</a></h2>
			 <h2><a href="<?php echo SITE_URL.'suppliers.php?act=suppliers_goods_no';?>">未审核商品管理</a></h2>
	   
	   		<h1><span>订单管理</span><b></b></h1>
            <h2><a href="<?php echo SITE_URL.'user.php?act=myorder'?>">我的订单</a></h2>
			<h1><span>账户管理</span><b></b></h1>
            <h2><a href="<?php echo SITE_URL.'user.php?act=address_list'?>">收货地址簿</a></h2>
            <h2><a href="<?php echo SITE_URL.'user.php?act=mymoney'?>">账户余额</a></h2>
            <h2><a href="<?php echo SITE_URL.'user.php?act=pointinfo'?>">积分详情</a></h2>
			
			<h1><span>信息管理</span><b></b></h1>
            <h2><a href="<?php echo SITE_URL.'user.php?act=myinfo'?>">修改个人资料</a></h2>
			<h2><a href="<?php echo SITE_URL.'user.php?act=editpass'?>">修改密码</a></h2>
            <h2><a href="<?php echo SITE_URL.'user.php?act=mycoll'?>">我的收藏</a></h2>
			
			<h1><span>建议及意见</span><b></b></h1>
			<h2><a href="<?php echo SITE_URL.'user.php?act=question'?>">我的留言</a></h2>
			
			<!---------------------- look添加修改 结束   ------------------------------------------------------------------------>
			
			
			 
	   <?php } else{ //普通会员 ?>
			<h1><span>订单管理</span><b></b></h1>
            <h2><a href="<?php echo SITE_URL.'user.php?act=myorder'?>">我的订单</a></h2>
            
            <h1><span>账户管理</span><b></b></h1>
            <h2><a href="<?php echo SITE_URL.'user.php?act=address_list'?>">收货地址簿</a></h2>
            <!--<h2><a href="<?php echo SITE_URL.'user.php?act=mymoney'?>">账户余额</a></h2>-->
            <h2><a href="<?php echo SITE_URL.'user.php?act=mycommision'?>">我的佣金</a></h2>
            <h2><a href="<?php echo SITE_URL.'user.php?act=pointinfo'?>">积分详情</a></h2>
            
            <h1><span>信息管理</span><b></b></h1>
            <h2><a href="<?php echo SITE_URL.'user.php?act=myinfo'?>">修改个人资料</a></h2>
            <h2><a href="<?php echo SITE_URL.'user.php?act=editpass'?>">修改密码</a></h2>
            <h2><a href="<?php echo SITE_URL.'user.php?act=mycoll'?>">我的收藏</a></h2>
            <h2><a href="<?php echo SITE_URL.'user.php?act=tuijian'?>">推荐好友</a></h2>
            <h1><span>我的社区</span><b></b></h1>
            <h2><a href="<?php echo SITE_URL.'user.php?act=question'?>">我的留言</a></h2>
            <h2><a href="<?php echo SITE_URL.'user.php?act=mycomment'?>">我的评论</a></h2>
            <!--<h2><a href="<?php echo SITE_URL.'user.php?act=rp_question'?>">我的回复</a></h2>-->
		<?php } ?>
			<h2><a href="<?php echo SITE_URL.'user.php?act=logout'?>">退出管理</a></h2>
            <div class="clear"></div>
        </div>
    </div>