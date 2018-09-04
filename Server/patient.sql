-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2018 at 06:10 PM
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
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `HN` varchar(20) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `userID` int(5) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Last` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `img` varchar(300) DEFAULT NULL,
  `address` text NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `treatment` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `Latitude` varchar(50) NOT NULL,
  `Longitude` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`HN`, `userName`, `userID`, `Name`, `Last`, `age`, `img`, `address`, `occupation`, `status`, `treatment`, `place`, `Latitude`, `Longitude`) VALUES
('1002003', 'cat61', 1001, 'นางสายใจ', 'ไพรพร', 60, 'http://aorair.esy.es/img/profile/user1.png', '11/2 ม.5 ต.บ้านแมด อ.ศรีไค จ.อุบล 40110', 'ค้าขาย', 'คู่', 'บัตรประกันสุขภาพถ้วนหน้า', 'รพสต. เมืองศรีไค', '15.114473', '104.915562'),
('102233', 'dee88', 1001, 'นางสาวอาริญา', 'ศาลาสุข', 58, 'http://aorair.esy.es/img/profile/user2.png', '115/2 ม.8 ต.บ้านแมด อ.วาริน จ.อุบลราชธานี 34190', 'ทำนา', 'คู่', 'บัตรประกันสุขภาพถ้วนหน้า', 'รพสต. เมืองศรีไค', '15.119755', '104.913566'),
('1234567', 'nan55', 1001, 'ทองดา', 'มั่นคง', 50, 'http://aorair.esy.es/img/profile/user5.png', '38 ม.2 ต.ศรีไต อ.ศรีไค จ.อุบล 40110', 'ทำนา', 'หย่าร้าง', 'บัตรประกันสุขภาพถ้วนหน้า', 'รพสต. เมืองศรีไค', '15.117661', '104.915993'),
('5711403296', 'pop77', 1001, 'นายเผด็จ', 'คำวงษ์', 60, 'http://aorair.esy.es/img/profile/user3.png', '115/2 ม.8 ต.บ้านแมด อ.วาริน จ.อุบลราชธานี 34190', 'ทำนา', 'คู่', 'บัตรประกันสุขภาพถ้วนหน้า', 'รพสต. เมืองศรีไค', '15.115630', '104.910092'),
('5711403407', 'siri2506', 1002, 'ท้องม้วน', 'เลิศรส', 40, 'http://aorair.esy.es/img/profile/user4.png', '40 ม.2 ต.ภูเหล็ก อ.บ้านไผ่ จ.ขอนแก่น 40110', 'ทำนา', 'คู่', 'บัตรประกันสุขภาพถ้วนหน้า', 'รพสต. เมืองศรีไค', '15.116390', '104.918215'),
('5711407056', 'tum57', 1001, 'นายกรวิชญ์', 'อินทรวัลณ์กูล', 80, 'http://aorair.esy.es/img/profile/user6.png', '23 ม.8 ต.เมืองศรีไค อ.วาริน จ.อุบลราชธานี 34190', 'ค้าขาย', 'หย่าร้าง', 'บัตรประกันสุขภาพถ้วนหน้า', 'รพสต. เมืองศรีไค', '15.111650', '104.912939'),
('5711407070', 'xxx01', 1001, 'นางสาวจุฑารัตน์', 'กลีบม่วง', 50, 'http://aorair.esy.es/img/profile/user10.png', '77/2 ม.8 ต.เมืองศรีไค อ.วาริน จ.อุบลราชธานี 34190', 'ค้าขาย', 'โสดมาก', 'บัตรประกันสุขภาพถ้วนหน้า', 'รพสต. เมืองศรีไค', '15.112307', '104.910688');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`HN`),
  ADD KEY `userID` (`userID`),
  ADD KEY `userName` (`userName`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `authorities` (`userID`),
  ADD CONSTRAINT `patient_ibfk_2` FOREIGN KEY (`userName`) REFERENCES `member` (`userName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
