-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2018 at 10:06 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `ARTICLE`
--

INSERT INTO `ARTICLE` (`ARTICLEID`, `USERID`, `CATEID`, `ARTICLEIMAGE`, `ARTICLETITLE`, `ARTICLEDESCRIPTION`, `ARTICLECONTENT`, `ARTICLECREATIONDATE`, `ARTICLECOUNT`, `ARTICLEPOLICY`, `ARTICLETYPE`) VALUES
(1, 'ngthuc', 1, 'http://spsimct594.tk/public/filemanager/upload/default-image.jpg', 'Khóa học lập trình', 'Khóa học', '<p>Kh&oacute;a học lập tr&igrave;nh căn bản</p>\r\n<p><img class="img-responsive" src="../../../spsim_media/UseCaseDiagram-Generalv2.jpg" alt="" /></p>', '2018-11-20 14:11:11', 0, 'public', 'article'),
(2, 'ngthuc', 1, NULL, 'Khóa học sinh viên Việt Nam', 'Khóa học', '<p>Gồm c&aacute;c b&agrave;i học</p>', '2018-11-20 14:11:44', 0, 'public', 'page');

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
(1, 'ngthuc', 0, 'Course', 1, '0', 1, 'public', 'article'),
(2, 'ngthuc', 0, 'Education', 1, NULL, 1, 'public', 'info'),
(3, 'ngthuc', 0, 'Distinction', 1, NULL, 1, 'public', 'info'),
(4, 'ngthuc', 0, 'Research interests', 1, 'rech', 1, 'public', 'info'),
(5, 'ngthuc', 0, 'Experience', 1, NULL, 1, 'public', 'info'),
(6, 'ngthuc', 0, 'Publications', 1, NULL, 1, 'public', 'info'),
(7, 'ngthuc', 0, 'Professional Service', 1, NULL, 1, 'public', 'info'),
(8, 'ngthuc', 6, 'Journal, book chapter', 2, NULL, 1, 'public', 'info'),
(9, 'ngthuc', 6, 'Edited book', 2, NULL, 1, 'public', 'info'),
(10, 'ngthuc', 6, 'Conference, workshop', 2, NULL, 1, 'public', 'info'),
(11, 'ngthuc', 6, 'Technical report', 2, NULL, 1, 'public', 'info'),
(12, 'ngthuc', 6, 'Thesis', 2, NULL, 1, 'public', 'info'),
(13, 'ngthuc', 7, 'Workshop Organization', 2, NULL, 1, 'public', 'info'),
(14, 'ngthuc', 7, 'Program committee member, reviewer', 2, NULL, 1, 'public', 'info'),
(15, 'ngthuc', 7, 'Invited seminars', 2, NULL, 1, 'public', 'info'),
(16, 'ngthuc', 7, 'Ph.D. Defense Committee', 2, NULL, 1, 'public', 'info'),
(17, 'ngthuc.hrm', 0, 'Công bố', 1, NULL, 1, 'public', 'info'),
(18, 'ngthuc.hrm', 17, 'Bài báo', 2, NULL, 1, 'public', 'info'),
(19, 'ngthuc.hrm', 17, 'Giáo trình', 2, NULL, 1, 'public', 'info');

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
  `DEPTTYPE` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

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
  `FACTYPE` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `INFO`
--

