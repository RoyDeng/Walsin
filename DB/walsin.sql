-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: walsin
-- ------------------------------------------------------
-- Server version	5.7.15-log

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
-- Table structure for table `ac`
--

DROP TABLE IF EXISTS `ac`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ac` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_time` datetime NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac`
--

LOCK TABLES `ac` WRITE;
/*!40000 ALTER TABLE `ac` DISABLE KEYS */;
INSERT INTO `ac` VALUES (1,'2016-12-29 14:35:22');
/*!40000 ALTER TABLE `ac` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ac_item`
--

DROP TABLE IF EXISTS `ac_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ac_item` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_id` int(11) NOT NULL,
  `i_id` int(11) NOT NULL,
  `i_num` int(11) NOT NULL,
  `i_defect` int(11) NOT NULL,
  PRIMARY KEY (`ad_id`,`a_id`,`i_id`),
  KEY `fk_ac_item_item1_idx` (`i_id`),
  KEY `fk_ac_item_ac1_idx` (`a_id`),
  CONSTRAINT `fk_ac_item_ac1` FOREIGN KEY (`a_id`) REFERENCES `ac` (`a_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ac_item_item1` FOREIGN KEY (`i_id`) REFERENCES `item` (`i_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_item`
--

LOCK TABLES `ac_item` WRITE;
/*!40000 ALTER TABLE `ac_item` DISABLE KEYS */;
INSERT INTO `ac_item` VALUES (1,1,1,1000,50);
/*!40000 ALTER TABLE `ac_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bom`
--

DROP TABLE IF EXISTS `bom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bom` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`b_id`,`o_id`),
  KEY `fk_bom_order1_idx` (`o_id`),
  CONSTRAINT `fk_bom_order1` FOREIGN KEY (`o_id`) REFERENCES `order` (`o_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bom`
--

LOCK TABLES `bom` WRITE;
/*!40000 ALTER TABLE `bom` DISABLE KEYS */;
INSERT INTO `bom` VALUES (1,'1712315659'),(2,'2202452612'),(3,'25212611583');
/*!40000 ALTER TABLE `bom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bom_item`
--

DROP TABLE IF EXISTS `bom_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bom_item` (
  `bom_id` int(11) NOT NULL AUTO_INCREMENT,
  `b_id` int(11) NOT NULL,
  `i_id` int(11) NOT NULL,
  `i_num` int(11) NOT NULL,
  PRIMARY KEY (`bom_id`,`b_id`,`i_id`),
  KEY `fk_bom_item_bom1_idx` (`b_id`),
  KEY `fk_bom_item_item1_idx` (`i_id`),
  CONSTRAINT `fk_bom_item_bom1` FOREIGN KEY (`b_id`) REFERENCES `bom` (`b_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_bom_item_item1` FOREIGN KEY (`i_id`) REFERENCES `item` (`i_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bom_item`
--

LOCK TABLES `bom_item` WRITE;
/*!40000 ALTER TABLE `bom_item` DISABLE KEYS */;
INSERT INTO `bom_item` VALUES (1,1,2,100),(2,2,1,80),(3,3,3,70);
/*!40000 ALTER TABLE `bom_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `c_tel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `c_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `c_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'彭于晏','02-4894620','台北市中正區','eddie@yahoo.com.tw'),(2,'何潤東','03-4256113','桃園市中壢區','peter@gmail.com'),(3,'吳建豪','02-4689345','台北市士林區','vanness@gmail.com');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dept`
--

DROP TABLE IF EXISTS `dept`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dept` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dept`
--

