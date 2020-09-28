-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Sep 2020 pada 17.28
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang_new`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `harga_brg` int(20) NOT NULL,
  `stok_brg` int(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `harga_brg`, `stok_brg`, `tanggal`) VALUES
(33, 'pilok kuning', 10000, 10, '2020-09-19'),
(36, 'buku nota', 1500, 10, '2020-09-19'),
(37, 'usb female 2 ich', 13000, 10, '2020-09-19'),
(38, 'spidol hitam', 12000, 5, '2020-09-19'),
(39, 'pilok hitam', 12000, 10, '2020-09-19'),
(40, 'buku', 5000, 5, '2020-09-23'),
(41, 'cas hape', 40000, 2, '2020-09-27'),
(42, 'kabel usb', 15000, 3, '2020-09-27'),
(43, 'akrilix 3x4', 250000, 3, '2020-09-27'),
(44, 'cat hitam', 20000, 3, '2020-09-27'),
(45, 'port usb', 10000, 4, '2020-09-27'),
(46, 'kaca hitam', 20000, 10, '2020-09-27'),
(47, 'masker', 5000, 5, '2020-09-27'),
(48, 'port kabel rol', 20000, 12, '2020-09-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemakaian`
--

CREATE TABLE `tb_pemakaian` (
  `id_pakai` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `jumlah_brg` int(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pemakaian`
--

INSERT INTO `tb_pemakaian` (`id_pakai`, `id_brg`, `jumlah_brg`, `tanggal`) VALUES
(69, 33, 5, '2020-09-19'),
(70, 36, 5, '2020-09-19'),
(71, 37, 5, '2020-09-19'),
(88, 48, 2, '2020-09-27'),
(91, 47, 3, '2020-09-27'),
(92, 43, 2, '2020-09-27'),
(93, 40, 5, '2020-09-27'),
(95, 38, 5, '2020-09-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama`) VALUES
('03c0738d-001c-11eb-94f4-2c4d542f03df', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indeks untuk tabel `tb_pemakaian`
--
ALTER TABLE `tb_pemakaian`
  ADD PRIMARY KEY (`id_pakai`),
  ADD UNIQUE KEY `id_brg` (`id_brg`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tb_pemakaian`
--
ALTER TABLE `tb_pemakaian`
  MODIFY `id_pakai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