INSERT INTO `INFO` (`INFOID`, `USERID`, `CATEID`, `INFOIMAGE`, `INFODATE`, `INFOTITLE`, `INFODESCRIPTION`, `INFOCONTENT`, `INFOPOLICY`, `INFOTYPE`) VALUES
(10, 'ngthuc', NULL, NULL, NULL, 'name', NULL, 'Nguyen-Thuc Le', 'public', 'person'),
(11, 'ngthuc', NULL, NULL, NULL, 'position', NULL, 'Student at Department of Software Engineering, College of ICT, Can Tho University', 'public', 'person'),
(12, 'ngthuc', NULL, NULL, '1996-06-26', 'birthday', NULL, NULL, 'public', 'person'),
(13, 'ngthuc', NULL, NULL, NULL, 'gender', NULL, 'Male', 'public', 'person'),
(14, 'ngthuc', NULL, NULL, NULL, 'email', NULL, 'me@ngthuc.com', 'public', 'person'),
(15, 'ngthuc', NULL, NULL, NULL, 'phone', NULL, '0907355924', 'public', 'person'),
(16, 'ngthuc', NULL, NULL, NULL, 'address', NULL, 'Hung Loi, Ninh Kieu, Can Tho City', 'public', 'person'),
(17, 'ngthuc', NULL, NULL, NULL, 'website', NULL, 'https://ngthuc.com/', 'public', 'person'),
(18, 'ngthuc', NULL, 'http://spsimct594.tk/spsim_media/NguyenThuc_DSC_1865_27082018.jpg', NULL, 'avatar', NULL, NULL, 'public', 'person'),
(19, 'ngthuc', 2, NULL, '2004-12-01', 'Ph.D. in computer science on', NULL, 'Visualization and Support Vector Machine in Data Mining<br />LINA, Nantes Laboratory for Computer Science Nantes University, France<br />Thesis advisors: Prof. Henri Briand, Dr. Fran&ccedil;ois Poulet', 'public', 'education'),
(20, 'ngthuc', 3, NULL, '2014-11-01', 'Qualification for Associate Professor (A/Prof.)', NULL, 'Informatics', 'public', 'timeline'),
(21, 'ngthuc', 4, NULL, '2001 - present', 'Data mining and Knowledge discovery in databases', NULL, '<p>Data mining with SVM and Kernel-based methods, Ensemble methods, Decision tree </p>\n<p>Information visualization in knowledge discovery in databases, Visual data mining </p>\n<p>Mining complex data: very-high-dimensional, large scale, imbalanced datasets</p>', 'public', 'research'),
(22, 'ngthuc', 5, NULL, '2012 - 2013', 'Visiting scientist', NULL, 'DECIDE, URM 6285 Lab-STICC, with Prof. Philippe Lenca, A/Prof. Sorin Moga, Telecom-Bretagne, France.<br />Automatic Configuration of Enterprise Resource Planning', 'public', 'experience'),
(23, 'ngthuc', 8, NULL, '2018', 'T-N. Do, F. Poulet', NULL, 'Latent-lSVM classification of very high-dimensional and large scale multi-class datasets. (to appear) in&nbsp;<em>Concurrency and Computation: Practice and Experience</em>, Wiley', 'public', 'publication'),
(24, 'ngthuc', 9, NULL, '2009', 'F. Poulet, B. LeGrand, T-N. Do and M-A. Aufaure', NULL, 'Acte de l''Atelier Visualisation et extraction de connaissances. 9&egrave;mes Journ&eacute;es d''Extraction et Gestion des Connaissances', 'public', 'publication'),
(25, 'ngthuc', 10, NULL, '2018', 'P-H. Huynh, V-H. Nguyen, and T-N. Do', NULL, 'Random ensemble oblique decision stumps for classifying gene expression data. (to appear) in proc. of Intl Symposium on Information and Communication Technology 2018 (SoICT 2018)', 'public', 'publication'),
(26, 'ngthuc', 10, NULL, '2004', 'T-N. Do', NULL, 'Visualisation en extraction de connaissances &agrave; partir de donn&eacute;es. in proc. of JDOC''04, Journ&eacute;e des Doctorants, Ecole Polytechnique de l''Universit&eacute; de Nantes', 'public', 'publication'),
(27, 'ngthuc', 11, NULL, '2007', 'J-D. Fekete, N. Elmqvist, T-N. Do, H. Goodell and N. Henry', NULL, 'Navigating Wikipedia with the Zoomable Adjacency Matrix Explorer. INRIA Research Report, Technical Report No. RR:00141168', 'public', 'publication'),
(28, 'ngthuc', 12, NULL, '2004', 'T-N. Do', NULL, 'Visualisation et s&eacute;parateurs &agrave; vaste marge en fouille de donn&eacute;es. Th&egrave;se de Doctorat de l''Universit&eacute; de Nantes, D&eacute;cembre', 'public', 'publication'),
(29, 'ngthuc', 13, NULL, '', 'QIMIE 2015 is organized in association with the PAKDD 2015 conference, with Prof. P. Lenca, Prof. S. Lallich', NULL, NULL, 'public', 'decentralization'),
(30, 'ngthuc', 14, NULL, '', 'ACML 2017, The Asian Conference on Machine Learning 2017', NULL, NULL, 'public', 'decentralization'),
(31, 'ngthuc', 15, NULL, '03/2014 ', 'FIT, University of Technology HCM, Vietnam', NULL, NULL, 'public', 'decentralization'),
(32, 'ngthuc', 16, NULL, 'June/2017', 'Cong-Chien Ta Duy. Building information extraction system based on computing domain ontology. University of Technology HCM, Vietnam', NULL, NULL, 'public', 'decentralization'),
(33, 'ngthuc', 2, NULL, '2002-07-01', 'DEA in computer science', NULL, 'Visualization and Support Vector Machine in Data Mining<br />LINA, Nantes Laboratory for Computer Science Nantes University, France<br />Advisor: Dr. Fran&ccedil;ois Poulet', 'public', 'education'),
(34, 'ngthuc', 2, NULL, '2001-08-01', 'Master in computer science', NULL, 'IFI, Francophone Institute for Computer Science Hanoi, Vietnam<br />Advisor: Dr. Philippe Massonet', 'public', 'education'),
(35, 'ngthuc.hrm', NULL, NULL, NULL, 'name', NULL, 'Nguyen-Thuc Le', 'public', 'person'),
(36, 'ngthuc.hrm', NULL, NULL, NULL, 'position', NULL, 'Student at Department of Software Engineering', 'public', 'person'),
(37, 'ngthuc.hrm', NULL, NULL, NULL, 'address', NULL, 'Cần Thơ', 'public', 'person'),
(38, 'ngthuc.hrm', NULL, NULL, '1111-11-11', 'birthday', NULL, NULL, 'public', 'person'),
(39, 'ngthuc.hrm', NULL, NULL, NULL, 'gender', NULL, 'Male', 'public', 'person'),
(40, 'ngthuc.hrm', NULL, NULL, NULL, 'phone', NULL, '000555555', 'public', 'person'),
(41, 'ngthuc.hrm', NULL, NULL, NULL, 'email', NULL, 'thuc.edu@gmail.com', 'public', 'person'),
(42, 'ngthuc.hrm', NULL, NULL, NULL, 'website', NULL, 'http://spsimct594.tk/spsim_media/quyhoach-khu1DHCT.jpg', 'public', 'person'),
(43, 'ngthuc.hrm', NULL, 'http://spsimct594.tk/spsim_media/NguyenThuc_DSC_1865_27082018.jpg', NULL, 'avatar', NULL, NULL, 'public', 'person'),
(44, 'ngthuc.hrm', 18, NULL, '2018', 'Bài báo khoa học', NULL, 'Về CNTT', 'public', 'publication'),
(45, 'ngthuc.hrm', 18, NULL, '2018', 'N-Nghi Do', NULL, 'Về Thủy sản', 'public', 'publication'),
(46, 'ngthuc.hrm', 19, NULL, '2012', 'Giáo trình CNPM', NULL, NULL, 'public', 'publication');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `MENU`
--

