-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2019 at 05:46 AM
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
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `project`;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `address_pincode` int(11) NOT NULL,
  `address_line1` varchar(100) NOT NULL,
  `address_line2` varchar(100) NOT NULL,
  `address_contact` varchar(10) NOT NULL,
  `address_name` varchar(100) NOT NULL,
  `address_email` varchar(100) NOT NULL,
  `address_city` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `address_pincode`, `address_line1`, `address_line2`, `address_contact`, `address_name`, `address_email`, `address_city`, `user_id`) VALUES
(1, 395003, 'Bhagal', 'Surat', '9824250946', 'Shreya', 'shreya@gmail.com', 'Surat', 1),
(2, 395004, 'Varacha', 'Surat', '9874563210', 'Khyati', 'hingukhyati@gmail.com', 'Surat', 2),
(3, 395006, 'Adajan', 'Surat', '9632587410', 'Harshil', 'harshil@gmail.com', 'Surat', 3),
(4, 395001, 'Athawgate', 'Surat', '9874563210', 'Jahnvi', 'jahnvi@gmail.com', 'Surat', 4),
(5, 395003, 'Bhagal', 'Surat', '8745693210', 'Shivani', 'shivani@gmail.com', 'Surat', 5),
(6, 395007, 'Parvat Patiya', 'Surat', '9517423680', 'Sakshi', 'sakshi@gmail.com', 'Surat', 6),
(7, 395009, 'Vesu', 'Surat', '9184623570', 'Priyanshi', 'priyanshi@gmail.com', 'Surat', 7),
(8, 395012, 'Althan', 'Surat', '9375412680', 'Veena', 'veena@gmail.com', 'Surat', 8),
(9, 395013, 'Mora Bhagal', 'Surat', '8123654079', 'Nisha', 'nisha@gmail.com', 'Surat', 9),
(10, 395001, 'Athwagate', 'Surat', '7869541230', 'Priya', 'priya@gmail.com', 'Surat', 16),
(12, 395006, 'Juhu', 'Mumbai', '9874563210', 'Varun Dhawan', 'varun@gmail.com', 'Mumbai', 16),
(15, 395006, 'Juhu', 'Mumbai', '', 'Varun Dhawan', '', 'Maharashtra', 16);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_contact` varchar(10) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_address` varchar(100) NOT NULL,
  `admin_pic` text NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`, `admin_contact`, `admin_email`, `admin_address`, `admin_pic`) VALUES
(1, 'admin', 'admin123', '9874563211', 'admin@gmail.com', 'Surat', 'Shreya.jpg');

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
  PRIMARY KEY (`appointment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `user_id`, `appointment_details`, `appointment_date`, `appointment_time`, `appointment_city`, `payment_type`, `staff_id`) VALUES
