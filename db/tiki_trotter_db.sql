CREATE DATABASE  IF NOT EXISTS `tiki_trotter_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `tiki_trotter_db`;
-- MySQL dump 10.13  Distrib 5.7.15, for Linux (x86_64)
--
-- Host: localhost    Database: tiki_trotter_db
-- ------------------------------------------------------
-- Server version	5.7.15-0ubuntu0.16.04.1

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
-- Table structure for table `accommodation_types`
--

DROP TABLE IF EXISTS `accommodation_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accommodation_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accommodation_types`
--

LOCK TABLES `accommodation_types` WRITE;
/*!40000 ALTER TABLE `accommodation_types` DISABLE KEYS */;
INSERT INTO `accommodation_types` VALUES (1,'Hotel','An establishment that provides travelers with paid accommodation and other guest services. Depending on size, location, and amenities, hotels are generally rated from one-star to five stars, but letter grading (from “A” to “F”) and other rating schemes are also used to categorize hotels across the world.'),(2,'Hostel','Ideal for budget travelers and backpackers, a hostel is an inexpensive type of accommodation, usually with shared bedrooms and communal facilities.'),(3,'Motel','Originally designed for motorists, motels are roadside hotels equipped with minimal amenities and ample parking areas for motor vehicles.'),(4,'Cottage','In today’s tourism sector, the term cottage is used to describe a small vacation house, typically in a rural area.'),(5,'Boutique Hotel','Often furnished in a themed, individual style, boutique hotels are intimate in size and focus on providing guests with high-quality, personalized experiences.'),(6,'Mansion','Usually built for the wealthy, mansions are large, opulent houses that generally pay homage to a historic architectural style.'),(7,'Lodge','Although the word ’lodge’ has many different meanings, one of them refers to a small rural house used by people on holiday or occupied seasonally by sports enthusiasts (ski lodge, hunting lodge).'),(8,'Resort','Although a resort is primarily known as a destination frequented by vacationers in search of relaxation and entertainment, the term is also used to describe a full service lodging establishment that offers extensive guest services and recreational facilities.'),(9,'Villa','Originated in Roman times, a villa is often described as a luxurious country residence.'),(10,'Treehouse','Usually designed for recreational purposes, a treehouse, or tree house, is a structure built or placed among the branches of a tree.'),(11,'Apartment','Also known as flat (British), an apartment is a self-contained accommodation unit housed in a building containing a number of such units.'),(12,'Bed and Breakfast','A Bed and Breakfast (B&B) is an intimate, independently run lodging establishment, where breakfast is included in the room rate.'),(13,'Inn','A small establishment offering overnight accommodation, food, and drink to travelers.'),(14,'Penthouse','An apartment situated on the highest floor of a building, commonly appointed with luxury amenities.'),(15,'Pension','A type of guesthouse or B&B, where in addition to lodging and breakfast, guests are also offered lunch and dinner. Pensions are usually family-run and cost less than other accommodation options.'),(16,'Townhouse','A townhouse is a residential multi-level property that is usually connected to a similar unit by a common sidewall.'),(17,'Recreational Vehicle','Usually used for traveling, an RV is a recreational vehicle outfitted with the amenities found in a home, including bathroom, kitchen, and sleeping facilities. Depending on region, RVs are also called caravans, camper vans, or motorhomes.'),(18,'Tented Safari Camp','A tented safari camp is a permanent campsite of large accommodation units, usually with canvas walls, solid high-quality furnishings, en-suite bathroom facilities, and private decks for observing wildlife. Situated throughout Africa, they range from comfortable to ultra-luxury and offer a wide range of safari based activities.'),(19,'Yacht/Boat','A type of luxury recreational boat offering every modern convenience. They are classified as sailing yachts and motor yachts, and are available in a vast range of sizes, styles, and functions.'),(20,'Farmhouse','Although their styles vary by region, farmhouses are houses attached to a farm, often characterized by vernacular architecture.'),(21,'Private Island Resort','Ideal for honeymooners and travelers in search of luxury and seclusion, private island resorts are some of the most exclusive accommodation types out there.'),(22,'Guesthouse','A guest house or guesthouse is a private house offering inexpensive accommodation to tourists.'),(23,'Business Hotel','Catered primarily to business travelers, business hotels are strategically located (downtown, in business districts, or close to major business centers) and come equipped with corporate facilities such as meeting and conference rooms, Internet access, and catering options.'),(24,'Eco Hotel','An eco hotel is an environmentally friendly accommodation aiming to promote sustainable tourism and green living through the use of renewable energy sources, recycled materials, and organic locally-sourced produce. Their philosophy is to minimize the impact on the environment.');
/*!40000 ALTER TABLE `accommodation_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotel_info`
--

DROP TABLE IF EXISTS `hotel_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotel_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `accommodation_type_tags` text,
  `short_description` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `address` varchar(256) NOT NULL,
  `province_id` int(11) NOT NULL,
  `phone_1` varchar(45) DEFAULT NULL,
  `phone_2` varchar(45) DEFAULT NULL,
  `phone_3` varchar(45) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `status` varchar(256) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_hotel_info_1_idx` (`province_id`),
  CONSTRAINT `fk_hotel_info_1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotel_info`
--

LOCK TABLES `hotel_info` WRITE;
/*!40000 ALTER TABLE `hotel_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `hotel_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provinces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provinces`
--

