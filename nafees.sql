-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 09:59 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nafees`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `title`, `contact`, `cat`, `type`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'Walk-in Customer', NULL, NULL, 'Customer', NULL, '2023-06-27 06:07:57', '2023-06-27 06:07:57'),
(2, 'Cash Account', NULL, 'Cash', 'Business', NULL, '2023-06-27 06:07:57', '2023-06-27 07:38:56'),
(3, 'Ibrahim Carped', NULL, NULL, 'Supplier', NULL, '2023-06-27 06:15:20', '2023-06-27 06:15:20'),
(4, 'Zia Carpets', NULL, NULL, 'Customer', NULL, '2023-06-27 06:15:34', '2023-06-27 06:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `desc`, `created_at`, `updated_at`) VALUES
(1, 1, 'Signed In', '2023-06-27 06:08:46', '2023-06-27 06:08:46'),
(2, 1, 'New Product Added Code: 1235', '2023-06-27 06:14:05', '2023-06-27 06:14:05'),
(3, 1, 'New Product Added Code: 748', '2023-06-27 06:14:45', '2023-06-27 06:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,2) UNSIGNED NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,2) UNSIGNED NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inflows`
--

CREATE TABLE `inflows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `paidFrom` bigint(20) UNSIGNED DEFAULT NULL,
  `isPaid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inflows`
--

INSERT INTO `inflows` (`id`, `from`, `date`, `paidFrom`, `isPaid`, `status`, `ref`, `created_at`, `updated_at`) VALUES
(1, 3, '2023-06-27', 2, 'yes', 'draft', 3, '2023-06-27 06:15:55', '2023-06-27 06:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `inflow_details`
--

CREATE TABLE `inflow_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `stock_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) UNSIGNED NOT NULL,
  `qty` decimal(8,2) UNSIGNED NOT NULL,
  `warehouse` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inflow_details`
--

