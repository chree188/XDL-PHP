/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : test_object

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for lamp_category
-- ----------------------------
DROP TABLE IF EXISTS `lamp_category`;
CREATE TABLE `lamp_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `path` varchar(255) NOT NULL,
  `sort` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lamp_category
-- ----------------------------
INSERT INTO `lamp_category` VALUES ('3', '音响', '0', '0,', '0');
INSERT INTO `lamp_category` VALUES ('14', '箱包', '0', '0,', '0');
INSERT INTO `lamp_category` VALUES ('15', '鞋靴', '0', '0,', '0');
INSERT INTO `lamp_category` VALUES ('22', '小说', '13', '0,13,', '0');
INSERT INTO `lamp_category` VALUES ('24', '杂志', '13', '0,13,', '0');
INSERT INTO `lamp_category` VALUES ('25', '服装', '0', '0,', '0');
INSERT INTO `lamp_category` VALUES ('26', '图书', '0', '0,', '0');
INSERT INTO `lamp_category` VALUES ('28', '男装', '25', '0,25,', '0');
INSERT INTO `lamp_category` VALUES ('29', '女装', '25', '0,25,', '0');
INSERT INTO `lamp_category` VALUES ('30', '上衣', '28', '0,25,28,', '0');
INSERT INTO `lamp_category` VALUES ('31', '下装', '28', '0,25,28,', '0');
INSERT INTO `lamp_category` VALUES ('32', '小短裙', '29', '0,25,29,', '0');
INSERT INTO `lamp_category` VALUES ('33', '搭短裙', '29', '0,25,29,', '0');
INSERT INTO `lamp_category` VALUES ('34', '小说', '26', '0,26,', '0');
INSERT INTO `lamp_category` VALUES ('35', '杂志', '26', '0,26,', '0');
INSERT INTO `lamp_category` VALUES ('36', '言情', '34', '0,26,34,', '0');
INSERT INTO `lamp_category` VALUES ('37', '历史', '34', '0,26,34,', '0');
INSERT INTO `lamp_category` VALUES ('38', '故事会', '35', '0,26,35,', '0');

-- ----------------------------
-- Table structure for lamp_node
-- ----------------------------
DROP TABLE IF EXISTS `lamp_node`;
CREATE TABLE `lamp_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `aname` varchar(50) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lamp_node
-- ----------------------------
INSERT INTO `lamp_node` VALUES ('1', '浏览用户', 'user', 'index', '1');
INSERT INTO `lamp_node` VALUES ('2', '添加用户', 'user', 'add', '1');
INSERT INTO `lamp_node` VALUES ('3', '删除用户', 'user', 'delete', '1');
INSERT INTO `lamp_node` VALUES ('4', '修改用户', 'user', 'edit', '1');
INSERT INTO `lamp_node` VALUES ('5', '浏览角色', 'role', 'index', '1');
INSERT INTO `lamp_node` VALUES ('6', '添加角色', 'role', 'add', '1');
INSERT INTO `lamp_node` VALUES ('7', '删除角色', 'role', 'delete', '1');
INSERT INTO `lamp_node` VALUES ('8', '编辑角色', 'role', 'edit', '1');
INSERT INTO `lamp_node` VALUES ('9', '浏览节点', 'node', 'index', '1');
INSERT INTO `lamp_node` VALUES ('10', '添加节点', 'node', 'add', '1');
INSERT INTO `lamp_node` VALUES ('11', '删除节点', 'node', 'delete', '1');
INSERT INTO `lamp_node` VALUES ('12', '修改节点', 'node', 'edit', '1');
INSERT INTO `lamp_node` VALUES ('13', '浏览用户分配角色', 'user', 'rolelist', '1');
INSERT INTO `lamp_node` VALUES ('14', '更改用户分配角色', 'user', 'saverole', '1');
INSERT INTO `lamp_node` VALUES ('15', '浏览角色的操作权限', 'role', 'nodelist', '1');
INSERT INTO `lamp_node` VALUES ('16', '修改角色中操作权限', 'role', 'savenode', '1');
INSERT INTO `lamp_node` VALUES ('19', '浏览用户分配角色', 'user', 'rolelist', '1');

