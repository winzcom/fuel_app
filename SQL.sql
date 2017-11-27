-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 15, 2017 at 04:33 PM
-- Server version: 5.5.51-38.2
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rexbdnet_pump`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE IF NOT EXISTS `abouts` (
  `id` int(10) unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `image`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'about-pic.jpg', 'WELCOME TO GO FINANCE', 'Totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo eni sai th ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione kavosvo uptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore', NULL, '2017-01-11 07:57:03');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Rahman', 'admin', '$2y$10$23QTvY6hmLQN6UgPOalDaukuC5.iTjOjyi/PmTN5KxmNKRt6ZqG7i', '8g7gTy8vCp8sOycesI52oZ9wfRv1DpJ6wQarrYKkUmItfQqu1azBMXz1PfEx', '', '2017-01-15 22:27:33');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `rate`, `created_at`, `updated_at`) VALUES
(2, 'BDT', 75, '2017-01-09 03:05:21', '2017-01-09 03:23:09'),
(5, 'USD', 1, '2017-01-12 06:58:17', '2017-01-12 06:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `machine_id` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `address`, `machine_id`, `quantity`, `role_id`, `invoice_id`, `created_at`, `updated_at`) VALUES
(27, 'Hasan Rahman', '', '', 2, 5, 0, 0, '2017-01-13 14:20:46', '2017-01-13 14:20:46'),
(28, 'Hosen Mahmud', '', '', 2, 5, 0, 0, '2017-01-13 14:22:11', '2017-01-13 14:22:11'),
(29, 'Hasan Rahman', '', '', 2, 4, 0, 0, '2017-01-13 14:31:03', '2017-01-13 14:31:03'),
(30, 'Hasan Rahman', '', '', 2, 4, 0, 0, '2017-01-13 14:32:28', '2017-01-13 14:32:28'),
(31, 'Mehadi Hasan', '', '', 2, 7, 0, 0, '2017-01-13 14:34:04', '2017-01-13 14:34:04'),
(32, 'Hasan Rahman', '', '', 4, 4, 0, 0, '2017-01-13 15:51:44', '2017-01-13 15:51:44'),
(33, 'Hosen Mahmud', '', '', 4, 10, 0, 0, '2017-01-13 16:03:17', '2017-01-13 16:03:17'),
(34, 'Hasan Rahman', '', '', 4, 20, 0, 0, '2017-01-13 16:11:54', '2017-01-13 16:11:54'),
(35, 'Hosen Mahmud', 'hosen@gmail.com', '', 4, 5, 0, 0, '2017-01-13 16:34:48', '2017-01-13 16:34:48'),
(42, 'Hasan Rahman', '', '', 1, 5, 0, 0, '2017-01-14 04:18:43', '2017-01-14 04:18:43'),
(43, 'Hasan Rahman', '', '', 1, 20, 0, 0, '2017-01-14 04:27:33', '2017-01-14 04:27:33'),
(44, 'Seller Rahman', '', '', 1, 5, 0, 0, '2017-01-14 08:05:23', '2017-01-14 08:05:23'),
(45, 'Hasan Rahman', '', '', 1, 5, 0, 0, '2017-01-14 08:07:00', '2017-01-14 08:07:00'),
(46, 'Hasan Rahman', '', '', 3, 5, 0, 0, '2017-01-14 08:19:14', '2017-01-14 08:19:14'),
(47, 'Hosen Mahmud', '', '', 1, 50, 0, 44, '2017-01-14 08:20:51', '2017-01-14 09:40:20'),
(48, 'Tanzila Rahman', '', '', 1, 10, 0, 45, '2017-01-14 09:42:09', '2017-01-14 09:43:47'),
(49, 'Habiba', '', '', 1, 2, 0, 46, '2017-01-14 09:46:49', '2017-01-14 10:12:12'),
(51, 'Hasan Rahman', '', '', 3, 150, 0, 48, '2017-01-14 10:02:37', '2017-01-14 10:16:31'),
(52, 'Seller Rahman', '', '', 3, 3, 0, 49, '2017-01-14 10:21:22', '2017-01-14 10:23:09'),
(53, 'Tanzila Rahman', '', '', 3, 10, 0, 50, '2017-01-14 10:24:17', '2017-01-14 10:24:17'),
(54, 'Hosen Mahmud', '', '', 1, 2, 0, 51, '2017-01-14 10:25:57', '2017-01-14 10:25:57'),
(55, 'Habiba', '', '', 1, 7, 0, 52, '2017-01-14 13:02:24', '2017-01-14 13:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `id` int(10) unsigned NOT NULL,
  `reason` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `currency_id` tinyint(3) unsigned NOT NULL,
  `created_id` int(11) NOT NULL,
  `created_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `reason`, `note`, `amount`, `currency_id`, `created_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Tea Bill', '', 20, 2, 0, '', '2017-01-13 08:25:08', '2017-01-13 08:25:08'),
(2, 'extra expense', 'Mr. Delon Come.', 50, 2, 0, '', '2017-01-13 08:40:26', '2017-01-13 08:57:55'),
(3, 'Tea Bill', '', 20, 2, 0, '', '2017-01-14 12:09:06', '2017-01-14 12:09:06'),
(4, 'test expense', '', 80, 2, 8, 'Seller Rahman', '2017-01-14 12:16:15', '2017-01-14 12:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `fuels`
--

CREATE TABLE IF NOT EXISTS `fuels` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL,
  `currency_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fuels`
--

INSERT INTO `fuels` (`id`, `name`, `rate`, `currency_id`, `created_at`, `updated_at`) VALUES
(1, 'Octen', 75, 2, '2017-01-12 03:47:18', '2017-01-12 03:47:18'),
(2, 'Petrol', 90, 2, '2017-01-12 03:57:11', '2017-01-12 03:57:11'),
(3, 'Dizzel', 80, 2, '2017-01-12 04:37:48', '2017-01-12 04:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE IF NOT EXISTS `general_settings` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `google_plus` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `youtube` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mission` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vision` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `footer_text` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `title`, `logo`, `address`, `email`, `number`, `facebook`, `twitter`, `linkedin`, `google_plus`, `youtube`, `mission`, `vision`, `footer_text`, `created_at`, `updated_at`) VALUES
(1, 'Petrol Pump', 'logo.png', '11/3 Garden Street, Ring Road, Shyamoli, Dhaka', 'admin@thesoftking.com', '+88-01716-441700', 'http://www.facebook.com/you', 'http://www.twitter/you', 'http://linkdin.com/you', 'http://plus.google.com/you', 'http://youtube.com/you', 'lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 0x436f70797269676874203230313720c2a920506574726f6c2050756d70, NULL, '2017-01-16 04:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE IF NOT EXISTS `homes` (
  `id` int(10) unsigned NOT NULL,
  `top_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `top_description` blob NOT NULL,
  `bottom_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bottom_description` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`id`, `top_title`, `top_description`, `bottom_title`, `bottom_description`, `created_at`, `updated_at`) VALUES
