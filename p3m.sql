-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2020 at 04:46 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p3m`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggotas`
--

CREATE TABLE `anggotas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hibah_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggotas`
--

INSERT INTO `anggotas` (`id`, `hibah_id`, `user_id`, `created_at`, `updated_at`) VALUES
(8, 6, 11, NULL, NULL),
(9, 6, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hibahs`
--

CREATE TABLE `hibahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reviewer1_id` int(11) DEFAULT NULL,
  `reviewer2_id` int(11) DEFAULT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` int(11) NOT NULL,
  `luaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontrak` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keilmuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai1` int(11) DEFAULT NULL,
  `nilai2` int(11) DEFAULT NULL,
  `proposal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perbaikan_proposal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ppt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `laporan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perbaikan_laporan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_p` int(11) NOT NULL DEFAULT 0,
  `status_l` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hibahs`
--

INSERT INTO `hibahs` (`id`, `user_id`, `reviewer1_id`, `reviewer2_id`, `tahun`, `judul`, `prodi`, `nominal`, `luaran`, `kontrak`, `keilmuan`, `nilai1`, `nilai2`, `proposal`, `perbaikan_proposal`, `ppt`, `laporan`, `perbaikan_laporan`, `kategori`, `status_p`, `status_l`, `created_at`, `updated_at`) VALUES
(6, 10, 9, 13, '2020 2021 Ganjil', 'Percobaan', 'komputer', 1000000, 'Jurnal Nasional Terakreditasi', '007.16/P3M.PHB/V/2019', 'teknik', 4, 3, '200916020605-RIP fixed.pdf', '200916175711-suratmasuk_2020_200901015932.pdf', '200920081829-ppt-PRESENTASI HASIL RATIH 2020 - Ratih Sakti.pptx', '200920081747-laporan-Borang Akreditasi UP DIV Teknik Informatika 2020.pdf', '200921044106-revisiLaporan-PANDUAN PENELITIAN 2019 fix.pdf', 'penelitian', 5, 5, '2020-09-15 19:06:05', '2020-09-21 01:44:17');

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
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2020_09_09_071146_create_hibahs_table', 2),
(14, '2020_09_09_071510_create_anggotas_table', 2),
(15, '2020_09_17_044624_create_statuss_table', 3),
(16, '2020_09_17_044716_create_tahuns_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statuss`
--

CREATE TABLE `statuss` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuss`
--

INSERT INTO `statuss` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Submitted', NULL, NULL),
(2, 'Revisi', NULL, NULL),
(3, 'Sudah Perbaikan', NULL, NULL),
(4, 'Revisi Ulang', NULL, NULL),
(5, 'ACC', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tahuns`
--

CREATE TABLE `tahuns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahuns`
--

INSERT INTO `tahuns` (`id`, `tahun`, `created_at`, `updated_at`) VALUES
(1, '2020 2021 Ganjil', NULL, NULL),
(2, '2020 2021 Genap', NULL, NULL),
(3, '2021 2022 Ganjil', NULL, NULL),
(4, '2021 2022 Genap', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `prodi`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ratono', 'operator', 'operator', 'p3m', NULL, '$2y$10$4Hr9xhn9nxn5T.KfYzfbeOvnDn80FEv79BMQCFnSQlCUBkWl7eQUS', NULL, '2020-09-07 19:21:42', '2020-09-07 19:21:42'),
(2, 'Alfia', 'administrasi', 'administrasi', 'p3m', NULL, '$2y$10$El8KX8DIVSsWnWVlaxHJw.yStaS/hfQ6uVRgrRElCEO9DNlMwpFxq', NULL, '2020-09-07 23:54:42', '2020-09-07 23:54:42'),
(4, 'Neneng', 'keuangan', 'keuangan', 'p3m', NULL, '$2y$10$EGnGrfu3V4V5UbNEAbNF0eaU1M.YHS5O5Qn0G4wsanyYG0SVJy.0y', NULL, '2020-09-08 02:34:44', '2020-09-08 02:34:44'),
(5, 'Riky', 'publikasi', 'publikasi', 'p3m', NULL, '$2y$10$2bMQ16ASQ9SIcmHofSLV7uZG9j3SQvN8g8jcuUllxFnhWmnHHiOOK', NULL, '2020-09-08 07:26:36', '2020-09-08 07:26:36'),
(6, 'Wilda Amananti', 'dpenelitian', 'dpenelitian', 'p3m', NULL, '$2y$10$b0QmDjE8qDXr2fusYnooUeWWmlM96WFJ3ajHUzsd0qV3LEFJslHSO', NULL, '2020-09-08 08:21:39', '2020-09-08 08:21:39'),
(7, 'Hikmatul Maulida', 'dpengabdian', 'dpengabdian', 'p3m', NULL, '$2y$10$XkSavdbsZIHsRkNoJkP9CuEv4g3DcANbBZ/rNOZ6zAlUt4zQaNxDy', NULL, '2020-09-08 08:26:51', '2020-09-08 08:26:51'),
(8, 'Dairoh', 'kap3m', 'kap3m', 'p3m', NULL, '$2y$10$IisMIRqydFeKHUT2x1n8FeLJdWEX49iv6ai2FcTngAuTIXq90rG3a', NULL, '2020-09-08 08:28:01', '2020-09-08 08:28:01'),
(9, 'Very', 'reviewer', 'reviewer', 'p3m', NULL, '$2y$10$NVAZMU.rlarBYKIp2ocaQuK5a0.yqxa7F8w/hH8oc3BugQkACpwCq', NULL, '2020-09-08 08:41:59', '2020-09-08 08:41:59'),
(10, 'Dosen', '11223344', 'pengusul', 'komputer', NULL, '$2y$10$KRp3RwRg8BhaJBNS94mmy.x0NjYUtPe9xD89IubHfcGMoPjMbuulW', NULL, '2020-09-08 08:43:12', '2020-09-08 08:43:12'),
(11, 'pengusul2', '111222333', 'pengusul', 'farmasi', NULL, '$2y$10$sDR1vu4To6oJH.jbHg7/L.YHK8.C5TouUiIQffhZz4l2giqyFMJAO', NULL, '2020-09-13 21:17:12', '2020-10-04 22:30:57'),
(12, 'pengusul3', 'pengusul3', 'pengusul', 'kebidanan', NULL, '$2y$10$7XFgRdAe6OCJkcN0oNz4TuNqjZUagg628P3dZ1GEp0mzoJNae8QNm', NULL, '2020-09-13 22:10:00', '2020-09-13 22:10:00'),
(13, 'Ginanjar', 'reviewer2', 'reviewer', 'p3m', NULL, '$2y$10$BOaPyp4vAvkRl7huQXn8UeDUFqUdW1mSzsI5pP97TWmboJH23VTYu', NULL, '2020-09-15 18:52:57', '2020-09-15 18:52:57'),
(28, 'Percobaan', 'Coba11', 'pengusul', 'dkv', NULL, '$2y$10$Yse/bi0jpwHLtpN6b.f16OHOdl3BN0lDfja7ASQNxNl.8ZqVFFA5O', NULL, '2020-10-04 22:18:12', '2020-10-04 22:32:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggotas`
--
ALTER TABLE `anggotas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hibahs`
--
ALTER TABLE `hibahs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hibahs_judul_unique` (`judul`);

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
-- Indexes for table `statuss`
--
ALTER TABLE `statuss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahuns`
--
ALTER TABLE `tahuns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggotas`
--
ALTER TABLE `anggotas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hibahs`
--
ALTER TABLE `hibahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `statuss`
--
ALTER TABLE `statuss`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tahuns`
--
ALTER TABLE `tahuns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
