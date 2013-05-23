-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 23, 2013 at 06:09 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `management`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET latin1 NOT NULL,
  `field` varchar(45) CHARACTER SET latin1 NOT NULL,
  `email` varchar(45) CHARACTER SET latin1 NOT NULL,
  `country` varchar(45) CHARACTER SET latin1 NOT NULL,
  `about` text CHARACTER SET latin1,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(13) CHARACTER SET latin1 NOT NULL,
  `address` varchar(100) CHARACTER SET latin1 NOT NULL,
  `confirmid` varchar(450) CHARACTER SET latin1 NOT NULL,
  `website` varchar(450) CHARACTER SET latin1 DEFAULT NULL,
  `location` varchar(450) CHARACTER SET latin1 NOT NULL,
  `overview` varchar(450) CHARACTER SET latin1 NOT NULL,
  `about_product` text CHARACTER SET latin1,
  `chairman` int(10) unsigned DEFAULT NULL,
  `department_number` int(11) NOT NULL,
  `logo` varchar(500) CHARACTER SET latin1 NOT NULL DEFAULT 'defult.jpg',
  PRIMARY KEY (`id`),
  KEY `FK_company_1` (`chairman`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `field`, `email`, `country`, `about`, `password`, `phone`, `address`, `confirmid`, `website`, `location`, `overview`, `about_product`, `chairman`, `department_number`, `logo`) VALUES
