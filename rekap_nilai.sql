-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 07, 2023 at 08:42 AM
-- Server version: 8.0.27
-- PHP Version: 8.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekap_nilai`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_rekap`
-- (See below for the actual view)
--
CREATE TABLE `data_rekap` (
`id` bigint unsigned
,`no_peserta` int
,`nisn` varchar(20)
,`nama` varchar(50)
,`id_mapel` int unsigned
,`id_siswa` bigint unsigned
,`id_ajaran` int unsigned
,`total_jawaban_b` int
,`total_jawaban_s` int
,`rata_rata` int
,`created_at` timestamp
,`updated_at` timestamp
,`tingkatan` enum('X','XI','XII')
,`no_kelas` enum('1','2','3','4','5','6')
,`jurusan` varchar(50)
,`mapel` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int UNSIGNED NOT NULL,
  `jurusan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `jurusan`, `created_at`, `updated_at`) VALUES
(1, 'REKAYASA PERANGKAT LUNAK', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int UNSIGNED NOT NULL,
  `mapel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_mapel` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `mapel`, `kode_mapel`, `created_at`, `updated_at`) VALUES
(1, 'BAHASA JAWA', '20', NULL, NULL);

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
(2, '2022_02_10_071024_create_jurusans_table', 1),
(3, '2022_02_10_072803_create_tahun_ajarans_table', 1),
(4, '2023_02_10_070501_create_siswas_table', 1),
(5, '2023_02_10_071350_create_mapels_table', 1),
(6, '2023_02_10_071528_create_rekaps_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rekap`
--

CREATE TABLE `rekap` (
  `id` bigint UNSIGNED NOT NULL,
  `id_mapel` int UNSIGNED NOT NULL,
  `id_siswa` bigint UNSIGNED NOT NULL,
  `id_ajaran` int UNSIGNED NOT NULL,
  `total_jawaban_b` int NOT NULL,
  `total_jawaban_s` int NOT NULL,
  `rata_rata` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekap`
--

INSERT INTO `rekap` (`id`, `id_mapel`, `id_siswa`, `id_ajaran`, `total_jawaban_b`, `total_jawaban_s`, `rata_rata`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 5, 5, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_peserta` int NOT NULL,
  `tingkatan` enum('X','XI','XII') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kelas` enum('1','2','3','4','5','6') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_jurusan` int UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `nisn`, `no_peserta`, `tingkatan`, `no_kelas`, `id_jurusan`, `tahun_ajaran`, `created_at`, `updated_at`) VALUES
(1, 'TEST', '0998989', 1, 'X', '1', 1, '2022/2023', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` int UNSIGNED NOT NULL,
  `tahun` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `tahun`, `semester`, `created_at`, `updated_at`) VALUES
(1, '2022/2023', 'ganjil', NULL, NULL),
(2, '2022/2023', 'genap', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','operator') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$sYwXiCJwxqne9t/xVlkiMeod1W/R6jFsJe3u.jND5qZofITPvYode', 'admin', NULL, '2023-02-27 07:56:32', '2023-02-27 07:56:32'),
(3, 'RIDWAN', '89', NULL, '$2y$10$YSPGSfaBvGd.KJOoKKzVf.7f85VNyX/I97o35SqwGAx1b4hq27F5m', 'operator', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure for view `data_rekap`
--
DROP TABLE IF EXISTS `data_rekap`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_rekap`  AS SELECT `rekap`.`id` AS `id`, `siswa`.`no_peserta` AS `no_peserta`, `siswa`.`nisn` AS `nisn`, `siswa`.`nama` AS `nama`, `rekap`.`id_mapel` AS `id_mapel`, `rekap`.`id_siswa` AS `id_siswa`, `rekap`.`id_ajaran` AS `id_ajaran`, `rekap`.`total_jawaban_b` AS `total_jawaban_b`, `rekap`.`total_jawaban_s` AS `total_jawaban_s`, `rekap`.`rata_rata` AS `rata_rata`, `rekap`.`created_at` AS `created_at`, `rekap`.`updated_at` AS `updated_at`, `siswa`.`tingkatan` AS `tingkatan`, `siswa`.`no_kelas` AS `no_kelas`, `jurusan`.`jurusan` AS `jurusan`, `mapel`.`mapel` AS `mapel` FROM (((`rekap` join `mapel` on((`rekap`.`id_mapel` = `mapel`.`id`))) join `siswa` on((`rekap`.`id_siswa` = `siswa`.`id`))) join `jurusan` on((`siswa`.`id_jurusan` = `jurusan`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekap`
--
ALTER TABLE `rekap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rekap_id_siswa_foreign` (`id_siswa`),
  ADD KEY `rekap_id_ajaran_foreign` (`id_ajaran`),
  ADD KEY `rekap_id_mapel_foreign` (`id_mapel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_id_jurusan_foreign` (`id_jurusan`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rekap`
--
ALTER TABLE `rekap`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rekap`
--
ALTER TABLE `rekap`
  ADD CONSTRAINT `rekap_id_ajaran_foreign` FOREIGN KEY (`id_ajaran`) REFERENCES `tahun_ajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rekap_id_mapel_foreign` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rekap_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_id_jurusan_foreign` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
