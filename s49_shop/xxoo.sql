-- MySQL dump 10.16  Distrib 10.1.9-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: s49_shop
-- ------------------------------------------------------
-- Server version	10.1.9-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `shop_cart`
--

DROP TABLE IF EXISTS `shop_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_cart` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned DEFAULT NULL,
  `gid` int(10) unsigned NOT NULL,
  `cnt` tinyint(4) DEFAULT NULL,
  `otime` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_cart`
--

LOCK TABLES `shop_cart` WRITE;
/*!40000 ALTER TABLE `shop_cart` DISABLE KEYS */;
INSERT INTO `shop_cart` VALUES (38,15,21,1,NULL),(39,15,21,1,NULL),(45,15,19,1,NULL),(46,15,19,1,NULL),(47,15,18,1,NULL),(48,15,18,1,NULL),(49,15,18,1,NULL),(50,15,18,1,NULL),(51,15,18,1,NULL),(52,15,18,1,NULL),(53,15,18,1,NULL),(54,15,18,1,NULL),(55,15,18,1,NULL),(56,15,18,1,NULL),(57,15,18,1,NULL),(58,15,18,1,NULL),(59,15,18,1,NULL),(60,15,18,1,NULL),(61,15,18,1,NULL),(62,15,18,1,NULL),(63,15,18,1,NULL),(64,15,18,1,NULL),(65,15,18,1,NULL),(66,15,18,1,NULL),(67,15,18,1,NULL),(68,15,18,1,NULL),(69,15,18,1,NULL),(70,15,18,1,NULL),(71,15,18,1,NULL),(72,15,18,1,NULL),(73,15,18,1,NULL),(74,15,18,1,NULL),(75,15,18,1,NULL),(76,15,18,1,NULL),(77,15,18,1,NULL),(78,15,18,1,NULL),(79,15,18,1,NULL),(80,15,18,1,NULL),(81,15,18,1,NULL),(82,15,18,1,NULL),(83,15,18,1,NULL),(84,15,19,1,NULL),(85,15,19,1,NULL),(86,15,19,1,NULL),(87,15,19,1,NULL),(88,15,19,1,NULL),(89,15,19,1,NULL),(90,15,19,1,NULL),(91,15,19,1,NULL);
/*!40000 ALTER TABLE `shop_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_detail`
--

DROP TABLE IF EXISTS `shop_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_detail` (
  `did` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `oid` char(18) DEFAULT NULL,
  `gid` int(10) unsigned NOT NULL,
  `buyprice` decimal(6,2) DEFAULT NULL,
  `buycnt` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_detail`
--

