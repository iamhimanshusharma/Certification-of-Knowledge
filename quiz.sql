-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 13, 2021 at 10:03 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_question_files`
--

DROP TABLE IF EXISTS `admin_question_files`;
CREATE TABLE IF NOT EXISTS `admin_question_files` (
  `adminq_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `exam_count` varchar(100) NOT NULL,
  `unique_exam_id` varchar(100) NOT NULL,
  PRIMARY KEY (`adminq_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

DROP TABLE IF EXISTS `community`;
CREATE TABLE IF NOT EXISTS `community` (
  `asker_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  PRIMARY KEY (`asker_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `community_reply`
--

DROP TABLE IF EXISTS `community_reply`;
CREATE TABLE IF NOT EXISTS `community_reply` (
  `replyer_id` int(11) NOT NULL AUTO_INCREMENT,
  `asker_id` int(11) NOT NULL,
  `reply_name` varchar(50) NOT NULL,
  `reply_message` varchar(100) NOT NULL,
  PRIMARY KEY (`replyer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organized_passed_students`
--

DROP TABLE IF EXISTS `organized_passed_students`;
CREATE TABLE IF NOT EXISTS `organized_passed_students` (
  `organizep_id` int(11) NOT NULL AUTO_INCREMENT,
  `signup_id` varchar(100) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_email` varchar(100) NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `exam_course` varchar(100) NOT NULL,
  PRIMARY KEY (`organizep_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question_files`
--

DROP TABLE IF EXISTS `question_files`;
CREATE TABLE IF NOT EXISTS `question_files` (
  `questionf_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `exam_count` varchar(100) NOT NULL,
  `unique_exam_id` varchar(100) NOT NULL,
  PRIMARY KEY (`questionf_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

DROP TABLE IF EXISTS `signup`;
CREATE TABLE IF NOT EXISTS `signup` (
  `signup_id` int(11) NOT NULL AUTO_INCREMENT,
  `signup_first_name` varchar(50) NOT NULL,
  `signup_last_name` varchar(50) NOT NULL,
  `signup_email` varchar(100) NOT NULL,
  `signup_password` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`signup_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `signup_photo`
--

DROP TABLE IF EXISTS `signup_photo`;
CREATE TABLE IF NOT EXISTS `signup_photo` (
  `photo_id` varchar(100) NOT NULL,
  `photo` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
