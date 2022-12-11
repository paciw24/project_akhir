-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 08:53 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
  `kode_invoice` varchar(11) NOT NULL,
  `id_paket` int(5) NOT NULL,
  `qty` double NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`kode_invoice`, `id_paket`, `qty`, `subtotal`) VALUES
('1', 1, 3, 0),
('1', 1, 3, 19500),
('1', 1, 2, 1999),
('5', 8, 3, 19500),
('7', 1, 2, 20000),
('0', 8, 1, 10000),
('0', 1, 1, 6500),
('0', 9, 1, 12000),
('P007', 8, 2, 20000),
('P007', 1, 1, 6500),
('P007', 9, 1, 12000),
('P008', 8, 2, 20000),
('P008', 1, 1, 6500),
('P009', 8, 1, 10000),
('P009', 1, 1, 6500),
('P009', 9, 1, 12000),
('P0010', 8, 1, 10000),
('P0010', 1, 1, 6500),
('P0011', 8, 1, 10000),
('P0012', 1, 1, 6500),
('P0013', 8, 1, 10000),
('P0014', 1, 1, 6500),
('P0014', 8, 1, 10000),
('P0015', 8, 1, 10000),
('P0016', 8, 1, 10000),
('P0017', 8, 1, 10000),
('P0018', 8, 1, 10000),
('P0019', 8, 2, 20000),
('P0020', 8, 1, 10000),
('P0020', 1, 1, 6500),
('P0021', 8, 1, 10000),
('P0021', 1, 1, 6500);

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` int(5) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(35) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `nama`, `username`, `password`, `alamat`, `email`, `telp`) VALUES
(1, 'test', 'ok', '$2y$10$NfbkFyQr46Ypf4gQP3RFY.UdXvhjg7XLz0ZrcTostXMgg84QljZ1S', 'ok', '8813farhan@gmail.com', '0821900040601'),
(2, 'farhan', 'farhan', 'farhan', 'bekasi', 'L', '081290004060'),
(6, 'farhan', 'okoer', 'akodawko', 'fadsas', 'L', '3128319'),
(8, 'tio', 'faraha', 'adaiwh', 'aehra', 'L', 'haukwha'),
(11, 'Revita Aunurachmani', 'revita', '$2y$10$.5U7TV0EKYdS.R0caKygPu9tw4tfzNOAraytTAVeq.34xMaWgHkOa', 'bekasi', 'revita@gmail.com', '083123131231'),
(12, 'gessa', 'gessa', '$2y$10$oK7o4rxoRcfG4qAusCX5aOUHN9YoK2H3r8U.TZ2N5AQGMYKK5PYCq', 'Bekasi Utara', 'gessa@gmail.com', '083123123311');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` int(5) NOT NULL,
  `nama_paket` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `nama_paket`, `harga`, `gambar`) VALUES
(1, 'Baju', 6500, 'paket1670254268.png'),
(8, 'Cuci Kiloan', 10000, 'paket1670254293.png'),
(9, 'Cuci Express', 10000, 'paket1670388083.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `kode_invoice` varchar(11) NOT NULL,
  `id_member` int(5) NOT NULL,
  `tgl` date NOT NULL,
  `status` enum('baru','proses','selesai','diambil') NOT NULL,
  `pengiriman` enum('bayar_ditempat','Pengantaran') DEFAULT NULL,
  `dibayar` enum('dibayar','belum_dibayar') NOT NULL,
  `bukti` text DEFAULT NULL,
  `verifikasi_pembayaran` enum('setuju','tolak') DEFAULT NULL,
  `komentar` text NOT NULL,
  `id_user` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`kode_invoice`, `id_member`, `tgl`, `status`, `pengiriman`, `dibayar`, `bukti`, `verifikasi_pembayaran`, `komentar`, `id_user`) VALUES
