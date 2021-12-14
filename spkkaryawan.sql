-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Des 2021 pada 11.19
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

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
-- Struktur dari tabel `bobot_kriteria`
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
-- Dumping data untuk tabel `bobot_kriteria`
--

INSERT INTO `bobot_kriteria` (`id_bobot_kriteria`, `id_kriteria`, `nama_bobot`, `jumlah_bobot`, `created_at`, `updated_at`) VALUES
(17, 5, 'matematika', 5, '2021-12-04 00:43:18', '2021-12-04 00:43:18'),
(18, 5, 'algoritma', 3, '2021-12-04 00:43:27', '2021-12-04 00:43:27'),
(20, 7, 'cantik', 3, '2021-12-04 00:44:23', '2021-12-14 01:13:47'),
(21, 8, 'ganteng', 5, '2021-12-04 01:46:55', '2021-12-04 01:46:55'),
(22, 8, 'skipp', 3, '2021-12-04 01:48:20', '2021-12-04 01:55:55'),
(27, 5, 'Gabisa', 1, '2021-12-14 01:13:31', '2021-12-14 01:13:31'),
(28, 7, 'Sangat Menawan', 5, '2021-12-14 01:13:59', '2021-12-14 01:13:59'),
(29, 7, 'B aja', 1, '2021-12-14 01:14:08', '2021-12-14 01:14:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_soal`
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
-- Dumping data untuk tabel `daftar_soal`
--

INSERT INTO `daftar_soal` (`id_soal`, `id_jadwal_tes`, `soal`, `file_soal`, `bobot_soal`, `created_at`, `updated_at`) VALUES
(8, 4, 'apa', '1638622383.pdf', 50, '2021-12-04 05:53:03', '2021-12-04 05:53:03'),
(9, 4, 'opo', '1638940061.pdf', 51, '2021-12-04 05:53:20', '2021-12-07 22:07:41'),
(12, 10, 'Buatlah Pivot Table', '1639471745.pdf', 40, '2021-12-14 01:49:05', '2021-12-14 01:49:05'),
(13, 10, 'Ubah data berikut menjadi chart', '1639472057.pkt', 60, '2021-12-14 01:54:17', '2021-12-14 01:54:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_tes`
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
-- Dumping data untuk tabel `hasil_tes`
--

INSERT INTO `hasil_tes` (`id_hasil_tes`, `id_soal_tes`, `id_pelamar`, `id_lowongan`, `jawaban`, `nilai`, `created_at`, `updated_at`) VALUES
(3, 8, 13, 5, '1638838328.pdf', 100, '2021-12-06 17:52:08', '2021-12-09 20:48:21'),
(4, 8, 13, 5, '1638838354.pdf', 90, '2021-12-06 17:52:34', '2021-12-06 17:52:34'),
(5, 8, 14, 5, '1639107117.pdf', 60, '2021-12-09 20:31:57', '2021-12-09 23:13:19'),
(6, 8, 14, 5, '1639107145.pdf', 90, '2021-12-09 20:32:25', '2021-12-09 23:17:22'),
(8, 12, 18, 4, '1639472354.docx', 80, '2021-12-14 01:59:14', '2021-12-14 02:08:33'),
(9, 12, 19, 4, '1639472632.docx', 60, '2021-12-14 02:03:52', '2021-12-14 02:08:39'),
(10, 12, 19, 4, '1639472643.docx', 90, '2021-12-14 02:04:03', '2021-12-14 02:08:45'),
(12, 12, 18, 4, '1639473224.docx', 90, '2021-12-14 02:13:44', '2021-12-14 02:14:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_tes`
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
-- Dumping data untuk tabel `jadwal_tes`
--

INSERT INTO `jadwal_tes` (`id_jadwal_tes`, `id_lowongan`, `tanggal`, `durasi_tes`, `created_at`, `updated_at`) VALUES
(4, 5, '2021-12-11 00:01:00', '2021-12-13 00:00:00', '2021-12-04 05:35:18', '2021-12-07 22:06:44'),
(10, 4, '2021-12-14 15:48:00', '2021-12-15 15:48:00', '2021-12-14 01:48:35', '2021-12-14 01:48:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
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
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `id_lowongan`, `nama_kriteria`, `atribut_kriteria`, `bobot_preferensi`, `created_at`, `updated_at`) VALUES
(5, 4, 'Ngitung', 'benefit', 50, '2021-12-04 00:43:04', '2021-12-04 00:43:04'),
(7, 4, 'gudluking', 'benefit', 50, '2021-12-04 00:44:13', '2021-12-14 01:13:11'),
(8, 5, 'gudluking', 'benefit', 100, '2021-12-04 01:46:38', '2021-12-04 01:46:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lowongan`
--

CREATE TABLE `lowongan` (
  `id_lowongan` int(10) UNSIGNED NOT NULL,
  `posisi_lowongan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuota` int(11) NOT NULL,
  `berlaku_sampai` date NOT NULL,
  `deskripsi_pekerjaan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_persyaratan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `posisi_lowongan`, `kuota`, `berlaku_sampai`, `deskripsi_pekerjaan`, `deskripsi_persyaratan`, `created_at`, `updated_at`) VALUES
(4, 'Finance', 5, '2021-12-17', '<p>Ngitung duit</p>', '<p>asdasdasda</p>', '2021-12-04 00:42:46', '2021-12-04 00:42:46'),
(5, 'programmer', 6, '2021-12-02', '<p>chuakz</p>', '<p>asdasd</p>', '2021-12-04 01:11:03', '2021-12-07 22:01:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
-- Struktur dari tabel `nilai_alternatif`
--

CREATE TABLE `nilai_alternatif` (
  `id_nilai_alternatif` int(10) UNSIGNED NOT NULL,
  `id_pelamar` int(10) UNSIGNED DEFAULT NULL,
  `id_bobot_kriteria` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nilai_alternatif`
--

INSERT INTO `nilai_alternatif` (`id_nilai_alternatif`, `id_pelamar`, `id_bobot_kriteria`, `updated_at`, `created_at`) VALUES
(13, 13, 21, '2021-12-04 01:57:31', '2021-12-04 01:57:31'),
(14, 14, 21, '2021-12-07 22:08:37', '2021-12-07 22:08:37'),
(15, 15, 21, '2021-12-12 21:26:28', '2021-12-12 21:26:28'),
(18, 17, 27, '2021-12-14 01:31:41', '2021-12-14 01:31:41'),
(19, 17, 29, '2021-12-14 01:31:41', '2021-12-14 01:31:41'),
(20, 18, 17, '2021-12-14 01:34:29', '2021-12-14 01:34:29'),
(21, 18, 20, '2021-12-14 01:34:29', '2021-12-14 01:34:29'),
(22, 19, 27, '2021-12-14 01:36:13', '2021-12-14 01:36:13'),
(23, 19, 29, '2021-12-14 01:36:13', '2021-12-14 01:36:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelamar`
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
-- Dumping data untuk tabel `pelamar`
--

INSERT INTO `pelamar` (`id_pelamar`, `id_user`, `id_lowongan`, `nama_pelamar`, `tanggal_lahir`, `tempat_lahir`, `agama`, `alamat`, `no_telepon`, `jenis_kelamin`, `cv`, `ijazah`, `pas_foto`, `seleksi_satu`, `seleksi_dua`, `created_at`, `updated_at`) VALUES
(13, 3, 5, 'faris', '2021-11-30', 'Surabaya', 'Nonis', 'Petemon', '13123', 'Laki-laki', '1638608251.pdf', '1638608251.pdf', '1638608251.png', 'Diterima', 'Diterima', '2021-12-04 01:57:31', '2021-12-09 19:21:07'),
(14, 5, 5, 'asd', '2021-12-16', 'Jombang', 'Islam', 'wheehe', '12312', 'Laki-laki', '1638940117.pdf', '1638940117.pdf', '1638940117.png', 'Ditolak', 'Ditolak', '2021-12-07 22:08:37', '2021-12-13 00:00:43'),
(15, 6, 5, 'asu', '2021-12-14', 'sby', 'Kristen', 'asdasd', '123123123', 'Laki-laki', '1639369588.pdf', '1639369588.pdf', '1639369588.png', 'Ditolak', 'Ditolak', '2021-12-12 21:26:28', '2021-12-13 00:00:47'),
(17, 8, 4, 'udin', '2021-12-15', 'Surabaya', 'Islam', 'jlkkkgggg', '081234321122', 'Laki-laki', '1639470701.pdf', '1639470701.pdf', '1639470701.jpg', NULL, NULL, '2021-12-14 01:31:41', '2021-12-14 01:31:41'),
(18, 9, 4, 'abu', '2021-12-07', 'Surabaya', 'Islam', 'idsdssdjk', '01919919', 'Laki-laki', '1639470869.pdf', '1639470869.pdf', '1639470869.png', 'Diterima', NULL, '2021-12-14 01:34:29', '2021-12-14 01:55:11'),
(19, 7, 4, 'Altamarin', '2021-12-08', 'Surabaya', 'Kristen', 'vcxfdtrdgg', '0987657656', 'Laki-laki', '1639470972.pdf', '1639470972.pdf', '1639470972.png', 'Diterima', NULL, '2021-12-14 01:36:13', '2021-12-14 01:46:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$X.mbOLyNUwI0JEx2z8kTmOmCF0yEObyfs3BXuqFL499qZRDnEmVAi', 'I36t9CbTWByQdMLKhHb5SyBI44IuyHo8zo5haqsZCE9qAqlIYDQM8IeOhgFy', NULL, NULL),
(3, 'Faris', 'customer', 'faris.riskilail@gmail.com', '$2y$10$RfanrhxaxM9xrQ5vu2xf6.cf9GTjW4AQsjJZBpT8m.62GpG0mTX/K', 'VEHUgprfcrULAz8nO6wChhAv70Nj5qZALiTETkUSY1aao95LUN99UpPsMMyt', '2021-11-20 07:38:55', '2021-11-20 07:38:55'),
(4, 'faris', 'customer', 'faris@gmail.com', '$2y$10$T2i3J5m3LAibFLGqhDTMdOdokgQw54WHdDHI3iZcrTPpJNPY9/umK', 'hjs7i0XpNZlIJyWQiVByklVX6FJkPEBeKgDxsJgqOH9OxVBI4ds4k3lzCgsV', '2021-12-01 02:24:57', '2021-12-01 02:24:57'),
(5, 'user', 'customer', 'user@gmail.com', '$2y$10$jt8auyHBLqqa2r6aH6oILuzmXtw5w/.94lKit74jcgcAgldus3Lh.', 'OyTboVOlgarQnB688wIJcckBY4WLRYfrmyvbbSKtV7Yk6hExoksDkxqSMEtw', '2021-12-02 21:41:13', '2021-12-02 21:41:13'),
(6, 'new', 'customer', 'new@gmail.com', '$2y$10$.J1XH4m7oWilFlbTSfMni.LbDuPigYG.w0WTajqetg6SKY.sns5jm', NULL, '2021-12-08 05:08:09', '2021-12-08 05:08:09'),
(7, 'Altamarin', 'customer', 'altamarin14@gmail.com', '$2y$10$m5t76Er2SuRBAlTCT1ubY.Y81XIdxknTMeeqFy6F/lSeSQLBdu5Ne', NULL, '2021-12-14 01:10:11', '2021-12-14 01:10:11'),
(8, 'udin', 'customer', 'udin@gmail.com', '$2y$10$KaLG3UhNY5i3wyKspEKpF.RCr8BTU5DVY/cslAN.V/0r3grWPH/L.', NULL, '2021-12-14 01:30:08', '2021-12-14 01:30:08'),
(9, 'abu', 'customer', 'abu@gmail.com', '$2y$10$cylCsuVxiyss/5flWO9rZue/WcYAd7WQ9yebcQjK2zxHyUyqE4O62', NULL, '2021-12-14 01:33:32', '2021-12-14 01:33:32');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bobot_kriteria`
--
ALTER TABLE `bobot_kriteria`
  ADD PRIMARY KEY (`id_bobot_kriteria`),
  ADD KEY `bobot_kriteria_id_kriteria_index` (`id_kriteria`);

--
-- Indeks untuk tabel `daftar_soal`
--
ALTER TABLE `daftar_soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `daftar_soal_id_jadwal_tes_index` (`id_jadwal_tes`);

--
-- Indeks untuk tabel `hasil_tes`
--
ALTER TABLE `hasil_tes`
  ADD PRIMARY KEY (`id_hasil_tes`),
  ADD KEY `hasil_tes_id_soal_index` (`id_soal_tes`),
  ADD KEY `hasil_tes_id_pelamar_index` (`id_pelamar`),
  ADD KEY `id_lowongan` (`id_lowongan`);

--
-- Indeks untuk tabel `jadwal_tes`
--
ALTER TABLE `jadwal_tes`
  ADD PRIMARY KEY (`id_jadwal_tes`),
  ADD KEY `jadwal_tes_id_lowongan_index` (`id_lowongan`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD KEY `kriteria_id_lowongan_index` (`id_lowongan`);

--
-- Indeks untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id_lowongan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD PRIMARY KEY (`id_nilai_alternatif`),
  ADD KEY `nilai_alternatif_id_pelamar_index` (`id_pelamar`),
  ADD KEY `nilai_alternatif_id_bobot_kriteria_index` (`id_bobot_kriteria`),
  ADD KEY `id_bobot_kriteria` (`id_bobot_kriteria`),
  ADD KEY `id_bobot_kriteria_2` (`id_bobot_kriteria`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id_pelamar`),
  ADD KEY `pelamar_id_user_index` (`id_user`),
  ADD KEY `pelamar_id_lowongan_index` (`id_lowongan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bobot_kriteria`
--
ALTER TABLE `bobot_kriteria`
  MODIFY `id_bobot_kriteria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `daftar_soal`
--
ALTER TABLE `daftar_soal`
  MODIFY `id_soal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `hasil_tes`
--
ALTER TABLE `hasil_tes`
  MODIFY `id_hasil_tes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `jadwal_tes`
--
ALTER TABLE `jadwal_tes`
  MODIFY `id_jadwal_tes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id_lowongan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id_nilai_alternatif` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `id_pelamar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bobot_kriteria`
--
ALTER TABLE `bobot_kriteria`
  ADD CONSTRAINT `bobot_kriteria_id_kriteria_foreign` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `daftar_soal`
--
ALTER TABLE `daftar_soal`
  ADD CONSTRAINT `daftar_soal_id_jadwal_tes_foreign` FOREIGN KEY (`id_jadwal_tes`) REFERENCES `jadwal_tes` (`id_jadwal_tes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hasil_tes`
--
ALTER TABLE `hasil_tes`
  ADD CONSTRAINT `hasil_tes_id_pelamar_foreign` FOREIGN KEY (`id_pelamar`) REFERENCES `pelamar` (`id_pelamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_tes_id_soal_foreign` FOREIGN KEY (`id_soal_tes`) REFERENCES `daftar_soal` (`id_soal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal_tes`
--
ALTER TABLE `jadwal_tes`
  ADD CONSTRAINT `jadwal_tes_id_lowongan_foreign` FOREIGN KEY (`id_lowongan`) REFERENCES `lowongan` (`id_lowongan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD CONSTRAINT `kriteria_id_lowongan_foreign` FOREIGN KEY (`id_lowongan`) REFERENCES `lowongan` (`id_lowongan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD CONSTRAINT `nilai_alternatif_id_bobot_kriteria_foreign` FOREIGN KEY (`id_bobot_kriteria`) REFERENCES `bobot_kriteria` (`id_bobot_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_alternatif_id_pelamar_foreign` FOREIGN KEY (`id_pelamar`) REFERENCES `pelamar` (`id_pelamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  ADD CONSTRAINT `pelamar_id_lowongan_foreign` FOREIGN KEY (`id_lowongan`) REFERENCES `lowongan` (`id_lowongan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelamar_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
