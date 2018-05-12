-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2018 at 08:55 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webtechlec`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `activityID` int(11) NOT NULL AUTO_INCREMENT,
  `activityDescription` varchar(45) NOT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `instructorID` int(11) NOT NULL,
  PRIMARY KEY (`activityID`),
  KEY `activity_maker` (`instructorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
  `announcementID` int(11) NOT NULL AUTO_INCREMENT,
  `announcementName` varchar(255) DEFAULT NULL,
  `announcementContent` text NOT NULL,
  `instructorID` int(11) NOT NULL,
  PRIMARY KEY (`announcementID`),
  KEY `announcer` (`instructorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `classID` int(11) NOT NULL AUTO_INCREMENT,
  `classCode` varchar(11) NOT NULL,
  `instructorID` int(11) NOT NULL,
  PRIMARY KEY (`classID`),
  UNIQUE KEY `class_code` (`classCode`),
  KEY `class_instructor` (`instructorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `contentID` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `heading` text NOT NULL,
  `body` text NOT NULL,
  `sample` text NOT NULL,
  `instructorID` int(11) NOT NULL,
  PRIMARY KEY (`contentID`),
  KEY `content_pusher` (`instructorID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`contentID`, `topic`, `title`, `heading`, `body`, `sample`, `instructorID`) VALUES
(8, 'servlets', 'What does Servlet do?', '', '1. Read the explicit data sent by the clients (browsers)\n2. Read the implicit HTTP request data sent by the clients (browsers)\n3. Process the data and generate the results\n4. Send the explicit data (i.e., the document) to the clients (browsers)\n5. Send the implicit HTTP response to the clients (browsers).', '', 1),
(9, 'websecurity', 'Packet Sniffer', '', 'Also known as a Network Analyzer, it is a computer program that can intercept security, privacy and log traffic that passes a network. It is a piece of computer hardware that can intercept and log traffic that passes over a digital network or part of a network.', '', 1),
(10, 'websecurity', 'Let''s Encrypt', '', 'Let''s Encrypt provides free certificate for Transport Layer Security(TLS) encryption to serve HTTPS traffic via an automated process designed to eliminate the hitherto complex process of manual creation, validation, signing, installation, and renewal of certificates for secure websites.', '', 1),
(11, 'websecurity', 'Injection', '', 'Injection flaws, such as SQL, OS, XXE, and LDAP injection occur when untrusted data is sent to an interpreter as part of a command or query. The attacker’s hostile data can trick the interpreter into executing unintended commands or accessing data without proper authorization.', '', 1),
(12, 'websecurity', 'Broken Authentication and Session Management', '', 'Application functions related to authentication and session management are often implemented incorrectly, allowing attackers to compromise passwords, keys, or session tokens, or to exploit other implementation flaws to assume other users’ identities (temporarily or permanently).', '', 1),
(13, 'websecurity', 'Cross-Site Scripting (XSS)', '', 'XSS flaws occur whenever an application includes untrusted data in a new web page without proper validation or escaping, or updates an existing web page with user supplied data using a browser API that can create JavaScript. XSS allows attackers to execute scripts in the victim’s browser which can hijack user sessions, deface web sites, or redirect the user to malicious sites.', '', 1),
(14, 'websecurity', 'Broken Access Control', '', 'Restrictions on what authenticated users are allowed to do are not properly enforced. Attackers can exploit these flaws to access unauthorized functionality and/or data, such as access other users'' accounts, view sensitive files, modify other users’ data, change access rights, etc.', '', 1),
(15, 'websecurity', 'Security Misconfiguration', '', 'Good security requires having a secure configuration defined and deployed for the application, frameworks, application server, web server, database server, platform, etc. Secure settings should be defined, implemented, and maintained, as defaults are often insecure. Additionally, software should be kept up to date.', '', 1),
(16, 'websecurity', 'Sensitive Data Exposure', '', 'Many web applications and APIs do not properly protect sensitive data, such as financial, healthcare, and PII. Attackers may steal or modify such weakly protected data to conduct credit card fraud, identity theft, or other crimes. Sensitive data deserves extra protection such as encryption at rest or in transit, as well as special precautions when exchanged with the browser.', '', 1),
(17, 'websecurity', 'Insufficient Attack Protection', '', 'The majority of applications and APIs lack the basic ability to detect, prevent, and respond to both manual and automated attacks. Attack protection goes far beyond basic input validation and involves automatically detecting, logging, responding, and even blocking exploit attempts. Application owners also need to be able to deploy patches quickly to protect against attacks.', '', 1),
(18, 'websecurity', 'Cross-Site Request Forgery (CSRF)', '', 'A CSRF attack forces a logged-on victim’s browser to send a forged HTTP request, including the victim’s session cookie and any other automatically included authentication information, to a vulnerable web application. Such an attack allows the attacker to force a victim’s browser to generate requests the vulnerable application thinks are legitimate requests from the victim', '', 1),
(19, 'websecurity', 'Using Components with Known Vulnerabilities', '', 'Components, such as libraries, frameworks, and other software modules, run with the same privileges as the application. If a vulnerable component is exploited, such an attack can facilitate serious data loss or server takeover. Applications and APIs using components with known vulnerabilities may undermine application defenses and enable various attacks and impacts.', '', 1),
(20, 'websecurity', 'Underprotected APIs', '', 'Modern applications often involve rich client applications and APIs, such as JavaScript in the browser and mobile apps, that connect to an API of some kind (SOAP/XML, REST/JSON, RPC, GWT, etc.). These APIs are often unprotected and contain numerous vulnerabilities.', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE IF NOT EXISTS `instructor` (
  `instructorID` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(45) NOT NULL,
  `userID` int(11) NOT NULL,
  PRIMARY KEY (`instructorID`),
  KEY `user_info` (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructorID`, `department`, `userID`) VALUES
(1, 'IT Department', 3);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `questionID` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `activityID` int(11) NOT NULL,
  PRIMARY KEY (`questionID`),
  KEY `activity_questions` (`activityID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE IF NOT EXISTS `records` (
  `recordID` int(11) NOT NULL AUTO_INCREMENT,
  `dateTime` datetime NOT NULL,
  `score` int(11) NOT NULL,
  `activityID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  PRIMARY KEY (`recordID`),
  KEY `record_owner` (`studentID`),
  KEY `activity_record` (`activityID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `studentID` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(11) NOT NULL,
  `year` varchar(11) NOT NULL,
  `classID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  PRIMARY KEY (`studentID`),
  KEY `class_enrolled` (`classID`),
  KEY `student_info` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `idNumber` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `userType` enum('admin','instructor','student') NOT NULL,
  `status` enum('active','deactivated') NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `school_id` (`idNumber`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `idNumber`, `password`, `firstName`, `middleName`, `lastName`, `userType`, `status`) VALUES
(2, 1234567, '$2y$10$H.O.Z60U4zfQrAJaX9A5numQuZLGdUFPkKeZTuPFmWRDm3aXNtJ6u', 'Admin', 'Super', 'User', 'admin', 'active'),
(3, 2144780, '$2y$10$Wdl9SAN9rNgSFb9RHtk7puZ4eFcVxdJLpxYmZ9zir4R/8fUm56mPy', 'Christian', 'Rafanan', 'Beltran', 'instructor', 'active');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_maker` FOREIGN KEY (`instructorID`) REFERENCES `instructor` (`instructorID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcer` FOREIGN KEY (`instructorID`) REFERENCES `instructor` (`instructorID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_instructor` FOREIGN KEY (`instructorID`) REFERENCES `instructor` (`instructorID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_pusher` FOREIGN KEY (`instructorID`) REFERENCES `instructor` (`instructorID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `user_info` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `activity_questions` FOREIGN KEY (`activityID`) REFERENCES `activity` (`activityID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `activity_record` FOREIGN KEY (`activityID`) REFERENCES `activity` (`activityID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `record_owner` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `class_enrolled` FOREIGN KEY (`classID`) REFERENCES `class` (`classID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `student_info` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
