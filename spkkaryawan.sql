-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 05:22 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spkkaryawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot_kriteria`
--

CREATE TABLE `bobot_kriteria` (
  `id_bobot_kriteria` int(10) UNSIGNED NOT NULL,
  `id_kriteria` int(10) UNSIGNED NOT NULL,
  `nama_bobot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_bobot` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bobot_kriteria`
--

INSERT INTO `bobot_kriteria` (`id_bobot_kriteria`, `id_kriteria`, `nama_bobot`, `jumlah_bobot`, `created_at`, `updated_at`) VALUES
(27, 12, 'wajah', 5, '2021-12-16 18:39:06', '2021-12-16 18:39:06'),
(28, 12, 'badan', 4, '2021-12-16 18:39:16', '2021-12-16 18:39:26'),
(29, 12, 'kaki', 4, '2021-12-16 18:39:33', '2021-12-16 18:39:33'),
(30, 13, 'ngoding', 5, '2021-12-16 18:39:43', '2021-12-16 18:39:43'),
(31, 13, 'matematika', 5, '2021-12-16 18:39:51', '2021-12-16 18:39:51'),
(32, 13, 'problem solve', 4, '2021-12-16 18:40:02', '2021-12-16 18:40:02'),
(33, 14, 'php', 3, '2021-12-16 18:40:12', '2021-12-16 18:40:12'),
(34, 14, 'js', 4, '2021-12-16 18:40:19', '2021-12-16 18:40:19'),
(35, 14, 'mysql', 4, '2021-12-16 18:40:28', '2021-12-16 18:40:28'),
(36, 15, 'rupa', 4, '2021-12-16 18:43:34', '2021-12-16 18:43:34'),
(37, 15, 'tinggi', 4, '2021-12-16 18:43:48', '2021-12-16 18:43:48'),
(38, 15, 'sexy', 4, '2021-12-16 18:44:00', '2021-12-16 18:44:00'),
(39, 16, 'tata krama', 4, '2021-12-16 18:44:11', '2021-12-16 18:44:11'),
(40, 16, 'penampilan', 4, '2021-12-16 18:44:19', '2021-12-16 18:44:19'),
(41, 16, 'bicara', 4, '2021-12-16 18:44:26', '2021-12-16 18:44:26'),
(42, 17, 'ngatur duit', 4, '2021-12-16 18:44:39', '2021-12-16 18:44:39'),
(43, 17, 'hemat', 4, '2021-12-16 18:44:50', '2021-12-16 18:44:50'),
(44, 17, 'rambut', 4, '2021-12-16 18:45:06', '2021-12-16 18:45:06'),
(45, 18, 'waktu', 5, '2021-12-16 18:47:17', '2021-12-16 18:47:17'),
(46, 18, 'uang', 4, '2021-12-16 18:47:24', '2021-12-16 18:47:24'),
(47, 18, 'kondisi', 4, '2021-12-16 18:47:31', '2021-12-16 18:47:31'),
(48, 19, 'proposal', 4, '2021-12-16 18:47:42', '2021-12-16 18:47:42'),
(49, 19, 'template', 4, '2021-12-16 18:47:49', '2021-12-16 18:47:49'),
(50, 19, 'kas', 4, '2021-12-16 18:48:04', '2021-12-16 18:48:04'),
(51, 20, 'nyalain', 4, '2021-12-16 18:48:16', '2021-12-16 18:48:16'),
(52, 20, 'rakit', 4, '2021-12-16 18:48:22', '2021-12-16 18:48:22'),
(53, 20, 'pake mos', 4, '2021-12-16 18:48:35', '2021-12-16 18:48:35');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_soal`
--

CREATE TABLE `daftar_soal` (
  `id_soal` int(10) UNSIGNED NOT NULL,
  `id_jadwal_tes` int(10) UNSIGNED NOT NULL,
  `soal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_soal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot_soal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftar_soal`
--

INSERT INTO `daftar_soal` (`id_soal`, `id_jadwal_tes`, `soal`, `file_soal`, `bobot_soal`, `created_at`, `updated_at`) VALUES
(14, 11, 'qwe', '1639705804.pdf', 40, '2021-12-16 18:50:04', '2021-12-16 18:50:04'),
(15, 11, 'ert', '1639705817.pdf', 40, '2021-12-16 18:50:17', '2021-12-16 18:50:17'),
(16, 11, 'asd', '1639705834.pdf', 20, '2021-12-16 18:50:34', '2021-12-16 18:50:34'),
(17, 12, 'rty', '1639705850.pdf', 40, '2021-12-16 18:50:50', '2021-12-16 18:50:50'),
(18, 12, 'tyu', '1639705864.pdf', 40, '2021-12-16 18:51:04', '2021-12-16 18:51:04'),
(19, 12, 'dfg', '1639705875.pdf', 20, '2021-12-16 18:51:15', '2021-12-16 18:51:15'),
(20, 13, 'ert', '1639705890.pdf', 50, '2021-12-16 18:51:30', '2021-12-16 18:51:30'),
(21, 13, 'rtyu', '1639705906.pdf', 40, '2021-12-16 18:51:46', '2021-12-16 18:51:46'),
(22, 13, 'ghj', '1639705922.pdf', 10, '2021-12-16 18:52:02', '2021-12-16 18:52:02');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_tes`
--

