-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2017 at 11:20 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini-library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `ISBN` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `released_on` datetime DEFAULT NULL,
  `comment` mediumtext,
  `language` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL,
  `delete_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `ISBN`, `title`, `author`, `released_on`, `comment`, `language`, `image_url`, `genre_id`, `delete_on`) VALUES
(1, 'id1', 'title1', 'author1', '2000-04-01 00:00:00', 'comment1', 'language1', '/PHP-fundamentals-exam-preparation\\images\\58cd61da97b3c_wapiBulgariaLogo.jpg', 3, '2017-03-18 18:06:20'),
(2, 'wef', 'wefwef', 'wefwe', '2019-02-02 00:00:00', 'wefwef', 'wefwef', '/PHP-fundamentals-exam-preparation\\images\\58cd1e096532e_d4e7aa60eb6a782d5d25340debaa1ad6.jpg', 3, NULL),
(3, 'threh', 'ergreg', 'regreg', '2018-03-02 00:00:00', 'gregreg', 'ergreg', '/PHP-fundamentals-exam-preparation\\images\\58cd21cdce9cd_d4e7aa60eb6a782d5d25340debaa1ad6.jpg', 2, '2017-03-18 18:30:17'),
(4, 'fwewef', 'wefwe', 'wefwef', '2019-02-02 00:00:00', '<h1>hi</h1>', 'wfwef', NULL, 2, NULL),
(5, 'test', 'tesxt', 'test', '2019-03-02 00:00:00', 'qdrqwdqwd', 'test', '/PHP-fundamentals-exam-preparation\\images\\58cd22e192437_d4e7aa60eb6a782d5d25340debaa1ad6.jpg', 3, '2017-03-18 18:05:39'),
(6, 'test1', 'tesxt1', 'test1', '2019-03-02 00:00:00', 'qdrqwdqwd1', 'test1', NULL, 3, NULL),
(7, 'mess1', 'messs1', 'mess1', '2044-10-01 00:00:00', 'wefwefwe1111', 'mess1', '/PHP-fundamentals-exam-preparation\\images\\58cd616076674_wapiBulgariaLogo.jpg', 5, '2017-03-18 18:02:11'),
(8, '<h1>hi</h1>', '<h1>hi</h1>', '<h1>hi</h1>', '2017-01-01 00:00:00', '<h1>hi</h1>', '<h1>hi</h1>', NULL, 2, '2017-03-18 18:15:14'),
(9, 'isbn', 'title', 'Author', '2017-01-01 00:00:00', 'cwasc', 'language', '/PHP-fundamentals-exam-preparation\\images\\58cd50e4ea2df_d4e7aa60eb6a782d5d25340debaa1ad6.jpg', 4, '2017-03-18 18:07:29'),
(10, 'session1', 'session1', 'sesssion1', '2018-02-02 00:00:00', 'session1', 'session1', '/PHP-fundamentals-exam-preparation\\images\\58cd6e2ea364d_d4e7aa60eb6a782d5d25340debaa1ad6.jpg', 3, '2017-03-18 18:28:24'),
(11, 'wefwef', 'wefewfwe', 'wefwef', '2018-03-02 00:00:00', 'wefwf', 'wefwef', '/PHP-fundamentals-exam-preparation\\images\\58cd6eba9b759_d4e7aa60eb6a782d5d25340debaa1ad6.jpg', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Horror'),
(2, 'Porno'),
(3, 'Erotic'),
(4, 'Hentai'),
(5, 'Soft porno');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_genres_id_fk` (`genre_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_genres_id_fk` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
