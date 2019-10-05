-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 05, 2019 at 04:27 AM
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
-- Database: `authentication`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--
-- Creation: Oct 04, 2019 at 11:28 PM
--

CREATE TABLE `customer` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `joined` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phone` bigint(10) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `pin` bigint(7) DEFAULT NULL,
  `password` varchar(1000) NOT NULL,
  `picture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- MIME TYPES FOR TABLE `customer`:
--   `picture`
--       `Image_JPEG`
--

--
-- RELATIONSHIPS FOR TABLE `customer`:
--

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `dob`, `joined`, `phone`, `email`, `address`, `pin`, `password`, `picture`) VALUES
(6, NULL, NULL, '2019-10-05 04:59:12', NULL, 'admin@localhost', NULL, NULL, '$2y$11$wmQv1Ma9O0Hp5T3MouTW/OAXD.fhcZGOlsEvaxYpngEC2S1b2aV66', NULL),
(7, NULL, NULL, '2019-10-05 05:10:17', NULL, 'stux@localhost.com', NULL, NULL, '$2y$11$Qck7mlARIxaY3mIEX87M0O7BRw/ApqTCmA.3.w82nmHMjkOHs8sSi', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
