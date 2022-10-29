-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2022 at 09:20 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id` int(5) NOT NULL,
  `id_transaksi` int(5) NOT NULL,
  `id_paket` int(5) NOT NULL,
  `qty` double NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id` int(5) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id`, `nama`, `username`, `password`, `alamat`, `jenis_kelamin`, `telp`) VALUES
(1, 'test', 'ok', 'ok', 'ok', 'L', '082190004060');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id` int(5) NOT NULL,
  `jenis` enum('kiloan','selimut','bed_cover','kaos','lain') NOT NULL,
  `nama_paket` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(5) NOT NULL,
  `kode_invoice` varchar(60) NOT NULL,
  `id_member` int(5) NOT NULL,
  `tgl` datetime NOT NULL,
  `status` enum('baru','proses','selesai','diambil') NOT NULL,
  `dibayar` enum('dibayar','belum_dibayar') NOT NULL,
  `gambar` text NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `kode_invoice`, `id_member`, `tgl`, `status`, `dibayar`, `gambar`, `id_user`) VALUES
(1, 'P001', 1, '2022-10-29 07:48:06', 'selesai', 'belum_dibayar', 'test', 1),
(2, 'P002', 1, '2022-10-29 08:08:10', 'baru', 'belum_dibayar', 'test', 1),
(3, 'P003', 1, '2022-10-29 08:08:35', 'proses', 'dibayar', 'test', 1),
(4, 'P004', 1, '2022-10-29 08:08:35', 'diambil', 'dibayar', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(5) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `role` enum('admin','kasir','owner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role`) VALUES
(1, 'Farhan', 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id`),
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `tb_member` (`id`),
  ADD CONSTRAINT `tb_transaksi_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
