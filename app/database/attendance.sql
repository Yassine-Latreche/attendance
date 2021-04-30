-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 25, 2021 at 02:22 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `generated_qr_codes`
--

CREATE TABLE `generated_qr_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_Id` bigint(20) UNSIGNED NOT NULL,
  `qr_code_string` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_Id` bigint(20) UNSIGNED NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_students` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `section_Id`, `group`, `number_of_students`, `created_at`, `updated_at`) VALUES
(1, 2, '1', 0, '2021-04-24 08:57:55', '2021-04-24 08:57:55'),
(2, 2, '2', 0, '2021-04-24 09:27:57', '2021-04-24 09:27:57'),
(3, 2, '3', 0, '2021-04-24 09:28:03', '2021-04-24 09:28:03'),
(4, 1, '5', 0, '2021-04-24 09:38:11', '2021-04-24 09:38:11'),
(5, 4, '6', 0, '2021-04-24 09:40:28', '2021-04-24 09:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_students` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level`, `number_of_students`, `created_at`, `updated_at`) VALUES
(2, 'Premiere Année - CPI', 0, '2021-04-23 17:26:56', '2021-04-23 17:26:56'),
(3, 'Deuxième Année - CPI', 0, '2021-04-23 17:27:24', '2021-04-23 17:27:24'),
(4, 'Premiere Année - SC', 0, '2021-04-23 17:28:15', '2021-04-23 17:28:15'),
(5, 'Deuxieme Année - SC - SIW', 0, '2021-04-23 17:28:29', '2021-04-23 17:28:29'),
(6, 'Deuxieme Année - SC - ISI', 0, '2021-04-23 17:28:34', '2021-04-23 17:28:34'),
(7, 'Troisième Année - SC - ISI', 0, '2021-04-23 17:29:02', '2021-04-23 17:29:02'),
(8, 'Troisième Année - SC - SIW', 0, '2021-04-23 17:29:06', '2021-04-23 17:29:06');

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
(29, '2021_04_23_141153_create_sections_table', 1),
(30, '2021_04_23_141206_create_groups_table', 1),
(31, '2021_04_23_141213_create_students_table', 1),
(32, '2021_04_23_141222_create_levels_table', 1),
(34, '2021_04_23_141238_create_professors_table', 1),
(37, '2021_04_24_100101_create_generated_qr_codes_table', 3),
(38, '2021_04_23_141228_create_rooms_table', 4),
(39, '2021_04_23_141136_create_sessions_table', 5),
(41, '2021_04_23_141300_create_records_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `professors`
--

CREATE TABLE `professors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`id`, `name`, `email`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 'BADSI Hichem Benaissa Anouar', 'h.badsi@esi-sba.dz', 560346446, '2021-04-24 10:09:04', '2021-04-24 10:09:04'),
(2, 'GHEID Zakaria', 'z.gheid@esi-sba.dz', 987456321, '2021-04-24 10:13:38', '2021-04-24 10:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_Id` bigint(20) UNSIGNED NOT NULL,
  `session_Id` bigint(20) UNSIGNED NOT NULL,
  `generated_qr_code_Id` bigint(20) UNSIGNED NOT NULL,
  `device_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qr_code_string` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scanning_time` time DEFAULT NULL,
  `sending_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_places` int(11) NOT NULL,
  `empty` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room`, `place`, `type`, `number_of_places`, `empty`, `created_at`, `updated_at`) VALUES
(1, 'A', 'p', 'Amphi', 150, 0, '2021-04-24 10:19:09', '2021-04-24 10:19:09'),
(2, 'c', 's', 'Amphi', 150, 0, '2021-04-24 10:19:29', '2021-04-24 10:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level_Id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_students` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `level_Id`, `section`, `number_of_students`, `created_at`, `updated_at`) VALUES
(1, 3, 'A', 0, '2021-04-24 08:14:40', '2021-04-24 08:14:40'),
(2, 2, 'A', 0, '2021-04-24 08:34:05', '2021-04-24 08:34:05'),
(3, 2, 'B', 0, '2021-04-24 08:44:57', '2021-04-24 08:44:57'),
(4, 3, 'B', 0, '2021-04-24 09:39:17', '2021-04-24 09:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `professor_Id` bigint(20) UNSIGNED NOT NULL,
  `is_in_group` tinyint(1) NOT NULL,
  `group_Id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_in_section` tinyint(1) NOT NULL,
  `section_Id` bigint(20) UNSIGNED DEFAULT NULL,
  `session_type` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `starting` time NOT NULL,
  `ending` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `professor_Id`, `is_in_group`, `group_Id`, `is_in_section`, `section_Id`, `session_type`, `date`, `starting`, `ending`, `created_at`, `updated_at`) VALUES
(1, 2, 0, NULL, 1, 4, 'Cours', '2021-01-15', '08:00:00', '11:00:00', '2021-04-24 10:46:50', '2021-04-24 10:48:51');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_Id` bigint(20) UNSIGNED NOT NULL,
  `section_Id` bigint(20) UNSIGNED NOT NULL,
  `group_Id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `phone_number` int(11) NOT NULL,
  `living_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `willaya_d_origine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `level_Id`, `section_Id`, `group_Id`, `email`, `birthday`, `phone_number`, `living_area`, `willaya_d_origine`, `device_type`, `device_id`, `created_at`, `updated_at`) VALUES
(2, 'Latreche Yassine', 3, 4, 5, 'ya.latreche@esi-sba.dz', '2001-01-20', 798792997, '22', '47', 'android', '8975-GBYV-6876-BKHE', '2021-04-24 09:50:20', '2021-04-24 10:01:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `generated_qr_codes`
--
ALTER TABLE `generated_qr_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `professors_email_unique` (`email`),
  ADD UNIQUE KEY `professors_phone_number_unique` (`phone_number`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD UNIQUE KEY `students_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `students_device_id_unique` (`device_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `generated_qr_codes`
--
ALTER TABLE `generated_qr_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
