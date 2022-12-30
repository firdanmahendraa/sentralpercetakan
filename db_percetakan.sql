-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Des 2022 pada 12.44
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
    '2019_12_14_000001_create_personal_access_tokens_table',
    1
  ),
  (3, '2022_11_27_103742_create_setting_table', 2),
  (
    4,
    '2022_12_30_102953_create_mst_kode_akun_table',
    3
  ),
  (
    5,
    '2022_10_19_093302_create_mst_produk_table',
    4
  ),
  (
    6,
    '2022_10_21_040114_create_mst_supplier_table',
    5
  ),
  (7, '2022_11_11_134217_create_penjualan_table', 6),
  (
    8,
    '2022_11_11_134245_create_penjualan_detail_table',
    6
  );
-- --------------------------------------------------------
--
-- Struktur dari tabel `mst_kode_akun`
--

CREATE TABLE `mst_kode_akun` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Dumping data untuk tabel `mst_kode_akun`
--

INSERT INTO `mst_kode_akun` (
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
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    2,
    '101',
    'KSA',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    3,
    '102',
    'Bank Jatim',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    4,
    '103',
    'BCA',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    5,
    '104',
    'Hutang Tunai',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    6,
    '105',
    'Hutang Usaha',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    7,
    '106',
    'Hutang Lain-Lain',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    8,
    '107',
    'Hutang Saham',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    9,
    '250',
    'Uang Muka',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    10,
    '122',
    'Piutang Usaha',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    11,
    '125',
    'Piutang Karyawan',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    12,
    '126',
    'Piutang Lain-Lain',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    13,
    '140',
    'Inventaris',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    14,
    '151',
    'Bahan Baku',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    15,
    '152',
    'Bahan Penolong',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    16,
    '153',
    'Bahan Pembersih',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    17,
    '620',
    'Biaya Komisi',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    18,
    '640',
    'Biaya Promosi',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    19,
    '700',
    'Biaya Lembur',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    20,
    '701',
    'Biaya Gaji',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    21,
    '702',
    'Biaya Konsumsi',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    22,
    '703',
    'Biaya Perbaikan Kendaraan',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    23,
    '703.1',
    'Biaya Perbaikan Mesin',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    24,
    '703.2',
    'Biaya Perbaikan Bangunan',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    25,
    '704',
    'Biaya Transportasi',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    26,
    '705',
    'Biaya L.A.T',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    27,
    '707',
    'Biaya Kantor',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    28,
    '709',
    'Biaya Produksi',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    29,
    '710',
    'Biaya Kirim',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    30,
    '712',
    'Biaya Lain-Lain',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    31,
    '713',
    'Solar Pajak',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    32,
    '715',
    'Pendapatan Peralatan',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    33,
    '716',
    'Solar Genset',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    34,
    '717',
    'Pendapatan Lain-Lain',
    NULL,
    '2022-12-30 04:07:16',
    '2022-12-30 04:07:16'
  ),
  (
    35,
    '21',
    'sd1',
    '2022-12-30 04:30:58',
    '2022-12-30 04:24:26',
    '2022-12-30 04:30:58'
  );
-- --------------------------------------------------------
--
-- Struktur dari tabel `mst_produk`
--

CREATE TABLE `mst_produk` (
  `id_produk` int(10) UNSIGNED NOT NULL,
  `kode_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan_produk` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `ukuran_produk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_produk` enum('qty', 'meter') COLLATE utf8mb4_unicode_ci NOT NULL,
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
    `satuan_produk`,
    `harga_produk`,
    `ukuran_produk`,
    `type_produk`,
    `deleted_at`,
    `created_at`,
    `updated_at`
  )
