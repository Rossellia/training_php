-- MySQL dump 10.13  Distrib 5.7.42, for Linux (x86_64)
--
-- Host: localhost    Database: Catalog
-- ------------------------------------------------------
-- Server version	5.7.42

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
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `year` int(4) NOT NULL,
  `length` varchar(100) DEFAULT NULL,
  `description` text NOT NULL,
  `category_id` int(10) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categories` (`category_id`),
  CONSTRAINT `fk_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'Star Trek: The Motion Picture',1979,'132','An alien phenomenon of unprecedented size and power is approaching Earth, destroying everything in its path. The only starship in range is the USS Enterprise--still in drydock after a major overhaul. As Captain Willard Decker readies his ship and his crew to face this menace, Admiral James T. Kirk arrives with orders to take command of the Enterprise and intercept the intruder. But it has been three years since Kirk last commanded the Enterprise on its historic five year mission... is he up to the task of saving the Earth? ',2,NULL,'2023-09-21 12:24:12'),(2,'Star Trek',2009,'127 minutes','On the day of James Kirk\'s birth, his father dies on his ship in a last stand against a mysterious alien time-traveling vessel looking for Ambassador Spock, who, in this time, is also a child on Vulcan disdained by his neighbors for his half-human heritage. Twenty-five years later, Kirk has grown into a young troublemaker. Challenged by Captain Christopher Pike to realize his potential in Starfleet, he comes to annoy instructors like young Commander Spock. Suddenly, there is an emergency at Vulcan and the newly commissioned USS Enterprise is crewed with promising cadets like Nyota Uhura, Hikaru Sulu, Pavel Chekov and even Kirk himself, thanks to Leonard McCoy\'s medical trickery. Together, this crew will have an adventure in the final frontier where the old legend is altered forever as a new version of it begins.',2,NULL,NULL),(3,'Star Trek Into Darkness',2013,'132 mins.','When the crew of the Enterprise is called back home, they find an unstoppable force of terror from within their own organization has detonated the fleet and everything it stands for, leaving our world in a state of crisis. With a personal score to settle, Captain Kirk leads a manhunt to a war-zone world to capture a one man weapon of mass destruction. As our heroes are propelled into an epic chess game of life and death, love will be challenged, friendships will be torn apart, and sacrifices must be made for the only family Kirk has left: his crew.',2,NULL,NULL),(4,'Star Trek: First Contact',1996,'111 minute','The time is the 24th century and the ship is the newly-commissioned Enterprise-E. Its captain, Jean-Luc Picard, has been ordered not to interfere in a battle between a Borg Cube and ships from the Federation. However, seeing the Federation is about to lose, Picard ignore his orders and takes command of the defending fleet. With his knowledge of the Cube\'s weak spot, they destroy it. However, a small part of it escapes and plots a course directly for Earth. The Enterprise chases it and enters a time distortion created by the Borg. They end up in the mid-21st century, and their only chance of stopping the Borg from assimilating Earth is to help Zefram Cochrane make his famous first faster-than-light travel to the stars.',2,NULL,NULL),(5,'Star Trek: Insurrection',1998,'103 minutes','When the crew of the Enterprise learn of a Federation plot against the inhabitants of a unique planet, Captain Picard begins an open rebellion. ',2,NULL,NULL),(6,'Star Trek IV: The Voyage Home',1986,'119','To save Earth from an alien probe, Admiral Kirk and his fugitive crew go back in time to 20th century Earth to retrieve the only beings who can communicate with it, humpback whales. ',2,NULL,'2023-09-21 12:25:09');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-22 18:09:47
