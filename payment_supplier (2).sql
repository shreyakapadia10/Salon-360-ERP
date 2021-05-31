-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 12, 2019 at 07:08 AM
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
-- Table structure for table `payment_supplier`
--

CREATE TABLE IF NOT EXISTS `payment_supplier` (
  `payment_supplier_id` int(20) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_time` time NOT NULL,
  `payment_details` varchar(25) NOT NULL,
  `payment_type` varchar(25) NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  PRIMARY KEY (`payment_supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `payment_supplier`
--

INSERT INTO `payment_supplier` (`payment_supplier_id`, `supplier_id`, `payment_date`, `payment_time`, `payment_details`, `payment_type`, `payment_amount`, `product_quantity`) VALUES
(1, 1, '2019-02-05', '13:30:00', 'hair products', 'Net Banking', 20000, 100),
(2, 2, '2019-02-04', '07:00:00', 'make up product', 'Check', 60000, 200),
(3, 3, '2019-02-05', '13:30:00', 'nail products', 'Net Banking', 40000, 100),
(4, 4, '2019-02-04', '07:00:00', 'skin product', 'Check', 50000, 100),
(5, 5, '2019-01-03', '13:30:00', 'tanning products', 'Net Banking', 40000, 100),
(6, 0, '2019-03-11', '10:36:09', '', '', 0, 100),
(7, 0, '2019-03-11', '10:39:42', '', '', 0, 100),
(8, 0, '2019-03-11', '11:02:51', '', '', 0, 100),
(9, 2, '2019-03-11', '11:16:45', '', 'Credit Card', 300, 200);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
