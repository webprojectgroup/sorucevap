-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2014 at 11:51 PM
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
  `id` int(11) NOT NULL,
  `rol_ismi` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `secenekler`
--

CREATE TABLE IF NOT EXISTS `secenekler` (
  `id` int(11) NOT NULL,
  `secenek` varchar(50) NOT NULL,
  `soru_fk` int(11) NOT NULL,
  `dogru_mu` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `soru`
--

CREATE TABLE IF NOT EXISTS `soru` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `zorlukderecesi_fk` int(11) NOT NULL,
  `soru` text NOT NULL,
  `soru_kategori_fk` int(2) NOT NULL,
  `ekleyen_fk` int(5) NOT NULL,
  `onay` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `soru_kategorileri`
--

CREATE TABLE IF NOT EXISTS `soru_kategorileri` (
  `id` int(11) NOT NULL,
  `kategori_ismi` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `soru_puan`
--

CREATE TABLE IF NOT EXISTS `soru_puan` (
  `id` int(11) NOT NULL,
  `soru_fk` int(11) NOT NULL,
  `begeni` tinyint(1) NOT NULL,
  `oylayan_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uyeler`
--

CREATE TABLE IF NOT EXISTS `uyeler` (
  `id` int(11) NOT NULL,
  `ad` varchar(25) NOT NULL,
  `soyad` varchar(25) NOT NULL,
  `uye_adi` varchar(15) NOT NULL,
  `eposta` varchar(30) NOT NULL,
  `dogum_tarihi` date NOT NULL,
  `cep_tel` int(11) NOT NULL,
  `sifre` varchar(32) NOT NULL,
  `rol_fk` int(2) NOT NULL,
  `onay_kodu` int(15) NOT NULL,
  `aktif_mi` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uye_kategori`
--

CREATE TABLE IF NOT EXISTS `uye_kategori` (
  `id` int(11) NOT NULL,
  `uye_fk` int(11) NOT NULL,
  `kategori_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `zorluk_derecesi`
--

CREATE TABLE IF NOT EXISTS `zorluk_derecesi` (
  `id` int(11) NOT NULL,
  `zorluk` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
