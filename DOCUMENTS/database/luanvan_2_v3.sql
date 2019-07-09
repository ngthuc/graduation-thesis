-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 09, 2019 at 06:26 PM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subEmail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `managedBy` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` bigint(20) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `count` int(11) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cateId` bigint(20) DEFAULT NULL,
  `policy` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` bigint(20) NOT NULL,
  `level` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ownedOf` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `childOf` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts_policy`
--

CREATE TABLE IF NOT EXISTS `contacts_policy` (
  `groupPolicyId` bigint(20) NOT NULL,
  `accountId` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grouppolicy`
--

CREATE TABLE IF NOT EXISTS `grouppolicy` (
  `id` bigint(20) NOT NULL,
  `contactsType` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `groupsType` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aPartOf` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups_policy`
--

CREATE TABLE IF NOT EXISTS `groups_policy` (
  `groupPolicyId` bigint(20) NOT NULL,
  `organisationId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `id` bigint(20) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `infoDate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isPublish` bit(1) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ownedOf` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cateId` bigint(20) DEFAULT NULL,
  `ownedBy` bigint(20) DEFAULT NULL,
  `policy` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` bigint(20) NOT NULL,
  `level` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdBy` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `childOf` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE IF NOT EXISTS `organisation` (
  `id` bigint(20) NOT NULL,
  `english` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `childOf` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE IF NOT EXISTS `policy` (
  `id` bigint(20) NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ownedOf` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` bigint(20) NOT NULL,
  `keyName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` bit(1) NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyValue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profileOf` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `policy` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE IF NOT EXISTS `system` (
  `id` bigint(20) NOT NULL,
  `data` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKe18im3ow718ligsq543uv34au` (`managedBy`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKctrql806tp2flu9aqj3a2x2a7` (`author`),
  ADD KEY `FK368sbauiw0l7u71w5al3xivg` (`cateId`),
  ADD KEY `FKg5ssaqjjgx9ckel1ks6w95v65` (`policy`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK6huegx16lead9h3q0wn6lxwyt` (`ownedOf`),
  ADD KEY `FK49r8ls3xl3drr6i82lco90g4x` (`childOf`);

--
-- Indexes for table `contacts_policy`
--
ALTER TABLE `contacts_policy`
  ADD PRIMARY KEY (`groupPolicyId`,`accountId`),
  ADD KEY `FKdrxd05apaxir3s7f50aouw3es` (`accountId`);

--
-- Indexes for table `grouppolicy`
--
ALTER TABLE `grouppolicy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKjj2rnapo8o1plimuet2y5to0a` (`aPartOf`);

--
-- Indexes for table `groups_policy`
--
ALTER TABLE `groups_policy`
  ADD PRIMARY KEY (`groupPolicyId`,`organisationId`),
  ADD KEY `FKdyloe7lu3oiib34e585ci1ijj` (`organisationId`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKstygtg9k9x38pbk86nd5o2u5` (`ownedOf`),
  ADD KEY `FKg262d5v3n5o29u67y9abw3vrq` (`cateId`),
  ADD KEY `FK4i8ccj3kp0qg93f00gs49whp6` (`ownedBy`),
  ADD KEY `FK4u1vr6r2syy42c42nywu5xuby` (`policy`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKj0lsx0ngkgto0v3ejbydk014m` (`createdBy`),
  ADD KEY `FK1oquu5i7ogwibn477yni0emge` (`childOf`);

--
-- Indexes for table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKntc4b55scvbx0xecvvtk1b3hb` (`childOf`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKhyqaj643l5qid7xa86672ipt9` (`ownedOf`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKijfhkt1nis7vpqbscid9oixim` (`profileOf`),
  ADD KEY `FKdb0bxd2yn7e2mhijopgnqhmjw` (`policy`);

--
-- Indexes for table `system`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`id`);

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
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `FKe18im3ow718ligsq543uv34au` FOREIGN KEY (`managedBy`) REFERENCES `organisation` (`id`);

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK368sbauiw0l7u71w5al3xivg` FOREIGN KEY (`cateId`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FKctrql806tp2flu9aqj3a2x2a7` FOREIGN KEY (`author`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `FKg5ssaqjjgx9ckel1ks6w95v65` FOREIGN KEY (`policy`) REFERENCES `policy` (`id`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `FK49r8ls3xl3drr6i82lco90g4x` FOREIGN KEY (`childOf`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK6huegx16lead9h3q0wn6lxwyt` FOREIGN KEY (`ownedOf`) REFERENCES `account` (`id`);

--
-- Constraints for table `contacts_policy`
--
ALTER TABLE `contacts_policy`
  ADD CONSTRAINT `FKdrxd05apaxir3s7f50aouw3es` FOREIGN KEY (`accountId`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `FKevxsgrj0s5phd0auyhqh3qbp4` FOREIGN KEY (`groupPolicyId`) REFERENCES `grouppolicy` (`id`);

--
-- Constraints for table `grouppolicy`
--
ALTER TABLE `grouppolicy`
  ADD CONSTRAINT `FKjj2rnapo8o1plimuet2y5to0a` FOREIGN KEY (`aPartOf`) REFERENCES `policy` (`id`);

--
-- Constraints for table `groups_policy`
--
ALTER TABLE `groups_policy`
  ADD CONSTRAINT `FKb3w5ghd6apfalo4bjyvml56fx` FOREIGN KEY (`groupPolicyId`) REFERENCES `grouppolicy` (`id`),
  ADD CONSTRAINT `FKdyloe7lu3oiib34e585ci1ijj` FOREIGN KEY (`organisationId`) REFERENCES `organisation` (`id`);

--
-- Constraints for table `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `FK4i8ccj3kp0qg93f00gs49whp6` FOREIGN KEY (`ownedBy`) REFERENCES `organisation` (`id`),
  ADD CONSTRAINT `FK4u1vr6r2syy42c42nywu5xuby` FOREIGN KEY (`policy`) REFERENCES `policy` (`id`),
  ADD CONSTRAINT `FKg262d5v3n5o29u67y9abw3vrq` FOREIGN KEY (`cateId`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FKstygtg9k9x38pbk86nd5o2u5` FOREIGN KEY (`ownedOf`) REFERENCES `account` (`id`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `FK1oquu5i7ogwibn477yni0emge` FOREIGN KEY (`childOf`) REFERENCES `menu` (`id`),
  ADD CONSTRAINT `FKj0lsx0ngkgto0v3ejbydk014m` FOREIGN KEY (`createdBy`) REFERENCES `account` (`id`);

--
-- Constraints for table `organisation`
--
ALTER TABLE `organisation`
  ADD CONSTRAINT `FKntc4b55scvbx0xecvvtk1b3hb` FOREIGN KEY (`childOf`) REFERENCES `organisation` (`id`);

--
-- Constraints for table `policy`
--
ALTER TABLE `policy`
  ADD CONSTRAINT `FKhyqaj643l5qid7xa86672ipt9` FOREIGN KEY (`ownedOf`) REFERENCES `account` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `FKdb0bxd2yn7e2mhijopgnqhmjw` FOREIGN KEY (`policy`) REFERENCES `policy` (`id`),
  ADD CONSTRAINT `FKijfhkt1nis7vpqbscid9oixim` FOREIGN KEY (`profileOf`) REFERENCES `account` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
