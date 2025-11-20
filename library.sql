-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2025 at 07:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `USERNAME_ADMIN` varchar(64) NOT NULL,
  `PASSWORD_ADMIN` varchar(64) NOT NULL,
  `NAMA_ADMIN` varchar(64) NOT NULL,
  `TELEPON_ADMIN` varchar(13) NOT NULL,
  `ALAMAT_ADMIN` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`USERNAME_ADMIN`, `PASSWORD_ADMIN`, `NAMA_ADMIN`, `TELEPON_ADMIN`, `ALAMAT_ADMIN`) VALUES
('admin1', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'Admin Perpustakaan', '081234567890', 'Jl. Merdeka No. 1, Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `ID_BUKU` int(11) NOT NULL,
  `ID_PEMINJAMAN` int(11) DEFAULT NULL,
  `JUDUL` varchar(50) NOT NULL,
  `DESKRIPSI` longtext NOT NULL,
  `PENULIS` varchar(50) NOT NULL,
  `PENERBIT` varchar(50) NOT NULL,
  `TAHUN` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`ID_BUKU`, `ID_PEMINJAMAN`, `JUDUL`, `DESKRIPSI`, `PENULIS`, `PENERBIT`, `TAHUN`) VALUES
(1, 1, 'Pemrograman Web Dasar', 'Buku pengantar pemrograman web dengan HTML, CSS, dan JavaScript.', 'Ahmad Nugroho', 'Informatika', '2020'),
(2, 2, 'Basis Data Relasional', 'Konsep dasar dan lanjutan basis data relasional.', 'Dian Prasetyo', 'Andi Offset', '2019'),
(3, 3, 'Algoritma dan Struktur Data', 'Pembahasan algoritma dan struktur data secara praktis.', 'Eko Wibowo', 'Gramedia', '2018'),
(4, 4, 'Jaringan Komputer', 'Dasar-dasar jaringan komputer dan implementasinya.', 'Slamet Riyadi', 'Informatika', '2021'),
(5, 5, 'Sistem Operasi', 'Konsep sistem operasi modern.', 'Yuni Astuti', 'Andi Offset', '2017'),
(6, 6, 'Pemrograman Python', 'Belajar Python untuk pemula hingga menengah.', 'Bambang Susilo', 'Informatika', '2022'),
(7, 7, 'Kecerdasan Buatan', 'Pengantar konsep AI dan penerapannya.', 'Rina Sari', 'Gramedia', '2020'),
(8, 8, 'Manajemen Proyek TI', 'Panduan manajemen proyek teknologi informasi.', 'Agus Setiawan', 'Erlangga', '2016'),
(9, 9, 'Data Mining', 'Teknik-teknik dasar data mining.', 'Fitri Handayani', 'Andi Offset', '2019'),
(10, 10, 'Machine Learning', 'Teori dan praktik machine learning.', 'Hendra Gunawan', 'Informatika', '2021'),
(11, 11, 'Struktur Diskrit', 'Materi matematika diskrit untuk ilmu komputer.', 'Teguh Pramono', 'Erlangga', '2018'),
(12, 12, 'Keamanan Informasi', 'Dasar keamanan sistem dan jaringan.', 'Lukman Hakim', 'Gramedia', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `ID_PEMINJAMAN` int(11) NOT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `TANGGAL_PINJAM` date NOT NULL,
  `TANGGAL_RENCANA` date NOT NULL,
  `STATUS` enum('Proses','Pinjam','Rusak','Hilang','Kembali','Terlambat') NOT NULL DEFAULT 'Proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`ID_PEMINJAMAN`, `USERNAME`, `TANGGAL_PINJAM`, `TANGGAL_RENCANA`, `STATUS`) VALUES
(1, 'budi', '2025-11-01', '2025-11-08', 'Pinjam'),
(2, 'siti', '2025-11-02', '2025-11-09', 'Kembali'),
(3, 'andi', '2025-11-03', '2025-11-10', 'Terlambat'),
(4, 'rina', '2025-11-04', '2025-11-11', 'Proses'),
(5, 'dewi', '2025-11-05', '2025-11-12', 'Pinjam'),
(6, 'joko', '2025-11-06', '2025-11-13', 'Kembali'),
(7, 'tono', '2025-11-07', '2025-11-14', 'Rusak'),
(8, 'lia', '2025-11-08', '2025-11-15', 'Hilang'),
(9, 'agus', '2025-11-09', '2025-11-16', 'Pinjam'),
(10, 'nina', '2025-11-10', '2025-11-17', 'Proses'),
(11, 'rudi', '2025-11-11', '2025-11-18', 'Pinjam'),
(12, 'maya', '2025-11-12', '2025-11-19', 'Kembali');

-- --------------------------------------------------------

--
-- Table structure for table `pemustaka`
--

CREATE TABLE `pemustaka` (
  `NAMA_LENGKAP` varchar(50) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(64) NOT NULL,
  `EMAIL` varchar(64) NOT NULL,
  `TELEPON` varchar(14) NOT NULL,
  `TANGGAL_LAHIR` date NOT NULL,
  `ALAMAT` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemustaka`
--

INSERT INTO `pemustaka` (`NAMA_LENGKAP`, `USERNAME`, `PASSWORD`, `EMAIL`, `TELEPON`, `TANGGAL_LAHIR`, `ALAMAT`) VALUES
('Agus Salim', 'agus', '9323dd6786ebcbf3ac87357cc78ba1abfda6cf5e55cd01097b90d4a286cac90e', 'agus@example.com', '081999999999', '1990-09-09', 'Jl. Rambutan No. 11, Makassar'),
('Andi Wijaya', 'andi', '5906ac361a137e2d286465cd6588ebb5ac3f5ae955001100bc41577c3d751764', 'andi@example.com', '081333333333', '1994-03-20', 'Jl. Mawar No. 7, Surabaya'),
('Budi Santoso', 'budi', '0b14d501a594442a01c6859541bcb3e8164d183d32937b851835442f69d5c94e', 'budi@example.com', '081111111111', '1995-01-10', 'Jl. Melati No. 10, Bandung'),
('Dewi Lestari', 'dewi', '8b2c86ea9cf2ea4eb517fd1e06b74f399e7fec0fef92e3b482a6cf2e2b092023', 'dewi@example.com', '081555555555', '1993-05-30', 'Jl. Anggrek No. 9, Semarang'),
('Joko Prabowo', 'joko', '598a1a400c1dfdf36974e69d7e1bc98593f2e15015eed8e9b7e47a83b31693d5', 'joko@example.com', '081666666666', '1992-06-12', 'Jl. Teratai No. 3, Malang'),
('Lia Hartati', 'lia', '57f3ebab63f156fd8f776ba645a55d96360a15eeffc8b0e4afe4c05fa88219aa', 'lia@example.com', '081888888888', '1998-08-18', 'Jl. Nangka No. 6, Denpasar'),
('Maya Putri', 'maya', 'b3d17ebbe4f2b75d27b6309cfaae1487b667301a73951e7d523a039cd2dfe110', 'maya@example.com', '082333333333', '1991-12-01', 'Jl. Sawo No. 13, Pontianak'),
('Nina Kartika', 'nina', 'aa4a9ea03fcac15b5fc63c949ac34e7b0fd17906716ac3b8e58c599cdc5a52f0', 'nina@example.com', '082111111111', '1999-10-22', 'Jl. Durian No. 2, Palembang'),
('Rina Kurnia', 'rina', 'b97873a40f73abedd8d685a7cd5e5f85e4a9cfb83eac26886640a0813850122b', 'rina@example.com', '081444444444', '1997-04-25', 'Jl. Dahlia No. 12, Yogyakarta'),
('Rudi Hartono', 'rudi', '53d453b0c08b6b38ae91515dc88d25fbecdd1d6001f022419629df844f8ba433', 'rudi@example.com', '082222222222', '1989-11-11', 'Jl. Pisang No. 8, Bogor'),
('Siti Aminah', 'siti', '6cf615d5bcaac778352a8f1f3360d23f02f34ec182e259897fd6ce485d7870d4', 'siti@example.com', '081222222222', '1996-02-15', 'Jl. Kenanga No. 5, Jakarta'),
('Tono Supriyadi', 'tono', '5860836e8f13fc9837539a597d4086bfc0299e54ad92148d54538b5c3feefb7c', 'tono@example.com', '081777777777', '1991-07-07', 'Jl. Cendana No. 4, Medan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`USERNAME_ADMIN`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`ID_BUKU`),
  ADD KEY `FK_MEMILIKI` (`ID_PEMINJAMAN`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`ID_PEMINJAMAN`),
  ADD KEY `FK_BERHAK` (`USERNAME`);

--
-- Indexes for table `pemustaka`
--
ALTER TABLE `pemustaka`
  ADD PRIMARY KEY (`USERNAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `ID_BUKU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `ID_PEMINJAMAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`ID_PEMINJAMAN`) REFERENCES `peminjaman` (`ID_PEMINJAMAN`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `FK_BERHAK` FOREIGN KEY (`USERNAME`) REFERENCES `pemustaka` (`USERNAME`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
