-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 26, 2019 at 01:48 PM
-- Server version: 5.7.25-0ubuntu0.16.04.2
-- PHP Version: 7.2.16-1+ubuntu16.04.1+deb.sury.org+1

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
-- Table structure for table `franchisees`
--

CREATE TABLE `franchisees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `base_location` varchar(255) DEFAULT NULL,
  `contact_person_name` varchar(255) DEFAULT NULL,
  `contact_person_name_sec` varchar(255) DEFAULT NULL,
  `contact_person_phone` varchar(100) DEFAULT NULL,
  `contact_person_phone_sec` varchar(255) DEFAULT NULL,
  `owner_dmd_mobilenumber` varchar(255) DEFAULT NULL,
  `owner_dmd_mobilenumber_sec` varchar(255) DEFAULT NULL,
  `owner_homenumber` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_person_email` varchar(255) DEFAULT NULL,
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
  `status` tinyint(4) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_number` varchar(255) DEFAULT NULL,
  `reg_address` varchar(255) DEFAULT NULL,
  `incorporation_date` varchar(255) DEFAULT NULL,
  `company_yearend` varchar(255) DEFAULT NULL,
  `conf_stat_date` varchar(255) DEFAULT NULL,
  `locality` varchar(100) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `public_liability_insurance` date DEFAULT NULL,
  `public_liability_insurance_status` int(11) DEFAULT '1',
  `employers_liability_insurance` date DEFAULT NULL,
  `employers_liability_insurance_status` int(11) DEFAULT '1',
  `amount_cover` varchar(255) DEFAULT NULL,
  `franchise_license_renewal_date` date DEFAULT NULL,
  `franchise_license_renewal_status` int(11) DEFAULT '1',
  `company_year_end` date DEFAULT NULL,
  `confirmation_statement_date` date DEFAULT NULL,
  `vat_reg` varchar(255) DEFAULT NULL,
  `vat_number` varchar(255) DEFAULT NULL,
  `vat_reg_date` varchar(255) DEFAULT NULL,
  `vat_dereg_date` varchar(255) DEFAULT NULL,
  `bank_account_no` varchar(255) DEFAULT NULL,
  `bank_sortcode` varchar(255) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
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

INSERT INTO `franchisees` (`id`, `name`, `base_location`, `contact_person_name`, `contact_person_name_sec`, `contact_person_phone`, `contact_person_phone_sec`, `owner_dmd_mobilenumber`, `owner_dmd_mobilenumber_sec`, `owner_homenumber`, `address`, `contact_person_email`, `contact_person_email_sec`, `franchise_owner_dmd_email`, `franchise_manager_name`, `manager_person_phone`, `manager_dmd_mob_frn_owner`, `manager_dmd_email_frn_owner`, `franchise_administrator_name`, `administrator_person_phone`, `administrator_dmd_mob_frn_owner`, `administrator_dmd_email_frn_owner`, `status`, `company_name`, `company_number`, `reg_address`, `incorporation_date`, `company_yearend`, `conf_stat_date`, `locality`, `country`, `public_liability_insurance`, `public_liability_insurance_status`, `employers_liability_insurance`, `employers_liability_insurance_status`, `amount_cover`, `franchise_license_renewal_date`, `franchise_license_renewal_status`, `company_year_end`, `confirmation_statement_date`, `vat_reg`, `vat_number`, `vat_reg_date`, `vat_dereg_date`, `bank_account_no`, `bank_sortcode`, `account_name`, `franchise_agreement`, `amendments`, `shareholders_nameone`, `shareholders_nametwo`, `shareholders_namethree`, `shareholders_namefour`, `share_percentageone`, `share_percentagetwo`, `share_percentagethree`, `share_percentagefour`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Fulchester', 'Ruby General Hospital, E. M. Bypass, Sector I, Kasba Golpark, Calcutta, West Bengal, India', 'Billy The Fish', NULL, '7059114888', NULL, NULL, NULL, NULL, 'Portsmouth PO6 4TR, UK', 'hasib2008@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Fulchester Ltd1', '314159261', 'erwerwe', '2017-01-11', '2018-11-22', '2018-11-22', '18 The slipway', 'India', '2018-08-30', 1, '2018-09-27', 1, NULL, '2018-09-29', 1, '2018-09-28', '2018-12-01', '0', '98765431', '2019-02-15', '2019-03-11', '2342342341', '1211', 'werwer1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-22 01:55:05', '2019-03-26 02:45:00', NULL),
(5, 'Hasi', NULL, 'Hasi', NULL, '7896541236', NULL, NULL, NULL, NULL, 'asdasd', 'asdasd@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '', '', '', '', '', 'asda', NULL, '2018-09-28', 1, '2018-09-22', 1, NULL, '2018-09-21', 1, '2018-09-29', '2018-09-28', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-28 01:22:52', '2018-09-28 02:07:46', '2018-09-28 02:07:46'),
(6, 'asdasd', NULL, 'asdasd', NULL, '7896541236', NULL, NULL, NULL, NULL, 'asdasd', 'dfgdf@gmail.coom', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '', '', '', '', '', 'sdfsdf', NULL, '2018-10-04', 1, '2018-10-05', 1, NULL, '2018-09-28', 1, '2018-09-28', '2018-09-29', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-09-28 01:23:34', '2018-09-28 02:07:41', '2018-09-28 02:07:41'),
(7, 'OLA', 'Kolkata Railway Station (Chitpur Station), Belgachia, Calcutta, West Bengal, India', 'MD HASIBUR RAHAMAN', NULL, '7059114888', NULL, NULL, NULL, NULL, 'Ajana-Kalbarri Road, Kalbarri National Park WA, Australia', 'rahamanh939@gmail.com', 'rahamanh939@gmail.com', 'rahamanh939@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'DD', '7854120369', 'kjklo ikokjn', '2018-11-22', NULL, NULL, 'Loca', 'India', '2018-11-01', 1, '2018-10-31', 1, NULL, '2018-10-31', 1, '2018-11-09', '2018-10-18', '1', NULL, NULL, NULL, '11455202265', NULL, 'hjkl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-08 04:21:24', '2018-12-24 03:48:52', '2018-12-24 03:48:52'),
(8, 'DMD', 'Test', 'DMD', 'adsad', '1212121212212', 'adasd', NULL, NULL, NULL, 'asdasd', 'asdasd@gmail.com', 'asdasd@gmail.com', 'asdasd@gmail.com', NULL, '07896541236', NULL, 'hasib200822@gmail.com', NULL, NULL, NULL, NULL, 1, 'DC', '2018-11-09', 'Garia Station Road', '2018-11-02', '2018-11-30', '2018-12-04', 'tyesteeerewwe', 'India', '2018-11-29', 1, '2018-11-29', 1, 'asda', '2018-11-17', 1, NULL, NULL, '1', 'V-741000025', NULL, NULL, '34234', NULL, 'DMDM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-17 07:45:35', '2018-12-24 03:48:50', '2018-12-24 03:48:50'),
(9, 'asdas', 'asd', 'adasd', 'asdasd', '12121212121', 'asdas', 'dasdas', 'dasdas', 'dasdasd', 'AB, Canada', 'ada@gmail.com', 'asdasd', 'asdasd', 'ad', 'asd', 'asd', 'asd', NULL, NULL, NULL, NULL, 0, 'adasd', 'asda', 'asd', '2018-12-15', '2018-12-29', '2018-12-29', 'asdasd', NULL, '2018-12-12', 1, '2018-12-15', 1, 'adasd', '2018-12-15', 1, NULL, NULL, '1', 'asdad', NULL, NULL, '121212', NULL, '1212', NULL, NULL, 'asd', 'asd', 'asdas', 'ada', 'asd', 'asd', 'asd', 'ads', '2018-12-15 01:13:24', '2018-12-24 03:48:48', NULL),
(10, 'Eastleigh', 'Asda Park Royal Superstore, Western Road, London, UK', 'inert', 'gavin pell', '0987786987', NULL, NULL, NULL, NULL, 'Portsmouth PO6 4TR, UK', 'gavin.pell@dmd.co.uk', NULL, NULL, 'gavin pell', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'inert', '097607', 'po6 4tr', '2019-01-15', '2019-01-23', '2019-01-22', '18', NULL, '2019-01-15', 1, '2019-01-10', 1, '400', '2019-07-31', 1, NULL, NULL, '1', NULL, NULL, NULL, '363572', '1231', '36828', NULL, NULL, 'inert', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-03 08:12:11', '2019-03-25 04:00:50', NULL),
(11, 'asdfs', 'Asda Park Royal Superstore, Western Road, London, UK', 'saf', 'asdf', '23423423423', 'asf', NULL, NULL, NULL, 'AZ, USA', '2234@GMAIL.CM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'ADSASD', 'ASDAS', 'Adelaide SA, Australia', '2019-03-21', NULL, NULL, NULL, NULL, '2019-03-28', 1, '2019-03-30', 1, NULL, '2019-03-19', 1, NULL, NULL, '1', NULL, NULL, NULL, '2323123123', NULL, 'DASDASD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-25 04:23:36', '2019-03-25 04:23:36', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `franchisees`
--
ALTER TABLE `franchisees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `franchisees`
--
ALTER TABLE `franchisees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
