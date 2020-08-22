-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 22 Agu 2020 pada 13.25
-- Versi server: 10.3.22-MariaDB-1ubuntu1
-- Versi PHP: 7.4.3
CREATE DATABASE evoting;
USE 
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evoting`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrator`
--

CREATE TABLE `administrator` (
  `no_col` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(24) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `job_sheet` varchar(24) NOT NULL,
  `from_group` int(11) NOT NULL,
  `person_image` varchar(128) NOT NULL DEFAULT '0.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `administrator`
--

INSERT INTO `administrator` (`no_col`, `username`, `password`, `nama`, `job_sheet`, `from_group`, `person_image`) VALUES
(5, 'admin', 'itosis', 'osis ekasatya', 'ADMIN', 3, 'Logo Sma Semin.png'),
(7, 'abiludin', '1111', 'muhamad Bi', 'WAKIL', 3, 'P1170374.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `no_col` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `nama_group` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`no_col`, `id_group`, `nama_group`) VALUES
(2, 10, '10.A1'),
(3, 11, '10.A2'),
(4, 12, '10.A3'),
(5, 13, '10.S1'),
(6, 14, '10.S2'),
(7, 15, '10.S3'),
(8, 16, '11.A1'),
(9, 17, '11.A2'),
(10, 18, '11.A3'),
(11, 19, '11.S1'),
(12, 20, '11.S2'),
(13, 21, '11.S3'),
(14, 22, '12.A1'),
(15, 23, '12.A2'),
(16, 24, '12.A3'),
(17, 25, '12.S1'),
(18, 26, '12.S2'),
(19, 27, '12.S3'),
(20, 28, '12.S4'),
(45, 3, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kandidat`
--

CREATE TABLE `kandidat` (
  `idkandidat` int(2) NOT NULL,
  `username` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kelas` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `nokandidat` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `jumlahsuara` varchar(4) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `visi` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `misi` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','T') COLLATE latin1_general_ci NOT NULL DEFAULT 'T',
  `foto` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kandidat`
--

INSERT INTO `kandidat` (`idkandidat`, `username`, `password`, `nama`, `kelas`, `nokandidat`, `jumlahsuara`, `visi`, `misi`, `aktif`, `foto`) VALUES
(15, 'abiludin', 'b59c67bf196a4758191e42f76670ceba', 'muhamad abiludin', '', '1', '0', 'ketua osis?     kecillllllllll', 'kepo bat to kowe', 'Y', 'IMG_0380.JPG'),
(16, 'abiludin', 'b59c67bf196a4758191e42f76670ceba', 'muhamad abiludin', '', '2', '0', 'ketua osis?  kecilllllllllllll', 'kepo to kowe', 'Y', 'IMG-20200630-WA0039.jpeg'),
(17, 'abiludin', 'b59c67bf196a4758191e42f76670ceba', 'muhamad abiludin', '', '3', '0', 'ketua osis?  kecilllllllllllll', 'kepo men kowe cuk', 'Y', 'IMG-20200727-WA0059.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilih`
--

CREATE TABLE `pemilih` (
  `id_pemilih` int(11) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nis` varchar(16) NOT NULL,
  `memilih` int(11) NOT NULL DEFAULT 0,
  `activated` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemilih`
--

INSERT INTO `pemilih` (`id_pemilih`, `nama`, `group_id`, `username`, `password`, `nis`, `memilih`, `activated`) VALUES
(1, 'osis', 10, 'nico', 'osis1', '1111', 1, 'Yes'),
(2, 'osis', 10, 'febriano', 'osis2', '1111', 0, 'Yes'),
(3, 'osis', 10, 'nana', 'osis3', '1111', 0, 'Yes'),
(4, 'osis', 10, 'indah', 'osis4', '1111', 0, 'Yes'),
(5, 'osis', 10, 'nabila', 'osis5', '1111', 0, 'Yes'),
(6, 'osis', 10, 'zain', 'osis6', '1111', 0, 'Yes'),
(7, 'osis', 10, 'anisa', 'osis7', '1111', 0, 'Yes'),
(8, 'osis', 10, 'afnan', 'osis8', '1111', 0, 'Yes'),
(9, 'osis', 10, 'riyan', 'osis9', '1111', 0, 'Yes'),
(10, 'osis', 10, 'amanda', 'osis10', '1111', 0, 'Yes'),
(11, 'osis', 10, 'pandik', 'osis11', '1111', 0, 'Yes'),
(12, 'osis', 10, 'apfia', 'osis12', '1111', 0, 'Yes'),
(13, 'osis', 10, 'ardiansyah', 'osis13', '1111', 0, 'Yes'),
(14, 'osis', 10, 'desi', 'osis14', '1111', 0, 'Yes'),
(15, 'osis', 10, 'adinda', 'osis15', '1111', 0, 'Yes'),
(16, 'osis', 10, 'paisal', 'osis16', '1111', 0, 'Yes'),
(17, 'osis', 10, 'faisal', 'osis17', '1111', 0, 'Yes'),
(18, 'osis', 10, 'fauzan', 'osis18', '1111', 0, 'Yes'),
(19, 'osis', 10, 'ghilang', 'osis19', '1111', 0, 'Yes'),
(20, 'osis', 10, 'iwan', 'osis20', '1111', 0, 'Yes'),
(21, 'osis', 10, 'jasmine', 'osis21', '1111', 0, 'Yes'),
(22, 'osis', 10, 'oktavian', 'osis22', '1111', 0, 'Yes'),
(23, 'osis', 10, 'pian36', 'osis23', '1111', 0, 'Yes'),
(24, 'osis', 10, 'restu', 'osis24', '1111', 0, 'Yes'),
(25, 'osis', 10, 'dilla', 'osis25', '1111', 0, 'Yes'),
(26, 'osis', 10, 'zalva', 'osis26', '1111', 0, 'Yes'),
(27, 'osis', 10, 'zaskia', 'osis27', '1111', 0, 'Yes'),
(28, 'osis', 10, 'salma', 'osis28', '1111', 0, 'Yes'),
(29, 'osis', 10, 'alwandiko', 'osis29', '1111', 0, 'Yes'),
(30, 'osis', 10, 'arivatur', 'osis30', '1111', 0, 'Yes'),
(31, 'osis', 10, 'yongky', 'osis31', '1111', 0, 'Yes'),
(32, 'osis', 10, 'rahma', 'osis32', '1111', 0, 'Yes'),
(33, 'osis', 10, 'desita', 'osis33', '1111', 0, 'Yes'),
(34, 'osis', 10, 'ivando', 'osis34', '1111', 0, 'Yes'),
(35, 'osis', 10, 'yunan', 'osis35', '1111', 0, 'Yes'),
(36, 'osis', 10, 'yellow', 'osis36', '1111', 0, 'Yes'),
(37, 'osis', 10, 'abiludin', 'osis37', '1111', 0, 'Yes'),
(38, 'osis', 10, 'ogy', 'osis38', '1111', 0, 'Yes'),
(39, 'osis', 10, 'dina', 'osis39', '1111', 0, 'Yes'),
(40, 'osis', 10, 'alif', 'osis40', '1111', 0, 'Yes'),
(41, 'osis', 10, 'cahyo', 'osis41', '1111', 0, 'Yes'),
(42, 'osis', 10, 'wahyu', 'osis42', '1111', 0, 'Yes'),
(43, 'osis', 10, 'dafin', 'osis43', '1111', 0, 'Yes'),
(44, 'osis', 10, 'helma', 'osis44', '1111', 0, 'Yes'),
(45, 'osis', 10, 'shella', 'osis45', '1111', 0, 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`no_col`);

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`no_col`);

--
-- Indeks untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`idkandidat`);

--
-- Indeks untuk tabel `pemilih`
--
ALTER TABLE `pemilih`
  ADD PRIMARY KEY (`id_pemilih`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `administrator`
--
ALTER TABLE `administrator`
  MODIFY `no_col` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `no_col` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `idkandidat` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `pemilih`
--
ALTER TABLE `pemilih`
  MODIFY `id_pemilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
