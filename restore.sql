-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: dnd
-- ------------------------------------------------------
-- Server version	5.7.17-log

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
-- Table structure for table `monsters`
--

DROP TABLE IF EXISTS `monsters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monsters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `cr` varchar(45) NOT NULL,
  `size` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `alignment` varchar(45) NOT NULL,
  `ac` int(11) NOT NULL,
  `hp` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `str` int(11) NOT NULL,
  `dex` int(11) NOT NULL,
  `con` int(11) NOT NULL,
  `int` int(11) NOT NULL,
  `wis` int(11) NOT NULL,
  `cha` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monsters`
--

LOCK TABLES `monsters` WRITE;
/*!40000 ALTER TABLE `monsters` DISABLE KEYS */;
INSERT INTO `monsters` VALUES (1,'Goblin','1/4','Small','Humanoid','Neutral Evil',15,7,30,8,14,10,10,8,8),(2,'Aboleth','10','Large','Aberration','Lawful Evil',17,135,40,21,9,15,18,15,18),(3,'Adult Red Dragon','17','Huge','Dragon','Chaotic Evil',19,256,80,27,10,25,16,13,21),(4,'Air Elemental','5','Large','Elemental','Neutral',15,90,90,14,20,14,6,10,6),(5,'Chimera','6','Large','Monstrosity','Chaotic Evil',14,114,30,19,11,19,3,14,10),(6,'Cyclops','6','Huge','Giant','Chaotic Neutral',14,138,30,22,11,20,8,6,10),(7,'Doppelganger','3','Medium','Monstrosity','Neutral',14,52,30,11,18,14,11,12,14),(9,'Earth Elemental','5','Large','Elemental','Neutral',17,126,30,20,8,20,5,10,5),(10,'Fire Elemental','5','Large','Elemental','Neutral',17,102,50,10,17,16,6,10,7),(11,'Gelatinous Cube','2','Large','Ooze','Unaligned',6,84,15,14,3,20,1,6,1),(12,'Iron Golem','16','Large','Construct','Unaligned',20,210,30,24,9,20,3,11,1),(13,'Lich','21','Medium','Undead','Evil',17,135,30,11,16,16,20,14,16),(14,'Ogre','2','Large','Giant','Chaotic Evil',11,59,40,19,8,16,5,7,7),(15,'Orc','1/2','Medium','Humanoid','Chaotic Evil',13,15,30,16,12,16,7,11,10),(16,'Planetar','16','Large','Celestial','Lawful Good',19,200,40,24,20,24,19,22,25),(17,'Pseudodragon','1/4','Tiny','Dragon','Neutral Good',13,7,60,6,15,13,10,12,10),(18,'Tyrannosaurus Rex','8','Huge','Beast','Unaligned',13,136,50,25,10,19,2,12,9),(19,'Water Elemental','5','Large','Elemental','Neutral',14,114,90,18,14,18,5,10,8),(20,'Zombie','1/4','Medium','Undead','Neutral Evil',8,22,20,13,6,16,3,6,5);
/*!40000 ALTER TABLE `monsters` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-08 20:17:23
