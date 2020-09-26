-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 05, 2018 at 04:09 PM
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
  `order_id` varchar(10) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `franchisees_id` int(11) NOT NULL,
  `trip_status` int(11) DEFAULT NULL COMMENT '1=>Start, 2=>Complete,3=>Breakdown',
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
  `comfort_break` int(11) DEFAULT NULL,
  `total_distance` double(10,2) DEFAULT NULL,
  `total_duration` int(11) DEFAULT NULL,
  `total_price` double(10,2) DEFAULT NULL,
  `custom_price` double(10,2) DEFAULT NULL,
  `payment_mode` int(11) NOT NULL COMMENT '1=>Cash,2=>Credit',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `order_id`, `users_id`, `franchisees_id`, `trip_status`, `name`, `email`, `phone_number`, `address`, `note`, `booking_time`, `base_location`, `drop_location`, `outward_companion`, `outward_waiting`, `journey_type`, `return_companion`, `return_waiting`, `long_return`, `drop_off_to_base`, `comfort_break`, `total_distance`, `total_duration`, `total_price`, `custom_price`, `payment_mode`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '', 1, 1, 1, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', 'Note', '2018-09-29 16:55:00', 'Garia Station road Garia Kolkata 700084', 'Kolkata Railway Station (Chitpur Station), Belgachia, Calcutta, West Bengal, India', NULL, NULL, 2, NULL, NULL, 0, NULL, NULL, 24.96, 124, 51.00, 0.00, 1, '2018-09-22 05:14:49', '2018-10-04 08:43:46', NULL),
