-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2020 at 02:14 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-store`
--

-- --------------------------------------------------------

--
-- Table structure for table `store_categories`
--

CREATE TABLE `store_categories` (
  `id` int(11) NOT NULL,
  `cat_title` varchar(50) DEFAULT NULL,
  `cat_desc` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store_categories`
--

INSERT INTO `store_categories` (`id`, `cat_title`, `cat_desc`) VALUES
(1, 'Hats', 'Funky hats of all shapes & sizes!'),
(2, 'Shirts', 'T-shirts, sweatshirts, polo shirts and beyond.'),
(3, 'Books', 'Paperback, hardback, books for school and play.');

-- --------------------------------------------------------

--
-- Table structure for table `store_items`
--

CREATE TABLE `store_items` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `item_title` varchar(75) DEFAULT NULL,
  `item_price` float(8,2) DEFAULT NULL,
  `item_desc` text,
  `item_image` varchar(50) DEFAULT NULL,
  `cur_quant` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store_items`
--

INSERT INTO `store_items` (`id`, `cat_id`, `item_title`, `item_price`, `item_desc`, `item_image`, `cur_quant`) VALUES
(1, 1, 'Baseball Hat', 12.00, 'Fancy, low-profile baseball hat.', 'images/baseballhat.gif', 49),
(2, 1, 'Cowboy Hat', 52.00, '10 gallon variety', 'images/cowboyhat.gif', 46),
(3, 1, 'Formal Hat', 102.00, 'Good for costumes.', 'images/tophat.gif', 50),
(4, 2, 'Short-Sleeved T-Shirt', 12.00, '100% cotton, pre-shrunk.', 'images/short_sleeved.gif', 40),
(5, 2, 'Long-Sleeved T-Shirt', 15.00, 'Similar to the short-sleeved shirt, that has longer sleeves.', 'images/long_sleeved.gif', 49),
(6, 2, 'Sweatshirt', 22.00, 'Heavy and warm.', 'images/sweatshirt.gif', 49),
(7, 3, 'Jane\'s Self-Help Book', 12.00, 'Jane gives advice.', 'images/selfhelpbook.gif', 48),
(8, 3, 'Generic Academic Book', 35.00, 'Some required reading for school, will put you to sleep.', 'images/boringbook.gif', 48),
(9, 3, 'Chicago Manual of Style', 9.99, 'Good for copywriters.', 'images/chicagostyle.gif', 47);

-- --------------------------------------------------------

--
-- Table structure for table `store_item_color`
--

CREATE TABLE `store_item_color` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_color` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store_item_color`
--

INSERT INTO `store_item_color` (`id`, `item_id`, `item_color`) VALUES
(1, 1, 'red'),
(2, 1, 'black'),
(3, 1, 'blue'),
(4, 2, 'red'),
(5, 2, 'black'),
(6, 2, 'blue'),
(7, 3, 'red'),
(8, 3, 'black'),
(9, 3, 'blue'),
(10, 4, 'white'),
(11, 4, 'black'),
(12, 4, 'gray'),
(13, 5, 'white'),
(14, 5, 'black'),
(15, 5, 'gray'),
(16, 6, 'white'),
(17, 6, 'black'),
(18, 6, 'gray');

-- --------------------------------------------------------

--
-- Table structure for table `store_item_size`
--

CREATE TABLE `store_item_size` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_size` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store_item_size`
--

INSERT INTO `store_item_size` (`id`, `item_id`, `item_size`) VALUES
(1, 1, 'One Size Fits All'),
(2, 2, 'One Size Fits All'),
(3, 3, 'One Size Fits All'),
(4, 4, 'S'),
(5, 4, 'M'),
(6, 4, 'L'),
(7, 4, 'XL'),
(8, 5, 'S'),
(9, 5, 'M'),
(10, 5, 'L'),
(11, 5, 'XL'),
(12, 6, 'S'),
(13, 6, 'M'),
(14, 6, 'L'),
(15, 6, 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `store_orders`
--

CREATE TABLE `store_orders` (
  `id` int(11) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `order_name` varchar(100) DEFAULT NULL,
  `order_address` varchar(50) DEFAULT NULL,
  `order_city` varchar(50) DEFAULT NULL,
  `order_state` varchar(3) DEFAULT NULL,
  `order_zip` varchar(10) DEFAULT NULL,
  `order_tel` varchar(25) DEFAULT NULL,
  `order_email` varchar(100) DEFAULT NULL,
  `item_total` float(6,2) DEFAULT NULL,
  `shipping_total` float(6,2) DEFAULT NULL,
  `authorization` varchar(50) DEFAULT NULL,
  `status` enum('processed','pending') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store_orders`
