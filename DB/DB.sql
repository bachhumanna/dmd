-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 22, 2018 at 11:47 AM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dmd`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `franchisees_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `note` text,
  `booking_time` datetime DEFAULT NULL,
  `base_location` varchar(255) NOT NULL,
  `drop_location` varchar(255) NOT NULL,
  `outward_companion` varchar(255) DEFAULT NULL,
  `outward_waiting` int(11) DEFAULT NULL,
  `journey_type` int(11) NOT NULL COMMENT '1=>On way,2=>Return',
  `return_companion` int(11) DEFAULT NULL,
  `return_waiting` int(11) DEFAULT NULL,
  `long_return` int(11) DEFAULT '0',
  `drop_off_to_base` int(11) DEFAULT NULL,
  `total_distance` double(5,2) DEFAULT NULL,
  `total_duration` int(11) DEFAULT NULL,
  `total_price` double(10,2) DEFAULT NULL,
  `payment_mode` int(11) NOT NULL COMMENT '1=>Cash,2=>Credit',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `users_id`, `franchisees_id`, `name`, `email`, `phone_number`, `address`, `note`, `booking_time`, `base_location`, `drop_location`, `outward_companion`, `outward_waiting`, `journey_type`, `return_companion`, `return_waiting`, `long_return`, `drop_off_to_base`, `total_distance`, `total_duration`, `total_price`, `payment_mode`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Munmun', 'hasib2008@gmail.com', '741258963', 'Kolkata  station road', 'Note', '2018-09-21 15:35:00', 'Garia station road West Bengal kolkata 700084', 'Ruby Hospital, Eastern Metropolitan Bypass, Sector C, East Kolkata Township, Calcutta, West Bengal, India', '60', 60, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, '2018-09-20 01:06:09', '2018-09-20 02:45:07', '2018-09-20 02:45:07'),
