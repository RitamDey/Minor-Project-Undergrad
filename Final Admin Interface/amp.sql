-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 28, 2019 at 03:05 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Saptarshi`
--

-- --------------------------------------------------------

--
-- Table structure for table `amp`
--

CREATE TABLE `amp` (
  `emp_id` varchar(10) NOT NULL,
  `emp_name` varchar(20) NOT NULL,
  `salary` int(10) NOT NULL,
  `doj` date NOT NULL,
  `dept` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amp`
--

INSERT INTO `amp` (`emp_id`, `emp_name`, `salary`, `doj`, `dept`) VALUES
('02', 'Ritam', 10000, '2019-08-10', 'manager'),
('1', 'Pom Boy', 50000, '2019-10-07', 'HR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amp`
--
ALTER TABLE `amp`
  ADD PRIMARY KEY (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
