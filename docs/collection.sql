# ************************************************************
# Sequel Ace SQL dump
# Version 20051
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 11.1.2-MariaDB-1:11.1.2+maria~ubu2204)
# Database: collection
# Generation Time: 2023-09-25 15:22:26 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table beers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `beers`;

CREATE TABLE `beers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `brewery` int(11) unsigned DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `ABV` float DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `comment` varchar(256) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `style` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_beers_breweries` (`brewery`),
  CONSTRAINT `fk_beers_breweries` FOREIGN KEY (`brewery`) REFERENCES `breweries` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `beers` WRITE;
/*!40000 ALTER TABLE `beers` DISABLE KEYS */;

INSERT INTO `beers` (`id`, `brewery`, `name`, `ABV`, `rating`, `comment`, `year`, `style`)
VALUES
	(1,1,'Blonde',8,9,'Delicious',1982,'Blonde'),
	(2,2,'Elsie',4.2,7.5,'Refreshing',2017,'Pilsner'),
	(3,2,'Pacific',4.4,8,'Tropical',2021,'Pale'),
	(4,3,'Mena Dhu',4.5,7,'Heavy',2015,'Stout'),
	(5,3,'Proper Job',4.5,6.5,'Bitter',2006,'IPA'),
	(6,3,'Baobab',5.3,8.5,'Chewy',2016,'Wheat'),
	(7,3,'Sayzon',5.9,7,'Hazy',2016,'Saison');

/*!40000 ALTER TABLE `beers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table breweries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `breweries`;

CREATE TABLE `breweries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `country` varchar(256) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `breweries` WRITE;
/*!40000 ALTER TABLE `breweries` DISABLE KEYS */;

INSERT INTO `breweries` (`id`, `name`, `country`, `year`)
VALUES
	(1,'La Chouffe','Belgium',1982),
	(2,'Little Creatures','Australia',2000),
	(3,'St Austell','England',1995);

/*!40000 ALTER TABLE `breweries` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
