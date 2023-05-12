-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 04:58 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'editor',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `email_verified`, `role`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'Admin', 'super_admin', 'dd@dd', 1, '1', '11', '$2y$10$v.9.DvMRNkwe0G4q9OT4qek7LmwaBNOQ3/azYrGGI08Q1nQMYQ4oy', 'XZarUn7w0oPCbl6gSIOiYSIKFcIIQYC3m01zC5v35zwTSET4uVbO6kyWTTyf', '2022-05-19 05:38:22', '2022-10-05 12:14:20'),
(9, 'Rafael Duffy', 'admin', 'juleku@mailinator.co', 0, 'editor', '12', '$2y$10$QiHEk2z/lFU8P36N7lgIzeOp/bQ0KF0ub1puWuFLhIh1W3lQv6d8y', NULL, '2022-10-01 10:42:56', '2022-10-05 12:06:06'),
(11, 'New Name', 'ferumasop', 'nm@mailinator.com', 0, 'editor', '11', '$2y$10$I0lpk0Kz1LX11/WGj46cLuv4oFVZLCLvNC1EQ5kDNmx07J.s6VE9W', NULL, '2022-10-05 11:50:57', '2022-10-05 12:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `name`, `permission`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '', '2020-05-15 10:00:00', '2020-07-27 10:41:15'),
(2, 'Editor', '', '2020-05-16 00:34:16', '2020-07-27 10:42:52'),
(3, 'Admin', '', '2020-05-16 00:34:29', '2020-07-27 10:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` bigint(20) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Xiaomi', 28, 'publish', '2022-10-09 01:14:55', '2022-10-09 01:14:55'),
(2, 'Toyota', 27, 'publish', '2022-10-09 01:15:56', '2022-10-09 01:15:56'),
(3, 'Sony', 26, 'publish', '2022-10-09 01:17:07', '2022-10-09 01:17:07'),
(4, 'Samsung', 25, 'publish', '2022-10-09 01:17:32', '2022-10-09 01:17:32'),
(5, 'Rolex', 24, 'publish', '2022-10-09 01:18:28', '2022-10-09 01:18:28'),
(6, 'Titan', 23, 'publish', '2022-10-09 01:18:48', '2022-10-09 01:18:48'),
(7, 'Oppo', 22, 'publish', '2022-10-09 01:19:16', '2022-10-09 01:19:16'),
(8, 'Hyundai', 21, 'publish', '2022-10-09 01:19:32', '2022-10-09 01:19:32'),
(9, 'LG', 20, 'publish', '2022-10-09 01:19:55', '2022-10-09 01:19:55'),
(10, 'Gucci', 19, 'publish', '2022-10-09 01:20:11', '2022-10-09 01:20:11'),
(11, 'Armani', 18, 'publish', '2022-10-09 01:20:32', '2022-10-09 01:20:32'),
(12, 'BMW', 17, 'publish', '2022-10-09 01:20:53', '2022-10-09 01:20:53'),
(13, 'Easy', 16, 'publish', '2022-10-09 01:21:07', '2022-10-09 01:21:07'),
(14, 'Apple', 15, 'publish', '2022-10-09 01:21:35', '2023-01-07 10:35:10'),
(15, 'Accer', 14, 'publish', '2022-10-09 01:21:49', '2022-10-09 01:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `color_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Black', '#0a0a0a', 1, '2023-01-07 09:49:53', '2023-01-07 09:49:53'),
(2, 'White', '#ffffff', 1, '2023-01-07 09:56:36', '2023-01-07 09:56:36'),
(3, 'Green', '#0ecc41', 1, '2023-01-07 09:57:07', '2023-01-07 09:57:07'),
(4, 'Blue', '#2069d6', 1, '2023-01-07 09:57:26', '2023-01-07 09:57:26'),
(7, 'Violet', '#661dcc', 0, '2023-01-07 10:00:14', '2023-01-07 10:17:08'),
(9, 'No Color', '#fff', 1, '2023-01-27 03:38:17', '2023-01-27 03:38:26');

-- --------------------------------------------------------

--
-- Table structure for table `color_product`
--

CREATE TABLE `color_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `color_product`
--

INSERT INTO `color_product` (`id`, `color_id`, `product_id`, `created_at`, `updated_at`) VALUES
(44, 2, 19, NULL, NULL),
(45, 3, 19, NULL, NULL),
(46, 4, 19, NULL, NULL),
(47, 2, 25, NULL, NULL),
(48, 3, 25, NULL, NULL),
(50, 2, 26, NULL, NULL),
(52, 1, 26, NULL, NULL),
(53, 2, 27, NULL, NULL),
(54, 1, 27, NULL, NULL),
(55, 4, 27, NULL, NULL),
(57, 1, 28, NULL, NULL),
(58, 4, 28, NULL, NULL),
(59, 1, 29, NULL, NULL),
(61, 1, 30, NULL, NULL),
(62, 1, 31, NULL, NULL),
(63, 2, 31, NULL, NULL),
(64, 1, 32, NULL, NULL),
(65, 2, 32, NULL, NULL),
(66, 1, 33, NULL, NULL),
(67, 2, 33, NULL, NULL),
(78, 1, 35, NULL, NULL),
(79, 4, 35, NULL, NULL),
(80, 1, 34, NULL, NULL),
(81, 2, 34, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'India', 'publish', '2022-10-05 04:22:17', '2022-10-05 04:51:33'),
(2, 'Bangladesh', 'publish', '2022-10-05 04:29:40', '2022-10-05 04:29:40'),
(3, 'Pakistan', 'publish', '2022-10-05 05:06:04', '2022-10-05 05:06:04'),
(10, 'China', 'publish', '2022-10-05 11:10:30', '2022-10-05 11:10:30'),
(11, 'Japan', 'publish', '2022-10-05 11:10:38', '2022-10-05 11:10:38'),
(12, 'Italy', 'publish', '2022-10-05 11:10:45', '2022-10-05 11:10:45'),
(13, 'England', 'publish', '2022-10-05 11:10:54', '2022-10-05 11:10:54'),
(14, 'Germany', 'publish', '2022-10-05 11:11:02', '2022-10-05 11:11:02'),
(15, 'Poland', 'publish', '2022-10-05 11:11:10', '2022-10-05 11:11:10'),
(16, 'Russia', 'publish', '2022-10-05 11:11:18', '2022-10-05 11:11:18'),
(17, 'Saudi Arabia', 'publish', '2022-10-05 11:11:28', '2022-10-05 11:11:28'),
(18, 'Oman', 'publish', '2022-10-05 11:11:35', '2022-10-05 11:11:35'),
(19, 'Iraq', 'publish', '2022-10-05 11:11:41', '2022-10-05 11:11:41'),
(20, 'Iran', 'publish', '2022-10-05 11:11:47', '2022-10-05 11:11:47'),
(21, 'Afghansthan', 'publish', '2022-10-05 11:11:57', '2022-10-05 11:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_use_qty` int(11) NOT NULL,
  `expire_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `title`, `code`, `discount_amount`, `discount_type`, `max_use_qty`, `expire_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Summer Offer', 'coupon-20', '20', 'flat', 3, '2023-04-04', 1, '2023-03-28 10:51:01', '2023-03-28 10:51:01'),
(2, 'Black Friday', 'coupon-50', '50', 'percentage', 2, '2023-03-31', 1, '2023-03-28 11:03:14', '2023-03-28 11:37:00'),
(6, 'Black Friday', 'coupon-5', '5', 'flat', 2, '2023-03-30', 1, '2023-03-28 11:04:58', '2023-03-29 09:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `customer_type` int(11) NOT NULL DEFAULT 0,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `country_id`, `customer_type`, `name`, `email`, `phone`, `city`, `address`, `nid`, `company_name`, `created_at`, `updated_at`) VALUES
(16, '21', 1, 'Jack Horne', 'fube@mailinator.com', '20', 'Dolor illum quo qui', 'Qui error quia moles', 'Sint dolore ullamco', 'Decker Harper LLC', '2022-10-07 07:18:10', '2022-10-07 07:18:10'),
(34, NULL, 0, 'Boss mama', 'dujepyhyj@mailinator.com', '97', NULL, 'Esse ea qui qui cons', NULL, NULL, '2023-04-21 07:51:10', '2023-04-21 07:51:10'),
(35, NULL, 0, 'Yuli Wells', 'bohosape@mailinator.com', '82', NULL, 'Doloribus rem eum cu', NULL, NULL, '2023-04-21 07:51:47', '2023-04-21 07:51:47'),
(36, NULL, 0, 'Quynn Barry', 'vulijyv@mailinator.com', '55', NULL, 'Eius alias corrupti', NULL, NULL, '2023-04-21 07:52:32', '2023-04-21 07:52:32'),
(37, NULL, 1, 'Jessica Ware', 'vekidode@mailinator.com', '26', NULL, 'Et quam obcaecati ni', NULL, NULL, '2023-04-21 11:49:26', '2023-04-21 11:49:26'),
(38, NULL, 0, 'Louis Mathews', 'rotez@mailinator.com', '29', NULL, 'Do facilis ut tempor', NULL, NULL, '2023-04-21 11:49:53', '2023-04-21 11:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'English (UK)',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `slug`, `direction`, `status`, `default`, `created_at`, `updated_at`) VALUES
(1, 'English (UK)', 'en_GB', 'ltr', 'publish', 1, '2021-06-26 20:31:44', '2021-09-20 03:23:57');

-- --------------------------------------------------------

--
-- Table structure for table `media_uploads`
--

CREATE TABLE `media_uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dimensions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media_uploads`
--

INSERT INTO `media_uploads` (`id`, `title`, `path`, `alt`, `size`, `dimensions`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1.jpg', '11664562472.jpg', NULL, '30.68 KB', '600 x 600 pixels', NULL, '2022-09-30 12:27:53', '2022-09-30 12:27:53'),
(2, 'custom-select.png', 'custom-select1664562487.png', NULL, '14.64 KB', '12 x 7 pixels', NULL, '2022-09-30 12:28:07', '2022-09-30 12:28:07'),
(3, 'favicon.png', 'favicon1664562487.png', NULL, '1.31 KB', '16 x 16 pixels', NULL, '2022-09-30 12:28:07', '2022-09-30 12:28:07'),
(4, 'logo-icon.png', 'logo-icon1664562487.png', NULL, '1.85 KB', '40 x 40 pixels', NULL, '2022-09-30 12:28:07', '2022-09-30 12:28:07'),
(5, 'logo-light-icon.png', 'logo-light-icon1664562488.png', NULL, '1.7 KB', '40 x 40 pixels', NULL, '2022-09-30 12:28:08', '2022-09-30 12:28:08'),
(6, 'logo-light-text.png', 'logo-light-text1664562488.png', NULL, '1.78 KB', '128 x 19 pixels', NULL, '2022-09-30 12:28:08', '2022-09-30 12:28:08'),
(7, 'logo-text.png', 'logo-text1664562488.png', NULL, '2.1 KB', '128 x 19 pixels', NULL, '2022-09-30 12:28:08', '2022-09-30 12:28:08'),
(8, 'login-register.jpg', 'login-register1664562523.jpg', NULL, '81.74 KB', '2500 x 1668 pixels', NULL, '2022-09-30 12:28:44', '2022-09-30 12:28:44'),
(9, '39400027_1830813170341097_6786871471047180288_n.jpg', '39400027-1830813170341097-6786871471047180288-n1664562958.jpg', NULL, '211.3 KB', '1080 x 1085 pixels', NULL, '2022-09-30 12:35:58', '2022-09-30 12:35:58'),
(10, 'istockphoto-1185010668-170667a.jpg', 'istockphoto-1185010668-170667a1664992926.jpg', NULL, '60.4 KB', '553 x 311 pixels', NULL, '2022-10-05 12:02:07', '2022-10-05 12:02:07'),
(11, '73460562_2600960863326320_4731128818410979328_n.jpg', '73460562-2600960863326320-4731128818410979328-n1664992926.jpg', NULL, '85.75 KB', '719 x 960 pixels', NULL, '2022-10-05 12:02:07', '2022-10-05 12:02:07'),
(12, 'tv-show-game-of-thrones-dragon-jon-snow-night-king-game-of-thrones-hd-wallpaper-preview.jpg', 'tv-show-game-of-thrones-dragon-jon-snow-night-king-game-of-thrones-hd-wallpaper-preview1664992927.jpg', NULL, '45.84 KB', '728 x 469 pixels', NULL, '2022-10-05 12:02:08', '2022-10-05 12:02:08'),
(13, 'money-heist-01.jpg', 'money-heist-011664992927.jpg', NULL, '237.8 KB', '1920 x 1080 pixels', NULL, '2022-10-05 12:02:08', '2022-10-05 12:02:08'),
(14, 'ACER-300x225.jpg', 'acer-300x2251665299676.jpg', NULL, '5.73 KB', '300 x 225 pixels', NULL, '2022-10-09 01:14:36', '2022-10-09 01:14:36'),
(15, 'APPLE-300x225.jpg', 'apple-300x2251665299676.jpg', NULL, '6.13 KB', '300 x 225 pixels', NULL, '2022-10-09 01:14:36', '2022-10-09 01:14:36'),
(16, 'download.jpg', 'download1665299676.jpg', NULL, '4.6 KB', '225 x 225 pixels', NULL, '2022-10-09 01:14:37', '2022-10-09 01:14:37'),
(17, 'bmw-logo.png', 'bmw-logo1665299676.png', NULL, '20.4 KB', '240 x 180 pixels', NULL, '2022-10-09 01:14:37', '2022-10-09 01:14:37'),
(18, 'download.png', 'download1665299677.png', NULL, '4.93 KB', '300 x 168 pixels', NULL, '2022-10-09 01:14:37', '2022-10-09 01:14:37'),
(19, 'gucci_logo.jpg', 'gucci-logo1665299677.jpg', NULL, '100.47 KB', '1600 x 1034 pixels', NULL, '2022-10-09 01:14:38', '2022-10-09 01:14:38'),
(20, 'images.jpg', 'images1665299678.jpg', NULL, '5.37 KB', '308 x 163 pixels', NULL, '2022-10-09 01:14:38', '2022-10-09 01:14:38'),
(21, 'Hyundai-logo.png', 'hyundai-logo1665299677.png', NULL, '30.22 KB', '2560 x 1440 pixels', NULL, '2022-10-09 01:14:38', '2022-10-09 01:14:38'),
(22, 'Oppo-300x225.jpg', 'oppo-300x2251665299679.jpg', NULL, '6.28 KB', '300 x 225 pixels', NULL, '2022-10-09 01:14:39', '2022-10-09 01:14:39'),
(23, 'Logo_of_Titan_Company,_May_2018.svg.png', 'logo-of-titan-company-may-2018svg1665299678.png', NULL, '57.79 KB', '1200 x 1189 pixels', NULL, '2022-10-09 01:14:39', '2022-10-09 01:14:39'),
(24, 'Rolex_logo.svg.png', 'rolex-logosvg1665299679.png', NULL, '50.76 KB', '1200 x 601 pixels', NULL, '2022-10-09 01:14:40', '2022-10-09 01:14:40'),
(25, 'Samsung-logo.jpg', 'samsung-logo1665299679.jpg', NULL, '28.67 KB', '450 x 450 pixels', NULL, '2022-10-09 01:14:40', '2022-10-09 01:14:40'),
(26, 'sony-logo.jpg', 'sony-logo1665299680.jpg', NULL, '10.65 KB', '500 x 200 pixels', NULL, '2022-10-09 01:14:40', '2022-10-09 01:14:40'),
(27, 'toyota-brand-logo-20321892.jpg', 'toyota-brand-logo-203218921665299680.jpg', NULL, '46.98 KB', '800 x 535 pixels', NULL, '2022-10-09 01:14:40', '2022-10-09 01:14:40'),
(28, 'v6SFsJMXfpi7u3UsMSPhQRxuvbFqdTgxGli1IMQi.png', 'v6sfsjmxfpi7u3usmsphqrxuvbfqdtgxgli1imqi1665299680.png', NULL, '41.01 KB', '1500 x 844 pixels', NULL, '2022-10-09 01:14:41', '2022-10-09 01:14:41'),
(29, 'sun-glasses.jpg', 'sun-glasses1674497747.jpg', NULL, '120.73 KB', '1080 x 1080 pixels', NULL, '2023-01-23 12:15:48', '2023-01-23 12:15:48'),
(30, 'jeans.png', 'jeans1674497752.png', NULL, '153.62 KB', '350 x 350 pixels', NULL, '2023-01-23 12:15:52', '2023-01-23 12:15:52'),
(31, 'shoe.jpg', 'shoe1674497752.jpg', NULL, '234.1 KB', '1080 x 1080 pixels', NULL, '2023-01-23 12:15:53', '2023-01-23 12:15:53'),
(32, 'shoe-2.jpg', 'shoe-21674497753.jpg', NULL, '378.76 KB', '1080 x 1080 pixels', NULL, '2023-01-23 12:15:54', '2023-01-23 12:15:54'),
(33, 't-shirt.jpg', 't-shirt1674497753.jpg', NULL, '306.63 KB', '1080 x 1080 pixels', NULL, '2023-01-23 12:15:54', '2023-01-23 12:15:54'),
(34, 'white-shirt.png', 'white-shirt1674497754.png', NULL, '287.31 KB', '1080 x 1080 pixels', NULL, '2023-01-23 12:15:55', '2023-01-23 12:15:55'),
(35, 'bag.jpg', 'bag1674497761.jpg', NULL, '201.18 KB', '1080 x 1080 pixels', NULL, '2023-01-23 12:16:01', '2023-01-23 12:16:01'),
(36, 'perfume.png', 'perfume1674497761.png', NULL, '173.36 KB', '1080 x 1080 pixels', NULL, '2023-01-23 12:16:01', '2023-01-23 12:16:01'),
(37, 'shoe.jpg', 'shoe1674497761.jpg', NULL, '18.36 KB', '350 x 350 pixels', NULL, '2023-01-23 12:16:02', '2023-01-23 12:16:02'),
(38, 'grid-waist-up-portrait-ha-rytwx16382487251649656610.jpg', 'grid-waist-up-portrait-ha-rytwx163824872516496566101674836388.jpg', NULL, '20.71 KB', '350 x 350 pixels', NULL, '2023-01-27 10:19:49', '2023-01-27 10:19:49'),
(39, 'grid-1-11649652532.jpg', 'grid-1-116496525321674836399.jpg', NULL, '24.47 KB', '350 x 350 pixels', NULL, '2023-01-27 10:19:59', '2023-01-27 10:19:59'),
(40, 'grid-1-61649662138.jpg', 'grid-1-616496621381674836399.jpg', NULL, '24.01 KB', '350 x 350 pixels', NULL, '2023-01-27 10:19:59', '2023-01-27 10:19:59'),
(41, 'grid-group-281649653406.jpg', 'grid-group-2816496534061674836399.jpg', NULL, '35.15 KB', '350 x 455 pixels', NULL, '2023-01-27 10:19:59', '2023-01-27 10:19:59'),
(42, 'grid-group-291649654565.jpg', 'grid-group-2916496545651674836399.jpg', NULL, '20.69 KB', '350 x 455 pixels', NULL, '2023-01-27 10:20:00', '2023-01-27 10:20:00');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_06_180949_create_admins_table', 1),
(5, '2019_12_07_071950_create_contact_info_items_table', 1),
(6, '2019_12_07_082524_create_static_options_table', 1),
(7, '2019_12_09_063224_create_testimonials_table', 1),
(8, '2019_12_10_125607_create_social_icons_table', 1),
(9, '2019_12_10_210247_create_blog_categories_table', 1),
(10, '2019_12_11_074345_create_blogs_table', 1),
(11, '2019_12_13_221931_create_languages_table', 1),
(12, '2019_12_29_113138_create_team_members_table', 1),
(13, '2020_01_25_155448_create_pages_table', 1),
(14, '2020_01_28_054211_create_faqs_table', 1),
(15, '2020_02_04_010636_create_newsletters_table', 1),
(16, '2020_03_29_075123_create_admin_roles_table', 1),
(17, '2020_04_14_082508_create_media_uploads_table', 1),
(18, '2020_04_22_065550_create_jobs_table', 1),
(19, '2020_04_22_065603_create_jobs_categories_table', 1),
(20, '2020_04_23_140942_create_events_table', 1),
(21, '2020_04_23_141011_create_events_categories_table', 1),
(22, '2020_06_14_081955_create_widgets_table', 1),
(23, '2020_07_02_125439_create_job_applicants_table', 1),
(24, '2020_07_04_143731_create_event_attendances_table', 1),
(25, '2020_07_04_173333_create_event_payment_logs_table', 1),
(26, '2020_07_06_154309_create_causes_table', 1),
(27, '2020_07_17_162008_create_image_galleries_table', 2),
(28, '2020_12_04_062950_create_image_gallery_categories_table', 2),
(29, '2021_02_19_092255_create_cause_updates_table', 3),
(30, '2020_07_07_150250_create_cause_logs_table', 4),
(31, '2021_02_20_08115319_create_cause_categories_table', 5),
(32, '2021_03_24_140243_create_menus_table', 5),
(33, '2021_03_27_113444_create_counterups_table', 5),
(34, '2021_04_08_122116_create_topbar_infos_table', 5),
(35, '2021_04_18_132805_create_header_sliders_table', 5),
(36, '2021_06_24_065557_create_comments_table', 5),
(37, '2021_07_04_052916_create_donation_withdraws_table', 5),
(38, '2021_07_23_160619_add_column_to_user_table', 6),
(39, '2021_07_23_183955_add_new_column_to_newsletters_table', 7),
(40, '2021_07_23_192801_create_permission_tables', 8),
(41, '2021_09_13_105614_create_success_stories_table', 9),
(42, '2021_09_13_110246_create_success_story_categories_table', 9),
(43, '2021_09_14_100349_create_client_areas_table', 10),
(44, '2021_09_19_044631_create_flag_reports_table', 11),
(45, '2021_09_19_044701_create_medical_documents_table', 11),
(46, '2021_09_19_090907_add_new_column_to_causes_table', 12),
(47, '2021_09_20_122226_create_support_tickets_table', 13),
(48, '2021_09_20_122306_create_support_ticket_messages_table', 13),
(49, '2021_09_20_124001_create_support_ticket_departments_table', 13),
(50, '2021_09_21_112550_add_badge_to_causes_table', 14),
(51, '2021_09_21_120538_add_emmergency_to_causes_table', 15),
(52, '2021_09_21_120623_add_emmergency_title_to_causes_table', 15),
(53, '2022_02_10_064944_add_column_tax_to_users_table', 16),
(71, '2022_02_10_111412_create_tax_logs_table', 17),
(72, '2022_02_13_044802_create_follow_campaigns_table', 17),
(73, '2022_02_15_073958_create_rewards_table', 17),
(74, '2022_02_16_072213_add_column_reward_to_causes_table', 18),
(75, '2022_02_16_130235_add_column_attachment_to_cause_logs_table', 19),
(76, '2022_02_17_054958_add_column_point_to_cause_logs_table', 20),
(78, '2022_02_19_050244_create_reward_redeems_table', 21),
(79, '2022_02_27_074610_add_column_subcribe_status_to_newsletters_table', 22),
(80, '2022_02_27_092346_add_column_custom_tip_status_to_causes_table', 23),
(81, '2022_05_07_045526_add_column_campaign_permission_to_users_table', 24),
(83, '2022_05_19_120053_create_notifications_table', 25),
(84, '2022_06_29_092352_create_gifts_table', 26),
(85, '2022_06_29_094024_create_cause_gift_table', 26),
(86, '2022_06_29_100938_add_column_image_to_gifts_table', 27),
(87, '2022_06_29_121946_add_column_gift_status_to_causes_table', 28),
(88, '2022_07_02_111611_add_column_gift_to_cause_logs_table', 29),
(89, '2022_07_02_120158_add_column_address_to_cause_logs_table', 30),
(90, '2022_05_15_100026_create_recurings_table', 31),
(91, '2022_05_17_140010_add_column_token_to_cause_logs_table', 31),
(92, '2022_07_07_102552_add_column_expire_to_recurings_table', 32),
(93, '2019_12_14_000001_create_personal_access_tokens_table', 33),
(94, '2022_08_13_115334_create_countries_table', 34),
(95, '2022_08_13_132444_create_mobile_sliders_table', 35),
(97, '2022_08_14_061548_add_column_custom_fields_to_cause_logs_table', 36),
(98, '2022_08_16_073632_add_column_monthly_donation_status_to_causes_table', 37),
(100, '2022_08_18_102443_add_column_company_and_indivitual_fields_to_cause_logs_table', 38),
(101, '2022_08_13_1153345_create_countries_table', 39),
(102, '2022_10_03_172445_create_customers_table', 39),
(103, '2022_10_03_174050_create_suppliers_table', 39),
(104, '2022_10_07_113706_create_product_categories_table', 40),
(105, '2022_10_07_113823_create_poduct_sub_categories_table', 40),
(106, '2022_10_09_054822_create_brands_table', 41),
(107, '2022_12_26_170244_create_products_table', 42),
(108, '2023_01_03_170917_create_colors_table', 42),
(109, '2023_01_03_170940_create_sizes_table', 42),
(110, '2023_01_07_173027_create_units_table', 43),
(111, '2022_12_2611_170244_create_products_table', 44),
(112, '2023_01_13_093642_create_color_product_user_table', 45),
(113, '2023_01_13_093954_create_product_size_table', 46),
(114, '2023_03_04_145229_create_virtual_carts_table', 47),
(115, '2023_03_26_155006_create_coupons_table', 48),
(116, '2023_04_21_090531_create_orders_table', 49),
(117, '2023_04_21_092923_create_order_products_table', 49);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Admin', 3),
(2, 'App\\Admin', 5),
(2, 'App\\Admin', 9),
(2, 'App\\Admin', 11),
(3, 'App\\Admin', 1),
(3, 'App\\Admin', 4),
(3, 'App\\Admin', 6),
(3, 'App\\Admin', 7),
(3, 'App\\Admin', 8);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cause_log_id` bigint(20) DEFAULT NULL,
  `user_campaign_id` bigint(20) DEFAULT NULL,
  `withdraw_id` bigint(20) DEFAULT NULL,
  `seen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `title`, `cause_log_id`, `user_campaign_id`, `withdraw_id`, `seen`, `created_at`, `updated_at`) VALUES
(453, 'cause_log', 'New donation payment done', 459, NULL, NULL, '0', '2022-08-16 02:02:01', '2022-08-16 02:02:01'),
(454, 'cause_log', 'New donation payment done', 460, NULL, NULL, '0', '2022-08-16 02:04:18', '2022-08-16 02:04:18'),
(455, 'cause_log', 'New donation payment done', 461, NULL, NULL, '0', '2022-08-16 02:10:58', '2022-08-16 02:10:58'),
(456, 'cause_log', 'New donation payment done', 462, NULL, NULL, '0', '2022-08-16 05:02:08', '2022-08-16 05:02:08'),
(457, 'cause_log', 'New donation payment done', 463, NULL, NULL, '0', '2022-08-16 05:42:34', '2022-08-16 05:42:34'),
(458, 'cause_log', 'New donation payment done', 464, NULL, NULL, '0', '2022-08-16 05:44:53', '2022-08-16 05:44:53'),
(459, 'cause_log', 'New donation payment done', 465, NULL, NULL, '0', '2022-08-16 05:45:41', '2022-08-16 05:45:41'),
(460, 'cause_log', 'New donation payment done', 466, NULL, NULL, '0', '2022-08-16 05:45:51', '2022-08-16 05:45:51'),
(461, 'cause_log', 'New donation payment done', 467, NULL, NULL, '0', '2022-08-16 05:46:29', '2022-08-16 05:46:29'),
(462, 'cause_log', 'New donation payment done', 468, NULL, NULL, '0', '2022-08-16 05:48:47', '2022-08-16 05:48:47'),
(463, 'cause_log', 'New donation payment done', 469, NULL, NULL, '0', '2022-08-17 04:35:20', '2022-08-17 04:35:20'),
(464, 'cause_log', 'New donation payment done', 470, NULL, NULL, '0', '2022-08-17 04:36:04', '2022-08-17 04:36:04'),
(465, 'cause_log', 'New donation payment done', 471, NULL, NULL, '0', '2022-08-17 06:37:38', '2022-08-17 06:37:38'),
(466, 'cause_log', 'New donation payment done', 472, NULL, NULL, '0', '2022-08-17 06:37:46', '2022-08-17 06:37:46'),
(467, 'cause_log', 'New donation payment done', 473, NULL, NULL, '0', '2022-08-18 04:09:58', '2022-08-18 04:09:58'),
(468, 'cause_log', 'New donation payment done', 474, NULL, NULL, '0', '2022-08-18 04:11:08', '2022-08-18 04:11:08'),
(469, 'cause_log', 'New donation payment done', 475, NULL, NULL, '0', '2022-08-18 04:12:56', '2022-08-18 04:12:56'),
(470, 'cause_log', 'New donation payment done', 476, NULL, NULL, '0', '2022-08-18 07:20:20', '2022-08-18 07:20:20'),
(471, 'cause_log', 'New donation payment done', 477, NULL, NULL, '0', '2022-08-18 07:25:15', '2022-08-18 07:25:15'),
(472, 'cause_log', 'New donation payment done', 1, NULL, NULL, '0', '2022-08-18 07:30:25', '2022-08-18 07:30:25'),
(473, 'cause_log', 'New donation payment done', 1, NULL, NULL, '0', '2022-08-18 07:30:53', '2022-08-18 07:30:53'),
(474, 'cause_log', 'New donation payment done', 1, NULL, NULL, '0', '2022-08-18 07:31:12', '2022-08-18 07:31:12'),
(475, 'cause_log', 'New donation payment done', 1, NULL, NULL, '0', '2022-08-18 07:58:16', '2022-08-18 07:58:16'),
(476, 'cause_log', 'New donation payment done', 1, NULL, NULL, '0', '2022-08-18 07:58:49', '2022-08-18 07:58:49'),
(477, 'cause_log', 'New donation payment done', 478, NULL, NULL, '0', '2022-08-18 08:01:39', '2022-08-18 08:01:39'),
(478, 'cause_log', 'New donation payment done', 479, NULL, NULL, '0', '2022-08-18 08:11:39', '2022-08-18 08:11:39'),
(479, 'cause_log', 'New donation payment done', 480, NULL, NULL, '0', '2022-08-18 09:48:21', '2022-08-18 09:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `bill_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_gateway` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `manual_payment_attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_payment_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `bill_date`, `payment_gateway`, `transaction_id`, `status`, `payment_status`, `manual_payment_attachment`, `cheque_number`, `cheque_payment_note`, `created_at`, `updated_at`) VALUES
(220, 16, '08-05-2023', 'cashfree', '1491445821', 'complete', 'complete', NULL, NULL, NULL, '2023-05-08 10:31:03', '2023-05-08 10:31:17'),
(221, 16, '08-05-2023', 'stripe', NULL, 'complete', 'complete', NULL, NULL, NULL, '2023-05-08 10:41:26', '2023-05-08 10:41:56'),
(222, 16, '12-05-2023', 'ssl_commerz', '0meRo0SwU0mg', 'complete', 'complete', NULL, NULL, NULL, '2023-05-11 20:57:57', '2023-05-11 20:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `single_quantity` bigint(20) DEFAULT NULL,
  `total_quantity` bigint(20) NOT NULL,
  `subtotal` double NOT NULL,
  `discount_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_percentage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `coupon_discount_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_percentage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_discount` double DEFAULT NULL,
  `vat_percentage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_amount` double DEFAULT NULL,
  `shipping_amount` double DEFAULT NULL,
  `payable_amount` double NOT NULL DEFAULT 0,
  `due_amount` double NOT NULL DEFAULT 0,
  `total_amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `single_quantity`, `total_quantity`, `subtotal`, `discount_type`, `discount_percentage`, `discount_amount`, `coupon_discount_type`, `coupon_percentage`, `coupon_discount`, `vat_percentage`, `vat_amount`, `shipping_amount`, `payable_amount`, `due_amount`, `total_amount`, `created_at`, `updated_at`) VALUES
(271, 220, 35, 2, 2, 200, 'none', '0', 0, 'none', NULL, 0, NULL, 0, 20, 220, 0, 220, '2023-05-08 10:31:03', '2023-05-08 10:31:03'),
(272, 221, 35, 1, 1, 100, 'none', '0', 0, 'none', NULL, 0, NULL, 0, NULL, 100, 0, 100, '2023-05-08 10:41:26', '2023-05-08 10:41:26'),
(273, 222, 35, 1, 3, 123, 'none', '0', 0, NULL, NULL, NULL, '0', 0, NULL, 123, 0, 123, '2023-05-11 20:57:57', '2023-05-11 20:57:57'),
(274, 222, 33, 1, 3, 123, 'none', '0', 0, NULL, NULL, NULL, '0', 0, NULL, 123, 0, 123, '2023-05-11 20:57:57', '2023-05-11 20:57:57'),
(275, 222, 34, 1, 3, 123, 'none', '0', 0, NULL, NULL, NULL, '0', 0, NULL, 123, 0, 123, '2023-05-11 20:57:57', '2023-05-11 20:57:57');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('dvrobin4@gmail.com', 'tBrVsCSxrJA0eJsOSkpFyNgeXleI1p', NULL),
('rajivkissy@gmail.com', 'lgcF2ZVWyOOZTG6BiP3c7gUmchTKDA', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(5, 'user-list', 'admin', '2021-07-24 15:38:14', '2021-07-24 15:39:16'),
(6, 'user-create', 'admin', '2021-07-24 15:38:14', '2021-07-24 15:39:16'),
(7, 'user-edit', 'admin', '2021-07-24 15:38:14', '2021-07-24 15:39:16'),
(8, 'user-delete', 'admin', '2021-07-24 15:38:14', '2021-07-24 15:39:16'),
(9, 'newsletter-list', 'admin', '2021-07-24 21:05:28', '2021-07-24 21:05:28'),
(10, 'newsletter-create', 'admin', '2021-07-24 21:05:28', '2021-07-24 21:05:28'),
(11, 'newsletter-mail-send', 'admin', '2021-07-24 21:05:28', '2021-07-24 21:05:28'),
(12, 'newsletter-delete', 'admin', '2021-07-24 21:05:28', '2021-07-24 21:05:28'),
(13, 'blog-list', 'admin', '2021-07-24 21:35:11', '2021-07-24 21:35:11'),
(14, 'blog-create', 'admin', '2021-07-24 21:35:11', '2021-07-24 21:35:11'),
(15, 'blog-edit', 'admin', '2021-07-24 21:35:11', '2021-07-24 21:35:11'),
(16, 'blog-delete', 'admin', '2021-07-24 21:35:11', '2021-07-24 21:35:11'),
(17, 'blog-page-settings', 'admin', '2021-07-24 21:35:11', '2021-07-24 21:35:11'),
(18, 'blog-single-page-settings', 'admin', '2021-07-24 21:35:11', '2021-07-24 21:35:11'),
(19, 'blog-category-list', 'admin', '2021-07-24 21:46:18', '2021-07-24 21:46:18'),
(20, 'blog-category-create', 'admin', '2021-07-24 21:46:18', '2021-07-24 21:46:18'),
(21, 'blog-category-edit', 'admin', '2021-07-24 21:46:19', '2021-07-24 21:46:19'),
(22, 'blog-category-delete', 'admin', '2021-07-24 21:46:19', '2021-07-24 21:46:19'),
(23, 'image-gallery-list', 'admin', '2021-07-24 22:09:59', '2021-07-24 22:09:59'),
(24, 'image-gallery-create', 'admin', '2021-07-24 22:09:59', '2021-07-24 22:09:59'),
(25, 'image-gallery-edit', 'admin', '2021-07-24 22:09:59', '2021-07-24 22:09:59'),
(26, 'image-gallery-delete', 'admin', '2021-07-24 22:09:59', '2021-07-24 22:09:59'),
(27, 'image-gallery-category-list', 'admin', '2021-07-24 22:09:59', '2021-07-24 22:09:59'),
(28, 'image-gallery-category-create', 'admin', '2021-07-24 22:09:59', '2021-07-24 22:09:59'),
(29, 'image-gallery-category-edit', 'admin', '2021-07-24 22:09:59', '2021-07-24 22:09:59'),
(30, 'image-gallery-category-delete', 'admin', '2021-07-24 22:09:59', '2021-07-24 22:09:59'),
(31, 'image-gallery-page-settings', 'admin', '2021-07-24 22:09:59', '2021-07-24 22:09:59'),
(32, 'faq-list', 'admin', '2021-07-24 22:34:37', '2021-07-24 22:34:37'),
(33, 'faq-create', 'admin', '2021-07-24 22:34:37', '2021-07-24 22:34:37'),
(34, 'faq-edit', 'admin', '2021-07-24 22:34:37', '2021-07-24 22:34:37'),
(35, 'faq-delete', 'admin', '2021-07-24 22:34:37', '2021-07-24 22:34:37'),
(36, 'team-member-list', 'admin', '2021-07-24 22:44:27', '2021-07-24 22:44:27'),
(37, 'team-member-create', 'admin', '2021-07-24 22:44:28', '2021-07-24 22:44:28'),
(38, 'team-member-edit', 'admin', '2021-07-24 22:44:28', '2021-07-24 22:44:28'),
(39, 'team-member-delete', 'admin', '2021-07-24 22:44:28', '2021-07-24 22:44:28'),
(40, 'page-list', 'admin', '2021-07-25 10:10:51', '2021-07-25 10:10:51'),
(41, 'page-create', 'admin', '2021-07-25 10:10:51', '2021-07-25 10:10:51'),
(42, 'page-edit', 'admin', '2021-07-25 10:10:52', '2021-07-25 10:10:52'),
(43, 'page-delete', 'admin', '2021-07-25 10:10:52', '2021-07-25 10:10:52'),
(44, 'testimonial-list', 'admin', '2021-07-25 10:31:39', '2021-07-25 10:31:39'),
(45, 'testimonial-create', 'admin', '2021-07-25 10:31:39', '2021-07-25 10:31:39'),
(46, 'testimonial-edit', 'admin', '2021-07-25 10:31:39', '2021-07-25 10:31:39'),
(47, 'testimonial-delete', 'admin', '2021-07-25 10:31:39', '2021-07-25 10:31:39'),
(48, 'counterup-list', 'admin', '2021-07-25 10:54:13', '2021-07-25 10:54:13'),
(49, 'counterup-create', 'admin', '2021-07-25 10:54:13', '2021-07-25 10:54:13'),
(50, 'counterup-edit', 'admin', '2021-07-25 10:54:13', '2021-07-25 10:54:13'),
(51, 'counterup-delete', 'admin', '2021-07-25 10:54:13', '2021-07-25 10:54:13'),
(52, 'job-list', 'admin', '2021-07-25 11:27:33', '2021-07-25 11:27:33'),
(53, 'job-create', 'admin', '2021-07-25 11:27:33', '2021-07-25 11:27:33'),
(54, 'job-edit', 'admin', '2021-07-25 11:27:33', '2021-07-25 11:27:33'),
(55, 'job-delete', 'admin', '2021-07-25 11:27:33', '2021-07-25 11:27:33'),
(56, 'job-category-list', 'admin', '2021-07-25 11:27:33', '2021-07-25 11:27:33'),
(57, 'job-category-create', 'admin', '2021-07-25 11:27:33', '2021-07-25 11:27:33'),
(58, 'job-category-edit', 'admin', '2021-07-25 11:27:34', '2021-07-25 11:27:34'),
(59, 'job-category-delete', 'admin', '2021-07-25 11:27:34', '2021-07-25 11:27:34'),
(60, 'job-applicant-view', 'admin', '2021-07-25 11:27:34', '2021-07-25 11:27:34'),
(61, 'job-applicant-delete', 'admin', '2021-07-25 11:27:34', '2021-07-25 11:27:34'),
(62, 'job-applicant-mail', 'admin', '2021-07-25 11:27:34', '2021-07-25 11:27:34'),
(63, 'job-applicant-report', 'admin', '2021-07-25 11:27:34', '2021-07-25 11:27:34'),
(64, 'job-settings', 'admin', '2021-07-25 11:27:34', '2021-07-25 11:27:34'),
(65, 'job-applicant-list', 'admin', '2021-07-25 11:37:19', '2021-07-25 11:37:19'),
(66, 'event-list', 'admin', '2021-07-25 19:04:04', '2021-07-25 19:04:04'),
(67, 'event-create', 'admin', '2021-07-25 19:04:04', '2021-07-25 19:04:04'),
(68, 'event-edit', 'admin', '2021-07-25 19:04:04', '2021-07-25 19:04:04'),
(69, 'event-delete', 'admin', '2021-07-25 19:04:04', '2021-07-25 19:04:04'),
(70, 'event-category-list', 'admin', '2021-07-25 19:04:04', '2021-07-25 19:04:04'),
(71, 'event-category-create', 'admin', '2021-07-25 19:04:04', '2021-07-25 19:04:04'),
(72, 'event-category-edit', 'admin', '2021-07-25 19:04:04', '2021-07-25 19:04:04'),
(73, 'event-category-delete', 'admin', '2021-07-25 19:04:04', '2021-07-25 19:04:04'),
(74, 'event-attendance-list', 'admin', '2021-07-25 19:04:05', '2021-07-25 19:04:05'),
(75, 'event-attendance-delete', 'admin', '2021-07-25 19:04:05', '2021-07-25 19:04:05'),
(76, 'event-attendance-edit', 'admin', '2021-07-25 19:04:05', '2021-07-25 19:04:05'),
(77, 'event-attendance-mail', 'admin', '2021-07-25 19:04:05', '2021-07-25 19:04:05'),
(78, 'event-payment-log-list', 'admin', '2021-07-25 19:04:05', '2021-07-25 19:04:05'),
(79, 'event-payment-log-delete', 'admin', '2021-07-25 19:04:05', '2021-07-25 19:04:05'),
(80, 'event-payment-log-view', 'admin', '2021-07-25 19:04:05', '2021-07-25 19:04:05'),
(81, 'event-attendance-report', 'admin', '2021-07-25 19:04:05', '2021-07-25 19:04:05'),
(82, 'event-payment-log-report', 'admin', '2021-07-25 19:04:05', '2021-07-25 19:04:05'),
(83, 'event-single-settings', 'admin', '2021-07-25 19:04:05', '2021-07-25 19:04:05'),
(84, 'event-settings', 'admin', '2021-07-25 19:04:05', '2021-07-25 19:04:05'),
(85, 'event-payment-log-edit', 'admin', '2021-07-25 20:03:27', '2021-07-25 20:03:27'),
(86, 'donation-list', 'admin', '2021-07-25 20:35:38', '2021-07-25 20:35:38'),
(87, 'donation-create', 'admin', '2021-07-25 20:35:38', '2021-07-25 20:35:38'),
(88, 'donation-edit', 'admin', '2021-07-25 20:35:38', '2021-07-25 20:35:38'),
(89, 'donation-delete', 'admin', '2021-07-25 20:35:38', '2021-07-25 20:35:38'),
(90, 'donation-category-list', 'admin', '2021-07-25 20:35:38', '2021-07-25 20:35:38'),
(91, 'donation-category-create', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(92, 'donation-category-edit', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(93, 'donation-category-delete', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(94, 'donation-pending-cause', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(95, 'donation-withdraw-list', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(96, 'donation-withdraw-edit', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(97, 'donation-withdraw-delete', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(98, 'donation-withdraw-view', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(99, 'donation-payment-list', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(100, 'donation-payment-edit', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(101, 'donation-payment-delete', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(102, 'donation-cause-report', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(103, 'donation-settings', 'admin', '2021-07-25 20:35:39', '2021-07-25 20:35:39'),
(104, 'appearance-topbar-settings', 'admin', '2021-07-25 22:00:48', '2021-07-25 22:00:48'),
(105, 'appearance-navbar-settings', 'admin', '2021-07-25 22:00:48', '2021-07-25 22:00:48'),
(106, 'appearance-home-variant', 'admin', '2021-07-25 22:00:48', '2021-07-25 22:00:48'),
(107, 'appearance-menu-manage-list', 'admin', '2021-07-25 22:00:48', '2021-07-25 22:00:48'),
(108, 'appearance-menu-manage-edit', 'admin', '2021-07-25 22:00:48', '2021-07-25 22:00:48'),
(109, 'appearance-menu-manage-delete', 'admin', '2021-07-25 22:00:48', '2021-07-25 22:00:48'),
(110, 'appearance-widget-manage', 'admin', '2021-07-25 22:00:49', '2021-07-25 22:00:49'),
(111, 'appearance-form-builder', 'admin', '2021-07-25 22:00:49', '2021-07-25 22:00:49'),
(112, 'appearance-media-image', 'admin', '2021-07-25 22:00:49', '2021-07-25 22:00:49'),
(113, 'appearance-menu-manage-create', 'admin', '2021-07-25 22:21:13', '2021-07-25 22:21:13'),
(114, 'page-settings-home-page-manage', 'admin', '2021-07-25 22:27:09', '2021-07-25 22:27:09'),
(115, 'page-settings-about-page-manage', 'admin', '2021-07-25 22:27:09', '2021-07-25 22:27:09'),
(116, 'page-settings-event-page-manage', 'admin', '2021-07-25 22:27:09', '2021-07-25 22:27:09'),
(117, 'page-settings-contact-page-manage', 'admin', '2021-07-25 22:27:09', '2021-07-25 22:27:09'),
(118, 'page-settings-error-page-manage', 'admin', '2021-07-25 22:27:09', '2021-07-25 22:27:09'),
(119, 'page-settings-maintain-page-manage', 'admin', '2021-07-25 22:27:09', '2021-07-25 22:27:09'),
(120, 'general-settings-site-identity', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(121, 'general-settings-basic-settings', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(122, 'general-settings-color-settings', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(123, 'general-settings-typography', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(124, 'general-settings-seo-settings', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(125, 'general-settings-third-party-script', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(126, 'general-settings-email-template', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(127, 'general-settings-smtp-settings', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(128, 'general-settings-regenerate-media-image', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(129, 'general-settings-page-settings', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(130, 'general-settings-payment-gateway', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(131, 'general-settings-custom-css', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(132, 'general-settings-custom-js', 'admin', '2021-07-25 22:42:37', '2021-07-25 22:42:37'),
(133, 'general-settings-cache-settings', 'admin', '2021-07-25 22:42:38', '2021-07-25 22:42:38'),
(134, 'general-settings-gdpr-settings', 'admin', '2021-07-25 22:42:38', '2021-07-25 22:42:38'),
(135, 'general-settings-sitemap', 'admin', '2021-07-25 22:42:38', '2021-07-25 22:42:38'),
(136, 'general-settings-rss-feed', 'admin', '2021-07-25 22:42:38', '2021-07-25 22:42:38'),
(137, 'general-settings-license', 'admin', '2021-07-25 22:42:38', '2021-07-25 22:42:38'),
(138, 'language-list', 'admin', '2021-07-25 23:20:00', '2021-07-25 23:20:00'),
(139, 'language-edit', 'admin', '2021-07-25 23:20:00', '2021-07-25 23:20:00'),
(140, 'language-create', 'admin', '2021-07-25 23:20:00', '2021-07-25 23:20:00'),
(141, 'language-delete', 'admin', '2021-07-25 23:20:00', '2021-07-25 23:20:00'),
(142, 'success-story-list', 'admin', '2021-09-16 03:35:08', '2021-09-16 03:35:08'),
(143, 'success-story-edit', 'admin', '2021-09-16 03:35:08', '2021-09-16 03:35:08'),
(144, 'success-story-create', 'admin', '2021-09-16 03:35:08', '2021-09-16 03:35:08'),
(145, 'success-story-delete', 'admin', '2021-09-16 03:35:08', '2021-09-16 03:35:08'),
(146, 'success-story-category-list', 'admin', '2021-09-16 03:35:08', '2021-09-16 03:35:08'),
(147, 'success-story-category-edit', 'admin', '2021-09-16 03:35:08', '2021-09-16 03:35:08'),
(148, 'success-story-category-create', 'admin', '2021-09-16 03:35:09', '2021-09-16 03:35:09'),
(149, 'success-story-category-delete', 'admin', '2021-09-16 03:35:09', '2021-09-16 03:35:09'),
(150, 'client-area-list', 'admin', '2021-09-16 03:35:09', '2021-09-16 03:35:09'),
(151, 'client-area-edit', 'admin', '2021-09-16 03:35:09', '2021-09-16 03:35:09'),
(152, 'client-area-create', 'admin', '2021-09-16 03:35:09', '2021-09-16 03:35:09'),
(153, 'client-area-delete', 'admin', '2021-09-16 03:35:09', '2021-09-16 03:35:09'),
(154, 'page-settings-success-story-page-manage', 'admin', '2021-09-16 04:43:50', '2021-09-16 04:43:50'),
(155, 'donations-flag-report-list', 'admin', '2021-09-18 23:16:18', '2021-09-18 23:16:18'),
(158, 'donations-flag-report-delete', 'admin', '2021-09-18 23:16:18', '2021-09-18 23:16:18'),
(163, 'donations-flag-report-view', 'admin', NULL, NULL),
(164, 'donations-flag-report-mail-send', 'admin', NULL, NULL),
(165, 'donations-flag-report-status-update', 'admin', '2021-09-19 10:29:29', NULL),
(166, 'general-settings-database-upgrade', 'admin', NULL, NULL),
(167, 'support-ticket-index', 'admin', '2021-09-21 01:32:50', '2021-09-21 01:32:50'),
(168, 'support-ticket-create', 'admin', '2021-09-21 01:32:50', '2021-09-21 01:32:50'),
(169, 'support-ticket-view', 'admin', '2021-09-21 01:32:50', '2021-09-21 01:32:50'),
(170, 'support-ticket-delete', 'admin', '2021-09-21 01:32:50', '2021-09-21 01:32:50'),
(171, 'support-ticket-page-settings', 'admin', '2021-09-21 01:32:50', '2021-09-21 01:32:50'),
(172, 'support-ticket-category-index', 'admin', '2021-09-21 01:32:51', '2021-09-21 01:32:51'),
(173, 'support-ticket-category-create', 'admin', '2021-09-21 01:32:51', '2021-09-21 01:32:51'),
(174, 'support-ticket-category-edit', 'admin', '2021-09-21 01:32:51', '2021-09-21 01:32:51'),
(175, 'support-ticket-category-delete', 'admin', '2021-09-21 01:32:51', '2021-09-21 01:32:51'),
(176, 'register-page-manage', 'admin', '2022-02-12 07:39:46', '2022-02-12 07:39:46'),
(177, 'user-tax-list', 'admin', '2022-02-12 07:39:46', '2022-02-12 07:39:46'),
(178, 'user-tax-delete', 'admin', '2022-02-12 07:39:46', '2022-02-12 07:39:46'),
(179, 'reward-list', 'admin', '2022-02-15 03:55:44', '2022-02-15 03:55:44'),
(180, 'reward-create', 'admin', '2022-02-15 03:55:44', '2022-02-15 03:55:44'),
(181, 'reward-edit', 'admin', '2022-02-15 03:55:44', '2022-02-15 03:55:44'),
(182, 'reward-delete', 'admin', '2022-02-15 03:55:44', '2022-02-15 03:55:44'),
(183, 'reward-redeem-list', 'admin', '2022-02-20 00:59:13', '2022-02-20 00:59:13'),
(184, 'reward-redeem-edit', 'admin', '2022-02-20 00:59:13', '2022-02-20 00:59:13'),
(185, 'reward-redeem-delete', 'admin', '2022-02-20 00:59:13', '2022-02-20 00:59:13'),
(186, 'reward-redeem-view', 'admin', '2022-02-20 00:59:13', '2022-02-20 00:59:13'),
(187, 'donation-gift-list', 'admin', '2022-06-29 03:57:06', '2022-06-29 03:57:06'),
(188, 'donation-gift-edit', 'admin', '2022-06-29 03:57:06', '2022-06-29 03:57:06'),
(189, 'donation-gift-create', 'admin', '2022-06-29 03:57:06', '2022-06-29 03:57:06'),
(190, 'donation-gift-delete', 'admin', '2022-06-29 03:57:06', '2022-06-29 03:57:06'),
(191, 'mobile-slider-list', 'admin', '2022-08-13 22:09:09', '2022-08-13 22:09:09'),
(192, 'mobile-slider-edit', 'admin', '2022-08-13 22:09:09', '2022-08-13 22:09:09'),
(193, 'mobile-slider-create', 'admin', '2022-08-13 22:09:09', '2022-08-13 22:09:09'),
(194, 'mobile-slider-delete', 'admin', '2022-08-13 22:09:09', '2022-08-13 22:09:09');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(4, 'App\\User', 41, 'fundorexapi_keys', '9fb529a0914862b9d259aa88bb427c89bcdeefdc6b64c8c5a3f7ad81c7610928', '[\"*\"]', NULL, '2022-08-13 04:49:26', '2022-08-13 04:49:26'),
(5, 'App\\User', 41, 'fundorexapi_keys', '968efce2f3d3804d4215e52d4e068af221685df18b0141fbfcb461ec7748e5ce', '[\"*\"]', NULL, '2022-08-13 04:53:53', '2022-08-13 04:53:53'),
(23, 'App\\User', 43, 'fundorexapi_keys', '01e16c8be2ddeecb36cb4a2a4f3954ff8ff1e42c84c5195c248557464b9f9b3d', '[\"*\"]', NULL, '2022-08-16 00:21:25', '2022-08-16 00:21:25'),
(24, 'App\\User', 44, 'fundorexapi_keys', 'f315af234a855181aebcb471bd9ba000dad8d42bb7293a66624212f40e883ad9', '[\"*\"]', NULL, '2022-08-16 00:22:45', '2022-08-16 00:22:45'),
(30, 'App\\User', 42, 'fundorexapi_keys', '92240ea55fcf9cf7cff8af9fe1032c71379f853c6030874df21930ef2ea9c725', '[\"*\"]', '2022-08-17 03:58:11', '2022-08-17 03:57:41', '2022-08-17 03:58:11'),
(31, 'App\\User', 42, 'fundorexapi_keys', '7bf6f220cdff0398d824eca3c647589d897f162183019f05425da11324996d90', '[\"*\"]', '2022-08-17 05:46:07', '2022-08-17 04:37:38', '2022-08-17 05:46:07'),
(32, 'App\\User', 42, 'fundorexapi_keys', '35f8ac5cad6aa85bf257ab8b89f384a7622f34ae7a308bfd835588ff28cb7b84', '[\"*\"]', '2022-08-17 06:28:18', '2022-08-17 06:11:53', '2022-08-17 06:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_price` double NOT NULL,
  `sale_price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `barcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` bigint(20) DEFAULT NULL,
  `alert_qty` bigint(20) DEFAULT NULL,
  `alert_message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sold_count` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_category_id`, `product_subcategory_id`, `brand_id`, `unit_id`, `product_code`, `product_name`, `product_description`, `purchase_price`, `sale_price`, `quantity`, `barcode`, `feature`, `image`, `alert_qty`, `alert_message`, `sold_count`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, 69, 29, 9, 1, 'dF7nsnph', 'Body Spray', '<p>This is test description</p>', 29, 38, 100, 'dF7nsnph', '1', 36, 5, 'Stock is getting low', 0, 1, '2023-01-27 03:40:01', '2023-01-27 05:11:44', NULL),
(25, 70, 7, 10, 1, 'UyKDzuiu', 'Body Spray', '<p>This is test description</p>', 40, 65, 100, 'UyKDzuiu', '0', 35, 5, 'Stock is getting low', 0, 1, '2023-01-27 05:15:40', '2023-01-27 05:17:42', NULL),
(26, 69, 16, 10, 1, 'UyKDzuiu', 'Indian Lofer', '<p>This is test description</p>', 80, 95, 100, 'UyKDzuiu', '1', 31, 5, 'Stock is getting low', 0, 1, '2023-01-27 05:20:45', '2023-01-27 09:58:00', NULL),
(27, 71, 33, 13, 1, 'jl4DYzrC', 'Cotton Tshirt', '<p>This is test description</p>', 15, 30, 100, 'jl4DYzrC', '1', 33, 5, 'Stock is getting low', 0, 1, '2023-01-27 09:57:51', '2023-01-27 10:02:42', NULL),
(28, 69, 15, 11, 1, 'D1F07Vpj', 'Jeans Pant', '<p>This is test description</p>', 22, 35, 50, 'D1F07Vpj', '1', 30, 5, 'Stock is getting low', 0, 1, '2023-01-27 10:03:43', '2023-01-27 10:04:50', NULL),
(29, 69, 17, 11, 1, 'l7K2G881', 'Sun Glasses', '<p>This is test description</p>', 8, 15, 200, 'l7K2G881', '0', 29, 5, 'Stock is getting low', 0, 1, '2023-01-27 10:05:24', '2023-01-27 10:07:13', NULL),
(30, 72, 28, 13, 2, 't6NukohI', 'Ladies High Hill', '<p>This is test description</p>', 40, 60, 200, 't6NukohI', '0', 37, 5, 'Stock is getting low', 0, 1, '2023-01-27 10:07:23', '2023-01-27 10:08:26', NULL),
(31, 69, 16, 10, 2, 'pTFCmGyN', 'Chinese Shoe', '<p>This is test description</p>', 25, 50, 300, 'pTFCmGyN', '0', 32, 5, 'Stock is getting low', 0, 1, '2023-01-27 10:09:18', '2023-01-27 10:10:40', NULL),
(32, 69, 13, 13, 1, '7Jb3uywm', 'Polestor Shirt', '<p>This is test description</p>', 5, 10, 300, '7Jb3uywm', '0', 38, 5, 'Stock is getting low', 0, 1, '2023-01-27 10:19:27', '2023-01-27 10:20:43', NULL),
(33, 70, 22, 13, 1, '1DkK9krS', 'Baby Tops', '<p>This is test description</p>', 5, 8, 300, '1DkK9krS', '0', 42, 5, 'Stock is getting low', 0, 1, '2023-01-27 10:20:54', '2023-01-27 10:22:30', NULL),
(34, 70, 22, 10, 1, 't5H7mhYO', 'Women Tops', '<p>This is test description</p>', 8, 15, 300, 't5H7mhYO', '0', 41, 5, 'Stock is getting low', 0, 1, '2023-01-27 10:22:41', '2023-01-27 11:07:24', NULL),
(35, 69, 17, 14, 1, 'OkN2PI1S', 'Girls Sun Glasses', '<p>This is test description</p>', 22, 100, 300, 'OkN2PI1S', '0', 40, 5, 'Stock is getting low', 0, 1, '2023-01-27 10:23:47', '2023-03-17 04:14:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(67, 'Electronics', 'publish', '2022-10-07 11:55:23', '2022-10-07 11:55:23'),
(68, 'Automobile', 'publish', '2022-10-07 11:55:31', '2022-10-07 12:33:01'),
(69, 'Fashion', 'publish', '2022-10-07 11:55:41', '2022-10-07 11:55:41'),
(70, 'Ladies Fashion', 'publish', '2022-10-07 11:55:59', '2022-10-07 11:55:59'),
(71, 'Gents', 'publish', '2022-10-07 11:56:07', '2022-10-07 11:56:07'),
(72, 'Ladies', 'publish', '2022-10-07 11:56:17', '2022-10-07 11:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`id`, `product_id`, `size_id`, `created_at`, `updated_at`) VALUES
(25, 19, 2, NULL, NULL),
(26, 19, 4, NULL, NULL),
(28, 25, 4, NULL, NULL),
(29, 26, 4, NULL, NULL),
(30, 26, 1, NULL, NULL),
(31, 26, 2, NULL, NULL),
(32, 27, 4, NULL, NULL),
(34, 27, 2, NULL, NULL),
(35, 28, 4, NULL, NULL),
(36, 28, 2, NULL, NULL),
(39, 29, 8, NULL, NULL),
(40, 30, 8, NULL, NULL),
(42, 31, 1, NULL, NULL),
(43, 31, 4, NULL, NULL),
(44, 32, 1, NULL, NULL),
(45, 32, 4, NULL, NULL),
(46, 32, 2, NULL, NULL),
(47, 33, 1, NULL, NULL),
(48, 33, 4, NULL, NULL),
(49, 33, 2, NULL, NULL),
(65, 35, 8, NULL, NULL),
(66, 34, 1, NULL, NULL),
(67, 34, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_subcategories`
--

CREATE TABLE `product_subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_subcategories`
--

INSERT INTO `product_subcategories` (`id`, `product_category_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 67, 'TV', 'publish', '2022-10-08 23:12:20', '2022-10-08 23:12:20'),
(2, 67, 'Mobile', 'publish', '2022-10-08 23:12:36', '2022-10-08 23:12:36'),
(3, 67, 'Laptop', 'publish', '2022-10-08 23:12:54', '2022-10-08 23:12:54'),
(4, 67, 'Charger', 'publish', '2022-10-08 23:13:17', '2022-10-08 23:13:17'),
(5, 67, 'Kettle', 'publish', '2022-10-08 23:14:09', '2022-10-08 23:14:09'),
(6, 67, 'Monitor', 'publish', '2022-10-08 23:14:19', '2022-10-08 23:14:19'),
(7, 67, 'Play Station', 'publish', '2022-10-08 23:14:43', '2022-10-08 23:14:43'),
(8, 68, 'Tyre', 'publish', '2022-10-08 23:14:57', '2022-10-08 23:14:57'),
(9, 68, 'Engine', 'publish', '2022-10-08 23:15:12', '2023-01-23 12:05:43'),
(10, 68, 'Clutch', 'publish', '2022-10-08 23:15:19', '2023-01-23 12:06:25'),
(11, 68, 'Suspension', 'publish', '2022-10-08 23:15:27', '2023-01-23 12:06:12'),
(12, 67, 'AC', 'publish', '2022-10-08 23:15:58', '2023-01-23 12:05:56'),
(13, 69, 'Shirt', 'publish', '2022-10-08 23:16:28', '2022-10-08 23:44:20'),
(14, 69, 'T Shirt', 'publish', '2022-10-08 23:16:37', '2023-01-23 12:06:46'),
(15, 69, 'Pant', 'publish', '2022-10-08 23:17:09', '2022-10-08 23:17:09'),
(16, 69, 'Shoe', 'publish', '2022-10-08 23:17:23', '2022-10-08 23:17:23'),
(17, 69, 'Sun Glasses', 'publish', '2022-10-08 23:17:38', '2022-10-08 23:17:38'),
(18, 70, 'Gown', 'publish', '2022-10-08 23:17:56', '2022-10-08 23:17:56'),
(19, 70, 'Scart', 'publish', '2022-10-08 23:18:10', '2022-10-08 23:18:10'),
(20, 70, 'Salwar Kamiz', 'publish', '2022-10-08 23:18:24', '2022-10-08 23:18:24'),
(21, 70, 'Jeans', 'publish', '2022-10-08 23:18:52', '2022-10-08 23:18:52'),
(22, 70, 'Tops', 'publish', '2022-10-08 23:19:12', '2022-10-08 23:19:12'),
(23, 70, 'Purse', 'publish', '2022-10-08 23:19:28', '2022-10-08 23:19:28'),
(24, 70, 'Juwellery', 'publish', '2022-10-08 23:20:16', '2022-10-08 23:20:16'),
(25, 71, 'Coat', 'publish', '2022-10-08 23:20:30', '2022-10-08 23:20:30'),
(26, 72, 'Ladies Perfume', 'publish', '2022-10-08 23:21:29', '2023-03-17 02:18:54'),
(28, 72, 'Shoe', 'publish', '2023-01-23 12:17:39', '2023-01-23 12:17:39'),
(29, 69, 'Perfume', 'publish', '2023-01-27 03:36:02', '2023-01-27 03:36:02'),
(30, 70, 'Bag', 'publish', '2023-01-27 05:16:26', '2023-01-27 05:16:26'),
(31, 71, 'Shirt', 'publish', '2023-01-27 05:21:41', '2023-01-27 05:21:41'),
(32, 71, 'Indian Lofer', 'publish', '2023-01-27 05:22:11', '2023-01-27 05:22:11'),
(33, 71, 'T Shirt', 'publish', '2023-01-27 05:22:27', '2023-01-27 05:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'admin', '2021-07-24 18:04:30', '2021-07-24 21:01:22'),
(3, 'Super Admin', 'admin', '2021-07-24 18:04:30', '2021-07-24 18:04:30');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 2),
(9, 3),
(10, 2),
(10, 3),
(11, 2),
(11, 3),
(12, 3),
(13, 2),
(13, 3),
(14, 2),
(14, 3),
(15, 3),
(16, 3),
(17, 2),
(17, 3),
(18, 2),
(18, 3),
(19, 2),
(19, 3),
(20, 2),
(20, 3),
(21, 2),
(21, 3),
(22, 2),
(22, 3),
(23, 2),
(23, 3),
(24, 2),
(24, 3),
(25, 2),
(25, 3),
(26, 2),
(26, 3),
(27, 2),
(27, 3),
(28, 2),
(28, 3),
(29, 2),
(29, 3),
(30, 2),
(30, 3),
(31, 2),
(31, 3),
(32, 2),
(32, 3),
(33, 2),
(33, 3),
(34, 3),
(35, 3),
(36, 2),
(36, 3),
(37, 2),
(37, 3),
(38, 2),
(38, 3),
(39, 3),
(40, 2),
(40, 3),
(41, 2),
(41, 3),
(42, 2),
(42, 3),
(43, 3),
(44, 2),
(44, 3),
(45, 2),
(45, 3),
(46, 2),
(46, 3),
(47, 2),
(47, 3),
(48, 2),
(48, 3),
(49, 2),
(49, 3),
(50, 2),
(50, 3),
(51, 2),
(51, 3),
(52, 2),
(52, 3),
(53, 2),
(53, 3),
(54, 2),
(54, 3),
(55, 2),
(55, 3),
(56, 2),
(56, 3),
(57, 2),
(57, 3),
(58, 2),
(58, 3),
(59, 2),
(59, 3),
(60, 2),
(60, 3),
(61, 2),
(61, 3),
(62, 2),
(62, 3),
(63, 2),
(63, 3),
(64, 2),
(64, 3),
(65, 2),
(65, 3),
(66, 2),
(66, 3),
(67, 2),
(67, 3),
(68, 2),
(68, 3),
(69, 2),
(69, 3),
(70, 2),
(70, 3),
(71, 2),
(71, 3),
(72, 2),
(72, 3),
(73, 2),
(73, 3),
(74, 2),
(74, 3),
(75, 3),
(76, 2),
(76, 3),
(77, 3),
(78, 2),
(78, 3),
(79, 3),
(80, 2),
(80, 3),
(81, 2),
(81, 3),
(82, 3),
(83, 2),
(83, 3),
(84, 2),
(84, 3),
(85, 3),
(86, 2),
(86, 3),
(87, 3),
(88, 3),
(89, 3),
(90, 2),
(90, 3),
(91, 3),
(92, 3),
(93, 3),
(94, 3),
(95, 2),
(95, 3),
(96, 2),
(96, 3),
(97, 3),
(98, 3),
(99, 2),
(99, 3),
(100, 3),
(101, 3),
(102, 2),
(102, 3),
(103, 2),
(103, 3),
(104, 2),
(104, 3),
(105, 2),
(105, 3),
(106, 2),
(106, 3),
(107, 2),
(107, 3),
(108, 2),
(108, 3),
(109, 3),
(110, 2),
(110, 3),
(111, 2),
(111, 3),
(112, 2),
(112, 3),
(113, 2),
(113, 3),
(114, 2),
(114, 3),
(115, 2),
(115, 3),
(116, 2),
(116, 3),
(117, 2),
(117, 3),
(118, 2),
(118, 3),
(119, 2),
(119, 3),
(120, 2),
(120, 3),
(121, 2),
(121, 3),
(122, 2),
(122, 3),
(123, 2),
(123, 3),
(124, 2),
(124, 3),
(125, 2),
(125, 3),
(126, 2),
(126, 3),
(127, 2),
(127, 3),
(128, 2),
(128, 3),
(129, 2),
(129, 3),
(130, 2),
(130, 3),
(131, 2),
(131, 3),
(132, 2),
(132, 3),
(133, 2),
(133, 3),
(134, 2),
(134, 3),
(135, 2),
(135, 3),
(136, 2),
(136, 3),
(137, 2),
(137, 3),
(138, 2),
(138, 3),
(139, 2),
(139, 3),
(140, 2),
(140, 3),
(141, 3),
(142, 2),
(142, 3),
(143, 2),
(143, 3),
(144, 2),
(144, 3),
(145, 2),
(145, 3),
(146, 2),
(146, 3),
(147, 2),
(147, 3),
(148, 2),
(148, 3),
(149, 2),
(149, 3),
(150, 2),
(150, 3),
(151, 2),
(151, 3),
(152, 2),
(152, 3),
(153, 2),
(153, 3),
(154, 3),
(155, 3),
(158, 3),
(163, 3),
(164, 3),
(165, 3),
(166, 3),
(167, 3),
(168, 3),
(169, 3),
(170, 3),
(171, 3),
(172, 3),
(173, 3),
(174, 3),
(175, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `size_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Small', 'S', 1, '2023-01-07 11:13:04', '2023-01-07 11:13:04'),
(2, 'Large', 'L', 1, '2023-01-07 11:13:17', '2023-01-07 11:13:17'),
(3, 'Extra Large', 'XL', 1, '2023-01-07 11:13:37', '2023-01-07 11:13:37'),
(4, 'Medium', 'M', 1, '2023-01-07 11:13:47', '2023-01-07 11:13:47'),
(5, 'Extra Small', 'SM', 1, '2023-01-07 11:14:12', '2023-01-07 11:21:07'),
(8, 'No Size', 'no size', 1, '2023-01-27 03:38:45', '2023-01-27 03:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `static_options`
--

CREATE TABLE `static_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `static_options`
--

INSERT INTO `static_options` (`id`, `option_name`, `option_value`, `created_at`, `updated_at`) VALUES
(1, 'site_title', 'Inventory CRM', '2022-09-30 11:52:30', '2023-04-25 22:17:36'),
(2, 'site_tag_line', 'Inventory management', '2022-09-30 11:52:30', '2023-04-25 22:17:37'),
(3, 'site_footer_copyright', '{copy}  {year} Inventory (Sohan)', '2022-09-30 11:52:30', '2023-04-25 22:17:37'),
(4, 'site_frontend_nav_sticky', NULL, '2022-09-30 11:52:30', '2023-04-25 22:17:37'),
(5, 'og_meta_image_for_site', NULL, '2022-09-30 11:52:30', '2023-04-25 22:17:37'),
(6, 'site_rtl_enabled', NULL, '2022-09-30 11:52:30', '2023-04-25 22:17:37'),
(7, 'site_maintenance_mode', NULL, '2022-09-30 11:52:30', '2023-04-25 22:17:37'),
(8, 'site_payment_gateway', 'on', '2022-09-30 11:52:30', '2023-04-25 22:17:37'),
(9, 'site_sticky_navbar_enabled', NULL, '2022-09-30 11:52:30', '2023-04-25 22:17:37'),
(10, 'disable_backend_preloader', NULL, '2022-09-30 11:52:30', '2023-04-25 22:17:37'),
(11, 'disable_user_email_verify', NULL, '2022-09-30 11:52:30', '2023-04-25 22:17:37'),
(12, 'site_force_ssl_redirection', NULL, '2022-09-30 11:52:30', '2023-04-25 22:17:37'),
(13, 'preloader_status', NULL, '2022-09-30 11:52:30', '2023-04-25 22:17:37'),
(14, 'site_logo', '7', '2022-09-30 12:28:54', '2022-09-30 12:28:54'),
(15, 'site_favicon', '3', '2022-09-30 12:28:54', '2022-09-30 12:28:54'),
(16, 'site_breadcrumb_bg', '8', '2022-09-30 12:28:54', '2022-09-30 12:28:54'),
(17, 'site_white_logo', '6', '2022-09-30 12:28:54', '2022-09-30 12:28:54'),
(18, 'discount_amount', '55', '2023-03-17 04:37:29', '2023-03-17 04:43:09'),
(19, 'company_name', 'Inventory Shop', '2023-04-24 23:12:33', '2023-04-24 23:12:33'),
(20, 'company_address', 'Gabtoly, Dhaka-1216', '2023-04-24 23:12:33', '2023-04-24 23:12:33'),
(21, 'company_email', 'sopnilsohan03@gmail.com', '2023-04-24 23:12:33', '2023-04-24 23:12:33'),
(22, 'company_phone', '01874636209', '2023-04-24 23:12:33', '2023-04-24 23:12:33'),
(23, 'cash_on_delivery_preview_logo', NULL, '2023-04-25 22:19:14', '2023-04-25 22:19:14'),
(24, 'paystack_preview_logo', NULL, '2023-04-25 22:19:14', '2023-04-25 22:19:14'),
(25, 'paystack_public_key', NULL, '2023-04-25 22:19:14', '2023-04-30 10:03:57'),
(26, 'paystack_secret_key', NULL, '2023-04-25 22:19:14', '2023-04-30 10:03:57'),
(27, 'paystack_merchant_email', NULL, '2023-04-25 22:19:14', '2023-04-30 10:03:57'),
(28, 'paytm_preview_logo', NULL, '2023-04-25 22:19:14', '2023-04-30 10:03:57'),
(29, 'paytm_merchant_key', 'dv0XtmsPYpewNag&', '2023-04-25 22:19:14', '2023-04-30 10:03:57'),
(30, 'paytm_merchant_mid', 'Digita57697814558795', '2023-04-25 22:19:14', '2023-04-30 10:03:57'),
(31, 'paytm_merchant_website', 'WEBSTAGING', '2023-04-25 22:19:14', '2023-04-30 10:03:57'),
(32, 'site_global_currency', 'USD', '2023-04-25 22:19:14', '2023-04-30 10:03:57'),
(33, 'manual_payment_preview_logo', NULL, '2023-04-25 22:19:14', '2023-04-25 22:19:14'),
(34, 'site_manual_payment_name', NULL, '2023-04-25 22:19:14', '2023-04-30 10:03:57'),
(35, 'site_manual_payment_description', NULL, '2023-04-25 22:19:14', '2023-04-30 10:03:57'),
(36, 'razorpay_preview_logo', NULL, '2023-04-25 22:19:14', '2023-04-30 10:03:57'),
(37, 'razorpay_api_key', NULL, '2023-04-25 22:19:14', '2023-04-30 10:03:57'),
(38, 'razorpay_api_secret', NULL, '2023-04-25 22:19:14', '2023-04-30 10:03:57'),
(39, 'stripe_public_key', 'pk_test_51GwS1SEmGOuJLTMsIeYKFtfAT3o3Fc6IOC7wyFmmxA2FIFQ3ZigJ2z1s4ZOweKQKlhaQr1blTH9y6HR2PMjtq1Rx00vqE8LO0x', '2023-04-25 22:19:14', '2023-04-30 10:03:57'),
(40, 'stripe_secret_key', 'sk_test_51GwS1SEmGOuJLTMs2vhSliTwAGkOt4fKJMBrxzTXeCJoLrRu8HFf4I0C5QuyE3l3bQHBJm3c0qFmeVjd0V9nFb6Z00VrWDJ9Uw', '2023-04-25 22:19:14', '2023-04-30 10:03:57'),
(41, 'stripe_preview_logo', NULL, '2023-04-25 22:19:14', '2023-04-25 22:19:14'),
(42, 'stripe_gateway', 'on', '2023-04-25 22:19:14', '2023-04-30 10:03:57'),
(43, 'stripe_test_mode', 'on', '2023-04-25 22:19:14', '2023-04-30 10:03:57'),
(44, 'site_global_payment_gateway', NULL, '2023-04-25 22:19:14', '2023-04-30 10:03:57'),
(45, 'site_usd_to_ngn_exchange_rate', NULL, '2023-04-25 22:19:14', '2023-04-30 10:03:58'),
(46, 'site_euro_to_ngn_exchange_rate', NULL, '2023-04-25 22:19:14', '2023-04-30 10:03:57'),
(47, 'mollie_public_key', 'test_fVk76gNbAp6ryrtRjfAVvzjxSHxC2v', '2023-04-25 22:19:14', '2023-04-30 10:03:57'),
(48, 'mollie_preview_logo', NULL, '2023-04-25 22:19:15', '2023-04-25 22:19:15'),
(49, 'mollie_test_mode', 'on', '2023-04-25 22:19:15', '2023-04-30 10:03:57'),
(50, 'flutterwave_preview_logo', NULL, '2023-04-25 22:19:15', '2023-04-25 22:19:15'),
(51, 'flw_public_key', NULL, '2023-04-25 22:19:15', '2023-04-30 10:03:57'),
(52, 'flw_secret_key', NULL, '2023-04-25 22:19:15', '2023-04-30 10:03:57'),
(53, 'flw_secret_hash', NULL, '2023-04-25 22:19:15', '2023-04-30 10:03:57'),
(54, 'site_currency_symbol_position', 'left', '2023-04-25 22:19:15', '2023-04-30 10:03:57'),
(55, 'site_default_payment_gateway', 'paytm', '2023-04-25 22:19:15', '2023-04-30 10:03:57'),
(56, 'paypal_preview_logo', NULL, '2023-04-25 22:19:15', '2023-04-25 22:19:15'),
(57, 'paypal_test_mode', 'on', '2023-04-25 22:19:15', '2023-04-30 10:03:59'),
(58, 'paypal_sandbox_client_id', 'AUP7AuZMwJbkee-2OmsSZrU-ID1XUJYE-YB-2JOrxeKV-q9ZJZYmsr-UoKuJn4kwyCv5ak26lrZyb-gb', '2023-04-25 22:19:15', '2023-04-30 10:03:57'),
(59, 'paypal_sandbox_client_secret', 'EEIxCuVnbgING9EyzcF2q-gpacLneVbngQtJ1mbx-42Lbq-6Uf6PEjgzF7HEayNsI4IFmB9_CZkECc3y', '2023-04-25 22:19:15', '2023-04-30 10:03:57'),
(60, 'paypal_sandbox_app_id', NULL, '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(61, 'paypal_live_client_id', NULL, '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(62, 'paypal_live_client_secret', NULL, '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(63, 'paypal_live_app_id', NULL, '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(64, 'paypal_payment_action', NULL, '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(65, 'paypal_currency', NULL, '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(66, 'paypal_notify_url', NULL, '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(67, 'paypal_locale', NULL, '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(68, 'paypal_validate_ssl', NULL, '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(69, 'site__to_idr_exchange_rate', NULL, '2023-04-25 22:19:15', '2023-04-25 22:19:15'),
(70, 'site__to_inr_exchange_rate', NULL, '2023-04-25 22:19:15', '2023-04-25 22:19:15'),
(71, 'site__to_ngn_exchange_rate', NULL, '2023-04-25 22:19:15', '2023-04-25 22:19:15'),
(72, 'site__to_zar_exchange_rate', NULL, '2023-04-25 22:19:15', '2023-04-25 22:19:15'),
(73, 'site__to_brl_exchange_rate', NULL, '2023-04-25 22:19:15', '2023-04-25 22:19:15'),
(74, 'site__to_myr_exchange_rate', NULL, '2023-04-25 22:19:15', '2023-04-25 22:19:15'),
(75, 'midtrans_preview_logo', NULL, '2023-04-25 22:19:15', '2023-04-25 22:19:15'),
(76, 'midtrans_merchant_id', 'G770543580', '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(77, 'midtrans_server_key', 'SB-Mid-server-9z5jztsHyYxEdSs7DgkNg2on', '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(78, 'midtrans_client_key', 'SB-Mid-client-iDuy-jKdZHkLjL_I', '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(79, 'midtrans_environment', NULL, '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(80, 'payfast_preview_logo', NULL, '2023-04-25 22:19:15', '2023-04-25 22:19:15'),
(81, 'payfast_merchant_id', NULL, '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(82, 'payfast_merchant_key', NULL, '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(83, 'payfast_passphrase', NULL, '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(84, 'payfast_merchant_env', NULL, '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(85, 'payfast_itn_url', NULL, '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(86, 'cashfree_preview_logo', NULL, '2023-04-25 22:19:15', '2023-04-25 22:19:15'),
(87, 'cashfree_test_mode', 'on', '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(88, 'cashfree_app_id', '94527832f47d6e74fa6ca5e3c72549', '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(89, 'cashfree_secret_key', 'ec6a3222018c676e95436b2e26e89c1ec6be2830', '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(90, 'instamojo_preview_logo', NULL, '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(91, 'instamojo_client_id', NULL, '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(92, 'instamojo_client_secret', NULL, '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(93, 'instamojo_username', NULL, '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(94, 'instamojo_password', NULL, '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(95, 'instamojo_test_mode', NULL, '2023-04-25 22:19:15', '2023-04-30 10:03:58'),
(96, 'marcadopago_preview_logo', NULL, '2023-04-25 22:19:15', '2023-04-25 22:19:15'),
(97, 'marcado_pago_client_id', NULL, '2023-04-25 22:19:15', '2023-04-25 22:19:15'),
(98, 'marcado_pago_client_secret', NULL, '2023-04-25 22:19:15', '2023-04-25 22:19:15'),
(99, 'marcado_pago_test_mode', NULL, '2023-04-25 22:19:15', '2023-04-25 22:19:15'),
(100, 'squareup_gateway', NULL, '2023-04-25 22:19:15', '2023-04-25 22:19:15'),
(101, 'squareup_test_mode', NULL, '2023-04-25 22:19:15', '2023-04-25 22:19:15'),
(102, 'squareup_preview_logo', NULL, '2023-04-25 22:19:15', '2023-04-25 22:19:15'),
(103, 'squareup_access_token', NULL, '2023-04-25 22:19:15', '2023-04-25 22:19:15'),
(104, 'squareup_location_id', NULL, '2023-04-25 22:19:15', '2023-04-25 22:19:15'),
(105, 'cinetpay_preview_logo', NULL, '2023-04-25 22:19:16', '2023-04-25 22:19:16'),
(106, 'cinetpay_gateway', NULL, '2023-04-25 22:19:16', '2023-04-25 22:19:16'),
(107, 'cinetpay_test_mode', NULL, '2023-04-25 22:19:16', '2023-04-25 22:19:16'),
(108, 'cinetpay_api_key', NULL, '2023-04-25 22:19:16', '2023-04-25 22:19:16'),
(109, 'cinetpay_site_id', NULL, '2023-04-25 22:19:16', '2023-04-25 22:19:16'),
(110, 'paytabs_preview_logo', NULL, '2023-04-25 22:19:16', '2023-04-25 22:19:16'),
(111, 'paytabs_gateway', NULL, '2023-04-25 22:19:16', '2023-04-25 22:19:16'),
(112, 'paytabs_test_mode', NULL, '2023-04-25 22:19:16', '2023-04-25 22:19:16'),
(113, 'pay_tabs_currency', NULL, '2023-04-25 22:19:16', '2023-04-25 22:19:16'),
(114, 'pay_tabs_profile_id', NULL, '2023-04-25 22:19:16', '2023-04-25 22:19:16'),
(115, 'pay_tabs_region', NULL, '2023-04-25 22:19:16', '2023-04-25 22:19:16'),
(116, 'pay_tabs_server_key', NULL, '2023-04-25 22:19:16', '2023-04-25 22:19:16'),
(117, 'billplz_preview_logo', NULL, '2023-04-25 22:19:16', '2023-04-25 22:19:16'),
(118, 'billplz_gateway', NULL, '2023-04-25 22:19:16', '2023-04-25 22:19:16'),
(119, 'billplz_test_mode', NULL, '2023-04-25 22:19:16', '2023-04-25 22:19:16'),
(120, 'billplz_key', NULL, '2023-04-25 22:19:16', '2023-04-25 22:19:16'),
(121, 'billplz_version', NULL, '2023-04-25 22:19:16', '2023-04-25 22:19:16'),
(122, 'billplz_x_signature', NULL, '2023-04-25 22:19:16', '2023-04-25 22:19:16'),
(123, 'billplz_collection_name', NULL, '2023-04-25 22:19:16', '2023-04-25 22:19:16'),
(124, 'zitopay_preview_logo', NULL, '2023-04-25 22:19:16', '2023-04-30 10:03:58'),
(125, 'zitopay_gateway', 'on', '2023-04-25 22:19:16', '2023-04-30 10:03:58'),
(126, 'zitopay_test_mode', NULL, '2023-04-25 22:19:16', '2023-04-30 10:03:58'),
(127, 'zitopay_username', NULL, '2023-04-25 22:19:16', '2023-04-30 10:03:58'),
(128, 'manual_payment_gateway', NULL, '2023-04-25 22:19:16', '2023-04-30 10:03:59'),
(129, 'paypal_gateway', 'on', '2023-04-25 22:19:16', '2023-04-30 10:03:59'),
(130, 'paytm_test_mode', 'on', '2023-04-25 22:19:16', '2023-04-30 10:03:59'),
(131, 'paytm_gateway', 'on', '2023-04-25 22:19:16', '2023-04-30 10:03:59'),
(132, 'razorpay_gateway', NULL, '2023-04-25 22:19:16', '2023-04-30 10:03:59'),
(133, 'razorpay_test_mode', NULL, '2023-04-25 22:19:16', '2023-04-30 10:03:59'),
(134, 'paystack_gateway', NULL, '2023-04-25 22:19:16', '2023-04-30 10:03:59'),
(135, 'paystack_test_mode', NULL, '2023-04-25 22:19:16', '2023-04-30 10:03:59'),
(136, 'mollie_gateway', 'on', '2023-04-25 22:19:16', '2023-04-30 10:03:59'),
(137, 'cash_on_delivery_gateway', NULL, '2023-04-25 22:19:16', '2023-04-30 10:03:59'),
(138, 'flutterwave_gateway', NULL, '2023-04-25 22:19:16', '2023-04-30 10:03:59'),
(139, 'flutterwave_test_mode', NULL, '2023-04-25 22:19:16', '2023-04-30 10:03:59'),
(140, 'midtrans_gateway', 'on', '2023-04-25 22:19:16', '2023-04-30 10:03:59'),
(141, 'midtrans_test_mode', 'on', '2023-04-25 22:19:16', '2023-04-30 10:03:59'),
(142, 'payfast_gateway', NULL, '2023-04-25 22:19:16', '2023-04-30 10:03:59'),
(143, 'payfast_test_mode', NULL, '2023-04-25 22:19:16', '2023-04-30 10:03:59'),
(144, 'cashfree_gateway', 'on', '2023-04-25 22:19:16', '2023-04-30 10:03:59'),
(145, 'instamojo_gateway', NULL, '2023-04-25 22:19:16', '2023-04-30 10:03:59'),
(146, 'marcadopago_gateway', NULL, '2023-04-25 22:19:16', '2023-04-25 22:19:16'),
(147, 'marcadopago_test_mode', NULL, '2023-04-25 22:19:16', '2023-04-25 22:19:16'),
(148, 'site_usd_to_usd_exchange_rate', NULL, '2023-04-25 22:19:16', '2023-04-30 10:03:59'),
(149, 'site_usd_to_idr_exchange_rate', NULL, '2023-04-25 22:23:19', '2023-04-30 10:03:58'),
(150, 'site_usd_to_inr_exchange_rate', NULL, '2023-04-25 22:23:19', '2023-04-30 10:03:58'),
(151, 'site_usd_to_zar_exchange_rate', NULL, '2023-04-25 22:23:19', '2023-04-30 10:03:58'),
(152, 'site_usd_to_brl_exchange_rate', NULL, '2023-04-25 22:23:19', '2023-04-30 10:03:58'),
(153, 'site_usd_to_myr_exchange_rate', NULL, '2023-04-25 22:23:19', '2023-04-30 10:03:58'),
(154, 'ssl_commerz_gateway', 'on', '2023-04-27 03:36:23', '2023-04-30 10:03:59'),
(155, 'ssl_commerz_test_mode', 'on', '2023-04-27 03:36:23', '2023-04-30 10:03:59'),
(156, 'ssl_commerz_store_id', 'aabbr628a827f92355', '2023-04-27 03:36:23', '2023-04-30 10:03:59'),
(157, 'ssl_commerz_store_password', 'aabbr628a827f92355@ssl', '2023-04-27 03:36:23', '2023-04-30 10:03:59');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `image` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_type` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `country_id`, `image`, `name`, `email`, `phone`, `city`, `address`, `nid`, `company_name`, `supplier_type`, `created_at`, `updated_at`) VALUES
(2, 15, 11, 'Emma Morton', 'qizon@mailinator.com', '01878484', 'Dolores eum facilis', 'Fugit qui omnis qua', 'Culpa officia commod', 'Jenkins and Molina Trading', 1, '2022-10-07 00:23:10', '2022-10-07 01:34:03'),
(3, 12, 12, 'Kasper Burton', 'galas@mailinator.com', '9515151511', 'Ex sed consectetur a', 'Rerum rerum adipisic', 'Minima inventore par', 'Guthrie and Harrell LLC', 0, '2022-10-07 00:58:57', '2022-12-02 05:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pc', 1, '2023-01-07 11:43:43', '2023-01-07 11:43:43'),
(2, 'Set', 1, '2023-01-07 11:43:51', '2023-01-07 11:43:51'),
(3, 'KG', 1, '2023-01-07 11:43:57', '2023-01-07 11:43:57'),
(4, 'Ltr', 1, '2023-01-07 11:44:07', '2023-01-07 11:44:07'),
(5, 'Pcs', 1, '2023-01-07 11:44:18', '2023-01-07 11:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `email_verify_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facebook_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_income` int(11) DEFAULT NULL,
  `annual_income` int(11) DEFAULT NULL,
  `income_source` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driving_license_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_verify_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_permission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'off'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified`, `email_verify_token`, `phone`, `address`, `state`, `city`, `zipcode`, `country`, `password`, `remember_token`, `image`, `created_at`, `updated_at`, `facebook_id`, `google_id`, `monthly_income`, `annual_income`, `income_source`, `nid_image`, `driving_license_image`, `passport_image`, `tax_verify_status`, `campaign_permission`) VALUES
(42, 'Al Ahsan', 'testdoc2021@gmail.com', 'boss', '1', 'Pfzpm4', '006', 'Dhaka', 'df', 'Dhaka', '1216', NULL, '$2y$10$/DbKNpdRwNViVJsVw9uKEuaL8lbdZVP1LbEFDAAaP5Nj3bX3kZb6e', 'xYtLehC6aAXyOEsdxgWPofgfVLilr3PmmXNDkEmedhGF7cKm9aoFM7rwtlMA', '249', '2022-08-13 04:54:44', '2022-09-29 23:31:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'on'),
(44, 'Mr Boss', 'testdoc21@gmail.com', 'bo', '1', NULL, '11551515151885', NULL, NULL, NULL, NULL, '2', '$2y$10$7Kxi1uRYx6ToNTFxCE5tnexK70FlkocWmgvCmmmE.aE06KGDEF1p2', NULL, NULL, '2022-08-16 00:22:38', '2022-09-29 23:31:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'off');

-- --------------------------------------------------------

--
-- Table structure for table `virtual_carts`
--

CREATE TABLE `virtual_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` double NOT NULL,
  `quantity` bigint(20) NOT NULL DEFAULT 1,
  `total_price` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_product`
--
ALTER TABLE `color_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color_product_color_id_foreign` (`color_id`),
  ADD KEY `color_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_uploads`
--
ALTER TABLE `media_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
  ADD KEY `product_category_id` (`product_category_id`),
  ADD KEY `product_subcategory_id` (`product_subcategory_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_size_product_id_foreign` (`product_id`),
  ADD KEY `product_size_size_id_foreign` (`size_id`);

--
-- Indexes for table `product_subcategories`
--
ALTER TABLE `product_subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `static_options`
--
ALTER TABLE `static_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `virtual_carts`
--
ALTER TABLE `virtual_carts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `color_product`
--
ALTER TABLE `color_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media_uploads`
--
ALTER TABLE `media_uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=480;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `product_subcategories`
--
ALTER TABLE `product_subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `static_options`
--
ALTER TABLE `static_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `virtual_carts`
--
ALTER TABLE `virtual_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `color_product`
--
ALTER TABLE `color_product`
  ADD CONSTRAINT `color_product_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `color_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_product_subcategory_id_foreign` FOREIGN KEY (`product_subcategory_id`) REFERENCES `product_subcategories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_size_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_size_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
