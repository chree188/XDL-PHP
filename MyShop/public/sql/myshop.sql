/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50709
Source Host           : localhost:3306
Source Database       : myshop

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2016-07-27 14:50:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for detail
-- ----------------------------
DROP TABLE IF EXISTS `detail`;
CREATE TABLE `detail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `orderid` int(11) DEFAULT NULL,
  `goodsid` int(11) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `price` double(6,2) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gtfk` (`orderid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of detail
-- ----------------------------

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` int(11) DEFAULT NULL,
  `goods` varchar(32) NOT NULL,
  `company` varchar(50) DEFAULT NULL,
  `descr` text,
  `price` double(6,2) DEFAULT NULL,
  `picname` varchar(255) DEFAULT NULL,
  `state` enum('1','2','3') DEFAULT '1',
  `store` int(11) DEFAULT '0',
  `num` int(11) DEFAULT '0',
  `clicknum` int(11) DEFAULT '0',
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `goods` (`goods`),
  KEY `gtfk` (`typeid`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', '9', '江南菜籽油', '江南粮油食品厂', '江南黄金油菜籽油。。。江南黄金油菜籽油...', '59.99', '14694141879812.jpg', '1', '180', '0', '0', '1469414187');
INSERT INTO `goods` VALUES ('2', '9', '东北香菜籽油', '吉林粮油厂', '东北香菜籽油东北香菜籽油。。。真香真香真真香', '80.00', '14694242758932.jpg', '1', '300', '0', '0', '1469424275');
INSERT INTO `goods` VALUES ('10', '18', '金龙鱼', '金龙鱼有限公司', '金龙鱼花生调和油。。。。。。。。', '59.90', '14694445783402.jpg', '2', '56', '0', '0', '1469444526');
INSERT INTO `goods` VALUES ('11', '16', '临安山核桃', '临安', '临安手剥山核桃', '89.00', '14694447521569.jpg', '1', '86', '0', '0', '1469444752');
INSERT INTO `goods` VALUES ('12', '17', '清香小麦', '绍兴粮食厂', '绍兴粮食厂清香小麦', '23.00', '14694448022742.jpg', '1', '85', '0', '0', '1469444802');
INSERT INTO `goods` VALUES ('13', '11', '鲤鱼', '开化清水鱼', '开化清水鱼，鲤鱼。。。。', '26.00', '14694448967589.jpg', '1', '6', '0', '0', '1469444896');
INSERT INTO `goods` VALUES ('14', '13', '大草鱼', '千岛湖', '千岛湖大草鱼。。。。。。。。', '26.00', '14694449639705.jpg', '1', '53', '0', '0', '1469444963');
INSERT INTO `goods` VALUES ('15', '15', '香蕉', '海南香蕉林', '海南芝麻香蕉，好吃好吃真好吃', '8.90', '14694451724018.jpg', '1', '66', '0', '0', '1469445172');
INSERT INTO `goods` VALUES ('16', '21', '珍品海参', '福建滋养保健品公司', '天慈天养精选珍品海参。。', '119.89', '14695825385817.jpg', '1', '85', '0', '0', '1469582538');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `odid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `linkman` varchar(32) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `code` char(6) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `descr` text,
  `addtime` int(11) DEFAULT NULL,
  `total` double(8,2) DEFAULT NULL,
  `status` enum('0','1','2','3') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `pid` int(11) unsigned DEFAULT '0',
  `path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES ('1', '食用油', '0', '0,');
INSERT INTO `type` VALUES ('2', '干果坚果', '0', '0,');
INSERT INTO `type` VALUES ('3', '五谷杂粮', '0', '0,');
INSERT INTO `type` VALUES ('4', '水产', '0', '0,');
INSERT INTO `type` VALUES ('5', '水果', '0', '0,');
INSERT INTO `type` VALUES ('13', '草鱼', '11', '0,4,11,');
INSERT INTO `type` VALUES ('9', '菜籽油', '1', '0,1,');
INSERT INTO `type` VALUES ('11', '淡水鱼', '4', '0,4,');
INSERT INTO `type` VALUES ('15', '热带水果', '5', '0,5,');
INSERT INTO `type` VALUES ('16', '核桃', '2', '0,2,');
INSERT INTO `type` VALUES ('17', '麦子', '3', '0,3,');
INSERT INTO `type` VALUES ('18', '色拉油', '1', '0,1,');
INSERT INTO `type` VALUES ('19', '滋养品', '0', '0,');
INSERT INTO `type` VALUES ('20', '补品', '19', '0,19,');
INSERT INTO `type` VALUES ('21', '养品', '19', '0,19,');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `name` varchar(16) DEFAULT NULL,
  `pass` char(32) NOT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `code` char(6) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `state` enum('1','2','3') DEFAULT '1',
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'rz', '瑞兹', '84d6c1089afa2c0a3e2f3c8a877df0f3', '1', '召唤师峡谷', '458712', '13777399112', 'rz@126.com', '2', '1468976982');
INSERT INTO `users` VALUES ('2', 'js', '剑圣', 'a40f8f12d1f0656b6185c83a89a47001', '1', '召唤师峡谷', '145287', '13777399388', 'js@126.com', '1', '1468930349');
INSERT INTO `users` VALUES ('3', 'mgn', '莫甘娜', 'e4eb4fd9377257d2011e193156003bf7', '2', '召唤师峡谷', '124578', '13777399001', 'mgn@126.com', '2', '1468926849');
INSERT INTO `users` VALUES ('4', 'qj', '千珏', '55431fe6c0743b0e9afde1e6f4b3cb84', '2', '符文之地', '847521', '13777333444', 'qj@126.com', '1', '1469005102');
INSERT INTO `users` VALUES ('5', 'ax', '艾希', '2384ecc9f4a1618d2cc06639c3a16f0b', '2', '瓦罗兰', '451278', '13421826813', 'ax@126.com', '1', '1468927033');
INSERT INTO `users` VALUES ('6', 'gl', '盖伦', 'f802b9669cdf882daa2c991724745b9b', '1', '德玛西亚', '254187', '13777399444', 'gl@126.com', '2', '1468936764');
INSERT INTO `users` VALUES ('7', 'ys', '亚索', '1daeb30c93c6bd724b3ec515e41b97d3', '1', '召唤师峡谷', '154287', '13777333123', 'jh@126.com', '2', '1469020137');
INSERT INTO `users` VALUES ('8', 'ktl', '凯特琳', '1147ec8fe6c96fa99b516ae017d0552c', '2', '皮城警备', '758421', '13777388387', 'ktl@126.com', '2', '1469088747');
INSERT INTO `users` VALUES ('9', 'ktln', '凯特琳娜', '2c34e6eaca8165ae4d44373b7ada5bca', '2', '不知道', '784851', '13777852963', 'ktln@126.com', '1', '1469088810');
INSERT INTO `users` VALUES ('10', 'nq', '男枪', '1dd88952cc1150db5a6be33932fff1c9', '2', '比尔吉沃特', '758421', '13777741852', 'nq@126.com', '3', '1469088874');
INSERT INTO `users` VALUES ('11', 'hyj', '好运姐', '975caee8c7ffb6107f9d6683bfb170cf', '2', '海盗船', '741852', '13777789456', 'hyj@126.com', '1', '1469088946');
INSERT INTO `users` VALUES ('12', 'zjx', '章佳鑫', 'b01364ed815031f09e4cfac165491933', '2', '浙江省绍兴市', '312000', '13777398039', 'zjx@126.com', '3', '1469089006');
INSERT INTO `users` VALUES ('13', 'root', 'ROOT', '63a9f0ea7bb98050796b649e85481845', '1', 'root', '212121', '13777333212', 'root@126.com', '1', '1469089044');
INSERT INTO `users` VALUES ('14', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', 'admin', '111111', '13777399333', 'admin@126.com', '2', '1469148435');
INSERT INTO `users` VALUES ('15', 'zx', '赵信', 'f52f7720f135c6a848fae08d507914cf', '1', '德玛西亚', '758421', '13777399222', 'zx@126.com', '1', '1469409209');
INSERT INTO `users` VALUES ('16', 'ln', '李楠', '819bf6016a77718965d0b043cf2e3f62', '1', '浙江省开化县', '324300', '13777399582', 'ln@126.com', '1', '1469444255');
INSERT INTO `users` VALUES ('17', 'zs', '张三', 'cdc6d1963928d5c349a4eebf11c8b4a5', '1', '上海兄弟连', '458725', '13777388366', 'zs@126.com', '3', '1469454152');
INSERT INTO `users` VALUES ('18', 'lks', '拉克丝', '1a0f4688de8fd0fe93f7d95e41758c82', '2', '德玛西亚', '785457', '13777888999', 'lks@126.com', '2', '1469454306');
INSERT INTO `users` VALUES ('19', 'wjj', '雷克塞', 'c9ddf11557230c99246f1c99a3597da5', '2', '召唤师峡谷', '578422', '13777444666', 'wjj@126.com', '', '1469456486');
