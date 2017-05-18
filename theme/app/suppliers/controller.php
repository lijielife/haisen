<?php
class SuppliersController extends Controller{
	var $rtData= array();
	var $rtData_gallery= array();
	
 	function  __construct() {
		$this->css(array('jquery_dialog.css','user.css','content.css'));
		$this->js(array('jquery.json-1.3.js','jquery_dialog.js','common.js','user.js','goods.js'));
	}
	
	function suppliers_upload_goods(){
		$uid = $this->check_is_suppliers();
		$rank = $this->Session->read('User.rank');

		//商品分类列表		
		//$rt['menu'] = $this->action('catalog','get_goods_cate_tree');
		$this->set('rt',$rt);
		$this->template('suppliers_upload_goods');
	}
	
	function suppliers_goods_list($tt=1){
		$uid = $this->check_is_suppliers();
		$rank = $this->Session->read('User.rank');
		$this->title("商品列表".' - '.$GLOBALS['LANG']['site_name']);
		
		//商品分类列表		
		//$rt['menu'] = $this->action('catalog','get_goods_cate_tree');
		$rt['showtitle'] = $tt==1 ? '已出售上传' : '待审核商品';
		
		//分页
		$page= isset($_GET['page']) ? $_GET['page'] : '';
		if(empty($page)){
			   $page = 1;
		}
		$list = 10;
		$start = ($page-1)*$list;
		$comd[] = "sg.suppliers_id='$uid'";
		
		/***************	look添加  开始 ************************************/
                if(isset($_GET['cat_id'])&&intval($_GET['cat_id'])>0){
                   $cids = $this->action('catalog','get_goods_sub_cat_ids',$_GET['cat_id']);
					$comd[] = 'tb1.cat_id IN ('.implode(",",$cids).')';
				}
				
				 if(isset($_GET['brand_id'])&&intval($_GET['brand_id'])>0)
                    $comd[] = 'tb1.brand_id='.intval($_GET['brand_id']);
				/*
                if(isset($_GET['is_on_sale'])&&($_GET['is_on_sale']=='0'||$_GET['is_on_sale']=='1'))
                    $comd[] = 'tb1.is_on_sale='.$_GET['is_on_sale'];*/
				if(isset($_GET['is_goods_attr'])&&!empty($_GET['is_goods_attr'])){
					switch(trim($_GET['is_goods_attr'])){
						case 'is_on_sale1':
							$comd[] = "sg.is_on_sale='1'";
							break;
						case 'is_on_sale0':
							$comd[] = "sg.is_on_sale='0'";
							break;
						case 'is_hot':
							$comd[] = "tb1.is_hot='1'";
							break;
						case 'is_new':
							$comd[] = "tb1.is_new='1'";
							break;
						case 'is_best':
							$comd[] = "tb1.is_best='1'";
							break;
						case 'is_promote':
							$comd[] = "tb1.is_promote='1'";
							break;
						case 'is_alone_sale':
							$comd[] = "tb1.is_alone_sale='0'";
							break;
						case 'is_qianggou':
							$comd[] = "tb1.is_qianggou='1'";
							break;
						case 'is_jifen':
							$comd[] = "tb1.is_jifen='1'";
							break;
					}
				}
		//	$comd[] = "tb1.is_on_sale='1'";
                if(isset($_GET['keyword'])&&$_GET['keyword'])
                    $comd[] = "(tb1.goods_name LIKE '%".trim($_GET['keyword'])."%' OR tb1.goods_sn LIKE '%".trim($_GET['keyword'])."%')";
		/***************	look添加  结束  ************************************/
		
		if($tt==1){
			$comd[] = "sg.is_check='1' AND sg.is_delete='0'";
		}
		//下架 待审核
		if($tt==0){
			$comd[] = "sg.is_check='0' AND sg.is_delete='0'";
		}
		
		if(!empty($comd)){
			$w = ' WHERE '.implode(' AND ',$comd);
		}
		
		//$sql = "SELECT COUNT(goods_id) FROM `{$this->App->prefix()}goods` $ws";
		$sql = "SELECT COUNT(sg.goods_id) FROM `{$this->App->prefix()}goods` AS tb1";
		$sql .=" LEFT JOIN `{$this->App->prefix()}goods_cate` AS tb2 ON tb1.cat_id = tb2.cat_id";
		$sql .=" LEFT JOIN `{$this->App->prefix()}suppliers_goods` AS sg ON sg.goods_id = tb1.goods_id $w";
		$tts = $this->App->findvar($sql);
		$rt['pagelink'] = Import::basic()->getpage($tts, $list, $page,'?page=',true);
	
		
		$sql = "SELECT tb1.goods_id, tb1.cat_id,tb1.goods_thumb, tb1.goods_sn, tb1.goods_name, tb1.buy_more_best,sg.is_on_sale,tb1.market_price, tb1.shop_price,tb1.pifa_price,tb1.add_time,tb2.cat_name FROM `{$this->App->prefix()}goods` AS tb1";
		$sql .=" LEFT JOIN `{$this->App->prefix()}goods_cate` AS tb2 ON tb1.cat_id = tb2.cat_id";
		$sql .=" LEFT JOIN `{$this->App->prefix()}suppliers_goods` AS sg ON sg.goods_id = tb1.goods_id";
		$sql .=" $w ORDER BY tb1.`goods_id` DESC LIMIT $start,$list";
		$rs = $this->App->find($sql); 
		//echo $sql;
		   //分类列表
            $this->set('catelist',$this->action('catalog','get_goods_cate_tree'));
		
            //品牌列表
           // $sql = "SELECT brand_name,brand_id FROM `{$this->App->prefix()}brand` ORDER BY sort_order ASC, brand_id DESC";
            $this->set('brandlist',$this->action('brand','get_brand_cate_tree'));
		
		
		if(!empty($rs)){
			foreach ($rs as $k=>$row)
			{
			 	$rt['goodslist'][$k] = $row;
				$rt['goodslist'][$k]['url'] = get_url($row['goods_name'],$row['goods_id'],SITE_URL.'product.php?id='.$row['goods_id'],'goods',array('product','index',$row['goods_id']));
				$rt['goodslist'][$k]['goods_thumb'] = is_file(SYS_PATH.$row['goods_thumb']) ? SITE_URL.$row['goods_thumb'] : "";
			}
			unset($rs);
		}
		
		$this->set('rt',$rt);
		$this->set('t',($tt==1?'yes':'no'));
		$this->template('suppliers_goods_list');
	}
	
