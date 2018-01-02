-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 13, 2016 at 08:58 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wcss_iep`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE IF NOT EXISTS `announcements` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`ID`, `heading`, `message`) VALUES
(1, 'Upcoming Grade 12 Vectors Test', 'On May 12th - first test of Vectors.'),
(2, 'Upcoming Grade 9 Geography Test', 'On April 29th - test about rocks.'),
(3, 'Upcoming Grade 9 Music Playing Test', 'On May 3 - students will be expected to play a song from Standard of Excellence.'),
(4, 'Upcoming Grade 11 History Test', 'On May 4 - test about Ancient Egypt.'),
(5, 'Upcoming Grade 12 Physics Test', 'On May 6 - energy and momentum test.'),
(6, 'Upcoming Grade 12 English Test', 'On May 18 - test about Kite Runner and the seminars done in class.'),
(7, 'Upcoming Grade 11 Accounting Test', 'On May 17 - debits equal credits.'),
(8, 'Upcoming Grade 11 Biology Test', 'On May 16 - test about genetics.'),
(9, 'Upcoming Grade 10 Computer Science  Test', 'On May 4 - test about PBasic'),
(10, 'Upcoming Grade 12 Chemistry Test', 'On May 5 - test on Acids and Bases'),
(35, 'here come', 'dat boi'),
(36, 'im on a boat', 'take a good hard look'),
(37, 'ADRIAN', 'ONG'),
(38, 'YOLO', 'the battle cry of a generation'),
(39, 'YEEZY YEZZY', 'wuts gud'),
(40, 'MATH EXAM', 'Testing.'),
(41, 'MATH EXAM', 'Testing.'),
(42, 'MATH EXAM', 'Testing.');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `time` tinytext,
  `student` varchar(30) DEFAULT NULL,
  `roomNumber` int(11) DEFAULT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`ID`, `date`, `time`, `student`, `roomNumber`) VALUES
(70, '2016-06-09', '08:40', 'Preesentation', 121),
(72, '2016-12-30', '12:30', 'Adrian Garner', 123),
(73, '2016-12-01', '22:20', 'Steven Yang', 123);

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE IF NOT EXISTS `assessments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MPM2D_Test` varchar(255) DEFAULT NULL,
  `SCH4U_Test` varchar(255) DEFAULT NULL,
  `SPH4U_Test` varchar(255) DEFAULT NULL,
  `CGC1D_Test` varchar(255) DEFAULT NULL,
  `OSSLT` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `assessments`
--

INSERT INTO `assessments` (`ID`, `MPM2D_Test`, `SCH4U_Test`, `SPH4U_Test`, `CGC1D_Test`, `OSSLT`) VALUES
(2, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL, NULL),
(14, NULL, NULL, NULL, NULL, NULL),
(15, NULL, NULL, NULL, NULL, NULL),
(16, NULL, NULL, NULL, NULL, NULL),
(17, NULL, NULL, NULL, NULL, NULL),
(18, NULL, NULL, NULL, NULL, NULL),
(19, NULL, NULL, NULL, NULL, NULL),
(20, NULL, NULL, NULL, NULL, NULL),
(21, NULL, NULL, NULL, NULL, NULL),
(22, NULL, NULL, NULL, NULL, NULL),
(23, NULL, NULL, NULL, NULL, NULL),
(24, NULL, NULL, NULL, NULL, NULL),
(25, NULL, NULL, NULL, NULL, NULL),
(26, NULL, NULL, NULL, NULL, NULL),
(27, NULL, NULL, NULL, NULL, NULL),
(28, NULL, NULL, NULL, NULL, NULL),
(29, NULL, NULL, NULL, NULL, NULL),
(30, NULL, NULL, NULL, NULL, NULL),
(31, NULL, NULL, NULL, NULL, NULL),
(32, NULL, NULL, NULL, NULL, NULL),
(33, NULL, NULL, NULL, NULL, NULL),
(34, NULL, NULL, NULL, NULL, NULL),
(35, NULL, NULL, NULL, NULL, NULL),
(36, ' 199837006;123;2016-12-30;12:30;Quiet Setting ', NULL, NULL, NULL, NULL),
(37, ' 199837009;456;2016-12-30;12:30;Computer ', NULL, NULL, NULL, NULL),
(38, NULL, NULL, NULL, NULL, ' 199837000;123;2016-12-30;12:30;Chunking, Prompting '),
(39, NULL, NULL, NULL, NULL, ' 199837006;456;2017-12-03;22:20;Quiet Setting '),
(40, NULL, NULL, NULL, NULL, ' 199837027;1;2017-04-30;21:00;Anxiety Reducers, Quiet Setting '),
(41, ' 199837000;123;2016-12-30;12:30;Chunking, Prompting ', NULL, NULL, NULL, NULL),
(42, NULL, NULL, NULL, ' 199837000;123;2016-12-30;12:30;Prompting ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `basicStudentInfo`
--

CREATE TABLE IF NOT EXISTS `basicStudentInfo` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `grade` varchar(2) NOT NULL,
  `Homeroom Teacher` varchar(1000) NOT NULL,
  `mailingaddress` varchar(50) NOT NULL,
  `iprc` tinyint(1) NOT NULL,
  `sea` varchar(11) DEFAULT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `basicStudentInfo`
--

INSERT INTO `basicStudentInfo` (`ID`, `fname`, `lname`, `dob`, `grade`, `Homeroom Teacher`, `mailingaddress`, `iprc`, `sea`) VALUES
(1, 'Erik', 'Karlsson', '1998-03-21', '12', 'Mr. Emmell', '1111 The Road', 1, 'Pending'),
(2, 'Billy', 'Bob', '1999-01-01', '11', 'Mr. West', '1223 March Road', 1, 'Pending'),
(3, 'Shmoe', 'Joe', '2001-04-01', '9', 'Mr. Luc', '5639 Maple Road', 1, 'Pending'),
(4, 'Kanye', 'West', '2000-08-19', '10', 'Mr. Jay-Z', '99 Elm Street', 1, 'Pending'),
(5, 'Mark', 'Stone', '1998-08-09', '12', 'Mrs. Knowles', '1243 Palladium Drive', 0, 'Approved'),
(6, 'Ilya', 'Bryzgalov', '2000-04-12', '10', 'Mr. Universe', '1324 Humongous Big Road', 0, 'Pending'),
(7, 'Frank', 'Ocean', '1998-05-02', '12', 'Mr. West', '1234 Le Road', 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `exceptionalities`
--

CREATE TABLE IF NOT EXISTS `exceptionalities` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `exceptionalities` varchar(250) NOT NULL,
  `other` varchar(250) DEFAULT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `exceptionalities`
--

INSERT INTO `exceptionalities` (`ID`, `exceptionalities`, `other`) VALUES
(1, 'ADHD,Anxiety', NULL),
(2, 'BLV,DHH', NULL),
(3, 'Language Impairment,MID', NULL),
(4, 'Speech Impairment,Gifted', NULL),
(5, 'BLV,LD', NULL),
(6, 'ADHD', NULL),
(7, 'Language Impairment,MID', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provincialAssessments`
--

