-- Adminer 3.3.4 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `xrsize_me`;
CREATE DATABASE `xrsize_me` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `xrsize_me`;

DROP TABLE IF EXISTS `blogg`;
CREATE TABLE `blogg` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  `text` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `blogg` (`id`, `user_id`, `group_id`, `text`, `date`) VALUES
(1,	1,	0,	'Kämpa!!',	'2011-07-19 15:00:00'),
(2,	2,	0,	'Kom igen nu då!!',	'2011-07-19 16:00:00'),
(3,	2,	0,	'Kör hårt!',	'2011-07-19 17:00:00'),
(4,	2,	0,	'Testing',	'2011-07-19 18:00:00'),
(5,	2,	0,	'Ni e så bra',	'2011-07-19 19:00:00'),
(6,	1,	0,	'Povar lite',	'2011-07-19 20:00:00'),
(7,	1,	0,	'Tjohoo!',	'2011-07-19 23:29:24'),
(8,	1,	0,	'Sweet!',	'2011-07-19 23:31:24'),
(12,	4,	0,	'Nu har jag sprungit 20 km totalt. Moahahaha!!:)',	'2011-07-20 17:32:49'),
(10,	1,	0,	'Känner mig peppad!',	'2011-07-20 00:28:43'),
(11,	6,	0,	'Hoppla!',	'2011-07-20 15:57:49'),
(13,	4,	0,	'Skulle vilja ha större ruta för att lättare se vad man skrivit, går det?;) ev en rad till eller så',	'2011-07-20 17:41:55'),
(14,	1,	0,	'Du får väl skriva kortare inlägg ;)',	'2011-07-20 19:57:21'),
(15,	2,	0,	'Grymt jobb med sidan älskling!!!',	'2011-07-24 17:15:04'),
(16,	1,	0,	'Ny stilen är här!',	'2011-08-05 12:26:38'),
(17,	6,	0,	'Just nu ägnar jag mig åt golvläggning på altanen, men sen blir det cykel och rodd.',	'2011-08-09 17:41:14'),
(18,	8,	0,	'vilken sida titta jag har hittat hit =)\r\n',	'2011-08-16 15:50:32'),
(19,	1,	0,	'Tack!',	'2011-08-24 19:20:17'),
(20,	8,	0,	'okej saknar lite mer olika tränings stillar tex workaut ',	'2011-08-25 07:21:32'),
(21,	1,	0,	'Skriv ner alla träningstypder du saknar och maila mig.',	'2011-08-25 10:29:34'),
(22,	4,	0,	'Egen Kommentar: Saknar rask promenad, crosstrainer, rodd, cykling, stavgång, bilkörning( glöm det sista;)',	'2011-09-01 19:01:44'),
(23,	6,	0,	'Kast med våt trasa kanske vore nåt :-)',	'2011-09-17 16:29:13'),
(24,	6,	0,	'Nu har det gått 4 dagar utan träning! Usch på mig!',	'2011-10-16 07:46:02'),
(25,	1,	0,	'Har kört spinning 2ggr nu å det känns kanon!!',	'2011-10-29 19:10:00'),
(26,	6,	0,	'Hela förra veckan utan träning, inte bra!',	'2011-11-18 21:03:19'),
(27,	7,	1,	'Så gött det känns i hela kroppen när man kommit igång!',	'2011-11-22 19:08:31'),
(28,	1,	0,	'Går ganska bra faktiskt!',	'2011-12-09 09:53:14'),
(29,	1,	0,	'Vi testar om nya designen funkar.',	'2012-02-14 16:38:44'),
(51,	1,	0,	'',	'2012-02-17 13:37:40'),
(50,	1,	0,	'Wohooo!',	'2012-02-14 16:41:49'),
(57,	9,	0,	'jfjfjf',	'2012-04-05 17:01:11'),
(56,	1,	1,	'Another form validation',	'2012-03-25 18:29:36'),
(55,	1,	1,	'Form validation',	'2012-03-25 18:29:23'),
(54,	1,	0,	'Testar url igen',	'2012-03-18 08:38:20'),
(53,	1,	0,	'Testar url',	'2012-03-18 08:38:04'),
(52,	1,	0,	'Orka!',	'2012-03-13 18:39:54'),
(58,	1,	2,	'Test',	'2012-04-07 14:16:47'),
(59,	1,	5,	'Första inlägget i familjen peppbloggen',	'2012-04-07 14:53:26'),
(60,	1,	3,	'Ett inlägg i vanliga gruppen.',	'2012-04-07 14:53:43'),
(61,	1,	1,	'Stoppar vi in en till då :)',	'2012-04-07 14:54:04'),
(62,	1,	3,	'Igen då.',	'2012-04-07 15:29:18'),
(63,	1,	1,	'Hepp!',	'2012-04-09 15:43:22'),
(64,	1,	2,	'Beta',	'2012-04-09 15:43:46');

