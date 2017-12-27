-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 27, 2017 at 10:35 AM
-- Server version: 10.1.26-MariaDB
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
-- Database: `template_3`
--

-- --------------------------------------------------------

--
-- Table structure for table `AuthAssignment`
--

CREATE TABLE `AuthAssignment` (
  `userid` varchar(64) NOT NULL,
  `itemname` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AuthAssignment`
--

INSERT INTO `AuthAssignment` (`userid`, `itemname`, `bizrule`, `data`) VALUES
('1', 'Admin', NULL, 'N;'),
('3', 'Admin', NULL, 'N;'),
('2', 'Guest', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `AuthItem`
--

CREATE TABLE `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `AuthItem`
--

INSERT INTO `AuthItem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Admin', 2, NULL, NULL, 'N;'),
('Authenticated', 2, NULL, NULL, 'N;'),
('Brand.Brand.*', 1, NULL, NULL, 'N;'),
('Brand.Brand.Admin', 0, NULL, NULL, 'N;'),
('Brand.Brand.Create', 0, NULL, NULL, 'N;'),
('Brand.Brand.Delete', 0, NULL, NULL, 'N;'),
('Brand.Brand.Index', 0, NULL, NULL, 'N;'),
('Brand.Brand.Update', 0, NULL, NULL, 'N;'),
('Brand.Brand.View', 0, NULL, NULL, 'N;'),
('Brand.Default.*', 1, NULL, NULL, 'N;'),
('Brand.Default.Index', 0, NULL, NULL, 'N;'),
('Guest', 2, NULL, NULL, 'N;'),
('Site.*', 1, NULL, NULL, 'N;'),
('Site.Contact', 0, NULL, NULL, 'N;'),
('Site.Error', 0, NULL, NULL, 'N;'),
('Site.Index', 0, NULL, NULL, 'N;'),
('Site.Login', 0, NULL, NULL, 'N;'),
('Site.Logout', 0, NULL, NULL, 'N;'),
('User.Activation.*', 1, NULL, NULL, 'N;'),
('User.Activation.Activation', 0, NULL, NULL, 'N;'),
('User.Admin.*', 1, NULL, NULL, 'N;'),
('User.Admin.Admin', 0, NULL, NULL, 'N;'),
('User.Admin.Create', 0, NULL, NULL, 'N;'),
('User.Admin.Delete', 0, NULL, NULL, 'N;'),
('User.Admin.Update', 0, NULL, NULL, 'N;'),
('User.Admin.View', 0, NULL, NULL, 'N;'),
('User.Default.*', 1, NULL, NULL, 'N;'),
('User.Default.Index', 0, NULL, NULL, 'N;'),
('User.Login.*', 1, NULL, NULL, 'N;'),
('User.Login.Login', 0, NULL, NULL, 'N;'),
('User.Logout.*', 1, NULL, NULL, 'N;'),
('User.Logout.Logout', 0, NULL, NULL, 'N;'),
('User.Profile.*', 1, NULL, NULL, 'N;'),
('User.Profile.Changepassword', 0, NULL, NULL, 'N;'),
('User.Profile.Edit', 0, NULL, NULL, 'N;'),
('User.Profile.Profile', 0, NULL, NULL, 'N;'),
('User.ProfileField.*', 1, NULL, NULL, 'N;'),
('User.ProfileField.Admin', 0, NULL, NULL, 'N;'),
('User.ProfileField.Create', 0, NULL, NULL, 'N;'),
('User.ProfileField.Delete', 0, NULL, NULL, 'N;'),
('User.ProfileField.Update', 0, NULL, NULL, 'N;'),
('User.ProfileField.View', 0, NULL, NULL, 'N;'),
('User.Recovery.*', 1, NULL, NULL, 'N;'),
('User.Recovery.Recovery', 0, NULL, NULL, 'N;'),
('User.Registration.*', 1, NULL, NULL, 'N;'),
('User.Registration.Registration', 0, NULL, NULL, 'N;'),
('User.User.*', 1, NULL, NULL, 'N;'),
('User.User.Index', 0, NULL, NULL, 'N;'),
('User.User.View', 0, NULL, NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `AuthItemChild`
--

CREATE TABLE `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `brand_type` varchar(50) NOT NULL,
  `user_created` int(11) NOT NULL DEFAULT '0',
  `time_created` datetime DEFAULT NULL,
  `user_modified` int(11) NOT NULL DEFAULT '0',
  `time_modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`, `brand_type`, `user_created`, `time_created`, `user_modified`, `time_modified`, `deleted`) VALUES
