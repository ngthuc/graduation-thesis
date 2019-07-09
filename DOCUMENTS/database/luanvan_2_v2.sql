-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2019 at 12:43 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luanvan_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` bigint(20) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `count` int(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cateId` bigint(20) DEFAULT NULL,
  `policy` bigint(20) DEFAULT NULL,
  `userId` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) NOT NULL,
  `href` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parentId` bigint(20) DEFAULT NULL,
  `policy` bigint(20) DEFAULT NULL,
  `userId` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grouppolicy`
--

CREATE TABLE `grouppolicy` (
  `id` bigint(20) NOT NULL,
  `contactsType` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `groupsType` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aPartOf` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` bigint(20) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `count` int(11) DEFAULT NULL,
  `infoDate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isPublish` bit(1) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cateId` bigint(20) DEFAULT NULL,
  `ownedBy` bigint(20) DEFAULT NULL,
  `policy` bigint(20) DEFAULT NULL,
  `userId` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) NOT NULL,
  `level` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parentId` bigint(20) DEFAULT NULL,
  `userId` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE `organisation` (
  `id` bigint(20) NOT NULL,
  `english` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parentId` bigint(20) DEFAULT NULL,
  `groups` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userId` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` bigint(20) NOT NULL,
  `keyName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyValue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `policy` bigint(20) NOT NULL,
  `profileOf` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE `system` (
  `id` bigint(20) NOT NULL,
  `data` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accountStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profileStatus` bit(1) NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subEmail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `managedBy` bigint(20) NOT NULL,
  `contacts` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK368sbauiw0l7u71w5al3xivg` (`cateId`),
  ADD KEY `FKg5ssaqjjgx9ckel1ks6w95v65` (`policy`),
  ADD KEY `FKccqypr8qj2poy40o8fvcak77e` (`userId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKnncc50mfc4qajm9ire5asd5rw` (`parentId`),
  ADD KEY `FK8i6d9veh9afaahya4l6syx98i` (`policy`),
  ADD KEY `FKtjqew7nty2jfpedbvoy5qyr70` (`userId`);

--
-- Indexes for table `grouppolicy`
--
ALTER TABLE `grouppolicy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKjj2rnapo8o1plimuet2y5to0a` (`aPartOf`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKg262d5v3n5o29u67y9abw3vrq` (`cateId`),
  ADD KEY `FK4i8ccj3kp0qg93f00gs49whp6` (`ownedBy`),
  ADD KEY `FK4u1vr6r2syy42c42nywu5xuby` (`policy`),
  ADD KEY `FKtblgjwjtwxuw16hwxl0qt4tc0` (`userId`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKbfc1llceenf99rg3fybss8u77` (`parentId`),
  ADD KEY `FKndtocmtm9osm993ubhe7450eq` (`userId`);

--
-- Indexes for table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK629bf96hajd5w0k43hslfn6fp` (`parentId`),
  ADD KEY `FKkv4skly8i2slmixn052ndgs8s` (`groups`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKqfcd2w8ymossrcmrd8i7wg3ft` (`userId`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKdb0bxd2yn7e2mhijopgnqhmjw` (`policy`),
  ADD KEY `FKb4rxmpub35hemvm4153hkokyg` (`profileOf`);

--
-- Indexes for table `system`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKjeo3es8dgm4q9my06i7tl4jdu` (`policy`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKigrps1mjcx8f4omwme5cxq52e` (`managedBy`),
  ADD KEY `FKnyne2djki69uacx1qsifhj8as` (`contacts`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grouppolicy`
--
ALTER TABLE `grouppolicy`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organisation`
--
ALTER TABLE `organisation`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system`
--
ALTER TABLE `system`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK368sbauiw0l7u71w5al3xivg` FOREIGN KEY (`cateId`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FKccqypr8qj2poy40o8fvcak77e` FOREIGN KEY (`userId`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FKg5ssaqjjgx9ckel1ks6w95v65` FOREIGN KEY (`policy`) REFERENCES `policy` (`id`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `FK8i6d9veh9afaahya4l6syx98i` FOREIGN KEY (`policy`) REFERENCES `policy` (`id`),
  ADD CONSTRAINT `FKnncc50mfc4qajm9ire5asd5rw` FOREIGN KEY (`parentId`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FKtjqew7nty2jfpedbvoy5qyr70` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Constraints for table `grouppolicy`
--
ALTER TABLE `grouppolicy`
  ADD CONSTRAINT `FKjj2rnapo8o1plimuet2y5to0a` FOREIGN KEY (`aPartOf`) REFERENCES `policy` (`id`);

--
-- Constraints for table `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `FK4i8ccj3kp0qg93f00gs49whp6` FOREIGN KEY (`ownedBy`) REFERENCES `organisation` (`id`),
  ADD CONSTRAINT `FK4u1vr6r2syy42c42nywu5xuby` FOREIGN KEY (`policy`) REFERENCES `policy` (`id`),
  ADD CONSTRAINT `FKg262d5v3n5o29u67y9abw3vrq` FOREIGN KEY (`cateId`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FKtblgjwjtwxuw16hwxl0qt4tc0` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FKbfc1llceenf99rg3fybss8u77` FOREIGN KEY (`parentId`) REFERENCES `menu` (`id`),
  ADD CONSTRAINT `FKndtocmtm9osm993ubhe7450eq` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Constraints for table `organisation`
--
ALTER TABLE `organisation`
  ADD CONSTRAINT `FK629bf96hajd5w0k43hslfn6fp` FOREIGN KEY (`parentId`) REFERENCES `organisation` (`id`),
  ADD CONSTRAINT `FKkv4skly8i2slmixn052ndgs8s` FOREIGN KEY (`groups`) REFERENCES `grouppolicy` (`id`);

--
-- Constraints for table `policy`
--
ALTER TABLE `policy`
  ADD CONSTRAINT `FKqfcd2w8ymossrcmrd8i7wg3ft` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `FKb4rxmpub35hemvm4153hkokyg` FOREIGN KEY (`profileOf`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FKdb0bxd2yn7e2mhijopgnqhmjw` FOREIGN KEY (`policy`) REFERENCES `policy` (`id`);

--
-- Constraints for table `system`
--
ALTER TABLE `system`
  ADD CONSTRAINT `FKjeo3es8dgm4q9my06i7tl4jdu` FOREIGN KEY (`policy`) REFERENCES `policy` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FKigrps1mjcx8f4omwme5cxq52e` FOREIGN KEY (`managedBy`) REFERENCES `organisation` (`id`),
  ADD CONSTRAINT `FKnyne2djki69uacx1qsifhj8as` FOREIGN KEY (`contacts`) REFERENCES `grouppolicy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
