-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 09, 2020 at 12:44 PM
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
(5, 'doc1599472652', 2, 300, 300, 200, 200, NULL, 0, 'dr. abc xyz abc xyz', 'xyz1@gmail.com', '123', 'doctor_1599588050.png', 9, 28, '2001-09-07', 1, 'mbbs', 'dhaka', 'dhaka', 'cmc', 'doc', 'ctg', '2020-09-07', 1, 1, 'from 10am to 5pm', 1, '2020-09-07 09:57:32', '2020-09-09 07:52:26'),
(6, 'doc1599472683', 1, 500, NULL, 300, NULL, 30000, 0, 'Dr. A.Rohim', 'rohim@gmail.com', '21133', 'doctor_1599638100.png', 9, 28, '1998-09-09', 1, 'mbbs', 'khulna', 'dhaka', 'kmc', 'dr.', 'khulna', '2020-09-09', 1, 0, 'leave for 5 days', 1, '2020-09-07 09:58:03', '2020-09-09 07:55:48'),
(10, 'doc1599473494', 1, 300, NULL, 200, NULL, 40000, 0, 'Dr. xyz', 'xyz@gmail.com', '01232313', 'doctor_1599587945.jpg', 1, 28, '2000-09-07', 1, 'mbbs', NULL, NULL, NULL, NULL, NULL, '2020-09-07', 1, 1, 'leave for 5 days', 1, '2020-09-07 10:11:34', '2020-09-08 18:10:45'),
(11, 'doc1599488821', 3, 500, NULL, 200, NULL, 30000, 0, 'Omar Faruk', NULL, '01611425480', 'doctor_1599488821.png', 1, 22, '2010-09-07', 0, 'MBBS', NULL, NULL, NULL, NULL, NULL, '2020-09-07', 1, 0, 'till 12-09-2020', 1, '2020-09-07 14:27:01', '2020-09-09 10:31:28'),
(12, 'doc1599489859', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Dr. Abul Kalam Azad', NULL, NULL, 'doctor_1599588597.jpg', 1, 22, '2020-09-07', 1, 'MBBS', NULL, NULL, NULL, NULL, NULL, '2020-09-07', 1, 1, NULL, 1, '2020-09-07 14:44:19', '2020-09-08 18:09:57'),
(14, 'doc1599568292', 2, 200, 200, 100, 50, NULL, 0, 'Dr. abc', 'abc@gmail.com', '01611426599', 'doctor_1599587833.png', 1, 25, '1990-08-17', 1, 'MBBS,DU', 'Dhaka', 'Dhaka', 'DMC', 'Asst. Pro.', 'Dhaka', '2020-09-01', 1, 1, '12pm to 4pm', 1, '2020-09-08 09:59:07', '2020-09-09 09:34:06'),
(15, 'doc1599644197', 3, 300, NULL, 300, NULL, 15000, 1, 'Dr. xyz', 'xyz123@gmailcom', '01611425480', 'doctor_1599644197.png', 2, 28, '1990-08-17', 1, 'MBBS', 'dhaka', 'dhaka', 'dmc', 'pro.', 'dhaka', '2020-09-01', 1, 1, '12pm - 6pm', 1, '2020-09-09 09:36:37', '2020-09-09 09:36:37'),
(16, 'doc1599645500', 1, 400, NULL, 200, NULL, 50000, 1, 'Dr. abc', 'asd@gmail.com', '12131', 'doctor_1599645500.jpg', 9, 22, '1990-08-17', 1, 'mbbs', 'dhaka', 'dhaka', 'dmc', 'ass. pro.', 'dhaka', '2020-09-09', 1, 1, '10am 5pm', 1, '2020-09-09 09:58:20', '2020-09-09 09:58:20'),
(17, 'doc1599646537', 2, 500, 500, 300, 200, NULL, 1, 'Maj. Gen. Dr. H.R. Harun (Retd.)', NULL, NULL, 'doctor_1599646537.png', 51, 25, '1990-08-17', 1, 'MBBS, FCPS, FRCS (Edin), FRCS (Glasgow), FWHO (Urology), D. Uro. (London), Urologist', 'South Banasree, Khilgoan, Dhaka-1219', 'South Banasree, Khilgoan, Dhaka-1219', 'Dhaka Medical College', 'Pro.', 'Dhaka', '2020-09-09', 1, 1, 'available 12pm to 4pm', 1, '2020-09-09 10:15:37', '2020-09-09 10:27:52'),
(18, 'doc1599648329', 2, 200, 200, 200, 150, NULL, 0, 'Dr. Abcd', NULL, NULL, 'doctor_1599648980.jpg', 1, 22, '1990-08-17', 1, 'MBBS', 'dhaka', 'dhaka', NULL, NULL, NULL, '2020-09-01', 1, 1, '12pm 6pm', 1, '2020-09-09 10:45:29', '2020-09-09 10:59:57');

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
(50, 'a83a1e40-f284-11ea-9ab4-4bd58c19b580', 'Gastroenterology & Obstetrics', NULL, 1, 1, '2020-09-09 10:07:48', '2020-09-09 10:10:16'),
(51, '57833410-f284-11ea-8242-2f47c7428e86', 'Urologist', NULL, 1, 1, '2020-09-09 10:08:00', '2020-09-09 10:08:00'),
(52, '63b944a0-f284-11ea-a580-c952a6c691e3', 'Cardiologist', NULL, 1, 1, '2020-09-09 10:08:21', '2020-09-09 10:08:21'),
(53, '6d634aa0-f284-11ea-ab2b-d5691c39f439', 'Chest & Medicine', NULL, 1, 1, '2020-09-09 10:08:37', '2020-09-09 10:08:37'),
(54, '7e12c9c0-f284-11ea-a31d-fd6afac76beb', 'Pediactrics', NULL, 1, 1, '2020-09-09 10:09:05', '2020-09-09 10:09:05');

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
(20, '2020_08_20_200748_create_patients_table', 7),
(21, '2020_07_23_192149_create_doctor_departments_table', 8),
(22, '2020_07_23_193008_create_employee_departments_table', 8),
(23, '2020_07_23_193039_create_pathology_departments_table', 8),
(31, '2020_09_02_181145_create_rooms_table', 9),
(36, '2020_09_06_193624_create_doctors_table', 10),
(38, '2020_07_27_201411_create_pathology_tests_table', 11);

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
(1, 'pt100200', 'TC, DC, HB%, ESR', 350.00, 0, 0, 1, '102', 1, NULL, 1, '2020-09-09 12:15:58', '2020-09-09 12:39:19'),
(2, 'pt100201', 'TC DC', 180.00, 0, 0, 1, '102', 1, NULL, 1, '2020-09-09 12:39:54', '2020-09-09 12:39:54'),
(3, 'pt100300', 'ESR', 150.00, 0, 10, 1, '102', 1, NULL, 1, '2020-09-09 12:40:26', '2020-09-09 12:40:26'),
(5, 'pt100204', 'Malarial Parasite (M.P)', 250.00, 20, 20, 2, '222', 1, NULL, 1, '2020-09-09 12:41:59', '2020-09-09 12:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_age` int(11) NOT NULL,
  `patient_gender` tinyint(1) NOT NULL DEFAULT '1',
  `patient_address` longtext COLLATE utf8mb4_unicode_ci,
  `patient_status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `uuid`, `patient_name`, `patient_mobile`, `patient_age`, `patient_gender`, `patient_address`, `patient_status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'e9795380-edf7-11ea-be88-0d514dfe7000', 'Omar Faruk', '01611425480', 30, 0, 'Dhaka', 1, 2, '2020-08-20 14:38:04', '2020-09-03 15:12:41'),
(2, 'fe2b4d70-e2f2-11ea-8b0b-53557a1cbd9b', 'MD. Omar Faruk', '01911425480', 30, 0, 'Dhaka', 0, 1, '2020-08-20 14:39:46', '2020-08-20 14:39:46'),
(11, 'ea46cea0-ec3d-11ea-b647-b9c2dc95389c', 'Omar Faruk', '312412', 33, 0, 'dhaka', 1, 1, '2020-09-01 09:57:41', '2020-09-01 10:28:45'),
(12, 'bd5051f0-ef64-11ea-96bf-85da4d57de93', 'Feretrt', '324', 12, 1, 'deferf eftertert', 1, 1, '2020-09-05 10:44:14', '2020-09-05 10:44:14'),
(13, '63b3c340-ef72-11ea-ad26-4dfd9d3f33d3', 'Dafdas', '21313', 12, 1, 'dsff', 1, 1, '2020-09-05 12:21:56', '2020-09-05 12:21:56');

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
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `reserved` tinyint(1) NOT NULL DEFAULT '0',
  `charge` int(11) DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `uuid`, `room_type`, `code`, `note`, `status`, `reserved`, `charge`, `category`, `type`, `size`, `capacity`, `user_id`, `created_at`, `updated_at`) VALUES
