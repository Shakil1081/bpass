-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 14, 2024 at 11:05 AM
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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', NULL, NULL, NULL),
(2, 'permission_create', NULL, NULL, NULL),
(3, 'permission_edit', NULL, NULL, NULL),
(4, 'permission_show', NULL, NULL, NULL),
(5, 'permission_delete', NULL, NULL, NULL),
(6, 'permission_access', NULL, NULL, NULL),
(7, 'role_create', NULL, NULL, NULL),
(8, 'role_edit', NULL, NULL, NULL),
(9, 'role_show', NULL, NULL, NULL),
(10, 'role_delete', NULL, NULL, NULL),
(11, 'role_access', NULL, NULL, NULL),
(12, 'user_create', NULL, NULL, NULL),
(13, 'user_edit', NULL, NULL, NULL),
(14, 'user_show', NULL, NULL, NULL),
(15, 'user_delete', NULL, NULL, NULL),
(16, 'user_access', NULL, NULL, NULL),
(17, 'audit_log_show', NULL, NULL, NULL),
(18, 'audit_log_access', NULL, NULL, NULL),
(19, 'team_create', NULL, NULL, NULL),
(20, 'team_edit', NULL, NULL, NULL),
(21, 'team_show', NULL, NULL, NULL),
(22, 'team_delete', NULL, NULL, NULL),
(23, 'team_access', NULL, NULL, NULL),
(24, 'finance_bank_create', NULL, NULL, NULL),
(25, 'finance_bank_edit', NULL, NULL, NULL),
(26, 'finance_bank_show', NULL, NULL, NULL),
(27, 'finance_bank_delete', NULL, NULL, NULL),
(28, 'finance_bank_access', NULL, NULL, NULL),
(29, 'organization_create', NULL, NULL, NULL),
(30, 'organization_edit', NULL, NULL, NULL),
(31, 'organization_show', NULL, NULL, NULL),
(32, 'organization_delete', NULL, NULL, NULL),
(33, 'organization_access', NULL, NULL, NULL),
(34, 'party_group_create', NULL, NULL, NULL),
(35, 'party_group_edit', NULL, NULL, NULL),
(36, 'party_group_show', NULL, NULL, NULL),
(37, 'party_group_delete', NULL, NULL, NULL),
(38, 'party_group_access', NULL, NULL, NULL),
(39, 'party_group_bd_create', NULL, NULL, NULL),
(40, 'party_group_bd_edit', NULL, NULL, NULL),
(41, 'party_group_bd_show', NULL, NULL, NULL),
(42, 'party_group_bd_delete', NULL, NULL, NULL),
(43, 'party_group_bd_access', NULL, NULL, NULL),
(44, 'party_table_create', NULL, NULL, NULL),
(45, 'party_table_edit', NULL, NULL, NULL),
(46, 'party_table_show', NULL, NULL, NULL),
(47, 'party_table_delete', NULL, NULL, NULL),
(48, 'party_table_access', NULL, NULL, NULL),
(49, 'department_create', NULL, NULL, NULL),
(50, 'department_edit', NULL, NULL, NULL),
(51, 'department_show', NULL, NULL, NULL),
(52, 'department_delete', NULL, NULL, NULL),
(53, 'department_access', NULL, NULL, NULL),
(54, 'non_purchase_order_create', NULL, NULL, NULL),
(55, 'non_purchase_order_edit', NULL, NULL, NULL),
(56, 'non_purchase_order_show', NULL, NULL, NULL),
(57, 'non_purchase_order_delete', NULL, NULL, NULL),
(58, 'non_purchase_order_access', NULL, NULL, NULL),
(59, 'purchase_order_create', NULL, NULL, NULL),
(60, 'purchase_order_edit', NULL, NULL, NULL),
(61, 'purchase_order_show', NULL, NULL, NULL),
(62, 'purchase_order_delete', NULL, NULL, NULL),
(63, 'purchase_order_access', NULL, NULL, NULL),
(64, 'requisition_create', NULL, NULL, NULL),
(65, 'requisition_edit', NULL, NULL, NULL),
(66, 'requisition_show', NULL, NULL, NULL),
(67, 'requisition_delete', NULL, NULL, NULL),
(68, 'requisition_access', NULL, NULL, NULL),
(69, 'term_condition_create', NULL, NULL, NULL),
(70, 'term_condition_edit', NULL, NULL, NULL),
(71, 'term_condition_show', NULL, NULL, NULL),
(72, 'term_condition_delete', NULL, NULL, NULL),
(73, 'term_condition_access', NULL, NULL, NULL),
(74, 'budget_create', NULL, NULL, NULL),
(75, 'budget_edit', NULL, NULL, NULL),
(76, 'budget_show', NULL, NULL, NULL),
(77, 'budget_delete', NULL, NULL, NULL),
(78, 'budget_access', NULL, NULL, NULL),
(79, 'expense_type_create', NULL, NULL, NULL),
(80, 'expense_type_edit', NULL, NULL, NULL),
(81, 'expense_type_show', NULL, NULL, NULL),
(82, 'expense_type_delete', NULL, NULL, NULL),
(83, 'expense_type_access', NULL, NULL, NULL),
(84, 'profile_password_edit', NULL, NULL, NULL),
(85, 'bank_account_show', NULL, NULL, NULL),
(86, 'bank_account_edit', NULL, NULL, NULL),
(87, 'bank_account_delete', NULL, NULL, NULL),
(88, 'bank_account_create', NULL, NULL, NULL),
(89, 'bank_account_access', NULL, NULL, NULL),
(90, 'cheques_show', '2024-06-23 21:48:36', '2024-06-23 21:48:36', NULL),
(91, 'cheques_edit', '2024-06-23 21:48:41', '2024-06-23 21:48:41', NULL),
(92, 'cheques_delete', '2024-06-23 21:48:46', '2024-06-23 21:48:46', NULL),
(93, 'cheques_create', '2024-06-23 21:48:52', '2024-06-23 21:48:52', NULL),
(94, 'cheques_access', '2024-06-23 21:48:55', '2024-06-23 21:48:55', NULL),
(95, 'products_access', '2024-06-25 03:22:53', '2024-06-25 03:22:53', NULL),
(96, 'products_create', '2024-06-25 03:22:57', '2024-06-25 03:22:57', NULL),
(97, 'products_delete', '2024-06-25 03:23:01', '2024-06-25 03:23:01', NULL),
(98, 'products_edit', '2024-06-25 03:23:05', '2024-06-25 03:23:05', NULL),
(99, 'products_show', '2024-06-25 03:23:09', '2024-06-25 03:23:09', NULL),
(100, 'documents_access', '2024-06-25 04:46:47', '2024-06-25 04:46:47', NULL),
(101, 'documents_create', '2024-06-25 04:46:51', '2024-06-25 04:46:51', NULL),
(102, 'documents_delete', '2024-06-25 04:46:54', '2024-06-25 04:46:54', NULL),
(103, 'documents_edit', '2024-06-25 04:46:58', '2024-06-25 04:46:58', NULL),
(104, 'documents_show', '2024-06-25 04:47:01', '2024-06-25 04:47:01', NULL),
(105, 'budget_details_access', '2024-06-25 23:17:12', '2024-06-25 23:17:12', NULL),
(106, 'budget_details_create', '2024-06-25 23:17:19', '2024-06-25 23:17:19', NULL),
(107, 'budget_details_delete', '2024-06-25 23:17:23', '2024-06-25 23:17:23', NULL),
(108, 'budget_details_edit', '2024-06-25 23:17:27', '2024-06-25 23:17:27', NULL),
(109, 'budget_details_show', '2024-06-25 23:17:31', '2024-06-25 23:17:31', NULL),
(110, 'party_bills_access', '2024-06-26 02:37:08', '2024-06-26 02:37:08', NULL),
(111, 'party_bills_create', '2024-06-26 02:37:12', '2024-06-26 02:37:12', NULL),
(112, 'party_bills_delete', '2024-06-26 02:37:15', '2024-06-26 02:37:15', NULL),
(113, 'party_bills_edit', '2024-06-26 02:37:18', '2024-06-26 02:37:18', NULL),
(114, 'party_bills_show', '2024-06-26 02:37:22', '2024-06-26 02:37:22', NULL),
(115, 'disbursements_access', '2024-06-26 03:23:21', '2024-06-26 03:23:21', NULL),
(116, 'disbursements_create', '2024-06-26 03:23:24', '2024-06-26 03:23:24', NULL),
(117, 'disbursements_delete', '2024-06-26 03:23:31', '2024-06-26 03:23:31', NULL),
(118, 'disbursements_edit', '2024-06-26 03:23:34', '2024-06-26 03:23:34', NULL),
(119, 'disbursements_show', '2024-06-26 03:23:39', '2024-06-26 03:23:39', NULL),
(120, 'bar_codes_access', '2024-06-27 02:46:12', '2024-06-27 02:46:12', NULL),
(121, 'bar_codes_create', '2024-06-27 02:46:17', '2024-06-27 02:46:17', NULL),
(122, 'bar_codes_delete', '2024-06-27 02:46:21', '2024-06-27 02:46:21', NULL),
(123, 'bar_codes_edit', '2024-06-27 02:46:25', '2024-06-27 02:46:25', NULL),
(124, 'bar_codes_show', '2024-06-27 02:46:29', '2024-06-27 02:46:29', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
