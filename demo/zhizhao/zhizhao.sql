/*
SQLyog 企业版 - MySQL GUI v8.14 
MySQL - 5.5.16-log : Database - zhizhao
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`zhizhao` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `zhizhao`;

/*Table structure for table `yrq_ad` */

DROP TABLE IF EXISTS `yrq_ad`;

CREATE TABLE `yrq_ad` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `sort_id` int(3) NOT NULL DEFAULT '1',
  `ad_pic` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ad_url` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ad_explain` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_time` int(10) DEFAULT NULL,
  `end_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `yrq_ad` */

insert  into `yrq_ad`(`id`,`ad_name`,`status`,`sort_id`,`ad_pic`,`ad_url`,`ad_explain`,`start_time`,`end_time`) values (11,'列表页上方广告图','1',4,'/Uploads/image/20140505/20140505092049_93089.jpg','javascript:;','列表页上方广告图',1399219200,1496160000),(10,'首页焦点图轮播2','1',3,'/Uploads/image/20140505/20140505085852_42115.jpg','javascript:;','小蚂蚁，大力量',1399219200,1527609600),(9,'首页焦点图轮播1','1',3,'/Uploads/image/20140505/20140505085411_96319.jpg','javascript:;','你来问，大家来支招',1399219200,1589990400),(12,'微信二维码','1',5,'/Uploads/image/20140505/20140505092231_57875.png','javascript:;','微信二维码',1399219200,1590508800);

/*Table structure for table `yrq_ad_sort` */

DROP TABLE IF EXISTS `yrq_ad_sort`;

