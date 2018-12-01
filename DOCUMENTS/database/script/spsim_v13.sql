-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2018 at 09:05 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `ARTICLE`
--

INSERT INTO `ARTICLE` (`ARTICLEID`, `USERID`, `CATEID`, `ARTICLEIMAGE`, `ARTICLETITLE`, `ARTICLEDESCRIPTION`, `ARTICLECONTENT`, `ARTICLECREATIONDATE`, `ARTICLECOUNT`, `ARTICLEPOLICY`, `ARTICLETYPE`) VALUES
(1, 'ngthuc', 18, 'http://spsimct594.tk/public/filemanager/upload/default-image.jpg', 'Khóa học lập trình', 'Bài viết', '', '2018-11-29 14:11:03', 0, 'public', 'article'),
(2, 'ngthuc', 18, 'http://spsimct594.tk/public/filemanager/upload/default-image.jpg', 'Khóa học sinh viên Việt Nam', 'Khóa học', '', '2018-11-29 14:11:04', 0, 'public', 'page');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `CATEGORY`
--

INSERT INTO `CATEGORY` (`CATEID`, `USERID`, `CAT_CATEID`, `CATENAME`, `CATELEVEL`, `CATEHREF`, `CATEPOSITION`, `CATEPOLICY`, `CATETYPE`) VALUES
(2, 'ngthuc', 0, 'Education', 1, NULL, 1, 'public', 'info'),
(3, 'ngthuc', 0, 'Distinction', 1, NULL, 2, 'public', 'info'),
(4, 'ngthuc', 0, 'Research interests', 1, 'rech', 3, 'public', 'info'),
(5, 'ngthuc', 0, 'Experience', 1, NULL, 4, 'public', 'info'),
(6, 'ngthuc', 0, 'Publications', 1, NULL, 5, 'public', 'info'),
(7, 'ngthuc', 0, 'Professional Service', 1, NULL, 6, 'public', 'info'),
(17, 'ngthuc.hrm', 0, 'Công bố', 1, NULL, 1, 'public', 'info'),
(18, 'ngthuc', 0, 'Course', 1, NULL, 1, 'public', 'article'),
(19, 'ngthuc', 0, 'Software', 1, NULL, 1, 'public', 'article');

-- --------------------------------------------------------

--
-- Table structure for table `DEPARTMENT`
--

