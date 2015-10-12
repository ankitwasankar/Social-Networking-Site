-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2015 at 08:20 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

create database sns;
use sns;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sns`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment_info`
--

CREATE TABLE IF NOT EXISTS `comment_info` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_type` varchar(50) NOT NULL DEFAULT 'post',
  `id` int(11) NOT NULL COMMENT 'id can post_id, status_id or profile pic 0',
  `user_id` int(11) NOT NULL,
  `comment_data` varchar(800) NOT NULL DEFAULT 'na',
  `number_likes` int(11) NOT NULL DEFAULT '0',
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`),
  KEY `post_id` (`id`),
  KEY `user_id foreign key` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comment_like`
--

CREATE TABLE IF NOT EXISTS `comment_like` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  KEY `comment_id` (`comment_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friend_info`
--

CREATE TABLE IF NOT EXISTS `friend_info` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `friend_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `friend_status` varchar(50) NOT NULL DEFAULT 'pending',
  `friend_rank` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`f_id`),
  KEY `user_info foreign key1` (`user_id`),
  KEY `friend_id foreign` (`friend_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=148 ;

--
-- Dumping data for table `friend_info`
--

INSERT INTO `friend_info` (`f_id`, `user_id`, `friend_id`, `friend_time`, `friend_status`, `friend_rank`) VALUES
(4, 6, 6, '2015-02-15 05:17:09', 'confirmed', 1),
(5, 7, 7, '2015-02-15 05:50:27', 'confirmed', 1),
(7, 9, 9, '2015-02-15 06:00:14', 'confirmed', 1),
(9, 9, 7, '2015-02-15 06:04:36', 'pending', 1),
(10, 10, 10, '2015-02-15 06:08:21', 'confirmed', 1),
(12, 10, 7, '2015-02-15 06:54:19', 'pending', 1),
(13, 10, 9, '2015-02-15 06:54:20', 'pending', 1),
(15, 11, 11, '2015-02-15 06:58:39', 'confirmed', 1),
(17, 11, 7, '2015-02-15 06:58:49', 'pending', 1),
(18, 11, 9, '2015-02-15 06:58:50', 'pending', 1),
(19, 11, 10, '2015-02-15 06:58:51', 'pending', 1),
(20, 12, 12, '2015-02-15 06:59:43', 'confirmed', 1),
(22, 12, 7, '2015-02-15 07:00:01', 'pending', 1),
(23, 12, 9, '2015-02-15 07:00:02', 'pending', 1),
(24, 12, 10, '2015-02-15 07:00:03', 'pending', 1),
(25, 12, 11, '2015-02-15 07:00:05', 'pending', 1),
(26, 13, 13, '2015-02-15 07:01:04', 'confirmed', 1),
(28, 13, 7, '2015-02-15 07:01:19', 'pending', 1),
(29, 13, 9, '2015-02-15 07:01:20', 'pending', 1),
(30, 13, 10, '2015-02-15 07:01:21', 'pending', 1),
(31, 13, 12, '2015-02-15 07:01:23', 'pending', 1),
(32, 13, 11, '2015-02-15 07:01:24', 'pending', 1),
(33, 14, 14, '2015-02-15 07:02:10', 'confirmed', 1),
(35, 14, 7, '2015-02-15 07:02:31', 'pending', 1),
(36, 14, 9, '2015-02-15 07:02:32', 'pending', 1),
(37, 14, 10, '2015-02-15 07:02:33', 'pending', 1),
(38, 14, 13, '2015-02-15 07:02:34', 'pending', 1),
(39, 14, 12, '2015-02-15 07:02:35', 'pending', 1),
(40, 14, 11, '2015-02-15 07:02:36', 'pending', 1),
(41, 15, 15, '2015-02-15 07:03:39', 'confirmed', 1),
(43, 15, 7, '2015-02-15 07:03:48', 'pending', 1),
(44, 15, 9, '2015-02-15 07:03:49', 'pending', 1),
(45, 15, 10, '2015-02-15 07:03:50', 'pending', 1),
(46, 15, 11, '2015-02-15 07:03:59', 'pending', 1),
(47, 15, 12, '2015-02-15 07:04:00', 'pending', 1),
(48, 16, 16, '2015-02-15 07:04:53', 'confirmed', 1),
(49, 17, 17, '2015-02-15 07:06:06', 'confirmed', 1),
(51, 17, 7, '2015-02-15 07:06:19', 'pending', 1),
(52, 17, 9, '2015-02-15 07:06:22', 'pending', 1),
(53, 17, 13, '2015-02-15 07:06:28', 'pending', 1),
(54, 17, 12, '2015-02-15 07:06:29', 'pending', 1),
(55, 17, 16, '2015-02-15 07:06:30', 'pending', 1),
(56, 17, 15, '2015-02-15 07:06:31', 'pending', 1),
(57, 18, 18, '2015-02-15 07:07:56', 'confirmed', 1),
(59, 19, 19, '2015-02-15 07:09:36', 'confirmed', 1),
(60, 20, 20, '2015-02-15 07:10:15', 'confirmed', 1),
(61, 21, 21, '2015-02-15 07:11:20', 'confirmed', 1),
(64, 21, 7, '2015-02-15 07:11:43', 'pending', 1),
(65, 21, 9, '2015-02-15 07:11:44', 'pending', 1),
(66, 21, 10, '2015-02-15 07:11:45', 'pending', 1),
(67, 21, 19, '2015-02-15 07:11:55', 'pending', 1),
(68, 21, 20, '2015-02-15 07:11:56', 'pending', 1),
(142, 6, 11, '2015-02-17 16:32:50', 'pending', 1),
(143, 6, 7, '2015-02-17 16:33:17', 'pending', 1),
(144, 6, 9, '2015-02-17 16:33:27', 'pending', 1),
(145, 6, 12, '2015-02-17 16:35:40', 'pending', 1),
(146, 6, 10, '2015-02-17 16:38:48', 'pending', 1),
(147, 6, 14, '2015-02-17 16:48:13', 'pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `image_info`
--

CREATE TABLE IF NOT EXISTS `image_info` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `image_type` varchar(50) NOT NULL DEFAULT 'post',
  `id` int(11) NOT NULL DEFAULT '0' COMMENT 'id can match with post_id, comment_id according to type of image or can be 0 for profile pic',
  `image_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`image_id`),
  KEY `user_info foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `image_info`
--

INSERT INTO `image_info` (`image_id`, `user_id`, `image_type`, `id`, `image_time`) VALUES
(48, 6, 'post', 33, '2015-02-15 05:19:08'),
(49, 6, 'post', 34, '2015-02-15 05:24:47'),
(50, 6, 'post', 35, '2015-02-15 05:31:02'),
(51, 6, 'post', 36, '2015-02-15 05:40:42'),
(52, 6, 'post', 37, '2015-02-15 05:45:20'),
(53, 7, 'post', 39, '2015-02-15 05:54:36'),
(54, 7, 'post', 40, '2015-02-15 05:57:43'),
(55, 9, 'post', 42, '2015-02-15 06:02:39'),
(56, 9, 'post', 42, '2015-02-15 06:02:39'),
(57, 10, 'post', 44, '2015-02-15 06:54:09'),
(58, 6, 'post', 56, '2015-02-15 07:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

CREATE TABLE IF NOT EXISTS `login_info` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(120) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(30) NOT NULL,
  `system` varchar(60) NOT NULL,
  `browser` varchar(60) NOT NULL,
  `login_status` varchar(20) NOT NULL DEFAULT 'successful',
  PRIMARY KEY (`login_id`),
  KEY `login_info user_email index` (`user_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`login_id`, `user_email`, `login_time`, `ip`, `system`, `browser`, `login_status`) VALUES
