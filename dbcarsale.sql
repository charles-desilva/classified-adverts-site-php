-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Feb 04, 2021 at 03:14 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcarsale`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(3, 'Nissan1'),
(4, 'Mitsubishi'),
(5, 'Mercedes Benz'),
(6, 'Honda'),
(7, 'BMW'),
(8, 'Perodua'),
(9, 'Suzuki'),
(10, 'Toyota');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

DROP TABLE IF EXISTS `car`;
CREATE TABLE IF NOT EXISTS `car` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `model_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `fuel_type` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `mileage` int(11) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(255) NOT NULL,
  `sold` tinyint(1) NOT NULL,
  `view_count` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `title`, `description`, `model_id`, `member_id`, `fuel_type`, `year`, `mileage`, `price`, `photo`, `sold`, `view_count`, `date`) VALUES
(2, 'Test listing', 'tertertert', 4, 1, '1', 1999, 123124, 124335435, '1_1600426011.jpg', 0, 0, '2020-09-26'),
(3, 'tytytyttytytytyty', 'rerwer ewr ewr wer', 3, 1, '1', 2019, 123456, 1463214, '1_1601100595.jpg', 0, 0, '2020-09-26'),
(4, 'Test car', 'sdfsdfsdfdf', 2, 1, '2', 2015, 42342343, 21312313, '1_1601100691.png', 0, 0, '2020-09-26'),
(5, 'New car for sale', 'sdfsdf fsdfsdfdsf', 2, 1, '4', 1989, 1245632, 6000000, '1_1601100719.jpeg', 0, 0, '2020-09-26'),
(8, 'Nice Car', 'sgddsds dgsdgsdg', 3, 1, '2', 2012, 5698745, 9000000, '1_1601100745.jpg', 0, 0, '2020-09-26'),
(9, 'Testing member only', 'sdfsdfsdfdf', 2, 2, '2', 1989, 1737383, 23123132, '2_1601116406.jpg', 0, 0, '2020-09-26');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `active` tinyint(1) NOT NULL,
  `role` varchar(1) NOT NULL,
  `join_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `email`, `mobile`, `password`, `active`, `role`, `join_date`) VALUES
(1, 'Ruwan de Silva', 'sanj@mw-impact.com', '+94777597697', '123456', 1, 'm', '2020-09-12'),
(2, 'Charles De Silva', 'ruwan@pixel.lk', '777597697', 'e10adc3949ba59abbe56e057f20f883e', 1, 'm', '2020-09-26'),
(3, 'Ruwan de Silva', 'ruwan@greenwheelgroup.lk', '+94777597697', 'e10adc3949ba59abbe56e057f20f883e', 1, 'a', '2020-09-26'),
(4, 'Ruwan de Silva', 'ruwan2@pixel.lk', '711211211', '27d52bcb3580724eb4cbe9f2718a9365', 1, 'm', '2020-09-26');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

DROP TABLE IF EXISTS `model`;
CREATE TABLE IF NOT EXISTS `model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `brand_id`, `name`) VALUES
(1, 4, 'Outlander PHEV'),
(2, 3, 'Petrol'),
(3, 6, 'Civic'),
(4, 7, 'G Sports');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
