CREATE DATABASE  IF NOT EXISTS `cw_petcure` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cw_petcure`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: www.myhkdoc.com    Database: cw_petcure
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
-- Table structure for table `tb_poster`
--

DROP TABLE IF EXISTS `tb_poster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_poster` (
  `id` int(11) NOT NULL,
  `pet_type` varchar(2) DEFAULT NULL,
  `pet_size` varchar(45) DEFAULT NULL,
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
  `verify` varchar(45) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_poster`
--

LOCK TABLES `tb_poster` WRITE;
/*!40000 ALTER TABLE `tb_poster` DISABLE KEYS */;
INSERT INTO `tb_poster` VALUES (1,'D','S','0685cd2972e2a749d8854a5b984da6a6.jpg','','W','M','龙岗区建新路8号怡龙枫景园','','','','','','','22.728861','114.276887','7b3d1eb9e94b33d313d06fcdbe001ec5','A','2016-04-17','2016-04-17'),(2,'D','S','0685cd2972e2a749d8854a5b984da6a6.jpg','','W','M','龙岗区建新路8号怡龙枫景园','','','','','','','22.729861','114.275887','d68d4c8ec837b2ebb588aa9f9de8548c','A','2016-04-17','2016-04-17'),(3,'','','0685cd2972e2a749d8854a5b984da6a6.jpg','','','M','','','','','','','','22.730861','114.276887','','A','2016-04-17','2016-04-17'),(4,'O','S','0685cd2972e2a749d8854a5b984da6a6.jpg','','W','C','龙岗区怡龙枫景园旁(龙岗大道南)','','','','','','','22.731861','114.276887','af6590b82c0e04ffc3a97da23f3d6e83','A','2016-04-17','2016-04-17'),(5,'D','S','4ce2e8debc56b885295bdb5b399d0d44.jpeg','','W','C','地图中标识的点','','','','','','','22.720575764346595','114.27343368530273','cc1186a78ce16f919d492e67378c7e8a','A','2016-04-18','2016-04-18');
/*!40000 ALTER TABLE `tb_poster` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-18  1:08:16
