-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2016 at 06:50 PM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `staff`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_courses`
--

CREATE TABLE IF NOT EXISTS `all_courses` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `all_subs`
--

CREATE TABLE IF NOT EXISTS `all_subs` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `ch` int(1) NOT NULL,
  `dep_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `all_subs`
--

INSERT INTO `all_subs` (`id`, `name`, `des`, `ch`, `dep_id`) VALUES
(1, 'cs101', 'intro to computer science', 3, 0),
(2, 'cs102', 'intro to programming', 3, 0),
(3, 'math 101', 'intro to math', 2, 0),
(4, 'phy 101', 'intro to physics', 2, 0),
(5, 'cs100', 'intro to computing', 2, 0),
(6, 'cs140', 'programming findamentals 1', 4, 0),
(7, 'ma 100', 'calculus', 3, 0),
(8, 'phy 101', 'mechanics and wave motion', 4, 0),
(9, 'is 103', 'islamiyat and pak studies', 2, 0),
(10, 'cs326', 'operating system', 3, 0),
(11, 'cs310', 'digital analysis of algos', 3, 0),
(12, 'ma320', 'Differential equations', 3, 0),
(13, 'cs405', 'theory of automata', 3, 0),
(14, 'cs421', 'computer architecture', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE IF NOT EXISTS `degrees` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `dep_id` int(100) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `degrees`
--

INSERT INTO `degrees` (`id`, `name`, `dep_id`, `created`, `updated`) VALUES
(1, 'bscs', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'bsit', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'MCS', 9, '0000-00-00 00:00:00', '2016-12-15 20:46:53'),
(9, 'MA English', 8, '2016-12-15 20:16:18', '2016-12-15 20:47:59'),
(10, 'BSSE', 9, '2016-12-15 20:18:47', '2016-12-15 20:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `hod` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `hod`, `created`, `updated`) VALUES
(1, 'Dept. of Applied Psychology', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Dept. of Commerce', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Dept. of Economics', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Dept. of Education', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Dept. of Biology', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Dept. of Chemistry', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Dept. of Maths', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Dept. of English', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Dept. of Computer Science', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Dept. of IT', '', '0000-00-00 00:00:00', '2016-12-15 19:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'F'),
(7, 'G'),
(8, 'H'),
(9, 'I'),
(10, 'J'),
(11, 'K');

-- --------------------------------------------------------

--
-- Table structure for table `sec_subs`
--

CREATE TABLE IF NOT EXISTS `sec_subs` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `sem_id` int(100) NOT NULL,
  `sec_id` int(100) NOT NULL,
  `sub_id` int(100) NOT NULL,
  `staff_id` int(100) NOT NULL,
  `deg_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `sec_subs`
--

INSERT INTO `sec_subs` (`id`, `sem_id`, `sec_id`, `sub_id`, `staff_id`, `deg_id`) VALUES
(5, 1, 1, 5, 2, 1),
(6, 1, 2, 5, 2, 1),
(7, 1, 3, 5, 1, 1),
(9, 1, 1, 6, 3, 9),
(11, 1, 2, 6, 3, 9),
(22, 1, 3, 6, 3, 9),
(23, 1, 2, 7, 3, 9),
(24, 1, 1, 7, 3, 9),
(25, 1, 3, 7, 2, 9),
(26, 5, 1, 10, 1, 9),
(27, 5, 2, 10, 1, 9),
(28, 5, 3, 10, 1, 9),
(29, 5, 4, 10, 4, 9),
(30, 5, 5, 10, 4, 9),
(31, 5, 6, 10, 4, 9),
(37, 5, 1, 11, 6, 9),
(38, 5, 2, 11, 6, 9),
(39, 5, 3, 11, 6, 9),
(40, 5, 4, 11, 5, 9),
(41, 5, 5, 11, 0, 9),
(42, 5, 6, 11, 5, 9),
(47, 5, 5, 11, 5, 9),
(48, 5, 6, 11, 5, 9);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `start` year(4) NOT NULL,
  `end` year(4) NOT NULL,
  `deg_id` int(100) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `name`, `start`, `end`, `deg_id`, `created`, `updated`) VALUES
(1, 'fall 2014', 2014, 2018, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'spring 2014', 2014, 2018, 2, '2016-12-16 17:12:54', '2016-12-16 17:12:54'),
(4, 'spring 2012', 2012, 2016, 1, '2016-12-16 18:05:41', '2016-12-16 18:08:51');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pos` varchar(255) NOT NULL,
  `dep_id` int(100) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `pos`, `dep_id`, `created`, `updated`) VALUES
(1, 'sir waleed', '', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'sir adnan', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'sir umer', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'sir saqib', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'sir zakaullah', '', 13, '0000-00-00 00:00:00', '2016-12-16 18:31:06'),
(6, 'mam sadia', '', 3, '0000-00-00 00:00:00', '2016-12-16 18:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `std_id` int(100) NOT NULL AUTO_INCREMENT,
  `std_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `sess_id` int(100) NOT NULL,
  `sec_no` int(2) NOT NULL,
  `dep_id` int(100) NOT NULL,
  `deg_id` int(100) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `checked` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`std_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`std_id`, `std_name`, `email`, `pass`, `sess_id`, `sec_no`, `dep_id`, `deg_id`, `hash`, `checked`) VALUES
(3, 'shahaiz ali', 'fa14-bscs-47@lgu.edu.pk', '98868408', 1, 2, 9, 1, '233509073ed3432027d48b1a83f5fbd2', 1),
(15, 'shahaiz ali', 'fa14-bscs-48@lgu.edu.pk', '36001892', 5, 2, 9, 1, '577bcc914f9e55d5e4e4f82f9f00e7d4', 0),
(17, 'shahaiz ali', 'fa14-bscs-49@lgu.edu.pk', '78384399', 5, 2, 9, 1, '45fbc6d3e05ebd93369ce542e8f2322d', 0),
(18, 'shahzaib', 'fa16-bscs-01@lgu.edu.pk', '65936889', 2, 2, 9, 1, 'e07413354875be01a996dc560274708e', 0),
(21, 'shahraiz ali khan', 'fa14-bscs-417@lgu.edu.pk', '59075927', 1, 2, 1, 0, '621461af90cadfdaf0e8d4cc25129f91', 0),
(22, 'mubashir ahmed', 'fa14-bscs-50@lgu.edu.pk', '46199951', 1, 3, 9, 1, '46922a0880a8f11f8f69cbb52b1396be', 0),
(23, 'shahaiz ali', 'fa14-bscs-472@lgu.edu.pk', '56532592', 1, 2, 9, 1, '4311359ed4969e8401880e3c1836fbe1', 0),
(24, 'shahaiz ali', 'fa14-bscs-483@lgu.edu.pk', 'RnR$Tb8#OF', 1, 2, 9, 1, 'e44fea3bec53bcea3b7513ccef5857ac', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
