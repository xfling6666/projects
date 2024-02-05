-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- database： `bookinven`
--

-- --------------------------------------------------------

--
--  `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` float NOT NULL,
  `book_type` varchar(100) NOT NULL,
  `cover` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
--  `books`
--

INSERT INTO `books` (`id`, `book_title`, `author`, `quantity`, `price`, `book_type`, `cover`) VALUES
(4, 'Harry Potter', 'J.K.Rowling', 150, 23.99, 'fiction', 0x3731385831535749736a4c2e5f53593532325f2e6a7067),
(5, 'Three body Problem', 'Cinxin Liu', 225, 42.78, 'fiction', 0x6c6963656e7365642d696d6167652e6a7067),
(6, 'Cat Kid Comic Club', ' Dav Pilkey', 40, 12.74, 'comic', NULL),
(7, 'Interesting Facts For Curious Minds', 'Jordan Moore ', 20, 17.99, 'education', 0x3731385831535749736a4c2e5f53593532325f2e6a7067),
(10, 'My Effin\' Life ', 'Geddy Lee', 20, 37.5, 'arts', NULL),
(11, 'The Pale-Faced Lie: A True Story', 'David Crow', 20, 21.25, 'biographies', NULL),
(12, 'Choosing to Run: A Memoir', 'Des Linden', 20, 29.6, 'sports', NULL),
(13, 'Batman: Detective Comics', ' Peter J. Tomasi', 120, 116.9, 'comic', NULL),
(14, 'Reading Success for Minecrafters', 'Sky Pony Press', 70, 7.69, 'education', NULL),
(15, 'Goodnight iPad: a Parody for the next generation', 'Ann Droyd', 40, 16.5, 'kids', NULL),
(16, 'The Set Boundaries Workbook: Practical Exercises ', ' Nedra Glover Tawwab', 30, 21.38, 'health', NULL),
(22, 'sdfs2', 'sdfsf', 118, 12, 'comic', 0x436f6d667955495f30303132375f2e77656270),
(23, 'sdfsdf', 'sdfs', 231, 123, '123', 0x436f6d667955495f3030303930202831292e676966);

-- --------------------------------------------------------

--
--  `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `img_user` varchar(255) NOT NULL DEFAULT 'img_avatar.png',
  `user_name` varchar(255) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
--  `user`
--

INSERT INTO `user` (`ID`, `img_user`, `user_name`, `telephone`, `email`, `password`, `user_role`) VALUES
(1, 'img_avatar.png', 'xflingtest', '', 'xfling@gmail.com', 'xflingtest', 'stuff');

--
-- 
--

--
--  `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
--  `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);



--
--  `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
--  `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
