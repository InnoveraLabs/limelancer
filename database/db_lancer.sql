-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 15, 2021 at 02:43 AM
-- Server version: 5.7.26
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lancer`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_featured` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 'Design', 'design', 0, NULL, NULL),
(2, 'Development', 'development', 0, NULL, NULL),
(3, 'Marketing', 'marketing', 0, NULL, NULL),
(4, 'Contents', 'contents', 0, NULL, NULL),
(5, 'Audio & Music', 'audio&music', 0, NULL, NULL),
(6, 'Video & Animation', 'video&animation', 0, NULL, NULL),
(7, 'Social Media', 'social-media', 0, NULL, NULL),
(8, 'Business Administration', 'business-administration', 0, NULL, NULL),
(9, 'Mobile & Apps', 'mobile-&-apps', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_13_080717_create_modules_table', 1),
(5, '2020_10_13_080831_create_permissions_table', 1),
(6, '2020_10_13_080904_create_roles_table', 1),
(7, '2020_10_13_082100_create_permission_role_table', 1),
(8, '2020_10_24_190816_create_tags_table', 1),
(9, '2020_10_31_013302_create_social_accounts_table', 1),
(10, '2020_10_31_170917_create_categories_table', 1),
(11, '2020_10_31_170918_create_sub_categories_table', 1),
(12, '2020_10_31_184015_create_seller_levels_table', 1),
(13, '2021_01_13_204850_create_packages_table', 1),
(14, '2021_01_13_205603_create_services_table', 1),
(15, '2021_01_13_211733_create_service_pricings_table', 1),
(16, '2021_01_13_211919_create_service_descriptions_table', 1),
(17, '2021_01_14_172056_create_service_requirements_table', 1),
(18, '2021_01_17_202041_create_service_galleries_table', 1),
(19, '2021_01_28_012123_create_orders_table', 1),
(20, '2021_02_02_175553_create_user_lanaguages_table', 1),
(21, '2021_02_03_154509_create_skills_table', 1),
(22, '2021_02_03_154953_create_skill_users_table', 1),
(23, '2021_02_03_222316_create_service_extras_table', 1),
(24, '2021_02_04_165006_create_user_education_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `modules_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin Panel', '2021-03-15 15:24:54', '2021-03-15 15:24:54'),
(2, 'Role Management', '2021-03-15 15:24:54', '2021-03-15 15:24:54'),
(3, 'User Management', '2021-03-15 15:24:54', '2021-03-15 15:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `buyer_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `pricing_id` bigint(20) UNSIGNED NOT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_buyer_id_foreign` (`buyer_id`),
  KEY `orders_service_id_foreign` (`service_id`),
  KEY `orders_pricing_id_foreign` (`pricing_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE IF NOT EXISTS `packages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Basic', NULL, NULL),
(2, 'Standard', NULL, NULL),
(3, 'Premium', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_slug_unique` (`slug`),
  KEY `permissions_module_id_foreign` (`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `module_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Access dashboard', 'admin.dashboard', '2021-03-15 15:24:54', '2021-03-15 15:24:54'),
(2, 2, 'Access Role', 'admin.roles.index', '2021-03-15 15:24:54', '2021-03-15 15:24:54'),
(3, 2, 'Create Role', 'admin.roles.create', '2021-03-15 15:24:54', '2021-03-15 15:24:54'),
(4, 2, 'Edit Role', 'admin.roles.edit', '2021-03-15 15:24:54', '2021-03-15 15:24:54'),
(5, 2, 'Delete Role', 'admin.roles.destroy', '2021-03-15 15:24:54', '2021-03-15 15:24:54'),
(6, 3, 'Access User', 'admin.users.index', '2021-03-15 15:24:54', '2021-03-15 15:24:54'),
(7, 3, 'Create User', 'admin.users.create', '2021-03-15 15:24:54', '2021-03-15 15:24:54'),
(8, 3, 'Edit User', 'admin.users.edit', '2021-03-15 15:24:54', '2021-03-15 15:24:54'),
(9, 3, 'Delete User', 'admin.users.destroy', '2021-03-15 15:24:54', '2021-03-15 15:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 4, 1, NULL, NULL),
(5, 5, 1, NULL, NULL),
(6, 6, 1, NULL, NULL),
(7, 7, 1, NULL, NULL),
(8, 8, 1, NULL, NULL),
(9, 9, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deletable` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `deletable`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, 0, '2021-03-15 15:24:54', '2021-03-15 15:24:54'),
(2, 'User', 'user', NULL, 0, '2021-03-15 15:24:54', '2021-03-15 15:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `seller_levels`
--

DROP TABLE IF EXISTS `seller_levels`;
CREATE TABLE IF NOT EXISTS `seller_levels` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gig_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tags` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0-draft, 1- active, 2-paused',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `services_category_id_foreign` (`category_id`),
  KEY `services_sub_category_id_foreign` (`sub_category_id`),
  KEY `services_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `gig_slug`, `category_id`, `sub_category_id`, `user_id`, `tags`, `status`, `created_at`, `updated_at`) VALUES
(1, 'do at the test drives', 'do-at-the-test-drive', 2, 17, 3, '    h,k,kk,kkkk', 1, '2021-03-15 16:44:57', '2021-04-07 07:25:35'),
(2, 'do a business', 'do-a-business', 1, 10, 3, '  test,value', 1, '2021-03-31 15:11:04', '2021-04-11 15:06:01'),
(4, 'do what i can want to do.', 'do-what-i-can-want-to-do', 1, 2, 3, 'd,test,value', 0, '2021-04-07 03:03:58', '2021-04-07 03:03:58'),
(5, 'do nothing', 'do-nothing', 3, 30, 3, '  first,latter', 1, '2021-04-07 03:17:09', '2021-04-11 15:07:14'),
(6, 'do nothing   here', 'do-nothing-here', 2, 21, 3, 'dev,data', 0, '2021-04-07 03:17:46', '2021-04-07 03:17:46'),
(7, 'do a photo edit.', 'do-a-photo-edit', 1, 2, 3, 'banner', 0, '2021-04-07 07:12:07', '2021-04-07 07:12:07'),
(8, 'do a graphics design', 'do-a-graphics-design', 1, 1, 3, 'design,new,data', 0, '2021-04-09 07:44:10', '2021-04-09 07:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `service_descriptions`
--

DROP TABLE IF EXISTS `service_descriptions`;
CREATE TABLE IF NOT EXISTS `service_descriptions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_descriptions_service_id_foreign` (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service_descriptions`
--

INSERT INTO `service_descriptions` (`id`, `service_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, '<p>hi hello&nbsp; jdsncnljsd ajsndadsjls jasdbdsjl asjdbasjdfb&nbsp; &nbsp;asdjhasd sadnasld jaslnhasdjl asjlhadsl sajldlsajd jasldbasjld jaslbdljasd lasdnnlaskjd asklndlksa masdblasjd nasbdlsadb asdbljasdb&nbsp; asdljbsadljsa KKK</p>', '2021-03-15 17:54:43', '2021-03-15 17:54:43'),
(6, 8, '<p>my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;m&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deepy name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep&nbsp;my name is Deep</p>', '2021-04-09 08:17:10', '2021-04-09 08:17:10'),
(3, 2, '<p>This is a test job&nbsp;This is a test job&nbsp;This is a test job&nbsp;This is a test jobThis is a test jobThis is a test job&nbsp;&nbsp;This is a test job&nbsp;This is a test job&nbsp;This is a test job&nbsp;This is a test job&nbsp;This is a test jobThis is a test jobThis is a test job</p>', '2021-03-31 15:12:45', '2021-03-31 15:12:45'),
(5, 3, '<p>nbnbnbb jkjasgdkjads askbsadkhfdsamb fklasdbkhadsvf bavdskhsavdf adsvfhksdf&nbsp;nbnbnbb jkjasgdkjads askbsadkhfdsamb fklasdbkhadsvf bavdskhsavdf adsvfhksdf m,,nb,m,bmb</p>', '2021-04-01 15:19:11', '2021-04-01 15:19:11'),
(7, 5, '<p>HI Hello why&nbsp;HI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello whyHI Hello why</p>', '2021-04-11 15:06:47', '2021-04-11 15:06:47');

-- --------------------------------------------------------

--
-- Table structure for table `service_extras`
--

DROP TABLE IF EXISTS `service_extras`;
CREATE TABLE IF NOT EXISTS `service_extras` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `extra_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extra_desc` longtext COLLATE utf8_unicode_ci NOT NULL,
  `extra_price` double(8,2) NOT NULL,
  `fast_delivery` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_extras_service_id_foreign` (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service_extras`
--

INSERT INTO `service_extras` (`id`, `service_id`, `extra_title`, `extra_desc`, `extra_price`, `fast_delivery`, `created_at`, `updated_at`) VALUES
(103, 2, 'new', 'no new', 5.00, '2', '2021-04-11 15:05:33', '2021-04-11 15:05:33'),
(101, 1, 'sahdkgaskhd', 'asjdadskjfdbs jsdbbasjk', 10.00, '3', '2021-04-08 14:49:52', '2021-04-08 14:49:52'),
(102, 1, 'test', 'no description', 5.00, '1', '2021-04-08 14:49:52', '2021-04-08 14:49:52'),
(104, 2, 'test', 'no description', 5.00, '2', '2021-04-11 15:05:33', '2021-04-11 15:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `service_galleries`
--

DROP TABLE IF EXISTS `service_galleries`;
CREATE TABLE IF NOT EXISTS `service_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `featured_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_type` int(11) NOT NULL COMMENT '1-image,2-video,3-pdf',
  `file_number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `service_galleries_service_id_foreign` (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service_galleries`
--

INSERT INTO `service_galleries` (`id`, `service_id`, `featured_image`, `file_type`, `file_number`, `created_at`, `updated_at`) VALUES
(55, 5, '31618153632.png', 1, 3, '2021-04-11 15:07:12', '2021-04-11 15:07:12'),
(54, 5, '21618153632.jpg', 1, 2, '2021-04-11 15:07:12', '2021-04-11 15:07:12'),
(53, 5, '11618153632.jpg', 1, 1, '2021-04-11 15:07:12', '2021-04-11 15:07:12'),
(52, 2, '31618153558.jpg', 1, 3, '2021-04-11 15:05:58', '2021-04-11 15:05:58'),
(51, 2, '21618153558.jpg', 1, 2, '2021-04-11 15:05:58', '2021-04-11 15:05:58'),
(50, 2, '11618153558.jpg', 1, 1, '2021-04-11 15:05:58', '2021-04-11 15:05:58'),
(45, 1, '51617354083.pdf', 3, 1, '2021-04-02 09:01:23', '2021-04-02 09:01:23'),
(44, 1, '11617354663.png', 1, 1, '2021-04-02 08:38:43', '2021-04-02 08:38:43'),
(49, 1, '31618119470.JPG', 1, 3, '2021-04-11 05:37:50', '2021-04-11 05:37:50'),
(47, 1, '21617774929.JPG', 1, 2, '2021-04-07 05:55:29', '2021-04-07 05:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `service_pricings`
--

DROP TABLE IF EXISTS `service_pricings`;
CREATE TABLE IF NOT EXISTS `service_pricings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `package_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_source` tinyint(4) DEFAULT '0',
  `delivery_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `revisions` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_pricings_service_id_foreign` (`service_id`),
  KEY `service_pricings_package_id_foreign` (`package_id`)
) ENGINE=MyISAM AUTO_INCREMENT=203 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service_pricings`
--

INSERT INTO `service_pricings` (`id`, `service_id`, `package_id`, `package_name`, `description`, `is_source`, `delivery_date`, `revisions`, `price`, `created_at`, `updated_at`) VALUES
(13, 3, 1, NULL, 'jsdh sajbaksjdf', 0, '1', '6', 90.00, '2021-04-01 15:11:33', '2021-04-01 15:11:33'),
(191, 1, 3, 'General', 'ff', 0, '2', '4', 500.00, '2021-04-08 14:49:52', '2021-04-08 14:49:52'),
(22, 7, 3, NULL, 'test', 0, '1', '0', 300.00, '2021-04-07 07:25:00', '2021-04-07 07:25:00'),
(21, 7, 2, NULL, 'test', 0, '1', '0', 200.00, '2021-04-07 07:25:00', '2021-04-07 07:25:00'),
(20, 7, 1, NULL, 'test', 0, '1', '0', 100.00, '2021-04-07 07:25:00', '2021-04-07 07:25:00'),
(199, 2, 1, '1', 'test1', 1, '1', '10', 100.00, '2021-04-11 15:05:33', '2021-04-11 15:05:33'),
(200, 2, 2, '2', 'tesst2', 1, '2', '1', 200.00, '2021-04-11 15:05:33', '2021-04-11 15:05:33'),
(201, 2, 3, '3', 'test3', 0, '3', '1', 300.00, '2021-04-11 15:05:33', '2021-04-11 15:05:33'),
(202, 5, 1, 'Basic', 'Test', 1, '1', '1', 100.00, '2021-04-11 15:06:32', '2021-04-11 15:06:32'),
(190, 1, 2, 'S', 'ff', 0, '5', '1', 300.00, '2021-04-08 14:49:52', '2021-04-08 14:49:52'),
(189, 1, 1, 'M', 'ffasjashd askjdbasljd', 0, '7', '4', 100.00, '2021-04-08 14:49:52', '2021-04-08 14:49:52'),
(198, 8, 3, 'General', 'test', 1, '1', '1', 38.00, '2021-04-09 08:16:42', '2021-04-09 08:16:42'),
(197, 8, 2, 'General', 'test', 1, '1', '1', 30.00, '2021-04-09 08:16:42', '2021-04-09 08:16:42'),
(196, 8, 1, 'General', 'test', 1, '1', '1', 100.00, '2021-04-09 08:16:42', '2021-04-09 08:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `service_requirements`
--

DROP TABLE IF EXISTS `service_requirements`;
CREATE TABLE IF NOT EXISTS `service_requirements` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `buyer_instruction` longtext COLLATE utf8_unicode_ci NOT NULL,
  `req_options` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `service_requirements_service_id_foreign` (`service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service_requirements`
--

INSERT INTO `service_requirements` (`id`, `service_id`, `buyer_instruction`, `req_options`, `created_at`, `updated_at`) VALUES
(42, 5, 'NO', 1, '2021-04-11 15:06:55', '2021-04-11 15:06:55'),
(14, 1, 'Is he Capable of that ?', 2, '2021-04-02 07:17:53', '2021-04-02 07:17:53'),
(41, 8, 'No Question', 1, '2021-04-11 05:36:21', '2021-04-11 05:36:21'),
(8, 2, 'what is your questi?', 3, '2021-03-31 15:13:08', '2021-03-31 15:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `service_requirements_options`
--

DROP TABLE IF EXISTS `service_requirements_options`;
CREATE TABLE IF NOT EXISTS `service_requirements_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) DEFAULT NULL,
  `requirement_id` int(11) DEFAULT NULL,
  `option_id` int(11) DEFAULT NULL,
  `option_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_requirements_options`
--

INSERT INTO `service_requirements_options` (`id`, `service_id`, `requirement_id`, `option_id`, `option_name`) VALUES
(30, 1, 14, 0, 'Yes'),
(31, 1, 14, 1, 'NO'),
(51, 8, 25, 1, 'Yes'),
(52, 8, 25, 2, 'No'),
(53, 8, 25, 3, 'Can'),
(54, 8, 25, 4, '1'),
(55, 8, 25, 5, '2'),
(56, 8, 25, 6, '3'),
(59, 8, 26, 1, 'Yes'),
(60, 8, 26, 2, 'No'),
(61, 8, 26, 3, 'Can'),
(62, 8, 26, 4, '1'),
(63, 8, 26, 5, '2'),
(64, 8, 26, 6, '3'),
(68, 8, 27, 1, 'Yes'),
(69, 8, 27, 2, 'No'),
(70, 8, 27, 3, 'Can'),
(71, 8, 27, 4, '1'),
(72, 8, 27, 5, '2'),
(73, 8, 27, 6, '3'),
(78, 8, 28, 1, 'Yes'),
(79, 8, 28, 2, 'No'),
(80, 8, 28, 3, 'Can'),
(81, 8, 28, 4, '1'),
(82, 8, 28, 5, '2'),
(83, 8, 28, 6, '3'),
(89, 8, 29, 1, 'Yes'),
(90, 8, 29, 2, 'No'),
(91, 8, 29, 3, 'Can'),
(92, 8, 29, 4, '1'),
(93, 8, 29, 5, '2'),
(94, 8, 29, 6, '3'),
(101, 8, 30, 1, 'Yes'),
(102, 8, 30, 2, 'No'),
(103, 8, 30, 3, 'Can'),
(104, 8, 30, 4, '1'),
(105, 8, 30, 5, '2'),
(106, 8, 30, 6, '3'),
(114, 8, 31, 1, 'Yes'),
(115, 8, 31, 2, 'No'),
(116, 8, 31, 3, 'Can'),
(117, 8, 31, 4, '1'),
(118, 8, 31, 5, '2'),
(119, 8, 31, 6, '3'),
(122, 8, 32, 1, 'Yes'),
(123, 8, 32, 2, 'No'),
(124, 8, 32, 3, 'Can'),
(125, 8, 32, 4, '1'),
(126, 8, 32, 5, '2'),
(127, 8, 32, 6, '3'),
(130, 8, 33, 1, 'Yes'),
(131, 8, 33, 2, 'No'),
(132, 8, 33, 3, 'Can'),
(133, 8, 33, 4, '1'),
(134, 8, 33, 5, '2'),
(135, 8, 33, 6, '3'),
(138, 8, 34, 1, 'Yes'),
(139, 8, 34, 2, 'No'),
(140, 8, 34, 3, 'Can'),
(141, 8, 34, 4, '1'),
(142, 8, 34, 5, '2'),
(143, 8, 34, 6, '3'),
(146, 8, 35, 1, 'Yes'),
(147, 8, 35, 2, 'No'),
(148, 8, 35, 3, 'Can'),
(149, 8, 35, 4, '1'),
(150, 8, 35, 5, '2'),
(151, 8, 35, 6, '3');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `skills_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skills_name`, `created_at`, `updated_at`) VALUES
(1, 'Web Development', NULL, NULL),
(2, 'PHP', NULL, NULL),
(3, 'Javascript', NULL, NULL),
(4, 'Web Scrapping', NULL, NULL),
(5, 'HTML', NULL, NULL),
(6, 'CSS', NULL, NULL),
(7, 'Laravel Developer', NULL, NULL),
(8, 'Vue Js', NULL, NULL),
(9, 'Jquery', NULL, NULL),
(10, 'Livewire', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skill_users`
--

DROP TABLE IF EXISTS `skill_users`;
CREATE TABLE IF NOT EXISTS `skill_users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  `skills_level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `skill_users_user_id_foreign` (`user_id`),
  KEY `skill_users_skill_id_foreign` (`skill_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

DROP TABLE IF EXISTS `social_accounts`;
CREATE TABLE IF NOT EXISTS `social_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `provider` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` text COLLATE utf8_unicode_ci,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `social_accounts_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_c_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sub_c_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_categories_category_id_foreign` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `sub_c_name`, `sub_c_slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Logo Design', 'logo-design', NULL, NULL),
(2, 1, 'Banner Ads', 'banner-ads', NULL, NULL),
(3, 1, 'Convert File Formats', 'convert-file-formats', NULL, NULL),
(4, 1, 'Web and Mobile', 'web-and-mobile', NULL, NULL),
(5, 1, 'Infographics', 'infographics', NULL, NULL),
(6, 1, 'Invitations', 'invitations', NULL, NULL),
(7, 1, 'CMS Marketing', 'cms-marketing', NULL, NULL),
(8, 1, 'Cartoon and Drawing', 'cartoon-drawing', NULL, NULL),
(9, 1, 'T-Shirts', 't-shirts', NULL, NULL),
(10, 1, '2D and 3D Modeling', '2d-3d-modeling', NULL, NULL),
(11, 1, 'Social Media Design', 'social-media-design', NULL, NULL),
(12, 1, 'Book Cover', 'book-cover', NULL, NULL),
(13, 1, 'Photoshop Editing', 'photoshop-editing', NULL, NULL),
(14, 1, 'Presentation', 'presentation', NULL, NULL),
(15, 1, 'Vector Trace', 'vector-trace', NULL, NULL),
(16, 1, 'Other Design', 'other-design', NULL, NULL),
(17, 2, 'WordPress', 'wordPress', NULL, NULL),
(18, 2, 'Database', 'database', NULL, NULL),
(19, 2, 'Web Programming', 'web-programming', NULL, NULL),
(20, 2, 'Desktop Apps', 'desktop-apps', NULL, NULL),
(21, 2, 'Data Analysis', 'data-analysis', NULL, NULL),
(22, 2, 'Testing Debut', 'testing-debut', NULL, NULL),
(23, 2, 'Other Development', 'other-developmentg', NULL, NULL),
(24, 2, 'Web Builders', 'web-builders', NULL, NULL),
(25, 2, 'Mobile Apps', 'mobile-apps', NULL, NULL),
(26, 2, 'Bots', 'bots', NULL, NULL),
(27, 2, 'File Convert', 'file-convert', NULL, NULL),
(28, 2, 'Q & A', 'quality-assurance', NULL, NULL),
(29, 2, 'Arts & Science', 'arts-science', NULL, NULL),
(30, 3, 'SEO', 'seo', NULL, NULL),
(31, 3, 'Video Advertising', 'video-advertising', NULL, NULL),
(32, 3, 'Web Analyticn', 'web-analytic', NULL, NULL),
(33, 3, 'Domain Guru', 'domain-guru', NULL, NULL),
(34, 3, 'SME', 'sme', NULL, NULL),
(35, 3, 'Link Building', 'link-building', NULL, NULL),
(36, 3, 'Email Marketing', 'email-marketing', NULL, NULL),
(37, 3, 'Local Listing', 'local-listing', NULL, NULL),
(38, 3, 'Mobile Ads', 'mobile-ads', NULL, NULL),
(39, 3, 'Personal Pro', 'personal-pro', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_zone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `primary_language` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `avatar`, `bio`, `description`, `country`, `time_zone`, `primary_language`, `role_id`, `confirmed`, `confirmation_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Administrator', 'admin@admin.com', NULL, '$2y$10$Xu00GYT.I0JcPyOWXWrFGuVVX53McFeYQxw1wtmnXN9.08vZfkaiW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, '2021-03-15 15:24:55', '2021-03-15 15:24:55'),
(2, 'User', 'normal-user', 'user@user.com', NULL, '$2y$10$dnj3MOukD9Vm1AUJb4Rqw.L07izX2SeelHfZWjJI7ekVfQIPIljUm', NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, NULL, NULL, '2021-03-15 15:24:55', '2021-03-15 15:24:55'),
(3, 'Deep Kumar Roy Moulick', 'deepshovon', 'deepshovon@gmail.com', NULL, '$2y$10$OOHO5tD4HW5ar3nOTo8BHuXTRIjQWQ4Rpyt.Dp6V6M89pMa6CfSDO', NULL, 'Who Cares?', 'Test Test Tset Tes Test Test Tset Tes Test Test Tset Tes Test Test Tset Tes Test Test Tset Tes Test Test Tset TesTest Test Tset TesTest Test Tset Tes j', NULL, NULL, NULL, 2, 0, NULL, NULL, '2021-03-15 15:28:51', '2021-04-08 14:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_education`
--

DROP TABLE IF EXISTS `user_education`;
CREATE TABLE IF NOT EXISTS `user_education` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `collage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `degree_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `major` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passing_year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_education_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_lanaguages`
--

DROP TABLE IF EXISTS `user_lanaguages`;
CREATE TABLE IF NOT EXISTS `user_lanaguages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `lang_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang_level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_lanaguages_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