(2, 2, 'Nail Paint', '2019-01-11', '12:00:00', 'Surat', 'Net Banking', 2),
(5, 5, 'Hair Color', '2019-01-12', '15:00:00', 'Surat', 'By Cash', 4),
(6, 6, 'Body Massage', '2019-01-17', '12:00:00', 'Surat', 'Debit Card', 5),
(7, 7, 'Spa', '2019-01-21', '13:00:00', 'Surat', 'Net Banking', 6),
(8, 8, 'Hair Color', '2019-01-14', '10:00:00', 'Surat', 'By Cash', 7),
(9, 9, 'Bridal', '2019-01-19', '11:00:00', 'Surat', 'Credit Card', 8),
(10, 10, 'Full Body Massage', '2019-01-23', '16:00:00', 'Surat', 'By Cash', 9);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `attendance_time` time NOT NULL,
  `total_day_attended` int(11) NOT NULL,
  `total_leave` int(11) NOT NULL DEFAULT '0',
  `leave_reason` varchar(100) NOT NULL DEFAULT '',
  `leave_date` date NOT NULL,
  PRIMARY KEY (`attendance_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `staff_id`, `attendance_time`, `total_day_attended`, `total_leave`, `leave_reason`, `leave_date`) VALUES
(1, 1, '09:00:00', 31, 0, '-', '0000-00-00'),
(2, 2, '08:00:00', 31, 0, '-', '0000-00-00'),
(3, 3, '08:00:00', 30, 1, 'Ill', '2019-01-01'),
(4, 4, '08:05:00', 31, 0, '-', '0000-00-00'),
(5, 5, '08:20:00', 30, 1, 'Family Function', '2019-01-22'),
(6, 6, '08:00:00', 31, 0, '-', '0000-00-00'),
(7, 7, '10:00:00', 31, 0, '-', '0000-00-00'),
(8, 8, '08:00:00', 30, 1, 'Ill', '0000-00-00'),
(9, 9, '08:02:00', 31, 0, '-', '0000-00-00'),
(10, 10, '08:00:00', 31, 0, '-', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `canceled_appointments`
--

CREATE TABLE IF NOT EXISTS `canceled_appointments` (
  `appointment_cancel_id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `appointment_details` varchar(100) NOT NULL,
  `cancel_reason` varchar(100) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `appointment_city` varchar(100) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  PRIMARY KEY (`appointment_cancel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `canceled_appointments`
--

INSERT INTO `canceled_appointments` (`appointment_cancel_id`, `appointment_id`, `user_id`, `staff_id`, `appointment_details`, `cancel_reason`, `appointment_date`, `appointment_time`, `appointment_city`, `payment_type`) VALUES
(1, 2, 1, 1, 'Hair Color', 'No Staff', '2000-11-04', '15:21:00', 'Surat', 'COD'),
(2, 4, 2, 3, 'Spa', 'No Staff', '2018-12-27', '15:44:00', 'Surat', 'Debit Card'),
(3, 2, 3, 1, 'Hair Cut', 'Staff Not Available', '2018-12-22', '18:44:00', 'Surat', 'Credit Card'),
(4, 11, 4, 2, 'Body Massage', 'Illness', '2019-01-03', '16:00:00', 'Surat', 'Net Banking'),
(5, 12, 5, 3, 'Hair Color', 'No Staff', '2019-01-15', '19:00:00', 'Surat', 'COD'),
(6, 12, 1, 3, 'Spa', 'Not available', '2019-03-08', '18:00:00', 'Surat', 'COD'),
(7, 13, 2, 3, 'Spa', 'Not available', '2019-03-28', '22:00:00', 'Surat', 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_size` varchar(100) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `product_quantity`, `product_size`) VALUES
(2, 16, 4, 1, 'sm'),
(3, 16, 1, 2, 'sm');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `user_id`) VALUES
(1, 'Surat', 1),
(2, 'Surat', 2),
(3, 'Surat', 3),
(4, 'Surat', 4),
(5, 'Surat', 5),
(6, 'Surat', 6),
(7, 'Ahmedabad', 7),
(8, 'Surat', 8),
(9, 'Surat', 9),
(10, 'Surat', 10);

-- --------------------------------------------------------

--
-- Table structure for table `confirm_appointment`
--

