-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 11:18 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `junditest`
--

-- --------------------------------------------------------

--
-- Table structure for table `setting_tarif`
--

CREATE TABLE `setting_tarif` (
  `id` int(11) NOT NULL,
  `jenis_kendaraan` varchar(55) NOT NULL,
  `tarif` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting_tarif`
--

INSERT INTO `setting_tarif` (`id`, `jenis_kendaraan`, `tarif`) VALUES
(1, 'Mobil', 3000),
(7, 'Motor', 4000),
(9, 'BUS', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_parkir`
--

CREATE TABLE `transaksi_parkir` (
  `id` int(11) NOT NULL,
  `kode_parkir` varchar(55) NOT NULL,
  `no_polisi` varchar(55) NOT NULL,
  `jenis_kendaraan` varchar(55) NOT NULL,
  `waktu_masuk` varchar(55) NOT NULL,
  `waktu_keluar` varchar(55) DEFAULT NULL,
  `tanggal_parkir` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 = masuk\r\n0 = keluar',
  `biaya` int(6) DEFAULT NULL,
  `pegawai` varchar(55) DEFAULT NULL,
  `lama_parkir` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_parkir`
--

INSERT INTO `transaksi_parkir` (`id`, `kode_parkir`, `no_polisi`, `jenis_kendaraan`, `waktu_masuk`, `waktu_keluar`, `tanggal_parkir`, `status`, `biaya`, `pegawai`, `lama_parkir`) VALUES
(1, '0SQmJVxieGlBtsILHtLg', '1233', 'Motor', '0:15:37', '3:1:48', '2022-05-23', 0, 8000, '', '2'),
(2, 'ylyblDyQKSxpO0K3n5Y3', '1233', 'Mobil', '0:29:40', NULL, '2022-05-22', 1, 0, '', ''),
(3, '48W7pb9yRQmufsej7ZDQ', '1234', 'Mobil', '0:30:14', NULL, '2022-05-22', 1, 0, '', ''),
(4, 'MuntdHvyPV4GxD0MrhRP', '12344', 'BUS', '0:32:45', '3:7:49', '2022-05-23', 0, 6000, '', '2'),
(5, 'qfJ1AhP7VDgCWQMqBtoG', '12344', 'BUS', '0:39:17', '4:18:35', '2022-05-23', 0, 9000, 'petugas', '3'),
(6, 'cNAYjSw0DvPR31ej1sE1', '1231', 'Mobil', '0:41:44', NULL, '2022-05-23', 1, 0, '', ''),
(7, 'osNJ2Vrj90UqrxcZ0AMQ', '221', 'Mobil', '0:42:21', '3:19:1', '2022-05-23', 0, 6000, '', '2'),
(8, '2avU4jaLaLSmefA8m5WD', '112331', 'Mobil', '1:13:37', '4:18:5', '2022-05-23', 0, 9000, 'petugas', '3'),
(9, 'ssjy4QHcQl1tTTPHNk4T', '9881', 'Mobil', '4:16:57', NULL, '2022-05-23', 1, NULL, 'petugas', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(75) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(5) NOT NULL DEFAULT 0 COMMENT '0 = pegawai\r\n911 = admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `role`) VALUES
(6, 'jundi', 'zeeideveloper19@gmail.com', 'admin', 911),
(7, 'admin', 'admin@gmail.com', 'admin', 911),
(8, 'petugas', 'petugas@gmail.com', 'petugas', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `setting_tarif`
--
ALTER TABLE `setting_tarif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_parkir`
--
ALTER TABLE `transaksi_parkir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `setting_tarif`
--
ALTER TABLE `setting_tarif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi_parkir`
--
ALTER TABLE `transaksi_parkir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