(2, 1, 1, 'Hasibur Rahaman', 'hasib2008@gmail.com', '741258963', 'Kolkata  station road', 'Note', '2018-09-30 23:55:00', 'Garia station road West Bengal kolkata 700084', 'Kolkata Railway Station (Chitpur Station), Belgachia, Calcutta, West Bengal, India', '60', 60, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, '2018-09-20 01:08:32', '2018-09-20 02:45:02', '2018-09-20 02:45:02'),
(6, 1, 1, 'Rahaman', 'hasib2008@gmail.com', '741258963', 'Kolkata  station road', 'Noote', '2018-09-21 15:35:00', 'Garia station road West Bengal kolkata 700084', 'Ruby Hospital, Eastern Metropolitan Bypass, Sector C, East Kolkata Township, Calcutta, West Bengal, India', '10', 60, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, '2018-09-20 01:20:58', '2018-09-20 02:44:59', '2018-09-20 02:44:59'),
(7, 1, 1, 'Hasibur Rahaman', 'hasib2008@gmail.com', '741258963', 'Kolkata  station road', 'Note', '2018-09-29 23:55:00', 'Garia station road West Bengal kolkata 700084', 'Garia Station Road, Baidyapara, Garia, Calcutta, West Bengal, India', '10', 10, 1, NULL, NULL, 0, NULL, 7.69, 50, 95.08, 1, '2018-09-20 01:57:13', '2018-09-20 01:57:13', NULL),
(8, 1, 1, 'Hasibur Rahaman', 'hasib2008@gmail.com', '741258963', 'Kolkata  station road', 'Notes', '2018-09-21 15:00:00', 'Garia station road West Bengal kolkata 700084', 'Dum Dum, Calcutta, West Bengal, India', '60', 60, 1, NULL, NULL, 0, NULL, 20.67, 201, 196.27, 1, '2018-09-20 02:50:56', '2018-09-20 02:50:56', NULL),
(9, 1, 1, 'Hasibur Rahaman', 'hasib2008@gmail.com', '741258963', 'Kolkata  station road', 'sdasdad', '2018-09-29 19:55:00', 'Garia station road West Bengal kolkata 700084', 'Kolkata Railway Station (Chitpur Station), Belgachia, Calcutta, West Bengal, India', NULL, NULL, 2, NULL, 15, 1, NULL, 25.02, 139, 82.00, 1, '2018-09-21 03:38:58', '2018-09-21 03:38:58', NULL),
(10, 1, 1, 'Hasibur Rahaman', 'hasib2008@gmail.com', '741258963', 'Kolkata  station road', NULL, '2018-09-28 19:55:00', 'Garia station road West Bengal kolkata 700084', 'Salt Lake City, West Bengal, India', NULL, 15, 2, NULL, NULL, 1, 100, 121.02, 99, 120.00, 1, '2018-09-21 04:03:00', '2018-09-21 04:03:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `default_permissions`
--

CREATE TABLE `default_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `is_super` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL COMMENT '1=>Franchisor, 2=>Franchisee',
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `default_permissions`
--

INSERT INTO `default_permissions` (`id`, `is_super`, `type`, `name`, `created_at`, `updated_at`) VALUES
(64, 1, 2, 'role.index', NULL, NULL),
(65, 1, 2, 'role.create', NULL, NULL),
(66, 1, 2, 'role.store', NULL, NULL),
(67, 1, 2, 'role.show', NULL, NULL),
(68, 1, 2, 'role.edit', NULL, NULL),
(69, 1, 2, 'role.update', NULL, NULL),
(70, 1, 2, 'role.destroy', NULL, NULL),
(71, 1, 2, 'franchisee.index', NULL, NULL),
(72, 1, 2, 'franchisee.create', NULL, NULL),
(73, 1, 2, 'franchisee.store', NULL, NULL),
(74, 1, 2, 'franchisee.show', NULL, NULL),
(75, 1, 2, 'franchisee.edit', NULL, NULL),
(76, 1, 2, 'franchisee.update', NULL, NULL),
(77, 1, 2, 'franchisee.destroy', NULL, NULL),
(78, 1, 2, 'email-template.index', NULL, NULL),
(79, 1, 2, 'email-template.create', NULL, NULL),
(80, 1, 2, 'email-template.store', NULL, NULL),
(81, 1, 2, 'email-template.show', NULL, NULL),
(82, 1, 2, 'email-template.edit', NULL, NULL),
(83, 1, 2, 'email-template.update', NULL, NULL),
(84, 1, 2, 'email-template.destroy', NULL, NULL),
(85, 1, 2, 'driver.index', NULL, NULL),
(86, 1, 2, 'driver.create', NULL, NULL),
(87, 1, 2, 'driver.store', NULL, NULL),
(88, 1, 2, 'driver.show', NULL, NULL),
(89, 1, 2, 'driver.edit', NULL, NULL),
(90, 1, 2, 'driver.update', NULL, NULL),
(91, 1, 2, 'driver.destroy', NULL, NULL),
(92, 1, 2, 'franchisee-user.index', NULL, NULL),
(93, 1, 2, 'franchisee-user.create', NULL, NULL),
(94, 1, 2, 'franchisee-user.store', NULL, NULL),
(95, 1, 2, 'franchisee-user.show', NULL, NULL),
(96, 1, 2, 'franchisee-user.edit', NULL, NULL),
(97, 1, 2, 'franchisee-user.update', NULL, NULL),
(98, 1, 2, 'franchisee-user.destroy', NULL, NULL),
(99, 1, 2, 'driving-request.index', NULL, NULL),
(100, 1, 2, 'driving-request.create', NULL, NULL),
(101, 1, 2, 'driving-request.store', NULL, NULL),
(102, 1, 2, 'driving-request.show', NULL, NULL),
(103, 1, 2, 'driving-request.edit', NULL, NULL),
(104, 1, 2, 'driving-request.update', NULL, NULL),
(105, 1, 2, 'driving-request.destroy', NULL, NULL),
(106, 1, 2, 'booking.index', NULL, NULL),
(107, 1, 2, 'booking.create', NULL, NULL),
(108, 1, 2, 'booking.store', NULL, NULL),
(109, 1, 2, 'booking.show', NULL, NULL),
(110, 1, 2, 'booking.edit', NULL, NULL),
(111, 1, 2, 'booking.update', NULL, NULL),
(112, 1, 2, 'booking.destroy', NULL, NULL),
(113, 1, 2, 'vehicles.index', NULL, NULL),
(114, 1, 2, 'vehicles.create', NULL, NULL),
(115, 1, 2, 'vehicles.store', NULL, NULL),
(116, 1, 2, 'vehicles.show', NULL, NULL),
(117, 1, 2, 'vehicles.edit', NULL, NULL),
(118, 1, 2, 'vehicles.update', NULL, NULL),
(119, 1, 2, 'vehicles.destroy', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `driver_details`
--

CREATE TABLE `driver_details` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `drivinglicence` varchar(255) DEFAULT NULL COMMENT 'PDF or Image',
  `licence_no` varchar(255) NOT NULL,
  `licence_expiry_date` varchar(255) NOT NULL,
  `driver_experience` varchar(255) NOT NULL,
  `phl_number` varchar(255) NOT NULL,
  `phl_image` varchar(255) DEFAULT NULL,
  `phl_expiry_date` varchar(255) NOT NULL,
  `national_insurance_no` varchar(255) NOT NULL,
  `passport_number` varchar(255) NOT NULL,
  `passport_image` varchar(255) NOT NULL,
  `short_name` varchar(20) DEFAULT NULL,
  `renewal_date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_details`
--

INSERT INTO `driver_details` (`id`, `user_id`, `drivinglicence`, `licence_no`, `licence_expiry_date`, `driver_experience`, `phl_number`, `phl_image`, `phl_expiry_date`, `national_insurance_no`, `passport_number`, `passport_image`, `short_name`, `renewal_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 12, '1534486385-5b766771b6fd5.jpg', 'GH45632107896635', '2020-08-17', '5years', '', '', '', '', '', '', NULL, '', '2018-08-17 00:43:26', '2018-08-17 00:43:26', NULL),
(2, 14, NULL, '74101474101101', '2020-12-12', '7years', '', '', '', '', '', '', NULL, '', '2018-08-17 04:26:37', '2018-08-17 04:26:37', NULL),
(3, 11, '1534486385-5b766771b6fd5.jpg', 'GH45632107896635', '2020-09-18', '7', '', '', '', '', '', '', NULL, '', '2018-08-17 00:43:26', '2018-09-18 00:05:56', NULL),
(4, 29, 'fJotsUKvAA.png', '9845', '2018-09-18', '14', '', '', '', '', '', '', NULL, '', '2018-09-07 03:02:37', '2018-09-07 05:17:07', NULL),
(5, 31, '1536832263-5b9a33071c0b4.png', '7410101014740100', '2019-12-12', '7', '7854210kjhkl', NULL, '2019-12-12', 'as741010147401', '74102dfgdf23212', '1536832263-5b9a33071cb70.jpg', NULL, '2018-09-06', '2018-09-13 06:09:24', '2018-09-13 06:09:24', NULL),
(6, 32, '1536906208-5b9b53e0e422b.jpg', '78965412307lk', '2019-12-12', '14', '7854210kjhklkk', '1536906708-5b9b55d4c895f.jpg', '2019-12-12', 'aD741010147401', 'S20184526398119', '1536841315-5b9a5663d2940.jpg', NULL, '2018-09-28', '2018-09-13 06:51:55', '2018-09-14 01:01:48', NULL),
(7, 33, '1536908395-5b9b5c6bd9f17.jpg', 'SUR7410JKL', '2021-12-12', '2', '7854210MNB', '1536908395-5b9b5c6bdbf31.png', '2020-10-12', 'N123S45R5896', 'S20184526398119', '1536908395-5b9b5c6bdd577.jpg', 'sr', '2022-11-30', '2018-09-14 01:29:55', '2018-09-14 01:29:55', NULL),
(9, 35, '1536846885-5b9a6c25c442c.jpg', '7896541230', '2019-12-12', '7', '7854210kjhkl', NULL, '2019-12-12', 'as741010147401', 'S20184526398119', '1536846885-5b9a6c25caa44.jpg', 'SD', '2018-09-29', '2018-09-14 05:09:17', '2018-09-14 05:09:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `driving_request`
--

CREATE TABLE `driving_request` (
  `id` int(10) NOT NULL,
  `franchisees_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `suburb` varchar(255) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `phl_number` varchar(255) NOT NULL,
  `phl_image` varchar(255) DEFAULT NULL,
  `phl_expiry_date` varchar(255) NOT NULL,
  `national_insurance_no` varchar(255) NOT NULL,
  `status` int(10) DEFAULT '0',
  `drivinglicence` varchar(255) DEFAULT NULL,
  `licence_no` varchar(255) NOT NULL,
  `licence_expiry_date` varchar(255) NOT NULL,
  `driver_experience` varchar(255) NOT NULL,
  `passport_number` varchar(255) NOT NULL,
  `passport_image` varchar(255) NOT NULL,
  `short_name` varchar(20) DEFAULT NULL,
  `renewal_date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driving_request`
--

INSERT INTO `driving_request` (`id`, `franchisees_id`, `name`, `surname`, `email`, `dob`, `phone`, `address`, `state`, `postcode`, `suburb`, `profile_pic`, `phl_number`, `phl_image`, `phl_expiry_date`, `national_insurance_no`, `status`, `drivinglicence`, `licence_no`, `licence_expiry_date`, `driver_experience`, `passport_number`, `passport_image`, `short_name`, `renewal_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Sorvino roy', '', 'sourvinoroy2014@gmail.com', '1978-08-11', '7410258963', 'kolkata', 'WA', '1234', 'hghgg', NULL, '8520147989', '', '', '', 1, '1534486385-5b766771b6fd5.jpg', 'GH45632107896635', '2020-08-17', '5years', '', '', NULL, '', '2018-08-17 00:43:05', '2018-08-17 00:43:26', NULL),
(5, 2, 'jhjhjhjhjkjh', '', 'adiadigggg78@gmail.com', '1978-08-11', '7410258963', 'kolkata', 'wb', '12345', 'vbnm', NULL, '9658741230', '', '', '', 0, NULL, '74101010235654678', '2020-08-12', '5', '', '', NULL, '', '2018-09-04 05:45:34', '2018-09-07 02:49:46', '2018-09-07 02:49:46'),
(6, 2, 'patit', '', 'patit@gmail.com', '2018-09-04', '7410258945', 'kolkata', 'WB', '712410', 'jklsdefs', NULL, '9804948710', '', '', '', 1, NULL, '9845', '2018-09-18', '56', '', '', NULL, '', '2018-09-04 05:50:38', '2018-09-07 03:02:38', NULL),
(7, 2, 'aditya', '', 'aditya78@gmail.com', '1978-08-11', '7410258925', 'kolkata', 'wb', '12345', 'vbnm', NULL, '9658741230', '', '', '', 1, 'jkjh', '74101010235654678', '2020-08-12', '5', '', '', NULL, '', '2018-09-05 01:25:21', '2018-09-05 01:25:21', NULL),
(8, 1, 'Test', '', 'test@gmail.com', '2018-09-05', '7410258852', 'Kolkata', 'WB', '97979764664', 'HHshahah', NULL, '96325844849', '', '', '', 0, NULL, '9797979494949', '2018-09-05', '2 years', '', '', NULL, '', '2018-09-05 01:33:06', '2018-09-05 01:33:06', NULL),
(9, 2, 'aditya', '', 'aditya789@gmail.com', '1978-08-11', '7410258965', 'kolkata', 'wb', '12345', 'vbnm', NULL, '9658741230', '', '', '', 1, '/tmp/phpb7VENM', '74101010235654678', '2020-08-12', '5', '', '', NULL, '', '2018-09-05 01:40:19', '2018-09-05 01:40:19', NULL),
(10, 2, 'aditya', '', 'aditya678@gmail.com', '1978-08-11', '7410258789', 'kolkata', 'wb', '12345', 'vbnm', NULL, '9658741230', '', '', '', 1, '/tmp/phpNibXjI', '74101010235654678', '2020-08-12', '5', '', '', NULL, '', '2018-09-05 01:55:23', '2018-09-05 01:55:23', NULL),
(11, 2, 'aditya', '', 'aditya6789@gmail.com', '1978-08-11', '7410258360', 'kolkata', 'wb', '12345', 'vbnm', NULL, '9658741230', '', '', '', 1, 'azWLJT5vBH.png', '74101010235654678', '2020-08-12', '5', '', '', NULL, '', '2018-09-05 02:27:10', '2018-09-05 02:27:10', NULL),
(12, 1, 'Test', '', 'test2@gmail.com', '2018-09-05', '7410258891', 'Kolkata', 'WB', '97979764664', 'HHshahah', NULL, '96325844849', '', '', '', 0, 'ev0Bl92NW7.png', '9797979494949', '2018-09-05', '2 years', '', '', NULL, '', '2018-09-05 02:29:22', '2018-09-05 02:29:22', NULL),
(13, 2, 'aditya', '', 'aditya67819@gmail.com', '1978-08-11', '7410258023', 'kolkata', 'wb', '12345', 'vbnm', NULL, '9658741230', '', '', '', 1, 'uHSggBJAyS.png', '74101010235654678', '2020-08-12', '5', '', '', NULL, '', '2018-09-05 03:11:01', '2018-09-05 03:11:01', NULL),
(14, 1, 'munmunmun', 'dey', 'munmunmundey@gmail.com', '1999-12-12', '7410235689', 'kolkata', 'wb', '45632', 'adsasdasd', '1536832263-5b9a33071c4e7.jpg', '7854210kjhkl', NULL, '2019-12-12', 'as741010147401', 1, '1536832263-5b9a33071c0b4.png', '7410101014740100', '2019-12-12', '7', '74102dfgdf23212', '1536832263-5b9a33071cb70.jpg', NULL, '2018-09-06', '2018-09-13 04:21:03', '2018-09-13 06:09:24', NULL),
(15, 1, 'souvick', 'dey', 'souvick2008@gmail.com', '1999-12-12', '8542369710', 'kolkata', 'WB', '1234', 'hghgg', '1536846885-5b9a6c25ca392.jpg', '7854210kjhkl', NULL, '2019-12-12', 'as741010147401', 1, '1536846885-5b9a6c25c442c.jpg', '7896541230', '2019-12-12', '7', 'S20184526398119', '1536846885-5b9a6c25caa44.jpg', 'SD', '2018-09-29', '2018-09-13 08:24:45', '2018-09-14 05:09:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE `email_template` (
  `id` int(11) NOT NULL,
  `franchisees_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `from_name` varchar(255) NOT NULL,
  `from_email` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`id`, `franchisees_id`, `title`, `subject`, `from_name`, `from_email`, `description`, `content`, `status`) VALUES
(1, NULL, 'Contact Reply to user', 'Thank you for contacting us', 'Red Flag Data', 'info@redflagdata.com.au', 'Contact Us User mail', '<table cellpadding="0" cellspacing="0" style="width: 732px; margin: 0 auto; font-family: \'Montserrat\', sans-serif;  max-width: 100%; background: #fff7f9;" width="732px"><!--*-->\r\n	<thead>\r\n		<tr>\r\n			<td style="background: #fff; padding: 16px 0px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align: middle; padding-left: 20px;"><a href="#" style="border: none; float: left; outline: none;"><img alt="" src="https://redflagdata.com.au/photos/1/logo.png" style="display: block; border: none; outline: none;" /> </a></td>\r\n						<td style="text-align: right; vertical-align:middle; padding-right: 20px;">Contact<a href="mailto:support@redflagdata.com.au" style="text-decoration: none; font-weight: 400; font-size: 12px; line-height: 1; color: #5b5a5a;">@redflagdata.com.au</a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</thead>\r\n	<!--*--><!--*-->\r\n	<tbody>\r\n		<tr>\r\n			<td style="background: #fff2f4; padding: 66px 0 65px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align: top; width: 470px; padding-left: 70px;">\r\n						<table cellpadding="0" cellspacing="0" width="100%">\r\n							<tbody>\r\n								<tr>\r\n									<td style="font-size: 18px; line-height: 1; color: #000000; line-height: 1; text-transform: uppercase; padding-bottom: 17px;">Hello {{ $name}}</td>\r\n								</tr>\r\n								<tr>\r\n									<td style="font-size: 14px; line-height: 22px;  color: #000; font-weight: 400; padding: 20px 0 0;">\r\n									<p>Thank you for contacting us&nbsp;</p>\r\n\r\n									<p>We will reply to you question ASAP&nbsp;</p>\r\n\r\n									<p>Kind Regards</p>\r\n\r\n									<p>Red Flag Data</p>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n						<td style="vertical-align: middle; padding-right: 70px;"><img alt="" src="https://redflagdata.com.au/photos/1/verify_icon.png" style="display: block; border: none; outline: none; float: right; width: 79px; height: 79px;" /></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n	<!--*--><!--*-->\r\n	<tfoot>\r\n		<tr>\r\n			<td style="padding: 35px 0 42px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="padding:0 70px;"><a href="#" style="float: left; outline: none;border: none;"><img alt="" src="https://redflagdata.com.au/photos/1/logo.png" style="display: block; outline: none; border: none;" /> </a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tfoot>\r\n	<!--*-->\r\n</table>', 1),
(2, NULL, 'Contact us to admin', 'Some one  contacting us in contact form', 'Red Flag Data', 'contact@redflagdata.com.au', 'Contact Us User mail', '<table cellpadding="0" cellspacing="0" style="width: 732px; margin: 0 auto; font-family: \'Montserrat\', sans-serif;  max-width: 100%; background: #fff7f9;" width="732px"><!--*-->\r\n	<thead>\r\n		<tr>\r\n			<td style="background: #fff; padding: 16px 0px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align: middle; padding-left: 20px;"><a href="#" style="border: none; float: left; outline: none;"><img alt="" src="https://redflagdata.com.au/photos/1/logo.png" style="display: block; border: none; outline: none;" /> </a></td>\r\n						<td style="text-align: right; vertical-align:middle; padding-right: 20px;">Contact<a href="mailto:support@redflagdata.com.au" style="text-decoration: none; font-weight: 400; font-size: 12px; line-height: 1; color: #5b5a5a;">@redflagdata.com.au</a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</thead>\r\n	<!--*--><!--*-->\r\n	<tbody>\r\n		<tr>\r\n			<td style="background: #fff2f4; padding: 56px 0 52px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align: top; width: 470px; padding-left: 70px; padding-right: 70px;">\r\n						<table cellpadding="0" cellspacing="0" width="100%">\r\n							<tbody>\r\n								<tr>\r\n									<td style="font-size: 18px; line-height: 1; color: #000000; line-height: 1; text-transform: uppercase; padding-bottom: 17px;">Red Flag Data Contact Form</td>\r\n								</tr>\r\n								<tr>\r\n									<td style="padding: 20px 0px 0px;">\r\n									<table cellpadding="0" cellspacing="0" style="text-align: left;  width: auto;" width="">\r\n										<tbody>\r\n											<tr>\r\n												<td>\r\n												<table cellpadding="0" cellspacing="0" width="100%">\r\n													<tbody>\r\n														<tr>\r\n															<td style="font-size: 14px; line-height: 1; color: #000; text-transform: capitalize; padding-bottom: 20px;">Contact Form</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n											</tr>\r\n											<tr>\r\n												<td style="padding-bottom: 22px;">\r\n												<table cellpadding="0" cellspacing="0" style="height: 3px;" width="100%">\r\n													<tbody>\r\n														<tr>\r\n															<td style="width: 46px; vertical-align: middle; height: 3px; font-size: 0;line-height: 0;"><img src="https://redflagdata.com.au/photos/1/colorline.png" style="border: none; outline: none; width: 100%; height: 3px;" /></td>\r\n															<td style="vertical-align: middle; height: 3px;  font-size: 0;line-height: 0;"><img src="https://redflagdata.com.au/photos/1/line.png" style="border: none; outline: none; width: 100%; height: 1px;" /></td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n											</tr>\r\n											<tr>\r\n												<td style="font-size: 12px; line-height: 1; color: #000;">\r\n												<table cellpadding="0" cellspacing="0" style="height: 3px;" width="100%">\r\n													<tbody>\r\n														<tr>\r\n															<td style="width:194px; padding-bottom:17px; vertical-align:middle;">NAME:</td>\r\n															<td style="padding-bottom:17px; vertical-align:middle;">{{ @$name }}</td>\r\n														</tr>\r\n														<tr>\r\n															<td style="width:194px; padding-bottom:17px; vertical-align:middle;">&nbsp;EMAIL:</td>\r\n															<td style="padding-bottom:17px; vertical-align:middle;">{{ @$email }}</td>\r\n														</tr>\r\n														<tr>\r\n															<td style="width:194px; padding-bottom:17px; vertical-align:middle;">SUBJECT:</td>\r\n															<td style="padding-bottom:17px; vertical-align:middle;">{{ @$subject }}</td>\r\n														</tr>\r\n														<tr>\r\n															<td style="width:194px; padding-bottom:17px; vertical-align:middle;">YOUR MESSAGE:</td>\r\n															<td style="padding-bottom:17px; vertical-align:middle; line-height: 1.4">{{ @$message }}</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n	<!--*--><!--*-->\r\n	<tfoot>\r\n		<tr>\r\n			<td style="padding: 35px 0 42px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="padding:0 70px;"><a href="#" style="float: left; outline: none;border: none;"><img alt="" src="https://redflagdata.com.au/photos/1/logo.png" style="display: block; outline: none; border: none;" /> </a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tfoot>\r\n	<!--*-->\r\n</table>', 1),
(3, NULL, 'Add To Red Flaged', 'Alert a new guardian Red Flagged in your area', 'Red Flag Data', 'contact@redflagdata.com.au', 'Contact Us User mail', '<table cellpadding="0" cellspacing="0" style="width: 732px; margin: 0 auto; font-family: \'Montserrat\', sans-serif;  max-width: 100%; background: #fff7f9;" width="732px"><!--*-->\r\n	<thead>\r\n		<tr>\r\n			<td style="background: #fff; padding: 16px 0px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align: middle; padding-left: 20px;"><a href="#" style="border: none; float: left; outline: none;"><img alt="" src="https://redflagdata.com.au/photos/1/logo.png" style="display: block; border: none; outline: none; width: 108px; height: 109px;" /> </a></td>\r\n						<td style="text-align: right; vertical-align:middle; padding-right: 20px;">Contact<a href="mailto:support@redflagdata.com.au" style="text-decoration: none; font-weight: 400; font-size: 12px; line-height: 1; color: #5b5a5a;">@redflagdata.com.au</a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</thead>\r\n	<!--*--><!--*-->\r\n	<tbody>\r\n		<tr>\r\n			<td style="background: #fff2f4; padding: 66px 0 65px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align: top; width: 470px; padding-left: 70px;">\r\n						<table cellpadding="0" cellspacing="0" width="100%">\r\n							<tbody>\r\n								<tr>\r\n									<td style="font-size: 18px; line-height: 1; color: #000000; line-height: 1; text-transform: uppercase; padding-bottom: 17px;">Hello {{ $name}}</td>\r\n								</tr>\r\n								<tr>\r\n									<td style="font-size: 14px; line-height: 22px;  color: #000; font-weight: 400; padding: 20px 0 0;">A new guardian has been Red Flagged in your area&nbsp;</td>\r\n								</tr>\r\n								<tr>\r\n									<td style="font-size: 12px; color: #5d595d; line-height: 1; text-align: center; padding-bottom: 39px;">\r\n									<p>&nbsp;</p>\r\n\r\n									<p>Please Click&nbsp;<a href="{{ @$profileLink }}" style="text-decoration: underline; outline: none; color: #e21a35;">here</a>&nbsp;to view.</p>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n						<td style="vertical-align: middle; padding-right: 70px;"><img alt="" src="images/verify_icon.png" style="display: block; border: none; outline: none; float: right;" /></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n	<!--*--><!--*-->\r\n	<tfoot>\r\n		<tr>\r\n			<td style="padding: 35px 0 42px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="padding:0 70px;"><a href="#" style="float: left; outline: none;border: none;"><img alt="" src="https://redflagdata.com.au/photos/1/logo.png" style="display: block; outline: none; border: none; width: 108px; height: 109px;" /> </a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tfoot>\r\n	<!--*-->\r\n</table>', 1),
(4, NULL, 'Trial End', 'Your trial period has ended', 'Red Flag Data', 'contact@redflagdata.com.au', 'Contact Us User mail', '<table cellpadding="0" cellspacing="0" style="width:732px"><!--*-->\r\n	<thead>\r\n		<tr>\r\n			<td style="background-color:#ffffff">\r\n			<table cellpadding="0" cellspacing="0" style="width:100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align:middle"><a href="#"><img alt="" src="https://redflagdata.com.au/photos/1/logo.png" /> </a></td>\r\n						<td style="text-align:right; vertical-align:middle"><a href="mailto:contact@redflagdata.com.au">contact@redflagdata.com.au</a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</thead>\r\n	<!--*--><!--*-->\r\n	<tbody>\r\n		<tr>\r\n			<td style="background-color:#fff2f4">\r\n			<table cellpadding="0" cellspacing="0" style="width:100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align:top; width:470px">\r\n						<table cellpadding="0" cellspacing="0" style="width:100%">\r\n							<tbody>\r\n								<tr>\r\n									<td>Hi, {{ $name}}</td>\r\n								</tr>\r\n								<tr>\r\n									<td>\r\n									<table>\r\n										<tbody>\r\n											<tr>\r\n												<td>Trial End date</td>\r\n												<td>{{ $endDate }}</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n\r\n						<p>&nbsp;The credit/debit card that you entered upon sign up will now be charged for the amount of $88.00 Including GST .&nbsp;</p>\r\n\r\n						<p>Thankyou for you business .</p>\r\n\r\n						<p>Kind Regards</p>\r\n\r\n						<p>Red Flag Data&nbsp;</p>\r\n						</td>\r\n						<td style="vertical-align:middle"><img alt="" src="http://localhost/redflag/photos/1/verify_icon.png" style="float:right; height:79px; width:79px" /></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n	<!--*--><!--*-->\r\n	<tfoot>\r\n		<tr>\r\n			<td>\r\n			<table cellpadding="0" cellspacing="0" style="width:100%">\r\n				<tbody>\r\n					<tr>\r\n						<td><a href="#"><img alt="" src="https://redflagdata.com.au/photos/1/logo.png" /> </a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tfoot>\r\n	<!--*-->\r\n</table>', 1),
(5, NULL, 'Next Billing', 'Next Billing', 'Red Flag Data', 'contact@redflagdata.com.au', 'Available Variable\r\nname, amount, next_payment_attempt, period_range', '<table cellpadding="0" cellspacing="0" style="width: 732px; margin: 0 auto; font-family: \'Montserrat\', sans-serif;  max-width: 100%; background: #fff7f9;" width="732px"><!--*-->\r\n	<thead>\r\n		<tr>\r\n			<td style="background: #fff; padding: 16px 0px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align: middle; padding-left: 20px;"><a href="#" style="border: none; float: left; outline: none;"><img alt="" src="https://redflagdata.com.au/photos/1/logo.png" style="display: block; border: none; outline: none;" /> </a></td>\r\n						<td style="text-align: right; vertical-align:middle; padding-right: 20px;"><a href="mailto:support@redflagdata.com.au" style="text-decoration: none; font-weight: 400; font-size: 12px; line-height: 1; color: #5b5a5a;">support@redflagdata.com.au</a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</thead>\r\n	<!--*--><!--*-->\r\n	<tbody>\r\n		<tr>\r\n			<td style="background: #fff2f4; padding: 56px 0 52px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align: top; width: 470px; padding-left: 70px; padding-right: 70px;">\r\n						<table cellpadding="0" cellspacing="0" width="100%">\r\n							<tbody>\r\n								<tr>\r\n									<td style="font-size: 18px; line-height: 1; color: #000000; line-height: 1; padding-bottom: 17px;">Hello {{ @$name }}</td>\r\n								</tr>\r\n								<tr>\r\n									<td style="padding: 20px 0px 0px;">\r\n									<table cellpadding="0" cellspacing="0" style="text-align: left;  width: auto;" width="">\r\n										<tbody>\r\n											<tr>\r\n												<td>&nbsp;</td>\r\n											</tr>\r\n											<tr>\r\n												<td style="padding-bottom: 22px;">\r\n												<table cellpadding="0" cellspacing="0" style="height: 3px;" width="100%">\r\n													<tbody>\r\n														<tr>\r\n															<td style="width: 46px; vertical-align: middle; height: 3px; font-size: 0;line-height: 0;"><img src="https://redflagdata.com.au/photos/1/colorline.png" style="border: none; outline: none; width: 100%; height: 3px;" /></td>\r\n															<td style="vertical-align: middle; height: 3px;  font-size: 0;line-height: 0;"><img src="https://redflagdata.com.au/photos/1/line.png" style="border: none; outline: none; width: 100%; height: 1px;" /></td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n											</tr>\r\n											<tr>\r\n												<td style="font-size: 12px; line-height: 1; color: #000;">\r\n												<table cellpadding="0" cellspacing="0" style="height: 3px;" width="100%">\r\n													<tbody>\r\n														<tr>\r\n															<td style="width:194px; padding-bottom:17px; vertical-align:middle;">Amount</td>\r\n															<td style="padding-bottom:17px; vertical-align:middle;">{{ @$amount }}</td>\r\n														</tr>\r\n														<tr>\r\n															<td style="width:194px; padding-bottom:17px; vertical-align:middle;">&nbsp;Next Payment Attempt On:</td>\r\n															<td style="padding-bottom:17px; vertical-align:middle;">{{ @$next_payment_attempt }}</td>\r\n														</tr>\r\n														<tr>\r\n															<td style="width:194px; padding-bottom:17px; vertical-align:middle;">For Period</td>\r\n															<td style="padding-bottom:17px; vertical-align:middle;">{{ @$period_range }}</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n\r\n			<p>Kind regards</p>\r\n\r\n			<p>Red Flag data&nbsp;</p>\r\n\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n	<!--*--><!--*-->\r\n	<tfoot>\r\n		<tr>\r\n			<td style="padding: 35px 0 42px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="padding:0 70px;"><a href="#" style="float: left; outline: none;border: none;"><img alt="" src="https://redflagdata.com.au/photos/1/logo.png" style="display: block; outline: none; border: none;" /> </a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tfoot>\r\n	<!--*-->\r\n</table>', 1),
(6, NULL, 'Payment Sucess', 'Payment', 'Red Flag Data', 'contact@redflagdata.com.au', 'Available Variable\r\nname, \r\namount,\r\nperiod_range,', '<table cellpadding="0" cellspacing="0" style="width: 732px; margin: 0 auto; font-family: \'Montserrat\', sans-serif;  max-width: 100%; background: #fff7f9;" width="732px"><!--*-->\r\n	<thead>\r\n		<tr>\r\n			<td style="background: #fff; padding: 16px 0px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align: middle; padding-left: 20px;"><a href="#" style="border: none; float: left; outline: none;"><img alt="" src="https://redflagdata.com.au/photos/1/logo.png" style="display: block; border: none; outline: none;" /> </a></td>\r\n						<td style="text-align: right; vertical-align:middle; padding-right: 20px;"><a href="mailto:support@redflagdata.com.au" style="text-decoration: none; font-weight: 400; font-size: 12px; line-height: 1; color: #5b5a5a;">support@redflagdata.com.au</a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</thead>\r\n	<!--*--><!--*-->\r\n	<tbody>\r\n		<tr>\r\n			<td style="background: #fff2f4; padding: 56px 0 52px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align: top; width: 470px; padding-left: 70px; padding-right: 70px;">\r\n						<table cellpadding="0" cellspacing="0" width="100%">\r\n							<tbody>\r\n								<tr>\r\n									<td style="font-size: 18px; line-height: 1; color: #000000; line-height: 1; padding-bottom: 17px;">Hi {{ @$name }}</td>\r\n								</tr>\r\n								<tr>\r\n									<td style="padding: 20px 0px 0px;">\r\n									<table cellpadding="0" cellspacing="0" style="text-align: left;  width: auto;" width="">\r\n										<tbody>\r\n											<tr>\r\n												<td>&nbsp;</td>\r\n											</tr>\r\n											<tr>\r\n												<td style="padding-bottom: 22px;">\r\n												<table cellpadding="0" cellspacing="0" style="height: 3px;" width="100%">\r\n													<tbody>\r\n														<tr>\r\n															<td style="width: 46px; vertical-align: middle; height: 3px; font-size: 0;line-height: 0;"><img src="https://redflagdata.com.au/photos/1/colorline.png" style="border: none; outline: none; width: 100%; height: 3px;" /></td>\r\n															<td style="vertical-align: middle; height: 3px;  font-size: 0;line-height: 0;"><img src="https://redflagdata.com.au/photos/1/line.png" style="border: none; outline: none; width: 100%; height: 1px;" /></td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n											</tr>\r\n											<tr>\r\n												<td style="font-size: 12px; line-height: 1; color: #000;">\r\n												<table cellpadding="0" cellspacing="0" style="height: 3px;" width="100%">\r\n													<tbody>\r\n														<tr>\r\n															<td style="width:194px; padding-bottom:17px; vertical-align:middle;">Amount</td>\r\n															<td style="padding-bottom:17px; vertical-align:middle;">{{ @$amount }}</td>\r\n														</tr>\r\n														<tr>\r\n															<td style="width:194px; padding-bottom:17px; vertical-align:middle;">&nbsp;Date:</td>\r\n															<td style="padding-bottom:17px; vertical-align:middle;">{{ @$period_range }}</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n												</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n	<!--*--><!--*-->\r\n	<tfoot>\r\n		<tr>\r\n			<td style="padding: 35px 0 42px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="padding:0 70px;"><a href="#" style="float: left; outline: none;border: none;"><img alt="" src="https://redflagdata.com.au/photos/1/logo.png" style="display: block; outline: none; border: none;" /> </a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tfoot>\r\n	<!--*-->\r\n</table>', 1),
(7, NULL, 'Signup Sucess', 'Signup', 'Red Flag Data', 'contact@redflagdata.com.au', 'Signup', '<meta charset="UTF-8"><meta name="viewport" content="width=device-width"><meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">\r\n<title></title>\r\n<style type="text/css">*{\r\n		margin: 0;\r\n		padding: 0;\r\n	}\r\n</style>\r\n<table cellpadding="0" cellspacing="0" style="width: 732px; margin: 0 auto; font-family: \'Montserrat\', sans-serif;  max-width: 100%; background: #fff7f9;" width="732px"><!--*-->\r\n	<thead>\r\n		<tr>\r\n			<td style="background: #fff; padding: 16px 0px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align: middle; padding-left: 20px;"><a href="#" style="border: none; float: left; outline: none;"><img alt="" src="https://redflagdata.com.au/photos/1/logo.png" style="display: block; border: none; outline: none;" /> </a></td>\r\n						<td style="text-align: right; vertical-align:middle; padding-right: 20px;"><a href="mailto:support@redflagdata.com.au" style="text-decoration: none; font-weight: 400; font-size: 12px; line-height: 1; color: #5b5a5a;">support@redflagdata.com.au</a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</thead>\r\n	<!--*--><!--*-->\r\n	<tbody>\r\n		<tr>\r\n			<td style="background: #fff2f4; padding: 66px 0 65px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align: top; width: 470px; padding-left: 70px;">\r\n						<table cellpadding="0" cellspacing="0" width="100%">\r\n							<tbody>\r\n								<tr>\r\n									<td style="font-size: 18px; line-height: 1; color: #000000; line-height: 1; text-transform: uppercase; padding-bottom: 17px;">Hi {{ @$name }}</td>\r\n								</tr>\r\n								<tr>\r\n									<td style="font-size: 14px; line-height: 22px;  color: #000; font-weight: 400; padding: 20px 0 0;">\r\n									<p>Welcome to<a href="https://redflagdata.com.au/"> Red Flad Data&nbsp;</a></p>\r\n\r\n									<p>Please<a href="https://redflagdata.com.au/login"> Log in</a> to start enjoying the feature of our service now.&nbsp;</p>\r\n\r\n									<p>&nbsp;</p>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n						<td style="vertical-align: middle; padding-right: 70px;"><img alt="" src="https://redflagdata.com.au/photos/1/verify_icon.png" style="display: block; border: none; outline: none; float: right; width: 79px; height: 79px;" /></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n	<!--*--><!--*-->\r\n	<tfoot>\r\n		<tr>\r\n			<td style="padding: 35px 0 42px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="padding:0 70px;"><a href="#" style="float: left; outline: none;border: none;"><img alt="" src="https://redflagdata.com.au/photos/1/logo.png" style="display: block; outline: none; border: none;" /> </a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tfoot>\r\n	<!--*-->\r\n</table>', 1),
(8, NULL, 'A Childcare service has Red Flagged you', 'You have been red flagged', 'Red Flag Data', 'Contact@redflagdata.com.au', 'Signup', '<meta charset="UTF-8"><meta name="viewport" content="width=device-width"><meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">\r\n<title></title>\r\n<style type="text/css">*{\r\n		margin: 0;\r\n		padding: 0;\r\n	}\r\n</style>\r\n<table cellpadding="0" cellspacing="0" style="width: 732px; margin: 0 auto; font-family: \'Montserrat\', sans-serif;  max-width: 100%; background: #fff7f9;" width="732px"><!--*-->\r\n	<thead>\r\n		<tr>\r\n			<td style="background: #fff; padding: 16px 0px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align: middle; padding-left: 20px;"><a href="https://redflagdata.com.au/pre-register" style="border: none; float: left; outline: none;"><img alt="" src="https://redflagdata.com.au/photos/1/logo.png" style="display: block; border: none; outline: none; width: 108px; height: 109px;" /> </a></td>\r\n						<td style="text-align: right; vertical-align:middle; padding-right: 20px;">contact<a href="mailto:support@redflagdata.com.au" style="text-decoration: none; font-weight: 400; font-size: 12px; line-height: 1; color: #5b5a5a;">@redflagdata.com.au</a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</thead>\r\n	<!--*--><!--*-->\r\n	<tbody>\r\n		<tr>\r\n			<td style="background: #fff2f4; padding: 66px 0 65px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align: top; padding-left: 20px; padding-right:20px;">\r\n						<table cellpadding="0" cellspacing="0" width="100%">\r\n							<tbody>\r\n								<tr>\r\n									<td style="font-size: 18px; line-height: 1; color: #000000; line-height: 1; text-transform: uppercase; padding-bottom: 17px;">To {{ @$name }}</td>\r\n								</tr>\r\n								<tr>\r\n									<td style="font-size: 14px; line-height: 22px;  color: #000; font-weight: 400; padding: 20px 0 0;">\r\n									<p style="margin-bottom:.0001pt; text-align:justify; margin:0cm 0cm 8pt"><span style="font-size:11pt"><span style="line-height:normal"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt"><span style="color:#222222">You have been placed on the childcare debt register (childcare blacklist) your Name, DOB and the amount you owe has been entered on to the national database <a href="https://redflagdata.com.au/pre-register">Red Flag Data&nbsp;</a></span></span></span></span></span></p>\r\n\r\n									<p style="margin-bottom:.0001pt; text-align:justify; margin:0cm 0cm 8pt">&nbsp;</p>\r\n\r\n									<p style="margin-bottom:.0001pt; text-align:justify; margin:0cm 0cm 8pt"><span style="font-size:11pt"><span style="line-height:normal"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt"><span style="color:#222222">All childcare Service Providers&nbsp;have access to this register, this may result in you being blacklisted from receiving further childcare services until all outstanding fees have been paid. At any time you may be removed from the register by paying the outstanding amount. </span></span></span></span></span></p>\r\n\r\n									<p style="margin-bottom:.0001pt; text-align:justify; margin:0cm 0cm 8pt">&nbsp;</p>\r\n\r\n									<p style="margin-bottom:.0001pt; text-align:justify; margin:0cm 0cm 8pt"><span style="font-size:11pt"><span style="line-height:normal"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt"><span style="color:#222222">If know which child care service has place you on this database please contact the service to pay any outstanding amounts owing to have your name removed from the database .</span></span></span></span></span></p>\r\n\r\n									<p style="margin-bottom:.0001pt; text-align:justify; margin:0cm 0cm 8pt">&nbsp;</p>\r\n\r\n									<p style="margin-bottom:.0001pt; text-align:justify; margin:0cm 0cm 8pt"><span style="font-size:11pt"><span style="line-height:normal"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt"><span style="color:#222222">If you do not know which service placed you on this database you create and account at<a href="https://redflagdata.com.au/pre-register"> Red Flag Data</a></span></span><span style="font-size:12.0pt"><span style="color:#222222">&nbsp;to find the name and contact details of the service you have an outstanding debt with. </span></span></span></span></span></p>\r\n\r\n									<p style="margin-bottom:.0001pt; text-align:justify; margin:0cm 0cm 8pt">&nbsp;</p>\r\n\r\n									<p style="margin-bottom:.0001pt; text-align:justify; margin:0cm 0cm 8pt"><span style="font-size:11pt"><span style="line-height:normal"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt"><span style="color:#222222">No information from the register will be shared or sold or to any other agencies or third parties.</span></span></span></span></span></p>\r\n\r\n									<p style="margin-bottom:.0001pt; text-align:justify; margin:0cm 0cm 8pt">&nbsp;</p>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n	<!--*--><!--*-->\r\n	<tfoot>\r\n		<tr>\r\n			<td style="padding: 35px 0 42px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="padding:0 70px;"><a href="https://redflagdata.com.au/pre-register" style="float: left; outline: none;border: none;"><img alt="" src="https://redflagdata.com.au/photos/1/logo.png" style="display: block; outline: none; border: none; width: 108px; height: 109px;" /> </a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tfoot>\r\n	<!--*-->\r\n</table>', 1),
(9, NULL, 'Business User Signup Sucess', 'Signup', 'Red Flag Data', 'contact@redflagdata.com.au', 'Signup', '<meta charset="UTF-8"><meta name="viewport" content="width=device-width"><meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">\r\n<title></title>\r\n<style type="text/css">*{\r\n		margin: 0;\r\n		padding: 0;\r\n	}\r\n</style>\r\n<table cellpadding="0" cellspacing="0" style="width: 732px; margin: 0 auto; font-family: \'Montserrat\', sans-serif;  max-width: 100%; background: #fff7f9;" width="732px"><!--*-->\r\n	<thead>\r\n		<tr>\r\n			<td style="background: #fff; padding: 16px 0px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align: middle; padding-left: 20px;"><a href="https://redflagdata.com.au/" style="border: none; float: left; outline: none;"><img alt="" src="https://redflagdata.com.au/photos/1/logo.png" style="display: block; border: none; outline: none;" /> </a></td>\r\n						<td style="text-align: right; vertical-align:middle; padding-right: 20px;">Contact<a href="mailto:support@redflagdata.com.au" style="text-decoration: none; font-weight: 400; font-size: 12px; line-height: 1; color: #5b5a5a;">@redflagdata.com.au</a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</thead>\r\n	<!--*--><!--*-->\r\n	<tbody>\r\n		<tr>\r\n			<td style="background: #fff2f4; padding: 66px 0 65px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align: top; width: 470px; padding-left: 70px;">\r\n						<table cellpadding="0" cellspacing="0" width="100%">\r\n							<tbody>\r\n								<tr>\r\n									<td style="font-size: 18px; line-height: 1; color: #000000; line-height: 1; text-transform: uppercase; padding-bottom: 17px;">Hi {{ @$name }}</td>\r\n								</tr>\r\n								<tr>\r\n									<td style="font-size: 14px; line-height: 22px;  color: #000; font-weight: 400; padding: 20px 0 0;">\r\n									<p>Welcome to <a href="https://redflagdata.com.au/">Red Flag Data&nbsp;</a></p>\r\n\r\n									<p>Please <a href="https://redflagdata.com.au/login">Log in</a> to start enjoying the features of our service now .&nbsp;</p>\r\n\r\n									<p>&nbsp;</p>\r\n\r\n									<p>Please download our <a href="http://redflagdata.com.au/files/1/generic-outstanding-fee-policy.docx">Outstanding Fee&nbsp;Policy,</a> edit and have signed by guardians before entering them on&nbsp;to the database .</p>\r\n\r\n									<p>&nbsp;</p>\r\n\r\n									<p>&nbsp;</p>\r\n\r\n									<p>&nbsp;</p>\r\n\r\n									<p>&nbsp;</p>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n						<td style="vertical-align: middle; padding-right: 70px;"><img alt="" src="https://redflagdata.com.au/photos/1/verify_icon.png" style="display: block; border: none; outline: none; float: right; width: 79px; height: 79px;" /></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n	<!--*--><!--*-->\r\n	<tfoot>\r\n		<tr>\r\n			<td style="padding: 35px 0 42px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="padding:0 70px;"><a href="https://redflagdata.com.au/" style="float: left; outline: none;border: none;"><img alt="" src="https://redflagdata.com.au/photos/1/logo.png" style="display: block; outline: none; border: none;" /> </a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tfoot>\r\n	<!--*-->\r\n</table>', 1),
(10, NULL, 'Remove Guardians From Red Flag', 'Your red flag has been removed', 'Red Flag Data', 'contact@redflagdata.com.au', 'Available Variable\r\n\r\nname\' ,   \'company_name\'', '<meta charset="UTF-8"><meta name="viewport" content="width=device-width"><meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">\r\n<title></title>\r\n<style type="text/css">*{\r\n		margin: 0;\r\n		padding: 0;\r\n	}\r\n</style>\r\n<table cellpadding="0" cellspacing="0" style="width: 732px; margin: 0 auto; font-family: \'Montserrat\', sans-serif;  max-width: 100%; background: #fff7f9;" width="732px"><!--*-->\r\n	<thead>\r\n		<tr>\r\n			<td style="background: #fff; padding: 16px 0px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align: middle; padding-left: 20px;"><a href="https://redflagdata.com.au/" style="border: none; float: left; outline: none;"><img alt="" src="https://redflagdata.com.au/photos/1/logo.png" style="display: block; border: none; outline: none;" /> </a></td>\r\n						<td style="text-align: right; vertical-align:middle; padding-right: 20px;"><a href="mailto:support@redflagdata.com.au" style="text-decoration: none; font-weight: 400; font-size: 12px; line-height: 1; color: #5b5a5a;">support@redflagdata.com.au</a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</thead>\r\n	<!--*--><!--*-->\r\n	<tbody>\r\n		<tr>\r\n			<td style="background: #fff2f4; padding: 66px 0 65px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align: top; width: 470px; padding-left: 70px;">\r\n						<table cellpadding="0" cellspacing="0" width="100%">\r\n							<tbody>\r\n								<tr>\r\n									<td style="font-size: 18px; line-height: 1; color: #000000; line-height: 1; text-transform: uppercase; padding-bottom: 17px;">Hi {{ @$name }}</td>\r\n								</tr>\r\n								<tr>\r\n									<td style="font-size: 14px; line-height: 22px;  color: #000; font-weight: 400; padding: 20px 0 0;">\r\n									<p>Your details have been removed from red flag data.</p>\r\n\r\n									<p>&nbsp;</p>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n						<td style="vertical-align: middle; padding-right: 70px;"><img alt="" src="https://redflagdata.com.au/photos/1/verify_icon.png" style="display: block; border: none; outline: none; float: right; width: 79px; height: 79px;" /></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n	<!--*--><!--*-->\r\n	<tfoot>\r\n		<tr>\r\n			<td style="padding: 35px 0 42px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="padding:0 70px;"><a href="https://redflagdata.com.au/" style="float: left; outline: none;border: none;"><img alt="" src="https://redflagdata.com.au/photos/1/logo.png" style="display: block; outline: none; border: none;" /> </a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tfoot>\r\n	<!--*-->\r\n</table>', 1),
(11, NULL, 'Your have successfully cancelled you membership', 'Your have successfully cancelled you membership', 'Red Flag Data', 'contact@redflagdata.com.au', 'name', '<meta charset="UTF-8"><meta name="viewport" content="width=device-width"><meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">\r\n<title></title>\r\n<style type="text/css">*{\r\n		margin: 0;\r\n		padding: 0;\r\n	}\r\n</style>\r\n<table cellpadding="0" cellspacing="0" style="width: 732px; margin: 0 auto; font-family: \'Montserrat\', sans-serif;  max-width: 100%; background: #fff7f9;" width="732px"><!--*-->\r\n	<thead>\r\n		<tr>\r\n			<td style="background: #fff; padding: 16px 0px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align: middle; padding-left: 20px;"><a href="https://redflagdata.com.au/" style="border: none; float: left; outline: none;"><img alt="" src="https://redflagdata.com.au/photos/1/logo.png" style="display: block; border: none; outline: none;" /> </a></td>\r\n						<td style="text-align: right; vertical-align:middle; padding-right: 20px;">Contact<a href="mailto:support@redflagdata.com.au" style="text-decoration: none; font-weight: 400; font-size: 12px; line-height: 1; color: #5b5a5a;">@redflagdata.com.au</a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</thead>\r\n	<!--*--><!--*-->\r\n	<tbody>\r\n		<tr>\r\n			<td style="background: #fff2f4; padding: 66px 0 65px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align: top; width: 470px; padding-left: 70px;">\r\n						<table cellpadding="0" cellspacing="0" width="100%">\r\n							<tbody>\r\n								<tr>\r\n									<td style="font-size: 18px; line-height: 1; color: #000000; line-height: 1; text-transform: uppercase; padding-bottom: 17px;">Hi {{ @$name }}</td>\r\n								</tr>\r\n								<tr>\r\n									<td style="font-size: 14px; line-height: 22px;  color: #000; font-weight: 400; padding: 20px 0 0;">\r\n									<p>Your have successfully cancelled you membership</p>\r\n\r\n									<p>&nbsp;</p>\r\n\r\n									<p>&nbsp;</p>\r\n\r\n									<p>&nbsp;</p>\r\n\r\n									<p>&nbsp;</p>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n						<td style="vertical-align: middle; padding-right: 70px;"><img alt="" src="https://redflagdata.com.au/photos/1/verify_icon.png" style="display: block; border: none; outline: none; float: right; width: 79px; height: 79px;" /></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n	<!--*--><!--*-->\r\n	<tfoot>\r\n		<tr>\r\n			<td style="padding: 35px 0 42px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="padding:0 70px;"><a href="https://redflagdata.com.au/" style="float: left; outline: none;border: none;"><img alt="" src="https://redflagdata.com.au/photos/1/logo.png" style="display: block; outline: none; border: none;" /> </a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tfoot>\r\n	<!--*-->\r\n</table>', 1),
(12, NULL, 'verify email', 'verify email', 'Red Flag Data', 'contact@redflagdata.com.au', 'name\r\nurl', '<meta charset="UTF-8"><meta name="viewport" content="width=device-width"><meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">\r\n<title></title>\r\n<style type="text/css">*{\r\n		margin: 0;\r\n		padding: 0;\r\n	}\r\n</style>\r\n<table cellpadding="0" cellspacing="0" style="width: 732px; margin: 0 auto; font-family: \'Montserrat\', sans-serif;  max-width: 100%; background: #fff7f9;" width="732px"><!--*-->\r\n	<thead>\r\n		<tr>\r\n			<td style="background: #fff; padding: 16px 0px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align: middle; padding-left: 20px;"><a href="https://redflagdata.com.au/" style="border: none; float: left; outline: none;"><img alt="" src="https://redflagdata.com.au/photos/1/logo.png" style="display: block; border: none; outline: none;" /> </a></td>\r\n						<td style="text-align: right; vertical-align:middle; padding-right: 20px;">Contact<a href="mailto:support@redflagdata.com.au" style="text-decoration: none; font-weight: 400; font-size: 12px; line-height: 1; color: #5b5a5a;">@redflagdata.com.au</a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</thead>\r\n	<!--*--><!--*-->\r\n	<tbody>\r\n		<tr>\r\n			<td style="background: #fff2f4; padding: 66px 0 65px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align: top; width: 470px; padding-left: 70px;">\r\n						<table cellpadding="0" cellspacing="0" width="100%">\r\n							<tbody>\r\n								<tr>\r\n									<td style="font-size: 18px; line-height: 1; color: #000000; line-height: 1; text-transform: uppercase; padding-bottom: 17px;">Hi {{ @$name }}</td>\r\n								</tr>\r\n								<tr>\r\n									<td style="font-size: 14px; line-height: 22px;  color: #000; font-weight: 400; padding: 20px 0 0;">\r\n									<p>Please <a href="{{ $url }}">Click Here</a> to active your account.</p>\r\n\r\n									<p>&nbsp;</p>\r\n\r\n									<p>&nbsp;</p>\r\n\r\n									<p>&nbsp;</p>\r\n\r\n									<p>&nbsp;</p>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n						<td style="vertical-align: middle; padding-right: 70px;"><img alt="" src="https://redflagdata.com.au/photos/1/verify_icon.png" style="display: block; border: none; outline: none; float: right; width: 79px; height: 79px;" /></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n	<!--*--><!--*-->\r\n	<tfoot>\r\n		<tr>\r\n			<td style="padding: 35px 0 42px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="padding:0 70px;"><a href="https://redflagdata.com.au/" style="float: left; outline: none;border: none;"><img alt="" src="https://redflagdata.com.au/photos/1/logo.png" style="display: block; outline: none; border: none;" /> </a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tfoot>\r\n	<!--*-->\r\n</table>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Is Redflagdata.com.au secure to use?', 'Absolutely. We’ve placed security at the top of our priority list to help ensure your information and\r\nguardian’s information is protected.', 1, '2018-03-27 18:30:00', NULL),
(2, 'Can I cancel my membership with Red Flag Data?', 'You may do so at any time. “No refunds, or prorated refunds will be issued.” “Termination of service\r\nmust occur before the end of your paid membership/subscription (annual) PRIOR TO AUTO RENEW.', 1, NULL, NULL),
(3, 'Is my membership fee tax deductable?', 'Yes', 1, '2018-03-27 18:30:00', '2018-03-27 18:30:00'),
(4, 'ertert', 'ertert', 0, '2018-03-28 00:51:31', '2018-03-28 00:55:50'),
(5, 'qweqweqwe', 'qweqweqweqweqw', 1, '2018-03-28 04:32:54', '2018-03-28 04:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `franchisees`
--

CREATE TABLE `franchisees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_person_name` varchar(255) NOT NULL,
  `contact_person_phone` varchar(100) NOT NULL,
  `contact_person_email` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(100) NOT NULL,
  `suburb` varchar(100) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `public_liability_insurance` date DEFAULT NULL,
  `employers_liability_insurance` date DEFAULT NULL,
  `franchise_license_renewal_date` date DEFAULT NULL,
  `company_year_end` date DEFAULT NULL,
  `confirmation_statement_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `franchisees`
--

INSERT INTO `franchisees` (`id`, `name`, `contact_person_name`, `contact_person_phone`, `contact_person_email`, `status`, `address`, `state`, `suburb`, `postcode`, `public_liability_insurance`, `employers_liability_insurance`, `franchise_license_renewal_date`, `company_year_end`, `confirmation_statement_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'UBER', 'MD HASIBUR RAHAMAN', '7059114888', 'rahamanh939@gmail.com', 1, 'Garia station road', 'West Bengal', 'kolkata', '700084', '2018-09-27', '2018-09-29', '2018-10-31', '2018-09-28', '2018-09-28', '2018-08-17 00:17:53', '2018-09-21 00:53:02', NULL),
(2, 'DMD', 'Jardine', '8520147963', 'jardine2018@gmail.com', 1, 'kolkata', 'wb', 'mnbvb', '41014', '2019-09-14', '2018-09-14', '2019-09-12', '2018-09-20', '2018-09-19', '2018-08-17 00:20:35', '2018-09-14 02:43:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `franchisees_price`
--

CREATE TABLE `franchisees_price` (
  `id` int(10) NOT NULL,
  `franchisees_id` int(20) NOT NULL,
  `driver_cost` float NOT NULL,
  `cost_per_mile` float NOT NULL,
  `return_journey` varchar(50) NOT NULL,
  `return_mileage_cost` float NOT NULL,
  `paid_mileage` float NOT NULL,
  `base_driving_cost` float NOT NULL,
  `waiting_time_cost` float NOT NULL,
  `companionship_cost` float NOT NULL,
  `average_speed` float NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `franchisees_price`
--

INSERT INTO `franchisees_price` (`id`, `franchisees_id`, `driver_cost`, `cost_per_mile`, `return_journey`, `return_mileage_cost`, `paid_mileage`, `base_driving_cost`, `waiting_time_cost`, `companionship_cost`, `average_speed`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 10, 0.4, 'yes', 0, 0.5, 60, 12, 20, 30, '2018-08-13 11:32:25', '2018-09-21 00:53:02', NULL),
(2, 2, 750, 50, 'yes', 50, 58, 15, 30, 70, 40, '2018-08-16 07:52:52', '2018-09-14 04:12:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `general_setting`
--

CREATE TABLE `general_setting` (
  `id` int(11) NOT NULL,
  `veriable_slug` varchar(100) NOT NULL,
  `setting_name` varchar(255) NOT NULL,
  `setting_value` text NOT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `field_type` int(11) DEFAULT '1' COMMENT '1=>Textarea,2=>image'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_setting`
--

INSERT INTO `general_setting` (`id`, `veriable_slug`, `setting_name`, `setting_value`, `alt_text`, `field_type`) VALUES
(1, 'site_name', 'Site Name', 'Driving Miss Daisy', NULL, 1),
(2, 'tagline', 'Site Tagline', '#', NULL, 1),
(3, 'home_logo', 'Home Page Logo', 'http://192.168.1.39/redflag/photos/1/logo.png', 'Home Page Logo', 2),
(4, 'footer_logo', 'Footer Logo', 'http://192.168.1.39/redflag/photos/1/logo.png', NULL, 2),
(5, 'footer_text', 'Footer Text', 'Red Flag Data provides access to a safe, secure national database for childcare providers, OOSH Co-ordinators', NULL, 1),
(6, 'contact_email', 'Contact Email', 'contact@redflagdata.com.au', NULL, 1),
(7, 'contact_phone', 'Contact Phone', '7059114888', NULL, 1),
(8, 'contact_address', 'Adress', 'Address', NULL, 1),
(9, 'fb_link', 'Facebook', 'http://facebook.com', NULL, 1),
(10, 'twitter_link', 'Twitter Link', 'https://twitter.com/', NULL, 1),
(11, 'gplus_link', 'Google Link', 'https://plus.google.com/discover', NULL, 1),
(12, 'youtube_link', 'Youtube Link', 'http://localhost/redflag/admin/general-setting/12/edit', NULL, 1),
(13, 'footer_text_signup', 'Youtube Link', 'Thank you for signing up', NULL, 1),
(14, 'remove_flag_warning_message', 'Remove Flag Warning message ', ' only tick this box in extreme cases the guardian has paid but you still want to show in search result , for reason such as,Abusive to staff or you were forced to take legal action against them.', NULL, 1),
(15, 'outstanding_fee_policy', 'outstanding fee policy"', 'http://192.168.1.39/redflag/files/1/Outstanding-fee-policy.docx', NULL, 3),
(16, 'working_hours', 'workin_hours', 'Monday to Friday 9am to 5pm', NULL, 3),
(17, 'instagram_link', 'instagram', 'https://www.instagram.com/redflagdata.com.au/', NULL, 1),
(18, 'linkedin_link', 'linkedin', 'https://www.linkedin.com/company/redflagdata-com-au/', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_02_19_085638_entrust_setup_tables', 2),
(4, '2018_02_20_082558_user_subscription', 3),
(5, '2018_02_20_083016_subscription', 4),
(6, '2018_02_26_095611_create_jobs_table', 5),
(7, '2018_02_27_053619_add_renews_at_column_to_subscriptions', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'debugbar.openhandler', 'debugbar.openhandler', 'debugbar.openhandler', '2018-02-19 05:40:04', '2018-02-19 05:40:04'),
(2, 'debugbar.clockwork', 'debugbar.clockwork', 'debugbar.clockwork', '2018-02-19 05:40:04', '2018-02-19 05:40:04'),
(3, 'debugbar.assets.css', 'debugbar.assets.css', 'debugbar.assets.css', '2018-02-19 05:40:04', '2018-02-19 05:40:04'),
(4, 'debugbar.assets.js', 'debugbar.assets.js', 'debugbar.assets.js', '2018-02-19 05:40:04', '2018-02-19 05:40:04'),
(5, 'debugbar.cache.delete', 'debugbar.cache.delete', 'debugbar.cache.delete', '2018-02-19 05:40:04', '2018-02-19 05:40:04'),
(6, 'login', 'login', 'login', '2018-02-19 05:40:04', '2018-02-19 05:40:04'),
(7, 'logout', 'logout', 'logout', '2018-02-19 05:40:04', '2018-02-19 05:40:04'),
(8, 'register', 'register', 'register', '2018-02-19 05:40:04', '2018-02-19 05:40:04'),
(9, 'password.request', 'password.request', 'password.request', '2018-02-19 05:40:04', '2018-02-19 05:40:04'),
(10, 'password.email', 'password.email', 'password.email', '2018-02-19 05:40:04', '2018-02-19 05:40:04'),
(11, 'password.reset', 'password.reset', 'password.reset', '2018-02-19 05:40:04', '2018-02-19 05:40:04'),
(12, 'home', 'home', 'home', '2018-02-19 05:40:04', '2018-02-19 05:40:04'),
(13, 'admin', 'admin', 'admin', '2018-02-19 05:40:04', '2018-02-19 05:40:04'),
(14, 'adminLogin', 'adminLogin', 'adminLogin', '2018-02-19 05:40:04', '2018-02-19 05:40:04'),
(15, 'profile', 'profile', 'profile', '2018-02-19 05:40:04', '2018-02-19 05:40:04'),
(16, 'role.index', 'role.index', 'role.index', '2018-02-19 05:40:04', '2018-02-19 05:40:04'),
(17, 'role.create', 'role.create', 'role.create', '2018-02-19 05:40:04', '2018-02-19 05:40:04'),
(18, 'role.store', 'role.store', 'role.store', '2018-02-19 05:40:04', '2018-02-19 05:40:04'),
(19, 'role.show', 'role.show', 'role.show', '2018-02-19 05:40:05', '2018-02-19 05:40:05'),
(20, 'role.edit', 'role.edit', 'role.edit', '2018-02-19 05:40:05', '2018-02-19 05:40:05'),
(21, 'role.update', 'role.update', 'role.update', '2018-02-19 05:40:05', '2018-02-19 05:40:05'),
(22, 'role.destroy', 'role.destroy', 'role.destroy', '2018-02-19 05:40:05', '2018-02-19 05:40:05'),
(23, 'permissions.index', 'permissions.index', 'permissions.index', '2018-02-19 05:40:05', '2018-02-19 05:40:05'),
(24, 'permissions.create', 'permissions.create', 'permissions.create', '2018-02-19 05:40:05', '2018-02-19 05:40:05'),
(25, 'permissions.store', 'permissions.store', 'permissions.store', '2018-02-19 05:40:05', '2018-02-19 05:40:05'),
(26, 'permissions.show', 'permissions.show', 'permissions.show', '2018-02-19 05:40:05', '2018-02-19 05:40:05'),
(27, 'permissions.edit', 'permissions.edit', 'permissions.edit', '2018-02-19 05:40:05', '2018-02-19 05:40:05'),
(28, 'permissions.update', 'permissions.update', 'permissions.update', '2018-02-19 05:40:05', '2018-02-19 05:40:05'),
(29, 'permissions.destroy', 'permissions.destroy', 'permissions.destroy', '2018-02-19 05:40:05', '2018-02-19 05:40:05'),
(30, 'testhome', 'testhome', 'testhome', '2018-08-13 05:32:19', '2018-08-13 05:32:19'),
(31, 'change-franchisees', 'change-franchisees', 'change-franchisees', '2018-08-13 05:32:20', '2018-08-13 05:32:20'),
(32, 'adminchangepassword', 'adminchangepassword', 'adminchangepassword', '2018-08-13 05:32:20', '2018-08-13 05:32:20'),
(33, 'adminChangePasswordPost', 'adminChangePasswordPost', 'adminChangePasswordPost', '2018-08-13 05:32:20', '2018-08-13 05:32:20'),
(34, 'franchisee.index', 'franchisee.index', 'franchisee.index', '2018-08-13 05:32:20', '2018-08-13 05:32:20'),
(35, 'franchisee.create', 'franchisee.create', 'franchisee.create', '2018-08-13 05:32:20', '2018-08-13 05:32:20'),
(36, 'franchisee.store', 'franchisee.store', 'franchisee.store', '2018-08-13 05:32:20', '2018-08-13 05:32:20'),
(37, 'franchisee.show', 'franchisee.show', 'franchisee.show', '2018-08-13 05:32:20', '2018-08-13 05:32:20'),
(38, 'franchisee.edit', 'franchisee.edit', 'franchisee.edit', '2018-08-13 05:32:20', '2018-08-13 05:32:20'),
(39, 'franchisee.update', 'franchisee.update', 'franchisee.update', '2018-08-13 05:32:20', '2018-08-13 05:32:20'),
(40, 'franchisee.destroy', 'franchisee.destroy', 'franchisee.destroy', '2018-08-13 05:32:20', '2018-08-13 05:32:20'),
(41, 'email-template.index', 'email-template.index', 'email-template.index', '2018-08-13 05:32:20', '2018-08-13 05:32:20'),
(42, 'email-template.create', 'email-template.create', 'email-template.create', '2018-08-13 05:32:20', '2018-08-13 05:32:20'),
(43, 'email-template.store', 'email-template.store', 'email-template.store', '2018-08-13 05:32:20', '2018-08-13 05:32:20'),
(44, 'email-template.show', 'email-template.show', 'email-template.show', '2018-08-13 05:32:20', '2018-08-13 05:32:20'),
(45, 'email-template.edit', 'email-template.edit', 'email-template.edit', '2018-08-13 05:32:20', '2018-08-13 05:32:20'),
(46, 'email-template.update', 'email-template.update', 'email-template.update', '2018-08-13 05:32:20', '2018-08-13 05:32:20'),
(47, 'email-template.destroy', 'email-template.destroy', 'email-template.destroy', '2018-08-13 05:32:20', '2018-08-13 05:32:20'),
(48, 'general-setting.index', 'general-setting.index', 'general-setting.index', '2018-08-13 05:32:21', '2018-08-13 05:32:21'),
(49, 'general-setting.create', 'general-setting.create', 'general-setting.create', '2018-08-13 05:32:21', '2018-08-13 05:32:21'),
(50, 'general-setting.store', 'general-setting.store', 'general-setting.store', '2018-08-13 05:32:21', '2018-08-13 05:32:21'),
(51, 'general-setting.show', 'general-setting.show', 'general-setting.show', '2018-08-13 05:32:21', '2018-08-13 05:32:21'),
(52, 'general-setting.edit', 'general-setting.edit', 'general-setting.edit', '2018-08-13 05:32:21', '2018-08-13 05:32:21'),
(53, 'general-setting.update', 'general-setting.update', 'general-setting.update', '2018-08-13 05:32:21', '2018-08-13 05:32:21'),
(54, 'general-setting.destroy', 'general-setting.destroy', 'general-setting.destroy', '2018-08-13 05:32:21', '2018-08-13 05:32:21'),
(55, 'faq.index', 'faq.index', 'faq.index', '2018-08-13 05:32:21', '2018-08-13 05:32:21'),
(56, 'faq.create', 'faq.create', 'faq.create', '2018-08-13 05:32:21', '2018-08-13 05:32:21'),
(57, 'faq.store', 'faq.store', 'faq.store', '2018-08-13 05:32:21', '2018-08-13 05:32:21'),
(58, 'faq.show', 'faq.show', 'faq.show', '2018-08-13 05:32:21', '2018-08-13 05:32:21'),
(59, 'faq.edit', 'faq.edit', 'faq.edit', '2018-08-13 05:32:21', '2018-08-13 05:32:21'),
(60, 'faq.update', 'faq.update', 'faq.update', '2018-08-13 05:32:21', '2018-08-13 05:32:21'),
(61, 'faq.destroy', 'faq.destroy', 'faq.destroy', '2018-08-13 05:32:21', '2018-08-13 05:32:21'),
(62, 'franchisor.index', 'franchisor.index', 'franchisor.index', '2018-08-13 05:32:21', '2018-08-13 05:32:21'),
(63, 'franchisor.create', 'franchisor.create', 'franchisor.create', '2018-08-13 05:32:21', '2018-08-13 05:32:21'),
(64, 'franchisor.store', 'franchisor.store', 'franchisor.store', '2018-08-13 05:32:21', '2018-08-13 05:32:21'),
(65, 'franchisor.show', 'franchisor.show', 'franchisor.show', '2018-08-13 05:32:22', '2018-08-13 05:32:22'),
(66, 'franchisor.edit', 'franchisor.edit', 'franchisor.edit', '2018-08-13 05:32:22', '2018-08-13 05:32:22'),
(67, 'franchisor.update', 'franchisor.update', 'franchisor.update', '2018-08-13 05:32:22', '2018-08-13 05:32:22'),
(68, 'franchisor.destroy', 'franchisor.destroy', 'franchisor.destroy', '2018-08-13 05:32:22', '2018-08-13 05:32:22'),
(69, 'users.index', 'users.index', 'users.index', '2018-08-13 05:32:22', '2018-08-13 05:32:22'),
(70, 'users.create', 'users.create', 'users.create', '2018-08-13 05:32:22', '2018-08-13 05:32:22'),
(71, 'users.store', 'users.store', 'users.store', '2018-08-13 05:32:22', '2018-08-13 05:32:22'),
(72, 'users.show', 'users.show', 'users.show', '2018-08-13 05:32:22', '2018-08-13 05:32:22'),
(73, 'users.edit', 'users.edit', 'users.edit', '2018-08-13 05:32:22', '2018-08-13 05:32:22'),
(74, 'users.update', 'users.update', 'users.update', '2018-08-13 05:32:22', '2018-08-13 05:32:22'),
(75, 'users.destroy', 'users.destroy', 'users.destroy', '2018-08-13 05:32:22', '2018-08-13 05:32:22'),
(76, 'driver.index', 'driver.index', 'driver.index', '2018-08-13 05:32:22', '2018-08-13 05:32:22'),
(77, 'driver.create', 'driver.create', 'driver.create', '2018-08-13 05:32:22', '2018-08-13 05:32:22'),
(78, 'driver.store', 'driver.store', 'driver.store', '2018-08-13 05:32:22', '2018-08-13 05:32:22'),
(79, 'driver.show', 'driver.show', 'driver.show', '2018-08-13 05:32:22', '2018-08-13 05:32:22'),
(80, 'driver.edit', 'driver.edit', 'driver.edit', '2018-08-13 05:32:23', '2018-08-13 05:32:23'),
(81, 'driver.update', 'driver.update', 'driver.update', '2018-08-13 05:32:23', '2018-08-13 05:32:23'),
(82, 'driver.destroy', 'driver.destroy', 'driver.destroy', '2018-08-13 05:32:23', '2018-08-13 05:32:23'),
(83, 'franchisee-user.index', 'franchisee-user.index', 'franchisee-user.index', '2018-08-13 05:32:23', '2018-08-13 05:32:23'),
(84, 'franchisee-user.create', 'franchisee-user.create', 'franchisee-user.create', '2018-08-13 05:32:23', '2018-08-13 05:32:23'),
(85, 'franchisee-user.store', 'franchisee-user.store', 'franchisee-user.store', '2018-08-13 05:32:23', '2018-08-13 05:32:23'),
(86, 'franchisee-user.show', 'franchisee-user.show', 'franchisee-user.show', '2018-08-13 05:32:23', '2018-08-13 05:32:23'),
(87, 'franchisee-user.edit', 'franchisee-user.edit', 'franchisee-user.edit', '2018-08-13 05:32:23', '2018-08-13 05:32:23'),
(88, 'franchisee-user.update', 'franchisee-user.update', 'franchisee-user.update', '2018-08-13 05:32:23', '2018-08-13 05:32:23'),
(89, 'franchisee-user.destroy', 'franchisee-user.destroy', 'franchisee-user.destroy', '2018-08-13 05:32:23', '2018-08-13 05:32:23'),
(90, 'driving-request.index', 'driving-request.index', 'driving-request.index', '2018-08-13 05:32:23', '2018-08-13 05:32:23'),
(91, 'driving-request.create', 'driving-request.create', 'driving-request.create', '2018-08-13 05:32:23', '2018-08-13 05:32:23'),
(92, 'driving-request.store', 'driving-request.store', 'driving-request.store', '2018-08-13 05:32:23', '2018-08-13 05:32:23'),
(93, 'driving-request.show', 'driving-request.show', 'driving-request.show', '2018-08-13 05:32:23', '2018-08-13 05:32:23'),
(94, 'driving-request.edit', 'driving-request.edit', 'driving-request.edit', '2018-08-13 05:32:23', '2018-08-13 05:32:23'),
(95, 'driving-request.update', 'driving-request.update', 'driving-request.update', '2018-08-13 05:32:23', '2018-08-13 05:32:23'),
(96, 'driving-request.destroy', 'driving-request.destroy', 'driving-request.destroy', '2018-08-13 05:32:23', '2018-08-13 05:32:23'),
(97, 'drivingstore', 'drivingstore', 'drivingstore', '2018-08-13 05:32:23', '2018-08-13 05:32:23'),
(98, 'editprofile', 'editprofile', 'editprofile', '2018-09-12 07:56:42', '2018-09-12 07:56:42'),
(99, 'profile-update', 'profile-update', 'profile-update', '2018-09-12 07:56:43', '2018-09-12 07:56:43'),
(100, 'default-permissions.index', 'default-permissions.index', 'default-permissions.index', '2018-09-12 07:56:43', '2018-09-12 07:56:43'),
(101, 'default-permissions.create', 'default-permissions.create', 'default-permissions.create', '2018-09-12 07:56:43', '2018-09-12 07:56:43'),
(102, 'default-permissions.store', 'default-permissions.store', 'default-permissions.store', '2018-09-12 07:56:43', '2018-09-12 07:56:43'),
(103, 'default-permissions.show', 'default-permissions.show', 'default-permissions.show', '2018-09-12 07:56:43', '2018-09-12 07:56:43'),
(104, 'default-permissions.edit', 'default-permissions.edit', 'default-permissions.edit', '2018-09-12 07:56:43', '2018-09-12 07:56:43'),
(105, 'default-permissions.update', 'default-permissions.update', 'default-permissions.update', '2018-09-12 07:56:43', '2018-09-12 07:56:43'),
(106, 'default-permissions.destroy', 'default-permissions.destroy', 'default-permissions.destroy', '2018-09-12 07:56:43', '2018-09-12 07:56:43'),
(107, 'booking.index', 'booking.index', 'booking.index', '2018-09-12 07:56:43', '2018-09-12 07:56:43'),
(108, 'booking.create', 'booking.create', 'booking.create', '2018-09-12 07:56:43', '2018-09-12 07:56:43'),
(109, 'booking.store', 'booking.store', 'booking.store', '2018-09-12 07:56:43', '2018-09-12 07:56:43'),
(110, 'booking.show', 'booking.show', 'booking.show', '2018-09-12 07:56:43', '2018-09-12 07:56:43'),
(111, 'booking.edit', 'booking.edit', 'booking.edit', '2018-09-12 07:56:44', '2018-09-12 07:56:44'),
(112, 'booking.update', 'booking.update', 'booking.update', '2018-09-12 07:56:44', '2018-09-12 07:56:44'),
(113, 'booking.destroy', 'booking.destroy', 'booking.destroy', '2018-09-12 07:56:44', '2018-09-12 07:56:44'),
(114, 'vehicles.index', 'vehicles.index', 'vehicles.index', '2018-09-12 07:56:44', '2018-09-12 07:56:44'),
(115, 'vehicles.create', 'vehicles.create', 'vehicles.create', '2018-09-12 07:56:44', '2018-09-12 07:56:44'),
(116, 'vehicles.store', 'vehicles.store', 'vehicles.store', '2018-09-12 07:56:44', '2018-09-12 07:56:44'),
(117, 'vehicles.show', 'vehicles.show', 'vehicles.show', '2018-09-12 07:56:44', '2018-09-12 07:56:44'),
(118, 'vehicles.edit', 'vehicles.edit', 'vehicles.edit', '2018-09-12 07:56:44', '2018-09-12 07:56:44'),
(119, 'vehicles.update', 'vehicles.update', 'vehicles.update', '2018-09-12 07:56:44', '2018-09-12 07:56:44'),
(120, 'vehicles.destroy', 'vehicles.destroy', 'vehicles.destroy', '2018-09-12 07:56:44', '2018-09-12 07:56:44'),
(121, 'calender', 'calender', 'calender', '2018-09-12 07:56:44', '2018-09-12 07:56:44'),
(122, 'boking-details', 'boking-details', 'boking-details', '2018-09-12 07:56:45', '2018-09-12 07:56:45'),
(123, 'forgotpassword-link', 'forgotpassword-link', 'forgotpassword-link', '2018-09-12 07:56:45', '2018-09-12 07:56:45'),
(124, 'forgotpasswordpost', 'forgotpasswordpost', 'forgotpasswordpost', '2018-09-12 07:56:45', '2018-09-12 07:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 4),
(16, 4),
(41, 4),
(44, 4),
(1, 5),
(2, 5),
(3, 5),
(4, 5),
(5, 5),
(6, 5),
(7, 5),
(8, 5),
(9, 5),
(10, 5),
(11, 5),
(12, 5),
(13, 5),
(14, 5),
(15, 5),
(16, 5),
(17, 5),
(18, 5),
(19, 5),
(20, 5),
(21, 5),
(22, 5),
(23, 5),
(24, 5),
(25, 5),
(26, 5),
(27, 5),
(28, 5),
(29, 5),
(30, 5),
(31, 5),
(32, 5),
(33, 5),
(34, 5),
(35, 5),
(36, 5),
(37, 5),
(38, 5),
(39, 5),
(40, 5),
(41, 5),
(42, 5),
(43, 5),
(44, 5),
(45, 5),
(46, 5),
(47, 5),
(48, 5),
(49, 5),
(50, 5),
(51, 5),
(52, 5),
(53, 5),
(54, 5),
(55, 5),
(56, 5),
(57, 5),
(58, 5),
(59, 5),
(60, 5),
(61, 5),
(62, 5),
(63, 5),
(64, 5),
(65, 5),
(66, 5),
(67, 5),
(68, 5),
(69, 5),
(70, 5),
(71, 5),
(72, 5),
(73, 5),
(74, 5),
(75, 5),
(76, 5),
(77, 5),
(78, 5),
(79, 5),
(80, 5),
(81, 5),
(82, 5),
(83, 5),
(84, 5),
(85, 5),
(86, 5),
(87, 5),
(88, 5),
(89, 5),
(90, 5),
(91, 5),
(92, 5),
(93, 5),
(94, 5),
(95, 5),
(96, 5),
(97, 5),
(4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `pickup_locations`
--

CREATE TABLE `pickup_locations` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `pickup_position` int(11) NOT NULL DEFAULT '1',
  `location_name` varchar(255) NOT NULL,
  `distance` double(11,2) NOT NULL,
  `travel_time` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pickup_locations`
--

INSERT INTO `pickup_locations` (`id`, `booking_id`, `pickup_position`, `location_name`, `distance`, `travel_time`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, 7, 1, 'Ruby General Hospital, Anandapur Main Road, Sector I, East Kolkata Township, Calcutta, West Bengal, India', 4.00, 15, '2018-09-20 01:57:13', '2018-09-20 01:57:13', NULL),
(15, 7, 99, 'Garia Station Road, Baidyapara, Garia, Calcutta, West Bengal, India', 4.00, 15, '2018-09-20 01:57:13', '2018-09-20 01:57:13', NULL),
(16, 8, 1, 'Ruby Hospital, Eastern Metropolitan Bypass, Sector C, East Kolkata Township, Calcutta, West Bengal, India', 4.00, 15, '2018-09-20 02:50:56', '2018-09-20 02:50:56', NULL),
(17, 8, 2, 'Science City, East Topsia, Topsia, Calcutta, West Bengal', 2.00, 7, '2018-09-20 02:50:56', '2018-09-20 02:50:56', NULL),
(18, 8, 3, 'Sealdah Railway Station, Sealdah, Raja Bazar, Calcutta, West Bengal, India', 3.02, 18, '2018-09-20 02:50:56', '2018-09-20 02:50:56', NULL),
(19, 8, 99, 'Dum Dum, Calcutta, West Bengal, India', 12.00, 41, '2018-09-20 02:50:56', '2018-09-20 02:50:56', NULL),
(20, 9, 1, 'Sealdah Railway Station, Sealdah, Raja Bazar, Calcutta, West Bengal, India', 9.00, 39, '2018-09-21 03:38:58', '2018-09-21 03:38:58', NULL),
(21, 9, 99, 'Kolkata Railway Station (Chitpur Station), Belgachia, Calcutta, West Bengal, India', 4.00, 23, '2018-09-21 03:38:58', '2018-09-21 03:38:58', NULL),
(22, 10, 1, 'Santoshpur, Calcutta, West Bengal, India', 2.01, 10, '2018-09-21 04:03:00', '2018-09-21 04:03:00', NULL),
(23, 10, 99, 'Salt Lake City, West Bengal, India', 8.00, 32, '2018-09-21 04:03:01', '2018-09-21 04:03:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `franchisees_id` int(11) DEFAULT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `franchisees_id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(4, NULL, 'Main Role 2', 'Display name', 'Description', '2018-02-19 05:53:37', '2018-08-27 03:12:49'),
(5, NULL, 'Main Role', 'Hasibur', 'Hasibur', '2018-02-19 05:59:16', '2018-08-27 03:12:41'),
(6, 1, 'DC Role', 'Display name', 'Description', '2018-08-13 06:09:23', '2018-08-27 03:12:26');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(20, 4),
(26, 4),
(8, 5),
(26, 5),
(8, 6),
(16, 6),
(19, 6),
(26, 6);

-- --------------------------------------------------------

--
-- Table structure for table `trip_route`
--

CREATE TABLE `trip_route` (
  `id` int(10) NOT NULL,
  `booking_id` int(10) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `travel_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `is_super` int(11) DEFAULT NULL,
  `user_type` int(11) NOT NULL DEFAULT '4' COMMENT '1=>Franchisor, 2=>Franchisee, 3=>Driver,4=>Users',
  `franchisees_id` int(11) DEFAULT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'profile.jpg',
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suburb` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `is_super`, `user_type`, `franchisees_id`, `name`, `surname`, `profile_pic`, `email`, `password`, `remember_token`, `device_token`, `dob`, `phone`, `address`, `country`, `state`, `suburb`, `postcode`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(1, 1, 1, 1, 'Hasibur Rahaman', NULL, 'profile.jpg', 'hasib2008@gmail.com', '$2y$10$azBENyVBiAfJOovL8fD3iuRZszIuT3WG0/MtJBFJrMGvlfmXf0sQK', 'h79vFuJc6oj83MiK4dpHf7sUugoDJ51xhM7UXewPtAfBudjomqlbk2sWqCIo', '0', '2018-08-04', '7059114856', 'Kolkata', NULL, 'NT', 'WB', '70054', '2018-07-31 18:30:00', '2018-08-17 02:50:02', NULL, 1),
(8, NULL, 1, NULL, 'munmun dey', NULL, 'profile.jpg', 'munmundey2018@gmail.com', '$2y$10$L7dRCnAQlnMJ0cRcgMOc/Oe.4yTK78XcUIv/CU9NtBcG/SpLBfLSe', NULL, '0', '1987-08-05', '7410235689', 'burdwan', NULL, 'WB', 'hghgg', '71314', '2018-08-17 00:16:24', '2018-08-27 03:10:06', NULL, 1),
(9, NULL, 2, 2, 'Kivell', NULL, 'profile.jpg', 'kivel20174@gmail.com', '$2y$10$mxc0r.aWJ/1H8B0//e0yRuA5YCDCwFe63toqXOSBwypACK3QJMJgC', NULL, '0', '1985-08-21', '7521036547', 'kolkata', NULL, 'WB', 'hjkl', '1234', '2018-08-17 00:25:16', '2018-08-23 05:53:55', NULL, 1),
(10, 1, 2, 1, 'sunita dey', NULL, 'profile.jpg', 'sunitadey2015@gmail.com', '$2y$10$zLC2mg4Ws9/awvNbcXN3Su.PopzIyWlBBq8lGDY6QvRHqgAEiVGNy', 'WVjCwCMjLpStJOkS99UsyNfUfPRpRzBL8J6yea3zKUkuxxNMuGj6vqgFIZQj', '0', '1989-08-07', '7410258963', 'burdwan', NULL, 'WB', 'hghgg', '1234', '2018-08-17 00:27:05', '2018-08-17 05:57:59', NULL, 1),
(11, NULL, 3, 1, 'morgan', NULL, 'profile.jpg', 'morgansahoo@gmail.com', '$2y$10$azBENyVBiAfJOovL8fD3iuRZszIuT3WG0/MtJBFJrMGvlfmXf0sQK', 'YInoQkLRxJWmhJprtTahiW1bA69QI3gdsE3skmG3bwlrYYAA30KwoTR8v2RG', '0', '1990-08-25', '7410148528', 'kolkata', 'india', 'WA', 'jhhk', '74108', '2018-08-17 00:28:11', '2018-09-07 05:46:51', NULL, 1),
(12, NULL, 3, 1, 'Sorvino roy', NULL, 'profile.jpg', 'sourvinoroy2014@gmail.com', '$2y$10$azBENyVBiAfJOovL8fD3iuRZszIuT3WG0/MtJBFJrMGvlfmXf0sQK', NULL, '0', '1978-08-11', '8520147989', 'kolkata', NULL, 'WA', 'hghgg', '1234', '2018-08-17 00:43:26', '2018-08-17 00:43:26', NULL, 1),
(13, NULL, 1, NULL, 'anita dey', NULL, 'profile.jpg', 'anitadey2015@gmail.com', '$2y$10$4Qgjr7UDZcD6o/tKGVQsoOQXP8gcGBkNaNBy6PwRb4iDexPCyDdy2', NULL, '0', '1992-08-05', '7410258963', 'kolkata', NULL, 'WA', 'hghgg', '1234', '2018-08-17 01:17:12', '2018-08-17 01:17:12', NULL, 1),
(14, NULL, 3, 1, 'aviavi', NULL, 'profile.jpg', 'avi45@gmail.com', '$2y$10$xul5bChnN4xy4dt4xNuM/OEgHTCTiRE9tf7xgDOrNow6QxuVdJnYu', NULL, '0', '1998-08-07', '8569320147', 'kolkata', NULL, 'wb', 'bnm', '12345', '2018-08-17 04:26:37', '2018-08-17 04:26:37', NULL, 1),
(15, NULL, 4, NULL, 'rimpa', NULL, 'profile.jpg', 'rimpa2015@gmail.com', '$2y$10$r78BJZM7vgc70DSl0FtQguvy8lr3QJkBv730un/2tcKwKow3aR8pS', NULL, '0', '1988-08-01', '8520147963', 'kolkata', NULL, 'WB', 'vbnm', '12345', '2018-08-17 05:25:13', '2018-08-17 05:25:13', NULL, 1),
(16, NULL, 1, NULL, 'rinku', NULL, 'profile.jpg', 'rinku45@gmail.com', '$2y$10$XDnSrBAmkrhtyNJCOThKEeatXQB4Ye0Vwf5qIHSmn6EyMS5NoDQ36', 'Dk0lmpaehvwpG4YSeFZsatEHIPC1drd61q8yxmP7FAictx5gBAiQVuedj8Up', '0', '1998-08-20', '8974563210', 'burdwan', NULL, 'WB', 'hghgg', '1234', '2018-08-17 05:28:17', '2018-08-27 03:09:56', NULL, 1),
(19, NULL, 1, NULL, 'souvick dey', NULL, 'profile.jpg', 'souvickdey@gmail.com', '$2y$10$HYc0FjoXErnLNt8jPJQalOih5blj.JWYGe46e1m.4NRd7QEsMGSb2', NULL, '0', '1995-08-06', '8542369710', 'kolkata', NULL, 'WB', 'hghgg', '1234', '2018-08-18 02:53:44', '2018-08-19 23:45:50', NULL, 1),
(20, NULL, 1, NULL, 'Morgan sen', NULL, 'profile.jpg', 'morgansen45@gmail.com', '$2y$10$e.a9ul9NEFNHiE/UCxMehesKtd0oHJwqnAk5rCLf4a9u2Y3FJRqbW', '4YPXnQcFyjT2AN641vD6XBX8NLrKxUvlQ0VEYBa0V0bbwdRzlB8lxRQs6huu', '0', '2000-08-01', '7854120369', 'garia', NULL, 'WB', 'hghgg', '1234', '2018-08-18 02:56:04', '2018-08-18 02:56:04', NULL, 1),
(26, 1, 1, NULL, 'aviavi', NULL, 'profile.jpg', 'avi82@gmail.com', '$2y$10$m.Hoo24JL3qsNnpYJJJie.7u26YeaK3ojKO3Kst9A0UYeDiqO/A/S', NULL, '0', '1990-08-05', '8742369510', 'kolkata', NULL, 'WB', 'vbnm', '1234', '2018-08-18 04:32:23', '2018-08-27 03:13:37', NULL, 1),
(29, NULL, 3, 2, 'patit', NULL, 'profile.jpg', 'patit1@gmail.com', '1234', NULL, NULL, '2018-09-04', '9804948710', 'kolkata', NULL, 'WB', 'jklsdefs', '7124', '2018-09-07 03:02:37', '2018-09-07 05:17:07', NULL, 1),
(31, NULL, 3, 1, 'munmunmun', NULL, 'profile.jpg', 'munmunmundey@gmail.com', '1234', NULL, NULL, '1999-12-12', '7410235689', 'kolkata', NULL, 'wb', 'adsasdasd', '45632', '2018-09-13 06:09:24', '2018-09-13 06:09:24', NULL, 1),
(32, NULL, 3, 2, 'rimpa', 'roy', '1536904851-5b9b4e93ab7bd.jpeg', 'rimparoy378@gmail.com', '$2y$10$AWiofiDykpnaJCZSEyOcgeP4RTQtR.aMCkxOQCwBVBGxIVhPgPmNu', NULL, NULL, '2001-09-05', '9856320147', 'garia', NULL, 'WA', 'hghgg', '12345', '2018-09-13 06:51:55', '2018-09-14 01:01:48', NULL, 1),
(33, NULL, 3, 1, 'susmita', 'roy', '1536908395-5b9b5c6bcae48.png', 'susmitaroy78@gmail.com', '$2y$10$BIEZN2B98CWeh/D7GLdQIe8oEv/38OVzJuyX570866VzZGwU4Oyxi', NULL, NULL, '1990-09-18', '8541203697', 'kolkata', NULL, 'WA', 'hghgg', '1234', '2018-09-14 01:29:55', '2018-09-14 01:29:55', NULL, 1),
(35, NULL, 3, 1, 'souvick', 'dey', 'profile.jpg', 'souvick2008@gmail.com', '1234', NULL, NULL, '1999-12-12', '8542369710', 'kolkata', NULL, 'WB', 'hghgg', '1234', '2018-09-14 05:09:17', '2018-09-14 05:09:17', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `franchisees_id` int(11) NOT NULL,
  `body_type` int(255) NOT NULL,
  `vehicles_model` varchar(255) NOT NULL,
  `vehicles_company` varchar(255) NOT NULL,
  `vehicles_number` varchar(20) NOT NULL,
  `max_capacity` int(11) DEFAULT NULL,
  `councile_license_no` varchar(255) NOT NULL,
  `council_date` date DEFAULT NULL,
  `tax_renewal_date` date DEFAULT NULL,
  `insurance_date` date DEFAULT NULL,
  `mot_date` date DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1=>Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `franchisees_id`, `body_type`, `vehicles_model`, `vehicles_company`, `vehicles_number`, `max_capacity`, `councile_license_no`, `council_date`, `tax_renewal_date`, `insurance_date`, `mot_date`, `lat`, `lng`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 'Honda Fit', 'Toyota', 'WEE114217', 8, 'HJKL458213690', '2018-09-26', '2018-09-28', '2018-09-28', '2018-09-27', '22.839149', '88.594588', 1, '2018-09-18 04:55:05', '2018-09-20 03:20:13', NULL),
(2, 1, 1, 'Honda Fit', 'Toyota', 'WEE114217854', 8, 'HJKL458213690', '2018-09-26', '2018-09-27', '2018-09-28', '2018-09-26', '22.519221', '88.784671', 1, '2018-09-18 04:55:23', '2018-09-20 03:20:13', NULL),
(3, 2, 1, 'Honda Fit', 'Toyota', 'WEE114217854', 8, 'HJKL458213690', '2018-10-31', '2018-09-29', '2018-10-06', '2019-01-05', '22.507597', '88.696709', 1, '2018-09-18 04:55:53', '2018-09-20 03:20:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles_body_types`
--

CREATE TABLE `vehicles_body_types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles_body_types`
--

INSERT INTO `vehicles_body_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Coupe', NULL, NULL),
(2, 'SUV/MUV', NULL, NULL),
(3, 'Sedan', NULL, NULL),
(4, 'Convertible', NULL, NULL),
(5, 'Hatchback', NULL, NULL),
(6, 'Station Wagon', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `default_permissions`
--
ALTER TABLE `default_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_details`
--
ALTER TABLE `driver_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driving_request`
--
ALTER TABLE `driving_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `franchisees`
--
ALTER TABLE `franchisees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `franchisees_price`
--
ALTER TABLE `franchisees_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_setting`
--
ALTER TABLE `general_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `pickup_locations`
--
ALTER TABLE `pickup_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `trip_route`
--
ALTER TABLE `trip_route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles_body_types`
--
ALTER TABLE `vehicles_body_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `default_permissions`
--
ALTER TABLE `default_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `driver_details`
--
ALTER TABLE `driver_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `driving_request`
--
ALTER TABLE `driving_request`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `franchisees`
--
ALTER TABLE `franchisees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `franchisees_price`
--
ALTER TABLE `franchisees_price`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `general_setting`
--
ALTER TABLE `general_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `pickup_locations`
--
ALTER TABLE `pickup_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `trip_route`
--
ALTER TABLE `trip_route`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vehicles_body_types`
--
ALTER TABLE `vehicles_body_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
