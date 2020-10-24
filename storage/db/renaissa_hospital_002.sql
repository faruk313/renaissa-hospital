-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 27, 2020 at 05:56 AM
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_departments`
--

INSERT INTO `doctor_departments` (`id`, `uuid`, `name`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '0f6c49e0-cde8-11ea-a47e-b3b228ef204c', 'Orthopedic', 0, 1, '2020-07-24 16:53:14', '2020-07-24 19:58:36'),
(12, '5f31da30-cf31-11ea-88dd-a359e225ccab', 'Dental And Oral', 0, 1, '2020-07-24 19:10:07', '2020-07-26 11:15:54'),
(19, 'f2ffed30-cde7-11ea-a163-6bcf34c5bad4', 'Child Specialist', 1, 1, '2020-07-24 19:15:17', '2020-07-24 19:57:48'),
(25, 'e7ffdb30-cde7-11ea-aea3-a751bd5371ea', 'Heart & Chest', 1, 1, '2020-07-24 19:15:44', '2020-07-24 19:57:30'),
(30, 'df6374e0-cde7-11ea-8114-01efa25217eb', 'Medicine', 1, 1, '2020-07-24 19:19:03', '2020-07-24 19:57:15'),
(48, '3e286ce0-cde8-11ea-9bce-ef378cd5bb6e', 'ENT', 1, 1, '2020-07-24 19:59:54', '2020-07-24 19:59:54'),
(49, '66c822d0-cde9-11ea-9556-f729cc4490cc', 'Eye Care', 1, 1, '2020-07-24 20:00:07', '2020-07-24 20:08:12'),
(50, '7dcde800-cde8-11ea-a7ae-83e4313112fe', 'New Born Baby', 1, 1, '2020-07-24 20:01:41', '2020-07-24 20:01:41'),
(51, 'a36536f0-cdf5-11ea-9c6a-d7341a830727', 'Nutrition', 0, 1, '2020-07-24 20:03:58', '2020-07-24 21:35:48'),
(52, '466d0f40-cdf5-11ea-a42f-5d9c03530d7d', 'Gynee & Medicine', 0, 1, '2020-07-24 20:04:25', '2020-07-24 21:33:12'),
(53, 'd82d7770-cf7a-11ea-b45c-8de1ff7a0b9b', 'Jjjj', 0, 1, '2020-07-26 19:15:46', '2020-07-26 20:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `employee_departments`
--

CREATE TABLE `employee_departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_departments`
--

INSERT INTO `employee_departments` (`id`, `uuid`, `name`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '757a2cb0-ce47-11ea-9d06-693fd6de821d', 'Account', 1, 1, '2020-07-25 07:21:29', '2020-07-25 07:21:29'),
(2, '7ba67a30-ce47-11ea-a381-23e4e6249506', 'Front Desk', 1, 1, '2020-07-25 07:21:40', '2020-07-25 07:21:40'),
(3, 'a9fa4d50-ce47-11ea-a9b4-a367ba295efd', 'Lab Assistant', 1, 1, '2020-07-25 07:22:57', '2020-07-25 07:22:57'),
(5, 'c5f83970-ce47-11ea-80c8-69feb0a71117', 'Cleaner', 1, 1, '2020-07-25 07:23:44', '2020-07-25 07:23:44'),
(6, 'c9c98130-ce47-11ea-9193-19f77d68af05', 'Nurse', 1, 1, '2020-07-25 07:23:51', '2020-07-25 07:23:51'),
(7, 'd31b1af0-ce47-11ea-b34c-97d31627e514', 'Pathologist', 1, 1, '2020-07-25 07:24:06', '2020-07-25 07:24:06'),
(8, '56870250-ce6c-11ea-bb68-71efe6b2a9a3', 'Attendance', 1, 1, '2020-07-25 11:44:38', '2020-07-25 11:45:29');

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
(11, '2020_07_23_192149_create_doctor_departments_table', 2),
(12, '2020_07_23_193008_create_employee_departments_table', 2),
(13, '2020_07_23_193039_create_pathology_departments_table', 2),
(16, '2020_07_26_190509_create_rooms_table', 4),
(17, '2020_07_27_044725_create_ref_commissions_table', 5);

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pathology_departments`
--