(2, '', 1, 1, NULL, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', 'as', '2018-09-29 19:55:00', 'Garia Station road Garia Kolkata 700084', 'Andhra Pradesh, India', NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, 857.84, 1554, 1717.00, 10.23, 1, '2018-09-24 07:44:32', '2018-09-24 08:37:15', NULL),
(3, '', 1, 1, NULL, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', NULL, '2018-09-29 19:55:00', 'Garia Station road Garia Kolkata 700084', 'Garia Station Road, Baidyapara, Garia, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, 24.29, 101, 50.00, 70.00, 1, '2018-09-24 08:50:28', '2018-09-25 04:57:52', NULL),
(35, '', 1, 1, NULL, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', 'dasdasd', '2018-09-29 23:55:00', 'Garia Station road Garia Kolkata 700084', 'Netaji Subhash Chandra Bose International Airport (CCU), Jessore Road, Dum Dum, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, 20.53, 83, 104.85, NULL, 1, '2018-09-27 02:03:59', '2018-09-27 02:03:59', NULL),
(41, '', 3, 1, 2, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', NULL, '2018-10-04 04:55:00', 'Garia Station road Garia Kolkata 700084', 'Dum Dum, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, 0, 15.82, 80, 248.70, 100.00, 1, '2018-10-04 23:25:34', '2018-10-05 01:12:46', NULL),
(42, '', 1, 1, 1, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', 'dasdasd', '2018-10-27 15:55:00', 'Garia Station road Garia Kolkata 700084', 'Netaji Subhash Chandra Bose International Airport (CCU), Jessore Road, Dum Dum, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, 20.53, 83, 104.85, NULL, 1, '2018-09-28 02:31:07', '2018-10-04 08:44:59', NULL),
(45, '', 1, 1, NULL, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', 'dasdasd', '2018-09-29 19:55:00', 'Garia Station road Garia Kolkata 700084', 'Netaji Subhash Chandra Bose International Airport (CCU), Jessore Road, Dum Dum, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, 20.53, 83, 104.85, NULL, 1, '2018-09-28 02:46:39', '2018-09-28 02:46:39', NULL),
(46, '', 1, 1, NULL, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', 'dasdasd', '2018-09-29 19:55:00', 'Garia Station road Garia Kolkata 700084', 'Netaji Subhash Chandra Bose International Airport (CCU), Jessore Road, Dum Dum, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, 20.53, 83, 104.85, NULL, 1, '2018-09-28 02:50:09', '2018-09-28 02:50:09', NULL),
(47, 'O-10047', 1, 1, NULL, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', 'dasdasd', '2018-09-29 19:55:00', 'Garia Station road Garia Kolkata 700084', 'Netaji Subhash Chandra Bose International Airport (CCU), Jessore Road, Dum Dum, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, 20.53, 83, 104.85, NULL, 1, '2018-09-28 02:50:30', '2018-09-28 02:50:30', NULL),
(48, 'O-10048', 1, 1, NULL, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', 'dasdasd', '2018-09-29 19:55:00', 'Garia Station road Garia Kolkata 700084', 'Netaji Subhash Chandra Bose International Airport (CCU), Jessore Road, Dum Dum, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, 20.53, 83, 104.85, NULL, 1, '2018-09-28 02:53:06', '2018-09-28 02:53:06', NULL),
(49, 'O-10049', 1, 1, NULL, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', 'dasdasd', '2018-10-31 10:50:00', 'Garia Station road Garia Kolkata 700084', 'Netaji Subhash Chandra Bose International Airport (CCU), Jessore Road, Dum Dum, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, 20.53, 83, 104.85, NULL, 1, '2018-09-28 02:55:57', '2018-09-28 02:55:57', NULL),
(50, 'O-10050', 1, 1, NULL, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', 'dasdasd', '2018-10-06 07:35:00', 'Garia Station road Garia Kolkata 700084', 'Netaji Subhash Chandra Bose International Airport (CCU), Jessore Road, Dum Dum, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, 20.53, 83, 104.85, NULL, 1, '2018-09-28 03:02:08', '2018-09-28 03:02:08', NULL),
(51, 'O-10051', 1, 1, NULL, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', 'dasdasd', '2018-09-29 19:55:00', 'Garia Station road Garia Kolkata 700084', 'Netaji Subhash Chandra Bose International Airport (CCU), Jessore Road, Dum Dum, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, 20.53, 83, 104.85, NULL, 1, '2018-09-28 04:13:23', '2018-09-28 04:13:23', NULL),
(53, 'O-10053', 1, 1, NULL, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', 'asdasd', '2018-11-02 15:55:00', 'Garia Station road Garia Kolkata 700084', 'Assam, India', NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, 3032.36, 5629, 23456.05, NULL, 1, '2018-09-28 04:23:31', '2018-09-28 04:23:31', NULL),
(54, 'O-10054', 1, 1, NULL, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', 'asdasd', '2018-09-29 15:55:00', 'Garia Station road Garia Kolkata 700084', 'Assam, India', NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, 3032.36, 5629, 23456.05, NULL, 1, '2018-09-28 04:28:10', '2018-09-28 04:28:10', NULL),
(55, 'O-10055', 1, 1, NULL, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', 'asdasd', '2018-10-27 19:55:00', 'Garia Station road Garia Kolkata 700084', 'Assam, India', NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, 3032.36, 5629, 23456.05, NULL, 1, '2018-09-28 04:28:39', '2018-09-28 04:28:39', NULL),
(56, 'O-10056', 1, 1, NULL, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', NULL, '2018-09-29 16:55:00', 'Garia Station road Garia Kolkata 700084', 'Sealdah Railway Station, Sealdah, Raja Bazar, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, 0, 9.78, 44, 207.55, NULL, 1, '2018-09-28 05:38:39', '2018-09-28 05:39:56', NULL),
(57, 'O-10057', 3, 1, NULL, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', 'asdasdas', '2018-09-29 15:55:00', 'Garia Station road Garia Kolkata 700084', 'Chitpur, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, 0, 12.35, 66, 317.55, NULL, 1, '2018-09-28 06:03:04', '2018-09-28 06:03:04', NULL),
(58, 'O-10058', 1, 1, NULL, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', NULL, '2018-10-13 07:35:00', 'Garia Station road Garia Kolkata 700084', 'Sealdah Railway Station, Sealdah, Raja Bazar, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, 0, 9.10, 41, 148.45, 200.00, 1, '2018-10-03 04:31:51', '2018-10-03 04:37:30', NULL),
(59, 'O-10059', 1, 1, NULL, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', NULL, '2018-10-20 19:55:00', 'Garia Station road Garia Kolkata 700084', 'Sealdah Railway Station, Sealdah, Raja Bazar, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, 0, 9.10, 41, 148.45, 200.00, 1, '2018-10-03 04:37:41', '2018-10-03 04:37:41', NULL),
(60, 'O-10060', 1, 1, NULL, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', NULL, '2018-10-13 19:55:00', 'Garia Station road Garia Kolkata 700084', 'Sealdah Railway Station, Sealdah, Raja Bazar, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, 0, 9.10, 41, 148.45, 200.00, 1, '2018-10-03 04:39:55', '2018-10-03 04:39:55', NULL),
(61, 'O-10061', 1, 1, NULL, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', NULL, '2018-10-27 15:55:00', 'Garia Station road Garia Kolkata 700084', 'Sealdah Railway Station, Sealdah, Raja Bazar, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, 0, 9.10, 41, 148.45, 200.00, 1, '2018-10-03 04:41:34', '2018-10-03 04:41:34', NULL),
(62, 'O-10062', 1, 1, NULL, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', NULL, '2018-10-13 07:35:00', 'Garia Station road Garia Kolkata 700084', 'Sealdah Railway Station, Sealdah, Raja Bazar, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, 0, 13.42, 62, 123.60, 6766.00, 1, '2018-10-03 05:41:16', '2018-10-03 05:41:16', NULL),
(63, 'O-10063', 1, 1, NULL, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', NULL, '2018-12-15 14:50:00', 'Garia Station road Garia Kolkata 700084', 'Sealdah Railway Station, Sealdah, Raja Bazar, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, 0, 13.42, 62, 123.60, 6766.00, 1, '2018-10-03 05:41:48', '2018-10-03 05:41:48', NULL),
(64, 'O-10064', 1, 1, NULL, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', NULL, '2018-10-26 15:55:00', 'Garia Station road Garia Kolkata 700084', 'Assam, India', NULL, NULL, 1, NULL, NULL, 0, NULL, 0, 2428.66, 4553, 19284.10, 5000.00, 1, '2018-10-03 05:51:44', '2018-10-03 05:51:44', NULL),
(67, 'O-10067', 1, 1, NULL, 'Hasibur Rahaman', 'hassib2008@gmail.com', '789654123', 'Address', NULL, '2018-10-27 15:55:00', 'Garia Station road Garia Kolkata 700084', 'Drop, Waterfield Road, Below Hakkasan, Bandra West, Mumbai, Maharashtra, India', NULL, NULL, 1, NULL, NULL, 0, NULL, 0, 1489.06, 2647, 9754.10, NULL, 1, '2018-10-04 07:32:20', '2018-10-04 07:34:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `customPrice` double(10,2) NOT NULL,
  `total_distance` double(10,2) NOT NULL,
  `total_duration` int(11) NOT NULL,
  `total_price` double(10,2) NOT NULL,
  `trip_expense` double(10,2) NOT NULL,
  `waitingCost` double(10,2) NOT NULL,
  `companionCost` double(10,2) NOT NULL,
  `comfortCost` double(10,2) NOT NULL,
  `base_driving_cost` double(10,2) NOT NULL,
  `paid_mileage` double(10,2) NOT NULL,
  `driver_charge` double(10,2) NOT NULL,
  `vehicle_charge` double(10,2) NOT NULL,
  `tripAmount` double(10,2) NOT NULL,
  `tripProfit` double(10,2) NOT NULL,
  `custom_tripAmount` double(10,2) NOT NULL,
  `custom_tripProfit` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`id`, `booking_id`, `customPrice`, `total_distance`, `total_duration`, `total_price`, `trip_expense`, `waitingCost`, `companionCost`, `comfortCost`, `base_driving_cost`, `paid_mileage`, `driver_charge`, `vehicle_charge`, `tripAmount`, `tripProfit`, `custom_tripAmount`, `custom_tripProfit`, `created_at`, `updated_at`) VALUES
(2, 67, 0.00, 1489.06, 2647, 9754.10, 1709.64, 0.00, 0.00, 0.00, 5465.00, 4289.10, 220.58, 1489.06, 8044.46, 82.47, 0.00, 0.00, '2018-10-04 07:34:47', '2018-10-04 23:34:47'),
(3, 41, 100.00, 15.82, 80, 248.70, 22.49, 0.00, 0.00, 0.00, 215.00, 33.70, 6.67, 15.82, 226.21, 90.96, 77.51, 77.51, '2018-10-04 08:11:38', '2018-10-05 00:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `booking_vehicle`
--

CREATE TABLE `booking_vehicle` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1=>accept,2=>Reject',
  `booking_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp(4) NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_vehicle`
--

INSERT INTO `booking_vehicle` (`id`, `status`, `booking_id`, `vehicle_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 2, 41, 1, 13, '2018-09-27 06:43:44.0000', '2018-09-27 07:13:29', '2018-09-27 07:13:29'),
(11, NULL, 3, 1, 13, '2018-09-27 06:44:40.0000', '2018-09-27 06:44:40', NULL),
(12, 1, 41, 2, 3, '2018-09-27 07:13:29.0000', '2018-10-03 00:21:49', NULL),
(13, NULL, 2, 1, 13, '2018-09-28 01:32:53.0000', '2018-09-28 01:32:53', NULL),
(14, NULL, 55, 1, 13, '2018-09-28 04:29:22.0000', '2018-09-28 04:29:22', NULL),
(15, 2, 57, 2, 3, '2018-09-28 06:03:16.0000', '2018-10-04 07:38:49', NULL);

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
(43, 1, 2, 'vehicles-tracking', NULL, NULL),
(44, 1, 2, 'role.index', NULL, NULL),
(45, 1, 2, 'role.create', NULL, NULL),
(46, 1, 2, 'role.store', NULL, NULL),
(47, 1, 2, 'role.show', NULL, NULL),
(48, 1, 2, 'role.edit', NULL, NULL),
(49, 1, 2, 'role.update', NULL, NULL),
(50, 1, 2, 'role.destroy', NULL, NULL),
(51, 1, 2, 'driver.index', NULL, NULL),
(52, 1, 2, 'driver.create', NULL, NULL),
(53, 1, 2, 'driver.store', NULL, NULL),
(54, 1, 2, 'driver.show', NULL, NULL),
(55, 1, 2, 'driver.edit', NULL, NULL),
(56, 1, 2, 'driver.update', NULL, NULL),
(57, 1, 2, 'driver.destroy', NULL, NULL),
(58, 1, 2, 'franchisee-user.index', NULL, NULL),
(59, 1, 2, 'franchisee-user.create', NULL, NULL),
(60, 1, 2, 'franchisee-user.store', NULL, NULL),
(61, 1, 2, 'franchisee-user.show', NULL, NULL),
(62, 1, 2, 'franchisee-user.edit', NULL, NULL),
(63, 1, 2, 'franchisee-user.update', NULL, NULL),
(64, 1, 2, 'franchisee-user.destroy', NULL, NULL),
(65, 1, 2, 'driving-request.index', NULL, NULL),
(66, 1, 2, 'driving-request.create', NULL, NULL),
(67, 1, 2, 'driving-request.store', NULL, NULL),
(68, 1, 2, 'driving-request.show', NULL, NULL),
(69, 1, 2, 'driving-request.edit', NULL, NULL),
(70, 1, 2, 'driving-request.update', NULL, NULL),
(71, 1, 2, 'driving-request.destroy', NULL, NULL),
(72, 1, 2, 'booking.index', NULL, NULL),
(73, 1, 2, 'booking.create', NULL, NULL),
(74, 1, 2, 'booking.store', NULL, NULL),
(75, 1, 2, 'booking.show', NULL, NULL),
(76, 1, 2, 'booking.edit', NULL, NULL),
(77, 1, 2, 'booking.update', NULL, NULL),
(78, 1, 2, 'booking.destroy', NULL, NULL),
(79, 1, 2, 'vehicles.index', NULL, NULL),
(80, 1, 2, 'vehicles.create', NULL, NULL),
(81, 1, 2, 'vehicles.store', NULL, NULL),
(82, 1, 2, 'vehicles.show', NULL, NULL),
(83, 1, 2, 'vehicles.edit', NULL, NULL),
(84, 1, 2, 'vehicles.update', NULL, NULL),
(85, 1, 2, 'vehicles.destroy', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `drivers_vehicles`
--

CREATE TABLE `drivers_vehicles` (
  `id` int(11) NOT NULL,
  `franchisees_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers_vehicles`
--

INSERT INTO `drivers_vehicles` (`id`, `franchisees_id`, `user_id`, `vehicle_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 3, 1, '2018-09-25 03:55:46', '2018-09-25 03:57:54', '2018-09-25 03:57:54'),
(4, 1, 13, 2, '2018-09-25 03:57:32', '2018-09-25 03:58:23', '2018-09-25 03:58:23'),
(5, 1, 13, 1, '2018-09-25 03:58:27', '2018-09-26 00:08:25', '2018-09-26 00:08:25'),
(6, 1, 3, 2, '2018-09-25 03:58:30', '2018-09-26 00:08:28', '2018-09-26 00:08:28'),
(7, 1, 3, 2, '2018-09-26 00:08:33', '2018-09-26 05:33:52', '2018-09-26 05:33:52'),
(8, 1, 13, 1, '2018-09-26 00:08:41', '2018-09-26 05:33:37', '2018-09-26 05:33:37'),
(9, 1, 13, 1, '2018-09-26 05:33:48', '2018-09-26 05:33:55', '2018-09-26 05:33:55'),
(10, 1, 13, 1, '2018-09-27 02:37:23', '2018-09-27 02:37:23', NULL),
(11, 1, 3, 2, '2018-09-27 02:37:29', '2018-09-27 02:37:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `driver_attendance`
--

CREATE TABLE `driver_attendance` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `franchisees_id` int(11) NOT NULL,
  `attendance_date` date DEFAULT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_attendance`
--

INSERT INTO `driver_attendance` (`id`, `user_id`, `franchisees_id`, `attendance_date`, `in_time`, `out_time`) VALUES
(1, 3, 1, '2018-09-26', '09:34:14', '09:34:43'),
(2, 3, 1, '2018-09-26', '09:34:46', '09:34:50'),
(3, 3, 1, '2018-09-27', '09:57:06', '10:14:02'),
(4, 3, 1, '2018-09-27', '10:14:58', '10:16:13'),
(5, 3, 1, '2018-09-27', '10:16:51', '10:42:11'),
(6, 3, 1, '2018-09-27', '11:30:04', '11:32:53'),
(7, 3, 1, '2018-09-27', '12:40:52', '12:41:59'),
(8, 3, 1, '2018-09-27', '12:42:49', '12:44:53'),
(9, 3, 1, '2018-09-27', '12:56:45', '13:00:00'),
(10, 3, 1, '2018-09-27', '13:02:21', '13:03:52'),
(11, 3, 1, '2018-09-27', '13:05:46', '13:14:33'),
(12, 3, 1, '2018-09-27', '13:15:23', '13:16:02'),
(13, 3, 1, '2018-09-27', '13:16:28', '13:18:14'),
(14, 3, 1, '2018-09-27', '13:18:56', '13:22:22'),
(15, 3, 1, '2018-09-27', '13:24:52', '13:29:00'),
(16, 3, 1, '2018-09-27', '13:29:37', '13:30:45'),
(17, 3, 1, '2018-09-27', '13:31:27', '13:33:02'),
(18, 3, 1, '2018-09-27', '13:33:40', '13:47:09'),
(19, 3, 1, '2018-09-27', '13:53:34', NULL),
(20, 3, 1, '2018-09-28', '06:24:16', '06:24:48'),
(21, 3, 1, '2018-09-28', '06:24:49', '06:24:53'),
(22, 3, 1, '2018-09-28', '06:24:54', '11:44:35'),
(23, 3, 1, '2018-10-01', '08:12:31', '08:15:25'),
(24, 3, 1, '2018-10-01', '08:16:59', '08:38:13'),
(25, 3, 1, '2018-10-01', '08:40:42', '08:43:02'),
(26, 3, 1, '2018-10-01', '09:43:09', '12:50:14'),
(27, 3, 1, '2018-10-02', '06:50:23', '07:05:42'),
(28, 3, 1, '2018-10-03', '05:51:33', NULL),
(29, 3, 1, '2018-10-04', '11:47:30', '11:48:46'),
(30, 3, 1, '2018-10-04', '12:25:43', '13:00:06'),
(31, 3, 1, '2018-10-04', '13:00:11', '13:00:40'),
(32, 3, 1, '2018-10-04', '13:05:03', '13:08:43'),
(33, 3, 1, '2018-10-04', '13:09:01', '13:12:53'),
(34, 3, 1, '2018-10-04', '13:15:02', '13:16:37'),
(35, 3, 1, '2018-10-04', '13:18:26', '13:19:35'),
(36, 3, 1, '2018-10-04', '13:20:23', NULL),
(37, 3, 1, '2018-10-05', '05:42:57', '07:18:46');

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
(1, 3, '1537606027-5ba6018b8197f.png', 'L-NUMBER', '2018-09-27', '234', 'PHL NUMBER', '1537606398-5ba602fee6db7.jpg', '2018-09-22', 'Insurance-NUMBER', 'PASSPORT', '1537606943-5ba6051fa3059.jpg', '66', '2018-09-25', '2018-09-22 03:17:07', '2018-10-03 00:23:00', NULL),
(2, 13, '1537861925-5ba9e925ac89a.png', '234', '2018-09-27', '12', '123', '1537861925-5ba9e925b3f09.jpg', '234', '234', '234', '1537861925-5ba9e925b45b7.png', 'BD', '2018-10-24', '2018-09-25 02:22:05', '2018-09-25 02:22:05', NULL);

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
  `street` varchar(255) NOT NULL,
  `locality` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
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
  `passport_image` varchar(255) DEFAULT NULL,
  `short_name` varchar(20) DEFAULT NULL,
  `renewal_date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driving_request`
--

INSERT INTO `driving_request` (`id`, `franchisees_id`, `name`, `surname`, `email`, `dob`, `phone`, `street`, `locality`, `postcode`, `town`, `profile_pic`, `phl_number`, `phl_image`, `phl_expiry_date`, `national_insurance_no`, `status`, `drivinglicence`, `licence_no`, `licence_expiry_date`, `driver_experience`, `passport_number`, `passport_image`, `short_name`, `renewal_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Ubuer', 'dasdas', 'hasib2008@gmail.com', '2018-09-14', '789654123656', '234234', '24234', '234234', '234234', NULL, '32423', NULL, '234', '234', 0, NULL, '234234', '2018-09-20', '234', '234', NULL, 'Ud', '2018-10-03', '2018-09-22 07:50:12', '2018-09-22 07:50:12', NULL);

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
  `street` varchar(255) NOT NULL,
  `locality` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL,
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

INSERT INTO `franchisees` (`id`, `name`, `contact_person_name`, `contact_person_phone`, `contact_person_email`, `status`, `street`, `locality`, `town`, `postcode`, `public_liability_insurance`, `employers_liability_insurance`, `franchise_license_renewal_date`, `company_year_end`, `confirmation_statement_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'UBER', 'Hasibur Rahaman', '7059114888', 'hasib2008@gmail.com', 1, 'Garia Station road', 'Garia', 'Kolkata', '700084', '2018-08-30', '2018-09-27', '2018-09-29', '2018-09-28', '2018-09-29', '2018-09-22 01:55:05', '2018-09-24 07:38:55', NULL),
(5, 'Hasi', 'Hasi', '7896541236', 'asdasd@gmail.com', 1, 'asasda', 'asda', 'asdas', 'dasdasd', '2018-09-28', '2018-09-22', '2018-09-21', '2018-09-29', '2018-09-28', '2018-09-28 01:22:52', '2018-09-28 02:07:46', '2018-09-28 02:07:46'),
(6, 'asdasd', 'asdasd', '7896541236', 'dfgdf@gmail.coom', 1, 'asdasd', 'sdfsdf', 'sd', 'gdfg', '2018-10-04', '2018-10-05', '2018-09-28', '2018-09-28', '2018-09-29', '2018-09-28 01:23:34', '2018-09-28 02:07:41', '2018-09-28 02:07:41');

-- --------------------------------------------------------

--
-- Table structure for table `franchisees_price`
--

CREATE TABLE `franchisees_price` (
  `id` int(10) NOT NULL,
  `franchisees_id` int(20) NOT NULL,
  `driver_cost` float NOT NULL,
  `vehicle_cost` float NOT NULL,
  `comfort_cost` float NOT NULL,
  `paid_mileage` float NOT NULL,
  `base_driving_cost` float NOT NULL,
  `waiting_time_cost` float NOT NULL,
  `companionship_cost` float NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `franchisees_price`
--

INSERT INTO `franchisees_price` (`id`, `franchisees_id`, `driver_cost`, `vehicle_cost`, `comfort_cost`, `paid_mileage`, `base_driving_cost`, `waiting_time_cost`, `companionship_cost`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 5, 1, 10, 5, 5, 5, 5, '2018-09-22 07:25:05', '2018-10-03 04:10:49', NULL),
(2, 5, 123, 12312, 123, 123, 123, 123, 123, '2018-09-28 01:22:52', '2018-09-28 01:22:52', NULL),
(3, 6, 1, 2, 7, 3, 4, 5, 6, '2018-09-28 01:23:34', '2018-09-28 01:23:34', NULL);

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
(124, 'forgotpasswordpost', 'forgotpasswordpost', 'forgotpasswordpost', '2018-09-12 07:56:45', '2018-09-12 07:56:45'),
(125, 'searchajax', 'searchajax', 'searchajax', '2018-09-22 07:57:21', '2018-09-22 07:57:21'),
(126, 'booking-price', 'booking-price', 'booking-price', '2018-09-22 07:57:21', '2018-09-22 07:57:21'),
(127, 'vehicles-tracking', 'vehicles-tracking', 'vehicles-tracking', '2018-09-22 07:57:22', '2018-09-22 07:57:22'),
(128, 'vehicles-tracking-ajax', 'vehicles-tracking-ajax', 'vehicles-tracking-ajax', '2018-09-22 07:57:22', '2018-09-22 07:57:22');

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
(5, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(55, 2),
(56, 2),
(57, 2),
(58, 2),
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(65, 2),
(66, 2),
(67, 2),
(68, 2),
(69, 2),
(70, 2),
(71, 2),
(72, 2),
(73, 2),
(74, 2),
(75, 2),
(76, 2),
(77, 2),
(78, 2),
(79, 2),
(80, 2),
(81, 2),
(82, 2),
(83, 2),
(84, 2),
(85, 2),
(86, 2),
(87, 2),
(88, 2),
(89, 2),
(90, 2),
(91, 2),
(92, 2),
(93, 2),
(94, 2),
(95, 2),
(96, 2),
(97, 2),
(98, 2),
(99, 2),
(100, 2),
(101, 2),
(102, 2),
(103, 2),
(104, 2),
(105, 2),
(106, 2),
(107, 2),
(108, 2),
(109, 2),
(110, 2),
(111, 2),
(112, 2),
(113, 2),
(114, 2),
(115, 2),
(116, 2),
(117, 2),
(118, 2),
(119, 2),
(120, 2),
(121, 2),
(122, 2),
(123, 2),
(124, 2),
(125, 2),
(126, 2),
(127, 2),
(128, 2);

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
(12, 1, 1, 'Sealdah Railway Station, Sealdah, Raja Bazar, Calcutta, West Bengal, India', 8.94, 39, '2018-09-24 01:06:33', '2018-09-24 01:06:33', NULL),
(13, 1, 99, 'Kolkata Railway Station (Chitpur Station), Belgachia, Calcutta, West Bengal, India', 3.54, 23, '2018-09-24 01:06:33', '2018-09-24 01:06:33', NULL),
(30, 2, 1, 'Andhra Pradesh, India', 857.84, 1554, '2018-09-24 08:37:15', '2018-09-24 08:37:15', NULL),
(31, 2, 99, 'Andhra Pradesh, India', 0.00, 0, '2018-09-24 08:37:15', '2018-09-24 08:37:15', NULL),
(34, 3, 1, 'Shyam Bazar, Calcutta, West Bengal, India', 11.89, 50, '2018-09-25 04:57:52', '2018-09-25 04:57:52', NULL),
(35, 3, 99, 'Garia Station Road, Baidyapara, Garia, Calcutta, West Bengal, India', 12.40, 51, '2018-09-25 04:57:52', '2018-09-25 04:57:52', NULL),
(67, 35, 1, 'Dum Dum, Calcutta, West Bengal, India', 15.37, 55, '2018-09-27 02:03:59', '2018-09-27 02:03:59', NULL),
(68, 35, 99, 'Netaji Subhash Chandra Bose International Airport (CCU), Jessore Road, Dum Dum, Calcutta, West Bengal, India', 5.16, 28, '2018-09-27 02:03:59', '2018-09-27 02:03:59', NULL),
(86, 45, 1, 'Dum Dum, Calcutta, West Bengal, India', 15.37, 55, '2018-09-28 02:46:39', '2018-09-28 02:46:39', NULL),
(87, 45, 99, 'Netaji Subhash Chandra Bose International Airport (CCU), Jessore Road, Dum Dum, Calcutta, West Bengal, India', 5.16, 28, '2018-09-28 02:46:39', '2018-09-28 02:46:39', NULL),
(88, 46, 1, 'Dum Dum, Calcutta, West Bengal, India', 15.37, 55, '2018-09-28 02:50:09', '2018-09-28 02:50:09', NULL),
(89, 46, 99, 'Netaji Subhash Chandra Bose International Airport (CCU), Jessore Road, Dum Dum, Calcutta, West Bengal, India', 5.16, 28, '2018-09-28 02:50:09', '2018-09-28 02:50:09', NULL),
(90, 47, 1, 'Dum Dum, Calcutta, West Bengal, India', 15.37, 55, '2018-09-28 02:50:30', '2018-09-28 02:50:30', NULL),
(91, 47, 99, 'Netaji Subhash Chandra Bose International Airport (CCU), Jessore Road, Dum Dum, Calcutta, West Bengal, India', 5.16, 28, '2018-09-28 02:50:30', '2018-09-28 02:50:30', NULL),
(92, 48, 1, 'Dum Dum, Calcutta, West Bengal, India', 15.37, 55, '2018-09-28 02:53:06', '2018-09-28 02:53:06', NULL),
(93, 48, 99, 'Netaji Subhash Chandra Bose International Airport (CCU), Jessore Road, Dum Dum, Calcutta, West Bengal, India', 5.16, 28, '2018-09-28 02:53:06', '2018-09-28 02:53:06', NULL),
(94, 49, 1, 'Dum Dum, Calcutta, West Bengal, India', 15.37, 55, '2018-09-28 02:55:57', '2018-09-28 02:55:57', NULL),
(95, 49, 99, 'Netaji Subhash Chandra Bose International Airport (CCU), Jessore Road, Dum Dum, Calcutta, West Bengal, India', 5.16, 28, '2018-09-28 02:55:57', '2018-09-28 02:55:57', NULL),
(96, 50, 1, 'Dum Dum, Calcutta, West Bengal, India', 15.37, 55, '2018-09-28 03:02:08', '2018-09-28 03:02:08', NULL),
(97, 50, 99, 'Netaji Subhash Chandra Bose International Airport (CCU), Jessore Road, Dum Dum, Calcutta, West Bengal, India', 5.16, 28, '2018-09-28 03:02:08', '2018-09-28 03:02:08', NULL),
(98, 51, 1, 'Dum Dum, Calcutta, West Bengal, India', 15.37, 55, '2018-09-28 04:13:23', '2018-09-28 04:13:23', NULL),
(99, 51, 99, 'Netaji Subhash Chandra Bose International Airport (CCU), Jessore Road, Dum Dum, Calcutta, West Bengal, India', 5.16, 28, '2018-09-28 04:13:23', '2018-09-28 04:13:23', NULL),
(102, 53, 1, 'Ashok Nagar, Bengaluru, Karnataka, India', 1162.21, 2100, '2018-09-28 04:23:31', '2018-09-28 04:23:31', NULL),
(103, 53, 99, 'Assam, India', 1870.15, 3529, '2018-09-28 04:23:31', '2018-09-28 04:23:31', NULL),
(104, 54, 1, 'Ashok Nagar, Bengaluru, Karnataka, India', 1162.21, 2100, '2018-09-28 04:28:10', '2018-09-28 04:28:10', NULL),
(105, 54, 99, 'Assam, India', 1870.15, 3529, '2018-09-28 04:28:10', '2018-09-28 04:28:10', NULL),
(106, 55, 1, 'Ashok Nagar, Bengaluru, Karnataka, India', 1162.21, 2100, '2018-09-28 04:28:39', '2018-09-28 04:28:39', NULL),
(107, 55, 99, 'Assam, India', 1870.15, 3529, '2018-09-28 04:28:39', '2018-09-28 04:28:39', NULL),
(110, 56, 1, 'Garia, Calcutta, West Bengal, India', 0.51, 3, '2018-09-28 05:39:55', '2018-09-28 05:39:55', NULL),
(111, 56, 99, 'Sealdah Railway Station, Sealdah, Raja Bazar, Calcutta, West Bengal, India', 9.27, 41, '2018-09-28 05:39:56', '2018-09-28 05:39:56', NULL),
(112, 57, 1, 'Garia, Calcutta, West Bengal, India', 0.51, 3, '2018-09-28 06:03:04', '2018-09-28 06:03:04', NULL),
(113, 57, 2, 'Ruby General Hospital, Anandapur Main Road, Sector I, East Kolkata Township, Calcutta, West Bengal, India', 4.07, 17, '2018-09-28 06:03:04', '2018-09-28 06:03:04', NULL),
(114, 57, 3, 'Sealdah Railway Station, Sealdah, Raja Bazar, Calcutta, West Bengal, India', 5.41, 26, '2018-09-28 06:03:04', '2018-09-28 06:03:04', NULL),
(115, 57, 99, 'Chitpur, Calcutta, West Bengal, India', 2.36, 20, '2018-09-28 06:03:04', '2018-09-28 06:03:04', NULL),
(120, 58, 1, 'Ruby General Hospital, Anandapur Main Road, Sector I, East Kolkata Township, Calcutta, West Bengal, India', 3.69, 15, '2018-10-03 04:37:30', '2018-10-03 04:37:30', NULL),
(121, 58, 99, 'Sealdah Railway Station, Sealdah, Raja Bazar, Calcutta, West Bengal, India', 5.41, 26, '2018-10-03 04:37:30', '2018-10-03 04:37:30', NULL),
(122, 59, 1, 'Ruby General Hospital, Anandapur Main Road, Sector I, East Kolkata Township, Calcutta, West Bengal, India', 3.69, 15, '2018-10-03 04:37:41', '2018-10-03 04:37:41', NULL),
(123, 59, 99, 'Sealdah Railway Station, Sealdah, Raja Bazar, Calcutta, West Bengal, India', 5.41, 26, '2018-10-03 04:37:41', '2018-10-03 04:37:41', NULL),
(124, 60, 1, 'Ruby General Hospital, Anandapur Main Road, Sector I, East Kolkata Township, Calcutta, West Bengal, India', 3.69, 15, '2018-10-03 04:39:55', '2018-10-03 04:39:55', NULL),
(125, 60, 99, 'Sealdah Railway Station, Sealdah, Raja Bazar, Calcutta, West Bengal, India', 5.41, 26, '2018-10-03 04:39:55', '2018-10-03 04:39:55', NULL),
(126, 61, 1, 'Ruby General Hospital, Anandapur Main Road, Sector I, East Kolkata Township, Calcutta, West Bengal, India', 3.69, 15, '2018-10-03 04:41:34', '2018-10-03 04:41:34', NULL),
(127, 61, 99, 'Sealdah Railway Station, Sealdah, Raja Bazar, Calcutta, West Bengal, India', 5.41, 26, '2018-10-03 04:41:34', '2018-10-03 04:41:34', NULL),
(128, 62, 1, 'Rubi Bangles, Simla, Machuabazar, Calcutta, West Bengal, India', 11.72, 49, '2018-10-03 05:41:16', '2018-10-03 05:41:16', NULL),
(129, 62, 99, 'Sealdah Railway Station, Sealdah, Raja Bazar, Calcutta, West Bengal, India', 1.70, 13, '2018-10-03 05:41:16', '2018-10-03 05:41:16', NULL),
(130, 63, 1, 'Rubi Bangles, Simla, Machuabazar, Calcutta, West Bengal, India', 11.72, 49, '2018-10-03 05:41:48', '2018-10-03 05:41:48', NULL),
(131, 63, 99, 'Sealdah Railway Station, Sealdah, Raja Bazar, Calcutta, West Bengal, India', 1.70, 13, '2018-10-03 05:41:48', '2018-10-03 05:41:48', NULL),
(132, 64, 1, 'Andhra Pradesh, India', 857.82, 1554, '2018-10-03 05:51:44', '2018-10-03 05:51:44', NULL),
(133, 64, 99, 'Assam, India', 1570.84, 2999, '2018-10-03 05:51:44', '2018-10-03 05:51:44', NULL),
(140, 67, 1, 'Andhra Pradesh, India', 857.82, 1554, '2018-10-04 07:34:47', '2018-10-04 07:34:47', NULL),
(141, 67, 99, 'Drop, Waterfield Road, Below Hakkasan, Bandra West, Mumbai, Maharashtra, India', 631.24, 1093, '2018-10-04 07:34:47', '2018-10-04 07:34:47', NULL),
(142, 41, 1, 'Kolkata, West Bengal, India', 6.74, 37, '2018-10-04 08:11:38', '2018-10-04 08:11:38', NULL),
(143, 41, 99, 'Dum Dum, Calcutta, West Bengal, India', 9.08, 43, '2018-10-04 08:11:38', '2018-10-04 08:11:38', NULL);

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
(1, NULL, 'Admin', 'Admin', 'Admin', '2018-09-22 04:49:13', '2018-09-22 04:49:13'),
(2, 1, 'Test Role', 'd', 'fg', '2018-09-24 01:12:10', '2018-09-24 01:12:10');

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
(12, 2);

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
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locality` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `is_super`, `user_type`, `franchisees_id`, `name`, `surname`, `profile_pic`, `email`, `password`, `remember_token`, `device_token`, `dob`, `phone`, `street`, `locality`, `town`, `postcode`, `country`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(1, 1, 1, NULL, 'Hasibur', 'Rahaman', 'profile.jpg', 'hasib2008@gmail.com', '$2y$10$azBENyVBiAfJOovL8fD3iuRZszIuT3WG0/MtJBFJrMGvlfmXf0sQK', '7qj9I4NyY1bcTaoElm1Nr4mBfOxvWMig0TmpH3J8YPfJqMUUxH83IasLwFwl', NULL, '1989-12-28', '7059114888', 'Street', 'Locality', 'Town', 'Postcode', NULL, NULL, '2018-09-24 01:36:52', NULL, 1),
(3, NULL, 3, 1, 'Jhonn', 'Deosdasd', '1537607040-5ba60580c8e95.png', 'driver@gmail.com', '$2y$10$e7qvNVc3JDbxVjZoqGGfqO8tnWkhfwj8zL2wEwF6etpKL32zV.u0m', NULL, '0', '2018-09-14', '78451232656', 'Street', 'Locality', 'Town', '741023', NULL, '2018-09-22 03:17:07', '2018-10-03 00:23:00', NULL, 1),
(4, 1, 2, 1, 'Franchisee User', NULL, 'profile.jpg', 'franchiseeuser@gmail.com', '$2y$10$azBENyVBiAfJOovL8fD3iuRZszIuT3WG0/MtJBFJrMGvlfmXf0sQK', NULL, NULL, '2018-09-28', '7458965896', 'street', 'locality', 'Town', 'POSTCODE', NULL, '2018-09-22 03:41:13', '2018-09-22 03:43:42', NULL, 1),
(12, 1, 1, NULL, 'Franchisor', NULL, 'profile.jpg', 'franchisor@gmail.com', '$2y$10$DD7mJrKN/TpYJ0XUI3j08ubrS/ON7QlHAY4Qv6maPaYWWvaPrTeK6', NULL, NULL, '2018-09-27', '7896541236', 'Street', 'Loality', 'Town', 'POSTCODE', NULL, '2018-09-24 01:23:46', '2018-09-24 01:23:52', NULL, 1),
(13, NULL, 3, 1, 'Bittu', 'Devnath', '1537861925-5ba9e9258551b.png', 'bittu@gmail.com', '$2y$10$vXTDeM.BOmOaCRwSdBTmmOr1K45xPqrl1Cz6JMPu1xsWNOHO.of9i', NULL, NULL, '2018-09-28', '7896541236', 'Street', 'Locality', 'Town', 'POST', NULL, '2018-09-25 02:22:05', '2018-09-25 02:22:05', NULL, 1);

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
(1, 1, 1, 'SUV', 'BMW', '748554', 10, '5656546', '2018-09-26', '2018-09-27', '2018-09-28', '2018-09-27', NULL, NULL, 1, '2018-09-25 01:05:11', '2018-09-25 01:05:11', NULL),
(2, 1, 2, 'asdasd', 'asdas', 'asdas', 213123, '123', '2018-10-05', '2018-09-28', '2018-09-29', '2018-09-28', NULL, NULL, 1, '2018-09-25 03:57:26', '2018-09-25 03:57:26', NULL);

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
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_vehicle`
--
ALTER TABLE `booking_vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `default_permissions`
--
ALTER TABLE `default_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers_vehicles`
--
ALTER TABLE `drivers_vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_attendance`
--
ALTER TABLE `driver_attendance`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `booking_vehicle`
--
ALTER TABLE `booking_vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `default_permissions`
--
ALTER TABLE `default_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `drivers_vehicles`
--
ALTER TABLE `drivers_vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `driver_attendance`
--
ALTER TABLE `driver_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `driver_details`
--
ALTER TABLE `driver_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `driving_request`
--
ALTER TABLE `driving_request`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `franchisees`
--
ALTER TABLE `franchisees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `franchisees_price`
--
ALTER TABLE `franchisees_price`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `pickup_locations`
--
ALTER TABLE `pickup_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `trip_route`
--
ALTER TABLE `trip_route`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
