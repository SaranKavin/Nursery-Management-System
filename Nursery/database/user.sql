-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 03, 2024 at 02:31 PM
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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL,
  `full_name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `login_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `email`, `password`) VALUES
(0, 'Saran', 'saranrockers007@gmail.com', '$2y$10$tlOfgPKLo./g.YDBFLmafu5IBXq2IpwUul5gPTG/NLjph51ZHMCLu'),
(0, 'Saran', 'john@gmail.com', '$2y$10$NuTY8EPTUBUckYScj70YDeflvZdMscW7DoIBE6tX3eN5LUS.euh3i'),
(0, 'kp', 'kp@gmail.com', '$2y$10$F9kPbxTgK1wpMS8704EsmOkNtkAYZl6fC74KQIc.X.D8oqPPIBsuW'),
(0, 'abi', 'ajay@gmail.com', '$2y$10$YNpWeU7ZFmAwPCXcsF4uROUtbmaoXVGsUaBwPlm4dAUCBVrCi/JAi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
