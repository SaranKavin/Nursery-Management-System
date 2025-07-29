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
-- Table structure for table `enquiries`
--

DROP TABLE IF EXISTS `enquiries`;
CREATE TABLE IF NOT EXISTS `enquiries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `enquiry` text NOT NULL,
  `datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `address`, `email`, `phone`, `enquiry`, `datetime`, `created_at`) VALUES
(1, 'Saran', 'SRMV CAS Coimbatore', 'saranrockers007@gmail.com', '06379312191', 'heeelomkm ', '2024-02-23 14:08:31', '2024-02-23 05:53:45'),
(2, 'Saran', 'SRMV CAS Coimbatore', 'saranrockers007@gmail.com', '06379312191', 'good', '2024-02-23 14:08:31', '2024-02-23 13:52:00'),
(3, 'Saran', 'SRMV CAS Coimbatore', 'saranrockers007@gmail.com', '06379312191', 'b b zm b jh bmjh', '2024-02-23 14:20:10', '2024-02-23 14:20:10'),
(4, 'Saran', 'SRMV CAS Coimbatore', 'saranrockers007@gmail.com', '06379312191', 'mbmsc cmbs cjhs c schs ', '2024-02-23 14:20:43', '2024-02-23 14:20:43'),
(5, 'Saran', 'SRMV CAS Coimbatore', 'saranrockers007@gmail.com', '06379312191', 'ldlsknljd', '2024-02-24 11:26:35', '2024-02-24 11:26:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
