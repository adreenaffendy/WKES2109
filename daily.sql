-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 17, 2018 at 04:20 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily`
--

CREATE TABLE IF NOT EXISTS `daily` (
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `daily_id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`daily_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `daily`
--

INSERT INTO `daily` (`date`, `user_id`, `daily_id`, `category`, `amount`) VALUES
('2018-05-15 16:00:00', 3, 00000000003, 'Shopping', '50.00'),
('2018-05-15 16:00:00', 3, 00000000014, 'Entertainment', '80.00'),
('2018-05-15 16:00:00', 3, 00000000015, 'Groceries', '20.00'),
('2018-05-15 16:00:00', 3, 00000000016, 'Shopping', '15.00'),
('2018-05-15 16:00:00', 15, 00000000017, 'Groceries', '0.00'),
('2018-05-15 16:00:00', 15, 00000000018, 'Groceries', '0.00'),
('2018-05-15 16:00:00', 15, 00000000019, 'Groceries', '0.00'),
('2018-05-15 16:00:00', 15, 00000000020, 'Groceries', '0.00'),
('2018-05-15 16:00:00', 15, 00000000021, 'Groceries', '0.00'),
('2018-05-15 16:00:00', 15, 00000000022, 'Groceries', '0.00'),
('2018-05-15 16:00:00', 15, 00000000023, 'Groceries', '50.00'),
('2018-05-15 16:00:00', 15, 00000000024, 'Groceries', '0.00'),
('2018-05-15 16:00:00', 16, 00000000026, 'Groceries', '0.00'),
('2018-05-15 16:00:00', 3, 00000000027, 'Transportation', '10.00'),
('2018-05-17 12:52:29', 3, 00000000030, 'Food/Beverages', '78.00'),
('2018-05-17 13:05:38', 3, 00000000032, 'Groceries', '10.00'),
('2018-05-17 13:09:19', 3, 00000000033, 'Groceries', '10.00'),
('2018-05-17 13:09:23', 3, 00000000034, 'Groceries', '60.00'),
('2018-05-17 13:09:38', 3, 00000000035, 'Groceries', '60.00'),
('2018-05-17 13:09:42', 3, 00000000036, 'Food/Beverages', '34.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