(1, 'We are Experienced Experts', 0x4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572206164697069736963696e6720656c69742e204e756d7175616d206578636570747572692071756962757364616d20726570726568656e6465726974206973746520756c6c616d206f6469742c206d6f646920667567697420616c697175616d20726570756469616e6461652c206e65717565206e6973692074656d706f72613f, 'SERVICE WE OFFER', 0x4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572206164697069736963696e6720656c69742e20436f6e736571756174757220636f72706f7269732c206465626974697320646f6c6f726520657865726369746174696f6e656d20697461717565206d61676e69206d696e7573206e6968696c2070657273706963696174697320717561657261742071756173692120416c697175616d20636f6e73656374657475722064656c65637475732c2064697374696e6374696f206572726f72206578206f6263616563617469206f6666696369612073757363697069742120446f6c6f72756d2e204c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572206164697069736963696e6720656c69742e20416c697175616d20617574656d20656f73206675676961742069642069737465206c61626f72696f73616d206d6178696d65206d696e7573206e6174757320717561732071756920726572756d207361657065207665726974617469732c20766f6c7570746174756d2120417574656d20646f6c6f7269627573206d6f646920706c61636561742072656d20726570656c6c617421204c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572206164697069736963696e6720656c69742e20416d657420617574206265617461652063756d2c2064656c656e69746920646f6c6f7265206561717565206578706564697461206c61626f7265206c617564616e7469756d206d696e7573206d6f6c6c69746961206e65736369756e74206e6f6e206e756d7175616d2071756f2c2072656d2074656d706f72696275732074656e6574757220756e64652076656c69742076697461652e, NULL, '2017-01-11 07:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(10) unsigned NOT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  `machine_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `created_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pay_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `paid_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `paid_id` int(2) NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `customer_id`, `machine_id`, `quantity`, `created_date`, `pay_date`, `paid_by`, `paid_id`, `role_id`, `created_at`, `updated_at`) VALUES
(25, 27, 2, 5, '2017-01-13 20:20:46', '2017-01-13', 'admin', 1, 1, '2017-01-13 14:20:46', '2017-01-13 14:20:46'),
(26, 28, 2, 5, '2017-01-13 20:22:11', '2017-01-13', 'admin', 1, 1, '2017-01-13 14:22:11', '2017-01-13 14:22:11'),
(27, 29, 2, 4, '2017-01-13 20:31:03', '2017-01-13', 'admin', 1, 1, '2017-01-13 14:31:03', '2017-01-13 14:31:03'),
(28, 30, 2, 4, '2017-01-13 20:32:28', '2017-01-13', 'admin', 1, 1, '2017-01-13 14:32:28', '2017-01-13 14:32:28'),
(29, 31, 2, 7, '2017-01-13 20:34:04', '2017-01-13', 'admin', 1, 1, '2017-01-13 14:34:04', '2017-01-13 14:34:04'),
(30, 32, 4, 4, '2017-01-13 21:51:44', '2017-01-13', 'admin', 1, 1, '2017-01-13 15:51:44', '2017-01-13 15:51:44'),
(31, 33, 4, 10, '2017-01-13 22:03:17', '2017-01-13', 'admin', 1, 1, '2017-01-13 16:03:17', '2017-01-13 16:03:17'),
(32, 34, 4, 20, '2017-01-13 22:11:54', '2017-01-13', 'admin', 1, 1, '2017-01-13 16:11:54', '2017-01-13 16:11:54'),
(33, 35, 4, 5, '2017-01-13 22:34:48', '2017-01-13', 'admin', 1, 1, '2017-01-13 16:34:48', '2017-01-13 16:34:48'),
(40, 42, 1, 5, '2017-01-14 10:18:43', '2017-01-14', 'admin', 1, 1, '2017-01-14 04:18:43', '2017-01-14 04:18:43'),
(41, 43, 1, 20, '2017-01-14 10:27:33', '2017-01-14', 'admin', 1, 1, '2017-01-14 04:27:33', '2017-01-14 04:27:33'),
(42, 44, 1, 5, '2017-01-14 14:05:23', '2017-01-14', 'admin', 1, 1, '2017-01-14 08:05:23', '2017-01-14 08:05:23'),
(43, 46, 3, 5, '2017-01-14 14:19:14', '2017-01-14', 'Seller Rahman', 8, 1, '2017-01-14 08:19:14', '2017-01-14 08:19:14'),
(44, 47, 1, 50, '2017-01-14 15:40:20', '2017-01-14', 'admin', 1, 1, '2017-01-14 08:20:51', '2017-01-14 09:40:20'),
(45, 48, 1, 20, '2017-01-14 15:42:09', '2017-01-14', 'admin', 1, 1, '2017-01-14 09:42:09', '2017-01-14 09:42:09'),
(46, 49, 1, 2, '2017-01-14 16:12:12', '2017-01-14', 'admin', 1, 1, '2017-01-14 09:46:49', '2017-01-14 10:12:12'),
(48, 51, 3, 150, '2017-01-14 16:16:31', '2017-01-14', 'admin', 1, 1, '2017-01-14 10:02:37', '2017-01-14 10:16:31'),
(49, 52, 3, 3, '2017-01-14 16:23:09', '2017-01-14', 'admin', 1, 1, '2017-01-14 10:21:22', '2017-01-14 10:23:09'),
(50, 53, 3, 10, '2017-01-14 16:24:17', '2017-01-14', 'admin', 1, 1, '2017-01-14 10:24:17', '2017-01-14 10:24:17'),
(51, 54, 1, 2, '2017-01-14 16:25:57', '2017-01-14', 'Seller Rahman', 8, 0, '2017-01-14 10:25:57', '2017-01-14 10:25:57'),
(52, 55, 1, 7, '2017-01-14 19:03:23', '2017-01-14', 'admin', 1, 1, '2017-01-14 13:02:24', '2017-01-14 13:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `machines`
--

CREATE TABLE IF NOT EXISTS `machines` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fuel_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`id`, `name`, `code`, `fuel_id`, `created_at`, `updated_at`) VALUES
(1, 'Machine 1', 'machine001', 1, '2017-01-12 05:13:34', '2017-01-12 05:13:34'),
(2, 'Machine 2', 'machine002', 2, '2017-01-12 05:14:57', '2017-01-12 05:14:57'),
(3, 'Machine 3', 'machine003', 3, '2017-01-12 05:15:42', '2017-01-12 05:40:35'),
(4, 'Machine 4', 'machine004', 1, '2017-01-12 05:15:56', '2017-01-12 07:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `machine_readings`
--

CREATE TABLE IF NOT EXISTS `machine_readings` (
  `id` int(10) unsigned NOT NULL,
  `machine_id` int(10) unsigned NOT NULL,
  `start_reading` int(10) unsigned NOT NULL,
  `start_reading_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `current_reading` int(11) NOT NULL,
  `end_reading` int(10) unsigned NOT NULL,
  `end_reading_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `machine_readings`
--

INSERT INTO `machine_readings` (`id`, `machine_id`, `start_reading`, `start_reading_time`, `current_reading`, `end_reading`, `end_reading_time`, `created_at`, `updated_at`) VALUES
(7, 1, 400, '2017-01-13', 0, 0, '', '2017-01-13 15:09:54', '2017-01-13 15:09:54'),
(8, 3, 400, '2017-01-13', 0, 0, '', '2017-01-13 15:29:27', '2017-01-13 15:29:27'),
(10, 1, 200, '2017-01-14', 89, 0, '', '2017-01-14 04:15:24', '2017-01-14 13:03:23'),
(11, 2, 200, '2017-01-14', 200, 0, '', '2017-01-14 04:44:30', '2017-01-14 04:44:30'),
(12, 3, 400, '2017-01-14', 232, 0, '', '2017-01-14 04:53:01', '2017-01-14 10:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `machine_seller`
--

CREATE TABLE IF NOT EXISTS `machine_seller` (
  `id` int(10) unsigned NOT NULL,
  `seller_id` int(10) unsigned NOT NULL,
  `machine_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `machine_seller`
--

INSERT INTO `machine_seller` (`id`, `seller_id`, `machine_id`) VALUES
(1, 7, 3),
(2, 7, 4),
(3, 8, 1),
(4, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Menu1', 0x3c6469763e3c68323e57686174206973204c6f72656d20497073756d3f3c2f68323e4c6f72656d20497073756d266e6273703b69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e20497420686173207375727669766564206e6f74206f6e6c7920666976652063656e7475726965732c2062757420616c736f20746865206c65617020696e746f20656c656374726f6e6963207479706573657474696e672c2072656d61696e696e6720657373656e7469616c6c7920756e6368616e6765642e2049742077617320706f70756c61726973656420696e207468652031393630732077697468207468652072656c65617365206f66204c657472617365742073686565747320636f6e7461696e696e67204c6f72656d20497073756d2070617373616765732c20616e64206d6f726520726563656e746c792077697468206465736b746f70207075626c697368696e6720736f667477617265206c696b6520416c64757320506167654d616b657220696e636c7564696e672076657273696f6e73206f66204c6f72656d20497073756d2e3c2f6469763e3c6469763e3c68323e57687920646f207765207573652069743f3c2f68323e49742069732061206c6f6e672065737461626c6973686564206661637420746861742061207265616465722077696c6c206265206469737472616374656420627920746865207265616461626c6520636f6e74656e74206f6620612070616765207768656e206c6f6f6b696e6720617420697473206c61796f75742e2054686520706f696e74206f66207573696e67204c6f72656d20497073756d2069732074686174206974206861732061206d6f72652d6f722d6c657373206e6f726d616c20646973747269627574696f6e206f66206c6574746572732c206173206f70706f73656420746f207573696e672027436f6e74656e7420686572652c20636f6e74656e742068657265272c206d616b696e67206974206c6f6f6b206c696b65207265616461626c6520456e676c6973682e204d616e79206465736b746f70207075626c697368696e67207061636b6167657320616e6420776562207061676520656469746f7273206e6f7720757365204c6f72656d20497073756d2061732074686569722064656661756c74206d6f64656c20746578742c20616e6420612073656172636820666f7220276c6f72656d20697073756d272077696c6c20756e636f766572206d616e7920776562207369746573207374696c6c20696e20746865697220696e66616e63792e20566172696f75732076657273696f6e7320686176652065766f6c766564206f766572207468652079656172732c20736f6d6574696d6573206279206163636964656e742c20736f6d6574696d6573206f6e20707572706f73652028696e6a65637465642068756d6f757220616e6420746865206c696b65292e3c2f6469763e3c62723e3c6469763e3c68323e576865726520646f657320697420636f6d652066726f6d3f3c2f68323e436f6e747261727920746f20706f70756c61722062656c6965662c204c6f72656d20497073756d206973206e6f742073696d706c792072616e646f6d20746578742e2049742068617320726f6f747320696e2061207069656365206f6620636c6173736963616c204c6174696e206c6974657261747572652066726f6d2034352042432c206d616b696e67206974206f7665722032303030207965617273206f6c642e2052696368617264204d63436c696e746f636b2c2061204c6174696e2070726f666573736f722061742048616d7064656e2d5379646e657920436f6c6c65676520696e2056697267696e69612c206c6f6f6b6564207570206f6e65206f6620746865206d6f7265206f627363757265204c6174696e20776f7264732c20636f6e73656374657475722c2066726f6d2061204c6f72656d20497073756d20706173736167652c20616e6420676f696e67207468726f75676820746865206369746573206f662074686520776f726420696e20636c6173736963616c206c6974657261747572652c20646973636f76657265642074686520756e646f75627461626c6520736f757263652e204c6f72656d20497073756d20636f6d65732066726f6d2073656374696f6e7320312e31302e333220616e6420312e31302e3333206f66202264652046696e6962757320426f6e6f72756d206574204d616c6f72756d2220285468652045787472656d6573206f6620476f6f6420616e64204576696c292062792043696365726f2c207772697474656e20696e2034352042432e205468697320626f6f6b2069732061207472656174697365206f6e20746865207468656f7279206f66206574686963732c207665727920706f70756c617220647572696e67207468652052656e61697373616e63652e20546865206669727374206c696e65206f66204c6f72656d20497073756d2c20224c6f72656d20697073756d20646f6c6f722073697420616d65742e2e222c20636f6d65732066726f6d2061206c696e6520696e2073656374696f6e20312e31302e33322e546865207374616e64617264206368756e6b206f66204c6f72656d20497073756d20757365642073696e63652074686520313530307320697320726570726f64756365642062656c6f7720666f722074686f736520696e74657265737465642e2053656374696f6e7320312e31302e333220616e6420312e31302e33332066726f6d202264652046696e6962757320426f6e6f72756d206574204d616c6f72756d222062792043696365726f2061726520616c736f20726570726f647563656420696e207468656972206578616374206f726967696e616c20666f726d2c206163636f6d70616e69656420627920456e676c6973682076657273696f6e732066726f6d207468652031393134207472616e736c6174696f6e20627920482e205261636b68616d2e3c2f6469763e, '2017-01-11 08:28:02', '2017-01-11 08:57:55'),
(3, 'Menu2', 0x3c6469763e3c68323e57686174206973204c6f72656d20497073756d3f3c2f68323e4c6f72656d20497073756d266e6273703b69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e20497420686173207375727669766564206e6f74206f6e6c7920666976652063656e7475726965732c2062757420616c736f20746865206c65617020696e746f20656c656374726f6e6963207479706573657474696e672c2072656d61696e696e6720657373656e7469616c6c7920756e6368616e6765642e2049742077617320706f70756c61726973656420696e207468652031393630732077697468207468652072656c65617365206f66204c657472617365742073686565747320636f6e7461696e696e67204c6f72656d20497073756d2070617373616765732c20616e64206d6f726520726563656e746c792077697468206465736b746f70207075626c697368696e6720736f667477617265206c696b6520416c64757320506167654d616b657220696e636c7564696e672076657273696f6e73206f66204c6f72656d20497073756d2e3c2f6469763e3c6469763e3c68323e57687920646f207765207573652069743f3c2f68323e49742069732061206c6f6e672065737461626c6973686564206661637420746861742061207265616465722077696c6c206265206469737472616374656420627920746865207265616461626c6520636f6e74656e74206f6620612070616765207768656e206c6f6f6b696e6720617420697473206c61796f75742e2054686520706f696e74206f66207573696e67204c6f72656d20497073756d2069732074686174206974206861732061206d6f72652d6f722d6c657373206e6f726d616c20646973747269627574696f6e206f66206c6574746572732c206173206f70706f73656420746f207573696e672027436f6e74656e7420686572652c20636f6e74656e742068657265272c206d616b696e67206974206c6f6f6b206c696b65207265616461626c6520456e676c6973682e204d616e79206465736b746f70207075626c697368696e67207061636b6167657320616e6420776562207061676520656469746f7273206e6f7720757365204c6f72656d20497073756d2061732074686569722064656661756c74206d6f64656c20746578742c20616e6420612073656172636820666f7220276c6f72656d20697073756d272077696c6c20756e636f766572206d616e7920776562207369746573207374696c6c20696e20746865697220696e66616e63792e20566172696f75732076657273696f6e7320686176652065766f6c766564206f766572207468652079656172732c20736f6d6574696d6573206279206163636964656e742c20736f6d6574696d6573206f6e20707572706f73652028696e6a65637465642068756d6f757220616e6420746865206c696b65292e3c2f6469763e3c62723e3c6469763e3c68323e576865726520646f657320697420636f6d652066726f6d3f3c2f68323e436f6e747261727920746f20706f70756c61722062656c6965662c204c6f72656d20497073756d206973206e6f742073696d706c792072616e646f6d20746578742e2049742068617320726f6f747320696e2061207069656365206f6620636c6173736963616c204c6174696e206c6974657261747572652066726f6d2034352042432c206d616b696e67206974206f7665722032303030207965617273206f6c642e2052696368617264204d63436c696e746f636b2c2061204c6174696e2070726f666573736f722061742048616d7064656e2d5379646e657920436f6c6c65676520696e2056697267696e69612c206c6f6f6b6564207570206f6e65206f6620746865206d6f7265206f627363757265204c6174696e20776f7264732c20636f6e73656374657475722c2066726f6d2061204c6f72656d20497073756d20706173736167652c20616e6420676f696e67207468726f75676820746865206369746573206f662074686520776f726420696e20636c6173736963616c206c6974657261747572652c20646973636f76657265642074686520756e646f75627461626c6520736f757263652e204c6f72656d20497073756d20636f6d65732066726f6d2073656374696f6e7320312e31302e333220616e6420312e31302e3333206f66202264652046696e6962757320426f6e6f72756d206574204d616c6f72756d2220285468652045787472656d6573206f6620476f6f6420616e64204576696c292062792043696365726f2c207772697474656e20696e2034352042432e205468697320626f6f6b2069732061207472656174697365206f6e20746865207468656f7279206f66206574686963732c207665727920706f70756c617220647572696e67207468652052656e61697373616e63652e20546865206669727374206c696e65206f66204c6f72656d20497073756d2c20224c6f72656d20697073756d20646f6c6f722073697420616d65742e2e222c20636f6d65732066726f6d2061206c696e6520696e2073656374696f6e20312e31302e33322e546865207374616e64617264206368756e6b206f66204c6f72656d20497073756d20757365642073696e63652074686520313530307320697320726570726f64756365642062656c6f7720666f722074686f736520696e74657265737465642e2053656374696f6e7320312e31302e333220616e6420312e31302e33332066726f6d202264652046696e6962757320426f6e6f72756d206574204d616c6f72756d222062792043696365726f2061726520616c736f20726570726f647563656420696e207468656972206578616374206f726967696e616c20666f726d2c206163636f6d70616e69656420627920456e676c6973682076657273696f6e732066726f6d207468652031393134207472616e736c6174696f6e20627920482e205261636b68616d2e3c2f6469763e, '2017-01-11 09:04:39', '2017-01-11 09:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_01_11_123402_create_homes_table', 1),
('2017_01_11_133019_create_abouts_table', 2),
('2017_01_11_142225_create_menus_table', 3),
('2017_01_11_153031_create_partners_table', 4),
('2017_01_12_093710_create_fuels_table', 5),
('2017_01_12_110847_create_machines_table', 6),
('2017_01_12_131929_create_customers_table', 7),
('2017_01_12_134329_create_invoices_table', 8),
('2017_01_12_202841_create_sellers_table', 9),
('2017_01_12_204418_create_machine_seller_table', 10),
('2017_01_13_112458_create_machine_readings_table', 11),
('2017_01_13_141303_create_expenses_table', 12),
('2017_01_13_174349_create_sells_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE IF NOT EXISTS `partners` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `image`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Hasan Rahman', '1484149072.jpg', 'hasan@gmail.com', 'kazipara, Dhaka', '2017-01-11 09:37:55', '2017-01-11 09:37:55'),
(3, 'Abir khan', '1484154301.jpg', 'abirkhan75@hotmail.com', 'kazipara, dhaka Bangladesh', '2017-01-11 11:05:01', '2017-01-11 11:05:01'),
(4, 'admin', '1484155240.jpg', 'hosen@gmail.com', 'kazipara, Dhaka', '2017-01-11 11:20:40', '2017-01-11 11:20:40'),
(5, 'Hosen Mahmud', '1484155277.jpg', 'hasan1@gmail.com', 'kazipara, Dhaka', '2017-01-11 11:21:17', '2017-01-11 11:21:17'),
(6, 'Hosen Mahmud1', '1484155292.jpg', 'hasinur@gmail.com', 'kazipara, Dhaka', '2017-01-11 11:21:33', '2017-01-11 11:21:33'),
(7, 'Mehadi Hasan', '1484155305.jpg', 'mehadi@gmail.com', 'kazipara, Dhaka', '2017-01-11 11:21:46', '2017-01-11 11:21:46'),
(8, 'PHP', '1484155353.jpg', 'hosendfgdf@gmail.com', 'kazipara, dhaka Bangladesh', '2017-01-11 11:22:33', '2017-01-11 11:22:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE IF NOT EXISTS `sellers` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `name`, `email`, `password`, `remember_token`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Hasan Rahman', 'hasan@gmail.com', '$2y$10$VAjA7RFLyw6kQqRXtXFzhOBy/VDAMR6aahUCl9TLVzc8w0s6a3HiK', '', '01716199668', 0, '2017-01-13 03:20:10', '2017-01-13 04:11:28'),
(8, 'Seller Rahman', 'seller@gmail.com', '$2y$10$wptjxIoREgT5U8MnNW73z.fJM.jX5wIINTHQjBDzv2UOUbOgWaqfq', 'RDBGt15WhsRNITye3RRXnXlJvpxy7LKbXfVnZ1UmNRplR1dsRWdRyiN4ugkj', '01716199668', 1, '2017-01-14 06:20:38', '2017-01-14 12:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE IF NOT EXISTS `sells` (
  `id` int(10) unsigned NOT NULL,
  `sell_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(10) unsigned NOT NULL,
  `currency_id` tinyint(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sells`
--

INSERT INTO `sells` (`id`, `sell_date`, `amount`, `currency_id`, `created_at`, `updated_at`) VALUES
(7, '2017-01-13', 5175, 2, '2017-01-13 14:20:46', '2017-01-13 16:34:48'),
(8, '2017-01-14', 23150, 2, '2017-01-14 03:25:59', '2017-01-14 13:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuels`
--
ALTER TABLE `fuels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machine_readings`
--
ALTER TABLE `machine_readings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machine_seller`
--
ALTER TABLE `machine_seller`
  ADD PRIMARY KEY (`id`), ADD KEY `machine_seller_seller_id_foreign` (`seller_id`), ADD KEY `machine_seller_machine_id_foreign` (`machine_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fuels`
--
ALTER TABLE `fuels`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `machine_readings`
--
ALTER TABLE `machine_readings`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `machine_seller`
--
ALTER TABLE `machine_seller`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `machine_seller`
--
ALTER TABLE `machine_seller`
ADD CONSTRAINT `machine_seller_machine_id_foreign` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`),
ADD CONSTRAINT `machine_seller_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
