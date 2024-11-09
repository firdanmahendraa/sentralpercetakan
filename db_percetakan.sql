-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Nov 2024 pada 16.47
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

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
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(97, '2014_10_12_000000_create_users_table', 1),
(98, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(99, '2022_10_19_093302_create_mst_produk_table', 1),
(100, '2022_10_21_040114_create_mst_supplier_table', 1),
(101, '2022_11_11_134217_create_penjualan_table', 1),
(102, '2022_11_11_134245_create_penjualan_detail_table', 1),
(103, '2022_11_27_103742_create_setting_table', 1),
(104, '2022_12_30_102953_create_mst_kode_akun_table', 1),
(105, '2023_01_10_085912_create_mst_opsi_pembayaran_table', 1),
(106, '2023_01_10_104420_create_mst_customer_table', 1),
(107, '2023_04_08_115545_create_transaction_cart_table', 1),
(108, '2023_04_09_142558_create_tb_bkm_table', 1),
(109, '2023_05_08_150759_create_pembelian_table', 1),
(110, '2023_05_08_150836_create_pembelian_detail_table', 1),
(111, '2023_05_18_190208_create_tb_bkk_table', 1),
(112, '2023_06_11_153424_create_password_reset_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_customer`
--

CREATE TABLE `mst_customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `telepon_pelanggan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mst_customer`
--

INSERT INTO `mst_customer` (`id`, `nama_pelanggan`, `alamat_pelanggan`, `telepon_pelanggan`, `created_at`, `updated_at`) VALUES
(1, 'Klinik Edifuz', 'Jl. Kapten Suwandak No.50, Ditotrunan, Kec. Lumajang, Kab. Lumajang', '082121300100', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(2, 'SMK Muhammadiyah', 'JL. Letkol Slamet Wardoyo, No. 103, Labruk Lor, Lumajang', '(0334) 890222', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(3, 'RSUD Pasirian', 'Jl. Raya Pasirian No.225A, Kebonan, Pasirian, Kec. Pasirian, Kabupaten Lumajang', '(0334) 5761114', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(4, 'RS. Bhayangkara', 'Jl. Kapten Kyai Ilyas No.7, Tompokersan, Kec. Lumajang, Kabupaten Lumajang', '(0334) 881646', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(5, 'RS. Muhammadiyah', 'JL. Letkol Slamet Wardoyo, No. 103, Labruk Lor, Lumajang', '(0334) 8782955', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(6, 'Dinas Kesehatan Lumajang', 'Jl. Jend. S. Parman No.13, Rogotrunan, Kec. Lumajang, Kabupaten Lumajang', '(0334) 881066', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(7, 'SMK Negeri 1 Lumajang', 'Jl. H. O.S. Cokroaminoto No.161, Tompokersan, Kec. Lumajang', '(0334) 881866', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(8, 'Firdan', 'Lumajang', '085284070404', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(9, 'Mahendra', 'Lumajang', '085284070404', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(11, 'Dewi', 'surabaya', '082', '2024-11-09 15:36:32', '2024-11-09 15:36:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_kode_akun`
--

CREATE TABLE `mst_kode_akun` (
  `id` varchar(255) NOT NULL,
  `nama_akun` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mst_kode_akun`
--

INSERT INTO `mst_kode_akun` (`id`, `nama_akun`, `created_at`, `updated_at`) VALUES
('100', 'KAS', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('101', 'KSA', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('102', 'Bank Jatim', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('103', 'BCA', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('104', 'Hutang Tunai', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('105', 'Hutang Usaha', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('106', 'Hutang Lain-Lain', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('107', 'Hutang Saham', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('122', 'Piutang Usaha', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('125', 'Piutang Karyawan', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('126', 'Piutang Lain-Lain', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('140', 'Inventaris', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('151', 'Bahan Baku', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('152', 'Bahan Penolong', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('153', 'Bahan Pembersih', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('250', 'Uang Muka', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('620', 'Biaya Komisi', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('640', 'Biaya Promosi', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('700', 'Biaya Lembur', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('701', 'Biaya Gaji', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('702', 'Biaya Konsumsi', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('703', 'Biaya Perbaikan Kendaraan', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('703.1', 'Biaya Perbaikan Mesin', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('703.2', 'Biaya Perbaikan Bangunan', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('704', 'Biaya Transportasi', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('705', 'Biaya L.A.T', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('707', 'Biaya Kantor', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('709', 'Biaya Produksi', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('710', 'Biaya Kirim', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('712', 'Biaya Lain-Lain', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('713', 'Solar Pajak', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('715', 'Pendapatan Peralatan', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('716', 'Solar Genset', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
('717', 'Pendapatan Lain-Lain', '2024-10-14 17:37:24', '2024-10-14 17:37:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_opsi_pembayaran`
--

CREATE TABLE `mst_opsi_pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opsi_pembayaran` varchar(255) NOT NULL,
  `nomor_rekening` varchar(255) DEFAULT NULL,
  `atas_nama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mst_opsi_pembayaran`
--

INSERT INTO `mst_opsi_pembayaran` (`id`, `opsi_pembayaran`, `nomor_rekening`, `atas_nama`, `created_at`, `updated_at`) VALUES
(1, 'BCA', '123456', 'Firdan Mahendra', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(2, 'Mandiri', '123456', 'Firdan Mahendra', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(3, 'BRI', '123456', 'Firdan Mahendra', '2024-10-14 17:37:24', '2024-10-14 17:37:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_produk`
--

CREATE TABLE `mst_produk` (
  `id_produk` int(10) UNSIGNED NOT NULL,
  `kode_produk` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `ukuran_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `type_produk` enum('qty','meter') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mst_produk`
--

INSERT INTO `mst_produk` (`id_produk`, `kode_produk`, `nama_produk`, `ukuran_produk`, `harga_produk`, `type_produk`, `created_at`, `updated_at`) VALUES
(1, 'FRONT280', 'Fronlite 280', 'meter', 17500, 'meter', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(2, 'BC001', 'BC', 'A3', 5000, 'qty', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(3, 'Dup350', 'Duplex', 'A3', 5000, 'qty', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(4, 'Ap160', 'Art Paper', 'A3', 5000, 'qty', '2024-10-14 17:37:24', '2024-11-09 15:26:20'),
(5, 'HVS70', 'HVS', 'A3', 5000, 'qty', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(6, 'CSTM01', 'Custom Ofset', 'custom', 5000, 'qty', '2024-10-14 17:37:24', '2024-10-14 17:37:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_supplier`
--

CREATE TABLE `mst_supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `telepon_supplier` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mst_supplier`
--

INSERT INTO `mst_supplier` (`id`, `nama_supplier`, `alamat_supplier`, `telepon_supplier`, `created_at`, `updated_at`) VALUES
(1, 'Alea Grafika', 'Jl. Raya Tenggilis Mejoyo Blk. E - 7, Tenggilis Mejoyo, Surabaya', '(031) 8477784', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(2, 'Aneka Binding', 'Jl. Sidosermo V No.65, Sidosermo, Kec. Wonocolo, Surabaya', '081553161358', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(3, 'Aneka Jaya Perkasa', 'Jl. Wijaya Kusuma No.78, Ditotrunan, Lumajang', '-', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(4, 'Aneka Vita', 'Jalan Jenderal Sudirman No.188-G, Tompokersan, Lumajang', '-', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(5, 'ColorLink', 'Jl. Satsui Tubun No.8 F, Gadang, Kec. Sukun, Kota Malang', '-', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(6, 'Golden Grafika', 'Taman indah regency, Geluran, Kec. Taman, Kabupaten Sidoarjo', '-', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(7, 'Makmur Jaya Usaha', 'Jl. Kembang Jepun 110. SURABAYA', '-', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(8, 'Megah Baru Jember', 'Jl. PB Sudirman No.22, Wetan Ktr., Jemberlor, Kec. Patrang, Kabupaten Jember', '-', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(9, 'P. Taufik', 'Lumajang', '-', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(10, 'PT. Bintang Cakra Kencana', 'Jl. Ahmad Yani No.48, Ketintang, Kec. Gayungan, Surabaya', '-', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(11, 'PT. Binter Jet', 'Jl. Wiratno 7B, Kenjeran, Surabaya', '-', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(12, 'Ryo Kertas', 'Ruko Perumahan Pesona Alam No. 01, Jl. Soekarno Hatta, Lumajang', '-', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(13, 'Santana Citra Perkasa', 'JL. Margomulyo Permai, Blok E/22, Greges, Surabaya', '-', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(14, 'Setia Kawan', 'Jl. Semeru No.124, Citrodiwangsan, Lumajang', '-', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(15, 'Sinar Ilmu', 'Jl. Abu Bakar No.06, Citrodiwangsan, Kec. Lumajang', '08116758550', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(16, 'Tk.  Minaret', 'Jl. Jendral Panjaitan No.71, Citrodiwangsan, Kec. Lumajang', '-', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(17, 'UD Efod Jaya Abadi', 'JL. Tropodo 1, No. 225, Sidoarjo', '-', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(18, 'Vicentra', 'Jl. Rungkut Asri Utara XIX No.93, Kali Rungkut, Kec. Rungkut, Surabaya', '085733399974', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(19, 'PT. Mahkota Rajin Setia', 'JL. Rungkut Industri III/71, Surabaya', '031-8411177', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(20, 'SPBU', 'Lumajang', '1', '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(23, 'Dewi', 'Surabaya', '123', '2024-11-09 15:44:39', '2024-11-09 15:44:39'),
(24, 'Dewi', 'Surabaya', '123', '2024-11-09 15:44:40', '2024-11-09 15:44:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset`
--

CREATE TABLE `password_reset` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `no_nota` varchar(255) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `hutang` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` enum('pend','ok') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id`, `id_supplier`, `no_nota`, `sub_total`, `bayar`, `hutang`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, '-', 2850000, 0, -2850000, 'Hutang', 'ok', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(2, 14, '-', 4466000, 0, -4466000, 'Lunas', 'ok', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(3, 14, '-', 42500, 42500, 0, 'Lunas', 'ok', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(4, 6, 'N009361', 88000, 0, -88000, 'Hutang', 'ok', '2023-01-04 15:17:16', '2023-01-04 15:17:16'),
(5, 12, 'TRN0701200003', 5367000, 5367000, 0, 'Lunas', 'ok', '2023-01-07 15:17:16', '2023-01-07 15:17:16'),
(6, 6, 'N009395', 264000, 0, -264000, 'Hutang', 'ok', '2023-01-08 15:17:16', '2023-01-08 15:17:16'),
(7, 14, '-', 33750, 33750, 0, 'Lunas', 'ok', '2023-01-08 15:17:16', '2023-01-08 15:17:16'),
(8, 14, '-', 1620000, 1620000, 0, 'Lunas', 'ok', '2023-01-08 15:17:16', '2023-01-08 15:17:16'),
(9, 14, '-', 1032500, 1032500, 0, 'Lunas', 'ok', '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(10, 14, '-', 47000, 47000, 0, 'Lunas', 'ok', '2023-01-17 15:17:16', '2023-01-17 15:17:16'),
(11, 6, 'N009564', 35000, 0, -35000, 'Hutang', 'ok', '2023-01-28 15:17:16', '2023-01-28 15:17:16'),
(12, 12, '-', 342225, 342225, 0, 'Lunas', 'ok', '2023-01-28 15:17:16', '2023-01-28 15:17:16'),
(13, 6, 'N009580', 455000, 0, -455000, 'Hutang', 'ok', '2023-01-29 15:17:16', '2023-01-29 15:17:16'),
(14, 14, '-', 93600, 93600, 0, 'Lunas', 'ok', '2023-01-29 15:17:16', '2023-01-29 15:17:16'),
(15, 6, 'N009584', 592000, 0, -592000, 'Hutang', 'ok', '2023-01-30 15:17:16', '2023-01-30 15:17:16'),
(16, 16, '-', 44000, 44000, 0, 'Lunas', 'ok', '2023-02-01 15:17:16', '2023-02-01 15:17:16'),
(17, 14, '-', 167500, 167500, 0, 'Lunas', 'ok', '2023-02-04 15:17:16', '2023-02-04 15:17:16'),
(18, 16, '-', 33000, 33000, 0, 'Lunas', 'ok', '2023-02-06 15:17:16', '2023-02-06 15:17:16'),
(19, 14, '-', 33000, 33000, 0, 'Lunas', 'ok', '2023-02-07 15:17:16', '2023-02-07 15:17:16'),
(20, 6, 'N009655', 88000, 0, -88000, 'Hutang', 'ok', '2023-02-08 15:17:16', '2023-02-08 15:17:16'),
(21, 14, '-', 65000, 65000, 0, 'Lunas', 'ok', '2023-02-11 15:17:16', '2023-02-11 15:17:16'),
(22, 16, '-', 22000, 22000, 0, 'Lunas', 'ok', '2023-02-11 15:17:16', '2023-02-11 15:17:16'),
(23, 18, 'FJ200200164', 130000, 0, -130000, 'Hutang', 'ok', '2023-02-13 15:17:16', '2023-02-13 15:17:16'),
(24, 19, 'SN20020384', 341000, 0, -341000, 'Hutang', 'ok', '2023-02-14 15:17:16', '2023-02-14 15:17:16'),
(25, 14, '-', 311500, 311500, 0, 'Lunas', 'ok', '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(26, 14, '-', 182000, 182000, 0, 'Lunas', 'ok', '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(27, 1, 'JLPST0036494', 328625, 0, -328625, 'Hutang', 'ok', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(28, 20, 'N155321', 80000, 80000, 0, 'Lunas', 'ok', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(29, 14, '-', 489500, 489500, 0, 'Lunas', 'ok', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(30, 6, 'N009730', 1540000, 0, -1540000, 'Hutang', 'ok', '2023-02-18 15:17:16', '2023-02-18 15:17:16'),
(31, 6, 'N009788', 176000, 0, -176000, 'Hutang', 'ok', '2023-02-26 15:17:16', '2023-02-26 15:17:16'),
(32, 21, '-', 165000, 165000, 0, 'Lunas', 'ok', '2023-02-27 15:17:16', '2023-02-27 15:17:16'),
(33, 8, '-', 833000, 0, -83000, 'Hutang', 'ok', '2023-02-28 15:17:16', '2023-02-28 15:17:16'),
(34, 14, '-', 144500, 144500, 0, 'Lunas', 'ok', '2023-03-01 15:17:16', '2023-03-01 15:17:16'),
(35, 6, 'N009816', 88000, 0, -88000, 'Hutang', 'ok', '2023-03-02 15:17:16', '2023-03-02 15:17:16'),
(36, 16, '-', 8000, 8000, 0, 'Lunas', 'ok', '2023-03-09 15:17:16', '2023-03-09 15:17:16'),
(37, 6, 'N009868', 88000, 0, -88000, 'Hutang', 'ok', '2023-03-10 15:17:16', '2023-03-10 15:17:16'),
(38, 14, '-', 41000, 41000, 0, 'Lunas', 'ok', '2023-03-10 15:17:16', '2023-03-10 15:17:16'),
(39, 14, '-', 150000, 150000, 0, 'Lunas', 'ok', '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(40, 14, '-', 123000, 123000, 0, 'Lunas', 'ok', '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(41, 9, '-', 150000, 150000, 0, 'Lunas', 'ok', '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(42, 20, 'N237695', 80000, 80000, 0, 'Lunas', 'ok', '2023-03-18 15:18:16', '2023-03-18 15:18:16'),
(43, 14, '-', 89000, 89000, 0, 'Lunas', 'ok', '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(44, 14, '-', 47000, 47000, 0, 'Lunas', 'ok', '2023-03-18 15:18:16', '2023-03-18 15:18:16'),
(45, 10, '304128020', 1460000, 0, -1460000, 'Hutang', 'ok', '2023-03-28 15:17:16', '2023-03-28 15:17:16'),
(46, 14, '-', 36500, 36500, 0, 'Lunas', 'ok', '2023-03-28 15:17:16', '2023-03-28 15:17:16'),
(47, 14, '-', 58000, 58000, 0, 'Lunas', 'ok', '2023-03-28 15:17:16', '2023-03-28 15:17:16'),
(48, 8, '-', 490000, 0, -490000, 'Hutang', 'ok', '2023-03-30 15:17:16', '2023-03-30 15:17:16'),
(49, 19, 'SN20030715', 391600, 0, -391600, 'Hutang', 'ok', '2023-03-30 15:17:16', '2023-03-30 15:17:16'),
(50, 9, '-', 150000, 150000, 0, 'Lunas', 'ok', '2023-03-31 15:17:16', '2023-03-31 15:17:16'),
(51, 18, 'FJ200400007', 400000, 0, -400000, 'Hutang', 'ok', '2023-04-01 15:17:16', '2023-04-01 15:17:16'),
(52, 19, 'SN20040033', 613800, 0, 0, 'Lunas (Tunai/09/11/2024)', 'ok', '2023-04-01 15:17:16', '2024-11-09 15:43:48'),
(53, 6, 'N010023', 100000, 0, -100000, 'Hutang', 'ok', '2023-04-06 15:17:16', '2023-04-06 15:17:16'),
(54, 14, '-', 287000, 287000, 0, 'Lunas', 'ok', '2023-04-06 15:17:16', '2023-04-06 15:17:16'),
(55, 14, '-', 160000, 160000, 0, 'Lunas', 'ok', '2023-04-15 15:17:16', '2023-04-15 15:17:16'),
(56, 1, 'JLPST0038712', 850025, 0, -850025, 'Hutang', 'ok', '2023-04-16 15:17:16', '2023-04-16 15:17:16'),
(57, 20, 'N308639', 76500, 76500, 0, 'Lunas', 'ok', '2023-04-16 15:17:16', '2023-04-16 15:17:16'),
(58, 14, '-', 156000, 156000, 0, 'Lunas', 'ok', '2023-04-16 15:17:16', '2023-04-16 15:17:16'),
(59, 20, 'N347040', 76500, 76500, 0, 'Lunas', 'ok', '2023-04-30 15:17:16', '2023-04-30 15:17:16'),
(60, 14, '-', 88000, 88000, 0, 'Lunas', 'ok', '2023-04-30 15:17:16', '2023-04-30 15:17:16'),
(61, 14, '-', 32500, 32500, 0, 'Lunas', 'ok', '2023-05-02 15:17:16', '2023-05-02 15:17:16'),
(62, 13, 'N724', 6150034, 0, -6150034, 'Hutang', 'ok', '2023-05-04 15:17:16', '2023-05-04 15:17:16'),
(63, 6, 'N010147', 1248000, 0, -1248000, 'Hutang', 'ok', '2023-05-05 15:17:16', '2023-05-05 15:17:16'),
(64, 1, 'JLPST0039', 782100, 0, -782100, 'Hutang', 'ok', '2023-05-11 15:17:16', '2023-05-11 15:17:16'),
(65, 14, '-', 60000, 60000, 0, 'Lunas', 'ok', '2023-05-15 15:17:16', '2023-05-15 15:17:16'),
(66, 6, 'N010202', 100000, 0, -100000, 'Hutang', 'ok', '2023-05-16 15:17:16', '2023-05-16 15:17:16'),
(67, 20, 'N392484', 76500, 76500, 0, 'Lunas', 'ok', '2023-05-16 15:17:16', '2023-05-16 15:17:16'),
(68, 6, 'N010211', 195000, 0, -195000, 'Hutang', 'ok', '2023-05-18 15:17:16', '2023-05-18 15:17:16'),
(69, 14, '-', 13800, 13800, 0, 'Lunas', 'ok', '2023-05-18 15:17:16', '2023-05-18 15:17:16'),
(70, 9, '-', 150000, 150000, 0, 'Lunas', 'ok', '2023-05-30 15:17:16', '2023-05-30 15:17:16'),
(73, 24, '123333', 138000, 138000, 0, 'Lunas', 'ok', '2024-11-09 15:44:40', '2024-11-09 15:45:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `uraian` varchar(255) NOT NULL,
  `jumlah` double NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` enum('pend','ok') NOT NULL DEFAULT 'pend',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`id`, `id_pembelian`, `id_akun`, `uraian`, `jumlah`, `satuan`, `harga`, `sub_total`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 151, 'AP 85g (65)', 6, 'rim', 475000, 2850000, 'Hutang', 'ok', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(2, 2, 151, 'BC Bandung Putih', 1, 'pack', 325000, 325000, 'Hutang', 'ok', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(3, 2, 151, 'BC Bandung Merah', 1, 'pack', 340000, 340000, 'Hutang', 'ok', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(4, 2, 151, 'BC Bandung Biru', 1, 'pack', 340000, 340000, 'Hutang', 'ok', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(5, 2, 151, 'BC Bandung Kuning', 1, 'pack', 340000, 340000, 'Hutang', 'ok', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(6, 2, 151, 'HVS 70g (79) PaperPlus', 3, 'rim', 432000, 1296000, 'Hutang', 'ok', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(7, 2, 151, 'HVS 70g (65) PaperPlus', 5, 'rim', 328000, 1640000, 'Hutang', 'ok', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(8, 2, 151, 'Karton 160', 1, 'pack', 185000, 185000, 'Hutang', 'ok', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(9, 3, 151, 'PVC Silver 200g', 1, 'kg', 20000, 20000, 'Lunas', 'ok', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(10, 3, 151, 'PVC Red 200g', 1, 'kg', 22500, 22500, 'Lunas', 'ok', '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(11, 4, 709, 'Plate Kalender Duduk', 4, 'lbr', 22000, 88000, 'Hutang', 'ok', '2023-01-04 15:17:16', '2023-01-04 15:17:16'),
(12, 5, 151, 'AP 150g (79x109)', 520, 'lbr', 2275, 1183000, 'Lunas', 'ok', '2023-01-07 15:17:16', '2023-01-07 15:17:16'),
(13, 5, 151, 'AP 120g (65x100)', 2000, 'lbr', 1287, 2574000, 'Lunas', 'ok', '2023-01-07 15:17:16', '2023-01-07 15:17:16'),
(14, 5, 151, 'AP 150g (65x100)', 1000, 'lbr', 1610, 1610000, 'Lunas', 'ok', '2023-01-07 15:17:16', '2023-01-07 15:17:16'),
(15, 6, 709, 'Plate Brosur STKIP', 4, 'lbr', 22000, 88000, 'Hutang', 'ok', '2023-01-08 15:17:16', '2023-01-08 15:17:16'),
(16, 6, 709, 'PlateTiket Masuk', 4, 'lbr', 22000, 88000, 'Hutang', 'ok', '2023-01-08 15:17:16', '2023-01-08 15:17:16'),
(17, 6, 709, 'PlateTiket Parkir Gambir', 4, 'lbr', 22000, 88000, 'Hutang', 'ok', '2023-01-08 15:17:16', '2023-01-08 15:17:16'),
(18, 7, 151, 'Plastik Uk 12,5x24', 5, 'pack', 6750, 33750, 'Lunas', 'ok', '2023-01-08 15:17:16', '2023-01-08 15:17:16'),
(19, 8, 151, 'HVS AL F4 70g', 40, 'rim', 40500, 1620000, 'Lunas', 'ok', '2023-01-08 15:17:16', '2023-01-08 15:17:16'),
(20, 9, 151, 'Id Card PVC V-Tech', 50, 'pack', 5500, 275000, 'Lunas', 'ok', '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(21, 9, 152, 'Acco Joyco Putih (Snel)', 50, 'pack', 7500, 375000, 'Lunas', 'ok', '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(22, 9, 151, 'Amplop PPL KAB 90 PPS', 5, 'pack', 17500, 87500, 'Lunas', 'ok', '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(23, 9, 151, 'Amplop Samson B', 5, 'pack', 18000, 90000, 'Lunas', 'ok', '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(24, 9, 151, 'Amplop Samson E', 5, 'pack', 41000, 205000, 'Lunas', 'ok', '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(25, 10, 151, 'Glory 210g', 10, 'lbr', 4700, 47000, 'Lunas', 'ok', '2023-01-17 15:17:16', '2023-01-17 15:17:16'),
(26, 11, 709, 'Plate Isi Kohir', 1, 'lbr', 35000, 35000, 'Hutang', 'ok', '2023-01-28 15:17:16', '2023-01-28 15:17:16'),
(27, 12, 151, 'Duplex 250g (79x109)', 135, 'lbr', 2535, 342225, 'Lunas', 'ok', '2023-01-28 15:17:16', '2023-01-28 15:17:16'),
(28, 13, 709, 'Plate Isi Merdeka', 13, 'lbr', 35000, 455000, 'Hutang', 'ok', '2023-01-29 15:17:16', '2023-01-29 15:17:16'),
(29, 14, 151, 'Stiker HVS', 36, 'lbr', 2600, 93600, 'Lunas', 'ok', '2023-01-29 15:17:16', '2023-01-29 15:17:16'),
(30, 15, 709, 'Plate Cover Manfaat Record', 8, 'lbr', 22000, 176000, 'Hutang', 'ok', '2023-01-30 15:17:16', '2023-01-30 15:17:16'),
(31, 15, 709, 'Plate Laporan Realisasi', 1, 'lbr', 13000, 13000, 'Hutang', 'ok', '2023-01-30 15:17:16', '2023-01-30 15:17:16'),
(32, 15, 709, 'Plate Cover Doreng', 4, 'lbr', 22000, 88000, 'Hutang', 'ok', '2023-01-30 15:17:16', '2023-01-30 15:17:16'),
(33, 15, 709, 'Plate Tabloid Peduli Rakyat', 9, 'lbr', 35000, 315000, 'Hutang', 'ok', '2023-01-30 15:17:16', '2023-01-30 15:17:16'),
(34, 16, 152, 'Lakban Hitam Besar', 4, 'pcs', 11000, 44000, 'Lunas', 'ok', '2023-02-01 15:17:16', '2023-02-01 15:17:16'),
(35, 17, 151, 'HVS MAXI A4 70g', 5, 'rim', 33500, 167500, 'Lunas', 'ok', '2023-02-04 15:17:16', '2023-02-04 15:17:16'),
(36, 18, 152, 'Lakban Bening Besar', 3, 'pcs', 11000, 33000, 'Lunas', 'ok', '2023-02-06 15:17:16', '2023-02-06 15:17:16'),
(37, 18, 152, 'Lakban Coklat Besar', 1, 'pcs', 11000, 11000, 'Lunas', 'ok', '2023-02-06 15:17:16', '2023-02-06 15:17:16'),
(38, 19, 151, 'BC Putih Rambow', 20, 'lbr', 1650, 33000, 'Lunas', 'ok', '2023-02-07 15:17:16', '2023-02-07 15:17:16'),
(39, 20, 709, 'Brosur STKIP', 4, 'lbr', 22000, 88000, 'Hutang', 'ok', '2023-02-08 15:17:16', '2023-02-08 15:17:16'),
(40, 20, 709, 'Brosur Kedai & Map JGP', 8, 'lbr', 22000, 176000, 'Hutang', 'ok', '2023-02-08 15:17:16', '2023-02-08 15:17:16'),
(41, 21, 151, 'Stiker HVS', 25, 'lbr', 2600, 65000, 'Lunas', 'ok', '2023-02-11 15:17:16', '2023-02-11 15:17:16'),
(42, 22, 152, 'Lakban Bening Besar', 2, 'pcs', 11000, 22000, 'Lunas', 'ok', '2023-02-11 15:17:16', '2023-02-11 15:17:16'),
(43, 23, 153, 'SpareGum', 2, 'btl', 65000, 130000, 'Hutang', 'ok', '2023-02-13 15:17:16', '2023-02-13 15:17:16'),
(44, 23, 153, 'Gum Solution', 2, 'gln', 42500, 85000, 'Hutang', 'ok', '2023-02-13 15:17:16', '2023-02-13 15:17:16'),
(45, 24, 151, 'New Cahaya Pro Yellow', 5, 'kg', 68200, 341000, 'Hutang', 'ok', '2023-02-14 15:17:16', '2023-02-14 15:17:16'),
(46, 24, 151, 'New Cahaya Pro Black', 3, 'kg', 63800, 191400, 'Hutang', 'ok', '2023-02-14 15:17:16', '2023-02-14 15:17:16'),
(47, 24, 151, 'Best One Pro Yellow', 2, 'kg', 92400, 184800, 'Hutang', 'ok', '2023-02-14 15:17:16', '2023-02-14 15:17:16'),
(48, 24, 151, 'Best One Pro Black', 2, 'kg', 83600, 167200, 'Hutang', 'ok', '2023-02-14 15:17:16', '2023-02-14 15:17:16'),
(49, 25, 151, 'Pro Top White', 7, 'rim', 44500, 311500, 'Lunas', 'ok', '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(50, 25, 151, 'Pro Bottom Yellow', 4, 'rim', 41500, 166000, 'Lunas', 'ok', '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(51, 25, 151, 'Pro Bottom Pink', 3, 'rim', 41500, 124500, 'Lunas', 'ok', '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(52, 25, 151, 'NCR Top White', 3, 'rim', 49500, 148500, 'Lunas', 'ok', '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(53, 25, 151, 'NCR Bottom Pink', 2, 'rim', 45500, 91000, 'Lunas', 'ok', '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(54, 25, 151, 'NCR Bottom Yellow', 1, 'rim', 45500, 45500, 'Lunas', 'ok', '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(55, 26, 151, 'Pro Bottom White', 4, 'rim', 45500, 182000, 'Lunas', 'ok', '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(56, 26, 151, 'Pro Bottom Blue', 1, 'rim', 45500, 45500, 'Lunas', 'ok', '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(57, 27, 152, 'Tali RAfia Netral', 23.9, 'kg', 13750, 328625, 'Hutang', 'ok', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(58, 27, 152, 'Tali RAfia Netral', 20.5, 'kg', 13750, 281875, 'Hutang', 'ok', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(59, 27, 152, 'Rol Air 650x50-40 (Newmoll 2 Pcs)', 1400, 'mm', 159, 244644, 'Hutang', 'ok', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(60, 28, 153, 'Bensin Produksi', 10.457516, 'ltr', 7650, 80000, 'Lunas', 'ok', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(61, 29, 151, 'Pro Top White', 11, 'rim', 44500, 489500, 'Lunas', 'ok', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(62, 29, 151, 'Pro Middle Yellow', 10, 'rim', 47000, 470000, 'Lunas', 'ok', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(63, 29, 151, 'Pro Middle Pink', 1, 'rim', 47000, 47000, 'Lunas', 'ok', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(64, 29, 151, 'Pro Bottom Pink', 5, 'rim', 41500, 207500, 'Lunas', 'ok', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(65, 29, 151, 'Pro Bottom Yellow', 6, 'rim', 41500, 249000, 'Lunas', 'ok', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(66, 29, 151, 'HVS MAXI F4 70g', 15, 'rim', 37500, 562500, 'Lunas', 'ok', '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(67, 30, 709, 'Plate Buku Lansia Film', 44, 'lbr', 35000, 1540000, 'Hutang', 'ok', '2023-02-18 15:17:16', '2023-02-18 15:17:16'),
(68, 30, 709, 'Plate Isi Merdeka', 13, 'lbr', 35000, 455000, 'Hutang', 'ok', '2023-02-18 15:17:16', '2023-02-18 15:17:16'),
(69, 30, 709, 'Plate Majalah PGRI', 17, 'lbr', 22000, 274000, 'Hutang', 'ok', '2023-02-18 15:17:16', '2023-02-18 15:17:16'),
(70, 31, 709, 'Plate Leaflet OK', 8, 'lbr', 22000, 176000, 'Hutang', 'ok', '2023-02-26 15:17:16', '2023-02-26 15:17:16'),
(71, 31, 709, 'Plate Verval 2023', 2, 'lbr', 22000, 44000, 'Hutang', 'ok', '2023-02-26 15:17:16', '2023-02-26 15:17:16'),
(72, 31, 709, 'Plate Verval 2023', 2, 'lbr', 13000, 26000, 'Hutang', 'ok', '2023-02-26 15:17:16', '2023-02-26 15:17:16'),
(73, 32, 151, 'HVS 70g F4', 5, 'rim', 33000, 165000, 'Lunas', 'ok', '2023-02-27 15:17:16', '2023-02-27 15:17:16'),
(74, 33, 151, 'AP 120g (79)', 1, 'rim', 833000, 833000, 'Hutang', 'ok', '2023-02-28 15:17:16', '2023-02-28 15:17:16'),
(75, 33, 151, 'AP 150g (65x100)', 1, 'rim', 805000, 805000, 'Hutang', 'ok', '2023-02-28 15:17:16', '2023-02-28 15:17:16'),
(76, 33, 151, 'HVS 70g (79)', 1, 'rim', 432000, 432000, 'Hutang', 'ok', '2023-02-28 15:17:16', '2023-02-28 15:17:16'),
(77, 33, 151, 'BC Bandung Putih', 1, 'rim', 650000, 650000, 'Hutang', 'ok', '2023-02-28 15:17:16', '2023-02-28 15:17:16'),
(78, 34, 152, 'Isi Etona 23/8', 17, 'pack', 8500, 144500, 'Lunas', 'ok', '2023-02-28 15:17:16', '2023-02-28 15:17:16'),
(79, 35, 709, 'Plate Amplop Film', 4, 'lbr', 22000, 88000, 'Hutang', 'ok', '2023-03-02 15:17:16', '2023-03-02 15:17:16'),
(80, 35, 709, 'Plate Tiket Masuk', 4, 'lbr', 22000, 88000, 'Hutang', 'ok', '2023-03-02 15:17:16', '2023-03-02 15:17:16'),
(81, 36, 152, 'isolasi Kecil', 2, 'pcs', 4000, 8000, 'Lunas', 'ok', '2023-03-09 15:17:16', '2023-03-09 15:17:16'),
(82, 37, 709, 'Plate Amplop Film', 4, 'lbr', 22000, 88000, 'Hutang', 'ok', '2023-03-10 15:17:16', '2023-03-10 15:17:16'),
(83, 37, 709, 'Plate Soal KTSP Kls 3', 18, 'lbr', 13000, 234000, 'Hutang', 'ok', '2023-03-10 15:17:16', '2023-03-10 15:17:16'),
(84, 37, 709, 'Plate Soal K-13 Kls3', 12, 'lbr', 13000, 156000, 'Hutang', 'ok', '2023-03-10 15:17:16', '2023-03-10 15:17:16'),
(85, 38, 151, 'HVS Warna Kuning 58', 1, 'rim', 41000, 41000, 'Lunas', 'ok', '2023-03-10 15:17:16', '2023-03-10 15:17:16'),
(86, 38, 151, 'HVS Warna Hijau 58', 3, 'rim', 41000, 123000, 'Lunas', 'ok', '2023-03-10 15:17:16', '2023-03-10 15:17:16'),
(87, 38, 151, 'Acco Joyco Putih (Snel)', 20, 'pack', 7500, 150000, 'Lunas', 'ok', '2023-03-10 15:17:16', '2023-03-10 15:17:16'),
(88, 39, 152, 'Acco Joyco Putih (Snel)', 20, 'pack', 7500, 150000, 'Lunas', 'ok', '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(89, 40, 151, 'HVS Warna Hijau 58', 3, 'rim', 41500, 123000, 'Lunas', 'ok', '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(90, 40, 151, 'Mika Bening', 2, 'pack', 21500, 43000, 'Lunas', 'ok', '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(91, 40, 152, 'Double Tape 1/4 (kecil)', 40, 'pcs', 1125, 45000, 'Lunas', 'ok', '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(92, 41, 153, 'Minyak Tanah', 10, 'rim', 15000, 150000, 'Lunas', 'ok', '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(93, 42, 153, 'Bensin Produksi', 10.4575163, 'ltr', 7650, 80000, 'Lunas', 'ok', '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(94, 43, 151, 'Pro Top White', 2, 'rim', 44500, 89000, 'Lunas', 'ok', '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(95, 43, 151, 'Pro Middle White', 2, 'rim', 47000, 94000, 'Lunas', 'ok', '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(96, 43, 151, 'Pro Bottom White', 2, 'rim', 41500, 8300, 'Lunas', 'ok', '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(97, 43, 151, 'Concurt Krem', 70, 'lbr', 5400, 378000, 'Lunas', 'ok', '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(98, 44, 151, 'Glory 210g', 10, 'lbr', 4700, 47000, 'Lunas', 'ok', '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(99, 44, 151, 'Stiker Bontax Camel', 25, 'lbr', 2900, 72500, 'Lunas', 'ok', '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(100, 44, 151, 'Stiker HVS', 40, 'lbr', 2600, 104000, 'Lunas', 'ok', '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(101, 45, 151, 'Laminasi Glossy (T. BOP 300x30)', 2, 'roll', 730000, 1460000, 'Hutang', 'ok', '2023-03-28 15:17:16', '2023-03-28 15:17:16'),
(102, 46, 151, 'HVS MAXI F4 70g', 1, 'rim', 36500, 36500, 'Lunas', 'ok', '2023-03-28 15:17:16', '2023-03-28 15:17:16'),
(103, 47, 151, 'Stiker Bontax Camel', 20, 'lbr', 2900, 58000, 'Lunas', 'ok', '2023-03-28 15:17:16', '2023-03-28 15:17:16'),
(104, 48, 151, 'Linen', 100, 'lbr', 4900, 49000, 'Hutang', 'ok', '2023-03-30 15:17:16', '2023-03-30 15:17:16'),
(105, 48, 151, 'Glory 230g', 100, 'lbr', 5100, 51000, 'Hutang', 'ok', '2023-03-30 15:17:16', '2023-03-30 15:17:16'),
(106, 49, 151, 'Best One Pro Magenta', 4, 'kg', 97900, 391600, 'Hutang', 'ok', '2023-03-30 15:17:16', '2023-03-30 15:17:16'),
(107, 49, 151, 'Best One Pro Cyan', 4, 'kg', 101200, 404800, 'Hutang', 'ok', '2023-03-30 15:17:16', '2023-03-30 15:17:16'),
(108, 49, 151, 'Best One Pro Yellow', 4, 'kg', 92400, 369600, 'Hutang', 'ok', '2023-03-30 15:17:16', '2023-03-30 15:17:16'),
(109, 50, 153, 'Minyak Tanah', 10, 'ltr', 15000, 150000, 'Lunas', 'ok', '2023-03-31 15:17:16', '2023-03-31 15:17:16'),
(110, 51, 153, 'Plate Cleaner', 20, 'btl', 20000, 40000, 'Hutang', 'ok', '2023-04-01 15:17:16', '2023-04-01 15:17:16'),
(111, 51, 153, 'M-Fountain', 1, 'gln', 165000, 165000, 'Hutang', 'ok', '2023-04-01 15:17:16', '2023-04-01 15:17:16'),
(112, 52, 151, 'New Cahaya Pro Yellow', 9, 'kg', 68200, 614800, 'lunas', 'ok', '2023-04-01 15:17:16', '2024-11-09 15:43:48'),
(113, 52, 151, 'New Cahaya Pro Magenta', 9, 'kg', 73700, 663300, 'lunas', 'ok', '2023-04-01 15:17:16', '2024-11-09 15:43:48'),
(114, 52, 151, 'New Cahaya Pro Cyan', 9, 'kg', 78100, 702900, 'lunas', 'ok', '2023-04-01 15:17:16', '2024-11-09 15:43:48'),
(115, 52, 151, 'New Cahaya Pro Back', 9, 'kg', 63800, 574200, 'lunas', 'ok', '2023-04-01 15:17:16', '2024-11-09 15:43:48'),
(116, 52, 151, 'Best One Pro Yellow', 3, 'kg', 92400, 277200, 'lunas', 'ok', '2023-04-01 15:17:16', '2024-11-09 15:43:48'),
(117, 52, 151, 'Best One Pro Magenta', 3, 'kg', 97900, 293700, 'lunas', 'ok', '2023-04-01 15:17:16', '2024-11-09 15:43:48'),
(118, 53, 709, 'Plate Map Dinas Pertanian', 4, 'kg', 25000, 100000, 'Hutang', 'ok', '2023-04-06 15:17:16', '2023-04-06 15:17:16'),
(119, 54, 151, 'HVS Warna Kuning 58', 7, 'rim', 41000, 287000, 'Lunas', 'ok', '2023-04-06 15:17:16', '2023-04-06 15:17:16'),
(120, 54, 151, 'HVS Warna Merah 58', 3, 'rim', 41000, 123000, 'Lunas', 'ok', '2023-04-06 15:17:16', '2023-04-06 15:17:16'),
(121, 55, 151, 'BC Putih Rambow', 100, 'lbr', 1600, 160000, 'Lunas', 'ok', '2023-04-15 15:17:16', '2023-04-15 15:17:16'),
(122, 56, 151, 'Special X Banner 60*160 (Tiang)', 50, 'pcs', 17001, 850025, 'Hutang', 'ok', '2023-04-16 15:17:16', '2023-04-16 15:17:16'),
(123, 57, 153, 'Bensin Produksi', 10, 'ltr', 7650, 76500, 'Lunas', 'ok', '2023-04-16 15:17:16', '2023-04-16 15:17:16'),
(124, 58, 151, 'Stiker HVS', 60, 'lbr', 2600, 156000, 'Lunas', 'ok', '2023-04-16 15:17:16', '2023-04-16 15:17:16'),
(125, 59, 153, 'Bensin Produksi', 10, 'ltr', 7650, 76500, 'Lunas', 'ok', '2023-04-30 15:17:16', '2023-04-30 15:17:16'),
(126, 60, 151, 'Top White Pro', 2, 'rim', 44000, 88000, 'Lunas', 'ok', '2023-04-30 15:17:16', '2023-04-30 15:17:16'),
(127, 61, 151, 'Triplex Board 210g', 10, 'lbr', 3250, 32500, 'Lunas', 'ok', '2023-05-02 15:17:16', '2023-05-02 15:17:16'),
(128, 62, 151, 'HVS 70g (61X86) PaperPlus', 22, 'rim', 279547, 6150034, 'Hutang', 'ok', '2023-05-04 15:17:16', '2023-05-04 15:17:16'),
(129, 62, 151, 'HVS 70g (65X100) PaperPlus', 22, 'rim', 346369, 7620118, 'Hutang', 'ok', '2023-05-04 15:17:16', '2023-05-04 15:17:16'),
(130, 62, 151, 'AP150g (65x100)', 6, 'rim', 829237, 4975422, 'Hutang', 'ok', '2023-05-04 15:17:16', '2023-05-04 15:17:16'),
(131, 62, 151, 'AP 150g (79x109)', 2, 'rim', 1064643, 2129286, 'Hutang', 'ok', '2023-05-04 15:17:16', '2023-05-04 15:17:16'),
(132, 62, 151, 'Ivory 300g (79x109)', 1, 'rim', 2251356, 2251356, 'Hutang', 'ok', '2023-05-04 15:17:16', '2023-05-04 15:17:16'),
(133, 62, 151, 'AC 260g (79x109)', 1, 'rim', 1857135, 1857135, 'Hutang', 'ok', '2023-05-04 15:17:16', '2023-05-04 15:17:16'),
(134, 63, 709, 'Plate BTS Film', 32, 'lbr', 39000, 1248000, 'Hutang', 'ok', '2023-05-05 15:17:16', '2023-05-05 15:17:16'),
(135, 64, 152, 'Blanket Fujifura 730x650 (Mesin 72)', 650, 'mm', 1203, 782100, 'Hutang', 'ok', '2023-05-05 15:17:16', '2023-05-05 15:17:16'),
(136, 65, 152, 'Isi Staples Etona 23/6', 10, 'pack', 6000, 60000, 'Lunas', 'ok', '2023-05-15 15:17:16', '2023-05-15 15:17:16'),
(137, 66, 709, 'Plate Label Subur', 4, 'lbr', 25000, 100000, 'Hutang', 'ok', '2023-05-16 15:17:16', '2023-05-16 15:17:16'),
(138, 67, 153, 'Bensin Produksi', 10, 'ltr', 7650, 76500, 'Lunas', 'ok', '2023-05-16 15:17:16', '2023-05-16 15:17:16'),
(139, 68, 709, 'Plate Isi Merdeka News', 5, 'lbr', 39000, 195000, 'Hutang', 'ok', '2023-05-18 15:17:16', '2023-05-18 15:17:16'),
(140, 69, 152, 'Dobel Tape Pajero 12mm (Sedang)', 6, 'pcs', 2300, 13800, 'Lunas', 'ok', '2023-05-16 15:17:16', '2023-05-16 15:17:16'),
(141, 70, 153, 'Minyak Tanah', 10, 'ltr', 15000, 150000, 'Lunas', 'ok', '2023-05-18 15:17:16', '2023-05-18 15:17:16'),
(142, 73, 151, 'Lem Rajawali', 12, 'pcs', 11500, 138000, '', 'ok', '2024-11-09 15:45:15', '2024-11-09 15:45:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(10) UNSIGNED NOT NULL,
  `no_nota` varchar(255) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `acc_desain` varchar(255) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `diskon` int(11) DEFAULT NULL,
  `harga_akhir` int(11) NOT NULL,
  `diterima` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `piutang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `no_nota`, `id_pelanggan`, `acc_desain`, `total_harga`, `diskon`, `harga_akhir`, `diterima`, `kembali`, `piutang`, `id_user`, `id_akun`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'NT23010001', 8, 'Faris', 1925000, 0, 1925000, 1925000, 0, 0, 2, 0, 'Lunas', '2023-01-02 21:11:58', '2023-01-02 21:11:58'),
(2, 'NT23010002', 9, 'Faris', 5500000, 0, 5500000, 1500000, -4000000, -4000000, 2, 0, 'Piutang', '2023-01-08 21:11:58', '2023-01-08 21:11:58'),
(3, 'NT23010003', 2, 'Faris', 1720000, 0, 1720000, 1720000, 0, 0, 2, 0, 'Lunas', '2023-01-08 21:11:58', '2023-01-08 21:11:58'),
(4, 'NT23010004', 1, 'Faris', 1330000, 0, 1330000, 1330000, 0, 0, 2, 0, 'Lunas', '2023-01-09 21:11:58', '2023-01-09 21:11:58'),
(5, 'NT23010005', 2, 'Faris', 7600000, 0, 7600000, 7600000, 0, 0, 2, 0, 'Lunas', '2023-01-12 21:11:58', '2023-01-12 21:11:58'),
(6, 'NT23010006', 3, 'Faris', 10250000, 0, 10250000, 10250000, 0, 0, 2, 0, 'Lunas', '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(7, 'NT23010007', 3, 'Faris', 5970000, 0, 5970000, 0, -5970000, -5970000, 2, 0, 'Piutang', '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(8, 'NT23010008', 4, 'Faris', 8657500, 0, 8657500, 0, -8657500, -8657500, 2, 0, 'Piutang', '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(9, 'NT23010009', 5, 'Faris', 8365000, 0, 8365000, 0, -8365000, -8365000, 2, 0, 'Piutang', '2023-01-30 21:11:58', '2023-01-30 21:11:58'),
(10, 'NT23020001', 8, 'Faris', 186000, 0, 186000, 0, -186000, -186000, 2, 0, 'Piutang', '2023-01-31 21:11:58', '2023-01-31 21:11:58'),
(11, 'NT23020002', 8, 'Faris', 14000, 0, 14000, 14000, 0, 0, 2, 0, 'Lunas', '2023-02-05 21:11:58', '2023-02-05 21:11:58'),
(12, 'NT23020003', 9, 'Faris', 6600000, 0, 6600000, 1500000, -5100000, -5100000, 2, 0, 'Piutang', '2023-02-24 21:11:58', '2023-02-24 21:11:58'),
(13, 'NT23020004', 8, 'Faris', 1750000, 0, 1750000, 1000000, -750000, -750000, 2, 0, 'Piutang', '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(14, 'NT23020005', 8, 'Faris', 1580000, 0, 1580000, 1000000, -580000, -580000, 2, 0, 'Piutang', '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(15, 'NT23020006', 9, 'Faris', 2000000, 0, 2000000, 1000000, -1000000, -1000000, 2, 0, 'Piutang', '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(16, 'NT23020007', 9, 'Faris', 19500000, 0, 19500000, 3000000, -16500000, -16500000, 2, 0, 'Piutang', '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(17, 'NT23020008', 5, 'Faris', 1000000, 0, 1000000, 0, -1000000, -1000000, 2, 0, 'Piutang', '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(18, 'NT23020009', 3, 'Faris', 11250000, 0, 11250000, 11250000, 0, 0, 2, 0, 'Lunas', '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(19, 'NT23020010', 3, 'Faris', 2670000, 0, 2670000, 0, -2670000, -2670000, 2, 0, 'Piutang', '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(20, 'NT23030001', 8, 'Faris', 350000, 0, 350000, 350000, 0, 0, 2, 0, 'Lunas', '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(21, 'NT23030002', 8, 'Faris', 25000, 0, 25000, 25000, 0, 0, 2, 0, 'Lunas', '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(22, 'NT23030003', 8, 'Faris', 30000, 0, 30000, 30000, 0, 0, 2, 0, 'Lunas', '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(23, 'NT23030004', 9, 'Faris', 80000, 0, 80000, 80000, 0, 0, 2, 0, 'Lunas', '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(24, 'NT23030005', 8, 'Faris', 3000000, 0, 3000000, 1500000, -1500000, -1500000, 2, 0, 'Piutang', '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(25, 'NT23030006', 8, 'Faris', 13440000, 0, 13440000, 10000000, -3440000, -3440000, 2, 0, 'Piutang', '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(26, 'NT23030007', 4, 'Faris', 8812500, 0, 8812500, 8812500, 0, 0, 2, 0, 'Lunas', '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(27, 'NT23030008', 9, 'Faris', 7352500, 0, 7352500, 7352500, 0, 0, 2, 0, 'Lunas', '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(28, 'NT23030009', 9, 'Faris', 27526810, 0, 27526810, 27526810, 0, 0, 2, 0, 'Lunas', '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(29, 'NT23030010', 3, 'Faris', 4255000, 0, 4255000, 0, -4255000, 0, 2, 0, 'Lunas (09/11/2024)', '2023-03-30 21:11:58', '2024-11-09 15:43:13'),
(30, 'NT23040001', 8, 'Faris', 1250000, 0, 1250000, 0, -1250000, -1250000, 2, 0, 'Piutang', '2023-03-31 21:11:58', '2023-03-31 21:11:58'),
(31, 'NT23040002', 8, 'Faris', 4000, 0, 4000, 4000, 0, 0, 2, 0, 'Lunas', '2023-04-26 21:11:58', '2023-04-26 21:11:58'),
(32, 'NT23040003', 8, 'Faris', 300000, 0, 300000, 300000, 0, 0, 2, 0, 'Lunas', '2023-04-26 21:11:58', '2023-04-26 21:11:58'),
(33, 'NT23040004', 9, 'Faris', 325000, 127, 315000, 0, -315000, -315000, 2, 0, 'Piutang', '2023-04-27 21:11:58', '2023-04-27 21:11:58'),
(34, 'NT23040005', 9, 'Faris', 13000, 0, 13000, 13000, 0, 0, 2, 0, 'Lunas', '2023-04-28 21:11:58', '2023-04-28 21:11:58'),
(35, 'NT23040006', 9, 'Faris', 5417000, 127, 5414500, 2000000, -3415000, -3415000, 2, 0, 'Piutang', '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(36, 'NT23040007', 9, 'Faris', 35000, 0, 35000, 35000, 0, 0, 2, 0, 'Lunas', '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(37, 'NT23040008', 9, 'Faris', 5005000, 127, 5000000, 1500000, -3500000, -3500000, 2, 0, 'Piutang', '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(38, 'NT23040009', 9, 'Faris', 300000, 0, 300000, 0, -300000, -300000, 2, 0, 'Piutang', '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(39, 'NT23040009', 4, 'Faris', 7290000, 0, 7290000, 0, -7290000, -7290000, 2, 0, 'Piutang', '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(40, 'NT23050001', 8, 'Faris', 840000, 0, 840000, 0, -840000, -840000, 2, 0, 'Piutang', '2023-05-17 21:11:58', '2023-05-17 21:11:58'),
(41, 'NT23050002', 6, 'Faris', 129700000, 0, 129700000, 129700000, 0, 0, 2, 0, 'Lunas', '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(42, 'NT23050003', 6, 'Faris', 12550000, 0, 12550000, 0, -12550000, -12550000, 2, 0, 'Piutang', '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(43, 'NT23050004', 7, 'Faris', 11025000, 127, 11000000, 4000000, -7000000, -7000000, 2, 0, 'Piutang', '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(44, 'NT23050005', 3, 'Faris', 7187500, 0, 7187500, 0, -7187500, -7187500, 2, 0, 'Piutang', '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(45, 'NT23050006', 3, 'Faris', 3312500, 0, 3312500, 0, -3312500, -3312500, 2, 0, 'Piutang', '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(46, 'NT24110001', 11, 'Iqbal', 500000, 200000, 300000, 150000, -150000, 0, 2, 0, 'Lunas (09/11/2024)', '2024-11-09 15:36:32', '2024-11-09 15:40:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id_penjualan_detail` int(10) UNSIGNED NOT NULL,
  `no_nota` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_pesanan` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `ukuran` varchar(255) NOT NULL,
  `ukuran_p` double DEFAULT NULL,
  `ukuran_l` double DEFAULT NULL,
  `is_plong` enum('yes','no') DEFAULT 'no',
  `finishing_plong_qty` int(11) DEFAULT NULL,
  `finishing_plong_harga` int(11) DEFAULT NULL,
  `det_pesanan` varchar(255) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id_penjualan_detail`, `no_nota`, `id_produk`, `nama_pesanan`, `jumlah`, `satuan`, `ukuran`, `ukuran_p`, `ukuran_l`, `is_plong`, `finishing_plong_qty`, `finishing_plong_harga`, `det_pesanan`, `harga`, `sub_total`, `created_at`, `updated_at`) VALUES
(1, 'NT23010001', 2, 'Kartu Merah Tinta Hitam (BMG)', 3000, 'lbr', 'F4', 0, 0, '', 0, 0, '', 175, 525000, '2023-01-02 21:11:58', '2023-01-02 21:11:58'),
(2, 'NT23010001', 2, 'Kartu Kuning Tinta Hitam (BMG)', 2000, 'lbr', 'F4', 0, 0, '', 0, 0, '', 175, 350000, '2023-01-02 21:11:58', '2023-01-02 21:11:58'),
(3, 'NT23010001', 2, 'Kartu Putih Tinta Hijau (BM Prob)', 2000, 'lbr', 'F4', 0, 0, '', 0, 0, '', 175, 350000, '2023-01-02 21:11:58', '2023-01-02 21:11:58'),
(4, 'NT23010001', 2, 'Kartu Kuning Tinta Merah (BM Prob)', 2000, 'lbr', 'F4', 0, 0, '', 0, 0, '', 175, 350000, '2023-01-02 21:11:58', '2023-01-02 21:11:58'),
(5, 'NT23010001', 2, 'Kartu Putih Tinta Hitam (BMG)', 2000, 'lbr', 'F4', 0, 0, '', 0, 0, '', 175, 350000, '2023-01-02 21:11:58', '2023-01-02 21:11:58'),
(6, 'NT23010002', 4, 'Bungkus ABATE', 10000, 'lbr', 'small', 0, 0, '', 0, 0, '', 55, 5500000, '2023-01-08 21:11:58', '2023-01-08 21:11:58'),
(7, 'NT23010003', 4, 'Kalender Dinding', 85, 'lbr', 'A3+', 0, 0, '', 0, 0, '', 16000, 1360000, '2023-01-08 21:11:58', '2023-01-08 21:11:58'),
(8, 'NT23010004', 2, 'Kartu Amnensi', 1000, 'lbr', 'F4', 0, 0, '', 0, 0, '', 350, 350000, '2023-01-09 21:11:58', '2023-01-09 21:11:58'),
(9, 'NT23010004', 4, 'Amplop USG 2D', 1000, 'lbr', 'a5', 0, 0, '', 0, 0, '', 850, 850000, '2023-01-09 21:11:58', '2023-01-09 21:11:58'),
(10, 'NT23010004', 5, 'Surat Rujukan', 20, 'bk', 'F4', 0, 0, '', 0, 0, '', 6500, 130000, '2023-01-09 21:11:58', '2023-01-09 21:11:58'),
(11, 'NT23010005', 4, 'Kalender 2023', 800, 'exp', 'A3+', 0, 0, '', 0, 0, '', 800, 7250, '2023-01-12 21:11:58', '2023-01-12 21:11:58'),
(12, 'NT23010005', 4, 'Brosur', 3, 'rim', 'A4', 0, 0, '', 0, 0, 'Cetak Bolak Balik', 600000, 180000, '2023-01-12 21:11:58', '2023-01-12 21:11:58'),
(13, 'NT23010006', 4, 'Map Rekam Medis', 1000, 'lbr', 'F4', 0, 0, '', 0, 0, '', 4500, 4500000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(14, 'NT23010006', 5, 'Set Ranap Dewasa', 40, 'bdl', 'F4', 0, 0, '', 0, 0, '', 80000, 3200000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(15, 'NT23010006', 5, 'Set Ranap Anak', 10, 'bdl', 'F4', 0, 0, '', 0, 0, '', 80000, 800000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(16, 'NT23010006', 5, 'Resume Rajal Umum', 20, 'bdl', 'F4', 0, 0, '', 0, 0, 'Rangkap 2', 35000, 700000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(17, 'NT23010006', 5, 'Resume Rajal JKN', 20, 'bdl', 'F4', 0, 0, '', 0, 0, 'Rangkap 3', 52500, 1050000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(18, 'NT23010007', 5, 'Blanko RM', 20, 'rim', 'F4', 0, 0, '', 0, 0, '', 90000, 1800000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(19, 'NT23010007', 1, 'X Banner', 1, 'lbr', '1.6m x 0.6m', 1.6, 0.6, 'yes', 3, 1000, '+Tripod', 75000, 75000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(20, 'NT23010007', 1, 'X Banner', 1, 'lbr', '1.6m x 0.6m', 1.6, 0.6, 'yes', 3, 1000, 'No Tripod', 45000, 45000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(21, 'NT23010007', 5, 'Blanko Rajal', 27, 'rim', 'F4', 0, 0, '', 0, 0, 'Bolak Balik', 150000, 4050000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(22, 'NT23010008', 6, 'Les Hijau Lengkap', 1000, 'exp', 'F4', 0, 0, '', 0, 0, '', 6500, 6500000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(23, 'NT23010008', 2, 'Map Coklat', 500, 'exp', 'F4', 0, 0, '', 0, 0, '', 2500, 1250000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(24, 'NT23010008', 4, 'Amplop / Map EKG', 500, 'exp', 'F4', 0, 0, '', 0, 0, '', 500, 250000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(25, 'NT23010008', 4, 'Map CT-Scan', 50, 'lbr', 'A3', 0, 0, '', 0, 0, '', 5500, 275000, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(26, 'NT23010008', 5, 'Resep Obat', 51, 'bdl', 'F4', 0, 0, '', 0, 0, '', 7500, 382500, '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(27, 'NT23010009', 6, 'Billboard', 57, 'pcs', 'custom', 0, 0, '', 0, 0, '', 35000, 1995000, '2023-01-30 21:11:58', '2023-01-30 21:11:58'),
(28, 'NT23020001', 4, 'Print', 31, 'lbr', 'A3+', 0, 0, '', 0, 0, 'Bolak Balik', 6000, 186000, '2023-01-31 21:11:58', '2023-01-31 21:11:58'),
(29, 'NT23020002', 4, 'Print A3', 4, 'lbr', 'A3+', 0, 0, '', 0, 0, '', 3500, 14000, '2023-02-05 21:11:58', '2023-02-05 21:11:58'),
(30, 'NT23020003', 6, 'Majalah PGRI Februari', 1320, 'exp', 'custom', 0, 0, '', 0, 0, '', 5000, 66000, '2023-02-24 21:11:58', '2023-02-24 21:11:58'),
(31, 'NT23020004', 4, 'Undangan', 350, 'lbr', 'Custom', 0, 0, '', 0, 0, '', 5000, 1750, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(32, 'NT23020005', 3, 'Label Faros 1L', 3000, 'lbr', 'custom', 0, 0, '', 0, 0, '', 260, 780000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(33, 'NT23020005', 3, 'Label K99 500ml', 4000, 'lbr', 'custom', 0, 0, '', 0, 0, '', 200, 800000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(34, 'NT23020006', 4, 'Kalender', 500, 'exp', 'a3', 0, 0, '', 0, 0, '', 4000, 2000000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(35, 'NT23020007', 6, 'By. Cetak Letter Tiris', 1, 'set', 'custom', 0, 0, '', 0, 0, '', 7000000, 7000000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(36, 'NT23020007', 6, 'Neon Box Kec Tempeh', 1, 'set', 'custom', 0, 0, '', 0, 0, '', 7000000, 7000000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(37, 'NT23020007', 6, 'Running Text Kec. Tempeh', 1, 'set', 'custom', 0, 0, '', 0, 0, '', 5500000, 5500000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(38, 'NT23020008', 4, 'Brosur', 1000, 'lbr', 'f4', 0, 0, '', 0, 0, '', 1000, 1000000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(39, 'NT23020009', 4, 'Map Rekam Medis', 1000, 'set', 'custom', 0, 0, '', 0, 0, '', 4000, 4000000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(40, 'NT23020009', 6, 'Amplop Radiologi', 1000, 'set', 'custom', 0, 0, '', 0, 0, '', 2000, 2000000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(41, 'NT23020009', 5, 'Blanko Resume RJ Umum', 50, 'bdl', 'f4', 0, 0, '', 0, 0, '', 35000, 1750000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(42, 'NT23020009', 5, 'Blanko Resume RJ JKN', 50, 'bdl', 'f4', 0, 0, '', 0, 0, '', 35000, 1750000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(43, 'NT23020009', 5, 'Blanko Resume Inap Umum', 50, 'bdl', 'f4', 0, 0, '', 0, 0, '', 35000, 1750000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(44, 'NT23020010', 5, 'Blanko Resume Inap JKN', 50, 'bdl', 'f4', 0, 0, '', 0, 0, '', 35000, 1750000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(45, 'NT23020010', 6, 'Papan Ucapan Duka Cita B. Syarajat', 1, 'pcs', 'custom', 0, 0, '', 0, 0, '', 200000, 200000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(46, 'NT23020010', 5, 'Identitas Pasien', 40, 'bk', 'f4', 0, 0, '', 0, 0, '', 18000, 720000, '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(47, 'NT23030001', 2, 'Kartu Kuning Tinta Hitam (BMG)', 2000, 'lbr', 'f4', 0, 0, '', 0, 0, '', 175, 350000, '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(48, 'NT23030002', 4, 'Print A3', 5, 'lbr', 'a3+', 0, 0, '', 0, 0, '', 5000, 25000, '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(49, 'NT23030003', 6, 'Print Stiker', 3, 'lbr', 'a3+', 0, 0, '', 0, 0, '', 10000, 30000, '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(50, 'NT23030004', 2, 'Print Kartu Nama', 8, 'lbr', 'a3+', 0, 0, '', 0, 0, '', 10000, 80000, '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(51, 'NT23030005', 4, 'Tiket Masuk', 300, 'bdl', 'custom', 0, 0, '', 0, 0, '', 10000, 3000000, '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(52, 'NT23030006', 6, 'Ongkos Cetak Blanko', 64000, 'lbr', 'custom', 0, 0, '', 0, 0, '', 210, 13440000, '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(53, 'NT23030007', 6, 'Map Hijau Lengkap', 1000, 'exp', 'custom', 0, 0, '', 0, 0, '', 6500, 6500000, '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(54, 'NT23030007', 2, 'Map Coklat', 500, 'exp', 'custom', 0, 0, '', 0, 0, '', 2500, 1250000, '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(55, 'NT23030007', 5, 'Resep Putih', 50, 'bdl', 'f4', 0, 0, '', 0, 0, '', 7500, 375000, '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(56, 'NT23030007', 5, 'Resep Kuning', 65, 'bdl', 'f4', 0, 0, '', 0, 0, '', 7500, 487500, '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(57, 'NT23030007', 5, 'Lembar Rujukan', 20, 'bdl', 'f4', 0, 0, '', 0, 0, '', 10000, 200000, '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(58, 'NT23030008', 2, 'Piagam Penghargaan', 865, 'lbr', 'a4', 0, 0, '', 0, 0, '', 8500, 7352500, '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(59, 'NT23030009', 6, 'Pengadaan ATK', 1, 'set', 'custom', 0, 0, '', 0, 0, '', 27526810, 27526810, '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(60, 'NT23030010', 5, 'Identitas Bayi', 1, 'rim', 'f4', 0, 0, '', 0, 0, '', 90000, 90000, '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(61, 'NT23030010', 5, 'Observasi Tranfusi Darah', 1, 'rim', 'f4', 0, 0, '', 0, 0, '', 90000, 90000, '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(62, 'NT23030010', 2, 'Map Rekam Medis', 1000, 'rim', 'f4', 0, 0, '', 0, 0, '', 4000, 4000000, '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(63, 'NT23030010', 6, 'X-Banner', 1, 'rim', 'custom', 0, 0, '', 0, 0, '', 75000, 75000, '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(64, 'NT23040001', 6, 'Ongkos Kalender', 500, 'exp', '-', 0, 0, '', 0, 0, '', 2500, 1250000, '2023-04-30 21:11:58', '2023-04-30 21:11:58'),
(65, 'NT23040002', 4, 'Print A3', 1, 'lbr', '-', 0, 0, '', 0, 0, '', 4000, 4000, '2023-04-26 21:11:58', '2023-04-26 21:11:58'),
(66, 'NT23040003', 5, 'Laporan Harian Grade (R3)', 20, 'bk', '-', 0, 0, '', 0, 0, '', 15000, 300000, '2023-04-26 21:11:58', '2023-04-26 21:11:58'),
(67, 'NT23040004', 5, 'Keterangan Sehat', 50, 'bk', '-', 0, 0, '', 0, 0, '', 6500, 325000, '2023-04-27 21:11:58', '2023-04-27 21:11:58'),
(68, 'NT23040005', 6, 'Print Stiker', 2, 'lbt', '-', 0, 0, '', 0, 0, '', 6500, 13000, '2023-04-27 21:11:58', '2023-04-27 21:11:58'),
(69, 'NT23040006', 5, 'Buku Gerbang Mas / Juknis', 985, 'bk', 'f4', 0, 0, '', 0, 0, '', 5500, 5417500, '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(70, 'NT23040007', 5, 'Print A3', 7, 'lbr', 'a3', 0, 0, '', 0, 0, '', 5000, 35000, '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(71, 'NT23040008', 5, 'Tabloid Doreng APRIL', 910, 'exp', 'custom', 0, 0, '', 0, 0, '', 5500, 5005000, '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(72, 'NT23040009', 6, 'Nota PAL Motor', 0, 'rim', 'custom', 0, 0, '', 0, 0, '', 300000, 75000, '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(73, 'NT23040009', 6, 'Nota Sales', 0, 'rim', 'custom', 0, 0, '', 0, 0, '', 300000, 75000, '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(74, 'NT23040009', 6, 'Nota PARP', 1, 'rim', 'custom', 0, 0, '', 0, 0, '', 300000, 150000, '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(75, 'NT23040010', 6, 'Status Rawat Inap Lengkap (Map Hijau)', 840, 'exp', 'custom', 0, 0, '', 0, 0, '', 6500, 5460000, '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(76, 'NT23040010', 6, 'Status Rawat Inap Kosong (Map Coklat)', 250, 'exp', 'custom', 0, 0, '', 0, 0, '', 2500, 625000, '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(77, 'NT23040010', 6, 'Amplop CT Scan', 90, 'lbr', 'custom', 0, 0, '', 0, 0, '', 6500, 585000, '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(78, 'NT23040010', 6, 'Amplop EKG', 500, 'lbr', 'custom', 0, 0, '', 0, 0, '', 600, 300000, '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(79, 'NT23040010', 5, 'Form Permintaan Laboratorium', 20, 'bk', 'custom', 0, 0, '', 0, 0, '', 16000, 320000, '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(80, 'NT23050001', 6, 'Piagam Penghargaan', 20, 'pcs', 'custom', 0, 0, '', 0, 0, '', 42000, 840000, '2023-05-17 21:11:58', '2023-05-17 21:11:58'),
(81, 'NT23050002', 5, 'Buku Lansia', 1950, 'bk', 'custom', 0, 0, '', 0, 0, '', 4250, 8287500, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(82, 'NT23050002', 5, 'Kuesioner', 1000, 'bk', 'custom', 0, 0, '', 0, 0, '', 4750, 4750000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(83, 'NT23050002', 5, 'Buku SD Informasi Raport', 2425, 'bk', 'custom', 0, 0, '', 0, 0, '', 5000, 12125000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(84, 'NT23050002', 5, 'Buku SMP Info Raport', 2425, 'bk', 'custom', 0, 0, '', 0, 0, '', 5500, 13337500, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(85, 'NT23050002', 5, 'Anak Terhebat', 28500, 'bk', 'custom', 0, 0, '', 0, 0, '', 3200, 91200000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(86, 'NT23050003', 4, 'Poster', 1000, 'lbr', 'custom', 0, 0, '', 0, 0, '', 4500, 4500000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(87, 'NT23050003', 4, 'Leaflet', 1500, 'lbr', 'custom', 0, 0, '', 0, 0, '', 1500, 2250000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(88, 'NT23050003', 5, 'PostLembar Baliker', 25, 'bk', 'f4', 0, 0, '', 0, 0, '', 160000, 4000000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(89, 'NT23050003', 5, 'Buku Member Bakor', 200, 'bk', 'custom', 0, 0, '', 0, 0, '', 9000, 1800000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(90, 'NT23050004', 4, 'BTS 2023', 147, 'bk', 'custom', 0, 0, '', 0, 0, '', 75000, 11025000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(91, 'NT2305005', 5, 'Amplop Radiologi', 500, 'lbr', 'custom', 0, 0, '', 0, 0, '', 2000, 1000000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(92, 'NT2305005', 6, 'Map Rekam Medis', 1000, 'lbr', 'custom', 0, 0, '', 0, 0, '', 4000, 4000000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(93, 'NT2305005', 5, 'Resume Rajal Umum ', 15, 'bk', 'f4', 0, 0, '', 0, 0, 'Rangkap 2', 35000, 525000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(94, 'NT2305005', 5, 'Resume Rajal JKN', 15, 'bk', 'f4', 0, 0, '', 0, 0, 'Rangkap 3', 35000, 787000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(95, 'NT2305005', 5, 'Resume Ranap Umum', 25, 'bk', 'f4', 0, 0, '', 0, 0, 'Rangkap 2', 35000, 875000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(96, 'NT2305006', 5, 'Resume Ranap JKN', 25, 'bk', 'f4', 0, 0, '', 0, 0, 'Rangkap 3', 52500, 1312500, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(97, 'NT2305006', 6, 'Amplop Dinas Kabinet', 50, 'pack', 'custom', 0, 0, '', 0, 0, '', 40000, 2000000, '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(98, 'NT24110001', 4, 'Kertas Kado', 100, 'lbr', 'A3', NULL, NULL, NULL, NULL, NULL, '-', 5000, 500000, '2024-11-09 15:36:32', '2024-11-09 15:36:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `nama_perusahaan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `logo_aplikasi` varchar(255) NOT NULL,
  `logo_login` varchar(255) NOT NULL,
  `bg_login` varchar(255) NOT NULL,
  `logo_nota` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `nama_perusahaan`, `alamat`, `telepon`, `logo_aplikasi`, `logo_login`, `bg_login`, `logo_nota`, `created_at`, `updated_at`) VALUES
(1, 'ASAP', 'Jl. Jendral Panjaitan 72 - Lumajang', '085284070404', '/assets/img/brand-icon.png', '/assets/img/logo.png', '/assets/img/bg_login.jpg', '/assets/img/nota-logo.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bkk`
--

CREATE TABLE `tb_bkk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `uraian` varchar(255) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_bkk`
--

INSERT INTO `tb_bkk` (`id`, `id_pembelian`, `id_akun`, `uraian`, `sub_total`, `created_at`, `updated_at`) VALUES
(1, 3, 151, 'PVC Silver 200g', 20000, '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(2, 3, 151, 'PVC Red 200g', 22500, '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(3, 5, 151, 'AP 150g (79x109)', 1183000, '2023-01-07 15:17:16', '2023-01-07 15:17:16'),
(4, 5, 151, 'AP 120g (65x100)', 2574000, '2023-01-07 15:17:16', '2023-01-07 15:17:16'),
(5, 5, 151, 'AP 150g (65x100)', 1610000, '2023-01-07 15:17:16', '2023-01-07 15:17:16'),
(6, 7, 151, 'Plastik Uk 12,5x24', 33750, '2023-01-08 15:17:16', '2023-01-08 15:17:16'),
(7, 8, 151, 'HVS AL F4 70g', 1620000, '2023-01-08 15:17:16', '2023-01-08 15:17:16'),
(8, 9, 151, 'Id Card PVC V-Tech', 275000, '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(9, 9, 152, 'Acco Joyco Putih (Snel)', 375000, '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(10, 9, 151, 'Amplop PPL KAB 90 PPS', 87500, '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(11, 9, 151, 'Amplop Samson B', 90000, '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(12, 9, 151, 'Amplop Samson E', 205000, '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(13, 10, 151, 'Glory 210g', 47000, '2023-01-17 15:17:16', '2023-01-17 15:17:16'),
(14, 12, 151, 'Duplex 250g (79x109)', 342225, '2023-01-28 15:17:16', '2023-01-28 15:17:16'),
(15, 14, 151, 'Stiker HVS', 93600, '2023-01-29 15:17:16', '2023-01-29 15:17:16'),
(16, 16, 152, 'Lakban Hitam Besar', 44000, '2023-02-01 15:17:16', '2023-02-01 15:17:16'),
(17, 17, 151, 'HVS MAXI A4 70g', 167500, '2023-02-04 15:17:16', '2023-02-04 15:17:16'),
(18, 18, 152, 'Lakban Bening Besar', 33000, '2023-02-06 15:17:16', '2023-02-06 15:17:16'),
(19, 18, 152, 'Lakban Coklat Besar', 11000, '2023-02-06 15:17:16', '2023-02-06 15:17:16'),
(20, 19, 151, 'BC Putih Rambow', 33000, '2023-02-07 15:17:16', '2023-02-07 15:17:16'),
(21, 21, 151, 'Stiker HVS', 65000, '2023-02-11 15:17:16', '2023-02-11 15:17:16'),
(22, 22, 152, 'Lakban Bening Besar', 22000, '2023-02-11 15:17:16', '2023-02-11 15:17:16'),
(23, 25, 151, 'Pro Top White', 311500, '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(24, 25, 151, 'Pro Bottom Yellow', 166000, '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(25, 25, 151, 'Pro Bottom Pink', 124500, '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(26, 25, 151, 'NCR Top White', 148500, '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(27, 25, 151, 'NCR Bottom Pink', 91000, '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(28, 25, 151, 'NCR Bottom Yellow', 45500, '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(29, 26, 151, 'Pro Bottom White', 182000, '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(30, 26, 151, 'Pro Bottom Blue', 45500, '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(31, 28, 153, 'Bensin Produksi', 80000, '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(32, 29, 151, 'Pro Top White', 489500, '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(33, 29, 151, 'Pro Middle Yellow', 470000, '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(34, 29, 151, 'Pro Middle Pink', 47000, '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(35, 29, 151, 'Pro Bottom Pink', 207500, '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(36, 29, 151, 'Pro Bottom Yellow', 249000, '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(37, 29, 151, 'HVS MAXI F4 70g', 562500, '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(38, 32, 151, 'HVS 70g F4', 165000, '2023-02-27 15:17:16', '2023-02-27 15:17:16'),
(39, 34, 152, 'Isi Etona 23/8', 144500, '2023-02-28 15:17:16', '2023-02-28 15:17:16'),
(40, 36, 152, 'isolasi Kecil', 8000, '2023-03-09 15:17:16', '2023-03-09 15:17:16'),
(41, 38, 151, 'HVS Warna Kuning 58', 41000, '2023-03-10 15:17:16', '2023-03-10 15:17:16'),
(42, 38, 151, 'HVS Warna Hijau 58', 123000, '2023-03-10 15:17:16', '2023-03-10 15:17:16'),
(43, 38, 151, 'Acco Joyco Putih (Snel)', 150000, '2023-03-10 15:17:16', '2023-03-10 15:17:16'),
(44, 39, 152, 'Acco Joyco Putih (Snel)', 150000, '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(45, 40, 151, 'HVS Warna Hijau 58', 123000, '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(46, 40, 151, 'Mika Bening', 43000, '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(47, 40, 152, 'Double Tape 1/4 (kecil)', 45000, '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(48, 41, 153, 'Minyak Tanah', 150000, '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(49, 42, 153, 'Bensin Produksi', 80000, '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(50, 43, 151, 'Pro Top White', 89000, '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(51, 43, 151, 'Pro Middle White', 94000, '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(52, 43, 151, 'Pro Bottom White', 8300, '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(53, 43, 151, 'Concurt Krem', 378000, '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(54, 44, 151, 'Glory 210g', 47000, '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(55, 44, 151, 'Stiker Bontax Camel', 72500, '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(56, 44, 151, 'Stiker HVS', 104000, '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(57, 46, 151, 'HVS MAXI F4 70g', 36500, '2023-03-28 15:17:16', '2023-03-28 15:17:16'),
(58, 47, 151, 'Stiker Bontax Camel', 58000, '2023-03-28 15:17:16', '2023-03-28 15:17:16'),
(59, 50, 153, 'Minyak Tanah', 150000, '2023-03-31 15:17:16', '2023-03-31 15:17:16'),
(60, 54, 151, 'HVS Warna Kuning 58', 287000, '2023-04-06 15:17:16', '2023-04-06 15:17:16'),
(61, 54, 151, 'HVS Warna Merah 58', 123000, '2023-04-06 15:17:16', '2023-04-06 15:17:16'),
(62, 55, 151, 'BC Putih Rambow', 160000, '2023-04-15 15:17:16', '2023-04-15 15:17:16'),
(63, 57, 153, 'Bensin Produksi', 76500, '2023-04-16 15:17:16', '2023-04-16 15:17:16'),
(64, 58, 151, 'Stiker HVS', 156000, '2023-04-16 15:17:16', '2023-04-16 15:17:16'),
(65, 59, 153, 'Bensin Produksi', 76500, '2023-04-30 15:17:16', '2023-04-30 15:17:16'),
(66, 60, 151, 'Top White Pro', 88000, '2023-04-30 15:17:16', '2023-04-30 15:17:16'),
(67, 61, 151, 'Triplex Board 210g', 32500, '2023-05-02 15:17:16', '2023-05-02 15:17:16'),
(68, 65, 152, 'Isi Staples Etona 23/6', 60000, '2023-05-15 15:17:16', '2023-05-15 15:17:16'),
(69, 67, 153, 'Bensin Produksi', 76500, '2023-05-16 15:17:16', '2023-05-16 15:17:16'),
(70, 69, 152, 'Dobel Tape Pajero 12mm (Sedang)', 13800, '2023-05-16 15:17:16', '2023-05-16 15:17:16'),
(71, 70, 153, 'Minyak Tanah', 150000, '2023-05-18 15:17:16', '2023-05-18 15:17:16'),
(72, 3, 151, 'PVC Silver 200g', 20000, '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(73, 3, 151, 'PVC Red 200g', 22500, '2023-01-03 15:17:16', '2023-01-03 15:17:16'),
(74, 5, 151, 'AP 150g (79x109)', 1183000, '2023-01-07 15:17:16', '2023-01-07 15:17:16'),
(75, 5, 151, 'AP 120g (65x100)', 2574000, '2023-01-07 15:17:16', '2023-01-07 15:17:16'),
(76, 5, 151, 'AP 150g (65x100)', 1610000, '2023-01-07 15:17:16', '2023-01-07 15:17:16'),
(77, 7, 151, 'Plastik Uk 12,5x24', 33750, '2023-01-08 15:17:16', '2023-01-08 15:17:16'),
(78, 8, 151, 'HVS AL F4 70g', 1620000, '2023-01-08 15:17:16', '2023-01-08 15:17:16'),
(79, 9, 151, 'Id Card PVC V-Tech', 275000, '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(80, 9, 152, 'Acco Joyco Putih (Snel)', 375000, '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(81, 9, 151, 'Amplop PPL KAB 90 PPS', 87500, '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(82, 9, 151, 'Amplop Samson B', 90000, '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(83, 9, 151, 'Amplop Samson E', 205000, '2023-01-16 15:17:16', '2023-01-16 15:17:16'),
(84, 10, 151, 'Glory 210g', 47000, '2023-01-17 15:17:16', '2023-01-17 15:17:16'),
(85, 12, 151, 'Duplex 250g (79x109)', 342225, '2023-01-28 15:17:16', '2023-01-28 15:17:16'),
(86, 14, 151, 'Stiker HVS', 93600, '2023-01-29 15:17:16', '2023-01-29 15:17:16'),
(87, 16, 152, 'Lakban Hitam Besar', 44000, '2023-02-01 15:17:16', '2023-02-01 15:17:16'),
(88, 17, 151, 'HVS MAXI A4 70g', 167500, '2023-02-04 15:17:16', '2023-02-04 15:17:16'),
(89, 18, 152, 'Lakban Bening Besar', 33000, '2023-02-06 15:17:16', '2023-02-06 15:17:16'),
(90, 18, 152, 'Lakban Coklat Besar', 11000, '2023-02-06 15:17:16', '2023-02-06 15:17:16'),
(91, 19, 151, 'BC Putih Rambow', 33000, '2023-02-07 15:17:16', '2023-02-07 15:17:16'),
(92, 21, 151, 'Stiker HVS', 65000, '2023-02-11 15:17:16', '2023-02-11 15:17:16'),
(93, 22, 152, 'Lakban Bening Besar', 22000, '2023-02-11 15:17:16', '2023-02-11 15:17:16'),
(94, 25, 151, 'Pro Top White', 311500, '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(95, 25, 151, 'Pro Bottom Yellow', 166000, '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(96, 25, 151, 'Pro Bottom Pink', 124500, '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(97, 25, 151, 'NCR Top White', 148500, '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(98, 25, 151, 'NCR Bottom Pink', 91000, '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(99, 25, 151, 'NCR Bottom Yellow', 45500, '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(100, 26, 151, 'Pro Bottom White', 182000, '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(101, 26, 151, 'Pro Bottom Blue', 45500, '2023-02-15 15:17:16', '2023-02-15 15:17:16'),
(102, 28, 153, 'Bensin Produksi', 80000, '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(103, 29, 151, 'Pro Top White', 489500, '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(104, 29, 151, 'Pro Middle Yellow', 470000, '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(105, 29, 151, 'Pro Middle Pink', 47000, '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(106, 29, 151, 'Pro Bottom Pink', 207500, '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(107, 29, 151, 'Pro Bottom Yellow', 249000, '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(108, 29, 151, 'HVS MAXI F4 70g', 562500, '2023-02-17 15:17:16', '2023-02-17 15:17:16'),
(109, 32, 151, 'HVS 70g F4', 165000, '2023-02-27 15:17:16', '2023-02-27 15:17:16'),
(110, 34, 152, 'Isi Etona 23/8', 144500, '2023-02-28 15:17:16', '2023-02-28 15:17:16'),
(111, 36, 152, 'isolasi Kecil', 8000, '2023-03-09 15:17:16', '2023-03-09 15:17:16'),
(112, 38, 151, 'HVS Warna Kuning 58', 41000, '2023-03-10 15:17:16', '2023-03-10 15:17:16'),
(113, 38, 151, 'HVS Warna Hijau 58', 123000, '2023-03-10 15:17:16', '2023-03-10 15:17:16'),
(114, 38, 151, 'Acco Joyco Putih (Snel)', 150000, '2023-03-10 15:17:16', '2023-03-10 15:17:16'),
(115, 39, 152, 'Acco Joyco Putih (Snel)', 150000, '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(116, 40, 151, 'HVS Warna Hijau 58', 123000, '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(117, 40, 151, 'Mika Bening', 43000, '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(118, 40, 152, 'Double Tape 1/4 (kecil)', 45000, '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(119, 41, 153, 'Minyak Tanah', 150000, '2023-03-17 15:17:16', '2023-03-17 15:17:16'),
(120, 42, 153, 'Bensin Produksi', 80000, '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(121, 43, 151, 'Pro Top White', 89000, '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(122, 43, 151, 'Pro Middle White', 94000, '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(123, 43, 151, 'Pro Bottom White', 8300, '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(124, 43, 151, 'Concurt Krem', 378000, '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(125, 44, 151, 'Glory 210g', 47000, '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(126, 44, 151, 'Stiker Bontax Camel', 72500, '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(127, 44, 151, 'Stiker HVS', 104000, '2023-03-18 15:17:16', '2023-03-18 15:17:16'),
(128, 46, 151, 'HVS MAXI F4 70g', 36500, '2023-03-28 15:17:16', '2023-03-28 15:17:16'),
(129, 47, 151, 'Stiker Bontax Camel', 58000, '2023-03-28 15:17:16', '2023-03-28 15:17:16'),
(130, 50, 153, 'Minyak Tanah', 150000, '2023-03-31 15:17:16', '2023-03-31 15:17:16'),
(131, 54, 151, 'HVS Warna Kuning 58', 287000, '2023-04-06 15:17:16', '2023-04-06 15:17:16'),
(132, 54, 151, 'HVS Warna Merah 58', 123000, '2023-04-06 15:17:16', '2023-04-06 15:17:16'),
(133, 55, 151, 'BC Putih Rambow', 160000, '2023-04-15 15:17:16', '2023-04-15 15:17:16'),
(134, 57, 153, 'Bensin Produksi', 76500, '2023-04-16 15:17:16', '2023-04-16 15:17:16'),
(135, 58, 151, 'Stiker HVS', 156000, '2023-04-16 15:17:16', '2023-04-16 15:17:16'),
(136, 59, 153, 'Bensin Produksi', 76500, '2023-04-30 15:17:16', '2023-04-30 15:17:16'),
(137, 60, 151, 'Top White Pro', 88000, '2023-04-30 15:17:16', '2023-04-30 15:17:16'),
(138, 61, 151, 'Triplex Board 210g', 32500, '2023-05-02 15:17:16', '2023-05-02 15:17:16'),
(139, 65, 152, 'Isi Staples Etona 23/6', 60000, '2023-05-15 15:17:16', '2023-05-15 15:17:16'),
(140, 67, 153, 'Bensin Produksi', 76500, '2023-05-16 15:17:16', '2023-05-16 15:17:16'),
(141, 69, 152, 'Dobel Tape Pajero 12mm (Sedang)', 13800, '2023-05-16 15:17:16', '2023-05-16 15:17:16'),
(142, 70, 153, 'Minyak Tanah', 150000, '2023-05-18 15:17:16', '2023-05-18 15:17:16'),
(143, 52, 151, 'New Cahaya Pro Yellow', 614800, '2024-11-09 15:43:48', '2024-11-09 15:43:48'),
(144, 52, 151, 'New Cahaya Pro Magenta', 663300, '2024-11-09 15:43:48', '2024-11-09 15:43:48'),
(145, 52, 151, 'New Cahaya Pro Cyan', 702900, '2024-11-09 15:43:48', '2024-11-09 15:43:48'),
(146, 52, 151, 'New Cahaya Pro Back', 574200, '2024-11-09 15:43:48', '2024-11-09 15:43:48'),
(147, 52, 151, 'Best One Pro Yellow', 277200, '2024-11-09 15:43:48', '2024-11-09 15:43:48'),
(148, 52, 151, 'Best One Pro Magenta', 293700, '2024-11-09 15:43:48', '2024-11-09 15:43:48'),
(149, 73, 151, 'Lem Rajawali', 138000, '2024-11-09 15:45:38', '2024-11-09 15:45:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bkm`
--

CREATE TABLE `tb_bkm` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_penjualan` int(11) DEFAULT NULL,
  `id_kas_masuk` int(11) DEFAULT NULL,
  `id_akun` int(11) NOT NULL,
  `uraian` varchar(255) NOT NULL,
  `debet` int(11) NOT NULL,
  `opsi_pembayaran` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_bkm`
--

INSERT INTO `tb_bkm` (`id`, `id_penjualan`, `id_kas_masuk`, `id_akun`, `uraian`, `debet`, `opsi_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 250, 'Firdan', 1925000, 'tunai', '2023-01-02 21:11:58', '2023-01-02 21:11:58'),
(2, 2, NULL, 401, 'Mahendra', 1500000, 'tunai', '2023-01-08 21:11:58', '2023-01-08 21:11:58'),
(3, 3, NULL, 250, 'SMK Muhammadiyah', 1720000, 'tunai', '2023-01-08 21:11:58', '2023-01-08 21:11:58'),
(4, 4, NULL, 250, 'Klinik Edifuz', 1330000, 'tunai', '2023-01-09 21:11:58', '2023-01-09 21:11:58'),
(5, 5, NULL, 250, 'SMK Muhammadiyah', 7600000, 'tunai', '2023-01-12 21:11:58', '2023-01-12 21:11:58'),
(6, 6, NULL, 250, 'RSUD Pasirian', 10250000, 'tunai', '2023-01-27 21:11:58', '2023-01-27 21:11:58'),
(7, 11, NULL, 250, 'Firdan', 14000, 'tunai', '2023-02-05 21:11:58', '2023-02-05 21:11:58'),
(8, 12, NULL, 401, 'Mahendra', 1500000, 'tunai', '2023-02-24 21:11:58', '2023-02-24 21:11:58'),
(9, 13, NULL, 401, 'Firdan', 1000000, 'tunai', '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(10, 14, NULL, 401, 'Firdan', 1000000, 'tunai', '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(11, 15, NULL, 401, 'Mahendra', 1000000, 'tunai', '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(12, 16, NULL, 401, 'Mahendra', 3000000, 'tunai', '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(13, 18, NULL, 250, 'RSUD Pasirian', 11250000, 'tunai', '2023-02-28 21:11:58', '2023-02-28 21:11:58'),
(14, 20, NULL, 250, 'Firdan', 350000, 'tunai', '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(15, 21, NULL, 250, 'Firdan', 25000, 'tunai', '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(16, 22, NULL, 250, 'Firdan', 30000, 'tunai', '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(17, 23, NULL, 250, 'Mahendra', 80000, 'tunai', '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(18, 24, NULL, 401, 'Firdan', 1500000, 'tunai', '2023-03-02 21:11:58', '2023-03-02 21:11:58'),
(19, 25, NULL, 401, 'Firdan', 10000000, 'tunai', '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(20, 26, NULL, 250, 'RS. Bhayangkara', 8812500, 'tunai', '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(21, 27, NULL, 250, 'Mahendra', 7352500, 'tunai', '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(22, 28, NULL, 250, 'Mahendra', 27526810, 'tunai', '2023-03-30 21:11:58', '2023-03-30 21:11:58'),
(23, 31, NULL, 250, 'Firdan', 4000, 'tunai', '2023-04-26 21:11:58', '2023-04-26 21:11:58'),
(24, 32, NULL, 250, 'Firdan', 300000, 'tunai', '2023-04-26 21:11:58', '2023-04-26 21:11:58'),
(25, 34, NULL, 250, 'Mahendra', 13000, 'tunai', '2023-04-28 21:11:58', '2023-04-28 21:11:58'),
(26, 35, NULL, 401, 'Mahendra', 2000000, 'tunai', '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(27, 36, NULL, 250, 'Mahendra', 35000, 'tunai', '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(28, 37, NULL, 401, 'Mahendra', 1500000, 'tunai', '2023-04-29 21:11:58', '2023-04-29 21:11:58'),
(29, 41, NULL, 250, 'Dinas Kesehatan Lumajang', 129700000, 'tunai', '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(30, 43, NULL, 401, 'SMK Negeri 1 Lumajang', 4000000, 'tunai', '2023-05-29 21:11:58', '2023-05-29 21:11:58'),
(31, 46, NULL, 401, 'Dewi', 150000, 'BCA', '2024-11-09 15:36:32', '2024-11-09 15:36:32'),
(32, 46, NULL, 122, 'Dewi', 80000, 'tunai', '2024-11-09 15:37:30', '2024-11-09 15:37:30'),
(33, 46, NULL, 122, 'Dewi', 70000, 'BCA', '2024-11-09 15:40:15', '2024-11-09 15:40:15'),
(34, 29, NULL, 122, 'RSUD Pasirian', 4255000, 'tunai', '2024-11-09 15:43:13', '2024-11-09 15:43:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_cart`
--

CREATE TABLE `transaction_cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_nota` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_pesanan` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `ukuran` varchar(255) NOT NULL,
  `ukuran_p` double DEFAULT NULL,
  `ukuran_l` double DEFAULT NULL,
  `is_plong` enum('yes','no') DEFAULT 'no',
  `finishing_plong_qty` int(11) DEFAULT NULL,
  `finishing_plong_harga` int(11) DEFAULT NULL,
  `det_pesanan` varchar(255) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `levels` varchar(255) NOT NULL DEFAULT 'Admin',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `levels`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Firdan Mahendra', '', 'owner', '$2y$10$IYxQFeRU7.4KPfWmN52ud.M8qqoozGLCpacImSXzsljtyPTK.TBgS', 'Owner', NULL, '2024-10-14 17:37:24', '2024-10-14 17:37:24'),
(2, 'Novi', '', 'admin', '$2y$10$9ND1CZJ10oYqxpaIUvGUXOQX3AzZH2Nro6s3ZGBEy6G70qcDALXL2', 'Admin', NULL, '2024-10-14 17:37:24', '2024-10-14 17:37:24');

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
  ADD UNIQUE KEY `mst_kode_akun_id_unique` (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT untuk tabel `mst_customer`
--
ALTER TABLE `mst_customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `mst_opsi_pembayaran`
--
ALTER TABLE `mst_opsi_pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mst_produk`
--
ALTER TABLE `mst_produk`
  MODIFY `id_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `mst_supplier`
--
ALTER TABLE `mst_supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id_penjualan_detail` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT untuk tabel `tb_bkm`
--
ALTER TABLE `tb_bkm`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `transaction_cart`
--
ALTER TABLE `transaction_cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
