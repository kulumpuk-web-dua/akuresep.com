# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.19)
# Database: akuresep
# Generation Time: 2017-11-12 04:06:38 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `akses` int(11) DEFAULT NULL,
  `dibuat_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table detail_bahan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `detail_bahan`;

CREATE TABLE `detail_bahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resep` int(11) DEFAULT NULL,
  `bahan` varchar(100) DEFAULT NULL,
  `jumlah` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_resep` (`id_resep`),
  CONSTRAINT `detail_bahan_ibfk_1` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table detail_gambar
# ------------------------------------------------------------

DROP TABLE IF EXISTS `detail_gambar`;

CREATE TABLE `detail_gambar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resep` int(11) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `utama` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `detail_gambar_ibfk_1` (`id_resep`),
  CONSTRAINT `detail_gambar_ibfk_1` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table detail_langkah
# ------------------------------------------------------------

DROP TABLE IF EXISTS `detail_langkah`;

CREATE TABLE `detail_langkah` (
  `id` int(11) DEFAULT NULL,
  `id_resep` int(11) DEFAULT NULL,
  `langkah` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  KEY `id_resep` (`id_resep`),
  CONSTRAINT `detail_langkah_ibfk_1` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table diskusi_resep
# ------------------------------------------------------------

DROP TABLE IF EXISTS `diskusi_resep`;

CREATE TABLE `diskusi_resep` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resep` int(11) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `pesan` text,
  `dibuat_pada` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pengguna` (`id_pengguna`),
  KEY `id_resep` (`id_resep`),
  CONSTRAINT `diskusi_resep_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `diskusi_resep_ibfk_2` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table kategori
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `gambar` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table login
# ------------------------------------------------------------

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `type` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table pengguna
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pengguna`;

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_depan` varchar(50) DEFAULT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table resep
# ------------------------------------------------------------

DROP TABLE IF EXISTS `resep`;

CREATE TABLE `resep` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `porsi` int(11) DEFAULT NULL,
  `durasi` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `tag` text,
  `dibuat_pada` datetime DEFAULT NULL,
  `diubah_pada` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kategori` (`id_kategori`),
  KEY `id_pengguna` (`id_pengguna`),
  CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `resep_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
