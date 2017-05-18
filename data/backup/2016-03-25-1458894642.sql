CREATE TABLE IF NOT EXISTS `gz_ad_content` (
  `pid` smallint(5) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `tid` tinyint(240) NOT NULL,
  `cat_id` smallint(5) NOT NULL DEFAULT '0',
  `ad_name` varchar(255) DEFAULT '',
  `ad_img` varchar(128) DEFAULT '',
  `ad_file` varchar(128) NOT NULL DEFAULT '',
  `ad_url` varchar(128) DEFAULT '',
  `is_show` enum('0','1') NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
  `uptime` int(11) DEFAULT NULL,
  `type` varchar(12) NOT NULL DEFAULT '' COMMENT 'gc:商品类型ac:文章类型',
  `vieworder` smallint(5) NOT NULL DEFAULT '50',
  PRIMARY KEY (`pid`),
  KEY `ad_name` (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=174 DEFAULT CHARSET=utf8;
INSERT INTO `gz_ad_content`(`pid`,`uid`,`remark`,`tid`,`cat_id`,`ad_name`,`ad_img`,`ad_file`,`ad_url`,`is_show`,`addtime`,`uptime`,`type`,`vieworder`) VALUES ('173','0','','32','0','1','photos/wx020369com/ads/201507/14382373611438237361.png','','http://wx.020369.com/m/catalog.php?tid=42','1','1438237363','1438280281','','50');
INSERT INTO `gz_ad_content`(`pid`,`uid`,`remark`,`tid`,`cat_id`,`ad_name`,`ad_img`,`ad_file`,`ad_url`,`is_show`,`addtime`,`uptime`,`type`,`vieworder`) VALUES ('172','0','','33','0','3','photos/wx020369com/ads/201507/14382372491438237249.png','','http://wx.020369.com/m/catalog.php?tid=42','1','1438237250','1438280292','','50');
INSERT INTO `gz_ad_content`(`pid`,`uid`,`remark`,`tid`,`cat_id`,`ad_name`,`ad_img`,`ad_file`,`ad_url`,`is_show`,`addtime`,`uptime`,`type`,`vieworder`) VALUES ('171','0','','33','0','2','photos/wx020369com/ads/201507/14382372081438237208.png','','','1','1438237220','','','50');
INSERT INTO `gz_ad_content`(`pid`,`uid`,`remark`,`tid`,`cat_id`,`ad_name`,`ad_img`,`ad_file`,`ad_url`,`is_show`,`addtime`,`uptime`,`type`,`vieworder`) VALUES ('166','0','','34','0','6','photos/wx020369com/ads/201507/14382363661438236366.jpg','','http://wx.020369.com/m/catalog.php?tid=42','1','1438236370','1438280240','','5');
INSERT INTO `gz_ad_content`(`pid`,`uid`,`remark`,`tid`,`cat_id`,`ad_name`,`ad_img`,`ad_file`,`ad_url`,`is_show`,`addtime`,`uptime`,`type`,`vieworder`) VALUES ('165','0','','34','0','7','photos/wx020369com/ads/201507/14382362641438236264.jpg','','http://wx.020369.com/m/catalog.php?tid=42','1','1438236268','1438280256','','6');
INSERT INTO `gz_ad_content`(`pid`,`uid`,`remark`,`tid`,`cat_id`,`ad_name`,`ad_img`,`ad_file`,`ad_url`,`is_show`,`addtime`,`uptime`,`type`,`vieworder`) VALUES ('164','0','','34','0','5','photos/wx020369com/ads/201507/14382362521438236252.jpg','','http://wx.020369.com/m/catalog.php?tid=42','1','1438236253','1438280226','','4');
INSERT INTO `gz_ad_content`(`pid`,`uid`,`remark`,`tid`,`cat_id`,`ad_name`,`ad_img`,`ad_file`,`ad_url`,`is_show`,`addtime`,`uptime`,`type`,`vieworder`) VALUES ('163','0','','34','0','4','photos/wx020369com/ads/201507/14382362401438236240.jpg','','http://wx.020369.com/m/catalog.php?tid=42','1','1438236241','1438280188','','3');
INSERT INTO `gz_ad_content`(`pid`,`uid`,`remark`,`tid`,`cat_id`,`ad_name`,`ad_img`,`ad_file`,`ad_url`,`is_show`,`addtime`,`uptime`,`type`,`vieworder`) VALUES ('162','0','','34','0','3','photos/wx020369com/ads/201507/14382362261438236226.jpg','','http://wx.020369.com/m/catalog.php?tid=42','1','1438236227','1438280174','','2');
INSERT INTO `gz_ad_content`(`pid`,`uid`,`remark`,`tid`,`cat_id`,`ad_name`,`ad_img`,`ad_file`,`ad_url`,`is_show`,`addtime`,`uptime`,`type`,`vieworder`) VALUES ('161','0','','34','0','2','photos/wx020369com/ads/201507/14382362141438236214.jpg','','http://wx.020369.com/m/catalog.php?tid=42','1','1438236215','1438280156','','1');
INSERT INTO `gz_ad_content`(`pid`,`uid`,`remark`,`tid`,`cat_id`,`ad_name`,`ad_img`,`ad_file`,`ad_url`,`is_show`,`addtime`,`uptime`,`type`,`vieworder`) VALUES ('151','0','','31','0','BANNER','photos/wx020369com/ads/201507/14381964641438196464.jpg','','','1','1438196478','','','50');
INSERT INTO `gz_ad_content`(`pid`,`uid`,`remark`,`tid`,`cat_id`,`ad_name`,`ad_img`,`ad_file`,`ad_url`,`is_show`,`addtime`,`uptime`,`type`,`vieworder`) VALUES ('150','0','','29','0','4','photos/wx020369com/ads/201507/14381953361438195336.jpg','','','1','1427427059','1438195339','','50');
CREATE TABLE IF NOT EXISTS `gz_ad_position` (
  `tid` tinyint(240) NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(128) DEFAULT NULL,
  `ad_width` float(6,2) DEFAULT NULL,
  `ad_height` float(5,2) DEFAULT NULL,
  `ad_desc` varchar(255) DEFAULT NULL,
  `is_show` enum('0','1') NOT NULL DEFAULT '0',
  `addtime` int(11) DEFAULT NULL,
  `uptime` int(11) DEFAULT NULL,
  PRIMARY KEY (`tid`),
  KEY `ad_name` (`ad_name`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
INSERT INTO `gz_ad_position`(`tid`,`ad_name`,`ad_width`,`ad_height`,`ad_desc`,`is_show`,`addtime`,`uptime`) VALUES ('34','模板25首页中间广告条','960.00','375.00','','1','1436768018','1436768273');
INSERT INTO `gz_ad_position`(`tid`,`ad_name`,`ad_width`,`ad_height`,`ad_desc`,`is_show`,`addtime`,`uptime`) VALUES ('33','模板25首页中间广告右边','554.00','258.00','','1','1436767990','1436768081');
INSERT INTO `gz_ad_position`(`tid`,`ad_name`,`ad_width`,`ad_height`,`ad_desc`,`is_show`,`addtime`,`uptime`) VALUES ('32','模板25首页中间广告左边','404.00','517.00','','1','1436767982','1436768050');
INSERT INTO `gz_ad_position`(`tid`,`ad_name`,`ad_width`,`ad_height`,`ad_desc`,`is_show`,`addtime`,`uptime`) VALUES ('31','模板25首页顶部图片','600.00','375.00','','1','1436767699','');
INSERT INTO `gz_ad_position`(`tid`,`ad_name`,`ad_width`,`ad_height`,`ad_desc`,`is_show`,`addtime`,`uptime`) VALUES ('29','首页轮播','0.00','0.00','','1','1381259521','1435978225');
CREATE TABLE IF NOT EXISTS `gz_admin` (
  `adminid` tinyint(3) NOT NULL AUTO_INCREMENT,
  `adminname` varchar(128) NOT NULL,
  `groupid` tinyint(2) NOT NULL DEFAULT '0',
  `password` varchar(128) NOT NULL,
  `lasttime` int(11) DEFAULT NULL,
  `lastip` varchar(128) DEFAULT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '1',
  `email` varchar(128) DEFAULT NULL,
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`adminid`),
  KEY `adminname` (`adminname`),
  KEY `groupid` (`groupid`),
  KEY `lastip` (`lastip`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
INSERT INTO `gz_admin`(`adminid`,`adminname`,`groupid`,`password`,`lasttime`,`lastip`,`active`,`email`,`addtime`) VALUES ('1','admin999','1','00ba7ceab606427071d5d755ea99e976','1458894514','127.0.0.1','1','342000163@qq.com','2147483647');
CREATE TABLE IF NOT EXISTS `gz_admin_group` (
  `gid` tinyint(3) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(64) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '1',
  `remark` varchar(255) DEFAULT NULL,
  `option_group` text,
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`gid`),
  KEY `groupname` (`groupname`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
INSERT INTO `gz_admin_group`(`gid`,`groupname`,`active`,`remark`,`option_group`,`addtime`) VALUES ('3','测试员','1','测试员','s01+104+106+s03+601+602+604+605+606+609+6010+603+608+6011+s05+1001+1003+1004+1007+1008+1009+1010+1011+1013+1014+1021+s08+2301+2302+2303+2304+2305+2306+2308+2401+2413+2414+2415+s06+1601+1602+1603+1604+3202+3203+1701+1702+s010+2101+2102+s09+2601+2602+2603+2604+2605+2606+2607','1429189490');
INSERT INTO `gz_admin_group`(`gid`,`groupname`,`active`,`remark`,`option_group`,`addtime`) VALUES ('2','初级管理员','1','初级管理员','s01+s03+s04+s05+s06','1325610265');
INSERT INTO `gz_admin_group`(`gid`,`groupname`,`active`,`remark`,`option_group`,`addtime`) VALUES ('1','高级管理员','1','测试高级管理员2','s01+101+102+103+104+105+106+2701+2702+2801+2802+2901+2902+3501+3502+s02+301+302+303+501+502+503+504+505+506+s03+5001+601+602+604+605+606+609+6010+603+608+6011+s05+1003+1004+1007+1008+1009+1010+1011+1014+1021+3901+3801+4001+s08+2301+2302+2303+2304+2305+2306+2308+2401+2413+2414+2415+s06+1601+1602+1603+1604+3202+3203+1701+1702+3601+3602+s010+2101+2102+s09+2601+2602+2603+2604+2605+2606+2607','1325607090');
CREATE TABLE IF NOT EXISTS `gz_adminlog` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `optioner` varchar(64) NOT NULL,
  `optiondt` int(11) NOT NULL,
  `optionip` varchar(255) DEFAULT NULL,
  `optionlog` varchar(240) DEFAULT NULL,
  PRIMARY KEY (`gid`),
  KEY `optionip` (`optionip`),
  KEY `optiondt` (`optiondt`)
) ENGINE=MyISAM AUTO_INCREMENT=663 DEFAULT CHARSET=utf8;
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('662','admin999','1458894514','127.0.0.1','登录成功，登录管理员：admin999');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('661','admin999','1438491842','122.71.223.154','登录成功，登录管理员：admin999');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('660','admin999','1438404880','122.70.3.209','登录成功，登录管理员：admin999');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('659','admin999','1438324741','222.35.155.38','修改商品:测试，加入我们-goods_id:75');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('658','admin999','1438324723','222.35.155.38','登录成功，登录管理员：admin999');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('657','admin999','1438307878','222.35.155.38','登录成功，登录管理员：admin999');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('656','admin999','1438280293','123.66.243.188','修改广告：3');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('655','admin999','1438280282','123.66.243.188','修改广告：1');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('654','admin999','1438280264','123.66.243.188','修改广告：7');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('653','admin999','1438280241','123.66.243.188','修改广告：6');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('652','admin999','1438280227','123.66.243.188','修改广告：5');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('651','admin999','1438280189','123.66.243.188','修改广告：4');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('650','admin999','1438280175','123.66.243.188','修改广告：3');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('649','admin999','1438280157','123.66.243.188','修改广告：2');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('648','admin999','1438272032','123.66.243.188','修改管理员：admin999');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('647','admin999','1438269777','123.66.243.188','登录成功，登录管理员：admin999');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('646','admin999','1438269747','123.66.243.188','登录成功，登录管理员：admin999');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('645','admin999','1438248037','180.78.104.242','登录成功，登录管理员：admin999');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('644','admin999','1438237363','1.191.2.247','添加广告：1');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('643','admin999','1438237266','1.191.2.247','删除广告：ID为168');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('642','admin999','1438237251','1.191.2.247','添加广告：3');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('641','admin999','1438237221','1.191.2.247','添加广告：2');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('640','admin999','1438237170','1.191.2.247','删除广告：ID为170');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('639','admin999','1438237167','1.191.2.247','删除广告：ID为169');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('638','admin999','1438237151','1.191.2.247','添加广告：3');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('637','admin999','1438237128','1.191.2.247','添加广告：2');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('636','admin999','1438237114','1.191.2.247','添加广告：1');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('635','admin999','1438237101','1.191.2.247','删除广告：ID为167');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('634','admin999','1438237091','1.191.2.247','添加广告：1');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('633','admin999','1438236893','1.191.2.247','删除广告：ID为160');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('632','admin999','1438236860','1.191.2.247','修改商品分类状态:ID为=>591');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('631','admin999','1438236860','1.191.2.247','修改商品分类状态:ID为=>592');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('630','admin999','1438236859','1.191.2.247','修改商品分类状态:ID为=>590');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('629','admin999','1438236858','1.191.2.247','修改商品分类状态:ID为=>587');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('628','admin999','1438236847','1.191.2.247','修改商品分类状态:ID为=>589');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('627','admin999','1438236847','1.191.2.247','修改商品分类状态:ID为=>593');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('626','admin999','1438236847','1.191.2.247','修改商品分类状态:ID为=>589');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('625','admin999','1438236846','1.191.2.247','修改商品分类状态:ID为=>593');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('624','admin999','1438236844','1.191.2.247','修改商品分类状态:ID为=>589');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('623','admin999','1438236844','1.191.2.247','修改商品分类状态:ID为=>593');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('622','admin999','1438236797','1.191.2.247','修改广告：7');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('621','admin999','1438236773','1.191.2.247','添加商品分类:11');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('620','admin999','1438236747','1.191.2.247','修改广告：6');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('619','admin999','1438236732','1.191.2.247','修改广告：6');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('618','admin999','1438236665','1.191.2.247','修改广告：5');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('617','admin999','1438236631','1.191.2.247','修改广告：4');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('616','admin999','1438236612','1.191.2.247','修改广告：3');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('615','admin999','1438236483','1.191.2.247','修改广告：2');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('614','admin999','1438236371','1.191.2.247','添加广告：6');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('613','admin999','1438236316','1.191.2.247','修改广告：7');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('612','admin999','1438236269','1.191.2.247','添加广告：6');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('611','admin999','1438236256','1.191.2.247','添加广告：5');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('610','admin999','1438236243','1.191.2.247','添加广告：4');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('609','admin999','1438236229','1.191.2.247','添加广告：3');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('608','admin999','1438236216','1.191.2.247','添加广告：2');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('607','admin999','1438236204','1.191.2.247','添加广告：1');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('606','admin999','1438236163','1.191.2.247','登录成功，登录管理员：admin999');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('605','admin999','1438235971','123.66.243.188','删除广告：ID为159');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('604','admin999','1438235853','123.66.243.188','添加广告：11');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('603','admin999','1438235346','123.66.243.188','登录成功，登录管理员：admin999');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('602','admin999','1438235159','123.66.243.188','退出登录-2015-07-30 13:45:59-admin999');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('601','admin999','1438231451','123.66.243.188','修改商品分类状态:ID为=>590');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('600','admin999','1438231415','123.66.243.188','修改商品分类:土特产');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('599','admin999','1438231401','123.66.243.188','修改商品分类:微信信标');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('598','admin999','1438231383','123.66.243.188','修改商品分类:用户测试');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('597','admin999','1438231370','123.66.243.188','修改商品分类:数码产品');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('596','admin999','1438231341','123.66.243.188','修改商品分类:微信信标');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('595','admin999','1438231327','123.66.243.188','修改商品分类:家用电器');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('594','admin999','1438230398','123.66.243.188','修改系统设置=>网站SEO信息');
INSERT INTO `gz_adminlog`(`gid`,`optioner`,`optiondt`,`optionip`,`optionlog`) VALUES ('593','admin999','1438228646','123.66.243.188','管理员日记删除：ID为592,431,430,429,428,427,426,425,424');
CREATE TABLE IF NOT EXISTS `gz_article` (
  `article_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` smallint(5) NOT NULL DEFAULT '0',
  `article_title` varchar(255) DEFAULT NULL,
  `article_img` varchar(128) DEFAULT NULL,
  `article_logo` varchar(64) DEFAULT NULL,
  `content` longtext,
  `viewcount` int(6) NOT NULL DEFAULT '10',
  `author` varchar(30) DEFAULT NULL,
  `wangwang` varchar(64) DEFAULT NULL,
  `weixin` varchar(64) DEFAULT NULL,
  `meta_keys` varchar(255) DEFAULT NULL,
  `is_top` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `show_in_nav` enum('0','1') NOT NULL DEFAULT '0',
  `colorid` tinyint(200) NOT NULL DEFAULT '0' COMMENT '只用于模板分类的',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `uptime` int(11) NOT NULL DEFAULT '0',
  `meta_desc` varchar(500) DEFAULT NULL,
  `about` varchar(500) DEFAULT NULL,
  `packet` varchar(255) DEFAULT NULL,
  `vieworder` tinyint(3) NOT NULL DEFAULT '50',
  `province` mediumint(6) DEFAULT '0',
  `city` mediumint(6) DEFAULT '0',
  `district` mediumint(6) DEFAULT '0',
  `address` varchar(128) DEFAULT NULL,
  `s_ld` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`article_id`),
  KEY `cat_id` (`cat_id`),
  KEY `meta_keys` (`meta_keys`)
) ENGINE=MyISAM AUTO_INCREMENT=124 DEFAULT CHARSET=utf8;
INSERT INTO `gz_article`(`article_id`,`cat_id`,`article_title`,`article_img`,`article_logo`,`content`,`viewcount`,`author`,`wangwang`,`weixin`,`meta_keys`,`is_top`,`is_show`,`show_in_nav`,`colorid`,`addtime`,`uptime`,`meta_desc`,`about`,`packet`,`vieworder`,`province`,`city`,`district`,`address`,`s_ld`) VALUES ('122','72','代理价格说明','','','<p>代理价格说明</p>
<p>&nbsp;</p>
<p>代理价格说明</p>
<p>&nbsp;</p>
<p>代理价格说明</p>
<p>&nbsp;</p>
<p>代理价格说明</p>','10','','','','','0','1','0','0','1415551226','1415551226','','','','50','0','0','0','','');
INSERT INTO `gz_article`(`article_id`,`cat_id`,`article_title`,`article_img`,`article_logo`,`content`,`viewcount`,`author`,`wangwang`,`weixin`,`meta_keys`,`is_top`,`is_show`,`show_in_nav`,`colorid`,`addtime`,`uptime`,`meta_desc`,`about`,`packet`,`vieworder`,`province`,`city`,`district`,`address`,`s_ld`) VALUES ('121','79','1','photos/articlephoto/201310/13826457151382645715.jpg','','','10','','','','','0','1','0','0','1382645717','1382645717','','','','50','0','0','0','','');
INSERT INTO `gz_article`(`article_id`,`cat_id`,`article_title`,`article_img`,`article_logo`,`content`,`viewcount`,`author`,`wangwang`,`weixin`,`meta_keys`,`is_top`,`is_show`,`show_in_nav`,`colorid`,`addtime`,`uptime`,`meta_desc`,`about`,`packet`,`vieworder`,`province`,`city`,`district`,`address`,`s_ld`) VALUES ('120','79','1','photos/articlephoto/201310/13826455511382645551.jpg','','','10','','','','','0','1','0','0','1382645552','1382645552','','','','50','0','0','0','','');
INSERT INTO `gz_article`(`article_id`,`cat_id`,`article_title`,`article_img`,`article_logo`,`content`,`viewcount`,`author`,`wangwang`,`weixin`,`meta_keys`,`is_top`,`is_show`,`show_in_nav`,`colorid`,`addtime`,`uptime`,`meta_desc`,`about`,`packet`,`vieworder`,`province`,`city`,`district`,`address`,`s_ld`) VALUES ('118','72','公司介绍','','','fdasfsa','10','','','','','0','1','0','0','1340696668','1415289150','','','','50','0','0','0','','');
CREATE TABLE IF NOT EXISTS `gz_article_cate` (
  `cat_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(128) NOT NULL DEFAULT '',
  `cat_title_small` varchar(128) DEFAULT NULL,
  `cat_title` varchar(128) DEFAULT NULL,
  `cat_title2` varchar(128) NOT NULL DEFAULT '',
  `cat_img` varchar(128) DEFAULT NULL,
  `cat_about` varchar(255) DEFAULT NULL,
  `meta_keys` varchar(255) DEFAULT NULL,
  `meta_desc` text,
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `show_in_nav` tinyint(1) NOT NULL DEFAULT '0',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `vieworder` tinyint(3) NOT NULL DEFAULT '50',
  `grade` tinyint(4) NOT NULL DEFAULT '0',
  `type` varchar(20) DEFAULT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  `uptime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cat_id`),
  KEY `parent_id` (`parent_id`),
  KEY `meta_keys` (`meta_keys`),
  KEY `cat_name` (`cat_name`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;
INSERT INTO `gz_article_cate`(`cat_id`,`cat_name`,`cat_title_small`,`cat_title`,`cat_title2`,`cat_img`,`cat_about`,`meta_keys`,`meta_desc`,`parent_id`,`show_in_nav`,`is_show`,`vieworder`,`grade`,`type`,`addtime`,`uptime`) VALUES ('82','附近店铺','','','','','','','','0','0','1','50','0','new','1420343823','1420343823');
INSERT INTO `gz_article_cate`(`cat_id`,`cat_name`,`cat_title_small`,`cat_title`,`cat_title2`,`cat_img`,`cat_about`,`meta_keys`,`meta_desc`,`parent_id`,`show_in_nav`,`is_show`,`vieworder`,`grade`,`type`,`addtime`,`uptime`) VALUES ('81','我的晒单','','','','','','','','0','0','1','50','0','about','1415377584','1415377584');
INSERT INTO `gz_article_cate`(`cat_id`,`cat_name`,`cat_title_small`,`cat_title`,`cat_title2`,`cat_img`,`cat_about`,`meta_keys`,`meta_desc`,`parent_id`,`show_in_nav`,`is_show`,`vieworder`,`grade`,`type`,`addtime`,`uptime`) VALUES ('80','2013-10-27','','豆蔻','','','','','','0','0','1','50','0','case','1382644990','1382674326');
INSERT INTO `gz_article_cate`(`cat_id`,`cat_name`,`cat_title_small`,`cat_title`,`cat_title2`,`cat_img`,`cat_about`,`meta_keys`,`meta_desc`,`parent_id`,`show_in_nav`,`is_show`,`vieworder`,`grade`,`type`,`addtime`,`uptime`) VALUES ('79','2013-10-26','','兰蔻','','','','','','0','0','1','50','0','case','1382643607','1382674337');
INSERT INTO `gz_article_cate`(`cat_id`,`cat_name`,`cat_title_small`,`cat_title`,`cat_title2`,`cat_img`,`cat_about`,`meta_keys`,`meta_desc`,`parent_id`,`show_in_nav`,`is_show`,`vieworder`,`grade`,`type`,`addtime`,`uptime`) VALUES ('77','网站公告','','网站公告','','','','','','0','0','1','50','0','notice','1342924368','1342924368');
INSERT INTO `gz_article_cate`(`cat_id`,`cat_name`,`cat_title_small`,`cat_title`,`cat_title2`,`cat_img`,`cat_about`,`meta_keys`,`meta_desc`,`parent_id`,`show_in_nav`,`is_show`,`vieworder`,`grade`,`type`,`addtime`,`uptime`) VALUES ('72','单页文章','','单页文章','','','','单页文章','单页文章','0','0','1','50','0','customer','1334758262','1334758391');
CREATE TABLE IF NOT EXISTS `gz_attribute` (
  `attr_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `attr_name` varchar(60) NOT NULL DEFAULT '' COMMENT '属性名称',
  `attr_keys` varchar(64) NOT NULL DEFAULT '',
  `attr_is_select` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '展示类型',
  `input_values` text,
  `input_type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `is_show_addi` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是不是显示附加控件',
  `is_show_cart` enum('0','1') NOT NULL DEFAULT '1',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`attr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
INSERT INTO `gz_attribute`(`attr_id`,`attr_name`,`attr_keys`,`attr_is_select`,`input_values`,`input_type`,`is_show_addi`,`is_show_cart`,`sort_order`) VALUES ('3','颜色','yanse','2','黑色
白色
','2','0','1','0');
CREATE TABLE IF NOT EXISTS `gz_bonus_list` (
  `bonus_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `bonus_type_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `bonus_sn` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `used_time` int(10) unsigned NOT NULL DEFAULT '0',
  `order_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `emailed` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`bonus_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
INSERT INTO `gz_bonus_list`(`bonus_id`,`bonus_type_id`,`bonus_sn`,`user_id`,`used_time`,`order_id`,`emailed`) VALUES ('6','1','1000005602','36','0','0','0');
INSERT INTO `gz_bonus_list`(`bonus_id`,`bonus_type_id`,`bonus_sn`,`user_id`,`used_time`,`order_id`,`emailed`) VALUES ('5','1','1000007420','38','0','0','0');
INSERT INTO `gz_bonus_list`(`bonus_id`,`bonus_type_id`,`bonus_sn`,`user_id`,`used_time`,`order_id`,`emailed`) VALUES ('4','1','1000008553','27','0','0','0');
INSERT INTO `gz_bonus_list`(`bonus_id`,`bonus_type_id`,`bonus_sn`,`user_id`,`used_time`,`order_id`,`emailed`) VALUES ('3','1','1000006918','28','0','0','0');
INSERT INTO `gz_bonus_list`(`bonus_id`,`bonus_type_id`,`bonus_sn`,`user_id`,`used_time`,`order_id`,`emailed`) VALUES ('2','1','1000002176','23','1431679261','0','0');
INSERT INTO `gz_bonus_list`(`bonus_id`,`bonus_type_id`,`bonus_sn`,`user_id`,`used_time`,`order_id`,`emailed`) VALUES ('1','1','1000001558','1','0','0','0');
CREATE TABLE IF NOT EXISTS `gz_bonus_type` (
  `type_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `tname` varchar(128) DEFAULT NULL,
  `type_name` varchar(60) NOT NULL DEFAULT '',
  `type_money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `send_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `send_start_date` int(11) NOT NULL DEFAULT '0',
  `send_end_date` int(11) NOT NULL DEFAULT '0',
  `use_start_date` int(11) NOT NULL DEFAULT '0',
  `use_end_date` int(11) NOT NULL DEFAULT '0',
  `min_goods_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
INSERT INTO `gz_bonus_type`(`type_id`,`tname`,`type_name`,`type_money`,`send_type`,`send_start_date`,`send_end_date`,`use_start_date`,`use_end_date`,`min_goods_amount`) VALUES ('1','1000优惠卷','元旦赠送','1200.00','0','1413475200','1450368000','1447862400','1476892800','0.00');
CREATE TABLE IF NOT EXISTS `gz_brand` (
  `brand_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` smallint(5) DEFAULT '0',
  `p_fix` varchar(8) NOT NULL DEFAULT '',
  `brand_name` varchar(60) NOT NULL DEFAULT '',
  `brand_title` varchar(255) NOT NULL DEFAULT '' COMMENT '品牌的标题',
  `brand_logo` varchar(80) NOT NULL DEFAULT '',
  `brand_banner` varchar(128) NOT NULL DEFAULT '',
  `banner_width` int(4) NOT NULL DEFAULT '999',
  `banner_height` int(4) NOT NULL DEFAULT '200',
  `brand_desc` text,
  `meta_keys` varchar(255) NOT NULL DEFAULT '',
  `meta_desc` text,
  `site_url` varchar(255) NOT NULL DEFAULT '',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '50',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `index_show_count` tinyint(2) NOT NULL DEFAULT '10',
  `parent_id` smallint(5) NOT NULL DEFAULT '0',
  `is_promote` enum('0','1') NOT NULL DEFAULT '0',
  `is_hot` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`brand_id`),
  KEY `is_show` (`is_show`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;
INSERT INTO `gz_brand`(`brand_id`,`cat_id`,`p_fix`,`brand_name`,`brand_title`,`brand_logo`,`brand_banner`,`banner_width`,`banner_height`,`brand_desc`,`meta_keys`,`meta_desc`,`site_url`,`sort_order`,`is_show`,`index_show_count`,`parent_id`,`is_promote`,`is_hot`) VALUES ('56','0','L','龙者支付','龙者支付','','','999','200','','','','','50','1','10','0','0','0');
INSERT INTO `gz_brand`(`brand_id`,`cat_id`,`p_fix`,`brand_name`,`brand_title`,`brand_logo`,`brand_banner`,`banner_width`,`banner_height`,`brand_desc`,`meta_keys`,`meta_desc`,`site_url`,`sort_order`,`is_show`,`index_show_count`,`parent_id`,`is_promote`,`is_hot`) VALUES ('55','0','A','艾奥尼克','艾奥尼克','','','999','200','','','','','50','1','10','0','0','0');
CREATE TABLE IF NOT EXISTS `gz_category_sub_goods` (
  `sid` int(7) NOT NULL AUTO_INCREMENT,
  `cat_id` int(3) NOT NULL,
  `goods_id` int(10) NOT NULL,
  PRIMARY KEY (`sid`),
  KEY `cat_id` (`cat_id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_comment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_value` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `email` varchar(60) NOT NULL DEFAULT '',
  `user_name` varchar(60) NOT NULL DEFAULT '',
  `pics` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `comment_rank` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `goods_rand` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '最大5',
  `shopping_rand` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '最大5',
  `saleafter_rand` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '最大5',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  `up_time` int(11) NOT NULL DEFAULT '0',
  `ip_address` varchar(15) NOT NULL DEFAULT '',
  `ip_form` varchar(32) NOT NULL DEFAULT '',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `is_delete` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_id`),
  KEY `parent_id` (`parent_id`),
  KEY `id_value` (`id_value`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_freecatalog` (
  `mes_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL DEFAULT '',
  `user_name` varchar(60) NOT NULL DEFAULT '',
  `user_no` varchar(64) NOT NULL DEFAULT '',
  `birthday` varchar(64) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `ip_address` varchar(15) NOT NULL DEFAULT '',
  `ip_from` varchar(15) NOT NULL DEFAULT '',
  `address` varchar(64) NOT NULL DEFAULT '',
  `mobile` varchar(32) NOT NULL DEFAULT '',
  `sex` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '保密 男 女',
  `province` int(5) NOT NULL DEFAULT '0',
  `city` int(5) NOT NULL DEFAULT '0',
  `district` int(5) NOT NULL DEFAULT '0',
  `postcode` int(6) NOT NULL DEFAULT '0',
  `dayphone` varchar(32) NOT NULL DEFAULT '',
  `nightphone` varchar(32) NOT NULL DEFAULT '',
  `dir_ids` varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`mes_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_friend_link` (
  `link_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_logo` varchar(255) NOT NULL DEFAULT '',
  `width` float(5,2) DEFAULT NULL,
  `height` float(5,2) DEFAULT NULL,
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_goods` (
  `goods_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL DEFAULT '0' COMMENT '供应商ID',
  `cat_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `goods_sn` varchar(60) NOT NULL DEFAULT '',
  `goods_bianhao` varchar(32) NOT NULL DEFAULT '',
  `goods_name` varchar(120) NOT NULL DEFAULT '',
  `click_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '页面查看次数',
  `brand_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `goods_number` smallint(5) unsigned NOT NULL DEFAULT '1000',
  `warn_number` tinyint(3) NOT NULL DEFAULT '1' COMMENT '库存警告数',
  `goods_weight` decimal(10,3) unsigned NOT NULL DEFAULT '0.000',
  `goods_unit` varchar(32) DEFAULT NULL COMMENT '商品单位',
  `takemoney1` decimal(10,2) DEFAULT '0.00' COMMENT '普通分销佣金',
  `takemoney2` decimal(10,2) DEFAULT '0.00' COMMENT '高级分销提成',
  `takemoney3` decimal(10,2) DEFAULT '0.00' COMMENT '高级特权分销',
  `market_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '供应价',
  `shop_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '零售价',
  `pifa_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '批发价',
  `promote_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `promote_start_date` int(11) unsigned NOT NULL DEFAULT '0',
  `promote_end_date` int(11) unsigned NOT NULL DEFAULT '0',
  `is_qianggou` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否抢购',
  `qianggou_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '抢购价',
  `qianggou_start_date` int(11) NOT NULL DEFAULT '0',
  `qianggou_end_date` int(11) NOT NULL DEFAULT '0',
  `meta_keys` varchar(255) NOT NULL DEFAULT '',
  `meta_desc` varchar(255) NOT NULL DEFAULT '',
  `goods_brief` text COMMENT '商品规格',
  `goods_desc` text,
  `sort_desc` varchar(255) NOT NULL DEFAULT '',
  `goods_thumb` varchar(255) NOT NULL DEFAULT '',
  `goods_img` varchar(255) NOT NULL DEFAULT '',
  `original_img` varchar(255) NOT NULL DEFAULT '',
  `is_on_sale` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `is_alone_sale` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否是赠品0:赠品，1：普通商品出售',
  `is_shipping` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  `sort_order` smallint(4) unsigned NOT NULL DEFAULT '100',
  `is_delete` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_best` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_new` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_hot` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_promote` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_jifen` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否以积分销售',
  `is_virtual` enum('0','1') DEFAULT '0' COMMENT '虚拟标记',
  `need_jifen` int(8) NOT NULL DEFAULT '0',
  `last_update` int(10) unsigned NOT NULL DEFAULT '0',
  `is_check` enum('0','1') NOT NULL DEFAULT '0',
  `sale_count` int(5) NOT NULL DEFAULT '0',
  `buy_more_best` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`goods_id`),
  KEY `goods_sn` (`goods_sn`),
  KEY `cat_id` (`cat_id`),
  KEY `last_update` (`last_update`),
  KEY `brand_id` (`brand_id`),
  KEY `goods_weight` (`goods_weight`),
  KEY `promote_end_date` (`promote_end_date`),
  KEY `promote_start_date` (`promote_start_date`),
  KEY `goods_number` (`goods_number`),
  KEY `sort_order` (`sort_order`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;
INSERT INTO `gz_goods`(`goods_id`,`uid`,`cat_id`,`goods_sn`,`goods_bianhao`,`goods_name`,`click_count`,`brand_id`,`goods_number`,`warn_number`,`goods_weight`,`goods_unit`,`takemoney1`,`takemoney2`,`takemoney3`,`market_price`,`shop_price`,`pifa_price`,`promote_price`,`promote_start_date`,`promote_end_date`,`is_qianggou`,`qianggou_price`,`qianggou_start_date`,`qianggou_end_date`,`meta_keys`,`meta_desc`,`goods_brief`,`goods_desc`,`sort_desc`,`goods_thumb`,`goods_img`,`original_img`,`is_on_sale`,`is_alone_sale`,`is_shipping`,`add_time`,`sort_order`,`is_delete`,`is_best`,`is_new`,`is_hot`,`is_promote`,`is_jifen`,`is_virtual`,`need_jifen`,`last_update`,`is_check`,`sale_count`,`buy_more_best`) VALUES ('75','0','589','GZFH000075','','测试，加入我们','0','55','1000','1','0.000','件','0.01','0.02','0.03','1.00','1.00','0.01','0.00','0','0','0','0.00','0','0','1111111','1111111111111111111','','<p style="text-align:center;">
	<br />
</p>
<p>
	<img src="http://m.020369.com/Public/Plugin/umeditor/php/upload/20150621/14348822229475.jpg" /> 
</p>
<p>
	<img src="http://m.020369.com/Public/Plugin/umeditor/php/upload/20150621/14348822241867.jpg" /> 
</p>
<p>
	<img src="http://m.020369.com/Public/Plugin/umeditor/php/upload/20150621/14348822264712.jpg" /> 
</p>
<p>
	<br />
</p>
<p>
	<span id="_baidu_bookmark_start_2" style="line-height:0px;">‍</span> 
</p>','111111111','photos/wx020369com/goods/201507/thumb_s/14382259301438225930.jpg','photos/wx020369com/goods/201507/thumb_b/14382259301438225930.jpg','photos/wx020369com/goods/201507/14382259301438225930.jpg','1','1','0','1438225675','100','0','1','1','1','0','0','0','0','1438324741','1','0','');
INSERT INTO `gz_goods`(`goods_id`,`uid`,`cat_id`,`goods_sn`,`goods_bianhao`,`goods_name`,`click_count`,`brand_id`,`goods_number`,`warn_number`,`goods_weight`,`goods_unit`,`takemoney1`,`takemoney2`,`takemoney3`,`market_price`,`shop_price`,`pifa_price`,`promote_price`,`promote_start_date`,`promote_end_date`,`is_qianggou`,`qianggou_price`,`qianggou_start_date`,`qianggou_end_date`,`meta_keys`,`meta_desc`,`goods_brief`,`goods_desc`,`sort_desc`,`goods_thumb`,`goods_img`,`original_img`,`is_on_sale`,`is_alone_sale`,`is_shipping`,`add_time`,`sort_order`,`is_delete`,`is_best`,`is_new`,`is_hot`,`is_promote`,`is_jifen`,`is_virtual`,`need_jifen`,`last_update`,`is_check`,`sale_count`,`buy_more_best`) VALUES ('74','0','589','11111-1','TA500','美国艾奥尼克（ionicpro）空气净化器， TA500静音除雾霾PM2.5','0','55','10000','10','3500.000','台','300.00','400.00','500.00','2980.00','2980.00','2199.00','0.00','0','0','0','0.00','0','0','','','','<p style="text-align:center;">
	<img src="http://m.020369.com/Public/Plugin/umeditor/php/upload/20150619/14346453766465.jpg" /> 
</p>
<p style="text-align:center;">
	<img src="http://m.020369.com/Public/Plugin/umeditor/php/upload/20150619/14346453804246.jpg" /> 
</p>
<p>
	<br />
</p>','','photos/wx020369com/goods/201507/thumb_s/14381943621438194362.jpg','photos/wx020369com/goods/201507/thumb_b/14381943621438194362.jpg','photos/wx020369com/goods/201507/14381943621438194362.jpg','1','1','0','1431588943','100','0','1','1','1','0','0','0','0','1438194373','1','0','');
INSERT INTO `gz_goods`(`goods_id`,`uid`,`cat_id`,`goods_sn`,`goods_bianhao`,`goods_name`,`click_count`,`brand_id`,`goods_number`,`warn_number`,`goods_weight`,`goods_unit`,`takemoney1`,`takemoney2`,`takemoney3`,`market_price`,`shop_price`,`pifa_price`,`promote_price`,`promote_start_date`,`promote_end_date`,`is_qianggou`,`qianggou_price`,`qianggou_start_date`,`qianggou_end_date`,`meta_keys`,`meta_desc`,`goods_brief`,`goods_desc`,`sort_desc`,`goods_thumb`,`goods_img`,`original_img`,`is_on_sale`,`is_alone_sale`,`is_shipping`,`add_time`,`sort_order`,`is_delete`,`is_best`,`is_new`,`is_hot`,`is_promote`,`is_jifen`,`is_virtual`,`need_jifen`,`last_update`,`is_check`,`sale_count`,`buy_more_best`) VALUES ('73','0','587','201235666','23123','龙者支付、4G双卡双待手机pos刷卡一体机、 移动金融智能终端','0','0','10000','10','300.000','台','100.00','200.00','300.00','2999.00','2999.00','1999.00','0.00','0','0','0','0.00','0','0','','','','<p align="left">
	<span style="color:#CC0000;"><span style="font-size:18px;"><strong><span style="color:black;font-family:宋体;font-size:13.5pt;">&nbsp;&nbsp;&nbsp; 在手机电话功能的基础上集合金融刷卡器，不受时间和环境的限制，全天任何时候都可以进行金融操作，为银行卡持卡人提供面向个人、家庭、商户和行业应用支付需求的一种自助刷卡支付新业务，实现实时处理，资金实时到账，为您的工作和生活保驾护航。</span><span style="color:black;font-size:13.5pt;"></span></strong></span></span> 
</p>
<p align="left">
	<span style="color:#CC0000;"><span style="font-size:18px;"><strong><span style="color:black;font-size:13.5pt;"><span style="font-family:&quot;&quot;;">&nbsp;</span></span></strong></span></span> 
</p>
<p align="left">
	<span style="color:#CC0000;"><span style="font-size:18px;"><strong><span style="color:black;font-size:13.5pt;"><span style="font-family:&quot;&quot;;"></span>1.<span style="font-family:&quot;&quot;;"></span><span style="font-family:&quot;&quot;;"></span></span><span style="color:black;font-family:宋体;font-size:13.5pt;">不受时间、空间限制，随时、随地、随心所欲完成支付。</span><span style="color:black;font-size:13.5pt;"></span></strong></span></span> 
</p>
<p align="left">
	<span style="color:#CC0000;"><span style="font-size:18px;"><strong><span style="color:black;font-size:13.5pt;"><span style="font-family:&quot;&quot;;">&nbsp;</span></span></strong></span></span> 
</p>
<p align="left">
	<span style="color:#CC0000;"><span style="font-size:18px;"><strong><span style="color:black;font-size:13.5pt;">2.</span><span style="color:black;font-family:宋体;font-size:13.5pt;">移动支付终端每台机配置一张加密卡</span><span style="color:black;font-size:13.5pt;"><span style="font-family:&quot;&quot;;">,</span></span><span style="color:black;font-family:宋体;font-size:13.5pt;">加上一机一密，比网银、手机银行等支付方式更安全。</span><span style="color:black;font-size:13.5pt;"></span></strong></span></span> 
</p>
<p align="left">
	<span style="color:#CC0000;"><span style="font-size:18px;"><strong><span style="color:black;font-size:13.5pt;"><span style="font-family:&quot;&quot;;">&nbsp;</span></span></strong></span></span> 
</p>
<p align="left">
	<span style="color:#CC0000;"><span style="font-size:18px;"><strong><span style="color:black;font-size:13.5pt;"><span style="font-family:&quot;&quot;;">&nbsp;</span></span><span style="color:black;font-size:13.5pt;">3.</span><span style="color:black;font-family:宋体;font-size:13.5pt;">参照人民银行及银联的收费标准。0.49% 
、0.78%&nbsp; 35封顶三种费率</span></strong></span></span> 
</p>
<p align="left">
	<span style="color:#CC0000;"><span style="font-size:18px;"><strong><span style="color:black;font-size:13.5pt;"><span style="font-family:&quot;&quot;;">&nbsp;</span></span></strong></span></span> 
</p>
<p align="left">
	<span style="color:#CC0000;"><span style="font-size:18px;"><strong><span style="color:black;font-size:13.5pt;">4.</span><span style="color:black;font-family:宋体;font-size:13.5pt;">实现了</span><span style="color:black;font-size:13.5pt;"><span style="font-family:&quot;&quot;;">T+0</span></span><span style="color:black;font-family:宋体;font-size:13.5pt;">，交易即时完成，资金实时到帐。是目前最便捷的转帐工具之一</span><span style="color:black;font-size:13.5pt;"></span></strong></span></span> 
</p>
<p align="left">
	<span style="color:#CC0000;"><span style="font-size:18px;"><strong><span style="color:black;font-size:13.5pt;"><span style="font-family:&quot;&quot;;">&nbsp;</span></span></strong></span></span> 
</p>
<p align="left">
	<span style="color:#CC0000;"><span style="font-size:18px;"><strong><span style="color:black;font-size:13.5pt;"><span style="font-family:&quot;&quot;;">&nbsp;</span></span><span style="color:black;font-family:宋体;font-size:13.5pt;">如果从此不再跑银行，也不用排队……</span><span style="color:black;font-size:13.5pt;"></span></strong></span></span> 
</p>
<p align="left">
	<span style="color:#CC0000;"><span style="font-size:18px;"><strong><span style="color:black;font-family:宋体;font-size:13.5pt;">如果银行可以如影随形地跟着我，随时随地为我服务……</span><span style="color:black;font-size:13.5pt;"></span></strong></span></span> 
</p>
<p align="left">
	<span style="color:#CC0000;"><span style="font-size:18px;"><strong><span style="color:black;font-family:宋体;font-size:13.5pt;">如果</span><span style="color:black;font-size:13.5pt;"><span style="font-family:&quot;&quot;;">ATM</span></span><span style="color:black;font-family:宋体;font-size:13.5pt;">机可以缩小，放进我自己的口袋……</span><span style="color:black;font-size:13.5pt;"></span></strong></span></span> 
</p>
<p align="left">
	<span style="color:#CC0000;"><span style="font-size:18px;"><strong><span style="color:black;font-family:宋体;font-size:13.5pt;">如果我，想付就付……&nbsp; 服务热线：400-0899-512</span></strong></span></span> 
</p>
<p align="left">
	<span style="color:#CC0000;"><span style="font-size:18px;"><strong><span style="color:black;font-family:宋体;font-size:13.5pt;"><br />
</span></strong></span></span> 
</p>
<p>
	<img src="http://m.020369.com/Public/Plugin/umeditor/php/upload/20150711/14365846687897.jpg" /> 
</p>
<p>
	<img src="http://m.020369.com/Public/Plugin/umeditor/php/upload/20150711/14365846825743.jpg" /> 
</p>
<p>
	<img src="http://m.020369.com/Public/Plugin/umeditor/php/upload/20150711/1436584700919.jpg" /> 
</p>
<p>
	<img src="http://m.020369.com/Public/Plugin/umeditor/php/upload/20150711/14365847186468.jpg" /> 
</p>
<p align="left">
	<span style="color:#CC0000;"><span style="font-size:18px;"><strong><span style="color:black;font-family:宋体;font-size:13.5pt;"><br />
</span></strong></span></span> 
</p>
<p align="left">
	<br />
</p>','','photos/wx020369com/goods/201507/thumb_s/14381944121438194412.jpg','photos/wx020369com/goods/201507/thumb_b/14381944121438194412.jpg','photos/wx020369com/goods/201507/14381944121438194412.jpg','1','1','0','1431588943','100','0','1','1','1','0','0','0','0','1438194505','1','0','');
INSERT INTO `gz_goods`(`goods_id`,`uid`,`cat_id`,`goods_sn`,`goods_bianhao`,`goods_name`,`click_count`,`brand_id`,`goods_number`,`warn_number`,`goods_weight`,`goods_unit`,`takemoney1`,`takemoney2`,`takemoney3`,`market_price`,`shop_price`,`pifa_price`,`promote_price`,`promote_start_date`,`promote_end_date`,`is_qianggou`,`qianggou_price`,`qianggou_start_date`,`qianggou_end_date`,`meta_keys`,`meta_desc`,`goods_brief`,`goods_desc`,`sort_desc`,`goods_thumb`,`goods_img`,`original_img`,`is_on_sale`,`is_alone_sale`,`is_shipping`,`add_time`,`sort_order`,`is_delete`,`is_best`,`is_new`,`is_hot`,`is_promote`,`is_jifen`,`is_virtual`,`need_jifen`,`last_update`,`is_check`,`sale_count`,`buy_more_best`) VALUES ('72','0','587','GZFH000072','','1','0','0','10','1','0.000','','0.00','0.00','0.00','11.00','11.00','11.00','0.00','0','0','0','0.00','0','0','','','','1111<br />','1','','','','1','1','0','1431320811','100','1','0','0','0','0','0','0','0','0','1','0','');
CREATE TABLE IF NOT EXISTS `gz_goods_attr` (
  `goods_attr_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `attr_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `attr_value` text NOT NULL,
  `attr_addi` varchar(255) NOT NULL DEFAULT '' COMMENT '附加的东西',
  PRIMARY KEY (`goods_attr_id`),
  KEY `goods_id` (`goods_id`),
  KEY `attr_id` (`attr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_goods_cache_list` (
  `goods_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `goods_cate` varchar(250) NOT NULL DEFAULT '',
  `goods_cate_sub` varchar(128) NOT NULL DEFAULT '',
  `goods_cate_all` text NOT NULL,
  `brand_name` varchar(64) NOT NULL DEFAULT '',
  `cat_id` smallint(5) NOT NULL DEFAULT '0',
  `brand_id` smallint(4) NOT NULL DEFAULT '0',
  `goods_bianhao` varchar(32) NOT NULL DEFAULT '',
  `goods_sn` varchar(64) NOT NULL DEFAULT '',
  `goods_name` varchar(120) NOT NULL DEFAULT '',
  `goods_weight` decimal(10,3) unsigned NOT NULL DEFAULT '0.000',
  `goods_number` smallint(5) NOT NULL DEFAULT '1000',
  `warn_number` tinyint(3) NOT NULL DEFAULT '10',
  `goods_unit` varchar(32) DEFAULT NULL COMMENT '商品单位',
  `market_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '供应价',
  `shop_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '零售价',
  `pifa_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '批发价',
  `meta_title` varchar(255) NOT NULL DEFAULT '',
  `meta_keys` varchar(255) NOT NULL DEFAULT '',
  `meta_desc` varchar(255) NOT NULL DEFAULT '',
  `goods_brief` text COMMENT '商品规格',
  `goods_desc` text,
  `sort_desc` varchar(255) NOT NULL DEFAULT '',
  `goods_thumb` varchar(255) NOT NULL DEFAULT '',
  `goods_img` varchar(255) NOT NULL DEFAULT '',
  `original_img` varchar(255) NOT NULL DEFAULT '',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  `is_zhuanyi` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`goods_id`),
  KEY `goods_sn` (`goods_cate`),
  KEY `goods_weight` (`goods_weight`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_goods_cache_site` (
  `gcid` tinyint(3) NOT NULL AUTO_INCREMENT,
  `url_preg` varchar(255) NOT NULL DEFAULT '',
  `goods_cate_preg` varchar(255) NOT NULL,
  `sitename` varchar(128) NOT NULL DEFAULT '',
  `meta_title` varchar(255) NOT NULL DEFAULT '',
  `meta_desc` varchar(255) NOT NULL DEFAULT '',
  `meta_keys` varchar(255) NOT NULL DEFAULT '',
  `goods_preg_1` varchar(250) DEFAULT NULL,
  `goods_preg_2` varchar(250) DEFAULT NULL,
  `goods_preg_3` varchar(250) DEFAULT NULL,
  `goods_preg_4` varchar(250) DEFAULT NULL,
  `goods_preg_5` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`gcid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
INSERT INTO `gz_goods_cache_site`(`gcid`,`url_preg`,`goods_cate_preg`,`sitename`,`meta_title`,`meta_desc`,`meta_keys`,`goods_preg_1`,`goods_preg_2`,`goods_preg_3`,`goods_preg_4`,`goods_preg_5`) VALUES ('6','http://www.xyh-qd.com/research.asp?page=%d&searchkey=&b=&e=&action=&selectname=&anclassid=0&jiage=','#<a href=category\.asp\?id=(.*) ><img src#iUs','同福食品特产批发网','#<title>(.*)</title>#iUs','','','#<div align="left"><a href=(.*)</div></td>#iUs','#<font color="\#FF6600" size="3"><strong>(.*)</strong></font>#iUs','#<font  class="PriceColor">(.*)</font>#iUs','#<table width=300 height=300 border=0 align="center" cellpadding=0 cellspacing=0>(.*)</table>#iUs','#<div align="left" class="td14">(.*)</div>#iUs');
INSERT INTO `gz_goods_cache_site`(`gcid`,`url_preg`,`goods_cate_preg`,`sitename`,`meta_title`,`meta_desc`,`meta_keys`,`goods_preg_1`,`goods_preg_2`,`goods_preg_3`,`goods_preg_4`,`goods_preg_5`) VALUES ('4','http://www.86fsp.com/search.asp?CurrentPage=%d','#<input type="text" value="1" id="(.*)" name="amount"#iUs','中国副食品批发网','','','','','','','','');
INSERT INTO `gz_goods_cache_site`(`gcid`,`url_preg`,`goods_cate_preg`,`sitename`,`meta_title`,`meta_desc`,`meta_keys`,`goods_preg_1`,`goods_preg_2`,`goods_preg_3`,`goods_preg_4`,`goods_preg_5`) VALUES ('3','http://www.donghesz.com/research.asp?page=%d&anclassid=0','#<td>商品名称：(.*)</td>#iUs','辉华食品批发','#<title>(.*)</title>#iUs','','','#&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(.*)</td>#iUs','#&nbsp;<b><font color="\#FF0000">(.*)</font></b>#iUs','#<font class="PriceColor">(.*)</font>#iUs','#<td ><table width="100%" border="0" cellspacing="0" cellpadding="0">(.*)</table></div>#iUs','#商品品牌：</td>(.*)</tr>#iUs');
INSERT INTO `gz_goods_cache_site`(`gcid`,`url_preg`,`goods_cate_preg`,`sitename`,`meta_title`,`meta_desc`,`meta_keys`,`goods_preg_1`,`goods_preg_2`,`goods_preg_3`,`goods_preg_4`,`goods_preg_5`) VALUES ('2','http://www.bjxydb.com/Price.asp?page=%d','#FFFFFF"><a href=(.*) target="_blank"> 查看详细</a></td>#iUs','百佳食品批发有限公司','#<title>(.*)</title>#iUs','#<meta name="description" content="(.*)">#iUs','#<meta name="keywords" content="(.*)">#iUs','#<div align="left"><a href=index.asp>(.*)</div>#iUs','#<font color="\#FF6600" size="3"><strong>(.*)</strong></font>#iUs','#<font color="\#FF0000" face="Georgia" size="4"><b>(.*)</b></font>#iUs','#return false;"> <img src="(.*)" width=300 border=0 alt#iUs','#<TABLE cellSpacing=0 cellPadding=10 width="98%" align=center border=0>(.*)</table>#iUs');
INSERT INTO `gz_goods_cache_site`(`gcid`,`url_preg`,`goods_cate_preg`,`sitename`,`meta_title`,`meta_desc`,`meta_keys`,`goods_preg_1`,`goods_preg_2`,`goods_preg_3`,`goods_preg_4`,`goods_preg_5`) VALUES ('1','http://www.21ej.com/search.asp?page=%d','#<div class="productimg"><a href="(.*)"><img#iUs','21E姐商城','#<title>(.*)</title>#iUs','#<meta name="description" content="(.*)" />#iUs','#<meta name="keywords" content="(.*)" />#iUs','#<td width="98%" class="12font" align="left">(.*)</td>#iUs','#class="STYLE1 STYLE4">(.*)</td>#iUs','#<td align="left" valign="top" class="p9black">(.*)</td>#iUs','#<img src="(.*)" width=160  height=160 border=0>#iUs','#<DIV class=O style="mso-char-wrap: 1; mso-kinsoku-overflow: 1" v:shape="_x0000_s1026">(.*)</td> ');
CREATE TABLE IF NOT EXISTS `gz_goods_cache_url` (
  `gcuid` smallint(5) NOT NULL AUTO_INCREMENT,
  `gcid` tinyint(3) NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL DEFAULT '',
  `active` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`gcuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_goods_cate` (
  `cat_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(128) NOT NULL DEFAULT '',
  `cat_img` varchar(128) DEFAULT NULL,
  `cat_url` varchar(128) DEFAULT NULL,
  `cat_title` varchar(128) DEFAULT NULL,
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `cat_desc` varchar(255) NOT NULL DEFAULT '',
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `sort_order` tinyint(1) unsigned NOT NULL DEFAULT '50',
  `template_file` varchar(50) NOT NULL DEFAULT '',
  `measure_unit` varchar(15) NOT NULL DEFAULT '',
  `show_in_nav` tinyint(1) NOT NULL DEFAULT '0',
  `style` varchar(150) NOT NULL DEFAULT '',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `is_index` tinyint(1) DEFAULT '0',
  `grade` tinyint(4) NOT NULL DEFAULT '0',
  `filter_attr` varchar(255) NOT NULL DEFAULT '0',
  `type` varchar(20) NOT NULL DEFAULT 'parent_cate',
  `ctype` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`cat_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=594 DEFAULT CHARSET=utf8;
INSERT INTO `gz_goods_cate`(`cat_id`,`cat_name`,`cat_img`,`cat_url`,`cat_title`,`keywords`,`cat_desc`,`parent_id`,`sort_order`,`template_file`,`measure_unit`,`show_in_nav`,`style`,`is_show`,`is_index`,`grade`,`filter_attr`,`type`,`ctype`) VALUES ('593','11','','','11','','','0','50','','','0','','0','0','0','0','parent_cate','');
INSERT INTO `gz_goods_cate`(`cat_id`,`cat_name`,`cat_img`,`cat_url`,`cat_title`,`keywords`,`cat_desc`,`parent_id`,`sort_order`,`template_file`,`measure_unit`,`show_in_nav`,`style`,`is_show`,`is_index`,`grade`,`filter_attr`,`type`,`ctype`) VALUES ('592','微信信标','','','','','','0','4','','','0','','0','1','0','0','parent_cate','');
INSERT INTO `gz_goods_cate`(`cat_id`,`cat_name`,`cat_img`,`cat_url`,`cat_title`,`keywords`,`cat_desc`,`parent_id`,`sort_order`,`template_file`,`measure_unit`,`show_in_nav`,`style`,`is_show`,`is_index`,`grade`,`filter_attr`,`type`,`ctype`) VALUES ('591','土特产','','','','','','0','5','','','0','','0','1','0','0','parent_cate','');
INSERT INTO `gz_goods_cate`(`cat_id`,`cat_name`,`cat_img`,`cat_url`,`cat_title`,`keywords`,`cat_desc`,`parent_id`,`sort_order`,`template_file`,`measure_unit`,`show_in_nav`,`style`,`is_show`,`is_index`,`grade`,`filter_attr`,`type`,`ctype`) VALUES ('590','用户测试','','','','','','0','3','','','0','','0','1','0','0','parent_cate','');
INSERT INTO `gz_goods_cate`(`cat_id`,`cat_name`,`cat_img`,`cat_url`,`cat_title`,`keywords`,`cat_desc`,`parent_id`,`sort_order`,`template_file`,`measure_unit`,`show_in_nav`,`style`,`is_show`,`is_index`,`grade`,`filter_attr`,`type`,`ctype`) VALUES ('589','家用电器','photos/wx020369com/cateimg/201507/14382211831438221183.jpg','','家用电器','1','空气净化器','0','1','','','0','','0','1','0','0','parent_cate','');
INSERT INTO `gz_goods_cate`(`cat_id`,`cat_name`,`cat_img`,`cat_url`,`cat_title`,`keywords`,`cat_desc`,`parent_id`,`sort_order`,`template_file`,`measure_unit`,`show_in_nav`,`style`,`is_show`,`is_index`,`grade`,`filter_attr`,`type`,`ctype`) VALUES ('587','数码产品','photos/img/lou.png','','','','可以刷卡的4G手机','0','2','','','0','','0','1','0','0','parent_cate','');
CREATE TABLE IF NOT EXISTS `gz_goods_collect` (
  `rec_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `add_time` int(11) unsigned NOT NULL DEFAULT '0',
  `is_attention` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rec_id`),
  KEY `user_id` (`user_id`),
  KEY `goods_id` (`goods_id`),
  KEY `is_attention` (`is_attention`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
INSERT INTO `gz_goods_collect`(`rec_id`,`user_id`,`goods_id`,`add_time`,`is_attention`) VALUES ('3','87','64','1415548469','0');
CREATE TABLE IF NOT EXISTS `gz_goods_gallery` (
  `img_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `img_url` varchar(255) NOT NULL DEFAULT '',
  `img_desc` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`img_id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_goods_gift` (
  `gifid` int(6) NOT NULL AUTO_INCREMENT,
  `goods_id` int(8) NOT NULL DEFAULT '0',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`gifid`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_goods_groupbuy` (
  `group_id` int(5) NOT NULL AUTO_INCREMENT,
  `start_time` int(11) NOT NULL DEFAULT '0',
  `end_time` int(11) NOT NULL DEFAULT '0',
  `points` int(5) NOT NULL DEFAULT '0',
  `group_name` varchar(255) NOT NULL DEFAULT '',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `desc` text NOT NULL,
  `active` enum('0','1') NOT NULL,
  `price` float(6,2) DEFAULT '0.00',
  `qingdan` text,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
INSERT INTO `gz_goods_groupbuy`(`group_id`,`start_time`,`end_time`,`points`,`group_name`,`goods_id`,`desc`,`active`,`price`,`qingdan`) VALUES ('3','1384012800','1482940800','0','单炒单水撑电磁小炒炉','68','团购描述','1','70.00','<p>颜色：红色 &nbsp; &nbsp; &nbsp; &nbsp;编号：23223</p>
<p>厂家：广东</p>');
INSERT INTO `gz_goods_groupbuy`(`group_id`,`start_time`,`end_time`,`points`,`group_name`,`goods_id`,`desc`,`active`,`price`,`qingdan`) VALUES ('2','1384128677','1510878734','50','团购模块已经上线了','65','团购模块已经上线了','1','44.00','');
CREATE TABLE IF NOT EXISTS `gz_goods_groupbuy_price` (
  `gpid` int(6) NOT NULL AUTO_INCREMENT,
  `group_id` int(7) NOT NULL DEFAULT '0',
  `number` tinyint(3) NOT NULL DEFAULT '1',
  `price` float(6,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`gpid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
INSERT INTO `gz_goods_groupbuy_price`(`gpid`,`group_id`,`number`,`price`) VALUES ('14','3','10','100.00');
INSERT INTO `gz_goods_groupbuy_price`(`gpid`,`group_id`,`number`,`price`) VALUES ('12','4','10','8.00');
INSERT INTO `gz_goods_groupbuy_price`(`gpid`,`group_id`,`number`,`price`) VALUES ('11','4','5','10.00');
INSERT INTO `gz_goods_groupbuy_price`(`gpid`,`group_id`,`number`,`price`) VALUES ('7','1','15','90.00');
INSERT INTO `gz_goods_groupbuy_price`(`gpid`,`group_id`,`number`,`price`) VALUES ('6','2','9','100.00');
INSERT INTO `gz_goods_groupbuy_price`(`gpid`,`group_id`,`number`,`price`) VALUES ('5','2','6','110.00');
INSERT INTO `gz_goods_groupbuy_price`(`gpid`,`group_id`,`number`,`price`) VALUES ('4','2','3','120.00');
INSERT INTO `gz_goods_groupbuy_price`(`gpid`,`group_id`,`number`,`price`) VALUES ('2','1','10','100.00');
INSERT INTO `gz_goods_groupbuy_price`(`gpid`,`group_id`,`number`,`price`) VALUES ('1','1','5','110.00');
CREATE TABLE IF NOT EXISTS `gz_goods_keyword` (
  `kid` int(6) NOT NULL AUTO_INCREMENT,
  `goods_id` int(7) NOT NULL DEFAULT '0',
  `keyword` varchar(64) NOT NULL DEFAULT '',
  `tcount` int(5) NOT NULL DEFAULT '0',
  `p_fix` varchar(8) NOT NULL DEFAULT '',
  `is_show` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`kid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
INSERT INTO `gz_goods_keyword`(`kid`,`goods_id`,`keyword`,`tcount`,`p_fix`,`is_show`) VALUES ('2','75','1111111','0','NAL','1');
INSERT INTO `gz_goods_keyword`(`kid`,`goods_id`,`keyword`,`tcount`,`p_fix`,`is_show`) VALUES ('1','71','瑞倪维儿 清轻茶','0','R','1');
CREATE TABLE IF NOT EXISTS `gz_goods_order` (
  `rec_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `suppliers_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `brand_id` smallint(5) NOT NULL DEFAULT '0' COMMENT '品牌ID',
  `goods_name` varchar(120) NOT NULL DEFAULT '',
  `goods_thumb` varchar(128) NOT NULL DEFAULT '',
  `goods_bianhao` varchar(64) NOT NULL DEFAULT '',
  `goods_unit` varchar(64) NOT NULL DEFAULT '' COMMENT '品商单位',
  `goods_sn` varchar(60) NOT NULL DEFAULT '',
  `product_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `goods_number` smallint(5) unsigned NOT NULL DEFAULT '1',
  `market_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `goods_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `takemoney1` decimal(10,2) DEFAULT '0.00' COMMENT '普通分销佣金',
  `takemoney2` decimal(10,2) DEFAULT '0.00' COMMENT '高级分销佣金',
  `takemoney3` decimal(10,2) DEFAULT '0.00' COMMENT '特权分销佣金',
  `goods_attr` text NOT NULL,
  `parent_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `is_gift` smallint(5) unsigned NOT NULL DEFAULT '0',
  `goods_attr_id` varchar(255) NOT NULL DEFAULT '',
  `is_comment` enum('0','1') NOT NULL DEFAULT '0',
  `from_jifen` int(7) NOT NULL DEFAULT '0' COMMENT '是否通过兑换积分',
  `buy_more_best` varchar(128) NOT NULL DEFAULT '' COMMENT '多买多送，如：10送1',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '每个订单商品的状态,1:退货,2：换货,3:已退货,4:已换货',
  `remark` varchar(250) NOT NULL DEFAULT '',
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rec_id`),
  KEY `order_id` (`order_id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=180 DEFAULT CHARSET=utf8;
INSERT INTO `gz_goods_order`(`rec_id`,`order_id`,`suppliers_id`,`goods_id`,`brand_id`,`goods_name`,`goods_thumb`,`goods_bianhao`,`goods_unit`,`goods_sn`,`product_id`,`goods_number`,`market_price`,`goods_price`,`takemoney1`,`takemoney2`,`takemoney3`,`goods_attr`,`parent_id`,`is_gift`,`goods_attr_id`,`is_comment`,`from_jifen`,`buy_more_best`,`status`,`remark`,`addtime`) VALUES ('179','79','0','75','55','测试，加入我们','photos/wx020369com/goods/201507/thumb_s/14382259301438225930.jpg','','件','GZFH000075','0','1','1.00','0.01','0.01','0.02','0.03','','0','0','','0','0','','0','','0');
INSERT INTO `gz_goods_order`(`rec_id`,`order_id`,`suppliers_id`,`goods_id`,`brand_id`,`goods_name`,`goods_thumb`,`goods_bianhao`,`goods_unit`,`goods_sn`,`product_id`,`goods_number`,`market_price`,`goods_price`,`takemoney1`,`takemoney2`,`takemoney3`,`goods_attr`,`parent_id`,`is_gift`,`goods_attr_id`,`is_comment`,`from_jifen`,`buy_more_best`,`status`,`remark`,`addtime`) VALUES ('178','78','0','75','55','测试，加入我们','photos/wx020369com/goods/201507/thumb_s/14382259301438225930.jpg','','件','GZFH000075','0','7','1.00','0.01','0.01','0.02','0.03','','0','0','','0','0','','0','','0');
INSERT INTO `gz_goods_order`(`rec_id`,`order_id`,`suppliers_id`,`goods_id`,`brand_id`,`goods_name`,`goods_thumb`,`goods_bianhao`,`goods_unit`,`goods_sn`,`product_id`,`goods_number`,`market_price`,`goods_price`,`takemoney1`,`takemoney2`,`takemoney3`,`goods_attr`,`parent_id`,`is_gift`,`goods_attr_id`,`is_comment`,`from_jifen`,`buy_more_best`,`status`,`remark`,`addtime`) VALUES ('177','77','0','75','55','测试，加入我们','photos/wx020369com/goods/201507/thumb_s/14382259301438225930.jpg','','件','GZFH000075','0','1','1.00','0.10','0.01','0.02','0.03','','0','0','','0','0','','0','','0');
INSERT INTO `gz_goods_order`(`rec_id`,`order_id`,`suppliers_id`,`goods_id`,`brand_id`,`goods_name`,`goods_thumb`,`goods_bianhao`,`goods_unit`,`goods_sn`,`product_id`,`goods_number`,`market_price`,`goods_price`,`takemoney1`,`takemoney2`,`takemoney3`,`goods_attr`,`parent_id`,`is_gift`,`goods_attr_id`,`is_comment`,`from_jifen`,`buy_more_best`,`status`,`remark`,`addtime`) VALUES ('176','76','0','75','55','测试，加入我们','photos/wx020369com/goods/201507/thumb_s/14382259301438225930.jpg','','件','GZFH000075','0','1','1.00','0.10','0.01','0.02','0.03','','0','0','','0','0','','0','','0');
INSERT INTO `gz_goods_order`(`rec_id`,`order_id`,`suppliers_id`,`goods_id`,`brand_id`,`goods_name`,`goods_thumb`,`goods_bianhao`,`goods_unit`,`goods_sn`,`product_id`,`goods_number`,`market_price`,`goods_price`,`takemoney1`,`takemoney2`,`takemoney3`,`goods_attr`,`parent_id`,`is_gift`,`goods_attr_id`,`is_comment`,`from_jifen`,`buy_more_best`,`status`,`remark`,`addtime`) VALUES ('175','75','0','71','56','测试，加入我们','photos/wx020369com/goods/201507/thumb_s/14381946441438194644.jpg','','pcs','GZFH000001','0','1','0.10','0.10','40.00','40.00','40.00','','0','0','','0','0','','0','','0');
INSERT INTO `gz_goods_order`(`rec_id`,`order_id`,`suppliers_id`,`goods_id`,`brand_id`,`goods_name`,`goods_thumb`,`goods_bianhao`,`goods_unit`,`goods_sn`,`product_id`,`goods_number`,`market_price`,`goods_price`,`takemoney1`,`takemoney2`,`takemoney3`,`goods_attr`,`parent_id`,`is_gift`,`goods_attr_id`,`is_comment`,`from_jifen`,`buy_more_best`,`status`,`remark`,`addtime`) VALUES ('174','74','0','74','54','古驰系类','photos/localhost/goods/201507/thumb_s/14363324041436332404.jpg','23123','件','11111-1','0','1','1.00','1.00','0.00','0.00','0.00','','0','0','','0','0','','0','','0');
INSERT INTO `gz_goods_order`(`rec_id`,`order_id`,`suppliers_id`,`goods_id`,`brand_id`,`goods_name`,`goods_thumb`,`goods_bianhao`,`goods_unit`,`goods_sn`,`product_id`,`goods_number`,`market_price`,`goods_price`,`takemoney1`,`takemoney2`,`takemoney3`,`goods_attr`,`parent_id`,`is_gift`,`goods_attr_id`,`is_comment`,`from_jifen`,`buy_more_best`,`status`,`remark`,`addtime`) VALUES ('173','73','0','74','54','古驰系类','photos/localhost/goods/201507/thumb_s/14363324041436332404.jpg','23123','件','11111-1','0','1','1.00','1.00','0.00','0.00','0.00','','0','0','','0','0','','0','','0');
INSERT INTO `gz_goods_order`(`rec_id`,`order_id`,`suppliers_id`,`goods_id`,`brand_id`,`goods_name`,`goods_thumb`,`goods_bianhao`,`goods_unit`,`goods_sn`,`product_id`,`goods_number`,`market_price`,`goods_price`,`takemoney1`,`takemoney2`,`takemoney3`,`goods_attr`,`parent_id`,`is_gift`,`goods_attr_id`,`is_comment`,`from_jifen`,`buy_more_best`,`status`,`remark`,`addtime`) VALUES ('172','72','0','74','54','古驰系类','photos/localhost/goods/201507/thumb_s/14363324041436332404.jpg','23123','件','11111-1','0','1','1.00','1.00','0.00','0.00','0.00','','0','0','','0','0','','0','','0');
INSERT INTO `gz_goods_order`(`rec_id`,`order_id`,`suppliers_id`,`goods_id`,`brand_id`,`goods_name`,`goods_thumb`,`goods_bianhao`,`goods_unit`,`goods_sn`,`product_id`,`goods_number`,`market_price`,`goods_price`,`takemoney1`,`takemoney2`,`takemoney3`,`goods_attr`,`parent_id`,`is_gift`,`goods_attr_id`,`is_comment`,`from_jifen`,`buy_more_best`,`status`,`remark`,`addtime`) VALUES ('171','71','0','73','54','古驰系类','','23123','件','11111','0','1','1.00','0.50','0.00','0.00','0.00','','0','0','','0','0','','0','','0');
INSERT INTO `gz_goods_order`(`rec_id`,`order_id`,`suppliers_id`,`goods_id`,`brand_id`,`goods_name`,`goods_thumb`,`goods_bianhao`,`goods_unit`,`goods_sn`,`product_id`,`goods_number`,`market_price`,`goods_price`,`takemoney1`,`takemoney2`,`takemoney3`,`goods_attr`,`parent_id`,`is_gift`,`goods_attr_id`,`is_comment`,`from_jifen`,`buy_more_best`,`status`,`remark`,`addtime`) VALUES ('170','70','0','74','54','古驰系类','photos/localhost/goods/201507/thumb_s/14363324041436332404.jpg','23123','件','11111-1','0','1','1.00','1.00','0.00','0.00','0.00','','0','0','','0','0','','0','','0');
INSERT INTO `gz_goods_order`(`rec_id`,`order_id`,`suppliers_id`,`goods_id`,`brand_id`,`goods_name`,`goods_thumb`,`goods_bianhao`,`goods_unit`,`goods_sn`,`product_id`,`goods_number`,`market_price`,`goods_price`,`takemoney1`,`takemoney2`,`takemoney3`,`goods_attr`,`parent_id`,`is_gift`,`goods_attr_id`,`is_comment`,`from_jifen`,`buy_more_best`,`status`,`remark`,`addtime`) VALUES ('169','69','0','74','54','古驰系类','photos/localhost/goods/201507/thumb_s/14363324041436332404.jpg','23123','件','11111-1','0','1','1.00','1.00','0.00','0.00','0.00','','0','0','','0','0','','0','','0');
CREATE TABLE IF NOT EXISTS `gz_goods_order_action` (
  `action_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `action_user` varchar(30) NOT NULL DEFAULT '',
  `order_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `shipping_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `pay_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `action_place` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `action_note` varchar(255) NOT NULL DEFAULT '',
  `log_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`action_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=207 DEFAULT CHARSET=utf8;
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('206','73','admin888','2','2','1','0','---','1436946032');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('205','73','admin888','2','0','1','0','---','1436946013');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('204','72','admin888','2','2','1','0','---','1436944646');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('203','72','admin888','2','0','1','0','---','1436944645');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('202','71','admin888','2','2','1','0','---','1436944273');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('201','71','admin888','2','0','1','0','---','1436944272');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('200','70','admin888','2','2','1','0','---','1436944037');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('199','70','admin888','2','0','1','0','---','1436944035');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('198','69','admin888','2','5','1','0','---','1436943859');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('197','69','admin888','2','2','1','0','---','1436943857');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('196','69','admin888','2','0','1','0','---','1436943855');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('195','55','admin111','3','4','2','0','---','1431911810');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('194','55','admin111','2','2','1','0','---','1431911808');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('193','55','admin111','2','0','1','0','---','1431911651');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('192','55','admin111','2','2','1','0','---','1431911647');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('191','68','programmer','2','2','1','0','---','1431759505');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('190','68','programmer','2','0','1','0','---','1431759491');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('189','67','admin888','2','5','1','0','---','1431525101');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('188','67','admin888','2','2','0','0','---','1431525090');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('187','66','programmer','2','2','1','0','---','1431482226');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('186','66','programmer','2','0','1','0','---','1431482217');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('185','65','programmer','2','2','1','0','---','1431482059');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('184','64','programmer','2','2','1','0','---','1431481849');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('183','64','programmer','2','0','1','0','---','1431481797');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('182','63','programmer','2','2','1','0','---','1431481613');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('181','63','programmer','2','0','1','0','---','1431481609');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('180','62','programmer','2','2','1','0','---','1431481396');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('179','62','programmer','2','0','1','0','---','1431481394');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('178','62','programmer','2','0','0','0','---','1431481392');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('177','61','programmer','2','2','1','0','---','1431481240');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('176','61','programmer','2','0','1','0','---','1431481237');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('175','61','programmer','2','0','0','0','---','1431481226');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('174','54','admin888','2','2','1','0','---','1431420390');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('173','60','admin888','2','2','1','0','---','1431419461');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('172','60','admin888','2','2','0','0','---','1431419452');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('171','59','programmer','2','5','1','0','---','1431063097');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('170','59','programmer','2','5','1','0','---','1431063011');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('169','59','programmer','2','5','1','0','---','1431062974');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('168','59','programmer','2','5','1','0','---','1431062335');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('167','59','programmer','2','5','1','0','---','1431062093');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('166','59','programmer','2','5','1','0','---','1431062033');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('165','59','programmer','2','5','1','0','---','1431051682');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('164','59','programmer','2','2','1','0','---','1431051656');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('163','59','programmer','2','0','1','0','---','1431051655');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('162','59','programmer','2','0','0','0','---','1431051652');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('161','59','programmer','3','4','2','0','---','1431051562');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('160','59','programmer','2','0','1','0','---','1431050926');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('159','58','programmer','2','2','1','0','---','1431049838');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('158','58','programmer','2','0','1','0','---','1431049785');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('157','56','programmer','2','5','1','0','---','1430990129');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('156','56','programmer','2','5','1','0','---','1430989710');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('155','56','programmer','2','5','1','0','---','1430989459');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('154','56','programmer','2','2','1','0','---','1430989415');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('153','56','programmer','2','0','1','0','---','1430989397');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('152','56','programmer','2','0','0','0','---','1430989392');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('151','56','programmer','3','4','2','0','---','1430989391');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('150','56','programmer','2','5','1','0','---','1430989337');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('149','56','programmer','2','5','1','0','---','1430987296');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('148','56','programmer','2','2','1','0','---','1430984959');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('147','57','programmer','2','5','1','0','---','1430982682');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('146','57','programmer','2','2','1','0','---','1430982671');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('145','57','programmer','2','2','0','0','---','1430982671');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('144','57','programmer','2','0','0','0','---','1430982492');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('143','57','programmer','3','4','2','0','---','1430982476');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('142','57','admin888','2','2','1','0','---','1430902087');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('141','57','programmer','2','0','1','0','---','1430814402');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('140','56','programmer','2','0','1','0','---','1430814268');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('139','55','programmer','2','0','1','0','---','1430812466');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('138','54','programmer','2','0','1','0','---','1430811493');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('137','54','programmer','2','0','0','0','---','1430811437');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('136','54','programmer','2','0','1','0','---','1430811429');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('135','54','programmer','2','0','0','0','---','1430811416');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('134','54','programmer','2','0','1','0','---','1430811374');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('133','53','programmer','2','2','1','0','---','1430207051');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('132','53','programmer','2','0','1','0','---','1430207050');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('131','53','programmer','2','0','0','0','---','1430207048');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('130','53','programmer','3','4','2','0','---','1430207047');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('129','53','programmer','2','2','1','0','---','1430206767');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('128','53','programmer','2','0','1','0','---','1430206766');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('127','53','programmer','2','0','0','0','---','1430206765');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('126','53','programmer','3','4','2','0','---','1430206764');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('125','53','programmer','2','5','1','0','---','1430206725');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('124','53','programmer','2','2','1','0','---','1430206708');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('123','53','programmer','2','0','1','0','---','1430206679');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('122','53','programmer','2','0','0','0','---','1430206677');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('121','53','programmer','3','4','2','0','---','1430206673');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('120','53','programmer','2','5','1','0','---','1430206109');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('119','53','programmer','2','2','1','0','---','1430206087');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('118','53','programmer','2','0','1','0','---','1430206084');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('117','53','programmer','2','0','0','0','---','1430206083');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('116','53','programmer','3','4','2','0','---','1430206081');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('115','53','programmer','2','2','1','0','---','1430206057');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('114','53','programmer','2','0','1','0','---','1430206027');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('113','53','programmer','2','0','0','0','---','1430206022');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('112','53','programmer','3','4','2','0','---','1430206020');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('111','53','programmer','2','2','1','0','---','1430204905');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('110','53','programmer','2','2','0','0','---','1430204904');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('109','53','programmer','2','0','0','0','---','1430204652');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('108','53','programmer','3','4','2','0','---','1430204651');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('107','53','programmer','2','5','1','0','---','1430203954');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('106','53','programmer','2','2','1','0','---','1430203658');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('105','53','programmer','2','0','1','0','---','1430203621');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('104','53','programmer','2','0','0','0','---','1430203596');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('103','53','programmer','3','4','2','0','---','1430203594');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('102','53','programmer','2','5','1','0','---','1430203569');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('101','53','programmer','2','2','1','0','---','1430203512');
INSERT INTO `gz_goods_order_action`(`action_id`,`order_id`,`action_user`,`order_status`,`shipping_status`,`pay_status`,`action_place`,`action_note`,`log_time`) VALUES ('100','53','programmer','2','0','1','0','---','1430202561');
CREATE TABLE IF NOT EXISTS `gz_goods_order_action_log` (
  `logid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `oid` mediumint(8) NOT NULL COMMENT '供应商操作的订单ID',
  `action_uid` mediumint(8) NOT NULL DEFAULT '0' COMMENT '供应商操作uid',
  `type` varchar(64) NOT NULL DEFAULT '',
  `desc` varchar(255) NOT NULL DEFAULT '',
  `logtime` int(11) NOT NULL DEFAULT '0',
  `order_status` tinyint(1) NOT NULL DEFAULT '0',
  `shipping_status` tinyint(1) NOT NULL DEFAULT '0',
  `pay_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`logid`),
  KEY `oid` (`oid`),
  KEY `action_uid` (`action_uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_goods_order_action_v2` (
  `action_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `action_user` varchar(30) NOT NULL DEFAULT '',
  `order_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `shipping_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `pay_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `action_place` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `action_note` varchar(255) NOT NULL DEFAULT '',
  `log_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`action_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_goods_order_address` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `goods_number` smallint(4) DEFAULT '0',
  `consignee` varchar(64) DEFAULT NULL,
  `moblie` varchar(32) DEFAULT NULL,
  `province` smallint(5) DEFAULT '0',
  `city` smallint(5) DEFAULT '0',
  `district` smallint(5) DEFAULT '0',
  `address` varchar(128) DEFAULT NULL,
  `rec_id` mediumint(7) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `rec_id` (`rec_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_goods_order_daigou` (
  `rec_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `brand_id` smallint(5) NOT NULL DEFAULT '0' COMMENT '品牌ID',
  `goods_name` varchar(120) NOT NULL DEFAULT '',
  `goods_thumb` varchar(128) NOT NULL DEFAULT '',
  `goods_bianhao` varchar(64) NOT NULL DEFAULT '',
  `goods_number` smallint(4) DEFAULT '0',
  `goods_unit` varchar(64) NOT NULL DEFAULT '' COMMENT '品商单位',
  `goods_sn` varchar(60) NOT NULL DEFAULT '',
  `market_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `goods_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `goods_attr` text NOT NULL,
  PRIMARY KEY (`rec_id`),
  KEY `order_id` (`order_id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_goods_order_info` (
  `order_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `order_sn` varchar(20) NOT NULL DEFAULT '',
  `group_sn` varchar(64) DEFAULT NULL,
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `daili_uid` mediumint(8) DEFAULT '0' COMMENT '预留',
  `parent_uid` mediumint(8) DEFAULT '0' COMMENT '一级',
  `parent_uid2` mediumint(8) DEFAULT '0' COMMENT '二级',
  `parent_uid3` mediumint(8) DEFAULT '0' COMMENT '三级',
  `order_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `shipping_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `pay_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `consignee` varchar(60) NOT NULL DEFAULT '',
  `country` smallint(5) unsigned NOT NULL DEFAULT '0',
  `province` smallint(5) unsigned NOT NULL DEFAULT '0',
  `city` smallint(5) unsigned NOT NULL DEFAULT '0',
  `district` smallint(5) unsigned NOT NULL DEFAULT '0',
  `town` smallint(5) unsigned NOT NULL DEFAULT '0',
  `village` smallint(5) unsigned NOT NULL DEFAULT '0',
  `shop_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `address` varchar(255) NOT NULL DEFAULT '',
  `zipcode` varchar(60) NOT NULL DEFAULT '',
  `tel` varchar(60) NOT NULL DEFAULT '',
  `mobile` varchar(60) NOT NULL DEFAULT '',
  `email` varchar(60) NOT NULL DEFAULT '',
  `best_time` varchar(120) NOT NULL DEFAULT '',
  `sign_building` varchar(120) NOT NULL DEFAULT '',
  `postscript` varchar(255) NOT NULL DEFAULT '' COMMENT '订单附言',
  `shipping_id` tinyint(3) NOT NULL DEFAULT '0',
  `shipping_id_true` tinyint(3) DEFAULT '0' COMMENT '物流ID',
  `shipping_name` varchar(120) NOT NULL DEFAULT '',
  `pay_id` tinyint(3) NOT NULL DEFAULT '0' COMMENT '支付方式ID',
  `pay_name` varchar(120) NOT NULL DEFAULT '',
  `how_oos` varchar(120) NOT NULL DEFAULT '' COMMENT '缺货处理说明',
  `inv_content` varchar(120) NOT NULL DEFAULT '',
  `goods_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '总价不含邮费',
  `shipping_fee` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '邮费',
  `offprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `order_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '折扣或优惠后的价格',
  `referer` varchar(255) NOT NULL DEFAULT '' COMMENT '订单来路',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  `confirm_time` int(10) unsigned NOT NULL DEFAULT '0',
  `pay_time` int(10) unsigned NOT NULL DEFAULT '0',
  `shipping_time` int(10) unsigned NOT NULL DEFAULT '0',
  `card_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `bonus_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '优惠劵ID',
  `sn_id` varchar(64) DEFAULT NULL,
  `tax` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '税',
  `parent_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '订单类型：团购。。',
  `is_prints` enum('1','0') NOT NULL DEFAULT '0' COMMENT '否是打印',
  `peisong` int(10) unsigned DEFAULT NULL,
  `bonus_count` tinyint(2) NOT NULL DEFAULT '0' COMMENT '分红计数',
  `bonus_time` varchar(20) DEFAULT NULL COMMENT '参与分红时间最后次时间',
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `order_sn` (`order_sn`),
  KEY `user_id` (`user_id`),
  KEY `order_status` (`order_status`),
  KEY `shipping_status` (`shipping_status`),
  KEY `pay_status` (`pay_status`),
  KEY `shipping_id` (`shipping_id`),
  KEY `pay_id` (`pay_id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;
INSERT INTO `gz_goods_order_info`(`order_id`,`order_sn`,`group_sn`,`user_id`,`daili_uid`,`parent_uid`,`parent_uid2`,`parent_uid3`,`order_status`,`shipping_status`,`pay_status`,`consignee`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`email`,`best_time`,`sign_building`,`postscript`,`shipping_id`,`shipping_id_true`,`shipping_name`,`pay_id`,`pay_name`,`how_oos`,`inv_content`,`goods_amount`,`shipping_fee`,`offprice`,`order_amount`,`referer`,`add_time`,`confirm_time`,`pay_time`,`shipping_time`,`card_id`,`bonus_id`,`sn_id`,`tax`,`parent_id`,`discount`,`type`,`is_prints`,`peisong`,`bonus_count`,`bonus_time`) VALUES ('79','20151438387861','','45','0','0','0','0','2','0','1','44','0','3','38','417','0','0','0','5455','','','21212','','','','','4','0','快递','4','微信支付','','','1.00','0.00','0.00','0.01','','1438387861','0','1438387877','0','0','0','','0.00','0','0.00','0','0','','0','');
INSERT INTO `gz_goods_order_info`(`order_id`,`order_sn`,`group_sn`,`user_id`,`daili_uid`,`parent_uid`,`parent_uid2`,`parent_uid3`,`order_status`,`shipping_status`,`pay_status`,`consignee`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`email`,`best_time`,`sign_building`,`postscript`,`shipping_id`,`shipping_id_true`,`shipping_name`,`pay_id`,`pay_name`,`how_oos`,`inv_content`,`goods_amount`,`shipping_fee`,`offprice`,`order_amount`,`referer`,`add_time`,`confirm_time`,`pay_time`,`shipping_time`,`card_id`,`bonus_id`,`sn_id`,`tax`,`parent_id`,`discount`,`type`,`is_prints`,`peisong`,`bonus_count`,`bonus_time`) VALUES ('78','20151438324960','','48','0','0','0','0','2','0','1','吴乾坤','0','2','52','501','0','0','0','啊啊啊','','','135899988899988','','','','','4','0','快递','4','微信支付','','','7.00','0.00','0.00','0.07','','1438324960','0','1438325052','0','0','0','','0.00','0','0.00','0','0','','0','');
INSERT INTO `gz_goods_order_info`(`order_id`,`order_sn`,`group_sn`,`user_id`,`daili_uid`,`parent_uid`,`parent_uid2`,`parent_uid3`,`order_status`,`shipping_status`,`pay_status`,`consignee`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`email`,`best_time`,`sign_building`,`postscript`,`shipping_id`,`shipping_id_true`,`shipping_name`,`pay_id`,`pay_name`,`how_oos`,`inv_content`,`goods_amount`,`shipping_fee`,`offprice`,`order_amount`,`referer`,`add_time`,`confirm_time`,`pay_time`,`shipping_time`,`card_id`,`bonus_id`,`sn_id`,`tax`,`parent_id`,`discount`,`type`,`is_prints`,`peisong`,`bonus_count`,`bonus_time`) VALUES ('77','20151438234396','','45','0','0','0','0','2','0','1','44','0','3','38','417','0','0','0','5455','','','21212','','','','','4','0','快递','4','微信支付','','','1.00','0.00','0.00','0.10','','1438234396','0','1438234419','0','0','0','','0.00','0','0.00','0','0','','0','');
INSERT INTO `gz_goods_order_info`(`order_id`,`order_sn`,`group_sn`,`user_id`,`daili_uid`,`parent_uid`,`parent_uid2`,`parent_uid3`,`order_status`,`shipping_status`,`pay_status`,`consignee`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`email`,`best_time`,`sign_building`,`postscript`,`shipping_id`,`shipping_id_true`,`shipping_name`,`pay_id`,`pay_name`,`how_oos`,`inv_content`,`goods_amount`,`shipping_fee`,`offprice`,`order_amount`,`referer`,`add_time`,`confirm_time`,`pay_time`,`shipping_time`,`card_id`,`bonus_id`,`sn_id`,`tax`,`parent_id`,`discount`,`type`,`is_prints`,`peisong`,`bonus_count`,`bonus_time`) VALUES ('76','20151438228225','','42','0','0','0','0','2','0','1','4343','0','3','37','410','0','0','0','5544545','','','11234567876','','','','','4','0','快递','4','微信支付','','','1.00','0.00','0.00','0.10','','1438228225','0','1438228248','0','0','0','','0.00','0','0.00','0','0','','0','');
INSERT INTO `gz_goods_order_info`(`order_id`,`order_sn`,`group_sn`,`user_id`,`daili_uid`,`parent_uid`,`parent_uid2`,`parent_uid3`,`order_status`,`shipping_status`,`pay_status`,`consignee`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`email`,`best_time`,`sign_building`,`postscript`,`shipping_id`,`shipping_id_true`,`shipping_name`,`pay_id`,`pay_name`,`how_oos`,`inv_content`,`goods_amount`,`shipping_fee`,`offprice`,`order_amount`,`referer`,`add_time`,`confirm_time`,`pay_time`,`shipping_time`,`card_id`,`bonus_id`,`sn_id`,`tax`,`parent_id`,`discount`,`type`,`is_prints`,`peisong`,`bonus_count`,`bonus_time`) VALUES ('75','20151438218490','','46','0','0','0','0','0','0','0','日期','0','7','101','902','0','0','0','可！吗的','','','15555555555555','','','','','4','0','偏远地区','4','微信支付','','','0.10','0.00','0.00','0.10','','1438218490','0','0','0','0','0','','0.00','0','0.00','0','0','','0','');
INSERT INTO `gz_goods_order_info`(`order_id`,`order_sn`,`group_sn`,`user_id`,`daili_uid`,`parent_uid`,`parent_uid2`,`parent_uid3`,`order_status`,`shipping_status`,`pay_status`,`consignee`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`email`,`best_time`,`sign_building`,`postscript`,`shipping_id`,`shipping_id_true`,`shipping_name`,`pay_id`,`pay_name`,`how_oos`,`inv_content`,`goods_amount`,`shipping_fee`,`offprice`,`order_amount`,`referer`,`add_time`,`confirm_time`,`pay_time`,`shipping_time`,`card_id`,`bonus_id`,`sn_id`,`tax`,`parent_id`,`discount`,`type`,`is_prints`,`peisong`,`bonus_count`,`bonus_time`) VALUES ('74','20151436946224','','45','0','0','0','0','1','0','0','44','0','3','38','417','0','0','0','5455','','','21212','','','','','4','0','偏远地区','3','支付宝','','','1.00','0.00','0.00','1.00','','1436946224','0','0','0','0','0','','0.00','0','0.00','0','0','','0','');
INSERT INTO `gz_goods_order_info`(`order_id`,`order_sn`,`group_sn`,`user_id`,`daili_uid`,`parent_uid`,`parent_uid2`,`parent_uid3`,`order_status`,`shipping_status`,`pay_status`,`consignee`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`email`,`best_time`,`sign_building`,`postscript`,`shipping_id`,`shipping_id_true`,`shipping_name`,`pay_id`,`pay_name`,`how_oos`,`inv_content`,`goods_amount`,`shipping_fee`,`offprice`,`order_amount`,`referer`,`add_time`,`confirm_time`,`pay_time`,`shipping_time`,`card_id`,`bonus_id`,`sn_id`,`tax`,`parent_id`,`discount`,`type`,`is_prints`,`peisong`,`bonus_count`,`bonus_time`) VALUES ('73','20151436945924','','44','0','0','0','0','2','2','1','747','0','5','64','619','0','0','0','77','','','12354555','','','','','4','0','偏远地区','3','支付宝','','','1.00','0.00','0.00','1.00','','1436945924','0','1436946032','0','0','0','','0.00','0','0.00','0','0','','0','');
INSERT INTO `gz_goods_order_info`(`order_id`,`order_sn`,`group_sn`,`user_id`,`daili_uid`,`parent_uid`,`parent_uid2`,`parent_uid3`,`order_status`,`shipping_status`,`pay_status`,`consignee`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`email`,`best_time`,`sign_building`,`postscript`,`shipping_id`,`shipping_id_true`,`shipping_name`,`pay_id`,`pay_name`,`how_oos`,`inv_content`,`goods_amount`,`shipping_fee`,`offprice`,`order_amount`,`referer`,`add_time`,`confirm_time`,`pay_time`,`shipping_time`,`card_id`,`bonus_id`,`sn_id`,`tax`,`parent_id`,`discount`,`type`,`is_prints`,`peisong`,`bonus_count`,`bonus_time`) VALUES ('72','20151436944634','','42','0','0','0','0','2','2','1','4343','0','3','37','410','0','0','0','5544545','','','11234567876','','','','','4','0','偏远地区','3','支付宝','','','1.00','0.00','0.00','1.00','','1436944634','0','1436944646','0','0','0','','0.00','0','0.00','0','0','','0','');
INSERT INTO `gz_goods_order_info`(`order_id`,`order_sn`,`group_sn`,`user_id`,`daili_uid`,`parent_uid`,`parent_uid2`,`parent_uid3`,`order_status`,`shipping_status`,`pay_status`,`consignee`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`email`,`best_time`,`sign_building`,`postscript`,`shipping_id`,`shipping_id_true`,`shipping_name`,`pay_id`,`pay_name`,`how_oos`,`inv_content`,`goods_amount`,`shipping_fee`,`offprice`,`order_amount`,`referer`,`add_time`,`confirm_time`,`pay_time`,`shipping_time`,`card_id`,`bonus_id`,`sn_id`,`tax`,`parent_id`,`discount`,`type`,`is_prints`,`peisong`,`bonus_count`,`bonus_time`) VALUES ('71','20151436944259','','43','0','0','0','0','2','5','1','77','0','4','55','540','0','0','0','75','','','1223545665','','','','','4','0','偏远地区','3','支付宝','','','1.00','0.00','0.00','0.50','','1436944259','0','1436944273','1436944284','0','0','','0.00','0','0.00','0','0','','0','');
INSERT INTO `gz_goods_order_info`(`order_id`,`order_sn`,`group_sn`,`user_id`,`daili_uid`,`parent_uid`,`parent_uid2`,`parent_uid3`,`order_status`,`shipping_status`,`pay_status`,`consignee`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`email`,`best_time`,`sign_building`,`postscript`,`shipping_id`,`shipping_id_true`,`shipping_name`,`pay_id`,`pay_name`,`how_oos`,`inv_content`,`goods_amount`,`shipping_fee`,`offprice`,`order_amount`,`referer`,`add_time`,`confirm_time`,`pay_time`,`shipping_time`,`card_id`,`bonus_id`,`sn_id`,`tax`,`parent_id`,`discount`,`type`,`is_prints`,`peisong`,`bonus_count`,`bonus_time`) VALUES ('70','20151436944024','','42','0','0','0','0','2','5','1','4343','0','3','37','410','0','0','0','5544545','','','11234567876','','','','','4','0','偏远地区','3','支付宝','','','1.00','0.00','0.00','1.00','','1436944024','0','1436944037','1436944113','0','0','','0.00','0','0.00','0','0','','0','');
INSERT INTO `gz_goods_order_info`(`order_id`,`order_sn`,`group_sn`,`user_id`,`daili_uid`,`parent_uid`,`parent_uid2`,`parent_uid3`,`order_status`,`shipping_status`,`pay_status`,`consignee`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`email`,`best_time`,`sign_building`,`postscript`,`shipping_id`,`shipping_id_true`,`shipping_name`,`pay_id`,`pay_name`,`how_oos`,`inv_content`,`goods_amount`,`shipping_fee`,`offprice`,`order_amount`,`referer`,`add_time`,`confirm_time`,`pay_time`,`shipping_time`,`card_id`,`bonus_id`,`sn_id`,`tax`,`parent_id`,`discount`,`type`,`is_prints`,`peisong`,`bonus_count`,`bonus_time`) VALUES ('69','20151436943822','','42','0','0','0','0','2','5','1','4343','0','3','37','410','0','0','0','5544545','','','11234567876','','','','','4','0','偏远地区','3','支付宝','','','1.00','0.00','0.00','1.00','','1436943822','0','1436943857','1436943859','0','0','','0.00','0','0.00','0','0','','0','');
CREATE TABLE IF NOT EXISTS `gz_goods_order_info_daigou` (
  `order_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `order_sn` varchar(20) NOT NULL DEFAULT '',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `daili_uid` mediumint(8) DEFAULT '0' COMMENT '来源的用户ID',
  `parent_uid` mediumint(8) DEFAULT '0',
  `order_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `shipping_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `pay_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `postscript` varchar(255) NOT NULL DEFAULT '' COMMENT '订单附言',
  `shipping_id` tinyint(3) NOT NULL DEFAULT '0',
  `shipping_name` varchar(120) NOT NULL DEFAULT '',
  `pay_id` tinyint(3) NOT NULL DEFAULT '0' COMMENT '支付方式ID',
  `pay_name` varchar(120) NOT NULL DEFAULT '',
  `goods_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '总价不含邮费',
  `shipping_fee` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '邮费',
  `offprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `order_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '折扣或优惠后的价格',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  `confirm_time` int(10) unsigned NOT NULL DEFAULT '0',
  `pay_time` int(10) unsigned NOT NULL DEFAULT '0',
  `shipping_time` int(10) unsigned NOT NULL DEFAULT '0',
  `is_prints` enum('1','0') NOT NULL DEFAULT '0' COMMENT '否是打印',
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `order_sn` (`order_sn`),
  KEY `user_id` (`user_id`),
  KEY `order_status` (`order_status`),
  KEY `shipping_status` (`shipping_status`),
  KEY `pay_status` (`pay_status`),
  KEY `shipping_id` (`shipping_id`),
  KEY `pay_id` (`pay_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_goods_order_status` (
  `oid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `suppliers_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `order_id` mediumint(8) unsigned NOT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT '0',
  `shipping_status` tinyint(1) NOT NULL DEFAULT '0',
  `pay_status` tinyint(1) NOT NULL DEFAULT '0',
  `is_print` tinyint(1) NOT NULL DEFAULT '0',
  `is_print_shop` tinyint(1) NOT NULL DEFAULT '0' COMMENT '便利店是否打印',
  PRIMARY KEY (`oid`),
  KEY `shop_id` (`suppliers_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_goods_sn` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `goods_id` mediumint(8) DEFAULT '0',
  `order_id` smallint(6) DEFAULT '0',
  `goods_pass` varchar(64) DEFAULT NULL,
  `goods_sn` varchar(64) DEFAULT NULL,
  `is_use` tinyint(1) DEFAULT '0',
  `addtime` int(10) DEFAULT '0',
  `usetime` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_goods_tuijian` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `goods_id` mediumint(8) NOT NULL,
  `goods_desc` text,
  PRIMARY KEY (`id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
INSERT INTO `gz_goods_tuijian`(`id`,`goods_id`,`goods_desc`) VALUES ('2','71','');
CREATE TABLE IF NOT EXISTS `gz_goods_user_price` (
  `price_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `user_rank` tinyint(3) NOT NULL DEFAULT '0',
  `user_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`price_id`),
  KEY `goods_id` (`goods_id`,`user_rank`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_lottery` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `lt_prize` varchar(30) DEFAULT '0',
  `lt_name` varchar(50) DEFAULT NULL,
  `lt_min` varchar(25) DEFAULT '',
  `lt_max` varchar(25) DEFAULT '',
  `lt_v` int(3) DEFAULT NULL,
  `lt_allowed` int(11) DEFAULT '0',
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
INSERT INTO `gz_lottery`(`id`,`lt_prize`,`lt_name`,`lt_min`,`lt_max`,`lt_v`,`lt_allowed`,`create_time`) VALUES ('7','七等奖','奖品7','32,92,152,212,272,332','58,118,178,238,298,358','50','50','1435730503');
INSERT INTO `gz_lottery`(`id`,`lt_prize`,`lt_name`,`lt_min`,`lt_max`,`lt_v`,`lt_allowed`,`create_time`) VALUES ('6','六等奖','奖品6','62','88','25','30','1435730503');
INSERT INTO `gz_lottery`(`id`,`lt_prize`,`lt_name`,`lt_min`,`lt_max`,`lt_v`,`lt_allowed`,`create_time`) VALUES ('5','五等奖','奖品5','122','148','10','20','1435730503');
INSERT INTO `gz_lottery`(`id`,`lt_prize`,`lt_name`,`lt_min`,`lt_max`,`lt_v`,`lt_allowed`,`create_time`) VALUES ('4','四等奖','奖品4','182','208','7','4','1435730503');
INSERT INTO `gz_lottery`(`id`,`lt_prize`,`lt_name`,`lt_min`,`lt_max`,`lt_v`,`lt_allowed`,`create_time`) VALUES ('3','三等奖','奖品3','242','268','5','3','1435730503');
INSERT INTO `gz_lottery`(`id`,`lt_prize`,`lt_name`,`lt_min`,`lt_max`,`lt_v`,`lt_allowed`,`create_time`) VALUES ('2','二等奖','奖品2','302','328','2','2','1435730503');
INSERT INTO `gz_lottery`(`id`,`lt_prize`,`lt_name`,`lt_min`,`lt_max`,`lt_v`,`lt_allowed`,`create_time`) VALUES ('1','一等奖','奖品1','1','29','1','1','1435730503');
CREATE TABLE IF NOT EXISTS `gz_lottery_set` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `num` int(1) DEFAULT '1',
  `end_time` int(11) DEFAULT '0',
  `content` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
INSERT INTO `gz_lottery_set`(`id`,`num`,`end_time`,`content`) VALUES ('1','10','1448899200','新用户：关注后，点击抽奖，即可参加抽奖活动');
CREATE TABLE IF NOT EXISTS `gz_lottery_user` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) DEFAULT NULL,
  `lt_id` tinyint(1) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
INSERT INTO `gz_lottery_user`(`id`,`uid`,`lt_id`,`create_time`) VALUES ('2','45','4','1438234459');
INSERT INTO `gz_lottery_user`(`id`,`uid`,`lt_id`,`create_time`) VALUES ('1','45','7','1438234457');
CREATE TABLE IF NOT EXISTS `gz_lts_site` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL DEFAULT '',
  `url` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_message` (
  `mes_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL DEFAULT '',
  `comment_title` varchar(128) NOT NULL DEFAULT '',
  `user_name` varchar(60) NOT NULL DEFAULT '',
  `user_id` int(7) NOT NULL DEFAULT '0',
  `goods_id` int(7) NOT NULL DEFAULT '0',
  `content` varchar(255) NOT NULL DEFAULT '',
  `rp_content` varchar(255) NOT NULL DEFAULT '',
  `rp_adminid` tinyint(3) NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `ip_address` varchar(15) NOT NULL DEFAULT '',
  `ip_from` varchar(15) NOT NULL DEFAULT '',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '1:未处理留言  2:已处理留言',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `admin_remark` varchar(128) NOT NULL DEFAULT '',
  `companyname` varchar(64) NOT NULL DEFAULT '',
  `companyurl` varchar(128) NOT NULL DEFAULT '',
  `address` varchar(64) NOT NULL DEFAULT '',
  `trade` varchar(64) NOT NULL DEFAULT '',
  `jobs` varchar(64) NOT NULL DEFAULT '',
  `telephone` varchar(32) NOT NULL DEFAULT '',
  `mobile` varchar(32) NOT NULL DEFAULT '',
  `fax` varchar(32) NOT NULL DEFAULT '',
  `sex` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '保密 男 女',
  PRIMARY KEY (`mes_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_nav` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `ctype` varchar(10) DEFAULT NULL,
  `cid` smallint(5) unsigned DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  `is_opennew` tinyint(1) NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'middle',
  `vieworder` tinyint(3) NOT NULL DEFAULT '50',
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `ifshow` (`is_show`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;
INSERT INTO `gz_nav`(`id`,`ctype`,`cid`,`name`,`is_show`,`is_opennew`,`url`,`type`,`vieworder`) VALUES ('108','','0','礼包派发','1','0','','middle','50');
INSERT INTO `gz_nav`(`id`,`ctype`,`cid`,`name`,`is_show`,`is_opennew`,`url`,`type`,`vieworder`) VALUES ('107','','0','精品推荐','1','0','tuijian.php','middle','3');
INSERT INTO `gz_nav`(`id`,`ctype`,`cid`,`name`,`is_show`,`is_opennew`,`url`,`type`,`vieworder`) VALUES ('106','','0','品牌专场','1','0','brand.php','middle','2');
INSERT INTO `gz_nav`(`id`,`ctype`,`cid`,`name`,`is_show`,`is_opennew`,`url`,`type`,`vieworder`) VALUES ('105','','0','热销团购','1','0','groupbuy.php','middle','1');
INSERT INTO `gz_nav`(`id`,`ctype`,`cid`,`name`,`is_show`,`is_opennew`,`url`,`type`,`vieworder`) VALUES ('102','','0','限时抢购','1','0','qianggou.php','middle','50');
INSERT INTO `gz_nav`(`id`,`ctype`,`cid`,`name`,`is_show`,`is_opennew`,`url`,`type`,`vieworder`) VALUES ('101','','0','物美价廉','1','0','top.php','middle','50');
CREATE TABLE IF NOT EXISTS `gz_nav_wx` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  `url` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'middle',
  `vieworder` tinyint(3) NOT NULL DEFAULT '50',
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `ifshow` (`is_show`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=utf8;
INSERT INTO `gz_nav_wx`(`id`,`name`,`is_show`,`url`,`img`,`type`,`vieworder`) VALUES ('114','会员中心','1','./user.php','m/tpl/images/red_member.png','top','50');
INSERT INTO `gz_nav_wx`(`id`,`name`,`is_show`,`url`,`img`,`type`,`vieworder`) VALUES ('113','我的分销','1','http://test.02yc.com/m/user.php?act=dailicenter','m/tpl/images/red_shoppingcat.png','top','50');
INSERT INTO `gz_nav_wx`(`id`,`name`,`is_show`,`url`,`img`,`type`,`vieworder`) VALUES ('112','我的红包','1','http://test.02yc.com/m/user.php?act=mygift','m/tpl/images/qq2.png','top','50');
INSERT INTO `gz_nav_wx`(`id`,`name`,`is_show`,`url`,`img`,`type`,`vieworder`) VALUES ('111','热销商品','1','http://test.02yc.com/m/catalog.php?cid=587','m/tpl/images/red_class_all.png','top','50');
INSERT INTO `gz_nav_wx`(`id`,`name`,`is_show`,`url`,`img`,`type`,`vieworder`) VALUES ('110','我的订单','1','http://test.02yc.com/m/user.php?act=orderlist','m/tpl/images/red_brand.png','top','50');
CREATE TABLE IF NOT EXISTS `gz_nei_userdbinfo` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `duid` smallint(6) DEFAULT '0' COMMENT '代理商ID',
  `yuming` varchar(128) DEFAULT NULL,
  `dbname` varchar(128) DEFAULT NULL,
  `dbuser` varchar(128) DEFAULT NULL,
  `dbpass` varchar(128) DEFAULT NULL,
  `dbprefix` varchar(32) DEFAULT NULL,
  `uname` varchar(128) DEFAULT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `addtime` int(10) DEFAULT '0',
  `endtime` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
INSERT INTO `gz_nei_userdbinfo`(`id`,`duid`,`yuming`,`dbname`,`dbuser`,`dbpass`,`dbprefix`,`uname`,`phone`,`email`,`addtime`,`endtime`) VALUES ('3','0','localhost','weixinfx09','root','','gz_','小熊','13535222987','jzgfnet@qq.com','1426657540','2016');
INSERT INTO `gz_nei_userdbinfo`(`id`,`duid`,`yuming`,`dbname`,`dbuser`,`dbpass`,`dbprefix`,`uname`,`phone`,`email`,`addtime`,`endtime`) VALUES ('2','0','www.w5shop.com','chenapiqqcom','chenapiqqcom','w5shopcom','tp_','小熊','13535222987','111111111@qq.com','1426653704','1426665944');
CREATE TABLE IF NOT EXISTS `gz_oauth` (
  `oid` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `contents` text NOT NULL,
  `count` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;
INSERT INTO `gz_oauth`(`oid`,`name`,`contents`,`count`,`status`) VALUES ('46','首页','http://test.02yc.com/m/','5','1');
INSERT INTO `gz_oauth`(`oid`,`name`,`contents`,`count`,`status`) VALUES ('45','会员中心','http://test.02yc.com/m/user.php','7','1');
CREATE TABLE IF NOT EXISTS `gz_payment` (
  `pay_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `pay_code` varchar(255) DEFAULT NULL,
  `pay_name` varchar(120) DEFAULT NULL,
  `pay_fee` varchar(10) NOT NULL DEFAULT '0',
  `pay_desc` text,
  `pay_order` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `pay_config` text,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_cod` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_online` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`pay_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
INSERT INTO `gz_payment`(`pay_id`,`pay_code`,`pay_name`,`pay_fee`,`pay_desc`,`pay_order`,`pay_config`,`enabled`,`is_cod`,`is_online`) VALUES ('8',' ',' ','',' ','0','a:3:{s:6:"pay_no";s:0:"";s:8:"pay_code";s:0:"";s:7:"pay_idt";s:0:"";}','0','0','0');
INSERT INTO `gz_payment`(`pay_id`,`pay_code`,`pay_name`,`pay_fee`,`pay_desc`,`pay_order`,`pay_config`,`enabled`,`is_cod`,`is_online`) VALUES ('7',' ','佣金支付','','佣金不足时，不能使用佣金支付','0','a:3:{s:6:"pay_no";s:0:"";s:8:"pay_code";s:0:"";s:7:"pay_idt";s:0:"";}','0','0','0');
INSERT INTO `gz_payment`(`pay_id`,`pay_code`,`pay_name`,`pay_fee`,`pay_desc`,`pay_order`,`pay_config`,`enabled`,`is_cod`,`is_online`) VALUES ('6',' ','云支付','','申请地址http://jm.i2e.cn/','0','a:3:{s:6:"pay_no";s:0:"";s:8:"pay_code";s:0:"";s:7:"pay_idt";s:0:"";}','0','0','0');
INSERT INTO `gz_payment`(`pay_id`,`pay_code`,`pay_name`,`pay_fee`,`pay_desc`,`pay_order`,`pay_config`,`enabled`,`is_cod`,`is_online`) VALUES ('5','','货到付款','','货到付款','0','a:3:{s:6:"pay_no";s:0:"";s:8:"pay_code";s:0:"";s:7:"pay_idt";s:0:"";}','0','0','0');
INSERT INTO `gz_payment`(`pay_id`,`pay_code`,`pay_name`,`pay_fee`,`pay_desc`,`pay_order`,`pay_config`,`enabled`,`is_cod`,`is_online`) VALUES ('4','','微信支付','0','微信支付','0','a:3:{s:6:"pay_no";s:10:"1224456302";s:8:"pay_code";s:32:"11974322SNNsongningningwuqiankun";s:7:"pay_idt";s:1:"3";}','1','0','0');
INSERT INTO `gz_payment`(`pay_id`,`pay_code`,`pay_name`,`pay_fee`,`pay_desc`,`pay_order`,`pay_config`,`enabled`,`is_cod`,`is_online`) VALUES ('3','cod','支付宝','','支付宝担保交易','0','a:3:{s:6:"pay_no";s:15:"18819803@qq.com";s:8:"pay_code";s:17:"33333333333333333";s:7:"pay_idt";s:12:"208844553345";}','0','1','0');
CREATE TABLE IF NOT EXISTS `gz_photos` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `img` varchar(128) DEFAULT NULL,
  `alt` varchar(128) DEFAULT NULL,
  `time` int(10) DEFAULT '0',
  `type` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_region` (
  `region_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `region_name` varchar(120) NOT NULL DEFAULT '',
  `region_type` tinyint(1) NOT NULL DEFAULT '2',
  `agency_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`region_id`),
  KEY `parent_id` (`parent_id`),
  KEY `region_type` (`region_type`),
  KEY `agency_id` (`agency_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4178 DEFAULT CHARSET=utf8;
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4177','0','江西','0','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4176','4174','城区','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4174','4171','荆州','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4173','4171','仙桃','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4172','4171','武汉','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4171','0','湖北','0','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4170','0','四川','0','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4169','4168','松花','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4168','4165','松江','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4167','0','广东','0','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4166','0','广州','0','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4164','0','北京','0','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4163','3419','建武','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4162','3419','燕塘','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4161','3419','金燕','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4160','3419','侨源阁','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4159','3419','河水','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4158','3419','鳌鱼岗','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4157','3419','兴华','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4156','3419','伍仙桥','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4155','3419','牛利岗','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4154','3419','苏庄社区','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4153','3660','珠江帝景居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4152','3660','新鸿居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4151','3660','汇美居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4150','3660','江丽居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4149','3660','愉景雅苑居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4148','3660','怡雅居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4147','3660','金星居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4146','3660','粤信居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4145','3660','鸿运居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4144','3660','江景居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4143','3660','南贤居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4142','3660','竹园居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4141','3660','电研院居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4140','3660','烟厂居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4139','3660','大江苑居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4138','3660','石榴岗居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4136','3660','七星岗居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4135','3660','赤塘居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4134','3660','毛纺居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4133','3660','赤岗居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4132','3660','七所居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4131','3660','珠影居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4130','3660','新市头居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4129','3660','客村居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4128','3660','大江涌居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4127','3660','鹭江居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4126','3660','下渡居委','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4125','1791','宝山乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4124','1791','取柴河镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4123','1791','富太镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4122','1791','朝阳山镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4121','1791','黑石镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4120','1791','松山镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4119','1791','吉昌镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4118','1791','呼兰镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4117','1791','牛心镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4116','1791','驿马镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4115','1791','石嘴镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4114','1791','明城镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4113','1791','红旗岭镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4112','1791','烟筒山镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4111','1791','河南街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4110','1791','东宁街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4109','1791','福安街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4108','1790','天德乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4107','1790','七里乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4106','1790','新安乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4105','1790','亮甲山乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4104','1790','莲花乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4103','1790','金马镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4102','1790','开原镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4101','1790','小城镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4100','1790','溪河镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4099','1790','法特镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4098','1790','水曲柳镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4097','1790','平安镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4096','1790','上营镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4095','1790','朝阳镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4094','1790','白旗镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4093','1790','铁东街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4092','1790','吉舒街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4091','1790','环城街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4090','1790','南城街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4089','1790','北城街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4088','1789','公吉乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4087','1789','桦树林子乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4086','1789','金沙乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4085','1789','横道河子乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4084','1789','桦郊乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4083','1789','常山镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4082','1789','八道河子镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4081','1789','红石砬子镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4080','1789','二道甸子镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4079','1789','夹皮沟镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4078','1789','启新街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4077','1789','新华街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4076','1789','胜利街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4075','1789','永吉街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4074','1789','明桦街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4073','1788','前进乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4072','1788','乌林朝鲜族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4071','1788','庆岭镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4070','1788','松江镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4069','1788','天北镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4068','1788','黄松甸镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4067','1788','漂河镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4066','1788','白石山镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4065','1788','天岗镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4064','1788','新站镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4063','1788','新农街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4062','1788','河北街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4061','1788','拉法街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4060','1788','奶子山街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4059','1788','河南街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4058','1788','长安街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4057','1788','民主街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4056','1792','黄榆乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4055','1792','金家满族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4054','1792','万昌镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4053','1792','岔路河镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4052','1792','一拉溪镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4051','1792','北大湖镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4050','1792','西阳镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4049','1792','双河镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4048','1792','口前镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4047','1787','小白山乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4046','1787','前二道乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4045','1787','江南乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4044','1787','旺起镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4043','1787','红旗街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4042','1787','高新街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4041','1787','丰满街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4040','1787','沿丰街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4039','1787','石井街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4038','1787','江南街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4037','1787','泰山街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4036','1784','欢喜乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4035','1784','越北镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4034','1784','搜登站镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4033','1784','大绥河镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4032','1784','黄旗屯街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4031','1784','北山街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4030','1784','临江街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4029','1784','长春路街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4028','1784','致和街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4027','1784','北极街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4026','1784','向阳街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4025','1784','青岛街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4024','1784','大东街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4023','1784','南京街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4022','1784','德胜街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4021','1786','金珠乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4020','1786','江北乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4019','1786','大口钦镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4018','1786','江密峰镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4017','1786','缸窑镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4016','1786','乌拉街镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4015','1786','承德街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4014','1786','东城街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4013','1786','靠山街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4012','1786','榆树街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4011','1786','遵义街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4010','1786','新安街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4009','1786','山前街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4008','1786','新吉林街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4007','1786','龙潭街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4006','1786','泡子沿街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4005','1786','铁东街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4004','1786','湘潭街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4003','1786','龙华街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4002','1785','土城子满族朝鲜族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4001','1785','两家子满族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4000','1785','左家镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3999','1785','桦皮厂镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3998','1785','孤店子镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3997','1785','双吉街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3996','1785','延江街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3995','1785','新建街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3994','1785','哈达湾街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3993','1785','通江街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3992','1785','莲花街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3991','1785','民主街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3990','1785','站前街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3989','1785','延安街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3988','1785','新地号街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3987','1785','东局子街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3986','1785','文庙街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3985','1785','兴华街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3984','1751','大坪塘乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3983','1751','知市坪乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3982','1751','高山乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3981','1751','陶岭乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3980','1751','三井乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3979','1751','金盆圩乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3978','1751','十字乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3977','1751','毛里乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3976','1751','茂家乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3975','1751','门楼下瑶族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3974','1751','冷水井乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3973','1751','莲花乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3972','1751','新隆镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3971','1751','石羊镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3970','1751','新圩镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3969','1751','枧头镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3968','1751','骥村镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3967','1751','金陵镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3966','1751','龙泉镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3965','1750','太平圩乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3964','1750','土市乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3963','1750','祠堂圩乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3962','1750','荆竹瑶族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3961','1750','大桥瑶族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3960','1750','紫良瑶族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3959','1750','浆洞瑶族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3958','1750','犁头瑶族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3957','1750','汇源瑶族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3956','1750','新圩镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3955','1750','所城镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3954','1750','楠市镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3953','1750','毛俊镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3952','1750','竹管寺镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3951','1750','塔峰镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3950','1741','大锡乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3949','1741','未竹口乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3948','1741','贝江乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3947','1741','湘江乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3946','1741','花江乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3945','1741','务江乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3944','1741','两岔河乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3943','1741','清塘壮族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3942','1741','大石桥乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3941','1741','桥市乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3940','1741','界牌乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3939','1741','码市镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3938','1741','水口镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3937','1741','大圩镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3936','1741','小圩镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3935','1741','河路口镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3934','1741','涛圩镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3933','1741','白芒营镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3932','1741','大路铺镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3931','1741','东田镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3930','1741','桥头铺镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3929','1741','沱江镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3928','1748','源口瑶族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3927','1748','兰溪瑶族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3926','1748','千家峒瑶族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3925','1748','黄甲岭乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3924','1748','松柏瑶族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3923','1748','迴龙圩镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3922','1748','粗石江镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3921','1748','桃川镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3920','1748','夏层铺镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3919','1748','允山镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3918','1748','上江圩镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3917','1748','潇浦镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3916','1749','桐木漯瑶族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3915','1749','棉花坪瑶族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3914','1749','荒塘瑶族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3913','1749','保安乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3912','1749','九嶷瑶族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3911','1749','鲤溪镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3910','1749','清水桥镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3909','1749','柏家坪镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3908','1749','中和镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3907','1749','仁和镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3906','1749','禾亭镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3905','1749','太平镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3904','1749','冷水镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3903','1749','湾井镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3902','1749','水市镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3901','1749','天堂镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3900','1749','舜陵镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3899','1746','理家坪乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3898','1746','上梧江瑶族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3897','1746','塘底乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3896','1746','茶林乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3895','1746','麻江乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3894','1746','何家洞乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3893','1746','永江乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3892','1746','尚仁里乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3891','1746','平福头乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3890','1746','五里牌镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3889','1746','江村镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3888','1746','泷泊镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3887','1745','水岭乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3886','1745','川岩乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3885','1745','大江口乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3884','1745','南桥镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3883','1745','大盛镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3882','1745','花桥镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3881','1745','新圩江镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3880','1745','芦洪市镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3879','1745','鹿马桥镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3878','1745','端桥铺镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3877','1745','井头圩镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3876','1745','石期市镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3875','1745','横塘镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3874','1745','紫溪市镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3873','1745','大庙口镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3872','1745','白牙市镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3871','1744','内下乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3870','1744','上司源乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3869','1744','石鼓源乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3868','1744','白果市乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3867','1744','凤凰乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3866','1744','晒北滩瑶族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3865','1744','小金洞乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3864','1744','金洞镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3863','1744','龚家坪镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3862','1744','文明镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3861','1744','文富市镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3860','1744','黎家坪镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3859','1744','大村甸镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3858','1744','七里桥镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3857','1744','下马渡镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3856','1744','羊角塘镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3855','1744','梅溪镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3854','1744','潘市镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3853','1744','进宝塘镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3852','1744','黄泥塘镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3851','1744','白水镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3850','1744','八宝镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3849','1744','肖家村镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3848','1744','三口塘镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3847','1744','大忠桥镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3846','1744','茅竹镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3845','1744','观音滩镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3844','1744','浯溪街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3843','1744','长虹街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3842','1744','龙山街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3841','1742','杨村甸乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3840','1742','珊瑚乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3839','1742','仁湾镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3838','1742','蔡市镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3837','1742','岚角山镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3836','1742','伊塘镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3835','1742','竹山桥镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3834','1742','上岭桥镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3833','1742','黄阳司镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3832','1742','高溪市镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3831','1742','牛角坝镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3830','1742','普利桥镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3829','1742','花桥街镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3828','1742','凤凰街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3827','1742','梧桐街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3826','1742','杨家桥街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3825','1742','肖家园街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3824','1742','菱角山街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3823','1742','梅湾街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3822','1743','梳子铺乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3821','1743','凼底乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3820','1743','石山脚乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3819','1743','大庆坪乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3818','1743','石岩头镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3817','1743','接履桥镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3816','1743','邮亭圩镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3815','1743','菱角塘','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3814','1743','富家桥镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3813','1743','黄田铺镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3812','1743','水口山镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3811','1743','珠山镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3810','1743','徐家井街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3809','1743','朝阳街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3808','1743','七里店街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3807','1743','南津渡街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3806','1747','洪塘营瑶族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3805','1747','横岭瑶族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3804','1747','井塘瑶族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3803','1747','审章塘瑶族乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3802','1747','东门乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3801','1747','白芒铺乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3800','1747','上关乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3799','1747','新车乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3798','1747','万家庄乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3797','1747','营江乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3796','1747','桥头乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3795','1747','乐福堂乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3794','1747','富塘乡','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3793','1747','柑子园镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3792','1747','白马渡镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3791','1747','四马桥镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3790','1747','蚣坝镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3789','1747','祥霖铺镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3788','1747','清塘镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3787','1747','仙子脚镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3786','1747','寿雁镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3785','1747','梅花镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3784','1747','西洲街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3783','1747','濂溪街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3782','692','鳌头','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3781','692','太平','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3780','692','吕田','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3779','692','良口','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3778','692','温泉','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3777','692','江埔','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3776','692','城郊','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3775','692','街口','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3774','3765','小楼','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3773','3765','派潭','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3772','3765','中新','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3771','3765','新塘','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3770','3765','石滩','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3769','3765','正果','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3768','3765','朱村','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3767','3765','增江','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3766','3765','荔城','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3765','76','增城市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3764','3758','九龙镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3763','3758','永和街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3762','3758','联和街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3761','3758','东区街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3760','3758','夏港街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3759','3758','萝岗街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3758','76','萝岗区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3757','3752','横沥镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3756','3752','黄阁镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3755','3752','万项沙镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3754','3752','珠江街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3753','3752','南沙街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3752','76','南沙区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3751','701','雅瑶','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3750','701','花东','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3749','701','狮岭','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3748','701','赤坭','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3747','701','炭步','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3746','701','花山','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3745','701','梯面','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3744','701','新华街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3743','700','石碁镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3742','700','榄核镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3741','700','大岗镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3740','700','东涌镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3739','700','石楼镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3738','700','化龙镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3737','700','新造镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3736','700','南村镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3735','700','钟村镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3734','700','沙湾镇','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3733','700','洛浦街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3732','700','大石街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3731','700','小谷围街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3730','700','桥南街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3729','700','东环街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3728','700','沙头街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3727','700','市桥街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3726','699','长洲街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3725','699','荔联街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3724','699','南岗街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3723','699','穗东街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3722','699','文冲街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3721','699','大沙街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3720','699','鱼珠街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3719','699','红山街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3718','699','黄埔街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3717','695','钟落潭','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3716','695','江高','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3715','695','太和','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3714','695','人和','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3713','695','嘉禾','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3712','695','石井','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3711','695','金沙','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3710','695','均禾','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3709','695','永平','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3708','695','京溪','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3707','695','同和','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3706','695','三元里','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3705','695','新市','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3704','695','棠景','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3703','695','黄石','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3702','695','同德','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3701','695','景泰','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3700','695','松洲','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3699','697','中南街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3698','697','东沙街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3697','697','海龙街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3696','697','东漖街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3695','697','茶滘街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3694','697','石围塘街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3693','697','花地街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3692','697','冲口街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3691','697','白鹤洞街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3690','697','桥中街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3689','697','站前街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3688','697','西村街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3687','697','南源街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3686','697','彩虹街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3685','697','金花街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3684','697','龙津街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3683','697','逢源街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3682','697','昌华街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3681','697','多宝街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3680','697','华林街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3679','697','岭南街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3678','697','沙面街道','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3677','696','华洲','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3676','696','官洲','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3675','696','琶洲','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3674','696','南洲','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3673','696','昌岗','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3672','696','江南中','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3671','696','南石头','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3670','696','南华西','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3669','696','江海','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3668','696','瑞宝','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3667','696','沙园','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3666','696','龙凤','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3665','696','凤阳','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3664','696','海幢','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3663','696','素社','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3662','696','滨江','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3661','696','新港','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3660','696','赤岗','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3659','698','登峰','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3658','698','矿泉','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3657','698','黄花岗','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3656','698','梅花村','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3655','698','华乐','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3654','698','建设','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3653','698','白云','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3652','698','珠光','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3651','698','大塘','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3650','698','大东','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3649','698','农林','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3648','698','东湖','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3647','698','人民','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3646','698','大新','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3645','698','诗书','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3644','698','光塔','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3643','698','东风','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3642','698','流花','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3641','698','六榕','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3640','698','北京','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3639','698','广卫','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3638','698','洪桥','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3637','3627','清水塘','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3636','3627','云泉','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3635','3627','西坑','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3634','3627','恒福','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3633','3627','淘金北','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3632','3627','横枝岗','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3631','3627','黄田','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3630','3627','狮带岗','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3629','3627','下塘','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3628','3627','童心','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3626','3417','水荫四横路','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3625','3417','永福正街','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3624','3417','新一街','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3623','3417','先烈东横路','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3622','3417','濂泉西','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3621','3417','左竹园','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3620','3417','西街','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3607','3425','广和','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3606','3425','天荣','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3605','3425','天河村','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3604','3425','大道中','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3603','3425','天河直街','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3602','3425','体育村','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3601','3425','天河东','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3600','3425','南雅苑','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3599','3425','南二路','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3598','3425','体育东','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3597','3425','体育西','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3596','3425','育蕾路','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3595','3425','南一路','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3594','3421','天誉','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3593','3421','恒怡','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3592','3421','天河北','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3591','3421','天寿','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3590','3421','紫荆','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3589','3421','雅康','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3588','3421','侨庭','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3587','3421','德荣','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3586','3421','禺东西','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3585','3421','花生寮','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3584','3421','润和','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3583','3420','陶庄','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3582','3420','天河山庄','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3581','3420','范屋','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3580','3420','天平架','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3579','3420','濂泉','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3578','3420','沙和','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3577','3418','龙口花苑','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3576','3418','华标','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3575','3418','鸿景园','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3574','3418','金帝','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3573','3418','金田','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3572','3418','暨大','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3571','3418','华师大','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3569','3418','瑞华','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3567','3418','穗园','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3566','3418','南苑','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3565','3418','松岗','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3564','3418','龙口西','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3563','3418','冠军','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3562','3418','石东','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3561','3418','东海','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3560','3418','东城社区','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3559','3418','南大','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3558','3418','逢源','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3557','3418','朝阳','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3556','3418','南镇','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3555','3418','绿荷','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3554','3415','高胜','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3553','3415','白石岗','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3552','3415','农科所','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3551','3415','华文','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3550','3415','五所','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3549','3415','瘦狗岭','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3548','3415','广工大','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3547','3415','华农','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3546','3415','华工','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3545','3415','东莞庄','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3544','3415','岳洲','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3543','3415','茶山','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3542','3422','南国花园','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3541','3422','誉城苑','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3540','3422','远洋明珠','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3539','3422','利民','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3538','3422','猎德中心','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3537','3423','金园','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3536','3423','金城','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3535','3423','跑马地','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3534','3423','潭骏','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3533','3423','新庆村','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3532','3423','杨箕东','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3531','3423','冼村','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3530','3426','天源','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3529','3426','南兴','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3528','3426','中人','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3527','3426','下元岗','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3526','3426','上元岗','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3525','3430','柯木塱外','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3524','3430','柯木塱','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3523','3430','渔沙坦外','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3522','3430','渔沙坦','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3521','3428','绿洲','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3520','3428','育龙','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3519','3428','西社','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3518','3428','上社','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3517','3428','中南','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3516','3429','兴科','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3515','3429','兴安','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3514','3429','建丽','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3513','3429','科艺','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3512','3429','岑村东','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3511','3429','岑村','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3510','3429','乐意居','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3509','3429','天鹅花苑','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3508','3429','长湴外','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3507','3429','长湴','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3506','3433','凌塘','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3505','3433','沐陂','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3504','3433','迎宾','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3503','3433','新景','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3502','3433','新园','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3501','3433','新塘','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3500','3432','吉山西','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3499','3432','吉山东','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3498','3432','珠村北','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3497','3432','珠村南','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3496','3424','文昌','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3495','3424','环宇','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3494','3424','东晖','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3493','3424','东成','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3492','3424','骏景','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3491','3424','穗东','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3490','3424','华港','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3489','3424','腰岗','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3488','3424','翠湖','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3486','3424','科韵','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3485','3416','昌乐园','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3484','3416','新街','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3483','3416','四横路','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3482','3416','四横东路','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3481','3416','新墟','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3480','3416','美林','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3479','3416','东和','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3478','3416','程界东','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3477','3416','程界西','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3476','3416','员侨','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3475','3416','怡景','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3474','3416','华颖','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3473','3416','金莲','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3472','3416','天一庄','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3471','3416','侨颖','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3470','3416','绢麻','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3469','3416','新村','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3468','3416','二横路','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3467','3427','黄村天雅','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3466','3427','黄村西','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3465','3427','荔苑','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3464','3427','江夏','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3463','3427','体委基地','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3462','3427','大观','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3461','3431','怡东','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3460','3431','天力居','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3459','3431','羊城花园','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3458','3431','莲溪','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3457','3431','宦溪','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3456','3431','石溪','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3455','3410','车陂北','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3454','3410','广氮','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3453','3410','美好','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3452','3410','东岸','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3451','3410','沙美','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3450','3410','西岸','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3449','3410','龙口','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3448','3410','天雅','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3447','3410','西湖','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3446','3410','东圃','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3445','3413','天安','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3444','3413','丰乐','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3443','3413','祥龙','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3442','3413','加拿大花园','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3441','3413','荷光西','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3440','3413','荷光东','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3439','3413','邮电','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3438','3413','达善','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3437','3413','华景东','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3436','3413','华景西','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3435','3413','棠德北','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3434','3413','棠德南','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3433','693','新塘','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3432','693','珠吉','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3431','693','前进','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3430','693','凤凰','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3429','693','长兴','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3428','693','龙洞','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3427','693','黄村','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3426','693','元岗','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3425','693','天河南','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3424','693','天园','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3423','693','冼村','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3422','693','猎德','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3421','693','林和','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3420','693','沙东','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3419','693','兴华','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3418','693','石牌','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3417','693','沙河','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3416','693','员村','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3415','693','五山','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3413','693','棠下','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3412','3409','加悦大夏','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3411','3409','天河广场','5','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3410','693','车陂','4','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3408','3401','肥西县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3407','3401','肥东县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3406','3401','长丰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3405','3401','包河区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3404','3401','蜀山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3403','3401','瑶海区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3402','3401','庐阳区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3401','3','合肥','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3400','397','澎湖县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3399','397','花莲县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3398','397','台东县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3397','397','屏东县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3396','397','云林县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3395','397','南投县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3394','397','彰化县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3393','397','苗栗县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3392','397','桃园县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3391','397','宜兰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3390','397','嘉义','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3389','397','新竹','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3388','397','台南','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3387','397','台中','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3386','397','基隆','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3385','397','高雄','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3384','397','台北','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3383','396','澳门','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3382','395','离岛区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3381','395','中西区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3380','395','荃湾区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3379','395','南区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3378','395','北区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3377','395','油尖旺区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3376','395','湾仔区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3375','395','大埔区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3374','395','西贡区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3373','395','深水埗区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3372','395','元朗区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3371','395','葵青区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3370','395','屯门区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3369','395','九龙城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3368','395','黄大仙区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3367','395','观塘区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3366','395','东区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3365','395','沙田区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3364','394','秀山','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3363','394','酉阳','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3362','394','彭水','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3361','394','石柱','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3360','394','忠县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3359','394','云阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3358','394','奉节县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3357','394','巫山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3356','394','巫溪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3355','394','开县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3354','394','梁平县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3353','394','城口县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3352','394','丰都县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3351','394','武隆县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3350','394','垫江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3349','394','璧山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3348','394','荣昌县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3347','394','大足县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3346','394','铜梁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3345','394','潼南县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3344','394','綦江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3343','394','双桥区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3342','394','长寿区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3341','394','黔江开发区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3340','394','渝中区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3339','394','九龙坡区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3338','394','江北区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3337','394','涪陵区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3336','394','巴南区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3335','394','沙坪坝区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3334','394','北碚区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3333','394','万州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3332','394','大渡口区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3331','394','万盛区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3330','394','渝北区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3329','394','南岸区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3328','394','永川区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3327','394','南川区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3326','394','江津区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3325','394','合川区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3324','393','龙游县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3323','393','开化县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3322','393','常山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3321','393','江山市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3320','393','衢州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3319','392','嵊泗县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3318','392','岱山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3317','392','普陀区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3316','392','定海区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3315','391','泰顺县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3314','391','文成县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3313','391','苍南县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3312','391','平阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3311','391','永嘉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3310','391','洞头县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3309','391','乐清市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3308','391','瑞安市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3307','391','瓯海区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3306','391','龙湾区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3305','391','鹿城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3304','390','仙居县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3303','390','天台县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3302','390','三门县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3301','390','玉环县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3300','390','临海市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3299','390','温岭市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3298','390','路桥区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3297','390','黄岩区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3296','390','椒江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3295','389','诸暨市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3294','389','新昌县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3293','389','绍兴县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3292','389','嵊州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3291','389','上虞市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3290','389','越城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3289','388','宁海县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3288','388','象山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3287','388','奉化市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3286','388','慈溪市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3285','388','余姚市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3284','388','鄞州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3283','388','北仑区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3282','388','镇海区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3281','388','江北区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3280','388','江东区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3279','388','海曙区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3278','387','景宁','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3277','387','庆元县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3276','387','云和县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3275','387','松阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3274','387','遂昌县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3273','387','缙云县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3272','387','青田县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3271','387','龙泉市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3270','387','莲都区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3269','386','磐安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3268','386','浦江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3267','386','武义县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3266','386','永康市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3265','386','东阳市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3264','386','赤岸镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3263','386','苏溪镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3262','386','大陈镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3261','386','义亭镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3260','386','上溪镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3259','386','佛堂镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3258','386','市区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3257','386','兰溪市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3256','386','金东区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3255','386','婺城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3254','385','海盐县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3253','385','桐乡市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3252','385','平湖市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3251','385','嘉善县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3250','385','海宁市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3249','385','秀洲区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3248','385','南湖区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3247','384','安吉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3246','384','长兴县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3245','384','德清县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3244','384','南浔区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3243','384','吴兴区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3242','383','淳安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3241','383','桐庐县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3240','383','临安市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3239','383','富阳市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3238','383','建德市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3237','383','市郊','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3236','383','余杭区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3235','383','萧山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3234','383','江干区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3233','383','滨江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3232','383','拱墅区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3231','383','下城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3230','383','上城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3229','383','西湖区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3228','382','水富县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3227','382','威信县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3226','382','彝良县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3225','382','镇雄县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3224','382','绥江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3223','382','永善县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3222','382','大关县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3221','382','盐津县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3220','382','巧家县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3219','382','鲁甸县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3218','382','昭阳区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3217','381','元江','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3216','381','新平','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3215','381','峨山','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3214','381','易门县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3213','381','华宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3212','381','通海县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3211','381','澄江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3210','381','江川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3209','381','红塔区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3208','380','勐腊县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3207','380','勐海县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3206','380','景洪市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3205','379','富宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3204','379','广南县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3203','379','丘北县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3202','379','马关县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3201','379','麻栗坡县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3200','379','西畴县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3199','379','砚山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3198','379','文山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3197','378','沾益县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3196','378','会泽县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3195','378','富源县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3194','378','罗平县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3193','378','师宗县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3192','378','陆良县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3191','378','马龙县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3190','378','宣威市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3189','378','麒麟区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3188','377','沧源','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3187','377','耿马','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3186','377','双江','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3185','377','镇康县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3184','377','永德县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3183','377','云县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3182','377','凤庆县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3181','377','临翔区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3180','376','屏边','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3179','376','河口','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3178','376','金平','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3177','376','红河县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3176','376','元阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3175','376','弥勒县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3174','376','石屏县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3173','376','建水县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3172','376','绿春县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3171','376','开远市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3170','376','个旧市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3169','376','蒙自县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3168','376','泸西县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3167','375','维西','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3166','375','德钦县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3165','375','香格里拉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3164','374','陇川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3163','374','盈江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3162','374','梁河县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3161','374','瑞丽市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3160','374','潞西市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3159','373','巍山','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3158','373','南涧','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3157','373','漾濞','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3156','373','鹤庆县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3155','373','剑川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3154','373','洱源县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3153','373','云龙县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3152','373','永平县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3151','373','弥渡县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3150','373','宾川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3149','373','祥云县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3148','373','大理市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3147','372','禄丰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3146','372','武定县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3145','372','元谋县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3144','372','永仁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3143','372','大姚县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3142','372','姚安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3141','372','南华县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3140','372','牟定县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3139','372','双柏县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3138','372','楚雄市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3137','371','昌宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3136','371','龙陵县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3135','371','腾冲县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3134','371','施甸县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3133','371','隆阳区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3132','370','华坪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3131','370','永胜县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3130','370','玉龙','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3129','370','宁蒗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3128','370','古城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3127','369','西盟','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3126','369','澜沧','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3125','369','孟连','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3124','369','江城','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3123','369','镇沅','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3122','369','景谷','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3121','369','景东','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3120','369','墨江','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3119','369','思茅区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3118','369','宁洱','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3117','368','贡山','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3116','368','福贡县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3115','368','泸水县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3114','368','兰坪','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3113','367','寻甸','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3112','367','禄劝','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3111','367','石林县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3110','367','嵩明县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3109','367','宜良县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3108','367','富民县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3107','367','晋宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3106','367','呈贡县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3105','367','安宁市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3104','367','东川区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3103','367','西山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3102','367','官渡区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3101','367','五华区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3100','367','盘龙区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3099','366','察布查尔','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3098','366','尼勒克县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3097','366','特克斯县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3096','366','昭苏县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3095','366','吉木乃县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3094','366','和布克赛尔','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3093','366','裕民县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3092','366','新源县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3091','366','青河县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3090','366','托里县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3089','366','哈巴河县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3088','366','巩留县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3087','366','沙湾县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3086','366','霍城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3085','366','福海县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3084','366','伊宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3083','366','富蕴县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3082','366','额敏县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3081','366','乌苏市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3080','366','奎屯市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3079','366','布尔津县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3078','366','伊宁市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3077','366','布克赛尔','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3076','366','阿勒泰市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3075','365','五家渠市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3074','364','托克逊县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3073','364','鄯善县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3072','364','吐鲁番市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3071','363','图木舒克市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3070','362','石河子市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3069','361','乌恰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3068','361','阿合奇县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3067','361','阿克陶县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3066','361','阿图什市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3065','360','克拉玛依市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3064','359','塔什库尔干','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3063','359','巴楚县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3062','359','伽师县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3061','359','岳普湖县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3060','359','麦盖提县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3059','359','叶城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3058','359','莎车县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3057','359','泽普县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3056','359','英吉沙县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3055','359','疏勒县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3054','359','疏附县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3053','359','喀什市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3052','358','民丰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3051','358','于田县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3050','358','策勒县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3049','358','洛浦县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3048','358','皮山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3047','358','墨玉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3046','358','和田县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3045','358','和田市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3044','357','巴里坤','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3043','357','伊吾县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3042','357','哈密市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3041','356','木垒','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3040','356','吉木萨尔县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3039','356','奇台县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3038','356','玛纳斯县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3037','356','阜康市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3036','356','昌吉市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3035','356','米泉市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3034','356','呼图壁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3033','355','温泉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3032','355','精河县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3031','355','博乐市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3030','354','博湖县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3029','354','和硕县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3028','354','和静县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3027','354','焉耆','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3026','354','且末县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3025','354','若羌县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3024','354','尉犁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3023','354','轮台县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3022','354','库尔勒市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3021','353','阿拉尔市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3020','352','柯坪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3019','352','阿瓦提县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3018','352','乌什县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3017','352','拜城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3016','352','新和县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3015','352','沙雅县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3014','352','库车县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3013','352','温宿县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3012','352','阿克苏市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3011','351','乌鲁木齐县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3010','351','米东区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3009','351','达坂城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3008','351','头屯河区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3007','351','水磨沟区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3006','351','新市区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3005','351','沙依巴克区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3004','351','天山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3003','350','浪卡子县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3002','350','错那县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3001','350','隆子县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3000','350','加查县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2999','350','洛扎县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2998','350','措美县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2997','350','曲松县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2996','350','琼结县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2995','350','桑日县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2994','350','贡嘎县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2993','350','扎囊县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2992','350','乃东县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2991','349','岗巴县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2990','349','萨嘎县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2989','349','聂拉木县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2988','349','吉隆县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2987','349','亚东县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2986','349','仲巴县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2985','349','定结县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2984','349','康马县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2983','349','仁布县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2982','349','白朗县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2981','349','谢通门县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2980','349','昂仁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2979','349','拉孜县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2978','349','萨迦县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2977','349','定日县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2976','349','江孜县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2975','349','南木林县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2974','349','日喀则市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2973','348','尼玛县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2972','348','巴青县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2971','348','班戈县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2970','348','索县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2969','348','申扎县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2968','348','安多县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2967','348','聂荣县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2966','348','比如县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2965','348','嘉黎县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2964','348','那曲县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2963','347','朗县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2962','347','察隅县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2961','347','波密县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2960','347','墨脱县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2959','347','米林县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2958','347','工布江达县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2957','347','林芝县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2956','346','边坝县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2955','346','洛隆县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2954','346','芒康县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2953','346','左贡县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2952','346','八宿县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2951','346','察雅县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2950','346','丁青县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2949','346','类乌齐县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2948','346','贡觉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2947','346','江达县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2946','346','昌都县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2945','345','措勤县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2944','345','改则县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2943','345','革吉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2942','345','日土县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2941','345','札达县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2940','345','普兰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2939','345','噶尔县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2938','344','墨竹工卡县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2937','344','达孜县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2936','344','堆龙德庆县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2935','344','曲水县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2934','344','尼木县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2933','344','当雄县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2932','344','林周县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2931','344','城关区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2930','343','蓟县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2929','343','静海县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2928','343','宁河县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2927','343','经济开发区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2926','343','宝坻区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2925','343','武清区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2924','343','大港区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2923','343','汉沽区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2922','343','塘沽区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2921','343','北辰区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2920','343','西青区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2919','343','津南区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2918','343','东丽区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2917','343','红桥区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2916','343','河东区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2915','343','河北区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2914','343','南开区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2913','343','河西区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2912','343','和平区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2911','342','古蔺县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2910','342','叙永县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2909','342','合江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2908','342','泸县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2907','342','龙马潭区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2906','342','纳溪区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2905','342','江阳区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2904','341','富顺县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2903','341','荣县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2902','341','沿滩区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2901','341','贡井区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2900','341','自流井区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2899','341','大安区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2898','340','乐至县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2897','340','安岳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2896','340','简阳市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2895','340','雁江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2894','339','屏山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2893','339','兴文县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2892','339','筠连县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2891','339','珙县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2890','339','高县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2889','339','长宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2888','339','江安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2887','339','南溪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2886','339','宜宾县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2885','339','翠屏区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2884','338','宝兴县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2883','338','芦山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2882','338','天全县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2881','338','石棉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2880','338','汉源县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2879','338','荥经县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2878','338','名山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2877','338','雨城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2876','337','大英县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2875','337','射洪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2874','337','蓬溪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2873','337','安居区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2872','337','船山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2871','336','盐边县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2870','336','米易县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2869','336','仁和区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2868','336','西  区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2867','336','东  区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2866','335','隆昌县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2865','335','资中县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2864','335','威远县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2863','335','东兴区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2862','335','市中区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2861','334','西充县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2860','334','嘉陵区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2859','334','高坪区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2858','334','顺庆区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2857','334','仪陇县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2856','334','蓬安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2855','334','营山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2854','334','南部县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2853','334','阆中市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2852','333','青神县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2851','333','丹棱县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2850','333','洪雅县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2849','333','彭山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2848','333','仁寿县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2847','333','东坡区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2846','332','木里','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2845','332','雷波县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2844','332','美姑县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2843','332','甘洛县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2842','332','越西县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2841','332','冕宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2840','332','喜德县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2839','332','昭觉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2838','332','金阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2837','332','布拖县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2836','332','普格县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2835','332','宁南县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2834','332','会东县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2833','332','会理县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2832','332','德昌县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2831','332','盐源县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2830','332','西昌市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2829','331','马边','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2828','331','峨边','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2827','331','沐川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2826','331','夹江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2825','331','井研县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2824','331','犍为县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2823','331','乐山市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2822','331','峨眉山市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2821','330','苍溪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2820','330','剑阁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2819','330','青川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2818','330','旺苍县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2817','330','朝天区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2816','330','元坝区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2815','330','利州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2814','329','邻水县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2813','329','武胜县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2812','329','岳池县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2811','329','华蓥市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2810','329','广安区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2809','328','得荣县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2808','328','巴塘县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2807','328','色达县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2806','328','稻城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2805','328','石渠县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2804','328','乡城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2803','328','德格县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2802','328','理塘县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2801','328','白玉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2800','328','道孚县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2799','328','新龙县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2798','328','雅江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2797','328','甘孜县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2796','328','九龙县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2795','328','炉霍县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2794','328','泸定县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2793','328','丹巴县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2792','328','康定县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2791','327','中江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2790','327','罗江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2789','327','绵竹市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2788','327','什邡市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2787','327','广汉市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2786','327','旌阳区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2785','326','渠县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2784','326','大竹县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2783','326','开江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2782','326','宣汉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2781','326','达县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2780','326','万源市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2779','326','通川区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2778','325','平昌县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2777','325','南江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2776','325','通江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2775','325','巴州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2774','324','红原县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2773','324','若尔盖县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2772','324','阿坝县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2771','324','壤塘县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2770','324','黑水县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2769','324','小金县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2768','324','金川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2767','324','九寨沟县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2766','324','松潘县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2765','324','茂县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2764','324','理县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2763','324','汶川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2762','324','马尔康县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2761','323','北川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2760','323','梓潼县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2759','323','安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2758','323','平武县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2757','323','三台县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2756','323','盐亭县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2755','323','江油市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2754','323','游仙区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2753','323','涪城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2752','322','新津县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2751','322','蒲江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2750','322','大邑县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2749','322','郫县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2748','322','双流县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2747','322','金堂县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2746','322','崇州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2745','322','邛崃市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2744','322','彭州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2743','322','都江堰市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2742','322','新津县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2741','322','蒲江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2740','322','大邑县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2739','322','郫县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2738','322','双流县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2737','322','金堂县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2736','322','崇州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2735','322','邛崃市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2734','322','彭州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2733','322','都江堰市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2732','322','高新西区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2731','322','高新区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2730','322','温江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2729','322','新都区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2728','322','青白江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2727','322','龙泉驿区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2726','322','成华区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2725','322','武侯区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2724','322','金牛区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2723','322','锦江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2722','322','青羊区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2721','321','崇明县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2720','321','奉贤区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2719','321','金山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2718','321','青浦区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2717','321','宝山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2716','321','嘉定区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2715','321','松江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2714','321','南汇区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2713','321','黄浦区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2712','321','虹口区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2711','321','卢湾区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2710','321','静安区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2709','321','普陀区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2708','321','杨浦区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2707','321','浦东新区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2706','321','徐汇区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2705','321','闵行区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2704','321','闸北区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2703','321','长宁区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2702','320','子洲县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2701','320','清涧县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2700','320','吴堡县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2699','320','佳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2698','320','米脂县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2697','320','绥德县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2696','320','定边县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2695','320','靖边县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2694','320','横山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2693','320','府谷县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2692','320','神木县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2691','320','榆阳区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2690','319','黄陵县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2689','319','黄龙县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2688','319','宜川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2687','319','洛川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2686','319','富县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2685','319','甘泉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2684','319','志丹县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2683','319','安塞县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2682','319','子长县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2681','319','延川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2680','319','延长县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2679','319','宝塔区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2678','319','吴起县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2677','318','武功县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2676','318','淳化县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2675','318','旬邑县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2674','318','长武县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2673','318','彬县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2672','318','永寿县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2671','318','礼泉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2670','318','乾县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2669','318','泾阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2668','318','三原县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2667','318','兴平市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2666','318','杨陵区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2665','318','渭城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2664','318','秦都区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2663','317','富平县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2662','317','白水县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2661','317','蒲城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2660','317','澄城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2659','317','合阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2658','317','大荔县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2657','317','潼关县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2656','317','华县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2655','317','华阴市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2654','317','韩城市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2653','317','临渭区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2652','316','宜君县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2651','316','印台区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2650','316','王益区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2649','316','耀州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2648','315','柞水县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2647','315','镇安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2646','315','山阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2645','315','商南县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2644','315','丹凤县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2643','315','洛南县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2642','315','商州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2641','314','佛坪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2640','314','留坝县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2639','314','镇巴县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2638','314','略阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2637','314','宁强县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2636','314','勉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2635','314','西乡县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2634','314','洋县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2633','314','城固县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2632','314','南郑县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2631','314','汉台区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2630','313','太白县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2629','313','凤县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2628','313','麟游县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2627','313','千阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2626','313','陇县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2625','313','眉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2624','313','扶风县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2623','313','岐山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2622','313','凤翔县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2621','313','金台区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2620','313','渭滨区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2619','313','陈仓区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2618','312','白河县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2617','312','旬阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2616','312','镇坪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2615','312','平利县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2614','312','岚皋县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2613','312','紫阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2612','312','宁陕县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2611','312','石泉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2610','312','汉阴县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2609','312','汉滨区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2608','311','高陵县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2607','311','户县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2606','311','周至县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2605','311','蓝田县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2604','311','长安区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2603','311','临潼区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2602','311','阎良区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2601','311','未央区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2600','311','灞桥区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2599','311','雁塔区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2598','311','碑林区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2597','311','新城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2596','311','莲湖区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2595','310','芮城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2594','310','平陆县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2593','310','夏县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2592','310','垣曲县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2591','310','绛县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2590','310','新绛县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2589','310','稷山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2588','310','闻喜县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2587','310','万荣县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2586','310','临猗县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2585','310','河津市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2584','310','永济市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2583','310','盐湖区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2582','309','盂县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2581','309','平定县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2580','309','郊区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2579','309','矿区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2578','309','城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2577','308','偏关县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2576','308','保德县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2575','308','河曲县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2574','308','岢岚县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2573','308','五寨县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2572','308','神池县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2571','308','静乐县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2570','308','宁武县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2569','308','繁峙县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2568','308','代县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2567','308','五台县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2566','308','定襄县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2565','308','原平市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2564','308','忻府区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2563','307','怀仁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2562','307','右玉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2561','307','应县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2560','307','山阴县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2559','307','平鲁区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2558','307','朔城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2557','306','交口县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2556','306','中阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2555','306','方山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2554','306','岚县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2553','306','石楼县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2552','306','柳林县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2551','306','临县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2550','306','兴县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2549','306','交城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2548','306','文水县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2547','306','汾阳市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2546','306','孝义市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2545','306','离石区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2544','306','离石市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2543','305','汾西县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2542','305','蒲县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2541','305','永和县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2540','305','隰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2539','305','大宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2538','305','乡宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2537','305','古县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2536','305','浮山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2535','305','安泽县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2534','305','吉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2533','305','洪洞县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2532','305','襄汾县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2531','305','翼城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2530','305','曲沃县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2529','305','霍州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2528','305','侯马市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2527','305','尧都区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2526','304','灵石县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2525','304','平遥县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2524','304','祁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2523','304','太谷县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2522','304','寿阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2521','304','昔阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2520','304','和顺县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2519','304','左权县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2518','304','榆社县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2517','304','介休市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2516','304','榆次区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2515','303','泽州县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2514','303','陵川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2513','303','阳城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2512','303','沁水县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2511','303','高平市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2510','303','城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2509','302','大同县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2508','302','左云县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2507','302','浑源县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2506','302','灵丘县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2505','302','广灵县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2504','302','天镇县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2503','302','阳高县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2502','302','新荣区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2501','302','南郊区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2500','302','矿区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2499','302','城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2498','301','沁源县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2497','301','武乡县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2496','301','长子县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2495','301','壶关县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2494','301','黎城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2493','301','平顺县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2492','301','屯留县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2491','301','襄垣县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2490','301','长治县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2489','301','潞城市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2488','301','沁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2487','301','郊区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2486','301','城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2485','300','古交市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2484','300','娄烦县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2483','300','阳曲县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2482','300','清徐县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2481','300','经济技术开发区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2480','300','民营经济开发区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2479','300','高新开发区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2478','300','晋源区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2477','300','万柏林区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2476','300','尖草坪区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2475','300','迎泽区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2474','300','小店区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2473','300','杏花岭区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2472','299','沂源县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2471','299','高青县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2470','299','桓台县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2469','299','周村区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2468','299','博山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2467','299','淄川区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2466','299','临淄区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2465','299','张店区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2464','298','滕州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2463','298','薛城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2462','298','台儿庄区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2461','298','峄城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2460','298','山亭区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2459','298','市中区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2458','297','长岛县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2457','297','海阳市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2456','297','栖霞市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2455','297','招远市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2454','297','蓬莱市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2453','297','莱州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2452','297','莱阳市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2451','297','龙口市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2450','297','开发区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2449','297','莱山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2448','297','牟平区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2447','297','福山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2446','297','芝罘区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2445','296','昌乐县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2444','296','临朐县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2443','296','昌邑市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2442','296','高密市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2441','296','安丘市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2440','296','寿光市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2439','296','诸城市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2438','296','青州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2437','296','奎文区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2436','296','坊子区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2435','296','寒亭区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2434','296','潍城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2433','295','文登市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2432','295','环翠区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2431','295','乳山市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2430','295','荣成市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2429','294','东平县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2428','294','宁阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2427','294','肥城市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2426','294','新泰市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2425','294','岱岳区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2424','294','泰山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2423','293','莒县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2422','293','五莲县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2421','293','岚山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2420','293','东港区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2419','292','临沭县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2418','292','蒙阴县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2417','292','莒南县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2416','292','平邑县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2415','292','费县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2414','292','苍山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2413','292','沂水县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2412','292','郯城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2411','292','沂南县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2410','292','河东区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2409','292','罗庄区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2408','292','兰山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2407','291','高唐县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2406','291','冠县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2405','291','东阿县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2404','291','茌平县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2403','291','莘县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2402','291','阳谷县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2401','291','临清市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2400','291','东昌府区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2399','290','钢城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2398','290','莱城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2397','289','梁山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2396','289','泗水县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2395','289','汶上县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2394','289','嘉祥县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2393','289','金乡县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2392','289','鱼台县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2391','289','微山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2390','289','邹城市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2389','289','兖州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2388','289','曲阜市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2387','289','任城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2386','289','市中区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2385','288','东明县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2384','288','定陶县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2383','288','鄄城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2382','288','郓城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2381','288','巨野县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2380','288','成武县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2379','288','单县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2378','288','曹县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2377','288','牡丹区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2376','287','广饶县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2375','287','利津县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2374','287','垦利县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2373','287','河口区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2372','287','东营区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2371','286','武城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2370','286','夏津县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2369','286','平原县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2368','286','齐河县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2367','286','临邑县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2366','286','庆云县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2365','286','宁津县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2364','286','禹城市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2363','286','乐陵市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2362','286','陵县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2361','286','德城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2360','285','邹平县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2359','285','博兴县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2358','285','沾化县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2357','285','无棣县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2356','285','阳信县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2355','285','惠民县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2354','285','滨城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2353','284','莱西市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2352','284','胶南市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2351','284','平度市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2350','284','即墨市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2349','284','胶州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2348','284','崂山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2347','284','黄岛区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2346','284','李沧区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2345','284','四方区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2344','284','城阳区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2343','284','市北区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2342','284','市南区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2341','283','商河县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2340','283','济阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2339','283','平阴县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2338','283','章丘市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2337','283','长清区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2336','283','历城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2335','283','槐荫区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2334','283','天桥区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2333','283','历下区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2332','283','市中区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2331','282','曲麻莱县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2330','282','囊谦县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2329','282','治多县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2328','282','称多县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2327','282','杂多县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2326','282','玉树县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2325','281','河南蒙古族自治县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2324','281','泽库县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2323','281','尖扎县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2322','281','同仁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2321','280','天峻县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2320','280','都兰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2319','280','乌兰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2318','280','格尔木市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2317','280','德令哈市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2316','279','贵南县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2315','279','兴海县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2314','279','贵德县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2313','279','同德县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2312','279','共和县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2311','278','循化','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2310','278','化隆','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2309','278','互助','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2308','278','民和','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2307','278','乐都县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2306','278','平安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2305','277','门源','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2304','277','刚察县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2303','277','祁连县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2302','277','海晏县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2301','276','玛多县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2300','276','久治县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2299','276','达日县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2298','276','甘德县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2297','276','班玛县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2296','276','玛沁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2295','275','大通','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2294','275','湟源县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2293','275','湟中县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2292','275','城北区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2291','275','城西区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2290','275','城东区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2289','275','城中区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2288','274','中宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2287','274','海原县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2286','274','沙坡头区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2285','273','同心县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2284','273','盐池县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2283','273','中宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2282','273','青铜峡市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2281','273','中卫县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2280','273','利通区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2279','272','平罗县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2278','272','陶乐县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2277','272','惠农区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2276','272','大武口区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2275','272','惠农县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2274','271','彭阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2273','271','泾源县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2272','271','隆德县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2271','271','西吉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2270','271','海原县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2269','271','原州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2268','270','贺兰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2267','270','永宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2266','270','灵武市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2265','270','兴庆区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2264','270','金凤区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2263','270','西夏区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2262','269','突泉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2261','269','扎赉特旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2260','269','科尔沁右翼中旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2259','269','科尔沁右翼前旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2258','269','阿尔山市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2257','269','乌兰浩特市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2256','268','多伦县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2255','268','正蓝旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2254','268','正镶白旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2253','268','镶黄旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2252','268','太仆寺旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2251','268','西乌珠穆沁旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2250','268','东乌珠穆沁旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2249','268','苏尼特右旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2248','268','苏尼特左旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2247','268','阿巴嘎旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2246','268','锡林浩特市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2245','268','二连浩特市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2244','267','四子王旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2243','267','察哈尔右翼后旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2242','267','察哈尔右翼中旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2241','267','察哈尔右翼前旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2240','267','凉城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2239','267','兴和县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2238','267','商都县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2237','267','卓资县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2236','267','丰镇市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2235','267','集宁区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2234','267','化德县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2233','266','海南区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2232','266','乌达区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2231','266','海勃湾区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2230','265','扎鲁特旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2229','265','奈曼旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2228','265','库伦旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2227','265','开鲁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2226','265','科尔沁左翼后旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2225','265','科尔沁左翼中旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2224','265','霍林郭勒市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2223','265','科尔沁区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2222','264','新巴尔虎右旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2221','264','新巴尔虎左旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2220','264','陈巴尔虎旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2219','264','鄂温克族自治旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2218','264','鄂伦春自治旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2217','264','阿荣旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2216','264','根河市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2215','264','额尔古纳市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2214','264','扎兰屯市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2213','264','牙克石市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2212','264','满洲里市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2211','264','莫力达瓦','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2210','264','海拉尔区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2209','263','伊金霍洛旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2208','263','乌审旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2207','263','杭锦旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2206','263','鄂托克旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2205','263','鄂托克前旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2204','263','准格尔旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2203','263','达拉特旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2202','263','东胜区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2201','262','敖汉旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2200','262','宁城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2199','262','喀喇沁旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2198','262','翁牛特旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2197','262','克什克腾旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2196','262','林西县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2195','262','巴林右旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2194','262','巴林左旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2193','262','阿鲁科尔沁旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2192','262','松山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2191','262','元宝山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2190','262','红山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2189','261','达尔罕茂明安联合旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2188','261','固阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2187','261','土默特右旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2186','261','白云矿区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2185','261','石拐区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2184','261','九原区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2183','261','东河区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2182','261','青山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2181','261','昆都仑区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2180','260','杭锦后旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2179','260','乌拉特后旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2178','260','乌拉特中旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2177','260','乌拉特前旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2176','260','磴口县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2175','260','五原县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2174','260','临河区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2173','259','额济纳旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2172','259','阿拉善右旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2171','259','阿拉善左旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2170','258','武川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2169','258','和林格尔县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2168','258','托克托县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2167','258','土默特左旗','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2166','258','清水河县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2165','258','赛罕区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2164','258','新城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2163','258','玉泉区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2162','258','回民区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2161','257','大石桥市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2160','257','盖州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2159','257','老边区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2158','257','鲅鱼圈区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2157','257','西市区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2156','257','站前区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2155','256','昌图县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2154','256','西丰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2153','256','铁岭县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2152','256','开原市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2151','256','调兵山市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2150','256','清河区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2149','256','银州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2148','255','盘山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2147','255','大洼县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2146','255','兴隆台区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2145','255','双台子区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2144','254','辽阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2143','254','灯塔市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2142','254','弓长岭区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2141','254','太子河区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2140','254','宏伟区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2139','254','文圣区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2138','254','白塔区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2137','253','义县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2136','253','黑山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2135','253','北镇市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2134','253','凌海市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2133','253','凌河区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2132','253','古塔区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2131','253','太和区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2130','252','建昌县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2129','252','绥中县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2128','252','兴城市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2127','252','连山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2126','252','南票区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2125','252','龙港区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2124','251','彰武县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2123','251','细河区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2122','251','清河门区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2121','251','太平区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2120','251','新邱区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2119','251','海州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2118','251','阜新','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2117','250','抚顺县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2116','250','新宾','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2115','250','清原','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2114','250','望花区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2113','250','东洲区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2112','250','新抚区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2111','250','顺城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2110','249','凤城市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2109','249','东港市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2108','249','宽甸','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2107','249','振安区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2106','249','元宝区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2105','249','振兴区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2104','248','建平县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2103','248','朝阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2102','248','凌源市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2101','248','北票市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2100','248','喀喇沁左翼蒙古族自治县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2099','248','龙城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2098','248','双塔区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2097','247','桓仁','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2096','247','南芬区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2095','247','溪湖区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2094','247','明山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2093','247','平山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2092','247','本溪','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2091','246','台安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2090','246','海城市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2089','246','岫岩','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2088','246','千山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2087','246','立山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2086','246','铁西区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2085','246','铁东区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2084','245','长海县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2083','245','庄河市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2082','245','普兰店市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2081','245','瓦房店市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2080','245','开发区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2079','245','金州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2078','245','旅顺口区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2077','245','甘井子区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2076','245','沙河口区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2075','245','中山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2074','245','西岗区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2073','244','法库县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2072','244','康平县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2071','244','辽中县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2070','244','新民市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2069','244','浑南新区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2068','244','于洪区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2067','244','沈北新区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2066','244','东陵区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2065','244','苏家屯区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2064','244','铁西区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2063','244','大东区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2062','244','和平区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2061','244','皇姑区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2060','244','沈河区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2059','243','余江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2058','243','贵溪市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2057','243','月湖区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2056','242','铜鼓县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2055','242','靖安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2054','242','宜丰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2053','242','上高县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2052','242','万载县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2051','242','奉新县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2050','242','高安市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2049','242','樟树市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2048','242','丰城市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2047','242','袁州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2046','241','分宜县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2045','241','渝水区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2044','240','婺源县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2043','240','万年县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2042','240','波阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2041','240','余干县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2040','240','弋阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2039','240','横峰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2038','240','铅山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2037','240','玉山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2036','240','广丰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2035','240','上饶县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2034','240','德兴市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2033','240','信州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2032','239','上栗县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2031','239','芦溪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2030','239','莲花县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2029','239','湘东区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2028','239','安源区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2027','238','彭泽县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2026','238','湖口县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2025','238','都昌县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2024','238','星子县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2023','238','德安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2022','238','永修县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2021','238','修水县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2020','238','武宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2019','238','九江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2018','238','瑞昌市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2017','238','庐山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2016','238','浔阳区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2015','237','浮梁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2014','237','乐平市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2013','237','昌江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2012','237','珠山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2011','236','永新县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2010','236','万安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2009','236','遂川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2008','236','泰和县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2007','236','永丰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2006','236','新干县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2005','236','峡江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2004','236','吉水县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2003','236','吉安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2002','236','井冈山市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2001','236','青原区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2000','236','吉州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1999','236','安福县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1998','235','石城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1997','235','寻乌县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1996','235','会昌县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1995','235','兴国县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1994','235','宁都县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1993','235','全南县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1992','235','定南县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1991','235','龙南县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1990','235','安远县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1989','235','崇义县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1988','235','上犹县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1987','235','大余县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1986','235','信丰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1985','235','赣县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1984','235','南康市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1983','235','瑞金市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1982','235','于都县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1981','235','章贡区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1980','234','广昌县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1979','234','东乡县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1978','234','资溪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1977','234','金溪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1976','234','宜黄县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1975','234','乐安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1974','234','崇仁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1973','234','南丰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1972','234','黎川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1971','234','南城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1970','234','临川区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1969','233','进贤县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1968','233','安义县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1967','233','新建县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1966','233','南昌县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1965','233','高新区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1964','233','昌北区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1963','233','红谷滩新区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1962','233','青山湖区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1961','233','湾里区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1960','233','青云谱区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1959','233','西湖区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1958','233','东湖区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1957','232','句容市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1956','232','扬中市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1955','232','丹阳市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1954','232','丹徒区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1953','232','润州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1952','232','京口区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1951','231','宝应县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1950','231','江都市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1949','231','高邮市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1948','231','仪征市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1947','231','邗江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1946','231','维扬区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1945','231','广陵区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1944','230','建湖县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1943','230','射阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1942','230','阜宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1941','230','滨海县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1940','230','响水县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1939','230','大丰市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1938','230','东台市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1937','230','盐都县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1936','230','盐都区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1935','230','亭湖区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1934','230','城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1933','229','睢宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1932','229','铜山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1931','229','沛县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1930','229','丰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1929','229','邳州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1928','229','新沂市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1927','229','泉山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1926','229','贾汪区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1925','229','九里区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1924','229','鼓楼区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1923','229','云龙区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1922','228','姜堰市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1921','228','泰兴市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1920','228','靖江市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1919','228','兴化市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1918','228','高港区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1917','228','海陵区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1916','227','泗洪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1915','227','泗阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1914','227','沭阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1913','227','宿豫县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1912','227','宿豫区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1911','227','宿城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1910','226','如东县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1909','226','海安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1908','226','海门市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1907','226','通州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1906','226','如皋市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1905','226','启东市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1904','226','经济开发区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1903','226','港闸区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1902','226','崇川区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1901','225','灌南县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1900','225','灌云县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1899','225','东海县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1898','225','赣榆县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1897','225','海州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1896','225','连云区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1895','225','新浦区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1894','224','金湖县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1893','224','盱眙县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1892','224','洪泽县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1891','224','涟水县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1890','224','淮阴区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1889','224','楚州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1888','224','清浦区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1887','224','清河区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1886','223','金坛市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1885','223','溧阳市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1884','223','武进区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1883','223','新北区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1882','223','郊区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1881','223','戚墅堰区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1880','223','钟楼区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1879','223','天宁区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1878','222','宜兴市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1877','222','江阴市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1876','222','新区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1875','222','滨湖区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1874','222','惠山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1873','222','锡山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1872','222','南长区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1871','222','北塘区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1870','222','崇安区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1869','221','太仓市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1868','221','吴江市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1867','221','开发区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1866','221','锦溪镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1865','221','千灯镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1864','221','周庄镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1863','221','张浦镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1862','221','淀山湖镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1861','221','花桥镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1860','221','陆家镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1859','221','周市镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1858','221','巴城镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1857','221','玉山镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1856','221','张家港市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1855','221','常熟市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1854','221','新区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1853','221','园区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1852','221','相城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1851','221','吴中区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1850','221','虎丘区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1849','221','平江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1848','221','金阊区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1847','221','沧浪区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1846','220','高淳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1845','220','溧水县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1844','220','六合区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1843','220','江宁区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1842','220','浦口区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1841','220','栖霞区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1840','220','下关区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1839','220','雨花台区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1838','220','秦淮区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1837','220','建邺区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1836','220','白下区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1835','220','鼓楼区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1834','220','玄武区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1833','219','汪清县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1832','219','安图县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1831','219','和龙市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1830','219','龙井市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1829','219','珲春市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1828','219','敦化市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1827','219','图们市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1826','219','延吉市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1825','218','柳河县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1824','218','辉南县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1823','218','通化县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1822','218','集安市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1821','218','梅河口市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1820','218','二道江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1819','218','东昌区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1818','217','扶余县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1817','217','乾安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1816','217','长岭县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1815','217','宁江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1814','217','前郭尔罗斯','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1813','216','梨树县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1812','216','双辽市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1811','216','公主岭市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1810','216','伊通','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1809','216','铁东区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1808','216','铁西区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1807','215','东辽县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1806','215','东丰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1805','215','西安区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1804','215','龙山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1803','214','靖宇县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1802','214','抚松县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1801','214','临江市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1800','214','长白','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1799','214','八道江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1798','214','江源区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1797','213','通榆县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1796','213','镇赉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1795','213','大安市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1794','213','洮南市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1793','213','洮北区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1792','212','永吉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1791','212','磐石市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1790','212','舒兰市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1789','212','桦甸市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1788','212','蛟河市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1787','212','丰满区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1786','212','龙潭区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1785','212','昌邑区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1784','212','船营区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1783','211','农安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1782','211','榆树市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1781','211','九台市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1780','211','德惠市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1779','211','汽车产业开发区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1778','211','经济技术开发区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1777','211','高新技术开发区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1776','211','净月潭开发区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1775','211','双阳区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1774','211','绿园区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1773','211','南关区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1772','211','二道区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1771','211','宽城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1770','211','朝阳区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1769','210','炎陵县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1768','210','茶陵县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1767','210','攸县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1766','210','株洲县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1765','210','醴陵市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1764','210','石峰区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1763','210','芦淞区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1762','210','荷塘区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1761','210','天元区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1760','209','平江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1759','209','湘阴县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1758','209','华容县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1757','209','岳阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1756','209','临湘市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1755','209','汨罗市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1754','209','云溪区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1753','209','君山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1752','209','岳阳楼区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1751','208','新田县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1750','208','蓝山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1749','208','宁远县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1748','208','江永县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1747','208','道县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1746','208','双牌县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1745','208','东安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1744','208','祁阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1743','208','零陵区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1742','208','冷水滩区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1741','208','江华','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1740','207','安化县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1739','207','桃江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1738','207','南县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1737','207','沅江市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1736','207','资阳区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1735','207','赫山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1734','206','龙山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1733','206','永顺县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1732','206','古丈县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1731','206','保靖县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1730','206','花垣县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1729','206','凤凰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1728','206','泸溪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1727','206','吉首市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1726','205','湘潭县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1725','205','韶山市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1724','205','湘乡市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1723','205','雨湖区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1722','205','岳塘区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1721','204','新宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1720','204','绥宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1719','204','洞口县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1718','204','隆回县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1717','204','邵阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1716','204','新邵县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1715','204','邵东县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1714','204','武冈市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1713','204','北塔区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1712','204','大祥区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1711','204','双清区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1710','204','城步','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1709','203','新化县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1708','203','双峰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1707','203','涟源市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1706','203','冷水江市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1705','203','娄星区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1704','202','洪江市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1703','202','会同县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1702','202','中方县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1701','202','溆浦县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1700','202','辰溪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1699','202','沅陵县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1698','202','芷江','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1697','202','新晃','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1696','202','通道','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1695','202','麻阳','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1694','202','靖州','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1693','202','鹤城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1692','201','祁东县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1691','201','衡东县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1690','201','衡山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1689','201','衡南县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1688','201','衡阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1687','201','常宁市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1686','201','耒阳市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1685','201','南岳区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1684','201','蒸湘区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1683','201','石鼓区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1682','201','珠晖区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1681','201','雁峰区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1680','200','安仁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1679','200','桂东县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1678','200','汝城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1677','200','临武县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1676','200','嘉禾县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1675','200','永兴县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1674','200','宜章县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1673','200','桂阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1672','200','资兴市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1671','200','苏仙区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1670','200','北湖区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1669','199','石门县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1668','199','桃源县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1667','199','临澧县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1666','199','澧县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1665','199','汉寿县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1664','199','安乡县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1663','199','津市市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1662','199','鼎城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1661','199','武陵区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1660','198','桑植县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1659','198','慈利县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1658','198','武陵源区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1657','198','永定区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1656','197','宁乡县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1655','197','望城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1654','197','长沙县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1653','197','浏阳市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1652','197','开发区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1651','197','雨花区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1650','197','开福区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1649','197','天心区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1648','197','芙蓉区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1647','197','岳麓区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1646','196','鹤峰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1645','196','来凤县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1644','196','咸丰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1643','196','宣恩县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1642','196','巴东县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1641','196','建始县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1640','196','利川市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1639','196','恩施市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1638','195','秭归县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1637','195','兴山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1636','195','远安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1635','195','枝江市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1634','195','当阳市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1633','195','宜都市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1632','195','夷陵区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1631','195','猇亭区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1630','195','点军区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1629','195','伍家岗区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1628','195','西陵区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1627','195','五峰','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1626','195','长阳','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1625','194','云梦县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1624','194','大悟县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1623','194','孝昌县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1622','194','汉川市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1621','194','安陆市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1620','194','应城市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1619','194','孝南区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1618','193','保康县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1617','193','谷城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1616','193','南漳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1615','193','宜城市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1614','193','枣阳市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1613','193','老河口市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1612','193','襄阳区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1611','193','樊城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1610','193','襄城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1609','192','通山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1608','192','崇阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1607','192','通城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1606','192','嘉鱼县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1605','192','赤壁市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1604','192','咸安区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1603','191','天门市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1602','190','广水市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1601','190','曾都区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1600','189','房县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1599','189','竹溪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1598','189','竹山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1597','189','郧西县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1596','189','郧县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1595','189','丹江口市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1594','189','茅箭区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1593','189','张湾区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1592','188','神农架林区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1591','187','潜江市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1590','186','江陵县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1589','186','监利县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1588','186','公安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1587','186','松滋市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1586','186','洪湖市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1585','186','石首市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1584','186','荆州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1583','186','沙市区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1582','185','沙洋县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1581','185','京山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1580','185','钟祥市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1579','185','掇刀区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1578','185','东宝区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1577','184','阳新县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1576','184','大冶市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1575','184','铁山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1574','184','下陆区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1573','184','西塞山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1572','184','黄石港区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1571','183','黄梅县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1570','183','蕲春县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1569','183','浠水县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1568','183','英山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1567','183','罗田县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1566','183','红安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1565','183','团风县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1564','183','武穴市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1563','183','麻城市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1562','183','黄州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1561','182','梁子湖区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1560','182','华容区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1559','182','鄂城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1558','181','仙桃市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1557','180','经济开发区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1556','180','新洲区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1555','180','黄陂区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1554','180','江夏区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1553','180','蔡甸区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1552','180','汉南区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1551','180','东西湖区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1550','180','洪山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1549','180','青山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1548','180','汉阳区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1547','180','硚口区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1546','180','江汉区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1545','180','武昌区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1544','180','江岸区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1543','179','嘉荫县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1542','179','铁力市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1541','179','乌伊岭区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1540','179','汤旺河区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1539','179','新青区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1538','179','红星区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1537','179','五营区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1536','179','上甘岭区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1535','179','友好区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1534','179','翠峦区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1533','179','乌马河区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1532','179','美溪区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1531','179','西林区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1530','179','金山屯区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1529','179','南岔区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1528','179','带岭区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1527','179','伊春区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1526','178','绥棱县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1525','178','明水县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1524','178','庆安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1523','178','青冈县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1522','178','兰西县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1521','178','望奎县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1520','178','海伦市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1519','178','肇东市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1518','178','安达市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1517','178','北林区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1516','177','饶河县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1515','177','宝清县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1514','177','友谊县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1513','177','集贤县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1512','177','宝山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1511','177','四方台区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1510','177','岭东区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1509','177','尖山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1508','176','拜泉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1507','176','克东县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1506','176','克山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1505','176','富裕县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1504','176','甘南县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1503','176','泰来县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1502','176','依安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1501','176','龙江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1500','176','讷河市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1499','176','梅里斯达斡尔区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1498','176','碾子山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1497','176','富拉尔基区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1496','176','建华区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1495','176','铁峰区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1494','176','昂昂溪区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1493','176','龙沙区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1492','175','勃利县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1491','175','茄子河区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1490','175','新兴区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1489','175','桃山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1488','174','林口县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1487','174','东宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1486','174','穆棱市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1485','174','宁安市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1484','174','海林市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1483','174','绥芬河市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1482','174','西安区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1481','174','阳明区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1480','174','东安区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1479','174','爱民区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1478','173','抚远县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1477','173','汤原县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1476','173','桦川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1475','173','桦南县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1474','173','富锦市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1473','173','同江市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1472','173','东风区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1471','173','向阳区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1470','173','郊区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1469','173','前进区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1468','172','鸡东县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1467','172','密山市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1466','172','虎林市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1465','172','梨树区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1464','172','滴道区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1463','172','城子河区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1462','172','恒山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1461','172','鸡冠区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1460','171','孙吴县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1459','171','逊克县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1458','171','嫩江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1457','171','北安市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1456','171','五大连池市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1455','171','爱辉区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1454','170','绥滨县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1453','170','萝北县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1452','170','东山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1451','170','向阳区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1450','170','兴安区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1449','170','南山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1448','170','工农区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1447','170','兴山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1446','169','塔河县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1445','169','漠河县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1444','169','呼玛县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1443','168','杜尔伯特','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1442','168','林甸县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1441','168','肇源县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1440','168','肇州县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1439','168','大同区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1438','168','让胡路区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1437','168','龙凤区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1436','168','红岗区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1435','168','萨尔图区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1434','167','延寿县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1433','167','木兰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1432','167','通河县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1431','167','巴彦县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1430','167','依兰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1429','167','宾县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1428','167','方正县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1427','167','五常市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1426','167','双城市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1425','167','尚志市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1424','167','松北区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1423','167','呼兰区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1422','167','阿城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1421','167','道外区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1420','167','太平区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1419','167','香坊区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1418','167','平房区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1417','167','动力区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1416','167','南岗区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1415','167','道里区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1414','166','濮阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1413','166','台前县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1412','166','范县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1411','166','南乐县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1410','166','清丰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1409','166','华龙区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1408','165','临颍县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1407','165','舞阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1406','165','召陵区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1405','165','源汇区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1404','165','郾城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1403','164','新蔡县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1402','164','遂平县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1401','164','汝南县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1400','164','泌阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1399','164','确山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1398','164','正阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1397','164','平舆县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1396','164','上蔡县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1395','164','西平县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1394','164','驿城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1393','163','鹿邑县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1392','163','太康县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1391','163','淮阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1390','163','郸城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1389','163','沈丘县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1388','163','商水县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1387','163','西华县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1386','163','扶沟县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1385','163','项城市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1384','163','川汇区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1383','162','襄城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1382','162','鄢陵县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1381','162','许昌县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1380','162','长葛市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1379','162','禹州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1378','162','魏都区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1377','161','息县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1376','161','淮滨县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1375','161','潢川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1374','161','固始县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1373','161','商城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1372','161','新县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1371','161','光山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1370','161','罗山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1369','161','平桥区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1368','161','浉河区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1367','160','长垣县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1366','160','封丘县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1365','160','延津县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1364','160','原阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1363','160','获嘉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1362','160','新乡县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1361','160','辉县市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1360','160','卫辉市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1359','160','牧野区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1358','160','凤泉区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1357','160','红旗区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1356','160','卫滨区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1355','159','夏邑县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1354','159','柘城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1353','159','虞城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1352','159','宁陵县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1351','159','睢县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1350','159','民权县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1349','159','永城市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1348','159','睢阳区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1347','159','梁园区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1346','158','卢氏县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1345','158','陕县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1344','158','渑池县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1343','158','灵宝市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1342','158','义马市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1341','158','湖滨区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1340','157','郏县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1339','157','鲁山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1338','157','叶县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1337','157','宝丰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1336','157','汝州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1335','157','舞钢市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1334','157','石龙区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1333','157','湛河区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1332','157','卫东区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1331','157','新华区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1330','156','桐柏县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1329','156','新野县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1328','156','唐河县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1327','156','社旗县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1326','156','淅川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1325','156','内乡县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1324','156','镇平县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1323','156','西峡县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1322','156','方城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1321','156','南召县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1320','156','邓州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1319','156','宛城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1318','156','卧龙区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1317','155','温县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1316','155','武陟县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1315','155','博爱县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1314','155','修武县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1313','155','孟州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1312','155','沁阳市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1311','155','山阳区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1310','155','马村区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1309','155','中站区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1308','155','解放区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1307','154','济源市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1306','153','淇县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1305','153','浚县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1304','153','鹤山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1303','153','山城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1302','153','淇滨区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1301','152','内黄县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1300','152','滑县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1299','152','汤阴县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1298','152','安阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1297','152','林州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1296','152','龙安区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1295','152','殷都区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1294','152','文峰区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1293','152','北关区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1292','151','兰考县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1291','151','开封县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1290','151','尉氏县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1289','151','通许县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1288','151','杞县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1287','151','禹王台区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1286','151','金明区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1285','151','顺河回族区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1284','151','龙亭区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1283','151','鼓楼区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1282','150','伊川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1281','150','洛宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1280','150','宜阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1279','150','汝阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1278','150','嵩县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1277','150','栾川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1276','150','新安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1275','150','孟津县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1274','150','偃师市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1273','150','吉利区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1272','150','洛龙区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1271','150','瀍河回族区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1270','150','涧西区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1269','150','老城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1268','150','西工区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1267','149','中牟县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1266','149','登封市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1265','149','新郑市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1264','149','新密市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1263','149','荥阳市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1262','149','巩义市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1261','149','出口加工区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1260','149','高新开发区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1259','149','经济技术开发区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1258','149','郑东新区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1257','149','惠济区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1256','149','上街区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1255','149','中原区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1254','149','管城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1253','149','二七区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1252','149','邙山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1251','149','金水区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1250','148','崇礼县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1249','148','赤城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1248','148','涿鹿县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1247','148','怀来县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1246','148','万全县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1245','148','怀安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1244','148','阳原县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1243','148','蔚县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1242','148','尚义县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1241','148','沽源县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1240','148','康保县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1239','148','张北县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1238','148','宣化县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1237','148','下花园区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1236','148','宣化区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1235','148','桥东区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1234','148','桥西区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1233','147','临西县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1232','147','清河县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1231','147','威县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1230','147','平乡县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1229','147','广宗县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1228','147','新河县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1227','147','巨鹿县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1226','147','宁晋县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1225','147','南和县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1224','147','任县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1223','147','隆尧县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1222','147','柏乡县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1221','147','内丘县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1220','147','临城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1219','147','邢台县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1218','147','沙河市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1217','147','南宫市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1216','147','桥西区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1215','147','桥东区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1214','146','唐海县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1213','146','玉田县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1212','146','迁西县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1211','146','乐亭县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1210','146','滦南县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1209','146','滦县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1208','146','迁安市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1207','146','遵化市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1206','146','丰润区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1205','146','丰南区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1204','146','开平区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1203','146','古冶区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1202','146','路南区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1201','146','路北区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1200','145','青龙','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1199','145','卢龙县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1198','145','抚宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1197','145','昌黎县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1196','145','北戴河区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1195','145','山海关区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1194','145','海港区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1193','144','大厂','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1192','144','文安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1191','144','大城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1190','144','香河县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1189','144','永清县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1188','144','固安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1187','144','三河市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1186','144','霸州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1185','144','广阳区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1184','144','安次区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1183','143','阜城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1182','143','景县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1181','143','故城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1180','143','安平县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1179','143','饶阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1178','143','武强县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1177','143','武邑县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1176','143','枣强县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1175','143','深州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1174','143','冀州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1173','143','桃城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1172','142','曲周县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1171','142','魏县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1170','142','馆陶县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1169','142','广平县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1168','142','鸡泽县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1167','142','邱县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1166','142','永年县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1165','142','肥乡县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1164','142','磁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1163','142','涉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1162','142','大名县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1161','142','成安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1160','142','临漳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1159','142','邯郸县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1158','142','武安市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1157','142','峰峰矿区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1156','142','邯山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1155','142','复兴区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1154','142','从台区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1153','141','围场','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1152','141','宽城','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1151','141','丰宁','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1150','141','隆化县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1149','141','滦平县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1148','141','平泉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1147','141','兴隆县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1146','141','承德县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1145','141','鹰手营子矿区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1144','141','双滦区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1143','141','双桥区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1142','140','孟村','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1141','140','献县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1140','140','吴桥县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1139','140','南皮县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1138','140','肃宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1137','140','盐山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1136','140','海兴县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1135','140','东光县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1134','140','青县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1133','140','沧县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1132','140','河间市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1131','140','黄骅市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1130','140','任丘市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1129','140','泊头市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1128','140','新华区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1127','140','运河区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1126','139','雄县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1125','139','博野县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1124','139','顺平县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1123','139','蠡县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1122','139','曲阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1121','139','易县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1120','139','安新县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1119','139','望都县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1118','139','涞源县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1117','139','容城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1116','139','高阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1115','139','唐县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1114','139','定兴县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1113','139','徐水县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1112','139','阜平县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1111','139','涞水县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1110','139','清苑县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1109','139','满城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1108','139','高碑店市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1107','139','安国市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1106','139','定州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1105','139','涿州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1104','139','北市区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1103','139','南市区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1102','139','新市区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1101','138','赵县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1100','138','元氏县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1099','138','平山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1098','138','无极县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1097','138','赞皇县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1096','138','深泽县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1095','138','高邑县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1094','138','灵寿县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1093','138','行唐县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1092','138','栾城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1091','138','正定县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1090','138','井陉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1089','138','鹿泉市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1088','138','新乐市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1087','138','晋州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1086','138','藁城市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1085','138','辛集市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1084','138','高新区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1083','138','井陉矿区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1082','138','裕华区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1081','138','新华区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1080','138','桥西区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1079','138','桥东区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1078','138','长安区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1077','137','其他','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1076','137','三都镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1075','137','新州镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1074','137','木棠镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1073','137','光村镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1072','137','东成镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1071','137','排浦镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1070','137','海头镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1069','137','和庆镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1068','137','兰洋镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1067','137','白马井镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1066','137','南丰镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1065','137','峨蔓镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1064','137','中和镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1063','137','大成镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1062','137','雅星镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1061','137','王五镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1060','137','那大镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1059','137','洋浦开发区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1058','137','市区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1057','120','美兰区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1056','120','琼山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1055','120','龙华区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1054','120','秀英区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1053','119','务川','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1052','119','道真','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1051','119','习水县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1050','119','余庆县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1049','119','湄潭县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1048','119','凤冈县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1047','119','正安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1046','119','绥阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1045','119','桐梓县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1044','119','遵义县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1043','119','仁怀市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1042','119','赤水市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1041','119','汇川区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1040','119','道真县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1039','119','务川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1038','119','红花岗区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1037','118','万山特区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1036','118','松桃','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1035','118','沿河','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1034','118','印江','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1033','118','玉屏','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1032','118','德江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1031','118','思南县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1030','118','石阡县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1029','118','江口县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1028','118','铜仁市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1027','117','安龙县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1026','117','册亨县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1025','117','望谟县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1024','117','贞丰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1023','117','晴隆县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1022','117','普安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1021','117','兴仁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1020','117','兴义市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1019','116','三都','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1018','116','惠水县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1017','116','龙里县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1016','116','长顺县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1015','116','罗甸县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1014','116','平塘县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1013','116','独山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1012','116','瓮安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1011','116','贵定县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1010','116','荔波县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1009','116','福泉市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1008','116','都匀市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1007','115','丹寨县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1006','115','麻江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1005','115','雷山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1004','115','从江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1003','115','榕江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1002','115','黎平县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1001','115','台江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1000','115','剑河县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('999','115','锦屏县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('998','115','天柱县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('997','115','岑巩县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('996','115','镇远县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('995','115','三穗县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('994','115','施秉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('993','115','黄平县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('992','115','凯里市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('991','114','盘县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('990','114','水城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('989','114','六枝特区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('988','114','钟山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('987','113','威宁','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('986','113','赫章县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('985','113','纳雍县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('984','113','织金县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('983','113','金沙县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('982','113','黔西县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('981','113','大方县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('980','113','毕节市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('979','112','普定县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('978','112','平坝县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('977','112','紫云','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('976','112','镇宁','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('975','112','关岭','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('974','112','西秀区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('973','111','息烽县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('972','111','修文县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('971','111','开阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('970','111','清镇市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('969','111','新天园区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('968','111','金阳新区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('967','111','小河区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('966','111','白云区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('965','111','乌当区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('964','111','花溪区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('963','111','云岩区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('962','111','南明区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('961','110','兴业县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('960','110','博白县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('959','110','陆川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('958','110','容县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('957','110','北流市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('956','110','玉州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('955','109','蒙山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('954','109','藤县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('953','109','苍梧县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('952','109','岑溪市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('951','109','长洲区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('950','109','蝶山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('949','109','万秀区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('948','108','浦北县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('947','108','灵山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('946','108','钦北区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('945','108','钦南区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('944','107','三江','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('943','107','融水','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('942','107','融安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('941','107','鹿寨县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('940','107','柳城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('939','107','柳江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('938','107','柳南区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('937','107','柳北区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('936','107','鱼峰区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('935','107','城中区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('934','106','金秀','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('933','106','忻城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('932','106','武宣县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('931','106','象州县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('930','106','合山市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('929','106','兴宾区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('928','105','富川','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('927','105','昭平县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('926','105','钟山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('925','105','八步区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('924','104','大化','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('923','104','环江','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('922','104','巴马','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('921','104','罗城','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('920','104','都安','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('919','104','东兰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('918','104','南丹县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('917','104','凤山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('916','104','天峨县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('915','104','宜州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('914','104','金城江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('913','103','平南县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('912','103','桂平市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('911','103','覃塘区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('910','103','港南区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('909','103','港北区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('908','102','上思县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('907','102','东兴市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('906','102','防城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('905','102','港口区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('904','101','天等县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('903','101','大新县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('902','101','龙州县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('901','101','扶绥县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('900','101','宁明县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('899','101','凭祥市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('898','101','江州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('897','100','合浦县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('896','100','铁山港区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('895','100','银海区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('894','100','海城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('893','99','隆林','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('892','99','那坡县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('891','99','田东县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('890','99','靖西县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('889','99','田阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('888','99','田林县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('887','99','德保县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('886','99','乐业县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('885','99','西林县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('884','99','平果县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('883','99','凌云县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('882','99','右江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('881','98','恭城','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('880','98','龙胜','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('879','98','永福县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('878','98','资源县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('877','98','荔浦县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('876','98','灌阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('875','98','兴安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('874','98','平乐县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('873','98','全州县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('872','98','灵川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('871','98','临桂县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('870','98','阳朔县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('869','98','雁山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('868','98','七星区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('867','98','象山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('866','98','叠彩区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('865','98','秀峰区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('864','97','横县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('863','97','宾阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('862','97','上林县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('861','97','马山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('860','97','隆安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('859','97','武鸣县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('858','97','江南区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('857','97','西乡塘区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('856','97','良庆区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('855','97','兴宁区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('854','97','青秀区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('853','97','邕宁区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('852','96','金湾区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('851','96','斗门区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('850','96','香洲区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('849','95','五桂山街道','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('848','95','中山港街道','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('847','95','环城街道','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('846','95','西区街道','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('845','95','东区街道','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('844','95','石岐街道','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('843','94','德庆县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('842','94','封开县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('841','94','怀集县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('840','94','广宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('839','94','四会市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('838','94','高要市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('837','94','肇庆市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('836','93','徐闻县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('835','93','遂溪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('834','93','吴川市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('833','93','雷州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('832','93','廉江市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('831','93','麻章区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('830','93','坡头区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('829','93','霞山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('828','93','赤坎区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('827','92','云安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('826','92','郁南县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('825','92','新兴县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('824','92','罗定市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('823','92','云城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('822','91','阳东县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('821','91','阳西县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('820','91','阳春市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('819','91','江城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('818','90','乳源','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('817','90','新丰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('816','90','翁源县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('815','90','仁化县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('814','90','始兴县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('813','90','南雄市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('812','90','乐昌市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('811','90','曲江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('810','90','武江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('809','90','浈江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('808','90','曲江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('807','89','陆河县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('806','89','海丰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('805','89','陆丰市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('804','89','城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('803','88','潮南区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('802','88','濠江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('801','88','金平区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('800','88','龙湖区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('799','88','澄海区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('798','88','潮阳区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('797','88','南澳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('796','87','连南','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('795','87','连山','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('794','87','清新县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('793','87','阳山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('792','87','佛冈县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('791','87','连州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('790','87','英德市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('789','87','清城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('788','86','蕉岭县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('787','86','平远县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('786','86','五华县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('785','86','丰顺县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('784','86','大埔县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('783','86','兴宁市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('782','86','梅江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('781','86','梅县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('780','85','电白县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('779','85','信宜市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('778','85','化州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('777','85','高州市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('776','85','茂港区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('775','85','茂南区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('774','84','惠来县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('773','84','揭西县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('772','84','揭东县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('771','84','普宁市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('770','84','榕城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('769','83','恩平市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('768','83','鹤山市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('767','83','开平市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('766','83','台山市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('765','83','新会区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('764','83','蓬江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('763','83','江海区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('762','82','龙门县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('761','82','惠东县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('760','82','博罗县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('759','82','大亚湾','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('758','82','惠城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('757','82','惠阳区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('756','81','紫金县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('755','81','龙川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('754','81','连平县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('753','81','源城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('752','81','和平县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('751','81','东源县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('750','80','高明区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('749','80','三水区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('748','80','顺德区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('747','80','南海区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('746','80','禅城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('745','79','高埗镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('744','79','中堂镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('743','79','长安镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('742','79','石排镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('741','79','企石镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('740','79','东坑镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('739','79','横沥镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('738','79','桥头镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('737','79','常平镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('736','79','清溪镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('735','79','厚街镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('734','79','谢岗镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('733','79','塘厦镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('732','79','凤岗镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('731','79','樟木头','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('730','79','黄江镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('729','79','大朗镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('728','79','大岭山镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('727','79','寮步镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('726','79','茶山镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('725','79','洪梅镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('724','79','望牛墩镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('723','79','沙田镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('722','79','石碣镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('721','79','道滘镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('720','79','麻涌镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('719','79','虎门镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('718','79','石龙镇','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('717','79','莞城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('716','79','万江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('715','79','东城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('714','79','南城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('713','78','饶平县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('712','78','潮安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('711','78','湘桥区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('710','77','盐田区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('709','77','龙岗区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('708','77','宝安区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('707','77','南山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('706','77','罗湖区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('705','77','福田区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('701','76','花都区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('700','76','番禺区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('699','76','黄埔区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('698','76','越秀区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('697','76','荔湾区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('696','76','海珠区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('695','76','白云区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('693','76','天河区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('692','76','从化市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('691','75','甘州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('690','75','肃南','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('689','75','山丹县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('688','75','民乐县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('687','75','临泽县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('686','75','高台县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('685','74','凉州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('684','74','天祝','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('683','74','民勤县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('682','74','古浪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('681','73','张家川','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('680','73','武山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('679','73','麦积区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('678','73','秦州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('677','73','清水县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('676','73','秦安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('675','73','甘谷县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('674','72','正宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('673','72','镇原县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('672','72','西峰区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('671','72','庆城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('670','72','宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('669','72','环县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('668','72','华池县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('667','72','合水县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('666','71','泾川县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('665','71','庄浪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('664','71','崆峒区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('663','71','灵台县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('662','71','静宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('661','71','华亭县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('660','71','崇信县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('659','70','武都区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('658','70','宕昌县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('657','70','西和县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('656','70','文县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('655','70','两当县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('654','70','礼县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('653','70','康县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('652','70','徽县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('651','70','成县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('650','69','积石山','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('649','69','东乡族自治县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('648','69','和政县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('647','69','广河县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('646','69','永靖县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('645','69','康乐县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('644','69','临夏县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('643','69','临夏市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('642','68','阿克塞','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('641','68','肃北','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('640','68','瓜州县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('639','68','金塔县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('638','68','敦煌市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('637','68','玉门市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('636','68','肃州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('635','67','永昌县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('634','67','金川区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('633','66','嘉峪关市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('632','65','夏河县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('631','65','碌曲县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('630','65','玛曲县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('629','65','迭部县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('628','65','舟曲县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('627','65','卓尼县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('626','65','临潭县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('625','65','合作市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('624','64','安定区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('623','64','安定区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('622','64','岷县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('621','64','漳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('620','64','渭源县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('619','64','通渭县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('618','64','陇西县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('617','64','临洮县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('616','63','靖远县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('615','63','景泰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('614','63','会宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('613','63','平川区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('612','63','白银区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('611','62','榆中县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('610','62','永登县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('609','62','红古区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('608','62','安宁区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('607','62','西固区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('606','62','七里河区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('605','62','城关区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('604','62','皋兰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('603','61','华安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('602','61','平和县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('601','61','南靖县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('600','61','东山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('599','61','长泰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('598','61','诏安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('597','61','漳浦县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('596','61','云霄县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('595','61','龙海市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('594','61','龙文区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('593','61','芗城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('592','60','翔安区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('591','60','同安区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('590','60','集美区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('589','60','湖里区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('588','60','海沧区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('587','60','思明区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('586','59','建宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('585','59','泰宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('584','59','将乐县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('583','59','沙县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('582','59','尤溪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('581','59','大田县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('580','59','宁化县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('579','59','清流县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('578','59','明溪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('577','59','永安市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('576','59','三元区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('575','59','梅列区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('574','58','金门县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('573','58','德化县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('572','58','永春县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('571','58','安溪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('570','58','惠安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('569','58','南安市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('568','58','晋江市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('567','58','石狮市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('566','58','泉港区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('565','58','清濛开发区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('564','58','洛江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('563','58','丰泽区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('562','58','鲤城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('561','57','仙游县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('560','57','秀屿区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('559','57','荔城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('558','57','涵江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('557','57','城厢区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('556','56','柘荣县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('555','56','周宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('554','56','寿宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('553','56','屏南县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('552','56','古田县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('551','56','霞浦县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('550','56','福鼎市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('549','56','福安市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('548','56','蕉城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('547','55','政和县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('546','55','松溪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('545','55','光泽县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('544','55','浦城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('543','55','顺昌县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('542','55','建阳市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('541','55','建瓯市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('540','55','武夷山市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('539','55','邵武市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('538','55','延平区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('537','54','连城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('536','54','武平县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('535','54','上杭县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('534','54','永定县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('533','54','长汀县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('532','54','漳平市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('531','54','新罗区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('530','53','平潭县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('529','53','永泰县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('528','53','闽清县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('527','53','罗源县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('526','53','连江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('525','53','闽侯县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('524','53','长乐市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('523','53','福清市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('522','53','晋安区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('521','53','马尾区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('520','53','仓山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('519','53','台江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('518','53','鼓楼区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('517','52','延庆县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('516','52','密云县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('515','52','大兴区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('514','52','平谷区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('513','52','怀柔区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('512','52','昌平区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('511','52','顺义区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('510','52','通州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('509','52','门头沟区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('508','52','房山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('507','52','石景山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('506','52','丰台区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('505','52','宣武区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('504','52','崇文区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('503','52','朝阳区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('502','52','海淀区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('501','52','西城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('500','52','东城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('499','51','谯城区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('498','51','利辛县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('497','51','蒙城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('496','51','涡阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('495','50','旌德县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('494','50','绩溪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('493','50','泾县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('492','50','广德县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('491','50','郎溪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('490','50','宁国市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('489','50','宣州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('488','49','南陵县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('487','49','繁昌县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('486','49','芜湖县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('485','49','三山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('484','49','鸠江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('483','49','弋江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('482','49','镜湖区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('481','48','铜陵县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('480','48','郊区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('479','48','狮子山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('478','48','铜官山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('477','47','泗县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('476','47','灵璧县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('475','47','萧县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('474','47','砀山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('473','47','埇桥区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('472','46','当涂县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('471','46','金家庄区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('470','46','花山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('469','46','雨山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('468','45','霍山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('467','45','金寨县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('466','45','舒城县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('465','45','霍邱县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('464','45','寿县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('463','45','裕安区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('462','45','金安区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('461','44','祁门县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('460','44','黟县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('459','44','休宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('458','44','歙县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('457','44','徽州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('456','44','黄山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('455','44','屯溪区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('454','43','凤台县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('453','43','潘集区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('452','43','八公山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('451','43','谢家集区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('450','43','大通区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('449','43','田家庵区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('448','42','濉溪县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('447','42','烈山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('446','42','杜集区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('445','42','相山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('444','41','颖上县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('443','41','阜南县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('442','41','太和县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('441','41','临泉县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('440','41','界首市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('439','41','颍泉区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('438','41','颍东区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('437','41','颍州区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('436','41','淮上区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('435','41','禹会区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('434','41','龙子湖区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('433','41','蚌山区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('432','40','凤阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('431','40','定远县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('430','40','全椒县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('429','40','来安县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('428','40','明光市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('427','40','天长市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('426','40','南谯区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('425','40','琅琊区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('424','39','青阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('423','39','石台县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('422','39','东至县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('421','39','贵池区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('420','38','和县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('419','38','含山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('418','38','无为县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('417','38','庐江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('416','38','居巢区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('415','37','固镇县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('414','37','五河县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('413','37','怀远县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('412','37','郊区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('411','37','西市区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('410','37','东市区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('409','37','中市区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('408','36','岳西县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('407','36','望江县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('406','36','宿松县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('405','36','太湖县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('404','36','潜山县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('403','36','枞阳县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('402','36','怀宁县','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('401','36','桐城市','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('400','36','宜秀区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('399','36','大观区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('398','36','迎江区','3','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('397','35','台湾','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('396','34','澳门','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('395','33','香港','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('394','32','重庆','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('393','31','衢州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('392','31','舟山','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('391','31','温州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('390','31','台州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('389','31','绍兴','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('388','31','宁波','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('387','31','丽水','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('386','31','金华','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('385','31','嘉兴','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('384','31','湖州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('383','31','杭州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('382','30','昭通','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('381','30','玉溪','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('380','30','西双版纳','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('379','30','文山','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('378','30','曲靖','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('377','30','临沧','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('376','30','红河','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('375','30','迪庆','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('374','30','德宏','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('373','30','大理','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('372','30','楚雄','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('371','30','保山','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('370','30','丽江','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('369','30','普洱','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('368','30','怒江','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('367','30','昆明','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('366','29','伊犁','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('365','29','五家渠','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('364','29','吐鲁番','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('363','29','图木舒克','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('362','29','石河子','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('361','29','克孜勒苏','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('360','29','克拉玛依','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('359','29','喀什','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('358','29','和田','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('357','29','哈密','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('356','29','昌吉','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('355','29','博尔塔拉','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('354','29','巴音郭楞','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('353','29','阿拉尔','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('352','29','阿克苏','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('351','29','乌鲁木齐','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('350','28','山南','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('349','28','日喀则','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('348','28','那曲','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('347','28','林芝','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('346','28','昌都','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('345','28','阿里','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('344','28','拉萨','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('343','27','天津','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('342','26','泸州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('341','26','自贡','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('340','26','资阳','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('339','26','宜宾','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('338','26','雅安','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('337','26','遂宁','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('336','26','攀枝花','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('335','26','内江','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('334','26','南充','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('333','26','眉山','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('332','26','凉山','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('331','26','乐山','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('330','26','广元','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('329','26','广安','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('328','26','甘孜','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('327','26','德阳','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('326','26','达州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('325','26','巴中','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('324','26','阿坝','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('323','26','绵阳','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('322','26','成都','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('321','25','上海','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('320','24','榆林','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('319','24','延安','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('318','24','咸阳','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('317','24','渭南','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('316','24','铜川','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('315','24','商洛','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('314','24','汉中','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('313','24','宝鸡','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('312','24','安康','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('311','24','西安','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('310','23','运城','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('309','23','阳泉','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('308','23','忻州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('307','23','朔州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('306','23','吕梁','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('305','23','临汾','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('304','23','晋中','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('303','23','晋城','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('302','23','大同','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('301','23','长治','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('300','23','太原','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('299','22','淄博','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('298','22','枣庄','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('297','22','烟台','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('296','22','潍坊','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('295','22','威海','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('294','22','泰安','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('293','22','日照','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('292','22','临沂','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('291','22','聊城','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('290','22','莱芜','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('289','22','济宁','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('288','22','菏泽','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('287','22','东营','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('286','22','德州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('285','22','滨州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('284','22','青岛','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('283','22','济南','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('282','21','玉树','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('281','21','黄南','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('280','21','海西','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('279','21','海南','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('278','21','海东','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('277','21','海北','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('276','21','果洛','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('275','21','西宁','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('274','20','中卫','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('273','20','吴忠','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('272','20','石嘴山','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('271','20','固原','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('270','20','银川','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('269','19','兴安盟','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('268','19','锡林郭勒盟','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('267','19','乌兰察布市','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('266','19','乌海','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('265','19','通辽','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('264','19','呼伦贝尔','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('263','19','鄂尔多斯','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('262','19','赤峰','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('261','19','包头','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('260','19','巴彦淖尔盟','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('259','19','阿拉善盟','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('258','19','呼和浩特','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('257','18','营口','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('256','18','铁岭','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('255','18','盘锦','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('254','18','辽阳','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('253','18','锦州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('252','18','葫芦岛','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('251','18','阜新','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('250','18','抚顺','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('249','18','丹东','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('248','18','朝阳','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('247','18','本溪','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('246','18','鞍山','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('245','18','大连','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('244','18','沈阳','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('243','17','鹰潭','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('242','17','宜春','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('241','17','新余','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('240','17','上饶','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('239','17','萍乡','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('238','17','九江','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('237','17','景德镇','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('236','17','吉安','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('235','17','赣州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('234','17','抚州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('233','17','南昌','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('232','16','镇江','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('231','16','扬州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('230','16','盐城','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('229','16','徐州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('228','16','泰州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('227','16','宿迁','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('226','16','南通','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('225','16','连云港','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('224','16','淮安','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('223','16','常州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('222','16','无锡','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('221','16','苏州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('220','16','南京','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('219','15','延边','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('218','15','通化','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('217','15','松原','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('216','15','四平','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('215','15','辽源','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('214','15','白山','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('213','15','白城','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('212','15','吉林','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('211','15','长春','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('210','14','株洲','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('209','14','岳阳','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('208','14','永州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('207','14','益阳','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('206','14','湘西','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('205','14','湘潭','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('204','14','邵阳','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('203','14','娄底','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('202','14','怀化','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('201','14','衡阳','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('200','14','郴州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('199','14','常德','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('198','14','张家界','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('197','14','长沙','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('196','13','恩施','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('195','13','宜昌','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('194','13','孝感','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('193','13','襄樊','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('192','13','咸宁','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('191','13','天门','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('190','13','随州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('189','13','十堰','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('188','13','神农架林区','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('187','13','潜江','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('186','13','荆州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('185','13','荆门','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('184','13','黄石','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('183','13','黄冈','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('182','13','鄂州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('181','13','仙桃','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('180','13','武汉','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('179','12','伊春','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('178','12','绥化','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('177','12','双鸭山','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('176','12','齐齐哈尔','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('175','12','七台河','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('174','12','牡丹江','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('173','12','佳木斯','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('172','12','鸡西','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('171','12','黑河','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('170','12','鹤岗','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('169','12','大兴安岭','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('168','12','大庆','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('167','12','哈尔滨','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('166','11','濮阳','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('165','11','漯河','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('164','11','驻马店','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('163','11','周口','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('162','11','许昌','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('161','11','信阳','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('160','11','新乡','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('159','11','商丘','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('158','11','三门峡','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('157','11','平顶山','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('156','11','南阳','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('155','11','焦作','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('154','11','济源','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('153','11','鹤壁','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('152','11','安阳','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('151','11','开封','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('150','11','洛阳','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('149','11','郑州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('148','10','张家口','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('147','10','邢台','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('146','10','唐山','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('145','10','秦皇岛','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('144','10','廊坊','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('143','10','衡水','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('142','10','邯郸','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('141','10','承德','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('140','10','沧州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('139','10','保定','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('138','10','石家庄','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('137','9','儋州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('136','9','五指山','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('135','9','文昌','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('134','9','万宁','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('133','9','屯昌县','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('132','9','琼中','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('131','9','琼海','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('130','9','陵水','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('129','9','临高县','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('128','9','乐东','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('127','9','东方','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('126','9','定安县','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('125','9','澄迈县','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('124','9','昌江','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('123','9','保亭','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('122','9','白沙','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('121','9','三亚','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('120','9','海口','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('119','8','遵义','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('118','8','铜仁','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('117','8','黔西南','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('116','8','黔南','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('115','8','黔东南','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('114','8','六盘水','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('113','8','毕节','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('112','8','安顺','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('111','8','贵阳','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('110','7','玉林','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('109','7','梧州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('108','7','钦州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('107','7','柳州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('106','7','来宾','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('105','7','贺州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('104','7','河池','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('103','7','贵港','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('102','7','防城港','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('101','7','崇左','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('100','7','北海','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('99','7','百色','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('98','7','桂林','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('97','7','南宁','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('96','6','珠海','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('95','6','中山','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('94','6','肇庆','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('93','6','湛江','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('92','6','云浮','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('91','6','阳江','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('90','6','韶关','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('89','6','汕尾','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('88','6','汕头','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('87','6','清远','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('86','6','梅州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('85','6','茂名','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('84','6','揭阳','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('83','6','江门','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('82','6','惠州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('81','6','河源','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('80','6','佛山','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('79','6','东莞','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('78','6','潮州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('77','6','深圳','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('76','6','广州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('75','5','张掖','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('74','5','武威','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('73','5','天水','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('72','5','庆阳','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('71','5','平凉','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('70','5','陇南','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('69','5','临夏','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('68','5','酒泉','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('67','5','金昌','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('66','5','嘉峪关','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('65','5','甘南','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('64','5','定西','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('63','5','白银','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('62','5','兰州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('61','4','漳州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('60','4','厦门','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('59','4','三明','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('58','4','泉州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('57','4','莆田','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('56','4','宁德','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('55','4','南平','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('54','4','龙岩','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('53','4','福州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('52','2','北京','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('51','3','亳州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('50','3','宣城','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('49','3','芜湖','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('48','3','铜陵','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('47','3','宿州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('46','3','马鞍山','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('45','3','六安','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('44','3','黄山','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('43','3','淮南','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('42','3','淮北','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('41','3','阜阳','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('40','3','滁州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('39','3','池州','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('38','3','巢湖','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('37','3','蚌埠','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('36','3','安庆','2','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('35','1','台湾','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('34','1','澳门','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('33','1','香港','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('32','1','重庆','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('31','1','浙江','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('30','1','云南','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('29','1','新疆','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('28','1','西藏','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('27','1','天津','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('26','1','四川','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('25','1','上海','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('24','1','陕西','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('23','1','山西','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('22','1','山东','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('21','1','青海','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('20','1','宁夏','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('19','1','内蒙古','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('18','1','辽宁','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('17','1','江西','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('16','1','江苏','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('15','1','吉林','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('14','1','湖南','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('13','1','湖北','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('12','1','黑龙江','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('11','1','河南','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('10','1','河北','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('9','1','海南','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('8','1','贵州','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('7','1','广西','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('6','1','广东','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('5','1','甘肃','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('4','1','福建','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('3','1','安徽','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('2','1','北京','1','0');
INSERT INTO `gz_region`(`region_id`,`parent_id`,`region_name`,`region_type`,`agency_id`) VALUES ('1','0','中国','0','0');
CREATE TABLE IF NOT EXISTS `gz_shipping` (
  `shipping_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `shipping_code` varchar(20) DEFAULT NULL,
  `shipping_name` varchar(120) DEFAULT NULL,
  `shipping_desc` varchar(255) DEFAULT NULL,
  `insure` varchar(10) NOT NULL DEFAULT '0',
  `support_cod` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `print_bg` varchar(255) DEFAULT NULL,
  `config_lable` text,
  `print_model` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`shipping_id`),
  KEY `shipping_code` (`shipping_code`,`enabled`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
INSERT INTO `gz_shipping`(`shipping_id`,`shipping_code`,`shipping_name`,`shipping_desc`,`insure`,`support_cod`,`enabled`,`print_bg`,`config_lable`,`print_model`) VALUES ('10','','物流','物流','0','0','0','','','0');
INSERT INTO `gz_shipping`(`shipping_id`,`shipping_code`,`shipping_name`,`shipping_desc`,`insure`,`support_cod`,`enabled`,`print_bg`,`config_lable`,`print_model`) VALUES ('4','222','快递','快递','0','1','1','','','0');
CREATE TABLE IF NOT EXISTS `gz_shipping_area` (
  `shipping_area_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `shipping_area_name` varchar(150) NOT NULL DEFAULT '',
  `shipping_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `shipping_desc` varchar(255) NOT NULL DEFAULT '',
  `item_fee` float(6,2) NOT NULL DEFAULT '0.00',
  `weight_fee` float(6,2) NOT NULL DEFAULT '0.00',
  `step_weight_fee` float(6,2) NOT NULL DEFAULT '0.00',
  `step_item_fee` float(6,2) NOT NULL DEFAULT '0.00',
  `max_money` float(6,2) NOT NULL DEFAULT '0.00',
  `configure` text NOT NULL,
  `type` enum('item','weight') NOT NULL DEFAULT 'item',
  PRIMARY KEY (`shipping_area_id`),
  KEY `shipping_id` (`shipping_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
INSERT INTO `gz_shipping_area`(`shipping_area_id`,`shipping_area_name`,`shipping_id`,`shipping_desc`,`item_fee`,`weight_fee`,`step_weight_fee`,`step_item_fee`,`max_money`,`configure`,`type`) VALUES ('8','111','10','11','6.00','0.00','0.00','2.00','50.00','["1","3","4"]','item');
INSERT INTO `gz_shipping_area`(`shipping_area_id`,`shipping_area_name`,`shipping_id`,`shipping_desc`,`item_fee`,`weight_fee`,`step_weight_fee`,`step_item_fee`,`max_money`,`configure`,`type`) VALUES ('7','国内快递','10','','6.00','0.00','0.00','2.00','50.00','["52","3","4","5","6"]','item');
INSERT INTO `gz_shipping_area`(`shipping_area_id`,`shipping_area_name`,`shipping_id`,`shipping_desc`,`item_fee`,`weight_fee`,`step_weight_fee`,`step_item_fee`,`max_money`,`configure`,`type`) VALUES ('6','快递','4','','6.00','10.00','5.00','2.00','0.00','["76"]','weight');
INSERT INTO `gz_shipping_area`(`shipping_area_id`,`shipping_area_name`,`shipping_id`,`shipping_desc`,`item_fee`,`weight_fee`,`step_weight_fee`,`step_item_fee`,`max_money`,`configure`,`type`) VALUES ('5','测试','5','','10.00','0.00','0.00','5.00','100.00','["2","6","8","10","23","56","581","4"]','item');
INSERT INTO `gz_shipping_area`(`shipping_area_id`,`shipping_area_name`,`shipping_id`,`shipping_desc`,`item_fee`,`weight_fee`,`step_weight_fee`,`step_item_fee`,`max_money`,`configure`,`type`) VALUES ('4','运费到付','7','','11.00','0.00','0.00','4.00','0.00','["6"]','item');
INSERT INTO `gz_shipping_area`(`shipping_area_id`,`shipping_area_name`,`shipping_id`,`shipping_desc`,`item_fee`,`weight_fee`,`step_weight_fee`,`step_item_fee`,`max_money`,`configure`,`type`) VALUES ('3','邮局','6','','0.00','0.00','0.00','0.00','0.00','a:7:{i:0;a:2:{s:4:"name";s:8:"item_fee";s:5:"value";s:1:"4";}i:1;a:2:{s:4:"name";s:8:"base_fee";s:5:"value";s:3:"3.5";}i:2;a:2:{s:4:"name";s:8:"step_fee";s:5:"value";s:3:"2.5";}i:3;a:2:{s:4:"name";s:9:"step_fee1";s:5:"value";N;}i:4;a:2:{s:4:"name";s:8:"pack_fee";s:5:"value";s:1:"0";}i:5;a:2:{s:4:"name";s:10:"free_money";s:5:"value";s:5:"50000";}i:6;a:2:{s:4:"name";s:16:"fee_compute_mode";s:5:"value";s:9:"by_weight";}}','item');
INSERT INTO `gz_shipping_area`(`shipping_area_id`,`shipping_area_name`,`shipping_id`,`shipping_desc`,`item_fee`,`weight_fee`,`step_weight_fee`,`step_item_fee`,`max_money`,`configure`,`type`) VALUES ('1','申通','5','','0.00','10.00','3.00','0.00','100.00','["4"]','weight');
CREATE TABLE IF NOT EXISTS `gz_shipping_name` (
  `shipping_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `shipping_code` varchar(20) NOT NULL DEFAULT '',
  `shipping_name` varchar(120) NOT NULL DEFAULT '',
  `shipping_desc` varchar(255) NOT NULL DEFAULT '',
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`shipping_id`),
  KEY `shipping_code` (`shipping_code`,`enabled`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
INSERT INTO `gz_shipping_name`(`shipping_id`,`shipping_code`,`shipping_name`,`shipping_desc`,`enabled`) VALUES ('10','EMSEMSEMS','EMS','EMS','0');
INSERT INTO `gz_shipping_name`(`shipping_id`,`shipping_code`,`shipping_name`,`shipping_desc`,`enabled`) VALUES ('8','huitong','汇通物流','汇通物流','0');
INSERT INTO `gz_shipping_name`(`shipping_id`,`shipping_code`,`shipping_name`,`shipping_desc`,`enabled`) VALUES ('7','yuantong','圆通快递','全国性快递公司','1');
INSERT INTO `gz_shipping_name`(`shipping_id`,`shipping_code`,`shipping_name`,`shipping_desc`,`enabled`) VALUES ('4','222','申通快递','专业送货员送货上门','1');
CREATE TABLE IF NOT EXISTS `gz_shipping_sn` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `shipping_id` smallint(4) DEFAULT '0',
  `shipping_sn` varchar(64) DEFAULT NULL,
  `is_use` tinyint(1) DEFAULT '0',
  `addtime` int(10) DEFAULT '0',
  `usetime` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
INSERT INTO `gz_shipping_sn`(`id`,`shipping_id`,`shipping_sn`,`is_use`,`addtime`,`usetime`) VALUES ('42','4','5555555555','1','1431051664','1431051664');
INSERT INTO `gz_shipping_sn`(`id`,`shipping_id`,`shipping_sn`,`is_use`,`addtime`,`usetime`) VALUES ('41','7','666666666666','1','1431049847','1431049847');
INSERT INTO `gz_shipping_sn`(`id`,`shipping_id`,`shipping_sn`,`is_use`,`addtime`,`usetime`) VALUES ('40','7','888888888888','1','1430898763','1430985163');
CREATE TABLE IF NOT EXISTS `gz_shop_yuyue` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `sid` smallint(6) NOT NULL,
  `uname` varchar(64) DEFAULT NULL,
  `mobile_phone` varchar(64) DEFAULT NULL,
  `sex` tinyint(1) DEFAULT '0',
  `yutime` varchar(64) DEFAULT NULL,
  `time` int(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sid` (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_sms` (
  `sms_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `sms_name` varchar(60) DEFAULT NULL,
  `sms_config` text,
  `linetime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`sms_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `gz_sms`(`sms_id`,`status`,`sms_name`,`sms_config`,`linetime`) VALUES ('1','0','远思电子','','1429837419');
CREATE TABLE IF NOT EXISTS `gz_stats_keywords` (
  `key_id` int(10) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `searchengine` varchar(20) NOT NULL DEFAULT '',
  `keyword` varchar(90) NOT NULL DEFAULT '',
  `count` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `active` enum('0','1') NOT NULL DEFAULT '0',
  `tag_n` varchar(3) NOT NULL,
  PRIMARY KEY (`key_id`),
  KEY `keyword` (`keyword`),
  KEY `date` (`date`),
  KEY `tag_n` (`tag_n`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_stats_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(32) NOT NULL DEFAULT '0.0.0.0',
  `area` varchar(64) NOT NULL DEFAULT '',
  `thispage` varchar(128) NOT NULL DEFAULT '',
  `visit_time` int(5) NOT NULL,
  `add_date` varchar(32) NOT NULL DEFAULT '',
  `add_time` int(11) NOT NULL,
  `visit_count` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_stats_referer` (
  `access_time` int(10) unsigned NOT NULL DEFAULT '0',
  `ip_address` varchar(15) NOT NULL DEFAULT '',
  `visit_times` smallint(5) unsigned NOT NULL DEFAULT '1',
  `browser` varchar(60) NOT NULL DEFAULT '',
  `system` varchar(20) NOT NULL DEFAULT '',
  `language` varchar(20) NOT NULL DEFAULT '',
  `area` varchar(30) NOT NULL DEFAULT '',
  `referer_domain` varchar(100) NOT NULL DEFAULT '',
  `referer_path` varchar(200) NOT NULL DEFAULT '',
  `access_url` varchar(255) NOT NULL DEFAULT '',
  KEY `access_time` (`access_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_suppliers_goods` (
  `sgid` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL,
  `suppliers_id` mediumint(8) NOT NULL DEFAULT '0',
  `goods_number` smallint(5) NOT NULL DEFAULT '1000',
  `warn_number` tinyint(2) NOT NULL DEFAULT '10',
  `market_price` decimal(10,2) NOT NULL,
  `shop_price` decimal(10,2) NOT NULL,
  `pifa_price` decimal(10,2) NOT NULL,
  `is_on_sale` enum('0','1') NOT NULL DEFAULT '0',
  `is_check` enum('0','1') NOT NULL DEFAULT '0',
  `is_delete` enum('0','1') NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sgid`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_suppliers_shoppong_area` (
  `ssaid` smallint(5) NOT NULL AUTO_INCREMENT,
  `suppliers_id` mediumint(8) NOT NULL DEFAULT '0',
  `area_data` varchar(255) NOT NULL DEFAULT '',
  `uptime` int(11) NOT NULL DEFAULT '0',
  `active` enum('0','1') NOT NULL DEFAULT '0',
  `peisong_level` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '区域级别：0:无级别,1：市级,2:省级',
  PRIMARY KEY (`ssaid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_systemconfig` (
  `site_name` varchar(128) DEFAULT NULL,
  `metakeyword` varchar(255) DEFAULT NULL,
  `metatitle` varchar(255) DEFAULT NULL,
  `metadesc` varchar(255) DEFAULT NULL,
  `site_url` varchar(128) DEFAULT NULL,
  `company_url` varchar(128) DEFAULT NULL,
  `site_title` varchar(128) DEFAULT NULL,
  `beian_num` varchar(128) DEFAULT NULL,
  `custome_phone` varchar(128) DEFAULT NULL,
  `work_time` varchar(64) NOT NULL DEFAULT '',
  `custome_qq` varchar(128) DEFAULT NULL,
  `custome_email` varchar(255) NOT NULL,
  `is_open` enum('0','1') DEFAULT '1',
  `close_desc` text,
  `site_notice` text,
  `copyright` text,
  `tongjicode` text,
  `site_logo` varchar(128) DEFAULT NULL,
  `type` varchar(30) NOT NULL DEFAULT 'basic',
  `is_cache` enum('0','1') NOT NULL DEFAULT '0',
  `is_static` enum('0','1') NOT NULL DEFAULT '0',
  `is_false_static` enum('0','1') NOT NULL DEFAULT '0',
  `is_best_static` enum('0','1') NOT NULL DEFAULT '0',
  `th_width_s` float(5,2) NOT NULL DEFAULT '0.00',
  `th_height_s` float(5,2) NOT NULL DEFAULT '0.00',
  `th_width_b` float(5,2) NOT NULL DEFAULT '0.00',
  `th_height_b` float(5,2) NOT NULL DEFAULT '0.00',
  `cache_time` int(5) NOT NULL DEFAULT '3600',
  `custom_munu` text NOT NULL,
  `email_open_config` text,
  `reg_give_money_data` varchar(255) DEFAULT NULL,
  `mubanid` tinyint(1) DEFAULT '0',
  `wxguanzhuurl` varchar(255) DEFAULT NULL COMMENT '微信关注外链',
  `reg_info` text,
  `email_config` text,
  `respond` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `gz_systemconfig`(`site_name`,`metakeyword`,`metatitle`,`metadesc`,`site_url`,`company_url`,`site_title`,`beian_num`,`custome_phone`,`work_time`,`custome_qq`,`custome_email`,`is_open`,`close_desc`,`site_notice`,`copyright`,`tongjicode`,`site_logo`,`type`,`is_cache`,`is_static`,`is_false_static`,`is_best_static`,`th_width_s`,`th_height_s`,`th_width_b`,`th_height_b`,`cache_time`,`custom_munu`,`email_open_config`,`reg_give_money_data`,`mubanid`,`wxguanzhuurl`,`reg_info`,`email_config`,`respond`) VALUES ('鸿美琪','鸿美琪商城','鸿美琪商城','鸿美琪商城','photos/wx020369com/qrcard/201507/14383254121438325412.jpg','广州天河区珠江新城高德置地A座','鸿美琪商城','','4000899512','Am8:00--Pm18:00','342000163','342000163','1','<p style="text-align:center;"><span style="color:#f10b00;font-size:32px;background-color:#c7e2fe;">网站升级中！</span></p>','xxx 上线了','<div style="text-align:center;"><span style="line-height: 1.5; font-family:;" sans-serif";"="" helvetica,="" arial,="">版权所有&nbsp;&nbsp;&nbsp;&nbsp;北京鸿美琪商贸发展有限公司</span></div>','','photos/wx020369com/logo/201507/14381948481438194848.gif','basic','0','0','0','0','260.00','260.00','600.00','600.00','3600','','a:12:{s:13:"confirm_order";s:1:"0";s:12:"cancel_order";s:1:"1";s:14:"orders_invalid";s:1:"1";s:8:"shipping";s:1:"1";s:13:"getting_goods";s:1:"1";s:22:"new_orders_alert_admin";s:1:"1";s:26:"new_orders_alert_suppliers";s:1:"1";s:14:"buyer_comments";s:1:"1";s:13:"buyer_message";s:1:"1";s:8:"register";s:1:"1";s:12:"editpassword";s:1:"1";s:12:"findpassword";s:1:"1";}','a:6:{s:10:"give_money";N;s:16:"give_money_month";N;s:21:"give_money_month_one1";N;s:22:"give_money_month_one10";N;s:22:"give_money_month_one11";N;s:22:"give_money_month_one12";N;}','25','','测试注册协议<br />','a:9:{s:12:"mail_service";s:1:"0";s:8:"smtp_ssl";s:1:"0";s:9:"smtp_host";s:12:"smtp.163.com";s:9:"smtp_port";s:2:"25";s:9:"smtp_user";s:11:"18051825166";s:9:"smtp_pass";s:14:"wxyuki36501411";s:9:"smtp_mail";s:14:"wxyuki@163.com";s:17:"test_mail_address";s:0:"";s:6:"submit";s:8:" 确定 ";}','欢迎您关注鸿美琪，需要源码请请联系qq34200163');
CREATE TABLE IF NOT EXISTS `gz_tianjia` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL DEFAULT '',
  `ads` varchar(100) NOT NULL DEFAULT '',
  `call` char(15) NOT NULL DEFAULT '',
  `tj` varchar(50) NOT NULL DEFAULT '',
  `tu` varchar(200) NOT NULL DEFAULT '',
  `lng` varchar(20) NOT NULL DEFAULT '',
  `lat` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;
INSERT INTO `gz_tianjia`(`id`,`uname`,`ads`,`call`,`tj`,`tu`,`lng`,`lat`) VALUES ('71','2','etrt','etetwtr','re','','33.150134','108.289095');
INSERT INTO `gz_tianjia`(`id`,`uname`,`ads`,`call`,`tj`,`tu`,`lng`,`lat`) VALUES ('2','雀巢咖啡','上海','12345678910','咖啡','photos/hyyycsyiluxiangsuicn/tu/201506/14338320201433832020.jpg','33.950134','118.289095');
INSERT INTO `gz_tianjia`(`id`,`uname`,`ads`,`call`,`tj`,`tu`,`lng`,`lat`) VALUES ('1','如家酒店','苏州乐嘉大厦','115864966497','','photos/localhost/tu/201506/14334949101433494910.png','33.950134','118.289095');
CREATE TABLE IF NOT EXISTS `gz_top_cate` (
  `tcid` smallint(5) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(128) DEFAULT NULL,
  `cat_url` varchar(128) DEFAULT NULL,
  `cat_img2` varchar(128) DEFAULT NULL,
  `cat_img` varchar(128) DEFAULT NULL,
  `parent_id` smallint(5) DEFAULT '0',
  `cat_id` smallint(5) DEFAULT '0',
  PRIMARY KEY (`tcid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
INSERT INTO `gz_top_cate`(`tcid`,`cat_name`,`cat_url`,`cat_img2`,`cat_img`,`parent_id`,`cat_id`) VALUES ('2','灶具炉具类','','','photos/topimg/201311/13841880591384188059.png','1','531');
INSERT INTO `gz_top_cate`(`tcid`,`cat_name`,`cat_url`,`cat_img2`,`cat_img`,`parent_id`,`cat_id`) VALUES ('1','首页','s','','','0','0');
CREATE TABLE IF NOT EXISTS `gz_top_cate_goods` (
  `gid` smallint(5) NOT NULL AUTO_INCREMENT,
  `tcid` smallint(4) NOT NULL,
  `img` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `gname` varchar(255) DEFAULT NULL,
  `goods_id` smallint(6) DEFAULT '0',
  PRIMARY KEY (`gid`),
  KEY `tcid` (`tcid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_topic` (
  `topic_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(255) NOT NULL DEFAULT '',
  `topic_desc` text NOT NULL,
  `start_time` int(11) NOT NULL DEFAULT '0',
  `end_time` int(11) NOT NULL DEFAULT '0',
  `goods_ids` text COMMENT '序列化之后保存',
  `topic_type` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '顶部图片展示类型',
  `topic_img` varchar(128) DEFAULT NULL,
  `topic_flash` varchar(128) NOT NULL DEFAULT '' COMMENT '顶部flash',
  `topic_imgurl` varchar(128) NOT NULL DEFAULT '' COMMENT '顶部图片或flash外部URL',
  `topic_imgcode` text NOT NULL COMMENT '顶部展示的代码（取代图片、flash）',
  `top_url` varchar(128) NOT NULL DEFAULT '' COMMENT '顶部flash或图片的URL',
  `meta_keys` varchar(255) DEFAULT NULL,
  `meta_desc` varchar(255) DEFAULT NULL,
  `topic_bgimg` varchar(128) DEFAULT NULL,
  `topic_bgcolor` varchar(128) DEFAULT NULL,
  KEY `topic_id` (`topic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
INSERT INTO `gz_topic`(`topic_id`,`topic_name`,`topic_desc`,`start_time`,`end_time`,`goods_ids`,`topic_type`,`topic_img`,`topic_flash`,`topic_imgurl`,`topic_imgcode`,`top_url`,`meta_keys`,`meta_desc`,`topic_bgimg`,`topic_bgcolor`) VALUES ('1','SSS','','1426176000','1427731200','O:8:"stdClass":1:{s:7:"default";a:5:{i:0;s:10:"3232323|69";i:1;s:18:"手机充值卡|68";i:2;s:54:"补水保湿胶原蛋白修复水疗动力面膜贴|67";i:3;s:54:"补水保湿胶原蛋白修复水疗动力面膜贴|66";i:4;s:15:"进口面膜|65";}}','0','photos/localhost/topic/201503/14261849961426184996.jpg','','','','http://','S','SS','','FFFFFF');
CREATE TABLE IF NOT EXISTS `gz_udaili_siteset` (
  `id` mediumint(7) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL DEFAULT '0',
  `sitename` varchar(128) DEFAULT NULL,
  `logo` varchar(128) DEFAULT NULL,
  `sitetitle` varchar(128) DEFAULT NULL,
  `metakey` varchar(128) DEFAULT NULL,
  `metadesc` varchar(255) DEFAULT NULL,
  `kefucode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
INSERT INTO `gz_udaili_siteset`(`id`,`uid`,`sitename`,`logo`,`sitetitle`,`metakey`,`metadesc`,`kefucode`) VALUES ('5','64','哦哦哦','','哦哦哦','','','');
INSERT INTO `gz_udaili_siteset`(`id`,`uid`,`sitename`,`logo`,`sitetitle`,`metakey`,`metadesc`,`kefucode`) VALUES ('4','59','你米','','你米','','','');
INSERT INTO `gz_udaili_siteset`(`id`,`uid`,`sitename`,`logo`,`sitetitle`,`metakey`,`metadesc`,`kefucode`) VALUES ('3','41','吴乾坤','','吴乾坤','','','');
INSERT INTO `gz_udaili_siteset`(`id`,`uid`,`sitename`,`logo`,`sitetitle`,`metakey`,`metadesc`,`kefucode`) VALUES ('2','23','测试','','测试','','','');
CREATE TABLE IF NOT EXISTS `gz_user` (
  `user_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `quid` smallint(6) DEFAULT '0',
  `wecha_id` varchar(64) NOT NULL,
  `email` varchar(60) NOT NULL DEFAULT '',
  `user_name` varchar(60) DEFAULT NULL,
  `nickname` varchar(64) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `question` varchar(255) NOT NULL DEFAULT '',
  `answer` varchar(255) NOT NULL DEFAULT '',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `avatar` varchar(128) NOT NULL DEFAULT '',
  `user_money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pay_points` int(10) unsigned NOT NULL DEFAULT '0',
  `rank_points` int(10) unsigned NOT NULL DEFAULT '0',
  `address_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `reg_time` int(11) unsigned NOT NULL DEFAULT '0',
  `reg_ip` varchar(32) NOT NULL DEFAULT '0.0.0.0',
  `reg_from` varchar(64) NOT NULL DEFAULT '',
  `last_login` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `last_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_ip` varchar(15) NOT NULL DEFAULT '',
  `visit_count` smallint(5) unsigned NOT NULL DEFAULT '0',
  `user_rank` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '用户级别',
  `types` tinyint(1) NOT NULL DEFAULT '2' COMMENT '默认兼职',
  `msn` varchar(60) NOT NULL DEFAULT '',
  `qq` varchar(20) NOT NULL DEFAULT '',
  `office_phone` varchar(20) NOT NULL DEFAULT '',
  `home_phone` varchar(20) NOT NULL DEFAULT '',
  `mobile_phone` varchar(20) NOT NULL DEFAULT '',
  `active` enum('0','1') NOT NULL DEFAULT '0',
  `cityname` varchar(32) DEFAULT NULL,
  `provincename` varchar(32) DEFAULT NULL,
  `headimgurl` varchar(255) DEFAULT NULL,
  `is_subscribe` tinyint(1) NOT NULL DEFAULT '0',
  `subscribe_rank` mediumint(8) DEFAULT '0',
  `subscribe_time` int(10) DEFAULT '0',
  `is_salesmen` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1:正在申请代理 2：正式代理',
  `is_dailiapply` tinyint(1) DEFAULT '1',
  `share_ucount` smallint(5) NOT NULL DEFAULT '0' COMMENT '邀请数',
  `guanzhu_ucount` smallint(5) NOT NULL DEFAULT '0' COMMENT '关注数',
  `points_ucount` smallint(5) NOT NULL DEFAULT '0' COMMENT '积分总数',
  `money_ucount` float(7,2) NOT NULL DEFAULT '0.00' COMMENT '资金总数',
  `mymoney` float(7,2) DEFAULT '0.00',
  `mypoints` mediumint(6) DEFAULT '0',
  `gzranking` mediumint(8) NOT NULL DEFAULT '0' COMMENT '当前关注排名',
  `lng` varchar(20) NOT NULL DEFAULT '',
  `lat` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('81','0','o80GWuFNSY07Tt644zyzo2M7uB8s','','o80GWuFNSY07Tt644zyzo2M7uB8s','你不懂我的爱','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438537819','140.207.54.77','上海市 联通','1438537819','0000-00-00 00:00:00','140.207.54.77','0','12','2','','','','','','1','云浮','广东','http://wx.qlogo.cn/mmopen/H398ouqRzymH1fTjyV4OTqicKvUSEVWZpNL740kzDgYviaZhDzOxaVCAR22eJBBn4zeSqv4STicicWN0iaiaTNoicMibsgnV7cYUibLch/0','0','28','1438537815','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('80','0','o80GWuIjlJRYvwxl7gfmEodh8-FE','','o80GWuIjlJRYvwxl7gfmEodh8-FE','贾阳 18660608330','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438534949','140.207.54.74','上海市 联通','1438534949','0000-00-00 00:00:00','140.207.54.74','0','12','2','','','','','','1','潍坊','山东','http://wx.qlogo.cn/mmopen/8m5Ypga0P6kYJibUsbjWAt0oNlhEEibxFFs3hx08AV8aEJ8tHQDVl9VzWiaZhRptjXhw2vG03ibLPPdMbKaR6GyziakSrKMS8VD6w/0','1','27','1438534947','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('79','18','o80GWuJqaYI8ZGacIYFyTR76Dd1M','','o80GWuJqaYI8ZGacIYFyTR76Dd1M','不晃','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438513349','140.207.54.77','上海市 联通','1438513349','0000-00-00 00:00:00','140.207.54.77','0','12','2','','','','','','1','渝北','重庆','http://wx.qlogo.cn/mmopen/8m5Ypga0P6mu7sGica7TOThFKVow8Qv3I8zhP3Z1UfzKgN4w1HIFlib8kwr4eibBVWGyUt01zzmuS6LnduCD3UWLM8w68KPsCQG/0','0','27','1438513348','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('78','0','o80GWuCxenO75GP2BTWyKo9tZ71I','','o80GWuCxenO75GP2BTWyKo9tZ71I','Michael','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438474400','140.207.54.75','上海市 联通','1438474400','0000-00-00 00:00:00','140.207.54.75','0','12','2','','','','','','1','景德镇','江西','http://wx.qlogo.cn/mmopen/8m5Ypga0P6m31AfsUic9GdlyG2kT2LnricnH26BetUgrWIt0TvVIUpylto3WZpsPvUWZzMxhb0B6Xxrc5dicxdjqlB7HHa5vGVp/0','1','25','1438474397','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('77','17','o80GWuPognW6weU6hK-StOEZQ06k','','o80GWuPognW6weU6hK-StOEZQ06k','凌晨','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438467482','140.207.54.75','上海市 联通','1438467482','0000-00-00 00:00:00','140.207.54.75','0','12','2','','','','','','1','景德镇','江西','http://wx.qlogo.cn/mmopen/iaEyT0P27SdUAHVL7iciclicnWmnMp2BkQ5bxaAOxHasWOK2o7u9N7AlWZiaWYEnTOlv10yOmGbBqaR3ib7G2wXIvZjg8lSJqOGrdH/0','1','24','1438467478','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('76','16','o80GWuH-ROnPasCgERSCjKpqlFgs','','o80GWuH-ROnPasCgERSCjKpqlFgs','罗永城','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438436343','140.207.54.75','上海市 联通','1438436343','0000-00-00 00:00:00','140.207.54.75','0','12','2','','','','','','1','','施蒂利亚','http://wx.qlogo.cn/mmopen/iaEyT0P27SdUId1MLWa1DFaqa04VranRiaQQ35SuxAMGYaUrF1ujrjE4CpZKDWCxF9XPRaO0e2Ql6Lz48ibANbFeibwr3tOq70pS/0','0','24','1438436337','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('75','15','o80GWuNGHbq2bnF5ySMidxcV4YTU','','o80GWuNGHbq2bnF5ySMidxcV4YTU','夜，好美','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438426543','140.207.54.77','上海市 联通','1438426543','0000-00-00 00:00:00','140.207.54.77','0','12','2','','','','','','1','玉林','广西','http://wx.qlogo.cn/mmopen/KDLkl80EgLibun8J7PU3Ro7D3HvBgGHSo4qAtwh9tw3m8jbicqz5icLdGwFByg8PhcMLEuZbATRagxnTqyt9WOXMRxiafZCibYNyia/0','1','23','1438426541','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('74','14','o80GWuK9oPkM_MaasCOiIlYpXPEw','','o80GWuK9oPkM_MaasCOiIlYpXPEw','上山的蚂蚁','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438422203','171.116.146.211','山西省太原市 联通','1438422203','0000-00-00 00:00:00','171.116.146.211','0','12','2','','','','','','1','太原','山西','http://wx.qlogo.cn/mmopen/iaEyT0P27SdUWLzPiaiaCCXOhkySwZQEoxRHQsxjpM71gZGzSCNkRhhAGZceEBic7KmKVia5xVoD3JvJPJTXibdrWYZa1S2h2qKNbf/0','1','0','0','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('73','13','o80GWuBSl-PKTC3ekynJQdp3fNCs','','o80GWuBSl-PKTC3ekynJQdp3fNCs','世联创享–张红雷','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438417532','171.213.33.62','四川省 电信','1438417532','0000-00-00 00:00:00','171.213.33.62','0','12','2','','','','','','1','宝山','上海','http://wx.qlogo.cn/mmopen/8m5Ypga0P6mruPk6rckb4xmy7DulYCoJT9lClX7WPPbM1xWBNFlvkRPRVLzWibVib2kCibhpzEcuQzLBAj5odAuvxrOx1VhOr3A/0','0','0','0','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('72','10','o80GWuFQjQZ_3UKDlAz8fippRTRY','','o80GWuFQjQZ_3UKDlAz8fippRTRY','应俊','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438415437','140.207.54.73','上海市 联通','1438415437','0000-00-00 00:00:00','140.207.54.73','0','12','2','','','','','','1','苏州','江苏','http://wx.qlogo.cn/mmopen/ajNVdqHZLLAjicZclqO762IjBoV8giarfjkNyocYia7f7c0N0HgVDrmGWxjeoZJAOia7cHfkA73p4hmo7uEtzjic8fQ/0','0','22','1438415436','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('71','0','o80GWuFtLE4mzzfCv3w6FJrv4mCY','','o80GWuFtLE4mzzfCv3w6FJrv4mCY','Mitch Kuo','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438395680','140.207.54.73','上海市 联通','1438395680','0000-00-00 00:00:00','140.207.54.73','0','12','2','','','','','','1','东莞','广东','http://wx.qlogo.cn/mmopen/iaEyT0P27SdUB8Usjic5Wx16rcE02ibXQtW72L9m7lu81rNCaZlazBLQ17oNKkMiaPWqEcXKbgibMJMFuNt6L5YB9ZERXzvQuJESn/0','0','22','1438395678','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('70','0','o80GWuG0iesQTYbIsEyHemiLBp6k','','o80GWuG0iesQTYbIsEyHemiLBp6k','CrazyCodes','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438341368','117.79.232.208','北京市朝阳区 北京数据家科技有限公司','1438341368','0000-00-00 00:00:00','117.79.232.208','0','12','2','','','','','','1','','北京','http://wx.qlogo.cn/mmopen/Q3auHgzwzM7toFibSnrOhaWIwjeicF736ia22konvuR4NvU0ibzSbWrt5K1X5ibDqXFZZvWjWF20HD59OIibzY33j0leEZILyZuHFXLnf19OJFhok/0','1','0','1436234118','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('69','0','o80GWuF4nvK6Pco8tXCnTpAkKq18','','o80GWuF4nvK6Pco8tXCnTpAkKq18','【玖号酒庄】邢家赫','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438341008','140.207.54.77','上海市 联通','1438341008','0000-00-00 00:00:00','140.207.54.77','0','12','2','','','','','','1','苏州','江苏','http://wx.qlogo.cn/mmopen/XYrRG5UShDcj9Tsthps1AWjdHhGcnxhiaxmia1y82R26WtDNJrkMtUeia8vzB9c5Wm6gjZm7QFlusw1pRj9ZzqZBZyhYZs698icQ/0','1','20','1438340987','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('68','0','o80GWuF4nvK6Pco8tXCnTpAkKq18','','o80GWuF4nvK6Pco8tXCnTpAkKq18','【玖号酒庄】邢家赫','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438341008','140.207.54.77','上海市 联通','1438341008','0000-00-00 00:00:00','140.207.54.77','0','12','2','','','','','','1','苏州','江苏','http://wx.qlogo.cn/mmopen/XYrRG5UShDcj9Tsthps1AWjdHhGcnxhiaxmia1y82R26WtDNJrkMtUeia8vzB9c5Wm6gjZm7QFlusw1pRj9ZzqZBZyhYZs698icQ/0','1','19','1438340987','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('67','0','o80GWuF4nvK6Pco8tXCnTpAkKq18','','o80GWuF4nvK6Pco8tXCnTpAkKq18','【玖号酒庄】邢家赫','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438341008','140.207.54.77','上海市 联通','1438341008','0000-00-00 00:00:00','140.207.54.77','0','12','2','','','','','','1','苏州','江苏','http://wx.qlogo.cn/mmopen/XYrRG5UShDcj9Tsthps1AWjdHhGcnxhiaxmia1y82R26WtDNJrkMtUeia8vzB9c5Wm6gjZm7QFlusw1pRj9ZzqZBZyhYZs698icQ/0','1','18','1438340987','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('66','0','o80GWuFiVXj-3dOGZXmQocMMZ-yo','','o80GWuFiVXj-3dOGZXmQocMMZ-yo','美容医生','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438340241','112.97.36.149','广东省深圳市 联通','1438340241','0000-00-00 00:00:00','112.97.36.149','0','12','2','','','','','','1','深圳','广东','http://wx.qlogo.cn/mmopen/H398ouqRzykyHzTxatjp1LruDBUT7KAbBtEPej7wGjQfzmXDbDXyJs2Jt9T0d5Seeya1zEqicX5GiapMae36CBPKWcSbegeqv4/0','1','0','0','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('65','0','o80GWuBH2pISgErf9GHDo6TrWw4U','','o80GWuBH2pISgErf9GHDo6TrWw4U','王杰','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438334063','140.207.54.80','上海市 联通','1438334063','0000-00-00 00:00:00','140.207.54.80','0','12','2','','','','','','1','合肥','安徽','http://wx.qlogo.cn/mmopen/8m5Ypga0P6nVKbiaUo5K7JEvqYoHf5MXicVEzHCGUtKQkazSUKYODSYKib6hQOUTREq4P3ibOu6g3gLmHrVJB3WjGg/0','1','16','1438334061','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('64','0','o80GWuPp2hugtq3EEyk4_5R81qGc','','o80GWuPp2hugtq3EEyk4_5R81qGc','','507f513353702b50c145d5b7d138095c','哦哦哦','刘德华','0','0000-00-00','','0.00','0','0','0','1438329696','180.78.104.242','北京市 歌华有线','1438329696','0000-00-00 00:00:00','180.78.104.242','0','12','2','','','','','13366447777','1','','','','0','15','0','1','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('63','0','o80GWuFiwwRD6MQmIsknaepM56U8','','o80GWuFiwwRD6MQmIsknaepM56U8','','507f513353702b50c145d5b7d138095c','','','0','0000-00-00','','0.00','0','0','0','1438328274','117.136.40.137','中国 移动','1438328274','0000-00-00 00:00:00','117.136.40.137','0','12','2','','','','','','1','','','','0','0','0','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('62','7','o80GWuEsw2RFTHswnNrVwrzbbvWo','','o80GWuEsw2RFTHswnNrVwrzbbvWo','阿豪','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438323827','1.191.2.247','黑龙江省 联通','1438323827','0000-00-00 00:00:00','1.191.2.247','0','12','2','','','','','','1','齐齐哈尔','黑龙江','http://wx.qlogo.cn/mmopen/ajNVdqHZLLAGBCblGibrQm5RI4mFfbMsrRKZEqZINXSBr7vp0pM48jQ8YLAicGiaJqkw9peZBx0kDVReGDojR9S2KjiaicRzOeTm9kwuEbujpxr4/0','1','0','0','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('61','0','o80GWuELDGHeuZKFL56S2595E4Qo','','o80GWuELDGHeuZKFL56S2595E4Qo','泪水渲染的懵懂','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438323780','112.96.176.60','广东省佛山市 联通','1438323780','0000-00-00 00:00:00','112.96.176.60','0','12','2','','','','','','1','白山','吉林','http://wx.qlogo.cn/mmopen/ajNVdqHZLLAfVceicHxdSY4I3fJpuxxuB7VdEfIwIKAwsBEPN5trhMshLRa2quLztM1K1kAP4qq740TtOHF7bsw/0','1','15','1438326792','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('60','6','o80GWuOFVSygSkh_inRNWzRRYY8I','','o80GWuOFVSygSkh_inRNWzRRYY8I','  L。','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438322806','140.207.54.77','上海市 联通','1438322806','0000-00-00 00:00:00','140.207.54.77','0','12','2','','','','','','1','海淀','北京','http://wx.qlogo.cn/mmopen/XYrRG5UShDfM15iaXrV4L9mmBiaUIYyQPMXq4hOT1pbv7ibpjz38JVofE6yliaoXm2ePXKYescHtPEwhn5O72P0MRQ/0','1','13','1438322803','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('59','5','o80GWuIA0wtT00uyojok81bGZXRk','','o80GWuIA0wtT00uyojok81bGZXRk','设计开发部朱杰昊','507f513353702b50c145d5b7d138095c','你米','洗了个','1','0000-00-00','','0.00','0','0','0','1438314477','140.207.54.74','上海市 联通','1438314477','0000-00-00 00:00:00','140.207.54.74','0','12','2','','','','','13620354795','1','肇庆','广东','http://wx.qlogo.cn/mmopen/H398ouqRzyl8nGA3A3WqIMT5NWxY4Xuxd6oBEkuKbvqUEbQeiaKE6ibyt2BbRdLneFtG8AibsOiciaaBmDuTDqLMmuQ/0','1','12','1438314474','1','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('58','0','o80GWuP0pOE8YGe1T2A1ewct3DVk','','o80GWuP0pOE8YGe1T2A1ewct3DVk','汉马针织制衣厂','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438282927','123.158.101.49','浙江省衢州市 联通','1438282928','0000-00-00 00:00:00','123.158.101.49','0','12','2','','','','','','1','嘉兴','浙江','http://wx.qlogo.cn/mmopen/H398ouqRzykEsVZDr0QhgJEnSDlhblPCjrYvJ5nR0j1JiajviaXxwfa2SMSAK8WxD5pVF3ibXQmtem78tBacHIrIRibnTgYHM9JR/0','1','0','0','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('57','4','o80GWuJkEJ3AhUZ7wj3KHT9cdHek','','o80GWuJkEJ3AhUZ7wj3KHT9cdHek','黄冈','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438261175','140.207.54.75','上海市 联通','1438261175','0000-00-00 00:00:00','140.207.54.75','0','12','2','','','','','','1','武汉','湖北','http://wx.qlogo.cn/mmopen/iaEyT0P27SdUId1MLWa1DFUCDbay9vRwLz0vLNJUxqYMhAvAzg2f3T8In4Rr62ewibaGcKy6J2yOXwPxH3Dm9W1oFLxJickbJcc/0','1','10','1438261162','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('56','0','o80GWuNlatX2yndFWJQ8Rt6nxjhw','','o80GWuNlatX2yndFWJQ8Rt6nxjhw','stella','507f513353702b50c145d5b7d138095c','','','2','0000-00-00','','0.00','0','0','0','1438259194','117.136.38.147','中国 移动','1438259194','0000-00-00 00:00:00','117.136.38.147','0','12','2','','','','','','1','','首尔','http://wx.qlogo.cn/mmopen/H398ouqRzylRXdj5sThjctcnaawDFQ7micndywFf7DE4iaDAgB0zNTZdj4g5eX8jLvxtF0gKPLaTkKdCj0d0qJk4EFvBZGMG6M/0','1','0','0','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('55','3','o80GWuKgV2GVs5jXeDgtmUH2ZLSo','','o80GWuKgV2GVs5jXeDgtmUH2ZLSo','阿阿阿龙','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438250795','140.207.54.73','上海市 联通','1438250795','0000-00-00 00:00:00','140.207.54.73','0','12','2','','','','','','1','仙桃','湖北','http://wx.qlogo.cn/mmopen/ajNVdqHZLLBeropKAleI0ynUakoEX7r99JmWoMYLPeWsvcczcgLnOMIITJqwIELVoPN5CFtgTuZlbqhviaicmRjg/0','0','9','1438250790','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('54','0','o80GWuJCHqf6EcmVBygFMJdvwwYM','','o80GWuJCHqf6EcmVBygFMJdvwwYM','陈亮','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438245186','140.207.54.80','上海市 联通','1438245186','0000-00-00 00:00:00','140.207.54.80','0','12','2','','','','','','1','阿克苏','新疆','http://wx.qlogo.cn/mmopen/H398ouqRzymWpbH9RXYjKntSE6zrpyeIYcxQGiaRpz0LOCexicf6rfNLSibpavs8mRu7DJvibfZ1Fu3wGkTBE9JAIPnMpPSDhzsz/0','1','8','1438245183','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('53','2','o80GWuDWDJNnPAQ4hm8G4DbTugdw','','o80GWuDWDJNnPAQ4hm8G4DbTugdw','A01    几何网络科技  魏磊成','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438244182','140.207.54.77','上海市 联通','1438244182','0000-00-00 00:00:00','140.207.54.77','0','12','2','','','','','','1','','','http://wx.qlogo.cn/mmopen/H398ouqRzykEsVZDr0QhgASz3JzibRtlib7cFw34AspAkayz2e5gnpZC7WgXEtAcPbI9s3CKUSZBrK1lzibPrAN5NMDDZIJB8PI/0','1','7','1438244832','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('52','1','o80GWuK4li3vJRsEFSaaDpwMydYs','','o80GWuK4li3vJRsEFSaaDpwMydYs','A. 咖瘦酵素 苹果加粉神机招商','507f513353702b50c145d5b7d138095c','','','0','0000-00-00','','0.00','0','0','0','1438240279','140.207.54.75','上海市 联通','1438240279','0000-00-00 00:00:00','140.207.54.75','0','12','2','','','','','','1','','','http://wx.qlogo.cn/mmopen/H398ouqRzyky8y2RrSCho6ms0rP14bTsrlyq2dxPQacGsMDgWvJLZ7w85Bu3iaBP2YgW0grSY2cgQbXFxrDw757tvBEBzcDVl/0','1','6','1438240267','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('51','0','o80GWuK4li3vJRsEFSaaDpwMydYs','','o80GWuK4li3vJRsEFSaaDpwMydYs','A. 咖瘦酵素 苹果加粉神机招商','507f513353702b50c145d5b7d138095c','','','0','0000-00-00','','0.00','0','0','0','1438240279','140.207.54.75','上海市 联通','1438240279','0000-00-00 00:00:00','140.207.54.75','0','12','2','','','','','','1','','','http://wx.qlogo.cn/mmopen/H398ouqRzyky8y2RrSCho6ms0rP14bTsrlyq2dxPQacGsMDgWvJLZ7w85Bu3iaBP2YgW0grSY2cgQbXFxrDw757tvBEBzcDVl/0','1','5','1438240267','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('50','9','o80GWuAO-PdKWTEPIjXceAe9wJhQ','','o80GWuAO-PdKWTEPIjXceAe9wJhQ','叫我政哥…','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438234508','140.207.54.77','上海市 联通','1438234508','0000-00-00 00:00:00','140.207.54.77','0','12','2','','','','','','1','','','http://wx.qlogo.cn/mmopen/PiajxSqBRaEJdxhped2AGMJoQq0o9Cpe91nw8icmctMo9KOzqYAfoHt2TJtt2G1TbiaawmeD36FzfibRjTmIqqeY9w/0','1','4','1438234505','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('49','0','o80GWuA8_0eV2D2HLZcbViYDq20o','','o80GWuA8_0eV2D2HLZcbViYDq20o','烈日冰雨','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438210263','140.207.54.80','上海市 联通','1438210263','0000-00-00 00:00:00','140.207.54.80','0','1','2','','','','','','1','广州','广东','http://wx.qlogo.cn/mmopen/iaEyT0P27SdXY4ePyHrKPF651wzUsZVyJRx4xicw8jdUp1IpD87pC79nGzGgh6T39fichLibxWIibShRcicZn5h4BmnzXaR2zksS13/0','1','26','1438484654','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('48','8','o80GWuBnQ45xOoLXxmrBywdnhT3c','','o80GWuBnQ45xOoLXxmrBywdnhT3c','W Q K','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438197429','140.207.54.80','上海市 联通','1438197429','0000-00-00 00:00:00','140.207.54.80','0','11','2','','','','','','1','','北京','http://wx.qlogo.cn/mmopen/8m5Ypga0P6kYJibUsbjWAt7tdFXrk02iao8n7T3ZHiaXM0ia7g5x5WvvRTZG96a73hrCnGBpiaiaiaSibmGFAHekiaUtvcvmiaX6mb9eHf/0','1','15','1438325337','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('47','0','o80GWuFPDPYt7nMbIMiNL_8bISLw','','o80GWuFPDPYt7nMbIMiNL_8bISLw','吴乾坤','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438197124','140.207.54.77','上海市 联通','1438197124','0000-00-00 00:00:00','140.207.54.77','0','1','2','','','','','','1','','','http://wx.qlogo.cn/mmopen/8m5Ypga0P6m39KJB2EBp4xiahNrxhDWjM52P3NxFgDyqv4tx0taIOiaFS27JgthvSAK2on8feianWLeIODePvcC7BzxFcj1j8a7/0','1','10','1438280818','0','1','0','0','0','0.00','0.00','0','0','','');
INSERT INTO `gz_user`(`user_id`,`quid`,`wecha_id`,`email`,`user_name`,`nickname`,`password`,`question`,`answer`,`sex`,`birthday`,`avatar`,`user_money`,`pay_points`,`rank_points`,`address_id`,`reg_time`,`reg_ip`,`reg_from`,`last_login`,`last_time`,`last_ip`,`visit_count`,`user_rank`,`types`,`msn`,`qq`,`office_phone`,`home_phone`,`mobile_phone`,`active`,`cityname`,`provincename`,`headimgurl`,`is_subscribe`,`subscribe_rank`,`subscribe_time`,`is_salesmen`,`is_dailiapply`,`share_ucount`,`guanzhu_ucount`,`points_ucount`,`money_ucount`,`mymoney`,`mypoints`,`gzranking`,`lng`,`lat`) VALUES ('46','0','o80GWuNfEpmycez5LE1kj17Htaps','','o80GWuNfEpmycez5LE1kj17Htaps','成龙','507f513353702b50c145d5b7d138095c','','','1','0000-00-00','','0.00','0','0','0','1438195215','140.207.54.80','上海市 联通','1438195215','0000-00-00 00:00:00','140.207.54.80','0','1','2','','','','','','1','','','http://wx.qlogo.cn/mmopen/iaEyT0P27SdVCD2INL0XO50dKtvQYC7gKl5jr1eAGg3bkvrd55NE4ib2tiagw2R2VibePOZgxqwbZjj3JSeF50KoxrtWd4rEflKr/0','1','4','1438235882','0','1','0','0','0','0.00','0.00','0','0','','');
CREATE TABLE IF NOT EXISTS `gz_user_address` (
  `address_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `address_name` varchar(50) NOT NULL DEFAULT '',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `consignee` varchar(60) NOT NULL DEFAULT '',
  `sex` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '保密，男，女',
  `email` varchar(60) NOT NULL DEFAULT '',
  `country` smallint(5) NOT NULL DEFAULT '0',
  `province` smallint(5) NOT NULL DEFAULT '0',
  `city` smallint(5) NOT NULL DEFAULT '0',
  `district` smallint(5) NOT NULL DEFAULT '0',
  `town` smallint(5) NOT NULL DEFAULT '0',
  `village` smallint(5) NOT NULL DEFAULT '0',
  `shop_id` smallint(5) NOT NULL DEFAULT '0',
  `address` varchar(120) NOT NULL DEFAULT '',
  `zipcode` varchar(60) NOT NULL DEFAULT '',
  `tel` varchar(60) NOT NULL DEFAULT '',
  `mobile` varchar(60) NOT NULL DEFAULT '',
  `sign_building` varchar(120) NOT NULL DEFAULT '',
  `best_time` varchar(120) NOT NULL DEFAULT '',
  `uptime` int(11) NOT NULL DEFAULT '0',
  `is_default` enum('0','1') NOT NULL DEFAULT '0' COMMENT '默认收货地址',
  `is_own` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否是本人地址',
  `shoppingname` tinyint(10) DEFAULT NULL,
  `shoppingtime` varchar(64) DEFAULT NULL,
  `company` varchar(128) DEFAULT NULL,
  `license` varchar(125) DEFAULT NULL,
  `brand` varchar(125) DEFAULT NULL,
  `about` text,
  `peisong` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`address_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
INSERT INTO `gz_user_address`(`address_id`,`address_name`,`user_id`,`consignee`,`sex`,`email`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`sign_building`,`best_time`,`uptime`,`is_default`,`is_own`,`shoppingname`,`shoppingtime`,`company`,`license`,`brand`,`about`,`peisong`) VALUES ('48','','74','上山的蚂蚁','1','','1','3500','300','0','0','0','0','','','','','','','0','0','1','','','','','','','');
INSERT INTO `gz_user_address`(`address_id`,`address_name`,`user_id`,`consignee`,`sex`,`email`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`sign_building`,`best_time`,`uptime`,`is_default`,`is_own`,`shoppingname`,`shoppingtime`,`company`,`license`,`brand`,`about`,`peisong`) VALUES ('47','','73','世联创享–张红雷','1','','1','321','4125','0','0','0','0','','','','','','','0','0','1','','','','','','','');
INSERT INTO `gz_user_address`(`address_id`,`address_name`,`user_id`,`consignee`,`sex`,`email`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`sign_building`,`best_time`,`uptime`,`is_default`,`is_own`,`shoppingname`,`shoppingtime`,`company`,`license`,`brand`,`about`,`peisong`) VALUES ('46','','66','美容医生','1','','1','6','77','0','0','0','0','','','','','','','0','0','1','','','','','','','');
INSERT INTO `gz_user_address`(`address_id`,`address_name`,`user_id`,`consignee`,`sex`,`email`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`sign_building`,`best_time`,`uptime`,`is_default`,`is_own`,`shoppingname`,`shoppingtime`,`company`,`license`,`brand`,`about`,`peisong`) VALUES ('45','','48','吴乾坤','0','','1','2','52','501','0','0','0','啊啊啊','','','135899988899988','','','0','1','0','','','','','','','');
INSERT INTO `gz_user_address`(`address_id`,`address_name`,`user_id`,`consignee`,`sex`,`email`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`sign_building`,`best_time`,`uptime`,`is_default`,`is_own`,`shoppingname`,`shoppingtime`,`company`,`license`,`brand`,`about`,`peisong`) VALUES ('44','','62','阿豪','1','','1','12','176','0','0','0','0','','','','','','','0','0','1','','','','','','','');
INSERT INTO `gz_user_address`(`address_id`,`address_name`,`user_id`,`consignee`,`sex`,`email`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`sign_building`,`best_time`,`uptime`,`is_default`,`is_own`,`shoppingname`,`shoppingtime`,`company`,`license`,`brand`,`about`,`peisong`) VALUES ('43','','61','泪水渲染的懵懂','1','','1','4008','4047','0','0','0','0','','','','','','','0','0','1','','','','','','','');
INSERT INTO `gz_user_address`(`address_id`,`address_name`,`user_id`,`consignee`,`sex`,`email`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`sign_building`,`best_time`,`uptime`,`is_default`,`is_own`,`shoppingname`,`shoppingtime`,`company`,`license`,`brand`,`about`,`peisong`) VALUES ('42','','58','汉马针织制衣厂','1','','1','31','385','0','0','0','0','','','','','','','0','0','1','','','','','','','');
INSERT INTO `gz_user_address`(`address_id`,`address_name`,`user_id`,`consignee`,`sex`,`email`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`sign_building`,`best_time`,`uptime`,`is_default`,`is_own`,`shoppingname`,`shoppingtime`,`company`,`license`,`brand`,`about`,`peisong`) VALUES ('41','','46','日期','0','','1','7','101','902','0','0','0','可！吗的','','','15555555555555','','','0','1','0','','','','','','','');
INSERT INTO `gz_user_address`(`address_id`,`address_name`,`user_id`,`consignee`,`sex`,`email`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`sign_building`,`best_time`,`uptime`,`is_default`,`is_own`,`shoppingname`,`shoppingtime`,`company`,`license`,`brand`,`about`,`peisong`) VALUES ('40','','45','44','0','','1','3','38','417','0','0','0','5455','','','21212','','','0','1','0','','','','','','','');
INSERT INTO `gz_user_address`(`address_id`,`address_name`,`user_id`,`consignee`,`sex`,`email`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`sign_building`,`best_time`,`uptime`,`is_default`,`is_own`,`shoppingname`,`shoppingtime`,`company`,`license`,`brand`,`about`,`peisong`) VALUES ('39','','44','747','0','','1','5','64','619','0','0','0','77','','','12354555','','','0','1','0','','','','','','','');
INSERT INTO `gz_user_address`(`address_id`,`address_name`,`user_id`,`consignee`,`sex`,`email`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`sign_building`,`best_time`,`uptime`,`is_default`,`is_own`,`shoppingname`,`shoppingtime`,`company`,`license`,`brand`,`about`,`peisong`) VALUES ('38','','43','77','0','','1','4','55','540','0','0','0','75','','','1223545665','','','0','1','0','','','','','','','');
INSERT INTO `gz_user_address`(`address_id`,`address_name`,`user_id`,`consignee`,`sex`,`email`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`sign_building`,`best_time`,`uptime`,`is_default`,`is_own`,`shoppingname`,`shoppingtime`,`company`,`license`,`brand`,`about`,`peisong`) VALUES ('37','','42','4343','0','','1','3','37','410','0','0','0','5544545','','','11234567876','','','0','1','0','','','','','','','');
INSERT INTO `gz_user_address`(`address_id`,`address_name`,`user_id`,`consignee`,`sex`,`email`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`sign_building`,`best_time`,`uptime`,`is_default`,`is_own`,`shoppingname`,`shoppingtime`,`company`,`license`,`brand`,`about`,`peisong`) VALUES ('36','','41','','0','','1','0','0','0','0','0','0','','','','','','','0','0','1','','','','','','','');
INSERT INTO `gz_user_address`(`address_id`,`address_name`,`user_id`,`consignee`,`sex`,`email`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`sign_building`,`best_time`,`uptime`,`is_default`,`is_own`,`shoppingname`,`shoppingtime`,`company`,`license`,`brand`,`about`,`peisong`) VALUES ('34','','28','test','0','','1','5','64','619','0','0','0','test','','','','','','0','0','1','','','','','','','');
INSERT INTO `gz_user_address`(`address_id`,`address_name`,`user_id`,`consignee`,`sex`,`email`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`sign_building`,`best_time`,`uptime`,`is_default`,`is_own`,`shoppingname`,`shoppingtime`,`company`,`license`,`brand`,`about`,`peisong`) VALUES ('28','','28','test','0','','1','5','64','619','0','0','0','test','','','18051825162','','','0','1','0','4','','','','','','');
INSERT INTO `gz_user_address`(`address_id`,`address_name`,`user_id`,`consignee`,`sex`,`email`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`sign_building`,`best_time`,`uptime`,`is_default`,`is_own`,`shoppingname`,`shoppingtime`,`company`,`license`,`brand`,`about`,`peisong`) VALUES ('27','','27','测试','0','','1','2','52','501','0','0','0','城市之星','','','18051825161','','','0','1','0','','','','','','','');
INSERT INTO `gz_user_address`(`address_id`,`address_name`,`user_id`,`consignee`,`sex`,`email`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`sign_building`,`best_time`,`uptime`,`is_default`,`is_own`,`shoppingname`,`shoppingtime`,`company`,`license`,`brand`,`about`,`peisong`) VALUES ('26','','23','test','0','','1','2','52','500','0','0','0','test','','','','','','0','0','1','','','','','','','');
INSERT INTO `gz_user_address`(`address_id`,`address_name`,`user_id`,`consignee`,`sex`,`email`,`country`,`province`,`city`,`district`,`town`,`village`,`shop_id`,`address`,`zipcode`,`tel`,`mobile`,`sign_building`,`best_time`,`uptime`,`is_default`,`is_own`,`shoppingname`,`shoppingtime`,`company`,`license`,`brand`,`about`,`peisong`) VALUES ('25','','23','test','0','','1','2','52','500','0','0','0','test','','','test','','','0','1','0','','','','','','','');
CREATE TABLE IF NOT EXISTS `gz_user_bank` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL DEFAULT '0',
  `pass` varchar(64) DEFAULT NULL,
  `bankname` varchar(64) DEFAULT NULL,
  `bankaddress` varchar(128) DEFAULT NULL,
  `uname` varchar(64) DEFAULT NULL,
  `banksn` varchar(64) DEFAULT NULL,
  `uptime` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
INSERT INTO `gz_user_bank`(`id`,`uid`,`pass`,`bankname`,`bankaddress`,`uname`,`banksn`,`uptime`) VALUES ('3','23','','test','test','test','test','1430099456');
CREATE TABLE IF NOT EXISTS `gz_user_bonus_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `config` text,
  `linetime` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
INSERT INTO `gz_user_bonus_config`(`id`,`config`,`linetime`) VALUES ('1','a:5:{s:11:"bonus_cycle";s:7:"coustom";s:16:"bonus_date_start";s:10:"2015-04-28";s:14:"bonus_date_end";s:10:"2015-04-29";s:13:"bonus_percent";s:1:"5";s:10:"level_info";a:1:{i:12;s:2:"-1";}}','1431069141');
CREATE TABLE IF NOT EXISTS `gz_user_bonus_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bonus_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bonus` decimal(11,2) NOT NULL,
  `linetime` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
INSERT INTO `gz_user_bonus_list`(`id`,`bonus_id`,`user_id`,`bonus`,`linetime`) VALUES ('7','13','23','1.80','1430384412');
INSERT INTO `gz_user_bonus_list`(`id`,`bonus_id`,`user_id`,`bonus`,`linetime`) VALUES ('6','12','23','1.80','1430383175');
CREATE TABLE IF NOT EXISTS `gz_user_bonus_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sum` decimal(11,2) NOT NULL COMMENT '用于分红的营业额',
  `percent` decimal(11,2) NOT NULL COMMENT '分红金额',
  `count` int(11) NOT NULL COMMENT '分红人数',
  `bonus_info` text NOT NULL,
  `linetime` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
INSERT INTO `gz_user_bonus_record`(`id`,`sum`,`percent`,`count`,`bonus_info`,`linetime`) VALUES ('13','36.00','1.80','1','a:1:{i:0;a:1:{s:8:"order_id";s:2:"53";}}','1430384412');
INSERT INTO `gz_user_bonus_record`(`id`,`sum`,`percent`,`count`,`bonus_info`,`linetime`) VALUES ('12','36.00','1.80','1','a:1:{i:0;a:1:{s:8:"order_id";s:2:"53";}}','1430383175');
CREATE TABLE IF NOT EXISTS `gz_user_drawmoney` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `uid` int(8) NOT NULL,
  `money` float(7,2) NOT NULL DEFAULT '0.00',
  `addtime` int(10) NOT NULL DEFAULT '0',
  `paytime` int(10) DEFAULT '0',
  `state` tinyint(1) DEFAULT '0',
  `date` varchar(32) DEFAULT NULL,
  `uname` varchar(64) DEFAULT NULL,
  `mobile` varchar(64) DEFAULT NULL,
  `bankname` varchar(64) DEFAULT NULL,
  `banksn` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_user_level` (
  `lid` tinyint(3) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(64) NOT NULL DEFAULT '',
  `discount` tinyint(3) NOT NULL DEFAULT '100',
  `jifendesc` varchar(255) NOT NULL DEFAULT '',
  `is_show` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
INSERT INTO `gz_user_level`(`lid`,`level_name`,`discount`,`jifendesc`,`is_show`) VALUES ('12','普通分销商','100','','1');
INSERT INTO `gz_user_level`(`lid`,`level_name`,`discount`,`jifendesc`,`is_show`) VALUES ('11','高级分销商','100','','1');
INSERT INTO `gz_user_level`(`lid`,`level_name`,`discount`,`jifendesc`,`is_show`) VALUES ('10','特权分销','100','','1');
INSERT INTO `gz_user_level`(`lid`,`level_name`,`discount`,`jifendesc`,`is_show`) VALUES ('1','普通会员','100','','1');
CREATE TABLE IF NOT EXISTS `gz_user_message` (
  `mes_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL DEFAULT '',
  `content` text,
  `rp_content` varchar(255) NOT NULL DEFAULT '',
  `uid` int(6) NOT NULL DEFAULT '0',
  `adminid` tinyint(3) NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `re_time` int(11) NOT NULL DEFAULT '0',
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '1:未处理留言  2:已处理留言',
  `parent_id` smallint(6) DEFAULT '0',
  PRIMARY KEY (`mes_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_user_money_change` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `time` int(11) DEFAULT NULL,
  `changedesc` varchar(128) DEFAULT NULL,
  `money` float(6,2) NOT NULL DEFAULT '0.00',
  `uid` int(7) NOT NULL DEFAULT '0',
  `buyuid` mediumint(8) DEFAULT '0',
  `order_sn` varchar(32) DEFAULT NULL,
  `thismonth` varchar(32) DEFAULT NULL,
  `thism` varchar(12) DEFAULT NULL,
  `type` varchar(32) NOT NULL DEFAULT 'system',
  `order_id` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('66','1434592155','管理改变资金','100.00','23','0','','2015-06-18','2015-06','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('65','1431759526','购买商品返佣金','8.00','23','27','20151431759467','2015-05-16','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('64','1431679261','红包发放:元旦赠送','1200.00','23','23','1000002176','2015-05-15','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('63','1431679203','红包发放:元旦赠送','1200.00','23','23','1000002176','2015-05-15','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('62','1431679098','红包发放:元旦赠送','1200.00','23','23','1000002176','2015-05-15','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('61','1431678871','红包发放:元旦赠送','1200.00','23','23','1000002176','2015-05-15','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('60','1431678777','红包发放:元旦赠送','1200.00','23','23','1000002176','2015-05-15','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('59','1431678777','红包发放:元旦赠送','1200.00','23','23','1000002176','2015-05-15','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('58','1431678695','红包发放:元旦赠送','1200.00','23','23','1000002176','2015-05-15','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('57','1431678695','红包发放:元旦赠送','1200.00','23','23','1000002176','2015-05-15','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('56','1431678664','红包发放:元旦赠送','1200.00','23','23','1000002176','2015-05-15','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('55','1431678664','红包发放:元旦赠送','1200.00','23','23','1000002176','2015-05-15','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('54','1431678417','红包发放:元旦赠送','1200.00','23','23','1000002176','2015-05-15','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('50','1431678186','红包发放:元旦赠送','1200.00','23','23','1000002176','2015-05-15','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('49','1431482236','购买商品返佣金','2.00','23','36','20151431482206','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('48','1431482236','购买商品返佣金','6.00','27','36','20151431482206','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('47','1431482236','购买商品返佣金','8.00','28','36','20151431482206','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('46','1431482024','购买商品返佣金','2.00','23','36','20151431481966','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('45','1431482024','购买商品返佣金','6.00','27','36','20151431481966','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('44','1431482024','购买商品返佣金','8.00','28','36','20151431481966','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('43','1431481797','购买商品返佣金','2.00','23','36','20151431481753','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('42','1431481797','购买商品返佣金','6.00','27','36','20151431481753','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('41','1431481797','购买商品返佣金','8.00','28','36','20151431481753','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('40','1431481632','购买商品返佣金','4.00','23','36','20151431481596','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('39','1431481632','购买商品返佣金','12.00','27','36','20151431481596','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('37','1431481403','购买商品返佣金','6.00','23','28','20151431481364','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('36','1431481403','购买商品返佣金','8.00','27','28','20151431481364','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('35','1431481279','购买商品返佣金','12.00','23','28','20151431481190','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('34','1431481279','购买商品返佣金','16.00','27','28','20151431481190','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('32','1431063097','购买商品返佣金','6.00','23','28','20151431050725','2015-05-08','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('31','1431063097','购买商品返佣金','12.00','27','28','20151431050725','2015-05-08','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('30','1431063011','购买商品返佣金','6.00','23','28','20151431050725','2015-05-08','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('29','1431063011','购买商品返佣金','12.00','27','28','20151431050725','2015-05-08','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('28','1431062974','购买商品返佣金','6.00','23','28','20151431050725','2015-05-08','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('27','1431062974','购买商品返佣金','12.00','27','28','20151431050725','2015-05-08','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('26','1431061848','购买商品返佣金','6.00','23','28','20151431050725','2015-05-08','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('25','1431061848','购买商品返佣金','12.00','27','28','20151431050725','2015-05-08','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('24','1431055888','购买商品返佣金','6.00','23','28','20151431050725','2015-05-08','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('23','1431055888','购买商品返佣金','12.00','27','28','20151431050725','2015-05-08','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('22','1431055263','购买商品返佣金','6.00','23','28','20151431050725','2015-05-08','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('21','1431055263','购买商品返佣金','12.00','27','28','20151431050725','2015-05-08','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('20','1431055256','购买商品返佣金','6.00','23','28','20151431050725','2015-05-08','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('19','1431055256','购买商品返佣金','12.00','27','28','20151431050725','2015-05-08','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('18','1431054733','购买商品返佣金','6.00','23','28','20151431050725','2015-05-08','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('17','1431054733','购买商品返佣金','12.00','27','28','20151431050725','2015-05-08','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('16','1431054491','购买商品返佣金','12.00','27','28','20151431050725','2015-05-08','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('15','1431054476','购买商品返佣金','12.00','27','28','20151431050725','2015-05-08','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('14','1431054261','购买商品返佣金','45.00','27','28','20151431050725','2015-05-08','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('13','1431053309','购买商品返佣金','45.00','27','28','20151431050725','2015-05-08','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('12','1431049785','购买商品返佣金','12.00','23','27','20151431049745','2015-05-08','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('11','1431049638','管理改变资金','-1.80','23','0','','2015-05-08','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('10','1431049618','管理改变资金','-305.40','23','0','','2015-05-08','2015-05','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('9','1430384412','分红增加金额','1.80','23','0','','','','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('8','1430383175','分红增加金额','1.80','23','0','','','','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('7','1430293382','分红增加金额','1.80','23','0','','','','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('6','1430288066','管理改变资金','200.00','23','0','','2015-04-29','2015-04','system','0');
INSERT INTO `gz_user_money_change`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('5','1430288013','管理改变资金','100.00','23','0','','2015-04-29','2015-04','system','0');
CREATE TABLE IF NOT EXISTS `gz_user_money_change_cache` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `time` int(11) DEFAULT NULL,
  `changedesc` varchar(128) DEFAULT NULL,
  `money` float(6,2) NOT NULL DEFAULT '0.00',
  `uid` int(7) NOT NULL DEFAULT '0',
  `buyuid` mediumint(8) DEFAULT '0',
  `order_sn` varchar(32) DEFAULT NULL,
  `thismonth` varchar(32) DEFAULT NULL,
  `thism` varchar(12) DEFAULT NULL,
  `type` varchar(32) NOT NULL DEFAULT 'system',
  `order_id` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
INSERT INTO `gz_user_money_change_cache`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('28','1431759467','购买商品返佣金','8.00','23','27','20151431759467','2015-05-16','2015-05','system','0');
INSERT INTO `gz_user_money_change_cache`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('27','1431482206','购买商品返佣金','2.00','23','36','20151431482206','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change_cache`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('26','1431482206','购买商品返佣金','6.00','27','36','20151431482206','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change_cache`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('25','1431482206','购买商品返佣金','8.00','28','36','20151431482206','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change_cache`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('24','1431481966','购买商品返佣金','2.00','23','36','20151431481966','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change_cache`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('23','1431481966','购买商品返佣金','6.00','27','36','20151431481966','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change_cache`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('22','1431481966','购买商品返佣金','8.00','28','36','20151431481966','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change_cache`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('21','1431481753','购买商品返佣金','2.00','23','36','20151431481753','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change_cache`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('20','1431481753','购买商品返佣金','6.00','27','36','20151431481753','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change_cache`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('19','1431481753','购买商品返佣金','8.00','28','36','20151431481753','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change_cache`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('18','1431481596','购买商品返佣金','4.00','23','36','20151431481596','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change_cache`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('17','1431481596','购买商品返佣金','12.00','27','36','20151431481596','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change_cache`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('16','1431481596','购买商品返佣金','16.00','28','36','20151431481596','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change_cache`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('15','1431481364','购买商品返佣金','6.00','23','28','20151431481364','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change_cache`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('14','1431481364','购买商品返佣金','8.00','27','28','20151431481364','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change_cache`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('13','1431481190','购买商品返佣金','12.00','23','28','20151431481190','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change_cache`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('12','1431481190','购买商品返佣金','16.00','27','28','20151431481190','2015-05-13','2015-05','system','0');
INSERT INTO `gz_user_money_change_cache`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('11','1431050725','购买商品返佣金','6.00','23','28','20151431050725','2015-05-08','2015-05','system','0');
INSERT INTO `gz_user_money_change_cache`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('10','1431050725','购买商品返佣金','12.00','27','28','20151431050725','2015-05-08','2015-05','system','0');
INSERT INTO `gz_user_money_change_cache`(`cid`,`time`,`changedesc`,`money`,`uid`,`buyuid`,`order_sn`,`thismonth`,`thism`,`type`,`order_id`) VALUES ('9','1431049745','购买商品返佣金','12.00','23','27','20151431049745','2015-05-08','2015-05','system','0');
CREATE TABLE IF NOT EXISTS `gz_user_money_record` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(9) NOT NULL,
  `p_uid1` mediumint(9) DEFAULT '0',
  `p_uid2` mediumint(9) DEFAULT '0',
  `p_uid3` mediumint(9) DEFAULT '0',
  `puid1_money` float(7,2) DEFAULT '0.00',
  `puid2_money` float(7,2) DEFAULT '0.00',
  `puid3_money` float(7,2) DEFAULT '0.00',
  `oid` mediumint(8) DEFAULT '0',
  `date_y` varchar(32) DEFAULT NULL,
  `date_m` varchar(32) DEFAULT NULL,
  `date_d` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
INSERT INTO `gz_user_money_record`(`id`,`uid`,`p_uid1`,`p_uid2`,`p_uid3`,`puid1_money`,`puid2_money`,`puid3_money`,`oid`,`date_y`,`date_m`,`date_d`) VALUES ('4','27','23','0','0','12.00','0.00','0.00','58','2015','2015-05','2015-05-08');
CREATE TABLE IF NOT EXISTS `gz_user_point_change` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `time` int(11) DEFAULT NULL,
  `changedesc` varchar(128) DEFAULT NULL,
  `points` int(7) NOT NULL DEFAULT '0',
  `thismonth` varchar(32) DEFAULT NULL,
  `uid` int(7) NOT NULL DEFAULT '0',
  `subuid` mediumint(8) DEFAULT '0' COMMENT '关注用户ID',
  `order_sn` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('97','1438387877','消费返积分','0','2015-08-01','45','0','20151438387861');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('96','1438234419','消费返积分','0','2015-07-30','45','0','20151438234396');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('95','1438228248','消费返积分','0','2015-07-30','42','0','20151438228225');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('94','1436946013','消费返积分','0','2015-07-15','44','0','20151436945924');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('93','1436944645','消费返积分','0','2015-07-15','42','0','20151436944634');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('92','1436944272','消费返积分','0','2015-07-15','43','0','20151436944259');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('91','1436944035','消费返积分','0','2015-07-15','42','0','20151436944024');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('90','1436943855','消费返积分','0','2015-07-15','42','0','20151436943822');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('89','1431759526','推荐消费返积分','36','2015-05-16','23','0','20151431759467');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('88','1431759491','消费返积分','18','2015-05-16','27','0','20151431759467');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('86','1431482236','推荐消费返积分','36','2015-05-13','28','0','20151431482206');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('84','1431482024','推荐消费返积分','0','2015-05-13','28','0','20151431481966');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('81','1431481632','推荐消费返积分','90','2015-05-13','28','0','20151431481596');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('79','1431481403','推荐消费返积分','36','2015-05-13','27','0','20151431481364');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('78','1431481394','消费返积分','18','2015-05-13','28','0','20151431481364');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('77','1431481279','推荐消费返积分','72','2015-05-13','27','0','20151431481190');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('76','1431481237','消费返积分','36','2015-05-13','28','0','20151431481190');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('73','1431063097','推荐消费返积分','45','2015-05-08','27','0','20151431050725');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('72','1431063011','推荐消费返积分','45','2015-05-08','27','0','20151431050725');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('71','1431062974','推荐消费返积分','45','2015-05-08','27','0','20151431050725');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('70','1431062911','推荐消费返积分','45','2015-05-08','27','0','20151431050725');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('69','1431062855','推荐消费返积分','45','2015-05-08','27','0','20151431050725');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('68','1431062843','推荐消费返积分','45','2015-05-08','27','0','20151431050725');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('67','1431062817','推荐消费返积分','45','2015-05-08','27','0','20151431050725');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('66','1431062724','推荐消费返积分','45','2015-05-08','27','0','20151431050725');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('65','1431062572','推荐消费返积分','0','2015-05-08','27','0','20151431050725');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('64','1431062335','推荐消费返积分','0','2015-05-08','27','0','20151431050725');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('63','1431062093','推荐消费返积分','0','2015-05-08','27','0','20151431050725');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('62','1431062033','推荐消费返积分','0','2015-05-08','27','0','20151431050725');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('61','1431061848','推荐消费返积分','45','2015-05-08','27','0','20151431050725');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('60','1431055888','推荐消费返积分','45','2015-05-08','27','0','20151431050725');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('59','1431055263','推荐消费返积分','45','2015-05-08','27','0','20151431050725');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('58','1431055256','推荐消费返积分','45','2015-05-08','27','0','20151431050725');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('57','1431054733','推荐消费返积分','45','2015-05-08','27','0','20151431050725');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('56','1431054491','推荐消费返积分','45','2015-05-08','27','0','20151431050725');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('55','1431054476','推荐消费返积分','45','2015-05-08','27','0','20151431050725');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('54','1431054346','推荐消费返积分','45','2015-05-08','27','0','20151431050725');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('53','1431054261','推荐消费返积分','45','2015-05-08','27','0','20151431050725');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('52','1431053309','推荐消费返积分','45','2015-05-08','27','0','20151431050725');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('51','1431051682','推荐消费返积分','0','2015-05-08','27','0','20151431050725');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('50','1431051154','推荐消费返积分','0','2015-05-08','27','0','20151431050725');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('49','1431050926','消费返积分','22','2015-05-08','28','0','20151431050725');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('48','1431049785','消费返积分','22','2015-05-08','27','0','20151431049745');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('47','1430814402','消费返积分','18','2015-05-05','23','0','20151430814388');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('46','1430814268','消费返积分','0','2015-05-05','23','0','20151430814245');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('45','1430812466','消费返积分','18','2015-05-05','23','0','20151430812422');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('44','1430811374','消费返积分','36','2015-05-05','23','0','20151430811349');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('43','1430811277','管理改变积分','-36','2015-05-05','23','0','');
INSERT INTO `gz_user_point_change`(`cid`,`time`,`changedesc`,`points`,`thismonth`,`uid`,`subuid`,`order_sn`) VALUES ('42','1430202561','消费返积分','36','2015-04-28','23','0','20151430118662');
CREATE TABLE IF NOT EXISTS `gz_user_salesmen_brand` (
  `usbid` smallint(3) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL DEFAULT '0',
  `brand_id` smallint(4) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
  `is_check` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`usbid`),
  KEY `uid` (`uid`),
  KEY `brand_id` (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_user_share` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL,
  `time` int(10) NOT NULL DEFAULT '0',
  `url` varchar(128) DEFAULT NULL,
  `type` varchar(32) DEFAULT NULL,
  `imgurl` varchar(128) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date` varchar(32) DEFAULT NULL,
  `counts` smallint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `gz_user_tuijian` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `daili_uid` mediumint(8) DEFAULT '0',
  `parent_uid` mediumint(8) DEFAULT '0' COMMENT '关注的用户来源',
  `share_uid` mediumint(8) DEFAULT '0' COMMENT '分享的用户来源',
  `uid` mediumint(8) NOT NULL,
  `addtime` int(10) NOT NULL,
  `url` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_uid` (`parent_uid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('74','0','0','0','81','1438537819','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('73','0','0','0','80','1438534949','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('72','0','0','0','79','1438513349','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('71','0','0','0','78','1438474400','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('70','0','0','0','77','1438467482','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('69','0','0','0','76','1438436343','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('68','0','0','0','75','1438426543','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('67','0','0','0','74','1438422312','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('66','0','0','0','73','1438417836','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('65','0','0','0','72','1438415437','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('64','0','0','0','71','1438395680','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('63','0','0','0','70','1438341395','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('62','0','0','0','68','1438341008','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('61','0','0','0','69','1438341008','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('60','0','0','0','67','1438341008','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('59','0','0','0','65','1438334063','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('58','0','0','0','64','1438329757','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('57','0','0','0','60','1438322807','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('56','0','0','0','59','1438314477','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('55','0','0','0','57','1438261175','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('54','0','0','0','55','1438250795','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('53','0','0','0','54','1438245186','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('52','0','0','0','53','1438244182','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('51','0','0','0','52','1438240279','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('50','0','0','0','51','1438240279','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('49','0','0','0','50','1438234508','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('48','0','0','0','49','1438210263','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('47','48','0','0','48','1438197429','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('46','0','0','0','47','1438197124','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('45','0','0','0','46','1438195215','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('44','0','0','0','45','1436946173','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('43','0','0','0','44','1436945882','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('42','0','0','0','43','1436944215','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('41','0','0','0','42','1436765332','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('28','0','27','27','28','1431050074','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('27','0','23','23','27','1431049215','');
INSERT INTO `gz_user_tuijian`(`id`,`daili_uid`,`parent_uid`,`share_uid`,`uid`,`addtime`,`url`) VALUES ('23','0','0','0','23','1429927016','');
CREATE TABLE IF NOT EXISTS `gz_user_tuijian_fx` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `p3_uid` mediumint(8) DEFAULT '0',
  `p2_uid` mediumint(8) DEFAULT '0',
  `p1_uid` mediumint(8) DEFAULT '0',
  `uid` mediumint(8) NOT NULL DEFAULT '0',
  `addtime` int(10) NOT NULL,
  `acitve` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `parent_uid` (`p1_uid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
INSERT INTO `gz_user_tuijian_fx`(`id`,`p3_uid`,`p2_uid`,`p1_uid`,`uid`,`addtime`,`acitve`) VALUES ('21','0','0','0','44','0','1');
INSERT INTO `gz_user_tuijian_fx`(`id`,`p3_uid`,`p2_uid`,`p1_uid`,`uid`,`addtime`,`acitve`) VALUES ('20','0','0','0','43','0','1');
INSERT INTO `gz_user_tuijian_fx`(`id`,`p3_uid`,`p2_uid`,`p1_uid`,`uid`,`addtime`,`acitve`) VALUES ('19','0','0','0','42','0','1');
INSERT INTO `gz_user_tuijian_fx`(`id`,`p3_uid`,`p2_uid`,`p1_uid`,`uid`,`addtime`,`acitve`) VALUES ('16','0','23','27','28','0','1');
INSERT INTO `gz_user_tuijian_fx`(`id`,`p3_uid`,`p2_uid`,`p1_uid`,`uid`,`addtime`,`acitve`) VALUES ('15','0','0','23','27','0','1');
CREATE TABLE IF NOT EXISTS `gz_userconfig` (
  `type` varchar(32) NOT NULL DEFAULT 'basic',
  `pointnum` tinyint(3) DEFAULT '0',
  `pointnum_ag` float(3,1) DEFAULT '1.0',
  `tjpointnum` tinyint(3) DEFAULT '0' COMMENT '推荐者送积分',
  `tjpointnum_ag` float(3,1) DEFAULT '1.0',
  `tuijiannum` tinyint(3) DEFAULT '0',
  `address2off` tinyint(3) DEFAULT '100',
  `address3off` tinyint(3) DEFAULT '100',
  `guanzhuoff` tinyint(3) DEFAULT '100',
  `dixin360` smallint(5) DEFAULT '0',
  `ticheng360_1` tinyint(3) DEFAULT '0',
  `ticheng360_2` tinyint(3) DEFAULT '0',
  `ticheng360_3` tinyint(3) DEFAULT '0',
  `ticheng180_h1_1` tinyint(3) DEFAULT '0' COMMENT '高级分销商',
  `ticheng180_h1_2` tinyint(3) DEFAULT '0',
  `ticheng180_h1_3` tinyint(3) DEFAULT '0',
  `ticheng180_h2_1` tinyint(3) DEFAULT '0' COMMENT '高级特权分销',
  `ticheng180_h2_2` tinyint(3) DEFAULT '0',
  `ticheng180_h2_3` tinyint(3) DEFAULT '0',
  `ticheng180_all` tinyint(3) DEFAULT '0' COMMENT '特效分销享线下会员分红',
  `minsalenum` float(8,2) DEFAULT '0.00',
  `ticheng180_1` tinyint(3) DEFAULT '0',
  `ticheng180_2` tinyint(3) DEFAULT '0',
  `ticheng180_3` tinyint(3) DEFAULT '0',
  `openfxbuy` tinyint(1) DEFAULT '1',
  `openfx_minmoney` smallint(3) DEFAULT '0',
  `openfxauto` tinyint(1) DEFAULT '0',
  `viewfxset` tinyint(1) DEFAULT '1',
  `guanzhubuy` tinyint(1) DEFAULT '1',
  `vgoods_type` tinyint(1) DEFAULT '1' COMMENT '有卡号卡密类型',
  `wid` mediumint(8) DEFAULT '0',
  `userbonus` tinyint(1) NOT NULL DEFAULT '0',
  `takeover` int(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `gz_userconfig`(`type`,`pointnum`,`pointnum_ag`,`tjpointnum`,`tjpointnum_ag`,`tuijiannum`,`address2off`,`address3off`,`guanzhuoff`,`dixin360`,`ticheng360_1`,`ticheng360_2`,`ticheng360_3`,`ticheng180_h1_1`,`ticheng180_h1_2`,`ticheng180_h1_3`,`ticheng180_h2_1`,`ticheng180_h2_2`,`ticheng180_h2_3`,`ticheng180_all`,`minsalenum`,`ticheng180_1`,`ticheng180_2`,`ticheng180_3`,`openfxbuy`,`openfx_minmoney`,`openfxauto`,`viewfxset`,`guanzhubuy`,`vgoods_type`,`wid`,`userbonus`,`takeover`) VALUES ('basic','1','0.5','1','1.0','2','100','100','100','2000','50','30','20','30','15','5','30','15','5','1','40000.00','20','15','5','1','0','1','1','1','2','3','1','0');
CREATE TABLE IF NOT EXISTS `gz_wx_article` (
  `article_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `keyword` varchar(128) DEFAULT NULL,
  `cat_id` smallint(5) NOT NULL DEFAULT '0',
  `article_title` varchar(255) DEFAULT NULL,
  `article_img` varchar(128) DEFAULT NULL,
  `art_url` varchar(255) DEFAULT NULL,
  `content` longtext,
  `viewcount` int(6) NOT NULL DEFAULT '10',
  `is_top` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `uptime` int(11) NOT NULL DEFAULT '0',
  `about` varchar(500) DEFAULT NULL,
  `vieworder` tinyint(3) NOT NULL DEFAULT '50',
  `type` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`article_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
INSERT INTO `gz_wx_article`(`article_id`,`keyword`,`cat_id`,`article_title`,`article_img`,`art_url`,`content`,`viewcount`,`is_top`,`is_show`,`addtime`,`uptime`,`about`,`vieworder`,`type`) VALUES ('9','如何支付','1','如何支付','','','如何支付','10','0','1','1422799535','1422945875','','50','img');
INSERT INTO `gz_wx_article`(`article_id`,`keyword`,`cat_id`,`article_title`,`article_img`,`art_url`,`content`,`viewcount`,`is_top`,`is_show`,`addtime`,`uptime`,`about`,`vieworder`,`type`) VALUES ('8','','1','如何购买','','','如何购买','10','0','1','1422799523','1422799523','','50','img');
INSERT INTO `gz_wx_article`(`article_id`,`keyword`,`cat_id`,`article_title`,`article_img`,`art_url`,`content`,`viewcount`,`is_top`,`is_show`,`addtime`,`uptime`,`about`,`vieworder`,`type`) VALUES ('7','','1','如何关注','','','如何关注','10','0','1','1422799516','1422799516','','50','img');
INSERT INTO `gz_wx_article`(`article_id`,`keyword`,`cat_id`,`article_title`,`article_img`,`art_url`,`content`,`viewcount`,`is_top`,`is_show`,`addtime`,`uptime`,`about`,`vieworder`,`type`) VALUES ('6','新手指南','1','新手指南','','','','10','0','1','1422685645','1422685658','','50','img');
INSERT INTO `gz_wx_article`(`article_id`,`keyword`,`cat_id`,`article_title`,`article_img`,`art_url`,`content`,`viewcount`,`is_top`,`is_show`,`addtime`,`uptime`,`about`,`vieworder`,`type`) VALUES ('1','一键关注我们','1','一键关注我们','','','发送','10','0','1','1417187820','1422685571','噩噩噩噩','50','img');
CREATE TABLE IF NOT EXISTS `gz_wx_cate` (
  `cat_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(128) NOT NULL DEFAULT '',
  `cat_img` varchar(128) DEFAULT NULL,
  `cat_about` varchar(255) DEFAULT NULL,
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `vieworder` tinyint(3) NOT NULL DEFAULT '50',
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cat_id`),
  KEY `parent_id` (`parent_id`),
  KEY `cat_name` (`cat_name`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
INSERT INTO `gz_wx_cate`(`cat_id`,`cat_name`,`cat_img`,`cat_about`,`parent_id`,`is_show`,`vieworder`,`addtime`) VALUES ('1','关于我们','','关于我们关于我们','0','1','50','1417186373');
CREATE TABLE IF NOT EXISTS `gz_wxdiymen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) DEFAULT NULL,
  `parent_id` smallint(4) DEFAULT '0',
  `title` varchar(30) DEFAULT NULL,
  `keyword` varchar(30) DEFAULT NULL,
  `url` varchar(300) DEFAULT NULL,
  `is_show` tinyint(1) DEFAULT '1',
  `sort` tinyint(3) DEFAULT '50',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
INSERT INTO `gz_wxdiymen`(`id`,`token`,`parent_id`,`title`,`keyword`,`url`,`is_show`,`sort`) VALUES ('12','','0','艾奥尼克','艾奥尼克','http://shop.paipai.com/330440523','1','0');
INSERT INTO `gz_wxdiymen`(`id`,`token`,`parent_id`,`title`,`keyword`,`url`,`is_show`,`sort`) VALUES ('11','','8','获取二维码','qr','','1','1');
INSERT INTO `gz_wxdiymen`(`id`,`token`,`parent_id`,`title`,`keyword`,`url`,`is_show`,`sort`) VALUES ('10','','0','附近的店','附近的店','http://wx.020369.com/m/user.php?act=shoplist','1','3');
INSERT INTO `gz_wxdiymen`(`id`,`token`,`parent_id`,`title`,`keyword`,`url`,`is_show`,`sort`) VALUES ('8','','0','个人中心','个人中心','http://wx.020369.com/m/user.php','1','2');
INSERT INTO `gz_wxdiymen`(`id`,`token`,`parent_id`,`title`,`keyword`,`url`,`is_show`,`sort`) VALUES ('7','','0','官方商城','官方商城','http://wx.020369.com/m/','1','1');
CREATE TABLE IF NOT EXISTS `gz_wxkeyword` (
  `id` mediumint(7) NOT NULL AUTO_INCREMENT,
  `type` varchar(16) DEFAULT NULL,
  `keyword` varchar(32) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `cid` smallint(5) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
INSERT INTO `gz_wxkeyword`(`id`,`type`,`keyword`,`url`,`cid`) VALUES ('1','guanzhu','','','0');
CREATE TABLE IF NOT EXISTS `gz_wxuserset` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `is_oauth` tinyint(1) NOT NULL DEFAULT '1',
  `token` varchar(64) DEFAULT NULL,
  `pigsecret` varchar(64) DEFAULT NULL,
  `wxname` varchar(64) DEFAULT NULL,
  `appid` varchar(64) DEFAULT NULL,
  `appsecret` varchar(64) DEFAULT NULL,
  `winxintype` tinyint(1) DEFAULT NULL,
  `headerpic` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
INSERT INTO `gz_wxuserset`(`id`,`is_oauth`,`token`,`pigsecret`,`wxname`,`appid`,`appsecret`,`winxintype`,`headerpic`) VALUES ('1','1','blojmj1415902333','xJ4EPvdb7Pk8bm85y8JN','鸿美琪','wx70c16d3a1d7f45ec','7e5f68b1e2c16ebf31e8125cb17942ac','3','');
