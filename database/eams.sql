-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2024 at 12:30 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eams`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `first_name`, `last_name`, `created_at`) VALUES
(1, 14, 'John', 'Admin', '2024-08-17 19:33:30');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) UNSIGNED NOT NULL,
  `admin_id` int(11) UNSIGNED NOT NULL COMMENT 'attendance marker',
  `student_id` int(11) UNSIGNED NOT NULL COMMENT 'marked student',
  `batch_id` int(11) NOT NULL,
  `note` longtext DEFAULT NULL,
  `is_present` tinyint(1) NOT NULL DEFAULT 0,
  `marked_date` date NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `admin_id`, `student_id`, `batch_id`, `note`, `is_present`, `marked_date`, `created_at`) VALUES
(1, 1, 3, 1, 'I wasn gone', 0, '2024-08-17', '2024-08-18 18:09:07'),
(2, 1, 1, 1, 'Presentosnad', 0, '2024-08-17', '2024-08-18 18:09:07'),
(3, 1, 4, 2, 'Traveled for important business', 0, '2024-08-17', '2024-08-18 18:13:47'),
(4, 1, 3, 1, '', 1, '2024-08-18', '2024-08-18 18:19:09'),
(5, 1, 1, 1, 'Is absent for a while! Writing concour', 0, '2024-08-18', '2024-08-18 18:19:09'),
(6, 1, 4, 2, '', 1, '2024-08-18', '2024-08-18 18:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(400) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `title`, `description`, `created_at`) VALUES
(1, 'batch 1', NULL, '2024-08-15 19:38:53'),
(2, 'batch 2', NULL, '2024-08-15 19:38:53'),
(3, 'batch 3', NULL, '2024-08-15 19:38:53'),
(4, 'batch 4', NULL, '2024-08-15 19:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`) VALUES
(1, 'site_name', 'Eschosys AMS'),
(2, 'app_mode', 'production'),
(3, 'admin_email', 'info@eschosys.com'),
(4, 'base_url', 'http://localhost/eams'),
(5, 'admin_registration', '1');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `batch_id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `school` varchar(400) DEFAULT NULL,
  `department` varchar(400) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `batch_id`, `first_name`, `last_name`, `school`, `department`, `date_of_birth`, `is_approved`, `created_at`) VALUES
(1, 9, 1, 'Rabbit', 'Kum', 'School Zone', 'Sofware Engineering', '1976-09-11', 1, '2024-08-15 12:49:29'),
(3, 12, 1, 'Karki', 'Newman', 'English School', 'Commerce', '2024-08-21', 1, '2024-08-15 12:59:48'),
(4, 13, 2, 'Geneva', 'Something', 'School', 'Medecine', '2024-08-07', 1, '2024-08-15 18:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(400) NOT NULL,
  `password` text NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 for student and 1 for admin',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `token` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `is_admin`, `email_verified_at`, `token`, `created_at`) VALUES
(1, 'zuma-dan@email.com', '$2y$10$mgshtOpedxsVNEJitzE7t.XTwOkoY3Ntc8cXD2Zxk0bjtuhcfwnvS', 0, NULL, NULL, '2024-08-15 08:42:46'),
(6, 'precious@gmail.com', '$2y$10$v1YTNIyYjii91KT3jGJtce/TR.txx0P3JmAo/FF8cG/CYvI4T9gK2', 0, NULL, NULL, '2024-08-15 08:48:11'),
(7, 'mink@gmail.com', '$2y$10$FmKcQF15b46fscRRI5lIaOHMtW1BcS7yPxcDyl0Mjo.UGtKl0QtZ6', 0, NULL, NULL, '2024-08-15 08:49:44'),
(9, 'johnhan@email.com', '$2y$10$Inzpwb7.RaVVgLyyCvY94OGvuqG9h0cmz1u5DdgoSDddPqm5PUPne', 0, '2024-08-15 12:30:14', NULL, '2024-08-15 09:15:21'),
(10, 'judeben@gmail.com', '$2y$10$3O2U8Epfx/JfpHc.76P8N.DCMJp3/9xG6Jl.uyZdzt3TzcU4pFCf.', 0, '2024-08-15 12:27:56', NULL, '2024-08-15 09:31:59'),
(12, 'carlus@gmail.com', '$2y$10$CZMYj39COgfc5gu8YpWFte24sg79YxBpEH2CqDCOSQbe5pipSizs.', 0, '2024-08-18 21:33:38', NULL, '2024-08-15 09:36:46'),
(13, 'geneva@gmail.com', '$2y$10$683YLc3cykmZ48PJ4fNVcepjHggZXxd6MWZL/B6OnkmlwTefTJdOu', 0, '2024-08-15 18:40:57', NULL, '2024-08-15 18:40:44'),
(14, 'admin@admin.com', '$2y$10$W0cpFq2P05JtuoRhZTXG4ep06EIAZAZxp4m1mpN4rcenKzUvo56je', 1, '2024-08-18 18:40:43', NULL, '2024-08-17 19:32:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_user_id_foreign` (`user_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendance_admin_id_foreign` (`admin_id`),
  ADD KEY `attendance_student_id_foreign` (`student_id`) USING BTREE,
  ADD KEY `attendance_batch_id_foreign` (`batch_id`) USING BTREE;

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_user_id_foreign` (`user_id`) USING BTREE,
  ADD KEY `students_batch_id_foreign` (`batch_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
