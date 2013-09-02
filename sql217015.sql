-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: sql2.freemysqlhosting.net
-- Generation Time: Aug 26, 2013 at 10:32 AM
-- Server version: 5.5.32-0ubuntu0.12.04.1
-- PHP Version: 5.3.26

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sql217015`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `accounttype_ID` int(11) NOT NULL,
  `createTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accountstatus` varchar(30) NOT NULL DEFAULT 'pending',
  `onlinestatus` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `accountType_ID` (`accounttype_ID`),
  KEY `accountType_ID_2` (`accounttype_ID`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `accounttype_ID`, `createTime`, `accountstatus`, `onlinestatus`) VALUES
(1, 'alan_tang', '123', 'alan@mail', 'Alan', 'Tang', 3, '2013-08-19 03:48:53', 'approved', 'online'),
(2, 'richard-lam', '123', 'contactus@f-secure.com', 'Richard', 'Lam', 2, '2013-08-19 03:49:59', 'approved', 'offline'),
(3, 'senopy', '123', 'senopy@mail', 'Senopy', 'Chew', 1, '2013-08-19 03:50:43', 'approved', 'offline'),
(15, 'bryanyim', '123123', 'a@f', 'Bryan', 'Yim', 2, '2013-08-24 01:03:26', 'pending', 'offline'),
(16, 'superman', '123123', 's@r', 'Super', 'Man', 1, '2013-08-24 06:13:42', 'APPROVED', 'offline'),
(18, 'yongling', '123123', 'yongling@mail', 'yong', 'ling', 1, '2013-08-25 10:53:41', 'APPROVED', 'offline'),
(20, 'spiderman', '123123', 'alan_98797@Hotmail.com', 'spider', 'man', 1, '2013-08-26 07:04:07', 'APPROVED', 'offline'),
(21, 'iamPM', '123123', 'alan_98797@Hotmail.com', 'iam', 'pm', 1, '2013-08-26 07:11:37', 'PENDING', 'offline'),
(22, 'qianni', '123456', 'qianni526@hotmail.my', 'Qian Ni', 'Ea', 1, '2013-08-26 07:23:35', 'APPROVED', 'offline');

-- --------------------------------------------------------

--
-- Table structure for table `accounttype`
--

CREATE TABLE IF NOT EXISTS `accounttype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `accounttype`
--