CREATE TABLE IF NOT EXISTS `confirm_appointment` (
  `confirm_appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `appointment_details` varchar(100) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `appointment_city` varchar(100) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  PRIMARY KEY (`confirm_appointment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `confirm_appointment`
--

INSERT INTO `confirm_appointment` (`confirm_appointment_id`, `appointment_id`, `user_id`, `staff_id`, `appointment_details`, `appointment_date`, `appointment_time`, `appointment_city`, `payment_type`) VALUES
(1, 1, 1, 1, 'Spa', '2018-12-22', '18:00:00', 'Surat', 'COD'),
(2, 7, 7, 5, 'Body Massage', '2018-12-27', '15:38:00', 'Ahmedabad', 'Credit Card'),
(3, 3, 9, 2, 'Hair Cut', '2018-12-31', '22:00:00', 'Baroda', 'Net Banking'),
(4, 4, 5, 3, 'Hair Color', '1970-01-05', '14:30:00', 'Surat', 'COD'),
(5, 2, 3, 9, 'Bridal Makeup', '2019-01-15', '16:20:00', 'Surat', 'COD'),
(6, 1, 1, 1, 'Spa', '2018-12-24', '13:22:00', 'Surat', 'By Cash'),
(7, 3, 3, 3, 'Hair Cut', '2019-01-25', '16:00:00', 'Surat', 'By Cash'),
(8, 4, 4, 3, 'Bridal', '2019-01-29', '19:00:00', 'Surat', 'Credit Card'),
(9, 11, 1, 3, 'Spa', '2019-03-08', '18:00:00', 'Surat', 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `feedback` varchar(100) NOT NULL,
  `feedback_date` date NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `user_id`, `staff_id`, `feedback`, `feedback_date`) VALUES
(1, 1, 1, 'Very Nice', '2019-02-19'),
(2, 2, 2, 'Good', '2019-01-05'),
(3, 3, 2, 'Very Nice', '2019-01-08'),
(4, 4, 3, 'Not so good', '2019-01-11'),
(5, 5, 4, 'Perfect', '2019-01-15'),
(6, 6, 5, 'Bad', '2019-01-01'),
(7, 7, 6, 'Good', '2018-12-12'),
(8, 8, 7, 'Very Nice', '2018-12-19'),
(9, 9, 8, 'Best', '2018-12-28'),
(10, 10, 5, 'Average', '2018-12-20'),
(11, 11, 9, 'Nice', '2019-02-20'),
(12, 16, 1, 'Nice', '2019-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `image_id` int(20) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(100) NOT NULL,
  `image_type` varchar(100) NOT NULL,
  `salon_pics` text NOT NULL,
  `video` text NOT NULL,
  `video_name` varchar(100) NOT NULL,
  `video_type` varchar(100) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`image_id`, `image_name`, `image_type`, `salon_pics`, `video`, `video_name`, `video_type`) VALUES
(1, 'Hair Cut', 'Hair Cut', 'Hair Cut.jpeg', 'Hair Cut.mp4', 'Hair Cut Video', 'Hair Cut'),
(2, 'Body Massage', 'Body Massage', 'Massage.jpeg', 'Massage.mp4', 'Massage Video', 'Massage'),
(3, 'Spa Image', 'Spa', 'Spa.jpg', 'Spa.mp4', 'Spa', 'Spa'),
(4, 'Hair Color', 'Hair Color', 'Hair Color.jpg', 'Hair Color.mp4', 'Hair Color', 'Hair Color'),
(5, 'Pedicure', 'Pedicure', 'Pedicure.jpg', 'Pedicure.mp4', 'Pedicure', 'Pedicure'),
(6, 'Hair Spa', 'Hair Spa', 'Hair Spa.jpg', 'Hair Spa.mp4', 'Hair Spa', 'Hair Spa'),
(7, 'Bridal Makeup', 'Bridal Makeup', 'Bridal Makeup.jpg', 'Bridal Makeup.mp4', 'Bridal Makeup', 'Bridal Makeup'),
(8, 'Groom''s Makeup', 'Groom Makeup', 'Groom Makeup.jpg', 'Groom''s Makeup.mp4', 'Groom''s Makeup', 'Groom''s Makeup'),
(9, 'Nail Paint', 'Nail Paint', 'Nail Paint.jpg', 'Nail Paint.mp4\n', 'Nail Paint', 'Nail Paint'),
(10, 'Manicure', 'Manicure', 'Manicure.jpg', 'Manicure.mp4', 'Manicure', 'Manicure');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `notification_title` varchar(100) NOT NULL,
  `notification` varchar(100) NOT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `notification_title`, `notification`) VALUES
(3, 'Request', 'Appointment Request'),
(4, 'Product Added', '2 Sunsilk is added');

-- --------------------------------------------------------

--
-- Table structure for table `notification_staff`
--

