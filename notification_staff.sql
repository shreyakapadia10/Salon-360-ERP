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
-- Table structure for table `notification_staff`
--

CREATE TABLE IF NOT EXISTS `notification_staff` (
  `notification_staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `notification_title` varchar(100) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `notification_date` date NOT NULL,
  `notification_time` time NOT NULL,
  `notification_status` varchar(100) NOT NULL DEFAULT 'No',
  PRIMARY KEY (`notification_staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `notification_staff`
--

INSERT INTO `notification_staff` (`notification_staff_id`, `staff_id`, `user_id`, `appointment_id`, `notification_title`, `notification`, `notification_date`, `notification_time`, `notification_status`) VALUES
(1, 3, 16, 7, 'Appoinment Reminder', 'You Have Appointment Today At 13:00:00 for Spa with user Shreya.', '2019-03-08', '17:48:46', 'Yes'),
(6, 1, 16, 15, 'Appoinment Reminder', 'You Have Appointment Today At 08:27:00 for Hair Color with user Shreya.', '2019-03-10', '15:04:45', 'Yes'),
(7, 1, 16, 22, 'Appoinment Reminder', 'You Have Appointment Today At 04:00:00 for Hair Spa with user Shreya.', '2019-03-10', '15:04:48', 'Yes'),
(9, 8, 16, 0, 'New Feedback Received', 'Nice One', '2019-03-14', '11:37:06', 'No'),
(11, 3, 16, 0, 'New Feedback Received', 'Good', '2019-03-14', '18:30:14', 'No'),
(12, 3, 0, 0, 'Salary Added', '51000 added into your account', '2019-03-14', '20:20:25', 'No'),
(14, 3, 0, 0, 'Leave Confirmed', 'Your leave has been confirmed', '2019-03-14', '20:34:12', 'No');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
