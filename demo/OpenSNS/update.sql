INSERT INTO `ocenter_menu` ( `title`, `pid`, `sort`, `url`, `hide`, `tip`, `group`, `is_dev`, `icon`, `module`) VALUES
( '公告列表', 197, 0, 'Announce/announceList', 0, '', '公告管理', 0, '', ''),
( '发布公告', 197, 0, 'Announce/add', 0, '', '公告管理', 0, '', ''),
( '设置公告状态', 197, 0, 'Announce/setStatus', 1, '', '公告管理', 0, '', ''),
( '公告送达情况', 197, 0, 'Announce/arrive', 1, '', '公告管理', 0, '', ''),
( '会话列表', 74, 0, 'Message/messageSessionList', 0, '', '会话管理', 1, '', ''),
( '会话消息模板', 74, 0, 'Message/messageTplList', 0, '', '会话管理', 1, '', ''),
( '刷新会话列表', 74, 0, 'Message/sessionRefresh', 1, '', '', 1, '', ''),
( '刷新消息模板列表', 74, 0, 'Message/tplRefresh', 1, '', '', 1, '', ''),
( '会话设置', 74, 0, 'Message/config', 0, '', '会话管理', 0, '', ''),
( '仪表盘', 1, 0, 'Index/index', 0, '', '系统首页', 0, '', ''),
( '数据统计', 1, 1, 'Index/stats', 0, '', '统计管理', 0, '', '');

