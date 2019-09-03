-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 03, 2019 at 11:26 AM
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
CREATE DATABASE IF NOT EXISTS `authentication` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `authentication`;
--
-- Database: `bookstore`
--
CREATE DATABASE IF NOT EXISTS `bookstore` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bookstore`;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `name` varchar(15) NOT NULL,
  `bio` text,
  `site` text,
  `picture` varchar(100) DEFAULT NULL,
  `dob` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`name`, `bio`, `site`, `picture`, `dob`) VALUES
('admin_author', 'The admin\'s ramblings', '127.0.0.1/phpmyadmin', NULL, '2019-08-30 10:01:54'),
('J.K Rowling', 'Although she writes under the pen name J.K. Rowling, pronounced like rolling, her name when her first Harry Potter book was published was simply Joanne Rowling. Anticipating that the target audience of young boys might not want to read a book written by a woman, her publishers demanded that she use two initials, rather than her full name. As she had no middle name, she chose K as the second initial of her pen name, from her paternal grandmother Kathleen Ada Bulgen Rowling. She calls herself Jo and has said, \"No one ever called me \'Joanne\' when I was young, unless they were angry.\" Following her marriage, she has sometimes used the name Joanne Murray when conducting personal business. During the Leveson Inquiry she gave evidence under the name of Joanne Kathleen Rowling. In a 2012 interview, Rowling noted that she no longer cared that people pronounced her name incorrectly.\r\n\r\nRowling was born to Peter James Rowling, a Rolls-Royce aircraft engineer, and Anne Rowling (née Volant), on 31 July 1965 in Yate, Gloucestershire, England, 10 miles (16 km) northeast of Bristol. Her mother Anne was half-French and half-Scottish. Her parents first met on a train departing from King\'s Cross Station bound for Arbroath in 1964. They married on 14 March 1965. Her mother\'s maternal grandfather, Dugald Campbell, was born in Lamlash on the Isle of Arran. Her mother\'s paternal grandfather, Louis Volant, was awarded the Croix de Guerre for exceptional bravery in defending the village of Courcelles-le-Comte during the First World War.\r\n\r\nRowling\'s sister Dianne was born at their home when Rowling was 23 months old. The family moved to the nearby village Winterbourne when Rowling was four. She attended St Michael\'s Primary School, a school founded by abolitionist William Wilberforce and education reformer Hannah More. Her headmaster at St Michael\'s, Alfred Dunn, has been suggested as the inspiration for the Harry Potter headmaster Albus Dumbledore.\r\n\r\nAs a child, Rowling often wrote fantasy stories, which she would usually then read to her sister. She recalls that: \"I can still remember me telling her a story in which she fell down a rabbit hole and was fed strawberries by the rabbit family inside it. Certainly the first story I ever wrote down (when I was five or six) was about a rabbit called Rabbit. He got the measles and was visited by his friends, including a giant bee called Miss Bee.\" At the age of nine, Rowling moved to Church Cottage in the Gloucestershire village of Tutshill, close to Chepstow, Wales. When she was a young teenager, her great aunt, who Rowling said \"taught classics and approved of a thirst for knowledge, even of a questionable kind,\" gave her a very old copy of Jessica Mitford\'s autobiography, Hons and Rebels. Mitford became Rowling\'s heroine, and Rowling subsequently read all of her books.\r\n\r\nRowling has said of her teenage years, in an interview with The New Yorker, \"I wasn’t particularly happy. I think it’s a dreadful time of life.\" She had a difficult homelife; her mother was ill and she had a difficult relationship with her father (she is no longer on speaking terms with him). She attended secondary school at Wyedean School and College, where her mother had worked as a technician in the science department. Rowling said of her adolescence, \"Hermione [a bookish, know-it-all Harry Potter character] is loosely based on me. She\'s a caricature of me when I was eleven, which I\'m not particularly proud of.\" Steve Eddy, who taught Rowling English when she first arrived, remembers her as \"not exceptional\" but \"one of a group of girls who were bright, and quite good at English.\" Sean Harris, her best friend in the Upper Sixth owned a turquoise Ford Anglia, which she says inspired the one in her books.', 'http://www.jkrowling.com/', 'https://images.gr-assets.com/authors/1510435123p8/1077326.jpg', '1965-07-31 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `isbn` bigint(13) NOT NULL,
  `name` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `price` float NOT NULL,
  `book_number` int(11) DEFAULT NULL,
  `series` varchar(15) DEFAULT NULL,
  `publisher` varchar(15) NOT NULL,
  `author` varchar(15) NOT NULL,
  `picture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`isbn`, `name`, `detail`, `price`, `book_number`, `series`, `publisher`, `author`, `picture`) VALUES
