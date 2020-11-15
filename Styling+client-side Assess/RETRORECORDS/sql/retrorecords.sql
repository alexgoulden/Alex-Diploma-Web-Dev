-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2020 at 02:13 PM
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
-- Database: `retrorecords`
--

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `ID` int(11) NOT NULL,
  `albumImage` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `price` double(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `album` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `name`, `email`, `artist`, `album`) VALUES
(1, 'Alex Goulden', 'thesirwoofish@gmail.com', 'King Gizz', 'asda'),
(2, 'Alex Goulden', 'thesirwoofish@gmail.com', 'King Gizz', 'asdasd'),
(3, 'Alex Goulden', 'thesirwoofish@gmail.com', 'King Gizz', 'asdas'),
(4, 'Alex Goulden', 'thesirwoofish@gmail.com', 'King Gizz', 'ffffffffff'),
(5, 'Alex Goulden', 'thesirwoofish@gmail.com', 'King Gizz', 'asdas'),
(6, 'Maxx Hazell', 'shinglesfallingfast@gmail.com', 'original', 'originalie'),
(7, 'Testaroonie', 'alexrgoulden@gmail.com', 'gfree4rtg', 'hraerhg'),
(8, 'minon burger', 'gru@minion.net', 'Lil Gru', 'Gruvy'),
(9, 'Alex Goulden', 'thesirwoofish@gmail.com', 'ahhahahaaadfaf', 'dsfadsfwww1111'),
(10, 'Alex Goulden', 'alexrgoulden@gmail.com', 'test', 'tset'),
(11, 'Alex Goulden', 'alexrgoulden@gmail.com', 'newtest', 'a song'),
(12, 'Alex Goulden', 'alexrgoulden@gmail.com', 'asdfasdf', 'big confirm'),
(13, 'Alex Goulden', 'alexrgoulden@gmail.com', 'rerer', 'sasasa'),
(14, 'Alex Goulden', 'alexrgoulden@gmail.com', 'testing confirmation', 'areger'),
(15, 'Alex Goulden', 'alexrgoulden@gmail.com', 'testing alert agai', 'erertertfdbstmy'),
(16, 'Alex Goulden', 'alexrgoulden@gmail.com', 'adsfsd', 'asdas'),
(17, 'Alex Goulden', 'alexrgoulden@gmail.com', 'sadsaddsdsaasdsadsdasadsdasadsda', 'sdasadsdasadsdasadsdasdasadasdsad'),
(18, 'Alex Goulden', 'alexrgoulden@gmail.com', 'popo', 'epep'),
(19, 'Alex Goulden', 'alexrgoulden@gmail.com', 'adsfsd', 'areger'),
(20, 'Alex Goulden', 'alexrgoulden@gmail.com', 'adsfsd', 'testing'),
(21, 'alex', 'asdsa@gmgm.com', 'sdada', 'adsdas'),
(22, 'asdas', 'aadaasd@pa.com', 'asdasd', 'asdasd'),
(23, 'asd', 'da@gf', 'fa', 'faf'),
(24, 'awww', 'wqqqq@a.com', 'weweew', 'g'),
(26, 'Alex Goulden', 'thesirwoofish@gmail.com', 'ahhhh', 'hahahahewhhwwhefa'),
(27, 'frankie', 'sinatra@moon.com', 'you', 'good'),
(28, 'Alex Goulden', 'thesirwoofish@gmail.com', 'big ', 'finale'),
(29, 'Alex Goulden', 'shinglesfallingfast@gmail.com', 'wwwww', '.......'),
(30, 'Alex Goulden', 'thesirwoofish@gmail.com', 'kkjkjk', 'oioioooioi'),
(31, 'adsklkll', 'alexrgoulden@gmail.com', 'PPPPP', 'MMMMM'),
(32, 'ripp', 'me@me', 'ripir', 'rir'),
(33, 'e', 'e@e', 'e', 'e'),
(34, 'far', 'out@mind', 'its ', 'done'),
(35, 'is', 'it@goal', 'lets', 'see'),
(36, 'Alex Goulden', 'alexrgoulden@gmail.com', 'dasdasdas2wqeqwef', 'check'),
(37, 'Alex Goulden', 'alexrgoulden@gmail.com', 'e', 'checkingaw'),
(38, 'e', 'ef@f', 'gfree4rtg', 'agagagag'),
(39, 'Alex Goulden', 'thesirwoofish@gmail.com', 'test', 'test'),
(40, 'Alex Goulden', 'thesirwoofish@gmail.com', 'test', 'classname'),
(41, 'Alex Goulden', 'thesirwoofish@gmail.com', 'test', 'class names'),
(42, 'Alex Goulden', 'thesirwoofish@gmail.com', 'King Gizz', 'areger'),
(43, 'Maxx Hazell', 'shinglesfallingfast@gmail.com', 'ewe', 'ewew'),
(44, 'Alex Goulden', 'thesirwoofish@gmail.com', 'as', 'can'),
(45, 'Maxx Hazell', 'shinglesfallingfast@gmail.com', 'test', '123'),
(46, 'Alex Goulden', 'thesirwoofish@gmail.com', '123', '321'),
(47, 'Alex Goulden', 'thesirwoofish@gmail.com', '123', '1234'),
(48, 'Alex Goulden', 'thesirwoofish@gmail.com', 'a', '12345'),
(49, 'Alex Goulden', 'thesirwoofish@gmail.com', 'ew', 'eweweweww21164353'),
(50, 'Alex Goulden', 'thesirwoofish@gmail.com', 'aew', 'ewaef1'),
(51, 'Alex Goulden', 'thesirwoofish@gmail.com', 'adsfsd', 'areger'),
(52, 'Alex Goulden', 'thesirwoofish@gmail.com', 'King Gizz', 'areger'),
(53, 'Alex Goulden', 'thesirwoofish@gmail.com', 'dasdasdas2wqeqwef', 'ffffffffff'),
(54, 'Alex Goulden', 'thesirwoofish@gmail.com', 'King Gizz', 'Liz Wiz'),
(55, 'Alex Goulden', 'thesirwoofish@gmail.com', 'King Gizz', 'Lizzie Wizzie'),
(56, 'asda', 'thesirwoofish@gmail.com', 'gd', '2222'),
(57, 'Alex Goulden', 'alexrgoulden@gmail.com', 'adsfsd', 'asdas'),
(58, 'Alex Goulden', 'alexrgoulden@gmail.com', 'King Gizz', 'asdas'),
(59, 'Alex Goulden', 'thesirwoofish@gmail.com', 'King Gizz', 'h56jekuuit'),
(60, 'Alex', 'mobile@alex.com', 'King Gizz', 'h56jekuuit'),
(61, 'Alex Goulden', 'thesirwoofish@gmail.com', 'testaroonie', 'baba booey'),
(62, 'Alex Goulden', 'thesirwoofish@gmail.com', 'dasdasdas2wqeqwef', 'doc diff'),
(63, 'Alex Goulden', 'thesirwoofish@gmail.com', 'King Gizz', 'asdas'),
(64, 'Alex Goulden', 'alexrgoulden@gmail.com', '123', '123'),
(65, 'Alex Goulden', 'thesirwoofish@gmail.com', 'King Gizz', 'ffffffffff'),
(66, 'Alex Goulden', 'thesirwoofish@gmail.com', 'Testing', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