INSERT INTO `pathology_departments` (`id`, `uuid`, `name`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'e3ef27c0-ce47-11ea-9e04-57ced6642d0b', 'Sample Collection', 1, 1, '2020-07-25 07:24:35', '2020-07-25 07:24:35'),
(2, 'e8a059b0-ce47-11ea-8877-cff5a2f3e7f9', 'X-Ray', 1, 1, '2020-07-25 07:24:42', '2020-07-25 07:24:42'),
(3, 'f2b6c980-ce47-11ea-978b-633174e58217', 'MRI', 1, 1, '2020-07-25 07:24:59', '2020-07-25 07:24:59'),
(4, '6f003830-ce6c-11ea-b813-57c0ab841a83', 'Eye Care', 1, 1, '2020-07-25 11:46:10', '2020-07-25 11:46:10'),
(5, '72a03450-ce6c-11ea-abae-a19e27ff72d3', 'Dental', 1, 1, '2020-07-25 11:46:16', '2020-07-25 11:46:16');

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
(1, 'sqwwqe', 'test_com', 'Pathology Test Commission', 2.25, 1, 1, '2020-07-22 23:08:11', NULL),
(2, 'dwe1234', 'const_com', 'Consultancy Ref. Commission', 10.00, 1, 1, '2020-07-15 23:09:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `uuid`, `room_code`, `room_status`, `user_id`, `created_at`, `updated_at`) VALUES
(4, '138105f0-cf45-11ea-896e-7d92ad0247e7', 'Room 101', 1, 1, '2020-07-26 13:36:57', '2020-07-26 13:36:57'),
(33, 'ebcca820-cf82-11ea-a12b-3defb2232777', 'Room 104', 1, 1, '2020-07-26 20:57:12', '2020-07-26 20:59:39'),
(34, 'da76ebc0-cf82-11ea-96ee-5128daadb95d', 'Room 103', 1, 1, '2020-07-26 20:57:18', '2020-07-26 20:59:10'),
(35, 'a1486530-cf82-11ea-886b-912a1915d26d', 'Room 102', 1, 1, '2020-07-26 20:57:23', '2020-07-26 20:57:34'),
(36, '53a0e8e0-cf84-11ea-a625-75f5cde37c1f', 'Room 201', 1, 1, '2020-07-26 21:01:32', '2020-07-26 21:09:43'),
(37, '49e22340-cf85-11ea-b10b-817aebb4d346', 'Eqweqew', 1, 1, '2020-07-26 21:16:36', '2020-07-26 21:16:36'),
(38, '696593d0-cf85-11ea-8290-ed2514854a1e', 'Sss', 1, 1, '2020-07-26 21:17:29', '2020-07-26 21:17:29'),
(39, 'afe83b10-cf85-11ea-be6b-ebbcb0f2d316', '1213', 1, 1, '2020-07-26 21:19:27', '2020-07-26 21:19:27'),
(40, 'badd8760-cf85-11ea-a5fd-9967650e401c', 'Eqweqweq', 1, 1, '2020-07-26 21:19:46', '2020-07-26 21:19:46');

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
(1, 'Super Admin', 'admin@gmail.com', NULL, '$2y$10$o6ZSFCAJQMChm40Z0vR07up5mVvwqqCDSUy/zz48UUGo9mwFqmik2', NULL, '2020-02-16 04:20:52', '2020-02-16 04:20:52'),
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `employee_departments`
--
ALTER TABLE `employee_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pathology_departments`
--
ALTER TABLE `pathology_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ref_commissions`
--
ALTER TABLE `ref_commissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
