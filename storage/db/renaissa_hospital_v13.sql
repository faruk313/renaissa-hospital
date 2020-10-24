-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 22, 2020 at 08:42 PM
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
  `broker_uid` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `broker_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `broker_mobile` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `broker_note` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `broker_commission` int(11) NOT NULL DEFAULT '0',
  `broker_status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
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
(1, '2020-10-21', 'RH201011', NULL, 1, 1, 352, 18, '2020-10-21 08:50:29', '2020-10-21 08:50:29'),
(2, '2020-10-22', 'RH201017', NULL, 2, 1, 272, 14, '2020-10-22 07:37:53', '2020-10-22 07:37:53');

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
(1, '2020-10-21', 1, 18, '2020-10-21 08:55:45', '2020-10-21 08:55:45');

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
(1, 'D-1603228963', 2, 400, NULL, 300, 200, NULL, 1, 'Dr. Xyz', NULL, '01919191', 'doctor_1603228963.jpg', 1, 2, '1990-08-17', 1, 'Mbbs', '---', '---', '---', '---', '---', '2020-10-21', 1, 1, '----', 1, '2020-10-20 21:22:44', '2020-10-20 21:22:44'),
(2, 'D-1603269692', 2, 200, NULL, 200, 200, NULL, 1, 'Dr. Xyz Abc', NULL, '011717', 'doctor_1603269692.jpg', 1, 3, '1990-08-17', 1, 'Mbbs', 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', '2020-12-12', 1, 0, '---', 1, '2020-10-21 08:41:32', '2020-10-21 18:51:18');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_departments`
--

CREATE TABLE `doctor_departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_note` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2020-10-23', 'RH201001', 1, 1, NULL, 1, 400, NULL, '2020-10-20 21:23:38', '2020-10-20 21:23:38'),
(2, '2020-10-22', 'RH201002', 2, 2, NULL, 1, 400, NULL, '2020-10-20 21:54:24', '2020-10-20 21:54:24'),
(3, '2020-10-21', 'RH201003', 3, 3, NULL, 1, 400, NULL, '2020-10-21 00:19:23', '2020-10-21 00:19:23'),
(4, '2020-10-21', 'RH201004', 4, 4, NULL, 1, 400, NULL, '2020-10-21 01:25:43', '2020-10-21 01:25:43'),
(5, '2020-10-21', 'RH201005', 5, 5, NULL, 1, 400, NULL, '2020-10-21 01:27:26', '2020-10-21 01:27:26'),
(6, '2020-10-21', 'RH201006', 6, 6, NULL, 1, 400, NULL, '2020-10-21 01:33:56', '2020-10-21 01:33:56'),
(7, '2020-10-21', 'RH201007', 7, 7, NULL, 1, 400, NULL, '2020-10-21 01:34:47', '2020-10-21 01:34:47'),
(8, '2020-10-21', 'RH201008', 8, 8, NULL, 1, 400, NULL, '2020-10-21 01:53:28', '2020-10-21 01:53:28'),
(9, '2020-10-21', 'RH201009', 9, 9, NULL, 1, 400, NULL, '2020-10-21 02:00:08', '2020-10-21 02:00:08'),
(10, '2020-10-21', 'RH201010', 10, 10, NULL, 1, 400, NULL, '2020-10-21 02:01:32', '2020-10-21 02:01:32'),
(11, '2020-10-21', 'RH201011', 11, NULL, 1, 2, 352, 4, '2020-10-21 08:50:29', '2020-10-21 08:50:29'),
(12, '2020-10-21', 'RH201012', 12, 11, NULL, 2, 200, NULL, '2020-10-21 17:20:37', '2020-10-21 17:20:37'),
(13, '2020-10-22', 'RH201013', 13, 12, NULL, 2, 200, NULL, '2020-10-21 17:22:32', '2020-10-21 17:22:32'),
(14, '2020-10-23', 'RH201014', 14, 13, NULL, 1, 400, NULL, '2020-10-21 19:30:05', '2020-10-21 19:30:05'),
(15, '2020-10-22', 'RH201015', 15, 14, NULL, 1, 400, NULL, '2020-10-21 20:13:01', '2020-10-21 20:13:01'),
(16, '2020-10-22', 'RH201016', 16, 15, NULL, 1, 40, NULL, '2020-10-21 20:38:15', '2020-10-21 20:38:15'),
(17, '2020-10-22', 'RH201017', 17, NULL, 2, 2, 272, 3, '2020-10-22 07:37:53', '2020-10-22 07:37:53'),
(18, '2020-10-22', 'RH201018', 18, 16, NULL, 1, 296, NULL, '2020-10-22 07:54:05', '2020-10-22 07:54:05'),
(19, '2020-10-22', 'RH201019', 19, 17, NULL, 1, 316, NULL, '2020-10-22 10:21:53', '2020-10-22 10:21:53'),
(20, '2020-10-22', 'RH201020', 1901, 19, NULL, 1, 308, NULL, '2020-10-22 11:07:00', '2020-10-22 11:07:00'),
(21, '2020-10-22', 'RH201021', 1902, 20, NULL, 1, 4, NULL, '2020-10-22 11:10:28', '2020-10-22 11:10:28'),
(22, '2020-10-22', 'RH201022', 1903, 29, NULL, 1, 120, NULL, '2020-10-22 13:38:10', '2020-10-22 13:38:10');

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

--
-- Dumping data for table `doctor_payments`
--

INSERT INTO `doctor_payments` (`id`, `invoice_date`, `doctor_id`, `paid_amount`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2020-10-21', 2, 4, 1, '2020-10-21 08:52:56', '2020-10-21 08:52:56'),
(2, '2020-10-21', 1, 0, 1, '2020-10-21 08:53:02', '2020-10-21 08:53:02'),
(3, '2020-10-22', 1, 0, 1, '2020-10-21 08:53:22', '2020-10-21 08:53:22'),
(4, '2020-10-23', 1, 0, 1, '2020-10-21 08:54:23', '2020-10-21 08:54:23'),
(5, '2020-10-22', 2, 0, 1, '2020-10-21 19:50:56', '2020-10-21 19:50:56');

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
(1, 'abc', 2020, '2020-10-22', 1, '2020-10-21 18:20:44', '2020-10-21 18:20:44'),
(2, 'xyz', 100, '2020-10-22', 1, '2020-10-21 18:20:56', '2020-10-21 19:41:57');

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
(1, '2020-10-23', 'RH201001', 1, NULL, 1, 1, 1, 400, 0, 400, '2020-10-20 21:23:38', '2020-10-20 21:23:38'),
(2, '2020-10-22', 'RH201002', 2, NULL, 6, 1, 2, 400, 0, 400, '2020-10-20 21:54:24', '2020-10-20 21:54:24'),
(3, '2020-10-21', 'RH201003', 3, NULL, 2, 1, 2, 400, 0, 400, '2020-10-21 00:19:23', '2020-10-21 00:19:23'),
(4, '2020-10-21', 'RH201004', 4, NULL, 2, 1, 2, 400, 0, 400, '2020-10-21 01:25:43', '2020-10-21 01:25:43'),
(5, '2020-10-21', 'RH201005', 5, NULL, 1, 1, 1, 400, 0, 400, '2020-10-21 01:27:26', '2020-10-21 01:27:26'),
(6, '2020-10-21', 'RH201006', 6, NULL, 7, 1, 4, 400, 0, 400, '2020-10-21 01:33:56', '2020-10-21 01:33:56'),
(7, '2020-10-21', 'RH201007', 7, NULL, 7, 1, 2, 400, 0, 400, '2020-10-21 01:34:47', '2020-10-21 01:34:47'),
(8, '2020-10-21', 'RH201008', 8, NULL, 2, 1, 2, 400, 0, 400, '2020-10-21 01:53:28', '2020-10-21 01:53:28'),
(9, '2020-10-21', 'RH201009', 9, NULL, 2, 1, 2, 400, 0, 400, '2020-10-21 02:00:08', '2020-10-21 02:00:08'),
(10, '2020-10-21', 'RH201010', 10, NULL, 2, 1, 2, 400, 0, 400, '2020-10-21 02:01:32', '2020-10-21 02:01:32'),
(11, '2020-10-21', 'RH201011', NULL, 1, 2, 2, 1, 352, 0, 352, '2020-10-21 08:50:29', '2020-10-21 08:50:29'),
(12, '2020-10-21', 'RH201012', 11, NULL, 2, 2, 2, 200, 0, 200, '2020-10-21 17:20:37', '2020-10-21 17:20:37'),
(13, '2020-10-22', 'RH201013', 12, NULL, 11, 2, 1, 200, 0, 200, '2020-10-21 17:22:32', '2020-10-21 17:22:32'),
(14, '2020-10-23', 'RH201014', 13, NULL, 2, 1, 1, 400, 0, 400, '2020-10-21 19:30:05', '2020-10-21 19:30:05'),
(15, '2020-10-22', 'RH201015', 14, NULL, 2, 1, 1, 400, 0, 400, '2020-10-21 20:13:01', '2020-10-21 20:13:01'),
(16, '2020-10-22', 'RH201016', 15, NULL, 2, 1, 2, 400, 90, 40, '2020-10-21 20:38:15', '2020-10-21 20:38:15'),
(17, '2020-10-22', 'RH201017', NULL, 2, 10, 2, 1, 362, 25, 272, '2020-10-22 07:37:53', '2020-10-22 07:37:53'),
(18, '2020-10-22', 'RH201018', 16, NULL, 3, 1, 1, 400, 26, 296, '2020-10-22 07:54:05', '2020-10-22 07:54:05'),
(19, '2020-10-22', 'RH201019', 17, NULL, 2, 1, 2, 400, 21, 316, '2020-10-22 10:21:53', '2020-10-22 10:21:53'),
(1900, '2020-10-21', 'sddewfwerwe', NULL, 1, 10, 2, 2, 100, 10, 200, NULL, NULL),
(1901, '2020-10-22', 'RH201020', 19, NULL, 2, 1, 2, 400, 23, 308, '2020-10-22 11:07:00', '2020-10-22 11:07:00'),
(1902, '2020-10-22', 'RH201021', 20, NULL, 2, 1, NULL, 400, 99, 4, '2020-10-22 11:10:28', '2020-10-22 11:10:28'),
(1903, '2020-10-22', 'RH201022', 29, NULL, 1, 1, NULL, 400, 70, 120, '2020-10-22 13:38:10', '2020-10-22 13:38:10');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(19, '2020_08_16_173115_create_test_invoices_table', 7),
(36, '2020_09_06_193624_create_doctors_table', 10),
(41, '2020_09_20_202054_create_ref_users_table', 13),
(53, '2020_09_24_175039_create_patient_payments_table', 15),
(56, '2020_09_23_145942_create_patient_tests_table', 16),
(60, '2020_09_29_044901_create_broker_income_histories_table', 19),
(61, '2020_09_29_045112_create_broker_payments_table', 19),
(62, '2020_10_05_235625_create_expenses_table', 20),
(63, '2020_10_05_141431_create_income_reports_table', 21),
(65, '2020_09_29_011146_create_doctor_income_histories_table', 22),
(70, '2020_10_13_174419_create_roles_table', 24),
(71, '2020_10_13_174542_create_permissions_table', 24),
(72, '2020_10_13_174703_create_role_users_table', 24),
(73, '2020_10_13_174739_create_permission_roles_table', 24),
(74, '2020_10_13_174758_create_permission_users_table', 24),
(78, '2020_09_28_034741_create_doctor_payments_table', 26),
(81, '2020_09_23_136019_create_patient_test_invoices_table', 28),
(82, '2020_09_23_153222_create_invoices_table', 28),
(83, '2020_09_23_010114_create_prescription_tickets_table', 29),
(90, '2014_10_12_000000_create_users_table', 32),
(92, '2020_07_23_192149_create_doctor_departments_table', 33),
(93, '2020_07_23_193039_create_pathology_departments_table', 33),
(94, '2020_07_27_201411_create_pathology_tests_table', 33),
(95, '2020_08_20_200748_create_patients_table', 34),
(96, '2020_09_02_181145_create_rooms_table', 34),
(97, '2020_10_19_145607_create_brokers_table', 34);

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
  `department_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_note` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pathology_tests`
--

CREATE TABLE `pathology_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_price` int(11) NOT NULL DEFAULT '0',
  `patient_discount` int(11) NOT NULL DEFAULT '0',
  `doctor_commission` int(11) NOT NULL DEFAULT '0',
  `broker_commission` int(11) NOT NULL DEFAULT '0',
  `test_duration` int(11) NOT NULL DEFAULT '0',
  `test_room` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_status` tinyint(1) NOT NULL DEFAULT '1',
  `test_suggestion` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_uid` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_mobile` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_age` tinyint(3) UNSIGNED DEFAULT NULL,
  `patient_gender` tinyint(1) NOT NULL DEFAULT '1',
  `patient_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_note` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `patient_uid`, `patient_name`, `patient_mobile`, `patient_age`, `patient_gender`, `patient_address`, `patient_note`, `patient_status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'P20100001', 'Aaa', '1233', 22, 1, NULL, NULL, 1, 1, '2020-10-22 19:19:31', '2020-10-22 19:19:31'),
(2, 'P20100002', 'Xyz', '019111232', 99, 0, 'dhaka', NULL, 1, 1, '2020-10-22 19:23:56', '2020-10-22 19:23:56'),
(3, 'P20100003', 'Omar Faruk', '01911425480', 30, 0, 'South Banasree, Dhaka', 'South Banasree, Dhaka', 1, 1, '2020-10-22 20:32:36', '2020-10-22 20:37:04');

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
(1, '2020-10-23', 1, 200, 200, '2020-10-20 21:23:38', '2020-10-20 21:23:38'),
(2, '2020-10-22', 2, 50, 350, '2020-10-20 21:54:24', '2020-10-20 21:54:24'),
(3, '2020-10-21', 3, 400, 0, '2020-10-21 00:19:23', '2020-10-21 00:19:23'),
(4, '2020-10-21', 2, 350, 0, '2020-10-21 01:25:16', '2020-10-21 01:25:16'),
(5, '2020-10-21', 4, 100, 300, '2020-10-21 01:25:43', '2020-10-21 01:25:43'),
(6, '2020-10-21', 5, 200, 200, '2020-10-21 01:27:26', '2020-10-21 01:27:26'),
(7, '2020-10-21', 6, 90, 310, '2020-10-21 01:33:56', '2020-10-21 01:33:56'),
(8, '2020-10-21', 7, 60, 340, '2020-10-21 01:34:47', '2020-10-21 01:34:47'),
(9, '2020-10-21', 7, 340, 0, '2020-10-21 01:39:12', '2020-10-21 01:39:12'),
(10, '2020-10-21', 8, 400, 0, '2020-10-21 01:53:28', '2020-10-21 01:53:28'),
(11, '2020-10-21', 9, 200, 200, '2020-10-21 02:00:08', '2020-10-21 02:00:08'),
(12, '2020-10-21', 10, 50, 350, '2020-10-21 02:01:32', '2020-10-21 02:01:32'),
(13, '2020-10-21', 11, 100, 252, '2020-10-21 08:50:29', '2020-10-21 08:50:29'),
(14, '2020-10-21', 11, 252, 0, '2020-10-21 12:35:41', '2020-10-21 12:35:41'),
(15, '2020-10-21', 12, 200, 0, '2020-10-21 17:20:37', '2020-10-21 17:20:37'),
(16, '2020-10-22', 13, 200, 0, '2020-10-21 17:22:32', '2020-10-21 17:22:32'),
(17, '2020-10-23', 14, 400, 0, '2020-10-21 19:30:05', '2020-10-21 19:30:05'),
(18, '2020-10-22', 1, 200, 0, '2020-10-21 19:31:30', '2020-10-21 19:31:30'),
(19, '2020-10-22', 10, 350, 0, '2020-10-21 19:35:57', '2020-10-21 19:35:57'),
(20, '2020-10-22', 10, 350, 350, '2020-10-21 19:36:58', '2020-10-21 19:36:58'),
(21, '2020-10-22', 10, 350, 0, '2020-10-21 19:37:28', '2020-10-21 19:37:28'),
(22, '2020-10-22', 4, 300, 0, '2020-10-21 19:39:31', '2020-10-21 19:39:31'),
(23, '2020-10-22', 6, 310, 0, '2020-10-21 19:39:55', '2020-10-21 19:39:55'),
(24, '2020-10-22', 5, 200, 0, '2020-10-21 19:40:13', '2020-10-21 19:40:13'),
(25, '2020-10-22', 15, 200, 200, '2020-10-21 20:13:01', '2020-10-21 20:13:01'),
(26, '2020-10-22', 16, 40, 0, '2020-10-21 20:38:15', '2020-10-21 20:38:15'),
(27, '2020-10-22', 17, 150, 122, '2020-10-22 07:37:53', '2020-10-22 07:37:53'),
(28, '2020-10-22', 18, 200, 96, '2020-10-22 07:54:05', '2020-10-22 07:54:05'),
(29, '2020-10-22', 19, 200, 116, '2020-10-22 10:21:54', '2020-10-22 10:21:54'),
(30, '2020-10-22', 1901, 109, 199, '2020-10-22 11:07:00', '2020-10-22 11:07:00'),
(31, '2020-10-22', 1902, 4, 0, '2020-10-22 11:10:28', '2020-10-22 11:10:28'),
(32, '2020-10-22', 1903, 120, 0, '2020-10-22 13:38:10', '2020-10-22 13:38:10');

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
(1, '2020-10-21', 1, 1, '2020-10-25', 100, 0, 100, '2020-10-21 08:50:29', '2020-10-21 08:50:29'),
(2, '2020-10-21', 1, 2, '2020-10-25', 323, 22, 252, '2020-10-21 08:50:29', '2020-10-21 08:50:29'),
(3, '2020-10-22', 2, 1, '2020-11-07', 100, 0, 100, '2020-10-22 07:37:53', '2020-10-22 07:37:53'),
(4, '2020-10-22', 2, 3, '2020-11-07', 11, 11, 10, '2020-10-22 07:37:53', '2020-10-22 07:37:53'),
(5, '2020-10-22', 2, 2, '2020-11-07', 323, 22, 252, '2020-10-22 07:37:53', '2020-10-22 07:37:53');

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
(1, '2020-10-21', 2, 2, 1, '2020-10-21 08:50:29', '2020-10-21 08:50:29'),
(2, '2020-10-22', 10, 2, 1, '2020-10-22 07:37:53', '2020-10-22 07:37:53');

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

--
-- Dumping data for table `prescription_tickets`
--

INSERT INTO `prescription_tickets` (`id`, `ticket_date`, `serial_no`, `serial_time`, `patient_id`, `doctor_id`, `person_id`, `doctor_fees`, `discount`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, '2020-10-23', 1, '18:00:00', 1, 1, 1, 400, 0, 400, '2020-10-20 21:23:38', '2020-10-20 21:23:38'),
(2, '2020-10-22', 1, '18:00:00', 6, 1, 2, 400, 0, 400, '2020-10-20 21:54:24', '2020-10-20 21:54:24'),
(3, '2020-10-21', 1, '18:00:00', 2, 1, 2, 400, 0, 400, '2020-10-21 00:19:23', '2020-10-21 00:19:23'),
(4, '2020-10-21', 2, '18:00:00', 2, 1, 2, 400, 0, 400, '2020-10-21 01:25:43', '2020-10-21 01:25:43'),
(5, '2020-10-21', 3, '18:00:00', 1, 1, 1, 400, 0, 400, '2020-10-21 01:27:26', '2020-10-21 01:27:26'),
(6, '2020-10-21', 4, '18:00:00', 7, 1, 4, 400, 0, 400, '2020-10-21 01:33:56', '2020-10-21 01:33:56'),
(7, '2020-10-21', 5, '18:00:00', 7, 1, 2, 400, 0, 400, '2020-10-21 01:34:47', '2020-10-21 01:34:47'),
(8, '2020-10-21', 6, '18:00:00', 2, 1, 2, 400, 0, 400, '2020-10-21 01:53:28', '2020-10-21 01:53:28'),
(9, '2020-10-21', 7, '18:00:00', 2, 1, 2, 400, 0, 400, '2020-10-21 02:00:08', '2020-10-21 02:00:08'),
(10, '2020-10-21', 8, '18:00:00', 2, 1, 2, 400, 0, 400, '2020-10-21 02:01:32', '2020-10-21 02:01:32'),
(11, '2020-10-21', 1, '18:00:00', 2, 2, 2, 200, 0, 200, '2020-10-21 17:20:37', '2020-10-21 17:20:37'),
(12, '2020-10-22', 1, '18:00:00', 11, 2, 1, 200, 0, 200, '2020-10-21 17:22:32', '2020-10-21 17:22:32'),
(13, '2020-10-23', 2, '18:00:00', 2, 1, 1, 400, 0, 400, '2020-10-21 19:30:05', '2020-10-21 19:30:05'),
(14, '2020-10-22', 2, '18:00:00', 2, 1, 1, 400, 0, 400, '2020-10-21 20:13:01', '2020-10-21 20:13:01'),
(15, '2020-10-22', 3, '18:00:00', 2, 1, 2, 400, 90, 40, '2020-10-21 20:38:15', '2020-10-21 20:38:15'),
(16, '2020-10-22', 4, '18:00:00', 3, 1, 1, 400, 26, 296, '2020-10-22 07:54:05', '2020-10-22 07:54:05'),
(17, '2020-10-22', 5, '18:00:00', 2, 1, 2, 400, 21, 316, '2020-10-22 10:21:53', '2020-10-22 10:21:53'),
(18, '2020-10-22', 6, '18:00:00', 2, 1, NULL, 400, 23, 308, '2020-10-22 11:04:12', '2020-10-22 11:04:12'),
(19, '2020-10-22', 7, '18:00:00', 2, 1, NULL, 400, 23, 308, '2020-10-22 11:07:00', '2020-10-22 11:07:00'),
(20, '2020-10-22', 8, '18:00:00', 2, 1, NULL, 400, 99, 4, '2020-10-22 11:10:28', '2020-10-22 11:10:28'),
(21, '2020-10-22', 9, '18:00:00', 2, 1, NULL, 400, 0, 400, '2020-10-22 11:15:18', '2020-10-22 11:15:18'),
(22, '2020-10-22', 10, '18:00:00', 2, 1, NULL, 400, 0, 400, '2020-10-22 11:16:29', '2020-10-22 11:16:29'),
(23, '2020-10-22', 11, '18:00:00', 2, 1, NULL, 400, 0, 400, '2020-10-22 11:17:10', '2020-10-22 11:17:10'),
(24, '2020-10-22', 12, '18:00:00', 2, 1, NULL, 400, 0, 400, '2020-10-22 11:20:26', '2020-10-22 11:20:26'),
(25, '2020-10-22', 13, '18:00:00', 2, 1, NULL, 400, 0, 400, '2020-10-22 11:21:36', '2020-10-22 11:21:36'),
(26, '2020-10-22', 14, '18:00:00', 2, 1, NULL, 400, 0, 400, '2020-10-22 11:21:56', '2020-10-22 11:21:56'),
(27, '2020-10-22', 15, '18:00:00', 2, 1, NULL, 400, 0, 400, '2020-10-22 11:22:12', '2020-10-22 11:22:12'),
(28, '2020-10-22', 16, '18:00:00', 1, 1, NULL, 400, 70, 120, '2020-10-22 13:37:08', '2020-10-22 13:37:08'),
(29, '2020-10-22', 17, '18:00:00', 1, 1, NULL, 400, 70, 120, '2020-10-22 13:38:10', '2020-10-22 13:38:10'),
(30, '2020-10-22', 18, '18:00:00', 3, 1, 5, 400, 0, 400, '2020-10-22 13:46:51', '2020-10-22 13:46:51'),
(31, '2020-10-22', 19, '18:00:00', 3, 1, 5, 400, 0, 400, '2020-10-22 13:49:40', '2020-10-22 13:49:40');

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
(1, 'B-1603229011', 'Mr. Broker', '0198393', NULL, 1, 1, '2020-10-20 21:23:31', '2020-10-20 21:23:31'),
(2, 'B-1603230846', 'Dwewfwr', '2121', NULL, 1, 1, '2020-10-20 21:54:06', '2020-10-20 21:54:06'),
(3, 'B-1603239574', 'Dwefwef', '12312', NULL, 1, 1, '2020-10-21 00:19:34', '2020-10-21 00:19:34'),
(4, 'B-1603244029', 'Jjjj', '1324', NULL, 1, 1, '2020-10-21 01:33:49', '2020-10-21 01:33:49'),
(5, 'B-1603374376', 'Aaaa', '11323', NULL, 1, 1, '2020-10-22 13:46:16', '2020-10-22 13:46:16');

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
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `photo`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Renaissa Hospital', 'admin@gmail.com', NULL, '2020-10-22 18:16:46', '$2y$10$mKNZxGGZ6mmKXFCQesRyDunEuwHX.6v0heSJiK2DhnpL8uSuYtP7m', 'skhu8CWab7S6fM0Iygm15GEbR54PqHGnSzs7sm29MZNqASp3vD55GnONeQQA', '2020-10-22 18:16:46', '2020-10-22 18:16:46'),
(2, 'Omar Faruk', 'web2faruk@gmail.com', NULL, '2020-10-22 18:16:46', '$2y$10$mKNZxGGZ6mmKXFCQesRyDunEuwHX.6v0heSJiK2DhnpL8uSuYtP7m', NULL, '2020-10-22 18:16:46', '2020-10-22 18:16:46'),
(3, 'Mahfuz', 'mahfuz@gmail.com', NULL, NULL, '$2y$10$mKNZxGGZ6mmKXFCQesRyDunEuwHX.6v0heSJiK2DhnpL8uSuYtP7m', NULL, '2020-10-20 20:38:17', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brokers`
--
ALTER TABLE `brokers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brokers_broker_uid_unique` (`broker_uid`),
  ADD UNIQUE KEY `brokers_broker_mobile_unique` (`broker_mobile`),
  ADD KEY `brokers_user_id_foreign` (`user_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_departments_user_id_foreign` (`user_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `pathology_departments_user_id_foreign` (`user_id`);

--
-- Indexes for table `pathology_tests`
--
ALTER TABLE `pathology_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pathology_tests_user_id_foreign` (`user_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_patient_uid_unique` (`patient_uid`),
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `broker_payments`
--
ALTER TABLE `broker_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctor_departments`
--
ALTER TABLE `doctor_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_income_histories`
--
ALTER TABLE `doctor_income_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `doctor_payments`
--
ALTER TABLE `doctor_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1904;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `pathology_departments`
--
ALTER TABLE `pathology_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pathology_tests`
--
ALTER TABLE `pathology_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient_payments`
--
ALTER TABLE `patient_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `patient_tests`
--
ALTER TABLE `patient_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patient_test_invoices`
--
ALTER TABLE `patient_test_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `prescription_tickets`
--
ALTER TABLE `prescription_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `ref_users`
--
ALTER TABLE `ref_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `brokers`
--
ALTER TABLE `brokers`
  ADD CONSTRAINT `brokers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
-- Constraints for table `doctor_departments`
--
ALTER TABLE `doctor_departments`
  ADD CONSTRAINT `doctor_departments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
-- Constraints for table `pathology_departments`
--
ALTER TABLE `pathology_departments`
  ADD CONSTRAINT `pathology_departments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pathology_tests`
--
ALTER TABLE `pathology_tests`
  ADD CONSTRAINT `pathology_tests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