(48, 'ankit.wasankar12@gmail.com', '2015-02-15 05:17:09', '127.0.0.1', 'Unknown Windows OS', 'Chrome 40.0.2214.111', 'Successful'),
(49, 'mangeshhajare787@gmail.com', '2015-02-15 05:50:27', '127.0.0.1', 'Unknown Windows OS', 'Chrome 40.0.2214.111', 'Successful'),
(50, 'bharuka.rohit4@gmail.com', '2015-02-15 06:00:14', '127.0.0.1', 'Unknown Windows OS', 'Chrome 40.0.2214.111', 'Successful'),
(51, 'bharuka.rohit4@gmail.com', '2015-02-15 06:04:31', '127.0.0.1', 'Unknown Windows OS', 'Chrome 40.0.2214.111', 'Successful'),
(52, 'jinu.george54@gmail.com', '2015-02-15 06:08:21', '127.0.0.1', 'Unknown Windows OS', 'Chrome 40.0.2214.111', 'Successful'),
(53, 'ankit.wasankar12@gmail.com', '2015-02-15 06:54:46', '127.0.0.1', 'Unknown Windows OS', 'Chrome 40.0.2214.111', 'Successful'),
(54, 'sandypaikarkala@gmail.com', '2015-02-15 06:58:39', '127.0.0.1', 'Unknown Windows OS', 'Chrome 40.0.2214.111', 'Successful'),
(55, 'varunpn.yeslur@gmail.com', '2015-02-15 06:59:43', '127.0.0.1', 'Unknown Windows OS', 'Chrome 40.0.2214.111', 'Successful'),
(56, 'sagarudasi@hotmail.com', '2015-02-15 07:01:04', '127.0.0.1', 'Unknown Windows OS', 'Chrome 40.0.2214.111', 'Successful'),
(57, 'ashish.vaish@yahoo.com', '2015-02-15 07:02:10', '127.0.0.1', 'Unknown Windows OS', 'Chrome 40.0.2214.111', 'Successful'),
(58, 'pranalimantri7@gmail.com', '2015-02-15 07:03:39', '127.0.0.1', 'Unknown Windows OS', 'Chrome 40.0.2214.111', 'Successful'),
(59, 'rathi.sagar36@gmail.com', '2015-02-15 07:04:54', '127.0.0.1', 'Unknown Windows OS', 'Chrome 40.0.2214.111', 'Successful'),
(60, 'ashwinbalani@fitech.co.in', '2015-02-15 07:06:06', '127.0.0.1', 'Unknown Windows OS', 'Chrome 40.0.2214.111', 'Successful'),
(61, 'wasankar.neha@gmail.com', '2015-02-15 07:07:56', '127.0.0.1', 'Unknown Windows OS', 'Chrome 40.0.2214.111', 'Successful'),
(62, 'prashantagrawal39@hotmail.com', '2015-02-15 07:09:37', '127.0.0.1', 'Unknown Windows OS', 'Chrome 40.0.2214.111', 'Successful'),
(63, 'manishagrawal052@gmail.com', '2015-02-15 07:10:16', '127.0.0.1', 'Unknown Windows OS', 'Chrome 40.0.2214.111', 'Successful'),
(64, 'talktous@repaireasy.in', '2015-02-15 07:11:21', '127.0.0.1', 'Unknown Windows OS', 'Chrome 40.0.2214.111', 'Successful'),
(65, 'ankit.wasankar12@gmail.com', '2015-02-15 07:12:43', '127.0.0.1', 'Unknown Windows OS', 'Chrome 40.0.2214.111', 'Successful'),
(66, 'pranalimantri7@gmail.com', '2015-02-15 07:14:15', '127.0.0.1', 'Unknown Windows OS', 'Chrome 40.0.2214.111', 'Successful'),
(67, 'ankit.wasankar12@gmail.com', '2015-02-15 07:14:38', '127.0.0.1', 'Unknown Windows OS', 'Chrome 40.0.2214.111', 'Successful'),
(68, 'pranalimantri7@gmail.com', '2015-02-15 07:16:35', '127.0.0.1', 'Unknown Windows OS', 'Chrome 40.0.2214.111', 'Successful'),
(69, 'ashish.vaish@yahoo.com', '2015-02-15 07:17:00', '127.0.0.1', 'Unknown Windows OS', 'Chrome 40.0.2214.111', 'Successful'),
(70, 'mangeshhajare787@gmail.com', '2015-02-15 07:17:38', '127.0.0.1', 'Unknown Windows OS', 'Chrome 40.0.2214.111', 'Successful'),
(71, 'ankit.wasankar12@gmail.com', '2015-02-15 07:18:14', '127.0.0.1', 'Unknown Windows OS', 'Chrome 40.0.2214.111', 'Successful'),
(72, 'ankit.wasankar12@gmail.com', '2015-02-15 07:31:35', '127.8.155.129', 'Unknown Windows OS', 'Firefox 35.0', 'Successful'),
(73, 'ankit.wasankar12@gmail.com', '2015-02-15 08:41:36', '127.8.155.129', 'Unknown Windows OS', 'Firefox 35.0', 'Successful'),
(74, 'ankit.wasankar12@gmail.com', '2015-02-15 16:57:47', '127.8.155.129', 'Unknown Windows OS', 'Firefox 35.0', 'Successful'),
(75, 'ankit.wasankar12@gmail.com', '2015-02-16 06:50:58', '127.8.155.129', 'Unknown Windows OS', 'Firefox 35.0', 'Successful'),
(76, 'ankit.wasankar12@gmail.com', '2015-02-16 12:22:26', '127.8.155.129', 'Unknown Windows OS', 'Firefox 35.0', 'Successful'),
(77, 'ankit.wasankar12@gmail.com', '2015-02-17 07:22:29', '127.8.155.129', 'Unknown Windows OS', 'Firefox 35.0', 'Successful'),
(78, 'ankit.wasankar12@gmail.com', '2015-02-17 09:40:57', '127.8.155.129', 'Unknown Windows OS', 'Firefox 35.0', 'Unsuccessful'),
(79, 'ankit.wasankar12@gmail.com', '2015-02-17 09:41:03', '127.8.155.129', 'Unknown Windows OS', 'Firefox 35.0', 'Successful'),
(80, 'ankit.wasankar12@gmail.com', '2015-02-17 12:14:20', '127.0.0.1', 'Unknown Windows OS', 'Firefox 35.0', 'Successful'),
(81, 'ankit.wasankar12@gmail.com', '2015-02-17 12:51:59', '127.0.0.1', 'Unknown Windows OS', 'Firefox 35.0', 'Successful'),
(82, 'mangeshhajare787@gmail.com', '2015-02-17 13:25:03', '127.0.0.1', 'Unknown Windows OS', 'Chrome 40.0.2214.111', 'Successful'),
(83, 'ankit.wasankar12@gmail.com', '2015-02-17 13:52:18', '127.0.0.1', 'Unknown Windows OS', 'Firefox 35.0', 'Successful'),
(84, 'ankit.wasankar12@gmail.com', '2015-02-17 13:53:50', '127.0.0.1', 'Unknown Windows OS', 'Firefox 35.0', 'Successful'),
(85, 'ankit.wasankar12@gmail.com', '2015-02-18 06:13:41', '127.0.0.1', 'Unknown Windows OS', 'Firefox 35.0', 'Successful'),
(86, 'ankit.wasankar12@gmail.com', '2015-03-14 19:18:31', '127.0.0.1', 'Unknown Windows OS', 'Firefox 35.0', 'Successful');

