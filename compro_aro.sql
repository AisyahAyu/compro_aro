-- phpMyAdmin SQL Dump
-- version 5.2.2deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 05, 2026 at 03:30 PM
-- Server version: 8.4.8-0ubuntu0.25.10.1
-- PHP Version: 8.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `compro_aro`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas`
--

CREATE TABLE `aktivitas` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ringkasan` text COLLATE utf8mb4_unicode_ci,
  `Deskripsi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci,
  `kategori` enum('Berita','Pengumuman','Aktivitas','event') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Berita',
  `active` int NOT NULL DEFAULT '0' COMMENT '0=Draft, 10=Published',
  `views` int NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aktivitas`
--

INSERT INTO `aktivitas` (`id`, `judul`, `ringkasan`, `Deskripsi`, `gambar`, `kategori`, `active`, `views`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'asdasdsadasd', NULL, 'asdasdasdsad', 'aktivitas/219FsRbvGKu89rxGdcBHxPl4VetXm09SsMhKoQyU.png', 'Berita', 0, 0, NULL, '2026-03-29 21:08:35', '2026-03-29 21:08:35'),
(2, 'asdasdsadasd', NULL, 'asdasdasd', 'aktivitas/U5OwsbwiVQyGaJXDHNC63aWwQSWrQsgfa1vGZNcE.png', 'Pengumuman', 0, 0, NULL, '2026-03-29 21:09:14', '2026-03-29 21:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `description`, `button_text`, `button_link`, `image`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Solusi Terbaik untuk Bisnis Anda', 'Kami menyediakan berbagai pilihan furniture dengan desain elegan dan material berkualitas tinggi untuk menciptakan ruang yang nyaman, fungsional, dan berkelas.', 'Lihat Selengkapnya', '#produk', 'uploads/banners/1773642301.png', 1, 1, '2026-03-13 01:23:15', '2026-03-15 23:25:01'),
(3, 'Solusi Terbaik untuk Bisnis Anda', NULL, NULL, NULL, 'uploads/banners/banner1.jpg', 1, 1, '2026-03-29 21:32:48', '2026-03-29 21:32:48'),
(4, 'Platform Digital Terintegrasi', NULL, NULL, NULL, 'uploads/banners/banner2.jpg', 2, 1, '2026-03-29 21:32:48', '2026-03-29 21:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE `benefits` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `logo`, `url`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'asdasdsad', 'uploads/brands/1774842897.png', NULL, 1, 1, '2026-03-29 20:54:57', '2026-03-29 20:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-ecommerce_brands', 'a:11:{i:0;a:2:{s:8:\"id_brand\";i:14;s:10:\"nama_brand\";s:7:\"ABE edu\";}i:1;a:2:{s:8:\"id_brand\";i:15;s:10:\"nama_brand\";s:10:\"ABE living\";}i:2;a:2:{s:8:\"id_brand\";i:2;s:10:\"nama_brand\";s:4:\"Acer\";}i:3;a:2:{s:8:\"id_brand\";i:3;s:10:\"nama_brand\";s:3:\"APC\";}i:4;a:2:{s:8:\"id_brand\";i:5;s:10:\"nama_brand\";s:5:\"Ferro\";}i:5;a:2:{s:8:\"id_brand\";i:6;s:10:\"nama_brand\";s:7:\"Hartech\";}i:6;a:2:{s:8:\"id_brand\";i:7;s:10:\"nama_brand\";s:2:\"HP\";}i:7;a:2:{s:8:\"id_brand\";i:8;s:10:\"nama_brand\";s:7:\"Mubarix\";}i:8;a:2:{s:8:\"id_brand\";i:9;s:10:\"nama_brand\";s:9:\"Panasonic\";}i:9;a:2:{s:8:\"id_brand\";i:4;s:10:\"nama_brand\";s:5:\"Umalo\";}i:10;a:2:{s:8:\"id_brand\";i:11;s:10:\"nama_brand\";s:8:\"ZEPPELIN\";}}', 1774948315),
('laravel-cache-ecommerce_categories', 'a:7:{i:0;a:6:{s:11:\"id_kategori\";i:1;s:13:\"nama_kategori\";s:16:\"Furniture Kantor\";s:13:\"icon_kategori\";s:28:\"kategori/furniturekantor.svg\";s:10:\"created_at\";s:27:\"2026-02-12T06:16:15.000000Z\";s:10:\"updated_at\";s:27:\"2026-02-12T06:16:15.000000Z\";s:11:\"subkategori\";a:7:{i:0;a:6:{s:14:\"id_subkategori\";i:42;s:11:\"id_kategori\";i:1;s:16:\"nama_subkategori\";s:4:\"Meja\";s:10:\"created_at\";s:27:\"2026-03-02T03:08:36.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:08:36.000000Z\";s:15:\"sub_subkategori\";a:12:{i:0;a:5:{s:18:\"id_sub_subkategori\";i:35;s:14:\"id_subkategori\";i:42;s:20:\"nama_sub_subkategori\";s:10:\"Meja Staff\";s:10:\"created_at\";s:27:\"2026-03-02T03:15:02.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:15:02.000000Z\";}i:1;a:5:{s:18:\"id_sub_subkategori\";i:36;s:14:\"id_subkategori\";i:42;s:20:\"nama_sub_subkategori\";s:15:\"Meja Supervisor\";s:10:\"created_at\";s:27:\"2026-03-02T03:15:10.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:15:10.000000Z\";}i:2;a:5:{s:18:\"id_sub_subkategori\";i:37;s:14:\"id_subkategori\";i:42;s:20:\"nama_sub_subkategori\";s:13:\"Meja Direktur\";s:10:\"created_at\";s:27:\"2026-03-02T03:15:17.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:15:17.000000Z\";}i:3;a:5:{s:18:\"id_sub_subkategori\";i:38;s:14:\"id_subkategori\";i:42;s:20:\"nama_sub_subkategori\";s:17:\"Meja Receptionist\";s:10:\"created_at\";s:27:\"2026-03-02T03:15:25.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:15:25.000000Z\";}i:4;a:5:{s:18:\"id_sub_subkategori\";i:39;s:14:\"id_subkategori\";i:42;s:20:\"nama_sub_subkategori\";s:18:\"Meja Kerja Kubikal\";s:10:\"created_at\";s:27:\"2026-03-02T03:15:34.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:15:34.000000Z\";}i:5;a:5:{s:18:\"id_sub_subkategori\";i:40;s:14:\"id_subkategori\";i:42;s:20:\"nama_sub_subkategori\";s:23:\"Meja Kerja Konfirgurasi\";s:10:\"created_at\";s:27:\"2026-03-02T03:15:44.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:15:44.000000Z\";}i:6;a:5:{s:18:\"id_sub_subkategori\";i:41;s:14:\"id_subkategori\";i:42;s:20:\"nama_sub_subkategori\";s:10:\"Meja Rapat\";s:10:\"created_at\";s:27:\"2026-03-02T03:15:53.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:15:53.000000Z\";}i:7;a:5:{s:18:\"id_sub_subkategori\";i:42;s:14:\"id_subkategori\";i:42;s:20:\"nama_sub_subkategori\";s:14:\"Meja Serbaguna\";s:10:\"created_at\";s:27:\"2026-03-02T03:16:09.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:16:09.000000Z\";}i:8;a:5:{s:18:\"id_sub_subkategori\";i:43;s:14:\"id_subkategori\";i:42;s:20:\"nama_sub_subkategori\";s:13:\"Meja Komputer\";s:10:\"created_at\";s:27:\"2026-03-02T03:16:19.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:16:19.000000Z\";}i:9;a:5:{s:18:\"id_sub_subkategori\";i:44;s:14:\"id_subkategori\";i:42;s:20:\"nama_sub_subkategori\";s:11:\"Meja Podium\";s:10:\"created_at\";s:27:\"2026-03-02T03:16:26.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:16:26.000000Z\";}i:10;a:5:{s:18:\"id_sub_subkategori\";i:45;s:14:\"id_subkategori\";i:42;s:20:\"nama_sub_subkategori\";s:11:\"Meja Mimbar\";s:10:\"created_at\";s:27:\"2026-03-02T03:17:03.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:17:03.000000Z\";}i:11;a:5:{s:18:\"id_sub_subkategori\";i:90;s:14:\"id_subkategori\";i:42;s:20:\"nama_sub_subkategori\";s:10:\"Meja Kerja\";s:10:\"created_at\";s:27:\"2026-03-05T09:44:54.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-05T09:44:54.000000Z\";}}}i:1;a:6:{s:14:\"id_subkategori\";i:43;s:11:\"id_kategori\";i:1;s:16:\"nama_subkategori\";s:6:\"Lemari\";s:10:\"created_at\";s:27:\"2026-03-02T03:08:47.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:08:47.000000Z\";s:15:\"sub_subkategori\";a:5:{i:0;a:5:{s:18:\"id_sub_subkategori\";i:46;s:14:\"id_subkategori\";i:43;s:20:\"nama_sub_subkategori\";s:12:\"Lemari Arsip\";s:10:\"created_at\";s:27:\"2026-03-02T03:17:16.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:17:16.000000Z\";}i:1;a:5:{s:18:\"id_sub_subkategori\";i:47;s:14:\"id_subkategori\";i:43;s:20:\"nama_sub_subkategori\";s:14:\"Lemari Pakaian\";s:10:\"created_at\";s:27:\"2026-03-02T03:17:24.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:17:24.000000Z\";}i:2;a:5:{s:18:\"id_sub_subkategori\";i:48;s:14:\"id_subkategori\";i:43;s:20:\"nama_sub_subkategori\";s:19:\"Lemari Laboratorium\";s:10:\"created_at\";s:27:\"2026-03-02T03:17:38.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:17:38.000000Z\";}i:3;a:5:{s:18:\"id_sub_subkategori\";i:49;s:14:\"id_subkategori\";i:43;s:20:\"nama_sub_subkategori\";s:15:\"Filling Cabinet\";s:10:\"created_at\";s:27:\"2026-03-02T03:17:45.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:17:45.000000Z\";}i:4;a:5:{s:18:\"id_sub_subkategori\";i:50;s:14:\"id_subkategori\";i:43;s:20:\"nama_sub_subkategori\";s:6:\"Locker\";s:10:\"created_at\";s:27:\"2026-03-02T03:17:52.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:17:52.000000Z\";}}}i:2;a:6:{s:14:\"id_subkategori\";i:44;s:11:\"id_kategori\";i:1;s:16:\"nama_subkategori\";s:3:\"Rak\";s:10:\"created_at\";s:27:\"2026-03-02T03:08:59.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:08:59.000000Z\";s:15:\"sub_subkategori\";a:4:{i:0;a:5:{s:18:\"id_sub_subkategori\";i:51;s:14:\"id_subkategori\";i:44;s:20:\"nama_sub_subkategori\";s:8:\"Rak Buku\";s:10:\"created_at\";s:27:\"2026-03-02T03:18:01.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:18:01.000000Z\";}i:1;a:5:{s:18:\"id_sub_subkategori\";i:52;s:14:\"id_subkategori\";i:44;s:20:\"nama_sub_subkategori\";s:10:\"Rak Sepatu\";s:10:\"created_at\";s:27:\"2026-03-02T03:18:07.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:18:07.000000Z\";}i:2;a:5:{s:18:\"id_sub_subkategori\";i:53;s:14:\"id_subkategori\";i:44;s:20:\"nama_sub_subkategori\";s:8:\"Rak Besi\";s:10:\"created_at\";s:27:\"2026-03-02T03:18:16.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:18:16.000000Z\";}i:3;a:5:{s:18:\"id_sub_subkategori\";i:54;s:14:\"id_subkategori\";i:44;s:20:\"nama_sub_subkategori\";s:7:\"Divider\";s:10:\"created_at\";s:27:\"2026-03-02T03:18:25.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:18:25.000000Z\";}}}i:3;a:6:{s:14:\"id_subkategori\";i:45;s:11:\"id_kategori\";i:1;s:16:\"nama_subkategori\";s:4:\"Sofa\";s:10:\"created_at\";s:27:\"2026-03-02T03:09:07.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:09:07.000000Z\";s:15:\"sub_subkategori\";a:6:{i:0;a:5:{s:18:\"id_sub_subkategori\";i:55;s:14:\"id_subkategori\";i:45;s:20:\"nama_sub_subkategori\";s:13:\"Sofa 1 Seater\";s:10:\"created_at\";s:27:\"2026-03-02T03:18:37.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:18:37.000000Z\";}i:1;a:5:{s:18:\"id_sub_subkategori\";i:56;s:14:\"id_subkategori\";i:45;s:20:\"nama_sub_subkategori\";s:13:\"Sofa 2 Seater\";s:10:\"created_at\";s:27:\"2026-03-02T03:18:44.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:18:44.000000Z\";}i:2;a:5:{s:18:\"id_sub_subkategori\";i:57;s:14:\"id_subkategori\";i:45;s:20:\"nama_sub_subkategori\";s:13:\"Sofa 3 Seater\";s:10:\"created_at\";s:27:\"2026-03-02T03:18:50.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:18:50.000000Z\";}i:3;a:5:{s:18:\"id_sub_subkategori\";i:58;s:14:\"id_subkategori\";i:45;s:20:\"nama_sub_subkategori\";s:8:\"Sofa Bed\";s:10:\"created_at\";s:27:\"2026-03-02T03:18:59.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:18:59.000000Z\";}i:4;a:5:{s:18:\"id_sub_subkategori\";i:59;s:14:\"id_subkategori\";i:45;s:20:\"nama_sub_subkategori\";s:11:\"Sofa Corner\";s:10:\"created_at\";s:27:\"2026-03-02T03:19:06.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:19:06.000000Z\";}i:5;a:5:{s:18:\"id_sub_subkategori\";i:60;s:14:\"id_subkategori\";i:45;s:20:\"nama_sub_subkategori\";s:12:\"Stool / Puff\";s:10:\"created_at\";s:27:\"2026-03-02T03:19:13.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:19:13.000000Z\";}}}i:4;a:6:{s:14:\"id_subkategori\";i:46;s:11:\"id_kategori\";i:1;s:16:\"nama_subkategori\";s:5:\"Papan\";s:10:\"created_at\";s:27:\"2026-03-02T03:09:19.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:09:19.000000Z\";s:15:\"sub_subkategori\";a:2:{i:0;a:5:{s:18:\"id_sub_subkategori\";i:61;s:14:\"id_subkategori\";i:46;s:20:\"nama_sub_subkategori\";s:16:\"Papan Pengumunan\";s:10:\"created_at\";s:27:\"2026-03-02T03:19:25.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:19:25.000000Z\";}i:1;a:5:{s:18:\"id_sub_subkategori\";i:62;s:14:\"id_subkategori\";i:46;s:20:\"nama_sub_subkategori\";s:11:\"Papan Tulis\";s:10:\"created_at\";s:27:\"2026-03-02T03:19:32.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:19:32.000000Z\";}}}i:5;a:6:{s:14:\"id_subkategori\";i:47;s:11:\"id_kategori\";i:1;s:16:\"nama_subkategori\";s:5:\"Kursi\";s:10:\"created_at\";s:27:\"2026-03-02T03:09:31.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:09:31.000000Z\";s:15:\"sub_subkategori\";a:9:{i:0;a:5:{s:18:\"id_sub_subkategori\";i:63;s:14:\"id_subkategori\";i:47;s:20:\"nama_sub_subkategori\";s:14:\"Kursi Pimpinan\";s:10:\"created_at\";s:27:\"2026-03-02T03:19:40.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:19:40.000000Z\";}i:1;a:5:{s:18:\"id_sub_subkategori\";i:64;s:14:\"id_subkategori\";i:47;s:20:\"nama_sub_subkategori\";s:15:\"Kursi Serbaguna\";s:10:\"created_at\";s:27:\"2026-03-02T03:19:48.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:19:48.000000Z\";}i:2;a:5:{s:18:\"id_sub_subkategori\";i:65;s:14:\"id_subkategori\";i:47;s:20:\"nama_sub_subkategori\";s:16:\"Kursi Auditorium\";s:10:\"created_at\";s:27:\"2026-03-02T03:19:58.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:19:58.000000Z\";}i:3;a:5:{s:18:\"id_sub_subkategori\";i:66;s:14:\"id_subkategori\";i:47;s:20:\"nama_sub_subkategori\";s:13:\"Kursi Theater\";s:10:\"created_at\";s:27:\"2026-03-02T03:20:08.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:20:08.000000Z\";}i:4;a:5:{s:18:\"id_sub_subkategori\";i:67;s:14:\"id_subkategori\";i:47;s:20:\"nama_sub_subkategori\";s:12:\"Kursi Tunggu\";s:10:\"created_at\";s:27:\"2026-03-02T03:20:15.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:20:15.000000Z\";}i:5;a:5:{s:18:\"id_sub_subkategori\";i:68;s:14:\"id_subkategori\";i:47;s:20:\"nama_sub_subkategori\";s:15:\"Kursi Bar Stool\";s:10:\"created_at\";s:27:\"2026-03-02T03:20:22.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:20:22.000000Z\";}i:6;a:5:{s:18:\"id_sub_subkategori\";i:69;s:14:\"id_subkategori\";i:47;s:20:\"nama_sub_subkategori\";s:12:\"Kursi Lounge\";s:10:\"created_at\";s:27:\"2026-03-02T03:20:31.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:20:31.000000Z\";}i:7;a:5:{s:18:\"id_sub_subkategori\";i:70;s:14:\"id_subkategori\";i:47;s:20:\"nama_sub_subkategori\";s:12:\"Kursi Gaming\";s:10:\"created_at\";s:27:\"2026-03-02T03:20:44.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:20:44.000000Z\";}i:8;a:5:{s:18:\"id_sub_subkategori\";i:71;s:14:\"id_subkategori\";i:47;s:20:\"nama_sub_subkategori\";s:11:\"Kursi Staff\";s:10:\"created_at\";s:27:\"2026-03-02T03:20:54.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:20:54.000000Z\";}}}i:6;a:6:{s:14:\"id_subkategori\";i:48;s:11:\"id_kategori\";i:1;s:16:\"nama_subkategori\";s:17:\"Furniture Lainnya\";s:10:\"created_at\";s:27:\"2026-03-02T03:09:39.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:09:39.000000Z\";s:15:\"sub_subkategori\";a:10:{i:0;a:5:{s:18:\"id_sub_subkategori\";i:72;s:14:\"id_subkategori\";i:48;s:20:\"nama_sub_subkategori\";s:9:\"Pot Bunga\";s:10:\"created_at\";s:27:\"2026-03-02T03:21:07.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:21:07.000000Z\";}i:1;a:5:{s:18:\"id_sub_subkategori\";i:73;s:14:\"id_subkategori\";i:48;s:20:\"nama_sub_subkategori\";s:13:\"Tempat Sampah\";s:10:\"created_at\";s:27:\"2026-03-02T03:21:16.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:21:16.000000Z\";}i:2;a:5:{s:18:\"id_sub_subkategori\";i:74;s:14:\"id_subkategori\";i:48;s:20:\"nama_sub_subkategori\";s:5:\"Rehal\";s:10:\"created_at\";s:27:\"2026-03-02T03:21:22.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:21:22.000000Z\";}i:3;a:5:{s:18:\"id_sub_subkategori\";i:75;s:14:\"id_subkategori\";i:48;s:20:\"nama_sub_subkategori\";s:6:\"Sutrah\";s:10:\"created_at\";s:27:\"2026-03-02T03:21:28.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:21:28.000000Z\";}i:4;a:5:{s:18:\"id_sub_subkategori\";i:76;s:14:\"id_subkategori\";i:48;s:20:\"nama_sub_subkategori\";s:6:\"Cermin\";s:10:\"created_at\";s:27:\"2026-03-02T03:21:49.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:21:49.000000Z\";}i:5;a:5:{s:18:\"id_sub_subkategori\";i:77;s:14:\"id_subkategori\";i:48;s:20:\"nama_sub_subkategori\";s:23:\"Patung Garuda Pancasila\";s:10:\"created_at\";s:27:\"2026-03-02T03:22:02.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:22:02.000000Z\";}i:6;a:5:{s:18:\"id_sub_subkategori\";i:78;s:14:\"id_subkategori\";i:48;s:20:\"nama_sub_subkategori\";s:13:\"Foto Presiden\";s:10:\"created_at\";s:27:\"2026-03-02T03:22:09.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:22:09.000000Z\";}i:7;a:5:{s:18:\"id_sub_subkategori\";i:79;s:14:\"id_subkategori\";i:48;s:20:\"nama_sub_subkategori\";s:13:\"Tiang Bendera\";s:10:\"created_at\";s:27:\"2026-03-02T03:22:17.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:22:17.000000Z\";}i:8;a:5:{s:18:\"id_sub_subkategori\";i:80;s:14:\"id_subkategori\";i:48;s:20:\"nama_sub_subkategori\";s:16:\"PC Tray Komputer\";s:10:\"created_at\";s:27:\"2026-03-02T03:22:29.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:22:29.000000Z\";}i:9;a:5:{s:18:\"id_sub_subkategori\";i:89;s:14:\"id_subkategori\";i:48;s:20:\"nama_sub_subkategori\";s:12:\"Tempat Tidur\";s:10:\"created_at\";s:27:\"2026-03-02T03:29:12.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:29:12.000000Z\";}}}}}i:1;a:6:{s:11:\"id_kategori\";i:2;s:13:\"nama_kategori\";s:20:\"Furniture Pendidikan\";s:13:\"icon_kategori\";s:31:\"kategori/furniturekesiswaan.svg\";s:10:\"created_at\";s:27:\"2026-02-12T06:16:15.000000Z\";s:10:\"updated_at\";s:27:\"2026-02-27T04:20:42.000000Z\";s:11:\"subkategori\";a:4:{i:0;a:6:{s:14:\"id_subkategori\";i:49;s:11:\"id_kategori\";i:2;s:16:\"nama_subkategori\";s:5:\"Kursi\";s:10:\"created_at\";s:27:\"2026-03-02T03:09:52.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:09:52.000000Z\";s:15:\"sub_subkategori\";a:2:{i:0;a:5:{s:18:\"id_sub_subkategori\";i:81;s:14:\"id_subkategori\";i:49;s:20:\"nama_sub_subkategori\";s:11:\"Kursi Siswa\";s:10:\"created_at\";s:27:\"2026-03-02T03:22:38.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:22:38.000000Z\";}i:1;a:5:{s:18:\"id_sub_subkategori\";i:82;s:14:\"id_subkategori\";i:49;s:20:\"nama_sub_subkategori\";s:12:\"Kursi Kuliah\";s:10:\"created_at\";s:27:\"2026-03-02T03:22:44.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:22:44.000000Z\";}}}i:1;a:6:{s:14:\"id_subkategori\";i:50;s:11:\"id_kategori\";i:2;s:16:\"nama_subkategori\";s:6:\"Lemari\";s:10:\"created_at\";s:27:\"2026-03-02T03:10:02.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:10:02.000000Z\";s:15:\"sub_subkategori\";a:2:{i:0;a:5:{s:18:\"id_sub_subkategori\";i:83;s:14:\"id_subkategori\";i:50;s:20:\"nama_sub_subkategori\";s:15:\"Lemari Tas Paud\";s:10:\"created_at\";s:27:\"2026-03-02T03:23:06.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:23:06.000000Z\";}i:1;a:5:{s:18:\"id_sub_subkategori\";i:84;s:14:\"id_subkategori\";i:50;s:20:\"nama_sub_subkategori\";s:17:\"Lermari File Paud\";s:10:\"created_at\";s:27:\"2026-03-02T03:23:13.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:23:13.000000Z\";}}}i:2;a:6:{s:14:\"id_subkategori\";i:51;s:11:\"id_kategori\";i:2;s:16:\"nama_subkategori\";s:3:\"Rak\";s:10:\"created_at\";s:27:\"2026-03-02T03:10:11.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:10:11.000000Z\";s:15:\"sub_subkategori\";a:1:{i:0;a:5:{s:18:\"id_sub_subkategori\";i:85;s:14:\"id_subkategori\";i:51;s:20:\"nama_sub_subkategori\";s:13:\"Rak Buku Paud\";s:10:\"created_at\";s:27:\"2026-03-02T03:23:21.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:23:21.000000Z\";}}}i:3;a:6:{s:14:\"id_subkategori\";i:52;s:11:\"id_kategori\";i:2;s:16:\"nama_subkategori\";s:4:\"Meja\";s:10:\"created_at\";s:27:\"2026-03-02T03:10:18.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:10:18.000000Z\";s:15:\"sub_subkategori\";a:3:{i:0;a:5:{s:18:\"id_sub_subkategori\";i:86;s:14:\"id_subkategori\";i:52;s:20:\"nama_sub_subkategori\";s:17:\"Meja Belajar Paud\";s:10:\"created_at\";s:27:\"2026-03-02T03:23:28.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:23:28.000000Z\";}i:1;a:5:{s:18:\"id_sub_subkategori\";i:87;s:14:\"id_subkategori\";i:52;s:20:\"nama_sub_subkategori\";s:10:\"Meja Siswa\";s:10:\"created_at\";s:27:\"2026-03-02T03:23:36.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:23:36.000000Z\";}i:2;a:5:{s:18:\"id_sub_subkategori\";i:88;s:14:\"id_subkategori\";i:52;s:20:\"nama_sub_subkategori\";s:9:\"Meja Baca\";s:10:\"created_at\";s:27:\"2026-03-02T03:23:42.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:23:42.000000Z\";}}}}}i:2;a:6:{s:11:\"id_kategori\";i:3;s:13:\"nama_kategori\";s:21:\"Peralatan Pendidikan \";s:13:\"icon_kategori\";s:32:\"kategori/peralatanpendidikan.svg\";s:10:\"created_at\";s:27:\"2026-02-12T06:16:15.000000Z\";s:10:\"updated_at\";s:27:\"2026-02-12T06:16:15.000000Z\";s:11:\"subkategori\";a:1:{i:0;a:6:{s:14:\"id_subkategori\";i:53;s:11:\"id_kategori\";i:3;s:16:\"nama_subkategori\";s:19:\"Alat Peraga Edukasi\";s:10:\"created_at\";s:27:\"2026-03-02T03:10:27.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:10:27.000000Z\";s:15:\"sub_subkategori\";a:0:{}}}}i:3;a:6:{s:11:\"id_kategori\";i:4;s:13:\"nama_kategori\";s:18:\"Mesin dan Perkakas\";s:13:\"icon_kategori\";s:29:\"kategori/mesindanperkakas.svg\";s:10:\"created_at\";s:27:\"2026-02-12T06:16:15.000000Z\";s:10:\"updated_at\";s:27:\"2026-02-12T06:16:15.000000Z\";s:11:\"subkategori\";a:4:{i:0;a:6:{s:14:\"id_subkategori\";i:59;s:11:\"id_kategori\";i:4;s:16:\"nama_subkategori\";s:6:\"Genset\";s:10:\"created_at\";s:27:\"2026-03-02T03:11:24.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:11:24.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:1;a:6:{s:14:\"id_subkategori\";i:60;s:11:\"id_kategori\";i:4;s:16:\"nama_subkategori\";s:8:\"Chainsaw\";s:10:\"created_at\";s:27:\"2026-03-02T03:11:30.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:11:30.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:2;a:6:{s:14:\"id_subkategori\";i:61;s:11:\"id_kategori\";i:4;s:16:\"nama_subkategori\";s:15:\"Mesin Trafo Las\";s:10:\"created_at\";s:27:\"2026-03-02T03:11:37.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:11:37.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:3;a:6:{s:14:\"id_subkategori\";i:62;s:11:\"id_kategori\";i:4;s:16:\"nama_subkategori\";s:11:\"Toolkit Set\";s:10:\"created_at\";s:27:\"2026-03-02T03:11:44.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:11:44.000000Z\";s:15:\"sub_subkategori\";a:0:{}}}}i:4;a:6:{s:11:\"id_kategori\";i:5;s:13:\"nama_kategori\";s:15:\"Peralatan Dapur\";s:13:\"icon_kategori\";s:26:\"kategori/perlatandapur.svg\";s:10:\"created_at\";s:27:\"2026-02-12T06:16:15.000000Z\";s:10:\"updated_at\";s:27:\"2026-02-12T06:16:15.000000Z\";s:11:\"subkategori\";a:5:{i:0;a:6:{s:14:\"id_subkategori\";i:54;s:11:\"id_kategori\";i:5;s:16:\"nama_subkategori\";s:15:\"Kompor Gas Oven\";s:10:\"created_at\";s:27:\"2026-03-02T03:10:38.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:10:38.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:1;a:6:{s:14:\"id_subkategori\";i:55;s:11:\"id_kategori\";i:5;s:16:\"nama_subkategori\";s:4:\"Oven\";s:10:\"created_at\";s:27:\"2026-03-02T03:10:46.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:10:46.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:2;a:6:{s:14:\"id_subkategori\";i:56;s:11:\"id_kategori\";i:5;s:16:\"nama_subkategori\";s:15:\"Mixer Planetary\";s:10:\"created_at\";s:27:\"2026-03-02T03:10:54.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:10:54.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:3;a:6:{s:14:\"id_subkategori\";i:57;s:11:\"id_kategori\";i:5;s:16:\"nama_subkategori\";s:14:\"Mesin Pemotong\";s:10:\"created_at\";s:27:\"2026-03-02T03:11:07.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:11:07.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:4;a:6:{s:14:\"id_subkategori\";i:58;s:11:\"id_kategori\";i:5;s:16:\"nama_subkategori\";s:11:\"Kwali Range\";s:10:\"created_at\";s:27:\"2026-03-02T03:11:14.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:11:14.000000Z\";s:15:\"sub_subkategori\";a:0:{}}}}i:5;a:6:{s:11:\"id_kategori\";i:6;s:13:\"nama_kategori\";s:20:\"Peralatan Elektronik\";s:13:\"icon_kategori\";s:32:\"kategori/peralatanelektronik.svg\";s:10:\"created_at\";s:27:\"2026-02-12T06:16:15.000000Z\";s:10:\"updated_at\";s:27:\"2026-02-12T06:16:15.000000Z\";s:11:\"subkategori\";a:7:{i:0;a:6:{s:14:\"id_subkategori\";i:63;s:11:\"id_kategori\";i:6;s:16:\"nama_subkategori\";s:6:\"Laptop\";s:10:\"created_at\";s:27:\"2026-03-02T03:11:58.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:11:58.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:1;a:6:{s:14:\"id_subkategori\";i:64;s:11:\"id_kategori\";i:6;s:16:\"nama_subkategori\";s:11:\"Komputer PC\";s:10:\"created_at\";s:27:\"2026-03-02T03:12:06.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:12:06.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:2;a:6:{s:14:\"id_subkategori\";i:65;s:11:\"id_kategori\";i:6;s:16:\"nama_subkategori\";s:3:\"UPS\";s:10:\"created_at\";s:27:\"2026-03-02T03:12:15.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:12:15.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:3;a:6:{s:14:\"id_subkategori\";i:66;s:11:\"id_kategori\";i:6;s:16:\"nama_subkategori\";s:7:\"Printer\";s:10:\"created_at\";s:27:\"2026-03-02T03:12:23.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:12:23.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:4;a:6:{s:14:\"id_subkategori\";i:67;s:11:\"id_kategori\";i:6;s:16:\"nama_subkategori\";s:20:\"Air Conditioner (AC)\";s:10:\"created_at\";s:27:\"2026-03-02T03:12:31.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:12:31.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:5;a:6:{s:14:\"id_subkategori\";i:68;s:11:\"id_kategori\";i:6;s:16:\"nama_subkategori\";s:10:\"Video Wall\";s:10:\"created_at\";s:27:\"2026-03-02T03:12:37.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:12:37.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:6;a:6:{s:14:\"id_subkategori\";i:69;s:11:\"id_kategori\";i:6;s:16:\"nama_subkategori\";s:4:\"CCTV\";s:10:\"created_at\";s:27:\"2026-03-02T03:13:06.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:13:06.000000Z\";s:15:\"sub_subkategori\";a:0:{}}}}i:6;a:6:{s:11:\"id_kategori\";i:8;s:13:\"nama_kategori\";s:17:\"Peralatan AID Kit\";s:13:\"icon_kategori\";s:30:\"kategori/peralatan-aid-kit.png\";s:10:\"created_at\";s:27:\"2026-03-02T03:06:07.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:06:07.000000Z\";s:11:\"subkategori\";a:10:{i:0;a:6:{s:14:\"id_subkategori\";i:70;s:11:\"id_kategori\";i:8;s:16:\"nama_subkategori\";s:13:\"Paket Sembako\";s:10:\"created_at\";s:27:\"2026-03-02T03:13:22.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:13:22.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:1;a:6:{s:14:\"id_subkategori\";i:71;s:11:\"id_kategori\";i:8;s:16:\"nama_subkategori\";s:12:\"Survival Kit\";s:10:\"created_at\";s:27:\"2026-03-02T03:13:32.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:13:32.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:2;a:6:{s:14:\"id_subkategori\";i:72;s:11:\"id_kategori\";i:8;s:16:\"nama_subkategori\";s:11:\"Kasur Lipat\";s:10:\"created_at\";s:27:\"2026-03-02T03:13:38.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:13:38.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:3;a:6:{s:14:\"id_subkategori\";i:73;s:11:\"id_kategori\";i:8;s:16:\"nama_subkategori\";s:16:\"Pakaian Lapangan\";s:10:\"created_at\";s:27:\"2026-03-02T03:13:48.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:13:48.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:4;a:6:{s:14:\"id_subkategori\";i:74;s:11:\"id_kategori\";i:8;s:16:\"nama_subkategori\";s:7:\"Selimut\";s:10:\"created_at\";s:27:\"2026-03-02T03:13:53.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:13:53.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:5;a:6:{s:14:\"id_subkategori\";i:75;s:11:\"id_kategori\";i:8;s:16:\"nama_subkategori\";s:9:\"Jas Hujan\";s:10:\"created_at\";s:27:\"2026-03-02T03:13:59.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:13:59.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:6;a:6:{s:14:\"id_subkategori\";i:76;s:11:\"id_kategori\";i:8;s:16:\"nama_subkategori\";s:6:\"Velbed\";s:10:\"created_at\";s:27:\"2026-03-02T03:14:06.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:14:06.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:7;a:6:{s:14:\"id_subkategori\";i:77;s:11:\"id_kategori\";i:8;s:16:\"nama_subkategori\";s:6:\"Geobag\";s:10:\"created_at\";s:27:\"2026-03-02T03:14:21.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:14:21.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:8;a:6:{s:14:\"id_subkategori\";i:78;s:11:\"id_kategori\";i:8;s:16:\"nama_subkategori\";s:6:\"Matras\";s:10:\"created_at\";s:27:\"2026-03-02T03:14:31.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:14:31.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:9;a:6:{s:14:\"id_subkategori\";i:79;s:11:\"id_kategori\";i:8;s:16:\"nama_subkategori\";s:16:\"Paket Kebersihan\";s:10:\"created_at\";s:27:\"2026-03-02T03:14:43.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:14:43.000000Z\";s:15:\"sub_subkategori\";a:0:{}}}}}', 1774948313),
('pt-aro-baskara-esa-cache-ecommerce_brands', 'a:11:{i:0;a:2:{s:8:\"id_brand\";i:14;s:10:\"nama_brand\";s:7:\"ABE edu\";}i:1;a:2:{s:8:\"id_brand\";i:15;s:10:\"nama_brand\";s:10:\"ABE living\";}i:2;a:2:{s:8:\"id_brand\";i:2;s:10:\"nama_brand\";s:4:\"Acer\";}i:3;a:2:{s:8:\"id_brand\";i:3;s:10:\"nama_brand\";s:3:\"APC\";}i:4;a:2:{s:8:\"id_brand\";i:5;s:10:\"nama_brand\";s:5:\"Ferro\";}i:5;a:2:{s:8:\"id_brand\";i:6;s:10:\"nama_brand\";s:7:\"Hartech\";}i:6;a:2:{s:8:\"id_brand\";i:7;s:10:\"nama_brand\";s:2:\"HP\";}i:7;a:2:{s:8:\"id_brand\";i:8;s:10:\"nama_brand\";s:7:\"Mubarix\";}i:8;a:2:{s:8:\"id_brand\";i:9;s:10:\"nama_brand\";s:9:\"Panasonic\";}i:9;a:2:{s:8:\"id_brand\";i:4;s:10:\"nama_brand\";s:5:\"Umalo\";}i:10;a:2:{s:8:\"id_brand\";i:11;s:10:\"nama_brand\";s:8:\"ZEPPELIN\";}}', 1774958711);
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('pt-aro-baskara-esa-cache-ecommerce_categories', 'a:7:{i:0;a:6:{s:11:\"id_kategori\";i:1;s:13:\"nama_kategori\";s:16:\"Furniture Kantor\";s:13:\"icon_kategori\";s:28:\"kategori/furniturekantor.svg\";s:10:\"created_at\";s:27:\"2026-02-12T06:16:15.000000Z\";s:10:\"updated_at\";s:27:\"2026-02-12T06:16:15.000000Z\";s:11:\"subkategori\";a:7:{i:0;a:6:{s:14:\"id_subkategori\";i:42;s:11:\"id_kategori\";i:1;s:16:\"nama_subkategori\";s:4:\"Meja\";s:10:\"created_at\";s:27:\"2026-03-02T03:08:36.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:08:36.000000Z\";s:15:\"sub_subkategori\";a:12:{i:0;a:5:{s:18:\"id_sub_subkategori\";i:35;s:14:\"id_subkategori\";i:42;s:20:\"nama_sub_subkategori\";s:10:\"Meja Staff\";s:10:\"created_at\";s:27:\"2026-03-02T03:15:02.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:15:02.000000Z\";}i:1;a:5:{s:18:\"id_sub_subkategori\";i:36;s:14:\"id_subkategori\";i:42;s:20:\"nama_sub_subkategori\";s:15:\"Meja Supervisor\";s:10:\"created_at\";s:27:\"2026-03-02T03:15:10.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:15:10.000000Z\";}i:2;a:5:{s:18:\"id_sub_subkategori\";i:37;s:14:\"id_subkategori\";i:42;s:20:\"nama_sub_subkategori\";s:13:\"Meja Direktur\";s:10:\"created_at\";s:27:\"2026-03-02T03:15:17.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:15:17.000000Z\";}i:3;a:5:{s:18:\"id_sub_subkategori\";i:38;s:14:\"id_subkategori\";i:42;s:20:\"nama_sub_subkategori\";s:17:\"Meja Receptionist\";s:10:\"created_at\";s:27:\"2026-03-02T03:15:25.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:15:25.000000Z\";}i:4;a:5:{s:18:\"id_sub_subkategori\";i:39;s:14:\"id_subkategori\";i:42;s:20:\"nama_sub_subkategori\";s:18:\"Meja Kerja Kubikal\";s:10:\"created_at\";s:27:\"2026-03-02T03:15:34.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:15:34.000000Z\";}i:5;a:5:{s:18:\"id_sub_subkategori\";i:40;s:14:\"id_subkategori\";i:42;s:20:\"nama_sub_subkategori\";s:23:\"Meja Kerja Konfirgurasi\";s:10:\"created_at\";s:27:\"2026-03-02T03:15:44.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:15:44.000000Z\";}i:6;a:5:{s:18:\"id_sub_subkategori\";i:41;s:14:\"id_subkategori\";i:42;s:20:\"nama_sub_subkategori\";s:10:\"Meja Rapat\";s:10:\"created_at\";s:27:\"2026-03-02T03:15:53.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:15:53.000000Z\";}i:7;a:5:{s:18:\"id_sub_subkategori\";i:42;s:14:\"id_subkategori\";i:42;s:20:\"nama_sub_subkategori\";s:14:\"Meja Serbaguna\";s:10:\"created_at\";s:27:\"2026-03-02T03:16:09.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:16:09.000000Z\";}i:8;a:5:{s:18:\"id_sub_subkategori\";i:43;s:14:\"id_subkategori\";i:42;s:20:\"nama_sub_subkategori\";s:13:\"Meja Komputer\";s:10:\"created_at\";s:27:\"2026-03-02T03:16:19.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:16:19.000000Z\";}i:9;a:5:{s:18:\"id_sub_subkategori\";i:44;s:14:\"id_subkategori\";i:42;s:20:\"nama_sub_subkategori\";s:11:\"Meja Podium\";s:10:\"created_at\";s:27:\"2026-03-02T03:16:26.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:16:26.000000Z\";}i:10;a:5:{s:18:\"id_sub_subkategori\";i:45;s:14:\"id_subkategori\";i:42;s:20:\"nama_sub_subkategori\";s:11:\"Meja Mimbar\";s:10:\"created_at\";s:27:\"2026-03-02T03:17:03.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:17:03.000000Z\";}i:11;a:5:{s:18:\"id_sub_subkategori\";i:90;s:14:\"id_subkategori\";i:42;s:20:\"nama_sub_subkategori\";s:10:\"Meja Kerja\";s:10:\"created_at\";s:27:\"2026-03-05T09:44:54.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-05T09:44:54.000000Z\";}}}i:1;a:6:{s:14:\"id_subkategori\";i:43;s:11:\"id_kategori\";i:1;s:16:\"nama_subkategori\";s:6:\"Lemari\";s:10:\"created_at\";s:27:\"2026-03-02T03:08:47.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:08:47.000000Z\";s:15:\"sub_subkategori\";a:5:{i:0;a:5:{s:18:\"id_sub_subkategori\";i:46;s:14:\"id_subkategori\";i:43;s:20:\"nama_sub_subkategori\";s:12:\"Lemari Arsip\";s:10:\"created_at\";s:27:\"2026-03-02T03:17:16.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:17:16.000000Z\";}i:1;a:5:{s:18:\"id_sub_subkategori\";i:47;s:14:\"id_subkategori\";i:43;s:20:\"nama_sub_subkategori\";s:14:\"Lemari Pakaian\";s:10:\"created_at\";s:27:\"2026-03-02T03:17:24.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:17:24.000000Z\";}i:2;a:5:{s:18:\"id_sub_subkategori\";i:48;s:14:\"id_subkategori\";i:43;s:20:\"nama_sub_subkategori\";s:19:\"Lemari Laboratorium\";s:10:\"created_at\";s:27:\"2026-03-02T03:17:38.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:17:38.000000Z\";}i:3;a:5:{s:18:\"id_sub_subkategori\";i:49;s:14:\"id_subkategori\";i:43;s:20:\"nama_sub_subkategori\";s:15:\"Filling Cabinet\";s:10:\"created_at\";s:27:\"2026-03-02T03:17:45.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:17:45.000000Z\";}i:4;a:5:{s:18:\"id_sub_subkategori\";i:50;s:14:\"id_subkategori\";i:43;s:20:\"nama_sub_subkategori\";s:6:\"Locker\";s:10:\"created_at\";s:27:\"2026-03-02T03:17:52.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:17:52.000000Z\";}}}i:2;a:6:{s:14:\"id_subkategori\";i:44;s:11:\"id_kategori\";i:1;s:16:\"nama_subkategori\";s:3:\"Rak\";s:10:\"created_at\";s:27:\"2026-03-02T03:08:59.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:08:59.000000Z\";s:15:\"sub_subkategori\";a:4:{i:0;a:5:{s:18:\"id_sub_subkategori\";i:51;s:14:\"id_subkategori\";i:44;s:20:\"nama_sub_subkategori\";s:8:\"Rak Buku\";s:10:\"created_at\";s:27:\"2026-03-02T03:18:01.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:18:01.000000Z\";}i:1;a:5:{s:18:\"id_sub_subkategori\";i:52;s:14:\"id_subkategori\";i:44;s:20:\"nama_sub_subkategori\";s:10:\"Rak Sepatu\";s:10:\"created_at\";s:27:\"2026-03-02T03:18:07.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:18:07.000000Z\";}i:2;a:5:{s:18:\"id_sub_subkategori\";i:53;s:14:\"id_subkategori\";i:44;s:20:\"nama_sub_subkategori\";s:8:\"Rak Besi\";s:10:\"created_at\";s:27:\"2026-03-02T03:18:16.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:18:16.000000Z\";}i:3;a:5:{s:18:\"id_sub_subkategori\";i:54;s:14:\"id_subkategori\";i:44;s:20:\"nama_sub_subkategori\";s:7:\"Divider\";s:10:\"created_at\";s:27:\"2026-03-02T03:18:25.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:18:25.000000Z\";}}}i:3;a:6:{s:14:\"id_subkategori\";i:45;s:11:\"id_kategori\";i:1;s:16:\"nama_subkategori\";s:4:\"Sofa\";s:10:\"created_at\";s:27:\"2026-03-02T03:09:07.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:09:07.000000Z\";s:15:\"sub_subkategori\";a:6:{i:0;a:5:{s:18:\"id_sub_subkategori\";i:55;s:14:\"id_subkategori\";i:45;s:20:\"nama_sub_subkategori\";s:13:\"Sofa 1 Seater\";s:10:\"created_at\";s:27:\"2026-03-02T03:18:37.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:18:37.000000Z\";}i:1;a:5:{s:18:\"id_sub_subkategori\";i:56;s:14:\"id_subkategori\";i:45;s:20:\"nama_sub_subkategori\";s:13:\"Sofa 2 Seater\";s:10:\"created_at\";s:27:\"2026-03-02T03:18:44.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:18:44.000000Z\";}i:2;a:5:{s:18:\"id_sub_subkategori\";i:57;s:14:\"id_subkategori\";i:45;s:20:\"nama_sub_subkategori\";s:13:\"Sofa 3 Seater\";s:10:\"created_at\";s:27:\"2026-03-02T03:18:50.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:18:50.000000Z\";}i:3;a:5:{s:18:\"id_sub_subkategori\";i:58;s:14:\"id_subkategori\";i:45;s:20:\"nama_sub_subkategori\";s:8:\"Sofa Bed\";s:10:\"created_at\";s:27:\"2026-03-02T03:18:59.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:18:59.000000Z\";}i:4;a:5:{s:18:\"id_sub_subkategori\";i:59;s:14:\"id_subkategori\";i:45;s:20:\"nama_sub_subkategori\";s:11:\"Sofa Corner\";s:10:\"created_at\";s:27:\"2026-03-02T03:19:06.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:19:06.000000Z\";}i:5;a:5:{s:18:\"id_sub_subkategori\";i:60;s:14:\"id_subkategori\";i:45;s:20:\"nama_sub_subkategori\";s:12:\"Stool / Puff\";s:10:\"created_at\";s:27:\"2026-03-02T03:19:13.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:19:13.000000Z\";}}}i:4;a:6:{s:14:\"id_subkategori\";i:46;s:11:\"id_kategori\";i:1;s:16:\"nama_subkategori\";s:5:\"Papan\";s:10:\"created_at\";s:27:\"2026-03-02T03:09:19.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:09:19.000000Z\";s:15:\"sub_subkategori\";a:2:{i:0;a:5:{s:18:\"id_sub_subkategori\";i:61;s:14:\"id_subkategori\";i:46;s:20:\"nama_sub_subkategori\";s:16:\"Papan Pengumunan\";s:10:\"created_at\";s:27:\"2026-03-02T03:19:25.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:19:25.000000Z\";}i:1;a:5:{s:18:\"id_sub_subkategori\";i:62;s:14:\"id_subkategori\";i:46;s:20:\"nama_sub_subkategori\";s:11:\"Papan Tulis\";s:10:\"created_at\";s:27:\"2026-03-02T03:19:32.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:19:32.000000Z\";}}}i:5;a:6:{s:14:\"id_subkategori\";i:47;s:11:\"id_kategori\";i:1;s:16:\"nama_subkategori\";s:5:\"Kursi\";s:10:\"created_at\";s:27:\"2026-03-02T03:09:31.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:09:31.000000Z\";s:15:\"sub_subkategori\";a:9:{i:0;a:5:{s:18:\"id_sub_subkategori\";i:63;s:14:\"id_subkategori\";i:47;s:20:\"nama_sub_subkategori\";s:14:\"Kursi Pimpinan\";s:10:\"created_at\";s:27:\"2026-03-02T03:19:40.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:19:40.000000Z\";}i:1;a:5:{s:18:\"id_sub_subkategori\";i:64;s:14:\"id_subkategori\";i:47;s:20:\"nama_sub_subkategori\";s:15:\"Kursi Serbaguna\";s:10:\"created_at\";s:27:\"2026-03-02T03:19:48.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:19:48.000000Z\";}i:2;a:5:{s:18:\"id_sub_subkategori\";i:65;s:14:\"id_subkategori\";i:47;s:20:\"nama_sub_subkategori\";s:16:\"Kursi Auditorium\";s:10:\"created_at\";s:27:\"2026-03-02T03:19:58.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:19:58.000000Z\";}i:3;a:5:{s:18:\"id_sub_subkategori\";i:66;s:14:\"id_subkategori\";i:47;s:20:\"nama_sub_subkategori\";s:13:\"Kursi Theater\";s:10:\"created_at\";s:27:\"2026-03-02T03:20:08.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:20:08.000000Z\";}i:4;a:5:{s:18:\"id_sub_subkategori\";i:67;s:14:\"id_subkategori\";i:47;s:20:\"nama_sub_subkategori\";s:12:\"Kursi Tunggu\";s:10:\"created_at\";s:27:\"2026-03-02T03:20:15.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:20:15.000000Z\";}i:5;a:5:{s:18:\"id_sub_subkategori\";i:68;s:14:\"id_subkategori\";i:47;s:20:\"nama_sub_subkategori\";s:15:\"Kursi Bar Stool\";s:10:\"created_at\";s:27:\"2026-03-02T03:20:22.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:20:22.000000Z\";}i:6;a:5:{s:18:\"id_sub_subkategori\";i:69;s:14:\"id_subkategori\";i:47;s:20:\"nama_sub_subkategori\";s:12:\"Kursi Lounge\";s:10:\"created_at\";s:27:\"2026-03-02T03:20:31.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:20:31.000000Z\";}i:7;a:5:{s:18:\"id_sub_subkategori\";i:70;s:14:\"id_subkategori\";i:47;s:20:\"nama_sub_subkategori\";s:12:\"Kursi Gaming\";s:10:\"created_at\";s:27:\"2026-03-02T03:20:44.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:20:44.000000Z\";}i:8;a:5:{s:18:\"id_sub_subkategori\";i:71;s:14:\"id_subkategori\";i:47;s:20:\"nama_sub_subkategori\";s:11:\"Kursi Staff\";s:10:\"created_at\";s:27:\"2026-03-02T03:20:54.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:20:54.000000Z\";}}}i:6;a:6:{s:14:\"id_subkategori\";i:48;s:11:\"id_kategori\";i:1;s:16:\"nama_subkategori\";s:17:\"Furniture Lainnya\";s:10:\"created_at\";s:27:\"2026-03-02T03:09:39.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:09:39.000000Z\";s:15:\"sub_subkategori\";a:10:{i:0;a:5:{s:18:\"id_sub_subkategori\";i:72;s:14:\"id_subkategori\";i:48;s:20:\"nama_sub_subkategori\";s:9:\"Pot Bunga\";s:10:\"created_at\";s:27:\"2026-03-02T03:21:07.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:21:07.000000Z\";}i:1;a:5:{s:18:\"id_sub_subkategori\";i:73;s:14:\"id_subkategori\";i:48;s:20:\"nama_sub_subkategori\";s:13:\"Tempat Sampah\";s:10:\"created_at\";s:27:\"2026-03-02T03:21:16.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:21:16.000000Z\";}i:2;a:5:{s:18:\"id_sub_subkategori\";i:74;s:14:\"id_subkategori\";i:48;s:20:\"nama_sub_subkategori\";s:5:\"Rehal\";s:10:\"created_at\";s:27:\"2026-03-02T03:21:22.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:21:22.000000Z\";}i:3;a:5:{s:18:\"id_sub_subkategori\";i:75;s:14:\"id_subkategori\";i:48;s:20:\"nama_sub_subkategori\";s:6:\"Sutrah\";s:10:\"created_at\";s:27:\"2026-03-02T03:21:28.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:21:28.000000Z\";}i:4;a:5:{s:18:\"id_sub_subkategori\";i:76;s:14:\"id_subkategori\";i:48;s:20:\"nama_sub_subkategori\";s:6:\"Cermin\";s:10:\"created_at\";s:27:\"2026-03-02T03:21:49.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:21:49.000000Z\";}i:5;a:5:{s:18:\"id_sub_subkategori\";i:77;s:14:\"id_subkategori\";i:48;s:20:\"nama_sub_subkategori\";s:23:\"Patung Garuda Pancasila\";s:10:\"created_at\";s:27:\"2026-03-02T03:22:02.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:22:02.000000Z\";}i:6;a:5:{s:18:\"id_sub_subkategori\";i:78;s:14:\"id_subkategori\";i:48;s:20:\"nama_sub_subkategori\";s:13:\"Foto Presiden\";s:10:\"created_at\";s:27:\"2026-03-02T03:22:09.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:22:09.000000Z\";}i:7;a:5:{s:18:\"id_sub_subkategori\";i:79;s:14:\"id_subkategori\";i:48;s:20:\"nama_sub_subkategori\";s:13:\"Tiang Bendera\";s:10:\"created_at\";s:27:\"2026-03-02T03:22:17.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:22:17.000000Z\";}i:8;a:5:{s:18:\"id_sub_subkategori\";i:80;s:14:\"id_subkategori\";i:48;s:20:\"nama_sub_subkategori\";s:16:\"PC Tray Komputer\";s:10:\"created_at\";s:27:\"2026-03-02T03:22:29.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:22:29.000000Z\";}i:9;a:5:{s:18:\"id_sub_subkategori\";i:89;s:14:\"id_subkategori\";i:48;s:20:\"nama_sub_subkategori\";s:12:\"Tempat Tidur\";s:10:\"created_at\";s:27:\"2026-03-02T03:29:12.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:29:12.000000Z\";}}}}}i:1;a:6:{s:11:\"id_kategori\";i:2;s:13:\"nama_kategori\";s:20:\"Furniture Pendidikan\";s:13:\"icon_kategori\";s:31:\"kategori/furniturekesiswaan.svg\";s:10:\"created_at\";s:27:\"2026-02-12T06:16:15.000000Z\";s:10:\"updated_at\";s:27:\"2026-02-27T04:20:42.000000Z\";s:11:\"subkategori\";a:4:{i:0;a:6:{s:14:\"id_subkategori\";i:49;s:11:\"id_kategori\";i:2;s:16:\"nama_subkategori\";s:5:\"Kursi\";s:10:\"created_at\";s:27:\"2026-03-02T03:09:52.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:09:52.000000Z\";s:15:\"sub_subkategori\";a:2:{i:0;a:5:{s:18:\"id_sub_subkategori\";i:81;s:14:\"id_subkategori\";i:49;s:20:\"nama_sub_subkategori\";s:11:\"Kursi Siswa\";s:10:\"created_at\";s:27:\"2026-03-02T03:22:38.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:22:38.000000Z\";}i:1;a:5:{s:18:\"id_sub_subkategori\";i:82;s:14:\"id_subkategori\";i:49;s:20:\"nama_sub_subkategori\";s:12:\"Kursi Kuliah\";s:10:\"created_at\";s:27:\"2026-03-02T03:22:44.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:22:44.000000Z\";}}}i:1;a:6:{s:14:\"id_subkategori\";i:50;s:11:\"id_kategori\";i:2;s:16:\"nama_subkategori\";s:6:\"Lemari\";s:10:\"created_at\";s:27:\"2026-03-02T03:10:02.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:10:02.000000Z\";s:15:\"sub_subkategori\";a:2:{i:0;a:5:{s:18:\"id_sub_subkategori\";i:83;s:14:\"id_subkategori\";i:50;s:20:\"nama_sub_subkategori\";s:15:\"Lemari Tas Paud\";s:10:\"created_at\";s:27:\"2026-03-02T03:23:06.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:23:06.000000Z\";}i:1;a:5:{s:18:\"id_sub_subkategori\";i:84;s:14:\"id_subkategori\";i:50;s:20:\"nama_sub_subkategori\";s:17:\"Lermari File Paud\";s:10:\"created_at\";s:27:\"2026-03-02T03:23:13.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:23:13.000000Z\";}}}i:2;a:6:{s:14:\"id_subkategori\";i:51;s:11:\"id_kategori\";i:2;s:16:\"nama_subkategori\";s:3:\"Rak\";s:10:\"created_at\";s:27:\"2026-03-02T03:10:11.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:10:11.000000Z\";s:15:\"sub_subkategori\";a:1:{i:0;a:5:{s:18:\"id_sub_subkategori\";i:85;s:14:\"id_subkategori\";i:51;s:20:\"nama_sub_subkategori\";s:13:\"Rak Buku Paud\";s:10:\"created_at\";s:27:\"2026-03-02T03:23:21.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:23:21.000000Z\";}}}i:3;a:6:{s:14:\"id_subkategori\";i:52;s:11:\"id_kategori\";i:2;s:16:\"nama_subkategori\";s:4:\"Meja\";s:10:\"created_at\";s:27:\"2026-03-02T03:10:18.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:10:18.000000Z\";s:15:\"sub_subkategori\";a:3:{i:0;a:5:{s:18:\"id_sub_subkategori\";i:86;s:14:\"id_subkategori\";i:52;s:20:\"nama_sub_subkategori\";s:17:\"Meja Belajar Paud\";s:10:\"created_at\";s:27:\"2026-03-02T03:23:28.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:23:28.000000Z\";}i:1;a:5:{s:18:\"id_sub_subkategori\";i:87;s:14:\"id_subkategori\";i:52;s:20:\"nama_sub_subkategori\";s:10:\"Meja Siswa\";s:10:\"created_at\";s:27:\"2026-03-02T03:23:36.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:23:36.000000Z\";}i:2;a:5:{s:18:\"id_sub_subkategori\";i:88;s:14:\"id_subkategori\";i:52;s:20:\"nama_sub_subkategori\";s:9:\"Meja Baca\";s:10:\"created_at\";s:27:\"2026-03-02T03:23:42.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:23:42.000000Z\";}}}}}i:2;a:6:{s:11:\"id_kategori\";i:3;s:13:\"nama_kategori\";s:21:\"Peralatan Pendidikan \";s:13:\"icon_kategori\";s:32:\"kategori/peralatanpendidikan.svg\";s:10:\"created_at\";s:27:\"2026-02-12T06:16:15.000000Z\";s:10:\"updated_at\";s:27:\"2026-02-12T06:16:15.000000Z\";s:11:\"subkategori\";a:1:{i:0;a:6:{s:14:\"id_subkategori\";i:53;s:11:\"id_kategori\";i:3;s:16:\"nama_subkategori\";s:19:\"Alat Peraga Edukasi\";s:10:\"created_at\";s:27:\"2026-03-02T03:10:27.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:10:27.000000Z\";s:15:\"sub_subkategori\";a:0:{}}}}i:3;a:6:{s:11:\"id_kategori\";i:4;s:13:\"nama_kategori\";s:18:\"Mesin dan Perkakas\";s:13:\"icon_kategori\";s:29:\"kategori/mesindanperkakas.svg\";s:10:\"created_at\";s:27:\"2026-02-12T06:16:15.000000Z\";s:10:\"updated_at\";s:27:\"2026-02-12T06:16:15.000000Z\";s:11:\"subkategori\";a:4:{i:0;a:6:{s:14:\"id_subkategori\";i:59;s:11:\"id_kategori\";i:4;s:16:\"nama_subkategori\";s:6:\"Genset\";s:10:\"created_at\";s:27:\"2026-03-02T03:11:24.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:11:24.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:1;a:6:{s:14:\"id_subkategori\";i:60;s:11:\"id_kategori\";i:4;s:16:\"nama_subkategori\";s:8:\"Chainsaw\";s:10:\"created_at\";s:27:\"2026-03-02T03:11:30.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:11:30.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:2;a:6:{s:14:\"id_subkategori\";i:61;s:11:\"id_kategori\";i:4;s:16:\"nama_subkategori\";s:15:\"Mesin Trafo Las\";s:10:\"created_at\";s:27:\"2026-03-02T03:11:37.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:11:37.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:3;a:6:{s:14:\"id_subkategori\";i:62;s:11:\"id_kategori\";i:4;s:16:\"nama_subkategori\";s:11:\"Toolkit Set\";s:10:\"created_at\";s:27:\"2026-03-02T03:11:44.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:11:44.000000Z\";s:15:\"sub_subkategori\";a:0:{}}}}i:4;a:6:{s:11:\"id_kategori\";i:5;s:13:\"nama_kategori\";s:15:\"Peralatan Dapur\";s:13:\"icon_kategori\";s:26:\"kategori/perlatandapur.svg\";s:10:\"created_at\";s:27:\"2026-02-12T06:16:15.000000Z\";s:10:\"updated_at\";s:27:\"2026-02-12T06:16:15.000000Z\";s:11:\"subkategori\";a:5:{i:0;a:6:{s:14:\"id_subkategori\";i:54;s:11:\"id_kategori\";i:5;s:16:\"nama_subkategori\";s:15:\"Kompor Gas Oven\";s:10:\"created_at\";s:27:\"2026-03-02T03:10:38.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:10:38.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:1;a:6:{s:14:\"id_subkategori\";i:55;s:11:\"id_kategori\";i:5;s:16:\"nama_subkategori\";s:4:\"Oven\";s:10:\"created_at\";s:27:\"2026-03-02T03:10:46.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:10:46.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:2;a:6:{s:14:\"id_subkategori\";i:56;s:11:\"id_kategori\";i:5;s:16:\"nama_subkategori\";s:15:\"Mixer Planetary\";s:10:\"created_at\";s:27:\"2026-03-02T03:10:54.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:10:54.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:3;a:6:{s:14:\"id_subkategori\";i:57;s:11:\"id_kategori\";i:5;s:16:\"nama_subkategori\";s:14:\"Mesin Pemotong\";s:10:\"created_at\";s:27:\"2026-03-02T03:11:07.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:11:07.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:4;a:6:{s:14:\"id_subkategori\";i:58;s:11:\"id_kategori\";i:5;s:16:\"nama_subkategori\";s:11:\"Kwali Range\";s:10:\"created_at\";s:27:\"2026-03-02T03:11:14.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:11:14.000000Z\";s:15:\"sub_subkategori\";a:0:{}}}}i:5;a:6:{s:11:\"id_kategori\";i:6;s:13:\"nama_kategori\";s:20:\"Peralatan Elektronik\";s:13:\"icon_kategori\";s:32:\"kategori/peralatanelektronik.svg\";s:10:\"created_at\";s:27:\"2026-02-12T06:16:15.000000Z\";s:10:\"updated_at\";s:27:\"2026-02-12T06:16:15.000000Z\";s:11:\"subkategori\";a:7:{i:0;a:6:{s:14:\"id_subkategori\";i:63;s:11:\"id_kategori\";i:6;s:16:\"nama_subkategori\";s:6:\"Laptop\";s:10:\"created_at\";s:27:\"2026-03-02T03:11:58.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:11:58.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:1;a:6:{s:14:\"id_subkategori\";i:64;s:11:\"id_kategori\";i:6;s:16:\"nama_subkategori\";s:11:\"Komputer PC\";s:10:\"created_at\";s:27:\"2026-03-02T03:12:06.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:12:06.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:2;a:6:{s:14:\"id_subkategori\";i:65;s:11:\"id_kategori\";i:6;s:16:\"nama_subkategori\";s:3:\"UPS\";s:10:\"created_at\";s:27:\"2026-03-02T03:12:15.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:12:15.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:3;a:6:{s:14:\"id_subkategori\";i:66;s:11:\"id_kategori\";i:6;s:16:\"nama_subkategori\";s:7:\"Printer\";s:10:\"created_at\";s:27:\"2026-03-02T03:12:23.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:12:23.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:4;a:6:{s:14:\"id_subkategori\";i:67;s:11:\"id_kategori\";i:6;s:16:\"nama_subkategori\";s:20:\"Air Conditioner (AC)\";s:10:\"created_at\";s:27:\"2026-03-02T03:12:31.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:12:31.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:5;a:6:{s:14:\"id_subkategori\";i:68;s:11:\"id_kategori\";i:6;s:16:\"nama_subkategori\";s:10:\"Video Wall\";s:10:\"created_at\";s:27:\"2026-03-02T03:12:37.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:12:37.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:6;a:6:{s:14:\"id_subkategori\";i:69;s:11:\"id_kategori\";i:6;s:16:\"nama_subkategori\";s:4:\"CCTV\";s:10:\"created_at\";s:27:\"2026-03-02T03:13:06.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:13:06.000000Z\";s:15:\"sub_subkategori\";a:0:{}}}}i:6;a:6:{s:11:\"id_kategori\";i:8;s:13:\"nama_kategori\";s:17:\"Peralatan AID Kit\";s:13:\"icon_kategori\";s:30:\"kategori/peralatan-aid-kit.png\";s:10:\"created_at\";s:27:\"2026-03-02T03:06:07.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:06:07.000000Z\";s:11:\"subkategori\";a:10:{i:0;a:6:{s:14:\"id_subkategori\";i:70;s:11:\"id_kategori\";i:8;s:16:\"nama_subkategori\";s:13:\"Paket Sembako\";s:10:\"created_at\";s:27:\"2026-03-02T03:13:22.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:13:22.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:1;a:6:{s:14:\"id_subkategori\";i:71;s:11:\"id_kategori\";i:8;s:16:\"nama_subkategori\";s:12:\"Survival Kit\";s:10:\"created_at\";s:27:\"2026-03-02T03:13:32.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:13:32.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:2;a:6:{s:14:\"id_subkategori\";i:72;s:11:\"id_kategori\";i:8;s:16:\"nama_subkategori\";s:11:\"Kasur Lipat\";s:10:\"created_at\";s:27:\"2026-03-02T03:13:38.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:13:38.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:3;a:6:{s:14:\"id_subkategori\";i:73;s:11:\"id_kategori\";i:8;s:16:\"nama_subkategori\";s:16:\"Pakaian Lapangan\";s:10:\"created_at\";s:27:\"2026-03-02T03:13:48.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:13:48.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:4;a:6:{s:14:\"id_subkategori\";i:74;s:11:\"id_kategori\";i:8;s:16:\"nama_subkategori\";s:7:\"Selimut\";s:10:\"created_at\";s:27:\"2026-03-02T03:13:53.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:13:53.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:5;a:6:{s:14:\"id_subkategori\";i:75;s:11:\"id_kategori\";i:8;s:16:\"nama_subkategori\";s:9:\"Jas Hujan\";s:10:\"created_at\";s:27:\"2026-03-02T03:13:59.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:13:59.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:6;a:6:{s:14:\"id_subkategori\";i:76;s:11:\"id_kategori\";i:8;s:16:\"nama_subkategori\";s:6:\"Velbed\";s:10:\"created_at\";s:27:\"2026-03-02T03:14:06.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:14:06.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:7;a:6:{s:14:\"id_subkategori\";i:77;s:11:\"id_kategori\";i:8;s:16:\"nama_subkategori\";s:6:\"Geobag\";s:10:\"created_at\";s:27:\"2026-03-02T03:14:21.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:14:21.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:8;a:6:{s:14:\"id_subkategori\";i:78;s:11:\"id_kategori\";i:8;s:16:\"nama_subkategori\";s:6:\"Matras\";s:10:\"created_at\";s:27:\"2026-03-02T03:14:31.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:14:31.000000Z\";s:15:\"sub_subkategori\";a:0:{}}i:9;a:6:{s:14:\"id_subkategori\";i:79;s:11:\"id_kategori\";i:8;s:16:\"nama_subkategori\";s:16:\"Paket Kebersihan\";s:10:\"created_at\";s:27:\"2026-03-02T03:14:43.000000Z\";s:10:\"updated_at\";s:27:\"2026-03-02T03:14:43.000000Z\";s:15:\"sub_subkategori\";a:0:{}}}}}', 1774958711);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Pendidikan', 'Meja, Kursi, Papan Tulis, dll', 'uploads/categories/1773390648.png', 1, 1, '2026-03-13 01:23:15', '2026-03-13 01:30:48'),
(2, 'Kantor', 'Meja Kerja, Kursi Kantor, Filing Cabinet, dll', 'uploads/categories/1773390663.png', 2, 1, '2026-03-13 01:23:15', '2026-03-13 01:31:03'),
(3, 'Kesehatan', 'Tempat Tidur Pasien, Alat Medis, dll', 'uploads/categories/1773390680.png', 3, 1, '2026-03-13 01:23:15', '2026-03-13 01:31:20');

-- --------------------------------------------------------

--
-- Table structure for table `company_profiles`
--

CREATE TABLE `company_profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_dark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `social_media` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `company_profiles`
--

INSERT INTO `company_profiles` (`id`, `company_name`, `description`, `image`, `logo`, `logo_dark`, `email`, `phone`, `address`, `social_media`, `created_at`, `updated_at`) VALUES
(1, 'PT. Aro Baskara Esa', 'Perusahaan penyedia solusi barang terintegrasi yang berdedikasi menjadi mitra strategis bagi sektor swasta maupun instansi pemerintah di seluruh indonesia.', 'uploads/1773390371.png', 'uploads/1773390371_logo.png', 'uploads/1773631215_logo_dark.png', 'arobaskara@gmail.com', '(021) 38835187', 'Jl. Melawai 5, RT.3/RW.1, Melawai, Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12160', '{\"facebook\":\"https:\\/\\/facebook.com\\/solusibisnis\",\"twitter\":\"https:\\/\\/twitter.com\\/solusibisnis\",\"instagram\":\"https:\\/\\/instagram.com\\/solusibisnis\",\"linkedin\":\"https:\\/\\/linkedin.com\\/company\\/solusibisnis\"}', '2026-03-13 01:23:15', '2026-03-15 20:22:33'),
(2, 'PT. Solusi Bisnis Indonesia', 'Kami adalah perusahaan yang berkomitmen untuk memberikan solusi terbaik untuk kebutuhan bisnis Anda. Dengan pengalaman lebih dari 10 tahun, kami telah membantu ratusan perusahaan dan instansi untuk meningkatkan efisiensi operasional mereka.', 'uploads/company-image.jpg', 'uploads/company-logo.png', NULL, 'info@solusibisnis.com', '+62 21 1234 5678', 'Jl. Sudirman No. 123, Jakarta Pusat, Indonesia', '{\"facebook\":\"https:\\/\\/facebook.com\\/solusibisnis\",\"twitter\":\"https:\\/\\/twitter.com\\/solusibisnis\",\"instagram\":\"https:\\/\\/instagram.com\\/solusibisnis\",\"linkedin\":\"https:\\/\\/linkedin.com\\/company\\/solusibisnis\"}', '2026-03-29 21:32:48', '2026-03-29 21:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `contact_sections`
--

CREATE TABLE `contact_sections` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `question` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int UNSIGNED NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Apa saja layanan yang disediakan oleh perusahaan?', 'Perusahaan menyediakan berbagai layanan seperti instalasi sistem, pengembangan software, konsultasi teknologi, serta pelatihan di bidang teknologi informasi untuk mendukung kebutuhan klien.', 1, 1, '2026-03-29 21:32:48', '2026-03-29 21:34:33'),
(2, 'Bagaimana cara melakukan pemesanan produk atau layanan?', 'Anda dapat melakukan pemesanan melalui tim sales kami via email, telepon, atau WhatsApp. Tim kami akan membantu proses kebutuhan, penawaran, hingga tahap pengadaan.', 2, 1, '2026-03-29 21:32:48', '2026-03-29 21:32:48'),
(3, 'Bagaimana cara menghubungi tim perusahaan?', 'Silakan hubungi kami melalui email arobaskara@gmail.com, telepon (021) 38835187, atau WhatsApp +62 822-8888-6009 pada jam kerja.', 3, 1, '2026-03-29 21:32:48', '2026-03-29 21:32:48'),
(4, 'Apakah perusahaan menyediakan layanan pelatihan atau workshop?', 'Ya, kami menyediakan pelatihan dan workshop sesuai kebutuhan implementasi sistem agar tim Anda dapat menggunakan solusi secara maksimal.', 4, 1, '2026-03-29 21:32:48', '2026-03-29 21:32:48'),
(5, 'Apakah perusahaan menyediakan layanan konsultasi teknologi?', 'Ya, kami menyediakan layanan konsultasi teknologi untuk membantu perencanaan, pemilihan solusi, hingga strategi implementasi yang tepat.', 5, 1, '2026-03-29 21:32:48', '2026-03-29 21:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint UNSIGNED NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `links` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `section`, `content`, `links`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'about', 'PT. Solusi Bisnis Indonesia adalah perusahaan terpercaya yang menyediakan solusi lengkap untuk kebutuhan operasional bisnis dan instansi.', NULL, 1, 1, '2026-03-13 01:23:15', '2026-03-13 01:23:15'),
(2, 'quick_links', 'Tentang Kami,Produk,Aktivitas,Karir,FAQ', '{\"Tentang Kami\":\"#tentang\",\"Produk\":\"#produk\",\"Aktivitas\":\"#aktivitas\",\"Karir\":\"#karir\",\"FAQ\":\"#faq\"}', 2, 1, '2026-03-13 01:23:15', '2026-03-13 01:23:15'),
(3, 'contact', 'Jl. Sudirman No. 123, Jakarta Pusat, Indonesia | +62 21 1234 5678 | info@solusibisnis.com', NULL, 3, 1, '2026-03-13 01:23:15', '2026-03-13 01:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint UNSIGNED NOT NULL,
  `job_vacancy_id` bigint UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_education` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `years_of_experience` int NOT NULL,
  `previous_job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_letter` text COLLATE utf8mb4_unicode_ci,
  `resume_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','reviewed','accepted','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'asdasdasd', '2026-03-29 20:59:41', '2026-03-29 20:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `job_vacancies`
--

CREATE TABLE `job_vacancies` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('full_time','part_time','internship','freelance') COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` bigint DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsibility` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_category_id` bigint UNSIGNED NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_vacancies`
--

INSERT INTO `job_vacancies` (`id`, `name`, `type`, `experience`, `salary`, `description`, `responsibility`, `qualification`, `location`, `job_category_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BERSIHBERSIH', 'full_time', '123123', NULL, 'asdasd', 'asdasd', 'asdasd', 'asdasdasd', 1, 'active', '2026-03-29 21:00:02', '2026-03-29 21:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `legalities`
--

CREATE TABLE `legalities` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `legalities`
--

INSERT INTO `legalities` (`id`, `title`, `description`, `icon`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Legalitas Resmi', 'Terdaftar dan memiliki izin usaha lengkap sesuai regulasi nasional.', 'fas fa-certificate', 1, 1, '2026-03-13 01:23:15', '2026-03-13 01:23:15'),
(2, 'Sertifikasi ISO', 'Bersertifikat ISO 9001:2015 untuk sistem manajemen mutu.', 'fas fa-award', 2, 1, '2026-03-13 01:23:15', '2026-03-13 01:23:15'),
(3, 'Kepatuhan Pajak', 'Selalu mematuhi kewajiban perpajakan sesuai peraturan berlaku.', 'fas fa-shield-alt', 3, 1, '2026-03-13 01:23:15', '2026-03-13 01:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_03_13_065347_create_banners_table', 1),
(5, '2026_03_13_065347_create_company_profiles_table', 1),
(6, '2026_03_13_065356_create_categories_table', 1),
(7, '2026_03_13_065357_create_legalities_table', 1),
(8, '2026_03_13_065403_create_work_processes_table', 1),
(9, '2026_03_13_065404_create_partners_table', 1),
(10, '2026_03_13_065406_create_platforms_table', 1),
(11, '2026_03_13_065406_create_products_table', 1),
(12, '2026_03_13_065408_create_footers_table', 1),
(13, '2026_03_16_031608_add_logo_dark_to_company_profiles_table', 2),
(14, '2026_03_16_140000_add_banner_content_fields', 3),
(15, '2026_03_25_170931_create_contact_sections_table', 4),
(16, '2026_03_25_173054_create_team_members_table', 4),
(17, '2026_03_26_023616_create_visi_misis_table', 4),
(18, '2026_03_26_031413_create_statistics_table', 4),
(19, '2026_03_26_034555_add_division_to_team_members_table', 4),
(20, '2026_03_26_035955_create_brands_table', 4),
(21, '2026_03_19_100008_create_aktivitas_table', 5),
(22, '2026_03_25_042836_create_job_categories_table', 5),
(23, '2026_03_25_042916_create_job_vacancies_table', 5),
(24, '2026_03_25_080637_create_benefits_table', 5),
(25, '2026_03_26_035852_create_job_applications_table', 5),
(26, '2026_03_26_152947_create_partners_table', 6),
(27, '2026_03_27_083500_fix_visi_misi_description_column', 6),
(28, '2026_03_30_100000_create_faqs_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `logo`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'Brand B', 'uploads/partners/1773394533.png', 2, 1, '2026-03-13 01:23:15', '2026-03-13 02:35:33'),
(3, 'Brand C', 'uploads/partners/1773394557.png', 3, 1, '2026-03-13 01:23:15', '2026-03-13 02:35:57'),
(4, 'Brand D', 'uploads/partners/1773394608.png', 4, 1, '2026-03-13 01:23:15', '2026-03-13 02:36:48'),
(5, 'Brand E', 'uploads/partners/1773394630.png', 5, 1, '2026-03-13 01:23:15', '2026-03-13 02:37:10');

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
-- Table structure for table `platforms`
--

CREATE TABLE `platforms` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `platform_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `platforms`
--

INSERT INTO `platforms` (`id`, `title`, `description`, `platform_url`, `image`, `features`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Platform E-Commerce', 'Platform e-commerce one-stop-shopping untuk kebutuhan bisnis.', 'https://ayobelanja.co.id', 'uploads/platforms/1773397292.png', '[\"Beragam produk berkualitas\",\"Sistem pembelian cepat\",\"Pengiriman ke seluruh Indonesia\",\"Dukungan layanan profesional\"]', 1, '2026-03-13 01:23:15', '2026-03-13 03:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` decimal(3,2) NOT NULL DEFAULT '0.00',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `location`, `rating`, `type`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Meja Kantor Executive', 'Meja kerja premium dengan desain modern dan material berkualitas tinggi.', 'uploads/products/meja-kantor.jpg', 'Jakarta', 4.80, 'Meja Kantor', 1, '2026-03-13 01:23:15', '2026-03-13 01:23:15'),
(2, 'Kursi Direktur Ergonomis', 'Kursi dengan dukungan punggung yang nyaman untuk produktivitas maksimal.', 'uploads/products/kursi-direktur.jpg', 'Surabaya', 4.60, 'Kursi Kantor', 1, '2026-03-13 01:23:15', '2026-03-13 01:23:15'),
(3, 'Papan Tulis Interaktif', 'Papan tulis digital dengan fitur touchscreen untuk presentasi modern.', 'uploads/products/papan-tulis.jpg', 'Bandung', 4.90, 'Alat Tulis', 1, '2026-03-13 01:23:15', '2026-03-13 01:23:15'),
(4, 'Filing Cabinet 4 Laci', 'Rak penyimpanan dokumen dengan sistem keamanan terpadu.', 'uploads/products/filing-cabinet.jpg', 'Medan', 4.50, 'Penyimpanan', 1, '2026-03-13 01:23:15', '2026-03-13 01:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('988LkPl8mX5lEeRqggA4eYDW5bdOAazkwUJ2AYM3', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiakx5M0NaM1UzOFR0VVdGaTUzOEVZMnJqR2Y3dWtZd2pXRW5yb1llNyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9wcm9kdWsiO3M6NToicm91dGUiO3M6MTM6InByb2R1Y3RzLnBhZ2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1774957185),
('9DjreR51aDdsxXhW8GrJMi0dUSmSwGttPJwfESAD', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidGlqclI3WVFud1RkaDluTVhKOFhwbDVTWnA4dW01U0x1TWhwMlVCeSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1775044359),
('skSyUfkxlqNPgDblZDMGWYxWQWzILkAHvKx1KkNZ', NULL, '192.168.1.2', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUDI5b2NvSU5mdGtJcnBaUFE2Rm5RMmtEOGM0d3FaOWVUV0JzMHFUSSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xOTIuMTY4LjEuMTM6ODAwMS9wcm9kdWN0IjtzOjU6InJvdXRlIjtzOjEyOiJwcm9kdWN0LnBhZ2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1774952665);

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int NOT NULL,
  `suffix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`id`, `title`, `value`, `suffix`, `icon`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'testing', 1, 'asdasd', 'statistics/3q3czSHcy0utCj2juw4hJJMA0hDMMHLAKPFjN1yf.png', 1, 1, '2026-03-29 20:50:20', '2026-03-29 20:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `name`, `position`, `photo`, `order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'joko', 'Paniop BUMI', 'team/lxMY5bClWOx9CP7mhgu8YNKimKeA15hhFD9w61Em.png', 1, 1, '2026-03-29 20:56:42', '2026-03-29 20:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visi_misis`
--

CREATE TABLE `visi_misis` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visi_misis`
--

INSERT INTO `visi_misis` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'visi', 'sdasdasdddddddddddddddsdasdasdddddddddddddddsdasdasdddddddddddddddsdasdasdddddddddddddddsdasdasdddddddddddddddsdasdasdddddddddddddddsdasdasdddddddddddddddsdasdasdddddddddddddddsdasdasddddddddddddddd', '2026-03-29 20:52:34', '2026-03-29 20:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `work_processes`
--

CREATE TABLE `work_processes` (
  `id` bigint UNSIGNED NOT NULL,
  `step_number` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_processes`
--

INSERT INTO `work_processes` (`id`, `step_number`, `title`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Konsultasi', 'Diskusi kebutuhan produk dan anggaran bersama tim ahli.', 1, '2026-03-13 01:23:15', '2026-03-13 01:23:15'),
(2, 2, 'Penawaran', 'Memberikan penawaran harga sesuai kebutuhan.', 1, '2026-03-13 01:23:15', '2026-03-13 01:23:15'),
(3, 3, 'Persetujuan', 'Konfirmasi pesanan dan kesepakatan.', 1, '2026-03-13 01:23:15', '2026-03-13 01:23:15'),
(4, 4, 'Pengiriman', 'Produk dikirim ke lokasi.', 1, '2026-03-13 01:23:15', '2026-03-13 01:23:15'),
(5, 5, 'Dukungan', 'Layanan purna jual dan dukungan teknis.', 1, '2026-03-13 01:23:15', '2026-03-13 01:23:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_profiles`
--
ALTER TABLE `company_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_sections`
--
ALTER TABLE `contact_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_reserved_at_available_at_index` (`queue`,`reserved_at`,`available_at`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applications_job_vacancy_id_foreign` (`job_vacancy_id`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_vacancies`
--
ALTER TABLE `job_vacancies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_vacancies_job_category_id_foreign` (`job_category_id`);

--
-- Indexes for table `legalities`
--
ALTER TABLE `legalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `platforms`
--
ALTER TABLE `platforms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visi_misis`
--
ALTER TABLE `visi_misis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_processes`
--
ALTER TABLE `work_processes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `benefits`
--
ALTER TABLE `benefits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_profiles`
--
ALTER TABLE `company_profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_sections`
--
ALTER TABLE `contact_sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_vacancies`
--
ALTER TABLE `job_vacancies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `legalities`
--
ALTER TABLE `legalities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `platforms`
--
ALTER TABLE `platforms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visi_misis`
--
ALTER TABLE `visi_misis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `work_processes`
--
ALTER TABLE `work_processes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_job_vacancy_id_foreign` FOREIGN KEY (`job_vacancy_id`) REFERENCES `job_vacancies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_vacancies`
--
ALTER TABLE `job_vacancies`
  ADD CONSTRAINT `job_vacancies_job_category_id_foreign` FOREIGN KEY (`job_category_id`) REFERENCES `job_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
