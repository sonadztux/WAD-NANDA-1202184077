-- Adminer 4.7.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `wad_modul4`;
CREATE DATABASE `wad_modul4` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `wad_modul4`;

CREATE TABLE `cart` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `harga` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `cart`;
INSERT INTO `cart` (`id`, `user_id`, `nama_barang`, `harga`) VALUES
(8,	5,	'YUJA NIACIN 30 DAYS BLEMISH CARE SERUM',	169000),
(11,	5,	'SOMEBYMI Snail Truecica Miracle Repair Cream',	180000),
(12,	5,	'YUJA NIACIN 30 DAYS BLEMISH CARE SERUM',	169000),
(13,	5,	'SOMEBYMI Snail Truecica Miracle Repair Cream',	180000),
(14,	5,	'30 DAYS MIRACLE TONER SKIN CARE',	108000),
(15,	6,	'YUJA NIACIN 30 DAYS BLEMISH CARE SERUM',	169000),
(16,	6,	'SOMEBYMI Snail Truecica Miracle Repair Cream',	180000),
(17,	6,	'30 DAYS MIRACLE TONER SKIN CARE',	108000),
(18,	9,	'YUJA NIACIN 30 DAYS BLEMISH CARE SERUM',	169000),
(20,	9,	'30 DAYS MIRACLE TONER',	108000),
(21,	10,	'SOMEBYMI Snail Truecica Miracle Repair Cream',	180000),
(22,	10,	'30 DAYS MIRACLE TONER SKIN CARE',	108000),
(23,	10,	'YUJA NIACIN 30 DAYS BLEMISH CARE SERUM',	169000),
(24,	10,	'SOMEBYMI Snail Truecica Miracle Repair Cream',	180000),
(26,	10,	'30 DAYS MIRACLE TONER SKIN CARE',	108000);

CREATE TABLE `user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` bigint(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `user`;
INSERT INTO `user` (`id`, `nama`, `email`, `no_hp`, `password`) VALUES
(5,	'Mang Dadang',	'ie@email.com',	121271,	'$2y$10$0C2K5vYWyjMTdD4R8SeJ.uS.poqYQUF.WxrL37x8yDvISYG4uqQCS'),
(6,	'Admin Cuk',	'admin@email.com',	666,	'$2y$10$CaysKLH9TSM1hNaJF5G2AOFwhRoiWp5wdgn1eG/7veegYNX1mDFDK'),
(9,	'User Testing',	'coba@email.com',	1233,	'$2y$10$BuiVXJMHqvbREUE13uMeJeW1VIY4V42X4y.qsuTCyWGQks3E2UFUi'),
(10,	'Alexander Deden',	'alexanderdeden@gmail.com',	1337,	'$2y$10$Y2egkapOJ0lQDhCKZf.73eaonGQbQi95B1TVqy.1tJ.BEBpAO9QBG');

-- 2020-11-21 13:41:47