LOCK TABLES `shop_detail` WRITE;
/*!40000 ALTER TABLE `shop_detail` DISABLE KEYS */;
INSERT INTO `shop_detail` VALUES (1,'201607081036059093',23,998.00,2),(2,'201607081036059093',30,2998.00,1),(3,'201607081048095158',23,998.00,4),(4,'201607081051523599',23,998.00,1),(5,'201607081057296773',23,998.00,1),(6,'201607081144044880',22,145.00,2),(7,'201607081217109718',23,998.00,3),(8,'201607081217109718',24,3000.00,4),(9,'201607091244327081',19,998.00,1),(10,'201607091244327081',21,145.00,1),(11,'201607091244327081',24,3000.00,1),(12,'201607101508581384',29,123.00,1),(13,'201607101700437286',19,998.00,2),(14,'201607101849007957',19,998.00,5),(15,'201607101849007957',20,3000.00,1),(16,'201607111033102418',20,3000.00,1),(17,'201607111056356511',21,145.00,1),(18,'201607111103343999',29,123.00,1),(19,'201607111149176368',24,3000.00,1),(20,'201607111213248263',21,145.00,1),(21,'201607111359469803',20,3000.00,1),(22,'201607111404478661',25,145.00,1),(23,'201607111416083501',24,3000.00,1),(24,'201607111545437918',20,3000.00,1),(25,'201607111548177948',27,123.00,1),(26,'201607111616029241',18,145.00,2),(27,'201607111818409670',23,998.00,1),(28,'201607111827201792',20,3000.00,2),(29,'201607111842305311',21,145.00,2),(30,'201607111849434261',20,3000.00,1),(31,'201607111850102173',21,145.00,1),(32,'201607111851196532',19,998.00,1),(33,'201607111905094043',19,998.00,1),(34,'201607111907065602',20,3000.00,1),(35,'201607111907587104',20,3000.00,1),(36,'201607111922456991',20,3000.00,2),(37,'201607111955482685',20,3000.00,1),(38,'201607111959238608',21,145.00,1),(39,'201607111959238608',19,998.00,1),(40,'201607112015585958',20,3000.00,3),(41,'201607112015585958',19,998.00,2),(42,'201607112015585958',21,145.00,1);
/*!40000 ALTER TABLE `shop_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_goods`
--

DROP TABLE IF EXISTS `shop_goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_goods` (
  `gid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gname` varchar(120) NOT NULL,
  `tid` int(10) unsigned DEFAULT '0',
  `price` decimal(6,2) DEFAULT '0.00',
  `cnt` int(11) DEFAULT '0',
  `scnt` int(10) unsigned DEFAULT '0',
  `vcnt` int(10) unsigned DEFAULT '0',
  `gpic` varchar(100) DEFAULT NULL,
  `gdesc` varchar(500) DEFAULT '0',
  `status` int(10) unsigned DEFAULT '1',
  `ctime` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_goods`
--

LOCK TABLES `shop_goods` WRITE;
/*!40000 ALTER TABLE `shop_goods` DISABLE KEYS */;
INSERT INTO `shop_goods` VALUES (18,'大布娃娃一枚',18,145.00,10,2,2,'201607052315106406.png','0',1,1467731710),(19,'小飞机一枚',18,998.00,-7,13,23,'201607052315333075.png','0',1,1467731733),(20,'旺财俩只萌萌哒',18,3000.00,-3,15,16,'201607052315531395.png','0',1,1467731753),(21,'萌娃娃2一对',18,145.00,0,8,11,'201607052316158923.png','0',1,1467731775),(22,'美女一枚',16,145.00,10,2,69,'201607061006123985.png','0',1,1467770772),(23,'情侣一对',16,998.00,21,12,50,'201607061006294903.png','0',1,1467770789),(24,'御姐一枚',16,3000.00,-1,7,15,'201607061006486497.png','0',1,1467770808),(25,'少妇一枚',16,145.00,8,1,1,'201607061007105330.png','0',1,1467770830),(26,'美女眼镜',17,145.00,12,0,18,'201607061019384601.png','0',1,1467771578),(27,'情侣眼镜',17,123.00,11,1,4,'201607061020419789.png','0',1,1467771641),(28,'精品男镜',17,222.00,12,0,1,'201607061021021999.png','0',1,1467771662),(29,'酷炫眼镜',17,123.00,10,2,2,'201607061021306886.png','0',1,1467771690),(30,'电视一枚',13,2998.00,5,1,1,'201607061651409176.png','0',1,1467795100);
/*!40000 ALTER TABLE `shop_goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_orders`
--

DROP TABLE IF EXISTS `shop_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_orders` (
  `oid` char(18) NOT NULL,
  `ormb` decimal(9,2) NOT NULL,
  `uid` int(10) unsigned DEFAULT NULL,
  `rec` varchar(15) DEFAULT NULL,
  `addr` varchar(100) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `status` int(10) unsigned DEFAULT NULL,
  `umsg` varchar(255) DEFAULT NULL,
  `otime` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_orders`
--

LOCK TABLES `shop_orders` WRITE;
/*!40000 ALTER TABLE `shop_orders` DISABLE KEYS */;
INSERT INTO `shop_orders` VALUES ('201607111956077369',3000.00,40,'123','123','123',1,NULL,1468238167),('201607111956132331',3000.00,40,'123','123','123',1,NULL,1468238173),('201607112015585958',11141.00,15,'小冯冯','山西太原','123456789123',1,NULL,1468239358);
/*!40000 ALTER TABLE `shop_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_type`
--

DROP TABLE IF EXISTS `shop_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_type` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tname` varchar(120) NOT NULL,
  `pid` int(10) unsigned DEFAULT '0',
  `path` varchar(120) DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_type`
--

LOCK TABLES `shop_type` WRITE;
/*!40000 ALTER TABLE `shop_type` DISABLE KEYS */;
INSERT INTO `shop_type` VALUES (11,'首页',0,'0,'),(12,'益智玩具',0,'0,'),(13,'电子玩具',0,'0,'),(14,'毛绒玩具',0,'0,'),(16,'春夏服装',0,'0,'),(17,'精品眼镜',0,'0,'),(18,'娃娃',14,'0,14,'),(19,'飞机',14,'0,14,'),(20,'车模导航',0,'0,');
/*!40000 ALTER TABLE `shop_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_users`
--

DROP TABLE IF EXISTS `shop_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uname` char(20) NOT NULL,
  `upwd` char(32) NOT NULL,
  `sex` enum('w','m','x') DEFAULT 'w',
  `uface` varchar(50) DEFAULT NULL,
  `birth` int(10) unsigned DEFAULT '0',
  `tel` varchar(15) DEFAULT 'unknow',
  `addr` varchar(100) DEFAULT 'unknow',
  `email` varchar(30) DEFAULT 'unknow',
  `regtime` int(10) unsigned DEFAULT NULL,
  `auth` int(10) unsigned DEFAULT '1',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_users`
--

LOCK TABLES `shop_users` WRITE;
/*!40000 ALTER TABLE `shop_users` DISABLE KEYS */;
INSERT INTO `shop_users` VALUES (2,'冯冯','827ccb0eea8a706c4c34a16891f84e7b','m',NULL,0,'unknow','unknow','unknow',NULL,1),(3,'念念','827ccb0eea8a706c4c34a16891f84e7b','w',NULL,0,'unknow','unknow','unknow',NULL,1),(4,'管理','827ccb0eea8a706c4c34a16891f84e7b','m',NULL,0,'unknow','unknow','unknow',NULL,1),(5,'阿里路亚','202cb962ac59075b964b07152d234b70','x',NULL,0,'unknow','unknow','unknow',NULL,1),(9,'123','12345','w',NULL,0,'unknow','unknow','unknow',NULL,1),(10,'123','12345','w',NULL,0,'unknow','unknow','unknow',NULL,1),(13,'admin','12345','w',NULL,0,'unknow','unknow','unknow',NULL,1),(15,'管理1','827ccb0eea8a706c4c34a16891f84e7b','m',NULL,0,'unknow','山西','unknow',NULL,2),(16,'12312312','123','w',NULL,0,'unknow','unknow','unknow',NULL,1),(17,'12312312','123','w',NULL,0,'unknow','unknow','unknow',NULL,1),(18,'123123','123','w',NULL,0,'unknow','unknow','unknow',NULL,1),(19,'我是管理员','12345','w',NULL,0,'unknow','unknow','unknow',NULL,1),(20,'我是管理员2','12345','w',NULL,0,'unknow','unknow','unknow',NULL,1),(21,'A级','202cb962ac59075b964b07152d234b70','w',NULL,0,'unknow','unknow','unknow',NULL,1),(40,'','','w',NULL,0,'unknow','unknow','unknow',NULL,1),(41,'123123','202cb962ac59075b964b07152d234b70','w',NULL,0,'unknow','unknow','unknow',NULL,1),(42,'12312312','202cb962ac59075b964b07152d234b70','w',NULL,0,'unknow','unknow','unknow',NULL,1),(43,'12312312','1b2de2499e5f93e00a5a90e79a9da4b1','w',NULL,0,'unknow','unknow','unknow',NULL,1),(44,'adahdj','202cb962ac59075b964b07152d234b70','w',NULL,0,'unknow','unknow','unknow',NULL,1),(45,'adahdj','202cb962ac59075b964b07152d234b70','w',NULL,0,'unknow','unknow','unknow',NULL,1),(46,'qwe11','202cb962ac59075b964b07152d234b70','w',NULL,0,'unknow','unknow','unknow',NULL,1),(47,'qaz','202cb962ac59075b964b07152d234b70','w',NULL,0,'unknow','unknow','unknow',NULL,1),(48,'qas','202cb962ac59075b964b07152d234b70','w',NULL,0,'unknow','unknow','unknow',NULL,1),(49,'mnb','202cb962ac59075b964b07152d234b70','w',NULL,0,'unknow','unknow','unknow',NULL,1),(50,'我我我','202cb962ac59075b964b07152d234b70','w',NULL,0,'unknow','unknow','unknow',NULL,1),(51,'小小','202cb962ac59075b964b07152d234b70','w',NULL,0,'unknow','unknow','unknow',NULL,2),(52,'我叫小小小','202cb962ac59075b964b07152d234b70','w',NULL,0,'unknow','unknow','unknow',NULL,2),(53,'ts1','827ccb0eea8a706c4c34a16891f84e7b','m',NULL,0,'unknow','山西','unknow',NULL,1);
/*!40000 ALTER TABLE `shop_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-13 10:15:19