--

INSERT INTO `store_orders` (`id`, `order_date`, `order_name`, `order_address`, `order_city`, `order_state`, `order_zip`, `order_tel`, `order_email`, `item_total`, `shipping_total`, `authorization`, `status`) VALUES
(1, '2020-06-26 00:05:07', 'Alex Goulden', '12 Bernadette Ave', 'Nowra', 'NSW', '2541', '0416942279', 'thesirwoofish@gmail.com', NULL, NULL, NULL, NULL),
(2, '2020-06-26 00:12:25', 'Alex Goulden', '12 Bernadette Ave', 'Nowra', 'NSW', '2541', '0416942279', 'thesirwoofish@gmail.com', NULL, NULL, NULL, NULL),
(3, '2020-06-26 00:25:56', 'Alex Goulden', '12 Bernadette Ave', 'Nowra', 'NSW', '2541', '0416942279', 'thesirwoofish@gmail.com', NULL, NULL, NULL, NULL),
(4, '2020-06-26 00:31:06', 'Alex Goulden', '12 Bernadette Ave', 'Nowra', 'NSW', '2541', '0416942279', 'thesirwoofish@gmail.com', NULL, NULL, NULL, NULL),
(5, '2020-06-26 01:04:12', 'Maxx Hazell', '64 Rayleigh dr', 'Worrigee', 'NSW', '2540', '', 'shinglesfallingfast@gmail.com', NULL, NULL, NULL, NULL),
(6, '2020-06-26 01:10:13', 'Weage', 'Frann', '???', 'Liq', '1234', '1', '2@com', NULL, NULL, NULL, NULL),
(7, '2020-06-26 01:11:32', 'Weage', 'Frann', '???', 'Liq', '1234', '1', '2@com', NULL, NULL, NULL, NULL),
(8, '2020-06-26 01:11:38', 'Weage', 'Frann', '???', 'Liq', '1234', '1', '2@com', NULL, NULL, NULL, NULL),
(9, '2020-06-26 01:11:55', 'Alex Goulden', '12 Bernadette Ave', 'Nowra', 'NSW', '2541', '0416942279', 'thesirwoofish@gmail.com', NULL, NULL, NULL, NULL),
(10, '2020-06-26 01:15:56', 'Alex Goulden', '12 Bernadette Ave', 'Nowra', 'NSW', '2541', '0416942279', 'thesirwoofish@gmail.com', NULL, NULL, NULL, NULL),
(11, '2020-06-26 01:16:28', 'Alex Goulden', '12 Bernadette Ave', 'Nowra', 'NSW', '2541', '0416942279', 'thesirwoofish@gmail.com', NULL, NULL, NULL, NULL),
(12, '2020-06-26 01:16:41', 'Alex Goulden', '12 Bernadette Ave', 'Nowra', 'NSW', '2541', '0416942279', 'thesirwoofish@gmail.com', NULL, NULL, NULL, NULL),
(13, '2020-06-26 01:17:18', 'Alex Goulden', '12 Bernadette Ave', 'Nowra', 'NSW', '2541', '0416942279', 'thesirwoofish@gmail.com', NULL, NULL, NULL, NULL),
(14, '2020-06-26 01:18:45', 'Alex Goulden', '12 Bernadette Ave', 'Nowra', 'NSW', '2541', '0416942279', 'thesirwoofish@gmail.com', NULL, NULL, NULL, NULL),
(15, '2020-06-26 01:20:37', 'Testo', '12 Bernadette Ave', 'Nowra', 'NSW', '2541', '0416942279', 'thesirwoofish@gmail.com', NULL, NULL, NULL, NULL),
(16, '2020-06-26 01:23:59', 'Tester', '12 Bernadette Ave', 'Nowra', 'NSW', '2541', '0416942279', 'thesirwoofish@gmail.com', NULL, NULL, NULL, NULL),
(17, '2020-06-26 01:27:35', 'Alex Goulden', '12 Bernadette Ave', 'Nowra', 'NSW', '2541', '0416942279', 'thesirwoofish@gmail.com', NULL, NULL, NULL, NULL),
(18, '2020-06-26 01:29:37', 'Maxx Hazell', '64 Rayleigh dr', 'Worrigee', 'NSW', '2540', '', 'shinglesfallingfast@gmail.com', NULL, NULL, NULL, NULL),
(19, '2020-06-26 10:07:24', 'Alex Goulden', '12 Bernadette Ave', 'Nowra', 'NSW', '2541', '0416942279', 'thesirwoofish@gmail.com', NULL, NULL, NULL, NULL),
(20, '2020-06-26 10:16:03', 'Alex Goulden', '12 Bernadette Ave', 'Nowra', 'NSW', '2541', '0416942279', 'thesirwoofish@gmail.com', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `store_orders_items`
--

CREATE TABLE `store_orders_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `sel_item_id` int(11) DEFAULT NULL,
  `sel_item_qty` smallint(6) DEFAULT NULL,
  `sel_item_size` varchar(25) DEFAULT NULL,
  `sel_item_color` varchar(25) DEFAULT NULL,
  `sel_item_price` float(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store_orders_items`
--

INSERT INTO `store_orders_items` (`id`, `order_id`, `sel_item_id`, `sel_item_qty`, `sel_item_size`, `sel_item_color`, `sel_item_price`) VALUES
(1, 1, 2, 3, 'One Size Fits All', 'black', 12.00),
(2, 3, 5, 1, '', '', 9.99),
(3, 4, 7, 1, 'L', 'black', 15.00),
(4, 5, 8, 1, 'One Size Fits All', 'black', 12.00),
(5, 5, 9, 1, '', '', 35.00),
(6, 6, 11, 1, 'L', 'black', 22.00),
(7, 9, 12, 1, 'L', 'black', 22.00),
(8, 12, 13, 1, 'L', 'black', 12.00),
(9, 13, 14, 1, '', '', 12.00),
(10, 14, 14, 1, '', '', 12.00),
(11, 14, 15, 1, 'L', 'black', 15.00),
(12, 15, 14, 1, '', '', 12.00),
(13, 15, 15, 1, 'L', 'black', 15.00),
(14, 15, 16, 1, '', '', 9.99),
(15, 16, 19, 1, 'One Size Fits All', 'black', 12.00),
(16, 17, 19, 1, 'One Size Fits All', 'black', 12.00),
(17, 17, 20, 1, 'One Size Fits All', 'black', 52.00),
(18, 18, 21, 1, '', '', 9.99),
(19, 19, 23, 1, '', '', 9.99),
(20, 20, 24, 1, '', '', 12.00),
(21, 20, 25, 1, 'L', 'black', 15.00);

-- --------------------------------------------------------

--
-- Table structure for table `store_shoppertrack`
--

CREATE TABLE `store_shoppertrack` (
  `id` int(11) NOT NULL,
  `session_id` varchar(32) DEFAULT NULL,
  `sel_item_id` int(11) DEFAULT NULL,
  `sel_item_qty` smallint(6) DEFAULT NULL,
  `sel_item_size` varchar(25) DEFAULT NULL,
  `sel_item_color` varchar(25) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store_shoppertrack`
--

INSERT INTO `store_shoppertrack` (`id`, `session_id`, `sel_item_id`, `sel_item_qty`, `sel_item_size`, `sel_item_color`, `date_added`) VALUES
(22, 'rgc7dkusr2g7c1v4nr1ng83dfb', 6, 1, 'L', 'black', '2020-06-26 01:30:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `store_categories`
--
ALTER TABLE `store_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `store_items`
--
ALTER TABLE `store_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_item_color`
--
ALTER TABLE `store_item_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_item_size`
--
ALTER TABLE `store_item_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_orders`
--
ALTER TABLE `store_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_orders_items`
--
ALTER TABLE `store_orders_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_shoppertrack`
--
ALTER TABLE `store_shoppertrack`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `store_categories`
--
ALTER TABLE `store_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `store_items`
--
ALTER TABLE `store_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `store_item_color`
--
ALTER TABLE `store_item_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `store_item_size`
--
ALTER TABLE `store_item_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `store_orders`
--
ALTER TABLE `store_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `store_orders_items`
--
ALTER TABLE `store_orders_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `store_shoppertrack`
--
ALTER TABLE `store_shoppertrack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
