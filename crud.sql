@@ -0,0 +1,100 @@
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 07:14 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `kamar_kos`
--

CREATE TABLE `kamar_kos` (
  `id_kamar` int(12) NOT NULL,
  `tipe_kamar` varchar(50) NOT NULL,
  `fasilitas_kamar` varchar(50) NOT NULL,
  `sistem_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kamar_kos`
--

INSERT INTO `kamar_kos` (`id_kamar`, `tipe_kamar`, `fasilitas_kamar`, `sistem_pembayaran`) VALUES
(1, 'vvip', 'MEWAH', 'tunai'),
(2, 'vvip', 'Normal', 'Kredit'),
(3, 'VVIP', 'MEWAH', 'tunai'),
(4, 'Normal', 'Normal', 'tunai'),
(5, 'vvip', 'MEWAH', 'tunai');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik_kos`
--

CREATE TABLE `pemilik_kos` (
  `id_pemilik` int(12) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `alamat_kos` varchar(50) NOT NULL,
  `biaya_sewa` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penyewa_kos`
--

CREATE TABLE `penyewa_kos` (
  `id_penyewa` int(12) NOT NULL,
  `nama_penyewa` varchar(50) NOT NULL,
  `ktp` varchar(50) NOT NULL,
  `kesanggupan_membayar` int(50) NOT NULL,
  `peraturan_kos` varchar(59) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kamar_kos`
--
ALTER TABLE `kamar_kos`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `pemilik_kos`
--
ALTER TABLE `pemilik_kos`
  ADD PRIMARY KEY (`id_pemilik`);

--
-- Indexes for table `penyewa_kos`
--
ALTER TABLE `penyewa_kos`
  ADD PRIMARY KEY (`id_penyewa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;