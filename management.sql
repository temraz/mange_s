-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 11, 2013 at 03:23 PM
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
  `name` varchar(45) NOT NULL,
  `field` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL,
  `about` text,
  `password` varchar(255) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `address` varchar(100) NOT NULL,
  `confirmid` varchar(450) NOT NULL,
  `website` varchar(450) DEFAULT NULL,
  `location` varchar(450) NOT NULL,
  `overview` varchar(450) NOT NULL,
  `about_product` text,
  `chairman` varchar(255) NOT NULL,
  `department_number` int(11) NOT NULL,
  `logo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `field`, `email`, `country`, `about`, `password`, `phone`, `address`, `confirmid`, `website`, `location`, `overview`, `about_product`, `chairman`, `department_number`, `logo`) VALUES
(1, 'temraz', 'ttt', 'temo_tmalim3ak@yahoo.com', 'al', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed tristique diam. Suspendisse tempus nibh ac velit interdum rutrum. Aliquam ullamcorper bibendum elit eget egestas. Pellentesque sodales, justo at feugiat sagittis, quam massa luctus leo, et facilisis tortor nibh mollis nulla. Nulla facilisis sem et dolor congue nec porta enim varius. Quisque ac dolor felis, in laoreet est. Sed a urna est. Phasellus sed elementum ipsum. Aliquam a ante vitae orci tincidunt volutpat ut sed tellus. Vivamus feugiat neque vel arcu accumsan eu pulvinar lorem rhoncus. Maecenas eget venenatis lectus. Maecenas eget nisl lectus, sit amet sodales tellus. Vestibulum imperdiet imperdiet metus, placerat mollis mi mattis ac. Suspendisse metus diam, ultrices vel lobortis non, ultricies non libero. Nulla facilisi.', '', '5401061868195', 'qreqwe', '202cb962ac59075b964b07152d234b70', '\r<br>Offical Website\r<br>www.vodafone.com\r<br>\r<br>Facebook\r<br>www.facebook.com/vodafone\r<br>\r<br>Twitter\r<br>www.Twitter.com/vodafone\r<br>\r<br>Wikipedia\r<br>en.wikipedia.org/wiki/Vodafone', 'wfasf', 'werwe', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed tristique diam. Suspendisse tempus nibh ac velit interdum rutrum. Aliquam ullamcorper bibendum elit eget egestas. Pellentesque sodales, justo at feugiat sagittis, quam massa luctus leo, et facilisis tortor nibh mollis nulla. Nulla facilisis sem et dolor congue nec porta enim varius. Quisque ac dolor felis, in laoreet est. Sed a urna est. Phasellus sed elementum ipsum. Aliquam a ante vitae orci tincidunt volutpat ut sed tellus. Vivamus feugiat neque vel arcu accumsan eu pulvinar lorem rhoncus. Maecenas eget venenatis lectus. Maecenas eget nisl lectus, sit amet sodales tellus. Vestibulum imperdiet imperdiet metus, placerat mollis mi mattis ac. Suspendisse metus diam, ultrices vel lobortis non, ultricies non libero. Nulla facilisi.', '', 0, 'vodafone_logo_w2.jpg'),
(2, 'temraz', 'ttt', 'temo_tmalim3ak@yahoo.com', 'al', '', '', '5401061868195', 'qreqwe', '202cb962ac59075b964b07152d234b70', 'afd', 'wfasf', 'werwe', 'wer', '', 0, ''),
(3, 'temraz', 'ttt', 'temo_tmalim3ak@yahoo.com', 'al', '', '', '5401061868195', 'qreqwe', '202cb962ac59075b964b07152d234b70', 'afd', 'wfasf', 'werwe', 'wer', '', 0, ''),
(4, 'temraz', 'ttt', 'temo_tmalim3ak@yahoo.com', 'al', '', '', '5401061868195', 'qreqwe', '202cb962ac59075b964b07152d234b70', 'afd', 'wfasf', 'werwe', 'wer', '', 0, ''),
(5, 'temraz', 'ttt', 'temo_tmalim3ak@yahoo.com', 'al', '', '', '5401061868195', 'qreqwe', '202cb962ac59075b964b07152d234b70', 'afd', 'wfasf', 'werwe', 'wer', '', 0, ''),
(6, 'temraz', 'ttt', 'temo_tmalim3ak@yahoo.com', 'al', '', '', '5401061868195', 'qreqwe', '202cb962ac59075b964b07152d234b70', 'afd', 'wfasf', 'werwe', 'wer', '', 0, ''),
(7, 'temraz', 'terk', 'temraz@yahoo.com', 'ar', '', '827ccb0eea8a706c4c34a16891f84e7b', '59112123', 'sdfsdfdsf', '', 'stsdsd sdf', 'dfgdfg', 'dfgfdgfd', 'dfgdfgdfg', 'temraz', 4, ''),
(8, 'vodafon', 'errtem gdfm g', 'vodafon@yahoo.com', 'az', '', '827ccb0eea8a706c4c34a16891f84e7b', '3590106186819', 'sfm sdf emr f', '', 'kmaf sdmk f', 'me sd rwer', 'rwrwre', 'rrrrrrrrrrrrrrerer e r', '17', 3, ''),
(9, 'vodafone', 'communications', 'vodafone@yahoo.com', 'Egypt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed tristique diam. Suspendisse tempus nibh ac velit interdum rutrum. Aliquam ullamcorper bibendum elit eget egestas. Pellentesque sodales, justo at feugiat sagittis, quam massa luctus leo, et facilisis tortor nibh mollis nulla. Nulla facilisis sem et dolor congue nec porta enim varius. Quisque ac dolor felis, in laoreet est. Sed a urna est. Phasellus sed elementum ipsum. Aliquam a ante vitae orci tincidunt volutpat ut sed tellus. Vivamus feugiat neque vel arcu accumsan eu pulvinar lorem rhoncus. Maecenas eget venenatis lectus. Maecenas eget nisl lectus, sit amet sodales tellus. Vestibulum imperdiet imperdiet metus, placerat mollis mi mattis ac. Suspendisse metus diam, ultrices vel lobortis non, ultricies non libero. Nulla facilisiLorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed tristique diam. Suspendisse tempus nibh ac velit interdum rutrum. Aliquam ullamcorper bibendum elit eget egestas. Pellentesque sodales, justo at feugiat sagittis, quam massa luctus leo, et facilisis tortor nibh mollis nulla. Nulla facilisis sem et dolor congue nec porta enim varius. Quisque ac dolor felis, in laoreet est. Sed a urna est. Phasellus sed elementum ipsum. Aliquam a ante vitae orci tincidunt volutpat ut sed tellus. Vivamus feugiat neque vel arcu accumsan eu pulvinar lorem rhoncus. Maecenas eget venenatis lectus. Maecenas eget nisl lectus, sit amet sodales tellus. Vestibulum imperdiet imperdiet metus, placerat mollis mi mattis ac. Suspendisse metus diam, ultrices vel lobortis non, ultricies non libero. Nulla facilisi.', 'e10adc3949ba59abbe56e057f20f883e', '2001024791324', 'cairo', '', ' Offical Website\r<br>www.vodafone.com\r<br>\r<br>Facebook\r<br>www.facebook.com/vodafone\r<br>\r<br>Twitter\r<br>www.Twitter.com/vodafone\r<br>\r<br>Wikipedia\r<br>en.wikipedia.org/wiki/Vodafone', 'cairo', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed tristique diam. Suspendisse tempus nibh ac velit interdum rutrum. Aliquam ullamcorper bibendum elit eget egestas. Pellentesque sodales, justo at feugiat sagittis, quam massa luctus leo, et facilisis tortor nibh mollis nulla. Nulla facilisis sem et dolor congue nec porta enim varius. Quisque ac dolor felis, in laoreet est. Sed a urna est. Phasellus sed elementum ipsum. Aliquam a ante vitae orci tincidunt volutpat ut sed tellus. Vivamus feugiat neque vel arcu accumsan eu pulvinar lorem rhoncus. Maecenas eget venenatis lectus. Maecenas eget nisl lectus, sit amet sodales tellus. Vestibulum imperdiet imperdiet metus, placerat mollis mi mattis ac. Suspendisse metus diam, ultrices vel lobortis non, ultricies non libero. Nulla facilisiLorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed tristique diam. Suspendisse tempus nibh ac velit interdum rutrum. Aliquam ullamcorper bibendum elit eget egestas. Pellentesque sodales, justo at feugiat sagittis, quam massa luctus leo, et facilisis tortor nibh mollis nulla. Nulla facilisis sem et dolor congue nec porta enim varius. Quisque ac dolor felis, in laoreet est. Sed a urna est. Phasellus sed elementum ipsum. Aliquam a ante vitae orci tincidunt volutpat ut sed tellus. Vivamus feugiat neque vel arcu accumsan eu pulvinar lorem rhoncus. Maecenas eget venenatis lectus. Maecenas eget nisl lectus, sit amet sodales tellus. Vestibulum imperdiet imperdiet metus, placerat mollis mi mattis ac. Suspendisse metus diam, ultrices vel lobortis non, ultricies non libero. Nulla facilisi.', 'gado', 2, 'vodafone_logo_w3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `depart_manager` varchar(255) NOT NULL,
  `sub_depart_num` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_department_1` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `company_id`, `name`, `depart_manager`, `sub_depart_num`, `type`) VALUES
