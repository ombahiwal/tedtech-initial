-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 26, 2018 at 12:39 PM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tedtech_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_aug`
--

CREATE TABLE `enquiry_aug` (
  `enquiry_id` int(11) NOT NULL,
  `email_id` text NOT NULL,
  `message` text NOT NULL,
  `enquiry_name` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `temp_users_aug`
--

CREATE TABLE `temp_users_aug` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `domains` text NOT NULL,
  `status` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temp_users_aug`
--

INSERT INTO `temp_users_aug` (`id`, `name`, `email`, `domains`, `status`, `time_stamp`) VALUES
(5, 'Omkar Bahiwal', 'ombahiwal@gmail.com', 'Web, ML, AI, Python, DIP', '1', '2018-08-17 10:39:09'),
(6, 'Gaurav Saraf', 'sarafgaurav83@gmail.com', 'Civil- Transportation Engineering', '1', '2018-08-17 19:32:35'),
(7, 'siddharth parab', 'siddharthparab.kalam26@gmail.com', 'stackoverflow', '1', '2018-08-20 12:43:17'),
(8, 'Vedant Bahiwal', 'me.bahiwal@gmail.com', 'Java Applet, C, QBasic, Logic, html, css.', '1', '2018-08-21 16:49:36'),
(9, 'Sahil Shukla', 'sahilshukla500@gmail.com', 'I expectise the best product and good quality \r\ni would give u full support All the best!!!!!! ', '2', '2018-08-22 11:36:18'),
(11, 'Aditya Sadar', 'adityasadar06@gmail.com', 'Analysis', '1', '2018-08-25 17:20:51'),
(12, 'Abhijeet Vishwakarma', 'vishwakarmaabhijeet739@gmail.com', 'Core Java', '1', '2018-08-25 17:51:39'),
(13, 'Jayesh Singh', 'jayeshsingh9767@gmail.com', 'Python, Java, Web Devlopment, Android App development, Django', '1', '2018-08-25 18:43:43'),
(14, 'sonali suhas bramhapurkar ', 'psbramhapurkar@gmail.com', 'Embedded', '1', '2018-08-26 15:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `users_developer`
--

CREATE TABLE `users_developer` (
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `resume_name` text NOT NULL,
  `password` text NOT NULL,
  `domains` text NOT NULL,
  `institution` text,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `qualification_status` tinyint(4) NOT NULL DEFAULT '4',
  `qualification` text,
  `email_verification` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_developer`
--

INSERT INTO `users_developer` (`user_id`, `name`, `user_email`, `resume_name`, `password`, `domains`, `institution`, `time_stamp`, `qualification_status`, `qualification`, `email_verification`) VALUES
(9, 'Omkar Bahiwal', 'omkar@tedtech.in', '1535307308.pdf', '$2y$10$NIiYRiyHrhMW3Bwu3nBSBe932ZYJpQA6BuT0TJEtMHLuVh1P11GMu', 'ML, AI, WEB', 'MIT, A', '2018-08-27 01:29:06', 1, 'Btech 2020', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enquiry_aug`
--
ALTER TABLE `enquiry_aug`
  ADD PRIMARY KEY (`enquiry_id`);

--
-- Indexes for table `temp_users_aug`
--
ALTER TABLE `temp_users_aug`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_developer`
--
ALTER TABLE `users_developer`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`(150));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enquiry_aug`
--
ALTER TABLE `enquiry_aug`
  MODIFY `enquiry_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_users_aug`
--
ALTER TABLE `temp_users_aug`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users_developer`
--
ALTER TABLE `users_developer`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
