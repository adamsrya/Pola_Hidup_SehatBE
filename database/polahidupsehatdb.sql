-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Feb 2022 pada 20.28
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `polahidupsehatdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsul`
--

CREATE TABLE `konsul` (
  `id_penyakit` int(11) NOT NULL,
  `nm_penyakit` varchar(250) NOT NULL,
  `desk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_user` int(100) NOT NULL,
  `guladarah` int(10) NOT NULL,
  `kolestrol` int(10) NOT NULL,
  `asamurat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `polamkn`
--

CREATE TABLE `polamkn` (
  `id_penyakit` int(11) NOT NULL,
  `mknanjuran` text NOT NULL,
  `mknhindari` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `polaolga`
--

CREATE TABLE `polaolga` (
  `id_penyakit` int(11) NOT NULL,
  `olgaanjuran` text NOT NULL,
  `olgahindari` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayatkonsul`
--

CREATE TABLE `riwayatkonsul` (
  `id_user` int(100) NOT NULL,
  `guladarah` int(250) NOT NULL,
  `kolestrol` int(250) NOT NULL,
  `asamurat` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(150) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `tmptlahir` varchar(250) NOT NULL,
  `tgllahir` date NOT NULL,
  `alamat` text NOT NULL,
  `jk` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `konsul`
--
ALTER TABLE `konsul`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `polamkn`
--
ALTER TABLE `polamkn`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indeks untuk tabel `polaolga`
--
ALTER TABLE `polaolga`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indeks untuk tabel `riwayatkonsul`
--
ALTER TABLE `riwayatkonsul`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