VALUES (
    1,
    'IMPR',
    'Nota Impression',
    'RIM',
    250000,
    'Folio',
    'qty',
    NULL,
    '2022-10-20 20:03:55',
    '2022-12-22 11:17:44'
  ),
  (
    2,
    'TOP1',
    'Nota Top',
    'RIM',
    200000,
    'Folio',
    'qty',
    NULL,
    '2022-10-20 20:10:14',
    '2022-12-22 11:19:37'
  ),
  (
    3,
    'P0003',
    'Banner Flexy China',
    'LBR',
    20000,
    '280gr',
    'meter',
    NULL,
    '2022-10-20 20:10:25',
    '2022-10-21 21:56:39'
  ),
  (
    4,
    'P0004',
    'Banner 70gr 2 x 2',
    'LBR',
    70000,
    '',
    'qty',
    NULL,
    '2022-10-20 20:14:08',
    '2022-10-20 20:16:45'
  ),
  (
    5,
    'P0005',
    'Banner 70gr 3 x 1',
    'LBR',
    52500,
    '',
    'qty',
    NULL,
    '2022-10-21 21:56:11',
    '2022-10-21 21:56:11'
  ),
  (
    6,
    'P0006',
    'Banner 70gr 3 x 2',
    'LBR',
    105000,
    '',
    'qty',
    NULL,
    '2022-10-21 23:35:31',
    '2022-10-21 23:35:31'
  ),
  (
    7,
    'P0007',
    'Print A3+ Warna',
    'LBR',
    5000,
    '',
    'qty',
    NULL,
    '2022-11-29 03:18:02',
    '2022-11-29 03:18:52'
  ),
  (
    8,
    'A3BW',
    'Print A3+ BW',
    'LBR',
    3500,
    'A3+',
    'qty',
    NULL,
    '2022-12-04 22:21:39',
    '2022-12-05 00:05:07'
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
-- --------------------------------------------------------
--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(10) UNSIGNED NOT NULL,
  `id_akun` int(11) NOT NULL,
  `no_nota` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `acc_desain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_item` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `diskon` tinyint(4) NOT NULL DEFAULT 0,
  `bayar` int(11) NOT NULL DEFAULT 0,
  `diterima` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  `status_penjualan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Struktur dari tabel `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id_penjualan_detail` int(10) UNSIGNED NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran_p` tinyint(1) DEFAULT NULL,
  `ukuran_l` tinyint(1) DEFAULT NULL,
  `finishing_plong_qty` int(11) DEFAULT NULL,
  `finishing_plong_harga` int(11) DEFAULT NULL,
  `det_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_aplikasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bg_login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_nota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (
    `id`,
    `nama_perusahaan`,
    `alamat`,
    `telepon`,
    `logo_aplikasi`,
    `logo_login`,
    `bg_login`,
    `logo_nota`,
    `created_at`,
    `updated_at`
  )
VALUES (
    1,
    'ASAP',
    'Jl. Jendral Panjaitan 72 - Lumajang',
    '085284070404',
    'assets/img/brand-icon.png',
    'assets/img/logo.png',
    'assets/img/bg_login.jpg',
    'assets/img/nota-logo.png',
    NULL,
    '2022-12-30 00:45:40'
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
    'Novi Invanti',
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
-- Indeks untuk tabel `mst_kode_akun`
--
ALTER TABLE `mst_kode_akun`
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
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
ADD PRIMARY KEY (`id_penjualan`);
--
-- Indeks untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
ADD PRIMARY KEY (`id_penjualan_detail`);
--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`, `tokenable_id`);
--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
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
  AUTO_INCREMENT = 58;
--
-- AUTO_INCREMENT untuk tabel `mst_kode_akun`
--
ALTER TABLE `mst_kode_akun`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 37;
--
-- AUTO_INCREMENT untuk tabel `mst_produk`
--
ALTER TABLE `mst_produk`
MODIFY `id_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 9;
--
-- AUTO_INCREMENT untuk tabel `mst_supplier`
--
ALTER TABLE `mst_supplier`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
MODIFY `id_penjualan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
MODIFY `id_penjualan_detail` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;
--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 12;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;