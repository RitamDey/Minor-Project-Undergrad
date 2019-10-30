-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 29, 2019 at 09:36 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+05:30";
USE `authentication`;

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
-- Creation: Oct 05, 2019 at 04:49 AM
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
  `picture` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- MIME TYPES FOR TABLE `customer`:
--   `picture`
--       `Image_JPEG`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--
-- Creation: Oct 05, 2019 at 03:59 AM
--

CREATE TABLE `user_sessions` (
  `session` varchar(100) NOT NULL,
  `user` bigint(20) NOT NULL,
  `started` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `user_sessions`:
--   `user`
--       `customer` -> `id`
--
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
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`session`),
  ADD KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD CONSTRAINT `user_sessions_ibfk_1` FOREIGN KEY (`user`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
