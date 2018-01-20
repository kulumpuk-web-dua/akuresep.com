/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : akuresep

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-01-21 03:12:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `akses` int(11) DEFAULT NULL,
  `dibuat_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------

-- ----------------------------
-- Table structure for `detail_gambar`
-- ----------------------------
DROP TABLE IF EXISTS `detail_gambar`;
CREATE TABLE `detail_gambar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_resep` int(11) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `utama` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `detail_gambar_ibfk_1` (`id_resep`),
  CONSTRAINT `detail_gambar_ibfk_1` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detail_gambar
-- ----------------------------
INSERT INTO `detail_gambar` VALUES ('1', '2', '4f91dcde542cae6899874dc7deb8457d.jpg', '1');
INSERT INTO `detail_gambar` VALUES ('2', '4', 'e22084461b1577652705420f42c34631.jpg', '1');

-- ----------------------------
-- Table structure for `diskusi_resep`
-- ----------------------------
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of diskusi_resep
-- ----------------------------
INSERT INTO `diskusi_resep` VALUES ('1', '4', '1', 'cobain', '2018-01-21 01:45:28');

-- ----------------------------
-- Table structure for `kategori`
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `gambar` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES ('1', 'Makanan', 'Qui elit dolor do culpa velit ut officia fugiat.', 'anekakue.jpg');
INSERT INTO `kategori` VALUES ('2', 'Minuman', 'Qui elit dolor do culpa velit ut officia fugiat.', 'anekakue.jpg');
INSERT INTO `kategori` VALUES ('3', 'Sambal', 'Qui elit dolor do culpa velit ut officia fugiat.', 'anekakue.jpg');
INSERT INTO `kategori` VALUES ('4', 'Cemilan', 'Qui elit dolor do culpa velit ut officia fugiat.', 'anekakue.jpg');
INSERT INTO `kategori` VALUES ('5', 'Kue', 'Qui elit dolor do culpa velit ut officia fugiat.', 'anekakue.jpg');
INSERT INTO `kategori` VALUES ('6', 'Sop', 'Qui elit dolor do culpa velit ut officia fugiat.', 'anekakue.jpg');
INSERT INTO `kategori` VALUES ('7', 'Tumis', 'Qui elit dolor do culpa velit ut officia fugiat.', 'anekakue.jpg');
INSERT INTO `kategori` VALUES ('8', 'Kukus', 'Qui elit dolor do culpa velit ut officia fugiat.', 'anekakue.jpg');
INSERT INTO `kategori` VALUES ('9', 'Panggang', 'Qui elit dolor do culpa velit ut officia fugiat.', 'anekakue.jpg');
INSERT INTO `kategori` VALUES ('10', 'Gorengan', 'Qui elit dolor do culpa velit ut officia fugiat.', 'anekakue.jpg');
INSERT INTO `kategori` VALUES ('11', 'Dessert', 'Qui elit dolor do culpa velit ut officia fugiat.', 'anekakue.jpg');

-- ----------------------------
-- Table structure for `login`
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `type` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES ('1', 'udin@akuresep.com', 'udinsedunia', 'pengguna');
INSERT INTO `login` VALUES ('2', 'rizky@mail.com', 'qwe123', 'pengguna');
INSERT INTO `login` VALUES ('3', 'iki@mail.com', 'qwe123', 'pengguna');

-- ----------------------------
-- Table structure for `pengguna`
-- ----------------------------
DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_depan` varchar(50) DEFAULT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `poto` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pengguna
-- ----------------------------
INSERT INTO `pengguna` VALUES ('1', 'Udin', 'Komarudin', 'udin@akuresep.com', 'Koki', null);
INSERT INTO `pengguna` VALUES ('2', 'Rizky', 'Pahtul', 'rizky@mail.com', 'mahasisw', '76d6b533e27a2d20940e7e7d93b323fc.jpg');
INSERT INTO `pengguna` VALUES ('3', 'iki', 'chan', 'iki@mail.com', 'Mahasiswa', null);

-- ----------------------------
-- Table structure for `resep`
-- ----------------------------
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
  `langkah_resep` text,
  `bahan_bahan` text,
  `dibuat_pada` datetime DEFAULT NULL,
  `diubah_pada` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kategori` (`id_kategori`),
  KEY `id_pengguna` (`id_pengguna`),
  CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `resep_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of resep
-- ----------------------------
INSERT INTO `resep` VALUES ('1', '1', '5', 'Bolu Gulung', '4', '20 Menit', 'Resep masakan pertamaku, kue bolu gulung', 'kue, bolu, enak, manis', 'Masukkan tepung secukupnya\r\ntambah gula 1 kg\r\nair 1 liter\r\ngaram satu bungkus\r\nbawang satu bal\r\n', 'Tepung\r\nGula\r\nAir\r\nGaram\r\nBawang\r\nKecap\r\n', null, null);
INSERT INTO `resep` VALUES ('2', '2', '3', 'Sambal Matah', '2', '15 Menit', 'Ga lengkap donk posting sate lilit tanpa sambal matah, kan temannya ðŸ˜ sekalipun ngga lg bikin nasi bali tp sy sering banget lah bikin sambal matah dirumah krn segala seafood dan menu bakar2an paling pas dijodohin sama sambal matah ini atau sodara nya sambal matah yg dr manado itu...dabu2 ðŸ˜„ juga segeeer ðŸ‘banyak versi sambal matah ada yg pake bawang putih, kalo sy tanpa bawang putih ini ngikutin versi matah nya bebek bengil bali...kalo mau bawang putih silahkan pakai, ngga suka daun jeruk di skip aja, kalo suka kecombrang bisa ditambahin, suka terasi tambahin. Fleksibel aja.. sesuai bahan2 yg ada di dapur. Yuk bikiin ðŸ˜‰', 'sambal, pedas, enak', 'Cuci bersih cabe, bawang, sereh, daun jeruk purut. Iris halus semua nya taro dlm mangkok\r\n\r\nTambahkan garam, gula, air jeruk nipis aduk rata sambil ditekan2 boleh pake tangan diremas2 kalo tahan pedeees ðŸ˜„ðŸ˜‚\r\n\r\nPanaskan minyak makan dlm wajan. Siramkan minyak panas ke dalam campuran cabe. Aduk rata. Sajikan. Gampaaang kan ðŸ˜„', '15 bh cabe rawit merah\r\n8 btr bawang merah\r\n2 btg sereh ambil bagian dalamnya yg putih\r\n1 sdm air jeruk nipis\r\n3 sdm minyak goreng\r\nsecukupnya garam , gula', null, null);
INSERT INTO `resep` VALUES ('4', '2', '1', 'Minuman bersoda', '2', '5 Menit', 'cara nya adalah dengan menambahkan soda', '', 'campurkan semua baha\r\nnikmati\r\nntaps', '1 kaleng soda\r\nair minum soda\r\ntambah es batu', '2018-01-21 00:35:10', null);
