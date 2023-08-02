-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2023 pada 05.57
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apotik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbidan`
--

CREATE TABLE `tbidan` (
  `kd_bidan` varchar(10) NOT NULL,
  `nama_bidan` varchar(30) NOT NULL,
  `kd_poli` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbidan`
--

INSERT INTO `tbidan` (`kd_bidan`, `nama_bidan`, `kd_poli`) VALUES
('BD001', 'Adit Dwi', 'PL001'),
('BD002', 'Dr. Summer', 'PL002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tpeserta`
--

CREATE TABLE `tpeserta` (
  `kd_peserta` varchar(10) NOT NULL,
  `nama_peserta` varchar(30) DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `telepon` int(11) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tpeserta`
--

INSERT INTO `tpeserta` (`kd_peserta`, `nama_peserta`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `telepon`, `email`) VALUES
('PS001', 'Jammal', '2003-04-18', 'Laki-laki', 'Jl. Pancawarga VIII', 812345678, 'jammal@gmail.com'),
('PS002', 'Kenz', '1999-07-07', 'Laki-laki', 'Jl. Naga Merah II', 81287654, 'kenz@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tpoli`
--

CREATE TABLE `tpoli` (
  `kd_poli` varchar(10) NOT NULL,
  `nama_poli` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tpoli`
--

INSERT INTO `tpoli` (`kd_poli`, `nama_poli`) VALUES
('PL001', 'Poli Gigi'),
('PL002', 'Poli Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trekammedis`
--

CREATE TABLE `trekammedis` (
  `no_transaksi` varchar(10) NOT NULL,
  `kd_peserta` varchar(10) NOT NULL,
  `tgl_berobat` date NOT NULL,
  `kd_bidan` varchar(10) NOT NULL,
  `keluhan` varchar(50) NOT NULL,
  `biaya_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `trekammedis`
--

INSERT INTO `trekammedis` (`no_transaksi`, `kd_peserta`, `tgl_berobat`, `kd_bidan`, `keluhan`, `biaya_admin`) VALUES
('TR001', 'PS001', '2019-04-12', 'BD001', 'Sakit gigi', 50000),
('TR002', 'PS002', '2018-07-26', 'BD002', 'Demam', 120000),
('TR004', 'PS001', '2004-02-17', 'BD001', 'Kangker', 50000);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vlist_rekammedis`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vlist_rekammedis` (
`no_transaksi` varchar(10)
,`tgl_berobat` date
,`nama_peserta` varchar(30)
,`jenis_kelamin` varchar(30)
,`keluhan` varchar(50)
,`nama_poli` varchar(30)
,`nama_bidan` varchar(30)
,`biaya_admin` int(11)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `vlist_rekammedis`
--
DROP TABLE IF EXISTS `vlist_rekammedis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vlist_rekammedis`  AS SELECT `trekammedis`.`no_transaksi` AS `no_transaksi`, `trekammedis`.`tgl_berobat` AS `tgl_berobat`, `tpeserta`.`nama_peserta` AS `nama_peserta`, `tpeserta`.`jenis_kelamin` AS `jenis_kelamin`, `trekammedis`.`keluhan` AS `keluhan`, `tpoli`.`nama_poli` AS `nama_poli`, `tbidan`.`nama_bidan` AS `nama_bidan`, `trekammedis`.`biaya_admin` AS `biaya_admin` FROM (((`tpeserta` join `trekammedis` on(`trekammedis`.`kd_peserta` = `tpeserta`.`kd_peserta`)) join `tbidan` on(`tbidan`.`kd_bidan` = `trekammedis`.`kd_bidan`)) join `tpoli` on(`tpoli`.`kd_poli` = `tbidan`.`kd_poli`))  ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
