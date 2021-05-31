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
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `product_total_quantity` int(11) NOT NULL,
  `product_current_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `product_purchase_date` date NOT NULL,
  `product_purchase_time` time NOT NULL,
  `product_image` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `purchase_id`, `supplier_id`, `product_name`, `product_type`, `product_total_quantity`, `product_current_quantity`, `product_price`, `payment_type`, `product_purchase_date`, `product_purchase_time`, `product_image`) VALUES
(1, 1, 1, 'Sunsik Shampoo', 'hair', 10, 9, 200, 'COD', '2019-03-05', '01:30:00', '5.jpg'),
(2, 1, 1, 'Lakeme Matte Lipcolor', 'lipstick', 5, 0, 300, 'Net Banking', '2019-01-02', '12:16:55', '6.jpg'),
(3, 1, 1, 'Lakeme Serum', 'hair', 200, 100, 300, 'COD', '2018-12-19', '20:12:47', '7.jpg'),
(4, 1, 1, 'Tresemme Hair Spray', 'hair ', 100, 60, 450, 'COD', '2019-03-04', '12:07:20', '8.jpg'),
(5, 1, 2, 'Nail Polish', 'nails', 300, 100, 350, 'Net Banking', '2019-03-04', '12:09:01', '2.jpg'),
(6, 1, 1, 'Lakme Eyeconic Kajal', 'skin', 100, 30, 200, 'COD', '2019-03-04', '19:23:11', '3.jpg'),
(7, 1, 2, 'Fit me Foundation', 'make up', 100, 15, 350, 'COD', '2019-03-04', '19:27:27', '1.jpg'),
(8, 1, 1, 'Ambre Solaire Sensitive Sun Cream ', 'tanning', 100, 40, 300, 'COD', '2019-03-04', '19:33:35', '9.jpg'),
(9, 1, 1, 'Colorbar Velvet Matte Lipstick', 'lipstick', 50, 20, 400, 'COD', '2019-03-04', '19:39:47', '10.jpg'),
(10, 1, 1, 'Treseme Conditioner', 'hair', 100, 20, 200, 'COD', '2019-03-05', '12:01:07', '4.jpg'),
(11, 1, 1, 'Maybelline Eyeliner', 'make up', 100, 50, 500, 'COD', '2019-03-05', '12:03:03', '11.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