	/*
	*ajax上传
	*$filename: 文件域名称
	*/
	function ajax_upload($filename=""){
		$uid = $this->Session->read('User.uid');
		$rank = $this->Session->read('User.rank');
		$active = $this->App->findvar("SELECT active FROM `{$this->App->prefix()}user` WHERE user_id='$uid'");
		$this->Session->write('User.active',$active);
		
		if($active !='1'){
			echo '<script> alert("抱歉，你账户处于失活状态，请联系管理员激活！"); </script>';
			return false;
		}
		
		if(!($uid>0) || $rank!='10'){
			echo '<script> alert("抱歉，你没有权限上传！"); </script>';
			return false;
		}
		
		$fop = Import::fileop();
		$fn = SYS_PATH.'cache'.DS.'admin-'.$uid.'.php';
		$fop->writefile($fn,"");
		
		$tw_s = (intval($GLOBALS['LANG']['th_width_s']) > 0) ? intval($GLOBALS['LANG']['th_width_s']) : 200;
		$th_s = (intval($GLOBALS['LANG']['th_height_s']) > 0) ? intval($GLOBALS['LANG']['th_height_s']) : 200;
		$tw_b = (intval($GLOBALS['LANG']['th_width_b']) > 0) ? intval($GLOBALS['LANG']['th_width_b']) : 450;
		$th_b = (intval($GLOBALS['LANG']['th_height_b']) > 0) ? intval($GLOBALS['LANG']['th_height_b']) : 450;
		if(!empty($_FILES[$filename]['tmp_name'])){		
			$fn = SYS_PATH.'cache'.DS.'admin-upload-'.$uid.'.xls';
			if(file_exists($fn)) unlink($fn); //删除原来文件
			
			$fop->copyfile($filename,$fn); //复制文件到服务器
			if(!file_exists($fn)){
				$fop->copyfile($filename,$fn);
				if(!file_exists($fn)){
					echo '<script> alert("上传时发生意外错误！"); </script>';
					return false;
				}
			}
				
			$data = Import::excel(); 
			$data->read($fn); //读取文件
			$importkey = $data->sheets[0]['cells'][1];
			
			for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
				//以下注释的for循环打印excel表数据
				$this->rtData = array();  //商品数据
				$this->rtData_gallery = array();  //商品相册
				
				for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
					 $this->goods_key($importkey[$j],$data->sheets[0]['cells'][$i][$j]); //传送 键=>值 处理
				}
				$this->rtData['is_on_sale'] = '0';
				$this->rtData['add_time'] = mktime();
				$this->rtData['uid'] = $uid;
				
				$inData = $this->rtData; //print_r($inData); exit;
				
				$goods_id = 0;
				//检查该商品已经存在数据库中
				$sn = $inData['goods_sn'];//优先级是商品条形码检查
				if(!empty($sn)){
					$sql = "SELECT goods_id FROM `{$this->App->prefix()}goods` WHERE goods_sn='$sn'";
					$goods_id = $this->App->findvar($sql);
					//if(!empty($snvar)) continue;
				}/*else{
					$sa = $inData['goods_name']; //商品名称检查是否该商品已经存在
					if(!empty($sa)){ //最后更新：2012-12-11 10:26
						$sql = "SELECT goods_id FROM `{$this->App->prefix()}goods` WHERE goods_name='$sa'";
						$goods_id = $this->App->findvar($sql);
						//if(!empty($savar)) continue;
					}
				}*/
				
				if(!empty($inData['goods_name'])){
					 //商品图片
					$val = $inData['original_img'];
					if(!empty($val)){
						$pa = dirname($val);
						$thumb = basename($val);
		
						if(is_file(SYS_PATH.$pa.DS.'thumb_s'.DS.$thumb)){ $pp = SYS_PATH.$pa.DS.'thumb_s'.DS.mktime().$thumb;  $pps = $pa.'/thumb_s/'.mktime().$thumb;}else{  $pp = SYS_PATH.$pa.DS.'thumb_s'.DS.$thumb; $pps = $pa.'/thumb_s/'.$thumb;}
						Import::img()->thumb(SYS_PATH.$val,$pp,$tw_s,$th_s); //小缩略图
						$inData['goods_thumb'] = $pps;
						
						if(is_file(SYS_PATH.$pa.DS.'thumb_b'.DS.$thumb)){ $pp = SYS_PATH.$pa.DS.'thumb_b'.DS.mktime().$thumb; $pps = $pa.'/thumb_b/'.mktime().$thumb;}else{ $pp = SYS_PATH.$pa.DS.'thumb_b'.DS.$thumb; $pps = $pa.'/thumb_b/'.$thumb;}
						Import::img()->thumb(SYS_PATH.$val,$pp,$tw_b,$th_b); //大缩略图
						$inData['goods_img'] = $pps;
					}
					
					if($goods_id>0){ //更新
						//$inData['is_check'] = 0;
						if($this->App->update('goods',$inData,'goods_id',$goods_id)){
						
								//更新供应商商品表
								$sql = "SELECT sgid FROM `{$this->App->prefix()}suppliers_goods` WHERE goods_id='$goods_id' AND suppliers_id='$uid'";
								$sgid = $this->App->findvar($sql);
								$dd = array();
								$dd['goods_number'] = $inData['goods_number']>0 ? $inData['goods_number'] : 1000;
								$dd['warn_number'] = $inData['warn_number']>0 ? $inData['warn_number'] : 10;
								if($inData['pifa_price']>0)$dd['market_price'] = $inData['pifa_price'];
								if($inData['pifa_price']>0)$dd['pifa_price'] = $inData['pifa_price'];
								if($inData['shop_price']>0)$dd['shop_price'] = $inData['shop_price'];
								$dd['is_check'] = 0;
								if(empty($sgid) || !($sgid>0)){
									$dd['is_on_sale'] = 1;
									$dd['goods_id'] = $goods_id;
									$dd['suppliers_id'] = $uid;
									$dd['addtime'] = mktime();
									$this->App->insert('suppliers_goods',$dd);
								}else{
									$this->App->update('suppliers_goods',$dd,array("suppliers_id='$uid'","goods_id='$goods_id'"));
								}
								unset($dd);
								
								//将原来的相册图片删除
								$sql = "SELECT img_url FROM `{$this->App->prefix()}goods_gallery` WHERE goods_id ='$goods_id'";
								$gallery_img = $this->App->findcol($sql);
								if(!empty($gallery_img)){
									foreach($gallery_img as $img){
										$q = dirname($img);
										$h = basename($img);
										Import::fileop()->delete_file(SYS_PATH.$q.DS.'thumb_s'.DS.$h);
										Import::fileop()->delete_file(SYS_PATH.$q.DS.'thumb_b'.DS.$h);
										Import::fileop()->delete_file(SYS_PATH.$img); //
									}
									unset($gallery_img);
								}
								$this->App->delete('goods_gallery','goods_id',$goods_id);
								
								//重新处理商品相册
								$rt_gallery = $this->rtData_gallery; 
								if(!empty($rt_gallery)){
									foreach($rt_gallery as $vv){
										$vv = trim($vv);
										$pa = dirname($vv);
										$thumb = basename($vv);
										if(empty($vv) || !is_file(SYS_PATH.$vv)) continue;
										//生成缩略图
										if(is_file(SYS_PATH.$pa.DS.'thumb_s'.DS.$thumb)){ $p = SYS_PATH.$pa.DS.'thumb_s'.DS.mktime().$thumb; }else{ $p = SYS_PATH.$pa.DS.'thumb_s'.DS.$thumb;}
										Import::img()->thumb(SYS_PATH.$vv,$p,$tw_s,$th_s); //小缩略图
										
										if(is_file(SYS_PATH.$pa.DS.'thumb_b'.DS.$thumb)){ $p = SYS_PATH.$pa.DS.'thumb_b'.DS.mktime().$thumb; }else{ $p = SYS_PATH.$pa.DS.'thumb_b'.DS.$thumb;}
										Import::img()->thumb(SYS_PATH.$vv,$p,$tw_b,$th_b); //大缩略图
										
										//插入商品相册属性表
										$dd = array();
										$dd['goods_id'] = $goods_id;
										$dd['img_url'] = $vv;
										
										$this->App->insert('goods_gallery',$dd);
									}// end foreach
								} //end if 商品相册
								
							}else{ //插入失败，写入日记
								$aid = $this->Session->read('adminid');
								$fn = SYS_PATH.'cache'.DS.'admin-'.$aid.'.php';
								$fop->writefile($fn,"批量导入错误：\n".'商品编号--'.implode('--',array_keys($inData))."\n".$inData['goods_bianhao'].'--'.implode('--',$inData)."\n");
							}
					}else{//插入数据库
							if($this->App->insert('goods',$inData)){
								$lastid = $this->App->iid();
								
								//添加到供应商商品表
								$sql = "SELECT sgid FROM `{$this->App->prefix()}suppliers_goods` WHERE goods_id='$lastid' AND suppliers_id='$uid'";
								$sgid = $this->App->findvar($sql);
								$dd = array();
								$dd['goods_number'] = $inData['goods_number']>0 ? $inData['goods_number'] : 1000;
								$dd['warn_number'] = $inData['warn_number']>0 ? $inData['warn_number'] : 10;
								if($inData['pifa_price']>0)$dd['market_price'] = $inData['pifa_price'];
								if($inData['pifa_price']>0)$dd['pifa_price'] = $inData['pifa_price'];
								if($inData['shop_price']>0)$dd['shop_price'] = $inData['shop_price'];
								$dd['is_check'] = 0;
								$dd['is_on_sale'] = 1;
								$dd['goods_id'] = $lastid;
								$dd['suppliers_id'] = $uid;
								$dd['addtime'] = mktime();
								$this->App->insert('suppliers_goods',$dd);
								unset($dd);
								
								$rt_gallery = $this->rtData_gallery; //商品相册
								//商品相册
								if(!empty($rt_gallery)){
									foreach($rt_gallery as $vv){
										$vv = trim($vv);
										$pa = dirname($vv);
										$thumb = basename($vv);
										if(empty($vv) || !is_file(SYS_PATH.$vv)) continue;
										//生成缩略图
										if(is_file(SYS_PATH.$pa.DS.'thumb_s'.DS.$thumb)){ $p = SYS_PATH.$pa.DS.'thumb_s'.DS.mktime().$thumb; }else{ $p = SYS_PATH.$pa.DS.'thumb_s'.DS.$thumb;}
										Import::img()->thumb(SYS_PATH.$vv,$p,$tw_s,$th_s); //小缩略图
										
										if(is_file(SYS_PATH.$pa.DS.'thumb_b'.DS.$thumb)){ $p = SYS_PATH.$pa.DS.'thumb_b'.DS.mktime().$thumb; }else{ $p = SYS_PATH.$pa.DS.'thumb_b'.DS.$thumb;}
										Import::img()->thumb(SYS_PATH.$vv,$p,$tw_b,$th_b); //大缩略图
										
										//插入商品属性表
										$dd = array();
										$dd['goods_id'] = $lastid;
										$dd['img_url'] = $vv;
										$this->App->insert('goods_gallery',$dd);
									}// end foreach
								} //end if
								
							 }else{ //插入失败，写入日记
								$aid = $this->Session->read('adminid');
								$fn = SYS_PATH.'cache'.DS.'admin-'.$uid.'.php';
								$fop->writefile($fn,"批量导入错误：\n".'商品编号--'.implode('--',array_keys($inData))."\n".$inData['goods_bianhao'].'--'.implode('--',$inData)."\n");
							 }
					} //end if		 
				}else{ //写入错误日记
						$aid = $this->Session->read('adminid');
						$fn = SYS_PATH.'cache'.DS.'admin-'.$uid.'.php';
						$fop->writefile($fn,"批量导入错误：\n".implode('--',array_keys($inData))."\n".implode('--',$inData)."\n");
				} //end if
			 }//end for
			  echo '<script> alert("上传成功！");</script>';	return false;
		}
		return $_FILES[$filename];
	}
	
	//导入在商品表的键
	function goods_key($key="",$val=""){
		$key = trim($key);
		$val = trim($val);
		$uid = $this->Session->read('User.uid');	
		if(!($uid>0)){  echo '<script> alert("非法操作！");</script>'; exit;}	
				
		$arr = array(
			'商品名称'=>'goods_name',
			//'商品编号'=>'goods_bianhao',
			//'商品条形码'=>'goods_sn',  //look添加
			'商品规格'=>'goods_brief', //look添加
			'供应价'=>'market_price',
			'批发价'=>'pifa_price',
			'零售价'=>'shop_price',
			'商品重量'=>'goods_weight',
			'商品库存'=>'goods_number',
			'库存警告数量'=>'warn_number', //look添加
			'商品单位'=>'goods_unit',
			'商品赠送'=>'buy_more_best',
			'meta关键字'=>'meta_keys',
			'meta描述'=>'meta_desc'
		);
		
		if(isset($arr[$key])){
			if(!empty($val)){
				$this->rtData[$arr[$key]] = addslashes($val);
			}
		}elseif($key=='商品编号'){
			if(empty($val)){
				$gid_ = $this->App->findvar("SELECT MAX(goods_id) + 1 FROM `{$this->App->prefix()}goods`");
				$gid_ = empty($gid_) ? 1 : $gid_;
				$val = '2EJ' . str_repeat('0', 6 - strlen($gid_)) . $gid_;
			}else{
				//$bh = $this->App->findvar("SELECT goods_id FROM `{$this->App->prefix()}goods` WHERE goods_bianhao='$val'");
				//if($bh>0) $val = $val.'-1';
			}
			$this->rtData['goods_bianhao'] = $val;
			
		}elseif($key=='商品条形码'){
			if(empty($val)){
				$gid_ = $this->App->findvar("SELECT MAX(goods_id) + 1 FROM `{$this->App->prefix()}goods`");
				$gid_ = empty($gid_) ? 1 : $gid_;
				$val = '2EJ' . str_repeat('0', 6 - strlen($gid_)) . $gid_;
			}
			$this->rtData['goods_sn'] = $val;
			
		}elseif($key=='商品分类'){ //求出商品分类ID
			$sql = "SELECT cat_id FROM `{$this->App->prefix()}goods_cate` WHERE cat_name='$val'";
			$cid = $this->App->findvar($sql);
			if($cid>0){
				$this->rtData['cat_id'] = $cid;
			}
		}elseif($key=='商品品牌'){
			$sql = "SELECT brand_id FROM `{$this->App->prefix()}brand` WHERE brand_name='$val'";
			$bid = $this->App->findvar($sql);
			if($bid>0){
				$this->rtData['brand_id'] = $bid;
			}elseif( empty($bid)){
				$brand_name = array("brand_name"=>$val);
                $this->App->insert('brand',$brand_name);
				$this->rtData['brand_id'] = $this->App->iid();
			}
			
		}elseif($key=='商品图片路径'){
			//if(!empty($val) && file_exists(SYS_PATH.'photos'.DS.'goods'.DS.$uid.DS.$val)){
				//$this->rtData['original_img'] = 'photos/goods/'.$uid.'/'.$val;
			//}
			if(!empty($val) && file_exists(SYS_PATH.$val)){
				$this->rtData['original_img'] = $val;
			}
		}elseif($key=='商品相册[多个用|分隔]'){
			if(!empty($val)){
				$s = @explode('|',$val);
				if(!empty($s)){
					foreach($s as $v){
						$this->rtData_gallery[] = trim($v);
					}
				}
			} // end if
		} else{//end if
			return true;
		}
	}

	//供应商会员订单
	function suppliers_goods_order(){
		$uid = $this->check_is_suppliers();
		$this->title("会员订单".' - '.$GLOBALS['LANG']['site_name']);

		$rank = $this->Session->read('User.rank');
		if($rank !='10') $this->action('common','show404tpl');
		
		//商品分类列表		
		//$rt['menu'] = $this->action('catalog','get_goods_cate_tree');
		
		$page = 1;
		
		$list = 5;
		//用户订单
		$uid = $this->Session->read('User.uid');
		//$w_rt[] = "g.uid = '$uid'";	
		$w_rt[] = $this->select_statue(210);
		$tt = $this->__order_list_count($w_rt); //获取商品的数量
		$rt['order_count'] = $tt;
		
		$rt['orderpage'] = Import::basic()->ajax_page($tt,$list,$page,'get_suppliers_order_page_list',array($status,$dt,$keyword));

		$rt['orderlist'] = $this->__order_list_suppliers($w_rt,$page,$list);
		$rt['status'] = 210;
		$this->set('rt',$rt);
		$this->template('suppliers_goods_order');
	}
	
	//订单详情
	function suppliers_orderinfo($orderid=""){
		$this->title("欢迎进入用户后台管理中心".' - 订单详情 - '.$GLOBALS['LANG']['site_name']);
		$uid = $this->check_is_suppliers();
		if(empty($orderid)){ $this->jump('user.php?act=myorder'); exit; }
		$rank = $this->Session->read('User.rank');
	
		/*$sql= "SELECT tb1.* FROM `{$this->App->prefix()}goods_order` AS tb1 ";
		$sql .= " LEFT JOIN `{$this->App->prefix()}goods` AS g ON tb1.goods_id=g.goods_id";
		$sql .= " WHERE order_id='$orderid' AND g.uid = $uid ORDER BY tb1.goods_id";*/
		$sql= "SELECT * FROM `{$this->App->prefix()}goods_order` WHERE order_id='$orderid' AND suppliers_id = '$uid' ORDER BY rec_id DESC";
		$rt['goodslist'] = $this->App->find($sql);
		
		$sql = "SELECT tb1.*,gos.oid AS ooid,gos.order_status AS order_statuss,gos.pay_status AS pay_statuss,gos.shipping_status AS shipping_statuss,tb2.region_name AS province,tb3.region_name AS city,tb4.region_name AS district,tb5.region_name AS towns, tb6.region_name AS villages,tb7.user_name AS peisongname FROM `{$this->App->prefix()}goods_order_info` AS tb1"; //订单信息 
		$sql .=" LEFT JOIN `{$this->App->prefix()}goods_order_status` AS gos ON gos.order_id=tb1.order_id AND gos.suppliers_id='$uid'"; //供应商状态
		$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb2 ON tb2.region_id = tb1.province"; //查询地址
		$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb3 ON tb3.region_id = tb1.city";
		$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb4 ON tb4.region_id = tb1.district";
		$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb5 ON tb5.region_id = tb1.town";
		$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb6 ON tb6.region_id = tb1.village";
		$sql .= " LEFT JOIN `{$this->App->prefix()}user` AS tb7 ON tb7.user_id = tb1.shop_id";//查询配送店
		$sql .=" WHERE tb1.order_id='$orderid'";	
		$rt['orderinfo'] = $this->App->findrow($sql);
		
		$status = $this->get_status($rt['orderinfo']['order_statuss'],$rt['orderinfo']['pay_statuss'],$rt['orderinfo']['shipping_statuss']);
		$rt['status'] = explode(',',$status);
		
		//订单打印
		if(isset($_GET['tt'])&&$_GET['tt']=='print'){
			$this->layout('kong');
			//改变打印状态
			$this->set('rt',$rt);
			$this->App->update('goods_order_status',array('is_print'=>1),'oid',$rt['orderinfo']['ooid']);
			$this->template('suppliers_order_print');
		}else{	
			//商品分类列表		
			//$rt['menu'] = $this->action('catalog','get_goods_cate_tree');
					
			$this->set('rt',$rt);
			
			$this->template('suppliers_orderinfo_for_user');
		}
	}

	
	//供应商 产品总销量
	function product_goods_order(){
			$this->title("欢迎进入用户后台管理中心".' - 产品总销量 - '.$GLOBALS['LANG']['site_name']);
			$uid = $this->check_is_suppliers();
			$this->css('calendar.css');
			$this->js(array('time/calendar.js','time/calendar-setup.js','time/calendar-zh.js'));

            //分页
            $page= isset($_GET['page']) ? $_GET['page'] : '';
            if(empty($page)){
                   $page = 1;
            }

			// 查询供应商
			//$sql = "SELECT distinct tb1.user_name,tb1.user_id,tb1.nickname FROM `{$this->App->prefix()}user` AS tb1  WHERE tb1.user_rank='10' ORDER BY tb1.user_id";
		   // $this->set('uidlist',$this->App->find($sql));
			
			
			//查询配送店
			$sql = "SELECT distinct tb1.user_name,tb1.user_id FROM `{$this->App->prefix()}user` As tb1  WHERE tb1.user_rank = '12' ORDER BY tb1.user_id ";
			$this->set('pslist',$this->App->find($sql));
			
			
			//查询配送店(产品总销量点击查询 配送店 时下方显示)
			if(isset($_GET['psid']) && intval($_GET['psid'])>0){
				$sql = "SELECT distinct tb1.user_name,tb1.user_id,tb1.home_phone,tb1.mobile_phone,tb2.consignee,tb2.address,tb3.region_name AS province,tb4.region_name AS city,tb5.region_name AS district,tb6.region_name AS town,tb7.region_name AS village  FROM `{$this->App->prefix()}user` As tb1  ";
				$sql .= " LEFT JOIN `{$this->App->prefix()}user_address` AS tb2 ON tb2.user_id = tb1.user_id ";
				$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb3 ON tb3.region_id = tb2.province";
				$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb4 ON tb4.region_id = tb2.city";
				$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb5 ON tb5.region_id = tb2.district";
				$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb6 ON tb6.region_id = tb2.town";
				$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb7 ON tb7.region_id = tb2.village";
				$sql .= " WHERE tb1.user_id = '$_GET[psid]' ORDER BY tb1.user_id "; //显示当前配送店的地址
				$this->set('shoplist',$this->App->findrow($sql));
			}
            $comd = array();
            if(isset($_GET['status'])&&!empty($_GET['status'])){
                    $st = $this->pro_select_statue($_GET['status']);
                    !empty($st)? $comd[] = $st : "";
            }
			
			if(isset($_GET['date1'])&&!empty($_GET['date1']) && isset($_GET['date2'])&&!empty($_GET['date2'])){
					$t1 = strtotime($_GET['date1'].' '.$_GET['t1'].':00:00');
					$t2 = strtotime($_GET['date2'].' '.$_GET['t2'].':59:59');
					//echo date('Y-m-d H:i:s',$t1);
					//echo date('Y-m-d H:i:s',$t2);
                    //$comd[] = "goi.add_time >= ". strtotime($_GET['add_time1']) ."&&add_time < " .$t;
					$comd[] = "goi.add_time BETWEEN '$t1' AND '$t2'";
			}else{
					$t1 = strtotime(date('Y-m-d').' 00:00:01');
					$t2 = strtotime(date('Y-m-d').' 23:59:59');
					$comd[] = "goi.add_time BETWEEN '$t1' AND '$t2'";
			}
					
			//订单号
            if(isset($_GET['order_sn'])&&!empty($_GET['order_sn']))
                    $comd[] = "goi.order_sn LIKE '%".trim($_GET['order_sn'])."%'";
            //配送店	
			$comd[] = " goi.shipping_id = '6' ";	//统一查询自提的订单
			if(isset($_GET['psid'])&&!empty($_GET['psid'])&&$_GET['psid']!='-1'){
                    $comd[] = "goi.shop_id = '$_GET[psid]'";	
			}
			
			//供应商的ID
			$comd[] = "gos.suppliers_id='$uid'";
			$comd[] = "sg.suppliers_id='$uid'";
			//$comd[] = "go.suppliers_id='$uid'";
			
            $w = ""; 
            if(!empty($comd)){
                $w = ' WHERE '.@implode(' AND ',$comd);
            }

			$list = 15;
            $start = ($page-1)*$list;
					
		   //开始查询 订购各个商品的总数	
			$sql = "SELECT goi.order_sn,go.goods_bianhao,go.goods_name,go.goods_unit, go.goods_id,go.market_price,go.goods_price,SUM(go.goods_number) as numb,goi.add_time,gos.is_print FROM `{$this->App->prefix()}goods_order` AS go";
			//$sql = "SELECT goi.order_sn,go.goods_bianhao,go.goods_name,go.goods_unit, go.goods_id,go.market_price,go.goods_price,SUM(go.goods_number) as numb,goi.add_time,gos.is_print, u.user_name AS shopname,u.user_id AS shop_id,uu.user_name AS suppliers_name,uu.user_id AS suppliers_id  FROM `{$this->App->prefix()}goods_order` AS go";
			$sql .= " LEFT JOIN `{$this->App->prefix()}goods_order_info` AS goi ON goi.order_id = go.order_id";
			$sql .= " LEFT JOIN `{$this->App->prefix()}goods_order_status` AS gos ON gos.order_id = go.order_id";
			$sql .= " LEFT JOIN `{$this->App->prefix()}suppliers_goods` AS sg ON sg.goods_id = go.goods_id";
			//$sql .= " LEFT JOIN `{$this->App->prefix()}user` AS u ON u.user_id = goi.shop_id"; //便利店
			//$sql .= " LEFT JOIN `{$this->App->prefix()}user` AS uu ON uu.user_id = gos.suppliers_id"; //供应商
			$sql .= " $w GROUP BY go.goods_sn order by gos.order_id DESC LIMIT $start,$list";
			$orderlist = $this->App->find($sql);
			
			$sql = "SELECT go.goods_id FROM `{$this->App->prefix()}goods_order` AS go";
			$sql .= " LEFT JOIN `{$this->App->prefix()}goods_order_info` AS goi ON goi.order_id = go.order_id";
			$sql .= " LEFT JOIN `{$this->App->prefix()}goods_order_status` AS gos ON gos.order_id = go.order_id";
			$sql .= " LEFT JOIN `{$this->App->prefix()}suppliers_goods` AS sg ON sg.goods_id = go.goods_id";
			//$sql .= " LEFT JOIN `{$this->App->prefix()}user` AS u ON u.user_id = goi.shop_id";
			//$sql .= " LEFT JOIN `{$this->App->prefix()}user` AS uu ON uu.user_id = gos.suppliers_id";
			$sql .= " $w GROUP BY go.goods_sn";
			$ts = $this->App->findcol($sql);
			$tt = count($ts);
            $pagelink = Import::basic()->getpage($tt, $list, $page,'?page=',true);
            $this->set("pagelink",$pagelink);

            $this->set('orderlist',$orderlist);
			//$rt['menu'] = $this->action('catalog','get_goods_cate_tree');
			$this->set('rt',$rt);
			
			$rank = $this->Session->read('User.rank');
			//选择模板
			if($rank == 10 ){ //供应商
            	$ty = isset($_GET['tt'])&&!empty($_GET['tt']) ? trim($_GET['tt']) : "";
				switch($ty){
					case 'delivery': //发货单列表
						$this->template('goods_order_delivery_list');
						break;
					case 'back': //退货单列表
						$this->template('goods_order_back_list');
						break;
					default:
						$this->template('product_goods_order');
						break;
			   }
		    }else{
				$ty = isset($_GET['tt'])&&!empty($_GET['tt']) ? trim($_GET['tt']) : "";
				switch($ty){
					case 'delivery': //发货单列表
						$this->template('goods_order_delivery_list');
						break;
					case 'back': //退货单列表
						$this->template('goods_order_back_list');
						break;
					default:
						$this->template('ps_goods_order');
						break;
				}
		  }
		
	} //end function
	
	//供应商打印
	function suppliers_order_print_all(){
			$this->title("欢迎进入用户后台管理中心".' - 订单列表 - '.$GLOBALS['LANG']['site_name']);
			$uid = $this->check_is_suppliers();
			$this->css('calendar.css');
			
			//查询配送店(产品总销量点击查询 配送店 时下方显示)
            $comd = array();
            if(isset($_GET['status'])&&!empty($_GET['status'])){
                    $st = $this->pro_select_statue($_GET['status']);
                    !empty($st)? $comd[] = $st : "";
            }
			
			if(isset($_GET['date1'])&&!empty($_GET['date1']) && isset($_GET['date2'])&&!empty($_GET['date2'])){
					$t1 = strtotime($_GET['date1'].' '.$_GET['t1'].':00:00');
					$t2 = strtotime($_GET['date2'].' '.$_GET['t2'].':59:59');
					$comd[] = "goi.add_time BETWEEN '$t1' AND '$t2'";
			}else{
					$t1 = strtotime(date('Y-m-d').' 00:00:01');
					$t2 = strtotime(date('Y-m-d').' 23:59:59');
					$comd[] = "goi.add_time BETWEEN '$t1' AND '$t2'";
			}
					
			//订单号
            if(isset($_GET['order_sn'])&&!empty($_GET['order_sn']))
                    $comd[] = "goi.order_sn LIKE '%".trim($_GET['order_sn'])."%'";
            //配送店	
			$comd[] = " goi.shipping_id = '6' ";	//统一查询自提的订单
			//供应商的ID
			$comd[] = "gos.suppliers_id='$uid'"; //供应商状态表
			
			$shoplist = array();
			$orderlist = array();
			if(isset($_GET['psid'])&&!empty($_GET['psid'])&&$_GET['psid']!='-1'){
					$comd[] = "sg.suppliers_id='$uid'";
                    $comd[] = "goi.shop_id = '$_GET[psid]'";
					$w = ' WHERE '.@implode(' AND ',$comd);
					$sql = "SELECT DISTINCT(gos.oid) FROM `{$this->App->prefix()}goods_order_info` AS goi LEFT JOIN `{$this->App->prefix()}goods_order_status` AS gos ON gos.order_id = goi.order_id $w";
					$oids = $this->App->findcol($sql);
					
					//开始查询 订购各个商品的总数	
					$sql = "SELECT goi.order_sn,go.goods_bianhao,go.goods_attr,go.goods_name,go.goods_unit, go.goods_id,go.market_price,go.goods_price,SUM(go.goods_number) as numb,goi.add_time,gos.is_print, u.user_name AS shopname,u.user_id AS shop_id,uu.user_name AS suppliers_name,uu.user_id AS suppliers_id  FROM `{$this->App->prefix()}goods_order` AS go";
					$sql .= " LEFT JOIN `{$this->App->prefix()}suppliers_goods` AS sg ON sg.goods_id = go.goods_id";
					$sql .= " LEFT JOIN `{$this->App->prefix()}goods_order_info` AS goi ON goi.order_id = go.order_id";
					$sql .= " LEFT JOIN `{$this->App->prefix()}goods_order_status` AS gos ON gos.order_id = go.order_id";
					$sql .= " LEFT JOIN `{$this->App->prefix()}user` AS u ON u.user_id = goi.shop_id"; //便利店
					$sql .= " LEFT JOIN `{$this->App->prefix()}user` AS uu ON uu.user_id = gos.suppliers_id"; //供应商
					$sql .= " $w GROUP BY go.goods_sn order by gos.order_id DESC";
					$orderlist[] = $this->App->find($sql);
					
					//便利店信息
					$sql = "SELECT distinct tb1.user_name,tb1.user_id,tb1.home_phone,tb1.mobile_phone,tb2.consignee,tb2.address,tb3.region_name AS province,tb4.region_name AS city,tb5.region_name AS district,tb6.region_name AS town,tb7.region_name AS village  FROM `{$this->App->prefix()}user` As tb1  ";
					$sql .= " LEFT JOIN `{$this->App->prefix()}user_address` AS tb2 ON tb2.user_id = tb1.user_id ";
					$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb3 ON tb3.region_id = tb2.province";
					$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb4 ON tb4.region_id = tb2.city";
					$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb5 ON tb5.region_id = tb2.district";
					$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb6 ON tb6.region_id = tb2.town";
					$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb7 ON tb7.region_id = tb2.village";
					$sql .= " WHERE tb1.user_id = '$_GET[psid]' ORDER BY tb1.user_id "; //显示当前配送店的地址
					$shoplist[] = $this->App->findrow($sql);
			}else{
				//需要查找所有便利店的ID
				$comd[] = "goi.shop_id!='0'";
				$w = ' WHERE '.@implode(' AND ',$comd);
				$sql = "SELECT DISTINCT(goi.shop_id) FROM `{$this->App->prefix()}goods_order_info` AS goi LEFT JOIN `{$this->App->prefix()}goods_order_status` AS gos ON gos.order_id = goi.order_id $w";
				$shop_ids = $this->App->findcol($sql);
				
				$sql = "SELECT DISTINCT(gos.oid) FROM `{$this->App->prefix()}goods_order_info` AS goi LEFT JOIN `{$this->App->prefix()}goods_order_status` AS gos ON gos.order_id = goi.order_id $w";
				$oids = $this->App->findcol($sql);
				
				$comd[] = "sg.suppliers_id='$uid'";
				if(!empty($shop_ids)){
				 foreach($shop_ids as $id){
						$w = ' WHERE '.@implode(' AND ',$comd)." AND goi.shop_id = '$id'";
						//开始查询 订购各个商品的总数	
						$sql = "SELECT goi.order_sn,go.goods_bianhao,go.goods_attr,go.goods_name,go.goods_unit, go.goods_id,go.market_price,go.goods_price,SUM(go.goods_number) as numb,goi.add_time,gos.is_print, u.user_name AS shopname,u.user_id AS shop_id,uu.user_name AS suppliers_name,uu.user_id AS suppliers_id  FROM `{$this->App->prefix()}goods_order` AS go";
						$sql .= " LEFT JOIN `{$this->App->prefix()}suppliers_goods` AS sg ON sg.goods_id = go.goods_id";
						$sql .= " LEFT JOIN `{$this->App->prefix()}goods_order_info` AS goi ON goi.order_id = go.order_id";
						$sql .= " LEFT JOIN `{$this->App->prefix()}goods_order_status` AS gos ON gos.order_id = go.order_id";
						$sql .= " LEFT JOIN `{$this->App->prefix()}user` AS u ON u.user_id = goi.shop_id"; //便利店
						$sql .= " LEFT JOIN `{$this->App->prefix()}user` AS uu ON uu.user_id = gos.suppliers_id"; //供应商
						$sql .= " $w GROUP BY go.goods_sn order by gos.order_id DESC";
						$orderlist[] = $this->App->find($sql);
						
						//便利店信息
						$sql = "SELECT distinct tb1.user_name,tb1.user_id,tb1.home_phone,tb1.mobile_phone,tb2.consignee,tb2.address,tb3.region_name AS province,tb4.region_name AS city,tb5.region_name AS district,tb6.region_name AS town,tb7.region_name AS village  FROM `{$this->App->prefix()}user` As tb1  ";
						$sql .= " LEFT JOIN `{$this->App->prefix()}user_address` AS tb2 ON tb2.user_id = tb1.user_id ";
						$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb3 ON tb3.region_id = tb2.province";
						$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb4 ON tb4.region_id = tb2.city";
						$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb5 ON tb5.region_id = tb2.district";
						$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb6 ON tb6.region_id = tb2.town";
						$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb7 ON tb7.region_id = tb2.village";
						$sql .= " WHERE tb1.user_id = '$id' ORDER BY tb1.user_id "; //显示当前配送店的地址
						$shoplist[] = $this->App->findrow($sql);
				 }
				}
			}
			
		    $this->set('orderlist',$orderlist);
            $this->set('shoplist',$shoplist);
			
			$this->layout('kong');
			//改变状态
			$dd['is_print'] = 1;
			$dd['shipping_status'] = 1;
			if(isset($oids)&&!empty($oids)){
				$this->App->update('goods_order_status',$dd,'oid',$oids);
			}
			$this->template('suppliers_order_print_all');

			
	}
	
	  function pro_select_statue($id=""){
            if(empty($id)) return "";
            switch ($id){
                case '-1':
                    return "";
                    break;
                case '101': //无打印
                    return "gos.is_print='0'";
                    break;
                case '102': //已打印
                    return "gos.is_print='1'";
                    break;
                case '103': //取消订单
                    return "gos.order_status='1'";
                    break;
                case '104': //退货订单
                    return "gos.shipping_status='2'";
                    break;
				case '105': //换货
					return "gos.shipping_status='4'";
					break;
                default :
                    return "";
                    break;
            }
        }
	
	
		  function select_statue($id=""){
            if(empty($id)) return "";
            switch ($id){
                case '-1':
                    return "";
                    break;
               /* case '11':
                    return "order_status='0'";
                    break;
                case '200':
                    return "order_status='2' AND shipping_status='0' AND pay_status='0'";
                    break;*/
                case '210': //待发货订单
                    return "tb3.order_status='0' AND tb3.shipping_status='0' AND tb3.pay_status!='2'";
                    break;
                case '214': //已完成订单
                    return "tb3.order_status='0' AND tb3.shipping_status='3' AND tb3.pay_status='1'";
                    break;
                case '1': //取消订单
                    return "tb3.order_status='1'";
                    break;
                case '4': //无效订单
                    return "tb3.order_status='3'";
                    break;
                case '3': //退货订单
                    return "tb3.order_status='2'";
                    break;
                /*case '2':
                    return "pay_status='2'";
                    break;*/
				case '222': //已发货
					return "tb3.order_status='0' AND tb3.shipping_status='1'";
					break;
                default :
                    return "";
                    break;
            }
        }
		
	/******************** look 添加  结束 *************************************/
	
	//产品详情信息
	function suppliers_goods_info($gid=0){
		 $uid = $this->check_is_suppliers();
		 if(!($gid>0)){
		 	$this->action('common','show404tpl');
		 }
		 
		 $rank = $this->Session->read('User.rank');
		
		//当前商品基本信息
		 $sql = "SELECT * FROM `{$this->App->prefix()}goods` WHERE goods_id='{$gid}' LIMIT 1";
		 $rt['godosinfo'] = $this->App->findrow($sql);
		 if(empty($rt['godosinfo'])){
			 $this->action('common','show404tpl');
		 }
		
		//商品分类列表		
		 $rt['menu'] = $this->action('catalog','get_goods_cate_tree');
		
		 $this->css('calendar.css');
		 $this->js(array("edit/kindeditor.js",'time/calendar.js','time/calendar-setup.js','time/calendar-zh.js'));
		 
		//start 公共部分
		if(isset($_POST)&&!empty($_POST)){
			//$_POST['is_best'] = isset($_POST['is_best'])&&intval($_POST['is_best'])>0 ? intval($_POST['is_best']) : '0';
			//$_POST['is_new'] = isset($_POST['is_new'])&&intval($_POST['is_new'])>0 ? intval($_POST['is_new']) : '0';
			//$_POST['is_hot'] = isset($_POST['is_hot'])&&intval($_POST['is_hot'])>0 ? intval($_POST['is_hot']) : '0';
			$_POST['is_on_sale'] = isset($_POST['is_on_sale'])&&intval($_POST['is_on_sale'])>0 ? intval($_POST['is_on_sale']) : '0';
			$_POST['is_shipping'] = isset($_POST['is_shipping'])&&intval($_POST['is_shipping'])>0 ? intval($_POST['is_shipping']) : '0';
			$_POST['is_alone_sale'] = isset($_POST['is_alone_sale'])&&intval($_POST['is_alone_sale'])>0 ? '0' : '1';
			$_POST['goods_number'] = isset($_POST['goods_numbers'])&&intval($_POST['goods_numbers'])>0 ? intval($_POST['goods_numbers']) : '1000';
			unset($_POST['goods_numbers']);
			$_POST['is_promote'] = isset($_POST['is_promote'])&&intval($_POST['is_promote'])>0 ? intval($_POST['is_promote']) : '0';
			$_POST['promote_start_date'] = isset($_POST['promote_start_date'])&&!empty($_POST['promote_start_date']) ? strtotime($_POST['promote_start_date']) : '0';
			$_POST['promote_end_date'] = isset($_POST['promote_end_date'])&&!empty($_POST['promote_end_date']) ? strtotime($_POST['promote_end_date']) : '0';
			//$_POST['is_qianggou'] = isset($_POST['is_qianggou'])&&intval($_POST['is_qianggou'])>0 ? intval($_POST['is_qianggou']) : '0';
			//$_POST['qianggou_start_date'] = isset($_POST['qianggou_start_date'])&&!empty($_POST['qianggou_start_date']) ? strtotime($_POST['qianggou_start_date']) : '0';
			//$_POST['qianggou_end_date'] = isset($_POST['qianggou_end_date'])&&!empty($_POST['qianggou_end_date']) ? strtotime($_POST['qianggou_end_date']) : '0';
			//$_POST['is_jifen'] = isset($_POST['is_jifen'])&&intval($_POST['is_jifen'])>0 ? intval($_POST['is_jifen']) : '0';
			
			//添加商品属性||过滤商品属性字段，以更好插入到商品表
			$atid = array('attr_id_list'=>'0'); //属性id，在gz_attribute表中
			$atvalue = array('attr_value_list'=>'0'); //用户添加的值
			$ataddi = array('attr_addi_list'=>'0'); //附加的东西，例如可以是价格图片等其他东西
			$gadesc = array('photo_gallery_desc'=>'0'); //商品相册描述
			$gaurl = array('photo_gallery_url'=>'0'); //商品相册图片
			//$goods_gift = array('gift_type'=>'0'); 
			//$nprice = array('numberprice'=>'0');
			//$nrank = array('numberrank'=>'0');
			
			$attr_id_list = array();
			$attr_value_list = array();
			$attr_addi_list = array();
			$photo_gallery_desc = array();
			$photo_gallery_url = array();
			//$goods_gift_arr = array();
			//$numberprice =array(); //会员价格与等级是一一对应的
			//$numberrank =array();
			
			
			if(isset($_POST['gift_type'])){
				$goods_gift_arr = $_POST['gift_type'];
				$_POST = array_diff_key($_POST,$goods_gift);
			}
			
			if(isset($_POST['attr_id_list'])){
				$attr_id_list = $_POST['attr_id_list']; //属性id，在gz_attribute表中
				$_POST = array_diff_key($_POST,$atid);
			}
			if(isset($_POST['attr_value_list'])){
				$attr_value_list = $_POST['attr_value_list']; //用户添加的值
				$_POST = array_diff_key($_POST,$atvalue);
			}
			if(isset($_POST['attr_addi_list'])){
				$attr_addi_list = $_POST['attr_addi_list']; //附加的东西，例如可以使图片等其他东西
				$_POST = array_diff_key($_POST,$ataddi);
			}
			//商品相册描述
			if(isset($_POST['photo_gallery_desc'])){
				$photo_gallery_desc = $_POST['photo_gallery_desc'];
				$_POST = array_diff_key($_POST,$gadesc);
			}
			//商品相册图片
			if(isset($_POST['photo_gallery_url'])){
				$photo_gallery_url = $_POST['photo_gallery_url'];
				$_POST = array_diff_key($_POST,$gaurl);
			}
			//商品的额外分类处理
			$sd = array('sub_cat_id'=>'0');
			$subcateid = array();
			if(isset($_POST['sub_cat_id'])){
					$subcateid = $_POST['sub_cat_id'];
					$_POST = array_diff_key($_POST,$sd);
			}
							
			//会员等级价格
			/*if(isset($_POST['numberprice'])){
				$numberprice = $_POST['numberprice'];
				$_POST = array_diff_key($_POST,$nprice);
			}
			//会员等级
			if(isset($_POST['numberrank'])){
				$numberrank = $_POST['numberrank'];
				$_POST = array_diff_key($_POST,$nrank);
			}*/
		 }
		//end 公共部分
			
		#####################			

			//当前商品的相册
			$sql = "SELECT * FROM `{$this->App->prefix()}goods_gallery` WHERE goods_id='$gid'";
			$this->set('gallerylist',$this->App->find($sql));
			//当前商品属性的属性
			$sql = "SELECT tb1.*,tb2.attr_name,tb2.attr_is_select FROM `{$this->App->prefix()}goods_attr` AS tb1 LEFT JOIN `{$this->App->prefix()}attribute` AS tb2 ON tb1.attr_id=tb2.attr_id WHERE tb1.goods_id='$gid'";
			$goods_attr = $this->App->find($sql);
			$rt['goods_attr'] = array();
			if(!empty($goods_attr)){
				foreach($goods_attr as $row){
					$rt['goods_attr'][$row['attr_id']][] = $row;
				}
				unset($row,$goods_attr);
			}
			
			//商品的赠品类型
			//$sql = "SELECT  type  FROM `{$this->App->prefix()}goods_gift` WHERE goods_id='$gid'";
			//$rt['gift_type_id'] = $this->App->findcol($sql);
						
			if(isset($_POST)&&!empty($_POST)){
					if(empty($_POST['goods_name'])){
						echo'<script>alert("商品名称不能为空！");</script>';
					}else{
						if(empty($_POST['original_img'])){
								//$this->jump('goods.php?type=goods_info&id='.$gid,0,'请你先上传图片'); exit;
						}

						//货号
						if(empty($_POST['goods_sn'])){
							 $_POST['goods_sn'] = 'GZFH' . str_repeat('0', 6 - strlen($gid)) . $gid;
						}
						
						//检查当前的货号是否存在
						$checkvar = $this->App->findvar("SELECT goods_sn FROM `{$this->App->prefix()}goods` WHERE goods_sn=$_POST[goods_sn] LIMIT 1");
						if(!empty($checkvar)){
							 $_POST['goods_sn'] = $_POST['goods_sn'].'-1'; //重新定义一个
						}
						
						//$_POST['is_check'] = '0'; //更改后需要重新审核
						
						if($rt['original_img']!=$_POST['original_img'] && !empty($_POST['original_img'])){
								//修改了上传文件 那么重新上传
								$source_path = SYS_PATH.DS.str_replace('/',DS,$_POST['original_img']);
								$pa = dirname($_POST['original_img']);
								$thumb = basename($_POST['original_img']);
								
								$tw_s = (intval($GLOBALS['LANG']['th_width_s']) > 0) ? intval($GLOBALS['LANG']['th_width_s']) : 200;
								$th_s = (intval($GLOBALS['LANG']['th_height_s']) > 0) ? intval($GLOBALS['LANG']['th_height_s']) : 200;
								$tw_b = (intval($GLOBALS['LANG']['th_width_b']) > 0) ? intval($GLOBALS['LANG']['th_width_b']) : 450;
								$th_b = (intval($GLOBALS['LANG']['th_height_b']) > 0) ? intval($GLOBALS['LANG']['th_height_b']) : 450;
								if(isset($_POST['goods_thumb'])&&!empty($_POST['goods_thumb'])){
								   //留空
								}else{
									Import::img()->thumb($source_path,dirname($source_path).DS.'thumb_s'.DS.$thumb,$tw_s,$th_s); //小缩略图
									$_POST['goods_thumb'] = $pa.'/thumb_s/'.$thumb;
								}
								 
								Import::img()->thumb($source_path,dirname($source_path).DS.'thumb_b'.DS.$thumb,$tw_b,$th_b); //大缩略图
								$_POST['goods_img'] = $pa.'/thumb_b/'.$thumb;
						 }
						 
						 $_POST['meta_keys'] = !empty($_POST['meta_keys']) ? str_replace(array('，','。','.'),',',$_POST['meta_keys']) : "";
						 $_POST['last_update'] = mktime(); //更新时间
						 if($this->App->update('goods',$_POST,'goods_id',$gid)){
						 	
						 }
						 //更新商品属性[从新添加]
						 if(!empty($attr_id_list)&&!empty($gid)){
								foreach($attr_id_list as $kk=>$id){
										if(empty($attr_value_list[$kk])) continue;
										$rtdata = array();
										$rtdata['attr_id'] = $id;
										$rtdata['attr_value'] = isset($attr_value_list[$kk]) ? $attr_value_list[$kk] : "NULL";
										$rtdata['goods_id'] = $gid;
										$rtdata['attr_addi'] = isset($attr_addi_list[$kk]) ? $attr_addi_list[$kk] : "";
										$this->App->insert('goods_attr',$rtdata);
								}
								unset($rtdata);
						 }
						 ###########更新商品相册##########
						 if(!empty($photo_gallery_url)&&!empty($gid)){
							  foreach($photo_gallery_url as $kk=>$url){
								   if(empty($url)) continue;
									$rtdata['img_desc'] = isset($photo_gallery_desc[$kk]) ? $photo_gallery_desc[$kk] : "";
									$rtdata['goods_id'] = $gid;
									$rtdata['img_url'] = $url;
									$this->App->insert('goods_gallery',$rtdata);
							  }
							  unset($rtdata);
						 }
						 //商品的子分类
						 if(!empty($subcateid)){
							   foreach($subcateid as $ids){
								   $dd = array();
								   $dd['goods_id'] = $gid;
								   $dd['cat_id'] = $ids;
								   $this->App->insert('category_sub_goods',$dd);
							   }
						 }
						 //将关键字添加到goods_keyword表
						 if(!empty($_POST['meta_keys'])){
							$keys = explode(',',$_POST['meta_keys']);
							foreach($keys as $key){
								if(empty($key)) continue;
								$key = trim($key);
								$sql = "SELECT kid FROM `{$this->App->prefix()}goods_keyword` WHERE goods_id='$gid' AND keyword='$key'";
								$kid = $this->App->findvar($sql);
								$ds = array();
								if(empty($kid)){
									$ds['goods_id'] = $gid;
									$ds['keyword'] = $key;
									$n = Import::basic()->Pinyin($key);
									$ds['p_fix'] = !empty($n) ? ucwords(substr($n,0,1)) : "NAL";
									$this->App->insert('goods_keyword',$ds);
								}
							}
							unset($keys);
						 }
						 
						 //赠品
						 /*if(!empty($goods_gift_arr)){
							foreach($goods_gift_arr as $tt){
								if(empty($tt)) continue;
								$dd['goods_id'] = $gid;
								$dd['type'] = $tt;
								$sql = "SELECT gifid FROM `{$this->App->prefix()}goods_gift` WHERE goods_id='$gid' AND type='$tt'";
								$a = $this->App->findvar($sql);
								if(empty($a)){
									$this->App->insert('goods_gift',$dd);
								}
							}
						 }
						 //会员等级价格添加
						 if(!empty($numberprice)){
							 foreach($numberprice as $ks=>$price){
								//检查是否已经存在
								$rankid= $numberrank[$ks];
								$sql = "SELECT price_id FROM `{$this->App->prefix()}goods_user_price` WHERE goods_id='$gid' AND user_rank='$rankid'";
								$price_id = $this->App->findvar($sql);
								if($price_id>0){ //存在
									if($price > 0){ //更改
										$sql = "UPDATE `{$this->App->prefix()}goods_user_price` SET user_price='$price' WHERE goods_id='$gid' AND user_rank='$rankid'";
										$this->App->query($sql);
									}else{ //删除
										$sql = "DELETE FROM `{$this->App->prefix()}goods_user_price` WHERE goods_id='$gid' AND user_rank='$rankid'";
										$this->App->query($sql);
									}
								}else{ //添加
										$dt = array();
										$dt['goods_id'] = $gid;
										$dt['user_rank'] = $rankid;
										$dt['user_price'] = $price;
										$this->App->insert('goods_user_price',$dt);
								}
							 }
						 }*/
						 
						 $this->App->update('suppliers_goods',array('is_check'=>'0'),array("goods_id='$gid'","suppliers_id='$uid'"));
						 
						 echo '<script> alert("修改成功！但你的商品将会重新审核！"); location.href="'.(Import::basic()->thisurl()).'"; </script>';
						 exit;
						#############修改成功############
						#                              #
						#                              #
						#############修改成功############
						
					} //end if
		} // end if
		
		//该商品的其他子分类
		$sql = " SELECT tb1.*,tb2.cat_name FROM `{$this->App->prefix()}category_sub_goods` AS tb1";
		$sql .=" LEFT JOIN `{$this->App->prefix()}goods_cate` AS tb2 ON tb1.cat_id = tb2.cat_id";
		$sql .=" WHERE tb1.goods_id='$gid'";
		$this->set('subcatelist',$this->App->find($sql));
		$this->set('type','edit');
		
		//商品的属性列表
		$sql = "SELECT * FROM `{$this->App->prefix()}attribute` ORDER BY sort_order,attr_id DESC";
		$this->set('attr_list',$this->App->find($sql)); 
		
		$fn = SYS_PATH.'data/goods_spend_gift.php';
		$spendgift = array();
		if(file_exists($fn) && is_file($fn)){
				include_once($fn);
		}
		$rt['gift_typesd'] = $spendgift;
		unset($spendgift);
		
		$this->set('rt',$rt);
		
		//品牌列表
		$this->set('brandlist',$this->action('brand','get_brand_cate_tree'));
		
		//会员等级 
		/*$this->set('userrank',$this->App->find("SELECT * FROM `{$this->App->prefix()}user_level` WHERE lid!='10'"));
		$userprice = array();
		if($gid > 0){
		$userprice_ =$this->App->find("SELECT user_price,user_rank FROM `{$this->App->prefix()}goods_user_price` WHERE goods_id='$gid'");
		if(!empty($userprice_)){
			foreach($userprice_ as $row){
				$userprice[$row['user_rank']] = $row['user_price'];
			}
			unset($userprice_);
		}
		}
		$this->set('userprice',$userprice);
		//批发商
		$sql = "SELECT distinct tb1.user_name,tb1.user_id,tb1.nickname FROM `{$this->App->prefix()}user` AS tb1 LEFT JOIN `{$this->App->prefix()}goods` AS tb2 ON tb1.user_id=tb2.uid WHERE tb1.user_rank='10' ORDER BY tb1.user_id DESC";
		$this->set('uidlist',$this->App->find($sql));
		*/
		
		$this->title("用户编辑产品".' - '.$GLOBALS['LANG']['site_name']);
		$this->set('rt',$rt);
		$this->template('suppliers_goods_info');
	}
	
	//下载上传模版
	function download_tpl(){
		  $fop = Import::fileop();
		  $fop->downloadfile(SYS_PATH.'data/2ej.xls');
		  exit;
	}
	
	//ajax删除商品
	function ajax_delgoods($ids=0){
		if(empty($ids)) die("非法删除，删除ID为空！");
		if(!is_array($ids))
			$id_arr = @explode('+',$ids);
		else
			$id_arr = $ids;
			
		$uid = $this->Session->read('User.uid');
		$sql = "UPDATE `{$this->App->prefix()}suppliers_goods` SET is_delete = '1' WHERE goods_id".db_create_in($id_arr)." AND suppliers_id='$uid'";
		$this->App->query($sql);
		$sql = "UPDATE `{$this->App->prefix()}goods` SET is_delete = '1' WHERE goods_id".db_create_in($id_arr);
		$this->App->query($sql);
		exit;
	}
	
	function ajax_getorderlist($data=array()){
		$dt = isset($data['time'])&&intval($data['time'])>0 ?  intval($data['time']) : "";
		$status = isset($data['status']) ?  trim($data['status']) : "";
		$keyword = isset($data['keyword']) ?  trim($data['keyword']) : "";
		$page = isset($data['page'])&&intval($data['page']>0) ? intval($data['page']) : 1;
		$list = 5;
		//用户订单
		$uid = $this->Session->read('User.uid');
		//$w_rt[] = "g.uid = '$uid'";	
		if(!empty($dt)){
			$ts = mktime()-$dt;
			$w_rt[] = "tb1.add_time > '$ts'";	
		}
		
		if(!empty($status)){
			   $st = $this->select_statue($status);
               !empty($st)? $w_rt[] = $st : "";
		}
		if(!empty($keyword)){
			$w_rt[] = "(tb2.goods_name LIKE '%".$keyword."%' OR tb1.order_sn LIKE '%".$keyword."%')";
		}
	
		$tt = $this->__order_list_count($w_rt); //获取商品的数量
		$rt['order_count'] = $tt;
		
		$rt['orderpage'] = Import::basic()->ajax_page($tt,$list,$page,'get_suppliers_order_page_list',array($status,$dt,$keyword));

		$rt['orderlist'] = $this->__order_list_suppliers($w_rt,$page,$list);   //look 修改
		$rt['status'] = $status;
		$rt['keyword'] = $keyword;
		$rt['time'] = $dt;
		
		$this->set('rt',$rt);
		$con = $this->fetch('ajax_suppliers_orderlist',true);
		die($con);
	}
	###########################
	//用户订单列表
	function __order_list($w_rt=array(),$page=1,$list=5){
		if(is_array($w_rt)){
			if(!empty($w_rt)){
				$w = " WHERE ".implode(' AND ',$w_rt);
			}
		}else{
			$w = " WHERE ".$w_rt;
		}
		if(!$page) $page=1;
		$start = ($page-1)*$list;
		$sql = "SELECT distinct tb1.order_id, tb1.order_sn, tb1.order_status, tb1.shipping_status,tb1.shipping_name ,tb1.pay_name, tb1.pay_status, tb1.add_time,tb1.consignee, (tb1.goods_amount + tb1.shipping_fee) AS total_fee FROM `{$this->App->prefix()}goods_order_info` AS tb1";
		$sql .=" LEFT JOIN `{$this->App->prefix()}goods_order` AS tb2 ON tb1.order_id=tb2.order_id";
		$sql .=" LEFT JOIN `{$this->App->prefix()}goods` AS g ON tb2.goods_id=g.goods_id";
		$sql .=" $w ORDER BY tb1.add_time DESC LIMIT $start,$list";
		$orderlist = $this->App->find($sql);
		if(!empty($orderlist)){
			 foreach($orderlist as $k=>$row){
			 
				$orderlist[$k]['status'] = $this->$this->action('suppliers','get_status',$row['order_status'],$row['pay_status'],$row['shipping_status']);
				$orderlist[$k]['op'] = $this->action('store','get_option',$row['order_id'],$row['order_status'],$row['pay_status'],$row['shipping_status']);
				$sql= "SELECT goods_id,goods_name,market_price,goods_price,goods_thumb FROM `{$this->App->prefix()}goods_order` WHERE order_id='$row[order_id]' ORDER BY goods_id";
				$orderlist[$k]['goods'] = $this->App->find($sql);
			 }
		 }
		 return $orderlist;
	}
	
	
	/**********************  look 添加开始 (供应商会员中心 订单管理)   ***************************************************/
	function __order_list_suppliers($w_rt=array(),$page=1,$list=5){
		if(is_array($w_rt)){
			if(!empty($w_rt)){
				$w = " WHERE ".implode(' AND ',$w_rt);
			}
		}else{
			$w = "";
		}
		if(!$page) $page=1;
		$start = ($page-1)*$list;
		$uid = $this->Session->read('User.uid');
		/*$sql = "SELECT distinct tb1.order_id, tb1.order_sn, tb1.order_status, tb1.shipping_status,tb1.shipping_name ,tb1.pay_name, tb1.pay_status, tb1.add_time,tb1.consignee, (tb1.goods_amount + tb1.shipping_fee) AS total_fee FROM `{$this->App->prefix()}goods_order_info` AS tb1";
		$sql .=" LEFT JOIN `{$this->App->prefix()}goods_order` AS tb2 ON tb1.order_id=tb2.order_id";
		$sql .=" LEFT JOIN `{$this->App->prefix()}goods` AS g ON tb2.goods_id=g.goods_id";
		$sql .=" $w ORDER BY tb1.add_time DESC LIMIT $start,$list";*/
		
		$sql = "SELECT distinct tb1.order_id, tb1.order_sn, tb3.order_status, tb3.shipping_status,tb3.pay_status,tb3.is_print, tb1.shipping_name ,tb1.pay_name, tb1.add_time,tb1.consignee, (tb1.goods_amount + tb1.shipping_fee) AS total_fee FROM `{$this->App->prefix()}goods_order_info` AS tb1";
		$sql .=" LEFT JOIN `{$this->App->prefix()}goods_order_status` AS tb3 ON tb3.order_id=tb1.order_id AND tb3.suppliers_id='$uid'";
		$sql .=" LEFT JOIN `{$this->App->prefix()}goods_order` AS tb2 ON tb2.order_id=tb1.order_id";
		//$sql .=" LEFT JOIN `{$this->App->prefix()}goods` AS g ON tb2.goods_id=g.goods_id";
		$sql .=" $w ORDER BY tb1.add_time DESC LIMIT $start,$list";
		//echo $sql;
		$orderlist = $this->App->find($sql);
		if(!empty($orderlist)){
			 foreach($orderlist as $k=>$row){
			 
				$orderlist[$k]['status'] = $this->get_status($row['order_status'],$row['pay_status'],$row['shipping_status']);
				$orderlist[$k]['op'] = $this->get_suppliers_order_option($row['order_status'],$row['pay_status'],$row['shipping_status'],$row['is_print']);
				/*$sql= "SELECT tb2.goods_id,tb2.goods_name,tb2.market_price,tb2.goods_price FROM `{$this->App->prefix()}goods_order`  AS tb2 ";
				$sql= "SELECT tb2.goods_id,tb2.goods_name,tb2.market_price,tb2.goods_price FROM `{$this->App->prefix()}goods_order AS tb2`  ";
				$sql .= " LEFT JOIN `{$this->App->prefix()}goods` AS g ON tb2.goods_id=g.goods_id";
				$sql .= " WHERE tb2.order_id='$row[order_id]' AND g.uid = $uid ORDER BY tb2.goods_id";
				$orderlist[$k]['goods'] = $this->App->find($sql);*/
				//客户信息与配送店信息
				$sql = "SELECT tb1.address,tb1.shipping_id,tb2.region_name AS province,tb3.region_name AS city,tb4.region_name AS district,tb5.region_name AS towns, tb6.region_name AS villages,tb7.user_name AS peisongname FROM `{$this->App->prefix()}goods_order_info` AS tb1";
				$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb2 ON tb2.region_id = tb1.province";
				$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb3 ON tb3.region_id = tb1.city";
				$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb4 ON tb4.region_id = tb1.district";
				$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb5 ON tb5.region_id = tb1.town";
				$sql .=" LEFT JOIN `{$this->App->prefix()}region` AS tb6 ON tb6.region_id = tb1.village";
				$sql .= " LEFT JOIN `{$this->App->prefix()}user` AS tb7 ON tb7.user_id = tb1.shop_id";
				$sql .=" WHERE tb1.order_id='$row[order_id]'";	
				$orderlist[$k]['address'] = $this->App->findrow($sql);
			 }
		 }
		 return $orderlist;
	}
	
	
	
	/**********************  look 添加结束    ***************************************************/
	
	
	function __order_list_count($w_rt=array()){
		if(is_array($w_rt)){
			if(!empty($w_rt)){
				$w = " WHERE ".implode(' AND ',$w_rt);
			}
		}else{
			$w = " WHERE ".$w_rt;
		}
		$sql = "SELECT COUNT(distinct tb1.order_id) FROM `{$this->App->prefix()}goods_order_info` AS tb1";
		$sql .=" LEFT JOIN `{$this->App->prefix()}goods_order` AS tb2 ON tb1.order_id=tb2.order_id ";
		$sql .=" LEFT JOIN `{$this->App->prefix()}goods` AS g ON tb2.goods_id=g.goods_id ".$w;
		return $this->App->findvar($sql);
	}
	
	function get_option($sn=0,$oid=0,$pid=0,$sid=0){
  			if(empty($sn)) return "";
  		    $str = '';
			switch($sid){
                case '1':
                    return $str = '<a href="javascript:;" name="confirm" id="'.$sn.'" class="oporder"><font color="red">确认收货</font></a>';
                    break;
                case '3':
                    return $str = '<font color="red">已完成</font>';
                    break;
            }
			
            switch($oid){
                case '0':
                    $str = '<a href="javascript:;" name="cancel_order" id="'.$sn.'" class="oporder"><font color="red">取消订单</font></a>';
                    break;
                case '1':
                    $str = '<font color="red">已取消</font>';
                    break;
                case '2':
                    $str = '<font color="red">已退货</font>';
                    break;
                case '3':
                    $str = '<font color="red">无效订单</font>';
                    break;
            }
         
            return $str;
   }
  
  function get_suppliers_order_option($order_status=0,$pay_status=0,$shipping_status=0,$is_print=0){
			$str = "";
			 if($order_status==0){   //下了订单
			
				if($shipping_status==0){ //无发货
					 $str .= '<input value="发货" class="order_action" type="button" id="|-|-1">'."\n";
					 if($pay_status!=1){
					 	$str .= '<input value="付款" class="order_action" type="button" id="|-1-|">'."\n";
						$str .= '<input value="取消" class="order_action" type="button" id="1-0-0">'."\n";
					 }else{
					 	$str .= '<input value="无效" class="order_action" type="button" id="3-|-|">'."\n";
					 }
				}else if($shipping_status==1){ //已经发货
					 $str .= '<input value="收货" class="order_action" type="button" id="|-1-3">'."\n";
					 if($pay_status!=1){
					 	$str .= '<input value="付款" class="order_action" type="button" id="|-1-|">'."\n";
						//$str .= '<input value="取消" class="order_action" type="button" id="1-0-0">'."\n";
					 }else{
					 	$str .= '<input value="已付款" type="button" id="">'."\n";
					 	//$str .= '<input value="无效" class="order_action" type="button" id="3-|-|">'."\n";
					 }
					  $str .= '<input value="退货" class="order_action" type="button" id="2-|-2">'."\n";
				}else if($shipping_status==2){ //退货
					  $str .= '<input value="已退货" type="button" id="">'."\n";
					  //$str .= '<input value="移除" class="order_action" type="button" id="remove">'."\n";
				}else if($shipping_status==3){//收货
					  $str .= '<input value="已收货" type="button" id="">'."\n";
				}else{
					$str .= '<input value="已完成" type="button" id="">'."\n";
				}
				
			}else if($order_status==1){  //取消
			  	//$str .= '<input value="确认" class="order_action" type="button" id="2-0-0">'."\n";
				//$str .= '<input value="移除" class="order_action" type="button" id="remove">'."\n";
				$str .= '<input value="已取消" type="button" id="">'."\n";
			}else if($order_status==2){ //退货订单
				$str .= '<input value="已退货" type="button" id="">'."\n";
			   // $str .= '<input value="确认" class="order_action" type="button" id="2-0-0">'."\n";
				//$str .= '<input value="移除" class="order_action" type="button" id="remove">'."\n";
			}else if($order_status==3){ //无效订单 
				$str .= '<input value="无效订单" type="button" id="">'."\n";
			   // $str .= '<input value="确认" class="order_action" type="button" id="2-0-0">'."\n";
				//$str .= '<input value="移除" class="order_action" type="button" id="remove">'."\n";
			}
			$str .= '<input value="打印" class="order_print" type="button" id="">'."\n";
			if($is_print==1){
				$str .='<span>已打印</span>';
			}
			return $str;
		}
   
  //订单的状态
   function get_status($oid=0,$pid=0,$sid=0){ //分别为：订单 支付 发货状态
            $str = '';
            switch($oid){
                /*case '0':
                    $str .= '新下单,';
                    break;*/
                case '1':
                    $str .= '<font color="red">取消</font>,';
                    break;
                case '2':
					$str .= '<font color="red">退货单</font>,';
                    break;
                case '3':
                    $str .= '<font color="red">无效</font>,';
                    break;
            }

           switch($pid){
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

            switch($sid){
                case '0':
                    $str .= '未发货';
                    break;
                case '1':
                    $str .= '已发货';
                    break;
                case '2':
                    $str .= '退货';
                    break;
                case '3':
                    $str .= '已收货';
                    break;
				case '4':
                    $str .= '已换货';
                    break;
            }
            return $str;
    }

	  
	 //用户订单操作
	function ajax_order_op($id=0,$op=""){
   		if(empty($id) || empty($op)) die("传送ID为空！");
		if($op=="cancel_order")
			$this->App->update('goods_order_info',array('order_status'=>'1'),'order_id',$id);
		else if($op=="confirm"){
			$bIsSuccess = $this->App->update('goods_order_info',array('shipping_status'=>'5'),'order_id',$id);
			
			if($bIsSuccess){
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
            }
		}
   }
   
   //商品上下架
	function ajax_activeop($data=array()){
		$uid = $this->Session->read('User.uid');
		if(empty($data['gid'])) die("非法操作，ID为空！");
		$type = $data['type'];
		switch($type){
			case 'is_on_sale':
				$sdata['is_on_sale']= $data['active'];
				break;
				
		}
		if(!empty($sdata)){
			$this->App->update('suppliers_goods',$sdata,array("goods_id='$data[gid]'","suppliers_id='$uid'"));
		}
		unset($data,$sdata);
		exit;
	}
	
	function _get_order($orderid=0){
		$sql = "SELECT email,consignee FROM `{$this->App->prefix()}goods_order_info` WHERE order_id='$orderid'";
		return $this->App->findrow($sql);
	}
	
	//操作订单状态
	function ajax_order_option($data=array()){
		$err = 0;
		$result = array('error' => $err, 'message' => '');
		$json = Import::json();

		if (empty($data))
		{
				$result['error'] = 1;
				$result['message'] = '传送的数据为空！';
				die($json->encode($result));
		}
		$mesobj = $json->decode($data); //反json ,返回值为对象
		
		//以下字段对应评论的表单页面 一定要一致
		$sdd = array();
		$uid = $this->Session->read('User.uid');
		$sdd['desc'] = $mesobj->desc;
		$sdd['action_uid'] = $uid;
		$sdd['logtime'] = mktime();
		$sdd['type'] = 'shop';
		$is_send_eamil = $mesobj->is_send_eamil;
		$orderid = $mesobj->orderid;
		$status = $mesobj->status;
		$dd = array();
		if(!empty($status)){
			$ar = explode('-',$status);
			if(isset($ar[0])&&$ar[0]!='|'){
				$dd['order_status'] = $ar[0];
				$sdd['order_status'] = $ar[0]; //订单
			}
			if(isset($ar[1])&&$ar[1]!='|'){
				$dd['pay_status'] = $ar[1];
				$sdd['pay_status'] = $ar[1]; //支付
			}
			if(isset($ar[2])&&$ar[2]!='|'){
				$dd['shipping_status'] = $ar[2];
				$sdd['shipping_status'] = $ar[2]; //配送
			}
			//$dd['order_id'] = $orderid;
			//$dd['shop_id'] = $uid;
			if( $this->App->update('goods_order_status',$dd,array("suppliers_id='$uid'","order_id='$orderid'"))){
				$rt = $this->App->findrow("SELECT oid,order_status,shipping_status,pay_status,is_print FROM `{$this->App->prefix()}goods_order_status` WHERE suppliers_id='$uid' AND order_id='$orderid'");
				$upid = $rt['oid'];
				$order_status = $rt['order_status'];
				$shipping_status = $rt['shipping_status'];
				$pay_status = $rt['pay_status'];
				$is_print = $rt['is_print'];
				if($upid>0){
					$sdd['oid'] = $upid;
					$this->App->insert('goods_order_action_log',$sdd);
					$result['error'] = 0;
					$result['orderid'] = $orderid;
					$result['status'] = $this->get_status($order_status,$pay_status,$shipping_status);
					$result['message'] = $this->get_suppliers_order_option($order_status,$pay_status,$shipping_status,$is_print);
					//$result['message'] = $ss;
					die($json->encode($result));
				}
				
			}
			$result['error'] = 1;
			$result['message'] = '你操作无法完成，请稍后重试！';
			die($json->encode($result));
		}else{
			$result['error'] = 1;
			$result['message'] = '传送的订单状态无法识别！';
			die($json->encode($result));
		}
		


		$result['message'] = $this->fetch('ajax_message',true);
		
		die($json->encode($result));
	}
	
	function return_order_text($orderid){
			$uid = $this->Session->read('User.uid');
			$rt = $this->App->findrow("SELECT oid,order_status,shipping_status,pay_status,is_print FROM `{$this->App->prefix()}goods_order_status` WHERE suppliers_id='$uid' AND order_id='$orderid'");
			
			$order_status = $rt['order_status'];
			$shipping_status = $rt['shipping_status'];
			$pay_status = $rt['pay_status'];
				
			$result['error'] = 0;
			$result['orderid'] = $orderid;
			$result['status'] = $this->get_status($order_status,$pay_status,$shipping_status);
			$result['message'] = $this->get_suppliers_order_option($order_status,$pay_status,$shipping_status,1);
			
			$json = Import::json();
			die($json->encode($result));
	}
	
	//供应商配送区域信息
	function suppliers_area_info($id=0){
		$this->title("欢迎进入用户后台管理中心".' - 供应商区域申请 - '.$GLOBALS['LANG']['site_name']);
		$uid = $this->check_is_suppliers();
		
		if(!empty($_POST['regions'])){
				$suid = $this->App->findvar("SELECT ssaid FROM `{$this->App->prefix()}suppliers_shoppong_area` WHERE suppliers_id='$uid'"); 
				$data['area_data'] = json_encode($_POST['regions']);
				$data['uptime'] = mktime();
				if($suid>0){
					$data['active'] = '0';
					if($this->App->update('suppliers_shoppong_area',$data,'suppliers_id',$uid)){
						$this->jump('',0,'你已经重新申请成功，等待审核！'); exit;
					}else{
						$this->jump('',0,'你重新申请失败！'); exit;
					}
				}else{
					$data['suppliers_id'] = $uid;
					if($this->App->insert('suppliers_shoppong_area',$data)){
						$this->jump('',0,'申请成功，等待审核！'); exit;
					}else{
						$this->jump('',0,'申请失败！'); exit;
					}
				}
		 } //end if
		
		$rt = $this->App->findrow("SELECT * FROM `{$this->App->prefix()}suppliers_shoppong_area` WHERE suppliers_id='$uid'");
		
		$areaid = !empty($rt['area_data']) ? json_decode($rt['area_data']) : array();
		if(!empty($areaid)){
			$rt['area_data'] = $this->App->find("SELECT * FROM `{$this->App->prefix()}region` WHERE region_id IN (".implode(',',$areaid).") ORDER BY region_id ASC");
		}
		
		$this->set('rt',$rt);
		$this->template('suppliers_area_info');
	}
	
	//供应商个人资料
	function suppliersinfo(){
		$this->title("欢迎进入用户后台管理中心".' - 我的资料 - '.$GLOBALS['LANG']['site_name']);
		$uid = $this->check_is_suppliers();

		$sql = "SELECT * FROM `{$this->App->prefix()}user` WHERE user_id ='{$uid}' LIMIT 1";
		$rt['userinfo'] = $this->App->findrow($sql);
		
		$rt['province'] = $this->action('user','get_regions',1);  //获取省列表
		
		//当前用户的收货地址
		$sql = "SELECT * FROM `{$this->App->prefix()}user_address` WHERE user_id='$uid' AND is_own='1' LIMIT 1";
		$rt['userress'] = $this->App->findrow($sql);

		$rt['city'] = $this->action('user','get_regions',2,$rt['userress']['province']);  //城市
		$rt['district'] = $this->action('user','get_regions',3,$rt['userress']['city']);  //区
		$rt['town'] = $this->action('user','get_regions',4,$rt['userress']['district']); 
		$rt['village'] = $this->action('user','get_regions',5,$rt['userress']['town']);		
		
		$this->set('rt',$rt);

		$this->template('suppliersinfo');
		
	}
	
	function check_is_login(){
		$uid = $this->Session->read('User.uid');
		if(empty($uid)){ $this->jump(SITE_URL.'user.php?act=login',0,'请先登录！'); exit;}
		return $uid;
	}
	
	//是否是供应商用户
	function check_is_suppliers(){
		$uid = $this->Session->read('User.uid');
		if(empty($uid)){ $this->jump(SITE_URL.'user.php?act=login',0,'请先登录！'); exit;}
		$rank = $this->Session->read('User.rank');
		if($rank !='10'){ echo '<script> alert("你没有权限访问"); </script>';$this->action('common','show404tpl');}
		return $uid;
	}
	
	 //成为厂家业务员
	function join_salesmen(){
		$uid = $this->check_is_suppliers();
		$is_salesmen = $this->Session->read('User.is_salesmen');
		if(!empty($is_salesmen)){
			$this->jump(SITE_URL.'suppliers.php?act=salesmen_manage'); exit;
		}
		$this->title("欢迎进入用户后台管理中心".' - 申请品牌推广业务员 - '.$GLOBALS['LANG']['site_name']);
		$sql = "SELECT brand_id,brand_name FROM `{$this->App->prefix()}brand` WHERE is_show='1' AND brand_name !='' ORDER BY brand_name ASC";
		$this->set('allbrand',$this->App->find($sql));
		
		$sql = "SELECT b.brand_name,usb.brand_id,usb.is_check FROM `{$this->App->prefix()}user_salesmen_brand` AS usb LEFT JOIN `{$this->App->prefix()}brand` AS b ON b.brand_id = usb.brand_id  WHERE usb.uid = '$uid' ORDER BY b.brand_name ASC";
		$this->set('dbbrand',$this->App->find($sql));
		$this->set('is_salesmen',$is_salesmen);
		$this->template('suppliers_join_salesmen');
	}
	
	 //厂家业务员管理
	function salesmen_manage(){
		$this->css('calendar.css');
		$this->js(array('time/calendar.js','time/calendar-setup.js','time/calendar-zh.js'));
		$uid = $this->check_is_suppliers();
		$is_salesmen = $this->Session->read('User.is_salesmen');
		if(empty($is_salesmen)){
			$this->jump(SITE_URL.'suppliers.php?act=join_salesmen'); exit;
		}
		$this->title("欢迎进入用户后台管理中心".' - 品牌推广业务员管理 - '.$GLOBALS['LANG']['site_name']);
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
				$t1 = strtotime(date('Y-m-d',mktime()-3600*24*7).' 00:00:01');
				$t2 = strtotime(date('Y-m-d',mktime()).' 23:59:59');
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
		
		$this->template('suppliers_salesmen_manage');
	}
	
	function ajax_save_brand_ids($data=array()){
		$uid = $this->check_is_suppliers();
		$ids = $data['brand_ids'];
		if(!empty($ids)){
			$brand_ids = @explode('+',$ids);
			$sql = "DELETE FROM `{$this->App->prefix()}user_salesmen_brand` WHERE uid='$uid' AND brand_id IN(".implode(',',$brand_ids).")";
			$this->App->query($sql);
			$dd = array();
			foreach($brand_ids as $id){
				$dd['uid'] = $uid;
				$dd['brand_id'] = $id;
				$dd['addtime'] = mktime();
				$this->App->insert('user_salesmen_brand',$dd);
			}
		}
		
		exit;
	}
	//end function 
	
	////////////////////////////
	//ajax上传缓存中的图片
	function ajax_suppliers_upload_cache_photo($data=array()){
		if(empty($data['str_spec'])){
			die("非法！");
		}
		$uid = $this->check_is_suppliers();
		@set_time_limit(600); //最大运行时间
		$ar_spec = explode('++',$data['str_spec']);
		$goods = array();
		$photo_gallery_desc = array();
		$photo_gallery_url = array();
		foreach($ar_spec as $str){
			$item_ar = @explode('---',$str);
			if(count($item_ar)==3){
				if(in_array($item_ar[0],array('photo_gallery_desc','photo_gallery_url'))){
					if($item_ar[0]=='photo_gallery_desc'){
						$photo_gallery_desc[$item_ar[2]][] = $item_ar[1]; //相册描述
					}elseif($item_ar[0]=='photo_gallery_url'){
						$photo_gallery_url[$item_ar[2]][] = $item_ar[1]; //相册图片
					}
				}else{
					$goods[$item_ar[2]][$item_ar[0]] = $item_ar[1];
				}
			}
		}
		
		$datas = array();
		$imgobj = Import::img();
		foreach($goods as $item=>$row){
			if(empty($row['goods_bianhao'])){
				$gid = $this->App->findvar("SELECT MAX(goods_id) + 1 FROM `{$this->App->prefix()}goods`");
				$gid = empty($gid) ? 1 : $gid;
				$goods_bianhao = '2EJ' . str_repeat('0', 6 - strlen($gid)) . $gid;
			}else{
				$goods_bianhao =  $row['goods_bianhao'];
			}
			
			//检查是否已经存在
			if(empty($row['goods_sn'])){
				$row['goods_sn'] = $goods_bianhao;
			}
			$ginfo = $this->App->findrow("SELECT goods_id,goods_thumb,goods_img,original_img FROM `{$this->App->prefix()}goods` WHERE goods_sn='$row[goods_sn]'");
			$gid = isset($ginfo['goods_id']) ? $ginfo['goods_id'] : 0;
			
			$datas['goods_bianhao'] = $goods_bianhao;
			$datas['goods_sn'] = $row['goods_sn'];
			if($row['goods_numbers']>0) $datas['goods_number'] = $row['goods_numbers'];
			$datas['goods_name'] = $row['goods_name'];
			if($row['pifa_price']>0) $datas['market_price'] = $row['pifa_price'];
			if($row['pifa_price']>0) $datas['pifa_price'] = $row['pifa_price'];
			if($row['shop_price']>0) $datas['shop_price'] = $row['shop_price'];
			if($row['cat_id']>0) $datas['cat_id'] = $row['cat_id'];
			if($row['brand_id']>0) $datas['brand_id'] = $row['brand_id'];
			$datas['goods_brief'] = $row['goods_brief'];
			$datas['goods_unit'] = $row['goods_unit'];
			if( $row['goods_weight']>0) $datas['goods_weight'] = $row['goods_weight'];
			if( $row['warn_number']>0) $datas['warn_number'] = $row['warn_number'];
			
			if(!empty($row['sourcepathname'])){
				$imgobj->filecopy($row['sourcepathname'],$row['uploadname']);
				if($gid>0){
					$fop = Import::fileop();
					//删除原来的图片
					$fop->delete_file(SYS_PATH.$ginfo['goods_thumb']);
					$fop->delete_file(SYS_PATH.$ginfo['goods_img']);
					$fop->delete_file(SYS_PATH.$ginfo['original_img']);
					
					//商品相册
					/*$sql = "SELECT img_url FROM `{$this->App->prefix()}goods_gallery` WHERE goods_id ='$gid'";
					$gallery_img = $this->App->findcol($sql);
					if(!empty($gallery_img)){
						foreach($gallery_img as $img){
							$q = dirname($img);
							$h = basename($img);
							$fop->delete_file(SYS_PATH.$q.DS.'thumb_s'.DS.$h);
							$fop->delete_file(SYS_PATH.$q.DS.'thumb_b'.DS.$h);
							$fop->delete_file(SYS_PATH.$img); //
						}
						unset($gallery_img);
					}*/
		
					unset($ginfo);
				}
			}else{
				continue;
			}
			if(!file_exists($row['uploadname'])){
				continue;
			}
			$thumb = basename($row['uploadname']);
			$pa = 'photos/goods/'.date('Ym',mktime()).'/';
			$tw_s = (intval($GLOBALS['LANG']['th_width_s']) > 0) ? intval($GLOBALS['LANG']['th_width_s']) : 200;
			$th_s = (intval($GLOBALS['LANG']['th_height_s']) > 0) ? intval($GLOBALS['LANG']['th_height_s']) : 200;
			$tw_b = (intval($GLOBALS['LANG']['th_width_b']) > 0) ? intval($GLOBALS['LANG']['th_width_b']) : 450;
			$th_b = (intval($GLOBALS['LANG']['th_height_b']) > 0) ? intval($GLOBALS['LANG']['th_height_b']) : 450;
			$datas['original_img'] = $pa.$thumb;	//原始图
			Import::img()->thumb($row['uploadname'],dirname($row['uploadname']).DS.'thumb_s'.DS.$thumb,$tw_s,$th_s); //小缩略图
			$datas['goods_thumb'] = $pa.'thumb_s/'.$thumb;
			Import::img()->thumb($row['uploadname'],dirname($row['uploadname']).DS.'thumb_b'.DS.$thumb,$tw_b,$th_b); //大缩略图
			$datas['goods_img'] = $pa.'thumb_b/'.$thumb;
			if($gid>0){	
				$datas['last_update'] = mktime();
				$this->App->update('goods',$datas,'goods_id',$gid);
			}else{							
				$datas['add_time'] = mktime();
				$this->App->insert('goods',$datas);
				$gid = $this->App->iid();
			}
			
			##########商品属性###########
			$ds = array();
			if(!empty($ds)){
				foreach($ds as $irow){
					 $irow['goods_id'] = $gid;
					 $this->App->insert('goods_attr',$irow);
				}
			}
			##########商品相册图片添加########
			if(isset($photo_gallery_url[$item]) && !empty($photo_gallery_url[$item])){
				foreach($photo_gallery_url[$item] as $k=>$url){
					if(empty($url)) continue;
					$rows['goods_id'] = $gid;
					$rows['img_url'] = $url;
					$rows['img_desc'] = $photo_gallery_desc[$item][$k];
                    $this->App->insert('goods_gallery',$rows);
				}
			}
			
			$sql = "SELECT sgid FROM `{$this->App->prefix()}suppliers_goods` WHERE goods_id='$gid' AND suppliers_id='$uid'";
			$sgid = $this->App->findvar($sql);
			$dd = array();
			$dd['goods_number'] = $datas['goods_number']>0 ? $datas['goods_number'] : 1000;
			$dd['warn_number'] = $datas['warn_number']>0 ? $datas['warn_number'] : 10;
			if($row['pifa_price']>0)$dd['market_price'] = $row['pifa_price'];
			if($row['pifa_price']>0)$dd['pifa_price'] = $row['pifa_price'];
			$dd['is_on_sale'] = 1;
			if($row['shop_price']>0)$dd['shop_price'] = $row['shop_price'];
			$dd['is_check'] = 0;
			if(empty($sgid) || !($sgid>0)){
				$dd['goods_id'] = $gid;
				$dd['suppliers_id'] = $uid;
				$dd['addtime'] = mktime();
				$this->App->insert('suppliers_goods',$dd);
			}else{//更新
				$this->App->update('suppliers_goods',$dd,array("suppliers_id='$uid'","goods_id='$gid'"));
			}
			unset($dd);
		}
		
		unset($ar_spec,$data,$goods);
		exit;
	}
	
	
	//显示批量上传页面
	function suppliers_goods_batch_add($type=""){
			$this->js('jquery.json-1.3.js');
            $this->title("欢迎进入用户后台管理中心".' - 批量上传商品 - '.$GLOBALS['LANG']['site_name']);
			$uids = $this->check_is_suppliers();
			$adname = empty($uids) ? 'user-default' : 'user-'.$uids;
            if($type=='cachelist'){
                    $dir = SYS_PATH_PHOTOS.'temp'.DS.$adname;
                    $rt = Import::fileop()->list_files($dir);
                    $photolist = array();
                    if(!empty($rt)){
						$iconv = Import::gz_iconv();
                        foreach($rt as  $k=>$var){
							if(empty($var)) continue;
							if(!(preg_match('/^.*$/u', $var) > 0)){
								$var = $iconv->ec_iconv('GB2312', 'UTF8', $var);
							}
                            $file = explode('.',ltrim(strrchr($var,'/'),'/'));
                            $filetype = "";
                            if(!empty($file)&&count($file)==2){
                                //$filetype = strtolower($file[1]);
								$filetype = $file[1];
                                if(!in_array($filetype,array('jpg','png','gif','JPG','PNG','GIF'))) continue;
                                //$filename = $iconv->ec_iconv('GB2312', 'UTF8', $file[0]);
								$filename = $file[0];
								$xname = $this->upload_random_name(); //新文件名
								$rts[$xname] = $filename;
								$fn1 = $dir.DS.($iconv->ec_iconv('UTF8', 'GB2312', $filename)).'.'.$filetype; //旧路径
								$fn2 = $dir.DS.$xname.'.'.$filetype; //新路径
								@chmod($fn1,0755);
								@rename($fn1,$fn2);
                            }else{
				continue;
                            }
                     $photolist[$k] = array('url'=>SITE_URL.'photos/temp/'.(empty($adname) ? 'admin' : $adname).'/'.$xname.'.'.$filetype,'pathname'=>$fn2,'uploadname'=>SYS_PATH_PHOTOS.'goods'.DS.date('Ym',mktime()).DS.($this->upload_random_name()).'.'.$filetype,'filename'=>$filename);
							//Import::img()->thumb($rt[$k]['pathname'],$rt[$k]['uploadname'],150,150);
                        }
                    }
                    unset($rt);
                    //商品的属性列表
                    $sql = "SELECT * FROM `{$this->App->prefix()}attribute` ORDER BY sort_order,attr_id DESC";
                    $this->set('attrlist',$this->App->find($sql));
                    $this->set('photolist',$photolist);
					$this->set('catelist',$this->action('catalog','get_goods_cate_tree'));
					$this->set('brandlist',$this->action('brand','get_brand_cate_tree'));
                    $this->template('suppliers_goods_batch_add_cachelist');
            }else{
                    $this->template('suppliers_goods_batch_add');
            }
			
	}
	
	/**
	 *  返回一个随机的名字
	 *
	 * @access  public
	 * @param
	 *
	 * @return      string      $str    随机名称
	 */
	
	function upload_random_name()
	{
		$str = date('Ymd');

		for ($i = 0; $i < 6; $i++)
		{
			$str .= chr(mt_rand(97, 122));
		}
		$str .= mktime();
		return $str;
	}
	
	function get_user_id(){
		return $this->Session->read('User.uid');
	}
}
?>