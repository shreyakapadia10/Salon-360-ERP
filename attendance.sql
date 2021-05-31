-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2019 at 03:10 PM
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
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `total_day_attended` int(11) NOT NULL,
  `attendance_date` date NOT NULL,
  `attendance_time` time NOT NULL,
  `total_leave` int(11) NOT NULL DEFAULT '0',
  `leave_reason` varchar(100) NOT NULL DEFAULT '',
  `leave_date` date NOT NULL,
  PRIMARY KEY (`attendance_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `staff_id`, `total_day_attended`, `attendance_date`, `attendance_time`, `total_leave`, `leave_reason`, `leave_date`) VALUES
(1, 1, 31, '2019-03-14', '08:00:00', 0, '', '0000-00-00'),
(2, 2, 0, '2019-03-14', '08:05:00', 1, 'Ill', '2019-03-13'),
(3, 3, 0, '2019-03-13', '08:00:00', 0, '', '0000-00-00'),
(4, 4, 0, '2019-03-14', '08:02:00', 1, 'Family Function', '2019-03-05'),
(5, 4, 0, '2019-03-14', '08:00:00', 0, '', '0000-00-00'),
(6, 5, 0, '2019-03-14', '08:04:00', 0, '', '0000-00-00'),
(7, 7, 0, '2019-03-14', '00:00:00', 1, 'Ill', '2019-03-01'),
(8, 8, 0, '2019-03-14', '08:00:00', 0, '', '0000-00-00'),
(9, 3, 0, '2019-03-12', '18:08:35', 0, '', '0000-00-00'),
(10, 3, 0, '2019-03-11', '18:08:35', 0, '', '0000-00-00'),
(11, 3, 0, '2019-03-10', '18:10:38', 0, '', '0000-00-00'),
(12, 3, 0, '2019-03-14', '18:13:56', 0, '', '0000-00-00'),
(13, 3, 0, '0000-00-00', '00:00:00', 1, 'Ill', '2019-03-15');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
