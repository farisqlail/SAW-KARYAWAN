-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Nov 2020 pada 18.33
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_alternatif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_alternatif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id`, `kode_alternatif`, `nama_alternatif`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'A1', 'KFC', 'Ini KFC', '2020-11-29 09:19:48', '2020-11-29 09:19:48'),
(2, 'A2', 'Janji Jiwa', 'Ini Janji Jiwa', '2020-11-29 09:20:11', '2020-11-29 09:20:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crip`
--

CREATE TABLE `crip` (
  `id` int(10) UNSIGNED NOT NULL,
  `kriteria_id` int(10) UNSIGNED DEFAULT NULL,
  `nama_crip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_crip` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `crip`
--

INSERT INTO `crip` (`id`, `kriteria_id`, `nama_crip`, `nilai_crip`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sangat Mahal (>=Rp50.000.000)', 4, '2020-11-29 08:37:54', '2020-11-29 08:37:54'),
(2, 1, 'Mahal (Rp10.100.000 - Rp50.000.000)', 3, '2020-11-29 08:38:07', '2020-11-29 08:38:07'),
(3, 1, 'Murah (Rp5.100.000 - Rp10.000.000)', 2, '2020-11-29 08:38:29', '2020-11-29 08:38:29'),
(4, 1, 'Sangat Murah (<Rp5.000.000)', 1, '2020-11-29 08:39:50', '2020-11-29 08:39:50'),
(5, 2, 'Fast Food', 5, '2020-11-29 09:15:05', '2020-11-29 09:15:05'),
(6, 2, 'Toko Retail', 4, '2020-11-29 09:15:26', '2020-11-29 09:15:26'),
(7, 2, 'Laundry', 3, '2020-11-29 09:15:35', '2020-11-29 09:15:35'),
(8, 2, 'Snack Kekinian', 2, '2020-11-29 09:15:51', '2020-11-29 09:15:51'),
(9, 2, 'Minuman Kekinian', 1, '2020-11-29 09:16:00', '2020-11-29 09:16:00'),
(10, 3, 'Bangunan Besar (>= 200 m2)', 6, '2020-11-29 09:16:13', '2020-11-29 09:16:13'),
(11, 3, 'Bangunan Sedang (30 - 100 m2)', 5, '2020-11-29 09:16:29', '2020-11-29 09:16:29'),
(12, 3, 'Bangunan Kecil (4 - 20 m2)', 4, '2020-11-29 09:16:49', '2020-11-29 09:16:49'),
(13, 3, 'Food Truck', 3, '2020-11-29 09:17:10', '2020-11-29 09:17:10'),
(14, 3, 'Stand Besar (5 m2)', 2, '2020-11-29 09:17:22', '2020-11-29 09:17:22'),
(15, 3, 'Stand Kecil (2 m2)', 1, '2020-11-29 09:17:40', '2020-11-29 09:17:40'),
(16, 4, 'Kombinasi (Online Offline)', 3, '2020-11-29 09:17:50', '2020-11-29 09:17:50'),
(17, 4, 'Online', 2, '2020-11-29 09:18:10', '2020-11-29 09:18:10'),
(18, 4, 'Offline', 1, '2020-11-29 09:18:22', '2020-11-29 09:18:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `franchises`
--

CREATE TABLE `franchises` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `franchises`
--

INSERT INTO `franchises` (`id`, `nama`, `kategori`, `modal`, `ukuran`, `metode`, `deskripsi`, `image`, `created_at`, `updated_at`) VALUES
(3, 'KFC', 'Fast Food', 'Rp7.500.000.000', 'Bangunan Besar (>= 200 m2)', 'Offline', 'KFC, adalah jaringan restoran cepat saji Amerika yang berkantor pusat di Louisville, Kentucky, yang berspesialisasi dalam ayam goreng. Ini adalah jaringan restoran terbesar kedua di dunia setelah McDonald\'s, dengan 22.621 lokasi secara global di 150 negara pada Desember 2019.', '1606665776.jpg', '2020-11-29 07:16:43', '2020-11-29 09:02:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atribut` enum('cost','benefit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id`, `kode`, `nama`, `atribut`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 'F1', 'Modal', 'cost', 30, '2020-11-29 07:36:16', '2020-11-29 07:36:16'),
(2, 'F2', 'Kategori', 'benefit', 25, '2020-11-29 08:34:50', '2020-11-29 08:34:50'),
(3, 'F3', 'Ukuran Bangunan', 'cost', 25, '2020-11-29 08:35:16', '2020-11-29 08:35:16'),
(4, 'F4', 'Metode', 'benefit', 20, '2020-11-29 08:36:04', '2020-11-29 08:36:04');

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
(3, '2018_05_27_174332_create_kriteria_table', 1),
(4, '2018_05_27_174938_create_crip_table', 1),
(5, '2018_05_27_175955_create_alternatif_table', 1),
(6, '2018_05_27_180046_create_nilai_alternatif_table', 1),
(7, '2020_11_29_103741_create_franchises_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_alternatif`
--

CREATE TABLE `nilai_alternatif` (
  `id` int(10) UNSIGNED NOT NULL,
  `alternatif_id` int(10) UNSIGNED DEFAULT NULL,
  `crip_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nilai_alternatif`
--

INSERT INTO `nilai_alternatif` (`id`, `alternatif_id`, `crip_id`) VALUES
(1, 1, 1),
(2, 1, 5),
(3, 1, 10),
(4, 1, 18),
(5, 2, 2),
(6, 2, 9),
(7, 2, 12),
(8, 2, 16);

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
(1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$JOfMUtR/ZDlqUNXedRXOgOmXhgISxrW49zD0uWHMbaih8FLsGeAq2', 'aetiiKTceCJ7zZRqp9eHd8oTUeWjR1c102jPnW6r6C7cxhY3R5HdEjiD9e5f', NULL, NULL),
(2, 'Denny Putra', 'customer', 'denny.pyp11@gmail.com', '$2y$10$Em2nLUM2QXpSmXaVAbpSWecdMC2K0qniJq1ZVkFKr2ZWmc8GuCBka', 'jFdWfVXfLOXsjoAVaSQUlka6ViAQ3wkqsBki4y6fk24Nwo6Y8F8JULuYeg2I', '2020-11-29 05:48:02', '2020-11-29 05:48:02');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alternatif_kode_alternatif_unique` (`kode_alternatif`);

--
-- Indeks untuk tabel `crip`
--
ALTER TABLE `crip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `crip_kriteria_id_index` (`kriteria_id`);

--
-- Indeks untuk tabel `franchises`
--
ALTER TABLE `franchises`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kriteria_kode_unique` (`kode`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_alternatif_alternatif_id_index` (`alternatif_id`),
  ADD KEY `nilai_alternatif_crip_id_index` (`crip_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `crip`
--
ALTER TABLE `crip`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `franchises`
--
ALTER TABLE `franchises`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `crip`
--
ALTER TABLE `crip`
  ADD CONSTRAINT `crip_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD CONSTRAINT `nilai_alternatif_alternatif_id_foreign` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_alternatif_crip_id_foreign` FOREIGN KEY (`crip_id`) REFERENCES `crip` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