(10, 'tamer', 'sjdfjfgn f', 'tamer@yahoo.com', 'Egypt', NULL, '827ccb0eea8a706c4c34a16891f84e7b', '2001061868195', 'wew er  wet', '', NULL, 'dgf fdg dfg dfg dfg df', '', NULL, 23, 2, 'defult.jpg'),
(11, 'sheir', 'web', 'sheir@yahoo.com', 'Egypt', 'Happiness is a mental or emotional state of well-being characterized by positive or pleasant emotions ranging from contentment to intense joy.[1] A variety of biological, psychological, religious, and philosophical approaches have striven to define happiness and identify its sources. Various research groups, including positive psychology, endeavor to apply the scientific method to answer questions about what "happiness" is, and how it might be attained. It is of such fundamental importance to the human condition that "life, liberty and the pursuit of happiness" were deemed to be unalienable rights by the United States Declaration of Independence.\r\nPhilosophers and religious thinkers often define happiness in terms of living a good life, or flourishing, rather than simply as an emotion. Happiness in this sense was used to translate the Greek Eudaimonia, and is still used in virtue ethics. Happiness economics suggests that measures of public happiness should be used to supplement more traditional economic measures when evaluating the success of public policy.', 'e10adc3949ba59abbe56e057f20f883e', '2001024791324', 'Cairo', '', 'https://www.facebook.com/engmohsamy', 'Cairo', '', 'Happiness is a mental or emotional state of well-being characterized by positive or pleasant emotions ranging from contentment to intense joy.[1] A variety of biological, psychological, religious, and philosophical approaches have striven to define happiness and identify its sources. Various research groups, including positive psychology, endeavor to apply the scientific method to answer questions about what "happiness" is, and how it might be attained. It is of such fundamental importance to the human condition that "life, liberty and the pursuit of happiness" were deemed to be unalienable rights by the United States Declaration of Independence.\r\nPhilosophers and religious thinkers often define happiness in terms of living a good life, or flourishing, rather than simply as an emotion. Happiness in this sense was used to translate the Greek Eudaimonia, and is still used in virtue ethics. Happiness economics suggests that measures of public happiness should be used to supplement more traditional economic measures when evaluating the success of public policy.', 25, 3, '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cv`
--

CREATE TABLE IF NOT EXISTS `cv` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `email` varchar(500) NOT NULL,
  `home_phone` varchar(100) NOT NULL,
  `mobile_phone` varchar(100) NOT NULL,
  `summary` text NOT NULL,
  `accomplishments` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cv_1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `cv`
--

INSERT INTO `cv` (`id`, `user_id`, `email`, `home_phone`, `mobile_phone`, `summary`, `accomplishments`) VALUES
(26, 12, 'mohamed_sheir@yahoo.com', '01024791324', '01024791324', 'Happiness is a mental or emotional state of well-being characterized by positive or pleasant emotions ranging from contentment to intense joy.[1] A variety of biological, psychological, religious, and philosophical approaches have striven to define happiness and identify its sources. Various research groups, including positive psychology, endeavor to apply the scientific method to answer questions about what "happiness" is, and how it might be attained. It is of such fundamental importance to the human condition that "life, liberty and the pursuit of happiness" were deemed to be unalienable rights by the United States Declaration of Independence. \r\nPhilosophers and religious thinkers often define happiness in terms of living a good life, or flourishing, rather than simply as an emotion. Happiness in this sense was used to translate the Greek Eudaimonia, and is still used in virtue ethics. Happiness economics suggests that measures of public happiness should be used to supplement more traditional economic measures when evaluating the success of public policy', 'Happiness is a mental or emotional state of well-being characterized by positive or pleasant emotions ranging from contentment to intense joy.[1] A variety of biological, psychological, religious, and philosophical approaches have striven to define happiness and identify its sources. Various research groups, including positive psychology, endeavor to apply the scientific method to answer questions about what "happiness" is, and how it might be attained. It is of such fundamental importance to the human condition that "life, liberty and the pursuit of happiness" were deemed to be unalienable rights by the United States Declaration of Independence. \r\nPhilosophers and religious thinkers often define happiness in terms of living a good life, or flourishing, rather than simply as an emotion. Happiness in this sense was used to translate the Greek Eudaimonia, and is still used in virtue ethics. Happiness economics suggests that measures of public happiness should be used to supplement more traditional economic measures when evaluating the success of public policy');

-- --------------------------------------------------------

--
-- Table structure for table `cv_edu`
--

CREATE TABLE IF NOT EXISTS `cv_edu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `school` varchar(500) NOT NULL,
  `grad_year` varchar(45) NOT NULL,
  `country` varchar(500) NOT NULL,
  `field_study` varchar(500) NOT NULL,
  `degree` varchar(500) NOT NULL,
  `details` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cv_edu_1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `cv_edu`
--

INSERT INTO `cv_edu` (`id`, `user_id`, `school`, `grad_year`, `country`, `field_study`, `degree`, `details`) VALUES
(31, 12, 'FCI', '2013', 'Egypt', 'software programming', 'good', 'Happiness is a mental or emotional state of well-being characterized by positive or pleasant emotions ranging from contentment to intense joy.[1] A variety of biological, psychological, religious, and philosophical approaches have striven to define happiness and identify its sources. Various research groups, including positive psychology, endeavor to apply the scientific method to answer questions about what "happiness" is, and how it might be attained. It is of such fundamental importance to the human condition that "life, liberty and the pursuit of happiness" were deemed to be unalienable rights by the United States Declaration of Independence. \r\nPhilosophers and religious thinkers often define happiness in terms of living a good life, or flourishing, rather than simply as an emotion. Happiness in this sense was used to translate the Greek Eudaimonia, and is still used in virtue ethics. Happiness economics suggests that measures of public happiness should be used to supplement more traditional economic measures when evaluating the success of public policy'),
(32, 12, 'secondary school', '2009', 'Egypt', 'engineering', 'excellent', 'Happiness is a mental or emotional state of well-being characterized by positive or pleasant emotions ranging from contentment to intense joy.[1] A variety of biological, psychological, religious, and philosophical approaches have striven to define happiness and identify its sources. Various research groups, including positive psychology, endeavor to apply the scientific method to answer questions about what "happiness" is, and how it might be attained. It is of such fundamental importance to the human condition that "life, liberty and the pursuit of happiness" were deemed to be unalienable rights by the United States Declaration of Independence. \r\nPhilosophers and religious thinkers often define happiness in terms of living a good life, or flourishing, rather than simply as an emotion. Happiness in this sense was used to translate the Greek Eudaimonia, and is still used in virtue ethics. Happiness economics suggests that measures of public happiness should be used to supplement more traditional economic measures when evaluating the success of public policy');

-- --------------------------------------------------------

--
-- Table structure for table `cv_exper`
--

CREATE TABLE IF NOT EXISTS `cv_exper` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `postion` varchar(500) DEFAULT NULL,
  `date_from` varchar(150) DEFAULT NULL,
  `date_to` varchar(150) DEFAULT NULL,
  `company` varchar(500) DEFAULT NULL,
  `details` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cv_exper_1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `cv_exper`
--

INSERT INTO `cv_exper` (`id`, `user_id`, `postion`, `date_from`, `date_to`, `company`, `details`) VALUES
(32, 12, 'assist', '2013-05-08', '2013-05-09', 'AST', 'Happiness is a mental or emotional state of w'),
(33, 12, 'manager', '2013-05-04', '2013-05-15', 'WDC', 'Happiness is a mental or emotional state of w');

-- --------------------------------------------------------

--
-- Table structure for table `cv_skills`
--

CREATE TABLE IF NOT EXISTS `cv_skills` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `skill` varchar(500) NOT NULL,
  `level` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cv_skills_1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `cv_skills`
--

INSERT INTO `cv_skills` (`id`, `user_id`, `skill`, `level`) VALUES
(12, 12, 'web design', 'Excellent'),
(13, 12, 'web develop', 'Excellent'),
(14, 12, 'graphic', 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `depart_manager` varchar(255) CHARACTER SET latin1 NOT NULL,
  `sub_depart_num` int(11) NOT NULL,
  `type` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_department_1` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `company_id`, `name`, `depart_manager`, `sub_depart_num`, `type`) VALUES
