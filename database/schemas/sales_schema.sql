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
-- Creation: Oct 03, 2019 at 04:37 PM
--

CREATE TABLE IF NOT EXISTS `bill` (
  `id` bigint(20) NOT NULL,
  `billed_to` bigint(20) NOT NULL,
  `billed_by` bigint(20) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `bill`:
--   `billed_by`
--       `employee` -> `id`
--   `billed_to`
--       `customer` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `books_bill`
--
-- Creation: Oct 03, 2019 at 04:40 PM
--

CREATE TABLE IF NOT EXISTS `books_bill` (
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billed_to` (`billed_to`),
  ADD KEY `billed_by` (`billed_by`);

--
-- Indexes for table `books_bill`
--
ALTER TABLE `books_bill`
  ADD KEY `bill_id` (`bill_id`),
  ADD KEY `book` (`book`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`billed_by`) REFERENCES `administration`.`employee` (`id`),
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`billed_to`) REFERENCES `authentication`.`customer` (`id`);

--
-- Constraints for table `books_bill`
--
ALTER TABLE `books_bill`
  ADD CONSTRAINT `books_bill_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `books_bill_ibfk_2` FOREIGN KEY (`book`) REFERENCES `bookstore`.`book` (`isbn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