CREATE TABLE `yrq_ad_sort` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `sort_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `size` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `yrq_ad_sort` */

insert  into `yrq_ad_sort`(`id`,`sort_name`,`status`,`size`) values (3,'首页焦点图轮播','1','648*240'),(4,'列表页上方广告图','1','980*120'),(5,'页脚微信二维码','0','162*162');

/*Table structure for table `yrq_admin` */

DROP TABLE IF EXISTS `yrq_admin`;

CREATE TABLE `yrq_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `password` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `logintime` int(10) unsigned NOT NULL DEFAULT '0',
  `loginip` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uindex` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `yrq_admin` */

insert  into `yrq_admin`(`id`,`username`,`password`,`logintime`,`loginip`,`createtime`) values (1,'admin','7fef6171469e80d32c0559f88b377245',1399439449,'127.0.0.1',1381657602);

/*Table structure for table `yrq_ask` */

DROP TABLE IF EXISTS `yrq_ask`;

CREATE TABLE `yrq_ask` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `ask_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `solve` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '是否被采纳',
  `sequence` int(3) NOT NULL DEFAULT '0',
  `sort_id` int(3) NOT NULL DEFAULT '1',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` enum('0','1') COLLATE utf8_unicode_ci DEFAULT '0' COMMENT '推荐 精华',
  `add_time` int(10) NOT NULL,
  `click_number` int(8) NOT NULL DEFAULT '0',
  `uid` int(11) DEFAULT NULL COMMENT '用户ID',
  `comment_num` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '评论数回答数',
  `reward` int(8) unsigned NOT NULL DEFAULT '0' COMMENT '奖励金币',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `yrq_ask` */

insert  into `yrq_ask`(`id`,`ask_name`,`solve`,`sequence`,`sort_id`,`content`,`tags`,`add_time`,`click_number`,`uid`,`comment_num`,`reward`) values (1,'蒸一个蛋黄需要加多少凉白开?','0',0,1,'&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;现在还没有金币，有没有好心人告诉下，&lt;/span&gt;&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;蒸一个蛋黄需要加多少凉白开呢?&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;&lt;br&nbsp;/&gt;\r\n&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;line-height:21px;&quot;&gt;第一次在这里求教。&lt;/span&gt;\r\n&lt;/p&gt;','0',1399273209,1,3,0,0),(2,'一个半月宝宝可不可以喝绿豆汤水？','0',0,1,'&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;一个半月宝宝可不可以喝绿豆汤水？&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;&lt;br&nbsp;/&gt;\r\n&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;着急啊&nbsp;....&nbsp;在线等...谢谢&lt;/span&gt;\r\n&lt;/p&gt;','0',1399273268,1,3,0,5),(3,'火在两边串在中间烤烤那叫什么炉子？','0',0,1,'&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;有没有人知道火在两边串在中间烤烤那叫什么炉子？&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;&lt;br&nbsp;/&gt;\r\n&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;最近家里想买一个这样的？&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;&lt;br&nbsp;/&gt;\r\n&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;在线等！！&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;&lt;br&nbsp;/&gt;\r\n&lt;/span&gt;\r\n&lt;/p&gt;','0',1399273347,1,3,0,5),(4,'格兰仕光波炉里的卤素灯管坏了可以换吗','0',0,1,'&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;家里格兰仕光波炉里的卤素灯管坏了可以换吗？&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br&nbsp;/&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;如果可以换，可以省点钱啊！&lt;/span&gt;\r\n&lt;/p&gt;','0',1399273434,1,3,0,5),(5,'求：印度电影《不可能的爱》中吃泰国菜时插曲','0',0,1,'&lt;p&gt;\r\n	求一首歌曲！\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br&nbsp;/&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	印度电影《不可能的爱》中吃泰国菜时插曲,就是一直重复萨瓦迪卡的那首！\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br&nbsp;/&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	有米有人知道啊！\r\n&lt;/p&gt;','0',1399273533,1,3,0,5),(6,'红酒里面的塞怎么拔出来?','0',0,1,'&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;我知道这个很丢人，但是还是需要厚着脸皮问一下：&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br&nbsp;/&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;红酒里面的塞怎么拔出来?&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br&nbsp;/&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;有人知道么？&lt;/span&gt;\r\n&lt;/p&gt;','0',1399273593,6,3,1,10),(7,'请问双龙湖什么地方大面积生产黄瓜、番茄、洋葱、生姜、二青条辣椒。谢谢','0',0,1,'&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;请问双龙湖什么地方大面积生产黄瓜、番茄、洋葱、生姜、二青条辣椒。谢谢！&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;&lt;br&nbsp;/&gt;\r\n&lt;/span&gt;\r\n&lt;/p&gt;','0',1399273670,3,3,0,5),(8,'XP系统停止更新以后用什么系统好​','0',0,1,'&lt;p&gt;\r\n	XP系统停止更新以后用什么系统好呢\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br&nbsp;/&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	一直用了XP好多好多年，但是为了安全还是要舍得啊&nbsp;，&nbsp;求推荐！！\r\n&lt;/p&gt;','0',1399273786,1,3,0,15),(9,'电脑突然运行卡了,怎么回事？','0',0,1,'&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;家里的电脑突然运行就卡了,动都动不了！！&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;&lt;br&nbsp;/&gt;\r\n&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;电脑白痴，厚着脸皮来问问大神们！&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;&lt;br&nbsp;/&gt;\r\n&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;谢谢！我需要怎么做呢？&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;&lt;br&nbsp;/&gt;\r\n&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;不可能换一台电脑吧！&nbsp;学生党，穷啊！&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;&lt;br&nbsp;/&gt;\r\n&lt;/span&gt;\r\n&lt;/p&gt;','0',1399273893,1,3,0,5),(10,'这衣服好看吗？求点评！','1',0,1,'&lt;img&nbsp;src=&quot;/Uploads/image/20140505/20140505071229_91048.jpg&quot;&nbsp;alt=&quot;&quot;&nbsp;/&gt;','0',1399273953,11,3,1,20),(11,'老师发火怎么劝？','0',0,1,'&lt;p&gt;\r\n	女儿的老师说我女儿写作文经常引用微软公司的科研失败的故事，我说老师又少见多怪了，老师发火怎么劝？\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br&nbsp;/&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br&nbsp;/&gt;\r\n&lt;/p&gt;','0',1399274026,2,3,0,5),(12,'手机没电关机后&nbsp;能否自动续一点电？','1',0,1,'&lt;p&gt;\r\n	手机没电关机后&nbsp;能否自动续一点电？\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br&nbsp;/&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	最近要外出，在纠结这个问题。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br&nbsp;/&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	坐等好心人支招！！\r\n&lt;/p&gt;','0',1399274079,80,3,3,5),(13,'求一个带，若，诺，的网名','1',0,1,'&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;求一个带，若，诺，的好听的网名！&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;&lt;br&nbsp;/&gt;\r\n&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;隔壁的小王竟然想出一个那么霸气的网名。我也要！&lt;/span&gt;\r\n&lt;/p&gt;','0',1399274159,21,3,1,10),(14,'我在公司学习品管，感觉不咋滴，该怎么办呢','0',0,2,'&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;我在公司学习品管，感觉不咋滴，该怎么办呢？&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br&nbsp;/&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;刚刚毕业，以前学的文学，感觉毫无兴趣，跟专业无关啊！&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br&nbsp;/&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;我该怎么办呢。&lt;/span&gt;\r\n&lt;/p&gt;','0',1399274509,2,4,0,0),(15,'苦恼的一件事，我白天听课总是精神不好，我怎么办？','0',0,2,'&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;苦恼的一件事，我白天听课总是精神不好，我怎么办？&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br&nbsp;/&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;哎！！！&lt;/span&gt;\r\n&lt;/p&gt;','0',1399274593,1,4,0,5),(16,'对另一半越来越不顺眼，倒底是为什么？','0',0,2,'&lt;p&gt;\r\n	不知道最近为什么对另一半越来越不顺眼，倒底是为什么？\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br&nbsp;/&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	话都不想跟他说。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br&nbsp;/&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	看到人都烦！\r\n&lt;/p&gt;','0',1399274648,1,4,0,10),(17,'在国外读书，找不到合适的室友。想一个住但是又怕。','0',0,2,'&lt;pre&nbsp;class=&quot;line&amp;nbsp;mt-10&amp;nbsp;q-content&quot;&gt;在国外读书，找不到合适的室友。想一个住但是又怕。&lt;/pre&gt;\r\n&lt;pre&nbsp;class=&quot;line&amp;nbsp;mt-10&amp;nbsp;q-content&quot;&gt;\r\n&lt;/pre&gt;\r\n&lt;pre&nbsp;class=&quot;line&amp;nbsp;mt-10&amp;nbsp;q-content&quot;&gt;我该怎么办呢？\r\n&lt;/pre&gt;','0',1399274687,2,4,0,15),(18,'哎！为什么找不到对象呢？','0',0,2,'&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;哎！为什么找不到对象呢？&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br&nbsp;/&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;都快三十了。我也不宅啊！长相一般。就是有点内向！&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br&nbsp;/&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;求支招！&lt;/span&gt;\r\n&lt;/p&gt;','0',1399274820,2,4,0,10),(19,'感情方面的问题请教女孩子','0',0,2,'&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;别人介绍认识的一个女孩子，刚刚认识就由于工作原因分处两地，打电话的时候从她话语里觉察到一些问题，直白点说就是：我人在外地，她平时又看不着，谁知道下班之后做什么，出去鬼混啊什么的也不会知道。像这样的问题女孩子希望对方怎么样才会排除这种顾虑呢，每天汇报情况还是怎么解决？或者说没办法解决？请教有经验的人或者女孩子从自身的感触去回答，谢谢！&lt;/span&gt;','0',1399274926,1,4,0,5),(20,'当男人表白后若即若离是为什么?','0',0,2,'如题！&lt;span&nbsp;style=&quot;font-size:16px;&quot;&gt;&lt;/span&gt;','0',1399274974,1,4,0,5),(21,'如何与一个很自我为中心的男友相处？','0',0,2,'&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;如何与一个很自我为中心的男友相处？&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;&lt;br&nbsp;/&gt;\r\n&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;求支招，求建议。&lt;/span&gt;\r\n&lt;/p&gt;','0',1399275016,1,4,0,5),(22,'孩子为什么跟父亲无话？','0',0,2,'&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;孩子为什么跟父亲无话？&nbsp;是因为太严厉了么？还是小孩叛逆期！&lt;/span&gt;','0',1399275110,2,4,0,15),(23,'遇到一个强势的婆婆','0',0,2,'&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;遇到一个强势的婆婆，什么事都是她的理，看孩子委屈，不让看了，还是委屈，我这个儿媳妇是怎么做都是错，骂我是全家最坏的人！现在我不用她看孩子，就是自己累了点，但是老公很为难？我不想过天天看婆婆脸色的日子，过够了，可是老公过不了现在这样的日子，我该怎么办？以前婆婆带着我女儿，连女儿都得看我婆婆脸色的！我讨厌让女儿生活在那样的环境里！我婆婆眼里只有钱，没有亲情的人！&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;&lt;br&nbsp;/&gt;\r\n&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;我该怎么办呢？&lt;/span&gt;\r\n&lt;/p&gt;','0',1399275180,1,4,0,5),(24,'女方嫁给男方,有拿私房钱,是男方给,还是女方的嫁妆算作私房钱?','0',0,2,'&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;女方嫁给男方,有拿私房钱,是男方给,还是女方的嫁妆算作私房钱?&lt;/span&gt;','0',1399275253,1,4,0,5),(25,'我老爸跟我断绝关系了，我该怎么办？','0',0,2,'&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;我老爸跟我断绝关系了，我该怎么办？&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;&lt;br&nbsp;/&gt;\r\n&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;需要我去认错么？&lt;/span&gt;\r\n&lt;/p&gt;','0',1399275309,1,4,0,0),(26,'如何写老人的生日祝贺词？','0',0,2,'&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;如何写老人的生日祝贺词？&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;&lt;br&nbsp;/&gt;\r\n&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;以前实在是因为没有写过，不知道怎么写，求广大网友支招！&lt;/span&gt;\r\n&lt;/p&gt;','0',1399275362,3,4,0,5),(27,'舌根有两道裂纹和红色疙瘩','0',0,3,'&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;舌根苔比较厚，有深的裂纹和疙瘩，舌体肥大，舌苔薄白，舌中到舌尖很湿润，舌头颜色偏暗，舌中也有两道淡淡的裂痕，总是口渴，心闷，晚上睡觉不好，容易醒或者睡得太深，头昏眼睛酸，月经不调，女20岁。&lt;/span&gt;','0',1399275476,1,1,0,0),(28,'多发性脂肪瘤怎么治疗？','0',0,3,'&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;我百度了下&lt;/span&gt;&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;多发性脂肪瘤的症状，怎么感觉这么相似呢？&lt;/span&gt;&lt;span&nbsp;id=&quot;__kindeditor_bookmark_start_0__&quot;&nbsp;style=&quot;font-size:14px;&quot;&gt;&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&gt;&lt;br&nbsp;/&gt;\r\n&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&gt;&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;多发性脂肪瘤怎么治疗？&lt;/span&gt;&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;&lt;/span&gt;&lt;br&nbsp;/&gt;\r\n&lt;/span&gt;\r\n&lt;/p&gt;','0',1399275551,1,1,0,5),(29,'痔疮的手术治疗方法','0',0,3,'&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;以前便秘厉害时，肛门就会漏出一个小肉瘤，但过会就会自行缩回去，现在肉瘤经常漏出，即使缩回去也有褶皱在外面，最近才发现还有一个小米粒大小的疙瘩出现，不疼不氧不出血，没任何感觉，但很担心很苦恼，请你帮忙，谢谢！&lt;/span&gt;','0',1399275627,1,1,0,5),(30,'哪位专家解答一下，去湿有哪些药品和食品？','0',0,3,'&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;哪位专家解答一下，去湿有哪些药品和食品？&lt;/span&gt;','0',1399275661,1,1,0,10),(31,'山东哪个医院可以测骨龄？','0',0,3,'&lt;p&gt;\r\n	最近想去测测骨龄。由于我在山东。\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br&nbsp;/&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	所有&amp;nbsp;山东哪个医院可以测骨龄？&lt;span&nbsp;id=&quot;__kindeditor_bookmark_start_0__&quot;&gt;&lt;/span&gt;\r\n&lt;/p&gt;','0',1399275725,1,1,0,15),(32,'肛周炎治疗用什么办法,痔疮拉血','0',0,3,'&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;这个是怎么得来的，会不会传染来的啊？&nbsp;我最近就的痔疮了，每天都上不下来厕所，很痒很痛，尤其一吃辣的东西更是难受，苦恼极了&lt;/span&gt;&lt;br&nbsp;/&gt;\r\n&lt;div&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;&lt;/span&gt;&lt;br&nbsp;/&gt;\r\n&lt;/div&gt;','0',1399275761,1,1,0,5),(33,'脚底长鸡眼怎么办?好难啊，求办法！','0',0,3,'&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;脚后跟长鸡眼?吃什么都不知吗俺求帮一下了，希望有能给我点好的建议好吗？今天上来问问，此问题除了我谁还想问呀，有同道的朋友吧有哪些差别?谁有高招教教我谢谢？走过了多少失败路了？可以给我一些的希望吗？&lt;/span&gt;','0',1399275802,1,1,0,15),(34,'为什么我出血这么慢？','0',0,3,'&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;今天有点要感冒的症状，去医院开点药，&nbsp;查血常规的时候，化验的大夫说我这血怎么出的这么慢？取了一部分，就挤不出来了，停了2秒钟，再挤才终于够了，他也说不好什么原因，我也奇怪呢。血常规的结果也没什么问题，都正常。&lt;/span&gt;&lt;br&nbsp;/&gt;\r\n&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;我3月底查过血脂，就是高密度脂蛋白1.8，其余的都正常，也不是高脂血的人啊，我这是血稠吗？怎么办啊&lt;/span&gt;&lt;br&nbsp;/&gt;','0',1399275857,1,1,0,10),(35,'怎样治脚气&nbsp;轻微脚气用什么药求网友帮答谢谢了!!','0',0,3,'&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;具体怎么做？是为什么我实在是了解的太少一直想问问这个问题是我一大心病告诉我可以吗已经选择了，就不能后悔的！绝不妥协！&lt;/span&gt;&lt;br&nbsp;/&gt;\r\n&lt;div&gt;\r\n	&lt;br&nbsp;/&gt;\r\n&lt;/div&gt;','0',1399275895,2,1,0,0),(36,'5至6岁儿童1分钟心跳应该多少下？','0',0,3,'&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;5至6岁儿童1分钟心跳应该多少下？&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;在线等！！谢谢&lt;/span&gt;\r\n&lt;/p&gt;','0',1399275932,1,1,0,0),(37,'肛周炎症状图片谁有呢,痔疮是什么样子？','0',0,3,'&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;一个半个月前，便后肛门感觉有点疼痛，第二天肛门里面感觉很痒，之后一次大便时发现肛门内口有个小肉肉的东西。每天都很难受的！&lt;/span&gt;&lt;br&nbsp;/&gt;\r\n&lt;div&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;&lt;/span&gt;&lt;br&nbsp;/&gt;\r\n&lt;/div&gt;','0',1399275980,1,1,0,5),(38,'经常吃消炎药好不好？','0',0,3,'经常吃消炎药好不好？&nbsp;如题。','0',1399276009,1,1,0,5),(39,'山东哪家医院可以做13c呼气检测','0',0,3,'山东哪家医院可以做13c呼气检测？','0',1399276056,3,1,0,0),(40,'顺德顺特电气待遇工资福利？','0',0,4,'&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;有人知道顺特电气的应届生待遇如何么，或者里面有职称的员工待遇工资，福利。。。。。&lt;/span&gt;','0',1399276125,2,1,0,15),(41,'昆山利滨塑胶工业招女保安吗','0',0,4,'&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;替媳妇问下，她想换工作！&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br&nbsp;/&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;昆山利滨塑胶工业招女保安吗&lt;/span&gt;&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;&lt;/span&gt;\r\n&lt;/p&gt;','0',1399276291,1,5,0,0),(42,'保持良好的就业心态有哪些重要性','0',0,4,'&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;保持良好的就业心态有哪些重要性？？&lt;/span&gt;','0',1399276335,1,5,0,5),(43,'中国华云气象科技集团是国企吗？待遇怎么样？','0',0,4,'中国华云气象科技集团是国企吗？待遇怎么样？','0',1399276365,2,5,0,5),(44,'关于个人就业方向','0',0,4,'&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;本人毕业一年了&nbsp;是机电一体化的毕业&amp;nbsp;&lt;/span&gt;&lt;br&nbsp;/&gt;\r\n&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;我这一年中都在一家私营的小公司干活&lt;/span&gt;&lt;br&nbsp;/&gt;\r\n&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;一直在用&nbsp;ps&nbsp;cad&nbsp;&amp;nbsp;和&nbsp;ai这三种软件绘图操作都是很熟练都是用快捷键操作，但是因为是小公司，制图完全是怎么方便怎么来完全没有那种正规的经验。cad&nbsp;是我的专业&nbsp;&amp;nbsp;ps&nbsp;和ai是自的&nbsp;设计行业是混不下去了，自认为没什么审美的天赋，对编程很感兴趣，一直想在IT行业发展，一直在自学java&lt;/span&gt;&lt;br&nbsp;/&gt;\r\n&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;因为一些原因辞职了想另找工作&lt;/span&gt;&lt;br&nbsp;/&gt;\r\n&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;我想问问，有没有一种能和编程入门有关的工作？？？&lt;/span&gt;&lt;br&nbsp;/&gt;\r\n&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;如果没有，建筑行业怎么样？我这基础能从事什么行业？？？&lt;/span&gt;&lt;br&nbsp;/&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;发展很茫然&nbsp;求指条明路！&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;&lt;br&nbsp;/&gt;\r\n&lt;/span&gt;\r\n&lt;/p&gt;','0',1399276418,1,5,0,15),(45,'应聘了一份工作，叫我回家等人事通知，一等就是十多天啦？','0',0,4,'&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;应聘了一份工作，叫我回家等人事通知，一等就是十多天啦？&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br&nbsp;/&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;需要等这么久么？是不是基本上不可能了啊！&lt;/span&gt;\r\n&lt;/p&gt;','0',1399276537,2,5,0,0),(46,'有没有什么能在家做的工作&nbsp;要稳定收入的？','0',0,4,'有没有什么能在家做的工作&nbsp;要稳定收入的？','0',1399276611,1,5,0,5),(47,'省会城市的私企工作经历算基层工作经历吗？','0',0,4,'&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;请不要粘贴基层工作经历的概念，就是因为不懂那些官话、组织指的是什么才问的。请就题答题，感谢！&lt;/span&gt;&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;&lt;/span&gt;','0',1399276682,1,5,0,5),(48,'根据现在国情什么工作比较有前景','0',0,4,'&lt;span&nbsp;style=&quot;font-size:16px;&quot;&gt;如题！&lt;/span&gt;','0',1399276718,1,5,0,5),(49,'汽车电控专业社会需求量怎么样','0',0,4,'汽车电控专业社会需求量怎么样？','0',1399276753,2,5,0,5),(50,'刚退伍回来30岁的男孩做什么工作好','0',0,4,'如题！','0',1399276793,2,5,0,5),(51,'不想上班了，做点什么干啊？都闲了一个月了，给个建议吧，前提我只有2万','0',0,4,'&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;不想上班了，做点什么干啊？都闲了一个月了，给个建议吧，前提我只有2万&lt;/span&gt;','0',1399276917,2,5,0,10),(52,'平安银行员工号12037290服务态度很差，像要然、杀人，这是什么世道！','0',0,4,'&lt;span&nbsp;style=&quot;font-size:14px;&quot;&gt;平安银行员工号12037290服务态度很差，像要然、杀人，这是什么世道！&lt;/span&gt;','0',1399276975,7,5,0,5);

/*Table structure for table `yrq_ask_sort` */

DROP TABLE IF EXISTS `yrq_ask_sort`;

CREATE TABLE `yrq_ask_sort` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `sort_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `parent_id` int(3) NOT NULL DEFAULT '0',
  `sequence` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `yrq_ask_sort` */

