-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 20, 2018 at 10:48 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud-application`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_date` datetime DEFAULT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email_address`, `status`, `created_date`, `updated_date`) VALUES
(1, 'Mayank', 'Patel', 'mayank.patel@live.in', 'Active', '2018-12-20 15:45:10', '2018-12-20 10:15:10'),
(2, 'Mayank', 'User2', 'mayank@yopmail.com', 'Inactive', '2018-12-20 15:45:10', '2018-12-20 10:15:10'),
(3, 'Mayank', 'User3', 'mayank.patel@yopmail.com', 'Active', '2018-12-20 15:45:48', '2018-12-20 10:15:48'),
(4, 'Mayank', 'User4', 'mayank4@yopmail.com', 'Active', '2018-12-20 15:45:48', '2018-12-20 10:15:48'),
(5, 'Mayank', 'User5', 'mayank5@yopmail.com', 'Inactive', '2018-12-20 15:46:24', '2018-12-20 10:16:24'),
(6, 'Mayank', 'User6', 'mayank6@yopmail.com', 'Active', '2018-12-20 15:46:24', '2018-12-20 10:16:24'),
(7, 'Mayank', 'User7', 'mayank7@yopmail.com', 'Active', '2018-12-20 15:46:42', '2018-12-20 10:16:42'),
(8, 'Mayank', 'Patel', 'mayank8@yopmail.com', 'Inactive', '2018-12-20 15:47:49', '2018-12-20 10:17:49'),
(10, 'MayankPatel', 'Developer', 'developer@yopmail.com', 'Active', NULL, '2018-12-20 10:47:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
