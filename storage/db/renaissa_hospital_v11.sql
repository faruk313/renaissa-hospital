-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2020 at 09:41 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `renaissa_hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `brokers`
--

CREATE TABLE `brokers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `broker_income_histories`
--

CREATE TABLE `broker_income_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prescription_ticket_id` bigint(20) UNSIGNED DEFAULT NULL,
  `patient_test_invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `broker_id` bigint(20) UNSIGNED NOT NULL,
  `broker_income_amount` int(11) NOT NULL,
  `broker_payable_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `broker_income_histories`
--

INSERT INTO `broker_income_histories` (`id`, `invoice_date`, `invoice_no`, `prescription_ticket_id`, `patient_test_invoice_id`, `broker_id`, `broker_income_amount`, `broker_payable_amount`, `created_at`, `updated_at`) VALUES
(34, '2020-10-12', 'RH201001', 24, NULL, 1, 270, 14, '2020-10-11 22:12:38', '2020-10-11 22:12:38'),
(35, '2020-10-12', 'RH201002', NULL, 31, 1, 680, 34, '2020-10-11 22:13:15', '2020-10-11 22:13:15'),
(36, '2020-10-12', 'RH201003', 25, NULL, 1, 500, 25, '2020-10-11 22:15:51', '2020-10-11 22:15:51'),
(37, '2020-10-12', 'RH201004', NULL, 32, 1, 680, 34, '2020-10-11 22:16:21', '2020-10-11 22:16:21'),
(38, '2020-10-12', 'RH201005', 26, NULL, 2, 300, 15, '2020-10-11 22:18:56', '2020-10-11 22:18:56'),
(39, '2020-10-12', 'RH201006', NULL, 33, 3, 730, 37, '2020-10-11 22:19:27', '2020-10-11 22:19:27'),
(40, '2020-10-12', 'RH201007', 27, NULL, 1, 500, 25, '2020-10-11 22:20:38', '2020-10-11 22:20:38'),
(41, '2020-10-12', 'RH201008', NULL, 34, 3, 3314, 166, '2020-10-11 22:21:20', '2020-10-11 22:21:20'),
(42, '2020-10-12', 'RH201009', 28, NULL, 1, 300, 15, '2020-10-12 13:13:05', '2020-10-12 13:13:05'),
(43, '2020-10-14', 'RH201010', NULL, 35, 2, 2776, 139, '2020-10-14 02:07:09', '2020-10-14 02:07:09'),
(44, '2020-10-15', 'RH201011', 29, NULL, 2, 240, 12, '2020-10-14 19:37:35', '2020-10-14 19:37:35'),
(45, '2020-10-15', 'RH201012', 30, NULL, 2, 500, 25, '2020-10-14 19:38:52', '2020-10-14 19:38:52'),
(46, '2020-10-15', 'RH201013', 31, NULL, 2, 300, 15, '2020-10-14 20:00:30', '2020-10-14 20:00:30'),
(47, '2020-10-15', 'RH201014', 32, NULL, 2, 300, 15, '2020-10-14 20:02:01', '2020-10-14 20:02:01'),
(48, '2020-10-15', 'RH201015', NULL, 36, 1, 764, 38, '2020-10-14 20:06:34', '2020-10-14 20:06:34'),
(49, '2020-10-15', 'RH201016', 33, NULL, 3, 200, 10, '2020-10-14 20:07:03', '2020-10-14 20:07:03'),
(50, '2020-10-15', 'RH201017', 34, NULL, 2, 300, 15, '2020-10-14 20:07:59', '2020-10-14 20:07:59'),
(51, '2020-10-15', 'RH201018', 35, NULL, 2, 500, 25, '2020-10-14 20:09:41', '2020-10-14 20:09:41'),
(52, '2020-10-16', 'RH201019', 38, NULL, 2, 300, 15, '2020-10-16 13:36:01', '2020-10-16 13:36:01'),
(53, '2020-10-16', 'RH201020', 39, NULL, 1, 300, 15, '2020-10-16 13:38:41', '2020-10-16 13:38:41'),
(54, '2020-10-16', 'RH201021', NULL, 37, 2, 680, 34, '2020-10-16 13:51:44', '2020-10-16 13:51:44'),
(55, '2020-10-17', 'RH201022', 40, NULL, 1, 300, 15, '2020-10-17 05:39:26', '2020-10-17 05:39:26'),
(56, '2020-10-18', 'RH201003', 41, NULL, 2, 300, 15, '2020-10-17 20:29:30', '2020-10-17 20:29:30'),
(57, '2020-10-19', 'RH201003', 45, NULL, 2, 500, 25, '2020-10-19 07:10:47', '2020-10-19 07:10:47'),
(58, '2020-10-19', 'RH201003', 46, NULL, 1, 300, 15, '2020-10-19 07:32:29', '2020-10-19 07:32:29'),
(59, '2020-10-19', 'RH201003', 48, NULL, 2, 300, 15, '2020-10-19 10:19:56', '2020-10-19 10:19:56'),
(60, '2020-10-19', 'RH201003', 49, NULL, 3, 1000, 50, '2020-10-19 10:21:49', '2020-10-19 10:21:49'),
(61, '2020-10-19', 'RH201003', NULL, 38, 2, 180, 9, '2020-10-19 10:23:28', '2020-10-19 10:23:28'),
(62, '2020-10-19', 'RH201003', NULL, 39, 2, 180, 9, '2020-10-19 12:15:39', '2020-10-19 12:15:39'),
(63, '2020-10-19', 'RH201003', NULL, 40, 1, 350, 18, '2020-10-19 13:24:12', '2020-10-19 13:24:12'),
(64, '2020-10-19', 'RH201003', NULL, 41, 66, 350, 18, '2020-10-19 13:24:55', '2020-10-19 13:24:55'),
(65, '2020-10-19', 'RH201003', NULL, 42, 1, 180, 9, '2020-10-19 13:26:47', '2020-10-19 13:26:47'),
(66, '2020-10-20', 'RH201003', NULL, 43, 67, 180, 9, '2020-10-20 09:14:08', '2020-10-20 09:14:08'),
(67, '2020-10-20', 'RH201001', NULL, 4, 2, 350, 18, '2020-10-20 09:30:05', '2020-10-20 09:30:05'),
(68, '2020-10-20', 'RH201003', NULL, 7, 2, 360, 18, '2020-10-20 09:34:42', '2020-10-20 09:34:42'),
(69, '2020-10-20', 'RH201004', NULL, 8, 2, 315, 16, '2020-10-20 09:35:20', '2020-10-20 09:35:20'),
(70, '2020-10-20', 'RH201005', NULL, 9, 68, 477, 24, '2020-10-20 09:36:59', '2020-10-20 09:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `broker_payments`
--

CREATE TABLE `broker_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_date` date NOT NULL,
  `broker_id` bigint(20) UNSIGNED NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `broker_payments`
--

INSERT INTO `broker_payments` (`id`, `invoice_date`, `broker_id`, `paid_amount`, `created_at`, `updated_at`) VALUES
(3, '2020-10-12', 1, 147, '2020-10-11 22:23:12', '2020-10-15 10:56:58'),
(4, '2020-10-12', 2, 15, '2020-10-11 22:23:18', '2020-10-11 22:23:18'),
(5, '2020-10-12', 3, 203, '2020-10-12 11:37:12', '2020-10-12 11:37:12'),
(6, '2020-10-15', 2, 107, '2020-10-15 10:08:22', '2020-10-15 10:08:22'),
(7, '2020-10-15', 3, 10, '2020-10-15 10:57:41', '2020-10-15 10:57:41'),
(8, '2020-10-15', 1, 38, '2020-10-15 11:46:46', '2020-10-15 11:46:46'),
(9, '2020-10-17', 1, 15, '2020-10-17 05:43:48', '2020-10-17 05:43:48'),
(10, '2020-10-14', 2, 139, '2020-10-17 05:43:53', '2020-10-17 05:43:53'),
(11, '2020-10-16', 1, 15, '2020-10-17 05:43:58', '2020-10-17 05:43:58'),
(12, '2020-10-16', 2, 49, '2020-10-17 05:44:03', '2020-10-17 05:44:03');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `prescription_fees` int(11) DEFAULT NULL,
  `prescription_payable` int(11) DEFAULT NULL,
  `report_fees` int(11) DEFAULT NULL,
  `report_payable` int(11) DEFAULT NULL,
  `salary_or_contract_fees` int(11) DEFAULT NULL,
  `test_commission` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `chamber_id` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '1',
  `degrees` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mailing_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_institute` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institute_designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institute_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `leave_or_present_status` tinyint(1) NOT NULL DEFAULT '1',
  `leave_or_present_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `doctor_id`, `type`, `prescription_fees`, `prescription_payable`, `report_fees`, `report_payable`, `salary_or_contract_fees`, `test_commission`, `name`, `email`, `mobile`, `photo`, `department_id`, `chamber_id`, `dob`, `gender`, `degrees`, `mailing_address`, `permanent_address`, `present_institute`, `institute_designation`, `institute_address`, `joining_date`, `status`, `leave_or_present_status`, `leave_or_present_note`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 'doc1599472652', 1, 1000, NULL, 1000, NULL, 1000000, 0, 'Sample Doctor Name 009', NULL, '12412421', 'doctor_1603101953.jpg', 47, 5, '1990-08-17', 1, 'Mbbs', '-------', '---------', '----------', '-----------', '------------', '2020-10-19', 1, 1, '-------', 1, '2020-09-07 09:57:32', '2020-10-19 10:05:53'),