INSERT INTO `MENU` (`MENUID`, `USERID`, `MENUPARENT`, `MENUNAME`, `MENULINK`, `MENULEVEL`, `MENUPOSITION`, `MENUTYPE`) VALUES
(1, 'ngthuc', 0, 'Research', '#rech', 1, 1, 'primary'),
(2, 'ngthuc', 0, 'Software', 'http://spsimct594.tk/~ngthuc/v4miner', 1, 2, 'primary'),
(3, 'ngthuc', 0, 'Image', 'http://spsimct594.tk/~ngthuc/images', 1, 3, 'primary'),
(4, 'ngthuc', 0, 'Course.VN', 'http://spsimct594.tk/~ngthuc/Course', 1, 4, 'primary');

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
  `SCHTYPE` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

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
(14, NULL, 'none', 'lapvo3.tk', 'protected', 'domain'),
(15, NULL, 'none', 'ngthuc.com', 'protected', 'domain'),
(16, 'basic_template', 'public/themes/basic_template/screenshot.png', NULL, 'protected', 'themes'),
(17, 'theme', 'basic_template', NULL, 'protected', 'theme'),
(18, NULL, 'ctu', 'ctu.edu.vn', 'protected', 'domain'),
(19, NULL, 'ctu', 'cit.ctu.edu.vn', 'protected', 'domain');

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE IF NOT EXISTS `USERS` (
  `USERID` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `USERFULLNAME` varchar(254) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `USEREMAIL` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `DEPTID` int(5) DEFAULT NULL COMMENT 'Deprtment ID',
  `FACID` int(5) DEFAULT NULL COMMENT 'Faculty ID',
  `SCHID` int(5) DEFAULT NULL COMMENT 'School ID',
  `USERPASSWORD` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `USERROLE` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `USERSTATUS` char(10) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `USERS`
--

INSERT INTO `USERS` (`USERID`, `USERFULLNAME`, `USEREMAIL`, `DEPTID`, `FACID`, `SCHID`, `USERPASSWORD`, `USERROLE`, `USERSTATUS`) VALUES
('me', 'Lê Nguyên Thức', 'me@ngthuc.com', NULL, NULL, NULL, NULL, 'user', 'pending'),
('ngthuc', 'Nguyên Thức', 'ngthuc@lapvo3.tk', NULL, NULL, NULL, '21232f297a57a5a743894a0e4a801fc3', 'admin', 'approved'),
('ngthuc.hrm', 'HRM Nguyen Thuc', 'ngthuc.hrm@lapvo3.tk', NULL, NULL, NULL, NULL, 'user', 'approved');

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
  ADD PRIMARY KEY (`DEPTID`);

--
-- Indexes for table `FACULTY`
--
ALTER TABLE `FACULTY`
  ADD PRIMARY KEY (`FACID`);

--
-- Indexes for table `INFO`
--
ALTER TABLE `INFO`
  ADD PRIMARY KEY (`INFOID`),
  ADD KEY `FK_INFOCATEGORY` (`CATEID`),
  ADD KEY `FK_INFOUSERS` (`USERID`);

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
  ADD PRIMARY KEY (`USERID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  MODIFY `ARTICLEID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  MODIFY `CATEID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `DEPARTMENT`
--
ALTER TABLE `DEPARTMENT`
  MODIFY `DEPTID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `FACULTY`
--
ALTER TABLE `FACULTY`
  MODIFY `FACID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `INFO`
--
ALTER TABLE `INFO`
  MODIFY `INFOID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `MEDIA`
--
ALTER TABLE `MEDIA`
  MODIFY `MEDIAID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `MENU`
--
ALTER TABLE `MENU`
  MODIFY `MENUID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `SCHOOL`
--
ALTER TABLE `SCHOOL`
  MODIFY `SCHID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `SYSTEM`
--
ALTER TABLE `SYSTEM`
  MODIFY `SYSTEMID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  ADD CONSTRAINT `FK_ARTICLECATEGORY` FOREIGN KEY (`CATEID`) REFERENCES `CATEGORY` (`CATEID`),
  ADD CONSTRAINT `FK_ARTICLEUSERS` FOREIGN KEY (`USERID`) REFERENCES `USERS` (`USERID`);

--
-- Constraints for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  ADD CONSTRAINT `FK_CATEGORYUSERS` FOREIGN KEY (`USERID`) REFERENCES `USERS` (`USERID`);

--
-- Constraints for table `INFO`
--
ALTER TABLE `INFO`
  ADD CONSTRAINT `FK_INFOCATEGORY` FOREIGN KEY (`CATEID`) REFERENCES `CATEGORY` (`CATEID`),
  ADD CONSTRAINT `FK_INFOUSERS` FOREIGN KEY (`USERID`) REFERENCES `USERS` (`USERID`);

--
-- Constraints for table `MEDIA`
--
ALTER TABLE `MEDIA`
  ADD CONSTRAINT `FK_MEDIACATEGORY` FOREIGN KEY (`CATEID`) REFERENCES `CATEGORY` (`CATEID`),
  ADD CONSTRAINT `FK_MEDIAUSERS` FOREIGN KEY (`USERID`) REFERENCES `USERS` (`USERID`);

--
-- Constraints for table `MENU`
--
ALTER TABLE `MENU`
  ADD CONSTRAINT `FK_MENUUSERS` FOREIGN KEY (`USERID`) REFERENCES `USERS` (`USERID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