-- --------------------------------------------------------

--
-- Table structure for table `post_info`
--

CREATE TABLE IF NOT EXISTS `post_info` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_data` varchar(1000) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `number_likes` int(11) NOT NULL DEFAULT '0',
  `number_comments` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`),
  KEY `userid foreign key` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `post_info`
--

INSERT INTO `post_info` (`post_id`, `user_id`, `post_data`, `post_time`, `number_likes`, `number_comments`) VALUES
(32, 6, 'welcome to SNS. You can connect to your friends and start sharing whats on your mind. Search your friends and connect. Enjoy your journey with SNS.', '2015-02-15 05:17:09', 0, 0),
(33, 6, 'Good morning friends. Enjoying the India vs Pakistan match. Lots of excitement.', '2015-02-15 05:19:08', 0, 0),
(34, 6, 'David Miller on fire. South Africa vs Zimbabwe. Best ever shots. Will score a big target.', '2015-02-15 05:24:47', 0, 0),
(35, 6, 'Harvey likes to win his cases outside of court because going to court is expensive. Just like with anything else, if you can find an option that allows you to win your battles without actually having to go to war, take it.', '2015-02-15 05:31:02', 0, 0),
(36, 6, 'This is one of those glass half empty or glass half full kinda things. If you frame your mind in a way that always looks to minimize your losses, you are never going to make it big in life', '2015-02-15 05:40:42', 0, 0),
(37, 6, 'Never forget what you are, for surely the world will not. Make it your strength. Then it can never be your weakness. Armour yourself in it, and it will never be used to hurt you.', '2015-02-15 05:45:19', 0, 0),
(38, 7, 'welcome to SNS. You can connect to your friends and start sharing whats on your mind. Search your friends and connect. Enjoy your journey with SNS.', '2015-02-15 05:50:27', 0, 0),
(39, 7, 'The mobile messaging service has introduced a new feature by which users can access it even through a web browser\r\nMobile messaging service Whatsapp is now available in web server.', '2015-02-15 05:54:36', 0, 0),
(40, 7, 'State Bank numbers are definitely good. It is much better than the expectations, particularly the asset quality, the restructuring bit is quite impressive. We have seen the PNB and some of the large PSU banks really suffering this quarter.', '2015-02-15 05:57:42', 0, 0),
(41, 9, 'welcome to SNS. You can connect to your friends and start sharing whats on your mind. Search your friends and connect. Enjoy your journey with SNS.', '2015-02-15 06:00:14', 0, 0),
(42, 9, 'There is great rivalry between the two teams but the players have so far looked extremely professional. Apart from one minor instance where Dhawan stared at the bowler, there have been no unfortunate incident. Even when Afridi threw at the stumps but hit Kohli on his back, the Indian only smiled to show his pain.', '2015-02-15 06:02:39', 0, 0),
(43, 10, 'welcome to SNS. You can connect to your friends and start sharing whats on your mind. Search your friends and connect. Enjoy your journey with SNS.', '2015-02-15 06:08:21', 0, 0),
(44, 10, 'Hinjawadi is a locality now treated as the IT Village of Pune which is located on the NH4 bypass around the city of Pune in India. Hinjawadi is the locality in the western part of Pune, the seventh largest metropolis in India. Its largely been known as home for the top IT Companies in India but it is also home of companies like Emcure, henkel, Advinus etc. Originally a small village, it is now the location of Rajiv Gandhi Infotech Park, housing around twenty software companies as listed below.', '2015-02-15 06:54:08', 0, 0),
(45, 11, 'welcome to SNS. You can connect to your friends and start sharing whats on your mind. Search your friends and connect. Enjoy your journey with SNS.', '2015-02-15 06:58:39', 0, 0),
(46, 12, 'welcome to SNS. You can connect to your friends and start sharing whats on your mind. Search your friends and connect. Enjoy your journey with SNS.', '2015-02-15 06:59:43', 0, 0),
(47, 13, 'welcome to SNS. You can connect to your friends and start sharing whats on your mind. Search your friends and connect. Enjoy your journey with SNS.', '2015-02-15 07:01:04', 0, 0),
(48, 14, 'welcome to SNS. You can connect to your friends and start sharing whats on your mind. Search your friends and connect. Enjoy your journey with SNS.', '2015-02-15 07:02:10', 0, 0),
(49, 15, 'welcome to SNS. You can connect to your friends and start sharing whats on your mind. Search your friends and connect. Enjoy your journey with SNS.', '2015-02-15 07:03:39', 0, 0),
(50, 16, 'welcome to SNS. You can connect to your friends and start sharing whats on your mind. Search your friends and connect. Enjoy your journey with SNS.', '2015-02-15 07:04:53', 0, 0),
(51, 17, 'welcome to SNS. You can connect to your friends and start sharing whats on your mind. Search your friends and connect. Enjoy your journey with SNS.', '2015-02-15 07:06:06', 0, 0),
(52, 18, 'welcome to SNS. You can connect to your friends and start sharing whats on your mind. Search your friends and connect. Enjoy your journey with SNS.', '2015-02-15 07:07:56', 0, 0),
(53, 19, 'welcome to SNS. You can connect to your friends and start sharing whats on your mind. Search your friends and connect. Enjoy your journey with SNS.', '2015-02-15 07:09:36', 0, 0),
(54, 20, 'welcome to SNS. You can connect to your friends and start sharing whats on your mind. Search your friends and connect. Enjoy your journey with SNS.', '2015-02-15 07:10:15', 0, 0),
(55, 21, 'welcome to SNS. You can connect to your friends and start sharing whats on your mind. Search your friends and connect. Enjoy your journey with SNS.', '2015-02-15 07:11:20', 0, 0),
(56, 6, 'Prematl jagan aani maran anubhavlelyanna \r\nPremachya aagit nahak\r\n jalalelyana\r\n\r\nSajjan panachya navakhalee premat n padlelyanna\r\nAni premat hajarda padun mati khalelyanna\r\n\r\nTharthartya hatanni ka hoina gulab denaryanna \r\nMi tuza tasa vichar kela nahi he waky anekda aiknaryanna\r\n\r\nBhitikhatr sagl manat dabun thevnaryanna..\r\nAni ti ali ki gadbadun kahi badbadnaryanna\r\n\r\nZbridge wr bindhast pane kushi sajawnaryanna\r\nAni bhagwya zendyanche fukat fatke khanaryanna\r\n\r\nPremamdhe  saglee duniyadaree shiklelyanna\r\nPremakhatr sarya duniyeshi panga ghenaryanna\r\n\r\nPremamdhe gulabi swapn pahnaryanna\r\nAni sodun gelyawr daruchya dhundit nachnaryanna', '2015-02-15 07:21:39', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_like`
--

CREATE TABLE IF NOT EXISTS `post_like` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  KEY `post_id foreign key` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile_info`
--

CREATE TABLE IF NOT EXISTS `profile_info` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `about` varchar(500) NOT NULL DEFAULT 'na',
  `relationship` varchar(20) NOT NULL DEFAULT 'single',
  `location` varchar(50) NOT NULL DEFAULT 'na',
  `hobbies` varchar(200) NOT NULL DEFAULT 'na',
  `fav_books` varchar(800) NOT NULL DEFAULT 'na',
  PRIMARY KEY (`profile_id`),
  KEY `userID foreign2` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `profile_info`
--

INSERT INTO `profile_info` (`profile_id`, `user_id`, `about`, `relationship`, `location`, `hobbies`, `fav_books`) VALUES
(4, 6, 'na', 'single', 'na', 'na', 'na'),
(5, 7, 'na', 'single', 'na', 'na', 'na'),
(6, 9, 'na', 'single', 'na', 'na', 'na'),
(7, 10, 'na', 'single', 'na', 'na', 'na'),
(8, 11, 'na', 'single', 'na', 'na', 'na'),
(9, 12, 'na', 'single', 'na', 'na', 'na'),
(10, 13, 'na', 'single', 'na', 'na', 'na'),
(11, 14, 'na', 'single', 'na', 'na', 'na'),
(12, 15, 'na', 'single', 'na', 'na', 'na'),
(13, 16, 'na', 'single', 'na', 'na', 'na'),
(14, 17, 'na', 'single', 'na', 'na', 'na'),
(15, 18, 'na', 'single', 'na', 'na', 'na'),
(16, 19, 'na', 'single', 'na', 'na', 'na'),
(17, 20, 'na', 'single', 'na', 'na', 'na'),
(18, 21, 'na', 'single', 'na', 'na', 'na');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(120) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `join_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verify_condition` varchar(20) NOT NULL DEFAULT 'unverified',
  `status` varchar(20) NOT NULL DEFAULT 'online',
  `first_name` varchar(60) NOT NULL DEFAULT 'na',
  `last_name` varchar(60) NOT NULL DEFAULT 'na',
  `mobile_number` varchar(20) NOT NULL DEFAULT 'na',
  `gender` varchar(20) NOT NULL DEFAULT 'na',
  `profile_pic` int(120) NOT NULL DEFAULT '0',
  `security_question` varchar(50) NOT NULL DEFAULT 'What is your favourite food item?',
  `security_answer` varchar(60) NOT NULL DEFAULT 'na',
  `verify_code` varchar(40) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `user_email`, `user_name`, `password`, `join_time`, `verify_condition`, `status`, `first_name`, `last_name`, `mobile_number`, `gender`, `profile_pic`, `security_question`, `security_answer`, `verify_code`) VALUES
