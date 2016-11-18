
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 17, 2016 at 06:38 PM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u134632735_myday`
--

-- --------------------------------------------------------

--
-- Table structure for table `brain`
--

CREATE TABLE IF NOT EXISTS `brain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pressure` int(11) DEFAULT NULL,
  `brain` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Dumping data for table `brain`
--

INSERT INTO `brain` (`id`, `pressure`, `brain`, `user_id`, `date`) VALUES
(1, 743, 1, 1, '2016-06-29'),
(2, 745, 0, 1, '2016-06-30'),
(3, 747, 1, 1, '2016-07-01'),
(4, 747, 0, 1, '2016-07-02'),
(5, 744, 0, 1, '2016-07-03'),
(6, 747, 0, 1, '2016-07-04'),
(7, 748, 0, 1, '2016-07-05'),
(8, 744, 0, 1, '2016-07-06'),
(9, 743, 0, 1, '2016-07-07'),
(10, 748, 0, 1, '2016-07-08'),
(11, 745, 0, 1, '2016-07-09'),
(12, 745, 0, 1, '2016-07-10'),
(13, 748, 0, 1, '2016-07-11'),
(14, 747, 0, 1, '2016-07-12'),
(15, 746, 0, 1, '2016-07-13'),
(16, 744, 0, 1, '2016-07-14'),
(17, 745, 0, 1, '2016-07-15'),
(18, 755, 0, 1, '2016-07-16'),
(19, 753, 0, 1, '2016-07-17'),
(20, 739, 0, 1, '2016-07-18'),
(21, 741, 0, 1, '2016-07-19'),
(22, 743, 0, 1, '2016-07-20'),
(23, 742, 0, 1, '2016-07-21'),
(24, 744, 0, 1, '2016-07-22'),
(25, 747, 0, 1, '2016-07-23'),
(26, 748, 0, 1, '2016-07-24'),
(27, 748, 0, 1, '2016-07-25'),
(28, 749, 0, 1, '2016-07-26'),
(29, 749, 0, 1, '2016-07-27'),
(30, 748, 0, 1, '2016-07-28'),
(31, 746, 0, 1, '2016-07-29'),
(32, 745, 0, 2, '2016-07-30'),
(33, 744, 0, 2, '2016-07-31'),
(34, 741, 1, 2, '2016-08-01'),
(35, 747, 0, 1, '2016-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `dayresult`
--

CREATE TABLE IF NOT EXISTS `dayresult` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `result` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `listResult` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=46 ;

--
-- Dumping data for table `dayresult`
--

INSERT INTO `dayresult` (`id`, `date`, `result`, `user_id`, `listResult`) VALUES
(25, '2016-07-15', 3, 1, 'a:1:{i:0;a:3:{i:0;s:8:"(PHP,JS)";i:1;s:11:"Без ВП";i:2;s:4:"ХБ";}}'),
(26, '2016-07-16', 1, 1, 'a:1:{i:0;a:1:{i:0;s:11:"Без ВП";}}'),
(15, '2016-07-06', 3, 1, 'a:1:{i:0;a:3:{i:0;s:8:"(PHP,JS)";i:1;s:4:"ВП";i:2;s:4:"ХБ";}}'),
(17, '2016-07-07', 2, 1, 'a:1:{i:0;a:2:{i:0;s:8:"(PHP,JS)";i:1;s:4:"ХБ";}}'),
(18, '2016-07-08', 4, 1, 'a:1:{i:0;a:4:{i:0;s:10:"Спорт";i:1;s:8:"(PHP,JS)";i:2;s:11:"Без ВП";i:3;s:4:"ХБ";}}'),
(19, '2016-07-09', 3, 1, 'a:1:{i:0;a:3:{i:0;s:10:"Спорт";i:1;s:23:"Без сладкого";i:2;s:4:"ХБ";}}'),
(20, '2016-07-10', 0, 1, 'a:1:{i:0;i:0;}'),
(21, '2016-07-11', 3, 1, 'a:1:{i:0;a:3:{i:0;s:8:"(PHP,JS)";i:1;s:11:"Без ВП";i:2;s:4:"ХБ";}}'),
(22, '2016-07-12', 3, 1, 'a:1:{i:0;a:3:{i:0;s:8:"(PHP,JS)";i:1;s:11:"Без ВП";i:2;s:4:"ХБ";}}'),
(23, '2016-07-13', 4, 1, 'a:1:{i:0;a:4:{i:0;s:10:"Спорт";i:1;s:8:"(PHP,JS)";i:2;s:11:"Без ВП";i:3;s:4:"ХБ";}}'),
(24, '2016-07-14', 3, 1, 'a:1:{i:0;a:3:{i:0;s:8:"(PHP,JS)";i:1;s:11:"Без ВП";i:2;s:4:"ХБ";}}'),
(27, '2016-07-17', 1, 1, 'a:1:{i:0;a:1:{i:0;s:11:"Без ВП";}}'),
(28, '2016-07-18', 3, 1, 'a:1:{i:0;a:3:{i:0;s:8:"(PHP,JS)";i:1;s:11:"Без ВП";i:2;s:4:"ХБ";}}'),
(29, '2016-07-19', 3, 1, 'a:1:{i:0;a:3:{i:0;s:8:"(PHP,JS)";i:1;s:11:"Без ВП";i:2;s:4:"ХБ";}}'),
(30, '2016-07-20', 4, 1, 'a:1:{i:0;a:4:{i:0;s:10:"Спорт";i:1;s:8:"(PHP,JS)";i:2;s:11:"Без ВП";i:3;s:4:"ХБ";}}'),
(32, '2016-07-21', 2, 1, 'a:1:{i:0;a:2:{i:0;s:8:"(PHP,JS)";i:1;s:4:"ХБ";}}'),
(33, '2016-07-22', 2, 1, 'a:1:{i:0;a:2:{i:0;s:8:"(PHP,JS)";i:1;s:4:"ХБ";}}'),
(35, '2016-07-24', 1, 1, 'a:1:{i:0;a:1:{i:0;s:4:"ХБ";}}'),
(36, '2016-07-25', 3, 1, 'a:1:{i:0;a:3:{i:0;s:8:"(PHP,JS)";i:1;s:11:"Без ВП";i:2;s:4:"ХБ";}}'),
(38, '2016-07-26', 2, 1, 'a:1:{i:0;a:2:{i:0;s:10:"Спорт";i:1;s:8:"(PHP,JS)";}}'),
(39, '2016-07-27', 3, 1, 'a:1:{i:0;a:3:{i:0;s:10:"Спорт";i:1;s:8:"(PHP,JS)";i:2;s:4:"ХБ";}}'),
(40, '2016-07-28', 2, 1, 'a:1:{i:0;a:2:{i:0;s:8:"(PHP,JS)";i:1;s:4:"ХБ";}}'),
(41, '2016-07-29', 3, 2, 'a:1:{i:0;a:3:{i:0;s:20:"Английский";i:1;s:10:"Спорт";i:2;s:24:"Без соц.сетей";}}'),
(42, '2016-07-30', 4, 2, 'a:1:{i:0;a:4:{i:0;s:20:"Английский";i:1;s:10:"Спорт";i:2;s:24:"Без соц.сетей";i:3;s:27:"8 стаканов воды";}}'),
(43, '2016-07-31', 2, 2, 'a:1:{i:0;a:2:{i:0;s:20:"Английский";i:1;s:27:"8 стаканов воды";}}'),
(44, '2016-08-02', 3, 1, 'a:1:{i:0;a:3:{i:0;s:8:"(PHP,JS)";i:1;s:11:"Без ВП";i:2;s:4:"ХБ";}}'),
(45, '2016-09-15', 3, 1, 'a:1:{i:0;a:3:{i:0;s:10:"Спорт";i:1;s:8:"(PHP,JS)";i:2;s:20:"Английский";}}');

-- --------------------------------------------------------

--
-- Table structure for table `exercise`
--

CREATE TABLE IF NOT EXISTS `exercise` (
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `exercise`
--

INSERT INTO `exercise` (`name`, `id`, `user_id`) VALUES
('Спорт', 1, 1),
('(PHP,JS)', 2, 1),
('Английский', 3, 1),
('Без сладкого', 4, 1),
('Без кофе', 5, 1),
('Без ВП', 6, 1),
('ХБ', 7, 1),
('Английский', 8, 2),
('Спорт', 9, 2),
('Без соц.сетей', 10, 2),
('8 стаканов воды', 11, 2),
('''dsfsd"sdfs', 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'nempak@gmail.com', 'fc316d6c3797c9a7be0153b70b778bade949dc50'),
(2, 'admin@admin.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'),
(3, 'test@test.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
