CREATE TABLE IF NOT EXISTS `__PREFIX__weapp_about` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL COMMENT '图片',
  `description` tinytext NOT NULL COMMENT '简介',
  `content` text NOT NULL COMMENT '详情',
  `contact_content` text NOT NULL COMMENT '联系我们',
  `createby` int(11) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8  COMMENT='关于公司';

BEGIN;
INSERT INTO `__PREFIX__weapp_about` VALUES ('1', '/uploads/20190305/f1f8a0f6f0523c5f990a965143163abf.jpg', '​   对于普通用户，小程序实现了应用的触手可及，只需要通过扫描二维码、搜索或者是朋友的分享就可以直接打开，加上优秀的体验，小程序使得服务提供者的触达能力变得更强。', '<p style=\"margin-bottom: 0.85em; font-size: 14px; orphans: 3; widows: 3; line-height: 2; color: rgb(51, 51, 51); font-family: -apple-system-font, BlinkMacSystemFont, \"Helvetica Neue\", \"PingFang SC\", \"Hiragino Sans GB\", \"Microsoft YaHei UI\", \"Microsoft YaHei\", Arial, sans-serif;\">​ 对于普通用户，小程序实现了应用的触手可及，只需要通过扫描二维码、搜索或者是朋友的分享就可以直接打开，加上优秀的体验，小程序使得服务提供者的触达能力变得更强。</p><p style=\"margin-bottom: 0.85em; font-size: 14px; orphans: 3; widows: 3; line-height: 2; color: rgb(51, 51, 51); font-family: -apple-system-font, BlinkMacSystemFont, \"Helvetica Neue\", \"PingFang SC\", \"Hiragino Sans GB\", \"Microsoft YaHei UI\", \"Microsoft YaHei\", Arial, sans-serif;\">​ 对于开发者而言，小程序框架本身所具有的快速加载和快速渲染能力，加之配套的云能力、运维能力和数据汇总能力，使得开发者不需要去处理琐碎的工作，可以把精力放置在具体的业务逻辑的开发上。</p><p style=\"font-size: 14px; orphans: 3; widows: 3; line-height: 2; color: rgb(51, 51, 51); font-family: -apple-system-font, BlinkMacSystemFont, \"Helvetica Neue\", \"PingFang SC\", \"Hiragino Sans GB\", \"Microsoft YaHei UI\", \"Microsoft YaHei\", Arial, sans-serif; margin-bottom: 0px !important;\">​ 小程序的模式使得微信可以开放更多的数据，开发者可以获取到用户的一些基本信息，甚至能够获取微信群的一些信息，使得小程序的开放能力变得更加强大。</p>', '<p><span style=\"color: rgb(51, 51, 51); font-size: 14px; orphans: 3; widows: 3;\">​ 小程序的模式使得微信可以开放更多的数据，开发者可以获取到用户的一些基本信息，甚至能够获取微信群的一些信息，使得小程序的开放能力变得更加强大。</span><br></p><p><b>QQ:731633799</b></p>', null, '1542683916', '1551755269');
COMMIT;



CREATE TABLE IF NOT EXISTS `__PREFIX__weapp_brand` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '标题',
  `image` varchar(255) NOT NULL COMMENT '图片',
  `content` text NOT NULL COMMENT '描述',
  `createby` int(11) NOT NULL,
  `createtime` int(11) DEFAULT NULL COMMENT '创建时间',
  `updatetime` int(11) DEFAULT NULL COMMENT '更新时间',
  `status` varchar(32) DEFAULT 'normal' COMMENT '状态',
  `push` enum('1','0') DEFAULT '1' COMMENT '推荐:1=是,0=否',
  `weigh` tinyint(4) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='品牌管理';

BEGIN;
INSERT INTO `__PREFIX__weapp_brand` VALUES ('1', '华为', '/uploads/20190228/e76e618f65323518c1591cabdfb5f024.jpg', '<p>华为</p>', '0', '1551751621', '1551751621', 'normal', '1', '1'),('2', '小米', '/uploads/20190228/10aba498af5b9d5e2556c6d6e525e340.jpg', '<p>小米</p>', '0', '1551751638', '1551751638', 'normal', '1', '2'),('3', 'APPLE', '/uploads/20190228/ad6a594bfbb381ee8565588dee9c80b1.jpg', '<p>APPLE</p>', '0', '1551751677', '1551751677', 'normal', '1', '3');
COMMIT;

CREATE TABLE IF NOT EXISTS `__PREFIX__weapp_cases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '标题',
  `casescat_id` int(11) NOT NULL COMMENT '案例分类',
  `image` varchar(255) NOT NULL COMMENT '图片',
  `content` text NOT NULL COMMENT '描述',
  `createby` int(11) NOT NULL,
  `createtime` int(11) DEFAULT NULL COMMENT '创建时间',
  `updatetime` int(11) DEFAULT NULL COMMENT '更新时间',
  `status` varchar(32) DEFAULT 'normal' COMMENT '状态',
  `push` enum('1','0') DEFAULT '0' COMMENT '推荐:1=是,0=否',
  `weigh` tinyint(4) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='案例列表';

BEGIN;
INSERT INTO `__PREFIX__weapp_cases` VALUES ('1', '云服务', '1', '/uploads/20190305/f8af43141f8767541bf5fcc6f07241de.png', '<p>logologologo<br></p>', '0', '1551753595', '1551753698', 'normal', '1', '1'),('2', '系统开发', '2', '/uploads/20190305/a5efdbc0c34ae301e89851809214cffd.png', '<p> QQ731633799</p>', '0', '1551753674', '1551753692', 'normal', '1', '2');
COMMIT;



CREATE TABLE IF NOT EXISTS `__PREFIX__weapp_casescat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '分类名称',
  `weigh` tinyint(4) DEFAULT NULL COMMENT '排序',
  `createtime` int(11) DEFAULT NULL COMMENT '创建时间',
  `updatetime` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='案例分类';

