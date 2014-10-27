-- phpMyAdmin SQL Dump
-- version 4.0.10.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 27, 2014 at 04:03 PM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

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
  `role_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`username`),
  KEY `role_id` (`role_id`)
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
  `cc_holder_name` varchar(50) NOT NULL,
  PRIMARY KEY (`credit_card_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cc_hotlist`
--

INSERT INTO `cc_hotlist` (`credit_card_number`, `cc_holder_name`) VALUES
('1111111111111111', 'Waqas Hotlist');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) DEFAULT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `customer_type` varchar(10) DEFAULT 'regular',
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `username`, `password`, `first_name`, `last_name`, `email_address`, `customer_type`) VALUES
(1, 'mdasorwala', 'toor', 'Mustafa', 'Dasorwala', 'mdasorwala@gwu.edu', 'regular'),
(2, 'waqashaider', 'toor', 'Waqas', 'Haider', 'waqashaider@gwu.edu', 'regular');

-- --------------------------------------------------------

--
-- Table structure for table `customer_profile`
--

CREATE TABLE IF NOT EXISTS `customer_profile` (
  `profile_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `shipping_address` varchar(50) DEFAULT NULL,
  `credit_card_number` char(16) NOT NULL,
  `cc_holder_name` varchar(50) NOT NULL,
  `billing_address` varchar(50) NOT NULL,
  `expiration_date_year` year(4) NOT NULL,
  `expiration_date_month` enum('1','2','3','4','5','6','7','8','9','10','11','12') DEFAULT NULL,
  PRIMARY KEY (`profile_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customer_profile`
--

INSERT INTO `customer_profile` (`profile_id`, `customer_id`, `shipping_address`, `credit_card_number`, `cc_holder_name`, `billing_address`, `expiration_date_year`, `expiration_date_month`) VALUES
(1, 1, 'Columbia Plaza', '1234123412341234', 'MID', 'GWU', 2022, '11'),
(2, 2, 'White House', '1111111111111111', 'Waqas Hotlist', 'White House', 2013, '3'),
(3, 2, 'Columbia Plaza B', '404412879878', 'Waqas Haider', 'Columbia Plaza A', 2016, '6');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `profile_id` int(10) unsigned DEFAULT NULL,
  `cc_holder_name` varchar(50) NOT NULL,
  `credit_card_number` char(16) NOT NULL,
  `ip_address` varchar(20) DEFAULT NULL,
  `date_and_time` datetime DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`event_id`),
  KEY `customer_id` (`customer_id`),
  KEY `profile_id` (`profile_id`),
  KEY `credit_card_number` (`credit_card_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `customer_id`, `profile_id`, `cc_holder_name`, `credit_card_number`, `ip_address`, `date_and_time`, `description`) VALUES
(2, 2, 2, 'Waqas Hotlist', '1111111111111111', '::1', '2014-10-27 15:28:09', 'Sale Denied - Bad Credit Card'),
(3, 2, 2, 'Waqas Hotlist', '1111111111111111', '::1', '2014-10-27 15:29:08', 'Sale Denied - Bad Credit Card'),
(4, 2, 2, 'Waqas Hotlist', '1111111111111111', '::1', '2014-10-27 15:30:14', 'Sale Denied - Bad Credit Card'),
(5, 2, 2, 'Waqas Hotlist', '1111111111111111', '::1', '2014-10-27 15:31:13', 'Sale Denied - Bad Credit Card');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_name` varchar(30) NOT NULL,
  `item_description` text,
  `price` decimal(8,2) NOT NULL,
  `date_added` date NOT NULL,
  `category` varchar(20) DEFAULT NULL,
  `quantity_on_hand` int(10) unsigned NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_id`, `item_name`, `item_description`, `price`, `date_added`, `category`, `quantity_on_hand`) VALUES
(1, 'The Last Time They Met', 'From the last time Linda and Thomas meet, at a cha', '2000.00', '2014-10-01', 'Fiction', 12),
(2, 'Columbus Letter', 'I write this to tell you how in thirty-three days ', '5000.00', '2014-06-01', 'History', 6),
(3, 'The Stand : The Complete & Unc', '(1990). 8vo. LIMITED SIGNED EDITION, one of 1250 copies (of 1302 total), SIGNED by King and Wrightson. Full leather, a.e.g., and gilt decorated boards. In black wooden box. Few faint scratches to fore-edge gilt. Touch of rubbing to back of box with few very shallow scratches. Bright, clean copy. NF in VG box. ', '3000.00', '2014-10-15', 'Fiction', 4),
(4, 'The Lithographs of Marc Chagal', 'Tall 4to. With 12 original lithographs. Heavy moisture damage to rear, affecting rear panel of d.j. Bumping and fraying to spine ends, affecting d.j. with minor chipping. Damp staining to spine and d.j. Toning to margins of boards and edgeworn d.j. Toning to margins of leaves. Small ''x'' to top fore-corner of front free endpaper. Dampstaining to top edge of leaves. Edgewear to d.j. with some chipping and frapying. Long tears and chipping to publisher''s acetate d.j. VG/VG/VG.', '1800.00', '2014-10-23', 'Literature', 10);

-- --------------------------------------------------------

--
-- Table structure for table `ordered_items`
--

CREATE TABLE IF NOT EXISTS `ordered_items` (
  `order_id` int(10) unsigned NOT NULL DEFAULT '0',
  `item_id` int(10) unsigned NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`order_id`,`item_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordered_items`
--

INSERT INTO `ordered_items` (`order_id`, `item_id`, `quantity`) VALUES
(1, 3, 1),
(1, 4, 1),
(2, 2, 1),
(3, 1, 1),
(4, 2, 1),
(5, 2, 1),
(6, 1, 2),
(6, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `total_amount` decimal(12,2) DEFAULT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  `shipping_address` varchar(50) NOT NULL,
  `profile_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `total_amount`, `customer_id`, `shipping_address`, `profile_id`) VALUES
