CREATE TABLE IF NOT EXISTS `__PREFIX__mydemo_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `pid` int(10) DEFAULT NULL COMMENT '父id',
  `title` varchar(100) DEFAULT NULL COMMENT '标题',
  `name` varchar(100) DEFAULT NULL COMMENT '名称',
  `createtime` int(10) DEFAULT NULL COMMENT '创建时间',
  `updatetime` int(10) DEFAULT NULL COMMENT '更新时间',
  `publishtime` int(10) DEFAULT NULL COMMENT '发布时间',
  `deletetime` int(10) DEFAULT NULL COMMENT '删除时间',
  `memo` varchar(100) DEFAULT '' COMMENT '备注',
  `status` enum('normal','hidden','rejected','pulloff') NOT NULL DEFAULT 'normal' COMMENT '状态',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='示例表';