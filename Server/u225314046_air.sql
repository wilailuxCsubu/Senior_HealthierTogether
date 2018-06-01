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
-- Table structure for table `allergy`
--

CREATE TABLE `allergy` (
  `ID` int(6) NOT NULL,
  `HN` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `symptom` text NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `key_ID` int(6) NOT NULL,
  `HN` varchar(20) NOT NULL,
  `userID` int(5) NOT NULL,
  `result` varchar(20) NOT NULL,
  `note` text DEFAULT NULL,
  `date_n` date NOT NULL,
  `score` int(2) NOT NULL,
  `no_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`key_ID`, `HN`, `userID`, `result`, `note`, `date_n`, `score`, `no_id`) VALUES
(1, '102233', 1001, 'ภาระพึ่งพาปานกลาง', 'ควรหมั่นออกกำลังกายสม่ำเสมอ และงดกินเค็ม', '2018-02-09', 9, 1),
(2, '1002003', 1001, 'ไม่เป็นภาระพึ่งพา', 'งดของทอด', '2018-02-09', 15, 1),
(3, '1234567', 1001, 'ภาระพึ่งพารุนแรง', 'งดน้ำตาล และฝึกบริหารเข่า', '2018-02-01', 6, 1),
(4, '5711403296', 1001, 'ภาระพึ่งพาโดยสมบูรณ์', 'ฝึกกายบริหารสำหรับผู้ป่วยติดเตียง และงดรับประทานของทอด ของมัน', '2018-02-03', 2, 1),
(5, '5711403407', 1002, 'ภาระพึ่งพาปานกลาง', 'ควรรับประทานผักเยอะๆ งดของหวาน', '2018-02-05', 11, 1),
(6, '5711407056', 1001, 'ภาระพึ่งพารุนแรง', 'งดของทอด และควรออกกำลังกายสม่ำเสมอ', '2018-02-01', 7, 1),
(8, '5711407056', 1001, 'ภาระพึ่งพาโดยสมบูรณ์', 'ให้กินข้าวทางสายยาง ', '2018-02-08', 4, 2),
(20, '5711407056', 1001, 'ภาระพึ่งพาโดยสมบูรณ์', 'ดื่มน้ำเยอะๆ', '2018-03-17', 3, 3),
(21, '5711407056', 1001, 'ไม่เป็นภาระพึ่งพา', '', '2018-03-18', 13, 4),
(22, '102233', 1001, 'ไม่เป็นภาระพึ่งพา', 'พยายามออกกำลังกายบ้าง', '2018-03-19', 15, 2),
(25, '5711407070', 1001, 'ไม่เป็นภาระพึ่งพา', '', '2018-03-24', 14, 1),
(26, '5711403296', 1001, 'ภาระพึ่งพาปานกลาง', '', '2018-03-24', 10, 2),
(27, '1234567', 1001, 'ภาระพึ่งพาโดยสมบูรณ์', '', '2018-03-24', 4, 2),
(35, '5711407070', 1001, 'ภาระพึ่งพาปานกลาง', 'สาธุขอให้เข้า!!', '2018-04-30', 9, 2),
(36, '5711407070', 1001, 'ภาระพึ่งพาปานกลาง', 'เข้าสักทีโว๊ะ', '2018-04-30', 11, 3),
(37, '5711407070', 1001, 'ภาระพึ่งพารุนแรง', '', '2018-05-04', 8, 3),
(38, '5711403296', 1001, 'ภาระพึ่งพารุนแรง', '', '2018-05-04', 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `authorities`
--

CREATE TABLE `authorities` (
  `userID` int(5) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Last` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `Position` varchar(30) NOT NULL,
  `Under` varchar(30) DEFAULT NULL,
  `Img` varchar(50) DEFAULT NULL,
  `callNum` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authorities`
--

INSERT INTO `authorities` (`userID`, `userName`, `Name`, `Last`, `age`, `Position`, `Under`, `Img`, `callNum`) VALUES
(1001, 'aorair', 'นางเรียนดี', 'เรียนเด่น', 40, 'อสม.', 'กระทรวงสาธารณสุข', 'http://aorair.esy.es/img/profile/user1.png', '836634673'),
(1002, 'Aw007', 'นางสาววิไลลักษณ์', 'แหวนเงิน', 53, 'เจ้าหน้าที่สารสนเทศ', 'กระทรวงสาธารณสุข', 'http://aorair.esy.es/img/profile/user2.png', '834190621'),
(1003, 'banyen123', 'นางสาวจีรนันท์', 'ล้ำจุมจัง', 50, 'อสม.', 'กระทรวงสาธารณสุข', 'http://aorair.esy.es/img/profile/user5.png', '954387002'),
(1004, 'lula22', 'นายทรงศักดิ์', 'วันทา', 60, 'แพทย์', 'กระทรวงสาธารณสุข', 'http://aorair.esy.es/img/profile/user6.png', '954387663'),
(1005, 'momo99', 'นางสาวลักษมี', 'ประทุมวัน', 70, 'พยาบาล', 'กระทรวงสาธารณสุข', 'http://aorair.esy.es/img/profile/user1.png', '804194193'),
(1006, 'Ritar57', ' นางสาวเกวลี', 'เดโชชัยพร', 45, 'พยาบาล', 'กระทรวงสาธารณสุข', 'http://aorair.esy.es/img/profile/user10.png', '834196325'),
(1010, 'somsir', 'นางสาวพัชชราภรณ์', 'ทองรอง', 47, 'พยาบาล', 'กระทรวงสาธารณสุข', 'http://aorair.esy.es/img/profile/user1.png', '834196325');

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
(2, ' อารียา ', 'F', 0, 0, 0, 0, 1, 0, 0, '1937'),
(3, 'วิไลลักษณ์', 'F', 2, 1, 0, 0, 0, 0, 0, '1948'),
(4, 'ทรงศักดิ์', 'M', 2, 1, 0, 0, 0, 0, 0, '1949'),
(5, 'กรวิชญ์', 'M', 2, 1, 6, 0, 0, 0, 0, '1950'),
(6, 'พัชชราภรณ์', 'F', 0, 0, 0, 5, 0, 0, 0, '1957'),
(7, 'วรนัย', 'M', 6, 5, 0, 0, 0, 0, 0, '1980'),
(8, 'ทรรศพลรี่', 'F', 2, 1, 0, 9, 0, 0, 0, '1955'),
(9, 'อภิสิทธิ์ ', 'M', 0, 0, 8, 0, 0, 0, 0, '1958'),
(10, 'ณัฐพล', 'M', 9, 8, 0, 0, 0, 0, 0, '1970'),
(11, '  อธิคม  ', 'M', 8, 9, 0, 0, 1, 1, 0, '1973'),
(18, '  อ้อแอ้         ', 'F', 0, 0, 0, 7, 1, 1, 0, '1975');

-- --------------------------------------------------------

--
-- Table structure for table `geno_family`
--

CREATE TABLE `geno_family` (
  `key_no` int(7) NOT NULL,
  `name` varchar(30) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `age` int(3) NOT NULL,
  `mom` int(7) DEFAULT NULL,
  `father` int(7) DEFAULT NULL,
  `wife` int(7) DEFAULT NULL,
  `husband` int(7) DEFAULT NULL,
  `ID_family` int(5) DEFAULT NULL,
  `diabetes` tinyint(1) NOT NULL,
  `hyper` tinyint(1) NOT NULL,
  `fig` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `geno_family`
--

INSERT INTO `geno_family` (`key_no`, `name`, `sex`, `age`, `mom`, `father`, `wife`, `husband`, `ID_family`, `diabetes`, `hyper`, `fig`) VALUES
(1, 'เผด็จ', 'M', 70, 0, 0, 2, 0, 1, 1, 0, 0),
(2, 'อารียา', 'F', 65, 0, 0, 0, 1, 1, 1, 0, 1),
(4, 'กรวิชญ์', 'M', 40, 2, 1, 0, 0, 1, 1, 1, 0),
(31, 'พึ่งตน', 'F', 7, 2, 1, 0, 0, 1, 0, 0, 0),
(32, 'ทรรศพลรี่', 'F', 11, 0, 0, 0, 4, 1, 1, 0, 0),
(34, 'อ้อแอ้', 'F', 6, 2, 1, 0, 0, 1, 1, 0, 0),
(38, 'ดด', 'F', 0, 2, 1, 0, 0, NULL, 0, 0, 0),
(39, 'ดด', 'F', 0, 6, 5, 0, 0, NULL, 0, 0, 0),
(40, 'การดา', 'M', 0, 0, 0, 3, 0, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `How_to`
--

CREATE TABLE `How_to` (
  `result` varchar(20) CHARACTER SET utf8 NOT NULL,
  `sequence` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `subject` text CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `How_to`
--

INSERT INTO `How_to` (`result`, `sequence`, `subject`) VALUES
('ภาระพึ่งพาปานกลาง', '2', 'ให้ควบคุมอาหารรสจัด เค็ม เผ็ด และออกกำลังกายเสม่ำเสมอ พบแพทย์ตามนัด ทานยาให้ต่อเนื่อง'),
('ภาระพึ่งพารุนแรง', '3', 'ดูแลเรื่องกินยาให้ต่อเนื่อง ควบคุมอาหารประเภทรสจัด รสเผ็ด หวาน และอาหารมันจัด หมั่นทำกายภาพ และขยับตัวออกกำลังกายบ้าง'),
('ภาระพึ่งพาโดยสมบูรณ์', '4', 'ดูแลเรื่องการกินอาหารรสจัด กินยาเสม่ำเสมอตามที่หมอสั่ง และคอยสังเกตเรื่องแผลกดทับบริเวณร่างกาย และทำกายภาพบำบัดเสม่ำเสมอ'),
('ไม่เป็นภาระเพิ่งพา', '1', 'ไม่ให้รับประทานอาหารรสเค็ม รสเผ็ด อาหารที่มันจัด และควบคุมอาหาร ออกกำลังกายบ้าง');

-- --------------------------------------------------------

--
-- Table structure for table `inhomesss`
--

CREATE TABLE `inhomesss` (
  `ID` int(6) NOT NULL,
  `category` varchar(50) NOT NULL,
  `score` int(3) NOT NULL,
  `key_ID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inhomesss`
--

INSERT INTO `inhomesss` (`ID`, `category`, `score`, `key_ID`) VALUES
(1, '1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `MakeDate`
--

CREATE TABLE `MakeDate` (
  `ID` int(11) NOT NULL,
  `userID` int(5) NOT NULL,
  `HN` varchar(20) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `MakeDate`
--

INSERT INTO `MakeDate` (`ID`, `userID`, `HN`, `date`) VALUES
(1, 1001, '5711407070', '2018-05-01'),
(2, 1001, '5711403296', '2018-04-03'),
(3, 1001, '5711403407', '2018-05-04'),
(4, 1001, '5711407056', '2018-05-07'),
(6, 1001, '5711403407', '2018-05-09'),
(9, 1001, '5711407070', '2018-05-16'),
(12, 1001, '5711407070', '2018-05-18'),
(13, 1001, '5711407070', '2018-05-19'),
(15, 1001, '5711407070', '2018-05-11'),
(16, 1001, '5711403296', '2018-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `userName` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Pw` varchar(6) NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`userName`, `Pw`, `type`) VALUES
('aorair', '123456', 'authorities'),
('Aw007', '10203', 'authorities'),
('banyen123', '2018', 'authorities'),
('cat61', '040538', 'patient'),
('dee88', '669933', 'patient'),
('lula22', '2538', 'authorities'),
('momo99', '6633', 'authorities'),
('nan55', '778899', 'patient'),
('pop77', '123456', 'patient'),
('Ritar57', '2506', 'authorities'),
('siri2506', '65421', 'patient'),
('somsir', '20461', 'authorities'),
('tum57', '554477', 'patient'),
('xxx01', '665544', 'patient');

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

