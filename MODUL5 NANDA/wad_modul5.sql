-- Adminer 4.7.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `wad_modul5`;
CREATE DATABASE `wad_modul5` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `wad_modul5`;

SET NAMES utf8mb4;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

TRUNCATE `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2020_12_06_135853_create_products_table',	1),
(4,	'2020_12_06_135901_create_orders_table',	1);

CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `amount` int(11) NOT NULL,
  `buyer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_product_id_foreign` (`product_id`),
  CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

TRUNCATE `orders`;
INSERT INTO `orders` (`id`, `product_id`, `amount`, `buyer_name`, `buyer_contact`, `created_at`, `updated_at`) VALUES
(1,	3,	2330,	'Alexander Deden',	'083283281121',	'2020-12-06 08:49:07',	'2020-12-06 08:49:07'),
(3,	2,	2500,	'Nanda Arfan Hakim',	'1122334455',	'2020-12-06 09:16:14',	'2020-12-06 09:16:14'),
(4,	7,	30000,	'Galih',	'0448384384',	'2020-12-06 09:16:38',	'2020-12-06 09:16:38'),
(5,	7,	20000,	'Ratna',	'21219280980980',	'2020-12-06 09:16:53',	'2020-12-06 09:16:53');

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

TRUNCATE `password_resets`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `img_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

TRUNCATE `products`;
INSERT INTO `products` (`id`, `name`, `price`, `description`, `stock`, `img_path`) VALUES
(2,	'Pikachu Moment Air Aing Sia Belegug',	2500,	'Pikachu is a electric-type species of Pokémon, fictional creatures that appear in an assortment of video games, television shows, and comic books.',	0,	'1607267873.jpg'),
(3,	'Schrödinger\'s cat',	2330,	'Schrödinger\'s cat is a thought experiment, sometimes described as a paradox, devised by Austrian-Irish physicist Erwin Schrödinger.',	0,	'1607267912.png'),
(7,	'iGracias',	10000,	'please sign-in using your igracias account to access this page',	5,	'1607271219.jpg');

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

TRUNCATE `users`;

-- 2020-12-06 16:19:59