CREATE TABLE IF NOT EXISTS `DEPARTMENT` (
  `DEPTID` int(5) NOT NULL,
  `PARENTID` int(5) DEFAULT NULL,
  `DEPTNAME` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `DEPTENGLISHNAME` varchar(200) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `DEPTNICKNAME` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `DEPTTYPE` text COLLATE utf8mb4_vietnamese_ci
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `DEPARTMENT`
--

INSERT INTO `DEPARTMENT` (`DEPTID`, `PARENTID`, `DEPTNAME`, `DEPTENGLISHNAME`, `DEPTNICKNAME`, `DEPTTYPE`) VALUES
(2, 1, 'Bộ môn Công nghệ phần mềm', 'Department of Software Engineering', 'SE', NULL),
(3, 1, 'Bộ môn Công nghệ thông tin', 'Department of Infomation Technology', 'IT', NULL),
(4, 1, 'Bộ môn Hệ thống thông tin', 'Department of Infomation System', 'IS', NULL),
(5, 1, 'Bộ môn Khoa học máy tính', 'Department of Computer Science', 'CS', NULL),
(6, 1, 'Bộ môn Mạng máy tính và Truyền thông', 'Department of Network and Communication', 'Network', NULL),
(7, 1, 'Bộ môn Tin học ứng dụng', 'Department of Applied Informatics', 'AI', NULL);

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
  `FACTYPE` text COLLATE utf8mb4_vietnamese_ci
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
  `INFOIMAGE` text COLLATE utf8mb4_vietnamese_ci,
  `INFODATE` text COLLATE utf8mb4_vietnamese_ci,
  `INFOTITLE` text COLLATE utf8mb4_vietnamese_ci,
  `INFODESCRIPTION` text COLLATE utf8mb4_vietnamese_ci,
  `INFOCONTENT` longtext COLLATE utf8mb4_vietnamese_ci,
  `INFOPOLICY` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `INFOTYPE` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `INFO`
--

INSERT INTO `INFO` (`INFOID`, `USERID`, `DEPTID`, `FACID`, `SCHID`, `CATEID`, `INFOIMAGE`, `INFODATE`, `INFOTITLE`, `INFODESCRIPTION`, `INFOCONTENT`, `INFOPOLICY`, `INFOTYPE`) VALUES
(49, 'ngthuc', 2, 1, 1, NULL, NULL, NULL, 'name', NULL, 'Nguyen-Thuc Le', 'public', 'person'),
(50, 'ngthuc', 2, 1, 1, NULL, NULL, NULL, 'position', NULL, 'Student at Department of Software Engineering', 'public', 'person'),
(51, 'ngthuc', 2, 1, 1, NULL, NULL, NULL, 'address', NULL, 'Can Tho', 'public', 'person'),
(52, 'ngthuc', 2, 1, 1, NULL, NULL, '1996-06-26', 'birthday', NULL, NULL, 'public', 'person'),
(53, 'ngthuc', 2, 1, 1, NULL, NULL, NULL, 'gender', NULL, 'Male', 'public', 'person'),
(54, 'ngthuc', 2, 1, 1, NULL, NULL, NULL, 'phone', NULL, '0907355924', 'public', 'person'),
(55, 'ngthuc', 2, 1, 1, NULL, NULL, NULL, 'email', NULL, 'thuc.edu@gmail.com', 'public', 'person'),
(56, 'ngthuc', 2, 1, 1, NULL, NULL, NULL, 'website', NULL, 'http://spsimct594.tk/spsim_media/quyhoach-khu1DHCT.jpg', 'public', 'person'),
(57, 'ngthuc', 2, 1, 1, NULL, 'http://spsimct594.tk/spsim_media/NguyenThuc_DSC_1865_27082018.jpg', NULL, 'avatar', NULL, NULL, 'public', 'person'),
(58, 'ngthuc', 2, 1, 1, 2, NULL, '2004-12-01', 'Ph.D. in computer science on', NULL, 'Visualization and Support Vector Machine in Data Mining<br />LINA, Nantes Laboratory for Computer Science Nantes University, France<br />Thesis advisors: Prof. Henri Briand, Dr. Fran&ccedil;ois Poulet', 'public', 'education'),
(59, 'ngthuc', 2, 1, 1, 3, NULL, '2015-11-01', 'Qualification for Associate Professor (A/Prof.)', NULL, 'Informatics', 'public', 'distinction'),
(60, 'ngthuc', 2, 1, 1, 4, NULL, '2001 - present', 'Data mining and Knowledge discovery in databases', NULL, 'Data mining with SVM and Kernel-based methods, Ensemble methods, Decision tree&nbsp;<br /><br />Information visualization in knowledge discovery in databases, Visual data mining&nbsp;<br /><br />Mining complex data: very-high-dimensional, large scale, imbalanced datasets', 'public', 'research'),
(61, 'ngthuc', 2, 1, 1, 5, NULL, '2012 - 2013', 'Visiting scientist', NULL, 'DECIDE, URM 6285 Lab-STICC, with Prof. Philippe Lenca, A/Prof. Sorin Moga, Telecom-Bretagne, France.<br />Automatic Configuration of Enterprise Resource Planning', 'public', 'experience'),
(62, 'ngthuc', 2, 1, 1, 6, NULL, '2018', 'T-N. Do, F. Poulet', NULL, 'Latent-lSVM classification of very high-dimensional and large scale multi-class datasets. (to appear) in&nbsp;<em>Concurrency and Computation: Practice and Experience</em>, Wiley', 'public', 'journal'),
(63, 'ngthuc', 2, 1, 1, 6, NULL, '2004', 'T-N. Do', NULL, 'Visualisation et s&eacute;parateurs &agrave; vaste marge en fouille de donn&eacute;es. Th&egrave;se de Doctorat de l''Universit&eacute; de Nantes, D&eacute;cembre&nbsp;', 'public', 'thesis'),
(64, 'ngthuc', 2, 1, 1, 7, NULL, '2015', 'QIMIE 2015 is organized in association with the PAKDD 2015 conference, with Prof. P. Lenca, Prof. S. Lallich', NULL, NULL, 'public', 'workshop'),
(65, 'ngthuc', 2, 1, 1, 6, NULL, '2018', 'T-N. Do, L-D. Bui', NULL, 'Parallel learning algorithms of local support vector regression for dealing with large datasets. (to appear) in The LNCS Journal Transactions on Large-Scale Data- and Knowledge-Centered Systems, Springer', 'public', 'journal');

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
  `MEDIALINK` text COLLATE utf8mb4_vietnamese_ci,
  `MEDIAPOLICY` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `MEDIATYPE` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `MENU`
--

CREATE TABLE IF NOT EXISTS `MENU` (
  `MENUID` int(5) NOT NULL,
  `USERID` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MENUPARENT` int(5) DEFAULT NULL,
  `MENUNAME` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MENULINK` text COLLATE utf8mb4_vietnamese_ci,
  `MENULEVEL` int(11) DEFAULT NULL,
  `MENUPOSITION` int(11) DEFAULT '1',
  `MENUTYPE` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `MENU`
--

INSERT INTO `MENU` (`MENUID`, `USERID`, `MENUPARENT`, `MENUNAME`, `MENULINK`, `MENULEVEL`, `MENUPOSITION`, `MENUTYPE`) VALUES
(1, 'ngthuc', 0, 'Research', '#rech', 1, 1, 'primary'),
(2, 'ngthuc', 0, 'Software', 'http://spsimct594.tk/~ngthuc/v4miner', 1, 2, 'primary'),
(3, 'ngthuc', 0, 'Image', 'http://spsimct594.tk/~ngthuc/images', 1, 3, 'primary'),
(4, 'ngthuc', 0, 'Course.VN', 'http://spsimct594.tk/~ngthuc/Course_18', 1, 4, 'primary'),
(5, 'ngthuc', 0, 'Course.VN', 'http://spsimct594.tk/~ngthuc/Course_18', 1, 2, 'submenu'),
(7, 'ngthuc', 0, 'Profile', 'http://spsimct594.tk/~ngthuc/', 1, 1, 'submenu');

-- --------------------------------------------------------

--
-- Table structure for table `SCHOOL`
--

CREATE TABLE IF NOT EXISTS `SCHOOL` (
  `SCHID` int(5) NOT NULL,
  `PARENTID` int(5) DEFAULT NULL,
  `SCHNAME` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SCHENGLISHNAME` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SCHNICKNAME` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SCHTYPE` text COLLATE utf8mb4_vietnamese_ci
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `SCHOOL`
--

INSERT INTO `SCHOOL` (`SCHID`, `PARENTID`, `SCHNAME`, `SCHENGLISHNAME`, `SCHNICKNAME`, `SCHTYPE`) VALUES
(1, NULL, 'Đại học Cần Thơ', 'Can Tho University', 'CTU', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `SYSTEM`
--

INSERT INTO `SYSTEM` (`SYSTEMID`, `SYSTEMTITLE`, `SYSTEMDATA`, `SYSTEMLINK`, `SYSTEMPOLICY`, `SYSTEMTYPE`) VALUES
(1, 'site_name', 'SPSIM | Hệ thống quản lý profile viên chức khoa CNTT&TT, trường Đại học Cần Thơ', NULL, 'public', 'default'),
(2, 'short_name', 'SPSIM ', NULL, 'public', 'default'),
(3, 'phone', '0907355924', NULL, 'public', 'default'),
(4, 'email', 'thucb1400731@student.ctu.edu.vn', NULL, 'public', 'default'),
(5, 'address', 'Khu 2 Đại học Cần Thơ, đường 3/2, phường Xuân Khánh, quận Ninh Kiều, TP.Cần Thơ', NULL, 'public', 'default'),
(6, 'keywords', 'spsim, hệ thống quản lý profile viên chức khoa CNTT&TT, trường Đại học Cần Thơ', NULL, 'public', 'default'),
(7, 'description', 'Website quản lý profile viên chức khoa CNTT&TT', NULL, 'public', 'default'),
(8, 'url', 'http://spsimct594.tk/', NULL, 'public', 'default'),
(9, 'version', '1.0.0', NULL, 'public', 'default'),
(10, 'limit_per_page', '2', NULL, 'public', 'default'),
(11, 'favicon', 'https://ngthuc.github.io/src/public/resources/images/logo/logo-without-name.png', NULL, 'public', 'default'),
(14, NULL, NULL, 'lapvo3.tk', 'protected', 'domain'),
(15, NULL, NULL, 'ngthuc.com', 'protected', 'domain'),
(16, 'basic_template', 'public/themes/basic_template/screenshot.png', NULL, 'protected', 'themes'),
(17, 'theme', 'basic_template', NULL, 'protected', 'theme'),
(18, NULL, NULL, 'ctu.edu.vn', 'protected', 'domain'),
(19, NULL, NULL, 'cit.ctu.edu.vn', 'protected', 'domain'),
(20, NULL, NULL, 'student.ctu.edu.vn', 'protected', 'domain');

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
  `SUBEMAIL` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `USERPASSWORD` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `USERROLE` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `USERSTATUS` char(10) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `USERS`
--

INSERT INTO `USERS` (`USERID`, `DEPTID`, `FACID`, `SCHID`, `USERFULLNAME`, `USEREMAIL`, `SUBEMAIL`, `USERPASSWORD`, `USERROLE`, `USERSTATUS`) VALUES
('ngthuc', 2, 1, 1, 'Nguyên Thức', 'ngthuc@lapvo3.tk', NULL, '21232f297a57a5a743894a0e4a801fc3', 'admin', 'approved'),
('ngthuc.hrm', 4, 1, 1, 'HRM Nguyen Thuc', 'ngthuc.hrm@lapvo3.tk', NULL, NULL, 'user', 'approved');

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
-- Indexes for table `MEDIA`
--
ALTER TABLE `MEDIA`
  ADD PRIMARY KEY (`MEDIAID`),
  ADD KEY `FK_MEDIACATEGORY` (`CATEID`),
  ADD KEY `FK_MEDIAUSERS` (`USERID`);

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
  MODIFY `ARTICLEID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  MODIFY `CATEID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
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
  MODIFY `INFOID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `MEDIA`
--
ALTER TABLE `MEDIA`
  MODIFY `MEDIAID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `MENU`
--
ALTER TABLE `MENU`
  MODIFY `MENUID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `SCHOOL`
--
ALTER TABLE `SCHOOL`
  MODIFY `SCHID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `SYSTEM`
--
ALTER TABLE `SYSTEM`
  MODIFY `SYSTEMID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
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
-- Constraints for table `MEDIA`
--
ALTER TABLE `MEDIA`
  ADD CONSTRAINT `FK_MEDIACATEGORY` FOREIGN KEY (`CATEID`) REFERENCES `CATEGORY` (`CATEID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MEDIAUSERS` FOREIGN KEY (`USERID`) REFERENCES `USERS` (`USERID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
