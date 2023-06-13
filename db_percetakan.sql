-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2023 pada 18.56
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_10_19_093302_create_mst_produk_table', 1),
(4, '2022_10_21_040114_create_mst_supplier_table', 1),
(7, '2022_11_27_103742_create_setting_table', 1),
(8, '2022_12_30_102953_create_mst_kode_akun_table', 1),
(9, '2023_01_10_085912_create_mst_opsi_pembayaran_table', 1),
(10, '2023_01_10_104420_create_mst_customer_table', 1),
(25, '2022_11_11_134217_create_penjualan_table', 2),
(26, '2022_11_11_134245_create_penjualan_detail_table', 2),
(27, '2023_04_08_115545_create_transaction_cart_table', 2),
(28, '2023_04_09_142558_create_tb_bkm_table', 2),
(30, '2023_05_08_150759_create_pembelian_table', 3),
(31, '2023_05_08_150836_create_pembelian_detail_table', 3),
(32, '2023_05_18_190208_create_tb_bkk_table', 4),
(33, '2023_06_11_153424_create_password_reset_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_customer`
--

CREATE TABLE `mst_customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pelanggan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mst_customer`
--

INSERT INTO `mst_customer` (`id`, `nama_pelanggan`, `alamat_pelanggan`, `telepon_pelanggan`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Klinik Edifuz', 'Jl. Kapten Suwandak No.50, Ditotrunan, Kec. Lumajang, Kab. Lumajang', '082121300100', NULL, '2023-06-02 05:52:55', '2023-06-02 05:52:55'),
(2, 'SMK Muhammadiyah', 'JL. Letkol Slamet Wardoyo, No. 103, Labruk Lor, Lumajang', '(0334) 890222', NULL, '2023-06-02 05:52:55', '2023-06-02 05:52:55'),
(3, 'RSUD Pasirian', 'Jl. Raya Pasirian No.225A, Kebonan, Pasirian, Kec. Pasirian, Kabupaten Lumajang', '(0334) 5761114', NULL, '2023-06-02 05:52:55', '2023-06-02 05:52:55'),
(4, 'RS. Bhayangkara', 'Jl. Kapten Kyai Ilyas No.7, Tompokersan, Kec. Lumajang, Kabupaten Lumajang', '(0334) 881646', NULL, '2023-06-02 05:52:55', '2023-06-02 05:52:55'),
(5, 'RS. Muhammadiyah', 'JL. Letkol Slamet Wardoyo, No. 103, Labruk Lor, Lumajang', '(0334) 8782955', NULL, '2023-06-02 05:52:55', '2023-06-02 05:52:55'),
(6, 'Dinas Kesehatan Lumajang', 'Jl. Jend. S. Parman No.13, Rogotrunan, Kec. Lumajang, Kabupaten Lumajang', '(0334) 881066', NULL, '2023-06-02 05:52:55', '2023-06-02 05:52:55'),
(7, 'SMK Negeri 1 Lumajang', 'Jl. H. O.S. Cokroaminoto No.161, Tompokersan, Kec. Lumajang', '(0334) 881866', NULL, '2023-06-02 05:52:55', '2023-06-02 05:52:55'),
(8, 'Firdan', 'Lumajang', '085284070404', NULL, '2023-06-02 05:52:55', '2023-06-02 05:52:55'),
(9, 'Mahendra', 'Lumajang', '085284070404', NULL, '2023-06-02 05:52:55', '2023-06-02 05:52:55'),
(10, 'Firman', '-', '-', NULL, '2023-06-02 15:14:24', '2023-06-02 15:14:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_kode_akun`
--

CREATE TABLE `mst_kode_akun` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_akun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mst_kode_akun`
--

INSERT INTO `mst_kode_akun` (`id`, `nama_akun`, `deleted_at`, `created_at`, `updated_at`) VALUES
('100', 'KAS', NULL, '2023-03-24 07:32:20', '2023-05-26 20:45:14'),
('1001', 'KASs', NULL, '2023-05-26 20:40:43', '2023-05-26 20:40:43'),
('101', 'KSA', NULL, '2023-03-24 07:32:20', '2023-05-25 14:57:34'),
('102', 'Bank Jatim', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('103', 'BCA', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('104', 'Hutang Tunai', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('105', 'Hutang Usaha', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('106', 'Hutang Lain-Lain', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('107', 'Hutang Saham', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('12', '12', '2023-05-26 19:44:35', '2023-05-25 14:58:50', '2023-05-26 19:44:35'),
('122', 'Piutang Usaha', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('125', 'Piutang Karyawan', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('126', 'Piutang Lain-Lain', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('140', 'Inventaris', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('151', 'Bahan Baku', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('152', 'Bahan Penolong', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('153', 'Bahan Pembersih', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('250', 'Uang Muka', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('401', 'Uang Muka', NULL, '2023-04-23 08:50:24', '2023-04-23 08:50:24'),
('620', 'Biaya Komisi', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('640', 'Biaya Promosi', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('700', 'Biaya Lembur', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('701', 'Biaya Gaji', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('702', 'Biaya Konsumsi', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('703', 'Biaya Perbaikan Kendaraan', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('703.1', 'Biaya Perbaikan Mesin', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('703.2', 'Biaya Perbaikan Bangunan', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('704', 'Biaya Transportasi', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('705', 'Biaya L.A.T', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('707', 'Biaya Kantor', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('709', 'Biaya Produksi', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('710', 'Biaya Kirim', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('712', 'Biaya Lain-Lain', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('713', 'Solar Pajak', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('715', 'Pendapatan Peralatan', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('716', 'Solar Genset', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20'),
('717', 'Pendapatan Lain-Lain', NULL, '2023-03-24 07:32:20', '2023-03-24 07:32:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_opsi_pembayaran`
--

CREATE TABLE `mst_opsi_pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opsi_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_rekening` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `atas_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mst_opsi_pembayaran`
--

INSERT INTO `mst_opsi_pembayaran` (`id`, `opsi_pembayaran`, `nomor_rekening`, `atas_nama`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'BCA', '123456', 'Firdan Mahendra', NULL, '2023-03-24 07:32:21', '2023-03-24 07:32:21'),
(3, 'Mandiri', '123456', 'Firdan Mahendra', NULL, '2023-03-24 07:32:21', '2023-05-03 11:16:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_produk`
--

CREATE TABLE `mst_produk` (
  `id_produk` int(10) UNSIGNED NOT NULL,
  `kode_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran_produk` varchar(122) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_produk` enum('qty','meter') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mst_produk`
--

INSERT INTO `mst_produk` (`id_produk`, `kode_produk`, `nama_produk`, `ukuran_produk`, `harga_produk`, `deleted_at`, `created_at`, `updated_at`, `type_produk`) VALUES
(1, 'FRONT280', 'Fronlite 280', 'meter', 17500, NULL, '2023-06-02 14:22:18', '2023-06-02 14:22:18', 'meter'),
(2, 'BC001', 'BC', 'A3', 5000, NULL, '2023-06-02 14:22:18', '2023-06-02 14:22:18', 'qty'),
(3, 'Dup350', 'Duplex', 'A3', 5000, NULL, '2023-06-02 14:22:18', '2023-06-02 14:22:18', 'qty'),
(4, 'Ap160', 'Art Paper', 'A3', 5000, NULL, '2023-06-02 14:22:18', '2023-06-02 14:22:18', 'qty'),
(5, 'HVS70', 'HVS', 'A3', 5000, NULL, '2023-06-02 14:22:18', '2023-06-02 14:22:18', 'qty'),
(6, 'CSTM01', 'Custom Ofset', 'custom', 5000, NULL, '2023-06-02 14:22:18', '2023-06-02 14:22:18', 'qty');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mst_supplier`
--

INSERT INTO `mst_supplier` (`id`, `nama_supplier`, `alamat_supplier`, `telepon_supplier`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Alea Grafika', 'Jl. Raya Tenggilis Mejoyo Blk. E - 7, Tenggilis Mejoyo, Surabaya', '(031) 8477784', NULL, '2023-06-01 14:39:09', '2023-06-01 14:39:09'),
(2, 'Aneka Binding', 'Jl. Sidosermo V No.65, Sidosermo, Kec. Wonocolo, Surabaya', '081553161358', NULL, '2023-06-01 14:39:09', '2023-06-01 14:39:09'),
(3, 'Aneka Jaya Perkasa', 'Jl. Wijaya Kusuma No.78, Ditotrunan, Lumajang', '-', NULL, '2023-06-01 14:39:09', '2023-06-01 14:39:09'),
(4, 'Aneka Vita', 'Jalan Jenderal Sudirman No.188-G, Tompokersan, Lumajang', '-', NULL, '2023-06-01 14:39:09', '2023-06-01 14:39:09'),
(5, 'ColorLink', 'Jl. Satsui Tubun No.8 F, Gadang, Kec. Sukun, Kota Malang', '-', NULL, '2023-06-01 14:39:09', '2023-06-01 14:39:09'),
(6, 'Golden Grafika', 'Taman indah regency, Geluran, Kec. Taman, Kabupaten Sidoarjo', '-', NULL, '2023-06-01 14:39:09', '2023-06-01 14:39:09'),
(7, 'Makmur Jaya Usaha', 'Jl. Kembang Jepun 110. SURABAYA', '-', NULL, '2023-06-01 14:39:09', '2023-06-01 14:39:09'),
(8, 'Megah Baru Jember', 'Jl. PB Sudirman No.22, Wetan Ktr., Jemberlor, Kec. Patrang, Kabupaten Jember', '-', NULL, '2023-06-01 14:39:09', '2023-06-01 14:39:09'),
(9, 'P. Taufik', 'Lumajang', '-', NULL, '2023-06-01 14:39:09', '2023-06-01 14:39:09'),
(10, 'PT. Bintang Cakra Kencana', 'Jl. Ahmad Yani No.48, Ketintang, Kec. Gayungan, Surabaya', '-', NULL, '2023-06-01 14:39:09', '2023-06-01 14:39:09'),
(11, 'PT. Binter Jet', 'Jl. Wiratno 7B, Kenjeran, Surabaya', '-', NULL, '2023-06-01 14:39:09', '2023-06-01 14:39:09'),
(12, 'Ryo Kertas', 'Ruko Perumahan Pesona Alam No. 01, Jl. Soekarno Hatta, Lumajang', '-', NULL, '2023-06-01 14:39:09', '2023-06-01 14:39:09'),
(13, 'Santana Citra Perkasa', 'JL. Margomulyo Permai, Blok E/22, Greges, Surabaya', '-', NULL, '2023-06-01 14:39:09', '2023-06-01 14:39:09'),
(14, 'Setia Kawan', 'Jl. Semeru No.124, Citrodiwangsan, Lumajang', '-', NULL, '2023-06-01 14:39:09', '2023-06-01 14:39:09'),
(15, 'Sinar Ilmu', 'Jl. Abu Bakar No.06, Citrodiwangsan, Kec. Lumajang', '08116758550', NULL, '2023-06-01 14:39:09', '2023-06-01 14:39:09'),
(16, 'Tk.  Minaret', 'Jl. Jendral Panjaitan No.71, Citrodiwangsan, Kec. Lumajang', '-', NULL, '2023-06-01 14:39:09', '2023-06-01 14:39:09'),
(17, 'UD Efod Jaya Abadi', 'JL. Tropodo 1, No. 225, Sidoarjo', '-', NULL, '2023-06-01 14:39:09', '2023-06-01 14:39:09'),
(18, 'Vicentra', 'Jl. Rungkut Asri Utara XIX No.93, Kali Rungkut, Kec. Rungkut, Surabaya', '085733399974', NULL, '2023-06-01 14:39:09', '2023-06-01 14:39:09'),
(19, 'PT. Mahkota Rajin Setia', 'JL. Rungkut Industri III/71, Surabaya', '031-8411177', NULL, '2023-06-01 14:39:09', '2023-06-01 14:39:09'),
(20, 'SPBU', 'Lumajang', '1', NULL, '2023-06-01 14:39:09', '2023-06-01 14:39:09'),
(21, 'Ravi', 'Lumajang', '1', NULL, '2023-06-01 14:39:09', '2023-06-01 14:39:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset`
--

CREATE TABLE `password_reset` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_reset`
--

INSERT INTO `password_reset` (`email`, `token`, `created_at`) VALUES
('firdanmahendraw@gmail.com', 'quScCK2RM3u6hpsPXDzR7KVFN1njhbcM7q1EqT85FmiLINJpy4aBVw0gdc11nbXI', '2023-06-11 09:48:08'),
('firdanmahendraw@gmail.com', 'J4fjXRNCvHGakWHa78mqnWBcW0MS1oIWmdTYZIVU6OSPBYZSIUrgcggZ4mQFN5xT', '2023-06-11 10:11:10'),
('firdanmahendraw@gmail.com', 'vGzBd6AjC9C3AHI4SRM1WcLtZ14kV1Fg8sNdkdrMkCcf6QEMffl594CSJf0dIwTX', '2023-06-11 10:45:42'),
('firdanmahendraw@gmail.com', '59tMmDPvMAd9FskwqzJtxqpIK3DeZrGRidsZrgmh38vN0Has7jESWHCuOQdJxDup', '2023-06-11 10:45:56'),
('firdanmahendraw@gmail.com', 'Y5pW2X182n6nzuEDLBbZfvX0OJ0SfpaeOrbJ8KkGg7RUh5QLNge2YUA0uKhvIPpq', '2023-06-11 10:58:51'),
('firdanmahendraw@gmail.com', 'djvVjXQnyso2sfRbo2bRbDwIac6o06d3wJ9xP91ckZTvarLqSsuTLMOz5ELDqXiC', '2023-06-11 10:59:55'),
('firdanmahendraw@gmail.com', 'o3iXIuXKA155sOZuB7Zh1jgPTa4FfDtvlKx3iptXsH8ohr2SAHzN1zJVgQmZSgUO', '2023-06-11 11:00:04'),
('firdanmahendraw@gmail.com', 'QgXxN0Vmnm6zYoPwjRScBTWbyeNwUs65YmCaoosIVr01qPeatUlB8pj0ke8UktoD', '2023-06-11 11:00:29'),
('firdanmahendraw@gmail.com', '8dF1wBFwG9EdmQ31N1TphMKNGcXMNpK5IFTWN23Ryreu0JDtReHmppR7LXLmstnU', '2023-06-11 11:06:31'),
('firdanmahendraw@gmail.com', 'OspN2jHkK3qMIYcYwchCJ5R4S3obZCHu1L0kuxtEtovhyFWgnRdkoLGPfE33V6qC', '2023-06-11 11:09:34'),
('firdanmahendraw@gmail.com', '0OZKjNUWRaeUDhJ0trKNslVsyGFx6Nt355cnoKKVt1EdTZKcDJ4kAsETx5NBL9yb', '2023-06-11 11:10:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `no_nota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `hutang` int(11) NOT NULL,
  `status` enum('pend','ok') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pend',
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id`, `id_supplier`, `no_nota`, `sub_total`, `bayar`, `hutang`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 8, '-', 2850000, 0, -2850000, 'ok', 'Hutang', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(2, 14, '-', 4466000, 0, -4466000, 'ok', 'Lunas', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(3, 14, '-', 42500, 42500, 0, 'ok', 'Lunas', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(4, 6, 'N009361', 88000, 0, -88000, 'ok', 'Hutang', '2023-01-04 15:17:16', '2023-01-04 15:17:16'),
(5, 12, 'TRN0701200003', 5367000, 5367000, 0, 'ok', 'Lunas', '2023-01-07 15:17:16', '2023-01-07 15:17:16'),
(6, 6, 'N009395', 264000, 0, -264000, 'ok', 'Hutang', '2023-01-08 15:17:16', '2023-01-08 15:17:16'),
(7, 14, '-', 33750, 33750, 0, 'ok', 'Lunas', '2023-01-08 15:17:16', '2023-01-08 15:17:16'),
(8, 14, '-', 1620000, 1620000, 0, 'ok', 'Lunas', '2023-01-08 15:17:16', '2023-01-08 15:17:16'),
(9, 14, '-', 1032500, 1032500, 0, 'ok', 'Lunas', '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(10, 14, '-', 47000, 47000, 0, 'ok', 'Lunas', '2023-01-17 15:17:16', '2023-01-17 15:17:16'),
(11, 6, 'N009564', 35000, 0, -35000, 'ok', 'Hutang', '2023-01-28 15:17:16', '2023-01-28 15:17:16'),
(12, 12, '-', 342225, 342225, 0, 'ok', 'Lunas', '2023-01-28 15:17:16', '2023-01-28 15:17:16'),
(13, 6, 'N009580', 455000, 0, -455000, 'ok', 'Hutang', '2023-01-29 15:17:16', '2023-01-29 15:17:16'),
(14, 14, '-', 93600, 93600, 0, 'ok', 'Lunas', '2023-01-29 15:17:16', '2023-01-29 15:17:16'),
(15, 6, 'N009584', 592000, 0, -592000, 'ok', 'Hutang', '2023-01-30 15:17:16', '2023-01-30 15:17:16'),
(16, 16, '-', 44000, 44000, 0, 'ok', 'Lunas', '2023-02-01 15:17:16', '2023-02-01 15:17:16'),
(17, 14, '-', 167500, 167500, 0, 'ok', 'Lunas', '2023-02-04 15:17:16', '2023-02-04 15:17:16'),
(18, 16, '-', 33000, 33000, 0, 'ok', 'Lunas', '2023-02-06 15:17:16', '2023-02-06 15:17:16'),
(19, 14, '-', 33000, 33000, 0, 'ok', 'Lunas', '2023-02-07 15:17:16', '2023-02-07 15:17:16'),
(20, 6, 'N009655', 88000, 0, -88000, 'ok', 'Hutang', '2023-02-08 15:17:16', '2023-02-08 15:17:16'),
(21, 14, '-', 65000, 65000, 0, 'ok', 'Lunas', '2023-02-11 15:17:16', '2023-02-11 15:17:16'),
(22, 16, '-', 22000, 22000, 0, 'ok', 'Lunas', '2023-02-11 15:17:16', '2023-02-11 15:17:16'),
(23, 18, 'FJ200200164', 130000, 0, -130000, 'ok', 'Hutang', '2023-02-13 15:17:16', '2023-02-13 15:17:16'),
(24, 19, 'SN20020384', 341000, 0, -341000, 'ok', 'Lunas', '2023-02-14 15:17:16', '2023-02-14 15:17:16'),
(25, 14, '-', 311500, 311500, 0, 'ok', 'Lunas', '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(26, 14, '-', 182000, 182000, 0, 'ok', 'Lunas', '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(27, 1, 'JLPST0036494', 328625, 0, -328625, 'ok', 'Hutang', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(28, 20, 'N155321', 80000, 80000, 0, 'ok', 'Lunas', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(29, 14, '-', 489500, 489500, 0, 'ok', 'Lunas', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(30, 6, 'N009730', 1540000, 0, -1540000, 'ok', 'Hutang', '2023-02-18 15:17:16', '2023-02-18 15:17:16'),
(31, 6, 'N009788', 176000, 0, 176000, 'ok', 'Hutang', '2023-02-26 15:17:16', '2023-02-26 15:17:16'),
(32, 21, '-', 165000, 165000, 0, 'ok', 'Lunas', '2023-02-27 15:17:16', '2023-02-27 15:17:16'),
(33, 8, '-', 833000, 0, -83000, 'ok', 'Hutang', '2023-02-28 15:17:16', '2023-02-28 15:17:16'),
(34, 14, '-', 144500, 144500, 0, 'ok', 'Lunas', '2023-03-01 15:17:16', '2023-03-01 15:17:16'),
(35, 6, 'N009816', 88000, 0, -88000, 'ok', 'Hutang', '2023-03-02 15:17:16', '2023-03-02 15:17:16'),
(36, 16, '-', 8000, 8000, 0, 'ok', 'Lunas', '2023-03-09 15:17:16', '2023-03-09 15:17:16'),
(37, 6, 'N009868', 88000, 0, -88000, 'ok', 'Hutang', '2023-03-10 15:17:16', '2023-03-10 15:17:16'),
(38, 14, '-', 41000, 41000, 0, 'ok', 'Lunas', '2023-03-10 15:17:16', '2023-03-10 15:17:16'),
(39, 14, '-', 150000, 150000, 0, 'ok', 'Lunas', '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(40, 14, '-', 123000, 123000, 0, 'ok', 'Lunas', '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(41, 9, '-', 150000, 150000, 0, 'ok', 'Lunas', '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(42, 20, 'N237695', 80000, 80000, 0, 'ok', 'Lunas', '2023-03-18 15:18:16', '2023-03-18 15:18:16'),
(43, 14, '-', 89000, 89000, 0, 'ok', 'Lunas', '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(44, 14, '-', 47000, 47000, 0, 'ok', 'Lunas', '2023-03-18 15:18:16', '2023-03-18 15:18:16'),
(45, 10, '304128020', 1460000, 0, -1460000, 'ok', 'Hutang', '2023-03-28 15:17:16', '2023-03-28 15:17:16'),
(46, 14, '-', 36500, 36500, 0, 'ok', 'Lunas', '2023-03-28 15:17:16', '2023-03-28 15:17:16'),
(47, 14, '-', 58000, 58000, 0, 'ok', 'Lunas', '2023-03-28 15:17:16', '2023-03-28 15:17:16'),
(48, 8, '-', 490000, 0, -490000, 'ok', 'Hutang', '2023-03-30 15:17:16', '2023-03-30 15:17:16'),
(49, 19, 'SN20030715', 391600, 0, -391600, 'ok', 'Hutang', '2023-03-30 15:17:16', '2023-03-30 15:17:16'),
(50, 9, '-', 150000, 150000, 0, 'ok', 'Lunas', '2023-03-31 15:17:16', '2023-03-31 15:17:16'),
(51, 18, 'FJ200400007', 400000, 0, 0, 'ok', 'Lunas (tunai-13/06/2023)', '2023-04-01 15:17:16', '2023-06-13 14:47:19'),
(52, 19, 'SN20040033', 613800, 0, -613800, 'ok', 'Hutang', '2023-04-01 15:17:16', '2023-04-01 15:17:16'),
(53, 6, 'N010023', 100000, 0, -100000, 'ok', 'Hutang', '2023-04-06 15:17:16', '2023-04-06 15:17:16'),
(54, 14, '-', 287000, 287000, 0, 'ok', 'Lunas', '2023-04-06 15:17:16', '2023-04-06 15:17:16'),
(55, 14, '-', 160000, 160000, 0, 'ok', 'Lunas', '2023-04-15 15:17:16', '2023-04-15 15:17:16'),
(56, 1, 'JLPST0038712', 850025, 0, -850025, 'ok', 'Hutang', '2023-04-16 15:17:16', '2023-04-16 15:17:16'),
(57, 20, 'N308639', 76500, 76500, 0, 'ok', 'Lunas', '2023-04-16 15:17:16', '2023-04-16 15:17:16'),
(58, 14, '-', 156000, 156000, 0, 'ok', 'Lunas', '2023-04-16 15:17:16', '2023-04-16 15:17:16'),
(59, 20, 'N347040', 76500, 76500, 0, 'ok', 'Lunas', '2023-04-30 15:17:16', '2023-04-30 15:17:16'),
(60, 14, '-', 88000, 88000, 0, 'ok', 'Lunas', '2023-04-30 15:17:16', '2023-04-30 15:17:16'),
(61, 14, '-', 32500, 32500, 0, 'ok', 'Lunas', '2023-05-02 15:17:16', '2023-05-02 15:17:16'),
(62, 13, 'N724', 6150034, 0, -6150034, 'ok', 'Hutang', '2023-05-04 15:17:16', '2023-05-04 15:17:16'),
(63, 6, 'N010147', 1248000, 0, -1248000, 'ok', 'Hutang', '2023-05-05 15:17:16', '2023-05-05 15:17:16'),
(64, 1, 'JLPST0039', 782100, 0, -782100, 'ok', 'Hutang', '2023-05-11 15:17:16', '2023-05-11 15:17:16'),
(65, 14, '-', 60000, 60000, 0, 'ok', 'Lunas', '2023-05-15 15:17:16', '2023-05-15 15:17:16'),
(66, 6, 'N010202', 100000, 0, -100000, 'ok', 'Hutang', '2023-05-16 15:17:16', '2023-05-16 15:17:16'),
(67, 20, 'N392484', 76500, 76500, 0, 'ok', 'Lunas', '2023-05-16 15:17:16', '2023-05-16 15:17:16'),
(68, 6, 'N010211', 195000, 0, -195000, 'ok', 'Hutang', '2023-05-18 15:17:16', '2023-05-18 15:17:16'),
(69, 14, '-', 13800, 13800, 0, 'ok', 'Lunas', '2023-05-18 15:17:16', '2023-05-18 15:17:16'),
(70, 9, '-', 150000, 150000, 0, 'ok', 'Lunas', '2023-05-30 15:17:16', '2023-05-30 15:17:16'),
(72, 14, '-', 212000, 212000, 0, 'ok', 'Lunas', '2023-06-02 15:16:17', '2023-06-02 15:20:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pembelian` bigint(11) NOT NULL,
  `id_akun` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uraian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` double NOT NULL,
  `harga` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'hutang',
  `status` enum('pend','ok') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pend',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`id`, `id_pembelian`, `id_akun`, `uraian`, `satuan`, `jumlah`, `harga`, `sub_total`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '151', 'AP 85g (65)', 'rim', 6, 475000, 2850000, 'Hutang', 'ok', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(2, 2, '151', 'BC Bandung Putih', 'pack', 1, 325000, 325000, 'Hutang', 'ok', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(3, 2, '151', 'BC Bandung Merah', 'pack', 1, 340000, 340000, 'Hutang', 'ok', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(4, 2, '151', 'BC Bandung Biru', 'pack', 1, 340000, 340000, 'Hutang', 'ok', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(5, 2, '151', 'BC Bandung Kuning', 'pack', 1, 340000, 340000, 'Hutang', 'ok', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(6, 2, '151', 'HVS 70g (79) PaperPlus', 'rim', 3, 432000, 1296000, 'Hutang', 'ok', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(7, 2, '151', 'HVS 70g (65) PaperPlus', 'rim', 5, 328000, 1640000, 'Hutang', 'ok', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(8, 2, '151', 'Karton 160', 'pack', 1, 185000, 185000, 'Hutang', 'ok', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(9, 3, '151', 'PVC Silver 200g', 'kg', 1, 20000, 20000, 'Lunas', 'ok', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(10, 3, '151', 'PVC Red 200g', 'kg', 1, 22500, 22500, 'Lunas', 'ok', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(11, 4, '709', 'Plate Kalender Duduk', 'lbr', 4, 22000, 88000, 'Hutang', 'ok', '2023-01-04 15:17:16', '2023-01-04 15:17:16'),
(12, 5, '151', 'AP 150g (79x109)', 'lbr', 520, 2275, 1183000, 'Lunas', 'ok', '2023-01-07 15:17:16', '2023-01-07 15:17:16'),
(13, 5, '151', 'AP 120g (65x100)', 'lbr', 2000, 1287, 2574000, 'Lunas', 'ok', '2023-01-07 15:17:16', '2023-01-07 15:17:16'),
(14, 5, '151', 'AP 150g (65x100)', 'lbr', 1000, 1610, 1610000, 'Lunas', 'ok', '2023-01-07 15:17:16', '2023-01-07 15:17:16'),
(15, 6, '709', 'Plate Brosur STKIP', 'lbr', 4, 22000, 88000, 'Hutang', 'ok', '2023-01-08 15:17:16', '2023-01-08 15:17:16'),
(16, 6, '709', 'PlateTiket Masuk', 'lbr', 4, 22000, 88000, 'Hutang', 'ok', '2023-01-08 15:17:16', '2023-01-08 15:17:16'),
(17, 6, '709', 'PlateTiket Parkir Gambir', 'lbr', 4, 22000, 88000, 'Hutang', 'ok', '2023-01-08 15:17:16', '2023-01-08 15:17:16'),
(18, 7, '151', 'Plastik Uk 12,5x24', 'pack', 5, 6750, 33750, 'Lunas', 'ok', '2023-01-08 15:17:16', '2023-01-08 15:17:16'),
(19, 8, '151', 'HVS AL F4 70g', 'rim', 40, 40500, 1620000, 'Lunas', 'ok', '2023-01-08 15:17:16', '2023-01-08 15:17:16'),
(20, 9, '151', 'Id Card PVC V-Tech', 'pack', 50, 5500, 275000, 'Lunas', 'ok', '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(21, 9, '152', 'Acco Joyco Putih (Snel)', 'pack', 50, 7500, 375000, 'Lunas', 'ok', '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(22, 9, '151', 'Amplop PPL KAB 90 PPS', 'pack', 5, 17500, 87500, 'Lunas', 'ok', '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(23, 9, '151', 'Amplop Samson B', 'pack', 5, 18000, 90000, 'Lunas', 'ok', '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(24, 9, '151', 'Amplop Samson E', 'pack', 5, 41000, 205000, 'Lunas', 'ok', '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(25, 10, '151', 'Glory 210g', 'lbr', 10, 4700, 47000, 'Lunas', 'ok', '2023-01-17 15:17:16', '2023-01-17 15:17:16'),
(26, 11, '709', 'Plate Isi Kohir', 'lbr', 1, 35000, 35000, 'Hutang', 'ok', '2023-01-28 15:17:16', '2023-01-28 15:17:16'),
(27, 12, '151', 'Duplex 250g (79x109)', 'lbr', 135, 2535, 342225, 'Lunas', 'ok', '2023-01-28 15:17:16', '2023-01-28 15:17:16'),
(28, 13, '709', 'Plate Isi Merdeka', 'lbr', 13, 35000, 455000, 'Hutang', 'ok', '2023-01-29 15:17:16', '2023-01-29 15:17:16'),
(29, 14, '151', 'Stiker HVS', 'lbr', 36, 2600, 93600, 'Lunas', 'ok', '2023-01-29 15:17:16', '2023-01-29 15:17:16'),
(30, 15, '709', 'Plate Cover Manfaat Record', 'lbr', 8, 22000, 176000, 'Hutang', 'ok', '2023-01-30 15:17:16', '2023-01-30 15:17:16'),
(31, 15, '709', 'Plate Laporan Realisasi', 'lbr', 1, 13000, 13000, 'Hutang', 'ok', '2023-01-30 15:17:16', '2023-01-30 15:17:16'),
(32, 15, '709', 'Plate Cover Doreng', 'lbr', 4, 22000, 88000, 'Hutang', 'ok', '2023-01-30 15:17:16', '2023-01-30 15:17:16'),
(33, 15, '709', 'Plate Tabloid Peduli Rakyat', 'lbr', 9, 35000, 315000, 'Hutang', 'ok', '2023-01-30 15:17:16', '2023-01-30 15:17:16'),
(34, 16, '152', 'Lakban Hitam Besar', 'pcs', 4, 11000, 44000, 'Lunas', 'ok', '2023-02-01 15:17:16', '2023-02-01 15:17:16'),
(35, 17, '151', 'HVS MAXI A4 70g', 'rim', 5, 33500, 167500, 'Lunas', 'ok', '2023-02-04 15:17:16', '2023-02-04 15:17:16'),
(36, 18, '152', 'Lakban Bening Besar', 'pcs', 3, 11000, 33000, 'Lunas', 'ok', '2023-02-06 15:17:16', '2023-02-06 15:17:16'),
(37, 18, '152', 'Lakban Coklat Besar', 'pcs', 1, 11000, 11000, 'Lunas', 'ok', '2023-02-06 15:17:16', '2023-02-06 15:17:16'),
(38, 19, '151', 'BC Putih Rambow', 'lbr', 20, 1650, 33000, 'Lunas', 'ok', '2023-02-07 15:17:16', '2023-02-07 15:17:16'),
(39, 20, '709', 'Brosur STKIP', 'lbr', 4, 22000, 88000, 'Hutang', 'ok', '2023-02-08 15:17:16', '2023-02-08 15:17:16'),
(40, 20, '709', 'Brosur Kedai & Map JGP', 'lbr', 8, 22000, 176000, 'Hutang', 'ok', '2023-02-08 15:17:16', '2023-02-08 15:17:16'),
(41, 21, '151', 'Stiker HVS', 'lbr', 25, 2600, 65000, 'Lunas', 'ok', '2023-02-11 15:17:16', '2023-02-11 15:17:16'),
(42, 22, '152', 'Lakban Bening Besar', 'pcs', 2, 11000, 22000, 'Lunas', 'ok', '2023-02-11 15:17:16', '2023-02-11 15:17:16'),
(43, 23, '153', 'SpareGum', 'btl', 2, 65000, 130000, 'Hutang', 'ok', '2023-02-13 15:17:16', '2023-02-13 15:17:16'),
(44, 23, '153', 'Gum Solution', 'gln', 2, 42500, 85000, 'Hutang', 'ok', '2023-02-13 15:17:16', '2023-02-13 15:17:16'),
(45, 24, '151', 'New Cahaya Pro Yellow', 'kg', 5, 68200, 341000, 'Hutang', 'ok', '2023-02-14 15:17:16', '2023-02-14 15:17:16'),
(46, 24, '151', 'New Cahaya Pro Black', 'kg', 3, 63800, 191400, 'Hutang', 'ok', '2023-02-14 15:17:16', '2023-02-14 15:17:16'),
(47, 24, '151', 'Best One Pro Yellow', 'kg', 2, 92400, 184800, 'Hutang', 'ok', '2023-02-14 15:17:16', '2023-02-14 15:17:16'),
(48, 24, '151', 'Best One Pro Black', 'kg', 2, 83600, 167200, 'Hutang', 'ok', '2023-02-14 15:17:16', '2023-02-14 15:17:16'),
(49, 25, '151', 'Pro Top White', 'rim', 7, 44500, 311500, 'Lunas', 'ok', '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(50, 25, '151', 'Pro Bottom Yellow', 'rim', 4, 41500, 166000, 'Lunas', 'ok', '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(51, 25, '151', 'Pro Bottom Pink', 'rim', 3, 41500, 124500, 'Lunas', 'ok', '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(52, 25, '151', 'NCR Top White', 'rim', 3, 49500, 148500, 'Lunas', 'ok', '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(53, 25, '151', 'NCR Bottom Pink', 'rim', 2, 45500, 91000, 'Lunas', 'ok', '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(54, 25, '151', 'NCR Bottom Yellow', 'rim', 1, 45500, 45500, 'Lunas', 'ok', '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(55, 26, '151', 'Pro Bottom White', 'rim', 4, 45500, 182000, 'Lunas', 'ok', '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(56, 26, '151', 'Pro Bottom Blue', 'rim', 1, 45500, 45500, 'Lunas', 'ok', '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(57, 27, '152', 'Tali RAfia Netral', 'kg', 23.9, 13750, 328625, 'Hutang', 'ok', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(58, 27, '152', 'Tali RAfia Netral', 'kg', 20.5, 13750, 281875, 'Hutang', 'ok', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(59, 27, '152', 'Rol Air 650x50-40 (Newmoll 2 Pcs)', 'mm', 1400, 159, 244644, 'Hutang', 'ok', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(60, 28, '153', 'Bensin Produksi', 'ltr', 10.457516, 7650, 80000, 'Lunas', 'ok', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(61, 29, '151', 'Pro Top White', 'rim', 11, 44500, 489500, 'Lunas', 'ok', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(62, 29, '151', 'Pro Middle Yellow', 'rim', 10, 47000, 470000, 'Lunas', 'ok', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(63, 29, '151', 'Pro Middle Pink', 'rim', 1, 47000, 47000, 'Lunas', 'ok', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(64, 29, '151', 'Pro Bottom Pink', 'rim', 5, 41500, 207500, 'Lunas', 'ok', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(65, 29, '151', 'Pro Bottom Yellow', 'rim', 6, 41500, 249000, 'Lunas', 'ok', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(66, 29, '151', 'HVS MAXI F4 70g', 'rim', 15, 37500, 562500, 'Lunas', 'ok', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(67, 30, '709', 'Plate Buku Lansia Film', 'lbr', 44, 35000, 1540000, 'Hutang', 'ok', '2023-02-18 15:17:16', '2023-02-18 15:17:16'),
(68, 30, '709', 'Plate Isi Merdeka', 'lbr', 13, 35000, 455000, 'Hutang', 'ok', '2023-02-18 15:17:16', '2023-02-18 15:17:16'),
(69, 30, '709', 'Plate Majalah PGRI', 'lbr', 17, 22000, 274000, 'Hutang', 'ok', '2023-02-18 15:17:16', '2023-02-18 15:17:16'),
(70, 31, '709', 'Plate Leaflet OK', 'lbr', 8, 22000, 176000, 'Hutang', 'ok', '2023-02-26 15:17:16', '2023-02-26 15:17:16'),
(71, 31, '709', 'Plate Verval 2023', 'lbr', 2, 22000, 44000, 'Hutang', 'ok', '2023-02-26 15:17:16', '2023-02-26 15:17:16'),
(72, 31, '709', 'Plate Verval 2023', 'lbr', 2, 13000, 26000, 'Hutang', 'ok', '2023-02-26 15:17:16', '2023-02-26 15:17:16'),
(73, 32, '151', 'HVS 70g F4', 'rim', 5, 33000, 165000, 'Lunas', 'ok', '2023-02-27 15:17:16', '2023-02-27 15:17:16'),
(74, 33, '151', 'AP 120g (79)', 'rim', 1, 833000, 833000, 'Hutang', 'ok', '2023-02-28 15:17:16', '2023-02-28 15:17:16'),
(75, 33, '151', 'AP 150g (65x100)', 'rim', 1, 805000, 805000, 'Hutang', 'ok', '2023-02-28 15:17:16', '2023-02-28 15:17:16'),
(76, 33, '151', 'HVS 70g (79)', 'rim', 1, 432000, 432000, 'Hutang', 'ok', '2023-02-28 15:17:16', '2023-02-28 15:17:16'),
(77, 33, '151', 'BC Bandung Putih', 'rim', 1, 650000, 650000, 'Hutang', 'ok', '2023-02-28 15:17:16', '2023-02-28 15:17:16'),
(78, 34, '152', 'Isi Etona 23/8', 'pack', 17, 8500, 144500, 'Lunas', 'ok', '2023-02-28 15:17:16', '2023-02-28 15:17:16'),
(79, 35, '709', 'Plate Amplop Film', 'lbr', 4, 22000, 88000, 'Hutang', 'ok', '2023-03-02 15:17:16', '2023-03-02 15:17:16'),
(80, 35, '709', 'Plate Tiket Masuk', 'lbr', 4, 22000, 88000, 'Hutang', 'ok', '2023-03-02 15:17:16', '2023-03-02 15:17:16'),
(81, 36, '152', 'isolasi Kecil', 'pcs', 2, 4000, 8000, 'Lunas', 'ok', '2023-03-09 15:17:16', '2023-03-09 15:17:16'),
(82, 37, '709', 'Plate Amplop Film', 'lbr', 4, 22000, 88000, 'Hutang', 'ok', '2023-03-10 15:17:16', '2023-03-10 15:17:16'),
(83, 37, '709', 'Plate Soal KTSP Kls 3', 'lbr', 18, 13000, 234000, 'Hutang', 'ok', '2023-03-10 15:17:16', '2023-03-10 15:17:16'),
(84, 37, '709', 'Plate Soal K-13 Kls3', 'lbr', 12, 13000, 156000, 'Hutang', 'ok', '2023-03-10 15:17:16', '2023-03-10 15:17:16'),
(85, 38, '151', 'HVS Warna Kuning 58', 'rim', 1, 41000, 41000, 'Lunas', 'ok', '2023-03-10 15:17:16', '2023-03-10 15:17:16'),
(86, 38, '151', 'HVS Warna Hijau 58', 'rim', 3, 41000, 123000, 'Lunas', 'ok', '2023-03-10 15:17:16', '2023-03-10 15:17:16'),
(87, 38, '151', 'Acco Joyco Putih (Snel)', 'pack', 20, 7500, 150000, 'Lunas', 'ok', '2023-03-10 15:17:16', '2023-03-10 15:17:16'),
(88, 39, '152', 'Acco Joyco Putih (Snel)', 'pack', 20, 7500, 150000, 'Lunas', 'ok', '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(89, 40, '151', 'HVS Warna Hijau 58', 'rim', 3, 41500, 123000, 'Lunas', 'ok', '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(90, 40, '151', 'Mika Bening', 'pack', 2, 21500, 43000, 'Lunas', 'ok', '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(91, 40, '152', 'Double Tape 1/4 (kecil)', 'pcs', 40, 1125, 45000, 'Lunas', 'ok', '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(92, 41, '153', 'Minyak Tanah', 'rim', 10, 15000, 150000, 'Lunas', 'ok', '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(93, 42, '153', 'Bensin Produksi', 'ltr', 10.4575163, 7650, 80000, 'Lunas', 'ok', '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(94, 43, '151', 'Pro Top White', 'rim', 2, 44500, 89000, 'Lunas', 'ok', '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(95, 43, '151', 'Pro Middle White', 'rim', 2, 47000, 94000, 'Lunas', 'ok', '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(96, 43, '151', 'Pro Bottom White', 'rim', 2, 41500, 8300, 'Lunas', 'ok', '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(97, 43, '151', 'Concurt Krem', 'lbr', 70, 5400, 378000, 'Lunas', 'ok', '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(98, 44, '151', 'Glory 210g', 'lbr', 10, 4700, 47000, 'Lunas', 'ok', '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(99, 44, '151', 'Stiker Bontax Camel', 'lbr', 25, 2900, 72500, 'Lunas', 'ok', '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(100, 44, '151', 'Stiker HVS', 'lbr', 40, 2600, 104000, 'Lunas', 'ok', '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(101, 45, '151', 'Laminasi Glossy (T. BOP 300x30)', 'roll', 2, 730000, 1460000, 'Hutang', 'ok', '2023-03-28 15:17:16', '2023-03-28 15:17:16'),
(102, 46, '151', 'HVS MAXI F4 70g', 'rim', 1, 36500, 36500, 'Lunas', 'ok', '2023-03-28 15:17:16', '2023-03-28 15:17:16'),
(103, 47, '151', 'Stiker Bontax Camel', 'lbr', 20, 2900, 58000, 'Lunas', 'ok', '2023-03-28 15:17:16', '2023-03-28 15:17:16'),
(104, 48, '151', 'Linen', 'lbr', 100, 4900, 49000, 'Hutang', 'ok', '2023-03-30 15:17:16', '2023-03-30 15:17:16'),
(105, 48, '151', 'Glory 230g', 'lbr', 100, 5100, 51000, 'Hutang', 'ok', '2023-03-30 15:17:16', '2023-03-30 15:17:16'),
(106, 49, '151', 'Best One Pro Magenta', 'kg', 4, 97900, 391600, 'Hutang', 'ok', '2023-03-30 15:17:16', '2023-03-30 15:17:16'),
(107, 49, '151', 'Best One Pro Cyan', 'kg', 4, 101200, 404800, 'Hutang', 'ok', '2023-03-30 15:17:16', '2023-03-30 15:17:16'),
(108, 49, '151', 'Best One Pro Yellow', 'kg', 4, 92400, 369600, 'Hutang', 'ok', '2023-03-30 15:17:16', '2023-03-30 15:17:16'),
(109, 50, '153', 'Minyak Tanah', 'ltr', 10, 15000, 150000, 'Lunas', 'ok', '2023-03-31 15:17:16', '2023-03-31 15:17:16'),
(110, 51, '153', 'Plate Cleaner', 'btl', 20, 20000, 40000, 'lunas', 'ok', '2023-04-01 15:17:16', '2023-06-13 14:47:19'),
(111, 51, '153', 'M-Fountain', 'gln', 1, 165000, 165000, 'lunas', 'ok', '2023-04-01 15:17:16', '2023-06-13 14:47:19'),
(112, 52, '151', 'New Cahaya Pro Yellow', 'kg', 9, 68200, 614800, 'Hutang', 'ok', '2023-04-01 15:17:16', '2023-04-01 15:17:16'),
(113, 52, '151', 'New Cahaya Pro Magenta', 'kg', 9, 73700, 663300, 'Hutang', 'ok', '2023-04-01 15:17:16', '2023-04-01 15:17:16'),
(114, 52, '151', 'New Cahaya Pro Cyan', 'kg', 9, 78100, 702900, 'Hutang', 'ok', '2023-04-01 15:17:16', '2023-04-01 15:17:16'),
(115, 52, '151', 'New Cahaya Pro Back', 'kg', 9, 63800, 574200, 'Hutang', 'ok', '2023-04-01 15:17:16', '2023-04-01 15:17:16'),
(116, 52, '151', 'Best One Pro Yellow', 'kg', 3, 92400, 277200, 'Hutang', 'ok', '2023-04-01 15:17:16', '2023-04-01 15:17:16'),
(117, 52, '151', 'Best One Pro Magenta', 'kg', 3, 97900, 293700, 'Hutang', 'ok', '2023-04-01 15:17:16', '2023-04-01 15:17:16'),
(118, 53, '709', 'Plate Map Dinas Pertanian', 'kg', 4, 25000, 100000, 'Hutang', 'ok', '2023-04-06 15:17:16', '2023-04-06 15:17:16'),
(119, 54, '151', 'HVS Warna Kuning 58', 'rim', 7, 41000, 287000, 'Lunas', 'ok', '2023-04-06 15:17:16', '2023-04-06 15:17:16'),
(120, 54, '151', 'HVS Warna Merah 58', 'rim', 3, 41000, 123000, 'Lunas', 'ok', '2023-04-06 15:17:16', '2023-04-06 15:17:16'),
(121, 55, '151', 'BC Putih Rambow', 'lbr', 100, 1600, 160000, 'Lunas', 'ok', '2023-04-15 15:17:16', '2023-04-15 15:17:16'),
(122, 56, '151', 'Special X Banner 60*160 (Tiang)', 'pcs', 50, 17001, 850025, 'Hutang', 'ok', '2023-04-16 15:17:16', '2023-04-16 15:17:16'),
(123, 57, '153', 'Bensin Produksi', 'ltr', 10, 7650, 76500, 'Lunas', 'ok', '2023-04-16 15:17:16', '2023-04-16 15:17:16'),
(124, 58, '151', 'Stiker HVS', 'lbr', 60, 2600, 156000, 'Lunas', 'ok', '2023-04-16 15:17:16', '2023-04-16 15:17:16'),
(125, 59, '153', 'Bensin Produksi', 'ltr', 10, 7650, 76500, 'Lunas', 'ok', '2023-04-30 15:17:16', '2023-04-30 15:17:16'),
(126, 60, '151', 'Top White Pro', 'rim', 2, 44000, 88000, 'Lunas', 'ok', '2023-04-30 15:17:16', '2023-04-30 15:17:16'),
(127, 61, '151', 'Triplex Board 210g', 'lbr', 10, 3250, 32500, 'Lunas', 'ok', '2023-05-02 15:17:16', '2023-05-02 15:17:16'),
(128, 62, '151', 'HVS 70g (61X86) PaperPlus', 'rim', 22, 279547, 6150034, 'Hutang', 'ok', '2023-05-04 15:17:16', '2023-05-04 15:17:16'),
(129, 62, '151', 'HVS 70g (65X100) PaperPlus', 'rim', 22, 346369, 7620118, 'Hutang', 'ok', '2023-05-04 15:17:16', '2023-05-04 15:17:16'),
(130, 62, '151', 'AP150g (65x100)', 'rim', 6, 829237, 4975422, 'Hutang', 'ok', '2023-05-04 15:17:16', '2023-05-04 15:17:16'),
(131, 62, '151', 'AP 150g (79x109)', 'rim', 2, 1064643, 2129286, 'Hutang', 'ok', '2023-05-04 15:17:16', '2023-05-04 15:17:16'),
(132, 62, '151', 'Ivory 300g (79x109)', 'rim', 1, 2251356, 2251356, 'Hutang', 'ok', '2023-05-04 15:17:16', '2023-05-04 15:17:16'),
(133, 62, '151', 'AC 260g (79x109)', 'rim', 1, 1857135, 1857135, 'Hutang', 'ok', '2023-05-04 15:17:16', '2023-05-04 15:17:16'),
(134, 63, '709', 'Plate BTS Film', 'lbr', 32, 39000, 1248000, 'Hutang', 'ok', '2023-05-05 15:17:16', '2023-05-05 15:17:16'),
(135, 64, '152', 'Blanket Fujifura 730x650 (Mesin 72)', 'mm', 650, 1203, 782100, 'Hutang', 'ok', '2023-05-05 15:17:16', '2023-05-05 15:17:16'),
(136, 65, '152', 'Isi Staples Etona 23/6', 'pack', 10, 6000, 60000, 'Lunas', 'ok', '2023-05-15 15:17:16', '2023-05-15 15:17:16'),
(137, 66, '709', 'Plate Label Subur', 'lbr', 4, 25000, 100000, 'Hutang', 'ok', '2023-05-16 15:17:16', '2023-05-16 15:17:16'),
(138, 67, '153', 'Bensin Produksi', 'ltr', 10, 7650, 76500, 'Lunas', 'ok', '2023-05-16 15:17:16', '2023-05-16 15:17:16'),
(139, 68, '709', 'Plate Isi Merdeka News', 'lbr', 5, 39000, 195000, 'Hutang', 'ok', '2023-05-18 15:17:16', '2023-05-18 15:17:16'),
(140, 69, '152', 'Dobel Tape Pajero 12mm (Sedang)', 'pcs', 6, 2300, 13800, 'Lunas', 'ok', '2023-05-16 15:17:16', '2023-05-16 15:17:16'),
(141, 70, '153', 'Minyak Tanah', 'ltr', 10, 15000, 150000, 'Lunas', 'ok', '2023-05-18 15:17:16', '2023-05-18 15:17:16'),
(142, 72, '151', 'hvs 80g', 'rim', 2, 42500, 85000, 'lunas', 'ok', '2023-06-02 15:17:17', '2023-06-02 15:20:00'),
(143, 72, '100', 'New Cahaya Pro Magenta', 'klg', 1, 127000, 127000, 'lunas', 'ok', '2023-06-02 15:18:04', '2023-06-02 15:20:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(10) UNSIGNED NOT NULL,
  `no_nota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `acc_desain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_harga` int(11) NOT NULL,
  `diskon` int(11) DEFAULT NULL,
  `harga_akhir` int(11) NOT NULL,
  `diterima` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `piutang` int(11) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `no_nota`, `id_pelanggan`, `acc_desain`, `total_harga`, `diskon`, `harga_akhir`, `diterima`, `kembali`, `piutang`, `id_user`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'NT23010001', 8, 'Faris', 1925000, 0, 1925000, 1925000, 0, 0, 2, 'Lunas', '2023-01-02 21:11:58', '2023-01-02 21:11:58'),
(2, 'NT23010002', 9, 'Faris', 5500000, 0, 5500000, 1500000, -4000000, 0, 2, 'Lunas (13/06/2023)', '2023-01-08 21:11:58', '2023-06-13 14:46:13'),
(3, 'NT23010003', 2, 'Faris', 1720000, 0, 1720000, 1720000, 0, 0, 2, 'Lunas', '2023-01-08 21:11:58', '2023-01-08 21:11:58'),
(4, 'NT23010004', 1, 'Faris', 1330000, 0, 1330000, 1330000, 0, 0, 2, 'Lunas', '2023-01-09 21:11:58', '2023-01-09 21:11:58'),
(5, 'NT23010005', 2, 'Faris', 7600000, 0, 7600000, 7600000, 0, 0, 2, 'Lunas', '2023-01-12 21:11:58', '2023-01-12 21:11:58'),
(6, 'NT23010006', 3, 'Faris', 10250000, 0, 10250000, 10250000, 0, 0, 2, 'Lunas', '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(7, 'NT23010007', 3, 'Faris', 5970000, 0, 5970000, 0, -5970000, -5970000, 2, 'Piutang', '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(8, 'NT23010008', 4, 'Faris', 8657500, 0, 8657500, 0, -8657500, -8657500, 2, 'Piutang', '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(9, 'NT23010009', 5, 'Faris', 8365000, 0, 8365000, 0, -8365000, -8365000, 2, 'Piutang', '2023-01-30 21:11:58', '2023-01-30 21:11:58'),
(10, 'NT23020001', 8, 'Faris', 186000, 0, 186000, 0, -186000, 372000, 2, 'Lunas (13/06/2023)', '2023-01-31 21:11:58', '2023-06-13 14:45:05'),
(11, 'NT23020002', 8, 'Faris', 14000, 0, 14000, 14000, 0, 0, 2, 'Lunas', '2023-02-05 21:11:58', '2023-02-05 21:11:58'),
(12, 'NT23020003', 9, 'Faris', 6600000, 0, 6600000, 1500000, -5100000, -5100000, 2, 'Piutang', '2023-02-24 21:11:58', '2023-02-24 21:11:58'),
(13, 'NT23020004', 8, 'Faris', 1750000, 0, 1750000, 1000000, -750000, 0, 2, 'Lunas (13/06/2023)', '2023-02-28 21:11:58', '2023-06-13 16:20:40'),
(14, 'NT23020005', 8, 'Faris', 1580000, 0, 1580000, 1000000, -580000, 0, 2, 'Lunas (13/06/2023)', '2023-02-28 21:11:58', '2023-06-13 16:50:04'),
(15, 'NT23020006', 9, 'Faris', 2000000, 0, 2000000, 1000000, -1000000, -1000000, 2, 'Piutang', '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(16, 'NT23020007', 9, 'Faris', 19500000, 0, 19500000, 3000000, -16500000, -16500000, 2, 'Piutang', '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(17, 'NT23020008', 5, 'Faris', 1000000, 0, 1000000, 0, -1000000, -1000000, 2, 'Piutang', '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(18, 'NT23020009', 3, 'Faris', 11250000, 0, 11250000, 11250000, 0, 0, 2, 'Lunas', '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(19, 'NT23020010', 3, 'Faris', 2670000, 0, 2670000, 0, -2670000, 0, 2, 'Lunas (13/06/2023)', '2023-02-28 21:11:58', '2023-06-13 16:33:37'),
(20, 'NT23030001', 8, 'Faris', 350000, 0, 350000, 350000, 0, 0, 2, 'Lunas', '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(21, 'NT23030002', 8, 'Faris', 25000, 0, 25000, 25000, 0, 0, 2, 'Lunas', '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(22, 'NT23030003', 8, 'Faris', 30000, 0, 30000, 30000, 0, 0, 2, 'Lunas', '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(23, 'NT23030004', 9, 'Faris', 80000, 0, 80000, 80000, 0, 0, 2, 'Lunas', '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(24, 'NT23030005', 8, 'Faris', 3000000, 0, 3000000, 1500000, -1500000, -1500000, 2, 'Piutang', '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(25, 'NT23030006', 8, 'Faris', 13440000, 0, 13440000, 10000000, -3440000, -3440000, 2, 'Piutang', '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(26, 'NT23030007', 4, 'Faris', 8812500, 0, 8812500, 8812500, 0, 0, 2, 'Lunas', '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(27, 'NT23030008', 9, 'Faris', 7352500, 0, 7352500, 7352500, 0, 0, 2, 'Lunas', '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(28, 'NT23030009', 9, 'Faris', 27526810, 0, 27526810, 27526810, 0, 0, 2, 'Lunas', '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(29, 'NT23030010', 3, 'Faris', 4255000, 0, 4255000, 0, -4255000, -4255000, 2, 'Piutang', '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(30, 'NT23040001', 8, 'Faris', 1250000, 0, 1250000, 0, -1250000, 0, 2, 'Lunas (02/06/2023)', '2023-03-31 21:11:58', '2023-06-02 14:37:28'),
(31, 'NT23040002', 8, 'Faris', 4000, 0, 4000, 4000, 0, 0, 2, 'Lunas', '2023-04-26 21:11:58', '2023-04-26 21:11:58'),
(32, 'NT23040003', 8, 'Faris', 300000, 0, 300000, 300000, 0, 0, 2, 'Lunas', '2023-04-26 21:11:58', '2023-04-26 21:11:58'),
(33, 'NT23040004', 9, 'Faris', 325000, 10000, 315000, 0, -315000, 0, 2, 'Lunas (13/06/2023)', '2023-04-27 21:11:58', '2023-06-13 14:37:10'),
(34, 'NT23040005', 9, 'Faris', 13000, 0, 13000, 13000, 0, 0, 2, 'Lunas', '2023-04-28 21:11:58', '2023-04-28 21:11:58'),
(35, 'NT23040006', 9, 'Faris', 5417000, 2500, 5414500, 2000000, -3415000, -3415000, 2, 'Piutang', '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(36, 'NT23040007', 9, 'Faris', 35000, 0, 35000, 35000, 0, 0, 2, 'Lunas', '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(37, 'NT23040008', 9, 'Faris', 5005000, 5000, 5000000, 1500000, -3500000, -3500000, 2, 'Piutang', '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(38, 'NT23040009', 9, 'Faris', 300000, 0, 300000, 0, -300000, -300000, 2, 'Piutang', '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(39, 'NT23040009', 4, 'Faris', 7290000, 0, 7290000, 0, -7290000, -7290000, 2, 'Piutang', '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(40, 'NT23050001', 8, 'Faris', 840000, 0, 840000, 0, -840000, -840000, 2, 'Piutang', '2023-05-17 21:11:58', '2023-05-17 21:11:58'),
(41, 'NT23050002', 6, 'Faris', 129700000, 0, 129700000, 129700000, 0, 0, 2, 'Lunas', '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(42, 'NT23050003', 6, 'Faris', 12550000, 0, 12550000, 0, -12550000, -12550000, 2, 'Piutang', '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(43, 'NT23050004', 7, 'Faris', 11025000, 250000, 11000000, 4000000, -7000000, -7000000, 2, 'Piutang', '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(44, 'NT23050005', 3, 'Faris', 7187500, 0, 7187500, 0, -7187500, 0, 2, 'Lunas (13/06/2023)', '2023-05-29 21:11:58', '2023-06-13 13:13:00'),
(45, 'NT23050006', 3, 'Faris', 3312500, 0, 3312500, 0, -3312500, -3312500, 2, 'Piutang', '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(46, 'NT23060001', 5, 'faris', 30000, 2000, 28000, 28000, 2000, 0, 2, 'Lunas', '2023-06-02 14:36:21', '2023-06-02 14:36:21'),
(47, 'NT23060002', 10, 'iqbal', 90000, 10000, 80000, 80000, 10000, 0, 2, 'Lunas', '2023-06-02 15:14:24', '2023-06-02 15:14:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id_penjualan_detail` int(10) UNSIGNED NOT NULL,
  `no_nota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran_p` double DEFAULT NULL,
  `ukuran_l` double DEFAULT NULL,
  `is_plong` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `finishing_plong_qty` int(11) DEFAULT NULL,
  `finishing_plong_harga` int(11) DEFAULT NULL,
  `det_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id_penjualan_detail`, `no_nota`, `id_produk`, `nama_pesanan`, `jumlah`, `satuan`, `ukuran`, `ukuran_p`, `ukuran_l`, `is_plong`, `finishing_plong_qty`, `finishing_plong_harga`, `det_pesanan`, `harga`, `sub_total`, `created_at`, `updated_at`) VALUES
(1, 'NT23050001', 2, 'Label Makanan', 100, 'lbr', 'A3+', NULL, NULL, NULL, NULL, NULL, NULL, 5000, 500000, '2023-05-21 21:11:58', '2023-05-21 21:11:58'),
(2, 'NT23050002', 2, 'Print Polaroid', 1, 'lbr', 'A3+', NULL, NULL, NULL, NULL, NULL, NULL, 5000, 5000, '2023-05-21 21:12:57', '2023-05-21 21:12:57'),
(3, 'NT23050003', 1, 'banner pilkades', 150, 'lbr', '1m x 3m', 1, 3, NULL, NULL, NULL, NULL, 17500, 7875000, '2023-05-21 21:14:21', '2023-05-21 21:14:21'),
(4, 'NT23050004', 1, 'banner sadboy resik', 1, 'lbr', '1m x 3m', 1, 3, 'yes', 4, 1000, NULL, 17500, 56500, '2023-05-22 15:36:27', '2023-05-22 15:36:27'),
(5, 'NT23050005', 2, 'Print Polaroid', 100, 'lbr', 'A3+', NULL, NULL, NULL, NULL, NULL, NULL, 700, 70000, '2023-05-22 16:39:25', '2023-05-22 16:39:25'),
(6, 'NT23050006', 2, 'Label Makanan', 11, 'lbr', 'A3+', NULL, NULL, NULL, NULL, NULL, NULL, 5000, 55000, '2023-05-22 16:44:29', '2023-05-22 16:44:29'),
(7, 'NT23050007', 1, 'banner', 3, 'lbr', '2m x 3m', 2, 3, 'yes', 4, 1000, 'plong pojok', 17500, 327000, '2023-05-26 18:55:16', '2023-05-26 18:55:16'),
(8, 'NT23050008', 1, 'banner toko', 1, 'lbr', '3m x 1m', 3, 1, NULL, NULL, NULL, 'plong pojok', 17500, 52500, '2023-05-31 02:27:30', '2023-05-31 02:27:30'),
(9, 'NT23050009', 1, 'banner', 11, 'lbr', '2m x 1m', 2, 1, 'yes', 4, 1000, 'plong pojok', 17500, 429000, '2023-05-31 16:32:33', '2023-05-31 16:32:33'),
(10, 'NT23050009', 1, 'banner', 1, 'lbr', '1m x 3m', 1, 3, NULL, NULL, NULL, 'lipat kolong', 17500, 52500, '2023-05-31 16:32:33', '2023-05-31 16:32:33'),
(11, 'NT23050009', 2, 'Print Polaroid', 1, 'lbr', 'A3+', NULL, NULL, NULL, NULL, NULL, '-', 5000, 5000, '2023-05-31 16:32:33', '2023-05-31 16:32:33'),
(12, 'NT23050009', 2, 'banner', 11, 'lbr', 'A3+', NULL, NULL, NULL, NULL, NULL, 'plong pojok', 5000, 55000, '2023-05-31 16:32:33', '2023-05-31 16:32:33'),
(13, 'NT23050009', 1, 'banner', 1, 'lbr', '2m x 3m', 2, 3, 'yes', 4, 1000, 'plong pojok', 17500, 109000, '2023-05-31 16:32:33', '2023-05-31 16:32:33'),
(14, 'NT23050010', 1, 'banner', 1, 'lbr', '6m x 6m', 6, 6, 'yes', 6, 1000, 'plong pojok', 17500, 636000, '2023-05-31 16:38:34', '2023-05-31 16:38:34'),
(15, 'NT23010001', 2, 'Kartu Merah Tinta Hitam (BMG)', 3000, 'lbr', 'F4', 0, 0, '', 0, 0, '', 175, 525000, '2023-01-02 21:11:58', '2023-01-02 21:11:58'),
(16, 'NT23010001', 2, 'Kartu Kuning Tinta Hitam (BMG)', 2000, 'lbr', 'F4', 0, 0, '', 0, 0, '', 175, 350000, '2023-01-02 21:11:58', '2023-01-02 21:11:58'),
(17, 'NT23010001', 2, 'Kartu Putih Tinta Hijau (BM Prob)', 2000, 'lbr', 'F4', 0, 0, '', 0, 0, '', 175, 350000, '2023-01-02 21:11:58', '2023-01-02 21:11:58'),
(18, 'NT23010001', 2, 'Kartu Kuning Tinta Merah (BM Prob)', 2000, 'lbr', 'F4', 0, 0, '', 0, 0, '', 175, 350000, '2023-01-02 21:11:58', '2023-01-02 21:11:58'),
(19, 'NT23010001', 2, 'Kartu Putih Tinta Hitam (BMG)', 2000, 'lbr', 'F4', 0, 0, '', 0, 0, '', 175, 350000, '2023-01-02 21:11:58', '2023-01-02 21:11:58'),
(20, 'NT23010002', 4, 'Bungkus ABATE', 10000, 'lbr', 'small', 0, 0, '', 0, 0, '', 55, 5500000, '2023-01-08 21:11:58', '2023-01-08 21:11:58'),
(21, 'NT23010003', 4, 'Kalender Dinding', 85, 'lbr', 'A3+', 0, 0, '', 0, 0, '', 16000, 1360000, '2023-01-08 21:11:58', '2023-01-08 21:11:58'),
(22, 'NT23010004', 2, 'Kartu Amnensi', 1000, 'lbr', 'F4', 0, 0, '', 0, 0, '', 350, 350000, '2023-01-09 21:11:58', '2023-01-09 21:11:58'),
(23, 'NT23010004', 4, 'Amplop USG 2D', 1000, 'lbr', 'a5', 0, 0, '', 0, 0, '', 850, 850000, '2023-01-09 21:11:58', '2023-01-09 21:11:58'),
(24, 'NT23010004', 5, 'Surat Rujukan', 20, 'bk', 'F4', 0, 0, '', 0, 0, '', 6500, 130000, '2023-01-09 21:11:58', '2023-01-09 21:11:58'),
(25, 'NT23010005', 4, 'Kalender 2023', 800, 'exp', 'A3+', 0, 0, '', 0, 0, '', 800, 7250, '2023-01-12 21:11:58', '2023-01-12 21:11:58'),
(26, 'NT23010005', 4, 'Brosur', 3, 'rim', 'A4', 0, 0, '', 0, 0, 'Cetak Bolak Balik', 600000, 180000, '2023-01-12 21:11:58', '2023-01-12 21:11:58'),
(27, 'NT23010006', 4, 'Map Rekam Medis', 1000, 'lbr', 'F4', 0, 0, '', 0, 0, '', 4500, 4500000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(28, 'NT23010006', 5, 'Set Ranap Dewasa', 40, 'bdl', 'F4', 0, 0, '', 0, 0, '', 80000, 3200000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(29, 'NT23010006', 5, 'Set Ranap Anak', 10, 'bdl', 'F4', 0, 0, '', 0, 0, '', 80000, 800000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(30, 'NT23010006', 5, 'Resume Rajal Umum', 20, 'bdl', 'F4', 0, 0, '', 0, 0, 'Rangkap 2', 35000, 700000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(31, 'NT23010006', 5, 'Resume Rajal JKN', 20, 'bdl', 'F4', 0, 0, '', 0, 0, 'Rangkap 3', 52500, 1050000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(32, 'NT23010007', 5, 'Blanko RM', 20, 'rim', 'F4', 0, 0, '', 0, 0, '', 90000, 1800000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(33, 'NT23010007', 1, 'X Banner', 1, 'lbr', '1.6m x 0.6m', 1.6, 0.6, 'yes', 3, 1000, '+Tripod', 75000, 75000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(34, 'NT23010007', 1, 'X Banner', 1, 'lbr', '1.6m x 0.6m', 1.6, 0.6, 'yes', 3, 1000, 'No Tripod', 45000, 45000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(35, 'NT23010007', 5, 'Blanko Rajal', 27, 'rim', 'F4', 0, 0, '', 0, 0, 'Bolak Balik', 150000, 4050000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(36, 'NT23010008', 6, 'Les Hijau Lengkap', 1000, 'exp', 'F4', 0, 0, '', 0, 0, '', 6500, 6500000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(37, 'NT23010008', 2, 'Map Coklat', 500, 'exp', 'F4', 0, 0, '', 0, 0, '', 2500, 1250000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(38, 'NT23010008', 4, 'Amplop / Map EKG', 500, 'exp', 'F4', 0, 0, '', 0, 0, '', 500, 250000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(39, 'NT23010008', 4, 'Map CT-Scan', 50, 'lbr', 'A3', 0, 0, '', 0, 0, '', 5500, 275000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(40, 'NT23010008', 5, 'Resep Obat', 51, 'bdl', 'F4', 0, 0, '', 0, 0, '', 7500, 382500, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(41, 'NT23010009', 6, 'Billboard', 57, 'pcs', 'custom', 0, 0, '', 0, 0, '', 35000, 1995000, '2023-01-30 21:11:58', '2023-01-30 21:11:58'),
(42, 'NT23020001', 4, 'Print', 31, 'lbr', 'A3+', 0, 0, '', 0, 0, 'Bolak Balik', 6000, 186000, '2023-01-31 21:11:58', '2023-01-31 21:11:58'),
(43, 'NT23020002', 4, 'Print A3', 4, 'lbr', 'A3+', 0, 0, '', 0, 0, '', 3500, 14000, '2023-02-05 21:11:58', '2023-02-05 21:11:58'),
(44, 'NT23020003', 6, 'Majalah PGRI Februari', 1320, 'exp', 'custom', 0, 0, '', 0, 0, '', 5000, 66000, '2023-02-24 21:11:58', '2023-02-24 21:11:58'),
(45, 'NT23020004', 4, 'Undangan', 350, 'lbr', 'Custom', 0, 0, '', 0, 0, '', 5000, 1750, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(46, 'NT23020005', 3, 'Label Faros 1L', 3000, 'lbr', 'custom', 0, 0, '', 0, 0, '', 260, 780000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(47, 'NT23020005', 3, 'Label K99 500ml', 4000, 'lbr', 'custom', 0, 0, '', 0, 0, '', 200, 800000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(48, 'NT23020006', 4, 'Kalender', 500, 'exp', 'a3', 0, 0, '', 0, 0, '', 4000, 2000000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(49, 'NT23020007', 6, 'By. Cetak Letter Tiris', 1, 'set', 'custom', 0, 0, '', 0, 0, '', 7000000, 7000000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(50, 'NT23020007', 6, 'Neon Box Kec Tempeh', 1, 'set', 'custom', 0, 0, '', 0, 0, '', 7000000, 7000000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(51, 'NT23020007', 6, 'Running Text Kec. Tempeh', 1, 'set', 'custom', 0, 0, '', 0, 0, '', 5500000, 5500000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(52, 'NT23020008', 4, 'Brosur', 1000, 'lbr', 'f4', 0, 0, '', 0, 0, '', 1000, 1000000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(53, 'NT23020009', 4, 'Map Rekam Medis', 1000, 'set', 'custom', 0, 0, '', 0, 0, '', 4000, 4000000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(54, 'NT23020009', 6, 'Amplop Radiologi', 1000, 'set', 'custom', 0, 0, '', 0, 0, '', 2000, 2000000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(55, 'NT23020009', 5, 'Blanko Resume RJ Umum', 50, 'bdl', 'f4', 0, 0, '', 0, 0, '', 35000, 1750000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(56, 'NT23020009', 5, 'Blanko Resume RJ JKN', 50, 'bdl', 'f4', 0, 0, '', 0, 0, '', 35000, 1750000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(57, 'NT23020009', 5, 'Blanko Resume Inap Umum', 50, 'bdl', 'f4', 0, 0, '', 0, 0, '', 35000, 1750000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(58, 'NT23020010', 5, 'Blanko Resume Inap JKN', 50, 'bdl', 'f4', 0, 0, '', 0, 0, '', 35000, 1750000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(59, 'NT23020010', 6, 'Papan Ucapan Duka Cita B. Syarajat', 1, 'pcs', 'custom', 0, 0, '', 0, 0, '', 200000, 200000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(60, 'NT23020010', 5, 'Identitas Pasien', 40, 'bk', 'f4', 0, 0, '', 0, 0, '', 18000, 720000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(61, 'NT23030001', 2, 'Kartu Kuning Tinta Hitam (BMG)', 2000, 'lbr', 'f4', 0, 0, '', 0, 0, '', 175, 350000, '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(62, 'NT23030002', 4, 'Print A3', 5, 'lbr', 'a3+', 0, 0, '', 0, 0, '', 5000, 25000, '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(63, 'NT23030003', 6, 'Print Stiker', 3, 'lbr', 'a3+', 0, 0, '', 0, 0, '', 10000, 30000, '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(64, 'NT23030004', 2, 'Print Kartu Nama', 8, 'lbr', 'a3+', 0, 0, '', 0, 0, '', 10000, 80000, '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(65, 'NT23030005', 4, 'Tiket Masuk', 300, 'bdl', 'custom', 0, 0, '', 0, 0, '', 10000, 3000000, '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(66, 'NT23030006', 6, 'Ongkos Cetak Blanko', 64000, 'lbr', 'custom', 0, 0, '', 0, 0, '', 210, 13440000, '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(67, 'NT23030007', 6, 'Map Hijau Lengkap', 1000, 'exp', 'custom', 0, 0, '', 0, 0, '', 6500, 6500000, '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(68, 'NT23030007', 2, 'Map Coklat', 500, 'exp', 'custom', 0, 0, '', 0, 0, '', 2500, 1250000, '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(69, 'NT23030007', 5, 'Resep Putih', 50, 'bdl', 'f4', 0, 0, '', 0, 0, '', 7500, 375000, '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(70, 'NT23030007', 5, 'Resep Kuning', 65, 'bdl', 'f4', 0, 0, '', 0, 0, '', 7500, 487500, '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(71, 'NT23030007', 5, 'Lembar Rujukan', 20, 'bdl', 'f4', 0, 0, '', 0, 0, '', 10000, 200000, '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(72, 'NT23030008', 2, 'Piagam Penghargaan', 865, 'lbr', 'a4', 0, 0, '', 0, 0, '', 8500, 7352500, '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(73, 'NT23030009', 6, 'Pengadaan ATK', 1, 'set', 'custom', 0, 0, '', 0, 0, '', 27526810, 27526810, '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(74, 'NT23030010', 5, 'Identitas Bayi', 1, 'rim', 'f4', 0, 0, '', 0, 0, '', 90000, 90000, '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(75, 'NT23030010', 5, 'Observasi Tranfusi Darah', 1, 'rim', 'f4', 0, 0, '', 0, 0, '', 90000, 90000, '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(76, 'NT23030010', 2, 'Map Rekam Medis', 1000, 'rim', 'f4', 0, 0, '', 0, 0, '', 4000, 4000000, '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(77, 'NT23030010', 6, 'X-Banner', 1, 'rim', 'custom', 0, 0, '', 0, 0, '', 75000, 75000, '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(78, 'NT23040001', 6, 'Ongkos Kalender', 500, 'exp', '-', 0, 0, '', 0, 0, '', 2500, 1250000, '2023-04-30 21:11:58', '2023-04-30 21:11:58'),
(79, 'NT23040002', 4, 'Print A3', 1, 'lbr', '-', 0, 0, '', 0, 0, '', 4000, 4000, '2023-04-26 21:11:58', '2023-04-26 21:11:58'),
(80, 'NT23040003', 5, 'Laporan Harian Grade (R3)', 20, 'bk', '-', 0, 0, '', 0, 0, '', 15000, 300000, '2023-04-26 21:11:58', '2023-04-26 21:11:58'),
(81, 'NT23040004', 5, 'Keterangan Sehat', 50, 'bk', '-', 0, 0, '', 0, 0, '', 6500, 325000, '2023-04-27 21:11:58', '2023-04-27 21:11:58'),
(82, 'NT23040005', 6, 'Print Stiker', 2, 'lbt', '-', 0, 0, '', 0, 0, '', 6500, 13000, '2023-04-27 21:11:58', '2023-04-27 21:11:58'),
(83, 'NT23040006', 5, 'Buku Gerbang Mas / Juknis', 985, 'bk', 'f4', 0, 0, '', 0, 0, '', 5500, 5417500, '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(84, 'NT23040007', 5, 'Print A3', 7, 'lbr', 'a3', 0, 0, '', 0, 0, '', 5000, 35000, '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(85, 'NT23040008', 5, 'Tabloid Doreng APRIL', 910, 'exp', 'custom', 0, 0, '', 0, 0, '', 5500, 5005000, '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(86, 'NT23040009', 6, 'Nota PAL Motor', 0, 'rim', 'custom', 0, 0, '', 0, 0, '', 300000, 75000, '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(87, 'NT23040009', 6, 'Nota Sales', 0, 'rim', 'custom', 0, 0, '', 0, 0, '', 300000, 75000, '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(88, 'NT23040009', 6, 'Nota PARP', 1, 'rim', 'custom', 0, 0, '', 0, 0, '', 300000, 150000, '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(89, 'NT23040010', 6, 'Status Rawat Inap Lengkap (Map Hijau)', 840, 'exp', 'custom', 0, 0, '', 0, 0, '', 6500, 5460000, '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(90, 'NT23040010', 6, 'Status Rawat Inap Kosong (Map Coklat)', 250, 'exp', 'custom', 0, 0, '', 0, 0, '', 2500, 625000, '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(91, 'NT23040010', 6, 'Amplop CT Scan', 90, 'lbr', 'custom', 0, 0, '', 0, 0, '', 6500, 585000, '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(92, 'NT23040010', 6, 'Amplop EKG', 500, 'lbr', 'custom', 0, 0, '', 0, 0, '', 600, 300000, '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(93, 'NT23040010', 5, 'Form Permintaan Laboratorium', 20, 'bk', 'custom', 0, 0, '', 0, 0, '', 16000, 320000, '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(94, 'NT23050001', 6, 'Piagam Penghargaan', 20, 'pcs', 'custom', 0, 0, '', 0, 0, '', 42000, 840000, '2023-05-17 21:11:58', '2023-05-17 21:11:58'),
(95, 'NT23050002', 5, 'Buku Lansia', 1950, 'bk', 'custom', 0, 0, '', 0, 0, '', 4250, 8287500, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(96, 'NT23050002', 5, 'Kuesioner', 1000, 'bk', 'custom', 0, 0, '', 0, 0, '', 4750, 4750000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(97, 'NT23050002', 5, 'Buku SD Informasi Raport', 2425, 'bk', 'custom', 0, 0, '', 0, 0, '', 5000, 12125000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(98, 'NT23050002', 5, 'Buku SMP Info Raport', 2425, 'bk', 'custom', 0, 0, '', 0, 0, '', 5500, 13337500, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(99, 'NT23050002', 5, 'Anak Terhebat', 28500, 'bk', 'custom', 0, 0, '', 0, 0, '', 3200, 91200000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(100, 'NT23050003', 4, 'Poster', 1000, 'lbr', 'custom', 0, 0, '', 0, 0, '', 4500, 4500000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(101, 'NT23050003', 4, 'Leaflet', 1500, 'lbr', 'custom', 0, 0, '', 0, 0, '', 1500, 2250000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(102, 'NT23050003', 5, 'PostLembar Baliker', 25, 'bk', 'f4', 0, 0, '', 0, 0, '', 160000, 4000000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(103, 'NT23050003', 5, 'Buku Member Bakor', 200, 'bk', 'custom', 0, 0, '', 0, 0, '', 9000, 1800000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(104, 'NT23050004', 4, 'BTS 2023', 147, 'bk', 'custom', 0, 0, '', 0, 0, '', 75000, 11025000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(105, 'NT2305005', 5, 'Amplop Radiologi', 500, 'lbr', 'custom', 0, 0, '', 0, 0, '', 2000, 1000000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(106, 'NT2305005', 6, 'Map Rekam Medis', 1000, 'lbr', 'custom', 0, 0, '', 0, 0, '', 4000, 4000000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(107, 'NT2305005', 5, 'Resume Rajal Umum ', 15, 'bk', 'f4', 0, 0, '', 0, 0, 'Rangkap 2', 35000, 525000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(108, 'NT2305005', 5, 'Resume Rajal JKN', 15, 'bk', 'f4', 0, 0, '', 0, 0, 'Rangkap 3', 35000, 787000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(109, 'NT2305005', 5, 'Resume Ranap Umum', 25, 'bk', 'f4', 0, 0, '', 0, 0, 'Rangkap 2', 35000, 875000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(110, 'NT2305006', 5, 'Resume Ranap JKN', 25, 'bk', 'f4', 0, 0, '', 0, 0, 'Rangkap 3', 52500, 1312500, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(111, 'NT2305006', 6, 'Amplop Dinas Kabinet', 50, 'pack', 'custom', 0, 0, '', 0, 0, '', 40000, 2000000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(112, 'NT23060001', 1, 'banner', 1, 'lbr', '2m x 1m', 2, 1, 'yes', 4, 1000, 'plong pojok', 13000, 30000, '2023-06-02 14:36:21', '2023-06-02 14:36:21'),
(113, 'NT23060002', 5, 'nota', 1, 'rim', '1/4 folio', NULL, NULL, NULL, NULL, NULL, '1 muka bendel', 90000, 90000, '2023-06-02 15:14:24', '2023-06-02 15:14:24');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `nama_perusahaan`, `alamat`, `telepon`, `logo_aplikasi`, `logo_login`, `bg_login`, `logo_nota`, `created_at`, `updated_at`) VALUES
(1, 'Sentral Percetakan', 'Jl. Jendral Panjaitan 72 - Lumajang', '085284070404', '/assets/img/brand-icon.png', '/assets/img/logo.png', '/assets/img/bg_login.jpg', '/assets/img/nota-logo.png', NULL, '2023-03-27 11:44:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bkk`
--

CREATE TABLE `tb_bkk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pembelian` int(11) DEFAULT NULL,
  `id_akun` int(11) NOT NULL,
  `uraian` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_bkk`
--

INSERT INTO `tb_bkk` (`id`, `id_pembelian`, `id_akun`, `uraian`, `sub_total`, `created_at`, `updated_at`) VALUES
(1, 11, 151, 'Best One Pro Magenta', 312840, '2023-05-22 06:21:02', '2023-05-22 06:23:00'),
(2, 11, 151, 'Best One Pro Yellow', 295350, '2023-05-22 06:22:22', '2023-05-22 06:23:00'),
(4, 12, 151, 'New Cahaya Pro Magenta', 157300, '2023-05-22 07:35:05', '2023-05-22 07:35:05'),
(5, 13, 153, 'Plastisol', 20000, '2023-05-22 08:49:28', '2023-05-22 08:49:28'),
(6, 15, 709, 'Plate Tabloid WIGA', 207000, '2023-05-22 09:18:36', '2023-05-22 09:18:36'),
(7, 16, 100, 'New Cahaya Pro Magenta', 20000, '2023-05-22 09:27:55', '2023-05-22 09:27:55'),
(16, 17, 104, 'New Cahaya Pro Magenta', 40000, '2023-05-22 21:00:11', '2023-05-22 21:00:11'),
(17, 1, 709, 'Plate Merdeka NEWS', 468000, '2023-05-22 21:02:39', '2023-05-22 21:02:39'),
(18, 1, 709, 'Plate Kalender Kelompok Senam', 576000, '2023-05-22 21:02:39', '2023-05-22 21:02:39'),
(19, 24, 151, 'hvs 80g', 17500, '2023-05-26 19:43:18', '2023-05-26 19:43:18'),
(20, 14, 151, 'hvs 80g', 65000, '2023-05-26 22:57:31', '2023-05-26 22:57:31'),
(21, 3, 151, 'PVC Silver 200g', 20000, '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(22, 3, 151, 'PVC Red 200g', 22500, '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(23, 5, 151, 'AP 150g (79x109)', 1183000, '2023-01-07 15:17:16', '2023-01-07 15:17:16'),
(24, 5, 151, 'AP 120g (65x100)', 2574000, '2023-01-07 15:17:16', '2023-01-07 15:17:16'),
(25, 5, 151, 'AP 150g (65x100)', 1610000, '2023-01-07 15:17:16', '2023-01-07 15:17:16'),
(26, 7, 151, 'Plastik Uk 12,5x24', 33750, '2023-01-08 15:17:16', '2023-01-08 15:17:16'),
(27, 8, 151, 'HVS AL F4 70g', 1620000, '2023-01-08 15:17:16', '2023-01-08 15:17:16'),
(28, 9, 151, 'Id Card PVC V-Tech', 275000, '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(29, 9, 152, 'Acco Joyco Putih (Snel)', 375000, '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(30, 9, 151, 'Amplop PPL KAB 90 PPS', 87500, '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(31, 9, 151, 'Amplop Samson B', 90000, '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(32, 9, 151, 'Amplop Samson E', 205000, '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(33, 10, 151, 'Glory 210g', 47000, '2023-01-17 15:17:16', '2023-01-17 15:17:16'),
(34, 12, 151, 'Duplex 250g (79x109)', 342225, '2023-01-28 15:17:16', '2023-01-28 15:17:16'),
(35, 14, 151, 'Stiker HVS', 93600, '2023-01-29 15:17:16', '2023-01-29 15:17:16'),
(36, 3, 151, 'PVC Silver 200g', 20000, '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(37, 3, 151, 'PVC Red 200g', 22500, '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(38, 5, 151, 'AP 150g (79x109)', 1183000, '2023-01-07 15:17:16', '2023-01-07 15:17:16'),
(39, 5, 151, 'AP 120g (65x100)', 2574000, '2023-01-07 15:17:16', '2023-01-07 15:17:16'),
(40, 5, 151, 'AP 150g (65x100)', 1610000, '2023-01-07 15:17:16', '2023-01-07 15:17:16'),
(41, 7, 151, 'Plastik Uk 12,5x24', 33750, '2023-01-08 15:17:16', '2023-01-08 15:17:16'),
(42, 8, 151, 'HVS AL F4 70g', 1620000, '2023-01-08 15:17:16', '2023-01-08 15:17:16'),
(43, 9, 151, 'Id Card PVC V-Tech', 275000, '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(44, 9, 152, 'Acco Joyco Putih (Snel)', 375000, '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(45, 9, 151, 'Amplop PPL KAB 90 PPS', 87500, '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(46, 9, 151, 'Amplop Samson B', 90000, '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(47, 9, 151, 'Amplop Samson E', 205000, '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(48, 10, 151, 'Glory 210g', 47000, '2023-01-17 15:17:16', '2023-01-17 15:17:16'),
(49, 12, 151, 'Duplex 250g (79x109)', 342225, '2023-01-28 15:17:16', '2023-01-28 15:17:16'),
(50, 14, 151, 'Stiker HVS', 93600, '2023-01-29 15:17:16', '2023-01-29 15:17:16'),
(51, 16, 152, 'Lakban Hitam Besar', 44000, '2023-02-01 15:17:16', '2023-02-01 15:17:16'),
(52, 17, 151, 'HVS MAXI A4 70g', 167500, '2023-02-04 15:17:16', '2023-02-04 15:17:16'),
(53, 18, 152, 'Lakban Bening Besar', 33000, '2023-02-06 15:17:16', '2023-02-06 15:17:16'),
(54, 18, 152, 'Lakban Coklat Besar', 11000, '2023-02-06 15:17:16', '2023-02-06 15:17:16'),
(55, 19, 151, 'BC Putih Rambow', 33000, '2023-02-07 15:17:16', '2023-02-07 15:17:16'),
(56, 21, 151, 'Stiker HVS', 65000, '2023-02-11 15:17:16', '2023-02-11 15:17:16'),
(57, 22, 152, 'Lakban Bening Besar', 22000, '2023-02-11 15:17:16', '2023-02-11 15:17:16'),
(58, 25, 151, 'Pro Top White', 311500, '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(59, 25, 151, 'Pro Bottom Yellow', 166000, '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(60, 25, 151, 'Pro Bottom Pink', 124500, '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(61, 25, 151, 'NCR Top White', 148500, '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(62, 25, 151, 'NCR Bottom Pink', 91000, '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(63, 25, 151, 'NCR Bottom Yellow', 45500, '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(64, 26, 151, 'Pro Bottom White', 182000, '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(65, 26, 151, 'Pro Bottom Blue', 45500, '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(66, 28, 153, 'Bensin Produksi', 80000, '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(67, 29, 151, 'Pro Top White', 489500, '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(68, 29, 151, 'Pro Middle Yellow', 470000, '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(69, 29, 151, 'Pro Middle Pink', 47000, '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(70, 29, 151, 'Pro Bottom Pink', 207500, '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(71, 29, 151, 'Pro Bottom Yellow', 249000, '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(72, 29, 151, 'HVS MAXI F4 70g', 562500, '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(73, 32, 151, 'HVS 70g F4', 165000, '2023-02-27 15:17:16', '2023-02-27 15:17:16'),
(74, 34, 152, 'Isi Etona 23/8', 144500, '2023-02-28 15:17:16', '2023-02-28 15:17:16'),
(75, 36, 152, 'isolasi Kecil', 8000, '2023-03-09 15:17:16', '2023-03-09 15:17:16'),
(76, 38, 151, 'HVS Warna Kuning 58', 41000, '2023-03-10 15:17:16', '2023-03-10 15:17:16'),
(77, 38, 151, 'HVS Warna Hijau 58', 123000, '2023-03-10 15:17:16', '2023-03-10 15:17:16'),
(78, 38, 151, 'Acco Joyco Putih (Snel)', 150000, '2023-03-10 15:17:16', '2023-03-10 15:17:16'),
(79, 39, 152, 'Acco Joyco Putih (Snel)', 150000, '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(80, 40, 151, 'HVS Warna Hijau 58', 123000, '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(81, 40, 151, 'Mika Bening', 43000, '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(82, 40, 152, 'Double Tape 1/4 (kecil)', 45000, '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(83, 41, 153, 'Minyak Tanah', 150000, '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(84, 42, 153, 'Bensin Produksi', 80000, '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(85, 43, 151, 'Pro Top White', 89000, '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(86, 43, 151, 'Pro Middle White', 94000, '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(87, 43, 151, 'Pro Bottom White', 8300, '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(88, 43, 151, 'Concurt Krem', 378000, '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(89, 44, 151, 'Glory 210g', 47000, '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(90, 44, 151, 'Stiker Bontax Camel', 72500, '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(91, 44, 151, 'Stiker HVS', 104000, '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(92, 46, 151, 'HVS MAXI F4 70g', 36500, '2023-03-28 15:17:16', '2023-03-28 15:17:16'),
(93, 47, 151, 'Stiker Bontax Camel', 58000, '2023-03-28 15:17:16', '2023-03-28 15:17:16'),
(94, 50, 153, 'Minyak Tanah', 150000, '2023-03-31 15:17:16', '2023-03-31 15:17:16'),
(95, 54, 151, 'HVS Warna Kuning 58', 287000, '2023-04-06 15:17:16', '2023-04-06 15:17:16'),
(96, 54, 151, 'HVS Warna Merah 58', 123000, '2023-04-06 15:17:16', '2023-04-06 15:17:16'),
(97, 55, 151, 'BC Putih Rambow', 160000, '2023-04-15 15:17:16', '2023-04-15 15:17:16'),
(98, 57, 153, 'Bensin Produksi', 76500, '2023-04-16 15:17:16', '2023-04-16 15:17:16'),
(99, 58, 151, 'Stiker HVS', 156000, '2023-04-16 15:17:16', '2023-04-16 15:17:16'),
(100, 59, 153, 'Bensin Produksi', 76500, '2023-04-30 15:17:16', '2023-04-30 15:17:16'),
(101, 60, 151, 'Top White Pro', 88000, '2023-04-30 15:17:16', '2023-04-30 15:17:16'),
(102, 61, 151, 'Triplex Board 210g', 32500, '2023-05-02 15:17:16', '2023-05-02 15:17:16'),
(103, 65, 152, 'Isi Staples Etona 23/6', 60000, '2023-05-15 15:17:16', '2023-05-15 15:17:16'),
(104, 67, 153, 'Bensin Produksi', 76500, '2023-05-16 15:17:16', '2023-05-16 15:17:16'),
(105, 69, 152, 'Dobel Tape Pajero 12mm (Sedang)', 13800, '2023-05-16 15:17:16', '2023-05-16 15:17:16'),
(106, 70, 153, 'Minyak Tanah', 150000, '2023-05-18 15:17:16', '2023-05-18 15:17:16'),
(107, 72, 151, 'hvs 80g', 85000, '2023-06-02 15:20:00', '2023-06-02 15:20:00'),
(108, 72, 100, 'New Cahaya Pro Magenta', 127000, '2023-06-02 15:20:00', '2023-06-02 15:20:00'),
(109, 51, 153, 'Plate Cleaner', 40000, '2023-06-13 14:47:19', '2023-06-13 14:47:19'),
(110, 51, 153, 'M-Fountain', 165000, '2023-06-13 14:47:19', '2023-06-13 14:47:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bkm`
--

CREATE TABLE `tb_bkm` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_penjualan` int(11) DEFAULT NULL,
  `id_akun` int(11) DEFAULT NULL,
  `uraian` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debet` int(11) NOT NULL,
  `opsi_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_bkm`
--

INSERT INTO `tb_bkm` (`id`, `id_penjualan`, `id_akun`, `uraian`, `debet`, `opsi_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 1, 250, 'Firdan', 1925000, 'tunai', '2023-01-02 21:11:58', '2023-01-02 21:11:58'),
(2, 2, 401, 'Mahendra', 1500000, 'tunai', '2023-01-08 21:11:58', '2023-01-08 21:11:58'),
(3, 3, 250, 'SMK Muhammadiyah', 1720000, 'tunai', '2023-01-08 21:11:58', '2023-01-08 21:11:58'),
(4, 4, 250, 'Klinik Edifuz', 1330000, 'tunai', '2023-01-09 21:11:58', '2023-01-09 21:11:58'),
(5, 5, 250, 'SMK Muhammadiyah', 7600000, 'tunai', '2023-01-12 21:11:58', '2023-01-12 21:11:58'),
(6, 6, 250, 'RSUD Pasirian', 10250000, 'tunai', '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(7, 11, 250, 'Firdan', 14000, 'tunai', '2023-02-05 21:11:58', '2023-02-05 21:11:58'),
(8, 12, 401, 'Mahendra', 1500000, 'tunai', '2023-02-24 21:11:58', '2023-02-24 21:11:58'),
(9, 13, 401, 'Firdan', 1000000, 'tunai', '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(10, 14, 401, 'Firdan', 1000000, 'tunai', '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(11, 15, 401, 'Mahendra', 1000000, 'tunai', '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(12, 16, 401, 'Mahendra', 3000000, 'tunai', '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(13, 18, 250, 'RSUD Pasirian', 11250000, 'tunai', '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(14, 20, 250, 'Firdan', 350000, 'tunai', '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(15, 21, 250, 'Firdan', 25000, 'tunai', '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(16, 22, 250, 'Firdan', 30000, 'tunai', '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(17, 23, 250, 'Mahendra', 80000, 'tunai', '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(18, 24, 401, 'Firdan', 1500000, 'tunai', '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(19, 25, 401, 'Firdan', 10000000, 'tunai', '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(20, 26, 250, 'RS. Bhayangkara', 8812500, 'tunai', '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(21, 27, 250, 'Mahendra', 7352500, 'tunai', '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(22, 28, 250, 'Mahendra', 27526810, 'tunai', '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(23, 31, 250, 'Firdan', 4000, 'tunai', '2023-04-26 21:11:58', '2023-04-26 21:11:58'),
(24, 32, 250, 'Firdan', 300000, 'tunai', '2023-04-26 21:11:58', '2023-04-26 21:11:58'),
(25, 34, 250, 'Mahendra', 13000, 'tunai', '2023-04-28 21:11:58', '2023-04-28 21:11:58'),
(26, 35, 401, 'Mahendra', 2000000, 'tunai', '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(27, 36, 250, 'Mahendra', 35000, 'tunai', '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(28, 37, 401, 'Mahendra', 1500000, 'tunai', '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(29, 41, 250, 'Dinas Kesehatan Lumajang', 129700000, 'tunai', '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(30, 43, 401, 'SMK Negeri 1 Lumajang', 4000000, 'tunai', '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(31, 46, 250, 'RS. Muhammadiyah', 28000, 'tunai', '2023-06-02 14:36:21', '2023-06-02 14:36:21'),
(32, 30, 122, 'Firdan', 1250000, 'tunai', '2023-06-02 14:37:28', '2023-06-02 14:37:28'),
(33, 47, 250, 'Firman', 80000, 'tunai', '2023-06-02 15:14:24', '2023-06-02 15:14:24'),
(34, 44, 122, 'RSUD Pasirian', 7187500, 'tunai', '2023-06-13 13:13:00', '2023-06-13 13:13:00'),
(35, 33, 122, 'Mahendra', 315000, 'tunai', '2023-06-13 14:37:10', '2023-06-13 14:37:10'),
(36, 10, 122, 'Firdan', 186000, 'tunai', '2023-06-13 14:38:32', '2023-06-13 14:38:32'),
(37, 10, 122, 'Firdan', 186000, 'tunai', '2023-06-13 14:39:35', '2023-06-13 14:39:35'),
(38, 10, 122, 'Firdan', 186000, 'tunai', '2023-06-13 14:45:05', '2023-06-13 14:45:05'),
(39, 2, 122, 'Mahendra', 4000000, 'tunai', '2023-06-13 14:46:13', '2023-06-13 14:46:13'),
(40, 13, 122, 'Firdan', 750000, 'tunai', '2023-06-13 16:20:40', '2023-06-13 16:20:40'),
(41, 19, 122, 'RSUD Pasirian', 2670000, 'tunai', '2023-06-13 16:33:37', '2023-06-13 16:33:37'),
(42, 14, 122, 'Firdan', 200000, 'tunai', '2023-06-13 16:37:23', '2023-06-13 16:37:23'),
(43, 14, 122, 'Firdan', 380000, 'tunai', '2023-06-13 16:50:04', '2023-06-13 16:50:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_cart`
--

CREATE TABLE `transaction_cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_nota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `nama_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ukuran_p` double DEFAULT NULL,
  `ukuran_l` double DEFAULT NULL,
  `is_plong` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `finishing_plong_qty` int(11) DEFAULT NULL,
  `finishing_plong_harga` int(11) DEFAULT NULL,
  `det_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `levels` enum('Manager','Admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `levels`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Firdan Mahendra', 'firdanmahendraw4@gmail.com', 'owner', '$2y$10$TQl.71yiyokbAKkUiy4Nx.1CNV.h1D9Fu2JOCV51pgura.Mo9io0u', 'Manager', NULL, '2023-03-24 07:32:21', '2023-03-24 07:32:21'),
(2, 'Novi', 'semauku.id@gmail.com', 'admin', '$2y$10$SCLXc0NjvM38uFY6l0kI/e4GXLWYX.q/MruFpY2eZoJ.Qdz/jFWfC', 'Admin', NULL, '2023-03-24 07:32:21', '2023-06-11 11:48:02');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_customer`
--
ALTER TABLE `mst_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_kode_akun`
--
ALTER TABLE `mst_kode_akun`
  ADD UNIQUE KEY `kode_kategori` (`id`);

--
-- Indeks untuk tabel `mst_opsi_pembayaran`
--
ALTER TABLE `mst_opsi_pembayaran`
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
-- Indeks untuk tabel `password_reset`
--
ALTER TABLE `password_reset`
  ADD KEY `password_reset_email_index` (`email`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_supplier_2` (`id_supplier`);

--
-- Indeks untuk tabel `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pembelian` (`id_pembelian`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_user` (`id_user`);

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
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_bkk`
--
ALTER TABLE `tb_bkk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_bkm`
--
ALTER TABLE `tb_bkm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penjualan` (`id_penjualan`);

--
-- Indeks untuk tabel `transaction_cart`
--
ALTER TABLE `transaction_cart`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `mst_customer`
--
ALTER TABLE `mst_customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `mst_opsi_pembayaran`
--
ALTER TABLE `mst_opsi_pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mst_produk`
--
ALTER TABLE `mst_produk`
  MODIFY `id_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `mst_supplier`
--
ALTER TABLE `mst_supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id_penjualan_detail` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_bkk`
--
ALTER TABLE `tb_bkk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT untuk tabel `tb_bkm`
--
ALTER TABLE `tb_bkm`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `transaction_cart`
--
ALTER TABLE `transaction_cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
