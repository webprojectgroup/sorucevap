-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2014 at 04:39 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `soru_cevap`
--

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_ismi` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id`, `rol_ismi`) VALUES
(1, 'Ogrenci'),
(2, 'Ogretmen'),
(3, 'Editor'),
(4, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `secenekler`
--

CREATE TABLE IF NOT EXISTS `secenekler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `secenek` varchar(50) NOT NULL,
  `soru_fk` int(11) NOT NULL,
  `dogru_mu` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `soru`
--

CREATE TABLE IF NOT EXISTS `soru` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `zorluk_derecesi_fk` int(11) NOT NULL,
  `soru` text NOT NULL,
  `soru_kategori_fk` int(2) NOT NULL,
  `ekleyen_fk` int(5) NOT NULL,
  `onay` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `soru_kategorileri`
--

CREATE TABLE IF NOT EXISTS `soru_kategorileri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_ismi` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `soru_kategorileri`
--

INSERT INTO `soru_kategorileri` (`id`, `kategori_ismi`) VALUES
(1, 'mat'),
(2, 'fen'),
(3, 'kim'),
(4, 'biy'),
(5, 'tur');

-- --------------------------------------------------------

--
-- Table structure for table `soru_puan`
--

CREATE TABLE IF NOT EXISTS `soru_puan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `soru_fk` int(11) NOT NULL,
  `begeni` tinyint(1) NOT NULL,
  `oylayan_fk` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uyeler`
--

CREATE TABLE IF NOT EXISTS `uyeler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(25) NOT NULL,
  `soyad` varchar(25) NOT NULL,
  `uye_adi` varchar(15) NOT NULL,
  `eposta` varchar(30) NOT NULL,
  `dogum_tarihi` date NOT NULL,
  `cep_tel` int(11) NOT NULL,
  `sifre` varchar(32) NOT NULL,
  `rol_fk` int(2) NOT NULL DEFAULT '1',
  `onay_kodu` int(15) NOT NULL,
  `aktif_mi` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `uyeler`
--

INSERT INTO `uyeler` (`id`, `ad`, `soyad`, `uye_adi`, `eposta`, `dogum_tarihi`, `cep_tel`, `sifre`, `rol_fk`, `onay_kodu`, `aktif_mi`) VALUES
(1, 'mustafa', 'iran', 'miran', 'm@ma.com', '0000-00-00', 9007788, '202cb962ac59075b964b07152d234b70', 1, 1521, 0),
(2, '2', '1', 'kkk', '1', '0000-00-00', 3, 'c9f0f895fb98ab9159f51fd0297e236d', 1, 30656, 0);

-- --------------------------------------------------------

--
-- Table structure for table `uye_kategori`
--

CREATE TABLE IF NOT EXISTS `uye_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uye_fk` int(11) NOT NULL,
  `kategori_fk` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `zorluk_derecesi`
--

CREATE TABLE IF NOT EXISTS `zorluk_derecesi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zorluk` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `zorluk_derecesi`
--

INSERT INTO `zorluk_derecesi` (`id`, `zorluk`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
