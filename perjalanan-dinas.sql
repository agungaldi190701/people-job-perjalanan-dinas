-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2022 at 03:32 PM
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
-- Database: `perjalanan-dinas`
--

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_ketua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp_ketua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_orang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama_ketua`, `nohp_ketua`, `total_orang`, `jenis_kegiatan`, `tanggal`, `jam`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Agung Aldi Prasetya', '085807290527', '3', 'Upacara', '2022-12-14', '18:20', 'Akan Datang', NULL, '2022-12-14 04:20:25', '2022-12-14 04:20:25'),
(3, 'agung', '12313234', '12', 'membaca bersama', '2022-12-15', '21:44', 'Sudah Selesai', NULL, '2022-12-14 07:44:11', '2022-12-14 07:44:39');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_12_13_061308_create_kegiatan', 1),
(3, '2022_12_13_072459_create_admin', 1),
(4, '2022_12_14_085454_create_users', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_anggota` enum('pns','honorer','biasa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` enum('anggota','admin','ketua') COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nip`, `nama`, `jenis_kelamin`, `foto`, `nohp`, `jenis_anggota`, `jabatan`, `username`, `password`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '12345', 'admin', 'laki-laki', 'asakjsndkja', '2642837', 'pns', 'admin', 'admin', '$2y$10$A9Qqgak/FuCFYl.FUkvsPutzG/pP.Weg9k9R2Ci5REC1vk1YFUkh.', NULL, NULL, '2022-12-14 04:06:26', '2022-12-14 04:06:26'),
(2, '10120001', 'agung', 'Laki-Laki', 'IMG_3456.JPG', '34234', 'pns', 'anggota', 'agung', '$2y$10$fnNO/bka0ManhrCXftWlu.7CwCGMRgwXUNXlftkuS7f51N0InPF3y', NULL, NULL, '2022-12-14 04:07:28', '2022-12-14 04:07:28'),
(3, NULL, 'Agung Aldi Prasetya', 'Perempuan', 'IMG_3456.JPG', '085807290527', 'honorer', 'ketua', 'aku', '$2y$10$p3mDVxIN7v7.ELVtT4/NAeuVvQ7D9l2dn6HnjDV1ZsxY3.t1SPYlW', NULL, NULL, '2022-12-14 04:08:12', '2022-12-14 05:20:21'),
(4, '1234567890', 'ketua', 'Laki-Laki', 'IMG_3445.JPG', '1234567890', 'pns', 'ketua', 'ketua', '$2y$10$mKN7bpvEIcJbNwO10sPTpOImvdVQ0QPKtk5nnbXhapTOVdG.01gTy', NULL, NULL, '2022-12-14 07:07:35', '2022-12-14 07:07:35'),
(5, '', 'anggota', 'Laki-Laki', 'IMG_3572.JPG', 'anggota', 'pns', 'anggota', 'anggota', '$2y$10$IcmgDKZpGtJ8.b7SryO8mu3nJtrhzMElztRKZOkNvnsNTDIsC1i0.', NULL, NULL, '2022-12-14 07:08:27', '2022-12-14 07:08:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
