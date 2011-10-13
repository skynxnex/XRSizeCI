-- Adminer 3.3.3 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `xrsize`;
CREATE DATABASE `xrsize` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `xrsize`;

DROP TABLE IF EXISTS `blogg`;
CREATE TABLE `blogg` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `text` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `blogg` (`id`, `user_id`, `text`, `date`) VALUES
(1,	1,	'Kämpa!!',	'2011-07-19 15:00:00'),
(2,	2,	'Kom igen nu då!!',	'2011-07-19 16:00:00'),
(3,	2,	'Kör hårt!',	'2011-07-19 17:00:00'),
(4,	2,	'Testing',	'2011-07-19 18:00:00'),
(5,	2,	'Ni e så bra',	'2011-07-19 19:00:00'),
(6,	1,	'Povar lite',	'2011-07-19 20:00:00'),
(7,	1,	'Tjohoo!',	'2011-07-19 23:29:24'),
(8,	1,	'Sweet!',	'2011-07-19 23:31:24'),
(12,	4,	'Nu har jag sprungit 20 km totalt. Moahahaha!!:)',	'2011-07-20 17:32:49'),
(10,	1,	'Känner mig peppad!',	'2011-07-20 00:28:43'),
(11,	6,	'Hoppla!',	'2011-07-20 15:57:49'),
(13,	4,	'Skulle vilja ha större ruta för att lättare se vad man skrivit, går det?;) ev en rad till eller så',	'2011-07-20 17:41:55'),
(14,	1,	'Du får väl skriva kortare inlägg ;)',	'2011-07-20 19:57:21'),
(15,	2,	'Grymt jobb med sidan älskling!!!',	'2011-07-24 17:15:04'),
(16,	1,	'Ny stilen är här!',	'2011-08-05 12:26:38'),
(17,	6,	'Just nu ägnar jag mig åt golvläggning på altanen, men sen blir det cykel och rodd.',	'2011-08-09 17:41:14'),
(18,	8,	'vilken sida titta jag har hittat hit =)\r\n',	'2011-08-16 15:50:32'),
(19,	1,	'Tack!',	'2011-08-24 19:20:17'),
(20,	8,	'okej saknar lite mer olika tränings stillar tex workaut ',	'2011-08-25 07:21:32'),
(21,	1,	'Skriv ner alla träningstypder du saknar och maila mig.',	'2011-08-25 10:29:34');

DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `time` int(10) unsigned NOT NULL,
  `eventtype_id` int(11) NOT NULL,
  `comment` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `event` (`id`, `user_id`, `date`, `time`, `eventtype_id`, `comment`) VALUES
(1,	1,	'2011-07-19',	30,	1,	'Testträning'),
(2,	1,	'2011-07-20',	30,	1,	''),
(3,	1,	'2011-07-21',	30,	1,	'Sprang som en gnu!'),
(4,	1,	'2011-07-18',	30,	1,	'tjoho'),
(5,	1,	'2011-07-12',	30,	2,	''),
(6,	1,	'2011-07-18',	30,	1,	''),
(7,	1,	'2011-07-19',	60,	3,	'Dance baby dance!'),
(8,	1,	'2011-07-13',	75,	3,	'Danced my ass off!'),
(11,	2,	'2011-07-22',	45,	1,	'Vincent väckte mig 06.45....\r\n'),
(12,	6,	'2011-07-20',	30,	3,	''),
(13,	6,	'2011-07-21',	45,	1,	''),
(14,	6,	'2011-07-22',	30,	1,	''),
(15,	4,	'2011-07-19',	60,	1,	'Rask promenad, '),
(16,	4,	'2011-07-20',	60,	1,	'Cross-trainer'),
(17,	4,	'2011-07-18',	90,	1,	'Situps i 90 minuter, '),
(18,	1,	'2011-07-23',	45,	4,	'Oj vad jag cyklade!'),
(19,	5,	'2011-08-09',	45,	1,	'Intervall. 5,5 km.'),
(20,	8,	'2011-08-10',	45,	1,	''),
(21,	8,	'2011-08-16',	30,	1,	''),
(22,	8,	'2011-08-24',	30,	3,	'men det var biggest looser '),
(23,	1,	'2011-09-23',	30,	1,	''),
(24,	1,	'2011-09-23',	30,	12,	'');

