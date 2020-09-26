-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 15, 2018 at 07:07 PM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.2.12-1+ubuntu16.04.1+deb.sury.org+1

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
  `driver_id` int(11) DEFAULT NULL,
  `repeat_type` int(11) DEFAULT NULL,
  `order_id` varchar(10) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `franchisees_id` int(11) NOT NULL,
  `trip_status` int(11) DEFAULT '0' COMMENT '1=>Start, 2=>Complete,3=>Breakdown',
  `client_id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `home_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `note` text,
  `booking_time` datetime DEFAULT NULL,
  `repeat_booking_time` datetime DEFAULT NULL,
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
  `final_price` double(10,2) DEFAULT NULL,
  `paying_bill` varchar(255) DEFAULT NULL,
  `who_paying_bill` varchar(255) DEFAULT NULL,
  `payment_clientid` int(10) DEFAULT NULL,
  `payment_mode` int(11) NOT NULL COMMENT '1=>Cash,2=>Credit',
  `payment_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=>Unpaid,1=>Success',
  `invoiced` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `driver_id`, `repeat_type`, `order_id`, `users_id`, `franchisees_id`, `trip_status`, `client_id`, `name`, `email`, `phone_number`, `home_number`, `address`, `note`, `booking_time`, `repeat_booking_time`, `base_location`, `drop_location`, `outward_companion`, `outward_waiting`, `journey_type`, `return_companion`, `return_waiting`, `long_return`, `drop_off_to_base`, `comfort_break`, `total_distance`, `total_duration`, `total_price`, `custom_price`, `final_price`, `paying_bill`, `who_paying_bill`, `payment_clientid`, `payment_mode`, `payment_status`, `invoiced`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 13, 1, 'O-10001', 1, 1, 2, 7, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-12 10:50:00', NULL, 'garia station road', 'Kolkata Railway Station (Chitpur Station), Belgachia, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, 0, 12.37, 65, 164.45, NULL, 164.45, 'Client', NULL, 5, 2, 0, 1, '2018-12-10 01:49:36', '2018-12-15 04:52:43', NULL),
(2, NULL, 1, 'O-10002', 1, 1, 2, 17, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-21 11:55:00', NULL, 'garia station road', 'Salem, Tamil Nadu, India', NULL, NULL, 1, NULL, NULL, 0, NULL, 0, 1300.07, 2325, 7895.15, NULL, 7895.15, 'Person Booking', NULL, NULL, 1, 0, NULL, '2018-12-10 04:39:55', '2018-12-15 04:22:32', NULL),
(3, 20, 1, 'O-10003', 1, 1, 2, 18, NULL, NULL, NULL, NULL, NULL, 'asda', '2018-12-29 19:55:00', NULL, 'garia station road', 'Araku, Andhra Pradesh, India', NULL, NULL, 1, NULL, NULL, 0, NULL, 0, 1220.26, 2327, 7905.15, NULL, 7905.15, 'Person Booking', NULL, NULL, 1, 0, NULL, '2018-12-10 04:50:30', '2018-12-15 04:39:25', NULL),
(4, 20, 1, 'O-10004', 1, 1, 2, 7, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-15 15:25:00', NULL, 'garia station road', 'Kolkata Railway Station (Chitpur Station), Belgachia, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, 0, 12.37, 65, 164.45, NULL, 164.45, 'Client', NULL, 5, 2, 0, 1, '2018-12-13 00:55:37', '2018-12-15 07:25:46', NULL),
(5, 3, 1, 'O-10005', 1, 1, NULL, 20, NULL, NULL, NULL, NULL, NULL, 'NOTE', '2018-12-15 15:55:00', NULL, 'Garia Station Road, Purbapara, Garia, Calcutta, West Bengal, India', 'Faridabad, Haryana, India', NULL, NULL, 1, NULL, NULL, 0, NULL, 0, 2530.01, 4323, 16746.65, NULL, 16746.65, 'other', 'as', NULL, 1, 0, NULL, '2018-12-14 04:04:02', '2018-12-14 05:52:31', NULL),
(6, 3, 1, 'O-10006', 1, 1, NULL, 20, NULL, NULL, NULL, NULL, NULL, 'NOTE', '2018-12-14 15:55:00', NULL, 'Garia Station Road, Purbapara, Garia, Calcutta, West Bengal, India', 'Faridabad, Haryana, India', NULL, NULL, 1, NULL, NULL, 0, NULL, 0, 2530.01, 4323, 16746.65, NULL, 16746.65, 'other', 'as', NULL, 1, 0, NULL, '2018-12-14 05:39:20', '2018-12-14 05:48:08', '2018-12-14 05:48:08'),
(7, 3, 1, 'O-10007', 1, 1, 0, 20, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-28 19:55:00', NULL, 'Garia Station Road, Purbapara, Garia, Calcutta, West Bengal, India', 'West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, 0, 1708.38, 3241, 12480.50, NULL, 12480.50, 'Client', NULL, NULL, 1, 0, NULL, '2018-12-14 06:04:52', '2018-12-15 07:21:51', NULL);

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
(1, 1, 0.00, 12.37, 65, 164.45, 17.79, 0.00, 0.00, 0.00, 120.00, 44.45, 5.42, 12.37, 146.66, 89.18, 0.00, 0.00, '2018-12-10 01:49:36', '2018-12-10 01:49:36'),
(2, 2, 0.00, 1300.07, 2325, 7895.15, 1493.82, 0.00, 0.00, 0.00, 3605.00, 4290.15, 193.75, 1300.07, 6401.33, 81.08, 0.00, 0.00, '2018-12-10 04:39:55', '2018-12-10 04:39:55'),
(6, 3, 0.00, 1220.26, 2327, 7905.15, 1414.18, 0.00, 0.00, 0.00, 3615.00, 4290.15, 193.92, 1220.26, 6490.97, 82.11, 0.00, 0.00, '2018-12-10 05:08:27', '2018-12-10 05:08:27'),
(8, 4, 0.00, 12.37, 65, 164.45, 17.79, 0.00, 0.00, 0.00, 120.00, 44.45, 5.42, 12.37, 146.66, 89.18, 0.00, 0.00, '2018-12-13 00:57:20', '2018-12-13 00:57:20'),
(9, 5, 0.00, 2530.01, 4323, 16746.65, 2890.26, 0.00, 0.00, 0.00, 10865.00, 5881.65, 360.25, 2530.01, 13856.39, 82.74, 0.00, 0.00, '2018-12-14 04:04:02', '2018-12-14 04:04:02'),
(10, 6, 0.00, 2530.01, 4323, 16746.65, 2890.26, 0.00, 0.00, 0.00, 10865.00, 5881.65, 360.25, 2530.01, 13856.39, 82.74, 0.00, 0.00, '2018-12-14 05:39:20', '2018-12-14 05:39:20'),
(11, 7, 0.00, 1708.38, 3241, 12480.50, 1978.46, 0.00, 0.00, 0.00, 8190.00, 4290.50, 270.08, 1708.38, 10502.04, 84.15, 0.00, 0.00, '2018-12-14 06:04:52', '2018-12-14 06:04:52');

-- --------------------------------------------------------

--
-- Table structure for table `booking_vehicle`
--

CREATE TABLE `booking_vehicle` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1=>accept,2=>Reject',
  `booking_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp(4) NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_vehicle`
--

INSERT INTO `booking_vehicle` (`id`, `status`, `booking_id`, `vehicle_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 3, '2018-12-10 01:49:36.0000', '2018-12-13 08:50:32', '2018-12-13 08:50:32'),
(2, 1, 2, NULL, NULL, '2018-12-10 04:39:55.0000', '2018-12-10 04:39:55', NULL),
(3, 1, 3, NULL, 3, '2018-12-10 04:50:30.0000', '2018-12-10 05:03:07', '2018-12-10 05:03:07'),
(4, 1, 3, 1, 13, '2018-12-10 05:03:07.0000', '2018-12-10 05:07:15', '2018-12-10 05:07:15'),
(5, 1, 3, 3, 20, '2018-12-10 05:07:15.0000', '2018-12-10 05:08:26', '2018-12-10 05:08:26'),
(6, 1, 3, 3, 20, '2018-12-10 05:08:27.0000', '2018-12-10 05:08:27', NULL),
(7, 1, 4, 3, 3, '2018-12-13 00:57:20.0000', '2018-12-15 07:25:01', '2018-12-15 07:25:01'),
(8, 1, 1, 1, 13, '2018-12-13 08:50:32.0000', '2018-12-13 08:50:32', NULL),
(9, 1, 5, 1, 3, '2018-12-14 04:04:02.0000', '2018-12-14 04:04:02', NULL),
(10, 1, 7, 3, 3, '2018-12-14 06:04:52.0000', '2018-12-14 06:04:52', NULL),
(11, 1, 4, 3, 13, '2018-12-15 07:25:01.0000', '2018-12-15 07:25:46', '2018-12-15 07:25:46'),
(12, 1, 4, 3, 20, '2018-12-15 07:25:46.0000', '2018-12-15 07:25:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(10) NOT NULL,
  `franchisees_id` int(10) NOT NULL,
  `users_id` int(10) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `home_number` varchar(255) DEFAULT NULL,
  `house_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobility_level` int(11) DEFAULT '0',
  `client_health_notes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `franchisees_id`, `users_id`, `firstname`, `surname`, `email`, `phone`, `home_number`, `house_number`, `address`, `mobility_level`, `client_health_notes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 7, 1, 'Munmun', 'dey', 'munmun12@gmail.com', '7896541230', '789654123', 'burdwan', 'Bangkok, Thailand', 2, 'Client Health Notes', '2018-10-12 01:18:30', '2018-12-13 00:10:11', NULL),
