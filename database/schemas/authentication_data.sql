-- Data dump for the authentication table

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
SET time_zone = "+05:30";
START TRANSACTION;
USE `authentication`;


--
-- Data dumping for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `dob`, `joined`, `phone`, `email`, `address`, `pin`, `password`, `picture`) VALUES
(1, 'Ritam', '1999-03-27', '2019-10-05 09:36:11', NULL, 'ritam@localhost.com', 'localhost', 713213, '$2y$11$uMhvsCWTC7biQjn0XqO6r.9hEMiR9W7EYNEWvKdYM3nBzy0Ii9UfO', 'https://scontent.frdp1-1.fna.fbcdn.net/v/t1.0-9/56312092_1515738861890273_560369090393276416_n.jpg?_nc_cat=109&_nc_oc=AQnQlYrOj0OplgH_Ah-Xv1lcGAfsFNeQbf2q_MRLhp4-HpW8F7SU6kqh14Mb1M4DaY2a02et27RK35Pg0bSINMYY&_nc_ht=scontent.frdp1-1.fna&oh=69696d39ba7f07cebb42f7fab6757776&oe=5E24FE1C'),
(2, 'sTux', '1999-03-27', '2019-10-06 01:02:47', NULL, 'stux@localhost.com', NULL, NULL, '$2y$11$GYfBnx2LlIuJFDWICX5ShedeyFRUP8BTBtbOElv4gm4SgEr7Va2d2', NULL);


--
-- Data dump for table `user_sessions`
--

INSERT INTO `user_sessions` (`session`, `user`, `started`) VALUES
('ab6aa68bd7718ae875d24ce67a7a52f7', 1, '2019-10-29 14:05:22');

COMMIT;