(5, 8, 'temraz', '20', 1, ''),
(6, 8, 'ttt', '68', 1, ''),
(7, 8, 'rrrrr', '19', 1, ''),
(16, 7, 'fin', '17', 1, 'Financial'),
(17, 7, 'market', '18', 1, ' Marketing'),
(18, 7, 'develop', '20', 1, 'IT'),
(19, 7, 'anything', '19', 1, 'Customers'),
(20, 9, 'finical', '17', 1, 'Financial'),
(21, 9, 'develop', '19', 0, 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned DEFAULT NULL,
  `department_id` int(10) unsigned DEFAULT NULL,
  `sub_dept_id` int(10) unsigned DEFAULT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(225) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmid` varchar(225) NOT NULL,
  `phone` int(30) NOT NULL,
  `website` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `location` varchar(225) NOT NULL,
  `country` varchar(225) NOT NULL,
  `birthday` varchar(225) NOT NULL,
  `about` text NOT NULL,
  `username` varchar(450) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_employees_1` (`company_id`),
  KEY `FK_employees_2` (`department_id`),
  KEY `FK_employees_3` (`sub_dept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `company_id`, `department_id`, `sub_dept_id`, `firstname`, `lastname`, `gender`, `email`, `password`, `confirmid`, `phone`, `website`, `address`, `location`, `country`, `birthday`, `about`, `username`) VALUES
(5, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temraz21@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'teefds sdf sdf', 'afasf s df', 'at', '12/2/2013', 'qweqwe', ''),
(6, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temraz21@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'teefds sdf sdf', 'afasf s df', 'at', '12/2/2013', 'qweqwe', ''),
(7, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temraz21@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'teefds sdf sdf', 'afasf s df', 'at', '12/2/2013', 'qweqwe', ''),
(8, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temraz21@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'teefds sdf sdf', 'afasf s df', 'at', '12/2/2013', 'qweqwe', ''),
(9, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temraz21@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'teefds sdf sdf', 'afasf s df', 'at', '12/2/2013', 'qweqwe', ''),
(10, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temraz21@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'teefds sdf sdf', 'afasf s df', 'at', '12/2/2013', 'qweqwe', ''),
(11, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temraz21@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'teefds sdf sdf', 'afasf s df', 'at', '12/2/2013', 'qweqwe', ''),
(12, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temraz21@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'teefds sdf sdf', 'afasf s df', 'at', '12/2/2013', 'qweqwe', ''),
(13, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temraz21@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'teefds sdf sdf', 'afasf s df', 'at', '12/2/2013', 'qweqwe', ''),
(14, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temraz21@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'teefds sdf sdf', 'afasf s df', 'at', '12/2/2013', 'qweqwe', ''),
(15, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temraz21@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'teefds sdf sdf', 'afasf s df', 'at', '12/2/2013', 'qweqwe', ''),
(16, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temraz21@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'teefds sdf sdf', 'afasf s df', 'at', '12/2/2013', 'qweqwe', ''),
(17, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temraz21@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'teefds sdf sdf', 'afasf s df', 'at', '12/2/2013', 'qweqwe', 'badran'),
(18, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temo_tmalim3ak@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'wlkdfdsf sdlf sdfl', 'dsfsdf dfs sdf ds f sdf', 'ad', '12/2/2013', 'sdfwferfreff erf erf', 'gado'),
(19, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'temo_tmalim3ak@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'https://www.facebook.com/', 'wlkdfdsf sdlf sdfl', 'dsfsdf dfs sdf ds f sdf', 'ad', '12/2/2013', 'sdfwferfreff erf erf', 'radwan'),
(20, NULL, NULL, NULL, 'temraz', 'mohamed', 'male', 'o@yahoo.com', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', 2147483647, 'qerwer', 'qereqr', 'qere', 'af', '12/2/2013', 'wwer', 'mostafa');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf16 NOT NULL,
  `date` varchar(45) NOT NULL,
  `details` text CHARACTER SET utf16 NOT NULL,
  `pic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_events_1` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `company_id`, `name`, `date`, `details`, `pic`) VALUES
(1, 1, 'Dubia', '2013-05-03', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed tristique diam. Suspendisse tempus nibh ac velit interdum rutrum. Aliquam ullamcorper bibendum elit eget egestas. Pellentesque sodales, justo at feugiat sagittis, quam massa luctus leo, et facilisis tortor nibh mollis nulla. Nulla facilisis sem et dolor congue nec porta enim varius. Quisque ac dolor felis, in laoreet est. Sed a urna est. Phasellus sed elementum ipsum. Aliquam a ante vitae orci tincidunt volutpat ut sed tellus. Vivamus feugiat neque vel arcu accumsan eu pulvinar lorem rhoncus. Maecenas eget venenatis lectus. Maecenas eget nisl lectus, sit amet sodales tellus. Vestibulum imperdiet imperdiet metus, placerat mollis mi mattis ac. Suspendisse metus diam, ultrices vel lobortis non, ultricies non libero. Nulla facilisiLorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed tristique diam. Suspendisse tempus nibh ac velit interdum rutrum. Aliquam ullamcorper bibendum elit eget egestas. Pellentesque sodales, justo at feugiat sagittis, quam massa luctus leo, et facilisis tortor nibh mollis nulla. Nulla facilisis sem et dolor congue nec porta enim varius. Quisque ac dolor felis, in laoreet est. Sed a urna est. Phasellus sed elementum ipsum. Aliquam a ante vitae orci tincidunt volutpat ut sed tellus. Vivamus feugiat neque vel arcu accumsan eu pulvinar lorem rhoncus. Maecenas eget venenatis lectus. Maecenas eget nisl lectus, sit amet sodales tellus. Vestibulum imperdiet imperdiet metus, placerat mollis mi mattis ac. Suspendisse metus diam, ultrices vel lobortis non, ultricies non libero. Nulla facilisi.', '156039_437104406373493_490120238_n.jpg'),
(2, 1, 'London', '2013-05-24', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed tristique diam. Suspendisse tempus nibh ac velit interdum rutrum. Aliquam ullamcorper bibendum elit eget egestas. Pellentesque sodales, justo at feugiat sagittis, quam massa luctus leo, et facilisis tortor nibh mollis nulla. Nulla facilisis sem et dolor congue nec porta enim varius. Quisque ac dolor felis, in laoreet est. Sed a urna est. Phasellus sed elementum ipsum. Aliquam a ante vitae orci tincidunt volutpat ut sed tellus. Vivamus feugiat neque vel arcu accumsan eu pulvinar lorem rhoncus. Maecenas eget venenatis lectus. Maecenas eget nisl lectus, sit amet sodales tellus. Vestibulum imperdiet imperdiet metus, placerat mollis mi mattis ac. Suspendisse metus diam, ultrices vel lobortis non, ultricies non libero. Nulla facilisiLorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed tristique diam. Suspendisse tempus nibh ac velit interdum rutrum. Aliquam ullamcorper bibendum elit eget egestas. Pellentesque sodales, justo at feugiat sagittis, quam massa luctus leo, et facilisis tortor nibh mollis nulla. Nulla facilisis sem et dolor congue nec porta enim varius. Quisque ac dolor felis, in laoreet est. Sed a urna est. Phasellus sed elementum ipsum. Aliquam a ante vitae orci tincidunt volutpat ut sed tellus. Vivamus feugiat neque vel arcu accumsan eu pulvinar lorem rhoncus. Maecenas eget venenatis lectus. Maecenas eget nisl lectus, sit amet sodales tellus. Vestibulum imperdiet imperdiet metus, placerat mollis mi mattis ac. Suspendisse metus diam, ultrices vel lobortis non, ultricies non libero. Nulla facilisi.', 'a_london_night.jpg'),
(3, 1, 'City Night', '2013-05-17', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed tristique diam. Suspendisse tempus nibh ac velit interdum rutrum. Aliquam ullamcorper bibendum elit eget egestas. Pellentesque sodales, justo at feugiat sagittis, quam massa luctus leo, et facilisis tortor nibh mollis nulla. Nulla facilisis sem et dolor congue nec porta enim varius. Quisque ac dolor felis, in laoreet est. Sed a urna est. Phasellus sed elementum ipsum. Aliquam a ante vitae orci tincidunt volutpat ut sed tellus. Vivamus feugiat neque vel arcu accumsan eu pulvinar lorem rhoncus. Maecenas eget venenatis lectus. Maecenas eget nisl lectus, sit amet sodales tellus. Vestibulum imperdiet imperdiet metus, placerat mollis mi mattis ac. Suspendisse metus diam, ultrices vel lobortis non, ultricies non libero. Nulla facilisiLorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed tristique diam. Suspendisse tempus nibh ac velit interdum rutrum. Aliquam ullamcorper bibendum elit eget egestas. Pellentesque sodales, justo at feugiat sagittis, quam massa luctus leo, et facilisis tortor nibh mollis nulla. Nulla facilisis sem et dolor congue nec porta enim varius. Quisque ac dolor felis, in laoreet est. Sed a urna est. Phasellus sed elementum ipsum. Aliquam a ante vitae orci tincidunt volutpat ut sed tellus. Vivamus feugiat neque vel arcu accumsan eu pulvinar lorem rhoncus. Maecenas eget venenatis lectus. Maecenas eget nisl lectus, sit amet sodales tellus. Vestibulum imperdiet imperdiet metus, placerat mollis mi mattis ac. Suspendisse metus diam, ultrices vel lobortis non, ultricies non libero. Nulla facilisi.', 'city-night-41035.jpg'),
(4, 9, 'IPO Vodafone', '2013-05-15', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed tristique diam. Suspendisse tempus nibh ac velit interdum rutrum. Aliquam ullamcorper bibendum elit eget egestas. Pellentesque sodales, justo at feugiat sagittis, quam massa luctus leo, et facilisis tortor nibh mollis nulla. Nulla facilisis sem et dolor congue nec porta enim varius. Quisque ac dolor felis, in laoreet est. Sed a urna est. Phasellus sed elementum ipsum. Aliquam a ante vitae orci tincidunt volutpat ut sed tellus. Vivamus feugiat neque vel arcu accumsan eu pulvinar lorem rhoncus. Maecenas eget venenatis lectus. Maecenas eget nisl lectus, sit amet sodales tellus. Vestibulum imperdiet imperdiet metus, placerat mollis mi mattis ac. Suspendisse metus diam, ultrices vel lobortis non, ultricies non libero.', 'IPO-vodafone.jpg'),
(5, 9, 'Vodafone World', '2013-05-07', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed tristique diam. Suspendisse tempus nibh ac velit interdum rutrum. Aliquam ullamcorper bibendum elit eget egestas. Pellentesque sodales, justo at feugiat sagittis, quam massa luctus leo, et facilisis tortor nibh mollis nulla. Nulla facilisis sem et dolor congue nec porta enim varius. Quisque ac dolor felis, in laoreet est. Sed a urna est. Phasellus sed elementum ipsum. Aliquam a ante vitae orci tincidunt volutpat ut sed tellus. Vivamus feugiat neque vel arcu accumsan eu pulvinar lorem rhoncus. Maecenas eget venenatis lectus. Maecenas eget nisl lectus, sit amet sodales tellus. Vestibulum imperdiet imperdiet metus, placerat mollis mi mattis ac. Suspendisse metus diam, ultrices vel lobortis non, ultricies non libero.', 'vodafone-world-of-difference-day1.jpg'),
(6, 9, 'Vodafone Fun', '2013-05-08', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed tristique diam. Suspendisse tempus nibh ac velit interdum rutrum. Aliquam ullamcorper bibendum elit eget egestas. Pellentesque sodales, justo at feugiat sagittis, quam massa luctus leo, et facilisis tortor nibh mollis nulla. Nulla facilisis sem et dolor congue nec porta enim varius. Quisque ac dolor felis, in laoreet est. Sed a urna est. Phasellus sed elementum ipsum. Aliquam a ante vitae orci tincidunt volutpat ut sed tellus. Vivamus feugiat neque vel arcu accumsan eu pulvinar lorem rhoncus. Maecenas eget venenatis lectus. Maecenas eget nisl lectus, sit amet sodales tellus. Vestibulum imperdiet imperdiet metus, placerat mollis mi mattis ac. Suspendisse metus diam, ultrices vel lobortis non, ultricies non libero.', 'MG_0062-e1313525952108.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jops`
--

CREATE TABLE IF NOT EXISTS `jops` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned NOT NULL,
  `name` varchar(145) NOT NULL,
  `description` text NOT NULL,
  `appliers_id` varchar(45) NOT NULL,
  `department` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_jops_1` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `jops`
--

INSERT INTO `jops` (`id`, `company_id`, `name`, `description`, `appliers_id`, `department`, `level`, `date`) VALUES
(17, 7, 'IT Sales Account Manager', 'Candidate will be requested to have an annual target, that he''ll achieve by brinCandidate will be requested to have an annual target, that he''ll achieve by brinCandidate will be requested to have an annual target, that he''ll achieve by brinCandidate will be requested to have an annual target, that he''ll achieve by brin', '', 'market', 'beginner', '2013-05-09 20:28:48'),
(18, 7, 'IT Sales Account Manager', 'Candidate will be requested to have an annual target, that he''ll achieve by brin Candidate will be requested to have an annual target, that he''ll achieve by brin Candidate will be requested to have an annual target, that he''ll achieve by brin Candidate will be requested to have an annual target, that he''ll achieve by brin', '', 'market', 'beginner', '2013-05-09 20:32:21'),
(19, 7, 'Web Developer', 'Candidate will be requested to have an annual target, that he''ll achieve by brin Candidate will be requested to have an annual target, that he''ll achieve by brin Candidate will be requested to have an annual target, that he''ll achieve by brin Candidate will be requested to have an annual target, that he''ll achieve by brin', '', 'develop', 'semi-professional', '2013-05-09 20:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned NOT NULL,
  `pic` varchar(500) NOT NULL,
  `caption` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_media_1` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `company_id`, `pic`, `caption`) VALUES
(1, 7, '1349941471_Activity_near_Vodafone_logos.jpg', 'Vodafone Shamsya'),
(2, 9, 'Vodafone_2_0.JPG', 'Vodafone Store');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `date` varchar(45) NOT NULL,
  `logo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_news_1` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `company_id`, `title`, `details`, `date`, `logo`) VALUES
