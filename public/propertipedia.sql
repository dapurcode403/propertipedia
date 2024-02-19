-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2024 at 03:45 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `propertipedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', 'e90317b1cb44f0990239658f48351f0e98c5d642c6cccd2c53213e8d9b70d5f3525f040d5b3339ccc8b4e4927754ccd62636257edf16bf5bdae34ee46c2afc2086', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_developer`
--

CREATE TABLE `tbl_developer` (
  `id` int(11) NOT NULL,
  `nama_dev` varchar(255) NOT NULL,
  `alamat_dev` varchar(255) NOT NULL,
  `no_telp_dev` varchar(20) NOT NULL,
  `status_dev` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_developer`
--

INSERT INTO `tbl_developer` (`id`, `nama_dev`, `alamat_dev`, `no_telp_dev`, `status_dev`, `created_at`, `updated_at`) VALUES
(1, 'fadsf', 'hhgfg', '4523', 1, '2024-02-09 22:39:21', '2024-02-09 22:39:21'),
(10, 'fdsaf', 'ghfdsgdh', 'ghfgd', 1, '2024-02-09 23:35:27', '2024-02-09 23:35:27'),
(11, 'pt anu', 'Purwoket', '123456', 1, '2024-02-09 23:35:32', '2024-02-09 23:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konsumen`
--

CREATE TABLE `tbl_konsumen` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `ins_by` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_konsumen`
--

INSERT INTO `tbl_konsumen` (`id`, `nama`, `alamat`, `no_telp`, `keterangan`, `ins_by`, `status`, `created_at`, `updated_at`) VALUES
(2, 'fathu', 'ajibarang', '098797676', 'ingin beli rumah', 1, 1, '2024-02-13 23:26:22', '2024-02-13 23:26:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perumahan`
--

CREATE TABLE `tbl_perumahan` (
  `id` int(11) NOT NULL,
  `id_dev` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_perumahan`
--

INSERT INTO `tbl_perumahan` (`id`, `id_dev`, `nama`, `alamat`, `no_telp`, `latitude`, `longitude`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'GRAHA SATRIA UTAMA', 'G7W6+QFQ, Karangrau, Kabupaten Banyumas, 53181', '', '-7.4530962', '109.261142', 1, '2023-09-13 10:23:54', '2024-02-11 10:26:17'),
(2, 0, 'GRIYA SATRIA CLUSTER SUMAMPIR', 'Purwokerto, Bancarkembar, Kabupaten Banyumas, 53121', '', '-7.404263', '109.2417299', 1, '2023-09-13 10:23:54', '2024-02-11 10:26:17'),
(3, 0, 'PINTU MASUK GRIYA SATRIA PESONA SUMAMPIR', 'Jl. Riyanto No.11, Sumampir, Kabupaten Banyumas, 53125', '', '-7.3995632', '109.2381405', 1, '2023-09-13 10:23:54', '2024-02-11 10:26:17'),
(4, 0, 'GRIYA SATRIA PESONA SUMAMPIR TAHAP 1', 'Perum Griya Satria Pesona Sumampir Blok 1 no 5, Sumampir, Kabupaten Banyumas, 53125', '', '-7.3983643', '109.2380958', 1, '2023-09-13 10:23:54', '2024-02-11 10:26:17'),
(5, 0, 'GRIYA SATRIA PESONA SUMAMPIR TAHAP 2', 'Gg. Sidaluhur No.60, Sumampir, Kabupaten Banyumas, 53125', '', '-7.39668', '109.2381967', 1, '2023-09-13 10:23:54', '2024-02-11 10:26:17'),
(6, 0, 'GRIYA SATRIA BUKIT NIRWANA TAHAP 2', 'Jl. Raya Gn. Tugel No.14, Karangklesem, Kabupaten Banyumas, 53144', '', '-7.4623482', '109.2370268', 1, '2023-09-13 10:23:54', '2024-02-11 10:26:17'),
(7, 0, 'RUKO AJIBARANG', 'H3RF+8CJ, Ajibarang Kulon, Kabupaten Banyumas, 53163', '', '-7.4090254', '109.073742', 1, '2023-09-13 10:23:54', '2024-02-11 10:26:17'),
(8, 0, 'KUMALA RESIDENCE', 'G6PX+95V, Teluk, Kabupaten Banyumas, 53145', '', '-7.4638963', '109.2479989', 1, '2023-09-13 10:23:54', '2024-02-11 10:26:17'),
(9, 0, 'WIRADADI RESIDENCE', 'G7M5+RJ5, Wiradadi, Kabupaten Banyumas, 53181', '', '-7.4655333', '109.2590464', 1, '2023-09-13 10:23:54', '2024-02-11 10:26:17'),
(10, 0, 'GRIYA SATRIA GRAND KALIORI HILLS', 'G75X+5P7, Kaliori, Kabupaten Banyumas, 53191', '', '-7.4922916', '109.2990044', 1, '2023-09-13 10:23:54', '2024-02-11 10:26:17'),
(11, 0, 'GRIYA SATRIA BUKIT PERMATA BLOK A', 'Griya Satria Bukit Permata, Karangpucung, Kabupaten Banyumas, 53171', '', '-7.4537274', '109.2316457', 1, '2023-09-13 10:23:54', '2024-02-11 10:26:17'),
(12, 0, 'GRIYA SATRIA BUKIT PERMATA BLOK 1', 'G6VJ+J9F, Sidabowa, Kabupaten Banyumas, 53171', '', '-7.4558204', '109.2309563', 1, '2023-09-13 10:23:54', '2024-02-11 10:26:17'),
(13, 0, 'GRIYA SATRIA BUKIT PERMATA BLOK 14', 'G6VJ+35W, Sidabowa, Kabupaten Banyumas, 53171', '', '-7.4572992', '109.2305444', 1, '2023-09-13 10:23:54', '2024-02-11 10:26:17'),
(14, 0, 'KINTAMANI CLUSTER', 'Jl. Kenanga No.63, Sumampir, Kabupaten Banyumas, 53125', '', '-7.39527', '109.2368286', 1, '2023-09-13 10:23:54', '2024-02-11 10:26:17'),
(15, 0, 'GRIYA SATRIA MANDALATAMA DEPAN LAMA', 'Blk. 29 No.12, Karanglewas Lor, Kabupaten Banyumas, 53161', '', '-7.4283796', '109.2099686', 1, '2023-09-13 10:23:54', '2024-02-11 10:26:17'),
(16, 0, 'GRIYA SATRIA MANDALATAMA BELAKANG LAMA', 'Gg. Manyar Blok 42 No.1, Karanglewas Lor, Kabupaten Banyumas, 53161', '', '-7.4251503', '109.2070638', 1, '2023-09-13 10:23:54', '2024-02-11 10:26:17'),
(17, 0, 'GRIYA SATRIA MANDALATAMA CLUSTER 1', 'Perumahan Griya Satria Mandalatama, Karanglewas Kidul, Kabupaten Banyumas, 53137', '', '-7.4283534', '109.2104915', 1, '2023-09-13 10:23:54', '2024-02-11 10:26:17'),
(18, 0, 'GRIYA SATRIA MANDALATAMA CLUSTER 2', 'Blk. I No.28, Karanglewas Kidul, Kabupaten Banyumas, 53161', '', '-7.4318356', '109.2104362', 1, '2023-09-13 10:23:54', '2024-02-11 10:26:17'),
(19, 0, 'GRIYA SATRIA MANDALATAMA CLUSTER 3', 'H6C5+JJV, Karanglewas Kidul, Kabupaten Banyumas, 53161', '', '-7.4284243', '109.2089841', 1, '2023-09-13 10:23:54', '2024-02-11 10:26:17'),
(20, 0, 'GRIYA SATRIA MANDALATAMA CLUSTER 4', 'H6F4+HQH, Karanglewas Lor, Kabupaten Banyumas, 53161', '', '-7.4259568', '109.206914', 1, '2023-09-13 10:23:54', '2024-02-11 10:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `role` varchar(100) NOT NULL,
  `access_root` varchar(20) NOT NULL DEFAULT 'prptpda',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `username`, `email`, `password`, `status`, `role`, `access_root`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', '$2y$10$OHfrLCCFIxA4rDZjt3GiZuR3PmgwIPeZRBRugdmkxtyip/2WUAX1u', 1, 'administrator', 'prptpda', '2023-12-08 21:57:14', '2024-02-14 00:08:55'),
(2, 'marketing', 'budi marketing', 'marketing@gmail.com', '$2y$10$Af8W/4rWkKA4RWdUBP9Q9euFLb4RQ3qZPWL9C9cNSiCCkEaEwE6bW', 1, 'marketing', 'prptpda', '2024-02-13 21:21:33', '2024-02-13 21:21:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_developer`
--
ALTER TABLE `tbl_developer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_konsumen`
--
ALTER TABLE `tbl_konsumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_perumahan`
--
ALTER TABLE `tbl_perumahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_developer`
--
ALTER TABLE `tbl_developer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_konsumen`
--
ALTER TABLE `tbl_konsumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_perumahan`
--
ALTER TABLE `tbl_perumahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
