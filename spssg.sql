-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 03:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spssg`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_balita`
--

CREATE TABLE `data_balita` (
  `id` int(50) NOT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `nama_balita` varchar(255) DEFAULT NULL,
  `jenis_kelamin` tinyint(1) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `birth_weight` decimal(16,2) DEFAULT NULL,
  `birth_length` decimal(16,2) DEFAULT NULL,
  `breastfeeding` tinyint(1) DEFAULT NULL,
  `user_id` int(50) DEFAULT NULL,
  `nama_ortu` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `desa` text DEFAULT NULL,
  `rw` varchar(50) DEFAULT NULL,
  `rt` varchar(50) DEFAULT NULL,
  `kode_pos` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jkn_bpjs` varchar(255) DEFAULT NULL,
  `air_bersih` varchar(255) DEFAULT NULL,
  `jamban_sehat` varchar(255) DEFAULT NULL,
  `imunisasi` varchar(255) DEFAULT NULL,
  `keluarga_merokok` varchar(255) DEFAULT NULL,
  `kecacingan` varchar(255) DEFAULT NULL,
  `riwayat_kehamilan_ibu` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_balita`
--

INSERT INTO `data_balita` (`id`, `nik`, `nama_balita`, `jenis_kelamin`, `tgl_lahir`, `birth_weight`, `birth_length`, `breastfeeding`, `user_id`, `nama_ortu`, `kecamatan`, `desa`, `rw`, `rt`, `kode_pos`, `jkn_bpjs`, `air_bersih`, `jamban_sehat`, `imunisasi`, `keluarga_merokok`, `kecacingan`, `riwayat_kehamilan_ibu`, `created_at`, `updated_at`) VALUES
(32, 'eyJpdiI6IlJ3VUlWQUo5TzA0R05kK3hDUWlVd2c9PSIsInZhbHVlIjoiOTBtemxxdFVZalAyaFJBdGYwdUgrZz09IiwibWFjIjoiOTQwMTQxODk1ZDY1NTQ4ZTk4NDBiYjkxOTVkNGIwN2I3Mzk0YjI1ZTE1NGViOTcwMDRhMjQyODc0YWVjYTFmZCIsInRhZyI6IiJ9', 'paaa', 1, '2024-03-29', '2.00', '2.00', 0, 25, 'q', 'q', 'q', '2', '2', '56266', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-22 06:37:08', NULL),
(33, 'eyJpdiI6Im5jREVpeUtwQ21SZjFDQ0x4TmJXTWc9PSIsInZhbHVlIjoiUlAwMDBCNVFTbXVNb1pJRHZBTVZxdz09IiwibWFjIjoiODE5ZWVhNTc1ZTEyMjJlOTk5Mjg2OGJiOGZhNGUyMThlOTg4MzhhNWExNWZlZjlhM2ViMjBjN2QyY2FkOThiNSIsInRhZyI6IiJ9', 'aku', 1, '1889-12-12', '9.00', '9.00', 1, 29, 'p', 'p', 'p', '9', '9', '56266', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-22 06:54:18', NULL),
(34, 'eyJpdiI6ImY4U0pjOWw2MVN1cUhpRHY5cGhMTmc9PSIsInZhbHVlIjoidGpxMk1LVXlGeHJnQXJkaDAycFQ5Zz09IiwibWFjIjoiYTFiYjE5OGUxOTBjNzA5MDJhZDlkMjdkNmE2M2FkOTgxNWUzYzI0NzJlNThlMzdjMDNiMTY3ZDhkN2I2MjkyZiIsInRhZyI6IiJ9', 'a', 0, '1999-09-12', '9.00', '9.00', 1, 28, 'p', 'p', 'p', '9', '9', '56266', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-22 07:03:36', NULL),
(35, 'eyJpdiI6Im5ocU40NnBmdmo2NTJQSFlVVWhsWFE9PSIsInZhbHVlIjoiYXRyUzFrVE9aVnN6VGp5R3ZLazg5c0ZoRmhqRUkyeElwcGM0clhrVFllcz0iLCJtYWMiOiJkMGY0NDc0NzQzMjQ0NmUxYTI4YTZhNDhjZGVhZjk4MDEyZmE3ZGFmZTUwYzE2Y2U4ZGY5MTdmYjQ4MGFmYWMxIiwidGFnIjoiIn0=', 'Adi', 1, '2023-05-25', '3.20', '51.00', 1, 21, 'Mohamad Sholeh', 'Tembalang', 'Tembalang', '01', '05', '50277', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-30 04:57:04', NULL),
(36, 'eyJpdiI6InRNNXpzbjBBWU82aTNLUG1jbiswNGc9PSIsInZhbHVlIjoiaklqV3ZkMkJTYUtDb3FVY2ZvcktKVERJYTJQZDBzWDVrV2liK3l1MWFMcz0iLCJtYWMiOiIyNjJkMzc5MmE0MWE0ZjM0Zjc0OGJjM2NkYjdiNGI0YjI0OGRhNzMwZmQxOGUzY2QxMjc5MzBjNGY0Mjk2ZGYxIiwidGFnIjoiIn0=', 'Mohamad Amar Ma\'ruf', 1, '2023-03-24', '3.00', '51.00', 1, 21, 'Mohamad Sholeh', 'Tembalang', 'Bulusan', '01', '05', '50277', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-12 02:37:25', NULL),
(37, 'eyJpdiI6ImFpSDVjZlBMUHZSam44MlZZclFqQmc9PSIsInZhbHVlIjoidlNwVStXVWN5RTJ2QTFHYU9TZ2s0V3U3TStjTXhTWXFxNlRtVEFoNlJYQT0iLCJtYWMiOiIwMzkzYjlhZGI4ZThkYTc2MDlkYzAyMzcwZDdiZjE4OWNjYjJjYmUyNDlkYTQxMGM2MWE5NDZkMzc0Zjk3OTQwIiwidGFnIjoiIn0=', 'Aprilia', 0, '2023-04-24', '2.90', '49.10', 1, 21, 'Mohamad Sholeh', 'Tembalang', 'Bulusan', '01', '05', '50277', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-12 02:39:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_edukasi`
--

CREATE TABLE `data_edukasi` (
  `id` int(11) NOT NULL,
  `balita_id` int(11) DEFAULT NULL,
  `bulan_ukur` varchar(50) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_edukasi`
--

INSERT INTO `data_edukasi` (`id`, `balita_id`, `bulan_ukur`, `pesan`, `created_at`, `updated_at`) VALUES
(4, 4, 'November', 'tetap jaga pola makan anak', NULL, NULL),
(5, 4, 'November', 'asfasfasf', NULL, NULL),
(6, 8, 'November', 'tetap jaga pola makan anak', NULL, NULL),
(7, 9, 'November', 'tetap jaga pola makan anak', NULL, NULL),
(15, 19, 'Februari', 'Tetap jaga pola makan anak', NULL, NULL),
(16, 20, 'Februari', 'tetap jaga pola makan ya', NULL, NULL),
(17, 33, 'Maret', 'cek', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_pengukuran`
--

CREATE TABLE `data_pengukuran` (
  `id` int(11) NOT NULL,
  `balita_id` int(50) DEFAULT NULL,
  `tgl_ukur` date DEFAULT NULL,
  `age` int(50) DEFAULT NULL,
  `tinggi_badan` decimal(16,2) DEFAULT NULL,
  `berat_badan` decimal(16,2) DEFAULT NULL,
  `lingkar_kepala` decimal(16,2) DEFAULT NULL,
  `lingkar_lengan` decimal(16,2) DEFAULT NULL,
  `stunting` varchar(50) DEFAULT NULL,
  `left_percentage` decimal(50,6) DEFAULT NULL,
  `right_percentage` decimal(50,6) DEFAULT NULL,
  `foto_balita` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pengukuran`
--

INSERT INTO `data_pengukuran` (`id`, `balita_id`, `tgl_ukur`, `age`, `tinggi_badan`, `berat_badan`, `lingkar_kepala`, `lingkar_lengan`, `stunting`, `left_percentage`, `right_percentage`, `foto_balita`, `created_at`, `updated_at`) VALUES
(8, 2, '2023-11-16', 18, '1.00', '1.00', '1.00', '1.00', 'stunting', '1.000000', '99.000000', '1699694479_WhatsApp Image 2023-10-13 at 14.09.08.jpeg', NULL, NULL),
(9, 4, '2023-11-18', 20, '65.00', '6.90', '44.00', '14.50', 'stunting', '9.939390', '90.060610', '1699696138_WhatsApp Image 2023-10-13 at 14.09.08.jpeg', NULL, NULL),
(10, 4, '2023-11-23', 24, '64.00', '6.80', '44.00', '14.60', 'stunting', '11.592269', '88.407730', '1699696312_WhatsApp Image 2023-10-13 at 14.09.08.jpeg', NULL, NULL),
(11, 2, '2023-11-14', NULL, '68.40', '6.20', '20.00', '2.00', 'stunting', '41.000000', '59.000000', '1699889462_WhatsApp Image 2023-10-13 at 14.09.08.jpeg', NULL, NULL),
(19, 4, '2023-11-13', 20, '64.00', '6.80', '44.00', '14.50', 'stunting', '17.200726', '82.799274', '1699905981_use case user (2).jpg', NULL, NULL),
(25, 5, '2023-11-15', 8, '65.00', '6.50', '42.00', '12.00', 'normal', '73.390650', '0.000000', NULL, NULL, NULL),
(38, 5, '2023-11-15', 8, '3.00', '6.00', '423.00', '1.00', 'stunting', '7.570446', '92.429554', NULL, NULL, NULL),
(52, 7, '2023-11-17', 10, '74.00', '8.20', '44.00', '14.80', 'stunting', '24.222511', '75.777490', NULL, NULL, NULL),
(55, 7, '2023-11-17', 8, '70.00', '7.40', '40.00', '14.00', 'stunting', '26.134253', '73.865750', NULL, NULL, NULL),
(56, 7, '2023-11-17', 8, '70.00', '7.40', '44.00', '14.50', 'stunting', '26.134253', '73.865750', NULL, NULL, NULL),
(59, 7, '2023-11-18', 8, '70.00', '7.40', '44.00', '14.50', 'stunting', '26.134253', '73.865750', NULL, NULL, NULL),
(74, 7, '2023-11-19', 8, '70.00', '7.40', '44.00', '14.50', 'tidak stunting', '0.000000', '1.000000', NULL, NULL, NULL),
(75, 7, '2023-11-19', 8, '70.00', '7.40', '44.00', '14.50', 'tidak stunting', '0.000000', '1.000000', NULL, NULL, NULL),
(78, 9, '2023-11-19', 7, '64.00', '7.00', '41.50', '13.90', 'Tidak Stunting', NULL, NULL, NULL, NULL, NULL),
(80, 8, '2023-11-19', 8, '74.00', '7.00', '44.00', '14.50', 'Tidak Stunting', NULL, NULL, NULL, NULL, NULL),
(82, 10, '2023-12-07', 9, '70.00', '7.20', '40.00', '14.50', NULL, NULL, NULL, NULL, NULL, NULL),
(83, 8, '2023-12-07', 8, '74.00', '7.20', '44.00', '14.50', 'Tidak Stunting', NULL, NULL, NULL, NULL, NULL),
(86, 8, '2023-12-08', 8, '65.00', '6.50', '41.00', '13.00', 'Stunting', NULL, NULL, NULL, NULL, NULL),
(87, 11, '2023-12-08', 6, '68.00', '6.80', '41.00', '14.00', 'Stunting', NULL, NULL, NULL, NULL, NULL),
(88, 11, '2023-12-09', 6, '70.00', '7.00', '43.00', '14.20', 'Tidak Stunting', NULL, NULL, NULL, NULL, NULL),
(89, 12, '2023-12-08', 3, '150.00', '100.00', '40.00', '14.00', 'Tidak Stunting', NULL, NULL, NULL, NULL, NULL),
(90, 13, '2023-12-08', 1, '55.00', '3.50', '35.00', '12.00', 'Tidak Stunting', NULL, NULL, NULL, NULL, NULL),
(91, 15, '2023-12-08', 1, '55.00', '3.50', '35.00', '12.00', 'Tidak Stunting', NULL, NULL, NULL, NULL, NULL),
(92, 12, '2023-12-08', 14, '65.00', '6.00', '45.00', '15.00', 'Stunting', NULL, NULL, NULL, NULL, NULL),
(93, 12, '2023-12-08', 12, '50.00', '4.00', '40.00', '15.00', 'Tidak Stunting', NULL, NULL, NULL, NULL, NULL),
(94, 12, '2023-12-08', 12, '40.00', '4.00', '45.00', '15.00', 'Tidak Stunting', NULL, NULL, NULL, NULL, NULL),
(100, 20, '2024-02-24', 8, '70.00', '5.00', '40.00', '13.00', 'Tidak Stunting', NULL, NULL, NULL, NULL, NULL),
(102, 19, '2024-02-12', 20, '70.00', '10.00', '46.00', '12.00', 'Tidak Stunting', NULL, NULL, NULL, NULL, NULL),
(103, 19, '2024-02-24', 20, '70.00', '10.00', '40.00', '13.00', 'Tidak Stunting', NULL, NULL, NULL, NULL, NULL),
(104, 19, '2024-02-27', 20, '70.00', '7.00', '40.00', '13.00', 'Tidak Stunting', NULL, NULL, NULL, NULL, NULL),
(105, 19, '2024-02-27', 8, '74.00', '7.20', '44.00', '14.50', 'Tidak Stunting', NULL, NULL, NULL, NULL, NULL),
(106, 8, '2024-02-27', 8, '74.00', '7.20', '44.00', '14.50', 'Tidak Stunting', NULL, NULL, NULL, NULL, NULL),
(107, 19, '2024-02-27', 8, '65.00', '6.00', '41.00', '13.00', 'Stunting', NULL, NULL, NULL, NULL, NULL),
(111, 24, '2024-03-15', 4, '69.60', '5.80', '39.00', '13.50', 'Tidak Stunting', NULL, NULL, NULL, NULL, NULL),
(112, 21, '2024-03-15', 3, '59.00', '6.70', '40.00', '13.10', 'Tidak Stunting', NULL, NULL, NULL, NULL, NULL),
(115, 27, '2024-03-15', 6, '68.00', '8.10', '43.00', '14.20', 'Tidak Stunting', NULL, NULL, NULL, NULL, NULL),
(116, 25, '2024-03-15', 2, '54.00', '4.60', '35.00', '13.30', 'Stunting', NULL, NULL, NULL, NULL, NULL),
(117, 26, '2024-03-15', 3, '57.00', '5.00', '39.50', '13.00', 'Stunting', NULL, NULL, NULL, NULL, NULL),
(118, 28, '2024-03-15', 6, '72.00', '8.20', '42.00', '13.90', 'Tidak Stunting', NULL, NULL, NULL, NULL, NULL),
(119, 22, '2024-03-15', 12, '71.50', '7.10', '43.00', '13.80', 'Stunting', NULL, NULL, NULL, NULL, NULL),
(120, 29, '2024-03-15', 10, '67.00', '7.60', '42.00', '13.80', 'Stunting', NULL, NULL, NULL, NULL, NULL),
(121, 23, '2024-03-15', 18, '74.20', '9.00', '46.50', '14.30', 'Stunting', NULL, NULL, NULL, NULL, NULL),
(122, 30, '2024-03-15', 15, '75.00', '8.30', '48.50', '14.80', 'Tidak Stunting', NULL, NULL, NULL, NULL, NULL),
(123, 8, '2024-03-18', 8, '74.00', '7.20', '44.00', '14.50', 'Stunting', NULL, NULL, NULL, NULL, NULL),
(124, 8, '2024-03-19', 8, '77.00', '7.20', '44.00', '14.50', 'Stunting', NULL, NULL, NULL, NULL, NULL),
(125, 8, '2024-03-20', 8, '70.90', '9.30', '44.00', '14.50', 'Tidak Stunting', NULL, NULL, NULL, NULL, NULL),
(126, 32, '2024-03-22', 20, '12.00', '12.00', '12.00', '12.00', 'Stunting', NULL, NULL, NULL, NULL, NULL),
(128, 34, '2024-03-30', 1, '52.00', '3.00', '12.00', '38.00', 'Tidak Stunting', NULL, NULL, NULL, NULL, NULL),
(129, 36, '2024-04-12', 12, '80.00', '8.50', '47.00', '15.00', 'Tidak Stunting', NULL, NULL, NULL, NULL, NULL),
(130, 37, '2024-04-12', 11, '75.00', '7.80', '45.00', '14.50', 'Tidak Stunting', NULL, NULL, NULL, NULL, NULL),
(131, 35, '2024-04-12', 10, '69.00', '7.60', '43.00', '14.60', 'Tidak Stunting', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `no_kk` text DEFAULT NULL,
  `kode_pos` varchar(50) DEFAULT NULL,
  `nama_posyandu` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `role`, `no_kk`, `kode_pos`, `nama_posyandu`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'super admin', NULL, NULL, NULL, NULL, '$2y$10$0NbCJG.wXazZ72.VqHKlueMBXU8onhE10ET7PuK071gXsz5bwjpJq', NULL, '2023-10-13 01:49:54', '2023-10-13 01:49:54'),
(2, 'Fatma', 'posyandu1', 'admin', NULL, '56266', 'Posyandu Kedungmundu', NULL, '$2y$10$09ellkmGCEdWXm.3S.PJWen..N2pC0dD.RfwDO2lhkel7W0UhInYe', NULL, NULL, NULL),
(3, 'Dwi', 'user1', 'user', 'eyJpdiI6IlpZYk9SVkp5SDEyZGFubVoxQ29Ga3c9PSIsInZhbHVlIjoiSW9oc0tOMzNqREp5WW1nRU4veTM5UT09IiwibWFjIjoiNWNlOGU5YWU2ZjI4MzFjNzU2YzIwNDcxNmQ0YjZhODIwZTIzODI0NzNmMTVlMDY5NzI2ZGY0MDdhN2JiNWQzZCIsInRhZyI6IiJ9', NULL, NULL, NULL, '$2y$10$1N8Rj/aS3MRTASBSSJ8N7e/mfQhd/utvx6QOG.OmqqwOwSAWVCE9G', NULL, NULL, NULL),
(19, 'Posyandu Mawar - Tembalang', 'mawar_tembalang', 'admin', NULL, '50277', 'Posyandu Mawar - Tembalang', NULL, '$2y$10$Ip3Ofw.3zk/2chlSswMOE.nC4fRwsrmEGRKLywWGwgGrTgs0vvRVS', NULL, NULL, NULL),
(21, 'Mohamad Sholeh', 'sholeh', 'user', 'eyJpdiI6InFaSEdOWGdUajUra3JaczhEdmNpdGc9PSIsInZhbHVlIjoiNkpLN1BYT2VCMExCYkZDaVpiVm93ZFJGVjA4cUFJOXBHSk1iRlZuMnJRWT0iLCJtYWMiOiJiODEwMjhiZjQyOWFiZWU3YzQ0MDkxNjcwZjE3MzkxY2E5MWNhYWQzMzhiYmY3ZjY3MmE2YjgwZWVlMjhjMWM1IiwidGFnIjoiIn0=', NULL, NULL, NULL, '$2y$10$msfQQNOI88syaFt3mYiohOCm8l5X/oL.mxuZ1Bm1oD3pkSFtkLQXG', NULL, '2023-11-17 00:37:21', '2023-11-17 00:37:21'),
(24, 'admin1', 'admin1', 'super admin', NULL, NULL, NULL, NULL, '$2y$10$p0nXoMIhqbXvaX3K9l8E6evAEVc1sQELxqFLevl8bvuU9LTCnztlK', NULL, '2024-03-20 00:02:11', '2024-03-20 00:02:11'),
(25, 'dwii', 'dwiii', 'user', 'eyJpdiI6InZTSThqaWF1MDhaQXNDTXA1UDNTMkE9PSIsInZhbHVlIjoid0FLWHZMWS9xYldEWkRJMk1ETUJwZz09IiwibWFjIjoiZmQ4NGRkYzZiNTZmZjVlMDM1ZDNkNDYxYWVkNTI0MWIzMzc0YjZmMWIyOTUyNWJjNDVjYjlmMWY3Nzk4MzhmZCIsInRhZyI6IiJ9', '55555', 'pos dwi', NULL, '$2y$10$QKltt9XgoAm29amupz/fnee4ShCJSD080SxUmYpS33B7wfz7jO9cS', NULL, NULL, NULL),
(28, 'user baru', 'user', 'user', 'eyJpdiI6IlRXUmZQdlpOTnArUlplRmhqRmxrdGc9PSIsInZhbHVlIjoib0MxNnczUTFBNFd6Z0VCdk5DZkxoZz09IiwibWFjIjoiZTU4N2YxNDk2ZTQ3ZDJiMzcyMmExMmRhOTg0NmYxYWE4MTgzNjU0OWEzNmNhOGRiMjM4NmM4YzU2MTBmZDE5YiIsInRhZyI6IiJ9', '22222', NULL, NULL, '$2y$10$oDrT8PlIXdXR1Hl57i.mGOhkjUL0zgHLA3sx5x/bapX7BoUx9mIhW', NULL, NULL, NULL),
(29, 'p', 'userbaru', 'user', 'eyJpdiI6IlRYWVVraUZRRXh5M0w3VzZMRHFsc3c9PSIsInZhbHVlIjoiZjRWZUkyQldFSjBOYW1sODhxQktVUT09IiwibWFjIjoiMzY3YTVlOTllNjYwMWY3ZTljZGQyYWZjZjE1ZTYzY2Y4ZDUxOGVjZDQ1MGIzM2RiYzgxYTk3OWFlYjY1NzEzNiIsInRhZyI6IiJ9', NULL, NULL, NULL, '$2y$10$Bka3gFBUe9ePA7t1p6m5/e3vy2ptFZGl2ngH10ttL156tH3a7LCAW', NULL, '2024-03-21 23:51:46', '2024-03-21 23:51:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_balita`
--
ALTER TABLE `data_balita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_edukasi`
--
ALTER TABLE `data_edukasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pengukuran`
--
ALTER TABLE `data_pengukuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fk_kk` (`no_kk`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_balita`
--
ALTER TABLE `data_balita`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `data_edukasi`
--
ALTER TABLE `data_edukasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `data_pengukuran`
--
ALTER TABLE `data_pengukuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
