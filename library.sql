-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2025 at 02:47 PM
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
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `ID_BUKU` int(11) NOT NULL,
  `JUDUL` varchar(50) NOT NULL,
  `DESKRIPSI` longtext NOT NULL,
  `PENULIS` varchar(50) NOT NULL,
  `PENERBIT` varchar(50) NOT NULL,
  `TAHUN` year(4) NOT NULL,
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
(6, 'Cerita Rakyat Nusantara', 'Kumpulan cerita rakyat dari seluruh Indonesia.', 'Siti Aminah', 'Penerbit Ceria', '2017', 7),
(7, 'Komik Petualangan', 'Komik tentang petualangan seru dan lucu.', 'Joko Susanto', 'Komik Kreatif', '2020', 5),
(8, 'Petualangan di Dunia Ajaib', 'Novel petualangan yang cocok untuk anak dan remaja. Cerita penuh fantasi, persahabatan, dan keberanian.', 'Andi Pratama', 'Pustaka Muda', '2021', 7),
(9, 'Ilmu Pengetahuan Alam', 'Buku edukasi tentang alam dan sains untuk remaja.', 'Andi Pratama', 'Pustaka Muda', '2022', 4);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `ID_PEMINJAMAN` int(11) NOT NULL,
  `ID_BUKU` int(11) DEFAULT NULL,
  `ID_USER` int(11) NOT NULL,
  `TANGGAL_PINJAM` date NOT NULL DEFAULT current_timestamp(),
  `TANGGAL_RENCANA` date NOT NULL,
  `STATUS` enum('pinjam','kembali','proses','rusak','hilang','terlambat') NOT NULL DEFAULT 'proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`ID_PEMINJAMAN`, `ID_BUKU`, `ID_USER`, `TANGGAL_PINJAM`, `TANGGAL_RENCANA`, `STATUS`) VALUES
(1, 1, 1, '2025-11-13', '2025-11-20', 'pinjam'),
(2, 3, 2, '2025-11-13', '2025-11-13', 'pinjam'),
(3, 5, 3, '2025-10-28', '2025-11-07', 'kembali'),
(4, 2, 1, '2025-11-14', '2025-11-21', 'pinjam'),
(5, 6, 2, '2025-11-14', '2025-11-22', 'pinjam'),
(6, 7, 3, '2025-11-14', '2025-11-23', 'pinjam');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `NAMA_LENGKAP` varchar(50) NOT NULL,
  `USERNAME` varchar(64) NOT NULL,
  `PASSWORD` varchar(64) NOT NULL,
  `TELEPON` varchar(14) NOT NULL,
  `TANGGAL_LAHIR` date NOT NULL,
  `ALAMAT` varchar(150) NOT NULL,
  `PERAN` enum('Pemustaka','Administrator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `NAMA_LENGKAP`, `USERNAME`, `PASSWORD`, `TELEPON`, `TANGGAL_LAHIR`, `ALAMAT`, `PERAN`) VALUES
(1, 'Dewi Putri', 'dewi_putri', 'hashedpass1', '081234567890', '2010-05-10', 'Jl. Melati No.1', 'Pemustaka'),
(2, 'Agus Pratama', 'agus_pratama', 'hashedpass2', '082345678901', '2008-08-20', 'Jl. Kenanga No.2', 'Pemustaka'),
(3, 'Rina Sari', 'rina_sari', 'hashedpass3', '081298765432', '2007-11-15', 'Jl. Mawar No.5', 'Pemustaka'),
(4, 'Admin Perpustakaan', 'admin_perpus', 'hashedadmin', '081299988877', '1985-03-22', 'Jl. Kenari No.3', 'Administrator'),
(5, 'Budi Santoso', 'budi_s', 'hashedpass4', '081212345678', '2009-03-15', 'Jl. Kenanga No.10', 'Pemustaka');

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
  ADD KEY `ID_USER` (`ID_USER`),
  ADD KEY `ID_BUKU` (`ID_BUKU`);

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
  MODIFY `ID_BUKU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `ID_PEMINJAMAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`ID_BUKU`) REFERENCES `buku` (`ID_BUKU`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