(24, 10, 'dept1', '24', 1, 'Staff'),
(25, 10, 'dept2', '25', 1, 'IT'),
(26, 11, 'finical', '23', 1, 'Financial'),
(27, 11, 'market', '23', 0, ' Marketing'),
(28, 11, 'develop', '19', 2, 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned DEFAULT NULL,
  `department_id` int(10) unsigned DEFAULT NULL,
  `sub_dept_id` int(10) unsigned DEFAULT NULL,
  `firstname` varchar(100) CHARACTER SET latin1 NOT NULL,
  `lastname` varchar(225) CHARACTER SET latin1 NOT NULL,
  `gender` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `confirmid` varchar(225) CHARACTER SET latin1 NOT NULL,
  `phone` int(30) NOT NULL,
  `website` varchar(255) CHARACTER SET latin1 NOT NULL,
  `address` varchar(255) CHARACTER SET latin1 NOT NULL,
  `location` varchar(225) CHARACTER SET latin1 NOT NULL,
  `country` varchar(225) CHARACTER SET latin1 NOT NULL,
  `birthday` varchar(225) CHARACTER SET latin1 NOT NULL,
  `about` text CHARACTER SET latin1 NOT NULL,
  `username` varchar(450) CHARACTER SET latin1 NOT NULL,
  `confirm` int(10) unsigned NOT NULL DEFAULT '0',
  `code` varchar(45) CHARACTER SET latin1 NOT NULL,
  `profile_pic` varchar(500) CHARACTER SET latin1 NOT NULL DEFAULT 'default_pic.png',
  PRIMARY KEY (`id`),
  KEY `FK_employees_1` (`company_id`),
  KEY `FK_employees_2` (`department_id`),
  KEY `FK_employees_3` (`sub_dept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `company_id`, `department_id`, `sub_dept_id`, `firstname`, `lastname`, `gender`, `email`, `password`, `confirmid`, `phone`, `website`, `address`, `location`, `country`, `birthday`, `about`, `username`, `confirm`, `code`, `profile_pic`) VALUES
(9, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temraz21@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'teefds sdf sdf', 'afasf s df', 'at', '12/2/2013', 'qweqwe', '', 0, '', ''),
(10, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temraz21@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'teefds sdf sdf', 'afasf s df', 'at', '12/2/2013', 'qweqwe', '', 0, '', ''),
(11, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temraz21@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'teefds sdf sdf', 'afasf s df', 'at', '12/2/2013', 'qweqwe', '', 0, '', ''),
(12, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temraz21@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'teefds sdf sdf', 'afasf s df', 'at', '12/2/2013', 'qweqwe', '', 0, '', 'default_pic.png'),
(13, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temraz21@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'teefds sdf sdf', 'afasf s df', 'at', '12/2/2013', 'qweqwe', '', 0, '', 'default_pic.png'),
(14, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temraz21@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'teefds sdf sdf', 'afasf s df', 'at', '12/2/2013', 'qweqwe', '', 0, '', 'default_pic.png'),
(15, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temraz21@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'teefds sdf sdf', 'afasf s df', 'at', '12/2/2013', 'qweqwe', '', 0, '', 'default_pic.png'),
(16, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temraz21@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'teefds sdf sdf', 'afasf s df', 'at', '12/2/2013', 'qweqwe', '', 0, '', 'default_pic.png'),
(17, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temraz21@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'teefds sdf sdf', 'afasf s df', 'at', '12/2/2013', 'qweqwe', 'badran', 0, '', 'default_pic.png'),
(18, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temo_tmalim3ak@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'wlkdfdsf sdlf sdfl', 'dsfsdf dfs sdf ds f sdf', 'ad', '12/2/2013', 'sdfwferfreff erf erf', 'gado', 0, '', 'default_pic.png'),
(19, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temo_tmalim3ak@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'wlkdfdsf sdlf sdfl', 'dsfsdf dfs sdf ds f sdf', 'ad', '12/2/2013', 'sdfwferfreff erf erf', 'radwan', 0, '', 'default_pic.png'),
(23, 10, NULL, NULL, 'mostafa', 'badran', 'male', 'badran@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 2147483647, '', 'kmmf s sfd gfdg', '0', 'eg', '0', 'sfgfert er tertre tre t', 'mostafabadran', 1, '', '36563_361510953941817_225287246_n1.jpg'),
(24, 10, 24, NULL, 'mohamed', 'gado', 'male', 'gado@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 2147483647, '', 'mdfg kdf g', '0', 'eg', '0', 'sfdfg fdg df g', 'mohamedgado', 1, '', 'default_pic.png'),
(25, 10, 25, NULL, 'ahmed', 'alhawata', 'male', 'hawata@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 2147483647, '', 'kd fdsf sd fds f', '0', 'af', '0', 'ksf gfdn gdfg dfg', 'ahmedalhawata', 1, '', 'default_pic.png'),
(26, 10, NULL, 24, 'mohamed', 'malah', 'male', 'malah@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 2147483647, '', 'fijgfdg  dfg dfgfd g', '0', 'eg', '0', 'sf gfdg df  gdf  gd fg', 'mohamedmalah', 1, '', 'default_pic.png'),
(27, 10, NULL, 25, 'mohamed', 'saad', 'male', 'saad@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 2147483647, '', '12wmer w mrew t', '0', 'af', '0', 'm tmer tmre t', 'mohamedsaad', 1, '', 'default_pic.png'),
(28, NULL, NULL, NULL, '', '', '', '', '', '', 0, '', '', '', '', '', '', '', 0, '', 'default_pic.png');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf16 NOT NULL,
  `date` varchar(45) CHARACTER SET latin1 NOT NULL,
  `details` text CHARACTER SET utf16 NOT NULL,
  `pic` varchar(500) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_events_1` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `company_id`, `name`, `date`, `details`, `pic`) VALUES
(11, 11, 'City Night', '2013-05-10', 'Happiness is a mental or emotional state of well-being characterized by positive or pleasant emotions ranging from contentment to intense joy.[1] A variety of biological, psychological, religious, and philosophical approaches have striven to define happiness and identify its sources. Various research groups, including positive psychology, endeavor to apply the scientific method to answer questions about what "happiness" is, and how it might be attained. It is of such fundamental importance to the human condition that "life, liberty and the pursuit of happiness" were deemed to be unalienable rights by the United States Declaration of Independence.\r<br>Philosophers and religious thinkers often define happiness in terms of living a good life, or flourishing, rather than simply as an emotion. Happiness in this sense was used to translate the Greek Eudaimonia, and is still used in virtue ethics. Happiness economics suggests that measures of public happiness should be used to supplement more traditional economic measures when evaluating the success of public policy.', '25027_417794298290064_733463649_n2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_follow_1` (`company_id`),
  KEY `FK_follow_2` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `company_id`, `user_id`) VALUES
(28, 11, 12);

-- --------------------------------------------------------

--
-- Table structure for table `jops`
--

CREATE TABLE IF NOT EXISTS `jops` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned NOT NULL,
  `name` varchar(145) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `appliers_id` varchar(45) CHARACTER SET latin1 NOT NULL,
  `department` varchar(255) CHARACTER SET latin1 NOT NULL,
  `level` varchar(255) CHARACTER SET latin1 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_jops_1` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jops`
--

INSERT INTO `jops` (`id`, `company_id`, `name`, `description`, `appliers_id`, `department`, `level`, `date`) VALUES
(1, 11, 'IT Sales Account Manager', 'Happiness is a mental or emotional state of well-being characterized by positive or pleasant emotions ranging from contentment to intense joy.[1] A variety of biological, psychological, religious, and philosophical approaches have striven to define happiness and identify its sources. Various research groups, including positive psychology, endeavor to apply the scientific method to answer questions about what "happiness" is, and how it might be attained. It is of such fundamental importance to the human condition that "life, liberty and the pursuit of happiness" were deemed to be unalienable rights by the United States Declaration of Independence. \r<br>Philosophers and religious thinkers often define happiness in terms of living a good life, or flourishing, rather than simply as an emotion. Happiness in this sense was used to translate the Greek Eudaimonia, and is still used in virtue ethics. Happiness economics suggests that measures of public happiness should be used to supplement more traditional economic measures when evaluating the success of public policy.\r<br>', '', 'market', 'semi-professional', '2013-05-18 23:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned NOT NULL,
  `pic` varchar(500) CHARACTER SET latin1 NOT NULL,
  `caption` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_media_1` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `company_id`, `pic`, `caption`) VALUES
(3, 11, '603018_376754012421555_1320969417_n.jpg', 'That is Roma');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `details` text CHARACTER SET latin1 NOT NULL,
  `date` varchar(45) CHARACTER SET latin1 NOT NULL,
  `logo` varchar(500) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_news_1` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `company_id`, `title`, `details`, `date`, `logo`) VALUES
(4, 11, 'Beautiful Home', 'Happiness is a mental or emotional state of well-being characterized by positive or pleasant emotions ranging from contentment to intense joy.[1] A variety of biological, psychological, religious, and philosophical approaches have striven to define happiness and identify its sources. Various research groups, including positive psychology, endeavor to apply the scientific method to answer questions about what "happiness" is, and how it might be attained. It is of such fundamental importance to the human condition that "life, liberty and the pursuit of happiness" were deemed to be unalienable rights by the United States Declaration of Independence.\r<br>Philosophers and religious thinkers often define happiness in terms of living a good life, or flourishing, rather than simply as an emotion. Happiness in this sense was used to translate the Greek Eudaimonia, and is still used in virtue ethics. Happiness economics suggests that measures of public happiness should be used to supplement more traditional economic measures when evaluating the success of public policy.', '2013-05-08', '224902_417639288305565_548467278_n1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news_feed`
--

CREATE TABLE IF NOT EXISTS `news_feed` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `details` text,
  `logo` varchar(500) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `event_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `news_id` int(10) unsigned DEFAULT NULL,
  `job_id` int(10) unsigned DEFAULT NULL,
  `pic_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_news_feed_1` (`company_id`),
  KEY `FK_news_feed_2` (`event_id`),
  KEY `FK_news_feed_3` (`product_id`),
  KEY `FK_news_feed_4` (`news_id`),
  KEY `FK_news_feed_5` (`job_id`),
  KEY `FK_news_feed_6` (`pic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `news_feed`
--

INSERT INTO `news_feed` (`id`, `company_id`, `title`, `date`, `details`, `logo`, `link`, `event_id`, `product_id`, `news_id`, `job_id`, `pic_id`) VALUES
(3, 11, 'City Night', '2013-05-17 14:40:13', 'Happiness is a mental or emotional state of well-being characterized by positive or pleasant emotions ranging from contentment to intense joy.[1] A variety of biological, psychological, religious, and philosophical approaches have striven to define happiness and identify its sources. Various research groups, including positive psychology, endeavor to apply the scientific method to answer questions about what "happiness" is, and how it might be attained. It is of such fundamental importance to the human condition that "life, liberty and the pursuit of happiness" were deemed to be unalienable rights by the United States Declaration of Independence.\r<br>Philosophers and religious thinkers often define happiness in terms of living a good life, or flourishing, rather than simply as an emotion. Happiness in this sense was used to translate the Greek Eudaimonia, and is still used in virtue ethics. Happiness economics suggests that measures of public happiness should be used to supplement more traditional economic measures when evaluating the success of public policy.', 'events/25027_417794298290064_733463649_n2.jpg', 'http://localhost/mange_s/company/event/11', 11, NULL, NULL, NULL, NULL),
(7, 11, 'Beautiful Home', '2013-05-17 14:57:58', 'Happiness is a mental or emotional state of well-being characterized by positive or pleasant emotions ranging from contentment to intense joy.[1] A variety of biological, psychological, religious, and philosophical approaches have striven to define happiness and identify its sources. Various research groups, including positive psychology, endeavor to apply the scientific method to answer questions about what "happiness" is, and how it might be attained. It is of such fundamental importance to the human condition that "life, liberty and the pursuit of happiness" were deemed to be unalienable rights by the United States Declaration of Independence.\r<br>Philosophers and religious thinkers often define happiness in terms of living a good life, or flourishing, rather than simply as an emotion. Happiness in this sense was used to translate the Greek Eudaimonia, and is still used in virtue ethics. Happiness economics suggests that measures of public happiness should be used to supplement more traditional economic measures when evaluating the success of public policy.', 'news/224902_417639288305565_548467278_n1.jpg', 'http://localhost/mange_s/company/news_show/4', NULL, NULL, 4, NULL, NULL),
(8, 11, 'Paris', '2013-05-17 14:59:51', 'Happiness is a mental or emotional state of well-being characterized by positive or pleasant emotions ranging from contentment to intense joy.[1] A variety of biological, psychological, religious, and philosophical approaches have striven to define happiness and identify its sources. Various research groups, including positive psychology, endeavor to apply the scientific method to answer questions about what "happiness" is, and how it might be attained. It is of such fundamental importance to the human condition that "life, liberty and the pursuit of happiness" were deemed to be unalienable rights by the United States Declaration of Independence.\r<br>Philosophers and religious thinkers often define happiness in terms of living a good life, or flourishing, rather than simply as an emotion. Happiness in this sense was used to translate the Greek Eudaimonia, and is still used in virtue ethics. Happiness economics suggests that measures of public happiness should be used to supplement more traditional economic measures when evaluating the success of public policy.', 'products/307384_518422288209515_233393490_n.jpg', 'http://localhost/mange_s/company/product/12', NULL, 12, NULL, NULL, NULL),
(9, 11, 'New Photo Added ', '2013-05-17 16:05:30', 'That is Roma', 'company_gallery/603018_376754012421555_1320969417_n.jpg', 'http://localhost/mange_s/company/gallery/11', NULL, NULL, NULL, NULL, 3),
(10, 11, 'IT Sales Account Manager', '2013-05-18 23:59:26', 'Happiness is a mental or emotional state of well-being characterized by positive or pleasant emotions ranging from contentment to intense joy.[1] A variety of biological, psychological, religious, and philosophical approaches have striven to define happiness and identify its sources. Various research groups, including positive psychology, endeavor to apply the scientific method to answer questions about what "happiness" is, and how it might be attained. It is of such fundamental importance to the human condition that "life, liberty and the pursuit of happiness" were deemed to be unalienable rights by the United States Declaration of Independence. \r<br>Philosophers and religious thinkers often define happiness in terms of living a good life, or flourishing, rather than simply as an emotion. Happiness in this sense was used to translate the Greek Eudaimonia, and is still used in virtue ethics. Happiness economics suggests that measures of public happiness should be used to supplement more traditional economic measures when evaluating the success of public policy.\r<br>', NULL, 'http://localhost/mange_s/company/job/1', NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned NOT NULL,
  `name` varchar(145) CHARACTER SET latin1 NOT NULL,
  `product_desc` text CHARACTER SET latin1 NOT NULL,
  `logo` varchar(550) CHARACTER SET latin1 NOT NULL,
  `date_release` varchar(45) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_products_1` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `company_id`, `name`, `product_desc`, `logo`, `date_release`) VALUES
(12, 11, 'Paris', 'Happiness is a mental or emotional state of well-being characterized by positive or pleasant emotions ranging from contentment to intense joy.[1] A variety of biological, psychological, religious, and philosophical approaches have striven to define happiness and identify its sources. Various research groups, including positive psychology, endeavor to apply the scientific method to answer questions about what "happiness" is, and how it might be attained. It is of such fundamental importance to the human condition that "life, liberty and the pursuit of happiness" were deemed to be unalienable rights by the United States Declaration of Independence.\r<br>Philosophers and religious thinkers often define happiness in terms of living a good life, or flourishing, rather than simply as an emotion. Happiness in this sense was used to translate the Greek Eudaimonia, and is still used in virtue ethics. Happiness economics suggests that measures of public happiness should be used to supplement more traditional economic measures when evaluating the success of public policy.', '307384_518422288209515_233393490_n.jpg', '2013-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `sub_department`
--

CREATE TABLE IF NOT EXISTS `sub_department` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned NOT NULL,
  `department_id` int(10) unsigned NOT NULL,
  `name` varchar(45) CHARACTER SET latin1 NOT NULL,
  `sub_depart_manager` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_sub_department_1` (`department_id`),
  KEY `FK_sub_department_2` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `sub_department`
--

INSERT INTO `sub_department` (`id`, `company_id`, `department_id`, `name`, `sub_depart_manager`) VALUES
(24, 10, 24, 'rrr', '26'),
(25, 10, 25, 'it2', '27'),
(26, 11, 26, 'money', '27'),
(27, 11, 28, 'logic', '23'),
(28, 11, 28, 'database', '18');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) unsigned NOT NULL,
  `deadline` varchar(45) NOT NULL,
  `the_task` varchar(500) NOT NULL,
  `under_construction` int(10) unsigned NOT NULL DEFAULT '0',
  `done` int(10) unsigned NOT NULL DEFAULT '0',
  `task_owner` int(10) unsigned NOT NULL,
  `seen` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_tasks_1` (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `emp_id`, `deadline`, `the_task`, `under_construction`, `done`, `task_owner`, `seen`) VALUES
(1, 24, '2013-05-22', '1st task', 0, 0, 23, 0),
(2, 24, '2013-05-22', '2nd task', 0, 0, 23, 1),
(3, 24, '2013-05-22', '3th task', 0, 0, 23, 0),
(4, 24, '2013-05-22', '4th task', 0, 0, 23, 1),
(5, 25, '2013-05-15', 'task owner', 0, 0, 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(145) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `country` varchar(100) NOT NULL,
  `age` varchar(45) DEFAULT NULL,
  `about` text,
  `pic` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `email`, `password`, `username`, `gender`, `country`, `age`, `about`, `pic`) VALUES
(4, '', '', 'temraz@yahoo.com', '202cb962ac59075b964b07152d234b70', 'sdfsd', 'male', 'egypt', '', NULL, NULL),
(5, NULL, NULL, 'temraz2@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', '12323', 'male', 'egypt', '', NULL, NULL),
(6, NULL, NULL, 'temraz90@yahoo.com', '202cb962ac59075b964b07152d234b70', 'rt', 'male', 'egypt', '', NULL, NULL),
(7, NULL, NULL, 'temraztr@yahoo.com', '202cb962ac59075b964b07152d234b70', 'erer', 'male', 'england', '', NULL, NULL),
(8, NULL, NULL, 'temraztt@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 'wer', 'male', 'egypt', '', NULL, NULL),
(9, NULL, NULL, 'yyy@yahoo.com', '202cb962ac59075b964b07152d234b70', 'temraz2', 'female', 'england', '', NULL, NULL),
(10, NULL, NULL, 'ahmed@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 'temr', 'male', 'egypt', '', NULL, NULL),
(11, NULL, NULL, 'hawata@yahoo.com', '202cb962ac59075b964b07152d234b70', 'hawata', 'male', 'egypt', '', NULL, NULL),
(12, 'Mohamed Samy Mohamed Sheir', 'Cairo - El Menofiya', 'sheir@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 'sheir', 'male', 'egypt', '21', 'Happiness is a mental or emotional state of well-being characterized by positive or pleasant emotions ranging from contentment to intense joy.[1] A variety of biological, psychological, religious, and philosophical approaches have striven to define happiness and identify its sources. Various research groups, including positive psychology, endeavor to apply the scientific method to answer questions about what "happiness" is, and how it might be attained. It is of such fundamental importance to the human condition that "life, liberty and the pursuit of happiness" were deemed to be unalienable rights by the United States Declaration of Independence.\r<br>Philosophers and religious thinkers often define happiness in terms of living a good life, or flourishing, rather than simply as an emotion. Happiness in this sense was used to translate the Greek Eudaimonia, and is still used in virtue ethics. Happiness economics suggests that measures of public happiness should be used to supplement more traditional economic measures when evaluating the success of public policy', 'DSCF7144n2small.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `FK_company_1` FOREIGN KEY (`chairman`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cv`
--
ALTER TABLE `cv`
  ADD CONSTRAINT `FK_cv_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cv_edu`
--
ALTER TABLE `cv_edu`
  ADD CONSTRAINT `FK_cv_edu_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cv_exper`
--
ALTER TABLE `cv_exper`
  ADD CONSTRAINT `FK_cv_exper_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cv_skills`
--
ALTER TABLE `cv_skills`
  ADD CONSTRAINT `FK_cv_skills_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `FK_department_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `FK_employees_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_employees_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_employees_3` FOREIGN KEY (`sub_dept_id`) REFERENCES `sub_department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `FK_events_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `FK_follow_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_follow_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jops`
--
ALTER TABLE `jops`
  ADD CONSTRAINT `FK_jops_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `FK_media_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `FK_news_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news_feed`
--
ALTER TABLE `news_feed`
  ADD CONSTRAINT `FK_news_feed_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_news_feed_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_news_feed_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_news_feed_4` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_news_feed_5` FOREIGN KEY (`job_id`) REFERENCES `jops` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_news_feed_6` FOREIGN KEY (`pic_id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_department`
--
ALTER TABLE `sub_department`
  ADD CONSTRAINT `FK_sub_department_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_sub_department_2` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `FK_tasks_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