(1, 9, 'Vodafone earn 2,000,000 milion dollar from a new product Jan', 'Vodafone earn 2,000,000 milion dollar from a new product Jan 18, 2012\r\nSed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illoVodafone earn 2,000,000 milion dollar from a new product Jan 18, 2012\r\nSed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo', '2013-05-16', 'vodafone_logo_w3.jpg'),
(2, 7, 'Vodafone earn 2,000,000 milion dollar from a new product Jan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed tristique diam. Suspendisse tempus nibh ac velit interdum rutrum. Aliquam ullamcorper bibendum elit eget egestas. Pellentesque sodales, justo at feugiat sagittis, quam massa luctus leo, et facilisis tortor nibh mollis nulla. Nulla facilisis sem et dolor congue nec porta enim varius. Quisque ac dolor felis, in laoreet est. Sed a urna est. Phasellus sed elementum ipsum. Aliquam a ante vitae orci tincidunt volutpat ut sed tellus. Vivamus feugiat neque vel arcu accumsan eu pulvinar lorem rhoncus. Maecenas eget venenatis lectus. Maecenas eget nisl lectus, sit amet sodales tellus. Vestibulum imperdiet imperdiet metus, placerat mollis mi mattis ac. Suspendisse metus diam, ultrices vel lobortis non, ultricies non libero. Nulla facilisiLorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed tristique diam. Suspendisse tempus nibh ac velit interdum rutrum. Aliquam ullamcorper bibendum elit eget egestas. Pellentesque sodales, justo at feugiat sagittis, quam massa luctus leo, et facilisis tortor nibh mollis nulla. Nulla facilisis sem et dolor congue nec porta enim varius. Quisque ac dolor felis, in laoreet est. Sed a urna est. Phasellus sed elementum ipsum. Aliquam a ante vitae orci tincidunt volutpat ut sed tellus. Vivamus feugiat neque vel arcu accumsan eu pulvinar lorem rhoncus. Maecenas eget venenatis lectus. Maecenas eget nisl lectus, sit amet sodales tellus. Vestibulum imperdiet imperdiet metus, placerat mollis mi mattis ac. Suspendisse metus diam, ultrices vel lobortis non, ultricies non libero. Nulla facilisi.', '2013-05-03', 'hi-512-3.png');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned NOT NULL,
  `name` varchar(145) NOT NULL,
  `product_desc` text NOT NULL,
  `logo` varchar(550) NOT NULL,
  `date_release` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_products_1` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `company_id`, `name`, `product_desc`, `logo`, `date_release`) VALUES
(4, 1, 'Vodafone Samsung', 'Vodafone Samsung Vodafone Samsung Vodafone Samsung Vodafone Samsung Vodafone Samsung Vodafone Samsung Vodafone Samsung Vodafone Samsung Vodafone Samsung Vodafone Samsung Vodafone Samsung Vodafone Samsung Vodafone Samsung Vodafone Samsung Vodafone Samsung Vodafone Samsung Vodafone Samsung Vodafone Samsung Vodafone Samsung Vodafone Samsung .', 'vodafone-samsung3.jpg', '2013-04-17'),
(5, 9, 'Mobile Wireless', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed tristique diam. Suspendisse tempus nibh ac velit interdum rutrum. Aliquam ullamcorper bibendum elit eget egestas. Pellentesque sodales, justo at feugiat sagittis, quam massa luctus leo, et facilisis tortor nibh mollis nulla. Nulla facilisis sem et dolor congue nec porta enim varius. Quisque ac dolor felis, in laoreet est. Sed a urna est. Phasellus sed elementum ipsum. Aliquam a ante vitae orci tincidunt volutpat ut sed tellus. Vivamus feugiat neque vel arcu accumsan eu pulvinar lorem rhoncus. Maecenas eget venenatis lectus. Maecenas eget nisl lectus, sit amet sodales tellus. Vestibulum imperdiet imperdiet metus, placerat mollis mi mattis ac. Suspendisse metus diam, ultrices vel lobortis non, ultricies non libero.', 'Mobile-wireless-router.jpg', '2013-05-16'),
(6, 9, 'USB Modem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed tristique diam. Suspendisse tempus nibh ac velit interdum rutrum. Aliquam ullamcorper bibendum elit eget egestas. Pellentesque sodales, justo at feugiat sagittis, quam massa luctus leo, et facilisis tortor nibh mollis nulla. Nulla facilisis sem et dolor congue nec porta enim varius. Quisque ac dolor felis, in laoreet est. Sed a urna est. Phasellus sed elementum ipsum. Aliquam a ante vitae orci tincidunt volutpat ut sed tellus. Vivamus feugiat neque vel arcu accumsan eu pulvinar lorem rhoncus. Maecenas eget venenatis lectus. Maecenas eget nisl lectus, sit amet sodales tellus. Vestibulum imperdiet imperdiet metus, placerat mollis mi mattis ac. Suspendisse metus diam, ultrices vel lobortis non, ultricies non libero.', 'Vodafone-550.gif', '2013-05-14'),
(7, 9, 'Vodafone Samsung', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed tristique diam. Suspendisse tempus nibh ac velit interdum rutrum. Aliquam ullamcorper bibendum elit eget egestas. Pellentesque sodales, justo at feugiat sagittis, quam massa luctus leo, et facilisis tortor nibh mollis nulla. Nulla facilisis sem et dolor congue nec porta enim varius. Quisque ac dolor felis, in laoreet est. Sed a urna est. Phasellus sed elementum ipsum. Aliquam a ante vitae orci tincidunt volutpat ut sed tellus. Vivamus feugiat neque vel arcu accumsan eu pulvinar lorem rhoncus. Maecenas eget venenatis lectus. Maecenas eget nisl lectus, sit amet sodales tellus. Vestibulum imperdiet imperdiet metus, placerat mollis mi mattis ac. Suspendisse metus diam, ultrices vel lobortis non, ultricies non libero.', 'vodafone-samsung.jpg', '2013-05-07'),
(8, 9, 'Local Phone', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed tristique diam. Suspendisse tempus nibh ac velit interdum rutrum. Aliquam ullamcorper bibendum elit eget egestas. Pellentesque sodales, justo at feugiat sagittis, quam massa luctus leo, et facilisis tortor nibh mollis nulla. Nulla facilisis sem et dolor congue nec porta enim varius. Quisque ac dolor felis, in laoreet est. Sed a urna est. Phasellus sed elementum ipsum. Aliquam a ante vitae orci tincidunt volutpat ut sed tellus. Vivamus feugiat neque vel arcu accumsan eu pulvinar lorem rhoncus. Maecenas eget venenatis lectus. Maecenas eget nisl lectus, sit amet sodales tellus. Vestibulum imperdiet imperdiet metus, placerat mollis mi mattis ac. Suspendisse metus diam, ultrices vel lobortis non, ultricies non libero.', '5924.jpg', '2013-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `sub_department`
--

CREATE TABLE IF NOT EXISTS `sub_department` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned NOT NULL,
  `department_id` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `sub_depart_manager` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_sub_department_1` (`department_id`),
  KEY `FK_sub_department_2` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `sub_department`
