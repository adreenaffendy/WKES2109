-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 16, 2018 at 04:42 PM
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
CREATE DATABASE IF NOT EXISTS `web` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `web`;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `daily`
--

INSERT INTO `daily` (`date`, `user_id`, `daily_id`, `category`, `amount`) VALUES
('2018-05-15 16:30:33', 3, 00000000003, 'Shopping', '50.00'),
('2018-05-15 16:36:06', 3, 00000000005, 'Groceries', '0.00'),
('2018-05-15 16:36:19', 3, 00000000006, 'Groceries', '0.00'),
('2018-05-16 13:12:05', 3, 00000000014, 'Entertainment', '80.00'),
('2018-05-16 13:12:30', 3, 00000000015, 'Groceries', '20.00'),
('2018-05-16 13:13:00', 3, 00000000016, 'Shopping', '15.00'),
('2018-05-16 13:33:21', 15, 00000000017, 'Groceries', '0.00'),
('2018-05-16 13:34:33', 15, 00000000018, 'Groceries', '0.00'),
('2018-05-16 13:34:34', 15, 00000000019, 'Groceries', '0.00'),
('2018-05-16 13:34:34', 15, 00000000020, 'Groceries', '0.00'),
('2018-05-16 13:36:23', 15, 00000000021, 'Groceries', '0.00'),
('2018-05-16 13:36:32', 15, 00000000022, 'Groceries', '0.00'),
('2018-05-16 13:36:32', 15, 00000000023, 'Groceries', '50.00'),
('2018-05-16 13:36:33', 15, 00000000024, 'Groceries', '0.00'),
('2018-05-16 14:15:16', 16, 00000000026, 'Groceries', '0.00'),
('2018-05-16 14:56:26', 3, 00000000027, 'Transportation', '10.00');

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE IF NOT EXISTS `goals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `monthly_budget` varchar(100) NOT NULL,
  `total_budget` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`id`, `user_id`, `name`, `monthly_budget`, `total_budget`, `description`, `date_created`) VALUES
(1, 1, 'test', 'test', 'test', 'description', '2018-05-14 22:14:24'),
(2, 1, 'Second goal', '100', '1000', 'description', '2018-05-14 22:14:24'),
(3, 1, 'third', '10', '100', 'description', '2018-05-14 22:14:54'),
(4, 3, 'korea', '150', '3000', 'description', '2018-05-15 13:47:41'),
(5, 3, 'korea', '150', '3000', 'description', '2018-05-15 13:48:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `income` decimal(10,2) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `income`) VALUES
(1, 'admin', 'mhkbgd@gmail.com', 'e99a18c428cb38d5f260853678922e03', '1550.00'),
(2, 'test', 'test@gmail.com', 'e99a18c428cb38d5f260853678922e03', '1220.00'),
(3, 'areen', 'adreen.mohdaffendy@gmail.com', 'ebb797eaea754183967fd5de80fe63ec', '3440.00'),
(14, 'ayeen', 'aliarogi@gmail.com', 'ebb797eaea754183967fd5de80fe63ec', '55550.00'),
(15, 'jimin', 'jimin@bts', 'ebb797eaea754183967fd5de80fe63ec', '111110.00'),
(16, 'jimin1', 'jimin@bts111', 'ebb797eaea754183967fd5de80fe63ec', '1233340.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