DROP TABLE IF EXISTS `captcha`;
CREATE TABLE `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `year` int(10) unsigned NOT NULL,
  `month` int(10) unsigned NOT NULL,
  `day` int(10) unsigned NOT NULL,
  `time` int(10) unsigned NOT NULL,
  `eventtype_id` int(11) NOT NULL,
  `comment` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `week` int(11) DEFAULT NULL,
  `public` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `event` (`id`, `user_id`, `date`, `year`, `month`, `day`, `time`, `eventtype_id`, `comment`, `week`, `public`) VALUES
(36,	6,	'2011-10-12',	2011,	10,	12,	45,	6,	'',	41,	1),
(37,	1,	'2011-10-24',	2011,	10,	24,	45,	4,	'',	43,	1),
(38,	6,	'2011-11-17',	2011,	11,	17,	45,	5,	'Kändes skönt. Hade tänkt stanna vid 30 min. men så fanns det energi kvar för 20 till.',	46,	1),
(33,	6,	'2011-09-25',	2011,	9,	25,	30,	7,	'Lång promenad i skogen!',	38,	1),
(34,	6,	'2011-10-03',	2011,	10,	3,	45,	6,	'',	40,	1),
(35,	1,	'2011-10-03',	2011,	10,	3,	45,	4,	'Första gången på länge, fick nästan kramp i vaderna :)',	40,	1),
(11,	2,	'2011-07-22',	2011,	7,	22,	45,	11,	'Vincent väckte mig 06.45....\r\n',	29,	1),
(12,	6,	'2011-09-12',	2011,	9,	12,	45,	10,	'Egentligen promenad.',	37,	1),
(13,	6,	'2011-09-12',	2011,	9,	12,	45,	1,	'Promenad',	37,	1),
(14,	6,	'2011-09-13',	2011,	9,	13,	30,	1,	'Egentligen har jag ju rott! Du får lägga in det sen :-)',	37,	1),
(15,	4,	'2011-07-19',	2011,	7,	19,	60,	1,	'Rask promenad, ',	29,	1),
(16,	4,	'2011-07-20',	2011,	7,	20,	60,	1,	'Cross-trainer',	29,	1),
(17,	4,	'2011-07-18',	2011,	7,	18,	90,	1,	'Situps i 90 minuter, ',	29,	1),
(19,	5,	'2011-08-09',	2011,	8,	9,	45,	1,	'Intervall. 5,5 km.',	32,	1),
(20,	8,	'2011-08-10',	2011,	8,	10,	45,	1,	'',	32,	1),
(21,	8,	'2011-08-16',	2011,	8,	16,	30,	1,	'',	33,	1),
(22,	8,	'2011-08-24',	2011,	8,	24,	30,	3,	'men det var biggest looser ',	34,	1),
(23,	8,	'2011-08-29',	2011,	8,	29,	30,	3,	'biggest looser\r\n',	35,	1),
(24,	8,	'2011-08-31',	2011,	8,	31,	45,	3,	'',	35,	1),
(25,	4,	'2011-09-01',	2011,	9,	1,	30,	1,	'Saknar rask promenad, crosstrainer, rodd, cykling, stavgång, bilkörning( glöm det sista;)',	35,	1),
(26,	7,	'2011-09-12',	2011,	9,	12,	30,	1,	'Det blev orbitrack!',	37,	1),
(27,	6,	'2011-09-14',	2011,	9,	14,	45,	1,	'Promenad',	37,	1),
(28,	6,	'2011-09-15',	2011,	9,	15,	30,	1,	'Rodd.',	37,	1),
(29,	6,	'2011-09-16',	2011,	9,	16,	30,	1,	'Rodd',	37,	1),
(30,	6,	'2011-09-19',	2011,	9,	19,	30,	1,	'Rodd.',	38,	1),
(32,	6,	'2011-09-23',	2011,	9,	23,	45,	6,	'',	38,	1),
(39,	6,	'2011-11-22',	2011,	11,	22,	45,	5,	'50 min. blev det egentligen.',	47,	1),
(40,	7,	'2011-11-22',	2011,	11,	22,	45,	4,	'Orbitrec blev det.',	47,	1),
(41,	6,	'2011-11-27',	2011,	11,	27,	60,	6,	'',	47,	1),
(42,	1,	'2011-12-07',	2011,	12,	7,	60,	8,	'',	49,	1),
(43,	1,	'2011-12-05',	2011,	12,	5,	45,	4,	'',	49,	1),
(44,	1,	'2011-12-05',	2011,	12,	5,	30,	9,	'',	49,	1),
(45,	1,	'2011-12-11',	2011,	12,	11,	30,	1,	'Testing weks',	49,	1),
(46,	0,	'2011-10-03',	2011,	10,	3,	45,	1,	'Första gången på länge, fick nästan kramp i vaderna :)',	40,	1),
(47,	1,	'2011-12-11',	2011,	12,	11,	45,	1,	'Testing weks',	49,	1),
(48,	1,	'2011-12-11',	2011,	12,	11,	45,	1,	'Testing weks',	49,	1),
(49,	1,	'2011-12-11',	2011,	12,	11,	45,	1,	'Testing weks',	49,	1),
(50,	1,	'2011-12-11',	2011,	12,	11,	45,	1,	'Testing weks',	49,	1),
(51,	1,	'2011-12-11',	2011,	12,	11,	45,	1,	'Testing weeks',	49,	1),
(52,	1,	'2012-01-01',	2012,	1,	1,	90,	5,	'Vi testar lite funktioner',	52,	1),
(57,	1,	'2012-02-02',	2012,	2,	2,	30,	1,	'',	5,	1),
(58,	1,	'2012-02-03',	2012,	2,	3,	60,	4,	'',	5,	1),
(62,	1,	'2012-02-08',	2012,	2,	8,	60,	5,	'',	6,	1),
(64,	1,	'2012-02-12',	2012,	2,	12,	30,	1,	'',	6,	1),
(65,	1,	'2012-02-13',	2012,	2,	13,	75,	4,	'',	7,	1),
(66,	1,	'2012-02-14',	2012,	2,	14,	60,	8,	'',	7,	1),
(67,	1,	'2012-02-15',	2012,	2,	15,	75,	7,	'',	7,	1),
(68,	1,	'2012-02-16',	2012,	2,	16,	60,	3,	'',	7,	1),
(69,	1,	'2012-02-17',	2012,	2,	17,	60,	5,	'',	7,	1),
(70,	1,	'2012-02-18',	2012,	2,	18,	45,	6,	'',	7,	1),
(71,	1,	'2012-02-19',	2012,	2,	19,	90,	3,	'',	7,	1),
(72,	1,	'2012-02-20',	2012,	2,	20,	60,	1,	'',	8,	1),
(73,	1,	'2012-02-21',	2012,	2,	21,	75,	9,	'',	8,	1),
(74,	1,	'2012-02-01',	2012,	2,	1,	30,	1,	'',	5,	1),
(75,	1,	'2012-02-02',	2012,	2,	2,	60,	5,	'',	5,	1),
(76,	1,	'2012-02-08',	2012,	2,	8,	60,	4,	'',	6,	1),
(77,	1,	'2012-02-08',	2012,	2,	8,	90,	7,	'',	6,	1),
(79,	1,	'2012-02-02',	2012,	2,	2,	60,	10,	'',	5,	1),
(80,	1,	'2012-02-29',	2012,	2,	29,	60,	10,	'',	9,	1),
(81,	1,	'2012-02-20',	2012,	2,	20,	30,	1,	'',	8,	1),
(82,	1,	'2012-02-21',	2012,	2,	21,	60,	5,	'',	8,	1),
(85,	1,	'2012-03-01',	2012,	3,	1,	30,	1,	'',	9,	1),
(86,	1,	'2012-03-03',	2012,	3,	3,	90,	2,	'',	1,	1),
(87,	1,	'2012-03-02',	2012,	3,	2,	30,	1,	'',	9,	1),
(88,	1,	'2012-03-02',	2012,	3,	2,	30,	12,	'',	9,	1),
(95,	1,	'2012-04-05',	2012,	4,	5,	30,	1,	'',	14,	1),
(96,	1,	'2012-04-03',	2012,	4,	3,	60,	1,	'',	14,	1),
(97,	1,	'2012-04-25',	2012,	4,	25,	60,	5,	'',	17,	1),
(94,	1,	'2012-04-02',	2012,	4,	2,	30,	1,	'',	1,	1),
(98,	1,	'2012-04-10',	2012,	4,	10,	60,	1,	'',	15,	1),
(99,	1,	'2012-04-06',	2012,	4,	6,	55,	1,	'',	14,	1),
(100,	1,	'2012-04-09',	2012,	4,	9,	45,	1,	'',	13,	1);

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
(5,	'Rodd',	NULL,	NULL),
(6,	'Promenad',	NULL,	NULL),
(7,	'Svampplockning',	NULL,	NULL),
(8,	'Spinning/Core',	NULL,	NULL),
(9,	'Core',	NULL,	NULL),
(10,	'Scubadiving',	NULL,	NULL),
(11,	'Klättring',	NULL,	NULL),
(12,	'Crosstrainer',	NULL,	NULL);

DROP TABLE IF EXISTS `goal`;
CREATE TABLE `goal` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `start` date NOT NULL,
  `stop` date NOT NULL,
  `trained_time` int(11) DEFAULT NULL,
  `event_amount` int(11) DEFAULT NULL,
  `comment` text,
  `public` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner_id` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `group` (`id`, `name`, `tag`, `desc`, `owner_id`) VALUES
