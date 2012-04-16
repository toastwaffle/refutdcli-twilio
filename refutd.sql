-- phpMyAdmin SQL Dump
-- version 3.5.0-beta1
-- http://www.phpmyadmin.net
--
-- Host: mysql-shared-02.phpfog.com
-- Generation Time: Apr 16, 2012 at 04:23 PM
-- Server version: 5.5.12-log
-- PHP Version: 5.3.2-1ubuntu4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `refuntdhack_phpfogapp_com`
--

-- --------------------------------------------------------

--
-- Table structure for table `phpreg`
--

CREATE TABLE IF NOT EXISTS `phpreg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serverid` int(11) NOT NULL,
  `userid` tinytext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
