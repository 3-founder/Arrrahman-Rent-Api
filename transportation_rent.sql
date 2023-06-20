-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 18, 2023 at 07:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transportation_rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` bigint(20) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama_company` varchar(100) NOT NULL,
  `logo` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `kota`, `alamat`, `no_hp`, `email`, `nama_company`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Surabaya', 'Wisma Kedung Asem Indah Blok C No 13 RT 002 RW 005', '85234543411', 'suhulgroup@gmail.com', 'PT Suhul Mabrouk Arrahmah', 'company-logo/Ky2R3CQGTVcj54P5Sb88EpGwRmAprw9vvBd7pPQy.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) NOT NULL,
  `kutipan_sewa` varchar(50) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `nama_jalan` varchar(150) NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `no_hp` varchar(17) NOT NULL,
  `tanggal` date NOT NULL,
  `no_quotation` varchar(9) NOT NULL,
  `komentar` varchar(100) DEFAULT NULL,
  `total_harga` varchar(12) DEFAULT NULL,
  `id_user` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `kutipan_sewa`, `nama_customer`, `email`, `nama_perusahaan`, `kota`, `nama_jalan`, `kode_pos`, `no_hp`, `tanggal`, `no_quotation`, `komentar`, `total_harga`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'rental kendaraan', 'Ibis', 'karina.purwiyono@contracted.sampoerna.com', 'PT Jaya', 'Malang', 'Jl. Rungkut Industri Raya No.18', '68211', '62318431699', '2023-02-01', '110230103', NULL, NULL, 1, NULL, NULL),
(2, 'Sewa Kendaraan', 'Ibu Maria', 'mariana@gmail.com', 'CV Nur Cahaya', 'Malang', 'Jln. Malang Karaya', '67098', '628523456798', '2023-06-18', '123456987', NULL, NULL, 1, NULL, NULL),
(3, 'rental kendaraan', 'Ibis', 'karina.purwiyono@contracted.sampoerna.com', 'PT Jaya', 'Malang', 'Jl. Rungkut Industri Raya No.18', '68211', '62318431699', '2023-02-01', '110230103', NULL, NULL, 1, NULL, NULL),
(4, 'Sewa Kendaraan', 'Fasha', 'Fasha@gmail.com', 'PT TULUNG J', 'Bekasi', 'Jln. Bekasi No22', '75234', '628523409876', '2023-06-18', '298372138', NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` bigint(20) NOT NULL,
  `id_customer` bigint(20) NOT NULL,
  `tanda_penerima_pembayaran` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `periode_pembayaran` varchar(50) NOT NULL,
  `metode_pembayaran` varchar(20) NOT NULL,
  `nama_bank` varchar(20) DEFAULT NULL,
  `no_rekening` varchar(10) DEFAULT NULL,
  `a_n_rekening` varchar(40) DEFAULT NULL,
  `nama_tanda_tangan` varchar(40) NOT NULL,
  `img_tanda_tangan` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `id_customer`, `tanda_penerima_pembayaran`, `keterangan`, `periode_pembayaran`, `metode_pembayaran`, `nama_bank`, `no_rekening`, `a_n_rekening`, `nama_tanda_tangan`, `img_tanda_tangan`, `created_at`, `updated_at`) VALUES
(1, 4, 'Pembayaran Lunas', 'Sewa 2 Unit kendaraan roda 4', 'Bulan Januari 2024', 'transfer', 'BCA', '0912039884', 'Bagas saputra', 'Abdurrahman', 'ttd-invoce/7LVpXmzoOwk9Jk5vyZ7osYR7UQH4PeZZM4ShA1Qp.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_06_12_021953_create_table_company', 1),
(3, '2023_06_12_022843_create_table_users', 1),
(4, '2023_06_12_023001_create_table_customer', 1),
(5, '2023_06_12_023022_create_table_transportation', 1),
(6, '2023_06_18_101817_create_table_invoice', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transportation`
--

CREATE TABLE `transportation` (
  `id` bigint(20) NOT NULL,
  `id_customer` bigint(20) NOT NULL,
  `tanggal_penggunaan` date NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `lama_penggunaan` varchar(30) NOT NULL,
  `tipe_mobil` varchar(100) NOT NULL,
  `jumlah` varchar(3) NOT NULL,
  `harga` varchar(12) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transportation`
--

INSERT INTO `transportation` (`id`, `id_customer`, `tanggal_penggunaan`, `tujuan`, `lama_penggunaan`, `tipe_mobil`, `jumlah`, `harga`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-02-01', 'Pemakaian Luar kota', '19 jam', 'Alphard', '1', '3200000', NULL, NULL),
(2, 2, '2023-06-24', 'Surabaya', '24 jam', 'Alphad', '1', '10000000', NULL, NULL),
(3, 4, '2023-06-20', 'Malang', '24 jam', 'Alphad', '1', '15000000', NULL, NULL),
(4, 4, '2023-06-21', 'Surabaya', '24 jam', 'Ciciv Type R', '1', '12000000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tanda_tangan` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `tanda_tangan`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Rhomaedi', 'YFP7GMZm9wR1DA0oUDodPyUbeYmUYXOy.png', '2023-06-18 03:39:03', '2023-06-18 03:39:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `transportation`
--
ALTER TABLE `transportation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transportation`
--
ALTER TABLE `transportation`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`);

--
-- Constraints for table `transportation`
--
ALTER TABLE `transportation`
  ADD CONSTRAINT `transportation_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