INSERT INTO `accounttype` (`id`, `type`) VALUES
(1, 'jobseeker'),
(2, 'employer'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_ID` varchar(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `account_ID`, `firstname`, `lastname`) VALUES
(1, '1', 'Alan', 'Tang');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_ID` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `website` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `overview` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `website`, `phone`, `fax`, `overview`) VALUES
(1, 'F-SECURE CORPORATION (M) SDN BHD', 'Tower 3A, Avenue 3, Bangsar South, No. 8, Jalan Kerinchi, Kuala Lumpur', 'www.f-secure.com', '+603-22460213', '+603-22460213', 'F-Secure Corporation (formerly Data Fellows) is an anti-virus, cloud content and computer security company based in Helsinki, Finland. The company has 20 country offices and a presence in more than 100 countries, with Security Lab operations in Helsinki, Finland and in Kuala Lumpur, Malaysia. Through more than 200 operator partners globally, millions of broadband customer use F-Secure services. F-Secure Corp. is publicly traded on the Helsinki Stock Exchange under the symbol FSC1V.\r\nF-Secure claims that it was the first antivirus vendor to establish a presence on the World Wide Web. The F-Secure Labs weblog tracks global internet and mobile security threats.\r\nF-Secure competes in the antivirus industry against Avira, BullGuard, Frisk, Kaspersky, McAfee, Sophos, Symantec, Trend Micro among others.\r\nF-Secure has been listed twice, 2003 and 2006, on "Finland''s best places to work" list published by Great Place to Work® Institute, Inc. Technology Academy of Finland named Pirkka Palomäki, F-Secure''s Chief Technology Officer, as CTO of the Year 2011.'),
(2, 'IOI Properties Bhd', 'IOI Johor', 'IOI.com', '+605-3333333', '+605-3333332', 'IOI johor details');

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE IF NOT EXISTS `employer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_ID` int(11) NOT NULL,
  `position` varchar(100) NOT NULL,
  `company_ID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`id`, `account_ID`, `position`, `company_ID`) VALUES
(1, 2, 'HR executive', 1),
(7, 15, 'HR', 1);

-- --------------------------------------------------------

--
-- Table structure for table `f0`
--

CREATE TABLE IF NOT EXISTS `f0` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `section` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `threadnum` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `f0`
--

INSERT INTO `f0` (`id`, `section`, `description`, `threadnum`) VALUES
(10, 'dun delete', 'eerererererere', 0),
(38, 'Enter New Section Title Here', 'Enter Description Here', 0),
(43, 'fdfdf', 'dfdfd', 0),
(48, 'dsfsd', 'sdfsdfs', 0),
(49, 'test', 'ssss', 0);

-- --------------------------------------------------------

--
-- Table structure for table `f1`
--

CREATE TABLE IF NOT EXISTS `f1` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `uid` varchar(200) NOT NULL,
  `aid` int(20) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(200) NOT NULL,
  `views` varchar(200) NOT NULL,
  `f0id` int(20) NOT NULL,
  `postnum` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `f1`
--

INSERT INTO `f1` (`id`, `title`, `type`, `uid`, `aid`, `content`, `datetime`, `status`, `views`, `f0id`, `postnum`) VALUES
(4, ' Important Notice: The JobStreet.com Malaysia website will be unavailable from Sat 9 Mar, 6pm to Sun 10 Mar, 4am', '', '1', 0, 'Dear Jobseekers,  Important Notice: The JobStreet.com Malaysia website (www.jobstreet.com.my) will be unavailable from 6.00pm on Saturday (09 March 2013) while we make upgrades to improve our service to you. We''ll return around 4.00am on Sunday (10 March 2013).   We apologize for any inconvenience caused and we appreciate your patience.  Best regards, JobStreet.com', '2013-08-25 14:03:23', 'normal', '', 10, 0),
(5, 'Question about Unsuccessful application', '', '2', 0, 'Hello I applied for a Job, and got an Unsuccesful result, even after meeting all qualifications. I f I update my CV/Resume (in my case more hours asa Pilot), can I apply again ? Seems that system doesnt allow to do it Thanks Jose', '2013-08-25 14:03:25', 'sticky', '', 10, 0),
(6, 'dfddfsdfsfsdfsdfsfsfsfsfsdfsfsdfsfsdfsfsfsf', '', '3', 0, 'testcontent3', '2013-08-25 14:03:28', 'normal', '', 2, 0),
(7, '38-1', '', '4', 0, 'test', '2013-08-25 14:03:30', '', '', 38, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f2`
--

CREATE TABLE IF NOT EXISTS `f2` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `f1id` int(20) NOT NULL,
  `uid` int(20) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `f2`
--

INSERT INTO `f2` (`id`, `f1id`, `uid`, `content`, `datetime`, `status`) VALUES
(1, 4, 1, 'happy', '2013-07-30 16:39:49', ''),
(2, 4, 1, 'wtf?', '2013-07-30 16:43:35', ''),
(3, 5, 2, 'ggfdfgd', '2013-08-18 14:25:36', '');

-- --------------------------------------------------------

--
-- Table structure for table `jobapplication`
--

CREATE TABLE IF NOT EXISTS `jobapplication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jobs_ID` int(11) NOT NULL,
  `jobSeeker_ID` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jobSpecialization_ID` int(11) NOT NULL,
  `employer_ID` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(50) NOT NULL,
  `position` varchar(100) NOT NULL,
  `responsibility` varchar(5000) NOT NULL,
  `requirement` varchar(5000) NOT NULL,
  `location` varchar(50) NOT NULL,
  `salary` int(11) NOT NULL,
  `experience` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `jobSpecialization_ID`, `employer_ID`, `date`, `title`, `position`, `responsibility`, `requirement`, `location`, `salary`, `experience`, `status`) VALUES
(1, 17, 1, '2013-08-18', 'Software Engineer (Junior)', '', 'do development n fix bug', 'basic knowledge of java, html, css, javascript', 'Kuala Lumpur ', 2500, 1, 'APPROVED');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

CREATE TABLE IF NOT EXISTS `jobseeker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_ID` int(11) NOT NULL,
  `matric` varchar(10) NOT NULL,
  `resume_ID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `jobseeker`
--

