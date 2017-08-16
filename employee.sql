-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2017 at 07:36 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_sid`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL COMMENT 'primary key',
  `employee_name` varchar(255) NOT NULL COMMENT 'employee name',
  `employee_salary` double NOT NULL COMMENT 'employee salary',
  `employee_age` int(11) NOT NULL COMMENT 'employee age'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='datatable demo table';

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employee_name`, `employee_salary`, `employee_age`) VALUES
(36, 'Unity', 85675, 47),
(37, 'Howard', 164500, 51),
(38, 'Hope', 109850, 41),
(39, 'Vivian', 452500, 62),
(40, 'Timothy', 136200, 37),
(41, 'Jackson', 645750, 65),
(42, 'Olivia', 234500, 64),
(43, 'Bruno', 163500, 38),
(44, 'Sakura', 139575, 37),
(45, 'Thor', 98540, 61),
(46, 'Finn', 87500, 47),
(47, 'Serge', 138575, 64),
(48, 'Zenaida', 125250, 63),
(49, 'Zorita', 115000, 56),
(50, 'Jennifer', 75650, 43),
(51, 'Cara', 145600, 46),
(52, 'Hermione', 356250, 47),
(53, 'Lael', 103500, 21),
(54, 'Jonas', 86500, 30),
(56, 'Michael', 183000, 29),
(57, 'Donna', 112000, 27),
(58, 'sid', 0, 23),
(59, 'malli', 8768, 67);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=60;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