(1,	'testgrupp',	'TEST',	'Testanvändare',	'1'),
(2,	'betatestare',	'BETA',	'Betatestare',	'1'),
(3,	'vanlig_grupp',	'VANLIG',	'',	'1'),
(5,	'familjen',	'ALM',	'',	'1'),
(6,	'ännu ett test',	'testigen',	NULL,	'2');

DROP TABLE IF EXISTS `group_admin`;
CREATE TABLE `group_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `group_admin` (`id`, `group_id`, `user_id`) VALUES
(1,	1,	2),
(2,	1,	4);

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
  `group_id` int(10) unsigned DEFAULT NULL,
  `profile_img` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user` (`id`, `user_name`, `name`, `pass`, `email`, `group_id`, `profile_img`, `admin`) VALUES
(1,	'pontus',	'Pontus Alm',	'2ec9a963e1359dee7d4a8eb5af43b57dc675e3ed',	'pontus@almar.se',	1,	'none.png',	'100'),
(2,	'linda',	'Linda',	'23f2f13cd3b1fe507851713d92e70cb8fb98db41',	'',	1,	'none.png',	NULL),
(3,	'test',	'Test Person',	'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',	'',	1,	'none.png',	NULL),
(4,	'mihael',	'Mihael Laketa',	'6367c48dd193d56ea7b0baad25b19455e529f5ee',	'Mihael@hotmail.com',	1,	'none.png',	NULL),
(5,	'carina',	'Carina Lillbäck-Larsson',	'6367c48dd193d56ea7b0baad25b19455e529f5ee',	'',	1,	'none.png',	NULL),
(6,	'toivo',	'Toivo Alm',	'3e34f7c6401c63b9f26b6707578a75001f01d6b3',	'toivo@almar.se',	1,	'none.png',	NULL),
(7,	'majvor',	'Majvor Alm',	'3e34f7c6401c63b9f26b6707578a75001f01d6b3',	'',	1,	'none.png',	NULL),
(8,	'tina',	'Tina Laketa',	'51066b8c2c8ead5ea8d35a4903572fa6d3d3b4e0',	'tina@laketa.com',	1,	'none.png',	NULL),
(9,	'pelle',	'Pelle',	'09eac806635b37de93ae6f168a783e0fd24f0daf',	'pelle@pelle.com',	NULL,	NULL,	NULL),
(10,	'stina',	'Stina',	'637d1f5c6e6d1be22ed907eb3d223d858ca396d8',	'stina@stina.se',	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `user_group`;
CREATE TABLE `user_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  `applied` tinyint(3) unsigned DEFAULT NULL,
  `invited` tinyint(3) unsigned DEFAULT NULL,
  `confirmed` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user_group` (`id`, `user_id`, `group_id`, `applied`, `invited`, `confirmed`) VALUES
(1,	1,	1,	NULL,	NULL,	1),
(2,	1,	2,	NULL,	NULL,	1),
(3,	1,	3,	NULL,	NULL,	1),
(4,	1,	5,	NULL,	NULL,	1),
(5,	2,	6,	NULL,	NULL,	1),
(6,	2,	1,	NULL,	NULL,	1),
(7,	4,	1,	NULL,	NULL,	1),
(8,	5,	1,	NULL,	NULL,	1),
(9,	6,	1,	NULL,	NULL,	1),
(10,	7,	1,	NULL,	NULL,	1),
(11,	8,	1,	NULL,	NULL,	1);

DROP VIEW IF EXISTS `weekpoints`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `weekpoints` AS select `user`.`id` AS `id`,`user`.`name` AS `name`,`event`.`week` AS `week`,sum(`event`.`time`) AS `points`,year(`event`.`date`) AS `year` from (`user` join `event`) where (`event`.`user_id` = `user`.`id`) group by `user`.`id`,`event`.`week`;

-- 2012-04-17 23:37:12