('P001', 2, '2022-11-24', 'baru', 'bayar_ditempat', 'dibayar', 'test', 'tolak', 'ok', 1),
('P0010', 11, '2022-12-08', 'baru', 'bayar_ditempat', 'dibayar', '', NULL, 'test', NULL),
('P0011', 11, '2022-12-08', 'baru', 'bayar_ditempat', 'dibayar', '', NULL, 'test', NULL),
('P0012', 12, '2022-12-09', 'baru', 'bayar_ditempat', 'dibayar', 'bukti1670727729.jpeg', NULL, 'test', 1),
('P0013', 12, '2022-12-09', 'baru', 'bayar_ditempat', 'belum_dibayar', '', 'setuju', 'test', 1),
('P0014', 11, '2022-12-09', 'proses', 'bayar_ditempat', 'dibayar', 'bukti1670585604.jpeg', 'setuju', 'test', 1),
('P0015', 12, '2022-12-10', 'baru', 'bayar_ditempat', 'dibayar', 'bukti1670676899.jpeg', NULL, 'bebabasadwjadiawjda', 1),
('P0016', 12, '2022-12-10', 'baru', 'Pengantaran', 'dibayar', 'bukti1670727669.jpeg', NULL, 'test', 1),
('P0017', 12, '2022-12-10', 'baru', 'Pengantaran', 'dibayar', 'bukti1670675597.jpeg', 'setuju', 'Testing', 1),
('P0018', 12, '2022-12-10', 'baru', 'Pengantaran', 'belum_dibayar', 'bukti1670676718.jpeg', NULL, 'oke', NULL),
('P0019', 12, '2022-12-11', 'baru', 'Pengantaran', 'dibayar', 'bukti1670727227.jpeg', NULL, 'okey', NULL),
('P002', 8, '2022-11-24', 'baru', 'bayar_ditempat', 'dibayar', 'test', 'setuju', 'oke', 1),
('P0020', 12, '2022-12-11', 'baru', 'bayar_ditempat', 'dibayar', 'bukti1670735919.jpeg', NULL, 'test', NULL),
('P0021', 12, '2022-12-11', 'baru', 'bayar_ditempat', 'belum_dibayar', NULL, NULL, 'testing', NULL),
('P003', 6, '2022-11-23', 'baru', 'bayar_ditempat', 'belum_dibayar', 'testing', 'tolak', 'oke', 1),
('P004', 1, '2022-10-30', 'diambil', 'bayar_ditempat', 'dibayar', 'test', 'setuju', 'oke', 1),
('P005', 11, '2022-12-08', 'baru', 'bayar_ditempat', 'dibayar', '', NULL, 'test', NULL),
('P006', 11, '2022-12-08', 'baru', 'bayar_ditempat', 'dibayar', '', NULL, 'testt', NULL),
('P007', 11, '2022-12-08', 'baru', 'bayar_ditempat', 'dibayar', '', NULL, 'testing', NULL),
('P008', 11, '2022-12-08', 'baru', 'bayar_ditempat', 'dibayar', '', NULL, 'test', NULL),
('P009', 11, '2022-12-08', 'baru', 'bayar_ditempat', 'dibayar', '', NULL, '123', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(35) NOT NULL,
  `notelp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `email`, `notelp`) VALUES
(1, 'Farhan', 'admin', '$2y$10$TMowovv01i6ejni6nbghEu2vz.yNoGj7TYtZMPOciDmRyx2P/pRhq', '8813farhan@gmail.com', '081290004060'),
(5, 'Farhan Rafahadi', 'farhan', '$2y$10$elXwhHHcVM0vS2j5VGw7UuBX4LK4CzWDDkHyaRWR8UFN4cHtDbVp2', '8813farhan@gmail.com', '081290004061'),
(15, 'test', 'admin', '$2y$10$lT142j.HGi/74MPwuG5o3u5rZ5owYX3oyqMeh6mnetow7AAv40Bbe', 'far@gmail.com', '1231231');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD KEY `id_paket` (`id_paket`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`kode_invoice`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id_member` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id_paket` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id_paket`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `tb_member` (`id_member`),
  ADD CONSTRAINT `tb_transaksi_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