--

INSERT INTO `sub_department` (`id`, `company_id`, `department_id`, `name`, `sub_depart_manager`) VALUES
(16, 8, 5, 'kol', '66'),
(17, 8, 6, 'ioi', '66'),
(18, 8, 7, 'jojo', '19'),
(19, 7, 16, 'money', 'badran'),
(20, 7, 17, 'baaad', 'gado'),
(21, 7, 18, 'logic', 'mostafa'),
(22, 7, 19, 'tea', 'radwan'),
(23, 9, 20, 'money', 'radwan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(145) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `jops_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `email`, `jops_id`, `product_id`, `password`, `username`, `gender`, `country`) VALUES
(4, '', '', 'temraz@yahoo.com', 0, 0, '202cb962ac59075b964b07152d234b70', 'sdfsd', 'male', 'egypt'),
(5, NULL, NULL, 'temraz2@yahoo.com', 0, 0, '81dc9bdb52d04dc20036dbd8313ed055', '12323', 'male', 'egypt'),
(6, NULL, NULL, 'temraz90@yahoo.com', 0, 0, '202cb962ac59075b964b07152d234b70', 'rt', 'male', 'egypt'),
(7, NULL, NULL, 'temraztr@yahoo.com', 0, 0, '202cb962ac59075b964b07152d234b70', 'erer', 'male', 'england'),
(8, NULL, NULL, 'temraztt@yahoo.com', 0, 0, '827ccb0eea8a706c4c34a16891f84e7b', 'wer', 'male', 'egypt'),
(9, NULL, NULL, 'yyy@yahoo.com', 0, 0, '202cb962ac59075b964b07152d234b70', 'temraz2', 'female', 'england'),
(10, NULL, NULL, 'ahmed@yahoo.com', 0, 0, '827ccb0eea8a706c4c34a16891f84e7b', 'temr', 'male', 'egypt'),
(11, NULL, NULL, 'hawata@yahoo.com', 0, 0, '202cb962ac59075b964b07152d234b70', 'hawata', 'male', 'egypt'),
(12, NULL, NULL, 'sheir@yahoo.com', 0, 0, 'e10adc3949ba59abbe56e057f20f883e', 'sheir', 'male', 'egypt');

--
-- Constraints for dumped tables
--

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
