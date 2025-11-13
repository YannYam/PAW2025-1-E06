-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2025 at 09:11 AM
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
-- Database: `libra`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `ID_BUKU` int(11) NOT NULL,
  `JUDUL` varchar(50) NOT NULL,
  `DESKRIPSI` longtext NOT NULL,
  `PENULIS` varchar(50) NOT NULL,
  `PENERBIT` varchar(50) NOT NULL,
  `TAHUN` varchar(4) NOT NULL,
  `STOK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`ID_BUKU`, `JUDUL`, `DESKRIPSI`, `PENULIS`, `PENERBIT`, `TAHUN`, `STOK`) VALUES
(1, 'Petualangan Si Kancil', 'Cerita dongeng hewan yang populer untuk anak-anak.', 'Mang Udin', 'Pustaka Ceria', '2018', 3),
(2, 'Dongeng Nusantara', 'Kumpulan cerita rakyat dari berbagai daerah Indonesia.', 'Siti Aminah', 'Penerbit Ceria', '2017', 7),
(3, 'Misteri di Sekolah', 'Novel misteri yang seru untuk remaja.', 'Rina Dewi', 'Gramedia', '2020', 5),
(4, 'Sahabat Sejati', 'Novel tentang persahabatan remaja dan tantangannya.', 'Budi Santoso', 'Pustaka Media', '2019', 6),
(5, 'Komik Si Jagoan', 'Komik superhero yang menghibur untuk anak-anak.', 'Joko Susanto', 'Komik Kreatif', '2021', 8),
(6, 'Petualangan di Dunia Ajaib', 'Novel petualangan yang cocok untuk anak dan remaja.', 'Andi Pratama', 'Pustaka Muda', '2021', 7);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `ID_PEMINJAMAN` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `TANGGAL_PINJAM` date NOT NULL,
  `TANGGAL_RENCANA` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`ID_PEMINJAMAN`, `ID_USER`, `TANGGAL_PINJAM`, `TANGGAL_RENCANA`) VALUES
(1, 1, '2025-11-13', '2025-11-20'),
(2, 2, '2025-11-13', '2025-11-20'),
(3, 3, '2025-10-28', '2025-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `ID_PEMINJAMAN` int(11) NOT NULL,
  `ID_BUKU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`ID_PEMINJAMAN`, `ID_BUKU`) VALUES
(1, 1),
(2, 3),
(3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `NAMA_LENGKAP` varchar(50) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `TELEPON` varchar(14) NOT NULL,
  `TANGGAL_LAHIR` date NOT NULL,
  `ALAMAT` longtext NOT NULL,
  `PERAN` enum('Pemustaka','Administrator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `NAMA_LENGKAP`, `USERNAME`, `PASSWORD`, `TELEPON`, `TANGGAL_LAHIR`, `ALAMAT`, `PERAN`) VALUES
(1, 'Dewi Putri', 'dewi_putri', 'hashedpass1', '081234567890', '2010-05-10', 'Jl. Melati No.1', 'Pemustaka'),
(2, 'Agus Pratama', 'agus_pratama', 'hashedpass2', '082345678901', '2008-08-20', 'Jl. Kenanga No.2', 'Pemustaka'),
(3, 'Rina Sari', 'rina_sari', 'hashedpass3', '081298765432', '2007-11-15', 'Jl. Mawar No.5', 'Pemustaka'),
(4, 'Admin Perpustakaan', 'admin_perpus', 'hashedadmin', '081299988877', '1985-03-22', 'Jl. Kenari No.3', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`ID_BUKU`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`ID_PEMINJAMAN`),
  ADD KEY `FK_RELATIONSHIP_1` (`ID_USER`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`ID_PEMINJAMAN`,`ID_BUKU`),
  ADD KEY `FK_PINJAM2` (`ID_BUKU`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `ID_BUKU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `ID_PEMINJAMAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

--
-- Constraints for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD CONSTRAINT `FK_PINJAM` FOREIGN KEY (`ID_PEMINJAMAN`) REFERENCES `peminjaman` (`ID_PEMINJAMAN`),
  ADD CONSTRAINT `FK_PINJAM2` FOREIGN KEY (`ID_BUKU`) REFERENCES `buku` (`ID_BUKU`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
