-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 03 Bulan Mei 2022 pada 14.11
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbschool`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `nrp` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `data_mahasiswa`
--

INSERT INTO `data_mahasiswa` (`nrp`, `nama`, `alamat`, `ttl`, `email`, `nohp`, `username`, `password`, `profil`) VALUES
('3121600001', 'Vanessa Florentina Patricia', 'Perumahan Villa Situbondo Indah blok D6-7', 'Situbondo, 19 Agustus 2003', 'vanessa@it.student.pens.ac.id', '082139454566', 'vanessa', '$2y$10$abD2cOhJWSOyBK.46/754uJFzCVt1Yb2NLW8djmpctit5TSsZYWV.', 'InShot_20210610_145531293.jpg'),
('3121600002', 'Azis Zuhri Pratomo', 'Jl Radar Komplek Pushubad Rumah Dinas No 196, Kalisari,Pasar Rebo, Jakarta Timur', 'Jakarta, 5 Agustus 2001', 'aziszuhrip354@it.student.pens.ac.id', '08782809146', 'azis', '$2y$10$p6pum/yDlY/BSxrov0a52eUFK2La7i23bep5517wdrhAR.mL/bXFO', NULL),
('3121600003', 'Ahmad Musafir Khoirul Fattah', 'Siti Mastiah. Tanjegwagir RT 05 RW 03, Kec. Krembung, Kabupaten Sidoarjo, Jawa Timur', 'Sidoarjo, 10 Januari 2003', 'ahmusafir@it.student.pens.ac.id', '0895339326020', 'khoirul', '$2y$10$eQpEzVZhIbkYnGG7lrQUmOkdggiInw4NHdeS31xiQILdvtXt4r2oa', NULL),
('3121600019', 'Muhammad Naufal Ikrom', 'Jl. Karang Menjangan 3E/no.1', 'Surabaya, 11 Juni 2003', 'Naufalikrom69@it.student.pens.ac.id', '081217395849', 'naufal', '$2y$10$1KhRfIwMpxJQCVGW82FL9e0vqAnZVzbDIw2/PJd7mmFv5ZaeqWknW', NULL),
('3121600023', 'Arianto Zaki Hamdalah', 'Kediri', 'asda', 'askda@gmail.com', '039123', 'zaki', '$2y$10$e.IZm.n3C.go5xiBW1UDY.glvCJAPg2Bh6RcN/rgAzHXQl4eLUo6O', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_tugas`
--

CREATE TABLE `data_tugas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `upload_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_tugas`
--

INSERT INTO `data_tugas` (`id`, `nama`, `ukuran`, `deskripsi`, `upload_at`) VALUES
(5, '3121600001_Vanessa Florentina Patricia_Tugas 5.docx', '202799', 'contoh', '2022-05-03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`nrp`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `data_tugas`
--
ALTER TABLE `data_tugas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_tugas`
--
ALTER TABLE `data_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
