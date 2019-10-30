-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 29, 2019 at 09:32 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+05:30";
USE `sales`;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--
-- Creation: Oct 05, 2019 at 07:25 PM
--

CREATE TABLE `bill` (
  `id` bigint(20) NOT NULL,
  `billed_to` bigint(20) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `bill`:
--   `billed_to`
--       `customer` -> `id`
--


-- --------------------------------------------------------

--
-- Table structure for table `books_bill`
--
-- Creation: Oct 05, 2019 at 07:26 PM
--

CREATE TABLE `books_bill` (
  `bill_id` bigint(20) NOT NULL,
  `book` bigint(13) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `books_bill`:
--   `bill_id`
--       `bill` -> `id`
--   `book`
--       `book` -> `isbn`
--


-- --------------------------------------------------------

--
-- Table structure for table `shopcart`
--
-- Creation: Oct 28, 2019 at 09:00 PM
--

CREATE TABLE `shopcart` (
  `user` bigint(20) NOT NULL,
  `cart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `shopcart`:
--

-- --------------------------------------------------------

--
-- Table structure for table `shopcart_items`
--
-- Creation: Oct 28, 2019 at 09:02 PM
--

CREATE TABLE `shopcart_items` (
  `cart` int(11) NOT NULL,
  `book` bigint(13) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `shopcart_items`:
--   `book`
--       `book` -> `isbn`
--   `cart`
--       `shopcart` -> `cart_id`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billed_to` (`billed_to`);

--
-- Indexes for table `books_bill`
--
ALTER TABLE `books_bill`
  ADD KEY `bill_id` (`bill_id`),
  ADD KEY `book` (`book`);

--
-- Indexes for table `shopcart`
--
ALTER TABLE `shopcart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `shopcart_items`
--
ALTER TABLE `shopcart_items`
  ADD KEY `cart` (`cart`),
  ADD KEY `book` (`book`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shopcart`
--
ALTER TABLE `shopcart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`billed_to`) REFERENCES `authentication`.`customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `books_bill`
--
ALTER TABLE `books_bill`
  ADD CONSTRAINT `books_bill_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_bill_ibfk_2` FOREIGN KEY (`book`) REFERENCES `bookstore`.`book` (`isbn`);

--
-- Constraints for table `shopcart_items`
--
ALTER TABLE `shopcart_items`
  ADD CONSTRAINT `shopcart_items_ibfk_1` FOREIGN KEY (`book`) REFERENCES `bookstore`.`book` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shopcart_items_ibfk_2` FOREIGN KEY (`cart`) REFERENCES `shopcart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