(1, '2014-10-27', NULL, 1, 'Columbia Plaza', 0),
(2, '2014-10-27', NULL, 1, 'Columbia Plaza', 1),
(3, '2014-10-27', NULL, 2, 'Corcoran Hall', 0),
(4, '2014-10-27', NULL, 2, 'White House', 0),
(5, '2014-10-27', NULL, 2, 'Columbia Plaza B', 0),
(6, '2014-10-27', NULL, 1, 'GWU', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `review_text` varchar(1000) DEFAULT NULL,
  `item_rating` enum('1','2','3','4','5') DEFAULT NULL,
  `item_id` int(10) unsigned NOT NULL DEFAULT '0',
  `customer_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`customer_id`,`item_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_text`, `item_rating`, `item_id`, `customer_id`) VALUES
('A detailed analysis of the relationship between education and women''s participation in civil society. . . .Best utilized in a course examining the historic relationship between women''s education and women''s participation in public life.', '4', 3, 1),
('Chagall: The Lithographs is a vast collection (1,050 individual pieces) dating from 1922 to 1985. The Russian-born artist lived most of his adulthood in France and is well known for his colorful and exuberant depictions of Jewish life. His work often addresses personal themes and intimate visions, such as his marriage and his deeply held faith. He worked in many media, but, "Lithography soon became his favored printing technique. This is certainly due primarily to the one element he had previously always missed in his graphic art: color. Color is employed in Chagall''s work with greatly varying intensity, from watercolor-like washes and fragile crayon lines to opaque layers whose effect closely resembles that of his luminescent gouaches." This beautifully produced catalogue raisonnÃ© includes descriptions of Chagall''s lithographic process, which utilized stone or zinc plates and acid, and interviews with the printers who worked with Chagall to produce these pieces. This is a lovely, col', '5', 4, 1),
('The Last Time They Met opens with two old lovers, both poets, running into each other at a writer''s conference. Well, Linda Fallon and Thomas Janes aren''t old, actually--just middle-aged, with a lifetime''s worth of history between them. In the first section, Anita Shreve only suggests what that history contains: there was adultery, we gather, and a car accident, plus some illicit encounters under a pitiless Kenyan sun. Presumably the rest of the book will lead back to the beginnings of this grand passion, right? We think we know where this is going--but that''s the tricky part, because we don''t.', '3', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) DEFAULT NULL,
  `role_description` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
  `session_expiry` datetime DEFAULT NULL,
  PRIMARY KEY (`item_id`,`session_id`),
  KEY `shopping_cart_ibfk_1` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`customer_id`, `item_id`, `session_id`, `quantity`, `session_expiry`) VALUES
(2, 3, '76432d6lpvci8hpcbjfn7nr704', 1, NULL);

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
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `customer_profile` (`profile_id`);

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
