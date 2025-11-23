-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2025 at 11:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.5.0

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
('admin1', sha2('Admin1', 256), 'Admin Perpustakaan', '081234567890', 'Jl. Merdeka No. 1, Jakarta');

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
(1, 1, 'Petualangan Si Kancil', 'Cerita rakyat untuk anak-anak.', 'R. Suryani', 'Anak Nusantara', '2018'),
(2, 2, 'Rahasia Hutan Ajaib', 'Novel petualangan remaja.', 'F. Widodo', 'Remaja Press', '2020'),
(3, 3, 'Ensiklopedia Sains Junior', 'Pengetahuan dasar sains untuk anak.', 'L. Handayani', 'EduKids', '2019'),
(4, 4, 'Matematika Mudah untuk Remaja', 'Belajar matematika dengan cara menyenangkan.', 'Andi Wijaya', 'SmartEdu', '2021'),
(5, 5, 'Dongeng Dunia', 'Kumpulan dongeng internasional.', 'N. Anita', 'Cerita Kita', '2017'),
(6, 6, 'Panduan Coding Anak', 'Belajar coding dasar.', 'R. Nugraha', 'TeknoKids', '2022'),
(7, 7, 'Komik Sains Seru', 'Belajar sains lewat komik.', 'D. Permana', 'FunComics', '2019'),
(8, 8, 'Petualangan Antariksa', 'Cerita fiksi ilmiah remaja.', 'S. Putra', 'Bintang Remaja', '2020'),
(9, 9, 'Kisah Persahabatan', 'Novel drama remaja.', 'T. Ariyanti', 'Sahabat Press', '2021'),
(10, 10, 'Belajar Hewan dan Tumbuhan', 'Edukasi dasar biologi anak.', 'R. Yuni', 'EduKids', '2018'),
(11, 11, 'Komik Matematika', 'Cara mudah mengerti matematika.', 'B. Prasetyo', 'FunComics', '2020'),
(12, 12, 'Detektif Cilik', 'Novel misteri untuk remaja.', 'A. Fadli', 'Remaja Ceria', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `ID_PEMINJAMAN` int(11) NOT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `ID_BUKU` int(11) DEFAULT NULL,
  `TANGGAL_PINJAM` date DEFAULT NULL,
  `TANGGAL_RENCANA` date DEFAULT NULL,
  `STATUS` enum('Proses','Pinjam','Kembali','Rusak','Hilang','Terlambat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`ID_PEMINJAMAN`, `USERNAME`, `ID_BUKU`, `TANGGAL_PINJAM`, `TANGGAL_RENCANA`, `STATUS`) VALUES
(1, 'andi', 1, '2025-11-01', '2025-11-08', 'Pinjam'),
(2, 'budi', 2, '2025-11-02', '2025-11-09', 'Proses'),
(3, 'citra', 3, '2025-11-03', '2025-11-10', 'Pinjam'),
(4, 'dimas', 4, '2025-11-04', '2025-11-11', 'Kembali'),
(5, 'eka', 5, '2025-11-05', '2025-11-12', 'Pinjam'),
(6, 'fajar', 6, '2025-11-06', '2025-11-13', 'Rusak'),
(7, 'gita', 7, '2025-11-07', '2025-11-14', 'Pinjam'),
(8, 'hadi', 8, '2025-11-08', '2025-11-15', 'Hilang'),
(9, 'intan', 9, '2025-11-09', '2025-11-16', 'Proses'),
(10, 'joko', 10, '2025-11-10', '2025-11-17', 'Terlambat'),
(11, 'kiki', 11, '2025-11-11', '2025-11-18', 'Kembali'),
(12, 'lala', 12, '2025-11-12', '2025-11-19', 'Pinjam');

-- --------------------------------------------------------

--
-- Table structure for table `pemustaka`
--

CREATE TABLE `pemustaka` (
  `NAMA_LENGKAP` varchar(50) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(64) NOT NULL,
  `TELEPON` varchar(14) NOT NULL,
  `TANGGAL_LAHIR` date NOT NULL,
  `ALAMAT` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemustaka`
--

INSERT INTO `pemustaka` (`NAMA_LENGKAP`, `USERNAME`, `PASSWORD`, `TELEPON`, `TANGGAL_LAHIR`, `ALAMAT`) VALUES
('Andi Pratama', 'andi', sha2('Password1', 256), '081111111111', '2010-03-15', 'Jl. Kenanga No. 1'),
('Budi Setiawan', 'budi', sha2('Password2', 256), '081222222222', '2009-07-20', 'Jl. Melati No. 4'),
('Citra Dewi', 'citra', sha2('Password3', 256), '081333333333', '2011-09-10', 'Jl. Mawar No. 9'),
('Dimas Arya', 'dimas', sha2('Password4', 256), '081444444444', '2008-02-22', 'Jl. Anggrek No. 2'),
('Eka Putri', 'eka', sha2('Password5', 256), '081555555555', '2007-05-18', 'Jl. Dahlia No. 8'),
('Fajar Nugraha', 'fajar', sha2('Password6', 256), '081666666666', '2009-11-01', 'Jl. Cempaka No. 7'),
('Gita Rahma', 'gita', sha2('Password7', 256), '081777777777', '2010-01-25', 'Jl. Flamboyan No. 5'),
('Hadi Saputra', 'hadi', sha2('Password8', 256), '081888888888', '2008-09-17', 'Jl. Tulip No. 3'),
('Intan Sari', 'intan', sha2('Password9', 256), '081999999999', '2007-12-09', 'Jl. Teratai No. 11'),
('Joko Santoso', 'joko', sha2('Password10', 256), '082111111111', '2011-04-12', 'Jl. Nusa Indah No. 6'),
('Kiki Pramudita', 'kiki', sha2('Password11', 256), '082222222222', '2009-06-08', 'Jl. Duren No. 10'),
('Lala Ananda', 'lala', sha2('Password12', 256), '082333333333', '2008-10-30', 'Jl. Pepaya No. 12');

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
  ADD KEY `FK_MEMILIKI2` (`ID_PEMINJAMAN`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`ID_PEMINJAMAN`),
  ADD KEY `FK_BERHAK` (`USERNAME`),
  ADD KEY `FK_MEMILIKI` (`ID_BUKU`);

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
  ADD CONSTRAINT `FK_MEMILIKI2` FOREIGN KEY (`ID_PEMINJAMAN`) REFERENCES `peminjaman` (`ID_PEMINJAMAN`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `FK_BERHAK` FOREIGN KEY (`USERNAME`) REFERENCES `pemustaka` (`USERNAME`),
  ADD CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`ID_BUKU`) REFERENCES `buku` (`ID_BUKU`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
