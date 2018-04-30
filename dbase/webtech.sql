-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2018 at 10:11 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `activityid` int(11) NOT NULL,
  `question` varchar(45) DEFAULT NULL,
  `answer` varchar(45) DEFAULT NULL,
  `type` enum('identification','enumeration','multiple choice') DEFAULT NULL,
  `instructor` int(11) DEFAULT NULL,
  PRIMARY KEY (`activityid`),
  KEY `instructor_placer_id_idx` (`instructor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `idcontent` int(11) NOT NULL,
  `title` varchar(10000) DEFAULT NULL,
  `heading` varchar(10000) DEFAULT NULL,
  `body` varchar(10000) DEFAULT NULL,
  `sample` varchar(10000) DEFAULT NULL,
  `inatructor` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcontent`),
  KEY `instructor_id_idx` (`inatructor`),
  KEY `instructor_uplaoder_id_idx` (`inatructor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `facultyid` int(11) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `middlename` varchar(45) DEFAULT NULL,
  `role` enum('Instructor','Admin') DEFAULT NULL,
  PRIMARY KEY (`facultyid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE IF NOT EXISTS `records` (
  `idrecords` int(11) NOT NULL,
  `score` int(10) DEFAULT NULL,
  `student` int(11) DEFAULT NULL,
  `activity` int(11) DEFAULT NULL,
  PRIMARY KEY (`idrecords`),
  KEY `student_scores_idx` (`student`),
  KEY `activity_id_idx` (`activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `iduser` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `middlename` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `course` varchar(45) DEFAULT NULL,
  `year` varchar(45) DEFAULT NULL,
  `instructor` int(11) DEFAULT NULL,
  PRIMARY KEY (`iduser`),
  KEY `instructor_id_idx` (`instructor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `instructor_placer_id` FOREIGN KEY (`instructor`) REFERENCES `faculty` (`facultyid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `instructor_uplaoder_id` FOREIGN KEY (`inatructor`) REFERENCES `faculty` (`facultyid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `activity_id` FOREIGN KEY (`activity`) REFERENCES `activities` (`activityid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `student_scores` FOREIGN KEY (`student`) REFERENCES `student` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `instructor_id` FOREIGN KEY (`instructor`) REFERENCES `faculty` (`facultyid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