CREATE TABLE `hasil_tes` (
  `id_hasil_tes` int(10) UNSIGNED NOT NULL,
  `id_soal_tes` int(10) UNSIGNED DEFAULT NULL,
  `id_pelamar` int(10) UNSIGNED DEFAULT NULL,
  `id_lowongan` int(10) UNSIGNED NOT NULL,
  `jawaban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hasil_tes`
--

INSERT INTO `hasil_tes` (`id_hasil_tes`, `id_soal_tes`, `id_pelamar`, `id_lowongan`, `jawaban`, `nilai`, `created_at`, `updated_at`) VALUES
(19, 14, 16, 8, '1640084512.pdf', 90, '2021-12-19 10:18:46', '2021-12-21 04:01:52'),
(20, 15, 16, 8, '1639934332.pdf', 80, '2021-12-19 10:18:52', '2021-12-19 10:19:27'),
(21, 16, 16, 8, '1639934337.pdf', 10, '2021-12-19 10:18:57', '2021-12-19 10:19:33'),
(22, 14, 20, 8, '1640103399.pdf', NULL, '2021-12-21 08:05:25', '2021-12-21 09:16:39'),
(23, 15, 20, 8, '1640100731.pdf', NULL, '2021-12-21 08:32:11', '2021-12-21 08:32:11'),
(25, 16, 20, 8, '1640103302.pdf', NULL, '2021-12-21 09:15:02', '2021-12-21 09:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_tes`
--

CREATE TABLE `jadwal_tes` (
  `id_jadwal_tes` int(10) UNSIGNED NOT NULL,
  `id_lowongan` int(10) UNSIGNED NOT NULL,
  `tanggal` datetime NOT NULL,
  `durasi_tes` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_tes`
--

INSERT INTO `jadwal_tes` (`id_jadwal_tes`, `id_lowongan`, `tanggal`, `durasi_tes`, `created_at`, `updated_at`) VALUES
(11, 8, '2021-12-13 12:08:00', '2021-12-23 12:00:00', '2021-12-16 18:49:06', '2021-12-16 18:49:06'),
(12, 9, '2021-12-21 12:00:00', '2021-12-22 12:00:00', '2021-12-16 18:49:30', '2021-12-16 18:49:30'),
(13, 10, '2021-12-21 12:00:00', '2021-12-22 12:00:00', '2021-12-16 18:49:47', '2021-12-16 18:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(10) UNSIGNED NOT NULL,
  `id_lowongan` int(10) UNSIGNED NOT NULL,
  `nama_kriteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atribut_kriteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot_preferensi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `id_lowongan`, `nama_kriteria`, `atribut_kriteria`, `bobot_preferensi`, `created_at`, `updated_at`) VALUES
(12, 8, 'gudluking', 'benefit', 20, '2021-12-16 18:38:14', '2021-12-16 18:38:14'),
(13, 8, 'pinter', 'benefit', 30, '2021-12-16 18:38:35', '2021-12-16 18:38:35'),
(14, 8, 'bisa ngoding', 'benefit', 50, '2021-12-16 18:38:46', '2021-12-16 18:38:46'),
(15, 9, 'cakepps', 'benefit', 50, '2021-12-16 18:42:09', '2021-12-16 18:42:09'),
(16, 9, 'sopan', 'benefit', 20, '2021-12-16 18:42:24', '2021-12-16 18:42:24'),
(17, 9, 'ekonomi', 'cost', 30, '2021-12-16 18:42:35', '2021-12-16 18:42:35'),
(18, 10, 'manajemen', 'benefit', 30, '2021-12-16 18:46:45', '2021-12-16 18:46:45'),
(19, 10, 'word', 'benefit', 30, '2021-12-16 18:46:59', '2021-12-16 18:46:59'),
(20, 10, 'komputer', 'benefit', 40, '2021-12-16 18:47:09', '2021-12-16 18:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `id_lowongan` int(10) UNSIGNED NOT NULL,
  `posisi_lowongan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuota` int(11) NOT NULL,
  `berlaku_sampai` date NOT NULL,
  `deskripsi_pekerjaan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_persyaratan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_lowongan` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `posisi_lowongan`, `kuota`, `berlaku_sampai`, `deskripsi_pekerjaan`, `deskripsi_persyaratan`, `status_lowongan`, `created_at`, `updated_at`) VALUES
(8, 'programmer', 2, '2021-12-25', '<p>ngoding bro</p>', '<ul>\r\n	<li>ganteng</li>\r\n	<li>cantik</li>\r\n</ul>', NULL, '2021-12-16 18:37:31', '2021-12-16 18:37:31'),
(9, 'akutansi', 4, '2021-12-16', '<p>asdasd</p>', '<p>asdasdasd</p>', NULL, '2021-12-16 18:37:46', '2021-12-16 18:37:46'),
(10, 'Finance', 3, '2021-12-23', '<p>asdasd</p>', '<p>asdasdasd</p>', NULL, '2021-12-16 18:37:59', '2021-12-16 18:37:59');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_11_01_042028_create_lowongan_table', 1),
(4, '2021_11_01_042029_create_jadwal_tes_table', 1),
(5, '2021_11_01_042127_create_daftar_soal_table', 1),
(6, '2021_11_01_042249_create_pelamar_table', 1),
(7, '2021_11_01_053408_create_kriteria_table', 1),
(8, '2021_11_01_053520_create_bobot_kriteria_table', 1),
(9, '2021_11_01_053524_create_nilai_alternatif_table', 1),
(10, '2021_11_08_071808_create_hasil_tes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatif`
--

CREATE TABLE `nilai_alternatif` (
  `id_nilai_alternatif` int(10) UNSIGNED NOT NULL,
  `id_pelamar` int(10) UNSIGNED DEFAULT NULL,
  `id_bobot_kriteria` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_alternatif`
--

INSERT INTO `nilai_alternatif` (`id_nilai_alternatif`, `id_pelamar`, `id_bobot_kriteria`, `updated_at`, `created_at`) VALUES
(16, 16, 27, '2021-12-16 19:02:29', '2021-12-16 19:02:29'),
(17, 16, 30, '2021-12-16 19:02:29', '2021-12-16 19:02:29'),
(18, 16, 33, '2021-12-16 19:02:29', '2021-12-16 19:02:29'),
(25, 19, 28, '2021-12-19 07:56:10', '2021-12-19 07:56:10'),
(26, 19, 32, '2021-12-19 07:56:10', '2021-12-19 07:56:10'),
(27, 19, 33, '2021-12-19 07:56:10', '2021-12-19 07:56:10'),
(28, 20, 27, '2021-12-21 04:16:15', '2021-12-21 04:16:15'),
(29, 20, 32, '2021-12-21 04:16:15', '2021-12-21 04:16:15'),
(30, 20, 33, '2021-12-21 04:16:15', '2021-12-21 04:16:15');

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
-- Table structure for table `pelamar`
--

CREATE TABLE `pelamar` (
  `id_pelamar` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_lowongan` int(10) UNSIGNED NOT NULL,
  `nama_pelamar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ijazah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pas_foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seleksi_satu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seleksi_dua` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelamar`
--

INSERT INTO `pelamar` (`id_pelamar`, `id_user`, `id_lowongan`, `nama_pelamar`, `tanggal_lahir`, `tempat_lahir`, `agama`, `alamat`, `no_telepon`, `jenis_kelamin`, `cv`, `ijazah`, `pas_foto`, `seleksi_satu`, `seleksi_dua`, `created_at`, `updated_at`) VALUES
(16, 3, 8, 'faris', '2021-11-30', 'Surabaya', 'Islam', 'jl.asdasdasd', '123123123', 'Laki-laki', '1639706549.pdf', '1639706549.pdf', '1639706549.png', 'Diterima', NULL, '2021-12-16 19:02:29', '2021-12-19 08:30:54'),
(19, 5, 8, 'asd', '2021-11-30', 'sby', 'Kristen', '1sasdasd', '123123', 'Laki-laki', '1639925770.pdf', '1639925770.pdf', '1639925770.png', 'Diterima', NULL, '2021-12-19 07:56:10', '2021-12-21 08:34:04'),
(20, 6, 8, 'new', '2021-11-30', 'sby', 'Kristen', 'asdasd', '12312', 'Laki-laki', '1640085375.pdf', '1640085375.pdf', '1640085375.jpg', 'Diterima', NULL, '2021-12-21 04:16:15', '2021-12-21 04:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$X.mbOLyNUwI0JEx2z8kTmOmCF0yEObyfs3BXuqFL499qZRDnEmVAi', '2zp8eUbtFXrQE30wtrIpLELkQaHaK8jBDyWnnMqbl67rMHrjZkyXR5TTtdAP', NULL, NULL),
(3, 'Faris', 'customer', 'faris.riskilail@gmail.com', '$2y$10$RfanrhxaxM9xrQ5vu2xf6.cf9GTjW4AQsjJZBpT8m.62GpG0mTX/K', 'UNzLN4BK8BaDQe3IqXokGfjNILQ7YBRiu3YXaIffMSSSFMz9hsCsydf4EA8X', '2021-11-20 07:38:55', '2021-11-20 07:38:55'),
(4, 'faris', 'customer', 'faris@gmail.com', '$2y$10$T2i3J5m3LAibFLGqhDTMdOdokgQw54WHdDHI3iZcrTPpJNPY9/umK', 'hjs7i0XpNZlIJyWQiVByklVX6FJkPEBeKgDxsJgqOH9OxVBI4ds4k3lzCgsV', '2021-12-01 02:24:57', '2021-12-01 02:24:57'),
(5, 'user', 'customer', 'user@gmail.com', '$2y$10$jt8auyHBLqqa2r6aH6oILuzmXtw5w/.94lKit74jcgcAgldus3Lh.', 'spzq3VDHSD1W1TC8JDjpq2DOiODc2NKW0nwIiKX7TRIiPwAE2ixWAyJ3Yh5R', '2021-12-02 21:41:13', '2021-12-02 21:41:13'),
(6, 'new', 'customer', 'new@gmail.com', '$2y$10$.J1XH4m7oWilFlbTSfMni.LbDuPigYG.w0WTajqetg6SKY.sns5jm', NULL, '2021-12-08 05:08:09', '2021-12-08 05:08:09'),
(7, 'baru', 'customer', 'baru@gmail.com', '$2y$10$FTvCFmfgPhLFNxMBxZacGuvNqxKKeaYdYCRGGGrsQ3Ev5zB4Dc0lW', NULL, '2021-12-19 08:25:15', '2021-12-19 08:25:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot_kriteria`
--
ALTER TABLE `bobot_kriteria`
  ADD PRIMARY KEY (`id_bobot_kriteria`),
  ADD KEY `bobot_kriteria_id_kriteria_index` (`id_kriteria`);

--
-- Indexes for table `daftar_soal`
--
ALTER TABLE `daftar_soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `daftar_soal_id_jadwal_tes_index` (`id_jadwal_tes`);

--
-- Indexes for table `hasil_tes`
--
ALTER TABLE `hasil_tes`
  ADD PRIMARY KEY (`id_hasil_tes`),
  ADD KEY `hasil_tes_id_soal_index` (`id_soal_tes`),
  ADD KEY `hasil_tes_id_pelamar_index` (`id_pelamar`),
  ADD KEY `id_lowongan` (`id_lowongan`);

--
-- Indexes for table `jadwal_tes`
--
ALTER TABLE `jadwal_tes`
  ADD PRIMARY KEY (`id_jadwal_tes`),
  ADD KEY `jadwal_tes_id_lowongan_index` (`id_lowongan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD KEY `kriteria_id_lowongan_index` (`id_lowongan`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id_lowongan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD PRIMARY KEY (`id_nilai_alternatif`),
  ADD KEY `nilai_alternatif_id_pelamar_index` (`id_pelamar`),
  ADD KEY `nilai_alternatif_id_bobot_kriteria_index` (`id_bobot_kriteria`),
  ADD KEY `id_bobot_kriteria` (`id_bobot_kriteria`),
  ADD KEY `id_bobot_kriteria_2` (`id_bobot_kriteria`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id_pelamar`),
  ADD KEY `pelamar_id_user_index` (`id_user`),
  ADD KEY `pelamar_id_lowongan_index` (`id_lowongan`);

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
-- AUTO_INCREMENT for table `bobot_kriteria`
--
ALTER TABLE `bobot_kriteria`
  MODIFY `id_bobot_kriteria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `daftar_soal`
--
ALTER TABLE `daftar_soal`
  MODIFY `id_soal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `hasil_tes`
--
ALTER TABLE `hasil_tes`
  MODIFY `id_hasil_tes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `jadwal_tes`
--
ALTER TABLE `jadwal_tes`
  MODIFY `id_jadwal_tes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id_lowongan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id_nilai_alternatif` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `id_pelamar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bobot_kriteria`
--
ALTER TABLE `bobot_kriteria`
  ADD CONSTRAINT `bobot_kriteria_id_kriteria_foreign` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `daftar_soal`
--
ALTER TABLE `daftar_soal`
  ADD CONSTRAINT `daftar_soal_id_jadwal_tes_foreign` FOREIGN KEY (`id_jadwal_tes`) REFERENCES `jadwal_tes` (`id_jadwal_tes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hasil_tes`
--
ALTER TABLE `hasil_tes`
  ADD CONSTRAINT `hasil_tes_id_pelamar_foreign` FOREIGN KEY (`id_pelamar`) REFERENCES `pelamar` (`id_pelamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_tes_id_soal_foreign` FOREIGN KEY (`id_soal_tes`) REFERENCES `daftar_soal` (`id_soal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_tes`
--
ALTER TABLE `jadwal_tes`
  ADD CONSTRAINT `jadwal_tes_id_lowongan_foreign` FOREIGN KEY (`id_lowongan`) REFERENCES `lowongan` (`id_lowongan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD CONSTRAINT `kriteria_id_lowongan_foreign` FOREIGN KEY (`id_lowongan`) REFERENCES `lowongan` (`id_lowongan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD CONSTRAINT `nilai_alternatif_id_bobot_kriteria_foreign` FOREIGN KEY (`id_bobot_kriteria`) REFERENCES `bobot_kriteria` (`id_bobot_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_alternatif_id_pelamar_foreign` FOREIGN KEY (`id_pelamar`) REFERENCES `pelamar` (`id_pelamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD CONSTRAINT `pelamar_id_lowongan_foreign` FOREIGN KEY (`id_lowongan`) REFERENCES `lowongan` (`id_lowongan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelamar_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
