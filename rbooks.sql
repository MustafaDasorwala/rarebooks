-- phpMyAdmin SQL Dump
-- version 4.2.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 26, 2014 at 04:09 AM
-- Server version: 5.6.20
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rbooks`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `username` varchar(25) NOT NULL DEFAULT '',
  `password` varchar(25) DEFAULT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `role_id` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`username`, `password`, `first_name`, `last_name`, `email_address`, `role_id`) VALUES
('adminuser1', 'adminpassword1', 'admintest1', 'adminuser1', 'admintest1@test1.com', 1),
('adminuser2', 'adminpassword2', 'admintest2', 'adminuser2', 'admintest2@test2.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cc_hotlist`
--

CREATE TABLE IF NOT EXISTS `cc_hotlist` (
  `credit_card_number` char(16) NOT NULL DEFAULT '',
  `cc_holder_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cc_hotlist`
--

INSERT INTO `cc_hotlist` (`credit_card_number`, `cc_holder_name`) VALUES
('1111222233334444', 'Mister_four'),
('1122334455667788', 'Mister_C'),
('12313131', 'aaaa'),
('1234567890123456', 'waqas');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`customer_id` int(10) unsigned NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) DEFAULT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `customer_type` varchar(10) DEFAULT 'regular'
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `username`, `password`, `first_name`, `last_name`, `email_address`, `customer_type`) VALUES
(1, 'testuser1', 'password', 'test', 'user1', 'test@test.com', 'regular'),
(2, 'testuser2', 'password2', 'test2', 'user2', 'test2@test2.com', 'regular'),
(3, 'testuser3', 'password3', 'test3', 'user3', 'test3@test2.com', 'prime'),
(4, 'testuser4', 'password4', 'test4', 'user4', 'test4@test2.com', 'regular'),
(5, 'wiqqiroxx', 'test', 'waqas', 'haider', 'waqashaider@gwu.edu', 'regular'),
(6, 'wiqqi', 'aaa', 'Waqas', 'Haider', 'a@a.co', 'regular'),
(7, 'ajsdjahd', 'asd', 'jasdja', 'asdald', 'asjdaldkajdkla@a.ksjda.com', 'regular'),
(8, 'ajsdjahda', 'asda', 'aa', 'aaa', 'aaaa@aaa.com', 'regular'),
(9, 'ncnc', 'ncnc', 'ncnc', 'ncnc', 'ncnc@ncncn.com', 'regular'),
(10, 'bcbc', 'bcbc', 'bcc', 'bcb', 'bcbc@bcbc.com', 'regular'),
(11, 'asdahda', 'asd', 'naksldnal', 'klnasdnkalnd', 'naksndka@anksdnak.com', 'regular'),
(12, 'asjdha', 'asd', 'aksda', 'nkasdkna', 'nkasndkna@asd.com', 'regular'),
(13, 'asd', 'asd', 'asjkdkaj', 'jaskjdkaj', 'kjaksdja@asda.com', 'regular'),
(14, 'asdad', 'asd', 'kalsjd', 'kjasdja', 'kjkadsjd@askjdas.com', 'regular'),
(15, 'asadad', 'asd', 'asda', 'asd', 'asd@asd.com', 'regular'),
(16, 'aaa', 'aaa', 'kadsakd', 'nkasnkdna', 'aa@c.com', 'regular'),
(17, 'h', 'h', 'h', 'h', 'h@c.com', 'regular'),
(18, 'hh', 'hh', 'j', 'j', 'j@j.com', 'regular'),
(19, 'jj', 'jj', 'nn', 'nn', 'nn@nn.com', 'regular'),
(20, 'aa', 'aa', 'jj', 'j', 'asda2@ac.om', 'regular'),
(21, 'hhh', 'hhh', 'hh', 'hhh', 'hh@hhhh.com', 'regular'),
(22, 'aaaa', 'aaa', 'hasdhah', 'hhasdhash', 'hha@cac.com', 'regular'),
(23, 'hahahaha', 'haha', 'hahahh', 'hhahahahhah', 'hhahaha@hahaha.com', 'regular'),
(24, 'haha', 'hahaha', 'hahahahah', 'hhahaha', 'hahhaha@haha.com', 'regular'),
(25, 'hhchc', 'hchc', 'hahah', 'hhahh', 'hhha@ha.cm', 'regular'),
(26, 'jhjh', 'jhjh', 'hh', 'hh', 'kj@jkj.com', 'regular'),
(27, 'asdadasd', 'asdadad', 'hahah', 'hahahha', 'hahhaha@ahsdhad.com', 'regular'),
(28, 'asdasd', 'asdasd', 'asdad', 'asdad', 'a@a.co', 'regular'),
(29, 'testnewuser', 'test', 'test', 'test', 'test@testtest.com', 'regular'),
(30, 'TestMukesh', '123', 'mukesh', 'R', 'mukesh@gmail.com', 'regular');

