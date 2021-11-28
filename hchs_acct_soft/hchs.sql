-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2021 at 03:23 AM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hchs`
--

-- --------------------------------------------------------

--
-- Table structure for table `billscategory`
--

DROP TABLE IF EXISTS `billscategory`;
CREATE TABLE IF NOT EXISTS `billscategory` (
  `billid` int NOT NULL AUTO_INCREMENT,
  `billName` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `classid` int NOT NULL,
  PRIMARY KEY (`billid`),
  KEY `classid` (`classid`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billscategory`
--

INSERT INTO `billscategory` (`billid`, `billName`, `amount`, `classid`) VALUES
(1, 'tuition', '45000.00', 1),
(2, 'tuition', '45000.00', 2),
(3, 'tuition', '45000.00', 3),
(4, 'tuition', '45000.00', 4),
(5, 'tuition', '45000.00', 5),
(6, 'tuition', '45000.00', 6),
(7, 'tuition', '45000.00', 7),
(8, 'tuition', '45000.00', 8),
(9, 'tuition', '45000.00', 9),
(10, 'tuition', '45000.00', 10),
(11, 'tuition', '55000.00', 11),
(12, 'tuition', '55000.00', 12),
(13, 'tuition', '55000.00', 13),
(14, 'tuition', '55000.00', 14),
(15, 'tuition', '55000.00', 15),
(16, 'tuition', '55000.00', 16),
(17, 'extraCurriculum', '15050.00', 1),
(18, 'extraCurriculum', '15050.00', 2),
(19, 'extraCurriculum', '15050.00', 3),
(20, 'extraCurriculum', '15050.00', 4),
(21, 'extraCurriculum', '30050.00', 5),
(22, 'extraCurriculum', '30050.00', 6),
(23, 'extraCurriculum', '30050.00', 7),
(24, 'extraCurriculum', '30050.00', 8),
(25, 'extraCurriculum', '30050.00', 9),
(26, 'extraCurriculum', '30050.00', 10),
(27, 'extraCurriculum', '35050.00', 11),
(28, 'extraCurriculum', '35050.00', 12),
(29, 'extraCurriculum', '35050.00', 13),
(30, 'extraCurriculum', '35050.00', 14),
(31, 'extraCurriculum', '35050.00', 15),
(32, 'extraCurriculum', '35050.00', 16),
(33, 'boarding', '150000.00', 11),
(34, 'boarding', '150000.00', 12),
(35, 'boarding', '150000.00', 13),
(36, 'boarding', '150000.00', 14),
(37, 'boarding', '150000.00', 15),
(38, 'boarding', '150000.00', 16),
(39, 'admissionForm', '3000.00', 1),
(40, 'admissionForm', '3000.00', 2),
(41, 'admissionForm', '3000.00', 3),
(42, 'admissionForm', '3000.00', 4),
(43, 'admissionForm', '3000.00', 5),
(44, 'admissionForm', '3000.00', 6),
(45, 'admissionForm', '3000.00', 7),
(46, 'admissionForm', '3000.00', 8),
(47, 'admissionForm', '3000.00', 9),
(48, 'admissionForm', '3000.00', 10),
(49, 'admissionForm', '5000.00', 11),
(50, 'admissionForm', '5000.00', 12),
(51, 'admissionForm', '5000.00', 13),
(52, 'admissionForm', '5000.00', 14),
(53, 'admissionForm', '5000.00', 15),
(54, 'admissionForm', '5000.00', 16),
(57, 'caution', '10000.00', 1),
(58, 'maintenace', '10000.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

DROP TABLE IF EXISTS `bus`;
CREATE TABLE IF NOT EXISTS `bus` (
  `place` int NOT NULL,
  `busNum` int NOT NULL,
  `cost` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`place`, `busNum`, `cost`) VALUES
(1, 1, '10000.00'),
(2, 1, '12500.00'),
(1, 2, '10000.00'),
(2, 2, '12500.00'),
(1, 3, '20000.00'),
(2, 3, '25000.00');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `classid` int NOT NULL AUTO_INCREMENT,
  `className` varchar(255) NOT NULL,
  PRIMARY KEY (`classid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`classid`, `className`) VALUES
(1, 'DOVE'),
(2, 'TINY TOT'),
(3, 'RECEPTION 1'),
(4, 'RECEPTION 2'),
(5, 'TRANSITION'),
(6, 'GRADE 1'),
(7, 'GRADE 2'),
(8, 'GRADE 3'),
(9, 'GRADE 4'),
(10, 'GRADE 5'),
(11, 'JSS 1'),
(12, 'JSS 2'),
(13, 'JSS 3'),
(14, 'SS 1'),
(15, 'SS 2'),
(16, 'SS 3');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

DROP TABLE IF EXISTS `discounts`;
CREATE TABLE IF NOT EXISTS `discounts` (
  `discid` int NOT NULL AUTO_INCREMENT,
  `childNum` int NOT NULL,
  `percentage` int NOT NULL,
  PRIMARY KEY (`discid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `families`
--

DROP TABLE IF EXISTS `families`;
CREATE TABLE IF NOT EXISTS `families` (
  `famid` int NOT NULL AUTO_INCREMENT,
  `parent1` varchar(255) NOT NULL,
  `parent2` varchar(255) NOT NULL,
  `famName` varchar(255) NOT NULL,
  `stats` varchar(5) NOT NULL,
  PRIMARY KEY (`famid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `families`
--

INSERT INTO `families` (`famid`, `parent1`, `parent2`, `famName`, `stats`) VALUES
(3, 'Mr Zony', 'Mrs Zony', 'Zony', 'non'),
(7, 'MR KASMALAYAFA', 'MRS KASMALAYAFA', 'KASMALAYAFA', 'non'),
(8, 'Elue', 'Mr Elue', 'Mrs Elue', 'non'),
(9, 'MR KENETH', 'MRS KENETH', 'KENETH', 'non'),
(10, 'MR Ohaka', 'MRS OHAKA', 'OHAKA', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

DROP TABLE IF EXISTS `others`;
CREATE TABLE IF NOT EXISTS `others` (
  `studid` int DEFAULT NULL,
  `uniform` decimal(6,2) DEFAULT NULL,
  `books` decimal(6,2) DEFAULT NULL,
  `formAdmission` decimal(6,2) DEFAULT NULL,
  `bus` decimal(6,2) DEFAULT NULL,
  `caution` decimal(10,2) DEFAULT NULL,
  `maintenance` decimal(10,2) DEFAULT NULL,
  `boardingFee` decimal(10,2) DEFAULT NULL,
  `misc` decimal(6,2) DEFAULT NULL,
  KEY `studid` (`studid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `others`
--

INSERT INTO `others` (`studid`, `uniform`, `books`, `formAdmission`, `bus`, `caution`, `maintenance`, `boardingFee`, `misc`) VALUES
(8, '3454.00', '1000.00', '0.00', '0.00', NULL, NULL, '0.00', '800.00'),
(1, '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', '0.00'),
(2, '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', '0.00'),
(3, '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', '0.00'),
(4, '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', '0.00'),
(5, '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', '0.00'),
(6, '0.00', '0.00', '0.00', '2.00', '3900.00', NULL, '0.00', '0.00'),
(7, '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', '0.00'),
(9, '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', '0.00'),
(10, '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', '0.00'),
(11, '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', '0.00'),
(12, '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', '0.00'),
(13, '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', '0.00'),
(15, '0.00', '0.00', '0.00', '0.00', NULL, NULL, '0.00', '0.00'),
(16, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', NULL),
(68, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '4444.00'),
(69, NULL, NULL, NULL, '4444.00', NULL, NULL, '0.00', '4444.00'),
(72, '333.00', '4566.00', '5433.00', '9999.99', '4444.00', '33333333.00', '0.00', '0.00'),
(74, NULL, NULL, NULL, '9999.99', NULL, NULL, '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `studid` int NOT NULL AUTO_INCREMENT,
  `scholarship` int NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `class` int NOT NULL,
  `famid` int DEFAULT NULL,
  `address` int NOT NULL,
  `tuition` decimal(6,2) NOT NULL,
  `extraCurricular` decimal(6,2) NOT NULL,
  `bus` int DEFAULT NULL,
  `boarding` int NOT NULL,
  `misc` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`studid`),
  KEY `famid` (`famid`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studid`, `scholarship`, `firstName`, `lastName`, `class`, `famid`, `address`, `tuition`, `extraCurricular`, `bus`, `boarding`, `misc`) VALUES
(1, 0, 'James', 'KASMALAYAFA', 9, 7, 1, '1000.00', '1000.00', 1, 1, '9999.99'),
(2, 0, 'Prince', 'KASMALAYAFA', 10, 7, 2, '1000.00', '1000.00', 1, 1, '9999.99'),
(3, 0, 'Princess', 'KASMALAYAFA', 13, 7, 1, '1000.00', '1000.00', 1, 1, '9999.99'),
(4, 0, 'Jessica', 'KASMALAYAFA', 16, 7, 1, '1000.00', '1000.00', 3, 1, '9999.99'),
(5, 0, 'Jeremiah', 'Kenneth', 3, 9, 2, '1000.00', '1000.00', 0, 1, '9999.99'),
(6, 0, 'Idibo-Brown', 'Keneth', 4, 9, 1, '1000.00', '9999.99', 1, 1, '116.00'),
(7, 0, 'Anabel', 'Kenneth', 8, 9, 1, '1000.00', '1000.00', 2, 1, '9999.99'),
(8, 0, 'Rebecca', 'Keneth', 9, 9, 1, '1000.00', '9999.99', 1, 1, '1121.00'),
(9, 0, 'Sannumi', 'Biebele', 8, 9, 1, '1000.00', '9999.99', 1, 1, '1121.00'),
(10, 0, 'Kamsi', 'Elue', 8, 8, 1, '1000.00', '1000.00', 1, 1, '9999.99'),
(11, 0, 'Lucas', 'Elue', 11, 8, 1, '1000.00', '9999.99', 0, 1, '1121.00'),
(12, 0, 'Elue', 'Emmanuel', 13, 8, 1, '1000.00', '9999.99', 1, 1, '1121.00'),
(13, 0, 'Ebi', 'Zony', 1, 3, 1, '9999.99', '1000.00', 1, 1, '9999.99'),
(15, 0, 'Neo', 'Ohaka', 3, 10, 1, '1000.00', '1000.00', 1, 1, '9999.99'),
(16, 1, 'Stephen', 'Prosper', 9, 3, 1, '1000.00', '9999.99', 1, 1, '1121.00'),
(68, 1, 'cout', 'crtie', 1, 3, 1, '3333.00', '3333.00', 0, 1, '4444.00'),
(69, 1, 'couty', 'crtie', 1, 3, 1, '3333.00', '3333.00', 2, 1, '4444.00'),
(72, 1, 'OROLOBO', 'SPARROW', 1, 3, 1, '2233.00', '2233.00', 0, 1, '3344.00'),
(74, 0, 'paul', 'johnson', 6, 8, 2, '9999.99', '9999.99', 3, 0, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `passwrd` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `activated` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `firstName`, `lastName`, `phone`, `passwrd`, `position`, `activated`) VALUES
(1, 'JACK', 'SPARROW', '08101341858', 'POTATO', 'admin', '1'),
(2, 'PROMISE', 'ACCOUNTANT', '08101341859', 'Acct', 'accountant', '1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billscategory`
--
ALTER TABLE `billscategory`
  ADD CONSTRAINT `billscategory_ibfk_1` FOREIGN KEY (`classid`) REFERENCES `classes` (`classid`);

--
-- Constraints for table `others`
--
ALTER TABLE `others`
  ADD CONSTRAINT `others_ibfk_1` FOREIGN KEY (`studid`) REFERENCES `students` (`studid`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`famid`) REFERENCES `families` (`famid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
