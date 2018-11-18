-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 17, 2018 at 10:23 AM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luanvan`
--

-- --------------------------------------------------------

--
-- Table structure for table `INFO`
--

CREATE TABLE IF NOT EXISTS `INFO` (
  `INFOID` int(5) NOT NULL,
  `USERID` varchar(30) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `CATEID` int(11) DEFAULT NULL,
  `INFOIMAGE` text COLLATE utf8mb4_vietnamese_ci,
  `INFODATE` text COLLATE utf8mb4_vietnamese_ci,
  `INFOTITLE` text COLLATE utf8mb4_vietnamese_ci,
  `INFODESCRIPTION` text COLLATE utf8mb4_vietnamese_ci,
  `INFOCONTENT` longtext COLLATE utf8mb4_vietnamese_ci,
  `INFOPOLICY` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `INFOTYPE` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `INFO`
--

INSERT INTO `INFO` (`INFOID`, `USERID`, `CATEID`, `INFOIMAGE`, `INFODATE`, `INFOTITLE`, `INFODESCRIPTION`, `INFOCONTENT`, `INFOPOLICY`, `INFOTYPE`) VALUES
(1, 'ngthuc', NULL, NULL, NULL, 'name', NULL, 'THANH-NGHI DO', 'public', 'person'),
(2, 'ngthuc', NULL, NULL, '1974-02-12', 'birthday', NULL, '', 'public', 'person'),
(3, 'ngthuc', NULL, NULL, NULL, 'gender', NULL, 'Male', 'public', 'person'),
(4, 'ngthuc', NULL, NULL, NULL, 'email', NULL, 'dtnghi@cit.ctu.edu.vn', 'public', 'person'),
(5, 'ngthuc', NULL, NULL, NULL, 'phone', NULL, '+84 (0)2923 734 720', 'public', 'person'),
(6, 'ngthuc', NULL, NULL, NULL, 'address', NULL, '3/2 Street, Ninh Kieu District, 92100-CanTho, Viet Nam', 'public', 'person'),
(7, 'ngthuc', NULL, NULL, NULL, 'website', NULL, 'http://www.cit.ctu.edu.vn/~dtnghi/', 'public', 'person'),
(8, 'ngthuc', NULL, 'http://cit.ctu.edu.vn/~dtnghi/Nghi-CV1_files/getPhoto.jpg', NULL, 'avatar', NULL, '', 'public', 'person'),
(9, 'ngthuc', NULL, NULL, NULL, 'position', NULL, 'Head of Computer Networks Department', 'public', 'person');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `INFO`
--
ALTER TABLE `INFO`
  ADD PRIMARY KEY (`INFOID`),
  ADD KEY `FK_INFOCATEGORY` (`CATEID`),
  ADD KEY `FK_INFOUSERS` (`USERID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `INFO`
--
ALTER TABLE `INFO`
  MODIFY `INFOID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `INFO`
--
ALTER TABLE `INFO`
  ADD CONSTRAINT `FK_INFOCATEGORY` FOREIGN KEY (`CATEID`) REFERENCES `CATEGORY` (`CATEID`),
  ADD CONSTRAINT `FK_INFOUSERS` FOREIGN KEY (`USERID`) REFERENCES `USERS` (`USERID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