CREATE TABLE IF NOT EXISTS `provincialAssessments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `assessmentName` varchar(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `roomNumber` int(11) DEFAULT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `provincialAssessments`
--

INSERT INTO `provincialAssessments` (`ID`, `assessmentName`, `date`, `roomNumber`) VALUES
(1, NULL, NULL, NULL),
(2, NULL, NULL, NULL),
(3, 'EQAO', '2016-04-21 15:00:00', 213),
(4, 'OSSLT', '2016-04-28 12:30:00', 415),
(5, NULL, NULL, NULL),
(6, 'OSSLT', '2016-04-26 08:00:00', 123);

-- --------------------------------------------------------

--
-- Table structure for table `studentClassesExams`
--

CREATE TABLE IF NOT EXISTS `studentClassesExams` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `s1p1examdate` datetime DEFAULT NULL,
  `s1p1roomnumber` int(11) DEFAULT NULL,
  `s1p2examdate` datetime DEFAULT NULL,
  `s1p2roomnumber` int(11) DEFAULT NULL,
  `s1p3examdate` datetime DEFAULT NULL,
  `s1p3roomnumber` int(11) DEFAULT NULL,
  `s1p4examdate` datetime DEFAULT NULL,
  `s1p4roomnumber` int(11) DEFAULT NULL,
  `s2p1examdate` datetime DEFAULT NULL,
  `s2p1roomnumber` int(11) DEFAULT NULL,
  `s2p2examdate` datetime DEFAULT NULL,
  `s2p2roomnumber` int(11) DEFAULT NULL,
  `s2p3examdate` datetime DEFAULT NULL,
  `s2p3roomnumber` int(11) DEFAULT NULL,
  `s2p4examdate` datetime DEFAULT NULL,
  `s2p4roomnumber` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `studentClassesExams`
--

INSERT INTO `studentClassesExams` (`ID`, `s1p1examdate`, `s1p1roomnumber`, `s1p2examdate`, `s1p2roomnumber`, `s1p3examdate`, `s1p3roomnumber`, `s1p4examdate`, `s1p4roomnumber`, `s2p1examdate`, `s2p1roomnumber`, `s2p2examdate`, `s2p2roomnumber`, `s2p3examdate`, `s2p3roomnumber`, `s2p4examdate`, `s2p4roomnumber`) VALUES
(1, '2016-01-26 08:00:00', 666, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-06-22 08:00:00', 432, '2016-06-23 08:00:00', 111, NULL, NULL),
(2, '2016-01-25 08:00:00', 102, '2016-01-26 08:00:00', 213, NULL, NULL, NULL, NULL, '2016-06-23 08:00:00', 321, NULL, NULL, '2016-06-24 08:00:00', 211, NULL, NULL),
(3, '2016-01-25 08:00:00', 222, '2016-01-26 08:00:00', 230, NULL, NULL, NULL, NULL, '2016-06-20 08:00:00', 222, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2016-01-27 08:00:00', 211, '2016-01-28 08:00:00', 111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-06-23 08:00:00', 200),
(5, '2016-01-26 08:00:00', 666, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-06-22 08:00:00', 432, '2016-06-23 08:00:00', 111, NULL, NULL),
(6, '2016-01-27 08:00:00', 211, '2016-01-28 08:00:00', 111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-06-23 08:00:00', 200);

-- --------------------------------------------------------

--
-- Table structure for table `studentClassesInfo`
--

CREATE TABLE IF NOT EXISTS `studentClassesInfo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `s1p1code` varchar(25) DEFAULT NULL,
  `s1p1teacher` varchar(25) DEFAULT NULL,
  `s1p2code` varchar(25) DEFAULT NULL,
  `s1p2teacher` varchar(25) DEFAULT NULL,
  `s1p3code` varchar(25) DEFAULT NULL,
  `s1p3teacher` varchar(25) DEFAULT NULL,
  `s1p4code` varchar(25) DEFAULT NULL,
  `s1p4teacher` varchar(25) DEFAULT NULL,
  `s2p1code` varchar(25) DEFAULT NULL,
  `s2p1teacher` varchar(25) DEFAULT NULL,
  `s2p2code` varchar(25) DEFAULT NULL,
  `s2p2teacher` varchar(25) DEFAULT NULL,
  `s2p3code` varchar(25) DEFAULT NULL,
  `s2p3teacher` varchar(25) DEFAULT NULL,
  `s2p4code` varchar(25) DEFAULT NULL,
  `s2p4teacher` varchar(25) DEFAULT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `studentClassesInfo`
