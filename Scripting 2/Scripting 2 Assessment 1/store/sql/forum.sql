-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2020 at 04:37 PM
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
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum_categories`
--

CREATE TABLE `forum_categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(150) DEFAULT NULL,
  `category_description` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_categories`
--

INSERT INTO `forum_categories` (`category_id`, `category_title`, `category_description`) VALUES
(1, 'Shirts', 'Discuss the sites shirts'),
(2, 'Books', 'All about our books'),
(3, 'Hats', 'Hatty about our hats');

-- --------------------------------------------------------

--
-- Table structure for table `forum_posts`
--

CREATE TABLE `forum_posts` (
  `post_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_text` text,
  `post_create_time` datetime DEFAULT NULL,
  `post_owner` varchar(150) DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_posts`
--

INSERT INTO `forum_posts` (`post_id`, `topic_id`, `post_text`, `post_create_time`, `post_owner`, `category_id`) VALUES
(1, 1, 'This is the very first topic, who wants to talk about them?', '2020-06-30 00:49:57', 'thesirwoofish@gmail.com', 0),
(2, 0, 'Yo, I\'m down to talk about topics!', '2020-06-30 00:50:30', 'frankieflower@gmail.com', 0),
(3, 0, 'pepepepe', '2020-06-30 01:21:25', 'alexrgoulden@gmail.com', 0),
(4, 0, 'asdsads', '2020-06-30 01:26:42', 'frankieflower@gmail.com', 0),
(5, 0, 'Id be down', '2020-06-30 01:29:28', 'frankieflower@gmail.com', 0),
(6, 2, 'trtrtrt', '2020-06-30 01:30:35', 'shinglesfallingfast@gmail.com', 0),
(7, 0, 'ririr', '2020-06-30 01:31:13', 'ewr@gmd.com', 0),
(8, 0, '234', '2020-06-30 01:32:21', '3@rewr', 0),
(9, 0, 'lll\r\n', '2020-06-30 01:38:20', 'frankieflower@gmail.com', 0),
(10, 0, 'rertytyt1', '2020-06-30 15:34:38', 'frankieflower@gmail.com', 0),
(11, 1, 'adadada', '2020-06-30 15:39:53', 'frankieflower@gmail.com', 0),
(12, 1, 'this is a test with a cookie on the store', '2020-06-30 22:26:19', 'frankieflower@gmail.com', 0),
(13, 2, 'btbtbtbt?', '2020-07-01 10:53:01', 'alexrgoulden@gmail.com', 0),
(14, 2, 'ztztztzt', '2020-07-01 10:53:24', 'alexrgoulden@gmail.com', 0),
(15, 2, 'atatatat', '2020-07-01 10:53:38', 'frankieflower@gmail.com', 0),
(16, 3, 'This topic is presented.', '2020-07-02 13:03:30', 'alexrgoulden@gmail.com', 0),
(17, 3, 'this is a reply to the presentation', '2020-07-02 13:03:50', 'frankieflower@gmail.com', 0),
(18, 4, 'a book topic (2)', '2020-07-03 01:31:37', 'alexrgoulden@gmail.com', 0),
(19, 5, '(1)', '2020-07-03 01:33:13', 'alexrgoulden@gmail.com', 0),
(20, 6, '333', '2020-07-03 01:34:13', 'alexrgoulden@gmail.com', 0),
(21, 7, 'ad', '2020-07-03 01:48:58', 'alexrgoulden@gmail.com', 3),
(22, 8, '222222222222', '2020-07-03 01:49:48', 'thesirwoofish@gmail.com', 2),
(23, 8, 'i prefer 3333333333333', '2020-07-03 02:08:18', 'frankieflower@gmail.com', 0),
(24, 9, 'top hats are cool', '2020-07-03 12:00:04', 'thesirwoofish@gmail.com', 2),
(25, 9, 'I think so too', '2020-07-06 00:33:26', 'frankieflower@gmail.com', 0),
(26, 9, 'BANNED - REASON:\r\nWrong topic category.', '2020-07-06 00:34:44', 'g@h', 0),
(27, 10, 'Looks good, thoughts?', '2020-07-06 00:35:39', 'alexrgoulden@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `forum_topics`
--

CREATE TABLE `forum_topics` (
  `topic_id` int(11) NOT NULL,
  `topic_title` varchar(150) DEFAULT NULL,
  `topic_create_time` datetime DEFAULT NULL,
  `topic_owner` varchar(150) DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_topics`
--

INSERT INTO `forum_topics` (`topic_id`, `topic_title`, `topic_create_time`, `topic_owner`, `category_id`) VALUES
(1, 'A topic on topics', '2020-06-30 00:49:57', 'thesirwoofish@gmail.com', 0),
(2, ' A test topic', '2020-06-30 01:30:35', 'shinglesfallingfast@gmail.com', 0),
(3, 'Presented topic', '2020-07-02 13:03:30', 'alexrgoulden@gmail.com', 0),
(4, ' A Book Topic (2)', '2020-07-03 01:31:37', 'alexrgoulden@gmail.com', 0),
(5, 'A topic on shirts (1)', '2020-07-03 01:33:13', 'alexrgoulden@gmail.com', 0),
(6, 'Hats topic 3', '2020-07-03 01:34:13', 'alexrgoulden@gmail.com', 0),
(7, ' 333 A test topic', '2020-07-03 01:48:58', 'alexrgoulden@gmail.com', 3),
(8, '222222222222222222', '2020-07-03 01:49:48', 'thesirwoofish@gmail.com', 2),
(9, 'Hat topic', '2020-07-03 12:00:04', 'thesirwoofish@gmail.com', 2),
(10, 'Anyone reading the Pragmatic Programmer?', '2020-07-06 00:35:39', 'alexrgoulden@gmail.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forum_categories`
--
ALTER TABLE `forum_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `forum_topics`
--
ALTER TABLE `forum_topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forum_categories`
--
ALTER TABLE `forum_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `forum_posts`
--
ALTER TABLE `forum_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `forum_topics`
--
ALTER TABLE `forum_topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
