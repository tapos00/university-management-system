-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 08, 2014 at 08:12 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `university_management_system`
--
CREATE DATABASE IF NOT EXISTS `university_management_system` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `university_management_system`;

-- --------------------------------------------------------

--
-- Table structure for table `assing_course`
--

CREATE TABLE IF NOT EXISTS `assing_course` (
  `assingID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `departmentID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `assign_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`assingID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `assing_course`
--

INSERT INTO `assing_course` (`assingID`, `departmentID`, `teacherID`, `courseID`, `assign_Date`) VALUES
(1, 3, 4, 3, '2014-02-08 04:30:54'),
(2, 2, 5, 7, '2014-02-08 04:30:54'),
(9, 2, 8, 2, '2014-02-08 04:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `courseID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `credit` float NOT NULL,
  `courseName` varchar(200) NOT NULL,
  `courseDescription` text NOT NULL,
  `departmentID` int(10) unsigned DEFAULT NULL,
  `semesterID` int(10) unsigned NOT NULL,
  `courseDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`courseID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseID`, `code`, `credit`, `courseName`, `courseDescription`, `departmentID`, `semesterID`, `courseDate`) VALUES
(2, 'BBA-01', 4, 'Busniess', 'Busniess class', 3, 8, '2014-02-03 20:07:43'),
(3, 'CSE-01', 4, 'Computer', 'computer in most inportent', 2, 5, '2014-02-03 21:07:04'),
(4, 'LLB-01', 6, 'Law', 'law class', 4, 7, '2014-02-03 21:07:29'),
(5, 'LLM-01', 6, 'master of law', 'master', 4, 8, '2014-02-04 18:50:25'),
(6, 'BSC-01', 10, 'science', 'general science', 15, 6, '2014-02-04 19:36:00'),
(7, 'ILTS-01', 7, 'English Learn ', 'English Listen, Talk and Writing Course', 14, 6, '2014-02-06 19:25:23'),
(8, 'CSE-02', 6, 'Computer course', 'computer in most inportent', 2, 5, '2014-02-06 19:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `departmentID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `departmentCode` varchar(50) NOT NULL,
  `departmentName` varchar(100) NOT NULL,
  `departmentCreateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`departmentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentID`, `departmentCode`, `departmentName`, `departmentCreateDate`) VALUES
(2, 'CSE', 'Computer Science', '2014-02-01 21:18:42'),
(3, 'BBA', 'Bleacher of Arts ', '2014-02-01 21:20:14'),
(4, 'LLB', 'Bleacher of Law', '2014-02-01 21:21:21'),
(10, 'MSC', 'Master Of Computer Science', '2014-02-02 08:07:01'),
(11, 'LLM', 'Master Of Law', '2014-02-02 18:48:20'),
(12, 'BBS', 'Bachaler of Busniess Science', '2014-02-02 19:13:08'),
(13, 'jjb', 'Computer Science', '2014-02-02 19:34:46'),
(14, 'BBA', 'sfsfsfsd', '2014-02-02 19:39:05'),
(15, 'yyy', 'zzzz', '2014-02-02 19:40:25');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `designationID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `designationName` varchar(100) NOT NULL,
  PRIMARY KEY (`designationID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`designationID`, `designationName`) VALUES
(1, 'Exeminer'),
(2, 'Trainer '),
(3, 'Lecturer'),
(4, 'Professor');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `semesterID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `semesterName` varchar(50) NOT NULL,
  PRIMARY KEY (`semesterID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semesterID`, `semesterName`) VALUES
(1, 'Semester 1'),
(2, 'Semester 2'),
(3, 'Semester 3'),
(4, 'Semester 4'),
(5, 'Semester 5'),
(6, 'Semester 6'),
(7, 'Semester 7'),
(8, 'Semester 8');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacherID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `teacherName` varchar(200) NOT NULL,
  `teacherAddress` text NOT NULL,
  `teacherEmail` varchar(200) NOT NULL,
  `teacherContactNO` int(10) NOT NULL,
  `designationID` int(10) unsigned NOT NULL,
  `departmentID` int(10) unsigned NOT NULL,
  `teacherCredit` int(10) NOT NULL,
  `remainingCredit` int(11) NOT NULL,
  `teacherEntryDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`teacherID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherID`, `teacherName`, `teacherAddress`, `teacherEmail`, `teacherContactNO`, `designationID`, `departmentID`, `teacherCredit`, `remainingCredit`, `teacherEntryDate`) VALUES
(1, 'tapos', 'nawabpur', 'tapos@gmail.com', 123456789, 2, 2, 30, 0, '2014-02-05 18:57:18'),
(4, 'monir', 'nawabpur', 'monir@gmail.com', 191662979, 4, 11, 15, 3, '2014-02-05 18:57:18'),
(5, 'Sanjib', 'dhaka', 'sanjib@gmail.com', 1756307427, 2, 3, 20, 5, '2014-02-05 18:57:18'),
(6, 'Rafiq', 'motijeel', 'rofiq@yahoo.com', 12455, 3, 10, 6, 0, '2014-02-06 21:14:14'),
(7, 'Omar', 'Dolipar', 'omar@gmail.com', 124578, 1, 11, 8, 0, '2014-02-06 21:15:26'),
(8, 'sumon', 'nawabpur', 'sumon@gmail.com', 12458, 2, 2, 5, 0, '2014-02-06 21:16:11'),
(9, 'Nipun', 'santinagar', 'nipun@gmail.com', 24587, 3, 2, 9, 0, '2014-02-06 21:16:49');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
