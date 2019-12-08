-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2019 at 11:58 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `attendance_time` time NOT NULL DEFAULT '18:09:00',
  `attendance_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `user_id`, `attendance_time`, `attendance_date`, `status`, `created_at`, `updated_at`) VALUES
(10, 6, '02:25:54', '2019-12-08', 1, '2019-12-08 00:25:54', '2019-12-08 00:25:54'),
(12, 8, '02:57:35', '2019-12-08', 0, '2019-12-08 00:57:35', '2019-12-08 00:57:35'),
(13, 10, '03:02:34', '2019-12-08', 1, '2019-12-08 13:02:34', '2019-12-08 13:02:34'),
(14, 11, '07:05:12', '2019-12-08', 0, '2019-12-08 17:05:13', '2019-12-08 17:05:13');

-- --------------------------------------------------------

--
-- Table structure for table `latetimes`
--

CREATE TABLE `latetimes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `duration` time NOT NULL,
  `latetime_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `latetimes`
--

INSERT INTO `latetimes` (`id`, `user_id`, `duration`, `latetime_date`, `created_at`, `updated_at`) VALUES
(1, 11, '06:05:12', '2019-12-08', '2019-12-08 17:05:12', '2019-12-08 17:05:12');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `leave_time` time NOT NULL DEFAULT '18:13:00',
  `leave_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `user_id`, `leave_time`, `leave_date`, `status`, `created_at`, `updated_at`) VALUES
(4, 6, '22:45:42', '2019-12-08', 1, '2019-12-08 20:45:42', '2019-12-08 20:45:42'),
(5, 11, '22:54:58', '2019-12-08', 0, '2019-12-08 20:54:58', '2019-12-08 20:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_02_141403_create_roles_table', 1),
(4, '2019_12_03_044741_create_schedules_table', 2),
(5, '2019_12_03_045452_create_attendances_table', 3),
(6, '2019_12_03_045912_create_latetimes_table', 4),
(7, '2019_12_03_045930_create_overtimes_table', 4),
(8, '2019_12_03_050030_create_leaves_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `overtimes`
--

CREATE TABLE `overtimes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `duration` time NOT NULL,
  `overtime_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `overtimes`
--

INSERT INTO `overtimes` (`id`, `user_id`, `duration`, `overtime_date`, `created_at`, `updated_at`) VALUES
(1, 6, '05:45:42', '2019-12-08', '2019-12-08 20:45:42', '2019-12-08 20:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator ', NULL, '2019-12-02 22:00:00', '2019-12-02 22:00:00'),
(2, 'emp', 'Employee', NULL, '2019-12-02 22:07:00', '2019-12-02 22:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 2),
(6, 2),
(8, 2),
(10, 2),
(11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `slug`, `time_in`, `time_out`, `created_at`, `updated_at`) VALUES
(6, 'First', '09:00:00', '17:00:00', '2019-12-04 19:06:52', '2019-12-08 00:08:08'),
(7, 'Second', '01:00:00', '23:00:00', '2019-12-04 19:46:37', '2019-12-08 20:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_users`
--

CREATE TABLE `schedule_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `schedule_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule_users`
--

INSERT INTO `schedule_users` (`user_id`, `schedule_id`) VALUES
(2, 6),
(3, 7),
(4, 6),
(6, 6),
(8, 7),
(10, 6),
(11, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pin_code`, `permissions`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'baselrabia', 'baselrabia@gmail.com', NULL, NULL, NULL, '$2y$10$vuGbCbT0gLr/A7y8U/ZsQuS4Zx.p2dAj3IjGXbANPE1WZB4Trztx6', NULL, '2019-12-03 07:30:52', '2019-12-03 07:30:52'),
(2, 'ahmed33', 'ahmed33@gmail.com', NULL, NULL, NULL, '$2y$10$3NdaQLDtvq9EnnMZCEJrmOR2xLwPAFSxNAsIKDYF05gxPNpr2xUBa', NULL, '2019-12-03 07:31:28', '2019-12-03 07:31:28'),
(3, 'mohamed33', 'mohamed33@gmail.com', NULL, NULL, NULL, '$2y$10$Y0Yh43eVwVJQVf7t0xnDzeCl//e736bklYECl2LBmc82W0WxTYlcq', NULL, '2019-12-03 07:31:57', '2019-12-03 07:31:57'),
(4, 'mazen', 'mazen@gmail.com', NULL, NULL, NULL, '$2y$10$AQwSWtLyqhQyZjzI6GChkOpz1AWltAiaT.xPy.PvZ12xWkxMuDixG', NULL, '2019-12-03 07:32:31', '2019-12-03 07:32:31'),
(6, 'baselrabias', 'baselrabia2008@gmail.com', '$2y$10$wsEg81ZUwfLhJXM2yYXreu31o/I1YIraSDS68j2hXzrgsJ9Fpdw1K', NULL, NULL, '$2y$10$mWrhmt8yD0PYC.9ngMMDouQMEmkhhp5sux3anBmjPvDN0BtlIBqo.', NULL, '2019-12-05 18:45:43', '2019-12-07 23:14:43'),
(8, 'baselraba', 'baselrabi@gmail.com', '$2y$10$T9MoxyGOpF7xbnvpHOKWK.inJXovsDG7IoPKfDBqJ0Qx.4qxMHq0e', NULL, NULL, '$2y$10$vIjfeG6dMqSgldSgiK7oGulByaidbZqguzPQsfYOGXpTxpkUsq/jK', NULL, '2019-12-05 19:17:57', '2019-12-05 19:20:56'),
(10, 'mohamed', 'mohamed@gmail.com', '$2y$10$M6fKQe3Q46DM2Y/Hpx7Y5.oKtRNpakakUvud/bxLPgbhMf3qjCXkm', NULL, NULL, '$2y$10$WrBeEuL3L5n4kSEWlj24oedPPIxaMVKYgtDqQ46HwkE5Qxi3eafgi', NULL, '2019-12-08 13:02:11', '2019-12-08 13:02:11'),
(11, 'ahmed', 'ahmed@gmail.com', '$2y$10$8TGBh0o0Nt1FL.0h9M0r6OlR3TzsYI.KpQNAwHNlY0hbCTT6bKgw2', NULL, NULL, '$2y$10$depc4XhmnEOPXr6.bjBqoe4lH1D4mnoNVztBxF2/M0bP17hfbsj2K', NULL, '2019-12-08 13:03:34', '2019-12-08 13:03:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_user_id_foreign` (`user_id`);

--
-- Indexes for table `latetimes`
--
ALTER TABLE `latetimes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `latetimes_user_id_foreign` (`user_id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leaves_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overtimes`
--
ALTER TABLE `overtimes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `overtimes_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_users_role_id_foreign` (`role_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schedules_slug_unique` (`slug`);

--
-- Indexes for table `schedule_users`
--
ALTER TABLE `schedule_users`
  ADD PRIMARY KEY (`user_id`,`schedule_id`),
  ADD KEY `schedule_users_schedule_id_foreign` (`schedule_id`);

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
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `latetimes`
--
ALTER TABLE `latetimes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `overtimes`
--
ALTER TABLE `overtimes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `latetimes`
--
ALTER TABLE `latetimes`
  ADD CONSTRAINT `latetimes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `leaves_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `overtimes`
--
ALTER TABLE `overtimes`
  ADD CONSTRAINT `overtimes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_users`
--
ALTER TABLE `role_users`
  ADD CONSTRAINT `role_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schedule_users`
--
ALTER TABLE `schedule_users`
  ADD CONSTRAINT `schedule_users_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedule_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
