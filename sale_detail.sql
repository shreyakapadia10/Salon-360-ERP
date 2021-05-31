-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2019 at 02:39 PM
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
-- Table structure for table `sale_detail`
--

CREATE TABLE IF NOT EXISTS `sale_detail` (
  `sale_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_id` int(11) NOT NULL,
  `sale_item_name` varchar(100) NOT NULL,
  `sale_item_quantity` int(11) NOT NULL,
  `sale_item_price` int(11) NOT NULL,
  `sale_item_type` varchar(100) NOT NULL,
  `sale_date` date NOT NULL,
  `sale_time` time NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `address_id` int(11) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  PRIMARY KEY (`sale_detail_id`),
  KEY `payment_id` (`payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sale_detail`
--

INSERT INTO `sale_detail` (`sale_detail_id`, `sale_id`, `sale_item_name`, `sale_item_quantity`, `sale_item_price`, `sale_item_type`, `sale_date`, `sale_time`, `product_id`, `user_id`, `payment_id`, `payment_type`, `address_id`, `order_status`) VALUES
(1, 1, 'Sunsilk Shampoo', 5, 12, 'Shampoo', '2019-03-14', '16:34:00', 1, 2, 1, 'Net Banking', 1, 'Canceled'),
(2, 2, 'Sunsilk Conditionar', 5, 3001, 'Conditionar', '2019-03-01', '19:33:39', 2, 1, 2, 'COD', 2, 'Canceled'),
(3, 1, 'Sunsilk Sirum', 1, 150, 'Sirum', '2019-03-10', '19:39:28', 3, 2, 4, 'COD', 3, 'Delivered'),
(4, 3, 'Godrej Color', 2, 60, 'Hair Color', '2019-03-09', '12:20:00', 4, 3, 3, 'Net Banking', 4, 'On The Way'),
(5, 5, 'Elle18 Lipstick', 2, 200, 'Lipstick', '2019-03-08', '16:00:00', 5, 4, 5, 'COD', 5, 'Delivered');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sale_detail`
--
ALTER TABLE `sale_detail`
  ADD CONSTRAINT `sale_detail_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payment_user` (`payment_user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
