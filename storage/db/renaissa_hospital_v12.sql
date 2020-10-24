-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2020 at 01:02 PM
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
(81, '2020_09_23_136019_create_patient_test_invoices_table', 28),
(82, '2020_09_23_153222_create_invoices_table', 28),
(83, '2020_09_23_010114_create_prescription_tickets_table', 29);

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
(1, 'Super Admin', 'admin@gmail.com', NULL, '$2y$10$mKNZxGGZ6mmKXFCQesRyDunEuwHX.6v0heSJiK2DhnpL8uSuYtP7m', 'tzlCng3iLPX0BUcB1aeZdVPPFd5caU2M21r6zrgiOeuSO4lGU0PKGrBN8pAm', '2020-02-16 04:20:52', '2020-02-16 04:20:52'),
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `broker_payments`
--
ALTER TABLE `broker_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_departments`
--
ALTER TABLE `doctor_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_income_histories`
--
ALTER TABLE `doctor_income_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_payments`
--
ALTER TABLE `doctor_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_departments`
--
ALTER TABLE `employee_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_payments`
--
ALTER TABLE `patient_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_tests`
--
ALTER TABLE `patient_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_test_invoices`
--
ALTER TABLE `patient_test_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `ref_users`
--
ALTER TABLE `ref_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
