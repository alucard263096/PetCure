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
INSERT INTO `tb_poster` VALUES (1,'D','S','0685cd2972e2a749d8854a5b984da6a6.jpg','','W','M','龙岗区建新路8号怡龙枫景园','','','','','','','22.728861','114.276887','7b3d1eb9e94b33d313d06fcdbe001ec5','A','2016-04-17','2016-04-17'),(2,'D','S','0685cd2972e2a749d8854a5b984da6a6.jpg','','W','M','龙岗区建新路8号怡龙枫景园','','','','','','','22.729861','114.275887','d68d4c8ec837b2ebb588aa9f9de8548c','A','2016-04-17','2016-04-17'),(3,'','','0685cd2972e2a749d8854a5b984da6a6.jpg','','','M','','','','','','','','22.730861','114.276887','','A','2016-04-17','2016-04-17'),(4,'O','S','0685cd2972e2a749d8854a5b984da6a6.jpg','','W','C','龙岗区怡龙枫景园旁(龙岗大道南)','','','','','','','22.731861','114.276887','af6590b82c0e04ffc3a97da23f3d6e83','A','2016-04-17','2016-04-17'),(5,'D','S','4ce2e8debc56b885295bdb5b399d0d44.jpeg','','W','C','地图中标识的点','','','','','','','22.720575764346595','114.27343368530273','cc1186a78ce16f919d492e67378c7e8a','A','2016-04-18','2016-04-18'),(6,'D','S','227ff7070fa43c8c235b4e7e26188545.jpeg','黄色的中华田园犬','W','M','中国广东省深圳市福田区农轩路28号','就在路边，宾馆门口','','蔡','13751082562','','','22.53967147896989','114.0199327468872','89471d17aa27d37681551a2d990cfeaa','A','2016-04-18','2016-04-18'),(7,'D','S','5230b361333fbaf6d9221a6ee87e5e45.jpeg','','W','M','','','','','','','','0','0','0261230d3bfad629a708149e6b55b4e8','A','2016-04-18','2016-04-18'),(8,'D','S','01f67f652130b9b326929ba30dfe2b36.jpeg','','W','M','','','','','','','','0','0','f0787b401a78fb6e2c84448d546a9174','A','2016-04-18','2016-04-18'),(9,'D','S','288d74a4cd8265445bf9406a823e1390.jpeg','','W','M','中国广东省深圳市福田区','','','','','','','22.53507348402533','114.01888132095337','4a13a770203adec9472e79aa450d2568','A','2016-04-18','2016-04-18'),(10,'D','S','f1c0bd9e13777e2d71d7a3257a3099fb.jpeg','','H','M','','','','','','','','0','0','b04240ea9bef933cb20d671f2b3a54ca','A','2016-04-18','2016-04-18'),(11,'D','S','f902ada28b8393b61a8b51a265d80ca0.jpeg','','W','M','中国广东省深圳市福田区深南大道7888号','','','','','','','22.53622299711652','114.01986837387085','0599c287efcbf0be338e24d10357842c','A','2016-04-18','2016-04-18'),(12,'D','S','cfc870d971297eba9771f866387c0d97.jpeg','','W','M','中国广东省深圳市福田区','','','','','','','22.537035578183435','114.01834487915039','75e3ebe618d75bab11789e5068c4d659','A','2016-04-18','2016-04-18');
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

-- Dump completed on 2016-04-18 16:47:17
