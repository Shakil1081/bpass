-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 11, 2024 at 07:31 AM
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
-- Database: `bpass_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `party_group_bds`
--

CREATE TABLE `party_group_bds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `group_name_local` varchar(255) DEFAULT NULL,
  `office_site_name` varchar(255) NOT NULL,
  `annual_revenue` decimal(15,2) DEFAULT NULL,
  `num_employees` int(11) NOT NULL,
  `ticker_symbol` varchar(255) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `last_updated_tx_stamp` varchar(255) DEFAULT NULL,
  `employee_position_type_in_local` varchar(255) DEFAULT NULL,
  `group_brand_name` varchar(255) DEFAULT NULL,
  `tin_no` varchar(255) NOT NULL,
  `vat_reg_no` varchar(255) DEFAULT NULL,
  `registratn_category` varchar(255) DEFAULT NULL,
  `bin_no` varchar(255) DEFAULT NULL,
  `acct_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `last_updated_stamp_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `party_group_bds`
--
ALTER TABLE `party_group_bds`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `party_group_bds_tin_no_unique` (`tin_no`),
  ADD KEY `last_updated_stamp_fk_9799753` (`last_updated_stamp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `party_group_bds`
--
ALTER TABLE `party_group_bds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `party_group_bds`
--
ALTER TABLE `party_group_bds`
  ADD CONSTRAINT `last_updated_stamp_fk_9799753` FOREIGN KEY (`last_updated_stamp_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
