-- MySQL dump 10.13  Distrib 5.1.58, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: a8305627_rav
-- ------------------------------------------------------
-- Server version	5.1.58
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `allocate_class`
--

DROP TABLE IF EXISTS `allocate_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `allocate_class` (
  `allocateID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `departmentID` int(10) unsigned NOT NULL,
  `courseID` int(10) unsigned NOT NULL,
  `roomID` int(10) unsigned NOT NULL,
  `dayID` int(10) unsigned NOT NULL,
  `startTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`allocateID`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `allocate_class`
--

LOCK TABLES `allocate_class` WRITE;
/*!40000 ALTER TABLE `allocate_class` DISABLE KEYS */;
INSERT INTO `allocate_class` VALUES (60,22,13,1,2,'13:00:00','15:00:00',0),(61,22,13,1,2,'15:10:00','17:00:00',1),(62,22,13,2,3,'13:00:00','16:00:00',1),(63,26,20,1,4,'13:00:00','22:00:00',1);
/*!40000 ALTER TABLE `allocate_class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assing_course`
--

DROP TABLE IF EXISTS `assing_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assing_course` (
  `assingID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `departmentID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `assign_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`assingID`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assing_course`
--

LOCK TABLES `assing_course` WRITE;
/*!40000 ALTER TABLE `assing_course` DISABLE KEYS */;
INSERT INTO `assing_course` VALUES (13,22,17,13,'2014-02-13 19:18:59',0),(14,22,17,14,'2014-02-13 19:21:38',0),(15,23,18,15,'2014-02-13 19:21:59',0),(23,22,16,14,'2014-02-14 15:32:06',0),(27,24,19,17,'2014-02-14 17:28:27',0),(28,24,19,18,'2014-02-14 17:29:09',0),(29,22,17,13,'2014-02-14 18:02:33',0),(30,24,19,17,'2014-02-14 18:06:14',0),(31,25,20,17,'2014-02-18 07:06:35',1),(32,25,20,18,'2014-02-18 07:06:56',1),(33,26,22,20,'2014-02-18 07:13:19',1),(34,26,22,21,'2014-02-18 07:14:27',1);
/*!40000 ALTER TABLE `assing_course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class_room`
--

DROP TABLE IF EXISTS `class_room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class_room` (
  `roomID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `roomNumber` varchar(11) NOT NULL,
  PRIMARY KEY (`roomID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class_room`
--

LOCK TABLES `class_room` WRITE;
/*!40000 ALTER TABLE `class_room` DISABLE KEYS */;
INSERT INTO `class_room` VALUES (1,'room-01'),(2,'room-02'),(3,'room-03'),(4,'room-04'),(5,'room-05'),(6,'room-06'),(7,'room-07'),(8,'room-08'),(9,'room-09'),(10,'room-10');
/*!40000 ALTER TABLE `class_room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `courseID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `credit` float NOT NULL,
  `courseName` varchar(200) NOT NULL,
  `courseDescription` text NOT NULL,
  `departmentID` int(10) unsigned DEFAULT NULL,
  `semesterID` int(10) unsigned NOT NULL,
  `courseDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`courseID`),
  KEY `departmentID` (`departmentID`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (13,'CSE-01',4,'Computer fundamental','this is basic fundamental course',22,1,'2014-02-13 18:14:24'),(14,'CSE-02',5,'c programming','first programming language',22,1,'2014-02-13 18:18:52'),(15,'BBA-01',4,'basic accounting','first acccounting course',23,1,'2014-02-13 18:19:26'),(16,'BBA-02',3,'basic english','first english for bba',23,1,'2014-02-13 18:20:06'),(17,'LLB-01',4,'churi first part','fundamental churi',24,1,'2014-02-13 18:20:41'),(18,'LLB-02',12,'rahajani','batpari first stage',24,1,'2014-02-14 15:33:56'),(19,'phy-001',4,'physics first part','this is a good course',25,1,'2014-02-18 07:04:13'),(20,'chy-001',6,'chemistry first part','first chemistry course',26,1,'2014-02-18 07:11:11'),(21,'chy-002',4,'chemistry second part','tdhfd',26,1,'2014-02-18 07:11:41'),(22,'chy-003',4,'chemistry thirdpart','this is a good course',26,1,'2014-02-18 07:15:29');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courseenroll`
--

DROP TABLE IF EXISTS `courseenroll`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courseenroll` (
  `enroll_ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `courseID` int(10) unsigned NOT NULL,
  `studentID` int(10) unsigned NOT NULL,
  `enrollDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`enroll_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courseenroll`
--

LOCK TABLES `courseenroll` WRITE;
/*!40000 ALTER TABLE `courseenroll` DISABLE KEYS */;
INSERT INTO `courseenroll` VALUES (1,13,1,'2014-02-14 18:26:59'),(2,13,2,'2014-02-14 18:27:22'),(3,14,1,'2014-02-14 18:58:47'),(4,17,2,'2014-02-14 18:59:05'),(5,20,3,'2014-02-18 07:16:52');
/*!40000 ALTER TABLE `courseenroll` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `day`
--

DROP TABLE IF EXISTS `day`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `day` (
  `dayID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dayName` varchar(20) NOT NULL,
  PRIMARY KEY (`dayID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `day`
--

LOCK TABLES `day` WRITE;
/*!40000 ALTER TABLE `day` DISABLE KEYS */;
INSERT INTO `day` VALUES (1,'Ssaturday'),(2,'Sunday'),(3,'Monday'),(4,'Tuseday'),(5,'Wednesday'),(6,'Thursday '),(7,'Friday');
/*!40000 ALTER TABLE `day` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `departmentID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `departmentCode` varchar(50) NOT NULL,
  `departmentName` varchar(100) NOT NULL,
  `departmentCreateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`departmentID`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (22,'cse','Computer Science','2014-02-13 17:56:27'),(23,'bba','Bachaler of Busniess Science','2014-02-13 17:58:00'),(24,'LLB','Bachaler of Law','2014-02-13 18:05:23'),(25,'PHY','physics','2014-02-18 07:03:14'),(26,'CHY','chemistry','2014-02-18 07:10:32');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `designation`
--

DROP TABLE IF EXISTS `designation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `designation` (
  `designationID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `designationName` varchar(100) NOT NULL,
  PRIMARY KEY (`designationID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `designation`
--

LOCK TABLES `designation` WRITE;
/*!40000 ALTER TABLE `designation` DISABLE KEYS */;
INSERT INTO `designation` VALUES (1,'Exeminer'),(2,'Trainer '),(3,'Lecturer'),(4,'Professor');
/*!40000 ALTER TABLE `designation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `great`
--

DROP TABLE IF EXISTS `great`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `great` (
  `greadID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `letter` varchar(5) NOT NULL,
  PRIMARY KEY (`greadID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `great`
--

LOCK TABLES `great` WRITE;
/*!40000 ALTER TABLE `great` DISABLE KEYS */;
INSERT INTO `great` VALUES (1,'A+'),(2,'A'),(3,'A-'),(4,'B+'),(5,'B'),(6,'C'),(7,'D'),(8,'F');
/*!40000 ALTER TABLE `great` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `result` (
  `resultID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `studentID` int(10) unsigned NOT NULL,
  `courseID` int(10) unsigned NOT NULL,
  `greadID` int(10) unsigned NOT NULL,
  `resultDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`resultID`),
  KEY `studentID` (`studentID`),
  KEY `courseID` (`courseID`),
  KEY `greadID` (`greadID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `result`
--

LOCK TABLES `result` WRITE;
/*!40000 ALTER TABLE `result` DISABLE KEYS */;
INSERT INTO `result` VALUES (3,1,13,1,'2014-02-14 18:55:01'),(4,2,17,4,'2014-02-14 18:59:28'),(5,2,13,5,'2014-02-14 18:59:39'),(6,3,20,1,'2014-02-18 07:17:35');
/*!40000 ALTER TABLE `result` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `semester`
--

DROP TABLE IF EXISTS `semester`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `semester` (
  `semesterID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `semesterName` varchar(50) NOT NULL,
  PRIMARY KEY (`semesterID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semester`
--

LOCK TABLES `semester` WRITE;
/*!40000 ALTER TABLE `semester` DISABLE KEYS */;
INSERT INTO `semester` VALUES (1,'Semester 1'),(2,'Semester 2'),(3,'Semester 3'),(4,'Semester 4'),(5,'Semester 5'),(6,'Semester 6'),(7,'Semester 7'),(8,'Semester 8');
/*!40000 ALTER TABLE `semester` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `studentID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `studentRegNO` varchar(200) NOT NULL,
  `studentName` varchar(200) NOT NULL,
  `studentEmail` varchar(200) NOT NULL,
  `studentContact` int(11) NOT NULL,
  `studentAddress` varchar(300) NOT NULL,
  `departmentID` int(10) unsigned NOT NULL,
  `studentAdmitDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`studentID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1,'cse-2014-1','rahim','rahim@gmail.com',909,'dhaka',22,'2014-02-14 17:36:16'),(2,'cse-2014-2','karim','karim@gmail.com',909,'dhaka',22,'2014-02-14 17:37:04'),(3,'CHY-2014-3','saykat','sy@gmail.com',343,'dhaka',26,'2014-02-18 07:16:13');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher` (
  `teacherID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `teacherName` varchar(200) NOT NULL,
  `teacherAddress` text NOT NULL,
  `teacherEmail` varchar(200) NOT NULL,
  `teacherContactNO` int(10) NOT NULL,
  `designationID` int(10) unsigned NOT NULL,
  `departmentID` int(10) unsigned NOT NULL,
  `teacherCredit` int(10) NOT NULL,
  `teacherEntryDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remainingCredit` int(11) DEFAULT '0',
  PRIMARY KEY (`teacherID`),
  KEY `designationID` (`designationID`),
  KEY `departmentID` (`departmentID`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` VALUES (16,'karim ahmed','dhaka','karim@gmail.com',0,2,22,5,'2014-02-14 15:32:06',0),(17,'rahim ','dhaka','rahim@gmail.com',145,2,22,30,'2014-02-13 18:33:07',0),(18,'rustom','khulna','rustom@gmail.com',456,2,23,15,'2014-02-13 18:33:29',0),(19,'pinku ghosh','nawabpur','pinku@gmail.com',34340,3,24,16,'2014-02-14 17:29:09',0),(20,'munna bhi','farmgate','munna@gmail.com',433,2,25,16,'2014-02-18 07:06:56',0),(21,'kkk','sfsdf','kkk@gmail.com',33,2,25,5,'2014-02-18 07:06:09',0),(22,'mehadi','dhanmondi','mahadi@gmail.com',898,2,26,10,'2014-02-18 07:14:27',0);
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-02-18  3:20:41
