-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2019 at 01:59 PM
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
-- Table structure for table `notification_user`
--

CREATE TABLE IF NOT EXISTS `notification_user` (
  `notification_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `notification_title` varchar(100) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `notification_date` date NOT NULL,
  `notification_time` time NOT NULL,
  `notification_status` varchar(100) NOT NULL DEFAULT 'No',
  PRIMARY KEY (`notification_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `notification_user`
--

INSERT INTO `notification_user` (`notification_user_id`, `user_id`, `appointment_id`, `notification_title`, `notification`, `notification_date`, `notification_time`, `notification_status`) VALUES
(1, 16, 7, 'Appoinment Reminder', 'You Have Appointment Today At 13:00:00 for Spa', '2019-03-08', '16:31:52', 'Yes'),
(2, 16, 9, 'Appoinment Reminder', 'You Have Appointment Today At 11:00:00 for Bridal', '2019-03-08', '16:31:56', 'Yes'),
(3, 16, 2, 'Appoinment Reminder', 'You Have Appointment Today At 12:00:00 for Nail Paint', '2019-03-09', '16:33:12', 'Yes'),
(4, 5, 4, 'Appoinment Reminder', 'You Have Appointment Today At 14:30:00 for Hair Color', '2019-03-08', '17:51:44', 'Yes'),
(5, 3, 3, 'Appoinment Reminder', 'You Have Appointment Today At 16:00:00 for Hair Cut', '2019-03-08', '17:51:47', 'Yes'),
(6, 1, 11, 'Appoinment Reminder', 'You Have Appointment Today At 18:00:00 for Spa', '2019-03-08', '17:51:51', 'Yes'),
(7, 16, 15, 'Appoinment Reminder', 'You Have Appointment Today At 08:27:00 for Hair Color', '2019-03-10', '17:24:41', 'Yes'),
(8, 16, 22, 'Appoinment Reminder', 'You Have Appointment Today At 04:00:00 for Hair Spa', '2019-03-10', '17:24:45', 'Yes'),
(9, 16, 25, 'Appoinment Reminder', 'You Have Appointment Today At 10:25:00 for Hair Spa', '2019-03-10', '17:24:48', 'Yes'),
(10, 16, 29, 'Appoinment Reminder', 'You Have Appointment Today At 02:00:00 for Hair Spa', '2019-03-10', '17:24:51', 'Yes'),
(11, 16, 30, 'Appoinment Reminder', 'You Have Appointment Today At 04:10:00 for Hair Spa', '2019-03-10', '17:43:50', 'Yes'),
(12, 16, 31, 'Appoinment Reminder', 'You Have Appointment Today At 02:00:00 for Hair Spa', '2019-03-10', '17:43:53', 'Yes'),
(13, 16, 36, 'Appoinment Reminder', 'You Have Appointment Today At 02:13:00 for Hair Color', '2019-03-10', '18:14:58', 'Yes'),
(14, 16, 38, 'Appoinment Reminder', 'You Have Appointment Today At 11:00:00 for Hair Spa', '2019-03-10', '18:15:01', 'Yes'),
(15, 16, 41, 'Appoinment Reminder', 'You Have Appointment Today At 07:00:00 for Hair Spa', '2019-03-10', '18:15:05', 'Yes'),
(16, 16, 41, 'Appoinment Reminder', 'You Have Appointment Today At 07:00:00 for Hair Spa', '2019-03-10', '18:15:06', 'Yes'),
(17, 16, 43, 'Appoinment Reminder', 'You Have Appointment Today At 19:00:00 for Hair Color', '2019-03-11', '10:07:04', 'Yes'),
(18, 16, 44, 'Appoinment Reminder', 'You Have Appointment Today At 15:25:00 for Hair Style', '2019-03-11', '12:12:41', 'Yes'),
(19, 16, 45, 'Appoinment Reminder', 'You Have Appointment Today At 15:00:00 for Body Treatment', '2019-03-11', '12:12:45', 'Yes'),
(20, 16, 46, 'Appoinment Reminder', 'You Have Appointment Today At 20:04:00 for Body Treatment', '2019-03-12', '10:17:18', 'Yes'),
(21, 16, 47, 'Appoinment Reminder', 'You Have Appointment Today At 11:00:00 for Manicure & Padicure', '2019-03-12', '10:17:22', 'Yes'),
(22, 16, 48, 'Appoinment Reminder', 'You Have Appointment Today At 04:00:00 for Body Treatment', '2019-03-14', '11:08:52', 'Yes'),
(23, 16, 53, 'Appoinment Reminder', 'You Have Appointment Today At 20:00:00 for Hair Style', '2019-03-14', '18:17:48', 'Yes');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
