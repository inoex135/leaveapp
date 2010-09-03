-- phpMyAdmin SQL Dump
-- version 3.2.2.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 03, 2010 at 04:28 PM
-- Server version: 5.1.37
-- PHP Version: 5.2.10-2ubuntu6.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `leaveapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE IF NOT EXISTS `leaves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type_of_leave_id` int(11) NOT NULL,
  `purpose` text NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` enum('0','1','2','3') NOT NULL,
  `submit_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `recommend_time` timestamp NULL DEFAULT NULL,
  `approve_time` timestamp NULL DEFAULT NULL,
  `keep_time` timestamp NULL DEFAULT NULL,
  `recommendation` text NOT NULL,
  `manager_note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `leaves`
--


-- --------------------------------------------------------

--
-- Table structure for table `type_of_leave`
--

CREATE TABLE IF NOT EXISTS `type_of_leave` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `type_of_leave`
--

INSERT INTO `type_of_leave` (`id`, `name`) VALUES
(1, 'Annual Leave'),
(2, 'Study Leave'),
(3, 'Hajj Leave');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','staff','supervisor','manager','hr') NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `parent_id`) VALUES
(1, 'admin', 'admin', '', 'admin', 0),
(7, 'manager', 'manager', '', 'manager', 0),
(5, 'ada', 'asd', '', 'hr', 0),
(9, 'staff', 'staff', '', 'staff', 10),
(10, 'supervisor', 'supervisor', '', 'supervisor', 7),
(11, 'staff2', 'staff2', 'staff2', 'staff', 12),
(12, 'supervisor2', 'supervisor2', 'supervisor2', 'supervisor', 7),
(13, 'manager2', 'manager2', 'manager2', 'manager', 0),
(14, 'yudi', 'yudi', 'yudi.haribowo@gmail.com', 'staff', 10);
