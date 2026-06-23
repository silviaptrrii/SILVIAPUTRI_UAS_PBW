-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20260524.6165a6f84f
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 23 Jun 2026 pada 10.15
-- Versi server: 8.0.30
-- Versi PHP: 8.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Basis data: `dressory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Casual', '2026-06-03 10:14:10', '2026-06-03 10:14:10'),
(2, 'Formal', '2026-06-03 10:14:10', '2026-06-03 10:14:10'),
(3, 'Kampus', '2026-06-03 10:14:10', '2026-06-03 10:14:10'),
(4, 'Sport', '2026-06-03 10:14:10', '2026-06-03 14:49:02'),
(5, 'Party', '2026-06-03 10:14:10', '2026-06-03 10:14:10'),
(6, 'Outer', '2026-06-03 10:14:10', '2026-06-03 10:14:10'),
(7, 'Shoes', '2026-06-03 10:14:10', '2026-06-03 14:48:48'),
(8, 'Accessories', '2026-06-03 10:14:10', '2026-06-03 14:49:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `clothes`
--

CREATE TABLE `clothes` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `nama_pakaian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `clothes`
--

INSERT INTO `clothes` (`id`, `user_id`, `category_id`, `nama_pakaian`, `warna`, `foto`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Cardigan', 'Pink Soft', 'uploads/clothes/1780503019_screenshot-2026-06-03-231005.png', 'Sweater rajut pink soft yang cocok dipakai saat cuaca dingin, hangout, atau outfit casual sehari-hari.', '2026-06-03 10:16:20', '2026-06-03 16:10:19'),
(3, 2, 5, 'Floral Ruffle Dress', 'White & Gray', 'uploads/clothes/1780502950_screenshot-2026-06-03-230857.png', 'Dress bermotif floral dengan detail ruffle dan model tanpa lengan.', '2026-06-03 14:31:42', '2026-06-03 16:09:10'),
(4, 2, 5, 'Faux Fur Collar Blouse', 'White', 'uploads/clothes/1780503079_screenshot-2026-06-03-231109.png', 'Blouse putih dengan detail kerah bulu dan model off-shoulder, cocok digunakan untuk acara semi-formal, pesta, dinner, atau outfit winter yang elegan.', '2026-06-03 14:38:12', '2026-06-03 16:11:19'),
(5, 2, 1, 'Lace-Up Pleated Skirt', 'Black', 'uploads/clothes/1780503136_screenshot-2026-06-03-231205.png', 'Rok hitam model pleated dengan detail tali di bagian pinggang, cocok dipadukan dengan blouse, sweater, atau crop top untuk outfit casual maupun semi-formal.', '2026-06-03 14:45:02', '2026-06-03 16:12:16'),
(6, 2, 7, 'Fur Platform Boots', 'White', 'uploads/clothes/1780502872_screenshot-2026-06-03-230742.png', 'Boots putih dengan aksen bulu dan model platform heels.', '2026-06-03 14:50:01', '2026-06-03 16:07:52'),
(7, 2, 3, 'Satin Wrap Blouse', 'Brown', 'uploads/clothes/1780502819_screenshot-2026-06-03-230646.png', 'Blouse satin berwarna coklat dengan model wrap dan lengan balon.', '2026-06-03 14:59:08', '2026-06-03 16:06:59'),
(8, 2, 1, 'High Rise Flare Jeans', 'Denim Blue', 'uploads/clothes/1780499814_screenshot-2026-06-03-221154.png', 'Celana jeans biru dengan model high waist dan potongan melebar di bagian bawah, cocok untuk tampilan santai, stylish, dan mudah dipadukan dengan berbagai atasan.', '2026-06-03 15:16:54', '2026-06-03 15:16:54'),
(9, 2, 8, 'Elegant Mini Handbag', 'Ivory', 'uploads/clothes/1780503182_screenshot-2026-06-03-231252.png', 'Tas mini berwarna ivory white dengan desain elegan dan detail aksen silver.', '2026-06-03 15:28:58', '2026-06-03 16:13:02'),
(10, 2, 6, 'Burgundy Leather Jacket', 'Burgundy', 'uploads/clothes/1780502738_screenshot-2026-06-03-223405.png', 'Jaket kulit berwarna burgundy dengan model cropped dan detail belt.', '2026-06-03 16:05:38', '2026-06-03 16:05:38'),
(11, 2, 2, 'Striped Wrap Shirt', 'Blue White', 'uploads/clothes/1780503412_screenshot-2026-06-03-231541.png', 'Kemeja garis-garis dengan model wrap dan detail tali di bagian pinggang, cocok untuk outfit kuliah, kerja, presentasi, atau tampilan semi-formal yang rapi.', '2026-06-03 16:16:52', '2026-06-03 16:16:52'),
(12, 2, 1, 'Ruched Tie Midi Skirt', 'Ivory', 'uploads/clothes/1780503785_screenshot-2026-06-03-232214.png', 'Rok midi berwarna ivory white dengan detail serut dan tali di bagian samping, cocok dipadukan dengan blouse, kemeja, atau outer untuk tampilan elegan dan feminin.', '2026-06-03 16:23:05', '2026-06-03 16:23:05'),
(13, 2, 7, 'Chunky Pink Sneakers', 'Pink Cream', 'uploads/clothes/1780504377_screenshot-2026-06-03-233158.png', 'Sneakers chunky dengan perpaduan warna pink dan cream, cocok digunakan untuk outfit casual, hangout, kuliah, atau tampilan sporty yang tetap feminin.', '2026-06-03 16:32:57', '2026-06-03 16:32:57'),
(14, 2, 1, 'blush', 'pink', 'uploads/clothes/1780550228_screenshot-2026-06-03-231005.png', 'utk kuliah', '2026-06-04 05:17:08', '2026-06-04 05:17:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_06_02_000001_create_categories_table', 1),
(5, '2026_06_02_000002_create_clothes_table', 1),
(6, '2026_06_02_000003_create_outfits_table', 1),
(7, '2026_06_02_000004_create_outfit_details_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `outfits`
--

CREATE TABLE `outfits` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nama_outfit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `outfits`
--

INSERT INTO `outfits` (`id`, `user_id`, `nama_outfit`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 2, 'Casual Campus Outfit', '2026-06-03', '2026-06-03 14:13:27', '2026-06-03 15:30:47'),
(2, 2, 'party', '2026-06-04', '2026-06-04 05:18:08', '2026-06-04 05:18:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `outfit_details`
--

CREATE TABLE `outfit_details` (
  `id` bigint UNSIGNED NOT NULL,
  `outfit_id` bigint UNSIGNED NOT NULL,
  `clothes_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `outfit_details`
--

INSERT INTO `outfit_details` (`id`, `outfit_id`, `clothes_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2026-06-03 14:13:27', '2026-06-03 14:13:27'),
(2, 1, 8, '2026-06-03 15:30:47', '2026-06-03 15:30:47'),
(3, 2, 9, '2026-06-04 05:18:08', '2026-06-04 05:18:08'),
(4, 2, 4, '2026-06-04 05:18:08', '2026-06-04 05:18:08'),
(5, 2, 6, '2026-06-04 05:18:08', '2026-06-04 05:18:08'),
(6, 2, 5, '2026-06-04 05:18:08', '2026-06-04 05:18:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('KdE10Z6eb559jKTZli7efNsBbROSQ19J13AAeCHE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRFJrZmVzODZZQmdWZk56QkdaOXZwalpSelJPSVo0R0JpMlRjWk0xNiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fX0=', 1780550309);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Wardrobe', 'admin@wardrobe.test', NULL, '$2y$12$AJtwGhzc58Mmd.Df40oqWu.pztWvzdjJSTJmeWQHys7WY0szS8O1q', 'admin', NULL, '2026-06-03 10:14:10', '2026-06-03 10:14:10'),
(2, 'Silvia Putri', 'silviaptrrii@gmail.com', NULL, '$2y$12$DprquHZRAqGN8/7yUQJPk.sL8s1rAqeWJcZRr3P3Pr55hy0avqoCu', 'user', 'ExzXvJ6c9Ot7QKvMvfjuwrBvllQns1Z99lfGpwelhMEqeaF7Jy7QLFUuZ6Rd', '2026-06-03 10:15:36', '2026-06-03 10:15:36');

--
-- Indeks untuk tabel yang dibuang
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `clothes`
--
ALTER TABLE `clothes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clothes_user_id_foreign` (`user_id`),
  ADD KEY `clothes_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `outfits`
--
ALTER TABLE `outfits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `outfits_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `outfit_details`
--
ALTER TABLE `outfit_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `outfit_details_outfit_id_clothes_id_unique` (`outfit_id`,`clothes_id`),
  ADD KEY `outfit_details_clothes_id_foreign` (`clothes_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `clothes`
--
ALTER TABLE `clothes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `outfits`
--
ALTER TABLE `outfits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `outfit_details`
--
ALTER TABLE `outfit_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `clothes`
--
ALTER TABLE `clothes`
  ADD CONSTRAINT `clothes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT,
  ADD CONSTRAINT `clothes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `outfits`
--
ALTER TABLE `outfits`
  ADD CONSTRAINT `outfits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `outfit_details`
--
ALTER TABLE `outfit_details`
  ADD CONSTRAINT `outfit_details_clothes_id_foreign` FOREIGN KEY (`clothes_id`) REFERENCES `clothes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `outfit_details_outfit_id_foreign` FOREIGN KEY (`outfit_id`) REFERENCES `outfits` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
