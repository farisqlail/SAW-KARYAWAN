-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 08:16 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sawkaryawan`
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
(1, 1, 'SMA/SMK', 1, '2021-12-22 21:21:13', '2021-12-22 21:21:13'),
(2, 1, 'D1/D2', 2, '2021-12-22 21:21:27', '2021-12-22 21:21:27'),
(3, 1, 'S1', 3, '2021-12-22 21:21:38', '2021-12-22 21:21:38'),
(4, 1, '>S1', 5, '2021-12-22 21:21:51', '2021-12-22 21:21:51'),
(5, 2, 'Belum Ada', 1, '2021-12-22 21:22:30', '2021-12-22 21:22:30'),
(6, 2, '<1Tahun', 2, '2021-12-22 21:22:42', '2021-12-22 21:22:42'),
(7, 2, '<2 Tahun', 3, '2021-12-22 21:22:55', '2021-12-22 21:22:55'),
(8, 2, '>2 Tahun', 4, '2021-12-22 21:23:09', '2021-12-22 21:23:09');

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
(1, 1, 'Buatlah Pivot Tabel', '1640233449.docx', 60, '2021-12-22 21:24:09', '2021-12-22 21:24:09'),
(2, 1, 'Buatlah Diagram Batang', '1640233470.docx', 40, '2021-12-22 21:24:30', '2021-12-22 21:24:30');

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
(1, 1, 1, 1, '1640233938.docx', 90, '2021-12-22 21:31:55', '2021-12-22 21:34:06'),
(2, 2, 1, 1, '1640233962.pdf', 80, '2021-12-22 21:32:42', '2021-12-22 21:34:25');

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
(1, 1, '2021-12-23 11:23:00', '2021-12-24 11:23:00', '2021-12-22 21:23:35', '2021-12-22 21:23:35');

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
(1, 1, 'Pendidikan terakhir', 'benefit', 65, '2021-12-22 21:20:51', '2021-12-22 21:20:51'),
(2, 1, 'Pengalaman Kerja', 'benefit', 35, '2021-12-22 21:22:11', '2021-12-22 21:22:11');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `id_lowongan` int(10) UNSIGNED NOT NULL,
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

INSERT INTO `lowongan` (`id_lowongan`, `posisi_lowongan`, `berlaku_sampai`, `deskripsi_pekerjaan`, `deskripsi_persyaratan`, `status_lowongan`, `created_at`, `updated_at`) VALUES
(1, 'Finance', '2021-12-31', '<ul>\r\n	<li>Handling Account Payable, verifying invoices and performing reconciliations</li>\r\n	<li>Updating Accounts Receivable and issuing invoices.</li>\r\n	<li>Preparing weekly payment request.</li>\r\n	<li>Managing prepaid expenses and petty cash</li>\r\n	<li>Perform daily bank reconciliation</li>\r\n</ul>', '<ul>\r\n	<li>Candidate must possess a Bachelor&#39;s Degree or equivalent in Economics field</li>\r\n	<li>Fresh Graduate are welcome to apply</li>\r\n	<li>Understand about tax is a plus.</li>\r\n	<li>Good in English Written and Verbal</li>\r\n	<li>Good analytical and communication skills</li>\r\n</ul>', NULL, '2021-12-22 21:20:17', '2021-12-22 21:20:17');

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
(1, 1, 3, '2021-12-22 21:26:24', '2021-12-22 21:26:24'),
(2, 1, 8, '2021-12-22 21:26:24', '2021-12-22 21:26:24'),
(3, 2, 1, '2021-12-22 21:27:55', '2021-12-22 21:27:55'),
(4, 2, 5, '2021-12-22 21:27:55', '2021-12-22 21:27:55'),
(5, 3, 2, '2021-12-23 04:19:47', '2021-12-23 04:19:47'),
(6, 3, 6, '2021-12-23 04:19:47', '2021-12-23 04:19:47');

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
(1, 2, 1, 'Altamarin Adji', '2020-06-09', 'Samarinda', 'Islam', 'Jl Melati', '081246555667', 'Laki-laki', '1640233583.pdf', '1640233584.pdf', '1640233584.png', 'Diterima', 'Ditolak', '2021-12-22 21:26:24', '2021-12-22 21:35:18'),
(2, 3, 1, 'udin', '2021-12-07', 'Samarinda', 'Islam', 'Jl Kembar', '081233233323', 'Laki-laki', '1640233675.pdf', '1640233675.pdf', '1640233675.png', 'Ditolak', NULL, '2021-12-22 21:27:55', '2021-12-22 21:28:42'),
(3, 4, 1, 'faris', '2021-12-01', 'sby', 'Kristen', 'asdsda', '12323', 'Laki-laki', '1640258387.pdf', '1640258387.pdf', '1640258387.png', NULL, NULL, '2021-12-23 04:19:47', '2021-12-23 04:19:47');

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
(1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$X.mbOLyNUwI0JEx2z8kTmOmCF0yEObyfs3BXuqFL499qZRDnEmVAi', 'UxsNLi7oKvqQwhAecKOhgdKDoLThenXgvSXoXOuw6iDEsSn6EKWPH8qUyPlp', NULL, NULL),
(2, 'Altamarin', 'customer', 'altamarin14@gmail.com', '$2y$10$8XEawByNZ0UtYkgoktCMWO7B0xNF5yBPxk3KIvTsDH82LvDh.koq2', NULL, '2021-12-22 21:25:13', '2021-12-22 21:25:13'),
(3, 'udin', 'customer', 'udin@gmail.com', '$2y$10$bHEuTuiAEukyxQsL5VMw.e9vs2njnQ0lKhi7GgIvPyKeIF6JW6OUK', NULL, '2021-12-22 21:26:46', '2021-12-22 21:26:46'),
(4, 'faris', 'customer', 'faris.riskilail@gmail.com', '$2y$10$V10l26cBMJrMU/bjDjXmwOa3fjeJ/9Yaxlhx1ZH.UmYFq4/v5mbs2', NULL, '2021-12-23 04:12:59', '2021-12-23 04:12:59');

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
  MODIFY `id_bobot_kriteria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `daftar_soal`
--
ALTER TABLE `daftar_soal`
  MODIFY `id_soal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hasil_tes`
--
ALTER TABLE `hasil_tes`
  MODIFY `id_hasil_tes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal_tes`
--
ALTER TABLE `jadwal_tes`
  MODIFY `id_jadwal_tes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id_lowongan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id_nilai_alternatif` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `id_pelamar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