CREATE TABLE IF NOT EXISTS `notification_staff` (
  `notification_staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notification_title` varchar(100) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `notification_date` date NOT NULL,
  `notification_time` time NOT NULL,
  PRIMARY KEY (`notification_staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification_user`
--

CREATE TABLE IF NOT EXISTS `notification_user` (
  `notification_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `notification_title` varchar(100) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `notification_date` date NOT NULL,
  `notification_time` time NOT NULL,
  PRIMARY KEY (`notification_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment_supplier`
--

CREATE TABLE IF NOT EXISTS `payment_supplier` (
  `payment_supplier_id` int(20) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_time` time NOT NULL,
  `product_details` varchar(25) NOT NULL,
  `payment_type` varchar(25) NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  PRIMARY KEY (`payment_supplier_id`),
  KEY `supplier_id` (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `payment_supplier`
--

INSERT INTO `payment_supplier` (`payment_supplier_id`, `supplier_id`, `payment_date`, `payment_time`, `product_details`, `payment_type`, `payment_amount`, `product_quantity`) VALUES
(1, 1, '2018-12-23', '12:00:00', 'Sunshilk Conditionar', 'COD', 2000, 20),
(2, 2, '2019-01-02', '19:36:33', 'Sunshilk Shampoo', 'COD', 3000, 30),
(3, 3, '2019-01-01', '18:00:00', 'Hair Color', 'Net Banking', 300, 10),
(4, 4, '2018-12-24', '11:00:00', 'Hair Dryer', 'Credit Card', 10000, 10),
(5, 5, '2018-12-28', '16:20:30', 'Hair Straightner', 'COD', 20000, 20);

-- --------------------------------------------------------

--
-- Table structure for table `payment_user`
--

CREATE TABLE IF NOT EXISTS `payment_user` (
  `payment_user_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_time` time NOT NULL,
  `payment_details` varchar(25) NOT NULL,
  `payment_type` varchar(25) NOT NULL,
  `payment_amount` int(11) NOT NULL,
  PRIMARY KEY (`payment_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `payment_user`
--

INSERT INTO `payment_user` (`payment_user_id`, `user_id`, `payment_date`, `payment_time`, `payment_details`, `payment_type`, `payment_amount`) VALUES
(1, 1, '2018-12-22', '18:14:00', 'Sunshilk Shampoo', 'COD', 300),
(2, 6, '2019-01-07', '11:37:16', 'Sunsilk Sirum', 'Debit Card', 12),
(3, 2, '2019-01-07', '11:38:22', 'Sunsilk Shampoo', 'Debit Card', 300),
(4, 9, '2019-01-08', '13:00:58', 'Sunsilk Conditionar', 'Net Banking', 3001),
(5, 3, '2018-12-26', '15:30:20', 'Hair Straightner', 'COD', 2000);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `purchase_id`, `supplier_id`, `product_name`, `product_type`, `product_total_quantity`, `product_current_quantity`, `product_price`, `payment_type`, `product_purchase_date`, `product_purchase_time`, `product_image`) VALUES
(1, 1, 1, 'Sunsilk Shampoo', 'Shampoo', 11, 10, 31, 'COD', '2018-12-19', '16:26:00', 'product1.jpg'),
(2, 2, 2, 'Sunsilk Conditionar', 'Conditionar', 10, 10, 310, 'COD', '2019-01-02', '20:09:34', 'product2.jpg'),
(3, 3, 3, 'Sunsilk Sirum', 'Sirum', 20, 10, 300, 'Net Banking', '2000-12-29', '12:00:00', 'product3.jpg'),
(4, 4, 4, 'Hair Color', 'Hair Color', 30, 20, 500, 'Credit Card', '2018-12-31', '16:00:00', 'product4.jpg'),
(5, 5, 5, 'Hair Dye', 'Dye', 10, 8, 600, 'COD', '2019-01-18', '18:00:00', 'product5.jpg'),
(6, 6, 6, 'Foundation', 'Makeup', 20, 15, 1000, 'Credit Card', '2018-11-07', '19:00:00', 'product6.jpg'),
(7, 7, 7, 'Lipstick', 'Makeup', 30, 24, 3000, 'Net Banking', '2019-01-17', '09:00:00', 'product7.jpg'),
(8, 8, 8, 'Liner', 'Makeup', 10, 8, 1000, 'Credit Card', '2019-01-01', '10:00:00', 'product8.jpg'),
(9, 9, 9, 'Mascara', 'Makeup', 15, 10, 1500, 'COD', '2019-01-15', '16:00:00', 'product9.jpg'),
(10, 10, 10, 'Blusher', 'Makeup', 30, 22, 3000, 'Net Banking', '2019-01-18', '15:00:00', 'product10.jpg'),
(11, 1, 4, 'Sunsilk', 'Shampoo', 2, 2, 200, 'COD', '2019-03-02', '14:16:52', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_feedback`
--

CREATE TABLE IF NOT EXISTS `product_feedback` (
  `product_feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rate` varchar(10) NOT NULL,
  `review` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`product_feedback_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `product_feedback`
--

INSERT INTO `product_feedback` (`product_feedback_id`, `product_id`, `user_id`, `rate`, `review`, `date`) VALUES
(1, 1, 2, '30%', 'fine', '2019-01-01'),
(2, 2, 3, '50%', 'fine', '2019-01-01'),
(3, 4, 4, '80%', 'Good', '2019-01-16'),
(4, 3, 1, '100%', 'Nice', '2018-12-31'),
(5, 5, 5, '30%', 'Average', '2019-01-03'),
(6, 6, 6, '70%', 'Good', '2018-12-25'),
(7, 7, 7, '90%', 'Best', '2018-12-19'),
(8, 8, 8, '100%', 'Perfect', '2019-01-06'),
(9, 9, 9, '20%', 'Average', '2018-12-28'),
(10, 10, 10, '66%', 'Nice', '2018-12-16');

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
(1, 'Sunsilk Shampoo', 300, 'Shampoo', '2018-12-21', '16:00:00', 1, 1, 5),
(2, 'Sunsilk Conditionar', 700, 'Conditionar', '2019-01-02', '20:18:59', 1, 2, 10),
(3, 'Sunsilk Sirum', 100, 'Sirum', '2019-01-06', '13:20:00', 1, 3, 5),
(4, 'Hair Color', 200, 'Color', '2018-12-31', '15:20:00', 1, 4, 30),
(5, 'Mascara', 300, 'Makeup', '2018-11-12', '18:00:00', 1, 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `ratings_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ratings` int(10) NOT NULL,
  `ratings_date` date NOT NULL,
  PRIMARY KEY (`ratings_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`ratings_id`, `staff_id`, `user_id`, `ratings`, `ratings_date`) VALUES
(1, 1, 1, 10, '2018-12-21'),
(2, 2, 2, 9, '2018-12-21'),
(3, 1, 3, 9, '2019-01-10'),
(4, 9, 5, 8, '2019-01-25'),
(5, 10, 6, 9, '2019-01-10'),
(6, 3, 7, 7, '2018-12-25'),
(7, 4, 4, 9, '2019-01-01'),
(8, 8, 8, 8, '2018-12-31'),
(9, 5, 9, 6, '2019-01-02'),
(10, 6, 10, 8, '2019-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE IF NOT EXISTS `salary` (
  `salary_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `commission` varchar(100) NOT NULL,
  `total_salary` varchar(100) NOT NULL,
  `salary_date` date NOT NULL,
  PRIMARY KEY (`salary_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salary_id`, `staff_id`, `salary`, `commission`, `total_salary`, `salary_date`) VALUES
(1, 1, '10000', '0', '10000', '2019-01-11'),
(2, 2, '20000', '200', '20200', '2019-01-11'),
(3, 3, '50000', '0', '50000', '2019-01-11'),
(4, 4, '30000', '0', '30000', '2019-01-11'),
(5, 5, '40000', '100', '40100', '2019-01-11'),
(6, 6, '32000', '200', '32200', '2019-01-11'),
(7, 7, '20000', '0', '20000', '2019-01-11'),
(8, 8, '50000', '2000', '52000', '2019-01-11'),
(9, 9, '30000', '1000', '31000', '2019-01-11'),
(10, 10, '35000', '2000', '37000', '2019-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `sale_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `pay_type` varchar(100) NOT NULL,
  `address_id` int(11) NOT NULL,
  PRIMARY KEY (`sale_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sale_id`, `user_id`, `payment_id`, `pay_type`, `address_id`) VALUES
(1, 1, 1, 'Credit Card', 1),
(2, 7, 2, 'Net Banking', 1),
(3, 6, 3, 'Debit Card', 2),
(4, 1, 4, 'Debit Card', 1),
(5, 9, 5, 'Net Banking', 3),
(6, 4, 6, 'Net Banking', 4),
(7, 6, 7, 'Debit Card', 6),
(8, 10, 8, 'COD', 5),
(9, 2, 9, 'Debit Card', 8),
(10, 6, 10, 'Net Banking', 7);

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
(1, 1, 'Sunsilk Shampoo', 5, 12, 'Shampoo', '2018-12-20', '16:34:00', 1, 2, 1, 'Net Banking', 1, 'Canceled'),
(2, 2, 'Sunsilk Conditionar', 5, 3001, 'Conditionar', '2018-12-20', '19:33:39', 2, 1, 2, 'COD', 2, 'Canceled'),
(3, 1, 'Sunsilk Sirum', 1, 150, 'Sirum', '2018-12-20', '19:39:28', 3, 2, 4, 'COD', 3, 'Delivered'),
(4, 3, 'Godrej Color', 2, 60, 'Hair Color', '2019-01-10', '12:20:00', 4, 3, 3, 'Net Banking', 4, 'On The Way'),
(5, 5, 'Elle18 Lipstick', 2, 200, 'Lipstick', '2018-10-10', '16:00:00', 5, 4, 5, 'COD', 5, 'Delivered');

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

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_contact` varchar(10) NOT NULL,
  `supplier_address` varchar(100) NOT NULL,
  `supplier_email` varchar(100) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_contact`, `supplier_address`, `supplier_email`) VALUES
(1, 'Tulsi', '9745632176', 'Surat', 'tulsi@gmail.com'),
(2, 'Jyoti', '9874563210', 'Surat', 'jyoti@gmail.com'),
(3, 'Hiren', '9632587410', 'Baroda', 'hiren@gmail.com'),
(4, 'Dhiren', '9513264878', 'Surat', 'dhiren@gmail.com'),
(5, 'Divyansh', '9874563211', 'Surat', 'divyansh@gmail.com'),
(6, 'Harsh', '9371426852', 'Surat', 'harsh@gmail.com'),
(7, 'Chirag', '9357412680', 'Surat', 'chirag@gmail.com'),
(8, 'Ekta', '8745693210', 'Ahmedabad', 'ekta@gmail.com'),
(9, 'Preci', '8523697413', 'Surat', 'preci@gmail.com'),
(10, 'Prajakta', '8645322170', 'Baroda', 'praju@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `treatment_details`
--

CREATE TABLE IF NOT EXISTS `treatment_details` (
  `treatment_id` int(11) NOT NULL AUTO_INCREMENT,
  `treatment_name` varchar(100) NOT NULL,
  `treatment_type` varchar(100) NOT NULL,
  `treatment_price` varchar(100) NOT NULL,
  `treatment_gender` varchar(100) NOT NULL,
  `treatment_estimated_time` varchar(100) NOT NULL,
  PRIMARY KEY (`treatment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `treatment_details`
--

INSERT INTO `treatment_details` (`treatment_id`, `treatment_name`, `treatment_type`, `treatment_price`, `treatment_gender`, `treatment_estimated_time`) VALUES
(1, 'Hair Spa', 'Spa', '1500', 'Female/Male', '1 hour'),
(2, 'Hair Color', 'Hair Maintenance', '3000', 'Female/Male', '1 hour'),
(3, 'Bridal Makeup', 'Makeup', '5000', 'Female', '2 hours'),
(4, 'Hair Cut', 'Hair Maintenance', '1000', 'Female/Male', '30 Minutes'),
(5, 'Groom Makeup', 'Makeup', '3000', 'Male', '1 and Half Hour'),
(6, 'Spa', 'Spa', '2000', 'Female/Male', '2 hour'),
(7, 'Nail Paint', 'Nail Art', '500', 'Female', '20 Minutes'),
(8, 'Pedicure', 'Pedicure', '500', 'Female/Male', '1 hour'),
(9, 'Manicure', 'Manicure', '500', 'Female/Male', '1 hour'),
(10, 'Body Massage', 'Massage', '1000', 'Female/Male', '2 hour');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_gender` varchar(100) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_contact` varchar(10) NOT NULL,
  `user_dob` date NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_greetings` varchar(100) NOT NULL DEFAULT '0',
  `user_points` int(11) NOT NULL,
  `user_purchase_items` varchar(100) NOT NULL,
  `user_pic` text NOT NULL,
  `membership` varchar(100) NOT NULL,
  `membership_end_date` date NOT NULL,
  `user_city` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_gender`, `user_address`, `user_contact`, `user_dob`, `user_email`, `user_greetings`, `user_points`, `user_purchase_items`, `user_pic`, `membership`, `membership_end_date`, `user_city`) VALUES
(1, 'Hingu Khyati', 'khyati123', 'Female', 'Utran', '9874563210', '2000-11-04', 'hingukhyati@gmail.com', '0', 0, '0', 'u1.jpg', 'No', '0000-00-00', 'Surat'),
(2, 'Kapadia Shreya', 'shreya123', 'Female', 'Bhagal', '8849166573', '2000-10-10', 'shreya@gmail.com', '0', 0, '0', 'u2.jpg', 'No', '0000-00-00', 'Surat'),
(3, 'Priya', 'priya123', 'Female', 'Causeway', '9632587410', '2001-04-08', 'priya@gmail.com', '0', 0, '2', 'u3.jpg', 'No', '0000-00-00', 'Surat'),
(4, 'Tulsi Gopani', 'tulsi123', 'Female', 'Katargam', '9152364780', '2000-09-30', 'tulsi@gmail.com', '0', 0, '0', 'u4.jpg', 'Yes', '2019-02-20', 'Surat'),
(5, 'Jahnvi Joshi', 'janu123', 'Female', 'Adajan', '9017452368', '2000-09-10', 'jahnvi@gmail.com', '0', 0, '1', 'u5.jpg', 'No', '0000-00-00', 'Surat'),
(6, 'Roshani Jawale', 'roshani123', 'Female', 'Limbayat', '9753124860', '2000-06-10', 'roshani@gmail.com', '0', 0, '3', 'u6.jpg', 'Yes', '2019-04-16', 'Surat'),
(7, 'Sakshi Kanani', 'sakshi123', 'Female', 'Parvat Patiya', '9632147856', '2000-09-30', 'sakshi@gmail.com', '0', 0, '5', 'u7.jpg', 'No', '0000-00-00', 'Ahmedabad'),
(8, 'Urmila Rakholiya', 'urmi345', 'Female', 'Laskana', '9874123650', '2000-07-17', 'urmila@gmail.com', '0', 0, '5', 'u8.jpg', 'Yes', '2019-02-28', 'Surat'),
(9, 'Divya Lonari', 'divya123', 'Female', 'Amroli', '9517532486', '2000-11-09', 'divya@gmail.com', '0', 0, '0', 'u9.jpg', 'No', '0000-00-00', 'Baroda'),
(10, 'Shivani Kapadia', 'shivani123', 'Female', 'Athwagate', '7896541230', '1996-04-14', 'shivani@gmail.com', '0', 0, '0', 'u10.jpg', 'Yes', '2019-03-26', 'Surat'),
(11, 'Sakshi', 'sakshi3009', 'Female', '15,sardar patel park', '2459696598', '2001-09-30', 'sakshikanani3009@gmail.com', '0', 0, '', 'images.jpg', '', '0000-00-00', 'Surat'),
(16, 'Shreya', 'shreya', 'Male', '5/1084, Hanuman Sheri, Haripura, Gajjarfalia', '9874563211', '2000-10-10', 'shreyakapadia8@gmail.com', '0', 0, '0', 'Capture.PNG', 'No', '0000-00-00', 'Surat'),
(18, 'Harshil Kapadia', 'harshil123', 'Male', '5-1084, Hanuman Sheri, Haripura, Surat', '9375744335', '2003-05-08', 'harshilkapadia8@gmail.com', '0', 0, '0', 'IMG_20161009_215740.jpg', 'No', '0000-00-00', 'Surat');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment_supplier`
--
ALTER TABLE `payment_supplier`
  ADD CONSTRAINT `payment_supplier_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`);

--
-- Constraints for table `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `sale_detail`
--
ALTER TABLE `sale_detail`
  ADD CONSTRAINT `sale_detail_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payment_user` (`payment_user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
