-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th8 27, 2019 lúc 03:45 PM
-- Phiên bản máy phục vụ: 10.2.26-MariaDB-cll-lve
-- Phiên bản PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ttbdvgdt_vaiaodaithanhthuy`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Góc chia sẻ', 'goc-chia-se', 0, '2019-08-05 08:22:31', '2019-08-09 03:23:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_post`
--

CREATE TABLE `category_post` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_post`
--

INSERT INTO `category_post` (`category_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 13, '2019-08-23 08:47:23', '2019-08-23 08:47:23'),
(1, 14, '2019-08-22 08:01:10', '2019-08-22 08:01:10'),
(1, 15, '2019-08-22 07:59:08', '2019-08-22 07:59:08'),
(1, 21, '2019-08-22 08:55:16', '2019-08-22 08:55:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_product`
--

CREATE TABLE `category_product` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_product`
--

INSERT INTO `category_product` (`category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 23, '2019-08-17 12:15:39', '2019-08-17 12:15:39'),
(1, 24, '2019-08-17 12:16:52', '2019-08-17 12:16:52'),
(1, 25, '2019-08-17 12:18:20', '2019-08-17 12:18:20'),
(1, 26, '2019-08-17 12:19:04', '2019-08-17 12:19:04'),
(1, 27, '2019-08-17 12:21:06', '2019-08-17 12:21:06'),
(1, 28, '2019-08-17 12:21:43', '2019-08-17 12:21:43'),
(1, 29, '2019-08-17 12:22:36', '2019-08-17 12:22:36'),
(1, 30, '2019-08-17 12:23:27', '2019-08-17 12:23:27'),
(1, 31, '2019-08-17 12:24:57', '2019-08-17 12:24:57'),
(1, 32, '2019-08-17 12:25:34', '2019-08-17 12:25:34'),
(1, 33, '2019-08-17 12:26:29', '2019-08-17 12:26:29'),
(1, 34, '2019-08-17 12:27:10', '2019-08-17 12:27:10'),
(1, 35, '2019-08-17 12:29:17', '2019-08-17 12:29:17'),
(1, 36, '2019-08-17 12:30:03', '2019-08-17 12:30:03'),
(1, 37, '2019-08-21 09:26:54', '2019-08-21 09:26:54'),
(1, 38, '2019-08-17 12:31:55', '2019-08-17 12:31:55'),
(1, 39, '2019-08-17 12:32:44', '2019-08-17 12:32:44'),
(1, 40, '2019-08-21 09:24:11', '2019-08-21 09:24:11'),
(1, 41, '2019-08-17 12:34:18', '2019-08-17 12:34:18'),
(1, 42, '2019-08-17 12:35:59', '2019-08-17 12:35:59'),
(1, 43, '2019-08-21 09:24:02', '2019-08-21 09:24:02'),
(1, 44, '2019-08-21 09:23:54', '2019-08-21 09:23:54'),
(1, 45, '2019-08-21 08:57:47', '2019-08-21 08:57:47'),
(1, 46, '2019-08-22 09:55:15', '2019-08-22 09:55:15'),
(1, 47, '2019-08-22 09:48:06', '2019-08-22 09:48:06'),
(1, 48, '2019-08-22 09:49:05', '2019-08-22 09:49:05'),
(1, 49, '2019-08-22 09:49:31', '2019-08-22 09:49:31'),
(1, 50, '2019-08-22 09:50:03', '2019-08-22 09:50:03'),
(1, 51, '2019-08-22 09:50:37', '2019-08-22 09:50:37'),
(1, 52, '2019-08-22 09:51:14', '2019-08-22 09:51:14'),
(1, 53, '2019-08-22 09:51:49', '2019-08-22 09:51:49'),
(1, 54, '2019-08-22 09:52:25', '2019-08-22 09:52:25'),
(1, 55, '2019-08-22 09:52:59', '2019-08-22 09:52:59'),
(1, 56, '2019-08-22 09:53:30', '2019-08-22 09:53:30'),
(1, 57, '2019-08-22 09:54:01', '2019-08-22 09:54:01'),
(1, 58, '2019-08-22 09:54:35', '2019-08-22 09:54:35'),
(1, 59, '2019-08-22 09:55:03', '2019-08-22 09:55:03'),
(2, 64, '2019-08-26 07:47:33', '2019-08-26 07:47:33'),
(2, 65, '2019-08-26 07:48:11', '2019-08-26 07:48:11'),
(2, 66, '2019-08-26 07:48:41', '2019-08-26 07:48:41'),
(2, 67, '2019-08-26 07:51:33', '2019-08-26 07:51:33'),
(2, 68, '2019-08-26 07:52:10', '2019-08-26 07:52:10'),
(2, 69, '2019-08-26 07:52:40', '2019-08-26 07:52:40'),
(2, 70, '2019-08-26 07:53:14', '2019-08-26 07:53:14'),
(3, 60, '2019-08-23 00:51:24', '2019-08-23 00:51:24'),
(3, 61, '2019-08-23 00:51:51', '2019-08-23 00:51:51'),
(3, 62, '2019-08-23 01:04:19', '2019-08-23 01:04:19'),
(3, 63, '2019-08-23 08:43:55', '2019-08-23 08:43:55'),
(12, 47, '2019-08-22 09:48:06', '2019-08-22 09:48:06'),
(12, 48, '2019-08-22 09:49:05', '2019-08-22 09:49:05'),
(12, 49, '2019-08-22 09:49:31', '2019-08-22 09:49:31'),
(12, 50, '2019-08-22 09:50:03', '2019-08-22 09:50:03'),
(12, 51, '2019-08-22 09:50:37', '2019-08-22 09:50:37'),
(12, 52, '2019-08-22 09:51:14', '2019-08-22 09:51:14'),
(12, 53, '2019-08-22 09:51:49', '2019-08-22 09:51:49'),
(12, 54, '2019-08-22 09:52:25', '2019-08-22 09:52:25'),
(12, 55, '2019-08-22 09:52:59', '2019-08-22 09:52:59'),
(12, 56, '2019-08-22 09:53:30', '2019-08-22 09:53:30'),
(12, 57, '2019-08-22 09:54:01', '2019-08-22 09:54:01'),
(12, 58, '2019-08-22 09:54:35', '2019-08-22 09:54:35'),
(12, 59, '2019-08-22 09:55:03', '2019-08-22 09:55:03'),
(13, 46, '2019-08-22 09:55:15', '2019-08-22 09:55:15'),
(14, 23, '2019-08-17 12:15:39', '2019-08-17 12:15:39'),
(14, 24, '2019-08-17 12:16:52', '2019-08-17 12:16:52'),
(14, 25, '2019-08-17 12:18:20', '2019-08-17 12:18:20'),
(14, 26, '2019-08-17 12:19:04', '2019-08-17 12:19:04'),
(14, 27, '2019-08-17 12:21:06', '2019-08-17 12:21:06'),
(14, 28, '2019-08-17 12:21:43', '2019-08-17 12:21:43'),
(14, 29, '2019-08-17 12:22:36', '2019-08-17 12:22:36'),
(14, 30, '2019-08-17 12:23:27', '2019-08-17 12:23:27'),
(14, 31, '2019-08-17 12:24:57', '2019-08-17 12:24:57'),
(14, 32, '2019-08-17 12:25:34', '2019-08-17 12:25:34'),
(14, 33, '2019-08-17 12:26:29', '2019-08-17 12:26:29'),
(14, 34, '2019-08-17 12:27:10', '2019-08-17 12:27:10'),
(14, 35, '2019-08-17 12:29:17', '2019-08-17 12:29:17'),
(14, 36, '2019-08-17 12:30:03', '2019-08-17 12:30:03'),
(14, 37, '2019-08-21 09:26:54', '2019-08-21 09:26:54'),
(14, 38, '2019-08-17 12:31:55', '2019-08-17 12:31:55'),
(14, 39, '2019-08-17 12:32:44', '2019-08-17 12:32:44'),
(14, 40, '2019-08-21 09:24:11', '2019-08-21 09:24:11'),
(14, 41, '2019-08-17 12:34:18', '2019-08-17 12:34:18'),
(14, 42, '2019-08-17 12:35:59', '2019-08-17 12:35:59'),
(14, 43, '2019-08-21 09:24:02', '2019-08-21 09:24:02'),
(14, 44, '2019-08-21 09:23:54', '2019-08-21 09:23:54'),
(14, 45, '2019-08-21 08:57:47', '2019-08-21 08:57:47'),
(14, 46, '2019-08-22 09:55:15', '2019-08-22 09:55:15'),
(19, 60, '2019-08-23 00:51:24', '2019-08-23 00:51:24'),
(19, 61, '2019-08-23 00:51:51', '2019-08-23 00:51:51'),
(19, 62, '2019-08-23 01:04:19', '2019-08-23 01:04:19'),
(19, 63, '2019-08-23 08:43:55', '2019-08-23 08:43:55'),
(22, 64, '2019-08-26 07:47:33', '2019-08-26 07:47:33'),
(22, 65, '2019-08-26 07:48:11', '2019-08-26 07:48:11'),
(22, 66, '2019-08-26 07:48:41', '2019-08-26 07:48:41'),
(23, 67, '2019-08-26 07:51:33', '2019-08-26 07:51:33'),
(23, 68, '2019-08-26 07:52:10', '2019-08-26 07:52:10'),
(23, 69, '2019-08-26 07:52:40', '2019-08-26 07:52:40'),
(23, 70, '2019-08-26 07:53:14', '2019-08-26 07:53:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `slug`, `publish`, `created_at`, `updated_at`) VALUES
(2, 'Slider Trang chủ', 'slider-trang-chu', 'publish', '2019-08-05 09:20:48', '2019-08-05 09:20:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gallery_items`
--

CREATE TABLE `gallery_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `gallery_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gallery_items`
--

INSERT INTO `gallery_items` (`id`, `title`, `description`, `image`, `order`, `gallery_id`, `created_at`, `updated_at`) VALUES
(25, 'Vải áo dài Thanh Thủy', NULL, '2_1566465016.jpeg', 2, 2, '2019-08-22 09:10:16', '2019-08-22 09:10:16'),
(26, 'Vải áo dài Thanh Thủy', NULL, '2_1566465029.jpeg', 2, 2, '2019-08-22 09:10:29', '2019-08-22 09:10:29'),
(27, 'Vải áo dài Thanh Thủy', NULL, '2_1566465034.jpeg', 3, 2, '2019-08-22 09:10:34', '2019-08-22 09:10:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `disk` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `directory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aggregate_type` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `media`
--

INSERT INTO `media` (`id`, `disk`, `directory`, `filename`, `extension`, `mime_type`, `aggregate_type`, `size`, `created_at`, `updated_at`) VALUES
(1, 'public', 'media/product/2019_8', '5d57efae347e0', 'png', 'image/png', 'image', 3166775, '2019-08-17 12:14:40', '2019-08-17 12:14:40'),
(2, 'public', 'media/product/2019_8', '5d57f02d43111', 'png', 'image/png', 'image', 2054430, '2019-08-17 12:16:46', '2019-08-17 12:16:46'),
(3, 'public', 'media/product/2019_8', '5d57f0647cf8a', 'png', 'image/png', 'image', 2865949, '2019-08-17 12:17:42', '2019-08-17 12:17:42'),
(4, 'public', 'media/product/2019_8', '5d57f0b19bce2', 'png', 'image/png', 'image', 2194260, '2019-08-17 12:18:59', '2019-08-17 12:18:59'),
(5, 'public', 'media/product/2019_8', '5d57f12b81133', 'png', 'image/png', 'image', 2275503, '2019-08-17 12:21:01', '2019-08-17 12:21:01'),
(6, 'public', 'media/product/2019_8', '5d57f1537a666', 'png', 'image/png', 'image', 1425236, '2019-08-17 12:21:40', '2019-08-17 12:21:40'),
(7, 'public', 'media/product/2019_8', '5d57f186ab548', 'png', 'image/png', 'image', 2034810, '2019-08-17 12:22:32', '2019-08-17 12:22:32'),
(9, 'public', 'media/product/2019_8', '5d57f1b84e7f1', 'png', 'image/png', 'image', 1537203, '2019-08-17 12:23:21', '2019-08-17 12:23:21'),
(10, 'public', 'media/product/2019_8', '5d57f213d7187', 'png', 'image/png', 'image', 1657269, '2019-08-17 12:24:53', '2019-08-17 12:24:53'),
(11, 'public', 'media/product/2019_8', '5d57f2398a10d', 'png', 'image/png', 'image', 1107656, '2019-08-17 12:25:30', '2019-08-17 12:25:30'),
(12, 'public', 'media/product/2019_8', '5d57f26f6bdbe', 'png', 'image/png', 'image', 1917823, '2019-08-17 12:26:24', '2019-08-17 12:26:24'),
(13, 'public', 'media/product/2019_8', '5d57f29a206b4', 'png', 'image/png', 'image', 577489, '2019-08-17 12:27:06', '2019-08-17 12:27:06'),
(14, 'public', 'media/product/2019_8', '5d57f3190782e', 'png', 'image/png', 'image', 1119067, '2019-08-17 12:29:13', '2019-08-17 12:29:13'),
(15, 'public', 'media/product/2019_8', '5d57f340b1e1c', 'png', 'image/png', 'image', 2410645, '2019-08-17 12:29:54', '2019-08-17 12:29:54'),
(16, 'public', 'media/product/2019_8', '5d57f36f5b094', 'png', 'image/png', 'image', 2577787, '2019-08-17 12:30:40', '2019-08-17 12:30:40'),
(17, 'public', 'media/product/2019_8', '5d57f3b3b56e1', 'png', 'image/png', 'image', 2436808, '2019-08-17 12:31:49', '2019-08-17 12:31:49'),
(19, 'public', 'media/product/2019_8', '5d57f3e5ec497', 'png', 'image/png', 'image', 2790367, '2019-08-17 12:32:39', '2019-08-17 12:32:39'),
(20, 'public', 'media/product/2019_8', '5d57f41856571', 'png', 'image/png', 'image', 2632657, '2019-08-17 12:33:29', '2019-08-17 12:33:29'),
(21, 'public', 'media/product/2019_8', '5d57f4421a8f0', 'png', 'image/png', 'image', 3003435, '2019-08-17 12:34:12', '2019-08-17 12:34:12'),
(22, 'public', 'media/product/2019_8', '5d57f46fa3301', 'png', 'image/png', 'image', 3259974, '2019-08-17 12:34:57', '2019-08-17 12:34:57'),
(23, 'public', 'media/product/2019_8', '5d57f4d5ae23a', 'png', 'image/png', 'image', 3135579, '2019-08-17 12:36:39', '2019-08-17 12:36:39'),
(24, 'public', 'media/product/2019_8', '5d57f507577f8', 'png', 'image/png', 'image', 3576350, '2019-08-17 12:37:29', '2019-08-17 12:37:29'),
(25, 'public', 'media/product/2019_8', '5d57f52cc489a', 'png', 'image/png', 'image', 3236387, '2019-08-17 12:38:06', '2019-08-17 12:38:06'),
(26, 'public', 'media/product/2019_8', '5d57f55915bf5', 'png', 'image/png', 'image', 2385438, '2019-08-17 12:38:50', '2019-08-17 12:38:50'),
(27, 'public', 'media/product/2019_8', '5d5e64c0db637', 'png', 'image/png', 'image', 2550901, '2019-08-22 09:47:46', '2019-08-22 09:47:46'),
(28, 'public', 'media/product/2019_8', '5d5e650636e88', 'png', 'image/png', 'image', 2686988, '2019-08-22 09:48:55', '2019-08-22 09:48:55'),
(29, 'public', 'media/product/2019_8', '5d5e65262b245', 'png', 'image/png', 'image', 3151726, '2019-08-22 09:49:27', '2019-08-22 09:49:27'),
(30, 'public', 'media/product/2019_8', '5d5e654698d7e', 'png', 'image/png', 'image', 2579903, '2019-08-22 09:49:59', '2019-08-22 09:49:59'),
(31, 'public', 'media/product/2019_8', '5d5e656829d8c', 'png', 'image/png', 'image', 2328814, '2019-08-22 09:50:34', '2019-08-22 09:50:34'),
(32, 'public', 'media/product/2019_8', '5d5e65850b01b', 'png', 'image/png', 'image', 250145, '2019-08-22 09:51:01', '2019-08-22 09:51:01'),
(33, 'public', 'media/product/2019_8', '5d5e658b742b3', 'png', 'image/png', 'image', 2270227, '2019-08-22 09:51:09', '2019-08-22 09:51:09'),
(34, 'public', 'media/product/2019_8', '5d5e65b07a9a7', 'png', 'image/png', 'image', 3021092, '2019-08-22 09:51:46', '2019-08-22 09:51:46'),
(35, 'public', 'media/product/2019_8', '5d5e65d3e6636', 'png', 'image/png', 'image', 3327975, '2019-08-22 09:52:22', '2019-08-22 09:52:22'),
(36, 'public', 'media/product/2019_8', '5d5e65f5ac41b', 'png', 'image/png', 'image', 3354918, '2019-08-22 09:52:55', '2019-08-22 09:52:55'),
(37, 'public', 'media/product/2019_8', '5d5e6614c6363', 'png', 'image/png', 'image', 3368852, '2019-08-22 09:53:26', '2019-08-22 09:53:26'),
(38, 'public', 'media/product/2019_8', '5d5e6634d596b', 'png', 'image/png', 'image', 3372020, '2019-08-22 09:53:58', '2019-08-22 09:53:58'),
(39, 'public', 'media/product/2019_8', '5d5e665755c8b', 'png', 'image/png', 'image', 3386473, '2019-08-22 09:54:33', '2019-08-22 09:54:33'),
(40, 'public', 'media/product/2019_8', '5d5e6671798a6', 'png', 'image/png', 'image', 3306772, '2019-08-22 09:54:59', '2019-08-22 09:54:59'),
(41, 'public', 'media/product/2019_8', '5d5f3887b2597', 'png', 'image/png', 'image', 2688105, '2019-08-23 00:51:21', '2019-08-23 00:51:21'),
(42, 'public', 'media/product/2019_8', '5d5f38a3c242f', 'png', 'image/png', 'image', 3398842, '2019-08-23 00:51:49', '2019-08-23 00:51:49'),
(43, 'public', 'media/product/2019_8', '5d5f3b8dd1407', 'png', 'image/png', 'image', 2359107, '2019-08-23 01:04:15', '2019-08-23 01:04:15'),
(44, 'public', 'media/product/2019_8', '5d5f3baa9892b', 'png', 'image/png', 'image', 3062622, '2019-08-23 01:04:44', '2019-08-23 01:04:44'),
(45, 'public', 'media/product/2019_8', '5d638daddbebc', 'png', 'image/png', 'image', 2442023, '2019-08-26 07:43:43', '2019-08-26 07:43:43'),
(46, 'public', 'media/product/2019_8', '5d638eb4c87fa', 'png', 'image/png', 'image', 1223923, '2019-08-26 07:48:05', '2019-08-26 07:48:05'),
(47, 'public', 'media/product/2019_8', '5d638ed71f605', 'png', 'image/png', 'image', 1112302, '2019-08-26 07:48:39', '2019-08-26 07:48:39'),
(48, 'public', 'media/product/2019_8', '5d638f7eb0894', 'png', 'image/png', 'image', 1881798, '2019-08-26 07:51:27', '2019-08-26 07:51:27'),
(49, 'public', 'media/product/2019_8', '5d638fa6bd11d', 'png', 'image/png', 'image', 2054232, '2019-08-26 07:52:07', '2019-08-26 07:52:07'),
(50, 'public', 'media/product/2019_8', '5d638fc464733', 'png', 'image/png', 'image', 2236685, '2019-08-26 07:52:37', '2019-08-26 07:52:37'),
(51, 'public', 'media/product/2019_8', '5d638fe4f3eab', 'png', 'image/png', 'image', 2886498, '2019-08-26 07:53:10', '2019-08-26 07:53:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mediables`
--

CREATE TABLE `mediables` (
  `media_id` int(10) UNSIGNED NOT NULL,
  `mediable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mediable_id` int(10) UNSIGNED NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'main-menu', '2019-08-05 08:22:33', '2019-08-05 08:22:33'),
(2, 'footer-menu-1', '2019-08-05 08:22:33', '2019-08-09 07:38:56'),
(3, 'footer-menu-2', '2019-08-09 07:40:33', '2019-08-09 07:40:33'),
(4, 'sidebar-menu', '2019-08-09 07:44:52', '2019-08-09 07:44:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'url',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `type`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `route`, `parameters`, `created_at`, `updated_at`) VALUES
(1, 1, 'Trang chủ', 'route', '', '_self', NULL, '#333333', NULL, 1, 'katitheme.homepage', NULL, '2019-08-05 08:22:33', '2019-08-09 09:29:20'),
(2, 1, 'Giới thiệu', 'url', 'http://vaiaodaithanhthuy.com/gioi-thieu.html', '_self', NULL, '#333333', NULL, 2, NULL, NULL, '2019-08-05 08:22:33', '2019-08-13 03:43:11'),
(3, 1, 'Blog chia sẻ', 'url', 'http://vaiaodaithanhthuy.com/blog-chia-se.html', '_self', NULL, '#333333', NULL, 7, NULL, NULL, '2019-08-05 08:22:33', '2019-08-11 11:06:58'),
(6, 1, 'Liên hệ', 'url', 'http://vaiaodaithanhthuy.com/lien-he.html', '_self', NULL, '#333333', NULL, 8, NULL, NULL, '2019-08-05 08:22:33', '2019-08-11 11:06:58'),
(7, 2, 'Vải áo dài', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai.html', '_self', NULL, '#333333', NULL, 1, NULL, NULL, '2019-08-05 08:22:33', '2019-08-11 11:10:29'),
(8, 2, 'Vải áo dài cách tân nam', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cach-tan-nam.html', '_self', NULL, '#333333', NULL, 1, NULL, NULL, '2019-08-05 08:22:33', '2019-08-11 11:10:53'),
(9, 2, 'Vải áo dài cách tân nữ', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cach-tan-nu.html', '_self', NULL, '#333333', NULL, 1, NULL, NULL, '2019-08-05 08:22:33', '2019-08-11 11:11:10'),
(10, 2, 'Vải váy, áo, đầm thời trang', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-vay-ao-dam-thoi-trang.html', '_self', NULL, '#333333', NULL, 4, NULL, NULL, '2019-08-09 07:40:21', '2019-08-11 11:11:31'),
(11, 3, 'Giới thiệu', 'url', 'http://vaiaodaithanhthuy.com/gioi-thieu.html', '_self', NULL, '#333333', NULL, 1, NULL, NULL, '2019-08-09 07:40:46', '2019-08-11 11:12:30'),
(12, 3, 'Vải áo dài thanh thủy', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai.html', '_self', NULL, '#333333', NULL, 2, NULL, NULL, '2019-08-09 07:40:55', '2019-08-11 11:12:50'),
(13, 3, 'Blog chia sẻ', 'url', 'http://vaiaodaithanhthuy.com/blog-chia-se.html', '_self', NULL, '#333333', NULL, 3, NULL, NULL, '2019-08-09 07:41:04', '2019-08-11 11:13:09'),
(14, 3, 'Liên hệ', 'url', 'http://vaiaodaithanhthuy.com/lien-he.html', '_self', NULL, '#333333', NULL, 4, NULL, NULL, '2019-08-09 07:41:12', '2019-08-11 11:13:18'),
(15, 4, 'Vải áo dài', 'url', 'https://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai.html', '_self', NULL, '#333333', NULL, 1, NULL, NULL, '2019-08-09 07:45:12', '2019-08-23 06:27:30'),
(16, 4, 'Vải áo dài cặp đôi', 'url', 'https://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cap-doi.html', '_self', NULL, '#333333', 15, 1, NULL, NULL, '2019-08-09 07:45:17', '2019-08-23 06:27:34'),
(17, 4, 'Vải áo dài đắp nhung', 'url', 'https://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-dap-nhung.html', '_self', NULL, '#333333', 15, 2, NULL, NULL, '2019-08-09 07:45:25', '2019-08-23 06:27:38'),
(18, 4, 'Vải áo dài gấm', 'url', 'https://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-gam.html', '_self', NULL, '#333333', 15, 3, NULL, NULL, '2019-08-09 07:45:35', '2019-08-23 06:27:43'),
(19, 1, 'Vải áo dài', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai.html', '_self', NULL, '#333333', NULL, 3, NULL, NULL, '2019-08-11 10:59:01', '2019-08-11 10:59:05'),
(20, 1, 'Vải áo dài cặp đôi', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cap-doi.html', '_self', NULL, '#333333', 19, 1, NULL, NULL, '2019-08-11 10:59:41', '2019-08-11 10:59:44'),
(21, 1, 'Vải áo dài đắp nhung', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-dap-nhung.html', '_self', NULL, '#333333', 19, 2, NULL, NULL, '2019-08-11 11:00:22', '2019-08-11 11:00:26'),
(22, 1, 'Vải áo dài gấm', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-gam.html', '_self', NULL, '#333333', 19, 3, NULL, NULL, '2019-08-11 11:00:54', '2019-08-11 11:00:57'),
(23, 1, 'Vải áo dài mẹ và bé', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-me-va-be.html', '_self', NULL, '#333333', 19, 4, NULL, NULL, '2019-08-11 11:01:14', '2019-08-11 11:01:19'),
(24, 1, 'Vải áo dài thêu', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-theu.html', '_self', NULL, '#333333', 19, 5, NULL, NULL, '2019-08-11 11:01:36', '2019-08-11 11:01:55'),
(25, 1, 'Vải áo dài vẽ', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-ve.html', '_self', NULL, '#333333', 19, 6, NULL, NULL, '2019-08-11 11:01:52', '2019-08-11 11:01:57'),
(26, 1, 'Vải áo dài cưới hỏi, dạ hội', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cuoi-hoi-da-hoi.html', '_self', NULL, '#333333', 19, 7, NULL, NULL, '2019-08-11 11:02:20', '2019-08-11 11:02:23'),
(27, 1, 'Vải áo dài đính đá, kết cườm', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-dinh-da-ket-cuom.html', '_self', NULL, '#333333', 19, 8, NULL, NULL, '2019-08-11 11:02:50', '2019-08-11 11:03:57'),
(28, 1, 'Vải áo dài lụa', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-lua.html', '_self', NULL, '#333333', 19, 9, NULL, NULL, '2019-08-11 11:03:07', '2019-08-21 08:31:48'),
(29, 1, 'Vải áo dài Thái Tuấn', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-thai-tuan.html', '_self', NULL, '#333333', 19, 10, NULL, NULL, '2019-08-11 11:03:25', '2019-08-11 11:04:02'),
(30, 1, 'Vải áo dài trơn', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-tron.html', '_self', NULL, '#333333', 19, 11, NULL, NULL, '2019-08-11 11:03:37', '2019-08-11 11:04:04'),
(31, 1, 'Vải quần áo dài', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-quan-ao-dai.html', '_self', NULL, '#333333', 19, 12, NULL, NULL, '2019-08-11 11:03:52', '2019-08-11 11:04:05'),
(32, 1, 'Vải áo dài cách tân nam', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cach-tan-nam.html', '_self', NULL, '#333333', NULL, 4, NULL, NULL, '2019-08-11 11:04:30', '2019-08-11 11:04:56'),
(33, 1, 'Vải áo dài cách tân nữ', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cach-tan-nu.html', '_self', NULL, '#333333', NULL, 5, NULL, NULL, '2019-08-11 11:04:48', '2019-08-11 11:04:57'),
(34, 1, 'Vải áo dài cách tân hoa 3D', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cach-tan-hoa-3d.html', '_self', NULL, '#333333', 33, 1, NULL, NULL, '2019-08-11 11:05:22', '2019-08-11 11:06:44'),
(35, 1, 'Vải áo dài cách tân in', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cach-tan-in.html', '_self', NULL, '#333333', 33, 2, NULL, NULL, '2019-08-11 11:05:38', '2019-08-11 11:06:50'),
(36, 1, 'Vải áo dài cách tân họa tiết', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cach-tan-hoa-tiet.html', '_self', NULL, '#333333', 33, 3, NULL, NULL, '2019-08-11 11:05:57', '2019-08-11 11:06:53'),
(37, 1, 'Vải áo dài cách tân vẽ', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cach-tan-ve.html', '_self', NULL, '#333333', 33, 4, NULL, NULL, '2019-08-11 11:06:12', '2019-08-11 11:06:56'),
(38, 1, 'Vải váy, áo, đầm thời trang', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-vay-ao-dam-thoi-trang.html', '_self', NULL, '#333333', NULL, 6, NULL, NULL, '2019-08-11 11:06:38', '2019-08-11 11:06:58'),
(39, 4, 'Vải áo dài mẹ và bé', 'url', 'https://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-me-va-be.html', '_self', NULL, '#333333', 15, 4, NULL, NULL, '2019-08-11 11:16:54', '2019-08-23 06:27:47'),
(40, 4, 'Vải áo dài thêu', 'url', 'https://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-theu.html', '_self', NULL, '#333333', 15, 5, NULL, NULL, '2019-08-11 11:17:12', '2019-08-23 06:27:56'),
(41, 4, 'Vải áo dài vẽ', 'url', 'https://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-ve.html', '_self', NULL, '#333333', 15, 6, NULL, NULL, '2019-08-11 11:17:25', '2019-08-23 06:28:01'),
(42, 4, 'Vải áo dài cưới hỏi, dạ hội', 'url', 'https://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cuoi-hoi-da-hoi.html', '_self', NULL, '#333333', 15, 7, NULL, NULL, '2019-08-11 11:17:42', '2019-08-23 06:28:05'),
(43, 4, 'Vải áo dài đính đá, kết cườm', 'url', 'https://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-dinh-da-ket-cuom.html', '_self', NULL, '#333333', 15, 8, NULL, NULL, '2019-08-11 11:18:03', '2019-08-23 06:28:09'),
(44, 4, 'Vải áo dài lụa', 'url', 'https://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-lua.html', '_self', NULL, '#333333', 15, 9, NULL, NULL, '2019-08-11 11:18:15', '2019-08-23 06:28:15'),
(45, 4, 'Vải áo dài Thái Tuấn', 'url', 'https://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-thai-tuan.html', '_self', NULL, '#333333', 15, 10, NULL, NULL, '2019-08-11 11:18:29', '2019-08-23 06:28:19'),
(46, 4, 'Vải áo dài trơn', 'url', 'https://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-tron.html', '_self', NULL, '#333333', 15, 11, NULL, NULL, '2019-08-11 11:18:41', '2019-08-23 06:38:19'),
(47, 4, 'Vải quần áo dài', 'url', 'https://vaiaodaithanhthuy.com/sp/danh-muc/vai-quan-ao-dai.html', '_self', NULL, '#333333', 15, 12, NULL, NULL, '2019-08-11 11:18:55', '2019-08-23 06:28:23'),
(48, 4, 'Vải áo dài cách tân nam', 'url', 'https://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cach-tan-nam.html', '_self', NULL, '#333333', NULL, 2, NULL, NULL, '2019-08-11 11:19:09', '2019-08-23 06:28:27'),
(49, 4, 'Vải áo dài cách tân nữ', 'url', 'https://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cach-tan-nu.html', '_self', NULL, '#333333', NULL, 3, NULL, NULL, '2019-08-11 11:19:26', '2019-08-23 06:29:16'),
(50, 4, 'Vải áo dài cách tân hoa 3D', 'url', 'https://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cach-tan-hoa-3d.html', '_self', NULL, '#333333', 49, 1, NULL, NULL, '2019-08-11 11:19:45', '2019-08-23 06:28:32'),
(51, 4, 'Vải áo dài cách tân in', 'url', 'https://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cach-tan-in.html', '_self', NULL, '#333333', 49, 2, NULL, NULL, '2019-08-11 11:20:02', '2019-08-23 06:28:35'),
(52, 4, 'Vải áo dài cách tân họa tiết', 'url', 'https://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cach-tan-hoa-tiet.html', '_self', NULL, '#333333', 49, 3, NULL, NULL, '2019-08-11 11:20:18', '2019-08-23 06:28:39'),
(53, 4, 'Vải áo dài cách tân vẽ', 'url', 'https://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cach-tan-ve.html', '_self', NULL, '#333333', 49, 4, NULL, NULL, '2019-08-11 11:20:36', '2019-08-23 06:28:42'),
(54, 4, 'Vải váy, áo, đầm thời trang', 'url', 'https://vaiaodaithanhthuy.com/sp/danh-muc/vai-vay-ao-dam-thoi-trang.html', '_self', NULL, '#333333', NULL, 4, NULL, NULL, '2019-08-11 11:21:29', '2019-08-23 06:28:46'),
(55, 4, 'Áo dài cách tân in', 'url', 'https://vaiaodaithanhthuy.com/sp/danh-muc/ao-dai-cach-tan-in.html', '_self', NULL, '#333333', 48, 1, NULL, NULL, '2019-08-26 07:46:53', '2019-08-26 07:46:57'),
(56, 4, 'Áo dài cách tân vẽ', 'url', 'https://vaiaodaithanhthuy.com/sp/danh-muc/ao-dai-cach-tan-ve.html', '_self', NULL, '#333333', 48, 2, NULL, NULL, '2019-08-26 07:47:09', '2019-08-26 07:47:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_06_28_085524_laratrust_setup_tables', 1),
(9, '2019_07_11_083042_blog_setup_tables', 1),
(10, '2019_07_16_165144_menu_setup_tables', 1),
(11, '2019_07_22_134841_page_setup_tables', 1),
(12, '2019_07_24_154316_create_mediable_tables', 1),
(13, '2019_08_02_085214_ecommerce_setup_tables', 1),
(14, '2019_08_05_132937_gallery_setup_tables', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'page-image-default.jpg',
  `body` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `counter` int(11) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_homepage` tinyint(1) NOT NULL DEFAULT 0,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `photo`, `body`, `publish`, `counter`, `user_id`, `is_homepage`, `seo_title`, `seo_description`, `seo_keyword`, `created_at`, `updated_at`) VALUES
(1, 'Trang chủ', 'trang-chu', 'page-image-default.jpg', NULL, 'publish', 0, 1, 1, 'Trang chủ', 'Trang chủ', 'Trang chủ', '2019-08-05 08:22:30', '2019-08-07 03:49:40'),
(2, 'Giới thiệu', 'gioi-thieu', 'page-image-default.jpg', NULL, 'publish', 0, 1, 0, 'Giới thiệu', 'Giới thiệu', 'Giới thiệu', '2019-08-05 08:22:30', '2019-08-09 06:36:59'),
(3, 'Blog Chia Sẻ', 'blog-chia-se', 'page-image-default.jpg', NULL, 'publish', 0, 1, 0, 'Blog chia sẻ', 'Blog chia sẻ', 'Blog chia sẻ', '2019-08-05 08:22:30', '2019-08-09 07:13:00'),
(4, 'Liên hệ', 'lien-he', 'page-image-default.jpg', NULL, 'publish', 0, 1, 0, 'Liên hệ', 'Liên hệ', 'Liên hệ', '2019-08-05 08:22:30', '2019-08-09 04:19:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `page_custom_fields`
--

CREATE TABLE `page_custom_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `page_custom_fields`
--

INSERT INTO `page_custom_fields` (`id`, `key`, `display_name`, `value`, `type`, `order`, `page_id`, `created_at`, `updated_at`) VALUES
(1, 'about.title_banner', 'Tiêu đề biểu ngữ', 'Về chúng tôi', 'text', 1, 2, '2019-08-05 08:22:30', '2019-08-09 08:29:56'),
(2, 'about.image_banner', 'Hình ảnh biểu ngữ', 'field2_1565667863.jpeg', 'image', 2, 2, '2019-08-05 08:22:30', '2019-08-13 03:44:23'),
(3, 'about.image_block1', 'Hình ảnh - Block 1', 'field3_1565332620.jpeg', 'image', 3, 2, '2019-08-05 08:22:30', '2019-08-09 06:37:00'),
(4, 'about.content_block1', 'Nội dung - Block 1', '<h3>Variations Of Passages Of Lorem Ipsum Available</h3><p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.randomised words which don\'t look even slightly believable.</p><p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised. by injected humour, or randomised.</p><ul><li>There Are Many Variations Of Passages</li><li>By Injected Humour Or Randomised.</li><li>The Majority Have Suffered Alteration</li><li>Majority Have Suffered Alteration</li><li>Variations Of Passages Of Lorem Ipsum</li><li>Of Passages Of Lorem Ipsum</li><li>Many Variations Of Passages.</li></ul>', 'text_editor', 4, 2, '2019-08-05 08:22:30', NULL),
(5, 'news.title_banner', 'Tiêu đề biểu ngữ', 'Blog - Chia sẻ kinh nghiệm hay', 'text', 1, 3, '2019-08-05 08:22:30', '2019-08-09 07:12:04'),
(6, 'news.image_banner', 'Hình ảnh biểu ngữ', 'field6_1566266206.jpeg', 'image', 2, 3, '2019-08-05 08:22:30', '2019-08-20 01:56:47'),
(7, 'contact.title_banner', 'Tiêu đề biểu ngữ', 'Liên hệ chúng tôi', 'text', 1, 4, '2019-08-05 08:22:30', NULL),
(8, 'contact.image_banner', 'Hình ảnh biểu ngữ', 'field8_1566266260.jpeg', 'image', 2, 4, '2019-08-05 08:22:30', '2019-08-20 01:57:40'),
(9, 'contact.google_map', 'Bản đồ google map', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3899.131804017386!2d109.19487436434765!3d12.239353733834268!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3170677a356fd213%3A0x5b43e96d048d068c!2sL%E1%BB%99c+Th%E1%BB%8D%2C+Nha+Trang%2C+Khanh+Hoa+Province+650000%2C+Vietnam!5e0!3m2!1sen!2s!4v1564564296514!5m2!1sen!2s\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'text_area', 5, 4, '2019-08-05 08:22:30', '2019-08-09 07:00:14'),
(10, 'home.title_session1', 'Tiêu đề - Phần 1', 'VẢI ÁO DÀI MỚI NHẤT 2019', 'text', 1, 1, '2019-08-07 03:49:17', '2019-08-09 09:16:56'),
(11, 'home.title_session2', 'Tiêu đề - Phần 2', 'VẢI ÁO DÀI CAO CẤP 2019', 'text', 7, 1, '2019-08-09 02:03:46', '2019-08-21 07:45:47'),
(12, 'home.cate_slug_session1', 'Slug danh mục sản phẩm - Phần 1', 'vai-ao-dai', 'text', 2, 1, '2019-08-09 02:05:49', '2019-08-11 11:08:46'),
(13, 'home.cate_slug_session2', 'Slug danh mục sản phẩm - Phần 2 (Ngăn cách nhau bằng dấu phẩy \",\")', 'vai-ao-dai,vai-ao-dai-cach-tan-nam,vai-ao-dai-cach-tan-nu,vai-vay-ao-dam-thoi-trang', 'text', 8, 1, '2019-08-09 02:31:37', '2019-08-21 07:45:43'),
(15, 'home.link_banner1', 'Liên kết - Banner 1', 'https://google.com.vn', 'text', 6, 1, '2019-08-09 03:08:45', '2019-08-21 07:45:47'),
(16, 'home.image_banner1', 'Hình ảnh - Banner 1', 'field16_1565667950.png', 'image', 5, 1, '2019-08-09 03:09:49', '2019-08-21 07:45:47'),
(17, 'home.title1_banner2', 'Tiêu đề 1 - Banner 2', 'CHÍNH SÁCH VẬN CHUYỂN', 'text', 9, 1, '2019-08-09 03:18:05', '2019-08-22 07:56:23'),
(18, 'home.title2_banner2', 'Tiêu đề 2 - Banner 2', 'TRẢ HÀNG TRONG 30 NGÀY ĐẦU', 'text', 11, 1, '2019-08-09 03:18:24', '2019-08-21 07:45:43'),
(19, 'home.title3_banner2', 'Tiêu đề 3 - Banner 2', 'HỖ TRỢ 24/7', 'text', 13, 1, '2019-08-09 03:18:34', '2019-08-21 07:45:43'),
(20, 'home.des1_banner2', 'Mô tả 1 - Banner 2', 'Miễn phí vận chuyển nội thành Nha Trang. Ngoài tỉnh liên hệ.', 'text_area', 10, 1, '2019-08-09 03:19:01', '2019-08-22 07:57:43'),
(21, 'home.des2_banner2', 'Mô tả 2 - Banner 2', 'Trả đổi sản phẩm nếu bạn không hài lòng với sản phẩm của Shop.', 'text_area', 12, 1, '2019-08-09 03:19:13', '2019-08-22 07:58:08'),
(22, 'home.des3_banner2', 'Mô tả 3 - Banner 2', 'Luôn luôn sẵn sàng hỗ trợ khách hàng mọi lúc mọi nơi.', 'text_area', 14, 1, '2019-08-09 03:19:23', '2019-08-22 07:58:08'),
(23, 'home.title_session3', 'Tiêu đề - Phần 3', 'NHỮNG BÀI KINH NGHIỆM HAY', 'text', 15, 1, '2019-08-09 03:30:54', '2019-08-21 07:45:43'),
(24, 'home.cate_slug_session3', 'Slug chuyên mục bài viết - Phần 3', 'goc-chia-se', 'text', 16, 1, '2019-08-09 03:41:58', '2019-08-21 07:45:43'),
(27, 'home.title_session1a', 'Tiêu đề - Phần 1A (Ngăn cách nhau bằng dấu phẩy \",\")', 'Vải áo dài lụa,Áo dài cách tân in,Áo dài đính đá kết cườm,Áo dài cưới hỏi dạ hội', 'text', 3, 1, '2019-08-21 07:44:04', '2019-08-23 01:06:17'),
(28, 'home.cate_slug_session1a', 'Slug danh mục sản phẩm - Phần 1A (Ngăn cách nhau bằng dấu phẩy \",\")', 'vai-ao-dai-lua,vai-ao-dai-cach-tan-in,vai-ao-dai-dinh-da-ket-cuom,vai-ao-dai-cuoi-hoi-da-hoi', 'text', 4, 1, '2019-08-21 07:45:39', '2019-08-23 01:06:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'manage-dashboard', 'Manage Dashboard', 'Manage Dashboard', '2019-08-05 08:22:29', '2019-08-05 08:22:29'),
(2, 'manage-blog', 'Manage Blog', 'Manage Blog', '2019-08-05 08:22:29', '2019-08-05 08:22:29'),
(3, 'manage-page', 'Manage Page', 'Manage Page', '2019-08-05 08:22:29', '2019-08-05 08:22:29'),
(4, 'manage-menu', 'Manage Menu', 'Manage Menu', '2019-08-05 08:22:29', '2019-08-05 08:22:29'),
(5, 'manage-company', 'Manage Company', 'Manage Company', '2019-08-05 08:22:29', '2019-08-05 08:22:29'),
(6, 'manage-logs', 'Manage Logs', 'Manage Logs', '2019-08-05 08:22:29', '2019-08-05 08:22:29'),
(7, 'manage-media', 'Manage Media', 'Manage Media', '2019-08-05 08:22:29', '2019-08-05 08:22:29'),
(8, 'manage-gallery', 'Manage Gallery', 'Manage Gallery', '2019-08-05 08:22:29', '2019-08-05 08:22:29'),
(9, 'manage-ecommerce', 'Manage Ecommerce', 'Manage Ecommerce', '2019-08-05 08:22:29', '2019-08-05 08:22:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post-image-default.png',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `counter` int(11) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `photo`, `description`, `body`, `publish`, `counter`, `user_id`, `seo_title`, `seo_description`, `seo_keyword`, `created_at`, `updated_at`) VALUES
(13, 'Vải áo dài cho người mập chọn thế nào?', 'vai-ao-dai-cho-nguoi-map-chon-the-nao', '1566461113.jpeg', 'Do đặc trưng của áo dài là ôm sát người nên những người mập thường rất khó khăn trong việc chọn lựa vải áo dài cho mình. Nếu chọn vải không khéo sẽ làm lộ các khuyết điểm lớn như: ngấn mỡ bụng, bắp tay to, cổ ngắn...', '<p>Do đặc trưng của áo dài là ôm sát người nên những người mập thường rất khó khăn trong việc chọn lựa vải áo dài cho mình. Nếu chọn vải không khéo sẽ làm lộ các khuyết điểm lớn như: ngấn mỡ bụng, bắp tay to, cổ ngắn...Vậy&nbsp;vải áo dài cho người mập&nbsp;nên chọn thế nào? Làm sao để che lấp đi được những khuyết điểm khi&nbsp;người mập mặc áo dài? Các chị em nên chú ý những điểm sau đây:</p><p>1. Chất liệu vải áo dài:&nbsp;</p><p>- Tuyệt đối không chọn vải có độ bóng, độ bóng chỉ làm những khuyết điểm trên cơ thể càng nổi bật thêm.</p><p class=\"ql-align-center\"><img src=\"http://www.vaiaodaire.com/images/article/ao-dai-cho-nguoi-map/vai-co-do-bong.jpg\" height=\"498\" width=\"455\"></p><p class=\"ql-align-center\">Vải áo dài cho người mập&nbsp;không nên có độ bóng</p><p>- Không chọn vải có độ thun quá ôm sát người, sẽ làm lộ những chỗ có ngấn trên cơ thể đặc biệt là bụng và eo.</p><p>- Nên chọn vải áo dài có độ co dãn vừa phải, độ rủ cao (<a href=\"http://www.vaiaodaire.com/vai-ao-dai/lua-tam-thai-4\" target=\"_blank\" style=\"color: rgb(45, 127, 238);\">Lụa Tằm Thái</a>&nbsp;hoặc&nbsp;<a href=\"http://www.vaiaodaire.com/vai-ao-dai/lua-thai-tuan-7\" target=\"_blank\" style=\"color: rgb(45, 127, 238);\">Thái Tuấn</a>).</p><p>- Đặc biệt nên chọn loại vải áo dài thấm hút mồ hôi tốt (<a href=\"http://www.vaiaodaire.com/vai-ao-dai/lua-thai-tuan-7\" target=\"_blank\" style=\"color: rgb(45, 127, 238);\">Lụa Thái Tuấn</a>) vì người tròn thường dễ bị ra mồ hôi.</p><p>2. Màu vải áo dài:</p><p>- Không nên chọn vải có tông màu sáng vì khi ánh sáng chiếu vào thì những chỗ thừa ra trên cơ thể sẽ bị đổ bóng râm lên chỗ khác, khuyết điểm càng lộ rõ hơn.</p><p>- Nên chọn vải áo dài có màu đậm như: Đỏ đậm, Tím than, xanh dương đậm...</p><p class=\"ql-align-center\"><img src=\"http://www.vaiaodaire.com/images/article/ao-dai-cho-nguoi-map/mau-vai-phu-hop.jpg\" height=\"750\" width=\"500\"></p><p class=\"ql-align-center\">Người mập nên chọn vải áo dài có màu đậm.</p><p>&nbsp;</p><p>3. Họa tiết trên vải áo dài:</p><p>- Tuyệt đổi không chọn vải có họa tiết sọc ngang, sẽ trông người thêm mập và lùn.</p><p class=\"ql-align-center\"><img src=\"http://www.vaiaodaire.com/images/article/ao-dai-cho-nguoi-map/hoa-tiet-soc.jpg\" height=\"537\" width=\"349\"></p><p class=\"ql-align-center\">Họa tiết sọc ngang làm người mập thêm</p><p><br></p><p>- Không nên chọn họa tiết lớn như: Bông hoa lớn trước ngực, họa tiết tròn lớn, hiệu ứng ánh sáng chói ngay phần ngực.</p><p>- Nên chọn vải áo dài có họa tiết hoa dây trên dưới hoặc hoa dây từ trên thẳng xuống dưới, dây kèm theo những bông hoa nhỏ trông mềm mại và uyển chuyển hơn.</p><p>4. Cách may áo dài:</p><p>- Không nên may áo cổ thuyền nếu cổ ngắn và hơi đầy đặn. Chọn may cổ cao sẽ che bớt đi được khuyết điểm này.</p><p>- Không nên may áo tay lỡ hoặc tay ngắn nếu bắp tay to. Chọn may áo tay dài cũng che bớt được khuyết điểm này.</p><p class=\"ql-align-center\"><img src=\"http://www.vaiaodaire.com/images/article/ao-dai-cho-nguoi-map/co-thuyen-vs-co-tron.jpg\" height=\"187\" width=\"480\"></p><p class=\"ql-align-center\">Áo dài cổ thuyền và cổ tròn truyền thống</p><p class=\"ql-align-center\"><br></p><p>Trên đây là một chút kinh nghiệm Loan rút ra được từ bản thân và các bạn đồng nghiệp khác. Loan là giáo viên nên chiếc áo dài thường gắn bó với Loan gần như hằng ngày. Chúc các chị em có thân hình không được thon thả lắm nhưng vẫn tự tin trong tà áo dài thướt tha của mình.</p><p>Nguồn: <a href=\"http://www.vaiaodaire.com/ao-dai-dep/vai-ao-dai-cho-nguoi-map-chon-the-nao-19\" target=\"_blank\">http://www.vaiaodaire.com/ao-dai-dep/vai-ao-dai-cho-nguoi-map-chon-the-nao-19</a></p>', 'publish', 0, 1, NULL, NULL, NULL, '2019-08-05 08:22:32', '2019-08-23 08:47:23'),
(14, 'Vải may áo dài đẹp được chọn lựa như thế nào', 'vai-may-ao-dai-dep-duoc-chon-lua-nhu-the-nao', '1566460870.jpeg', 'Vải may áo dài đẹp được chọn lựa như thế nào? Cách chọn chất liệu vải ra sao? Màu sắc vải như thế nào gọi là phù hợp với làn da của mình? Dáng người ảnh hưởng thế nào để việc mặc áo dài đẹp hay xấu...Đây là các câu hỏi phổ biến của các chị em phụ nữ khi đi chọn vải may áo dài cho mình.', '<p><a href=\"http://www.vaiaodaire.com/\" target=\"_blank\" style=\"color: rgb(45, 127, 238);\">Vải may áo dài đẹp</a>&nbsp;được chọn lựa như thế nào? Cách chọn chất liệu vải ra sao? Màu sắc vải như thế nào gọi là phù hợp với làn da của mình? Dáng người ảnh hưởng thế nào để việc mặc&nbsp;<a href=\"http://www.vaiaodaire.com/\" target=\"_blank\" style=\"color: rgb(45, 127, 238);\">áo dài đẹp</a>&nbsp;hay xấu...Đây là các câu hỏi phổ biến của các chị em phụ nữ khi đi chọn vải may áo dài cho mình. Sau đây Loan xin được phân tính từng yếu tố để các chị em có thêm chút kinh nghiệm chọn lựa&nbsp;<a href=\"http://www.vaiaodaire.com/\" target=\"_blank\" style=\"color: rgb(45, 127, 238);\">vải áo dài đẹp</a>&nbsp;và phù hợp cho mình.</p><p><img src=\"http://www.vaiaodaire.com/images/article/cach-chon-vai-ao-dai-dep.jpg\" height=\"412\" width=\"600\"></p><p>1. Chọn chất liệu vải</p><p>Có nhiều chất liệu&nbsp;vải&nbsp;may áo dài, tuy nhiên để tạo độ bay, thông thường người ta thường chọn các chất liệu nhẹ và có độ co giãn thích hợp như Lụa và mốt nhất trong những năm gần đây là&nbsp;<a href=\"http://www.vaiaodaire.com/vai-ao-dai/lua-han-quoc-1\" target=\"_blank\" style=\"color: rgb(45, 127, 238);\">Lụa Hàn Quốc</a>&nbsp;và&nbsp;<a href=\"http://www.vaiaodaire.com/vai-ao-dai/lua-tam-thai-4\" target=\"_blank\" style=\"color: rgb(45, 127, 238);\">Lụa Tằm Thái</a>.</p><p>Chú ý:&nbsp;Để chọn được&nbsp;vải may áo dài đẹp, không nên chọn những chất liệu quá mỏng khiến đồ lót của bạn bị hằn lên hay nổi rõ hoa văn của đồ lót, tạo sự phản cảm. Nên chọn nội y mềm, ôm sát bầu ngực và màu sắc đơn giản, tốt nhất là màu sáng, trơn để tránh nổi rõ trên áo dài.</p><p>2. Chọn màu sắc vải</p><p>Tùy theo mục đích của người mặc mà chọn lựa màu sắc của&nbsp;vải may áo dài&nbsp;cho thích hợp. Nếu áo dài được mặc vào những sự kiện lớn, có thể diện các màu sắc nổi bật như Cam, Hồng, Đỏ...Bên cạnh đó có thể đính đá, kết cườm, thêu, vẽ trang trí cho thêm phần rực rỡ, nổi bật.</p><p>Đặc biệt lưu ý là màu vải áo dài phải phù hợp với màu da của bạn, nếu bạn có làn da sáng thì bạn mặc sao cũng được, nhưng ngược lại, nếu bạn có làn da hơi sẫm màu thì nên chọn vải có màu không quá sáng cũng không quá tối.</p><p>3. Dáng người</p><p>Bạn có dáng người&nbsp;cao gầy&nbsp;dễ chọn vải áo dài và dễ mặc&nbsp;áo dài đẹp&nbsp;vì tạo được độ thanh nhã, dịu dàng. Tuy nhiên nên tránh màu tối và đừng quên chọn nội y giúp khuôn ngực đầy đặn hơn, tăng đường cong cho cơ thể.</p><p>Bạn có dáng người&nbsp;tròn trịa&nbsp;không nên chọn các chất liệu bóng mà nên chọn vải áo dài với màu sắc tối như Tím, Đỏ đậm...và nhiều họa tiết nhỏ. Họa tiết nên là dạng kéo dài theo chiều dọc để tạo cảm giác dáng người cao hơn. Bạn gái có dáng người tròn cũng nên lựa chọn áo dài cổ thuyền để che bớt khuyết điểm cổ thấp và áo tay dài che bắp tay.</p><p>Bạn có dáng người&nbsp;cơ bản, trung bình rất dễ chọn áo dài, vì vậy có thể lựa chọn hầu hết các kiểu vải, tuy nhiên vẫn luôn phải chú ý đến độ phù hợp với lứa tuổi cũng như áo dài mặc trong dịp gì (dự đám cưới, tham gia hội nghị, ban ngày hay buổi tối...).</p><p>Nếu&nbsp;thỏa mãn được 3 điều trên, thì chắc chắn là bạn đã sở hữu được một chiếc&nbsp;vải áo dài tuyệt đẹp&nbsp;và phù hợp với cơ thể của mình. Chúc các bạn luôn luôn trẻ đẹp và xinh xắn cùng những chiếc&nbsp;áo dài duyên dáng.</p>', 'publish', 0, 1, 'Vải may áo dài đẹp được chọn lựa như thế nào', 'Vải may áo dài đẹp được chọn lựa như thế nào', NULL, '2019-08-05 08:22:32', '2019-08-22 08:01:10'),
(15, 'Chọn áo dài đi chùa đẹp và phù hợp', 'chon-ao-dai-di-chua-dep-va-phu-hop', '1566459826.jpeg', 'Ngày nay, việc chọn áo dài đi tới các dịp lễ hội luôn là ưu tiên hàng đầu của phái nữ, không chỉ bởi nét cuốn hút mê hồn của tà áo dài Việt, mà khi khoác lên mình chiếc áo dài yêu thương bạn gái còn khoác lên mình nét thanh lịch, duyên dáng và trang nhã, góp phần làm cho nơi có sự hiện diện của bạn trở nên trang trọng hơn.', '<p class=\"ql-align-justify\">Ngày nay, việc chọn áo dài đi tới các dịp lễ hội luôn là ưu tiên hàng đầu của phái nữ, không chỉ bởi nét cuốn hút mê hồn của tà áo dài Việt, mà khi khoác lên mình chiếc áo dài yêu thương bạn gái còn khoác lên mình nét thanh lịch, duyên dáng và trang nhã, góp phần làm cho nơi có sự hiện diện của bạn trở nên trang trọng hơn.</p><p class=\"ql-align-justify\">Khi tới chùa thăm viếng, cầu bình an các chị em ngày nay ai cũng muốn chọn cho mình những tà áo dài xinh xắn nhưng nhã nhặn để phù hợp hơn với nơi trang nghiêm.</p><p class=\"ql-align-center\"><img src=\"http://vaiaodaimymy.com/wp-content/uploads/2019/02/chon-vai-ao-dai-di-chua.jpg\" alt=\"Cách chọn vải áo dài đi chùa\" height=\"466\" width=\"700\"></p><p class=\"ql-align-justify\"><em>Cách chọn vải áo dài đi Chùa</em></p><p class=\"ql-align-justify\">Vậy phải chọn áo dài đi chùa sao cho đẹp và phù hợp.&nbsp;<strong>Áo Dài My My</strong>&nbsp;xin gửi tới các ban một vài gợi ý nhỏ, giúp cho sự lựa chọn của các bạn dễ dàng hơn nhé.</p><p class=\"ql-align-justify\"><strong>Vải áo dài đi chùa</strong>&nbsp;trước hết cần kín đáo và trang nhã, cần chọn loại vải đủ dày và màu sác không quá sặc sỡ, thiết kế áo dài cần kín đáo tránh may cổ áo quá rộng, xẻ tà quá cao, cũng không nên chọn may quân áo dài cạp quá trễ. về phần hoa văn,&nbsp;<strong>áo dài đi chùa</strong>&nbsp;thường chọn áo dài trơn,&nbsp;<a href=\"http://vaiaodaimymy.com/vai-ao-dai/hoa-sen/\" target=\"_blank\" style=\"color: rgb(51, 72, 98);\"><strong>áo dài hoa sen</strong></a>, hoặc những loài hoa đơn sơ mộc mạc.&nbsp;<strong>Áo dài màu lam</strong>&nbsp;cũng là một trong những màu được phái nữ chọn lựa nhiều nhất khi may trang phục áo dài đi chùa.</p><p class=\"ql-align-right\">Nguồn: vaiaodaimymy.com</p>', 'publish', 0, 1, 'chon-ao-dai-di-chua-dep-va-phu-hop', 'chọn áo dài', 'áo dài, đi chùa', '2019-08-05 08:22:32', '2019-08-22 07:59:08'),
(21, 'Kinh nghiệm chọn áo dài đồng phục', 'kinh-nghiem-chon-ao-dai-dong-phuc', '1566461228.jpeg', 'Chào các anh chị, sau nhiều lần tư vấn và thiết kế áo dài đồng phục cho trường học, tổ chức, cơ quan, Loan rút ra được khá nhiều kinh nghiệm và hôm nay Loan xin được chia sẻ các kinh nghiệm khi chọn áo dài đồng phục.', '<p>Chào các anh chị, sau nhiều lần tư vấn và thiết kế áo dài đồng phục cho trường học, tổ chức, cơ quan, Loan rút ra được khá nhiều kinh nghiệm và hôm nay Loan xin được chia sẻ các kinh nghiệm khi chọn áo dài đồng phục.</p><p>Áo dài đồng phục được dùng cho tập thể vừa và lớn, do đó phải đáp ứng được tối thiểu 80% yêu cầu của tập thể như:&nbsp;Vải mặc phải thoải mái, màu phải phù hợp, họa tiết phải chọn lựa thế nào để khi mặc lên tạo nên sự đồng nhất của tập thể...Sau đây Loan sẽ phân tích từng yếu tố một để anh chị dễ dàng hơn cho việc chọn lựa đồng phục cho tập thể cơ quan của mình.</p><p><br></p><p>1. Về chất liệu vải:</p><p>Áo dài đồng phục chỉ nên chọn loại vải có độ co dãn từ trung bình trở lên, phù hợp nhất hiện nay là&nbsp;Lụa Hàn Quốc, lụa Garnet&nbsp;và&nbsp;Lụa Thái Tuấn. Ba loại vải này có ưu điểm rất là lớn đó là sự co dãn và độ mềm mịn của vải, vải Thái Tuấn có độ mềm và mịn vượt trội. Do đó nếu có kinh phí tốt, nên chọn vải Thái Tuấn làm đồng phục cho tập thể, còn không thì chọn Lụa Hàn với kinh phí mềm hơn hoặc Lụa Garnet với kinh phí vừa phải.</p><p><br></p><p>2. Về màu vải</p><p>Nếu cơ quan, tập thể của bạn đã có màu đặc trưng rồi thì Shop Loan sẽ thiết kế theo tông màu của cơ quan bạn, còn nếu cơ quan, tập thể bạn không có tông màu đặc trưng, thì nên chọn vải có tông màu hơi nhạt để tạo điểm nhấn cho họa tiết trên vải, khi mặc lên sẽ tạo sự&nbsp;đồng nhất, đều đặn, làm toát lên sự đoàn kết chặt chẽ của tập thể. Ưu điểm của tông màu nhạt là phù hợp với các chị em có tạng người từ tròn - trung bình - ốm</p><p><br></p><p>3. Về họa tiết trên vải</p><p>Đây là phần không kém quan trọng tạo nên sự đồng nhất của tập thể,&nbsp;Không nên chọn họa tiết quá cầu kỳ, phức tạp, vì khi nhiều người mặc đứng gần lại với nhau nhìn sẽ rất là rối mắt. Không chọn họa tiết hoa trên hoa dưới vì sẽ rất khó may, người thấp sẽ bị cắt mất hoa. Nên chọn Họa tiết hoa nhẹ nhấn ở trên vai, hoặc ngang hông, hoặc chỉ có hoa trên hay hoa dưới. Ưu điểm của loại hoa tiết đơn giản này là mọi người cao - thấp - mập - ốm đều may được.</p><p>Tại sao nên chọn mua áo dài đồng phục tại shop Loan:</p><p>- Có nhiều kinh nghiệm trong việc chọn lựa mẫu mã và chất vải tùy túi tiền của khách hàng</p><p>- Nhìn ra được ưu và khuyết điểm từng mẫu khi lên áo dài cho tập thể</p><p>- Thay đổi thiết kế, màu sắc phù hợp với cơ quan tổ chức</p><p>- Quan trọng nhất là uy tín hàng đầu trong lĩnh vực kinh doanh áo dài online &amp; offline.</p><p>Nguồn: <a href=\"http://www.vaiaodaire.com/chia-se-kinh-nghiem/kinh-nghiem-chon-ao-dai-dong-phuc-21\" target=\"_blank\">http://www.vaiaodaire.com/chia-se-kinh-nghiem/kinh-nghiem-chon-ao-dai-dong-phuc-21</a></p>', 'publish', 0, 1, NULL, NULL, NULL, '2019-08-22 08:07:08', '2019-08-22 08:55:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'product-image-default.png',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_sale` varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colors` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter` int(11) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `code`, `photo`, `description`, `body`, `publish`, `price`, `price_sale`, `colors`, `counter`, `user_id`, `created_at`, `updated_at`) VALUES
(23, 'MS-TT20', 'ms-tt20', 'MS-TT20', '1566044139.png', 'MS-TT20', '<p><img src=\"/media/product/2019_8/5d57efae347e0.png\"></p>', 'publish', '350k/bộ', '300k/bộ', NULL, 0, 1, '2019-08-17 12:15:39', '2019-08-17 12:15:39'),
(24, 'MS-TT21', 'ms-tt21', 'MS-TT21', '1566044212.png', 'MS-TT21', '<p><img src=\"/media/product/2019_8/5d57f02d43111.png\"></p>', 'publish', '350k/bộ', '300k/bộ', NULL, 0, 1, '2019-08-17 12:16:52', '2019-08-17 12:16:52'),
(25, 'MS-TT22', 'ms-tt22', 'MS-TT22', '1566044300.png', 'MS-TT22', '<p><img src=\"/media/product/2019_8/5d57f0647cf8a.png\"></p>', 'publish', '350k/bộ', '300k/bộ', NULL, 0, 1, '2019-08-17 12:18:20', '2019-08-17 12:18:20'),
(26, 'MS-TT23', 'ms-tt23', 'MS-TT23', '1566044344.png', 'MS-TT23', '<p><img src=\"/media/product/2019_8/5d57f0b19bce2.png\"></p>', 'publish', '350k/bộ', '300k/bộ', NULL, 0, 1, '2019-08-17 12:19:04', '2019-08-17 12:19:04'),
(27, 'MS-TT24', 'ms-tt24', 'MS-TT24', '1566044466.png', 'MS-TT24', '<p><img src=\"/media/product/2019_8/5d57f12b81133.png\"></p>', 'publish', '350k/bộ', '300k/bộ', NULL, 0, 1, '2019-08-17 12:21:06', '2019-08-17 12:21:06'),
(28, 'MS-TT25', 'ms-tt25', 'MS-TT25', '1566044503.png', 'MS-TT25', '<p><img src=\"/media/product/2019_8/5d57f1537a666.png\"></p>', 'publish', '350k/bộ', '300k/bộ', NULL, 0, 1, '2019-08-17 12:21:43', '2019-08-17 12:21:43'),
(29, 'MS-TT26', 'ms-tt26', 'MS-TT26', '1566044556.png', 'MS-TT26', '<p><img src=\"/media/product/2019_8/5d57f186ab548.png\"></p>', 'publish', '350k/bộ', '300k/bộ', NULL, 0, 1, '2019-08-17 12:22:36', '2019-08-17 12:22:36'),
(30, 'MS-TT27', 'ms-tt27', 'MS-TT27', '1566044607.png', 'MS-TT27', '<p><img src=\"/media/product/2019_8/5d57f1b84e7f1.png\"></p>', 'publish', '350k/bộ', '300k/bộ', NULL, 0, 1, '2019-08-17 12:23:27', '2019-08-17 12:23:27'),
(31, 'MS-TT28', 'ms-tt28', 'MS-TT28', '1566044697.png', 'MS-TT28', '<p><img src=\"/media/product/2019_8/5d57f213d7187.png\"></p>', 'publish', '350k/bộ', '300k/bộ', NULL, 0, 1, '2019-08-17 12:24:57', '2019-08-17 12:24:57'),
(32, 'MS-TT29', 'ms-tt29', 'MS-TT29', '1566044734.png', 'MS-TT29', '<p><img src=\"/media/product/2019_8/5d57f2398a10d.png\"></p>', 'publish', '350k/bộ', '300k/bộ', NULL, 0, 1, '2019-08-17 12:25:34', '2019-08-17 12:25:34'),
(33, 'MS-TT30', 'ms-tt30', 'MS-TT30', '1566044789.png', 'MS-TT30', '<p><img src=\"/media/product/2019_8/5d57f26f6bdbe.png\"></p>', 'publish', '350k/bộ', '300k/bộ', NULL, 0, 1, '2019-08-17 12:26:29', '2019-08-17 12:26:29'),
(34, 'MS-TT31', 'ms-tt31', 'MS-TT31', '1566044830.png', 'MS-TT31', '<p><img src=\"/media/product/2019_8/5d57f29a206b4.png\"></p>', 'publish', '350k/bộ', '300k/bộ', NULL, 0, 1, '2019-08-17 12:27:10', '2019-08-17 12:27:10'),
(35, 'MS-TT32', 'ms-tt32', 'MS-TT32', '1566044957.png', 'MS-TT32', '<p><img src=\"/media/product/2019_8/5d57f3190782e.png\"></p>', 'publish', '350k/bộ', '300k/bộ', NULL, 0, 1, '2019-08-17 12:29:17', '2019-08-17 12:29:17'),
(36, 'MS-TT33', 'ms-tt33', 'MS-TT33', '1566045003.png', 'MS-TT33', '<p><img src=\"/media/product/2019_8/5d57f340b1e1c.png\"></p>', 'publish', '350k/bộ', '300k/bộ', NULL, 0, 1, '2019-08-17 12:30:03', '2019-08-17 12:30:03'),
(37, 'MS-TT34', 'ms-tt34', 'MS-TT34', '1566045051.png', 'MS-TT34', '<p><img src=\"/media/product/2019_8/5d57f36f5b094.png\"></p>', 'publish', '350k/bộ', '300k/bộ', NULL, 0, 1, '2019-08-17 12:30:51', '2019-08-21 09:26:54'),
(38, 'MS-TT35', 'ms-tt35', 'MS-TT35', '1566045115.png', 'MS-TT35', '<p><img src=\"/media/product/2019_8/5d57f3b3b56e1.png\"></p>', 'publish', '350k/bộ', '300k/bộ', NULL, 0, 1, '2019-08-17 12:31:55', '2019-08-17 12:31:55'),
(39, 'MS-TT36', 'ms-tt36', 'MS-TT36', '1566045164.png', 'MS-TT36', '<p><img src=\"/media/product/2019_8/5d57f3e5ec497.png\"></p>', 'publish', '350k/bộ', '300k/bộ', NULL, 0, 1, '2019-08-17 12:32:44', '2019-08-17 12:32:44'),
(40, 'MS-TT37', 'ms-tt37', 'MS-TT37', '1566045217.png', 'MS-TT37', '<p><img src=\"/media/product/2019_8/5d57f41856571.png\"></p>', 'publish', '350k/bộ', '300k/bộ', NULL, 0, 1, '2019-08-17 12:33:37', '2019-08-21 09:24:11'),
(41, 'MS-TT38', 'ms-tt38', 'MS-TT38', '1566045258.png', 'MS-TT38', '<p><img src=\"/media/product/2019_8/5d57f4421a8f0.png\"></p>', 'publish', '350k/bộ', '300k/bộ', NULL, 0, 1, '2019-08-17 12:34:18', '2019-08-17 12:34:18'),
(42, 'MS-TT39', 'ms-tt39', 'MS-TT39', '1566045359.png', 'MS-TT39', '<p><img src=\"/media/product/2019_8/5d57f46fa3301.png\"></p>', 'publish', '350k/bộ', '300k/bộ', NULL, 0, 1, '2019-08-17 12:35:59', '2019-08-17 12:35:59'),
(43, 'MS-TT40', 'ms-tt40', 'MS-TT40', '1566045405.png', 'MS-TT40', '<p><img src=\"/media/product/2019_8/5d57f4d5ae23a.png\"></p>', 'publish', '350k/bộ', '300k/bộ', NULL, 0, 1, '2019-08-17 12:36:45', '2019-08-21 09:24:02'),
(44, 'MS-TT41', 'ms-tt41', 'MS-TT41', '1566045452.png', 'MS-TT41', '<p><img src=\"/media/product/2019_8/5d57f507577f8.png\"></p>', 'publish', '350k/bộ', '300k/bộ', NULL, 0, 1, '2019-08-17 12:37:32', '2019-08-21 09:23:54'),
(45, 'MS-TT42', 'ms-tt42', 'MS-TT42', '1566045491.png', 'MS-TT42', '<p><img src=\"/media/product/2019_8/5d57f52cc489a.png\"></p>', 'publish', '350k/bộ', '300k/bộ', NULL, 0, 1, '2019-08-17 12:38:11', '2019-08-21 08:57:47'),
(46, 'MS-TT43', 'ms-tt43', 'MS-TT43', '1566045535.png', 'MS-TT43', '<p><img src=\"/media/product/2019_8/5d57f55915bf5.png\"></p>', 'publish', '350k/bộ', '300k/bộ', NULL, 0, 1, '2019-08-17 12:38:55', '2019-08-22 08:37:38'),
(47, 'MS-TT44', 'ms-tt44', 'MS-TT44', '1566467286.png', 'MS-TT44', '<p><img src=\"/media/product/2019_8/5d5e64c0db637.png\"></p>', 'publish', NULL, 'Liên hệ', NULL, 0, 1, '2019-08-22 09:48:06', '2019-08-22 09:48:06'),
(48, 'MS-TT45', 'ms-tt45', 'MS-TT45', '1566467345.png', 'MS-TT45', '<p><img src=\"/media/product/2019_8/5d5e650636e88.png\"></p>', 'publish', NULL, 'Liên hệ', NULL, 0, 1, '2019-08-22 09:49:05', '2019-08-22 09:49:05'),
(49, 'MS-TT46', 'ms-tt46', 'MS-TT46', '1566467371.png', 'MS-TT46', '<p><img src=\"/media/product/2019_8/5d5e65262b245.png\"></p>', 'publish', NULL, 'Liên hệ', NULL, 0, 1, '2019-08-22 09:49:31', '2019-08-22 09:49:31'),
(50, 'MS-TT47', 'ms-tt47', 'MS-TT47', '1566467402.png', 'MS-TT47', '<p><img src=\"/media/product/2019_8/5d5e654698d7e.png\"></p>', 'publish', NULL, 'Liên hệ', NULL, 0, 1, '2019-08-22 09:50:03', '2019-08-22 09:50:03'),
(51, 'MS-TT48', 'ms-tt48', 'MS-TT48', '1566467437.png', 'MS-TT48', '<p><img src=\"/media/product/2019_8/5d5e656829d8c.png\"></p>', 'publish', NULL, 'Liên hệ', NULL, 0, 1, '2019-08-22 09:50:37', '2019-08-22 09:50:37'),
(52, 'MS-TT49', 'ms-tt49', 'MS-TT49', '1566467474.png', 'MS-TT49', '<p><img src=\"/media/product/2019_8/5d5e658b742b3.png\"></p>', 'publish', NULL, 'Liên hệ', NULL, 0, 1, '2019-08-22 09:51:14', '2019-08-22 09:51:14'),
(53, 'MS-TT50', 'ms-tt50', 'MS-TT50', '1566467509.png', 'MS-TT50', '<p><img src=\"/media/product/2019_8/5d5e65b07a9a7.png\"></p>', 'publish', NULL, 'Liên hệ', NULL, 0, 1, '2019-08-22 09:51:49', '2019-08-22 09:51:49'),
(54, 'MS-TT51', 'ms-tt51', 'MS-TT51', '1566467545.png', 'MS-TT51', '<p><img src=\"/media/product/2019_8/5d5e65d3e6636.png\"></p>', 'publish', NULL, 'Liên hệ', NULL, 0, 1, '2019-08-22 09:52:25', '2019-08-22 09:52:25'),
(55, 'MS-TT52', 'ms-tt52', 'MS-TT52', '1566467579.png', 'MS-TT52', '<p><img src=\"/media/product/2019_8/5d5e65f5ac41b.png\"></p>', 'publish', NULL, 'Liên hệ', NULL, 0, 1, '2019-08-22 09:52:59', '2019-08-22 09:52:59'),
(56, 'MS-TT53', 'ms-tt53', 'MS-TT53', '1566467610.png', 'MS-TT53', '<p><img src=\"/media/product/2019_8/5d5e6614c6363.png\"></p>', 'publish', NULL, 'Liên hệ', NULL, 0, 1, '2019-08-22 09:53:30', '2019-08-22 09:53:30'),
(57, 'MS-TT54', 'ms-tt54', 'MS-TT54', '1566467641.png', 'MS-TT54', '<p><img src=\"/media/product/2019_8/5d5e6634d596b.png\"></p>', 'publish', NULL, 'Liên hệ', NULL, 0, 1, '2019-08-22 09:54:01', '2019-08-22 09:54:01'),
(58, 'MS-TT55', 'ms-tt55', 'MS-TT55', '1566467675.png', 'MS-TT55', '<p><img src=\"/media/product/2019_8/5d5e665755c8b.png\"></p>', 'publish', NULL, 'Liên hệ', NULL, 0, 1, '2019-08-22 09:54:35', '2019-08-22 09:54:35'),
(59, 'MS-TT56', 'ms-tt56', 'MS-TT56', '1566467702.png', 'MS-TT56', '<p><img src=\"/media/product/2019_8/5d5e6671798a6.png\"></p>', 'publish', NULL, 'Liên hệ', NULL, 0, 1, '2019-08-22 09:55:02', '2019-08-22 09:55:02'),
(60, 'MS-TT64', 'ms-tt64', 'MS-TT64', '1566521483.png', 'MS-TT64', '<p><img src=\"/media/product/2019_8/5d5f3887b2597.png\"></p>', 'publish', NULL, 'Liên hệ', NULL, 0, 1, '2019-08-23 00:51:24', '2019-08-23 00:51:24'),
(61, 'MS-TT65', 'ms-tt65', 'MS-TT65', '1566521511.png', 'MS-TT65', '<p><img src=\"/media/product/2019_8/5d5f38a3c242f.png\"></p>', 'publish', NULL, 'Liên hệ', NULL, 0, 1, '2019-08-23 00:51:51', '2019-08-23 00:51:51'),
(62, 'MS-TT66', 'ms-tt66', 'MS-TT66', '1566522259.png', 'MS-TT66', '<p><img src=\"/media/product/2019_8/5d5f3b8dd1407.png\"></p>', 'publish', NULL, 'Liên hệ', NULL, 0, 1, '2019-08-23 01:04:19', '2019-08-23 01:04:19'),
(63, 'MS-TT67', 'ms-tt67', 'MS-TT67', '1566522286.png', 'MS-TT67', '<p><img src=\"/media/product/2019_8/5d5f3baa9892b.png\"></p>', 'publish', NULL, 'Liên hệ', '#000000,#3d3d3d', 0, 1, '2019-08-23 01:04:47', '2019-08-23 08:43:55'),
(64, 'MS-TT57', 'ms-tt57', 'MS-TT57', '1566805426.png', 'MS-TT57', '<p><img src=\"/media/product/2019_8/5d638daddbebc.png\"></p>', 'publish', '350k', '300k', NULL, 0, 1, '2019-08-26 07:43:46', '2019-08-26 07:47:33'),
(65, 'MS-TT58', 'ms-tt58', 'MS-TT58', '1566805691.png', 'MS-TT58', '<p><img src=\"/media/product/2019_8/5d638eb4c87fa.png\"></p>', 'publish', '350k', '300k', NULL, 0, 1, '2019-08-26 07:48:11', '2019-08-26 07:48:11'),
(66, 'MS-TT59', 'ms-tt59', 'MS-TT59', '1566805721.png', 'MS-TT59', '<p><img src=\"/media/product/2019_8/5d638ed71f605.png\"></p>', 'publish', '350k', '300k', NULL, 0, 1, '2019-08-26 07:48:41', '2019-08-26 07:48:41'),
(67, 'MS-TT60', 'ms-tt60', 'MS-TT60', '1566805893.png', 'MS-TT60', '<p><img src=\"/media/product/2019_8/5d638f7eb0894.png\"></p>', 'publish', NULL, 'Liên hệ', NULL, 0, 1, '2019-08-26 07:51:33', '2019-08-26 07:51:33'),
(68, 'MS-TT61', 'ms-tt61', 'MS-TT61', '1566805930.png', 'MS-TT61', '<p><img src=\"/media/product/2019_8/5d638fa6bd11d.png\"></p>', 'publish', NULL, 'Liên hệ', NULL, 0, 1, '2019-08-26 07:52:10', '2019-08-26 07:52:10'),
(69, 'MS-TT62', 'ms-tt62', 'MS-TT62', '1566805960.png', 'MS-TT62', '<p><img src=\"/media/product/2019_8/5d638fc464733.png\"></p>', 'publish', NULL, 'Liên hệ', NULL, 0, 1, '2019-08-26 07:52:40', '2019-08-26 07:52:40'),
(70, 'MS-TT63', 'ms-tt63', 'MS-TT63', '1566805994.png', 'MS-TT63', '<p><img src=\"/media/product/2019_8/5d638fe4f3eab.png\"></p>', 'publish', NULL, 'Liên hệ', NULL, 0, 1, '2019-08-26 07:53:14', '2019-08-26 07:53:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `p_categories`
--

CREATE TABLE `p_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `p_categories`
--

INSERT INTO `p_categories` (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Vải áo dài', 'vai-ao-dai', 0, '2019-08-05 08:22:34', '2019-08-11 10:49:50'),
(2, 'Vải áo dài cách tân nam', 'vai-ao-dai-cach-tan-nam', 0, '2019-08-05 08:22:34', '2019-08-11 10:50:12'),
(3, 'Vải áo dài cách tân nữ', 'vai-ao-dai-cach-tan-nu', 0, '2019-08-05 08:22:34', '2019-08-11 10:50:21'),
(4, 'Vải váy, áo, đầm thời trang', 'vai-vay-ao-dam-thoi-trang', 0, '2019-08-09 02:02:53', '2019-08-11 10:50:56'),
(6, 'Vải áo dài cặp đôi', 'vai-ao-dai-cap-doi', 1, '2019-08-11 10:52:00', '2019-08-11 10:52:00'),
(7, 'Vải áo dài đắp nhung', 'vai-ao-dai-dap-nhung', 1, '2019-08-11 10:52:21', '2019-08-11 10:52:59'),
(8, 'Vải áo dài gấm', 'vai-ao-dai-gam', 1, '2019-08-11 10:52:36', '2019-08-11 10:52:54'),
(9, 'Vải áo dài mẹ và bé', 'vai-ao-dai-me-va-be', 1, '2019-08-11 10:52:48', '2019-08-11 10:52:48'),
(10, 'Vải áo dài thêu', 'vai-ao-dai-theu', 1, '2019-08-11 10:53:18', '2019-08-11 10:53:18'),
(11, 'Vải áo dài vẽ', 'vai-ao-dai-ve', 1, '2019-08-11 10:53:28', '2019-08-11 10:53:28'),
(12, 'Vải áo dài cưới hỏi, dạ hội', 'vai-ao-dai-cuoi-hoi-da-hoi', 1, '2019-08-11 10:53:48', '2019-08-11 10:53:48'),
(13, 'Vải áo dài đính đá, kết cườm', 'vai-ao-dai-dính-da-ket-cuom', 1, '2019-08-11 10:54:08', '2019-08-11 10:54:08'),
(14, 'Vải áo dài lụa', 'vai-ao-dai-lua', 1, '2019-08-11 10:54:29', '2019-08-19 03:04:18'),
(15, 'Vải áo dài Thái Tuấn', 'vai-ao-dai-thai-tuan', 1, '2019-08-11 10:54:38', '2019-08-11 10:54:38'),
(16, 'Vải áo dài trơn', 'vai-ao-dai-tron', 1, '2019-08-11 10:54:51', '2019-08-11 10:54:51'),
(17, 'Vải quần áo dài', 'vai-quan-ao-dai', 1, '2019-08-11 10:55:01', '2019-08-11 10:55:01'),
(18, 'Vải áo dài cách tân hoa 3D', 'vai-ao-dai-cach-tan-hoa-3d', 3, '2019-08-11 10:55:22', '2019-08-11 10:55:22'),
(19, 'Vải áo dài cách tân in', 'vai-ao-dai-cach-tan-in', 3, '2019-08-11 10:55:36', '2019-08-11 10:55:36'),
(20, 'Vải áo dài cách tân họa tiết', 'vai-ao-dai-cach-tan-hoa-tiet', 3, '2019-08-11 10:55:50', '2019-08-11 10:55:50'),
(21, 'Vải áo dài cách tân vẽ', 'vai-ao-dai-cach-tan-ve', 3, '2019-08-11 10:56:02', '2019-08-11 10:56:02'),
(22, 'Áo dài cách tân in', 'ao-dai-cach-tan-in', 2, '2019-08-26 07:45:32', '2019-08-26 07:45:32'),
(23, 'Áo dài cách tân vẽ', 'ao-dai-cach-tan-ve', 2, '2019-08-26 07:45:43', '2019-08-26 07:45:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `p_galleries`
--

CREATE TABLE `p_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'Superadmin', 'Nhóm quyền dành cho Superadmin', '2019-08-05 08:22:29', '2019-08-05 08:22:29'),
(2, 'admin', 'Admin', 'Nhóm quyền dành cho Admin', '2019-08-05 08:22:29', '2019-08-05 08:22:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(2, 2, 'App\\User');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `bio` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profile.png',
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `bio`, `photo`, `last_login_at`, `last_login_ip`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 'superadmin@katicms.com', NULL, '$2y$10$7CO0DleEjlzbp4/6n7wzYuxeJUm.bfw9YuvgKhGDzRH38I3GHDTTq', 'active', NULL, 'profile.png', '2019-08-26 07:41:35', '14.250.255.233', 'HnxBlxCblIhihqFKZ9QyQpG1TcPiJtAYNBvEYEtA74ndH7K1QAatYuX4SWql', '2019-08-05 08:22:29', '2019-08-26 07:41:35'),
(2, 'Admin', 'admin@katicms.com', NULL, '$2y$10$gqNqzoqUXJld6fPYai7BYugcvwPo09MIj/FbF8..DGf/WyqIC3dUe', 'active', NULL, 'profile.png', NULL, NULL, NULL, '2019-08-05 08:22:30', '2019-08-05 08:22:30');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`category_id`,`post_id`),
  ADD KEY `category_post_post_id_foreign` (`post_id`);

--
-- Chỉ mục cho bảng `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`category_id`,`product_id`),
  ADD KEY `category_product_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `galleries_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `gallery_items`
--
ALTER TABLE `gallery_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_items_gallery_id_foreign` (`gallery_id`);

--
-- Chỉ mục cho bảng `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_disk_directory_filename_extension_unique` (`disk`,`directory`,`filename`,`extension`),
  ADD KEY `media_disk_directory_index` (`disk`,`directory`),
  ADD KEY `media_aggregate_type_index` (`aggregate_type`);

--
-- Chỉ mục cho bảng `mediables`
--
ALTER TABLE `mediables`
  ADD PRIMARY KEY (`media_id`,`mediable_type`,`mediable_id`,`tag`),
  ADD KEY `mediables_mediable_id_mediable_type_index` (`mediable_id`,`mediable_type`),
  ADD KEY `mediables_tag_index` (`tag`),
  ADD KEY `mediables_order_index` (`order`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Chỉ mục cho bảng `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Chỉ mục cho bảng `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Chỉ mục cho bảng `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`),
  ADD KEY `pages_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `page_custom_fields`
--
ALTER TABLE `page_custom_fields`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `page_custom_fields_key_unique` (`key`),
  ADD KEY `page_custom_fields_page_id_foreign` (`page_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD UNIQUE KEY `products_code_unique` (`code`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `p_categories`
--
ALTER TABLE `p_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `p_categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `p_galleries`
--
ALTER TABLE `p_galleries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `p_galleries_name_unique` (`name`),
  ADD KEY `p_galleries_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `gallery_items`
--
ALTER TABLE `gallery_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `page_custom_fields`
--
ALTER TABLE `page_custom_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `p_categories`
--
ALTER TABLE `p_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `p_galleries`
--
ALTER TABLE `p_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `category_post`
--
ALTER TABLE `category_post`
  ADD CONSTRAINT `category_post_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `p_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `gallery_items`
--
ALTER TABLE `gallery_items`
  ADD CONSTRAINT `gallery_items_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `mediables`
--
ALTER TABLE `mediables`
  ADD CONSTRAINT `mediables_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `page_custom_fields`
--
ALTER TABLE `page_custom_fields`
  ADD CONSTRAINT `page_custom_fields_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `p_galleries`
--
ALTER TABLE `p_galleries`
  ADD CONSTRAINT `p_galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