INSERT INTO `jobseeker` (`id`, `account_ID`, `matric`, `resume_ID`) VALUES
(3, 8, '123123', 0),
(4, 16, 'wek13123', 0),
(5, 18, 'asd123123', 0),
(7, 20, '123123', 0),
(8, 21, 'qwe', 0),
(9, 22, 'WEK110013', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobspecialization`
--

CREATE TABLE IF NOT EXISTS `jobspecialization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specialization` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `jobspecialization`
--

INSERT INTO `jobspecialization` (`id`, `specialization`) VALUES
(1, 'Accounting'),
(2, 'Banking/Finance'),
(5, 'Design'),
(6, 'Education'),
(8, 'Beauty Care/Health'),
(9, 'Building'),
(16, 'Engineering'),
(17, 'Computer Science/Information Technology'),
(18, 'Hospitality'),
(19, 'Insurance'),
(20, 'Media & Advertising'),
(21, 'Property'),
(22, 'Sales, CS & Business Devpt'),
(23, 'Science, Lab, R&D'),
(24, 'Telecomm'),
(25, 'Transportation & Logistics'),
(26, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `loginlog`
--

CREATE TABLE IF NOT EXISTS `loginlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_ID` varchar(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `loginlog`
--

INSERT INTO `loginlog` (`id`, `account_ID`, `time`) VALUES
(1, '2', '2013-08-20 09:37:13'),
(4, '2', '2013-08-24 00:22:00'),
(5, '2', '2013-08-24 00:25:49'),
(6, '2', '2013-08-24 00:31:36'),
(7, '2', '2013-08-24 00:33:17'),
(8, '2', '2013-08-24 00:33:34'),
(9, '15', '2013-08-24 01:03:48'),
(10, '15', '2013-08-24 01:04:04'),
(11, '16', '2013-08-24 06:13:53'),
(12, '16', '2013-08-24 06:14:32'),
(13, '17', '2013-08-24 06:18:32'),
(14, '2', '2013-08-24 07:45:26'),
(15, '2', '2013-08-24 15:05:47'),
(16, '1', '2013-08-24 18:46:00'),
(17, '1', '2013-08-25 10:08:34'),
(18, '1', '2013-08-25 10:08:44'),
(19, '2', '2013-08-25 10:09:55'),
(20, '2', '2013-08-25 10:10:53'),
(21, '2', '2013-08-25 10:11:06'),
(22, '18', '2013-08-25 10:54:14'),
(23, '1', '2013-08-25 10:54:34'),
(24, '2', '2013-08-25 10:54:59'),
(25, '18', '2013-08-25 10:55:19'),
(26, '18', '2013-08-25 10:57:09'),
(27, '18', '2013-08-25 10:58:08'),
(28, '18', '2013-08-25 11:00:55'),
(29, '18', '2013-08-25 11:03:51'),
(30, '18', '2013-08-25 11:04:33'),
(31, '18', '2013-08-25 11:04:56'),
(32, '1', '2013-08-25 11:11:35'),
(33, '18', '2013-08-25 11:13:30'),
(34, '1', '2013-08-25 11:25:10'),
(35, '1', '2013-08-25 12:13:53'),
(36, '1', '2013-08-26 06:01:18'),
(37, '1', '2013-08-26 06:38:49'),
(38, '1', '2013-08-26 06:39:57'),
(39, '1', '2013-08-26 06:40:41'),
(40, '1', '2013-08-26 07:20:24'),
(41, '1', '2013-08-26 07:26:29'),
(42, '22', '2013-08-26 07:28:58'),
(43, '22', '2013-08-26 07:32:34'),
(44, '22', '2013-08-26 07:35:58'),
(45, '20', '2013-08-26 07:43:31'),
(46, '1', '2013-08-26 09:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_ID` int(11) NOT NULL,
  `receiver_ID` int(11) NOT NULL,
  `header` varchar(100) NOT NULL,
  `content` varchar(500) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `sender_ID`, `receiver_ID`, `header`, `content`, `time`, `status`) VALUES
(1, 2, 1, '', 'halo', '2013-08-25 09:03:23', 'not seen'),
(2, 3, 1, '', 'belo', '2013-08-25 09:03:23', 'not seen'),
(3, 3, 1, '', 'asdasd', '2013-08-25 09:03:51', 'not seen'),
(4, 2, 1, '', 'lkjlkjlkj', '2013-08-25 09:03:51', 'not seen'),
(5, 1, 3, '', 'bye', '2013-08-26 08:43:53', ''),
(6, 3, 1, '', '88', '2013-08-26 08:45:35', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