(6, 'ankit.wasankar12@gmail.com', 'ankit.wasankar12@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2015-02-15 05:17:09', 'unverified', 'online', 'Ankit', 'Wasankar', 'na', 'na', 0, 'What is your favourite food item?', 'na', '91481444'),
(7, 'mangeshhajare787@gmail.com', 'mangeshhajare787@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2015-02-15 05:50:27', 'unverified', 'online', 'magesh', 'hajare', 'na', 'na', 0, 'What is your favourite food item?', 'na', '1227778'),
(9, 'bharuka.rohit4@gmail.com', 'bharuka.rohit4@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2015-02-15 06:00:14', 'unverified', 'online', 'Rohit', 'Bharuka', 'na', 'na', 0, 'What is your favourite food item?', 'na', '66876726'),
(10, 'jinu.george54@gmail.com', 'jinu.george54@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2015-02-15 06:08:21', 'unverified', 'online', 'Jinu', 'George', 'na', 'na', 0, 'What is your favourite food item?', 'na', '30669783'),
(11, 'sandypaikarkala@gmail.com', 'sandypaikarkala@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2015-02-15 06:58:39', 'unverified', 'online', 'Sandhya', 'Pai', 'na', 'na', 0, 'What is your favourite food item?', 'na', '80085605'),
(12, 'varunpn.yeslur@gmail.com', 'varunpn.yeslur@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2015-02-15 06:59:43', 'unverified', 'online', 'Varun', 'Yeslur', 'na', 'na', 0, 'What is your favourite food item?', 'na', '78206221'),
(13, 'sagarudasi@hotmail.com', 'sagarudasi@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2015-02-15 07:01:04', 'unverified', 'online', 'Sagar', 'Udasi', 'na', 'na', 0, 'What is your favourite food item?', 'na', '85150691'),
(14, 'ashish.vaish@yahoo.com', 'ashish.vaish@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '2015-02-15 07:02:10', 'unverified', 'online', 'Ashish', 'Vaish', 'na', 'na', 0, 'What is your favourite food item?', 'na', '39101123'),
(15, 'pranalimantri7@gmail.com', 'pranalimantri7@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2015-02-15 07:03:39', 'unverified', 'online', 'Pranali', 'Mantri', 'na', 'na', 0, 'What is your favourite food item?', 'na', '29756220'),
(16, 'rathi.sagar36@gmail.com', 'rathi.sagar36@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2015-02-15 07:04:53', 'unverified', 'online', 'Sagar', 'Rathi', 'na', 'na', 0, 'What is your favourite food item?', 'na', '82758898'),
(17, 'ashwinbalani@fitech.co.in', 'ashwinbalani@fitech.co.in', '827ccb0eea8a706c4c34a16891f84e7b', '2015-02-15 07:06:06', 'unverified', 'online', 'Ashwin', 'Balani', 'na', 'na', 0, 'What is your favourite food item?', 'na', '25653061'),
(18, 'wasankar.neha@gmail.com', 'wasankar.neha@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2015-02-15 07:07:56', 'unverified', 'online', 'Neha', 'Wasankar', 'na', 'na', 0, 'What is your favourite food item?', 'na', '62480535'),
(19, 'prashantagrawal39@hotmail.com', 'prashantagrawal39@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2015-02-15 07:09:36', 'unverified', 'online', 'Prashant', 'Agrawal', 'na', 'na', 0, 'What is your favourite food item?', 'na', '30323390'),
(20, 'manishagrawal052@gmail.com', 'manishagrawal052@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2015-02-15 07:10:15', 'unverified', 'online', 'Manish', 'Agrawal', 'na', 'na', 0, 'What is your favourite food item?', 'na', '22964364'),
(21, 'talktous@repaireasy.in', 'talktous@repaireasy.in', '827ccb0eea8a706c4c34a16891f84e7b', '2015-02-15 07:11:20', 'unverified', 'online', 'Rishi', 'Wahi', 'na', 'na', 0, 'What is your favourite food item?', 'na', '86881160');

--
-- Triggers `user_info`
--
DROP TRIGGER IF EXISTS `new_user_friend`;
DELIMITER //
CREATE TRIGGER `new_user_friend` AFTER INSERT ON `user_info`
 FOR EACH ROW BEGIN
    insert into friend_info(user_id,friend_id,friend_status) values(new.user_id,new.user_id,'confirmed');
    insert into profile_info(user_id) values (new.user_id); 
    insert into post_info(user_id,post_data) values(new.user_id,"welcome to SNS. You can connect to your friends and start sharing whats on your mind. Search your friends and connect. Enjoy your journey with SNS.");

END
//
DELIMITER ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_info`
--
ALTER TABLE `comment_info`
  ADD CONSTRAINT `user_id foreign key` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment_like`
--
ALTER TABLE `comment_like`
  ADD CONSTRAINT `comment_id` FOREIGN KEY (`comment_id`) REFERENCES `comment_info` (`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `friend_info`
--
ALTER TABLE `friend_info`
  ADD CONSTRAINT `friend_id foreign` FOREIGN KEY (`friend_id`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_info foreign key1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `image_info`
--
ALTER TABLE `image_info`
  ADD CONSTRAINT `user_info foreign` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login_info`
--
ALTER TABLE `login_info`
  ADD CONSTRAINT `user_email foreign key` FOREIGN KEY (`user_email`) REFERENCES `user_info` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_info`
--
ALTER TABLE `post_info`
  ADD CONSTRAINT `userid foreign key` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_like`
--
ALTER TABLE `post_like`
  ADD CONSTRAINT `post_id foreign key` FOREIGN KEY (`post_id`) REFERENCES `post_info` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile_info`
--
ALTER TABLE `profile_info`
  ADD CONSTRAINT `userID foreign2` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
