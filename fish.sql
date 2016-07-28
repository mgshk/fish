-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2016 at 04:38 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fish`
--
CREATE DATABASE IF NOT EXISTS `fish` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fish`;

-- --------------------------------------------------------

--
-- Table structure for table `f_items`
--

CREATE TABLE IF NOT EXISTS `f_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type` enum('1','2','3') NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_price` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `f_items`
--

INSERT INTO `f_items` (`item_id`, `item_type`, `item_name`, `item_quantity`, `item_price`) VALUES
(1, '1', 'dfgdfg', 4545, 4545),
(2, '3', 'fdg', 45, 45),
(3, '3', 'fdg', 45, 45),
(4, '3', 'fdg', 45, 45),
(5, '3', 'ert', 45, 56);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
