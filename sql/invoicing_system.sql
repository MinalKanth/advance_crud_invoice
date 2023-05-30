-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 02:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoicing_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `billing_address` text NOT NULL,
  `shipping_address` text NOT NULL,
  `total_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_number`, `billing_address`, `shipping_address`, `total_amount`, `created_at`, `updated_at`) VALUES
(31, 'Invoice - 2023-0003', '{\"address\":\"C\\/o- Deepali Padhi, Near Ananda Nursurey (village- Hagrapulli), P.O. Amoni , P.S. - Samaguri\",\"city\":\"Nagaon\",\"state\":\"782140\",\"phone_number\":\"09678001910\"}', '{\"address\":\"C\\/o- Deepali Padhi, Near Ananda Nursurey (village- Hagrapulli), P.O. Amoni , P.S. - Samaguri\",\"city\":\"Nagaon\",\"state\":\"782140\",\"phone_number\":\"09678001910\"}', '0.02', '2023-05-25 06:05:48', '2023-05-25 06:05:48'),
(32, 'Invoice - 2023-0004', '{\"address\":\"C\\/o- Deepali Padhi, Near Ananda Nursurey (village- Hagrapulli), P.O. Amoni , P.S. - Samaguri\",\"city\":\"Nagaon\",\"state\":\"782140\",\"phone_number\":\"09678001910\"}', '{\"address\":\"C\\/o- Deepali Padhi, Near Ananda Nursurey (village- Hagrapulli), P.O. Amoni , P.S. - Samaguri\",\"city\":\"Nagaon\",\"state\":\"782140\",\"phone_number\":\"09678001910\"}', '0.08', '2023-05-25 07:34:52', '2023-05-27 01:40:35'),
(41, 'Invoice - 2023-0005', '{\"address\":\"C\\/o- Deepali Padhi, Near Ananda Nursurey (village- Hagrapulli), P.O. Amoni , P.S. - Samaguri\",\"city\":\"Nagaon\",\"state\":\"782140\",\"phone_number\":\"09678001910\"}', '{\"address\":\"C\\/o- Deepali Padhi, Near Ananda Nursurey (village- Hagrapulli), P.O. Amoni , P.S. - Samaguri\",\"city\":\"Nagaon\",\"state\":\"782140\",\"phone_number\":\"09678001910\"}', '0.02', '2023-05-25 06:05:48', '2023-05-25 06:05:48'),
(42, 'Invoice - 2023-0006', '{\"address\":\"my home\",\"city\":\"Nagaon\",\"state\":\"782140\",\"phone_number\":\"09678001910\"}', '{\"address\":\"your home\",\"city\":\"Nagaon\",\"state\":\"782140\",\"phone_number\":\"09678001910\"}', '0.05', '2023-05-26 07:51:29', '2023-05-29 00:14:13'),
(43, 'Invoice - 2023-0007', '{\"address\":\"chitu asdasd\",\"city\":\"Nagaon\",\"state\":\"782140\",\"phone_number\":\"09678001910\"}', '{\"address\":\"chitaa asdasdgashdg\",\"city\":\"Nagaon\",\"state\":\"782140\",\"phone_number\":\"09678001910\"}', '0.10', '2023-05-26 07:53:00', '2023-05-29 00:15:12'),
(48, 'Invoice - 2023-0008', '{\"address\":\"i am new\",\"city\":\"new city\",\"state\":\"new state\",\"phone_number\":\"09678001910\"}', '{\"address\":\"i am new2\",\"city\":\"new city2\",\"state\":\"new state2\",\"phone_number\":\"09678001910\"}', '0.10', '2023-05-29 00:13:35', '2023-05-29 01:46:08'),
(49, 'Invoice - 2023-0009', '{\"address\":\"C\\/o- Deepali Padhi, Near Ananda Nursurey (village- Hagrapulli), P.O. Amoni , P.S. - Samaguri\",\"city\":\"Nagaon\",\"state\":\"782140\",\"phone_number\":\"09678001910\"}', '{\"address\":\"ada\",\"city\":\"asdas\",\"state\":\"782140\",\"phone_number\":\"09678001910\"}', '1333.00', '2023-05-29 06:43:11', '2023-05-29 06:44:06');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_24_063018_create_invoices_table', 1),
(6, '2023_05_24_063134_create_products_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `invoice_id`, `product_name`, `quantity`, `rate`, `amount`, `image`, `created_at`, `updated_at`) VALUES
(23, 31, 'aaa', 4, '0.02', '0.08', '20230529053708_haris-khan-o9w0oygbXEc-unsplash.jpeg', '2023-05-25 06:05:48', '2023-05-29 00:07:08'),
(24, 31, 'aad', 1, '0.01', '0.01', '20230525113548_download.jpg', '2023-05-25 06:05:48', '2023-05-25 06:05:48'),
(25, 32, 'cxwe', 3, '0.02', '0.06', '20230525130452_download.jpg', '2023-05-25 07:34:52', '2023-05-25 07:34:52'),
(26, 32, 'aad', 2, '0.01', '0.02', '20230525130452_download (1).jpg', '2023-05-25 07:34:52', '2023-05-25 07:34:52'),
(28, 32, 'aad', 2, '0.01', '0.02', '20230525112257_tim-meyer-GIm7wxiAZys-unsplash.jpeg', '2023-05-25 07:34:52', '2023-05-25 07:34:52'),
(29, 41, 'aad', 2, '0.01', '0.02', '20230525130452_download (1).jpg', '2023-05-25 07:34:52', '2023-05-25 07:34:52'),
(30, 42, 'dasd', 1, '0.01', '0.01', '20230526132129_david-cephei-2GU1YY4LGaA-unsplash.jpeg', '2023-05-26 07:51:29', '2023-05-26 07:51:29'),
(31, 42, 'asdasd', 2, '0.02', '0.04', '20230526132129_haris-khan-o9w0oygbXEc-unsplash.jpeg', '2023-05-26 07:51:29', '2023-05-26 07:51:29'),
(33, 43, 'cjhit', 2, '0.02', '0.04', '20230526132300_michelle-francisca-lee-28K-hb0r_sM-unsplash.jpeg', '2023-05-26 07:53:00', '2023-05-26 07:53:00'),
(91, 48, 'new product 1', 2, '0.02', '0.02', '20230529054335_1.PNG', '2023-05-29 00:13:35', '2023-05-29 01:46:08'),
(92, 48, 'new product  3', 1, '0.04', '0.08', '20230529054335_2.PNG', '2023-05-29 00:13:35', '2023-05-29 01:46:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoices_invoice_number_unique` (`invoice_number`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_invoice_id_foreign` (`invoice_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
