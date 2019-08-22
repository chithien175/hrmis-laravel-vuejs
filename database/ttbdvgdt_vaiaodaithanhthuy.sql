-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th8 22, 2019 lúc 08:02 AM
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
(1, 11, '2019-08-09 07:20:30', '2019-08-09 07:20:30'),
(1, 12, '2019-08-09 07:20:37', '2019-08-09 07:20:37'),
(1, 13, '2019-08-09 07:20:43', '2019-08-09 07:20:43'),
(1, 14, '2019-08-09 07:20:50', '2019-08-09 07:20:50'),
(1, 15, '2019-08-09 07:20:56', '2019-08-09 07:20:56'),
(1, 16, '2019-08-09 07:20:13', '2019-08-09 07:20:13'),
(1, 17, '2019-08-09 07:20:05', '2019-08-09 07:20:05'),
(1, 18, '2019-08-09 07:21:16', '2019-08-09 07:21:16'),
(1, 19, '2019-08-09 07:19:37', '2019-08-09 07:19:37'),
(1, 20, '2019-08-09 07:19:20', '2019-08-09 07:19:20');

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
(1, 46, '2019-08-21 08:37:49', '2019-08-21 08:37:49'),
(12, 46, '2019-08-21 08:37:50', '2019-08-21 08:37:50'),
(13, 46, '2019-08-21 08:37:50', '2019-08-21 08:37:50'),
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
(14, 46, '2019-08-21 08:37:50', '2019-08-21 08:37:50');

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
(11, 'Vải áo dài Thanh Thuỷ', NULL, '2_1566378149.jpeg', 1, 2, '2019-08-21 09:02:30', '2019-08-21 09:02:30'),
(12, 'Vải áo dài Thanh Thuỷ', NULL, '2_1566378155.jpeg', 2, 2, '2019-08-21 09:02:35', '2019-08-21 09:02:35');

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
(26, 'public', 'media/product/2019_8', '5d57f55915bf5', 'png', 'image/png', 'image', 2385438, '2019-08-17 12:38:50', '2019-08-17 12:38:50');

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
(15, 4, 'Vải áo dài', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai.html', '_self', NULL, '#333333', NULL, 1, NULL, NULL, '2019-08-09 07:45:12', '2019-08-11 11:15:26'),
(16, 4, 'Vải áo dài cặp đôi', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cap-doi.html', '_self', NULL, '#333333', NULL, 2, NULL, NULL, '2019-08-09 07:45:17', '2019-08-11 11:15:52'),
(17, 4, 'Vải áo dài đắp nhung', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-dap-nhung.html', '_self', NULL, '#333333', NULL, 3, NULL, NULL, '2019-08-09 07:45:25', '2019-08-11 11:16:22'),
(18, 4, 'Vải áo dài gấm', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-gam.html', '_self', NULL, '#333333', NULL, 4, NULL, NULL, '2019-08-09 07:45:35', '2019-08-11 11:16:38'),
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
(39, 4, 'Vải áo dài mẹ và bé', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-me-va-be.html', '_self', NULL, '#333333', NULL, 5, NULL, NULL, '2019-08-11 11:16:54', '2019-08-11 11:16:54'),
(40, 4, 'Vải áo dài thêu', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-theu.html', '_self', NULL, '#333333', NULL, 6, NULL, NULL, '2019-08-11 11:17:12', '2019-08-11 11:17:12'),
(41, 4, 'Vải áo dài vẽ', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-ve.html', '_self', NULL, '#333333', NULL, 7, NULL, NULL, '2019-08-11 11:17:25', '2019-08-11 11:17:25'),
(42, 4, 'Vải áo dài cưới hỏi, dạ hội', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cuoi-hoi-da-hoi.html', '_self', NULL, '#333333', NULL, 7, NULL, NULL, '2019-08-11 11:17:42', '2019-08-11 11:17:42'),
(43, 4, 'Vải áo dài đính đá, kết cườm', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-dinh-da-ket-cuom.html', '_self', NULL, '#333333', NULL, 8, NULL, NULL, '2019-08-11 11:18:03', '2019-08-11 11:18:03'),
(44, 4, 'Vải áo dài lụa', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-lua.html', '_self', NULL, '#333333', NULL, 10, NULL, NULL, '2019-08-11 11:18:15', '2019-08-21 08:31:19'),
(45, 4, 'Vải áo dài Thái Tuấn', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-thai-tuan.html', '_self', NULL, '#333333', NULL, 10, NULL, NULL, '2019-08-11 11:18:29', '2019-08-11 11:18:29'),
(46, 4, 'Vải áo dài trơn', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-tron.html', '_self', NULL, '#333333', NULL, 11, NULL, NULL, '2019-08-11 11:18:41', '2019-08-11 11:18:41'),
(47, 4, 'Vải quần áo dài', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-quan-ao-dai.html', '_self', NULL, '#333333', NULL, 12, NULL, NULL, '2019-08-11 11:18:55', '2019-08-11 11:18:55'),
(48, 4, 'Vải áo dài cách tân nam', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cach-tan-nam.html', '_self', NULL, '#333333', NULL, 13, NULL, NULL, '2019-08-11 11:19:09', '2019-08-11 11:19:09'),
(49, 4, 'Vải áo dài cách tân nữ', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cach-tan-nu.html', '_self', NULL, '#333333', NULL, 14, NULL, NULL, '2019-08-11 11:19:26', '2019-08-11 11:19:26'),
(50, 4, 'Vải áo dài cách tân hoa 3D', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cach-tan-hoa-3d.html', '_self', NULL, '#333333', NULL, 15, NULL, NULL, '2019-08-11 11:19:45', '2019-08-11 11:19:45'),
(51, 4, 'Vải áo dài cách tân in', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cach-tan-in.html', '_self', NULL, '#333333', NULL, 17, NULL, NULL, '2019-08-11 11:20:02', '2019-08-11 11:20:02'),
(52, 4, 'Vải áo dài cách tân họa tiết', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cach-tan-hoa-tiet.html', '_self', NULL, '#333333', NULL, 17, NULL, NULL, '2019-08-11 11:20:18', '2019-08-11 11:20:18'),
(53, 4, 'Vải áo dài cách tân vẽ', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-ao-dai-cach-tan-ve.html', '_self', NULL, '#333333', NULL, 18, NULL, NULL, '2019-08-11 11:20:36', '2019-08-11 11:20:36'),
(54, 4, 'Vải váy, áo, đầm thời trang', 'url', 'http://vaiaodaithanhthuy.com/sp/danh-muc/vai-vay-ao-dam-thoi-trang.html', '_self', NULL, '#333333', NULL, 20, NULL, NULL, '2019-08-11 11:21:29', '2019-08-11 11:21:29');

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
(17, 'home.title1_banner2', 'Tiêu đề 1 - Banner 2', 'MIỄN PHÍ VẬN CHUYỂN', 'text', 9, 1, '2019-08-09 03:18:05', '2019-08-21 07:45:43'),
(18, 'home.title2_banner2', 'Tiêu đề 2 - Banner 2', 'TRẢ HÀNG TRONG 30 NGÀY ĐẦU', 'text', 11, 1, '2019-08-09 03:18:24', '2019-08-21 07:45:43'),
(19, 'home.title3_banner2', 'Tiêu đề 3 - Banner 2', 'HỖ TRỢ 24/7', 'text', 13, 1, '2019-08-09 03:18:34', '2019-08-21 07:45:43'),
(20, 'home.des1_banner2', 'Mô tả 1 - Banner 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.', 'text_area', 10, 1, '2019-08-09 03:19:01', '2019-08-21 07:45:43'),
(21, 'home.des2_banner2', 'Mô tả 2 - Banner 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.', 'text_area', 12, 1, '2019-08-09 03:19:13', '2019-08-21 07:45:43'),
(22, 'home.des3_banner2', 'Mô tả 3 - Banner 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.', 'text_area', 14, 1, '2019-08-09 03:19:23', '2019-08-21 07:45:43'),
(23, 'home.title_session3', 'Tiêu đề - Phần 3', 'NHỮNG BÀI KINH NGHIỆM HAY', 'text', 15, 1, '2019-08-09 03:30:54', '2019-08-21 07:45:43'),
(24, 'home.cate_slug_session3', 'Slug chuyên mục bài viết - Phần 3', 'goc-chia-se', 'text', 16, 1, '2019-08-09 03:41:58', '2019-08-21 07:45:43'),
(25, 'contact.title_session1', 'Tiêu đề - Phần 1', 'Chúng tôi sẵn sàng hỗ trợ bạn ..', 'text', 3, 4, '2019-08-09 04:30:49', '2019-08-09 04:31:54'),
(26, 'contact.des_session1', 'Mô tả - Phần 1', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione ducimus harum iusto nobis voluptate ipsum blanditiis illo illum dolore totam omnis atque eius deserunt quaerat, mollitia nihil quam tempora beatae?', 'text_area', 4, 4, '2019-08-09 04:31:17', '2019-08-09 07:00:14'),
(27, 'home.title_session1a', 'Tiêu đề - Phần 1A (Ngăn cách nhau bằng dấu phẩy \",\")', 'Vải áo dài lụa,Vải áo dài cưới,Áo dài đính đá kết cườm,Áo dài cưới hỏi dạ hội', 'text', 3, 1, '2019-08-21 07:44:04', '2019-08-21 08:29:02'),
(28, 'home.cate_slug_session1a', 'Slug danh mục sản phẩm - Phần 1A (Ngăn cách nhau bằng dấu phẩy \",\")', 'vai-ao-dai-lua,vai-ao-dai-cuoi-hoi-da-hoi,vai-ao-dai-dinh-da-ket-cuom,vai-ao-dai-cuoi-hoi-da-hoi', 'text', 4, 1, '2019-08-21 07:45:39', '2019-08-21 08:07:15');

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
(11, 'Bài viết dữ liệu mẫu 11', 'bai-viet-du-lieu-mau-11', '1565335230.jpeg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.</p><p><br></p><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.</p>', 'publish', 0, 1, NULL, NULL, NULL, '2019-08-05 08:22:32', '2019-08-09 07:20:30'),
(12, 'Bài viết dữ liệu mẫu 12', 'bai-viet-du-lieu-mau-12', '1565335237.jpeg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.<br>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.', 'publish', 0, 1, NULL, NULL, NULL, '2019-08-05 08:22:32', '2019-08-09 07:20:37'),
(13, 'Bài viết dữ liệu mẫu 13', 'bai-viet-du-lieu-mau-13', '1565335243.jpeg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.<br>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.', 'publish', 0, 1, NULL, NULL, NULL, '2019-08-05 08:22:32', '2019-08-09 07:20:43'),
(14, 'Bài viết dữ liệu mẫu 14', 'bai-viet-du-lieu-mau-14', '1565335250.jpeg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.<br>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.', 'publish', 0, 1, NULL, NULL, NULL, '2019-08-05 08:22:32', '2019-08-09 07:20:50'),
(15, 'Bài viết dữ liệu mẫu 15', 'bai-viet-du-lieu-mau-15', '1565335256.jpeg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.<br>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.', 'publish', 0, 1, NULL, NULL, NULL, '2019-08-05 08:22:32', '2019-08-09 07:20:56'),
(16, 'Bài viết dữ liệu mẫu 16', 'bai-viet-du-lieu-mau-16', '1565335213.jpeg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.<br>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.', 'publish', 0, 1, NULL, NULL, NULL, '2019-08-05 08:22:32', '2019-08-09 07:20:13'),
(17, 'Bài viết dữ liệu mẫu 17', 'bai-viet-du-lieu-mau-17', '1565335204.jpeg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.</p><p><br></p><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.</p>', 'publish', 0, 1, NULL, NULL, NULL, '2019-08-05 08:22:32', '2019-08-09 07:20:05'),
(18, 'Bài viết dữ liệu mẫu 18', 'bai-viet-du-lieu-mau-18', '1565335276.jpeg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.<br>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.', 'publish', 0, 1, NULL, NULL, NULL, '2019-08-05 08:22:32', '2019-08-09 07:21:16'),
(19, 'Bài viết dữ liệu mẫu 19', 'bai-viet-du-lieu-mau-19', '1565335177.jpeg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.</p><p><br></p><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.</p>', 'publish', 0, 1, NULL, NULL, NULL, '2019-08-05 08:22:32', '2019-08-09 07:19:37'),
(20, 'Bài viết dữ liệu mẫu 20', 'bai-viet-du-lieu-mau-20', '1565335160.jpeg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.</p><p><br></p><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.</p>', 'publish', 0, 1, NULL, NULL, NULL, '2019-08-05 08:22:32', '2019-08-09 07:19:20');

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
  `counter` int(11) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `code`, `photo`, `description`, `body`, `publish`, `price`, `counter`, `user_id`, `created_at`, `updated_at`) VALUES
(23, 'MS-TT20', 'ms-tt20', 'MS-TT20', '1566044139.png', 'MS-TT20', '<p><img src=\"/media/product/2019_8/5d57efae347e0.png\"></p>', 'publish', '300k/bộ', 0, 1, '2019-08-17 12:15:39', '2019-08-17 12:15:39'),
(24, 'MS-TT21', 'ms-tt21', 'MS-TT21', '1566044212.png', 'MS-TT21', '<p><img src=\"/media/product/2019_8/5d57f02d43111.png\"></p>', 'publish', '300k/bộ', 0, 1, '2019-08-17 12:16:52', '2019-08-17 12:16:52'),
(25, 'MS-TT22', 'ms-tt22', 'MS-TT22', '1566044300.png', 'MS-TT22', '<p><img src=\"/media/product/2019_8/5d57f0647cf8a.png\"></p>', 'publish', '300k/bộ', 0, 1, '2019-08-17 12:18:20', '2019-08-17 12:18:20'),
(26, 'MS-TT23', 'ms-tt23', 'MS-TT23', '1566044344.png', 'MS-TT23', '<p><img src=\"/media/product/2019_8/5d57f0b19bce2.png\"></p>', 'publish', '300k/bộ', 0, 1, '2019-08-17 12:19:04', '2019-08-17 12:19:04'),
(27, 'MS-TT24', 'ms-tt24', 'MS-TT24', '1566044466.png', 'MS-TT24', '<p><img src=\"/media/product/2019_8/5d57f12b81133.png\"></p>', 'publish', '300k/bộ', 0, 1, '2019-08-17 12:21:06', '2019-08-17 12:21:06'),
(28, 'MS-TT25', 'ms-tt25', 'MS-TT25', '1566044503.png', 'MS-TT25', '<p><img src=\"/media/product/2019_8/5d57f1537a666.png\"></p>', 'publish', '300k/bộ', 0, 1, '2019-08-17 12:21:43', '2019-08-17 12:21:43'),
(29, 'MS-TT26', 'ms-tt26', 'MS-TT26', '1566044556.png', 'MS-TT26', '<p><img src=\"/media/product/2019_8/5d57f186ab548.png\"></p>', 'publish', '300k/bộ', 0, 1, '2019-08-17 12:22:36', '2019-08-17 12:22:36'),
(30, 'MS-TT27', 'ms-tt27', 'MS-TT27', '1566044607.png', 'MS-TT27', '<p><img src=\"/media/product/2019_8/5d57f1b84e7f1.png\"></p>', 'publish', '300k/bộ', 0, 1, '2019-08-17 12:23:27', '2019-08-17 12:23:27'),
(31, 'MS-TT28', 'ms-tt28', 'MS-TT28', '1566044697.png', 'MS-TT28', '<p><img src=\"/media/product/2019_8/5d57f213d7187.png\"></p>', 'publish', '300k/bộ', 0, 1, '2019-08-17 12:24:57', '2019-08-17 12:24:57'),
(32, 'MS-TT29', 'ms-tt29', 'MS-TT29', '1566044734.png', 'MS-TT29', '<p><img src=\"/media/product/2019_8/5d57f2398a10d.png\"></p>', 'publish', '300k/bộ', 0, 1, '2019-08-17 12:25:34', '2019-08-17 12:25:34'),
(33, 'MS-TT30', 'ms-tt30', 'MS-TT30', '1566044789.png', 'MS-TT30', '<p><img src=\"/media/product/2019_8/5d57f26f6bdbe.png\"></p>', 'publish', '300k/bộ', 0, 1, '2019-08-17 12:26:29', '2019-08-17 12:26:29'),
(34, 'MS-TT31', 'ms-tt31', 'MS-TT31', '1566044830.png', 'MS-TT31', '<p><img src=\"/media/product/2019_8/5d57f29a206b4.png\"></p>', 'publish', '300k/bộ', 0, 1, '2019-08-17 12:27:10', '2019-08-17 12:27:10'),
(35, 'MS-TT32', 'ms-tt32', 'MS-TT32', '1566044957.png', 'MS-TT32', '<p><img src=\"/media/product/2019_8/5d57f3190782e.png\"></p>', 'publish', '300k/bộ', 0, 1, '2019-08-17 12:29:17', '2019-08-17 12:29:17'),
(36, 'MS-TT33', 'ms-tt33', 'MS-TT33', '1566045003.png', 'MS-TT33', '<p><img src=\"/media/product/2019_8/5d57f340b1e1c.png\"></p>', 'publish', '300k/bộ', 0, 1, '2019-08-17 12:30:03', '2019-08-17 12:30:03'),
(37, 'MS-TT34', 'ms-tt34', 'MS-TT34', '1566045051.png', 'MS-TT34', '<p><img src=\"/media/product/2019_8/5d57f36f5b094.png\"></p>', 'publish', '300k/bộ', 0, 1, '2019-08-17 12:30:51', '2019-08-21 09:26:54'),
(38, 'MS-TT35', 'ms-tt35', 'MS-TT35', '1566045115.png', 'MS-TT35', '<p><img src=\"/media/product/2019_8/5d57f3b3b56e1.png\"></p>', 'publish', '300k/bộ', 0, 1, '2019-08-17 12:31:55', '2019-08-17 12:31:55'),
(39, 'MS-TT36', 'ms-tt36', 'MS-TT36', '1566045164.png', 'MS-TT36', '<p><img src=\"/media/product/2019_8/5d57f3e5ec497.png\"></p>', 'publish', '300k/bộ', 0, 1, '2019-08-17 12:32:44', '2019-08-17 12:32:44'),
(40, 'MS-TT37', 'ms-tt37', 'MS-TT37', '1566045217.png', 'MS-TT37', '<p><img src=\"/media/product/2019_8/5d57f41856571.png\"></p>', 'publish', '300k/bộ', 0, 1, '2019-08-17 12:33:37', '2019-08-21 09:24:11'),
(41, 'MS-TT38', 'ms-tt38', 'MS-TT38', '1566045258.png', 'MS-TT38', '<p><img src=\"/media/product/2019_8/5d57f4421a8f0.png\"></p>', 'publish', '300k/bộ', 0, 1, '2019-08-17 12:34:18', '2019-08-17 12:34:18'),
(42, 'MS-TT39', 'ms-tt39', 'MS-TT39', '1566045359.png', 'MS-TT39', '<p><img src=\"/media/product/2019_8/5d57f46fa3301.png\"></p>', 'publish', '300k/bộ', 0, 1, '2019-08-17 12:35:59', '2019-08-17 12:35:59'),
(43, 'MS-TT40', 'ms-tt40', 'MS-TT40', '1566045405.png', 'MS-TT40', '<p><img src=\"/media/product/2019_8/5d57f4d5ae23a.png\"></p>', 'publish', '300k/bộ', 0, 1, '2019-08-17 12:36:45', '2019-08-21 09:24:02'),
(44, 'MS-TT41', 'ms-tt41', 'MS-TT41', '1566045452.png', 'MS-TT41', '<p><img src=\"/media/product/2019_8/5d57f507577f8.png\"></p>', 'publish', '300k/bộ', 0, 1, '2019-08-17 12:37:32', '2019-08-21 09:23:54'),
(45, 'MS-TT42', 'ms-tt42', 'MS-TT42', '1566045491.png', 'MS-TT42', '<p><img src=\"/media/product/2019_8/5d57f52cc489a.png\"></p>', 'publish', '300k/bộ', 0, 1, '2019-08-17 12:38:11', '2019-08-21 08:57:47'),
(46, 'MS-TT43', 'ms-tt43', 'MS-TT43', '1566045535.png', 'MS-TT43', '<p><img src=\"/media/product/2019_8/5d57f55915bf5.png\"></p>', 'publish', '300k/bộ', 0, 1, '2019-08-17 12:38:55', '2019-08-21 07:52:07');

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
(21, 'Vải áo dài cách tân vẽ', 'vai-ao-dai-cach-tan-ve', 3, '2019-08-11 10:56:02', '2019-08-11 10:56:02');

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
(1, 'Superadmin', 'superadmin@katicms.com', NULL, '$2y$10$7CO0DleEjlzbp4/6n7wzYuxeJUm.bfw9YuvgKhGDzRH38I3GHDTTq', 'active', NULL, 'profile.png', '2019-08-21 07:35:42', '14.250.255.233', 'HnxBlxCblIhihqFKZ9QyQpG1TcPiJtAYNBvEYEtA74ndH7K1QAatYuX4SWql', '2019-08-05 08:22:29', '2019-08-21 07:35:42'),
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `p_categories`
--
ALTER TABLE `p_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
