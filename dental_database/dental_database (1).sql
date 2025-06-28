-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2025 at 08:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dental_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `dentist_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `Appointment_Date` date NOT NULL,
  `Appointment_Time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `dentist_id`, `status`, `Appointment_Date`, `Appointment_Time`, `created_at`, `updated_at`) VALUES
(19, 19, 3, 'cancelled', '2025-06-14', '10:15:00', '2025-06-13 11:33:16', '2025-06-13 14:10:56'),
(20, 19, 3, 'confirmed', '2025-06-18', '09:02:00', '2025-06-13 15:47:19', '2025-06-13 15:52:57'),
(22, 20, 3, 'Scheduled', '2025-06-18', '10:00:00', '2025-06-17 04:44:02', '2025-06-17 04:44:02'),
(23, 20, 4, 'scheduled', '2025-08-07', '23:49:13', '2025-06-04 13:49:49', '2025-06-01 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `availabilities`
--

CREATE TABLE `availabilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dentist_id` bigint(20) UNSIGNED NOT NULL,
  `day_of_week` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `availabilities`
--

INSERT INTO `availabilities` (`id`, `dentist_id`, `day_of_week`, `start_time`, `end_time`, `created_at`, `updated_at`, `Date`) VALUES
(16, 3, 'Wednesday', '08:00:00', '18:00:00', '2025-06-13 15:42:01', '2025-06-13 15:42:01', '2025-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `billings`
--

CREATE TABLE `billings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `status` enum('Paid','Unpaid') NOT NULL DEFAULT 'Unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dental_record`
--

CREATE TABLE `dental_record` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `dentist_id` bigint(20) UNSIGNED NOT NULL,
  `Notes` varchar(255) NOT NULL,
  `Prescribtion` varchar(255) NOT NULL,
  `Treatment_provided` varchar(255) NOT NULL,
  `Diagnosis` varchar(255) NOT NULL,
  `Visit_Date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dental_record`
--

INSERT INTO `dental_record` (`id`, `patient_id`, `dentist_id`, `Notes`, `Prescribtion`, `Treatment_provided`, `Diagnosis`, `Visit_Date`, `created_at`, `updated_at`) VALUES
(6, 20, 3, 'take rest', 'take rest', 'wisdom tooth removal', 'white teeth', '2025-06-06', '2025-06-17 05:09:29', '2025-06-17 05:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `dentists`
--

CREATE TABLE `dentists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Contact_No` varchar(255) NOT NULL,
  `Specialization` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dentists`
--

INSERT INTO `dentists` (`id`, `Name`, `Email`, `Contact_No`, `Specialization`, `created_at`, `updated_at`, `Username`, `Password`) VALUES
(3, 'DR.RACHEL', 'rachel@gmail.com', '1122334455', 'DENTIST', '2025-06-17 19:00:00', '0000-00-00 00:00:00', 'Dr.Rachel', '$2y$12$g5yqfcEDzNnllVulb.TPjOI48THLCaYHXZdPXKL.xa9FKGnZYiQK2'),
(4, 'Dr.John', 'john@gmail.com', '445566778', 'Dentist', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Dr.John', '$2y$12$khoGtvZWoOy3C1XEMo5lA.tmXTvjZhMLrkHkNDJv3D.mvydpDVXJW'),
(6, 'DR.anum', 'anum@gmail.com', '123456', 'Dentist', '2025-06-18 10:37:41', '2025-06-18 10:37:41', 'anum', '$2y$12$fFtYjlbQ5/WuuZIMLBldlel85pbY7GqEoBVhy84XoyuwMT6ZsFqbO');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_05_31_113111_create_patient_table', 1),
(2, '2025_05_31_191927_create_dentists_table', 2),
(3, '2025_05_31_193937_create_appointments_table', 3),
(4, '2025_06_09_194821_add__username_to_dentists_table', 4),
(5, '2025_06_09_195233_add__password_to_dentists_table', 5),
(6, '2025_06_09_203847_create_availabilities_table', 6),
(7, '2025_06_10_193214_add_date_to_availabilities_table', 7),
(8, '2025_06_11_101104_create_dental_record_table', 8),
(9, '2025_06_17_102345_create_users_table', 9),
(10, '2025_06_18_151026_remove__time-slots_from_dentists_table', 10),
(11, '2025_06_28_094445_create_billings_table', 11),
(12, '2025_06_28_111606_rename__payment__method_column_in_billings_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Date_Of_Birth` date NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Contact_No` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `Name`, `Date_Of_Birth`, `Gender`, `Contact_No`, `Email`, `Username`, `Password`, `created_at`, `updated_at`) VALUES
(19, 'faseeha asif', '2004-06-23', 'Female', '03139080120', 'faseeeeha.asif@gmail.com', 'faseeha', '$2y$12$QHTumIq3Zt/obeqxvBq/nuD6tcUoGuZakBWMLCXn1fGZaHIU0MCCK', '2025-06-12 17:10:06', '2025-06-12 17:10:06'),
(20, 'sadia', '2002-06-13', 'Female', '123456789', 'sadiakhan@gmail.com', 'sadia', '$2y$12$Yy8IBqrY/lLL4NLrmBXcwOkhUhpSy0DEKpFl49aW2sA7RneUTfWrG', '2025-06-13 15:51:42', '2025-06-13 15:51:42'),
(21, 'faseeha asif', '2004-06-23', 'Female', '0339089673', 'faseeha@gmail.com', 'faseeha', '$2y$12$VBrcZCs8cjddTRrRj4HjLen/OAI9d74.lU5Zhb2pnoNaRUQjpfgha', '2025-06-18 14:42:56', '2025-06-18 14:42:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `created_at`, `updated_at`) VALUES
(2, 'admin1', 'admin1', '$2y$12$.vgXF44hqCU6MqhGHu4AdOPYjtcWwxmb.MWPJwmAqkLu.Kkhh3Fya', '2025-06-17 06:34:26', '2025-06-17 06:34:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_patient_id_foreign` (`patient_id`),
  ADD KEY `appointments_dentist_id_foreign` (`dentist_id`);

--
-- Indexes for table `availabilities`
--
ALTER TABLE `availabilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `availabilities_dentist_id_foreign` (`dentist_id`);

--
-- Indexes for table `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billings_appointment_id_foreign` (`appointment_id`);

--
-- Indexes for table `dental_record`
--
ALTER TABLE `dental_record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dental_record_patient_id_foreign` (`patient_id`),
  ADD KEY `dental_record_dentist_id_foreign` (`dentist_id`);

--
-- Indexes for table `dentists`
--
ALTER TABLE `dentists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `availabilities`
--
ALTER TABLE `availabilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dental_record`
--
ALTER TABLE `dental_record`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dentists`
--
ALTER TABLE `dentists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_dentist_id_foreign` FOREIGN KEY (`dentist_id`) REFERENCES `dentists` (`id`),
  ADD CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`);

--
-- Constraints for table `availabilities`
--
ALTER TABLE `availabilities`
  ADD CONSTRAINT `availabilities_dentist_id_foreign` FOREIGN KEY (`dentist_id`) REFERENCES `dentists` (`id`);

--
-- Constraints for table `billings`
--
ALTER TABLE `billings`
  ADD CONSTRAINT `billings_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dental_record`
--
ALTER TABLE `dental_record`
  ADD CONSTRAINT `dental_record_dentist_id_foreign` FOREIGN KEY (`dentist_id`) REFERENCES `dentists` (`id`),
  ADD CONSTRAINT `dental_record_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
