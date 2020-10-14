-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 24 Feb 2020 pada 12.16
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mentah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_adm` int(11) NOT NULL,
  `username_adm` varchar(25) NOT NULL,
  `pass_adm` text NOT NULL,
  `level_adm` int(11) NOT NULL,
  `cookie_adm` text NOT NULL,
  `nama_adm` varchar(50) NOT NULL,
  `cp_adm` varchar(14) NOT NULL,
  `email_adm` varchar(50) NOT NULL,
  `alamat_adm` text NOT NULL,
  `foto_adm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_adm`, `username_adm`, `pass_adm`, `level_adm`, `cookie_adm`, `nama_adm`, `cp_adm`, `email_adm`, `alamat_adm`, `foto_adm`) VALUES
(1, 'super', '$2y$10$JRIbZgGfrRgTt8N/9Etm/.33BYCz.IoRCyixAxE7y6.OI8RSxZIb2', 1, '3WNo1lBHYe7WhGJODM1jVYiHdsrZ4EfZXwKRPnmF5DAtto6ciA7sx6aQUOnqvuMK', 'super admins', '11111', 'awdada@mail.com', 'awdadws', 'ec301cc896e79821631aca63e19d3bb3.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
