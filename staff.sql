-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2019 at 03:39 PM
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
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_name` varchar(100) NOT NULL,
  `staff_password` varchar(100) NOT NULL,
  `staff_gender` varchar(100) NOT NULL,
  `staff_address` varchar(100) NOT NULL,
  `staff_contact` varchar(10) NOT NULL,
  `staff_dob` date NOT NULL,
  `staff_email` varchar(100) NOT NULL,
  `staff_salary` varchar(100) NOT NULL,
  `staff_specialization` varchar(100) NOT NULL,
  `staff_commission` varchar(100) NOT NULL,
  `staff_cus_handled` varchar(100) NOT NULL,
  `staff_pic` text NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_password`, `staff_gender`, `staff_address`, `staff_contact`, `staff_dob`, `staff_email`, `staff_salary`, `staff_specialization`, `staff_commission`, `staff_cus_handled`, `staff_pic`) VALUES
(1, 'Veronica', 'veronica123', 'Female', 'Surat', '9874562210', '1998-12-21', 'veronica@gmail.com', '10000', 'Makeup Artist', '0', '100', 'team1.jpg'),
(2, 'Shaili', 'shaili123', 'Female', 'Surat', '9632587410', '2000-10-10', 'shaili@gmail.com', '20000', 'Hair Artist', '200', '10', 'team2.jpg'),
(3, 'Joey', 'joey123', 'Male', 'Surat', '9784563211', '1995-10-20', 'shreyakapadia8@gmail.com', '50000', 'Hair Artist', '0', '0', 'team3.jpg'),
(4, 'Nick', 'nick123', 'Male', 'Adajan', '9371256480', '1990-05-08', 'nick@gmail.com', '30000', 'Spa Specialist', '0', '100', 'team4.jpg\r\n'),
(5, 'Arth', 'arth123', 'Male', 'Palanpur', '9632587413', '1990-01-20', 'arth@gmail.com', '40000', 'Nail Artist', '100', '150', 'team5.jpg\r\n\r\n'),
(6, 'Parthvi', 'parthvi', 'Female', 'Limbayat', '8965471230', '1990-03-23', 'parthvi@gmail.com', '32000', 'Bridal Makeup', '200', '130', 'team6.jpg\r\n'),
(7, 'Neha', 'neha123', 'Female', 'Sagrampura', '9151623247', '1989-04-25', 'neha@gmail.com', '20000', 'Hair Stylist', '0', '100', 'team7.jpg\r\n'),
(8, 'Natasha', 'nats123', 'Female', 'Varacha', '9623514780', '1990-04-13', 'natsha@gmail.com', '50000', 'Makeup Artist', '2000', '200', 'team8.jpg\r\n'),
(9, 'Dhruv', 'dhruv123', 'Male', 'Begumpura', '9357124680', '1990-02-26', 'dhruv@gmail.com', '30000', 'Hair Artist', '1000', '120', 'team9.jpg\r\n'),
(10, 'Kashish', 'kashish123', 'Female', 'Sagrampura', '8796541230', '1996-09-20', 'kashish@gmail.com', '35000', 'Nail Artist', '2000', '200', 'team10.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
