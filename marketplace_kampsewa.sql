-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2024 at 03:12 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace_kampsewa`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_lainnya` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`id`, `id_user`, `longitude`, `latitude`, `detail_lainnya`, `type`, `created_at`, `updated_at`) VALUES
(1, 2, '114.2791699', ' -8.319524', 'RT01, RW02', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `balas_feedback`
--

CREATE TABLE `balas_feedback` (
  `id` bigint UNSIGNED NOT NULL,
  `id_feedback` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `balasan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `rekening` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_iklan`
--

CREATE TABLE `detail_iklan` (
  `id` bigint UNSIGNED NOT NULL,
  `id_iklan` bigint UNSIGNED NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `harga_iklan` int NOT NULL,
  `status_iklan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_penyewaan`
--

CREATE TABLE `detail_penyewaan` (
  `id` bigint UNSIGNED NOT NULL,
  `id_penyewaan` bigint UNSIGNED NOT NULL,
  `id_produk` bigint UNSIGNED NOT NULL,
  `warna_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int NOT NULL,
  `subtotal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_penyewaan`
--

INSERT INTO `detail_penyewaan` (`id`, `id_penyewaan`, `id_produk`, `warna_produk`, `ukuran`, `qty`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Merah', 'XL', 2, 120000, '2024-06-17 23:58:03', '2024-06-17 23:58:03'),
(2, 1, 1, 'Merah', 'L', 2, 100000, '2024-06-17 23:58:03', '2024-06-17 23:58:03'),
(3, 1, 2, 'Merah', 'XL', 10, 400000, '2024-06-17 23:58:03', '2024-06-17 23:58:03'),
(4, 1, 2, 'Biru', 'L', 2, 80000, '2024-06-17 23:58:03', '2024-06-17 23:58:03'),
(5, 2, 1, 'Merah', 'XL', 2, 120000, '2024-06-18 13:34:16', '2024-06-18 13:34:16'),
(6, 2, 1, 'Merah', 'L', 2, 100000, '2024-06-18 13:34:16', '2024-06-18 13:34:16'),
(7, 2, 2, 'Merah', 'XL', 10, 400000, '2024-06-18 13:34:16', '2024-06-18 13:34:16'),
(8, 2, 2, 'Biru', 'L', 2, 80000, '2024-06-18 13:34:16', '2024-06-18 13:34:16');

-- --------------------------------------------------------

--
-- Table structure for table `detail_variant_produk`
--

CREATE TABLE `detail_variant_produk` (
  `id` bigint UNSIGNED NOT NULL,
  `id_variant_produk` bigint UNSIGNED NOT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum di isi',
  `stok` int NOT NULL DEFAULT '0',
  `harga_sewa` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_variant_produk`
--

INSERT INTO `detail_variant_produk` (`id`, `id_variant_produk`, `ukuran`, `stok`, `harga_sewa`, `created_at`, `updated_at`) VALUES
(1, 1, 'S', 10, 45000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(2, 1, 'M', 15, 50000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(3, 1, 'L', 16, 55000, '2024-06-12 23:47:16', '2024-06-18 13:34:16'),
(4, 1, 'XL', 21, 60000, '2024-06-12 23:47:16', '2024-06-18 13:34:16'),
(5, 1, 'XXL', 30, 65000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(6, 2, 'S', 10, 46000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(7, 2, 'M', 15, 51000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(8, 2, 'L', 20, 56000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(9, 2, 'XL', 25, 61000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(10, 2, 'XXL', 30, 66000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(11, 3, 'S', 10, 47000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(12, 3, 'M', 15, 52000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(13, 3, 'L', 20, 57000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(14, 3, 'XL', 25, 62000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(15, 3, 'XXL', 30, 67000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(16, 4, 'S', 10, 48000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(17, 4, 'M', 15, 53000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(18, 4, 'L', 20, 58000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(19, 4, 'XL', 25, 63000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(20, 4, 'XXL', 30, 68000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(21, 5, 'S', 10, 49000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(22, 5, 'M', 15, 54000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(23, 5, 'L', 20, 59000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(24, 5, 'XL', 25, 64000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(25, 5, 'XXL', 30, 69000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(26, 6, 'S', 10, 50000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(27, 6, 'M', 15, 55000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(28, 6, 'L', 20, 60000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(29, 6, 'XL', 25, 65000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(30, 6, 'XXL', 30, 70000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(31, 7, 'S', 10, 51000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(32, 7, 'M', 15, 56000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(33, 7, 'L', 20, 61000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(34, 7, 'XL', 25, 66000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(35, 7, 'XXL', 30, 71000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(36, 8, 'S', 10, 45000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(37, 8, 'M', 15, 50000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(38, 8, 'L', 20, 55000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(39, 8, 'XL', 5, 60000, '2024-06-12 23:47:16', '2024-06-18 13:34:16'),
(40, 8, 'XXL', 30, 65000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(41, 9, 'S', 10, 46000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(42, 9, 'M', 15, 51000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(43, 9, 'L', 16, 56000, '2024-06-12 23:47:16', '2024-06-18 13:34:16'),
(44, 9, 'XL', 25, 61000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(45, 9, 'XXL', 30, 66000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(46, 10, 'S', 10, 47000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(47, 10, 'M', 15, 52000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(48, 10, 'L', 20, 57000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(49, 10, 'XL', 25, 62000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(50, 10, 'XXL', 30, 67000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(51, 11, 'S', 10, 48000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(52, 11, 'M', 15, 53000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(53, 11, 'L', 20, 58000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(54, 11, 'XL', 25, 63000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(55, 11, 'XXL', 30, 68000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(56, 12, 'S', 10, 49000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(57, 12, 'M', 15, 54000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(58, 12, 'L', 20, 59000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(59, 12, 'XL', 25, 64000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(60, 12, 'XXL', 30, 69000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(61, 13, 'S', 10, 50000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(62, 13, 'M', 15, 55000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(63, 13, 'L', 20, 60000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(64, 13, 'XL', 25, 65000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(65, 14, 'XXL', 30, 70000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(66, 14, 'S', 10, 51000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(67, 14, 'M', 15, 56000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(68, 14, 'L', 20, 61000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(69, 14, 'XL', 25, 66000, '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(70, 14, 'XXL', 30, 71000, '2024-06-12 23:47:16', '2024-06-12 23:47:16');

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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `kriteria` enum('Sangat Baik','Baik','Cukup','Kurang','Sangat Kurang') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Dibalas','Belum Dibalas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `iklan`
--

CREATE TABLE `iklan` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `snap_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_12_162859_produk', 1),
(6, '2024_05_13_144913_reset_password', 1),
(7, '2024_05_14_131939_feedback', 1),
(8, '2024_05_14_132537_balas_feedback', 1),
(9, '2024_05_15_194139_status_notifikasi_user', 1),
(10, '2024_05_16_073218_bank', 1),
(11, '2024_05_16_153916_pemasukan', 1),
(12, '2024_05_16_154906_pengeluaran', 1),
(13, '2024_05_18_015848_iklan', 1),
(14, '2024_05_18_021429_detail_iklan', 1),
(15, '2024_05_18_022819_pembayaran_iklan', 1),
(16, '2024_05_21_062408_rating_produk', 1),
(17, '2024_05_21_141252_alamat', 1),
(18, '2024_05_24_150442_riwayat_pencarian', 1),
(19, '2024_05_26_132940_variant_produk', 1),
(20, '2024_05_26_133237_detail_variant_produk', 1),
(21, '2024_05_27_054726_penyewaan', 1),
(22, '2024_05_27_061101_detail_penyewaan', 1),
(23, '2024_05_27_061657_pembayaran_penyewaan', 1);

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
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL DEFAULT '0',
  `sumber` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id`, `id_user`, `sumber`, `deskripsi`, `nominal`, `created_at`, `updated_at`) VALUES
(1, 1, 'Penyewaan', 'Layanan Penyewaan Toko', 1000000, '2024-06-18 13:41:33', '2024-06-18 13:41:33'),
(2, 1, 'Service', 'Biaya Admin', 20000, '2024-06-18 13:41:33', '2024-06-18 13:41:33'),
(3, 1, 'Penyewaan', 'Layanan Penyewaan Toko', 700000, '2023-06-18 13:41:33', '2023-06-18 13:41:33'),
(4, 1, 'Penyewaan', 'Layanan Penyewaan Toko', 800000, '2022-06-18 13:41:33', '2022-06-18 13:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_iklan`
--

CREATE TABLE `pembayaran_iklan` (
  `id` bigint UNSIGNED NOT NULL,
  `id_iklan` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `metode_bayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'transfer',
  `total_bayar` int NOT NULL,
  `status_bayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_penyewaan`
--

CREATE TABLE `pembayaran_penyewaan` (
  `id` bigint UNSIGNED NOT NULL,
  `id_penyewaan` bigint UNSIGNED NOT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jaminan_sewa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_pembayaran` int DEFAULT NULL,
  `kembalian_pembayaran` int NOT NULL DEFAULT '0',
  `biaya_admin` int DEFAULT NULL,
  `kurang_pembayaran` int NOT NULL DEFAULT '0',
  `total_pembayaran` int DEFAULT NULL,
  `metode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'transfer',
  `jenis_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ambil ditempat',
  `status_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum lunas',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran_penyewaan`
--

INSERT INTO `pembayaran_penyewaan` (`id`, `id_penyewaan`, `bukti_pembayaran`, `jaminan_sewa`, `jumlah_pembayaran`, `kembalian_pembayaran`, `biaya_admin`, `kurang_pembayaran`, `total_pembayaran`, `metode`, `jenis_transaksi`, `status_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 1, 'Belum di isi', '0958475473843847', 700000, 0, 20000, 0, 700000, 'COD', 'ambil ditempat', 'Lunas', '2024-06-17 23:58:03', '2024-06-19 04:20:16'),
(4, 2, '1718743293_bukti.jpg', '1718743293_jaminan.jpeg', 700000, 0, 20000, 0, 720000, 'Transfer', 'Ambil ditempat', 'Lunas', '2024-06-18 13:41:33', '2024-06-18 13:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL DEFAULT '0',
  `sumber` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penyewaan`
--

CREATE TABLE `penyewaan` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_penyewaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyewaan`
--

INSERT INTO `penyewaan` (`id`, `id_user`, `tanggal_mulai`, `tanggal_selesai`, `pesan`, `status_penyewaan`, `created_at`, `updated_at`) VALUES
(1, 2, '2024-06-12', '2024-06-15', 'Mohon dikirim sebelum tanggal 12 Juni.', 'Selesai', '2024-06-17 23:58:03', '2024-06-23 08:20:04'),
(2, 3, '2024-06-12', '2024-06-15', 'Mohon dikirim sebelum tanggal 12 Juni.', 'Selesai', '2024-06-18 13:34:16', '2024-06-18 13:34:16');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 2, 'API Token', 'e350f5ccd4f9f02ef91f6c506070252df544b06fd9bc504ec8b03bf26b0aa9ae', '[\"*\"]', '2024-06-17 23:58:03', NULL, '2024-06-17 23:57:28', '2024-06-17 23:58:03'),
(2, 'App\\Models\\User', 2, 'API Token', 'c0b7bebc89ab40aa9ca0cf105895670118db47501a2a4d8d6b5e88170a347a47', '[\"*\"]', '2024-06-18 13:41:33', NULL, '2024-06-18 06:02:31', '2024-06-18 13:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Tersedia','Tidak Tersedia') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_depan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_belakang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum di isi',
  `foto_kiri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum di isi',
  `foto_kanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum di isi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `id_user`, `nama`, `deskripsi`, `status`, `kategori`, `foto_depan`, `foto_belakang`, `foto_kiri`, `foto_kanan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Arpenaz 4 Pole Supported Camping Tent 4 Person 1 Bedroom', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur facilisis, justo at fermentum egestas, turpis sapien tincidunt nulla, id dictum turpis sapien et augue. Integer euismod, erat sit amet pretium commodo, libero ligula ultrices libero, in dictum elit metus eget felis.', 'Tersedia', 'Tenda', '1718261236_depan.png', 'Belum di isi', 'Belum di isi', 'Belum di isi', '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(2, 1, 'Quechua 2 Seconds Easy Tent', 'Tent 2 seconds yang sangat mudah dipasang, hanya dengan sekali lempar tenda ini akan langsung berdiri. Cocok untuk digunakan oleh 2 orang dengan ruang ekstra untuk penyimpanan barang.', 'Tersedia', 'Tenda', 'quechua2_depan.png', 'quechua2_belakang.png', 'quechua2_kiri.png', 'quechua2_kanan.png', '2024-06-13 00:00:00', '2024-06-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `rating_produk`
--

CREATE TABLE `rating_produk` (
  `id` bigint UNSIGNED NOT NULL,
  `id_produk` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `rating` int NOT NULL,
  `ulasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `nomor_telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pencarian`
--

CREATE TABLE `riwayat_pencarian` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `kata_kunci` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_notifikasi_user`
--

CREATE TABLE `status_notifikasi_user` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `status` enum('read','unread') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_notifikasi_user`
--

INSERT INTO `status_notifikasi_user` (`id`, `id_user`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'read', '2024-06-17 17:09:24', '2024-06-24 03:17:09'),
(2, 2, 'read', '2024-06-17 17:10:03', '2024-06-24 03:17:09'),
(3, 3, 'read', '2024-06-18 06:04:10', '2024-06-24 03:17:09'),
(4, 4, 'read', '2024-06-24 03:16:17', '2024-06-24 03:17:09');

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
  `type` tinyint NOT NULL DEFAULT '0',
  `nomor_telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Belum Di isi',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Belum Di isi',
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_login` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `name_store` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `nomor_telephone`, `tanggal_lahir`, `foto`, `status`, `background`, `jenis_kelamin`, `time_login`, `last_login`, `name_store`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Icha Riska Nadilla', 'riska@gmail.com', NULL, '$2y$10$1Hn0VWh/K60MqwGpXAa62.4e1UYcdcgPr2q1veaJxpfbtHY9TIFU2', 0, '089620109792', '2004-11-04', 'man.png', 'active', 'Belum Di isikan', 'Perempuan', NULL, NULL, NULL, NULL, '2024-06-17 17:09:24', '2024-06-17 17:09:24'),
(2, 'Agung Kurniawan', 'agungklewang26@gmail.com', NULL, '$2y$10$CtxHOXCxV9ca.VRNbnrZDOieQlHbL2yZN0zFMNAyO9zQ8RdEzgwQG', 0, '089620109791', '2004-11-04', 'man.png', 'online', 'Belum Di isikan', 'Laki-laki', '2024-06-18 06:02:31', '2024-06-18 06:02:31', NULL, NULL, '2024-06-17 17:10:03', '2024-06-18 06:02:31'),
(3, 'Hacker London', 'hackerlondon@gmail.com', NULL, '$2y$10$2.5HXm6DIIBD5ulhRAxdBu3xdjOJysS4zfRWjSoUM9djGACiXSSTe', 0, '089620109793', '2004-11-04', 'man.png', 'active', 'Belum Di isikan', NULL, NULL, NULL, NULL, NULL, '2024-06-18 06:04:10', '2024-06-18 06:04:10'),
(4, 'Admin Dev', 'admin@gmail.com', NULL, '$2y$10$jOidrGXwgIZueIVQ0AiFe.vXxDhpD0HHTpmUBouUoLxxmuqz0l8A.', 1, '089620109798', '2004-11-04', 'man.png', 'active', 'Belum Di isikan', NULL, NULL, NULL, NULL, NULL, '2024-06-24 03:16:17', '2024-06-24 03:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `variant_produk`
--

CREATE TABLE `variant_produk` (
  `id` bigint UNSIGNED NOT NULL,
  `id_produk` bigint UNSIGNED NOT NULL,
  `warna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum di isi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variant_produk`
--

INSERT INTO `variant_produk` (`id`, `id_produk`, `warna`, `created_at`, `updated_at`) VALUES
(1, 1, 'Merah', '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(2, 1, 'Biru', '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(3, 1, 'Hijau', '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(4, 1, 'Kuning', '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(5, 1, 'Hitam', '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(6, 1, 'Putih', '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(7, 1, 'Coklat', '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(8, 2, 'Merah', '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(9, 2, 'Biru', '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(10, 2, 'Hijau', '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(11, 2, 'Kuning', '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(12, 2, 'Hitam', '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(13, 2, 'Putih', '2024-06-12 23:47:16', '2024-06-12 23:47:16'),
(14, 2, 'Coklat', '2024-06-12 23:47:16', '2024-06-12 23:47:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alamat_id_user_foreign` (`id_user`);

--
-- Indexes for table `balas_feedback`
--
ALTER TABLE `balas_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balas_feedback_id_feedback_foreign` (`id_feedback`),
  ADD KEY `balas_feedback_id_user_foreign` (`id_user`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_id_user_foreign` (`id_user`);

--
-- Indexes for table `detail_iklan`
--
ALTER TABLE `detail_iklan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_iklan_id_iklan_foreign` (`id_iklan`);

--
-- Indexes for table `detail_penyewaan`
--
ALTER TABLE `detail_penyewaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_penyewaan_id_penyewaan_foreign` (`id_penyewaan`),
  ADD KEY `detail_penyewaan_id_produk_foreign` (`id_produk`);

--
-- Indexes for table `detail_variant_produk`
--
ALTER TABLE `detail_variant_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_variant_produk_id_variant_produk_foreign` (`id_variant_produk`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_id_user_foreign` (`id_user`);

--
-- Indexes for table `iklan`
--
ALTER TABLE `iklan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iklan_id_user_foreign` (`id_user`);

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
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemasukan_id_user_foreign` (`id_user`);

--
-- Indexes for table `pembayaran_iklan`
--
ALTER TABLE `pembayaran_iklan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_iklan_id_iklan_foreign` (`id_iklan`),
  ADD KEY `pembayaran_iklan_id_user_foreign` (`id_user`);

--
-- Indexes for table `pembayaran_penyewaan`
--
ALTER TABLE `pembayaran_penyewaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_penyewaan_id_penyewaan_foreign` (`id_penyewaan`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengeluaran_id_user_foreign` (`id_user`);

--
-- Indexes for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penyewaan_id_user_foreign` (`id_user`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_id_user_foreign` (`id_user`);

--
-- Indexes for table `rating_produk`
--
ALTER TABLE `rating_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_produk_id_produk_foreign` (`id_produk`),
  ADD KEY `rating_produk_id_user_foreign` (`id_user`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reset_password_id_user_foreign` (`id_user`);

--
-- Indexes for table `riwayat_pencarian`
--
ALTER TABLE `riwayat_pencarian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_pencarian_id_user_foreign` (`id_user`);

--
-- Indexes for table `status_notifikasi_user`
--
ALTER TABLE `status_notifikasi_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_notifikasi_user_id_user_foreign` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `variant_produk`
--
ALTER TABLE `variant_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variant_produk_id_produk_foreign` (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `balas_feedback`
--
ALTER TABLE `balas_feedback`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_iklan`
--
ALTER TABLE `detail_iklan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_penyewaan`
--
ALTER TABLE `detail_penyewaan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `detail_variant_produk`
--
ALTER TABLE `detail_variant_produk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iklan`
--
ALTER TABLE `iklan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran_iklan`
--
ALTER TABLE `pembayaran_iklan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran_penyewaan`
--
ALTER TABLE `pembayaran_penyewaan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penyewaan`
--
ALTER TABLE `penyewaan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rating_produk`
--
ALTER TABLE `rating_produk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat_pencarian`
--
ALTER TABLE `riwayat_pencarian`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_notifikasi_user`
--
ALTER TABLE `status_notifikasi_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `variant_produk`
--
ALTER TABLE `variant_produk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alamat`
--
ALTER TABLE `alamat`
  ADD CONSTRAINT `alamat_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `balas_feedback`
--
ALTER TABLE `balas_feedback`
  ADD CONSTRAINT `balas_feedback_id_feedback_foreign` FOREIGN KEY (`id_feedback`) REFERENCES `feedback` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `balas_feedback_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `bank`
--
ALTER TABLE `bank`
  ADD CONSTRAINT `bank_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_iklan`
--
ALTER TABLE `detail_iklan`
  ADD CONSTRAINT `detail_iklan_id_iklan_foreign` FOREIGN KEY (`id_iklan`) REFERENCES `iklan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_penyewaan`
--
ALTER TABLE `detail_penyewaan`
  ADD CONSTRAINT `detail_penyewaan_id_penyewaan_foreign` FOREIGN KEY (`id_penyewaan`) REFERENCES `penyewaan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_penyewaan_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_variant_produk`
--
ALTER TABLE `detail_variant_produk`
  ADD CONSTRAINT `detail_variant_produk_id_variant_produk_foreign` FOREIGN KEY (`id_variant_produk`) REFERENCES `variant_produk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `iklan`
--
ALTER TABLE `iklan`
  ADD CONSTRAINT `iklan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD CONSTRAINT `pemasukan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pembayaran_iklan`
--
ALTER TABLE `pembayaran_iklan`
  ADD CONSTRAINT `pembayaran_iklan_id_iklan_foreign` FOREIGN KEY (`id_iklan`) REFERENCES `iklan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembayaran_iklan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pembayaran_penyewaan`
--
ALTER TABLE `pembayaran_penyewaan`
  ADD CONSTRAINT `pembayaran_penyewaan_id_penyewaan_foreign` FOREIGN KEY (`id_penyewaan`) REFERENCES `penyewaan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `pengeluaran_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD CONSTRAINT `penyewaan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rating_produk`
--
ALTER TABLE `rating_produk`
  ADD CONSTRAINT `rating_produk_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rating_produk_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD CONSTRAINT `reset_password_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `riwayat_pencarian`
--
ALTER TABLE `riwayat_pencarian`
  ADD CONSTRAINT `riwayat_pencarian_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `status_notifikasi_user`
--
ALTER TABLE `status_notifikasi_user`
  ADD CONSTRAINT `status_notifikasi_user_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `variant_produk`
--
ALTER TABLE `variant_produk`
  ADD CONSTRAINT `variant_produk_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