DROP TABLE IF EXISTS `eventtype`;
CREATE TABLE `eventtype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `eventtype` (`id`, `name`, `description`, `parent`) VALUES
(1,	'Löpning',	'Träningsform antingen på löpband eller utomhus.',	NULL),
(2,	'Box',	'Boxas!',	NULL),
(3,	'Zumba',	'Hemma eller på gym.',	NULL),
(4,	'Spinning',	'Cykelmaraton!',	NULL),
(6,	'Hopp',	NULL,	NULL),
(7,	'Hepp',	NULL,	NULL),
(8,	'Foo',	NULL,	NULL),
(9,	'Foo',	NULL,	NULL),
(10,	'Foo',	NULL,	NULL),
(11,	'Foo',	NULL,	NULL),
(12,	'Test',	NULL,	NULL);

DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `group` (`id`, `name`, `desc`) VALUES
(1,	'Testgrupp',	'Betatestare för siten.');

DROP TABLE IF EXISTS `info`;
CREATE TABLE `info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `header` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `infotype_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `info` (`id`, `header`, `content`, `date`, `user_id`, `infotype_id`) VALUES
(1,	'Den första rubriken!',	'Sidan börjar nu ta form och detta är första informationsmeddelandet.',	'2011-07-17',	1,	1),
(2,	'Testrubrik',	'Vi testar för att se att funktionerna funkar som dom ska.',	'2011-07-18',	2,	1),
(3,	'Vi testar på',	'För att se att sidan funkar som den ska behövs testdata.',	'2011-07-19',	1,	1),
(4,	'Version 1.0',	'Då är första versionen av XRsize.me igång!! Prova gärna allt som finns, både på rätt och fel sätt och meddela mig sen vad som inte funkar!',	'2011-07-19',	1,	1),
(5,	'ver 1.1',	'<p>Nu kan du:</p>\r\n<ul>\r\n<li>Lägga till träningstillfälle.</li>\r\n<li>Lista din träningstillfällen.</li>\r\n<li>Se egen statistik.</li>\r\n<li>Sen andras statistik (som är i din grupp).</li>\r\n<li>Ändra på ditt träningstillfälle.</li>\r\n<li>Se din profil.</li>\r\n<li>Skriva i peppbloggen.</li>\r\n</ul>',	'2011-07-20',	1,	2),
(6,	'Uppdatering!',	'<p>Har lagt ner en hel del tid på att göra sidan lite snyggare och validering för alla fält så att det inte går att stoppa in fel typ av data.</p>\r\n<p>Nu går det även att:</p>\r\n<ul>\r\n<li>Ändra lösenord</li>\r\n<li>Ändra i sin profil</li>\r\n<li>Ta bort träningstillfälle</li>\r\n<li>Lista alla träningstillfällen, inte bara de 5 senaste.</li>\r\n</ul>\r\n\r\n<p>Uppdateringar kommer fortlöpande och har ni några idéer om vad som borde finnas här så maila mig gärna!</p>',	'2011-07-23',	1,	2);

DROP TABLE IF EXISTS `infotype`;
CREATE TABLE `infotype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `desc` varchar(300) DEFAULT NULL,
  `picture` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `infotype` (`id`, `name`, `desc`, `picture`) VALUES
(1,	'Nyhet',	NULL,	'info_small.png'),
(2,	'Uppdatering',	NULL,	'update.png');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  `profile_img` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user` (`id`, `user_name`, `name`, `pass`, `email`, `group_id`, `profile_img`, `admin`) VALUES
(1,	'pontus',	'Pontus Alm',	'2ec9a963e1359dee7d4a8eb5af43b57dc675e3ed',	'pontus@xrsize.me',	1,	'none.png',	'100'),
(2,	'linda',	'Linda',	'23f2f13cd3b1fe507851713d92e70cb8fb98db41',	'',	1,	'none.png',	NULL),
(3,	'test',	'Test Person',	'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',	'',	1,	'none.png',	NULL),
(4,	'mihael',	'Mihael Laketa',	'6367c48dd193d56ea7b0baad25b19455e529f5ee',	'',	1,	'none.png',	NULL),
(5,	'carina',	'Carina Lillbäck-Larsson',	'6367c48dd193d56ea7b0baad25b19455e529f5ee',	'',	1,	'none.png',	NULL),
(6,	'toivo',	'Toivo Alm',	'3e34f7c6401c63b9f26b6707578a75001f01d6b3',	'toivo@almar.se',	1,	'none.png',	NULL),
(7,	'majvor',	'Majvor Alm',	'3e34f7c6401c63b9f26b6707578a75001f01d6b3',	'',	1,	'none.png',	NULL),
(8,	'tina',	'Tina Laketa',	'51066b8c2c8ead5ea8d35a4903572fa6d3d3b4e0',	'tina@laketa.com',	1,	'none.png',	NULL);

-- 2011-10-13 11:24:48
