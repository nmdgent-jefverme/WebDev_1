# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.23)
# Database: kinepolis
# Generation Time: 2019-12-11 08:42:39 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table movie
# ------------------------------------------------------------

DROP TABLE IF EXISTS `movie`;

CREATE TABLE `movie` (
  `movie_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) DEFAULT '',
  `description` text,
  `yt_trailer` varchar(256) DEFAULT NULL,
  `photo` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `movie` WRITE;
/*!40000 ALTER TABLE `movie` DISABLE KEYS */;

INSERT INTO `movie` (`movie_id`, `title`, `description`, `yt_trailer`, `photo`)
VALUES
	(1,'Joker','Joker draait om de iconische aartsvijand en is een origineel op zichzelf staand verhaal dat nog niet eerder op het grote doek vertoond is. Phillips’ onderzoek naar Arthur Fleck (Phoenix), een man die door de maatschappij wordt genegeerd, is niet alleen een interessante karakterstudie, maar ook een verhaal met een boodschap.',NULL,'https://be-nl-cdn.kinepolis.com/nl/sites/kinepolis.be.nl/files/styles/kinepolis_filter_movie_poster/public/posters/Smile_Art_OV.jpg'),
	(2,'F.C. De Kampioenen 4: Viva Boma','Ronaldinho wordt door Boma en Goedele klaargestoomd als nieuwe PDG van de ‘Boma Vleesindustrie NV’. Maar zijn hart ligt meer bij het voetbal – en bij Niki, zijn nieuwe vlam.\nTerwijl de Kampioenen een promotiestunt voorbereiden om de ‘Viva Boma’ worst te lanceren tijdens Aalst Carnaval, zien eeuwige vijanden Fernand en DDT hun kans schoon om de Kampioenen voorgoed uit te schakelen.','Fm0WSExi_SE','https://be-nl-cdn.kinepolis.com/nl/sites/kinepolis.be.nl/files/styles/kinepolis_filter_movie_poster/public/posters/FCDeKampienen4_POSTER.jpg');

/*!40000 ALTER TABLE `movie` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `order_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(128) DEFAULT NULL,
  `lastname` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;

INSERT INTO `order` (`order_id`, `firstname`, `lastname`, `email`, `date`)
VALUES
	(1,'Dieter','De Weirdt','dieter@deweirdt.be','2019-12-05 21:00:00'),
	(2,'Bram','Braem','bram@bream.be','2019-12-05 21:07:00'),
	(3,'Me','Myself','me@myself.i','2019-12-05 20:47:30'),
	(4,'Pol','Pottie','pol@pottie.be','2019-12-05 20:48:44');

/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order_detail
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order_detail`;

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `schedule_id` int(11) DEFAULT NULL,
  `seat` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`order_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `order_detail` WRITE;
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `schedule_id`, `seat`)
VALUES
	(1,1,1,'01;01'),
	(2,1,1,'01;02'),
	(3,1,1,'01;03'),
	(4,1,1,'01;04'),
	(5,2,3,'03;12'),
	(6,2,3,'03;13'),
	(7,3,1,'03;05'),
	(8,3,1,'03;06'),
	(9,3,1,'03;07'),
	(10,4,1,'10;06'),
	(11,4,1,'10;07'),
	(12,4,1,'10;08'),
	(13,4,1,'10;09');

/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table room
# ------------------------------------------------------------

DROP TABLE IF EXISTS `room`;

CREATE TABLE `room` (
  `room_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `rows` int(11) DEFAULT NULL,
  `seats` int(11) DEFAULT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;

INSERT INTO `room` (`room_id`, `name`, `rows`, `seats`)
VALUES
	(1,'Kortrijk Zaal 1',10,15),
	(2,'Kortrijk Zaal 2',15,15),
	(3,'Gent Zaal 1',12,20),
	(4,'Gent Zaal 2',15,21);

/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table schedule
# ------------------------------------------------------------

DROP TABLE IF EXISTS `schedule`;

CREATE TABLE `schedule` (
  `schedule_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  PRIMARY KEY (`schedule_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;

INSERT INTO `schedule` (`schedule_id`, `movie_id`, `room_id`, `start_date`)
VALUES
	(1,1,1,'2019-12-15 20:00:00'),
	(2,1,2,'2019-12-15 22:00:00'),
	(3,2,1,'2019-12-16 14:00:00');

/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
