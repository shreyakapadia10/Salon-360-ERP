-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2019 at 03:12 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `notification_title` varchar(100) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `notification_date` date NOT NULL,
  `notification_time` time NOT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `notification_title`, `notification`, `notification_date`, `notification_time`) VALUES
(1, 'Product Ordered', 'Lakeme Serum of 1 quantity is ordered', '2019-03-14', '19:50:25'),
(2, 'Product Ordered', 'Sunsik Shampoo of 2 quantity is ordered', '2019-03-14', '19:50:29'),
(3, 'Appointment Request', 'Shreya has booked appointment for Body Treatment with staff Joey.', '2019-03-14', '19:56:23'),
(4, 'Product Added', '10 quantity of Sunsilk Shampoo is added', '2019-03-14', '19:59:09'),
(5, 'User Added', 'Shreya Kapadia has been added.', '2019-03-14', '20:01:10'),
(6, 'Leave Request', 'Joey requested for leave of 1 days', '2019-03-14', '20:11:40');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
