-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2024 at 08:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `car_type` varchar(255) NOT NULL,
  `daily_rent_price` decimal(8,2) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `brand`, `model`, `year`, `car_type`, `daily_rent_price`, `availability`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Rolls-Royce', 'Rolls-Royce', 'Phantom', 2022, 'Sedan', 160.00, 0, 'uploads/car/images/1727263866.jpg', '2024-09-25 05:31:06', '2024-09-27 11:34:42'),
(2, 'Bentley Flying Spur', 'Bentley', 'Flying Spur', 2021, 'Sedan', 180.00, 1, 'uploads/car/images/1727263935.jpg', '2024-09-25 05:32:15', '2024-09-25 07:06:38'),
(3, 'Mercedes-Maybach S-Class', 'Mercedes-Benz', 'Maybach S-Class', 2024, 'Sedan', 230.00, 0, 'uploads/car/images/1727263994.jfif', '2024-09-25 05:33:14', '2024-09-27 11:42:42'),
(4, 'Aston Martin', 'Aston Martin', 'DBX707', 2019, 'SUV', 120.00, 1, 'uploads/car/images/1727264055.jpg', '2024-09-25 05:34:15', '2024-09-25 05:34:15'),
(5, 'Lamborghini', 'Lamborghini', 'Urus', 2023, 'SUV', 190.00, 0, 'uploads/car/images/1727264120.png', '2024-09-25 05:35:20', '2024-09-25 07:06:40'),
(6, 'Porsche Panamera', 'Porsche', 'Turbo S', 2024, 'Sedan', 175.00, 1, 'uploads/car/images/1727264721.jfif', '2024-09-25 05:45:21', '2024-09-25 05:45:21'),
(7, 'Ferrari', 'Ferrari', 'Roma', 2018, 'Coupe', 250.00, 0, 'uploads/car/images/1727264783.jpg', '2024-09-25 05:46:23', '2024-09-27 11:52:34'),
(8, 'Maserati', 'Maserati', 'Quattroporte Trofeo', 2019, 'Sedan', 150.00, 1, 'uploads/car/images/1727264844.jpg', '2024-09-25 05:47:24', '2024-09-25 05:47:24'),
(9, 'BMW 7 Series', 'BMW', '760i xDrive', 2015, 'Sedan', 190.00, 1, 'uploads/car/images/1727264918.jpg', '2024-09-25 05:48:38', '2024-09-25 05:48:38'),
(10, 'Range Rover', 'Land Rover', 'SVAutobiography', 2017, 'SUV', 160.00, 1, 'uploads/car/images/1727264984.jpg', '2024-09-25 05:49:44', '2024-09-25 05:49:44'),
(12, 'demo', 'Bentley', 'Phantom', 2024, 'Sedan', 180.00, 1, 'uploads/car/images/1727458475.png', '2024-09-27 11:34:35', '2024-09-27 11:34:35');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'demo', 'demo@gmail.com', '01575378379', 'demo message', '2024-09-27 06:17:40', '2024-09-27 06:17:40');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2024_09_16_041053_create_cars_table', 1),
(4, '2024_09_16_041111_create_rentals_table', 1),
(5, '2024_09_18_072954_add_status_to_rentals_table', 1),
(6, '2024_09_19_060509_add_address_to_users_table', 1),
(7, '2024_09_24_152106_create_contacts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `end_date` date NOT NULL,
  `total_cost` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `user_id`, `car_id`, `start_date`, `status`, `end_date`, `total_cost`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '2024-09-25', 2, '2024-09-27', 360.00, '2024-09-25 06:52:53', '2024-09-27 12:05:33'),
(3, 3, 4, '2024-09-02', 2, '2024-09-05', 350.00, '2024-09-25 06:59:49', '2024-09-25 07:07:11'),
(4, 2, 7, '2024-09-05', 0, '2024-09-07', 500.00, '2024-09-27 10:35:06', '2024-09-27 12:05:27'),
(5, 2, 4, '2024-09-14', 0, '2024-09-16', 240.00, '2024-09-27 10:35:32', '2024-09-27 10:35:32'),
(6, 2, 6, '2024-09-13', 0, '2024-09-15', 350.00, '2024-09-27 12:06:00', '2024-09-27 12:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'public.data19@gmail.com', '$2y$10$050iZEXBXz8STU7U7i5pHOE49GSCGPakcnmPZhJziTwtdjntlxO2e', '01575378379', 'Bogura', 'admin', '2024-09-25 02:54:06', '2024-09-25 02:54:06'),
(2, 'Sobuj', 'sobujts57@gmail.com', '$2y$10$JjUUVuw39NSWcTTv9.4Auum6jyM5FYLb1UIAJANqeJsHdJW63OXfi', '015753783725', 'gazipur, dhaka', 'customer', '2024-09-25 06:52:28', '2024-09-25 06:52:28'),
(3, 'demo', 'demo@gmail.com', '$2y$10$uTWKqLHMAN.zfQhsFooMBO0wKjnxEVTwJVMDr/FRoehp5bhehTtz6', '0123456789', 'rajshahi', 'customer', '2024-09-25 06:55:43', '2024-09-25 06:55:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_user_id_foreign` (`user_id`),
  ADD KEY `rentals_car_id_foreign` (`car_id`);

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
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rentals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