(4, '26df0d40-f27c-11ea-8ee7-33242665bbce', 'Pathology', '301', 'x-ray room', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2020-09-02 13:41:55', '2020-09-09 09:09:23'),
(8, '1a1221e0-f27c-11ea-8582-996b399cfa5e', 'Pathology', '102', 'Sample Collection Room', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2020-09-02 13:48:28', '2020-09-09 09:09:01'),
(18, '0ad24a10-f27c-11ea-a4c9-93596e50dceb', 'Patient', '601', NULL, 0, 1, 3000, 'VIP', 'AC', 'Shared', NULL, 1, '2020-09-03 07:05:41', '2020-09-09 09:08:35'),
(21, '00062660-f27c-11ea-ae8a-f936728a886b', 'Patient', '602', NULL, 1, 1, 2000, 'VIP', 'AC', 'Shared', NULL, 1, '2020-09-03 10:12:02', '2020-09-09 09:08:17'),
(22, 'ecc83690-f27b-11ea-9c81-c36bcfce04a0', 'Doctor', '204', 'General Chamber', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2020-09-03 11:40:03', '2020-09-09 09:07:45'),
(23, 'f49d6650-f27b-11ea-be23-c7f0efa357c9', 'Employee', '101', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2020-09-03 11:40:14', '2020-09-09 09:07:58'),
(24, 'f687b0c0-edf2-11ea-9d51-b7fa8738ac85', 'Pathology', '222', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2020-09-03 13:18:01', '2020-09-03 14:37:16'),
(25, '9e8f0e40-f27b-11ea-8964-8f47029aefa4', 'Doctor', '203', 'Eye Checkup Chamber', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2020-09-03 13:18:15', '2020-09-09 09:05:34'),
(26, '8edda2e0-f27b-11ea-88c0-57d7fc2cb5e8', 'Patient', '501', 'general', 1, 0, 500, 'VIP', 'AC', 'Double', NULL, 1, '2020-09-03 13:25:27', '2020-09-09 09:05:08'),
(27, 'afe45df0-eed3-11ea-85f3-b9063174db00', 'Pathology', '112', '1212', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2020-09-04 17:25:54', '2020-09-04 17:25:54'),
(28, '7a99b150-f27b-11ea-a0c5-e3c812b4c003', 'Doctor', '202', 'General Chamber', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2020-09-04 17:26:12', '2020-09-09 09:04:34'),
(29, '71b2de80-f27b-11ea-8c8a-99d77a4ac991', 'Doctor', '201', 'General Chamber', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2020-09-04 18:02:17', '2020-09-09 09:04:19');

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
(1, 'Super Admin', 'admin@gmail.com', NULL, '$2y$10$o6ZSFCAJQMChm40Z0vR07up5mVvwqqCDSUy/zz48UUGo9mwFqmik2', 'zWymLnKEkchYCvxzrcE9Ychxto1UMQOsL3IkC63wCx9Q6GLjI38UbIAj7ZqV', '2020-02-16 04:20:52', '2020-02-16 04:20:52'),
(2, 'Omar Faruk', 'web2faruk@gmail.com', NULL, '$2y$10$njgptwbm7etSuHY5F3wuIeqTio3U4E0JCPd56ygXFDqO3DmzktgFa', NULL, '2020-02-16 04:26:36', '2020-02-16 04:26:36');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `employee_departments`
--
ALTER TABLE `employee_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_commissions`
--
ALTER TABLE `ref_commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `doctor_departments`
--
ALTER TABLE `doctor_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `employee_departments`
--
ALTER TABLE `employee_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `pathology_departments`
--
ALTER TABLE `pathology_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pathology_tests`
--
ALTER TABLE `pathology_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ref_commissions`
--
ALTER TABLE `ref_commissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `test_invoices`
--
ALTER TABLE `test_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