-- --------------------------------------------------------

--
-- Table structure for table `customer_profile`
--

CREATE TABLE IF NOT EXISTS `customer_profile` (
`profile_id` int(10) unsigned NOT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  `shipping_address` varchar(50) DEFAULT NULL,
  `credit_card_number` char(16) NOT NULL,
  `cc_holder_name` varchar(50) NOT NULL,
  `billing_address` varchar(50) NOT NULL,
  `expiration_date_year` year(4) NOT NULL,
  `expiration_date_month` enum('1','2','3','4','5','6','7','8','9','10','11','12') DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_profile`
--

INSERT INTO `customer_profile` (`profile_id`, `customer_id`, `shipping_address`, `credit_card_number`, `cc_holder_name`, `billing_address`, `expiration_date_year`, `expiration_date_month`) VALUES
(1, 1, '123 oak street', '1234567887654321', 'Mister_A', '123 oak street', 2019, '5'),
(2, 2, '123 elm street', '1234567812345678', 'Mister_B', '123 elm street', 2020, '11'),
(3, 4, '123 four street', '1111222233334444', 'Mister_four', '123 four street', 2017, '12'),
(4, 4, 'asda', '123456789', 'asdad', 'asda', 0000, NULL),
(18, 2, '123123aasdadasdsadasd', '123123123', 'waq', '123123asdsadasd', 0000, NULL),
(19, 2, 'Test Shipping Address', '1122334455667788', 'Mister_C', 'Test Billing Address', 0000, NULL),
(20, 2, 'asdad12e11', '12313213131', 'aasda', 'asdad12e11', 0000, NULL),
(21, 2, 'shipping address', '1234567890123456', 'Test Name', 'billing address', 0000, NULL),
(22, 2, 'cccccc', '111111111', 'test card 2 ', 'bbbbb', 0000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
`event_id` int(10) unsigned NOT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  `profile_id` int(10) unsigned DEFAULT NULL,
  `cc_holder_name` varchar(50) NOT NULL,
  `credit_card_number` char(16) NOT NULL,
  `ip_address` varchar(20) DEFAULT NULL,
  `date_and_time` datetime DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `customer_id`, `profile_id`, `cc_holder_name`, `credit_card_number`, `ip_address`, `date_and_time`, `description`) VALUES
(1, 3, NULL, 'Mister_C', '1122334455667788', '9.0.0.1', '2014-09-23 11:54:23', 'sale denied'),
(2, 4, 3, 'Mister_four', '1111222233334444', '8.8.8.8', '2014-09-18 10:45:23', 'sale denied - bad cc'),
(4, 2, 2, 'test name', '12313131', '192.168.1.1', '2014-10-25 17:13:09', 'test description');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
`item_id` int(10) unsigned NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_description` varchar(50) DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `date_added` date NOT NULL,
  `category` varchar(20) DEFAULT NULL,
  `quantity_on_hand` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_id`, `item_name`, `item_description`, `price`, `date_added`, `category`, `quantity_on_hand`) VALUES
(1, 'book1', 'rare medical book', '3000.00', '2014-04-28', 'medicine', 10),
(2, 'book2', 'rare science book', '4995.00', '2014-10-25', 'science', 3),
(4, 'book 3', 'book 3 test ', '5000.00', '2014-10-25', 'History', 14);

-- --------------------------------------------------------

--
-- Table structure for table `ordered_items`
--

CREATE TABLE IF NOT EXISTS `ordered_items` (
  `order_id` int(10) unsigned NOT NULL DEFAULT '0',
  `item_id` int(10) unsigned NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`order_id` int(10) unsigned NOT NULL,
  `order_date` date NOT NULL,
  `total_amount` decimal(12,2) DEFAULT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  `shipping_address` varchar(50) NOT NULL,
  `profile_id` int(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `total_amount`, `customer_id`, `shipping_address`, `profile_id`) VALUES
(1, '2014-09-29', '3000.00', 1, '123 oak street', 0),
(2, '2014-09-21', '4995.00', 2, '123 elm street', 0),
(3, '2014-10-25', NULL, 1, 'Test', 0),
(4, '2014-10-25', NULL, 1, 'Test Shipping Address', 0),
(5, '2014-10-25', NULL, 2, 'test shipping for 2', 0),
(6, '2014-10-25', NULL, 2, 'Test Shipping Address', 0),
(7, '2014-10-25', NULL, 2, 'asdad12e11', 0),
(8, '2014-10-25', NULL, 2, 'asdad12e11', 20),
(9, '2014-10-25', NULL, 2, 'shipping address', 0),
(10, '2014-10-25', NULL, 2, 'shipping address', 21),
(11, '2014-10-25', NULL, 2, 'shipping address', 21),
(12, '2014-10-25', NULL, 2, 'cccccc', 0),
(13, '2014-10-25', NULL, 2, 'Test Billing Address', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `review_text` varchar(1000) DEFAULT NULL,
  `item_rating` enum('1','2','3','4','5') DEFAULT NULL,
  `item_id` int(10) unsigned NOT NULL DEFAULT '0',
  `customer_id` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_text`, `item_rating`, `item_id`, `customer_id`) VALUES