BEGIN;
INSERT INTO `__PREFIX__weapp_casescat` VALUES ('1', '经典案例', '1', '1542868313', '1551753507'),('2', '合作案例', '2', '1551753516', '1551753516');
COMMIT;


CREATE TABLE IF NOT EXISTS `__PREFIX__weapp_productcat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '分类名称',
  `weigh` tinyint(4) DEFAULT NULL COMMENT '排序',
  `createtime` int(11) DEFAULT NULL COMMENT '创建时间',
  `updatetime` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='产品分类';

BEGIN;
INSERT INTO `__PREFIX__weapp_productcat` VALUES  ('1', '苹果', '0', '1542856932', '1551752391'),('2', '华为', '2', '1551752400', '1551752400');
COMMIT;


CREATE TABLE IF NOT EXISTS `__PREFIX__weapp_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '标题',
  `productcat_id` int(11) DEFAULT NULL COMMENT '分类id',
  `image` varchar(255) NOT NULL COMMENT '图片',
  `content` text NOT NULL COMMENT '描述',
  `createby` int(11) NOT NULL,
  `createtime` int(11) DEFAULT NULL COMMENT '创建时间',
  `updatetime` int(11) DEFAULT NULL COMMENT '更新时间',
  `status` varchar(32) DEFAULT 'normal' COMMENT '状态',
  `push` enum('1','0') DEFAULT '0' COMMENT '推荐:1=是,0=否',
  `weigh` tinyint(4) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='产品列表';

BEGIN;
INSERT INTO `__PREFIX__weapp_product` VALUES ('1', 'IphoneX', '1', '/uploads/20190305/4de769e29f6ef43a36aef9576b093bbe.png', '<p><img alt=\"\" class=\"\" src=\"https://img30.360buyimg.com/popWaterMark/jfs/t12301/6/2562926546/46719/3c8f1258/5a4474ddN01bc6510.jpg\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: tahoma, arial, &quot;Microsoft YaHei&quot;, &quot;Hiragino Sans GB&quot;, u5b8bu4f53, sans-serif; font-size: 12px; width: 50%;\"><br style=\"color: rgb(102, 102, 102); font-family: tahoma, arial, &quot;Microsoft YaHei&quot;, &quot;Hiragino Sans GB&quot;, u5b8bu4f53, sans-serif; font-size: 12px;\"><img alt=\"\" class=\"\" src=\"https://img30.360buyimg.com/popWaterMark/jfs/t12487/37/2560860753/364743/e9e67381/5a447504N014b2ecf.jpg\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: tahoma, arial, &quot;Microsoft YaHei&quot;, &quot;Hiragino Sans GB&quot;, u5b8bu4f53, sans-serif; font-size: 12px;\"><br style=\"color: rgb(102, 102, 102); font-family: tahoma, arial, &quot;Microsoft YaHei&quot;, &quot;Hiragino Sans GB&quot;, u5b8bu4f53, sans-serif; font-size: 12px;\"><img alt=\"\" class=\"\" src=\"https://img30.360buyimg.com/popWaterMark/jfs/t13654/154/2576998992/301491/a9b401b5/5a4474eeN148d04f7.jpg\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: tahoma, arial, &quot;Microsoft YaHei&quot;, &quot;Hiragino Sans GB&quot;, u5b8bu4f53, sans-serif; font-size: 12px;\"><br style=\"color: rgb(102, 102, 102); font-family: tahoma, arial, &quot;Microsoft YaHei&quot;, &quot;Hiragino Sans GB&quot;, u5b8bu4f53, sans-serif; font-size: 12px;\"><img alt=\"\" class=\"\" src=\"https://img30.360buyimg.com/popWaterMark/jfs/t15715/353/986066087/249294/5fb5bf2f/5a44750fNa2f07935.jpg\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: tahoma, arial, &quot;Microsoft YaHei&quot;, &quot;Hiragino Sans GB&quot;, u5b8bu4f53, sans-serif; font-size: 12px;\"><br style=\"color: rgb(102, 102, 102); font-family: tahoma, arial, &quot;Microsoft YaHei&quot;, &quot;Hiragino Sans GB&quot;, u5b8bu4f53, sans-serif; font-size: 12px;\"><img alt=\"\" class=\"\" src=\"https://img30.360buyimg.com/popWaterMark/jfs/t13987/256/2492594873/356560/5c510dd3/5a44750fN9c965ab2.jpg\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: tahoma, arial, &quot;Microsoft YaHei&quot;, &quot;Hiragino Sans GB&quot;, u5b8bu4f53, sans-serif; font-size: 12px;\"><br></p>', '0', '1551752834', '1551754927', 'normal', '1', '1'),('2', '华为', '2', '/uploads/20190305/a73442e13a50cfc61ae08336aee79ef3.jpg', '<img src=\"https://img14.360buyimg.com/cms/jfs/t23479/73/1437619337/65695/24ea14ba/5b608331N78220b81.jpg\" style=\"width: 50%;\">', '0', '1551752856', '1551754853', 'normal', '1', '2');
COMMIT;


CREATE TABLE IF NOT EXISTS `__PREFIX__weapp_guest` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '姓名',
  `phone` varchar(11) DEFAULT NULL COMMENT '手机号',
  `content` tinytext NOT NULL COMMENT '咨询内容',
  `status` enum('1','0') DEFAULT '0' COMMENT '状态:0=未读,1=已读',
  `createtime` int(11) DEFAULT NULL COMMENT '提交时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='访客留言';