insert  into `yrq_ask_sort`(`id`,`sort_name`,`status`,`parent_id`,`sequence`) values (1,'生活','1',0,1),(2,'情感','1',0,2),(3,'健康','1',0,3),(4,'职场','1',0,4),(5,'公益','1',0,5);

/*Table structure for table `yrq_best` */

DROP TABLE IF EXISTS `yrq_best`;

CREATE TABLE `yrq_best` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(11) unsigned NOT NULL COMMENT '该条评论所在文章ID',
  `cid` int(11) unsigned NOT NULL COMMENT '该条评论的ID',
  `time` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `uid` int(11) unsigned NOT NULL COMMENT '该条评论的用户ID',
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `article_uid` int(11) unsigned NOT NULL COMMENT '该条评论所在的文章用户ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `yrq_best` */

insert  into `yrq_best`(`id`,`aid`,`cid`,`time`,`uid`,`status`,`article_uid`) values (1,13,2,'1399393755',4,'1',3),(2,12,3,'1399393889',4,'1',3),(3,10,6,'1399427712',4,'0',3);

/*Table structure for table `yrq_comment` */

DROP TABLE IF EXISTS `yrq_comment`;

CREATE TABLE `yrq_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(11) unsigned NOT NULL COMMENT '文章ID',
  `comment_uid` int(11) unsigned NOT NULL COMMENT '评论人ID',
  `pid` tinyint(1) NOT NULL DEFAULT '0' COMMENT '评论父ID',
  `time` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `reply_uid` int(11) NOT NULL DEFAULT '0' COMMENT '回复某个人的ID',
  `comment` text COLLATE utf8_unicode_ci NOT NULL COMMENT '评论内容',
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '默认是0 未读 1读了',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `yrq_comment` */

insert  into `yrq_comment`(`id`,`aid`,`comment_uid`,`pid`,`time`,`reply_uid`,`comment`,`status`) values (1,6,4,0,'1399274271',3,'教你在没有红酒开瓶器的情况下打开红酒的一个常用方法：右手拿住红酒瓶子中部，左手拿块折叠后稍湿厚毛巾垫在墙壁上，把瓶子在湿毛巾上用适当的力量砸下去，撞击几次后，因瓶里的红酒冲击瓶塞，瓶塞就会慢慢松动，滑向瓶口，出来有一段木塞时，再用手拔出。很多人都是用这样的方法开了瓶塞，屡试不爽。','1'),(2,13,4,0,'1399274346',3,'看过爱情公寓么&nbsp;若澜！！','0'),(3,12,4,0,'1399274389',3,'这个应该不能吧&nbsp;\r\n\r\n据说关机、开机其实还更耗电！！','1'),(4,12,3,3,'1399353486',4,'谢谢支招','1'),(5,12,4,3,'1399353524',3,'不客气','0'),(6,10,4,0,'1399427213',3,'帅气&nbsp;好看&nbsp;！！','1');

/*Table structure for table `yrq_letter` */

DROP TABLE IF EXISTS `yrq_letter`;

CREATE TABLE `yrq_letter` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `send_uid` int(11) unsigned NOT NULL,
  `receive_user` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` char(250) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `time` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `receive_uid` int(11) unsigned NOT NULL,
  `send_user` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 表示为读 1 表示读了',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `yrq_letter` */

