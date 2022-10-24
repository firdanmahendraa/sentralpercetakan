-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Okt 2022 pada 05.24
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.31
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Database: `db_percetakan`
--

-- --------------------------------------------------------
--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (1, '2014_10_12_000000_create_users_table', 1),
  (
    2,
    '2022_10_19_093302_create_mst_produk_table',
    2
  ),
  (
    3,
    '2022_10_21_040114_create_mst_supplier_table',
    3
  ),
  (
    4,
    '2022_10_21_092807_create_mst_kategori_table',
    4
  ),
  (
    5,
    '2022_10_21_093150_create_mst_member_table',
    5
  ),
  (
    6,
    '2022_10_24_021219_create_mst_data_karyawan_table',
    6
  );
-- --------------------------------------------------------
--
-- Struktur dari tabel `mst_data_karyawan`
--

CREATE TABLE `mst_data_karyawan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-Laki', 'Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Struktur dari tabel `mst_kategori`
--

CREATE TABLE `mst_kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Dumping data untuk tabel `mst_kategori`
--

INSERT INTO `mst_kategori` (
    `id`,
    `kode_kategori`,
    `nama_kategori`,
    `deleted_at`,
    `created_at`,
    `updated_at`
  )
VALUES (
    1,
    '100',
    'KAS',
    NULL,
    '2022-10-02 23:33:23',
    '2022-10-20 05:34:08'
  ),
  (
    2,
    '101',
    'KSA',
    NULL,
    '2022-10-02 23:35:23',
    '2022-10-20 05:34:08'
  ),
  (
    3,
    '102',
    'Bank Jatim1',
    NULL,
    '2022-10-02 23:46:29',
    '2022-10-20 05:34:14'
  ),
  (
    4,
    '103',
    'BCA',
    NULL,
    '2022-10-03 00:14:07',
    '2022-10-12 08:44:36'
  ),
  (
    5,
    '104',
    'Hutang Tunai',
    NULL,
    '2022-10-03 00:16:56',
    '2022-10-12 08:44:44'
  ),
  (
    6,
    '105',
    'Hutang Usaha',
    NULL,
    '2022-10-03 00:17:08',
    '2022-10-12 08:45:02'
  ),
  (
    7,
    '106',
    'Hutang Lain-Lain',
    NULL,
    '2022-10-03 00:39:22',
    '2022-10-12 09:03:19'
  ),
  (
    8,
    '107',
    'Hutang Saham',
    NULL,
    '2022-10-03 00:40:15',
    '2022-10-12 09:04:02'
  ),
  (
    9,
    '401/250',
    'Uang Muka',
    NULL,
    '2022-10-03 00:41:59',
    '2022-10-18 01:07:38'
  ),
  (
    10,
    '122',
    'Piutang Usaha',
    NULL,
    '2022-10-03 00:46:42',
    '2022-10-12 09:05:04'
  ),
  (
    11,
    '125',
    'Piutang Karyawan',
    NULL,
    '2022-10-06 02:56:26',
    '2022-10-12 09:05:32'
  ),
  (
    12,
    '126',
    'Piutang Lain-Lain',
    NULL,
    '2022-10-06 07:52:18',
    '2022-10-12 09:07:14'
  ),
  (
    13,
    '140',
    'Inventaris',
    NULL,
    '2022-10-06 07:59:48',
    '2022-10-12 09:32:27'
  ),
  (
    14,
    '151',
    'Bahan Baku',
    NULL,
    '2022-10-06 08:02:51',
    '2022-10-12 09:32:46'
  ),
  (
    15,
    '152',
    'Bahan Penolong',
    NULL,
    '2022-10-06 08:20:57',
    '2022-10-12 09:32:58'
  ),
  (
    16,
    '153',
    'Bahan Pembersih',
    NULL,
    '2022-10-06 08:23:29',
    '2022-10-12 09:33:12'
  ),
  (
    17,
    '620',
    'Biaya Komisi',
    NULL,
    '2022-10-12 00:20:20',
    '2022-10-12 18:49:58'
  ),
  (
    18,
    '640',
    'Biaya Promosi',
    NULL,
    '2022-10-12 00:21:51',
    '2022-10-12 18:50:21'
  ),
  (
    19,
    '700',
    'Biaya Lembur',
    NULL,
    '2022-10-12 00:23:54',
    '2022-10-12 18:50:48'
  ),
  (
    20,
    '701',
    'Biaya Gaji',
    NULL,
    '2022-10-12 00:41:02',
    '2022-10-12 18:51:06'
  ),
  (
    21,
    '702',
    'Biaya Konsumsi',
    NULL,
    '2022-10-12 08:25:17',
    '2022-10-12 18:51:38'
  ),
  (
    22,
    '703',
    'Biaya Perbaikan Kendaraan',
    NULL,
    '2022-10-12 08:58:19',
    '2022-10-12 18:53:08'
  ),
  (
    23,
    '703.1',
    'Biaya Perbaikan Mesin',
    NULL,
    '2022-10-12 08:59:47',
    '2022-10-12 18:52:54'
  ),
  (
    24,
    '703.2',
    'Biaya Perbaikan Bangunan',
    NULL,
    '2022-10-12 09:17:42',
    '2022-10-12 18:54:11'
  ),
  (
    25,
    '704',
    'Biaya Transportasi',
    NULL,
    '2022-10-12 09:23:46',
    '2022-10-12 18:53:59'
  ),
  (
    26,
    '705',
    'Biaya L.A.T',
    NULL,
    '2022-10-12 09:26:33',
    '2022-10-12 18:54:35'
  ),
  (
    27,
    '707',
    'Biaya Kantor',
    NULL,
    '2022-10-12 09:30:18',
    '2022-10-12 19:02:07'
  ),
  (
    28,
    '709',
    'Biaya Produksi',
    NULL,
    '2022-10-12 09:31:39',
    '2022-10-12 19:02:28'
  ),
  (
    29,
    '710',
    'Biaya Kirim',
    NULL,
    '2022-10-12 18:58:46',
    '2022-10-12 19:02:57'
  ),
  (
    30,
    '712',
    'Biaya Lain-Lain',
    NULL,
    '2022-10-12 18:59:04',
    '2022-10-12 19:03:52'
  ),
  (
    31,
    '713',
    'Solar Pajak',
    NULL,
    '2022-10-12 18:59:17',
    '2022-10-12 19:04:11'
  ),
  (
    32,
    '715',
    'Pendapatan Peralatan',
    NULL,
    '2022-10-12 18:59:31',
    '2022-10-12 19:04:24'
  ),
  (
    33,
    '716',
    'Solar Genset',
    NULL,
    '2022-10-12 19:04:46',
    '2022-10-12 19:04:46'
  ),
  (
    34,
    '717',
    'Pendapatan Lain-Lain',
    NULL,
    '2022-10-12 19:05:01',
    '2022-10-12 19:05:01'
  ),
  (
    47,
    '22',
    'sdsd',
    NULL,
    '2022-10-20 06:01:40',
    '2022-10-20 06:01:40'
  );
