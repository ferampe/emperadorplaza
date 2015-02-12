-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: cms_peruforless
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

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
-- Table structure for table `additional`
--

DROP TABLE IF EXISTS `additional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `additional` (
  `additional_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `anchor` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `removed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `removed_at` datetime NOT NULL,
  PRIMARY KEY (`additional_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `additional`
--

LOCK TABLES `additional` WRITE;
/*!40000 ALTER TABLE `additional` DISABLE KEYS */;
INSERT INTO `additional` VALUES (1,1,'MassageEdited','Cusco Additional Services',1,0,'2014-12-10 20:27:09','2014-12-10 20:28:42','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `additional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `additional_items`
--

DROP TABLE IF EXISTS `additional_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `additional_items` (
  `additional_items_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `additional_id` int(10) unsigned NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `anchor` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `order` int(11) NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '1',
  `removed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`additional_items_id`),
  KEY `additional_items_additional_id_foreign` (`additional_id`),
  CONSTRAINT `additional_items_additional_id_foreign` FOREIGN KEY (`additional_id`) REFERENCES `additional` (`additional_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `additional_items`
--

LOCK TABLES `additional_items` WRITE;
/*!40000 ALTER TABLE `additional_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `additional_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `additional_packages`
--

DROP TABLE IF EXISTS `additional_packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `additional_packages` (
  `additional_id` int(10) unsigned NOT NULL,
  `package_id` int(10) unsigned NOT NULL,
  `order` int(11) NOT NULL,
  KEY `additional_packages_additional_id_foreign` (`additional_id`),
  KEY `additional_packages_package_id_foreign` (`package_id`),
  CONSTRAINT `additional_packages_additional_id_foreign` FOREIGN KEY (`additional_id`) REFERENCES `additional` (`additional_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `additional_packages_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`package_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `additional_packages`
--

LOCK TABLES `additional_packages` WRITE;
/*!40000 ALTER TABLE `additional_packages` DISABLE KEYS */;
/*!40000 ALTER TABLE `additional_packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assigned_roles`
--

DROP TABLE IF EXISTS `assigned_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assigned_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `assigned_roles_user_id_foreign` (`user_id`),
  KEY `assigned_roles_role_id_foreign` (`role_id`),
  CONSTRAINT `assigned_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `assigned_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assigned_roles`
--

LOCK TABLES `assigned_roles` WRITE;
/*!40000 ALTER TABLE `assigned_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `assigned_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories_packages`
--

DROP TABLE IF EXISTS `categories_packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories_packages` (
  `category_package_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `parent` int(11) NOT NULL DEFAULT '0',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `removed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `removed_at` datetime NOT NULL,
  PRIMARY KEY (`category_package_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories_packages`
--

LOCK TABLES `categories_packages` WRITE;
/*!40000 ALTER TABLE `categories_packages` DISABLE KEYS */;
INSERT INTO `categories_packages` VALUES (1,1,'Lima tours Edited','lima-tours','','','','',0,0,0,0,0,0,'2014-12-10 20:29:37','2014-12-10 20:36:50','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `categories_packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories_packages_packages`
--

DROP TABLE IF EXISTS `categories_packages_packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories_packages_packages` (
  `category_package_id` int(10) unsigned NOT NULL,
  `package_id` int(10) unsigned NOT NULL,
  `order` int(11) NOT NULL,
  KEY `categories_packages_packages_category_package_id_foreign` (`category_package_id`),
  KEY `categories_packages_packages_package_id_foreign` (`package_id`),
  CONSTRAINT `categories_packages_packages_category_package_id_foreign` FOREIGN KEY (`category_package_id`) REFERENCES `categories_packages` (`category_package_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `categories_packages_packages_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`package_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories_packages_packages`
--

LOCK TABLES `categories_packages_packages` WRITE;
/*!40000 ALTER TABLE `categories_packages_packages` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories_packages_packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `country_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'Peru','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Argentina','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Brazil','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'Galapagos','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'Costarica','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'Chile','0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,'Luxury','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `destinations`
--

DROP TABLE IF EXISTS `destinations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `destinations` (
  `destination_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned NOT NULL,
  `title_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `open_graft_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `open_graft_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `open_graft_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `open_graft_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `open_graft_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_card` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_creator` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `removed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `removed_at` datetime NOT NULL,
  PRIMARY KEY (`destination_id`),
  KEY `destinations_country_id_foreign` (`country_id`),
  CONSTRAINT `destinations_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `destinations`
--

LOCK TABLES `destinations` WRITE;
/*!40000 ALTER TABLE `destinations` DISABLE KEYS */;
INSERT INTO `destinations` VALUES (1,1,'','','','','','','','','','','','','','','Name','<p>content</p>\r\n',0,0,'2014-12-09 04:02:51','2014-12-09 04:02:51','0000-00-00 00:00:00'),(2,1,'','','','','','','','','','','','','','','stuff','<p>content</p>\r\n',0,0,'2014-12-09 04:21:27','2014-12-09 04:21:27','0000-00-00 00:00:00'),(3,1,'','','','things','','','','','','','','','','','Things','',0,0,'2014-12-09 05:13:06','2014-12-09 05:13:06','0000-00-00 00:00:00'),(4,1,'','','','asdfasdfasdf','','','','','','','','','','','asdfasdfasdf','',0,1,'2014-12-09 05:15:26','2014-12-09 21:50:57','2014-12-09 16:50:57');
/*!40000 ALTER TABLE `destinations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `destinations_for_hotels`
--

DROP TABLE IF EXISTS `destinations_for_hotels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `destinations_for_hotels` (
  `destination_for_hotel_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned NOT NULL,
  `destination_id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `order` int(11) DEFAULT NULL,
  `title_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `open_graft_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `open_graft_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `open_graft_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `open_graft_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `open_graft_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_card` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_creator` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `removed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `removed_at` datetime NOT NULL,
  PRIMARY KEY (`destination_for_hotel_id`),
  KEY `destinations_for_hotels_country_id_foreign` (`country_id`),
  CONSTRAINT `destinations_for_hotels_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `destinations_for_hotels`
--

LOCK TABLES `destinations_for_hotels` WRITE;
/*!40000 ALTER TABLE `destinations_for_hotels` DISABLE KEYS */;
INSERT INTO `destinations_for_hotels` VALUES (1,1,0,'Destination Name','Our team of travel experts has carefully selected the Peru For Less Top Hotel Picks based on their excellent value and high standards.  (Lower Prices + Top Service = Best Value). We can book ANY hotel for you at competitive rates, but published prices are based on the Peru For Less Top Hotel Picks. We offer fantastic hotels for all budgets in various categories: 5-star, 4-star, 3-star, and 2-star hotels.',NULL,'Peru Hotels: Cusco Hotels | Peru Vacations by Peru For Less','Explore the seat of the Inca Empire and stay in one of our recommended Cusco hotels, selected for their excellent service by experts at Peru For Less.','','hotels-cusco.php','','','','','','','','','','',0,0,'0000-00-00 00:00:00','2014-12-10 01:44:40','0000-00-00 00:00:00'),(2,1,0,'Machu Picchu Hotels','Our team of travel experts has carefully selected the Peru For Less Top Hotel Picks based on their excellent value and high standards. (Lower Prices + Top Service = Best Value). We can book ANY hotel for you at competitive rates, but published prices are based on the Peru For Less Top Hotel Picks. We offer excellent hotels for all budgets in various categories: 5-star, 4-star, 3-star and 2-star hotels.',NULL,'Peru Hotels: Machu Picchu Hotels | Peru Vacations by Peru For Less','Complete your Machu Picchu tour with a stay in the comfortable hotels, from 2 to 5-star, recommended by our Peru For Less travel experts.',NULL,'hotels-machu-picchu.php',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,1,0,'Sacred Valley Hotels','Our team of travel experts has carefully selected the Peru For Less Top Hotel Picks based on their excellent value and high standards. (Lower Prices + Top Service = Best Value). We can book ANY hotel for you at competitive rates, but published prices are based on the Peru For Less Top Hotel Picks. We offer excellent hotels for all budgets in various categories: 5-star, 4-star and 3-star hotels.',NULL,'Peru Hotels: Sacred Valley Hotels | Peru Vacations by Peru For Less','Discover Peru in style and stay in one of our recommended Sacred Valley Hotels on your Sacred Valley tour, selected by experts at Peru For Less.',NULL,'hotels-sacred-valley.php',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,1,0,'Arequipa Hotels','Our team of travel experts has carefully selected the Peru For Less Top Hotel Picks based on their excellent value and high standards.  (Lower Prices + Top Service = Best Value). We can book ANY hotel for you at competitive rates, but published prices are based on the Peru For Less Top Hotel Picks. We offer excellent hotels for all budgets in various categories: 5-star, 4-star and 3-star hotels.',NULL,'Peru Hotels: Arequipa Hotels | Peru Vacations by Peru For Less','Explore the beautiful colonial city of Arequipa and enjoy maximum levels of comfort with a stay in our Peru For Less recommended hotels in Arequipa.',NULL,'hotels-arequipa.php',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,1,0,'Colca Canyon Hotels','Our team of travel experts has carefully selected the Peru For Less Top Hotel Picks based on their excellent value and high standards.  (Lower Prices + Top Service = Best Value). We can book ANY hotel for you at competitive rates, but published prices are based on the Peru For Less Top Hotel Picks. We offer excellent hotels for all budgets in various categories: 5-star, 4-star, 3-star and 2-star hotels.',NULL,'Peru Hotels: Colca Canyon Hotels | Peru Vacations by Peru For Less','Explore the majestic Colca Canyon, one of Peru\'s natural wonders, and stay in one the Peru For Less recommended Colca Canyon hotels, ranging from 3 to 5 star.',NULL,'hotels-colca-canyon.php',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,1,0,'Lake Titicaca & Puno Hotels','Our team of travel experts has carefully selected the Peru For Less Top Hotel Picks based on their excellent value and high standards.  (Lower Prices + Top Service = Best Value). We can book ANY hotel for you at competitive rates, but published prices are based on the Peru For Less Top Hotel Picks. We offer excellent hotels for all budgets in various categories: 5-star, 4-star, 3-star and 2-star hotels.',NULL,'Peru Hotels: Lake Titicaca & Puno Hotels | Peru Vacations by Peru For Less','Discover the beautiful Peruvian Andes with a Lake Titicaca tour and stay in one of our recommended Puno hotels, selected by Peru For Less.',NULL,'hotels-puno.php',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,1,0,'Nazca Hotels','Our team of travel experts has carefully selected the Peru For Less Top Hotel Picks based on their excellent value and high standards. (Lower Prices + Top Service = Best Value). We can book ANY hotel for you at competitive rates, but published prices are based on the Peru For Less Top Hotel Picks. We offer excellent hotels for all budgets in various categories: 5-star, 4-star and 3-star.',NULL,'Peru Hotels: Nazca Hotels | Peru Vacations by Peru For Less','Discover the mysterious Nazca Lines and enhance your vacation with a stay at one of our recommended Nazca hotels, selected by Peru For Less.',NULL,'hotels-nazca.php',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,1,0,'Paracas Hotels','Our team of travel experts has carefully selected the Peru For Less Top Hotel Picks based on their excellent value and high standards.  (Lower Prices + Top Service = Best Value). We can book ANY hotel for you at competitive rates, but published prices are based on the Peru For Less Top Hotel Picks. We offer excellent hotels for all budgets in various categories: 5-star, 4-star, 3-star and 2-star hotels.',NULL,'Peru Hotels: Paracas Hotels | Peru Vacations by Peru For Less','Looking for hotels in Paracas? Check out our guide and photos to hotels in the area',NULL,'hotels-paracas.php',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,1,0,'Lima Hotels','Our team of travel experts has carefully selected the Peru For Less Top Hotel Picks based on their excellent value and high standards. (Lower Prices + Top Service = Best Value). We can book ANY hotel for you at competitive rates, but published prices are based on the Peru For Less Top Hotel Picks. We offer excellent hotels for all budgets in various categories: 5-star, 4-star, 3-star and 2-star hotels.',NULL,'Peru Hotels: Lima Hotels | Peru Vacations by Peru For Less','Discover the bustling capital of Peru and stay in a comfortable Lima hotel, recommended by our travel experts at Peru For Less.',NULL,'hotels-lima.php',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,1,0,'Chiclayo Hotels','Our team of travel experts has carefully selected the Peru For Less Top Hotel Picks based on their excellent value and high standards.  (Lower Prices + Top Service = Best Value). We can book ANY hotel for you at competitive rates, but published prices are based on the Peru For Less Top Hotel Picks. We offer excellent hotels for all budgets in various categories: 5-star, 4-star, 3-star and 2-star hotels.',NULL,'Peru Hotels: Chiclayo Hotels | Peru Vacations by Peru For Less','Explore northern Peru and its archeological treasures in Chiclayo and stay in one of our recommended Chiclayo hotels, with Peru For Less.',NULL,'hotels-chiclayo.php',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,1,0,'Trujillo Hotels','Our team of travel experts has carefully selected the Peru For Less Top Hotel Picks based on their excellent value and high standards. (Lower Prices + Top Service = Best Value). We can book ANY hotel for you at competitive rates, but published prices are based on the Peru For Less Top Hotel Picks. We offer excellent hotels for all budgets in various categories: 5-star, 4-star, 3-star and 2-star hotels.',NULL,'Peru Hotels: Trujillo Hotels | Peru Vacations by Peru For Less','Discover the wonderful north of Peru and stay in one of our recommended hotels in Trujillo, selected by travel experts at Peru For Less.',NULL,'hotels-trujillo.php',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,1,0,'Ica Hotels','Our team of travel experts has carefully selected the Peru For Less Top Hotel Picks based on their excellent value and high standards. Lower Prices + Top Service = Best Value). We can book ANY hotel for you at competitive rates, but published prices are based on the Peru For Less Top Hotel Picks. We offer excellent hotels for all budgets in various categories: 5-star, 4-star, 3-star and 2-star hotels.',NULL,'Peru Hotels: Ica Hotels | Peru Vacations by Peru For Less','Discover Ica on Peru\'s southern coastline, and home to the famous Pisco sour, and stay at one of our recommended Ica hotels, with Peru For Less.',NULL,'hotels-ica.php',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,1,0,'Iquitos Hotels','Our team of travel experts has carefully selected the Peru For Less Top Hotel Picks based on their excellent value and high standards. (Lower Prices + Top Service = Best Value). We can book ANY hotel for you at competitive rates, but published prices are based on the Peru For Less Top Hotel Picks. We offer excellent hotels for all budgets in various categories: 5-star, 4-star, 3-star and 2-star hotels.',NULL,'Peru Hotels: Iquitos Hotels | Peru Vacations by Peru For Less','Discover the lush Amazon rainforest and stay in a comfortable hotel in Iquitos, Peru\'s largest jungle settlement, recommended by Peru For Less.',NULL,'hotels-iquitos.php',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,1,0,'Amazon Boats','Our team of travel experts has carefully selected the Peru For Less Top Hotel Picks based on their excellent value and high standards. (Lower Prices + Top Service = Best Value). We can book ANY hotel for you at competitive rates, but published prices are based on the Peru For Less Top Hotel Picks. We offer excellent hotels for all budgets in various categories: 5-star, 4-star, 3-star and 2-star hotels.',NULL,'Peru Hotels: Amazon Boats | Peru Vacations by Peru For Less','Sail along the mighty Amazon River in Peru aboard a comfortable Amazon boat recommended by our travel experts at Peru For Less.',NULL,'boats-amazon.php',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,1,0,'Manu Lodges','Our team of travel experts has carefully selected the Peru For Less Top Hotel Picks based on their excellent value and high standards. (Lower Prices + Top Service = Best Value). We can book ANY hotel for you at competitive rates, but published prices are based on the Peru For Less Top Hotel Picks. We offer excellent hotels for all budgets in various categories: 5-star, 4-star, 3-star and 2-star hotels.',NULL,'Peru Hotels: Manu Lodges | Peru Vacations by Peru For Less','Peru Hotels: Manu Lodges | Peru Vacations by Peru For Less',NULL,'lodges-manu.php',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,1,0,'Galapagos Boats','The list below includes Peru For Less\' favorite boats in the Galapagos Islands.',NULL,'Ecuador Hotels: Galapagos | Ecuador Vacations by Peru For Less ','Check out our selection of excellent Galapagos boats, recommended by Peru For Less for their amenities and service, for an exciting Galapagos cruise.',NULL,'boats-galapagos.php',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,1,0,'Galapagos Hotels','Our team of travel experts has carefully selected the Peru For Less Top Hotel Picks based on their excellent value and high standards. (Lower Prices + Top Service = Best Value). We can book ANY hotel for you at competitive rates, but published prices are based on the Peru For Less Top Hotel Picks.',NULL,'Ecuador Hotels: Galapagos Hotels| Ecuador Vacations by Peru For Less','Discover the Galapagos Islands with an island hopping tour and stay in some of our excellent Galapagos hotels, selected by experts at Peru For Less.',NULL,'ecuador-galapagos-hotels.php',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(18,1,0,'Rio de Janeiro Hotels','Our team of travel experts has carefully selected the Peru For Less Top Hotel Picks based on their excellent value and high standards. (Lower Prices + Top Service = Best Value). We can book ANY hotel for you at competitive rates, but published prices are based on the Peru For Less Top Hotel Picks. We offer excellent hotels for all budgets in various categories: 5-star, 4-star, 3-star and boutique hotels.',NULL,'Brazil Hotels: Rio de Janeiro Hotels | Brazil Vacations with Peru For Less','Discover the eclectic and lively Rio de Janeiro and stay in one of our comfortable recommended Rio de Janeiro hotels, selected by experts at Peru For Less.',NULL,'hotels-rio-janeiro.php',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(19,1,0,'Buenos Aires Hotels','Our team of travel experts has carefully selected the Peru For Less Top Hotel Picks based on their excellent value and high standards.  (Lower Prices + Top Service = Best Value). We can book ANY hotel for you at competitive rates, but published prices are based on the Peru For Less Top Hotel Picks. We offer excellent hotels for all budgets in various categories: 5-star, 4-star, 3-star and boutique hotels.',NULL,'Argentina Hotel: Buenos Aires Hotels | Argentina Vacations by Peru For Less','Discover the cosmopolitan capital of Argentina and stay in one of our recommended Buenos Aires hotels, selected by experts at Peru For Less.',NULL,'hotels-buenos-aires.php',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(20,1,0,'Iguazú Hotels','Our team of travel experts has carefully selected the Peru For Less Top Hotel Picks based on their excellent value and high standards. (Lower Prices + Top Service = Best Value). We can book ANY hotel for you at competitive rates, but published prices are based on the Peru For Less Top Hotel Picks. We offer excellent hotels for all budgets in various categories: 5-star, 4-star, 3-star and boutique hotels.',NULL,'Argentina Hotels: Iguazú Hotels | Argentina Vacations by Peru For Less','Soak up the majesty of the mighty Iguazú Falls and stay in one of our recommended Iguazú hotels, selected by travel experts at Peru For Less.',NULL,'hotels-iguazu.php',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(21,1,0,'La Paz Hotels','Our team of travel experts has carefully selected the Peru For Less Top Hotel Picks based on their excellent value and high standards.  (Lower Prices + Top Service = Best Value). We can book ANY hotel for you at competitive rates, but published prices are based on the Peru For Less Top Hotel Picks. We offer excellent hotels for all budgets in various categories: 5-star, 4-star, 3-star and 2-star hotels.',NULL,'Bolivia Hotels: La Paz | Bolivia Vacations by Peru For Less','Discover the highest capital in the world on your Bolivia vacation and stay in one of our recommended La Paz hotels, with Peru For Less.',NULL,'hotels-la-paz.php',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(22,1,0,'Puerto Maldonado Lodges','Our team of travel experts has carefully selected the Peru For Less Top Hotel Picks based on their excellent value and high standards. (Lower Prices + Top Service = Best Value). We can book ANY hotel for you at competitive rates, but published prices are based on the Peru For Less Top Hotel Picks. We offer excellent hotels for all budgets.',NULL,'Peru Hotels: Puerto Maldonado Lodges | Peru Vacations by Peru For','Explore the Peruvian Amazon rainforest and stay in one of our recommended Puerto Maldonado Lodges, selected by experts at Peru For Less.',NULL,'lodges-puerto-maldonado.php',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(23,1,0,'Iquitos Lodges','Our team of travel experts has carefully selected the Peru For Less Top Hotel Picks based on their excellent value and high standards.  (Lower Prices + Top Service = Best Value). We can book ANY hotel for you at competitive rates, but published prices are based on the Peru For Less Top Hotel Picks. We offer excellent hotels for all budgets.',NULL,'Peru Hotels: Iquitos Lodges | Peru Vacations by Peru For Less','Explore the Peruvian Amazon rainforest and stay in one of our recommended Iquitos Lodges, selected by experts at Peru For Less.',NULL,'lodges-iquitos.php',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(24,1,0,'name','',NULL,'','','','name','','','','','','','','','','',0,0,'2014-12-10 01:36:59','2014-12-10 01:36:59','0000-00-00 00:00:00'),(25,1,0,'Destination Name','',NULL,'','','','','','','','','','','','','','',0,0,'2014-12-10 01:38:06','2014-12-10 01:38:06','0000-00-00 00:00:00'),(26,1,0,'Destination Name','',NULL,'','','','','','','','','','','','','','',0,0,'2014-12-10 01:38:16','2014-12-10 01:38:16','0000-00-00 00:00:00'),(27,1,0,'Destination Name','',NULL,'','','','','','','','','','','','','','',0,0,'2014-12-10 01:38:26','2014-12-10 01:38:26','0000-00-00 00:00:00'),(28,1,0,'Destination Name','',NULL,'','','','','','','','','','','','','','',0,0,'2014-12-10 01:40:02','2014-12-10 01:40:02','0000-00-00 00:00:00'),(29,1,0,'Destination Name','',NULL,'','','','','','','','','','','','','','',0,0,'2014-12-10 01:44:26','2014-12-10 01:44:26','0000-00-00 00:00:00'),(30,1,0,'Destination Name','',NULL,'','','','','','','','','','','','','','',0,0,'2014-12-10 01:44:47','2014-12-10 01:44:47','0000-00-00 00:00:00'),(31,1,0,'Destination Name','',NULL,'','','','','','','','','','','','','','',0,0,'2014-12-10 01:45:08','2014-12-10 01:45:08','0000-00-00 00:00:00'),(32,1,0,'Destination Name','',NULL,'','','','','','','','','','','','','','',0,0,'2014-12-10 01:51:02','2014-12-10 01:51:02','0000-00-00 00:00:00'),(33,1,0,'Destination Name','',NULL,'','','','','','','','','','','','','','',0,0,'2014-12-10 01:51:21','2014-12-10 01:51:21','0000-00-00 00:00:00'),(34,1,0,'Destination Name','',NULL,'','','','','','','','','','','','','','',0,0,'2014-12-10 02:11:48','2014-12-10 02:11:48','0000-00-00 00:00:00'),(35,1,0,'Destination Name','',NULL,'','','','','','','','','','','','','','',0,0,'2014-12-10 19:56:51','2014-12-10 19:56:51','0000-00-00 00:00:00'),(36,1,0,'Destination Name','',NULL,'','','','','','','','','','','','','','',0,0,'2014-12-10 19:58:28','2014-12-10 19:58:28','0000-00-00 00:00:00'),(37,1,0,'Destination Name','',NULL,'','','','','','','','','','','','','','',0,0,'2014-12-10 20:17:55','2014-12-10 20:17:55','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `destinations_for_hotels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `destinations_for_hotels_packages`
--

DROP TABLE IF EXISTS `destinations_for_hotels_packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `destinations_for_hotels_packages` (
  `package_id` int(10) unsigned NOT NULL,
  `destination_for_hotel_id` int(10) unsigned NOT NULL,
  `order` int(11) NOT NULL,
  KEY `destinations_hotels_packages_package_id_foreign` (`package_id`),
  KEY `destinations_hotels_packages_destination_for_hotel_id_foreign` (`destination_for_hotel_id`),
  CONSTRAINT `destinations_hotels_packages_destination_for_hotel_id_foreign` FOREIGN KEY (`destination_for_hotel_id`) REFERENCES `destinations_for_hotels` (`destination_for_hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `destinations_hotels_packages_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`package_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `destinations_for_hotels_packages`
--

LOCK TABLES `destinations_for_hotels_packages` WRITE;
/*!40000 ALTER TABLE `destinations_for_hotels_packages` DISABLE KEYS */;
/*!40000 ALTER TABLE `destinations_for_hotels_packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `destinations_packages`
--

DROP TABLE IF EXISTS `destinations_packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `destinations_packages` (
  `package_id` int(10) unsigned NOT NULL,
  `destination_id` int(10) unsigned NOT NULL,
  `order` int(11) NOT NULL,
  KEY `destinations_packages_package_id_foreign` (`package_id`),
  KEY `destinations_packages_destination_id_foreign` (`destination_id`),
  CONSTRAINT `destinations_packages_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`destination_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `destinations_packages_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`package_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `destinations_packages`
--

LOCK TABLES `destinations_packages` WRITE;
/*!40000 ALTER TABLE `destinations_packages` DISABLE KEYS */;
INSERT INTO `destinations_packages` VALUES (1,1,0);
/*!40000 ALTER TABLE `destinations_packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grade_hotel`
--

DROP TABLE IF EXISTS `grade_hotel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grade_hotel` (
  `grade_hotel_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `grade_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`grade_hotel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade_hotel`
--

LOCK TABLES `grade_hotel` WRITE;
/*!40000 ALTER TABLE `grade_hotel` DISABLE KEYS */;
INSERT INTO `grade_hotel` VALUES (2,'2 Star','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'3 Star','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'4 Star','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'5 Star','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'lodges','0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,'boats','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `grade_hotel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotels` (
  `hotel_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `user_id_updated` int(11) NOT NULL,
  `destination_for_hotel_id` int(10) unsigned DEFAULT NULL,
  `title_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `abstract` text COLLATE utf8_unicode_ci,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon_alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `star` int(11) NOT NULL,
  `top_pick` tinyint(1) NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `removed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `removed_at` datetime NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`hotel_id`),
  KEY `hotels_destination_for_hotel_id_foreign` (`destination_for_hotel_id`),
  CONSTRAINT `hotels_destination_for_hotel_id_foreign` FOREIGN KEY (`destination_for_hotel_id`) REFERENCES `destinations_for_hotels` (`destination_for_hotel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotels`
--

LOCK TABLES `hotels` WRITE;
/*!40000 ALTER TABLE `hotels` DISABLE KEYS */;
INSERT INTO `hotels` VALUES (1,1,2,2,14,'','','','jump street','I am a leaf on the wind','I ate a mermaid! In the amazon!','','','','','',5,1,0,0,'2014-12-10 20:08:54','2014-12-10 20:15:34','0000-00-00 00:00:00',0);
/*!40000 ALTER TABLE `hotels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotels_services_facilities`
--

DROP TABLE IF EXISTS `hotels_services_facilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotels_services_facilities` (
  `hotel_id` int(10) unsigned NOT NULL,
  `services_facilities_id` int(10) unsigned NOT NULL,
  KEY `hotels_services_facilities_hotel_id_foreign` (`hotel_id`),
  KEY `hotels_services_facilities_services_facilities_id_foreign` (`services_facilities_id`),
  CONSTRAINT `hotels_services_facilities_services_facilities_id_foreign` FOREIGN KEY (`services_facilities_id`) REFERENCES `services_facilities` (`services_facilities_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hotels_services_facilities_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotels_services_facilities`
--

LOCK TABLES `hotels_services_facilities` WRITE;
/*!40000 ALTER TABLE `hotels_services_facilities` DISABLE KEYS */;
/*!40000 ALTER TABLE `hotels_services_facilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `image_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `imageable_id` int(11) NOT NULL,
  `imageable_type` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itineraries`
--

DROP TABLE IF EXISTS `itineraries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itineraries` (
  `itinerary_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `package_id` int(10) unsigned NOT NULL,
  `day` int(11) NOT NULL,
  `day_join` int(11) DEFAULT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_gallery` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `removed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `removed_at` datetime NOT NULL,
  PRIMARY KEY (`itinerary_id`),
  KEY `itineraries_package_id_foreign` (`package_id`),
  CONSTRAINT `itineraries_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`package_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itineraries`
--

LOCK TABLES `itineraries` WRITE;
/*!40000 ALTER TABLE `itineraries` DISABLE KEYS */;
/*!40000 ALTER TABLE `itineraries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_09_16_235839_confide_setup_users_table',1),('2014_09_22_174213_create_countries_table',1),('2014_09_22_174722_create_destinations_table',1),('2014_09_22_174818_create_sub_destinations_table',1),('2014_09_22_174914_create_hotels_table',1),('2014_09_22_175109_create_services_facilities_table',1),('2014_09_22_175154_create_hotels_services_facilities_table',1),('2014_09_22_191135_create_physical_difficulty_table',1),('2014_09_22_191228_create_additional_table',1),('2014_09_22_191303_create_additional_items_table',1),('2014_09_22_212455_create_categories_packages_table',1),('2014_09_22_212535_create_trip_style_table',1),('2014_09_22_212605_create_packages_table',1),('2014_09_22_214521_create_categories_packages_packages_table',1),('2014_09_22_214822_create_sub_destinations_packages_table',1),('2014_09_22_214854_create_trip_style_packages_table',1),('2014_09_22_214927_create_additional_packages_table',1),('2014_09_22_224240_create_itineraries_table',1),('2014_09_22_231822_create_destinations_hotels_packages_table',1),('2014_09_24_153915_create_destinations_packages_table',1),('2014_09_24_195902_create_testimonies_table',1),('2014_09_24_201531_create_images_table',1),('2014_09_24_211723_create_tabs_destinations_table',1),('2014_10_22_192938_create_travel_guides_table',1),('2014_11_05_170023_add_order_to_category_packages_packages',1),('2014_11_05_195457_add_order_to_destinations_packages',1),('2014_11_05_225820_add_order_to_hotels',1),('2014_11_11_185101_create_staff_table',1),('2014_11_11_191617_update_columns_publish_remove_staff_table',1),('2014_11_13_153505_update_columns_alt_text_staff_teble',1),('2014_11_13_200311_add_column_order_additional_packages_table',1),('2014_11_18_190941_add_column_raw_price_packages_table',1),('2014_11_19_211816_add_columns_lft_and_rgt_categories_package_table',1),('2014_11_26_171957_add_columns_metas_url_destinations',1),('2014_11_26_235053_add_campo_seo_destinations_table',1),('2014_12_01_143237_create_destinations_for_hotels_table',1),('2014_12_01_164047_update_destination_id_hotels_table',1),('2014_12_01_175038_add_users_fileds_hotels_table',1),('2014_12_01_191824_update_fields_destinations_hotels_packages_table',1),('2014_12_02_195952_change_name_destinations_hotel_packages_table',1),('2014_12_02_203117_create_grade_hotel_table',1),('2014_12_03_164303_entrust_setup_tables',1),('2014_12_04_182755_update_filed_destination_for_hotel_hotels_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `packages` (
  `package_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `physical_difficulty_id` int(10) unsigned NOT NULL,
  `title_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `abstract` text COLLATE utf8_unicode_ci,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon_alt` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon_title` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `overview` text COLLATE utf8_unicode_ci,
  `included` text COLLATE utf8_unicode_ci,
  `tour_highlights` text COLLATE utf8_unicode_ci,
  `tag_days` int(11) DEFAULT NULL,
  `tag_price` int(11) DEFAULT NULL,
  `table_price` text COLLATE utf8_unicode_ci,
  `raw_price` text COLLATE utf8_unicode_ci NOT NULL,
  `tag_destinations` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_head` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_head_alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_head_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `removed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `removed_at` datetime NOT NULL,
  PRIMARY KEY (`package_id`),
  KEY `packages_physical_difficulty_id_foreign` (`physical_difficulty_id`),
  CONSTRAINT `packages_physical_difficulty_id_foreign` FOREIGN KEY (`physical_difficulty_id`) REFERENCES `physical_difficulty` (`physical_difficulty_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packages`
--

LOCK TABLES `packages` WRITE;
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;
INSERT INTO `packages` VALUES (1,1,1,'','','','stuff','stuff','short name','abstractabstractabstractabstractabstractabstractabstractabstractabstractabstract','','','',NULL,'','',NULL,NULL,'<p>a million dollars!</p>\r\n','<p>a million dollars!</p>\r\n','','','','',1,0,'2014-12-10 19:56:07','2014-12-10 20:06:09','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reminders`
--

DROP TABLE IF EXISTS `password_reminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reminders`
--

LOCK TABLES `password_reminders` WRITE;
/*!40000 ALTER TABLE `password_reminders` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reminders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1,1),(2,2,1),(3,3,1),(4,4,1),(5,5,1),(6,6,1),(7,7,1),(8,8,1),(9,2,2),(10,3,2),(11,4,2),(12,5,2),(13,6,2),(14,7,2),(15,8,2),(16,3,3),(17,4,3),(18,5,3),(19,6,3),(20,7,3),(21,8,3);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'manage_users','Manage Users','2014-12-05 02:39:14','2014-12-05 02:39:14'),(2,'edit_image','Edit Images','2014-12-05 02:39:14','2014-12-05 02:39:14'),(3,'delete_package','Delete Package','2014-12-05 02:39:14','2014-12-05 02:39:14'),(4,'delete_hotel','Delete Hotel','2014-12-05 02:39:14','2014-12-05 02:39:14'),(5,'delete_additional','Delete Additional','2014-12-05 02:39:14','2014-12-05 02:39:14'),(6,'delete_testimonio','Delete Testimonio','2014-12-05 02:39:14','2014-12-05 02:39:14'),(7,'delete_destination','Delete Destination','2014-12-05 02:39:14','2014-12-05 02:39:14'),(8,'delete_destination_for_hotel','Delete Destination For Hotel','2014-12-05 02:39:14','2014-12-05 02:39:14');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `physical_difficulty`
--

DROP TABLE IF EXISTS `physical_difficulty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `physical_difficulty` (
  `physical_difficulty_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `removed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `removed_at` datetime NOT NULL,
  PRIMARY KEY (`physical_difficulty_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `physical_difficulty`
--

LOCK TABLES `physical_difficulty` WRITE;
/*!40000 ALTER TABLE `physical_difficulty` DISABLE KEYS */;
INSERT INTO `physical_difficulty` VALUES (1,'1-Easy',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'2-Moderate',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'3-Challenging',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `physical_difficulty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrator','2014-12-05 02:39:14','2014-12-05 02:39:14'),(2,'Editor Advance','2014-12-05 02:39:14','2014-12-05 02:39:14'),(3,'Editor','2014-12-05 02:39:14','2014-12-05 02:39:14');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services_facilities`
--

DROP TABLE IF EXISTS `services_facilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services_facilities` (
  `services_facilities_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `removed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`services_facilities_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services_facilities`
--

LOCK TABLES `services_facilities` WRITE;
/*!40000 ALTER TABLE `services_facilities` DISABLE KEYS */;
INSERT INTO `services_facilities` VALUES (1,'Restaurant',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Room Service',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Internet',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'Laundry Service',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'Spa',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'Baby Sitter',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,'Parking',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,'Gym',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,'Gift Shop',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,'Swimming Pool',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,'Internet',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,'Internet',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,'Internet',0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `services_facilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `staff_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `charge` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `photo_alt` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `photo_title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `removed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `removed_at` datetime NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,'Fernando la prueba editado','','','','','','',0,0,0,'2014-12-10 20:38:34','2014-12-10 20:40:21','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_destinations`
--

DROP TABLE IF EXISTS `sub_destinations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_destinations` (
  `sub_destination_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `destination_id` int(10) unsigned NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '1',
  `removed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `removed_at` datetime NOT NULL,
  PRIMARY KEY (`sub_destination_id`),
  KEY `sub_destinations_destination_id_foreign` (`destination_id`),
  CONSTRAINT `sub_destinations_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`destination_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_destinations`
--

LOCK TABLES `sub_destinations` WRITE;
/*!40000 ALTER TABLE `sub_destinations` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_destinations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_destinations_packages`
--

DROP TABLE IF EXISTS `sub_destinations_packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_destinations_packages` (
  `sub_destination_id` int(10) unsigned NOT NULL,
  `package_id` int(10) unsigned NOT NULL,
  KEY `sub_destinations_packages_sub_destination_id_foreign` (`sub_destination_id`),
  KEY `sub_destinations_packages_package_id_foreign` (`package_id`),
  CONSTRAINT `sub_destinations_packages_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`package_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sub_destinations_packages_sub_destination_id_foreign` FOREIGN KEY (`sub_destination_id`) REFERENCES `sub_destinations` (`sub_destination_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_destinations_packages`
--

LOCK TABLES `sub_destinations_packages` WRITE;
/*!40000 ALTER TABLE `sub_destinations_packages` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_destinations_packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabs_destinations`
--

DROP TABLE IF EXISTS `tabs_destinations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabs_destinations` (
  `tab_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `destination_id` int(10) unsigned NOT NULL,
  `bloque` int(11) NOT NULL DEFAULT '0',
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `removed` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`tab_id`),
  KEY `tabs_destinations_destination_id_foreign` (`destination_id`),
  CONSTRAINT `tabs_destinations_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`destination_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabs_destinations`
--

LOCK TABLES `tabs_destinations` WRITE;
/*!40000 ALTER TABLE `tabs_destinations` DISABLE KEYS */;
/*!40000 ALTER TABLE `tabs_destinations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonies`
--

DROP TABLE IF EXISTS `testimonies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonies` (
  `testimonio_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `signature` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `removed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `removed_at` datetime NOT NULL,
  PRIMARY KEY (`testimonio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonies`
--

LOCK TABLES `testimonies` WRITE;
/*!40000 ALTER TABLE `testimonies` DISABLE KEYS */;
/*!40000 ALTER TABLE `testimonies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `travel_guides`
--

DROP TABLE IF EXISTS `travel_guides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `travel_guides` (
  `travel_guide_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords_seo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `removed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `removed_at` datetime NOT NULL,
  PRIMARY KEY (`travel_guide_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `travel_guides`
--

LOCK TABLES `travel_guides` WRITE;
/*!40000 ALTER TABLE `travel_guides` DISABLE KEYS */;
/*!40000 ALTER TABLE `travel_guides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trip_style`
--

DROP TABLE IF EXISTS `trip_style`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trip_style` (
  `trip_style_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `removed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `removed_at` datetime NOT NULL,
  PRIMARY KEY (`trip_style_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trip_style`
--

LOCK TABLES `trip_style` WRITE;
/*!40000 ALTER TABLE `trip_style` DISABLE KEYS */;
INSERT INTO `trip_style` VALUES (8,'Adventure',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,'Culture / History',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,'Nature',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,'City Scenes',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,'Trekking',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,'Cruise',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,'Awsomeosity',0,'2014-12-10 20:43:59','2014-12-10 20:44:55','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `trip_style` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trip_style_packages`
--

DROP TABLE IF EXISTS `trip_style_packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trip_style_packages` (
  `trip_style_id` int(10) unsigned NOT NULL,
  `package_id` int(10) unsigned NOT NULL,
  KEY `trip_style_packages_trip_style_id_foreign` (`trip_style_id`),
  KEY `trip_style_packages_package_id_foreign` (`package_id`),
  CONSTRAINT `trip_style_packages_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`package_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `trip_style_packages_trip_style_id_foreign` FOREIGN KEY (`trip_style_id`) REFERENCES `trip_style` (`trip_style_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trip_style_packages`
--

LOCK TABLES `trip_style_packages` WRITE;
/*!40000 ALTER TABLE `trip_style_packages` DISABLE KEYS */;
/*!40000 ALTER TABLE `trip_style_packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'johndoe','johndoe@site.dev','$2y$10$IKz1Xhs9PJiZaOG/kvRz6ucgh/1QRAXXXRRJOiYDIFKx6jpLVJ9rK','551f68c148bfe6be9793fa0801ba6c8f',NULL,0,'2014-12-05 02:39:14','2014-12-05 02:39:14'),(2,'framos','fernandoramoscarrasco@gmail.com','$2y$10$Z1oUlu3PxFnbMkc/saJXsu9ogja7r0/Hr4i2v3SeyHRIgwApzpLXm','2a612b64b38a18eb1dffd74a69edb0ec',NULL,1,'2014-12-05 02:39:14','2014-12-05 02:39:14'),(3,'mariano','mariano@latinamericaforless.com','$2y$10$ZNyzkBpr5sq/AsoEWATMIO8NZ6ANh7hz6CRxorrazdoq7WuJEKkaW','be980c7ab822e2d2c456558132a10cf5',NULL,1,'2014-12-05 02:39:14','2014-12-05 02:39:14');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-10 13:36:40