LOCK TABLES `provinces` WRITE;
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
INSERT INTO `provinces` VALUES (1,'Metro Manila'),(2,'Abra'),(3,'Apayao'),(4,'Benguet'),(5,'Ifugao'),(6,'Kalinga'),(7,'Mountain Province'),(8,'Ilocos Norte'),(9,'Ilocos Sur'),(10,'La Union'),(11,'Pangasinan'),(12,'Batanes'),(13,'Cagayan'),(14,'Isabela'),(15,'Quirino'),(16,'Nueva Vizcaya'),(17,'Aurora'),(18,'Bataan'),(19,'Bulacan'),(20,'Nueva Ecija'),(21,'Pampanga'),(22,'Tarlac'),(23,'Zambales'),(24,'Batangas'),(25,'Cavite'),(26,'Laguna'),(27,'Quezon'),(28,'Rizal'),(29,'Marinduque'),(30,'Occidental Mindoro'),(31,'Oriental Mindoro'),(32,'Palawan'),(33,'Romblon'),(34,'Albay'),(35,'Camarines Norte'),(36,'Camarines Sur'),(37,'Catanduanes'),(38,'Masbate'),(39,'Sorsogon'),(40,'Aklan'),(41,'Antique'),(42,'Capiz'),(43,'Guimaras'),(44,'Iloilo'),(45,'Negros Occidental'),(46,'Bohol'),(47,'Cebu'),(48,'Negros Oriental'),(49,'Siquijor'),(50,'Biliran'),(51,'Eastern Samar'),(52,'Leyte'),(53,'Northern Samar'),(54,'Southern Leyte'),(55,'Samar (Western Samar)'),(56,'Zamboanga del Norte'),(57,'Zamboanga del Sur'),(58,'Zamboanga Sibugay'),(59,'City of Isabela'),(60,'Bukidnon'),(61,'Camiguin'),(62,'Lanao del Norte'),(63,'Misamis Occidental'),(64,'Misamis Oriental'),(65,'Davao del Norte'),(66,'Davao Oriental'),(67,'Davao del Sur'),(68,'Compostela Valley'),(69,'Davao Occidental'),(70,'North Cotabato'),(71,'Sarangani'),(72,'South Cotabato'),(73,'Sultan Kudarat'),(74,'Cotabato City'),(75,'Agusan del Norte'),(76,'Agusan del Sur'),(77,'Surigao del Norte'),(78,'Surigao del Sur'),(79,'Dinagat Islands'),(80,'Basilan'),(81,'Lanao del Sur'),(82,'Maguindanao'),(83,'Sulu'),(84,'Tawi-tawi'),(85,'Shariff Kabunsuan'),(86,'wew'),(87,'wewww'),(88,'12'),(89,'adoy st.'),(90,'1');
/*!40000 ALTER TABLE `provinces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_auth`
--

DROP TABLE IF EXISTS `user_auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `acct_status` int(11) NOT NULL DEFAULT '0',
  `email` varchar(60) NOT NULL,
  `auth_key` varchar(256) NOT NULL,
  `val_key` varchar(45) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_userauth_1_idx` (`user_id`),
  CONSTRAINT `fk_userauth_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_auth`
--

LOCK TABLES `user_auth` WRITE;
/*!40000 ALTER TABLE `user_auth` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_auth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `firstname` varchar(60) NOT NULL,
  `middlename` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `datecreated` varchar(45) NOT NULL DEFAULT 'CURRENT_TIMESTAMP',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_info`
--

LOCK TABLES `user_info` WRITE;
/*!40000 ALTER TABLE `user_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-06 17:13:19
