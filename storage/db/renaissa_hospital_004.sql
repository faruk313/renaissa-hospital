-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 05, 2020 at 11:38 AM
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
(3, 'bba13050-edec-11ea-a8bd-b1ece39a3686', 'ENT', 'Eye', 0, 1, '2020-09-03 13:16:06', '2020-09-03 13:52:40'),
(4, '20a1b2a0-edf0-11ea-baf5-5befee1558dc', 'aaa', 'wdwe', 1, 1, '2020-09-03 13:16:20', '2020-09-03 14:16:58'),
(8, '61bee120-edf7-11ea-a0ae-9984a76f075e', 'ewrwe', NULL, 0, 1, '2020-09-03 13:16:51', '2020-09-03 15:08:54'),
(9, 'c558d870-edec-11ea-9f04-6f7dc3bf63c9', 'Medicine', 'Medicine', 1, 1, '2020-09-03 13:50:55', '2020-09-03 13:52:56'),
(11, 'e03ac760-edf0-11ea-b801-810c771a01c8', 'asdsdfsd', 'sdffwe', 1, 1, '2020-09-03 14:22:19', '2020-09-03 14:22:19'),
(13, '398c8690-edf7-11ea-bae6-a75489a6834b', 'wdrwer', NULL, 1, 1, '2020-09-03 15:07:46', '2020-09-03 15:07:46'),
(14, 'f4523a60-ee7d-11ea-956f-154dbc88273b', 'fererjj', '123124', 1, 1, '2020-09-04 07:12:12', '2020-09-04 07:12:12'),
(15, 'f849d1b0-ee7d-11ea-800f-77b7a227f2b3', 'efsbdgvhb', '1212', 1, 1, '2020-09-04 07:12:19', '2020-09-04 07:12:19'),
(16, 'db7074c0-eed3-11ea-b4a8-51a8c5ebaa7c', 'bjhbhbh', 'buiefbr', 1, 1, '2020-09-04 17:27:07', '2020-09-04 17:27:07'),
(17, 'e4830b80-eed3-11ea-966b-d79c821586c9', '213124', '212', 1, 1, '2020-09-04 17:27:22', '2020-09-04 17:27:22'),
(18, 'e8a7fad0-eed3-11ea-8b51-3bac45efde31', 'dsfd', 'ds', 1, 1, '2020-09-04 17:27:29', '2020-09-04 17:27:29'),
(19, '53438ea0-eed4-11ea-8bd2-a549d4a9b16d', 'ssgsg', 'gdsgdfg', 1, 1, '2020-09-04 17:30:28', '2020-09-04 17:30:28'),
(20, '57ddf060-eed4-11ea-9fed-ab395ed1a4f4', 'fdgdfg', 'fdgfd', 1, 1, '2020-09-04 17:30:36', '2020-09-04 17:30:36'),
(23, '26dbbf40-eed5-11ea-b866-5b5abc4d9db1', 'sasdsf', NULL, 1, 1, '2020-09-04 17:36:23', '2020-09-04 17:36:23'),
(24, '26dbbf80-eed5-11ea-8da0-1dbf1e89f404', 'sasdsf', NULL, 1, 1, '2020-09-04 17:36:23', '2020-09-04 17:36:23'),
(25, '2b634310-eed5-11ea-a6fc-b550e406f4c1', 'ddd', NULL, 1, 1, '2020-09-04 17:36:31', '2020-09-04 17:36:31'),
(26, '2b7e1470-eed5-11ea-b662-d55521d73bfb', 'ddd', NULL, 1, 1, '2020-09-04 17:36:31', '2020-09-04 17:36:31'),
(27, '7b262230-eed5-11ea-99fb-e786db0bdf96', 'erwerwer', NULL, 1, 1, '2020-09-04 17:38:44', '2020-09-04 17:38:44'),
(28, 'b826dd10-eed5-11ea-a1a1-dfdbceb097e9', 'klk;k;l', NULL, 1, 1, '2020-09-04 17:40:27', '2020-09-04 17:40:27'),
(29, 'bae75c90-eed5-11ea-b7e5-234c5746bcce', ';l\'', NULL, 1, 1, '2020-09-04 17:40:31', '2020-09-04 17:40:31'),
(30, 'c0c3cb80-eed5-11ea-be98-efe1fd7dc80f', 'hjhjhj', NULL, 1, 1, '2020-09-04 17:40:41', '2020-09-04 17:40:41'),
(31, 'c45c46a0-eed5-11ea-b9d6-9998b3acec4d', 'jjj', NULL, 1, 1, '2020-09-04 17:40:47', '2020-09-04 17:40:47'),
(32, 'c7c013f0-eed5-11ea-a9a0-8fba7cdf5937', 'jkjiljlj', NULL, 1, 1, '2020-09-04 17:40:53', '2020-09-04 17:40:53'),
(33, 'c9dd1d00-eed5-11ea-8bf4-135b6a61bcef', 'jkljkljk', NULL, 1, 1, '2020-09-04 17:40:57', '2020-09-04 17:40:57'),
(34, 'cd8b3ae0-eed5-11ea-937b-d57f8df065a3', 'jkkkk', NULL, 1, 1, '2020-09-04 17:41:03', '2020-09-04 17:41:03'),
(35, 'cfe53070-eed5-11ea-a6df-c1ff00ce67ce', 'kloliopiop', NULL, 1, 1, '2020-09-04 17:41:07', '2020-09-04 17:41:07'),
(36, 'd230a130-eed5-11ea-8a64-a1b51b0ebe51', 'uiouiouioi', NULL, 1, 1, '2020-09-04 17:41:11', '2020-09-04 17:41:11'),
(37, 'd3e55de0-eed5-11ea-92d3-6f202c51648e', 'ioiuouiouio', NULL, 1, 1, '2020-09-04 17:41:13', '2020-09-04 17:41:13'),
(38, 'e59a40e0-eed5-11ea-a872-213976b5f803', 'werwerwe', 'rwewrtwet', 0, 1, '2020-09-04 17:41:43', '2020-09-04 17:41:43'),
(39, 'fe4e9e20-eed5-11ea-bf70-6be79b0c7892', 'dfsfsd', NULL, 1, 1, '2020-09-04 17:42:25', '2020-09-04 17:42:25'),
(40, '0436d2a0-eed6-11ea-ba6a-7d48b8dd8522', '123123', NULL, 1, 1, '2020-09-04 17:42:34', '2020-09-04 17:42:34'),
(41, '28088ea0-eed6-11ea-a3ad-1bfeef724433', 'frgergerer', NULL, 1, 1, '2020-09-04 17:43:35', '2020-09-04 17:43:35'),
(42, '2b305470-eed6-11ea-8526-0b889db2ff8e', '1212', NULL, 1, 1, '2020-09-04 17:43:40', '2020-09-04 17:43:40'),
(43, 'cfb25590-eed6-11ea-bb6a-ab26a188ac37', 'lll', NULL, 1, 1, '2020-09-04 17:48:16', '2020-09-04 17:48:16'),
(44, 'afd1b8d0-eed7-11ea-bfb7-914f6974b77a', 'fggt', NULL, 1, 1, '2020-09-04 17:54:32', '2020-09-04 17:54:32'),
(45, 'b3b22860-eed7-11ea-bd41-972e75f76266', 'ferfer', NULL, 1, 1, '2020-09-04 17:54:38', '2020-09-04 17:54:38'),
(46, 'b6c8a940-eed7-11ea-ae55-49571ca9df0b', 'erferger tretertr', NULL, 1, 1, '2020-09-04 17:54:44', '2020-09-04 17:54:44'),
(47, '7e3a2930-eed8-11ea-a9c2-6df488fee636', 'jnlnkl', NULL, 1, 1, '2020-09-04 18:00:18', '2020-09-04 18:00:18'),
(48, '80dab850-eed8-11ea-b17b-c5542d16fca5', 'jpojpoj', NULL, 1, 1, '2020-09-04 18:00:23', '2020-09-04 18:00:23'),
(49, '907e0180-eed8-11ea-a481-dd4372f6fc19', ';mkk;m', NULL, 1, 1, '2020-09-04 18:00:49', '2020-09-04 18:00:49');

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
(1, '0c9e7a90-edf2-11ea-bcbc-f1885f12fd3b', 'adsfe', NULL, 0, 1, '2020-09-03 14:29:43', '2020-09-03 14:30:43'),
(2, '146df880-edf2-11ea-9763-333a79fdc2b2', 'sadasdfa', 'asdsf', 0, 1, '2020-09-03 14:29:48', '2020-09-03 14:30:56'),
(3, '04f20700-edf2-11ea-83cc-4d7136ef966b', 'ddwer ewr', 'dwefwer', 1, 1, '2020-09-03 14:29:58', '2020-09-03 14:30:30'),
(4, 'fd6470c0-edf1-11ea-bef2-bd4a7d66e4fc', 'qweqw', NULL, 1, 1, '2020-09-03 14:30:06', '2020-09-03 14:30:18'),
(5, '3b880f90-eed6-11ea-bba7-15e582cb43bc', '1212', '1212', 1, 1, '2020-09-04 17:44:07', '2020-09-04 17:44:07'),
(6, '9d925ea0-eed8-11ea-95bf-732a0a5fc7cf', 'nnno', NULL, 1, 1, '2020-09-04 18:01:11', '2020-09-04 18:01:11'),
(7, '9f842a00-eed8-11ea-9622-dd153f89607d', 'knponp', NULL, 1, 1, '2020-09-04 18:01:14', '2020-09-04 18:01:14'),
(8, 'a20aecc0-eed8-11ea-87a9-335636ca560a', 'nponpon', NULL, 1, 1, '2020-09-04 18:01:18', '2020-09-04 18:01:18'),
(9, 'a3a35e30-eed8-11ea-b186-b7849bd19f0e', 'knppnpon', NULL, 1, 1, '2020-09-04 18:01:21', '2020-09-04 18:01:21'),
(10, 'a4eeec80-eed8-11ea-ba19-8fa7332bc258', 'jopj', NULL, 1, 1, '2020-09-04 18:01:23', '2020-09-04 18:01:23'),
(11, 'a758a7d0-eed8-11ea-a9ea-c7be5f8641a5', 'ojoo', NULL, 1, 1, '2020-09-04 18:01:27', '2020-09-04 18:01:27');

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
(18, '2020_07_27_201411_create_pathology_tests_table', 6),
(19, '2020_08_16_173115_create_test_invoices_table', 7),
(20, '2020_08_20_200748_create_patients_table', 7),
(21, '2020_07_23_192149_create_doctor_departments_table', 8),
(22, '2020_07_23_193008_create_employee_departments_table', 8),
(23, '2020_07_23_193039_create_pathology_departments_table', 8),
(31, '2020_09_02_181145_create_rooms_table', 9);

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
(1, '7e71bc80-edf7-11ea-95de-13124e08ac14', 'asefw', NULL, 1, 1, '2020-09-03 14:15:37', '2020-09-03 15:09:42'),
(2, '1069a970-edf0-11ea-9c4b-017f9548e38c', 'rwerew', 'adfweftw', 0, 1, '2020-09-03 14:15:47', '2020-09-03 14:16:31'),
(3, '14a859c0-edf0-11ea-adaa-71a70dee79f9', 'wewewerwe', 'efwefwr', 1, 1, '2020-09-03 14:15:52', '2020-09-03 14:16:38'),
(4, '432ae000-eed6-11ea-897b-fdf6bcfec544', '12121', '1212', 1, 1, '2020-09-04 17:44:20', '2020-09-04 17:44:20'),
(5, 'ba5d9740-eed8-11ea-a77b-35da348ebf37', '12121 jp', NULL, 1, 1, '2020-09-04 18:01:59', '2020-09-04 18:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `pathology_tests`
--

CREATE TABLE `pathology_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_price` double(8,2) DEFAULT NULL,
  `test_discount` int(11) DEFAULT NULL,
  `test_time` int(11) DEFAULT NULL,
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

INSERT INTO `pathology_tests` (`id`, `uuid`, `test_code`, `test_name`, `test_price`, `test_discount`, `test_time`, `test_room`, `test_status`, `test_suggestion`, `user_id`, `created_at`, `updated_at`) VALUES
(39, '209c2700-dd4a-11ea-a0ba-d3e7a3e8e538', 'Serum Lipid Profile', 'Serum Lipid Profile (Fasting)', 100.00, 12, 1, '203', 1, NULL, 1, '2020-08-11 13:17:50', '2020-08-13 09:48:23'),
(42, 'e36459c0-dd49-11ea-9272-a9ad384d606a', 'Blood Suger', 'Blood Suger (Fastimg And 2 Hour ABF)', 200.00, 11, 0, '203', 1, NULL, 1, '2020-08-13 05:44:30', '2020-08-13 09:46:40'),
(44, 'a462ca00-dd49-11ea-b3a8-87f8e92d2a38', 'CBC', 'Complete Blood Count', 150.00, 0, 1, '203', 1, NULL, 1, '2020-08-13 09:40:05', '2020-08-13 09:44:54'),
(47, '7d65ed60-dd4a-11ea-b011-a13806fe9de7', 'ECG', 'ECG', 5000.00, 10, 1, '203', 1, NULL, 1, '2020-08-13 09:50:58', '2020-08-13 09:50:58'),
(48, '0dc5dea0-ee89-11ea-b361-8d21f4b7ced1', 'cdsfd', 'Fsfs Dsfsdgsr', 121.00, 11, 11, '12312', 1, NULL, 1, '2020-09-04 08:31:39', '2020-09-04 08:31:39'),
(49, '48072350-ee89-11ea-a480-1327a737996d', 'jhbhj jibuib', 'Gugug Ohoih', 700.00, 22, 1, '222', 0, 'hoh iohhj gmmgm', 1, '2020-09-04 08:32:11', '2020-09-04 08:33:17'),
(50, 'af40dc40-eed6-11ea-a452-b7ad7462070b', 'sawrdwer', 'Erwer', 2132.00, 11, 3, '12312', 1, 'dsfd sdffr', 1, '2020-09-04 17:47:21', '2020-09-04 17:47:21'),
(51, 'b7eba120-eed6-11ea-9473-abd3ce57ca5b', 'wrwerwe', 'Werwe', 1221.00, 22, 2, '222', 1, 'dfsdfsd', 1, '2020-09-04 17:47:36', '2020-09-04 17:47:36');

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
(12, 'bd5051f0-ef64-11ea-96bf-85da4d57de93', 'Feretrt', '324', 12, 1, 'deferf eftertert', 1, 1, '2020-09-05 10:44:14', '2020-09-05 10:44:14');

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
(1, 'b3391550-ef6a-11ea-9978-796db9ec1b43', 'test_com', 'Pathology Test Commission', 0.00, 0, 1, '2020-07-22 23:08:11', '2020-09-05 11:26:54'),
(2, 'b6b6ff30-ef6a-11ea-b164-5decd373da73', 'const_com', 'Consultancy Ref. Commission', 0.00, 0, 1, '2020-07-15 23:09:27', '2020-09-05 11:26:59');

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
(4, 'f093d120-edf2-11ea-b9d5-c10cbf356a04', 'Pathology', '444', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2020-09-02 13:41:55', '2020-09-03 14:37:06'),
(8, 'ec8882c0-edf2-11ea-aa03-170348f3be39', 'Pathology', '12312', 'asdasdas afsfafa fsd f sd fsd fsdf', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2020-09-02 13:48:28', '2020-09-03 14:36:59'),
(18, 'b76072e0-edcf-11ea-b888-9137377eac4e', 'Patient', '11313', NULL, 0, 1, 1212, 'VIP', 'AC', 'Double', NULL, 1, '2020-09-03 07:05:41', '2020-09-03 10:24:57'),
(21, '51eaaaf0-ede4-11ea-a78b-f91d5f4d0dc8', 'Patient', '2100', 'dfjewofjiw', 1, 1, 21212, 'VIP', 'AC', 'Shared', NULL, 1, '2020-09-03 10:12:02', '2020-09-03 12:52:27'),
(22, '35013280-edda-11ea-ac2c-77d17f0e0431', 'Doctor', '1312', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2020-09-03 11:40:03', '2020-09-03 11:40:03'),
(23, '3b762af0-edda-11ea-ad5b-fd2dc4531d98', 'Employee', '312412', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2020-09-03 11:40:14', '2020-09-03 11:40:14'),
(24, 'f687b0c0-edf2-11ea-9d51-b7fa8738ac85', 'Pathology', '222', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2020-09-03 13:18:01', '2020-09-03 14:37:16'),
(25, 'ec9571a0-ede7-11ea-824e-4b62a4b77e1b', 'Doctor', 'ddfdsfsd', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2020-09-03 13:18:15', '2020-09-03 13:18:15'),
(26, '0e4d7600-ee88-11ea-b906-17bd458f8fee', 'Patient', 'asda', 'asdf', 1, 0, 221, 'VIP', 'AC', 'Single', NULL, 1, '2020-09-03 13:25:27', '2020-09-04 08:24:31'),
(27, 'afe45df0-eed3-11ea-85f3-b9063174db00', 'Pathology', '112', '1212', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2020-09-04 17:25:54', '2020-09-04 17:25:54'),
(28, 'ba8a12d0-eed3-11ea-9b98-37c7ecd4420c', 'Doctor', '1212', '1212121', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2020-09-04 17:26:12', '2020-09-04 17:26:12'),
(29, 'c501a780-eed8-11ea-b82d-498c60b5d4a3', 'Doctor', 'nini', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2020-09-04 18:02:17', '2020-09-04 18:02:17');

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
(1, 'Super Admin', 'admin@gmail.com', NULL, '$2y$10$o6ZSFCAJQMChm40Z0vR07up5mVvwqqCDSUy/zz48UUGo9mwFqmik2', '9zCrtiUOlRitOEBBjzWutQCmcsiJSW6NWiir7eTnWs3xoCXeoapTFxeb7amZ', '2020-02-16 04:20:52', '2020-02-16 04:20:52'),
(2, 'Omar Faruk', 'web2faruk@gmail.com', NULL, '$2y$10$njgptwbm7etSuHY5F3wuIeqTio3U4E0JCPd56ygXFDqO3DmzktgFa', NULL, '2020-02-16 04:26:36', '2020-02-16 04:26:36');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `doctor_departments`
--
ALTER TABLE `doctor_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `employee_departments`
--
ALTER TABLE `employee_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pathology_departments`
--
ALTER TABLE `pathology_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pathology_tests`
--
ALTER TABLE `pathology_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