(4, 1, 1, 'asdasdasdasdasd', 'Surnamr', 'asdasdsd@sdasdas.asdas', '42342342334', NULL, 'asdasdads', NULL, 0, NULL, '2018-10-12 06:29:59', '2018-10-23 08:15:27', NULL),
(5, 1, 1, 'jjhjhhhhjhhh', 'lorem', 'loremlorem@gmail.com', '7854123056', NULL, '258A', NULL, 0, 'TEST', '2018-10-12 07:16:54', '2018-10-23 08:16:43', NULL),
(6, 7, 1, 'weqweqw', 'qweqwe', 'qqweqw@gmail.com', '787896541236', NULL, '545654456', 'Santos, State of São Paulo, Brazil', NULL, NULL, '2018-10-12 08:30:51', '2018-12-13 00:10:03', NULL),
(7, 1, 1, 'MD HASIBUR RAHAMAN', 'test1', 'hasib200822@gmail.com', '07896541236', NULL, 'house no', 'Kolkata Railway Station (Chitpur Station), Belgachia, Calcutta, West Bengal, India', 3, NULL, '2018-10-22 08:14:22', '2018-12-10 04:34:05', NULL),
(9, 1, 1, 'Namrata', 'Bose', 'namrata@gmail.com', '78966412225', 'H123', 'H address', NULL, 0, NULL, '2018-10-25 04:00:33', '2018-10-25 04:00:33', NULL),
(10, 1, 1, 'mnjk', 'ghjk', 'dfsdf@gmail.com', '7410258963', 'sdfdfdf', 'sdfsdfdfdfsfd', NULL, 0, NULL, '2018-11-07 03:02:46', '2018-11-07 03:02:46', NULL),
(12, 1, 1, 'hjk', 'hj', 'ghjk@gmail.com', '7896541230', '8520147963', 'hhhhhhhhhhhhhhhh', NULL, NULL, 'fhcghfgh', '2018-11-14 04:24:45', '2018-11-14 08:00:54', NULL),
(14, 1, 1, 'Mominul Islam', 'Islam', 'hasib200822@gmail.com', '8013264754', '7410222258', 'Salt Lake Sector I', NULL, 0, NULL, '2018-11-15 05:38:30', '2018-11-15 05:38:30', NULL),
(15, 1, 1, 'Hasibur Rahaman', 'sdfsd', 'franchisee2@gmail.com', '7777777777', NULL, 'Js', 'BS, Italy', NULL, NULL, '2018-11-17 05:13:14', '2018-12-10 04:32:31', NULL),
(16, 1, 1, 'MD', 'RAHAMAN', 'rahamanh939@gmail.com', '9733189522', NULL, 'Hq', 'Baxter Street, New York, NY, USA', 1, 'asa', '2018-12-10 04:26:07', '2018-12-10 04:26:07', NULL),
(17, 1, 1, 'hasibur', 'rahaan', 'hasibu@gmil.co', '74125896323', 'adad', 'asasd', 'Ashok Nagar, Bengaluru, Karnataka, India', NULL, 'asdas', '2018-12-10 04:39:55', '2018-12-14 06:19:36', NULL),
(18, 1, 1, 'Ranjan', 'Patra', 'asdas@ttaa.aa', '787454545', '45454', '5445', 'Siliguri, West Bengal, India', 0, NULL, '2018-12-10 04:50:30', '2018-12-10 04:50:30', NULL),
(19, 7, 1, 'hasme', 'sdadasd', 'asdasd@gmaio.sdsd', '5454545454', '7412288996', 'asda', 'Assam, India', 1, 'asdasdasd', '2018-12-13 00:28:03', '2018-12-14 04:19:59', NULL),
(20, 1, 1, 'avishek', 'patro', 'avishek@gmail.com', '789654123', '976663321', 'house no', 'Ratua, West Bengal, India', 0, NULL, '2018-12-14 04:04:02', '2018-12-14 04:04:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE `company_info` (
  `id` int(10) NOT NULL,
  `franchisees_id` int(10) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_number` varchar(255) DEFAULT NULL,
  `registered_office` varchar(255) DEFAULT NULL,
  `account_no` varchar(255) DEFAULT NULL,
  `lawyers` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `company_email` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `incorporation_date` varchar(255) DEFAULT NULL,
  `year_end` varchar(255) DEFAULT NULL,
  `confirmation_statement_date` varchar(255) DEFAULT NULL,
  `business_address` varchar(255) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `sort_code` varchar(255) DEFAULT NULL,
  `vat_number` varchar(255) DEFAULT NULL,
  `vat_registration_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`id`, `franchisees_id`, `company_name`, `company_number`, `registered_office`, `account_no`, `lawyers`, `phone_number`, `company_email`, `linkedin`, `instagram`, `facebook`, `incorporation_date`, `year_end`, `confirmation_statement_date`, `business_address`, `account_name`, `sort_code`, `vat_number`, `vat_registration_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 7, 'qweqweqwe', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '2018-12-22', '2015', NULL, NULL, NULL, NULL, NULL, '2123', '2018-11-12 01:44:26', '2018-12-15 01:42:20', NULL),
(2, 1, 'Confirmation Statement Date', 'Company Number', 'Registered Office', 'account_no', 'lawyers', 'phone_number', 'company_email', 'linkedin', 'instagram', 'facebook', 'Date of Incorporation', 'Company Year End', 'Confirmation Statement Date', 'business_address', 'account_name', 'sort_code', 'vat_number', 'vat_registration_date', '2018-11-12 04:06:05', '2018-12-15 01:07:57', NULL),
(3, 9, 'adasd', 'asda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-15', NULL, NULL, NULL, '1212', NULL, 'asdad', NULL, '2018-12-15 01:13:24', '2018-12-15 01:13:24', NULL),
(4, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-15 01:35:17', '2018-12-15 01:35:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(3) NOT NULL,
  `code` varchar(3) CHARACTER SET utf8 NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `web_code` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `country_name`, `web_code`) VALUES
(1, 'AFG', 'Afghanistan', 'AF'),
(2, 'NLD', 'Netherlands', 'NL'),
(3, 'ANT', 'Netherlands Antilles', 'AN'),
(4, 'ALB', 'Albania', 'AL'),
(5, 'DZA', 'Algeria', 'DZ'),
(6, 'ASM', 'American Samoa', 'AS'),
(7, 'AND', 'Andorra', 'AD'),
(8, 'AGO', 'Angola', 'AO'),
(9, 'AIA', 'Anguilla', 'AI'),
(10, 'ATG', 'Antigua and Barbuda', 'AG'),
(11, 'ARE', 'United Arab Emirates', 'AE'),
(12, 'ARG', 'Argentina', 'AR'),
(13, 'ARM', 'Armenia', 'AM'),
(14, 'ABW', 'Aruba', 'AW'),
(15, 'AUS', 'Australia', 'AU'),
(16, 'AZE', 'Azerbaijan', 'AZ'),
(17, 'BHS', 'Bahamas', 'BS'),
(18, 'BHR', 'Bahrain', 'BH'),
(19, 'BGD', 'Bangladesh', 'BD'),
(20, 'BRB', 'Barbados', 'BB'),
(21, 'BEL', 'Belgium', 'BE'),
(22, 'BLZ', 'Belize', 'BZ'),
(23, 'BEN', 'Benin', 'BJ'),
(24, 'BMU', 'Bermuda', 'BM'),
(25, 'BTN', 'Bhutan', 'BT'),
(26, 'BOL', 'Bolivia', 'BO'),
(27, 'BIH', 'Bosnia and Herzegovina', 'BA'),
(28, 'BWA', 'Botswana', 'BW'),
(29, 'BRA', 'Brazil', 'BR'),
(30, 'GBR', 'United Kingdom', 'GB'),
(31, 'VGB', 'Virgin Islands, British', 'VG'),
(32, 'BRN', 'Brunei', 'BN'),
(33, 'BGR', 'Bulgaria', 'BG'),
(34, 'BFA', 'Burkina Faso', 'BF'),
(35, 'BDI', 'Burundi', 'BI'),
(36, 'CYM', 'Cayman Islands', 'KY'),
(37, 'CHL', 'Chile', 'CL'),
(38, 'COK', 'Cook Islands', 'CK'),
(39, 'CRI', 'Costa Rica', 'CR'),
(40, 'DJI', 'Djibouti', 'DJ'),
(41, 'DMA', 'Dominica', 'DM'),
(42, 'DOM', 'Dominican Republic', 'DO'),
(43, 'ECU', 'Ecuador', 'EC'),
(44, 'EGY', 'Egypt', 'EG'),
(45, 'SLV', 'El Salvador', 'SV'),
(46, 'ERI', 'Eritrea', 'ER'),
(47, 'ESP', 'Spain', 'ES'),
(48, 'ZAF', 'South Africa', 'ZA'),
(49, 'ETH', 'Ethiopia', 'ET'),
(50, 'FLK', 'Falkland Islands', 'FK'),
(51, 'FJI', 'Fiji Islands', 'FJ'),
(52, 'PHL', 'Philippines', 'PH'),
(53, 'FRO', 'Faroe Islands', 'FO'),
(54, 'GAB', 'Gabon', 'GA'),
(55, 'GMB', 'Gambia', 'GM'),
(56, 'GEO', 'Georgia', 'GE'),
(57, 'GHA', 'Ghana', 'GH'),
(58, 'GIB', 'Gibraltar', 'GI'),
(59, 'GRD', 'Grenada', 'GD'),
(60, 'GRL', 'Greenland', 'GL'),
(61, 'GLP', 'Guadeloupe', 'GP'),
(62, 'GUM', 'Guam', 'GU'),
(63, 'GTM', 'Guatemala', 'GT'),
(64, 'GIN', 'Guinea', 'GN'),
(65, 'GNB', 'Guinea-Bissau', 'GW'),
(66, 'GUY', 'Guyana', 'GY'),
(67, 'HTI', 'Haiti', 'HT'),
(68, 'HND', 'Honduras', 'HN'),
(69, 'HKG', 'Hong Kong', 'HK'),
(70, 'SJM', 'Svalbard and Jan Mayen', 'SJ'),
(71, 'IDN', 'Indonesia', 'ID'),
(72, 'IND', 'India', 'IN'),
(73, 'IRQ', 'Iraq', 'IQ'),
(74, 'IRN', 'Iran', 'IR'),
(75, 'IRL', 'Ireland', 'IE'),
(76, 'ISL', 'Iceland', 'IS'),
(77, 'ISR', 'Israel', 'IL'),
(78, 'ITA', 'Italy', 'IT'),
(79, 'TMP', 'East Timor', 'TP'),
(80, 'AUT', 'Austria', 'AT'),
(81, 'JAM', 'Jamaica', 'JM'),
(82, 'JPN', 'Japan', 'JP'),
(83, 'YEM', 'Yemen', 'YE'),
(84, 'JOR', 'Jordan', 'JO'),
(85, 'CXR', 'Christmas Island', 'CX'),
(86, 'YUG', 'Yugoslavia', 'YU'),
(87, 'KHM', 'Cambodia', 'KH'),
(88, 'CMR', 'Cameroon', 'CM'),
(89, 'CAN', 'Canada', 'CA'),
(90, 'CPV', 'Cape Verde', 'CV'),
(91, 'KAZ', 'Kazakstan', 'KZ'),
(92, 'KEN', 'Kenya', 'KE'),
(93, 'CAF', 'Central African Republic', 'CF'),
(94, 'CHN', 'China', 'CN'),
(95, 'KGZ', 'Kyrgyzstan', 'KG'),
(96, 'KIR', 'Kiribati', 'KI'),
(97, 'COL', 'Colombia', 'CO'),
(98, 'COM', 'Comoros', 'KM'),
(99, 'COG', 'Congo', 'CG'),
(100, 'COD', 'Congo, The Democratic Republic of the', 'CD'),
(101, 'CCK', 'Cocos (Keeling) Islands', 'CC'),
(102, 'PRK', 'North Korea', 'KP'),
(103, 'KOR', 'South Korea', 'KR'),
(104, 'GRC', 'Greece', 'GR'),
(105, 'HRV', 'Croatia', 'HR'),
(106, 'CUB', 'Cuba', 'CU'),
(107, 'KWT', 'Kuwait', 'KW'),
(108, 'CYP', 'Cyprus', 'CY'),
(109, 'LAO', 'Laos', 'LA'),
(110, 'LVA', 'Latvia', 'LV'),
(111, 'LSO', 'Lesotho', 'LS'),
(112, 'LBN', 'Lebanon', 'LB'),
(113, 'LBR', 'Liberia', 'LR'),
(114, 'LBY', 'Libyan Arab Jamahiriya', 'LY'),
(115, 'LIE', 'Liechtenstein', 'LI'),
(116, 'LTU', 'Lithuania', 'LT'),
(117, 'LUX', 'Luxembourg', 'LU'),
(118, 'ESH', 'Western Sahara', 'EH'),
(119, 'MAC', 'Macao', 'MO'),
(120, 'MDG', 'Madagascar', 'MG'),
(121, 'MKD', 'Macedonia', 'MK'),
(122, 'MWI', 'Malawi', 'MW'),
(123, 'MDV', 'Maldives', 'MV'),
(124, 'MYS', 'Malaysia', 'MY'),
(125, 'MLI', 'Mali', 'ML'),
(126, 'MLT', 'Malta', 'MT'),
(127, 'MAR', 'Morocco', 'MA'),
(128, 'MHL', 'Marshall Islands', 'MH'),
(129, 'MTQ', 'Martinique', 'MQ'),
(130, 'MRT', 'Mauritania', 'MR'),
(131, 'MUS', 'Mauritius', 'MU'),
(132, 'MYT', 'Mayotte', 'YT'),
(133, 'MEX', 'Mexico', 'MX'),
(134, 'FSM', 'Micronesia, Federated States of', 'FM'),
(135, 'MDA', 'Moldova', 'MD'),
(136, 'MCO', 'Monaco', 'MC'),
(137, 'MNG', 'Mongolia', 'MN'),
(138, 'MSR', 'Montserrat', 'MS'),
(139, 'MOZ', 'Mozambique', 'MZ'),
(140, 'MMR', 'Myanmar', 'MM'),
(141, 'NAM', 'Namibia', 'NA'),
(142, 'NRU', 'Nauru', 'NR'),
(143, 'NPL', 'Nepal', 'NP'),
(144, 'NIC', 'Nicaragua', 'NI'),
(145, 'NER', 'Niger', 'NE'),
(146, 'NGA', 'Nigeria', 'NG'),
(147, 'NIU', 'Niue', 'NU'),
(148, 'NFK', 'Norfolk Island', 'NF'),
(149, 'NOR', 'Norway', 'NO'),
(150, 'CIV', 'Côte d’Ivoire', 'CI'),
(151, 'OMN', 'Oman', 'OM'),
(152, 'PAK', 'Pakistan', 'PK'),
(153, 'PLW', 'Palau', 'PW'),
(154, 'PAN', 'Panama', 'PA'),
(155, 'PNG', 'Papua New Guinea', 'PG'),
(156, 'PRY', 'Paraguay', 'PY'),
(157, 'PER', 'Peru', 'PE'),
(158, 'PCN', 'Pitcairn', 'PN'),
(159, 'MNP', 'Northern Mariana Islands', 'MP'),
(160, 'PRT', 'Portugal', 'PT'),
(161, 'PRI', 'Puerto Rico', 'PR'),
(162, 'POL', 'Poland', 'PL'),
(163, 'GNQ', 'Equatorial Guinea', 'GQ'),
(164, 'QAT', 'Qatar', 'QA'),
(165, 'FRA', 'France', 'FR'),
(166, 'GUF', 'French Guiana', 'GF'),
(167, 'PYF', 'French Polynesia', 'PF'),
(168, 'REU', 'Réunion', 'RE'),
(169, 'ROM', 'Romania', 'RO'),
(170, 'RWA', 'Rwanda', 'RW'),
(171, 'SWE', 'Sweden', 'SE'),
(172, 'SHN', 'Saint Helena', 'SH'),
(173, 'KNA', 'Saint Kitts and Nevis', 'KN'),
(174, 'LCA', 'Saint Lucia', 'LC'),
(175, 'VCT', 'Saint Vincent and the Grenadines', 'VC'),
(176, 'SPM', 'Saint Pierre and Miquelon', 'PM'),
(177, 'DEU', 'Germany', 'DE'),
(178, 'SLB', 'Solomon Islands', 'SB'),
(179, 'ZMB', 'Zambia', 'ZM'),
(180, 'WSM', 'Samoa', 'WS'),
(181, 'SMR', 'San Marino', 'SM'),
(182, 'STP', 'Sao Tome and Principe', 'ST'),
(183, 'SAU', 'Saudi Arabia', 'SA'),
(184, 'SEN', 'Senegal', 'SN'),
(185, 'SYC', 'Seychelles', 'SC'),
(186, 'SLE', 'Sierra Leone', 'SL'),
(187, 'SGP', 'Singapore', 'SG'),
(188, 'SVK', 'Slovakia', 'SK'),
(189, 'SVN', 'Slovenia', 'SI'),
(190, 'SOM', 'Somalia', 'SO'),
(191, 'LKA', 'Sri Lanka', 'LK'),
(192, 'SDN', 'Sudan', 'SD'),
(193, 'FIN', 'Finland', 'FI'),
(194, 'SUR', 'Suriname', 'SR'),
(195, 'SWZ', 'Swaziland', 'SZ'),
(196, 'CHE', 'Switzerland', 'CH'),
(197, 'SYR', 'Syria', 'SY'),
(198, 'TJK', 'Tajikistan', 'TJ'),
(199, 'TWN', 'Taiwan', 'TW'),
(200, 'TZA', 'Tanzania', 'TZ'),
(201, 'DNK', 'Denmark', 'DK'),
(202, 'THA', 'Thailand', 'TH'),
(203, 'TGO', 'Togo', 'TG'),
(204, 'TKL', 'Tokelau', 'TK'),
(205, 'TON', 'Tonga', 'TO'),
(206, 'TTO', 'Trinidad and Tobago', 'TT'),
(207, 'TCD', 'Chad', 'TD'),
(208, 'CZE', 'Czech Republic', 'CZ'),
(209, 'TUN', 'Tunisia', 'TN'),
(210, 'TUR', 'Turkey', 'TR'),
(211, 'TKM', 'Turkmenistan', 'TM'),
(212, 'TCA', 'Turks and Caicos Islands', 'TC'),
(213, 'TUV', 'Tuvalu', 'TV'),
(214, 'UGA', 'Uganda', 'UG'),
(215, 'UKR', 'Ukraine', 'UA'),
(216, 'HUN', 'Hungary', 'HU'),
(217, 'URY', 'Uruguay', 'UY'),
(218, 'NCL', 'New Caledonia', 'NC'),
(219, 'NZL', 'New Zealand', 'NZ'),
(220, 'UZB', 'Uzbekistan', 'UZ'),
(221, 'BLR', 'Belarus', 'BY'),
(222, 'WLF', 'Wallis and Futuna', 'WF'),
(223, 'VUT', 'Vanuatu', 'VU'),
(224, 'VAT', 'Holy See (Vatican City State)', 'VA'),
(225, 'VEN', 'Venezuela', 'VE'),
(226, 'RUS', 'Russian Federation', 'RU'),
(227, 'VNM', 'Vietnam', 'VN'),
(228, 'EST', 'Estonia', 'EE'),
(229, 'USA', 'U. S. A.', 'US'),
(230, 'VIR', 'Virgin Islands, U.S.', 'VI'),
(231, 'ZWE', 'Zimbabwe', 'ZW'),
(232, 'PSE', 'Palestine', 'PS');

-- --------------------------------------------------------

--
-- Table structure for table `countries_old`
--

CREATE TABLE `countries_old` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries_old`
--

INSERT INTO `countries_old` (`id`, `country_name`, `country_code`) VALUES
(2, 'Afghanistan', 'AF'),
(3, 'Ã…land', 'NULL'),
(4, 'Albania', 'AL'),
(5, 'Algeria', 'DZ'),
(6, 'American Samoa', 'AS'),
(7, 'Andorra', 'AD'),
(8, 'Angola', 'AO'),
(9, 'Anguilla', 'AI'),
(10, 'Antarctica', 'AQ'),
(11, 'Antigua and Barbuda', 'AG'),
(12, 'Argentina', 'AR'),
(13, 'Armenia', 'AM'),
(14, 'Aruba', 'AW'),
(15, 'Ascension Island', 'NULL'),
(16, 'Australia', 'AU'),
(17, 'Austria', 'AT'),
(18, 'Azerbaijan', 'AZ'),
(19, 'Bahamas', 'BS'),
(20, 'Bahrain', 'BH'),
(21, 'Bangladesh', 'BD'),
(22, 'Barbados', 'BB'),
(23, 'Belarus', 'BY'),
(24, 'Belgium', 'BE'),
(25, 'Belize', 'BZ'),
(26, 'Benin', 'BJ'),
(27, 'Bermuda', 'BM'),
(28, 'Bhutan', 'BT'),
(29, 'Bolivia', 'NULL'),
(30, 'Bosnia and Herzegovina', 'BA'),
(31, 'Botswana', 'BW'),
(32, 'Bouvet Island', 'BV'),
(33, 'Brazil', 'BR'),
(34, 'British Virgin Islands', 'NULL'),
(35, 'British Indian Ocean Territory', 'IO'),
(36, 'Brunei Darussalam', 'BN'),
(37, 'Bulgaria', 'BG'),
(38, 'Burkina Faso', 'BF'),
(39, 'Burundi', 'BI'),
(40, 'Cambodia', 'KH'),
(41, 'Cameroon', 'CM'),
(42, 'Canada', 'CA'),
(43, 'Cape Verde', 'NULL'),
(44, 'Cayman Islands', 'KY'),
(45, 'Central African Republic', 'CF'),
(46, 'Chad', 'TD'),
(47, 'Chile', 'CL'),
(48, 'China', 'CN'),
(49, 'Christmas Island', 'CX'),
(50, 'Cocos (Keeling) Island', 'NULL'),
(51, 'Colombia', 'CO'),
(52, 'Comoros', 'KM'),
(53, 'Congo, Republic of', 'NULL'),
(54, 'Congo, Democratic Republic of', 'NULL'),
(55, 'Cook Islands', 'CK'),
(56, 'Costa Rica', 'CR'),
(57, 'Cote d\'Ivoire', 'NULL'),
(58, 'Croatia', 'HR'),
(59, 'Cuba', 'CU'),
(60, 'Cyprus', 'CY'),
(61, 'Czech Republic', 'CZ'),
(62, 'Denmark', 'DK'),
(63, 'Djibouti', 'DJ'),
(64, 'Dominica', 'DM'),
(65, 'Dominican Republic', 'DO'),
(66, 'Ecuador', 'EC'),
(67, 'Egypt', 'EG'),
(68, 'El Salvador', 'SV'),
(69, 'Equatorial Guinea', 'GQ'),
(70, 'Eritrea', 'ER'),
(71, 'Estonia', 'EE'),
(72, 'Ethiopia', 'ET'),
(73, 'Falkland Islands (Malvinas)', 'FK'),
(74, 'Faroe Islands', 'FO'),
(75, 'Fiji', 'FJ'),
(76, 'Finland', 'FI'),
(77, 'France', 'FR'),
(78, 'French Guiana', 'GF'),
(79, 'French Polynesia', 'PF'),
(80, 'French Southern Territories', 'TF'),
(81, 'Gabon', 'GA'),
(82, 'Gambia', 'GM'),
(83, 'Georgia', 'GE'),
(84, 'Germany', 'DE'),
(85, 'Ghana', 'GH'),
(86, 'Gibraltar', 'GI'),
(87, 'Greece', 'GR'),
(88, 'Greenland', 'GL'),
(89, 'Grenada', 'GD'),
(90, 'Guadeloupe', 'GP'),
(91, 'Guam', 'GU'),
(92, 'Guatemala', 'GT'),
(93, 'Guernsey', 'GG'),
(94, 'Guinea', 'GN'),
(95, 'Guinea-Bissau', 'GW'),
(96, 'Guyana', 'GY'),
(97, 'Haiti', 'HT'),
(98, 'Heard and McDonald Islands', 'NULL'),
(99, 'Honduras', 'HN'),
(100, 'Hong Kong', 'HK'),
(101, 'Hungary', 'HU'),
(102, 'Iceland', 'IS'),
(103, 'India', 'IN'),
(104, 'Indonesia', 'ID'),
(105, 'Iran', 'NULL'),
(106, 'Iraq', 'IQ'),
(107, 'Ireland', 'IE'),
(108, 'Isle of Man', 'IM'),
(109, 'Israel', 'IL'),
(110, 'Italy', 'IT'),
(111, 'Jamaica', 'JM'),
(112, 'Japan', 'JP'),
(113, 'Jersey', 'JE'),
(114, 'Jordan', 'JO'),
(115, 'Kazakhstan', 'KZ'),
(116, 'Kenya', 'KE'),
(117, 'Kiribati', 'KI'),
(118, 'Korea, North', 'NULL'),
(119, 'Korea, South', 'NULL'),
(120, 'Kuwait', 'KW'),
(121, 'Kyrgyzstan', 'KG'),
(122, 'Laos', 'NULL'),
(123, 'Latvia', 'LV'),
(124, 'Lebanon', 'LB'),
(125, 'Lesotho', 'LS'),
(126, 'Liberia', 'LR'),
(127, 'Libya', 'LY'),
(128, 'Liechtenstein', 'LI'),
(129, 'Lithuania', 'LT'),
(130, 'Luxembourg', 'LU'),
(131, 'Macau', 'NULL'),
(132, 'Macedonia', 'NULL'),
(133, 'Madagascar', 'MG'),
(134, 'Malawi', 'MW'),
(135, 'Malaysia', 'MY'),
(136, 'Maldives', 'MV'),
(137, 'Mali', 'ML'),
(138, 'Malta', 'MT'),
(139, 'Marshall Islands', 'MH'),
(140, 'Martinique', 'MQ'),
(141, 'Mauritania', 'MR'),
(142, 'Mauritius', 'MU'),
(143, 'Mayotte', 'YT'),
(144, 'Mexico', 'MX'),
(145, 'Micronesia', 'NULL'),
(146, 'Moldova', 'NULL'),
(147, 'Monaco', 'MC'),
(148, 'Mongolia', 'MN'),
(149, 'Montenegro', 'ME'),
(150, 'Montserrat', 'MS'),
(151, 'Morocco', 'MA'),
(152, 'Mozambique', 'MZ'),
(153, 'Myanmar', 'MM'),
(154, 'Namibia', 'NA'),
(155, 'Nauru', 'NR'),
(156, 'Nepal', 'NP'),
(157, 'Netherlands', 'NL'),
(158, 'Netherlands Antilles', 'NULL'),
(159, 'New Caledonia', 'NC'),
(160, 'New Zealand', 'NZ'),
(161, 'Nicaragua', 'NI'),
(162, 'Niue', 'NU'),
(163, 'Niger', 'NE'),
(164, 'Nigeria', 'NG'),
(165, 'Norfolk Island', 'NF'),
(166, 'Northern Mariana Islands', 'MP'),
(167, 'Norway', 'NO'),
(168, 'Oman', 'OM'),
(169, 'Pakistan', 'PK'),
(170, 'Palau', 'PW'),
(171, 'Palestinian Territory, Occupied', 'NULL'),
(172, 'Panama', 'PA'),
(173, 'Papua New Guinea', 'PG'),
(174, 'Paraguay', 'PY'),
(175, 'Peru', 'PE'),
(176, 'Philippines', 'PH'),
(177, 'Pitcairn Island', 'NULL'),
(178, 'Poland', 'PL'),
(179, 'Portugal', 'PT'),
(180, 'Puerto Rico', 'PR'),
(181, 'Qatar', 'QA'),
(182, 'Reunion', 'RE'),
(183, 'Romania', 'RO'),
(184, 'Russia', 'NULL'),
(185, 'Rwanda', 'RW'),
(186, 'Saint Barthelemy', 'NULL'),
(187, 'Saint Helena', 'NULL'),
(188, 'Saint Kitts and Nevis', 'KN'),
(189, 'Saint Lucia', 'LC'),
(190, 'Saint Martin', 'NULL'),
(191, 'Saint Pierre and Miquelon', 'PM'),
(192, 'Saint Vincent and the Grenadines', 'VC'),
(193, 'Samoa', 'WS'),
(194, 'San Marino', 'SM'),
(195, 'Sao Tome and Principe', 'ST'),
(196, 'Saudia Arabia', 'NULL'),
(197, 'Senegal', 'SN'),
(198, 'Serbia', 'RS'),
(199, 'Seychelles', 'SC'),
(200, 'Sierra Leone', 'SL'),
(201, 'Singapore', 'SG'),
(202, 'Slovakia', 'SK'),
(203, 'Slovenia', 'SI'),
(204, 'Solomon Islands', 'SB'),
(205, 'Somalia', 'SO'),
(206, 'South Africa', 'ZA'),
(207, 'South Georgia and the South Sandwich Islands', 'GS'),
(208, 'Spain', 'ES'),
(209, 'Sri Lanka', 'LK'),
(210, 'Sudan', 'SD'),
(211, 'Suriname', 'SR'),
(212, 'Svalbard and Jan Mayen Islands', 'NULL'),
(213, 'Swaziland', 'SZ'),
(214, 'Sweden', 'SE'),
(215, 'Switzerland', 'CH'),
(216, 'Syria', 'NULL'),
(217, 'Taiwan', 'NULL'),
(218, 'Tajikistan', 'TJ'),
(219, 'Tanzania', 'NULL'),
(220, 'Thailand', 'TH'),
(221, 'Timor-Leste', 'TL'),
(222, 'Togo', 'TG'),
(223, 'Tokelau', 'TK'),
(224, 'Tonga', 'TO'),
(225, 'Trinidad and Tobago', 'TT'),
(226, 'Tunisia', 'TN'),
(227, 'Turkey', 'TR'),
(228, 'Turkmenistan', 'TM'),
(229, 'Turks and Caicos Islands', 'TC'),
(230, 'Tuvalu', 'TV'),
(231, 'Uganda', 'UG'),
(232, 'Ukraine', 'UA'),
(233, 'United Arab Emirates', 'AE'),
(234, 'United Kingdom', 'GB'),
(235, 'United States of America', 'US'),
(236, 'United States Virgin Islands', 'NULL'),
(237, 'Uruguay', 'UY'),
(238, 'US Minor Outlying Islands', 'NULL'),
(239, 'USSR', 'NULL'),
(240, 'Uzbekistan', 'UZ'),
(241, 'Vanuatu', 'VU'),
(242, 'Vatican City State (Holy See)', 'NULL'),
(243, 'Venezuela', 'NULL'),
(244, 'Vietnam', 'NULL'),
(245, 'Wallis and Futuna Islands', 'NULL'),
(246, 'Western Sahara', 'EH'),
(247, 'Yemen', 'YE'),
(248, 'Yugoslavia', 'NULL'),
(249, 'Zambia', 'ZM'),
(250, 'Zimbabwe', 'ZW');

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
(1232, 1, 2, 'login', NULL, NULL),
(1233, 1, 2, 'logout', NULL, NULL),
(1234, 1, 2, 'register', NULL, NULL),
(1235, 1, 2, 'home', NULL, NULL),
(1236, 1, 2, 'admin', NULL, NULL),
(1237, 1, 2, 'adminLogin', NULL, NULL),
(1238, 1, 2, 'profile', NULL, NULL),
(1239, 1, 2, 'testhome', NULL, NULL),
(1240, 1, 2, 'change-franchisees', NULL, NULL),
(1241, 1, 2, 'adminchangepassword', NULL, NULL),
(1242, 1, 2, 'adminChangePasswordPost', NULL, NULL),
(1243, 1, 2, 'drivingstore', NULL, NULL),
(1244, 1, 2, 'editprofile', NULL, NULL),
(1245, 1, 2, 'profile-update', NULL, NULL),
(1246, 1, 2, 'calender', NULL, NULL),
(1247, 1, 2, 'boking-details', NULL, NULL),
(1248, 1, 2, 'forgotpassword-link', NULL, NULL),
(1249, 1, 2, 'forgotpasswordpost', NULL, NULL),
(1250, 1, 2, 'searchajax', NULL, NULL),
(1251, 1, 2, 'booking-price', NULL, NULL),
(1252, 1, 2, 'vehicles-tracking', NULL, NULL),
(1253, 1, 2, 'vehicles-tracking-ajax', NULL, NULL),
(1254, 1, 2, 'chart-report-year', NULL, NULL),
(1255, 1, 2, 'chart-report-month', NULL, NULL),
(1256, 1, 2, 'change-payment-status', NULL, NULL),
(1257, 1, 2, 'update-booking', NULL, NULL),
(1258, 1, 2, 'event-details', NULL, NULL),
(1259, 1, 2, 'invoice-price-details', NULL, NULL),
(1260, 1, 2, 'franchisor-invoice-pdf', NULL, NULL),
(1261, 1, 2, 'driver-calender', NULL, NULL),
(1262, 1, 2, 'month-report', NULL, NULL),
(1263, 1, 2, 'day-report', NULL, NULL),
(1264, 1, 2, 'import', NULL, NULL),
(1265, 1, 2, 'import_parse', NULL, NULL),
(1266, 1, 2, 'franchisor-fees-create', NULL, NULL),
(1267, 1, 2, 'franchisor-fees-edit', NULL, NULL),
(1268, 1, 2, 'franchisor-fees-store', NULL, NULL),
(1269, 1, 2, 'franchisor-fees-update', NULL, NULL),
(1270, 1, 2, 'franchisor-fees-delete', NULL, NULL),
(1271, 1, 2, 'franchisee.index', NULL, NULL),
(1272, 1, 2, 'franchisee.show', NULL, NULL),
(1273, 1, 2, 'general-setting.index', NULL, NULL),
(1274, 1, 2, 'faq.index', NULL, NULL),
(1275, 1, 2, 'driver.index', NULL, NULL),
(1276, 1, 2, 'driver.create', NULL, NULL),
(1277, 1, 2, 'driver.store', NULL, NULL),
(1278, 1, 2, 'driver.show', NULL, NULL),
(1279, 1, 2, 'driver.edit', NULL, NULL),
(1280, 1, 2, 'driver.update', NULL, NULL),
(1281, 1, 2, 'driver.destroy', NULL, NULL),
(1282, 1, 2, 'franchisee-user.index', NULL, NULL),
(1283, 1, 2, 'franchisee-user.create', NULL, NULL),
(1284, 1, 2, 'franchisee-user.store', NULL, NULL),
(1285, 1, 2, 'franchisee-user.show', NULL, NULL),
(1286, 1, 2, 'franchisee-user.edit', NULL, NULL),
(1287, 1, 2, 'franchisee-user.update', NULL, NULL),
(1288, 1, 2, 'franchisee-user.destroy', NULL, NULL),
(1289, 1, 2, 'driving-request.index', NULL, NULL),
(1290, 1, 2, 'driving-request.create', NULL, NULL),
(1291, 1, 2, 'driving-request.store', NULL, NULL),
(1292, 1, 2, 'driving-request.show', NULL, NULL),
(1293, 1, 2, 'driving-request.edit', NULL, NULL),
(1294, 1, 2, 'driving-request.update', NULL, NULL),
(1295, 1, 2, 'driving-request.destroy', NULL, NULL),
(1296, 1, 2, 'booking.index', NULL, NULL),
(1297, 1, 2, 'booking.create', NULL, NULL),
(1298, 1, 2, 'booking.store', NULL, NULL),
(1299, 1, 2, 'booking.show', NULL, NULL),
(1300, 1, 2, 'booking.edit', NULL, NULL),
(1301, 1, 2, 'booking.update', NULL, NULL),
(1302, 1, 2, 'booking.destroy', NULL, NULL),
(1303, 1, 2, 'booking.vehicle', NULL, NULL),
(1304, 1, 2, 'booking.getRepet', NULL, NULL),
(1305, 1, 2, 'booking.repet-booking', NULL, NULL),
(1306, 1, 2, 'booking.invoice', NULL, NULL),
(1307, 1, 2, 'vehicles.index', NULL, NULL),
(1308, 1, 2, 'vehicles.create', NULL, NULL),
(1309, 1, 2, 'vehicles.store', NULL, NULL),
(1310, 1, 2, 'vehicles.show', NULL, NULL),
(1311, 1, 2, 'vehicles.edit', NULL, NULL),
(1312, 1, 2, 'vehicles.update', NULL, NULL),
(1313, 1, 2, 'vehicles.destroy', NULL, NULL),
(1314, 1, 2, 'drivers-vehicles.index', NULL, NULL),
(1315, 1, 2, 'drivers-vehicles.create', NULL, NULL),
(1316, 1, 2, 'drivers-vehicles.store', NULL, NULL),
(1317, 1, 2, 'drivers-vehicles.show', NULL, NULL),
(1318, 1, 2, 'drivers-vehicles.edit', NULL, NULL),
(1319, 1, 2, 'drivers-vehicles.update', NULL, NULL),
(1320, 1, 2, 'drivers-vehicles.destroy', NULL, NULL),
(1321, 1, 2, 'franchisees-price.index', NULL, NULL),
(1322, 1, 2, 'franchisees-price.create', NULL, NULL),
(1323, 1, 2, 'franchisees-price.store', NULL, NULL),
(1324, 1, 2, 'franchisees-price.show', NULL, NULL),
(1325, 1, 2, 'franchisees-price.edit', NULL, NULL),
(1326, 1, 2, 'franchisees-price.update', NULL, NULL),
(1327, 1, 2, 'franchisees-price.destroy', NULL, NULL),
(1328, 1, 2, 'enquiry.index', NULL, NULL),
(1329, 1, 2, 'enquiry.create', NULL, NULL),
(1330, 1, 2, 'enquiry.store', NULL, NULL),
(1331, 1, 2, 'enquiry.show', NULL, NULL),
(1332, 1, 2, 'enquiry.edit', NULL, NULL),
(1333, 1, 2, 'enquiry.update', NULL, NULL),
(1334, 1, 2, 'enquiry.destroy', NULL, NULL),
(1335, 1, 2, 'events.index', NULL, NULL),
(1336, 1, 2, 'events.create', NULL, NULL),
(1337, 1, 2, 'events.store', NULL, NULL),
(1338, 1, 2, 'events.show', NULL, NULL),
(1339, 1, 2, 'events.edit', NULL, NULL),
(1340, 1, 2, 'events.update', NULL, NULL),
(1341, 1, 2, 'events.destroy', NULL, NULL),
(1342, 1, 2, 'client.index', NULL, NULL),
(1343, 1, 2, 'client.create', NULL, NULL),
(1344, 1, 2, 'client.store', NULL, NULL),
(1345, 1, 2, 'client.show', NULL, NULL),
(1346, 1, 2, 'client.edit', NULL, NULL),
(1347, 1, 2, 'client.update', NULL, NULL),
(1348, 1, 2, 'client.destroy', NULL, NULL),
(1349, 1, 2, 'invoice.index', NULL, NULL),
(1350, 1, 2, 'invoice.create', NULL, NULL),
(1351, 1, 2, 'invoice.store', NULL, NULL),
(1352, 1, 2, 'invoice.show', NULL, NULL),
(1353, 1, 2, 'invoice.edit', NULL, NULL),
(1354, 1, 2, 'invoice.update', NULL, NULL),
(1355, 1, 2, 'invoice.destroy', NULL, NULL),
(1356, 1, 2, 'invoice.preview', NULL, NULL),
(1357, 1, 2, 'invoice.download', NULL, NULL),
(1358, 1, 2, 'invoice.markpaid', NULL, NULL),
(1359, 1, 2, 'companyinfo.index', NULL, NULL),
(1360, 1, 2, 'companyinfo.create', NULL, NULL),
(1361, 1, 2, 'companyinfo.store', NULL, NULL),
(1362, 1, 2, 'companyinfo.show', NULL, NULL),
(1363, 1, 2, 'companyinfo.edit', NULL, NULL),
(1364, 1, 2, 'companyinfo.update', NULL, NULL),
(1365, 1, 2, 'companyinfo.destroy', NULL, NULL),
(1366, 1, 2, 'teams.index', NULL, NULL);

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
(1, 1, 16, 3, '2018-11-28 07:15:58', '2018-11-28 07:16:29', '2018-11-28 07:16:29'),
(2, 1, 3, 3, '2018-11-28 07:29:13', '2018-11-28 08:06:30', NULL),
(3, 1, 13, 1, '2018-11-28 07:45:49', '2018-11-28 07:45:49', NULL),
(4, 1, 20, 1, '2018-11-28 07:55:28', '2018-11-28 07:55:28', NULL),
(5, 1, 21, 1, '2018-12-10 07:05:53', '2018-12-10 07:05:53', NULL),
(6, 7, 17, 2, '2018-12-12 02:45:11', '2018-12-12 02:45:11', NULL);

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
(1, 3, 1, '2018-10-31', '13:30:37', '13:31:01'),
(2, 3, 1, '2018-10-31', '13:31:19', '13:31:33'),
(3, 3, 1, '2018-10-31', '13:32:52', '13:34:10'),
(4, 3, 1, '2018-10-31', '13:35:23', '13:39:37'),
(5, 3, 1, '2018-10-31', '13:40:06', '13:40:34'),
(6, 3, 1, '2018-10-31', '13:40:48', '13:41:08'),
(7, 3, 1, '2018-10-31', '13:41:23', '13:41:49'),
(8, 3, 1, '2018-10-31', '13:42:26', '13:45:55'),
(9, 3, 1, '2018-10-31', '13:46:01', '13:47:20'),
(10, 3, 1, '2018-10-31', '14:17:06', '14:17:18'),
(11, 3, 1, '2018-10-31', '14:17:21', '14:17:28'),
(12, 3, 1, '2018-10-31', '14:17:30', '14:22:30'),
(13, 3, 1, '2018-11-01', '05:58:54', '05:59:04'),
(14, 3, 1, '2018-11-01', '07:03:59', '07:04:14'),
(15, 3, 1, '2018-11-01', '07:04:29', '07:25:21'),
(16, 3, 1, '2018-11-01', '07:25:37', '07:27:00'),
(17, 3, 1, '2018-11-01', '07:35:27', '07:35:40'),
(18, 3, 1, '2018-11-01', '07:46:18', '07:46:59'),
(19, 3, 1, '2018-11-01', '07:52:42', '07:53:28'),
(20, 3, 1, '2018-11-01', '07:54:51', '07:56:18'),
(21, 3, 1, '2018-11-01', '07:58:46', '07:59:26'),
(22, 3, 1, '2018-11-01', '08:00:51', '08:01:03'),
(23, 3, 1, '2018-11-01', '08:03:38', '08:19:59'),
(24, 3, 1, '2018-11-01', '08:20:11', '08:21:27'),
(25, 3, 1, '2018-11-01', '08:21:37', '08:22:37'),
(26, 3, 1, '2018-11-01', '08:22:39', '08:23:02'),
(27, 3, 1, '2018-11-01', '08:23:07', '08:32:37'),
(28, 3, 1, '2018-11-01', '08:32:45', '08:32:54'),
(29, 3, 1, '2018-11-01', '09:53:26', '09:54:59'),
(30, 3, 1, '2018-11-01', '09:55:04', '09:55:44'),
(31, 3, 1, '2018-11-01', '09:55:48', '10:02:04'),
(32, 3, 1, '2018-11-01', '10:02:08', '10:13:33'),
(33, 3, 1, '2018-11-01', '10:13:37', '10:16:08'),
(34, 3, 1, '2018-11-01', '10:16:17', '10:26:38'),
(35, 3, 1, '2018-11-01', '10:26:44', '10:26:58'),
(36, 3, 1, '2018-11-01', '10:50:21', '10:50:34'),
(37, 3, 1, '2018-11-01', '10:50:54', '10:51:49'),
(38, 3, 1, '2018-11-01', '10:51:54', '10:52:35'),
(39, 3, 1, '2018-11-01', '10:52:39', '10:54:31'),
(40, 3, 1, '2018-11-01', '10:54:47', '10:55:17'),
(41, 3, 1, '2018-11-01', '10:55:22', '10:57:04'),
(42, 3, 1, '2018-11-01', '10:57:06', '10:57:14'),
(43, 3, 1, '2018-11-01', '10:57:16', '10:57:33'),
(44, 3, 1, '2018-11-01', '10:57:41', '10:58:09'),
(45, 3, 1, '2018-11-01', '10:58:16', '10:59:01'),
(46, 3, 1, '2018-11-01', '10:59:08', '11:00:00'),
(47, 3, 1, '2018-11-01', '11:00:10', '11:02:05'),
(48, 3, 1, '2018-11-01', '11:02:10', '11:24:18'),
(49, 3, 1, '2018-11-01', '11:24:24', '11:25:44'),
(50, 3, 1, '2018-11-01', '11:25:48', '11:39:36'),
(51, 3, 1, '2018-11-01', '11:39:39', '11:40:32'),
(52, 3, 1, '2018-11-01', '12:18:44', '12:19:50'),
(53, 3, 1, '2018-11-01', '12:19:52', '12:22:45'),
(54, 3, 1, '2018-11-01', '12:22:49', '12:23:35'),
(55, 3, 1, '2018-11-01', '12:27:45', '12:28:37'),
(56, 3, 1, '2018-11-01', '12:28:42', '12:28:51'),
(57, 3, 1, '2018-11-01', '12:28:55', '12:29:02'),
(58, 3, 1, '2018-11-01', '12:29:06', '12:29:10'),
(59, 3, 1, '2018-11-01', '12:29:42', '12:29:49'),
(60, 3, 1, '2018-11-01', '12:41:37', '12:42:57'),
(61, 3, 1, '2018-11-01', '12:43:01', '12:43:24'),
(62, 3, 1, '2018-11-01', '12:43:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `driver_details`
--

CREATE TABLE `driver_details` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `employment_start_date` date DEFAULT NULL,
  `drivinglicence` varchar(255) DEFAULT NULL COMMENT 'PDF or Image',
  `licence_no` varchar(255) DEFAULT NULL,
  `licence_expiry_date` varchar(255) DEFAULT NULL,
  `driver_experience` varchar(255) DEFAULT NULL,
  `phl_number` varchar(255) NOT NULL,
  `phl_image` varchar(255) DEFAULT NULL,
  `phl_expiry_date` varchar(255) DEFAULT NULL,
  `national_insurance_no` varchar(255) DEFAULT NULL,
  `passport_number` varchar(255) DEFAULT NULL,
  `passport_image` varchar(255) DEFAULT NULL,
  `training_certificates` varchar(255) DEFAULT NULL,
  `certificates_exp_date` varchar(255) DEFAULT NULL,
  `short_name` varchar(20) DEFAULT NULL,
  `renewal_date` varchar(255) DEFAULT NULL,
  `right_work_uk` tinyint(4) NOT NULL DEFAULT '1',
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_details`
--

INSERT INTO `driver_details` (`id`, `user_id`, `employment_start_date`, `drivinglicence`, `licence_no`, `licence_expiry_date`, `driver_experience`, `phl_number`, `phl_image`, `phl_expiry_date`, `national_insurance_no`, `passport_number`, `passport_image`, `training_certificates`, `certificates_exp_date`, `short_name`, `renewal_date`, `right_work_uk`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, '2018-10-31', '1537606027-5ba6018b8197f.png', 'L-NUMBER', '2019-09-27', '234', 'PHL NUMBER', '1537606398-5ba602fee6db7.jpg', '2018-09-22', 'Insurance-NUMBER', 'PASSPORT', '1537606943-5ba6051fa3059.jpg', NULL, NULL, '66', '2018-09-25', 1, NULL, '2018-09-22 03:17:07', '2018-10-31 08:21:04', NULL),
(2, 13, '2018-10-26', '1537861925-5ba9e925ac89a.png', '234', '2018-09-27', '12', '123', '1537861925-5ba9e925b3f09.jpg', '234', '234', '234', '1537861925-5ba9e925b45b7.png', NULL, NULL, 'BD', '2018-10-24', 1, NULL, '2018-09-25 02:22:05', '2018-10-31 08:20:17', NULL),
(3, 16, '2018-11-22', NULL, NULL, NULL, NULL, 'PHL85632140978', NULL, '2018-11-20', 'NIN744125639800', 'LKJH8523697410000', NULL, '1542027452-5be978bc5a85d.jpg', NULL, 'nj', '2018-11-20', 1, 'lorem ipsum', '2018-11-12 05:14:39', '2018-11-13 00:12:24', NULL),
(4, 17, '2018-10-25', NULL, NULL, NULL, NULL, 'PHL8520000056', NULL, '2018-12-27', 'NI785200000056', 'P8552369444145544', NULL, NULL, NULL, 'ar', '2018-12-31', 1, 'lorem ipsm ijjj jj', '2018-11-13 00:38:32', '2018-12-12 02:45:11', NULL),
(5, 20, NULL, NULL, NULL, NULL, NULL, 'asdasd', NULL, '2018-11-27', 'asdasd', 'adasd', NULL, NULL, NULL, 'MR', '2018-11-30', 1, 'asdasdasdasd', '2018-11-28 07:55:28', '2018-11-28 07:55:28', NULL),
(6, 21, NULL, NULL, NULL, NULL, NULL, 'PHL456321', NULL, '2018-12-21', 'NIN5633210', 'PN1234560', NULL, NULL, NULL, 'jh', '2018-12-31', 1, NULL, '2018-12-10 07:05:53', '2018-12-10 07:05:53', NULL);

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
(1, NULL, 'Invoice', 'New Invoice', 'info', 'info@dmd.com', 'Invoice', '<table cellpadding="0" cellspacing="0" style="width: 732px; margin: 0 auto; font-family: \'Montserrat\', sans-serif;  max-width: 100%; background: #666;" width="732px"><!--*-->\r\n	<thead>\r\n		<tr>\r\n			<td style="background: #666; padding: 16px 0px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align: middle; padding-left: 20px;"><a href="#" style="border: none; float: left; outline: none;"><img alt="" src="http://localhost/DMD/photos/1/logo.png" style="display: block; border: none; outline: none; width: 135px; height: 194px;" /> </a></td>\r\n						<td style="text-align: right; vertical-align:middle; padding-right: 20px;color:#FFF">info@dmd.com</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</thead>\r\n	<!--*--><!--*-->\r\n	<tbody>\r\n		<tr>\r\n			<td style="background: #fff2f4; padding: 66px 0 65px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="vertical-align: top; width: 470px; padding-left: 70px;">\r\n						<table cellpadding="0" cellspacing="0" width="100%">\r\n							<tbody>\r\n								<tr>\r\n									<td style="font-size: 18px; line-height: 1; color: #000000; line-height: 1; text-transform: uppercase; padding-bottom: 17px;">Hello {{ $name}}</td>\r\n								</tr>\r\n								<tr>\r\n									<td style="font-size: 14px; line-height: 22px;  color: #000; font-weight: 400; padding: 20px 0 0;">\r\n									<p>Thank you for contacting us&nbsp;</p>\r\n\r\n									<p>We will reply to your question ASAP&nbsp;</p>\r\n\r\n									<p>Kind Regards</p>\r\n\r\n									<p>DMD</p>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n						<td style="vertical-align: middle; padding-right: 70px;"><img alt="" src="https://redflagdata.com.au/photos/1/verify_icon.png" style="display: block; border: none; outline: none; float: right; width: 79px; height: 79px;" /></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n	<!--*--><!--*-->\r\n	<tfoot>\r\n		<tr>\r\n			<td style="padding: 35px 0 42px;">\r\n			<table cellpadding="0" cellspacing="0" width="100%">\r\n				<tbody>\r\n					<tr>\r\n						<td style="padding:0 70px;"><a href="#" style="float: left; outline: none;border: none;"><img alt="" src="http://localhost/DMD/photos/1/logo.png" style="display: block; outline: none; border: none; width: 135px; height: 194px;" /> </a></td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tfoot>\r\n	<!--*-->\r\n</table>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(11) NOT NULL,
  `order_id` varchar(10) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `franchisees_id` int(11) NOT NULL,
  `trip_status` int(11) DEFAULT NULL COMMENT '1=>Start, 2=>Complete,3=>Breakdown',
  `client_id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `home_number` varchar(255) DEFAULT NULL,
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
  `final_price` double(10,2) DEFAULT NULL,
  `paying_bill` varchar(255) DEFAULT NULL,
  `who_paying_bill` varchar(255) DEFAULT NULL,
  `payment_mode` int(11) NOT NULL COMMENT '1=>Cash,2=>Credit',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `order_id`, `users_id`, `franchisees_id`, `trip_status`, `client_id`, `name`, `email`, `phone_number`, `home_number`, `address`, `note`, `booking_time`, `base_location`, `drop_location`, `outward_companion`, `outward_waiting`, `journey_type`, `return_companion`, `return_waiting`, `long_return`, `drop_off_to_base`, `comfort_break`, `total_distance`, `total_duration`, `total_price`, `custom_price`, `final_price`, `paying_bill`, `who_paying_bill`, `payment_mode`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 1, 1, 2, 5, 'jjhjhhhhjhhh', 'loremlorem@gmail.com', '7854123056', '7410258963', 'kolkata', 'lorem ipsum', '2018-11-08 17:50:41', 'Garia Station road Garia Kolkata 700084', 'Garia, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, 1719.37, 3102, 12029.05, NULL, 12029.05, NULL, NULL, 1, NULL, '2018-12-15 05:24:43', '2018-12-15 05:24:43'),
(2, NULL, 1, 1, 2, 5, 'jjhjhhhhjhhh', 'loremlorem@gmail.com', '7854123056', '7410258963', 'kolkata', 'lorem ipsum', '2018-11-08 17:50:41', 'Garia Station road Garia Kolkata 700084', 'Garia, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, 1719.37, 3102, 12029.05, NULL, 12029.05, NULL, NULL, 1, NULL, '2018-12-15 05:24:40', '2018-12-15 05:24:40'),
(3, 'O-10003', 1, 1, NULL, 10, NULL, NULL, NULL, NULL, NULL, 'hjkljyhgh', '2018-11-07 14:00:00', 'Garia Station road Garia Kolkata 700084', 'Exide More Bus Stop - Bhawanipur, Chowringhee Road, Sreepally, Bhowanipore, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, 0, 12.88, 52, 180.00, NULL, 180.00, 'Client', NULL, 1, '2018-11-07 03:02:46', '2018-11-07 03:02:46', NULL),
(4, 'O-10004', 1, 1, NULL, 10, 'munmun', 'munmun456@gmail.com', '7410258963', NULL, 'kolkta', NULL, '2018-11-08 11:30:00', 'Garia Station road Garia Kolkata 700084', 'Howrah Railway Station, Howrah, West Bengal, India', NULL, NULL, 1, NULL, NULL, 0, NULL, 0, 79.22, 47, 480.00, NULL, 480.00, 'Person Booking', NULL, 1, '2018-11-08 00:32:26', '2018-11-08 00:32:26', NULL),
(5, 'O-10005', 1, 1, NULL, 15, 'Hasibur Rahaman', 'franchisee2@gmail.com', '7777777777', NULL, 'Kolkata, N/A', NULL, '2018-11-24 15:55:00', 'Garia Station road Garia Kolkata 700084', 'Assam, India', NULL, NULL, 1, NULL, NULL, 0, NULL, 0, 2427.86, 4568, 19304.90, NULL, 19304.90, 'Person Booking', NULL, 1, '2018-11-17 05:13:14', '2018-11-17 05:13:14', NULL),
(6, 'O-10006', 1, 7, NULL, 19, 'hasme', 'asdasd@gmaio.sdsd', '7889966', NULL, 'Assam, India', NULL, '2018-12-22 11:55:00', 'kolkata', 'Adyar, Chennai, Tamil Nadu, India', NULL, NULL, 1, NULL, NULL, 0, NULL, 0, 1092.68, 2013, 128303.00, NULL, 128303.00, 'Person Booking', NULL, 1, '2018-12-13 00:28:03', '2018-12-13 00:28:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_details`
--

CREATE TABLE `enquiry_details` (
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
-- Dumping data for table `enquiry_details`
--

INSERT INTO `enquiry_details` (`id`, `booking_id`, `customPrice`, `total_distance`, `total_duration`, `total_price`, `trip_expense`, `waitingCost`, `companionCost`, `comfortCost`, `base_driving_cost`, `paid_mileage`, `driver_charge`, `vehicle_charge`, `tripAmount`, `tripProfit`, `custom_tripAmount`, `custom_tripProfit`, `created_at`, `updated_at`) VALUES
(1, 3, 0.00, 12.88, 52, 180.00, 17.21, 0.00, 0.00, 0.00, 155.00, 25.00, 4.33, 12.88, 162.79, 90.44, 0.00, 0.00, '2018-11-07 03:02:46', '2018-11-07 03:02:46'),
(2, 4, 0.00, 79.22, 47, 480.00, 83.14, 0.00, 0.00, 0.00, 110.00, 370.00, 3.92, 79.22, 396.86, 82.68, 0.00, 0.00, '2018-11-08 00:32:26', '2018-11-08 00:32:26'),
(3, 5, 0.00, 2427.86, 4568, 19304.90, 2808.53, 0.00, 0.00, 0.00, 15015.00, 4289.90, 380.67, 2427.86, 16496.37, 85.45, 0.00, 0.00, '2018-11-17 05:13:14', '2018-11-17 05:13:14'),
(4, 6, 0.00, 1092.68, 2013, 128303.00, 115978.00, 0.00, 0.00, 0.00, 43200.00, 85103.00, 6710.00, 109268.00, 12325.00, 9.61, 0.00, 0.00, '2018-12-13 00:28:03', '2018-12-13 00:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_pickup_locations`
--

CREATE TABLE `enquiry_pickup_locations` (
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

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) NOT NULL,
  `franchisees_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `posted_date` datetime DEFAULT NULL,
  `event_for` int(11) DEFAULT NULL COMMENT '1=>Franchisor, 2 =>Franchisee',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `franchisees_id`, `title`, `description`, `posted_date`, `event_for`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'lorem ipsum', 'lorem ipsum lorem ipsum', '2018-11-15 00:00:00', NULL, '2018-11-07 23:56:25', '2018-11-28 05:50:04', '2018-11-28 05:50:04'),
(3, 7, 'Test', 'Test', '2018-11-12 00:00:00', NULL, '2018-11-12 04:07:35', '2018-11-28 05:50:02', '2018-11-28 05:50:02'),
(4, 1, 'Test Event', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2018-12-14 00:50:00', 1, '2018-11-12 04:14:29', '2018-12-13 04:39:04', NULL),
(5, 1, 'mmkjk', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2018-12-31 11:55:00', NULL, '2018-11-13 08:50:56', '2018-11-28 05:49:55', '2018-11-28 05:49:55'),
(7, NULL, 'rtyrtyrty', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-11-02 15:55:00', 2, '2018-11-28 05:50:13', '2018-12-13 05:41:28', NULL),
(8, NULL, 'asdas', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2018-12-13 15:35:00', 1, '2018-12-13 04:39:30', '2018-12-13 05:41:18', NULL);

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
(1, 'Lorem Ipsum is simply dummy text of the printing??', 'Lorem Ipsum is simply dummy text of the printing Lorem Ipsum is simply dummy text of the printingLorem Ipsum is simply dummy text of the printing', 1, '2018-11-12 00:36:47', '2018-11-12 00:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `franchisees`
--

CREATE TABLE `franchisees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `base_location` varchar(255) DEFAULT NULL,
  `contact_person_name` varchar(255) NOT NULL,
  `contact_person_name_sec` varchar(255) DEFAULT NULL,
  `contact_person_phone` varchar(100) NOT NULL,
  `contact_person_phone_sec` varchar(255) DEFAULT NULL,
  `owner_dmd_mobilenumber` varchar(255) DEFAULT NULL,
  `owner_dmd_mobilenumber_sec` varchar(255) DEFAULT NULL,
  `owner_homenumber` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `contact_person_email` varchar(255) NOT NULL,
  `contact_person_email_sec` varchar(255) DEFAULT NULL,
  `franchise_owner_dmd_email` varchar(255) DEFAULT NULL,
  `franchise_manager_name` varchar(255) DEFAULT NULL,
  `manager_person_phone` varchar(255) DEFAULT NULL,
  `manager_dmd_mob_frn_owner` varchar(255) DEFAULT NULL,
  `manager_dmd_email_frn_owner` varchar(255) DEFAULT NULL,
  `franchise_administrator_name` varchar(255) DEFAULT NULL,
  `administrator_person_phone` varchar(255) DEFAULT NULL,
  `administrator_dmd_mob_frn_owner` varchar(255) DEFAULT NULL,
  `administrator_dmd_email_frn_owner` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_number` varchar(255) NOT NULL,
  `reg_address` varchar(255) NOT NULL,
  `incorporation_date` varchar(255) NOT NULL,
  `company_yearend` varchar(255) DEFAULT NULL,
  `conf_stat_date` varchar(255) DEFAULT NULL,
  `locality` varchar(100) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `public_liability_insurance` date DEFAULT NULL,
  `employers_liability_insurance` date DEFAULT NULL,
  `amount_cover` varchar(255) DEFAULT NULL,
  `franchise_license_renewal_date` date DEFAULT NULL,
  `company_year_end` date DEFAULT NULL,
  `confirmation_statement_date` date DEFAULT NULL,
  `vat_reg` varchar(255) DEFAULT NULL,
  `vat_number` varchar(255) DEFAULT NULL,
  `vat_reg_date` varchar(255) DEFAULT NULL,
  `vat_dereg_date` varchar(255) DEFAULT NULL,
  `bank_account_no` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `franchise_agreement` varchar(255) DEFAULT NULL,
  `amendments` varchar(255) DEFAULT NULL,
  `shareholders_nameone` varchar(255) DEFAULT NULL,
  `shareholders_nametwo` varchar(255) DEFAULT NULL,
  `shareholders_namethree` varchar(255) DEFAULT NULL,
  `shareholders_namefour` varchar(255) DEFAULT NULL,
  `share_percentageone` varchar(255) DEFAULT NULL,
  `share_percentagetwo` varchar(255) DEFAULT NULL,
  `share_percentagethree` varchar(255) DEFAULT NULL,
  `share_percentagefour` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `franchisees`
--

INSERT INTO `franchisees` (`id`, `name`, `base_location`, `contact_person_name`, `contact_person_name_sec`, `contact_person_phone`, `contact_person_phone_sec`, `owner_dmd_mobilenumber`, `owner_dmd_mobilenumber_sec`, `owner_homenumber`, `address`, `contact_person_email`, `contact_person_email_sec`, `franchise_owner_dmd_email`, `franchise_manager_name`, `manager_person_phone`, `manager_dmd_mob_frn_owner`, `manager_dmd_email_frn_owner`, `franchise_administrator_name`, `administrator_person_phone`, `administrator_dmd_mob_frn_owner`, `administrator_dmd_email_frn_owner`, `status`, `company_name`, `company_number`, `reg_address`, `incorporation_date`, `company_yearend`, `conf_stat_date`, `locality`, `country`, `public_liability_insurance`, `employers_liability_insurance`, `amount_cover`, `franchise_license_renewal_date`, `company_year_end`, `confirmation_statement_date`, `vat_reg`, `vat_number`, `vat_reg_date`, `vat_dereg_date`, `bank_account_no`, `account_name`, `franchise_agreement`, `amendments`, `shareholders_nameone`, `shareholders_nametwo`, `shareholders_namethree`, `shareholders_namefour`, `share_percentageone`, `share_percentagetwo`, `share_percentagethree`, `share_percentagefour`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'UBER', 'Garia Station Road, Purbapara, Garia, Calcutta, West Bengal, India', 'Hasibur Rahaman', NULL, '7059114888', NULL, NULL, NULL, NULL, 'Asdasd, San Rafael Street, Mandaluyong, Metro Manila, Philippines', 'hasib2008@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '`werwer', 'werwer', 'erwerwe', '2018-11-23', '2018-11-22', NULL, 'Garia', 'India', '2018-08-30', '2018-09-27', NULL, '2018-09-29', '2018-09-28', '2018-09-29', '1', NULL, NULL, NULL, '234234234', 'werwer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-22 01:55:05', '2018-12-13 08:10:26', NULL),
(5, 'Hasi', NULL, 'Hasi', NULL, '7896541236', NULL, NULL, NULL, NULL, 'asdasd', 'asdasd@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '', '', '', '', '', 'asda', NULL, '2018-09-28', '2018-09-22', NULL, '2018-09-21', '2018-09-29', '2018-09-28', NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-28 01:22:52', '2018-09-28 02:07:46', '2018-09-28 02:07:46'),
(6, 'asdasd', NULL, 'asdasd', NULL, '7896541236', NULL, NULL, NULL, NULL, 'asdasd', 'dfgdf@gmail.coom', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '', '', '', '', '', 'sdfsdf', NULL, '2018-10-04', '2018-10-05', NULL, '2018-09-28', '2018-09-28', '2018-09-29', NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-28 01:23:34', '2018-09-28 02:07:41', '2018-09-28 02:07:41'),
(7, 'OLA', 'Kolkata Railway Station (Chitpur Station), Belgachia, Calcutta, West Bengal, India', 'MD HASIBUR RAHAMAN', NULL, '7059114888', NULL, NULL, NULL, NULL, 'Ajana-Kalbarri Road, Kalbarri National Park WA, Australia', 'rahamanh939@gmail.com', 'rahamanh939@gmail.com', 'rahamanh939@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'DD', '7854120369', 'kjklo ikokjn', '2018-11-22', NULL, NULL, 'Loca', 'India', '2018-11-01', '2018-10-31', NULL, '2018-10-31', '2018-11-09', '2018-10-18', '1', NULL, NULL, NULL, '11455202265', 'hjkl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-08 04:21:24', '2018-12-13 00:36:05', NULL),
(8, 'DMD', 'Test', 'DMD', 'adsad', '1212121212212', 'adasd', NULL, NULL, NULL, 'asdasd', 'asdasd@gmail.com', 'asdasd@gmail.com', 'asdasd@gmail.com', NULL, '07896541236', NULL, 'hasib200822@gmail.com', NULL, NULL, NULL, NULL, 1, 'DC', '2018-11-09', 'Garia Station Road', '2018-11-02', '2018-11-30', '2018-12-04', 'tyesteeerewwe', 'India', '2018-11-29', '2018-11-29', 'asda', '2018-11-17', NULL, NULL, '1', 'V-741000025', NULL, NULL, '34234', 'DMDM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-17 07:45:35', '2018-12-13 07:55:44', NULL),
(9, 'asdas', 'asd', 'adasd', 'asdasd', '12121212121', 'asdas', 'dasdas', 'dasdas', 'dasdasd', 'AB, Canada', 'ada@gmail.com', 'asdasd', 'asdasd', 'ad', 'asd', 'asd', 'asd', NULL, NULL, NULL, NULL, 0, 'adasd', 'asda', 'asd', '2018-12-15', '2018-12-29', '2018-12-29', 'asdasd', NULL, '2018-12-12', '2018-12-15', 'adasd', '2018-12-15', NULL, NULL, '1', 'asdad', NULL, NULL, '121212', '1212', NULL, NULL, 'asd', 'asd', 'asdas', 'ada', 'asd', 'asd', 'asd', 'ads', '2018-12-15 01:13:24', '2018-12-15 01:13:24', NULL);

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
(1, 1, 5, 1, 1012, 5, 5, 5, 5, '2018-09-22 07:25:05', '2018-11-30 00:00:38', NULL),
(2, 5, 123, 12312, 123, 123, 123, 123, 123, '2018-09-28 01:22:52', '2018-09-28 01:22:52', NULL),
(3, 6, 1, 2, 7, 3, 4, 5, 6, '2018-09-28 01:23:34', '2018-09-28 01:23:34', NULL),
(4, 7, 200, 100, 100, 100, 100, 100, 100, '2018-10-08 04:21:24', '2018-10-08 07:31:35', NULL),
(5, 8, 13, 0.4, 10, 0.5, 1, 5, 5, '2018-11-01 00:52:42', '2018-11-01 00:52:42', NULL),
(6, 9, 13, 0.4, 10, 0.5, 1, 5, 5, '2018-12-15 01:13:24', '2018-12-15 01:13:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `franchisorinvoice`
--

CREATE TABLE `franchisorinvoice` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(20) DEFAULT NULL,
  `franchisees_id` int(11) NOT NULL,
  `standard_fee` int(11) NOT NULL,
  `turnover` double(10,2) NOT NULL,
  `invoice_for_month` int(11) NOT NULL,
  `invoice_for_year` int(11) NOT NULL,
  `create_by` int(11) NOT NULL,
  `commission` double(10,2) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `custom_entry` int(11) DEFAULT NULL,
  `VAT` double(10,2) DEFAULT NULL,
  `amount` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `franchisorinvoice`
--

INSERT INTO `franchisorinvoice` (`id`, `invoice_no`, `franchisees_id`, `standard_fee`, `turnover`, `invoice_for_month`, `invoice_for_year`, `create_by`, `commission`, `comment`, `custom_entry`, `VAT`, `amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(40, 'IN-10040', 1, 240, 0.00, 12, 2018, 1, 0.00, NULL, NULL, 53.00, 393.00, '2018-12-14 02:23:31', '2018-12-14 02:23:31', NULL),
(41, 'IN-10041', 7, 240, 0.00, 12, 2018, 1, 0.00, NULL, NULL, 53.00, 393.00, '2018-12-14 02:23:31', '2018-12-14 02:23:31', NULL),
(42, 'IN-10042', 8, 240, 0.00, 12, 2018, 1, 0.00, NULL, NULL, 53.00, 393.00, '2018-12-14 02:23:31', '2018-12-14 02:23:31', NULL),
(43, 'IN-10043', 1, 240, 0.00, 1, 2018, 1, 0.00, NULL, NULL, 53.00, 393.00, '2018-12-14 02:26:04', '2018-12-14 02:26:04', NULL),
(44, 'IN-10044', 7, 240, 0.00, 1, 2018, 1, 0.00, NULL, NULL, 53.00, 393.00, '2018-12-14 02:26:04', '2018-12-14 02:26:04', NULL),
(45, 'IN-10045', 8, 240, 0.00, 1, 2018, 1, 0.00, NULL, NULL, 53.00, 393.00, '2018-12-14 02:26:04', '2018-12-14 02:26:04', NULL),
(46, 'IN-10046', 1, 240, 0.00, 3, 2018, 1, 0.00, '3232', -100, 53.00, 293.00, '2018-12-14 02:40:24', '2018-12-14 02:40:45', NULL),
(47, 'IN-10047', 7, 240, 0.00, 3, 2018, 1, 0.00, NULL, NULL, 53.00, 393.00, '2018-12-14 02:40:24', '2018-12-14 02:40:24', NULL),
(48, 'IN-10048', 8, 240, 0.00, 3, 2018, 1, 0.00, NULL, NULL, 53.00, 393.00, '2018-12-14 02:40:24', '2018-12-14 02:40:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `franchisorinvoice_details`
--

CREATE TABLE `franchisorinvoice_details` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `fee_type` varchar(255) NOT NULL,
  `fee_id` int(11) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `vat` double(10,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `franchisorinvoice_details`
--

INSERT INTO `franchisorinvoice_details` (`id`, `invoice_id`, `fee_type`, `fee_id`, `amount`, `vat`) VALUES
(1, 1, 'Marketing Fee', 0, 100.00, 0.00),
(2, 2, 'Marketing Fee', 0, 100.00, 0.00),
(3, 3, 'Marketing Fee', 0, 100.00, 0.00),
(4, 4, 'Marketing Fee', 1, 100.00, 0.00),
(5, 5, 'Marketing Fee', 1, 100.00, 0.00),
(6, 6, 'Marketing Fee', 1, 100.00, 0.00),
(7, 7, 'Marketing Fee', 1, 100.00, 0.00),
(8, 8, 'Marketing Fee', 1, 100.00, 0.00),
(9, 9, 'Marketing Fee', 1, 100.00, 0.00),
(10, 10, 'Marketing Fee', 1, 100.00, 0.00),
(11, 11, 'Marketing Fee', 1, 100.00, 0.00),
(12, 12, 'Marketing Fee', 1, 100.00, 0.00),
(13, 13, 'Marketing Fee', 1, 100.00, 5.00),
(14, 14, 'Marketing Fee', 1, 100.00, 5.00),
(15, 15, 'Marketing Fee', 1, 100.00, 5.00),
(16, 16, 'Marketing Fee', 1, 100.00, 5.00),
(17, 17, 'Marketing Fee', 1, 100.00, 5.00),
(18, 18, 'Marketing Fee', 1, 100.00, 5.00),
(19, 19, 'Marketing Fee', 1, 100.00, 5.00),
(20, 20, 'Marketing Fee', 1, 100.00, 5.00),
(21, 21, 'Marketing Fee', 1, 100.00, 5.00),
(22, 22, 'Marketing Fee', 1, 100.00, 5.00),
(23, 23, 'Marketing Fee', 1, 100.00, 5.00),
(24, 24, 'Marketing Fee', 1, 100.00, 5.00),
(25, 25, 'Marketing Fee', 1, 100.00, 5.00),
(26, 26, 'Marketing Fee', 1, 100.00, 5.00),
(27, 27, 'Marketing Fee', 1, 100.00, 5.00),
(28, 28, 'Marketing Fee', 1, 100.00, 5.00),
(29, 29, 'Marketing Fee', 1, 100.00, 5.00),
(30, 30, 'Marketing Fee', 1, 100.00, 5.00),
(31, 31, 'Marketing Fee', 1, 100.00, 5.00),
(32, 32, 'Marketing Fee', 1, 100.00, 5.00),
(33, 33, 'Marketing Fee', 1, 100.00, 5.00),
(34, 34, 'Marketing Fee', 1, 100.00, 5.00),
(35, 35, 'Marketing Fee', 1, 100.00, 5.00),
(36, 36, 'Marketing Fee', 1, 100.00, 5.00),
(37, 37, 'Marketing Fee', 1, 100.00, 5.00),
(38, 38, 'Marketing Fee', 1, 100.00, 5.00),
(39, 39, 'Marketing Fee', 1, 100.00, 5.00),
(40, 40, 'Marketing Fee', 1, 100.00, 5.00),
(41, 41, 'Marketing Fee', 1, 100.00, 5.00),
(42, 42, 'Marketing Fee', 1, 100.00, 5.00),
(43, 43, 'Marketing Fee', 1, 100.00, 5.00),
(44, 44, 'Marketing Fee', 1, 100.00, 5.00),
(45, 45, 'Marketing Fee', 1, 100.00, 5.00),
(46, 46, 'Marketing Fee', 1, 100.00, 5.00),
(47, 47, 'Marketing Fee', 1, 100.00, 5.00),
(48, 48, 'Marketing Fee', 1, 100.00, 5.00);

-- --------------------------------------------------------

--
-- Table structure for table `franchisor_invoice_fee`
--

CREATE TABLE `franchisor_invoice_fee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=>monthly,2=>Yearly',
  `months` text,
  `amount` double(10,2) NOT NULL,
  `vat` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `franchisor_invoice_fee`
--

INSERT INTO `franchisor_invoice_fee` (`id`, `name`, `type`, `months`, `amount`, `vat`, `created_at`, `updated_at`) VALUES
(1, 'Marketing Fee', 1, '', 100.00, 5, '2018-11-22 00:29:47', '2018-12-10 00:13:13');

-- --------------------------------------------------------

--
-- Table structure for table `franchisor_invoice_price`
--

CREATE TABLE `franchisor_invoice_price` (
  `id` int(11) NOT NULL,
  `from_turnover` double(10,2) NOT NULL,
  `to_turnover` double(10,2) NOT NULL,
  `base_fee` double(10,2) NOT NULL,
  `plus_excess` double(10,2) NOT NULL,
  `max_monthly` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `franchisor_invoice_price`
--

INSERT INTO `franchisor_invoice_price` (`id`, `from_turnover`, `to_turnover`, `base_fee`, `plus_excess`, `max_monthly`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0.00, 4000.00, 240.00, 7.00, 240.00, '2018-11-15 03:47:11', '2018-11-15 06:13:29', NULL),
(2, 4001.00, 6000.00, 240.00, 7.00, 380.00, '2018-11-15 03:57:14', '2018-11-15 03:57:14', NULL),
(3, 6001.00, 8000.00, 380.00, 6.50, 510.00, '2018-11-15 03:57:14', '2018-11-15 03:57:14', NULL),
(4, 8001.00, 10000.00, 510.00, 6.00, 630.00, '2018-11-15 03:57:14', '2018-11-15 03:57:14', NULL),
(5, 10001.00, 25000.00, 630.00, 5.00, 1380.00, '2018-11-15 03:57:14', '2018-11-15 03:57:14', NULL),
(6, 25001.00, 50000.00, 1380.00, 4.00, 2380.00, '2018-11-15 03:57:14', '2018-11-15 03:57:14', NULL),
(7, 50001.00, 100000.00, 2380.00, 3.00, 3880.00, '2018-11-15 03:57:14', '2018-11-15 03:57:14', NULL),
(8, 100001.00, 2000000.00, 3880.00, 2.00, 5000.00, '2018-11-15 03:57:14', '2018-11-15 03:57:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `general_setting`
--

CREATE TABLE `general_setting` (
  `id` int(11) NOT NULL,
  `veriable_slug` varchar(100) NOT NULL,
  `setting_name` varchar(255) NOT NULL,
  `setting_value` text,
  `alt_text` varchar(255) DEFAULT NULL,
  `field_type` int(11) DEFAULT '1' COMMENT '1=>Textarea,2=>image,3=>date',
  `display_order` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL COMMENT '1=>Corporate Details, 2=> Contact Details, 3=>Finance Details,4=>Social'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_setting`
--

INSERT INTO `general_setting` (`id`, `veriable_slug`, `setting_name`, `setting_value`, `alt_text`, `field_type`, `display_order`, `type`) VALUES
(1, 'company_name', 'Company Name', 'Driving Miss Daisy', NULL, 1, 1, 1),
(2, 'company_number', 'Company Number', '9999999999999', NULL, 1, 2, 1),
(3, 'registered_office', 'Registered Office', 'Portsmouth PO6 4TRUNITED KINGDOM', '', 1, 3, 1),
(4, 'directors', 'Directors', 'Jhon Deo', NULL, 1, 4, 0),
(5, 'account_no', 'Account Number', '63366391', NULL, 1, 5, 3),
(6, 'lawyers', 'Lawyers', 'Lawyers', NULL, 1, 6, 0),
(7, 'phone_number', 'Main Phone Number', '7059114888', NULL, 1, 7, 2),
(8, 'company_email', 'Main Email Address\n', 'Address', NULL, 1, 8, 2),
(9, 'linkedin', 'Linkedin', 'sdasdas', NULL, 1, 9, 4),
(10, 'instagram', 'Instagram', 'asdasd', NULL, 1, 10, 4),
(11, 'facebook', 'Facebook', 'asdas', NULL, 1, 11, 4),
(12, 'incorporation_date\r\n', 'Date of Incorporation\r\n', '2018-12-15', NULL, 3, NULL, 1),
(13, 'year_end ', 'Company Year End ', 'Company Year End', NULL, 1, NULL, 1),
(14, 'confirmation_statement_date', 'Confirmation Statement Date', 'Confirmation Statement Date', NULL, 1, NULL, 1),
(15, 'business_address', 'Business Address', 'Portsmouth PO6 4TRUNITED KINGDOM', NULL, 1, NULL, 2),
(16, 'account_name', 'Account Name', 'Driving Miss Daisy (UK) Limited', NULL, 1, 5, 3),
(17, 'sort_code\r\n', 'Sort Code\r\n', 'ASA', NULL, 1, 5, 3),
(18, 'vat_number', 'VAT Number', 'VAT number', NULL, 1, 6, 6),
(19, 'vat_registration_date', 'VAT Registration Date', 'VAT number', NULL, 1, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(10) NOT NULL,
  `franchisees_id` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `unit_price` varchar(255) NOT NULL,
  `vat` varchar(255) DEFAULT NULL,
  `amount_gbp` double(10,2) NOT NULL,
  `vat_amount` double(10,2) NOT NULL DEFAULT '0.00',
  `name` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `create_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `franchisees_id`, `invoice_date`, `invoice_number`, `reference`, `description`, `quantity`, `unit_price`, `vat`, `amount_gbp`, `vat_amount`, `name`, `street`, `city`, `postcode`, `country`, `create_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, '2018-11-12', 'INV-01616', 'Driving Miss Daisy W/C 15th Oct.18', '15th Oct.18 11.30am Swindon to Haskins Garden Centre, West End, SO18 3HW Completed by our Malmesbury branch', '1', '137.75', NULL, 137.75, 0.00, NULL, NULL, NULL, NULL, 'Mind for You 5 The Willows Burton-on-the-Wolds Loughborough Leicestershire LE12 5AP UNITED KINGDOM', NULL, '2018-11-08 07:50:48', '2018-11-08 07:59:31', NULL),
(2, 7, '2018-11-07', 'jhkjjh4k56', 'jhjhjj', 'jhjjhhj', '2', '25', NULL, 23.00, 12.00, 'jhkjhk', 'hjjh', 'jhjjh', '121356', 'United Kingdom', 1, '2018-11-13 07:16:07', '2018-11-13 07:16:07', NULL),
(3, 1, '2018-11-09', 'IN-22012', 'Reference', 'asdasd', '2', '10', NULL, 123.00, 10.00, 'Mominul Islam', 'Salt Lake Sector I', 'KOlkata', '700064', 'India', 1, '2018-11-15 04:16:41', '2018-11-15 04:16:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `amount` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `booking_id`, `comment`, `amount`) VALUES
(7, 2, 'Discount', -1000.00),
(10, 4, 'THis is test', 35.55);

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
(128, 'vehicles-tracking-ajax', 'vehicles-tracking-ajax', 'vehicles-tracking-ajax', '2018-09-22 07:57:22', '2018-09-22 07:57:22'),
(129, 'booking.vehicle', 'booking.vehicle', 'booking.vehicle', '2018-10-08 07:37:11', '2018-10-08 07:37:11'),
(130, 'booking.getRepet', 'booking.getRepet', 'booking.getRepet', '2018-10-08 07:37:11', '2018-10-08 07:37:11'),
(131, 'booking.repet-booking', 'booking.repet-booking', 'booking.repet-booking', '2018-10-08 07:37:11', '2018-10-08 07:37:11'),
(132, 'drivers-vehicles.index', 'drivers-vehicles.index', 'drivers-vehicles.index', '2018-10-08 07:37:11', '2018-10-08 07:37:11'),
(133, 'drivers-vehicles.create', 'drivers-vehicles.create', 'drivers-vehicles.create', '2018-10-08 07:37:11', '2018-10-08 07:37:11'),
(134, 'drivers-vehicles.store', 'drivers-vehicles.store', 'drivers-vehicles.store', '2018-10-08 07:37:11', '2018-10-08 07:37:11'),
(135, 'drivers-vehicles.show', 'drivers-vehicles.show', 'drivers-vehicles.show', '2018-10-08 07:37:11', '2018-10-08 07:37:11'),
(136, 'drivers-vehicles.edit', 'drivers-vehicles.edit', 'drivers-vehicles.edit', '2018-10-08 07:37:11', '2018-10-08 07:37:11'),
(137, 'drivers-vehicles.update', 'drivers-vehicles.update', 'drivers-vehicles.update', '2018-10-08 07:37:11', '2018-10-08 07:37:11'),
(138, 'drivers-vehicles.destroy', 'drivers-vehicles.destroy', 'drivers-vehicles.destroy', '2018-10-08 07:37:11', '2018-10-08 07:37:11'),
(139, 'franchisees-price.index', 'franchisees-price.index', 'franchisees-price.index', '2018-10-08 07:37:11', '2018-10-08 07:37:11'),
(140, 'franchisees-price.create', 'franchisees-price.create', 'franchisees-price.create', '2018-10-08 07:37:11', '2018-10-08 07:37:11'),
(141, 'franchisees-price.store', 'franchisees-price.store', 'franchisees-price.store', '2018-10-08 07:37:11', '2018-10-08 07:37:11'),
(142, 'franchisees-price.show', 'franchisees-price.show', 'franchisees-price.show', '2018-10-08 07:37:11', '2018-10-08 07:37:11'),
(143, 'franchisees-price.edit', 'franchisees-price.edit', 'franchisees-price.edit', '2018-10-08 07:37:11', '2018-10-08 07:37:11'),
(144, 'franchisees-price.update', 'franchisees-price.update', 'franchisees-price.update', '2018-10-08 07:37:11', '2018-10-08 07:37:11'),
(145, 'franchisees-price.destroy', 'franchisees-price.destroy', 'franchisees-price.destroy', '2018-10-08 07:37:11', '2018-10-08 07:37:11'),
(146, 'chart-report-year', 'chart-report-year', 'chart-report-year', '2018-11-17 03:21:46', '2018-11-17 03:21:46'),
(147, 'chart-report-month', 'chart-report-month', 'chart-report-month', '2018-11-17 03:21:46', '2018-11-17 03:21:46'),
(148, 'booking.invoice', 'booking.invoice', 'booking.invoice', '2018-11-17 03:21:46', '2018-11-17 03:21:46'),
(149, 'change-payment-status', 'change-payment-status', 'change-payment-status', '2018-11-17 03:21:46', '2018-11-17 03:21:46'),
(150, 'update-booking', 'update-booking', 'update-booking', '2018-11-17 03:21:46', '2018-11-17 03:21:46'),
(151, 'enquiry.index', 'enquiry.index', 'enquiry.index', '2018-11-17 03:21:46', '2018-11-17 03:21:46'),
(152, 'enquiry.create', 'enquiry.create', 'enquiry.create', '2018-11-17 03:21:46', '2018-11-17 03:21:46'),
(153, 'enquiry.store', 'enquiry.store', 'enquiry.store', '2018-11-17 03:21:46', '2018-11-17 03:21:46'),
(154, 'enquiry.show', 'enquiry.show', 'enquiry.show', '2018-11-17 03:21:46', '2018-11-17 03:21:46'),
(155, 'enquiry.edit', 'enquiry.edit', 'enquiry.edit', '2018-11-17 03:21:46', '2018-11-17 03:21:46'),
(156, 'enquiry.update', 'enquiry.update', 'enquiry.update', '2018-11-17 03:21:46', '2018-11-17 03:21:46'),
(157, 'enquiry.destroy', 'enquiry.destroy', 'enquiry.destroy', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(158, 'events.index', 'events.index', 'events.index', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(159, 'events.create', 'events.create', 'events.create', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(160, 'events.store', 'events.store', 'events.store', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(161, 'events.show', 'events.show', 'events.show', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(162, 'events.edit', 'events.edit', 'events.edit', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(163, 'events.update', 'events.update', 'events.update', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(164, 'events.destroy', 'events.destroy', 'events.destroy', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(165, 'event-details', 'event-details', 'event-details', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(166, 'client.index', 'client.index', 'client.index', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(167, 'client.create', 'client.create', 'client.create', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(168, 'client.store', 'client.store', 'client.store', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(169, 'client.show', 'client.show', 'client.show', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(170, 'client.edit', 'client.edit', 'client.edit', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(171, 'client.update', 'client.update', 'client.update', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(172, 'client.destroy', 'client.destroy', 'client.destroy', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(173, 'invoice.index', 'invoice.index', 'invoice.index', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(174, 'invoice.create', 'invoice.create', 'invoice.create', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(175, 'invoice.store', 'invoice.store', 'invoice.store', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(176, 'invoice.show', 'invoice.show', 'invoice.show', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(177, 'invoice.edit', 'invoice.edit', 'invoice.edit', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(178, 'invoice.update', 'invoice.update', 'invoice.update', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(179, 'invoice.destroy', 'invoice.destroy', 'invoice.destroy', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(180, 'invoice.preview', 'invoice.preview', 'invoice.preview', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(181, 'invoice.download', 'invoice.download', 'invoice.download', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(182, 'invoice.markpaid', 'invoice.markpaid', 'invoice.markpaid', '2018-11-17 03:21:47', '2018-11-17 03:21:47'),
(183, 'companyinfo.index', 'companyinfo.index', 'companyinfo.index', '2018-11-17 03:21:48', '2018-11-17 03:21:48'),
(184, 'companyinfo.create', 'companyinfo.create', 'companyinfo.create', '2018-11-17 03:21:48', '2018-11-17 03:21:48'),
(185, 'companyinfo.store', 'companyinfo.store', 'companyinfo.store', '2018-11-17 03:21:48', '2018-11-17 03:21:48'),
(186, 'companyinfo.show', 'companyinfo.show', 'companyinfo.show', '2018-11-17 03:21:48', '2018-11-17 03:21:48'),
(187, 'companyinfo.edit', 'companyinfo.edit', 'companyinfo.edit', '2018-11-17 03:21:48', '2018-11-17 03:21:48'),
(188, 'companyinfo.update', 'companyinfo.update', 'companyinfo.update', '2018-11-17 03:21:48', '2018-11-17 03:21:48'),
(189, 'companyinfo.destroy', 'companyinfo.destroy', 'companyinfo.destroy', '2018-11-17 03:21:48', '2018-11-17 03:21:48'),
(190, 'franchisor-invoice.index', 'franchisor-invoice.index', 'franchisor-invoice.index', '2018-11-17 03:21:48', '2018-11-17 03:21:48'),
(191, 'franchisor-invoice.create', 'franchisor-invoice.create', 'franchisor-invoice.create', '2018-11-17 03:21:48', '2018-11-17 03:21:48'),
(192, 'franchisor-invoice.store', 'franchisor-invoice.store', 'franchisor-invoice.store', '2018-11-17 03:21:48', '2018-11-17 03:21:48'),
(193, 'franchisor-invoice.show', 'franchisor-invoice.show', 'franchisor-invoice.show', '2018-11-17 03:21:48', '2018-11-17 03:21:48'),
(194, 'franchisor-invoice.edit', 'franchisor-invoice.edit', 'franchisor-invoice.edit', '2018-11-17 03:21:48', '2018-11-17 03:21:48'),
(195, 'franchisor-invoice.update', 'franchisor-invoice.update', 'franchisor-invoice.update', '2018-11-17 03:21:48', '2018-11-17 03:21:48'),
(196, 'franchisor-invoice.destroy', 'franchisor-invoice.destroy', 'franchisor-invoice.destroy', '2018-11-17 03:21:48', '2018-11-17 03:21:48'),
(197, 'franchisor-invoiceprice.index', 'franchisor-invoiceprice.index', 'franchisor-invoiceprice.index', '2018-11-17 03:21:48', '2018-11-17 03:21:48'),
(198, 'franchisor-invoiceprice.create', 'franchisor-invoiceprice.create', 'franchisor-invoiceprice.create', '2018-11-17 03:21:48', '2018-11-17 03:21:48'),
(199, 'franchisor-invoiceprice.store', 'franchisor-invoiceprice.store', 'franchisor-invoiceprice.store', '2018-11-17 03:21:48', '2018-11-17 03:21:48'),
(200, 'franchisor-invoiceprice.show', 'franchisor-invoiceprice.show', 'franchisor-invoiceprice.show', '2018-11-17 03:21:48', '2018-11-17 03:21:48'),
(201, 'franchisor-invoiceprice.edit', 'franchisor-invoiceprice.edit', 'franchisor-invoiceprice.edit', '2018-11-17 03:21:48', '2018-11-17 03:21:48'),
(202, 'franchisor-invoiceprice.update', 'franchisor-invoiceprice.update', 'franchisor-invoiceprice.update', '2018-11-17 03:21:48', '2018-11-17 03:21:48'),
(203, 'franchisor-invoiceprice.destroy', 'franchisor-invoiceprice.destroy', 'franchisor-invoiceprice.destroy', '2018-11-17 03:21:48', '2018-11-17 03:21:48'),
(204, 'invoice-price-details', 'invoice-price-details', 'invoice-price-details', '2018-11-17 03:21:48', '2018-11-17 03:21:48'),
(205, 'franchisor-invoice-pdf', 'franchisor-invoice-pdf', 'franchisor-invoice-pdf', '2018-11-17 03:21:48', '2018-11-17 03:21:48'),
(206, 'driver-calender', 'driver-calender', 'driver-calender', '2018-11-17 03:21:48', '2018-11-17 03:21:48'),
(207, 'month-report', 'month-report', 'month-report', '2018-11-17 03:21:49', '2018-11-17 03:21:49'),
(208, 'day-report', 'day-report', 'day-report', '2018-11-17 03:21:49', '2018-11-17 03:21:49'),
(209, 'import', 'import', 'import', '2018-11-17 03:21:49', '2018-11-17 03:21:49'),
(210, 'import_parse', 'import_parse', 'import_parse', '2018-11-17 03:21:49', '2018-11-17 03:21:49'),
(211, 'teams.index', 'teams.index', 'teams.index', '2018-11-28 08:19:32', '2018-11-28 08:19:32'),
(212, 'teams.create', 'teams.create', 'teams.create', '2018-11-28 08:19:32', '2018-11-28 08:19:32'),
(213, 'teams.store', 'teams.store', 'teams.store', '2018-11-28 08:19:32', '2018-11-28 08:19:32'),
(214, 'teams.show', 'teams.show', 'teams.show', '2018-11-28 08:19:32', '2018-11-28 08:19:32'),
(215, 'teams.edit', 'teams.edit', 'teams.edit', '2018-11-28 08:19:33', '2018-11-28 08:19:33'),
(216, 'teams.update', 'teams.update', 'teams.update', '2018-11-28 08:19:33', '2018-11-28 08:19:33'),
(217, 'teams.destroy', 'teams.destroy', 'teams.destroy', '2018-11-28 08:19:33', '2018-11-28 08:19:33'),
(218, 'franchisor-fees-create', 'franchisor-fees-create', 'franchisor-fees-create', '2018-11-28 08:19:33', '2018-11-28 08:19:33'),
(219, 'franchisor-fees-edit', 'franchisor-fees-edit', 'franchisor-fees-edit', '2018-11-28 08:19:33', '2018-11-28 08:19:33'),
(220, 'franchisor-fees-store', 'franchisor-fees-store', 'franchisor-fees-store', '2018-11-28 08:19:33', '2018-11-28 08:19:33'),
(221, 'franchisor-fees-update', 'franchisor-fees-update', 'franchisor-fees-update', '2018-11-28 08:19:33', '2018-11-28 08:19:33'),
(222, 'franchisor-fees-delete', 'franchisor-fees-delete', 'franchisor-fees-delete', '2018-11-28 08:19:33', '2018-11-28 08:19:33'),
(223, 'unisharp.lfm.show', 'unisharp.lfm.show', 'unisharp.lfm.show', '2018-12-03 05:41:17', '2018-12-03 05:41:17'),
(224, 'unisharp.lfm.getErrors', 'unisharp.lfm.getErrors', 'unisharp.lfm.getErrors', '2018-12-03 05:41:17', '2018-12-03 05:41:17'),
(225, 'unisharp.lfm.upload', 'unisharp.lfm.upload', 'unisharp.lfm.upload', '2018-12-03 05:41:17', '2018-12-03 05:41:17'),
(226, 'unisharp.lfm.getItems', 'unisharp.lfm.getItems', 'unisharp.lfm.getItems', '2018-12-03 05:41:17', '2018-12-03 05:41:17'),
(227, 'unisharp.lfm.getAddfolder', 'unisharp.lfm.getAddfolder', 'unisharp.lfm.getAddfolder', '2018-12-03 05:41:17', '2018-12-03 05:41:17'),
(228, 'unisharp.lfm.getDeletefolder', 'unisharp.lfm.getDeletefolder', 'unisharp.lfm.getDeletefolder', '2018-12-03 05:41:17', '2018-12-03 05:41:17'),
(229, 'unisharp.lfm.getFolders', 'unisharp.lfm.getFolders', 'unisharp.lfm.getFolders', '2018-12-03 05:41:17', '2018-12-03 05:41:17'),
(230, 'unisharp.lfm.getCrop', 'unisharp.lfm.getCrop', 'unisharp.lfm.getCrop', '2018-12-03 05:41:17', '2018-12-03 05:41:17'),
(231, 'unisharp.lfm.getCropimage', 'unisharp.lfm.getCropimage', 'unisharp.lfm.getCropimage', '2018-12-03 05:41:17', '2018-12-03 05:41:17'),
(232, 'unisharp.lfm.getRename', 'unisharp.lfm.getRename', 'unisharp.lfm.getRename', '2018-12-03 05:41:17', '2018-12-03 05:41:17'),
(233, 'unisharp.lfm.getResize', 'unisharp.lfm.getResize', 'unisharp.lfm.getResize', '2018-12-03 05:41:17', '2018-12-03 05:41:17'),
(234, 'unisharp.lfm.performResize', 'unisharp.lfm.performResize', 'unisharp.lfm.performResize', '2018-12-03 05:41:17', '2018-12-03 05:41:17'),
(235, 'unisharp.lfm.getDownload', 'unisharp.lfm.getDownload', 'unisharp.lfm.getDownload', '2018-12-03 05:41:17', '2018-12-03 05:41:17'),
(236, 'unisharp.lfm.getDelete', 'unisharp.lfm.getDelete', 'unisharp.lfm.getDelete', '2018-12-03 05:41:17', '2018-12-03 05:41:17'),
(237, 'unisharp.lfm.', 'unisharp.lfm.', 'unisharp.lfm.', '2018-12-03 05:41:17', '2018-12-03 05:41:17'),
(238, 'franchisor-invoice.createbulk', 'franchisor-invoice.createbulk', 'franchisor-invoice.createbulk', '2018-12-03 05:41:17', '2018-12-03 05:41:17'),
(239, 'franchisor-invoice.createbulk-post', 'franchisor-invoice.createbulk-post', 'franchisor-invoice.createbulk-post', '2018-12-03 05:41:17', '2018-12-03 05:41:17');

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
(128, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3),
(39, 3),
(40, 3),
(41, 3),
(42, 3),
(43, 3),
(44, 3),
(45, 3),
(46, 3),
(47, 3),
(48, 3),
(49, 3),
(50, 3),
(51, 3),
(52, 3),
(53, 3),
(54, 3),
(55, 3),
(56, 3),
(57, 3),
(58, 3),
(59, 3),
(60, 3),
(61, 3),
(62, 3),
(63, 3),
(64, 3),
(65, 3),
(66, 3),
(67, 3),
(68, 3),
(69, 3),
(70, 3),
(71, 3),
(72, 3),
(73, 3),
(74, 3),
(75, 3),
(76, 3),
(77, 3),
(78, 3),
(79, 3),
(80, 3),
(81, 3),
(82, 3),
(83, 3),
(84, 3),
(85, 3),
(86, 3),
(87, 3),
(88, 3),
(89, 3),
(90, 3),
(91, 3),
(92, 3),
(93, 3),
(94, 3),
(95, 3),
(96, 3),
(97, 3),
(98, 3),
(99, 3),
(100, 3),
(101, 3),
(102, 3),
(103, 3),
(104, 3),
(105, 3),
(106, 3),
(107, 3),
(108, 3),
(109, 3),
(110, 3),
(111, 3),
(112, 3),
(113, 3),
(114, 3),
(115, 3),
(116, 3),
(117, 3),
(118, 3),
(119, 3),
(120, 3),
(121, 3),
(122, 3),
(123, 3),
(124, 3),
(125, 3),
(126, 3),
(127, 3),
(128, 3),
(129, 3),
(130, 3),
(131, 3),
(132, 3),
(133, 3),
(134, 3),
(135, 3),
(136, 3),
(137, 3),
(138, 3),
(139, 3),
(140, 3),
(141, 3),
(142, 3),
(143, 3),
(144, 3),
(145, 3),
(146, 3),
(147, 3),
(148, 3),
(149, 3),
(150, 3),
(151, 3),
(152, 3),
(153, 3),
(154, 3),
(155, 3),
(156, 3),
(157, 3),
(158, 3),
(159, 3),
(160, 3),
(161, 3),
(162, 3),
(163, 3),
(164, 3),
(165, 3),
(166, 3),
(167, 3),
(168, 3),
(169, 3),
(170, 3),
(171, 3),
(172, 3),
(173, 3),
(174, 3),
(175, 3),
(176, 3),
(177, 3),
(178, 3),
(179, 3),
(180, 3),
(181, 3),
(182, 3),
(183, 3),
(184, 3),
(185, 3),
(186, 3),
(187, 3),
(188, 3),
(189, 3),
(190, 3),
(191, 3),
(192, 3),
(193, 3),
(194, 3),
(195, 3),
(196, 3),
(197, 3),
(198, 3),
(199, 3),
(200, 3),
(201, 3),
(202, 3),
(203, 3),
(204, 3),
(205, 3),
(206, 3),
(207, 3),
(208, 3),
(209, 3),
(210, 3),
(211, 3),
(212, 3),
(213, 3),
(214, 3),
(215, 3),
(216, 3),
(217, 3),
(218, 3),
(219, 3),
(220, 3),
(221, 3),
(222, 3),
(223, 3),
(224, 3),
(225, 3),
(226, 3),
(227, 3),
(228, 3),
(229, 3),
(230, 3),
(231, 3),
(232, 3),
(233, 3),
(234, 3),
(235, 3),
(236, 3),
(237, 3),
(238, 3),
(239, 3),
(4, 4);

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
(1, 1, 1, 'Sealdah Railway Station, Sealdah, Raja Bazar, Calcutta, West Bengal, India', 8.89, 41, '2018-12-10 01:49:36', '2018-12-10 01:49:36', NULL),
(2, 1, 99, 'Kolkata Railway Station (Chitpur Station), Belgachia, Calcutta, West Bengal, India', 3.48, 24, '2018-12-10 01:49:36', '2018-12-10 01:49:36', NULL),
(3, 2, 1, 'Andhra Pradesh, India', 858.03, 1604, '2018-12-10 04:39:55', '2018-12-10 04:39:55', NULL),
(4, 2, 99, 'Salem, Tamil Nadu, India', 442.04, 721, '2018-12-10 04:39:55', '2018-12-10 04:39:55', NULL),
(11, 3, 1, 'Andhra Pradesh, India', 858.03, 1604, '2018-12-10 05:08:26', '2018-12-10 05:08:26', NULL),
(12, 3, 99, 'Araku, Andhra Pradesh, India', 362.23, 723, '2018-12-10 05:08:26', '2018-12-10 05:08:26', NULL),
(13, 6, 1, 'Andhra Pradesh, India', 851.03, 1581, '2018-12-13 00:28:03', '2018-12-13 00:28:03', NULL),
(14, 6, 99, 'Adyar, Chennai, Tamil Nadu, India', 241.65, 432, '2018-12-13 00:28:03', '2018-12-13 00:28:03', NULL),
(17, 4, 1, 'Sealdah Railway Station, Sealdah, Raja Bazar, Calcutta, West Bengal, India', 8.89, 41, '2018-12-13 00:57:20', '2018-12-13 00:57:20', NULL),
(18, 4, 99, 'Kolkata Railway Station (Chitpur Station), Belgachia, Calcutta, West Bengal, India', 3.48, 24, '2018-12-13 00:57:20', '2018-12-13 00:57:20', NULL),
(19, 5, 1, 'Lets Gear Up, 27th Main Road, 1st Sector, HSR Layout, Bengaluru, Karnataka, India', 1176.33, 2150, '2018-12-14 04:04:02', '2018-12-14 04:04:02', NULL),
(20, 5, 99, 'Faridabad, Haryana, India', 1353.68, 2173, '2018-12-14 04:04:02', '2018-12-14 04:04:02', NULL),
(21, 6, 1, 'Lets Gear Up, 27th Main Road, 1st Sector, HSR Layout, Bengaluru, Karnataka, India', 1176.33, 2150, '2018-12-14 05:39:20', '2018-12-14 05:39:20', NULL),
(22, 6, 99, 'Faridabad, Haryana, India', 1353.68, 2173, '2018-12-14 05:39:20', '2018-12-14 05:39:20', NULL),
(23, 7, 1, 'Andhra Pradesh, India', 858.10, 1603, '2018-12-14 06:04:52', '2018-12-14 06:04:52', NULL),
(24, 7, 99, 'West Bengal, India', 850.28, 1638, '2018-12-14 06:04:52', '2018-12-14 06:04:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `franchisees_id` int(11) DEFAULT '0',
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
(1, 0, 'Admin', 'Admin', 'Admin', '2018-09-22 04:49:13', '2018-09-22 04:49:13'),
(2, 1, 'Test Role', 'd', 'fg', '2018-09-24 01:12:10', '2018-09-24 01:12:10'),
(3, 0, 'sdfsd', 'sdfsdf', 'sdfsdf', '2018-12-05 08:38:58', '2018-12-05 08:38:58'),
(4, 0, 'asd', 'asd', 'asd', '2018-12-06 04:03:09', '2018-12-06 04:03:09');

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
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `show_company_details` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `show_company_details`, `name`, `role`, `email`, `phone`, `photo`, `bio`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 'MD HASIBUR RAHAMAN', 'DEveloper', 'rahamanh939@gmail.com', '7059114888', '1543413017-5bfe9d1952ee1.jpg', '<p>Test</p>', '2018-11-28 08:20:17', '2018-12-13 05:19:34', NULL),
(3, 0, 'Manidipa', 'Developer', 'sdfsdfsd@gmail.co', '445454545', '1544698147-5c1239232b4f8.png', '<p>adasd</p>', '2018-12-13 05:19:07', '2018-12-14 02:38:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `towns`
--

CREATE TABLE `towns` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `towns`
--

INSERT INTO `towns` (`id`, `name`) VALUES
(1, 'Aberaeron'),
(2, 'Aberdare'),
(3, 'Aberdeen'),
(4, 'Aberfeldy'),
(5, 'Abergavenny'),
(6, 'Abergele'),
(7, 'Abertillery'),
(8, 'Aberystwyth'),
(9, 'Abingdon'),
(10, 'Accrington'),
(11, 'Adlington'),
(12, 'Airdrie'),
(13, 'Alcester'),
(14, 'Aldeburgh'),
(15, 'Aldershot'),
(16, 'Aldridge'),
(17, 'Alford'),
(18, 'Alfreton'),
(19, 'Alloa'),
(20, 'Alnwick'),
(21, 'Alsager'),
(22, 'Alston'),
(23, 'Amesbury'),
(24, 'Amlwch'),
(25, 'Ammanford'),
(26, 'Ampthill'),
(27, 'Andover'),
(28, 'Annan'),
(29, 'Antrim'),
(30, 'Appleby in Westmorland'),
(31, 'Arbroath'),
(32, 'Armagh'),
(33, 'Arundel'),
(34, 'Ashbourne'),
(35, 'Ashburton'),
(36, 'Ashby de la Zouch'),
(37, 'Ashford'),
(38, 'Ashington'),
(39, 'Ashton in Makerfield'),
(40, 'Atherstone'),
(41, 'Auchtermuchty'),
(42, 'Axminster'),
(43, 'Aylesbury'),
(44, 'Aylsham'),
(45, 'Ayr'),
(46, 'Bacup'),
(47, 'Bakewell'),
(48, 'Bala'),
(49, 'Ballater'),
(50, 'Ballycastle'),
(51, 'Ballyclare'),
(52, 'Ballymena'),
(53, 'Ballymoney'),
(54, 'Ballynahinch'),
(55, 'Banbridge'),
(56, 'Banbury'),
(57, 'Banchory'),
(58, 'Banff'),
(59, 'Bangor'),
(60, 'Barmouth'),
(61, 'Barnard Castle'),
(62, 'Barnet'),
(63, 'Barnoldswick'),
(64, 'Barnsley'),
(65, 'Barnstaple'),
(66, 'Barrhead'),
(67, 'Barrow in Furness'),
(68, 'Barry'),
(69, 'Barton upon Humber'),
(70, 'Basildon'),
(71, 'Basingstoke'),
(72, 'Bath'),
(73, 'Bathgate'),
(74, 'Batley'),
(75, 'Battle'),
(76, 'Bawtry'),
(77, 'Beaconsfield'),
(78, 'Bearsden'),
(79, 'Beaumaris'),
(80, 'Bebington'),
(81, 'Beccles'),
(82, 'Bedale'),
(83, 'Bedford'),
(84, 'Bedlington'),
(85, 'Bedworth'),
(86, 'Beeston'),
(87, 'Bellshill'),
(88, 'Belper'),
(89, 'Berkhamsted'),
(90, 'Berwick upon Tweed'),
(91, 'Betws y Coed'),
(92, 'Beverley'),
(93, 'Bewdley'),
(94, 'Bexhill on Sea'),
(95, 'Bicester'),
(96, 'Biddulph'),
(97, 'Bideford'),
(98, 'Biggar'),
(99, 'Biggleswade'),
(100, 'Billericay'),
(101, 'Bilston'),
(102, 'Bingham'),
(103, 'Birkenhead'),
(104, 'Birmingham'),
(105, 'Bishop Auckland'),
(106, 'Blackburn'),
(107, 'Blackheath'),
(108, 'Blackpool'),
(109, 'Blaenau Ffestiniog'),
(110, 'Blandford Forum'),
(111, 'Bletchley'),
(112, 'Bloxwich'),
(113, 'Blyth'),
(114, 'Bodmin'),
(115, 'Bognor Regis'),
(116, 'Bollington'),
(117, 'Bolsover'),
(118, 'Bolton'),
(119, 'Bootle'),
(120, 'Borehamwood'),
(121, 'Boston'),
(122, 'Bourne'),
(123, 'Bournemouth'),
(124, 'Brackley'),
(125, 'Bracknell'),
(126, 'Bradford'),
(127, 'Bradford on Avon'),
(128, 'Brading'),
(129, 'Bradley Stoke'),
(130, 'Bradninch'),
(131, 'Braintree'),
(132, 'Brechin'),
(133, 'Brecon'),
(134, 'Brentwood'),
(135, 'Bridge of Allan'),
(136, 'Bridgend'),
(137, 'Bridgnorth'),
(138, 'Bridgwater'),
(139, 'Bridlington'),
(140, 'Bridport'),
(141, 'Brigg'),
(142, 'Brighouse'),
(143, 'Brightlingsea'),
(144, 'Brighton'),
(145, 'Bristol'),
(146, 'Brixham'),
(147, 'Broadstairs'),
(148, 'Bromsgrove'),
(149, 'Bromyard'),
(150, 'Brynmawr'),
(151, 'Buckfastleigh'),
(152, 'Buckie'),
(153, 'Buckingham'),
(154, 'Buckley'),
(155, 'Bude'),
(156, 'Budleigh Salterton'),
(157, 'Builth Wells'),
(158, 'Bungay'),
(159, 'Buntingford'),
(160, 'Burford'),
(161, 'Burgess Hill'),
(162, 'Burnham on Crouch'),
(163, 'Burnham on Sea'),
(164, 'Burnley'),
(165, 'Burntisland'),
(166, 'Burntwood'),
(167, 'Burry Port'),
(168, 'Burton Latimer'),
(169, 'Bury'),
(170, 'Bushmills'),
(171, 'Buxton'),
(172, 'Caernarfon'),
(173, 'Caerphilly'),
(174, 'Caistor'),
(175, 'Caldicot'),
(176, 'Callander'),
(177, 'Calne'),
(178, 'Camberley'),
(179, 'Camborne'),
(180, 'Cambridge'),
(181, 'Camelford'),
(182, 'Campbeltown'),
(183, 'Cannock'),
(184, 'Canterbury'),
(185, 'Cardiff'),
(186, 'Cardigan'),
(187, 'Carlisle'),
(188, 'Carluke'),
(189, 'Carmarthen'),
(190, 'Carnforth'),
(191, 'Carnoustie'),
(192, 'Carrickfergus'),
(193, 'Carterton'),
(194, 'Castle Douglas'),
(195, 'Castlederg'),
(196, 'Castleford'),
(197, 'Castlewellan'),
(198, 'Chard'),
(199, 'Charlbury'),
(200, 'Chatham'),
(201, 'Chatteris'),
(202, 'Chelmsford'),
(203, 'Cheltenham'),
(204, 'Chepstow'),
(205, 'Chesham'),
(206, 'Cheshunt'),
(207, 'Chester'),
(208, 'Chester le Street'),
(209, 'Chesterfield'),
(210, 'Chichester'),
(211, 'Chippenham'),
(212, 'Chipping Campden'),
(213, 'Chipping Norton'),
(214, 'Chipping Sodbury'),
(215, 'Chorley'),
(216, 'Christchurch'),
(217, 'Church Stretton'),
(218, 'Cinderford'),
(219, 'Cirencester'),
(220, 'Clacton on Sea'),
(221, 'Cleckheaton'),
(222, 'Cleethorpes'),
(223, 'Clevedon'),
(224, 'Clitheroe'),
(225, 'Clogher'),
(226, 'Clydebank'),
(227, 'Coalisland'),
(228, 'Coalville'),
(229, 'Coatbridge'),
(230, 'Cockermouth'),
(231, 'Coggeshall'),
(232, 'Colchester'),
(233, 'Coldstream'),
(234, 'Coleraine'),
(235, 'Coleshill'),
(236, 'Colne'),
(237, 'Colwyn Bay'),
(238, 'Comber'),
(239, 'Congleton'),
(240, 'Conwy'),
(241, 'Cookstown'),
(242, 'Corbridge'),
(243, 'Corby'),
(244, 'Coventry'),
(245, 'Cowbridge'),
(246, 'Cowdenbeath'),
(247, 'Cowes'),
(248, 'Craigavon'),
(249, 'Cramlington'),
(250, 'Crawley'),
(251, 'Crayford'),
(252, 'Crediton'),
(253, 'Crewe'),
(254, 'Crewkerne'),
(255, 'Criccieth'),
(256, 'Crickhowell'),
(257, 'Crieff'),
(258, 'Cromarty'),
(259, 'Cromer'),
(260, 'Crowborough'),
(261, 'Crowthorne'),
(262, 'Crumlin'),
(263, 'Cuckfield'),
(264, 'Cullen'),
(265, 'Cullompton'),
(266, 'Cumbernauld'),
(267, 'Cupar'),
(268, 'Cwmbran'),
(269, 'Dalbeattie'),
(270, 'Dalkeith'),
(271, 'Darlington'),
(272, 'Dartford'),
(273, 'Dartmouth'),
(274, 'Darwen'),
(275, 'Daventry'),
(276, 'Dawlish'),
(277, 'Deal'),
(278, 'Denbigh'),
(279, 'Denton'),
(280, 'Derby'),
(281, 'Dereham'),
(282, 'Devizes'),
(283, 'Dewsbury'),
(284, 'Didcot'),
(285, 'Dingwall'),
(286, 'Dinnington'),
(287, 'Diss'),
(288, 'Dolgellau'),
(289, 'Donaghadee'),
(290, 'Doncaster'),
(291, 'Dorchester'),
(292, 'Dorking'),
(293, 'Dornoch'),
(294, 'Dover'),
(295, 'Downham Market'),
(296, 'Downpatrick'),
(297, 'Driffield'),
(298, 'Dronfield'),
(299, 'Droylsden'),
(300, 'Dudley'),
(301, 'Dufftown'),
(302, 'Dukinfield'),
(303, 'Dumbarton'),
(304, 'Dumfries'),
(305, 'Dunbar'),
(306, 'Dunblane'),
(307, 'Dundee'),
(308, 'Dunfermline'),
(309, 'Dungannon'),
(310, 'Dunoon'),
(311, 'Duns'),
(312, 'Dunstable'),
(313, 'Durham'),
(314, 'Dursley'),
(315, 'Easingwold'),
(316, 'East Grinstead'),
(317, 'East Kilbride'),
(318, 'Eastbourne'),
(319, 'Eastleigh'),
(320, 'Eastwood'),
(321, 'Ebbw Vale'),
(322, 'Edenbridge'),
(323, 'Edinburgh'),
(324, 'Egham'),
(325, 'Elgin'),
(326, 'Ellesmere'),
(327, 'Ellesmere Port'),
(328, 'Ely'),
(329, 'Enniskillen'),
(330, 'Epping'),
(331, 'Epsom'),
(332, 'Erith'),
(333, 'Esher'),
(334, 'Evesham'),
(335, 'Exeter'),
(336, 'Exmouth'),
(337, 'Eye'),
(338, 'Eyemouth'),
(339, 'Failsworth'),
(340, 'Fairford'),
(341, 'Fakenham'),
(342, 'Falkirk'),
(343, 'Falkland'),
(344, 'Falmouth'),
(345, 'Fareham'),
(346, 'Faringdon'),
(347, 'Farnborough'),
(348, 'Farnham'),
(349, 'Farnworth'),
(350, 'Faversham'),
(351, 'Felixstowe'),
(352, 'Ferndown'),
(353, 'Filey'),
(354, 'Fintona'),
(355, 'Fishguard'),
(356, 'Fivemiletown'),
(357, 'Fleet'),
(358, 'Fleetwood'),
(359, 'Flint'),
(360, 'Flitwick'),
(361, 'Folkestone'),
(362, 'Fordingbridge'),
(363, 'Forfar'),
(364, 'Forres'),
(365, 'Fort William'),
(366, 'Fowey'),
(367, 'Framlingham'),
(368, 'Fraserburgh'),
(369, 'Frodsham'),
(370, 'Frome'),
(371, 'Gainsborough'),
(372, 'Galashiels'),
(373, 'Gateshead'),
(374, 'Gillingham'),
(375, 'Glasgow'),
(376, 'Glastonbury'),
(377, 'Glossop'),
(378, 'Gloucester'),
(379, 'Godalming'),
(380, 'Godmanchester'),
(381, 'Goole'),
(382, 'Gorseinon'),
(383, 'Gosport'),
(384, 'Gourock'),
(385, 'Grange over Sands'),
(386, 'Grangemouth'),
(387, 'Grantham'),
(388, 'Grantown on Spey'),
(389, 'Gravesend'),
(390, 'Grays'),
(391, 'Great Yarmouth'),
(392, 'Greenock'),
(393, 'Grimsby'),
(394, 'Guildford'),
(395, 'Haddington'),
(396, 'Hadleigh'),
(397, 'Hailsham'),
(398, 'Halesowen'),
(399, 'Halesworth'),
(400, 'Halifax'),
(401, 'Halstead'),
(402, 'Haltwhistle'),
(403, 'Hamilton'),
(404, 'Harlow'),
(405, 'Harpenden'),
(406, 'Harrogate'),
(407, 'Hartlepool'),
(408, 'Harwich'),
(409, 'Haslemere'),
(410, 'Hastings'),
(411, 'Hatfield'),
(412, 'Havant'),
(413, 'Haverfordwest'),
(414, 'Haverhill'),
(415, 'Hawarden'),
(416, 'Hawick'),
(417, 'Hay on Wye'),
(418, 'Hayle'),
(419, 'Haywards Heath'),
(420, 'Heanor'),
(421, 'Heathfield'),
(422, 'Hebden Bridge'),
(423, 'Helensburgh'),
(424, 'Helston'),
(425, 'Hemel Hempstead'),
(426, 'Henley on Thames'),
(427, 'Hereford'),
(428, 'Herne Bay'),
(429, 'Hertford'),
(430, 'Hessle'),
(431, 'Heswall'),
(432, 'Hexham'),
(433, 'High Wycombe'),
(434, 'Higham Ferrers'),
(435, 'Highworth'),
(436, 'Hinckley'),
(437, 'Hitchin'),
(438, 'Hoddesdon'),
(439, 'Holmfirth'),
(440, 'Holsworthy'),
(441, 'Holyhead'),
(442, 'Holywell'),
(443, 'Honiton'),
(444, 'Horley'),
(445, 'Horncastle'),
(446, 'Hornsea'),
(447, 'Horsham'),
(448, 'Horwich'),
(449, 'Houghton le Spring'),
(450, 'Hove'),
(451, 'Howden'),
(452, 'Hoylake'),
(453, 'Hucknall'),
(454, 'Huddersfield'),
(455, 'Hungerford'),
(456, 'Hunstanton'),
(457, 'Huntingdon'),
(458, 'Huntly'),
(459, 'Hyde'),
(460, 'Hythe'),
(461, 'Ilford'),
(462, 'Ilfracombe'),
(463, 'Ilkeston'),
(464, 'Ilkley'),
(465, 'Ilminster'),
(466, 'Innerleithen'),
(467, 'Inveraray'),
(468, 'Inverkeithing'),
(469, 'Inverness'),
(470, 'Inverurie'),
(471, 'Ipswich'),
(472, 'Irthlingborough'),
(473, 'Irvine'),
(474, 'Ivybridge'),
(475, 'Jarrow'),
(476, 'Jedburgh'),
(477, 'Johnstone'),
(478, 'Keighley'),
(479, 'Keith'),
(480, 'Kelso'),
(481, 'Kempston'),
(482, 'Kendal'),
(483, 'Kenilworth'),
(484, 'Kesgrave'),
(485, 'Keswick'),
(486, 'Kettering'),
(487, 'Keynsham'),
(488, 'Kidderminster'),
(489, 'Kilbarchan'),
(490, 'Kilkeel'),
(491, 'Killyleagh'),
(492, 'Kilmarnock'),
(493, 'Kilwinning'),
(494, 'Kinghorn'),
(495, 'Kingsbridge'),
(496, 'Kington'),
(497, 'Kingussie'),
(498, 'Kinross'),
(499, 'Kintore'),
(500, 'Kirkby'),
(501, 'Kirkby Lonsdale'),
(502, 'Kirkcaldy'),
(503, 'Kirkcudbright'),
(504, 'Kirkham'),
(505, 'Kirkwall'),
(506, 'Kirriemuir'),
(507, 'Knaresborough'),
(508, 'Knighton'),
(509, 'Knutsford'),
(510, 'Ladybank'),
(511, 'Lampeter'),
(512, 'Lanark'),
(513, 'Lancaster'),
(514, 'Langholm'),
(515, 'Largs'),
(516, 'Larne'),
(517, 'Laugharne'),
(518, 'Launceston'),
(519, 'Laurencekirk'),
(520, 'Leamington Spa'),
(521, 'Leatherhead'),
(522, 'Ledbury'),
(523, 'Leeds'),
(524, 'Leek'),
(525, 'Leicester'),
(526, 'Leighton Buzzard'),
(527, 'Leiston'),
(528, 'Leominster'),
(529, 'Lerwick'),
(530, 'Letchworth'),
(531, 'Leven'),
(532, 'Lewes'),
(533, 'Leyland'),
(534, 'Lichfield'),
(535, 'Limavady'),
(536, 'Lincoln'),
(537, 'Linlithgow'),
(538, 'Lisburn'),
(539, 'Liskeard'),
(540, 'Lisnaskea'),
(541, 'Littlehampton'),
(542, 'Liverpool'),
(543, 'Llandeilo'),
(544, 'Llandovery'),
(545, 'Llandrindod Wells'),
(546, 'Llandudno'),
(547, 'Llanelli'),
(548, 'Llanfyllin'),
(549, 'Llangollen'),
(550, 'Llanidloes'),
(551, 'Llanrwst'),
(552, 'Llantrisant'),
(553, 'Llantwit Major'),
(554, 'Llanwrtyd Wells'),
(555, 'Loanhead'),
(556, 'Lochgilphead'),
(557, 'Lockerbie'),
(558, 'Londonderry'),
(559, 'Long Eaton'),
(560, 'Longridge'),
(561, 'Looe'),
(562, 'Lossiemouth'),
(563, 'Lostwithiel'),
(564, 'Loughborough'),
(565, 'Loughton'),
(566, 'Louth'),
(567, 'Lowestoft'),
(568, 'Ludlow'),
(569, 'Lurgan'),
(570, 'Luton'),
(571, 'Lutterworth'),
(572, 'Lydd'),
(573, 'Lydney'),
(574, 'Lyme Regis'),
(575, 'Lymington'),
(576, 'Lynton'),
(577, 'Mablethorpe'),
(578, 'Macclesfield'),
(579, 'Machynlleth'),
(580, 'Maesteg'),
(581, 'Magherafelt'),
(582, 'Maidenhead'),
(583, 'Maidstone'),
(584, 'Maldon'),
(585, 'Malmesbury'),
(586, 'Malton'),
(587, 'Malvern'),
(588, 'Manchester'),
(589, 'Manningtree'),
(590, 'Mansfield'),
(591, 'March'),
(592, 'Margate'),
(593, 'Market Deeping'),
(594, 'Market Drayton'),
(595, 'Market Harborough'),
(596, 'Market Rasen'),
(597, 'Market Weighton'),
(598, 'Markethill'),
(599, 'Markinch'),
(600, 'Marlborough'),
(601, 'Marlow'),
(602, 'Maryport'),
(603, 'Matlock'),
(604, 'Maybole'),
(605, 'Melksham'),
(606, 'Melrose'),
(607, 'Melton Mowbray'),
(608, 'Merthyr Tydfil'),
(609, 'Mexborough'),
(610, 'Middleham'),
(611, 'Middlesbrough'),
(612, 'Middlewich'),
(613, 'Midhurst'),
(614, 'Midsomer Norton'),
(615, 'Milford Haven'),
(616, 'Milngavie'),
(617, 'Milton Keynes'),
(618, 'Minehead'),
(619, 'Moffat'),
(620, 'Mold'),
(621, 'Monifieth'),
(622, 'Monmouth'),
(623, 'Montgomery'),
(624, 'Montrose'),
(625, 'Morecambe'),
(626, 'Moreton in Marsh'),
(627, 'Moretonhampstead'),
(628, 'Morley'),
(629, 'Morpeth'),
(630, 'Motherwell'),
(631, 'Musselburgh'),
(632, 'Nailsea'),
(633, 'Nailsworth'),
(634, 'Nairn'),
(635, 'Nantwich'),
(636, 'Narberth'),
(637, 'Neath'),
(638, 'Needham Market'),
(639, 'Neston'),
(640, 'New Mills'),
(641, 'New Milton'),
(642, 'Newbury'),
(643, 'Newcastle'),
(644, 'Newcastle Emlyn'),
(645, 'Newcastle upon Tyne'),
(646, 'Newent'),
(647, 'Newhaven'),
(648, 'Newmarket'),
(649, 'Newport'),
(650, 'Newport Pagnell'),
(651, 'Newport on Tay'),
(652, 'Newquay'),
(653, 'Newry'),
(654, 'Newton Abbot'),
(655, 'Newton Aycliffe'),
(656, 'Newton Stewart'),
(657, 'Newton le Willows'),
(658, 'Newtown'),
(659, 'Newtownabbey'),
(660, 'Newtownards'),
(661, 'Normanton'),
(662, 'North Berwick'),
(663, 'North Walsham'),
(664, 'Northallerton'),
(665, 'Northampton'),
(666, 'Northwich'),
(667, 'Norwich'),
(668, 'Nottingham'),
(669, 'Nuneaton'),
(670, 'Oakham'),
(671, 'Oban'),
(672, 'Okehampton'),
(673, 'Oldbury'),
(674, 'Oldham'),
(675, 'Oldmeldrum'),
(676, 'Olney'),
(677, 'Omagh'),
(678, 'Ormskirk'),
(679, 'Orpington'),
(680, 'Ossett'),
(681, 'Oswestry'),
(682, 'Otley'),
(683, 'Oundle'),
(684, 'Oxford'),
(685, 'Padstow'),
(686, 'Paignton'),
(687, 'Painswick'),
(688, 'Paisley'),
(689, 'Peebles'),
(690, 'Pembroke'),
(691, 'Penarth'),
(692, 'Penicuik'),
(693, 'Penistone'),
(694, 'Penmaenmawr'),
(695, 'Penrith'),
(696, 'Penryn'),
(697, 'Penzance'),
(698, 'Pershore'),
(699, 'Perth'),
(700, 'Peterborough'),
(701, 'Peterhead'),
(702, 'Peterlee'),
(703, 'Petersfield'),
(704, 'Petworth'),
(705, 'Pickering'),
(706, 'Pitlochry'),
(707, 'Pittenweem'),
(708, 'Plymouth'),
(709, 'Pocklington'),
(710, 'Polegate'),
(711, 'Pontefract'),
(712, 'Pontypridd'),
(713, 'Poole'),
(714, 'Port Talbot'),
(715, 'Portadown'),
(716, 'Portaferry'),
(717, 'Porth'),
(718, 'Porthcawl'),
(719, 'Porthmadog'),
(720, 'Portishead'),
(721, 'Portrush'),
(722, 'Portsmouth'),
(723, 'Portstewart'),
(724, 'Potters Bar'),
(725, 'Potton'),
(726, 'Poulton le Fylde'),
(727, 'Prescot'),
(728, 'Prestatyn'),
(729, 'Presteigne'),
(730, 'Preston'),
(731, 'Prestwick'),
(732, 'Princes Risborough'),
(733, 'Prudhoe'),
(734, 'Pudsey'),
(735, 'Pwllheli'),
(736, 'Ramsgate'),
(737, 'Randalstown'),
(738, 'Rayleigh'),
(739, 'Reading'),
(740, 'Redcar'),
(741, 'Redditch'),
(742, 'Redhill'),
(743, 'Redruth'),
(744, 'Reigate'),
(745, 'Retford'),
(746, 'Rhayader'),
(747, 'Rhuddlan'),
(748, 'Rhyl'),
(749, 'Richmond'),
(750, 'Rickmansworth'),
(751, 'Ringwood'),
(752, 'Ripley'),
(753, 'Ripon'),
(754, 'Rochdale'),
(755, 'Rochester'),
(756, 'Rochford'),
(757, 'Romford'),
(758, 'Romsey'),
(759, 'Ross on Wye'),
(760, 'Rostrevor'),
(761, 'Rothbury'),
(762, 'Rotherham'),
(763, 'Rothesay'),
(764, 'Rowley Regis'),
(765, 'Royston'),
(766, 'Rugby'),
(767, 'Rugeley'),
(768, 'Runcorn'),
(769, 'Rushden'),
(770, 'Rutherglen'),
(771, 'Ruthin'),
(772, 'Ryde'),
(773, 'Rye'),
(774, 'Saffron Walden'),
(775, 'Saintfield'),
(776, 'Salcombe'),
(777, 'Sale'),
(778, 'Salford'),
(779, 'Salisbury'),
(780, 'Saltash'),
(781, 'Saltcoats'),
(782, 'Sandbach'),
(783, 'Sandhurst'),
(784, 'Sandown'),
(785, 'Sandwich'),
(786, 'Sandy'),
(787, 'Sawbridgeworth'),
(788, 'Saxmundham'),
(789, 'Scarborough'),
(790, 'Scunthorpe'),
(791, 'Seaford'),
(792, 'Seaton'),
(793, 'Sedgefield'),
(794, 'Selby'),
(795, 'Selkirk'),
(796, 'Selsey'),
(797, 'Settle'),
(798, 'Sevenoaks'),
(799, 'Shaftesbury'),
(800, 'Shanklin'),
(801, 'Sheerness'),
(802, 'Sheffield'),
(803, 'Shepshed'),
(804, 'Shepton Mallet'),
(805, 'Sherborne'),
(806, 'Sheringham'),
(807, 'Shildon'),
(808, 'Shipston on Stour'),
(809, 'Shoreham by Sea'),
(810, 'Shrewsbury'),
(811, 'Sidmouth'),
(812, 'Sittingbourne'),
(813, 'Skegness'),
(814, 'Skelmersdale'),
(815, 'Skipton'),
(816, 'Sleaford'),
(817, 'Slough'),
(818, 'Smethwick'),
(819, 'Soham'),
(820, 'Solihull'),
(821, 'Somerton'),
(822, 'South Molton'),
(823, 'South Shields'),
(824, 'South Woodham Ferrers'),
(825, 'Southam'),
(826, 'Southampton'),
(827, 'Southborough'),
(828, 'Southend on Sea'),
(829, 'Southport'),
(830, 'Southsea'),
(831, 'Southwell'),
(832, 'Southwold'),
(833, 'Spalding'),
(834, 'Spennymoor'),
(835, 'Spilsby'),
(836, 'Stafford'),
(837, 'Staines'),
(838, 'Stamford'),
(839, 'Stanley'),
(840, 'Staveley'),
(841, 'Stevenage'),
(842, 'Stirling'),
(843, 'Stockport'),
(844, 'Stockton on Tees'),
(845, 'Stoke on Trent'),
(846, 'Stone'),
(847, 'Stowmarket'),
(848, 'Strabane'),
(849, 'Stranraer'),
(850, 'Stratford upon Avon'),
(851, 'Strood'),
(852, 'Stroud'),
(853, 'Sudbury'),
(854, 'Sunderland'),
(855, 'Sutton Coldfield'),
(856, 'Sutton in Ashfield'),
(857, 'Swadlincote'),
(858, 'Swanage'),
(859, 'Swanley'),
(860, 'Swansea'),
(861, 'Swindon'),
(862, 'Tadcaster'),
(863, 'Tadley'),
(864, 'Tain'),
(865, 'Talgarth'),
(866, 'Tamworth'),
(867, 'Taunton'),
(868, 'Tavistock'),
(869, 'Teignmouth'),
(870, 'Telford'),
(871, 'Tenby'),
(872, 'Tenterden'),
(873, 'Tetbury'),
(874, 'Tewkesbury'),
(875, 'Thame'),
(876, 'Thatcham'),
(877, 'Thaxted'),
(878, 'Thetford'),
(879, 'Thirsk'),
(880, 'Thornbury'),
(881, 'Thrapston'),
(882, 'Thurso'),
(883, 'Tilbury'),
(884, 'Tillicoultry'),
(885, 'Tipton'),
(886, 'Tiverton'),
(887, 'Tobermory'),
(888, 'Todmorden'),
(889, 'Tonbridge'),
(890, 'Torpoint'),
(891, 'Torquay'),
(892, 'Totnes'),
(893, 'Totton'),
(894, 'Towcester'),
(895, 'Tredegar'),
(896, 'Tregaron'),
(897, 'Tring'),
(898, 'Troon'),
(899, 'Trowbridge'),
(900, 'Truro'),
(901, 'Tunbridge Wells'),
(902, 'Tywyn'),
(903, 'Uckfield'),
(904, 'Ulverston'),
(905, 'Uppingham'),
(906, 'Usk'),
(907, 'Uttoxeter'),
(908, 'Ventnor'),
(909, 'Verwood'),
(910, 'Wadebridge'),
(911, 'Wadhurst'),
(912, 'Wakefield'),
(913, 'Wallasey'),
(914, 'Wallingford'),
(915, 'Walsall'),
(916, 'Waltham Abbey'),
(917, 'Waltham Cross'),
(918, 'Walton on Thames'),
(919, 'Walton on the Naze'),
(920, 'Wantage'),
(921, 'Ware'),
(922, 'Wareham'),
(923, 'Warminster'),
(924, 'Warrenpoint'),
(925, 'Warrington'),
(926, 'Warwick'),
(927, 'Washington'),
(928, 'Watford'),
(929, 'Wednesbury'),
(930, 'Wednesfield'),
(931, 'Wellingborough'),
(932, 'Wellington'),
(933, 'Wells'),
(934, 'Wells next the Sea'),
(935, 'Welshpool'),
(936, 'Welwyn Garden City'),
(937, 'Wem'),
(938, 'Wendover'),
(939, 'West Bromwich'),
(940, 'Westbury'),
(941, 'Westerham'),
(942, 'Westhoughton'),
(943, 'Weston super Mare'),
(944, 'Wetherby'),
(945, 'Weybridge'),
(946, 'Weymouth'),
(947, 'Whaley Bridge'),
(948, 'Whitby'),
(949, 'Whitchurch'),
(950, 'Whitehaven'),
(951, 'Whitley Bay'),
(952, 'Whitnash'),
(953, 'Whitstable'),
(954, 'Whitworth'),
(955, 'Wick'),
(956, 'Wickford'),
(957, 'Widnes'),
(958, 'Wigan'),
(959, 'Wigston'),
(960, 'Wigtown'),
(961, 'Willenhall'),
(962, 'Wincanton'),
(963, 'Winchester'),
(964, 'Windermere'),
(965, 'Winsford'),
(966, 'Winslow'),
(967, 'Wisbech'),
(968, 'Witham'),
(969, 'Withernsea'),
(970, 'Witney'),
(971, 'Woburn'),
(972, 'Woking'),
(973, 'Wokingham'),
(974, 'Wolverhampton'),
(975, 'Wombwell'),
(976, 'Woodbridge'),
(977, 'Woodstock'),
(978, 'Wootton Bassett'),
(979, 'Worcester'),
(980, 'Workington'),
(981, 'Worksop'),
(982, 'Worthing'),
(983, 'Wotton under Edge'),
(984, 'Wrexham'),
(985, 'Wymondham'),
(986, 'Yarm'),
(987, 'Yarmouth'),
(988, 'Yate'),
(989, 'Yateley'),
(990, 'Yeadon'),
(991, 'Yeovil'),
(992, 'York');

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
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locality` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `town` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'United Kingdom',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `is_super`, `user_type`, `franchisees_id`, `name`, `surname`, `profile_pic`, `email`, `password`, `remember_token`, `device_token`, `dob`, `phone`, `address`, `street`, `locality`, `town`, `postcode`, `country`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(1, 1, 1, NULL, 'Hasibur', 'Rahaman', 'profile.jpg', 'hasib2008@gmail.com', '$2y$10$azBENyVBiAfJOovL8fD3iuRZszIuT3WG0/MtJBFJrMGvlfmXf0sQK', 'V82CeXQH2NIlX7PQLFncloux5A3m94H7qdUKmr8TvOkW7FcJOSY5SIY2xROt', NULL, '1989-12-28', '7059114888', NULL, 'Street', 'Locality', 'Town', 'Postcode', NULL, NULL, '2018-09-24 01:36:52', NULL, 1),
(3, NULL, 3, 1, 'Jhonn', 'Deosdasd', '1540557560.jpeg', 'driver@gmail.com', '$2y$10$e7qvNVc3JDbxVjZoqGGfqO8tnWkhfwj8zL2wEwF6etpKL32zV.u0m', NULL, '0', '2018-09-14', '78451232656', NULL, '29/1 Buchurhat Rd', NULL, 'Kolkata', '700075', 'India', '2018-09-22 03:17:07', '2018-11-28 07:44:50', NULL, 1),
(4, 1, 2, 1, 'Franchisee User', NULL, 'profile.jpg', 'franchiseeuser@gmail.com', '$2y$10$azBENyVBiAfJOovL8fD3iuRZszIuT3WG0/MtJBFJrMGvlfmXf0sQK', 'oAbxiVCc8Vrl5iPWaHExYhkKNrkJkh1cmZ0AYMqx3hZwso9J8i1BWJqYZfBT', NULL, '2018-09-28', '7458965896', NULL, 'DF-8 2nd Avenue', 'fffffddfssfd', 'Kolkata', '700064', 'India', '2018-09-22 03:41:13', '2018-11-14 09:02:25', NULL, 1),
(12, 1, 1, NULL, 'Franchisor', NULL, 'profile.jpg', 'franchisor@gmail.com', '$2y$10$DD7mJrKN/TpYJ0XUI3j08ubrS/ON7QlHAY4Qv6maPaYWWvaPrTeK6', NULL, NULL, '2018-09-27', '7896541236', 'Maharashtra, India', 'Street', 'Loality', 'Town', 'POSTCODE', NULL, '2018-09-24 01:23:46', '2018-12-12 02:48:00', NULL, 1),
(13, NULL, 3, 1, 'Bittu', 'Devnath', '1537861925-5ba9e9258551b.png', 'bittu@gmail.com', '$2y$10$vXTDeM.BOmOaCRwSdBTmmOr1K45xPqrl1Cz6JMPu1xsWNOHO.of9i', NULL, NULL, '2018-09-28', '7896541236', NULL, '29/1 Buchurhat Rd', NULL, 'Kolkata', '700075', 'India', '2018-09-25 02:22:05', '2018-11-28 07:45:49', NULL, 1),
(16, NULL, 3, 1, 'nick', 'jkl', 'profile.jpg', 'nick@gmail.com', '$2y$10$Gt2eXl3PYFEUZ.FVK6CI0.CQw2gM68GZQOlyPSvzsmWOxsVnkjgGG', NULL, NULL, '1989-11-19', '7412000365', NULL, 'fghjgj', 'hj7852', 'lkjkkklk', '123456', 'India', '2018-11-12 05:14:39', '2018-11-12 06:37:42', NULL, 1),
(17, NULL, 3, 7, 'adiadi', 'roy', 'profile.jpg', 'adi45@gmail.com', '$2y$10$GAJi6QoW2uOX/pUptIDSs.kHvseY1RE.ZZUYfRz6clbHQr1IZBYOe', NULL, NULL, '1998-11-05', '8520134679', 'Jawa Tengah, Indonesia', 'FG45weqwe', '7412589602', 'klojkjtkj', '123456', 'India', '2018-11-13 00:38:32', '2018-12-12 02:45:11', NULL, 1),
(18, 1, 2, 1, 'asdasd', NULL, 'profile.jpg', 'dasdas@ffff.ff', '$2y$10$Iiwf8JwC9r72qQJFhTlZo.o6YSaXPHrFcZbk5xf..7ucnfD8ri2ai', NULL, NULL, '2018-12-26', '34234234234', NULL, '234234 US-101', 'werwer', 'Port Angeles', '98363', 'United States', '2018-11-21 04:07:14', '2018-11-21 04:07:14', NULL, 1),
(19, 1, 2, 1, 'Jhon Deo', NULL, 'profile.jpg', 'jhon@email.com', '$2y$10$qOZO6i7C8uvZOTY5.0t/9OlOWTpFfTsqOjl/J.0wB9kb59j03oP9u', NULL, NULL, '2018-10-03', '7894561236', 'Guadalajara, Jalisco, Mexico', 'Lonsdale Street, Canberra ACT, Australia', 'Hs123', 'Melbourne', '3004', 'Australia', '2018-11-22 01:38:52', '2018-12-12 02:40:58', NULL, 1),
(20, NULL, 3, 1, 'MD HASIBUR RAHAMAN', 'RAHAMAN', 'profile.jpg', 'root@gmail.com', '$2y$10$yVD9.jYkQ/x0mqqWOg2pJ.HglMZEdJQrGzleLZz.2UROVc7o76EEq', NULL, NULL, '2018-11-29', '7059114888', NULL, '29/1 Buchurhat Rd', NULL, 'Kolkata', '700075', 'India', '2018-11-28 07:55:28', '2018-11-28 07:55:28', NULL, 1),
(21, NULL, 3, 1, 'jklkklkk', 'hjjkjjk', 'profile.jpg', 'hasib20089@gmail.com', '$2y$10$FhNi9DYnVkgTx0Ksj.LCjuLn03/FCAzwm7Gfs9hwpJLLq5os3/CmS', NULL, NULL, '1989-12-10', '7896541230', 'Gurugram, Haryana, India', 'Karnataka, India', 'HN741200', NULL, NULL, 'United Kingdom', '2018-12-10 07:05:53', '2018-12-12 02:44:41', NULL, 1),
(22, NULL, 2, 7, 'Manidipa', NULL, 'profile.jpg', 'mani@admin.com', '$2y$10$AbZeP7H.Gn.HwvH3ZcSQTOm84cf40MNmioRdnc/iPKJLAHOF2nrb6', NULL, NULL, '2018-12-29', '78965412365', 'Asda Park Royal Superstore, Western Road, London, UK', NULL, 'ada', NULL, NULL, 'United Kingdom', '2018-12-13 00:29:50', '2018-12-13 00:29:50', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `franchisees_id` int(11) NOT NULL,
  `color_modification` tinyint(4) NOT NULL DEFAULT '0',
  `body_type` int(255) NOT NULL,
  `vehicles_model` varchar(255) NOT NULL,
  `vehicles_company` varchar(255) NOT NULL,
  `vehicles_number` varchar(20) NOT NULL,
  `max_capacity` int(11) DEFAULT NULL,
  `phv_licence_number` varchar(255) NOT NULL,
  `phv_issue_date` date DEFAULT NULL,
  `phv_expiry_date` date DEFAULT NULL,
  `tax_renewal_date` date DEFAULT NULL,
  `insurance_date` date DEFAULT NULL,
  `mot_date` date DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `wheelchair_access` int(10) DEFAULT NULL COMMENT '1=>Yes',
  `status` int(11) NOT NULL COMMENT '1=>Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `franchisees_id`, `color_modification`, `body_type`, `vehicles_model`, `vehicles_company`, `vehicles_number`, `max_capacity`, `phv_licence_number`, `phv_issue_date`, `phv_expiry_date`, `tax_renewal_date`, `insurance_date`, `mot_date`, `lat`, `lng`, `wheelchair_access`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 1, 'SUV', 'BMW', '748554', 10, '5656546', '2018-09-26', NULL, '2018-09-27', '2018-09-28', '2018-09-27', '20.5937', '78.9629', 1, 1, '2018-09-25 01:05:11', '2018-10-23 07:16:47', NULL),
(2, 7, 1, 1, 'Model', 'BMW', 'TX1001', 4, '123', '2018-10-05', '2018-10-30', '2018-09-28', '2018-09-29', '2018-09-28', '20.5937', '78.9629', 1, 1, '2018-09-25 03:57:26', '2018-10-23 07:30:42', NULL),
(3, 1, 0, 2, 'Model', 'Make', 'WSDA1001', 5, 'PHV License Number', '2018-12-29', '2018-10-31', '2018-10-31', '2018-10-31', '2018-10-30', '20.5937', '78.9629', 0, 1, '2018-10-23 07:34:39', '2018-12-06 08:04:54', NULL);

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
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `countries_old`
--
ALTER TABLE `countries_old`
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
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry_details`
--
ALTER TABLE `enquiry_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry_pickup_locations`
--
ALTER TABLE `enquiry_pickup_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
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
-- Indexes for table `franchisorinvoice`
--
ALTER TABLE `franchisorinvoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `franchisorinvoice_details`
--
ALTER TABLE `franchisorinvoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `franchisor_invoice_fee`
--
ALTER TABLE `franchisor_invoice_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `franchisor_invoice_price`
--
ALTER TABLE `franchisor_invoice_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_setting`
--
ALTER TABLE `general_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
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
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `towns`
--
ALTER TABLE `towns`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `booking_vehicle`
--
ALTER TABLE `booking_vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `company_info`
--
ALTER TABLE `company_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;
--
-- AUTO_INCREMENT for table `countries_old`
--
ALTER TABLE `countries_old`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;
--
-- AUTO_INCREMENT for table `default_permissions`
--
ALTER TABLE `default_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1367;
--
-- AUTO_INCREMENT for table `drivers_vehicles`
--
ALTER TABLE `drivers_vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `driver_attendance`
--
ALTER TABLE `driver_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `driver_details`
--
ALTER TABLE `driver_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `driving_request`
--
ALTER TABLE `driving_request`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `enquiry_details`
--
ALTER TABLE `enquiry_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `enquiry_pickup_locations`
--
ALTER TABLE `enquiry_pickup_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `franchisees`
--
ALTER TABLE `franchisees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `franchisees_price`
--
ALTER TABLE `franchisees_price`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `franchisorinvoice`
--
ALTER TABLE `franchisorinvoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `franchisorinvoice_details`
--
ALTER TABLE `franchisorinvoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `franchisor_invoice_fee`
--
ALTER TABLE `franchisor_invoice_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `franchisor_invoice_price`
--
ALTER TABLE `franchisor_invoice_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `general_setting`
--
ALTER TABLE `general_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;
--
-- AUTO_INCREMENT for table `pickup_locations`
--
ALTER TABLE `pickup_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `towns`
--
ALTER TABLE `towns`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=993;
--
-- AUTO_INCREMENT for table `trip_route`
--
ALTER TABLE `trip_route`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
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
