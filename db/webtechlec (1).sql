-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2018 at 12:47 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtechlec`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
CREATE TABLE IF NOT EXISTS `activities` (
  `activityID` int(10) NOT NULL AUTO_INCREMENT,
  `question` text,
  `answer` text,
  `type` enum('identification','enumeration','multipleChoice','assignment') DEFAULT NULL,
  `instructor` int(10) NOT NULL,
  PRIMARY KEY (`activityID`),
  KEY `activity_maker` (`instructor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
  `contentID` int(10) NOT NULL AUTO_INCREMENT,
  `topic` varchar(50) DEFAULT NULL,
  `title` text,
  `heading` text,
  `body` text,
  `sample` text,
  `instructor` int(10) NOT NULL,
  PRIMARY KEY (`contentID`),
  KEY `content_pusher` (`instructor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

DROP TABLE IF EXISTS `records`;
CREATE TABLE IF NOT EXISTS `records` (
  `recordID` int(10) NOT NULL AUTO_INCREMENT,
  `score` int(10) NOT NULL,
  `student` int(10) NOT NULL,
  `activity` int(10) NOT NULL,
  PRIMARY KEY (`recordID`),
  KEY `score_owner` (`student`),
  KEY `performed_activity` (`activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(10) NOT NULL AUTO_INCREMENT,
  `idNumber` int(10) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `middleName` varchar(45) NOT NULL,
  `userType` enum('admin','instructor','student','') NOT NULL,
  `password` varchar(255) NOT NULL,
  `course` varchar(45) DEFAULT NULL,
  `year` varchar(45) DEFAULT NULL,
  `instructor` int(10) DEFAULT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `school_id` (`idNumber`),
  KEY `class_instructor` (`instructor`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `idNumber`, `firstName`, `lastName`, `middleName`, `userType`, `password`, `course`, `year`, `instructor`) VALUES
(1, 2121855, 'Reuel', 'Bigo', 'Martinez', 'admin', 'password', 'BSIT', '4', NULL),
(2, 3423442, 'Balistic', 'missle', 'ilastic', 'instructor', 'password', NULL, NULL, NULL),
(3, 8982818, 'Reuel', 'Bigo', 'Martinez', 'instructor', 'password', NULL, NULL, NULL),
(5, 2122172, 'Ronnel;', 'Bigo', 'Martinez', 'instructor', 'password', NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activity_maker` FOREIGN KEY (`instructor`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_pusher` FOREIGN KEY (`instructor`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `performed_activity` FOREIGN KEY (`activity`) REFERENCES `activities` (`activityID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `score_owner` FOREIGN KEY (`student`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `class_instructor` FOREIGN KEY (`instructor`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
