-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 03, 2024 at 02:30 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saran`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `feedback` text NOT NULL,
  `suggestions` text NOT NULL,
  `datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `phone`, `feedback`, `suggestions`, `datetime`) VALUES
(28, 'Saran', 'saranrockers007@gmail.com', '06379312191', 'qwertyui ghvftvhj bm hg', '', '2024-02-23 14:01:29'),
(29, 'Saran', 'saranrockers007@gmail.com', '06379312191', 'very very bad', '', '2024-02-23 14:01:29'),
(30, 'Saran', 'saranrockers007@gmail.com', '06379312191', 'hgfddfghjhgfds', '', '2024-02-23 14:01:29'),
(31, 'Saran', 'saranrockers007@gmail.com', '06379312191', 'l,d;lf,ldvm c ;k  vkm v ', '', '2024-02-23 14:01:49'),
(32, 'Saran', 'saranrockers007@gmail.com', '06379312191', '.vbk v.m gk v  k k; ; ;kcb .kcb k', '', '2024-02-23 14:02:28'),
(33, 'Saran', 'saranrockers007@gmail.com', '06379312191', 'JUJUTJFHJGJHG', '', '2024-02-27 06:11:02');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
