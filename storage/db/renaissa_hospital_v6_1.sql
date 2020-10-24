-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 23, 2020 at 02:10 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(11, 'doc1599488821', 3, 500, NULL, 200, NULL, 30000, 0, 'Omar Faruk', NULL, '01611425480', 'doctor_1599488821.png', 1, 22, '2010-09-07', 0, 'MBBS', NULL, NULL, NULL, NULL, NULL, '2020-09-07', 1, 1, 'till 12-09-2020', 1, '2020-09-07 14:27:01', '2020-09-13 17:44:34'),
(12, 'doc1599489859', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Dr. Abul Kalam Azad', NULL, NULL, 'doctor_1599588597.jpg', 1, 22, '2020-09-07', 1, 'MBBS', NULL, NULL, NULL, NULL, NULL, '2020-09-07', 1, 1, NULL, 1, '2020-09-07 14:44:19', '2020-09-08 18:09:57'),
(14, 'doc1599568292', 2, 200, 200, 100, 50, NULL, 0, 'Dr. abc', 'abc@gmail.com', '01611426599', 'doctor_1599587833.png', 1, 25, '1990-08-17', 1, 'MBBS,DU', 'Dhaka', 'Dhaka', 'DMC', 'Asst. Pro.', 'Dhaka', '2020-09-01', 1, 1, '12pm to 4pm', 1, '2020-09-08 09:59:07', '2020-09-09 09:34:06'),
(16, 'doc1599645500', 1, 400, NULL, 200, NULL, 50000, 1, 'Dr. abc', 'asd@gmail.com', '12131', 'doctor_1599645500.jpg', 9, 22, '1990-08-17', 1, 'mbbs', 'dhaka', 'dhaka', 'dmc', 'ass. pro.', 'dhaka', '2020-09-09', 1, 1, '10am 5pm', 1, '2020-09-09 09:58:20', '2020-09-09 09:58:20'),
(17, 'doc1599646537', 2, 500, 500, 300, 200, NULL, 1, 'Maj. Gen. Dr. H.R. Harun (Retd.)', NULL, NULL, 'doctor_1599646537.png', 51, 25, '1990-08-17', 1, 'MBBS, FCPS, FRCS (Edin), FRCS (Glasgow), FWHO (Urology), D. Uro. (London), Urologist', 'South Banasree, Khilgoan, Dhaka-1219', 'South Banasree, Khilgoan, Dhaka-1219', 'Dhaka Medical College', 'Pro.', 'Dhaka', '2020-09-09', 1, 1, 'available 12pm to 4pm', 1, '2020-09-09 10:15:37', '2020-09-09 10:27:52'),
(18, 'doc1599648329', 2, 200, 200, 200, 150, NULL, 0, 'Dr. Abcd', NULL, NULL, 'doctor_1599648980.jpg', 1, 22, '1990-08-17', 1, 'MBBS', 'dhaka', 'dhaka', NULL, NULL, NULL, '2020-09-01', 1, 1, '12pm 6pm', 1, '2020-09-09 10:45:29', '2020-09-09 10:59:57'),
(19, 'doc1599655669', 2, NULL, 300, 200, 100, NULL, 1, 'Prof. Dr. Zahid Hossain', NULL, NULL, 'doctor_1599655669.png', 54, 25, '1990-08-17', 1, 'MBBS, FCPS, Specialist-Paediatric Cardiology', NULL, NULL, NULL, NULL, NULL, '2020-09-09', 1, 1, '4pm to 10pm', 1, '2020-09-09 12:47:49', '2020-09-09 12:48:15'),
(20, 'doc1599979885', 1, 200, NULL, 100, NULL, 10000, 0, 'Abc Abc', NULL, '121131', 'doctor_1599980106.png', 53, 22, '1990-08-17', 1, 'Mbbs', NULL, NULL, NULL, NULL, NULL, '2020-09-13', 1, 1, 'leave for 5 days', 1, '2020-09-13 06:51:25', '2020-09-13 17:44:25'),
(21, 'doc1600011645', 4, NULL, NULL, NULL, NULL, NULL, 1, 'Outside Doctor Name One', NULL, NULL, NULL, NULL, NULL, '1990-08-17', 1, 'Mbbs', NULL, NULL, NULL, NULL, NULL, '2020-09-13', 1, 1, NULL, 1, '2020-09-13 15:40:45', '2020-09-13 15:40:45'),
(22, 'doc20200001', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Doc23', NULL, '14234', 'doctor_1600325691.png', 9, 29, '1990-08-17', 1, 'Adfadfd', NULL, NULL, NULL, NULL, NULL, '2020-09-17', 1, 1, NULL, 1, '2020-09-17 06:54:52', '2020-09-17 06:54:52'),
(23, 'doc1600325815', 1, 1312312, NULL, 1312, NULL, 12312, 1, 'Doctor Name', NULL, '01611425480', NULL, 47, 25, '1990-08-17', 1, 'Mbbs', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'hgh', 1, '2020-09-17 06:56:55', '2020-09-17 13:35:35'),
(24, 'doc1600441918', 2, NULL, NULL, NULL, NULL, NULL, 1, 'Dasdas', NULL, NULL, NULL, NULL, NULL, '1990-08-17', 1, 'Adasd', NULL, NULL, NULL, NULL, NULL, '2020-09-18', 1, 1, NULL, 1, '2020-09-18 15:11:58', '2020-09-18 15:11:58'),
(25, 'dc1600682834', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Dasdf', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'adsdda', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, '2020-09-21 10:07:14', '2020-09-21 10:07:14'),
(26, 'dc1600682835', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Dasdf', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'adsdda', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, '2020-09-21 10:07:15', '2020-09-21 10:07:15'),
(27, 'dc1600682913', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Asd', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'ssdfd', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, '2020-09-21 10:08:33', '2020-09-21 10:08:33'),
(28, 'dc1600682932', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Dr. Omar Faruk', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'abc', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, '2020-09-21 10:08:52', '2020-09-21 10:08:52'),
(29, 'dc1600683006', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Dsdafd', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'ddarf', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, '2020-09-21 10:10:06', '2020-09-21 10:10:06'),
(30, 'dc1600683184', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Dsffdfd', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'dedwefw', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, '2020-09-21 10:13:04', '2020-09-21 10:13:04'),
(31, 'dc1600683371', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Maj. Gen. Dr. H.R. Harun (Retd.)', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'MBBS', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, '2020-09-21 10:16:11', '2020-09-21 10:16:11'),
(32, 'dc1600684593', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Ddwefwe', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'adwefwr', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, '2020-09-21 10:36:33', '2020-09-21 10:36:33'),
(33, 'dc1600684967', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Try6rh5', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'tty56y', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, '2020-09-21 10:42:47', '2020-09-21 10:42:47'),
(34, 'dc1600688985', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Df', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'ffer', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, '2020-09-21 11:49:45', '2020-09-21 11:49:45'),
(35, 'DOC1600690624', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Sfsdfs', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'edefew', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, '2020-09-21 12:17:04', '2020-09-21 12:17:04'),
(36, 'DOC1600690815', 4, NULL, NULL, NULL, NULL, NULL, 0, 'Csdsd', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'sdad', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, '2020-09-21 12:20:15', '2020-09-21 12:20:15');

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
(21, '2020_07_23_192149_create_doctor_departments_table', 8),
(22, '2020_07_23_193008_create_employee_departments_table', 8),
(23, '2020_07_23_193039_create_pathology_departments_table', 8),
(31, '2020_09_02_181145_create_rooms_table', 9),
(36, '2020_09_06_193624_create_doctors_table', 10),
(38, '2020_07_27_201411_create_pathology_tests_table', 11),
(40, '2020_08_20_200748_create_patients_table', 12),
(41, '2020_09_20_202054_create_ref_users_table', 13),
(45, '2020_09_23_010114_create_prescription_tickets_table', 14),
(47, '2020_09_23_175039_create_patient_payments_table', 15);

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
(1, 'pt100200', 'TC, DC, HB%, ESR', 350.00, 0, 0, 5, '102', 1, NULL, 1, '2020-09-09 12:15:58', '2020-09-17 17:43:33'),
(2, 'pt100201', 'TC DC', 180.00, 0, 0, 1, '102', 1, NULL, 1, '2020-09-09 12:39:54', '2020-09-09 12:39:54'),
(3, 'pt100300', 'ESR', 150.00, 0, 10, 10, '102', 1, NULL, 1, '2020-09-09 12:40:26', '2020-09-17 17:29:59'),
(5, 'pt100204', 'Malarial Parasite (M.P)', 250.00, 20, 20, 2, '222', 1, NULL, 1, '2020-09-09 12:41:59', '2020-09-09 12:41:59'),
(6, 'pt200200', 'Abc Xyz', 300.00, 12, 30, 3, '301', 1, NULL, 1, '2020-09-17 11:41:42', '2020-09-17 17:43:26'),
(7, 'pt210101', 'Xyz', 132.00, 14, 10, 4, '102', 1, NULL, 1, '2020-09-17 12:07:35', '2020-09-17 17:43:20'),
(8, 'PT201312', 'Pathology Test One', 3000.00, 10, 20, 30, '112', 1, NULL, 1, '2020-09-21 12:34:18', '2020-09-21 12:34:18');

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
(7, 'p49213152', 'Miss Hilma Mayer', '1-546-320-4143', 85, 0, '809 Crist Green Apt. 994\nBergstromfurt, CO 74839', 'Harum esse illo beatae labore.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(8, 'p88822796', 'Mr. Eli Sauer', '315.566.6571 x804', 88, 1, '43110 Leffler Dale\nPort Juliet, ND 01970-5621', 'Autem maiores cum est ad aut sint.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(9, 'p33807843', 'Prof. Jenifer Hegmann I', '262-517-7718 x780', 99, 0, '36265 Archibald Square\nNorth Francesfort, WV 53634', 'Aut deleniti sapiente aut.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(10, 'p9772555', 'Jodie Daniel', '1-358-574-6160 x721', 92, 1, '647 Turcotte Mill Suite 153\nCaylaborough, NE 33493-5705', 'Sunt illum et in et ducimus earum deleniti.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(11, 'p26007250', 'Kirsten Bogan', '(582) 849-1447', 75, 1, '9644 Fay Road\nEast Wilsonport, WV 33726-9970', 'Sit dolores quisquam quo enim eius.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(12, 'p85230556', 'Mr. Amos Runolfsson III', '1-526-286-6957 x897', 44, 0, '17224 Carolina Dam\nTracyburgh, MO 00388', 'Omnis labore quas in qui quasi beatae mollitia.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(13, 'p43530232', 'Frankie Weissnat', '434.868.8406', 63, 0, '5381 Rath Avenue Suite 481\nNorth Etha, WA 69901', 'Vel sunt odit qui ea.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(14, 'p25394503', 'Mylene Blick', '378.296.1428 x42322', 0, 0, '47274 Bennie Manors Apt. 265\nLake Adonis, AK 73137-0165', 'Aut quos sit temporibus.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(15, 'p60920676', 'Eliane Howell', '01611425011', 90, 0, '55997 Mills PlainGutmannchester, GA 59796', 'Voluptas distinctio dolores deserunt.', 0, 1, '2020-09-20 10:37:50', '2020-09-21 12:31:52'),
(16, 'p81552142', 'Prof. Monica Kessler', '(802) 371-3355 x8097', 59, 0, '643 Stamm Rapids Apt. 499\nNew Suzanne, WV 55411-9078', 'Mollitia quia id expedita enim aut.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
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
(74, 'p25355593', 'Jayde Sanford', '(242) 909-4979 x00378', 34, 1, '442 Sonya Station\nWalshfort, NV 43562-3162', 'At temporibus quia ut.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(75, 'p2491146', 'Prof. Dusty Von', '226.956.9874 x3285', 88, 0, '16545 Sandra Loop\nNew Lorine, MS 09149', 'Eius aut minus quas dolor impedit consequatur.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(76, 'p32496476', 'Ms. Joyce Tromp DDS', '247-951-7591 x169', 83, 0, '343 Savanah Tunnel\nNorth Kurtisbury, WA 10959-0242', 'Non ad error sed dolore ratione.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(77, 'p92564354', 'Stefanie Hegmann', '804-244-9785', 31, 1, '35068 Harris Prairie Apt. 872\nJuvenalfort, CO 53509-4643', 'Occaecati officiis aut aut at.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(78, 'p75463417', 'Reyes Dicki', '(658) 215-5559 x334', 74, 1, '8374 Rath Road Apt. 426\nNorth Elmer, VA 48583', 'Quas qui totam est molestias.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(79, 'p51079749', 'Francisca Stroman', '(430) 927-1435 x03314', 43, 0, '3767 Bernier Center Apt. 036\nHubertfurt, MA 27935', 'Dolorum impedit eaque error delectus laborum.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(80, 'p80971074', 'Prof. Lane Feil DVM', '+14385807184', 30, 0, '87761 Althea Prairie\nCristton, MO 34960', 'Nobis qui rerum ipsam dolores ut velit.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(81, 'p20892778', 'Stephen Conn', '1-749-289-5536 x99315', 47, 0, '788 Stoltenberg Springs Suite 698\nChaimtown, ID 81267', 'Repellat ut aut vel harum voluptatibus.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(82, 'p81590469', 'Mireille Botsford', '978-633-2677 x1647', 8, 1, '3605 Runolfsson View Apt. 208\nNew Barrettstad, TN 97462', 'Laborum ut quo aut provident sit.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(83, 'p66563225', 'Kristoffer Nolan', '419-322-8968 x77665', 56, 1, '157 Mertz Grove Apt. 901\nEast Devonte, PA 23733', 'Accusamus ex vel id recusandae est.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(84, 'p22151715', 'Garnett Willms Sr.', '713.946.0355 x0850', 57, 0, '98331 Duncan Branch\nLake Coleman, LA 05924', 'Et est officia iste sapiente vel quo.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(85, 'p96739333', 'Ramon Denesik', '254-806-4171', 3, 0, '84578 Hill Skyway\nMoorehaven, DE 38457-5007', 'Debitis qui at minus qui non doloribus vitae et.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(86, 'p69757930', 'Anibal Gusikowski MD', '1-486-449-2740 x20209', 38, 1, '85948 Walsh Streets Suite 079\nMurphyberg, IL 97252-4033', 'Est sapiente voluptatem non hic.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(87, 'p50662556', 'Johnathon McClure IV', '(758) 933-3112 x93119', 15, 1, '69845 Denesik Lock Suite 909\nKelsieville, UT 59969', 'Sunt iste laborum provident qui laboriosam.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(88, 'p94859028', 'Litzy Rau', '1-571-238-3060', 63, 1, '7308 Kitty Knolls\nSouth Kellyfurt, NM 00821', 'In impedit enim dolorem fuga natus est qui.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(89, 'p33386358', 'Prof. Rylan Marquardt PhD', '(372) 787-9117 x300', 46, 1, '52824 Legros Bridge Apt. 704\nKuhnberg, GA 54426', 'Eius consequatur fuga sit neque consequatur.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(90, 'p59461091', 'Velma Parker', '+1-520-960-7836', 11, 1, '207 Maggio Tunnel Suite 394\nNorth Audra, MT 05202-7029', 'Aut officiis voluptate est molestiae sapiente.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(91, 'p2901133', 'Mr. Mack Konopelski V', '+1 (772) 922-1328', 34, 1, '219 Shanahan Mill Suite 802\nPort Angie, MN 69729', 'Vel fugit sunt et nulla.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(92, 'p36353002', 'Jonatan Romaguera', '(797) 966-1493 x01626', 22, 1, '64033 Francisco Landing\nSengerburgh, MS 64644', 'Sunt dignissimos et non qui voluptatem et.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(93, 'p88517369', 'Elizabeth Rowe', '952.379.0080 x9657', 36, 1, '693 Daugherty Greens\nSouth Naomichester, NJ 99217', 'Dolore velit aliquid magni voluptatem.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(94, 'p10018395', 'Dr. Orland Gleason IV', '723.780.1221', 83, 0, '43210 Jessica Rapid\nSouth Ken, TX 54418', 'Sint qui quae quia molestiae accusantium minus.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(95, 'p90150067', 'Hailee Christiansen', '01611425000', 20, 1, '53164 Perry Knoll Suite 955West Wadetown, WI 98692-8451', 'Error iste voluptas sint.', 1, 1, '2020-09-20 10:37:50', '2020-09-21 12:29:10'),
(96, 'p7273483', 'Krista Roberts', '+18343108890', 41, 0, '9360 Jimmy Pass Suite 712\nSouth Edward, VT 95191', 'Atque maxime et cupiditate placeat.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(97, 'p35367690', 'Mr. Cristopher Gleason', '661-323-4496 x688', 23, 0, '3028 Shields Junctions\nVicenteland, PA 03273', 'Et nihil voluptatum quia non.', 1, 2, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(98, 'p53739959', 'Dexter Schowalter V', '(826) 906-9196 x8815', 27, 1, '76352 Mona Harbors\nVallieborough, GA 52675-3910', 'Molestiae aut esse harum dolore exercitationem.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(99, 'p65971328', 'Dr. Zachary Steuber', '1-443-747-7193', 97, 1, '75540 Darron Points Apt. 052\nSouth Jerad, NY 64697', 'Cupiditate dolores nihil autem error quae.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(100, 'p7707585', 'Gustave Schoen PhD', '494-281-3657', 72, 1, '509 Ward Cape\nPort Luisburgh, WY 06595-1135', 'In illo occaecati autem eum sit.', 1, 1, '2020-09-20 10:37:50', '2020-09-20 10:37:50'),
(102, 'RHP1600689563', 'Miss Baby', '01611425101', 22, 1, NULL, 'sfsfd', 1, 1, '2020-09-21 11:59:23', '2020-09-21 12:32:06'),
(103, 'RHP1600689595', 'Omar Faruk', '01511000111', 22, 0, NULL, NULL, 1, 1, '2020-09-21 11:59:55', '2020-09-21 12:29:54'),
(104, 'RHP1600690612', 'Mr Khan', '01611425009', 22, 1, NULL, 'dsfs', 1, 1, '2020-09-21 12:16:52', '2020-09-21 12:30:58'),
(105, 'RHP1600690732', 'Md. Ruhul Amin', '01611425010', 11, 1, NULL, NULL, 1, 1, '2020-09-21 12:18:52', '2020-09-21 12:30:19'),
(106, 'RHP1600690800', 'Md. Nuzrul Isalm', '01711425000', 30, 1, NULL, NULL, 1, 1, '2020-09-21 12:20:00', '2020-09-21 12:30:44'),
(107, 'RHP1600695620', 'Wefwe', '113', 22, 1, NULL, NULL, 1, 1, '2020-09-21 13:40:20', '2020-09-21 13:40:20'),
(108, 'RHP1600713205', 'Mahfuz', '01679605511', 30, 0, 'dhaka', 'fiver', 1, 1, '2020-09-21 18:33:25', '2020-09-21 18:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `patient_payments`
--

CREATE TABLE `patient_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_date` date NOT NULL,
  `prescription_ticket_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `paid_amount` int(11) NOT NULL,
  `due_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_payments`
--

INSERT INTO `patient_payments` (`id`, `payment_date`, `prescription_ticket_id`, `paid_amount`, `due_amount`, `created_at`, `updated_at`) VALUES
(1, '2020-09-23', 5, 285, 0, '2020-09-23 13:26:18', '2020-09-23 13:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `prescription_tickets`
--

CREATE TABLE `prescription_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_date` date NOT NULL,
  `serial_no` int(11) NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `person_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_fees` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescription_tickets`
--

INSERT INTO `prescription_tickets` (`id`, `ticket_date`, `serial_no`, `patient_id`, `doctor_id`, `person_id`, `doctor_fees`, `discount`, `total_amount`, `created_at`, `updated_at`) VALUES
(5, '2020-09-23', 1, 1, 5, 1, 300, 5, 285, '2020-09-23 13:26:18', '2020-09-23 13:26:18');

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
(55, 'RPID1600721775', 'No Broker', '01679605511', 'hello', 1, 1, '2020-09-21 20:56:15', '2020-09-21 20:56:15');

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
(29, '71b2de80-f27b-11ea-8c8a-99d77a4ac991', 'Doctor', '201', 'General Chamber', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2020-09-04 18:02:17', '2020-09-09 09:04:19'),
(30, '0a161dd0-f5e1-11ea-90de-8f54a75fea47', 'Doctor', '1231', 'fbdu  egerghiehi', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2020-09-13 16:49:07', '2020-09-13 16:49:07'),
(31, '122ba6a0-f5e1-11ea-8370-d9c62e747357', 'Doctor', '3131', 'fger ertert', 0, 0, NULL, NULL, NULL, NULL, NULL, 1, '2020-09-13 16:49:20', '2020-09-13 16:49:20'),
(32, 'b02b8620-f8e9-11ea-af54-ff8d15193188', 'Pathology', '505', 'vvjhvjh', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2020-09-17 13:28:35', '2020-09-17 13:28:35');

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
(1, 'Super Admin', 'admin@gmail.com', NULL, '$2y$10$mKNZxGGZ6mmKXFCQesRyDunEuwHX.6v0heSJiK2DhnpL8uSuYtP7m', 'zWymLnKEkchYCvxzrcE9Ychxto1UMQOsL3IkC63wCx9Q6GLjI38UbIAj7ZqV', '2020-02-16 04:20:52', '2020-02-16 04:20:52'),
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_patient_id_unique` (`patient_id`),
  ADD KEY `patients_user_id_foreign` (`user_id`);

--
-- Indexes for table `patient_payments`
--
ALTER TABLE `patient_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_payments_prescription_ticket_id_foreign` (`prescription_ticket_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `doctor_departments`
--
ALTER TABLE `doctor_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `pathology_departments`
--
ALTER TABLE `pathology_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pathology_tests`
--
ALTER TABLE `pathology_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `patient_payments`
--
ALTER TABLE `patient_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prescription_tickets`
--
ALTER TABLE `prescription_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ref_commissions`
--
ALTER TABLE `ref_commissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ref_users`
--
ALTER TABLE `ref_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `patient_payments`
--
ALTER TABLE `patient_payments`
  ADD CONSTRAINT `patient_payments_prescription_ticket_id_foreign` FOREIGN KEY (`prescription_ticket_id`) REFERENCES `prescription_tickets` (`id`);

--
-- Constraints for table `prescription_tickets`
--
ALTER TABLE `prescription_tickets`
  ADD CONSTRAINT `prescription_tickets_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `prescription_tickets_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `prescription_tickets_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `ref_users` (`id`);

--
-- Constraints for table `ref_users`
--
ALTER TABLE `ref_users`
  ADD CONSTRAINT `ref_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