(6, 'doc1599472683', 1, 500, NULL, 300, NULL, 30000, 0, 'Dr. A.Rohim', 'rohim@gmail.com', '21133', 'doctor_1599638100.png', 9, 6, '1998-09-09', 1, 'mbbs', 'khulna', 'dhaka', 'kmc', 'dr.', 'khulna', '2020-09-09', 1, 0, 'leave for 5 days', 1, '2020-09-07 09:58:03', '2020-09-09 07:55:48'),
(10, 'doc1599473494', 1, 300, NULL, 200, NULL, 40000, 0, 'Dr. xyz', 'xyz@gmail.com', '01232313', 'doctor_1599587945.jpg', 1, 6, '2000-09-07', 1, 'mbbs', NULL, NULL, NULL, NULL, NULL, '2020-09-07', 1, 1, 'leave for 5 days', 1, '2020-09-07 10:11:34', '2020-09-08 18:10:45'),
(11, 'doc1599488821', 3, 500, NULL, 200, NULL, 30000, 0, 'Omar Faruk', NULL, '01611425480', 'doctor_1599488821.png', 1, 5, '2010-09-07', 0, 'MBBS', NULL, NULL, NULL, NULL, NULL, '2020-09-07', 1, 1, 'till 12-09-2020', 1, '2020-09-07 14:27:01', '2020-09-13 17:44:34'),
(12, 'doc1599489859', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Dr. Abul Kalam Azad', NULL, NULL, 'doctor_1599588597.jpg', 1, 7, '2020-09-07', 1, 'MBBS', NULL, NULL, NULL, NULL, NULL, '2020-09-07', 1, 1, NULL, 1, '2020-09-07 14:44:19', '2020-09-08 18:09:57'),
(14, 'doc1599568292', 2, 200, 200, 100, 50, NULL, 0, 'Dr. abc', 'abc@gmail.com', '01611426599', 'doctor_1599587833.png', 1, 6, '1990-08-17', 1, 'MBBS,DU', 'Dhaka', 'Dhaka', 'DMC', 'Asst. Pro.', 'Dhaka', '2020-09-01', 1, 1, '12pm to 4pm', 1, '2020-09-08 09:59:07', '2020-09-09 09:34:06'),
(16, 'doc1599645500', 1, 400, NULL, 200, NULL, 50000, 1, 'Dr. abc', 'asd@gmail.com', '12131', 'doctor_1599645500.jpg', 9, 10, '1990-08-17', 1, 'mbbs', 'dhaka', 'dhaka', 'dmc', 'ass. pro.', 'dhaka', '2020-09-09', 1, 1, '10am 5pm', 1, '2020-09-09 09:58:20', '2020-09-09 09:58:20'),
(17, 'doc1599646537', 2, 500, 500, 300, 200, NULL, 10, 'Maj. Gen. Dr. H.R. Harun (Retd.)', NULL, NULL, 'doctor_1599646537.png', 51, 5, '1990-08-17', 1, 'MBBS, FCPS, FRCS (Edin), FRCS (Glasgow), FWHO (Urology), D. Uro. (London), Urologist', 'South Banasree, Khilgoan, Dhaka-1219', 'South Banasree, Khilgoan, Dhaka-1219', 'Dhaka Medical College', 'Pro.', 'Dhaka', '2020-09-09', 1, 1, 'available 12pm to 4pm', 1, '2020-09-09 10:15:37', '2020-09-09 10:27:52'),
(18, 'doc1599648329', 2, 200, 200, 200, 150, NULL, 0, 'Dr. Abcd', NULL, NULL, 'doctor_1599648980.jpg', 1, 6, '1990-08-17', 1, 'MBBS', 'dhaka', 'dhaka', NULL, NULL, NULL, '2020-09-01', 1, 1, '12pm 6pm', 1, '2020-09-09 10:45:29', '2020-09-09 10:59:57'),
(19, 'doc1599655669', 2, NULL, 300, 200, 100, NULL, 1, 'Prof. Dr. Zahid Hossain', NULL, NULL, 'doctor_1599655669.png', 54, 7, '1990-08-17', 1, 'MBBS, FCPS, Specialist-Paediatric Cardiology', NULL, NULL, NULL, NULL, NULL, '2020-09-09', 1, 1, '4pm to 10pm', 1, '2020-09-09 12:47:49', '2020-09-09 12:48:15'),
(20, 'doc1599979885', 1, 200, NULL, 100, NULL, 10000, 0, 'Abc Abc', NULL, '121131', 'doctor_1599980106.png', 53, 5, '1990-08-17', 1, 'Mbbs', NULL, NULL, NULL, NULL, NULL, '2020-09-13', 1, 1, 'leave for 5 days', 1, '2020-09-13 06:51:25', '2020-09-13 17:44:25'),
(21, 'doc1600011645', 4, NULL, NULL, NULL, NULL, NULL, 1, 'Outside Doctor Name One', NULL, NULL, NULL, NULL, NULL, '1990-08-17', 1, 'Mbbs', NULL, NULL, NULL, NULL, NULL, '2020-09-13', 1, 1, NULL, 1, '2020-09-13 15:40:45', '2020-09-13 15:40:45'),
(22, 'doc20200001', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Doc23', NULL, '14234', 'doctor_1600325691.png', 9, 11, '1990-08-17', 1, 'Adfadfd', NULL, NULL, NULL, NULL, NULL, '2020-09-17', 1, 1, NULL, 1, '2020-09-17 06:54:52', '2020-09-17 06:54:52'),
(23, 'doc1600325815', 1, 1312312, NULL, 1312, NULL, 12312, 0, 'Doctor Name', NULL, '01611425480', NULL, 47, 5, '1990-08-17', 1, 'Mbbs', NULL, NULL, NULL, NULL, NULL, '2020-10-19', 1, 1, '4pm to 9pm', 1, '2020-09-17 06:56:55', '2020-10-19 10:16:17'),
(24, 'doc1600441918', 2, NULL, NULL, NULL, NULL, NULL, 0, 'OutSide Doctor Name 0070', NULL, NULL, NULL, NULL, NULL, '1990-08-17', 1, 'Fcps', NULL, NULL, NULL, NULL, NULL, '2020-09-18', 1, 1, NULL, 1, '2020-09-18 15:11:58', '2020-10-19 10:17:40'),
(25, 'dc1600682834', 4, NULL, NULL, NULL, NULL, NULL, 0, 'OutSide Doctor Name 0090', NULL, NULL, NULL, NULL, NULL, '2020-10-19', 1, 'Mbbs', NULL, NULL, NULL, NULL, NULL, '2020-10-19', 1, 1, NULL, 1, '2020-09-21 10:07:14', '2020-10-19 10:17:54'),
(26, 'dc1600682835', 4, NULL, NULL, NULL, NULL, NULL, 0, 'OutSide Doctor Name 0008', NULL, '021210', NULL, NULL, NULL, '2020-10-19', 1, 'Mbbs', NULL, NULL, NULL, NULL, NULL, '2020-10-19', 1, 1, '---------', 1, '2020-09-21 10:07:15', '2020-10-19 10:15:32'),
(27, 'dc1600682913', 4, NULL, NULL, NULL, NULL, NULL, 0, 'OutSide Doctor Name 0010', NULL, NULL, NULL, NULL, NULL, '2020-10-19', 1, 'Mbbs', NULL, NULL, NULL, NULL, NULL, '2020-10-19', 1, 1, '----------', 1, '2020-09-21 10:08:33', '2020-10-19 10:15:59'),
(28, 'dc1600682932', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Dr. Omar Faruk', NULL, NULL, NULL, NULL, NULL, '2020-10-19', 1, 'Mbbs', NULL, NULL, NULL, NULL, NULL, '2020-10-19', 1, 1, '--------', 1, '2020-09-21 10:08:52', '2020-10-19 10:15:01'),
(29, 'dc1600683006', 4, NULL, NULL, NULL, NULL, NULL, 0, 'OutSide Doctor Name 0001', NULL, NULL, NULL, NULL, NULL, '2020-10-19', 1, 'Mbbs', NULL, NULL, NULL, NULL, NULL, '2020-10-19', 0, 1, '----------', 1, '2020-09-21 10:10:06', '2020-10-19 10:13:41'),
(30, 'dc1600683184', 4, NULL, NULL, NULL, NULL, NULL, 0, 'OutSide Doctor Name 0001', NULL, '023123120', NULL, 53, 6, '2020-10-19', 1, 'Fcps', '--------', '---------', '---------', '---------', '-----------', '2020-10-19', 0, 1, '--------', 1, '2020-09-21 10:13:04', '2020-10-19 10:10:59'),
(31, 'dc1600683371', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Maj. Gen. Dr. H.R. Harun (Retd.)', NULL, NULL, NULL, 1, 5, '2020-10-19', 1, 'MBBS', NULL, NULL, NULL, NULL, NULL, '2020-10-19', 0, 1, '----------', 1, '2020-09-21 10:16:11', '2020-10-19 10:10:06'),
(32, 'dc1600684593', 4, NULL, NULL, NULL, NULL, NULL, 0, 'OutSide Doctor Name 0001', NULL, '113100131', NULL, 1, 5, '2020-10-19', 1, 'Mbbs', '------', '-------', '------', '--------', '------', '2020-10-19', 1, 1, '--------', 1, '2020-09-21 10:36:33', '2020-10-19 10:09:50'),
(33, 'dc1600684967', 1, 300, NULL, 200, NULL, 212000, 0, 'Sample Doctor Name 003', NULL, NULL, NULL, 1, 5, '2020-10-19', 1, 'Mbbs', '-', '----', '---------', '-------', '-------', '2020-10-19', 1, 1, '--------', 1, '2020-09-21 10:42:47', '2020-10-19 10:04:56'),
(34, 'dc1600688985', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Sample Doctor Name 002', NULL, NULL, 'doctor_1603101841.jpg', 1, 5, '2020-10-19', 1, 'FCPS', '--------', '--------', '---------', '---------', '----------', '2020-10-19', 0, 0, '---------', 1, '2020-09-21 11:49:45', '2020-10-19 10:04:01'),
(39, 'D074894109', 1, 233, NULL, 222, NULL, 0, 0, 'Sample Doctor Name 001', NULL, '123123', 'doctor_1603101793.png', 47, 5, '1990-08-08', 1, 'Mbbs', '-------', '---------', '------', '-------', '----------', '2020-10-19', 0, 0, '----------', 1, '2020-10-18 21:24:35', '2020-10-19 10:03:13'),
(40, 'D061756739', 1, 450, NULL, 400, NULL, 80000, 0, 'DR. Abc Xyz', NULL, '0190190033', 'doctor_1603095975.png', 47, 22, '1990-08-08', 1, 'Mbbs', '---', '--', '---', '--', '--', '2020-10-19', 1, 1, '4pm to 9pm', 1, '2020-10-18 21:24:42', '2020-10-19 08:26:15'),
(42, 'D081293396', 2, 350, NULL, 300, NULL, NULL, 0, 'Dr. AR Rahman', NULL, '0190190039', 'doctor_1603094382.png', 47, 22, '1990-08-17', 1, 'Mbbs', '---', '---', '---', '---', '---', '2020-10-19', 1, 1, '4pm to 9pm', 1, '2020-10-18 22:41:15', '2020-10-19 08:24:38'),
(43, 'D00436218', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Dsdf', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'sdfsf', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, '2020-10-19 12:06:41', '2020-10-19 12:06:41'),
(44, 'D00449700', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Csf1', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'wdwee', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, '2020-10-19 12:14:05', '2020-10-19 12:14:05'),
(45, 'D00452620', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Adfwe', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'asdwefw', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, '2020-10-19 13:17:02', '2020-10-19 13:17:02'),
(46, 'D00462256', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Sdfsdf', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'sdvwrg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, '2020-10-19 13:23:08', '2020-10-19 13:23:08'),
(47, 'D00474759', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Dr.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'sddf', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, '2020-10-20 09:13:23', '2020-10-20 09:13:23'),
(48, 'D00485971', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Doctor', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'dwefr', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, '2020-10-20 09:36:11', '2020-10-20 09:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_departments`
--

CREATE TABLE `doctor_departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_department_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_department_status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_departments`
--

INSERT INTO `doctor_departments` (`id`, `uuid`, `doctor_department_name`, `doctor_department_note`, `doctor_department_status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'e7f1f900-edec-11ea-86b8-175374bbb2d7', 'Child Specialist', 'Child Specialist', 1, 1, '2020-09-01 13:03:11', '2020-09-03 13:53:54'),
(2, 'f5a3cad0-edec-11ea-808b-af77dd50dc2c', 'Kidney', 'Kidney', 1, 1, '2020-09-03 13:15:49', '2020-09-03 13:54:17'),
(3, '997c5e90-f284-11ea-b419-eba9d81c839a', 'ENT', 'Eye', 1, 1, '2020-09-03 13:16:06', '2020-09-09 10:09:51'),
(9, 'c558d870-edec-11ea-9f04-6f7dc3bf63c9', 'Medicine', 'Medicine', 1, 1, '2020-09-03 13:50:55', '2020-09-03 13:52:56'),
(47, '1c780720-f284-11ea-bfbf-09527b464608', 'Kidney & Medicine', NULL, 1, 1, '2020-09-09 10:06:21', '2020-09-09 10:06:21'),
(48, '2c548ef0-f284-11ea-acf9-55f814b29382', 'Neoromedicine', NULL, 1, 1, '2020-09-09 10:06:48', '2020-09-09 10:06:48'),
(49, '4332faa0-f284-11ea-a410-abaeb3adc9d3', 'Orthopedic Surgeon', NULL, 1, 1, '2020-09-09 10:07:26', '2020-09-09 10:07:26'),
(50, 'efeaaa90-f5e8-11ea-8635-f35f64664df6', 'Gastroenterology & Obstetrics', 'Gastroenterology & Obstetrics', 0, 1, '2020-09-09 10:07:48', '2020-09-13 17:45:39'),
(51, '069b63d0-f5e9-11ea-89c4-1df5ac85924f', 'Urologist', 'Urologist', 1, 1, '2020-09-09 10:08:00', '2020-09-13 17:46:17'),
(52, '63b944a0-f284-11ea-a580-c952a6c691e3', 'Cardiologist', NULL, 1, 1, '2020-09-09 10:08:21', '2020-09-09 10:08:21'),
(53, '1e49f100-f5e9-11ea-a61c-9d076fa66839', 'Chest & Medicine', 'Chest & Medicine', 1, 1, '2020-09-09 10:08:37', '2020-09-13 17:46:57'),
(54, 'e7b024d0-f5e8-11ea-8dc3-7dd4522883b5', 'Pediactrics', 'Pediactrics', 0, 1, '2020-09-09 10:09:05', '2020-09-13 17:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_income_histories`
--

CREATE TABLE `doctor_income_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `prescription_ticket_id` bigint(20) UNSIGNED DEFAULT NULL,
  `patient_test_invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_income_amount` int(11) NOT NULL,
  `doctor_payable_amount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_income_histories`
--

INSERT INTO `doctor_income_histories` (`id`, `invoice_date`, `invoice_no`, `invoice_id`, `prescription_ticket_id`, `patient_test_invoice_id`, `doctor_id`, `doctor_income_amount`, `doctor_payable_amount`, `created_at`, `updated_at`) VALUES
(23, '2020-10-12', 'RH201001', 49, 24, NULL, 5, 270, 300, '2020-10-11 22:12:38', '2020-10-11 22:12:38'),
(24, '2020-10-12', 'RH201002', 50, NULL, 31, 5, 680, 68, '2020-10-11 22:13:15', '2020-10-11 22:13:15'),
(25, '2020-10-12', 'RH201003', 51, 25, NULL, 11, 500, NULL, '2020-10-11 22:15:51', '2020-10-11 22:15:51'),
(26, '2020-10-12', 'RH201004', 52, NULL, 32, 11, 680, 0, '2020-10-11 22:16:21', '2020-10-11 22:16:21'),
(27, '2020-10-12', 'RH201005', 53, 26, NULL, 10, 300, NULL, '2020-10-11 22:18:56', '2020-10-11 22:18:56'),
(28, '2020-10-12', 'RH201006', 54, NULL, 33, 10, 730, 0, '2020-10-11 22:19:27', '2020-10-11 22:19:27'),
(29, '2020-10-12', 'RH201007', 55, 27, NULL, 17, 500, 500, '2020-10-11 22:20:38', '2020-10-11 22:20:38'),
(30, '2020-10-12', 'RH201008', 56, NULL, 34, 17, 3314, 331, '2020-10-11 22:21:20', '2020-10-11 22:21:20'),
(31, '2020-10-12', 'RH201009', 57, 28, NULL, 10, 300, NULL, '2020-10-12 13:13:05', '2020-10-12 13:13:05'),
(32, '2020-10-14', 'RH201010', 58, NULL, 35, 6, 2776, 0, '2020-10-14 02:07:09', '2020-10-14 02:07:09'),
(33, '2020-10-15', 'RH201011', 59, 29, NULL, 10, 240, NULL, '2020-10-14 19:37:35', '2020-10-14 19:37:35'),
(34, '2020-10-15', 'RH201012', 60, 30, NULL, 17, 500, 500, '2020-10-14 19:38:52', '2020-10-14 19:38:52'),
(35, '2020-10-15', 'RH201013', 61, 31, NULL, 10, 300, NULL, '2020-10-14 20:00:30', '2020-10-14 20:00:30'),
(36, '2020-10-15', 'RH201014', 62, 32, NULL, 5, 300, 300, '2020-10-14 20:02:01', '2020-10-14 20:02:01'),
(37, '2020-10-15', 'RH201015', 63, NULL, 36, 6, 764, 0, '2020-10-14 20:06:34', '2020-10-14 20:06:34'),
(38, '2020-10-15', 'RH201016', 64, 33, NULL, 20, 200, NULL, '2020-10-14 20:07:03', '2020-10-14 20:07:03'),
(39, '2020-10-15', 'RH201017', 65, 34, NULL, 5, 300, 300, '2020-10-14 20:07:59', '2020-10-14 20:07:59'),
(40, '2020-10-15', 'RH201018', 66, 35, NULL, 11, 500, NULL, '2020-10-14 20:09:41', '2020-10-14 20:09:41'),
(41, '2020-10-16', 'RH201019', 67, 38, NULL, 10, 300, NULL, '2020-10-16 13:36:01', '2020-10-16 13:36:01'),
(42, '2020-10-16', 'RH201020', 68, 39, NULL, 10, 300, NULL, '2020-10-16 13:38:41', '2020-10-16 13:38:41'),
(43, '2020-10-16', 'RH201021', 69, NULL, 37, 6, 680, 0, '2020-10-16 13:51:44', '2020-10-16 13:51:44'),
(44, '2020-10-17', 'RH201022', 70, 40, NULL, 5, 300, 300, '2020-10-17 05:39:26', '2020-10-17 05:39:26'),
(45, '2020-10-18', 'RH201003', 87, 41, NULL, 5, 300, 300, '2020-10-17 20:29:30', '2020-10-17 20:29:30'),
(46, '2020-10-19', 'RH201003', 88, 45, NULL, 11, 500, NULL, '2020-10-19 07:10:47', '2020-10-19 07:10:47'),
(47, '2020-10-19', 'RH201003', 89, 46, NULL, 10, 300, NULL, '2020-10-19 07:32:29', '2020-10-19 07:32:29'),
(48, '2020-10-19', 'RH201003', 91, 48, NULL, 10, 300, NULL, '2020-10-19 10:19:55', '2020-10-19 10:19:55'),
(49, '2020-10-19', 'RH201003', 92, 49, NULL, 5, 1000, NULL, '2020-10-19 10:21:49', '2020-10-19 10:21:49'),
(50, '2020-10-19', 'RH201003', 93, NULL, 38, 6, 180, 0, '2020-10-19 10:23:28', '2020-10-19 10:23:28'),
(51, '2020-10-19', 'RH201003', 94, NULL, 39, 6, 180, 0, '2020-10-19 12:15:39', '2020-10-19 12:15:39'),
(52, '2020-10-19', 'RH201003', 95, NULL, 40, 46, 350, 0, '2020-10-19 13:24:12', '2020-10-19 13:24:12'),
(53, '2020-10-19', 'RH201003', 96, NULL, 41, 6, 350, 0, '2020-10-19 13:24:55', '2020-10-19 13:24:55'),
(54, '2020-10-19', 'RH201003', 97, NULL, 42, 5, 180, 0, '2020-10-19 13:26:47', '2020-10-19 13:26:47'),
(55, '2020-10-20', 'RH201003', 98, 2, NULL, 10, 300, NULL, '2020-10-20 09:00:10', '2020-10-20 09:00:10'),
(56, '2020-10-20', 'RH201003', 99, 3, NULL, 10, 300, NULL, '2020-10-20 09:02:04', '2020-10-20 09:02:04'),
(57, '2020-10-20', 'RH201003', 100, 4, NULL, 10, 300, NULL, '2020-10-20 09:02:36', '2020-10-20 09:02:36'),
(58, '2020-10-20', 'RH201003', 101, NULL, 43, 47, 180, 0, '2020-10-20 09:14:08', '2020-10-20 09:14:08'),
(59, '2020-10-20', 'RH201001', 1, NULL, 4, 5, 350, 0, '2020-10-20 09:30:05', '2020-10-20 09:30:05'),
(60, '2020-10-20', 'RH201002', 2, NULL, 6, 5, 180, 0, '2020-10-20 09:34:10', '2020-10-20 09:34:10'),
(61, '2020-10-20', 'RH201003', 3, NULL, 7, 6, 360, 0, '2020-10-20 09:34:42', '2020-10-20 09:34:42'),
(62, '2020-10-20', 'RH201004', 4, NULL, 8, 5, 315, 0, '2020-10-20 09:35:20', '2020-10-20 09:35:20'),
(63, '2020-10-20', 'RH201005', 5, NULL, 9, 48, 477, 0, '2020-10-20 09:36:59', '2020-10-20 09:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_payments`
--

CREATE TABLE `doctor_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_date` date NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_departments`
--

CREATE TABLE `employee_departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_department_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_department_status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_departments`
--

INSERT INTO `employee_departments` (`id`, `uuid`, `employee_department_name`, `employee_department_note`, `employee_department_status`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'ddcfb410-f284-11ea-a330-41b128c0a1d9', 'Pathologist', NULL, 1, 1, '2020-09-03 14:29:58', '2020-09-09 10:11:45'),
(4, 'd5024b70-f284-11ea-9886-57395d1a1fcd', 'Receiptionist', NULL, 1, 1, '2020-09-03 14:30:06', '2020-09-09 10:11:31'),
(5, 'd0e524a0-f284-11ea-8b21-614773d5a86a', 'Front Desk', NULL, 1, 1, '2020-09-04 17:44:07', '2020-09-09 10:11:24'),
(12, 'e2d94370-f284-11ea-979b-f9a006614c61', 'Nurse', NULL, 1, 1, '2020-09-09 10:11:54', '2020-09-09 10:11:54'),
(13, 'efb418e0-f284-11ea-8890-45a140a9d0ff', 'Cleaner', NULL, 1, 1, '2020-09-09 10:12:15', '2020-09-09 10:12:15'),
(14, 'f6022250-f284-11ea-826c-5f245420f7ff', 'Account Officer', NULL, 1, 1, '2020-09-09 10:12:26', '2020-09-09 10:12:26');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expense_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_amount` int(11) NOT NULL DEFAULT '0',
  `expense_date` date DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expense_title`, `expense_amount`, `expense_date`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Water Bill', 2000, '2020-10-12', 1, '2020-10-05 20:18:41', '2020-10-15 19:33:47'),
(2, 'doctor salary', 40000, '2020-10-15', 1, '2020-10-15 19:33:08', '2020-10-15 19:33:08'),
(3, 'Electricity Bill', 20000, '2020-10-11', 1, '2020-10-15 19:33:32', '2020-10-15 19:33:32'),
(4, 'abc', 3200, '2020-10-16', 1, '2020-10-15 21:19:15', '2020-10-15 21:19:15'),
(5, 'xyz', 4900, '2020-10-16', 1, '2020-10-15 21:19:27', '2020-10-15 21:19:27'),
(6, 'expesne001', 132, '2020-10-16', 1, '2020-10-16 11:08:24', '2020-10-16 11:08:24'),
(7, 'expesne002', 290, '2020-10-16', 1, '2020-10-16 11:08:37', '2020-10-16 11:08:37'),
(8, 'expesne003', 390, '2020-10-16', 1, '2020-10-16 11:08:48', '2020-10-16 11:08:48'),
(9, 'expesne004', 2220, '2020-10-16', 1, '2020-10-16 11:08:58', '2020-10-16 11:08:58'),
(10, 'expesne005', 590, '2020-10-16', 1, '2020-10-16 11:09:06', '2020-10-16 11:09:06'),
(11, 'expesne006', 1131, '2020-10-16', 1, '2020-10-16 11:09:20', '2020-10-16 11:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `income_reports`
--

CREATE TABLE `income_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prescription_ticket_id` bigint(20) UNSIGNED DEFAULT NULL,
  `patient_test_invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `person_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payable_amount` int(11) NOT NULL DEFAULT '0',
  `discount` int(11) NOT NULL DEFAULT '0',
  `total_amount` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_date`, `invoice_no`, `prescription_ticket_id`, `patient_test_invoice_id`, `patient_id`, `doctor_id`, `person_id`, `payable_amount`, `discount`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, '2020-10-20', 'RH201001', NULL, 4, 2, 5, 2, 350, 0, 350, '2020-10-20 09:30:05', '2020-10-20 09:30:05'),
(2, '2020-10-20', 'RH201002', NULL, 6, 2, 5, NULL, 180, 0, 180, '2020-10-20 09:34:10', '2020-10-20 09:34:10'),
(3, '2020-10-20', 'RH201003', NULL, 7, 2, 6, 2, 360, 0, 360, '2020-10-20 09:34:42', '2020-10-20 09:34:42'),
(4, '2020-10-20', 'RH201004', NULL, 8, 2, 5, 2, 350, 10, 315, '2020-10-20 09:35:20', '2020-10-20 09:35:20'),
(5, '2020-10-20', 'RH201005', NULL, 9, 160, 48, 68, 530, 10, 477, '2020-10-20 09:36:59', '2020-10-20 09:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(17, '2020_07_27_044725_create_ref_commissions_table', 5),
(19, '2020_08_16_173115_create_test_invoices_table', 7),
(21, '2020_07_23_192149_create_doctor_departments_table', 8),
(22, '2020_07_23_193008_create_employee_departments_table', 8),
(23, '2020_07_23_193039_create_pathology_departments_table', 8),
(36, '2020_09_06_193624_create_doctors_table', 10),
(38, '2020_07_27_201411_create_pathology_tests_table', 11),
(40, '2020_08_20_200748_create_patients_table', 12),
(41, '2020_09_20_202054_create_ref_users_table', 13),
(53, '2020_09_24_175039_create_patient_payments_table', 15),
(56, '2020_09_23_145942_create_patient_tests_table', 16),
(60, '2020_09_29_044901_create_broker_income_histories_table', 19),
(61, '2020_09_29_045112_create_broker_payments_table', 19),
(62, '2020_10_05_235625_create_expenses_table', 20),
(63, '2020_10_05_141431_create_income_reports_table', 21),
(65, '2020_09_29_011146_create_doctor_income_histories_table', 22),
(68, '2020_10_12_150132_create_pathology_rooms_table', 24),
(69, '2020_10_12_150153_create_employee_rooms_table', 24),
(70, '2020_10_13_174419_create_roles_table', 24),
(71, '2020_10_13_174542_create_permissions_table', 24),
(72, '2020_10_13_174703_create_role_users_table', 24),
(73, '2020_10_13_174739_create_permission_roles_table', 24),
(74, '2020_10_13_174758_create_permission_users_table', 24),
(75, '2020_09_02_181145_create_rooms_table', 25),
(78, '2020_09_28_034741_create_doctor_payments_table', 26),
(79, '2020_10_19_145607_create_brokers_table', 26),
(80, '2020_09_23_010114_create_prescription_tickets_table', 27),
(81, '2020_09_23_136019_create_patient_test_invoices_table', 28),
(82, '2020_09_23_153222_create_invoices_table', 28);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pathology_departments`
--

CREATE TABLE `pathology_departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pathology_department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pathology_department_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pathology_department_status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pathology_departments`
--

INSERT INTO `pathology_departments` (`id`, `uuid`, `pathology_department_name`, `pathology_department_note`, `pathology_department_status`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'c1d9efe0-f28f-11ea-849a-39952e18ba06', 'Echo, ETT, ECG', 'Echo, ETT, ECG', 0, 1, '2020-09-03 14:15:47', '2020-09-09 11:29:43'),
(3, 'ac294a90-f28f-11ea-b514-3f8cd3dbfb11', 'X-ray and Ultrasonogram', 'X-ray and Ultrasonogram', 1, 1, '2020-09-03 14:15:52', '2020-09-09 11:29:07'),
(4, 'a1f77810-f28f-11ea-891e-cdfec6e006d1', 'Pathology Laboratory Investigation', 'Blood, Urine Collection', 1, 1, '2020-09-04 17:44:20', '2020-09-09 11:28:49'),
(5, 'd1027010-f28f-11ea-98d2-7b162e911342', 'CT Scan & CT Angiogram Investigation', 'CT Scan & CT Angiogram Investigation', 0, 1, '2020-09-09 11:30:08', '2020-09-09 11:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `pathology_tests`
--

CREATE TABLE `pathology_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_price` double(8,2) DEFAULT NULL,
  `patient_discount` int(11) NOT NULL DEFAULT '0',
  `doctor_discount` int(11) NOT NULL DEFAULT '0',
  `test_duration` int(11) NOT NULL DEFAULT '0',
  `test_room` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_status` tinyint(1) NOT NULL DEFAULT '1',
  `test_suggestion` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pathology_tests`
--

INSERT INTO `pathology_tests` (`id`, `test_code`, `test_name`, `test_price`, `patient_discount`, `doctor_discount`, `test_duration`, `test_room`, `test_status`, `test_suggestion`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'pt100200', 'TC, DC, HB%, ESR', 350.00, 0, 0, 5, '101', 1, NULL, 1, '2020-09-09 12:15:58', '2020-10-19 09:59:18'),
(2, 'pt100201', 'TC DC', 180.00, 0, 0, 1, '101', 1, NULL, 1, '2020-09-09 12:39:54', '2020-10-19 09:59:14'),
(3, 'pt100300', 'ESR', 150.00, 0, 10, 10, '205', 1, NULL, 1, '2020-09-09 12:40:26', '2020-10-19 09:59:25'),
(5, 'pt100204', 'Malarial Parasite (M.P)', 25000.00, 20, 20, 10, '303', 1, '----', 1, '2020-09-09 12:41:59', '2020-10-19 09:59:06'),
(6, 'pt200200', 'Abc Xyz', 300.00, 12, 30, 3, '301', 1, NULL, 1, '2020-09-17 11:41:42', '2020-09-17 17:43:26'),
(7, 'pt210101', 'Xyz', 3040.00, 14, 10, 4, '101', 1, '----', 1, '2020-09-17 12:07:35', '2020-10-19 09:58:47'),
(8, 'PT201312', 'Pathology Test One', 3000.00, 10, 20, 30, '203', 1, NULL, 1, '2020-09-21 12:34:18', '2020-10-19 09:58:26'),
(9, 'p12232313', 'Saample Pathology Test 0001', 1000.00, 10, 10, 2, '203', 1, '------', 1, '2020-10-19 10:00:10', '2020-10-19 10:00:10'),
(10, 'PT090909', 'Blood Group Test', 120.00, 10, 0, 0, '201', 1, '------', 1, '2020-10-19 10:01:03', '2020-10-19 10:01:03'),
(11, 'PT0908099', 'Saample Pathology Test 0002', 4500.00, 30, 10, 2, '203', 1, '--------------', 1, '2020-10-19 10:01:40', '2020-10-19 10:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_age` int(11) NOT NULL,
  `patient_gender` tinyint(1) NOT NULL DEFAULT '1',
  `patient_address` longtext COLLATE utf8mb4_unicode_ci,
  `patient_note` longtext COLLATE utf8mb4_unicode_ci,
  `patient_status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `patient_id`, `patient_name`, `patient_mobile`, `patient_age`, `patient_gender`, `patient_address`, `patient_note`, `patient_status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'p67270946', 'Mario Abshire', '01611425001', 99, 1, '864 Jack Springs Apt. 167Wilburnfort, RI 32795', 'Ut non occaecati nihil a amet.', 1, 1, '2020-09-20 10:37:50', '2020-09-21 12:29:31'),
(2, 'p26814276', 'Miss Hertha Bogisich Sr.', '01611425002', 33, 0, '397 Hyatt Station Suite 001West Maryseville, MN 85512-0216', 'Similique est eligendi sunt possimus iure.', 1, 1, '2020-09-20 10:37:50', '2020-09-21 12:29:42'),
(3, 'p86073716', 'Iliana Muller', '01611425222', 57, 0, '12584 Eli FieldsJosiahtown, SD 89262', 'Ut harum iste fugit sint.', 1, 1, '2020-09-20 10:37:50', '2020-09-21 12:32:32'),
(4, 'p54868917', 'Sonia VonRueden', '01811425000', 80, 0, '45186 Swaniawski Glens Suite 708Audreystad, PA 14324-9153', 'Facilis ab fuga ipsa est nesciunt.', 1, 1, '2020-09-20 10:37:50', '2020-09-21 12:32:42'),
(5, 'p51651167', 'Jordan Batz', '01311425000', 6, 1, '943 Turner SpursEmilton, KY 89429', 'Totam omnis temporibus quia omnis nesciunt.', 1, 1, '2020-09-20 10:37:50', '2020-09-21 12:32:55'),
(6, 'p65063518', 'Garett Pacocha', '+12954780655', 21, 1, '36449 Gaylord Port Suite 536\nCartwrighttown, AK 08050', 'Porro ut voluptatem sit delectus.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(7, '7', 'Miss Hilma Mayer', '0191818188', 85, 0, 'dhaka, bangladesh', 'Harum esse illo beatae labore.', 1, 1, '2020-09-20 10:37:50', '2020-10-18 18:17:23'),
(8, 'p88822796', 'Mr. Eli Sauer', '315.566.6571 x804', 88, 1, '43110 Leffler Dale\nPort Juliet, ND 01970-5621', 'Autem maiores cum est ad aut sint.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(9, '9', 'Prof. Jenifer Hegmann I', '016711245245', 99, 0, '36265 Archibald SquareNorth Francesfort, WV 53634', 'Aut deleniti sapiente aut.', 1, 1, '2020-09-20 10:37:50', '2020-10-18 13:56:25'),
(10, 'p9772555', 'Jodie Daniel', '1-358-574-6160 x721', 92, 1, '647 Turcotte Mill Suite 153\nCaylaborough, NE 33493-5705', 'Sunt illum et in et ducimus earum deleniti.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(11, 'p26007250', 'Kirsten Bogan', '(582) 849-1447', 75, 1, '9644 Fay Road\nEast Wilsonport, WV 33726-9970', 'Sit dolores quisquam quo enim eius.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(12, 'p85230556', 'Mr. Amos Runolfsson III', '1-526-286-6957 x897', 44, 0, '17224 Carolina Dam\nTracyburgh, MO 00388', 'Omnis labore quas in qui quasi beatae mollitia.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(13, 'p43530232', 'Frankie Weissnat', '434.868.8406', 63, 0, '5381 Rath Avenue Suite 481\nNorth Etha, WA 69901', 'Vel sunt odit qui ea.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(14, '14', 'Mylene Blick', '018918181919', 66, 0, '47274 Bennie Manors Apt. 265Lake Adonis, AK 73137-0165', 'Aut quos sit temporibus.', 1, 1, '2020-09-20 10:37:50', '2020-10-18 13:56:42'),
(15, 'p60920676', 'Eliane Howell', '01611425011', 90, 0, '55997 Mills PlainGutmannchester, GA 59796', 'Voluptas distinctio dolores deserunt.', 0, 1, '2020-09-20 10:37:50', '2020-09-21 12:31:52'),
(16, '16', 'Prof. Monica Kessler', '01515151515', 59, 1, '643 Stamm Rapids Apt. 499New Suzanne, WV 55411-9078', 'Mollitia quia id expedita enim aut.', 0, 1, '2020-09-20 10:37:50', '2020-10-18 13:56:09'),
(17, 'p79914109', 'Adan Durgan', '(881) 352-6747 x0803', 99, 1, '8168 Zora Turnpike\nLake Mona, LA 24228-3483', 'Quia ut aut et alias nihil.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(18, 'p76014529', 'Lila Monahan', '861.969.7405', 83, 1, '902 Florencio Loaf Apt. 321\nMisaelfurt, FL 02952', 'Autem molestiae eaque quod ut debitis.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(19, 'p69148510', 'Cassandra Paucek Sr.', '716-859-4052', 79, 1, '5574 Fritsch Plaza\nJaydaton, UT 57079-0281', 'Error sapiente eveniet dolorem voluptatem.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(20, 'p75888056', 'Freida Goldner', '+1 (234) 578-2808', 85, 1, '80547 Deborah Dam Apt. 430\nPorterchester, KS 55173-1757', 'Totam minima totam ut nulla dolore nam.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(21, 'p62264961', 'Jerry Bayer', '886.209.1680 x5527', 90, 0, '4006 O\'Conner Brooks Apt. 159\nFriedaland, OH 24938', 'Officiis ut nam asperiores architecto.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(22, 'p9150074', 'Noemie Predovic', '(595) 405-7802 x14349', 97, 0, '5177 Abel Flat Apt. 385\nJulietown, VT 65959-9122', 'Hic ratione sint dolorem.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(23, 'p43944924', 'Mr. Ashton Koepp IV', '1-332-371-5792 x66226', 59, 1, '784 Windler Well Suite 201\nBeiermouth, TN 33982-3791', 'Eaque porro voluptatem sint eius.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(24, 'p87709142', 'Meta Herman', '257.823.4402 x17862', 3, 0, '146 Haag Turnpike Apt. 944\nBednarstad, DC 43905-3095', 'Vel sunt sit dolorem cum odit culpa.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(25, 'p87050259', 'Marc Ruecker', '341-499-2048', 79, 1, '35905 Lenora Meadow\nNew Zechariah, MI 65292-2635', 'Non voluptates occaecati enim nostrum distinctio.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(26, 'p52082876', 'Jewel Schulist', '1-256-482-8393', 16, 1, '801 Littel Divide\nEast Domingofort, IN 04841-8130', 'A commodi eaque nulla enim ut molestias.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(27, 'p67562452', 'Ida Mills II', '(772) 956-5279', 52, 0, '148 Lucinda Ridges\nOrtizberg, CO 45095-7980', 'Et voluptatem harum rerum expedita.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(28, 'p58531765', 'Isaac Braun II', '(730) 557-8505 x9384', 78, 0, '2955 Lakin Run Suite 889\nLuigitown, DC 08124-6844', 'Eos eum et vero et.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(29, 'p93973510', 'Ora Schroeder', '(256) 447-7160 x229', 91, 0, '8119 Shields Estate\nWest Gregville, TX 10574', 'Vel iusto est veritatis et sed impedit.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(30, 'p29046620', 'Mireya Trantow', '893-232-6877', 64, 1, '31801 Ned Tunnel Apt. 239\nKoelpinmouth, CT 90453', 'Voluptatem corporis non dolor hic.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(31, 'p74694871', 'Alyce Kunze', '(723) 781-2136', 99, 1, '6593 Jeanette Parkway\nLake Jaclynmouth, FL 28136-6792', 'Velit illo ab et natus.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(32, 'p21655500', 'Prof. Cletus Okuneva', '1-908-476-1367', 15, 0, '50800 Kayley Road Suite 091\nLake Garrickfort, IN 67636', 'Minus modi et et fugiat eos praesentium.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(33, 'p71883886', 'Prof. Arturo Bergstrom', '+1 (291) 319-6415', 35, 0, '261 Therese Flats Suite 273\nMontanafurt, OK 58759-5569', 'Voluptas dolor dignissimos et quod vel.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(34, 'p66775067', 'Carlee Haag', '734.514.5789', 8, 0, '19567 Pfannerstill Plaza Suite 447\nPort Sydnichester, OH 58554-9061', 'Odit rerum officiis deleniti eos velit.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(35, 'p13564393', 'Eloise Ruecker', '1-982-866-7556', 31, 1, '89128 Abernathy Field\nLake Hayden, DE 08718', 'Ea exercitationem sequi fugiat fugiat qui.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(36, 'p66649443', 'Dr. Mack Kautzer', '1-457-897-9831 x095', 95, 1, '180 Genesis Camp\nNew Brady, FL 86751-7563', 'Quo sed voluptas autem in esse accusantium.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(37, 'p49927934', 'Dante Douglas PhD', '332-991-3502', 39, 0, '871 Crooks Prairie\nSouth Malloryport, NH 18118', 'Non error tempora odio reprehenderit et et.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(38, 'p91344931', 'Dallin Hessel', '791-907-2578 x8434', 58, 1, '31763 Marisa Crossing Suite 821\nColeside, NM 59265-3765', 'Eligendi minus quia officia nostrum sit.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(39, 'p69242758', 'Daija Emard', '574-588-0622 x9192', 69, 0, '25273 DuBuque Falls\nGradyville, MI 68418-2278', 'Et quisquam asperiores a debitis dignissimos sit.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(40, 'p47516916', 'Baron Gleason', '1-669-530-8067 x97871', 2, 0, '2433 Schiller Mount Suite 505\nSouth Maureenview, WY 86812', 'Modi odit magnam vitae quod adipisci.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(41, 'p34618656', 'Dr. Sarina Harber DVM', '1-412-390-2029', 68, 1, '5906 Paucek Mountain\nNorth Kelly, NH 94520', 'Quos sunt non vel aut vel.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(42, 'p14423747', 'Aron Jaskolski', '(716) 696-9733', 0, 0, '4833 Schamberger Light Apt. 233\nSigridport, SD 72120', 'Et inventore et quo libero et.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(43, 'p57653724', 'Ms. Aurelie Kreiger', '1-639-969-2020 x609', 47, 1, '28234 Haag Green\nEast Pat, SD 80241-4924', 'Aut ratione aut blanditiis tempore dignissimos.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(44, 'p74628706', 'London Hermann', '245-253-0301 x8662', 50, 0, '369 Gerard Greens Apt. 062\nEast Zoe, AK 23521', 'Sit distinctio odio et.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(45, 'p90292185', 'Mr. Roderick Hoppe DDS', '1-526-260-9617', 2, 0, '45697 McDermott Mission Suite 832\nCrooksshire, ID 60161', 'Libero tempora ea adipisci soluta.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(46, 'p24540235', 'Mrs. Lucie Pfeffer', '1-374-594-9731 x4198', 42, 0, '7252 Stevie Harbors Suite 023\nNew Harmonyfort, WY 20351', 'Maiores sit est nemo fuga id facilis.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(47, 'p46067621', 'Anya Ortiz', '(565) 672-2538 x515', 93, 0, '6949 Mathilde Trail Apt. 696\nWest Charley, NY 53318', 'Sequi omnis explicabo non quia architecto modi.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(48, 'p69427668', 'Brenden Armstrong', '(927) 570-1145 x00859', 26, 1, '39404 Gaylord Isle Apt. 630\nSouth Kassandraborough, WV 00990-0358', 'Et eum eius corporis.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(49, 'p24955643', 'Elinor Fay', '1-514-987-8979 x547', 39, 0, '59424 Roderick Plains\nLake Annette, VA 50640-3510', 'Accusamus in aut voluptatibus molestiae sed.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(50, 'p6330321', 'Dr. Hershel Stroman', '+1.446.868.4522', 30, 1, '30921 Luettgen Plaza Suite 888\nRoxanneland, NE 58863', 'Ab ut ut aut consequatur nesciunt maiores cum.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(51, 'p90639156', 'Magnus Nader DVM', '+1 (880) 278-0413', 68, 0, '17232 Dexter Pines Apt. 668\nNew Shayleeview, MS 03468', 'Quis incidunt et repellat aliquid.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(52, 'p48132874', 'Gerard Schaden', '330-379-2224', 7, 0, '78487 Crooks Field\nWest Chaim, MD 11938-7847', 'Quia qui molestiae assumenda eligendi.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(53, 'p33131956', 'Judah Hickle', '846.399.7099 x111', 23, 0, '183 Marcellus Squares Suite 566\nMetzburgh, OR 75037', 'Enim est distinctio voluptatibus soluta quia.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(54, 'p54531480', 'Seamus Walsh II', '+1-339-906-9654', 91, 0, '599 Geovany Ridge\nEast Oriebury, HI 50723', 'Voluptatum qui omnis fugit molestiae.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(55, 'p76215633', 'Armand Marquardt', '793-997-2202 x1609', 61, 1, '147 Reichert Falls\nEast Vanbury, MD 29076-9469', 'Qui omnis aut quod in.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(56, 'p55073378', 'Chadrick Hammes II', '(432) 635-1484', 30, 0, '89035 Davon Park\nJacinthebury, KS 43529', 'Cum aspernatur architecto vitae dolores.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(57, 'p5594207', 'Dr. Samir Hammes', '(921) 996-0580 x373', 9, 1, '5716 Tito Plaza Apt. 943\nSkylachester, WA 07784-8455', 'Reiciendis illum a dicta et adipisci harum qui.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(58, 'p39939617', 'Kailee Berge', '(767) 828-5449', 98, 0, '96343 Afton Grove\nWest Nichole, MD 51348-9055', 'Magni illum repellendus voluptatibus sed et.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(59, 'p11732471', 'Tianna Fahey', '230.980.6975', 62, 1, '5692 Volkman Coves\nAnkundingberg, NE 71553-8906', 'Totam aut et mollitia numquam quia et sunt.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(60, 'p20283964', 'Dr. Dillan Kshlerin', '848-404-6887', 43, 1, '463 Lonny Brook\nLake Rebecca, TN 45423', 'Quia adipisci consequatur dolores ut.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(61, 'p37832805', 'Alfonzo Keeling', '217-214-5429', 0, 0, '7061 Kuhic Forge Apt. 540\nLake Emilville, IL 48012', 'Earum sed in et dolore.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(62, 'p6485741', 'Felicia Parker', '507-208-6667', 90, 1, '219 Stiedemann Islands Suite 157\nKesslerstad, AZ 37348-1592', 'Repudiandae vero placeat libero optio.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(63, 'p36082070', 'Prof. Brandi Hessel', '1-525-740-9521 x840', 51, 1, '8469 Stark Centers Suite 494\nSouth Laishahaven, FL 22619', 'Atque facere enim temporibus.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(64, 'p15515322', 'Miss Isabell Oberbrunner I', '369-605-4519 x78612', 35, 0, '435 Schumm Junction\nNorth Luciouston, MO 01867', 'Quam cupiditate nisi deleniti nemo.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(65, 'p84463214', 'Santino Schowalter III', '948-695-1831 x05581', 11, 0, '5506 Bogisich Drive Apt. 516\nSouth Audrey, AK 34604-0581', 'Sit ut nulla dolores sed.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(66, 'p17897905', 'Cassie Rodriguez', '(574) 520-0326 x445', 62, 0, '3132 Dewitt Shores\nHansenstad, TN 03998', 'Minima est perferendis et qui voluptatem.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(67, 'p79497560', 'Shana McClure', '+15164162624', 20, 1, '687 Zakary Pine Apt. 783\nSimonishaven, DC 72045-5798', 'Voluptates et et dolor dolores ut.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(68, 'p42805575', 'Tianna Hayes', '+1-445-248-9056', 63, 0, '2063 Marquise Plain\nPort Marinastad, MI 34748-3670', 'Repellendus voluptatibus et atque autem nam.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(69, 'p38753104', 'Drew Wiegand', '+1 (739) 347-7116', 19, 1, '55932 Ruthie Estate\nLangworthtown, AK 51868-8618', 'Sit eos provident provident tempore laboriosam.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(70, 'p17138603', 'Prof. Bo Kuhic', '(732) 831-2988', 93, 0, '72370 Orland Junction Suite 497\nLake Weldon, RI 30638', 'Quibusdam quo ex quas praesentium ipsam et optio.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(71, 'p45844194', 'Isidro Mills', '1-819-694-2146 x62682', 24, 1, '791 Chandler Trail\nEvelynshire, OR 76875', 'Enim quod dolore veritatis illo est.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(72, 'p45393156', 'Dell West Sr.', '1-473-371-8207', 77, 1, '58738 Skylar Mountains\nRobertoburgh, VT 13565', 'Quos eligendi sint quo et dignissimos.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(73, 'p1620057', 'Mr. Lavern Abshire PhD', '673-443-9992 x8316', 36, 0, '167 Helga Run Suite 868\nMosestown, ME 23910-2218', 'Et eos voluptate et officia dicta aut.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(74, '74', 'Jayde Sanford', '123', 34, 1, '442 Sonya StationWalshfort, NV 43562-3162', 'At temporibus quia ut.', 1, 1, '2020-09-20 10:37:50', '2020-10-18 17:15:07'),
(75, 'p2491146', 'Prof. Dusty Von', '226.956.9874 x3285', 88, 0, '16545 Sandra Loop\nNew Lorine, MS 09149', 'Eius aut minus quas dolor impedit consequatur.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(76, 'p32496476', 'Ms. Joyce Tromp DDS', '247-951-7591 x169', 83, 0, '343 Savanah Tunnel\nNorth Kurtisbury, WA 10959-0242', 'Non ad error sed dolore ratione.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(77, 'p92564354', 'Stefanie Hegmann', '804-244-9785', 31, 1, '35068 Harris Prairie Apt. 872\nJuvenalfort, CO 53509-4643', 'Occaecati officiis aut aut at.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(78, 'p75463417', 'Reyes Dicki', '(658) 215-5559 x334', 74, 1, '8374 Rath Road Apt. 426\nNorth Elmer, VA 48583', 'Quas qui totam est molestias.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(79, 'p51079749', 'Francisca Stroman', '(430) 927-1435 x03314', 43, 0, '3767 Bernier Center Apt. 036\nHubertfurt, MA 27935', 'Dolorum impedit eaque error delectus laborum.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(80, '80', 'Prof. Lane Feil DVM', '+14385807184', 30, 0, '87761 Althea PrairieCristton, MO 34960', 'Nobis qui rerum ipsam dolores ut velit.', 1, 1, '2020-09-20 10:37:50', '2020-10-18 13:55:24'),
(81, 'p20892778', 'Stephen Conn', '1-749-289-5536 x99315', 47, 0, '788 Stoltenberg Springs Suite 698\nChaimtown, ID 81267', 'Repellat ut aut vel harum voluptatibus.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(82, 'p81590469', 'Mireille Botsford', '978-633-2677 x1647', 8, 1, '3605 Runolfsson View Apt. 208\nNew Barrettstad, TN 97462', 'Laborum ut quo aut provident sit.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(83, 'p66563225', 'Kristoffer Nolan', '419-322-8968 x77665', 56, 1, '157 Mertz Grove Apt. 901\nEast Devonte, PA 23733', 'Accusamus ex vel id recusandae est.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(84, 'p22151715', 'Garnett Willms Sr.', '713.946.0355 x0850', 57, 0, '98331 Duncan Branch\nLake Coleman, LA 05924', 'Et est officia iste sapiente vel quo.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(87, 'p50662556', 'Johnathon McClure IV', '(758) 933-3112 x93119', 15, 1, '69845 Denesik Lock Suite 909\nKelsieville, UT 59969', 'Sunt iste laborum provident qui laboriosam.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(88, 'p94859028', 'Litzy Rau', '1-571-238-3060', 63, 1, '7308 Kitty Knolls\nSouth Kellyfurt, NM 00821', 'In impedit enim dolorem fuga natus est qui.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(89, 'p33386358', 'Prof. Rylan Marquardt PhD', '(372) 787-9117 x300', 46, 1, '52824 Legros Bridge Apt. 704\nKuhnberg, GA 54426', 'Eius consequatur fuga sit neque consequatur.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(90, 'p59461091', 'Velma Parker', '+1-520-960-7836', 11, 1, '207 Maggio Tunnel Suite 394\nNorth Audra, MT 05202-7029', 'Aut officiis voluptate est molestiae sapiente.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(91, 'p2901133', 'Mr. Mack Konopelski V', '+1 (772) 922-1328', 34, 1, '219 Shanahan Mill Suite 802\nPort Angie, MN 69729', 'Vel fugit sunt et nulla.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(93, 'p88517369', 'Elizabeth Rowe', '952.379.0080 x9657', 36, 1, '693 Daugherty Greens\nSouth Naomichester, NJ 99217', 'Dolore velit aliquid magni voluptatem.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(94, 'p10018395', 'Dr. Orland Gleason IV', '723.780.1221', 83, 0, '43210 Jessica Rapid\nSouth Ken, TX 54418', 'Sint qui quae quia molestiae accusantium minus.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(98, 'p53739959', 'Dexter Schowalter V', '(826) 906-9196 x8815', 27, 1, '76352 Mona Harbors\nVallieborough, GA 52675-3910', 'Molestiae aut esse harum dolore exercitationem.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(99, 'p65971328', 'Dr. Zachary Steuber', '1-443-747-7193', 97, 1, '75540 Darron Points Apt. 052\nSouth Jerad, NY 64697', 'Cupiditate dolores nihil autem error quae.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(100, 'p7707585', 'Gustave Schoen PhD', '494-281-3657', 72, 1, '509 Ward Cape\nPort Luisburgh, WY 06595-1135', 'In illo occaecati autem eum sit.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(102, 'RHP1600689563', 'Miss Baby', '01611425101', 22, 1, NULL, 'sfsfd', 1, 1, '2020-09-21 11:59:23', '2020-09-21 12:32:06'),
(103, 'RHP1600689595', 'Omar Faruk', '01511000111', 22, 0, NULL, NULL, 1, 1, '2020-09-21 11:59:55', '2020-09-21 12:29:54'),
(104, 'RHP1600690612', 'Mr Khan', '01611425009', 22, 1, NULL, 'dsfs', 1, 1, '2020-09-21 12:16:52', '2020-09-21 12:30:58'),
(105, 'RHP1600690732', 'Md. Ruhul Amin', '01611425010', 11, 1, NULL, NULL, 1, 1, '2020-09-21 12:18:52', '2020-09-21 12:30:19'),
(106, 'RHP1600690800', 'Md. Nuzrul Isalm', '01711425000', 30, 1, NULL, NULL, 1, 1, '2020-09-21 12:20:00', '2020-09-21 12:30:44'),
(108, 'RHP1600713205', 'Mahfuz', '01679605511', 30, 0, 'dhaka', 'fiver', 1, 1, '2020-09-21 18:33:25', '2020-09-21 18:33:25'),
(109, 'P016960198', 'Sfdfsddd', '1232324', 11, 1, 'sdafrf', NULL, 1, 1, '2020-10-18 16:19:06', '2020-10-18 16:19:06'),
(110, 'P040120453', 'Dsfsdf', '22124', 22, 1, NULL, NULL, 1, 1, '2020-10-18 16:22:44', '2020-10-18 16:22:44'),
(111, 'P080678807', 'Dsfsdf', '22124', 22, 1, NULL, NULL, 1, 1, '2020-10-18 16:23:43', '2020-10-18 16:23:43'),
(112, 'P055383878', 'Adsd', '132312', 22, 1, NULL, NULL, 1, 1, '2020-10-18 16:29:44', '2020-10-18 16:29:44'),
(113, 'P052749610', 'Cdsfd', '123', 22, 1, 'assf', NULL, 1, 1, '2020-10-18 16:30:45', '2020-10-18 16:30:45'),
(116, '116', 'Dfsfsd', '312', 33, 1, NULL, NULL, 1, 1, '2020-10-18 16:56:41', '2020-10-18 16:56:56'),
(128, 'P068944330', 'Fferr', '1324300', 44, 1, NULL, NULL, 1, 1, '2020-10-18 17:31:37', '2020-10-18 17:31:37'),
(129, 'P074840327', 'Fferr', '1324300', 44, 1, NULL, NULL, 1, 1, '2020-10-18 17:32:15', '2020-10-18 17:32:15'),
(130, '130', 'AdaASF', '1124252', 22, 1, NULL, NULL, 1, 1, '2020-10-18 17:33:37', '2020-10-18 17:34:36'),
(131, 'P060110400', 'Assdfdsaf', '122412', 33, 1, NULL, NULL, 1, 1, '2020-10-18 17:36:13', '2020-10-18 17:36:13'),
(132, 'P015848633', 'Ewerter', '11212400', 33, 1, NULL, NULL, 1, 1, '2020-10-18 17:42:06', '2020-10-18 17:42:06'),
(133, 'P080464408', 'Faefaerg', '1231241', 88, 1, NULL, NULL, 1, 1, '2020-10-18 17:44:09', '2020-10-18 17:44:09'),
(134, 'P018328753', 'Dfgerer', '12124', 99, 1, NULL, NULL, 1, 1, '2020-10-18 17:45:03', '2020-10-18 17:45:03'),
(135, 'P068655711', 'Asdsf', '1212', 22, 1, NULL, NULL, 1, 1, '2020-10-18 17:46:48', '2020-10-18 17:46:48'),
(136, '136', 'Safsdfg', '1124', 23, 1, NULL, NULL, 1, 1, '2020-10-18 17:47:14', '2020-10-18 18:02:40'),
(137, '137', 'Sdfsdf', '12343242', 22, 1, NULL, NULL, 1, 1, '2020-10-18 17:47:39', '2020-10-18 18:02:13'),
(138, 'P051946109', 'Jfyufyu', '2245', 99, 1, NULL, NULL, 1, 1, '2020-10-18 17:48:16', '2020-10-18 17:48:16'),
(139, '139', 'Asfssfdf', '13131', 33, 1, NULL, NULL, 1, 1, '2020-10-18 17:50:11', '2020-10-18 17:58:14'),
(141, 'PT201001', 'Asdfre', '2131242', 23, 1, 'csdfs', NULL, 1, 1, '2020-10-18 19:16:17', '2020-10-18 19:16:17'),
(143, 'PT201002', 'Ewerwe Werwet', '31212412', 22, 1, NULL, NULL, 1, 1, '2020-10-18 19:20:57', '2020-10-18 19:20:57'),
(144, 'P01442049', 'Ssdfdsq', '12123', 22, 1, NULL, NULL, 1, 1, '2020-10-19 12:06:53', '2020-10-19 12:06:53'),
(145, 'P01456440', 'Knkjhb', '86866', 88, 1, NULL, NULL, 1, 1, '2020-10-19 12:10:23', '2020-10-19 12:10:23'),
(146, 'P01466778', 'Dfd', '2123', 11, 1, NULL, NULL, 1, 1, '2020-10-19 12:13:51', '2020-10-19 12:13:51'),
(147, 'P024935017', 'Cfsdfsa', '13232', 11, 1, NULL, NULL, 1, 1, '2020-10-19 12:37:26', '2020-10-19 12:37:26'),
(148, 'P096880205', 'Sdfasd', '13132', 11, 1, NULL, NULL, 1, 1, '2020-10-19 12:38:56', '2020-10-19 12:38:56'),
(149, 'P037265641', 'Asasda', '3122', 11, 1, NULL, NULL, 1, 1, '2020-10-19 12:39:36', '2020-10-19 12:39:36'),
(150, 'P013670878', 'Dasfad', '1313', 22, 1, NULL, NULL, 1, 1, '2020-10-19 12:40:44', '2020-10-19 12:40:44'),
(151, 'P099028454', 'Sdaf', '1312', 22, 1, NULL, NULL, 1, 1, '2020-10-19 12:52:55', '2020-10-19 12:52:55'),
(152, 'P014717137', 'Dfsdf', '12312', 22, 1, NULL, NULL, 1, 1, '2020-10-19 12:55:12', '2020-10-19 12:55:12'),
(153, 'P059075929', 'Sdsf', '13123', 22, 1, NULL, NULL, 1, 1, '2020-10-19 13:01:25', '2020-10-19 13:01:25'),
(154, 'P053440063', 'Adweqrwe', '124114', 22, 1, NULL, NULL, 1, 1, '2020-10-19 13:02:50', '2020-10-19 13:02:50'),
(155, 'P051945296', 'Afsdfw', '21124', 22, 1, NULL, NULL, 1, 1, '2020-10-19 13:03:31', '2020-10-19 13:03:31'),
(156, 'P056378768', 'Adfer', '12312', 22, 1, 'sdasfs', 'sdferger', 1, 1, '2020-10-19 13:03:48', '2020-10-19 13:03:48'),
(157, 'P01577119', 'Dsfsdf', '12312', 22, 1, 'asdfwef', 'sdf', 1, 1, '2020-10-19 13:17:28', '2020-10-19 13:17:28'),
(158, 'P01583005', 'Adefwe', '1212', 22, 1, 'fwefwe', 'dwef', 1, 1, '2020-10-19 13:22:58', '2020-10-19 13:22:58'),
(159, 'P01595452', 'Aaddwe', '123123', 22, 1, 'qdewfe', 'def', 1, 1, '2020-10-20 09:13:13', '2020-10-20 09:13:13'),
(160, 'P01604984', 'Patient', '13131', 22, 1, 'fdfwr', 'adef', 1, 1, '2020-10-20 09:35:59', '2020-10-20 09:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `patient_payments`
--

CREATE TABLE `patient_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_date` date NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `due_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_payments`
--

INSERT INTO `patient_payments` (`id`, `payment_date`, `invoice_id`, `paid_amount`, `due_amount`, `created_at`, `updated_at`) VALUES
(41, '2020-10-12', 49, 200, 70, '2020-10-11 22:12:38', '2020-10-12 11:34:52'),
(42, '2020-10-12', 50, 680, 0, '2020-10-11 22:13:15', '2020-10-12 11:36:38'),
(43, '2020-10-12', 51, 500, 0, '2020-10-11 22:15:51', '2020-10-12 13:01:48'),
(44, '2020-10-12', 52, 680, 0, '2020-10-11 22:16:21', '2020-10-12 11:36:54'),
(45, '2020-10-12', 53, 300, 0, '2020-10-11 22:18:56', '2020-10-11 22:18:56'),
(46, '2020-10-12', 54, 730, 0, '2020-10-11 22:19:27', '2020-10-14 20:05:13'),
(47, '2020-10-12', 55, 500, 0, '2020-10-11 22:20:38', '2020-10-12 10:52:52'),
(48, '2020-10-12', 56, 3314, 0, '2020-10-11 22:21:20', '2020-10-14 02:03:38'),
(49, '2020-10-12', 57, 300, 0, '2020-10-12 13:13:05', '2020-10-14 02:03:20'),
(50, '2020-10-14', 58, 2776, 0, '2020-10-14 02:07:09', '2020-10-14 20:04:38'),
(51, '2020-10-15', 59, 240, 0, '2020-10-14 19:37:35', '2020-10-14 19:37:35'),
(52, '2020-10-15', 60, 500, 0, '2020-10-14 19:38:52', '2020-10-14 19:38:52'),
(53, '2020-10-15', 61, 300, 0, '2020-10-14 20:00:30', '2020-10-14 20:04:27'),
(54, '2020-10-15', 62, 300, 0, '2020-10-14 20:02:01', '2020-10-14 20:02:01'),
(55, '2020-10-15', 63, 500, 264, '2020-10-14 20:06:34', '2020-10-14 20:06:34'),
(56, '2020-10-15', 64, 200, 0, '2020-10-14 20:07:03', '2020-10-14 20:07:03'),
(57, '2020-10-15', 65, 300, 0, '2020-10-14 20:07:59', '2020-10-14 20:07:59'),
(58, '2020-10-15', 66, 400, 100, '2020-10-14 20:09:41', '2020-10-14 20:09:41'),
(59, '2020-10-16', 67, 300, 0, '2020-10-16 13:36:01', '2020-10-16 13:36:01'),
(60, '2020-10-16', 68, 100, 200, '2020-10-16 13:38:41', '2020-10-16 13:38:41'),
(61, '2020-10-16', 69, 80, 600, '2020-10-16 13:51:44', '2020-10-16 13:51:44'),
(62, '2020-10-17', 70, 200, 100, '2020-10-17 05:39:26', '2020-10-17 05:39:26'),
(63, '2020-10-17', 70, 100, 0, '2020-10-17 06:09:00', '2020-10-17 06:09:00'),
(64, '2020-10-17', 69, 600, 0, '2020-10-17 06:09:14', '2020-10-17 06:09:14'),
(65, '2020-10-17', 68, 200, 0, '2020-10-17 06:09:30', '2020-10-17 06:09:30'),
(66, '2020-10-17', 66, 100, 0, '2020-10-17 06:09:39', '2020-10-17 06:09:39'),
(67, '2020-10-17', 63, 264, 0, '2020-10-17 06:09:54', '2020-10-17 06:09:54'),
(68, '2020-10-18', 87, 300, 0, '2020-10-17 20:29:30', '2020-10-17 20:29:30'),
(69, '2020-10-18', 49, 70, 0, '2020-10-18 16:00:50', '2020-10-18 16:00:50'),
(70, '2020-10-19', 88, 500, 0, '2020-10-19 07:10:47', '2020-10-19 07:10:47'),
(71, '2020-10-19', 89, 300, 0, '2020-10-19 07:32:29', '2020-10-19 07:32:29'),
(72, '2020-10-19', 91, 100, 200, '2020-10-19 10:19:56', '2020-10-19 10:19:56'),
(73, '2020-10-19', 92, 100, 900, '2020-10-19 10:21:49', '2020-10-19 10:21:49'),
(74, '2020-10-19', 93, 180, 0, '2020-10-19 10:23:28', '2020-10-19 10:23:28'),
(75, '2020-10-19', 94, 99, 81, '2020-10-19 12:15:39', '2020-10-19 12:15:39'),
(76, '2020-10-19', 95, 200, 150, '2020-10-19 13:24:12', '2020-10-19 13:24:12'),
(77, '2020-10-19', 96, 200, 150, '2020-10-19 13:24:55', '2020-10-19 13:24:55'),
(78, '2020-10-19', 97, 180, 0, '2020-10-19 13:26:47', '2020-10-19 13:26:47'),
(79, '2020-10-20', 99, 300, 0, '2020-10-20 09:02:04', '2020-10-20 09:02:04'),
(80, '2020-10-20', 100, 90, 210, '2020-10-20 09:02:36', '2020-10-20 09:02:36'),
(81, '2020-10-20', 101, 180, 0, '2020-10-20 09:14:08', '2020-10-20 09:14:08'),
(82, '2020-10-20', 1, 50, 300, '2020-10-20 09:30:05', '2020-10-20 09:30:05'),
(83, '2020-10-20', 2, 180, 0, '2020-10-20 09:34:10', '2020-10-20 09:34:10'),
(84, '2020-10-20', 3, 360, 0, '2020-10-20 09:34:42', '2020-10-20 09:34:42'),
(85, '2020-10-20', 4, 200, 115, '2020-10-20 09:35:20', '2020-10-20 09:35:20'),
(86, '2020-10-20', 5, 477, 0, '2020-10-20 09:36:59', '2020-10-20 09:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `patient_tests`
--

CREATE TABLE `patient_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_date` date NOT NULL,
  `patient_test_invoice_id` bigint(20) UNSIGNED NOT NULL,
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_date` date NOT NULL,
  `test_price` int(11) NOT NULL,
  `test_discount` int(11) NOT NULL,
  `test_net_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_tests`
--

INSERT INTO `patient_tests` (`id`, `test_date`, `patient_test_invoice_id`, `test_id`, `delivery_date`, `test_price`, `test_discount`, `test_net_amount`, `created_at`, `updated_at`) VALUES
(51, '2020-10-12', 26, 1, '2020-10-18', 350, 0, 350, '2020-10-11 21:51:42', '2020-10-11 21:51:42'),
(52, '2020-10-12', 27, 2, '2020-10-14', 180, 0, 180, '2020-10-11 22:00:25', '2020-10-11 22:00:25'),
(53, '2020-10-12', 28, 2, '2020-10-14', 180, 0, 180, '2020-10-11 22:01:12', '2020-10-11 22:01:12'),
(54, '2020-10-12', 29, 2, '2020-10-14', 180, 0, 180, '2020-10-11 22:01:15', '2020-10-11 22:01:15'),
(55, '2020-10-12', 30, 2, '2020-10-14', 180, 0, 180, '2020-10-11 22:01:33', '2020-10-11 22:01:33'),
(56, '2020-10-12', 31, 1, '2020-10-23', 350, 0, 350, '2020-10-11 22:13:15', '2020-10-11 22:13:15'),
(57, '2020-10-12', 31, 2, '2020-10-23', 180, 0, 180, '2020-10-11 22:13:15', '2020-10-11 22:13:15'),
(58, '2020-10-12', 31, 3, '2020-10-23', 150, 0, 150, '2020-10-11 22:13:15', '2020-10-11 22:13:15'),
(59, '2020-10-12', 32, 1, '2020-10-23', 350, 0, 350, '2020-10-11 22:16:20', '2020-10-11 22:16:20'),
(60, '2020-10-12', 32, 2, '2020-10-23', 180, 0, 180, '2020-10-11 22:16:20', '2020-10-11 22:16:20'),
(61, '2020-10-12', 32, 3, '2020-10-23', 150, 0, 150, '2020-10-11 22:16:20', '2020-10-11 22:16:20'),
(62, '2020-10-12', 33, 2, '2020-10-18', 180, 0, 180, '2020-10-11 22:19:27', '2020-10-11 22:19:27'),
(63, '2020-10-12', 33, 5, '2020-10-18', 250, 20, 200, '2020-10-11 22:19:27', '2020-10-11 22:19:27'),
(64, '2020-10-12', 33, 1, '2020-10-18', 350, 0, 350, '2020-10-11 22:19:27', '2020-10-11 22:19:27'),
(65, '2020-10-12', 34, 1, '2020-11-12', 350, 0, 350, '2020-10-11 22:21:20', '2020-10-11 22:21:20'),
(66, '2020-10-12', 34, 6, '2020-11-12', 300, 12, 264, '2020-10-11 22:21:20', '2020-10-11 22:21:20'),
(67, '2020-10-12', 34, 8, '2020-11-12', 3000, 10, 2700, '2020-10-11 22:21:20', '2020-10-11 22:21:20'),
(68, '2020-10-14', 35, 1, '2020-11-14', 350, 0, 350, '2020-10-14 02:07:09', '2020-10-14 02:07:09'),
(69, '2020-10-14', 35, 8, '2020-11-14', 3000, 10, 2700, '2020-10-14 02:07:09', '2020-10-14 02:07:09'),
(70, '2020-10-15', 36, 1, '2020-10-26', 350, 0, 350, '2020-10-14 20:06:34', '2020-10-14 20:06:34'),
(71, '2020-10-15', 36, 3, '2020-10-26', 150, 0, 150, '2020-10-14 20:06:34', '2020-10-14 20:06:34'),
(72, '2020-10-15', 36, 6, '2020-10-26', 300, 12, 264, '2020-10-14 20:06:34', '2020-10-14 20:06:34'),
(73, '2020-10-16', 37, 1, '2020-10-23', 350, 0, 350, '2020-10-16 13:51:43', '2020-10-16 13:51:43'),
(74, '2020-10-16', 37, 2, '2020-10-23', 180, 0, 180, '2020-10-16 13:51:43', '2020-10-16 13:51:43'),
(75, '2020-10-16', 37, 3, '2020-10-23', 150, 0, 150, '2020-10-16 13:51:43', '2020-10-16 13:51:43'),
(76, '2020-10-19', 38, 2, '2020-10-21', 180, 0, 180, '2020-10-19 10:23:28', '2020-10-19 10:23:28'),
(77, '2020-10-19', 39, 2, '2020-10-21', 180, 0, 180, '2020-10-19 12:15:39', '2020-10-19 12:15:39'),
(78, '2020-10-19', 40, 1, '2020-10-25', 350, 0, 350, '2020-10-19 13:24:12', '2020-10-19 13:24:12'),
(79, '2020-10-19', 41, 1, '2020-10-25', 350, 0, 350, '2020-10-19 13:24:55', '2020-10-19 13:24:55'),
(80, '2020-10-19', 42, 2, '2020-10-21', 180, 0, 180, '2020-10-19 13:26:47', '2020-10-19 13:26:47'),
(81, '2020-10-20', 43, 2, '2020-10-22', 180, 0, 180, '2020-10-20 09:14:08', '2020-10-20 09:14:08'),
(82, '2020-10-20', 4, 1, '2020-10-26', 350, 0, 350, '2020-10-20 09:30:05', '2020-10-20 09:30:05'),
(83, '2020-10-20', 6, 2, '2020-10-22', 180, 0, 180, '2020-10-20 09:34:10', '2020-10-20 09:34:10'),
(84, '2020-10-20', 7, 2, '2020-10-22', 180, 0, 180, '2020-10-20 09:34:42', '2020-10-20 09:34:42'),
(85, '2020-10-20', 7, 2, '2020-10-22', 180, 0, 180, '2020-10-20 09:34:42', '2020-10-20 09:34:42'),
(86, '2020-10-20', 8, 1, '2020-10-26', 350, 0, 350, '2020-10-20 09:35:20', '2020-10-20 09:35:20'),
(87, '2020-10-20', 9, 1, '2020-10-26', 350, 0, 350, '2020-10-20 09:36:59', '2020-10-20 09:36:59'),
(88, '2020-10-20', 9, 2, '2020-10-26', 180, 0, 180, '2020-10-20 09:36:59', '2020-10-20 09:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `patient_test_invoices`
--

CREATE TABLE `patient_test_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_date` date NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `person_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_test_invoices`
--

INSERT INTO `patient_test_invoices` (`id`, `test_date`, `patient_id`, `doctor_id`, `person_id`, `created_at`, `updated_at`) VALUES
(4, '2020-10-20', 2, 5, 2, '2020-10-20 09:30:05', '2020-10-20 09:30:05'),
(6, '2020-10-20', 2, 5, NULL, '2020-10-20 09:34:10', '2020-10-20 09:34:10'),
(7, '2020-10-20', 2, 6, 2, '2020-10-20 09:34:42', '2020-10-20 09:34:42'),
(8, '2020-10-20', 2, 5, 2, '2020-10-20 09:35:20', '2020-10-20 09:35:20'),
(9, '2020-10-20', 160, 48, 68, '2020-10-20 09:36:59', '2020-10-20 09:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'create doctor', 'create_doctor', NULL, NULL),
(2, 'edit doctor', 'edit_doctor', NULL, NULL),
(3, 'view doctor', 'view_doctor', NULL, NULL),
(4, 'delete doctor', 'delete_doctor', NULL, NULL),
(5, 'manage doctor', 'manage_doctor', NULL, NULL),
(6, 'create patient', 'create_patient', NULL, NULL),
(7, 'edit patient', 'edit_patient', NULL, NULL),
(8, 'view patient', 'view_patient', NULL, NULL),
(9, 'delete patient', 'delete_patient', NULL, NULL),
(10, 'manage patient', 'manage_patient', NULL, NULL),
(11, 'create ticket', 'create_ticket', NULL, NULL),
(12, 'edit ticket', 'edit_ticket', NULL, NULL),
(13, 'view ticket', 'view_ticket', NULL, NULL),
(14, 'delete ticket', 'delete_ticket', NULL, NULL),
(15, 'manage ticket', 'manage_ticket', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(5, 1),
(5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescription_tickets`
--

CREATE TABLE `prescription_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_date` date NOT NULL,
  `ticket_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_no` int(11) NOT NULL,
  `serial_time` time NOT NULL DEFAULT '18:00:00',
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `person_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_fees` int(11) NOT NULL DEFAULT '0',
  `discount` int(11) NOT NULL DEFAULT '0',
  `total_amount` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ref_commissions`
--

CREATE TABLE `ref_commissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent` double(5,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_commissions`
--

INSERT INTO `ref_commissions` (`id`, `uuid`, `code`, `name`, `percent`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'fbdc46d0-ef73-11ea-9f54-69a5ac0c480c', 'test_com', 'Pathology Test Commission', 77.00, 0, 1, '2020-07-22 23:08:11', '2020-09-05 12:33:21'),
(2, 'f2425a00-ef73-11ea-b8e7-995025ea80b4', 'const_com', 'Consultancy Ref. Commission', 88.00, 0, 1, '2020-07-15 23:09:27', '2020-09-05 12:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `ref_users`
--

CREATE TABLE `ref_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_user_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_user_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_user_status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_users`
--

INSERT INTO `ref_users` (`id`, `ref_user_id`, `ref_user_name`, `ref_user_mobile`, `ref_user_note`, `ref_user_status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'rp67645906', 'Bettye Turcotte DDS', '(902) 414-9570 x33547', 'Et accusamus voluptatum quas nihil.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(2, 'rp35342107', 'Prof. Kira McClure', '564-297-0260 x82873', 'Dolor facere sunt deleniti assumenda ut sit quia.', 1, 1, '2020-09-20 14:43:36', '2020-09-21 08:11:30'),
(3, 'rp1331109', 'Giovanny Lowe', '+1.610.521.4436', 'Fuga odit aliquam cupiditate aspernatur quia.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(4, 'rp86273035', 'Terry Strosin Jr.', '474-531-2601 x2679', 'Nam quae voluptatem et laboriosam.', 1, 2, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(5, 'rp51773302', 'Ewell Abshire', '+1 (376) 559-6890', 'Sit minus et non porro a dolore culpa velit.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(6, 'rp11919303', 'Justyn Carter', '1-701-601-8360', 'Hic dolore sunt minima voluptas.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(7, 'rp92433466', 'Dr. Julien Green DVM', '773.894.6143', 'Voluptas corrupti sequi eos odit blanditiis illo.', 1, 2, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(8, 'rp95365122', 'Dr. Hiram Donnelly', '(230) 673-2778 x201', 'Repellat eos voluptatibus rerum dolorem.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(9, 'rp10459662', 'Prof. Verner Doyle DDS', '+1-804-707-3924', 'Perferendis beatae saepe a ea rerum.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(10, 'rp19610347', 'Trycia Jacobs', '1-310-254-1853 x66550', 'Eveniet rerum ab qui enim non.', 1, 2, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(11, 'rp52356877', 'Concepcion Hagenes', '757-757-7297', 'Ab et et qui rem rerum.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(12, 'rp74352078', 'Michele Simonis', '725-581-5500', 'Molestias non voluptas eaque deserunt.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(13, 'rp85519680', 'Marilou Russel II', '+1.283.649.3494', 'Iste rerum et quam alias.', 1, 2, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(14, 'rp87362930', 'Lupe Rolfson', '510-595-4407 x6334', 'Animi quia similique laudantium aut.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(15, 'rp92545139', 'Murray Kohler', '(979) 509-4105 x364', 'Ut debitis earum porro dolore ea nostrum.', 1, 2, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(16, 'rp10225868', 'Miss Valentina Howe IV', '(720) 340-5273 x0329', 'Pariatur molestiae minus eum et.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(17, 'rp5499896', 'Miss Sandy Wunsch', '(641) 247-2136 x13768', 'Id ut fugit est doloremque commodi.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(18, 'rp4151019', 'Elwin Farrell', '+1-247-924-5064', 'In ut nobis commodi vero qui deserunt molestias.', 1, 2, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(19, 'rp35193835', 'Emmett Cummings', '(428) 577-5555', 'Non aut sit cupiditate excepturi.', 1, 2, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(20, 'rp33811921', 'Mr. Lonny Bergstrom', '+1 (381) 585-5426', 'Saepe quia fuga ut velit.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(21, 'rp65632037', 'Prof. Gene Rice', '230-335-2263 x334', 'Consectetur modi voluptatem debitis.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(22, 'rp89056131', 'Duane Schoen II', '1-543-363-7051 x010', 'Repellendus illum voluptate sed aut.', 1, 2, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(23, 'rp29773881', 'Marilyne Grimes', '+16624682616', 'Exercitationem sit assumenda sint.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(24, 'rp84122120', 'Mozelle Mann', '+13399456240', 'Assumenda eveniet eveniet dolorem.', 1, 2, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(25, 'rp61146687', 'Maureen Moore', '372.872.9170 x803', 'Fugiat qui incidunt provident est delectus.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(26, 'rp62318862', 'Miss Betsy Oberbrunner', '+13166928400', 'Blanditiis sunt odio magni reprehenderit est at.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(27, 'rp90906104', 'Ramona Yundt', '1-693-453-9485', 'Porro in beatae mollitia aut perferendis.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(28, 'rp66805712', 'Jensen Lind', '1-347-251-2662 x580', 'Animi atque explicabo eum atque.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(29, 'rp73735891', 'Hope Sawayn', '894-738-9750', 'Sapiente dolorum voluptatum eos est eum dolores.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(30, 'rp67641575', 'Tyrese Russel', '979.556.3519', 'Earum libero enim qui eum.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(31, 'rp22532091', 'Jasmin Lakin', '1-287-980-6649 x91191', 'Et praesentium magni quo unde et.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(32, 'rp4496907', 'Mandy Ryan Sr.', '791-647-3348', 'Ut et esse est velit.', 1, 2, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(33, 'rp4001983', 'Ms. Marietta Trantow', '(679) 370-9923 x05421', 'Modi repellendus fugit aut dolor.', 1, 2, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(34, 'rp77679660', 'Rosanna Kihn', '(686) 590-3250', 'Maxime voluptas ut quas quis voluptas.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(35, 'rp71282036', 'Prof. Willis Vandervort MD', '(673) 983-0621', 'Consequatur consequatur natus voluptatum.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(36, 'rp95926555', 'Dr. Kellie Torp PhD', '(907) 737-0460', 'Tempora omnis vel dolore sed rerum nobis sint.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(37, 'rp80343488', 'Jazmyne Cassin', '928.669.0709', 'Reprehenderit sit sunt adipisci.', 1, 2, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(38, 'rp78626355', 'Mrs. Simone Bogisich', '950.381.0529 x262', 'Architecto rerum ad in iusto cum.', 1, 2, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(39, 'rp9766957', 'Rosemarie Hintz', '261-601-5926 x34572', 'Deleniti est omnis est sit.', 1, 2, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(40, 'rp12249561', 'Miss Amalia Pfeffer DVM', '242.329.8656 x90263', 'Pariatur aut quas veritatis rerum magnam.', 1, 2, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(41, 'rp30257425', 'Kiera Daugherty V', '1-945-247-6154 x8962', 'Blanditiis blanditiis eos molestiae tempora.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(42, 'rp84780073', 'Eva Daniel', '+1-241-799-4645', 'Sapiente aspernatur voluptates voluptatem.', 1, 2, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(43, 'rp35652642', 'Sheridan Halvorson', '541-743-7760', 'Id ad nisi architecto tempore.', 1, 2, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(44, 'rp47410877', 'Anna Ritchie IV', '1-521-746-4467', 'Blanditiis modi veritatis doloribus qui harum.', 1, 2, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(45, 'rp54129016', 'Jackie Gibson', '+17713885878', 'Ipsum dolor id a ea eos.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(46, 'rp59921295', 'Prince Yundt', '(356) 595-1582 x5433', 'Nisi dolores esse quia error.', 1, 2, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(47, 'rp97344051', 'Myrtle Hudson II', '+1-697-447-8435', 'At aut totam dicta omnis deleniti.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(48, 'rp94504002', 'Mrs. Fatima Lind', '+15703894269', 'Iure et soluta iusto qui numquam omnis.', 1, 2, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(49, 'rp49510047', 'Emerald Russel', '772-381-2878 x215', 'Sed dolorum pariatur ipsa culpa deleniti labore.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(50, 'rp4650841', 'Micah Bergstrom', '870.925.2620 x7335', 'Ut ipsum et illum aut hic nesciunt sit similique.', 1, 1, '2020-09-20 14:43:36', '2020-09-20 14:43:36'),
(51, 'rp1312113', 'Ref. Person 1', '01611425480', '', 1, 1, '2020-09-21 08:17:34', '2020-09-21 08:17:34'),
(52, 'RPID1600690582', 'Adfsfs', '121341', 'adwerf', 1, 1, '2020-09-21 12:16:22', '2020-09-21 12:16:22'),
(53, 'RPID1600695948', 'Dsfsd', '1312412', 'asdewfg', 1, 1, '2020-09-21 13:45:48', '2020-09-21 13:45:48'),
(54, 'RPID1600696036', 'Asfsg1231241', '12124', NULL, 1, 1, '2020-09-21 13:47:16', '2020-09-21 13:47:16'),
(55, 'RPID1600721775', 'No Broker', '01679605511', 'hello', 1, 1, '2020-09-21 20:56:15', '2020-09-21 20:56:15'),
(56, 'B00561942', 'Jhvjv', '313', 'gdsgjr', 1, 1, '2020-10-19 06:51:21', '2020-10-19 06:51:21'),
(57, 'B00577806', 'Ljpoj', '99999', 'iliou', 1, 1, '2020-10-19 06:57:28', '2020-10-19 06:57:28'),
(58, 'B00589929', 'Aaads', '213124', NULL, 1, 1, '2020-10-19 07:02:56', '2020-10-19 07:02:56'),
(59, 'B00596957', 'Twtw', '13123', 'adasdas', 1, 1, '2020-10-19 12:06:32', '2020-10-19 12:06:32'),
(60, 'B00606861', 'Iuhu', '12132', NULL, 1, 1, '2020-10-19 12:14:20', '2020-10-19 12:14:20'),
(61, 'B00618674', 'Sdfvds', '12312', NULL, 1, 1, '2020-10-19 12:55:28', '2020-10-19 12:55:28'),
(62, 'B00623324', 'Sfdg', '12324', 'dsfsdf', 1, 1, '2020-10-19 13:06:32', '2020-10-19 13:06:32'),
(63, 'B00631074', 'Sffergr', '121313', 'dfe', 1, 1, '2020-10-19 13:07:03', '2020-10-19 13:07:03'),
(64, 'B00646440', 'Asdfsdf', '21434', NULL, 1, 1, '2020-10-19 13:17:12', '2020-10-19 13:17:12'),
(65, 'B00657873', 'Scsdfvs', '12423143', 'sdfge', 1, 1, '2020-10-19 13:23:19', '2020-10-19 13:23:19'),
(66, 'B00663845', 'Adasfef', '2124', 'asfawe', 1, 1, '2020-10-19 13:24:29', '2020-10-19 13:24:29'),
(67, 'B00672743', 'Broker', '13232', 'dsffer', 1, 1, '2020-10-20 09:13:44', '2020-10-20 09:13:44'),
(68, 'B00685853', 'Broker', '1313', 'derfer', 1, 1, '2020-10-20 09:36:27', '2020-10-20 09:36:27');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL),
(2, 'Manager', 'manager', NULL, NULL),
(3, 'Front-Desk', 'front_desk', NULL, NULL),
(4, 'Doctor', 'doctor', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `type`, `code`, `note`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '101', '-----', 1, 1, '2020-10-19 09:20:54', '2020-10-19 09:20:54'),
(2, 1, '201', '------', 1, 1, '2020-10-19 09:21:32', '2020-10-19 09:21:32'),
(3, 1, '203', 'Sample Collection', 1, 1, '2020-10-19 09:21:51', '2020-10-19 09:21:51'),
(4, 1, '205', 'Sample Collection', 1, 1, '2020-10-19 09:22:08', '2020-10-19 09:22:08'),
(5, 2, '501', 'General Chamber', 1, 1, '2020-10-19 09:22:30', '2020-10-19 09:22:30'),
(6, 2, '401', 'General Chamber', 1, 1, '2020-10-19 09:22:39', '2020-10-19 09:22:39'),
(7, 2, '402', 'General Chamber', 1, 1, '2020-10-19 09:22:50', '2020-10-19 09:22:50'),
(8, 1, '303', 'X-Ray', 1, 1, '2020-10-19 09:23:04', '2020-10-19 09:23:04'),
(9, 1, '505', 'MRI', 1, 1, '2020-10-19 09:23:21', '2020-10-19 09:23:21'),
(10, 2, '209', '---', 1, 1, '2020-10-19 09:23:50', '2020-10-19 09:23:50'),
(11, 2, '307', 'General Chamber', 1, 1, '2020-10-19 09:24:05', '2020-10-19 09:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `test_invoices`
--

CREATE TABLE `test_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@gmail.com', NULL, '$2y$10$mKNZxGGZ6mmKXFCQesRyDunEuwHX.6v0heSJiK2DhnpL8uSuYtP7m', 'OHKysl6sCzjboIEHeBQnqErkzbkHLmuyAK0YiU7MdHudeQh4vroVl8VMuHF5', '2020-02-16 04:20:52', '2020-02-16 04:20:52'),
(2, 'Omar Faruk', 'web2faruk@gmail.com', NULL, '$2y$10$njgptwbm7etSuHY5F3wuIeqTio3U4E0JCPd56ygXFDqO3DmzktgFa', NULL, '2020-02-16 04:26:36', '2020-02-16 04:26:36'),
(3, 'dalim', 'dalim@gmail.com', NULL, '$2y$10$mKNZxGGZ6mmKXFCQesRyDunEuwHX.6v0heSJiK2DhnpL8uSuYtP7m', NULL, '2020-02-16 04:26:36', '2020-02-16 04:26:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brokers`
--
ALTER TABLE `brokers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `broker_income_histories`
--
ALTER TABLE `broker_income_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `broker_income_histories_prescription_ticket_id_foreign` (`prescription_ticket_id`),
  ADD KEY `broker_income_histories_patient_test_invoice_id_foreign` (`patient_test_invoice_id`),
  ADD KEY `broker_income_histories_broker_id_foreign` (`broker_id`);

--
-- Indexes for table `broker_payments`
--
ALTER TABLE `broker_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `broker_payments_broker_id_foreign` (`broker_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_departments`
--
ALTER TABLE `doctor_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_income_histories`
--
ALTER TABLE `doctor_income_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_income_histories_invoice_id_foreign` (`invoice_id`),
  ADD KEY `doctor_income_histories_prescription_ticket_id_foreign` (`prescription_ticket_id`),
  ADD KEY `doctor_income_histories_patient_test_invoice_id_foreign` (`patient_test_invoice_id`),
  ADD KEY `doctor_income_histories_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `doctor_payments`
--
ALTER TABLE `doctor_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_payments_doctor_id_foreign` (`doctor_id`),
  ADD KEY `doctor_payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `employee_departments`
--
ALTER TABLE `employee_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_reports`
--
ALTER TABLE `income_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_prescription_ticket_id_foreign` (`prescription_ticket_id`),
  ADD KEY `invoices_patient_test_invoice_id_foreign` (`patient_test_invoice_id`),
  ADD KEY `invoices_patient_id_foreign` (`patient_id`),
  ADD KEY `invoices_doctor_id_foreign` (`doctor_id`),
  ADD KEY `invoices_person_id_foreign` (`person_id`);

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
-- Indexes for table `pathology_departments`
--
ALTER TABLE `pathology_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pathology_tests`
--
ALTER TABLE `pathology_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_patient_id_unique` (`patient_id`),
  ADD KEY `patients_user_id_foreign` (`user_id`);

--
-- Indexes for table `patient_payments`
--
ALTER TABLE `patient_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_payments_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `patient_tests`
--
ALTER TABLE `patient_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_tests_patient_test_invoice_id_foreign` (`patient_test_invoice_id`),
  ADD KEY `patient_tests_test_id_foreign` (`test_id`);

--
-- Indexes for table `patient_test_invoices`
--
ALTER TABLE `patient_test_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_test_invoices_patient_id_foreign` (`patient_id`),
  ADD KEY `patient_test_invoices_doctor_id_foreign` (`doctor_id`),
  ADD KEY `patient_test_invoices_person_id_foreign` (`person_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`permission_id`,`user_id`),
  ADD KEY `permission_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `prescription_tickets`
--
ALTER TABLE `prescription_tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prescription_tickets_patient_id_foreign` (`patient_id`),
  ADD KEY `prescription_tickets_doctor_id_foreign` (`doctor_id`),
  ADD KEY `prescription_tickets_person_id_foreign` (`person_id`);

--
-- Indexes for table `ref_commissions`
--
ALTER TABLE `ref_commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_users`
--
ALTER TABLE `ref_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ref_users_ref_user_id_unique` (`ref_user_id`),
  ADD UNIQUE KEY `ref_users_ref_user_mobile_unique` (`ref_user_mobile`),
  ADD KEY `ref_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_user_id_foreign` (`user_id`);

--
-- Indexes for table `test_invoices`
--
ALTER TABLE `test_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brokers`
--
ALTER TABLE `brokers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `broker_income_histories`
--
ALTER TABLE `broker_income_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `broker_payments`
--
ALTER TABLE `broker_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `doctor_departments`
--
ALTER TABLE `doctor_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `doctor_income_histories`
--
ALTER TABLE `doctor_income_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `doctor_payments`
--
ALTER TABLE `doctor_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_departments`
--
ALTER TABLE `employee_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income_reports`
--
ALTER TABLE `income_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `pathology_departments`
--
ALTER TABLE `pathology_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pathology_tests`
--
ALTER TABLE `pathology_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `patient_payments`
--
ALTER TABLE `patient_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `patient_tests`
--
ALTER TABLE `patient_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `patient_test_invoices`
--
ALTER TABLE `patient_test_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `prescription_tickets`
--
ALTER TABLE `prescription_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ref_commissions`
--
ALTER TABLE `ref_commissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ref_users`
--
ALTER TABLE `ref_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `test_invoices`
--
ALTER TABLE `test_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `broker_income_histories`
--
ALTER TABLE `broker_income_histories`
  ADD CONSTRAINT `broker_income_histories_broker_id_foreign` FOREIGN KEY (`broker_id`) REFERENCES `ref_users` (`id`),
  ADD CONSTRAINT `broker_income_histories_patient_test_invoice_id_foreign` FOREIGN KEY (`patient_test_invoice_id`) REFERENCES `patient_test_invoices` (`id`),
  ADD CONSTRAINT `broker_income_histories_prescription_ticket_id_foreign` FOREIGN KEY (`prescription_ticket_id`) REFERENCES `prescription_tickets` (`id`);

--
-- Constraints for table `broker_payments`
--
ALTER TABLE `broker_payments`
  ADD CONSTRAINT `broker_payments_broker_id_foreign` FOREIGN KEY (`broker_id`) REFERENCES `ref_users` (`id`);

--
-- Constraints for table `doctor_income_histories`
--
ALTER TABLE `doctor_income_histories`
  ADD CONSTRAINT `doctor_income_histories_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `doctor_income_histories_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `doctor_income_histories_patient_test_invoice_id_foreign` FOREIGN KEY (`patient_test_invoice_id`) REFERENCES `patient_test_invoices` (`id`),
  ADD CONSTRAINT `doctor_income_histories_prescription_ticket_id_foreign` FOREIGN KEY (`prescription_ticket_id`) REFERENCES `prescription_tickets` (`id`);

--
-- Constraints for table `doctor_payments`
--
ALTER TABLE `doctor_payments`
  ADD CONSTRAINT `doctor_payments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `doctor_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `invoices_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `invoices_patient_test_invoice_id_foreign` FOREIGN KEY (`patient_test_invoice_id`) REFERENCES `patient_test_invoices` (`id`),
  ADD CONSTRAINT `invoices_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `ref_users` (`id`),
  ADD CONSTRAINT `invoices_prescription_ticket_id_foreign` FOREIGN KEY (`prescription_ticket_id`) REFERENCES `prescription_tickets` (`id`);

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `patient_payments`
--
ALTER TABLE `patient_payments`
  ADD CONSTRAINT `patient_payments_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`);

--
-- Constraints for table `patient_test_invoices`
--
ALTER TABLE `patient_test_invoices`
  ADD CONSTRAINT `patient_test_invoices_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `patient_test_invoices_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `patient_test_invoices_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `ref_users` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prescription_tickets`
--
ALTER TABLE `prescription_tickets`
  ADD CONSTRAINT `prescription_tickets_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `prescription_tickets_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `prescription_tickets_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `ref_users` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
