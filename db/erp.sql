-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2017 at 06:34 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `sc_parent`
--

DROP TABLE IF EXISTS `sc_parent`;
CREATE TABLE IF NOT EXISTS `sc_parent` (
  `parentId` bigint(20) NOT NULL AUTO_INCREMENT,
  `userId` bigint(20) NOT NULL,
  `motherFName` varchar(25) NOT NULL,
  `motherMName` varchar(25) DEFAULT NULL,
  `motherLName` varchar(25) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `fatherProfession` varchar(25) DEFAULT NULL,
  `fatherQualification` varchar(20) DEFAULT NULL,
  `motherProfession` varchar(20) DEFAULT NULL,
  `motherQualification` varchar(20) DEFAULT NULL,
  `religion` varchar(30) DEFAULT NULL,
  `caste` varchar(30) DEFAULT NULL,
  `homePhone` varchar(11) DEFAULT NULL,
  `city` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `zip` varchar(8) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `deviceToken` varchar(500) DEFAULT NULL,
  `addDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`parentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sc_principal`
--

DROP TABLE IF EXISTS `sc_principal`;
CREATE TABLE IF NOT EXISTS `sc_principal` (
  `principalId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` bigint(20) NOT NULL,
  `deviceToken` varchar(500) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`principalId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sc_student`
--

DROP TABLE IF EXISTS `sc_student`;
CREATE TABLE IF NOT EXISTS `sc_student` (
  `studentId` bigint(20) NOT NULL AUTO_INCREMENT,
  `userId` bigint(20) NOT NULL,
  `gender` tinyint(4) DEFAULT NULL COMMENT '0=>male,1=>female',
  `dob` date NOT NULL,
  `bloodGroup` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') DEFAULT NULL,
  `cardId` int(11) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `addDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deviceToken` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`studentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sc_user`
--

DROP TABLE IF EXISTS `sc_user`;
CREATE TABLE IF NOT EXISTS `sc_user` (
  `userId` bigint(20) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL,
  `communicationEmail` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `passcode` varchar(20) NOT NULL,
  `fName` varchar(25) NOT NULL,
  `mName` varchar(25) NOT NULL,
  `lName` varchar(25) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `userType` enum('PRI','PAR','STU','TEA','LIB','ACC','BUSA') NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=>deactive,1=>active,2=>delete',
  `schoolId` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