-- --------------------------------------------------------

--
-- Table structure for table `photo_album`
--

CREATE TABLE `photo_album` (
  `ID` int(6) NOT NULL,
  `HN` varchar(20) NOT NULL,
  `path` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `no` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allergy`
--
ALTER TABLE `allergy`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`key_ID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `HN` (`HN`);

--
-- Indexes for table `authorities`
--
ALTER TABLE `authorities`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `userName` (`userName`);

--
-- Indexes for table `genogram`
--
ALTER TABLE `genogram`
  ADD PRIMARY KEY (`key_no`);

--
-- Indexes for table `geno_family`
--
ALTER TABLE `geno_family`
  ADD PRIMARY KEY (`key_no`);

--
-- Indexes for table `How_to`
--
ALTER TABLE `How_to`
  ADD PRIMARY KEY (`result`);

--
-- Indexes for table `inhomesss`
--
ALTER TABLE `inhomesss`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `key_ID` (`key_ID`);

--
-- Indexes for table `MakeDate`
--
ALTER TABLE `MakeDate`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `HN` (`HN`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`userName`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`HN`),
  ADD KEY `userID` (`userID`),
  ADD KEY `userName` (`userName`);

--
-- Indexes for table `photo_album`
--
ALTER TABLE `photo_album`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `HN` (`HN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allergy`
--
ALTER TABLE `allergy`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `key_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `authorities`
--
ALTER TABLE `authorities`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- AUTO_INCREMENT for table `genogram`
--
ALTER TABLE `genogram`
  MODIFY `key_no` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `geno_family`
--
ALTER TABLE `geno_family`
  MODIFY `key_no` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `inhomesss`
--
ALTER TABLE `inhomesss`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `MakeDate`
--
ALTER TABLE `MakeDate`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `photo_album`
--
ALTER TABLE `photo_album`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessment`
--
ALTER TABLE `assessment`
  ADD CONSTRAINT `assessment_ibfk_1` FOREIGN KEY (`HN`) REFERENCES `patient` (`HN`),
  ADD CONSTRAINT `assessment_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `authorities` (`userID`);

--
-- Constraints for table `authorities`
--
ALTER TABLE `authorities`
  ADD CONSTRAINT `authorities_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `member` (`userName`);

--
-- Constraints for table `inhomesss`
--
ALTER TABLE `inhomesss`
  ADD CONSTRAINT `inhomesss_ibfk_1` FOREIGN KEY (`key_ID`) REFERENCES `assessment` (`key_ID`);

--
-- Constraints for table `MakeDate`
--
ALTER TABLE `MakeDate`
  ADD CONSTRAINT `MakeDate_ibfk_1` FOREIGN KEY (`HN`) REFERENCES `patient` (`HN`),
  ADD CONSTRAINT `MakeDate_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `authorities` (`userID`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `authorities` (`userID`),
  ADD CONSTRAINT `patient_ibfk_2` FOREIGN KEY (`userName`) REFERENCES `member` (`userName`);

--
-- Constraints for table `photo_album`
--
ALTER TABLE `photo_album`
  ADD CONSTRAINT `photo_album_ibfk_1` FOREIGN KEY (`HN`) REFERENCES `patient` (`HN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
