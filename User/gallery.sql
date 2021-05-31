-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2019 at 02:43 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `image_id` int(20) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(100) NOT NULL,
  `image_type` varchar(100) NOT NULL,
  `salon_pics` text NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`image_id`, `image_name`, `image_type`, `salon_pics`) VALUES
(1, 'hair cut1', 'Hair Style', '1.jpg'),
(2, 'hair cut2', 'Hair Style', '2.jpg'),
(3, 'hair cut3', 'Hair Style', '3.jpg'),
(4, 'hair cut4', 'Hair Style', '4.jpg'),
(5, 'hair cut5', 'Hair Style', '5.jpg'),
(6, 'hair cut6', 'Hair Style', '3.jpg'),
(7, 'hair cut7', 'Hair Style', '5.jpg'),
(8, 'Bridal1', 'Make Up', '8.jpg'),
(9, 'Bride2', 'Make Up', '10.jpg'),
(10, 'Bridal3', 'Make Up', '13.jpg'),
(11, 'Bride4', 'Make Up', '11.jpg'),
(12, 'Bride5', 'Make Up', '12.jpg'),
(13, 'Bride6', 'Make Up', '13.jpg'),
(14, 'Bride7', 'Make Up', '10.jpg'),
(15, 'manicure & padicure', 'manicure & padicure', '15.jpg'),
(16, 'manicure & padicure', 'manicure & padicure', '16.jpg'),
(17, 'manicure & padicure', 'manicure & padicure', '17.jpg'),
(18, 'manicure & padicure', 'manicure & padicure', '18.jpg'),
(19, 'manicure & padicure', 'manicure & padicure', '19.jpg'),
(20, 'manicure & padicure', 'manicure & padicure', '20.jpg'),
(21, 'manicure & padicure', 'manicure & padicure', '21.jpg'),
(22, 'Skin Care', 'Skin Care', '22.jpg'),
(23, 'Skin Care', 'Skin Care', '23.jpg'),
(24, 'Skin Care', 'Skin Care', '24.jpg'),
(25, 'Skin Care', 'Skin Care', '25.jpg'),
(26, 'Skin Care', 'Skin Care', '26.jpg'),
(27, 'Skin Care', 'Skin Care', '27.jpg'),
(28, 'Skin Care', 'Skin Care', '28.jpg'),
(29, 'Body Treatment', 'Body Treatment', '29.jpg'),
(30, 'Body Treatment', 'Body Treatment', '30.jpg'),
(31, 'Body Treatment', 'Body Treatment', '31.jpg'),
(32, 'Body Treatment', 'Body Treatment', '32.jpg'),
(33, 'Body Treatment', 'Body Treatment', '33.jpg'),
(34, 'Body Treatment', 'Body Treatment', '34.jpg'),
(35, 'Body Treatment', 'Body Treatment', '35.jpg'),
(36, 'massage', 'massage', '36.jpg'),
(37, 'massage', 'massage', '37.jpg'),
(38, 'massage', 'massage', '38.jpg'),
(39, 'massage', 'massage', '39.jpg'),
(41, 'massage', 'massage', '41.jpg'),
(42, 'massage', 'massage', '42.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
