-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 30, 2018 at 10:34 PM
-- Server version: 10.2.15-MariaDB
-- PHP Version: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u225314046_air`
--

-- --------------------------------------------------------

--
-- Table structure for table `genogram`
--

CREATE TABLE `genogram` (
  `key_no` int(6) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `sex` varchar(1) NOT NULL,
  `mom` int(3) NOT NULL,
  `father` int(3) NOT NULL,
  `wife` int(3) NOT NULL,
  `husband` int(7) NOT NULL,
  `diabetes` tinyint(1) NOT NULL,
  `hyper` tinyint(1) NOT NULL,
  `fig` tinyint(1) NOT NULL,
  `byear` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genogram`
--

INSERT INTO `genogram` (`key_no`, `name`, `sex`, `mom`, `father`, `wife`, `husband`, `diabetes`, `hyper`, `fig`, `byear`) VALUES
(1, 'เผด็จ', 'M', 0, 0, 2, 0, 1, 0, 1, '1930'),
(2, 'อารียา', 'F', 0, 0, 0, 1, 0, 0, 0, '1937'),
(3, 'วิไลลักษณ์', 'F', 2, 1, 0, 0, 0, 0, 0, '1948'),
(4, 'ทรงศักดิ์', 'M', 2, 1, 0, 0, 0, 0, 0, '1949'),
(5, 'กรวิชญ์', 'M', 2, 1, 6, 0, 0, 0, 0, '1950'),
(6, 'พัชชราภรณ์', 'F', 0, 0, 0, 5, 0, 0, 0, '1957'),
(7, 'วรนัย', 'M', 6, 5, 0, 0, 0, 0, 0, '1940'),
(8, 'ทรรศพลรี่', 'F', 2, 1, 9, 0, 0, 0, 0, '1955'),
(9, 'อภิสิทธิ์ ', 'M', 0, 0, 8, 0, 0, 0, 0, '1958'),
(10, 'ณัฐพล', 'M', 9, 8, 0, 0, 0, 0, 0, '1970'),
(11, 'อธิคม', 'M', 9, 8, 0, 0, 0, 0, 0, '1973'),
(18, 'อ้อแอ้', 'F', 8, 9, 0, 0, 1, 0, 0, '1975');

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
  MODIFY `key_no` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