--

INSERT INTO `studentClassesInfo` (`ID`, `s1p1code`, `s1p1teacher`, `s1p2code`, `s1p2teacher`, `s1p3code`, `s1p3teacher`, `s1p4code`, `s1p4teacher`, `s2p1code`, `s2p1teacher`, `s2p2code`, `s2p2teacher`, `s2p3code`, `s2p3teacher`, `s2p4code`, `s2p4teacher`) VALUES
(1, 'MHF4U', 'Mr. West', 'SCH4U', 'Mr. West', 'SPH4U', 'Mr. West', NULL, NULL, 'ICS4U', 'Mr. West', 'MCV4U', 'Mr. West', 'ENG4U', 'Mr. West', NULL, NULL),
(2, 'MHF3U', 'Mr. Cena', 'ENG3U', 'Mr. Cena', 'SCH3U', 'Mr. Cena', 'SPH3U', 'Mr. Cena', 'BAF3M', 'Mr. Cena', 'ICS3U', 'Mr. Cena', 'CHW3M', 'Mr. Cena', 'SBI3U', 'Mr. Cena'),
(3, 'MPM1D', 'Mr. Sanders', 'ENG1D', 'Mr. Trump', 'FSF1D', 'Mrs. Clinton', 'SNC1D', 'Mr. Cruz', 'CGC1D', 'Mr. Trump', 'AMU1O', 'Mrs. Clinton', 'BTT1O', 'Mr. Cruz', 'PPL1OQ', 'Mr. Sanders'),
(4, 'MPM2D', 'Mrs. Knowles', 'ENG2D', 'Mr. Carter', 'GLC2O/CHV2O', 'Mrs. Grande', 'AMU2O', 'Mrs. Swift', 'FSF2D', 'Mr. Mars', 'ICS2O', 'Mr. West', 'SNC2D', 'Mrs. Gomez', 'CHC2D', 'Mrs. Kachingwe'),
(5, 'MHF4U', 'Mr. West', 'SCH4U', 'Mr. West', 'SPH4U', 'Mr. West', NULL, NULL, 'ICS4U', 'Mr. West', 'MCV4U', 'Mr. West', 'ENG4U', 'Mr. West', NULL, NULL),
(6, 'MPM2D', 'Mrs. Knowles', 'ENG2D', 'Mr. Carter', 'GLC2O/CHV2O', 'Mrs. Grande', 'AMU2O', 'Mrs. Swift', 'FSF2D', 'Mr. Mars', 'ICS2O', 'Mr. West', 'SNC2D', 'Mrs. Gomez', 'CHC2D', 'Mrs. Kachingwe');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE IF NOT EXISTS `studentinfo` (
  `Student` varchar(255) DEFAULT NULL,
  `Student_No` varchar(255) DEFAULT NULL,
  `Date_of_Birth` varchar(255) DEFAULT NULL,
  `Mailing_Address` varchar(255) DEFAULT NULL,
  `Grade` varchar(255) DEFAULT NULL,
  `A` varchar(255) DEFAULT NULL,
  `B` varchar(255) DEFAULT NULL,
  `C` varchar(255) DEFAULT NULL,
  `D` varchar(255) DEFAULT NULL,
  `AFT1` varchar(255) DEFAULT NULL,
  `EL` varchar(255) DEFAULT NULL,
  `AMR` varchar(255) DEFAULT NULL,
  `AMD1` varchar(255) DEFAULT NULL,
  `AMD2` varchar(255) DEFAULT NULL,
  `AMD3` varchar(255) DEFAULT NULL,
  `Accommodations` varchar(255) DEFAULT NULL,
  `Exceptionalities` varchar(255) DEFAULT NULL,
  `IPRC` varchar(255) DEFAULT NULL,
  `SEA` varchar(255) DEFAULT NULL,
  `E` varchar(255) DEFAULT NULL,
  `F` varchar(255) DEFAULT NULL,
  `G` varchar(255) DEFAULT NULL,
  `H` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`Student`, `Student_No`, `Date_of_Birth`, `Mailing_Address`, `Grade`, `A`, `B`, `C`, `D`, `AFT1`, `EL`, `AMR`, `AMD1`, `AMD2`, `AMD3`, `Accommodations`, `Exceptionalities`, `IPRC`, `SEA`, `E`, `F`, `G`, `H`) VALUES
