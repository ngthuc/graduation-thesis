-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 12, 2018 at 02:55 PM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spsim`
--

-- --------------------------------------------------------

--
-- Table structure for table `ARTICLE`
--

CREATE TABLE IF NOT EXISTS `ARTICLE` (
  `ARTICLEID` int(5) NOT NULL,
  `USERID` varchar(30) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `CATEID` int(11) NOT NULL,
  `ARTICLEIMAGE` text COLLATE utf8mb4_vietnamese_ci,
  `ARTICLETITLE` text COLLATE utf8mb4_vietnamese_ci,
  `ARTICLEDESCRIPTION` text COLLATE utf8mb4_vietnamese_ci,
  `ARTICLECONTENT` longtext COLLATE utf8mb4_vietnamese_ci,
  `ARTICLECREATIONDATE` datetime DEFAULT NULL,
  `ARTICLECOUNT` int(20) DEFAULT NULL,
  `ARTICLETYPE` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ARTICLE`
--

CREATE TABLE IF NOT EXISTS `INFO` (
  `INFOID` int(5) NOT NULL,
  `USERID` varchar(30) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `CATEID` int(11) NOT NULL,
  `INFOIMAGE` text COLLATE utf8mb4_vietnamese_ci,
  `INFOTITLE` text COLLATE utf8mb4_vietnamese_ci,
  `INFODESCRIPTION` text COLLATE utf8mb4_vietnamese_ci,
  `INFOCONTENT` longtext COLLATE utf8mb4_vietnamese_ci,
  `INFOCREATIONDATE` datetime DEFAULT NULL,
  `INFOCOUNT` int(20) DEFAULT NULL,
  `INFOTYPE` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `CATEGORY`
--

CREATE TABLE IF NOT EXISTS `CATEGORY` (
  `CATEID` int(5) NOT NULL,
  `USERID` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `CAT_CATEID` int(5) DEFAULT NULL,
  `CATENAME` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `CATENAME_ENGLISH` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `CATELEVEL` int(11) DEFAULT NULL,
  `CATESHOWMENU` tinyint(1) DEFAULT NULL,
  `CATETYPE` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `LINKS`
--

CREATE TABLE IF NOT EXISTS `LINKS` (
  `ID` int(11) NOT NULL,
  `HREFLINK` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `LOCATION`
--

CREATE TABLE IF NOT EXISTS `LOCATION` (
  `PAID` int(11) NOT NULL,
  `LOPOSITION` geometry NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `MEDIA`
--

CREATE TABLE IF NOT EXISTS `MEDIA` (
  `MEDIAID` int(11) NOT NULL,
  `CATEID` int(11) DEFAULT NULL,
  `USERID` varchar(30) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `MEDIATITLE` text COLLATE utf8mb4_vietnamese_ci,
  `MEDIADATA` text COLLATE utf8mb4_vietnamese_ci,
  `MEDIAEMBEDDEDLINK` text COLLATE utf8mb4_vietnamese_ci,
  `MEDIATYPE` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `MEDIA`
--

INSERT INTO `MEDIA` (`MEDIAID`, `CATEID`, `USERID`, `MEDIATITLE`, `MEDIADATA`, `MEDIAEMBEDDEDLINK`, `MEDIATYPE`) VALUES
(1537843175, 1537843174, 'admin', 'favicon', NULL, 'http://khubaoton.com.vn/filemanager/upload/default-image.jpg', 'theme'),
(1537843176, 1537843174, 'admin', 'keywords', NULL, 'khubaoton, khu bao ton, my phuoc', 'theme'),
(1537843177, 1537843174, 'admin', 'description', NULL, 'Khu bảo tồn loài - sinh cảnh rừng tràm Mỹ Phước', 'theme'),
(1537843178, 1537843174, 'admin', 'site_name', NULL, 'Khu bảo tồn loài - sinh cảnh rừng tràm Mỹ Phước', 'theme'),
(1537843179, 1537843174, 'admin', 'url', NULL, 'http://khubaoton.com.vn/', 'theme'),
(1537843180, 1537843174, 'admin', 'theme', NULL, 'reveal', 'theme'),
(1537843181, 1537843174, 'admin', 'limit_per_page', NULL, '2', 'theme'),
(1537843182, 1537843174, 'admin', 'short_name', NULL, 'Mỹ Phước', 'theme'),
(1537843183, 1537843174, 'admin', 'version', NULL, '2.8.8', 'theme'),
(1537843184, 1537843174, 'admin', 'videos_url', NULL, 'https://www.youtube.com/watch?v=87rzxT9p2gs&list=PLivjPDlt6ApRiyFKHqGecRcVlUR6-3_7j', 'video'),
(1537843185, 1537843174, 'admin', 'Lớp thú', 'http://khubaoton.com.vn/bai-viet/xem/Lop-thu.html', 'http://khubaoton.com.vn//media/quyhoach-khu1DHCT.jpg', 'slideshow'),
(1537843186, 1537843174, 'admin', 'Họ lưỡng cư', 'http://khubaoton.com.vn/bai-viet/xem/Ho-luong-cu.html', 'http://khubaoton.com.vn/filemanager/upload/default-image.jpg', 'slideshow'),
(1537843187, 1537843174, 'admin', 'Các văn bản pháp quy có liên quan đến khu bảo tồn', 'http://khubaoton.com.vn/bai-viet/xem/Cac-van-ban-phap-quy-co-lien-quan-den-khu-bao-ton.html', 'http://khubaoton.com.vn/filemanager/upload/default-image.jpg', 'slideshow'),
(1537843188, 1537843174, 'admin', 'Cơ cấu tổ chức', 'http://khubaoton.com.vn/bai-viet/xem/Co-cau-to-chuc.html', 'http://khubaoton.com.vn/filemanager/upload/default-image.jpg', 'slideshow'),
(1537843189, 1537843174, 'admin', 'Lịch sử hình thành và phát triển', 'http://khubaoton.com.vn/bai-viet/xem/Lich-su-hinh-thanh-va-phat-trien.html', 'http://khubaoton.com.vn/filemanager/upload/dinhthan.jpg', 'slideshow'),
(1537843190, 1537843174, 'admin', 'phone', NULL, '+84 3xx xxx xxx', 'theme'),
(1537843191, 1537843174, 'admin', 'email', NULL, 'admin@myphuoc.tk', 'theme'),
(1537843192, 1537843174, 'admin', 'address', NULL, 'Sóc Trăng', 'theme'),
(1537865149, 1537843174, 'admin', NULL, NULL, 'http://khubaoton.com.vn/filemanager/upload/quyhoach-khu1DHCT.jpg', 'pictures'),
(1537865178, 1537843174, 'admin', NULL, NULL, 'http://khubaoton.com.vn/filemanager/upload/lop_thu.jpg', 'pictures'),
(1537865183, 1537843174, 'admin', NULL, NULL, 'http://khubaoton.com.vn/filemanager/upload/default-image.jpg', 'pictures'),
(1539075745, 1537843174, 'admin', NULL, NULL, 'http://khubaoton.com.vn//media/dinhthan.jpg', 'pictures');

-- --------------------------------------------------------

--
-- Table structure for table `SAMPLE`
--

CREATE TABLE IF NOT EXISTS `SAMPLE` (
  `SAMPLEID` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `USERIDENTIFY` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `PAID` int(11) NOT NULL,
  `USERCOLLECT` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `USERINSPECT` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SAMPLENUMBER` int(11) DEFAULT NULL,
  `SAMPLEHABITAT` text COLLATE utf8mb4_vietnamese_ci,
  `SAMPLELOCATION` geometry DEFAULT NULL,
  `SAMPLEPLACE` text COLLATE utf8mb4_vietnamese_ci,
  `SAMPLECOLLECTIONDATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE IF NOT EXISTS `USERS` (
  `USERID` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `USERPASSWORD` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `USERFULLNAME` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `USERROLE` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `USERS`
--

INSERT INTO `USERS` (`USERID`, `USERPASSWORD`, `USERFULLNAME`, `USERROLE`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Quản trị viên', 'admin'),
('ngthuc', '21232f297a57a5a743894a0e4a801fc3', 'Nguyên Thức', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ANIMALPLANTMEDIA`
--
ALTER TABLE `ANIMALPLANTMEDIA`
  ADD PRIMARY KEY (`MEDIAID`,`MEDIANO`),
  ADD KEY `FK_ANIMALPLANTTOMEDIA` (`PAID`);

--
-- Indexes for table `ANIMAL_PLANT`
--
ALTER TABLE `ANIMAL_PLANT`
  ADD PRIMARY KEY (`PAID`),
  ADD KEY `FK_CATEGORYPLANTANIMAL` (`CATEID`),
  ADD KEY `FK_USERUPDATEANIMALPLANT` (`USERID`);

--
-- Indexes for table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  ADD PRIMARY KEY (`ARTICLEID`),
  ADD KEY `FK_CATE_ARTICLE` (`CATEID`),
  ADD KEY `FK_USERARTICLE` (`USERID`);

--
-- Indexes for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  ADD PRIMARY KEY (`CATEID`),
  ADD KEY `FK_CATEUSERS` (`USERID`),
  ADD KEY `FK_RELATION` (`CAT_CATEID`);

--
-- Indexes for table `LINKS`
--
ALTER TABLE `LINKS`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `LOCATION`
--
ALTER TABLE `LOCATION`
  ADD KEY `FK_ANIMALPLANTPOSITION` (`PAID`);

--
-- Indexes for table `MEDIA`
--
ALTER TABLE `MEDIA`
  ADD PRIMARY KEY (`MEDIAID`),
  ADD KEY `FK_CATE_MEDIA` (`CATEID`),
  ADD KEY `FK_USERMEDIA` (`USERID`);

--
-- Indexes for table `SAMPLE`
--
ALTER TABLE `SAMPLE`
  ADD PRIMARY KEY (`SAMPLEID`),
  ADD KEY `FK_ANIMALPLANE_SAMPLE` (`PAID`),
  ADD KEY `FK_PERSONCOLLECTSAMPLE` (`USERCOLLECT`),
  ADD KEY `FK_PERSONIDENTIFYSAMPLE` (`USERIDENTIFY`),
  ADD KEY `FK_PERSONINPECTSAMPLE` (`USERINSPECT`);

--
-- Indexes for table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`USERID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `LINKS`
--
ALTER TABLE `LINKS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ANIMALPLANTMEDIA`
--
ALTER TABLE `ANIMALPLANTMEDIA`
  ADD CONSTRAINT `FK_ANIMALPLANTTOMEDIA` FOREIGN KEY (`PAID`) REFERENCES `ANIMAL_PLANT` (`PAID`),
  ADD CONSTRAINT `FK_MEDIATOANIMALPLANT` FOREIGN KEY (`MEDIAID`) REFERENCES `MEDIA` (`MEDIAID`);

--
-- Constraints for table `ANIMAL_PLANT`
--
ALTER TABLE `ANIMAL_PLANT`
  ADD CONSTRAINT `FK_CATEGORYPLANTANIMAL` FOREIGN KEY (`CATEID`) REFERENCES `CATEGORY` (`CATEID`),
  ADD CONSTRAINT `FK_USERUPDATEANIMALPLANT` FOREIGN KEY (`USERID`) REFERENCES `USERS` (`USERID`);

--
-- Constraints for table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  ADD CONSTRAINT `FK_CATE_ARTICLE` FOREIGN KEY (`CATEID`) REFERENCES `CATEGORY` (`CATEID`),
  ADD CONSTRAINT `FK_USERARTICLE` FOREIGN KEY (`USERID`) REFERENCES `USERS` (`USERID`);

--
-- Constraints for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  ADD CONSTRAINT `FK_CATEUSERS` FOREIGN KEY (`USERID`) REFERENCES `USERS` (`USERID`);

--
-- Constraints for table `LOCATION`
--
ALTER TABLE `LOCATION`
  ADD CONSTRAINT `FK_ANIMALPLANTPOSITION` FOREIGN KEY (`PAID`) REFERENCES `ANIMAL_PLANT` (`PAID`);

--
-- Constraints for table `MEDIA`
--
ALTER TABLE `MEDIA`
  ADD CONSTRAINT `FK_CATE_MEDIA` FOREIGN KEY (`CATEID`) REFERENCES `CATEGORY` (`CATEID`),
  ADD CONSTRAINT `FK_USERMEDIA` FOREIGN KEY (`USERID`) REFERENCES `USERS` (`USERID`);

--
-- Constraints for table `SAMPLE`
--
ALTER TABLE `SAMPLE`
  ADD CONSTRAINT `FK_ANIMALPLANE_SAMPLE` FOREIGN KEY (`PAID`) REFERENCES `ANIMAL_PLANT` (`PAID`),
  ADD CONSTRAINT `FK_PERSONCOLLECTSAMPLE` FOREIGN KEY (`USERCOLLECT`) REFERENCES `USERS` (`USERID`),
  ADD CONSTRAINT `FK_PERSONIDENTIFYSAMPLE` FOREIGN KEY (`USERIDENTIFY`) REFERENCES `USERS` (`USERID`),
  ADD CONSTRAINT `FK_PERSONINPECTSAMPLE` FOREIGN KEY (`USERINSPECT`) REFERENCES `USERS` (`USERID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