(1, 'Apple', 'Computers', 0, '0000-00-00 00:00:00', 1, '2017-12-14 13:43:11', 0),
(2, 'Samsung', 'Handphone', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 'Test', 'Handphone', 0, '0000-00-00 00:00:00', 1, '2017-11-06 14:13:20', 1),
(4, 'Lenovo', 'Computers', 1, '2017-11-06 07:52:43', 1, '2017-11-06 07:56:12', 0),
(5, 'Microsoft', 'Computers', 1, '2017-11-06 07:55:45', 0, '0000-00-00 00:00:00', 0),
(6, 'Yamaha', 'Otomotif', 1, '2017-11-06 08:03:04', 1, '2017-11-06 14:12:57', 0),
(7, 'Honda', 'Otomotif', 1, '2017-11-06 14:13:37', 1, '2017-11-06 14:14:03', 0),
(8, 'Gucci', 'Accessories', 3, '2017-11-08 16:37:15', 0, '0000-00-00 00:00:00', 0),
(9, 'Google', 'Computers', 3, '2017-11-08 16:37:48', 1, '2017-12-14 13:43:16', 0),
(10, 'Levi\'s', 'Fashion', 3, '2017-11-08 16:38:06', 0, '0000-00-00 00:00:00', 0),
(11, 'Nokia', 'Handphone', 3, '2017-11-08 16:38:20', 0, '0000-00-00 00:00:00', 0),
(12, 'Panasonic', 'Electronic', 3, '2017-11-08 16:38:35', 3, '2017-11-08 16:39:13', 0),
(13, 'Apple', 'Computers', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(14, 'Samsung', 'Handphone', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(15, 'Lenovo', 'Computers', 1, '2017-11-06 07:52:43', 1, '2017-11-06 07:56:12', 0),
(16, 'Microsoft', 'Computers', 1, '2017-11-06 07:55:45', 0, '0000-00-00 00:00:00', 0),
(17, 'Yamaha', 'Otomotif', 1, '2017-11-06 08:03:04', 1, '2017-11-06 14:12:57', 0),
(18, 'Honda', 'Otomotif', 1, '2017-11-06 14:13:37', 1, '2017-11-06 14:14:03', 0),
(19, 'Gucci', 'Accessories', 3, '2017-11-08 16:37:15', 0, '0000-00-00 00:00:00', 0),
(20, 'Google', 'Computers', 3, '2017-11-08 16:37:48', 0, '0000-00-00 00:00:00', 0),
(21, 'Levi\'s', 'Fashion', 3, '2017-11-08 16:38:06', 0, '0000-00-00 00:00:00', 0),
(22, 'Nokia', 'Handphone', 3, '2017-11-08 16:38:20', 0, '0000-00-00 00:00:00', 0),
(23, 'Panasonic', 'Electronic', 3, '2017-11-08 16:38:35', 3, '2017-11-08 16:39:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu_order` tinyint(4) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `menu_url` varchar(100) NOT NULL,
  `menu_icon` varchar(30) NOT NULL,
  `parent_menu_id` int(11) DEFAULT '0',
  `visible` tinyint(1) NOT NULL,
  `user_created` int(11) NOT NULL DEFAULT '0',
  `time_created` datetime DEFAULT NULL,
  `user_modified` int(11) NOT NULL DEFAULT '0',
  `time_modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu_order`, `menu_name`, `menu_url`, `menu_icon`, `parent_menu_id`, `visible`, `user_created`, `time_created`, `user_modified`, `time_modified`, `deleted`) VALUES
(1, 1, 'Menu', 'menu/menu', 'icon-menu', 0, 1, 1, '2017-11-15 14:04:00', 0, NULL, 0),
(2, 2, 'User', 'user/admin', 'icon-user', 0, 1, 1, '2017-11-15 14:06:00', 0, NULL, 0),
(3, 3, 'Usermenu', 'usermenu/usermenu', 'icon-settings', 2, 1, 1, '2017-11-15 14:04:00', 1, '2017-11-16 16:15:42', 0),
(4, 4, 'Brand', 'brand/brand', 'icon-diamond', 0, 1, 1, '2017-11-15 14:06:00', 0, NULL, 0),
(5, 5, 'Test1', 'test/test1', 'icon-test1', 0, 0, 1, '2017-11-16 16:10:30', 1, '2017-11-17 14:41:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `level` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`user_id`, `firstname`, `lastname`, `level`) VALUES
(1, 'Administrator', 'Head Office', 'admin'),
(2, 'Demo', 'Demo', 'guest'),
(3, 'Octavian', 'Panggestu', 'branch');

-- --------------------------------------------------------

--
-- Table structure for table `profiles_fields`
--

CREATE TABLE `profiles_fields` (
  `id` int(10) NOT NULL,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` varchar(15) NOT NULL DEFAULT '0',
  `field_size_min` varchar(15) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  `hidden_field` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profiles_fields`
--

INSERT INTO `profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`, `hidden_field`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3, 0),
(2, 'firstname', 'First Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3, 0),
(3, 'level', 'Level User', 'VARCHAR', '50', '3', 1, '', 'admin==Admin;branch==Branch;guest==Guest', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Rights`
--

CREATE TABLE `Rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`) VALUES
(1, 'admin', '5e31a175b489d1fec64fb59148e7f197', 'admin@nadyne.com', 'e2e79d67f31ab9236c5cbd734727fc62', '2017-10-31 06:03:36', '2017-12-15 03:32:23', 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@nadyne.com', '099f825543f7850cc038b90aaff39fac', '2017-11-01 06:03:36', '2017-11-09 07:23:30', 0, 1),
(3, 'octavian', '5e31a175b489d1fec64fb59148e7f197', 'octavian.ocpang@gmail.com', '23e691b5eaebf32d8478847fc0c49fe6', '2017-11-02 03:17:47', '2017-11-16 06:22:25', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_menu`
--

CREATE TABLE `users_menu` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `create` tinyint(1) NOT NULL,
  `update` tinyint(1) NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `verify` tinyint(1) NOT NULL,
  `print` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_created` int(11) NOT NULL DEFAULT '0',
  `time_created` datetime DEFAULT NULL,
  `user_modified` int(11) NOT NULL DEFAULT '0',
  `time_modified` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_menu`
--

INSERT INTO `users_menu` (`id`, `user_id`, `menu_id`, `create`, `update`, `delete`, `verify`, `print`, `status`, `user_created`, `time_created`, `user_modified`, `time_modified`, `deleted`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2017-11-15 14:27:00', 1, '2017-11-16 17:05:17', 0),
(2, 1, 2, 1, 1, 1, 1, 1, 1, 1, '2017-11-15 14:27:40', 0, NULL, 0),
(3, 1, 3, 1, 1, 1, 1, 1, 1, 1, '2017-11-15 14:27:00', 0, NULL, 0),
(4, 1, 4, 1, 1, 1, 1, 1, 1, 1, '2017-11-15 14:27:40', 1, '2017-11-17 14:17:52', 0),
(5, 3, 4, 1, 1, 1, 1, 1, 1, 1, '2017-11-15 14:27:40', 1, '2017-11-17 10:50:12', 0),
(6, 2, 4, 1, 1, 1, 0, 0, 0, 1, '2017-11-17 14:36:30', 1, '2017-11-17 14:37:31', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AuthAssignment`
--
ALTER TABLE `AuthAssignment`
  ADD PRIMARY KEY (`itemname`,`userid`);

--
-- Indexes for table `AuthItem`
--
ALTER TABLE `AuthItem`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `AuthItemChild`
--
ALTER TABLE `AuthItemChild`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `profiles_fields`
--
ALTER TABLE `profiles_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `varname` (`varname`,`widget`,`visible`);

--
-- Indexes for table `Rights`
--
ALTER TABLE `Rights`
  ADD PRIMARY KEY (`itemname`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `status` (`status`),
  ADD KEY `superuser` (`superuser`);

--
-- Indexes for table `users_menu`
--
ALTER TABLE `users_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profiles_fields`
--
ALTER TABLE `profiles_fields`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_menu`
--
ALTER TABLE `users_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AuthAssignment`
--
ALTER TABLE `AuthAssignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `AuthItemChild`
--
ALTER TABLE `AuthItemChild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `Rights`
--
ALTER TABLE `Rights`
  ADD CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
