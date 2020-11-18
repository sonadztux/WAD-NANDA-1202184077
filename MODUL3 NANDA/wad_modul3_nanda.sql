-- Adminer 4.7.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE TABLE `event_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `mulai` time NOT NULL,
  `berakhir` time NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `benefit` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `event_table` (`id`, `name`, `deskripsi`, `gambar`, `kategori`, `tanggal`, `mulai`, `berakhir`, `tempat`, `harga`, `benefit`) VALUES
(24,	'Seminar Online',	'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut, reprehenderit consequuntur aliquam in a sint minus, consectetur nisi fuga non nobis esse magni accusamus repellendus repudiandae veritatis sed temporibus facere!',	'830037322_pokemon_momen.jpg',	'Offline',	'2020-11-18',	'22:20:00',	'00:00:00',	'Google Meet',	1212121,	'Snacks,Sertifikat,Souvenir'),
(25,	'Linux Ricing',	'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ad eaque assumenda ullam. Quia rem tenetur quis corporis et, nihil molestias? Quibusdam alias magnam animi eius ipsam quidem reprehenderit illum.',	'1539843937_sonadztux_linux_rice.jpg',	'Online',	'2020-11-18',	'21:56:00',	'23:56:00',	'Google Meet',	0,	'Snacks,Sertifikat,Souvenir'),
(26,	'Finding The Dragon Ball',	'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga ad eaque assumenda ullam. Quia rem tenetur quis corporis et, nihil molestias? Quibusdam alias magnam animi eius ipsam quidem reprehenderit illum.',	'1843438832_The_Grand_Dragon_Balls.png',	'Offline',	'2020-11-18',	'22:58:00',	'12:58:00',	'Orchid Forest Cikole',	5000000,	'Snacks,Souvenir');

-- 2020-11-18 15:19:41
