-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2022 pada 05.43
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.26

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
-- Struktur dari tabel `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id_transaksi` int(5) NOT NULL,
  `id_paket` int(5) NOT NULL,
  `qty` double NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`id_transaksi`, `id_paket`, `qty`, `subtotal`) VALUES
(1, 1, 3, 0),
(1, 1, 3, 19500),
(1, 1, 2, 1999),
(5, 8, 3, 19500),
(7, 1, 2, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` int(5) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(35) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `nama`, `username`, `password`, `alamat`, `email`, `telp`) VALUES
(1, 'test', 'ok', '$2y$10$NfbkFyQr46Ypf4gQP3RFY.UdXvhjg7XLz0ZrcTostXMgg84QljZ1S', 'ok', '8813farhan@gmail.com', '082190004060'),
(2, 'farhan', 'farhan', 'farhan', 'bekasi', 'L', '081290004060'),
(6, 'farhan', 'okoer', 'akodawko', 'fadsas', 'L', '3128319'),
(8, 'tio', 'faraha', 'adaiwh', 'aehra', 'L', 'haukwha'),
(9, 'dnaukdka', 'ahudah', 'ahwukdhak', 'hdkuahwk', 'L', '128739719'),
(10, 'test', 'teadsjad', 'awdiaw', 'dauw', 'L', '12391');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` int(5) NOT NULL,
  `jenis` enum('kiloan','selimut','bed_cover','kaos','lain') NOT NULL,
  `nama_paket` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `jenis`, `nama_paket`, `harga`) VALUES
(1, 'kiloan', 'Baju', 6500),
(7, 'selimut', 'test', 1000),
(8, 'bed_cover', 'test', 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(5) NOT NULL,
  `kode_invoice` varchar(60) NOT NULL,
  `id_member` int(5) NOT NULL,
  `tgl` date NOT NULL,
  `status` enum('baru','proses','selesai','diambil') NOT NULL,
  `pengiriman` enum('bayar_ditempat','Pengantaran') NOT NULL,
  `dibayar` enum('dibayar','belum_dibayar') NOT NULL,
  `bukti` text NOT NULL,
  `verifikasi_pembayaran` enum('setuju','tolak') DEFAULT NULL,
  `komentar` text NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `kode_invoice`, `id_member`, `tgl`, `status`, `pengiriman`, `dibayar`, `bukti`, `verifikasi_pembayaran`, `komentar`, `id_user`) VALUES
(1, 'P001', 1, '2022-10-30', 'diambil', 'bayar_ditempat', 'dibayar', 'test', 'setuju', 'oke', 1),
(5, 'P002', 6, '2022-11-23', 'baru', 'bayar_ditempat', 'belum_dibayar', 'testing', 'tolak', 'oke', 1),
(6, 'P003', 8, '2022-11-24', 'baru', 'bayar_ditempat', 'dibayar', 'test', 'setuju', 'oke', 1),
(7, 'P003', 2, '2022-11-24', 'baru', 'bayar_ditempat', 'dibayar', 'test', NULL, 'ok', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(35) NOT NULL,
  `notelp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `email`, `notelp`) VALUES
(1, 'Farhan', 'admin', '$2y$10$jA6Co.LhY8TRtX47hEJStO5ydqGv5MAoTURlBnelsIKMhHWGHAqBa', '8813farhan@gmail.com', '081290004060');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id_member` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id_paket` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id_paket`),
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`);

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `tb_member` (`id_member`),
  ADD CONSTRAINT `tb_transaksi_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
