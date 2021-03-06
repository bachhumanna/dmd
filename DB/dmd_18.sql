-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 11, 2019 at 06:06 PM
-- Server version: 5.7.26-0ubuntu0.16.04.1
-- PHP Version: 7.2.19-1+ubuntu16.04.1+deb.sury.org+1

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
-- Table structure for table `audits`
--

CREATE TABLE `audits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_id` int(10) UNSIGNED NOT NULL,
  `auditable_type` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_values` text COLLATE utf8mb4_unicode_ci,
  `new_values` text COLLATE utf8mb4_unicode_ci,
  `url` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audits`
--

INSERT INTO `audits` (`id`, `user_type`, `user_id`, `event`, `auditable_id`, `auditable_type`, `old_values`, `new_values`, `url`, `ip_address`, `user_agent`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'App\\User', 1, 'created', 1, 'App\\Booking', '[]', '{"companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-04-13 00:00","base_location":"Garia, Calcutta, West Bengal, India","drop_location":"Sealdah Railway Station, Sealdah, Raja Bazar, Calcutta, West Bengal, India","journey_type":"2","paying_bill":"Client","who_paying_bill":null,"payment_clientid":null,"payment_mode":"1","long_return":"1","journey_return_date":"2019-04-25 15:00","base_return":"1","drop_off_to_base":"9.27","drop_off_to_base_time":"41","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":8,"id":1}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', NULL, '2019-04-12 04:07:17', '2019-04-12 04:07:17'),
(2, 'App\\User', 1, 'updated', 1, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":66.12,"total_duration":182,"total_price":102.50999999999999,"order_id":"O-10001","final_price":102.50999999999999,"invoice_price":102.50999999999999,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', NULL, '2019-04-12 04:07:17', '2019-04-12 04:07:17'),
(3, 'App\\User', 1, 'updated', 1, 'App\\Booking', '{"driver_id":36,"booking_time":"2019-04-13 00:00:00"}', '{"driver_id":"44","booking_time":"2019-04-14T14:19:00"}', 'http://localhost/DMD/admin/update-booking?bookingId=1&resourceId=44&booking_time=2019-04-14T14%3A19%3A00', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', NULL, '2019-04-12 04:16:25', '2019-04-12 04:16:25'),
(4, 'App\\User', 1, 'updated', 1, 'App\\Booking', '{"booking_time":"2019-04-14 14:19:00"}', '{"booking_time":"2019-04-15T14:19:00"}', 'http://localhost/DMD/admin/update-booking?bookingId=1&resourceId=44&booking_time=2019-04-15T14%3A19%3A00', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', NULL, '2019-04-12 04:17:47', '2019-04-12 04:17:47'),
(5, 'App\\User', 1, 'created', 2, 'App\\Booking', '[]', '{"companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-04-17 09:45","base_location":"Doctor Lavista TESORERIA DEL GDF, Doctores, Mexico City, CDMX, Mexico","drop_location":"105 Doctor Lavista TESORERIA DEL GDF, Doctores, Mexico City, CDMX, Mexico","journey_type":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":null,"payment_mode":"1","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"0.00","drop_off_to_base_time":"0","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":8,"id":2}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', NULL, '2019-04-16 01:46:32', '2019-04-16 01:46:32'),
(6, 'App\\User', 1, 'updated', 2, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":0.52,"total_duration":4,"total_price":1.21,"order_id":"O-10002","final_price":1.21,"invoice_price":1.21,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', NULL, '2019-04-16 01:46:32', '2019-04-16 01:46:32'),
(7, 'App\\User', 1, 'created', 3, 'App\\Booking', '[]', '{"companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-04-18 16:45","base_location":"Doctor Lavista TESORERIA DEL GDF, Doctores, Mexico City, CDMX, Mexico","drop_location":"Dr. Lavista 244, Cuauht\\u00e9moc, 06720 Cuauhtemoc, CDMX, Mexico","journey_type":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":null,"payment_mode":"1","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"0.44","drop_off_to_base_time":"3","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":9,"id":3}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', NULL, '2019-04-16 05:54:46', '2019-04-16 05:54:46'),
(8, 'App\\User', 1, 'updated', 3, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":1.25,"total_duration":6,"total_price":5.31,"order_id":"O-10003","final_price":5.31,"invoice_price":5.31,"driver_id":"37"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', NULL, '2019-04-16 05:54:46', '2019-04-16 05:54:46'),
(9, 'App\\User', 1, 'created', 4, 'App\\Booking', '[]', '{"companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":"lorem ipsum","companion_id":null,"booking_time":"2019-04-25 17:15","base_location":"Doctor Lavista TESORERIA DEL GDF, Doctores, Mexico City, CDMX, Mexico","drop_location":"Embassy of Mexico, Benito Juarez Marg, Block C, Moti Bagh, New Delhi, Delhi, India","journey_type":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":null,"payment_mode":"1","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"469.89","drop_off_to_base_time":"539","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":11,"id":4}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', NULL, '2019-04-16 06:17:23', '2019-04-16 06:17:23'),
(10, 'App\\User', 1, 'updated', 4, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":932.54,"total_duration":544,"total_price":770.6600000000001,"order_id":"O-10004","final_price":770.6600000000001,"invoice_price":770.6600000000001,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', NULL, '2019-04-16 06:17:23', '2019-04-16 06:17:23'),
(11, 'App\\User', 1, 'created', 5, 'App\\Booking', '[]', '{"companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":"lorem ipsum","companion_id":null,"booking_time":"2019-04-20 17:30","base_location":"Doctor Lavista TESORERIA DEL GDF, Doctores, Mexico City, CDMX, Mexico","drop_location":"Embassy of Mexico, Benito Juarez Marg, Block C, Moti Bagh, New Delhi, Delhi, India","journey_type":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":null,"payment_mode":"1","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"469.89","drop_off_to_base_time":"539","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":13,"id":5}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', NULL, '2019-04-16 06:32:04', '2019-04-16 06:32:04'),
(12, 'App\\User', 1, 'updated', 5, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":940.4,"total_duration":544,"total_price":770.6600000000001,"order_id":"O-10005","final_price":770.6600000000001,"invoice_price":770.6600000000001,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', NULL, '2019-04-16 06:32:04', '2019-04-16 06:32:04'),
(13, 'App\\User', 1, 'created', 6, 'App\\Booking', '[]', '{"companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":"lorem ggh lkjnm","companion_id":null,"booking_time":"2019-04-25 17:30","base_location":"Doctor Lavista TESORERIA DEL GDF, Doctores, Mexico City, CDMX, Mexico","drop_location":"Mexican Express, 16th Road, Bandra West, Mumbai, Maharashtra, India","journey_type":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":null,"payment_mode":"1","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"0.00","drop_off_to_base_time":"0","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":14,"id":6}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', NULL, '2019-04-16 06:35:07', '2019-04-16 06:35:07'),
(14, 'App\\User', 1, 'updated', 6, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":1534.51,"total_duration":2280,"total_price":1969.92,"order_id":"O-10006","final_price":1969.92,"invoice_price":1969.92,"driver_id":"37"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', NULL, '2019-04-16 06:35:07', '2019-04-16 06:35:07'),
(15, 'App\\User', 1, 'created', 7, 'App\\Booking', '[]', '{"companion_driver_companion":"1","booking_or_quotes":"2","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-05-10 23:55","base_location":"Garia, Calcutta, West Bengal, India","drop_location":"Dumdum Metro Station Parking Yard, South Sinthee Road, Pearabagan, South Sinthee, Biswanath Colony, Sinthee, Calcutta, West Bengal, India","journey_type":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":null,"payment_mode":"1","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"13.59","drop_off_to_base_time":"55","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":8,"id":7}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-09 04:33:42', '2019-05-09 04:33:42'),
(16, 'App\\User', 1, 'updated', 7, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":27.39,"total_duration":57,"total_price":57.76,"order_id":"O-10007","final_price":57.76,"invoice_price":57.76,"driver_id":"44"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-09 04:33:42', '2019-05-09 04:33:42'),
(17, 'App\\User', 1, 'deleted', 3, 'App\\Booking', '{"id":3,"driver_id":37,"repeat_type":1,"order_id":"O-10003","users_id":1,"franchisees_id":1,"vat_registered":0,"companion_id":null,"trip_status":0,"client_id":9,"note":null,"booking_time":"2019-04-18 16:45:00","repeat_booking_time":null,"repeat_booking_endtime":null,"base_location":"Doctor Lavista TESORERIA DEL GDF, Doctores, Mexico City, CDMX, Mexico","drop_location":"Dr. Lavista 244, Cuauht\\u00e9moc, 06720 Cuauhtemoc, CDMX, Mexico","outward_companion":null,"outward_waiting":null,"journey_type":1,"journey_return_date":null,"return_companion":null,"return_waiting":null,"long_return":0,"base_return":1,"drop_off_to_base":0,"drop_off_to_base_time":3,"comfort_break":0,"return_comfort_break":0,"total_distance":1.25,"companion_time":0,"total_duration":6,"total_price":5.31,"custom_price":null,"final_price":5.31,"invoice_price":5.31,"paying_bill":"Client","who_paying_bill":null,"payment_clientid":null,"payment_mode":1,"payment_status":0,"invoiced":null,"companion_driver_companion":1,"booking_or_quotes":1,"quote_previous_status":null,"group_invoice_id":null,"payment_date":null,"invoice_date":"2019-05-10 00:00:00"}', '[]', 'http://localhost/DMD/admin/booking/3?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-10 02:49:32', '2019-05-10 02:49:32'),
(18, 'App\\User', 1, 'deleted', 2, 'App\\Booking', '{"id":2,"driver_id":36,"repeat_type":1,"order_id":"O-10002","users_id":1,"franchisees_id":1,"vat_registered":0,"companion_id":null,"trip_status":0,"client_id":8,"note":null,"booking_time":"2019-04-17 09:45:00","repeat_booking_time":null,"repeat_booking_endtime":null,"base_location":"Doctor Lavista TESORERIA DEL GDF, Doctores, Mexico City, CDMX, Mexico","drop_location":"105 Doctor Lavista TESORERIA DEL GDF, Doctores, Mexico City, CDMX, Mexico","outward_companion":null,"outward_waiting":null,"journey_type":1,"journey_return_date":null,"return_companion":null,"return_waiting":null,"long_return":0,"base_return":1,"drop_off_to_base":0,"drop_off_to_base_time":0,"comfort_break":0,"return_comfort_break":0,"total_distance":0.52,"companion_time":0,"total_duration":4,"total_price":1.21,"custom_price":null,"final_price":1.21,"invoice_price":1.21,"paying_bill":"Client","who_paying_bill":null,"payment_clientid":null,"payment_mode":1,"payment_status":0,"invoiced":null,"companion_driver_companion":1,"booking_or_quotes":1,"quote_previous_status":null,"group_invoice_id":null,"payment_date":null,"invoice_date":"2019-05-10 00:00:00"}', '[]', 'http://localhost/DMD/admin/booking/2?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-10 02:52:34', '2019-05-10 02:52:34'),
(19, 'App\\User', 1, 'created', 8, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-05-10 16:05","base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Dumdum Metro Station Parking Yard, South Sinthee Road, Pearabagan, South Sinthee, Biswanath Colony, Sinthee, Calcutta, West Bengal, India","journey_type":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":null,"payment_mode":"1","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"15.45","drop_off_to_base_time":"52","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":17,"id":8}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-10 05:11:28', '2019-05-10 05:11:28'),
(20, 'App\\User', 1, 'updated', 8, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":28.45,"total_duration":120,"total_price":129.23,"order_id":"O-10008","final_price":129.23,"invoice_price":129.23,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-10 05:11:29', '2019-05-10 05:11:29'),
(21, 'App\\User', 1, 'updated', 8, 'App\\Booking', '{"vat_registered":0,"booking_time":"2019-05-10 16:05:00","base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India"}', '{"vat_registered":false,"booking_time":"2019-05-11 18:05","base_location":"Doctor Lavista TESORERIA DEL GDF, Doctores, Mexico City, CDMX, Mexico"}', 'http://localhost/DMD/admin/booking/8?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-10 05:11:59', '2019-05-10 05:11:59'),
(22, 'App\\User', 1, 'updated', 8, 'App\\Booking', '{"driver_id":36,"total_distance":28.45,"total_price":129.23,"final_price":129.23,"invoice_price":129.23}', '{"driver_id":"44","total_distance":13,"total_price":129,"final_price":129,"invoice_price":129}', 'http://localhost/DMD/admin/booking/8?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-10 05:11:59', '2019-05-10 05:11:59'),
(23, 'App\\User', 1, 'created', 9, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-05-11 16:30","base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Park Street, Beniapukur, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"1","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"8.99","drop_off_to_base_time":"32","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":8,"id":9}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-10 05:33:56', '2019-05-10 05:33:56'),
(24, 'App\\User', 1, 'updated', 9, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":23.96,"total_duration":83,"total_price":67.71000000000001,"order_id":"O-10009","final_price":67.71000000000001,"invoice_price":67.71000000000001,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-10 05:33:57', '2019-05-10 05:33:57'),
(25, 'App\\User', 1, 'created', 10, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-05-10 16:35","base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Garia, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"1","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"0.66","drop_off_to_base_time":"3","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":18,"id":10}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.41', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-10 05:49:11', '2019-05-10 05:49:11'),
(26, 'App\\User', 1, 'updated', 10, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":291.36,"total_duration":555,"total_price":552.66,"order_id":"O-10010","final_price":552.66,"invoice_price":552.66,"driver_id":"44"}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.41', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-10 05:49:11', '2019-05-10 05:49:11'),
(27, 'App\\User', 1, 'created', 11, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-05-08 14:30","base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"723121","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"17","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"174.00","drop_off_to_base_time":"357","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":17,"id":11}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-10 06:17:30', '2019-05-10 06:17:30'),
(28, 'App\\User', 1, 'updated', 11, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":348,"total_duration":357,"total_price":174,"order_id":"O-10011","final_price":174,"invoice_price":174,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-10 06:17:30', '2019-05-10 06:17:30'),
(29, 'App\\User', 1, 'deleted', 11, 'App\\Booking', '{"id":11,"booking_source":1,"driver_id":36,"repeat_type":1,"order_id":"O-10011","users_id":1,"franchisees_id":1,"vat_registered":0,"companion_id":null,"trip_status":2,"client_id":17,"note":null,"booking_time":"2019-05-08 14:30:00","repeat_booking_time":null,"repeat_booking_endtime":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"723121","outward_companion":null,"outward_waiting":null,"journey_type":1,"journey_return_date":null,"return_companion":null,"return_waiting":null,"long_return":0,"base_return":1,"drop_off_to_base":174,"drop_off_to_base_time":357,"comfort_break":0,"return_comfort_break":0,"total_distance":348,"companion_time":0,"total_duration":357,"total_price":174,"custom_price":null,"final_price":174,"invoice_price":174,"paying_bill":"Client","who_paying_bill":null,"payment_clientid":17,"payment_mode":1,"payment_status":0,"invoiced":1,"companion_driver_companion":1,"booking_or_quotes":1,"quote_previous_status":null,"group_invoice_id":1007,"payment_date":null,"invoice_date":"2019-05-10 12:36:45","late_booking_reason":null}', '[]', 'http://localhost/DMD/admin/booking/11?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-10 08:41:28', '2019-05-10 08:41:28'),
(30, 'App\\User', 1, 'created', 12, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-05-11 19:55","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Garia, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"1","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"0.66","drop_off_to_base_time":"3","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":true,"users_id":1,"franchisees_id":"1","client_id":18,"id":12}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.41', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-10 08:56:55', '2019-05-10 08:56:55'),
(31, 'App\\User', 1, 'updated', 12, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":8.53,"total_duration":30,"total_price":27.659999999999997,"order_id":"O-10012","final_price":27.659999999999997,"invoice_price":27.659999999999997,"driver_id":"36"}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.41', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-10 08:56:55', '2019-05-10 08:56:55'),
(32, 'App\\User', 1, 'updated', 7, 'App\\Booking', '{"booking_or_quotes":2}', '{"booking_or_quotes":1}', 'http://192.168.1.42/DMD/admin/submit-approve-quote?', '192.168.1.43', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-10 09:00:16', '2019-05-10 09:00:16'),
(33, 'App\\User', 1, 'updated', 7, 'App\\Booking', '{"booking_or_quotes":2}', '{"booking_or_quotes":1}', 'http://192.168.1.42/DMD/admin/submit-approve-quote?', '192.168.1.43', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-10 09:06:29', '2019-05-10 09:06:29'),
(37, 'App\\User', 1, 'created', 16, 'App\\Booking', '[]', '{"booking_source":"3","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":"Note","companion_id":null,"booking_time":"2019-05-12 15:35","late_booking_reason":"ad","base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Ashok Vihar, New Delhi, Delhi, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"6","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"947.88","drop_off_to_base_time":"1629","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":true,"users_id":1,"franchisees_id":"1","client_id":8,"id":16}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-11 00:51:53', '2019-05-11 00:51:53'),
(38, 'App\\User', 1, 'updated', 16, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":1896.48,"total_duration":1644,"total_price":1921.1100000000001,"order_id":"O-10016","final_price":1921.1100000000001,"invoice_price":1921.1100000000001,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-11 00:51:53', '2019-05-11 00:51:53'),
(39, 'App\\User', 1, 'created', 17, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":"das","companion_id":null,"booking_time":"2019-05-11 11:50","late_booking_reason":"Reason for Late booking","base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Garia, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"1","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"0.66","drop_off_to_base_time":"3","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":true,"users_id":1,"franchisees_id":"1","client_id":18,"id":17}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-11 00:54:29', '2019-05-11 00:54:29'),
(40, 'App\\User', 1, 'updated', 17, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":1.32,"total_duration":3,"total_price":0.66,"order_id":"O-10017","final_price":0.66,"invoice_price":0.66,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-11 00:54:29', '2019-05-11 00:54:29'),
(41, 'App\\User', 1, 'deleted', 12, 'App\\Booking', '{"id":12,"booking_source":1,"driver_id":36,"repeat_type":1,"order_id":"O-10012","users_id":1,"franchisees_id":1,"vat_registered":1,"companion_id":null,"trip_status":0,"client_id":18,"note":null,"booking_time":"2019-05-11 19:55:00","repeat_booking_time":null,"repeat_booking_endtime":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Garia, Calcutta, West Bengal, India","outward_companion":null,"outward_waiting":null,"journey_type":1,"journey_return_date":null,"return_companion":null,"return_waiting":null,"long_return":0,"base_return":1,"drop_off_to_base":1,"drop_off_to_base_time":3,"comfort_break":0,"return_comfort_break":0,"total_distance":8.53,"companion_time":0,"total_duration":30,"total_price":27.66,"custom_price":null,"final_price":27.66,"invoice_price":27.66,"paying_bill":"Client","who_paying_bill":null,"payment_clientid":1,"payment_mode":1,"payment_status":0,"invoiced":null,"companion_driver_companion":1,"booking_or_quotes":1,"quote_previous_status":null,"group_invoice_id":null,"payment_date":null,"invoice_date":null,"late_booking_reason":null}', '[]', 'http://192.168.1.42/DMD/admin/booking/12?', '192.168.1.40', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.75 Safari/537.36', NULL, '2019-05-11 01:29:32', '2019-05-11 01:29:32'),
(42, 'App\\User', 1, 'created', 3, 'App\\FranchiseesPrice', '[]', '{"driver_cost":"13","vehicle_cost":"0.4","paid_mileage":"0.5","base_driving_cost":"1","waiting_time_cost":"5","companionship_cost":"5","comfort_cost":"10","id":3}', 'http://192.168.1.42/DMD/admin/franchisee?', '192.168.1.47', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-21 02:21:04', '2019-05-21 02:21:04'),
(43, 'App\\User', 1, 'created', 18, 'App\\Booking', '[]', '{"booking_source":"2","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-05-21 19:50","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Ajay Nagar, Mukundapur, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"10","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"2.56","drop_off_to_base_time":"10","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":13,"id":18}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.47', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-21 03:51:46', '2019-05-21 03:51:46'),
(44, 'App\\User', 1, 'updated', 18, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":30.96,"total_duration":97,"total_price":89.56,"order_id":"O-10018","final_price":89.56,"invoice_price":89.56,"driver_id":"36"}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.47', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-21 03:51:46', '2019-05-21 03:51:46'),
(45, 'App\\User', 1, 'updated', 9, 'App\\Booking', '{"invoice_price":67.71}', '{"invoice_price":2581.252}', 'http://192.168.1.42/DMD/admin/invoice/9?', '192.168.1.47', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-21 05:04:23', '2019-05-21 05:04:23'),
(46, 'App\\User', 1, 'updated', 7, 'App\\Booking', '{"booking_or_quotes":2}', '{"booking_or_quotes":1}', 'http://localhost/DMD/admin/submit-approve-quote?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-27 01:54:32', '2019-05-27 01:54:32'),
(47, 'App\\User', 1, 'updated', 18, 'App\\Booking', '{"booking_or_quotes":2}', '{"booking_or_quotes":1}', 'http://localhost/DMD/admin/submit-approve-quote?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-27 02:00:35', '2019-05-27 02:00:35'),
(48, 'App\\User', 1, 'updated', 18, 'App\\Booking', '{"booking_or_quotes":2}', '{"booking_or_quotes":1}', 'http://localhost/DMD/admin/submit-approve-quote?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-27 02:02:32', '2019-05-27 02:02:32'),
(49, 'App\\User', 1, 'updated', 18, 'App\\Booking', '{"booking_or_quotes":2}', '{"booking_or_quotes":1}', 'http://localhost/DMD/admin/submit-approve-quote?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-27 02:03:49', '2019-05-27 02:03:49'),
(50, 'App\\User', 1, 'updated', 18, 'App\\Booking', '{"booking_or_quotes":2}', '{"booking_or_quotes":1}', 'http://localhost/DMD/admin/submit-approve-quote?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-27 02:06:13', '2019-05-27 02:06:13'),
(51, 'App\\User', 1, 'updated', 18, 'App\\Booking', '{"booking_or_quotes":2}', '{"booking_or_quotes":1}', 'http://localhost/DMD/admin/submit-approve-quote?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-27 02:07:58', '2019-05-27 02:07:58'),
(52, 'App\\User', 1, 'updated', 18, 'App\\Booking', '{"booking_or_quotes":2}', '{"booking_or_quotes":1}', 'http://localhost/DMD/admin/submit-approve-quote?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-27 02:18:26', '2019-05-27 02:18:26'),
(53, 'App\\User', 1, 'created', 19, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-05-10 11:30","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"456,456\\/1 Lat Krabang 52 Yaek 2, Lat Krabang, Bangkok, Thailand","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"6","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"2123.00","drop_off_to_base_time":"4255","companion_time":"0","outward_companion":"12","outward_waiting":"12","comfort_break":"1","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":20,"id":19}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-27 02:30:53', '2019-05-27 02:30:53'),
(54, 'App\\User', 1, 'updated', 19, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":4246,"total_duration":4309,"total_price":2155,"order_id":"O-10019","final_price":2155,"invoice_price":2155,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-27 02:30:53', '2019-05-27 02:30:53'),
(55, 'App\\User', 1, 'updated', 19, 'App\\Booking', '{"vat_registered":0,"booking_time":"2019-05-10 11:30:00","drop_off_to_base":2123}', '{"vat_registered":false,"booking_time":"2019-05-11 10:35","drop_off_to_base":"2123.00"}', 'http://localhost/DMD/admin/booking/19?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-27 02:31:15', '2019-05-27 02:31:15'),
(56, 'App\\User', 1, 'updated', 19, 'App\\Booking', '{"late_booking_reason":null}', '{"late_booking_reason":""}', 'http://localhost/DMD/admin/booking/19?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-27 02:31:15', '2019-05-27 02:31:15'),
(57, 'App\\User', 1, 'updated', 19, 'App\\Booking', '{"driver_id":36,"total_distance":4246,"total_duration":4309}', '{"driver_id":"44","total_distance":2123,"total_duration":4279}', 'http://localhost/DMD/admin/booking/19?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-27 02:31:16', '2019-05-27 02:31:16'),
(58, 'App\\User', 1, 'created', 20, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-05-30 14:50","late_booking_reason":"dfg","base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"dfgdfgdfgdfgd","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"6","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":null,"drop_off_to_base_time":null,"companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":20,"id":20}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-27 02:48:13', '2019-05-27 02:48:13'),
(59, 'App\\User', 1, 'updated', 20, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":36557,"total_duration":7689,"total_price":4495.5,"order_id":"O-10020","final_price":4495.5,"invoice_price":4495.5,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-27 02:48:13', '2019-05-27 02:48:13'),
(60, 'App\\User', 1, 'updated', 20, 'App\\Booking', '{"vat_registered":0,"booking_time":"2019-05-30 14:50:00","drop_location":"dfgdfgdfgdfgd","drop_off_to_base":null,"drop_off_to_base_time":null}', '{"vat_registered":false,"booking_time":"2019-05-29 10:50","drop_location":"Bangkok, Thailand","drop_off_to_base":"2097.69","drop_off_to_base_time":"4216"}', 'http://localhost/DMD/admin/booking/20?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-27 02:52:56', '2019-05-27 02:52:56'),
(61, 'App\\User', 1, 'updated', 20, 'App\\Booking', '[]', '[]', 'http://localhost/DMD/admin/booking/20?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-27 02:52:56', '2019-05-27 02:52:56'),
(62, 'App\\User', 1, 'updated', 20, 'App\\Booking', '{"driver_id":36,"total_distance":36557,"total_duration":7689,"total_price":4495.5,"final_price":4495.5,"invoice_price":4495.5}', '{"driver_id":"44","total_distance":2143.95,"total_duration":4296,"total_price":2151.35,"final_price":2151.35,"invoice_price":2151.35}', 'http://localhost/DMD/admin/booking/20?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-27 02:52:56', '2019-05-27 02:52:56'),
(63, 'App\\User', 1, 'updated', 8, 'App\\Booking', '{"invoice_price":129}', '{"invoice_price":264.8}', 'http://localhost/DMD/admin/invoice/8?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-28 04:51:25', '2019-05-28 04:51:25'),
(64, 'App\\User', 1, 'updated', 8, 'App\\Booking', '{"invoice_price":264.8}', '{"invoice_price":154.8}', 'http://localhost/DMD/admin/invoice/8?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-28 04:54:40', '2019-05-28 04:54:40'),
(65, 'App\\User', 1, 'updated', 8, 'App\\Booking', '{"invoice_price":154.8}', '{"invoice_price":155.81}', 'http://localhost/DMD/admin/invoice/8?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-28 04:54:58', '2019-05-28 04:54:58'),
(66, 'App\\User', 1, 'updated', 20, 'App\\Booking', '{"vat_registered":0,"booking_time":"2019-05-29 10:50:00","drop_off_to_base":2098,"late_booking_reason":""}', '{"vat_registered":false,"booking_time":"2019-05-30 00:05","drop_off_to_base":"2097.68","late_booking_reason":null}', 'http://localhost/DMD/admin/booking/20?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-29 00:42:32', '2019-05-29 00:42:32'),
(67, 'App\\User', 1, 'updated', 20, 'App\\Booking', '{"late_booking_reason":null}', '{"late_booking_reason":""}', 'http://localhost/DMD/admin/booking/20?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-29 00:42:32', '2019-05-29 00:42:32'),
(68, 'App\\User', 1, 'updated', 20, 'App\\Booking', '{"total_distance":2143.95,"total_duration":4296,"total_price":2151.35,"final_price":2151.35,"invoice_price":2151.35}', '{"total_distance":2143.42,"total_duration":4283,"total_price":2145.54,"final_price":2145.54,"invoice_price":2145.54}', 'http://localhost/DMD/admin/booking/20?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-29 00:42:32', '2019-05-29 00:42:32'),
(69, 'App\\User', 1, 'updated', 17, 'App\\Booking', '{"invoice_price":0.66}', '{"invoice_price":11.792}', 'http://localhost/DMD/admin/invoice/17?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-29 01:41:35', '2019-05-29 01:41:35'),
(70, 'App\\User', 1, 'updated', 17, 'App\\Booking', '{"invoice_price":11.79}', '{"invoice_price":0.792}', 'http://localhost/DMD/admin/invoice/17?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-29 02:09:54', '2019-05-29 02:09:54'),
(71, 'App\\User', 1, 'updated', 17, 'App\\Booking', '{"invoice_price":0.79}', '{"invoice_price":0.66}', 'http://localhost/DMD/admin/invoice/17?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-05-29 03:04:45', '2019-05-29 03:04:45'),
(72, 'App\\User', 1, 'created', 1, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-03 12:25","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Sealdah Railway Station, Sealdah Flyover, Sealdah, Raja Bazar, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"6","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"9.54","drop_off_to_base_time":"41","companion_time":"0","outward_companion":"10","outward_waiting":"10","comfort_break":"1","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":20,"id":1}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 01:29:48', '2019-06-03 01:29:48'),
(73, 'App\\User', 1, 'updated', 1, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":33.98,"total_duration":141,"total_price":71.5,"order_id":"O-10001","final_price":71.5,"invoice_price":71.5,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 01:29:48', '2019-06-03 01:29:48'),
(74, 'App\\User', 1, 'updated', 1, 'App\\Booking', '{"vat_registered":0,"booking_time":"2019-06-03 12:25:00","drop_off_to_base":10}', '{"vat_registered":false,"booking_time":"2019-06-13 12:30","drop_off_to_base":"9.54"}', 'http://localhost/DMD/admin/booking/1?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 01:31:24', '2019-06-03 01:31:24'),
(75, 'App\\User', 1, 'updated', 1, 'App\\Booking', '{"late_booking_reason":null}', '{"late_booking_reason":""}', 'http://localhost/DMD/admin/booking/1?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 01:31:24', '2019-06-03 01:31:24'),
(76, 'App\\User', 1, 'updated', 1, 'App\\Booking', '{"driver_id":36,"total_distance":33.98,"total_duration":141,"total_price":71.5,"final_price":71.5,"invoice_price":71.5}', '{"driver_id":"44","total_distance":24.07,"total_duration":110,"total_price":70.5,"final_price":70.5,"invoice_price":70.5}', 'http://localhost/DMD/admin/booking/1?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 01:31:25', '2019-06-03 01:31:25'),
(77, 'App\\User', 1, 'updated', 1, 'App\\Booking', '{"invoice_price":70.5}', '{"invoice_price":110.5}', 'http://localhost/DMD/admin/invoice/1?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 01:56:47', '2019-06-03 01:56:47'),
(78, 'App\\User', 1, 'updated', 1, 'App\\Booking', '{"invoice_price":110.5}', '{"invoice_price":80}', 'http://localhost/DMD/admin/invoice/1?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 02:07:23', '2019-06-03 02:07:23');
INSERT INTO `audits` (`id`, `user_type`, `user_id`, `event`, `auditable_id`, `auditable_type`, `old_values`, `new_values`, `url`, `ip_address`, `user_agent`, `tags`, `created_at`, `updated_at`) VALUES
(79, 'App\\User', 1, 'created', 2, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-02 13:25","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Sealdah Railway Station, Sealdah Flyover, Sealdah, Raja Bazar, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"1","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"9.54","drop_off_to_base_time":"41","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":true,"users_id":1,"franchisees_id":"1","client_id":21,"id":2}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 02:27:01', '2019-06-03 02:27:01'),
(80, 'App\\User', 1, 'updated', 2, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":19.25,"total_duration":43,"total_price":33.9,"order_id":"O-10002","final_price":33.9,"invoice_price":33.9,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 02:27:01', '2019-06-03 02:27:01'),
(81, 'App\\User', 1, 'updated', 1, 'App\\Booking', '{"invoice_price":80,"price_without_vat":0}', '{"invoice_price":70.5,"price_without_vat":70.5}', 'http://localhost/DMD/admin/invoice/1?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 02:50:52', '2019-06-03 02:50:52'),
(82, 'App\\User', 1, 'updated', 1, 'App\\Booking', '{"invoice_price":70.5,"price_without_vat":70.5}', '{"invoice_price":170.5,"price_without_vat":170.5}', 'http://localhost/DMD/admin/invoice/1?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 02:51:55', '2019-06-03 02:51:55'),
(83, 'App\\User', 1, 'updated', 2, 'App\\Booking', '{"invoice_price":33.9,"price_without_vat":0}', '{"invoice_price":133.9,"price_without_vat":133.9}', 'http://localhost/DMD/admin/invoice/2?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 02:52:33', '2019-06-03 02:52:33'),
(84, 'App\\User', 1, 'updated', 2, 'App\\Booking', '{"invoice_price":133.9}', '{"invoice_price":143.9}', 'http://localhost/DMD/admin/invoice/2?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 02:52:54', '2019-06-03 02:52:54'),
(85, 'App\\User', 1, 'updated', 2, 'App\\Booking', '{"price_with_vat":0}', '{"price_with_vat":150.68}', 'http://localhost/DMD/admin/invoice/2?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 02:56:40', '2019-06-03 02:56:40'),
(86, 'App\\User', 1, 'updated', 2, 'App\\Booking', '{"invoice_price":143.9,"price_with_vat":150.68}', '{"invoice_price":153.9,"price_with_vat":160.68}', 'http://localhost/DMD/admin/invoice/2?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 02:58:03', '2019-06-03 02:58:03'),
(87, 'App\\User', 1, 'updated', 1, 'App\\Booking', '{"price_with_vat":0}', '{"price_with_vat":170.5}', 'http://localhost/DMD/admin/invoice/1?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 03:00:03', '2019-06-03 03:00:03'),
(88, 'App\\User', 1, 'created', 3, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-02 00:00","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Kolkata Railway Station (Chitpur Station), Belgachia, Kolkata, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"6","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"12.55","drop_off_to_base_time":"51","companion_time":"0","outward_companion":"100","outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":true,"users_id":1,"franchisees_id":"1","client_id":20,"id":3}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 03:48:48', '2019-06-03 03:48:48'),
(89, 'App\\User', 1, 'updated', 3, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":32.93,"total_duration":177,"total_price":74.01,"order_id":"O-10003","final_price":74.01,"invoice_price":74.01,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 03:48:48', '2019-06-03 03:48:48'),
(96, 'App\\User', 1, 'updated', 1, 'App\\Booking', '{"price_with_vat":0,"price_without_vat":0}', '{"price_with_vat":170.5,"price_without_vat":170.5}', 'http://localhost/DMD/admin/group-invoice-update-finalize?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 04:14:16', '2019-06-03 04:14:16'),
(97, 'App\\User', 1, 'updated', 2, 'App\\Booking', '{"invoice_price":153.9,"price_with_vat":0,"price_without_vat":0}', '{"invoice_price":140.68,"price_with_vat":140.68,"price_without_vat":133.9}', 'http://localhost/DMD/admin/group-invoice-update-finalize?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 04:29:45', '2019-06-03 04:29:45'),
(98, 'App\\User', 1, 'updated', 3, 'App\\Booking', '{"invoice_price":74.01,"price_with_vat":0,"price_without_vat":0}', '{"invoice_price":88.81200000000001,"price_with_vat":88.81200000000001,"price_without_vat":74.01}', 'http://localhost/DMD/admin/group-invoice-update-finalize?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 04:29:45', '2019-06-03 04:29:45'),
(99, 'App\\User', 1, 'updated', 3, 'App\\Booking', '{"invoice_price":88.81,"price_with_vat":88.81}', '{"invoice_price":88.81200000000001,"price_with_vat":88.81200000000001}', 'http://localhost/DMD/admin/group-invoice-update-finalize?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 04:34:56', '2019-06-03 04:34:56'),
(100, 'App\\User', 1, 'updated', 2, 'App\\Booking', '{"invoice_price":140.68,"price_with_vat":140.68}', '{"invoice_price":160.68,"price_with_vat":160.68}', 'http://localhost/DMD/admin/group-invoice-update-finalize?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 04:49:13', '2019-06-03 04:49:13'),
(101, 'App\\User', 1, 'updated', 3, 'App\\Booking', '{"invoice_price":88.81,"price_with_vat":88.81}', '{"invoice_price":88.81200000000001,"price_with_vat":88.81200000000001}', 'http://localhost/DMD/admin/group-invoice-update-finalize?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 04:49:13', '2019-06-03 04:49:13'),
(102, 'App\\User', 1, 'updated', 1, 'App\\Booking', '{"invoice_price":null,"price_with_vat":0,"price_without_vat":0}', '{"invoice_price":170.5,"price_with_vat":170.5,"price_without_vat":170.5}', 'http://localhost/DMD/admin/invoice/group-invoice?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 04:59:42', '2019-06-03 04:59:42'),
(103, 'App\\User', 1, 'updated', 2, 'App\\Booking', '{"invoice_price":null,"price_with_vat":0,"price_without_vat":0}', '{"invoice_price":160.68,"price_with_vat":160.68,"price_without_vat":133.9}', 'http://localhost/DMD/admin/invoice/group-invoice?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 04:59:42', '2019-06-03 04:59:42'),
(104, 'App\\User', 1, 'updated', 3, 'App\\Booking', '{"invoice_price":null,"price_with_vat":0,"price_without_vat":0}', '{"invoice_price":88.81200000000001,"price_with_vat":88.81200000000001,"price_without_vat":74.01}', 'http://localhost/DMD/admin/invoice/group-invoice?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 04:59:42', '2019-06-03 04:59:42'),
(105, 'App\\User', 1, 'created', 4, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-04 01:05","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Sealdah Railway Station, Sealdah Flyover, Sealdah, Raja Bazar, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"6","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"9.54","drop_off_to_base_time":"41","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":true,"users_id":1,"franchisees_id":"1","client_id":22,"id":4}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 05:58:31', '2019-06-03 05:58:31'),
(106, 'App\\User', 1, 'updated', 4, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":19.08,"total_duration":41,"total_price":45.769999999999996,"order_id":"O-10004","final_price":45.769999999999996,"invoice_price":45.769999999999996,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 05:58:31', '2019-06-03 05:58:31'),
(107, 'App\\User', 1, 'updated', 4, 'App\\Booking', '{"invoice_price":45.77,"price_with_vat":0,"price_without_vat":0}', '{"invoice_price":67.77000000000001,"price_with_vat":76.924,"price_without_vat":65.77000000000001}', 'http://localhost/DMD/admin/invoice/4?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 06:14:03', '2019-06-03 06:14:03'),
(108, 'App\\User', 1, 'updated', 4, 'App\\Booking', '{"price_with_vat":76.92}', '{"price_with_vat":76.924}', 'http://localhost/DMD/admin/invoice/4?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 06:14:16', '2019-06-03 06:14:16'),
(109, 'App\\User', 1, 'updated', 4, 'App\\Booking', '{"price_with_vat":76.92}', '{"price_with_vat":76.924}', 'http://localhost/DMD/admin/invoice/4?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 06:14:21', '2019-06-03 06:14:21'),
(110, 'App\\User', 1, 'updated', 4, 'App\\Booking', '{"invoice_price":67.77,"price_with_vat":76.92,"price_without_vat":65.77}', '{"invoice_price":98.924,"price_with_vat":98.924,"price_without_vat":85.77000000000001}', 'http://localhost/DMD/admin/group-invoice-update-finalize?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-03 06:14:46', '2019-06-03 06:14:46'),
(111, 'App\\User', 1, 'created', 5, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-03 00:00","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Dum Dum Airport (CCU), Jessore Road, Dum Dum, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"6","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"15.59","drop_off_to_base_time":"52","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":true,"users_id":1,"franchisees_id":"1","client_id":22,"id":5}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.41', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-04 08:04:07', '2019-06-04 08:04:07'),
(112, 'App\\User', 1, 'updated', 5, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":31.18,"total_duration":52,"total_price":57.129999999999995,"order_id":"O-10005","final_price":57.129999999999995,"invoice_price":57.129999999999995,"driver_id":"36"}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.41', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-04 08:04:07', '2019-06-04 08:04:07'),
(113, 'App\\User', 1, 'updated', 5, 'App\\Booking', '{"invoice_price":57.13,"price_with_vat":0,"price_without_vat":0}', '{"invoice_price":68.55600000000001,"price_with_vat":68.55600000000001,"price_without_vat":57.13}', 'http://192.168.1.42/DMD/admin/group-invoice-update-finalize?', '192.168.1.41', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-04 08:04:59', '2019-06-04 08:04:59'),
(114, 'App\\User', 1, 'created', 6, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-01 03:15","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Dum Dum Airport (CCU), Jessore Road, Dum Dum, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"6","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"15.59","drop_off_to_base_time":"52","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":true,"users_id":1,"franchisees_id":"1","client_id":22,"id":6}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.41', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-04 08:14:28', '2019-06-04 08:14:28'),
(115, 'App\\User', 1, 'updated', 6, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":31.18,"total_duration":52,"total_price":57.129999999999995,"order_id":"O-10006","final_price":57.129999999999995,"invoice_price":57.129999999999995,"driver_id":"36"}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.41', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-04 08:14:28', '2019-06-04 08:14:28'),
(116, 'App\\User', 1, 'updated', 6, 'App\\Booking', '{"invoice_price":57.13,"price_with_vat":0,"price_without_vat":0}', '{"invoice_price":68.55600000000001,"price_with_vat":68.55600000000001,"price_without_vat":57.13}', 'http://localhost/DMD/admin/invoice/group-invoice?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-07 00:41:28', '2019-06-07 00:41:28'),
(117, 'App\\User', 1, 'created', 7, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-08 10:40","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Ajay Nagar, Mukundapur, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":null,"long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"2.56","drop_off_to_base_time":"10","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":true,"users_id":1,"franchisees_id":"1","client_id":17,"id":7}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-07 00:43:51', '2019-06-07 00:43:51'),
(118, 'App\\User', 1, 'updated', 7, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":24.63,"total_duration":88,"total_price":46.42,"order_id":"O-10007","final_price":46.42,"invoice_price":46.42,"driver_id":"37"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-07 00:43:51', '2019-06-07 00:43:51'),
(119, 'App\\User', 1, 'updated', 7, 'App\\Booking', '{"vat_registered":1,"booking_time":"2019-06-08 10:40:00","drop_off_to_base":3}', '{"vat_registered":true,"booking_time":"2019-06-06 06:30","drop_off_to_base":"2.56"}', 'http://localhost/DMD/admin/booking/7?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-07 00:45:39', '2019-06-07 00:45:39'),
(120, 'App\\User', 1, 'updated', 7, 'App\\Booking', '{"late_booking_reason":null}', '{"late_booking_reason":""}', 'http://localhost/DMD/admin/booking/7?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-07 00:45:39', '2019-06-07 00:45:39'),
(121, 'App\\User', 1, 'updated', 7, 'App\\Booking', '{"driver_id":37,"total_distance":24.63}', '{"driver_id":"44","total_distance":22.07}', 'http://localhost/DMD/admin/booking/7?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-07 00:45:39', '2019-06-07 00:45:39'),
(122, 'App\\User', 1, 'updated', 7, 'App\\Booking', '{"invoice_price":46.42,"price_with_vat":0,"price_without_vat":0}', '{"invoice_price":55.704,"price_with_vat":55.704,"price_without_vat":46.42}', 'http://localhost/DMD/admin/group-invoice-update-finalize?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-07 00:47:18', '2019-06-07 00:47:18'),
(123, 'App\\User', 1, 'created', 8, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-06 16:25","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Esplanade Bus Stop, Maidan, Esplanade, Dharmatala, Taltala, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"16","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"12.28","drop_off_to_base_time":"40","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":true,"users_id":1,"franchisees_id":"1","client_id":17,"id":8}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-07 05:28:35', '2019-06-07 05:28:35'),
(124, 'App\\User', 1, 'updated', 8, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":32.34,"total_duration":95,"total_price":56.8,"order_id":"O-10008","final_price":56.8,"invoice_price":56.8,"driver_id":"37"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-07 05:28:35', '2019-06-07 05:28:35'),
(125, 'App\\User', 1, 'updated', 8, 'App\\Booking', '{"invoice_price":56.8,"price_with_vat":0,"price_without_vat":0}', '{"invoice_price":68.16,"price_with_vat":68.16,"price_without_vat":56.8}', 'http://localhost/DMD/admin/invoice/group-invoice?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-07 05:29:49', '2019-06-07 05:29:49'),
(126, 'App\\User', 1, 'created', 9, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-06 18:40","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Asansol, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"16","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"146.25","drop_off_to_base_time":"276","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":true,"users_id":1,"franchisees_id":"1","client_id":17,"id":9}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-07 07:41:30', '2019-06-07 07:41:30'),
(127, 'App\\User', 1, 'updated', 9, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":358.19,"total_duration":472,"total_price":273.13,"order_id":"O-10009","final_price":273.13,"invoice_price":273.13,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-07 07:41:30', '2019-06-07 07:41:30'),
(128, 'App\\User', 1, 'updated', 9, 'App\\Booking', '{"invoice_price":273.13,"price_with_vat":0,"price_without_vat":0}', '{"invoice_price":327.756,"price_with_vat":327.756,"price_without_vat":273.13}', 'http://localhost/DMD/admin/invoice/group-invoice?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-07 08:55:59', '2019-06-07 08:55:59'),
(129, 'App\\User', 1, 'created', 10, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-10 00:00","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Sealdah Railway Station, Sealdah Flyover, Sealdah, Raja Bazar, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"6","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"9.54","drop_off_to_base_time":"41","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":true,"users_id":1,"franchisees_id":"1","client_id":22,"id":10}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-10 01:28:28', '2019-06-10 01:28:28'),
(130, 'App\\User', 1, 'updated', 10, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":34.05,"total_duration":90,"total_price":50.5,"order_id":"O-10010","final_price":50.5,"invoice_price":50.5,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-10 01:28:29', '2019-06-10 01:28:29'),
(131, 'App\\User', 1, 'updated', 10, 'App\\Booking', '{"invoice_price":50.5,"price_with_vat":0,"price_without_vat":0}', '{"invoice_price":60.6,"price_with_vat":60.6,"price_without_vat":50.5}', 'http://localhost/DMD/admin/group-invoice-update-finalize?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-10 01:30:33', '2019-06-10 01:30:33'),
(132, 'App\\User', 1, 'created', 11, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-09 15:55","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Ruby General Hospital, Anandapur Main Road, Sector I, East Kolkata Township, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"6","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"4.28","drop_off_to_base_time":"16","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":true,"users_id":1,"franchisees_id":"1","client_id":22,"id":11}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-10 05:00:02', '2019-06-10 05:00:02'),
(133, 'App\\User', 1, 'updated', 11, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":8.760000000000002,"total_duration":19,"total_price":12.42,"order_id":"O-10011","final_price":12.42,"invoice_price":12.42,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-10 05:00:02', '2019-06-10 05:00:02'),
(134, 'App\\User', 1, 'created', 12, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-09 05:25","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Tollygunge, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"8","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"3.79","drop_off_to_base_time":"23","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":true,"users_id":1,"franchisees_id":"1","client_id":21,"id":12}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-10 05:01:08', '2019-06-10 05:01:08'),
(135, 'App\\User', 1, 'updated', 12, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":8.52,"total_duration":30,"total_price":14.32,"order_id":"O-10012","final_price":14.32,"invoice_price":14.32,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-10 05:01:08', '2019-06-10 05:01:08'),
(136, 'App\\User', 1, 'created', 13, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-09 08:40","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Park Street, Beniapukur, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"1","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"8.99","drop_off_to_base_time":"31","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"vat_registered":true,"users_id":1,"franchisees_id":"1","client_id":21,"id":13}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-10 05:04:57', '2019-06-10 05:04:57'),
(137, 'App\\User', 1, 'updated', 13, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":17.509999999999998,"total_duration":54,"total_price":25.33,"order_id":"O-10013","final_price":25.33,"invoice_price":25.33,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-10 05:04:57', '2019-06-10 05:04:57'),
(138, 'App\\User', 1, 'updated', 12, 'App\\Booking', '{"invoice_price":14.32,"price_with_vat":0,"price_without_vat":0}', '{"invoice_price":17.184,"price_with_vat":17.184,"price_without_vat":14.32}', 'http://localhost/DMD/admin/invoice/group-invoice?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-10 05:06:16', '2019-06-10 05:06:16'),
(139, 'App\\User', 1, 'updated', 13, 'App\\Booking', '{"invoice_price":25.33,"price_with_vat":0,"price_without_vat":0}', '{"invoice_price":30.395999999999997,"price_with_vat":30.395999999999997,"price_without_vat":25.33}', 'http://localhost/DMD/admin/invoice/group-invoice?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-10 05:06:16', '2019-06-10 05:06:16'),
(140, 'App\\User', 1, 'created', 14, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":"25.50","note":null,"companion_id":null,"booking_time":"2019-06-11 15:00","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Park Street, Beniapukur, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"6","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"8.99","drop_off_to_base_time":"31","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":"20","vat_registered":true,"users_id":1,"franchisees_id":"1","client_id":22,"id":14}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-11 04:29:06', '2019-06-11 04:29:06'),
(141, 'App\\User', 1, 'updated', 14, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":18.18,"total_duration":33,"total_price":23.64,"order_id":"O-10014","final_price":"25.50","invoice_price":"25.50","driver_id":"41"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-11 04:29:06', '2019-06-11 04:29:06'),
(142, 'App\\User', 1, 'updated', 14, 'App\\Booking', '{"vat_registered":1,"booking_time":"2019-06-11 15:00:00","drop_off_to_base":9,"advance_payment_amount":20}', '{"vat_registered":true,"booking_time":"2019-06-11 15:00","drop_off_to_base":"8.99","advance_payment_amount":"21.20"}', 'http://localhost/DMD/admin/booking/14?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-11 05:12:03', '2019-06-11 05:12:03'),
(143, 'App\\User', 1, 'updated', 14, 'App\\Booking', '{"late_booking_reason":null}', '{"late_booking_reason":""}', 'http://localhost/DMD/admin/booking/14?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-11 05:12:03', '2019-06-11 05:12:03'),
(144, 'App\\User', 1, 'updated', 14, 'App\\Booking', '{"driver_id":41,"total_distance":18.18}', '{"driver_id":"44","total_distance":9.190000000000001}', 'http://localhost/DMD/admin/booking/14?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-11 05:12:03', '2019-06-11 05:12:03'),
(145, 'App\\User', 1, 'updated', 14, 'App\\Booking', '{"vat_registered":1,"booking_time":"2019-06-11 15:00:00","drop_off_to_base":9,"late_booking_reason":""}', '{"vat_registered":true,"booking_time":"2019-06-01 03:15","drop_off_to_base":"8.99","late_booking_reason":null}', 'http://localhost/DMD/admin/booking/14?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-11 05:12:20', '2019-06-11 05:12:20'),
(146, 'App\\User', 1, 'updated', 14, 'App\\Booking', '{"late_booking_reason":null}', '{"late_booking_reason":""}', 'http://localhost/DMD/admin/booking/14?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-11 05:12:20', '2019-06-11 05:12:20'),
(147, 'App\\User', 1, 'updated', 11, 'App\\Booking', '{"invoice_price":12.42,"price_with_vat":0,"price_without_vat":0}', '{"invoice_price":14.904,"price_with_vat":14.904,"price_without_vat":12.42}', 'http://localhost/DMD/admin/group-invoice-update-finalize?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-11 07:15:20', '2019-06-11 07:15:20'),
(148, 'App\\User', 1, 'updated', 14, 'App\\Booking', '{"invoice_price":25.5,"price_with_vat":0,"price_without_vat":0}', '{"invoice_price":30.6,"price_with_vat":30.6,"price_without_vat":25.5}', 'http://localhost/DMD/admin/group-invoice-update-finalize?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-11 07:15:20', '2019-06-11 07:15:20'),
(149, 'App\\User', 1, 'created', 15, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-10 17:10","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Airport, Dumdum, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"16","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"15.58","drop_off_to_base_time":"52","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":"20","vat_registered":true,"users_id":1,"franchisees_id":"1","client_id":17,"id":15}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-11 07:20:38', '2019-06-11 07:20:38'),
(150, 'App\\User', 1, 'updated', 15, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":33.58,"total_duration":81,"total_price":38.69,"order_id":"O-10015","final_price":38.69,"invoice_price":38.69,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-11 07:20:38', '2019-06-11 07:20:38'),
(151, 'App\\User', 1, 'created', 16, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-07 17:15","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Howrah Railway Station, Howrah, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"16","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"14.57","drop_off_to_base_time":"48","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":"10","vat_registered":true,"users_id":1,"franchisees_id":"1","client_id":17,"id":16}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-11 07:26:47', '2019-06-11 07:26:47'),
(152, 'App\\User', 1, 'updated', 16, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":30.07,"total_duration":70,"total_price":31.599999999999998,"order_id":"O-10016","final_price":31.599999999999998,"invoice_price":31.599999999999998,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-11 07:26:47', '2019-06-11 07:26:47'),
(153, 'App\\User', 1, 'updated', 15, 'App\\Booking', '{"invoice_price":38.69,"price_with_vat":0,"price_without_vat":0}', '{"invoice_price":46.428,"price_with_vat":46.428,"price_without_vat":38.69}', 'http://localhost/DMD/admin/invoice/group-invoice?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-11 07:59:03', '2019-06-11 07:59:03'),
(154, 'App\\User', 1, 'updated', 16, 'App\\Booking', '{"invoice_price":31.6,"price_with_vat":0,"price_without_vat":0}', '{"invoice_price":37.92,"price_with_vat":37.92,"price_without_vat":31.6}', 'http://localhost/DMD/admin/invoice/group-invoice?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-11 07:59:03', '2019-06-11 07:59:03'),
(155, 'App\\User', 1, 'created', 17, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-03 04:20","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Howrah Railway Station, Howrah, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"6","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"14.57","drop_off_to_base_time":"48","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":"10","vat_registered":true,"users_id":1,"franchisees_id":"1","client_id":22,"id":17}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-11 08:53:41', '2019-06-11 08:53:41'),
(156, 'App\\User', 1, 'updated', 17, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":28,"total_duration":69,"total_price":32.57,"order_id":"O-10017","final_price":32.57,"invoice_price":32.57,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-11 08:53:41', '2019-06-11 08:53:41'),
(157, 'App\\User', 1, 'updated', 17, 'App\\Booking', '{"vat_registered":1,"booking_time":"2019-06-03 04:20:00","drop_off_to_base":15,"advance_payment_amount":10}', '{"vat_registered":true,"booking_time":"2019-06-02 04:20","drop_off_to_base":"14.57","advance_payment_amount":"15"}', 'http://localhost/DMD/admin/booking/17?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-11 08:54:15', '2019-06-11 08:54:15'),
(158, 'App\\User', 1, 'updated', 17, 'App\\Booking', '{"late_booking_reason":null}', '{"late_booking_reason":""}', 'http://localhost/DMD/admin/booking/17?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-11 08:54:15', '2019-06-11 08:54:15'),
(159, 'App\\User', 1, 'updated', 17, 'App\\Booking', '{"driver_id":36,"total_distance":28}', '{"driver_id":"44","total_distance":13.43}', 'http://localhost/DMD/admin/booking/17?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-11 08:54:15', '2019-06-11 08:54:15'),
(160, 'App\\User', 1, 'updated', 17, 'App\\Booking', '{"invoice_price":32.57,"price_with_vat":0,"price_without_vat":0}', '{"invoice_price":39.084,"price_with_vat":39.084,"price_without_vat":32.57}', 'http://localhost/DMD/admin/invoice/group-invoice?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-11 08:59:25', '2019-06-11 08:59:25'),
(161, 'App\\User', 1, 'created', 18, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-13 10:10","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Dumdum Metro Station Parking Yard, South Sinthee Road, Pearabagan, South Sinthee, Biswanath Colony, Sinthee, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"16","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"13.80","drop_off_to_base_time":"57","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":"20","vat_registered":true,"users_id":1,"franchisees_id":"1","client_id":17,"id":18}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-14 01:16:22', '2019-06-14 01:16:22'),
(162, 'App\\User', 1, 'updated', 18, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":29.21,"total_duration":70,"total_price":50.4,"order_id":"O-10018","final_price":50.4,"invoice_price":50.4,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-14 01:16:22', '2019-06-14 01:16:22'),
(163, 'App\\User', 1, 'updated', 18, 'App\\Booking', '{"invoice_price":50.4,"price_with_vat":0,"price_without_vat":0}', '{"invoice_price":60.48,"price_with_vat":60.48,"price_without_vat":50.4}', 'http://192.168.1.42/DMD/admin/invoice/group-invoice?', '192.168.1.40', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', NULL, '2019-06-14 02:54:11', '2019-06-14 02:54:11'),
(164, 'App\\User', 1, 'created', 19, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-13 09:05","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Ruby Hall Clinic, Sasoon Road, Sangamvadi, Pune, Maharashtra, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"23","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"1294.24","drop_off_to_base_time":"2304","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":null,"vat_registered":true,"users_id":1,"franchisees_id":"1","client_id":23,"id":19}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.40', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', NULL, '2019-06-14 02:56:26', '2019-06-14 02:56:26'),
(165, 'App\\User', 1, 'updated', 19, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":2588.6800000000003,"total_duration":2306,"total_price":2944.4,"order_id":"O-10019","final_price":2944.4,"invoice_price":2944.4,"driver_id":"36"}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.40', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', NULL, '2019-06-14 02:56:26', '2019-06-14 02:56:26'),
(166, 'App\\User', 1, 'updated', 19, 'App\\Booking', '{"invoice_price":2944.4,"price_with_vat":0,"price_without_vat":0}', '{"invoice_price":3533.28,"price_with_vat":3533.28,"price_without_vat":2944.4}', 'http://192.168.1.42/DMD/admin/group-invoice-update-finalize?', '192.168.1.40', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', NULL, '2019-06-14 02:57:16', '2019-06-14 02:57:16');
INSERT INTO `audits` (`id`, `user_type`, `user_id`, `event`, `auditable_id`, `auditable_type`, `old_values`, `new_values`, `url`, `ip_address`, `user_agent`, `tags`, `created_at`, `updated_at`) VALUES
(167, 'App\\User', 1, 'created', 20, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-13 09:25","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Ajay Nagar, Mukundapur, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"23","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"2.56","drop_off_to_base_time":"10","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":"10","vat_registered":true,"users_id":1,"franchisees_id":"1","client_id":23,"id":20}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.40', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', NULL, '2019-06-14 04:30:20', '2019-06-14 04:30:20'),
(168, 'App\\User', 1, 'updated', 20, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":7.699999999999999,"total_duration":31,"total_price":14.7,"order_id":"O-10020","final_price":14.7,"invoice_price":14.7,"driver_id":"36"}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.40', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', NULL, '2019-06-14 04:30:20', '2019-06-14 04:30:20'),
(169, 'App\\User', 1, 'created', 21, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-13 10:10","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Dumdum Metro Station Parking Yard, South Sinthee Road, Pearabagan, South Sinthee, Biswanath Colony, Sinthee, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"23","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"13.80","drop_off_to_base_time":"57","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":"30","vat_registered":true,"users_id":1,"franchisees_id":"1","client_id":23,"id":21}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.40', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', NULL, '2019-06-14 04:31:17', '2019-06-14 04:31:17'),
(170, 'App\\User', 1, 'updated', 21, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":31.77,"total_duration":78,"total_price":51.04,"order_id":"O-10021","final_price":51.04,"invoice_price":51.04,"driver_id":"36"}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.40', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', NULL, '2019-06-14 04:31:17', '2019-06-14 04:31:17'),
(171, 'App\\User', 1, 'updated', 20, 'App\\Booking', '{"invoice_price":14.7,"price_with_vat":0,"price_without_vat":0}', '{"invoice_price":17.64,"price_with_vat":17.64,"price_without_vat":14.7}', 'http://192.168.1.42/DMD/admin/invoice/group-invoice?', '192.168.1.40', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', NULL, '2019-06-14 04:34:24', '2019-06-14 04:34:24'),
(172, 'App\\User', 1, 'updated', 21, 'App\\Booking', '{"invoice_price":51.04,"price_with_vat":0,"price_without_vat":0}', '{"invoice_price":61.248,"price_with_vat":61.248,"price_without_vat":51.04}', 'http://192.168.1.42/DMD/admin/invoice/group-invoice?', '192.168.1.40', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', NULL, '2019-06-14 04:34:24', '2019-06-14 04:34:24'),
(173, 'App\\User', 1, 'created', 22, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-13 09:25","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Ajay Nagar, Mukundapur, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"24","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"2.56","drop_off_to_base_time":"10","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":"10","vat_registered":true,"users_id":1,"franchisees_id":"1","client_id":25,"id":22}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.40', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', NULL, '2019-06-14 05:12:25', '2019-06-14 05:12:25'),
(174, 'App\\User', 1, 'updated', 22, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":7.710000000000001,"total_duration":31,"total_price":15.61,"order_id":"O-10022","final_price":15.61,"invoice_price":15.61,"driver_id":"36"}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.40', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', NULL, '2019-06-14 05:12:25', '2019-06-14 05:12:25'),
(175, 'App\\User', 1, 'updated', 22, 'App\\Booking', '{"invoice_price":15.61,"price_with_vat":0,"price_without_vat":0}', '{"invoice_price":18.732,"price_with_vat":18.732,"price_without_vat":15.61}', 'http://192.168.1.42/DMD/admin/invoice/group-invoice?', '192.168.1.40', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36', NULL, '2019-06-14 05:12:51', '2019-06-14 05:12:51'),
(176, 'App\\User', 1, 'created', 23, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-11 13:25","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Ruby General Hospital, Anandapur Main Road, Sector I, East Kolkata Township, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"24","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"4.28","drop_off_to_base_time":"16","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":"10","vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":25,"id":23}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-17 05:48:28', '2019-06-17 05:48:28'),
(177, 'App\\User', 1, 'updated', 23, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":10.670000000000002,"total_duration":36,"total_price":21.47,"order_id":"O-10023","final_price":21.47,"invoice_price":21.47,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-17 05:48:28', '2019-06-17 05:48:28'),
(178, 'App\\User', 1, 'updated', 23, 'App\\Booking', '{"vat_registered":0,"booking_time":"2019-06-11 13:25:00","drop_off_to_base":4,"advance_payment_amount":10}', '{"vat_registered":false,"booking_time":"2019-06-11 12:25","drop_off_to_base":"4.28","advance_payment_amount":"15"}', 'http://localhost/DMD/admin/booking/23?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-17 05:49:02', '2019-06-17 05:49:02'),
(179, 'App\\User', 1, 'updated', 23, 'App\\Booking', '{"late_booking_reason":null}', '{"late_booking_reason":""}', 'http://localhost/DMD/admin/booking/23?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-17 05:49:02', '2019-06-17 05:49:02'),
(180, 'App\\User', 1, 'updated', 23, 'App\\Booking', '{"driver_id":36,"total_distance":10.67}', '{"driver_id":"44","total_distance":6.390000000000001}', 'http://localhost/DMD/admin/booking/23?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-17 05:49:02', '2019-06-17 05:49:02'),
(181, 'App\\User', 1, 'updated', 23, 'App\\Booking', '{"price_with_vat":0,"price_without_vat":0}', '{"price_with_vat":21.47,"price_without_vat":21.47}', 'http://localhost/DMD/admin/invoice/group-invoice?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-17 05:50:15', '2019-06-17 05:50:15'),
(182, 'App\\User', 1, 'created', 24, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-16 14:50","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Chingrighata Crossing, Tangra, Calcutta, West Bengal","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"24","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"7.84","drop_off_to_base_time":"28","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":"20","vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":25,"id":24}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-17 05:59:21', '2019-06-17 05:59:21'),
(183, 'App\\User', 1, 'updated', 24, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":17.79,"total_duration":47,"total_price":34.25,"order_id":"O-10024","final_price":34.25,"invoice_price":34.25,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-17 05:59:21', '2019-06-17 05:59:21'),
(184, 'App\\User', 1, 'updated', 24, 'App\\Booking', '{"vat_registered":0,"booking_time":"2019-06-16 14:50:00","drop_off_to_base":8,"advance_payment_amount":20}', '{"vat_registered":false,"booking_time":"2019-06-12 14:50","drop_off_to_base":"7.84","advance_payment_amount":"25"}', 'http://localhost/DMD/admin/booking/24?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-17 05:59:46', '2019-06-17 05:59:46'),
(185, 'App\\User', 1, 'updated', 24, 'App\\Booking', '{"late_booking_reason":null}', '{"late_booking_reason":""}', 'http://localhost/DMD/admin/booking/24?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-17 05:59:46', '2019-06-17 05:59:46'),
(186, 'App\\User', 1, 'updated', 24, 'App\\Booking', '{"driver_id":36,"total_distance":17.79}', '{"driver_id":"44","total_distance":9.95}', 'http://localhost/DMD/admin/booking/24?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-17 05:59:46', '2019-06-17 05:59:46'),
(187, 'App\\User', 1, 'updated', 24, 'App\\Booking', '{"price_with_vat":0,"price_without_vat":0}', '{"price_with_vat":34.25,"price_without_vat":34.25}', 'http://localhost/DMD/admin/group-invoice-update-finalize?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-17 06:00:13', '2019-06-17 06:00:13'),
(188, 'App\\User', 1, 'created', 25, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-01 06:05","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Patuli, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"23","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"1.49","drop_off_to_base_time":"7","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":23,"id":25}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-17 06:22:21', '2019-06-17 06:22:21'),
(189, 'App\\User', 1, 'updated', 25, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":6.65,"total_duration":33,"total_price":17.09,"order_id":"O-10025","final_price":17.09,"invoice_price":17.09,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-17 06:22:21', '2019-06-17 06:22:21'),
(190, 'App\\User', 1, 'updated', 25, 'App\\Booking', '{"price_with_vat":0,"price_without_vat":0}', '{"price_with_vat":17.09,"price_without_vat":17.09}', 'http://localhost/DMD/admin/group-invoice-update-finalize?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-17 06:30:10', '2019-06-17 06:30:10'),
(191, 'App\\User', 1, 'created', 26, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-12 06:10","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Chingrighata, Tangra, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"24","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"8.13","drop_off_to_base_time":"30","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":25,"id":26}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-17 07:15:58', '2019-06-17 07:15:58'),
(192, 'App\\User', 1, 'updated', 26, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":18.380000000000003,"total_duration":49,"total_price":36.4,"order_id":"O-10026","final_price":36.4,"invoice_price":36.4,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-17 07:15:58', '2019-06-17 07:15:58'),
(193, 'App\\User', 1, 'created', 27, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-05 10:10","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Ultadanga, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"24","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"11.44","drop_off_to_base_time":"45","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":"20","vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":25,"id":27}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-17 07:16:29', '2019-06-17 07:16:29'),
(194, 'App\\User', 1, 'updated', 27, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":24.990000000000002,"total_duration":64,"total_price":53.05,"order_id":"O-10027","final_price":53.05,"invoice_price":53.05,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-17 07:16:29', '2019-06-17 07:16:29'),
(195, 'App\\User', 1, 'updated', 26, 'App\\Booking', '{"price_with_vat":0,"price_without_vat":0}', '{"price_with_vat":36.4,"price_without_vat":36.4}', 'http://localhost/DMD/admin/invoice/group-invoice?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-17 07:18:13', '2019-06-17 07:18:13'),
(196, 'App\\User', 1, 'updated', 27, 'App\\Booking', '{"price_with_vat":0,"price_without_vat":0}', '{"price_with_vat":53.05,"price_without_vat":53.05}', 'http://localhost/DMD/admin/invoice/group-invoice?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-17 07:18:13', '2019-06-17 07:18:13'),
(197, 'App\\User', 1, 'created', 28, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-05 06:10","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Ultadanga, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"24","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"11.44","drop_off_to_base_time":"45","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":"25","vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":25,"id":28}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-19 07:21:40', '2019-06-19 07:21:40'),
(198, 'App\\User', 1, 'updated', 28, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":24.990000000000002,"total_duration":64,"total_price":53.05,"order_id":"O-10028","final_price":53.05,"invoice_price":53.05,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-19 07:21:40', '2019-06-19 07:21:40'),
(199, 'App\\User', 1, 'created', 29, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-18 14:00","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Ruby Hall Clinic, Sasoon Road, Sangamvadi, Pune, Maharashtra, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"24","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"1294.23","drop_off_to_base_time":"2303","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":25,"id":29}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-19 08:05:59', '2019-06-19 08:05:59'),
(200, 'App\\User', 1, 'updated', 29, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":2585.9300000000003,"total_duration":2312,"total_price":2942.45,"order_id":"O-10029","final_price":2942.45,"invoice_price":2942.45,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-19 08:05:59', '2019-06-19 08:05:59'),
(201, 'App\\User', 1, 'created', 30, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-11 09:45","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Ultadanga, Calcutta, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"24","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"11.44","drop_off_to_base_time":"45","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":25,"id":30}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-19 08:06:31', '2019-06-19 08:06:31'),
(202, 'App\\User', 1, 'updated', 30, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":24.990000000000002,"total_duration":64,"total_price":53.05,"order_id":"O-10030","final_price":53.05,"invoice_price":53.05,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-19 08:06:31', '2019-06-19 08:06:31'),
(203, 'App\\User', 1, 'updated', 28, 'App\\Booking', '{"price_with_vat":0,"price_without_vat":0}', '{"price_with_vat":53.05,"price_without_vat":53.05}', 'http://localhost/DMD/admin/group-invoice-update-finalize?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-19 08:10:09', '2019-06-19 08:10:09'),
(204, 'App\\User', 1, 'updated', 30, 'App\\Booking', '{"price_with_vat":0,"price_without_vat":0}', '{"price_with_vat":53.05,"price_without_vat":53.05}', 'http://localhost/DMD/admin/group-invoice-update-finalize?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-19 08:11:16', '2019-06-19 08:11:16'),
(205, 'App\\User', 1, 'updated', 29, 'App\\Booking', '{"price_with_vat":0,"price_without_vat":0}', '{"price_with_vat":2942.45,"price_without_vat":2942.45}', 'http://localhost/DMD/admin/invoice/group-invoice?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-19 08:14:01', '2019-06-19 08:14:01'),
(206, 'App\\User', 1, 'created', 31, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-03 00:05","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Asansol, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"16","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"146.25","drop_off_to_base_time":"276","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":17,"id":31}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-19 08:14:47', '2019-06-19 08:14:47'),
(207, 'App\\User', 1, 'updated', 31, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":358.19,"total_duration":472,"total_price":273.13,"order_id":"O-10031","final_price":273.13,"invoice_price":273.13,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-19 08:14:47', '2019-06-19 08:14:47'),
(208, 'App\\User', 1, 'created', 32, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-12 09:05","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Durgapur, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"16","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"120.87","drop_off_to_base_time":"225","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":17,"id":32}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-19 08:15:08', '2019-06-19 08:15:08'),
(209, 'App\\User', 1, 'updated', 32, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":353.37,"total_duration":504,"total_price":292.44,"order_id":"O-10032","final_price":292.44,"invoice_price":292.44,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-19 08:15:08', '2019-06-19 08:15:08'),
(210, 'App\\User', 1, 'updated', 31, 'App\\Booking', '{"price_with_vat":0,"price_without_vat":0}', '{"price_with_vat":273.13,"price_without_vat":273.13}', 'http://localhost/DMD/admin/group-invoice-update-finalize?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-19 08:15:26', '2019-06-19 08:15:26'),
(211, 'App\\User', 1, 'updated', 32, 'App\\Booking', '{"price_with_vat":0,"price_without_vat":0}', '{"price_with_vat":292.44,"price_without_vat":292.44}', 'http://localhost/DMD/admin/group-invoice-update-finalize?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', NULL, '2019-06-19 08:15:26', '2019-06-19 08:15:26'),
(212, 'App\\User', 1, 'created', 33, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":"Test","companion_id":null,"booking_time":"2019-06-27 19:35","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Howrah Railway Station, Howrah, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"6","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"14.56","drop_off_to_base_time":"48","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":22,"id":33}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.44', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-06-25 08:38:25', '2019-06-25 08:38:25'),
(213, 'App\\User', 1, 'updated', 33, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":4228.6900000000005,"total_duration":8439,"total_price":5235.21,"order_id":"O-10033","final_price":5235.21,"invoice_price":5235.21,"driver_id":"36"}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.44', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-06-25 08:38:25', '2019-06-25 08:38:25'),
(214, 'App\\User', 1, 'created', 34, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"2","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-29 18:50","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Howrah Railway Station, Howrah, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"1","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"14.56","drop_off_to_base_time":"48","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":21,"id":34}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.43', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-26 06:53:33', '2019-06-26 06:53:33'),
(215, 'App\\User', 1, 'updated', 34, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":4220.110000000001,"total_duration":8423,"total_price":5236.92,"order_id":"O-10034","final_price":5236.92,"invoice_price":5236.92,"driver_id":"36"}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.43', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-26 06:53:33', '2019-06-26 06:53:33'),
(216, 'App\\User', 1, 'deleted', 33, 'App\\Booking', '{"id":33,"booking_source":1,"driver_id":36,"repeat_type":1,"order_id":"O-10033","users_id":1,"franchisees_id":1,"vat_registered":0,"companion_id":null,"trip_status":0,"client_id":22,"note":"Test","booking_time":"2019-06-27 19:35:00","repeat_booking_time":null,"repeat_booking_endtime":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Howrah Railway Station, Howrah, West Bengal, India","outward_companion":null,"outward_waiting":null,"journey_type":1,"journey_return_date":null,"return_companion":null,"return_waiting":null,"long_return":0,"base_return":1,"drop_off_to_base":15,"drop_off_to_base_time":48,"comfort_break":0,"return_comfort_break":0,"total_distance":4228.69,"companion_time":0,"total_duration":8439,"total_price":5235.21,"custom_price":null,"final_price":5235.21,"invoice_price":5235.21,"price_with_vat":0,"price_without_vat":0,"paying_bill":"Client","who_paying_bill":null,"payment_clientid":6,"payment_mode":1,"payment_status":0,"invoiced":null,"companion_driver_companion":1,"booking_or_quotes":1,"quote_previous_status":null,"group_invoice_id":null,"payment_date":null,"invoice_date":null,"late_booking_reason":null,"invoice_descriptio":null,"advance_payment_amount":null}', '[]', 'http://192.168.1.42/DMD/admin/booking/33?', '192.168.1.43', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-27 01:23:20', '2019-06-27 01:23:20'),
(217, 'App\\User', 1, 'created', 35, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-07-01 00:00","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Howrah Railway Station, Howrah, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"16","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"14.56","drop_off_to_base_time":"48","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"2","repeat_booking_endtime":"2019-07-27","advance_payment_amount":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":17,"id":35}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.43', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-27 01:27:57', '2019-06-27 01:27:57'),
(218, 'App\\User', 1, 'updated', 35, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":350.12,"total_duration":696,"total_price":427.38,"order_id":"O-10035","final_price":427.38,"invoice_price":427.38,"driver_id":"36"}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.43', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-27 01:27:57', '2019-06-27 01:27:57'),
(219, 'App\\User', 1, 'created', 36, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-07-08 00:00:00","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Howrah Railway Station, Howrah, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"16","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"14.56","drop_off_to_base_time":"48","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"2","repeat_booking_endtime":"2019-07-27","advance_payment_amount":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":17,"id":36}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.43', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-27 01:27:57', '2019-06-27 01:27:57'),
(220, 'App\\User', 1, 'updated', 36, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":350.12,"total_duration":696,"total_price":427.38,"order_id":"O-10036","final_price":427.38,"invoice_price":427.38,"driver_id":"36"}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.43', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-27 01:27:57', '2019-06-27 01:27:57'),
(221, 'App\\User', 1, 'created', 37, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-07-15 00:00:00","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Howrah Railway Station, Howrah, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"16","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"14.56","drop_off_to_base_time":"48","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"2","repeat_booking_endtime":"2019-07-27","advance_payment_amount":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":17,"id":37}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.43', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-27 01:27:57', '2019-06-27 01:27:57'),
(222, 'App\\User', 1, 'updated', 37, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":350.12,"total_duration":696,"total_price":427.38,"order_id":"O-10037","final_price":427.38,"invoice_price":427.38,"driver_id":"36"}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.43', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-27 01:27:57', '2019-06-27 01:27:57'),
(223, 'App\\User', 1, 'created', 38, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-07-22 00:00:00","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Howrah Railway Station, Howrah, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"16","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"14.56","drop_off_to_base_time":"48","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"2","repeat_booking_endtime":"2019-07-27","advance_payment_amount":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":17,"id":38}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.43', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-27 01:27:57', '2019-06-27 01:27:57'),
(224, 'App\\User', 1, 'updated', 38, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":350.12,"total_duration":696,"total_price":427.38,"order_id":"O-10038","final_price":427.38,"invoice_price":427.38,"driver_id":"36"}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.43', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-27 01:27:57', '2019-06-27 01:27:57'),
(225, 'App\\User', 1, 'created', 39, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-06-29 23:50","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Howrah Railway Station, Howrah, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"16","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"14.56","drop_off_to_base_time":"48","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"2","repeat_booking_endtime":"2019-07-27","advance_payment_amount":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":17,"id":39}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.43', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-27 01:27:57', '2019-06-27 01:27:57'),
(226, 'App\\User', 1, 'updated', 39, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":350.12,"total_duration":696,"total_price":427.38,"order_id":"O-10039","final_price":427.38,"invoice_price":427.38,"driver_id":"36"}', 'http://192.168.1.42/DMD/admin/booking?', '192.168.1.43', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-27 01:27:58', '2019-06-27 01:27:58'),
(227, 'App\\User', 1, 'deleted', 39, 'App\\Booking', '{"id":39,"booking_source":1,"driver_id":36,"repeat_type":2,"order_id":"O-10039","users_id":1,"franchisees_id":1,"vat_registered":0,"companion_id":null,"trip_status":0,"client_id":17,"note":null,"booking_time":"2019-06-29 23:50:00","repeat_booking_time":null,"repeat_booking_endtime":"2019-07-27 00:00:00","base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Howrah Railway Station, Howrah, West Bengal, India","outward_companion":null,"outward_waiting":null,"journey_type":1,"journey_return_date":null,"return_companion":null,"return_waiting":null,"long_return":0,"base_return":1,"drop_off_to_base":15,"drop_off_to_base_time":48,"comfort_break":0,"return_comfort_break":0,"total_distance":350.12,"companion_time":0,"total_duration":696,"total_price":427.38,"custom_price":null,"final_price":427.38,"invoice_price":427.38,"price_with_vat":0,"price_without_vat":0,"paying_bill":"Client","who_paying_bill":null,"payment_clientid":16,"payment_mode":1,"payment_status":0,"invoiced":null,"companion_driver_companion":1,"booking_or_quotes":1,"quote_previous_status":null,"group_invoice_id":null,"payment_date":null,"invoice_date":null,"late_booking_reason":null,"invoice_descriptio":null,"advance_payment_amount":null}', '[]', 'http://192.168.1.42/DMD/admin/booking/39?', '192.168.1.43', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', NULL, '2019-06-27 01:28:05', '2019-06-27 01:28:05'),
(228, 'App\\User', 1, 'created', 40, 'App\\Booking', '[]', '{"booking_source":1,"driver_id":36,"repeat_type":"2","order_id":"O-10035","users_id":1,"franchisees_id":1,"vat_registered":0,"companion_id":null,"trip_status":0,"client_id":17,"note":null,"booking_time":"2019-07-06 00:00","repeat_booking_time":null,"repeat_booking_endtime":"2019-07-27 00:00:00","base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Howrah Railway Station, Howrah, West Bengal, India","outward_companion":null,"outward_waiting":null,"journey_type":1,"journey_return_date":null,"return_companion":null,"return_waiting":null,"long_return":0,"base_return":1,"drop_off_to_base":15,"drop_off_to_base_time":48,"comfort_break":0,"return_comfort_break":0,"total_distance":350.12,"companion_time":0,"total_duration":696,"total_price":427.38,"custom_price":null,"final_price":427.38,"invoice_price":427.38,"price_with_vat":0,"price_without_vat":0,"paying_bill":"Client","who_paying_bill":null,"payment_clientid":16,"payment_mode":1,"payment_status":0,"invoiced":null,"companion_driver_companion":1,"booking_or_quotes":1,"quote_previous_status":null,"group_invoice_id":null,"payment_date":null,"invoice_date":null,"late_booking_reason":null,"invoice_descriptio":null,"advance_payment_amount":null,"id":40}', 'http://localhost/DMD/admin/booking/repet-booking/35?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-01 04:31:06', '2019-07-01 04:31:06'),
(229, 'App\\User', 1, 'updated', 40, 'App\\Booking', '{"order_id":"O-10035"}', '{"order_id":"O-10040"}', 'http://localhost/DMD/admin/booking/repet-booking/35?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-01 04:31:06', '2019-07-01 04:31:06'),
(230, 'App\\User', 1, 'created', 41, 'App\\Booking', '[]', '{"booking_source":1,"driver_id":36,"repeat_type":"2","order_id":"O-10040","users_id":1,"franchisees_id":1,"vat_registered":0,"companion_id":null,"trip_status":0,"client_id":17,"note":null,"booking_time":"2029-11-21 18:50","repeat_booking_time":null,"repeat_booking_endtime":"2019-07-27 00:00:00","base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Howrah Railway Station, Howrah, West Bengal, India","outward_companion":null,"outward_waiting":null,"journey_type":1,"journey_return_date":null,"return_companion":null,"return_waiting":null,"long_return":0,"base_return":1,"drop_off_to_base":15,"drop_off_to_base_time":48,"comfort_break":0,"return_comfort_break":0,"total_distance":350.12,"companion_time":0,"total_duration":696,"total_price":427.38,"custom_price":null,"final_price":427.38,"invoice_price":427.38,"price_with_vat":0,"price_without_vat":0,"paying_bill":"Client","who_paying_bill":null,"payment_clientid":16,"payment_mode":1,"payment_status":0,"invoiced":null,"companion_driver_companion":1,"booking_or_quotes":1,"quote_previous_status":null,"group_invoice_id":null,"payment_date":null,"invoice_date":null,"late_booking_reason":null,"invoice_descriptio":null,"advance_payment_amount":null,"id":41}', 'http://localhost/DMD/admin/booking/repet-booking/40?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-01 04:46:57', '2019-07-01 04:46:57'),
(231, 'App\\User', 1, 'updated', 41, 'App\\Booking', '{"order_id":"O-10040"}', '{"order_id":"O-10041"}', 'http://localhost/DMD/admin/booking/repet-booking/40?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-01 04:46:57', '2019-07-01 04:46:57');
INSERT INTO `audits` (`id`, `user_type`, `user_id`, `event`, `auditable_id`, `auditable_type`, `old_values`, `new_values`, `url`, `ip_address`, `user_agent`, `tags`, `created_at`, `updated_at`) VALUES
(232, 'App\\User', 1, 'created', 42, 'App\\Booking', '[]', '{"booking_source":1,"driver_id":36,"repeat_type":2,"order_id":"O-10041","users_id":1,"franchisees_id":1,"vat_registered":0,"companion_id":null,"trip_status":0,"client_id":17,"note":null,"booking_time":"2019-07-31 15:50","repeat_booking_time":null,"repeat_booking_endtime":"2019-07-27 00:00:00","base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Howrah Railway Station, Howrah, West Bengal, India","outward_companion":null,"outward_waiting":null,"journey_type":1,"journey_return_date":null,"return_companion":null,"return_waiting":null,"long_return":0,"base_return":1,"drop_off_to_base":15,"drop_off_to_base_time":48,"comfort_break":0,"return_comfort_break":0,"total_distance":350.12,"companion_time":0,"total_duration":696,"total_price":427.38,"custom_price":null,"final_price":427.38,"invoice_price":427.38,"price_with_vat":0,"price_without_vat":0,"paying_bill":"Client","who_paying_bill":null,"payment_clientid":16,"payment_mode":1,"payment_status":0,"invoiced":null,"companion_driver_companion":1,"booking_or_quotes":1,"quote_previous_status":null,"group_invoice_id":null,"payment_date":null,"invoice_date":null,"late_booking_reason":null,"invoice_descriptio":null,"advance_payment_amount":null,"id":42}', 'http://localhost/DMD/admin/booking/repet-booking/41?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-01 04:50:59', '2019-07-01 04:50:59'),
(233, 'App\\User', 1, 'updated', 42, 'App\\Booking', '{"order_id":"O-10041"}', '{"order_id":"O-10042"}', 'http://localhost/DMD/admin/booking/repet-booking/41?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-01 04:50:59', '2019-07-01 04:50:59'),
(234, 'App\\User', 1, 'created', 43, 'App\\Booking', '[]', '{"booking_source":1,"driver_id":36,"repeat_type":1,"order_id":"O-10019","users_id":1,"franchisees_id":1,"vat_registered":1,"companion_id":null,"trip_status":0,"client_id":23,"note":null,"booking_time":"2019-07-31 15:50","repeat_booking_time":null,"repeat_booking_endtime":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Ruby Hall Clinic, Sasoon Road, Sangamvadi, Pune, Maharashtra, India","outward_companion":null,"outward_waiting":null,"journey_type":1,"journey_return_date":null,"return_companion":null,"return_waiting":null,"long_return":0,"base_return":1,"drop_off_to_base":1294,"drop_off_to_base_time":2304,"comfort_break":0,"return_comfort_break":0,"total_distance":2588.68,"companion_time":0,"total_duration":2306,"total_price":2944.4,"custom_price":null,"final_price":2944.4,"invoice_price":3533.28,"price_with_vat":3533.28,"price_without_vat":2944.4,"paying_bill":"Client","who_paying_bill":null,"payment_clientid":23,"payment_mode":1,"payment_status":1,"invoiced":1,"companion_driver_companion":1,"booking_or_quotes":1,"quote_previous_status":null,"group_invoice_id":39,"payment_date":"2019-06-14 10:45:58","invoice_date":"2019-06-14 08:27:16","late_booking_reason":null,"invoice_descriptio":"Ajoy Nagar, Mukundapur, Calcutta, West Bengal, India to Ruby Hall Clinic, Sasoon Road, Sangamvadi, Pune, Maharashtra, India","advance_payment_amount":null,"id":43}', 'http://localhost/DMD/admin/booking/repet-booking/19?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-01 04:53:32', '2019-07-01 04:53:32'),
(235, 'App\\User', 1, 'updated', 43, 'App\\Booking', '{"order_id":"O-10019"}', '{"order_id":"O-10043"}', 'http://localhost/DMD/admin/booking/repet-booking/19?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-01 04:53:32', '2019-07-01 04:53:32'),
(236, 'App\\User', 1, 'created', 44, 'App\\Booking', '[]', '{"booking_source":1,"driver_id":36,"repeat_type":1,"order_id":"O-10043","users_id":1,"franchisees_id":1,"vat_registered":1,"companion_id":null,"trip_status":0,"client_id":23,"note":null,"booking_time":"2019-07-15 15:55","repeat_booking_time":null,"repeat_booking_endtime":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Ruby Hall Clinic, Sasoon Road, Sangamvadi, Pune, Maharashtra, India","outward_companion":null,"outward_waiting":null,"journey_type":1,"journey_return_date":null,"return_companion":null,"return_waiting":null,"long_return":0,"base_return":1,"drop_off_to_base":1294,"drop_off_to_base_time":2304,"comfort_break":0,"return_comfort_break":0,"total_distance":2588.68,"companion_time":0,"total_duration":2306,"total_price":2944.4,"custom_price":null,"final_price":2944.4,"invoice_price":3533.28,"price_with_vat":3533.28,"price_without_vat":2944.4,"paying_bill":"Client","who_paying_bill":null,"payment_clientid":23,"payment_mode":1,"payment_status":0,"invoiced":1,"companion_driver_companion":1,"booking_or_quotes":1,"quote_previous_status":null,"group_invoice_id":39,"payment_date":"2019-06-14 10:45:58","invoice_date":"2019-06-14 08:27:16","late_booking_reason":null,"invoice_descriptio":"Ajoy Nagar, Mukundapur, Calcutta, West Bengal, India to Ruby Hall Clinic, Sasoon Road, Sangamvadi, Pune, Maharashtra, India","advance_payment_amount":null,"id":44}', 'http://localhost/DMD/admin/booking/repet-booking/43?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-01 04:56:06', '2019-07-01 04:56:06'),
(237, 'App\\User', 1, 'updated', 44, 'App\\Booking', '{"order_id":"O-10043"}', '{"order_id":"O-10044"}', 'http://localhost/DMD/admin/booking/repet-booking/43?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-01 04:56:06', '2019-07-01 04:56:06'),
(241, 'App\\User', 1, 'created', 47, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-07-02 05:05","late_booking_reason":"ddf","base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Asansol, West Bengal, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"1","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"146.25","drop_off_to_base_time":"276","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":18,"id":47}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-01 06:59:48', '2019-07-01 06:59:48'),
(242, 'App\\User', 1, 'updated', 47, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":292.5,"total_duration":277,"total_price":347.46,"order_id":"O-10047","final_price":347.46,"invoice_price":347.46,"driver_id":"41"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-01 06:59:48', '2019-07-01 06:59:48'),
(243, 'App\\User', 1, 'created', 48, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":"asdasd","companion_id":null,"booking_time":"2019-07-04 02:10","late_booking_reason":"asdasd","base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Adyar, Chennai, Tamil Nadu, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"1","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"1054.45","drop_off_to_base_time":"1893","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":18,"id":48}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-01 07:01:01', '2019-07-01 07:01:01'),
(244, 'App\\User', 1, 'updated', 48, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":2107.7,"total_duration":1908,"total_price":2432.56,"order_id":"O-10048","final_price":2432.56,"invoice_price":2432.56,"driver_id":"44"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-01 07:01:01', '2019-07-01 07:01:01'),
(249, 'App\\User', 1, 'created', 53, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"2","booking_or_quotes":"1","custom_price":null,"note":"asd","companion_id":"48","booking_time":"2019-07-10 01:05","late_booking_reason":null,"base_location":"Garia, Calcutta, West Bengal, India","drop_location":"Adyar, Chennai, Tamil Nadu, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"1","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"1057.82","drop_off_to_base_time":"1912","companion_time":"3817","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":18,"id":53}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-01 07:03:13', '2019-07-01 07:03:13'),
(250, 'App\\User', 1, 'updated', 53, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":2110.41,"total_duration":1905,"total_price":2433.91,"order_id":"O-10053","final_price":2433.91,"invoice_price":2433.91,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-01 07:03:13', '2019-07-01 07:03:13'),
(251, 'App\\User', 1, 'created', 54, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":null,"companion_id":null,"booking_time":"2019-07-31 20:00","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Asansol, West Bengal, India","journey_type":"2","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"1","long_return":"1","journey_return_date":"2019-08-01 20:00","base_return":"1","drop_off_to_base":"146.25","drop_off_to_base_time":"276","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":18,"id":54}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-02 07:58:24', '2019-07-02 07:58:24'),
(252, 'App\\User', 1, 'updated', 54, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":581.48,"total_duration":536,"total_price":676.91,"order_id":"O-10054","final_price":676.91,"invoice_price":676.91,"driver_id":"36"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-02 07:58:24', '2019-07-02 07:58:24'),
(253, 'App\\User', 1, 'updated', 54, 'App\\Booking', '{"driver_id":36,"booking_time":"2019-07-31 20:00:00"}', '{"driver_id":"37","booking_time":"2019-08-01T14:24:00"}', 'http://localhost/DMD/admin/update-booking?bookingId=54&resourceId=37&booking_time=2019-08-01T14%3A24%3A00', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-08 05:19:33', '2019-07-08 05:19:33'),
(254, 'App\\User', 1, 'updated', 54, 'App\\Booking', '{"booking_time":"2019-08-01 14:24:00"}', '{"booking_time":"2019-08-01T16:24:00"}', 'http://localhost/DMD/admin/update-booking?bookingId=54-100&resourceId=37&booking_time=2019-08-01T16%3A24%3A00', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-08 05:22:05', '2019-07-08 05:22:05'),
(255, 'App\\User', 1, 'updated', 54, 'App\\Booking', '{"booking_time":"2019-08-01 16:24:00"}', '{"booking_time":"2019-08-01T18:24:00"}', 'http://localhost/DMD/admin/update-booking?bookingId=54-100&resourceId=37&booking_time=2019-08-01T18%3A24%3A00', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-08 05:23:23', '2019-07-08 05:23:23'),
(256, 'App\\User', 1, 'updated', 54, 'App\\Booking', '{"driver_id":37,"booking_time":"2019-08-01 18:24:00"}', '{"driver_id":"41","booking_time":"2019-08-01T18:24:00"}', 'http://localhost/DMD/admin/update-booking?bookingId=54-100&resourceId=41&booking_time=2019-08-01T18%3A24%3A00', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-08 05:23:33', '2019-07-08 05:23:33'),
(257, 'App\\User', 1, 'updated', 54, 'App\\Booking', '{"driver_id":41,"booking_time":"2019-08-01 18:24:00"}', '{"driver_id":"37","booking_time":"2019-08-01T18:24:00"}', 'http://localhost/DMD/admin/update-booking?bookingId=54-100&resourceId=37&booking_time=2019-08-01T18%3A24%3A00', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-08 05:24:18', '2019-07-08 05:24:18'),
(258, 'App\\User', 1, 'updated', 54, 'App\\Booking', '{"driver_id":37,"booking_time":"2019-08-01 18:24:00"}', '{"driver_id":"41","booking_time":"2019-08-01T18:24:00"}', 'http://localhost/DMD/admin/update-booking?bookingId=54-100&resourceId=41&booking_time=2019-08-01T18%3A24%3A00', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-08 05:25:57', '2019-07-08 05:25:57'),
(259, 'App\\User', 1, 'updated', 54, 'App\\Booking', '{"driver_id":41,"booking_time":"2019-08-01 18:24:00"}', '{"driver_id":"37","booking_time":"2019-08-01T18:24:00"}', 'http://localhost/DMD/admin/update-booking?type=2&bookingId=54-100&resourceId=37&booking_time=2019-08-01T18%3A24%3A00', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-08 05:27:03', '2019-07-08 05:27:03'),
(260, 'App\\User', 1, 'updated', 54, 'App\\Booking', '{"journey_return_date":"2019-08-01 20:00:00"}', '{"journey_return_date":"2019-08-01T13:54:00"}', 'http://localhost/DMD/admin/update-booking?type=2&bookingId=54-100&resourceId=37&booking_time=2019-08-01T13%3A54%3A00', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-08 05:28:22', '2019-07-08 05:28:22'),
(261, 'App\\User', 1, 'updated', 54, 'App\\Booking', '{"driver_id":37,"booking_time":"2019-08-01 18:24:00"}', '{"driver_id":"41","booking_time":"2019-08-01T09:54:00"}', 'http://localhost/DMD/admin/update-booking?type=1&bookingId=54&resourceId=41&booking_time=2019-08-01T09%3A54%3A00', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-08 05:28:34', '2019-07-08 05:28:34'),
(262, 'App\\User', 1, 'updated', 54, 'App\\Booking', '{"driver_id":41,"booking_time":"2019-08-01 09:54:00"}', '{"driver_id":"36","booking_time":"2019-08-01T03:54:00"}', 'http://localhost/DMD/admin/update-booking?type=1&bookingId=54&resourceId=36&booking_time=2019-08-01T03%3A54%3A00', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-08 05:28:45', '2019-07-08 05:28:45'),
(263, 'App\\User', 1, 'updated', 54, 'App\\Booking', '{"booking_time":"2019-08-01 03:54:00"}', '{"booking_time":"2019-08-01T00:24:00"}', 'http://localhost/DMD/admin/update-booking?type=1&bookingId=54&resourceId=36&booking_time=2019-08-01T00%3A24%3A00', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-08 05:29:04', '2019-07-08 05:29:04'),
(264, 'App\\User', 1, 'updated', 54, 'App\\Booking', '{"driver_id":36,"journey_return_date":"2019-08-01 13:54:00"}', '{"driver_id":"37","journey_return_date":"2019-08-01T03:18:00"}', 'http://localhost/DMD/admin/update-booking?type=2&bookingId=54-100&resourceId=37&booking_time=2019-08-01T03%3A18%3A00', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-08 05:29:12', '2019-07-08 05:29:12'),
(265, 'App\\User', 1, 'updated', 54, 'App\\Booking', '{"driver_id":37,"journey_return_date":"2019-08-01 03:18:00"}', '{"driver_id":"36","journey_return_date":"2019-08-01T03:18:00"}', 'http://localhost/DMD/admin/update-booking?type=2&bookingId=54-100&resourceId=36&booking_time=2019-08-01T03%3A18%3A00', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-08 05:33:00', '2019-07-08 05:33:00'),
(266, 'App\\User', 1, 'updated', 54, 'App\\Booking', '{"journey_return_date":"2019-08-01 03:18:00"}', '{"journey_return_date":"2019-08-01T03:12:00"}', 'http://localhost/DMD/admin/update-booking?type=2&bookingId=54-100&resourceId=36&booking_time=2019-08-01T03%3A12%3A00', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-08 05:34:53', '2019-07-08 05:34:53'),
(267, 'App\\User', 1, 'updated', 54, 'App\\Booking', '{"journey_return_date":"2019-08-01 03:12:00"}', '{"journey_return_date":"2019-08-01T05:36:00"}', 'http://localhost/DMD/admin/update-booking?type=2&bookingId=54-100&resourceId=36&booking_time=2019-08-01T05%3A36%3A00', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-08 05:35:12', '2019-07-08 05:35:12'),
(268, 'App\\User', 1, 'updated', 54, 'App\\Booking', '{"driver_id":36,"journey_return_date":"2019-08-01 05:36:00"}', '{"driver_id":"37","journey_return_date":"2019-08-01T08:06:00"}', 'http://localhost/DMD/admin/update-booking?type=2&bookingId=54-100&resourceId=37&booking_time=2019-08-01T08%3A06%3A00', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-08 05:36:05', '2019-07-08 05:36:05'),
(269, 'App\\User', 1, 'updated', 54, 'App\\Booking', '{"driver_id":37,"booking_time":"2019-08-01 00:24:00"}', '{"driver_id":"41","booking_time":"2019-08-01T03:24:00"}', 'http://localhost/DMD/admin/update-booking?type=1&bookingId=54&resourceId=41&booking_time=2019-08-01T03%3A24%3A00', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-08 05:41:09', '2019-07-08 05:41:09'),
(270, 'App\\User', 1, 'deleted', 54, 'App\\Booking', '{"id":54,"booking_source":1,"driver_id":41,"repeat_type":1,"order_id":"O-10054","users_id":1,"franchisees_id":1,"vat_registered":0,"companion_id":null,"trip_status":0,"client_id":18,"note":null,"booking_time":"2019-08-01 03:24:00","repeat_booking_time":null,"repeat_booking_endtime":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Asansol, West Bengal, India","outward_companion":null,"outward_waiting":null,"journey_type":2,"journey_return_date":"2019-08-01 08:06:00","return_companion":null,"return_waiting":null,"long_return":1,"base_return":1,"drop_off_to_base":146,"drop_off_to_base_time":276,"comfort_break":0,"return_comfort_break":0,"total_distance":581.48,"companion_time":0,"total_duration":536,"total_price":676.91,"custom_price":null,"final_price":676.91,"invoice_price":676.91,"price_with_vat":0,"price_without_vat":0,"paying_bill":"Client","who_paying_bill":null,"payment_clientid":1,"payment_mode":1,"payment_status":0,"invoiced":null,"companion_driver_companion":1,"booking_or_quotes":1,"quote_previous_status":null,"group_invoice_id":null,"payment_date":null,"invoice_date":null,"late_booking_reason":null,"invoice_descriptio":null,"advance_payment_amount":null}', '[]', 'http://localhost/DMD/admin/booking/54?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-08 08:12:11', '2019-07-08 08:12:11'),
(271, 'App\\User', 1, 'deleted', 36, 'App\\Booking', '{"id":36,"booking_source":1,"driver_id":36,"repeat_type":2,"order_id":"O-10036","users_id":1,"franchisees_id":1,"vat_registered":0,"companion_id":null,"trip_status":0,"client_id":17,"note":null,"booking_time":"2019-07-08 00:00:00","repeat_booking_time":null,"repeat_booking_endtime":"2019-07-27 00:00:00","base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Howrah Railway Station, Howrah, West Bengal, India","outward_companion":null,"outward_waiting":null,"journey_type":1,"journey_return_date":null,"return_companion":null,"return_waiting":null,"long_return":0,"base_return":1,"drop_off_to_base":15,"drop_off_to_base_time":48,"comfort_break":0,"return_comfort_break":0,"total_distance":350.12,"companion_time":0,"total_duration":696,"total_price":427.38,"custom_price":null,"final_price":427.38,"invoice_price":427.38,"price_with_vat":0,"price_without_vat":0,"paying_bill":"Client","who_paying_bill":null,"payment_clientid":16,"payment_mode":1,"payment_status":0,"invoiced":null,"companion_driver_companion":1,"booking_or_quotes":1,"quote_previous_status":null,"group_invoice_id":null,"payment_date":null,"invoice_date":null,"late_booking_reason":null,"invoice_descriptio":null,"advance_payment_amount":null}', '[]', 'http://localhost/DMD/admin/booking/36?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-08 08:12:31', '2019-07-08 08:12:31'),
(272, 'App\\User', 1, 'updated', 35, 'App\\Booking', '{"trip_status":0}', '{"trip_status":4}', 'http://localhost/DMD/admin/booking/cancel/35?_token=AWEQ52malbKKdwiQyyjjdnyowdXCr2mhzma6n0xZ', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-08 08:20:30', '2019-07-08 08:20:30'),
(273, 'App\\User', 1, 'updated', 37, 'App\\Booking', '{"trip_status":0}', '{"trip_status":4}', 'http://localhost/DMD/admin/booking/cancel/37?_token=AWEQ52malbKKdwiQyyjjdnyowdXCr2mhzma6n0xZ', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-08 08:23:55', '2019-07-08 08:23:55'),
(274, 'App\\User', 1, 'updated', 35, 'App\\Booking', '{"price_with_vat":0,"price_without_vat":0}', '{"price_with_vat":427.38,"price_without_vat":427.38}', 'http://localhost/DMD/admin/invoice/group-invoice?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-08 08:34:41', '2019-07-08 08:34:41'),
(275, 'App\\User', 1, 'updated', 37, 'App\\Booking', '{"price_with_vat":0,"price_without_vat":0}', '{"price_with_vat":427.38,"price_without_vat":427.38}', 'http://localhost/DMD/admin/invoice/group-invoice?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-08 08:34:41', '2019-07-08 08:34:41'),
(276, 'App\\User', 1, 'updated', 38, 'App\\Booking', '{"trip_status":0}', '{"trip_status":4}', 'http://localhost/DMD/admin/booking/cancel/38?_token=22wWlJz807nmRqjPtKztrUlXnM4BLiqRHSo3C2DX', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-09 07:17:30', '2019-07-09 07:17:30'),
(277, 'App\\User', 1, 'updated', 38, 'App\\Booking', '{"price_with_vat":0,"price_without_vat":0}', '{"price_with_vat":427.38,"price_without_vat":427.38}', 'http://localhost/DMD/admin/invoice/group-invoice?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-09 07:17:52', '2019-07-09 07:17:52'),
(278, 'App\\User', 1, 'created', 55, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":"NOTE","companion_id":null,"booking_time":"2019-07-27 18:54","late_booking_reason":null,"base_location":"Garia Station Road, Garia Place, Garia, West Bengal, India","drop_location":"Agra, Uttar Pradesh, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"1","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"805.05","drop_off_to_base_time":"1463","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":18,"id":55}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-09 07:20:46', '2019-07-09 07:20:46'),
(279, 'App\\User', 1, 'updated', 55, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":1608.34,"total_duration":1455,"total_price":1854.86,"order_id":"O-10055","final_price":1854.86,"invoice_price":1854.86,"driver_id":"44"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-09 07:20:46', '2019-07-09 07:20:46'),
(280, 'App\\User', 1, 'created', 56, 'App\\Booking', '[]', '{"booking_source":"1","companion_driver_companion":"1","booking_or_quotes":"1","custom_price":null,"note":"No","companion_id":null,"booking_time":"2019-07-31 18:21","late_booking_reason":null,"base_location":"Garia, Calcutta, West Bengal, India","drop_location":"Dungarpur, Rajasthan, India","journey_type":"1","payment_mode":"1","paying_bill":"Client","who_paying_bill":null,"payment_clientid":"1","long_return":"0","journey_return_date":null,"base_return":"1","drop_off_to_base":"1205.33","drop_off_to_base_time":"2132","companion_time":"0","outward_companion":null,"outward_waiting":null,"comfort_break":"0","return_companion":null,"return_waiting":null,"return_comfort_break":"0","repeat_type":"1","repeat_booking_endtime":null,"advance_payment_amount":null,"vat_registered":false,"users_id":1,"franchisees_id":"1","client_id":18,"id":56}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-09 07:21:58', '2019-07-09 07:21:58'),
(281, 'App\\User', 1, 'updated', 56, 'App\\Booking', '{"total_distance":null,"total_duration":null,"total_price":null,"order_id":null,"final_price":null,"invoice_price":null,"driver_id":null}', '{"total_distance":2408.88,"total_duration":2122,"total_price":2724.67,"order_id":"O-10056","final_price":2724.67,"invoice_price":2724.67,"driver_id":"37"}', 'http://localhost/DMD/admin/booking?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-09 07:21:58', '2019-07-09 07:21:58'),
(282, 'App\\User', 1, 'updated', 56, 'App\\Booking', '{"trip_status":0}', '{"trip_status":4}', 'http://192.168.1.42/DMD/admin/booking/cancel/56?_token=OzNDw6MYvS07llU08uwShg4SRGirLGaqyIymhZrD', '192.168.1.213', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-09 07:58:55', '2019-07-09 07:58:55'),
(283, 'App\\User', 1, 'updated', 56, 'App\\Booking', '{"driver_id":37,"booking_time":"2019-07-31 18:21:00"}', '{"driver_id":"44","booking_time":"2019-07-31T16:21:00"}', 'http://192.168.1.42/DMD/admin/update-booking?type=1&bookingId=56&resourceId=44&booking_time=2019-07-31T16%3A21%3A00', '192.168.1.213', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-09 08:02:36', '2019-07-09 08:02:36'),
(284, 'App\\User', 1, 'updated', 56, 'App\\Booking', '{"price_with_vat":0,"price_without_vat":0}', '{"price_with_vat":2724.67,"price_without_vat":2724.67}', 'http://localhost/DMD/admin/invoice/group-invoice?', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', NULL, '2019-07-11 05:00:28', '2019-07-11 05:00:28');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `booking_source` int(11) NOT NULL DEFAULT '1' COMMENT '1=>''phone'', 		2=>''email'',  		3=>''in person or text''',
  `driver_id` int(11) DEFAULT NULL,
  `repeat_type` int(11) DEFAULT NULL,
  `order_id` varchar(10) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `franchisees_id` int(11) NOT NULL,
  `vat_registered` int(11) DEFAULT '1',
  `companion_id` int(10) DEFAULT NULL,
  `trip_status` int(11) DEFAULT '0' COMMENT '1=>Start, 2=>Complete,3=>Breakdown, 4=>Cancel',
  `client_id` int(10) DEFAULT NULL,
  `note` text,
  `booking_time` datetime DEFAULT NULL,
  `repeat_booking_time` datetime DEFAULT NULL,
  `repeat_booking_endtime` datetime DEFAULT NULL,
  `base_location` varchar(255) NOT NULL,
  `drop_location` varchar(255) NOT NULL,
  `outward_companion` varchar(255) DEFAULT NULL,
  `outward_waiting` int(11) DEFAULT NULL,
  `journey_type` int(11) NOT NULL COMMENT '1=>On way,2=>Return',
  `journey_return_date` datetime DEFAULT NULL,
  `return_companion` int(11) DEFAULT NULL,
  `return_waiting` int(11) DEFAULT NULL,
  `long_return` int(11) DEFAULT '0',
  `base_return` int(11) DEFAULT '0',
  `drop_off_to_base` int(11) DEFAULT NULL,
  `drop_off_to_base_time` int(11) DEFAULT NULL,
  `comfort_break` int(11) DEFAULT NULL,
  `return_comfort_break` int(11) DEFAULT NULL,
  `total_distance` double(10,2) DEFAULT NULL,
  `companion_time` double(10,2) NOT NULL DEFAULT '0.00',
  `total_duration` int(11) DEFAULT NULL,
  `total_price` double(10,2) DEFAULT NULL,
  `custom_price` double(10,2) DEFAULT NULL,
  `final_price` double(10,2) DEFAULT NULL,
  `invoice_price` double(10,2) DEFAULT NULL,
  `price_with_vat` double(10,2) NOT NULL DEFAULT '0.00',
  `price_without_vat` double(10,2) NOT NULL DEFAULT '0.00',
  `paying_bill` varchar(255) DEFAULT NULL,
  `who_paying_bill` varchar(255) DEFAULT NULL,
  `payment_clientid` int(10) DEFAULT NULL,
  `payment_mode` int(11) NOT NULL COMMENT '1=>Cash,2=>Credit',
  `payment_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=>Unpaid,1=>Success',
  `invoiced` int(11) DEFAULT NULL,
  `companion_driver_companion` int(11) DEFAULT NULL COMMENT '1=>''Companion Driver only'',2=>"Companion Driver and Companion"',
  `booking_or_quotes` int(11) DEFAULT NULL COMMENT '1=>''Booking'',2=>"Quotes"',
  `quote_previous_status` int(11) DEFAULT NULL,
  `group_invoice_id` int(11) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `invoice_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `late_booking_reason` varchar(255) DEFAULT NULL,
  `invoice_descriptio` text,
  `advance_payment_amount` double(10,2) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `booking_source`, `driver_id`, `repeat_type`, `order_id`, `users_id`, `franchisees_id`, `vat_registered`, `companion_id`, `trip_status`, `client_id`, `note`, `booking_time`, `repeat_booking_time`, `repeat_booking_endtime`, `base_location`, `drop_location`, `outward_companion`, `outward_waiting`, `journey_type`, `journey_return_date`, `return_companion`, `return_waiting`, `long_return`, `base_return`, `drop_off_to_base`, `drop_off_to_base_time`, `comfort_break`, `return_comfort_break`, `total_distance`, `companion_time`, `total_duration`, `total_price`, `custom_price`, `final_price`, `invoice_price`, `price_with_vat`, `price_without_vat`, `paying_bill`, `who_paying_bill`, `payment_clientid`, `payment_mode`, `payment_status`, `invoiced`, `companion_driver_companion`, `booking_or_quotes`, `quote_previous_status`, `group_invoice_id`, `payment_date`, `invoice_date`, `created_at`, `late_booking_reason`, `invoice_descriptio`, `advance_payment_amount`, `updated_at`, `deleted_at`) VALUES
(1, 1, 44, 1, 'O-10001', 1, 1, 0, NULL, 2, 20, NULL, '2019-06-13 12:30:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Sealdah Railway Station, Sealdah Flyover, Sealdah, Raja Bazar, Calcutta, West Bengal, India', '10', 10, 1, NULL, NULL, NULL, 0, 1, 10, 41, 1, 0, 24.07, 0.00, 110, 70.50, NULL, 70.50, 170.50, 170.50, 170.50, 'Client', NULL, 6, 1, 1, 1, 1, 1, NULL, 26, '2019-06-03 10:53:35', '2019-06-03 10:29:42', '2019-06-03 01:29:48', '', 'Dumdum, Calcutta, West Bengal, India to Sealdah Railway Station, Sealdah Flyover, Sealdah, Raja Bazar, Calcutta, West Bengal, India', 0.00, '2019-06-03 05:23:35', NULL),
(2, 1, 36, 1, 'O-10002', 1, 1, 1, NULL, 2, 20, NULL, '2019-06-02 13:25:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Sealdah Railway Station, Sealdah Flyover, Sealdah, Raja Bazar, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 10, 41, 0, 0, 19.25, 0.00, 43, 33.90, NULL, 33.90, 160.68, 160.68, 133.90, 'Client', NULL, 1, 1, 1, 1, 1, 1, NULL, 26, '2019-06-03 10:53:35', '2019-06-03 10:29:42', '2019-06-03 02:27:01', NULL, 'Ruby General Hospital, E. M. Bypass, Sector I, Kasba Golpark, Calcutta, West Bengal, India to Sealdah Railway Station, Sealdah Flyover, Sealdah, Raja Bazar, Calcutta, West Bengal, India', 0.00, '2019-06-03 05:23:35', NULL),
(3, 1, 36, 1, 'O-10003', 1, 1, 1, NULL, 2, 20, NULL, '2019-06-02 00:00:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Kolkata Railway Station (Chitpur Station), Belgachia, Kolkata, West Bengal, India', '100', NULL, 1, NULL, NULL, NULL, 0, 1, 13, 51, 0, 0, 32.93, 0.00, 177, 74.01, NULL, 74.01, 88.81, 88.81, 74.01, 'Client', NULL, 6, 1, 1, 1, 1, 1, NULL, 26, '2019-06-03 10:53:35', '2019-06-03 10:29:42', '2019-06-03 03:48:48', NULL, '456,456/1 Lat Krabang 52 Yaek 2, Lat Krabang, Bangkok, Thailand to Kolkata Railway Station (Chitpur Station), Belgachia, Kolkata, West Bengal, India', 0.00, '2019-06-03 05:23:35', NULL),
(4, 1, 36, 1, 'O-10004', 1, 1, 1, NULL, 2, 22, NULL, '2019-06-04 01:05:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Sealdah Railway Station, Sealdah Flyover, Sealdah, Raja Bazar, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 10, 41, 0, 0, 19.08, 0.00, 41, 45.77, NULL, 45.77, 98.92, 98.92, 85.77, 'Client', NULL, 6, 1, 0, 1, 1, 1, NULL, 27, NULL, '2019-06-03 11:44:46', '2019-06-03 05:58:31', NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India to Sealdah Railway Station, Sealdah Flyover, Sealdah, Raja Bazar, Calcutta, West Bengal, India', 0.00, '2019-06-03 06:14:46', NULL),
(5, 1, 36, 1, 'O-10005', 1, 1, 1, NULL, 2, 22, NULL, '2019-06-03 00:00:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Dum Dum Airport (CCU), Jessore Road, Dum Dum, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 16, 52, 0, 0, 31.18, 0.00, 52, 57.13, NULL, 57.13, 68.56, 68.56, 57.13, 'Client', NULL, 6, 1, 0, 1, 1, 1, NULL, 28, NULL, '2019-06-04 13:34:59', '2019-06-04 08:04:06', NULL, 'Garia, Calcutta, West Bengal, India to Dum Dum Airport (CCU), Jessore Road, Dum Dum, Calcutta, West Bengal, India', 0.00, '2019-06-04 08:04:59', NULL),
(6, 1, 36, 1, 'O-10006', 1, 1, 1, NULL, 2, 22, NULL, '2019-06-01 03:15:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Dum Dum Airport (CCU), Jessore Road, Dum Dum, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 16, 52, 0, 0, 31.18, 0.00, 52, 57.13, NULL, 57.13, 68.56, 68.56, 57.13, 'Client', NULL, 6, 1, 1, 1, 1, 1, NULL, 29, '2019-06-07 11:01:13', '2019-06-07 06:11:28', '2019-06-04 08:14:28', NULL, NULL, 0.00, '2019-06-07 05:31:13', NULL),
(7, 1, 44, 1, 'O-10007', 1, 1, 1, NULL, 2, 17, NULL, '2019-06-06 06:30:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Ajay Nagar, Mukundapur, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 3, 10, 0, 0, 22.07, 0.00, 88, 46.42, NULL, 46.42, 55.70, 55.70, 46.42, 'Client', NULL, NULL, 1, 1, 1, 1, 1, NULL, 30, '2019-06-07 06:18:57', '2019-06-07 06:17:18', '2019-06-07 00:43:51', '', 'Shyambazar 5 Point Crossing, Bag Bazar Colony, Bidhan Sarani, Baghbazar, Calcutta, West Bengal, India to Ajay Nagar, Mukundapur, Calcutta, West Bengal, India', 0.00, '2019-06-07 00:48:57', NULL),
(8, 1, 37, 1, 'O-10008', 1, 1, 1, NULL, 2, 17, NULL, '2019-06-06 16:25:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Esplanade Bus Stop, Maidan, Esplanade, Dharmatala, Taltala, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 12, 40, 0, 0, 32.34, 0.00, 95, 56.80, NULL, 56.80, 68.16, 68.16, 56.80, 'Client', NULL, 16, 1, 0, 1, 1, 1, NULL, 31, NULL, '2019-06-07 10:59:49', '2019-06-07 05:28:35', NULL, NULL, 0.00, '2019-06-07 05:29:49', NULL),
(9, 1, 36, 1, 'O-10009', 1, 1, 1, NULL, 2, 17, NULL, '2019-06-06 18:40:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Asansol, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 146, 276, 0, 0, 358.19, 0.00, 472, 273.13, NULL, 273.13, 327.76, 327.76, 273.13, 'Client', NULL, 16, 1, 0, 1, 1, 1, NULL, 32, NULL, '2019-06-07 14:25:59', '2019-06-07 07:41:30', NULL, NULL, 0.00, '2019-06-07 08:55:59', NULL),
(10, 1, 36, 1, 'O-10010', 1, 1, 1, NULL, 2, 22, NULL, '2019-06-10 00:00:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Sealdah Railway Station, Sealdah Flyover, Sealdah, Raja Bazar, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 10, 41, 0, 0, 34.05, 0.00, 90, 50.50, NULL, 50.50, 60.60, 60.60, 50.50, 'Client', NULL, 6, 1, 0, 1, 1, 1, NULL, 33, NULL, '2019-06-10 07:00:33', '2019-06-10 01:28:27', NULL, 'Dumdum, Calcutta, West Bengal, India to Sealdah Railway Station, Sealdah Flyover, Sealdah, Raja Bazar, Calcutta, West Bengal, India', 0.00, '2019-06-10 01:30:33', NULL),
(11, 1, 36, 1, 'O-10011', 1, 1, 1, NULL, 2, 22, NULL, '2019-06-09 15:55:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Ruby General Hospital, Anandapur Main Road, Sector I, East Kolkata Township, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 4, 16, 0, 0, 8.76, 0.00, 19, 12.42, NULL, 12.42, 14.90, 14.90, 12.42, 'Client', NULL, 6, 1, 0, 1, 1, 1, NULL, 35, NULL, '2019-06-11 12:45:20', '2019-06-10 05:00:02', NULL, 'Ajay Nagar, Mukundapur, Calcutta, West Bengal, India to Ruby General Hospital, Anandapur Main Road, Sector I, East Kolkata Township, Calcutta, West Bengal, India', 0.00, '2019-06-11 07:15:20', NULL),
(12, 1, 36, 1, 'O-10012', 1, 1, 1, NULL, 2, 21, NULL, '2019-06-09 05:25:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Tollygunge, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 4, 23, 0, 0, 8.52, 0.00, 30, 14.32, NULL, 14.32, 17.18, 17.18, 14.32, 'Client', NULL, 8, 1, 0, 1, 1, 1, NULL, 34, NULL, '2019-06-10 10:36:16', '2019-06-10 05:01:08', NULL, NULL, 0.00, '2019-06-10 05:06:16', NULL),
(13, 1, 36, 1, 'O-10013', 1, 1, 1, NULL, 2, 21, NULL, '2019-06-09 08:40:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Park Street, Beniapukur, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 9, 31, 0, 0, 17.51, 0.00, 54, 25.33, NULL, 25.33, 30.40, 30.40, 25.33, 'Client', NULL, 1, 1, 0, 1, 1, 1, NULL, 34, NULL, '2019-06-10 10:36:16', '2019-06-10 05:04:57', NULL, NULL, 0.00, '2019-06-10 05:06:16', NULL),
(14, 1, 44, 1, 'O-10014', 1, 1, 1, NULL, 2, 22, NULL, '2019-06-01 03:15:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Park Street, Beniapukur, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 9, 31, 0, 0, 9.19, 0.00, 33, 23.64, 25.50, 25.50, 30.60, 30.60, 25.50, 'Client', NULL, 6, 1, 0, 1, 1, 1, NULL, 35, NULL, '2019-06-11 12:45:20', '2019-06-11 04:29:06', '', 'Ruby General Hospital, Anandapur Main Road, Sector I, East Kolkata Township, Calcutta, West Bengal, India to Park Street, Beniapukur, Calcutta, West Bengal, India', 21.20, '2019-06-11 07:15:20', NULL),
(15, 1, 36, 1, 'O-10015', 1, 1, 1, NULL, 2, 17, NULL, '2019-06-10 17:10:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Airport, Dumdum, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 16, 52, 0, 0, 33.58, 0.00, 81, 38.69, NULL, 38.69, 46.43, 46.43, 38.69, 'Client', NULL, 16, 1, 1, 1, 1, 1, NULL, 36, '2019-06-27 12:23:18', '2019-06-11 13:29:03', '2019-06-11 07:20:38', NULL, NULL, 20.00, '2019-06-27 06:53:18', NULL),
(16, 1, 36, 1, 'O-10016', 1, 1, 1, NULL, 2, 17, NULL, '2019-06-07 17:15:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Howrah Railway Station, Howrah, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 15, 48, 0, 0, 30.07, 0.00, 70, 31.60, NULL, 31.60, 37.92, 37.92, 31.60, 'Client', NULL, 16, 1, 1, 1, 1, 1, NULL, 36, '2019-06-27 12:23:18', '2019-06-11 13:29:03', '2019-06-11 07:26:47', NULL, NULL, 10.00, '2019-06-27 06:53:18', NULL),
(17, 1, 44, 1, 'O-10017', 1, 1, 1, NULL, 2, 22, NULL, '2019-06-02 04:20:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Howrah Railway Station, Howrah, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 15, 48, 0, 0, 13.43, 0.00, 69, 32.57, NULL, 32.57, 39.08, 39.08, 32.57, 'Client', NULL, 6, 1, 0, 1, 1, 1, NULL, 37, NULL, '2019-06-11 14:29:25', '2019-06-11 08:53:41', '', NULL, 15.00, '2019-06-11 08:59:25', NULL),
(18, 1, 36, 1, 'O-10018', 1, 1, 1, NULL, 2, 17, NULL, '2019-06-13 10:10:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Dumdum Metro Station Parking Yard, South Sinthee Road, Pearabagan, South Sinthee, Biswanath Colony, Sinthee, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 14, 57, 0, 0, 29.21, 0.00, 70, 50.40, NULL, 50.40, 60.48, 60.48, 50.40, 'Client', NULL, 16, 1, 0, 1, 1, 1, NULL, 38, NULL, '2019-06-14 08:24:11', '2019-06-14 01:16:22', NULL, NULL, 20.00, '2019-06-14 02:54:11', NULL),
(19, 1, 36, 1, 'O-10019', 1, 1, 1, NULL, 2, 23, NULL, '2019-06-13 09:05:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Ruby Hall Clinic, Sasoon Road, Sangamvadi, Pune, Maharashtra, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 1294, 2304, 0, 0, 2588.68, 0.00, 2306, 2944.40, NULL, 2944.40, 3533.28, 3533.28, 2944.40, 'Client', NULL, 23, 1, 1, 1, 1, 1, NULL, 39, '2019-06-14 10:45:58', '2019-06-14 08:27:16', '2019-06-14 02:56:26', NULL, 'Ajoy Nagar, Mukundapur, Calcutta, West Bengal, India to Ruby Hall Clinic, Sasoon Road, Sangamvadi, Pune, Maharashtra, India', NULL, '2019-06-14 05:15:58', NULL),
(20, 1, 36, 1, 'O-10020', 1, 1, 1, NULL, 2, 23, NULL, '2019-06-13 09:25:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Ajay Nagar, Mukundapur, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 3, 10, 0, 0, 7.70, 0.00, 31, 14.70, NULL, 14.70, 17.64, 17.64, 14.70, 'Client', NULL, 23, 1, 0, 1, 1, 1, NULL, 40, NULL, '2019-06-14 10:04:24', '2019-06-14 04:30:20', NULL, NULL, 10.00, '2019-06-14 04:34:24', NULL),
(21, 1, 36, 1, 'O-10021', 1, 1, 1, NULL, 2, 23, NULL, '2019-06-13 10:10:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Dumdum Metro Station Parking Yard, South Sinthee Road, Pearabagan, South Sinthee, Biswanath Colony, Sinthee, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 14, 57, 0, 0, 31.77, 0.00, 78, 51.04, NULL, 51.04, 61.25, 61.25, 51.04, 'Client', NULL, 23, 1, 0, 1, 1, 1, NULL, 40, NULL, '2019-06-14 10:04:24', '2019-06-14 04:31:17', NULL, NULL, 30.00, '2019-06-14 04:34:24', NULL),
(22, 1, 36, 1, 'O-10022', 1, 1, 1, NULL, 2, 25, NULL, '2019-06-13 09:25:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Ajay Nagar, Mukundapur, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 3, 10, 0, 0, 7.71, 0.00, 31, 15.61, NULL, 15.61, 18.73, 18.73, 15.61, 'Client', NULL, 24, 1, 1, 1, 1, 1, NULL, 41, '2019-06-14 11:04:02', '2019-06-14 10:42:51', '2019-06-14 05:12:25', NULL, NULL, 10.00, '2019-06-14 05:34:02', NULL),
(23, 1, 44, 1, 'O-10023', 1, 1, 0, NULL, 2, 25, NULL, '2019-06-11 12:25:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Ruby General Hospital, Anandapur Main Road, Sector I, East Kolkata Township, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 4, 16, 0, 0, 6.39, 0.00, 36, 21.47, NULL, 21.47, 21.47, 21.47, 21.47, 'Client', NULL, 24, 1, 0, 1, 1, 1, NULL, 42, NULL, '2019-06-17 11:20:15', '2019-06-17 05:48:28', '', NULL, 15.00, '2019-06-17 05:50:15', NULL),
(24, 1, 44, 1, 'O-10024', 1, 1, 0, NULL, 2, 25, NULL, '2019-06-12 14:50:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Chingrighata Crossing, Tangra, Calcutta, West Bengal', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 8, 28, 0, 0, 9.95, 0.00, 47, 34.25, NULL, 34.25, 34.25, 34.25, 34.25, 'Client', NULL, 24, 1, 1, 1, 1, 1, NULL, 43, '2019-06-17 11:32:25', '2019-06-17 11:30:13', '2019-06-17 05:59:21', '', 'Jadavpur, Calcutta, West Bengal, India to Chingrighata Crossing, Tangra, Calcutta, West Bengal', 25.00, '2019-06-17 06:02:25', NULL),
(25, 1, 36, 1, 'O-10025', 1, 1, 0, NULL, 2, 23, NULL, '2019-06-01 06:05:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Patuli, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 1, 7, 0, 0, 6.65, 0.00, 33, 17.09, NULL, 17.09, 17.09, 17.09, 17.09, 'Client', NULL, 23, 1, 0, 1, 1, 1, NULL, 44, NULL, '2019-06-17 12:00:10', '2019-06-17 06:22:21', NULL, 'Jadavpur 8B Bus Stand, Jadavpur, Calcutta, West Bengal, India to Patuli, Calcutta, West Bengal, India', NULL, '2019-06-17 06:30:10', NULL),
(26, 1, 36, 1, 'O-10026', 1, 1, 0, NULL, 2, 25, NULL, '2019-06-12 06:10:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Chingrighata, Tangra, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 8, 30, 0, 0, 18.38, 0.00, 49, 36.40, NULL, 36.40, 36.40, 36.40, 36.40, 'Client', NULL, 24, 1, 0, 1, 1, 1, NULL, 45, NULL, '2019-06-17 12:48:13', '2019-06-17 07:15:58', NULL, NULL, NULL, '2019-06-17 07:18:13', NULL),
(27, 1, 36, 1, 'O-10027', 1, 1, 0, NULL, 2, 25, NULL, '2019-06-05 10:10:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Ultadanga, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 11, 45, 0, 0, 24.99, 0.00, 64, 53.05, NULL, 53.05, 53.05, 53.05, 53.05, 'Client', NULL, 24, 1, 0, 1, 1, 1, NULL, 45, NULL, '2019-06-17 12:48:13', '2019-06-17 07:16:29', NULL, NULL, 20.00, '2019-06-17 07:18:13', NULL),
(28, 1, 36, 1, 'O-10028', 1, 1, 0, NULL, 2, 25, NULL, '2019-06-05 06:10:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Ultadanga, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 11, 45, 0, 0, 24.99, 0.00, 64, 53.05, NULL, 53.05, 53.05, 53.05, 53.05, 'Client', NULL, 24, 1, 0, 1, 1, 1, NULL, 49, NULL, '2019-06-19 13:40:09', '2019-06-19 07:21:40', NULL, 'Jadavpur, Calcutta, West Bengal, India to Ultadanga, Calcutta, West Bengal, India', 25.00, '2019-06-19 08:10:09', NULL),
(29, 1, 36, 1, 'O-10029', 1, 1, 0, NULL, 2, 25, NULL, '2019-06-18 14:00:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Ruby Hall Clinic, Sasoon Road, Sangamvadi, Pune, Maharashtra, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 1294, 2303, 0, 0, 2585.93, 0.00, 2312, 2942.45, NULL, 2942.45, 2942.45, 2942.45, 2942.45, 'Client', NULL, 24, 1, 0, 1, 1, 1, NULL, 51, NULL, '2019-06-19 13:44:01', '2019-06-19 08:05:59', NULL, NULL, NULL, '2019-06-19 08:14:01', NULL),
(30, 1, 36, 1, 'O-10030', 1, 1, 0, NULL, 2, 25, NULL, '2019-06-11 09:45:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Ultadanga, Calcutta, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 11, 45, 0, 0, 24.99, 0.00, 64, 53.05, NULL, 53.05, 53.05, 53.05, 53.05, 'Client', NULL, 24, 1, 0, 1, 1, 1, NULL, 50, NULL, '2019-06-19 13:41:16', '2019-06-19 08:06:31', NULL, 'Jadavpur, Calcutta, West Bengal, India to Ultadanga, Calcutta, West Bengal, India', NULL, '2019-06-19 08:11:16', NULL),
(31, 1, 36, 1, 'O-10031', 1, 1, 0, NULL, 2, 17, NULL, '2019-06-03 00:05:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Asansol, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 146, 276, 0, 0, 358.19, 0.00, 472, 273.13, NULL, 273.13, 273.13, 273.13, 273.13, 'Client', NULL, 16, 1, 0, 1, 1, 1, NULL, 52, NULL, '2019-06-19 13:45:26', '2019-06-19 08:14:47', NULL, '723121 to Asansol, West Bengal, India', NULL, '2019-06-19 08:15:26', NULL),
(32, 1, 36, 1, 'O-10032', 1, 1, 0, NULL, 2, 17, NULL, '2019-06-12 09:05:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Durgapur, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 121, 225, 0, 0, 353.37, 0.00, 504, 292.44, NULL, 292.44, 292.44, 292.44, 292.44, 'Client', NULL, 16, 1, 0, 1, 1, 1, NULL, 52, NULL, '2019-06-19 13:45:26', '2019-06-19 08:15:08', NULL, '723121 to Durgapur, West Bengal, India', NULL, '2019-06-19 08:15:26', NULL),
(33, 1, 36, 1, 'O-10033', 1, 1, 0, NULL, 0, 22, 'Test', '2019-06-27 19:35:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Howrah Railway Station, Howrah, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 15, 48, 0, 0, 4228.69, 0.00, 8439, 5235.21, NULL, 5235.21, 5235.21, 0.00, 0.00, 'Client', NULL, 6, 1, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, '2019-06-25 08:38:25', NULL, NULL, NULL, '2019-06-27 01:23:20', '2019-06-27 01:23:20'),
(34, 1, 36, 1, 'O-10034', 1, 1, 0, NULL, 0, 21, NULL, '2019-06-29 18:50:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Howrah Railway Station, Howrah, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 15, 48, 0, 0, 4220.11, 0.00, 8423, 5236.92, NULL, 5236.92, 5236.92, 0.00, 0.00, 'Client', NULL, 1, 1, 0, NULL, 1, 2, NULL, NULL, NULL, NULL, '2019-06-26 06:53:33', NULL, NULL, NULL, '2019-06-26 06:53:33', NULL),
(35, 1, 36, 2, 'O-10035', 1, 1, 0, NULL, 4, 17, NULL, '2019-07-01 00:00:00', NULL, '2019-07-27 00:00:00', 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Howrah Railway Station, Howrah, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 15, 48, 0, 0, 350.12, 0.00, 696, 427.38, NULL, 427.38, 427.38, 427.38, 427.38, 'Client', NULL, 16, 1, 0, 1, 1, 1, NULL, 53, NULL, '2019-07-08 14:04:41', '2019-06-27 01:27:57', NULL, NULL, NULL, '2019-07-08 08:34:41', NULL),
(36, 1, 36, 2, 'O-10036', 1, 1, 0, NULL, 0, 17, NULL, '2019-07-08 00:00:00', NULL, '2019-07-27 00:00:00', 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Howrah Railway Station, Howrah, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 15, 48, 0, 0, 350.12, 0.00, 696, 427.38, NULL, 427.38, 427.38, 0.00, 0.00, 'Client', NULL, 16, 1, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, '2019-06-27 01:27:57', NULL, NULL, NULL, '2019-07-08 08:12:31', '2019-07-08 08:12:31'),
(37, 1, 36, 2, 'O-10037', 1, 1, 0, NULL, 4, 17, NULL, '2019-07-15 00:00:00', NULL, '2019-07-27 00:00:00', 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Howrah Railway Station, Howrah, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 15, 48, 0, 0, 350.12, 0.00, 696, 427.38, NULL, 427.38, 427.38, 427.38, 427.38, 'Client', NULL, 16, 1, 0, 1, 1, 1, NULL, 53, NULL, '2019-07-08 14:04:41', '2019-06-27 01:27:57', NULL, NULL, NULL, '2019-07-08 08:34:41', NULL),
(38, 1, 36, 2, 'O-10038', 1, 1, 0, NULL, 4, 17, NULL, '2019-07-22 00:00:00', NULL, '2019-07-27 00:00:00', 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Howrah Railway Station, Howrah, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 15, 48, 0, 0, 350.12, 0.00, 696, 427.38, NULL, 427.38, 427.38, 427.38, 427.38, 'Client', NULL, 16, 1, 0, 1, 1, 1, NULL, 54, NULL, '2019-07-09 12:47:52', '2019-06-27 01:27:57', NULL, NULL, NULL, '2019-07-09 07:17:52', NULL),
(39, 1, 36, 2, 'O-10039', 1, 1, 0, NULL, 0, 17, NULL, '2019-06-29 23:50:00', NULL, '2019-07-27 00:00:00', 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Howrah Railway Station, Howrah, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 15, 48, 0, 0, 350.12, 0.00, 696, 427.38, NULL, 427.38, 427.38, 0.00, 0.00, 'Client', NULL, 16, 1, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, '2019-06-27 01:27:57', NULL, NULL, NULL, '2019-06-27 01:28:05', '2019-06-27 01:28:05'),
(40, 1, 36, 2, 'O-10040', 1, 1, 0, NULL, 2, 17, NULL, '2019-07-06 00:00:00', NULL, '2019-07-27 00:00:00', 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Howrah Railway Station, Howrah, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 15, 48, 0, 0, 350.12, 0.00, 696, 427.38, NULL, 427.38, 427.38, 0.00, 0.00, 'Client', NULL, 16, 1, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, '2019-07-01 04:31:06', NULL, NULL, NULL, '2019-07-01 08:10:50', NULL),
(41, 1, 36, 2, 'O-10041', 1, 1, 0, NULL, 2, 17, NULL, '2029-11-21 18:50:00', NULL, '2019-07-27 00:00:00', 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Howrah Railway Station, Howrah, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 15, 48, 0, 0, 350.12, 0.00, 696, 427.38, NULL, 427.38, 427.38, 0.00, 0.00, 'Client', NULL, 16, 1, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, '2019-07-01 04:46:57', NULL, NULL, NULL, '2019-07-01 08:10:33', NULL),
(42, 1, 36, 2, 'O-10042', 1, 1, 0, NULL, 2, 17, NULL, '2019-07-31 15:50:00', NULL, '2019-07-27 00:00:00', 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Howrah Railway Station, Howrah, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 15, 48, 0, 0, 350.12, 0.00, 696, 427.38, NULL, 427.38, 427.38, 0.00, 0.00, 'Client', NULL, 16, 1, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, '2019-07-01 04:50:59', NULL, NULL, NULL, '2019-07-01 08:10:33', NULL),
(43, 1, 36, 1, 'O-10043', 1, 1, 1, NULL, 2, 23, NULL, '2019-07-31 15:50:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Ruby Hall Clinic, Sasoon Road, Sangamvadi, Pune, Maharashtra, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 1294, 2304, 0, 0, 2588.68, 0.00, 2306, 2944.40, NULL, 2944.40, 3533.28, 3533.28, 2944.40, 'Client', NULL, 23, 1, 1, 1, 1, 1, NULL, 39, '2019-06-14 10:45:58', '2019-06-14 08:27:16', '2019-07-01 04:53:32', NULL, 'Ajoy Nagar, Mukundapur, Calcutta, West Bengal, India to Ruby Hall Clinic, Sasoon Road, Sangamvadi, Pune, Maharashtra, India', NULL, '2019-07-01 08:10:33', NULL),
(44, 1, 36, 1, 'O-10044', 1, 1, 1, NULL, 2, 23, NULL, '2019-07-15 15:55:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Ruby Hall Clinic, Sasoon Road, Sangamvadi, Pune, Maharashtra, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 1294, 2304, 0, 0, 2588.68, 0.00, 2306, 2944.40, NULL, 2944.40, 3533.28, 3533.28, 2944.40, 'Client', NULL, 23, 1, 0, 1, 1, 1, NULL, 39, '2019-06-14 10:45:58', '2019-06-14 08:27:16', '2019-07-01 04:56:06', NULL, 'Ajoy Nagar, Mukundapur, Calcutta, West Bengal, India to Ruby Hall Clinic, Sasoon Road, Sangamvadi, Pune, Maharashtra, India', NULL, '2019-07-01 08:10:33', NULL),
(47, 1, 41, 1, 'O-10047', 1, 1, 0, NULL, 2, 18, NULL, '2019-07-02 05:05:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Asansol, West Bengal, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 146, 276, 0, 0, 292.50, 0.00, 277, 347.46, NULL, 347.46, 347.46, 0.00, 0.00, 'Client', NULL, 1, 1, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, '2019-06-30 19:35:00', 'ddf', NULL, NULL, '2019-07-01 08:10:53', NULL),
(48, 1, 44, 1, 'O-10048', 1, 1, 0, NULL, 0, 18, 'asdasd', '2019-07-04 02:10:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Adyar, Chennai, Tamil Nadu, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 1054, 1893, 0, 0, 2107.70, 0.00, 1908, 2432.56, NULL, 2432.56, 2432.56, 0.00, 0.00, 'Client', NULL, 1, 1, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, '2019-01-27 18:30:00', 'asdasd', NULL, NULL, '2019-07-01 07:01:01', NULL),
(53, 1, 36, 1, 'O-10053', 1, 1, 0, 48, 0, 18, 'asd', '2019-07-10 01:05:00', NULL, NULL, 'Garia, Calcutta, West Bengal, India', 'Adyar, Chennai, Tamil Nadu, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 1058, 1912, 0, 0, 2110.41, 3817.00, 1905, 2433.91, NULL, 2433.91, 2433.91, 0.00, 0.00, 'Client', NULL, 1, 1, 0, NULL, 2, 1, NULL, NULL, NULL, NULL, '2018-12-31 19:30:00', NULL, NULL, NULL, '2019-07-01 07:03:13', NULL),
(54, 1, 41, 1, 'O-10054', 1, 1, 0, NULL, 0, 18, NULL, '2019-08-01 03:24:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Asansol, West Bengal, India', NULL, NULL, 2, '2019-08-01 08:06:00', NULL, NULL, 1, 1, 146, 276, 0, 0, 581.48, 0.00, 536, 676.91, NULL, 676.91, 676.91, 0.00, 0.00, 'Client', NULL, 1, 1, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, '2019-07-02 07:58:24', NULL, NULL, NULL, '2019-07-08 08:12:11', '2019-07-08 08:12:11'),
(55, 1, 44, 1, 'O-10055', 1, 1, 0, NULL, 0, 18, 'NOTE', '2019-07-27 18:54:00', NULL, NULL, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Agra, Uttar Pradesh, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 805, 1463, 0, 0, 1608.34, 0.00, 1455, 1854.86, NULL, 1854.86, 1854.86, 0.00, 0.00, 'Client', NULL, 1, 1, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, '2019-07-09 07:20:46', NULL, NULL, NULL, '2019-07-09 07:20:46', NULL),
(56, 1, 44, 1, 'O-10056', 1, 1, 0, NULL, 4, 18, 'No', '2019-07-31 16:21:00', NULL, NULL, 'Garia, Calcutta, West Bengal, India', 'Dungarpur, Rajasthan, India', NULL, NULL, 1, NULL, NULL, NULL, 0, 1, 1205, 2132, 0, 0, 2408.88, 0.00, 2122, 2724.67, NULL, 2724.67, 2724.67, 2724.67, 2724.67, 'Client', NULL, 1, 1, 0, 1, 1, 1, NULL, 55, NULL, '2019-07-11 10:30:28', '2019-07-09 07:21:58', NULL, NULL, NULL, '2019-07-11 05:00:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `outward_destination` double(10,2) NOT NULL DEFAULT '0.00',
  `outward_waiting` double(10,2) NOT NULL DEFAULT '0.00',
  `outward_companion` double(10,2) NOT NULL DEFAULT '0.00',
  `outward_comfort_break` double(10,2) NOT NULL DEFAULT '0.00',
  `outward_drop_off_to_base` double(10,2) NOT NULL DEFAULT '0.00',
  `outward_pick_up_cost` double(10,2) NOT NULL DEFAULT '0.00',
  `outward_vehicle_cost` double(10,2) NOT NULL DEFAULT '0.00',
  `outward_driver_cost` double(10,2) DEFAULT '0.00',
  `outward_companion_cost` double(10,2) NOT NULL DEFAULT '0.00',
  `outward_expenses_companion_cost` double(10,2) NOT NULL DEFAULT '0.00',
  `return_destination` double(10,2) NOT NULL DEFAULT '0.00',
  `return_waiting` double(10,2) NOT NULL DEFAULT '0.00',
  `return_companion` double(10,2) NOT NULL DEFAULT '0.00',
  `return_comfort_break` double(10,2) NOT NULL DEFAULT '0.00',
  `return_drop_off_to_base` double(10,2) NOT NULL DEFAULT '0.00',
  `return_pick_up_cost` double(10,2) NOT NULL DEFAULT '0.00',
  `return_vehicle_cost` double(10,2) NOT NULL DEFAULT '0.00',
  `return_driver_cost` double(10,2) NOT NULL DEFAULT '0.00',
  `return_companion_cost` double(10,2) NOT NULL DEFAULT '0.00',
  `return_expenses_companion_cost` double(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`id`, `booking_id`, `outward_destination`, `outward_waiting`, `outward_companion`, `outward_comfort_break`, `outward_drop_off_to_base`, `outward_pick_up_cost`, `outward_vehicle_cost`, `outward_driver_cost`, `outward_companion_cost`, `outward_expenses_companion_cost`, `return_destination`, `return_waiting`, `return_companion`, `return_comfort_break`, `return_drop_off_to_base`, `return_pick_up_cost`, `return_vehicle_cost`, `return_driver_cost`, `return_companion_cost`, `return_expenses_companion_cost`, `created_at`, `updated_at`) VALUES
(2, 1, 38.00, 5.00, 5.00, 10.00, 4.77, 7.73, 13.44, 39.22, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-03 01:31:25', '2019-06-03 01:31:25'),
(3, 2, 27.00, 0.00, 0.00, 0.00, 4.77, 2.13, 7.70, 18.20, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-03 02:27:02', '2019-06-03 02:27:02'),
(4, 3, 25.00, 0.00, 35.00, 0.00, 6.28, 7.73, 13.17, 49.40, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-03 03:48:48', '2019-06-03 03:48:48'),
(5, 4, 41.00, 0.00, 0.00, 0.00, 4.77, 0.00, 7.63, 17.77, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-03 05:58:31', '2019-06-03 05:58:31'),
(6, 5, 49.00, 0.00, 0.00, 0.00, 7.80, 0.33, 12.47, 22.53, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-04 08:04:07', '2019-06-04 08:04:07'),
(7, 6, 49.00, 0.00, 0.00, 0.00, 7.80, 0.33, 12.47, 22.53, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-04 08:14:28', '2019-06-04 08:14:28'),
(9, 7, 39.00, 0.00, 0.00, 0.00, 1.28, 6.14, 9.85, 21.23, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-07 00:45:39', '2019-06-07 00:45:39'),
(10, 8, 44.00, 0.00, 0.00, 0.00, 6.14, 6.66, 12.94, 29.25, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-07 05:28:35', '2019-06-07 05:28:35'),
(11, 9, 113.00, 0.00, 0.00, 0.00, 73.13, 87.00, 143.28, 162.07, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-07 07:41:30', '2019-06-07 07:41:30'),
(12, 10, 38.00, 0.00, 0.00, 0.00, 4.77, 7.73, 13.62, 28.38, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-10 01:28:29', '2019-06-10 01:28:29'),
(13, 11, 9.00, 0.00, 0.00, 0.00, 2.14, 1.28, 3.50, 7.58, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-10 05:00:02', '2019-06-10 05:00:02'),
(14, 12, 11.00, 0.00, 0.00, 0.00, 1.90, 1.42, 3.41, 11.48, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-10 05:01:08', '2019-06-10 05:01:08'),
(15, 13, 18.00, 0.00, 0.00, 0.00, 4.50, 2.83, 7.00, 18.42, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-10 05:04:57', '2019-06-10 05:04:57'),
(18, 14, 17.00, 0.00, 0.00, 0.00, 4.50, 2.14, 7.27, 13.87, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-11 05:12:21', '2019-06-11 05:12:21'),
(19, 15, 24.00, 0.00, 0.00, 0.00, 7.79, 6.90, 13.43, 28.82, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-11 07:20:38', '2019-06-11 07:20:38'),
(20, 16, 18.00, 0.00, 0.00, 0.00, 7.29, 6.31, 12.03, 25.57, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-11 07:26:47', '2019-06-11 07:26:47'),
(22, 17, 20.00, 0.00, 0.00, 0.00, 7.29, 5.28, 11.20, 25.35, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-11 08:54:16', '2019-06-11 08:54:16'),
(23, 18, 39.00, 0.00, 0.00, 0.00, 6.90, 4.50, 11.68, 27.52, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-14 01:16:22', '2019-06-14 01:16:22'),
(24, 19, 2296.00, 0.00, 0.00, 0.00, 647.12, 1.28, 1035.47, 998.83, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-14 02:56:26', '2019-06-14 02:56:26'),
(25, 20, 12.00, 0.00, 0.00, 0.00, 1.28, 1.42, 3.08, 8.88, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-14 04:30:20', '2019-06-14 04:30:20'),
(26, 21, 38.00, 0.00, 0.00, 0.00, 6.90, 6.14, 12.71, 29.25, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-14 04:31:17', '2019-06-14 04:31:17'),
(27, 22, 13.00, 0.00, 0.00, 0.00, 1.28, 1.33, 3.08, 8.88, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-14 05:12:25', '2019-06-14 05:12:25'),
(29, 23, 18.00, 0.00, 0.00, 0.00, 2.14, 1.33, 4.27, 11.27, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-17 05:49:02', '2019-06-17 05:49:02'),
(31, 24, 29.00, 0.00, 0.00, 0.00, 3.92, 1.33, 7.12, 16.25, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-17 05:59:46', '2019-06-17 05:59:46'),
(32, 25, 15.00, 0.00, 0.00, 0.00, 0.75, 1.34, 2.66, 8.67, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-17 06:22:21', '2019-06-17 06:22:21'),
(33, 26, 31.00, 0.00, 0.00, 0.00, 4.07, 1.33, 7.35, 17.12, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-17 07:15:58', '2019-06-17 07:15:58'),
(34, 27, 46.00, 0.00, 0.00, 0.00, 5.72, 1.33, 10.00, 23.62, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-17 07:16:29', '2019-06-17 07:16:29'),
(35, 28, 46.00, 0.00, 0.00, 0.00, 5.72, 1.33, 10.00, 23.62, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-19 07:21:40', '2019-06-19 07:21:40'),
(36, 29, 2294.00, 0.00, 0.00, 0.00, 647.12, 1.33, 1034.37, 999.92, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-19 08:05:59', '2019-06-19 08:05:59'),
(37, 30, 46.00, 0.00, 0.00, 0.00, 5.72, 1.33, 10.00, 23.62, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-19 08:06:31', '2019-06-19 08:06:31'),
(38, 31, 113.00, 0.00, 0.00, 0.00, 73.13, 87.00, 143.28, 162.07, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-19 08:14:47', '2019-06-19 08:14:47'),
(39, 32, 145.00, 0.00, 0.00, 0.00, 60.44, 87.00, 141.35, 157.95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-19 08:15:08', '2019-06-19 08:15:08'),
(40, 33, 4162.00, 0.00, 0.00, 0.00, 7.28, 1065.93, 1691.48, 1838.85, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-25 08:38:25', '2019-06-25 08:38:25'),
(41, 34, 4168.00, 0.00, 0.00, 0.00, 7.28, 1061.64, 1688.04, 1835.38, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-26 06:53:33', '2019-06-26 06:53:33'),
(42, 35, 332.00, 0.00, 0.00, 0.00, 7.28, 88.10, 140.05, 161.20, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-27 01:27:57', '2019-06-27 01:27:57'),
(43, 36, 332.00, 0.00, 0.00, 0.00, 7.28, 88.10, 140.05, 161.20, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-27 01:27:57', '2019-06-27 01:27:57'),
(44, 37, 332.00, 0.00, 0.00, 0.00, 7.28, 88.10, 140.05, 161.20, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-27 01:27:57', '2019-06-27 01:27:57'),
(45, 38, 332.00, 0.00, 0.00, 0.00, 7.28, 88.10, 140.05, 161.20, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-27 01:27:57', '2019-06-27 01:27:57'),
(46, 39, 332.00, 0.00, 0.00, 0.00, 7.28, 88.10, 140.05, 161.20, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-06-27 01:27:58', '2019-06-27 01:27:58'),
(47, 40, 332.00, 0.00, 0.00, 0.00, 7.28, 88.10, 140.05, 161.20, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-07-01 04:31:06', '2019-07-01 04:31:06'),
(48, 41, 332.00, 0.00, 0.00, 0.00, 7.28, 88.10, 140.05, 161.20, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-07-01 04:46:57', '2019-07-01 04:46:57'),
(49, 42, 332.00, 0.00, 0.00, 0.00, 7.28, 88.10, 140.05, 161.20, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-07-01 04:50:59', '2019-07-01 04:50:59'),
(50, 43, 2296.00, 0.00, 0.00, 0.00, 647.12, 1.28, 1035.47, 998.83, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-07-01 04:53:32', '2019-07-01 04:53:32'),
(51, 44, 2296.00, 0.00, 0.00, 0.00, 647.12, 1.28, 1035.47, 998.83, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-07-01 04:56:06', '2019-07-01 04:56:06'),
(52, 47, 274.00, 0.00, 0.00, 0.00, 73.13, 0.33, 117.00, 119.82, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-07-01 06:59:48', '2019-07-01 06:59:48'),
(53, 48, 1905.00, 0.00, 0.00, 0.00, 527.23, 0.33, 843.08, 823.55, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-07-01 07:01:01', '2019-07-01 07:01:01'),
(54, 53, 1905.00, 0.00, 0.00, 0.00, 528.91, 0.00, 844.16, 827.02, 1272.33, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-07-01 07:03:13', '2019-07-01 07:03:13'),
(55, 54, 265.00, 0.00, 0.00, 0.00, 73.13, 0.33, 116.30, 58.07, 0.00, 0.00, 265.00, 0.00, 0.00, 0.00, 73.13, 0.33, 116.30, 177.67, 0.00, 0.00, '2019-07-02 07:58:24', '2019-07-02 07:58:24'),
(56, 55, 1452.00, 0.00, 0.00, 0.00, 402.53, 0.33, 643.34, 632.23, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-07-09 07:20:46', '2019-07-09 07:20:46'),
(57, 56, 2122.00, 0.00, 0.00, 0.00, 602.67, 0.00, 963.55, 921.70, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-07-09 07:21:58', '2019-07-09 07:21:58');

-- --------------------------------------------------------

--
-- Table structure for table `booking_invoice_override`
--

CREATE TABLE `booking_invoice_override` (
  `id` int(11) NOT NULL,
  `franchisees_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT '0',
  `payment_date` datetime DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `booking_count` int(11) NOT NULL,
  `total_amount` double(10,2) NOT NULL,
  `outstanding_amount` double(10,2) NOT NULL,
  `due_date` varchar(20) DEFAULT NULL,
  `invoice_date` varchar(20) DEFAULT NULL,
  `invoice_number` varchar(20) DEFAULT NULL,
  `note` text,
  `customer_addres` varchar(255) DEFAULT NULL,
  `franchisees_addressee` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_invoice_override`
--

INSERT INTO `booking_invoice_override` (`id`, `franchisees_id`, `invoice_id`, `payment_status`, `payment_date`, `client_id`, `booking_count`, `total_amount`, `outstanding_amount`, `due_date`, `invoice_date`, `invoice_number`, `note`, `customer_addres`, `franchisees_addressee`, `user_id`, `created_at`, `updated_at`) VALUES
(26, 1, 1000, 1, '2019-06-03 10:53:35', 20, 3, 419.99, 419.99, NULL, '2019-06-03 10:29:42', 'IN 1000', NULL, NULL, NULL, 1, '2019-06-03 04:59:42', '2019-06-03 05:23:35'),
(27, 1, 1001, 0, NULL, 22, 1, 98.92, 40.00, '03 June 2019', '03 June 2019', NULL, NULL, '456,456/1 Lat Krabang 52 Yaek 2, Lat Krabang, Bangkok, Thailand', 'Fullerton Road, La Habra Heights, CA, USA', 1, '2019-06-03 06:14:46', '2019-06-07 05:21:11'),
(28, 1, 1002, 0, NULL, 22, 1, 68.56, 0.00, '04 June 2019', '04 June 2019', 'INV10000', NULL, '456,456/1 Lat Krabang 52 Yaek 2, Lat Krabang, Bangkok, Thailand', 'Fullerton Road, La Habra Heights, CA, USA', 1, '2019-06-04 08:04:59', '2019-06-07 07:32:44'),
(29, 1, 1003, 1, '2019-06-07 11:01:13', 22, 1, 68.56, 39.50, NULL, '2019-06-07 06:11:28', 'IN 1003', NULL, NULL, NULL, 1, '2019-06-07 00:41:28', '2019-06-07 05:31:13'),
(30, 1, 1004, 1, '2019-06-07 06:18:57', 17, 1, 55.70, 55.70, '07 June 2019', '07 June 2019', NULL, NULL, '723121', 'Fullerton Road, La Habra Heights, CA, USA', 1, '2019-06-07 00:47:18', '2019-06-07 00:48:57'),
(31, 1, 1005, 0, NULL, 17, 1, 68.16, -8.96, NULL, '2019-06-07 10:59:49', 'IN 1005', NULL, NULL, NULL, 1, '2019-06-07 05:29:49', '2019-06-07 07:29:31'),
(32, 1, 1006, 0, NULL, 17, 1, 327.76, 75.00, NULL, '2019-06-07 14:25:59', 'IN 1006', NULL, NULL, NULL, 1, '2019-06-07 08:55:59', '2019-06-07 09:05:18'),
(33, 1, 1007, 0, NULL, 22, 1, 60.60, 60.60, '10 June 2019', '10 June 2019', NULL, NULL, '456,456/1 Lat Krabang 52 Yaek 2, Lat Krabang, Bangkok, Thailand', 'Fullerton Road, La Habra Heights, CA, USA', 1, '2019-06-10 01:30:33', '2019-06-10 01:30:33'),
(34, 1, 1008, 0, NULL, 21, 2, 47.58, 20.08, NULL, '2019-06-10 10:36:16', 'IN 1008', NULL, NULL, NULL, 1, '2019-06-10 05:06:16', '2019-06-11 01:47:23'),
(35, 1, 1009, 0, NULL, 22, 2, 24.30, 24.30, '11 June 2019', '11 June 2019', NULL, NULL, '456,456/1 Lat Krabang 52 Yaek 2, Lat Krabang, Bangkok, Thailand', 'Fullerton Road, La Habra Heights, CA, USA', 1, '2019-06-11 07:15:20', '2019-06-11 07:15:20'),
(36, 1, 1010, 1, '2019-06-27 12:23:18', 17, 2, 84.35, 84.35, NULL, '2019-06-11 13:29:03', 'IN 1010', NULL, NULL, NULL, 1, '2019-06-11 07:59:03', '2019-06-27 06:53:18'),
(37, 1, 1011, 0, NULL, 22, 1, 39.08, 39.08, NULL, '2019-06-11 14:29:25', 'IN 1011', NULL, NULL, NULL, 1, '2019-06-11 08:59:25', '2019-06-11 08:59:25'),
(38, 1, 1012, 0, NULL, 17, 1, 60.48, 0.00, NULL, '2019-06-14 08:24:11', 'IN 1012', NULL, NULL, NULL, 1, '2019-06-14 02:54:11', '2019-06-14 05:17:05'),
(39, 1, 1013, 1, '2019-06-14 10:45:58', 23, 1, 3533.28, 3533.28, '14 June 2019', '14 June 2019', NULL, NULL, NULL, 'Fullerton Road, La Habra Heights, CA, USA', 1, '2019-06-14 02:57:16', '2019-06-14 05:15:58'),
(40, 1, 1014, 0, NULL, 23, 2, 78.89, 0.00, NULL, '2019-06-14 10:04:24', 'IN 1014', NULL, NULL, NULL, 1, '2019-06-14 04:34:24', '2019-06-14 05:15:22'),
(41, 1, 1015, 1, '2019-06-14 11:04:02', 25, 1, 8.73, 8.73, NULL, '2019-06-14 10:42:51', 'IN 1015', NULL, NULL, NULL, 1, '2019-06-14 05:12:51', '2019-06-14 05:34:02'),
(42, 1, 1016, 0, NULL, 25, 1, 6.47, 6.47, NULL, '2019-06-17 11:20:15', 'IN 1016', NULL, NULL, NULL, 1, '2019-06-17 05:50:15', '2019-06-17 05:50:15'),
(43, 1, 1017, 1, '2019-06-17 11:32:25', 25, 1, 34.25, 0.00, '17 June 2019', '17 June 2019', NULL, NULL, 'Jadavpur, Calcutta, West Bengal, India', 'Fullerton Road, La Habra Heights, CA, USA', 1, '2019-06-17 06:00:13', '2019-06-17 06:02:25'),
(44, 1, 1018, 0, NULL, 23, 1, 17.09, 17.09, '17 June 2019', '17 June 2019', NULL, NULL, NULL, 'Fullerton Road, La Habra Heights, CA, USA', 1, '2019-06-17 06:30:10', '2019-06-17 06:30:10'),
(45, 1, 1019, 0, NULL, 25, 2, 89.45, 49.45, NULL, '2019-06-17 12:48:13', 'IN 1019', NULL, NULL, NULL, 1, '2019-06-17 07:18:13', '2019-06-17 07:20:26'),
(49, 1, 1020, 0, NULL, 25, 1, 53.05, 28.05, '19 June 2019', '19 June 2019', 'IN 1020', NULL, 'Jadavpur, Calcutta, West Bengal, India', 'Fullerton Road, La Habra Heights, CA, USA', 1, '2019-06-19 08:10:09', '2019-06-19 08:10:09'),
(50, 1, 1021, 0, NULL, 25, 1, 53.05, 53.05, '19 June 2019', '19 June 2019', 'IN 1021', NULL, 'Jadavpur, Calcutta, West Bengal, India', 'Fullerton Road, La Habra Heights, CA, USA', 1, '2019-06-19 08:11:16', '2019-06-19 08:11:16'),
(51, 1, 1022, 0, NULL, 25, 1, 2942.45, 2942.45, NULL, '2019-06-19 13:44:01', 'IN 1022', NULL, NULL, NULL, 1, '2019-06-19 08:14:01', '2019-06-19 08:14:01'),
(52, 1, 1023, 0, NULL, 17, 2, 565.57, 565.57, '19 June 2019', '19 June 2019', 'IN 1023', NULL, '723121', 'Fullerton Road, La Habra Heights, CA, USA', 1, '2019-06-19 08:15:26', '2019-06-19 08:15:26'),
(53, 1, 1024, 0, NULL, 17, 2, 854.76, 854.76, NULL, '2019-07-08 14:04:41', 'IN 1024', NULL, NULL, NULL, 1, '2019-07-08 08:34:41', '2019-07-08 08:34:41'),
(54, 1, 1025, 0, NULL, 17, 1, 427.38, 427.38, NULL, '2019-07-09 12:47:52', 'IN 1025', NULL, NULL, NULL, 1, '2019-07-09 07:17:52', '2019-07-09 07:17:52'),
(55, 1, 1026, 0, NULL, 18, 1, 2724.67, 2724.67, NULL, '2019-07-11 10:30:28', 'IN 1026', NULL, NULL, NULL, 1, '2019-07-11 05:00:28', '2019-07-11 05:00:28');

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
(1, 1, 1, 1, 36, '2019-06-03 01:29:48.0000', '2019-06-03 01:31:25', '2019-06-03 01:31:25'),
(2, 1, 1, 1, 44, '2019-06-03 01:31:25.0000', '2019-06-03 01:31:25', NULL),
(3, 1, 2, 1, 36, '2019-06-03 02:27:02.0000', '2019-06-03 02:27:02', NULL),
(4, 1, 3, 1, 36, '2019-06-03 03:48:48.0000', '2019-06-03 03:48:48', NULL),
(5, 1, 4, 1, 36, '2019-06-03 05:58:31.0000', '2019-06-03 05:58:31', NULL),
(6, 1, 5, 1, 36, '2019-06-04 08:04:07.0000', '2019-06-04 08:04:07', NULL),
(7, 1, 6, 1, 36, '2019-06-04 08:14:28.0000', '2019-06-04 08:14:28', NULL),
(8, 1, 7, 1, 37, '2019-06-07 00:43:51.0000', '2019-06-07 00:45:39', '2019-06-07 00:45:39'),
(9, 1, 7, 1, 44, '2019-06-07 00:45:39.0000', '2019-06-07 00:45:39', NULL),
(10, 1, 8, 1, 37, '2019-06-07 05:28:35.0000', '2019-06-07 05:28:35', NULL),
(11, 1, 9, 1, 36, '2019-06-07 07:41:30.0000', '2019-06-07 07:41:30', NULL),
(12, 1, 10, 1, 36, '2019-06-10 01:28:29.0000', '2019-06-10 01:28:29', NULL),
(13, 1, 11, 1, 36, '2019-06-10 05:00:02.0000', '2019-06-10 05:00:02', NULL),
(14, 1, 12, 1, 36, '2019-06-10 05:01:08.0000', '2019-06-10 05:01:08', NULL),
(15, 1, 13, 1, 36, '2019-06-10 05:04:57.0000', '2019-06-10 05:04:57', NULL),
(16, 1, 14, 1, 41, '2019-06-11 04:29:06.0000', '2019-06-11 05:12:03', '2019-06-11 05:12:03'),
(17, 1, 14, 1, 44, '2019-06-11 05:12:03.0000', '2019-06-11 05:12:20', '2019-06-11 05:12:20'),
(18, 1, 14, 1, 44, '2019-06-11 05:12:20.0000', '2019-06-11 05:12:20', NULL),
(19, 1, 15, 1, 36, '2019-06-11 07:20:38.0000', '2019-06-11 07:20:38', NULL),
(20, 1, 16, 1, 36, '2019-06-11 07:26:47.0000', '2019-06-11 07:26:47', NULL),
(21, 1, 17, 1, 36, '2019-06-11 08:53:41.0000', '2019-06-11 08:54:15', '2019-06-11 08:54:15'),
(22, 1, 17, 1, 44, '2019-06-11 08:54:15.0000', '2019-06-11 08:54:15', NULL),
(23, 1, 18, 1, 36, '2019-06-14 01:16:22.0000', '2019-06-14 01:16:22', NULL),
(24, 1, 19, 1, 36, '2019-06-14 02:56:26.0000', '2019-06-14 02:56:26', NULL),
(25, 1, 20, 1, 36, '2019-06-14 04:30:20.0000', '2019-06-14 04:30:20', NULL),
(26, 1, 21, 1, 36, '2019-06-14 04:31:17.0000', '2019-06-14 04:31:17', NULL),
(27, 1, 22, 1, 36, '2019-06-14 05:12:25.0000', '2019-06-14 05:12:25', NULL),
(28, 1, 23, 1, 36, '2019-06-17 05:48:28.0000', '2019-06-17 05:49:02', '2019-06-17 05:49:02'),
(29, 1, 23, 1, 44, '2019-06-17 05:49:02.0000', '2019-06-17 05:49:02', NULL),
(30, 1, 24, 1, 36, '2019-06-17 05:59:21.0000', '2019-06-17 05:59:46', '2019-06-17 05:59:46'),
(31, 1, 24, 1, 44, '2019-06-17 05:59:46.0000', '2019-06-17 05:59:46', NULL),
(32, 1, 25, 1, 36, '2019-06-17 06:22:21.0000', '2019-06-17 06:22:21', NULL),
(33, 1, 26, 1, 36, '2019-06-17 07:15:58.0000', '2019-06-17 07:15:58', NULL),
(34, 1, 27, 1, 36, '2019-06-17 07:16:29.0000', '2019-06-17 07:16:29', NULL),
(35, 1, 28, 1, 36, '2019-06-19 07:21:40.0000', '2019-06-19 07:21:40', NULL),
(36, 1, 29, 1, 36, '2019-06-19 08:05:59.0000', '2019-06-19 08:05:59', NULL),
(37, 1, 30, 1, 36, '2019-06-19 08:06:31.0000', '2019-06-19 08:06:31', NULL),
(38, 1, 31, 1, 36, '2019-06-19 08:14:47.0000', '2019-06-19 08:14:47', NULL),
(39, 1, 32, 1, 36, '2019-06-19 08:15:08.0000', '2019-06-19 08:15:08', NULL),
(40, 1, 33, 1, 36, '2019-06-25 08:38:26.0000', '2019-06-25 08:38:26', NULL),
(41, 1, 34, 1, 36, '2019-06-26 06:53:33.0000', '2019-06-26 06:53:33', NULL),
(42, 1, 35, 1, 36, '2019-06-27 01:27:57.0000', '2019-06-27 01:27:57', NULL),
(43, 1, 36, 1, 36, '2019-06-27 01:27:57.0000', '2019-06-27 01:27:57', NULL),
(44, 1, 37, 1, 36, '2019-06-27 01:27:57.0000', '2019-06-27 01:27:57', NULL),
(45, 1, 38, 1, 36, '2019-06-27 01:27:57.0000', '2019-06-27 01:27:57', NULL),
(46, 1, 39, 1, 36, '2019-06-27 01:27:58.0000', '2019-06-27 01:27:58', NULL),
(47, NULL, 42, 1, 36, '2019-07-01 04:51:36.0000', '2019-07-01 04:51:36', NULL),
(48, 1, 47, 1, 41, '2019-07-01 06:59:49.0000', '2019-07-01 06:59:49', NULL),
(49, 1, 48, 1, 44, '2019-07-01 07:01:01.0000', '2019-07-01 07:01:01', NULL),
(50, 1, 53, 1, 36, '2019-07-01 07:03:13.0000', '2019-07-01 07:03:13', NULL),
(51, 1, 54, 1, 36, '2019-07-02 07:58:24.0000', '2019-07-08 05:19:33', '2019-07-08 05:19:33'),
(52, 1, 54, 1, 37, '2019-07-08 05:19:33.0000', '2019-07-08 05:22:05', '2019-07-08 05:22:05'),
(53, 1, 54, 1, 37, '2019-07-08 05:22:05.0000', '2019-07-08 05:23:23', '2019-07-08 05:23:23'),
(54, 1, 54, 1, 37, '2019-07-08 05:23:23.0000', '2019-07-08 05:23:33', '2019-07-08 05:23:33'),
(55, 1, 54, 1, 41, '2019-07-08 05:23:33.0000', '2019-07-08 05:24:18', '2019-07-08 05:24:18'),
(56, 1, 54, 1, 37, '2019-07-08 05:24:18.0000', '2019-07-08 05:25:57', '2019-07-08 05:25:57'),
(57, 1, 54, 1, 41, '2019-07-08 05:25:57.0000', '2019-07-08 05:27:03', '2019-07-08 05:27:03'),
(58, 1, 54, 1, 37, '2019-07-08 05:27:03.0000', '2019-07-08 05:28:22', '2019-07-08 05:28:22'),
(59, 1, 54, 1, 37, '2019-07-08 05:28:22.0000', '2019-07-08 05:28:34', '2019-07-08 05:28:34'),
(60, 1, 54, 1, 41, '2019-07-08 05:28:34.0000', '2019-07-08 05:28:45', '2019-07-08 05:28:45'),
(61, 1, 54, 1, 36, '2019-07-08 05:28:45.0000', '2019-07-08 05:29:04', '2019-07-08 05:29:04'),
(62, 1, 54, 1, 36, '2019-07-08 05:29:04.0000', '2019-07-08 05:29:12', '2019-07-08 05:29:12'),
(63, 1, 54, 1, 37, '2019-07-08 05:29:12.0000', '2019-07-08 05:33:00', '2019-07-08 05:33:00'),
(64, 1, 54, 1, 36, '2019-07-08 05:33:00.0000', '2019-07-08 05:34:53', '2019-07-08 05:34:53'),
(65, 1, 54, 1, 36, '2019-07-08 05:34:53.0000', '2019-07-08 05:35:12', '2019-07-08 05:35:12'),
(66, 1, 54, 1, 36, '2019-07-08 05:35:12.0000', '2019-07-08 05:36:05', '2019-07-08 05:36:05'),
(67, 1, 54, 1, 37, '2019-07-08 05:36:05.0000', '2019-07-08 05:41:09', '2019-07-08 05:41:09'),
(68, 1, 54, 1, 41, '2019-07-08 05:41:09.0000', '2019-07-08 05:41:09', NULL),
(69, 1, 55, 1, 44, '2019-07-09 07:20:46.0000', '2019-07-09 07:20:46', NULL),
(70, 1, 56, 1, 37, '2019-07-09 07:21:58.0000', '2019-07-09 08:02:36', '2019-07-09 08:02:36'),
(71, 1, 56, 1, 44, '2019-07-09 08:02:36.0000', '2019-07-09 08:02:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `certificate_name` varchar(255) DEFAULT NULL,
  `certificate_expiry_date` varchar(255) DEFAULT NULL,
  `certificate_img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`id`, `user_id`, `certificate_name`, `certificate_expiry_date`, `certificate_img`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 41, 'phl1', '2019-04-25', '1554968995-5caef1a399d13.png', NULL, NULL, NULL),
(2, 41, 'hjklm', '2019-04-26', '1554968995-5caef1a3d471b.jpeg', NULL, NULL, NULL),
(7, 48, 'a', '2019-05-01', '1557394540-5cd3f46c26f9f.png', NULL, NULL, NULL),
(8, 48, 'b', '2019-05-02', '1557394540-5cd3f46c29573.png', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(10) NOT NULL,
  `franchisees_id` int(10) NOT NULL,
  `users_id` int(10) NOT NULL,
  `payment_clientid` int(11) DEFAULT NULL,
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

INSERT INTO `client` (`id`, `franchisees_id`, `users_id`, `payment_clientid`, `firstname`, `surname`, `email`, `phone`, `home_number`, `house_number`, `address`, `mobility_level`, `client_health_notes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 'Afeef', 'Rahaman', 'afeef2008@gmail.com', '7059114888', '2121', NULL, 'Garia, Calcutta, West Bengal, India', NULL, NULL, '2019-04-09 04:31:57', '2019-05-10 05:19:31', NULL),
(6, 1, 1, 6, 'Hasibur', 'Rahaman', 'sdfs@gg.tyty', '123123123123', '456456546', NULL, '456,456/1 Lat Krabang 52 Yaek 2, Lat Krabang, Bangkok, Thailand', 2, '456456', '2019-04-09 05:04:05', '2019-05-22 01:00:37', NULL),
(7, 1, 37, 1, 'Hasib', 'sdfsdf', 'sdfs@gg.tyty', '7896541230', '456456546', NULL, '456,456/1 Lat Krabang 52 Yaek 2, Lat Krabang, Bangkok, Thailand', NULL, NULL, '2019-04-10 04:47:22', '2019-05-22 01:00:26', NULL),
(8, 1, 1, 8, 'Hasib', 'Rahaman', 'sdfs@gg.tyty', '9733189522', '456456546', NULL, '456,456/1 Lat Krabang 52 Yaek 2, Lat Krabang, Bangkok, Thailand', NULL, NULL, '2019-04-12 04:07:17', '2019-05-22 02:40:44', NULL),
(9, 1, 1, 9, 'Afeef', 'Rahaman', 'afeef2008@gmail.com', '9733189522', '2121', NULL, 'Ajoy Nagar, Mukundapur, Kolkata, West Bengal, India', NULL, NULL, '2019-04-16 05:54:46', '2019-05-10 05:19:46', NULL),
(10, 1, 1, 10, 'munmun', 'dey', 'munmundey45@gmail.com', '9512364780', '7410002586', NULL, 'Ajay Nagar, Mukundapur, Calcutta, West Bengal, India', 1, 'lorem ipsum', '2019-04-16 06:15:36', '2019-04-16 06:15:36', NULL),
(12, 1, 1, 12, 'anita', 'dey', 'anita78@gmail.com', '7410023658', '00256398', NULL, 'Sector V, Bidhannagar, Calcutta, West Bengal, India', 1, 'lorem ipsum', '2019-04-16 06:25:15', '2019-04-16 06:25:15', NULL),
(13, 1, 1, 13, 'munmun', 'dey', 'munmundey45@gmail.com', NULL, '7410002586', NULL, 'Ajay Nagar, Mukundapur, Calcutta, West Bengal, India', NULL, NULL, '2019-04-16 06:32:04', '2019-04-16 06:32:04', NULL),
(14, 1, 1, 14, 'anita', 'dey', 'anita78@gmail.com', NULL, '00256398', NULL, 'Sector V, Bidhannagar, Calcutta, West Bengal, India', NULL, NULL, '2019-04-16 06:35:07', '2019-04-16 06:35:07', NULL),
(15, 1, 1, 15, 'Abhishek', 'Patra', 'ap0677852@gmail.com', '814536825', NULL, NULL, '723121', NULL, NULL, '2019-05-10 03:02:04', '2019-05-10 03:02:04', NULL),
(16, 1, 1, 16, 'Namrata', 'Bose', 'namratabose31@gmail.com', '8514040066', NULL, NULL, '723121', NULL, NULL, '2019-05-10 03:15:51', '2019-05-10 03:15:51', NULL),
(17, 1, 1, 17, 'Namrata', 'Bose', 'namratabose31@gmail.com', '1234567898', '456464', NULL, '723121', NULL, NULL, '2019-05-10 05:11:28', '2019-07-01 07:56:13', NULL),
(18, 1, 1, 1, 'Afeef', 'Rahaman', 'afeef2008@gmail.com', NULL, '2121', NULL, 'Garia, Calcutta, West Bengal, India', NULL, NULL, '2019-05-10 05:49:11', '2019-05-10 05:49:11', NULL),
(19, 1, 1, 19, 'munmun', 'dey', 'munmundey8569@gmail.com', '8520147963', '78796541230', NULL, 'ko.', 5, 'lorem ipsum', '2019-05-21 01:57:55', '2019-05-21 02:26:43', NULL),
(20, 1, 1, 6, 'Hasibur', 'Rahaman', 'rahamanh939@gmail.com', '78965412365', '456456546', NULL, '456,456/1 Lat Krabang 52 Yaek 2, Lat Krabang, Bangkok, Thailand', NULL, NULL, '2019-05-27 02:30:53', '2019-06-03 04:51:57', NULL),
(21, 1, 1, 1, 'Hasib', 'sdfsdf', 'sdfs@gg.tyty', NULL, '456456546', NULL, '456,456/1 Lat Krabang 52 Yaek 2, Lat Krabang, Bangkok, Thailand', NULL, NULL, '2019-06-03 02:27:01', '2019-06-03 02:27:01', NULL),
(22, 1, 1, 6, 'Hasibur', 'Rahaman', 'sdfs@gg.tyty', NULL, '456456546', NULL, '456,456/1 Lat Krabang 52 Yaek 2, Lat Krabang, Bangkok, Thailand', NULL, NULL, '2019-06-03 05:58:31', '2019-06-03 05:58:31', NULL),
(23, 1, 1, 23, 'Manidipa', 'Das', NULL, NULL, NULL, NULL, 'Knoxville, TN, USA', 2, 'no', '2019-06-14 02:55:49', '2019-07-01 07:28:52', NULL),
(24, 1, 1, 24, 'Debleena', 'Guha', 'deb@dc.in', '1234567890', NULL, NULL, 'Jadavpur, Calcutta, West Bengal, India', NULL, NULL, '2019-06-14 05:11:52', '2019-06-14 05:11:52', NULL),
(25, 1, 1, 24, 'Debleena', 'Guha', 'deb@dc.in', NULL, NULL, NULL, 'Jadavpur, Calcutta, West Bengal, India', NULL, NULL, '2019-06-14 05:12:25', '2019-06-14 05:12:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE `company_info` (
  `id` int(10) NOT NULL,
  `franchisees_id` int(10) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `trading_name` varchar(255) NOT NULL,
  `company_number` varchar(255) DEFAULT NULL,
  `registered_office` varchar(255) DEFAULT NULL,
  `account_no` varchar(255) DEFAULT NULL,
  `cheques_payable` varchar(255) DEFAULT NULL,
  `lawyers` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `company_email` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `incorporation_date` varchar(255) DEFAULT NULL,
  `year_end` varchar(255) DEFAULT NULL,
  `confirmation_statement_date` varchar(255) DEFAULT NULL,
  `account_filling_date` varchar(255) NOT NULL,
  `hmrc_filling_date` varchar(255) NOT NULL,
  `business_address` varchar(255) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `sort_code` varchar(255) DEFAULT NULL,
  `vat_reg` int(10) DEFAULT NULL,
  `vat_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`id`, `franchisees_id`, `company_name`, `trading_name`, `company_number`, `registered_office`, `account_no`, `cheques_payable`, `lawyers`, `phone_number`, `company_email`, `linkedin`, `instagram`, `facebook`, `incorporation_date`, `year_end`, `confirmation_statement_date`, `account_filling_date`, `hmrc_filling_date`, `business_address`, `account_name`, `sort_code`, `vat_reg`, `vat_number`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Driving Miss Daisy (UK)  Limited', 'Driving Miss Daisy (UK)  Limited', '789654545454', 'Kolkata, West Bengal, India', 'axx', 'Cheques', NULL, '+91 9874563210', 'company@email.com', NULL, NULL, NULL, '2019-04-23', '2019-04-30', '2019-04-30', '2019-05-30', '2019-05-31', 'Fullerton Road, La Habra Heights, CA, USA', 'Hasibur', NULL, 1, 'VAT1007', '2019-04-09 04:21:13', '2019-05-22 01:16:28', NULL),
(2, 2, 'letsassist', '', '8520147963', 'Ajay Nagar, Mukundapur, Calcutta, West Bengal, India', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-25', '2019-04-24', NULL, '', '', 'Ajay Nagar, Mukundapur, Calcutta, West Bengal, India', 'sunita dey', NULL, 1, NULL, '2019-04-09 05:20:41', '2019-04-09 05:20:41', NULL),
(3, 3, 'jkl', '', '1200005698', 'Kolhapur, Maharashtra, India', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-25', '2019-04-24', NULL, '', '', 'Kolkata Railway Station (Chitpur Station), Belgachia, Kolkata, West Bengal, India', 'sunita dey', NULL, 1, NULL, '2019-05-21 02:21:04', '2019-05-21 02:21:04', NULL);

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
-- Table structure for table `crontab`
--

CREATE TABLE `crontab` (
  `id` int(11) NOT NULL,
  `run_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2304, 0, 3, 'booking.create', NULL, NULL),
(2305, 0, 3, 'booking.store', NULL, NULL),
(2306, 0, 3, 'invoice.index', NULL, NULL),
(2307, 1, 2, 'debugbar.openhandler', NULL, NULL),
(2308, 1, 2, 'debugbar.clockwork', NULL, NULL),
(2309, 1, 2, 'debugbar.assets.css', NULL, NULL),
(2310, 1, 2, 'debugbar.assets.js', NULL, NULL),
(2311, 1, 2, 'debugbar.cache.delete', NULL, NULL),
(2312, 1, 2, 'login', NULL, NULL),
(2313, 1, 2, 'logout', NULL, NULL),
(2314, 1, 2, 'register', NULL, NULL),
(2315, 1, 2, 'home', NULL, NULL),
(2316, 1, 2, 'admin', NULL, NULL),
(2317, 1, 2, 'adminLogin', NULL, NULL),
(2318, 1, 2, 'profile', NULL, NULL),
(2319, 1, 2, 'testhome', NULL, NULL),
(2320, 1, 2, 'change-franchisees', NULL, NULL),
(2321, 1, 2, 'adminchangepassword', NULL, NULL),
(2322, 1, 2, 'adminChangePasswordPost', NULL, NULL),
(2323, 1, 2, 'drivingstore', NULL, NULL),
(2324, 1, 2, 'editprofile', NULL, NULL),
(2325, 1, 2, 'profile-update', NULL, NULL),
(2326, 1, 2, 'calender', NULL, NULL),
(2327, 1, 2, 'boking-details', NULL, NULL),
(2328, 1, 2, 'forgotpassword-link', NULL, NULL),
(2329, 1, 2, 'forgotpasswordpost', NULL, NULL),
(2330, 1, 2, 'searchajax', NULL, NULL),
(2331, 1, 2, 'booking-price', NULL, NULL),
(2332, 1, 2, 'vehicles-tracking', NULL, NULL),
(2333, 1, 2, 'vehicles-tracking-ajax', NULL, NULL),
(2334, 1, 2, 'chart-report-year', NULL, NULL),
(2335, 1, 2, 'chart-report-month', NULL, NULL),
(2336, 1, 2, 'change-payment-status', NULL, NULL),
(2337, 1, 2, 'update-booking', NULL, NULL),
(2338, 1, 2, 'event-details', NULL, NULL),
(2339, 1, 2, 'invoice-price-details', NULL, NULL),
(2340, 1, 2, 'franchisor-invoice-pdf', NULL, NULL),
(2341, 1, 2, 'driver-calender', NULL, NULL),
(2342, 1, 2, 'month-report', NULL, NULL),
(2343, 1, 2, 'day-report', NULL, NULL),
(2344, 1, 2, 'import', NULL, NULL),
(2345, 1, 2, 'import_parse', NULL, NULL),
(2346, 1, 2, 'franchisor-fees-create', NULL, NULL),
(2347, 1, 2, 'franchisor-fees-edit', NULL, NULL),
(2348, 1, 2, 'franchisor-fees-store', NULL, NULL),
(2349, 1, 2, 'franchisor-fees-update', NULL, NULL),
(2350, 1, 2, 'franchisor-fees-delete', NULL, NULL),
(2351, 1, 2, 'enquery-price', NULL, NULL),
(2352, 1, 2, 'client-addpopup', NULL, NULL),
(2353, 1, 2, 'client-addpopup-store', NULL, NULL),
(2354, 1, 2, 'companyinfo', NULL, NULL),
(2355, 1, 2, 'companyinfo-edit', NULL, NULL),
(2356, 1, 2, 'generate', NULL, NULL),
(2357, 1, 2, 'generate-email', NULL, NULL),
(2358, 1, 2, 'import-index', NULL, NULL),
(2359, 1, 2, 'import-client', NULL, NULL),
(2360, 1, 2, 'import-client-post', NULL, NULL),
(2361, 1, 2, 'business-details', NULL, NULL),
(2362, 1, 2, 'business-details-update', NULL, NULL),
(2363, 1, 2, 'password.request', NULL, NULL),
(2364, 1, 2, 'password.email', NULL, NULL),
(2365, 1, 2, 'password.reset', NULL, NULL),
(2366, 1, 2, 'role.index', NULL, NULL),
(2367, 1, 2, 'role.create', NULL, NULL),
(2368, 1, 2, 'role.store', NULL, NULL),
(2369, 1, 2, 'role.show', NULL, NULL),
(2370, 1, 2, 'role.edit', NULL, NULL),
(2371, 1, 2, 'role.update', NULL, NULL),
(2372, 1, 2, 'role.destroy', NULL, NULL),
(2373, 1, 2, 'permissions.index', NULL, NULL),
(2374, 1, 2, 'permissions.create', NULL, NULL),
(2375, 1, 2, 'permissions.store', NULL, NULL),
(2376, 1, 2, 'permissions.show', NULL, NULL),
(2377, 1, 2, 'permissions.edit', NULL, NULL),
(2378, 1, 2, 'permissions.update', NULL, NULL),
(2379, 1, 2, 'permissions.destroy', NULL, NULL),
(2380, 1, 2, 'franchisee.index', NULL, NULL),
(2381, 1, 2, 'franchisee.create', NULL, NULL),
(2382, 1, 2, 'franchisee.store', NULL, NULL),
(2383, 1, 2, 'franchisee.show', NULL, NULL),
(2384, 1, 2, 'franchisee.edit', NULL, NULL),
(2385, 1, 2, 'franchisee.update', NULL, NULL),
(2386, 1, 2, 'franchisee.destroy', NULL, NULL),
(2387, 1, 2, 'email-template.index', NULL, NULL),
(2388, 1, 2, 'email-template.create', NULL, NULL),
(2389, 1, 2, 'email-template.store', NULL, NULL),
(2390, 1, 2, 'email-template.show', NULL, NULL),
(2391, 1, 2, 'email-template.edit', NULL, NULL),
(2392, 1, 2, 'email-template.update', NULL, NULL),
(2393, 1, 2, 'email-template.destroy', NULL, NULL),
(2394, 1, 2, 'general-setting.index', NULL, NULL),
(2395, 1, 2, 'general-setting.create', NULL, NULL),
(2396, 1, 2, 'general-setting.store', NULL, NULL),
(2397, 1, 2, 'general-setting.show', NULL, NULL),
(2398, 1, 2, 'general-setting.edit', NULL, NULL),
(2399, 1, 2, 'general-setting.update', NULL, NULL),
(2400, 1, 2, 'general-setting.destroy', NULL, NULL),
(2401, 1, 2, 'faq.index', NULL, NULL),
(2402, 1, 2, 'faq.create', NULL, NULL),
(2403, 1, 2, 'faq.store', NULL, NULL),
(2404, 1, 2, 'faq.show', NULL, NULL),
(2405, 1, 2, 'faq.edit', NULL, NULL),
(2406, 1, 2, 'faq.update', NULL, NULL),
(2407, 1, 2, 'faq.destroy', NULL, NULL),
(2408, 1, 2, 'franchisor.index', NULL, NULL),
(2409, 1, 2, 'franchisor.create', NULL, NULL),
(2410, 1, 2, 'franchisor.store', NULL, NULL),
(2411, 1, 2, 'franchisor.show', NULL, NULL),
(2412, 1, 2, 'franchisor.edit', NULL, NULL),
(2413, 1, 2, 'franchisor.update', NULL, NULL),
(2414, 1, 2, 'franchisor.destroy', NULL, NULL),
(2415, 1, 2, 'users.index', NULL, NULL),
(2416, 1, 2, 'users.create', NULL, NULL),
(2417, 1, 2, 'users.store', NULL, NULL),
(2418, 1, 2, 'users.show', NULL, NULL),
(2419, 1, 2, 'users.edit', NULL, NULL),
(2420, 1, 2, 'users.update', NULL, NULL),
(2421, 1, 2, 'users.destroy', NULL, NULL),
(2422, 1, 2, 'driver.index', NULL, NULL),
(2423, 1, 2, 'driver.create', NULL, NULL),
(2424, 1, 2, 'driver.store', NULL, NULL),
(2425, 1, 2, 'driver.show', NULL, NULL),
(2426, 1, 2, 'driver.edit', NULL, NULL),
(2427, 1, 2, 'driver.update', NULL, NULL),
(2428, 1, 2, 'driver.destroy', NULL, NULL),
(2429, 1, 2, 'franchisee-user.index', NULL, NULL),
(2430, 1, 2, 'franchisee-user.create', NULL, NULL),
(2431, 1, 2, 'franchisee-user.store', NULL, NULL),
(2432, 1, 2, 'franchisee-user.show', NULL, NULL),
(2433, 1, 2, 'franchisee-user.edit', NULL, NULL),
(2434, 1, 2, 'franchisee-user.update', NULL, NULL),
(2435, 1, 2, 'franchisee-user.destroy', NULL, NULL),
(2436, 1, 2, 'driving-request.index', NULL, NULL),
(2437, 1, 2, 'driving-request.create', NULL, NULL),
(2438, 1, 2, 'driving-request.store', NULL, NULL),
(2439, 1, 2, 'driving-request.show', NULL, NULL),
(2440, 1, 2, 'driving-request.edit', NULL, NULL),
(2441, 1, 2, 'driving-request.update', NULL, NULL),
(2442, 1, 2, 'driving-request.destroy', NULL, NULL),
(2443, 1, 2, 'default-permissions.index', NULL, NULL),
(2444, 1, 2, 'default-permissions.create', NULL, NULL),
(2445, 1, 2, 'default-permissions.store', NULL, NULL),
(2446, 1, 2, 'default-permissions.show', NULL, NULL),
(2447, 1, 2, 'default-permissions.edit', NULL, NULL),
(2448, 1, 2, 'default-permissions.update', NULL, NULL),
(2449, 1, 2, 'default-permissions.destroy', NULL, NULL),
(2450, 1, 2, 'booking.index', NULL, NULL),
(2451, 1, 2, 'booking.create', NULL, NULL),
(2452, 1, 2, 'booking.store', NULL, NULL),
(2453, 1, 2, 'booking.show', NULL, NULL),
(2454, 1, 2, 'booking.edit', NULL, NULL),
(2455, 1, 2, 'booking.update', NULL, NULL),
(2456, 1, 2, 'booking.destroy', NULL, NULL),
(2457, 1, 2, 'booking.vehicle', NULL, NULL),
(2458, 1, 2, 'booking.getRepet', NULL, NULL),
(2459, 1, 2, 'booking.repet-booking', NULL, NULL),
(2460, 1, 2, 'booking.invoice', NULL, NULL),
(2461, 1, 2, 'booking.markcomplete', NULL, NULL),
(2462, 1, 2, 'booking.completed', NULL, NULL),
(2463, 1, 2, 'booking.cancelled', NULL, NULL),
(2464, 1, 2, 'vehicles.index', NULL, NULL),
(2465, 1, 2, 'vehicles.create', NULL, NULL),
(2466, 1, 2, 'vehicles.store', NULL, NULL),
(2467, 1, 2, 'vehicles.show', NULL, NULL),
(2468, 1, 2, 'vehicles.edit', NULL, NULL),
(2469, 1, 2, 'vehicles.update', NULL, NULL),
(2470, 1, 2, 'vehicles.destroy', NULL, NULL),
(2471, 1, 2, 'drivers-vehicles.index', NULL, NULL),
(2472, 1, 2, 'drivers-vehicles.create', NULL, NULL),
(2473, 1, 2, 'drivers-vehicles.store', NULL, NULL),
(2474, 1, 2, 'drivers-vehicles.show', NULL, NULL),
(2475, 1, 2, 'drivers-vehicles.edit', NULL, NULL),
(2476, 1, 2, 'drivers-vehicles.update', NULL, NULL),
(2477, 1, 2, 'drivers-vehicles.destroy', NULL, NULL),
(2478, 1, 2, 'franchisees-price.index', NULL, NULL),
(2479, 1, 2, 'franchisees-price.create', NULL, NULL),
(2480, 1, 2, 'franchisees-price.store', NULL, NULL),
(2481, 1, 2, 'franchisees-price.show', NULL, NULL),
(2482, 1, 2, 'franchisees-price.edit', NULL, NULL),
(2483, 1, 2, 'franchisees-price.update', NULL, NULL),
(2484, 1, 2, 'franchisees-price.destroy', NULL, NULL),
(2485, 1, 2, 'enquiry.index', NULL, NULL),
(2486, 1, 2, 'enquiry.create', NULL, NULL),
(2487, 1, 2, 'enquiry.store', NULL, NULL),
(2488, 1, 2, 'enquiry.show', NULL, NULL),
(2489, 1, 2, 'enquiry.edit', NULL, NULL),
(2490, 1, 2, 'enquiry.update', NULL, NULL),
(2491, 1, 2, 'enquiry.destroy', NULL, NULL),
(2492, 1, 2, 'events.index', NULL, NULL),
(2493, 1, 2, 'events.create', NULL, NULL),
(2494, 1, 2, 'events.store', NULL, NULL),
(2495, 1, 2, 'events.show', NULL, NULL),
(2496, 1, 2, 'events.edit', NULL, NULL),
(2497, 1, 2, 'events.update', NULL, NULL),
(2498, 1, 2, 'events.destroy', NULL, NULL),
(2499, 1, 2, 'client.index', NULL, NULL),
(2500, 1, 2, 'client.create', NULL, NULL),
(2501, 1, 2, 'client.store', NULL, NULL),
(2502, 1, 2, 'client.show', NULL, NULL),
(2503, 1, 2, 'client.edit', NULL, NULL),
(2504, 1, 2, 'client.update', NULL, NULL),
(2505, 1, 2, 'client.destroy', NULL, NULL),
(2506, 1, 2, 'invoice.index', NULL, NULL),
(2507, 1, 2, 'invoice.create', NULL, NULL),
(2508, 1, 2, 'invoice.store', NULL, NULL),
(2509, 1, 2, 'invoice.show', NULL, NULL),
(2510, 1, 2, 'invoice.edit', NULL, NULL),
(2511, 1, 2, 'invoice.update', NULL, NULL),
(2512, 1, 2, 'invoice.destroy', NULL, NULL),
(2513, 1, 2, 'invoice.preview', NULL, NULL),
(2514, 1, 2, 'invoice.download', NULL, NULL),
(2515, 1, 2, 'invoice.markpaid', NULL, NULL),
(2516, 1, 2, 'invoice.invoice', NULL, NULL),
(2517, 1, 2, 'invoice.uninvoiced', NULL, NULL),
(2518, 1, 2, 'invoice.finalized', NULL, NULL),
(2519, 1, 2, 'invoice.paid', NULL, NULL),
(2520, 1, 2, 'companyinfo.index', NULL, NULL),
(2521, 1, 2, 'companyinfo.create', NULL, NULL),
(2522, 1, 2, 'companyinfo.store', NULL, NULL),
(2523, 1, 2, 'companyinfo.show', NULL, NULL),
(2524, 1, 2, 'companyinfo.edit', NULL, NULL),
(2525, 1, 2, 'companyinfo.update', NULL, NULL),
(2526, 1, 2, 'companyinfo.destroy', NULL, NULL),
(2527, 1, 2, 'franchisor-invoice.index', NULL, NULL),
(2528, 1, 2, 'franchisor-invoice.create', NULL, NULL),
(2529, 1, 2, 'franchisor-invoice.store', NULL, NULL),
(2530, 1, 2, 'franchisor-invoice.show', NULL, NULL),
(2531, 1, 2, 'franchisor-invoice.edit', NULL, NULL),
(2532, 1, 2, 'franchisor-invoice.update', NULL, NULL),
(2533, 1, 2, 'franchisor-invoice.destroy', NULL, NULL),
(2534, 1, 2, 'franchisor-invoice.createbulk', NULL, NULL),
(2535, 1, 2, 'franchisor-invoice.createbulk-post', NULL, NULL),
(2536, 1, 2, 'franchisor-invoice.finalised', NULL, NULL),
(2537, 1, 2, 'franchisor-invoiceprice.index', NULL, NULL),
(2538, 1, 2, 'franchisor-invoiceprice.create', NULL, NULL),
(2539, 1, 2, 'franchisor-invoiceprice.store', NULL, NULL),
(2540, 1, 2, 'franchisor-invoiceprice.show', NULL, NULL),
(2541, 1, 2, 'franchisor-invoiceprice.edit', NULL, NULL),
(2542, 1, 2, 'franchisor-invoiceprice.update', NULL, NULL),
(2543, 1, 2, 'franchisor-invoiceprice.destroy', NULL, NULL),
(2544, 1, 2, 'teams.index', NULL, NULL),
(2545, 1, 2, 'teams.create', NULL, NULL),
(2546, 1, 2, 'teams.store', NULL, NULL),
(2547, 1, 2, 'teams.show', NULL, NULL),
(2548, 1, 2, 'teams.edit', NULL, NULL),
(2549, 1, 2, 'teams.update', NULL, NULL),
(2550, 1, 2, 'teams.destroy', NULL, NULL),
(2551, 1, 2, 'unisharp.lfm.show', NULL, NULL),
(2552, 1, 2, 'unisharp.lfm.getErrors', NULL, NULL),
(2553, 1, 2, 'unisharp.lfm.upload', NULL, NULL),
(2554, 1, 2, 'unisharp.lfm.getItems', NULL, NULL),
(2555, 1, 2, 'unisharp.lfm.getAddfolder', NULL, NULL),
(2556, 1, 2, 'unisharp.lfm.getDeletefolder', NULL, NULL),
(2557, 1, 2, 'unisharp.lfm.getFolders', NULL, NULL),
(2558, 1, 2, 'unisharp.lfm.getCrop', NULL, NULL),
(2559, 1, 2, 'unisharp.lfm.getCropimage', NULL, NULL),
(2560, 1, 2, 'unisharp.lfm.getRename', NULL, NULL),
(2561, 1, 2, 'unisharp.lfm.getResize', NULL, NULL),
(2562, 1, 2, 'unisharp.lfm.performResize', NULL, NULL),
(2563, 1, 2, 'unisharp.lfm.getDownload', NULL, NULL),
(2564, 1, 2, 'unisharp.lfm.getDelete', NULL, NULL),
(2565, 1, 2, 'unisharp.lfm.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `id` int(10) NOT NULL,
  `franchisees_id` int(10) NOT NULL,
  `director_name` varchar(255) DEFAULT NULL,
  `director_email` varchar(255) DEFAULT NULL,
  `director_phone` varchar(255) DEFAULT NULL,
  `director_job_role` varchar(255) DEFAULT NULL,
  `director_bio` varchar(255) DEFAULT NULL,
  `director_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`id`, `franchisees_id`, `director_name`, `director_email`, `director_phone`, `director_job_role`, `director_bio`, `director_image`, `created_at`, `updated_at`) VALUES
(30, 1, 'qq1223311', 'qq1223311', '33qq122', 'qq12233', '33qq122', '1560945269-5d0a2275d2eff.png', '2019-06-19 08:53:06', '2019-06-19 06:24:29'),
(31, 1, 'aaaa11', 'aadd11', 'aa11', 'aa1111', 'aa11', '1560944762-5d0a207a835fb.jpg', '2019-06-19 08:53:06', '2019-06-19 06:24:16');

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
(1, 1, 36, 1, '2019-04-09 04:34:42', '2019-04-09 04:34:42', NULL),
(2, 1, 37, 1, '2019-04-10 00:30:54', '2019-04-10 00:30:54', NULL),
(3, 1, 41, 1, '2019-04-11 02:19:55', '2019-04-11 02:19:55', NULL),
(4, 1, 44, 1, '2019-04-11 04:01:22', '2019-04-11 04:01:22', NULL),
(5, 1, 46, 1, '2019-04-11 04:26:02', '2019-04-11 04:26:02', NULL),
(6, 1, 47, 1, '2019-04-11 06:45:23', '2019-04-11 06:45:23', NULL),
(7, 0, 36, 1, '2019-04-11 07:48:52', '2019-04-11 07:48:52', NULL),
(8, 1, 48, 1, '2019-05-09 04:05:40', '2019-05-09 04:05:40', NULL),
(9, 0, 37, 1, '2019-05-21 02:41:00', '2019-05-21 02:41:00', NULL),
(10, 0, 33, 1, '2019-05-21 03:30:02', '2019-05-21 03:30:02', NULL),
(11, 1, 49, 1, '2019-06-27 04:07:07', '2019-06-27 04:07:07', NULL),
(12, 0, 48, 1, '2019-06-27 07:32:59', '2019-06-27 07:32:59', NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `driver_details`
--

CREATE TABLE `driver_details` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `employment_start_date` date DEFAULT NULL,
  `drivinglicence` varchar(255) DEFAULT 'default-driving-licence.png' COMMENT 'PDF or Image',
  `licence_no` varchar(255) DEFAULT NULL,
  `licence_expiry_date` varchar(255) DEFAULT NULL,
  `driver_experience` varchar(255) DEFAULT NULL,
  `phl_number` varchar(255) DEFAULT NULL,
  `phl_image` varchar(255) DEFAULT NULL,
  `phl_expiry_date` varchar(255) DEFAULT NULL,
  `national_insurance_no` varchar(255) DEFAULT NULL,
  `passport_number` varchar(255) DEFAULT NULL,
  `passport_image` varchar(255) DEFAULT 'default-passport.png',
  `training_certificates` varchar(255) DEFAULT 'default-certificate.png',
  `certificates_exp_date` varchar(255) DEFAULT NULL,
  `renewal_date` varchar(255) DEFAULT NULL,
  `renewal_status` int(11) NOT NULL DEFAULT '1',
  `phl_expiry_status` int(11) NOT NULL DEFAULT '1',
  `right_work_uk` tinyint(4) NOT NULL DEFAULT '1',
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_details`
--

INSERT INTO `driver_details` (`id`, `user_id`, `employment_start_date`, `drivinglicence`, `licence_no`, `licence_expiry_date`, `driver_experience`, `phl_number`, `phl_image`, `phl_expiry_date`, `national_insurance_no`, `passport_number`, `passport_image`, `training_certificates`, `certificates_exp_date`, `renewal_date`, `renewal_status`, `phl_expiry_status`, `right_work_uk`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 36, NULL, 'default-driving-licence.png', NULL, '2019-05-22', NULL, 'phl-7896541230', NULL, '2019-05-24', 'NIN-7412258968', '7896000001289', 'default-passport.png', 'default-certificate.png', NULL, '2019-05-29', 1, 1, 1, NULL, '2019-04-09 04:34:42', '2019-07-11 07:06:01', NULL),
(2, 37, '2019-04-01', 'default-driving-licence.png', NULL, NULL, NULL, 'phl-7896541230', NULL, '2019-04-01', 'NIN-7412258963', '7896000001225', 'default-passport.png', 'default-certificate.png', NULL, '2019-04-01', 1, 1, 1, NULL, '2019-04-10 00:30:54', '2019-07-11 07:06:01', NULL),
(6, 41, NULL, 'default-driving-licence.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default-passport.png', 'default-certificate.png', NULL, NULL, 1, 1, 1, NULL, '2019-04-11 02:19:55', '2019-04-11 02:19:55', NULL),
(7, 44, NULL, 'default-driving-licence.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default-passport.png', 'default-certificate.png', NULL, NULL, 1, 1, 1, NULL, '2019-04-11 04:01:22', '2019-04-11 04:01:22', NULL),
(9, 46, NULL, 'default-driving-licence.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default-passport.png', 'default-certificate.png', NULL, NULL, 1, 1, 1, NULL, '2019-04-11 04:26:02', '2019-04-11 04:26:02', NULL),
(11, 47, NULL, 'default-driving-licence.png', 'asdasd', '2019-05-01', NULL, NULL, NULL, NULL, NULL, NULL, 'default-passport.png', 'default-certificate.png', NULL, NULL, 1, 1, 1, NULL, '2019-05-09 03:44:52', '2019-05-09 03:44:52', NULL),
(12, 48, '2019-05-01', '1557394540-5cd3f46c22d08.png', 'a', '2019-05-01', NULL, NULL, NULL, NULL, 'as', 'a', '1557394540-5cd3f46c24bc2.png', 'default-certificate.png', NULL, '2019-06-29', 1, 1, 1, 'NOTE', '2019-05-09 04:05:40', '2019-07-11 07:06:01', NULL),
(13, 33, NULL, 'default-driving-licence.png', NULL, '2019-05-22', NULL, 'phl-7896541230', NULL, '2019-05-24', 'NIN-7412258968', '7896000001289', 'default-passport.png', 'default-certificate.png', NULL, '2019-05-29', 1, 1, 1, NULL, '2019-04-09 04:34:42', '2019-07-11 07:06:01', NULL),
(14, 49, NULL, 'default-driving-licence.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default-passport.png', 'default-certificate.png', NULL, NULL, 1, 1, 1, NULL, '2019-06-27 04:07:07', '2019-06-27 04:07:07', NULL);

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
  `users_id` int(11) DEFAULT NULL,
  `franchisees_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `posted_date` datetime DEFAULT NULL,
  `event_for` int(11) DEFAULT NULL COMMENT '1=>Franchisee Only, 2 =>Admins Only,3=>Companion Drivers,5=>Companion Only',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `users_id`, `franchisees_id`, `title`, `description`, `posted_date`, `event_for`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, 'Driver', 'vxvcv', '2019-04-17 12:25:00', 3, '2019-04-16 01:02:23', '2019-05-11 01:42:22', NULL),
(2, 1, 1, 'Admin', 'Birthday Celebration', '2019-05-15 11:00:00', 2, '2019-05-11 00:49:18', '2019-05-11 01:29:19', NULL),
(3, 1, NULL, 'Companion', 'Party', '2019-05-13 17:00:00', 5, '2019-05-11 05:34:42', '2019-05-11 06:17:28', NULL),
(4, 1, 1, 'Franchisee', 'Test', '2019-05-17 18:35:00', 6, '2019-05-11 07:36:40', '2019-05-11 07:36:40', NULL);

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
(1, 'Lorem Ipsum is simply dummy text of the printing??', 'Lorem Ipsum is simply dummy text of the printing Lorem Ipsum is simply dummy text of the printingLorem Ipsum is simply dummy text of the printing', 1, '2018-11-12 00:36:47', '2018-11-12 00:36:47'),
(2, 'what is your name?', 'My name is Namrata', 1, '2019-05-07 06:21:26', '2019-05-07 06:21:26');

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

INSERT INTO `franchisees` (`id`, `name`, `base_location`, `contact_person_name`, `contact_person_name_sec`, `contact_person_phone`, `contact_person_phone_sec`, `owner_dmd_mobilenumber`, `owner_dmd_mobilenumber_sec`, `owner_homenumber`, `address`, `contact_person_email`, `contact_person_email_sec`, `franchise_owner_dmd_email`, `franchise_manager_name`, `manager_person_phone`, `manager_dmd_mob_frn_owner`, `manager_dmd_email_frn_owner`, `franchise_administrator_name`, `administrator_person_phone`, `administrator_dmd_mob_frn_owner`, `administrator_dmd_email_frn_owner`, `status`, `locality`, `country`, `public_liability_insurance`, `public_liability_insurance_status`, `employers_liability_insurance`, `employers_liability_insurance_status`, `amount_cover`, `franchise_license_renewal_date`, `franchise_license_renewal_status`, `company_year_end`, `confirmation_statement_date`, `bank_account_no`, `bank_sortcode`, `account_name`, `franchise_agreement`, `amendments`, `shareholders_nameone`, `shareholders_nametwo`, `shareholders_namethree`, `shareholders_namefour`, `share_percentageone`, `share_percentagetwo`, `share_percentagethree`, `share_percentagefour`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Driving Miss Daisy (UK)  Limited', 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Hasibur Rahaman', NULL, '7059114888', NULL, '7896541236', NULL, 'House No', 'Fullerton Road, La Habra Heights, CA, USA', 'franchise@gmail.com', NULL, 'franchise@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2019-05-31', 1, '2019-05-31', 1, '500', '2019-04-30', 1, NULL, NULL, '789654123366', 'SSSS', 'Hasibur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-09 04:21:13', '2019-07-11 07:06:01', NULL),
(2, 'sunita', 'Ajay Nagar, Mukundapur, Calcutta, West Bengal, India', 'sunita', NULL, '7410258967', NULL, '8520147963', NULL, '8520147963', 'Ajay Nagar, Mukundapur, Calcutta, West Bengal, India', 'sunitadey45@gmail.com', NULL, 'sunitadeydmd4@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2019-04-25', 1, '2019-04-27', 1, NULL, '2019-04-24', 1, NULL, NULL, '78965400001', NULL, 'sunita dey', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-09 05:20:40', '2019-07-11 07:06:01', NULL),
(3, 'DMD2', 'Kolkata Railway Station (Chitpur Station), Belgachia, Kolkata, West Bengal, India', 'supritam', NULL, '7896302541', NULL, '8520147963', NULL, '8520147985', 'Kolkata Railway Station (Chitpur Station), Belgachia, Kolkata, West Bengal, India', 'supritam25@gmail.com', NULL, 'supritam25@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2019-05-16', 1, '2019-05-25', 1, NULL, '2019-04-26', 1, NULL, NULL, '78965400001', NULL, 'sunita dey', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-21 02:21:03', '2019-07-11 07:06:01', NULL);

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
  `companion_cost` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `franchisees_price`
--

INSERT INTO `franchisees_price` (`id`, `franchisees_id`, `driver_cost`, `vehicle_cost`, `comfort_cost`, `paid_mileage`, `base_driving_cost`, `waiting_time_cost`, `companionship_cost`, `companion_cost`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 13, 0.4, 10, 0.5, 1, 5, 5, NULL, '2019-04-09 04:21:13', '2019-04-09 04:21:13', NULL),
(2, 2, 13, 0.4, 10, 0.5, 1, 5, 5, NULL, '2019-04-09 05:20:40', '2019-04-09 05:20:40', NULL),
(3, 3, 13, 0.4, 10, 0.5, 1, 5, 5, NULL, '2019-05-21 02:21:03', '2019-05-21 02:21:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `franchisorinvoice`
--

CREATE TABLE `franchisorinvoice` (
  `id` int(11) NOT NULL,
  `finalised` int(11) NOT NULL DEFAULT '0',
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
  `amount` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `franchisorinvoice`
--

INSERT INTO `franchisorinvoice` (`id`, `finalised`, `invoice_no`, `franchisees_id`, `standard_fee`, `turnover`, `invoice_for_month`, `invoice_for_year`, `create_by`, `commission`, `comment`, `custom_entry`, `VAT`, `amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'IN-10001', 1, 100, 3346.51, 7, 2019, 1, 3336.51, NULL, NULL, 0.00, 3436.51, '2019-07-01 02:56:29', '2019-07-01 02:56:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `franchisorinvoice_details`
--

CREATE TABLE `franchisorinvoice_details` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `fee_id` int(11) NOT NULL,
  `fee_type` varchar(255) NOT NULL,
  `qnty` int(11) NOT NULL DEFAULT '1',
  `price` double(10,2) NOT NULL DEFAULT '0.00',
  `vat` double(10,2) DEFAULT '0.00',
  `amount` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Accounting', 2, '["11"]', 100.00, 120, '2019-05-21 02:15:07', '2019-05-21 02:15:07');

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
(1, 10.00, 10000.00, 100.00, 100.00, 100.00, '2019-07-01 02:43:01', '2019-07-01 02:43:01', NULL);

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
(2, 'company_number', 'Company Number', '99999999999998', NULL, 1, 2, 1),
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
-- Table structure for table `import_history`
--

CREATE TABLE `import_history` (
  `id` int(11) NOT NULL,
  `franchisees_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=>client',
  `log_file` varchar(255) NOT NULL,
  `upload_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `qnty` int(11) DEFAULT '1',
  `price` double(10,2) NOT NULL DEFAULT '0.00',
  `vat` int(11) NOT NULL DEFAULT '0',
  `amount` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `booking_id`, `comment`, `qnty`, `price`, `vat`, `amount`) VALUES
(17, 2, 'Parking Charge', 1, 100.00, 20, 100.00),
(18, 1, 'Parking Charge', 1, 100.00, 0, 100.00),
(21, 4, 'Parking Fee & m Fees', 2, 10.00, 10, 20.00);

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
(7, '2018_02_27_053619_add_renews_at_column_to_subscriptions', 5),
(8, '2019_03_25_105047_create_audits_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `part_payment`
--

CREATE TABLE `part_payment` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `start_outstanding_amount` double(10,2) NOT NULL,
  `end_outstanding_amount` double(10,2) NOT NULL,
  `payment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `part_payment`
--

INSERT INTO `part_payment` (`id`, `invoice_id`, `amount`, `start_outstanding_amount`, `end_outstanding_amount`, `payment_time`, `created_at`, `updated_at`) VALUES
(1, 29, 1.00, 0.00, 0.00, '2019-06-07 03:50:22', '2019-06-07 03:50:22', '2019-06-07 03:50:22'),
(2, 29, 7.00, 0.00, 0.00, '2019-06-07 03:56:38', '2019-06-07 03:56:38', '2019-06-07 03:56:38'),
(3, 29, 5.00, 45.00, 0.00, '2019-06-07 04:00:08', '2019-06-07 04:00:08', '2019-06-07 04:00:08'),
(4, 29, 5.50, 39.50, 0.00, '2019-06-07 04:02:10', '2019-06-07 04:02:10', '2019-06-07 04:02:10'),
(5, 27, 28.92, 70.00, 0.00, '2019-06-07 05:14:58', '2019-06-07 05:14:58', '2019-06-07 05:14:58'),
(6, 27, 20.00, 50.00, 0.00, '2019-06-07 05:17:33', '2019-06-07 05:17:33', '2019-06-07 05:17:33'),
(7, 27, 10.00, 50.00, 0.00, '2019-06-07 05:21:11', '2019-06-07 05:21:11', '2019-06-07 05:21:11'),
(8, 31, -45.00, 68.16, 0.00, '2019-06-07 12:10:08', '2019-06-07 06:40:08', '2019-06-07 06:40:08'),
(9, 31, 110.00, 113.16, 0.00, '2019-06-07 12:10:46', '2019-06-07 06:40:46', '2019-06-07 06:40:46'),
(10, 31, 2.12, 3.16, 0.00, '2019-06-07 12:31:15', '2019-06-07 07:01:15', '2019-06-07 07:01:15'),
(11, 31, 10.00, 1.04, 0.00, '2019-06-07 12:59:31', '2019-06-07 07:29:31', '2019-06-07 07:29:31'),
(12, 28, 58.56, 58.56, 0.00, '2019-06-07 13:02:44', '2019-06-07 07:32:44', '2019-06-07 07:32:44'),
(13, 32, 100.00, 327.76, 0.00, '2019-06-07 14:26:23', '2019-06-07 08:56:23', '2019-06-07 08:56:23'),
(14, 32, 27.76, 227.76, 0.00, '2019-06-07 14:26:39', '2019-06-07 08:56:39', '2019-06-07 08:56:39'),
(15, 32, 100.00, 200.00, 100.00, '2019-06-07 14:34:44', '2019-06-07 09:04:44', '2019-06-07 09:04:44'),
(16, 32, 25.00, 100.00, 75.00, '2019-06-07 14:35:18', '2019-06-07 09:05:18', '2019-06-07 09:05:18'),
(17, 34, 7.25, 47.58, 40.33, '2019-06-10 13:34:06', '2019-06-10 08:04:06', '2019-06-10 08:04:06'),
(18, 34, 20.25, 40.33, 20.08, '2019-06-11 07:17:23', '2019-06-11 01:47:23', '2019-06-11 01:47:23'),
(19, 40, 50.00, 78.89, 28.89, '2019-06-14 10:44:49', '2019-06-14 05:14:49', '2019-06-14 05:14:49'),
(20, 40, 15.00, 28.89, 13.89, '2019-06-14 10:45:07', '2019-06-14 05:15:07', '2019-06-14 05:15:07'),
(21, 40, 13.89, 13.89, 0.00, '2019-06-14 10:45:22', '2019-06-14 05:15:22', '2019-06-14 05:15:22'),
(22, 38, 50.00, 60.48, 10.48, '2019-06-14 10:46:54', '2019-06-14 05:16:54', '2019-06-14 05:16:54'),
(23, 38, 10.48, 10.48, 0.00, '2019-06-14 10:47:05', '2019-06-14 05:17:05', '2019-06-14 05:17:05'),
(24, 43, 5.00, 9.25, 4.25, '2019-06-17 11:31:50', '2019-06-17 06:01:50', '2019-06-17 06:01:50'),
(25, 43, 4.25, 4.25, 0.00, '2019-06-17 11:32:12', '2019-06-17 06:02:12', '2019-06-17 06:02:12'),
(26, 45, 20.00, 69.45, 49.45, '2019-06-17 12:50:26', '2019-06-17 07:20:26', '2019-06-17 07:20:26');

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
(239, 'franchisor-invoice.createbulk-post', 'franchisor-invoice.createbulk-post', 'franchisor-invoice.createbulk-post', '2018-12-03 05:41:17', '2018-12-03 05:41:17'),
(240, 'enquery-price', 'enquery-price', 'enquery-price', '2019-01-03 08:08:46', '2019-01-03 08:08:46'),
(241, 'client-addpopup', 'client-addpopup', 'client-addpopup', '2019-01-03 08:08:46', '2019-01-03 08:08:46'),
(242, 'client-addpopup-store', 'client-addpopup-store', 'client-addpopup-store', '2019-01-03 08:08:46', '2019-01-03 08:08:46'),
(243, 'booking.markcomplete', 'booking.markcomplete', 'booking.markcomplete', '2019-01-03 08:08:46', '2019-01-03 08:08:46'),
(244, 'invoice.invoice', 'invoice.invoice', 'invoice.invoice', '2019-01-03 08:08:46', '2019-01-03 08:08:46'),
(245, 'invoice.uninvoiced', 'invoice.uninvoiced', 'invoice.uninvoiced', '2019-01-03 08:08:46', '2019-01-03 08:08:46'),
(246, 'invoice.finalized', 'invoice.finalized', 'invoice.finalized', '2019-01-03 08:08:46', '2019-01-03 08:08:46'),
(247, 'invoice.paid', 'invoice.paid', 'invoice.paid', '2019-01-03 08:08:46', '2019-01-03 08:08:46'),
(248, 'companyinfo', 'companyinfo', 'companyinfo', '2019-01-03 08:08:46', '2019-01-03 08:08:46'),
(249, 'companyinfo-edit', 'companyinfo-edit', 'companyinfo-edit', '2019-01-03 08:08:46', '2019-01-03 08:08:46'),
(250, 'franchisor-invoice.finalised', 'franchisor-invoice.finalised', 'franchisor-invoice.finalised', '2019-01-03 08:08:46', '2019-01-03 08:08:46'),
(251, 'generate', 'generate', 'generate', '2019-01-03 08:08:46', '2019-01-03 08:08:46'),
(252, 'generate-email', 'generate-email', 'generate-email', '2019-01-03 08:08:46', '2019-01-03 08:08:46'),
(253, 'import-index', 'import-index', 'import-index', '2019-01-03 08:08:46', '2019-01-03 08:08:46'),
(254, 'import-client', 'import-client', 'import-client', '2019-01-03 08:08:47', '2019-01-03 08:08:47'),
(255, 'import-client-post', 'import-client-post', 'import-client-post', '2019-01-03 08:08:47', '2019-01-03 08:08:47'),
(256, 'booking.completed', 'booking.completed', 'booking.completed', '2019-01-28 07:11:43', '2019-01-28 07:11:43'),
(257, 'business-details', 'business-details', 'business-details', '2019-01-28 07:11:43', '2019-01-28 07:11:43'),
(258, 'business-details-update', 'business-details-update', 'business-details-update', '2019-01-28 07:11:43', '2019-01-28 07:11:43'),
(259, 'log-viewer::dashboard', 'log-viewer::dashboard', 'log-viewer::dashboard', '2019-07-01 07:04:50', '2019-07-01 07:04:50'),
(260, 'log-viewer::logs.list', 'log-viewer::logs.list', 'log-viewer::logs.list', '2019-07-01 07:04:50', '2019-07-01 07:04:50'),
(261, 'log-viewer::logs.delete', 'log-viewer::logs.delete', 'log-viewer::logs.delete', '2019-07-01 07:04:50', '2019-07-01 07:04:50'),
(262, 'log-viewer::logs.show', 'log-viewer::logs.show', 'log-viewer::logs.show', '2019-07-01 07:04:50', '2019-07-01 07:04:50'),
(263, 'log-viewer::logs.download', 'log-viewer::logs.download', 'log-viewer::logs.download', '2019-07-01 07:04:50', '2019-07-01 07:04:50'),
(264, 'log-viewer::logs.filter', 'log-viewer::logs.filter', 'log-viewer::logs.filter', '2019-07-01 07:04:50', '2019-07-01 07:04:50'),
(265, 'log-viewer::logs.search', 'log-viewer::logs.search', 'log-viewer::logs.search', '2019-07-01 07:04:50', '2019-07-01 07:04:50'),
(266, 'debugbar.telescope', 'debugbar.telescope', 'debugbar.telescope', '2019-07-01 07:04:50', '2019-07-01 07:04:50'),
(267, 'reset-password', 'reset-password', 'reset-password', '2019-07-01 07:04:50', '2019-07-01 07:04:50'),
(268, 'do-reset', 'do-reset', 'do-reset', '2019-07-01 07:04:50', '2019-07-01 07:04:50'),
(269, 'forget-password', 'forget-password', 'forget-password', '2019-07-01 07:04:50', '2019-07-01 07:04:50'),
(270, 'get-vehicle-expire-date', 'get-vehicle-expire-date', 'get-vehicle-expire-date', '2019-07-01 07:04:50', '2019-07-01 07:04:50'),
(271, 'get-driver-expire-date', 'get-driver-expire-date', 'get-driver-expire-date', '2019-07-01 07:04:50', '2019-07-01 07:04:50'),
(272, 'get-company-expire-date', 'get-company-expire-date', 'get-company-expire-date', '2019-07-01 07:04:50', '2019-07-01 07:04:50'),
(273, 'booking.cancelled', 'booking.cancelled', 'booking.cancelled', '2019-07-01 07:04:50', '2019-07-01 07:04:50'),
(274, 'get-client-list', 'get-client-list', 'get-client-list', '2019-07-01 07:04:50', '2019-07-01 07:04:50'),
(275, 'quotes.index', 'quotes.index', 'quotes.index', '2019-07-01 07:04:50', '2019-07-01 07:04:50'),
(276, 'quotes.create', 'quotes.create', 'quotes.create', '2019-07-01 07:04:50', '2019-07-01 07:04:50'),
(277, 'quotes.store', 'quotes.store', 'quotes.store', '2019-07-01 07:04:50', '2019-07-01 07:04:50'),
(278, 'quotes.show', 'quotes.show', 'quotes.show', '2019-07-01 07:04:50', '2019-07-01 07:04:50'),
(279, 'quotes.edit', 'quotes.edit', 'quotes.edit', '2019-07-01 07:04:50', '2019-07-01 07:04:50'),
(280, 'quotes.update', 'quotes.update', 'quotes.update', '2019-07-01 07:04:50', '2019-07-01 07:04:50'),
(281, 'quotes.destroy', 'quotes.destroy', 'quotes.destroy', '2019-07-01 07:04:50', '2019-07-01 07:04:50'),
(282, 'approve-quote', 'approve-quote', 'approve-quote', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(283, 'submit-approve-quote', 'submit-approve-quote', 'submit-approve-quote', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(284, 'remove-insurancemsg', 'remove-insurancemsg', 'remove-insurancemsg', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(285, 'remove-taxmsg', 'remove-taxmsg', 'remove-taxmsg', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(286, 'remove-motmsg', 'remove-motmsg', 'remove-motmsg', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(287, 'remove-drivermsg', 'remove-drivermsg', 'remove-drivermsg', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(288, 'remove-driverphlmsg', 'remove-driverphlmsg', 'remove-driverphlmsg', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(289, 'remove-licenserenewal', 'remove-licenserenewal', 'remove-licenserenewal', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(290, 'employers-liability-insurance', 'employers-liability-insurance', 'employers-liability-insurance', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(291, 'remove-public-liability-insurance', 'remove-public-liability-insurance', 'remove-public-liability-insurance', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(292, 'exportcsv', 'exportcsv', 'exportcsv', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(293, 'invoice.group-preview', 'invoice.group-preview', 'invoice.group-preview', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(294, 'invoice.group-invoice', 'invoice.group-invoice', 'invoice.group-invoice', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(295, 'invoice.partial-payment', 'invoice.partial-payment', 'invoice.partial-payment', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(296, 'invoice.pay-partial-payment', 'invoice.pay-partial-payment', 'invoice.pay-partial-payment', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(297, 'group-invoice-email', 'group-invoice-email', 'group-invoice-email', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(298, 'invoice.update-finalize', 'invoice.update-finalize', 'invoice.update-finalize', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(299, 'invoice.invoice-email', 'invoice.invoice-email', 'invoice.invoice-email', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(300, 'companion.index', 'companion.index', 'companion.index', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(301, 'companion.create', 'companion.create', 'companion.create', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(302, 'companion.store', 'companion.store', 'companion.store', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(303, 'companion.show', 'companion.show', 'companion.show', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(304, 'companion.edit', 'companion.edit', 'companion.edit', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(305, 'companion.update', 'companion.update', 'companion.update', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(306, 'companion.destroy', 'companion.destroy', 'companion.destroy', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(307, 'staff.index', 'staff.index', 'staff.index', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(308, 'staff.create', 'staff.create', 'staff.create', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(309, 'staff.store', 'staff.store', 'staff.store', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(310, 'staff.show', 'staff.show', 'staff.show', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(311, 'staff.edit', 'staff.edit', 'staff.edit', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(312, 'staff.update', 'staff.update', 'staff.update', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(313, 'staff.destroy', 'staff.destroy', 'staff.destroy', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(314, 'certificate-delete', 'certificate-delete', 'certificate-delete', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(315, 'staff-changepassword', 'staff-changepassword', 'staff-changepassword', '2019-07-01 07:04:51', '2019-07-01 07:04:51'),
(316, 'staff-changepass', 'staff-changepass', 'staff-changepass', '2019-07-01 07:04:51', '2019-07-01 07:04:51');

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
  `location_name` varchar(255) DEFAULT NULL,
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
(3, 1, 1, 'Dumdum, Calcutta, West Bengal, India', 15.45, 52, '2019-06-03 01:31:24', '2019-06-03 01:31:24', NULL),
(4, 1, 99, 'Sealdah Railway Station, Sealdah Flyover, Sealdah, Raja Bazar, Calcutta, West Bengal, India', 8.62, 38, '2019-06-03 01:31:24', '2019-06-03 01:31:24', NULL),
(5, 2, 1, 'Ruby General Hospital, E. M. Bypass, Sector I, Kasba Golpark, Calcutta, West Bengal, India', 4.26, 16, '2019-06-03 02:27:01', '2019-06-03 02:27:01', NULL),
(6, 2, 99, 'Sealdah Railway Station, Sealdah Flyover, Sealdah, Raja Bazar, Calcutta, West Bengal, India', 5.45, 27, '2019-06-03 02:27:01', '2019-06-03 02:27:01', NULL),
(7, 3, 1, '456,456/1 Lat Krabang 52 Yaek 2, Lat Krabang, Bangkok, Thailand', 15.45, 52, '2019-06-03 03:48:48', '2019-06-03 03:48:48', NULL),
(8, 3, 99, 'Kolkata Railway Station (Chitpur Station), Belgachia, Kolkata, West Bengal, India', 4.93, 25, '2019-06-03 03:48:48', '2019-06-03 03:48:48', NULL),
(9, 4, 1, 'Garia Station Road, Garia Place, Garia, West Bengal, India', 0.00, 0, '2019-06-03 05:58:31', '2019-06-03 05:58:31', NULL),
(10, 4, 99, 'Sealdah Railway Station, Sealdah Flyover, Sealdah, Raja Bazar, Calcutta, West Bengal, India', 9.54, 41, '2019-06-03 05:58:31', '2019-06-03 05:58:31', NULL),
(11, 5, 1, 'Garia, Calcutta, West Bengal, India', 0.66, 3, '2019-06-04 08:04:07', '2019-06-04 08:04:07', NULL),
(12, 5, 99, 'Dum Dum Airport (CCU), Jessore Road, Dum Dum, Calcutta, West Bengal, India', 14.93, 49, '2019-06-04 08:04:07', '2019-06-04 08:04:07', NULL),
(13, 6, 1, 'Garia, Calcutta, West Bengal, India', 0.66, 3, '2019-06-04 08:14:28', '2019-06-04 08:14:28', NULL),
(14, 6, 99, 'Dum Dum Airport (CCU), Jessore Road, Dum Dum, Calcutta, West Bengal, India', 14.93, 49, '2019-06-04 08:14:28', '2019-06-04 08:14:28', NULL),
(17, 7, 1, 'Shyambazar 5 Point Crossing, Bag Bazar Colony, Bidhan Sarani, Baghbazar, Calcutta, West Bengal, India', 12.28, 49, '2019-06-07 00:45:39', '2019-06-07 00:45:39', NULL),
(18, 7, 99, 'Ajay Nagar, Mukundapur, Calcutta, West Bengal, India', 9.79, 39, '2019-06-07 00:45:39', '2019-06-07 00:45:39', NULL),
(19, 8, 1, '723121', 13.32, 51, '2019-06-07 05:28:35', '2019-06-07 05:28:35', NULL),
(20, 8, 99, 'Esplanade Bus Stop, Maidan, Esplanade, Dharmatala, Taltala, Calcutta, West Bengal, India', 6.74, 44, '2019-06-07 05:28:35', '2019-06-07 05:28:35', NULL),
(21, 9, 1, 'West Bengal 723121, India', 174.00, 359, '2019-06-07 07:41:30', '2019-06-07 07:41:30', NULL),
(22, 9, 99, 'Asansol, West Bengal, India', 37.94, 113, '2019-06-07 07:41:30', '2019-06-07 07:41:30', NULL),
(23, 10, 1, 'Dumdum, Calcutta, West Bengal, India', 15.45, 52, '2019-06-10 01:28:29', '2019-06-10 01:28:29', NULL),
(24, 10, 99, 'Sealdah Railway Station, Sealdah Flyover, Sealdah, Raja Bazar, Calcutta, West Bengal, India', 9.06, 38, '2019-06-10 01:28:29', '2019-06-10 01:28:29', NULL),
(25, 11, 1, 'Ajay Nagar, Mukundapur, Calcutta, West Bengal, India', 2.56, 10, '2019-06-10 05:00:02', '2019-06-10 05:00:02', NULL),
(26, 11, 99, 'Ruby General Hospital, Anandapur Main Road, Sector I, East Kolkata Township, Calcutta, West Bengal, India', 1.92, 9, '2019-06-10 05:00:02', '2019-06-10 05:00:02', NULL),
(27, 12, 1, 'Jadavpur University, Jadavpur, Calcutta, West Bengal, India', 2.84, 19, '2019-06-10 05:01:08', '2019-06-10 05:01:08', NULL),
(28, 12, 99, 'Tollygunge, Calcutta, West Bengal, India', 1.89, 11, '2019-06-10 05:01:08', '2019-06-10 05:01:08', NULL),
(29, 13, 1, '456,456/1 Lat Krabang 52 Yaek 2, Lat Krabang, Bangkok, Thailand', 5.65, 36, '2019-06-10 05:04:57', '2019-06-10 05:04:57', NULL),
(30, 13, 99, 'Park Street, Beniapukur, Calcutta, West Bengal, India', 2.87, 18, '2019-06-10 05:04:57', '2019-06-10 05:04:57', NULL),
(35, 14, 1, 'Ruby General Hospital, Anandapur Main Road, Sector I, East Kolkata Township, Calcutta, West Bengal, India', 4.28, 16, '2019-06-11 05:12:20', '2019-06-11 05:12:20', NULL),
(36, 14, 99, 'Park Street, Beniapukur, Calcutta, West Bengal, India', 4.91, 17, '2019-06-11 05:12:20', '2019-06-11 05:12:20', NULL),
(37, 15, 1, 'Dumdum Metro Station Parking Yard, South Sinthee Road, Pearabagan, South Sinthee, Biswanath Colony, Sinthee, Calcutta, West Bengal, India', 13.80, 57, '2019-06-11 07:20:38', '2019-06-11 07:20:38', NULL),
(38, 15, 99, 'Airport, Dumdum, Calcutta, West Bengal, India', 4.20, 24, '2019-06-11 07:20:38', '2019-06-11 07:20:38', NULL),
(39, 16, 1, 'Girish Park, Calcutta, West Bengal, India', 12.61, 52, '2019-06-11 07:26:47', '2019-06-11 07:26:47', NULL),
(40, 16, 99, 'Howrah Railway Station, Howrah, West Bengal, India', 2.89, 18, '2019-06-11 07:26:47', '2019-06-11 07:26:47', NULL),
(43, 17, 1, 'Kolkata, West Bengal, India', 10.55, 49, '2019-06-11 08:54:15', '2019-06-11 08:54:15', NULL),
(44, 17, 99, 'Howrah Railway Station, Howrah, West Bengal, India', 2.88, 20, '2019-06-11 08:54:15', '2019-06-11 08:54:15', NULL),
(45, 18, 1, 'Park Street, Beniapukur, Calcutta, West Bengal, India', 8.99, 31, '2019-06-14 01:16:22', '2019-06-14 01:16:22', NULL),
(46, 18, 99, 'Dumdum Metro Station Parking Yard, South Sinthee Road, Pearabagan, South Sinthee, Biswanath Colony, Sinthee, Calcutta, West Bengal, India', 6.42, 39, '2019-06-14 01:16:22', '2019-06-14 01:16:22', NULL),
(47, 19, 1, 'Ajoy Nagar, Mukundapur, Calcutta, West Bengal, India', 2.56, 10, '2019-06-14 02:56:26', '2019-06-14 02:56:26', NULL),
(48, 19, 99, 'Ruby Hall Clinic, Sasoon Road, Sangamvadi, Pune, Maharashtra, India', 1291.88, 2296, '2019-06-14 02:56:26', '2019-06-14 02:56:26', NULL),
(49, 20, 1, 'Jadavpur University, Jadavpur, Calcutta, West Bengal, India', 2.84, 19, '2019-06-14 04:30:20', '2019-06-14 04:30:20', NULL),
(50, 20, 99, 'Ajay Nagar, Mukundapur, Calcutta, West Bengal, India', 2.30, 12, '2019-06-14 04:30:20', '2019-06-14 04:30:20', NULL),
(51, 21, 1, 'Esplanade Bus Stop, Maidan, Esplanade, Dharmatala, Taltala, Calcutta, West Bengal, India', 12.28, 40, '2019-06-14 04:31:17', '2019-06-14 04:31:17', NULL),
(52, 21, 99, 'Dumdum Metro Station Parking Yard, South Sinthee Road, Pearabagan, South Sinthee, Biswanath Colony, Sinthee, Calcutta, West Bengal, India', 5.69, 38, '2019-06-14 04:31:17', '2019-06-14 04:31:17', NULL),
(53, 22, 1, 'Jadavpur, Calcutta, West Bengal, India', 2.65, 18, '2019-06-14 05:12:25', '2019-06-14 05:12:25', NULL),
(54, 22, 99, 'Ajay Nagar, Mukundapur, Calcutta, West Bengal, India', 2.50, 13, '2019-06-14 05:12:25', '2019-06-14 05:12:25', NULL),
(57, 23, 1, 'Jadavpur, Calcutta, West Bengal, India', 2.65, 18, '2019-06-17 05:49:02', '2019-06-17 05:49:02', NULL),
(58, 23, 99, 'Ruby General Hospital, Anandapur Main Road, Sector I, East Kolkata Township, Calcutta, West Bengal, India', 3.74, 18, '2019-06-17 05:49:02', '2019-06-17 05:49:02', NULL),
(61, 24, 1, 'Jadavpur, Calcutta, West Bengal, India', 2.65, 18, '2019-06-17 05:59:46', '2019-06-17 05:59:46', NULL),
(62, 24, 99, 'Chingrighata Crossing, Tangra, Calcutta, West Bengal', 7.30, 29, '2019-06-17 05:59:46', '2019-06-17 05:59:46', NULL),
(63, 25, 1, 'Jadavpur 8B Bus Stand, Jadavpur, Calcutta, West Bengal, India', 2.68, 18, '2019-06-17 06:22:21', '2019-06-17 06:22:21', NULL),
(64, 25, 99, 'Patuli, Calcutta, West Bengal, India', 2.48, 15, '2019-06-17 06:22:21', '2019-06-17 06:22:21', NULL),
(65, 26, 1, 'Jadavpur, Calcutta, West Bengal, India', 2.65, 18, '2019-06-17 07:15:58', '2019-06-17 07:15:58', NULL),
(66, 26, 99, 'Chingrighata, Tangra, Calcutta, West Bengal, India', 7.60, 31, '2019-06-17 07:15:58', '2019-06-17 07:15:58', NULL),
(67, 27, 1, 'Jadavpur, Calcutta, West Bengal, India', 2.65, 18, '2019-06-17 07:16:29', '2019-06-17 07:16:29', NULL),
(68, 27, 99, 'Ultadanga, Calcutta, West Bengal, India', 10.90, 46, '2019-06-17 07:16:29', '2019-06-17 07:16:29', NULL),
(69, 28, 1, 'Jadavpur, Calcutta, West Bengal, India', 2.65, 18, '2019-06-19 07:21:40', '2019-06-19 07:21:40', NULL),
(70, 28, 99, 'Ultadanga, Calcutta, West Bengal, India', 10.90, 46, '2019-06-19 07:21:40', '2019-06-19 07:21:40', NULL),
(71, 29, 1, 'Jadavpur, Calcutta, West Bengal, India', 2.65, 18, '2019-06-19 08:05:59', '2019-06-19 08:05:59', NULL),
(72, 29, 99, 'Ruby Hall Clinic, Sasoon Road, Sangamvadi, Pune, Maharashtra, India', 1289.05, 2294, '2019-06-19 08:05:59', '2019-06-19 08:05:59', NULL),
(73, 30, 1, 'Jadavpur, Calcutta, West Bengal, India', 2.65, 18, '2019-06-19 08:06:31', '2019-06-19 08:06:31', NULL),
(74, 30, 99, 'Ultadanga, Calcutta, West Bengal, India', 10.90, 46, '2019-06-19 08:06:31', '2019-06-19 08:06:31', NULL),
(75, 31, 1, '723121', 174.00, 359, '2019-06-19 08:14:47', '2019-06-19 08:14:47', NULL),
(76, 31, 99, 'Asansol, West Bengal, India', 37.94, 113, '2019-06-19 08:14:47', '2019-06-19 08:14:47', NULL),
(77, 32, 1, '723121', 174.00, 359, '2019-06-19 08:15:08', '2019-06-19 08:15:08', NULL),
(78, 32, 99, 'Durgapur, West Bengal, India', 58.50, 145, '2019-06-19 08:15:08', '2019-06-19 08:15:08', NULL),
(79, 33, 1, '456,456/1 Lat Krabang 52 Yaek 2, Lat Krabang, Bangkok, Thailand', 2131.85, 4277, '2019-06-25 08:38:25', '2019-06-25 08:38:25', NULL),
(80, 33, 99, 'Howrah Railway Station, Howrah, West Bengal, India', 2082.28, 4162, '2019-06-25 08:38:25', '2019-06-25 08:38:25', NULL),
(81, 34, 1, '456,456/1 Lat Krabang 52 Yaek 2, Lat Krabang, Bangkok, Thailand', 2123.28, 4255, '2019-06-26 06:53:33', '2019-06-26 06:53:33', NULL),
(82, 34, 99, 'Howrah Railway Station, Howrah, West Bengal, India', 2082.27, 4168, '2019-06-26 06:53:33', '2019-06-26 06:53:33', NULL),
(83, 35, 1, '723121', 176.19, 364, '2019-06-27 01:27:57', '2019-06-27 01:27:57', NULL),
(84, 35, 99, 'Howrah Railway Station, Howrah, West Bengal, India', 159.37, 332, '2019-06-27 01:27:57', '2019-06-27 01:27:57', NULL),
(85, 36, 1, '723121', 176.19, 364, '2019-06-27 01:27:57', '2019-06-27 01:27:57', NULL),
(86, 36, 99, 'Howrah Railway Station, Howrah, West Bengal, India', 159.37, 332, '2019-06-27 01:27:57', '2019-06-27 01:27:57', NULL),
(87, 37, 1, '723121', 176.19, 364, '2019-06-27 01:27:57', '2019-06-27 01:27:57', NULL),
(88, 37, 99, 'Howrah Railway Station, Howrah, West Bengal, India', 159.37, 332, '2019-06-27 01:27:57', '2019-06-27 01:27:57', NULL),
(89, 38, 1, '723121', 176.19, 364, '2019-06-27 01:27:57', '2019-06-27 01:27:57', NULL),
(90, 38, 99, 'Howrah Railway Station, Howrah, West Bengal, India', 159.37, 332, '2019-06-27 01:27:57', '2019-06-27 01:27:57', NULL),
(91, 39, 1, '723121', 176.19, 364, '2019-06-27 01:27:57', '2019-06-27 01:27:57', NULL),
(92, 39, 99, 'Howrah Railway Station, Howrah, West Bengal, India', 159.37, 332, '2019-06-27 01:27:58', '2019-06-27 01:27:58', NULL),
(93, 40, 1, '723121', 176.19, 364, '2019-07-01 04:31:06', '2019-07-01 04:31:06', NULL),
(94, 40, 99, 'Howrah Railway Station, Howrah, West Bengal, India', 159.37, 332, '2019-07-01 04:31:06', '2019-07-01 04:31:06', NULL),
(95, 41, 1, '723121', 176.19, 364, '2019-07-01 04:46:57', '2019-07-01 04:46:57', NULL),
(96, 41, 99, 'Howrah Railway Station, Howrah, West Bengal, India', 159.37, 332, '2019-07-01 04:46:57', '2019-07-01 04:46:57', NULL),
(97, 42, 1, '723121', 176.19, 364, '2019-07-01 04:50:59', '2019-07-01 04:50:59', NULL),
(98, 42, 99, 'Howrah Railway Station, Howrah, West Bengal, India', 159.37, 332, '2019-07-01 04:50:59', '2019-07-01 04:50:59', NULL),
(99, 43, 1, 'Ajoy Nagar, Mukundapur, Calcutta, West Bengal, India', 2.56, 10, '2019-07-01 04:53:32', '2019-07-01 04:53:32', NULL),
(100, 43, 99, 'Ruby Hall Clinic, Sasoon Road, Sangamvadi, Pune, Maharashtra, India', 1291.88, 2296, '2019-07-01 04:53:32', '2019-07-01 04:53:32', NULL),
(101, 44, 1, 'Ajoy Nagar, Mukundapur, Calcutta, West Bengal, India', 2.56, 10, '2019-07-01 04:56:06', '2019-07-01 04:56:06', NULL),
(102, 44, 99, 'Ruby Hall Clinic, Sasoon Road, Sangamvadi, Pune, Maharashtra, India', 1291.88, 2296, '2019-07-01 04:56:06', '2019-07-01 04:56:06', NULL),
(107, 47, 1, 'Garia, Calcutta, West Bengal, India', 0.66, 3, '2019-07-01 06:59:48', '2019-07-01 06:59:48', NULL),
(108, 47, 99, 'Asansol, West Bengal, India', 145.59, 274, '2019-07-01 06:59:48', '2019-07-01 06:59:48', NULL),
(109, 48, 1, 'Garia, Calcutta, West Bengal, India', 0.66, 3, '2019-07-01 07:01:01', '2019-07-01 07:01:01', NULL),
(110, 48, 99, 'Adyar, Chennai, Tamil Nadu, India', 1052.59, 1905, '2019-07-01 07:01:01', '2019-07-01 07:01:01', NULL),
(119, 53, 1, 'Garia, Calcutta, West Bengal, India', 0.00, 0, '2019-07-01 07:03:13', '2019-07-01 07:03:13', NULL),
(120, 53, 99, 'Adyar, Chennai, Tamil Nadu, India', 1052.59, 1905, '2019-07-01 07:03:13', '2019-07-01 07:03:13', NULL),
(121, 54, 1, 'Garia, Calcutta, West Bengal, India', 0.66, 3, '2019-07-02 07:58:24', '2019-07-02 07:58:24', NULL),
(122, 54, 99, 'Asansol, West Bengal, India', 143.83, 265, '2019-07-02 07:58:24', '2019-07-02 07:58:24', NULL),
(123, 55, 1, 'Garia, Calcutta, West Bengal, India', 0.66, 3, '2019-07-09 07:20:46', '2019-07-09 07:20:46', NULL),
(124, 55, 99, 'Agra, Uttar Pradesh, India', 802.63, 1452, '2019-07-09 07:20:46', '2019-07-09 07:20:46', NULL),
(125, 56, 1, 'Garia, Calcutta, West Bengal, India', 0.00, 0, '2019-07-09 07:21:58', '2019-07-09 07:21:58', NULL),
(126, 56, 99, 'Dungarpur, Rajasthan, India', 1203.55, 2122, '2019-07-09 07:21:58', '2019-07-09 07:21:58', NULL);

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
(2, 1, 'Test Role', 'd', 'fg', '2018-09-24 01:12:10', '2018-09-24 01:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(10) NOT NULL,
  `franchisees_id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  `social_media_name` varchar(255) DEFAULT NULL,
  `social_media_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `franchisees_id`, `company_id`, `social_media_name`, `social_media_link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(817, 1, 0, 'Linkedin', 'https://in.linkedin.com/', '2019-06-19 11:54:52', '2019-06-19 11:54:52', NULL),
(818, 1, 0, 'Instagram', 'https://www.instagram.com/?hl=en', '2019-06-19 11:54:52', '2019-06-19 11:54:52', NULL),
(819, 1, 0, 'Facebook', 'https://facebook.com/', '2019-06-19 11:54:52', '2019-06-19 11:54:52', NULL),
(820, 1, 0, 'Twitter', 'https://twitter.com/LaraCollective', '2019-06-19 11:54:52', '2019-06-19 11:54:52', NULL);

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
(2, 1, 'MD HASIBUR RAHAMAN', 'DEveloper', 'rahamanh939@gmail.com', '+91 9874563210', '1560769725-5d0774bd3e07c.jpg', '<p>Test</p>', '2018-11-28 08:20:17', '2019-06-17 05:38:45', NULL),
(3, 1, 'Abhishek patra', 'Developer', 'ap0677852@gmail.com', '8145366825', '1561459797-5d11fc557703d.png', 'Test', '2019-06-25 05:19:57', '2019-06-25 05:19:57', NULL);

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
  `user_type` int(11) NOT NULL DEFAULT '4' COMMENT '1=>Franchisor, 2=>Franchisee, 3=>Driver,4=>Users,5=>Companion',
  `franchisees_id` int(11) DEFAULT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `users` (`id`, `is_super`, `user_type`, `franchisees_id`, `name`, `surname`, `username`, `profile_pic`, `email`, `password`, `remember_token`, `device_token`, `dob`, `phone`, `address`, `street`, `locality`, `town`, `postcode`, `country`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(1, 1, 1, NULL, 'Hasibur Rahaman', 'Rahaman', NULL, 'profile.jpg', 'hasib2008@gmail.com', '$2y$10$azBENyVBiAfJOovL8fD3iuRZszIuT3WG0/MtJBFJrMGvlfmXf0sQK', 'Z84CiG5EjXETkN6ZCClgRKZSfGS7kkZPStFHVoAQq7Ly0Qxy1nX3ILivfu4b', NULL, '1989-12-29', '7059114888', 'Garia Station Road, Garia Place, Garia, West Bengal, India', 'Street11', 'Locality1', 'Town', 'Postcode', NULL, NULL, '2019-06-26 06:31:37', NULL, 1),
(33, 0, 3, 2, 'Driver', 'one', 'testusername', 'profile.jpg', 'hasibur@ga.ss', '$2y$10$drzjjPTy74Bdq0ozgjsX2u.ys51Rz/wkH3VnAKDw8Su5Kq1XyAtZa', NULL, NULL, '2019-05-31', '9733189522', 'GA, USA', NULL, 'Assam, India', NULL, NULL, 'United Kingdom', '2019-04-03 06:55:22', '2019-05-21 02:30:57', NULL, 1),
(34, 0, 5, 2, 'munmun', 'dey', NULL, 'profile.jpg', 'munmundey45@gmail.com', '$2y$10$tcmvK5Xivihu4YKFI7YC4.XhQw7STbvDcuuPgaPQ73unqzJwfeqCK', NULL, NULL, '1991-04-29', '7896541230', '3228 Massachusetts Avenue Connector, Dorchester, Boston, MA, USA', NULL, '3228 Massachusetts Avenue Connector, Dorchester, Boston, MA, USA', NULL, NULL, 'United Kingdom', '2019-04-04 08:23:19', '2019-04-05 03:30:24', NULL, 1),
(35, 1, 5, 2, 'sunita', 'dey', 'sunitadey', 'profile.jpg', 'sunitadey89@gmail.com', '$2y$10$OnPXBBYbuHgfCobQdBcSKOsPSNGJKZSR64cPFJEZtMvo.xumTuJ2.', NULL, NULL, '1989-04-02', '7410258963', 'Root Down, West 33rd Avenue, Denver, CO, USA', NULL, 'Root Down, West 33rd Avenue, Denver, CO, USA', NULL, NULL, 'United Kingdom', '2019-04-04 08:31:34', '2019-04-05 07:46:21', NULL, 1),
(36, 1, 3, 1, 'Hasibur', 'Rahaman', 'Hasib', '1561628156-5d148dfccc81b.png', 'hasib@gmail.com', '$2y$10$3Bin.B4y00ckVlJAY0GeOuy5x7A5YOtbNdQt28aS4edDgPdUoFUk6', 'tHKi2XWxwXTkuTjuWtHcaeZVNBBLGhA4sTJR36XA1CVOyaovEm6O2oIOF5vV', NULL, '1889-12-28', '7412589632', 'Garia Station Road, Nabagram, Mauza Panchpota, Calcutta, West Bengal, India', NULL, 'Garia Station Road, Nabagram, Mauza Panchpota, Calcutta, West Bengal, India', NULL, NULL, 'United Kingdom', '2019-04-09 04:34:42', '2019-07-08 03:56:38', NULL, 1),
(37, 0, 3, 1, 'rimpa', 'roy', 'rimparoy', 'profile.jpg', 'rimparoy789@gmail.com', '$2y$10$kTgDBTo3C4LpORO8v0JM3.5.oLc087lGlB.F9d4LyhnR6Aka5lrze', NULL, NULL, '2019-04-16', '7410258963', 'kolkata Airport Quarters, Kaikhali, Calcutta, West Bengal, India', NULL, 'kolkata Airport Quarters, Kaikhali, Calcutta, West Bengal, India', NULL, NULL, 'United Kingdom', '2019-04-11 06:45:22', '2019-04-11 07:00:37', NULL, 1),
(41, 0, 3, 1, 'jkl', 'dffsf', 'hasib2008@gmail.com', 'profile.jpg', 'jklk45@gmail.com', '$2y$10$/PNsQ0tk0cx7hHciVT43mOk1IM3AauJm/xl35brGd.upTRuAd4j/a', NULL, NULL, '2019-04-25', '7896541230', 'kolkata Airport Quarters, Kaikhali, Calcutta, West Bengal, India', NULL, NULL, NULL, NULL, 'United Kingdom', '2019-04-11 02:19:55', '2019-04-11 02:19:55', NULL, 1),
(44, 0, 3, 1, 'hgjghhj', 'ggjghjgh', 'fghhfghfhgfhf', 'profile.jpg', 'fghhffh@gmail.com', '$2y$10$XSKksG7OXNHe5Tmajod0tuBeWol96R3xqD6wWtVgUuYBZiFTGF27C', NULL, NULL, '2019-04-17', '7410258963', 'Karnataka, India', NULL, 'Karnataka, India', NULL, NULL, 'United Kingdom', '2019-04-11 04:01:22', '2019-04-11 04:01:22', NULL, 1),
(46, 1, 2, 1, 'adada', 'adasd', 'asdashasib2008@gmail.com', 'profile.jpg', 'asdad@gmail.com', '$2y$10$eX87c0GUGO25dHydhkY8yuY5XG1pCS6AdbbHN6tmpkZR2RfY8tONK', 'xE98KTXVDgHlYEhx0xFjj7U5yFamtTjXNza1Gcb75fy79khyKn5tUKhsg8d9', NULL, '2019-04-29', '13212312312', 'Equestria, Pretoria, South Africa', NULL, 'Qwik Park Airport Parking, Merriman Road, Romulus, MI, USA', NULL, NULL, 'United Kingdom', '2019-04-11 04:26:01', '2019-05-11 07:38:39', NULL, 1),
(47, 0, 2, 1, 'czxc', 'zzxczxczx', 'qwewqe', 'profile.jpg', 'qweqw@gmai.xsd', '$2y$10$GtvJGhvDL9dgyZ.zF0sgz.zUBblW/qhoPWQZIF2iXZ1MiB4GYkgfa', NULL, NULL, '0000-00-00', '7788787', 'Xcel Energy Center, West Kellogg Boulevard, Saint Paul, MN, USA', NULL, 'Xcel Energy Center, West Kellogg Boulevard, Saint Paul, MN, USA', NULL, NULL, 'United Kingdom', '2019-05-09 03:44:52', '2019-05-09 03:44:52', NULL, 1),
(48, 1, 5, 1, 'Axzxz', 'A', 'A', '1557394540-5cd3f46c06c75.png', 'a@a.com', '$2y$10$N3iqlUB2jU26LuT6h21byeYhdiorHUxhssREL.SmTvava/U9n2KhC', 'WK3EJ6VoBqYAB4vKnyyxqps5tJINrcKaqNDJl2p6QNjl4tH5qe6rPRLwKxWX', NULL, '2019-01-02', '7896541230', 'a', NULL, 'a', NULL, NULL, 'United Kingdom', '2019-05-09 04:05:40', '2019-06-27 07:34:21', NULL, 1),
(49, 0, 2, 1, 'adas', 'dasd', 'asdasd', '1561628227-5d148e4323742.png', 'asdasd@ggg.as', '$2y$10$V0icaDTepp1C0AKNPB5QUuR0i3I8QmBqZAqaK1V/lA3tgZCOi0hma', NULL, NULL, '2019-06-27', 'adasdas', 'Aashima Mall, Hoshangabad Road, Danish Nagar, Bagmugaliya, Bhopal, Madhya Pradesh, India', NULL, NULL, NULL, NULL, 'United Kingdom', '2019-06-27 04:07:07', '2019-06-27 04:07:07', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vat_reg`
--

CREATE TABLE `vat_reg` (
  `id` int(10) NOT NULL,
  `franchisees_id` int(10) NOT NULL,
  `vat_reg_date` date DEFAULT NULL,
  `vat_de_reg_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vat_reg`
--

INSERT INTO `vat_reg` (`id`, `franchisees_id`, `vat_reg_date`, `vat_de_reg_date`, `created_at`, `updated_at`) VALUES
(83, 2, '2019-04-18', '2019-04-18', '2019-05-21 01:49:48', '2019-05-21 01:49:48'),
(84, 2, '2019-04-25', '2019-04-25', '2019-05-21 01:49:48', '2019-05-21 01:49:48'),
(790, 1, '2019-04-30', '2019-04-30', '2019-06-19 06:24:52', '2019-06-19 06:24:52'),
(791, 1, '2019-05-22', '2019-05-22', '2019-06-19 06:24:52', '2019-06-19 06:24:52'),
(792, 1, '2019-05-31', '2019-05-31', '2019-06-19 06:24:52', '2019-06-19 06:24:52'),
(793, 1, '2019-06-30', '2019-06-30', '2019-06-19 06:24:52', '2019-06-19 06:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `franchisees_id` int(11) NOT NULL,
  `color_modification` tinyint(4) NOT NULL DEFAULT '0',
  `body_type` int(255) DEFAULT NULL,
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
  `insurance_status` int(11) DEFAULT '0',
  `mot_status` int(11) NOT NULL DEFAULT '0',
  `tax_renewal_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `franchisees_id`, `color_modification`, `body_type`, `vehicles_model`, `vehicles_company`, `vehicles_number`, `max_capacity`, `phv_licence_number`, `phv_issue_date`, `phv_expiry_date`, `tax_renewal_date`, `insurance_date`, `mot_date`, `lat`, `lng`, `wheelchair_access`, `status`, `insurance_status`, `mot_status`, `tax_renewal_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 2, 'A1', 'BMW', '95148', 4, '123', '2019-05-01', '2019-05-01', '2019-05-01', '2019-05-06', '2019-05-09', NULL, NULL, 1, 1, 1, 1, 1, '2019-04-09 04:34:26', '2019-07-11 07:06:02', NULL),
(2, 1, 0, NULL, 'BMV', 'BMV', 'WB-4563210', 5, 'PHV-741000025', '2019-05-15', '2020-05-31', '2020-05-31', '2019-05-31', '2019-05-30', NULL, NULL, 1, 1, 1, 1, 0, '2019-05-21 04:03:48', '2019-07-11 07:06:02', NULL),
(3, 1, 0, NULL, 'VMY', 'VMY', 'WB-8500026002', 5, 'PHV-74100780025', '2019-05-15', '2020-10-01', '2020-10-01', '2019-10-01', '2019-09-30', NULL, NULL, 1, 1, 0, 0, 0, '2019-06-27 07:41:03', '2019-06-27 07:41:18', NULL);

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
-- Indexes for table `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audits_auditable_id_auditable_type_index` (`auditable_id`,`auditable_type`),
  ADD KEY `audits_user_id_user_type_index` (`user_id`,`user_type`);

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
-- Indexes for table `booking_invoice_override`
--
ALTER TABLE `booking_invoice_override`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_vehicle`
--
ALTER TABLE `booking_vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
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
-- Indexes for table `crontab`
--
ALTER TABLE `crontab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `default_permissions`
--
ALTER TABLE `default_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
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
-- Indexes for table `import_history`
--
ALTER TABLE `import_history`
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
-- Indexes for table `part_payment`
--
ALTER TABLE `part_payment`
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
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `vat_reg`
--
ALTER TABLE `vat_reg`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `audits`
--
ALTER TABLE `audits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `booking_invoice_override`
--
ALTER TABLE `booking_invoice_override`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `booking_vehicle`
--
ALTER TABLE `booking_vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `company_info`
--
ALTER TABLE `company_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;
--
-- AUTO_INCREMENT for table `crontab`
--
ALTER TABLE `crontab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `default_permissions`
--
ALTER TABLE `default_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2566;
--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `drivers_vehicles`
--
ALTER TABLE `drivers_vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `driver_attendance`
--
ALTER TABLE `driver_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `driver_details`
--
ALTER TABLE `driver_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `driving_request`
--
ALTER TABLE `driving_request`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `enquiry_details`
--
ALTER TABLE `enquiry_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `enquiry_pickup_locations`
--
ALTER TABLE `enquiry_pickup_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `franchisees`
--
ALTER TABLE `franchisees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `franchisees_price`
--
ALTER TABLE `franchisees_price`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `franchisorinvoice`
--
ALTER TABLE `franchisorinvoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `franchisorinvoice_details`
--
ALTER TABLE `franchisorinvoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `franchisor_invoice_fee`
--
ALTER TABLE `franchisor_invoice_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `franchisor_invoice_price`
--
ALTER TABLE `franchisor_invoice_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `general_setting`
--
ALTER TABLE `general_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `import_history`
--
ALTER TABLE `import_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `part_payment`
--
ALTER TABLE `part_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;
--
-- AUTO_INCREMENT for table `pickup_locations`
--
ALTER TABLE `pickup_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=821;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `vat_reg`
--
ALTER TABLE `vat_reg`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=794;
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
