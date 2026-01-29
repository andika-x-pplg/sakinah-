-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jan 2026 pada 06.13
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kas_kelas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_murid`
--

CREATE TABLE `tabel_murid` (
  `id_murid` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `status` enum('Aktif','Tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_murid`
--

INSERT INTO `tabel_murid` (`id_murid`, `nama`, `kelas`, `status`) VALUES
(7, 'Yudis ganteng', 'XI PPLG 1', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_transaksi`
--

CREATE TABLE `tabel_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_murid` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jenis` enum('Masuk','Keluar') DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `keterangan` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_transaksi`
--

INSERT INTO `tabel_transaksi` (`id_transaksi`, `id_murid`, `tanggal`, `jenis`, `jumlah`, `keterangan`) VALUES
(5, 2, '2026-01-28', 'Masuk', 1234, 'Kas Masuk'),
(6, 2, '2026-01-28', 'Masuk', 1234, 'Kas Masuk'),
(7, 1, '2026-01-28', 'Masuk', 123456, 'Kas Masuk'),
(8, 2, '2026-01-28', 'Masuk', 1234, 'Kas Masuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('bendahara','wali','ketua kelas','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(3, 'wali kelas', 'wali123', 'wali'),
(4, 'ketua kelas', 'ketua123', 'ketua kelas'),
(5, 'bendahara', 'bendahara123', 'bendahara');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_murid`
--
ALTER TABLE `tabel_murid`
  ADD PRIMARY KEY (`id_murid`);

--
-- Indeks untuk tabel `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_murid`
--
ALTER TABLE `tabel_murid`
  MODIFY `id_murid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
