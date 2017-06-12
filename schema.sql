-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2017 at 09:27 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `category`
--

use app;

CREATE TABLE `category` (
  `Id` int(11) NOT NULL,
  `Name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Id`, `Name`) VALUES
(1, 'Art'),
(3, 'Business'),
(4, 'Fasion'),
(5, 'Music'),
(6, 'Gameing');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `Id` int(11) NOT NULL,
  `Content` text NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Date_created` date NOT NULL,
  `Topic_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`Id`, `Content`, `User_Id`, `Date_created`, `Topic_Id`) VALUES
(0, 'Test3', 14, '2017-04-05', 1),
(1, 'Test1', 14, '2017-04-04', 1),
(2, 'Test2', 14, '2017-04-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `Id` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Content` text NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Date_created` date NOT NULL,
  `Anonymous` tinyint(1) NOT NULL,
  `category_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`Id`, `Title`, `Content`, `User_Id`, `Date_created`, `Anonymous`, `category_Id`) VALUES
(1, 'Can you loose your virginity if you fall?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in commodo mauris. Aliquam ante turpis, pulvinar id tempus eget, pulvinar interdum felis. Nulla vitae mi lobortis, pharetra tortor eget, commodo tellus. Suspendisse potenti. Ut condimentum interdum cursus. Morbi quis vestibulum ligula. Aliquam dignissim turpis ligula. Cras maximus ac risus vel malesuada. Donec rutrum luctus molestie. ', 14, '2017-01-26', 1, 1),
(3, 'haha', 'haha', 1, '0000-00-00', 0, 1),
(4, 'haha', 'haha', 1, '0000-00-00', 0, 1),
(5, 'jhhjhjhjh', 'jhjhjh', 1, '2017-01-30', 1, 3),
(6, 'jhhjhjhjh', 'jhjhjh', 1, '2017-01-30', 1, 3),
(7, 'jhhjhkhkhkhkhk', 'jhjhjh', 1, '2017-01-30', 1, 3),
(8, 'jhhjhkhkhkhkhk', 'jhjhjh', 1, '2017-01-30', 1, 3),
(9, 'Logic X Controllers ', 'Hi\r\n\r\nI thought about...', 14, '2017-03-16', 0, 5),
(10, 'Logic X Controllers ', 'Hi\r\n\r\nI thought about...', 14, '2017-03-16', 0, 5),
(11, 'Logic X Controllers ', 'Hi\r\n\r\nI thought about...', 14, '2017-03-16', 0, 5),
(12, 'Hallo ', '<yx<yx', 14, '2017-03-27', 0, 3),
(13, 'Hallo ', '<yx<yx', 14, '2017-03-27', 0, 3),
(14, 'HotDog with Cheese?', 'Do HotDogs taste good with cheese?', 14, '2017-04-04', 0, 1),
(15, 'HotDog with Cheese?', 'Do HotDogs taste good with cheese?', 14, '2017-04-04', 0, 1),
(16, 'MPC Touch', 'hello', 14, '2017-04-04', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `topic_comment`
--

CREATE TABLE `topic_comment` (
  `Id` int(11) NOT NULL,
  `Topic_Id` int(11) NOT NULL,
  `Comment_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Username` text NOT NULL,
  `Email` text NOT NULL,
  `Password` text NOT NULL,
  `Member_since` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Username`, `Email`, `Password`, `Member_since`) VALUES
(1, 'werwer', 'sdfsdffsd@sddfsfsdsfdsfd.jp', 'dgdg', '2017-01-26'),
(14, 'noah', 'no', 'no', '2017-01-26'),
(16, 'hala', 'hala@gaga.com', '32310813', '2017-01-27'),
(17, 'El_Stonero420', 'elstonero420@gmail.com', 'beizne', '2017-01-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `topic_comment`
--
ALTER TABLE `topic_comment`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