(9780439554930, ' Harry Potter and the Sorcerer\'s Stone', 'Harry Potter\'s life is miserable. His parents are dead and he\'s stuck with his heartless relatives, who force him to live in a tiny closet under the stairs. But his fortune changes when he receives a letter that tells him the truth about himself: he\'s a wizard. A mysterious visitor rescues him from his relatives and takes him to his new home, Hogwarts School of Witchcraft and Wizardry.\r\n\r\nAfter a lifetime of bottling up his magical powers, Harry finally feels like a normal kid. But even within the Wizarding community, he is special. He is the boy who lived: the only person to have ever survived a killing curse inflicted by the evil Lord Voldemort, who launched a brutal takeover of the Wizarding world, only to vanish after failing to kill Harry.\r\n\r\nThough Harry\'s first year at Hogwarts is the best of his life, not everything is perfect. There is a dangerous secret object hidden within the castle walls, and Harry believes it\'s his responsibility to prevent it from falling into evil hands. But doing so will bring him into contact with forces more terrifying than he ever could have imagined.\r\n\r\nFull of sympathetic characters, wildly imaginative situations, and countless exciting details, the first installment in the series assembles an unforgettable magical world and sets the stage for many high-stakes adventures to come. ', 100, 1, 'Harry Potter', 'Scholastic Inc.', 'J.K Rowling', 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1474154022l/3._SY475_.jpg'),
(9781786491046, 'Admin Rambling', 'Rambling of the admins', 0.5, 1, 'Admin Rambles', 'admin_publisher', 'admin_author', NULL),
(9781786491047, 'Ramblers', 'Why do we ramble?', 0.5, 2, 'Admin Rambles', 'admin_publisher', 'admin_author', NULL),
(9781786491048, 'I Quit', 'Can\'t stand them anymore', 0.5, 3, 'Admin Rambles', 'admin_publisher', 'admin_author', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `is_tagged`
--

CREATE TABLE `is_tagged` (
  `id` int(11) NOT NULL,
  `isbn` bigint(13) NOT NULL,
  `tag` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `is_tagged`
--

INSERT INTO `is_tagged` (`id`, `isbn`, `tag`) VALUES
(1, 9781786491046, 'ramblings'),
(2, 9780439554930, 'Fantasy'),
(3, 9780439554930, 'Young Adult'),
(4, 9780439554930, 'Fiction'),
(5, 9781786491048, 'ramblings'),
(6, 9781786491047, 'ramblings');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `name` varchar(15) NOT NULL,
  `address` text,
  `contact` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`name`, `address`, `contact`) VALUES
('admin_publisher', 'Admin\'s publishing stuff', '8250504694'),
('Scholastic Inc.', NULL, '8050504695');

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `title` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `author` varchar(15) NOT NULL,
  `publisher` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`title`, `description`, `author`, `publisher`) VALUES
('Admin Rambles', 'Rambling by different sysadmins, db admins and network admins', 'admin_author', 'admin_publisher'),
('Harry Potter', 'Orphan Harry learns he is a wizard on his 11th birthday when Hagrid escorts him to magic-teaching Hogwarts School. As a baby, his mother\'s love protected him and vanquished the villain Voldemort, leaving the child famous as \"The Boy who Lived\". With his friends Hermione and Ron, Harry has to defeat the returned \"He Who Must Not Be Named\". ', 'J.K Rowling', 'Scholastic Inc.');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `name` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`name`, `description`) VALUES
('Fantasy', ' Fantasy is a genre that uses magic and other supernatural forms as a primary element of plot, theme, and/or setting. Fantasy is generally distinguished from science fiction and horror by the expectation that it steers clear of technological and macabre themes, respectively, though there is a great deal of overlap between the three (collectively known as speculative fiction or science fiction/fantasy)\r\n\r\nIn its broadest sense, fantasy comprises works by many writers, artists, filmmakers, and musicians, from ancient myths and legends to many recent works embraced by a wide audience today, including young adults, most of whom are represented by the works below.'),
('Fiction', 'Fiction is the telling of stories which are not real. More specifically, fiction is an imaginative form of narrative, one of the four basic rhetorical modes. Although the word fiction is derived from the Latin fingo, fingere, finxi, fictum, \"to form, create\", works of fiction need not be entirely imaginary and may include real people, places, and events. Fiction may be either written or oral. Although not all fiction is necessarily artistic, fiction is largely perceived as a form of art or entertainment. The ability to create fiction and other artistic works is considered to be a fundamental aspect of human culture, one of the defining characteristics of humanity.'),
('ramblings', 'Admin ramblings'),
('Young Adult', ' Young-adult fiction (often abbreviated as YA) is fiction written for, published for, or marketed to adolescents and young adults, roughly ages 13 to 18.\r\n\r\nYoung-adult fiction, whether in the form of novels or short stories, has distinct attributes that distinguish it from the other age categories of fiction. The vast majority of YA stories portray an adolescent as the protagonist, rather than an adult or a child. The subject matter and story lines are typically consistent with the age and experience of the main character, but beyond that YA stories span the entire spectrum of fiction genres. The settings of YA stories are limited only by the imagination and skill of the author.\r\n\r\nThemes in YA stories often focus on the challenges of youth, so much so that the entire age category is sometimes referred to as problem novels or coming of age novel. Writing styles of YA stories range widely, from the richness of literary style to the clarity and speed of the unobtrusive. Despite its unique characteristics, YA shares the fundamental elements of fiction with other stories: character, plot, setting, theme, and style.');

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
  ADD KEY `series` (`series`);

--
-- Indexes for table `is_tagged`
--
ALTER TABLE `is_tagged`
  ADD PRIMARY KEY (`id`),
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `is_tagged`
--
ALTER TABLE `is_tagged`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`author`) REFERENCES `author` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`publisher`) REFERENCES `publisher` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`series`) REFERENCES `series` (`title`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `is_tagged`
--
ALTER TABLE `is_tagged`
  ADD CONSTRAINT `is_tagged_ibfk_2` FOREIGN KEY (`tag`) REFERENCES `tag` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_tagged_ibfk_3` FOREIGN KEY (`isbn`) REFERENCES `book` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE;

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
