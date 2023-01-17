-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 10:umkmsaw20 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot_kriteria`
--

CREATE TABLE `bobot_kriteria` (
  `id` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `nama_bobot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_bobot` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bobot_kriteria`
--

INSERT INTO `bobot_kriteria` (`id`, `id`, `nama_bobot`, `jumlah_bobot`, `created_at`, `updated_at`) VALUES
(1, 1, 'SMA/SMK', 1, '2021-12-22 21:21:13', '2021-12-22 21:21:13'),
(2, 1, 'D1/D2', 2, '2021-12-22 21:21:27', '2021-12-22 21:21:27'),
(3, 1, 'S1', 4, '2021-12-22 21:21:38', '2022-04-27 04:43:55'),
(4, 1, 'S2', 5, '2021-12-22 21:21:51', '2022-04-28 23:30:30'),
(5, 2, 'Belum Ada', 1, '2021-12-22 21:22:30', '2021-12-22 21:22:30'),
(6, 2, 'Dibawah 1Tahun', 2, '2021-12-22 21:22:42', '2022-05-06 01:08:23'),
(7, 2, 'Diatas 1 Tahun', 3, '2021-12-22 21:22:55', '2022-05-06 01:08:33'),
(11, 1, 'D3', 3, '2022-04-27 04:44:06', '2022-04-27 04:44:06'),
(12, 7, 'Microsoft office dan program accounting', 3, '2022-06-20 21:28:12', '2022-06-26 04:06:16'),
(13, 7, 'Microsoft office', 2, '2022-06-20 21:28:28', '2022-06-26 04:06:31'),
(14, 7, 'Tidak ada dalam daftar', 1, '2022-06-20 21:30:50', '2022-06-26 04:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_soal`
--

CREATE TABLE `daftar_soal` (
  `id` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `soal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_soal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot_soal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftar_soal`
--

INSERT INTO `daftar_soal` (`id`, `id`, `soal`, `file_soal`, `bobot_soal`, `created_at`, `updated_at`) VALUES
(1, 1, 'Buatlah Pivot Tabel', '1656138110.csv', 60, '2021-12-22 21:24:09', '2022-06-24 23:21:50'),
(2, 1, 'Buatlah Diagram Batang', '1656138123.csv', 40, '2021-12-22 21:24:30', '2022-06-24 23:22:03');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_tes`
--

CREATE TABLE `hasil_tes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED DEFAULT NULL,
  `id` int(10) UNSIGNED DEFAULT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `jawaban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hasil_tes`
--

INSERT INTO `hasil_tes` (`id`, `id`, `id`, `id`, `jawaban`, `nilai`, `created_at`, `updated_at`) VALUES
(25, 1, 23, 1, '1656140634.csv', 80, '2022-06-25 00:03:54', '2022-06-26 20:18:20'),
(26, 2, 23, 1, '1656140644.csv', 80, '2022-06-25 00:04:04', '2022-06-26 20:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_tes`
--

CREATE TABLE `jadwal_tes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `tanggal` datetime NOT NULL,
  `durasi_tes` datetime NOT NULL,
  `tanggal_notif` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_tes`
--

INSERT INTO `jadwal_tes` (`id`, `id`, `tanggal`, `durasi_tes`, `tanggal_notif`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-12-23 11:23:00', '2022-06-30 11:23:00', '2022-07-01 00:00:00', '2021-12-22 21:23:35', '2022-07-01 00:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kriteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atribut_kriteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot_preferensi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `id`, `nama_kriteria`, `atribut_kriteria`, `bobot_preferensi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pendidikan terakhir', 'benefit', 45, '2021-12-22 21:20:51', '2022-06-20 21:27:45'),
(2, 1, 'Pengalaman Kerja', 'benefit', 35, '2021-12-22 21:22:11', '2022-04-27 04:43:38'),
(7, 1, 'Software yang Dikuasai', 'benefit', 20, '2022-06-20 21:27:35', '2022-07-01 05:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `id` int(10) UNSIGNED NOT NULL,
  `posisi_lowongan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `lowongan` (`id`, `posisi_lowongan`, `berlaku_sampai`, `deskripsi_pekerjaan`, `deskripsi_persyaratan`, `status_lowongan`, `created_at`, `updated_at`) VALUES
(1, 'Finance', '2022-06-29', '<ul>\r\n	<li>Handling Account Payable, verifying invoices and performing reconciliations</li>\r\n	<li>Updating Accounts Receivable and issuing invoices.</li>\r\n	<li>Preparing weekly payment request.</li>\r\n	<li>Managing prepaid expenses and petty cash</li>\r\n	<li>Perform daily bank reconciliation</li>\r\n</ul>', '<ul>\r\n	<li>Candidate must possess a Bachelor&#39;s Degree or equivalent in Economics field</li>\r\n	<li>Fresh Graduate are welcome to apply</li>\r\n	<li>Understand about tax is a plus.</li>\r\n	<li>Good in English Written and Verbal</li>\r\n	<li>Good analytical and communication skills</li>\r\n</ul>', 'Seleksi Selesai', '2021-12-22 21:20:17', '2022-07-01 00:29:28'),
(6, 'Sepong online', '2022-07-15', '<p>dasdasd</p>', '<p>asdasdasd</p>', NULL, '2022-06-30 23:59:37', '2022-06-30 23:59:37');

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
  `id` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED DEFAULT NULL,
  `id` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_alternatif`
--

INSERT INTO `nilai_alternatif` (`id`, `id`, `id`, `updated_at`, `created_at`) VALUES
(48, 23, 1, '2022-06-24 23:38:01', '2022-06-24 23:38:01'),
(49, 23, 6, '2022-06-24 23:38:01', '2022-06-24 23:38:01'),
(50, 23, 13, '2022-06-24 23:38:01', '2022-06-24 23:38:01'),
(51, 24, 1, '2022-06-24 23:38:56', '2022-06-24 23:38:56'),
(52, 24, 5, '2022-06-24 23:38:56', '2022-06-24 23:38:56'),
(53, 24, 14, '2022-06-24 23:38:56', '2022-06-24 23:38:56'),
(54, 25, 1, '2022-06-24 23:40:22', '2022-06-24 23:40:22'),
(55, 25, 5, '2022-06-24 23:40:22', '2022-06-24 23:40:22'),
(56, 25, 12, '2022-06-24 23:40:22', '2022-06-24 23:40:22'),
(75, 32, 3, '2022-07-01 05:08:42', '2022-07-01 05:08:42'),
(76, 32, 6, '2022-07-01 05:08:42', '2022-07-01 05:08:42'),
(77, 32, 12, '2022-07-01 05:08:42', '2022-07-01 05:08:42');

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
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
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
  `status_wawancara` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_dokumen` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_tes` int(11) DEFAULT NULL,
  `hasil_wawancara` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelamar`
--

INSERT INTO `pelamar` (`id`, `id_user`, `id`, `nama_pelamar`, `tanggal_lahir`, `tempat_lahir`, `agama`, `alamat`, `no_telepon`, `jenis_kelamin`, `cv`, `ijazah`, `pas_foto`, `seleksi_satu`, `seleksi_dua`, `status_wawancara`, `status_dokumen`, `nilai_tes`, `hasil_wawancara`, `created_at`, `updated_at`) VALUES
(23, 16, 1, 'Kevin Ananta', '1999-04-12', 'Surabaya', 'Islam', 'Jl Mawar No. 11', '082133213323', 'Laki-laki', '1656139081.pdf', '1656139081.pdf', '1656139081.png', 'Diterima', 'Diterima', 'Diterima', 'Dokumen Valid', 80, '<p>asdasczxczxc</p>', '2022-06-24 23:38:01', '2022-07-01 01:06:37'),
(24, 17, 1, 'Aldi', '2022-06-08', 'Surabaya', 'Islam', 'SDJ', '089988998899', 'Laki-laki', '1656139136.pdf', '1656139136.pdf', '1656139136.png', 'Ditolak', 'Ditolak', '0', 'Dokumen Valid', NULL, '', '2022-06-24 23:38:56', '2022-07-01 00:29:34'),
(25, 10, 1, 'Alex Indra', '2022-04-06', 'Surabaya', 'Islam', 'Melati 2', '081233223322', 'Laki-laki', '1656139222.pdf', '1656139222.pdf', '1656139222.jpg', 'Ditolak', 'Ditolak', '0', 'Dokumen Tidak Valid', NULL, '', '2022-06-24 23:40:22', '2022-07-01 00:29:40'),
(32, 9, 1, 'Altamarin Adji', '1999-04-21', 'Surabaya', 'Islam', 'Jl Kembang No. 9', '082133213325', 'Laki-laki', '1656677322.pdf', '1656677322.pdf', '1656677322.png', 'Diterima', 'Ditolak', '0', 'Dokumen Valid', NULL, '', '2022-07-01 05:08:42', '2022-07-01 00:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telepon` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `tanggal_lahir`, `tempat_lahir`, `agama`, `alamat`, `no_telepon`, `jenis_kelamin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$X.mbOLyNUwI0JEx2z8kTmOmCF0yEObyfs3BXuqFL499qZRDnEmVAi', 'liRD78GCi4maiVtWH3WG5okPuhVBfsPn0OG8JEbde4T8F6nS4GYpkYjrkIIA', NULL, NULL),
(2, 'Altamarin', 'customer', 'farisqlail@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$8XEawByNZ0UtYkgoktCMWO7B0xNF5yBPxk3KIvTsDH82LvDh.koq2', NULL, '2021-12-22 21:25:13', '2021-12-22 21:25:13'),
(3, 'udin', 'customer', 'udin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$bHEuTuiAEukyxQsL5VMw.e9vs2njnQ0lKhi7GgIvPyKeIF6JW6OUK', NULL, '2021-12-22 21:26:46', '2021-12-22 21:26:46'),
(4, 'faris', 'customer', 'faris.riskilail@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'faris123', NULL, '2021-12-23 04:12:59', '2021-12-23 04:12:59'),
(5, 'faris', 'customer', 'user@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$YezkGzmV8VEx2.v6IGbDJeWVtosBnxRKWi4TsuEEUYLD8W6tfe5Fm', NULL, '2022-01-04 00:01:30', '2022-01-04 00:01:30'),
(6, 'fadil', 'customer', 'fadil@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$RM4Zxhf61XO.IMaf1Zg1v.RpjVEJSQbtPTDpit4QdYwcvt8kK0yIm', NULL, '2022-01-10 07:52:34', '2022-01-10 07:52:34'),
(7, 'faris', 'customer', 'faris1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$qSQyzjk9KVE7Iy6PTenle.cYxz89l0eBG3enfPjF6Hndv0RoFomqm', NULL, '2022-02-16 22:19:30', '2022-02-16 22:19:30'),
(8, 'Faris kuku', 'customer', 'fakuh@gmail.com', '2022-03-29', 'Surabaya', 'Kristen', 'bronggalan', '1231231233123', 'Laki-laki', '$2y$10$iWFfEqiyxcmKp/mFyyH5O.vTUYaC86.21pCYqCApDOCdicdfS4yqu', NULL, '2022-04-20 08:07:49', '2022-04-20 08:07:49'),
(9, 'Altamarin Adji', 'customer', 'altamarin21032000@gmail.com', '1999-04-21', 'Surabaya', 'Islam', 'Jl Kembang No. 9', '082133213325', 'Laki-laki', '$2y$10$7s9s2oegFst30uiy3pHlF.xTBOZSjt9SM.pzGKcTL9gb5D/U.4vHW', NULL, '2022-04-22 23:11:55', '2022-04-22 23:11:55'),
(10, 'Alex Indra', 'customer', 'alex@gmail.com', '2022-04-06', 'Surabaya', 'Islam', 'Melati 2', '081233223322', 'Laki-laki', '$2y$10$I/20xIMGWb8ED/L/hvPdxOCyX8gGNJL.HCWRunpMEsxWEYNkdZuda', NULL, '2022-04-27 04:47:29', '2022-04-27 04:47:29'),
(11, 'Abu Hanif', 'customer', 'abu@gmail.com', '2022-04-05', 'Samarinda', 'Kristen', 'jl.kuncup12', '081233223322', 'Laki-laki', '$2y$10$.qKjNriE7r7Bbv/PDa7YS.xDNNmBEo8zEGSMOXbfisEq/EAp9W.Bu', NULL, '2022-04-27 04:49:05', '2022-04-27 04:49:05'),
(12, 'Andika', 'customer', 'andika@gmail.com', '2022-04-12', 'Surabaya', 'Islam', 'kembang kuning', '081233223322', 'Laki-laki', '$2y$10$cK37NVyz6alc9b7y8LrUru7f2kSCAn4PmZChTL78SzEd3BQoMhDae', NULL, '2022-04-27 04:53:26', '2022-04-27 04:53:26'),
(13, 'Ikram Arif', 'customer', 'ikram@gmail.com', '2022-04-25', 'Samarinda', 'Islam', 'Melati 22', '081233223322', 'Laki-laki', '$2y$10$XNEAHLLHtsGqMqVu/LgBdemRvIMmlTEnYXxp2Ql0yKyEF.6xfndX6', NULL, '2022-04-27 04:55:23', '2022-04-27 04:55:23'),
(14, 'Ilham', 'customer', 'ilham@gmail.com', '2022-03-29', 'Surabaya', 'Islam', 'jl.kuncup12', '081233223322', 'Laki-laki', '$2y$10$vsJ2kRhwU5666IBzXQW3ZOPN4XESgzLYxTwuf1Pp4b1YpWv8Rp3z6', NULL, '2022-04-28 08:02:43', '2022-04-28 08:02:43'),
(15, 'Iwan Arif', 'customer', 'Iwan@gmail.com', '1999-05-22', 'Surabaya', 'Islam', 'Jl Dusun No. 10', '082133213321', 'Laki-laki', '$2y$10$3WsvaB0INCjBjbPtAkBj0ujmUy5nHQ0Tg17J3/27SXrgDpZ9MZN9y', NULL, '2022-05-06 01:04:37', '2022-05-06 01:04:37'),
(16, 'Kevin Ananta', 'customer', 'Kevin@gmail.com', '1999-04-12', 'Surabaya', 'Islam', 'Jl Mawar No. 11', '082133213323', 'Laki-laki', '$2y$10$KX5KBQ4MQghzfAvh6HtQKe/1Xt1H3DgX3f7dxckH5oYzwRTTKwc/e', NULL, '2022-05-06 01:05:55', '2022-05-06 01:05:55'),
(17, 'Aldi', 'customer', 'aldi@gmail.com', '2022-06-08', 'Surabaya', 'Islam', 'SDJ', '089988998899', 'Laki-laki', '$2y$10$OnMZgdKRBJXukKs7DkJYiuZyGgWxxOX4lNqxt9XBzc5OdJl.IFaHm', NULL, '2022-06-10 22:55:59', '2022-06-10 22:55:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot_kriteria`
--
ALTER TABLE `bobot_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bobot_kriteria_id_index` (`id`);

--
-- Indexes for table `daftar_soal`
--
ALTER TABLE `daftar_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daftar_soal_id_index` (`id`);

--
-- Indexes for table `hasil_tes`
--
ALTER TABLE `hasil_tes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hasil_tes_id_index` (`id`),
  ADD KEY `hasil_tes_id_index` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `jadwal_tes`
--
ALTER TABLE `jadwal_tes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_tes_id_index` (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_id_index` (`id`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_alternatif_id_index` (`id`),
  ADD KEY `nilai_alternatif_id_index` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelamar_id_user_index` (`id_user`),
  ADD KEY `pelamar_id_index` (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `daftar_soal`
--
ALTER TABLE `daftar_soal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hasil_tes`
--
ALTER TABLE `hasil_tes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `jadwal_tes`
--
ALTER TABLE `jadwal_tes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bobot_kriteria`
--
ALTER TABLE `bobot_kriteria`
  ADD CONSTRAINT `bobot_kriteria_id_foreign` FOREIGN KEY (`id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `daftar_soal`
--
ALTER TABLE `daftar_soal`
  ADD CONSTRAINT `daftar_soal_id_foreign` FOREIGN KEY (`id`) REFERENCES `jadwal_tes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hasil_tes`
--
ALTER TABLE `hasil_tes`
  ADD CONSTRAINT `hasil_tes_id_foreign` FOREIGN KEY (`id`) REFERENCES `pelamar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_tes_id_foreign` FOREIGN KEY (`id`) REFERENCES `daftar_soal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_tes`
--
ALTER TABLE `jadwal_tes`
  ADD CONSTRAINT `jadwal_tes_id_foreign` FOREIGN KEY (`id`) REFERENCES `lowongan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD CONSTRAINT `kriteria_id_foreign` FOREIGN KEY (`id`) REFERENCES `lowongan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD CONSTRAINT `nilai_alternatif_id_foreign` FOREIGN KEY (`id`) REFERENCES `bobot_kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_alternatif_id_foreign` FOREIGN KEY (`id`) REFERENCES `pelamar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD CONSTRAINT `pelamar_id_foreign` FOREIGN KEY (`id`) REFERENCES `lowongan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelamar_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
saw