LOCK TABLES `dept` WRITE;
/*!40000 ALTER TABLE `dept` DISABLE KEYS */;
INSERT INTO `dept` VALUES (1,'生管課'),(2,'製造課'),(3,'倉儲課'),(4,'品管課');
/*!40000 ALTER TABLE `dept` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `error`
--

DROP TABLE IF EXISTS `error`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `error` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_time` datetime NOT NULL,
  `r_status` int(11) NOT NULL DEFAULT '0',
  `o_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`r_id`,`o_id`),
  KEY `fk_error_order1_idx` (`o_id`),
  CONSTRAINT `fk_error_order1` FOREIGN KEY (`o_id`) REFERENCES `order` (`o_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `error`
--

LOCK TABLES `error` WRITE;
/*!40000 ALTER TABLE `error` DISABLE KEYS */;
/*!40000 ALTER TABLE `error` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `i_id` int(11) NOT NULL AUTO_INCREMENT,
  `i_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`i_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'削皮棒'),(2,'冷精圓棒'),(3,'冷精異形棒');
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mo`
--

DROP TABLE IF EXISTS `mo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mo` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_date` date NOT NULL,
  PRIMARY KEY (`m_id`,`o_id`),
  KEY `fk_mo_order1_idx` (`o_id`),
  CONSTRAINT `fk_mo_order1` FOREIGN KEY (`o_id`) REFERENCES `order` (`o_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mo`
--

LOCK TABLES `mo` WRITE;
/*!40000 ALTER TABLE `mo` DISABLE KEYS */;
INSERT INTO `mo` VALUES (1,'2202452612','2016-12-27'),(2,'25212611583','2016-12-30'),(3,'1712315659','2016-12-30');
/*!40000 ALTER TABLE `mo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mo_item`
--

DROP TABLE IF EXISTS `mo_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mo_item` (
  `mo_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `w_id` int(11) NOT NULL,
  `m_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`mo_id`,`m_id`,`id`,`w_id`),
  KEY `fk_mo_item_mo1_idx` (`m_id`),
  KEY `fk_mo_item_users1_idx` (`id`),
  KEY `fk_mo_item_workstation1_idx` (`w_id`),
  CONSTRAINT `fk_mo_item_mo1` FOREIGN KEY (`m_id`) REFERENCES `mo` (`m_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mo_item_users1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mo_item_workstation1` FOREIGN KEY (`w_id`) REFERENCES `workstation` (`w_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mo_item`
--

LOCK TABLES `mo_item` WRITE;
/*!40000 ALTER TABLE `mo_item` DISABLE KEYS */;
INSERT INTO `mo_item` VALUES (1,3,4,2,0),(2,3,3,1,0),(3,3,2,3,0);
/*!40000 ALTER TABLE `mo_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `o_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `o_date` date NOT NULL,
  `c_id` int(11) NOT NULL,
  `o_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`o_id`,`c_id`),
  KEY `fk_order_client_idx` (`c_id`),
  CONSTRAINT `fk_order_client` FOREIGN KEY (`c_id`) REFERENCES `client` (`c_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES ('1712315659','2016-12-31',3,1),('2202452612','2016-12-27',1,0),('25212611583','2016-12-30',2,0);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_item`
--

DROP TABLE IF EXISTS `order_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_item` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `i_id` int(11) NOT NULL,
  `i_length` double NOT NULL,
  `i_diam` double NOT NULL,
  `i_num` int(11) NOT NULL,
  PRIMARY KEY (`order_id`,`o_id`,`i_id`),
  KEY `fk_order_item_item1_idx` (`i_id`),
  KEY `fk_order_item_order1_idx` (`o_id`),
  CONSTRAINT `fk_order_item_item1` FOREIGN KEY (`i_id`) REFERENCES `item` (`i_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_item_order1` FOREIGN KEY (`o_id`) REFERENCES `order` (`o_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_item`
--

LOCK TABLES `order_item` WRITE;
/*!40000 ALTER TABLE `order_item` DISABLE KEYS */;
INSERT INTO `order_item` VALUES (1,'2202452612',1,10,18.5,50),(2,'25212611583',2,8,63.2,80),(3,'1712315659',3,12,45.7,60);
/*!40000 ALTER TABLE `order_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `place`
--

DROP TABLE IF EXISTS `place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `place` (
  `pa_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `place`
--

LOCK TABLES `place` WRITE;
/*!40000 ALTER TABLE `place` DISABLE KEYS */;
INSERT INTO `place` VALUES (1,0),(2,0),(3,0),(4,0),(5,0),(6,0),(7,0),(8,0),(9,0),(10,0);
/*!40000 ALTER TABLE `place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `po`
--

DROP TABLE IF EXISTS `po`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `po` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_date` date NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `po`
--

LOCK TABLES `po` WRITE;
/*!40000 ALTER TABLE `po` DISABLE KEYS */;
INSERT INTO `po` VALUES (1,'2016-12-28'),(2,'2016-12-30'),(3,'2016-12-31');
/*!40000 ALTER TABLE `po` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `po_item`
--

DROP TABLE IF EXISTS `po_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `po_item` (
  `po_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `i_num` int(11) NOT NULL,
  `i_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`po_id`,`p_id`,`b_id`),
  KEY `fk_po_item_po1_idx` (`p_id`),
  KEY `fk_po_item_bom_item1_idx` (`b_id`),
  CONSTRAINT `fk_po_item_bom_item1` FOREIGN KEY (`b_id`) REFERENCES `bom_item` (`b_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_po_item_po1` FOREIGN KEY (`p_id`) REFERENCES `po` (`p_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `po_item`
--

LOCK TABLES `po_item` WRITE;
/*!40000 ALTER TABLE `po_item` DISABLE KEYS */;
INSERT INTO `po_item` VALUES (1,1,1,100,0),(2,2,2,80,1),(3,3,3,70,1);
/*!40000 ALTER TABLE `po_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps`
--

DROP TABLE IF EXISTS `ps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps` (
  `ps_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_date` date NOT NULL,
  PRIMARY KEY (`ps_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps`
--

LOCK TABLES `ps` WRITE;
/*!40000 ALTER TABLE `ps` DISABLE KEYS */;
INSERT INTO `ps` VALUES (1,'2016-12-26'),(2,'2016-12-30'),(3,'2016-12-31');
/*!40000 ALTER TABLE `ps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_item`
--

DROP TABLE IF EXISTS `ps_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_item` (
  `pi_id` int(11) NOT NULL AUTO_INCREMENT,
  `ps_id` int(11) NOT NULL,
  `o_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `o_reach` double NOT NULL,
  `o_defect` double NOT NULL,
  PRIMARY KEY (`pi_id`,`ps_id`,`o_id`),
  KEY `fk_ps_item_ps1_idx` (`ps_id`),
  KEY `fk_ps_item_order1_idx` (`o_id`),
  CONSTRAINT `fk_ps_item_order1` FOREIGN KEY (`o_id`) REFERENCES `order` (`o_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ps_item_ps1` FOREIGN KEY (`ps_id`) REFERENCES `ps` (`ps_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_item`
--

LOCK TABLES `ps_item` WRITE;
/*!40000 ALTER TABLE `ps_item` DISABLE KEYS */;
INSERT INTO `ps_item` VALUES (1,1,'2202452612',0,0.05),(2,2,'25212611583',0,0.03),(3,3,'1712315659',0,0.04);
/*!40000 ALTER TABLE `ps_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_date` date NOT NULL,
  `s_type` int(11) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock`
--

LOCK TABLES `stock` WRITE;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` VALUES (1,'2016-12-28',1),(2,'2016-12-28',2),(3,'2016-12-29',3),(4,'2016-12-29',2),(5,'2016-12-29',3),(6,'2016-12-30',4),(7,'2016-12-30',5),(8,'2016-12-31',6),(9,'2016-12-31',5),(10,'2016-12-31',4);
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_item`
--

DROP TABLE IF EXISTS `stock_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_item` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) NOT NULL,
  `i_id` int(11) NOT NULL,
  `i_num` int(11) NOT NULL,
  `i_status` int(11) NOT NULL DEFAULT '0',
  `pa_id` int(11) NOT NULL,
  PRIMARY KEY (`stock_id`,`s_id`,`i_id`,`pa_id`),
  KEY `fk_stock_item_item1_idx` (`i_id`),
  KEY `fk_stock_item_stock1_idx` (`s_id`),
  KEY `fk_stock_item_warehouse_item1_idx` (`pa_id`),
  CONSTRAINT `fk_stock_item_item1` FOREIGN KEY (`i_id`) REFERENCES `item` (`i_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_stock_item_stock1` FOREIGN KEY (`s_id`) REFERENCES `stock` (`s_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_stock_item_warehouse_item1` FOREIGN KEY (`pa_id`) REFERENCES `warehouse_item` (`pa_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_item`
--

LOCK TABLES `stock_item` WRITE;
/*!40000 ALTER TABLE `stock_item` DISABLE KEYS */;
INSERT INTO `stock_item` VALUES (1,1,1,60,0,1),(2,2,2,70,0,1),(3,3,2,60,1,1),(4,4,1,66,0,1),(5,5,3,90,1,1),(6,6,2,61,1,1),(7,7,2,90,1,1),(8,8,1,84,0,1),(9,9,3,82,0,1),(10,10,1,67,1,1);
/*!40000 ALTER TABLE `stock_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `d_id` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`d_id`),
  KEY `fk_users_dept1_idx` (`d_id`),
  CONSTRAINT `fk_users_dept1` FOREIGN KEY (`d_id`) REFERENCES `dept` (`d_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,3,'林俊傑','jj@yahoo.com.tw','$2y$10$6xiJVhySVnJGrAv5Lyuovejr6GqiCI1e6.3zt6k0yzvHbqnT9O.ZW','5AFTWEQEyAwMvWG2OS0llHNPXfQQy2uiZCXQQtuD6DHHUiZxK20PCXH00HGx','2016-12-27 00:18:19','2016-12-27 00:24:52'),(3,4,'王力宏','leehom@yahoo.com.tw','$2y$10$d9eac/c.73nnqmS8xU41puukti/ONKwAbjLQH/VumPifRHDEJjej2','qm9YD9VWoLddC2EXoka0l2oGINLkh86UULWgtIYO9DxPZ2Q0gLUU1Y0Iqafq','2016-12-27 00:28:26','2016-12-27 00:29:31'),(4,1,'周杰倫','test@yahoo.com.tw','$2y$10$z5XAtnVCnF6CIvH5T2hcjO4Z8WVPnpHZ8cFGN4WTH.N5GoLlOyx3C','lQmDeC5FDvqqcl8L77MPrZ298MVKGXcp1opMYGXzdKdtyHvvzJwxIZt93CXz','2017-01-14 14:14:41','2017-01-14 15:47:01'),(4,2,'周湯豪','nick@yahoo.com.tw','$2y$10$BP3BRmJNgZ41zJZfZrQpWeUDOIP5iaPbYTJLn/RKm4NE4xUkmrqG2','lQmDeC5FDvqqcl8L77MPrZ298MVKGXcp1opMYGXzdKdtyHvvzJwxIZt93CXz','2017-01-13 03:22:28','2017-01-14 15:47:01');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouse`
--

DROP TABLE IF EXISTS `warehouse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warehouse` (
  `h_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`h_id`)
) ENGINE=InnoDB AUTO_INCREMENT=303 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouse`
--

LOCK TABLES `warehouse` WRITE;
/*!40000 ALTER TABLE `warehouse` DISABLE KEYS */;
INSERT INTO `warehouse` VALUES (101),(102),(201),(202),(301),(302);
/*!40000 ALTER TABLE `warehouse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouse_item`
--

DROP TABLE IF EXISTS `warehouse_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warehouse_item` (
  `wh_id` int(11) NOT NULL AUTO_INCREMENT,
  `h_id` int(11) NOT NULL,
  `pa_id` int(11) NOT NULL,
  PRIMARY KEY (`wh_id`,`h_id`,`pa_id`),
  KEY `fk_warehouse_item_warehouse1_idx` (`h_id`),
  KEY `fk_warehouse_item_place1_idx` (`pa_id`),
  CONSTRAINT `fk_warehouse_item_place1` FOREIGN KEY (`pa_id`) REFERENCES `place` (`pa_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_warehouse_item_warehouse1` FOREIGN KEY (`h_id`) REFERENCES `warehouse` (`h_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouse_item`
--

LOCK TABLES `warehouse_item` WRITE;
/*!40000 ALTER TABLE `warehouse_item` DISABLE KEYS */;
INSERT INTO `warehouse_item` VALUES (1,101,1),(2,102,2);
/*!40000 ALTER TABLE `warehouse_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workstation`
--

DROP TABLE IF EXISTS `workstation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `workstation` (
  `w_id` int(11) NOT NULL AUTO_INCREMENT,
  `front_h_id` int(11) NOT NULL,
  `back_h_id` int(11) NOT NULL,
  `s_status` int(11) NOT NULL DEFAULT '0',
  `s_max_temp` double DEFAULT NULL,
  `s_min_temp` double DEFAULT NULL,
  `s_real_temp` double DEFAULT NULL,
  PRIMARY KEY (`w_id`,`front_h_id`,`back_h_id`),
  KEY `fk_workstation_warehouse1_idx` (`front_h_id`),
  KEY `fk_workstation_warehouse2_idx` (`back_h_id`),
  CONSTRAINT `fk_workstation_warehouse1` FOREIGN KEY (`front_h_id`) REFERENCES `warehouse` (`h_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_workstation_warehouse2` FOREIGN KEY (`back_h_id`) REFERENCES `warehouse` (`h_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workstation`
--

LOCK TABLES `workstation` WRITE;
/*!40000 ALTER TABLE `workstation` DISABLE KEYS */;
INSERT INTO `workstation` VALUES (1,101,102,0,30,20,NULL),(2,201,202,0,40,15,NULL),(3,301,302,0,40,10,NULL);
/*!40000 ALTER TABLE `workstation` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-16 13:57:20
