-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 15, 2018 at 04:40 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `daily`
--

INSERT INTO `daily` (`date`, `user_id`, `daily_id`, `category`, `amount`) VALUES
('2018-05-15 16:22:59', 3, 00000000001, 'Groceries', '200.00'),
('2018-05-15 16:22:59', 3, 00000000002, 'Transport', '120.00'),
('2018-05-15 16:30:33', 3, 00000000003, 'Shopping', '50.00'),
('2018-05-15 16:30:51', 3, 00000000004, 'Groceries', '0.00'),
('2018-05-15 16:36:06', 3, 00000000005, 'Groceries', '0.00'),
('2018-05-15 16:36:19', 3, 00000000006, 'Groceries', '0.00');

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'mhkbgd@gmail.com', 'e99a18c428cb38d5f260853678922e03'),
(2, 'test', 'test@gmail.com', 'e99a18c428cb38d5f260853678922e03'),
(3, 'areen', 'adreen.mohdaffendy@gmail.com', 'ebb797eaea754183967fd5de80fe63ec'),
(4, 'areen1', 'adreen_mohdaffendy@yahoo.com', 'ebb797eaea754183967fd5de80fe63ec');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