insert  into `yrq_letter`(`id`,`send_uid`,`receive_user`,`title`,`content`,`time`,`receive_uid`,`send_user`,`status`) values (2,4,'支招','你好&nbsp;支招&nbsp;我是小妖','你好&nbsp;支招&nbsp;我是小妖&nbsp;测试','1399309112',1,'小妖','1'),(3,1,'小妖','嗯&nbsp;你好小妖&nbsp;我收到了','嗯&nbsp;你好小妖&nbsp;我收到了','1399309161',4,'支招','1');

/*Table structure for table `yrq_linktxt` */

DROP TABLE IF EXISTS `yrq_linktxt`;

CREATE TABLE `yrq_linktxt` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `link_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `link_url` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `sequence` int(3) NOT NULL DEFAULT '0',
  `explain` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `yrq_linktxt` */

insert  into `yrq_linktxt`(`id`,`link_name`,`link_url`,`status`,`sequence`,`explain`) values (10,'百度知道','http://zhidao.baidu.com/','1',0,'百度知道'),(11,'知乎','http://www.zhihu.com/','1',0,'知乎'),(12,'360问答','http://wenda.so.com/','1',0,'360问答'),(13,'sogou问问','http://wenwen.sogou.com/','1',0,'sogou问问'),(14,'搜狐问答','http://wenda.sohu.com/','1',0,'搜狐问答'),(15,'天涯问答','http://wenda.tianya.cn/','1',0,'天涯问答'),(16,'果壳问答','http://www.guokr.com/ask/','1',0,'果壳问答'),(17,'中华网问答','http://wenda.china.com/','1',0,'中华网问答');

/*Table structure for table `yrq_single` */

DROP TABLE IF EXISTS `yrq_single`;

CREATE TABLE `yrq_single` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `add_time` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `sort_id` int(5) NOT NULL DEFAULT '1',
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `yrq_single` */

insert  into `yrq_single`(`id`,`title`,`content`,`add_time`,`sort_id`,`status`) values (1,'关于我们','&lt;p&gt;\r\n	&lt;span&gt;&lt;span&nbsp;style=&quot;font-size:14px;line-height:21px;&quot;&gt;在支招网，您可以发布日常生活中遇到的各种问题，发布帖子，网友一起支招。努力营造一个互助友爱的问答社区，支招解答，一起成长。可以在后台单页管理那里修改。&lt;span&nbsp;style=&quot;font-size:14px;line-height:21px;&quot;&gt;发布帖子，网友一起支招。努力营造一个互助友爱的问答社区，支招解答，一起成长。可以在后台单页管理那里修改。&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br&nbsp;/&gt;\r\n&lt;/p&gt;','1396677142',1,'1');

/*Table structure for table `yrq_site` */

DROP TABLE IF EXISTS `yrq_site`;

CREATE TABLE `yrq_site` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `site_url` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cellphone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icp` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `third_code` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `yrq_site` */