INSERT INTO `inflow_details` (`id`, `bill_id`, `product_id`, `stock_id`, `price`, `qty`, `warehouse`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '130000.00', '10.00', 1, '2023-06-27 06:16:57', '2023-06-27 06:16:57'),
(2, 1, 2, 2, '20000.00', '10.00', 1, '2023-06-27 06:17:04', '2023-06-27 06:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `warehouse` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `db` decimal(8,2) UNSIGNED DEFAULT NULL,
  `cr` decimal(8,2) UNSIGNED DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `product_id`, `warehouse`, `date`, `db`, `cr`, `desc`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-06-27', NULL, '10.00', 'Inflow Bill No. 1', '2023-06-27 06:16:57', '2023-06-27 06:16:57'),
(2, 2, 1, '2023-06-27', NULL, '10.00', 'Inflow Bill No. 1', '2023-06-27 06:17:04', '2023-06-27 06:17:04'),
(3, 1, 1, '2023-06-27', '3.00', NULL, 'Invoice No. 1', '2023-06-27 06:19:22', '2023-06-27 06:19:22'),
(4, 1, 1, '2023-06-27', '0.89', NULL, 'Invoice No. 1', '2023-06-27 06:20:11', '2023-06-27 06:20:11'),
(6, 1, 1, '2023-06-27', '1.00', NULL, 'Invoice No. 3', '2023-06-27 07:44:56', '2023-06-27 07:44:56'),
(7, 1, 1, '2023-06-27', '1.00', NULL, 'Invoice No. 4', '2023-06-27 07:55:29', '2023-06-27 07:55:29');

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
(1, '2014_05_10_135901_create_settings_table', 1),
(2, '2014_05_21_222959_create_accounts_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_05_10_210056_create_activity_logs_table', 1),
(8, '2023_05_15_110700_create_products_table', 1),
(9, '2023_05_21_015326_create_warehouses_table', 1),
(10, '2023_05_21_215415_create_inflows_table', 1),
(11, '2023_05_21_215434_create_outflows_table', 1),
(12, '2023_05_24_100826_create_inflow_details_table', 1),
(13, '2023_05_25_222106_create_inventories_table', 1),
(14, '2023_05_27_155147_create_transactions_table', 1),
(15, '2023_05_28_123102_create_outflow_details_table', 1),
(16, '2023_05_30_235002_create_deposits_table', 1),
(17, '2023_05_31_164403_create_withdraws_table', 1),
(18, '2023_05_31_171354_create_transfers_table', 1),
(19, '2023_06_24_162119_create_refs_table', 1),
(20, '2023_06_26_113418_create_expenses_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `outflows`
--

CREATE TABLE `outflows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `to` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `paidIn` bigint(20) UNSIGNED DEFAULT NULL,
  `isPaid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` double(8,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `amountPaid` double(8,2) UNSIGNED DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outflows`
--

INSERT INTO `outflows` (`id`, `to`, `date`, `paidIn`, `isPaid`, `discount`, `amountPaid`, `desc`, `ref`, `created_at`, `updated_at`) VALUES
(1, 4, '2023-06-27', 2, 'yes', 0.00, NULL, NULL, 4, '2023-06-27 06:17:33', '2023-06-27 06:17:33'),
(2, 1, '2023-06-27', 2, 'yes', 3000.00, NULL, NULL, 5, '2023-06-27 06:56:03', '2023-06-27 06:56:31'),
(3, 4, '2023-06-27', NULL, 'no', 0.00, NULL, NULL, 6, '2023-06-27 07:39:46', '2023-06-27 07:39:59'),
(4, 4, '2023-06-27', 2, 'partial', 10000.00, 50000.00, NULL, 8, '2023-06-27 07:55:20', '2023-06-27 07:55:45');

-- --------------------------------------------------------

--
-- Table structure for table `outflow_details`
--

CREATE TABLE `outflow_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `stock_id` bigint(20) UNSIGNED NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warehouse` bigint(20) UNSIGNED NOT NULL,
  `width` decimal(10,5) UNSIGNED NOT NULL,
  `length` decimal(10,5) UNSIGNED NOT NULL,
  `sqf` decimal(10,5) UNSIGNED NOT NULL,
  `price` double(8,2) UNSIGNED NOT NULL,
  `qty` decimal(8,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outflow_details`
--

INSERT INTO `outflow_details` (`id`, `bill_id`, `product_id`, `stock_id`, `unit`, `warehouse`, `width`, `length`, `sqf`, `price`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 'Roll', 1, '13.00000', '90.00000', '1170.00000', 385000.00, '3.00', '2023-06-27 06:19:22', '2023-06-27 06:19:22'),
(2, 1, 1, 4, 'Piece', 1, '13.00000', '20.00000', '260.00000', 329.06, '4.00', '2023-06-27 06:20:11', '2023-06-27 06:20:11'),
(4, 3, 1, 6, 'Roll', 1, '13.00000', '90.00000', '1170.00000', 385000.00, '1.00', '2023-06-27 07:44:56', '2023-06-27 07:44:56'),
(5, 4, 1, 7, 'Roll', 1, '13.00000', '90.00000', '1170.00000', 385000.00, '1.00', '2023-06-27 07:55:29', '2023-06-27 07:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` decimal(10,3) UNSIGNED NOT NULL,
  `width` decimal(10,3) UNSIGNED NOT NULL,
  `sqf` decimal(8,3) UNSIGNED NOT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `title`, `color`, `unit`, `length`, `width`, `sqf`, `price`, `img`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1235', 'Test Product', 'Gray & Green', 'Roll', '90.000', '13.000', '1170.000', 385000, '/products1/1235_1687846445.jpg', NULL, '2023-06-27 06:14:05', '2023-06-27 06:14:05'),
(2, '748', 'Another one', 'Blue & Green', 'Nos', '10.000', '13.000', '130.000', 23000, '/products1/748_1687846485.jpg', NULL, '2023-06-27 06:14:45', '2023-06-27 06:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `refs`
--

CREATE TABLE `refs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `refs`
--

INSERT INTO `refs` (`id`, `ref`, `created_at`, `updated_at`) VALUES
(1, 8, '2023-06-27 06:15:20', '2023-06-27 07:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr_line_one` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr_line_two` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr_line_three` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `proName`, `phone`, `mobile`, `addr_line_one`, `addr_line_two`, `addr_line_three`, `created_at`, `updated_at`) VALUES
(1, 'Carpet & Rugs', '03123456789', '03123456789', 'Shop No. 123', 'Abc Plaza', 'Quetta', '2023-06-27 06:07:57', '2023-06-27 06:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `cr` decimal(20,5) UNSIGNED DEFAULT NULL,
  `db` decimal(20,5) UNSIGNED DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `account_id`, `date`, `cr`, `db`, `desc`, `ref`, `created_at`, `updated_at`) VALUES
(1, 2, '2023-06-27', '0.00000', '1500000.00000', 'Payment of Bill no. 1', 3, '2023-06-27 06:15:55', '2023-06-27 06:17:04'),
(4, 2, '2023-06-27', '1497222.40000', '0.00000', 'Payment received of Invoice no. 1', 4, '2023-06-27 06:20:11', '2023-06-27 06:20:11'),
(10, 4, '2023-06-27', '385000.00000', '0.00000', 'Pending Amount of Invoice no. 3', 6, '2023-06-27 07:44:56', '2023-06-27 07:44:56'),
(11, 4, '2023-06-27', '0.00000', '50000.00000', '<b>Transfered to Cash Account</b><br/>Payment', 7, '2023-06-27 07:45:34', '2023-06-27 07:45:34'),
(12, 2, '2023-06-27', '50000.00000', '0.00000', '<b>Transfered from Zia Carpets</b><br/>Payment', 7, '2023-06-27 07:45:34', '2023-06-27 07:45:34'),
(15, 4, '2023-06-27', '375000.00000', '50000.00000', 'Pending Amount of Invoice no. 4', 8, '2023-06-27 07:55:45', '2023-06-27 07:55:45'),
(16, 2, '2023-06-27', '50000.00000', '0.00000', 'Pending Amount of Invoice no. 4', 8, '2023-06-27 07:55:45', '2023-06-27 07:55:45');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` bigint(20) UNSIGNED NOT NULL,
  `to` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,2) UNSIGNED NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`id`, `from`, `to`, `date`, `amount`, `desc`, `ref`, `created_at`, `updated_at`) VALUES
(1, 4, 2, '2023-06-27', '50000.00', 'Payment', 7, '2023-06-27 07:45:34', '2023-06-27 07:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '$2a$12$FOw6hdNwbW7mbQSEYrCHVeuRB/0fnyIxV0K3GjoV.b4QTnf5V3.Du', NULL, 'en', '2023-06-27 06:07:57', '2023-06-27 06:07:57'),
(2, 'SuperAdmin', '$2a$12$X/RW9GYPN1skwcZNRm1YuOQiW5EZ05f/dueQgx3UQJ2aJevpR6dbK', NULL, 'en', '2023-06-27 06:07:57', '2023-06-27 06:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Warhouse 1', 'Basement', '2023-06-27 06:16:22', '2023-06-27 06:16:22'),
(2, 'Warehouse 2', 'Top Floor', '2023-06-27 06:16:31', '2023-06-27 06:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,2) UNSIGNED NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deposits_account_id_foreign` (`account_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_account_id_foreign` (`account_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inflows`
--
ALTER TABLE `inflows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inflows_from_foreign` (`from`),
  ADD KEY `inflows_paidfrom_foreign` (`paidFrom`);

--
-- Indexes for table `inflow_details`
--
ALTER TABLE `inflow_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inflow_details_bill_id_foreign` (`bill_id`),
  ADD KEY `inflow_details_product_id_foreign` (`product_id`),
  ADD KEY `inflow_details_warehouse_foreign` (`warehouse`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventories_product_id_foreign` (`product_id`),
  ADD KEY `inventories_warehouse_foreign` (`warehouse`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outflows`
--
ALTER TABLE `outflows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `outflows_to_foreign` (`to`),
  ADD KEY `outflows_paidin_foreign` (`paidIn`);

--
-- Indexes for table `outflow_details`
--
ALTER TABLE `outflow_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `outflow_details_bill_id_foreign` (`bill_id`),
  ADD KEY `outflow_details_product_id_foreign` (`product_id`),
  ADD KEY `outflow_details_warehouse_foreign` (`warehouse`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refs`
--
ALTER TABLE `refs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_account_id_foreign` (`account_id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transfers_from_foreign` (`from`),
  ADD KEY `transfers_to_foreign` (`to`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`),
  ADD KEY `withdraws_account_id_foreign` (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
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
-- AUTO_INCREMENT for table `inflows`
--
ALTER TABLE `inflows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inflow_details`
--
ALTER TABLE `inflow_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `outflows`
--
ALTER TABLE `outflows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `outflow_details`
--
ALTER TABLE `outflow_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `refs`
--
ALTER TABLE `refs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `deposits`
--
ALTER TABLE `deposits`
  ADD CONSTRAINT `deposits_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `inflows`
--
ALTER TABLE `inflows`
  ADD CONSTRAINT `inflows_from_foreign` FOREIGN KEY (`from`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `inflows_paidfrom_foreign` FOREIGN KEY (`paidFrom`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `inflow_details`
--
ALTER TABLE `inflow_details`
  ADD CONSTRAINT `inflow_details_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `inflows` (`id`),
  ADD CONSTRAINT `inflow_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `inflow_details_warehouse_foreign` FOREIGN KEY (`warehouse`) REFERENCES `warehouses` (`id`);

--
-- Constraints for table `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `inventories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `inventories_warehouse_foreign` FOREIGN KEY (`warehouse`) REFERENCES `warehouses` (`id`);

--
-- Constraints for table `outflows`
--
ALTER TABLE `outflows`
  ADD CONSTRAINT `outflows_paidin_foreign` FOREIGN KEY (`paidIn`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `outflows_to_foreign` FOREIGN KEY (`to`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `outflow_details`
--
ALTER TABLE `outflow_details`
  ADD CONSTRAINT `outflow_details_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `outflows` (`id`),
  ADD CONSTRAINT `outflow_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `outflow_details_warehouse_foreign` FOREIGN KEY (`warehouse`) REFERENCES `warehouses` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `transfers`
--
ALTER TABLE `transfers`
  ADD CONSTRAINT `transfers_from_foreign` FOREIGN KEY (`from`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `transfers_to_foreign` FOREIGN KEY (`to`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD CONSTRAINT `withdraws_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