ALTER TABLE  `ocenter_message` CHANGE  `type`  `type` VARCHAR( 25 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT  '消息类型';
ALTER TABLE  `ocenter_message` ADD  `tpl` VARCHAR( 100 ) NOT NULL;
ALTER TABLE  `ocenter_message_content` CHANGE  `type`  `type` VARCHAR( 25 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT  '消息类型';
DROP TABLE IF EXISTS `ocenter_message_type`;
CREATE TABLE IF NOT EXISTS `ocenter_message_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '用户id',
  `type` varchar(25) NOT NULL COMMENT '消息类型',
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户消息类型表' AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ocenter_schedule`;
CREATE TABLE IF NOT EXISTS `ocenter_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `method` varchar(100) NOT NULL,
  `args` varchar(500) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `type_value` varchar(200) NOT NULL,
  `start_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `intro` varchar(500) NOT NULL,
  `lever` int(11) NOT NULL COMMENT '优先级',
  `status` tinyint(4) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
INSERT INTO `ocenter_schedule` (`method`, `args`, `type`, `type_value`, `start_time`, `end_time`, `intro`, `lever`, `status`, `create_time`) VALUES
('Admin/Count->dayCount', '', 3, 'Daily=01:00', 1469167215, 2147483647, '执行了数据统计', 0, 0, 1469167281);


insert into `ocenter_menu`(`title`,`pid`,`sort`,`url`,`hide`,`tip`,`group`,`is_dev`,`icon`,`module`) values
('计划任务列表','74','0','admin/schedule/scheduleList','0','','计划任务','0','','');
set @pid=0;
select @pid:= id from `ocenter_menu` where title = '计划任务列表';
insert into `ocenter_menu`(`title`,`pid`,`sort`,`url`,`hide`,`tip`,`group`,`is_dev`,`icon`,`module`) values
('新增/编辑计划任务',@pid,'0','Schedule/editSchedule','1','','计划任务','0','',''),
('运行/停止计划任务',@pid,'0','admin/schedule/run','1','','计划任务','0','',''),
('查看日志',@pid,'0','Schedule/showLog','1','','计划任务','0','',''),
('清空日志',@pid,'0','admin/schedule/clearLog','1','','计划任务','0','',''),
('重启计划任务',@pid,'0','Schedule/reRun','1','','计划任务','0','',''),
('设置计划任务状态',@pid,'0','Schedule/setScheduleStatus','1','','计划任务','0','','');

ALTER TABLE  `ocenter_auth_group` CHANGE  `end_time`  `end_time` INT( 11 ) NOT NULL DEFAULT  '2000000000';

ALTER TABLE  `ocenter_member` ADD  `fans` int(11) NOT NULL DEFAULT '0' COMMENT '粉丝数';

DROP TABLE IF EXISTS `ocenter_session`;
CREATE TABLE IF NOT EXISTS `ocenter_session` (
  `session_id` varchar(225) NOT NULL,
  `session_expire` int(11) NOT NULL,
  `session_data` text NOT NULL,
  UNIQUE KEY `session_id` (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ocenter_count_lost`;
CREATE TABLE IF NOT EXISTS `ocenter_count_lost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_num` int(11) NOT NULL COMMENT '用户总数',
  `new_lost` int(11) NOT NULL COMMENT '新增流失用户数',
  `date` int(11) NOT NULL COMMENT '日期，时间戳形式',
  `lost_num` int(11) NOT NULL COMMENT '流失用户数',
  `rate` decimal(6,4) NOT NULL COMMENT '比率0~1之间，小数点四位的小数',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `date` (`date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户流失率统计' AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ocenter_tile`;
CREATE TABLE IF NOT EXISTS `ocenter_tile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL COMMENT '父页面id',
  `icon` varchar(20) NOT NULL COMMENT '图标',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` int(11) NOT NULL,
  `title` varchar(50) NOT NULL COMMENT '标题',
  `title_vo` varchar(50) NOT NULL COMMENT '父页面标题',
  `url` varchar(255) NOT NULL COMMENT '路径',
  `url_vo` varchar(255) NOT NULL COMMENT '父页面路径',
  `tile_bg` varchar(10) NOT NULL COMMENT '块颜色(背景)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='常用操作' AUTO_INCREMENT=1 ;

INSERT INTO `ocenter_tile` (`aid`, `icon`, `sort`, `status`, `title`, `title_vo`, `url`, `url_vo`, `tile_bg`) VALUES
(3, 'direction', 1, 1, '用户管理', '用户', 'User/index', 'User/index', '#1ba1e2');

INSERT INTO `ocenter_config` (`name`, `type`, `title`, `group`, `extra`, `remark`, `create_time`, `update_time`, `status`, `value`, `sort`) VALUES
('LOST_LONG', 0, '用户流失标准（天）', 0, '', '', 1469414315, 1469414315, 1, '30', 0);

DROP TABLE IF EXISTS `ocenter_count_remain`;
CREATE TABLE IF NOT EXISTS `ocenter_count_remain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(11) NOT NULL COMMENT '日期',
  `day1_num` int(11) NOT NULL COMMENT '第一天登录人数',
  `day2_num` int(11) NOT NULL COMMENT '第二天登录人数',
  `day3_num` int(11) NOT NULL,
  `day4_num` int(11) NOT NULL,
  `day5_num` int(11) NOT NULL,
  `day6_num` int(11) NOT NULL,
  `day7_num` int(11) NOT NULL,
  `day8_num` int(11) NOT NULL,
  `reg_num` int(11) NOT NULL COMMENT '当天注册人数',
  PRIMARY KEY (`id`),
  UNIQUE KEY `date` (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='留存率统计表' AUTO_INCREMENT=1 ;

INSERT INTO `ocenter_menu` (`title`, `pid`, `sort`, `url`, `hide`, `tip`, `group`, `is_dev`, `icon`, `module`) VALUES
( '网站统计', 197, 0, 'Count/index', 0, '', '数据统计', 0, '', ''),
( '流失率统计', 197, 0, 'Count/lost', 0, '', '数据统计', 0, '', ''),
( '留存率统计', 197, 0, 'Count/remain', 0, '', '数据统计', 0, '', ''),
( '充值用户统计', 197, 0, 'Count/consumption', 0, '', '数据统计', 0, '', ''),
( '活跃用户统计', 197, 0, 'Count/active', 0, '', '数据统计', 0, '', ''),
( '设置活跃度绑定的行为', 197, 0, 'Count/setActiveAction', 1, '', '会话管理', 0, '', '');

DROP TABLE IF EXISTS `ocenter_count_active`;
CREATE TABLE IF NOT EXISTS `ocenter_count_active` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL COMMENT '类型:''day'',''week'',''month''',
  `date` int(11) NOT NULL,
  `num` int(11) NOT NULL COMMENT '活跃人数',
  `total` int(11) NOT NULL COMMENT '总人数',
  PRIMARY KEY (`id`),
  UNIQUE KEY `date` (`date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='活跃统计表' AUTO_INCREMENT=1 ;

ALTER TABLE  `ocenter_user_config` CHANGE  `value`  `value` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL

INSERT INTO `ocenter_menu` (`title`, `pid`, `sort`, `url`, `hide`, `tip`, `group`, `is_dev`, `icon`, `module`) VALUES
('添加', 1, 0, 'Index/addTo', 1, '', '', 0, '', ''),
('删除', 1, 0, 'Index/delTile', 1, '', '', 0, '', ''),
('修改', 1, 0, 'Index/setTile', 1, '', '', 0, '', '');

INSERT INTO `ocenter_invite_type` (`title`, `length`, `time`, `cycle_num`, `cycle_time`, `roles`, `auth_groups`, `pay_score`, `pay_score_type`, `income_score`, `income_score_type`, `is_follow`, `status`, `create_time`, `update_time`) VALUES
('系统默认邀请码', 11, '10 year', 1, '1 second', '[1]', '[1],[2]', 0, 1, 0, 1, 1, 1, 1466749163, 1471247871);
