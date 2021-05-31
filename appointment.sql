-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2019 at 03:13 PM
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
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `appointment_details` varchar(100) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `appointment_city` varchar(100) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `payment_user_id` int(11) NOT NULL,
  PRIMARY KEY (`appointment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `user_id`, `appointment_details`, `appointment_date`, `appointment_time`, `appointment_city`, `payment_type`, `staff_id`, `payment_user_id`) VALUES
(2, 16, 'Nail Paint', '2019-03-09', '12:00:00', 'Surat', 'Net Banking', 2, 0),
(6, 6, 'Body Massage', '2019-01-17', '12:00:00', 'Surat', 'Debit Card', 5, 0),
(7, 16, 'Spa', '2019-03-08', '13:00:00', 'Surat', 'Net Banking', 3, 0),
(8, 8, 'Hair Color', '2019-01-14', '10:00:00', 'Surat', 'By Cash', 7, 0),
(9, 16, 'Bridal', '2019-03-08', '11:00:00', 'Surat', 'Credit Card', 3, 0),
(10, 10, 'Full Body Massage', '2019-01-23', '16:00:00', 'Surat', 'By Cash', 9, 0),
(44, 16, 'Hair Style', '2019-03-11', '15:25:00', 'Surat', 'COD', 3, 0),
(45, 16, 'Body Treatment', '2019-03-11', '15:00:00', 'Surat', 'COD', 2, 0),
(46, 16, 'Body Treatment', '2019-03-12', '20:04:00', 'Surat', 'Net Banking', 3, 17),
(47, 16, 'Manicure & Padicure', '2019-03-12', '11:00:00', 'Surat', 'Net Banking', 1, 18),
(48, 16, 'Body Treatment', '2019-03-14', '04:00:00', 'Surat', 'Credit Card', 4, 19),
(49, 21, 'Make Up', '2019-03-15', '11:00:00', 'Surat', 'Net Banking', 1, 20),
(51, 16, 'Make Up', '2019-03-15', '11:00:00', 'Surat', 'Net Banking', 10, 24),
(52, 16, 'Hair Style', '2019-03-15', '11:00:00', 'Surat', 'Net Banking', 2, 25),
(54, 16, 'Hair Style', '2019-03-14', '11:00:00', 'Surat', 'Credit Card', 4, 27),
(55, 16, 'Body Treatment', '2019-03-14', '18:00:00', 'Surat', 'Net Banking', 3, 28);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
