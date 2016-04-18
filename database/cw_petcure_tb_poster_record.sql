CREATE DATABASE  IF NOT EXISTS `cw_petcure` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cw_petcure`;
-- MySQL dump 10.13  Distrib 5.6.19, for Win64 (x86_64)
--
-- Host: localhost    Database: cw_petcure
-- ------------------------------------------------------
-- Server version	5.6.21-enterprise-commercial-advanced-log

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
-- Table structure for table `tb_poster_record`
--

DROP TABLE IF EXISTS `tb_poster_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_poster_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poster_id` int(11) DEFAULT NULL,
  `pet_photo` varchar(255) DEFAULT NULL,
  `pet_detail` varchar(45) DEFAULT NULL,
  `rescue_type` varchar(2) DEFAULT NULL,
  `rescue_level` varchar(2) DEFAULT NULL,
  `rescue_address` varchar(255) DEFAULT NULL,
  `rescue_detail` varchar(255) DEFAULT NULL,
  `rescue_need` varchar(255) DEFAULT NULL,
  `contact_name` varchar(45) DEFAULT NULL,
  `contact_mobile` varchar(45) DEFAULT NULL,
  `contact_qq` varchar(45) DEFAULT NULL,
  `contact_wechat` varchar(45) DEFAULT NULL,
  `rescue_lat` varchar(45) DEFAULT NULL,
  `rescue_lng` varchar(45) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_poster_record`
--

LOCK TABLES `tb_poster_record` WRITE;
/*!40000 ALTER TABLE `tb_poster_record` DISABLE KEYS */;
INSERT INTO `tb_poster_record` VALUES (1,1,'0685cd2972e2a749d8854a5b984da6a6.jpg','','W','M','龙岗区建新路8号怡龙枫景园','','','','','','','22.728861','114.276887','2016-04-17'),(2,2,'0685cd2972e2a749d8854a5b984da6a6.jpg','','W','M','龙岗区建新路8号怡龙枫景园','','','','','','','22.729861','114.275887','2016-04-17'),(3,3,'0685cd2972e2a749d8854a5b984da6a6.jpg','','','M','','','','','','','','22.730861','114.276887','2016-04-17'),(4,4,'0685cd2972e2a749d8854a5b984da6a6.jpg','','W','C','龙岗区怡龙枫景园旁(龙岗大道南)','','','','','','','22.731861','114.276887','2016-04-17'),(5,5,'4ce2e8debc56b885295bdb5b399d0d44.jpeg','','W','C','地图中标识的点','','','','','','','22.720575764346595','114.27343368530273','2016-04-18'),(6,6,'227ff7070fa43c8c235b4e7e26188545.jpeg','黄色的中华田园犬','W','M','中国广东省深圳市福田区农轩路28号','就在路边，宾馆门口','','蔡','13751082562','','','22.53967147896989','114.0199327468872','2016-04-18'),(7,7,'5230b361333fbaf6d9221a6ee87e5e45.jpeg','','W','M','','','','','','','','0','0','2016-04-18'),(8,8,'01f67f652130b9b326929ba30dfe2b36.jpeg','','W','M','','','','','','','','0','0','2016-04-18'),(9,9,'288d74a4cd8265445bf9406a823e1390.jpeg','','W','M','中国广东省深圳市福田区','','','','','','','22.53507348402533','114.01888132095337','2016-04-18'),(10,10,'f1c0bd9e13777e2d71d7a3257a3099fb.jpeg','','H','M','','','','','','','','0','0','2016-04-18'),(11,11,'f902ada28b8393b61a8b51a265d80ca0.jpeg','','W','M','中国广东省深圳市福田区深南大道7888号','','','','','','','22.53622299711652','114.01986837387085','2016-04-18'),(12,12,'cfc870d971297eba9771f866387c0d97.jpeg','','W','M','中国广东省深圳市福田区','','','','','','','22.537035578183435','114.01834487915039','2016-04-18');
/*!40000 ALTER TABLE `tb_poster_record` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-18 16:47:17