('Garner, Adrian', '199837000', '3/21/1998', '1111 The Road', '10', 'P6:CHC2D.-01:Belcher,Dave', '114:FSF2D.-01:Woods,Julia', 'GYMA:PPL2OP-01:Thomson,Ashley', 'P10:ENG2D.-09:Staff,John', '', '', '', '', '', '', 'Chunking:Prompting:Repetition', 'Speech Impairment:Gifted', '1', 'Pending', '207:SNC2D.-02:Goodson,Shauna', '119:HFN2O.-02:McConnell,Susan', 'P18:CHV2O.-06:Curtis,Heidi/P18:GLC2O.-06:Curtis,Heidi', '116:MPM2D.-06:Thompson,Debra'),
('Mayo, Kyla', '199837003', '3/22/1998', '1112 The Road', '10', '144:AMG2O.-01:Emond,Peter', '229:CHC2D.-03:Matthews,Victoria', '207:SNC2D.-03:Hyndman,Courtney', '213:MFM2P.-03:Bourassa,Mary', '', '', '', '', '', '', 'Strategic Seating:Organizational Coaching:Time Management Aids', 'Language Impairment:MID', '1', 'Pending', '114:FSF2D.-02:Woods,Julia', 'P10:ENG2P.-02:Staff,John', 'P18:CHV2O.-06:Curtis,Heidi/P18:GLC2O.-06:Curtis,Heidi', '228:ICS2O.-02:Murray,Graham'),
('Yang, Steven', '199837006', '3/21/1998', '1111 The Road', '10', '114:LWSBD.-01:Woods,Julia', '119:HFN2OF-01:Larue,Vanessa', 'P7:ENG2D.-05:Wattie,Sarah', '214:MPM2D.-07:Emmell,Stephen', '', '', '', '', '', '', 'Anxiety Reducers:Quiet Setting:Assistive Technology', 'ADHD:Anxiety', '1', 'Pending', 'P8:CHC2DF-02:Bailey,Mark', '230:SNC2DF-03:Canham,Amanda', '120:CHV2OF-04:Roberts,Adam/120:GLC2OF-04:Roberts,Adam', '115:FIF2D.-04:Rose,Erin'),
('Case, Malcolm', '199837009', '3/22/1998', '1112 The Road', '10', '207:SNC2D.-01:Cutts,John', '217:MPM2D.-03:Gilby,Kara', 'GYMA:PPL2OP-01:Thomson,Ashley', '229:CHC2D.-05:Matthews,Victoria', '', '', '', '', '', '', 'Computer:Chunking', 'BLV:DHH', '1', 'Pending', 'P18:CHV2O.-02:Curtis,Heidi/P18:GLC2O.-02:Curtis,Heidi', '147:ADA2O.-01:Blakely,Aaron', '229:CHW3M.-02:Matthews,Victoria', 'P7:ENG2D.-10:Wattie,Sarah'),
('Owen, Kellie', '199837012', '3/21/1998', '1111 The Road', '11', '231:SPH3U.-01:Murray,Graham', '132:AWQ4M.-01:Kinney,Sarah', 'P16:HSP3U.-01:Elliott,Mark', '202:SCH3U.-03:Code,William', '', '', '', '', '', '', 'Chunking:Prompting:Repetition', 'Speech Impairment:Gifted', '1', 'Pending', 'P5:BAF3M.-01:Burns,John', '205:SBI3U.-02:Lay,Katrina', 'P10:ENG3U.-06:Staff,John', '117:MCR3U.-06:Shrestha,Maya'),
('Armstrong, Gil', '199837015', '3/22/1998', '1112 The Road', '9', '146:AVI1OF-01:Heagle,Sarah', 'P15:FIF1D.-01:Mountenay,Greg', '120:BTT1OF-01:Clare,Ryan', 'P17:MPM1D.-09:Anderson,Kelly', '', '', '', '', '', '', 'Strategic Seating:Organizational Coaching:Time Management Aids', 'Language Impairment:MID', '1', 'Pending', '213:ENG1D.-02:Papadakis,Jenny', '112:CGC1DF-02:Brule,Lise', '230:SNC1DF-02:Aubrey,Kimberly', 'GYMB:PPL1OQ-08:Battye,James'),
('Kirkland, Iola', '199837018', '3/21/1998', '1111 The Road', '9', '101:TGJ1O.-01:Reimer,Gordon', 'P2:FSF1D.-01:Lenz,Heidi', '143:AVI1O.-05:Heagle,Sarah', '212:ENG1D.-09:Robinson,Brenda', '', '', '', '', '', '', 'Anxiety Reducers:Quiet Setting:Assistive Technology', 'ADHD:Anxiety', '1', 'Pending', 'P17:MPM1D.-04:Anderson,Kelly', 'P9:CGC1D.-08:Richardson,Colin', '208:SNC1D.-06:Olenick,Jennifer', 'GYMC:PPL1OP-07:Labelle,Jennifer'),
('Colon, Quon', '199837021', '3/22/1998', '1112 The Road', '9', '208:SNC1D.-01:Osborne,Mitchell', '147:ADA1O.-01:Mathers-Hoogenraad,Kelly/147:ADA1O.-01:Smith,Adam', 'P14:MPM1D.-07:Pert,Michelle', '130:TIJ1O.-03:Killoran,Blair', '', '', '', '', '', '', 'Chunking:Prompting:Repetition', 'BLV:DHH', '1', 'Pending', '113:FSF1D.-02:Carrier,Rachelle', 'GYMB:PPL1OQ-04:Ashton,Andrew', 'P13:CGC1D.-06:Lovatt,Andrew', 'P10:ENG1D.-12:Staff,John'),
('Burton, Tate', '199837024', '3/21/1998', '1111 The Road', '12', '214:MHF4U.-01:Menna,Francine', '231:SPH4U.-01:Ferguson,Robert', 'STU:ATC3M/4M.-01:Hauch,Alison', 'P2:FIF4U.-03:Lenz,Heidi', '', '', '', '', '', '', 'Strategic Seating:Organizational Coaching:Time Management Aids', 'Speech Impairment:Gifted', '1', 'Pending', 'P12:ENG4U.-02:Nolan,Janet', '204:SCH4U.-04:Code,William', '', '217:MCV4U.-04:Gilby,Kara'),
('Fuentes, Isabelle', '199837027', '3/22/1998', '1112 The Road', '10', 'P16:CHV2O.-01:Elliott,Mark/P16:GLC2O.-01:Elliott,Mark', '220:ENG2D.-03:Britton,Jennifer', '119:HFN2O.-01:McConnell,Susan', '213:MFM2P.-03:Bourassa,Mary', '', '', '', '', '', '', 'Anxiety Reducers:Quiet Setting:Assistive Technology', 'Language Impairment:MID', '1', 'Pending', '114:FSF2D.-02:Woods,Julia', '147:ADA2O.-01:Blakely,Aaron', '207:SNC2D.-06:McGartland,Roisin', 'P13:CHC2D.-06:Lovatt,Andrew');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `ENG2D_Test` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
