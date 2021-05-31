-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2019 at 03:11 PM
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
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_item_name` varchar(100) NOT NULL,
  `purchase_item_price` int(11) NOT NULL,
  `purchase_item_type` varchar(100) NOT NULL,
  `purchase_date` date NOT NULL,
  `purchase_time` time NOT NULL,
  `admin_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `purchase_item_quantity` int(11) NOT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `purchase_item_name`, `purchase_item_price`, `purchase_item_type`, `purchase_date`, `purchase_time`, `admin_id`, `supplier_id`, `purchase_item_quantity`) VALUES
(1, 'Sunsilk Shampoo', 300, 'Shampoo', '2019-03-08', '16:00:00', 1, 1, 5),
(2, 'Sunsilk Conditionar', 700, 'Conditionar', '2019-03-01', '20:18:59', 1, 2, 10),
(3, 'Sunsilk Sirum', 100, 'Sirum', '2019-03-13', '13:20:00', 1, 3, 5),
(4, 'Hair Color', 200, 'Color', '2019-02-09', '15:20:00', 1, 4, 30),
(5, 'Mascara', 300, 'Makeup', '2019-03-14', '18:00:00', 1, 5, 10);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
