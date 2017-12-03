-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 19, 2016 at 10:50 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a9085876_cloud`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` VALUES(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignments_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `assignment` varchar(500) DEFAULT NULL,
  `lecturer_id` varchar(100) DEFAULT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `due_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`assignments_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` VALUES(4, 17, 'Write a short note on what you understand by C# as a programming language.', 'LECT-227173', '2016-08-25 10:02:26', '08/26/2016 9:00 AM');
INSERT INTO `assignments` VALUES(5, 17, 'ggggdddddd', 'LECT-227173', '2016-08-25 00:03:59', '08/25/2016 5:03 AM');
INSERT INTO `assignments` VALUES(6, 18, 'geeeeeeeexxxaaa', 'LECT-227173', '2016-08-25 00:04:29', '09/28/2016 12:00 PM');
INSERT INTO `assignments` VALUES(7, 18, 'tttt', 'LECT-227173', '2016-08-25 00:04:49', '08/25/2016 5:04 AM');
INSERT INTO `assignments` VALUES(8, 17, 'vvvv', 'LECT-227173', '2016-08-25 00:05:07', '10/25/2016 5:05 AM');

-- --------------------------------------------------------

--
-- Table structure for table `assignments_submit`
--

CREATE TABLE `assignments_submit` (
  `assignments_submit_id` int(11) NOT NULL AUTO_INCREMENT,
  `assignments_id` int(11) DEFAULT NULL,
  `student_id` varchar(100) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `format` varchar(50) DEFAULT NULL,
  `submitted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`assignments_submit_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `assignments_submit`
--

INSERT INTO `assignments_submit` VALUES(11, 8, '119487', '119487(cse-301)-75891-cse-403-assignment.docx', 'docx', '2016-09-04 13:37:56');
INSERT INTO `assignments_submit` VALUES(12, 6, '119487', '119487(cse-305)-79521-bashrfid.docx', 'docx', '2016-09-22 22:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sent_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`chat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` VALUES(5, 1, 'hello', '2016-09-11 07:01:04');
INSERT INTO `chat` VALUES(6, 2, 'hi', '2016-09-11 07:01:12');
INSERT INTO `chat` VALUES(7, 1, 'he', '2016-09-11 07:01:26');
INSERT INTO `chat` VALUES(8, 2, 'g', '2016-09-11 07:01:36');
INSERT INTO `chat` VALUES(9, 2, 'hw far boss', '2016-09-11 07:15:47');
INSERT INTO `chat` VALUES(10, 1, 'am good', '2016-09-11 07:16:35');
INSERT INTO `chat` VALUES(11, 2, 'nice', '2016-09-11 07:16:58');
INSERT INTO `chat` VALUES(12, 1, 'ok', '2016-09-11 07:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` VALUES(17, 'INTRODUCTION TO C# PROGRAMMING LANGUAGE', 'CSE 301');
INSERT INTO `course` VALUES(18, 'DATABASE DESIGN', 'CSE 305');

-- --------------------------------------------------------

--
-- Table structure for table `course_assign`
--

CREATE TABLE `course_assign` (
  `assign_id` int(11) NOT NULL AUTO_INCREMENT,
  `lecturer_id` varchar(100) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`assign_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `course_assign`
--

INSERT INTO `course_assign` VALUES(1, 'LECT-227173', 17);
INSERT INTO `course_assign` VALUES(2, 'LECT-227173', 18);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` VALUES(1, 'COMPUTER SCIENCE AND ENGINEERING', 'CSE');
INSERT INTO `department` VALUES(2, 'MECHANICAL ENGINEERING', 'MEE');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `document_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) DEFAULT NULL,
  `lecturer_id` varchar(100) DEFAULT NULL,
  `filename` varchar(200) DEFAULT NULL,
  `format` varchar(50) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`document_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `document`
--

INSERT INTO `document` VALUES(11, 4, 'LECT-221232', '97161-programming-asp.net-mvc-5.pdf', 'pdf', '9.77MB', '2016-08-24 09:01:00');
INSERT INTO `document` VALUES(13, 5, 'LECT-227173', '82758-cse-403-assignment.docx', 'docx', '0.14MB', '2016-08-24 09:04:40');
INSERT INTO `document` VALUES(14, 4, 'LECT-227173', '83453-cve.docx', 'docx', '0.27MB', '2016-08-24 09:22:16');
INSERT INTO `document` VALUES(15, 4, 'LECT-227173', '68190-pro-asp.net-4.5-in-c---5th-edition.pdf', 'pdf', '16.36MB', '2016-09-02 08:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `lecturer_id` varchar(100) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`lecturer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` VALUES('LECT-221232', 'DR.', 'ADELAJA JAMES IBITAYO', 2, 'JAMES07@GMAIL.COM', '0Gs9H2kI');
INSERT INTO `lecturer` VALUES('LECT-227173', 'PROF.', 'FASASI FAIZ ABIODUN', 1, 'FAIZFASASI@GMAIL.COM', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messages_id` int(11) NOT NULL AUTO_INCREMENT,
  `send_to` varchar(100) DEFAULT NULL,
  `sender_id` varchar(100) DEFAULT NULL,
  `receiver_id` varchar(100) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`messages_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) DEFAULT NULL,
  `lecturer_id` varchar(100) DEFAULT NULL,
  `question` varchar(500) DEFAULT NULL,
  `option1` varchar(100) DEFAULT NULL,
  `option2` varchar(100) DEFAULT NULL,
  `option3` varchar(100) DEFAULT NULL,
  `option4` varchar(100) DEFAULT NULL,
  `answer` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` VALUES(8, 1, 'LECT-227173', 'What is the full meaning of ASP in C# web development?', 'Active Server Page', 'Action Server Program', 'Automatic Service Programming', 'Active Server Programming', 'Active Server Page');
INSERT INTO `questions` VALUES(9, 1, 'LECT-227173', 'int stands for in PHP?', 'insert', 'int', 'integer', 'integrated', 'integer');
INSERT INTO `questions` VALUES(10, 2, 'LECT-227173', 'dd', 'dd', 'dd', 'dd', 'dd', 'dd');
INSERT INTO `questions` VALUES(12, 1, 'LECT-227173', 'What does HTML stand for?', 'Hyper Text Markup Language', 'Hyperlinks and Text Markup Language', 'Home Tool Markup Language', 'Highly Text Markup Language', 'Hyper Text Markup Language');
INSERT INTO `questions` VALUES(13, 1, 'LECT-227173', 'What does PHP stand for?', 'PHP: Hypertext Preprocessor', 'Personal Hypertext Processor', 'Personal Home Page', 'Private Home Page', 'PHP: Hypertext Preprocessor');
INSERT INTO `questions` VALUES(14, 1, 'LECT-227173', 'Which of the following is the way to create comments in PHP?', '// commented code to end of line', '/* commented code here */', '# commented code to end of line', 'all of the above', 'all of the above');
INSERT INTO `questions` VALUES(17, 3, 'LECT-227173', 'gg', 'gg', 'gg', 'gg', 'gg', 'gg');
INSERT INTO `questions` VALUES(19, 3, 'LECT-227173', 'gg', 'ff', 'ff', 'ff', 'ff', 'ff');
INSERT INTO `questions` VALUES(20, 3, 'LECT-227173', 'g', 'hh', 'hh', 'hh', 'hh', 'hh');
INSERT INTO `questions` VALUES(23, 1, 'LECT-227173', 'What is the correct way to end a PHP statement?', ',', ';', '.', 'New line', ';');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `minute` int(11) DEFAULT NULL,
  `noOfQuestion` int(11) DEFAULT NULL,
  `quiz_date` varchar(100) DEFAULT NULL,
  `lecturer_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`quiz_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` VALUES(1, 17, 'Quiz for CSE 301 class', 2, 6, '09/18/2016 10:00 AM', 'LECT-227173');
INSERT INTO `quiz` VALUES(2, 18, 'Quiz for CSE 305 class', 1, 1, '09/10/2016 10:00 AM', 'LECT-227173');
INSERT INTO `quiz` VALUES(3, 17, 'hh', 3, 6, '09/01/2016 10:00 AM', 'LECT-227173');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(11) DEFAULT NULL,
  `student_id` varchar(100) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `percentage` varchar(100) DEFAULT NULL,
  `grade` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `result_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`result_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `result`
--

INSERT INTO `result` VALUES(18, 1, '119487', 5, '83.33%', 'Excellent', 'Completed', '2016-09-15 07:43:03');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(100) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` VALUES('110143', 'AKANDE RONKE ABIGAEL', 2, 'RONKIE4LUV@GMAIL.COM', 'lMXiAsVo');
INSERT INTO `student` VALUES('119487', 'AHMED MUSA ISHOLA', 1, 'MUSA1993@GMAIL.COM', 'ishola');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `lecturer_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` VALUES(3, 18, 'hhhh', 'LECT-221232');
INSERT INTO `subject` VALUES(4, 17, 'Learning programming with C# for beginners', 'LECT-227173');
INSERT INTO `subject` VALUES(5, 18, 'gf', 'LECT-227173');
INSERT INTO `subject` VALUES(7, 18, 'cfsgssnicsjcjwj', 'LECT-227173');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(1, 'phaheez', 'faizfasasi@gmail.com', 'abiodun');
INSERT INTO `users` VALUES(2, 'abbey', 'abey@gmail.com', 'abiodun');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) DEFAULT NULL,
  `lecturer_id` varchar(100) DEFAULT NULL,
  `video_name` varchar(100) DEFAULT NULL,
  `format` varchar(50) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`video_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` VALUES(17, 7, 'LECT-227173', '1613-bootstrap-complete-course-3---learning-the-bootstrap-grid-system.mp4', 'mp4', '26.80MB', '2016-09-02 06:14:15');
INSERT INTO `video` VALUES(18, 5, 'LECT-227173', '74208-building-bootstrap-admin---lesson-1.mp4', 'mp4', '53.75MB', '2016-09-02 07:08:21');
INSERT INTO `video` VALUES(19, 5, 'LECT-227173', '44270-credit-card-fraud-detection.mp4', 'mp4', '16.99MB', '2016-09-02 07:09:14');
INSERT INTO `video` VALUES(20, 4, 'LECT-227173', '86057-ionic-creator----code-editor-tutorial.mp4', 'mp4', '80.38MB', '2016-09-02 07:09:53');
INSERT INTO `video` VALUES(22, 7, 'LECT-227173', '67836-bootstrap-complete-course--5-installing-the-slider-into-our-website-or-html-page.mp4', 'mp4', '42.60MB', '2016-09-02 08:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `video_comment`
--

CREATE TABLE `video_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(100) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `video_comment`
--

INSERT INTO `video_comment` VALUES(1, '119487', 17, 'very good and interesting tutorial', '2016-09-02 08:23:57');
INSERT INTO `video_comment` VALUES(3, '119487', 18, 'good', '2016-09-02 08:26:03');