-- ----------------------------
-- Table structure for lamp_role
-- ----------------------------
DROP TABLE IF EXISTS `lamp_role`;
CREATE TABLE `lamp_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lamp_role
-- ----------------------------
INSERT INTO `lamp_role` VALUES ('2', '项目经理', '1', '负责所有项目');
INSERT INTO `lamp_role` VALUES ('3', '部门主任', '1', '负责当期部门管理');
INSERT INTO `lamp_role` VALUES ('4', '普通员工', '1', '无');
INSERT INTO `lamp_role` VALUES ('7', '临时工', '1', '公司员工');

-- ----------------------------
-- Table structure for lamp_role_node
-- ----------------------------
DROP TABLE IF EXISTS `lamp_role_node`;
CREATE TABLE `lamp_role_node` (
  `rid` smallint(6) unsigned NOT NULL,
  `nid` smallint(6) unsigned NOT NULL,
  KEY `groupId` (`rid`),
  KEY `nodeId` (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lamp_role_node
-- ----------------------------
INSERT INTO `lamp_role_node` VALUES ('2', '16');
INSERT INTO `lamp_role_node` VALUES ('4', '5');
INSERT INTO `lamp_role_node` VALUES ('3', '7');
INSERT INTO `lamp_role_node` VALUES ('2', '15');
INSERT INTO `lamp_role_node` VALUES ('2', '14');
INSERT INTO `lamp_role_node` VALUES ('2', '13');
INSERT INTO `lamp_role_node` VALUES ('2', '12');
INSERT INTO `lamp_role_node` VALUES ('2', '11');
INSERT INTO `lamp_role_node` VALUES ('4', '4');
INSERT INTO `lamp_role_node` VALUES ('4', '2');
INSERT INTO `lamp_role_node` VALUES ('4', '1');
INSERT INTO `lamp_role_node` VALUES ('2', '10');
INSERT INTO `lamp_role_node` VALUES ('2', '9');
INSERT INTO `lamp_role_node` VALUES ('2', '8');
INSERT INTO `lamp_role_node` VALUES ('2', '7');
INSERT INTO `lamp_role_node` VALUES ('2', '6');
INSERT INTO `lamp_role_node` VALUES ('2', '5');
INSERT INTO `lamp_role_node` VALUES ('2', '4');
INSERT INTO `lamp_role_node` VALUES ('2', '3');
INSERT INTO `lamp_role_node` VALUES ('3', '2');
INSERT INTO `lamp_role_node` VALUES ('2', '2');
INSERT INTO `lamp_role_node` VALUES ('2', '1');
INSERT INTO `lamp_role_node` VALUES ('3', '13');
INSERT INTO `lamp_role_node` VALUES ('3', '15');
INSERT INTO `lamp_role_node` VALUES ('4', '9');
INSERT INTO `lamp_role_node` VALUES ('7', '13');
INSERT INTO `lamp_role_node` VALUES ('7', '1');
INSERT INTO `lamp_role_node` VALUES ('7', '15');

-- ----------------------------
-- Table structure for lamp_user
-- ----------------------------
DROP TABLE IF EXISTS `lamp_user`;
CREATE TABLE `lamp_user` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `name` varchar(50) NOT NULL,
  `userpass` char(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lamp_user
-- ----------------------------
INSERT INTO `lamp_user` VALUES ('1', 'admin', '管理员', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `lamp_user` VALUES ('4', 'lisi', '李四', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `lamp_user` VALUES ('3', 'zhangsan', '张三', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `lamp_user` VALUES ('5', 'qq', 'qq', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `lamp_user` VALUES ('6', 'pp', 'pp', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `lamp_user` VALUES ('20', 'qq1234', 'qq123456123', 'e10adc3949ba59abbe56e057f20f883e');

-- ----------------------------
-- Table structure for lamp_user_role
-- ----------------------------
DROP TABLE IF EXISTS `lamp_user_role`;
CREATE TABLE `lamp_user_role` (
  `rid` mediumint(9) unsigned DEFAULT NULL,
  `uid` int(6) unsigned NOT NULL,
  KEY `group_id` (`rid`),
  KEY `user_id` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lamp_user_role
-- ----------------------------
INSERT INTO `lamp_user_role` VALUES ('3', '5');
INSERT INTO `lamp_user_role` VALUES ('2', '1');
INSERT INTO `lamp_user_role` VALUES ('4', '4');
INSERT INTO `lamp_user_role` VALUES ('3', '1');
INSERT INTO `lamp_user_role` VALUES ('7', '5');
INSERT INTO `lamp_user_role` VALUES ('7', '3');
