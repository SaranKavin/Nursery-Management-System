-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 11, 2024 at 05:28 AM
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
-- Table structure for table `adminuser`
--

DROP TABLE IF EXISTS `adminuser`;
CREATE TABLE IF NOT EXISTS `adminuser` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`id`, `user_name`, `password`, `name`) VALUES
(1, 'elias', '123', 'Elias'),
(2, 'john', 'abc', 'John'),
(3, 'Saran', '21USC020', 'Saran');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
CREATE TABLE IF NOT EXISTS `bills` (
  `bill_id` int NOT NULL AUTO_INCREMENT,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bill_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`bill_id`, `total_amount`, `created_at`) VALUES
(1, 100.00, '2024-04-07 12:31:15'),
(2, 100.00, '2024-04-07 12:33:49'),
(3, 210.00, '2024-04-07 12:34:52'),
(4, 100.00, '2024-04-07 12:55:11'),
(5, 58.00, '2024-04-08 04:50:35'),
(6, 2762.00, '2024-04-08 05:49:03'),
(7, 123.00, '2024-04-08 05:56:49'),
(8, 6679.00, '2024-04-08 05:57:29'),
(9, 132.00, '2024-04-08 05:58:27');

-- --------------------------------------------------------

--
-- Table structure for table `bill_items`
--

DROP TABLE IF EXISTS `bill_items`;
CREATE TABLE IF NOT EXISTS `bill_items` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `bill_id` int DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `bill_id` (`bill_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bill_items`
--

INSERT INTO `bill_items` (`item_id`, `bill_id`, `product_name`, `price`, `quantity`, `total_price`) VALUES
(1, 1, 'apple', 100.00, 1, 100.00),
(2, 2, 'apple', 100.00, 1, 100.00),
(3, 3, 'apple', 100.00, 1, 100.00),
(4, 3, 'tomato', 10.00, 3, 30.00),
(5, 3, 'banana', 20.00, 1, 20.00),
(6, 3, 'onion-big', 20.00, 3, 60.00),
(7, 4, 'apple', 100.00, 1, 100.00),
(8, 5, 'Saran', 58.00, 1, 58.00),
(9, 6, 'money plant', 123.00, 2, 246.00),
(10, 6, 'Sabja', 132.00, 15, 1980.00),
(11, 6, 'mango', 67.00, 8, 536.00),
(12, 7, 'money plant', 123.00, 1, 123.00),
(13, 8, 'money plant', 123.00, 1, 123.00),
(14, 8, 'Sabja', 132.00, 5, 660.00),
(15, 8, 'mango', 67.00, 88, 5896.00),
(16, 9, 'Sabja', 132.00, 1, 132.00);

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

DROP TABLE IF EXISTS `cart_items`;
CREATE TABLE IF NOT EXISTS `cart_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `added_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `name`, `price`, `quantity`, `total_price`, `added_date`) VALUES
(4, 'Saran', 122.00, 1, 122.00, '2024-03-24 18:30:00'),
(3, 'Saran', 122.00, 10, 1220.00, '2024-03-24 18:30:00'),
(5, 'Saran', 122.00, 1, 122.00, '2024-03-24 18:30:00'),
(6, 'Saran', 122.00, 1, 122.00, '2024-03-24 18:30:00'),
(7, 'money plant', 100.00, 1, 100.00, '2024-03-31 18:30:00'),
(8, 'money plant', 100.00, 1, 100.00, '2024-03-31 18:30:00'),
(9, 'ooty', 123.00, 1, 123.00, '2024-03-31 18:30:00'),
(10, 'Saran', 122.00, 11, 1342.00, '2024-03-31 18:30:00');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `address`, `email`, `phone`, `enquiry`, `datetime`, `created_at`) VALUES
(9, 'AJAY', 'SRMV CAS Coimbatore', 'ajay@gmail.com', '01234567899', 'I need fertilizer for 2 months', '2024-04-09 06:15:13', '2024-04-09 06:15:13'),
(8, 'Saran', 'SRMV CAS Coimbatore', 'saranrockers007@gmail.com', '9087654321', 'what fertilizer I can use for plants ', '2024-04-09 06:14:33', '2024-04-09 06:14:33'),
(7, 'Ram', 'SRMV CAS Coimbatore', 'ram@gmail.com', '+916379312191', 'need fertilizer for plants', '2024-04-09 06:13:00', '2024-04-09 06:13:00');

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
  `datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `phone`, `feedback`, `datetime`) VALUES
(35, 'ram', 'ram@gmail.com', '9876543210', 'good', '2024-04-09 06:11:34'),
(36, 'Saran', 'saran@gmail.com', '9870965442', 'good quality products', '2024-04-09 06:12:03'),
(37, 'AJAY', 'ajay@gmail.com', '01234567899', 'customer support was wounderful ', '2024-04-09 06:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

DROP TABLE IF EXISTS `plants`;
CREATE TABLE IF NOT EXISTS `plants` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price_per_kg` decimal(10,2) NOT NULL,
  `total_quantity` decimal(10,2) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `total_quantity_sold` decimal(10,2) DEFAULT '0.00',
  `total_revenue` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `plants`
--

