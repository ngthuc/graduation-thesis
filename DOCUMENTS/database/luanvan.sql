-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 29, 2019 at 05:48 PM
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
  `ARTICLEPOLICY` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ARTICLETYPE` text COLLATE utf8mb4_vietnamese_ci NOT NULL
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
  `CATELEVEL` int(11) DEFAULT NULL,
  `CATEHREF` text COLLATE utf8mb4_vietnamese_ci,
  `CATEPOSITION` int(5) NOT NULL DEFAULT '1',
  `CATEPOLICY` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `CATETYPE` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `CATEGORY`
--

INSERT INTO `CATEGORY` (`CATEID`, `USERID`, `CAT_CATEID`, `CATENAME`, `CATELEVEL`, `CATEHREF`, `CATEPOSITION`, `CATEPOLICY`, `CATETYPE`) VALUES
(1, 'ngthuc', 0, 'Education', 1, NULL, 1, 'public', 'info'),
(2, 'ngthuc', 0, 'Experience', 1, NULL, 1, 'public', 'info'),
(3, 'ngthuc', 0, 'Publications', 1, NULL, 1, 'public', 'info'),
(4, 'ngthuc', 0, 'Professional Service', 1, NULL, 1, 'public', 'info');

-- --------------------------------------------------------

--
-- Table structure for table `DEPARTMENT`
--

CREATE TABLE IF NOT EXISTS `DEPARTMENT` (
  `DEPTID` int(5) NOT NULL,
  `PARENTID` int(5) DEFAULT NULL,
  `DEPTNAME` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `DEPTENGLISHNAME` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `DEPTNICKNAME` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `DEPTTYPE` varchar(10) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `DEPARTMENT`
--

INSERT INTO `DEPARTMENT` (`DEPTID`, `PARENTID`, `DEPTNAME`, `DEPTENGLISHNAME`, `DEPTNICKNAME`, `DEPTTYPE`) VALUES
(1, 1, 'Bộ môn Công nghệ phần mềm', 'Department of Software Engineering', 'SE', NULL),
(2, 1, 'Bộ môn Công nghệ thông tin', 'Department of Infomation Technology', 'IT', NULL),
(3, 1, 'Bộ môn Hệ thống thông tin', 'Department of Infomation System', 'IS', NULL),
(4, 1, 'Bộ môn Khoa học máy tính', 'Department of Computer Science', 'CS', NULL),
(5, 1, 'Bộ môn Mạng máy tính và Truyền thông', 'Department of Network and Communication', 'Network', NULL),
(6, 1, 'Bộ môn Tin học ứng dụng', 'Department of Applied Informatics', 'AI', NULL),
(7, 2, 'Bộ môn Kỹ thuật máy tính', 'Department of Computer Engineering', 'CE', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `FACULTY`
--

CREATE TABLE IF NOT EXISTS `FACULTY` (
  `FACID` int(5) NOT NULL,
  `PARENTID` int(5) DEFAULT NULL,
  `FACNAME` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `FACENGLISHNAME` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `FACNICKNAME` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `FACTYPE` varchar(10) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `FACULTY`
--

INSERT INTO `FACULTY` (`FACID`, `PARENTID`, `FACNAME`, `FACENGLISHNAME`, `FACNICKNAME`, `FACTYPE`) VALUES
(1, 1, 'Khoa CNTT&TT', 'College of ICT', 'DI', NULL),
(2, 1, 'Khoa Công nghệ', 'College of Engineering Technology', 'CT', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `INFO`
--

CREATE TABLE IF NOT EXISTS `INFO` (
  `INFOID` int(5) NOT NULL,
  `USERID` varchar(30) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `DEPTID` int(5) DEFAULT NULL,
  `FACID` int(5) DEFAULT NULL,
  `SCHID` int(5) DEFAULT NULL,
  `CATEID` int(11) DEFAULT NULL,
  `INFODATE` text COLLATE utf8mb4_vietnamese_ci,
  `INFOTITLE` text COLLATE utf8mb4_vietnamese_ci,
  `INFOCONTENT` longtext COLLATE utf8mb4_vietnamese_ci,
  `INFOPOLICY` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `INFOTYPE` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `INFOPUBLICATIONORPERSON` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `INFO`
--

INSERT INTO `INFO` (`INFOID`, `USERID`, `DEPTID`, `FACID`, `SCHID`, `CATEID`, `INFODATE`, `INFOTITLE`, `INFOCONTENT`, `INFOPOLICY`, `INFOTYPE`, `INFOPUBLICATIONORPERSON`) VALUES
(1, 'ngthuc', 1, 1, 1, NULL, '1996-06-26', 'dob', NULL, 'public', 'dob', 2),
(2, 'ngthuc', 1, 1, 1, NULL, NULL, 'gender', 'Male', 'public', 'gender', 2),
(3, 'ngthuc', 1, 1, 1, NULL, NULL, 'email', 'ngthuc@lapvo3.tk', 'public', 'email', 2),
(4, 'ngthuc', 1, 1, 1, NULL, NULL, 'phone', '0907 355 924', 'public', 'phone', 2),
(5, 'ngthuc', 1, 1, 1, NULL, NULL, 'website', 'https://ngthuc.com/', 'public', 'website', 2),
(6, 'ngthuc', 1, 1, 1, NULL, NULL, 'address', 'Can Tho', 'public', 'address', 2),
(7, 'ngthuc', 1, 1, 1, NULL, NULL, 'infomations', 'Thích nghe nhạc, xem phim', 'public', 'infomations', 2),
(8, 'ngthuc', 1, 1, 1, 1, '2018-12-11', 'Engineering diploma in Software Engineering', '<p>College of Information and Communication Technology, Cantho University, Vietnam<br />Advisor: Master. Tan Tran-Minh</p>', 'public', 'education', 0),
(9, 'ngthuc', 1, 1, 1, 2, '2017 - 2017', 'Research Leader', 'Project ID: TSV2017-12</p>\r\n<p>Project:&nbsp;Card attendance system</p>\r\n<p>Mentor: Dr. Lam Le-Van', 'public', 'experience', 0),
(10, 'ngthuc', 1, 1, 1, 2, '2018 - 2018', 'Researcher', 'Project ID: TSV2018-26</p>\r\n<p>Project: Multipurpose payment system at Can Tho University</p>\r\n<p>Project Leader: Mr. Khai Pham-Quoc</p>\r\n<p>Project Mentor: Dr. Tuan Thai-Minh', 'public', 'experience', 0),
(11, 'ngthuc', 1, 1, 1, 2, '2018 - 2018', 'Researcher', 'Project ID: TSV2018-38</p>\r\n<p>Project:&nbsp;Can Tho University admission application on Android platform</p>\r\n<p>Project Leader: Mr. Ngoan Tran-Van</p>\r\n<p>Project Mentor: Dr. Tan Tran-Minh', 'public', 'experience', 0),
(12, 'ngthuc', 1, 1, 1, 3, '2018', 'T-N. Do, F. Poulet', 'Latent-lSVM classification of very high-dimensional and large scale multi-class datasets. (to appear) in&nbsp;<em>Concurrency and Computation: Practice and Experience</em>, Vol.31(2):xxx-xxx, Wiley', 'public', 'journal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `MENU`
--

CREATE TABLE IF NOT EXISTS `MENU` (
  `MENUID` int(5) NOT NULL,
  `USERID` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MENUPARENT` int(5) DEFAULT NULL,
  `MENUNAME` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MENULEVEL` int(11) DEFAULT NULL,
  `MENUPOSITION` int(11) DEFAULT '1',
  `MENUTYPE` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `SCHOOL`
--

CREATE TABLE IF NOT EXISTS `SCHOOL` (
  `SCHID` int(5) NOT NULL,
  `SCHNAME` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SCHENGLISHNAME` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SCHNICKNAME` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SCHTYPE` varchar(10) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `SCHOOL`
