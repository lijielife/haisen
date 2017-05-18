<?php
  $excel = Import::exportexcel();
    
	  foreach($rt as $key => $v){
	  $goodscount = '';
	  $goodsname = '';
	  foreach($v['goods'] as $k=>$e){
	  	if($k != 0){
	  		$goodsname .= ' | '.$e['goods_name'];
	  		$goodscount .= ' | '.$e['goods_number'];
	  	}else{
	  		$goodsname .= $e['goods_name'];
	  		$goodscount .= $e['goods_number'];
	  	}
	  
	  	
	  }
	  $num  = $key +2;
      $excel->setActiveSheetIndex(0)
                          ->setCellValue('A1', '客户编号')
                          ->setCellValue('B1', '单位名称')
                          ->setCellValue('C1', '单位简称')
                          ->setCellValue('D1', '联系地址')
						  ->setCellValue('E1', '邮政编码')
						  ->setCellValue('F1', '联系人')
						  ->setCellValue('G1', '联系人手机')
						  ->setCellValue('H1', '用户电话')
						  ->setCellValue('I1', '用户传真')
						  ->setCellValue('J1', '所属省份')
						  ->setCellValue('K1', '所属城市')
						  ->setCellValue('L1', '网址')
						  ->setCellValue('M1', '备注')
						  ->setCellValue('N1', '货品名称')
						  ->setCellValue('O1', '货品数量')
						  ->setCellValue('P1', '是否付款')
						  ->setCellValue('Q1', '订单编号')
						  ->setCellValue('R1', '订单金额')
						  ->setCellValue('S1', '国家')
						  ->setCellValue('T1', '所属城镇')
						  ->setCellValue('U1', '邮箱')
                          ->setCellValue('A'. $num,$v['user_id'])
						  ->setCellValue('B'. $num,'') 
						  ->setCellValue('C'. $num,'') 
						  ->setCellValue('D'. $num,$v['address'])
						  ->setCellValue('E'. $num,$v['zipcode']) 
						  ->setCellValue('F'. $num,$v['consignee']) 
						  ->setCellValue('G'. $num,$v['mobile'])
						  ->setCellValue('H'. $num,$v['tel']) 
						  ->setCellValue('I'. $num,'') 
						  ->setCellValue('J'. $num,$v['province'])
						  ->setCellValue('K'. $num,$v['city']) 
						  ->setCellValue('L'. $num,'') 
						  ->setCellValue('M'. $num,'')
						  ->setCellValue('N'. $num,$goodsname)
						  ->setCellValue('O'. $num,$goodscount) 
						  ->setCellValue('P'. $num,$v['pay_status']?'已付款':'未付款')
						  ->setCellValue('Q'. $num,$v['order_sn'])
						  ->setCellValue('R'. $num,$v['order_amount']) 
						  ->setCellValue('S'. $num,$v['country']) 
						  ->setCellValue('T'. $num,$v['district'])
						  ->setCellValue('U'. $num,$v['email']);
								

	 }
    $excel->getActiveSheet()->setTitle("订单信息"); 
    $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
    $objWriter->save('order_information.xls');
    echo "<div style=\"width:500px;margin:200px auto;font-size:2em;color:blue;text-align:center\"><a href=http://{$_SERVER['SERVER_NAME']}/admin/order_information.xls>点我获取订单Excel格式</a><br><br><br><br><a href=\"javascript:window.close()\" >关闭窗口</a><div>";
?>
																	
																				
