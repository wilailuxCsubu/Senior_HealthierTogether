-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2018 at 11:53 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`key_ID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `HN` (`HN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `key_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessment`
--
ALTER TABLE `assessment`
  ADD CONSTRAINT `assessment_ibfk_1` FOREIGN KEY (`HN`) REFERENCES `patient` (`HN`),
  ADD CONSTRAINT `assessment_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `authorities` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
