-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2018 at 01:23 PM
-- Server version: 5.7.16-log
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u225314046_air`
--

-- --------------------------------------------------------

--
-- Table structure for table `genogram`
--

CREATE TABLE IF NOT EXISTS `genogram` (
  `key_no` int(6) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `sex` varchar(1) NOT NULL,
  `mom` int(3) DEFAULT NULL,
  `father` int(3) DEFAULT NULL,
  `wife` int(3) DEFAULT NULL,
  `husband` int(7) DEFAULT NULL,
  `diabetes` tinyint(1) NOT NULL,
  `hyper` tinyint(1) NOT NULL,
  `fig` tinyint(1) NOT NULL,
  `byear` varchar(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genogram`
--

INSERT INTO `genogram` (`key_no`, `name`, `sex`, `mom`, `father`, `wife`, `husband`, `diabetes`, `hyper`, `fig`, `byear`) VALUES
(1, 'เผด็จ', 'M', NULL, NULL, 2, NULL, 1, 0, 1, NULL),
(2, 'อารียา', 'F', NULL, NULL, NULL, NULL, 0, 0, 0, NULL),
(3, 'วิไลลักษณ์', 'F', 2, 1, NULL, NULL, 0, 0, 0, NULL),
(4, 'ทรงศักดิ์', 'M', 2, 1, 0, 0, 0, 0, 0, NULL),
(5, 'กรวิชญ์', 'M', 2, 1, 6, NULL, 0, 0, 0, NULL),
(6, 'พัชชราภรณ์', 'F', NULL, NULL, NULL, NULL, 0, 0, 0, NULL),
(7, 'วรนัย', 'M', 6, 5, 0, 0, 0, 0, 0, NULL),
(8, 'ทรรศพลรี่', 'F', 2, 1, 9, NULL, 0, 0, 0, NULL),
(9, 'อภิสิทธิ์ ', 'M', NULL, NULL, 0, NULL, 0, 0, 0, NULL),
(10, 'ณัฐพล', 'M', 9, 8, 0, 0, 0, 0, 0, NULL),
(11, 'อธิคม', 'M', 9, 8, 0, 0, 0, 0, 0, NULL),
(18, '33333', 'F', 8, 9, 0, 0, 1, 0, 0, '1922');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genogram`
--
ALTER TABLE `genogram`
  ADD PRIMARY KEY (`key_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genogram`
--
ALTER TABLE `genogram`
  MODIFY `key_no` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
