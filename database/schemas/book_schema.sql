-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 30, 2019 at 12:22 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--
-- Creation: Aug 28, 2019 at 01:58 PM
--

CREATE TABLE `author` (
  `name` varchar(15) NOT NULL,
  `bio` text,
  `site` text,
  `picture` varchar(100) DEFAULT NULL,
  `dob` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `author`:
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--
-- Creation: Aug 29, 2019 at 10:22 PM
--

CREATE TABLE `book` (
  `isbn` int(13) NOT NULL,
  `name` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `price` float NOT NULL,
  `book_number` int(11) DEFAULT NULL,
  `series` varchar(15) DEFAULT NULL,
  `publisher` varchar(15) NOT NULL,
  `author` varchar(15) NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `genre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `book`:
--   `author`
--       `author` -> `name`
--   `publisher`
--       `publisher` -> `name`
--   `series`
--       `series` -> `title`
--   `genre`
--       `genre` -> `name`
--

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--
-- Creation: Aug 28, 2019 at 07:11 PM
--

CREATE TABLE `genre` (
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `genre`:
--

-- --------------------------------------------------------

--
-- Table structure for table `is_tagged`
--
-- Creation: Aug 28, 2019 at 07:16 PM
--

CREATE TABLE `is_tagged` (
  `id` int(11) NOT NULL,
  `isbn` int(13) NOT NULL,
  `tag` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `is_tagged`:
--   `isbn`
--       `book` -> `isbn`
--   `tag`
--       `tag` -> `name`
--

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--
-- Creation: Aug 28, 2019 at 01:58 PM
--

CREATE TABLE `publisher` (
  `name` varchar(15) NOT NULL,
  `address` text,
  `contact` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `publisher`:
--

-- --------------------------------------------------------

--
-- Table structure for table `series`
--
-- Creation: Aug 28, 2019 at 01:58 PM
--

CREATE TABLE `series` (
  `title` varchar(30) NOT NULL,
  `author` varchar(15) NOT NULL,
  `publisher` varchar(15) NOT NULL,
  `total_books` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `series`:
--   `author`
--       `author` -> `name`
--   `publisher`
--       `publisher` -> `name`
--

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--
-- Creation: Aug 28, 2019 at 07:11 PM
--

CREATE TABLE `tag` (
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `tag`:
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `author` (`author`),
  ADD KEY `publisher` (`publisher`),
  ADD KEY `series` (`series`),
  ADD KEY `genre` (`genre`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `is_tagged`
--
ALTER TABLE `is_tagged`
  ADD KEY `isbn` (`isbn`),
  ADD KEY `tag` (`tag`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`name`) USING BTREE;

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`title`),
  ADD KEY `author` (`author`),
  ADD KEY `publisher` (`publisher`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`author`) REFERENCES `author` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`publisher`) REFERENCES `publisher` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`series`) REFERENCES `series` (`title`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_4` FOREIGN KEY (`genre`) REFERENCES `genre` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `is_tagged`
--
ALTER TABLE `is_tagged`
  ADD CONSTRAINT `is_tagged_ibfk_1` FOREIGN KEY (`isbn`) REFERENCES `book` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_tagged_ibfk_2` FOREIGN KEY (`tag`) REFERENCES `tag` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `series`
--
ALTER TABLE `series`
  ADD CONSTRAINT `series_ibfk_1` FOREIGN KEY (`author`) REFERENCES `author` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `series_ibfk_2` FOREIGN KEY (`publisher`) REFERENCES `publisher` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