INSERT INTO `plants` (`id`, `name`, `price_per_kg`, `total_quantity`, `image_path`, `total_quantity_sold`, `total_revenue`) VALUES
(21, 'money plant', 123.00, 19.00, 'uploads/plant4.jpg', 3.00, 369.00);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity_sold` int DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `sale_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seed`
--

DROP TABLE IF EXISTS `seed`;
CREATE TABLE IF NOT EXISTS `seed` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price_per_kg` decimal(10,2) NOT NULL,
  `total_quantity` decimal(10,2) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `total_quantity_sold` decimal(10,2) DEFAULT '0.00',
  `total_revenue` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `seed`
--

INSERT INTO `seed` (`id`, `name`, `price_per_kg`, `total_quantity`, `image_path`, `total_quantity_sold`, `total_revenue`) VALUES
(9, 'money plant', 100.00, 0.00, 'uploads/pla4.jpg', 4.00, 400.00),
(16, 'ooty', 123.00, 3.00, 'uploads/pla2.jpg', 0.00, 0.00),
(15, 'Saran', 122.00, 18.00, 'uploads/pla4.jpg', 2.00, 244.00),
(13, 'money plant', 111.00, 1.00, 'uploads/banner_image.png', 2.00, 222.00),
(17, 'Saran', 111.00, 11.00, 'uploads/pla2.jpg', 0.00, 0.00),
(18, 'Saran', 123.00, 3.00, 'uploads/seed2.jpg', 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `seeds`
--

DROP TABLE IF EXISTS `seeds`;
CREATE TABLE IF NOT EXISTS `seeds` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price_per_kg` decimal(10,2) NOT NULL,
  `total_quantity` decimal(10,2) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `total_quantity_sold` decimal(10,2) DEFAULT '0.00',
  `total_revenue` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `seeds`
--

INSERT INTO `seeds` (`id`, `name`, `price_per_kg`, `total_quantity`, `image_path`, `total_quantity_sold`, `total_revenue`) VALUES
(8, 'apple', 100.00, 0.00, 'uploads/apple.jpg', 6.00, 500.00);

-- --------------------------------------------------------

--
-- Table structure for table `trees`
--

DROP TABLE IF EXISTS `trees`;
CREATE TABLE IF NOT EXISTS `trees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price_per_kg` decimal(10,2) NOT NULL,
  `total_quantity` decimal(10,2) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `total_quantity_sold` decimal(10,2) DEFAULT '0.00',
  `total_revenue` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trees`
--

INSERT INTO `trees` (`id`, `name`, `price_per_kg`, `total_quantity`, `image_path`, `total_quantity_sold`, `total_revenue`) VALUES
(10, 'mango', 67.00, 88.00, 'uploads/tree1.jpg', 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `login_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `email`, `password`, `login_time`) VALUES
(1, 'Saran', 'saranrockers007@gmail.com', '$2y$10$tlOfgPKLo./g.YDBFLmafu5IBXq2IpwUul5gPTG/NLjph51ZHMCLu', '2024-03-03 14:34:37'),
(2, 'Saran', 'john@gmail.com', '$2y$10$NuTY8EPTUBUckYScj70YDeflvZdMscW7DoIBE6tX3eN5LUS.euh3i', '2024-03-03 14:34:37'),
(3, 'kp', 'kp@gmail.com', '$2y$10$F9kPbxTgK1wpMS8704EsmOkNtkAYZl6fC74KQIc.X.D8oqPPIBsuW', '2024-03-03 14:34:37'),
(4, 'abi', 'ajay@gmail.com', '$2y$10$YNpWeU7ZFmAwPCXcsF4uROUtbmaoXVGsUaBwPlm4dAUCBVrCi/JAi', '2024-03-03 14:34:37'),
(5, 'ddd', 'ddd@gmail.com', '$2y$10$xYk3SJr8U62BoYrkRGwhl./hF1ybtZZSn890HtbvF/Z.m6synGMqu', '2024-03-12 14:18:53'),
(6, 'Saran', 'saranrockers@gmail.com', '$2y$10$lWkFBTJSWyue0jIrLEOjCumqVFwPLSDrLeoSzmyr8BaxdEWj1zI7u', '2024-03-18 14:01:51'),
(7, 'saran', 'saran@gmail.com', '$2y$10$4mcbDihmZY8nruIWxwi7eOWyo4wX811E7RTYDoR2UMQiKu9pYEd/q', '2024-04-01 05:26:55'),
(8, 'AJAY', 'ajay123@gmail.com', '$2y$10$xLOjZNkC3vHA/bnRObUqu.Z71sJOw7AcTu.gI/UcDfMC45.ST3SMq', '2024-04-01 07:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `login_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `login_time`) VALUES
(20, 'elias', '1232', '2024-02-18 14:54:16'),
(21, 'elias', '12334', '2024-02-18 18:06:48'),
(22, 'elias', '12334', '2024-02-18 18:08:12'),
(23, 'abi', 'ladies', '2024-02-18 18:17:10'),
(24, 'sara', 'qwwer', '2024-02-18 20:16:32'),
(25, '', '', '2024-02-19 04:32:34'),
(26, 'elias', 'nhn', '2024-02-20 04:11:17'),
(27, 'Saran', 'kehuj', '2024-02-21 18:01:32'),
(28, 'elias', 'ajdsj', '2024-02-21 18:14:31'),
(29, 'w', '543', '2024-02-22 03:31:18'),
(30, 'Saran', 'sdf', '2024-02-22 03:35:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
