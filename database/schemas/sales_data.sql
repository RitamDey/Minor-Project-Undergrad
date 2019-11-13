SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+05:30";
USE `sales`;

--
-- Data dump for table `bill`
--

INSERT INTO `bill` (`id`, `billed_to`, `time`) VALUES
(2, 1, '2019-10-05 08:14:37'),
(3, 1, '2019-10-05 10:05:00'),
(4, 2, '2019-10-29 01:56:57'),
(5, 1, '2019-10-29 01:56:57');

--
-- Dumping data for table `books_bill`
--

INSERT INTO `books_bill` (`bill_id`, `book`, `quantity`) VALUES
(2, 9780439064866, 1),
(2, 9780545010221, 1),
(2, 9780439139601, 1),
(2, 9780439785969, 1),
(2, 9780439358071, 1),
(2, 9780439655484, 1),
(2, 9780439554930, 1),
(3, 9780553296983, 1),
(4, 9780451526342, 1),
(4, 9780553296983, 1),
(5, 9780553296983, 2),
(5, 9780545010221, 1),
(3, 9780451526342, 1);

COMMIT;