('test 1 ', '2', 1, 1),
('asd', '2', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
`role_id` int(10) unsigned NOT NULL,
  `role_name` varchar(20) DEFAULT NULL,
  `role_description` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_description`) VALUES
(1, 'admin1', 'overall site administrator'),
(2, 'admin2', 'inventory administrator');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE IF NOT EXISTS `shopping_cart` (
  `customer_id` int(10) unsigned DEFAULT NULL,
  `item_id` int(10) unsigned NOT NULL DEFAULT '0',
  `session_id` varchar(100) NOT NULL DEFAULT '0',
  `quantity` int(11) DEFAULT NULL,
  `session_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`customer_id`, `item_id`, `session_id`, `quantity`, `session_expiry`) VALUES
(NULL, 1, 'gr01tkufn7rhblnpbt5m9pufn6', 2, NULL),
(1, 2, 'sff60m0c0a66p92eo485n0q7v6', 1, NULL),
(NULL, 4, 'gr01tkufn7rhblnpbt5m9pufn6', 0, NULL),
(1, 4, 'sff60m0c0a66p92eo485n0q7v6', 3, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
 ADD PRIMARY KEY (`username`), ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `cc_hotlist`
--
ALTER TABLE `cc_hotlist`
 ADD PRIMARY KEY (`credit_card_number`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`customer_id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `customer_profile`
--
ALTER TABLE `customer_profile`
 ADD PRIMARY KEY (`profile_id`), ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`event_id`), ADD KEY `customer_id` (`customer_id`), ADD KEY `profile_id` (`profile_id`), ADD KEY `credit_card_number` (`credit_card_number`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
 ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `ordered_items`
--
ALTER TABLE `ordered_items`
 ADD PRIMARY KEY (`order_id`,`item_id`), ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`order_id`), ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
 ADD PRIMARY KEY (`customer_id`,`item_id`), ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
 ADD PRIMARY KEY (`item_id`,`session_id`), ADD KEY `shopping_cart_ibfk_1` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `customer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `customer_profile`
--
ALTER TABLE `customer_profile`
MODIFY `profile_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `event_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
MODIFY `item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
MODIFY `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_users`
--
ALTER TABLE `admin_users`
ADD CONSTRAINT `admin_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Constraints for table `customer_profile`
--
ALTER TABLE `customer_profile`
ADD CONSTRAINT `customer_profile_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `customer_profile` (`profile_id`),
ADD CONSTRAINT `events_ibfk_3` FOREIGN KEY (`credit_card_number`) REFERENCES `cc_hotlist` (`credit_card_number`);

--
-- Constraints for table `ordered_items`
--
ALTER TABLE `ordered_items`
ADD CONSTRAINT `ordered_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
ADD CONSTRAINT `ordered_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `inventory` (`item_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `inventory` (`item_id`),
ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
ADD CONSTRAINT `shopping_cart_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `inventory` (`item_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