-- --------------------------------------------------------
--
-- Struktur dari tabel `mst_member`
--

CREATE TABLE `mst_member` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_member` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_member` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_member` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon_member` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Struktur dari tabel `mst_produk`
--

CREATE TABLE `mst_produk` (
  `id_produk` int(10) UNSIGNED NOT NULL,
  `kode_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Dumping data untuk tabel `mst_produk`
--

INSERT INTO `mst_produk` (
    `id_produk`,
    `kode_produk`,
    `nama_produk`,
    `harga_produk`,
    `deleted_at`,
    `created_at`,
    `updated_at`
  )
VALUES (
    1,
    'P0001',
    '2Ply Nota Impression 1/4',
    250000,
    NULL,
    '2022-10-20 20:03:55',
    '2022-10-20 20:31:20'
  ),
  (
    2,
    'P0002',
    'Banner 70gr',
    17500,
    NULL,
    '2022-10-20 20:10:14',
    '2022-10-20 20:33:50'
  ),
  (
    3,
    'P0003',
    'Print a3+1',
    50001,
    '2022-10-21 21:56:39',
    '2022-10-20 20:10:25',
    '2022-10-21 21:56:39'
  ),
  (
    4,
    'P0004',
    'asdasd',
    222,
    '2022-10-20 20:16:45',
    '2022-10-20 20:14:08',
    '2022-10-20 20:16:45'
  ),
  (
    5,
    'P0004',
    'Banner 80gr',
    20000,
    NULL,
    '2022-10-21 21:56:11',
    '2022-10-21 21:56:11'
  ),
  (
    6,
    'P0006',
    'asd',
    123,
    NULL,
    '2022-10-21 23:35:31',
    '2022-10-21 23:35:31'
  );
-- --------------------------------------------------------
--
-- Struktur dari tabel `mst_supplier`
--

CREATE TABLE `mst_supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_supplier` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Dumping data untuk tabel `mst_supplier`
--

INSERT INTO `mst_supplier` (
    `id`,
    `nama_supplier`,
    `alamat_supplier`,
    `telepon_supplier`,
    `deleted_at`,
    `created_at`,
    `updated_at`
  )
VALUES (
    1,
    'Setia Kawan222',
    'Lumajang222',
    '086557232322222',
    NULL,
    '2022-10-20 23:18:24',
    '2022-10-22 00:09:14'
  ),
  (
    2,
    'asdasd',
    'dsdasda',
    '123213123',
    NULL,
    '2022-10-21 00:09:50',
    '2022-10-21 02:14:25'
  );
-- --------------------------------------------------------
--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `levels` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (
    `id`,
    `name`,
    `username`,
    `password`,
    `levels`,
    `remember_token`,
    `created_at`,
    `updated_at`
  )
VALUES (
    1,
    'Firdan Mahendra',
    'owner',
    '$2y$10$PS6jnWGj4Q8I5IWnIpOywO04YT81LKUOL9ZXL2e1TJJr.M9fBTsTS',
    'Owner',
    NULL,
    '2022-10-02 20:37:44',
    '2022-10-02 20:37:44'
  ),
  (
    2,
    'Novitasari',
    'admin',
    '$2y$10$FwXm6xw1lphnUCIQogbNhexo/3gzcX1eRuTNnGwVDis11HMc1B90q',
    'Admin',
    NULL,
    '2022-10-10 09:36:17',
    '2022-10-10 09:36:17'
  );
--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
ADD PRIMARY KEY (`id`);
--
-- Indeks untuk tabel `mst_data_karyawan`
--
ALTER TABLE `mst_data_karyawan`
ADD PRIMARY KEY (`id`);
--
-- Indeks untuk tabel `mst_kategori`
--
ALTER TABLE `mst_kategori`
ADD PRIMARY KEY (`id`);
--
-- Indeks untuk tabel `mst_member`
--
ALTER TABLE `mst_member`
ADD PRIMARY KEY (`id`);
--
-- Indeks untuk tabel `mst_produk`
--
ALTER TABLE `mst_produk`
ADD PRIMARY KEY (`id_produk`);
--
-- Indeks untuk tabel `mst_supplier`
--
ALTER TABLE `mst_supplier`
ADD PRIMARY KEY (`id`);
--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);
--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 23;
--
-- AUTO_INCREMENT untuk tabel `mst_data_karyawan`
--
ALTER TABLE `mst_data_karyawan`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT untuk tabel `mst_kategori`
--
ALTER TABLE `mst_kategori`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;
--
-- AUTO_INCREMENT untuk tabel `mst_member`
--
ALTER TABLE `mst_member`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT untuk tabel `mst_produk`
--
ALTER TABLE `mst_produk`
MODIFY `id_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 7;
--
-- AUTO_INCREMENT untuk tabel `mst_supplier`
--
ALTER TABLE `mst_supplier`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 4;
--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 11;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;