--

INSERT INTO `SCHOOL` (`SCHID`, `SCHNAME`, `SCHENGLISHNAME`, `SCHNICKNAME`, `SCHTYPE`) VALUES
(1, 'Đại học Cần Thơ', 'Can Tho University', 'CTU', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `SYSTEM`
--

CREATE TABLE IF NOT EXISTS `SYSTEM` (
  `SYSTEMID` int(11) NOT NULL,
  `SYSTEMTITLE` text COLLATE utf8mb4_vietnamese_ci,
  `SYSTEMDATA` text COLLATE utf8mb4_vietnamese_ci,
  `SYSTEMLINK` text COLLATE utf8mb4_vietnamese_ci,
  `SYSTEMPOLICY` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `SYSTEMTYPE` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `SYSTEM`
--

INSERT INTO `SYSTEM` (`SYSTEMID`, `SYSTEMTITLE`, `SYSTEMDATA`, `SYSTEMLINK`, `SYSTEMPOLICY`, `SYSTEMTYPE`) VALUES
(1, 'basic_template', 'public/themes/basic_template/screenshot.png', NULL, 'protected', 'themes'),
(2, 'site_name', 'Hệ thống quản lý profile viên chức khoa CNTT&TT, trường Đại học Cần Thơ', NULL, 'public', 'default'),
(3, 'short_name', 'SPSIM', NULL, 'public', 'default'),
(4, 'phone', '0292 3 831301', NULL, 'public', 'default'),
(5, 'email', 'office@cit.ctu.edu.vn', NULL, 'public', 'default'),
(6, 'address', 'Khu 2, đường 3/2, Phường Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ, Việt Nam', NULL, 'public', 'default'),
(7, 'keywords', 'SPSIM, Hệ thống quản lý profile viên chức khoa CNTT&TT, trường Đại học Cần Thơ', NULL, 'public', 'default'),
(8, 'description', 'Website quản lý profile viên chức khoa CNTT&TT, trường Đại học Cần Thơ', NULL, 'public', 'default'),
(9, 'url', 'http://spsimct594.tk/', NULL, 'public', 'default'),
(10, 'version', '2.2.1', NULL, 'public', 'default'),
(11, 'limit_per_page', '2', NULL, 'public', 'default'),
(12, 'favicon', 'http://spsimct594.tk/spsim_media/favicon.png', NULL, 'public', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE IF NOT EXISTS `USERS` (
  `USERID` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `DEPTID` int(5) DEFAULT NULL,
  `FACID` int(5) DEFAULT NULL,
  `SCHID` int(5) DEFAULT NULL,
  `USERFULLNAME` varchar(254) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `USEREMAIL` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `USERAVATAR` text COLLATE utf8mb4_vietnamese_ci,
  `USERPOSITION` text COLLATE utf8mb4_vietnamese_ci,
  `SUBEMAIL` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `USERPASSWORD` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `USERROLE` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `USERTHEME` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `USERSTATUSSITE` tinyint(1) NOT NULL DEFAULT '0',
  `USERSTATUS` char(10) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `USERS`
--

INSERT INTO `USERS` (`USERID`, `DEPTID`, `FACID`, `SCHID`, `USERFULLNAME`, `USEREMAIL`, `USERAVATAR`, `USERPOSITION`, `SUBEMAIL`, `USERPASSWORD`, `USERROLE`, `USERTHEME`, `USERSTATUSSITE`, `USERSTATUS`) VALUES
('ngthuc', 1, 1, 1, 'Nguyên Thức', 'ngthuc@lapvo3.tk', 'http://spsimct594.tk/spsim_media/NguyenThuc_DSC_1865_27082018.jpg', 'Student at Department of Software Engineering', 'me@ngthuc.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'basic_template', 1, 'approved'),
('ngthuc.hrm', NULL, NULL, NULL, 'HRM Nguyen Thuc', 'ngthuc.hrm@lapvo3.tk', NULL, NULL, NULL, NULL, 'user', 'basic_template', 0, 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  ADD PRIMARY KEY (`ARTICLEID`),
  ADD KEY `FK_ARTICLECATEGORY` (`CATEID`),
  ADD KEY `FK_ARTICLEUSERS` (`USERID`);

--
-- Indexes for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  ADD PRIMARY KEY (`CATEID`),
  ADD KEY `FK_CATEGORYUSERS` (`USERID`);

--
-- Indexes for table `DEPARTMENT`
--
ALTER TABLE `DEPARTMENT`
  ADD PRIMARY KEY (`DEPTID`),
  ADD KEY `FK_DEPARTMENTFACULTY` (`PARENTID`);

--
-- Indexes for table `FACULTY`
--
ALTER TABLE `FACULTY`
  ADD PRIMARY KEY (`FACID`),
  ADD KEY `FK_FACULTYSCHOOL` (`PARENTID`);

--
-- Indexes for table `INFO`
--
ALTER TABLE `INFO`
  ADD PRIMARY KEY (`INFOID`),
  ADD KEY `FK_INFOCATEGORY` (`CATEID`),
  ADD KEY `FK_INFOUSERS` (`USERID`),
  ADD KEY `FK_INFODEPARTMENT` (`DEPTID`),
  ADD KEY `FK_INFOFACULTY` (`FACID`),
  ADD KEY `FK_INFOSCHOOL` (`SCHID`);

--
-- Indexes for table `MENU`
--
ALTER TABLE `MENU`
  ADD PRIMARY KEY (`MENUID`),
  ADD KEY `FK_MENUUSERS` (`USERID`);

--
-- Indexes for table `SCHOOL`
--
ALTER TABLE `SCHOOL`
  ADD PRIMARY KEY (`SCHID`);

--
-- Indexes for table `SYSTEM`
--
ALTER TABLE `SYSTEM`
  ADD PRIMARY KEY (`SYSTEMID`);

--
-- Indexes for table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`USERID`),
  ADD KEY `FK_USERSDEPARTMENT` (`DEPTID`),
  ADD KEY `FK_USERSFACULTY` (`FACID`),
  ADD KEY `FK_USERSSCHOOL` (`SCHID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  MODIFY `ARTICLEID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  MODIFY `CATEID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `DEPARTMENT`
--
ALTER TABLE `DEPARTMENT`
  MODIFY `DEPTID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `FACULTY`
--
ALTER TABLE `FACULTY`
  MODIFY `FACID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `INFO`
--
ALTER TABLE `INFO`
  MODIFY `INFOID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `MENU`
--
ALTER TABLE `MENU`
  MODIFY `MENUID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `SCHOOL`
--
ALTER TABLE `SCHOOL`
  MODIFY `SCHID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `SYSTEM`
--
ALTER TABLE `SYSTEM`
  MODIFY `SYSTEMID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  ADD CONSTRAINT `FK_ARTICLECATEGORY` FOREIGN KEY (`CATEID`) REFERENCES `CATEGORY` (`CATEID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ARTICLEUSERS` FOREIGN KEY (`USERID`) REFERENCES `USERS` (`USERID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  ADD CONSTRAINT `FK_CATEGORYUSERS` FOREIGN KEY (`USERID`) REFERENCES `USERS` (`USERID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `DEPARTMENT`
--
ALTER TABLE `DEPARTMENT`
  ADD CONSTRAINT `FK_DEPARTMENTFACULTY` FOREIGN KEY (`PARENTID`) REFERENCES `FACULTY` (`FACID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `FACULTY`
--
ALTER TABLE `FACULTY`
  ADD CONSTRAINT `FK_FACULTYSCHOOL` FOREIGN KEY (`PARENTID`) REFERENCES `SCHOOL` (`SCHID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `INFO`
--
ALTER TABLE `INFO`
  ADD CONSTRAINT `FK_INFOCATEGORY` FOREIGN KEY (`CATEID`) REFERENCES `CATEGORY` (`CATEID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_INFODEPARTMENT` FOREIGN KEY (`DEPTID`) REFERENCES `DEPARTMENT` (`DEPTID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_INFOFACULTY` FOREIGN KEY (`FACID`) REFERENCES `FACULTY` (`FACID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_INFOSCHOOL` FOREIGN KEY (`SCHID`) REFERENCES `SCHOOL` (`SCHID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_INFOUSERS` FOREIGN KEY (`USERID`) REFERENCES `USERS` (`USERID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `MENU`
--
ALTER TABLE `MENU`
  ADD CONSTRAINT `FK_MENUUSERS` FOREIGN KEY (`USERID`) REFERENCES `USERS` (`USERID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `USERS`
--
ALTER TABLE `USERS`
  ADD CONSTRAINT `FK_USERSDEPARTMENT` FOREIGN KEY (`DEPTID`) REFERENCES `DEPARTMENT` (`DEPTID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USERSFACULTY` FOREIGN KEY (`FACID`) REFERENCES `FACULTY` (`FACID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USERSSCHOOL` FOREIGN KEY (`SCHID`) REFERENCES `SCHOOL` (`SCHID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