insert  into `yrq_site`(`id`,`site_name`,`site_url`,`company`,`address`,`zipcode`,`telephone`,`cellphone`,`email`,`icp`,`third_code`) values (1,'支招网','www.zhizhao.cn','支招网','四川成都','610056','0825-88888888','13888138888','1907148656@qq.com','蜀ICP证0343434541号','');

/*Table structure for table `yrq_user` */

DROP TABLE IF EXISTS `yrq_user`;

CREATE TABLE `yrq_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(360) COLLATE utf8_unicode_ci NOT NULL,
  `reg_time` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_time` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lock` tinyint(1) DEFAULT '1' COMMENT '账号锁定 0锁定 1锁定',
  `pwd_token` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '修改密码激活码',
  `pwd_token_exptime` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '修改密码有效期',
  `introduce` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '这家伙有点懒，还没有写个性签名! ' COMMENT '个性签名',
  `face` varchar(250) COLLATE utf8_unicode_ci DEFAULT '__IMG__/face.jpg' COMMENT '头像180',
  `point` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '金币',
  `ask_num` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '问题数',
  `adopt_num` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '采纳数',
  `answer_num` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '回答数',
  `exp` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '经验',
  `login_ip` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `yrq_user` */

insert  into `yrq_user`(`id`,`username`,`password`,`reg_time`,`login_time`,`email`,`lock`,`pwd_token`,`pwd_token_exptime`,`introduce`,`face`,`point`,`ask_num`,`adopt_num`,`answer_num`,`exp`,`login_ip`) values (1,'支招','e10adc3949ba59abbe56e057f20f883e','1399272656','1399309133','14725836@qq.com',1,NULL,NULL,'这家伙有点懒，还没有写个性签名! ','__IMG__/face.jpg',120,14,0,0,77,'127.0.0.1'),(2,'支招网','e10adc3949ba59abbe56e057f20f883e','1399272687',NULL,'25764581@qq.com',1,NULL,NULL,'这家伙有点懒，还没有写个性签名! ','__IMG__/face.jpg',0,0,0,0,0,'127.0.0.1'),(3,'wulouzhe','e10adc3949ba59abbe56e057f20f883e','1399272728','1399439424','2644388745@qq.com',1,NULL,NULL,'这家伙有点懒，还没有写个性签名! ','/Uploads//Face/2014_05/tbl5367359b7154b.jpg',98,13,0,0,78,'127.0.0.1'),(4,'小妖','e10adc3949ba59abbe56e057f20f883e','1399272793','1399427178','7635197645@qq.com',1,NULL,NULL,'这家伙有点懒，还没有写个性签名! ','/Uploads//Face/2014_05/tbl53673afd8a95e.jpg',146,13,0,0,82,'127.0.0.1'),(5,'大妖','e10adc3949ba59abbe56e057f20f883e','1399276204','1399277675','2644388745@qq.com',1,NULL,NULL,'这家伙有点懒，还没有写个性签名! ','/Uploads//Face/2014_05/tbl536742c7c9f64.jpg',99,12,0,0,62,'127.0.0.1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
