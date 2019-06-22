-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 22, 2019 at 12:46 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mds_backup`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

DROP TABLE IF EXISTS `abouts`;
CREATE TABLE IF NOT EXISTS `abouts` (
  `id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `short_disc` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `full_disc` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `active`, `image`, `video`, `short_disc`, `full_disc`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'images/about/25307902018-05-04-.jpg', 'Hian4dM4GQo', 'MDS \"Master Dental Society\" is a fast growing organization that provides you with innovating Dental Continuing Education programs.', 'full descfull descfull descfull descfull descfull descfull descfull desc', NULL, NULL, '2018-05-04 21:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `active`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'cairo', NULL, NULL, NULL),
(2, 1, 'alex', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

DROP TABLE IF EXISTS `configs`;
CREATE TABLE IF NOT EXISTS `configs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `email` varchar(200) DEFAULT NULL,
  `intro_video` varchar(100) DEFAULT NULL,
  `courses_number` int(11) DEFAULT NULL,
  `events_number` int(11) DEFAULT NULL,
  `students_number` int(11) DEFAULT NULL,
  `location` varchar(250) DEFAULT NULL,
  `satisfied_students` int(11) DEFAULT NULL,
  `youtube` varchar(250) DEFAULT NULL,
  `face` varchar(250) DEFAULT NULL,
  `insta` varchar(250) DEFAULT NULL,
  `twitter` varchar(250) DEFAULT NULL,
  `linked` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `active`, `email`, `intro_video`, `courses_number`, `events_number`, `students_number`, `location`, `satisfied_students`, `youtube`, `face`, `insta`, `twitter`, `linked`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'info@mds.com', 'xsuFtkaLri4', 3, 15, 264, 'el dokky', 98, 'https://www.youtube.com/channel/UCuEzfCATYDasY_65lRKRGWg', 'https://www.facebook.com/MDSEGYPT/', NULL, NULL, 'https://www.linkedin.com', NULL, '2018-05-05 11:19:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `active`, `fname`, `lname`, `email`, `company`, `message`, `phone`, `job_title`, `deleted_at`, `created_at`, `updated_at`) VALUES
(9, 1, 'karm', 'akaa', 'ka@mm.com', 'none', 'this is me message', '01152442523', 'engi', NULL, '2018-01-21 20:23:26', '2018-01-21 20:23:26');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `small_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `big_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `slide_visible` tinyint(1) NOT NULL DEFAULT '1',
  `home_visible` tinyint(1) NOT NULL DEFAULT '1',
  `short_disc` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `full_disc` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `page_link` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `active`, `name`, `small_image`, `big_image`, `video`, `slide_visible`, `home_visible`, `short_disc`, `full_disc`, `page_link`, `deleted_at`, `created_at`, `updated_at`) VALUES
(25, 1, 'PHP Course', 'images/courses/57196852018-05-01-PHP Course.jpg', 'images/courses/20791932018-05-04-PHP Course.jpg', 'vrBnANLOPss', 0, 1, 'learn php perfectly  learn php perfectly   learn php perfectly   learn php perfectly', 'Learn php Now in php course with high level teachers', 'https://soundcloud.com/karim-alaa-94/sets/karims-classes', NULL, '2018-01-01 09:41:53', '2018-05-14 15:07:23'),
(28, 1, 'sdgsdgsdghsdg', 'images/courses/39148812018-05-01-sdgsdgsdghsdg.jpg', 'images/courses/57478932018-05-04-sdgsdgsdghsdg.jpg', 'sdhsdhsdhsdh', 0, 1, 'gsdgsdgsdgsdgsdgsdgsdg<br />\r\ngsdsdgsdgsdgsdgsdgsdgsdgs', 'gsdgsdgsdgsdgsdgsdgsdgsdgsdgsdgsdgsdgsdgsdgsdgsdgsdgsdg', 'https://soundcloud.com/karim-alaa-94/sets/karims-classes', NULL, '2018-04-21 11:35:39', '2018-05-04 14:33:02'),
(29, 1, 'sdgsdgsdghsdg', 'images/courses/73272262018-05-01-sdgsdgsdghsdg.jpeg', 'images/courses/21981312018-05-04-sdgsdgsdghsdg.jpg', 'sdhsdhsdhsdh', 0, 1, 'gsdgsdgsdgsdgsdgsdg<br />\r\n sdggsdsdgsdgsdgsdgsdgsdgsdgs', 'gsdgsdgsdgsdgsdgsdgsdg<br />\r\nsdgsdgsdgsdgsdgsdgsdgsdgsdgsdgsdg', 'https://soundcloud.com/karim-alaa-94/sets/karims-classes', NULL, '2018-04-21 11:35:59', '2018-05-04 14:36:29'),
(30, 1, 'standard event', 'images/courses/82594602018-05-01-standard event.jpg', 'images/courses/20782222018-05-04-standard event.jpg', 'tterery', 1, 1, 'eyeryeryeryeyeryeyeryeryeryeyery eyeryeryeryeyery eyeryeryeryeyery', 'eyeryeryeryeyeryeyeryeryeryeyery eyeryeryeryeyery eyeryeryeryeyeryeyeryeryeryeyeryeyeryeryeryeyery eyeryeryeryeyery eyeryeryeryeyeryeyeryeryeryeyeryeyeryeryeryeyery eyeryeryeryeyery eyeryeryeryeyeryeyeryeryeryeyeryeyeryeryeryeyery eyeryeryeryeyery eyeryeryeryeyery', 'https://soundcloud.com/karim-alaa-94/sets/karims-classes', NULL, '2018-04-22 09:19:02', '2018-05-04 14:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `demos`
--

DROP TABLE IF EXISTS `demos`;
CREATE TABLE IF NOT EXISTS `demos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_link` varchar(500) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demos`
--

INSERT INTO `demos` (`id`, `video_link`, `title`, `active`, `created_at`, `updated_at`) VALUES
(15, 'xSTe1-SArG0', 'this is it\'s title', 1, '2018-01-22 21:11:58', '2018-01-22 21:11:58'),
(14, 'kS6M-_8J178', 'this is a video', 1, '2018-01-21 20:16:11', '2018-01-21 20:16:11'),
(17, '70z_pl69Fg0', 'this is it\'s title', 1, '2018-01-22 21:13:10', '2018-01-22 21:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `doctor_text` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `twitter_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `googleplus_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `active`, `doctor_text`, `user_id`, `twitter_link`, `facebook_link`, `googleplus_link`, `linkedin_link`, `deleted_at`, `created_at`, `updated_at`) VALUES
(13, 1, 'gfbefbefbefberberberb', 30, 'https://www.google.com', 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.yahoo.com', NULL, '2018-04-21 14:14:35', '2018-04-21 14:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_details` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `small_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `big_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slide_visible` tinyint(1) NOT NULL DEFAULT '0',
  `home_visible` tinyint(1) NOT NULL DEFAULT '1',
  `capacity` int(11) NOT NULL,
  `short_disc` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `page_link` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_online` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `doctor_id`, `course_id`, `address_id`, `active`, `price`, `address_details`, `name`, `small_image`, `big_image`, `slide_visible`, `home_visible`, `capacity`, `short_disc`, `date`, `page_link`, `is_online`, `deleted_at`, `created_at`, `updated_at`) VALUES
(31, 13, 25, 1, 1, 'dfdsffs', 'dffsfd', 'ESSthhdfhgfghf', 'images/courses/28961242018-05-14-ESSthhdfhgfghf.png', 'images/courses/18614862018-05-14-ESSthhdfhgfghf.png', 0, 1, 50, 'srfrgffvaffcgsgdvf', '2018-05-22', 'http://master-dental-society-s-school.thinkific.com/courses/st-course', 1, NULL, '2018-05-04 16:15:18', '2018-05-16 14:55:37'),
(32, 13, 25, 1, 1, '55', 'wegwegwegwegwegweg', 'defwfwewe', 'images/events/68196772018-05-16-defwfwewe.jpg', 'images/events/41091482018-05-16-defwfwewe.jpg', 0, 1, 120, 'wefgwegwegwegwegwegwegwegwegwegwegwegwegwegwegweg', '2018-05-23', 'https://www.google.com', 0, NULL, '2018-05-16 14:56:38', '2018-05-16 14:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `event_attendees`
--

DROP TABLE IF EXISTS `event_attendees`;
CREATE TABLE IF NOT EXISTS `event_attendees` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_attendees`
--

INSERT INTO `event_attendees` (`id`, `active`, `user_id`, `event_id`, `confirmed`, `deleted_at`, `created_at`, `updated_at`) VALUES
(40, 1, 32, 31, 0, NULL, '2018-05-05 10:44:31', '2018-05-05 10:44:31'),
(43, 1, 5, 31, 1, NULL, '2018-05-05 13:41:59', '2018-05-14 15:38:35'),
(44, 1, 33, 31, 1, NULL, '2018-05-14 15:09:57', '2018-05-14 15:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `event_images`
--

DROP TABLE IF EXISTS `event_images`;
CREATE TABLE IF NOT EXISTS `event_images` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `f_q_s`
--

DROP TABLE IF EXISTS `f_q_s`;
CREATE TABLE IF NOT EXISTS `f_q_s` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_q_s`
--

INSERT INTO `f_q_s` (`id`, `question`, `answer`, `active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 'can i get any course for free', 'the free course will have no\r\n price', 1, NULL, '2018-04-21 08:55:18', '2018-05-04 20:01:50'),
(2, 'how can i meet you', 'call me on phone', 1, NULL, '2018-04-20 22:30:05', '2018-04-20 23:06:52'),
(5, 'ssssssssssssssssssssssss1', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1', 1, NULL, '2018-05-05 13:58:35', '2018-05-05 13:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_12_06_141942_create_doctors_table', 1),
(4, '2017_12_06_142241_create_events_table', 1),
(5, '2017_12_06_142258_create_courses_table', 1),
(6, '2017_12_06_142313_create_event_images_table', 1),
(7, '2017_12_06_142348_create_event_attendees_table', 1),
(8, '2017_12_06_142405_create_roles_table', 1),
(9, '2017_12_06_142416_create_addresses_table', 1),
(10, '2017_12_06_142614_create_contacts_table', 1),
(11, '2017_12_06_142618_create_testimonials_table', 1),
(12, '2017_12_06_142637_create_abouts_table', 1),
(13, '2017_12_06_142658_create_sponsors_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('hossam@yahoo.com', '$2y$10$yMRmSzYo0/oc5v3K2v9fjey1kyD77s1FutLfnRlR1UU9y5HOqsOqC', '2017-12-25 13:55:46'),
('admin3@yahoo.com', '$2y$10$xvOizhjPKURH7TEtSRTfEO6YtWaQIaY5LhOHb4VykWcDfbi/ESo9a', '2018-01-06 16:26:20'),
('karimalaa500@yahoo.com', '$2y$10$EI7XMWFbsruSR/OAbD2YTehMHiEGOt90/RCVGm3mj0Ohhp/tb7UPy', '2018-04-22 09:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

DROP TABLE IF EXISTS `phones`;
CREATE TABLE IF NOT EXISTS `phones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_id` int(11) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`id`, `ref_id`, `phone`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(17, 1, '01222340989', 1, '2018-05-05 09:19:13', '2018-05-05 09:19:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `active`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 1, 'user', NULL, NULL, NULL),
(2, 1, 'admin', NULL, NULL, NULL),
(1, 1, 'doctor', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

DROP TABLE IF EXISTS `sponsors`;
CREATE TABLE IF NOT EXISTS `sponsors` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_link` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

DROP TABLE IF EXISTS `subscribes`;
CREATE TABLE IF NOT EXISTS `subscribes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `notifiable` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribes`
--

INSERT INTO `subscribes` (`id`, `email`, `active`, `notifiable`, `created_at`, `updated_at`) VALUES
(4, 'admin3@yahoo.com', 1, 1, '2017-12-27 17:39:09', '2018-01-21 20:33:28'),
(5, 'kalaa@adam.ai', 1, 1, '2017-12-28 11:42:10', '2018-01-21 20:33:43'),
(6, 'hossam@yahoo.com', 1, 0, '2017-12-28 11:55:12', '2018-01-21 20:33:34'),
(7, 'admin@yahoo.com', 1, 1, '2017-12-28 13:01:35', '2017-12-28 13:01:35'),
(8, 'karimalaa200@gmail.com', 1, 1, '2017-12-30 22:43:04', '2017-12-30 22:43:04'),
(9, 'karimalaa500@yahoo.com', 1, 1, '2017-12-31 11:39:48', '2017-12-31 11:39:48');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address_id` int(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` tinyint(4) DEFAULT '1',
  `job_title` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `email`, `address_id`, `image`, `active`, `job_title`, `created_at`, `updated_at`) VALUES
(2, 'kkkfhdfhdh', 'jjsdg@sjdg.ciom', 1, 'images/users/85592792018-05-16-kkkfhdfhdh.jpg', 1, 'sdgsdghsdhsd', '2018-05-16 15:33:46', '2018-05-16 15:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `address_id` int(11) DEFAULT NULL,
  `testimonial` longtext COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `active`, `name`, `image`, `title`, `address_id`, `testimonial`, `deleted_at`, `created_at`, `updated_at`) VALUES
(16, 1, 'test new', 'images/testimonials/29332292018-03-03-test new.jpg', 'good job', 1, 'this is my texy  this is my texy  this is my texy', NULL, '2018-01-21 20:24:36', '2018-05-05 11:27:59'),
(17, 1, 'ddfsfvffsd', 'images/testimonials/13792692018-05-05-ddfsfvffsd.jpg', 'fdsfdsfsdfdsfdsf', 2, 'Usdsfdsfsdfdsfs er Testimonial', NULL, '2018-05-05 01:11:01', '2018-05-05 01:11:01'),
(18, 1, 'ssssssssss', 'images/testimonials/26054312018-05-05-ssssssssss.jpg', 'User Testimonial  User Testimonial', 2, 'User Testimonial  User Testimonial  User Testimonial', NULL, '2018-05-05 11:26:44', '2018-05-05 11:26:44'),
(19, 1, 'this is my texy', 'images/testimonials/71689352018-05-05-this is my texy.jpg', 'this is my texy', 1, 'this is my texy  this is my texy  this is my texy  this is my texy', NULL, '2018-05-05 11:28:29', '2018-05-05 11:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `job_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `address_id`, `active`, `job_title`, `image`, `phone`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(28, 'karim alaa', 'doctor@yahoo.coms', NULL, 3, 1, 1, 'doctor', 'images/users/83711732018-04-21-karim alaa.jpg', '01141442423', NULL, NULL, '2018-04-21 13:43:59', '2018-04-21 13:43:59'),
(29, 'karim alaa', 'karimalaa200@gmail.com', '$2y$10$X6DNIiSOFNWfXgOTCsIbhO/zSpAaG/bOlwCaqJYGmY8rQ7NbsrmFy', 3, 1, 1, 'doctor', 'images/users/42805212018-04-21-karim alaa.png', '11414424237', NULL, 'PnYOYEEzt0MVdMVfquzUhA7iCeXc0O4XDCaCMdue3zxf56k7BLcMhgeRSqst', '2018-04-21 14:08:23', '2018-04-22 10:59:26'),
(5, 'karim alaa', 'admin3@yahoo.com', '$2y$10$JgxOdR1n1qgtB0OBw3gxFOhVolryE8dSUBNy3rZWH/i/.V7yAuUDa', 2, 1, 1, 'title', NULL, '02201405231', NULL, 'R7fSIAoHRLbGAFB5usJj2hoPBexr0OIHHjEMZhkdGhdnfq5oYYTYTFMKAy65', '2017-12-11 08:53:48', '2017-12-11 08:53:48'),
(31, 'karim alaa', 'doctor@yahoo.com', '$2y$10$g06WU0XG6LhteZ/itdxfHOgbjlC6H2NUYQlnmHVlVIMwfXGSJfz.K', 1, 1, 1, NULL, NULL, '01141442423', NULL, NULL, '2018-04-21 17:27:14', '2018-04-21 17:27:14'),
(32, 'Eslam Mohamed Ibrahim', 'alzelete@gmail.com', '$2y$10$s0VsFYWFb/tcdf1GNK2n/eyrTDhF0rUDJz5ucqOsz1iva5yKiTq9a', 3, 1, 1, NULL, NULL, '01222304989', NULL, 'MQiueKio7GMLKPhvoM67Gh1WfOGlzl6NzQeVIN5FXV7rYlCM9CtnNXNXSLvS', '2018-05-05 10:30:31', '2018-05-05 10:30:31'),
(30, 'AHmed', 'kimoo@gmail.com', '$2y$10$JgxOdR1n1qgtB0OBw3gxFOhVolryE8dSUBNy3rZWH/i/.V7yAuUDa', 2, 1, 1, 'doctor', 'images/users/65620372018-05-14-karim alaa.jpg', '15141442423', NULL, NULL, '2018-04-21 14:14:35', '2018-05-14 15:59:53'),
(33, 'Ahmad', 'ahmad.adel.rezk@gmail.com', '$2y$10$g2TMjfD3i/JTr1kfpibgROb4Pwnv9frUR1M52gCMPg7G4SHSrzSFe', 1, 1, 1, NULL, NULL, '01000225717', NULL, 'Ec4IUrHUh7zfYDWz15yK6hxW32Fp8lLV7RIK9SkIznX1rTOFolysAgjPO8T8', '2018-05-14 15:09:35', '2018-05-14 15:09:35'),
(34, 'Eslam Mohamed', 'eslam@gmail.com', '$2y$10$mBb67dbzFMCemVe9dmQRh.3KONZiaTkBBqAOiiychgTRFl2CI8X3e', 1, 1, 1, NULL, NULL, '01222340989', NULL, NULL, '2018-05-14 15:32:38', '2018-05-14 15:32:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
